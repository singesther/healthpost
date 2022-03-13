-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 08:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `membership`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `healthposts`
--

CREATE TABLE `healthposts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `healthcenter_id` bigint(20) UNSIGNED NOT NULL,
  `healthpost_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tin_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `healthposts`
--

INSERT INTO `healthposts` (`id`, `owner_id`, `healthcenter_id`, `healthpost_name`, `phone`, `address`, `tin_number`, `created_at`, `updated_at`) VALUES
(5, 6, 6, 'Remera HP', '0788221155', 'Kimironko', '00998822', '2022-03-11 15:49:50', '2022-03-11 15:49:50'),
(6, 7, 7, 'kimihurura', '0788667755', 'KN', '998877', '2022-03-11 21:01:46', '2022-03-11 21:01:46'),
(7, 8, 8, 'Noman', '0788342121', 'Kagugu', '1100110011', '2022-03-11 21:33:17', '2022-03-11 21:33:17'),
(8, 9, 7, 'Shine', '0788445544', 'Nyabugogo', '0101012212', '2022-03-11 21:55:21', '2022-03-11 21:55:21'),
(9, 10, 7, 'Citizens', '0733442222', 'NY', '10010101', '2022-03-11 22:23:55', '2022-03-11 22:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `healths`
--

CREATE TABLE `healths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `health_center_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `healths`
--

INSERT INTO `healths` (`id`, `health_center_name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(6, 'Bibare', 'Kimironko', '0788778899', '2022-03-11 15:45:15', '2022-03-11 15:45:15'),
(7, 'Kimihurura', 'Nyarugenge', '0798877668', '2022-03-11 21:01:19', '2022-03-11 21:01:19'),
(8, 'Downtown', 'Kagugu', '0788000011', '2022-03-11 21:32:55', '2022-03-11 21:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `installments`
--

CREATE TABLE `installments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `healthpost_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pay_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installments`
--

INSERT INTO `installments` (`id`, `membership_id`, `healthpost_id`, `amount`, `due_date`, `pay_date`, `created_at`, `updated_at`) VALUES
(31, 27, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:04:10', '2022-03-11 20:04:10'),
(32, 27, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:04:10', '2022-03-11 20:04:10'),
(33, 28, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:04:48', '2022-03-11 20:04:48'),
(34, 28, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:04:48', '2022-03-11 20:04:48'),
(35, 29, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:05:07', '2022-03-11 20:05:07'),
(36, 29, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:05:07', '2022-03-11 20:05:07'),
(37, 30, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:05:53', '2022-03-11 20:05:53'),
(38, 30, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:05:53', '2022-03-11 20:05:53'),
(39, 31, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:07:35', '2022-03-11 20:07:35'),
(40, 31, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:07:35', '2022-03-11 20:07:35'),
(41, 32, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:17:57', '2022-03-11 20:17:57'),
(42, 32, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:17:57', '2022-03-11 20:17:57'),
(43, 32, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 20:17:57', '2022-03-11 20:17:57'),
(44, 32, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 20:17:57', '2022-03-11 20:17:57'),
(45, 32, 5, '0', '2022-08-08 07:00:00', NULL, '2022-03-11 20:17:57', '2022-03-11 20:17:57'),
(46, 32, 5, '0', '2022-09-07 07:00:00', NULL, '2022-03-11 20:17:57', '2022-03-11 20:17:57'),
(47, 32, 5, '0', '2022-10-07 07:00:00', NULL, '2022-03-11 20:17:57', '2022-03-11 20:17:57'),
(48, 32, 5, '0', '2022-11-06 07:00:00', NULL, '2022-03-11 20:17:57', '2022-03-11 20:17:57'),
(49, 33, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:19:00', '2022-03-11 20:19:00'),
(50, 33, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:19:00', '2022-03-11 20:19:00'),
(51, 33, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 20:19:00', '2022-03-11 20:19:00'),
(52, 33, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 20:19:00', '2022-03-11 20:19:00'),
(53, 33, 5, '0', '2022-08-08 07:00:00', NULL, '2022-03-11 20:19:00', '2022-03-11 20:19:00'),
(54, 33, 5, '0', '2022-09-07 07:00:00', NULL, '2022-03-11 20:19:00', '2022-03-11 20:19:00'),
(55, 33, 5, '0', '2022-10-07 07:00:00', NULL, '2022-03-11 20:19:00', '2022-03-11 20:19:00'),
(56, 33, 5, '0', '2022-11-06 07:00:00', NULL, '2022-03-11 20:19:00', '2022-03-11 20:19:00'),
(57, 33, 5, '0', '2022-12-06 08:00:00', NULL, '2022-03-11 20:19:00', '2022-03-11 20:19:00'),
(58, 34, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:29:59', '2022-03-11 20:29:59'),
(59, 34, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:29:59', '2022-03-11 20:29:59'),
(60, 34, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 20:29:59', '2022-03-11 20:29:59'),
(61, 34, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 20:29:59', '2022-03-11 20:29:59'),
(62, 34, 5, '0', '2022-08-08 07:00:00', NULL, '2022-03-11 20:29:59', '2022-03-11 20:29:59'),
(63, 34, 5, '0', '2022-09-07 07:00:00', NULL, '2022-03-11 20:29:59', '2022-03-11 20:29:59'),
(64, 34, 5, '0', '2022-10-07 07:00:00', NULL, '2022-03-11 20:29:59', '2022-03-11 20:29:59'),
(65, 34, 5, '0', '2022-11-06 07:00:00', NULL, '2022-03-11 20:29:59', '2022-03-11 20:29:59'),
(66, 34, 5, '0', '2022-12-06 08:00:00', NULL, '2022-03-11 20:29:59', '2022-03-11 20:29:59'),
(67, 35, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:32:03', '2022-03-11 20:32:03'),
(68, 35, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:32:03', '2022-03-11 20:32:03'),
(69, 35, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 20:32:03', '2022-03-11 20:32:03'),
(70, 35, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 20:32:03', '2022-03-11 20:32:03'),
(71, 35, 5, '0', '2022-08-08 07:00:00', NULL, '2022-03-11 20:32:03', '2022-03-11 20:32:03'),
(72, 35, 5, '0', '2022-09-07 07:00:00', NULL, '2022-03-11 20:32:03', '2022-03-11 20:32:03'),
(73, 35, 5, '0', '2022-10-07 07:00:00', NULL, '2022-03-11 20:32:03', '2022-03-11 20:32:03'),
(74, 35, 5, '0', '2022-11-06 07:00:00', NULL, '2022-03-11 20:32:03', '2022-03-11 20:32:03'),
(75, 36, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:42:57', '2022-03-11 20:42:57'),
(76, 36, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:42:57', '2022-03-11 20:42:57'),
(77, 36, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 20:42:57', '2022-03-11 20:42:57'),
(78, 36, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 20:42:57', '2022-03-11 20:42:57'),
(79, 36, 5, '0', '2022-08-08 07:00:00', NULL, '2022-03-11 20:42:57', '2022-03-11 20:42:57'),
(80, 37, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:47:07', '2022-03-11 20:47:07'),
(81, 37, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:47:07', '2022-03-11 20:47:07'),
(82, 37, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 20:47:07', '2022-03-11 20:47:07'),
(83, 37, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 20:47:07', '2022-03-11 20:47:07'),
(84, 37, 5, '0', '2022-08-08 07:00:00', NULL, '2022-03-11 20:47:07', '2022-03-11 20:47:07'),
(85, 38, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:47:55', '2022-03-11 20:47:55'),
(86, 38, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:47:55', '2022-03-11 20:47:55'),
(87, 38, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 20:47:55', '2022-03-11 20:47:55'),
(88, 38, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 20:47:55', '2022-03-11 20:47:55'),
(89, 38, 5, '0', '2022-08-08 07:00:00', NULL, '2022-03-11 20:47:55', '2022-03-11 20:47:55'),
(90, 39, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:48:32', '2022-03-11 20:48:32'),
(91, 39, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:48:32', '2022-03-11 20:48:32'),
(92, 39, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 20:48:32', '2022-03-11 20:48:32'),
(93, 39, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 20:48:32', '2022-03-11 20:48:32'),
(94, 39, 5, '0', '2022-08-08 07:00:00', NULL, '2022-03-11 20:48:32', '2022-03-11 20:48:32'),
(95, 40, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:51:39', '2022-03-11 20:51:39'),
(96, 40, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:51:39', '2022-03-11 20:51:39'),
(97, 40, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 20:51:39', '2022-03-11 20:51:39'),
(98, 40, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 20:51:39', '2022-03-11 20:51:39'),
(99, 40, 5, '0', '2022-08-08 07:00:00', NULL, '2022-03-11 20:51:39', '2022-03-11 20:51:39'),
(105, 42, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:56:58', '2022-03-11 20:56:58'),
(106, 42, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:56:58', '2022-03-11 20:56:58'),
(107, 42, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 20:56:58', '2022-03-11 20:56:58'),
(108, 42, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 20:56:58', '2022-03-11 20:56:58'),
(109, 43, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 20:59:07', '2022-03-11 20:59:07'),
(110, 43, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 20:59:07', '2022-03-11 20:59:07'),
(111, 43, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 20:59:07', '2022-03-11 20:59:07'),
(112, 43, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 20:59:07', '2022-03-11 20:59:07'),
(113, 43, 5, '0', '2022-08-08 07:00:00', NULL, '2022-03-11 20:59:07', '2022-03-11 20:59:07'),
(114, 43, 5, '0', '2022-09-07 07:00:00', NULL, '2022-03-11 20:59:07', '2022-03-11 20:59:07'),
(115, 43, 5, '0', '2022-10-07 07:00:00', NULL, '2022-03-11 20:59:07', '2022-03-11 20:59:07'),
(116, 43, 5, '0', '2022-11-06 07:00:00', NULL, '2022-03-11 20:59:07', '2022-03-11 20:59:07'),
(117, 43, 5, '0', '2022-12-06 08:00:00', NULL, '2022-03-11 20:59:07', '2022-03-11 20:59:07'),
(121, 45, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 21:13:06', '2022-03-11 21:13:06'),
(122, 45, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 21:13:06', '2022-03-11 21:13:06'),
(123, 45, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 21:13:06', '2022-03-11 21:13:06'),
(124, 45, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 21:13:06', '2022-03-11 21:13:06'),
(125, 46, 5, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 21:18:41', '2022-03-11 21:18:41'),
(126, 46, 5, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 21:18:41', '2022-03-11 21:18:41'),
(127, 46, 5, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 21:18:41', '2022-03-11 21:18:41'),
(128, 46, 5, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 21:18:41', '2022-03-11 21:18:41'),
(129, 47, 7, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 21:33:33', '2022-03-11 21:33:33'),
(130, 47, 7, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 21:33:33', '2022-03-11 21:33:33'),
(131, 48, 8, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 21:55:40', '2022-03-11 21:55:40'),
(132, 48, 8, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 21:55:40', '2022-03-11 21:55:40'),
(133, 48, 8, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 21:55:40', '2022-03-11 21:55:40'),
(134, 48, 8, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 21:55:40', '2022-03-11 21:55:40'),
(135, 49, 8, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 22:22:22', '2022-03-11 22:22:22'),
(136, 49, 8, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 22:22:22', '2022-03-11 22:22:22'),
(137, 49, 8, '0', '2022-06-09 07:00:00', NULL, '2022-03-11 22:22:22', '2022-03-11 22:22:22'),
(138, 49, 8, '0', '2022-07-09 07:00:00', NULL, '2022-03-11 22:22:22', '2022-03-11 22:22:22'),
(139, 50, 9, '0', '2022-04-10 07:00:00', NULL, '2022-03-11 22:24:10', '2022-03-11 22:24:10'),
(140, 50, 9, '0', '2022-05-10 07:00:00', NULL, '2022-03-11 22:24:10', '2022-03-11 22:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fullname`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(6, 'Hadassah', '0788221133', 'hadassah@gmail.com', 'Inganji', '2022-03-11 15:44:36', '2022-03-11 15:44:36'),
(7, 'Hehe', '0788996677', 'heh@gmail.com', 'Kimironko', '2022-03-11 21:00:46', '2022-03-11 21:00:46'),
(8, 'Marup', '0722343434', 'marup@gmail.com', 'Kagugu', '2022-03-11 21:32:35', '2022-03-11 21:32:35'),
(9, 'Amani', '0722332233', 'amani@gmail.com', 'Nyabugogo', '2022-03-11 21:54:32', '2022-03-11 21:54:32'),
(10, 'Lil', '0788665544', 'lil@gmail.com', 'Manhattan', '2022-03-11 22:23:10', '2022-03-11 22:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `healthpost_id` bigint(20) UNSIGNED NOT NULL,
  `no_of_installment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extended` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `healthpost_id`, `no_of_installment`, `total_price`, `extended`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(42, 5, '4', '200000', NULL, '2022-04-10', NULL, '0', '2022-03-11 20:56:58', '2022-03-11 21:01:59'),
(43, 5, '9', '200000', NULL, '2022-04-10', NULL, '0', '2022-03-11 20:59:06', '2022-03-11 20:59:06'),
(45, 5, '4', '200000', NULL, '2022-04-10', NULL, '0', '2022-03-11 21:13:06', '2022-03-11 21:13:06'),
(46, 5, '4', '200000', NULL, '2022-04-10', NULL, '0', '2022-03-11 21:18:41', '2022-03-11 21:18:41'),
(47, 7, '2', '10000', NULL, '2022-04-10', NULL, '0', '2022-03-11 21:33:32', '2022-03-11 21:33:32'),
(48, 8, '4', '4000', NULL, '2022-04-10', NULL, '0', '2022-03-11 21:55:40', '2022-03-11 21:55:40'),
(49, 8, '4', '4000', NULL, '2022-04-10', NULL, '0', '2022-03-11 22:22:22', '2022-03-11 22:22:22'),
(50, 9, '2', '200', NULL, '2022-04-10', NULL, '0', '2022-03-11 22:24:09', '2022-03-11 22:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_22_081727_create_permission_tables', 1),
(6, '2021_09_24_100831_create_health_table', 1),
(7, '2021_10_09_085343_create_members_table', 1),
(8, '2022_01_25_111110_create_healthposts_table', 1),
(9, '2022_01_27_134806_create_memberships_table', 1),
(10, '2022_02_01_140043_create_installments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nyinawabasinga Keza Esther', 'singesther2000@gmail.com', NULL, '$2y$10$//hpBVxSQlVeFB5ariPFaug6u0RPRCjKByojrodUqqQTCJiHNQKkO', NULL, '2022-03-08 16:34:55', '2022-03-08 16:34:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `healthposts`
--
ALTER TABLE `healthposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `healthposts_healthcenter_id_foreign` (`healthcenter_id`),
  ADD KEY `healthposts_owner_id_foreign` (`owner_id`);

--
-- Indexes for table `healths`
--
ALTER TABLE `healths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installments`
--
ALTER TABLE `installments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `installments_membership_id_foreign` (`membership_id`),
  ADD KEY `installments_healthpost_id_foreign` (`healthpost_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberships_healthpost_id_foreign` (`healthpost_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `healthposts`
--
ALTER TABLE `healthposts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `healths`
--
ALTER TABLE `healths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `installments`
--
ALTER TABLE `installments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `healthposts`
--
ALTER TABLE `healthposts`
  ADD CONSTRAINT `healthposts_healthcenter_id_foreign` FOREIGN KEY (`healthcenter_id`) REFERENCES `healths` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `healthposts_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `installments`
--
ALTER TABLE `installments`
  ADD CONSTRAINT `installments_healthpost_id_foreign` FOREIGN KEY (`healthpost_id`) REFERENCES `healthposts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `installments_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_healthpost_id_foreign` FOREIGN KEY (`healthpost_id`) REFERENCES `healthposts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
