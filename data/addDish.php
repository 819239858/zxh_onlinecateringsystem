<?php
  /*以JSON的格式输出结果*/
  header('Content-Type: application/json');

  //接收客户端提交的数据
  @$dish_name = $_REQUEST['dishname'];
  @$dish_price = $_REQUEST['price'];
  @$dish_simg = $_REQUEST['img_sm'];
  @$dish_limg = $_REQUEST['img_lg'];
  @$dish_detail = $_REQUEST['detail'];
  @$dish_material = $_REQUEST['material'];

  //客户端输入的服务器端的校验，真正可靠的验证
  if(!isset($dish_name)||!isset($dish_price)||!isset($dish_simg)||!isset($dish_limg)||!isset($dish_detail)||!isset($dish_material)){
    echo '[]';
    return;
  }

  //执行数据库操作
  $conn = mysqli_connect('localhost','root','','kaifanla');
  $sql = "SET NAMES UTF8";
  mysqli_query($conn,$sql);
  $sql = "insert into kf_dish values(NULL,$dish_name,$dish_price,$dish_simg,$dish_limg,$dish_detail,$dish_material)";
  $result = mysqli_query($conn,$sql);

  if(mysql_affected_rows()==1){
    $output = [];
    $arr = [];
    if($result){
      $arr['msg'] = 'succ';
    }else {
      $arr['msg'] = 'err';
    }
    $output[] = $arr;
    echo json_encode($output);
    mysql_close();
  }else {
    if(!mysql_close()){
      exit("数据库关闭异常!");
    }
  }
?>