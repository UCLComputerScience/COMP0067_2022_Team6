-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 25, 2022 at 07:00 PM
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


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

USE ancssc_database;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ancssc_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
                              `categoryID` int(11) NOT NULL,
                              `categoryName` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
                                                            (1, 'GOAL 1: No Poverty'),
                                                            (2, 'GOAL 2: Zero Hunger'),
                                                            (3, 'GOAL 3: Good Health and Well-being'),
                                                            (4, 'GOAL 4: Quality Education'),
                                                            (5, 'GOAL 5: Gender Equality'),
                                                            (6, 'GOAL 6: Clean Water and Sanitation'),
                                                            (7, 'GOAL 7: Affordable and Clean Energy'),
                                                            (8, 'GOAL 8: Decent Work and Economic Growth'),
                                                            (9, 'GOAL 9: Industry, Innovation and Infrastructure'),
                                                            (10, 'GOAL 10: Reduced Inequality'),
                                                            (11, 'GOAL 11: Sustainable Cities and Communities'),
                                                            (12, 'GOAL 12: Responsible Consumption and Production'),
                                                            (13, 'GOAL 13: Climate Action'),
                                                            (14, 'GOAL 14: Life Below Water'),
                                                            (15, 'GOAL 15: Life on Land'),
                                                            (16, 'GOAL 16: Peace and Justice Strong Institutions'),
                                                            (17, 'GOAL 17: Partnerships to achieve the Goal');

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
                          `event_id` int(11) NOT NULL,
                          `id` int(11) NOT NULL,
                          `event_title` varchar(255) NOT NULL,
                          `event_description` text,
                          `event_datetime` datetime NOT NULL,
                          `event_timezone` varchar(255) NOT NULL,
                          `event_call_url` text,
                          `event_video_url` text
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
                         `id` int(10) UNSIGNED NOT NULL,
                         `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ImagePaths`
--

CREATE TABLE `ImagePaths` (
                              `project_id` int(11) NOT NULL,
                              `project_id``project_id` int(11) NOT NULL,
                              `imageUUID` bigint(20) UNSIGNED NOT NULL,
                              `extension` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
                                                          (11, '2022_03_18_132923_create_password_resets_table', 5),
                                                          (12, '2022_03_19_172101_laratrust_setup_tables', 6),
                                                          (13, '2022_03_25_183533_create_files_table', 7);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
                               `id` bigint(20) UNSIGNED NOT NULL,
                               `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                               `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
                                   `permission_id` bigint(20) UNSIGNED NOT NULL,
                                   `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
                                   `permission_id` bigint(20) UNSIGNED NOT NULL,
                                   `user_id` bigint(20) UNSIGNED NOT NULL,
                                   `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
                             `role_id` bigint(20) UNSIGNED NOT NULL,
                             `user_id` bigint(20) UNSIGNED NOT NULL,
                             `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
                             `timezone_id` int(11) NOT NULL,
                             `timezone_name` varchar(80) NOT NULL,
                             `timezone_relative_to_gmt` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`timezone_id`, `timezone_name`, `timezone_relative_to_gmt`) VALUES
                                                                                         (1, 'GMT', 'GMT+0:00'),
                                                                                         (2, 'UTC', 'GMT+0:00'),
                                                                                         (3, 'ECT', 'GMT+1:00'),
                                                                                         (4, 'EET', 'GMT+2:00'),
                                                                                         (5, 'ART', 'GMT+2:00'),
                                                                                         (6, 'EAT', 'GMT+3:00'),
                                                                                         (7, 'MET', 'GMT+3:30'),
                                                                                         (8, 'NET', 'GMT+4:00'),
                                                                                         (9, 'PLT', 'GMT+5:00'),
                                                                                         (10, 'IST', 'GMT+5:30'),
                                                                                         (11, 'BST', 'GMT+6:00'),
                                                                                         (12, 'VST', 'GMT+7:00'),
                                                                                         (13, 'CTT', 'GMT+8:00'),
                                                                                         (14, 'JST', 'GMT+9:00'),
                                                                                         (15, 'ACT', 'GMT+9:30'),
                                                                                         (16, 'AET', 'GMT+10:00'),
                                                                                         (17, 'SST', 'GMT+11:00'),
                                                                                         (18, 'NST', 'GMT+12:00'),
                                                                                         (19, 'MIT', 'GMT-11:00'),
                                                                                         (20, 'HST', 'GMT-10:00'),
                                                                                         (21, 'AST', 'GMT-9:00'),
                                                                                         (22, 'PST', 'GMT-8:00'),
                                                                                         (23, 'PNT', 'GMT-7:00'),
                                                                                         (24, 'MST', 'GMT-7:00'),
                                                                                         (25, 'CST', 'GMT-6:00'),
                                                                                         (26, 'EST', 'GMT-5:00'),
                                                                                         (27, 'IET', 'GMT-5:00'),
                                                                                         (28, 'PRT', 'GMT-4:00'),
                                                                                         (29, 'CNT', 'GMT-3:30'),
                                                                                         (30, 'AGT', 'GMT-3:00'),
                                                                                         (31, 'BET', 'GMT-3:00'),
                                                                                         (32, 'CAT', 'GMT-1:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `org` varchar(255) NOT NULL,
                         `phone` varchar(255) DEFAULT NULL,
                         `address` text,
                         `city` varchar(100) DEFAULT NULL,
                         `country` varchar(100) DEFAULT NULL,
                         `postcode` varchar(100) DEFAULT NULL,
                         `latitude` float(10,6) NOT NULL,
                         `longitude` float(10,6) NOT NULL,
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
    ADD PRIMARY KEY (`categoryID`);

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
-- Indexes for table `ImagePaths`
--
ALTER TABLE `ImagePaths`
    ADD PRIMARY KEY (`imageUUID`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
    ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
    ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
    ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
    ADD PRIMARY KEY (`timezone_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
    MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
    MODIFY `timezone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
    ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
    ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resource`
--
ALTER TABLE `resource`
    ADD CONSTRAINT `resource_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
    ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
