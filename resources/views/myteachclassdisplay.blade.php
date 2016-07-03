<div class="row" id="myTeachClassDisplay_{{ $class['id'] }}">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <a href="/space_{{ $consultant['user_id'] }}">
            @if($class['status']=='booked')
            <img class="consultant_icon" src="static/src/photo/booked.png" >
                @else
                <img class="consultant_icon" src="static/src/photo/unbooked.png" >
                @endif
        </a>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-4">
        <input type="hidden" id="bookedClassDisplay_{{ $class['id'] }}_price" value="{{ $class['price'] }}">
        <p class="text-primary lead" id="bookedClassDisplay_formatPrice"><span class="classname">{{ $class['introduction'] }}</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: rgba(255,183,0,1);" class="glyphicon glyphicon-yen"><kbd>{{ floor($class['price']) }}<small>{{ substr(sprintf('%.2F',$class['price'] - floor($class['price'])),1) }}</small></kbd></span></p>
        <p class="text-primary text-center class-services"  style="margin-bottom: 5px;" id="bookedClassDisplay_services_{{ $class['id'] }}"></p>
        <p class="lead" style="margin-bottom: 5px;">{{ '开课时间：'.substr($class['starttime'],0,10) }}</p>
        <p class="lead"  style="margin-bottom: 5px;">{{ $class['showtime'] }}</p>
    @if($class['status']=='booked')
            <p class="lead" style="margin-bottom: 5px;">课程状态：已被选</p>
           <p class="lead" style="margin-bottom: 5px;">选课人： <a href="">{{ $class['user']['username'] }}</a></p>
        @else
            <p class="lead" style="margin-bottom: 5px;">课程状态：未被选</p>
        @endif
    </div>
    <div class=" col-md-2 col-sm-2 col-xs-2">
        <br>
            @if($class['status']=='booked')
            <button style="width:150px;" class="ybutton button button-border button-pill button-pill" data-toggle="modal" data-target="#expectationModel">结束课程</button>
            <br><br>
         <button style="width:150px;" class="ybutton button button-border button-pill button-pill" onclick="popmessage('{{ $class['user']['username'] }}')">私信TA</button>
                <br><br>
            <a href="https://opentokrtc.com/{{ $class['id'] }}_{{ $class['user']['id'] }}">
                <button style="width:150px; padding-left:0px;padding-right:0px;"  class="ybutton button button-border button-pill button-pill" >进入视频房间</button>
            </a>
        @endif
        @if($class['status']=='unbooked')
            <button style="width:150px;" class="ybutton button button-border button-pill button-pill" data-toggle="modal" data-target="#expectationModel">取消课程</button>
        @endif
    </div>
    <script>
        function popmessage(name){
            $('#messagebox-btn').click();
            $('#messagebox_write_btn').click();
            $("[name='receiver']").val(name);
        }
    </script>

</div>


<div class="modal fade" id="expectationModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">填写课前咨询重点</h4>
            </div>
            <div class="modal-body">
                <form id="expectation_form" method="post" action="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group" >
                        <p style="font-size: 20px;margin-left: 50px">您确定要结束这门课程么？</p>
                     </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">不，好像还没</button>
                <button id="expectation_btn"  onclick="sureclass( {{ $class['id']}})" type="button" class="btn btn-primary">确定呢</button>
            </div>
        </div>
    </div>
</div>
<script>
    function sureclass(cid){
        var data = {};
        data['classid'] = cid;
        ajaxData2('/goteach',data);
        self.location="/goteach"
    }
</script>
