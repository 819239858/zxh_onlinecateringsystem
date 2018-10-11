<?php

?>
<div class='container'>
  <h4 class='text-danger'>菜品管理</h4>
  <input ng-model='kw' class='pull-right searchText' type='text' placeholder='请输入菜品名或原料或类别'/>
  <ol class="breadcrumb">
    <li><a href='#/caipin' ng-click='add();'>添加菜品</a></li>
    <li class="text-danger">菜品详情</li>
  </ol>
  <table class='table table-bordered text-center'>
    <thead>
      <tr class='success'>
       <td>菜品号</td>
       <td>菜品图片</td>
       <td>菜品分类</td>
       <td>菜品名称</td>
       <td>原料</td>
       <td>价钱</td>
       <td>详情</td>
       <td>编辑</td>
       <td>删除</td>
     </tr>
    </thead>
    <tbody>
       <tr ng-repeat="caipin in caipinList">
         <td>{{caipin.did}}</td>
         <td><img ng-src='img/{{caipin.img_sm}}'/></td>
         <td>{{caipin.type}}</td>
         <td>{{caipin.name}}</td>
         <td>{{caipin.material}}</td>
         <td>{{caipin.price}}</td>
         <td class='td_message'>{{caipin.detail}}</td>
         <td><a href='#/caipin' ng-click='change(caipin.did)'><span class='glyphicon glyphicon-pencil'></a></span></td>
         <td><a href='#/caipin' ng-click='delete(caipin.did);'><span class='glyphicon glyphicon-trash'></a></span></td>
       </tr>
    </tbody>
  </table>
  <ul class="pager jz">
    <li class="previous"><a href="#/caipin" ng-click="prev()">Previous</a></li>
    <li class="next"><a href="#/caipin" ng-click="next()">Next</a></li>
  </ul>
</div>