-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2019 年 11 月 29 日 21:57
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `compro_category`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `fields`
--

CREATE TABLE `genres` (
  `genre_id` int(10) UNSIGNED NOT NULL,
  `name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `fields`
--

INSERT INTO `genres` (`genre_id`, `name`, `label`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '全探索', 'search', 10, '2019-08-27 04:35:32', '2019-08-27 04:35:32', NULL),
(2, '貪欲', 'greedy', 20, '2019-08-27 04:36:21', '2019-08-27 04:36:21', NULL),
(3, '二分探索', 'binary', 30, '2019-08-27 04:39:39', '2019-08-27 04:39:39', NULL),
(4, '累積', 'accumulate', 40, '2019-08-27 05:58:38', '2019-08-27 05:58:38', NULL),
(5, '高速化', 'speed', 50, '2019-08-27 05:59:03', '2019-08-27 05:59:03', NULL),
(6, 'dp', 'dp', 60, '2019-08-27 05:59:15', '2019-08-27 05:59:15', NULL),
(7, '数え上げ', 'enumeration', 70, '2019-08-27 06:01:41', '2019-08-27 18:54:41', NULL),
(8, '数学', 'math', 90, '2019-08-27 06:02:41', '2019-08-27 19:01:41', NULL),
(9, '整数', 'integer', 100, '2019-08-27 06:04:10', '2019-08-27 19:02:13', NULL),
(10, 'n進数', 'nbase', 80, '2019-08-27 06:04:31', '2019-08-27 18:46:38', NULL),
(11, '一般グラフ', 'graph', 110, '2019-08-27 06:04:51', '2019-08-27 06:04:51', NULL),
(12, '木', 'tree', 120, '2019-08-27 06:05:08', '2019-08-27 06:05:08', NULL),
(13, 'データ構造', 'structure', 130, '2019-08-27 06:05:38', '2019-08-27 06:05:38', NULL),
(14, '構築', 'construct', 140, '2019-08-27 06:06:08', '2019-08-27 06:06:08', NULL),
(15, 'ゲーム', 'game', 150, '2019-08-27 06:06:30', '2019-08-27 06:06:30', NULL),
(16, '幾何', 'geometory', 160, '2019-08-27 06:06:48', '2019-08-27 06:06:48', NULL),
(17, '文字列', 'string', 170, '2019-08-27 06:07:06', '2019-08-27 06:07:06', NULL),
(18, 'テクニック', 'technique', 180, '2019-08-27 06:07:24', '2019-08-27 06:07:24', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `fields`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`),
  ADD UNIQUE KEY `genres_label_unique` (`label`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `fields`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
