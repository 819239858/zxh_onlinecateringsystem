<?php
/*根据电话号码查用户有多少订单，以JSON格式*/
header('Content-Type:application/json');

//接收客户端提交的数据
@$phone = $_REQUEST['phone'];
if(!isset($phone)){
    echo '[]';
    return;
}
$count = 5;//一次可以向客户端返回最大的记录数


//执行数据库操作
$conn = mysqli_connect('localhost','root','','kaifanla');
$sql = 'SET NAMES UTF8';
mysqli_query($conn,$sql);
//双引号能识别变量
$sql = "select oid,user_name,order_time img_sm from kf_order,kf_dish where kf_order.did=kf_dish.did and phone='$phone'";
$result = mysqli_query($conn,$sql);

$output = [];//用于保存所有记录的数组
while(($row=mysqli_fetch_assoc($result))!==null){
    $output[] = $row;
}
//向客户端输出响应消息主体
$jsonString = json_encode($output);
echo $jsonString;
?>