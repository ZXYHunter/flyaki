@include('header',['title'=>$title])
<link href="static/css/classlist.css" rel="stylesheet">
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    $(function(){
        $("[rel=jumpout]").popover({
            trigger:'manual',
            placement : 'right', //placement of the popover. also can use top, bottom, left or right
            title : '<div style="text-align:center; color:gray; font-size:14px;"> 服务简介</div>', //this is the top title bar of the popover. add some basic css
            html: 'true', //needed to show html of course
            content : '<div class="media"><div class="media-left media-middle"><a href="#"><img class="media-object" src="static/src/photo/product_1.png"></a></div><div class="mcmediatext media-body"><h4 class="media-heading">私人定制</h4>对于留学过程的基本了解，私人定制你的申请学校和专业计划，只要你想，就有提高的空间，跟导师一起挖掘你的潜力吧。</div><hr></div><div class="media"><div class="media-left media-middle"><a href="#"><img class="media-object" src="static/src/photo/product_1.png"></a></div><div class="mcmediatext media-body"><h4 class="media-heading">私人定制</h4>对于留学过程的基本了解，私人定制你的申请学校和专业计划，只要你想，就有提高的空间，跟导师一起挖掘你的潜力吧。</div></div><hr>',
            animation: false
        }).on("mouseenter", function () {
            var _this = this;
            $(this).popover("show");
            $(this).siblings(".popover").on("mouseleave", function () {
                $(_this).popover('hide');
            });
        }).on("mouseleave", function () {
            var _this = this;
            setTimeout(function () {
                if (!$(".popover:hover").length) {
                    $(_this).popover("hide")
                }
            }, 100);
        });
    });
</script>


<div class=" col-md-9 mcpanel col-sm-9 col-xs-9"  style="margin-top: 160px">
    <h2>顾问课程</h2>
    <hr/>
    <div class="row col-md-12 col-sm-12 col-xs-12 mcrecord">
        <div class="row pic col-md-4">
            <h2>顾问</h2>
        </div>
        <div class="row  mccontent" >
            <h2>顾问名的<a href="#" rel="jumpout">
                    {{--  <span class="glyphicon glyphicon-shopping-cart"> </span>--}} 课程
                </a>将在</h2> <h1>2015/7/6</h1><h2>开始</h2>
            <div class="col-md-12 col-sm-12 col-xs-12 mcbtn">
                <button  class="btn btn-primary">私信顾问</button>
                <button  class="btn btn-danger"  data-toggle="modal" data-target="#bookModel">预约课程</button>
            </div>
        </div>
        <div class=" row col-md-12 col-sm-12 col-xs-12">
            <hr>
        </div>
    </div>
    <div class="row col-md-12 col-sm-12 col-xs-12 mcrecord">
        <div class="row pic col-md-4 col-sm-4 col-xs-4">
            <h2>顾问</h2>
        </div>
        <div class="row  mccontent" >
            <h2>您注册的由（顾问名）提供的<a href="#" rel="jumpout">
                    {{--  <span class="glyphicon glyphicon-shopping-cart"> </span>--}} 课程
                </a>将在</h2> <h1>2</h1><h2>小时候开始</h2>
            <div class="col-md-12 col-sm-12 col-xs-12 mcbtn">
                <button  class="btn btn-primary">私信顾问</button>
                <button  class="btn btn-danger">取消预订</button>
            </div>
        </div>
        <div class=" row col-md-12 col-sm-12 col-xs-12 ">
            <hr>
        </div>
    </div>
    <div class="row col-md-12  col-sm-12 col-xs-12 mcrecord">
        <div class="row pic col-md-4 col-sm-4 col-xs-4 ">
            <h2>顾问</h2>
        </div>
        <div class="row  mccontent">
            <h2>您注册的由（顾问名）提供的<a href="#" rel="jumpout">
                    {{--  <span class="glyphicon glyphicon-shopping-cart"> </span>--}} 课程
                </a>将在</h2> <h1>2</h1><h2>小时候开始</h2>
            <div class="col-md-12 col-sm-12 col-xs-12  mcbtn">
                <button  class="btn btn-primary">私信顾问</button>
                <button  class="btn btn-danger">取消预订</button>
            </div>
        </div>
        <div class=" row col-md-12 col-sm-12 col-xs-12 ">
            <hr>
        </div>
    </div>
</div>


<div class="modal fade" id="bookModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p style="display: inline; color: gray" class="modal-title">预约课程</p> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body row" style="margin-left: 2%;">
                <div class=" form-group">
                        <label class="col-md-12 control-label">选择服务种类</label>
                        <div class="row btn-group btn-group-lg col-md-12"  role="group " aria-label="...">
                            <button type="button" class="btn btn-default">个人潜力挖掘</button>
                            <button type="button" class="btn btn-default">模拟面试</button>
                            <button type="button" class="btn btn-default">文书建议方案</button>
                            <button type="button" class="btn btn-default">择校专业咨询</button>
                            <button type="button" class="btn btn-default">后期跟盯咨询</button>
                            <button type="button" class="btn btn-default">其他咨询服务</button>
                        </div>
                    <div class="row col-md-12">
                        <label  class="col-md-12 control-label">服务价格为：<br><a class="price">300</a>￥/hour</label>
                    </div>
                    <div class="row col-md-12">
                        <label class="col-md-12 control-label">给顾问的留言</label>
                        <textarea class="form-control" style="width: 550px;height: 200px;" placeholder="请输入给顾问的留言内容，以帮助顾问更好的准备课程。"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="book_btn" onclick="" type="submit" class="btn btn-primary">确认预订</button>
            </div>
        </div>

    </div>
</div>
</div>
