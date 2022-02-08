-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Generation Time: Sep 24, 2020 at 09:45 PM
-- Server version: 10.2.33-MariaDB-log
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_database`
--
CREATE DATABASE IF NOT EXISTS `website_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ancsscapp-36331c35`;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id_announcement` int(11) NOT NULL,
  `id_user_f` int(11) NOT NULL,
  `announcement` text NOT NULL,
  `time_an` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id_announcement`, `id_user_f`, `announcement`, `time_an`) VALUES
(4, 2, 'New Announcement!', '2020-03-28 14:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_sector_f` int(11) NOT NULL,
  `id_user_f` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id_project` int(11) NOT NULL,
  `id_sector_f` int(11) NOT NULL,
  `id_user_f` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_summary` text NOT NULL,
  `project_description` text NOT NULL,
  `project_keywords` text NOT NULL,
  `project_pictures` int(11) DEFAULT NULL,
  `project_ngo_name` varchar(255) NOT NULL,
  `project_location` varchar(255) NOT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `project_contact_person` varchar(255) DEFAULT 'Not provided',
  `project_email` varchar(255) NOT NULL,
  `project_phone` varchar(255) NOT NULL,
  `project_website` varchar(255) DEFAULT 'Not provided',
  `project_sdg` varchar(255) NOT NULL,
  `project_start` date NOT NULL,
  `project_end` date NOT NULL,
  `project_status` tinyint(1) NOT NULL DEFAULT 0,
  `project_budget` varchar(255) NOT NULL,
  `project_beneficiaries` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id_project`, `id_sector_f`, `id_user_f`, `project_name`, `project_summary`, `project_description`, `project_keywords`, `project_pictures`, `project_ngo_name`, `project_location`, `lat`, `lng`, `project_contact_person`, `project_email`, `project_phone`, `project_website`, `project_sdg`, `project_start`, `project_end`, `project_status`, `project_budget`, `project_beneficiaries`, `date_added`) VALUES
(3, 22, 1, 'Wells in Bangladesh', 'Built 4 wells to help vulnerable minorities near Dhaka Bangladesh.', 'Built 4 wells in rural area of Bangladesh. We faced the following challenges. We built the following well type. The main takeaways were the following...', 'Wells, Rural, Success', NULL, 'NGO ABCD', 'Dhaka, Bangladesh', 23.8103, 90.4125, 'John Jones', 'johnjones@gmail.com', '+4465247890', 'ngo_website.com', '6', '2009-05-01', '2011-06-07', 1, 'Low', 'Rural Bengalis', '2020-09-01'),
(4, 31, 1, 'Microfinance Swaziland', 'Providing microfinance for rural people in Swaziland', 'NGO set up microfinance opportunities for rural people in Swaziland. The main achievements were... the main takeaways were...', 'Microfinance, Africa, loans', NULL, 'NGO ABCD', 'Swaziland, Africa', 26.5225, 31.4659, 'Jon Jones', 'johnjones@gmail.com', '+4465247890', 'ngo_website.com', '10', '2016-12-03', '2020-12-16', 0, 'Medium', 'Rural poor in Swaziland', '2020-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` int(11) NOT NULL,
  `resource_topic` varchar(200) NOT NULL DEFAULT 'Other',
  `resource_message` text NOT NULL,
  `resource_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `resource_topic`, `resource_message`, `resource_time`) VALUES
(1, 'Other', 'This is a test resource message.', '2020-09-18'),
(2, 'Finances', 'A sample text.', '2020-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `sdg`
--

CREATE TABLE `sdg` (
  `id_sdg` int(11) NOT NULL,
  `sdg_name` varchar(255) NOT NULL,
  `sdg_pic` varchar(255) NOT NULL,
  `sdg_num` int(11) NOT NULL,
  `sdg_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdg`
--

INSERT INTO `sdg` (`id_sdg`, `sdg_name`, `sdg_pic`, `sdg_num`, `sdg_description`) VALUES
(1, 'No Poverty', 'sdg1.png', 1, 'End poverty in all its forms everywhere. Economic growth must be inclusive to provide sustainable jobs and promote equality.'),
(2, 'Zero Hunger', 'sdg2.png', 2, 'The food and agriculture sector offers key solutions for development, and is central for hunger and poverty eradication.'),
(3, 'Good Health and Well-Being', 'sdg3.png', 3, 'Ensuring healthy lives and promoting the well-being for all at all ages is essential to sustainable development.'),
(4, 'Quality Education', 'sdg4.png', 4, 'Obtaining a quality education is the foundation to improving people\'s lives and sustainable development.'),
(5, 'Gender Equality', 'sdg5.jpg', 5, 'Achieve gender equality and empower all women and girls. Gender equality is not only a fundamental human right, but a necessary foundation for a peaceful, prosperous and sustainable world.'),
(6, 'Clean Water and Sanitation', 'sdg6.png', 6, 'Ensure access to water and sanitation for all. Clean, accessible water for all is an essential part of the world we want to live in.'),
(7, 'Affordable and Clean Energy', 'sdg7.jpg', 7, 'Ensure access to affordable, reliable, sustainable and modern energy. Energy is central to nearly every major challenge and opportunity.'),
(8, 'Decent Work and Economic Growth', 'sdg8.png', 8, 'Promote inclusive and sustainable economic growth, employment and decent work for all. Sustainable economic growth will require societies to create the conditions that allow people to have quality jobs.'),
(9, 'Industry, Innovation and Infrastructure', 'sdg9.png', 9, 'Build resilient infrastructure, promote sustainable industrialization and foster innovation. Investments in infrastructure are crucial to achieving sustainable development.'),
(10, 'Reduced Inequalities', 'sdg10.png', 10, 'Reduce inequality within and among countries. To reduce inequalities, policies should be universal in principle, paying attention to the needs of disadvantaged and marginalized populations.'),
(11, 'Sustainable Cities and Commerce', 'sdg11.jpg', 11, 'Make cities inclusive, safe, resilient and sustainable. There needs to be a future in which cities provide opportunities for all, with access to basic services, energy, housing, transportation and more.'),
(12, 'Responsible Consumption and Production', 'sdg12.png', 12, 'Ensure sustainable and responsible consumption and production patterns.'),
(13, 'Climate Action', 'sdg13.png', 13, 'Take urgent action to combat climate change and its impacts. Climate change is a global challenge that affects everyone, everywhere.'),
(14, 'Life Below Water', 'sdg14.png', 14, 'Conserve and sustainably use the oceans, seas and marine resources. Careful management of this essential global resource is a key feature of a sustainable future.'),
(15, 'Life on Land', 'sdg15.png', 15, 'Sustainably manage forests, combat desertification, halt and reverse land degradation, halt biodiversity loss.'),
(16, 'Peace, Justice and Strong Institutions', 'sdg16.png', 16, 'Promote just, peaceful and inclusive societies. Access to justice for all, and building effective, accountable institutions at all levels.'),
(17, 'Partnership for the Goals', 'sdg17.jpg', 17, 'Revitalize the global partnership for sustainable development.');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id_sectors` int(11) NOT NULL,
  `sector_name` varchar(255) NOT NULL,
  `id_sdg_f` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id_sectors`, `sector_name`, `id_sdg_f`) VALUES
(1, 'Improving cattle health', 2),
(2, 'Indexation of pensions', 1),
(3, 'Improving loan system', 1),
(4, 'Better cattle food', 2),
(5, 'Cattle improvement', 1),
(11, 'Better education', 4),
(22, 'Building Wells', 6),
(23, 'Cleaning Groundwater', 6),
(24, 'Off-grid solar panels', 7),
(25, 'Wave power for lakes', 7),
(26, 'Rural Work from home', 8),
(27, 'Accounting Masterclasses', 8),
(28, 'Paving roads', 9),
(29, 'Clearing waterways', 9),
(30, 'Fairer taxes', 10),
(31, 'Encourage Microfinance', 10),
(32, 'Public Transport', 11),
(33, 'Educating young people', 11),
(34, 'Reducing waste', 12),
(35, 'Recycling', 12),
(36, 'Lobbying government', 13),
(37, 'Reducing emissions', 13),
(38, 'Reduce overfishing', 14),
(39, 'Reduce plastic pollution', 14),
(40, 'Stop deforestation', 15),
(41, 'Counting species', 15),
(42, 'Stronger courts', 16),
(43, 'Anti-war', 16),
(44, 'South South collaboration', 17),
(45, 'Triangular cooperation', 17),
(46, 'Access to microloans', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `ngo_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT 'Not provided',
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number_of_employees` int(10) DEFAULT NULL,
  `number_of_volunteers` int(10) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT 'Not provided',
  `countries_of_operation` text DEFAULT NULL,
  `date_registered` date NOT NULL,
  `ngo_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `ngo_name`, `address`, `city`, `country`, `postcode`, `lat`, `lng`, `contact_person`, `phone`, `email`, `number_of_employees`, `number_of_volunteers`, `username`, `password`, `website`, `countries_of_operation`, `date_registered`, `ngo_status`) VALUES
(1, 'Sample NGO', '61 Onslow Square', 'London', 'United Kingdom', 'SW17 3LS', 51.5074, 0.1278, 'Jane Janes', '+4465247890', 'johnjones@gmail.com', 50, 99, 'Sample NGO', 'c4ca4238a0b923820dcc509a6f75849b', 'website.com', 'Mongolia, Nicaragua, Zimbabwe', '2020-09-01', 1),
(2, '', '', '', '', '', NULL, NULL, '', '', '', 0, 0, 'Admin', '9e4b7fe3386d08fdc744e23da92849ac', '', '', '2020-09-01', 1),
(26, 'Global One 2015', '4 Gateway Mews, Bounds Green, ', 'London', 'United Kingdom ', 'N11 2UT', 51.5074, 0.1278, 'InÃ¨s Belliard', '020 8368 8231', 'ines@globalone2015.org', 25, 8, 'ines@ancssc.org', '2aa718dcb069a306e127da2b40948c5a', 'https://globalone.org.uk/', 'United Kingdom, Nigeria, Kenya, Bangladesh', '2020-09-20', 0),
(27, 'Reaching Hand', '55 Green Ln', 'Istanbul', 'Turkey', 'KL8456', 39.1365, 34.0484, 'Jane Doe', '3546559002974', 'jdoe@reachinghand.com', 8, 30, 'reachinghand', 'b4c2655890617c820fc598e5a3d71661', 'reachinghand.com', 'Turkey', '2020-09-20', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id_announcement`),
  ADD KEY `id_user_f_cosntr` (`id_user_f`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_sector_f` (`id_sector_f`),
  ADD KEY `id_user_f` (`id_user_f`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_sector_f_constr` (`id_sector_f`),
  ADD KEY `id_user_f_constr` (`id_user_f`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `sdg`
--
ALTER TABLE `sdg`
  ADD PRIMARY KEY (`id_sdg`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id_sectors`),
  ADD KEY `id_sdg_f` (`id_sdg_f`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id_announcement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sdg`
--
ALTER TABLE `sdg`
  MODIFY `id_sdg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id_sectors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `id_user_f_cosntr` FOREIGN KEY (`id_user_f`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `id_sector_f` FOREIGN KEY (`id_sector_f`) REFERENCES `sectors` (`id_sectors`),
  ADD CONSTRAINT `id_user_f` FOREIGN KEY (`id_user_f`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `id_sector_f_constr` FOREIGN KEY (`id_sector_f`) REFERENCES `sectors` (`id_sectors`),
  ADD CONSTRAINT `id_user_f_constr` FOREIGN KEY (`id_user_f`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `id_sdg_constr` FOREIGN KEY (`id_sdg_f`) REFERENCES `sdg` (`id_sdg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
