<?php
namespace Back\Controller;

use Think\Controller;

use Think\Verify;

class LoginController extends Controller
{
    public function loginAction(){
        if(IS_POST){
            $model = D('Login');
            //验证密码
            $res = $model->checkPass(I('post.'));
            if($res){
                //存在session中
                session('admin',$res);
                $this->redirect(C(BACK_URL)['index'], [], 2, '登录成功');
            }else{
                $this->redirect(C(BACK_URL)['login'], [], 2, '登录失败');
            }
        }else{
            $this->display('/login');
        }
    }

    //验证码
    public function checkVerifyAction()
    {
        $config = [
            'fontSize'    =>    16,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'imageH'      =>    30,
            'imageW'      =>    110,
            'useCurve'    =>    false,
        ];
        $Verify = new Verify($config);

        if(IS_POST){
            $res = $Verify->check(I('post.verify', 0));
            if ($res){
                $this->ajaxReturn(['code' => 200, 'mes' => true]);
            }else{
                $this->ajaxReturn(['code' => 400, 'mes' => false]);
            }
        }else{
            $Verify->entry();
        }

    }
}