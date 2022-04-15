-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 15, 2022 at 07:50 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

DROP DATABASE ancssc_database;

CREATE DATABASE ancssc_database
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

GRANT ALL PRIVILEGES
    ON ancssc_database.*
    TO 'user'@'51.142.117.217'
        IDENTIFIED BY 'password';

    -- TO 'user'@'localhost'
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

USE ancssc_database;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
  `event_video_url` text,
  `image_name` varchar(100) DEFAULT NULL,
  `sdg1` int(20) DEFAULT NULL,
  `sdg2` int(20) DEFAULT NULL,
  `sdg3` int(20) DEFAULT NULL,
  `sdg4` int(20) DEFAULT NULL,
  `sdg5` int(20) DEFAULT NULL,
  `sdg6` int(20) DEFAULT NULL,
  `sdg7` int(20) DEFAULT NULL,
  `sdg8` int(20) DEFAULT NULL,
  `sdg9` int(20) DEFAULT NULL,
  `sdg10` int(20) DEFAULT NULL,
  `sdg11` int(20) DEFAULT NULL,
  `sdg12` int(20) DEFAULT NULL,
  `sdg13` int(20) DEFAULT NULL,
  `sdg14` int(20) DEFAULT NULL,
  `sdg15` int(20) DEFAULT NULL,
  `sdg16` int(20) DEFAULT NULL,
  `sdg17` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `id`, `event_title`, `event_description`, `event_datetime`, `event_timezone`, `event_call_url`, `event_video_url`, `image_name`, `sdg1`, `sdg2`, `sdg3`, `sdg4`, `sdg5`, `sdg6`, `sdg7`, `sdg8`, `sdg9`, `sdg10`, `sdg11`, `sdg12`, `sdg13`, `sdg14`, `sdg15`, `sdg16`, `sdg17`) VALUES
(2, 3, 'Women\'s Sector Initiative', 'The Women\'s Sector Initiative is Dubais only annual event focussed on networking between women working in the third and charity sector', '2022-07-03 08:42:00', 'GMT+2:00', 'https://ucl.zoom.us/j/99130509236?pwd=L3JOTlBvT2V0Y204bFFLZ2psWXBrQT09', 'https://www.youtube.com/watch?v=C5I9_IT_hnE', '6259226c2897edubai charity.jpeg', 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 12, 0, 0, 15, 0, 0),
(3, 3, 'The Motion Event - Pakistan', "The Motion Event is Pakistan\'s only annual conference for advocating exercise as a form of preventative medicine.", '2022-03-10 08:48:00', 'GMT+2:00', '', 'https://www.youtube.com/watch?v=LWxDflVmJSA', '625923952e72epakistan.jpeg', 0, 2, 0, 0, 0, 0, 7, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0);

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
  `uuid` int(100) DEFAULT NULL,
  `project_id` int(10) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `uuid`, `project_id`, `title`, `cover`, `created_at`, `updated_at`) VALUES
(8, 47692000, 6, 'project 1', 'project1.pdf', '2022-04-10 10:06:32', '2022-04-10 10:06:32'),
(24, 34143680, 6, 'project 2', 'project1.pdf', '2022-04-12 10:03:37', '2022-04-12 10:03:37'),
(25, 22, 5, 'the graph file', 'output.png', '2022-04-12 11:00:24', '2022-04-12 11:00:24'),
(26, 44442, 5, 'erd', 'ANCSSC ERD.png', '2022-04-12 11:01:20', '2022-04-12 11:01:20'),
(27, 67, 5, NULL, 'airbnb logo.png', '2022-04-12 11:52:27', '2022-04-12 11:52:27'),
(28, 7733, 8, 'pets perfect', '', '2022-04-12 12:35:49', '2022-04-12 12:35:49'),
(29, 903, 8, 'airbnb', 'airbnb logo.png', '2022-04-12 12:36:31', '2022-04-12 12:36:31'),
(30, 9920, 8, 'pets', '', '2022-04-12 12:36:46', '2022-04-12 12:36:46'),
(31, 0, 3, NULL, 'ANCSSC ERD.png', '2022-04-13 16:19:44', '2022-04-13 16:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `ImagePaths`
--

CREATE TABLE `ImagePaths` (
  `project_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `imageUUID` bigint(20) UNSIGNED NOT NULL,
  `extension` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ImagePaths`
--

INSERT INTO `ImagePaths` (`project_id`, `event_id`, `imageUUID`, `extension`) VALUES
(1, NULL, 1728097182231375, 'png'),
(1, NULL, 1728097650736589, 'png'),
(1, NULL, 1728099671457598, 'png'),
(1, NULL, 1728206133598976, 'png'),
(1, NULL, 1728278761343642, 'png'),
(1, NULL, 1729718070885351, 'jpg'),
(1, NULL, 1729730290171205, 'png'),
(3, NULL, 1730012010521259, 'png');

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

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `image_path`, `created_at`, `updated_at`) VALUES
(2, '[\"95e6960f-7cc6-4157-8ef7-a9932c2146d1.jpg\"]', '[\"95e6960f-7cc6-4157-8ef7-a9932c2146d1.jpg\"]', '2022-04-10 11:28:39', '2022-04-10 11:28:39');

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

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `member_name`, `address`, `sdg`, `lat`, `lon`, `description`) VALUES
(1, 'Jack', 'Av. Pedro De Valdivia 2907 Ñuñoa (2)2746343, Las Condes', 'GOAL 1: No Poverty', -14.280354, -53.407848, 'Well-Building Charity'),
(2, 'Mark', 'Calle Luis Acevedo, 23', 'GOAL 2: Zero Hunger', 27.979849, 0.416379, 'Food for Change'),
(3, 'Jack', 'Av. Pedro De Valdivia', 'GOAL 1: No Poverty', 18.297165, -9.697609, 'Oxfam');

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
(12, '2022_03_19_172101_laratrust_setup_tables', 6);

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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `created_at`, `updated_at`, `email`, `token`) VALUES
(3, '2022-04-12 12:55:30', NULL, 'mjwsolo@hotmail.com', '$2y$10$XKOCjB0iF4xkREZaHQm/1.qh1gXiDG9GuvMpZAqOPArpof0FE17Y6'),
(4, '2022-04-12 13:45:23', NULL, 'jack@gmail.com', '$2y$10$7S6ymzdsXLLz4gkmnXKvx.QT2vfjCaZT8Vn9adDDPZ7rEBI6WTcPy');

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
  `sdg` varchar(255) DEFAULT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sdg1` int(20) DEFAULT NULL,
  `sdg2` int(20) DEFAULT NULL,
  `sdg3` int(20) DEFAULT NULL,
  `sdg4` int(20) DEFAULT NULL,
  `sdg5` int(20) DEFAULT NULL,
  `sdg6` int(20) DEFAULT NULL,
  `sdg7` int(20) DEFAULT NULL,
  `sdg8` int(20) DEFAULT NULL,
  `sdg9` int(20) DEFAULT NULL,
  `sdg10` int(20) DEFAULT NULL,
  `sdg11` int(20) DEFAULT NULL,
  `sdg12` int(20) DEFAULT NULL,
  `sdg13` int(20) DEFAULT NULL,
  `sdg14` int(20) DEFAULT NULL,
  `sdg15` int(20) DEFAULT NULL,
  `sdg16` int(20) DEFAULT NULL,
  `sdg17` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `id`, `projectTitle`, `projectOrganisation`, `projectLocation`, `projectCity`, `projectCountry`, `projectDetails`, `project_date_added`, `project_last_updated`, `projectEndDate`, `projectValue`, `fundingRequired`, `sdg`, `image_name`, `latitude`, `longitude`, `country`, `address`, `sdg1`, `sdg2`, `sdg3`, `sdg4`, `sdg5`, `sdg6`, `sdg7`, `sdg8`, `sdg9`, `sdg10`, `sdg11`, `sdg12`, `sdg13`, `sdg14`, `sdg15`, `sdg16`, `sdg17`) VALUES
(1, 52, 'Well building in Syria', 'Oxfam', '', '', '', 'The Water Project digs wells in Syria to provide clean, safe water to those who need it most.', 0, '0000-00-00', '2022-06-26 08:35:00', '4343', '34', NULL, '6259204d37c5fwell building.webp', 34.7943225,36.7589466, '', '97 Fulton Park', 1, 0, 0, 0, 0, 6, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 52, 'Food for all 2023', 'MSF', '', '', '', 'Food Africa Project is an innovate public-private partnership between the United Nations Sustainable Development Goals Fund (SDG Fund) , Sahara Group- a member of the SDG Fund Private Sector Advisory Group (PSAG) , United Nation agencies, world renowned chefs- the Roca Brothers and the Kaduna State Governmen', 0, '0000-00-00', '2022-10-09 08:35:00', '34342', '234', NULL, '6259206774deffood.jpeg', 12.238143,-3.7989281, '', '6 Luster Plaza', 1, 0, 0, 0, 0, 6, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 52, 'Literacy for all, Jaipur', 'ReadingWeek', '', '', '', 'The three-month intensive digital literacy programme equips them with basic skills in operating computer software and smartphone applications. The objective? Imparting skills to increase employability opportunities for the trainees and also to prepare them for the competitive Rajasthan State Certificate in Information Technology exams for securing IT-based public sector jobs.', 0, '0000-00-00', '2022-05-08 08:36:00', '234', '345', NULL, '625920a0652e0literacy.png', 26.8851417,75.6504722, '', '0 Esch Place', 1, 2, 0, 4, 0, 6, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 52, 'Health training, medicine drive', 'NHS(Internaional)', '', '', '', 'The training program will be delivered through an application and aims to reach 600,000 healthcare workers — mainly nurses, doctors and midwives. The program includes six different modules available in three different languages: English, French and Arabic.', 0, '0000-00-00', '2022-05-08 08:38:00', '3453', '234324', NULL, '625920ff1cb7amedicine.jpeg', 6.4059651,-11.6970177, '', '155 Buena Vista Road', 1, 0, 0, 0, 0, 6, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 52, 'Water wells for Micronesia', 'WWF', '', '', '', 'Mkwanda has 42 households or families.  There are 7 other villages that utilize the current water source with a total of 87 households.\r\nWhen the new borehole is hopefully installed in this village area, 142 families are expected to benefit from it with a population of around 600 people.  The next borehole from this village is 2.5 kms or 1.6 miles away.', 0, '0000-00-00', '2022-05-08 08:38:00', '345345', '53534', NULL, '6259211cb221dmicro.jpeg', 5.1509108,141.1727684, '', '1 Lyons Center', 1, 0, 0, 0, 0, 6, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 52, 'Affordable and clean energy', 'Shell (International Projects)', '', '', '', 'Through building a partnership between the public and private sectors, the city of Kumbasa has improved the energy efficiency of its housing stock, decreased fuel poverty and created jobs and training opportunities for vulnerable young people.', 0, '0000-00-00', '2022-05-08 08:37:00', '34545', '34423', NULL, '625920be92bffsolar energy africa women.jpeg', -0.599285,119.8290778, '', '4 Talmadge Junction', 1, 0, 0, 0, 0, 6, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0);

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
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `uuid` varchar(100) DEFAULT NULL,
  `resource_title` varchar(255) NOT NULL,
  `resource_sdg` varchar(255) DEFAULT NULL,
  `resource_language` varchar(100) DEFAULT NULL,
  `resource_description` text,
  `resource_added_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `id`, `uuid`, `resource_title`, `resource_sdg`, `resource_language`, `resource_description`, `resource_added_date`, `created_at`, `updated_at`, `cover`) VALUES
(11, NULL, 'd26bdf60-bab6-11ec-8fea-c18f61a78db6', '', NULL, NULL, NULL, NULL, '2022-04-12 22:18:11', '2022-04-12 22:18:11', 'airbnb logo.png'),
(12, NULL, '6f36c2c0-bab7-11ec-ba4c-39fa123f4de9', '', NULL, NULL, NULL, NULL, '2022-04-12 22:22:34', '2022-04-12 22:22:34', 'ANCSSC ERD.png'),
(13, NULL, 'db9ea740-bab7-11ec-abaa-15d8a5061436', '', NULL, NULL, NULL, NULL, '2022-04-12 22:25:36', '2022-04-12 22:25:36', 'IBM.png'),
(14, NULL, '4d99bda0-bb1a-11ec-b051-59acab998c28', '', NULL, NULL, NULL, NULL, '2022-04-13 10:10:18', '2022-04-13 10:10:18', 'SOLOMON M 21517462 (1).pdf'),
(15, NULL, 'd475c770-bb41-11ec-a7b1-679658889b97', '', NULL, NULL, NULL, NULL, '2022-04-13 14:53:15', '2022-04-13 14:53:15', 'airbnb logo.png'),
(16, NULL, '48b43780-bb44-11ec-98a5-09b04b508f89', '', NULL, NULL, NULL, NULL, '2022-04-13 15:10:49', '2022-04-13 15:10:49', 'MSIN0144 - Team Chromium.pdf'),
(17, NULL, '005dae60-bbd2-11ec-9d36-93341035041b', 'The interesting project', '6,7,5,5', 'English', 'sfsdfdsfsdfsdfsd sf', '0000-00-00', '2022-04-14 08:05:16', '2022-04-14 08:05:16', 'MSIN0144 - Team Chromium.pdf');

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
  `timezone_relative_to_gmt` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`timezone_id`, `timezone_relative_to_gmt`) VALUES
                                                                                        (1,  'GMT+0:00'),
                                                                                        (2,  'GMT+1:00'),
                                                                                        (3,  'GMT+2:00'),
                                                                                        (4,  'GMT+3:00'),
                                                                                        (5,  'GMT+3:30'),
                                                                                        (6,  'GMT+4:00'),
                                                                                        (7,  'GMT+5:00'),
                                                                                        (8,  'GMT+5:30'),
                                                                                        (9,  'GMT+6:00'),
                                                                                        (10,  'GMT+7:00'),
                                                                                        (11,  'GMT+8:00'),
                                                                                        (12,  'GMT+9:00'),
                                                                                        (13,  'GMT+9:30'),
                                                                                        (14,  'GMT+10:00'),
                                                                                        (15,  'GMT+11:00'),
                                                                                        (16,  'GMT+12:00'),
                                                                                        (17,  'GMT-11:00'),
                                                                                        (18,  'GMT-10:00'),
                                                                                        (19,  'GMT-9:00'),
                                                                                        (20,  'GMT-8:00'),
                                                                                        (21,  'GMT-7:00'),
                                                                                        (22,  'GMT-6:00'),
                                                                                        (23,  'GMT-5:00'),
                                                                                        (24,  'GMT-4:00'),
                                                                                        (25,  'GMT-3:30'),
                                                                                        (26,  'GMT-3:00'),
                                                                                        (27,  'GMT-2:00'),
                                                                                        (28,  'GMT-1:00');

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
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `sdg1` int(20) DEFAULT NULL,
  `sdg2` int(20) DEFAULT NULL,
  `sdg3` int(20) DEFAULT NULL,
  `sdg4` int(20) DEFAULT NULL,
  `sdg5` int(20) DEFAULT NULL,
  `sdg6` int(20) DEFAULT NULL,
  `sdg7` int(20) DEFAULT NULL,
  `sdg8` int(20) DEFAULT NULL,
  `sdg9` int(20) DEFAULT NULL,
  `sdg10` int(20) DEFAULT NULL,
  `sdg11` int(20) DEFAULT NULL,
  `sdg12` int(20) DEFAULT NULL,
  `sdg13` int(20) DEFAULT NULL,
  `sdg14` int(20) DEFAULT NULL,
  `sdg15` int(20) DEFAULT NULL,
  `sdg16` int(20) DEFAULT NULL,
  `sdg17` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `org`, `phone`, `address`, `city`, `country`, `postcode`, `latitude`, `longitude`, `number_of_employees`, `number_of_volunteers`, `website`, `role`, `created_at`, `updated_at`, `subscription_type`, `user_status`, `remember_token`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`, `sdg1`, `sdg2`, `sdg3`, `sdg4`, `sdg5`, `sdg6`, `sdg7`, `sdg8`, `sdg9`, `sdg10`, `sdg11`, `sdg12`, `sdg13`, `sdg14`, `sdg15`, `sdg16`, `sdg17`) VALUES
(1, 'Jackp', '12345678', 'jack@gmail.com', 'sfefwefwef', 'kh', 'Athens Greece Tourism And Economic Development Company, Xenofontos, Athens, Greece', 'oih', 'oih', 'oi', 37.974014, 0.000000, 0, 0, 'h', 3, '2022-04-14 12:06:05', '2022-04-12 12:59:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Marc', '$2y$10$CpEkai1mfDE7XzPOWwmk1.U5.bY9MmpN.Uj7FqYWxVxxrW.YJDkOm', 'mjwsolo@hotmail.com', 'The Best Org', '0207241 4801', 'London', 'London', 'England', 'N1 8BZ', 0.000000, 0.000000, 100, 122, '100.com', 3, '2022-03-24 17:53:12', '2022-03-24 17:52:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Admin', '$2y$10$S4.9uPNj7iUoPCYkUVgn0OjCV.3dVIFLiXF.8jAwJKeoatI.T71yO', 'admin@gmail.com', 'test', '1234', 'London, 英国', NULL, '英国', NULL, 51.507217, -0.127586, 1, 1, '1', 1, '2022-04-11 21:46:03', '2022-04-10 09:46:44', NULL, NULL, 'TlXzdEx9CILgyoMPJoIBynbUTIphMIxJgeUXjZhXnWDxMAHalPjXzk6IXSxn', NULL, NULL, NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Cecil Rodmell', 'qlMv9Zhrt', 'crodmell3@imageshack.us', 'Realcube', '822-524-3842', '893 Everett Court', 'San Francisco', 'Mexico', '95710', 20.896584, -105.409355, 341, 347, 'https://mozilla.com/justo/sit/amet/sapien/dignissim/vestibulum.html?duis=sapien&aliquam=iaculis&convallis=congue&nunc=vivamus&proin=metus&at=arcu&turpis=adipiscing&a=molestie&pede=hendrerit&posuere=at&nonummy=vulputate&integer=vitae&non=nisl&velit=aenean&', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Ancssc', '$2y$10$GOEU6.UNmiyU02/SlkNF7e6Se5f1DMhUcrisJZZ5/vPjRpKE6oQrS', 'ancssc@hotmail.com', 'jojoijijoijoijijoijoijdfklkjjojijo', '02023239423', 'Oxfam Superstore Oxford, Alec Issigonis Way, Oxford, UK', NULL, 'OX4 2JZ', NULL, 51.733383, -1.207548, 2345, 234, 'ancscc.com', 3, '2022-04-12 14:42:50', '2022-04-12 12:17:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 6, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Oxfam', '$2y$10$2PmTKvoOdM0Ceq7kPd0ox.8TTdDrWSXi4moKfIhAuBi2bNa/VhCVe', 'oxfam@hotmail.com', 'Oxfam', '02083234434', 'Oxford Station, Park End Street, Oxford, UK', NULL, 'OX1 1HS', NULL, 51.753288, -1.269913, 3453, 231, 'oxfam.com', 1, '2022-04-14 09:34:27', '2022-04-14 08:01:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, 15, NULL, NULL),
(7, 'james', '$2y$10$eqEebwvXiVxiSjZyWRiJwOt48v8Rv/ofytcDrW.kFOf7EX4d9OH.a', 'james@hotmail.com', 'james', 'james', 'E.W.R. (EWR), Brewster Road, Newark, NJ, USA', NULL, '07114', NULL, 40.689529, -74.174461, 12323, 121, 'james.com', 3, '2022-04-14 14:19:47', '2022-04-14 11:07:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, NULL, NULL),
(8, 'Roldan Millichap', 'tGoRkUgYZ489', 'rmillichap7@wunderground.com', 'Yodoo', '610-151-8494', '9 Quincy Alley', 'Debre Werk’', 'Ethiopia', NULL, 10.656869, 38.166214, 249, 396, 'http://senate.gov/sollicitudin/mi/sit/amet/lobortis.xml?praesent=rhoncus&id=aliquet&massa=pulvinar&id=sed&nisl=nisl&venenatis=nunc&lacinia=rhoncus&aenean=dui&sit=vel&amet=sem&justo=sed&morbi=sagittis&ut=nam&odio=congue&cras=risus&mi=semper&pede=porta&male', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Laetitia Surman-Wells', 'SgiwAe', 'lsurmanwells8@360.cn', 'Bubbletube', '479-630-0480', '87 Randy Point', 'Armen', 'Albania', NULL, 40.533558, 19.595490, 304, 126, 'https://comsenz.com/sapien/in.jpg?eget=nonummy&tempus=maecenas&vel=tincidunt&pede=lacus&morbi=at&porttitor=velit&lorem=vivamus&id=vel&ligula=nulla&suspendisse=eget&ornare=eros&consequat=elementum&lectus=pellentesque&in=quisque&est=porta&risus=volutpat&auc', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Lief Quincey', 'czBoQTQ', 'lquincey9@time.com', 'Wordtune', '263-194-2747', '7 Miller Center', 'Staré Město', 'Czech Republic', '788 32', 50.161732, 16.947346, 428, 191, 'https://army.mil/tortor/quis/turpis/sed/ante/vivamus/tortor.json?dolor=amet&sit=justo&amet=morbi&consectetuer=ut&adipiscing=odio&elit=cras&proin=mi&risus=pede&praesent=malesuada&lectus=in&vestibulum=imperdiet&quam=et&sapien=commodo&varius=vulputate&ut=jus', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Alanson Minthorpe', 'zPMJXv7D5N', 'aminthorpea@yolasite.com', 'Cogidoo', '948-550-6227', '98 Village Green Street', 'Khōshī', 'Afghanistan', NULL, 34.013645, 69.430779, 170, 25, 'http://mozilla.org/rutrum/nulla/nunc/purus/phasellus.aspx?dapibus=et&dolor=ultrices&vel=posuere&est=cubilia&donec=curae&odio=nulla&justo=dapibus&sollicitudin=dolor&ut=vel&suscipit=est&a=donec&feugiat=odio&et=justo&eros=sollicitudin&vestibulum=ut&ac=suscip', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Birgit McCandie', 'yFMN8ntt', 'bmccandieb@i2i.jp', 'Riffwire', '102-857-1310', '78824 Jenifer Lane', 'Sines', 'Portugal', '7520-103', 37.957153, -8.860891, 161, 107, 'http://independent.co.uk/etiam/justo/etiam/pretium/iaculis/justo.html?arcu=quam&sed=pede&augue=lobortis&aliquam=ligula&erat=sit', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Christoforo Wyllie', 'TkZ9F4OjW', 'cwylliec@soundcloud.com', 'Zoomzone', '375-462-9349', '0804 Twin Pines Crossing', 'Vénissieux', 'France', '69639 CEDEX', 45.716423, 4.875073, 213, 145, 'http://dyndns.org/eget/massa/tempor/convallis/nulla.aspx?venenatis=turpis&non=sed&sodales=ante&sed=vivamus&tincidunt=tortor&eu=duis&felis=mattis&fusce=egestas&posuere=metus&felis=aenean&sed=fermentum&lacus=donec&morbi=ut&sem=mauris&mauris=eget&laoreet=mas', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Gabriel Van der Spohr', '9kvRgmVIgh', 'gvand@purevolume.com', 'Bubblemix', '436-693-9820', '862 Waywood Park', 'Ash Shaddādah', 'Syria', NULL, 36.055820, 40.731064, 362, 11, 'https://google.cn/curabitur/at.png?diam=in', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Kynthia Harries', 'AHJL9ivi', 'kharriese@barnesandnoble.com', 'Fivechat', '909-604-9976', '8 Hansons Road', 'Ban Nahin', 'Laos', NULL, 18.181194, 104.545189, 25, 440, 'http://cdbaby.com/massa/quis/augue.json?habitasse=eros&platea=elementum&dictumst=pellentesque&maecenas=quisque&ut=porta&massa=volutpat&quis=erat&augue=quisque&luctus=erat&tincidunt=eros&nulla=viverra&mollis=eget&molestie=congue&lorem=eget&quisque=semper&u', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Rodolph Deverall', 'Q9qfeUTYsPm', 'rdeverallf@nyu.edu', 'Browsebug', '205-550-3131', '2030 Jenifer Avenue', 'Konyshevka', 'Russia', '307732', 51.807911, 35.238251, 13, 144, 'http://phoca.cz/justo/in/blandit/ultrices/enim/lorem.jsp?ligula=mi&sit=integer&amet=ac&eleifend=neque&pede=duis&libero=bibendum&quis=morbi&orci=non&nullam=quam&molestie=nec&nibh=dui&in=luctus&lectus=rutrum&pellentesque=nulla&at=tellus&nulla=in&suspendisse', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Janean Millett', 'mKtfVRbVE', 'jmillettg@goo.ne.jp', 'Gabtune', '973-862-5902', '93 Gateway Way', 'Coronel Fabriciano', 'Brazil', '35170-000', -19.518997, -42.628204, 286, 78, 'http://cbc.ca/sit.jpg?eu=ac&nibh=enim&quisque=in&id=tempor&justo=turpis&sit=nec&amet=euismod&sapien=scelerisque&dignissim=quam&vestibulum=turpis&vestibulum=adipiscing&ante=lorem&ipsum=vitae&primis=mattis&in=nibh&faucibus=ligula&orci=nec&luctus=sem&et=duis', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Zola Yearnes', 'j2AmhCaX', 'zyearnesh@washington.edu', 'Topiclounge', '589-969-7443', '91888 Susan Plaza', 'Yunmeng Chengguanzhen', 'China', NULL, 31.032490, 113.750587, 167, 386, 'http://msu.edu/ligula/vehicula/consequat/morbi/a.json?dolor=mi&sit=nulla&amet=ac&consectetuer=enim&adipiscing=in&elit=tempor&proin=turpis&interdum=nec&mauris=euismod&non=scelerisque&ligula=quam&pellentesque=turpis&ultrices=adipiscing&phasellus=lorem&id=vi', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Bridgette Amiranda', 'jpiSrL', 'bamirandai@e-recht24.de', 'Aibox', '108-344-6503', '286 Iowa Trail', 'Ronggo', 'Indonesia', NULL, -6.839270, 111.245750, 8, 415, 'http://discuz.net/luctus/et/ultrices/posuere/cubilia/curae/donec.xml?turpis=diam&sed=vitae&ante=quam&vivamus=suspendisse&tortor=potenti&duis=nullam&mattis=porttitor&egestas=lacus&metus=at&aenean=turpis&fermentum=donec&donec=posuere&ut=metus&mauris=vitae&e', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Brew Theuff', 'QLeaybd', 'btheuffj@xinhuanet.com', 'Youbridge', '939-456-6351', '3 Dunning Circle', 'Alaminos', 'Philippines', '4001', 14.065112, 121.246216, 173, 294, 'https://narod.ru/mauris/sit/amet/eros/suspendisse/accumsan.jpg?orci=non&nullam=quam&molestie=nec&nibh=dui&in=luctus&lectus=rutrum&pellentesque=nulla&at=tellus&nulla=in&suspendisse=sagittis&potenti=dui&cras=vel&in=nisl&purus=duis&eu=ac&magna=nibh&vulputate', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Paxon Corpe', 'YxvrdvNgw', 'pcorpek@webnode.com', 'Meemm', '224-921-6955', '53436 Northridge Court', 'Twardawa', 'Poland', '47-340', 50.343491, 17.990971, 327, 231, 'https://wikipedia.org/convallis/eget/eleifend.js?donec=molestie&pharetra=hendrerit&magna=at&vestibulum=vulputate&aliquet=vitae&ultrices=nisl&erat=aenean&tortor=lectus&sollicitudin=pellentesque&mi=eget&sit=nunc&amet=donec&lobortis=quis&sapien=orci&sapien=e', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Caryn Kubu', 'sdoQYTgZ', 'ckubul@netlog.com', 'Feednation', '683-831-5583', '03777 Lillian Junction', 'Āshkhāneh', 'Iran', NULL, 37.554417, 56.926727, 437, 245, 'https://omniture.com/nulla/nunc/purus.aspx?ipsum=maecenas&praesent=ut&blandit=massa&lacinia=quis&erat=augue&vestibulum=luctus&sed=tincidunt&magna=nulla&at=mollis&nunc=molestie&commodo=lorem&placerat=quisque&praesent=ut&blandit=erat&nam=curabitur&nulla=gra', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Gare Mattingley', 'cfNDfzBQaxj', 'gmattingleym@imageshack.us', 'Jabberstorm', '354-482-2917', '3 Holy Cross Terrace', 'Rozhnyativ', 'Ukraine', NULL, 48.936134, 24.159409, 410, 276, 'http://wiley.com/vestibulum/sed/magna/at/nunc/commodo/placerat.jsp?non=tellus&sodales=nisi&sed=eu&tincidunt=orci', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Eward Ricold', 'Lc76WeU', 'ericoldn@angelfire.com', 'Bubblebox', '925-630-9644', '9 Crownhardt Point', 'Pukhavichy', 'Belarus', NULL, 53.513187, 27.905136, 208, 199, 'http://exblog.jp/luctus/tincidunt/nulla/mollis.png?rutrum=hac&rutrum=habitasse&neque=platea&aenean=dictumst&auctor=etiam&gravida=faucibus&sem=cursus&praesent=urna&id=ut&massa=tellus&id=nulla&nisl=ut&venenatis=erat&lacinia=id&aenean=mauris&sit=vulputate&am', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Wallache Monte', 'Teujru', 'wmonteo@unesco.org', 'Devcast', '568-307-8009', '9350 Lyons Lane', 'Lingshan', 'China', NULL, 31.429979, 120.096497, 458, 471, 'http://amazon.de/volutpat/sapien.jsp?eget=blandit&rutrum=ultrices&at=enim&lorem=lorem&integer=ipsum&tincidunt=dolor&ante=sit&vel=amet&ipsum=consectetuer&praesent=adipiscing&blandit=elit&lacinia=proin&erat=interdum&vestibulum=mauris&sed=non&magna=ligula&at', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Frannie Hachette', 'QRy6OLrzIGK', 'fhachettep@forbes.com', 'Vitz', '856-888-8530', '207 Golf View Circle', 'Habo', 'Sweden', '566 24', 57.908478, 14.069801, 494, 178, 'https://globo.com/vestibulum/ante.json?erat=ultricies&curabitur=eu&gravida=nibh&nisi=quisque&at=id&nibh=justo&in=sit&hac=amet&habitasse=sapien&platea=dignissim&dictumst=vestibulum&aliquam=vestibulum&augue=ante&quam=ipsum&sollicitudin=primis&vitae=in&conse', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Malissa Rubbens', 'k1Nufbs', 'mrubbensq@cdbaby.com', 'Dynabox', '542-960-1371', '748 Ronald Regan Drive', 'Cedynia', 'Poland', '74-520', 52.879250, 14.202220, 475, 88, 'http://flickr.com/enim/leo/rhoncus/sed/vestibulum.xml?at=convallis&nunc=nulla&commodo=neque&placerat=libero&praesent=convallis&blandit=eget&nam=eleifend&nulla=luctus&integer=ultricies&pede=eu&justo=nibh&lacinia=quisque&eget=id&tincidunt=justo&eget=sit&tem', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Abbey Weeds', 'jvAusbchvHmS', 'aweedsr@theatlantic.com', 'Realcube', '976-649-1309', '98 Anderson Avenue', 'Longshan', 'China', NULL, 42.901531, 125.136452, 28, 464, 'http://loc.gov/pellentesque/viverra.png?tortor=nulla&duis=justo&mattis=aliquam&egestas=quis&metus=turpis&aenean=eget&fermentum=elit&donec=sodales&ut=scelerisque&mauris=mauris&eget=sit&massa=amet&tempor=eros&convallis=suspendisse&nulla=accumsan&neque=torto', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Marion McMeekin', 'iqKUoy', 'mmcmeekins@wisc.edu', 'Innojam', '974-104-5107', '18338 Helena Trail', 'Dvinskoy', 'Russia', '165500', 62.155693, 45.118160, 362, 362, 'http://stanford.edu/elit/proin/interdum/mauris/non/ligula.js?nullam=id&varius=luctus&nulla=nec', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Peggi Archibould', 'LuYwmy', 'parchibouldt@state.tx.us', 'Devcast', '189-462-6767', '020 Waubesa Plaza', 'Jiukeng', 'China', NULL, 29.803848, 118.862328, 198, 335, 'http://networksolutions.com/consequat/dui/nec/nisi/volutpat.png?vehicula=in&condimentum=quis&curabitur=justo&in=maecenas&libero=rhoncus&ut=aliquam&massa=lacus&volutpat=morbi&convallis=quis&morbi=tortor&odio=id&odio=nulla&elementum=ultrices&eu=aliquet&inte', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Ulberto Ikringill', '03MJhrJcp', 'uikringillu@army.mil', 'Meemm', '267-999-3608', '7 Colorado Drive', 'Yushan', 'China', NULL, 28.682308, 118.244766, 269, 477, 'http://imdb.com/mauris/sit/amet/eros/suspendisse/accumsan/tortor.html?iaculis=sed&justo=sagittis&in=nam&hac=congue&habitasse=risus&platea=semper&dictumst=porta&etiam=volutpat&faucibus=quam&cursus=pede&urna=lobortis&ut=ligula&tellus=sit&nulla=amet&ut=eleif', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Hannah Foulcher', 'LIRqTv', 'hfoulcherv@ftc.gov', 'Kazu', '360-148-1911', '85312 Fisk Drive', 'Yangdu', 'China', NULL, 26.848547, 115.193596, 410, 379, 'http://intel.com/congue/risus/semper.jpg?aenean=volutpat&fermentum=sapien&donec=arcu&ut=sed&mauris=augue&eget=aliquam&massa=erat&tempor=volutpat&convallis=in&nulla=congue&neque=etiam&libero=justo&convallis=etiam&eget=pretium&eleifend=iaculis&luctus=justo&', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Allyce Matyja', 'q4IBw4odli', 'amatyjaw@usgs.gov', 'Thoughtworks', '482-917-2637', '9 Blackbird Point', 'Santa Cruz', 'Philippines', '5105', 13.074888, 120.721313, 492, 115, 'http://washingtonpost.com/ullamcorper/purus/sit/amet/nulla/quisque/arcu.html?ipsum=id&primis=massa&in=id&faucibus=nisl&orci=venenatis&luctus=lacinia&et=aenean&ultrices=sit&posuere=amet&cubilia=justo&curae=morbi&mauris=ut&viverra=odio&diam=cras&vitae=mi&qu', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Mignonne Cordeau', 'VvIIBPHcW', 'mcordeaux@nba.com', 'Katz', '374-733-4645', '98197 Rockefeller Alley', 'Los Fresnos', 'Mexico', '36750', 20.945570, -101.442345, 81, 83, 'https://zdnet.com/dolor/sit/amet/consectetuer/adipiscing.xml?justo=condimentum&sit=neque&amet=sapien&sapien=placerat&dignissim=ante&vestibulum=nulla&vestibulum=justo&ante=aliquam&ipsum=quis&primis=turpis&in=eget&faucibus=elit&orci=sodales&luctus=scelerisq', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Ashlan Oxteby', 'OBeEyXoHB', 'aoxtebyy@cisco.com', 'Realmix', '342-543-2039', '1613 Petterle Park', 'Haitou', 'China', NULL, 24.562944, 118.264351, 263, 28, 'https://so-net.ne.jp/ut/nunc/vestibulum.js?duis=massa&at=volutpat&velit=convallis&eu=morbi&est=odio&congue=odio&elementum=elementum&in=eu&hac=interdum&habitasse=eu&platea=tincidunt&dictumst=in&morbi=leo&vestibulum=maecenas&velit=pulvinar&id=lobortis&preti', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Stanly Livingstone', 'sQYN25', 'slivingstonez@networkadvertising.org', 'Youopia', '152-351-7122', '68 Bobwhite Trail', 'Vilnius', 'Lithuania', '27001', 54.638039, 25.286558, 370, 34, 'http://comsenz.com/enim/in/tempor/turpis/nec/euismod.xml?tempus=ut&vel=dolor&pede=morbi&morbi=vel&porttitor=lectus&lorem=in&id=quam&ligula=fringilla&suspendisse=rhoncus&ornare=mauris&consequat=enim&lectus=leo&in=rhoncus&est=sed&risus=vestibulum&auctor=sit', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Lidia Brookzie', 'BVB9L0hX', 'lbrookzie10@51.la', 'Jayo', '342-246-3158', '9 Hudson Crossing', 'Cafe', 'Philippines', '5516', 14.554384, 121.046089, 84, 188, 'https://microsoft.com/vestibulum/aliquet.png?amet=ante&cursus=ipsum&id=primis&turpis=in&integer=faucibus&aliquet=orci&massa=luctus&id=et&lobortis=ultrices&convallis=posuere&tortor=cubilia&risus=curae&dapibus=duis&augue=faucibus&vel=accumsan&accumsan=odio&', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Minnnie Rickert', 'wNRipp', 'mrickert11@discovery.com', 'Chatterbridge', '912-361-1120', '9 Cascade Crossing', 'Emiliano Zapata', 'Mexico', '86690', 18.071163, -93.161652, 242, 366, 'http://networksolutions.com/vel/est/donec.aspx?ante=orci&vestibulum=luctus&ante=et&ipsum=ultrices', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Carmina Popham', 'yeOllmu', 'cpopham12@is.gd', 'Skilith', '172-111-8809', '8591 Bay Parkway', 'Kolpashevo', 'Russia', '636465', 58.284351, 82.817680, 458, 231, 'https://51.la/lorem/ipsum/dolor/sit/amet.js?iaculis=posuere&diam=cubilia&erat=curae&fermentum=mauris&justo=viverra&nec=diam&condimentum=vitae&neque=quam&sapien=suspendisse&placerat=potenti&ante=nullam&nulla=porttitor&justo=lacus&aliquam=at', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Josie Lune', 'vr1iDwQi7I', 'jlune13@sfgate.com', 'Shuffledrive', '807-104-0125', '16726 Stang Crossing', 'Witkowo', 'Poland', '62-230', 52.438431, 17.773211, 401, 87, 'http://indiegogo.com/nulla/pede/ullamcorper/augue.html?velit=fusce&id=consequat&pretium=nulla&iaculis=nisl&diam=nunc&erat=nisl&fermentum=duis&justo=bibendum&nec=felis&condimentum=sed&neque=interdum&sapien=venenatis&placerat=turpis&ante=enim&nulla=blandit&', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Adrian Smallbone', 'NQN3Y0eX', 'asmallbone14@people.com.cn', 'Realbuzz', '344-396-9187', '56922 Lyons Way', 'Lisala', 'Democratic Republic of the Congo', NULL, 2.170107, 21.487209, 34, 119, 'https://ox.ac.uk/suspendisse/potenti/in/eleifend.xml?dictumst=ac&aliquam=enim&augue=in&quam=tempor&sollicitudin=turpis&vitae=nec&consectetuer=euismod&eget=scelerisque&rutrum=quam&at=turpis&lorem=adipiscing&integer=lorem&tincidunt=vitae&ante=mattis&vel=nib', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Lindon Archibald', '6mkwQ9EU', 'larchibald15@merriam-webster.com', 'Vidoo', '623-338-6867', '967 Fisk Hill', 'Kemil', 'Indonesia', NULL, -2.945569, 104.733437, 396, 316, 'https://nymag.com/nisl/duis/bibendum.html?in=tincidunt&sagittis=nulla&dui=mollis&vel=molestie&nisl=lorem&duis=quisque&ac=ut&nibh=erat&fusce=curabitur&lacus=gravida&purus=nisi&aliquet=at&at=nibh&feugiat=in&non=hac&pretium=habitasse&quis=platea&lectus=dictu', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Greggory Messer', '8NccfDvnMd5M', 'gmesser16@discovery.com', 'Dabtype', '439-471-2120', '5 Little Fleur Parkway', 'Campo Largo', 'Brazil', '83600-000', -25.459684, -49.527313, 427, 64, 'https://pcworld.com/pellentesque/at.png?est=magna&donec=vestibulum&odio=aliquet&justo=ultrices&sollicitudin=erat&ut=tortor&suscipit=sollicitudin&a=mi&feugiat=sit&et=amet&eros=lobortis&vestibulum=sapien&ac=sapien&est=non&lacinia=mi&nisi=integer&venenatis=a', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Kelli Limeburn', '4ef2J4eb', 'klimeburn17@flavors.me', 'Skiptube', '525-350-8709', '05 Miller Lane', 'Khlong Luang', 'Thailand', '12120', 14.065426, 100.647354, 112, 212, 'http://microsoft.com/consequat/nulla/nisl/nunc/nisl/duis.aspx?lorem=nam&ipsum=ultrices&dolor=libero&sit=non&amet=mattis&consectetuer=pulvinar&adipiscing=nulla&elit=pede&proin=ullamcorper&risus=augue&praesent=a&lectus=suscipit&vestibulum=nulla&quam=elit&sa', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Krishna Frizzell', 'iLKXTCgq9', 'kfrizzell18@ucoz.com', 'Wikibox', '397-716-0844', '574 Farragut Lane', 'Bautista', 'Philippines', '2424', 14.560972, 121.022400, 22, 127, 'https://scientificamerican.com/tempus/sit/amet/sem/fusce.html?vel=augue&nisl=luctus&duis=tincidunt&ac=nulla&nibh=mollis&fusce=molestie&lacus=lorem&purus=quisque&aliquet=ut&at=erat&feugiat=curabitur&non=gravida&pretium=nisi&quis=at&lectus=nibh&suspendisse=', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Bjorn Romanski', 'N05YiBbYg', 'bromanski19@shareasale.com', 'Buzzster', '399-782-4525', '926 Division Circle', 'Fengyi', 'China', NULL, 40.824604, -73.112228, 19, 500, 'https://networksolutions.com/augue.js?faucibus=maecenas&accumsan=pulvinar&odio=lobortis&curabitur=est&convallis=phasellus&duis=sit&consequat=amet&dui=erat&nec=nulla&nisi=tempus&volutpat=vivamus&eleifend=in&donec=felis&ut=eu&dolor=sapien&morbi=cursus&vel=v', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Niki Malcolm', '6RlYOSx', 'nmalcolm1a@fotki.com', 'Vipe', '336-769-3454', '7 Lukken Alley', 'Greensboro', 'United States', '27499', 36.106995, -79.852257, 273, 100, 'https://hexun.com/lacus/morbi.html?ante=platea&ipsum=dictumst&primis=etiam&in=faucibus&faucibus=cursus&orci=urna&luctus=ut&et=tellus&ultrices=nulla&posuere=ut&cubilia=erat&curae=id&duis=mauris&faucibus=vulputate&accumsan=elementum&odio=nullam&curabitur=va', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Alix Valentinuzzi', 'POaZ17vwvGR', 'avalentinuzzi1b@cornell.edu', 'Bubbletube', '751-484-5415', '6 Melvin Trail', 'Hekou', 'China', NULL, 22.529404, 103.939346, 178, 73, 'http://blogspot.com/congue/eget/semper/rutrum/nulla/nunc/purus.json?nisl=ut&duis=blandit&ac=non&nibh=interdum&fusce=in&lacus=ante&purus=vestibulum&aliquet=ante&at=ipsum&feugiat=primis&non=in&pretium=faucibus&quis=orci&lectus=luctus&suspendisse=et&potenti=', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Skipton Willgoss', 'B6iT6Wp', 'swillgoss1c@symantec.com', 'Photolist', '235-539-4240', '5463 Ryan Road', 'Haocun', 'China', NULL, 27.587250, 118.473618, 210, 165, 'http://arstechnica.com/vitae.aspx?ornare=cras&consequat=in&lectus=purus&in=eu', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Gaby Klagge', 'bRYOz6i6GyiV', 'gklagge1d@alibaba.com', 'Oyoba', '329-276-4536', '61293 Logan Drive', 'Strážnice', 'Czech Republic', '696 62', 48.901016, 17.316811, 389, 444, 'https://t-online.de/vehicula.png?vestibulum=tincidunt&velit=lacus&id=at&pretium=velit&iaculis=vivamus&diam=vel&erat=nulla&fermentum=eget&justo=eros&nec=elementum&condimentum=pellentesque&neque=quisque&sapien=porta&placerat=volutpat&ante=erat&nulla=quisque', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Rutherford Extill', 'GpQDfddDEnf', 'rextill1e@rediff.com', 'Twitternation', '715-338-3046', '08172 Iowa Point', 'Basel', 'Switzerland', '4085', 47.497833, 7.596169, 119, 178, 'https://imdb.com/sit/amet.xml?sociis=in&natoque=eleifend&penatibus=quam&et=a&magnis=odio&dis=in&parturient=hac&montes=habitasse&nascetur=platea&ridiculus=dictumst&mus=maecenas&vivamus=ut&vestibulum=massa&sagittis=quis&sapien=augue&cum=luctus&sociis=tincid', 3, '2022-04-14 16:21:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'User', '$2y$10$n6YIYQmk6UCkw/FDpanv3.A7.biYng54bYSc19GEOgT/0Ot9iZEIy', 'user@hotmail.com', 'User', 'User', 'UCL, Gower Street, London, UK', NULL, 'WC1E 6BT', NULL, 51.524559, -0.134040, 500, 23, 'user.com', 3, '2022-04-15 07:28:35', '2022-04-15 06:28:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, 15, 16, NULL);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_picture`
--
ALTER TABLE `project_picture`
  ADD PRIMARY KEY (`project_picture_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `project_picture`
--
ALTER TABLE `project_picture`
  MODIFY `project_picture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
-- Constraints for table `project_picture`
--
ALTER TABLE `project_picture`
  ADD CONSTRAINT `project_picture_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
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
