@include('header',['title'=>$title])
<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101255783" data-redirecturi="http://liuxuego.org/create_new_account" charset="utf-8"></script>

<script type="text/javascript">
    //从页面收集OpenAPI必要的参数。get_user_info不需要输入参数，因此paras中没有参数
    var paras = {};
    //用JS SDK调用OpenAPI
    QC.api("get_user_info", paras)
        //指定接口访问成功的接收函数，s为成功返回Response对象
            .success(function(s){
                //成功回调，通过s.data获取OpenAPI的返回数据
                $("[name='qqname']").val(s.data.nickname);
            })
        //指定接口访问失败的接收函数，f为失败返回Response对象
            .error(function(f){
                //失败回调
                alert("获取用户信息失败！");
            })
        //指定接口完成请求后的接收函数，c为完成请求返回Response对象
            .complete(function(c){
                //完成请求回调
                alert("获取用户信息完成！");
            });
</script>

<div style="margin-top: 160px" class="row">
    <link rel="stylesheet" href="static/css/usernav.css" type="text/css" />
    <div id="panelcontent_findcode" class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 panel panel-success" style="margin-top: 50px;  border-color: rgba(26,192,234,1);">
        <div id="panelcontent_title_findcode" style=" background-color:rgba(26,192,234,1); color:white;" class="panel-heading">
            <span class="glyphicon glyphicon-search"></span> <strong>完善信息注册新用户</strong>
        </div>
        <div id="panelcontent_body_findcode" class="panel-body">
            <form  id="qqregist_form" method="post" action="/qqregister">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="qqname" value="">
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
                        <button  class="joinbutton2 button button-border button-pill"  onclick="$('#qqregist_form').submit()">建立账户</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>