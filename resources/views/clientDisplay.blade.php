
<div style="width: 90%;">
    <a id="consultantDisplay_{{ $displayinfo['user']['id'] }}" href="/wechatSpace_{{ $displayinfo['user']['id'] }}" ;">

    <table>
        <tr>
            <td style="width: 40%">
                <img class="img" src={{$displayinfo['user']['photoaddr']}} style="border-radius: 50%;width: 80%"/>
            </td>
            <td style="width: 60%">
                <p class="title">{{ $displayinfo['user']['name'] }}</p>
                <p class="detail">
                    <span style="font-size:25px; color: rgba(255,64,62,1);" class="glyphicon glyphicon-map-marker"></span><br>
                    {{ $displayinfo['user']['major'] }} , {{ $displayinfo['user']['university'] }}
                </p>
            </td>
        </tr>
        <tr style="text-align: left;"><td colspan="2"><br>
            <span class="title">工作经历:<br></span>
            <p class="detail">
                <?php
                $str = $displayinfo['user']['consultant']['work_experience'];
                $str = str_replace(PHP_EOL, '／', $str);
                echo $str;
                ?>
            </p>
            <span class="title">申到offer:<br></span>
            <p style="" class="detail">
                <?php
                $str = $displayinfo['user']['consultant']['get_offer'];
                $str = str_replace(PHP_EOL, ' / ', $str);
                echo $str;
                ?>
            </p>
            </td>
        </tr>
    </table>

    </a>


</div>
