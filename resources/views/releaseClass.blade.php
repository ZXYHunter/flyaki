<div>

@include('header',['title'=>$title])
    <div class="btn-group" data-toggle="buttons-radio">
        <button type="button" class="btn btn-primary">Left</button>
        <button type="button" class="btn btn-primary">Middle</button>
        <button type="button" class="btn btn-primary">Right</button>
    </div>
<link href="static/css/addclass.css" rel="stylesheet">
<link href="static/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="static/css/flat/blue.css" rel="stylesheet">
    <script type="text/javascript" src="static/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="static/js/icheck.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="static/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript" src="static/js/releaseClass.js" charset="UTF-8"></script>
<script>
    var userinfo = <?php echo json_encode($user) ?>;
</script>
    <script>
        $(document).ready(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat',
                radioClass: 'iradio_flat'
            });
        });
        $(document).ready(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });

        function adjustTime(){
            var st=$("[id='starttime']").val();
            $("[id='endtime']").val(st);
        }

    </script>
@include('usernav')

    <div class="row">
        <div class="col-md-12">
            <div class="banner" style="margin-top: 40px;margin-bottom:40px;">
                <img src="static/src/photo/banner20.png">
            </div>
            <div class="col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-8 col-sm-8 col-xs-8">
                    <div class="form-horizontal"  role="form">
                    <fieldset id="position">
                        <div class="form-group class-form">

                            <label class="col-md-2 col-sm-2 col-xs-2 control-label">选择开课时间</label>
                            <div class="input-group date form_date col-md-5"  data-date="2015-11-27" data-date-format="yyyy-mm-dd">
                                <input required class=" form-control cccontent" size="16" name="starttime" type="text" readonly>
                                <span id="listening" class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 ccbtn row">
                                <label class="col-md-3 col-sm-3 col-xs-3 control-label">选择时间范围(北京时间)</label>
                                <br><br>
                               
                                <div style="margin-left: 50px;margin-top: 20px;">
                                    @for($i=1;$i<=24;$i++)
                                        <input id="btn{{$i}}" name="timebtn" type="checkbox" style="width: 100px; font-size: 10px;"><span style="font-weight: bold;margin-right: 20px;margin-left: 20px;">{{$i-1}}:00-{{$i}}:00</span>
                                        @if($i%6==0)
                                            <br><br>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 ccbtn row">
                                <label class="col-md-2 col-sm-2 col-xs-2 control-label">选择服务种类</label>
                                <div style="margin-left: 50px;margin-top: 20px;" class="btn-group btn-group-lg" data-toggle="buttons-radio">
                                    <button type="button"  class="btn btn-default">个人潜力挖掘</button>
                                    <button type="button"  class="btn btn-default">模拟面试</button>
                                    <button type="button"  class="btn btn-default">文书建议方案</button>
                                    <button type="button" class="btn btn-default">择校专业咨询</button>
                                    <button type="button" class="btn btn-default">后期跟盯咨询</button>
                                    <button type="button" class="btn btn-default">其他咨询服务</button>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 ccbtn row">
                                <label class="col-md-2 col-sm-2 col-xs-2 control-label">设定咨询价格</label>
                                <input required type="number" min="0" class="ccinput form-control" name="price"><label>￥/hour</label>
                                <hr>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-sm-2 col-xs-2 control-label">课程简介</label>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                     <textarea name="introduction" class="form-control unresize" rows="5" placeholder="为了保护您的隐私，请不要再课程介绍中给出联系方式"></textarea>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </fieldset>
            </div>

            <div class="col-sm-offset-6 col-xs-offset-6 col-md-offset-6">
                <button type="submit" class="ybutton button button-border button-pill button-pill" onclick="postClasses()">添加课程</button>
               <a href="/consultantprocess"> <button style="margin-left: 20px;" type="submit" class="ybutton button button-border button-pill button-pill">下一步</button></a>
            </div>
        </div>
    </div>
</div>
