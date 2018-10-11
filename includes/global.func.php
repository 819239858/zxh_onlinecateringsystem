<?php
  //防止非法调用
  if(!defined('IN_TG')){
    exit('Access Defined.');
  }
/*验证码*/
  function check_code($firstcode,$endcode){
  	if($firstcode!=$endcode) {
  		echo "<script type='text/javascript'>alert('验证码不正确!');history.back();</script>";
  		exit;
  	}
  }
  /*登录状态*/
  function login_state() {
  	if (isset($_COOKIE['username'])) {
  		echo "<script type='text/javascript'>alert('登录状态无法进行此操作!');</script>";
  	}
  }
  //跳转
  function location($info,$url){
  		if(!empty($info)){
  			echo "<script type='text/javascript'>alert('$info');location.href='$url';</script>";
  			exit();
  		}else {
  			header('Location:'.$url);
  		}
  }
  function setcookies($username,$pwd){
    setcookie('username',$username,time()+60*60*24*30);
    setcookie('userpwd',$pwd,time()+60*60*24*30);
  }

  function unsetcookies(){
  	setcookie('username','',time()-1);
  	setcookie('userpwd','',time()-1);
  	session_destroy();
  	location(null,'index.php');
  }
  function html($_string){//htmlspecialchars() 函数把一些预定义的字符转换为 HTML 实体。
  	if(is_array($_string)){
  		foreach($_string as $_key => $_value){
  			//$_string[$_key] = htmlspecialchars($_value);
  			//也可以采用递归
  			$_string[$_key] = html($_value);
  		}
  	}else {
  		$_string = htmlspecialchars($_string);
  	}
  	return $_string;
  }

?>