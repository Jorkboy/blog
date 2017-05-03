<?php
namespace Back\Controller;

use Think\Controller;
use \Common\Common\Tool;

class CategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!Tool::isLogin()){
            $this->redirect(C(BACK_URL)['login'], [], 2, '非法操作，请先登录');
        }

        $this->model = D('Category');
    }

    //分类设置
    public function setAction(){

        if(IS_POST){
            $param = array();
            //修改
            if(I('post.id', 0)){
                $data['id'] = I('post.id');
                $param = ['id' => I('post.id')];
            }
            //验证
            if(!$this->model->create(I('post.'))){
                $this->redirect(C(BACK_URL)['category']['set'], $param, 2, $this->model->getError());
            }
            //验证通过
            $data['parent_id'] = I('post.parent_id', 0);
            $data['name'] = I('post.title');

            if($res = $this->model->setData($data)){
                $this->redirect(C(BACK_URL)['category']['list'], [], 2, '设置成功');
            }else{
                $this->redirect(C(BACK_URL)['category']['list'], [], 2, '设置失败error:' . $res);
            }
        }else{
            //带id则为修改
            if(I('get.id', 0)){
                $categoryId = I('get.id');
                $category = $this->model->getOne($categoryId);

                $this->assign('category', $category);
            }
            //分类列表，新增
            $categoryList = $this->model->getCategory();
            $this->assign('categoryList', $categoryList);
            $this->display('/category_add');
        }
    }

	//分类列表
	public function listAction(){
        //分类列表
        $categoryList = $this->model->getCategory();
        $this->assign('categoryList', $categoryList);
		$this->display('/category_list');
	}

	//分类删除
    public function deleteAction()
    {
        $id = I('get.id', 0);

        $res = $this->model->deleteCategory($id);

        if ($res === false){
            $this->redirect(C(BACK_URL)['category']['list'], [], 2, 'SQL有误');
        }elseif($res === 0){
            $this->redirect(C(BACK_URL)['category']['list'], [], 2, '删除失败,没有该条数据');
        }else{
            $this->redirect(C(BACK_URL)['category']['list'], [], 2, '删除成功');
        }
    }
}