-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 07:45 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_master`
--

CREATE TABLE `activity_master` (
  `id` int(11) NOT NULL,
  `activity_title` varchar(100) NOT NULL,
  `category` enum('Dashboard','user','Role','Service','Activity','Profile') NOT NULL,
  `url` text NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_master`
--

INSERT INTO `activity_master` (`id`, `activity_title`, `category`, `url`, `is_active`, `created_at`) VALUES
(4, 'Role', 'Role', 'role-master', 1, '2002-08-21 08:43:00'),
(5, 'User', 'user', 'user-master', 1, '2002-08-21 08:44:00'),
(6, 'Service', 'Service', 'service-master', 1, '2002-08-21 08:53:00'),
(7, 'Activity', 'Activity', 'activity-master', 1, '2002-08-21 08:54:00'),
(8, 'Profile', 'Profile', 'profile-master', 1, '2002-08-21 08:55:00'),
(9, 'Dashboard', 'Dashboard', 'dashboard', 1, '2003-08-21 05:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `business_content`
--

CREATE TABLE `business_content` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('product & Service','Other Business') NOT NULL,
  `content` text NOT NULL,
  `sequence` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_content`
--

INSERT INTO `business_content` (`id`, `user_id`, `type`, `content`, `sequence`) VALUES
(1, 5, 'product & Service', 'c', 1),
(2, 5, 'product & Service', 'c++', 1),
(3, 5, 'product & Service', 'java', 1),
(4, 6, 'product & Service', 'c', 1),
(5, 6, 'product & Service', 'c++', 1),
(6, 6, 'product & Service', 'java', 1),
(7, 7, 'product & Service', 'c', 1),
(8, 7, 'product & Service', 'c++', 1),
(9, 7, 'product & Service', 'java', 1),
(10, 8, 'product & Service', 'c', 1),
(11, 8, 'product & Service', 'c++', 1),
(12, 8, 'product & Service', 'java', 1),
(13, 9, 'product & Service', 'c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE `coupon_master` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon_master`
--

INSERT INTO `coupon_master` (`id`, `title`, `discount`, `remark`) VALUES
(1, 'No Discount', 0, 'no discount');

-- --------------------------------------------------------

--
-- Table structure for table `profile_master`
--

CREATE TABLE `profile_master` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_master`
--

INSERT INTO `profile_master` (`id`, `role_id`, `title`, `is_active`) VALUES
(1, 1, 'Master Premium', 1),
(2, 2, 'Admin License', 1),
(3, 3, 'Executive License', 1),
(4, 4, 'Customer License', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_permission_master`
--

CREATE TABLE `profile_permission_master` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `_view` tinyint(4) NOT NULL DEFAULT '0',
  `_create` tinyint(4) NOT NULL DEFAULT '0',
  `_update` tinyint(4) NOT NULL DEFAULT '0',
  `_delete` tinyint(4) NOT NULL DEFAULT '0',
  `permissionBtn` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_permission_master`
--

INSERT INTO `profile_permission_master` (`id`, `profile_id`, `activity_id`, `_view`, `_create`, `_update`, `_delete`, `permissionBtn`) VALUES
(31, 1, 4, 1, 1, 1, 1, 0),
(32, 1, 5, 1, 1, 1, 1, 1),
(33, 1, 6, 1, 1, 1, 1, 0),
(34, 1, 7, 1, 1, 1, 1, 0),
(35, 1, 8, 1, 1, 1, 1, 0),
(36, 1, 9, 1, 1, 1, 0, 0),
(37, 2, 4, 0, 0, 0, 0, 0),
(38, 2, 5, 1, 1, 1, 0, 0),
(39, 2, 6, 0, 0, 0, 0, 0),
(40, 2, 7, 0, 0, 0, 0, 0),
(41, 2, 8, 0, 0, 0, 0, 0),
(42, 2, 9, 1, 1, 1, 0, 0),
(43, 3, 4, 0, 0, 0, 0, 0),
(44, 3, 5, 1, 1, 1, 0, 0),
(45, 3, 6, 0, 0, 0, 0, 0),
(46, 3, 7, 0, 0, 0, 0, 0),
(47, 3, 8, 0, 0, 0, 0, 0),
(48, 3, 9, 1, 1, 1, 0, 0),
(49, 4, 4, 0, 0, 0, 0, 0),
(50, 4, 5, 0, 0, 0, 0, 0),
(51, 4, 6, 0, 0, 0, 0, 0),
(52, 4, 7, 0, 0, 0, 0, 0),
(53, 4, 8, 0, 0, 0, 0, 0),
(54, 4, 9, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE `role_master` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`id`, `role`, `is_active`) VALUES
(1, 'Master', 1),
(2, 'Admin', 1),
(3, 'Executive', 1),
(4, 'Customer', 1),
(5, 'Guest1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_type_mapping`
--

CREATE TABLE `service_type_mapping` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `value` text,
  `image` text,
  `flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_type_mapping`
--

INSERT INTO `service_type_mapping` (`id`, `user_id`, `service_type_id`, `value`, `image`, `flag`) VALUES
(1, 2, 1, 'fb', '', 0),
(2, 2, 2, 'twitter', '', 0),
(3, 5, 1, 'http://fb.com', '', 0),
(4, 5, 2, 'twtter', '', 0),
(5, 5, 3, '4566222', 'resource/img/pay/60fbadb12d676.', 1),
(6, 6, 1, 'http://fb.com', '', 0),
(7, 6, 2, 'twtter', '', 0),
(8, 6, 3, '4566222', 'resource/img/pay/60fbadb4a6d40.', 1),
(9, 7, 1, 'http://fb.com', '', 0),
(10, 7, 2, 'twtter', '', 0),
(11, 7, 3, '4566222', 'resource/img/pay/60fbadb5f3941.', 1),
(12, 8, 1, 'http://fb.com', '', 0),
(13, 8, 2, 'twtter', '', 0),
(14, 8, 3, '4566222', 'resource/img/pay/60fbadb62662f.', 1),
(15, 9, 1, 'fb.com', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_type_master`
--

CREATE TABLE `service_type_master` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_type_master`
--

INSERT INTO `service_type_master` (`id`, `title`, `flag`) VALUES
(1, 'Facebook', 0),
(2, 'Twitter12', 0),
(3, 'PhonePe', 1),
(4, 'google Pay', 1),
(5, 'Paytm', 1),
(6, 'test1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `theme_image_master`
--

CREATE TABLE `theme_image_master` (
  `id` int(11) NOT NULL,
  `type` enum('body_bg','cawd_bg') NOT NULL,
  `extension` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `theme_master`
--

CREATE TABLE `theme_master` (
  `id` int(11) NOT NULL,
  `theme_title` varchar(100) NOT NULL,
  `body_bg_id` int(11) NOT NULL,
  `card_bg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `whatsapp_number` varchar(15) NOT NULL,
  `map_direction_url` text NOT NULL,
  `website_url` text NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `profile_image` text,
  `about_us` text NOT NULL,
  `total_amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `discount` int(11) NOT NULL,
  `installation_date` date NOT NULL,
  `next_renewal_date` date NOT NULL,
  `renewal_amount` float NOT NULL,
  `term` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `remark` text,
  `discount_id` int(11) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `agent_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `role_id`, `profile_id`, `business_name`, `designation`, `first_name`, `middle_name`, `last_name`, `phone1`, `phone2`, `whatsapp_number`, `map_direction_url`, `website_url`, `email_id`, `password`, `address`, `profile_image`, `about_us`, `total_amount`, `paid_amount`, `discount`, `installation_date`, `next_renewal_date`, `renewal_amount`, `term`, `is_active`, `remark`, `discount_id`, `created_by`, `modified_by`, `agent_id`, `created_at`, `modified_at`) VALUES
(1, 1, 1, 'Anv Softweb Solutions', 'Director', 'Lalit', 'Rewanathrao', 'Meshram', '8007015819', '', '', '', '', 'lalit@gmail.com', '12345', 'nagpur', NULL, '', 0, 0, 0, '0000-00-00', '0000-00-00', 0, 0, 1, '', NULL, 1, 1, 1, '0000-00-00 00:00:00', '2021-08-03 14:44:50'),
(2, 2, 2, 'Anv Softweb ', 'Marketing Executive', 'Ashish', 'Premdas', 'Munghate', '7412589632', '', '', '', '', 'ashish@gmail.com', '12345', 'narsada', NULL, '', 0, 0, 0, '2021-08-02', '2021-08-02', 0, 1, 1, '', NULL, 1, 1, 1, '2021-08-02 15:26:03', '0000-00-00 00:00:00'),
(3, 3, 3, 'Anv softweb', 'Executive Head', 'Amol', '', 'khorat', '7418523654', '', '', '', '', 'amol@gmail.com', '12345', 'pune', 'resource/img/user/photo2021_08_02_033141000000.jpg', '', 1000, 1000, 0, '2021-08-02', '2021-08-02', 0, 1, 1, '', NULL, 1, 1, 1, '2021-08-02 15:31:41', '0000-00-00 00:00:00'),
(4, 2, 2, 'Anv softweb', 'Marketing Executive', 'Kunal', '', 'Bhanarkar', '1234569874', '', '', '', '', 'kunal@gmail.com', '', '', NULL, '', 1000, 1000, 0, '2021-12-31', '2021-12-31', 1000, 1, 1, 'fd', NULL, 1, 1, 1, '2021-08-03 14:03:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission_master`
--

CREATE TABLE `user_permission_master` (
  `id` int(11) NOT NULL,
  `profile_master_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `_view` tinyint(4) NOT NULL DEFAULT '0',
  `_create` tinyint(4) NOT NULL DEFAULT '0',
  `_update` tinyint(4) NOT NULL DEFAULT '0',
  `_delete` tinyint(4) NOT NULL DEFAULT '0',
  `permissionBtn` tinyint(4) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_permission_master`
--

INSERT INTO `user_permission_master` (`id`, `profile_master_id`, `user_id`, `activity_id`, `_view`, `_create`, `_update`, `_delete`, `permissionBtn`, `is_active`) VALUES
(150, 2, 2, 4, 0, 0, 0, 0, 0, 0),
(151, 2, 2, 5, 1, 1, 1, 0, 0, 0),
(152, 2, 2, 6, 0, 0, 0, 0, 0, 0),
(153, 2, 2, 7, 0, 0, 0, 0, 0, 0),
(154, 2, 2, 8, 0, 0, 0, 0, 0, 0),
(155, 2, 2, 9, 1, 1, 1, 0, 0, 0),
(162, 3, 3, 4, 0, 0, 0, 0, 0, 0),
(163, 3, 3, 5, 1, 1, 1, 0, 0, 0),
(164, 3, 3, 6, 0, 0, 0, 0, 0, 0),
(165, 3, 3, 7, 0, 0, 0, 0, 0, 0),
(166, 3, 3, 8, 0, 0, 0, 0, 0, 0),
(167, 3, 3, 9, 1, 1, 1, 0, 0, 0),
(180, 2, 4, 4, 0, 0, 0, 0, 0, 0),
(181, 2, 4, 5, 1, 1, 1, 0, 0, 0),
(182, 2, 4, 6, 0, 0, 0, 0, 0, 0),
(183, 2, 4, 7, 0, 0, 0, 0, 0, 0),
(184, 2, 4, 8, 0, 0, 0, 0, 0, 0),
(185, 2, 4, 9, 1, 1, 1, 0, 0, 0),
(186, 1, 1, 4, 1, 1, 1, 1, 1, 0),
(187, 1, 1, 5, 1, 1, 1, 1, 1, 0),
(188, 1, 1, 6, 1, 1, 1, 1, 1, 0),
(189, 1, 1, 7, 1, 1, 1, 1, 1, 0),
(190, 1, 1, 8, 1, 1, 1, 1, 1, 0),
(191, 1, 1, 9, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_theme_config`
--

CREATE TABLE `user_theme_config` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `body_bg_id` int(11) NOT NULL,
  `card_bg_id` int(11) NOT NULL,
  `custom_body_bg_extension` varchar(5) NOT NULL,
  `custom_card_bg_extension` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_master`
--
ALTER TABLE `activity_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_content`
--
ALTER TABLE `business_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_master`
--
ALTER TABLE `profile_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role master table id` (`role_id`);

--
-- Indexes for table `profile_permission_master`
--
ALTER TABLE `profile_permission_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile master id` (`profile_id`),
  ADD KEY `activity master id` (`activity_id`);

--
-- Indexes for table `role_master`
--
ALTER TABLE `role_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `service_type_mapping`
--
ALTER TABLE `service_type_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_type_master`
--
ALTER TABLE `service_type_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_image_master`
--
ALTER TABLE `theme_image_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_master`
--
ALTER TABLE `theme_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theme image master id` (`body_bg_id`),
  ADD KEY `theme image id` (`card_bg_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role master table id` (`role_id`),
  ADD KEY `phone1` (`phone1`,`email_id`(191)),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `user_permission_master`
--
ALTER TABLE `user_permission_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profilr master table id` (`profile_master_id`),
  ADD KEY `user master table id` (`user_id`),
  ADD KEY `activity master id` (`activity_id`);

--
-- Indexes for table `user_theme_config`
--
ALTER TABLE `user_theme_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user master id` (`user_id`),
  ADD KEY `theme master id` (`theme_id`),
  ADD KEY `theme image master table id` (`body_bg_id`),
  ADD KEY `theme image master id` (`card_bg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_master`
--
ALTER TABLE `activity_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `business_content`
--
ALTER TABLE `business_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_master`
--
ALTER TABLE `profile_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile_permission_master`
--
ALTER TABLE `profile_permission_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_type_mapping`
--
ALTER TABLE `service_type_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `service_type_master`
--
ALTER TABLE `service_type_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `theme_image_master`
--
ALTER TABLE `theme_image_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_master`
--
ALTER TABLE `theme_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_permission_master`
--
ALTER TABLE `user_permission_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `user_theme_config`
--
ALTER TABLE `user_theme_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile_master`
--
ALTER TABLE `profile_master`
  ADD CONSTRAINT `profile_master_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_permission_master`
--
ALTER TABLE `profile_permission_master`
  ADD CONSTRAINT `profile_permission_master_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_permission_master_ibfk_3` FOREIGN KEY (`profile_id`) REFERENCES `profile_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_master`
--
ALTER TABLE `user_master`
  ADD CONSTRAINT `user_master_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_permission_master`
--
ALTER TABLE `user_permission_master`
  ADD CONSTRAINT `user_permission_master_ibfk_1` FOREIGN KEY (`profile_master_id`) REFERENCES `profile_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_permission_master_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_permission_master_ibfk_3` FOREIGN KEY (`activity_id`) REFERENCES `activity_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_theme_config`
--
ALTER TABLE `user_theme_config`
  ADD CONSTRAINT `user_theme_config_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_theme_config_ibfk_2` FOREIGN KEY (`theme_id`) REFERENCES `theme_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_theme_config_ibfk_3` FOREIGN KEY (`body_bg_id`) REFERENCES `theme_master` (`body_bg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_theme_config_ibfk_4` FOREIGN KEY (`card_bg_id`) REFERENCES `theme_master` (`card_bg_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
