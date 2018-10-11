<?php
  session_start();
  define('IN_TG',true);
  //引入公共文件
  require dirname(_FILE_).'/includes/common.inc.php';
  define('SCRIPT','order');

  if(isset($_COOKIE['username'])){
    $result = mysql_fetch_array(query("select uid from user_message where username = '{$_COOKIE['username']}' LIMIT 1"));
    $row = $result['uid'];
    $_SESSION['uuid'] = $row;
    $results = query("select oid from kf_order,user_message where kf_order.uid=user_message.uid AND user_message.uid=$row");
    $temp=array();
    if($results) {
      while($res=mysql_fetch_assoc($results)) {
          $temp[]=$res['oid'];//定义一个空数组用于存储接收到的数据
      }
    }
    $temps=array();
    foreach($temp as $value){
      $rel = query("select cid,kf_dish.did,cart_item.oid,order_time,img_sm,name,price,count,cart_item.estimate_state from kf_order,cart_item,kf_dish where cart_item.did = kf_dish.did and cart_item.oid=kf_order.oid AND kf_order.oid=$value");
      if($rel) {
        while($res=mysql_fetch_assoc($rel)) {
            $temps[]=$res;//定义一个空数组用于存储接收到的数据
        }
      }
    }
  }else {
    location('非正常登陆!','login.php');
  }
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖-我的订单</title>
		<?php
			require ROOT_PATH.'includes/title.inc.php';
		?>
	</head>
	<body>
	  <?php
      include './includes/header.inc.php';
    ?>
	  <div class="container">
	    <a href="index.php"><img class='img-responsive' src='img/logo.png'></a>
      <div class="orderTitle">
        <!--订单表头的信息-->
        <table class="orderTitleTable">
          <tbody>
            <tr>
              <td>菜品</td>
              <td width="100px">单价</td>
              <td width="100px">数量</td>
              <td width="120px">实付款</td>
              <td width="100px">交易操作</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--订单详细信息列表-->
      <div class="orderList" id="orderList">
        <!--这里一个订单就是一个表-->
        <?php
          foreach($temps as $value){
        ?>
        <table class="orderListItemTable">
            <!--第一行显示订单编号以及订单创建时间-->
            <tr class="orderListItemFirstTR">
              <td colspan="2">
                <b>交易时间：<?php echo $value['order_time']?></b>
                <span> 订单号：<?php echo $value['oid']?></span>
              </td>
              <td colspan="2"></td>
              <td colspan="1"></td>
              <td class="orderItemDeleteTD">
                <a class="deleteOrderLink"href="#">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
            </tr>
            <!--第二行表示具体的订单项内容-->
            <tr class="orderListItemDetailTR">
              <td class="orderListItemDetailTD" width="120px">
                <a href="#">
                  <img width="80px" height="80px" src="img/<?php echo $value['img_sm']?>" alt="图片加载失败">
                </a>
              </td>
              <td class="orderListItemDetailTD">
                <div class="orderListItemDetailLinkOutDiv">
                    <a href="#"><?php echo $value['name']?></a>
                    <div class="orderListItemDetailLinkInnerDiv">
                        <img src="img/7day.png" alt="图片加载失败" title="7天啥啥啥">
                        <img src="img/creditcard.png" alt="图片加载失败" title="相信我">
                        <img src="img/promise.png" alt="图片加载失败" title="我保证">
                    </div>
                </div>
              </td>
              <td width="100px" valign="top" class="orderListItemDetailOriginalAndPromotePrice orderListItemDetailTD">
                <div class="orderListItemDetailPromotePrice">￥<?php echo $value['price']?></div>
              </td>
              <td valign="top" width="100px" class="orderListItemDetailNumberTD orderListItemDetailTD"
                  rowspan="1">
                  <span class="orderListItemDetailNumber"><?php echo $value['count']?></span>
              </td>
              <td width="120px" valign="top" class="orderListItemDetailPriceTD orderListItemDetailTD">
                  <div class="orderListItemDetailRealPrice">￥<?php echo $value['price']*$value['count']?></div>
                  <div class="orderListItemDetailPriceWithTransport">(含运费:￥0.00)</div>
              </td>
              <td width="100px" valign="top" class="orderListItemDetailReviewTD orderListItemDetailTD">
                <!--对于订单的不同交易状态，提供不同的提示按钮-->
              <?php
                $status = $value['estimate_state'];
                switch($status) {
                 case 'waitDelivery':
                  echo "<span>待发货</span><button class='btn btn-primary btn-xs callToDelivery' cid='{$value['cid']}'>催卖家发货</button>";
                  break;
                 case 'waitConfirm':
                  echo "<a href='#'><button class='btn btn-primary btn-xs orderListItemConfirmBtn' cid='{$value['cid']}'>确认收货</button></a>";
                  break;
                 case 'waitReview':
                  echo "<a href='#'><button class='orderListItemReviewBtn' oid='{$value['oid']}' did='{$value['did']}'>评价</button></a>";
                  break;
                 default:
                  echo"<span>订单已完成</span>";
                }?>
              </td>
            </tr>
        </table>
        <?php }?>
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