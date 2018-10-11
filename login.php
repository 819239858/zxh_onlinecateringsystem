<?php
session_start();

define('IN_TG',true);
define('SCRIPT','login');
require dirname(__FILE__).'/includes/common.inc.php';
login_state();
if($_GET['action']=='login'){
  check_code($_POST['code'],$_SESSION['code']);
  //创建一个空数组，用来存放提交后的合法数据
  $user_message = array();
  $user_message['username'] = $_POST['username'];
  $user_message['userpwd'] = $_POST['pwd'];
  //到数据库去验证
  if(!!$rows=mysql_fetch_array(query("SELECT username,userpwd FROM user_message WHERE username='{$user_message['username']}' AND userpwd='{$user_message['userpwd']}' LIMIT 1"))){
    query("UPDATE user_message SET last_time=NOW(),last_ip='{$_SERVER['REMOTE_ADDR']}' WHERE username='{$rows['username']}'");
     if(!mysql_close()){
       exit("数据库关闭异常!");
     }
    session_destroy();
    setcookies($rows['username'],$rows['userpwd']);
    location(null,'index.php');
  }else {
    if(!mysql_close()){
      exit("数据库关闭异常!");
    }
   session_destroy();
   location('用户名密码不正确或账号未注册','login.php');
  }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖--登录</title>
		<?php
			require ROOT_PATH.'includes/title.inc.php';
		?>
		<script type="text/javascript" src="js/login.js"></script>
		<script type="text/javascript" src="js/code.js" ></script>
	</head>
	<body>
		<?php
			require ROOT_PATH.'includes/header.inc.php';
		?>
		<div id="login">
		    <div class='main'>
                <h4>用户登录</h4>
                <form name='login' method='post' action='login.php?action=login'>
                    <div class='form-group'>
                        <input name='username' class='form-control' type='text' placeholder='请输入用户名' />
                    </div>
                    <div class='form-group'>
                        <input name='pwd' class='form-control' type='password' placeholder='请输入密码' />
                    </div>
                    <div class='form-group'>
                        <input name='code' class='code' type='text' placeholder='请输入验证码' /><img src="code.php" id="code"/>
                    </div>
                    <input class='btn btn-warning pull-right register' type='button' value='注册' onclick="window.location.href='register.php'"/>
                    <input class='btn btn-success pull-right' type='submit' value='登录' />
                </form>
            </div>
		</div>
		<?php
			require ROOT_PATH.'includes/footer.inc.php';
		?>
	</body>
</html>