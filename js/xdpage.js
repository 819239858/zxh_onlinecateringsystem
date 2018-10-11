/**
 * Created by xiaohui on 2018/3/12.
 */
window.onload = function() {
  var temps = document.getElementsByClassName("temp");
  var sum = 0.0;
  var number = 0;
  for (var i=0;i<temps.length;i++) {
    var count = temps[i].getElementsByClassName("number")[0].innerHTML;
    var price = temps[i].getElementsByClassName("price")[0].innerHTML;
    sum += parseFloat(price);
    number += parseInt(count);
  }
  document.getElementById("number").value = number;
  document.getElementById("allMoney").value = sum;
  //表单验证如下
  var fm = document.getElementsByTagName('form')[0];
  fm.onsubmit = function(){
    if (fm.person.value=='') {
      alert('联系人姓名不能为空!');
      fm.person.value = "";
      fm.person.focus();
      return false;
    }
    if (fm.telphone.value=='') {
      alert('联系人电话不能为空!');
      fm.telphone.value = "";
      fm.telphone.focus();
      return false;
    }
    if (fm.address.value=='') {
      alert('联系人地址不能为空!');
      fm.address.value = "";
      fm.address.focus();
      return false;
    }
    return true;
  }
}