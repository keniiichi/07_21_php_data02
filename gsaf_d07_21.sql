-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-12-23 19:25:14
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsaf_d07_21`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `order_table`
--

CREATE TABLE `order_table` (
  `purchase_order_id` int(12) NOT NULL,
  `purchase_order_date` date NOT NULL,
  `order_target` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount_including_tax` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desired_delivery_date` date NOT NULL,
  `order_responsible` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `order_table`
--

INSERT INTO `order_table` (`purchase_order_id`, `purchase_order_date`, `order_target`, `product_name`, `total_amount_including_tax`, `desired_delivery_date`, `order_responsible`, `order_status`, `created_at`, `updated_at`) VALUES
(1, '2020-12-24', 'gs', 'dev', '100', '2020-12-25', 'tk', '発注済', '2020-12-24 02:47:24', '2020-12-24 02:47:24'),
(2, '2020-12-24', 'gs', 'dev', '100', '2020-12-25', 'tk', '発注済', '2020-12-24 02:47:45', '2020-12-24 02:47:45'),
(3, '2020-12-24', 'gs', 'dev', '100', '2020-12-25', 'tk', '発注済', '2020-12-24 02:51:23', '2020-12-24 02:51:23'),
(4, '2020-12-25', 'amazon', 'book', '1000円', '2021-01-07', 'dd', '入金待ち', '2020-12-24 03:10:13', '2020-12-24 03:10:13'),
(5, '2020-12-02', '楽天', 'トラベル', '50000', '2021-10-24', 'rk', '発注承認', '2020-12-24 03:16:00', '2020-12-24 03:16:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(1, '課題１', '2020-12-12', '2020-12-19 15:54:54', '2020-12-19 15:54:54'),
(2, '課題2', '2020-12-13', '2020-12-19 15:59:56', '2020-12-19 15:59:56'),
(3, '課題3', '2020-12-14', '2020-12-19 16:00:31', '2020-12-19 16:00:31'),
(4, '課題4', '2020-12-14', '2020-12-19 16:01:30', '2020-12-19 16:01:30'),
(5, '課題5', '2020-12-15', '2020-12-19 16:01:55', '2020-12-19 16:01:55'),
(6, 'ププレゼント候補考える', '2020-12-01', '2020-12-19 16:03:34', '2020-12-19 16:03:34'),
(7, '課サンタに手紙書く', '2020-12-02', '2020-12-19 16:04:02', '2020-12-19 16:04:02'),
(8, 'test', '2020-12-12', '2020-12-19 17:07:28', '2020-12-19 17:07:28'),
(9, 'test', '2020-12-19', '2020-12-19 17:07:35', '2020-12-19 17:07:35'),
(10, 'ダー', '2020-12-19', '2020-12-19 17:21:40', '2020-12-19 17:21:40');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`purchase_order_id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `order_table`
--
ALTER TABLE `order_table`
  MODIFY `purchase_order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
