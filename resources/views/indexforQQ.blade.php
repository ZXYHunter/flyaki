<link href="static/css/index.css" rel="stylesheet">
<div>
    @include('headerforQQ',['title'=>$title])
    <div class="row">
        <div class="section1">
            <img src="static/src/photo/bigicon.png">
            <p>去中介化&nbsp;&nbsp;零抽成&nbsp;&nbsp;开创留学新方式</p>
        </div>
        <div class="banner">
            <img src="static/src/photo/banner.png">
        </div>
        <div class="banner">
            <img src="static/src/photo/banner2.png">
        </div>
        <div class="advantage row">
            <div class="col-md-3 advantage1">
                <img src="static/src/photo/advantage1.png">
                <h2>权威顾问</h2>
                <div  class="divider">
                    <img src="static/src/photo/divider.png">
                </div>
                <h3>由顶尖大学的留学生<br>或教授亲自传授申请<br>经验。</h3>
            </div>
            <div class="col-md-3 advantage1">
                <img src="static/src/photo/advantage2.png">
                <h2>自主咨询</h2>
                <div  class="divider">
                    <img src="static/src/photo/divider.png">
                </div>
                <h3>提供大量经验丰富的<br>优秀顾问，你可以<br>任意选择。</h3>
            </div>
            <div class="col-md-3 advantage1">
                <img src="static/src/photo/advantage3.png">
                <h2>头脑风暴</h2>
                <div  class="divider">
                    <img src="static/src/photo/divider.png">
                </div>
                <h3>适合哪所大学？转<br>专业很难么？最专<br>业的顾问帮你分析</h3>
            </div>
            <div class="col-md-3 advantage1">
                <img src="static/src/photo/advantage4.png">
                <h2>价格实惠</h2>
                <div  class="divider">
                    <img src="static/src/photo/divider.png">
                </div>
                <h3>价格远比留学中介<br>提供的同类服务价<br>格低。</h3>
            </div>
        </div>
        <div class="banner">
            <img src="static/src/photo/banner3.png">
        </div>
        <div class="row guidance">
            <div class="col-md-4">
                <img style="margin-top:30px;" src="static/src/photo/number1.png">
                <h2>找到最适合的顾问<br>&nbsp;</h2>
                <h3>我们只接受来自顶尖大学的在校<br>
                    留学生作为顾问，每个人都有成功<br>
                    的申请经历，全面了解申请国外<br>
                    大学与申请流程</h3>
            </div>
            <div class="col-md-4">
                <img style="margin-top:30px;" src="static/src/photo/number2.png">
                <h2>挑选合适的时间<br>以及交流内容</h2>
                <h3>从顾问填写的可预订时间中选择<br>
                    合适的时间与顾问进行一对一<br>
                    的咨询</h3>
            </div>
            <div class="col-md-4">
                <img style="margin-top:30px;" src="static/src/photo/number3.png">
                <h2>头脑风暴协助<br>搞定你的疑惑</h2>
                <h3>你的专业顾问将与你一同头脑<br>
                    风暴，解决你的问题，为你找到<br>
                    留学路上正确的道路。</h3>
            </div>
        </div>
        <div class="bestconsultant">
            <img style="margin-top:60px; margin-bottom:60px;" src="static/src/photo/bestconsultant.png">
        </div>
        <div class="row consultantdisplay">
            <?php $consultantsNumber = count($consultants);$count=0;?>
            @for($i = 0;$i < $consultantsNumber&&$consultants[$i]&&$count<4;$i++)
                <?php $consultants[$i]['placement'] = $i % 3 == 2 ? 'left':'right';?>
                @include('consultantindex',['displayinfo'=>$consultants[$i]])
                <?php  unset($consultants[$i]);$count++;?>
            @endfor
        </div>
        <div class="banner">
            <img src="static/src/photo/banner4.png">
        </div>
    </div>
</div>