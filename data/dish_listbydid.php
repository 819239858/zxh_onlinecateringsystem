<?php
/*根据菜品的编号，返回该菜品的详情,以JSON格式*/
header('Content-Type:application/json');

//接收客户端提交的数据
@$did = $_REQUEST['did'];//待查询菜品的编号
if(!isset($did)){
    echo '{}';
    return;
}
$count = 5;//一次可以向客户端返回最大的记录数

//执行数据库操作
$conn = mysqli_connect('localhost','root','','kaifanla');
$sql = 'SET NAMES UTF8';
mysqli_query($conn,$sql);
//双引号能识别变量
$sql = "select did,name,price,material,img_lg,detail from kf_dish where '$did' like '%$kw%'";
$result = mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);
//向客户端输出响应消息主体
$jsonString = json_encode($row);
echo $jsonString;
?>