/**
 * Created by xiaohui on 2018/3/9.
 */
angular.module('myModule',['ng','ngRoute','ngAnimate']).
  controller('indexCtrl',function($scope,$http){
    $scope.isLoading = true;
    $scope.hasLoad = true;
    $scope.count = 0;
    $http.get('data/dish_listbypage.php?start=0').success(function(data){
      $scope.dishList = data;
      $scope.isLoading = false;
    });
  $scope.loadMore = function () {
    $scope.isLoading = true;
    $http.get('data/dish_listbypage.php?start='+$scope.dishList.length).success(function (data) {
      if(data.length<5){
        $scope.hasLoad = false;
      }
      $scope.dishList = $scope.dishList.concat(data);
      $scope.isLoading = false;
    });
  }
  $scope.choose = function(gid) {
    $http.get('data/dish_listbyclass.php?gid='+gid).
    success(function(data){
      $scope.dishList = data;
    });
  }
  //监视Model数据kw的改变，一改变则立即向服务器发起AJAX请求
  $scope.$watch('kw',function(){
    if (!$scope.kw){
      return;
    }
    $scope.isLoading = true;
    $http.get('data/dish_listbykw.php?kw='+$scope.kw).
    success(function(data){
      $scope.dishList = data;
      $scope.isLoading = false;
    });
  });
});