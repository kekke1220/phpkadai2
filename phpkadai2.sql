-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 12 月 14 日 02:31
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
-- データベース: `phpkadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `phpkadai2`
--

CREATE TABLE `phpkadai2` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `adress` text NOT NULL,
  `file` text NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `phpkadai2`
--

INSERT INTO `phpkadai2` (`ID`, `name`, `adress`, `file`, `lat`, `lng`) VALUES
(57, 'あ', 'い', '', 43.0552, 141.332),
(58, '札幌医大病院', '札幌市中央区南２条 西１６丁目', '', 43.0552, 141.332),
(59, '札幌医大病院', 'efdverv', '', 43.0747, 141.341),
(60, '札幌医大病院', '札幌市中央区南２条 西１６丁目', '', 43.0552, 141.332);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `phpkadai2`
--
ALTER TABLE `phpkadai2`
  ADD PRIMARY KEY (`ID`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `phpkadai2`
--
ALTER TABLE `phpkadai2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
