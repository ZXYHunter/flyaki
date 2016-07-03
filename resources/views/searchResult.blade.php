<link href="static/css/comment.css" rel="stylesheet">
<script src="static/js/jquery.form.min.js"></script>
<script src="static/js/userphotoupload.js"></script>
<script src="static/js/jquery.Jcrop.js" type="text/javascript"></script>
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
            <div class=" row box" style="width:95%;">
                    <div class="hat" style="height: 40px;background-color: rgba(255,120,0,1);">
                        <a style="vertical-align:middle;margin-left:25px;margin-top:10px;font-size: 24px;font-weight: bold;color: #ffffff">搜索结果</a>
                    </div>
                    <?php $AgenciesNumber = count($agencies);$count=0;?>
                    @if($AgenciesNumber==0)
                    <div class="display2 col-md-12 col-sm-12 col-xs-12" style="vertical-align:middle;width:100%;padding-top:10px;height: 120px;">
                        <h2 style="text-align: center">未找到您搜索的中介</h2>
                    </div>
                    @endif
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
                </div>
        </div>
    </div>
</div>

