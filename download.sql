-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 03 月 15 日 15:49
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `download`
--

-- --------------------------------------------------------

--
-- 表的结构 `dl_config`
--

CREATE TABLE IF NOT EXISTS `dl_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL COMMENT '键',
  `value` text COMMENT '值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `dl_config`
--

INSERT INTO `dl_config` (`id`, `key`, `value`) VALUES
(30, 'count', 'MTU='),
(31, 'task', 'MTM2MzM1NzI1Nw==');

-- --------------------------------------------------------

--
-- 表的结构 `dl_files`
--

CREATE TABLE IF NOT EXISTS `dl_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文件信息' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `dl_files`
--

INSERT INTO `dl_files` (`id`, `url`, `type`, `size`, `time`) VALUES
(2, 'http://jwc.yangtzeu.edu.cn:8080/images/index_login1.jpg', 'image/jpeg', 3442, 1363357353);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
