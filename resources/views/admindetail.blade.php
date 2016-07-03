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
<div class="col-md-12" style="background: linear-gradient(135deg, #16d1ac 0%, #4a90e2 100%)">
    <div>
        <img style="margin-top: 10px;margin-left: 10px;margin-bottom: 20px;height: 50px;" src="static/src/photo/icon.png">
    </div>
    <div class="well center-block" style="max-width: 98%;background-color: white;" >
        <ul class="nav nav-pills" style="margin-bottom: 10px;">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">Profile</a></li>
            <li role="presentation"><a href="#">Messages</a></li>
        </ul>
        <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>用户名</th>
                        <th>邮箱地址</th>
                        <th>手机号</th>
                        <th>性别</th>
                        <th>毕业院校</th>
                        <th>个人简介</th>
                        <th>学术成就</th>
                        <th>实习/工作经历</th>
                        <th>业务专长</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $userssNumber = count($users);?>
                    @for($i = 0;$i < $userssNumber ; $i++ )
                        <tr>
                            <th><?php echo $i+1 ?></th>
                            <th>{{$users[$i]['username']}}</th>
                            <th>{{$users[$i]['email']}}</th>
                            <th>{{$users[$i]['phone']}}</th>
                            <th>{{$users[$i]['gender']}}</th>
                            <th>{{$users[$i]['university']}}</th>
                            <th>{{$users[$i]['consultant']['briedintroduction']}}</th>
                            <th>{{$users[$i]['consultant']['academy']}}</th>
                            <th>{{$users[$i]['consultant']['experience']}}</th>
                            <th>{{$users[$i]['consultant']['strength']}}</th>
                        </tr>
                    @endfor
                    </tbody>
                </table>
        </div>
    </div>
</div>
