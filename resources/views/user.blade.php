<div>
@include('header',['title'=>$title])
<script>
    var userinfo = <?php echo json_encode($user) ?>;
</script>

@include('usernav')
    <div class="row">
        <div class="col-md-12">
            <div class="banner" style="margin-top: 40px;">
                <img src="static/src/photo/banner12.png">
            </div>
            <div class="col-md-offset-2 col-md-8 col-xs-offset-2 col-xs-8 col-sm-offset-2  col-sm-8">
                <form method="post" action="/member">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="list-group" style="border:0px solid white;">
                        <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>用户名</p>
                            </div>
                            <div class="col-sm-10 col-sm-10 col-xs-10">
                                <input type="text" class="form-control" value="{{ $user['username'] }}" disabled placeholder="Username">
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>邮箱</p>
                            </div>
                            <div class="col-sm-10 col-sm-10 col-xs-10">
                                <input type="email" class="form-control" value="{{ $user['email'] }}" name="email" disabled placeholder="E-mail">
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>昵称</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $user['name'] }}" placeholder="天啦撸!">
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>性别</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <div class="bootstrap-switch-square">
                                    <input id="gendercheckbox" type="checkbox" name="gender" checked data-toggle="switch" id="custom-switch-03" data-on-color="success" data-off-color="info" data-on-text="<span>男</span>" data-off-text="<span>女</span>" />
                                </div>
                             </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>手机</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <input type="text" class="form-control" value="{{ $user['phone'] }}" name="phone" placeholder="Phone Number">
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>QQ</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <input type="number" class="form-control" name="qq" value="{{ $user['qq'] }}" placeholder="Tencent QQ Number">
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>学校</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <input type="text" class="form-control" id="userinfo_university" value="{{ $user['university'] }}" name="university" placeholder="university">
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>学位</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <input type="text" class="form-control" id="userinfo_degree" value="{{ $user['degree'] }}" name="degree" placeholder="Degree">
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>专业</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <input type="text" class="form-control" id="userinfo_major" value="{{ $user['major'] }}" name="major" placeholder="Major">
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>个性签名</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <input class="form-control"  id="userinfo_signature" value="{{ $user['signature'] }}" name="signature" placeholder="Your signature">
                            </div>
                        </li>
                        <li style="height: 220px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>简介</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <textarea class="form-control unresize" rows="8" id="userinfo_introduction" name="introduction" placeholder="Your Introduction">{{ $user['introduction'] }}</textarea>
                            </div>
                        </li>
                    </ul>
                    <div class="col-sm-3 col-xs-3 col-xs-offset-9 col-md-offset-9  col-md-3 col-md-offset-9">
                        <button class="ybutton button button-border button-pill button-pill" type="submit">保存</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <script>
        // Switches
        $(function()
        {
            if ($('[data-toggle="switch"]').length) {
                $('[data-toggle="switch"]').bootstrapSwitch();
            }
            if(userinfo['gender'] == 'female')
                $('#gendercheckbox').click();
        });
    </script>
</div>
