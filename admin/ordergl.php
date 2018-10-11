<?php
?>
<div class='container'>
  <h4 class='text-danger'>订单管理</h4>
  <input ng-model='kw' class='pull-right searchText' type='text' placeholder='请输入买家名称或订单号' style="margin-bottom:10px;"/>
  <table class='table table-bordered text-center'>
    <thead>
      <tr class='success'>
       <td>订单号</td>
       <td>金额</td>
       <td>菜品数量</td>
       <td>买家名称</td>
       <td>买家性别</td>
       <td>送货地址</td>
       <td>电话号码</td>
       <td>创建时间</td>
       <td>操作</td>
     </tr>
    </thead>
    <tbody>
       <tr ng-repeat='order in orderList'>
         <td>{{order.oid}}</td>
         <td>{{order.allPrice}}</td>
         <td>{{order.allCount}}</td>
         <td>{{order.user_name}}</td>
         <td>{{order.sex}}</td>
         <td>{{order.addr}}</td>
         <td>{{order.phone}}</td>
         <td>{{order.order_time}}</td>
         <td>
            <a href="#/order" ng-click="detail(order.oid);" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs">查看详情</a>
            <div class="modal fade" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">订单详情</h4>
                  </div>
                  <div class="modal-body">
                     <table class='table table-bordered text-center'>
                       <thead>
                          <tr class='success'>
                             <td>菜品图</td>
                             <td>菜品名</td>
                             <td>单价</td>
                             <td>数量</td>
                          </tr>
                       </thead>
                       <tbody>
                          <tr ng-repeat='detail in detailList'>
                            <td><img src="img/{{detail.img_sm}}"></td>
                            <td>{{detail.name}}</td>
                            <td>{{detail.price}}</td>
                            <td>{{detail.count}}</td>
                          </tr>
                       </tbody>
                     </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                  </div>
                </div>
              </div>
            </div>
         </td>
       </tr>
    </tbody>
  </table>
  <ul class="pager jz">
    <li class="previous"><a href="#/order" ng-click="prev()">Previous</a></li>
    <li class="next"><a href="#/order" ng-click="next()">Next</a></li>
  </ul>
</div>