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
    
<link href='/Public/Home/CSS/Home/timeline.css' rel='stylesheet'>

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
            
    <div class="col-md-12 main-content">
        <?php if(is_array($articleBriefList)): $i = 0; $__LIST__ = $articleBriefList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$articleBrief): $mod = ($i % 2 );++$i;?><div class="timeline-img"></div>
        <!--<div class="triangle-left"></div>-->
        <div class="timeline-post">
            <h4 class='post-title'>
                <a href="<?php echo U('Index/show',['id'=>$articleBrief['id']]);?>" class='animation'><?php echo ($articleBrief['subject']); ?></a>
            </h4>
            <p><?php echo ($articleBrief['summary']); ?></p>
            <p class='time'><?php echo ($articleBrief['create_time']); ?></p>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
        $('#nav > div').removeClass('active').eq(1).addClass('active');
    });
</script>

</body>
</html>