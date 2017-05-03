<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Public/Back/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Back/css/myLogin.css">
    <title>登录</title>
</head>
<body>
<div class="login">
    <div class="login-box">
        <div class="login-title text-center">
            <h1>
                <small>登录</small>
            </h1>
        </div>
        <div class="login-content ">
            <div class="form">
                <form action="<?php echo U('Back.php/Login/login');?>" id="login" method="post">
                    <div class="form-group">
                        <div class="col-xs-8">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="手机号">
                            </div>
                        </div>
                        <div class="col-xs-4 ">
                            <div class="input-group">
                                <span class="input-group-addon check">只允许手机号登录</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" id="password" name="password" class="form-control" placeholder="密码">
                            </div>
                        </div>
                        <div class="col-xs-4 ">
                            <div class="input-group">
                                <span class="input-group-addon check">密码不少于6位</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8">
                            <div class="input-group">
                                <span class="input-group-addon "><span class="glyphicon glyphicon-briefcase"></span></span>
                                <input type="text" id="verify" name="verify" class="form-control" placeholder="请输入验证码">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="<?php echo U('Back.php/Login/checkVerify');?>" onclick="this.src = '<?php echo U("Back.php/Login/checkVerify");?>'+'?'+Math.random()" style="cursor: pointer"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-4 col-xs-offset-4 ">
                            <button type="submit" class="btn btn-sm btn-info"><span
                                class="glyphicon glyphicon-off"></span> 登录
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright &copy; <a href="http://www.jorkboy.com/">景色铅华</a></span> |
                <span><a href="http://www.miibeian.gov.cn/" target="_blank">粤ICP备17048153号</a></span> |
                <span>粤公网安备17048153</span>
            </div>
        </div>
    </div>
</footer>
<script src="/Public/Back/js/jquery.min.js"></script>
<script>
    $(function(){
        $('#login').submit(function(){
            var flag = true;
            //手机号验证
            var phone = $('#phone');
            var pattern = /^1(?:3|5|7|8)[\d]{9}$/ig;
            if(!pattern.test(phone.val())){
                flag = false;
                $('.check').eq(0).text('手机号错误').css('color', 'red');
            }

            var password = $('#password');
            if(password.val().length < 6){
                flag = false;
                $('.check').eq(1).text('密码少于6位').css('color', 'red');
            }

            if(flag){
                $('#verifyinfo').remove();
                var verify = $('#verify');
                $.ajax({
                    type: "POST",
                    url: "<?php echo U('Back.php/Login/checkVerify');?>",
                    data: "verify="+ verify.val(),
                    async: false,

                    success: function(msg){
                        if(msg.code == 400){
                            flag = false;
                            var label = '<label id="verifyinfo" style="color: red;display: block;margin-left: 15px">验证码不正确</label>';
                            verify.parent().parent().parent().prepend(label);
                        }else{
                            flag = true;
                        }
                    }
                });
            }

            if(flag === false){
                return false;
            }
        });
    });
</script>
</body>
</html>