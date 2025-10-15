-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2025 at 03:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidding_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `starting_price` decimal(10,2) NOT NULL,
  `end_time` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `winner_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `title`, `description`, `starting_price`, `end_time`, `user_id`, `created_at`, `updated_at`, `image`, `winner_id`) VALUES
(1, 'golden egg', 'very rare', 55.00, '2025-09-25 20:16:00', 1, '2025-09-25 08:16:50', '2025-09-25 08:16:50', NULL, NULL),
(2, 'paper watch', 'a rare toy', 100.00, '2025-10-04 14:56:00', 1, '2025-09-26 02:56:16', '2025-10-08 16:16:02', NULL, 1),
(3, 'playgun', 'a rare gun', 333.00, '2025-09-30 03:26:00', 1, '2025-09-29 15:26:34', '2025-09-29 15:26:34', 'auctions/aU8wIjLHvPJoh7iL9j95q5E3Ig66JhiE5DNXi4Vc.jpg', NULL),
(4, 'a old watch', '1800\'s watch', 666.00, '2025-09-30 03:38:00', 1, '2025-09-29 15:39:04', '2025-09-29 15:39:04', 'auctions/sxShowitpcs6rH2yGu5aZVtsv3TJRHgefNifSPZL.jpg', NULL),
(5, 'special sunglass', 'a rare sunglass', 222.00, '2025-09-30 16:11:00', 1, '2025-09-30 04:12:35', '2025-09-30 04:12:35', 'auctions/U9xCbTMPq2bFfPjHV6IROBVNlQcWlZvjBu8SCv2S.jpg', NULL),
(6, 'black tiger', 'a rare animal', 1111.00, '2025-10-01 02:59:00', 2, '2025-09-30 15:00:35', '2025-10-08 16:14:59', 'auctions/BG4jzEsEY6DKBFv3VUpeQH3RUj2NpGSAHRUGERQF.jpg', 2),
(7, 'Rare Robot', 'Rare Robot', 13.00, '2025-10-04 04:55:00', 1, '2025-09-30 16:56:10', '2025-10-08 16:15:15', 'auctions/oUbapvZzud7U1k7uysE25IGkuIHXVpajnYJdIkMq.jpg', 3),
(8, 'old car', 'a rare car', 10.00, '2025-09-30 19:02:00', 1, '2025-10-01 07:04:02', '2025-10-01 07:04:02', 'auctions/2SfPcsQjIoyRmpwJeqYSnxlOHvogQZ9Jw4SmynVJ.jpg', NULL),
(9, 'old ball', 'a rare ball', 5.00, '2025-10-01 19:10:00', 1, '2025-10-01 07:05:52', '2025-10-01 16:33:09', 'auctions/UkLbOu3XARLuq9GgpVjds7RMaWjGVN0FKQnzoUan.jpg', 6),
(10, 'old phone', 'very rare phone collection', 100.00, '2025-10-10 04:34:00', 1, '2025-10-03 16:34:45', '2025-10-03 16:34:45', 'auctions/n6kAZ40IIf3uAWE9gAfcQgdzs4S3dFkFQHz5hclz.jpg', NULL),
(11, 'A old cricket bat', 'a rare bat', 50.00, '2025-10-11 05:33:00', 1, '2025-10-03 17:34:40', '2025-10-03 17:34:40', 'auctions/2oBUQCNcZEjsO8NfWxxIx8LdVYcA7WLbdkPHgVJB.jpg', NULL),
(12, 'crown', 'a rare crown', 2.00, '2025-10-08 21:20:00', 1, '2025-10-08 15:10:52', '2025-10-08 15:10:52', 'auctions/LQLK4U2dr2LdC4cyoPV9YqTeMkwBPue6OlC6m8Ng.jpg', NULL),
(13, 'a rare vr headset', 'a rare tech', 10.00, '2025-10-09 04:08:00', 1, '2025-10-08 16:06:31', '2025-10-09 00:19:24', 'auctions/Hqdfna0w4GJwo8watIle7YP6hnpcFRkYUZcvcdnR.jpg', 1),
(14, 'old headphone', 'old headphone', 1.00, '2025-10-09 04:23:00', 1, '2025-10-08 16:21:51', '2025-10-08 16:21:51', 'auctions/od2DUdFupn8TWXMHwSMoHxPoulmiqyStPqaSN8ZN.jpg', NULL),
(15, 'a old house', 'a old house', 22.00, '2025-10-09 04:26:00', 11, '2025-10-08 16:24:40', '2025-10-09 00:19:33', 'auctions/y8bk3CrVThUmgxF2osklykhUJFGCeMKT6Zy72CJs.jpg', 12),
(16, 'neckless', 'rare neck', 80.00, '2025-10-09 05:33:00', 1, '2025-10-08 17:31:31', '2025-10-09 00:18:27', 'auctions/nivPdX4CBDfpK5jEoF1r0LuW9ivTX8GI6tFMmSGE.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_winner` tinyint(1) NOT NULL DEFAULT 0,
  `payment_status` enum('pending','paid') NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_reference` varchar(255) DEFAULT NULL,
  `bkash_number` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `auction_id`, `user_id`, `amount`, `created_at`, `updated_at`, `is_winner`, `payment_status`, `payment_method`, `payment_reference`, `bkash_number`, `transaction_id`) VALUES
(1, 2, 1, 444.00, '2025-09-26 03:11:21', '2025-09-26 03:11:21', 0, 'pending', NULL, NULL, NULL, NULL),
(2, 2, 1, 4545.00, '2025-09-26 03:11:45', '2025-09-26 03:11:45', 0, 'pending', NULL, NULL, NULL, NULL),
(3, 2, 1, 7777.00, '2025-09-26 04:06:35', '2025-09-26 04:06:35', 0, 'pending', NULL, NULL, NULL, NULL),
(4, 2, 1, 100.00, '2025-09-26 06:06:19', '2025-09-26 06:06:19', 0, 'pending', NULL, NULL, NULL, NULL),
(5, 2, 1, 66666.00, '2025-09-28 05:54:59', '2025-10-08 16:16:59', 0, 'paid', NULL, NULL, '01551634681', '100'),
(6, 6, 2, 3333.00, '2025-09-30 15:00:59', '2025-09-30 15:00:59', 0, 'pending', NULL, NULL, NULL, NULL),
(7, 7, 3, 444.00, '2025-10-01 02:21:51', '2025-10-01 02:21:51', 0, 'pending', NULL, NULL, NULL, NULL),
(8, 9, 1, 6.00, '2025-10-01 07:06:08', '2025-10-01 07:06:08', 0, 'pending', NULL, NULL, NULL, NULL),
(9, 9, 4, 8.00, '2025-10-01 07:07:17', '2025-10-01 07:07:17', 0, 'pending', NULL, NULL, NULL, NULL),
(10, 9, 5, 10.00, '2025-10-01 07:08:15', '2025-10-01 07:08:15', 0, 'pending', NULL, NULL, NULL, NULL),
(11, 9, 6, 9.00, '2025-10-01 07:09:21', '2025-10-01 07:09:21', 0, 'pending', NULL, NULL, NULL, NULL),
(12, 9, 6, 44.00, '2025-10-01 07:10:54', '2025-10-01 07:10:54', 0, 'pending', NULL, NULL, NULL, NULL),
(13, 2, 1, 777.00, '2025-10-03 16:17:45', '2025-10-03 16:17:45', 0, 'pending', NULL, NULL, NULL, NULL),
(14, 10, 1, 222.00, '2025-10-03 16:35:08', '2025-10-03 16:35:08', 0, 'pending', NULL, NULL, NULL, NULL),
(15, 11, 1, 60.00, '2025-10-03 17:35:30', '2025-10-03 17:35:30', 0, 'pending', NULL, NULL, NULL, NULL),
(16, 11, 1, 70.00, '2025-10-03 17:35:46', '2025-10-03 17:35:46', 0, 'pending', NULL, NULL, NULL, NULL),
(17, 11, 1, 80.00, '2025-10-03 17:35:54', '2025-10-03 17:35:54', 0, 'pending', NULL, NULL, NULL, NULL),
(18, 11, 9, 80.00, '2025-10-03 17:38:49', '2025-10-03 17:38:49', 0, 'pending', NULL, NULL, NULL, NULL),
(19, 11, 9, 90.00, '2025-10-03 17:38:57', '2025-10-03 17:38:57', 0, 'pending', NULL, NULL, NULL, NULL),
(20, 13, 1, 111.00, '2025-10-08 16:06:43', '2025-10-08 16:06:43', 0, 'pending', NULL, NULL, NULL, NULL),
(21, 13, 1, 2222.00, '2025-10-08 16:09:14', '2025-10-08 16:09:14', 0, 'pending', NULL, NULL, NULL, NULL),
(22, 13, 10, 4444.00, '2025-10-08 16:11:17', '2025-10-08 16:11:17', 0, 'pending', NULL, NULL, NULL, NULL),
(23, 11, 10, 666.00, '2025-10-08 16:12:09', '2025-10-08 16:12:09', 0, 'pending', NULL, NULL, NULL, NULL),
(24, 13, 1, 44.00, '2025-10-08 16:14:16', '2025-10-08 16:14:16', 0, 'pending', NULL, NULL, NULL, NULL),
(25, 10, 1, 5555.00, '2025-10-08 16:18:21', '2025-10-08 16:18:21', 0, 'pending', NULL, NULL, NULL, NULL),
(26, 13, 1, 5555.00, '2025-10-08 16:20:39', '2025-10-08 16:20:39', 0, 'pending', NULL, NULL, NULL, NULL),
(27, 14, 1, 444.00, '2025-10-08 16:22:02', '2025-10-08 16:22:02', 0, 'pending', NULL, NULL, NULL, NULL),
(28, 14, 11, 11.00, '2025-10-08 16:23:36', '2025-10-08 16:23:36', 0, 'pending', NULL, NULL, NULL, NULL),
(29, 15, 11, 23.00, '2025-10-08 16:24:59', '2025-10-08 16:24:59', 0, 'pending', NULL, NULL, NULL, NULL),
(30, 15, 1, 25.00, '2025-10-08 16:25:17', '2025-10-08 16:25:17', 0, 'pending', NULL, NULL, NULL, NULL),
(31, 16, 1, 90.00, '2025-10-08 17:32:07', '2025-10-08 17:32:07', 0, 'pending', NULL, NULL, NULL, NULL),
(32, 16, 12, 99.00, '2025-10-08 17:36:10', '2025-10-09 00:18:47', 0, 'paid', NULL, NULL, '01551634681', '100'),
(33, 16, 12, 99.00, '2025-10-08 17:47:55', '2025-10-08 17:47:55', 0, 'pending', NULL, NULL, NULL, NULL),
(34, 15, 12, 88.00, '2025-10-08 17:48:33', '2025-10-09 00:28:25', 0, 'paid', NULL, NULL, '01551634681', '77'),
(35, 13, 12, 990.00, '2025-10-08 17:48:56', '2025-10-08 17:48:56', 0, 'pending', NULL, NULL, NULL, NULL),
(36, 13, 12, 99.00, '2025-10-08 17:50:59', '2025-10-08 17:50:59', 0, 'pending', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_25_102305_create_auctions_table', 2),
(5, '2025_09_25_164838_create_bids_table', 3),
(6, '2025_10_01_123825_add_winner_id_to_auctions_table', 4),
(7, '2025_10_01_230605_add_role_to_users_table', 5),
(8, '2025_10_07_220155_add_payment_columns_to_bids_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('priyamsharma46@gmail.com', '$2y$12$0FAEAigNUJAqvoAhOp/i/.PWTI43RO66/iH9QcaTKDYusNKR392kC', '2025-10-03 18:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('xbLuiERodNdp70jjil8wO4E9l41pmSAebKKQUe5W', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicWtMRmZoaFJkNnFlUEhnbWdTaEhFcFpYa05TM01oR2t0bDZtT0VvMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hdWN0aW9uLXJlcG9ydCI7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1760016048);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Priyam Sharma', 'priyamsharma46@gmail.com', NULL, '$2y$12$bgbnrK6QJP4lD7Oug6OchOcSTh4cd2YWCWYIdPAIrkJ4QxabP7gsW', NULL, '2025-09-25 04:05:12', '2025-09-25 04:05:12', 'admin'),
(2, 'doyal hari das', 'doyalsharma@gmail.com', NULL, '$2y$12$h0Mcujq/T1zGXPsPBZu1B.95ouwrCuC0d/ua8DK118res.JeBpfLy', NULL, '2025-09-30 14:58:32', '2025-10-03 17:31:38', 'user'),
(3, 'Tibra aa', 'basksjsnsk@gmail.com', NULL, '$2y$12$VcUexoRa8VRuKf1NnD3CMufdr.ioNrdJrevsMrDvJINqHCsbw5ElK', NULL, '2025-10-01 02:21:23', '2025-10-03 11:47:08', 'user'),
(4, 'tanmoy', 'priyam@gmail.com', NULL, '$2y$12$F.NqdVVmI.vIOGy5ToT0q.mBw/ewFqk6MQhSjHI0Sv7FSToD9GV1u', NULL, '2025-10-01 07:07:01', '2025-10-01 07:07:01', 'user'),
(5, 'punam', 'punam@gmail.com', NULL, '$2y$12$J//2u7Rp/wUHndra1j6rEeKETXyMXLQvmGTnyPoVqBit/JCFZVJaO', NULL, '2025-10-01 07:08:03', '2025-10-01 07:08:03', 'user'),
(6, 'Bijoy sharma', 'puanam333@gmail.com', NULL, '$2y$12$aUALRySIxlmSHqo3TmSjweEy/te8L7kVBqVnXuaIvKxI.bn5B.ewa', NULL, '2025-10-01 07:09:10', '2025-10-03 17:31:58', 'user'),
(7, 'Test User', 'test@example.com', '2025-10-01 17:38:39', '$2y$12$f8ofamaFJbY8WJbG31PkU.rHu33AroaIL1A1s75zIXOAfhfSoxHxq', 'rWQFKAvFCK', '2025-10-01 17:38:39', '2025-10-01 17:38:39', 'user'),
(8, 'Admin User', 'admin@example.com', NULL, '$2y$12$lB2zdGLm8qf5plWO38Wd0ebkDeFIU6bRUSXUrH4aKQBsDtZJpLp3e', NULL, '2025-10-01 17:38:40', '2025-10-01 17:38:40', 'admin'),
(9, 'Arafat', 'arafat@gmail.com', NULL, '$2y$12$osNm4XI912ecrZFTVVwWceC.AI8uEbsvMMEAalruGCbgGRXlWk4bi', NULL, '2025-10-03 17:38:10', '2025-10-03 17:38:10', 'user'),
(10, 'Lucky Sharma', 'lucky@gmail.com', NULL, '$2y$12$IGxQ/E20bz5S4EN2MBJp/e1jTXOuD.Y3bfociXdAOLekCqA4iwI.q', NULL, '2025-10-08 16:11:03', '2025-10-08 16:11:03', 'user'),
(11, 'prya', 'riam@gmail.com', NULL, '$2y$12$McfHnyyWYKPpQ0rlZEB/TemqoIMLPRBr5CrFIvLhtPvH4INXCpv4y', NULL, '2025-10-08 16:23:26', '2025-10-08 16:23:26', 'user'),
(12, 'ayas', 'ayas@gmail.com', NULL, '$2y$12$6DEYefbTkShmmc6Ji5amEOZm.VqwNA85wpiH.g2sSzWurbevExkEK', NULL, '2025-10-08 17:35:55', '2025-10-08 17:35:55', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auctions_user_id_foreign` (`user_id`),
  ADD KEY `auctions_winner_id_foreign` (`winner_id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bids_auction_id_foreign` (`auction_id`),
  ADD KEY `bids_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `auctions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auctions_winner_id_foreign` FOREIGN KEY (`winner_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
