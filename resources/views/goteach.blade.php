<div>
@include('header',['title'=>$title])
<script>
    var userinfo = <?php echo json_encode($user) ?>;
</script>
@include('usernav')
<script src="static/js/bookedClassDisplay.js"></script>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="banner" style="margin-top: 40px;">
                <img src="static/src/photo/banner14.png">
            </div>
            <div class="col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-8 col-sm-8 col-xs-8">
                <div class="box">
                    @foreach($user['consultant']['teachClasses'] as $class)
                        @if($class['status']!='finished'&& $class['status']!='closed')
                        <li class="list-group-item">
                                <?php
                                if($class['time']!=NULL)
                                {
                                    if($class['time']==7){
                                        $class['showtime']='22:00-24:00';
                                    }else {
                                        $class['showtime']=($class['time']*3+1).':00-'.($class['time']*3+4).':00';
                                    }
                                }

                                ?>
                                @include('myteachclassdisplay',['class'=>$class,'consultant'=>$class['consultant'],])
                        </li>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</div>
