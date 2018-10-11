<?php
    session_start();
    define('IN_TG',true);
    //引入公共文件
    require dirname(_FILE_).'/includes/common.inc.php';
    define('SCRIPT','detail');

    if(isset($_COOKIE['username'])){
      $result = mysql_fetch_array(query("select uid from user_message where username ='{$_COOKIE['username']}'"));
      $uid = $result['uid'];
      //echo "<script>alert('$uid');</script>";
    }
    $did = $_GET['id'];
    $_SESSION['did']=$did;
    //到数据库去验证
    $rows=mysql_fetch_array(query("SELECT name,price,img_lg,detail,material,sum(count) as dishcount FROM kf_dish,cart_item WHERE kf_dish.did=cart_item.did AND kf_dish.did='$did' AND cart_item.oid is not null LIMIT 1"));
    $estimate = mysql_fetch_array(query("select count(eid) as e_count from estimate,kf_dish where estimate.did=kf_dish.did and kf_dish.did='$did'"));
    if($estimate){
      $e_count = $estimate['e_count'];
    }
    $arr = array();
    $rel = query("select estimate from estimate,kf_dish where estimate.did=kf_dish.did and kf_dish.did=$did");
    if($rel) {
      $temp=array();
      while($res=mysql_fetch_assoc($rel)) {
          $temp[]=$res;//定义一个空数组用于存储接收到的数据
      }
    }
    if($rows){
      $dish = array();
      $dish['name'] = $rows['name'];
      $dish['img_lg'] = $rows['img_lg'];
      $dish['detail'] = $rows['detail'];
      $dish['price'] = $rows['price'];
      $_SESSION['price'] = $dish['price'];
      $dish['material'] = $rows['material'];
      $dish['count'] = $rows['dishcount'];
      $dish = html($dish);
    }else{
      if(!mysql_close()){
         exit("数据库关闭异常!");
      }
    }
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖-网上订餐系统</title>
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
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="#">首页</a></li>
        <li><a href="#" class='active'>详情</a></li>
      </ol>
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="page-header">
            <h2><?php echo $dish['name'];?></h2>
            <div class="text-center">
              <img class="img-responsive center-block" src="img/<?php echo $dish['img_lg'];?>" alt="">
            </div>
            <div class="text-justify">
              <p></p>
              <p><strong>食材原料：</strong><?php echo $dish['material'];?></p>
              <p><strong>食材故事：</strong><?php echo $dish['detail'];?></p>
              <p>价格：￥<span><?php echo $dish['price'];?></span></p>
              <p>销量：<?php echo $dish['count'];?> &nbsp;累计评价：<?php echo $e_count;?></p>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">评价详情</button>
              <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">
                         用户评价
                      </h4>
                    </div>
                    <div class="modal-body">
                       <ul>
                          <?php
                            foreach($temp as $value){
                          ?>
                          <li style="height:40px;line-height:40px;background:#c2f2ae;padding-left:20px;margin-bottom:10px;font-weight:bold;">
                            <?php echo $value['estimate'];?>
                          </li>
                          <?php
                            }
                          ?>
                       </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <div class="text-right">
            <button onclick='location.href="user/buy.php?did=<?php echo $did;?>&uid=<?php echo $uid;?>"' class="btn btn-success" type="button">我要订餐</button>
            <button onclick='location.href="user/addCar.php?did=<?php echo $did;?>&uid=<?php echo $uid;?>"' class="btn btn-warning" type="button">加入购物车</button>
            <button onclick='location.href="index.php"' class="btn btn-primary" type="button">我再看看</button>
          </div>
        </div>
      </div>
    </div>
    <?php
      include 'includes/footer.inc.php';
    ?>
  </body>
</html>