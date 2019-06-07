-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 6 月 07 日 23:47
-- サーバのバージョン： 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db_soccer`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_soccer_table`
--

CREATE TABLE `gs_soccer_table` (
  `id` int(12) NOT NULL,
  `sdate` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `sweek` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(12) NOT NULL,
  `inlineRadioOptions` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `training` int(12) NOT NULL,
  `training2` int(12) NOT NULL,
  `vas` int(12) NOT NULL,
  `jump` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_soccer_table`
--

INSERT INTO `gs_soccer_table` (`id`, `sdate`, `sweek`, `name`, `number`, `inlineRadioOptions`, `training`, `training2`, `vas`, `jump`) VALUES
(1, '2019-06-04', '火', '遠藤 洋道', 100, 'DF', 10, 10, 20, 100),
(2, '2019-06-03', '月', '岡本 健太郎', 0, 'GK', 1, 1, 100, 10),
(3, '2019-06-04', '火', '岡本 健二郎', 0, 'DF', 6, 8, 10, 21),
(4, '2019-06-04', '火', '遠藤 洋道', 10, 'DF', 6, 7, 48, 78),
(5, '2019-06-04', '火', 'アメリカ・ワシントン', 11, 'MF', 7, 8, 49, 87),
(6, '2019-06-05', '水', 'アメリカ・ワシントン', 9, 'DF', 4, 3, 45, 45),
(7, '2019-06-04', '火', '遠藤 洋道', 4, 'FW', 8, 9, 39, 77),
(8, '2019-06-04', '火', 'HIROMICHI ENDO', 8, 'FW', 10, 10, 74, 99),
(10, '2019-06-04', '火', '岡本 健四郎', 5, 'DF', 6, 10, 37, 22),
(11, '2019-06-07', '金', '岡本 健二郎', 19, 'FW', 2, 1, 28, 30),
(12, '2019-06-08', '土', '岡本 健三郎', 7, 'DF', 7, 6, 29, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_soccer_table`
--
ALTER TABLE `gs_soccer_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_soccer_table`
--
ALTER TABLE `gs_soccer_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
