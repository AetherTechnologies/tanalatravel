-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2019 at 08:59 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rainbowlush`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `AccountID` int(11) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Birthdate` varchar(255) NOT NULL,
  `Contact_No` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email_Add` varchar(255) NOT NULL,
  `Account_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccountID`, `First_name`, `Last_name`, `Username`, `Password`, `Gender`, `Birthdate`, `Contact_No`, `Address`, `Email_Add`, `Account_type`) VALUES
(5, 'admin', 'admin', 'admin', '1234', 'Male', '1900-1-01', '3453453', 'sdfsd', 'sdf@gmail.com', 'Admin'),
(7, 'King', 'De Leon', 'Kingkring', 'kingkring', 'Male', '1997-25-12', '09173417861', '1691 Main st. paco manila', 'kingchristian2597@gmail.com', 'User'),
(9, 'John Albert', 'Entereso', 'user', 'user', 'Male', '1900-1-01', '09563862437', 'sample address 123 city manila', 'johnalbertentereso@yahoo.com', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `archive_cart`
--

CREATE TABLE `archive_cart` (
  `cart_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_cart`
--

INSERT INTO `archive_cart` (`cart_id`, `username`, `name`, `product_id`, `product_code`, `product_price`, `product_description`, `product_size`, `product_quantity`, `total`, `img`, `date`) VALUES
('1', 'pao', 'heyy', '16', '5345', '55', 'sffdgdfg', 'Medium', '1', '55', 'products/r3.jpg', '2019-04-06 15:13:32'),
('1', 'pao', 'heyy', '16', '5345', '55', 'sffdgdfg', 'Medium', '1', '55', 'products/r3.jpg', '2019-04-06 15:21:58'),
('2', 'pao', 'Summer ', '15', '3444', '500', 'sdfsdfsdf', 'Small', '1', '500', 'products/r2.jpg', '2019-04-06 15:28:47'),
('3', 'pao', 'Summer ', '15', '3444', '500', 'sdfsdfsdf', '', '1', '500', 'products/r2.jpg', '2019-04-06 15:29:28'),
('4', 'pao', 'Summer ', '15', '3444', '500', 'sdfsdfsdf', '', '1', '500', 'products/r2.jpg', '2019-04-06 15:30:18'),
('1', 'Kingkring', 'KING', '1', '2342', '12', 'sdfsdsdfsdfsd', 'Medium', '1', '12', 'products/slide4.jpg', '2019-04-06 16:31:24'),
('2', 'Kingkring', 'RN Rash-G', '1', '2342', '788', 'Nothing less with a Rash Guard.', 'Medium', '1', '788', 'products/slide4.jpg', '2019-04-06 17:09:51'),
('3', 'Kingkring', 'RN Rash-G', '1', '2342', '788', 'Nothing less with a Rash Guard.', 'Medium', '1', '788', 'products/slide4.jpg', '2019-04-06 17:23:00'),
('1', 'pao', 'RN Rash-G', '1', '2342', '788', 'Nothing less with a Rash Guard.', 'Medium', '1', '788', 'products/slide4.jpg', '2019-04-06 17:39:48'),
('2', 'pao', 'Bikini', '2', '2343', '1850', 'Bikini With a new elegant Stripes of the beautiful live.', 'Small', '1', '1850', 'products/slide1.jpg', '2019-04-06 17:49:27'),
('1', 'pao', 'Piece with a Piece', '3', '2344', '1200', 'Try a Piece of a Two piece to know the elegance of the Summer.', 'Medium', '1', '1200', 'products/slide2.jpg', '2019-04-06 18:11:11'),
('7', 'user', 'Na-Big Reaction Rash', '4', '2345', '1550', 'Big Reaction to the Good Summer life.', 'Medium', '1', '1550', 'products/r1.jpg', '2019-04-06 23:15:32'),
('8', 'user', 'ZA- High Waisted Bikini Maroon ', '8', '2347', '1280', 'ZA- High Waisted Bikini Maroon Summer Active life.', 'Medium', '1', '1280', 'products/1.jpg', '2019-04-07 00:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `product_CODE` varchar(255) NOT NULL,
  `bikini_TOP` varchar(255) NOT NULL,
  `bikini_BOTTOM` varchar(255) NOT NULL,
  `two_PIECE` varchar(255) NOT NULL,
  `one_PIECE` varchar(255) NOT NULL,
  `rash_GUARD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

CREATE TABLE `pending_order` (
  `id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city-province` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `mop` varchar(255) NOT NULL,
  `remarks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_order`
--

INSERT INTO `pending_order` (`id`, `product_code`, `product_name`, `fname`, `lname`, `username`, `date`, `street`, `city-province`, `zipcode`, `subtotal`, `total`, `mop`, `remarks`) VALUES
(1, '2344', 'Piece with a Piece', 'Pao', 'Escanilla', 'pao', '2019-04-06', 'Dayap St', 'MolinoIII, Bacoor Cty, Cavite', '4102', '1200', '1400', 'BPI', 1),
(2, '2347', 'ZA- High Waisted Bikini Maroon ', 'John Albert', 'Entereso', 'user', '2019-04-07', '123 street', 'Bacoor', '4102', '2830', '3030', 'BPI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_for` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `image` longblob NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `image_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_code`, `product_name`, `product_type`, `product_for`, `product_size`, `product_price`, `product_description`, `product_status`, `image`, `image_path`, `image_type`) VALUES
(1, '2342', 'RN Rash-G', 'RashGuard', 'Men', 'Medium', '788', 'Nothing less with a Rash Guard.', 'Out of Stock', 0x517a706358486868625842774d6c78636447317758467877614841794f5551354c6e527463413d3d, 'products/slide4.jpg', 'image/jpeg'),
(2, '2343', 'Bikini', 'Bikini', 'Women', 'Small', '1850', 'Bikini With a new elegant Stripes of the beautiful live.', 'Out of Stock', 0x517a706358486868625842774d6c78636447317758467877614841354e6a68424c6e527463413d3d, 'products/slide1.jpg', 'image/jpeg'),
(3, '2344', 'Piece with a Piece', 'TwoPiece', 'Women', 'Medium', '1200', 'Try a Piece of a Two piece to know the elegance of the Summer.', 'Out of Stock', 0x517a706358486868625842774d6c7863644731775846787761484134516a63784c6e527463413d3d, 'products/slide2.jpg', 'image/jpeg'),
(4, '2345', 'Na-Big Reaction Rash', 'RashGuard', 'Men', 'Medium', '1550', 'Big Reaction to the Good Summer life.', 'Active', 0x517a706358486868625842774d6c78636447317758467877614841794e7a45794c6e527463413d3d, 'products/r1.jpg', 'image/jpeg'),
(5, '2346', 'Adidas Activeness', 'RashGuard', 'Both', 'Medium', '2300', 'Adidas Activeness in a Good Summer.', 'Active', 0x517a706358486868625842774d6c78636447317758467877614841304f446b334c6e527463413d3d, 'products/slide3.jpeg', 'image/jpeg'),
(8, '2347', 'ZA- High Waisted Bikini Maroon ', 'Bikini', 'Women', 'Medium', '1280', 'ZA- High Waisted Bikini Maroon Summer Active life.', 'Active', 0x517a706358486868625842774d6c78636447317758467877614842434d7a41324c6e527463413d3d, 'products/1.jpg', 'image/jpeg'),
(9, '110UQ', 'Gray Tank Top', 'TankTops', 'Both', 'Medium', '500', 'Gray tank top (cotton)', 'Active', 0x517a7063584868686258427758467830625842635848426f63444d304d544d7564473177, 'products/t-top1.jpg', 'image/jpeg'),
(10, '12094', 'Red Beach Shorts', 'Shorts', 'Men', 'Large', '800', 'Red Beach Shorts', 'Active', 0x517a7063584868686258427758467830625842635848426f634451334f44677564473177, 'products/shorts1.jpg', 'image/jpeg'),
(11, '114OP1', 'One piece Black', 'OnePiece', 'Women', 'Medium', '1000', 'One piece Black with zipper', 'Active', 0x517a7063584868686258427758467830625842635848426f634456424d45557564473177, 'products/onepiece1.jpeg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `img_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `pending_order`
--
ALTER TABLE `pending_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pending_order`
--
ALTER TABLE `pending_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
