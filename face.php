<?php 
// 定义个常量,用来制授权调用INCLUDES里面的文件.
 define('IN_TG', TRUE);
   //定义个常量,用来指定本页的内容
 define('SCRIPT','face');
 //引入公共文件.
 require dirname(__FILE__).'/includes/common.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>食在指尖-头像选择</title>
<?php 
 require ROOT_PATH .'/includes/title.inc.php';
?>
<script type="text/javascript" src="js/opener.js"></script>
</head>
<body>
<div id="face">
   <h3>头像选择</h3>
   <dl>
   <?php  foreach (range(1,9)as $num) {?>
      <dd><img src="img/m0<?php echo $num?>.gif" alt="img/m0<?php echo $num?>.gif"  title="头像 <?php echo $num?>" ></img></dd>
   <?php } ?>
   </dl>
</div>
</body>
</html>