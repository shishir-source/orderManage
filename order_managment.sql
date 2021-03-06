-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 08:27 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.1.18

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
(4, 8, '6rSRGZJ1VJ9hf7hxZOOuL9LrR3IN22ti', 1, '2019-10-30 23:16:54', '2019-10-30 23:16:54', '2019-10-30 23:16:54'),
(5, 9, 'O6eJqNZg5nVYuFws4J6Re2H1RTNC9RuU', 1, '2019-10-30 23:18:05', '2019-10-30 23:18:05', '2019-10-30 23:18:05'),
(6, 10, '7xQjcB0IvhPWWCsaO3518uipR8XpLuT8', 1, '2019-10-30 23:19:21', '2019-10-30 23:19:21', '2019-10-30 23:19:21'),
(7, 11, '5tHw1VB1wkJXBvitYv3irJ8A7yYzZkTS', 1, '2019-10-30 23:22:31', '2019-10-30 23:22:31', '2019-10-30 23:22:31'),
(8, 12, 'ORoYSOgZY9XzWJkxqpk2cZzP1y2W6y88', 1, '2019-10-30 23:39:59', '2019-10-30 23:39:59', '2019-10-30 23:39:59'),
(9, 13, 'XlkLwiaxCyNF0bwwz33Ue4w954KCq4ZC', 1, '2019-10-30 23:40:47', '2019-10-30 23:40:47', '2019-10-30 23:40:47'),
(10, 14, 'aSu4aGNBRI78FJJvMwn6Cx4csGy3Ielg', 1, '2019-10-30 23:42:21', '2019-10-30 23:42:21', '2019-10-30 23:42:21'),
(11, 15, 'LBPhSmyaLm7z8PODxbPNfhPJ4dNw0rW3', 1, '2019-11-11 21:10:42', '2019-11-11 21:10:41', '2019-11-11 21:10:42');

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
(1, NULL, 0, '2019111400001', 15, 'booked', NULL, NULL, '2019-11-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'ssl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-15 00:14:43', '2019-11-15 00:56:08', NULL, NULL, NULL, NULL, NULL),
(2, NULL, 1, '2019111400002', 15, 'process', 'sadasdsad', NULL, '2019-11-14', NULL, NULL, NULL, 'sdsad', NULL, NULL, NULL, NULL, NULL, 'sdsad', NULL, NULL, 'qwqwq', 'qwqwqqw', 'sdsad', NULL, NULL, 'sadsad', 'sdasd', 'sadasd', 'sdsadsa', NULL, '2019-11-16 01:12:40', '2019-11-15 00:58:47', '2019-11-16 01:12:40', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'shohid');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_draft` int(11) NOT NULL DEFAULT '0',
  `is_shipment` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `booking_details` (`id`, `is_draft`, `is_shipment`, `booking_id`, `is_admin_aproved`, `is_aproved_user_id`, `order_no`, `status`, `shipment_no`, `deleted_at`, `created_at`, `updated_at`, `name`, `link`, `price`, `offer`, `quantity`, `note`) VALUES
(1, 0, 0, 1, 0, NULL, NULL, 'pending', NULL, NULL, '2019-11-15 00:14:43', '2019-11-16 00:09:04', 'shohid11', 'asa', 'asas', 'asa', '1000', 'shohid11'),
(2, 0, 0, 1, 0, NULL, NULL, 'pending', NULL, NULL, '2019-11-15 00:14:43', '2019-11-16 00:09:04', 'shohid 2', 'asa', 'asas', 'asa', '33333', 'shohid 2'),
(3, 0, 0, 1, 0, NULL, NULL, 'pending', NULL, NULL, '2019-11-15 00:14:43', '2019-11-16 00:09:04', 'shohid 3', 'asa', 'asas', 'asa', '10000', 'shohid 3'),
(6, 1, 1, 2, 1, 1, '1200', 'complete', NULL, NULL, '2019-11-15 00:58:47', '2019-11-16 01:12:40', 'shohid', 'sadd', 'sdf', 'sdfsdf', '10000', 'shohid');

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
(8, '2019_10_05_183922_create_shipment_table', 4),
(9, '2019_10_30_172906_create_user_details_table', 5),
(15, '2019_10_04_125839_create_booking_table', 6);

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
(41, 1, 'HiqtbXKZrBV3ATRGaqeTcZSqQdw8iRmx', '2019-10-31 01:42:35', '2019-10-31 01:42:35'),
(43, 15, '8t3Kks4TKRLUqEgG1MCdt2qrKETsB5PD', '2019-11-11 21:11:19', '2019-11-11 21:11:19'),
(44, 15, '7kYUeQImmV0lwJnoGHKWNzF2aKoVUcHg', '2019-11-14 00:41:33', '2019-11-14 00:41:33'),
(45, 15, 'VqXVjPAymMF8sctOBd6yiSfp5gvHzreP', '2019-11-14 23:04:05', '2019-11-14 23:04:05'),
(48, 1, 'JVATV3d2aPOp15rX87LZ3c8dDVlxEE7q', '2019-11-15 18:16:08', '2019-11-15 18:16:08'),
(49, 1, 'Wxi3Z5jL00drAb9UQOc1Jtd2VBaAgczf', '2019-11-16 03:25:42', '2019-11-16 03:25:42');

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
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `user_id`, `booking_details_id`, `booking_number`, `shipment_no`, `quantity`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 1, 6, '2019111400002', '2019111500001', 10, NULL, NULL, '2019-11-16 00:37:37', '2019-11-16 00:37:37'),
(4, 1, 6, '2019111400002', '2019111500002', 90, NULL, NULL, '2019-11-16 00:39:11', '2019-11-16 00:39:11'),
(5, 1, 6, '2019111400002', '2019111500003', 100, NULL, NULL, '2019-11-16 00:59:39', '2019-11-16 00:59:39'),
(6, 1, 6, '2019111400002', '2019111500004', 9800, NULL, NULL, '2019-11-16 00:59:59', '2019-11-16 00:59:59');

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
(1, NULL, 'global', NULL, '2019-11-11 20:58:42', '2019-11-11 20:58:42'),
(2, NULL, 'ip', '::1', '2019-11-11 20:58:42', '2019-11-11 20:58:42'),
(3, 5, 'user', NULL, '2019-11-11 20:58:42', '2019-11-11 20:58:42'),
(4, NULL, 'global', NULL, '2019-11-11 20:59:00', '2019-11-11 20:59:00'),
(5, NULL, 'ip', '::1', '2019-11-11 20:59:00', '2019-11-11 20:59:00'),
(6, 5, 'user', NULL, '2019-11-11 20:59:00', '2019-11-11 20:59:00'),
(7, NULL, 'global', NULL, '2019-11-11 21:00:12', '2019-11-11 21:00:12'),
(8, NULL, 'ip', '::1', '2019-11-11 21:00:13', '2019-11-11 21:00:13'),
(9, 5, 'user', NULL, '2019-11-11 21:00:13', '2019-11-11 21:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `type` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `status`, `type`, `blance`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '0', 'admin@gmail.com', '$2y$10$umHQtHyOf/6VuTbsvyogGewEDH53wPOvWdy/mir09KUsQWdNejLWq', NULL, '2019-11-16 03:25:42', 'Admin', 'admin', '2019-09-22 07:00:00', '2019-11-16 03:25:42'),
(6, 1, 'shipment', '0', 'shipment@gmail.com', '$2y$10$QcP36Xq.Fx/WiA9ZaHwbVuuaqkyttLrbLNyPIDatTXlE9oijGW5fO', 'a4ce6204c90d0838f760601e4844845', '2019-10-31 01:41:51', 'Shipment', 'shipment', '2019-10-24 07:00:00', '2019-10-31 01:41:51'),
(15, 1, 'customer', '120', 'customer@gmail.com', '$2y$10$d78bSz3algk3tealsOUDe.b0xHMRb2uA95JcjbCaKfIugrJ9HEn3W', NULL, '2019-11-15 18:15:29', 'cutomer', NULL, '2019-11-11 21:10:41', '2019-11-15 18:15:29');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
