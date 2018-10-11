$(document).ready(function () {
  getAllPrice();
  getAllCount();
  orderBtn();
  /*增加菜品的数量*/
  $("span.zj").each(function(){
    $(this).click(function () {
      var cid = $(this).attr("cid");
      var price = $(this).parent().prev().text();
      var scount =  $(this).next().children().val();
      $(this).next().children().val(++scount);
      var ecount = $(this).next().children().val();
      $(this).parent().next().text(ecount*price);
      getAllPrice();
      getAllCount();
      location.href='user/updateCount.php?cid='+cid+'&ecount='+ecount;
    });
  });
  /*减少菜品的数量*/
  $("span.zs").each(function(){
    $(this).click(function () {
      var cid = $(this).attr("cid");
      var price = $(this).parent().prev().text();
      var scount =  $(this).prev().children().val();
      if($(this).prev().children().val()>1){
        $(this).prev().children().val(--scount);
      }
      var ecount = $(this).prev().children().val();
      $(this).parent().next().text(ecount*price);
      getAllPrice();
      getAllCount();
      location.href='user/updateCount.php?cid='+cid+'&ecount='+ecount;
    });
  });
  $("#all").click(function () {
    if(this.checked ==  true){
      $('[type=checkbox]').prop('checked', true);
    }else{
      $('[type=checkbox]').prop('checked', false);
    }
    getAllPrice();
    getAllCount();
    orderBtn();
  });
  $(".cbox").click(function () {
    //总的checkbox的个数
    var len =   $(".cbox").length;
    //已选中的checkbox的个数
    var checkedLen  =   $("input[type='checkbox'][name='checked_goods']:checked").length;
    if(len  ==  checkedLen){
      $('#all').prop('checked', true);
    }else{
      $('#all').prop('checked', false);
    }
    getAllPrice();
    getAllCount();
    orderBtn();
  });
  /*点击结算按钮时触发的事件*/
  $("#btn").click(function () {
    var param = "?";
    $(".cbox").each(function () {
      if($(this).is(":checked")){
        var oiid = $(this).attr("oiid");
        param += "&oiid="+oiid;
      }
    });
    param = param.substring(0, 1) + param.substring(2, param.length);
    location.href="xdpage.php"+param;
  })
});
function getAllPrice() {
  var sum =  0.0;
      $(".cbox").each(function () {
        if($(this).is(":checked")){
      var total = $(this).parent().parent().children().eq(4).text();
      sum += parseFloat(total);
    }
  });
  $("#total").val(sum);
}
function getAllCount() {
  var count =  0;
  $(".cbox").each(function () {
    if($(this).is(":checked")){
      count+=parseInt($(this).parent().parent().children().eq(3).children().eq(1).children().val());
    }
  });
  $("#count").val(count);
}
function orderBtn(){
  var selectProduct = false;
  /*遍历所有商品勾选框*/
  $('.cbox').each(function(){
    if($(this).is(":checked")){
      selectProduct = true;
    }
  });
  /*只要有任意商品被选中，就将结算按钮激活*/
  if(selectProduct) {
    $(".pay").removeAttr("disabled");
    $(".pay").css("background-color",
      "rgb(196, 0, 0)");
  }else {
    $(".pay").attr("disabled", "disabled");
    $(".pay").css("background-color", "#B0B0B0");
  }
}
function del(id){
  if($("#all").is(":checked")){
    location.href='user/delAll.php?uid='+id;
  }
}