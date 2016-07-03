<div>
    @include('header',['title'=>$title])
    <script>
        var userinfo = <?php echo json_encode($user) ?>;
    </script>

    @include('usernav2')
    <div class="row">
        <div class="col-md-12">
            <div class="banner" style="margin-top: 40px;">
                <img src="static/src/photo/banner12.png">
            </div>
            <div class="col-md-offset-2 col-md-8 col-xs-offset-2 col-xs-8 col-sm-offset-2  col-sm-8">
                <form method="post" action="/member">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="list-group" style="border:0px solid white;">
                        <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>学习</p>
                            </div>
                            <div class="col-sm-10 col-sm-10 col-xs-10">
                               <h4>5</h4>
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>社交</p>
                            </div>
                            <div class="col-sm-10 col-sm-10 col-xs-10">
                                <h4>5</h4>
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>耐力</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <h4>5</h4>
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>执行力</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">

                                    <h4>5</h4>

                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>创造力</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <h4>5</h4>
                            </div>
                        </li>
                        <li style="height: 50px;border:0px solid white;" class="list-group-item">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center attribute">
                                <p>逻辑思维</p>
                            </div>
                            <div class="col-sm-10 col-xs-10 col-sm-10">
                                <h4>5</h4>
                            </div>
                        </li>

                    </ul>
                    <div class="col-sm-3 col-xs-3 col-xs-offset-9 col-md-offset-9  col-md-3 col-md-offset-9">
                        <button class="ybutton button button-border button-pill button-pill" type="submit">保存</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <script>
        // Switches
        $(function()
        {
            if ($('[data-toggle="switch"]').length) {
                $('[data-toggle="switch"]').bootstrapSwitch();
            }
            if(userinfo['gender'] == 'female')
                $('#gendercheckbox').click();
        });
    </script>
</div>
