<div>@include('header',['title'=>$title])
<script src="static/js/consultantRegist.js"></script>
<script>
    var userinfo = <?php echo json_encode($user) ?>;
    var OfferCount= 0,JobCount=0;
    function addOfferList(){
        OfferCount++;
        html="<br><br>";
        html+="<div class='col-md-offset-2 col-xs-offset-2 col-sm-10 col-xs-10'> <input type='text' id='userinfo_getOffers' name='offers"+OfferCount+"' class='form-control' value=''  placeholder='学校全名-专业名-奖学金名(选)'> </div>";

        if(OfferCount==9){
            one= document.getElementById("position2");
            one.parentNode.removeChild(one);
            html+="<div class='text-center'><p>最多可添加10条信息</p></div>";
        }
        $('#position').append(html);
    }
    function addJobList(){
        JobCount++;
        html="<br><br>";
        html+="<div class='col-sm-10 col-xs-10 col-xs-offset-2 col-sm-10 col-xs-10'> <textarea class='form-control unresize' rows='1' id='userinfo_experience' name='experience"+JobCount+"' placeholder='公司名-职位名'></textarea> </div>";
        if(JobCount==9){
            one= document.getElementById("position4");
            one.parentNode.removeChild(one);
            html+="<div class='text-center'><p>最多可添加10条信息</p></div>";
        }
        $('#position3').append(html);
    }
</script>
@include('usernav')
    <div class="row">
        <div class="col-md-12">
            <div class="banner" style="margin-top: 40px;">
                <img src="static/src/photo/banner17.png">
            </div>
            <div class="col-md-offset-2 col-xs-offset-2 col-xs-8 col-md-8">
                <form method="post" action="/consultantDetail">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="list-group" style="border:0px solid white;">
                        <li style="height: 80px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-xs-2 text-center attribute2">
                                <p>真实姓名<small style="color:red">*</small></p>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <textarea class="form-control unresize " rows="1" id="userinfo_realname" name="realname" placeholder="您的真实姓名"></textarea>
                            </div>
                        </li>
                        <li style="height: 80px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-xs-2 text-center attribute2">
                                <p>学校<small style="color:red">*</small></p>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <textarea class="form-control unresize " rows="1" id="userinfo_university" name="university" placeholder="在读院校名"></textarea>
                            </div>
                        </li>
                        <li style="height: 80px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-xs-2 text-center attribute2">
                                <p>学位<small style="color:red">*</small></p>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <textarea class="form-control unresize " rows="1" id="userinfo_degree" name="degree" placeholder="您在攻读的学位"></textarea>
                            </div>
                        </li>
                        <li style="height: 80px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-xs-2 text-center attribute2">
                                <p>专业<small style="color:red">*</small></p>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <textarea class="form-control unresize " rows="1" id="userinfo_major" name="major" placeholder="您在读的专业"></textarea>
                            </div>
                        </li>
                        <li style="height: 80px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-xs-2 text-center attribute2">
                                <p>个人简介<small style="color:red">*</small></p>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <textarea class="form-control unresize" rows="2" id="userinfo_briedintroduction" name="briedintroduction" placeholder="简单的自我描述，让学生更了解你的个性和特点"></textarea>
                            </div>
                        </li>
                        <li style="height: 80px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-xs-2 text-center attribute2">
                                <p>学术成就<small style="color:red">*</small></p>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <textarea class="form-control unresize" rows="2" id="userinfo_academy" name="academy" placeholder="请简述你在学术方面的成就"></textarea>
                            </div>
                        </li>
                        <li style="background-color: rgba(233,233,233,1);height: 80px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-xs-2 text-center attribute2">
                                <p>业务专长<small style="color:red">*</small></p>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <textarea class="form-control unresize" rows="2" id="userinfo_strength" name="strength" placeholder="你比较擅长的方面"></textarea>
                            </div>
                        </li>
                        <li style="border:0px solid white;" class="list-group-item">
                            <div class="row">
                            <div class="col-md-2 col-xs-2 text-center attribute2">
                                <p>工作经历<small style="color:red">*</small></p>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <textarea class="form-control unresize" rows="1" id="userinfo_experience" name="experience" placeholder="公司名-职位名"></textarea>
                            </div>
                            <div id="position3">
                            </div>
                            <div id="position4" class="col-sm-10 col-xs-10 col-md-offset-2 col-xs-offset-2">
                                <button id="addbtn"style="width: 100%" type="button" onclick="addJobList()"><span class="glyphicon glyphicon-chevron-down"></span></button>
                            </div>
                            <br>
                            <br>
                            <br>
                                </div>
                        </li>
                        <li style="border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="row">
                            <div class="col-md-2 col-xs-2 text-center attribute2">
                                <p>Offer列表<small style="color:red">*</small></p>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <input  type="text" id="userinfo_getOffers" name="offers" class="form-control" value=""  placeholder="学校全名-专业名-奖学金名(选)">
                            </div>
                            <div id="position">
                            </div>
                            <div id="position2" class="col-sm-10 col-xs-10 col-md-offset-2 col-xs-offset-2">
                                <button id="addbtn"style="width: 100%" type="button" onclick="addOfferList()"><span class="glyphicon glyphicon-chevron-down"></span></button>
                            </div>
                            <br>
                            <br>
                            <br>
                            </div>
                        </li>
                    </ul>
                    <div class="col-sm-3 col-xs-3 col-xs-9 col-md-offset-9">
                        <button class="ybutton button button-border button-pill button-pill"  type="submit">下一步</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="skypeidModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">如何查看Skype ID</h4>
            </div>
            <div class="modal-body">
                <img style="width: 100%" src="static/src/photo/skypeidguidance.jpg">
            </div>
            <div class="modal-footer">
                <button  type="button" data-dismiss="modal" class="btn btn-primary">查看完啦</button>
            </div>
        </div>
    </div>
</div>