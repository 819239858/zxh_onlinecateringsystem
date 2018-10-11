<?php
    if(!defined('IN_TG')){
    	exit('非法调用!');
    }
    /**
     * 设置字元集。
     */
    header('content="text/html; charset=UTF-8"');
    //转换成硬路径常量
    //dirname(__FILE__) 函数返回的是脚本所在在的路径
    //负数 - 从字符串末端返回的长度
    define('ROOT_PATH',substr(dirname(_FILE_),0,-8));

    //引入自定义 函数库
    require  ROOT_PATH.'includes/global.func.php';
    require  ROOT_PATH.'includes/sql.func.php';

     define('DB_HOST','localhost');
     define('DB_USER','root');
     define('DB_PWD','');
     define('DB_NAME','kaifanla');
     //连接数据库
    connect();
    select_db();
    set_names();
?>