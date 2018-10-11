/**
 * Created by xiaohui on 2018/3/27.
 */
window.onload = function(){
  var fm = document.getElementsByTagName('form')[0];
  fm.onsubmit = function(){
    if(fm.dishname.value==""){
      alert("请输入菜品名!");
      fm.dishname.focus();
      return false;
    }
    if(fm.price.value==""){
      alert("请输入菜品的价钱!");
      fm.price.focus();
      return false;
    }
    if(fm.img_sm.value==""){
      alert("请输入小图片路径!");
      fm.img_sm.focus();
      return false;
    }
    if(fm.img_lg.value==""){
      alert("请输入大图片路径!");
      fm.img_lg.focus();
      return false;
    }
    if(fm.material.value==""){
      alert("请输入菜品原料!");
      fm.material.focus();
      return false;
    }
    if(fm.detail.value==""){
      alert("请输入菜品详情!");
      fm.detail.focus();
      return false;
    }
    if(fm.d_time.value==""){
      alert("请输入菜品的送达时间!");
      fm.d_time.focus();
      return false;
    }
    return true;
  }
}