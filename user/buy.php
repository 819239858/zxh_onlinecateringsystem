<?php
  //intval:获取变量的整数值
  @$did = $_REQUEST['did'];
  @$uid = $_REQUEST['uid'];
  if(!isset($uid)||!isset($did)){
    echo "<script>alert('购买失败1');history.back();</script>";
  }else {
    require dirname(_FILE_).'/../includes/sql.conn.php';
    //双引号能识别变量
    if(mysql_fetch_array(mysql_query("select did from cart_item where did=$did and uid = $uid and oid is NULL;"))){
        $sql = "update cart_item set count=count+1,add_time=NOW() where did=$did and uid = $uid and oid is NULL;";
        mysql_query($sql);
        if(mysql_affected_rows()==1){
          $id = mysql_fetch_array(mysql_query("select cid from cart_item where did = '{$did}' and uid = $uid and oid is NULL LIMIT 1"));
          echo "<script>alert('进入下单页面');location.href='../xdpage.php?oiid=$id[0]'</script>";
        }else{
          echo "<script>alert('购买失败!');history.back();</script>";
        }
      }else{
        $sql = "insert into cart_item(uid,did,count,add_time)values($uid,$did,1,NOW());";
        mysql_query($sql);
        if(mysql_affected_rows()==1){
          $id = mysql_fetch_array(mysql_query("select cid from cart_item where did = '{$did}' and uid = $uid and oid is NULL LIMIT 1"));
          echo "<script>alert('进入下单页面');location.href='../xdpage.php?oiid=$id[0]'</script>";
        }else{
          echo "<script>alert('购买失败!');history.back();</script>";
        }
      }
    }
?>