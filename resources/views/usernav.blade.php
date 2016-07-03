<script src="static/js/jquery.form.min.js"></script>
<script src="static/js/userphotoupload.js"></script>
<script src="static/js/jquery.Jcrop.js" type="text/javascript"></script>
<link rel="stylesheet" href="static/css/jquery.Jcrop.css" type="text/css" />
<link rel="stylesheet" href="static/css/usernav.css" type="text/css" />

    <div class="banner" style="margin-top:10%;">
        <img src="static/src/photo/banner10.png">
        <div class="showicon text-center">
            <div class="visible-xs" style="margin-top:-200px;height: 1px;"></div>
            <div class="visible-xs visible-sm" style="margin-top:-400px;height: 1px;"></div>
            <img class="img-circle" src="{{ $user['photoaddr'] }}" alt="Source Error">
            <h2>{{ $user['name'] }}</h2>
            <button  data-toggle="modal" data-target="#userphotoModel" style="margin-top:30px;" class="joinbutton button button-border button-pill button-pill">上传头像</button>
        </div>
    </div>
    <div class="banner" style="margin-top: 20px;">
        <img src="static/src/photo/banner11.png">
    </div>
    <div class="text-center" style="margin-bottom: 20px;">
        <div class="title col-xs-2 col-xs-offset-2 col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">
            <h3>个人信息</h3>
            <a href="/member" class="joinbutton button button-border button-pill button-pill">个人信息</a>
            <br><br>
            <a href="/loggedchangecode" class="joinbutton button button-border button-pill button-pill">修改密码</a>
        </div>
        <div class="title col-md-2 col-sm-2 col-xs-2">
            <h3 class="showwell">选课中心</h3>
            <a href="/myclasses" class="joinbutton button button-border button-pill button-pill">我的选课</a>

        </div>
        <div class="title col-md-2 col-sm-2 col-xs-2">
            <h3 class="showwell">授课中心</h3>
            @if( $user['consultant']['certification']=='passed')
                <a href="/goteach" class="joinbutton button button-border button-pill button-pill">&nbsp;&nbsp;去授课&nbsp;&nbsp;</a>
                <br><br>
                <a href="/releaseclass" class="joinbutton button button-border button-pill button-pill">发布课程</a>
            @endif
        </div>
        <div class="title col-md-2 col-sm-2 col-xs-2">
            <h3>加入顾问</h3>
            @if(!$user['consultant']['certification'])
                <a href="/consultantBasicInfo" class="joinbutton button button-border button-pill button-pill">基础信息</a>
                <br><br>
            @endif
                @if($user['consultant']['certification']=='applying')

                    <a href="/consultantBrainstorm" class="joinbutton button button-border button-pill button-pill">头脑风暴</a>
                <br><br>
                @endif
                @if($user['consultant']['certification']=='s2')

                    <a href="/consultantDetail" class="joinbutton button button-border button-pill button-pill">专业信息</a>
                    <br><br>
                @endif
                @if($user['consultant']['certification']=='s3')

                    <a href="/consultantTest" class="joinbutton button button-border button-pill button-pill">入驻测试</a>
                    <br><br>
                 @endif
                @if($user['consultant']['certification']=='s4')
                    <a href="/releaseclass" class="joinbutton button button-border button-pill button-pill">添加课程</a>

            @endif
        </div>
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