<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="utf-16">
    <link href="css/text.css" rel="stylesheet">
    <title>
        留学GO顾问预约
    </title>
<script type="text/javascript">
    function upload(){
        location.href = 'http://www.liuxuego.org/WeChat/redirect.php?'+'num='+'<?php echo $_GET[num];?>';
    }
</script>
</head>
<body>
<div class="mydiv" style="margin-left: 1%">
    <img src="pay.jpg" style="width: 95%; padding-left: 2.5%"/>
    <p class="detail" style="font-size: 23px; font-weight: bold">步骤说明:</p>
    <p class="detail" style="text-align: left">
        1.扫描上面二维码，支付成功之后点击下方按钮<br>
        2.顾问咨询 8元/分钟，请填写适当的总价以便计算时间<br>
        3.打款成功之后请添加留学去Henry，我们也将联系您进行预约！<br>
        4.付款成功之后请保存 微信支付凭证
    </p>
    <button style="width:40%;height: 30px;margin-left: 30%;background-color: #FF6600;color: white;font-size: 20px; border-radius: 20px; border-color: #ffffff" onclick="upload()"">已经支付</button>
    <button style="width:40%;height: 30px;margin-left: 30%;background-color: white;color: #FF6600;border 1px; border-color: #FF6600;font-size: 20px; border-radius: 20px; margin-top: 10px"  onclick="window.history.back(-1);">取消</button><br><br>
</div>
</body>
</html>