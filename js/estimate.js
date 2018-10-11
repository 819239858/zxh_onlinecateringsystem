/**
 * Created by xiaohui on 2018/3/26.
 */
window.onload = function(){
  var fm = document.getElementsByTagName("form")[0];
  fm.onsubmit = function(){
    if(fm.estimate.value==""){
      alert("评论不能为空!");
      fm.estimate.focus();
      return false;
    }
    return true;
  };
}