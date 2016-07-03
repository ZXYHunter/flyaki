$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#messagebox-btn").popover({
        trigger:'manual',
        placement : 'bottom', //placement of the popover. also can use top, bottom, left or right
        title : '<div class="btn-group"><button id="messagebox_receive_btn" class="btn btn-primary btn-sm" onclick="getMessageBox(' + "'" + 'received' + "'" + ')">收件箱</button><button id="messagebox_send_btn" class="btn btn-primary btn-sm" onclick="getMessageBox(' + "'" + 'send' + "'" + ')">发件箱</button><button id="messagebox_write_btn" class="btn btn-sm btn-primary" onclick="getSendMessageBoxModal()">写私信</button></div>', //this is the top title bar of the popover. add some basic css
        html: 'true', //needed to show html of course
        content : '<div id="messagebox-content"></div>',
        animation: true
    }).on("click", function () {
        var _this = this;
        $(this).popover("toggle");
    });

    $( document ).ajaxError(function( event, request, settings ) {
        showAjaxError(event['type'],request['status'],request['statusText'],request['responseText']);
    });
});
function getSendMessageBoxModal()
{
    $('#messagebox-content').empty();
    var modal = $('<div></div>').attr('id','messagebox-edit-form').attr('data-target','/messagebox/send');
    $(modal).append(getFormGroup('发送给:','receiver','text','接收人昵称','input-sm').attr('id',"receivername"));
    $(modal).append(getFormGroup('标题:','title','text','Title','input-sm'));
    $(modal).append(getFormGroup('正文:','content','textarea','',''));
    $(modal).append(getFormBtn('发送','btn-success','btn-block','btn-sm','messagebox-edit-form',postFormByFormbtn,'showAlertMessages').attr('id',"sendbtn"));
    $('#messagebox-content').append(modal);
}
function getFormBtn(btnText,btnColor,btnBlock,btnSize,targetFormName,btnClickFunc,dataProcessFunc)
{
    var btn = $('<button></button>').append(btnText).addClass('btn').addClass(btnColor).addClass(btnBlock).addClass(btnSize).attr('data-form',targetFormName).attr('data-recall',dataProcessFunc).on('click',btnClickFunc);
    return btn;
}
function postFormByFormbtn()
{
    var formID = $(this).attr('data-form');
    var postAddress = $('#' + formID).attr('data-target');
    var recallFunc = $(this).attr('data-recall');
    ajaxOneFormByID(formID,postAddress,recallFunc);
}
function ajaxOneFormByID(formID,postAddress,recallFunc)
{
    var data = getFormData($('#' + formID));
    ajaxData(postAddress,data,recallFunc);
}
function getFormData(formElement){
    var data = {};
    $(formElement).find('input').each(function() {
        var name = $(this).attr('name');
        if(name) {
            if(name=='timebtn'){
                data['time']='';
                var str='#btn';
                for(var i=1;i<=24;i++){
                    var tmp=str+''+i;
                    if($(tmp).prop("checked")){
                        data['time']+='1';
                    }else{
                        data['time']+='0';
                    }
                }
                data['time']+='';
            }
            var val = $(this).val();
            if(!val)
                val = $(this).attr('placeholder');
            data[name] = val;
        }
        if(isNull(data[name])) {
            throw new Error(name + '表单输入框为空或者输入不合法！',1);
        }
    });
    $(formElement).find('textarea').each(function() {
        var name = $(this).attr('name');
        if(name) {
            var val = $(this).val();
            if(!val)
                val = $(this).attr('placeholder');
            data[name] = val;
        }
        if(isNull(data[name])) {
            console.log(formElement);
            throw new Error( name + '文本输入框不能为空！',1);
        }
    });
    return data;
}
function isNull(data)
{
    return (data == null || data == '' || data == undefined) ? true : false;
}
function ajaxData(postAddress,data,recallFunc)
{
    $.post(postAddress,data,function(result,status){
       eval(recallFunc)(result,status);
    });
}
function ajaxData2(postAddress,data)
{
    $.post(postAddress,data,function(result,status){
    ;
    });
}
function showAjaxError(ErrorType,status,message,responseText){
    var messages = Array();
    messages[0] = Array();
    messages[0]['class'] = 'alert-warning';
    messages[0]['message'] = ErrorType + "(" + status.toString() + ")  :  " + message;
    messages[0]['message'] += responseText;
    showAlertMessages(messages,null);
}
function showAlertMessages(messages,status){
    var messagesContent;
    for(var i = 0 ; i < messages.length ; i++)
    {
        if(i == 0) messagesContent = getMessageAlert(messages[i]['class'],null,messages[i]['message']);
        else $(messagesContent).after(getMessageAlert(messages[i]['class'],null,messages[i]['message']));
    }
    showMessage(messagesContent);
}
function getMessageAlert(alertClass,label,message)
{
    var alertDiv = $('<div></div>').addClass('alert').addClass(alertClass);
    $(alertDiv).append(label);
    $(alertDiv).append(message);
    return alertDiv
}
function showMessage(messageContent){
    $('#message-content').empty();
    $('#message-content').append(messageContent);
    $('#messageModel').modal('show');
}
function getFormGroup(labelText,inputName,inputType,inputPlaceholder,inputSize)
{
    var formgroup = $('<div></div>').addClass('form-group');
    var label = $('<label></label>').append(labelText);
    if(inputType != 'textarea') {
        var input = $('<input>', {
            type: inputType,
            name: inputName,
            placeholder: inputPlaceholder
        }).addClass(inputSize).addClass('form-control');
    }
    else
    {
        var input = $('<textarea></textarea>',{
            name:inputName,
            placeholder:inputPlaceholder,
            rows:8,
        }).addClass('unresize').addClass('form-control');
    }
    $(formgroup).append(label).append(input);
    return formgroup;
}
function getMessageBox(type)
{
    var messageCount = 1;
    $('#messagebox-content').empty();
    var data = {};
    data ['type'] = type;
    var provider = type == 'send'?'receiver':'sender';
    $.post("/messagebox/catch", data, function(messages,status) {
        var messagePanelGroup = $('<div ></div>').addClass('panel-group').attr('role','tablist').attr('aria-multiselectable',false);
        for(var i in messages)
        {
            var messagePanel = $('<div></div>').addClass('panel').addClass('panel-warning');
            var messagePanelHead = $('<div style="margin:0px auto;" role="button" data-toggle="collapse" data-parent="#message-group" class="header-a" href="#collapse' + messageCount.toString() + '" aria-expanded="true" aria-controls="collapse' + messageCount.toString() + '"></div>').addClass('panel-heading').attr('role','tab').attr('id',"heading" + messageCount.toString());
            var messagePanelHeadTitle = $('<small></small>').addClass('text-default');
            var pretitle = "";
            pretitle += messages[i]['plaintext'][type][0];
            if(messages[i][provider]['consultant']!=null){
                pretitle += '<a href="/space_' + messages[i][provider]['id'] + '"><span class="label header-label label-default">' + messages[i][provider]['name'] + '</span></a>';
            }
            else{
                pretitle += '<span class="label header-label label-default">' + messages[i][provider]['name'] + '</span>';

            }
            pretitle += messages[i]['plaintext'][type][1] + "<br/>&nbsp;&nbsp;&nbsp;&nbsp;";
            var suftitle = '<span  style="font-size: 16px;margin-left: 20px;" >' + messages[i]['title'] + '</span>';
            messagePanelHeadTitle.append(pretitle).append(suftitle);
            messagePanelHead.append(messagePanelHeadTitle);
            var messagePanelCollapse = $('<div></div>').attr('id','collapse' + messageCount.toString()).addClass('panel-collapse').addClass('collapse').attr('role','tappanel').attr('aria-labelledby','heading' + messageCount.toString());
            var messagePanelCollapseBody = $('<div></div>').addClass('panel-body').append(messages[i]['content']);

            var replytitle="'"+"回复:";
            replytitle+=messages[i]['title'];
            replytitle+="'";

            var replyname="'"+messages[i][provider]['name']+"'";

            //更改 收件箱 或 发件箱 中每条信息的内容
            var replybutton = "<button style= 'margin: 0px 1px 1px auto;font-size: 5px;vertical-align: middle;display: block;padding: 0px;' class='replybtn  button headerbutton button-border button-pill' id='"+messages[i][provider]['name']+"'"+" name="+replytitle+" onclick='showmes(this)'>点击回复</button>";

            if(type=='received'){
                messagePanelCollapseBody.append(replybutton);
            }
            messagePanelCollapse.append(messagePanelCollapseBody);
            messagePanel.append(messagePanelHead).append(messagePanelCollapse);
            messageCount++;
            $(messagePanelGroup).append(messagePanel);
        }
        $('#messagebox-content').append(messagePanelGroup);
    });

}
function showmes(a){
    $('#messagebox_write_btn').click();
    $("[name='receiver']").val(a['id']);
    $("[name='title']").val(a['name']);
}

function catchClientError(e){
    var messages = Array();
    var message = Array();
    message['type'] = 'error';
    message['class'] = 'alert-warning';
    message['message'] = 'Client Error : ' + e.name + "<hr/>&nbsp;&nbsp;&nbsp;&nbsp;" + e.message;
    messages[0] = message;
    showAlertMessages(messages,'');
}
function login()
{
    $("#login_btn").attr("disabled",true);
    var data = {};
    $('#login_form input').each(function() {
        alert("两次输入的密码不一致！");
        var name = $(this).attr('name').substr(6);
        if(name) {
            var val = $(this).val();

            if(!val)
                val = $(this).attr('placeholder');

            data[name] = val;
        }
    });
    var param = {'login':data};
    $.post("/login", param, function(result,status) {
        switch (result){
            case 'success':
                document.location.reload();
                break;
            case 'username':
                $("#login_username_group").addClass("has-error");
                $("#login_username_group").addClass("has-feedback");
                break;
            case 'password':
                $("#login_password_group").addClass("has-error");
        }
        $("#login_btn").attr("disabled",false);
    });
}
function regist()
{
    $("#regist_btn").attr('disabled',true);
    var data = {};
    $('#regist_form input').each(function() {
        var name = $(this).attr('name').substr(7);
        if(name) {
            var val = $(this).val();
            if(!val)
                val = $(this).attr('placeholder');
            data[name] = val;
        }
    });
    var param = {'regist':data};
    $.post("/register", param, function(result,status) {
        switch(result){
            case 'password':
                alert("两次输入的密码不一致！");
                break;
            case 'phone':
                alert('用户已经被注册！');
                break;
            case 'success':
                alert("注册成功！");
                $('#registModel').modal('hide');
                break;
            case 'fail':
                alert('未知错误，注册失败！');
                $('#registModel').modal('hide');
                break;
            default :
                alert("未知返回结果！");
        }
        $("#regist_btn").attr('disabled',false);
    });
}
function changebtn1(element)
{
    $("#index_form_btn").html(element + '<span class="caret"></span>');
    $("#edu_way").val(element);
}

function getServiceInfo(){
    var serviceInfo = Array();
    var serviceNumber = 6;
    for(var i = 0; i < serviceNumber; i++) {
        serviceInfo[i] = Array();
    }
    serviceInfo[0]['name'] = '个人潜力挖掘';
    serviceInfo[1]['name'] = '文书建议方案';
    serviceInfo[2]['name'] = '模拟面试';
    serviceInfo[3]['name'] = '择校专业咨询';
    serviceInfo[4]['name'] = '后期跟盯咨询';
    serviceInfo[5]['name'] = '其他咨询服务';
    serviceInfo[0]['detail'] = '咨询细节——个人潜力挖掘';
    serviceInfo[1]['detail'] = '咨询细节——文书建议方案';
    serviceInfo[2]['detail'] = '咨询细节——模拟面试';
    serviceInfo[3]['detail'] = '咨询细节——择校专业咨询';
    serviceInfo[4]['detail'] = '咨询细节——后期跟盯咨询';
    serviceInfo[5]['detail'] = '咨询细节——其他咨询服务';
    return serviceInfo;
}
function getServiceBtnGroupData(formElement)
{
    var btnNumber = 0;
    var data = {};
    var hadChoseServices = 0;;
    $(formElement).find('.btn-group button').each(function(){
        if($(this).hasClass('active'))
        {
            data[btnNumber] = 1;
            hadChoseServices = 1;
        }
        else
            data[btnNumber] = 0;
        btnNumber ++;
    });
    if(hadChoseServices == 0)
        throw new Error('未编辑服务类型！',2);
    return data;
}

function getServicesLabels(services)
{
    var serviceInfo = getServiceInfo();
    var labels = $('<div></div>').addClass('row');
    var brCheck = 0;
    for(var i = 0 ; i <= services.length; i++)
    {
        if(services[i] == '1')
        {
            var labelDiv = $('<div></div>').addClass('col-sm-4').addClass('service_position');
            var labelSpan = $('<p></p>').addClass('label').addClass('label-default');
            labelSpan.append(serviceInfo[i]['name']);
            labelDiv.append(labelSpan);
            labels.append(labelDiv);
            brCheck ++;
        }
        if(brCheck >= 3)
        {
            var brDiv = $('<div></div>').addClass('col-sm-12').append($('<br/>'));
            labels.append(brDiv);
            brCheck = 0;
        }
    }
    return labels;
}


function isLogin()
{
    return $('meta[name="islogin"]').attr('content') == '1';
}