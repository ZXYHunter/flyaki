<?php
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*Route::get('/email',function(){
    if(!Auth::check()) {
        Session::put('message',["You haven't Login!"]);
        return redirect('/');
    }
    $userinfo = $this->getUserinfo(Auth::user()->getAuthIdentifier());
    $name= $userinfo['name'];
    Mail::send('email.test',['name' => 'Collins'],function($message){
       $message->to('424449435@qq.com','someguy')->subject('hithere');
    });
});*/
Route::get('/admindetail','AdminController@getadmindetail');

Route::get('/admin{error?}',function($error = null){
    if($error!=null){
        $data = ['error'=>$error];
        return view('adminlogin',$data);
    }
    else {
        $data = ['error'=>null];
        return view('adminlogin',$data);
    }
});


Route::post('/admin','AdminController@postadmin');


Route::get('importPower', function () {
    return view('importPower');
});
Route::get('/test1','TestController@testDiagram');
Route::get('importOrder', 'ExcelImportController@importOrderRecord');
Route::get('importPower', 'ExcelImportController@importPowerRecord');
Route::get('/weixin',function() {
    return view('weixin');
});

Route::get('/registemail','UserController@getRegistEmail');

Route::get('/','IndexController@getDisplayAll');

Route::get('/qqtest','IndexController@getDisplayAllforQQ');

Route::get('/create_new_account','UserController@CreateNewAccount');

Route::post('/login', 'AuthController@postLogin');

Route::get('/logout', 'AuthController@getLogout');

Route::post('/register', 'AuthController@postRegister');

Route::get('/registerRequest', 'AuthController@getRegisterRequest');

Route::post('/qqregister', 'AuthController@postQQRegister');

Route::post('/sendnewsletter', 'UserController@postnewsletter');

Route::get('/member','UserController@getUser');

Route::post('/member','UserController@postUser');

Route::get('/findcode','UserController@getFindCode');

Route::post('/findcode','UserController@postFindCode');

Route::get('/changecode','UserController@getChangeCode');

Route::post('/changecode','UserController@postChangeCode');

Route::get('/loggedchangecode','UserController@getLoggedChangeCode');

Route::post('/loggedchangecode','UserController@postLoggedChangeCode');

Route::get('/myclasses','UserController@getMyClasses');

Route::post('/myclasses','UserController@postMyClasses');

Route::get('/goteach','UserController@getGoTeach');

Route::post('/goteach','UserController@postGoTeach');

Route::get('/personalconsultant','UserController@getPersonalConsultant');

Route::post('/personalconsultant','UserController@postPersonalConsultant');

Route::get('/video',function (){
    $data = ['title'=>'video!'];
    return view('video',$data);
});

Route::get('/join',function (){
    $data = ['title'=>'留学GO | 加入顾问'];
    return view('join',$data);
});
Route::get('/shop','ShopController@getDisplayAll');

Route::get('/comment','UserController@getComment');

Route::post('/comment','UserController@postComment');

Route::post('/search','UserController@postSearch');

Route::get('/changepsw','UserController@getchangepsw');

Route::post('/messagebox/catch','MessageboxController@postMessagebox');

Route::post('/messagebox/send' ,'MessageboxController@sendMessagebox');

Route::get('/mystudent',function (){
    $data = ['title'=>'GoGoGo!'];
    return view('mystudent',$data);
});

Route::get('/consultantdisplay',function (){
    $data = ['title'=>'GoGoGo!'];
    return view('consultantdisplay',$data);
});
Route::get('/classlist',function (){
    $data = ['title'=>'GoGoGo!'];
    return view('classlist',$data);
});
Route::get('/addclass',function (){
    $data = ['title'=>'GoGoGo!'];
    return view('addclass',$data);
});

Route::get('/myclass',function (){
    $data = ['title'=>'GoGoGo!'];
    return view('myclass',$data);
});
Route::get('/notify_url',function (){
    return view('notify_url');
});
Route::get('/return_url',function (){
    return view('return_url');
});

Route::get('/email',function(){
   return view('email.emailtest');
});

Route::get('/activemail','UserController@getActivemail');

Route::get('/space_{id}','SpaceController@getSpace');

Route::get('/agencyspace_{id}','UserController@getAgencySpace');

Route::post('/agencyspace_{id}','UserController@postAgencySpace');

Route::get('/confirmemail_consultant_{token}','AuthController@getConsultantConfirmEmail');

Route::get('/confirmemail_{token}','AuthController@getConfirmEmail');

Route::post('/bookClass','SpaceController@postBookClass');

Route::post('/consultantemail','SpaceController@postConsultantEmail');

Route::get('/releaseclass','UserController@getReleaseClassView');

Route::post('/releaseclass','UserController@ajaxReleaseClass');

Route::get('/consultantBasicInfo','UserController@getConsultantBasicInfo');

Route::post('/consultantBasicInfo','UserController@postConsultantBasicInfo');

Route::get('/consultantprocess','UserController@getConsultantProcess');

Route::get('/consultantBrainstorm','UserController@getConsultantBrainstorm');

Route::post('/consultantBrainstorm','UserController@postConsultantBrainstorm');

Route::get('/consultantTest','UserController@getConsultantTest');

Route::post('/consultantTest','UserController@postConsultantTest');

Route::get('/consultantDetail','UserController@getConsultantDetail');

Route::post('/consultantDetail','UserController@postConsultantDetail');

Route::get('/alipay','UserController@getalipay');

Route::post('/alipay','UserController@postalipay');

Route::get('/alipaynotify','UserController@getalipaynotify');

Route::get('/alipayreturn','UserController@getalipayreturn');


    Route::get('/identitydetail','IdentityController@getidentitydetail');

    Route::get('/identity{error?}',function($error = null){
        if($error!=null){
            $data = ['error'=>$error];
            return view('identitylogin',$data);
        }
        else {
            $data = ['error'=>null];
            return view('identitylogin',$data);
        }
    });

    Route::post('/identity','IdentityController@postidentity');

Route::get('/test','UserController@getUser2');

Route::post('/userphotoupload','UserController@postUserphotoUpload');

Route::post('/userphotoconfirm','UserController@postUserphotoConfirm');

//收到地址进入微信公众号留学去的接口

Route::get('/wechatCustomer','WeChatClientController@getDisplayAll');

Route::get('/wechatProfessor','WeChatClientController@getProfessorDisplay');

Route::get('/wechatProfessorSpace_{id}','SpaceController@getWechatProfessorSpace');

Route::get('/wechatSpace_{id}','SpaceController@getWechatSpace');

Route::get('/wechatSearchConsultant','WeChatClientController@getWechatSearchConsultant');

// APP邮件接口

// 顾问注册确认邮件
Route::get('/mail_register_consultant_{id}','UserController@registerConsultantMail');


Route::get('/mail_register_{id}','UserController@registermail');

Route::get('/mail_order_{id}','SpaceController@ordermail');

Route::get('/mail_sign_up_{id}','UserController@signUpMail');

Route::get('/mail_find_code_{id}','UserController@findCodeMail_1');

Route::get('/mail_findcode_{id}_{checkcode}','UserController@findCodeMail_2');

Route::post('/changecode_app','UserController@changecode_app');

Route::get('/mail_paid_{id}','UserController@payMail');

Route::get('/mail_message_{id}','UserController@messageMail');

Route::get('/mail_feedback_{id}','UserController@feedbackMail');

Route::get('/mail_send_money_{id}','UserController@SendMoneyMail');

Route::get('/registerLetter_consultant_hr_{id}','UserController@getRegisterLetterConsultantHR');

//推送编辑页面

Route::get('/push_chat_management','UserController@getPushChatManagement');

Route::post('/push_chat_management','UserController@postPushChatManagement');



Route::get('/push_send_money_{id}','UserController@getPushSendMoney');
