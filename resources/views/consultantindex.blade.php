<div class="col-md-6 col-sm-6 col-xs-6" >
    <a id="consultantDisplay_{{ $displayinfo['id'] }}" href="/space_{{ $displayinfo['id'] }}" class="consultantinfo" style="background-image: url('{{ $displayinfo['photoaddr'] }}') ;background-position: center;">
        <h1>10</h1>
        <br><br><br><br><br><br><br>
        <h2>{{ $displayinfo['name'] }}</h2>
        <h4 >{{ $displayinfo['university'] }}</h4>
    </a>

    <script>
        $(function () {
            var services = <?php echo json_encode($displayinfo['services']); ?>;
            services = eval(services);
            registConsultantDisplayPopover($('#consultantDisplay_' + {{ $displayinfo['id'] }}), '{{ $displayinfo['placement'] }}', '', '{{ $displayinfo['introduction'] }}', services, '/space_{{ $displayinfo['id'] }}');
        })
    </script>
</div>