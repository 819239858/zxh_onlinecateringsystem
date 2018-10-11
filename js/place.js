/**
 * Created by xiaohui on 2018/5/14.
 */
$(function () {
  //footer
  processFooter();
  //地址悬浮
  $(".place-cc a,.place-nav").hover(function() {
    $('.place-nav').show();
  }, function() {
    $('.place-nav').hide();
  });
  //中间高
  var zw=$(window).width();
  var middleWidth=$('.place-wrap').width();
  var middleHeight=$('.place-wrap').height();
  var marginLeft=(zw-middleWidth)/2;
  $(".place-wrap-1").css("marginLeft",marginLeft);
  $(".place-wrap-1").show();

  //地址选择悬浮
  $(".place-nav").css("left",marginLeft+32);//再加32
  //地址点击
  $('.city').click(function(event) {
    if($(this).text()!="北京"){
      alert("该城市未开通");
    }else{
      window.location.reload();
    }
  });
  //弹出动画
  $(".place-wrap").animate({"opacity":"0.9"}, 200);

  $(window).resize(function(){
    //中间高
    var zw=$(window).width();
    var middleWidth=$('.place-wrap').width();
    var middleHeight=$('.place-wrap').height();
    var marginLeft=(zw-middleWidth)/2;
    $(".place-wrap-1").css("marginLeft",marginLeft);
    //地址选择悬浮
    $(".place-nav").css("left",marginLeft+32);
    processFooter();
  });
  //tab点击事件
  $('.place-tab a').click(function(){
    //变样式
    var cl=$(this).parents('.place-tab').find('a');
    cl.removeClass('alive');
    $(this).addClass('alive');
    var pid=$(this).attr('id');
    $('.place-names').hide();
    var n="#"+pid.replace('t','n');
    $(n).show();
  });
  //监听搜索楼名
$('#search-input').bind('input propertychange', function() {
    searchPlace();
  });
  //删除搜索字符
  $("#search-del").click(function(e) {
    $('#search-input').val('');
    $(".search-result").empty();
    $(".search-result").hide();
    $(this).css("visibility","hidden");
  });
});
function processFooter(){
  var zh=$(document.body).height();
  $(".footer-content").css('top', zh-60);
  $(".footer-content").show();
}
function searchPlace(){
  $(".search-result").hide();
  var keyword=$('.search-input').val().trim();
  if(keyword==""||keyword.length<=0){
    $(".search-result").empty();
    $("#search-del").css("visibility","hidden");
    return;
  }

  $("#search-del").css("visibility","visible");
  var placesTxt=$.cookie('places');
  var arrObj=eval('('+placesTxt+')');
  if(arrObj&&arrObj.length>0){
    $(".search-result").empty();
    for(var i=0;i<arrObj.length;i++){
      var shopName=arrObj[i].shopName;
      var shopId=arrObj[i].shopId;
      if(shopName.indexOf(keyword)>=0){
        $(".search-result").append("<a href='index.php'>"+shopName+"</a>");
        $(".search-result").show();
      }
    }
  }
}
function onKeySearch(){
  if(event.keyCode==13){
    searchPlace();
  }
}