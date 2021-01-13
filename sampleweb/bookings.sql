-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 02:42 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `booking_image` varchar(255) DEFAULT NULL,
  `booking_name` varchar(255) NOT NULL,
  `booking_price` varchar(255) NOT NULL,
  `booking_description` varchar(255) NOT NULL,
  `booking_type` varchar(225) NOT NULL,
  `booking_rating` varchar(255) NOT NULL,
  `booking_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `image_path`, `booking_image`, `booking_name`, `booking_price`, `booking_description`, `booking_type`, `booking_rating`, `booking_location`) VALUES
(37, 'uploads/', '21866833.jpg', 'DIAMOND HOTEL', '8000', 'The Diamond hotel in Manila', 'Hotel', '4.5', 'Manila'),
(39, 'uploads/', 'leez-inn.jpg', 'LEEZ INN HOTEL', '4000', 'Leez Inn Hotel in Manila', 'Hotel', '4.3', 'Manila'),
(44, 'uploads/', 'Philippine-Airlines-Logo.jpg', 'PHIL AIRLINES', '4000', 'phil airlines', 'Flight', '4', 'Philippines');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
