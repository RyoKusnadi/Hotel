-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2020 at 07:02 PM
-- Server version: 10.3.22-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `roomtype_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `total` int(11) NOT NULL,
  `discount_id` bigint(20) UNSIGNED DEFAULT NULL,
  `final_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `bookno`, `bookby`, `userid`, `room_id`, `roomtype_id`, `status`, `check_in`, `check_out`, `total`, `discount_id`, `final_price`, `created_at`, `updated_at`) VALUES
(1, 'INV2020-1', NULL, '10', NULL, 2, 'APPROVED', '2020-05-19', '2020-05-21', 3000000, NULL, 3000000, '2020-05-19 06:14:10', '2020-05-19 06:16:20'),
(2, 'INV2020-2', NULL, '10', NULL, 2, 'CANCEL', '2020-05-18', '2020-05-19', 1500000, NULL, 1500000, '2020-05-19 06:15:06', '2020-05-19 06:16:23'),
(3, 'INV2020-3', NULL, '10', NULL, 2, 'APPROVED', '2020-05-20', '2020-05-21', 1500000, NULL, 1500000, '2020-05-19 06:15:20', '2020-05-19 06:16:33'),
(4, 'INV2020-4', NULL, '11', NULL, 2, 'WAITING', '2020-05-20', '2020-05-21', 1500000, NULL, 1500000, '2020-05-20 04:55:59', '2020-05-20 04:55:59'),
(5, 'INV2020-5', NULL, '13', NULL, 2, 'APPROVED', '2020-05-20', '2020-05-21', 1500000, NULL, 1500000, '2020-05-20 05:37:20', '2020-05-20 05:42:40'),
(6, 'INV2020-6', NULL, '1', NULL, 2, 'WAITING', '2020-05-20', '2020-05-22', 3000000, NULL, 3000000, '2020-05-20 08:48:55', '2020-05-20 08:48:55'),
(7, 'INV2020-7', NULL, '12', NULL, 2, 'WAITING', '2020-05-29', '2020-05-12', 25500000, NULL, 25500000, '2020-05-22 22:44:24', '2020-05-22 22:44:24'),
(8, 'INV2020-8', NULL, '12', NULL, 2, 'WAITING', '2020-05-20', '2020-05-25', 7500000, NULL, 7500000, '2020-05-25 01:00:54', '2020-05-25 01:00:54'),
(9, 'INV2020-9', NULL, '12', NULL, 2, 'WAITING', '2020-05-20', '2020-05-25', 7500000, NULL, 7500000, '2020-05-25 01:01:29', '2020-05-25 01:01:29'),
(10, 'INV2020-10', NULL, '12', NULL, 2, 'WAITING', '2020-05-25', '2020-05-27', 3000000, NULL, 3000000, '2020-05-25 01:02:30', '2020-05-25 01:02:30'),
(11, 'INV2020-11', NULL, '14', NULL, 2, 'WAITING', '2020-05-25', '2020-05-26', 1500000, NULL, 1500000, '2020-05-25 02:05:07', '2020-05-25 02:05:07'),
(12, 'INV2020-12', NULL, '14', NULL, 2, 'WAITING', '2020-05-25', '2020-05-26', 1500000, NULL, 1500000, '2020-05-25 02:17:39', '2020-05-25 02:17:39'),
(13, 'INV2020-13', NULL, '14', NULL, 2, 'WAITING', '2020-05-25', '2020-05-27', 3000000, NULL, 3000000, '2020-05-25 02:21:00', '2020-05-25 02:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `extraservices`
--

CREATE TABLE `extraservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extraservices`
--

INSERT INTO `extraservices` (`id`, `room_id`, `facility_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '-', '2020-05-19 06:07:10', '2020-05-19 06:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `hotelfacilities`
--

CREATE TABLE `hotelfacilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotelfacilities`
--

INSERT INTO `hotelfacilities` (`id`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Swimming Pool', 0, NULL, '2020-05-19 06:06:53', '2020-05-19 06:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2020_05_08_135021_create_room_prices', 2),
(21, '2020_05_11_153515_create_hotel_facilities', 5),
(29, '2020_05_11_160644_create_extra_services', 6),
(30, '2020_05_12_123830_create_room_discounts', 7),
(34, '2020_05_07_090814_create_room_types', 8),
(36, '2020_05_09_183436_create_rooms', 9),
(38, '2020_05_13_144624_create_bookings', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roomdiscounts`
--

CREATE TABLE `roomdiscounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `usedcount` int(11) NOT NULL DEFAULT 0,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_date` date NOT NULL,
  `valid_until` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roomdiscounts`
--

INSERT INTO `roomdiscounts` (`id`, `name`, `value`, `usedcount`, `description`, `valid_date`, `valid_until`, `created_at`, `updated_at`) VALUES
(5, 'Idul Fitri Discount', 5, 0, NULL, '2020-05-01', '2020-06-30', '2020-05-17 04:41:36', '2020-05-17 04:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roomNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomtype_id` bigint(20) UNSIGNED NOT NULL,
  `floor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beds` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomPicture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxCapacity` int(11) NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomNo`, `roomtype_id`, `floor`, `beds`, `status`, `roomPicture`, `maxCapacity`, `remark`, `created_at`, `updated_at`) VALUES
(3, 'A101', 2, '1', 1, 'USED', 'phpZGriVL.jpg', 3, NULL, '2020-05-17 01:43:51', '2020-05-19 06:17:07'),
(4, 'A201', 3, '2', 1, 'AVAILABLE', 'phpo1gIw2.jpg', 3, NULL, '2020-05-17 01:44:13', '2020-05-17 04:45:35'),
(5, 'A301', 4, '3', 2, 'AVAILABLE', 'phpCTrADh.jpg', 5, NULL, '2020-05-17 01:44:38', '2020-05-17 04:45:41'),
(6, 'A401', 5, '4', 3, 'AVAILABLE', 'phpIIHSPx.jpg', 6, NULL, '2020-05-17 01:45:09', '2020-05-17 04:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `roomtypes`
--

CREATE TABLE `roomtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roomtypes`
--

INSERT INTO `roomtypes` (`id`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Suite Rooms', 1500000, NULL, '2020-05-17 01:41:48', '2020-05-17 01:41:48'),
(3, 'Standard Room', 1200000, NULL, '2020-05-17 01:42:10', '2020-05-17 01:42:10'),
(4, 'Family Room', 1700000, NULL, '2020-05-17 01:42:27', '2020-05-17 01:42:27'),
(5, 'Deluxe Room', 2100000, NULL, '2020-05-17 01:42:43', '2020-05-17 01:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '082169652691', 'admin@domain.com', NULL, '$2y$10$AHeNDYj3snuMDOcqibC3Qe15W4dZxGTwI7agE8vvzZI9jJ6MmRUxe', NULL, '2020-05-17 01:40:05', '2020-05-17 01:40:05'),
(3, 'wilwil', NULL, '081312412312', 'wil123@gmail.com', NULL, '$2y$10$W6SW7nFuDOVE87vM4jvt/eld1Ou8Btjbe6sGXacgLMUJwZPJiSaaa', NULL, '2020-05-17 05:47:21', '2020-05-17 05:47:21'),
(4, 'User', NULL, '09128747821365', 'usermail@gmail.com', NULL, '$2y$10$YIElUrCmZqGnLyuq8ADzYuUPyK9PzDhpFcvmqgb2hDzpsqEIQv4L2', NULL, '2020-05-17 05:47:56', '2020-05-17 05:47:56'),
(5, 'Avian', NULL, '08667273666', 'abyss5238@gmail.com', NULL, '$2y$10$.RbyYB5bzDadxztX4sgpoOJFZ0XZUxncLjMlG.xtZJcdO/nAEhgl.', NULL, '2020-05-17 05:56:13', '2020-05-17 05:56:13'),
(7, 'Chris Tiano', NULL, '081364979927', 'chrisferbia@gmail.com', NULL, '$2y$10$L9HIe8peQZIPo9ZGE3YUR.2eBRYmmx8ovW99s4nyzZbhIY055bzuu', NULL, '2020-05-18 01:00:58', '2020-05-18 01:00:58'),
(10, 'coba1', 'admin', '082169652699', 'makan@gmail.com', NULL, '$2y$10$jjvyGaEwQPmS5uzDyDG0leOS0iw5esjPXHsPA9OSppOAPrac0MZxC', NULL, '2020-05-19 06:09:26', '2020-05-25 02:03:19'),
(11, 'ryo', NULL, '082169652699', 'manasaja@gmail.com', NULL, '$2y$10$xT1gasoLW4Zu5r5cbgwV.eb/2GpH.wWPncUvCiIGHiZoqNuOAf6QC', NULL, '2020-05-20 04:55:42', '2020-05-20 04:55:42'),
(12, 'user2', NULL, '082169652699', 'user@domain.com', NULL, '$2y$10$.G4wyVVs9wonBoQOClpXUur9iWdpKrPb8pVIrQexf5wNQLDBT2u/y', NULL, '2020-05-20 05:07:56', '2020-05-25 01:58:51'),
(13, 'Testing', NULL, '03742843242', 'test@yahoo.com', NULL, '$2y$10$DeZvybtcQFh.NAcYD1lTjuXnwFdRkkJI0kNArv43L1cHrbxdBLHca', NULL, '2020-05-20 05:37:01', '2020-05-20 05:37:01'),
(14, 'coba', NULL, '12345678901', 'coba@gmail.com', NULL, '$2y$10$KE2I.35Pl7RfSHHKqMTLduDlUtklSd1kgFyRZ2FjOEvlGu7w7AUtW', NULL, '2020-05-25 02:01:30', '2020-05-25 02:01:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`),
  ADD KEY `bookings_roomtype_id_foreign` (`roomtype_id`),
  ADD KEY `bookings_discount_id_foreign` (`discount_id`);

--
-- Indexes for table `extraservices`
--
ALTER TABLE `extraservices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extraservices_room_id_foreign` (`room_id`),
  ADD KEY `extraservices_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `hotelfacilities`
--
ALTER TABLE `hotelfacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roomdiscounts`
--
ALTER TABLE `roomdiscounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_roomtype_id_foreign` (`roomtype_id`);

--
-- Indexes for table `roomtypes`
--
ALTER TABLE `roomtypes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `extraservices`
--
ALTER TABLE `extraservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotelfacilities`
--
ALTER TABLE `hotelfacilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `roomdiscounts`
--
ALTER TABLE `roomdiscounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roomtypes`
--
ALTER TABLE `roomtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `roomdiscounts` (`id`),
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `bookings_roomtype_id_foreign` FOREIGN KEY (`roomtype_id`) REFERENCES `roomtypes` (`id`);

--
-- Constraints for table `extraservices`
--
ALTER TABLE `extraservices`
  ADD CONSTRAINT `extraservices_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `hotelfacilities` (`id`),
  ADD CONSTRAINT `extraservices_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_roomtype_id_foreign` FOREIGN KEY (`roomtype_id`) REFERENCES `roomtypes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
