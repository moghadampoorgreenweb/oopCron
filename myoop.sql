-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 01:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `email`, `subject`, `body`, `status`, `created_at`, `updated_at`) VALUES
(23, 'aauuuuuuu@gmail.com', 'saaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom ', 3, '2022-02-21 10:58:40', '2022-02-21 11:12:28'),
(24, 'aliasdasdasdasdad@gmail.com', 'saaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom ', 3, '2022-02-21 11:03:19', '2022-02-21 11:13:17'),
(25, 'aliasfasfasfvi@gmail.com', 'saaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom ', 3, '2022-02-21 11:03:19', '2022-02-21 12:30:48'),
(26, 'haasdasfasfasfsan@gmail.com', 'saaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom om man jam im  lorem ipsom ', 3, '2022-02-22 11:03:19', '2022-02-21 14:56:37'),
(27, 'amirreza.moghaddampoor@gmail.com', 'subject', 'body', 3, '2022-02-21 15:15:33', '2022-02-21 15:16:57'),
(28, 'amirreza.moghaddampoor@gmail.com', 'subject', 'body ', 3, '2022-02-21 15:17:39', '2022-02-21 15:28:17'),
(29, 'amirreza.m@gmail.com', 'subject', 'body ', 3, '2022-02-21 15:17:39', '2022-02-21 15:28:23'),
(30, 'amirreza.mogh@gmail.com', 'subject', 'body ', 3, '2022-02-21 15:17:39', '2022-02-21 15:19:01'),
(31, 'amirreza.moghaddampoor@gmail.com', 'subject', 'body', 3, '2022-02-21 15:35:46', '2022-02-21 15:37:26'),
(32, 'amirreza.m@gmail.com', 'subject', 'body', 3, '2022-02-21 15:35:46', '2022-02-21 15:40:33'),
(33, 'amirreza.mogh@gmail.com', 'subject', 'body', 3, '2022-02-21 15:35:46', '2022-02-21 15:40:37'),
(34, 'amirreza.mghaddampoor@gmail.com', 'subject', 'body', 3, '2022-02-21 15:35:46', '2022-02-21 15:40:42'),
(35, 'amirreza.m@gmail.com', 'subject', 'body', 3, '2022-02-21 15:35:46', '2022-02-21 15:40:47'),
(36, 'amirreza.moh@gmail.com', 'subject', 'body', 3, '2022-02-21 15:35:46', '2022-02-21 15:40:52'),
(37, 'amirreza.moghaddampoor@gmail.com', 'subject', 'body', 3, '2022-02-21 15:46:13', '2022-02-21 15:53:51'),
(38, 'amirreza.m@gmail.com', 'subject', 'body', 3, '2022-02-21 15:46:13', '2022-02-21 15:53:51'),
(39, 'amirreza.mogh@gmail.com', 'subject', 'body', 3, '2022-02-21 15:46:13', '2022-02-21 15:53:51'),
(40, 'amirreza.mghaddampoor@gmail.com', 'subject', 'body', 3, '2022-02-21 15:46:13', '2022-02-21 16:03:23'),
(41, 'amirreza.m@gmail.com', 'subject', 'body', 3, '2022-02-21 15:46:13', '2022-02-21 16:03:19'),
(42, 'amirreza.moh@gmail.com', 'subject', 'body', 3, '2022-02-21 15:46:13', '2022-02-21 16:05:26'),
(43, 'amirreza.moghaddampoor@gmail.com', 'subject', 'body', 3, '2022-02-21 16:04:50', '2022-02-21 16:05:30'),
(44, 'amirreza.m@gmail.com', 'subject', 'body', 3, '2022-02-21 16:04:50', '2022-02-21 16:05:34'),
(45, 'amirreza.mogh@gmail.com', 'subject', 'body', 3, '2022-02-21 16:04:50', '2022-02-21 16:05:38'),
(46, 'amirreza.mghaddampoor@gmail.com', 'subject', 'body', 1, '2022-02-21 16:04:50', NULL),
(47, 'amirreza.m@gmail.com', 'subject', 'body', 1, '2022-02-21 16:04:50', NULL),
(48, 'amirreza.moh@gmail.com', 'subject', 'body', 1, '2022-02-21 16:04:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `lastname` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`) VALUES
(1, 'amir', 'moghaddampoor', '202cb962ac59075b964b07152d234b70', 'a.moghaddampoor@greenweb.ir'),
(2, 'ali', 'jalali', '123', 'as@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`email_id`) REFERENCES `email` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
