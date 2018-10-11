<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>基于web的食在指尖</title>
  <link rel="stylesheet" href="css/basic.css">
  <link rel="stylesheet" href="css/place.css">
  <link rel="stylesheet" href="css/footer_1.css">
  <link rel="stylesheet" href="css/header.css">
</head>
<body>
  <!--头部-->
  <div class="header shadow">
    <div class="search-result"></div>
    <div class="header-left fl">
      <a class="logo" href="#">食在指尖</a>
      <div class="search">
        <img class="search-icon" src="img/icon_search.png" width="20" height="20">
        <input id="search-input" class="search-input" type="text" placeholder="请输入楼名" onkeypress="onKeySearch()">
        <span id="search-del" class="search-del">&times;</span>
      </div>
      <div class="clear"></div>
    </div>
    <div class="header-right fr">
        <span class="header-operater">
          <a href="#">外卖</a>
          <a href="#">我的订单</a>
          <a href="#">联系我们</a>
        </span>
    </div>
  </div>
  <!--内容-->
  <div class="place-content">
    <div class="place-wrap-1">
      <div class="place-cc">
        <span>北京</span>
        <a>[切换城市]</a>
      </div>
      <div class="place-wrap place-shadow">
        <div class="place-tab">
          <ul>
            <li><a id="t1"  class="alive">朝阳区</a></li>
            <li><a id="t2">海淀区</a></li>
            <li><a id="t3">西城区</a></li>
            <li><a id="t4">东城区</a></li>
            <li><a id="t5">大兴区</a></li>
            <li><a id="t6">昌平区</a></li>
            <li><a id="t7">通州区</a></li>
            <li><a id="t8">其它</a></li>
          </ul>
        </div>
        <div id="n1" class="place-names">
          <div class="name-item"><a class="place-link" href="index.php">北辰世纪中心</a></div>
          <div class="name-item"><a href="index.php">世通国际大厦</a></div>
          <div class="name-item"><a href="index.php">华贸中心</a></div>
          <div class="name-item"><a href="index.php">华腾劲松商务楼</a></div>
          <div class="name-item"><a href="index.php">华腾旌凯大厦</a></div>
          <div class="name-item"><a href="index.php">金泰国际大厦</a></div>
          <div class="name-item"><a href="index.php">金泰大厦</a></div>
          <div class="name-item"><a href="index.php">金泰国益大厦</a></div>
          <div class="name-item"><a href="index.php">北京富力中心</a></div>
          <div class="name-item"><a href="index.php">华腾旌凯写字楼</a></div>
          <div class="name-item"><a href="index.php">世茂国际中心</a></div>
          <div class="name-item"><a class="new" a href="index.php">华腾北搪商务大厦</a></div>
        </div>
        <div id="n2" class="place-names n">
          <div class="name-item"><a href="index.php">城建大厦</a></div>
          <div class="name-item"><a href="index.php">华腾科技大厦</a></div>
          <div class="name-item"><a href="index.php">奥北科技园</a></div>
          <div class="name-item"><a href="index.php">翠微路国企写字楼</a></div>
          <div class="name-item"><a href="index.php">电信实业大厦</a></div>
          <div class="name-item"><a href="index.php">理想国际大厦</a></div>
          <div class="name-item"><a href="index.php">丰裕写字楼</a></div>
          <div class="name-item"><a href="index.php">中关村资本大厦</a></div>
          <div class="name-item"><a href="index.php">融汇国际大厦</a></div>
          <div class="name-item"><a class="new" a href="index.php">金泰富地大厦</a></div>
        </div>
        <div id="n3" class="place-names n">
          <div class="name-item"><a>首建金融中心</a></div>
          <div class="name-item"><a>港中旅大厦</a></div>
          <div class="name-item"><a>通港大厦</a></div>
          <div class="name-item"><a>德胜置业大厦</a></div>
          <div class="name-item"><a>众志金开金融大厦</a></div>
          <div class="name-item"><a>茅台大厦</a></div>
          <div class="name-item"><a>月坛中心</a></div>
          <div class="name-item"><a>合生财富广场</a></div>
          <div class="name-item"><a>中基大厦</a></div>
          <div class="name-item"><a>成铭大厦</a></div>
        </div>
        <div id="n4" class="place-names n">
          <div class="name-item"><a>居然大厦</a></div>
          <div class="name-item"><a>五矿广场</a></div>
          <div class="name-item"><a>新闻大厦</a></div>
          <div class="name-item"><a>信德京汇中心</a></div>
          <div class="name-item"><a>皇城国际商务中心</a></div>
          <div class="name-item"><a>民生金融中心</a></div>
          <div class="name-item"><a>国盛中心</a></div>
          <div class="name-item"><a>北京京文大厦</a></div>
          <div class="name-item"><a>神华州际大厦</a></div>
          <div class="name-item"><a>宇飞大厦</a></div>
        </div>
        <div id="n5" class="place-names n">
          <div class="name-item"><a>鸿坤广场</a></div>
          <div class="name-item"><a>星光视界中心</a></div>
          <div class="name-item"><a>联港城市广场</a></div>
          <div class="name-item"><a>创意港·铜锣湾</a></div>
          <div class="name-item"><a>文化都汇</a></div>
          <div class="name-item"><a>星光影视园</a></div>
          <div class="name-item"><a>兴创国际中心</a></div>
          <div class="name-item"><a>泰禾中央广场</a></div>
        </div>
        <div id="n6" class="place-names n">
          <div class="name-item"><a>昌平创业大厦</a></div>
          <div class="name-item"><a>果栋LOFT</a></div>
          <div class="name-item"><a>TBD云集中心</a></div>
          <div class="name-item"><a>金隅万科广场</a></div>
          <div class="name-item"><a>新元科技园</a></div>
          <div class="name-item"><a>福环国际创新园</a></div>
          <div class="name-item"><a>住总万科·金域国际中心</a></div>
          <div class="name-item"><a>龙冠商务中心</a></div>
        </div>
        <div id="n7" class="place-names n">
          <div class="name-item"><a>东亚环球国际</a></div>
          <div class="name-item"><a>富力运河十号</a></div>
          <div class="name-item"><a>保利大都汇</a></div>
          <div class="name-item"><a class="new">嘉逸商务园</a></div>
          <div class="name-item"><a>合创产业中心</a></div>
          <div class="name-item"><a>99号文化创意产业大厦</a></div>
          <div class="name-item"><a>华远铭悦好天地</a></div>
          <div class="name-item"><a>通州万达广场</a></div>
          <div class="name-item"><a>国际健康港</a></div>
          <div class="name-item"><a>北京ONE大厦</a></div>
        </div>
        <div id="n8" class="place-names n">
          <div class="name-item"><a>全球创新港（亦城财富中心）</a></div>
          <div class="name-item"><a>国投尚科大厦</a></div>
          <div class="name-item"><a>中航技广场</a></div>
          <div class="name-item"><a>亦城科技中心</a></div>
          <div class="name-item"><a>华夏幸福创新中心</a></div>
          <div class="name-item"><a>贝壳菁汇</a></div>
          <div class="name-item"><a>首创中心</a></div>
          <div class="name-item"><a>汉威国际广场</a></div>
          <div class="name-item"><a>南方弘泰大厦</a></div>
          <div class="name-item"><a>首特钢创业大厦</a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-content">
    <div class="footer-content-entrance">
      <a class="footer-content-link" href="#">关于我们</a>
      <span class="footer-content-separator">|</span>
      <a class="footer-content-link footer-content-weixing">关注微信
        <img class="weixin-pic" src="img/qr_code.jpg">
      </a>
      <span class="footer-content-separator">|</span>
      <a class="footer-content-link" href="#">投诉建议</a>
      <span class="footer-content-separator">|</span>
      <a class="footer-content-link kaidian_address" href="#">商家入驻</a>

    </div>
    <div class="footer-content-copyright">©2018 dingfanzu.com <a target="_blank">京ICP证020666号</a> </div>
  </div>
  <ul  class="place-nav n">
    <li><a class="city">北京</a></li>
    <li><a class="city">天津</a></li>
  </ul>
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/place.js"></script>
</body>
</html>