<?php
  //防止非HTML页面调用
  if(!defined('SCRIPT')){
      exit("脚本错误!");
  }
  //防止非法调用
  if(!defined('IN_TG')){
  	exit('Access Defined.');
  }
?>
<link rel='stylesheet' href='css/basic.css' />
<link rel='stylesheet' href='css/bootstrap.css' />
<link rel='stylesheet' href='css/global.css' />
<link rel='stylesheet' href='css/<?php echo SCRIPT?>.css' />

