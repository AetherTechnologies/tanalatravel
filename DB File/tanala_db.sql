-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 10:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanala_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `inclusion_table`
--

CREATE TABLE `inclusion_table` (
  `inclusion_id` int(11) NOT NULL,
  `inclusion_name` varchar(255) NOT NULL,
  `inclusion_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inclusion_table`
--

INSERT INTO `inclusion_table` (`inclusion_id`, `inclusion_name`, `inclusion_status`) VALUES
(1, 'Flights', 1),
(3, 'Tour Guide', 1),
(5, 'Lunch', 1),
(6, 'Hotel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_table`
--

CREATE TABLE `location_table` (
  `location_id` int(11) NOT NULL,
  `location_longhitude` double NOT NULL,
  `location_latitude` double NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_price` float NOT NULL,
  `location_inclusion` text NOT NULL,
  `location_description` longtext NOT NULL,
  `location_date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `location_status` tinyint(1) NOT NULL DEFAULT 0,
  `location_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_table`
--

INSERT INTO `location_table` (`location_id`, `location_longhitude`, `location_latitude`, `location_name`, `location_price`, `location_inclusion`, `location_description`, `location_date_created`, `location_status`, `location_photo`) VALUES
(5, 120.98206758499146, 14.583521156142767, 'National Museum of Natural', 200, 'Hotel|', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Futura W01&quot;, &quot;Noto Sans TC&quot;, &quot;Microsoft JhengHei&quot;, &quot;Microsoft JhengHei UI&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 22px;\">Ask the average Filipino what a museum looks like, and they will tell you that they think of dimly-lit rooms that smell of must and are filled with odd artefacts from a distant time. This has been the image that has been impressed on the minds of generations of Filipino schoolchildren. Today, however, a newly opened institution is set to shatter that image and replace it with something strikingly revolutionary.</span><br></p>', '2021-01-27 01:51:24', 0, 'NMOfNatural.jpg|NMOfNatural-2.jpg|'),
(7, 120.98848342895508, 14.565142177914643, 'Manila Zoo', 150, 'Breakfast|', '<p style=\"text-align: center; margin-left: 100px;\"><font color=\"#7b8898\" face=\"Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, ????, ??, SimSun, STXihei, ????, serif\"><span style=\"font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</span></font><br></p>', '2021-01-27 06:14:43', 0, 'manilaZoo.jpg|'),
(9, 121.92889300665995, 11.95862755894368, 'Boracay', 500, 'Flight|Hotel|', '<p><span style=\"font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in</span><br></p>', '2021-01-27 07:00:38', 0, 'boracay.jpg|');

-- --------------------------------------------------------

--
-- Table structure for table `package_table`
--

CREATE TABLE `package_table` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_price` double NOT NULL,
  `package_inclusion` text NOT NULL,
  `package_tours` text NOT NULL,
  `package_description` longtext NOT NULL,
  `package_photo` text NOT NULL,
  `package_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `package_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_table`
--

INSERT INTO `package_table` (`package_id`, `package_name`, `package_price`, `package_inclusion`, `package_tours`, `package_description`, `package_photo`, `package_created_date`, `package_status`) VALUES
(8, 'Package 1', 1000, 'Flight|Hotel|Breakfast|', '9|7|5|', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc bibendum risus nec ligula sagittis bibendum. Etiam vel ullamcorper velit. Maecenas cursus enim in sapien cursus vehicula. Nulla porta mollis viverra. Mauris eu eleifend nibh. In id suscipit urna. Etiam ultricies enim non mattis consectetur.</span><br></p>', 'boracay.jpg|manilaZoo.jpg|NMOfNatural.jpg|NMOfNatural-2.jpg|', '2021-01-28 02:05:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_table`
--

CREATE TABLE `temp_table` (
  `temp_id` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_validated` int(2) NOT NULL DEFAULT 0,
  `user_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_priviledge` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_validated`, `user_created_date`, `user_priviledge`) VALUES
(28, 'Admin', 'admin@admin.com', '$2y$10$v4/orbvj80BMOl5t75cVfuI.Th3nEI6uQHDqIehZedtzqelwnk.wm', 1, '2021-01-21 13:15:50', 1),
(29, 'sampleeng samplelast', 'sample@sample.com', '$2y$10$iaTVw9r7EC6K9cRAAFoWSeA66hbVVhhrgN7vSkX0bcMbeBxuxRxi6', 0, '2021-01-21 13:21:59', 0),
(30, 'Sample Member', 'sample2@sample.com', '$2y$10$ol25P3InlAGiT.JiX5awt.Rkq.pma57av7XxZ5cC6j9yR4N4CKnz.', 0, '2021-01-28 04:08:43', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inclusion_table`
--
ALTER TABLE `inclusion_table`
  ADD PRIMARY KEY (`inclusion_id`);

--
-- Indexes for table `location_table`
--
ALTER TABLE `location_table`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `package_table`
--
ALTER TABLE `package_table`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `temp_table`
--
ALTER TABLE `temp_table`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inclusion_table`
--
ALTER TABLE `inclusion_table`
  MODIFY `inclusion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location_table`
--
ALTER TABLE `location_table`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package_table`
--
ALTER TABLE `package_table`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temp_table`
--
ALTER TABLE `temp_table`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
