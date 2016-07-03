<div>@include('header',['title'=>$title])


<script src="static/js/classdisplay.js"></script>
<script src="static/js/space.js"></script>
<script>
    var userinfo = <?php echo json_encode($host) ?>;
</script>
<link href="static/css/space.css" rel="stylesheet">
    <script src="static/js/jquery.form.min.js"></script>
    <script src="static/js/userphotoupload.js"></script>
    <script src="static/js/jquery.Jcrop.js" type="text/javascript"></script>
    <link rel="stylesheet" href="static/css/jquery.Jcrop.css" type="text/css" />
    <link rel="stylesheet" href="static/css/usernav.css" type="text/css" />
    <div class="banner" style="margin-top:10%;">
        <img src="static/src/photo/banner10.png">
        <div class="showicon text-center">
            <div class="visible-xs" style="margin-top:-200px;height: 1px;"></div>
            <div class="visible-xs visible-sm" style="margin-top:-400px;height: 1px;"></div>
            <img class="img-circle" src="{{ $host['photoaddr'] }}" alt="Source Error">
            <h2>{{ $host['name'] }}</h2>
         </div>
    </div>

<div  class="container-fluid first">
    <div class="row">
        <div class="col-md-10 col-sm-10 col-xs-10  col-sm-offset-1 col-xs-offset-1 col-md-offset-1" style="border-color: rgba(26,192,234,1);">
            <div>
                <div class="nav-tablist">
                <ul class="nav-tablist nav nav-pills" style="text-align: center"  role="tablist">
                    <li role="presentation" style="margin-right: 20px;" class=" active"><a style="border-radius: 35px;padding-top:2px;" class="joinbutton2 button button-border button-pill" href="#home" aria-controls="home" role="tab" data-toggle="tab">顾问档案</a></li>
                    <li role="presentation"style="margin-right: 20px;" class=""><a style="border-radius: 35px;padding-top:2px;" class=" joinbutton2 button button-border button-pill"  href="#showclasslist" aria-controls="showclasslist" role="tab" data-toggle="tab">顾问课程</a></li>
                    <li role="presentation" ><a style="border-radius: 35px;padding-top:2px;" class=" joinbutton2 button button-border button-pill"  href="#showcomments" aria-controls="showcomments" role="tab" data-toggle="tab">顾问评价</a></li>

                </ul>
                </div>
                <!-- Tab panes -->
                <div class="box tab-content " style="padding-top:0px;">
                    <div id="home" role="tabpanel" class="tab-pane fade in active" >
                        <div class=" row">
                            <div class="col-md-10 col-md-offset-1 intro">
                                <ul class="list-group attribute2" style="border:0px solid white;">
                                    <li style="height: 50px;border:0px solid white;" class="list-group-item">
                                        <div class="col-md-2 col-sm-3 col-xs-3 text-center ">
                                            <p>大学信息</p>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-9">
                                            <p>{{ $host['university'] or '主人没有填写大学生涯' }}</p>
                                        </div>
                                    </li>
                                    <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                                        <div class="col-md-2 col-sm-3 col-xs-3 text-center ">
                                            <p>专业信息</p>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-9">
                                            <p>{{ $host['major'] or '主人没有填写专业信息' }}</p>
                                        </div>
                                    </li>
                                    <li style="height: 50px;border:0px solid white;" class="list-group-item">
                                        <div class="col-md-2 col-sm-3 col-xs-3 text-center ">
                                            <p>顾问标签</p>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-9">
                                            <div class="text-left">
                                                <div>
                                                    <div id="input_tags"  type="text" name="edu_major">该顾问暂未添加标签</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="height: 100px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                                        <div class="col-md-2 col-sm-3 col-xs-3 text-center ">
                                            <p>个人简介</p>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-9">
                                            <p>{{ $host['consultant']['briedintroduction'] }}</p>
                                         </div>
                                    </li>
                                    <li style="height:100px;border:0px solid white;" class="list-group-item">
                                        <div class="col-md-2 col-sm-3 col-xs-3 text-center ">
                                            <p>学术成就</p>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-9">
                                            <p>{{ $host['consultant']['academy'] }}</p>
                                        </div>
                                    </li>
                                    <li style="height: 100px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                                        <div class="col-md-2 col-sm-3 col-xs-3 text-center ">
                                            <p>顾问专长</p>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-9">
                                            <p>{{ $host['consultant']['strength'] }}</p>
                                         </div>
                                    </li>
                                    <li style="height: 100px;border:0px solid white;" class="list-group-item">
                                        <div class="col-md-2 col-sm-3 col-xs-3 text-center ">
                                            <p>实习/工作经历</p>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-9">
                                            <p>{{ $host['consultant']['experience'] }}</p>
                                        </div>
                                    </li>
                                  </ul>
                            </div>
                        </div>
                    </div>

                    <div id="showclasslist" class="tab-pane fade list-group " role="tabpanel">
                        <div class="row">
                            <div class="col-md-10 col-sm-10 col-xs-10  col-sm-offset-1 col-xs-offset-1 col-md-offset-1">
                        @foreach($classes as $class)
                            <li class="list-group-item" style="border-left: 0px dashed #000;border-right: 0px dashed #000;">
                                @include('classdisplay',['class'=>$class,'hosts'=>$host])
                            </li>
                        @endforeach
                                </div>
                        </div>
                    </div>

                    <div id="showcomments" class="tab-pane fade list-group " role="tabpanel">
                        <div class="row">
                            <div style="margin-top: 20px;" class="col-md-10 col-sm-10 col-xs-10  col-sm-offset-1 col-xs-offset-1 col-md-offset-1">
                                <?php $commentsNum = count($comments);$count=0;?>
                                @for($i = 0;$i < $commentsNum;$i++)
                                    <?php $comments[$i]['background'] = $i % 2 == 1 ? 'black':'white';?>
                                    @include('consultantComment',['displayinfo'=>$comments[$i]])
                                    <?php  unset($comments[$i]);$count++;?>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

    <div class="modal fade" id="bookClassModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="/bookClass">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">确认选课</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div id="bookClass-info" class="row">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">不，我再想想</button>
                        <button id="confirmBookClassBtn" type="submit" class="btn btn-default">是的，确认预定</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<script>
    var savedTags = <?php echo $host['tag']? json_encode(['country'=>json_decode($host['tag']['country']),'major'=>json_decode($host['tag']['major']),'type'=>json_decode($host['tag']['type'])]): '\'\'';?>;
    var consultant = new consultantTag(savedTags);
    var services = <?php echo $host['consultant']? $host['consultant']['services']:'\'\'' ?>;
</script>

<script>
    $('#showclasslist a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
    $('#home a').click(function (e) {
        e.preventDefault()
        $('#home').tab('show')
    })
</script>
</div>