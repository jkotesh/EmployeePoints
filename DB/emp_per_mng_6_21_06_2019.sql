-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2019 at 10:57 PM
-- Server version: 5.6.43-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp_per_mng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) NOT NULL,
  `employeeno` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `mobileno` varchar(50) DEFAULT NULL,
  `reset_hash` varchar(100) DEFAULT NULL,
  `profile_image` varchar(200) DEFAULT NULL,
  `total_points` decimal(10,2) DEFAULT '0.00',
  `role_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `employeeno`, `name`, `email`, `designation`, `password`, `mobileno`, `reset_hash`, `profile_image`, `total_points`, `role_id`, `status`, `created_by`, `created_on`, `modified_on`, `modified_by`) VALUES
(1, 'SCL1901HYD020042', 'Admin', 'admin@gmail.com', NULL, '$2y$10$nTF88GGn.E24knOZsqwJnODsusjh2dhR1A7rngEBAXN/lcUZicGWG', '8008615717', '19fb225df9fa196104497eadcb7d9269e32b148c6fe127b44aafd5f6334fb3b3', NULL, '3.50', 1, 1, 1, '0000-00-00 00:00:00', '2019-05-10 15:15:24', 1),
(10, 'SCL1801HYD020001', 'Budda Naresh', 'naresh@samuhacreations.com', 'Project Manager', '$2y$10$lEqMOKnIE/Zbv7XwcnzPWO7qF4kOOHE9P3v5q85sjVKGkssVoWYuK', '7894561230', NULL, NULL, '0.00', 2, 1, 1, '2019-06-13 19:27:02', NULL, NULL),
(11, 'SCL1901HYD050047', 'Shailaja', 'shailaja.ch@samuhacreations.com', 'Content Creator', '$2y$10$6HSMcfGrI3kMBO/FWjC7we8UKCGZkPRAMG.RyyYGt5fQKOJUWK6FC', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/11.jpg', '0.00', 3, 1, 1, '2019-06-13 19:27:09', '2019-06-13 19:48:18', 1),
(12, 'SCL1801HYD050024', 'Manisha Reddy', 'manishareddy.kallem@scl.work', 'Content Creator', '$2y$10$b9c2dWY7irW.a/gXAfkCj./zJ9EWiQCmL4hejTym.VIRHpmS6c1ou', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/12.jpg', '0.00', 3, 1, 1, '2019-06-13 19:28:09', '2019-06-13 19:48:43', 1),
(13, 'SCL1901HYD020045', 'Ravi Teja', 'raviteja.ch@samuhacreations.com', 'Team Leader', '$2y$10$fbkcnNCuhbEfN08A7OwlPutRmVJKM3x2H.efLIPRZ/CHlZ5CLicES', '7894561230', NULL, 'http://points.samuhacreations.com/assets/images/users/13.jpg', '32.00', 2, 1, 1, '2019-06-13 19:28:10', '2019-06-14 12:33:08', 1),
(14, 'SCL1801HYD050025', 'Mujeeb', 'mujeeb.rahman@scl.work', 'Content Creator', '$2y$10$nBfSddCUNNDyj1y5kma71.lkcVrLKExYxfgfx5UAxi.plUAlEJbBS', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/14.jpg', '0.00', 3, 1, 1, '2019-06-13 19:28:54', '2019-06-14 12:32:55', 1),
(15, 'SCL1801HYD020014', 'Mamatha Kumari', 'mamatha.darakonda@samuhacreations.com', 'Jr. Software Engineer', '$2y$10$h1tIL9.OKp9fkLz2cwaj0.5tjuCcV1H7WCwYvGWlUxnnyElH9GhE6', '9502067208', NULL, 'http://points.samuhacreations.com/assets/images/users/15.jpg', '6.50', 2, 1, 1, '2019-06-13 19:29:33', '2019-06-13 19:48:55', 1),
(16, 'SCL1801HYD050030', 'Shashikla', 'shashikala.sungar@scl.work', 'Call Handiling Executive', '$2y$10$ohDfUH3143XhgVpZY9gVHOkPAqvDrBTqTg4oxGcJPwJLPNP9NZiMq', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/16.jpg', '0.00', 7, 1, 1, '2019-06-13 19:29:56', '2019-06-13 19:49:05', 1),
(17, 'SCL1901HYD010048', 'Sruthi', 'sruthi@samuhacreations.com', 'HR Manager', '$2y$10$.wzCdHM3gFiBL3GS3EeQZeriyVZDzF7LcIgJkkIh8Dg5H0tZYx8eu', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/17.jpg', '0.00', 7, 1, 1, '2019-06-13 19:31:17', '2019-06-14 12:33:24', 1),
(18, 'SCL1801HYD020017', 'Muthyala Rao', 'mutyalarao@samuhacreations.com', 'Jr. Software Engineer', '$2y$10$M34ENUal72rQQyEczwfbVOIvP3OYus3tu6esrFuYgO0SqiKVQOcBC', '7894561230', NULL, 'http://points.samuhacreations.com/assets/images/users/18.jpg', '8.50', 2, 1, 1, '2019-06-13 19:31:20', '2019-06-13 19:49:14', 1),
(22, 'SCL1901HYD020067', 'Srikanth G', 'srikanth.g@samuhacreations.com', 'Graphic Designer', '$2y$10$S8jJV5EcFzmL.FJhCevO5OBiJs5uj/q8d9XmODjCI5BQsTgVkTj.i', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/22.jpg', '0.00', 6, 1, 1, '2019-06-13 19:39:27', '2019-06-14 15:14:15', 1),
(23, 'SCL1801HYD030005', 'Katthera Rahul Chandra', 'rahul.chandra@samuhacreations.com', 'Financial Analayst', '$2y$10$ieOyhosSdHDvHL084TOwOOcA.9d.4j0e8x33a86HWxhttYaROjze2', '7894561230', NULL, 'http://points.samuhacreations.com/assets/images/users/23.jpg', '0.00', 8, 1, 1, '2019-06-13 19:39:59', '2019-06-14 12:33:37', 1),
(24, 'SCL1801HYD050022', 'Krupakar', 'krupakar.damala@scl.work', 'Graphic Designer', '$2y$10$LsIFk2wr5qHptmhAtCD/meMdhHIYdKWQWaFcI61U9YlVKYjv4p4iC', '99999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/24.jpg', '0.00', 6, 1, 1, '2019-06-13 19:40:11', '2019-06-14 12:35:01', 1),
(25, 'SCL1901HYD040046', 'Laxma Reddy', 'laxmareddy.jonnalagadda@samuhacreations.com', 'Digital Marketing', '$2y$10$sZLts.8hdDsg1UmnHSu.zuQ1NorkNFPeoqJ9IhoW0ktEx6HeKtFvK', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/25.jpg', '10.00', 5, 1, 1, '2019-06-13 19:41:08', '2019-06-13 19:51:37', 1),
(26, 'SCL1801HYD030090', 'K Srikanth', 'srikanth.k@samuhacreations.com', 'Jr. Accountant', '$2y$10$W4d/3DH/uia9KbB7/iVoKuRrjAbuWH8mxkgDF6Ou781MNaj5sTHNa', '7894561230', NULL, NULL, '0.00', 8, 1, 1, '2019-06-13 19:41:30', '2019-06-20 13:08:59', 1),
(27, 'SCL1901HYD040079', 'Anil U', 'anil.uppu@samuhacreations.com', 'Digital Marketing', '$2y$10$Q85Ztgbo2xmuxa244oVTfuH9Q8e0PxUM304TvryvRCXueli4csE0S', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/27.jpg', '0.00', 5, 1, 1, '2019-06-13 19:41:55', '2019-06-13 19:51:21', 1),
(28, 'SCL1801HYD020011', 'P.Pranay', 'pranay.pinniti@samuhacreations.com', 'Additional Floor Manager', '$2y$10$9msstWYcLsbTEwF2tBqIe.Ui7mRLHfwu3sPejm/wivI0vZ3fen4nu', '7894561230', NULL, NULL, '0.00', 4, 1, 1, '2019-06-13 19:42:32', NULL, NULL),
(29, 'SCL1901HYD020044', 'Narendra', 'narendra.c@samuhacreations.com', 'Jr. Software Engineer', '$2y$10$b22PH3AkW.A.XvYxBlsIg.x9dFeMuUNs9BDZJcdc8n6x918hmPm.u', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/29.jpg', '0.00', 4, 1, 1, '2019-06-13 19:42:46', '2019-06-13 19:50:55', 1),
(30, 'SCL1801HYD020006', 'Jibin Joseph M', 'jibin@samuhacreations.com', 'Team Leader', '$2y$10$wbb8GMm5m0JlUSy4G3tM4.UxCC.LZQinywMvGkApx9SlqxbWzzCA6', '7894561230', NULL, 'http://points.samuhacreations.com/assets/images/users/30.jpg', '0.00', 4, 1, 1, '2019-06-13 19:43:27', '2019-06-13 19:50:25', 1),
(31, 'SCL1801HYD020032', 'Swagathika D', 'swagatika.dash@samuhacreations.com', 'Jr. Software Engineer', '$2y$10$XGIYHsZrwwiD2tBY3295P.TgpPxgRj6OpqapCYa/B8soIzn9qRTtu', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/31.jpg', '0.00', 4, 1, 1, '2019-06-13 19:43:32', '2019-06-13 19:50:13', 1),
(32, 'SCL1801HYD020035', 'Akhila', 'akhila.pannala@samuhacreations.com', 'Jr. Software Engineer', '$2y$10$Gd9Tzl8kPOAV0us/L01WDeqXj7oQhRWrV4N5eKhKIdBEkDRYTZoGC', '7894561230', NULL, 'http://points.samuhacreations.com/assets/images/users/32.jpg', '0.00', 4, 1, 1, '2019-06-13 19:44:30', '2019-06-13 19:50:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `defaults`
--

CREATE TABLE `defaults` (
  `id` bigint(20) NOT NULL,
  `allow_create_logs` int(11) DEFAULT NULL,
  `allow_edit_logs` int(11) DEFAULT NULL,
  `allow_delete_logs` int(11) DEFAULT NULL,
  `log_max_days` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `defaults`
--

INSERT INTO `defaults` (`id`, `allow_create_logs`, `allow_edit_logs`, `allow_delete_logs`, `log_max_days`) VALUES
(1, 1, 1, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `employee_points_daily`
--

CREATE TABLE `employee_points_daily` (
  `id` bigint(20) NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `points` decimal(10,2) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `comments` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_points_daily`
--

INSERT INTO `employee_points_daily` (`id`, `employee_id`, `points`, `date`, `comments`, `created_at`, `updated_at`) VALUES
(3, 13, '1.00', '2019-06-01', NULL, '2019-06-19 11:36:37', '2019-06-21 10:48:16'),
(4, 25, '10.00', '2019-06-19', NULL, '2019-06-20 13:09:57', '2019-06-20 00:39:57'),
(5, 13, '1.00', '2019-06-03', NULL, '2019-06-21 10:49:22', '2019-06-20 22:19:22'),
(6, 13, '1.00', '2019-06-04', NULL, '2019-06-21 10:53:30', '2019-06-20 22:23:30'),
(7, 13, '0.00', '2019-06-05', 'holiday(Ramzan)', '2019-06-21 10:53:57', '2019-06-21 11:12:47'),
(8, 13, '1.00', '2019-06-06', NULL, '2019-06-21 10:54:33', '2019-06-20 22:24:33'),
(9, 13, '1.00', '2019-06-07', NULL, '2019-06-21 10:54:54', '2019-06-21 10:55:09'),
(10, 13, '0.00', '2019-06-10', 'on Leave', '2019-06-21 10:55:38', '2019-06-20 22:25:38'),
(11, 13, '1.00', '2019-06-11', NULL, '2019-06-21 10:55:54', '2019-06-20 22:25:54'),
(12, 13, '1.00', '2019-06-12', NULL, '2019-06-21 10:56:50', '2019-06-20 22:26:50'),
(13, 13, '1.00', '2019-06-13', NULL, '2019-06-21 10:57:08', '2019-06-20 22:27:08'),
(14, 13, '1.00', '2019-06-14', NULL, '2019-06-21 10:57:25', '2019-06-20 22:27:25'),
(15, 13, '1.00', '2019-06-15', NULL, '2019-06-21 10:57:41', '2019-06-20 22:27:41'),
(16, 13, '1.00', '2019-06-17', NULL, '2019-06-21 10:58:00', '2019-06-20 22:28:00'),
(17, 13, '1.00', '2019-06-18', NULL, '2019-06-21 10:58:18', '2019-06-20 22:28:18'),
(18, 13, '1.00', '2019-06-19', NULL, '2019-06-21 10:58:36', '2019-06-20 22:28:36'),
(19, 15, '1.00', '2019-06-03', NULL, '2019-06-21 11:05:09', '2019-06-20 22:35:09'),
(20, 15, '1.00', '2019-06-04', NULL, '2019-06-21 11:05:24', '2019-06-20 22:35:24'),
(21, 15, '0.00', '2019-06-05', 'holiday(ramzan)', '2019-06-21 11:05:52', '2019-06-21 11:13:32'),
(22, 15, '1.00', '2019-06-07', NULL, '2019-06-21 11:06:33', '2019-06-20 22:36:33'),
(23, 15, '1.00', '2019-06-10', NULL, '2019-06-21 11:07:02', '2019-06-20 22:37:02'),
(24, 15, '1.00', '2019-06-11', NULL, '2019-06-21 11:07:17', '2019-06-20 22:37:17'),
(25, 15, '1.00', '2019-06-13', NULL, '2019-06-21 11:07:48', '2019-06-20 22:37:48'),
(26, 15, '1.00', '2019-06-12', NULL, '2019-06-21 11:08:34', '2019-06-20 22:38:34'),
(27, 15, '1.00', '2019-06-14', NULL, '2019-06-21 11:08:51', '2019-06-20 22:38:51'),
(28, 15, '1.00', '2019-06-17', NULL, '2019-06-21 11:09:19', '2019-06-20 22:39:19'),
(29, 15, '1.00', '2019-06-18', NULL, '2019-06-21 11:09:34', '2019-06-20 22:39:34'),
(30, 15, '1.00', '2019-06-18', NULL, '2019-06-21 11:09:53', '2019-06-20 22:39:53'),
(31, 15, '1.00', '2019-06-19', NULL, '2019-06-21 11:10:07', '2019-06-20 22:40:07'),
(33, 18, '1.00', '2019-06-01', NULL, '2019-06-21 11:11:11', '2019-06-20 22:41:11'),
(34, 18, '1.00', '2019-06-03', NULL, '2019-06-21 11:11:28', '2019-06-20 22:41:28'),
(35, 18, '1.00', '2019-06-04', NULL, '2019-06-21 11:11:48', '2019-06-20 22:41:48'),
(36, 13, '0.00', '2019-06-02', 'Sunday', '2019-06-21 11:14:20', '2019-06-20 22:44:20'),
(37, 13, '0.00', '2019-06-09', 'sunday', '2019-06-21 11:14:47', '2019-06-20 22:44:47'),
(38, 13, '0.00', '2019-06-08', 'Holiday', '2019-06-21 11:15:15', '2019-06-20 22:45:15'),
(39, 15, '0.00', '2019-06-02', 'Sunday', '2019-06-21 11:15:37', '2019-06-20 22:45:37'),
(40, 15, '0.00', '2019-06-08', 'Holiday', '2019-06-21 11:15:59', '2019-06-20 22:45:59'),
(41, 15, '0.00', '2019-06-09', 'Holiday', '2019-06-21 11:16:26', '2019-06-20 22:46:26'),
(42, 15, '-2.50', '2019-06-03', 'Task pending', '2019-06-21 11:17:06', '2019-06-20 22:47:06'),
(43, 15, '-2.50', '2019-06-06', 'Task pending', '2019-06-21 11:17:37', '2019-06-20 22:47:37'),
(44, 15, '-2.50', '2019-06-15', 'Task Pending', '2019-06-21 11:18:20', '2019-06-20 22:48:20'),
(45, 18, '0.00', '2019-06-02', 'Sunday', '2019-06-21 11:20:05', '2019-06-20 22:50:05'),
(46, 18, '0.00', '2019-06-05', 'Ramzan', '2019-06-21 11:20:22', '2019-06-20 22:50:22'),
(47, 18, '-2.50', '2019-06-06', 'Task Pending', '2019-06-21 11:20:55', '2019-06-20 22:50:55'),
(48, 18, '1.00', '2019-06-07', NULL, '2019-06-21 11:21:49', '2019-06-20 22:51:49'),
(49, 18, '0.00', '2019-06-08', 'Holiday', '2019-06-21 11:22:07', '2019-06-20 22:52:07'),
(50, 18, '0.00', '2019-06-09', 'Sunday', '2019-06-21 11:22:29', '2019-06-20 22:52:29'),
(51, 18, '1.00', '2019-06-10', NULL, '2019-06-21 11:23:58', '2019-06-20 22:53:58'),
(52, 18, '1.00', '2019-06-11', NULL, '2019-06-21 11:24:21', '2019-06-20 22:54:21'),
(53, 18, '1.00', '2019-06-12', NULL, '2019-06-21 11:24:36', '2019-06-20 22:54:36'),
(54, 18, '1.00', '2019-06-13', NULL, '2019-06-21 11:24:51', '2019-06-20 22:54:51'),
(55, 18, '1.00', '2019-06-13', NULL, '2019-06-21 11:25:06', '2019-06-20 22:55:06'),
(56, 18, '1.00', '2019-06-14', NULL, '2019-06-21 11:25:21', '2019-06-20 22:55:21'),
(57, 18, '1.00', '2019-06-15', NULL, '2019-06-21 11:25:33', '2019-06-20 22:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` bigint(20) NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `action` varchar(25) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `description` varchar(4000) DEFAULT NULL,
  `log_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `module_id`, `created_on`, `user_id`, `action`, `category`, `description`, `log_type`) VALUES
(1, 2, '2019-06-13 16:31:10', 1, 'create', 1, 'Admin got 1 on 2019-06-13', 1),
(2, 1, '2019-06-13 19:27:02', 1, 'create', 1, 'Employee SCL1801HYD020001 Created Successfully!', 1),
(3, 1, '2019-06-13 19:27:09', 1, 'create', 1, 'Employee SCL1901HYD050047 Created Successfully!', 1),
(4, 1, '2019-06-13 19:28:09', 1, 'create', 1, 'Employee SCL1801HYD050024 Created Successfully!', 1),
(5, 1, '2019-06-13 19:28:10', 1, 'create', 1, 'Employee SCL1901HYD020045 Created Successfully!', 1),
(6, 1, '2019-06-13 19:28:54', 1, 'create', 1, 'Employee SCL1801HYD050025 Created Successfully!', 1),
(7, 1, '2019-06-13 19:29:33', 1, 'create', 1, 'Employee SCL1801HYD020014 Created Successfully!', 1),
(8, 1, '2019-06-13 19:29:56', 1, 'create', 1, 'Employee SCL1801HYD050030 Created Successfully!', 1),
(9, 1, '2019-06-13 19:31:17', 1, 'create', 1, 'Employee SCL1901HYD010048 Created Successfully!', 1),
(10, 1, '2019-06-13 19:31:20', 1, 'create', 1, 'Employee SCL1801HYD020017 Created Successfully!', 1),
(11, 1, '2019-06-13 19:32:58', 1, 'create', 1, 'Employee  Created Successfully!', 1),
(12, 1, '2019-06-13 19:34:25', 1, 'create', 1, 'Employee  Created Successfully!', 1),
(13, 1, '2019-06-13 19:38:07', 1, 'create', 1, 'Employee  Created Successfully!', 1),
(14, 1, '2019-06-13 19:39:27', 1, 'create', 1, 'Employee SCL1901HYD020067 Created Successfully!', 1),
(15, 1, '2019-06-13 19:39:59', 1, 'create', 1, 'Employee SCL1801HYD030005 Created Successfully!', 1),
(16, 1, '2019-06-13 19:40:11', 1, 'create', 1, 'Employee SCL1801HYD050022 Created Successfully!', 1),
(17, 1, '2019-06-13 19:41:08', 1, 'create', 1, 'Employee SCL1901HYD040046 Created Successfully!', 1),
(18, 1, '2019-06-13 19:41:30', 1, 'create', 1, 'Employee  Created Successfully!', 1),
(19, 1, '2019-06-13 19:41:55', 1, 'create', 1, 'Employee SCL1901HYD040079 Created Successfully!', 1),
(20, 1, '2019-06-13 19:42:32', 1, 'create', 1, 'Employee SCL1801HYD020011 Created Successfully!', 1),
(21, 1, '2019-06-13 19:42:46', 1, 'create', 1, 'Employee SCL1901HYD020044 Created Successfully!', 1),
(22, 1, '2019-06-13 19:43:27', 1, 'create', 1, 'Employee SCL1801HYD020006 Created Successfully!', 1),
(23, 1, '2019-06-13 19:43:32', 1, 'create', 1, 'Employee SCL1801HYD020032 Created Successfully!', 1),
(24, 1, '2019-06-13 19:44:30', 1, 'create', 1, 'Employee SCL1801HYD020035 Created Successfully!', 1),
(25, 1, '2019-06-13 19:48:18', 1, 'update', 1, 'Employee SCL1901HYD050047 Updated Successfully!', 1),
(26, 1, '2019-06-13 19:48:43', 1, 'update', 1, 'Employee SCL1801HYD050024 Updated Successfully!', 1),
(27, 1, '2019-06-13 19:48:55', 1, 'update', 1, 'Employee SCL1801HYD020014 Updated Successfully!', 1),
(28, 1, '2019-06-13 19:49:05', 1, 'update', 1, 'Employee SCL1801HYD050030 Updated Successfully!', 1),
(29, 1, '2019-06-13 19:49:14', 1, 'update', 1, 'Employee SCL1801HYD020017 Updated Successfully!', 1),
(30, 1, '2019-06-13 19:49:24', 1, 'update', 1, 'Employee  Updated Successfully!', 1),
(31, 1, '2019-06-13 19:49:44', 1, 'update', 1, 'Employee SCL1901HYD010069 Updated Successfully!', 1),
(32, 1, '2019-06-13 19:50:13', 1, 'update', 1, 'Employee SCL1801HYD020032 Updated Successfully!', 1),
(33, 1, '2019-06-13 19:50:25', 1, 'update', 1, 'Employee SCL1801HYD020006 Updated Successfully!', 1),
(34, 1, '2019-06-13 19:50:39', 1, 'update', 1, 'Employee SCL1801HYD020035 Updated Successfully!', 1),
(35, 1, '2019-06-13 19:50:55', 1, 'update', 1, 'Employee SCL1901HYD020044 Updated Successfully!', 1),
(36, 1, '2019-06-13 19:51:21', 1, 'update', 1, 'Employee SCL1901HYD040079 Updated Successfully!', 1),
(37, 1, '2019-06-13 19:51:37', 1, 'update', 1, 'Employee SCL1901HYD040046 Updated Successfully!', 1),
(38, 1, '2019-06-14 12:32:55', 1, 'update', 1, 'Employee SCL1801HYD050025 Updated Successfully!', 1),
(39, 1, '2019-06-14 12:33:08', 1, 'update', 1, 'Employee SCL1901HYD020045 Updated Successfully!', 1),
(40, 1, '2019-06-14 12:33:24', 1, 'update', 1, 'Employee SCL1901HYD010048 Updated Successfully!', 1),
(41, 1, '2019-06-14 12:33:37', 1, 'update', 1, 'Employee SCL1801HYD030005 Updated Successfully!', 1),
(42, 1, '2019-06-14 12:33:52', 1, 'update', 1, 'Employee SCL1901HYD020067 Updated Successfully!', 1),
(43, 1, '2019-06-14 12:34:25', 1, 'update', 1, 'Employee SCL1901HYD020067 Updated Successfully!', 1),
(44, 1, '2019-06-14 12:35:01', 1, 'update', 1, 'Employee SCL1801HYD050022 Updated Successfully!', 1),
(45, 1, '2019-06-14 12:35:22', 1, 'update', 1, 'Employee SCL1901HYD020067 Updated Successfully!', 1),
(46, 1, '2019-06-14 15:13:24', 1, 'update', 1, 'Employee SCL1901HYD020067 Updated Successfully!', 1),
(47, 1, '2019-06-14 15:14:15', 1, 'update', 1, 'Employee SCL1901HYD020067 Updated Successfully!', 1),
(48, 2, '2019-06-14 15:26:11', 1, 'create', 1, 'Ravi Teja got 9 on 2019-06-01', 1),
(49, 2, '2019-06-19 11:36:37', 1, 'create', 1, 'Ravi Teja got 2 on 2019-06-01', 1),
(50, 2, '2019-06-20 08:06:02', 1, 'update', 1, 'Ravi Teja got 13 on 2019-06-19', 1),
(51, 1, '2019-06-20 13:08:59', 1, 'update', 1, 'Employee SCL1801HYD030090 Updated Successfully!', 1),
(52, 2, '2019-06-20 13:09:57', 1, 'create', 1, 'Laxma Reddy got 10 on 2019-06-19', 1),
(53, 2, '2019-06-21 06:16:50', 1, 'update', 1, 'Ravi Teja got 1 on 2019-06-01', 1),
(54, 2, '2019-06-21 06:17:28', 1, 'update', 1, 'Ravi Teja got 1 on 2019-06-03', 1),
(55, 2, '2019-06-21 06:18:16', 1, 'update', 1, 'Ravi Teja got 1 on 2019-06-01', 1),
(56, 2, '2019-06-21 10:49:22', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-03', 1),
(57, 2, '2019-06-21 10:53:30', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-04', 1),
(58, 2, '2019-06-21 10:53:57', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-05', 1),
(59, 2, '2019-06-21 10:54:33', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-06', 1),
(60, 2, '2019-06-21 10:54:54', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-06', 1),
(61, 2, '2019-06-21 06:25:09', 1, 'update', 1, 'Ravi Teja got 1 on 2019-06-07', 1),
(62, 2, '2019-06-21 10:55:38', 1, 'create', 1, 'Ravi Teja got 0 on 2019-06-10', 1),
(63, 2, '2019-06-21 10:55:54', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-11', 1),
(64, 2, '2019-06-21 10:56:50', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-12', 1),
(65, 2, '2019-06-21 10:57:08', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-13', 1),
(66, 2, '2019-06-21 10:57:25', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-14', 1),
(67, 2, '2019-06-21 10:57:41', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-15', 1),
(68, 2, '2019-06-21 10:58:00', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-17', 1),
(69, 2, '2019-06-21 10:58:18', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-18', 1),
(70, 2, '2019-06-21 10:58:36', 1, 'create', 1, 'Ravi Teja got 1 on 2019-06-19', 1),
(71, 2, '2019-06-21 11:05:09', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-03', 1),
(72, 2, '2019-06-21 11:05:24', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-04', 1),
(73, 2, '2019-06-21 11:05:52', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-04', 1),
(74, 2, '2019-06-21 06:36:08', 1, 'update', 1, 'Mamatha Kumari got 1 on 2019-06-05', 1),
(75, 2, '2019-06-21 11:06:33', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-07', 1),
(76, 2, '2019-06-21 11:07:02', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-10', 1),
(77, 2, '2019-06-21 11:07:17', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-11', 1),
(78, 2, '2019-06-21 11:07:48', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-13', 1),
(79, 2, '2019-06-21 11:08:34', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-12', 1),
(80, 2, '2019-06-21 11:08:51', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-14', 1),
(81, 2, '2019-06-21 11:09:19', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-17', 1),
(82, 2, '2019-06-21 11:09:34', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-18', 1),
(83, 2, '2019-06-21 11:09:53', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-18', 1),
(84, 2, '2019-06-21 11:10:07', 1, 'create', 1, 'Mamatha Kumari got 1 on 2019-06-19', 1),
(85, 2, '2019-06-21 11:10:54', 1, 'create', 1, 'Admin got 3.5 on 2019-06-21', 1),
(86, 2, '2019-06-21 11:11:11', 1, 'create', 1, 'Muthyala Rao got 1 on 2019-06-01', 1),
(87, 2, '2019-06-21 11:11:28', 1, 'create', 1, 'Muthyala Rao got 1 on 2019-06-03', 1),
(88, 2, '2019-06-21 11:11:48', 1, 'create', 1, 'Muthyala Rao got 1 on 2019-06-04', 1),
(89, 2, '2019-06-21 06:42:47', 1, 'update', 1, 'Ravi Teja got 0 on 2019-06-05', 1),
(90, 2, '2019-06-21 06:43:32', 1, 'update', 1, 'Mamatha Kumari got 0 on 2019-06-05', 1),
(91, 2, '2019-06-21 11:14:20', 1, 'create', 1, 'Ravi Teja got 0 on 2019-06-02', 1),
(92, 2, '2019-06-21 11:14:47', 1, 'create', 1, 'Ravi Teja got 0 on 2019-06-09', 1),
(93, 2, '2019-06-21 11:15:15', 1, 'create', 1, 'Ravi Teja got 0 on 2019-06-08', 1),
(94, 2, '2019-06-21 11:15:37', 1, 'create', 1, 'Mamatha Kumari got 0 on 2019-06-02', 1),
(95, 2, '2019-06-21 11:15:59', 1, 'create', 1, 'Mamatha Kumari got 0 on 2019-06-08', 1),
(96, 2, '2019-06-21 11:16:26', 1, 'create', 1, 'Mamatha Kumari got 0 on 2019-06-09', 1),
(97, 2, '2019-06-21 11:17:06', 1, 'create', 1, 'Mamatha Kumari got -2.5 on 2019-06-03', 1),
(98, 2, '2019-06-21 11:17:37', 1, 'create', 1, 'Mamatha Kumari got -2.5 on 2019-06-06', 1),
(99, 2, '2019-06-21 11:18:20', 1, 'create', 1, 'Mamatha Kumari got -2.5 on 2019-06-15', 1),
(100, 2, '2019-06-21 11:20:05', 1, 'create', 1, 'Muthyala Rao got 0 on 2019-06-02', 1),
(101, 2, '2019-06-21 11:20:22', 1, 'create', 1, 'Muthyala Rao got 0 on 2019-06-05', 1),
(102, 2, '2019-06-21 11:20:55', 1, 'create', 1, 'Muthyala Rao got -2.5 on 2019-06-06', 1),
(103, 2, '2019-06-21 11:21:49', 1, 'create', 1, 'Muthyala Rao got 1 on 2019-06-07', 1),
(104, 2, '2019-06-21 11:22:07', 1, 'create', 1, 'Muthyala Rao got 0 on 2019-06-08', 1),
(105, 2, '2019-06-21 11:22:29', 1, 'create', 1, 'Muthyala Rao got 0 on 2019-06-09', 1),
(106, 2, '2019-06-21 11:23:58', 1, 'create', 1, 'Muthyala Rao got 1 on 2019-06-10', 1),
(107, 2, '2019-06-21 11:24:21', 1, 'create', 1, 'Muthyala Rao got 1 on 2019-06-11', 1),
(108, 2, '2019-06-21 11:24:37', 1, 'create', 1, 'Muthyala Rao got 1 on 2019-06-12', 1),
(109, 2, '2019-06-21 11:24:51', 1, 'create', 1, 'Muthyala Rao got 1 on 2019-06-13', 1),
(110, 2, '2019-06-21 11:25:06', 1, 'create', 1, 'Muthyala Rao got 1 on 2019-06-13', 1),
(111, 2, '2019-06-21 11:25:21', 1, 'create', 1, 'Muthyala Rao got 1 on 2019-06-14', 1),
(112, 2, '2019-06-21 11:25:33', 1, 'create', 1, 'Muthyala Rao got 1 on 2019-06-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `module_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `module_name`) VALUES
(1, 'Employees'),
(2, 'Points');

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `privilege` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `privilege`) VALUES
(1, 'View'),
(2, 'Add'),
(3, 'Edit'),
(4, 'Delete');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `role_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `role_type`) VALUES
(1, 'Admin', 1),
(2, 'PHP Team', 2),
(3, 'Content Team', 2),
(4, 'XAMARIN Team', 2),
(5, 'Digital Marketing Team', 2),
(6, 'Graphic Desigin Team', 2),
(7, 'HR/Tele CallersTeam', 2),
(8, 'Finance Team', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rolemoduleprivileges`
--

CREATE TABLE `rolemoduleprivileges` (
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rolemoduleprivileges`
--

INSERT INTO `rolemoduleprivileges` (`role_id`, `module_id`, `privilege_id`) VALUES
(1, 1, 2),
(1, 1, 3),
(1, 2, 2),
(1, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `Index 3` (`id`);

--
-- Indexes for table `defaults`
--
ALTER TABLE `defaults`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_points_daily`
--
ALTER TABLE `employee_points_daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rolemoduleprivileges`
--
ALTER TABLE `rolemoduleprivileges`
  ADD PRIMARY KEY (`role_id`,`module_id`,`privilege_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `defaults`
--
ALTER TABLE `defaults`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_points_daily`
--
ALTER TABLE `employee_points_daily`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
