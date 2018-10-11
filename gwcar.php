<?php
  define('IN_TG',true);
  //引入公共文件
  require dirname(_FILE_).'/includes/common.inc.php';
  define('SCRIPT','gwcar');
  if(isset($_COOKIE['username'])){
    $result = mysql_fetch_array(query("select uid from user_message where username='{$_COOKIE['username']}'"));
    if($result){
      $uid = $result['uid'];
    }
    $query = query("select img_sm,price,cid,count from kf_dish,cart_item where cart_item.did=kf_dish.did and cart_item.uid=$uid and cart_item.oid is null");
    if($query){
      $temp = array();
      while($rows = mysql_fetch_assoc($query)){
        $temp[] = $rows;
      }
    }
  }else{
    location('非正常登陆!','login.php');
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖-购物车</title>
		<?php
			require ROOT_PATH.'includes/title.inc.php';
		?>
		<?php
      require ROOT_PATH.'includes/script.inc.php';
    ?>
	</head>
	<body>
	  <?php
      include './includes/header.inc.php';
    ?>
    <div class='container'>
      <a href="index.php"><img class='img-responsive' src='img/logo.png'></a>
        <table class="table table-condensed gwc">
          <thead>
            <tr>
              <th>全选</th>
              <th>菜品</th>
              <th>单价(元)</th>
              <th>数量</th>
              <th>小计(元)</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($temp as $value) {?>
            <tr>
              <td><input type='checkbox' class="cbox" name="checked_goods" oiid="<?php echo $value[cid];?>"/></td>
              <td><img src='img/<?php echo $value[img_sm];?>'/></td>
              <td><?php echo $value[price];?></td>
              <td>
                <span cid="<?php echo $value[cid];?>" class="glyphicon glyphicon-plus text-primary gly zj"></span>
                <span><input type="text" value="<?php echo $value[count];?>" disabled/></span>
                <span cid="<?php echo $value[cid];?>" class="glyphicon glyphicon-minus text-primary gly zs"></span>
              </td>
              <td><?php echo $value[price]*$value[count];?></td>
              <td><a href='#' onclick="location.href='user/gwcDel.php?cid=<?php echo $value[cid]?>'">删除</a></td>
            </tr>
          <?php }?>
          </tbody>
        </table>
        <ul class='list-inline js'>
          <li><input type='checkbox' id="all" />全选</li>
          <li><a href='#' onclick="del(<?echo $uid;?>)">删除</a></li>
          <li class='pull-right'>
            菜品总数：<input type="text" id="count" value="0" disabled/>
            合计(不含运费)：<input type="text" id="total" value="0" disabled/>
            <button type="submit" id="btn" class='btn pay' disabled="disabled">结算</button>
          </li>
        </ul>
    </div>
		<?php
			include 'includes/footer.inc.php';
		?>
	</body>
</html>