<div>
    @include('header',['title'=>$title])
<script src="static/js/consultantRegist.js"></script>
<script>
    var userinfo = <?php echo json_encode($user) ?>;
</script>
@include('usernav')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="banner" style="margin-top: 40px;">
                <img src="static/src/photo/banner15.png">
            </div>
            <div class="col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-8 col-sm-8 col-xs-8">
                <div class="box" style="height:700px;">
                    <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: rgba(255,183,0,1);">
                        <h4 style="margin-left:20px;color: #000000;font-family: '微软雅黑'">你的标签<small style="margin-left:20px;color: #ffffff;font-family: '微软雅黑'">每一类型标签至少选择一项，可多选</small></h4>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12" >
                        <h4 style="margin-top: 30px;">国家</h4>
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4  style="margin-top: 30px;">专业</h4>
                        <div class="btn-group btn-group-lg major" role="group" >
                            <button onclick="changeOption(this)" type="button" class="btn btn-default" value="science">理科</button>
                            <button onclick="changeOption(this)" type="button" class="btn btn-default" value="social">文科</button>
                            <button onclick="changeOption(this)" type="button" class="btn btn-default" value="engineer">工科</button>
                            <button onclick="changeOption(this)" type="button" class="btn btn-default" value="business">商科</button>
                            <button onclick="changeOption(this)" type="button" class="btn btn-default" value="others">其它</button>
                        </div>
                        <br/>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4 style="margin-top: 30px;">可咨询学位</h4>

                        <div class="btn-group btn-group-lg type" role="group" >
                            <button onclick="changeOption(this)" type="button" class="btn btn-default" value="undergraduate">本科</button>
                            <button onclick="changeOption(this)" type="button" class="btn btn-default" value="graduate">研究生</button>
                            <button onclick="changeOption(this)" type="button" class="btn btn-default" value="phd">PhD</button>
                        </div>
                        <br/>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4 style="margin-top: 30px;">服务范围</h4>

                    </div>
                    <div id="panelcontent_body_consultant" >
                        <div id="consultantServiceBtnGroup" class="col-md-10 col-sm-10 col-xs-10">
                            <div class="btngroup btn-group btn-group-lg" data-toggle="buttons-checkbox" role="group ">
                                <button  id="service_1"  rel="jumpout" type="button" class="btn btn-default">个人潜力挖掘</button>
                                <button id="service_2"  rel="jumpout" type="button" class="btn btn-default">模拟面试</button>
                                <button id="service_3"  rel="jumpout" type="button" class="btn btn-default">文书建议方案</button>
                                <br>
                                <button id="service_4"  rel="jumpout" type="button" class="btn btn-default">择校专业咨询</button>
                                <button id="service_5"  rel="jumpout" type="button" class="btn btn-default">后期跟盯咨询</button>
                                <button id="service_6"  rel="jumpout" type="button" class="btn btn-default">其他咨询服务</button>
                            </div>
                        </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <br/>
                        <button  class="ybutton button button-border button-pill button-pill" onclick="consultantBasicInfoSubmit()">下一步</button>
                    </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
<script>
    var introduction1='对于留学过程的基本了解,私人定制你的<br>申请学校和专业计划，只要你想，就有提高<br>的空间，跟导师一起挖掘你的潜力吧。';
    var introduction2='面试难免紧张，亲身经历过的导师帮<br>你克服，历年面试真题演练，全方位展现优秀的<br>自己，站在面试官的角度换位思考。';
    var introduction3='针对个人陈述、推荐信、小论文提出修<br>改建议，或是根据具体学校招生办偏好性为你<br>量身定做文书路线，让你事半功倍，如虎添翼。';
    var introduction4='学校专业多如牛毛，无法实地考察，导师和你分享<br>亲身体验，适合自己的才是最好的。';
    var introduction5='申请过程中，除了焦虑的干等，你<br>还能做什么？教授套磁、admission解答问题，后期<br>个性展示留下印象，我们手把手教你如何搞定dream school！ ';
    var introduction6='海外实习？暑期学校？教授研究项目？每个顾问拥有不同资源，来探究让你意想不到的好机会吧！';
    $(function () {
        servicePopover($('#service_1'),'top',introduction1);
        servicePopover($('#service_2'),'top',introduction2);
        servicePopover($('#service_3'),'top',introduction3);
        servicePopover($('#service_4'),'top',introduction4);
        servicePopover($('#service_5'),'top',introduction5);
        servicePopover($('#service_6'),'top',introduction6);
    })

</script>
<script>
    var savedTags = <?php echo $user['tag']? json_encode(['country'=>json_decode($user['tag']['country']),'major'=>json_decode($user['tag']['major']),'type'=>json_decode($user['tag']['type'])]): '\'\'';?>;
   var consultant = new consultantTag(savedTags);
   var services = <?php echo $user['consultant']? $user['consultant']['services']:'\'\'' ?>;
</script>
</div>