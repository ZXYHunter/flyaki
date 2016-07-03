<div>
@include('header',['title'=>$title])
<script>
    var userinfo = <?php echo json_encode($user) ?>;
</script>
@include('usernav')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="banner" style="margin-top: 40px;">
                <img src="static/src/photo/banner19.png">
            </div>
        </div>
    </div>
</div>
