<?php
namespace Back\Controller;

use Think\Controller;
use Common\Common\Tool;

class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!Tool::isLogin()){
            $this->redirect(C(BACK_URL)['login'], [], 2, '非法操作，请先登录');
        }

    }

    public function indexAction(){
        $this->display('/index');
    }
}