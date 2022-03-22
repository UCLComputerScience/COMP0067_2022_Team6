-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 19, 2022 at 04:15 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

DROP DATABASE ancssc_database;

CREATE DATABASE ancssc_database
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

GRANT ALL PRIVILEGES
    ON ancssc_database.*
    TO 'user'@'localhost'
        IDENTIFIED BY 'password';

USE ancssc_database;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `ancssc_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `country_of_operation`
--

CREATE TABLE `country_of_operation` (
  `country_of_operation` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `country_of_origin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` INT(11) NOT NULL,
  `id` INT(11) NOT NULL,
  `event_title` VARCHAR(255) NOT NULL,
  `event_description` TEXT,
  `event_datetime` DATETIME NOT NULL,
  `event_timezone` VARCHAR(255) NOT NULL,
  `event_call_url` TEXT,
  `event_video_url` TEXT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_picture`
--

CREATE TABLE `event_picture` (
  `event_picture_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_picture_title` varchar(255) DEFAULT NULL,
  `event_picture_description` text,
  `event_picture_alternate_text` text,
  `event_picture_upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(10) NOT NULL,
  `member_name` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sdg` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lon` float(10,6) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_05_03_000001_create_customer_columns', 1),
(3, '2019_05_03_000002_create_subscriptions_table', 1),
(4, '2019_05_03_000003_create_subscription_items_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_03_04_180315_create_password_resets_table', 2),
(8, '2022_03_06_160406_create_files_table', 2),
(9, '2022_03_06_184948_create_images_table', 3),
(10, '2022_03_09_154541_create_images_table', 4),
(11, '2022_03_18_132923_create_password_resets_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `projectTitle` varchar(255) NOT NULL,
  `projectOrganisation` varchar(100) DEFAULT NULL,
  `projectLocation` varchar(100) NOT NULL,
  `projectCity` varchar(100) NOT NULL,
  `projectCountry` varchar(100) NOT NULL,
  `projectDetails` text,
  `project_date_added` int(11) NOT NULL,
  `project_last_updated` date NOT NULL,
  `projectEndDate` datetime NOT NULL,
  `projectValue` varchar(100) DEFAULT NULL,
  `fundingRequired` varchar(100) DEFAULT NULL,
  `sdg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Table structure for table `project_picture`
--

CREATE TABLE `project_picture` (
  `project_picture_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_picture_title` varchar(255) DEFAULT NULL,
  `project_picture_description` text,
  `project_picture_alternate_text` text,
  `project_picture_upload_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `resource_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `resource_title` varchar(255) NOT NULL,
  `resource_sdg` varchar(255) DEFAULT NULL,
  `resource_language` varchar(100) DEFAULT NULL,
  `resource_description` text,
  `resource_added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resource_picture`
--

CREATE TABLE `resource_picture` (
  `resource_picture_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `resource_picture_title` varchar(255) DEFAULT NULL,
  `resource_picture_description` text,
  `resource_picture_alternate_text` text,
  `resource_picture_upload_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `number_of_employees` int(10) DEFAULT NULL,
  `number_of_volunteers` int(10) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `role` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `subscription_type` tinyint(5) DEFAULT NULL,
  `user_status` tinyint(5) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `categories`(
    `categoryID` INTEGER AUTO_INCREMENT PRIMARY KEY,
    `categoryName` VARCHAR(80) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`categoryName`) VALUES

('GOAL 1: No Poverty'),
('GOAL 2: Zero Hunger'),
('GOAL 3: Good Health and Well-being'),
('GOAL 4: Quality Education'),
('GOAL 5: Gender Equality'),
('GOAL 6: Clean Water and Sanitation'),
('GOAL 7: Affordable and Clean Energy'),
('GOAL 8: Decent Work and Economic Growth'),
('GOAL 9: Industry, Innovation and Infrastructure'),
('GOAL 10: Reduced Inequality'),
('GOAL 11: Sustainable Cities and Communities'),
('GOAL 12: Responsible Consumption and Production'),
('GOAL 13: Climate Action'),
('GOAL 14: Life Below Water'),
('GOAL 15: Life on Land'),
('GOAL 16: Peace and Justice Strong Institutions'),
('GOAL 17: Partnerships to achieve the Goal');


CREATE TABLE `timezones`(
    `timezone_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
    `timezone_name` VARCHAR(80) NOT NULL,
    `timezone_relative_to_gmt` VARCHAR(80) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Full list of timezones can be found here: https://publib.boulder.ibm.com/tividd/td/TWS/SC32-1274-02/en_US/HTML/SRF_mst273.htm

INSERT INTO `timezones` (`timezone_name`, `timezone_relative_to_gmt`) VALUES

('GMT', 'GMT+0:00'),
('UTC', 'GMT+0:00'),
('ECT', 'GMT+1:00'),
('EET', 'GMT+2:00'),
('ART', 'GMT+2:00'),
('EAT', 'GMT+3:00'),
('MET', 'GMT+3:30'),
('NET', 'GMT+4:00'),
('PLT', 'GMT+5:00'),
('IST', 'GMT+5:30'),
('BST', 'GMT+6:00'),
('VST', 'GMT+7:00'),
('CTT', 'GMT+8:00'),
('JST', 'GMT+9:00'),
('ACT', 'GMT+9:30'),
('AET', 'GMT+10:00'),
('SST', 'GMT+11:00'),
('NST', 'GMT+12:00'),
('MIT', 'GMT-11:00'),
('HST', 'GMT-10:00'),
('AST', 'GMT-9:00'),
('PST', 'GMT-8:00'),
('PNT', 'GMT-7:00'),
('MST', 'GMT-7:00'),
('CST', 'GMT-6:00'),
('EST', 'GMT-5:00'),
('IET', 'GMT-5:00'),
('PRT', 'GMT-4:00'),
('CNT', 'GMT-3:30'),
('AGT', 'GMT-3:00'),
('BET', 'GMT-3:00'),
('CAT', 'GMT-1:00');


CREATE TABLE `ImagePaths`
(
    `project_id` INTEGER NOT NULL,
    `project_id``project_id` INTEGER NOT NULL,
    `imageUUID` BIGINT UNSIGNED PRIMARY KEY,
    `extension` VARCHAR(5) NOT NULL
)
ENGINE = InnoDB;

--
-- Indexes for table `country_of_operation`
--
ALTER TABLE `country_of_operation`
  ADD PRIMARY KEY (`country_of_operation`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `event_picture`
--
ALTER TABLE `event_picture`
  ADD PRIMARY KEY (`event_picture_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--


--
-- Indexes for table `project_picture`
--
ALTER TABLE `project_picture`
  ADD PRIMARY KEY (`project_picture_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `resource_picture`
--
ALTER TABLE `resource_picture`
  ADD PRIMARY KEY (`resource_picture_id`),
  ADD KEY `resource_id` (`resource_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_picture`
--
ALTER TABLE `event_picture`
  MODIFY `event_picture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--



--
-- AUTO_INCREMENT for table `project_picture`
--
ALTER TABLE `project_picture`
  MODIFY `project_picture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_picture`
--
ALTER TABLE `resource_picture`
  MODIFY `resource_picture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `country_of_operation`
--
ALTER TABLE `country_of_operation`
  ADD CONSTRAINT `country_of_operation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `event_picture`
--
ALTER TABLE `event_picture`
  ADD CONSTRAINT `event_picture_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);

--
-- Constraints for table `projects`
--

--
-- Constraints for table `project_picture`
--
ALTER TABLE `project_picture`
  ADD CONSTRAINT `project_picture_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `resource`
--
ALTER TABLE `resource`
  ADD CONSTRAINT `resource_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `resource_picture`
--
ALTER TABLE `resource_picture`
  ADD CONSTRAINT `resource_picture_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`);
COMMIT;
