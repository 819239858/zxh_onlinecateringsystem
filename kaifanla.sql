-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-04-07 13:17:23
-- 服务器版本： 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaifanla`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `aid` int(8) NOT NULL,
  `adminname` varchar(10) NOT NULL DEFAULT '',
  `adminpwd` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`aid`, `adminname`, `adminpwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `cart_item`
--

CREATE TABLE `cart_item` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `count` int(8) NOT NULL DEFAULT '1',
  `add_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cart_item`
--

INSERT INTO `cart_item` (`cid`, `uid`, `did`, `count`, `add_time`) VALUES
(15, 1, 3, 4, '2018-04-02 10:44:36'),
(16, 1, 5, 1, '2018-03-31 16:12:54'),
(17, 1, 1, 1, '2018-04-02 10:45:55'),
(18, 2, 2, 1, '2018-04-02 13:44:42');

-- --------------------------------------------------------

--
-- 表的结构 `estimate`
--

CREATE TABLE `estimate` (
  `eid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `oid` int(10) NOT NULL,
  `did` int(10) NOT NULL,
  `estimate` varchar(40) NOT NULL,
  `estimate_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `estimate`
--

INSERT INTO `estimate` (`eid`, `uid`, `oid`, `did`, `estimate`, `estimate_time`) VALUES
(16, 1, 2, 2, '可好吃了\r\n', '2018-03-28 09:21:31'),
(17, 1, 4, 1, '大虾呀', '2018-03-28 09:22:03'),
(18, 1, 1, 3, '辣味一直是我最爱呀', '2018-03-28 09:33:03'),
(19, 1, 5, 1, '我又回购了，太好吃啦', '2018-03-28 09:45:07'),
(20, 1, 3, 5, '我最喜欢的蛋糕味道，必须赞', '2018-03-28 14:23:24'),
(21, 2, 6, 14, '这是我吃过最好吃的披萨', '2018-03-28 15:07:34');

-- --------------------------------------------------------

--
-- 表的结构 `kf_dish`
--

CREATE TABLE `kf_dish` (
  `did` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `price` float(6,2) DEFAULT NULL,
  `img_sm` varchar(64) DEFAULT NULL,
  `img_lg` varchar(64) DEFAULT NULL,
  `detail` varchar(2048) DEFAULT NULL,
  `material` varchar(2048) DEFAULT NULL,
  `d_time` int(11) NOT NULL DEFAULT '30'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kf_dish`
--

INSERT INTO `kf_dish` (`did`, `name`, `price`, `img_sm`, `img_lg`, `detail`, `material`, `d_time`) VALUES
(1, '【酸甜开胃虾】', 36.00, 'p0281.jpg', 'p0281-l.jpg', '话说有两个地方是我挪不动脚的，一个是图书馆，另外一个便是菜市场！ 每周有七天，留给自己的时间却很少。既要带儿子去上早教课，又要陪女儿上兴趣班，还要留一个半天带孩子们泡图书馆！ 有时真的觉得妈妈是这个世界上最伟大的职业，累，并快乐着！ 这个时节正是各类果蔬大量上市的时候，拖着买菜专用的小拉车，徜徉在人声鼎沸的菜市场，从海鲜区、肉类区再慢慢逛到我最喜爱的果蔬区，感受季节的变换带给人们餐桌上的喜悦………… ', '明虾、番茄酱、白糖、白醋、葱、姜、淀粉', 30),
(2, '【桂香紫薯山药卷】', 16.50, 'p2679.jpg', 'p2679-l.jpg', '今天用紫薯，山药和吐司来做一款漂亮又健康的点心，做为早餐或者夜宵都是很好的选择哦！ 做法其实很简单，只要将各种食材层叠卷起来就行。提前煮好山药和紫薯，那么只要几分钟就能完成。 但就是这么一点小小的改变，就能立刻让原本平淡无奇的吐司变身抢手货哟~ 生活总是这样，时不时的有一些小惊喜，才会更加精彩不是嘛~', '切片吐司、紫薯、铁棍山药、糖桂花、炼乳', 45),
(3, '【小米椒爆炒小公鸡】', 32.00, 'p8489.jpg', 'p8489-l.jpg', '算起来有一个星期没有更新了，忙着赶紧完成手头的工作，和孩子一起开启度假模式。我总是毫不避讳地称自己为吃货，对于我来说，度假中缺少美食是万万不可的。想要找一个风景与美食兼顾的度假地点可不太容易，工作之余忙着查路线，查攻略，总算是定好了目的地。其实我这个嗜辣族最想去的还是成都重庆一带，考虑到季节的原因，还是留到冬天再前往吧。今天上一道火辣辣的小米椒爆炒小公鸡，虽在家中，也是十足的过了把食辣的瘾，不擅吃辣的伙伴们做这道菜的时候可要记得减少辣椒的用量哦。', '三黄鸡、杭椒、干红椒、新鲜小米椒、麻椒、八角、香叶、葱、姜、生抽', 37),
(4, '【口袋饼】', 6.50, 'p7818.jpg', 'p7818-l.jpg', '热水和面！面团擀成薄薄的面片之后切成长条，之后中间抹油！折叠之后用手把两边按扁，使其黏到一起！如图！然后用刀背划出花边！平底锅抹油小火煎制口袋饼，两边烙上金黄色即可！土豆切丝！黄瓜和香肠切条状！炒土豆丝，放入盐，醋和生抽炒均匀就可以了，然后放入烙好的口袋饼里，放入黄瓜和香肠即可！', '面粉、黄瓜、香肠、热水、土豆、盐、醋、生抽、油。', 21),
(5, '【橄榄油版酸奶蛋糕】', 32.00, 'p9138.jpg', 'p9138-l.jpg', '酸奶蛋糕，这是第二次做。自前一次做了带去单位分享后，吃到的同事都说好吃，连不爱甜食的自己也觉得细腻可口。特别是入冰箱后取出品味风味尤佳。喜欢那一丝丝的凉意一丝丝的甜味，入口的感觉特别绵软，很适合夏季食用的。这次还是没有用黄油，因为等融化嫌麻烦，继续用了橄榄油。不同的是这次用了水浴法烘焙的。我用的模具是八寸的活底蛋糕模具，成品有一点收腰，但口味还挺成功的。只是早上拍照心急得很，因为LG上班比较早。难得他如此喜欢吃了最大的两块。', '鸡蛋、玉米淀粉、绵白糖、白醋、低筋粉、橄榄油、酸奶。', 31),
(6, '【番茄肉酱意大利面】', 25.00, 'p4788.jpg', 'p4788-l.jpg', '听说，台风天，电影和意大利面更配喔汤锅倒水烧开，放一勺盐一勺橄榄油，加入意面，煮13分钟。（意面种类不同，煮的时间也不一样，5-15分钟不等）。煮好的面控水，拌入一勺橄榄油，以防面粘连。平底锅倒油预热，蒜泥炒香，下肉糜翻炒至变色，倒入洋葱丁、番茄丁，翻炒一分钟，放番茄酱、盐、黑胡椒，继续翻炒。肉酱里加热水大火烧开，倒入意面转中火，待意面吸饱汤汁后，关火盛盘。', '意大利面、番茄、洋葱、蒜泥、肉糜、黑胡椒粉、番茄酱、盐', 42),
(7, '【放心油条】', 1.50, 'p7933.jpg', 'p7933-l.jpg', '自己炸的油条不含明矾，也不用担心地沟油，吃的比较放心。准备中筋粉，油条膨松剂和植物油。面粉和膨松剂混合均匀，加入50-60度温水搅拌。揉成光滑的面团，盖上保鲜膜醒30分钟左右。将醒发好的面团切成长形小剂子，两个叠在一起用筷子按压一下。用手捏住两头抻拉一下，放入7成热（约180-200度）的油锅中炸至金黄即可。', '面粉、安琪油条膨松剂、温水、植物油。', 30),
(8, '【蒸饺】', 12.00, 'p6611.jpg', 'p6611-l.jpg', '昨天突然好想吃蒸饺，但是貌似没听过北京哪家蒸饺好吃，于是决定自己做啦，重要的事最近爱上做饭，能与大家分享美食乐趣也让我又燃起了烹饪的热情。想必最好吃的东西还是自己家的家常便饭！面粉300克，开水100ml左右（这个量可以在和面的时候自己调节下，蒸饺一定是烫面的）鸡蛋一个，我是用面包机和的面团，准备其他馅时一直在醒面（半小时内）。豆角酱肉馅：做法见我的豆角酱肉卤菜谱', '鸡蛋、豆角酱肉馅、西红柿鸡蛋馅、猪生抽、生抽、海鲜酱油、糖、盐', 27),
(9, '【蒸饺】', 12.00, 'p6611.jpg', 'p6611-l.jpg', '昨天突然好想吃蒸饺，但是貌似没听过北京哪家蒸饺好吃，于是决定自己做啦，重要的事最近爱上做饭，能与大家分享美食乐趣也让我又燃起了烹饪的热情。想必最好吃的东西还是自己家的家常便饭！面粉300克，开水100ml左右（这个量可以在和面的时候自己调节下，蒸饺一定是烫面的）鸡蛋一个，我是用面包机和的面团，准备其他馅时一直在醒面（半小时内）。豆角酱肉馅：做法见我的豆角酱肉卤菜谱', '鸡蛋、豆角酱肉馅、西红柿鸡蛋馅、猪生抽、生抽、海鲜酱油、糖、盐', 27),
(15, '【玛格丽特披萨】', 67.00, 'pizza.jpg', 'pizza-l.jpg', '1.小番茄切片；玛兹拉起司刨丝备用。\r\n蕃茄酱汁，洒上适量的玛兹拉起司丝。\r\n3.再作法2的披萨皮上均匀铺上作法1的蕃茄片、罗勒叶和意大利香料粉。\r\n4.烤箱预热200℃，将作法3的披萨放入烤箱烤约12～15分钟即可。', '脆皮披萨面皮', 50);

-- --------------------------------------------------------

--
-- 表的结构 `kf_order`
--

CREATE TABLE `kf_order` (
  `oid` int(11) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `user_name` varchar(16) DEFAULT NULL,
  `sex` char(8) DEFAULT NULL,
  `order_time` mediumtext,
  `addr` varchar(256) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `uid` int(10) NOT NULL,
  `count` int(4) NOT NULL DEFAULT '1',
  `estimate_state` varchar(8) NOT NULL DEFAULT '待评价'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kf_order`
--

INSERT INTO `kf_order` (`oid`, `phone`, `user_name`, `sex`, `order_time`, `addr`, `did`, `uid`, `count`, `estimate_state`) VALUES
(1, '13501234567', '婷婷', '女', '1445154859209', '大钟寺中鼎B座', 3, 1, 1, '已评价'),
(2, '13501234567', '婷婷', '女', '1445254959209', '大钟寺中鼎B座', 2, 1, 1, '已评价'),
(3, '13501234567', '婷婷', '女', '1445354959209', '大钟寺中鼎B座', 5, 1, 1, '已评价'),
(4, '15373782175', '大白鹅', '男', '2018-03-27 11:54:46', '中国某湖', 1, 1, 1, '已评价'),
(5, '15373782175', '大白鹅', '男', '2018-03-28 09:44:42', '中国某湖', 1, 1, 1, '已评价'),
(6, '12345678910', '猪猪侠', '男', '2018-03-28 15:07:05', '中华人民共和国', 14, 2, 1, '已评价'),
(7, '15373782175', '大白鹅', '男', '2018-04-02 13:42:18', '中国某湖', 1, 1, 1, '待评价'),
(8, '15373782175', '大白鹅', '男', '2018-04-02 15:49:53', '中国某湖', 0, 1, 1, '待评价');

-- --------------------------------------------------------

--
-- 表的结构 `user_message`
--

CREATE TABLE `user_message` (
  `uid` int(10) NOT NULL,
  `username` varchar(4) NOT NULL,
  `userpwd` varchar(10) NOT NULL,
  `sex` char(4) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `face` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `register_time` datetime NOT NULL,
  `last_time` datetime NOT NULL,
  `last_ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_message`
--

INSERT INTO `user_message` (`uid`, `username`, `userpwd`, `sex`, `phone`, `face`, `address`, `register_time`, `last_time`, `last_ip`) VALUES
(1, '大白鹅', '123456', '女', 15373782175, 'img/m06.gif', '中国某湖', '2018-03-27 11:40:30', '2018-04-02 15:26:01', '::1'),
(2, '猪猪侠', '123456', '男', 12345678910, 'img/m03.gif', '中华人民共和国', '2018-03-28 15:05:45', '2018-04-04 09:10:06', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `estimate`
--
ALTER TABLE `estimate`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `kf_dish`
--
ALTER TABLE `kf_dish`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `kf_order`
--
ALTER TABLE `kf_order`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 使用表AUTO_INCREMENT `estimate`
--
ALTER TABLE `estimate`
  MODIFY `eid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `kf_dish`
--
ALTER TABLE `kf_dish`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `kf_order`
--
ALTER TABLE `kf_order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `user_message`
--
ALTER TABLE `user_message`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
