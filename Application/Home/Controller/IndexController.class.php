<?php
namespace Home\Controller;

use Common\Common\Tool;
use Home\Model\IndexModel;
use Think\Controller;

class IndexController extends Controller
{
    public function indexAction(){
        $categoryId = (int) I('get.id', 0);

        $model = new IndexModel();

        //获取侧边栏内容
        $sidebarList = $this->getSidebar($model);

        //该分类下文章总数
        if($categoryId){
            $totalRows = $model->getArticleCount(['category_id' => I('get.id',null)]);
        }else{
            $totalRows = $sidebarList['topCount'];
        }

        $pageSize = C(HOME_PAGE)['pageSize'];
        //总页数
        $totalPages = ceil($totalRows / $pageSize);

        $page = (int) I('get.page', 0);
        if($page <= 0){
            $page = 1;
        }elseif($page > $totalPages){
            $page = $totalPages;
        }
        //分页配置
        $pageConfig = [
            'listRows' =>  $pageSize,
            'totalRows' =>  $totalRows,
            'p'         =>  'page',
            'url'         =>  'Index/index',
        ];
        //分页样式
        $pageStyle = [
            'prev'   => '上一页',
            'next'   => '下一页',
            'theme'  => '%UP_PAGE% %TOTAL_PAGE% %DOWN_PAGE%',
        ];
        $pageHtml = Tool::page($pageConfig, $pageStyle);

        if($categoryId){
            //获取分类某个信息
            $categoryInfo = $model->oneCategory($categoryId);
            //分页携带的参数
            $pageConfig['parameter'] = ['id' => $categoryId];
            if ($categoryInfo){
                //分类下文章列表
                $articleList = $model->getArticle([$page, $pageSize], ['category_id'=>$categoryId]);
                $this->assign('categoryInfo', $categoryInfo);
            }else{
                $this->redirect('Index/index', [], 2, '参数有误');
            }
        }else{
            //推荐阅读文章列表
            $articleList = $model->getArticle([$page, $pageSize]);
        }
        //整合
        $categoryList = $model->getCategory();
        $articleList = array_map(function($articleList) use($categoryList){
            //添加面包屑分类名
            $articleList['categoryName'] = Tool::crumb($categoryList, $articleList['category_id']);
            $articleList['create_time'] = date('Y-m-d' ,$articleList['create_time']);
            return $articleList;
        }, $articleList);

        $this->assign('categoryList', $sidebarList['categoryList']);
        $this->assign('articleList', $articleList);
        $this->assign('topCount', $sidebarList['topCount']);
        $this->assign('articleCount', $sidebarList['articleCount']);
        $this->assign('pageHtml', $pageHtml);
        $this->display('/index');
    }

    public function timeLineAction()
    {
        $model = new IndexModel();
        //获取文章信息
        $articleBriefList = $model->getArticleBrief();

        $articleBriefList = array_map(function($articleBriefList){
            $articleBriefList['create_time'] = date('Y-m-d', $articleBriefList['create_time']);
            return $articleBriefList;
        } ,$articleBriefList);

        $this->assign('articleBriefList', $articleBriefList);
        $this->display('/timeLine');
    }

    public function aboutAction()
    {
        $this->display('/about');
    }

    public function showAction(){
        $model = new IndexModel();

        //获取侧边栏内容
        $sidebarList = $this->getSidebar($model);


        //获取文章详情
        $articleId = (int) I('get.id',0);

        if($articleId){
            $articleDetail = $model->getArticleDetail($articleId);
            if ($articleDetail){
                //获取父分类
                $categoryList = $model->getCategory();
                $articleDetail['categoryName'] = Tool::crumb($categoryList, $articleDetail['category_id']);
                //整合
                $articleDetail['create_time'] = date('Y-m-d', $articleDetail['create_time']);
            }else{
                $this->redirect('Index/index', [], 2, '参数有误');
            }
        }else{
            $this->redirect('Index/index', [], 2, '参数有误');
        }

        $this->assign('categoryList', $sidebarList['categoryList']);
        $this->assign('articleDetail', $articleDetail);
        $this->assign('topCount', $sidebarList['topCount']);
        $this->assign('articleCount', $sidebarList['articleCount']);
        $this->display('/article');
    }

    //获取侧边栏需要的内容
    public function getSidebar($model)
    {
        //获取各个分类下的文章数量
        $numList = $model->getCategoryCount();
        //获取分类
        $list = $model->getCategory();

        $categoryList = array();
        //整合
        foreach ($list as $category){

            foreach ($numList as $num){
                if($num['category_id'] == $category['id']){
                    $categoryList[$category['name']]['num'] = $num['num'];
                }
            }

            if(!$categoryList[$category['name']]['num']){
                $categoryList[$category['name']]['num'] = 0;
            }

            $categoryList[$category['name']]['id'] = $category['id'];
            $categoryList[$category['name']]['name'] = Tool::crumb($list, $category['id']);
        }

        //获取推荐阅读的文章数量
        $topCount = $model->getTopCount();
        //获取总文章数量
        $articleCount = $model->getArticleCount();

        $resList = [
            'categoryList' => $categoryList,
            'topCount'     => $topCount,
            'articleCount' => $articleCount
        ];

        return $resList;
    }
}