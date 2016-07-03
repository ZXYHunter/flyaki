@if($displayinfo['background']=='black')
    <div class="displaycomments col-md-12 col-sm-12 col-xs-12" style="padding-bottom:10px;background-color: rgba(205,205,205,1);width:100%;padding-top:10px;">
        @else
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom:10px;padding-top:10px;width:100%;">
                @endif
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <a style="width:100%" >
                        <img style="width:100%;" src="{{ $displayinfo['user']['photoaddr'] }}" class="img-circle">
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3" style=" margin-top: 20px;">
                    <p style="font-size: 18px;font-weight: bold;">{{ $displayinfo['user']['username'] }}
                        @if($displayinfo['country'])
                            <span style="margin-left:10px;vertical-align:middle;color:rgba(90,90,90,1);font-size: 8px;">申请国家：{{ $displayinfo['country'] }}</span>
                        @endif
                        <span class="timestamp" style="position:absolute; right:20%;">{{ ''.substr($displayinfo['created_at'],0,10) }}</span>
                    </p>
                    <p>
                        @for($i=0;$i<10;$i+=2)
                            @if($i<$displayinfo['star'])
                                <span style="font-size:15px; color:rgba(255,120,0,1);" class="glyphicon glyphicon-star"></span>
                            @else
                                <span style="font-size:15px; color:rgba(255,120,0,1);" class="glyphicon glyphicon-star-empty"></span>
                            @endif
                        @endfor
                    </p>

                </div>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <p style="font-weight:bold;font-size: 12px; vertical-align: middle">{{ $displayinfo['content'] }}</p>
                </div>
            </div>