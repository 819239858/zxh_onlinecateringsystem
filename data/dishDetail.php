<?php
  require dirname(_FILE_).'/../includes/sql.common.php';
  //接收客户端提交的数据
  @$oid = $_REQUEST['oid'];
  if(!isset($oid)){
      echo '[]';
      return;
  }
  //双引号能识别变量
  $sql = "select did from kf_order,cart_item where cart_item.oid=kf_order.oid and kf_order.oid='{$oid}'";
  $result = mysqli_query($conn,$sql);

  $output = [];//用于保存所有记录的数组
  $temps = [];
  while(($row=mysqli_fetch_array($result))!==null){
      $temps[] = $row;
  }
  foreach($temps as $value){
   $sql = "select name,img_sm,price,count from kf_dish,cart_item where cart_item.did=kf_dish.did and cart_item.did='{$value[did]}'and cart_item.oid='{$oid}'";
   $res = mysqli_fetch_array(mysqli_query($conn,$sql));
   $output[] = $res;
 }
  //向客户端输出响应消息主体
  $jsonString = json_encode($output);
  echo $jsonString;
?>