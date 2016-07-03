<link href="static/css/comment.css" rel="stylesheet">
<script src="static/js/jquery.form.min.js"></script>
<script src="static/js/userphotoupload.js"></script>
<script src="static/js/jquery.Jcrop.js" type="text/javascript"></script>
<div>
    @include('header',['title'=>$title])
    <div class="row" style="margin-top: 120px;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: rgba(255,120,0,1);height:60px;">
            <div  style="position:absolute; right:5%;margin-top: 10px;">
                <form method="post" action="/search">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <span style="position: absolute;margin-left: 15px;margin-top: 10px;" class="glyphicon glyphicon-search"></span><input style="background-color: white" class="button button-border button-pill button-pill" id="search"  class="form-control" value="" name="search" placeholder="搜索中介名称...">
                </form>
            </div>
        </div>
    </div>
    <div style="margin-left:5%;margin-top: 50px">
        <div class="col-md-5 col-sm-5 col-xs-5">
            <div class="row box" style="width:80%;">
                <div class="banner" style="margin-top: 10px;">
                    <img src="static/src/photo/banner22.png">
                </div>

                <?php $AgenciesNumber = count($topagencies);$count=0;?>
                @for($i = 0;$i < $AgenciesNumber&&$count<6;$i++)
                    <?php $topagencies[$i]['background'] = $i % 2 == 1 ? 'black':'white';?>
                    @include('topagencydisplay',['displayinfo'=>$topagencies[$i]])
                    <?php $count++;?>
                @endfor
            </div>
        </div>
        <div style="margin-left: -3%" class="col-md-7 col-sm-7 col-xs-7 ">
            <h3 class="c3title">热门标签</h3>
            <ul class="nav nav-pills" style="" role="tablist">

                <li role="presentation" class="active">
                        <div class="">
                            <a id="btn1"  href="#type1" aria-controls="type1" role="tab" data-toggle="tab" style="margin-right:10px;width:100px; padding-right: 0px;padding-left: 0px;" class="cmtbutton button button-border button-pill">留学申请</a>
                        </div>
                </li>
                <li role="presentation">
                    <div class="">
                        <a id="btn2"  href="#type2" aria-controls="type2" role="tab" data-toggle="tab" style="margin-right:10px;width:100px; padding-right: 0px;padding-left: 0px;" class="cmtbutton button button-border button-pill">国际项目</a>
                    </div>
                </li>
                <li role="presentation">
                    <div class="">
                        <a id="btn3" href="#type3" aria-controls="type3" role="tab" data-toggle="tab"  style="width:100px; padding-right: 0px;padding-left: 0px;" class="cmtbutton button button-border button-pill">语言培训</a>
                    </div>
                </li>
            </ul>
            <div class="tab-content row box" style="width:95%; margin-top:40px;">

                <div id="type1" class="tab-pane fade list-group"  role="tabpanel">
                    <div class="hat" style="height: 40px;background-color: rgba(255,120,0,1);">
                    </div>

                    <?php $AgenciesNumber = count($agencies);$count=0;?>
                    @for($i = 0;$i < $AgenciesNumber;$i++)
                        @if($agencies[$i]['apply_assistance'])
                            <?php $agencies[$i]['background'] = $count % 2 == 1 ? 'black':'white';?>
                            @include('agencydisplay',['displayinfo'=>$agencies[$i]])
                            <?php $count++;?>
                        @endif
                    @endfor
                    <div class="col-md-12">
                        <div class=" col-md-4 col-md-offset-1"></div>
                        <?php echo $agencies->render(); ?>
                    </div>
                    <div class="row">
                        <div style="margin-top: 10px;" class="col-md-4 col-sm-4 col-xs-4 col-xs-offset-8 col-md-offset-8">
                            <button style="width:120px;padding-left: 0px;padding-right: 0px;" class="cmtbutton button button-border button-pill button-pill"  data-toggle="modal" data-target="#JoinModel">中介入驻</button>
                        </div>
                    </div>
                </div>
                <div id="type2" class="tab-pane fade list-group"  role="tabpanel">
                    <div class="hat" style="height: 40px;background-color: rgba(255,120,0,1);">
                    </div>
                    <?php $AgenciesNumber = count($agencies);$count=0;?>
                    @for($i = 0;$i < $AgenciesNumber;$i++)
                        @if($agencies[$i]['international_project'])
                        <?php $agencies[$i]['background'] = $count % 2 == 1 ? 'black':'white';?>
                        @include('agencydisplay',['displayinfo'=>$agencies[$i]])
                        <?php  $count++;?>
                        @endif
                    @endfor
                    <div class="col-md-12">
                        <div class=" col-md-4 col-md-offset-1"></div>
                        <?php echo $agencies->render(); ?>
                    </div>
                    <div class="row">
                        <div style="margin-top: 10px;" class="col-md-4 col-sm-4 col-xs-4 col-xs-offset-8 col-md-offset-8">
                            <button style="width:120px;padding-left: 0px;padding-right: 0px;" class="cmtbutton button button-border button-pill button-pill"  data-toggle="modal" data-target="#JoinModel">中介入驻</button>
                        </div>
                    </div>
                </div>
                <div id="type3" class="tab-pane fade list-group"  role="tabpanel">
                    <div class="hat" style="height: 40px;background-color: rgba(255,120,0,1);">
                    </div>
                    <?php $AgenciesNumber = count($agencies);$count=0;?>
                    @for($i = 0;$i < $AgenciesNumber;$i++)
                        @if($agencies[$i]['language_training'])
                        <?php $agencies[$i]['background'] = $count % 2 == 1 ? 'black':'white';?>
                        @include('agencydisplay',['displayinfo'=>$agencies[$i]])
                        <?php  unset($agencies[$i]);$count++;?>
                        @endif
                    @endfor
                    <div class="col-md-12">
                        <div class=" col-md-4 col-md-offset-1"></div>
                        <?php echo $agencies->render(); ?>
                    </div>

                    <div class="row">
                        <div style="margin-top: 10px;" class="col-md-4 col-sm-4 col-xs-4 col-xs-offset-8 col-md-offset-8">
                            <button style="width:120px;padding-left: 0px;padding-right: 0px;" class="cmtbutton button button-border button-pill button-pill"  data-toggle="modal" data-target="#JoinModel">中介入驻</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="JoinModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/comment">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">中介入驻</h4>
                </div>
                <div class="modal-body">
                    <p>中介名称<span style="color: red">*</span></p>
                    <input id="companyname" class="form-control" value="" name="companyname" placeholder="" >
                    <br>
                    <p>公司地址<span style="color: red">*</span></p>
                    <input id="location" class="form-control" value="" name="location" placeholder="" >
                    <br>
                    <p>一句话简介<span style="color: red">*</span></p>
                    <input id="briefintro" class="form-control" value="" name="briefintro" placeholder="" >
                    <br>
                    <p>详细介绍（400字内）<span style="color: red">*</span></p>
                    <input id="detailedintro" class="form-control" value="" name="detailedintro" placeholder="" >
                    <br>
                    <p>联系电话<span style="color: red">*</span></p>
                    <input id="phone" class="form-control" value="" name="phone" placeholder="" >
                    <br>
                    <p>优惠信息（选填）</p>
                    <input id="discount" class="form-control" value="" name="discount" placeholder="" >
                    <br>
                    <p>业务类型</p>
                    <div style="vertical-align: middle;margin-left: 5%;">
                    <span >留学申请：</span><input  id="applyassistance" style="display:inline;width:20px;height: 20px;"class="form-control" value="1" name="applyassistance" placeholder="" type="checkbox">
                    <span >国际项目：</span><input id="internationalproject" style="display:inline;width:20px;height: 20px;" class="form-control" value="1" name="internationalproject" placeholder="" type="checkbox">
                    <span >语言培训：</span><input id="languagetraining" style="display:inline;width:20px;height: 20px;" class="form-control" value="1" name="languagetraining" placeholder="" type="checkbox">
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="">确认提交</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#btn1').click();
    $('#type1 a').click(function (e) {
        $(this).tab('show')
    })
    $('#type2 a').click(function (e) {
        $('this').tab('show')
    })
    $('#type3 a').click(function (e) {
        $('this').tab('show')
    })

    function judge(){
        var obj=document.getElementById('companyname');
        var obj2=document.getElementById('location');
        var obj3=document.getElementById('briefintro');
        var obj4=document.getElementById('detailedintro');
        var obj5=document.getElementById('discount');
        var obj6=document.getElementById('apply');
        var obj7=document.getElementById('language');
        var obj8=document.getElementById('international');
        var obj9=document.getElementById('phone');
        var companyname= obj.value;
        var location=obj2.value;
        var briefintro=obj3.value;
        var detailedintro=obj4.value;
        var discount= obj5.value;
        var applyassistance;
        var languagetraining;
        var internationalproject;
        if(obj6.checked){
            applyassistance=1;
        }
        if(obj7.checked){
            languagetraining=1;
        }
        if(obj8.checked){
            internationalproject=1;
        }
        var phone=obj9.value;
        var data = {};
        data['companyname'] = companyname;
        data['location']=location;
        data['briefintro']=briefintro;
        data['detailedintro']=detailedintro;
        data['discount']=discount;
        data['applyassistan{ce']=applyassistance;
        data['languagetraining']=languagetraining;
        data['internationalproject']=internationalproject;
        data['phone']=phone;
        ajaxData2('/comment',data);
    }
</script>