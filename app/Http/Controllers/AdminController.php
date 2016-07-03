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


class AdminController extends Controller{
    public function getadmin()
    {
        return view('adminlogin');
    }
    public function  postadmin(){
        $psw= Request::input('password');
        if($psw=='aceoffer2015'){
            Session::put('message',["登陆成功"]);
            return redirect('/admindetail');
        }
        else{
            Session::put('message',["登陆成功"]);
            return redirect('/admin_error');
        }
    }
    public function getadmindetail(){
        $users= User::all();
        $data = ['users'=>$users];
        return view('admindetail',$data);
    }
}