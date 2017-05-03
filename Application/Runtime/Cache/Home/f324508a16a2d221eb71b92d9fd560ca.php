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
            
<div class="col-md-9  main-content">

                <div class="posts nav-info  animation">
                    <p class="posts-info" id="category">
                        <?php if($categoryInfo): echo ($categoryInfo['name']); ?>
                        <?php else: ?>
                        推荐阅读<?php endif; ?>
                    </p>
                    <p class="posts-cnt">共 <?php echo ($topCount); ?> 篇文章</p>
                </div>
                <?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><div class="posts animation">
                    <h4 class='posts-title'>
                        <a href="<?php echo U('Index/show',['id'=>$article['id']]);?>" class='animation'><?php echo ($article['subject']); ?></a>
                    </h4>
                    <p class='time'>作者 <?php echo ($article['username']); ?> &nbsp; <?php echo ($article['create_time']); ?></p>
                    <?php if($article['cover']): ?><a href="<?php echo U('Index/show',['id'=>$article['id']]);?>" class='thumbnail'><img src="/<?php echo ($article['cover']); ?>" alt='' style="cursor: pointer"></a><?php endif; ?>
                    <p class='descript'><?php echo ($article['summary']); ?></p>

                    <div class="posts-footer">
                        分类:
                        <a class="class animation" href="<?php echo U('Index/index',['id'=>$article['category_id']]);?>"><?php echo ($article['categoryName']); ?></a>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

                <nav aria-label="Page navigation" style="text-align: center">
                    <ul class="pagination">
                        <nav aria-label="Page navigation">
                            <ul class="pagination" >
                                <?php echo ($pageHtml); ?>
                            </ul>
                        </nav>
                    </ul>
                </nav>
            </div>

            
<div class="col-md-3 sidebar">
    <div class="clearfix"></div>
    <div class="sidebar-content">
        <!-- start search area -->
        <form class="form-horizontal" role="form" action="/blog/search" method="GET">
            <input id="search" class="form-control" name="s" type="text" value="">
            <button type="submit" class="animation red-btn">Search</button>
        </form>

        <!-- start info area -->
        <div class="card">
            <div class="header"></div>
            <div class="avater">
                <img alt="avater" src="/Public/Upload/icon/icon.jpg">
            </div>
            <div class="content">
                <h3>景色铅华</h3>
                <ul class="status">
                    <li><span class="normal"><?php echo ($articleCount); ?></span><br>文章</li>
                    <li><span class="normal"><?php echo ($topCount); ?></span><br>精选</li>
                    <li><span class="normal"><?php echo count($categoryList);?></span><br>分类</li>
                </ul>
            </div>
            <div style="clear:both;"></div>
        </div>

        <!-- start category area -->
        <h5>分类</h5>
        <ul class='nav nav-sidebar'>
            <li class="active">
                <a href="<?php echo U('Index/index');?>">推荐阅读<sup><?php echo ($topCount); ?></sup></a>
            </li>
            <?php if(is_array($categoryList)): $i = 0; $__LIST__ = $categoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($category['id']); ?>">
                <a href="<?php echo U('Index/index',['id'=>$category['id']]);?>"><?php echo ($category['name']); ?><sup><?php echo ($category['num']); ?></sup></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
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
        $('#nav > div').removeClass('active').eq(0).addClass('active');

        //分类活动标志
        $.each($('.nav-sidebar > li'),function(i,n){
            if($(this).data('id') == "<?php echo ($categoryInfo['id']); ?>"){
                $('.nav-sidebar > li').removeClass('active');
                $(this).addClass('active');
            }
        });

    });
</script>

</body>
</html>