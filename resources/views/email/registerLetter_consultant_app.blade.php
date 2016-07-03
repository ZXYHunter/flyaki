<div style="width: 60%;margin: 0 auto;padding: 0px 50px 200px 50px;box-shadow: 0px 5px 2px rgba(202,202,202,0.5) ;">
    @include('email.email_header')
    <div>
        <div >
            <p style="margin-left: 2.5%;">
                您的⽤户名：<span style=" margin-right: 80px;">{{$username}}</span> 您的注册邮箱： <span>{{$email}}</span>
            </p>
            <div style="width: 95%;margin: 20px auto 30px auto;height:auto;background-color: #e7f8fb;box-shadow: 0px 5px 2px rgba(180,180,180,0.7) ;">
                <p style="padding:20px 20px 20px 20px;">
                    注册提示：
                    <br><br>
                    为了您的账户安全，请您点击以下链接验证邮箱完成注册流程：<br>
                    http://www.liuxuego.org:8080/confirmemail_consultant_{{$token}}<br>
                    请在24⼩小时内点击该链接，您也可以将链接复制到浏览器地址栏访问。
                </p>
            </div>
            <p style="margin-left: 2.5%;">邮件中包含您的个⼈人信息，建议您保管好本邮件！如您忘记密码，请点此<a href="http://www.liuxuego.org/findPassword">找回密码</a>。</p>
            <hr style="margin-top: 50px;">
            <div >
                <img style="width: 100%" src="http://liuxuegopicture.oss-cn-beijing.aliyuncs.com/banner21.png">
            </div>
        </div>
    </div>
    @include('email.email_footer')
</div>
</div>