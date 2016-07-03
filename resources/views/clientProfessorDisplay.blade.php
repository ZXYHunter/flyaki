
<div style="width: 90%;">
    <a id="wechatProfessorSpace_{{ $displayinfo['id'] }}" href="/wechatProfessorSpace_{{ $displayinfo['id'] }}";">

    <table>
        <tr>
            <td style="width: 40%">
                <img class="img-circle" src={{$displayinfo['photoaddr']}} style="width: 80%"/>
            </td>
            <td style="width: 60%">
                <p class="title">{{ $displayinfo['name'] }}</p>
                <p class="detail">
                    <span style="font-size:25px; color: rgba(255,64,62,1);" class="glyphicon glyphicon-map-marker"></span><br>
                    {{ $displayinfo['name'] }} , {{ $displayinfo['university'] }}
                </p>
            </td>
        </tr>
        <tr style="text-align: left;"><td colspan="2"><br>
                <span class="title">position:<br></span>
                <p class="detail">
                    <?php
                    $str = $displayinfo['position'];
                    $str = str_replace(PHP_EOL, '／', $str);
                    echo $str;
                    ?>
                </p>
                <span class="title">introduction:<br></span>
                <p style="" class="detail">
                    <?php
                    $str = $displayinfo['introduction'];
                    $str = str_replace(PHP_EOL, ' / ', $str);
                    echo $str;
                    ?>
                </p>
            </td>
        </tr>
    </table>

    </a>

    <script>
        $(function () {
            clientDisplayDisplayPopover($('#consultantDisplay_' + {{ $displayinfo['id'] }}), '{{ $displayinfo['placement'] }}', '', '{{ $displayinfo['introduction'] }}', services, '/space_{{ $displayinfo['id'] }}');
        })
    </script>
</div>
