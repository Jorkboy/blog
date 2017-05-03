<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文章设置</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="/Public/Back/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- font Awesome -->
    <link href="/Public/Back/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="/Public/Back/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="/Public/Back/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
    
<link href='/Public/Back/wangEditor/dist/css/wangEditor.min.css' rel='stylesheet'>
<link href='/Public/Back/wangEditor/dist/css/styles/monokai-sublime.css' rel='stylesheet'>

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
                文章添加
                <small>文章</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo U('Back.php/index');?>"><i class="fa fa-dashboard"></i> 管理中心</a></li>
                <li>文章</li>
                <li class="active">文章添加</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form action="<?php echo U('Back.php/Article/set');?>" id="form" method="post" enctype="multipart/form-data">
                            <?php if($articleList): ?><input type="hidden" name="id" value="<?php echo ($articleList['articleid']); ?>">
                            <input type="hidden" name="contentid" value="<?php echo ($articleList['contentid']); ?>">
                            <?php else: ?>
                            <input type="hidden" name="user_id" value="<?php echo session('admin')['id'];?>"><?php endif; ?>
                            <div class="box-header">
                                <h3 class="box-title"></h3>
                                <a href="<?php echo U('Back.php/Article/list');?>" class="btn btn-default pull-right">文章列表</a>
                            </div><!-- /.box-header -->

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputCategoryId">文章分类</label>
                                    <select name="category_id" id="inputCategoryId" class="form-control">
                                        <?php if(is_array($categoryList)): $i = 0; $__LIST__ = $categoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i; if($articleList AND $articleList['category_id'] == $list['id']): ?><option value="<?php echo ($list['id']); ?>" selected><?php echo ($list['name']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo ($list['id']); ?>"><?php echo ($list['name']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputSubject">文章标题|还可以输入：<span class="num" style="color: #0d70b7">30</span>个字符</label>
                                    <input type="text" name="subject" placeholder="标题" id="inputSubject" class="form-control" value='<?php if($articleList): echo ($articleList["subject"]); endif; ?>'>
                                </div>
                                <div class="form-group">
                                    <?php if($articleList['cover']): ?><input type="hidden" name="hascover" value="<?php echo ($articleList['cover']); ?>">
                                    <img src="/<?php echo ($articleList['cover']); ?>" style="display: block;width: 500px"><br>
                                    <?php else: ?>
                                    <label for="inputCover">文章封面</label><?php endif; ?>
                                    <input type="file" name="cover" id="inputCover" class="">

                                </div>
                                <div class="form-group">
                                    <label for="inputSummary">文章摘要|还可以输入：<span class="num" style="color: #0d70b7">200</span>个字符</label>
                                    <textarea name="summary" placeholder="摘要" id="inputSummary" class="form-control"><?php if($articleList): echo ($articleList['summary']); endif; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputContent">文章内容</label>
                                    <textarea name="content" class="form-control" id="inputContent" cols="30" placeholder="内容" rows="10"><?php if($articleList): echo ($articleList['content']); endif; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="InputTop">是否推荐</label>
                                    <select name="top" id="InputTop" class="form-control">
                                        <?php if($articleList['top']): ?><option value="1" selected>推荐</option>
                                        <option value="0" >不推荐</option>
                                        <?php else: ?>
                                        <option value="0" selected>不推荐</option>
                                        <option value="1">推荐</option><?php endif; ?>
                                    </select>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <button class="btn btn-primary" type="submit" name="status" value="1"><?php if($articleList): ?>修改并发布<?php else: ?>发布<?php endif; ?></button>
                                <button class="btn btn-info" type="submit" name="status" value="0">仅保存</button>
                            </div><!-- /.box-footer -->
                        </form>

                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->

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

<!--wangEdit富文本编辑器js-->
<script src="/Public/Back/wangEditor/dist/js/wangEditor.js" type="text/javascript"></script>

<!--这里引用jquery和wangEditor.js-->
<script type="text/javascript">
    // 为页面所有的editor配置全局的密钥
    wangEditor.config.mapAk = 'ZGUly27vzcN5SRmq89ub63ETZfGG8uPo';  // 此处换成自己申请的密钥

    var editor = new wangEditor('inputContent');

    // 上传图片URL
    editor.config.uploadImgUrl = '<?php echo U("Back.php/Article/Upload");?>';

    // 配置自定义参数
    /*editor.config.uploadParams = {
        token: 'abcdefg',
        user: 'jork'
    };*/

    // 设置 headers
    editor.config.uploadHeaders = {
        'Accept' : 'text/x-json'
    };

    // 隐藏掉插入网络图片功能。该配置，只有在你正确配置了图片上传功能之后才可用。
    editor.config.hideLinkImg = false;

    //图片name
    editor.config.uploadImgFileName = 'image';

    // 自定义load事件
    editor.config.uploadImgFns.onload = function (resultText, xhr) {
        // resultText 服务器端返回的text
        // xhr 是 xmlHttpRequest 对象，IE8、9中不支持

        // 上传图片时，已经将图片的名字存在 editor.uploadImgOriginalName
        //var originalName = editor.uploadImgOriginalName || '';

        console.log('上传结束，返回结果为 ' + resultText);

        if (resultText.indexOf('error|') === 0) {
            // 提示错误
            console.warn('上传失败：' + resultText.split('|')[1]);
            alert(resultText.split('|')[1]);
        } else {
            console.log('上传成功，即将插入编辑区域，结果为：' + resultText);

            //添加上传路径到表单隐藏域中
            var image = '<input type="hidden" name="allImage[]" value="' + resultText + '">';
            $('#form').prepend(image);

            // 将结果插入编辑器
            // 如果 resultText 是图片的url地址，可以这样插入图片：
            //editor.command(null, 'insertHtml', '<img src="' + resultText + '" alt="' + '" style="width: 778px;"/>');
            // 如果不想要 img 的 max-width 样式，也可以这样插入：
            editor.command(null, 'InsertImage', resultText);
        }
    };

    //创建编辑器
    editor.create();

    // 禁用
    //editor.disable();

    // 启用
    //editor.enable();

    // 初始化编辑器的内容
    var text = '';
    //editor.$txt.html(text);
</script>

<script>
    $(function(){
        //处理左侧栏
        $('#article').addClass('active');
        $('#article > a > i').eq(1).removeClass('fa-angle-left').addClass('fa-angle-down');
        $('#article > ul').css('display','block');
        $('#article > ul a').eq(1).css('color','#FFC617');

        //表单们的id
        var subject = $('#inputSubject');
        var summary = $('#inputSummary');
        var content = $('#inputContent');
        //提交前的处理
        $('#form').submit(function(){
            //正则匹配text area中的图片地址
            var pattern = /http:\/\/.*?(\.jpg|\.png|\.gif)(?=")/ig; //全局搜索

            //遍历添加到表单隐藏域
            if(content.val().match(pattern)){
                $.each(content.val().match(pattern), function(i, n){
                    var image = '<input type="hidden" name="addImage[]" value="' + n + '">';
                    $('#form').prepend(image);
                });
            }

            //表单验证
            var flag = true;
            $('.verify').remove();
            if(subject.val() == '' || $.trim(subject.val()).length > 30){
                var label1 = '<label class="verify">标题不能为空|字数不能超过30</label>';
                subject.parent().append(label1);
                flag = false;
            }
            if(summary.val() == '' || $.trim(summary.val()).length > 200){
                var label2 = '<label class="verify">摘要不能为空|字数不能超过200</label>';
                summary.parent().append(label2);
                flag = false;
            }
            if(content.val() == ''){
                var label3 = '<label class="verify">内容不能为空</label>';
                content.parent().append(label3);
                flag = false;
            }

            //改变验证字体颜色
            $('.verify').css('color', 'red');

            if(!flag){
                return false;
            }
        });

        //实时检测
        subject.bind('focus', function(){
            t = setInterval(function(){
                var num = 30 - $.trim(subject.val()).length;
                if(num < 0){
                    $('.num').eq(0).text('超字了傻逼');
                }else{
                    $('.num').eq(0).text(num);
                }

            }, 1000);
        });

        subject.bind('focusout', function(){
            clearInterval(t);
        });

        summary.bind('focus', function(){
            tt = setInterval(function(){
                var num = 200 - $.trim(summary.val()).length;
                if(num < 0){
                    $('.num').eq(1).text('超字了傻逼');
                }else{
                    $('.num').eq(1).text(num);
                }

            }, 1000);
        });

        summary.bind('focusout', function(){
            clearInterval(tt);
        });

        //上传图片即时预览
        $('#inputCover').change(function(){
            $(this).parent().find('img').remove();
            var objUrl = getObjectURL(this.files[0]) ;
            if (objUrl) {
                var img = '<img src="'+ objUrl +'" style="display: block;width: 500px"/><br>';
                $(this).parent().prepend(img);
            }
        });

        //建立一個可存取到該file的url
        function getObjectURL(file) {
            var url = null ;
            if (window.createObjectURL!=undefined) { // basic
                url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
        }

    });
</script>

</body>
</html>