<?php
  //防止非法调用
  if(!defined('IN_TG')){
    exit('Access Defined.');
  }
  function connect(){
  		//数据连接
  		global $conn; //表示全局变量,将此变量在函数外部也能调用
  		if(!$conn = @mysql_connect(DB_HOST,DB_USER,DB_PWD)){
  			exit('数据库连接失败!');
  		}
  	}

  	function select_db(){
  		if(!mysql_select_db(DB_NAME)){
  			exit('找不到指定的数据库!');
  		}
  	}

  	function set_names(){
  		if(!mysql_query('SET NAMES UTF8')){
  			exit('字符集错误!');
  		}
  	}
  /*执行一条SQL语句查询*/
  function query($sql){
    if(!$result=mysql_query($sql)){
      exit('SQL执行失败!');
    }
    return $result;
  }
  /*判断是否重复注册用户*/
  function is_repeat($sql,$info){
  //mysql_fetch_array() 函数从结果集中取得一行作为关联数组，或数字数组，或二者兼有
    if(mysql_fetch_array(query($sql))){
      echo "<script type='text/javascript'>alert('$info');history.back();</script>";
    }
  }
?>