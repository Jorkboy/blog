<?php
return array(
	//'配置项'=>'配置值'
    'URL_ROUTE_RULES'       =>  array(  // 自定义路由规则 针对模块

    ),
    'BACK_URL'  =>  array(
        'login' => 'Back.php/Login/login',
        'index' => 'Back.php/Index/index',
        'category'  =>  array(
            'list'  =>  'Back.php/Category/list',
            'set'  =>  'Back.php/Category/set'
        ),
        'article'  =>  array(
            'list'  =>  'Back.php/Article/list',
            'set'  =>  'Back.php/Article/set'
        ),
    ),
    'BACK_PAGE' =>  array(
        'pageSize'  =>  10
    ),
);