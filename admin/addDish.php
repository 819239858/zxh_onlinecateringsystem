<?php

?>
<div class="panel panel-warning">
    <div class="panel-heading">
      <h3 class="panel-title">增加菜品</h3>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" ng-hide="succMsg || errMsg">
        <div class="form-group">
          <label for="caipinname" class="col-sm-2 control-label">菜名</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="caipinname" placeholder="请输入菜品名称" ng-model = "dishname">
          </div>
        </div>
        <div class="form-group">
          <label for="price" class="col-sm-2 control-label">价钱</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="price" placeholder="请输入价钱" ng-model = "price">
          </div>
        </div>
        <div class="form-group">
          <label for="img_sm" class="col-sm-2 control-label">小图片</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="img_sm" placeholder="请输入小图片地址" ng-model = "img_sm">
          </div>
        </div>
        <div class="form-group">
          <label for="img_lg" class="col-sm-2 control-label">大图片</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="img_lg" placeholder="请输入大图片地址" ng-model = "img_lg">
          </div>
        </div>
        <div class="form-group">
          <label for="detail" class="col-sm-2 control-label">详情</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="detail" placeholder="请输入菜品详情" ng-model = "detail">
          </div>
        </div>
        <div class="form-group">
            <label for="material" class="col-sm-2 control-label">材料</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="material" placeholder="请输入菜品材料" ng-model = "material">
              </div>
            </div>
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <button ng-click="submitBtn()" type="button" class="btn btn-success">提交</button>
          </div>
        </div>
      </form>
      <p ng-show="succMsg">{{succMsg}}</p>
      <p ng-show="errMsg">{{errMsg}}</p>
    </div>
  </div>