@include('header',['title'=>$title])
<link rel="stylesheet" href="static/css/usernav.css" type="text/css" />
<div class="row">
    <div id="panelcontent_findcode"  style="margin-top: 210px;;  border-color: rgba(26,192,234,1);" class="col-md-8 col-md-offset-2 col-sm-8 col-xs-8 col-sm-offset-2 col-xs-offset-2 panel panel-success">
        <div id="panelcontent_title_findcode" class="panel-heading" style=" background-color:rgba(26,192,234,1); color:white;">
            <span class="glyphicon glyphicon-search"></span> <strong>修改密码</strong>
        </div>
        <div id="panelcontent_body_findcode" class="panel-body">
            <form method="post" action="/changecode">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <input type="hidden" name="email" value="{{$data['email']}}">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-md-2 col-xs-2 control-label">输入验证码</label>
                            <div class="col-sm-10 col-md-10 col-xs-10">
                                <input  class="form-control" value="" name="checkcode" placeholder="check code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-md-2 col-xs-2 control-label">输入新密码</label>
                            <div class="col-sm-10">
                                <input  class="form-control" value="" name="newpsw" placeholder="new password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-xs-2 col-md-2 control-label">确认新密码</label>
                            <div class="col-sm-10 col-md-10 col-xs-10">
                                <input  class="form-control" value="" name="cnewpsw" placeholder="confirm new password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-2 col-xs-2 col-sm-offset-8 col-xs-offset-8 col-md-offset-8">
                        <br>
                        <button  class="joinbutton2 button button-border button-pill" type="submit">确认修改</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>