-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 03 月 16 日 13:37
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
('481152f52d2c7c38c9b026ad15b20c7d', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.57 Safari/537.1', 1363434072, ''),
('6d13ffbbd9dc8f525a097b7033ceecc8', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.57 Safari/537.1', 1363183034, 'a:8:{s:9:"user_data";s:0:"";s:2:"id";s:1:"2";s:8:"username";s:4:"test";s:8:"nickname";s:12:"测试用户";s:5:"level";s:1:"1";s:9:"user_type";s:4:"user";s:11:"upload_docs";s:0:"";s:11:"printtaskid";s:1:"0";}'),
('8d90caa68dafd7f82e6d25012944f040', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.57 Safari/537.1', 1363435590, ''),
('b7c6308d21e940e7ba63f967929c181b', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.57 Safari/537.1', 1363272055, 'a:8:{s:9:"user_data";s:0:"";s:2:"id";s:1:"2";s:8:"username";s:4:"test";s:8:"nickname";s:12:"测试用户";s:5:"level";s:1:"1";s:9:"user_type";s:4:"user";s:11:"upload_docs";s:0:"";s:11:"printtaskid";s:1:"0";}');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- 转存表中的数据 `document`
--

INSERT INTO `document` (`id`, `name`, `keyword`, `type`, `size`, `url`, `uploaduserid`, `uploadtime`, `page`) VALUES
(1, '数学分析', '数学', '书', '100k', '', '2', '2013-01-24 18:00:00', 100),
(2, '物理学', '物理', '书', '100k', '', '2', '2013-01-24 18:00:00', 80),
(41, 'Matrix_Factorization_and_Neighbor_Based_Algor', NULL, NULL, NULL, 'Matrix_Factorization_and_Neighbor_Based_Algorithms_for_the_Netflix_Prize_Problem.pdf', '2', NULL, NULL),
(39, 'MATRIX.pdf', NULL, NULL, NULL, 'MATRIX.pdf', '2', NULL, NULL),
(40, 'Collaborative_Filtering_with_Temporal_Dynamic', NULL, NULL, NULL, 'Collaborative_Filtering_with_Temporal_Dynamics1.pdf', '2', NULL, NULL),
(38, 'Collaborative_Filtering_with_Temporal_Dynamic', NULL, NULL, NULL, 'Collaborative_Filtering_with_Temporal_Dynamics.pdf', '2', NULL, NULL),
(37, 'Improved_Neighborhood-based_Collaborative_Fil', NULL, NULL, NULL, 'Improved_Neighborhood-based_Collaborative_Filtering2.pdf', '2', NULL, NULL),
(36, 'Improved_Neighborhood-based_Collaborative_Fil', NULL, NULL, NULL, 'Improved_Neighborhood-based_Collaborative_Filtering1.pdf', '2', NULL, NULL),
(35, 'Improved_Neighborhood-based_Collaborative_Fil', NULL, NULL, NULL, 'Improved_Neighborhood-based_Collaborative_Filtering.pdf', '2', NULL, NULL),
(42, 'Collaborative_Filtering_with_Temporal_Dynamics2.pdf', NULL, NULL, NULL, 'Collaborative_Filtering_with_Temporal_Dynamics2.pdf', '2', NULL, NULL),
(43, 'Improved_Neighborhood-based_Collaborative_Filtering3.pdf', NULL, NULL, NULL, 'Improved_Neighborhood-based_Collaborative_Filtering3.pdf', '2', NULL, NULL),
(44, 'kdd08koren.pdf', NULL, NULL, NULL, 'kdd08koren.pdf', '2', NULL, NULL),
(45, 'On_Bootstrapping_Recommender_Systems.pdf', NULL, NULL, NULL, 'On_Bootstrapping_Recommender_Systems.pdf', '2', NULL, NULL),
(46, 'paper.pdf', NULL, NULL, NULL, 'paper.pdf', '2', NULL, NULL),
(47, 'Advances_in_Collaborative_Filtering.pdf', NULL, NULL, NULL, 'Advances_in_Collaborative_Filtering.pdf', '2', NULL, NULL),
(48, 'Improved_Neighborhood-based_Collaborative_Filtering4.pdf', NULL, NULL, NULL, 'Improved_Neighborhood-based_Collaborative_Filtering4.pdf', '2', NULL, NULL),
(49, 'Improved_Neighborhood-based_Collaborative_Filtering5.pdf', NULL, NULL, NULL, 'Improved_Neighborhood-based_Collaborative_Filtering5.pdf', '2', NULL, NULL),
(50, 'Adaptive_Bootstrapping_of_Recommender_Systems_Using_Decision_Trees.pdf', NULL, NULL, NULL, 'Adaptive_Bootstrapping_of_Recommender_Systems_Using_Decision_Trees.pdf', '2', NULL, NULL);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `printer`
--

INSERT INTO `printer` (`id`, `username`, `password`, `name`, `location`, `level`) VALUES
(1, 'beihang', '123456', '北航打印店', '北航', 1),
(2, 'beiyou', '123456', '北邮打印店', '北邮', 2),
(3, 'beida', '123456', '北大打印店', '北大', 1);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `printtask`
--

INSERT INTO `printtask` (`id`, `userid`, `printerid`, `status`, `method`, `createtime`, `finishtime`, `cost`, `address`, `mobile`, `delivertime`, `remark`, `receipt`) VALUES
(1, '2', '1', '打印完成', '普通', '2013-01-24 19:00:00', '2013-01-24 19:10:00', 90, '北航办公楼', '18611728342', '2013-01-24 19:10:00', '尽快啊', '北京航空航天大学'),
(24, '2', '1', '打印完成', 'campus', '2013-03-12 15:29:20', '2013-03-13 12:51:52', 32, '无', '7110', '2013-03-08 00:00:00', '无', '北京航空航天大学'),
(23, '2', '1', '打印中', 'express', '2013-03-12 14:10:58', NULL, 40, '无', '7110', '2013-03-15 00:00:00', '无', '北京航空航天大学'),
(21, '2', '1', '打印完成', 'self', NULL, NULL, 0, '无', '', '0000-00-00 00:00:00', '', ''),
(22, '2', '1', '打印完成', 'self', '2013-03-12 13:25:03', '2013-03-12 13:25:37', 5, '', '7110', '2013-03-15 00:00:00', '无', '北京航空航天大学'),
(20, '2', '1', '打印中', 'self', NULL, NULL, 2, '无', '7110', '2013-03-08 00:00:00', '无', '北京航空航天大学'),
(19, '2', '1', '打印中', 'campus', NULL, NULL, 2, '无', '7110', '2013-03-08 00:00:00', '无', '北京航空航天大学'),
(18, '2', '1', '打印中', 'campus', NULL, NULL, 30, '无', '7110', '2013-03-08 00:00:00', '无', '北京航空航天大学'),
(25, '2', NULL, '打印创建', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2', '1', '打印中', 'self', '2013-03-13 13:15:48', NULL, 25, '无', '7110', '2013-03-15 00:00:00', '无', '北京航空航天大学');

-- --------------------------------------------------------

--
-- 表的结构 `printtasksetting`
--

CREATE TABLE `printtasksetting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `printtaskid` int(11) DEFAULT NULL,
  `documentid` int(11) DEFAULT NULL,
  `papersize` varchar(45) DEFAULT NULL,
  `isdoubleside` tinyint(1) DEFAULT NULL,
  `range` varchar(45) DEFAULT NULL,
  `fenshu` int(11) DEFAULT NULL,
  `zhuangding` varchar(45) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- 转存表中的数据 `printtasksetting`
--

INSERT INTO `printtasksetting` (`id`, `printtaskid`, `documentid`, `papersize`, `isdoubleside`, `range`, `fenshu`, `zhuangding`, `cost`) VALUES
(1, 1, 1, 'A4', 1, '1-100', 2, '普通', 50),
(31, 18, 35, 'B5', 1, '1-8', 1, '精装', 2),
(32, 19, 36, 'B5', 1, '1-10', 1, '精装', 2),
(33, 20, 37, 'B5', 1, '1-8', 1, '精装', 2),
(34, 21, 38, 'A4', 1, '', 0, '精装', 0),
(35, 21, 39, 'B5', 1, '', 0, '精装', 0),
(36, 21, 40, 'A4', 0, '', 0, '普通', 0),
(37, 21, 41, 'B5', 1, '', 0, '精装', 0),
(38, 22, 42, 'A4', 0, '1-10', 1, '普通', 5),
(39, 23, 43, 'A4', 0, '1-10', 1, '普通', 5),
(40, 23, 44, 'A4', 0, '1-8', 1, '普通', 4),
(41, 23, 45, 'A4', 0, '1-8', 1, '普通', 4),
(42, 23, 46, 'A4', 0, '1-10', 5, '精装', 27),
(43, 24, 47, 'A4', 0, '1-10', 1, '普通', 5),
(44, 24, 48, 'A4', 0, '1-10', 5, '精装', 27),
(45, 25, 49, 'A4', 0, '1-10', 5, '普通', 25),
(46, 26, 50, 'A4', 0, '1-10', 5, '普通', 25);

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
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `nickname`, `password`, `email`, `mobile`, `province`, `city`, `address`, `level`) VALUES
(1, 'guyi', '顾毅', '123456', 'test@7test.com', '18611728343', '北京', '北京', '北航', 99),
(2, 'test', '测试用户', '123456', 'test@7test.com', '110', '北京', '北京', '北航', 1);
