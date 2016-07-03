<div>
    <script src="static/js/wechatPersonalConsultant.js"></script>
    <link href="static/css/consultantdisplay.css" rel="stylesheet">
    <script src="static/js/consultantdisplay.js"></script>
    <link rel="stylesheet" href="static/css/usernav.css" type="text/css" />

    <link href="static/css/shop.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="utf-16">
    <link href="static/css/consultantdisplay.css" rel="stylesheet">
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/css/bookedClassDisplay.css" rel="stylesheet">
    <link href="static/css/header.css" rel="stylesheet">
    <link href="static/css/buttons.css" rel="stylesheet">
    <link href="static/css/text.css" rel="stylesheet">
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/header.js"></script>
    <script src="static/js/headroom.js"></script>
    <script src="static/js/flat-ui.min.js"></script>
    <script src="static/js/jquery.bootstrap-autohidingnavbar.js"></script>
    <script src="static/js/shop.js"></script>
    <div style="margin-top: 10px;;  border-color: rgba(26,192,234,1);" id="panelcontent_consultant_regist" class="panel panel-success">
        <div id="panelcontent_title_consultant" style="background-color:rgba(26,192,234,1); color:white;" class="panel-heading">
            <span class="glyphicon glyphicon-search"></span> <strong>私人顾问查询</strong>
        </div>
        <div id="panelcontent_body_consultant" class="panel-body">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2  col-sm-offset-2 col-xs-offset-2">
                    <div class="col-md-12" style=" rgba(255,183,0,1);">
                        <h4 style="margin-left:-10px;color: rgba(26,192,234,1);font-family: '微软雅黑'">你的标签<small style="margin-left:20px;color: rgba(26,192,234,1);;font-family: '微软雅黑'">请选择您想要查找的顾问的标签</small></h4>
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
                <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" style="margin-top: 25px;">
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
                <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" style="margin-top: 25px;">
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
                    <button style="padding-left: 15px;padding-right: 15px;"  class="joinbutton button button-border button-pill button-pill" onclick="consultantBasicInfoSubmit()">查询</button>
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
        var majormap= new Array();
        var expmap= new Array();
        var offermap= new Array();
        var count=0;
            @foreach($consultants as $consultantone){
            @if($consultantone['certification']=='passed')
                  count++;
            idmap[count] ={{ $consultantone['user_id']}};
            namemap[count] = "{{ $consultantone['user']['name'] }}";
            majormap[count] = "{{ $consultantone['user']['major'] }}";
            <?php
               $str = $consultantone['work_experience'];
               $str = str_replace("\r\n", '', $str);
              $str2 = $consultantone['get_offer'];
              $qian=array(" ","　","\t","\n","\r");
              $hou=array("","","","","");
              $str2 = str_replace($qian,$hou,$str2);
            ?>
           expmap[count] = "{{ $str }}";
             offermap[count] = "{{ $str2 }}";
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