<?php

?>
<div class='container'>
  <h4 class='text-danger'>用户管理</h4>
  <input ng-model='kw' class='pull-right searchText' type='text' placeholder='请输入用户名' style="margin-bottom:10px;"/>
  <table class='table table-bordered text-center'>
    <thead>
      <tr class='success'>
        <td>ID</td>
        <td>用户名</td>
        <td>密码</td>
        <td>性别</td>
        <td>电话号码</td>
        <td>注册时间</td>
        <td>上次登陆时间</td>
        <td>上次登陆IP</td>
      </tr>
    </thead>
    <tbody>
       <tr ng-repeat="user in userList">
         <td>{{user.uid}}</td>
         <td>{{user.username}}</td>
         <td>{{user.userpwd}}</td>
         <td>{{user.sex}}</td>
         <td>{{user.phone}}</td>
         <td>{{user.register_time}}</td>
         <td>{{user.last_time}}</td>
         <td>{{user.last_ip}}</td>
       </tr>
    </tbody>
  </table>
  <ul class="pager jz">
    <li class="previous"><a href="#/user" ng-click="prev()">Previous</a></li>
    <li class="next"><a href="#/user" ng-click="next()">Next</a></li>
  </ul>
</div>