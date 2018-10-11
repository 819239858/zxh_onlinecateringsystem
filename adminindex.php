<?php
    session_start();

    define('IN_TG',true);
    //引入公共文件
    require dirname(_FILE_).'/includes/common.inc.php';
    define('SCRIPT','adminindex');
?>
<!DOCTYPE html>
<html ng-app='adminindexModule'>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖-管理员管理页面</title>
		<?php
			require ROOT_PATH.'includes/title.inc.php';
		?>
		<link rel='stylesheet' type='text/css' href='css/page.css'>
	</head>
	<body>
		<?php
			include './includes/adminheader.php';
		?>
		<div class='page' ng-view></div>
		<?php
			include 'includes/adminfooter.php';
		?>
		<?php
      require ROOT_PATH.'includes/script.inc.php';
    ?>
	</body>
</html>