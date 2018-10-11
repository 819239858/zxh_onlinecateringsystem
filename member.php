<?php
  define('IN_TG',TRUE);
  define('SCRIPT','member');

  require dirname(__FILE__).'/includes/common.inc.php';

  if(isset($_COOKIE['username'])){
    $user = $_COOKIE['username'];
    $result = query("SELECT username,sex,phone,face,address FROM user_message WHERE username='$user' LIMIT 1");
    if($rows = mysql_fetch_array($result)){
        $user_message = array();
        $user_message['username'] = $rows['username'];
        $user_message['sex'] = $rows['sex'];
        $user_message['phone'] = $rows['phone'];
        $user_message['face'] = $rows['face'];
        $user_message['address'] = $rows['address'];
    }else {
      if(!mysql_close()){
        exit("数据库关闭异常!");
      }
    }
  }else{
    location('非正常登陆!','login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>食在指尖-个人中心</title>
<?php
 require ROOT_PATH .'/includes/title.inc.php';
?>
</head>
<body>
<?php
 require ROOT_PATH .'/includes/header.inc.php';
?>
<div id="member">
	<div class='container'>
		<h2 class='text-center text-warning'>个人中心</h2>
    <div class="media">
      <a class="pull-left" href="#">
         <img class="media-object" src="<?php echo $user_message['face'];?>" alt="媒体对象">
      </a>
      <div class="media-body">
         <h4 class="media-heading">基本信息</h4>
         <ul>
          <li>用 户 名：<span><?php echo $user_message['username'];?></span></li>
          <li>性    别：<span><?php echo $user_message['sex'];?></span></li>
          <li>电话号码：<span><?php echo $user_message['phone'];?></span></li>
          <li>默认收货地址：<span><?php echo $user_message['address'];?></span></li>
          <li><input type='button' value='编辑' class='btn btn-success' onclick="location.href='member_modify.php'"></li>
         </ul>
      </div>
   </div>
	</div>
</div>

<?php
 require ROOT_PATH .'/includes/footer.inc.php';
?>

</body>
</html>