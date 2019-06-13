-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2019 at 08:36 AM
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
-- Database: `scl_points`
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
  `total_points` bigint(20) DEFAULT '0',
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
(1, 'SCL1901HYD020042', 'Admin', 'admin@gmail.com', NULL, '$2y$10$nTF88GGn.E24knOZsqwJnODsusjh2dhR1A7rngEBAXN/lcUZicGWG', '8008615717', '19fb225df9fa196104497eadcb7d9269e32b148c6fe127b44aafd5f6334fb3b3', NULL, 1, 1, 1, 1, '0000-00-00 00:00:00', '2019-05-10 15:15:24', 1),
(10, 'SCL1801HYD020001', 'Budda Naresh', 'naresh@samuhacreations.com', 'Project Manager', '$2y$10$lEqMOKnIE/Zbv7XwcnzPWO7qF4kOOHE9P3v5q85sjVKGkssVoWYuK', '7894561230', NULL, NULL, 0, 2, 1, 1, '2019-06-13 19:27:02', NULL, NULL),
(11, 'SCL1901HYD050047', 'Shailaja', 'shailaja.ch@samuhacreations.com', 'Content Creator', '$2y$10$6HSMcfGrI3kMBO/FWjC7we8UKCGZkPRAMG.RyyYGt5fQKOJUWK6FC', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/11.jpg', 0, 3, 1, 1, '2019-06-13 19:27:09', '2019-06-13 19:48:18', 1),
(12, 'SCL1801HYD050024', 'Manisha Reddy', 'manishareddy.kallem@scl.work', 'Content Creator', '$2y$10$b9c2dWY7irW.a/gXAfkCj./zJ9EWiQCmL4hejTym.VIRHpmS6c1ou', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/12.jpg', 0, 3, 1, 1, '2019-06-13 19:28:09', '2019-06-13 19:48:43', 1),
(13, 'SCL1901HYD020045', 'Ravi Teja', 'raviteja.ch@samuhacreations.com', 'Team Leader', '$2y$10$fbkcnNCuhbEfN08A7OwlPutRmVJKM3x2H.efLIPRZ/CHlZ5CLicES', '7894561230', NULL, NULL, 0, 2, 1, 1, '2019-06-13 19:28:10', NULL, NULL),
(14, 'SCL1801HYD050025', 'Mujeeb', 'mujeeb.rahman@scl.work', 'Content Creator', '$2y$10$nBfSddCUNNDyj1y5kma71.lkcVrLKExYxfgfx5UAxi.plUAlEJbBS', '9999999999', NULL, NULL, 0, 3, 1, 1, '2019-06-13 19:28:54', NULL, NULL),
(15, 'SCL1801HYD020014', 'Mamatha Kumari', 'mamatha.darakonda@samuhacreations.com', 'Jr. Software Engineer', '$2y$10$h1tIL9.OKp9fkLz2cwaj0.5tjuCcV1H7WCwYvGWlUxnnyElH9GhE6', '9502067208', NULL, 'http://points.samuhacreations.com/assets/images/users/15.jpg', 0, 2, 1, 1, '2019-06-13 19:29:33', '2019-06-13 19:48:55', 1),
(16, 'SCL1801HYD050030', 'Shashikla', 'shashikala.sungar@scl.work', 'Call Handiling Executive', '$2y$10$ohDfUH3143XhgVpZY9gVHOkPAqvDrBTqTg4oxGcJPwJLPNP9NZiMq', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/16.jpg', 0, 7, 1, 1, '2019-06-13 19:29:56', '2019-06-13 19:49:05', 1),
(17, 'SCL1901HYD010048', 'Sruthi', 'sruthi@samuhacreations.com', 'HR Manager', '$2y$10$.wzCdHM3gFiBL3GS3EeQZeriyVZDzF7LcIgJkkIh8Dg5H0tZYx8eu', '9999999999', NULL, NULL, 0, 7, 1, 1, '2019-06-13 19:31:17', NULL, NULL),
(18, 'SCL1801HYD020017', 'Muthyala Rao', 'mutyalarao@samuhacreations.com', 'Jr. Software Engineer', '$2y$10$M34ENUal72rQQyEczwfbVOIvP3OYus3tu6esrFuYgO0SqiKVQOcBC', '7894561230', NULL, 'http://points.samuhacreations.com/assets/images/users/18.jpg', 0, 2, 1, 1, '2019-06-13 19:31:20', '2019-06-13 19:49:14', 1),
(19, NULL, 'Ashwini Ch', 'ashwini@samuhacreations.com', 'HR Recruiter', '$2y$10$Zbhv3jLIipNm7kJfflZJIO5Ji7Io6tdfzTQPxnGzhX.hPhmdIRcNS', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/19.jpg', 0, 7, 1, 1, '2019-06-13 19:32:58', '2019-06-13 19:49:24', 1),
(20, NULL, 'Vijaya Shree', 'vijayashree@samuhacreations.com', 'HR Recruiter', '$2y$10$NSnD6rEBVgEsxmEF/k8RgupNGyeZBrg19JSjiQy1I2mK62M292xky', '9999999999', NULL, NULL, 0, 7, 1, 1, '2019-06-13 19:34:25', NULL, NULL),
(21, 'SCL1901HYD010069', 'S.N.N.Priya Darshini', 'priya@samuhacreations.com', 'Director Co-Ordinetor', '$2y$10$SrsPljQNC4AB/1PuVgWzSeJOFZAkkFrw8gRSSvk65A5ItZ0u2vWLy', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/21.jpg', 0, 7, 1, 1, '2019-06-13 19:38:07', '2019-06-13 19:49:44', 1),
(22, 'SCL1901HYD020067', 'Srikanth G', 'srikanth.g@samuhacreations.com', 'Graphic Designer', '$2y$10$S8jJV5EcFzmL.FJhCevO5OBiJs5uj/q8d9XmODjCI5BQsTgVkTj.i', '9999999999', NULL, NULL, 0, 6, 1, 1, '2019-06-13 19:39:27', NULL, NULL),
(23, 'SCL1801HYD030005', 'Katthera Rahul Chandra', 'rahul.chandra@samuhacreations.com', 'Financial Analayst', '$2y$10$ieOyhosSdHDvHL084TOwOOcA.9d.4j0e8x33a86HWxhttYaROjze2', '7894561230', NULL, NULL, 0, 8, 1, 1, '2019-06-13 19:39:59', NULL, NULL),
(24, 'SCL1801HYD050022', 'Krupakar', 'krupakar.damala@scl.work', 'Graphic Designer', '$2y$10$LsIFk2wr5qHptmhAtCD/meMdhHIYdKWQWaFcI61U9YlVKYjv4p4iC', '99999999999', NULL, NULL, 0, 6, 1, 1, '2019-06-13 19:40:11', NULL, NULL),
(25, 'SCL1901HYD040046', 'Laxma Reddy', 'laxmareddy.jonnalagadda@samuhacreations.com', 'Digital Marketing', '$2y$10$sZLts.8hdDsg1UmnHSu.zuQ1NorkNFPeoqJ9IhoW0ktEx6HeKtFvK', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/25.jpg', 0, 5, 1, 1, '2019-06-13 19:41:08', '2019-06-13 19:51:37', 1),
(26, NULL, 'K Srikanth', 'srikanth.k@samuhacreations.com', 'Jr. Accountant', '$2y$10$W4d/3DH/uia9KbB7/iVoKuRrjAbuWH8mxkgDF6Ou781MNaj5sTHNa', '7894561230', NULL, NULL, 0, 8, 1, 1, '2019-06-13 19:41:30', NULL, NULL),
(27, 'SCL1901HYD040079', 'Anil U', 'anil.uppu@samuhacreations.com', 'Digital Marketing', '$2y$10$Q85Ztgbo2xmuxa244oVTfuH9Q8e0PxUM304TvryvRCXueli4csE0S', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/27.jpg', 0, 5, 1, 1, '2019-06-13 19:41:55', '2019-06-13 19:51:21', 1),
(28, 'SCL1801HYD020011', 'P.Pranay', 'pranay.pinniti@samuhacreations.com', 'Additional Floor Manager', '$2y$10$9msstWYcLsbTEwF2tBqIe.Ui7mRLHfwu3sPejm/wivI0vZ3fen4nu', '7894561230', NULL, NULL, 0, 4, 1, 1, '2019-06-13 19:42:32', NULL, NULL),
(29, 'SCL1901HYD020044', 'Narendra', 'narendra.c@samuhacreations.com', 'Jr. Software Engineer', '$2y$10$b22PH3AkW.A.XvYxBlsIg.x9dFeMuUNs9BDZJcdc8n6x918hmPm.u', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/29.jpg', 0, 4, 1, 1, '2019-06-13 19:42:46', '2019-06-13 19:50:55', 1),
(30, 'SCL1801HYD020006', 'Jibin Joseph M', 'jibin@samuhacreations.com', 'Team Leader', '$2y$10$wbb8GMm5m0JlUSy4G3tM4.UxCC.LZQinywMvGkApx9SlqxbWzzCA6', '7894561230', NULL, 'http://points.samuhacreations.com/assets/images/users/30.jpg', 0, 4, 1, 1, '2019-06-13 19:43:27', '2019-06-13 19:50:25', 1),
(31, 'SCL1801HYD020032', 'Swagathika D', 'swagatika.dash@samuhacreations.com', 'Jr. Software Engineer', '$2y$10$XGIYHsZrwwiD2tBY3295P.TgpPxgRj6OpqapCYa/B8soIzn9qRTtu', '9999999999', NULL, 'http://points.samuhacreations.com/assets/images/users/31.jpg', 0, 4, 1, 1, '2019-06-13 19:43:32', '2019-06-13 19:50:13', 1),
(32, 'SCL1801HYD020035', 'Akhila', 'akhila.pannala@samuhacreations.com', 'Jr. Software Engineer', '$2y$10$Gd9Tzl8kPOAV0us/L01WDeqXj7oQhRWrV4N5eKhKIdBEkDRYTZoGC', '7894561230', NULL, 'http://points.samuhacreations.com/assets/images/users/32.jpg', 0, 4, 1, 1, '2019-06-13 19:44:30', '2019-06-13 19:50:39', 1);

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
  `points` bigint(20) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `comments` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(37, 1, '2019-06-13 19:51:37', 1, 'update', 1, 'Employee SCL1901HYD040046 Updated Successfully!', 1);

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
(4, 'XAMRIN Team', 2),
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
(1, 2, 2);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
