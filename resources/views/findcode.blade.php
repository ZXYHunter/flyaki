@include('header',['title'=>$title])
<div style="margin-top: 160px" class="row">
    <link rel="stylesheet" href="static/css/usernav.css" type="text/css" />
<div id="panelcontent_findcode" class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 panel panel-success" style="margin-top: 50px;  border-color: rgba(26,192,234,1);">
    <div id="panelcontent_title_findcode" style=" background-color:rgba(26,192,234,1); color:white;" class="panel-heading">
        <span class="glyphicon glyphicon-search"></span> <strong>修改密码</strong>
    </div>
    <div id="panelcontent_body_findcode" class="panel-body">
        <form method="post" action="/findcode">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 col-xs-2 control-label">邮箱</label>
                        <div class="col-sm-10 col-sm-10 col-xs-10">
                            <input type="email" class="form-control" value="" name="email" placeholder="E-mail">
                        </div>
                    </div>
                </div>
            </div>
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-8 col-s-offsetm-8 col-xs-offset-8">
                <br>
                    <button  class="joinbutton2 button button-border button-pill" type="submit">发送邮件</button>
            </div>
          </div>
        </form>
    </div>
</div>
</div>