-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-06-14 17:00:52
-- 伺服器版本: 5.6.26
-- PHP 版本： 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `honyeh`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_dt` datetime DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `level` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `create_dt`, `order`, `level`) VALUES
(27, 'honyeh', 'aG9ueWVo', '', 21, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `product_details`
--

CREATE TABLE IF NOT EXISTS `product_details` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `s_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_details` text CHARACTER SET utf8 NOT NULL,
  `img_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  `create_dt` datetime NOT NULL,
  `order` int(5) NOT NULL,
  `project` int(5) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `product_project`
--

CREATE TABLE IF NOT EXISTS `product_project` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(10) NOT NULL DEFAULT '0',
  `create_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `product_project`
--

INSERT INTO `product_project` (`id`, `title`, `lang`, `order`, `create_dt`) VALUES
(8, '營業項目', 'ch', 1, '2016-06-13 21:24:01');

-- --------------------------------------------------------

--
-- 資料表結構 `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `create_dt` datetime DEFAULT NULL,
  `order` int(10) DEFAULT '0',
  `project` int(5) NOT NULL,
  `img_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `product_type`
--

INSERT INTO `product_type` (`id`, `title`, `lang`, `create_dt`, `order`, `project`, `img_url`) VALUES
(3, '初級濾網系列', 'ch', '2016-06-13 21:28:29', 1, 8, ''),
(4, '中效能濾網系列', 'ch', '2016-06-13 21:28:42', 2, 8, ''),
(5, '高效能濾網系列', 'ch', '2016-06-13 21:28:49', 3, 8, ''),
(6, '活性碳濾網系列', 'ch', '2016-06-13 21:29:00', 4, 8, ''),
(7, '耗材', 'ch', '2016-06-13 21:29:08', 5, 8, '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_project`
--
ALTER TABLE `product_project`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- 使用資料表 AUTO_INCREMENT `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `product_project`
--
ALTER TABLE `product_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
