-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2017 at 11:35 PM
-- Server version: 5.7.17
-- PHP Version: 7.0.17-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(10) UNSIGNED NOT NULL,
  `building_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_rent` tinyint(4) NOT NULL,
  `building_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_type` tinyint(4) NOT NULL,
  `building_small_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_meta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_large_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `building_name`, `building_price`, `building_rent`, `building_area`, `building_type`, `building_small_description`, `building_meta`, `building_large_description`, `created_at`, `updated_at`, `user_id`, `rooms`, `status`, `image`, `month`, `year`) VALUES
(1, 'فيلا 1', '5000000', 0, '500', 1, 'فيلا 1', 'فيلا 1', 'فيلا 1', '2017-03-30 20:44:18', '2017-03-30 18:50:42', 2, 5, 1, 'Villa.jpg', '03', '2017'),
(2, 'فيلا 2', '80000000', 0, '800', 1, 'فيلا 2', 'فيلا 2', 'فيلا 2', '2017-05-03 15:22:13', '2017-05-03 15:22:13', 2, 5, 1, 'villa2.jpg', '03', '2017'),
(3, 'فيلا 3', '10000000', 1, '1000', 1, 'فيلا 3', 'فيلا 3', 'فيلا 3', '2018-05-04 15:23:47', '2018-05-04 15:23:47', 2, 10, 1, '', '05', '2018'),
(4, 'فيلا 4', '3000000', 1, '300', 1, 'فيلا 4', 'فيلا 4', 'فيلا 4', '2018-06-07 15:25:17', '2018-06-07 15:25:17', 2, 3, 1, '', '06', '2018'),
(5, 'شقة 1', '600000', 0, '600', 0, 'شقة 1', 'شقة 1', 'شقة 1', '2018-07-03 15:29:31', '2018-07-03 15:29:31', 2, 6, 1, 'flat.jpg', '07', '2018'),
(6, 'شقة 2', '500000', 1, '500', 0, 'شقة 2', 'شقة 2', 'شقة 2', '2018-12-06 15:30:56', '2018-12-06 15:30:56', 2, 5, 1, 'flat2.jpg', '12', '2018'),
(7, 'شقة 3', '300000', 1, '300', 0, 'شقة 3', 'شقة 3', 'شقة 3', '2018-12-11 15:33:36', '2018-12-11 15:33:36', 2, 3, 1, 'flat3.jpg', '12', '2018'),
(8, 'شاليه 1', '30000000', 0, '300', 2, 'شاليه 1', 'شاليه 1', 'شاليه 1', '2017-01-07 15:48:23', '2017-01-07 15:48:23', 2, 3, 1, 'chalet.jpg', '02', '2017'),
(9, 'شاليه 1', '50000000', 0, '500', 2, 'شاليه 2', 'شاليه 2', 'شاليه 2', '2017-01-09 15:49:59', '2017-01-09 15:49:59', 2, 5, 1, 'chalet2.jpg', '02', '2017'),
(10, 'شاليه 3', '6000000', 0, '600', 2, 'شاليه 3', 'شاليه 3', 'شاليه 3', '2017-03-04 15:51:00', '2017-03-04 15:51:00', 2, 6, 0, 'chalet3.jpg', '03', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_view` tinyint(4) NOT NULL,
  `contact_type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `contact_email`, `contact_message`, `contact_view`, `contact_type`, `created_at`, `updated_at`) VALUES
(2, 'Hosam Shafik', 'admin@rs.com', 'LoL XD', 1, 2, '2017-04-27 12:22:06', '2017-04-27 13:42:14'),
(3, 'Hosam Shafik', 'admin@rs.com', 'In Brightest Day\r\nIn Blackest Night', 1, 1, '2017-04-27 12:29:02', '2017-04-27 12:31:40'),
(4, 'Hosam Shafik', 'admin@rs.com', 'In Brightest Day\r\nIn Blackest Night', 0, 1, '2017-04-27 12:38:10', '2017-04-27 12:38:10'),
(5, 'Hosam Shafik', 'admin@rs.com', 'In Brightest Day\r\nIn Blackest Night', 0, 1, '2017-04-27 12:38:29', '2017-04-27 12:38:29'),
(6, 'Hosam Shafik', 'admin@rs.com', '\'Prey on the weak and you will survive, prey on the strong and you will live.', 0, 1, '2017-04-27 12:44:29', '2017-04-27 12:44:29'),
(7, 'Hosam Shafik', 'admin@rs.com', '\'Prey on the weak and you will survive, prey on the strong and you will live.', 0, 1, '2017-04-27 12:44:54', '2017-04-27 12:44:54'),
(8, 'Hosam Shafik', 'admin@rs.com', '\'Prey on the weak and you will survive, prey on the strong and you will live.', 0, 2, '2017-04-27 12:45:15', '2017-04-27 12:45:15'),
(9, 'Hosam Shafik', 'admin@rs.com', '\'Prey on the weak and you will survive, prey on the strong and you will live.', 0, 1, '2017-04-27 12:46:03', '2017-04-27 12:46:03'),
(10, 'Hosam Shafik', 'admin@rs.com', '\'Prey on the weak and you will survive, prey on the strong and you will live.', 0, 2, '2017-04-27 12:46:12', '2017-04-27 12:46:12'),
(11, 'Hosam Mohamed Shafik', 'admin@rs.com', '.The cycle of life and death continues; we will live, they will die', 1, 1, '2017-04-27 12:48:56', '2017-04-27 12:51:29'),
(12, 'Hosam Shafik', 'admin@rs.com', 'redirect(\'adminpanel/contact\')', 0, 1, '2017-04-27 12:50:08', '2017-04-27 12:50:08');

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
(3, '2017_04_07_172457_create_admins_table', 2),
(4, '2017_04_14_113520_create_site_settings_table', 3),
(5, '2017_04_15_114814_create_buildings_table', 4),
(6, '2017_04_15_115757_add_user_id_to_buildings_table', 5),
(7, '2017_04_15_131641_add_rooms_to_buildings_table', 6),
(8, '2017_04_15_212106_add_status_to_buildings_table', 7),
(9, '2017_04_21_213824_add_building_image_to_buildings_table', 8),
(10, '2017_04_25_231909_create_contact_table', 9);

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
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_setting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `slug`, `name_setting`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'اسم الموقع', 'site_name', 'بيتك للعقارات', 0, '2017-04-14 22:15:24', '2017-04-21 18:26:40'),
(2, 'الجوال', 'mobile', '01276050900', 0, '2017-04-14 22:16:05', '2017-04-15 09:38:28'),
(3, 'فيسبوك', 'facebook', 'www.facebook.com', 0, '2017-04-14 22:16:38', '2017-04-14 22:16:39'),
(4, 'تويتر', 'twitter', 'www.twitter.com', 0, '2017-04-14 22:17:01', '2017-04-14 22:17:02'),
(5, 'لينكد إن', 'linkedIn', 'www.linkedin.com', 0, '2017-04-14 22:17:38', '2017-04-14 22:17:39'),
(6, 'جوجل بلس', 'googlePlus', 'www.plus.google.com', 0, '2017-04-14 22:18:03', '2017-04-14 22:18:08'),
(7, 'العنوان', 'address', 'احمد فهيم', 0, '2017-04-14 22:18:32', '2017-04-14 22:18:33'),
(8, 'الكلمات الدلالية', 'keywords', 'الكلمات الدلالية', 1, '2017-04-14 22:19:05', '2017-04-14 22:19:11'),
(9, 'وصف الموقع', 'description', 'وصف الموقع', 1, '2017-04-14 22:19:32', '2017-04-14 22:19:37'),
(10, 'صورة بديلة', 'no_image', 'http://placehold.it/650x450&text=عقار', 0, '2017-04-21 21:29:55', '2017-04-21 19:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@rs.com', '$2y$10$EdNHfRYa15D/SnRH11OUiujCF4wnx0WOIHG9v3ubBLxhhS6OHx5iy', 1, 'yxdMnsWg3gDlX2ag92m87fUVUYquz8IXqK2f3731TfR6qYSKIhWhIhJGBzsx', '2017-05-01 22:33:25', '2017-05-02 10:51:21'),
(8, 'Hosam Shafik', 'hms10@outlook.com', '$2y$10$KQOyUF/yckKiXRhlLyEPQO/9VRxTxGkOx5ZUSb8hfnOK5xAYPHR8.', NULL, 'G5LGn4MCd9eYJopx892EbUwiLoXEmLcEGaKE3X0cjcBdb2q85IfH42xWYRgg', '2017-04-13 09:54:11', '2017-04-16 21:16:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
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
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
