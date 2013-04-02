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
(1, 1, 'A3,2|A4,1|B5,0.8', '单面,1|双面,1|小册子,0.5', '书夹,1|普通,2|精装,5', 0.5),
(2, 2, 'A4,1|B5,0.8', '单面,1|双面,1|幻灯片,0.5', '普通,2|精装,5', 1),
(3, 3, 'A4,1|B5,0.8', '单面,1|双面,1', '普通,2|精装,5', 0.5),
(4, 4, 'A1,4|A2,3|A3,2|A4,1|B5,0.8', '单面,1|双面,1', '普通,2|精装,5', 0.5),
(5, 5, 'A4,1|B5,0.8', '单面,1|双面,1', '普通,2|精装,5', 0.5);

-- --------------------------------------------------------