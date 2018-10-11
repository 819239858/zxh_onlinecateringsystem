<?php
  session_start();
  define('IN_TG',true);
  //引入公共文件
  //dirname(__FILE__):得到的是文件所在层目录名
  require dirname(_FILE_).'/includes/common.inc.php';
  define('SCRIPT','addDish');

  if($_GET['action']==addDish){
    $name = $_POST['dishname'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $material = $_POST['material'];
    $detail = $_POST['detail'];
    $d_time = $_POST['d_time'];
    $img_sm = $_POST['img_sm'];
    $img_lg = $_POST['img_lg'];
    $row = mysql_fetch_array(query("select gid from category where type='$type'"));
    //echo "<script>alert('{$row['gid']}');</script>";
    query("insert into kf_dish values(null,'{$type}','{$name}','{$price}','{$img_sm}','{$img_lg}','{$detail}','{$material}','{$d_time}','{$row['gid']}');");
    if(mysql_affected_rows()==1){
      location('添加成功!','adminindex.php#/caipin');
    }else{
      location('添加失败!','addDish.php');
    }
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖-我的菜品管理之增加菜品</title>
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
        <h3 class="panel-title">增加菜品</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" method="post" action="addDish.php?action=addDish">
          <div class="form-group">
            <label for="caipinname" class="col-sm-2 control-label">菜名</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="caipinname" placeholder="请输入菜品名称" name = "dishname">
            </div>
          </div>
          <div class="form-group">
            <label for="class" class="col-sm-2 control-label">分类</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="class" placeholder="请输入菜品类别" name = "type">
            </div>
          </div>
          <div class="form-group">
            <label for="price" class="col-sm-2 control-label">价钱</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="price" placeholder="请输入价钱" name = "price">
            </div>
          </div>
          <div class="form-group">
            <label for="img_sm" class="col-sm-2 control-label">小图片</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="img_sm" placeholder="请输入小图片地址" name = "img_sm">
            </div>
          </div>
          <div class="form-group">
            <label for="img_lg" class="col-sm-2 control-label">大图片</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="img_lg" placeholder="请输入大图片地址" name = "img_lg">
            </div>
          </div>
          <div class="form-group">
            <label for="d_time" class="col-sm-2 control-label">送达约</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="d_time" placeholder="请输入送达时间" name = "d_time">
            </div>
          </div>
          <div class="form-group">
            <label for="material" class="col-sm-2 control-label">材料</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="material" placeholder="请输入菜品材料" name = "material">
            </div>
          </div>
          <div class="form-group">
            <label for="detail" class="col-sm-2 control-label">详情</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="detail" placeholder="请输入菜品详情" name = "detail"></textarea>
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