/**
 * Created by xiaohui on 2018/3/21.
 */
window.onload = function(){
  var faceimg = document.getElementById("faceimg");
  faceimg.onclick = function(){
    window.open('face.php','face','width=400,height=400,top=200,left=200,scrollbars=1');
  }
  var fm = document.getElementsByTagName("form")[0];
  fm.onsubmit = function(){
    if(fm.pwd.value==""||fm.pwd.value.length < 6){
      alert("请填写不小于6位的密码!");
      fm.pwd.focus()
      return false;
    }
    if(fm.phone.value==""){
      alert("请填写您的电话号码!");
      fm.phone.focus()
      return false;
    }
    if(fm.addr.value==""){
      alert("请填写您的收货地址!");
      fm.addr.focus()
      return false;
    }
    return true;
  }
}
