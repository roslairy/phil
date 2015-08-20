<!DOCTYPE html>
<html lang="zh">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta charset="UTF-8">
    <title>华中科技大学 - 哲学系
    @if(!empty($pageTitle))
    {{ ' | '.$pageTitle }}
    @endif
    </title>
    <meta name="Description" content="华中科技大学哲学系自1996年成立以来本着“入主流，重交叉，创特色”的指导思想，以倡主流、创交叉、重国际合作，走小而精的发展道路为特色，是国内哲学界“最年轻、最具活力的”哲学系之一。">
    <meta name="Keywords" content="华科, 哲学系, 华中科技大学">
    <meta name="Author" content="DotWe">
    <link rel="stylesheet" href="/style/commen.css">
    <link rel="stylesheet" href="/style/main.css">
</head>

<body>
    <div id="header">
        <div id="banner" class="getCenter">
            <div id="HUSTIcon">
                <img src="/img/icon.png" alt="HUST Icon">
            </div>
            <div id="HUSTName">
                <div id="HNC">
                    <img src="/img/huake.png" alt="华中科技大学">
                </div>
                <div id="HNE">
                    <img src="/img/hust.png" alt="Huazhong University of Science and Technology">
                </div>
               
            </div>
             <div style="width: 340px;height: 100%;float: left;">
             <img src="/img/makesi.png" style="width: 300px;height: 100%;margin-left:40px;">
                </div>
            <div id="departmet">
                <div id="pC">哲学系</div>
                <div id="pE">Department of Philosophy</div>
                <div id="EV">
                    <a href="">English</a>
                </div>
            </div>
        </div>
    </div>

    <div id="container">

        <div id="navBox">
            <ul id="nav">

                <li id='sy'>
                    <a href="/">首页</a>
                </li>

                <li id='bxgk'>
                    <a href="/archive/1">本系概况</a>
                    <div class="pageBox1 disappear">
                            <a href="/archive/1">本系简介</a>
                            <a href="/archive/2">历任领导</a>
                            <a href="/archive/3">系属机构</a>
                            <a href="/archive/4">党政组织</a>
                    </div>
                </li>

                <li id='szdw'>
                    <a href="/teacherList/famous">师资队伍</a>
                        <div class="pageBox1 disappear">
                            <a href="/teacherList/famous">名家风采</a>
                            <a href="/teacherList/retprof">荣休教授</a>
                            <a href="/teacherList/prof">教授</a>
                            <a href="/teacherList/asprof">副教授</a>
                            <a href="/teacherList/lecturer">讲师</a>
                            <a href="/teacherList/postdoctor">博士后</a>
                        </diV>
                </li>

                <li id='bksjy'>
                    <a href="/list/bksjy/bkszs">本科生教育</a>
                    <div class="pageBox1 disappear">
                            <a href="/list/bksjy/bkszs">本科生招生</a>
                            <a href="/list/bksjy/bkspy">本科生培养</a>
                            <a href="/list/bksjy/bksjx">本科生教学</a>
                            <a href="/list/bksjy/sxwjy">双学位教育</a>
                    </div>
                </li>

                <li id='yjsjy'>
                    <a href="/list/yjsjy/yjszs">研究生教育</a>
                    <div class="pageBox1 disappear">
                            <a href="/list/yjsjy/yjszs">研究生招生</a>
                            <a href="/list/yjsjy/yjspy">研究生培养</a>
                            <a href="/list/yjsjy/yjsjx">研究生教学</a>
                            <a href="/list/yjsjy/yxbpx">研修班培训</a>
                    </div>
                </li>

                <li id='xwzx'>
                    <a href="/list/xwzx/zxxw">新闻资讯</a>
                    <div class="pageBox1 disappear">
                            <a href="/list/xwzx/zxxw">最新新闻</a>
                            <a href="/list/xwzx/tzgg">通知通告</a>
                            <a href="/list/xwzx/xwjb">新闻季报</a>
                    </div>
                </li>

                <li id='xsjl'>
                    <a href="/list/xsjl/xsjz">学术交流</a>
                    <div class="pageBox1 disappear">
                            <a href="/list/xsjl/xsjz">学术讲座</a>
                            <a href="/list/xsjl/xshy">学术会议</a>
                            <a href="/list/xsjl/xsfw">学术访问</a>
                    </div>
                </li>

                <li id='ssyd'>
                    <a href="/list/ssyd/ssly">师生园地</a>
                    <div class="pageBox2 disappear">
                            <a href="/list/ssyd/ssly">师生掠影</a>
                            <a href="/list/ssyd/rzzy">睿智哲言</a>
                            <a href="/list/ssyd/xyzj">校友之家</a>
                    </div>
                </li>

            </ul>
        </div>

        <div id="content" class="getCenter">
            @yield('content')
        </div>

    </div>

    <div id="footer">
        <p>Copyright &copy; 2011 College of Humanities Department of Philosophy HUST, All Rights Reserved</p>
        <p>PowerBy:<a href="http://westudio.us/" style="display: inline;">DotWe</a> &nbsp; <a href="/admin/article" style="display: inline;">后台管理</a></p>
        <p>华中科技大学东五楼425室，邮编：430074，电话号码：87541842</p>
    </div>
    <script src="/jquery-1.11.3.min.js"></script>
    <script src="/js/clamp.min.js"></script>
    <script src="/js/commen.js"></script>
    <script type="text/javascript" charset="utf-8">
    	$('#{{$section}}').addClass('atHereColor');
    	@yield('script', '')
    </script>
</body>

</html>