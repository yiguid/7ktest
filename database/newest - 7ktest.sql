-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 06 月 13 日 16:02
-- 服务器版本: 5.5.29-log
-- PHP 版本: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 数据库: `7ktest`
--

-- --------------------------------------------------------

--
-- 表的结构 `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('9e3c1c18d59d828f2c77879f843315ed', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) AppleWebKit/536.29.13 (KHTML, like Gecko) Version/6.0.4 Safari/536.29.13', 1371127771, 'a:16:{s:9:"user_data";s:0:"";s:2:"id";s:1:"2";s:8:"username";s:4:"test";s:8:"nickname";s:12:"测试用户";s:11:"user_mobile";s:11:"18611728343";s:13:"user_province";s:9:"北京市";s:9:"user_city";s:9:"海淀区";s:12:"user_address";s:38:"学院路37号北京航空航天大学";s:12:"user_receipt";s:24:"北京航空航天大学";s:12:"user_zipcode";s:6:"100191";s:13:"user_receiver";s:6:"顾毅";s:10:"user_money";s:4:"5836";s:5:"level";s:1:"1";s:9:"user_type";s:4:"user";s:10:"printer_id";s:1:"1";s:12:"printer_name";s:16:" 北航打印店";}'),
('d1a1e044425759e633bdbcc4481a543c', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371132062, 'a:18:{s:9:"user_data";s:0:"";s:2:"id";s:1:"2";s:8:"username";s:4:"test";s:8:"nickname";s:12:"测试用户";s:11:"user_mobile";s:11:"18611728343";s:13:"user_province";s:9:"北京市";s:9:"user_city";s:9:"海淀区";s:12:"user_address";s:38:"学院路37号北京航空航天大学";s:12:"user_receipt";s:24:"北京航空航天大学";s:12:"user_zipcode";s:6:"100191";s:13:"user_receiver";s:6:"顾毅";s:10:"user_money";i:100000;s:5:"level";s:1:"1";s:9:"user_type";s:4:"user";s:10:"printer_id";s:1:"1";s:12:"printer_name";s:16:" 北航打印店";s:11:"printtaskid";i:77;s:13:"cart_contents";a:3:{s:32:"1adfba0cbf372d7f1ecf050fba2f9ad4";a:7:{s:5:"rowid";s:32:"1adfba0cbf372d7f1ecf050fba2f9ad4";s:2:"id";i:117;s:3:"qty";s:1:"3";s:5:"price";s:13:"10.6666666667";s:4:"name";s:12:"kongjian.png";s:7:"options";a:4:{s:9:"papersize";s:2:"A4";s:12:"isdoubleside";s:6:"单面";s:5:"range";s:1:"1";s:10:"zhuangding";s:6:"普通";}s:8:"subtotal";d:32.0000000001000017846308765001595020294189453125;}s:11:"total_items";i:3;s:10:"cart_total";d:32.0000000001000017846308765001595020294189453125;}}');

-- --------------------------------------------------------

--
-- 表的结构 `delivertask`
--

CREATE TABLE `delivertask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `printerid` varchar(45) DEFAULT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `printtaskid` varchar(45) DEFAULT NULL,
  `starttime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `keyword` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `uploaduserid` varchar(45) DEFAULT NULL,
  `uploadtime` datetime DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=118 ;

--
-- 转存表中的数据 `document`
--

INSERT INTO `document` (`id`, `name`, `keyword`, `type`, `size`, `url`, `uploaduserid`, `uploadtime`, `page`) VALUES
(117, 'kongjian.png', NULL, NULL, NULL, '5ffe92d2111d2be0d449f9427f00fa94.png', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `favoriteid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '1',
  `content` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `uid` int(11) NOT NULL,
  `pterid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- 表的结构 `printer`
--

CREATE TABLE `printer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `online` varchar(10) DEFAULT NULL,
  `servicestart` time DEFAULT NULL,
  `serviceend` time DEFAULT NULL,
  `notice` varchar(200) DEFAULT NULL,
  `intro` varchar(200) DEFAULT NULL,
  `yewu` text,
  `address` varchar(200) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `printer`
--

INSERT INTO `printer` (`id`, `username`, `password`, `name`, `location`, `level`, `online`, `servicestart`, `serviceend`, `notice`, `intro`, `yewu`, `address`, `contact`) VALUES
(1, 'beihang', 'ea8ad40bdd2dd85cd6733c6ac14b1013', '北航打印店', '北京|北航', 1, 'online', '07:00:00', '24:00:00', '长期优惠中噢', '北航资料最全、最便宜、地理位置最优越的打印店', '主营黑白、易拉宝、各种业务', '北京航空航天大学超市发旁', '18611728343'),
(2, 'beiyou', 'ea8ad40bdd2dd85cd6733c6ac14b1013', '北邮打印店', '北京|北邮', 2, 'offline', '08:00:00', '23:00:00', NULL, NULL, NULL, NULL, NULL),
(3, 'beida', 'ea8ad40bdd2dd85cd6733c6ac14b1013', '北大打印店', '北京|北大', 1, 'online', '07:00:00', '23:00:00', NULL, NULL, NULL, NULL, NULL),
(4, 'shangda', 'ea8ad40bdd2dd85cd6733c6ac14b1013', '上大打印店', '上海|上大', 1, 'online', '07:00:00', '23:00:00', NULL, NULL, NULL, NULL, NULL),
(5, 'fudan', 'ea8ad40bdd2dd85cd6733c6ac14b1013', '复旦打印店', '上海|复旦', 5, 'online', '07:00:00', '23:00:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `printer_meta`
--

CREATE TABLE `printer_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `printerid` int(11) NOT NULL,
  `papersize` varchar(200) NOT NULL DEFAULT 'A4,1|B5,0.8',
  `isdoubleside` varchar(200) NOT NULL DEFAULT '单面,1|双面,1',
  `zhuangding` varchar(200) NOT NULL DEFAULT '普通,1|精装,2',
  `price` float NOT NULL DEFAULT '0.5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `printer_meta`
--

INSERT INTO `printer_meta` (`id`, `printerid`, `papersize`, `isdoubleside`, `zhuangding`, `price`) VALUES
(1, 1, 'A3,2|A4,1|B5,0.8', '单面,1|双面,1|小册子,0.5', '书夹,1|普通,2|精装,5', 10),
(2, 2, 'A4,1|B5,0.8', '单面,1|双面,1|幻灯片,0.5', '普通,2|精装,5', 20),
(3, 3, 'A4,1|B5,0.8', '单面,1|双面,1', '普通,2|精装,5', 10),
(4, 4, 'A1,4|A2,3|A3,2|A4,1|B5,0.8', '单面,1|双面,1', '普通,2|精装,5', 10),
(5, 5, 'A4,1|B5,0.8', '单面,1|双面,1', '普通,2|精装,5', 10);

-- --------------------------------------------------------

--
-- 表的结构 `printer_prop`
--

CREATE TABLE `printer_prop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `printerid` int(11) NOT NULL,
  `propertyid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `printtask`
--

CREATE TABLE `printtask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) DEFAULT NULL,
  `printerid` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `method` varchar(45) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  `finishtime` datetime DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `delivertime` datetime DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `receipt` varchar(45) DEFAULT NULL,
  `receiver` varchar(45) DEFAULT NULL COMMENT ' ',
  `zipcode` varchar(45) DEFAULT NULL,
  `daodianyin` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- 转存表中的数据 `printtask`
--

INSERT INTO `printtask` (`id`, `userid`, `printerid`, `status`, `method`, `createtime`, `finishtime`, `cost`, `address`, `mobile`, `delivertime`, `remark`, `receipt`, `receiver`, `zipcode`, `daodianyin`) VALUES
(77, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `printtasksetting`
--

CREATE TABLE `printtasksetting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `printtaskid` int(11) DEFAULT NULL,
  `documentid` int(11) DEFAULT NULL,
  `papersize` varchar(45) DEFAULT NULL,
  `isdoubleside` varchar(45) DEFAULT NULL,
  `range` varchar(45) DEFAULT NULL,
  `fenshu` int(11) DEFAULT NULL,
  `zhuangding` varchar(45) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=130 ;

--
-- 转存表中的数据 `printtasksetting`
--

INSERT INTO `printtasksetting` (`id`, `printtaskid`, `documentid`, `papersize`, `isdoubleside`, `range`, `fenshu`, `zhuangding`, `cost`) VALUES
(129, 77, 117, 'A4', '单面', '1', 3, '普通', 32);

-- --------------------------------------------------------

--
-- 表的结构 `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `property_value`
--

CREATE TABLE `property_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propertyid` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `destid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `msg` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` text,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `msgid` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `utype` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `specialdoc`
--

CREATE TABLE `specialdoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `keyword` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `uploadpterid` varchar(45) DEFAULT NULL,
  `uploadtime` datetime DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `pterid` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `info` text,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `printtaskid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `transaction`
--

INSERT INTO `transaction` (`id`, `userid`, `pterid`, `time`, `info`, `amount`, `status`, `printtaskid`) VALUES
(21, 2, NULL, '2013-06-13 15:19:04', '充值卡充值', 100000, '充值成功', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `nickname` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `receiver` varchar(45) DEFAULT NULL,
  `receipt` varchar(45) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `nickname`, `password`, `email`, `mobile`, `province`, `city`, `address`, `zipcode`, `receiver`, `receipt`, `level`) VALUES
(1, 'guyi', '顾毅', 'ea8ad40bdd2dd85cd6733c6ac14b1013', 'test@7test.com', '18611728343', '北京市', '海淀区', '北京航空航天大学', NULL, NULL, NULL, 99),
(2, 'test', '测试用户', 'ea8ad40bdd2dd85cd6733c6ac14b1013', 'test@7test.com', '18611728343', '北京市', '海淀区', '学院路37号北京航空航天大学', '100191', '顾毅', '北京航空航天大学', 1),
(3, 'test1', '测试用户1', 'ea8ad40bdd2dd85cd6733c6ac14b1013', 'test1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'test0508', '测试用户', 'ea8ad40bdd2dd85cd6733c6ac14b1013', 'new1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'nobitagu', 'nobitagu', 'ea8ad40bdd2dd85cd6733c6ac14b1013', 'nobitagu@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
