<?php
session_start();
// 定义个常量,用来制授权调用INCLUDES里面的文件.
define('IN_TG',true);
//定义个常量,用来指定本页的内容
define('SCRIPT','register');
//引入公共文件
require dirname(__FILE__) . '/includes/common.inc.php';
//登录状态判断
login_state();
if($_GET['action']=='register') {
  //判断验证码是否与输入的一致
  check_code($_POST['code'], $_SESSION['code']);
  //创建一个空数组。用来存放用户提交过来的合法数据。
  $user_message = array();
  $user_message['username'] =  $_POST['uname'];
  $user_message['userpwd'] =  $_POST['pwd'];
  $user_message['sex'] =  $_POST['sex'];
  $user_message['phone'] =  $_POST['telphone'];
  $user_message['face'] =  $_POST['face'];

  //判断用户名是否已被注册
  is_repeat("SELECT username FROM user_message WHERE username='{$user_message['username']}'LIMIT 1",'此用户已被注册!');
  query("INSERT INTO user_message(username,userpwd,sex,phone,face,register_time,last_time,last_ip) VALUES('{$user_message['username']}','{$user_message['userpwd' ]}','{$user_message['sex']}','{$user_message['phone' ]}','{$user_message['face' ]}',NOW(),NOW(),'{$_SERVER['REMOTE_ADDR']}')");
  if(mysql_affected_rows()==1){
    if(!mysql_close()){
      exit("数据库关闭异常!");
    }
    session_destroy();
    location("恭喜您注册成功!","login.php");
  }else {
    if(!mysql_close()){
          exit("数据库关闭异常!");
        }
    session_destroy();
    location("很遗憾!注册失败!","register.php");
  }
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖--注册</title>
		<?php
			require ROOT_PATH.'includes/title.inc.php';
		?>
		<script type="text/javascript" src="js/code.js" ></script>
		<script type="text/javascript" src="js/register.js"></script>
	</head>
	<body>
		<?php
			require ROOT_PATH.'includes/header.inc.php';
		?>
		<div id="register">
		    <div class='main'>
                <h3>用户注册</h3>
                <form name='register' method='post' action='register.php?action=register'>
                    <div class='form-group'>
                       <input name='uname' class='form-control' type='text' placeholder='请输入用户名' />
                    </div>
                    <div class='form-group'>
                       <input name='pwd' class='form-control' type='password' placeholder='请输入密码' />
                    </div>
                    <div class='form-group'>
                       <input name='pwdagain' class='form-control' type='password' placeholder='请确认密码' />
                    </div>
                    <div class="form-group">
                      <label class="radio-inline">
                        <input type="radio" name="sex" value="男" checked> 先生
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="sex" value="女"> 女士
                      </label>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="telphone" placeholder="请输入电话号码">
                    </div>
                    <div class="form-group">
                      <label for="face">头像选择:</label>
                      <input type="hidden" class="form-control" name="face" id="face" value="img/m01.gif">
                      <img src="img/m01.gif" alt="头像选择" id="faceimg"/>
                    </div>
                    <div class='form-group'>
                        <input name='code' class='code' type='text' placeholder='请输入验证码' /><img src="code.php" id="code"/>
                    </div>
                    <input class='btn btn-block btn-success' type='submit' value='注册' />
                </form>
            </div>
		</div>
		<?php
			require ROOT_PATH.'includes/footer.inc.php';
		?>
	</body>
</html>