<div class="row" id="classdisplay_{{ $class['id'] }}">
    <div class="col-md-3  col-sm-3 col-xs-3">
        <div>
             </div>

            <button style="width: 150px; margin-bottom: 10px;"  onclick="bookClass({{ $class['id'] }},{{ $class['price'] }},'{{ $class['time'] }}')" class="joinbutton button button-border button-pill button-pill"  >预定课程</button>

            <button style="width: 150px;"  onclick="fortest()" class="joinbutton button button-border button-pill button-pill">私信顾问</button>


    </div>
    <div class="col-md-4  col-sm-4 col-xs-4">
        <input type="hidden" id="classdisplay_{{ $class['id'] }}_price" value="{{ $class['price'] }}">
        <p class="text-primary lead" id="classdisplay_formatPrice">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-yen"><kbd>{{ floor($class['price']) }}<small>{{ substr(sprintf('%.2F',$class['price'] - floor($class['price'])),1) }}</small></kbd></span></p>
        <p class="text-primary text-center class-services"  id="classdisplay_services_{{ $class['id'] }}"></p>
    </div>
    <div class="col-md-5 col-sm-5 col-xs-5">
        <p class="text-display">{{ '授课时间：'.substr($class['date'],0,10) }}</p>
        <p class="text-display2 text-left text-primary" >&nbsp;&nbsp;&nbsp;&nbsp;{{ $class['introduction'] }}</p>
    </div>
    <script>
        $(function () {
            var services = <?php echo $class['type']; ?>;
            $('#classdisplay_services_{{ $class['id'] }}').append(getServicesLabels(services));
        });
        function fortest(){
            if(!isLogin()) {
                $('#login_btn').click();
            }
            else
            {
                $('#messagebox-btn').click();
                $('#messagebox_write_btn').click();
                $("[name='receiver']").val('{{ $hosts['name'] }}');
            }

        }
        function changebtn(id){
            $("[name='time']").val(id);
        }
        function bookClass(classId,classPrice,classTime)
        {
            if(classTime==null){
                classTime='111111111111111111111111';
            }
            if(!isLogin())
            {
                $('#login_btn').click();
            }
            else
            {
                $('#bookClassModel').modal('show');
                $('#bookClass-info').empty();
                var bookClassInfo = '您确定以 '+classPrice+'元/hour 的价格预定这门课程吗？';
                var str=classTime+"";

                bookClassInfo+="<br><br><p>请选择上课时间：</p><input type='hidden' class='form-control' value='"+classId+"' name='classId' placeholder='your old password'>";
                bookClassInfo+="<input type='hidden' class='form-control' value='' id='time' name='time'>";

                var counter=0;
                bookClassInfo+='<br><br><div style="margin-top: -30px;">';
                var i;
                for(i=0;i<24;i++){
                    var start=i;
                    var end=i+1;
                    if(str[i]==1){
                        counter++;
                        var strid=i;
                        bookClassInfo+="<button id="+strid+" onclick='changebtn(this.id)' type='button' style='margin-right:10px;padding-left: 0px;padding-right: 0px;width:100px;font-size: 10px;' class='joinbutton button button-border button-pill'>"+start+":00-"+end+":00</button>";
                    }
                    if(counter==4){
                        counter=0;
                        bookClassInfo+='<br><br>';
                    }
                }

                bookClassInfo+='</div>';
                $('#bookClass-info').append(bookClassInfo);
            }

        }

        function confirmBookClass(classId)
        {
            $('#bookClassModel').modal('hide');
            if(!isLogin()) showMessage('请先登录！');//判断是否登陆，如果未登录，提示登陆。
            else
            {
                var data = {};
                data['classId'] = classId;
                data['time']='x';
                for(var i=1;i<=24;i++){
                    var strid='#bcinfo'+i;
                    if($(strid).isclick==1){
                        data['time'] = i;
                    }
                }
                ajaxData2('/bookClass',data);
            }
        }

    </script>
</div>