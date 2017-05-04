<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-28
 * Time: 10:35
 */

namespace Common\Common;

use Think\Page;

//工具类
class Tool
{
    //删除图片
    public static function deleteImg($img){
        if(is_array($img)){
            foreach($img as $v){
                $url = str_replace('http://' . $_SERVER['SERVER_NAME'] . __ROOT__ . '/', '', $v);
                //删除图片
                unlink($url);
            }
        }
    }

    //是否登录
    public static function isLogin()
    {
        if(session('admin')){
            return true;
        }else{
            return false;
        }
    }

    //无限级分类
    public static function makeTree($list,$html = '', $pid = 0, $level = 0)
    {
        //必须静态，不然递归的栈无法共用非静态变量
        static $tree = array();
        $str = '';

        foreach($list as $key => $val){
            if($val['parent_id'] == $pid){

                for ($i = 0; $i < $level; $i++) {
                    $str .= $html ;
                }

                $val['name'] = $str . $val['name'];
                $tree[] = $val;
                //寻找子分类
                self::makeTree($list, $html, $val['id'], $level + 1);
            }
        }
        return $tree;
    }

    //找父类
    public static function findParent($list, $pid, $level = 1)
    {
        static $parent = array();

        foreach($list as $val){
            if($val['id'] == $pid){
                $parent[][$level] = $val['name'];

                self::findParent($list, $val['parent_id'], $level + 1);
            }
        }

        return $parent;
    }

    //查找子类
    public static function findSon($list, $pid){
        //必须静态，不然递归的栈无法共用非静态变量
        static $idList = array();

        foreach($list as $key => $val){
            if($val['parent_id'] == $pid){

                $idList[] = $val['id'];
                //寻找子分类
                self::findSon($list, $val['id']);
            }
        }

        return $idList;
    }

    //整理分类的显示，面包屑
    public static function crumb($list, $id)
    {
        $categoryList = self::findParent($list, $id);
        //获取有多少个数组元素是真实需要的
        $key = array_keys($categoryList[count($categoryList) - 1])[0];
        //反转
        $categoryList = array_reverse($categoryList);
        //得到想要的元素集
        $trueArr = array_splice($categoryList, $key);
        $categoryString = '';
        //拼装字符串
        foreach ($categoryList as $val){
            foreach ($val as $v){
                $categoryString .= $v . ' / ';
            }
        }

         return substr($categoryString, 0, -2);
    }

    //分页类
    public static function page($config, $pageStyle)
    {
        $page = new Page($config['totalRows'],$config['listRows']);
        unset($config['totalRows']);
        unset($config['listRows']);
        foreach ($config as $k => $v){
            $page->$k = $v;
        }
        foreach ($pageStyle as $key => $val){
            $page->setConfig($key, $val);
        }

        return $page->show();// 分页显示输出
    }
}