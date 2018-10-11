<?php
  session_start();
  define('IN_TG',true);
  //引入公共文件
  require dirname(_FILE_).'/includes/common.inc.php';
  define('SCRIPT','zfsuccess');
  $oid = $_GET['oid'];
  $dish = [];
  $rows = mysql_fetch_array(query("SELECT oid,allPrice FROM kf_order WHERE kf_order.oid = $oid"));
  $dish['price'] = $rows['allPrice'];
  $dish['oid'] = $rows['oid'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖-支付成功页面</title>
		<?php
			require ROOT_PATH.'includes/title.inc.php';
		?>
	</head>
	<body>
    <div class='container'>
      <a href="index.php"><img class='img-responsive' src='img/logo.png'></a>
      <div class='zfsuccess'>
        <p class='text-success bg-success'><span class='glyphicon glyphicon-ok-circle'></span>  您已成功付款,订餐成功!</p>
        <ul>
          <li>订单编号：<span class='text-danger'><?php echo $dish['oid'];?></span></li>
          <li>实付款：<span class='text-danger'><?php echo $dish['price'];?></span> 元</li>
          <li>预计06月30日送达</li>
          <li>您可以查看 <a href="order.php"> 交易详情</a></li>
        </ul>
      </div>
    </div>
		<?php
			include './includes/header.inc.php';
		?>
		<?php
			include 'includes/footer.inc.php';
		?>
		<?php
      require ROOT_PATH.'includes/script.inc.php';
    ?>
	</body>
</html>