<div>
@include('header',['title'=>$title])
<script src="static/js/consultantRegist.js"></script>
<script>
    var userinfo = <?php echo json_encode($user) ?>;
</script>
@include('usernav')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="banner" style="margin-top: 40px;">
                <img src="static/src/photo/banner16.png">
            </div>
            <div class="col-md-offset-2 col-sm-offset-2 col-xs-offset-2  col-md-8 col-sm-8 col-xs-8 ">
                <a  data-toggle="modal" data-target="#CommentModel">
                <img style="margin-top:50px;width: 100%; box-shadow: 10px 10px 0px rgba(255,183,0,1);" src="static/src/photo/processguide.jpg"  >
                </a>
                    <br><br> <br><br>
             </div>

            <div class="col-sm-3 col-sm-3 col-xs-3  col-sm-offset-8 col-xs-offset-8  col-md-offset-8">
                <form method="post" action="/consultantBrainstorm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="fake" value="">
                     <button type="submit" class="ybutton button button-border button-pill button-pill">下一步</button>
                </form>
                <button data-toggle="modal" data-target="#CommentModel" style="margin-top: -54px;margin-left: -170px" class="ybutton button button-border button-pill">查看大图</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" style="margin-top: 0px;" id="CommentModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:85%;height: 95%;">
        <div class="modal-content">
                <div style="width:100%;height:100%;background-repeat:no-repeat;background-size: cover;background-image:url('static/src/photo/processguide.jpg')">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>

        </div>
    </div>
</div>