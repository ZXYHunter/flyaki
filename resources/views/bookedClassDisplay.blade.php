<script type=“text/javascript” src=“http://download.skype.com/share/skypebuttons/js/skypeCheck.js”
        xmlns="http://www.w3.org/1999/html"></script>
<div class="row" id="myTeachClassDisplay_{{ $class['id'] }}">
    <div class="col-md-4 col-sm-4 col-xs-4">
        <a href="/space_{{ $consultant['user_id'] }}">
            <img class="consultant_icon" src="{{ $consultant['user']['photoaddr'] }}" >
        </a>
    </div>
    <div class="col-md-5 col-sm-5 col-xs-5">
        <input type="hidden" id="bookedClassDisplay_{{ $class['id'] }}_price" value="{{ $class['price'] }}">
        <p class="text-primary lead" id="bookedClassDisplay_formatPrice"><span class="classname">{{ $class['introduction'] }}</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: rgba(255,183,0,1);" class="glyphicon glyphicon-yen"><kbd>{{ floor($class['price']) }}<small>{{ substr(sprintf('%.2F',$class['price'] - floor($class['price'])),1) }}</small></kbd></span></p>
        <p class="text-primary text-center class-services"  id="bookedClassDisplay_services_{{ $class['id'] }}"></p>
        <p style="margin-top:20px;font-size: 20px;" class="text-left">{{ '上课时间: '.substr($class['starttime'],0,10) }}<span style="margin-left:20px;font-weight:bold;">{{ $class['showtime'] }}</span></p>
        <p class="text-primary text-left consultantname"  id="bookedClassDisplay_consultantname">个人顾问：{{ $class['consultant']['user']['username'] }}</p>
        @if($class['status']!='finished')
                <p style="display: inline;font-size: 17px; font-family: '微软雅黑">课程状态：未结束</p>
        @else
                <p style="display: inline;font-size: 17px; font-family: '微软雅黑">课程状态：已结束</p>
        @endif
    </div>
    <div class=" col-md-2 col-sm-2 col-xs-2">
            @if($class['status']=='finished')
                    <button  id="judgement_{{ $class['id'] }}_btn" style="width:150px;" class="ybutton button button-border button-pill button-pill" data-toggle="modal" data-target="#judgeModel_{{ $class['id'] }}">评价课程</button>
                @else
                            <button style="width:150px;" class="ybutton button button-border button-pill button-pill" onclick="unbookClass({{ $class['id'] }})">取消课程</button>
                            <br> <br>
                            <a href="https://opentokrtc.com/{{ $class['id'] }}_{{ $class['user']['id'] }}">
                                <button style="width:150px; padding-left:0px;padding-right:0px;"  class="ybutton button button-border button-pill button-pill" >进入视频房间</button>
                            </a>
                            <br> <br>
                            <button style="width:150px;padding-left:5px;padding-right:5px;" class="ybutton button button-border button-pill button-pill" data-toggle="modal" data-target="#expectationModel_{{ $class['id'] }}">填写课前咨询重点</button>
                            @endif
    </div>
        <script>
        $(function (){
            var services = <?php echo $class['type']; ?>;
            $('#bookedClassDisplay_services_{{ $class['id'] }}').append(getServicesLabels(services));
        });
        function popmessage(){
            $('#messagebox-btn').click();
            $('#messagebox_write_btn').click();
            $("[name='receiver']").val('{{ $class['consultant']['user']['username'] }}');
        }
        function expectationupdate(){
            $('#messagebox-btn').click();
            $('#messagebox_write_btn').click();
            $econtent=$("[name='expectation']").val();
            $("[name='receiver']").val('{{ $consultant['user']['name'] }}');
            $("[name='title']").val('来自{{ $user['name'] }}的课前咨询');
            $("[name='content']").val('老师您好，我是{{ $user['name'] }}，我预订了您在{{ ''.substr( $class['starttime'],0,10) }}的课程，以下是我的课前咨询内容：\n'+$econtent);
            $('#sendbtn').click();
            $('#cancel').click();
            $('#messagebox-btn').click();
        }

    </script>
    <div class="modal fade" id="skypeModel_{{ $class['consultant']['skypeid'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-left:-100px;width:800px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Skype提示</h4>
                </div>
                <div class="modal-body">
                    <h4 style="text-align:center;position: absolute;top: 200px;left: 35%;">{{ $class['consultant']['user']['username'] }}：{{ $class['consultant']['skypeid'] }}</h4>
                    <img style="width: 100%" src="static/src/photo/skypecall.png">
                </div>
                <div class="modal-footer">
                    <button  type="button" data-dismiss="modal" class="btn btn-primary">通话结束</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade"   id="expectationModel_{{ $class['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <label>请填写你需要解答的问题</label>
                        <textarea id="expectation" name="expectation" class="form-control login-field unresize" rows="5" type="text" placeholder=""></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="expectation_btn"  onclick="expectationupdate()" type="button" class="btn btn-primary">提交</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="judgeModel_{{ $class['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">顾问课程评价</h4>
            </div>
            <div class="modal-body">
                    <div>
                        <label>请输入您对顾问的打分（10分满） </label><br>
                        <input id="judgement_{{ $class['id'] }}" class="login-field unresize" type="number" name="judgement_input_{{ $class['id'] }}" min="1" max="10" />
                        <br>
                        <label>请输入您对顾问的评价 </label><br>
                        <textarea id="comment_{{ $class['id'] }}" style="width: 100%;" class="login-field " rows="4" name="comment_input_{{ $class['id'] }}" ></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="expectation_btn"  onclick="judge({{ $class['id'] }},{{ $consultant['id'] }})" type="button" class="btn btn-primary">提交</button>
            </div>
        </div>
    </div>
</div>

<script>
    function judge(seed,cid){
        var obj=document.getElementById('judgement_'+seed);
        var obj2=document.getElementById('comment_'+seed);
        var number= obj.value;
        var comment= obj2.value;
        if(number>10||number<1)
        {
            alert('请输入1~10之间的数字');
        }else{
            var data = {};
            data['consultantid'] = cid;
            data['classid']=seed;
            data['number']=number;
            data['comment']=comment;
            ajaxData2('/myclasses',data);
            self.location="/myclasses"
        }

    }
</script>