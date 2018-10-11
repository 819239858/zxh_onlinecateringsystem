<?php
  /*菜品的搜索*/
  require dirname(_FILE_).'/../includes/sql.common.php';
  //接收客户端提交的数据
  @$gid = $_REQUEST['gid'];
  if(!isset($gid)){
      echo '[]';
      return;
  }
  //双引号能识别变量
  $sql = "select * from kf_dish,category where category.gid=kf_dish.gid and category.gid='{$gid}'";
  $result = mysqli_query($conn,$sql);

  $output = [];//用于保存所有记录的数组
  while(($row=mysqli_fetch_assoc($result))!==null){
      $output[] = $row;
  }
  //向客户端输出响应消息主体
  $jsonString = json_encode($output);
  echo $jsonString;
?>