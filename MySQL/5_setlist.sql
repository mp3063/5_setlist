-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2015 at 11:23 AM
-- Server version: 5.6.17
-- PHP Version: 5.6.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `5_setlist`
--
CREATE DATABASE IF NOT EXISTS `5_setlist` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `5_setlist`;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(10) unsigned NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_03_30_215225_create_repertoar_table', 1),
('2015_03_30_215557_create_genre_table', 1),
('2015_03_30_221950_pivot_repertoar-genre_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repertoar`
--

DROP TABLE IF EXISTS `repertoar`;
CREATE TABLE IF NOT EXISTS `repertoar` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `band` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `song` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lyrics` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `repertoar`
--

INSERT INTO `repertoar` (`id`, `user_id`, `band`, `song`, `lyrics`, `created_at`, `updated_at`) VALUES
(1, 1, 'Metallica', 'Enter Sandman', 'lskjlckjlknlskdnclksnldknslkdnc', '2015-06-01 06:48:23', '2015-06-01 06:48:23'),
(2, 1, 'Sepultura', 'The Hunt', 'lskdmclksmdlckmsldckmlkmlksmdc', '2015-06-01 06:48:48', '2015-06-01 06:48:48'),
(3, 1, 'Pantera', 'Walk', 'lkmlskmdlckmlkmsldkcmsdc', '2015-06-01 06:49:04', '2015-06-01 06:49:04'),
(4, 1, 'Depeche Mode', 'Enjoj the silence', 'opospdcmpsldkcpolskdcpsokdcs', '2015-06-01 06:49:35', '2015-06-01 06:49:35'),
(5, 1, 'Morgoth', 'Ubiiii', 'askdlaksdlaksdlaksdlaks', '2015-06-01 07:07:58', '2015-06-01 07:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `repertoar_genre`
--

DROP TABLE IF EXISTS `repertoar_genre`;
CREATE TABLE IF NOT EXISTS `repertoar_genre` (
  `id` int(10) unsigned NOT NULL,
  `song_id` int(10) unsigned NOT NULL,
  `genre_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `code`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Srdjan Sin Jovanovic', 'mp4065@gmail.com', '$2y$10$sZrwvmTXCun6Zja9s6TxnOiw2u6zP3AyxbyqiTG0vGdFbk5mfI8BO', '', 1, NULL, '2015-06-01 06:46:58', '2015-06-01 06:47:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `repertoar`
--
ALTER TABLE `repertoar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repertoar_user_id_foreign` (`user_id`);

--
-- Indexes for table `repertoar_genre`
--
ALTER TABLE `repertoar_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repertoar_genre_song_id_index` (`song_id`),
  ADD KEY `repertoar_genre_genre_id_index` (`genre_id`);

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
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `repertoar`
--
ALTER TABLE `repertoar`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `repertoar_genre`
--
ALTER TABLE `repertoar_genre`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `repertoar`
--
ALTER TABLE `repertoar`
  ADD CONSTRAINT `repertoar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repertoar_genre`
--
ALTER TABLE `repertoar_genre`
  ADD CONSTRAINT `repertoar_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `repertoar_genre_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `repertoar` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
