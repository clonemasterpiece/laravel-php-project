-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 07:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_cat` int(255) NOT NULL,
  `name_cat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cat`, `name_cat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hotdogs', NULL, NULL, NULL),
(2, 'Burgers', NULL, NULL, NULL),
(3, 'Gyros', NULL, NULL, NULL);

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
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `order_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_food` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`order_id`, `user_id`, `user_address`, `user_phone`, `id_food`, `created_at`, `updated_at`) VALUES
(1, 4, 'Asd 23', '123', 2, NULL, NULL),
(2, 4, 'Zadsf', '887656', 2, NULL, NULL),
(3, 4, 'Asd', '123', 2, NULL, NULL),
(4, 4, 'Mihajla Pupina 29', '832', 1, NULL, NULL),
(5, 4, 'Orderski 1', '51', 2, NULL, NULL),
(6, 4, 'Asd 321', '321', 1, NULL, NULL),
(7, 4, 'Adresa 123', '322', 1, NULL, NULL),
(8, 4, 'Adresa 123', '322', 1, NULL, NULL),
(9, 4, 'Asd 321', '123', 1, NULL, NULL),
(10, 4, 'Asad 252', '451', 3, NULL, NULL),
(11, 4, 'Addee 44', '444', 3, NULL, NULL),
(12, 4, 'Majaa sa 45', '265885622', 73, NULL, NULL),
(14, 4, 'Haskjd asd u 66', '928928298', 68, '2022-12-11 16:30:17', '2022-12-11 16:30:17'),
(15, 4, 'Haskjd asd u 66', '928928298', 68, '2022-12-11 16:33:34', '2022-12-11 16:33:34'),
(16, 4, 'Haskjd asd u 66', '928928298', 68, '2022-12-11 16:33:46', '2022-12-11 16:33:46'),
(17, 4, 'Porudzbina 222', '072888277', 71, '2022-12-11 16:35:02', '2022-12-11 16:35:02'),
(18, 4, 'Milutina Milankovica 88', '0619131115', 70, '2022-12-11 16:37:45', '2022-12-11 16:37:45'),
(19, 4, 'Milutina Milankovica 88', '0619131115', 70, '2022-12-11 16:38:29', '2022-12-11 16:38:29'),
(20, 4, 'Milutina Milankovica 88', '0619131115', 70, '2022-12-11 16:38:43', '2022-12-11 16:38:43'),
(21, 4, 'Milutina Milankovica 88', '0619131115', 70, '2022-12-11 16:39:28', '2022-12-11 16:39:28'),
(22, 4, 'Milutina Milankovica 88', '0619131115', 70, '2022-12-11 16:39:37', '2022-12-11 16:39:37'),
(23, 4, 'Milutina Milankovica 88', '0619131115', 70, '2022-12-11 16:40:24', '2022-12-11 16:40:24'),
(24, 4, 'Milutina Milankovica 88', '0619131115', 70, '2022-12-11 16:40:32', '2022-12-11 16:40:32'),
(25, 4, 'Ulica 123', '0616455895', 74, '2022-12-11 16:41:12', '2022-12-11 16:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id_menu` int(255) NOT NULL,
  `name_menu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `href_menu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `show_menu` int(11) NOT NULL,
  `priority_menu` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id_menu`, `name_menu`, `href_menu`, `show_menu`, `priority_menu`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home', 1, 1, NULL, '2022-12-10 16:46:56'),
(2, 'contact', 'contactForm', 2, 2, NULL, NULL),
(3, 'register', 'registerForm', 0, 3, NULL, NULL),
(4, 'login', 'loginForm', 0, 4, NULL, NULL),
(5, 'logout', 'logOut', 2, 5, NULL, NULL),
(6, 'admin panel', 'adminMessages', 3, 6, NULL, NULL);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `msguser`
--

CREATE TABLE `msguser` (
  `id_msg` int(255) NOT NULL,
  `message_user` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `msguser`
--

INSERT INTO `msguser` (`id_msg`, `message_user`, `id_user`, `created_at`, `updated_at`) VALUES
(9, 'Administratorski', 4, '2022-12-10 00:19:24', '2022-12-10 00:19:24'),
(10, 'Administratorski', 4, '2022-12-10 00:23:44', '2022-12-10 00:23:44'),
(11, 'Administratorski', 4, '2022-12-10 00:24:56', '2022-12-10 00:24:56'),
(13, 'Administratorski', 4, '2022-12-10 00:26:22', '2022-12-10 00:26:22'),
(15, 'Administratorski', 4, '2022-12-10 00:29:14', '2022-12-10 00:29:14');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(255) NOT NULL,
  `src` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kategorija_id` int(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cena`, `src`, `alt`, `kategorija_id`, `created_at`, `updated_at`) VALUES
(67, 'Burger Double', 325, 'burger-11670775863.jpg', 'Burger Double', 2, NULL, '2022-12-11 15:24:23'),
(68, 'Chicken Burger', 279, 'burger-21670775871.jpg', 'Chicken Burger', 2, NULL, '2022-12-11 15:24:31'),
(69, 'Double Burger', 319, 'burger-31670775878.png', 'Double Burger', 2, NULL, '2022-12-11 15:24:38'),
(70, 'Burger Fantastic', 419, 'burger-41670775885.jpg', 'Burger Fantastic', 2, NULL, '2022-12-11 15:24:45'),
(71, 'PulledPork Hotdog', 149, 'hotdog-11670775894.jpg', 'PulledPork Hotdog', 1, NULL, '2022-12-11 15:24:54'),
(72, 'Cheese Doggie', 239, 'hotdog-21670775903.jpg', 'Cheese Doggie', 1, NULL, '2022-12-11 15:25:03'),
(73, 'NewYork Hotdog', 243, 'hotdog-41670775951.jpg', 'NewYork Hotdog', 1, NULL, '2022-12-11 15:25:51'),
(74, 'Classic Hotdog', 199, 'hotdog-31670775913.jpg', 'Classic Hotdog', 1, NULL, '2022-12-11 15:25:13'),
(75, 'Special Gyros', 399, 'gyros-11670775934.jpg', 'Special Gyros', 3, NULL, '2022-12-11 15:25:34'),
(76, 'Chicken Gyros', 2445, '1661974378gyros-21670775357.jpg', 'Chicken Gyros', 3, NULL, '2022-12-11 15:15:57'),
(84, 'New Burger', 453, 'burger-31670776301.png', 'New Burger', 2, '2022-12-11 15:31:41', '2022-12-11 15:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(255) NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp(),
  `deleted_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_roles`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', NULL, '2022-12-08', '2022-12-08'),
(2, 'user', NULL, '2022-12-08', '2022-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `name_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password_user` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `id_roles` int(255) NOT NULL,
  `time_register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `last_name`, `email_user`, `password_user`, `id_roles`, `time_register`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'Admin', 'admin@admin.com', 'ca762676c74f1b27011e944093b7e929', 1, '2022-08-31 13:53:01', '2022-12-09 23:08:12', '2022-12-09 23:08:32'),
(11, 'Bojan', 'Stefanovski', 'stefanovski@gmail.com', 'c07069a3660aee6eed7eb6bdc900240a', 2, '2022-08-29 21:49:08', '2022-12-09 23:08:12', '2022-12-09 23:08:32'),
(29, 'User', 'Test', 'user@test.ict', '7f924599a2d9488ff67f01ec80c5ab12', 2, '2022-12-11 17:47:53', '2022-12-11 16:47:53', '2022-12-11 16:47:53'),
(30, 'New', 'User', 'oioi@oioi.oi', 'a6a34f254da9d2cdbcc51ef6049d38b6', 2, '2022-12-11 17:48:56', '2022-12-11 16:48:56', '2022-12-11 16:48:56'),
(31, 'Novi', 'User', 'novi@user.rs', 'dabb22d91cdba6f58c1d90a09f99d3b3', 2, '2022-12-11 17:50:28', '2022-12-11 16:50:28', '2022-12-11 16:50:28');

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

-- --------------------------------------------------------

--
-- Table structure for table `users_activities`
--

CREATE TABLE `users_activities` (
  `id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `dateLogin` date DEFAULT NULL,
  `dateLoggingOut` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_activities`
--

INSERT INTO `users_activities` (`id`, `users_id`, `dateLogin`, `dateLoggingOut`, `created_at`, `updated_at`) VALUES
(1, 4, '2022-12-08', NULL, '2022-12-08 21:01:57', '2022-12-08 21:01:57'),
(2, 4, '2022-12-08', NULL, '2022-12-08 21:02:38', '2022-12-08 21:02:38'),
(3, 4, NULL, '2022-12-09', '2022-12-08 23:07:07', '2022-12-08 23:07:07'),
(4, 4, '2022-12-09', NULL, '2022-12-08 23:53:50', '2022-12-08 23:53:50'),
(5, 4, '2022-12-09', NULL, '2022-12-09 21:05:44', '2022-12-09 21:05:44'),
(6, 4, NULL, '2022-12-09', '2022-12-09 21:05:56', '2022-12-09 21:05:56'),
(7, 4, '2022-12-09', NULL, '2022-12-09 21:08:30', '2022-12-09 21:08:30'),
(8, 4, NULL, '2022-12-09', '2022-12-09 21:09:20', '2022-12-09 21:09:20'),
(9, 27, '2022-12-09', NULL, '2022-12-09 22:35:32', '2022-12-09 22:35:32'),
(10, 27, NULL, '2022-12-09', '2022-12-09 22:35:40', '2022-12-09 22:35:40'),
(11, 4, '2022-12-10', NULL, '2022-12-09 23:30:51', '2022-12-09 23:30:51'),
(12, 4, '2022-12-10', NULL, '2022-12-10 12:39:10', '2022-12-10 12:39:10'),
(13, 4, '2022-12-10', NULL, '2022-12-10 20:07:25', '2022-12-10 20:07:25'),
(14, 4, NULL, '2022-12-11', '2022-12-10 23:37:12', '2022-12-10 23:37:12'),
(15, 4, '2022-12-11', NULL, '2022-12-10 23:37:19', '2022-12-10 23:37:19'),
(16, 4, '2022-12-11', NULL, '2022-12-11 11:54:35', '2022-12-11 11:54:35'),
(17, 4, NULL, '2022-12-11', '2022-12-11 11:57:48', '2022-12-11 11:57:48'),
(18, 4, '2022-12-11', NULL, '2022-12-11 11:58:02', '2022-12-11 11:58:02'),
(19, 4, NULL, '2022-12-11', '2022-12-11 16:47:19', '2022-12-11 16:47:19'),
(20, 29, '2022-12-11', NULL, '2022-12-11 16:48:31', '2022-12-11 16:48:31'),
(21, 29, NULL, '2022-12-11', '2022-12-11 16:48:45', '2022-12-11 16:48:45'),
(22, 4, '2022-12-11', NULL, '2022-12-11 19:58:03', '2022-12-11 19:58:03'),
(23, 4, NULL, '2022-12-11', '2022-12-11 20:49:31', '2022-12-11 20:49:31'),
(24, 4, '2022-12-11', NULL, '2022-12-11 21:14:45', '2022-12-11 21:14:45'),
(25, 4, NULL, '2022-12-11', '2022-12-11 21:14:48', '2022-12-11 21:14:48'),
(26, 4, '2022-12-11', NULL, '2022-12-11 21:14:54', '2022-12-11 21:14:54'),
(27, 29, '2022-12-11', NULL, '2022-12-11 21:28:29', '2022-12-11 21:28:29'),
(28, 29, NULL, '2022-12-11', '2022-12-11 21:28:31', '2022-12-11 21:28:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msguser`
--
ALTER TABLE `msguser`
  ADD PRIMARY KEY (`id_msg`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `msguser`
--
ALTER TABLE `msguser`
  MODIFY `id_msg` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_activities`
--
ALTER TABLE `users_activities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `msguser`
--
ALTER TABLE `msguser`
  ADD CONSTRAINT `msguser_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
