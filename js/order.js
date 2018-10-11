/**
 * Created by xiaohui on 2018/3/12.
 */
$(document).ready(function(){
  //点击催卖家发货所触发的事件
  $("button.callToDelivery").click(function () {
    var cid = $(this).attr("cid");
    location.href = "user/updateStatus.php?cid="+cid+"&estimate_state=waitConfirm";
  });
  //点击确认收货触发的事件
  $("button.orderListItemConfirmBtn").click(function () {
    var cid = $(this).attr("cid");
    location.href = "user/updateStatus.php?cid="+cid+"&estimate_state=waitReview";
    //设置订单状态为待评价
  });

 //点击评价触发的事件
 $("button.orderListItemReviewBtn").click(function () {
   var oid = $(this).attr("oid");
   var did = $(this).attr("did");
   location.href = "estimate.php?oid="+oid+"&did="+did;
  });

});
