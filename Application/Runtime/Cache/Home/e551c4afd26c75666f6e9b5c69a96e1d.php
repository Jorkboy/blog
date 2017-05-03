<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="景色铅华 Blog 景色铅华 博客 电影分享 PHP MySQL Linux 后端开发">
    <meta name="Description" content="景色铅华的个人博客 分享互联网技术 记录生活 分享电影">
    <title>景色铅华</title>
    <link href="/Public/Upload/icon/favicon.ico" rel="icon" type="image/x-icon">
    <link href='/Public/Home/bootstrap/bootstrap.min.css' rel='stylesheet'>
    <link href='/Public/Home/CSS/Home/main.css' rel='stylesheet'>
    
</head>

<body>
<!--[if lt IE 9]>
<h3 style="color:black;background: #FF5;margin: 0;padding:10px;position: fixed; z-index: 99;width: 100%"
    class="text-center">
    此浏览器太旧，或处于兼容模式
</h3>
<![endif]-->
<noscript style="color:black;background: #FF5;margin: 0;padding:10px;position: fixed; z-index: 99;width: 100%"
          class="text-center">
    必须启用javascript才能正确浏览
</noscript>
<div class='main-header'>
    <div id="blogTitle">
        <h2>景色铅华</h2>
        <h5>世上唯有电影与代码不可辜负</h5>
        <canvas id="bubbleCanvas" width="241" height="240">你的浏览器版本过低</canvas>
    </div>
    <div class='nav row'>
        <div class="col-md-6 col-md-offset-3">
            <div class="row" id="nav">
                <div class="col-md-4"><a class="animation" href="<?php echo U('Index/index');?>">首页 Home</a></div>
                <div class="col-md-4"><a class="animation" href="<?php echo U('Index/timeLine');?>">文章归档 Articles</a></div>
                <div class="col-md-4"><a class="animation" href="<?php echo U('Index/about');?>">简介 About</a></div>
            </div>
        </div>
    </div>
</div>

<div class="content-warp">
    <div class="container">
        <div class="row">

            <!--start main content aera-->
            
    <div class="content-warp">
    <div class="container">
        <div class="row">
            <!--start main content aera-->
            <div class="col-md-12  main-content">
                <div class="post">

                    <!--start article header aera-->
                    <div class="header">
                        <div class="title">
                            <h2 class='text-center'>简介 | About</h2>
                        </div>
                        <div class='time'><br></div>
                        <div style="clear:both;"></div>
                    </div>

                    <!--start main article aera-->
                    <div style="border-bottom: none;" class="article">

                        <a href='' class='thumbnail'>
                            <img src='/Public/Upload/icon/home.jpg' alt=''>
                        </a>

                        <h4>自我介绍</h4>
                        <p class='para'>
                            作者：景色铅华，喜欢电影，喜欢技术，别无他长。
                        </p>

                        <h4>博客介绍</h4>

                        <p class='para'>
                            电影看了不少，发现观影水平没有提高，我能怎么办？我也很无奈啊
                        </p>


                        <h4>联系方式</h4>
                        <p class='para'>
                            E-mail: allstill@live.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            

        </div>
    </div>
    <script src='/Public/Home/JS/prism.js'></script>
</div>



<div class='main-footer'>
    <div class="container">
        <div class="logo">
            分享好电影
        </div>
        <p>
            &nbsp;&nbsp; 记录生活，虽然平淡无奇
            <br>
            「 保持一颗热爱电影与技术的❤ 」
        </p>
    </div>

    <h5 class="copyright text-center">
        &copy; 2017 景色铅华 &nbsp;|&nbsp; 粤ICP备17048153号 &nbsp;|&nbsp;
        <a href="http://www.php.net/" target="_blank">PHP Online</a> &nbsp;|&nbsp;
        <a href="<?php echo U('Back.php/Index/index');?>" target="_blank">Admin</a>
    </h5>
</div>

<script src="/Public/Home/JS/jquery-3.1.1.js"></script>
<script src="/Public/Home/bootstrap/bootstrap.js"></script>
<script src="/Public/Home/JS/bubble.js"></script>


<script>
    $(function(){
        //导航栏活动标志
        $('#nav > div').removeClass('active').eq(2).addClass('active');
    });
</script>

</body>
</html>