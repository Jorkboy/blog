<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-30
 * Time: 11:03
 */

namespace Home\Model;

use Common\Common\Tool;

class IndexModel
{
    //获取分类
    public function getCategory()
    {
        $model = M('category');
        return $model->select();
    }

    //获取文章
    public function getArticle(array $page, array $where = ['top' => ['eq', 1]])
    {
        return M('article')
            ->join('`admin` ON user_id = admin.id')
            ->join('`category` ON article.category_id = category.id')
            ->where($where)
            ->page($page[0],$page[1])
            ->where(['status' => 1])
            ->order('article.id desc')
            ->field(['admin.nickname as username','article.*'])
            ->select();
    }

    //获取单条分类信息
    public function oneCategory($categoryId)
    {
        $model = M('category');
        return $model->find($categoryId);
    }

    //获取各个分类下的文章数量
    public function getCategoryCount()
    {
        return M('article')
            ->field('category_id,count(id) as num')
            ->group('category_id')
            ->where(['status' => 1])
            ->select();
    }

    //推荐阅读的文章数量
    public function getTopCount()
    {
        return M('article')
            ->where(['top' => 1,'status'=>1])
            ->count();
    }

    //获取文章总数指定条件
    public function getArticleCount(array $where = [])
    {
        return M('article')
            ->where(['status' => 1])
            ->where($where)
            ->count();
    }

    //获取文章简略信息,按时间倒序排列
    public function getArticleBrief()
    {
        return M('article')
            ->field(['id','subject', 'summary','create_time'])
            ->where(['status' => 1])
            ->order('create_time desc')
            ->select();
    }

    //获取文章详情
    public function getArticleDetail($id)
    {
        return M('article')
            ->join('`article_content` ON article.id = article_content.article_id')
            ->field(['article.id as id', 'category_id', 'subject', 'create_time', 'content'])
            ->where(['article.id' => $id])
            ->find();
    }
}