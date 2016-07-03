<div>
@include('header',['title'=>$title])
<script>
    var userinfo = <?php echo json_encode($user) ?>;
</script>
@include('usernav')
<script src="static/js/bookedClassDisplay.js"></script>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-8 col-sm-8 col-xs-8">
            <div class="box">
                @foreach($user['classes'] as $class)

                        @if($class['status']!='closed')
                        <li class="list-group-item">
                            <?php
                                if($class['time']!=NULL)
                                    {
                                        $class['showtime']=($class['time']).':00-'.($class['time']+1).':00';
                                    }
                             ?>
                            @include('bookedClassDisplay',['class'=>$class,'consultant'=>$class['consultant'],])
                        </li>
                        @endif

                @endforeach
            </div>

        </div>
    </div>
</div>


</div>