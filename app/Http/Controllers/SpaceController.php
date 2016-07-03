<?php

namespace NeverTest\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use NeverTest\User;
use Illuminate\Support\Facades\Route;
use NeverTest\Consultant;
use NeverTest\Classunit;
use NeverTest\Tag;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

use NeverTest\Order;
use NeverTest\Professor;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\NullHandlerTest;
use NeverTest\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;

class SpaceController extends Controller {

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
            'qq' => User::where('id', $userid)->pluck('qq'),
            'introduction' => User::where('id', $userid)->pluck('introduction'),
            'signature' => User::where('id', $userid)->pluck('signature'),
            'university' => User::where('id', $userid)->pluck('university'),
            'major' => User::where('id', $userid)->pluck('major'),
            'degree' => User::where('id', $userid)->pluck('degree'),
            'consultant' => User::find($userid)->consultant,
            'tag' => User::find($userid)->tag
        ];
        if($userinfo['consultant'] && $userinfo['consultant']->certification )
            $userinfo['tag'] = $userinfo['tag'][0];
        else $userinfo['tag'] = null;
        return $userinfo;
    }
    protected function  getProfessorinfo($professorid)
    {
        $professorinfo = [
            'id'=>$professorid,
            'name' => Professor::where('id', $professorid)->pluck('name'),
            'photoaddr' => Professor::where('id', $professorid)->pluck('photoaddr'),
            'university' => Professor::where('id', $professorid)->pluck('university'),
            'position' => Professor::where('id', $professorid)->pluck('position'),
            'introduction' => Professor::where('id', $professorid)->pluck('introduction')
        ];

        return $professorinfo;
    }

    public function getSpace()
    {
        if(Auth::check() && Auth::user()->getAuthIdentifier() == Route::input('id')) {
            return redirect('/member');
        }
        $id = Route::input('id');
        $hostinfo = $this->getUserinfo($id);
        if($hostinfo['consultant']) {
            $classes = $hostinfo['consultant']->classes()->where('status','=','unbooked')->get();
        }
        else $classes = null;
        $data = ['host' => $hostinfo,'comments'=>$hostinfo['consultant']['comments'],'classes'=>$classes,'title'=>"留学狗! | ".$hostinfo['name']."的主页"];
        return view('space',$data);
    }
    public function getWechatSpace()
    {
        if(Auth::check() && Auth::user()->getAuthIdentifier() == Route::input('id')) {
            return redirect('/member');
        }
        $id = Route::input('id');
        $hostinfo = $this->getUserinfo($id);
        if($hostinfo['consultant']) {
            $classes = $hostinfo['consultant']->classes()->where('status','=','unbooked')->get();
        }
        else $classes = null;
        $data = ['host' => $hostinfo,'comments'=>$hostinfo['consultant']['comments'],'classes'=>$classes,'title'=>"留学狗! | ".$hostinfo['name']."的主页"];
        return view('wechatSpace',$data);
    }
    public function getWechatProfessorSpace()
    {
        $id = Route::input('id');
        $hostinfo = $this->getProfessorinfo($id);

        $data = ['host' => $hostinfo,'title'=>"留学狗! | ".$hostinfo['name']."的主页"];
        return view('wechatProfessorSpace',$data);
    }

    public function postConsultantEmail(){

        $data=['email'=>Request::input('email'),'name' => Request::input('consultantName')];
        Mail::later(120,'email.consultant',['studentName'=>Request::input('studentName'),'consultantName'=>Request::input('consultantName'),'content' => Request::input('content'),'time'=>Request::input('time')],function($message) use($data){
            $message->to($data['email'],$data['name'])->subject('留学Go|您收到一条咨询');
        });

    }

    public function postBookClass()
    {
        if(!Auth::check()) {
            Session::put('message',["请先登陆！"]);
            return redirect('/');
        }
        $classId = Request::input('classId');
        $ClassTobeBook = Classunit::find($classId);
        if ($ClassTobeBook->status == 'unbooked') {
            $ClassTobeBook->save();

            $start=Request::input('time')-1;
            $end=Request::input('time');

            $data=['email'=>$ClassTobeBook['consultant']['user']['email'],'name' => $ClassTobeBook['consultant']['user']['username']];
            Mail::send('email.notify',['start'=>$start,'end'=>$end,'starttime'=>$ClassTobeBook['starttime'],'studentemail'=>$ClassTobeBook['user']['email'],'consultantname'=>$ClassTobeBook['consultant']['user']['username'],'studentname' => $ClassTobeBook['user']['username'],'email'=>$ClassTobeBook['consultant']['user']['email']],function($message) use($data){
                $message->to($data['email'],$data['name'])->subject('留学Go|您的课程已被预订');
            });
            $class = Classunit::find($classId);
            $orderinfo = [
                'chosenTime'=>$end,
                'class_id'=>$classId,
                'consultant_id' =>  $class['consultant_id'],
                'student_id' => $class['student_id'],
                'fee' => $class['price'],
                'goodsname' => '留学Go课程购买',
                'goodsdescription' => '购买留学Go课程'
            ];
            Order::create($orderinfo);
            // 创建支付单。
            $alipay = app('alipay.web');
            $alipay->setOutTradeNo($class['order']['id']);
            $alipay->setTotalFee($class['price']);
            $alipay->setSubject($class['order']['goodsname']);
            $alipay->setBody($class['order']['goodsdescription']);
// 跳转到支付页面。
            return redirect()->to($alipay->getPayLink());
        } else {
            Session::put('message',["课程已经被预订！"]);
            return redirect('/');
        }
    }

    public function ordermail(){
        $id=Route::input('id');
        $order=Order::find($id);
        $data=['email'=>$order->classunit['consultant']['user']['email'],'name' => $order->classunit['consultant']['user']['username']];
        Mail::send('email.notify_app',['studentemail'=>$order->classunit['consultant']['user']['email'],'consultantname'=>$order->classunit['consultant']['user']['username'],'studentname' =>$order->student['username'],'email'=>$order->classunit['consultant']['user']['email'],'goodsname'=>$order['goodsname'],'starttime'=>$order->classunit['date']],function($message) use($data){
            $message->to($data['email'],$data['name'])->subject('留学Go|您的课程已被预订');
        });

        $data=['email'=>$order->student['email'],'name' => $order->student['username']];
        Mail::send('email.notify_app_s',['studentemail'=>$order->student['email'],'consultantname'=>$order->classunit['consultant']['user']['username'],'studentname' =>$order->student['username'],'email'=>$order->classunit['consultant']['user']['email'],'goodsname'=>$order['goodsname'],'starttime'=>$order->classunit['date']],function($message) use($data){
            $message->to($data['email'],$data['name'])->subject('留学Go|恭喜您预定成功');
        });

        $data=['email'=>$order->student['email'],'name' => $order->classunit['consultant']['user']['username']];
        Mail::send('email.notify_app_sales',['studentemail'=>$order->student['email'],'consultantname'=>$order->classunit['consultant']['user']['username'],'studentname' =>$order->student['username'],'email'=>$order->classunit['consultant']['user']['email'],'goodsname'=>$order['goodsname'],'starttime'=>$order->classunit['date'],'created_at'=>$order['created_at'],'price'=>$order['fee']],function($message) use($data){
            $message->to('sales@liuxuego.org','留学Go')->subject('有一条新课程预定');
        });


    }
}