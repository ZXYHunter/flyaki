<div>@include('header',['title'=>$title])
<script src="static/js/personalConsultant.js"></script>
<link href="static/css/consultantdisplay.css" rel="stylesheet">
<script src="static/js/consultantdisplay.js"></script>
    <link rel="stylesheet" href="static/css/usernav.css" type="text/css" />

    <link rel="stylesheet" href="static/css/shop.css" type="text/css" />
<script>
</script>
<div style="margin-top: 150px;;  border-color: rgba(26,192,234,1);" id="panelcontent_consultant_regist" class="panel panel-success">
        <div id="panelcontent_title_consultant" style="background-color:rgba(26,192,234,1); color:white;" class="panel-heading">
            <span class="glyphicon glyphicon-search"></span> <strong>私人顾问查询</strong>
        </div>
        <div id="panelcontent_body_consultant" class="panel-body">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2  col-sm-offset-2 col-xs-offset-2">
                    <div class="col-md-12" style=" rgba(255,183,0,1);">
                        <h4 style="margin-left:10px;color: rgba(26,192,234,1);font-family: '微软雅黑'">你的标签<small style="margin-left:20px;color: rgba(26,192,234,1);;font-family: '微软雅黑'">每一类型标签至少选择一项，可多选</small></h4>
                    </div>
                    <div>
                        <div id="input_tags" class="well well-lg" type="text" name="edu_major" style="width:70%;"><p>国家：</p><hr/><p>专业：</p><hr/><p>类型：</p></div>
                    </div>
                </div>
                <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                    <h4 class="label label-info">国家</h4>
                    <br/>
                    <br/>
                    <div class="btn-group btn-group-lg country" role="group" >
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="northamerica">北美</button>
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="british">英国</button>
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="singapore">新加坡</button>
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="korea">韩日</button>
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="australia">澳新</button>
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="southamerica">南美</button>
                    </div>
                    <br/>
                </div>
                <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                    <h4 class="label label-info">专业</h4>
                    <br/>
                    <br/>
                    <div class="btn-group btn-group-lg major" role="group" >
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="science">理科</button>
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="social">文科</button>
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="engineer">工科</button>
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="business">商科</button>
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="others">其它</button>
                    </div>
                    <br/>
                </div>
                <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                    <h4 class="label label-info">顾问类型</h4>
                    <br/>
                    <br/>
                    <div class="btn-group btn-group-lg type" role="group" >
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="undergraduate">本科</button>
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="graduate">研究生</button>
                        <button onclick="changeOption(this)" type="button" class="btn btn-default" value="phd">PhD</button>
                    </div>
                    <br/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-6 col-sm-offset-6 col-xs-offset-6">
                    <br/>
                    <button  class="joinbutton button button-border button-pill button-pill" onclick="consultantBasicInfoSubmit()">查询</button>
                </div>
            </div>
            <div class="row" style="margin-top: 100px;">
                    <div class="col-md-12 col-sm-12 col-xs-12" id="showresult">
                </div>
            </div>
        </div>
    </div>
<script>
    var allsavedTags= new Array();
    var allTags= new Array();
    var idmap=new Array();
    var photoaddrmap =new Array();
    var namemap =new Array();
    var universitymap =new Array();
    var degreemap =new Array();
    var count=0;
    @foreach($consultants as $consultantone){
      @if($consultantone['certification']=='passed')
            count++;
            idmap[count] ={{ $consultantone['user_id']}};
            namemap[count] = "{{ $consultantone['user']['name'] }}";
            photoaddrmap[count] = "{{ $consultantone['user']['photoaddr']}}";
            universitymap[count] = "{{ $consultantone['user']['university']}}";
            degreemap[count] = "{{ $consultantone['user']['degree']}}";
            allsavedTags[count] = <?php echo $consultantone['tag']? json_encode(['country'=>json_decode($consultantone['tag']['country']),'major'=>json_decode($consultantone['tag']['major']),'type'=>json_decode($consultantone['tag']['type'])]): '\'\'';?>;
            allTags[count] = new consultantTag(allsavedTags[count]);
        @endif
    }
    @endforeach
    var savedTags;
    var consultant = new consultantTag(savedTags);
</script>
    </div>