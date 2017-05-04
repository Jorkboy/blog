<?php
namespace Back\Controller;

use Common\Common\Tool;
use Think\Controller;
use Think\Upload;

class ArticleController extends Controller
{
    public $model;
    public function __construct()
    {
        parent::__construct();

        if(!Tool::isLogin()){
            $this->redirect(C(BACK_URL)['login'], [], 2, '非法操作，请先登录');
        }

        $this->model = D('Article');
    }

    //文章添加
	public function setAction() {
		if (IS_POST) {
		    $input = I('post.');
            $param = I('post.id', 0) ? ['id' => I('post.id', 0)] : [];
		    //自动验证
            if (!$data = $this->model->create()){
                $error = '';
                foreach ($this->model->getError() as $val){
                    $error .= $val . '<br>';
                }
                $this->redirect(C(BACK_URL)['article']['set'], $param, 2, $error);
            }

            //不知何原因要合并，唉。。。
            $data = array_merge($input,$data);
            $data['content'] = I('post.content', '', '');

            //上传封面图
            $upload = new Upload(C('UPLOAD'));
            // 上传文件
            $info = $upload->upload();

            if($info) {
                $data['cover'] = C('UPLOAD')['rootPath'] . $info['cover']['savepath'] . $info['cover']['savename'];
                //删除旧封面
                unlink(I('post.hascover', 0));
            }else{
                if($param){
                    $data['cover'] = I('post.hascover');
                }else{
                    $data['cover'] = '';
                }
            }

            //处理富文本里的图片
            $allImage = I('post.allImage');
            $addImage = I('post.addImage');
            //计算两个数组的差集
            $diff = array_diff($allImage, $addImage);
            //为真表示有要删除的图片
            if($diff){
                Tool::deleteImg($diff);
            }
            //序列化图片地址数组
            $data['img'] = serialize($addImage);

            //入库
            if($this->model->setArticle($data)){
                $this->redirect(C(BACK_URL)['article']['list'], [], 2, '文章已存到数据库');
            }else{
                $this->redirect(C(BACK_URL)['article']['set'], $param, 2, '文章入库失败');
            }

		} else {
		    $articleId = (int) I('get.id', 0);
		    if($articleId){
                //获取文章内容
                $articleList = $this->model->getArticleDetail($articleId);
                $this->assign('articleList', $articleList);
            }
		    //分类列表
            $model = D('Category');
            $categoryList = $model->getCategory();
            $this->assign('categoryList', $categoryList);
			$this->display('/article_add');
		}

	}

	//文章列表
	public function listAction() {
        //文章总数
        $totalRows = $this->model->getArticleCount();
        //总页数
        $totalPages = ceil($totalRows / C(BACK_PAGE)['pageSize']);
        $page = (int) I('get.page', 0);
        if($page <= 0){
            $page = 1;
        }elseif($page > $totalPages){
            $page = $totalPages;
        }
        $articleList = $this->model->getArticle($page, C(BACK_PAGE)['pageSize']);

        //事先获取分类列表，避免多次连接数据库
        $list = D('Category')->getCategory(false);
        //整合处理
        $articleList = array_map(function($articleList) use($list){
            $articleList['create_time'] = date('Y-m-d H:m:s' ,$articleList['create_time']);
            $articleList['status'] = $articleList['status'] == 1 ? '已发表' : '未发表';
            $articleList['top'] = $articleList['top'] == 1 ? '推荐' : '不推荐';
            //寻找父分类
            $categoryString = Tool::crumb($list, $articleList['category_id']);
            $articleList['category'] = $categoryString;

            return $articleList;
        }, $articleList);

        //分页配置
        $pageConfig = [
            'listRows' =>  C(BACK_PAGE)['pageSize'],
            'totalRows' =>  $totalRows,
            'p'         =>  'page',
            'url'         =>  C(BACK_URL)['article']['list'],
        ];
        //分页样式
        $pageStyle = [
            'prev'   => '上一页',
            'next'   => '下一页',
            'theme'  => '%UP_PAGE% %TOTAL_PAGE% %DOWN_PAGE%',
        ];
        $pageHtml = Tool::page($pageConfig, $pageStyle);

        //分配
        $this->assign('articleList', $articleList);
        $this->assign('pageHtml', $pageHtml);
		$this->display('/article_list');
	}

	//删除文章
    public function deleteAction()
    {
        $articleId = I('get.id', 0);
        //先删除图片
        $resList = $this->model->getArticleImg($articleId);
        $img = $resList['img'];
        $img = unserialize($img);
        Tool::deleteImg($img);
        //删除封面
        $cover = $resList['cover'];
        unlink($cover);

        $articleContentId = $resList['articlecontentid'];
        $res = $this->model->articleDelete($articleId, $articleContentId);
        if($res){
            $this->redirect(C(BACK_URL)['article']['list'], [], 2, '文章已经删除');
        }else{
            $this->redirect(C(BACK_URL)['article']['list'], [], 2, '文章删除失败');
        }
    }

	//富文本编辑器的文件上传方法
	public function UploadAction()
	{
		$upload = new Upload(C('UPLOAD'));
		// 上传文件
		$info = $upload->upload();
		if(!$info) {
			// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{
			//返回的URL，//表示让浏览器选择使用的协议，这样可以避免http和https混淆
			$URL ='//' . $_SERVER['SERVER_NAME'] . __ROOT__ . '/' . C('UPLOAD')['rootPath'] . $info['image']['savepath'] . $info['image']['savename'];

			//必须以原始字串返回，在后面加EVAL
			$this->ajaxReturn($URL, 'EVAL');
		}
	}

}