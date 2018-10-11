<?php
  //intval:获取变量的整数值
  @$did = $_REQUEST['did'];
  @$uid = $_REQUEST['uid'];
  if(!isset($uid)||!isset($did)){
    echo "<script>alert('添加购物车失败1');history.back();</script>";
  }else {
    require dirname(_FILE_).'/../includes/sql.conn.php';
    //双引号能识别变量
    //查询数据库中是否已经有了该用户购买这道菜品的记录，如果存在，即在数量上加1即可。
    if(mysql_fetch_array(mysql_query("select did from cart_item where did=$did and uid = $uid and oid is null;"))){
      $sql = "update cart_item set count=count+1,add_time=NOW() where did=$did and uid = $uid and oid is null;";
      mysql_query($sql);
      if(mysql_affected_rows()==1){
        echo "<script>alert('添加成功!');history.back();</script>";
      }else{
        echo "<script>alert('添加失败!请登录后再添加购物车1!');history.back();</script>";
      }
    }else{
      $sql = "insert into cart_item(uid,did,count,add_time)values($uid,$did,1,NOW());";
      mysql_query($sql);
      if(mysql_affected_rows()==1){
        echo "<script>alert('添加成功!');history.back();</script>";
      }else{
        echo "<script>alert('添加失败!请登录后再添加购物车2!');history.back();</script>";
      }
    }
  }
?>