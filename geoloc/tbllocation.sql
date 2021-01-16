-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 01:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

CREATE TABLE `tbllocation` (
  `loc_id` int(11) NOT NULL,
  `loc_type` int(2) NOT NULL,
  `loc_name` varchar(255) NOT NULL,
  `loc_long` float NOT NULL,
  `loc_lat` float NOT NULL,
  `loc_price` double NOT NULL,
  `loc_status` int(2) NOT NULL,
  `loc_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllocation`
--

INSERT INTO `tbllocation` (`loc_id`, `loc_type`, `loc_name`, `loc_long`, `loc_lat`, `loc_price`, `loc_status`, `loc_image`) VALUES
(1, 1, 'sasa', 1212, 1212, 12222, 2, 'sddssdsd'),
(2, 2, 'asdasdasd', 12.424, 12.1231, 12222, 1, '134430820_1115277438909852_301413908516348760_n.jpg'),
(3, 4, 'Taniel lungga', 14.5882, 121.006, 22222, 3, '128185597_165570961924307_6962211975113677774_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbllocation`
--
ALTER TABLE `tbllocation`
  ADD PRIMARY KEY (`loc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbllocation`
--
ALTER TABLE `tbllocation`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
