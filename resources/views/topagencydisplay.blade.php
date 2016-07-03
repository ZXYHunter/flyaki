@if($displayinfo['background']=='black')
    <div class="display col-md-12 col-sm-12 col-xs-12" style="background-color: rgba(205,205,205,1);width:100%;padding-top:10px;padding-right:0px!important;height: 140px;">
@else
            <div class="display col-md-12 col-sm-12 col-xs-12" style="padding-top:10px;height: 140px;width:100%;padding-right:0px!important;">
@endif

            <div class="col-md-3 col-sm-3 col-xs-3">
        <a href="agencyspace_{{ $displayinfo['id'] }}" style="background-position: center;">
            <img style="width:100%" src="{{ $displayinfo['company_photoaddr'] }}">
        </a>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
        <a style="margin-left: 0px !important;color: #000000!important;margin-bottom: 0px;" href="agencyspace_{{ $displayinfo['id'] }}"><p style="margin-left: -15px;">{{ $displayinfo['company_name'] }}</p></a>
        <p style="font-size: 8px; margin-left: -15px;margin-top: 10px;"><span style="font-size:8px; color:rgba(255,120,0,1);" class="glyphicon glyphicon-map-marker"></span>{{ $displayinfo['location'] }}</p>
    </div>
                <div style="margin-top:20px;margin-left:-15px;padding-right:0px!important;" class="col-md-5 col-sm-5 col-xs-5">
                    @for($i=0;$i<5;$i++)
                        @if($i<$displayinfo['star'])
                            <span style="font-size:15px; color:rgba(255,120,0,1);" class="glyphicon glyphicon-star"></span>
                        @else
                            <span style="font-size:15px; color:rgba(255,120,0,1);" class="glyphicon glyphicon-star-empty"></span>
                        @endif
                        @endfor
               </div>
</div>

