/**
 * Created by xiaohui on 2018/3/12.
 */
angular.module('adminindexModule',['ng','ngRoute','ngAnimate']).
controller('headerCtrl',function($scope,$location){
  $scope.jump1 = function(){
    $location.path('/caipin');
  }
  $scope.jump2 = function(){
    $location.path('/user');
  }
  $scope.jump3 = function(){
    $location.path('/order');
  }
}).
controller('caipinCtrl',function($scope,$http){
  $scope.msg = '菜品管理页面';
  $http.get('data/caipingl.php?start=0').
  success(function(data){
    $scope.caipinList = data;
  });
  $scope.prev = function(){
    $http.get('data/caipingl.php?start='+($scope.caipinList.length-6)).
    success(function(data){
      $scope.caipinList = data;
    });
  };
  $scope.next = function(){
    $http.get('data/caipingl.php?start='+$scope.caipinList.length).
    success(function(data){
      $scope.caipinList = data;
    });
  };
  $scope.delete = function(id){
    if(confirm("确定要删除此条记录吗?")){
      window.location.href = './admin/remove.php?id='+id;
    }
  }
  $scope.change = function(id){
    window.location.href = './edit.php?id='+id;
  }
  $scope.add = function(){
    window.location.href = './addDish.php';
  }
  //监视Model数据kw的改变，一改变则立即向服务器发起AJAX请求
  $scope.$watch('kw',function(){
    if (!$scope.kw){
      return;
    }
    $http.get('data/dish_listbykw.php?kw='+$scope.kw).
    success(function(data){
      $scope.caipinList = data;
    });
  });
}).
controller('userCtrl',function($scope,$http){
  $scope.msg = '用户管理页面';
  $http.get('data/usergl.php?start=0').
  success(function(data){
    $scope.userList = data;
  });
  $scope.prev = function(){
    $http.get('data/usergl.php?start='+($scope.userList.length-6)).
    success(function(data){
      $scope.userList = data;
    });
  };
  $scope.next = function(){
    $http.get('data/usergl.php?start='+$scope.userList.length).
    success(function(data){
      $scope.userList = data;
    });
  };
  //监视Model数据kw的改变，一改变则立即向服务器发起AJAX请求
  $scope.$watch('kw',function(){
    if (!$scope.kw){
      return;
    }
    $http.get('data/user_listbykw.php?kw='+$scope.kw).
    success(function(data){
      $scope.userList = data;
    });
  });
}).
controller('orderCtrl',function($scope,$http){
  $scope.msg = '订单管理页面';
  $http.get('data/ordergl.php?start=0').
  success(function(data){
    $scope.orderList = data;
  });
  $scope.detail = function(oid) {
    $http.get('data/dishDetail.php?oid='+oid).
    success(function(data){
      $scope.detailList = data;
    });
  };
  $scope.prev = function(){
    $http.get('data/ordergl.php?start='+($scope.orderList.length-6)).
    success(function(data){
      $scope.orderList = data;
    });
  };
  $scope.next = function(){
    $http.get('data/ordergl.php?start='+$scope.orderList.length).
    success(function(data){
      $scope.orderList = data;
    });
  };
  //监视Model数据kw的改变，一改变则立即向服务器发起AJAX请求
  $scope.$watch('kw',function(){
    if (!$scope.kw){
      return;
    }
    $http.get('data/order_listbykw.php?kw='+$scope.kw).
    success(function(data){
      $scope.orderList = data;
    });
  });
}).
config(function($routeProvider){//配置路由字典，指定路由地址<=>模板页面对应关系
  $routeProvider.
  when ('/caipin',{
    templateUrl:'admin/caipingl.php',
    controller:'caipinCtrl'//此处声明的控制器可以供当前模板页面中的所有元素使用
  }).
  when ('/user',{
    templateUrl:'admin/usergl.php',
    controller:'userCtrl'//此处声明的控制器可以供当前模板页面中的所有元素使用
  }).
  when ('/order',{
    templateUrl:'admin/ordergl.php',
    controller:'orderCtrl'//此处声明的控制器可以供当前模板页面中的所有元素使用
  }).
  otherwise({ //若URL未提供路由地址/提供了不存在的路由地址
    redirectTo:'/user'
  });
});