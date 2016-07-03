<?php

namespace NeverTest\Http\Controllers;

use Monolog\Handler\NullHandlerTest;
use NeverTest\Classunit;
use NeverTest\Agency;
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

class IdentityController extends Controller {

    public function getidentity()
    {
        return view('identitylogin');
    }
    public function  postidentity(){
        $psw= Request::input('password');
        if($psw=='yumingxuan'){
            Session::put('message',["登陆成功"]);
            return redirect('/identitydetail');
        }
        else{
            Session::put('message',["登陆成功"]);
            return redirect('/identity_error');
        }
    }
    public function getidentitydetail(){
        $users= User::all();
        $data = ['users'=>$users];
        return view('identitydetail',$data);
    }
}