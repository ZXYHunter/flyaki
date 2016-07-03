<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta property="qc:admins" content="4604663745055776727" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="islogin" content="{{ Auth::check()?'1':'0' }}" />
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/css/bookedClassDisplay.css" rel="stylesheet">
    <link href="static/css/header.css" rel="stylesheet">
    <link href="static/css/buttons.css" rel="stylesheet">
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/header.js"></script>
    <script src="static/js/headroom.js"></script>
    <script src="static/js/flat-ui.min.js"></script>
    <script src="static/js/jquery.bootstrap-autohidingnavbar.js"></script>
    <meta name=“keyword” content=“LiuxueGo”>
    <title>{{ $title }}</title>
    <!--Start of Zopim Live Chat Script-->
    <script type="text/javascript">
        window.$zopim||(function(d,s){
            var z=$zopim=function(c){z._.push(c)},$=z.s= d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set._.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
            $.src="//v2.zopim.com/?3Wma6b1krdo2JjOuiSRSkcbgD5eVjuod";z.t=+new Date;
            $.type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>
    <!--End of Zopim Live Chat Script-->
</head>

<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation" >
    <div class="container-fluid navbar-bg">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="nav-icon navbar-brand navbar-brand-text" href="/"><img src="static/src/photo/icon.png"></a>
        </div>
        <br/>
        <div id="navbar" class="navbar-collapse collapse">
            @if(!Auth::check())
                <div class="navbar-right">
                    <button name="register" type="button" class="nav-auth-btn btn" data-toggle="modal" data-target="#registModel">
                        注册
                    </button>
                    <button name="login" id="login_btn" type="button" class="nav-auth-btn btn" data-toggle="modal" data-target="#loginModel">
                        登录
                    </button>

                </div>
            @else
                <div class="navbar-right">
                    <div class="row">
                        <div class="col-md-6">
                        <a style="margin-left: 50%;" href="/space_{{Auth::user()->getAuthIdentifier()}}">
                            <img class="usericon" src="{{ DB::table('users')->where('id', Auth::user()->getAuthIdentifier())->pluck('photoaddr') }}">
                            <p style="margin-left: 50%; color: #000000;">{{ DB::table('users')->where('id', Auth::user()->getAuthIdentifier())->pluck('name') }}</p>
                        </a></div>
                        <div class="col-md-6">
                    <button style="margin-top: -10px;" class="nav-auth-btn btn btn-sm btn-primary navbar-btn" type="button" id="messagebox-btn">
                       私信<span class="badge {{ Session::get('messagebox')['count'] == 0 ? '':'empty' }}">{{ Session::get('messagebox')['count'] }}</span>
                    </button>
                    <a style="margin-top: -10px;" href="/logout">
                    <button type="button" class=" nav-auth-btn btn btn btn-sm btn-primary navbar-btn" >
                        登出
                    </button></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="container-fluid navbar-bg2">
        <div id="navbar" class=" navbar-collapse collapse " style="width:100%;">
            <ul class="nav-position nav navbar-nav" style="float:none;">
                <li class="navbar-li"><a class="navbar-a" href="/">首页<div class="new1"></div></a></li>
                <li class="navbar-li"><a class="navbar-a" href="/shop">留学购商城<div class="new2"></div></a></li>
                <li class="navbar-li"><a class="navbar-a" href="/join">顾问入驻<div class="new3"></div></a></li>
                <li class="navbar-li"><a class="navbar-a" href="/member">个人中心<div class="new1"></div></a></li>
            </ul>
        </div>
    </div>
    </div>
</div>
<a class="btt btn btn--plain hide-from-print slide slide--reset" href="#" id="btt">Top <i class="icon icon--up"></i></a>
<div class="modal fade" id="registModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">注册用户</h4>
            </div>
            <div class="modal-body">
                <form id="regist_form" method="post" action="/register">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group" >
                        <label>用户名<small  style="margin-left:15px;">(用于登陆，需大于6个字符)</small></label>
                        <input name="username" class="form-control" type="text" placeholder="Account Username">
                    </div>
                    <div class="form-group" >
                        <label>电子邮箱</label>
                        <input name="email" class="form-control" type="email" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label>密码</label>
                        <input name="password" class="form-control" type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>确认密码</label>
                        <input name="password_confirmation" class="form-control" type="password" placeholder="Confirm Password">
                    </div>
                    <div class="checkbox"><label><input type="checkbox" name="agreement" id="checkbox" value="option1">阅读并接受<a href="/registerRequest" target="_blank">《留学Go用户协议》</a></label></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="regist_btn" onclick="$('#regist_form').submit()" type="button" class="btn btn-primary">注册</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="loginModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">称号获得</h4>
            </div>
            <div class="modal-body">
               <h3>恭喜您，逻辑值达到 <span style="color: #985f0d">15</span> 点，获得称号</h3>
                <br><br>
                <h2>思维缜密者</h2>
                <br>
                <div style="text-align: right">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="login_btn" onclick="$('#login_form').submit()" type="button" class="btn btn-primary">登录</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">提示信息</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div id="message-content" class="col-md-6">
                            @if(Session::has('message'))
                                @foreach(Session::pull('message',null) as $onemessage)
                                    <div class="alert alert-warning">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        {{ $onemessage }}
                                    </div>
                                @endforeach
                                <script>
                                    $('#messageModel').modal('show');
                                </script>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">知道了</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("div.navbar-fixed-top").autoHidingNavbar();
</script>