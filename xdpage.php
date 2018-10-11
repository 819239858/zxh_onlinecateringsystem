<?php
  session_start();
  define('IN_TG',true);
  //引入公共文件
  require dirname(_FILE_).'/includes/common.inc.php';
  define('SCRIPT','xdpage');
  if(isset($_COOKIE['username'])){
    $result = mysql_fetch_array(query("select uid,username,phone,address from user_message where username = '{$_COOKIE['username']}' LIMIT 1"));
    $row = $result['uid'];
    $username = $result['username'];
    $phone = $result['phone'];
    $address = $result['address'];
    /*显示下单菜品*/
    $a = $_SERVER['QUERY_STRING'];//oiid=1&oiid=2&oiid=3
    //此函数用来将字符串切割为数组oiid=1,oiid=2,oiid=3
    $oiids=array_splice(explode('oiid=',implode('',explode('&',$_SERVER['QUERY_STRING']))),1);
    $temp=array();
    foreach($oiids as $value){
      $result = mysql_fetch_array(query("select name,price,count from cart_item,kf_dish where cart_item.cid=$value AND cart_item.did=kf_dish.did"));
      $temp[] = $result;
    }
    /*确认下单*/
    if($_GET['action']=='xdpage'){
      $user_message = array();
      $user_message['user_name'] = $_POST['person'];
      $user_message['sex'] = $_POST['sex'];
      $user_message['phone'] = $_POST['telphone'];
      $user_message['addr'] = $_POST['address'];
      $user_message['uid'] = $row;
      $user_message['allPrice'] = $_POST['price'];
      $user_message['allCount'] = $_POST['number'];
      query("INSERT INTO kf_order(uid,user_name,sex,order_time,addr,phone,allPrice,allCount)VALUES('{$user_message['uid']}','{$user_message['user_name']}','{$user_message['sex']}',NOW(),'{$user_message['addr' ]}','{$user_message['phone' ]}','{$user_message['allPrice']}','{$user_message['allCount']}')");
      $id = mysql_insert_id();
      $oid = $id;
      $oiids=array_splice(explode('oiid=',implode('',array_splice(explode('&',$_SERVER['QUERY_STRING']),1))),1);
      foreach($oiids as $val){
        query("UPDATE cart_item SET oid = $oid WHERE cid=$val");
      }
      if(mysql_affected_rows()){
        if(!mysql_close()){
          exit("数据库关闭异常!");
        }
        location("恭喜您下单成功!进入支付界面！","zfpage.php?oid=$oid");
      }else {
        if(!mysql_close()){
              exit("数据库关闭异常!");
            }
        session_destroy();
        location("很遗憾!下单失败!","xdpage.php");
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
		<title>食在指尖-下单页面</title>
		<?php
			require ROOT_PATH.'includes/title.inc.php';
		?>
	</head>
	<body>
    <div class='container'>
      <a href="index.php"><img class='img-responsive' src='img/logo.png'></a>
      <h3 class='text-center'>请输入您的信息</h3>
      <form role="form" method='post' action=xdpage.php?action=xdpage&<?php echo $a?>>
        <div class="form-group">
          <label for="person">联系人:</label>
          <input type="text" class="form-control" value="<?php echo $username;?>" name="person" placeholder="请输入联系人姓名">
        </div>
        <label>性别:</label>
        <div class="form-group">
          <label class="radio-inline">
            <input type="radio" name="sex" value="男" > 先生
          </label>
          <label class="radio-inline">
            <input type="radio" name="sex" value="女" checked> 女士
          </label>
        </div>
        <div class="form-group">
            <label for="telphone">联系电话:</label>
            <input type="text" class="form-control" name="telphone" value="<?php echo $phone;?>" placeholder="请输入联系人电话">
        </div>
        <div class="form-group">
            <label for="telphone">送餐地址:</label>
            <textarea class="form-control" name="address" rows='2'><?php echo $address;?></textarea>
        </div>
        <table class="table table-hover">
          <h3 class="text-danger text-center">确认下单信息</h3>
          <thead>
            <tr>
              <th>菜品</th>
              <th>单价(元)</th>
              <th>数量</th>
              <th>小计(元)</th>
            </tr>
          </thead>
          <tbody>
           <?php
              foreach($temp as $value){
            ?>
              <tr class="temp">
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['price'];?></td>
                <td class="number"><?php echo $value['count'];?></td>
                <td class="price"><?php echo $value['count']*$value['price'];?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <h3 class="pull-right form-group">实付款：
          <input type="hidden" id="number" name="number" value=""/>
          <input type="text" id="allMoney" name="price" value=""/>元
          <hr>
        </h3>
        <button type="submit" class="btn btn-block btn-success">确认下单</button>
      </form>
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