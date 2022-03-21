DROP DATABASE Jur22_database;

CREATE DATABASE Jur22_database
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

GRANT ALL PRIVILEGES
    ON Jur22_database.*
    TO 'user'@'localhost'
    IDENTIFIED BY 'password';

USE Jur22_database;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Jur22_database`
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
                          `event_id` int(11) NOT NULL,
                          `id` int(11) NOT NULL,
                          `event_title` varchar(255) NOT NULL,
                          `event_description` text,
                          `event_language` varchar(100) DEFAULT NULL,
                          `event_datetime` datetime NOT NULL
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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
                            `project_id` int(11) NOT NULL,
                            `id` int(11) NOT NULL,
                            `project_name` varchar(255) NOT NULL,
                            `project_language` varchar(100) DEFAULT NULL,
                            `project_description` text,
                            `project_organisation_name` varchar(255) DEFAULT NULL,
                            `project_date_added` int(11) NOT NULL,
                            `project_last_updated` date NOT NULL,
                            `project_sdg` varchar(255) DEFAULT NULL
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(15) DEFAULT NULL,
                         `username` varchar(255) DEFAULT NULL,
                         `name` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `phone` varchar(255) DEFAULT NULL,
                         `address` text DEFAULT NULL,
                         `city` varchar(100) DEFAULT NULL,
                         `country` varchar(100) DEFAULT NULL,
                         `postcode` varchar(100) DEFAULT NULL,
                         `number_of_employees` int(10) DEFAULT NULL,
                         `number_of_volunteers` int(10) DEFAULT NULL,
                         `website` varchar(255) DEFAULT NULL,
                         `created_at` timestamp NOT NULL,
                         `updated_at` timestamp NOT NULL,
                         `subscription_type` tinyint(5) DEFAULT NULL,
                         `user_status` tinyint(5) DEFAULT NULL,
                         `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
    ADD PRIMARY KEY (`project_id`),
    ADD KEY `id` (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
    MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

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
ALTER TABLE `projects`
    ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
