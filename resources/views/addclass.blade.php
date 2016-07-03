@include('header',['title'=>$title])
<link href="static/css/addclass.css" rel="stylesheet">
<link href="static/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<script type="text/javascript" src="static/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="static/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<div class="container col-md-12 col-sm-12 col-xs-12"  style="margin-top: 160px" >
    <div class="col-md-10 col-sm-10 col-xs-10">
        <form action="#" class="form-horizontal"  role="form">
            <fieldset>
                <script type="text/javascript">
                    $(function(){
                        $(':button[name=add]').click(function(){
                            insertTr();
                        })
                    })
                    function insertTr(){
                        var html='<div class="form-group">';
                        html+='<label for="dtp_input1" class="col-md-2 col-sm-2 col-xs-2 control-label">选择开课时间</label>';
                        html+='<div class="input-group date form_date col-md-5 col-sm-5 col-xs-5"  data-date="1979-09-16" data-date-format="dd MM yyyy" data-link-field="dtp_input1">';
                        html+='<input class="form-control" size="16" type="text" value="" readonly>';
                        html+='<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>';
                        html+='<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>';
                        html+='</div>';
                        html+='<div class="col-md-12 col-sm-12 col-xs-12 ccbtn row"><label for="dtp_input1" class="col-md-2 col-sm-2 col-xs-2 control-label">选择服务种类</label> <div class="btn-group btn-group-lg" data-toggle="buttons-checkbox" role="group " aria-label="..."> <button type="button" class="btn btn-default">个人潜力挖掘</button> <button type="button" class="btn btn-default">模拟面试</button> <button type="button" class="btn btn-default">文书建议方案</button> <button type="button" class="btn btn-default">择校专业咨询</button> <button type="button" class="btn btn-default">后期跟盯咨询</button> <button type="button" class="btn btn-default">其他咨询服务</button> </div> </div> <div class="col-md-12 ccbtn row"> <label for="dtp_input1" class="col-md-2 col-sm-2 col-xs-2 control-label">输入咨询价格</label> <input class="ccinput form-control"><label>￥/hour</label><hr> </div>';
                        html+=' <input type="hidden" value="" /><br/><br/>';
                        html+='</div>';
                        $('#position').append(html);
                        $('.form_date').datetimepicker();
                    }
                </script>
                <div class=" form-group">
                    <label for="dtp_input1" class="col-md-2 col-sm-2 col-xs-2 control-label">选择开课时间</label>
                    <div class="input-group date form_date col-md-5 col-sm-5 col-xs-5"  data-date="1979-09-16" data-date-format="dd MM yyyy" data-link-field="dtp_input1">
                        <input id="text123"  class=" form-control cccontent" size="16" type="text" value="" readonly>
                        <span id="listening" class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 ccbtn row">
                        <label for="dtp_input1" class="col-md-2 col-sm-2 col-xs-2 control-label">选择服务种类</label>
                        <div class="btn-group btn-group-lg" data-toggle="buttons-checkbox" role="group " aria-label="...">
                            <button type="button" class="btn btn-default">个人潜力挖掘</button>
                            <button type="button" class="btn btn-default">模拟面试</button>
                            <button type="button" class="btn btn-default">文书建议方案</button>
                            <button type="button" class="btn btn-default">择校专业咨询</button>
                            <button type="button" class="btn btn-default">后期跟盯咨询</button>
                            <button type="button" class="btn btn-default">其他咨询服务</button>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 ccbtn row">
                        <label for="dtp_input1" class="col-md-2 col-sm-2 col-xs-2 control-label">输入咨询价格</label>
                        <input class="ccinput form-control"><label>￥/hour</label>
                        <hr>
                    </div>

                    <input type="hidden" id="dtp_input1" value="" /><br/><br/>
                </div>
                <div id="position"></div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-2 col-sm-4 col-xs-4  col-sm-offset-2 col-xs-offset-2">
                        <input type="button"class="btn btn-success" name="add" value="add more classes">
                        <button type="submit" class="btn btn-primary">提交课程</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
    <script>
        $('.form_datetime').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
        $('.form_date').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
        $('.form_time').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
        });
    </script>