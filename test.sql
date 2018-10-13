-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2018 at 08:38 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_03_124845_create_products_table', 1),
(4, '2018_10_03_124900_create_offers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `money` int(11) NOT NULL,
  `offer_active` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `money`, `offer_active`, `created`, `created_at`, `updated_at`, `product_id`, `user_id`) VALUES
(30, 500, 0, '2018-10-12 23:55:51', NULL, NULL, 20, 7),
(31, 50000000, 0, '2018-10-13 00:00:09', NULL, NULL, 19, 7),
(32, 120000, 1, '2018-10-13 00:00:28', NULL, NULL, 19, 7),
(33, 500, 1, '2018-10-13 00:08:31', NULL, NULL, 20, 7),
(34, 10008, 1, '2018-10-13 00:11:00', NULL, NULL, 21, 9),
(35, 101, 1, '2018-10-13 00:12:12', NULL, NULL, 21, 8),
(36, 200000, 1, '2018-10-13 00:12:27', NULL, NULL, 20, 8),
(37, 2000008, 1, '2018-10-13 00:12:58', NULL, NULL, 19, 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_price` int(11) NOT NULL,
  `product_delivery` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_active` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exspire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_choice` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `start_price`, `product_delivery`, `product_image`, `product_active`, `created`, `exspire`, `created_at`, `updated_at`, `user_id`, `payment_choice`) VALUES
(19, 'pasulj', 'magicni', 10000, 'golub pismonosa', NULL, 1, '2018-10-12 23:50:21', '23/10/2018 - 01:54:21', NULL, NULL, 9, ''),
(20, 'kocka', 'kockasta', 220, 'podmornica', 'iVBORw0KGgoAAAANSUhEUgAAARgAAADSCAYAAACRit/qAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAAAB3RJTUUH4gcLADAvhu5AkgAAgABJREFUeNrs/dmTZVl23gf+9nCGO/n12SM85ozMrKy5CgQIAqAMlKEJSqS1+kFmaNMfwAeZ3vmsfug', 1, '2018-10-12 23:50:58', '23/10/2018 - 01:54:58', NULL, NULL, 9, ''),
(21, 'naocare', 'crne', 100, 'podmornica', NULL, 1, '2018-10-13 00:09:43', '23/10/2018 - 02:13:43', NULL, NULL, 7, ''),
(22, 'kafa', 'Turska', 100, 'licno', NULL, 1, '2018-10-13 02:09:23', '23/10/2018 - 04:13:23', NULL, NULL, 9, ''),
(23, 'pasulj', 'Turska', 100, 'licno', 'iVBORw0KGgoAAAANSUhEUgAAAZAAAAFyBAMAAAApHZF2AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAADBQTFRFISAeZWNfiYaDoJ6ctLe4ubOuwMbGysXC0tLP2Nvc4t3a4uXl7Ovp9/b0///+////vaxlzQAAZPFJREFUeNqsvXt8XFd5Lvzuka+xZO8', 1, '2018-10-13 02:09:54', '23/10/2018 - 04:13:54', NULL, NULL, 9, ''),
(24, 'kafa', 'Turska', 100, 'licno', 'iVBORw0KGgoAAAANSUhEUgAAARgAAADSCAYAAACRit/qAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAAAB3RJTUUH4gcLADAvhu5AkgAAgABJREFUeNrs/dmTZVl23gf+9nCGO/n12SM85ozMrKy5CgQIAqAMlKEJSqS1+kFmaNMfwAeZ3vmsfug', 1, '2018-10-13 02:12:10', '23/10/2018 - 04:16:10', NULL, NULL, 9, ''),
(25, 'kugla', 'okrugla', 222, 'posta', 'iVBORw0KGgoAAAANSUhEUgAAARgAAADSCAYAAACRit/qAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAAAB3RJTUUH4gcLADAvhu5AkgAAgABJREFUeNrs/dmTZVl23gf+9nCGO/n12SM85ozMrKy5CgQIAqAMlKEJSqS1+kFmaNMfwAeZ3vmsfug', 1, '2018-10-13 02:14:41', '23/10/2018 - 04:18:41', NULL, NULL, 9, ''),
(26, 'kafa', 'Turska', 100, 'licno', '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0\0\0?\0\0\0????\0\0\0gAMA\0\0???a\0\0\0 cHRM\0\0z&\0\0??\0\0?\0\0\0??\0\0u0\0\0?`\0\0:?\0\0p??Q<\0\0\0bKGD\0?\0?\0?????\0\0\0tIME?\00/??@?\0\0?\0IDATx???ٓeYv???p?;???#<??̬??\n???	J???Afh??????~?7???FË???L?(???VS\"4A?@uQcfVFFfdDx?<]????????1Tf?De???c?~??;', 1, '2018-10-13 02:42:44', '23/10/2018 - 04:46:44', NULL, NULL, 9, ''),
(27, 'papagaj', 'Turska', 100, 'golub pismonosa', '?PNG\r\n\Z\n\\0\\0\\0\rIHDR\\0\\0\\0\\0\\0?\\0\\0\\0????\\0\\0\\0gAMA\\0\\0???a\\0\\0\\0 cHRM\\0\\0z&\\0\\0??\\0\\0?\\0\\0\\0??\\0\\0u0\\0\\0?`\\0\\0:?\\0\\0p??Q<\\0\\0\\0bKGD\\0?\\0?\\0?????\\0\\0\\0tIME?\\00/??@?\\0\\0?\\0IDATx???ٓeYv???p?;???#<??̬??\n???	J???Afh??????~?7???FË???L?(???V', 1, '2018-10-13 02:57:13', '23/10/2018 - 05:01:13', NULL, NULL, 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Dejan', 'Matic', 'dejan.matic@gmail.com', '$2y$10$b9uU.1wYeVS7GgrKqj9K2OlTuektuVGYA1E2v7mTh0lTGBSTTmaTO', NULL, NULL, NULL),
(8, 'Sasa', 'Matic', 'sasa.matic@gmail.com', '$2y$10$792yqX1rWZFaGtyHPN9GS.imFBfbrXqY30gKLgZ9kKuMeYpgnlx1m', NULL, NULL, NULL),
(9, 'Dule', 'Pavlovic', 'dusan.pavlovic88@yahoo.com', '$2y$10$S6GJ.1mmNj4fKMS7pq894OXWolHeLqbiUHTeM0WSuBqR9u9c0w0wG', NULL, NULL, NULL),
(10, 'Rade', 'Mag', 'rade.mag@gmail.com', '$2y$10$.C/p5FIj3l9pSKwx4XE3TeE5UVoFBgT2QWAoCjedCNeHKrjiPWgI.', NULL, NULL, NULL),
(11, 'Milos', 'Milosevic', 'milos.milosevic88@yahoo.com', '$2y$10$Q8Qha/arQXOdJk8gagLpZuSESbEWsnspff7FpINlPOg/nWIoD6Wi2', NULL, NULL, NULL),
(12, 'mile', 'kitic', 'mile@gmail.com', '$2y$10$jQuiU5hHs4JczSd0R287y..Ud909/ncZ7mOKB.LJHiT0iUKTcRClO', NULL, NULL, NULL),
(13, 'ilic', 'mile', 'dule.lule@gmail.com', '$2y$10$VuxVlLROpdicY6NDet86LuLEARuWj.YLKJAbMwK7MK5RZoRBAhLHe', NULL, NULL, NULL),
(14, 'mile', 'kitic', 'lule@gmail.com', '$2y$10$a6RNdetOILp9jHFTPCSZZul1iZ47VWw4pcB0Te1k.OU1PF2t.Gxay', NULL, NULL, NULL),
(15, 'dusko', 'dugusko', 'dusko.zeka@gmail.com', '$2y$10$OTljE66liQhfAyqtV0uGbuZDPUZk/iF2IFebF21sc7.hIMikY/WLS', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_product_id_foreign` (`product_id`),
  ADD KEY `offers_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
