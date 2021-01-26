-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 09:30 AM
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
-- Database: `tanala_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `location_table`
--

CREATE TABLE `location_table` (
  `location_id` int(11) NOT NULL,
  `location_longhitude` float NOT NULL,
  `location_latitude` float NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_price` float NOT NULL,
  `location_inclusion` text NOT NULL,
  `location_description` longtext NOT NULL,
  `location_date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `location_status` tinyint(1) NOT NULL DEFAULT 0,
  `location_photo` text NOT NULL
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
(29, 'sampleeng samplelast', 'sample@sample.com', '$2y$10$iaTVw9r7EC6K9cRAAFoWSeA66hbVVhhrgN7vSkX0bcMbeBxuxRxi6', 0, '2021-01-21 13:21:59', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location_table`
--
ALTER TABLE `location_table`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location_table`
--
ALTER TABLE `location_table`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
