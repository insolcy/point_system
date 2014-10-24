-- phpMyAdmin SQL Dump
-- version 4.2.0
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-10-24 10:18:38
-- 服务器版本： 5.6.17
-- PHP Version: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `point_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
`id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `score` int(11) DEFAULT '0',
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `answer`
--

INSERT INTO `answer` (`id`, `user_id`, `score`, `time`) VALUES
(7, '0', 0, '2014-05-21 07:09:55'),
(8, '0', 0, '2014-05-21 07:10:15'),
(9, '1', 0, '2014-05-21 07:12:08'),
(10, '1', 0, '2014-05-21 07:12:35'),
(11, '1', 0, '2014-05-21 07:13:35'),
(12, '1', 0, '2014-05-21 07:14:00'),
(13, '102448', 0, '2014-05-21 07:15:21'),
(14, '102448', 1, '2014-05-21 07:17:50'),
(15, '102448', 1, '2014-05-21 07:18:31'),
(16, '10086', 1, '2014-05-22 12:56:29');

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `cart_count` int(11) DEFAULT '1',
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pro_id`, `cart_count`, `status`) VALUES
(1, '102448', 1, 3, 0),
(2, '102448', 2, 1, 0),
(3, '102448', 10, 1, 0),
(4, '102448', 4, 1, 0),
(8, '10086', 1, 2, 1),
(9, '10086', 2, 1, 1),
(10, '10086', 5, 1, 1),
(11, '10086', 4, 2, 1),
(12, '10086', 3, 3, 1),
(13, '10086', 10, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(45) DEFAULT NULL,
  `cate_content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_content`) VALUES
(1, 'riyongbaihuo', '日用百货'),
(2, 'shumadianzi', '数码电子'),
(3, 'shenghuodianqi', '生活电器'),
(4, 'bangongyongpin', '办公用品'),
(5, 'yundongqicai', '运动器材');

-- --------------------------------------------------------

--
-- 表的结构 `lottery`
--

CREATE TABLE IF NOT EXISTS `lottery` (
`id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `lottery`
--

INSERT INTO `lottery` (`id`, `user_id`, `pro_id`, `time`) VALUES
(9, '102448', 48, '2014-05-21 08:34:46'),
(10, '102448', 52, '2014-05-21 15:04:03'),
(11, '102448', 56, '2014-05-21 15:04:32'),
(12, '10086', 48, '2014-05-22 12:50:29'),
(13, '10086', 56, '2014-05-22 12:57:01'),
(14, '10086', 51, '2014-05-22 12:57:39'),
(15, '10086', 51, '2014-05-22 12:57:45'),
(16, '10086', 51, '2014-05-22 12:58:31'),
(17, '10086', 51, '2014-05-22 12:58:46'),
(18, '10086', 51, '2014-05-22 12:59:16'),
(19, '10086', 51, '2014-05-22 12:59:29'),
(20, '10086', 51, '2014-05-22 12:59:46'),
(21, '10086', 51, '2014-05-22 13:00:11'),
(22, '10086', 51, '2014-05-22 13:00:19'),
(23, '10086', 53, '2014-05-22 13:10:58'),
(24, '10086', 46, '2014-05-22 13:11:28'),
(25, '10086', 51, '2014-05-22 13:12:49'),
(26, '10086', 51, '2014-05-22 13:13:06'),
(27, '10086', 50, '2014-05-22 13:13:24'),
(28, '10086', 59, '2014-10-09 14:58:17'),
(29, '10086', 50, '2014-10-13 14:34:29');

-- --------------------------------------------------------

--
-- 表的结构 `oauth`
--

CREATE TABLE IF NOT EXISTS `oauth` (
`id` int(11) NOT NULL,
  `source` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `oauth`
--

INSERT INTO `oauth` (`id`, `source`) VALUES
(5, 'baidu.com'),
(4, 'baixing.12'),
(3, 'baixing.com'),
(6, 'tengxun.com');

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`pro_id` int(11) NOT NULL,
  `pro_name` varchar(45) DEFAULT NULL,
  `pro_score` double DEFAULT '0',
  `pro_pic` varchar(45) DEFAULT NULL,
  `pro_content` text,
  `pro_cate` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_score`, `pro_pic`, `pro_content`, `pro_cate`) VALUES
(1, '狼图腾', 19.2, 'bgwj11', '草原最后的成吉思汗', 4),
(2, '穆斯林的葬礼', 29, 'bgwj22', '矛盾文学奖经典作品', 4),
(3, '大秦帝国：全新修订版', 372.4, 'bgwj33', '阳谋大争、强势生存的时代战歌', 4),
(4, '三体', 13.8, 'bgwj44', '当代科幻迷必读之作', 4),
(5, '韩寒：1988—我想和这个世界谈谈', 19.2, 'bgwj55', '这本书代表了韩寒小说创作的最高水准', 4),
(6, '繁花', 28.8, 'bgwj66', '2013年度深圳读书月十大好书', 4),
(7, '活着（精）', 16.2, 'bgwj77', '活着', 4),
(8, '北平无战事', 41.3, 'bgwj88', '王牌剧作家刘和平7年心血打磨', 4),
(9, '盗墓笔记', 147.6, 'bgwj99', '盗墓笔记：六周年完美纪念套装', 4),
(10, '王阳明：知行合一', 24.7, 'ryjj11', '为您剖析知行合一的无边威力。', 1),
(11, '鱼羊野史', 23.9, 'ryjj22', '高晓松2014最新力作', 1),
(12, '简明中国历史地图集', 28.8, 'ryjj33', '简明中国历史地图集', 1),
(13, '旧制度与大革命', 35.7, 'ryjj44', '了解法国大革命必读书', 1),
(14, '彩色欧洲史（全三卷）', 44.6, 'ryjj55', '彩纷呈的千年“欧洲路”', 1),
(15, '第三帝国的兴亡', 78.6, 'ryjj66', '第三帝国的兴亡', 1),
(16, '三国史话', 22.6, 'ryjj77', '三国史话', 1),
(17, '明朝十六帝', 28.6, 'ryjj88', '明朝十六帝', 1),
(18, '皇权与绅权', 14.8, 'ryjj99', '皇权与绅权', 1),
(19, '鲁迅作品精选集', 29.8, 'shdq11', '一代文豪最负盛名的传世佳作', 3),
(20, '野夫畅销套装', 38.4, 'shdq22', '追忆共和国历史上唯一的青春年代', 3),
(21, '文化苦旅', 35.9, 'shdq33', '余秋雨近三十年文化大散文集大成之作', 3),
(22, '恰到好处的幸福', 19.7, 'shdq44', '毕淑敏2014年最新作品', 3),
(23, '季羡林读书与做人', 16, 'shdq55', '季羡林生前最后一部授权作品', 3),
(24, '瓦尔登湖', 14, 'shdq66', '当代美国读者最多的散文经典', 3),
(25, '人生不过如此', 15, 'shdq77', '林语堂先生经典人生散文首次结集出版', 3),
(26, '目送', 23.4, 'shdq88', '龙应台大作', 3),
(27, '一楣月下窗', 19.2, 'shdq99', '修合无人见，存心有天知', 3),
(28, '微信，这么玩才赚钱', 33.7, 'smdz11', '微信应用之道', 2),
(29, '疯狂Android讲义', 59.4, 'smdz22', '卖疯了的Android畅销书', 2),
(30, '和秋叶一起学PPT', 330, 'smdz33', '买了绝对不后悔的ppt制作教程', 2),
(31, 'php和mysql web开发', 65.6, 'smdz44', 'php和mysql web开发', 2),
(32, 'MATLAB R2012a 完全自学一本通', 47.9, 'smdz55', 'MATLAB用户选择为入门书', 2),
(33, 'Python核心编程', 61.4, 'smdz66', 'python基础教程指南', 2),
(34, '谁说菜鸟不会数据分析', 29.4, 'smdz77', '轻松学会数据分析', 2),
(35, '黑客与画家', 33.8, 'smdz88', '具有超凡影响力的精品图书', 2),
(36, 'Excel效率手册', 24.2, 'smdz99', '两大论坛Excel版主7年经验毫无保留', 2),
(37, '林徽因精选集', 14.5, 'hwyd11', '全面了解一代才女的作品和性灵', 5),
(38, '莎士比亚全集', 124, 'hwyd22', '朱生豪译本', 5),
(39, '元曲三百首（插图本）', 12, 'hwyd33', '权威校本、无障碍阅读全新增订版', 5),
(40, '唐诗宋词元曲大全集', 107.4, 'hwyd44', '对最美古诗词的一次集中梳理', 5),
(41, '唐诗宋词元曲鉴赏', 167.7, 'hwyd55', '精装全4册', 5),
(42, '诺贝尔文学奖大师作品精选', 17.5, 'hwyd66', '诺贝尔文学奖大师作品精选', 5),
(43, '燕巢与花事', 9.6, 'hwyd77', '苏枕书最新力作', 5),
(44, '人间词话全编', 12.5, 'hwyd88', '古典文学鉴赏必读', 5),
(45, '德库拉', 8.6, 'hwyd99', '德库拉', 5),
(46, '抽奖商品1', 0, '1.jpg', NULL, 0),
(47, '抽奖商品2', 0, '2.jpg', NULL, 0),
(48, '抽奖商品3', 0, '3.jpg', NULL, 0),
(49, '抽奖商品4', 0, '4.jpg', NULL, 0),
(50, '抽奖商品5', 0, '5.jpg', NULL, 0),
(51, '抽奖商品6', 0, '6.jpg', NULL, 0),
(52, '抽奖商品7', 0, '7.jpg', NULL, 0),
(53, '抽奖商品8', 0, '8.jpg', NULL, 0),
(54, '抽奖商品9', 0, '9.jpg', NULL, 0),
(55, '抽奖商品10', 0, '10.jpg', NULL, 0),
(56, '抽奖商品11', 0, '11.jpg', NULL, 0),
(57, '抽奖商品12', 0, '12.jpg', NULL, 0),
(58, '抽奖商品13', 0, '13.jpg', NULL, 0),
(59, '抽奖商品14', 0, '14.jpg', NULL, 0),
(60, '抽奖商品15', 0, '15.jpg', NULL, 0),
(61, '抽奖商品16', 0, '16.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `user_score1` int(11) DEFAULT '0',
  `user_content` varchar(45) DEFAULT NULL,
  `user_passwd` varchar(32) NOT NULL,
  `user_score2` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_score1`, `user_content`, `user_passwd`, `user_score2`) VALUES
(3, '1', 0, NULL, '2', 0),
(4, '102448', 40, NULL, '102448102448', 0),
(5, 'root', 0, NULL, 'root', 0),
(6, '18801791737', 0, NULL, '102448102448', 0),
(7, '188017917372', 30, NULL, '9a18a6e763d454ce45d2071df1f4ee5b', 10),
(8, '10086', 100, NULL, '6412121cbb2dc2cb9e460cfee7046be2', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `lottery`
--
ALTER TABLE `lottery`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `oauth`
--
ALTER TABLE `oauth`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD UNIQUE KEY `source_UNIQUE` (`source`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`pro_id`), ADD UNIQUE KEY `pro_id_UNIQUE` (`pro_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `lottery`
--
ALTER TABLE `lottery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `oauth`
--
ALTER TABLE `oauth`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
