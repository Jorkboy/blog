<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-27
 * Time: 13:30
 */

namespace Back\Model;

use Think\Model;
use Common\Common\Tool;

class CategoryModel extends Model
{
    //批量验证
    //protected $patchValidate = true;
    //验证输入
    protected $_validate = array(
        array('title','require','标题不能为空'),
    );

    //获取分类
    public function getCategory($tree = true)
    {
        $list = $this->select();

        if($tree){
            return Tool::makeTree($list, '&nbsp&nbsp&nbsp&nbsp');
        }else{
            return $list;
        }
    }

    //获取单条分类信息
    public function getOne($CategoryId)
    {
        return $this->find($CategoryId);
    }

    //入库
    public function setData(array $data)
    {
        if($data['id']){
            return $this->save($data);
        }else{
            return $this->add($data);
        }
    }

    public function deleteCategory($CategoryId){

        //return $this->delete($CategoryId);
        $list = $this->where(['parent_id' => ['neq', 0]])->field('id,parent_id')->select();

        $deleteList = Tool::findSon($list, $CategoryId);
        $deleteList[] = $CategoryId;

        return $this->where(['id' => ['in', $deleteList]])->delete();
    }

}
