<?php
    define('IN_TG',true);
    //引入公共文件
    require dirname(_FILE_).'/includes/common.inc.php';
    define('SCRIPT','index');
?>
<!DOCTYPE html>
<html ng-app='myModule'>
	<head>
		<meta charset="UTF-8">
		<title>食在指尖-网上订餐系统</title>
		<?php
			require ROOT_PATH.'includes/title.inc.php';
		?>
	</head>
	<body>
		<?php
			include './includes/header.inc.php';
		?>
		<div id='content' class='container'>
      <div class='addr'>
        <a href="index.php"><img src='img/logo.png'></a>
        <span>当前位置:<b>北辰世纪中心</b><a href='place.php'>[切换地址]<a></span>
      </div>
       <div class='form-group has-feedback'>
        <input ng-model='kw' class='ssname pull-right form-control' type='text' placeholder='请输入菜品名或原料'/>
        <span class="sspan form-control-feedback glyphicon glyphicon-search"></span>
       </div>
    </div>
		<hr>
		<div id='main' ng-controller='indexCtrl'>
		    <div id='catogary1' class='container'>
		        <h4>商家分类:</h4>
		        <ul class='list-inline'>
		            <li class='active'>全部商家<a href="index.php"></a></li>
		            <li ><a href="#" ng-click="choose(1)">美食</a></li>
		            <li ><a href="#" ng-click="choose(2)">快餐便当</a></li>
		            <li ><a href="#" ng-click="choose(3)">特色菜系</a></li>
		            <li ><a href="#" ng-click="choose(4)">异国料理</a></li>
		            <li ><a href="#" ng-click="choose(5)">小吃夜宵</a></li>
		            <li ><a href="#" ng-clilck="choose(6)">甜品饮品</a></li>
		            <li ><a href="#" ng-click="choose(7)">果蔬生鲜</a></li>
		            <li ><a href="#" ng-click="choose(8)">鲜花绿植</a></li>
		            <br><br>
		            <li ><a href="#" ng-click="choose(9)">医药健康</a></li>
		            <li ><a href="#" ng-click="choose(10)">早餐</a></li>
		            <li ><a href="#" ng-click="choose(11)">午餐</a></li>
		            <li ><a href="#" ng-click="choose(12)">下午茶</a></li>
		            <li ><a href="#" ng-click="choose(13)">晚餐</a></li>
		            <li ><a href="#" ng-click="choose(14)">夜宵</a></li>
		        </ul>
		    </div>
		    <div id='catogary2' class='container'>
          <div class="list-group">
            <a href="detail.php?id={{dish.did}}" ng-repeat="dish in dishList" class="list-group-item">
              <div class="media">
                <div class="media-left media-middle">
                  <img class="media-object" ng-src="img/{{dish.img_sm}}" alt="">
                </div>
                <div class="media-body">
                  <h3>{{dish.name}}</h3>
                  <p style="color:#999;">免配送费 &nbsp;&nbsp;<span> 配送时间：{{dish.d_time}}分钟</span></p>
                  <span>价格：{{dish.price}}</span>
                </div>
              </div>
            </a>
          </div>
          <button ng-if="hasLoad" ng-click="loadMore()" type="button" class="btn btn-block btn-success">
            <span ng-hide="isLoading">加载更多</span>
            <img ng-show="isLoading" class="loading" src="img/loading.gif" alt="">
          </button>
          <div ng-hide="hasLoad"class="text-warning bg-danger">
            <span class="glyphicon glyphicon-warning-sign"></span>
            <span>没有更多数据了！</span>
          </div>
        </div>
		</div>
		<?php
			include 'includes/footer.inc.php';
		?>
		<?php
      require ROOT_PATH.'includes/script.inc.php';
    ?>
    <script src='js/jquery-3.3.1.js'></script>
    <script src='js/bootstrap.js'></script>
    <script>
      $(function(){
        $('#mymodal').modal({
          keyboard:true
        });
      });
    </script>
	</body>
</html>