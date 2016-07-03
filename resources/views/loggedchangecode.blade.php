<div>
@include('header',['title'=>$title])
@include('usernav')
<div class="row">
    <div class="col-md-12">
        <div class="banner" style="margin-top: 40px;">
            <img src="static/src/photo/banner13.png">
        </div>
        <div class="col-md-offset-2 col-xs-offset-2 col-xs-8 col-md-8">
            <form method="post" action="/loggedchangecode">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <ul class="list-group" style="border:0px solid white;">
                    <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                        <div class="col-md-2 col-sm-3 col-xs-3 text-center attribute2">
                            <p>请输入原密码</p>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            <input  class="form-control" value="" name="oldpsw" placeholder="your old password">
                        </div>
                    </li>
                    <li style="height: 50px;border:0px solid white;" class="list-group-item">
                        <div class="col-md-2 col-sm-3 col-xs-3 text-center attribute2">
                            <p>请输入新密码</p>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            <input  class="form-control" value="" name="newpsw" placeholder="new password">
                        </div>
                    </li>
                    <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                        <div class="col-md-2 col-sm-3 col-xs-3 text-center attribute2">
                            <p>确认新密码</p>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            <input  class="form-control" value="" name="cnewpsw" placeholder="confirm new password">
                        </div>
                    </li>

                </ul>
                <div class="col-sm-3 col-xs-4 col-xs-offset-8 col-md-offset-9">
                    <button class="ybutton button button-border button-pill button-pill" type="submit">确认修改</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>