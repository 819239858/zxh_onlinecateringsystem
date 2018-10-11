<?php
  session_start();
  define('IN_TG',true);
  //引入公共文件
  require dirname(_FILE_).'/includes/common.inc.php';
  define('SCRIPT','estimate');

  if(isset($_COOKIE['username'])){
    $oid = $_GET['oid'];
    $did = $_GET['did'];
    //echo "<script>alert('$did');</script>";
    if($_GET['action']=='estimate'){
      $oid = $_GET['oid'];
      $did = $_GET['did'];
      $uid = $_SESSION['uuid'];
      $estimate = $_REQUEST['estimate'];
      query("INSERT INTO estimate VALUES(null,'$uid','$oid','$did','$estimate',NOW());");
      if(mysql_affected_rows()==1){
        query("UPDATE cart_item,estimate SET cart_item.estimate_state='finish' WHERE cart_item.did=$did and cart_item.oid=estimate.oid AND estimate.oid=$oid");
        if(!mysql_close()){
          exit("数据库关闭异常!");
        }
        session_destroy();
        location("恭喜您评价成功!","order.php");
      }else {
        if(!mysql_close()){
          exit("数据库关闭异常!");
        }
        session_destroy();
        location("很遗憾!评价失败!","estimate.php");
      }
    }
  }else {
    location('非正常登陆!','login.php');
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖-我的评价</title>
		<?php
			require ROOT_PATH.'includes/title.inc.php';
		?>
		<link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	  <?php
      include './includes/header.inc.php';
    ?>
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">评价</h3>
      </div>
      <div class="panel-body">
        <form method='post' action="estimate.php?action=estimate&oid=<?php echo $oid;?>&did=<?php echo $did;?>" class="form-horizontal">
          <div class="form-group">
            <label for="estimate" class="control-label">请输入您的评价</label>
            <textarea id="estimate" class="form-control col-sm-10" rows="10" name="estimate"></textarea>
          </div>
          <div class="form-group">
           专业性&nbsp;&nbsp;&nbsp;<input id="input-21e" value="0" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" >
              <br>
           服务态度<input id="input-21e" value="0" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" >
              <br>
            价格方面 <input id="input-21e" value="0" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" >
              <br><br>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" class="btn btn-success">提交</button>
              <button type="button" class="btn btn-warning" onclick="location.href='order.php'">返回</button>
            </div>
          </div>
        </form>
      </div>
    </div>
		<?php
			include 'includes/footer.inc.php';
		?>
		<?php
      require ROOT_PATH.'includes/script.inc.php';
    ?>
    <script src="js/star-rating.js" type="text/javascript"></script>
	</body>
</html>