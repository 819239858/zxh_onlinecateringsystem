<?php
  session_start();
  // 定义个常量,用来制授权调用INCLUDES里面的文件.
   define('IN_TG', TRUE);
   //引入公共文件.
   require dirname(__FILE__).'/includes/common.inc.php';

   //清除COOKIE
  unsetcookies();
?>