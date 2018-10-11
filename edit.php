<?php
  session_start();
  define('IN_TG',true);
  //引入公共文件
  //dirname(__FILE__):得到的是文件所在层目录名
  require dirname(_FILE_).'/includes/common.inc.php';
  define('SCRIPT','edit');
  @$id = $_GET['id'];
  $result = query("select name,price,material,detail,d_time from kf_dish where did=$id");
  $rows = mysql_fetch_array($result);
  if($_GET['action']=='edit'){
    $name = $_POST['dishname'];
    $price = $_POST['price'];
    $material = $_POST['material'];
    $detail = $_POST['detail'];
    $d_time = $_POST['d_time'];
    //echo "<script>alert('$detail')</script>";
    query("UPDATE kf_dish SET name='{$name}',price='{$price}',material='{$material}',detail='{$detail}',d_time='{$d_time}' WHERE did='{$_GET['id']}'");
    if(mysql_affected_rows()==1){
      location('修改成功!','adminindex.php#/caipin');
    }else{
      location('修改失败!','edit.php');
    }
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖-我的菜品管理之编辑菜品</title>
		<?php
			require ROOT_PATH.'includes/title.inc.php';
		?>
	</head>
	<body>
	  <?php
      include './includes/header.inc.php';
    ?>
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">编辑菜品</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" method="post" action="edit.php?id=<?php echo $id;?>&action=edit">
          <div class="form-group">
            <label for="caipinname" class="col-sm-2 control-label">菜品名</label>
            <div class="col-sm-10">
              <input type="text" value=<?php echo "{$rows['name']}";?> class="form-control" id="caipinname" placeholder="请输入菜品名称" name="dishname">
            </div>
          </div>
          <div class="form-group">
            <label for="price" class="col-sm-2 control-label">价钱</label>
            <div class="col-sm-10">
              <input type="text" value=<?php echo "{$rows['price']}";?> class="form-control" id="price" placeholder="请输入价钱" name="price">
            </div>
          </div>
          <div class="form-group">
            <label for="material" class="col-sm-2 control-label">原料</label>
            <div class="col-sm-10">
              <input type="text" value=<?php echo "{$rows['material']}";?> class="form-control" id="material" placeholder="请输入菜品原料" name="material">
            </div>
          </div>
          <div class="form-group">
            <label for="d_time" class="col-sm-2 control-label">送达约</label>
            <div class="col-sm-10">
              <input type="text" value=<?php echo "{$rows['d_time']}";?> class="form-control" id="d_time" placeholder="请输入送达时间" name="d_time">
            </div>
          </div>
          <div class="form-group">
            <label for="detail" class="col-sm-2 control-label">详情</label>
            <div class="col-sm-10">
              <textarea rows="5" class="form-control" id="detail" placeholder="请输入菜品详情" name="detail"><?php echo "{$rows['detail']}";?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
              <button type="submit" class="btn btn-success">提交</button>
              <button onclick="location.href='adminindex.php#/caipin'" type="button" class="btn btn-warning">取消</button>
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
	</body>
</html>