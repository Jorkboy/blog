<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/27
 * Time: 21:25
 */
return [
	/* 上传文件配置 */
	'UPLOAD'    =>  [
		// 设置附件上传大小
		'maxSize'   => 0,
		// 设置附件上传类型
		'exts' => array('jpg', 'gif', 'png', 'jpeg'),
		//上传的根目录
		'rootPath' => 'Public',
		//保存的目录
		'savePath' => '/Upload/',
		//自动创建子目录
		'autoSub'    =>    true,
		//子目录的名称格式
		'subName'    =>    array('date','Ymd')
	]
];