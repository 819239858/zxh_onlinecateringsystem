<?php
  //防止非法调用
  if(!defined('IN_TG')){
    exit('Access Defined.');
  }
?>
<div class="navbar navbar-inverse navbar-fixed-top" ng-controller='headerCtrl'>
    <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><img src='img/logo2.png'style='width:100px;'/></a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#/user">食在指尖后台</a></li>
            <li><a href="#/caipin">菜品管理</a></li>
            <li><a href="#/user">用户管理</a></li>
            <li><a href="#/order">订单管理</a></li>
        </ul>
    </div>
    </div>
</div>