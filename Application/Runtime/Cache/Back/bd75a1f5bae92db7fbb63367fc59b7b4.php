<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文章列表</title>
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
    
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                文章列表
                <small>文章</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo U('Back.php/index');?>"><i class="fa fa-dashboard"></i> 管理中心</a></li>
                <li>文章</li>
                <li class="active">文章列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                            <a href="<?php echo U('Back.php/Article/set');?>" class="btn btn-default pull-right">添加文章</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered" style="text-align: center">
                                <tbody>
                                <tr>
                                    <th style="width: 5%;text-align: center">id</th>
                                    <th style="width: 5%;text-align: center">状态</th>
                                    <th style="width: 5%;text-align: center">推荐</th>
                                    <th style="width: 35%;text-align: center">标题</th>
                                    <th style="width: 20%;text-align: center">所属分类</th>
                                    <th style="width: 15%;text-align: center">创建时间</th>
                                    <th style="width: 15%;text-align: center">操作</th>
                                </tr>
                                <?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                    <td style="line-height: 35px"><?php echo ($list['id']); ?></td>
                                    <td style="line-height: 35px">
                                        <?php echo ($list['status']); ?>
                                    </td>
                                    <td style="line-height: 35px"><?php echo ($list['top']); ?></td>
                                    <td style="line-height: 35px"><a href="<?php echo U('Index/show/',['id'=>$list['id']]);?>"><?php echo ($list['subject']); ?></a></td>
                                    <td style="line-height: 35px"><?php echo ($list['category']); ?></td>
                                    <td style="line-height: 35px"><?php echo ($list['create_time']); ?></td>
                                    <td>
                                        <a href="<?php echo U('Back.php/Article/set',['id'=>$list['id']]);?>" class="btn btn-default" title="编辑"><span class="fa fa-edit"></span> 编辑</a>
                                        <a href="<?php echo U('Back.php/Article/delete',['id'=>$list['id']]);?>" class="btn btn-default" title="删除" onclick="return confirm('是否删除？');"><span class="fa fa-trash-o"></span> 删除</a>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                        <!--分页的位置-->
                        <nav aria-label="Page navigation" style="text-align: center">
                            <ul class="pagination">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <?php echo ($pageHtml); ?>
                                    </ul>
                                </nav>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
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
        //处理左侧栏
        $('#article').addClass('active');
        $('#article > a > i').eq(1).removeClass('fa-angle-left').addClass('fa-angle-down');
        $('#article > ul').css('display','block');
        $('#article > ul a').eq(0).css('color','#FFC617');
    });
</script>

</body>
</html>