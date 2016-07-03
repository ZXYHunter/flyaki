<?php

namespace NeverTest\Http\Controllers;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use NeverTest\User;
use Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Symfony\Component\HttpFoundation\Tests\RequestStackTest;
use Illuminate\Support\Facades\Mail;

use Monolog\Handler\NullHandlerTest;
use NeverTest\Classunit;
use NeverTest\Agency;
use NeverTest\Comments;
use NeverTest\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use NeverTest\Consultant;
use Illuminate\Support\Facades\DB;
use NeverTest\Tag;
use SebastianBergmann\Environment\Console;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthController extends Controller {
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
    }
    public function getRegisterRequest(){
        return view('registerRequest');
    }

    public function postLogin()
    {

        if(User::where('username', Request::input('username'))->pluck('certification')=='passed'&&Auth::validate(['username' => Request::input('username'), 'password' => Request::input('password')])) {
            Auth::attempt(['username' => Request::input('username'), 'password' => Request::input('password')]);
            return redirect()->back();
        }
        else if(User::where('email', Request::input('username'))->pluck('certification')=='passed'&&Auth::attempt(['email' => Request::input('username'), 'password' => Request::input('password')])) {
            return redirect()->back();
        }
        else if(User::where('phone', Request::input('username'))->pluck('certification')=='passed'&&Auth::attempt(['phone' => Request::input('username'), 'password' => Request::input('password')])) {
            return redirect()->back();
        }

                else {Session::put('message',["您输入的信息不匹配或密码错误"]);
            return redirect()->back();
        }
    }
    public function getLogout()
    {
        if(Auth::check())
            Auth::logout();
        return redirect('/');
    }

    public function postRegister()
    {
        $validator = Validator::make(
            [
                'username' => Request::input('username'),
                'password' => Request::input('password'),
                'email' => Request::input('email'),
                'agreement'=> Request::input('agreement'),
                'password_confirmation' => Request::input('password_confirmation')
            ],
            [
                'email' => 'required|email|max:255|unique:users',
                'agreement' => 'required',
                'username' => 'required|min:2|max:30|unique:users',
                'password' => 'required|min:6|max:30|confirmed'
            ]
        );
        if($validator->fails()){
            //return view('index',['message'=>$validator->messages()->all(),'title'=>'GoGoGo!']);
            Session::put('message',$validator->messages()->all());
            return redirect()->back();
        }
        else {
            $str=bcrypt(Request::input("password"));
            $str = str_replace(array("_","@","/"),"",$str);
            $userinfo = [
                'username' => Request::input('username'),
                'name' => Request::input('username'),
                'password' => bcrypt(Request::input('password')),
                'email' => Request::input('email'),
                'gender' => 'doggie',
                'photoaddr' => 'user/photo/default.jpg',
                'phone' => '',
                'qq' => '',
                'checkcode'=>'',
                'introduction' => '',
                'signature' => '',
                'university' => '',
                'major' => '',
                'degree' => '',
                'certification' => 'new',
                'token'=> $str
            ];
            User::create($userinfo);
            $data=['email'=>Request::input('email'),'name' => Request::input('username'),'username' => Request::input('username'),'user'=>$userinfo];
            Mail::send('email.welcomeletter',['username' => Request::input('username'),'password' => Request::input('password'),'name' => Request::input('username'),'email'=>Request::input('email'),'token' =>$str],function($message) use($data){
                $message->to($data['email'],$data['username'])->subject('留学Go|恭喜您注册成功');
            });

            Session::put('message',['注册成功，请在注册邮箱中点击注册链接完成注册！']);
            return redirect()->back();
        }
    }


    public function postQQRegister()
    {
        $validator = Validator::make(
            [
                'username' => Request::input('qqname'),
                'email' => Request::input('email'),
            ],
            [
                'email' => 'required|email|max:255|unique:users',
                'username' => 'required|min:2|max:30|unique:users',
            ]
        );
        if($validator->fails()){
            //return view('index',['message'=>$validator->messages()->all(),'title'=>'GoGoGo!']);
            Session::put('message',$validator->messages()->all());
            return redirect()->back();
        }
        else {
            $str=bcrypt(Request::input("password"));
            $str = str_replace(array("_","@","/"),"",$str);
            $userinfo = [
                'username' => Request::input('qqname'),
                'name' => Request::input('qqname'),
                'email' => Request::input('email'),
                'gender' => 'male',
                'photoaddr' => 'user/photo/default.jpg',
                'phone' => '',
                'qq' => '',
                'checkcode'=>'',
                'introduction' => '',
                'signature' => '',
                'university' => '',
                'major' => '',
                'degree' => '',
                'certification' => 'passed',
                'token'=> $str
            ];
            User::create($userinfo);
            Auth::attempt(['username' => Route::input('username'), 'password' =>'']);
            return redirect('/');
        }
    }

    public function getConfirmEmail(){
        if(User::where('token', Route::input('token'))->pluck('id')){
            Session::put('message',['Regist Success!']);
            $userinfo=User::find(User::where('token', Route::input('token'))->pluck('id'));
            $userinfo->certification='passed';
            $userinfo->save();
        }
        Auth::attempt(['username' => Route::input('username'), 'password' => Route::input('password')]);
        return redirect('/');
    }

    public function getConsultantConfirmEmail(){
        if(User::where('token', Route::input('token'))->pluck('id')){
            Session::put('message',['Regist Success!']);
            $userinfo=User::find(User::where('token', Route::input('token'))->pluck('id'));
            $userinfo->certification='passed';
            $userinfo->save();
        }
        return redirect('/');
    }
}