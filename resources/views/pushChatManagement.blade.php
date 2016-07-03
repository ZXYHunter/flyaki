@include('header',['title'=>$title])

<div style="margin-top: 150px;" class="row">
    <div class="col-md-12">
        <div style="margin-left: 27%">
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a class="change_class" id="cc_u" data-toggle="tab" href="#all">全体用户</a></li>
                <li role="presentation"><a class="change_class" id="cc_c" data-toggle="tab" href="#consultant">只看顾问</a></li>
                <li role="presentation"><a class="change_class" id="cc_s" data-toggle="tab" href="#student">普通用户</a></li>
                <li role="presentation"><a class="change_class" id="cc_bc" data-toggle="tab" href="#order">课程订单</a></li>
                <li role="presentation"><a class="change_class" id="cc_su" data-toggle="tab" href="#sign_up">报名信息</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane container " id="student">
                <table class="table table-striped text-center" style="width: 60%; margin-left: 20%">
                    <thead class=" text-center">
                    <tr>
                        <th class=" text-center"><a id="choose_all_s">全选</a></th>
                        <th  class=" text-center">user_id</th>
                        <th class=" text-center">姓名</th>
                        <th class=" text-center">时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=0;$i<count($students);$i++)
                        <?php $student=$students[$i]; ?>
                        <tr>
                            <th scope="row"><a class="checkS" id="{{$student->id}}"><input id="student_i_{{$i}}" type="checkbox"></a></th>
                            <td>{{$student->id}}</td>
                            <td>{{$student->username}}</td>
                            <td>{{$student->created_at}}</td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
            <div class="tab-pane container" id="consultant">
                <table class="table table-striped text-center" style="width: 60%; margin-left: 20%">
                    <thead class=" text-center">
                    <tr>
                        <th class=" text-center"><a id="choose_all_c">全选</a></th>
                        <th class=" text-center">user_id</th>
                        <th class=" text-center">姓名</th>
                        <th class=" text-center">时间</th>
                    </tr>
                    </thead>
                    <tbody>

                    @for($i=0;$i<count($consultants);$i++)
                        <?php $consultant=$consultants[$i]; ?>
                        <tr>
                            <th scope="row"><a id="{{$consultant->user['id']}}"><input id="consultant_i_{{$i}}" type="checkbox"></a></th>
                            <td>{{$consultant->user['id']}}</td>
                            <td>{{$consultant->user['username']}}</td>
                            <td>{{$consultant->user['created_at']}}</td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
            <div class="tab-pane container active" id="all">
                <table class="table table-striped text-center" style="width: 60%; margin-left: 20%">
                    <thead class=" text-center">
                    <tr>
                        <th class=" text-center"><a id="choose_all_u">全选</a></th>
                        <th class=" text-center">user_id</th>
                        <th class=" text-center">姓名</th>
                        <th id="{{count($allusers)}}" class=" text-center">时间</th>
                    </tr>
                    </thead>
                    <tbody>

                    @for($i=0;$i<count($allusers);$i++)
                        <?php $oneuser=$allusers[$i]; ?>
                        <tr>
                            <th scope="row"><a id="{{$oneuser->id}}"><input id="user_i_{{$i}}" type="checkbox"></a></th>
                            <td>{{$oneuser->id}}</td>
                            <td>{{$oneuser->username}}</td>
                            <td>{{$oneuser->created_at}}</td>
                        </tr>
                    @endfor

                    </tbody>
                </table>
            </div>
            <div class="tab-pane container" id="order">
                <table class="table table-striped text-center" style="width: 60%; margin-left: 20%">
                    <thead class=" text-center">
                    <tr>
                        <th class=" text-center"><a id="choose_all_bc">全选</a></th>
                        <th class=" text-center">用户名</th>
                        <th class=" text-center">顾问名</th>
                        <th class=" text-center">选课时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=0;$i<count($orders);$i++)
                        <?php $order=$orders[$i]; ?>
                        <tr>
                            <th scope="row"><a id="{{$order->student['id']}}"><input id="order_i_{{$i}}" type="checkbox"></a></th>
                            <td>{{$order->student['username']}}</td>
                            <td>{{$order->consultant['user']['username']}}</td>
                            <td>{{$oneuser->created_at}}</td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
            <div class="tab-pane container" id="sign_up">
                <table class="table table-striped text-center" style="width: 60%; margin-left: 20%">
                    <thead class=" text-center">
                    <tr>
                        <th class=" text-center"><a id="choose_all_su">全选</a></th>
                        <th class=" text-center">用户名</th>
                        <th class=" text-center">项目名</th>
                        <th class=" text-center">选课时间</th>
                    </tr>
                    </thead>
                    <tbody>

                    @for($i=0;$i<count($sign_ups);$i++)
                        <?php $sign_up=$sign_ups[$i]; ?>
                        <tr>
                            <th scope="row"><a id="{{$sign_up->user['id']}}"><input id="signup_i_{{$i}}" type="checkbox"></a></th>
                            <td>{{$sign_up->user['username']}}</td>
                            <td>{{$sign_up->international_program['program_name']}}</td>
                            <td>{{$sign_up['email']}}</td>
                            <td>{{$sign_up->created_at}}</td>
                        </tr>
                    @endfor


                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="/push_chat_management">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input  class="form-control" value="," type="hidden" id="chosen-id" name="chosen">
                            <input  class="form-control" value="user" type="hidden" id="type-id" name="type">
                <ul class="list-group" style="border:0px solid white;">
                    <li style="height: 50px;border:0px solid white;background-color: rgba(233,233,233,1);" class="list-group-item">
                        <div class="col-md-2 col-sm-3 col-xs-3 text-center attribute2">
                            <p>推送标题</p>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            <input  class="form-control" value="" name="title" placeholder="title">
                        </div>
                    </li>
                    <li style="height: 50px;border:0px solid white;" class="list-group-item">
                        <div class="col-md-2 col-sm-3 col-xs-3 text-center attribute2">
                            <p>推送内容</p>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            <textarea rows="4"  class="form-control" value="" name="content" placeholder="content"></textarea>
                        </div>
                    </li>
                </ul>
                <div class="col-sm-3 col-xs-4 col-xs-offset-8 col-md-offset-9" style="margin-top: 20px;margin-bottom: 50px;">
                    <button class="ybutton button button-border button-pill button-pill" type="submit">发送推送</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#cc_u").click(function(){
        $("#chosen-id").val(",");
        $("#type-id").val("allustypeer");
//        alert("1111"+ $("#-id").val());
    });
    $("#cc_c").click(function(){
        $("#chosen-id").val(",");
        $("#type-id").val("consultant");
//        alert("1111"+ $("#type-id").val());
    });
    $("#cc_s").click(function(){
        $("#chosen-id").val(",");
        $("#type-id").val("student");
//        alert("1111"+ $("#type-id").val());
    });
    $("#cc_su").click(function(){
        $("#chosen-id").val(",");
        $("#type-id").val("signup");
//        alert("1111"+ $("#type-id").val());
    });
    $("#cc_bc").click(function(){
        $("#chosen-id").val(",");
        $("#type-id").val("class");
//        alert("1111"+ $("#type-id").val());
    });

    $("th>a").each(function(){
        $(this).click(function(){
                $(this).toggleClass("active");
                var id = $(this).attr("id");
                if($("#chosen-id").val().indexOf(','+id+',')>-1){
                    $("#chosen-id").val($("#chosen-id").val().replace(','+id+',',','));
                }
                else{
                    $("#chosen-id").val($("#chosen-id").val()+id+",");
                }
            //alert($("#chosen-id").val());
        });
    });
    $("#choose_all_s").click(function(){

        for(var i=0;i<{{count($students)}};i++){

            var tmp='#student_i_'+i;
            $(tmp).click();

        }

    });
    $("#choose_all_u").click(function(){

        for(var i=0;i<{{count($allusers)}};i++){

            var tmp='#user_i_'+i;
            $(tmp).click();

        }

    });
    $("#choose_all_c").click(function(){

        for(var i=0;i<{{count($consultants)}};i++){
            var tmp='#consultant_i_'+i;
            $(tmp).click();

        }

    });
    $("#choose_all_su").click(function(){

        for(var i=0;i<{{count($sign_ups)}};i++){
            var tmp='#signup_i_'+i;
            $(tmp).click();
        }

    });
    $("#choose_all_bc").click(function(){
        for(var i=0;i<{{count($orders)}};i++){
            var tmp='#order_i_'+i;
            $(tmp).click();

        }

    });
</script>