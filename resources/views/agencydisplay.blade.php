
@if($displayinfo['background']=='black')
    <div class="display2 col-md-12 col-sm-12 col-xs-12" style="background-color: rgba(205,205,205,1);width:100%;padding-top:10px;height: 220px;">
        @else
            <div class="display2 col-md-12 col-sm-12 col-xs-12" style="padding-top:10px;height: 220px;width:100%;">
                @endif

                <div class="col-md-2 col-sm-2 col-xs-2">

                    <a class="" href="agencyspace_{{ $displayinfo['id'] }}" style="background-position: center;">
                        <img style="width: 100%" src="{{ $displayinfo['company_photoaddr'] }}">
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3" style="margin-top: 20px;">
                    <a style="margin-left: 0px !important;color: #000000!important;" href="agencyspace_{{ $displayinfo['id'] }}">
                        <p  style="font-size: 18px;font-weight: bold;">{{ $displayinfo['company_name'] }}
                        @if($displayinfo['is_online']=='online')
                            <span style="font-size:15px;;color: rgba(26,192,234,1);padding:3px;border: 1px solid rgba(26,192,234,1);border-radius: 15px;">网</span>
                        @elseif($displayinfo['is_online']=='offline')
                            <span style="font-size:15px;background-color: rgba(26,192,234,1);color:white;padding:3px;border: 1px solid rgba(26,192,234,1);border-radius: 15px;">店</span>
                        @endif
                        @if($displayinfo['discount_info'])
                            <span style="font-size:15px;;color: rgba(26,192,234,1);padding:3px;border: 1px solid rgba(26,192,234,1);border-radius: 15px;">惠</span>
                        @endif
                        </p>
                    </a>
                    <p style="font-size: 12px; margin-left: -15px;margin-top: 30px;"><span style="font-size:8px; color:rgba(255,120,0,1);" class="glyphicon glyphicon-map-marker"></span>{{ $displayinfo['location'] }}</p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <p style="font-size: 12px;margin-left: -20px;margin-top:30px;text-align: left">{{ $displayinfo['brief_intro'] }}</p>
                </div>
                <div style="margin-top:50px;" class="col-md-4 col-sm-4 col-xs-4 ">
                    @for($i=0;$i<5;$i++)
                        @if($i<$displayinfo['star'])
                            <span style="font-size:20px; color:rgba(255,120,0,1);" class="glyphicon glyphicon-star"></span>
                        @else
                            <span style="font-size:20px; color:rgba(255,120,0,1);" class="glyphicon glyphicon-star-empty"></span>
                        @endif
                    @endfor
                </div>
            </div>