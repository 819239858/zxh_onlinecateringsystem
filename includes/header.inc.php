<?php
  //防止非法调用
  if(!defined('IN_TG')){
    exit('Access Defined.');
  }
?>
<div id='header'>
        <div class='navbar navbar-default navbar-fixed-top'>
            <a href="adminlogin.php">后台管理</a>
            <ul class='list-unstyled pull-right list-inline'>
                <li><a href="index.php"><span class="glyphicon glyphicon-home" style="color: #c40000"></span> 首页</a></li>
                <?php
                    if(isset($_COOKIE['username'])){
                        echo '<li><a href="member.php"><span style="color: #c40000;font-weight:bold;">'.$_COOKIE['username'].'</span> 的个人中心</a></li>';
                        echo "\n";
                    }else {
                        echo '<li><a href="register.php">注册</a></li>';
                        echo "\n";
                        echo '<li><a href="login.php">登录</a></li>';
                        echo "\n";
                    }
                ?>
                <li><a href="order.php">我的订单</a></li>
                <li><a href="gwcar.php"><span class='glyphicon glyphicon-shopping-cart text-danger'></span>  购物车</a></li>
                <?php
                    if(isset($_COOKIE['username'])){
                        echo '<li><a href="logout.php">退出</a></li>';
                    }
                ?>
            </ul>
        </div>
</div>