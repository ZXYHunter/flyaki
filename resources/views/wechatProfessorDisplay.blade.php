<html>
<head>
    <title>顾问一览</title>
</head>
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
<script>
    var userinfo = <?php echo json_encode($professors) ?>;
</script>
<div class="" style="width: 100%">

    <div>
        <?php $professorNumber = count($professors);?>
        @for($i = 0;$i < $professorNumber && $i<20; $i++ )
            <?php $professors[$i]['placement'] = 'top'?>
            <div class="mydiv">
                @include('clientProfessorDisplay',['displayinfo'=>$professors[$i]]  )
                <?php  unset($professors[$i]); ?>
            </div>
        @endfor
    </div>

</div>
</html>