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
    <title>留学Go后台管理系统</title>
</head>
<body>
<div class="col-md-12" style="background-color: black;height:1000px;" >
    <div>
        <h2 style="font-family:monospace;margin-left: 20px;color: rgba(255,255,255,0.6);margin-bottom:50px;font-size: 30px;">御茗轩茶楼</h2>
    </div>
    <button  data-toggle="modal" data-target="#userphotoModel" style="margin-top:30px;" class="ybutton button button-border button-pill button-pill">上传头像</button>
</div>

<div class="modal fade" id="userphotoModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">上传头像</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-8">
                            <div class="row" id="userphotoFileForm_row">
                                <div class="col-md-4 col-md-offset-4">
                                    <br/>
                                    <br/><br/>
                                    <br/>
                                    <form id="userphotoFileForm" action="/userphotoupload" method="post" enctype="multipart/form-data">
                                        <a class="input-file joinbutton button button-border button-pill button-pill"><input type="file" name="userphoto"  onchange="submitUserphoto()">上传头像</a>
                                    </form><br/><br/>
                                </div>
                                <div class="row">
                                </div>

                            </div>
                            <div id="userphoto_origin_div" class="img img-responsive">
                                <img id="userphoto_origin" class="img-responsive" hidden="hidden">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <p class="text-left text-primary">预览</p>
                            <br/>
                            <div style="width:200px;height:200px;margin:10px;overflow:hidden; float:left;">
                                <img  style="float:left;" id="userphoto_preview" >
                            </div>
                        </div>
                        <form id="userphotoConfirmForm" action="/userphotoconfirm" method="post" hidden="hidden">
                            <input type="hidden" id="src" name="src" />
                            <input type="hidden" id="x" name="x" />
                            <input type="hidden" id="y" name="y" />
                            <input type="hidden" id="w" name="w" />
                            <input type="hidden" id="h" name="h" />
                            <input type="hidden" id="oldw" name="oldw"/>
                            <input type="hidden" id="oldh" name="oldh"/>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="resetUserphotoModal()">取消</button>
                    <button id="userphotoUploadBtn" type="button" class="btn btn-default disabled" onclick="uploadUserphotoInfo()">上传</button>
                </div>
            </div>
        </div>
    </div>
</div>