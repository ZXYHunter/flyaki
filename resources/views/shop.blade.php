
<link href="static/css/shop.css" rel="stylesheet">
<link href="static/css/consultantdisplay.css" rel="stylesheet">
<script src="static/js/shop.js"></script>
<script>
    var userinfo = <?php echo json_encode($consultants) ?>;
</script>
<div class="row">
    @include('header',['title'=>$title])
    <div class="banner" style="margin-top: 120px">
        <img src="static/src/photo/banner5.png">
    </div>
    <div class="banner">
        <img src="static/src/photo/banner6.png">
    </div>
    <div class="col-md-12 text-center">
        <a href="/personalconsultant" class="shopbutton button button-border button-pill button-pill">寻找你的私人顾问</a>
    </div>
    <div class="row consultantshow">
        <?php $consultantsNumber = count($consultants);?>
        @for($i = 0;$i < $consultantsNumber && $i<20; $i++ )
            <?php $consultants[$i]['placement'] = $i % 3 == 2 ? 'left':'right';?>
            @include('consultantdisplay',['displayinfo'=>$consultants[$i]]  )
            <?php  unset($consultants[$i]); ?>
        @endfor
    </div>
    <div class="col-md-12">
        <div class=" col-md-4 col-md-offset-1"></div>
        <?php echo $consultants->render(); ?>
    </div>
    <div class="banner">
        <img src="static/src/photo/banner21.png">
    </div>
</div>