<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="buttons.css" rel="stylesheet">

    <title>留学Go后台管理系统</title>
</head>
<style>
    .container{
        color: #444444;
        margin-top: 50px;
    }
    .container-1 img{
        display: inline;
        width: 80%;
    }
    .container-2{
        padding-left: 20px;
        border-left: solid 2px #FF6600;
        border-width: medium;

    }
    .container hr{
        border-color: ;
        border-width: 2px;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .container-3 img{
        margin-top: 30px;
        margin-bottom: 30px;
        margin-left:2.5%;
        margin-right: 2.5%;
    }
</style>
<body>
<div class="container">
    <div class="row" style="margin:0 auto;background-color: white;" >
        <div class="col-md-12">
            <div class="container-1 col-md-2">
                <img class=" img-circle" src="user/photo/thumb/134.png">
            </div>
            <div class="col-md-8 container-2" >
                <h2>｛｛名字｝｝</h2>
                <h2>｛｛宣言｝｝</h2>
            </div>
        </div>

        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <h2 style="border-left: solid 2px #FF6600;border-width: medium;padding-left: 10px;">
              活动介绍
            </h2>
            <p style="font-weight: bold;font-family: 微软雅黑">
                ｛｛文字内容｝｝<br>
                ｛｛文字内容｝｝<br>
                ｛｛文字内容｝｝<br>
                ｛｛文字内容｝｝
            </p>
        </div>

        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <h2 style="border-left: solid 2px #FF6600;border-width: medium;padding-left: 10px;">
                TA的照片墙
            </h2>
            <div class="container-3">
                <img src="user/photo/thumb/134.png" class="img-rounded" style="width: 18%">
                <img src="user/photo/thumb/134.png" class="img-rounded" style="width: 18%">
                <img src="user/photo/thumb/134.png" class="img-rounded" style="width: 18%">
                <img src="user/photo/thumb/134.png" class="img-rounded" style="width: 18%">
            </div>
        </div>

        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <h2 style="border-left: solid 2px #FF6600;border-width: medium;padding-left: 10px;">
                排行榜
            </h2>
            <div class="table-responsive">
                <table class="table table-hover" style="vertical-align: middle">
                    <thead>
                    <tr>
                        <th style="width: 5%"></th>
                        <th style="width: 60%"></th>
                        <th style="width: 15%"></th>
                        <th style="width: 15%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th> <img class="img-responsive img-circle" src="user/photo/thumb/134.png"></th>
                            <th style="vertical-align: middle">｛｛$users[$i]['username']｝｝</th>
                            <th style="vertical-align: middle">第1名</th>
                            <th style="vertical-align: middle">12121票</th>
                        </tr>
                        <tr>
                            <th> <img class="img-responsive img-circle" src="user/photo/thumb/134.png"></th>
                            <th style="vertical-align: middle">｛｛$users[$i]['username']｝｝</th>
                            <th style="vertical-align: middle">第2名</th>
                            <th style="vertical-align: middle">12121票</th>
                        </tr>
                        <tr style="background-color: rgba(255,102,0,0.4)">
                            <th> <img class="img-responsive img-circle" src="user/photo/thumb/134.png"></th>
                            <th style="vertical-align: middle">｛｛$users[$i]['username']｝｝</th>
                            <th style="vertical-align: middle">第3名</th>
                            <th style="vertical-align: middle">12121票</th>
                        </tr>
                        <tr>
                            <th> <img class="img-responsive img-circle" src="user/photo/thumb/134.png"></th>
                            <th style="vertical-align: middle">｛｛$users[$i]['username']｝｝</th>
                            <th style="vertical-align: middle">第4名</th>
                            <th style="vertical-align: middle">12121票</th>
                        </tr>
                        <tr>
                            <th> <img class="img-responsive img-circle" src="user/photo/thumb/134.png"></th>
                            <th style="vertical-align: middle">｛｛$users[$i]['username']｝｝</th>
                            <th style="vertical-align: middle">第5名</th>
                            <th style="vertical-align: middle">12121票</th>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <div style="margin: 0 auto;">
            <button style="width:30%;margin-left: 5%;background-color: #FF6600;color: white" class=" button button-rounded">给TA投票</button>
            <button style="width:30%;margin-left: 30%;background-color: #FF6600;color: white" class=" button button-rounded">我要报名</button>
        </div>
    </div>
</div>