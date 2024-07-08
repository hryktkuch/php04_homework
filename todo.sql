-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 7 月 08 日 16:26
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `todo_app`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `todo`
--

CREATE TABLE `todo` (
  `id` int(12) NOT NULL,
  `todo` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `creator` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `todo`
--

INSERT INTO `todo` (`id`, `todo`, `date`, `creator`) VALUES
(32, '大根', '2024-07-07', 3),
(33, 'ほうれん草', '2024-07-07', 1),
(34, 'しめじ', '2024-07-07', 2),
(35, '牛乳', '2024-07-07', 3),
(36, 'ごぼう', '2024-07-07', 1),
(37, '塩豆大福', '2024-07-07', 2),
(38, 'ひき肉', '2024-07-08', 2);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
