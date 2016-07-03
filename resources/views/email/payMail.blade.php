<p>亲爱的 {{$studentname}},您已经成功为{{$program_name}}国际项目，成功交费，交费类型为：
    @if($fee_progress=='sign_up_fee')
        报名费
    @elseif($fee_progress=='deposit')
        定金
    @elseif($fee_progress=='balance_due')
        尾款
    @endif
        。</p>
<hr>
<p>如果有相关问题请咨询留学Go：010-57280597</p>
<p>留学Go微信公众号：留学Go, 客服：liuxuegozhushou</p>