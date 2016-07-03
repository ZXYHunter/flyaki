<!DOCTYPE html>
<html>
<br lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="description" content="LiuxueGo">
    <meta name="keyword" content="LiuxueGo">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/text.css">
    <title>顾问详情</title>
</head>
<br>
<?php
$mysql_server_name = 'localhost';
$mysql_username = 'root';
$mysql_password = '7b91f1fee2';
$link = mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
mysql_select_db('testlaravel',$link);
$sql = "select * from class ";
$result = mysql_query($sql);
?>
<body style="background-color: #fafafa">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<!--<script>-->
<!--    $(window).scroll(function() {-->
<!--        $('div').each(function(){-->
<!--            var imagePos = $(this).offset().top;-->
<!--            var topOfWindow = $(window).scrollTop();-->
<!--            if (imagePos < topOfWindow+1600) {-->
<!--                $(this).addClass("fadeIn");-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->
<div id="my">
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" class="img" src="../user/photo/thumb/45.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Sherry Chen<br>
                <span style="margin-left: -8%" style="margin-left: -8%" class="detail">Master of Social Work, New York University,USA</span>
                <p>工作经历:
                <span style="margin-left: -8%" class="detail">
                    <br>各类型志愿者（教育文化环保）工作经验丰富<br>
                    学生会主席（了解各部门运作和可发挥的文案习作）、实践活动丰<br>
                    McSilver Institute for Poverty Policy and Research, Research Assistant<br>
                    Chinese American Planning Council, Social Work Intern<br>
                    SINA Inc, Editor Intern<br>
                    BAIDU Inc, LBS Product Marketing Editor Intern<br>
                </span></p>
<!--                <p>申到offers:-->
<!--                <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>

    </table>
</div>
&nbsp;
<div>
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/71.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Mango Shelly<br>
                <span style="margin-left: -8%" class="detail">Language Studies- Linguistics and Translation, 香港城市大学，中国香港</span>
                <p>工作经历:
                    <span style="margin-left: -8%" class="detail"><br>
                        英国纽卡斯尔大学主 交换一年 英语语言学方向<br>
                    新通留学 出国俊才班班主任<br>
                    金矢留学 出国留学文案老师
                    </span></p>
                <p>申到offers:<br>
                    <span style="margin-left: -8%" class="detail">香港城市大学 Language Studies<br>
                    香港城市大学 English Studies<br>
                    香港中文大学 Applied Linguisitics</span></td></p>
        </tr>
    </table><br>
</div>
&nbsp;
<div>
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/72.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Xirui Sun<br>
                <span style="margin-left: -8%" class="detail">M.S.Ed, University of Pennsylvani, USA</span>
                <p>工作经历:
                    <span style="margin-left: -8%" class="detail"><br>
                        《金陵晚报》教育版实习记者<br>
                        BLCU RICH汉语夏令营教学总监
                    </span></p>
                <p>申到offers:<br>

                    <span style="margin-left: -8%" class="detail">University of Pennsylvania<br>
                    Vanderbilt University<br>
                    Northwestern University<br>
                    University of Washington</span></td></p>
        </tr>
    </table><br>
</div>
&nbsp;
<div>
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/76.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Christian<br>
                <span style="margin-left: -8%" class="detail">Educational Linguistics, University of Pennsylvania, USA</span>
<!--                <p>工作经历:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">工作</span></p>-->
                <p>申到offers:<br>

                    <span style="margin-left: -8%" class="detail">University of Pennsylvania, M.S.Ed. TESOL
                    Johns Hopkins University, M.A.T. English<br>
                    Georgetown University, M.A. Linguistics<br>
                    Southern California University, M.A. TESOL<br>
                    New York University, M.A. English Education<br>
                    University of Illinois Champagne, M.A. TESOL<br>
                    Fordham University, M.S.Ed Curriculum and Teaching</span></td></p>
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/85.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Wanchong<br>
                <span style="margin-left: -8%" class="detail">Master of Economics, Georgetown University, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        券商，银行及会计师事务所均有实习经历
                    </span></p>
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/86.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Wilson<br>
                <span style="margin-left: -8%" class="detail">Management, London School of Economics and Political Science, England</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        巴西圣保罗州 AIESEC实习<br>
                        广州证券实习 负责公司上市，撰写招股说明书<br>
                        Graduated with First Class Honor Bachelor of Art<br>
                        Faculty of Humanity Dean's Award for Achievement<br>
                        Shuttleworth History Prize<br>
                        First Class Scholarship</span></p>
                <p>申到offers:<br>

                    <span style="margin-left: -8%" class="detail">The London School of Economics and Political Science<br>
                    The University of Manchester<br>
                    University of Warwick<br>
                    King's College London</span></td></p>
        </tr>
    </table><br>
</div>
&nbsp;
<!--<div >-->
<!--    <table align="center" class="mydiv">-->
<!--        <tr>-->
<!--            <td align="center"  width="350px" align="left">-->
<!--                <img class="img" src="../user/photo/thumb/89.jpg" width="100%" /></td>-->
<!--            <td align="left"  class="title">-->
<!--                Faye<br>-->
<!--                <span style="margin-left: -8%" class="detail">,？？？？？</span>-->
<!--                <p>工作经历:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">-->
<!--                        会展公司<br>-->
<!--                        地方电视台<br>-->
<!--                        广告公司 实习生<br>-->
<!--                    </span></p>-->
<!--<!--                <p>申到offers:<br>-->-->
<!--<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->-->
<!--        </tr>-->
<!--    </table><br>-->
<!--</div>-->
<!--&nbsp;-->
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/91.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Jiawei<br>
                <span style="margin-left: -8%" class="detail">Accounting and Finance, The University of Edinburgh, England</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        北京外国语大学学业奖学金 <br>
                        国家级宋庆龄奖学金<br>
                        第52届北京外国语大学学生会主席<br>
                    </span></p>
                <p>申到offers:<br>

                    <span style="margin-left: -8%" class="detail">The University of Edinburgh MSc Accounting and Finance<br>
                    The University of Manchester MSc Economics<br>
                    The University of Bristol MSc Accounting, Finance and Management<br>
                    The University of Lancaster MSc Accounting and Financial Management (5000 Pounds tuition fee waiver)<br>
                    University College London MSc Management<br>
                    The University of Strathclyde PhD Accounting and Finance (tuition fee cover)</span></td></p>
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/default.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Joycedebee<br>
                <span style="margin-left: -8%" class="detail">Education. Culture & Society, University of Pennsylvania, USA</span>
<!--                <p>工作经历:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">工作</span></p>-->
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/112.png" width="100%" /></td>
            <td align="left"  class="title">
                Dapeng Ji<br>
                <span style="margin-left: -8%" class="detail">Aging service management, University of Southern California, USA</span>
<!--                <p>工作经历:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">工作</span></p>-->
                <p>申到offers:<br>
                    <span style="margin-left: -8%" class="detail">
                        University of Southern California, Master of Aging Service Management<br>
                        New York University，Master of Social Work,7000美元奖学金<br>
                        </span></td></p>
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/106.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Connie<br>
                <span style="margin-left: -8%" class="detail">Finance, Accounting, Ohio State University, Indiana Wesleyan University, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        Transit to American Cultural Living Program in Indiana Wesleyan University August,2014<br>
                        Cultural Immersion Program in Indiana Wesleyan University    July,2014<br>
                        Global Engagement Office in Indiana Wesleyan University    August,2014 <br>
                    </span></p>
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/default.jpg" width="100%" /></td>
            <td align="left"  class="title"><br><br>
                Yun Xin<br>
                <span style="margin-left: -8%" class="detail">Business, University of Rochester, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        ngram Micro Senior Marketing Supervisor-- -Mobility Marketing <br>
                        'OMO&CLEAR’ Route to Town Program <br>
                        'TPME&WALL’ Project <br>
                        Establishment and Operation of Internal Website and Mobile Apps <br>
                        Monthly Standardization of Customer Information and Data Analysis <br>
                    </span></p>
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/108.png" width="100%" /></td>
            <td align="left"  class="title"><br><br>
                Yinnan Shen<br>
                <span style="margin-left: -8%" class="detail">Public Relations & Corporate Communication, New York University, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        奥美公关 实习生<br>
                        新华社北京分社 实习生<br>
                        及奔驰金融市场部 实习生
                    </span></p>
                <p>申到offers:<br>
                    <span style="margin-left: -8%" class="detail">
                        New Media Management Program的offer，10000美元奖学金
                    </span></td></p>
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/109.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Zhaoxu Wang<br>
                <span style="margin-left: -8%" class="detail">LLM, Northwestern University, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        上海永汇融资租赁有限公司 法务部经理<br>
                        中国工商银行上海市分行 世博支行合规部<br>
                    </span></p>
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/110.png" width="100%" /></td>
            <td align="left"  class="title">
                Yuan Tian<br>
                <span style="margin-left: -8%" class="detail">Master of Public Administration, Columbia University, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        非洲乌干达志愿者<br>
                        联合国实习生
                    </span></p>
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/111.png" width="100%" /></td>
            <td align="left"  class="title">
                Xiao Liu<br>
                <span style="margin-left: -8%" class="detail">中徳翻译, 德国美因茨大学翻译学院FTS, 德国</span>
                <p>工作经历:<br>
                    新东方 实习生
                    <span style="margin-left: -8%" class="detail">工作</span></p>
                <p>申到offers:<br>

                    <span style="margin-left: -8%" class="detail">University of Mainz<br>
                    Rheinische Friedrich-Wilhelms-Universität Bonn 波恩大学<br>
                    Eberhard-Karls-Universitaet Tuebingen 图宾根大学</span></td></p>
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/113.png" width="100%" /></td>
            <td align="left"  class="title">
                Fan Miao<br>
                <span style="margin-left: -8%" class="detail">Social Work, University of Southern California, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        留学中介公司实习 负责英美香港研究生院校资料查询、选校以及与校方邮件沟通<br>
                        中国旅行社总社（北京）分公司 实习<br>
                    </span></p>
                <p>申到offers:<br>
                    <span style="margin-left: -8%" class="detail">
                        American University, TESOL, Fall2014<br>
                        University of San Francisco, TESOL, Fall2014<br>
                        University of Rochester, TESOL, Fall2014<br>
                        University of Southern California,Master of Social Work Fall2015, 奖学金15000美元<br>
                        University of Southern California, Master of Aging Service Management Fall2015，奖学金1000美元<br>
                        New York University, Master of Social Work Fall2015, 奖学金7000美元
                    </span></td></p>
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/115.png" width="100%" /></td>
            <td align="left"  class="title">
                Jiacheng Zheng<br>
                <span style="margin-left: -8%" class="detail">Finance and Investment, University of Edingurgh, England</span>
<!--                <p>工作经历:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">工作</span></p>-->
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/116.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Xingyu Chen<br>
                <span style="margin-left: -8%" class="detail">Public Relations and Corporate Communication, New York University, USA</span>
<!--                <p>工作经历:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">工作</span></p>-->
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/117.png" width="100%" /></td>
            <td align="left"  class="title">
                Hongxu Ma<br>
                <span style="margin-left: -8%" class="detail">Geography, University of California at Berkeley, USA</span>
<!--                <p>工作经历:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">工作</span></p>-->
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/118.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Xingyao Liu<br>
                <span style="margin-left: -8%" class="detail">Strategic Public Relations, University of Southern California, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        挪威奥斯陆大学交换一学期<br>
                        纽约时报 实习生<br>
                        万博宣伟公关公司 实习生<br>
                        壳牌 实习生<br>
                        英孚教育 实习生<br>
                        奥美公关 实习生
                    </span></p>
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/119.png" width="100%" /></td>
            <td align="left"  class="title">
                Fangzhou Guo<br>
                <span style="margin-left: -8%" class="detail">Graduate School of Arts and Science, Yale, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        Rice University International Ambassador<br>
                        UNESCO Natural Sciences Divison 实习生<br>
                        贝恩咨询 实习生<br>
                        平安银行 兼职
                    </span></p>
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/120.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Shirline<br>
                <span style="margin-left: -8%" class="detail">Commercial Project Management, University of Manchester, England</span>
<!--                <p>工作经历:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">工作</span></p>-->
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;

<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/122.png" width="100%" /></td>
            <td align="left"  class="title">
                Guoyue Lei<br>
                <span style="margin-left: -8%" class="detail">政治学研究科, 早稻田大学, 日本</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        《每日新闻》 实习生<br>
                         香港《大公报》 兼职
                    </span></p>
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/136.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Cinthia Liu<br>
                <span style="margin-left: -8%" class="detail">Biology & Psychology, Franklin & Marshall College, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        热带雨林 丛林研究<br>
                        宝洁 实习生<br>
                        联合国 实习生<br>
                        本科期间 犹太研究奖项
                    </span></p>
                <p>申到offers:<br>
                    <span style="margin-left: -8%" class="detail">Mount Holyoke大学</span></td></p>
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/145.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Austin Liu<br>
                <span style="margin-left: -8%" class="detail">Public Relations, University of Southern California, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        纽约时报北京分社 实习编辑<br>
                        万博宣伟 实习顾问<br>
                        奥美公关 Community Manager<br>
                        壳牌、英孚 短期实习
                    </span></p>
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">好多</span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/thumb/153.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Paige MF<br>
                <span style="margin-left: -8%" class="detail">Master Science of Gerontology, University of Southern California, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        中国旅行社总社 实习生<br>
                        留学中介公司 实习生<br>
                        VOGUE CHINA 编辑助理
                    </span></p>
                <p>申到offers:<br>
                    <span style="margin-left: -8%" class="detail">
                        USC Master of Social Work，15000美元奖学金<br>
                        USC Master of Aging Service Management，1000美元奖学金<br>
                        NYU Master of Social Work，7500美元奖学金<br>
                        American University TESOL<br>
                        University of Rochester TESOL
                    </span></td></p>
        </tr>
    </table><br>
</div>

&nbsp;<div >
    <table align="center" class="mydiv">
        <tr>
            <td align="center"  width="350px" align="left">
                <img class="img" src="../user/photo/default.jpg" width="100%" /></td>
            <td align="left"  class="title">
                Junanhong Wang<br>
                <span style="margin-left: -8%" class="detail">Master Science of Gerontology, University of Southern California, USA</span>
                <p>工作经历:<br>
                    <span style="margin-left: -8%" class="detail">
                        市场营销公司 实习生<br>
                        清华大学与台湾清华大学合作的市场营销项目
                    </span></p>
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">很多-->
<!--                    </span></td></p>-->
        </tr>
    </table><br>
</div>
&nbsp;
<!--<div >-->
<!--    <table align="center" class="mydiv">-->
<!--        <tr>-->
<!--            <td align="center"  width="350px" align="left">-->
<!--                <img class="img" src="../user/photo/thumb/??.jpg" width="100%" /></td>-->
<!--            <td align="left"  class="title">-->
<!--                Tracy sun<br>-->
<!--                <span style="margin-left: -8%" class="detail">Statistics MA, Columbia University, USA</span>-->
<!--                <p>工作经历:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">-->
<!--                        大学在两个实验室搬了三年砖<br>-->
<!--                        在一个大数据研究中心实习了两个月<br>-->
<!--                        也在一个环评公司实习了一个月-->
<!--                    </span></p>-->
<!--                <p>申到offers:<br>-->
<!--                    <span style="margin-left: -8%" class="detail">Columbia University<br>-->
<!--                        Carnegie Mellon University<br>-->
<!--                        Rice University<br>-->
<!--                        University of Pittsburgh-->
<!--                    </span></td></p>-->
<!--        </tr>-->
<!--    </table><br>-->
<!--</div>-->
<!--&nbsp;-->
<!-- swipe -->

</body>
</html>