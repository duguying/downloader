<?php
return array(
		'LANG_SWITCH_ON' => true,
        'DEFAULT_LANG' => 'zh-cn', // 默认语言
        'LANG_AUTO_DETECT' => true, // 自动侦测语言
        'LANG_LIST'=>'en-us,zh-cn',//必须写可允许的语言列表
		
		'URL_MODEL'     => '1', //URL模式
		'URL_CASE_INSENSITIVE' =>true,//兼容URL小写，开启
		'WWW_PATH'		=>preg_replace('/[\w|.]*$/i', '', $_SERVER['SCRIPT_NAME']),//网站根目录，必须开启
		'LOAD_EXT_FILE'=>'myfunction',//载入自定义函数库，必须开启
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => 'localhost', // 服务器地址
		'DB_NAME'   => 'download', // 数据库名
		'DB_USER'   => 'root', // 用户名
		'DB_PWD'    => 'lijun', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => 'dl_', // 数据库表前缀，请勿改动
		'STORE_PATH'=>'./download/',//存储路径
//		'FFDEBUG'			=>true,
);
?>