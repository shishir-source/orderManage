-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 06:20 PM
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
(3, 6, '', 1, '2019-10-24 07:00:00', '2019-10-24 07:00:00', '2019-10-24 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `type`, `booking_id`, `user_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, '2019101000001', 1, 'booked', NULL, '2019-10-10 21:18:51', '2019-10-10 21:18:51'),
(2, NULL, '2019101000002', 1, 'booked', NULL, '2019-10-10 22:23:03', '2019-10-10 22:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `is_shipment` int(1) NOT NULL DEFAULT '0',
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_purchase` date DEFAULT NULL,
  `purchasing_websites` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `items_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `is_admin_aproved` tinyint(1) NOT NULL DEFAULT '0',
  `is_aproved_user_id` bigint(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_id`, `is_shipment`, `customer_name`, `date_of_purchase`, `purchasing_websites`, `items_order`, `status`, `order_value`, `conv_rate`, `currency_bill`, `organic_currency_cost`, `shipping_rate`, `shipping_weight_g`, `shipping_bill`, `orgnaic_shipping_cost`, `customer_paid`, `payment_method`, `payment_reference`, `due`, `loss_or_disc`, `total_cost`, `currency_profit`, `shipping_profit`, `total_profit`, `remarks`, `shipment_no`, `deleted_at`, `created_at`, `updated_at`, `is_admin_aproved`, `is_aproved_user_id`) VALUES
(1, 1, 0, 'asasas', '2019-10-09', 'asas', 'ssdsdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsdq', 'sdsds', 'sdsd', 'sdsd', 'sdd', 'sdsd', 'sdsd', 'sdsd', 'sdsds', 'sdsd', 'sds', 'sdsd', 'sdsd', 'sdsd', 'sds', NULL, '2019-10-10 21:18:51', '2019-10-10 21:18:51', 0, NULL),
(2, 1, 0, 'asasas', '2019-10-09', 'asas', 'ssdsdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsdq', 'sdsds', 'sdsd', 'sdsd', 'sdd', 'sdsd', 'sdsd', 'sdsd', 'sdsds', 'sdsd', 'sds', 'sdsd', 'sdsd', 'sdsd', 'sds', NULL, '2019-10-10 21:18:51', '2019-10-10 21:18:51', 0, NULL),
(3, 1, 0, 'asasas', '2019-10-09', 'asas', 'ssdsdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsdq', 'sdsds', 'sdsd', 'sdsd', 'sdd', 'sdsd', 'sdsd', 'sdsd', 'sdsds', 'sdsd', 'sds', 'sdsd', 'sdsd', 'sdsd', 'sds', NULL, '2019-10-10 21:18:52', '2019-10-10 21:18:52', 0, NULL),
(4, 1, 0, 'asasas', '2019-10-09', 'asas', 'ssdsdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsdq', 'sdsds', 'sdsd', 'sdsd', 'sdd', 'sdsd', 'sdsd', 'sdsd', 'sdsds', 'sdsd', 'sds', 'sdsd', 'sdsd', 'sdsd', 'sds', NULL, '2019-10-10 21:18:52', '2019-10-10 21:18:52', 0, NULL),
(5, 1, 0, 'asasas', '2019-10-09', 'asas', 'ssdsdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsdq', 'sdsds', 'sdsd', 'sdsd', 'sdd', 'sdsd', 'sdsd', 'sdsd', 'sdsds', 'sdsd', 'sds', 'sdsd', 'sdsd', 'sdsd', 'sds', NULL, '2019-10-10 21:18:52', '2019-10-10 21:18:52', 0, NULL),
(6, 2, 0, 'qwqwqw', '2019-10-10', 'ass', 'sas', 'sas', 'sasSAS', 'ASAS', 'SAS', 'ASAS', 'SAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', NULL, '2019-10-10 22:23:03', '2019-10-10 22:23:03', 0, NULL),
(7, 2, 0, 'qwqwqw', '2019-10-10', 'ass', 'sas', 'sas', 'sasSAS', 'ASAS', 'SAS', 'ASAS', 'SAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', NULL, '2019-10-10 22:23:03', '2019-10-10 22:23:03', 0, NULL),
(8, 2, 0, 'qwqwqw', '2019-10-10', 'ass', 'sas', 'sas', 'sasSAS', 'ASAS', 'SAS', 'ASAS', 'SAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', NULL, '2019-10-10 22:23:03', '2019-10-10 22:23:03', 0, NULL),
(9, 2, 0, 'qwqwqw', '2019-10-10', 'ass', 'sas', 'sas', 'sasSAS', 'ASAS', 'SAS', 'ASAS', 'SAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', NULL, '2019-10-10 22:23:03', '2019-10-10 22:23:03', 0, NULL),
(10, 2, 0, 'qwqwqw', '2019-10-10', 'ass', 'sas', 'sas', 'sasSAS', 'ASAS', 'SAS', 'ASAS', 'SAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', NULL, '2019-10-10 22:23:03', '2019-10-10 22:23:03', 0, NULL),
(11, 2, 0, 'qwqwqw', '2019-10-10', 'ass', 'sas', 'sas', 'sasSAS', 'ASAS', 'SAS', 'ASAS', 'SAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', 'ASAS', NULL, '2019-10-10 22:23:03', '2019-10-10 22:23:03', 0, NULL);

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
(8, '2019_10_05_183922_create_shipment_table', 4);

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
(34, 6, 'fDUP1JbgueFTKWZ66F7T8wEF3XH5pwUZ', '2019-10-24 23:06:43', '2019-10-24 23:06:43');

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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(22, NULL, 'ip', '::1', '2019-10-10 19:58:46', '2019-10-10 19:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `type`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'booking@gmail.com', '$2y$10$umHQtHyOf/6VuTbsvyogGewEDH53wPOvWdy/mir09KUsQWdNejLWq', NULL, '2019-10-10 19:59:05', NULL, NULL, '2019-09-22 07:00:00', '2019-10-10 19:59:05'),
(4, '', 'john.doe@example.com', '$2y$10$bYXgot/O9aoavv2LZkIbyOUqouFavPOIt55t6aOdohmNwyCOKb1yG', NULL, NULL, NULL, NULL, '2019-09-23 01:26:23', '2019-09-23 01:26:23'),
(5, 'customer', 'customer@gmail.com', '$2y$10$umHQtHyOf/6VuTbsvyogGewEDH53wPOvWdy/mir09KUsQWdNejLWq', '91ec1f9324753048c0096d036a694f86', '2019-10-24 22:06:34', 'Customer', NULL, '2019-10-23 07:00:00', '2019-10-24 22:06:34'),
(6, 'shipment', 'shipment@gmail.com', '$2y$10$umHQtHyOf/6VuTbsvyogGewEDH53wPOvWdy/mir09KUsQWdNejLWq', 'a4ce6204c90d0838f760601e4844845', '2019-10-24 23:06:43', 'Shipment', NULL, '2019-10-24 07:00:00', '2019-10-24 23:06:43');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
