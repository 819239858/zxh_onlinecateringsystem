<?php
  //intval:获取变量的整数值
  @$id = $_REQUEST['id'];
  if(!isset($id)){
    echo "<script>alert('删除失败1');history.back();</script>";
  }else {
    require dirname(_FILE_).'/../includes/sql.conn.php';
    //双引号能识别变量
    $sql = "DELETE FROM kf_dish WHERE did = $id";
    mysql_query($sql);
    if(mysql_affected_rows()==1){
      echo "<script>alert('删除成功!');history.back();</script>";
    }else{
      echo "<script>alert('删除失败2');history.back();</script>";
    }
  }
?>