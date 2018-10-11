<?php
  session_start();
  define('IN_TG',true);
  //引入公共文件
  require dirname(_FILE_).'/includes/common.inc.php';
  define('SCRIPT','zfpage');
  $oid = $_GET['oid'];
  $prices = mysql_fetch_array(query("SELECT allPrice FROM kf_order WHERE oid = $oid"));
  $price = $prices['allPrice'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖-支付页面</title>
		<?php
			require ROOT_PATH.'includes/title.inc.php';
		?>
	</head>
	<body>
    <div class='container'>
      <a href="index.php"><img class='img-responsive' src='img/logo.png'></a>
      <div class='zf'>
        <h6>扫一扫付款(元)</h6>
        <p style="color:red;font-weight:bold;"><?php echo "$price";?></p>
        <img class='img-responsive' src='img/erweima.png'>
        <button onclick='location.href="zfsuccess.php?oid=<?php echo $oid;?>"' type='submit' class='btn btn-info'>确认支付</button>
      </div>
    </div>
		<?php
			//require 'includes/header.inc.php';
			include './includes/header.inc.php';
			//require ROOT_PATH.'inludes\header.inc.php';
		?>

		<?php
			include 'includes/footer.inc.php';
		?>
		<?php
      require ROOT_PATH.'includes/script.inc.php';
    ?>
	</body>
</html>