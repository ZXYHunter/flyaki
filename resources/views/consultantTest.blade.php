<div>
@include('header',['title'=>$title])
<script src="static/js/consultantRegist.js"></script>
<script>
    var userinfo = <?php echo json_encode($user) ?>;
</script>
@include('usernav')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="banner" style="margin-top: 40px;">
                <img src="static/src/photo/banner18.png">
            </div>
            <div class="box col-md-offset-2 col-xs-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-8">
                <form method="post" action="/consultantTest">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="userinfo.answer" style="color:rgba(255,183,0,1);text-align: left;font-size: 20px;font-weight: bold" class="col-sm-12 control-label">请根据下列陈述回答问题</label>
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <p>学员A： 基本情况：大二在读，本科非211、985学校会计系，托福第一次考试90分，学习成绩平均80分，有暑假在当地会计师事务所实习的经验，平时获得过校级奖学金和优秀学生干部，希望能够到有名气的美国或者英国的大学就读研究生。</p><p> 学员B： 基本情况：大三在读，本科211学校，英语系，还未准备托福和雅思，平均成绩95分，学生活动和志愿者经验丰富，有海外实习支教经历，喜欢大城市，不知道应该选择什么样的专业，名气不重要，希望有适合自己的专业和学校。</p><p> 学员C： 基本情况：大学本科金融专业，毕业后在银行工作三年，参加雅思考试3次，最高分6分，没有学生活动和海外经验，计划就读经济、工商管理、市场营销等专业，学校性价比高很重要，最好能够有奖学金。 </p><p>学员D：大一在读新闻系，想要出国，没有规划。 </p><p style="margin-left: 20px;">（1）从A-D中，选择一位，作为你的学员为他提供服务，说说为什么。 <br>（2）你认为还需要了解学生的什么信息？并说明理由（三个及以上）。</p>
                        <textarea style="border-color: rgba(255,183,0,1);" class="form-control unresize" rows="5" id="userinfo_answer" name="answer" placeholder="请写下你认为正确的做法"></textarea>
                    </div>
                    <div class="col-md-3  col-sm-3 col-xs-3 col-md-offset-9 col-sm-offset-9 col-xs-offset-9" style="margin-top: 30px;">
                        <button class="ybutton button button-border button-pill button-pill" type="submit">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>