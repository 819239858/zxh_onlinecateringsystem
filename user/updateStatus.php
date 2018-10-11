<?php
   @$cid = $_GET['cid'];
   @$estimate_state = $_GET['estimate_state'];
    if(!isset($cid)||!isset($estimate_state)){
      echo "<script>alert('更新失败1');history.back();</script>";
    }else {
      require dirname(_FILE_).'/../includes/sql.conn.php';
      $sql = "update cart_item set estimate_state='{$estimate_state}' WHERE cid = $cid";
      mysql_query($sql);
      if(mysql_affected_rows()==1){
        echo "<script>alert('更新成功!');location.href='../order.php';</script>";
      }else{
        echo "<script>alert('更新失败2');history.back();</script>";
      }
    }
?>