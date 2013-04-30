-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 30 日 17:12
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
('eeedca92d84631a86cdccce4a11acf5b', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.65 Safari/537.31', 1367334548, 'a:19:{s:9:"user_data";s:0:"";s:9:"printshop";s:5:"beida";s:8:"location";s:0:"";s:2:"id";s:1:"2";s:8:"username";s:4:"test";s:8:"nickname";s:12:"测试用户";s:11:"user_mobile";s:11:"18611728343";s:13:"user_province";s:9:"北京市";s:9:"user_city";s:9:"海淀区";s:12:"user_address";s:38:"学院路37号北京航空航天大学";s:12:"user_receipt";N;s:12:"user_zipcode";s:6:"100191";s:13:"user_receiver";s:6:"顾毅";s:5:"level";s:1:"1";s:9:"user_type";s:4:"user";s:12:"printer_name";s:15:"北大打印店";s:10:"printer_id";s:1:"3";s:11:"printtaskid";s:1:"0";s:11:"upload_docs";s:0:"";}');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `delivertask`
--

INSERT INTO `delivertask` (`id`, `printerid`, `userid`, `printtaskid`, `starttime`, `endtime`, `status`, `comment`) VALUES
(1, '1', '1', '1', '2013-01-24 19:30:00', '2013-01-24 19:35:00', '已送达', '很快很好');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- 转存表中的数据 `document`
--

INSERT INTO `document` (`id`, `name`, `keyword`, `type`, `size`, `url`, `uploaduserid`, `uploadtime`, `page`) VALUES
(1, '数学分析', '数学', '书', '100k', '', '2', '2013-01-24 18:00:00', 100),
(2, '物理学', '物理', '书', '100k', '', '2', '2013-01-24 18:00:00', 80),
(84, 'paper.pdf', NULL, NULL, NULL, 'cc8dac01cf11d5dda48b4bc6fa6afd7e.pdf', '2', NULL, NULL),
(83, 'Performance_of_Recommender_Algorithms_on_Top-N_Recommendation_Tasks.pdf', NULL, NULL, NULL, 'deb45f354b91300c1bc6984d1a0e6dc2.pdf', '2', NULL, NULL),
(81, 'paper.pdf', NULL, NULL, NULL, '3d1da039d095193d5da08f30d6865251.pdf', '2', NULL, NULL),
(82, 'paper.pdf', NULL, NULL, NULL, '768426577cf7c0d6745f73a7cb93adf0.pdf', '2', NULL, NULL),
(80, '中文测试副本中文测试副本中文测试副本中文测试副本中文测试副本.pdf', NULL, NULL, NULL, 'b9e68283ee52d4ff4c26fda925180e25.pdf', '2', NULL, NULL),
(79, '中文测试副本中文测试副本中文测试副本中文测试副本中文测试副本.pdf', NULL, NULL, NULL, '03becdcae1489f5ca9942b05d2ef3124.pdf', '2', NULL, NULL),
(78, 'paper.pdf', NULL, NULL, NULL, '25902359c63259e9dc4a1feb0827777a.pdf', '2', NULL, NULL),
(76, 'paper.pdf', NULL, NULL, NULL, 'f1d2a3cb33b317f65e44f83b59278784.pdf', '2', NULL, NULL),
(77, 'paper.pdf', NULL, NULL, NULL, '2fea02f4ef37d361684d4018740e3389.pdf', '2', NULL, NULL),
(75, '中文测试副本中文测试副本中文测试副本中文测试副本中文测试副本.pdf', NULL, NULL, NULL, 'b6e3fe77a4dbfdede560339901cbdd87.pdf', '2', NULL, NULL),
(72, '0a554cc1e639f7e52eb8dbada2400fc9.pdf', NULL, NULL, NULL, '0a554cc1e639f7e52eb8dbada2400fc9.pdf', '2', NULL, NULL),
(73, 'c09c30bd9ef5dc3057fa24d704284498.pdf', NULL, NULL, NULL, 'c09c30bd9ef5dc3057fa24d704284498.pdf', '2', NULL, NULL),
(74, '97ff68529a58141760069225a3c2850a.pdf', NULL, NULL, NULL, '97ff68529a58141760069225a3c2850a.pdf', '2', NULL, NULL),
(70, '中文测试副本中文测试副本中文测试副本中文测试副本中文测试副本.pdf', NULL, NULL, NULL, '中文测试副本中文测试副本中文测试副本中文测试副本中文测试副本.pdf', '2', NULL, NULL),
(65, 'paper6.pdf', NULL, NULL, NULL, 'paper6.pdf', '2', NULL, NULL),
(66, 'paper7.pdf', NULL, NULL, NULL, 'paper7.pdf', '2', NULL, NULL),
(67, 'MATRIX4.pdf', NULL, NULL, NULL, 'MATRIX4.pdf', '2', NULL, NULL),
(68, 'paper8.pdf', NULL, NULL, NULL, 'paper8.pdf', '2', NULL, NULL),
(63, 'MATRIX3.pdf', NULL, NULL, NULL, 'MATRIX3.pdf', '2', NULL, NULL),
(64, 'paper5.pdf', NULL, NULL, NULL, 'paper5.pdf', '2', NULL, NULL),
(61, 'paper3.pdf', NULL, NULL, NULL, 'paper3.pdf', '2', NULL, NULL),
(62, 'paper4.pdf', NULL, NULL, NULL, 'paper4.pdf', '2', NULL, NULL),
(55, 'MATRIX1.pdf', NULL, NULL, NULL, 'MATRIX1.pdf', '2', NULL, NULL),
(56, 'Advances_in_Collaborative_Filtering1.pdf', NULL, NULL, NULL, 'Advances_in_Collaborative_Filtering1.pdf', '2', NULL, NULL),
(57, 'Collaborative_Filtering_with_Temporal_Dynamics6.pdf', NULL, NULL, NULL, 'Collaborative_Filtering_with_Temporal_Dynamics6.pdf', '2', NULL, NULL),
(58, 'paper1.pdf', NULL, NULL, NULL, 'paper1.pdf', '2', NULL, NULL),
(59, 'paper2.pdf', NULL, NULL, NULL, 'paper2.pdf', '2', NULL, NULL),
(60, 'MATRIX2.pdf', NULL, NULL, NULL, 'MATRIX2.pdf', '2', NULL, NULL),
(85, 'paper.pdf', NULL, NULL, NULL, '495a7487dfa2fed17620904f12b496d8.pdf', '2', NULL, NULL),
(86, 'paper.pdf', NULL, NULL, NULL, '2910ad379b83f8d7db3c1e803f5c805f.pdf', '2', NULL, NULL),
(87, 'paper.pdf', NULL, NULL, NULL, '2977eb80aad9337b789ba2b452fabb89.pdf', '2', NULL, NULL),
(88, 'MATRIX.pdf', NULL, NULL, NULL, 'e2baa6097e36854e826387fd815ee070.pdf', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '1',
  `content` text CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `type`, `content`, `date`, `time`, `uid`) VALUES
(3, 1, '测试留言1', '2013-03-22', '15:01:32', 2),
(4, 2, '测试留言2', '2013-03-22', '15:01:37', 2),
(5, 3, '测试留言3', '2013-03-22', '15:01:42', 2),
(6, 4, '测试留言4', '2013-03-22', '15:01:47', 2),
(7, 1, 'test1', '2013-03-22', '16:21:13', 2),
(8, 1, 'test2', '2013-03-22', '16:21:16', 2),
(9, 1, 'test3', '2013-03-22', '16:21:20', 2),
(10, 1, 'test4', '2013-03-22', '16:21:24', 2),
(11, 1, 'test5', '2013-03-22', '16:21:29', 2),
(12, 1, 'test6', '2013-03-22', '16:21:34', 2),
(13, 1, 'test7', '2013-03-22', '16:21:41', 2);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `printer`
--

INSERT INTO `printer` (`id`, `username`, `password`, `name`, `location`, `level`, `online`, `servicestart`, `serviceend`, `notice`, `intro`, `yewu`) VALUES
(1, 'beihang', '123456', '北航打印店', '北航|北京', 1, 'online', '07:00:00', '24:00:00', NULL, NULL, NULL),
(2, 'beiyou', '123456', '北邮打印店', '北邮|北京', 2, 'offline', '08:00:00', '23:00:00', NULL, NULL, NULL),
(3, 'beida', '123456', '北大打印店', '北大|北京', 1, 'online', '07:00:00', '23:00:00', NULL, NULL, NULL),
(4, 'shangda', '123456', '上大打印店', '上大|上海', 1, 'online', '07:00:00', '23:00:00', NULL, NULL, NULL),
(5, 'fudan', '123456', '复旦打印店', '复旦|上海', 5, 'online', '07:00:00', '23:00:00', NULL, NULL, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- 转存表中的数据 `printtask`
--

INSERT INTO `printtask` (`id`, `userid`, `printerid`, `status`, `method`, `createtime`, `finishtime`, `cost`, `address`, `mobile`, `delivertime`, `remark`, `receipt`, `receiver`, `zipcode`, `daodianyin`) VALUES
(1, '2', '1', '打印完成', '普通', '2013-01-24 19:00:00', '2013-01-24 19:10:00', 90, '北航办公楼', '18611728342', '2013-01-24 19:10:00', '尽快啊', '北京航空航天大学', NULL, NULL, NULL),
(51, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '2', '1', '打印中', 'self', '2013-04-08 17:14:18', NULL, 2, '北京市海淀区北京航空航天大学', '18611728343', '2013-04-04 09:45:15', '', '北京航空航天大学', NULL, NULL, NULL),
(50, '2', '1', '打印中', 'self', '2013-04-16 16:00:34', NULL, 7, '北京市海淀区北京航空航天大学', '18611728343', '2013-04-17 21:55:51', '无', '北京航空航天大学', NULL, NULL, NULL),
(48, '2', '1', '打印中', 'self', '2013-04-08 17:12:31', NULL, 2, '北京市海淀区北京航空航天大学', '18611728343', '2013-04-08 08:40:26', '', '北京航空航天大学', NULL, NULL, NULL),
(47, '2', '1', '打印中', 'self', '2013-04-08 17:11:33', NULL, 2, '北京市海淀区北京航空航天大学', '18611728343', '2013-04-08 23:11:31', '无', '北京航空航天大学', NULL, NULL, NULL),
(46, '2', '1', '打印完成', 'self', '2013-04-03 14:26:54', '2013-04-03 14:28:26', 41, '北京市海淀区北京航空航天大学', '18611728343', '2013-04-03 20:25:43', '', '北京航空航天大学', NULL, NULL, NULL),
(45, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '2', '2', '打印中', 'self', '2013-04-02 15:07:46', NULL, 25, '无', '7110', '2013-04-02 04:20:35', '无', '北京航空航天大学', NULL, NULL, NULL),
(40, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2', '5', '打印中', 'self', '2013-03-31 16:10:21', NULL, 25, '无', '7110', '2013-03-30 22:50:08', '无', '北京航空航天大学', NULL, NULL, NULL),
(52, '2', '1', '打印完成', 'self', '2013-04-27 15:59:27', '2013-04-27 16:30:02', 7, '北京市海淀区学院路37号北京航空航天大学', '18611728343', '1970-01-01 01:00:00', '快点啦', '不需要', '0', '100191', 'on'),
(53, '2', '1', '打印中', 'express', '2013-04-27 16:13:21', NULL, 4, '北京市海淀区学院路37号北京航空航天大学', '18611728343', '2013-04-28 22:30:05', '快点啦', '北京航空航天大学', '0', '100191', '0'),
(54, '2', '1', '打印中', 'self', '2013-04-30 11:25:15', NULL, 12, '北京市海淀区学院路37号北京航空航天大学', '18611728343', '1970-01-01 01:00:00', '不需要', '北京航空航天大学', '0', '100191', 'on'),
(55, '2', '3', '打印中', 'campus', '2013-04-30 17:10:32', NULL, 214, '北京市海淀区学院路37号北京航空航天大学', '18611728343', '2013-04-30 23:30:11', '快快快，考试了', '北京航空航天大学', '0', '100191', '0');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- 转存表中的数据 `printtasksetting`
--

INSERT INTO `printtasksetting` (`id`, `printtaskid`, `documentid`, `papersize`, `isdoubleside`, `range`, `fenshu`, `zhuangding`, `cost`) VALUES
(1, 1, 1, 'A4', '1', '1-100', 2, '普通', 50),
(55, 34, 59, 'A4', '0', '1-10', 5, '精装', 27),
(56, 35, 60, 'A4', '0', '1-10', 5, '普通', 25),
(57, 36, 61, 'A4', '0', '1-10', 5, '普通', 25),
(58, 37, 62, 'A4', '0', '1-10', 5, '普通', 25),
(59, 38, 63, 'A4', '0', '1-10', 5, '普通', 25),
(60, 39, 64, 'A4', '0', '1-10', 1, '普通', 5),
(61, 40, 65, 'A4', '0', '1-10', 5, '普通', 25),
(62, 41, 66, 'A4', '0', '1-10', 5, '普通', 25),
(63, 42, 67, 'A4', '0', '1-10', 5, '普通', 25),
(64, 43, 68, 'A4', '0', '1-10', 5, '普通', 25),
(66, 45, 70, 'A4', '0', '1-10', 1, '普通', 7),
(68, 45, 72, 'A4', '单面', '1-10', 1, '普通', 7),
(69, 45, 73, 'A4', '单面', '1-10', 1, '普通', 7),
(70, 45, 74, 'A3', '小册子', '1-10', 1, '精装', 10),
(71, 46, 75, 'A4', '单面', '1-10', 1, '普通', 7),
(72, 46, 76, 'A4', '单面', '1-10', 1, '普通', 7),
(73, 46, 77, 'A4', '单面', '1-10', 1, '普通', 7),
(74, 46, 78, 'A4', '单面', '1-10', 1, '普通', 7),
(75, 46, 79, 'A4', '单面', '1-10', 1, '普通', 7),
(76, 46, 80, 'A4', '单面', '1-10', 5, '普通', 27),
(77, 47, 81, 'A4', '单面', '1', 1, '普通', 2.5),
(78, 48, 82, 'A4', '单面', '1', 1, '普通', 2.5),
(79, 49, 83, 'A4', '单面', '1', 1, '普通', 2.5),
(80, 50, 84, 'A4', '单面', '1-10', 1, '普通', 7),
(81, 51, 85, 'A4', '单面', '1-10', 1, '普通', 6),
(82, 52, 86, 'A4', '单面', '1', 5, '精装', 7.5),
(83, 53, 87, 'B5', '小册子', '1-10', 1, '普通', 4),
(84, 54, 81, 'A4', '单面', '1-5', 2, '普通', 7),
(85, 54, 82, 'B5', '小册子', '1', 1, '精装', 5.2),
(86, 55, 81, 'A4', '单面', '1-5', 1, '普通', 52),
(87, 55, 88, 'B5', '双面', '1-10', 2, '普通', 162);

-- --------------------------------------------------------

--
-- 表的结构 `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` text CHARACTER SET utf8,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `msgid` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `reply`
--

INSERT INTO `reply` (`id`, `uid`, `content`, `date`, `time`, `msgid`, `floor`) VALUES
(1, 2, '回复测试1', '2013-03-22', '15:01:57', 6, 1),
(2, 2, '回复1', '2013-03-22', '16:21:52', 13, 1),
(3, 2, '回复2', '2013-03-22', '16:22:37', 13, 2),
(4, 2, '回复啦', '2013-03-23', '13:06:41', 5, 1);

-- --------------------------------------------------------

--
-- 表的结构 `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `info` text,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `printtaskid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `transaction`
--

INSERT INTO `transaction` (`id`, `userid`, `time`, `info`, `amount`, `status`, `printtaskid`) VALUES
(1, '2', '2013-04-16 15:16:03', '充值卡充值', 100, '充值成功', NULL),
(2, '2', '2013-04-16 15:16:52', '充值卡充值', 50, '充值成功', NULL),
(3, '2', '2013-04-16 15:16:52', '打印消费', -25, '付款成功', 35),
(4, '2', '2013-04-16 16:00:34', '打印消费', -7, '付款成功', 50),
(5, '2', '2013-04-19 18:29:07', '充值卡充值', 100, '充值成功', NULL),
(6, '2', '2013-04-27 15:59:27', '打印消费', -7, '付款成功', 52),
(7, '2', '2013-04-27 16:13:21', '打印消费', -4, '付款成功', 53),
(8, '2', '2013-04-27 16:14:57', '打印消费', -4, '付款成功', 0),
(9, '2', '2013-04-30 11:25:15', '打印消费', -12, '付款成功', 54),
(10, '2', '2013-04-30 17:09:33', '充值卡充值', 50, '充值成功', NULL),
(11, '2', '2013-04-30 17:10:32', '打印消费', -214, '付款成功', 55);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `nickname`, `password`, `email`, `mobile`, `province`, `city`, `address`, `zipcode`, `receiver`, `receipt`, `level`) VALUES
(1, 'guyi', '顾毅', '123456', 'test@7test.com', '18611728343', '北京市', '海淀区', '北京航空航天大学', NULL, NULL, NULL, 99),
(2, 'test', '测试用户', '123456', 'test@7test.com', '18611728343', '北京市', '海淀区', '学院路37号北京航空航天大学', '100191', '顾毅', NULL, 1),
(9, 'test1', '测试用户1', '123456', 'test1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
