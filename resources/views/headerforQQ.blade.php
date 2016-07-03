<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta property="qc:admins" content="4604663745055776727" />
    <meta name=“keyword” content=“LiuxueGo”>
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
    <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101255783" data-redirecturi="http://liuxuego.org/create_new_account" charset="utf-8"></script>
    <title>{{ $title }}</title>
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
                    <button type="button" class="nav-auth-btn btn" data-toggle="modal" data-target="#registModel">
                        注册
                    </button>
                    <button type="button" class="nav-auth-btn btn" data-toggle="modal" data-target="#loginModel">
                        登录
                    </button>
                    <span id="qqLoginBtn" style="margin-top:8px;margin-right: 20px;vertical-align: middle"></span>
                    <script type="text/javascript" >
                        QC.Login({
                            btnId:"qqLoginBtn"    //插入按钮的节点id
                        });
                    </script>

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
                <li class="navbar-li"><a class="navbar-a" href="/comment">留学评评<div class="new4"></div></a></li>
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
                </form>
                <p >PS:<br>为了得到较好的使用体验，请使用内核版本较高的浏览器，推荐:Chrome,FireFox,Opera等</p>
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
                <h4 class="modal-title">用户登录</h4>
            </div>
            <div class="modal-body">
                <form id="login_form" method="post" action="/login">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group" >
                        <label>用户名</label>
                        <input id="login-username" name="username" class="form-control login-field" type="text" placeholder="Account Username">
                    </div>
                    <div class="form-group">
                        <label>密码</label>
                        <input name="password" class="form-control" type="password" placeholder="Password">
                    </div>
                </form>
                <div>

                    <a style="text-align: right;display: inherit;" href="/findcode">忘记密码？通过注册邮箱找回密码</a>
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