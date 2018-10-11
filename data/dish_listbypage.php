<?php
/*分页显示数据库中的菜品，每页最多显示5条，以JSON格式*/
require dirname(_FILE_).'/../includes/sql.common.php';
//接收客户端提交的数据
@$start = $_REQUEST['start'];
if(!isset($start)){
    $start = 0;
}
$count = 5;//一次可以向客户端返回最大的记录数
//双引号能识别变量
$sql = "select did,name,type,price,material,img_sm,img_lg,detail,d_time from kf_dish limit $start,$count";
$result = mysqli_query($conn,$sql);

$output = [];//用于保存所有记录的数组
while(($row=mysqli_fetch_assoc($result))!==null){
    $output[] = $row;
}
//向客户端输出响应消息主体
$jsonString = json_encode($output);
echo $jsonString;
?>