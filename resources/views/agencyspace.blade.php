<link href="static/css/comment.css" rel="stylesheet">
<div>
    @include('header',['title'=>$title])
    <div class="row" style="margin-top: 160px;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: rgba(255,120,0,1);height:60px;">
            <div  style="position:absolute; right:5%;margin-top: 10px;">
                <form method="post" action="/search">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <span style="position: absolute;margin-left: 15px;margin-top: 10px;" class="glyphicon glyphicon-search"></span><input style="background-color: white" class="button button-border button-pill button-pill" id="search"  class="form-control" value="" name="search" placeholder="搜索中介名称...">
                </form>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left:5%;margin-top: 50px">

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
            <div class="row">
                <div class="box" style="width:95%;">
                    <div class="hat" style="height: 40px;background-color: rgba(255,120,0,1);">
                        <a onclick="javascript :history.go(-1);" style="vertical-align:middle;margin-left:25px;margin-top:10px;font-size: 24px;font-weight: bold;color: #ffffff">返回<span style="font-size:24px;color: #ffffff;" class="glyphicon glyphicon-menu-left"></span></a>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 display2 col-sm-3 col-xs-3">
                                <a href="agencyspace_{{ $agencyinfo['id'] }}" style=";background-position: center; width: 100%;height: 120px;margin-top: 100px;">
                                    <img src="{{ $agencyinfo['company_photoaddr'] }}" style="width:100%">
                                </a>
                            </div>
                            <div style="margin-top: 100px;margin-left: 2%;" class="col-md-8 col-sm-8 col-xs-8">
                                <p style="font-size: 20px;font-weight: bold;">{{ $agencyinfo['company_name'] }}
                                    @if($agencyinfo['is_online']=='online')
                                        <span style="font-size:20px;margin-left:5px;color: rgba(26,192,234,1);padding:3px;border: 1px solid rgba(26,192,234,1);border-radius: 15px;">网</span>
                                    @elseif($agencyinfo['is_online']=='offline')
                                        <span style="font-size:20px;margin-left:5px;background-color: rgba(26,192,234,1);color:white;padding:3px;border: 1px solid rgba(26,192,234,1);border-radius: 15px;">店</span>
                                    @endif
                                    @if($agencyinfo['discount_info'])
                                        <span style="font-size:20px;margin-left:5px;color: rgba(26,192,234,1);padding:3px;border: 1px solid rgba(26,192,234,1);border-radius: 15px;">惠</span>
                                    @endif
                                </p>
                                <p style="font-size: 10px;margin-top:10px;font-weight: bold;">{{ $agencyinfo['brief_intro'] }}</p>

                                <div style="margin-top:40px;" >
                                    @for($i=0;$i<5;$i++)
                                        @if($i<$agencyinfo['star'])
                                            <span style="font-size:20px; color:rgba(255,120,0,1);" class="glyphicon glyphicon-star"></span>
                                        @else
                                            <span style="font-size:20px; color:rgba(255,120,0,1);" class="glyphicon glyphicon-star-empty"></span>
                                        @endif
                                    @endfor
                                    <div style="text-align: right;margin-top: -5px;">
                                        <span style="font-size: 20px;">{{ $num }}条评论<span>
                                    </div>
                                </div>
                                <hr style="margin-top: 1%;;width: 100%;border-color:rgba(255,120,0,1);">

                                <p style="font-size: 15px;vertical-align: middle">{{ $agencyinfo['detailed_intro'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left: 9%;margin-top: 5%;">
                            <p style="font-size: 15px;vertical-align: middle"><span style="color: rgba(255,120,0,1);margin-right: 20px;font-size: 20px;" class="glyphicon glyphicon-map-marker"></span>{{ $agencyinfo['location'] }}</p>
                            <p style="font-size: 15px;vertical-align: middle"><span style="color: rgba(255,120,0,1);margin-right: 20px;font-size: 20px;" class="glyphicon glyphicon-earphone"></span>{{ $agencyinfo['phone'] }}</p>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left: 9%;margin-top: 5%;">
                        </div>
                    </div>
                    <script type="text/javascript">
                        function showaa(obj)
                        {
                            //var obj_parent=obj.parentNode;
                            var obj_parent=obj.parentElement

                            if(obj_parent.className=="aa_show")
                            {
                                obj_parent.className="aa_hide";
                            }
                            else
                            {
                                obj_parent.className="aa_show";
                            }
                        }
                    </script>
                    <style type="text/css">
                        .aa_show a.two
                        {
                            display:block;
                        }
                        .aa_hide a.two
                        {
                            display:none;
                        }
                    </style>
                    <div class="aa_hide">
                        <a class="discount" onclick="showaa(this)"><span style="color:rgba(255,120,0,1);margin-right: 7px;" class="glyphicon glyphicon-menu-down"></span>优惠策略</a><br><br>
                       <a class="two discount">{{ $agencyinfo['discount_info'] }}</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="banner" style="margin-top: 10px;">
                                <img src="static/src/photo/banner24.jpg">
                            </div>
                            <?php $AgenciesNumber = count($comments);$count=0;?>
                            @for($i = 0;$i < $AgenciesNumber;$i++)
                                <?php $comments[$i]['background'] = $i % 2 == 1 ? 'black':'white';?>
                                @include('commentdisplay',['displayinfo'=>$comments[$i]])
                                <?php  unset($comments[$i]);$count++;?>
                            @endfor
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class=" col-md-4 col-md-offset-1"></div>
                        <?php echo $comments->render(); ?>
                    </div>
                    <div class="row">
                        <div style="margin-top: 10px;" class="col-sm-3 col-xs-4 col-xs-offset-8 col-md-offset-8">
                            <button style="width:120px;padding-left: 0px;padding-right: 0px;" class="cmtbutton button button-border button-pill button-pill" onclick="addcomment()" >添加评论</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>    <button id="addbtn"style="width:0px;border-color: transparent;background-color: transparent;"  data-toggle="modal" data-target="#CommentModel"></button>

    </div>
</div>
<button id="addbtn"style="width:0px;border-color: transparent;background-color: transparent;"  data-toggle="modal" data-target="#CommentModel"></button>


<div class="modal fade" id="CommentModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/agencyspace_{{ $agencyinfo['id'] }}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">添加评价</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p>请描述您的中介体验<span style="color: red">*</span></p>
                <textarea id="content" rows="5" maxlength="" class="form-control" id="comment" value="" name="comment" placeholder="在此处写下你的评论"></textarea>
                <input  class="form-control" id="agencyid" value="{{ $agencyinfo['id'] }}" name="agencyid" type="hidden">
                <br>
                <p>请对此家中介打分（1~5）<span style="color: red">*</span></p>
                <input id="judgement" style="width: 70px;" class="form-control" value="" name="star" placeholder="" type="number" min="1" max="5">
                <br>
                <p>申请国家</p>
                <input id="country"  class="form-control" value="" name="country" placeholder="">
                <br>
                <p>申请所需费用</p>
                <input id="price" class="form-control"value="" name="price" placeholder="">
                <br>
                <p style="font-size:13px;">请提交中介合同材料到"<span style="color: rgba(255,120,0,1);"> internationalcenter@liuxuego.org </span>",通过认证后我们将为您的评论加V</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class=" btn btn-primary" onclick="judge({{ $agencyinfo['id'] }})">添加评论</button>
            </div></form>
        </div>
    </div>
</div>
<script>
    function addcomment(){
        var flag="{{$login}}";
        if(!flag){
            alert('请先登陆');
        }
        else{
            $('#addbtn').click();
        }
    }
    function judge(aid){
        var obj=document.getElementById('judgement');
        var obj2=document.getElementById('content');
        var obj3=document.getElementById('country');
        var obj4=document.getElementById('price');
        var star= obj.value;
        var content=obj2.value;
        var country=obj3.value;
        var price=obj4.value;

            var data = {};
            data['agency_id'] = aid;
            data['content']=content;
            data['star']=star;
            data['country']=country;
            data['price']=price;
            ajaxData2('/agencyspace_{{ $agencyinfo['id'] }}',data);

    }
</script>

