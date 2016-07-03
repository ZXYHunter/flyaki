

/**
 * Created by v5 on 2015/7/3.
 */
$(function(){
    $('.form_datetime').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
})

function insertTr(){
    var html='<div class="form-group class-form">';
    html+='<label class="col-md-2 control-label">选择开课时间</label>';
    html+='<div class="input-group date form_date col-md-5"  data-date="' + $('.date input:last').val() + '" data-date-format="' + $('.date:first').attr('data-date-format') + '">';
    html+='<input name="starttime" required class="form-control" size="16" type="text" value="" readonly>';
    html+='<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>';
    html+='<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>';
    html+='</div>';
    html+='<div class="col-md-12 col-sm-12 col-xs-12 ccbtn row"> <label class="col-md-3 col-sm-3 col-xs-3 control-label">选择时间范围(北京时间)</label> <br><br> <div style="margin-left: 50px;margin-top: 20px;">';
     for(var i=1;i<=24;i++){

         html+='<input id=str name="timebtn" type="checkbox" style="width: 100px; font-size: 10px;"><span style="font-weight: bold;margin-right: 20px;margin-left: 20px;">'+(i-1)+':00-'+i+':00</span>';
        if(i%6==0){
            html+='<br><br>';
        }
     }
    html+='</div>';

    html+='<div class="col-md-12 ccbtn row"><label class="col-md-2 control-label">选择服务种类</label> <div class="btn-group btn-group-lg" data-toggle="buttons-checkbox" role="group " aria-label="..."> <button type="button" class="btn btn-default">个人潜力挖掘</button> <button type="button" class="btn btn-default">模拟面试</button> <button type="button" class="btn btn-default">文书建议方案</button> <button type="button" class="btn btn-default">择校专业咨询</button> <button type="button" class="btn btn-default">后期跟盯咨询</button> <button type="button" class="btn btn-default">其他咨询服务</button> </div> </div> <div class="col-md-12 ccbtn row"> <label class="col-md-2 control-label">输入咨询价格</label> <input name="price" required type="number" min="0" class="ccinput form-control"><label>￥/hour</label><hr> </div><div class="row"><label class="col-md-2 control-label">课程简介</label> <div class="col-md-6"> <textarea name="introduction" class="form-control unresize" rows="5"></textarea> </div> </div><hr/>';
    html+='</div>';
    $('#position').append(html);
    $('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
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

}

function postClasses()
{
    var data = {};
    var formCount = 0;
    try {
        $('.class-form').each(function () {
            data[formCount] = getFormData(this);
            data[formCount]['services'] = getServiceBtnGroupData(this);
            formCount++;
        });

        ajaxData('/releaseclass', data, showAlertMessages);
    }
    catch(e)
    {
        catchClientError(e);
    }
}