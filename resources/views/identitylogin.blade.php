<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/css/buttons.css" rel="stylesheet">
    <link href="static/css/admin.css" rel="stylesheet">
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/header.js"></script>
    <script src="static/js/flat-ui.min.js"></script>
    <script src="static/js/jquery.form.min.js"></script>
    <script src="static/js/userphotoupload.js"></script>
    <script src="static/js/jquery.Jcrop.js" type="text/javascript"></script>
    <link rel="stylesheet" href="static/css/jquery.Jcrop.css" type="text/css" />
    <link rel="stylesheet" href="static/css/usernav.css" type="text/css" />
    <title>御茗轩茶楼后台管理系统</title>
</head>
<body>
<div class="row">
    <div class="col-md-12 n-container">
        <div>
            <h2 style="font-family:monospace;margin-left: 20px;color: rgba(255,255,255,0.6);font-size: 30px;">御茗轩茶楼</h2>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 style="margin-top: 100px;color: rgba(255,255,255,0.8);font-weight: lighter;">
                    御茗轩茶楼后台管理系统
                </h2>
                @if($error!=null)
                    <h4 style="color: red">
                        输入密码错误，请重试
                    </h4>
                @endif
                <form method="post" action="/identity">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <input style="margin: 20px auto;width: 40%;" autofocus class="form-control" value="" name="password" placeholder="请输入登陆密码">
                        <button style="margin-left: 10px;background-color: #32d1ac;color: white" class=" button button-rounded" type="submit">登陆</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>