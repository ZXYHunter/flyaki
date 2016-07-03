function showRequest(){
    return true;
}
function submitUserphoto()
{
    var options = {
        beforeSubmit:  showRequest,  //提交前处理
        success:       loadUploadedUserphoto,  //处理完成
        resetForm: true,
        dataType:  'json'
    };
    $('#userphotoFileForm').ajaxSubmit(options);
}

function submitUserphoto1()
{
    var options = {
        beforeSubmit:  showRequest,  //提交前处理
        success:       loadUploadedUserphoto1,  //处理完成
        resetForm: true,
        dataType:  'json'
    };
    $('#userphotoFileForm').ajaxSubmit(options);
}
function loadUploadedUserphoto(result,status)
{
    $('#userphotoUploadBtn').removeClass('disabled');
    $('#userphotoFileForm_row').hide();
    $('#userphoto_origin').attr('src',result['userphotopath']).show();
    $('#src').val(result['userphotopath']);
    $('#userphoto_preview').attr('src',result['userphotopath']).show();
    var jcrop_api, boundx, boundy;
    $('#userphoto_origin').Jcrop({
            minSize: [60,60],
            setSelect: [0,0,200,200],
            onChange: updatePreview,
            onSelect: updatePreview,
            onSelect: updateCoords,
            aspectRatio: 1
        },
        function(){
            // Use the API to get the real image size
            var bounds = this.getBounds();
            boundx = bounds[0];
            boundy = bounds[1];
            // Store the API in the jcrop_api variable
            jcrop_api = this;
            $('#oldw').val(boundx);
            $('#oldh').val(boundy);
            $('#x').val(0);
            $('#y').val(0);
            $('#w').val(200);
            $('#h').val(200);
        });
    function updateCoords(c)
    {

        var bounds = this.getBounds();
        boundx = bounds[0];
        boundy = bounds[1];
        $('#oldw').val(boundx);
        $('#oldh').val(boundy);
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };
    function checkCoords()
    {
        if (parseInt($('#w').val())) return true;
        alert('Please select a crop region then press submit.');
        return false;
    };
    function updatePreview(c){
        if (parseInt(c.w) > 0)
        {
            var rx = 200 / c.w;		//小头像预览Div的大小
            var ry = 200 / c.h;
            $('#userphoto_preview').css({
                width: Math.round(rx * boundx) + 'px',
                height: Math.round(ry * boundy) + 'px',
                marginLeft: '-' + Math.round(rx * c.x)+'px',
                marginTop: '-' + Math.round(ry * c.y)+'px'
            });
        }
    };
}


function loadUploadedUserphoto1(result,status)
{
    result['name']='115.png';
    result['userphotopath']='user/photo/thumb/115.png';
    $('#userphotoUploadBtn').removeClass('disabled');
    $('#userphotoFileForm_row').hide();
    $('#userphoto_origin').attr('src',result['userphotopath']).show();
    $('#src').val(result['userphotopath']);
    $('#userphoto_preview').attr('src',result['userphotopath']).show();
    var jcrop_api, boundx, boundy;
    $('#userphoto_origin').Jcrop({
            minSize: [60,60],
            setSelect: [0,0,200,200],
            onChange: updatePreview,
            onSelect: updatePreview,
            onSelect: updateCoords,
            aspectRatio: 1
        },
        function(){
            // Use the API to get the real image size
            var bounds = this.getBounds();
            boundx = bounds[0];
            boundy = bounds[1];
            // Store the API in the jcrop_api variable
            jcrop_api = this;
            $('#oldw').val(boundx);
            $('#oldh').val(boundy);
            $('#x').val(0);
            $('#y').val(0);
            $('#w').val(200);
            $('#h').val(200);
        });
    function updateCoords(c)
    {

        var bounds = this.getBounds();
        boundx = bounds[0];
        boundy = bounds[1];
        $('#oldw').val(boundx);
        $('#oldh').val(boundy);
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };
    function checkCoords()
    {
        if (parseInt($('#w').val())) return true;
        alert('Please select a crop region then press submit.');
        return false;
    };
    function updatePreview(c){
        if (parseInt(c.w) > 0)
        {
            var rx = 200 / c.w;		//小头像预览Div的大小
            var ry = 200 / c.h;
            $('#userphoto_preview').css({
                width: Math.round(rx * boundx) + 'px',
                height: Math.round(ry * boundy) + 'px',
                marginLeft: '-' + Math.round(rx * c.x)+'px',
                marginTop: '-' + Math.round(ry * c.y)+'px'
            });
        }
    };
}

function uploadUserphotoInfo()
{
    var options = {
        success:       afterUploadUserphotoInfo,  //处理完成
        resetForm: true,
        dataType:  'json'
    };
    $('#userphotoConfirmForm').ajaxSubmit(options);
}
function afterUploadUserphotoInfo(messages,status)
{
    $('#userphotoModel').modal('hide');
    showAlertMessages(messages,status);
    location.reload();
}
function resetUserphotoModal()
{
    $('#userphotoFileForm_row').show();
    $('#userphoto_origin_div').empty();
    var userphoto_origin_img = $('<img>').attr('id','userphoto_origin').addClass('img-responsive').attr('hidden','hidden');
    $('#userphoto_origin_div').append(userphoto_origin_img);
    $('#userphoto_preview').hide();
}