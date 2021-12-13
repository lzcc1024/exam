-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 192.168.1.109:3308
-- 生成日期： 2021-12-13 17:57:25
-- 服务器版本： 5.7.35
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `exam`
--

-- --------------------------------------------------------

--
-- 表的结构 `choice`
--

CREATE TABLE `choice` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` tinyint(1) NOT NULL DEFAULT '1',
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_3` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_4` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_5` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_6` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `answer` tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  `answer_explain` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `choice`
--

INSERT INTO `choice` (`id`, `subject`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `answer`, `answer_explain`) VALUES
(1, 1, 'q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1q1', '喔诶乳剂的司法9992348kosdw我', 'bbbbbbbbbbbb', '喔诶乳剂的司法9992348kosdw我喔诶乳剂的司法9992348kosdw我喔诶乳剂的司法9992348kosdw我喔诶乳剂的司法9992348kosdw我喔诶乳剂的司法9992348kosdw我', 'dddddddddddd', '', '', 1, NULL),
(2, 1, '我们第三的哦附加赛第为ieruoiweuroweuoru三等奖法律框架', 'aaaaaaaaaaaaa', 'bbbbbbbbbbbb', 'cccccccccccc', 'dddddddddddd', 'eeeeeeeeeeee', '', 3, NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `choice`
--
ALTER TABLE `choice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
