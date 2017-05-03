<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="/Public/Back/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- font Awesome -->
    <link href="/Public/Back/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="/Public/Back/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="/Public/Back/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
    
</head>
<body class="skin-blue">

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/<?php echo session('admin')['icon'];?>" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p><?php echo session('admin')['nickname'];?></p>
                    <p><?php echo session('admin')['feeling'];?></p>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="操作"/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i
                                    class="fa fa-search"></i></button>
                            </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="active" id="control">
                    <a href="<?php echo U('Back.php/index');?>">
                        <i class="fa fa-dashboard"></i> <span>控制台</span>
                    </a>
                </li>
                <li class="treeview " id="article">
                    <a href="#">
                        <i class="fa fa-file"></i> <span>文章</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="<?php echo U('Back.php/Article/list');?>"><i class="fa fa-list"></i>文章列表</a></li>
                        <li class="">
                            <a href="<?php echo U('Back.php/Article/set');?>"><i class="fa fa-edit"></i>
                                文章添加
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview " id="category">
                    <a href="#">
                        <i class="fa fa-th-large"></i> <span>分类</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="<?php echo U('Back.php/Category/list');?>"><i class="fa fa-list"></i>分类列表</a></li>
                        <li class="">
                            <a href="<?php echo U('Back.php/Category/set');?>"><i class="fa fa-edit"></i>
                                <?php if($category): ?>分类编辑
                                <?php else: ?>
                                分类添加<?php endif; ?>
                            </a></li>
                    </ul>
                </li>
                <li class="treeview " id="tag">
                    <a href="#">
                        <i class="fa fa-tag"></i> <span>标签</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="<{U('/Tag/list')}>"><i class="fa fa-list"></i>标签列表</a></li>
                        <li class=""><a href="<{U('/Tag/add')}>"><i class="fa fa-edit"></i>标签添加</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Right side column. Contains the navbar and content of the page -->
    
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                管理中心
                <small>控制台</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 管理中心</a></li>
                <li class="active">控制台</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

        </section><!-- /.content -->

    </aside><!-- /.right-side -->

</div><!-- ./wrapper -->


<!-- jQuery 2.0.2 -->
<script src="/Public/Back/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/Public/Back/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="/Public/Back/js/app.js" type="text/javascript"></script>
<script>
    $(function(){
        $.each($('.sidebar-menu > li'), function(i, n){
            $(this).removeClass('active');
        });
    });
</script>

<script>
    $(function(){
        $('#control').addClass('active');
    });
</script>

</body>
</html>