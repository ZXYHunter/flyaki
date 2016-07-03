<p>付款人： {{$studentname}}，</p>
<p>付款人邮箱： {{$studentemail}}，</p>
<p>国际项目名： {{$program_name}}，</p>
<p>款项类型：  @if($fee_progress=='sign_up_fee')
        报名费
    @elseif($fee_progress=='deposit')
        定金
    @elseif($fee_progress=='balance_due')
        尾款
    @endif</p>
<p>付款金额： {{$price}}</p>