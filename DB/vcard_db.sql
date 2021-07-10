-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 12:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `category` enum('home','user','content') NOT NULL,
  `url` text NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `other_content`
--

CREATE TABLE `other_content` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `mobile number` varchar(15) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `sequence` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile_master`
--

CREATE TABLE `profile_master` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile_permission_master`
--

CREATE TABLE `profile_permission_master` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `_create` tinyint(4) NOT NULL DEFAULT 0,
  `_update` tinyint(4) NOT NULL DEFAULT 0,
  `_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE `role_master` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`id`, `role`, `is_active`) VALUES
(1, 'master', 1),
(2, 'admin', 1),
(3, 'master1', 0),
(5, 'manager', 1),
(6, 'manager1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_type_master`
--

CREATE TABLE `service_type_master` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `email_id` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `about_us` text NOT NULL,
  `total_amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `discount` int(11) NOT NULL,
  `installation_date` datetime NOT NULL,
  `next_renewal_date` datetime NOT NULL,
  `renewal_amount` float NOT NULL,
  `term` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `remark` text NOT NULL,
  `discount_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_permission_master`
--

CREATE TABLE `user_permission_master` (
  `id` int(11) NOT NULL,
  `profile_master_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `_create` tinyint(4) NOT NULL DEFAULT 0,
  `_update` tinyint(4) NOT NULL DEFAULT 0,
  `_delete` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_content`
--
ALTER TABLE `other_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user master table id` (`user_id`),
  ADD KEY `service type table id` (`service_type_id`);

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
  ADD KEY `role master table id` (`role_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_content`
--
ALTER TABLE `other_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_master`
--
ALTER TABLE `profile_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_permission_master`
--
ALTER TABLE `profile_permission_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_type_master`
--
ALTER TABLE `service_type_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_permission_master`
--
ALTER TABLE `user_permission_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_theme_config`
--
ALTER TABLE `user_theme_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `other_content`
--
ALTER TABLE `other_content`
  ADD CONSTRAINT `other_content_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `other_content_ibfk_2` FOREIGN KEY (`service_type_id`) REFERENCES `service_type_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
