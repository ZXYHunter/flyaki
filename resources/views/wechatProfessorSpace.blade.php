<div  class="mydiv">
    <script src="static/js/classdisplay.js"></script>
    <script src="static/js/space.js"></script>
    <script>
        var userinfo = <?php echo json_encode($host) ?>;
    </script>
    <script src="static/js/jquery.form.min.js"></script>
    <script src="static/js/userphotoupload.js"></script>
    <script src="static/js/jquery.Jcrop.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta property="qc:admins" content="4604663745055776727" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="islogin" content="{{ Auth::check()?'1':'0' }}" />
    <tdnk href="static/css/bootstrap.min.css" rel="stylesheet">
        <tdnk href="static/css/bookedClassDisplay.css" rel="stylesheet">
            <tdnk href="static/css/header.css" rel="stylesheet">
                <tdnk href="static/css/buttons.css" rel="stylesheet">
                    <link href="static/css/text.css" rel="stylesheet">
                    <script type="text/javascript">
                        function order(){
                            location.href = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx62d760a9d234c528&redirect_uri=http://www.liuxuego.org/WeChat/pay.php?num="+"{{ $host['name'] }}"+"&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
                        }
                    </script>
                    <script type="text/javascript">
                        function backx(){
                            window.history.back(-1);
                        }
                    </script>
                    <div style="text-align: center">
                        <img class="img-circle" src="{{ $host['photoaddr'] }}" alt="Source Error" style="width: 200px;height:200px;">
                        <h2>{{ $host['name'] }}</h2>
                    </div>
                    <div style="width: 80%; margin-left: 10%">
        <span>
                    <p style="text-align: center; font-weight: bold">university<br>
                        <span style="color: #000000; text-align: center; font-weight: normal">{{ $host['university'] or '主人没有填写大学生涯' }}</span>
                    </p>
        </span>
        <span style="background-color: rgba(233,233,233,1); ">
                    <p style="text-align: center; font-weight: bold">position<br>
                        <span style="color: #000000; text-align: center; font-weight: normal">{{ $host['position'] or '主人没有填写专业信息' }}</span>
                    </p>
        </span>
        <span>
                    <p style="text-align: center; font-weight: bold">introduction<br>
                        <span style="color: #000000; text-align: center; font-weight: normal">{{ $host['introduction'] }}</span>
                    </p>
        </span>

                        <p style="color: rgb(95,95,95)">
                            PS.顾问咨询 8元/分钟，咨询课程为10分钟一节。请按10分钟为单位购买
                        </p>
                    </div>

                    <br>
                    <button style="width:35%;height: 30px;margin-left: 32.5%;background-color: #FF6600;color: white;font-size: 20px; border-radius: 20px; border-color: #ffffff" onclick="order()">预约</button><br>
                    <button style="width:35%;height: 30px;margin-left: 32.5%;background-color: white;color: #FF6600;border 1px; border-color: #FF6600;font-size: 20px; border-radius: 20px; margin-top: 10px"  onclick="backx()">返回</button><br><br>

</div>