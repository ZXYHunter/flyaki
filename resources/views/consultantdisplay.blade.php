<div class="col-md-6 col-sm-6 col-xs-6 ">
    <a id="consultantDisplay_{{ $displayinfo['user']['id'] }}" href="/space_{{ $displayinfo['user']['id'] }}" class="consultantinfo" style="background-position: center;background-image: url('{{ $displayinfo['user']['photoaddr'] }}');">
        <div class="redborder"></div>
        <br><br><br><br><br><br><br>
        <h2>{{ $displayinfo['user']['name'] }}</h2>
        <h4><span style="font-size:25px; color: rgba(255,64,62,1);" class="glyphicon glyphicon-map-marker"></span>{{ $displayinfo['user']['university'] }}</h4>
    </a>

    <script>
        $(function () {
            var services = <?php echo json_encode($displayinfo['services']); ?>;
            services = eval(services);
            registConsultantDisplayPopover($('#consultantDisplay_' + {{ $displayinfo['user']['id'] }}), '{{ $displayinfo['placement'] }}', '', '{{ $displayinfo['user']['introduction'] }}', services, '/space_{{ $displayinfo['user']['id'] }}');
        })
    </script>
</div>