-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2019 at 07:50 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1212121', 1, NULL, NULL, NULL),
(2, 5, '', 1, '2019-10-23 07:00:00', '2019-10-23 07:00:00', '2019-10-23 07:00:00'),
(3, 6, '', 1, '2019-10-24 07:00:00', '2019-10-24 07:00:00', '2019-10-24 07:00:00'),
(4, 7, 'YUDbRVvIwAXGTIZ11B79iHNtXgoBtyvM', 1, '2019-11-02 12:48:48', '2019-11-02 12:48:48', '2019-11-02 12:48:48'),
(5, 8, 'RoKWXpngpUMRWbTDHcmSQgfFyOjtRVMg', 1, '2019-11-05 20:32:39', '2019-11-05 20:32:39', '2019-11-05 20:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_draft` int(11) NOT NULL DEFAULT '0',
  `booking_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_purchase` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `purchasing_websites` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `items_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conv_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organic_currency_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_weight_g` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orgnaic_shipping_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loss_or_disc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipment_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bsd_bill` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_charge` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organic_cost` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_reference` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loss_or_profit` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `type`, `is_draft`, `booking_id`, `user_id`, `status`, `customer_name`, `date_of_purchase`, `date`, `purchasing_websites`, `items_order`, `order_value`, `conv_rate`, `currency_bill`, `organic_currency_cost`, `shipping_rate`, `shipping_weight_g`, `shipping_bill`, `orgnaic_shipping_cost`, `customer_paid`, `payment_method`, `payment`, `payment_reference`, `due`, `loss_or_disc`, `total_cost`, `currency_profit`, `shipping_profit`, `total_profit`, `remarks`, `shipment_no`, `deleted_at`, `created_at`, `updated_at`, `bsd_bill`, `weight_charge`, `organic_cost`, `order_reference`, `loss_or_profit`) VALUES
(1, NULL, 1, '476970881', 5, 'process', 'Md Sahidur Rahman', NULL, '2019-11-16', NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, '$0.05', NULL, NULL, '120', 'ssl', '$100', NULL, NULL, '10', '1', '80', 'High', NULL, NULL, '2019-11-16 21:45:48', '2019-11-16 22:09:24', '$120', '$10', '$0.001', 'facebook', '10'),
(2, NULL, 1, '477470882', 5, 'booked', NULL, NULL, '2019-11-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1212', '121212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-21 09:18:25', '2019-11-21 09:18:25', NULL, NULL, NULL, NULL, NULL),
(3, NULL, 0, '2019112300003', 5, 'booked', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-22 22:44:35', '2019-11-22 22:44:35', NULL, NULL, NULL, NULL, NULL),
(4, NULL, 1, '2019112300004', 5, 'booked', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123213', '123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-23 00:22:08', '2019-11-23 00:22:08', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_draft` int(11) NOT NULL DEFAULT '0',
  `is_shipment` int(11) NOT NULL DEFAULT '0',
  `is_payment` int(1) NOT NULL DEFAULT '0',
  `booking_id` int(10) UNSIGNED NOT NULL,
  `is_admin_aproved` int(11) NOT NULL DEFAULT '0',
  `is_aproved_user_id` int(11) DEFAULT NULL,
  `order_no` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipment_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `is_draft`, `is_shipment`, `is_payment`, `booking_id`, `is_admin_aproved`, `is_aproved_user_id`, `order_no`, `status`, `shipment_no`, `deleted_at`, `created_at`, `updated_at`, `name`, `link`, `price`, `offer`, `quantity`, `note`) VALUES
(1, 1, 1, 0, 1, 1, 1, '1000001', 'complete', NULL, NULL, '2019-11-16 21:45:48', '2019-11-16 22:11:00', 'Md Sahidur Rahman', 'https://youtube.com', '120', '10%', '1500', 'Md Sahidur Rahman'),
(2, 1, 1, 0, 1, 1, 1, '1000001', 'complete', NULL, NULL, '2019-11-16 21:45:48', '2019-11-16 22:11:00', 'Md Sahidur Rahman', 'https://youtube.com', '120', '10%', '1500', 'Md Sahidur Rahman'),
(3, 1, 0, 0, 1, 0, NULL, NULL, 'pending', NULL, NULL, '2019-11-16 21:45:48', '2019-11-16 21:52:10', 'Md Sahidur Rahman', 'https://youtube.com', '120', '10%', '1500', 'Md Sahidur Rahman'),
(4, 1, 0, 1, 2, 0, NULL, NULL, 'complete', NULL, NULL, '2019-11-21 09:18:25', '2019-11-23 00:02:38', 'shohid 2', '1321', '1212', '212', '121212', 'shohid 2'),
(5, 1, 0, 1, 2, 0, NULL, NULL, 'complete', NULL, NULL, '2019-11-21 09:18:25', '2019-11-23 00:02:38', 'shohid 2', '1321', '1212', '212', '121212', 'shohid 2'),
(6, 1, 0, 0, 2, 0, NULL, NULL, 'pending', NULL, NULL, '2019-11-21 09:18:25', '2019-11-21 09:18:55', 'shohid 2', '1321', '1212', '212', '121212', 'shohid 2'),
(7, 1, 0, 1, 2, 0, NULL, NULL, 'complete', NULL, NULL, '2019-11-21 09:18:25', '2019-11-23 00:02:38', 'shohid 2', '1321', '1212', '212', '121212', 'shohid 2'),
(8, 1, 0, 1, 2, 0, NULL, NULL, 'complete', NULL, NULL, '2019-11-21 09:18:25', '2019-11-23 00:02:38', 'shohid 2', '1321', '1212', '212', '121212', 'shohid 2'),
(9, 0, 0, 0, 3, 0, NULL, NULL, 'pending', NULL, NULL, '2019-11-22 22:44:35', '2019-11-22 22:44:35', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 0, 1, 4, 0, NULL, NULL, 'complete', NULL, NULL, '2019-11-23 00:22:08', '2019-11-23 00:24:29', '123213', '23123', '100', '1212', '1212', '123213'),
(11, 1, 0, 1, 4, 0, NULL, NULL, 'complete', NULL, NULL, '2019-11-23 00:27:16', '2019-11-23 00:27:26', '1212', '1212', '200', '1212', '21212', '1212');

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
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(6, '2019_10_04_125839_create_booking_table', 2),
(7, '2019_10_02_163914_create_booking_details_table', 3),
(8, '2019_10_05_183922_create_shipment_table', 4),
(10, '2019_10_30_172906_create_user_details_table', 6),
(11, '2019_10_04_125839_create_payment_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `payment_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availabe_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(24, 1, 'zxETQepGPAQgiKDjU5I1jyu6DjwPoeXG', '2019-09-27 21:41:05', '2019-09-27 21:41:05'),
(25, 1, 'k48sAwzkE0Q2jwjXEHc4oJik7eIQ6OsF', '2019-10-04 19:53:45', '2019-10-04 19:53:45'),
(28, 1, 'aqS7suZXPQAjgbx4VkVNMafQLslD4NEF', '2019-10-05 13:42:38', '2019-10-05 13:42:38'),
(29, 1, 'UHYslOjYwyHe0rF7rXnDOHTPGXQ1y1ci', '2019-10-06 00:50:55', '2019-10-06 00:50:55'),
(31, 1, 'VOWNqxoeKeOLVEmV8iL2GJjfFhC2N5Ot', '2019-10-09 22:56:16', '2019-10-09 22:56:16'),
(32, 5, 'rQEholQ1IOKX7NCeryEeWaDqySFDdB5H', '2019-10-23 23:58:20', '2019-10-23 23:58:20'),
(34, 6, 'fDUP1JbgueFTKWZ66F7T8wEF3XH5pwUZ', '2019-10-24 23:06:43', '2019-10-24 23:06:43'),
(35, 1, 'IP8nlXbsddAQBlUtXvNC29nd5HgakfH7', '2019-10-28 15:21:00', '2019-10-28 15:21:00'),
(38, 5, 'GpYvXY61B7sBjeYhjH9nRZ4gR6PBEPGa', '2019-10-29 14:54:41', '2019-10-29 14:54:41'),
(39, 6, 'y6X9mF2hklgEAg6Tq4cVTuC7RXzUgavH', '2019-10-30 22:49:12', '2019-10-30 22:49:12'),
(42, 1, 'C3sCmTQUZm85DyspMqbMXl6RF5vEIOHE', '2019-11-02 13:17:22', '2019-11-02 13:17:22'),
(47, 1, 'aYik0CMEbZLubaHkKmU6YJDm1Dkm7DLo', '2019-11-02 13:44:30', '2019-11-02 13:44:30'),
(48, 5, '8e5ZHA54M2S2NRVSDcOg2ocTcCYFCpzZ', '2019-11-03 09:54:00', '2019-11-03 09:54:00'),
(49, 1, 'pTUCixsdxgI5p0NMHPOq4K61T8PCAtH2', '2019-11-05 20:31:41', '2019-11-05 20:31:41'),
(50, 1, 'yQg2gdJT2HWqEqk4AqHDcyokuTkVJ7iA', '2019-11-11 19:38:50', '2019-11-11 19:38:50'),
(51, 1, 'A5mNJbbkSUQcKodKpEueZ2zCzgBrZuRy', '2019-11-14 17:52:03', '2019-11-14 17:52:03'),
(53, 1, 'A5FJLi4pVmVnBQgBvxyfs8i5Ui3FPx17', '2019-11-16 22:07:51', '2019-11-16 22:07:51'),
(54, 5, 'UqAhfM1tfsToXRBumumwRTBfFfclNeG8', '2019-11-20 12:24:36', '2019-11-20 12:24:36'),
(55, 5, '3A1dNTmzFmBAuUIi7FKtkMKEbVWxuVKT', '2019-11-21 09:17:41', '2019-11-21 09:17:41'),
(56, 5, 'OHlEI8LIcA1yAuA3dJ4XyaoLWQ6f2ZL7', '2019-11-22 22:30:48', '2019-11-22 22:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Customer', 'customer', '91ec1f9324753048c0096d036a694f86', '2019-10-23 07:00:00', '2019-10-23 07:00:00'),
(2, 'shipment', 'Shipment', 'a4ce6204c90d0838f760601e48448456', '2019-10-24 07:00:00', '2019-10-24 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-10-23 07:00:00', '2019-10-16 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `booking_details_id` int(10) UNSIGNED NOT NULL,
  `booking_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipment_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `user_id`, `booking_details_id`, `booking_number`, `shipment_no`, `order_no`, `quantity`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '4', '476970881', '0', 15, 'paid', NULL, '2019-11-16 22:10:26', '2019-11-16 22:10:26'),
(2, 1, 2, '7', '476970881', '0', 15, 'paid', NULL, '2019-11-16 22:10:26', '2019-11-16 22:10:26'),
(3, 1, 1, '476970881', '476970883', '1000001', 14, NULL, NULL, '2019-11-16 22:11:00', '2019-11-16 22:11:00'),
(4, 1, 2, '476970881', '476970883', '1000001', 14, NULL, NULL, '2019-11-16 22:11:00', '2019-11-16 22:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2019-09-23 00:56:25', '2019-09-23 00:56:25'),
(2, NULL, 'ip', '::1', '2019-09-23 00:56:25', '2019-09-23 00:56:25'),
(3, NULL, 'global', NULL, '2019-09-23 00:57:17', '2019-09-23 00:57:17'),
(4, NULL, 'ip', '::1', '2019-09-23 00:57:17', '2019-09-23 00:57:17'),
(5, NULL, 'global', NULL, '2019-09-23 19:36:36', '2019-09-23 19:36:36'),
(6, NULL, 'ip', '::1', '2019-09-23 19:36:36', '2019-09-23 19:36:36'),
(7, NULL, 'global', NULL, '2019-09-23 19:36:52', '2019-09-23 19:36:52'),
(8, NULL, 'ip', '::1', '2019-09-23 19:36:52', '2019-09-23 19:36:52'),
(9, NULL, 'global', NULL, '2019-09-27 21:40:48', '2019-09-27 21:40:48'),
(10, NULL, 'ip', '::1', '2019-09-27 21:40:48', '2019-09-27 21:40:48'),
(11, NULL, 'global', NULL, '2019-10-04 19:53:33', '2019-10-04 19:53:33'),
(12, NULL, 'ip', '::1', '2019-10-04 19:53:33', '2019-10-04 19:53:33'),
(13, 1, 'user', NULL, '2019-10-04 19:53:33', '2019-10-04 19:53:33'),
(14, NULL, 'global', NULL, '2019-10-09 22:56:00', '2019-10-09 22:56:00'),
(15, NULL, 'ip', '::1', '2019-10-09 22:56:00', '2019-10-09 22:56:00'),
(16, 1, 'user', NULL, '2019-10-09 22:56:00', '2019-10-09 22:56:00'),
(17, NULL, 'global', NULL, '2019-10-10 19:58:34', '2019-10-10 19:58:34'),
(18, NULL, 'ip', '::1', '2019-10-10 19:58:34', '2019-10-10 19:58:34'),
(19, NULL, 'global', NULL, '2019-10-10 19:58:42', '2019-10-10 19:58:42'),
(20, NULL, 'ip', '::1', '2019-10-10 19:58:42', '2019-10-10 19:58:42'),
(21, NULL, 'global', NULL, '2019-10-10 19:58:46', '2019-10-10 19:58:46'),
(22, NULL, 'ip', '::1', '2019-10-10 19:58:46', '2019-10-10 19:58:46'),
(23, NULL, 'global', NULL, '2019-10-28 15:20:30', '2019-10-28 15:20:30'),
(24, NULL, 'ip', '103.218.26.199', '2019-10-28 15:20:30', '2019-10-28 15:20:30'),
(25, NULL, 'global', NULL, '2019-10-28 15:20:43', '2019-10-28 15:20:43'),
(26, NULL, 'ip', '103.218.26.199', '2019-10-28 15:20:43', '2019-10-28 15:20:43'),
(27, NULL, 'global', NULL, '2019-11-02 12:46:43', '2019-11-02 12:46:43'),
(28, NULL, 'ip', '103.231.160.47', '2019-11-02 12:46:43', '2019-11-02 12:46:43'),
(29, NULL, 'global', NULL, '2019-11-02 12:46:56', '2019-11-02 12:46:56'),
(30, NULL, 'ip', '103.231.160.47', '2019-11-02 12:46:56', '2019-11-02 12:46:56'),
(31, NULL, 'global', NULL, '2019-11-14 17:51:40', '2019-11-14 17:51:40'),
(32, NULL, 'ip', '123.108.244.121', '2019-11-14 17:51:40', '2019-11-14 17:51:40'),
(33, NULL, 'global', NULL, '2019-11-16 21:44:07', '2019-11-16 21:44:07'),
(34, NULL, 'ip', '103.135.252.47', '2019-11-16 21:44:07', '2019-11-16 21:44:07'),
(35, 5, 'user', NULL, '2019-11-16 21:44:07', '2019-11-16 21:44:07'),
(36, NULL, 'global', NULL, '2019-11-21 09:17:29', '2019-11-21 09:17:29'),
(37, NULL, 'ip', '45.125.222.48', '2019-11-21 09:17:29', '2019-11-21 09:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `blance` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `status`, `blance`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 0, NULL, 'admin@gmail.com', '$2y$10$umHQtHyOf/6VuTbsvyogGewEDH53wPOvWdy/mir09KUsQWdNejLWq', NULL, '2019-11-16 22:07:51', 'Admin', 'customer@gmail.com', '2019-09-22 07:00:00', '2019-11-16 22:07:51'),
(4, 'customer', 1, NULL, 'john.doe@example.com', '$2y$10$bYXgot/O9aoavv2LZkIbyOUqouFavPOIt55t6aOdohmNwyCOKb1yG', NULL, NULL, 'Warehouse', NULL, '2019-09-23 01:26:23', '2019-11-05 21:44:45'),
(5, 'customer', 1, '1194852', 'customer@gmail.com', '$2y$10$umHQtHyOf/6VuTbsvyogGewEDH53wPOvWdy/mir09KUsQWdNejLWq', '91ec1f9324753048c0096d036a694f86', '2019-11-22 22:30:48', 'Customer', NULL, '2019-10-23 07:00:00', '2019-11-23 00:27:26'),
(6, 'customer', 1, NULL, 'shipment@gmail.com', '$2y$10$umHQtHyOf/6VuTbsvyogGewEDH53wPOvWdy/mir09KUsQWdNejLWq', 'a4ce6204c90d0838f760601e4844845', '2019-10-30 22:49:12', 'Shipment', NULL, '2019-10-24 07:00:00', '2019-11-05 21:44:12'),
(7, 'customer', 1, '12000', 'asif@gmail.com', '$2y$10$lLX.alq1PBCVMCxGi2xfOuqtuJRgHSRjbJk/tkpbUNocE6en8/DU.', NULL, '2019-11-02 13:31:30', 'Asif', 'Sadiq', '2019-11-02 12:48:48', '2019-11-02 13:31:30'),
(8, 'customer', 1, '120', 'PID-2bd@maxim-group.com', '$2y$10$HCJMvLwwIZVVJARjDLUhEOpwZY8YRS2C3RG6ReYsAIaVkC85e3guC', NULL, NULL, 'Warehouse', 'Production', '2019-11-05 20:32:39', '2019-11-05 20:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1 = male, 2 = female',
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_details_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_user_id_foreign` (`user_id`),
  ADD KEY `shipments_booking_details_id_foreign` (`booking_details_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
