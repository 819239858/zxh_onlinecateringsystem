<?php
   @$cid = $_REQUEST['cid'];
   @$ecount = $_REQUEST['ecount'];
    if(!isset($cid)){
      echo "<script>alert('更新失败1');history.back();</script>";
    }else {
      require dirname(_FILE_).'/../includes/sql.conn.php';
      $sql = "update cart_item set count=$ecount WHERE cid = $cid";
      mysql_query($sql);
      if(mysql_affected_rows()==1){
        echo "<script>alert('更新成功!');location.href='../gwcar.php';</script>";
      }else{
        echo "<script>alert('更新失败2');history.back();</script>";
      }
    }
?>