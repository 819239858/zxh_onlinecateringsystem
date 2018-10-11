<?php
  //intval:获取变量的整数值
  @$uid = $_REQUEST['uid'];
  if(!isset($uid)){
    echo "<script>alert('删除失败1');history.back();</script>";
  }else {
   require dirname(_FILE_).'/../includes/sql.conn.php';
   $sql = "DELETE FROM cart_item WHERE uid = $uid";
   mysql_query($sql);
   if(mysql_affected_rows()){
     echo "<script>alert('删除成功!');location.href='../gwcar.php';</script>";
   }else{
     echo "<script>alert('删除失败2');history.back();</script>";
   }
  }
?>