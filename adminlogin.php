<?php
session_start();

define('IN_TG',true);
define('SCRIPT','adminlogin');
require dirname(__FILE__).'/includes/common.inc.php';

if($_GET['action']=='adminlogin'){
//清除普通用户的账号
  unsetcookies();
  check_code($_POST['code'],$_SESSION['code']);
  //创建一个空数组，用来存放提交后的合法数据
  $admin = array();
  $admin['adminname'] = $_POST['username'];
  $admin['adminpwd'] = $_POST['pwd'];
  if(!!$rows=mysql_fetch_array(query("SELECT adminname,adminpwd FROM admin WHERE adminname='{$admin['adminname']}' AND adminpwd='{$admin['adminpwd']}' LIMIT 1"))){
    if(!mysql_close()){
           exit("数据库关闭异常!");
    }
    session_destroy();
    location(null,'adminindex.php');
  }else {
     if(!mysql_close()){
       exit("数据库关闭异常!");
     }
    session_destroy();
    location('管理员账号或密码不正确','adminlogin.php');
  }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖--管理员登录</title>
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
                <h4>管理员登录</h4>
                <form method='post' action='adminlogin.php?action=adminlogin'>
                    <div class='form-group'>
                        <input name='username' class='form-control' type='text' placeholder='请输入管理员账号' />
                    </div>
                    <div class='form-group'>
                        <input name='pwd' class='form-control' type='password' placeholder='请输入密码' />
                    </div>
                    <div class='form-group'>
                        <input name='code' class='code' type='text' placeholder='请输入验证码' /><img src="code.php" id="code"/>
                    </div>
                    <input class='btn btn-success pull-right' type='submit' value='登录' />
                </form>
            </div>
		</div>
		<?php
			require ROOT_PATH.'includes/footer.inc.php';
		?>
	</body>
</html>