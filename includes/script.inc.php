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
<script src='js/jquery-1.11.3.js'></script>
<script src='js/jquery-3.3.1.js'></script>
<script src='js/angular.js'></script>
<script src='js/angular-animate.js'></script>
<script src='js/angular-route.js'></script>
<script src='js/bootstrap.js'></script>
<script src='js/<?php echo SCRIPT?>.js'></script>