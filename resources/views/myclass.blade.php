@include('header',['title'=>$title])
<link href="static/css/myclass.css" rel="stylesheet">
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
            content : '<div class="media"><div class="media-left media-middle"><a href="#"><img class="media-object" src="static/src/photo/product_1.png"></a></div><div class="mcmediatext media-body"><h4 class="media-heading">私人定制</h4>对于留学过程的基本了解，私人定制你的申请学校和专业计划，只要你想，就有提高的空间，跟导师一起挖掘你的潜力吧。</div></div>',
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


<div style="margin-top: 160px" class=" col-md-9 mcpanel">
    <h2>我的课程</h2>
    <hr/>
    <div class="row col-md-12 mcrecord">
        <div class="row pic col-md-4">
            <h2>顾问</h2>
        </div>
        <div class="row  mccontent" >
            <h2>您注册的由（顾问名）提供的<a href="#" rel="jumpout">
                  {{--  <span class="glyphicon glyphicon-shopping-cart"> </span>--}} 课程
                </a>将在</h2> <h1>2</h1><h2>小时候开始</h2>
            <div class="col-md-12 mcbtn">
                <button  class="btn btn-primary">私信顾问</button>
                <button  class="btn btn-danger">取消预订</button>
            </div>
        </div>
        <div class=" row col-md-12">
            <hr>
        </div>
    </div>
    <div class="row col-md-12 mcrecord">
        <div class="row pic col-md-4">
            <h2>顾问</h2>
        </div>
        <div class="row  mccontent" >
            <h2>您注册的由（顾问名）提供的<a href="#" rel="jumpout">
                    {{--  <span class="glyphicon glyphicon-shopping-cart"> </span>--}} 课程
                </a>将在</h2> <h1>2</h1><h2>小时候开始</h2>
            <div class="col-md-12 mcbtn">
                <button  class="btn btn-primary">私信顾问</button>
                <button  class="btn btn-danger">取消预订</button>
            </div>
        </div>
        <div class=" row col-md-12">
            <hr>
        </div>
    </div>
    <div class="row col-md-12 mcrecord">
        <div class="row pic col-md-4">
            <h2>顾问</h2>
        </div>
        <div class="row  mccontent" >
            <h2>您注册的由（顾问名）提供的<a href="#" rel="jumpout">
                    {{--  <span class="glyphicon glyphicon-shopping-cart"> </span>--}} 课程
                </a>将在</h2> <h1>2</h1><h2>小时候开始</h2>
            <div class="col-md-12 mcbtn">
                <button  class="btn btn-primary">私信顾问</button>
                <button  class="btn btn-danger">取消预订</button>
            </div>
        </div>
        <div class=" row col-md-12">
            <hr>
        </div>
    </div>


</div>