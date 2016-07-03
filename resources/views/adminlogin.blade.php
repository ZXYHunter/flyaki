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
    <title>留学Go后台管理系统</title>
</head>
<body>
<div class="row">
    <div class="col-md-12 n-container">
        <div>
            <img style="margin-top: 20px;margin-left: 80px;height: 50px;" src="static/src/photo/icon.png">
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 style="margin-top: 100px;color: rgba(255,255,255,0.8);font-weight: lighter;">
                    留学Go后台管理系统
                </h2>
                @if($error!=null)
                    <h4 style="color: red">
                       输入密码错误，请重试
                    </h4>
                @endif
                <form method="post" action="/admin">
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