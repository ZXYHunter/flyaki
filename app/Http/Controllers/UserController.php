<?php

namespace NeverTest\Http\Controllers;

use Monolog\Handler\NullHandlerTest;
use NeverTest\Classunit;
use NeverTest\Agency;
use NeverTest\Feedback;
use NeverTest\Sign_up;
use NeverTest\consultant_money;
use NeverTest\Messagebox;
use NeverTest\International_program;
use NeverTest\consultant_comments;
use NeverTest\Comments;
use NeverTest\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use NeverTest\Consultant;
use NeverTest\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use NeverTest\User;
use Illuminate\Support\Facades\Route;
use NeverTest\Tag;
use Illuminate\Support\Facades\Mail;
use Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller {

    /**
     * 显示所给定的用户个人数据。
     *
     * @param  int  $id
     * @return Response
     */
    protected function  getUserinfo($userid)
    {
        $userinfo = [
            'id'=>$userid,
            'username' => User::where('id', $userid)->pluck('username'),
            'name' => User::where('id', $userid)->pluck('name'),
            'email' => User::find($userid)->email ,
            'phone' => User::where('id', $userid)->pluck('phone'),
            'gender' => User::where('id', $userid)->pluck('gender'),
            'photoaddr' => User::where('id', $userid)->pluck('photoaddr'),
            'checkcode' => User::where('id', $userid)->pluck('checkcode'),
            'qq' => User::where('id', $userid)->pluck('qq'),
            'introduction' => User::where('id', $userid)->pluck('introduction'),
            'signature' => User::where('id', $userid)->pluck('signature'),
            'university' => User::where('id', $userid)->pluck('university'),
            'major' => User::where('id', $userid)->pluck('major'),
            'degree' => User::where('id', $userid)->pluck('degree'),
            'certification' => User::where('id', $userid)->pluck('certification'),
            'token' => User::where('id', $userid)->pluck('token'),
            'consultant' => User::find($userid)->consultant,
            'tag' => User::find($userid)->tag,
            'classes' => User::find($userid)->bookedClass
        ];
        if($userinfo['consultant'] && $userinfo['consultant']->certification )
            $userinfo['tag'] = $userinfo['tag'];
        else $userinfo['tag'] = null;
        return $userinfo;
    }
    protected function getImageInfo($img) {
        $imageInfo = getimagesize($img);
        if( $imageInfo!== false) {
            $imageType = strtolower(substr(image_type_to_extension($imageInfo[2]),1));
            $imageSize = filesize($img);
            $info = array(
                "width"		=>$imageInfo[0],
                "height"	=>$imageInfo[1],
                "type"		=>$imageType,
                "size"		=>$imageSize,
                "mime"		=>$imageInfo['mime'],
            );
            return $info;
        }else {
            return false;
        }
    }

    protected function thumb($image, $id, $cropInfo, $suofang = 0, $type = '', $maxWidth = 500, $maxHeight = 500, $interlace = true){
        // 获取原图信息
        $info  = $this->getImageInfo($image);
        if($info != false) {
            $srcWidth  = $info['width'];
            $srcHeight = $info['height'];
            $type = empty($type)?$info['type']:$type;
            $type = strtolower($type);
            $interlace  =  $interlace? 1:0;
            unset($info);
            {
                $scale = min($maxWidth/$srcWidth, $maxHeight/$srcHeight); // 计算缩放比例

                if($scale>=1) {
                    // 超过原图大小不再缩略
                    $width   =  $srcWidth;
                    $height  =  $srcHeight;
                }else{
                    // 缩略图尺寸
                    $width  = (int)($srcWidth * $scale);	//147
                    $height = (int)($srcHeight * $scale);	//199
                }
            }
            // 载入原图
            if($type=='jpg'||$type=='jpeg'){
                $createFun = 'ImageCreateFromjpeg';
            }else
            if($type=='png'){
                $createFun = 'ImageCreateFrompng';
            }else {
                $createFun = 'ImageCreateFrom'.$type;
            }
            $srcImg     = $createFun($image);

            //创建缩略图
            if($type!='gif' && function_exists('imagecreatetruecolor'))
                $thumbImg = imagecreatetruecolor($width, $height);
            else
                $thumbImg = imagecreate($width, $height);

            // 复制图片
            if(function_exists("ImageCopyResampled"))
                imagecopyresampled($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height, $srcWidth,$srcHeight);
            else
                imagecopyresized($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height,  $srcWidth,$srcHeight);
            if('gif'==$type || 'png'==$type) {
                //imagealphablending($thumbImg, false);//取消默认的混色模式
                //imagesavealpha($thumbImg,true);//设定保存完整的 alpha 通道信息
                $background_color  =  imagecolorallocate($thumbImg,  0,255,0);  //  指派一个绿色
                imagecolortransparent($thumbImg,$background_color);  //  设置为透明色，若注释掉该行则输出绿色的图
            }
            // 对jpeg图形设置隔行扫描
            if('jpg'==$type || 'jpeg'==$type) 	imageinterlace($thumbImg,$interlace);
            //$gray=ImageColorAllocate($thumbImg,255,0,0);
            //ImageString($thumbImg,2,5,5,"ThinkPHP",$gray);
            // 生成图片
            $imageFun = 'image'.($type=='jpg'?'jpeg':$type);
            $length = strlen("00.".$type) * (-1);
            $_type = substr($image,-4);
            $length = ($type != $_type ? $length+1 : $length);
            //裁剪

            //$thumbname01 = substr_replace($image,"01.".$type,$length);		//大头像
            //$thumbname02 = substr_replace($image,"02.".$type,$length);		//小头像
            $thumbname01 = 'user/photo/thumb/'.$id.'.'.$type;
            $thumbname02 = 'user/photo/thumb_mini/'.$id.'.'.$type;
            if($type=='png'){

                $imageFun($thumbImg,$thumbname01,9);
                $imageFun($thumbImg,$thumbname02,9);
            }
            else{
                $imageFun($thumbImg,$thumbname01,200);
                $imageFun($thumbImg,$thumbname02,200);
            }

            $thumbImg01 = imagecreatetruecolor(200,200);
            imagecopyresampled($thumbImg01,$thumbImg,0,0,$cropInfo['x'],$cropInfo['y'],200,200,$cropInfo['w'],$cropInfo['h']);

            $thumbImg02 = imagecreatetruecolor(48,48);
            imagecopyresampled($thumbImg02,$thumbImg,0,0,$cropInfo['x'],$cropInfo['y'],48,48,$cropInfo['w'],$cropInfo['h']);
            if($type=='png'){

                $imageFun($thumbImg01,$thumbname01,9);
                $imageFun($thumbImg02,$thumbname02,9);
            }
            else{
                $imageFun($thumbImg01,$thumbname01,200);
                $imageFun($thumbImg02,$thumbname02,200);
            }
            //unlink($image);
            imagedestroy($thumbImg01);
            imagedestroy($thumbImg02);
            imagedestroy($thumbImg);
            imagedestroy($srcImg);

            if(file_exists($image))
                unlink($image);//删除源文件，节省空间

            return array('big' => $thumbname01 , 'small' => $thumbname02);	//返回包含大小头像路径的数组
        }
        return false;
    }

    //进入用户主页
    public function getUser()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $data = ['user'=>$userinfo,'title'=>'留学Go | 个人主页'];
        return view('user',$data);
    }

    public function getUser2()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $data = ['user'=>$userinfo,'title'=>'留学Go | 个人主页'];
        return view('test',$data);
    }

    //用户提交更新信息
    public function postUser()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo =[
            'name' => Request::input('name'),
            'phone' => Request::input('phone'),
            'gender' => Request::input('gender') == 'on'? 'male':'female',
            'qq' => Request::input('qq'),
            'introduction' => Request::input('introduction'),
            'signature' => Request::input('signature'),
            'university' => Request::input('university'),
            'major' => Request::input('major'),
            'degree' => Request::input('degree')
        ];
        DB::table('users')->where('id', Auth::user()->getAuthIdentifier())->update($userinfo);
        return redirect('/member');
    }
    public  function  getRegistEmail(){

    }
    //查找密码页面
    public  function getFindCode(){
        return view('findcode',['title'=>'留学Go | 修改密码']);
    }
    public  function postFindCode(){
        $email=Request::input('email');
        $name = DB::table('users')->where('email', $email)->pluck('name');
        $id=DB::table('users')->where('email', $email)->pluck('id');
        $checkcode=bcrypt(date('Y-m-d', time()));
        $user = User::find($id);
        if($user==NULL){
            Session::put('message',["请检查邮箱拼写是否正确"]);
            return redirect('/findcode');
        }
        $checkcode = str_replace("/","",$checkcode);
        $checkcode = str_replace("$","",$checkcode);
        $checkcode = str_replace(".","",$checkcode);
        $user->checkcode=$checkcode;
        $user->save();
        $data=['email'=>$email,'name' => $name,'user'=>$user];
        Mail::send('email.test',['name' => $name,'email'=>$email,'checkcode'=>$checkcode],function($message) use($data){
            $message->to($data['email'],$data['name'])->subject('留学Go|修改密码验证邮件');
        });
        Session::put('message',["请在您的邮箱中查看验证码"]);
        return view('/changecode',['title'=>'留学Go | 修改密码','data'=>$data]);
    }
    //更改密码页面


    public  function postnewsletter(){

        $users= User::all();
        $usersnum = count($users);
        for($i=0;$i<$usersnum;$i++){
            $email=$users[$i]['email'];
            if($users[$i]['email']!=null){
                $data=['email'=>$email,'name'=>''];
                Mail::send('email.emailtest',['email'=>$email],function($message) use($data){
                    $message->to($data['email'],$data['name'])->subject('留学Go|第一期newsletter');
                });
            }

        }

    }


    public  function getLoggedChangeCode(){
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $data = ['user'=>$userinfo,'title'=>'留学Go | 修改密码'];
        return view('loggedchangecode',$data);
    }
    public  function postLoggedChangeCode(){

        $id = Auth::user()->getAuthIdentifier();
        $user = User::find($id);
        $oldpsw=Request::input('oldpsw');
        $psw=Request::input('newpsw');
        $cpsw=Request::input('cnewpsw');
        $username=DB::table('users')->where('id', $id)->pluck('username');
        if (Auth::attempt(['username' => $username, 'password' => $oldpsw])){
            if($psw==$cpsw){
                $user->password=bcrypt($psw);
                $user->save();
                Session::put('message',["修改密码成功!"]);
                return redirect('/member');
            }
            else{
                Session::put('message',["两次输入的密码不同"]);
                return redirect('/');
            }
        }
        else{
            Session::put('message',["原密码输入错误"]);
            return redirect('/loggedchangecode');
        }
    }

    public  function postChangeCode(){
        $email=Request::input('email');
        $checkcode=Request::input('checkcode');
        $psw=Request::input('newpsw');
        $cpsw=Request::input('cnewpsw');
        $id=DB::table('users')->where('email', $email)->pluck('id');
        $user = User::find($id);
        if($user->checkcode==$checkcode){
            if($psw==$cpsw){
                $user->password=bcrypt($psw);
                $user->checkcode="";
                $user->save();
                Session::put('message',["修改密码成功!"]);
                return redirect('/');
            }
            else{
                Session::put('message',["两次输入的密码不同"]);
                return redirect('/');
            }
        }
        else{
            Session::put('message',["验证码不正确"]);
            return redirect('/');
        }
    }

    //用户进入我的课程页面
    public function getMyClasses()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $consultants= Consultant::all();
        return view('myClasses',['user'=>$userinfo,'title'=>'留学Go | 我预订的课程','consultants'=>$consultants]);
    }


    public function getalipaynotify(){
        // 验证请求。
        if (! app('alipay.web')->verify()) {
            Log::notice('Alipay notify post data verification fail.', [
                'data' => Request::instance()->getContent()
            ]);
            return 'fail';
        }

        // 判断通知类型。
        switch (Input::get('trade_status')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。

                break;
        }

        return 'success';
    }

    public function getalipayreturn()
    {
        // 验证请求。
        if (! app('alipay.web')->verify()) {
            Log::notice('Alipay return query data verification fail.', [
                'data' => Request::getQueryString()
            ]);
            Session::put('message',["交易失败！"]);
            return redirect('/');
        }

        // 判断通知类型。
        switch (Input::get('trade_status')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。

                $order = Order::find(Input::get('trade_no'));

                $classid=$order['classunit']['id'];
                $class = Classunit::find($classid);
                $class['status']='booked';
                $class['time']=$order['chosenTime'];
                $class['student_id'] = Auth::user()->getAuthIdentifier();
                $class->save();

                $data=['email'=>'sales@liuxuego.org','name'=>'liuxuego'];
                Mail::send('email.classpurchaseemail',['consultantName' => $class['consultant']['user']['username'],'studentName'=>$class['user']['username']],function($message) use($data){
                $message->to($data['email'],$data['name'])->subject('留学Go|新的购买操作提醒');
                });

                Log::debug('Alipay notify get data verification success.', [
                    'out_trade_no' => Input::get('out_trade_no'),
                    'trade_no' => Input::get('trade_no')
                ]);
                break;
        }
        Session::put('message',["交易成功，请在个人中心查看课程！"]);
        return redirect('/shop');
    }
    public function postMyClasses(){
        $consultantid=Request::input('consultantid');
        $classid=Request::input('classid');
        $number=Request::input('number');
        $comment2=Request::input('comment');
        $consultant = Consultant::find($consultantid);
        $class = Classunit::find($classid);
        $user_id=$class['user']['id'];
        $class['status']='closed';
        $class['comment']=$comment2;
        $class->save();
        $tmp=$consultant['judgenum'];
        $average=$consultant['star'];
        $consultant['judgenum']=$consultant['judgenum']+1;
        $tmp=$tmp*$average;
        $tmp=$tmp+$number;
        $average=$tmp/$consultant['judgenum'];
        $average=number_format($average,2);
        $consultant['star']=$average;
        $consultant->save();
        $ccommentsinfo = [
            'consultant_id'=>$consultantid,
            'user_id'=>$user_id,
            'star'=>$number,
            'content'=>$comment2,
            'certification'=>NULL,
        ];
        consultant_comments::create($ccommentsinfo);
    }

    public function getGoTeach()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $consultants= Consultant::all();
        return view('goteach',['user'=>$userinfo,'title'=>'留学Go | 我的课程','consultants'=>$consultants]);
    }

    public function postGoTeach(){
        $classid=Request::input('classid');
        $class = Classunit::find($classid);
        $class['status'] = 'finished';
        $class->save();
    }
    //用户进入顾问注册页面
    public function getConsultantBasicInfo()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        if(!$userinfo['consultant']){
            $data = ['user'=>$userinfo,'title'=>'留学Go | 加入顾问'];
            return view('consultantRegist',$data);
        }
        else if($userinfo['consultant']['certification']=='passed'){

            Session::put('message',["您的身份已经是顾问！"]);
            return redirect('/join');
        }
        else if($userinfo['consultant']['certification']=='applying'){

            Session::put('message',["您的顾问审核正在进行中！"]);
            return redirect('/join');
        }

    }

    public function postComment(){
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect()->back();
        }
        else {
            $companyname=Request::input('companyname');
            $location=Request::input('location');
            $briefintro=Request::input('briefintro');
            $detailedintro=Request::input('detailedintro');
            $discountinfo=Request::input('discount');
            $applyassistance=Request::input('applyassistance');
            $languagetraining=Request::input('languagetraining');
            $internationalproject=Request::input('internationalproject');
            $phone=Request::input('phone');
            $commentsinfo = [
                'company_name'=>$companyname,
                'location'=>$location,
                'brief_intro'=>$briefintro,
                'detailed_intro'=>$detailedintro,
                'discount_info'=>$discountinfo,
                'apply_assistance'=>$applyassistance,
                'international_project'=>$internationalproject,
                'language_training'=>$languagetraining,
                'star'=>0,
                'phone'=>$phone,
                'company_photoaddr'=>'user/photo/default.jpg'
            ];
            Agency::create($commentsinfo);
            Session::put('message',["申请入驻成功！"]);
            return redirect()->back();
        }
    }

    //用户提交顾问基本信息
    public function postConsultantBasicInfo()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $tagInput = Request::input('tag');
        foreach ($tagInput as $key => $value) {
            $tagInput[$key] = json_encode($value);
        }

        $services = json_encode(Request::input('services'));
        if(!$userinfo['consultant'])
        {
            $consultantInfo = [
                'user_id' => Auth::user()->getAuthIdentifier(),
                'certification' => 'applying',
                'photoalbum_id' => NULL,
                'services' => $services,
                'briedintroduction'=>'',
                'star'=>0,
                'judgenum'=>0,
                'academy'=>'',
                'experience'=>'',
                'strength'=>''
            ];
            $consultant = Consultant::create($consultantInfo);
            $tagInput['consultant_id'] = $consultant->id;
            $tag = Tag::create($tagInput);
        }
        else
        {
            $consultant = $userinfo['consultant'];
            $consultant->services = $services;
            $consultant->save();
            $tag = $userinfo['tag'];
            $tag->update($tagInput);
        }
    }

    public function postConsultantDetail()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }

        $validator = Validator::make(
            [
                'realname' => Request::input('realname'),
                'briedintroduction' => Request::input('briedintroduction'),
                'university' => Request::input('university'),
                'degree' => Request::input('degree'),
                'major' => Request::input('major'),
                'academy' => Request::input('academy'),
                'experience' => Request::input('experience'),
                'strength' => Request::input('strength'),
                'offers' => Request::input('offers')
            ],
            [

                'realname' => 'required|max:255',
                'briedintroduction' => 'required|max:255',
                'university' => 'required|max:255',
                'degree' => 'required|max:255',
                'major' => 'required|max:255',
                'academy' => 'required|max:255',
                'experience' => 'required|max:255',
                'strength' => 'required|max:255',
                'offers' => 'required|max:255'
            ]
        );
        if($validator->fails()){
            //return view('index',['message'=>$validator->messages()->all(),'title'=>'GoGoGo!']);
            Session::put('message',$validator->messages()->all());
            return redirect()->back();
        }
        $user=User::find(Auth::user()->getAuthIdentifier());
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $user['university']=Request::input('university');
        $user['degree']=Request::input('degree');
        $user['major']=Request::input('major');
        $user->save();
        $consultant = $userinfo['consultant'];
        $consultant->realname =  Request::input('realname');
        $consultant->briedintroduction =  Request::input('briedintroduction');
        $consultant->strength =  Request::input('strength');
        $consultant->academy =  Request::input('academy');
        $offers_list='';
        $tmp=''.Request::input('offers');
        $offers_list=$offers_list.$tmp;
        for($i=1;$i<=9;$i++){
            if(Request::input('offers'.$i)!=null){
                $tmp='\n'.Request::input('offers'.$i);
                $offers_list=$offers_list.$tmp;
            }
        }
        $jobs_list='';
        $tmp=''.Request::input('experience');
        $jobs_list=$jobs_list.$tmp;
        for($i=1;$i<=9;$i++){
            if(Request::input('experience'.$i)!=null){
                $tmp='\n'.Request::input('experience'.$i);
                $jobs_list=$jobs_list.$tmp;
            }
        }
        $consultant->experience = $jobs_list;
        $consultant->get_offer =  $offers_list;
        $consultant->certification ='s3';
        $consultant->save();

        return redirect('/consultantTest');
    }

    public function getPersonalConsultant()
    {

        $consultants= Consultant::all();
        return view('personalConsultant',['title'=>'留学GO | 浏览所有顾问','consultants'=>$consultants]);
    }

    public function getchangepsw(){
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        return view('changepsw',['user'=>$userinfo,'title'=>'留学GO | 修改密码']);
    }

    public function postPersonalConsultant()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $users= User::all();
        return redirect('/personalconsultant');
    }
    public function getConsultantTest()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $data = ['user'=>$userinfo,'title'=>'留学Go | 加入顾问'];
        return view('consultantTest',$data);
    }

    public function postConsultantTest()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $consultant = $userinfo['consultant'];
        $consultant->answer =  Request::input('answer');
        $consultant->certification = 's4';
        $consultant->save();
        return redirect('/releaseclass');
    }
    public function getConsultantProcess()
    {
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $data = ['user'=>$userinfo,'title'=>'留学Go | 加入顾问'];
        return view('/consultantprocess',$data);
    }

    public function postConsultantBrainstorm()
    {
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $consultant = $userinfo['consultant'];
        $consultant->certification = 's2';
        $consultant->save();
        return redirect('/consultantDetail');
    }
    public function getConsultantBrainstorm()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $data = ['user'=>$userinfo,'title'=>'留学Go | 加入顾问'];
        return view('consultantBrainstorm',$data);
    }

    public function CreateNewAccount(){

        $data = ['title'=>'留学Go | 完善信息'];
        return view('createnewaccount',$data);
    }

    public function getConsultantDetail()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $data = ['user'=>$userinfo,'title'=>'留学Go | 加入顾问'];
        return view('consultantDetail',$data);
    }

    //用户进入发布课程页面
    public function getReleaseClassView()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect()->back();
        }
        $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
        $data = ['user'=>$userinfo,'title'=>'留学Go | 发布课程'];
        return view('releaseClass',$data);
    }

    //用户提交发布课程
    public function ajaxReleaseClass()
    {
        if(!Auth::check()){
            Session::put('message',["请先登陆！"]);
            return redirect()->back();
        }
        $classes = Request::all();
        foreach($classes as $class)
        {
            $class['expectation'] = '学生暂未写下课程期待';
            $class['comment'] = '期待你的评论！';
            $class['status'] = 'unbooked';
            $class['consultant_id'] = User::find(Auth::user()->getAuthIdentifier())->consultant->id;
            $class['student_id'] = 0;
            $class['type'] = json_encode($class['services']);
            unset($class['services']);
            Classunit::create($class);
        }
        $messages = [];
        $message = ['type'=>'success','class'=>'alert-success','message'=>'成功创建'.count($classes).'门课程！'];
        $messages []=$message;
        return $messages;
    }

    public  function postSearch(){

        $content=Request::input('search');

        $str=(string)$content;
        $str2='%'.$str.'%';
        $topagency= Agency::all();
        $agencies = Agency::where('company_name', 'like', $str2)->paginate(6);
        $data = ['title'=>'留学Go | 留学评评','agencies'=>$agencies,'topagencies'=>$topagency,'str'=>$str2];
        return view('searchResult',$data);

    }

    public  function getComment(){
        $topagency= Agency::all();
        $agencies = Agency::where('certification', '=','passed')->paginate(6);
        $data = ['title'=>'留学Go | 留学评评','agencies'=>$agencies,'topagencies'=>$topagency];
        return view('comment',$data);
    }

    protected function  getAgencyinfo($agencyid)
    {
        $agencyinfo = [
            'id'=>$agencyid,
            'company_name' => Agency::where('id', $agencyid)->pluck('company_name'),
            'location' => Agency::where('id', $agencyid)->pluck('location'),
            'brief_intro' => Agency::where('id', $agencyid)->pluck('brief_intro'),
            'detailed_intro' => Agency::where('id', $agencyid)->pluck('detailed_intro'),
            'price' => Agency::where('id', $agencyid)->pluck('price'),
            'is_online' => Agency::where('id', $agencyid)->pluck('is_online'),
            'discount_info' => Agency::where('id', $agencyid)->pluck('discount_info'),
            'phone' => Agency::where('id', $agencyid)->pluck('phone'),
            'certification' => Agency::where('id', $agencyid)->pluck('certification'),
            'company_photoaddr' => Agency::where('id', $agencyid)->pluck('company_photoaddr'),
            'apply_assistance' => Agency::where('id', $agencyid)->pluck('apply_assistance'),
            'international_project' => Agency::where('id', $agencyid)->pluck('international_project'),
            'language_training' => Agency::where('id', $agencyid)->pluck('language_training'),
            'star' => Agency::where('id', $agencyid)->pluck('star')

        ];
        return $agencyinfo;
    }
    public  function  getAgencySpace(){
        $login=Auth::check();
        $id = Route::input('id');
        $topagency= Agency::all();
        $agencyinfo = $this->getAgencyinfo($id);
        $agency = Agency::find($id);
        $comments=$agency->comments;
        $num=count($comments);
        $agencies= Agency::all();
        $comments = Comments::where('agency_id', '=',$id)->paginate(4);
        $data = ['login'=>$login,'topagencies'=>$topagency,'num'=>$num,'comments'=>$comments,'agencies'=>$agencies,'agencyinfo' => $agencyinfo,'title'=>"留学Go | ".$agencyinfo['company_name']."的主页"];
        return view('agencyspace',$data);
    }

    public  function postAgencySpace(){
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect()->back();
        }
        else {
            $id = Auth::user()->getAuthIdentifier();
            $content=Request::input('comment');
            $star=Request::input('star');
            $agencyid=Request::input('agencyid');
            $price=Request::input('price');
            $country=Request::input('country');
            $commentsinfo = [
                'user_id'=>$id,
                'agency_id'=>$agencyid,
                'content'=>$content,
                'star'=>$star,
                'country'=>$country,
                'price'=>$price
            ];
            Comments::create($commentsinfo);

            $thisagency = Agency::find($agencyid);
            $total= $thisagency->num*$thisagency->star;
            $total+=$star;
            $thisagency->num = $thisagency->num+1;
            $thisagency->star = $total/$thisagency->num;
            $thisagency->save();

            Session::put('message',["评论成功！"]);
            return redirect()->back();
        }
    }

    function postUserphotoUpload()
    {
        if(!Auth::check()){
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $destinationPath = 'user/temp/';
        $preFileName = 'tempUserPhoto_'.Auth::user()->getAuthIdentifier().'.';
        $v = Validator::make(Request::all(), [
            'userphoto'=>'required|image'
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $userphotoFile = Request::file('userphoto');
        $fileName = $preFileName.$userphotoFile->getClientOriginalExtension();
        $userphotoFile->move($destinationPath, $fileName);
        return ['userphotopath'=>$destinationPath.$fileName];
    }

    function postUserphotoConfirm()
    {
        if(!Auth::check()){
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $photoInfo = Request::all();

        $info  = $this->getImageInfo($photoInfo['src']);
       $thumbs = $this->thumb($photoInfo['src'],Auth::user()->getAuthIdentifier(),$photoInfo,1,$info['type'],Request::input('oldw'),Request::input('oldh'),1);
        $user = User::find(Auth::user()->getAuthIdentifier());
        $user->photoaddr = $thumbs['big'];
        $user->save();
        $messages = [];
        $message = ['type'=>'success','class'=>'alert-success','message'=>'头像修改成功!'];
        $messages []=$message;
        return $messages;
    }

    function registermail(){
        $id=Route::input('id');
        $userinfo=$this->getUserinfo($id);
        $data=['email'=>$userinfo['email'],'name' => $userinfo['username'],'username' => $userinfo['username'],'user'=>$userinfo];
        Mail::send('email.welcomeletter_app',['username' => $userinfo['username'],'password' => $userinfo['username'],'name' => $userinfo['username'],'email'=>$userinfo['email']],function($message) use($data){
            $message->to($data['email'],$data['username'])->subject('留学Go|恭喜您注册成功');
        });
    }

    function getRegisterLetterConsultantHR(){
        $id=Route::input('id');
        $userinfo=$this->getUserinfo($id);
        $data=['email'=>$userinfo['email'],'name' => $userinfo['username'],'username' => $userinfo['username'],'user'=>$userinfo];
        Mail::send('email.registerLetter_consultant_hr',['username' => $userinfo['username'],'email'=>$userinfo['email'],'phone'=>$userinfo['phone'],'realname'=>$userinfo['consultant']['realname']],function($message) use($data){
            $message->to('hr@liuxuego.org','hr')->subject('收到一条新的顾问注册！');
        });
    }
    function registerConsultantMail(){
        $id=Route::input('id');
        $userinfo=$this->getUserinfo($id);
        $data=['email'=>$userinfo['email'],'name' => $userinfo['username'],'username' => $userinfo['username'],'user'=>$userinfo];
        Mail::send('email.registerLetter_consultant_app',['username' => $userinfo['username'],'password' => $userinfo['username'],'name' => $userinfo['username'],'email'=>$userinfo['email'],'token'=>$userinfo['token']],function($message) use($data){
            $message->to($data['email'],$data['username'])->subject('留学Go|请验证您的邮箱地址');
        });
    }
    function findCodeMail_1(){

        $id=Route::input('id');
        $userinfo=$this->getUserinfo($id);
        $checkcode=bcrypt(date('Y-m-d', time()));
        $user = User::find($id);
        $userinfo=$this->getUserinfo($id);
        $checkcode = str_replace("/","",$checkcode);
        $checkcode = str_replace("$","",$checkcode);
        $checkcode = str_replace(".","",$checkcode);
        $user->checkcode=$checkcode;
        $user->save();
        $data=['email'=>$userinfo['email'],'name' => $userinfo['username'],'user'=>$userinfo];
        Mail::send('email.test_app',['id'=>$id,'name' => $userinfo['username'],'email'=>$userinfo['email'],'checkcode'=>$checkcode],function($message) use($data){
            $message->to($data['email'],$data['name'])->subject('留学Go|修改密码验证邮件');
        });
    }

    function findCodeMail_2(){

        $id=Route::input('id');
        $userinfo=$this->getUserinfo($id);
        if($userinfo['checkcode']==Route::input('checkcode'))
        {
            $checkcode=bcrypt(date('Y-m-d', time()));
            $user = User::find($id);
            $userinfo=$this->getUserinfo($id);
            $checkcode = str_replace("/","",$checkcode);
            $checkcode = str_replace("$","",$checkcode);
            $checkcode = str_replace(".","",$checkcode);
            $user->checkcode=$checkcode;
            $user->save();
            return view('changecode_app',['title'=>'留学Go | 修改密码','user'=>$userinfo]);
        }
        return view('changecode_app',['title'=>'留学Go | 修改密码','user'=>$userinfo]);
    }

    function signUpMail(){
        $id=Route::input('id');
        $signup=Sign_up::find($id);

        $data=['email'=>$signup['email'],'name' => $signup['name']];
        Mail::send('email.sign_up_mail',['studentname'=>$signup['email'],'program_name'=>$signup->international_program['program_name']],function($message) use($data){
            $message->to($data['email'],$data['name'])->subject('留学Go|恭喜您报名成功');
        });

        $data=[];
        Mail::send('email.sign_up_mail_sales',['studentemail'=>$signup['email'],'studentname' =>$signup['name'],'program_name'=>$signup->international_program['program_name']],function($message) use($data){
            $message->to('sales@liuxuego.org','留学Go')->subject('有一条新的项目报名');
        });
    }
    function messageMail(){
        $id=Route::input('id');
        $message=Messagebox::find($id);


        $sender=$this->getUserinfo($message['sender']);
        $receiver=$this->getUserinfo($message['receiver']);

        $data=['email'=>$receiver['email'],'name'=>$receiver['name']];
        Mail::send('email.newMessage_app',['senderName'=>$sender['name'],'receiverName' =>$receiver['name'],'title'=>$message['title']],function($message) use($data){
            $message->to($data['email'],$data['name'])->subject('留学Go|您收到一条新私信');
        });
    }

    function changecode_app(){
        $psw=Request::input('newpsw');
        $cpsw=Request::input('cnewpsw');
        $id=Request::input('id');
        $user = User::find($id);
            if($psw==$cpsw){
                $user->password=bcrypt($psw);
                $user->save();
                Session::put('message',["修改密码成功!"]);
                return redirect('/');
            }
            else{
                Session::put('message',["两次输入的密码不同"]);
                return redirect('/');
            }
    }

    function payMail(){
        $id=Route::input('id');
        $signup=Sign_up::find($id);
        $fee_progress=$signup->fee_progress;
        $data=['email'=>$signup['email'],'name' => $signup['name']];
        Mail::send('email.payMail',['studentname'=>$signup['email'],'fee_progress'=>$fee_progress,'program_name'=>$signup->international_program['program_name']],function($message) use($data){
            $message->to($data['email'],$data['name'])->subject('留学Go|恭喜您交费成功');
        });

        if($fee_progress=='signup_fee'){
            $price=$signup->international_program['signup_fee'];
        }else if($fee_progress=='deposit'){
            $price=$signup->international_program['deposit'];
        }else {
            $price=$signup->international_program['balance_due'];
        }
        $data=[];
        Mail::send('email.payMail_sales',['price'=>$price,'studentemail'=>$signup['email'],'studentname' =>$signup['name'],'fee_progress'=>$fee_progress,'program_name'=>$signup->international_program['program_name']],function($message) use($data){
            $message->to('sales@liuxuego.org','留学Go')->subject('有一条新的交费');
        });
    }

    function getPushChatManagement(){
        $allusers=User::all();
        $consultants=Consultant::all();
        $students=DB::table('users')
            ->leftJoin('consultant', 'users.id', '=', 'consultant.user_id')
            ->where('consultant.user_id', '=', null)
            ->select('users.id', 'users.username', 'users.created_at')
            ->get();
        $sign_ups=Sign_up::all();
        $orders=Order::all();
        return view('pushChatManagement',['title'=>'留学Go | 发送推送','allusers'=>$allusers,'consultants'=>$consultants,'students'=>$students,'orders'=>$orders,'sign_ups'=>$sign_ups]);
    }

    function postPushChatManagement(){

        $ids = Request::input('chosen');
        $idarray=explode(',', $ids);
        $dtarray=array();
        $tmp="";
        for($i=1;$i<count($idarray)-1;$i++){
            if($idarray[$i]!="choose_all_s"){
                $user=User::find($idarray[$i]);
                if($user!=null){
                    if($user->deviceToken !=null){
                        array_push($dtarray, $user->deviceToken['devicetoken']);
                        $tmp=$tmp.$user->deviceToken['devicetoken'];
                    }
                }
            }
        }

        $data = array ('array'=>$dtarray,'title'=>Request::input('title'),'content'=>Request::input('content'));
        $data = http_build_query($data);
        $opts = array ('http' => array ('method' => 'POST','header'=> "Content-type:application/x-www-form-urlencoded;charset=utf-8", 'content' => $data));

        $context = stream_context_create($opts);
        $html = file_get_contents('http://liuxuego.org:8080/iOSPush/run.php', false, $context);
        echo $html;

        Session::put('message',["成功发送".count($dtarray)."条推送！"]);
        return redirect()->back();

    }

    function getPushSendMoney(){

        $Consultant_money= consultant_money::find(Route::input('id'));
        $ids = ','.$Consultant_money['receiver_user_id'].',';
        $title='您收到来自ZXY的狗粮';
        $content='ZXY给你送了20狗粮，在[我的狗粮]查看详情';
        $idarray=explode(',', $ids);
        $dtarray=array();
        $tmp="";
        for($i=1;$i<count($idarray)-1;$i++){
            if($idarray[$i]!="choose_all_s"){
                $user=User::find($idarray[$i]);
                if($user!=null){
                    if($user->deviceToken !=null){
                        array_push($dtarray, $user->deviceToken['devicetoken']);
                        $tmp=$tmp.$user->deviceToken['devicetoken'];
                    }
                }
            }
        }

        $data = array ('array'=>$dtarray,'title'=>'22','content'=>'ZXY给你送了20狗粮，在[我的狗粮]查看详情');
        $data = http_build_query($data);
        $opts = array ('http' => array ('method' => 'POST','header'=> "Content-type:application/x-www-form-urlencoded;charset=utf-8", 'content' => $data));

        $context = stream_context_create($opts);
        $html = file_get_contents('http://liuxuego.org:8080/iOSPush/run.php', false, $context);
        echo $html;

        Session::put('message',["成功发送".count($dtarray)."条推送".$Consultant_money['receiver_user_id']."！".$title.$content]);
        return redirect('/');


//        $id=Route::input('id');
//        $Consultant_money= consultant_money::find($id);
//
//        $ids =','.$Consultant_money['receiver_user_id'];
//        $idarray=explode(',', $ids);
//        $dtarray=array();
//        $tmp="";
//        $title='您收到来自'.$Consultant_money['sender_name'].'的狗粮';
//        $content=$Consultant_money['sender_name'].'给你送了'.$Consultant_money['money'].'狗粮，在[我的狗粮]查看详情';
//        for($i=1;$i<=count($idarray)-1;$i++){
////            $flag0=1;
//            if($idarray[$i]!="choose_all_s"){
////                $flag1=1;
//                $user=User::find($idarray[$i]);
//                if($user!=null){
////                    $flag2=1;
//                    if($user->deviceToken !=null){
////                        $flag3=0;
//                        array_push($dtarray, $user->deviceToken['devicetoken']);
//                        $tmp=$tmp.$user->deviceToken['devicetoken'];
//                    }
//                }
//            }
//        }
//
//        $data = array ('array'=>$dtarray,'title'=>$title,'content'=>$content);
//        $data = http_build_query($data);
//        $opts = array ('http' => array ('method' => 'POST','header'=> "Content-type:application/x-www-form-urlencoded;charset=utf-8", 'content' => $data));
//
//        $context = stream_context_create($opts);
//        $html = file_get_contents('http://liuxuego.org:8080/iOSPush/run.php', false, $context);
//        echo $html;
//        //
//        $user1=User::find($idarray[1]);
//
//        Session::put('message',["成功发送".count($dtarray)."条推送！"]);
//        return redirect()->back();
    }

    function feedbackMail(){
        $id=Route::input('id');
        $feedback=Feedback::find($id);
        $title=$feedback->title;
        $content=$feedback->content;
        $email=$feedback->email;
        $phone=$feedback->phone;
        $data=['email'=>'hr@liuxuego.org','name' =>'hr'];
        Mail::send('email.feedbackMail',['title'=>$title,'content'=>$content,'email'=>$email,'phone'=>$phone],function($message) use($data){
            $message->to($data['email'],$data['name'])->subject('有一条新的反馈信息');
        });
    }



    function SendMoneyMail(){

        $id=Route::input('id');
        $Consultant_money= consultant_money::find($id);
        $data=['email'=>'sales@liuxuego.org','sendername' => $Consultant_money['sender_name'],'consultantname' => $Consultant_money->receiver['username'],'money'=>$Consultant_money['money'],'created_at'=>$Consultant_money['created_at']];
        Mail::send('email.sendMoneyEmail',['sendername' => $Consultant_money['sender_name'],'consultantname' => $Consultant_money->receiver['username'],'money'=>$Consultant_money['money'],'created_at'=>$Consultant_money['created_at']],function($message) use($data){
            $message->to($data['email'],'sales')->subject('留学Go|有一条新的狗粮赠送记录');
        });
    }

}
