<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-27
 * Time: 13:30
 */

namespace Back\Model;

use Think\Model\RelationModel;

class ArticleModel extends RelationModel
{
    //批量验证
    protected $patchValidate = true;
    //自动验证
    protected $_validate = array(
        ['subject', 'require', '文章标题不能为空'],
        ['summary', 'require', '文章摘要不能为空'],
        ['content', 'require', '文章内容不能为空'],
    );

    //自动完成
    protected $_auto = array(
        ['modify_time', 'time', self::MODEL_UPDATE, 'function'],
        ['create_time', 'time', self::MODEL_INSERT, 'function'],
    );

    //文章入库
    public function setArticle($data) {
        $contentData = array();
        $contentModel = M('ArticleContent');
        $contentData['content'] = $data['content'];
        $contentData['img'] = $data['img'];
        $contentData['id'] = $data['contentid'];
        //清楚不需要的字段
        unset($data['content']);
        unset($data['img']);
        unset($data['contentid']);
        unset($data['allImage']);
        unset($data['addImage']);
        unset($data['hascover']);

        $this->startTrans();
        if ($data['id']) {
            $articleResult = $this->save($data);
            $contentResult = $contentModel->where(['id' => $contentData['id']])->save($contentData);
        } else {
            $articleResult = $this->add($data);
            $contentData['article_id'] = $articleResult;
            $contentResult = $contentModel->add($contentData);
        }

        if ($articleResult !== false && $contentResult !== false) {
            $this->commit();
            return true;
        } else {
            $this->rollback();
            return false;
        }
    }

    //获取文章简略信息
    public function getArticle($page = 1, $pageSize = 10) {
        $filed = ['id', 'category_id', 'subject', 'summary', 'create_time', 'top', 'status'];
        return $this->field($filed)->order('id desc')->page($page, $pageSize)->select();
    }

    //获取文章详情
    public function getArticleDetail($articleId) {
        $filed = [
            'article.id as articleid',
            'article_content.id as contentid',
            'category_id',
            'subject',
            'summary',
            'cover',
            'content',
            'top'
        ];

        return $this->join('__ARTICLE_CONTENT__ ON __ARTICLE__.id = __ARTICLE_CONTENT__.article_id')
            ->field($filed)
            ->where(['article.id' => $articleId])->find();
    }

    //删除文章
    public function articleDelete($articleId, $articleContentId) {
        $contentModel = M('articleContent');
        //开启事务
        $this->startTrans();
        $resArticle = $this->delete($articleId);
        $resContent = $contentModel->delete($articleContentId);
        if ($resArticle && $resContent) {
            $this->commit();
            return true;
        } else {
            $this->rollback();
            return false;
        }
    }


    //获取文章的图片
    public function getArticleImg($articleId) {
        return $this->join('__ARTICLE_CONTENT__ ON __ARTICLE__.id = __ARTICLE_CONTENT__.article_id')
            ->field('article_content.id as articleContentId,img,cover')
            ->where(['article.id' => $articleId])->find();
    }

    //获取文章总数
    public function getArticleCount()
    {
        return $this->count();
    }
}
