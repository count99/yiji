-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-09-20 00:00:04
-- 伺服器版本: 10.1.26-MariaDB
-- PHP 版本： 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `effect`
--

CREATE TABLE `effect` (
  `id` int(11) NOT NULL,
  `effect` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `effect`
--

INSERT INTO `effect` (`id`, `effect`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `period` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `publisher` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `story` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `movies`
--

INSERT INTO `movies` (`id`, `name`, `level`, `period`, `date`, `publisher`, `director`, `pre`, `post`, `story`, `view`) VALUES
(32, 'ioiiiii', 1, '35min', '2017-09-19', 'fvf', 'fgdg', '03B01v.avi', '03B01.png', 'fgfdgdfg', 0),
(33, 'dfsdf', 1, 'sdfsd', '2017-09-19', 'sdfsdfds', 'sdfsdfs', '03B02v.avi', '03B02.png', 'sdfsfsf', 0),
(34, 'egdfg', 1, 'dfgdgdfg', '2017-09-14', 'dfgd', 'dfgfd', '03B03v.avi', '03B03.png', 'dfgdgd', 0),
(35, 'fxgvsdfr', 1, 'sadfsfds', '2017-09-14', 'sdfsd', 'dfsd', '03B04v.avi', '03B04.png', 'jhygfhj', 0),
(36, 'fsdgdg', 1, 'dfgbdg', '2017-09-18', 'sfdgfsdg', 'fdgdg', '03B06v.avi', '03B06.png', '', 0),
(37, '電影六', 1, '', '2017-01-01', '電影六', '電影六', '03B06v.avi', '03B06.png', 'zxvccx', 0),
(38, 'ㄖ', 1, '我日', '2017-01-01', 'sdf', 'sdfdsf', '03B08v.avi', '03B08.png', 'dsafdsaf', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(11) NOT NULL,
  `sn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `stage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat4` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `pre`
--

CREATE TABLE `pre` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `pre`
--

INSERT INTO `pre` (`id`, `name`, `pre`, `view`) VALUES
(8, '預告片1', '03A01.jpg', 1),
(10, '預告片2', '03A02.jpg', 1),
(11, '預告片3', '03A03.jpg', 1),
(12, '預告片4', '03A04.jpg', 1),
(13, '預告片5', '03A05.jpg', 1),
(14, '預告片5', '03A06.jpg', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `sn`
--

CREATE TABLE `sn` (
  `id` int(11) NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sn` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `sn`
--

INSERT INTO `sn` (`id`, `date`, `sn`) VALUES
(1, '20170919', '0013');

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `test`
--

INSERT INTO `test` (`id`, `user`) VALUES
(3, 'fuck'),
(4, 'xsxss'),
(5, 'yiouiouio'),
(6, 'xxxxxxxx'),
(7, 'bbbbb'),
(8, 'bbbbb'),
(9, 'bbbbb'),
(10, 'bbbbb'),
(11, 'fuck you'),
(12, 'fuck you'),
(13, 'haha');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `effect`
--
ALTER TABLE `effect`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `pre`
--
ALTER TABLE `pre`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sn`
--
ALTER TABLE `sn`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `effect`
--
ALTER TABLE `effect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- 使用資料表 AUTO_INCREMENT `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `pre`
--
ALTER TABLE `pre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用資料表 AUTO_INCREMENT `sn`
--
ALTER TABLE `sn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
