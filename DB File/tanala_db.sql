-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 10:52 PM
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
-- Table structure for table `cms_table`
--

CREATE TABLE `cms_table` (
  `cms_id` int(11) NOT NULL,
  `cms_content` longtext NOT NULL,
  `cms_update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cms_for` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_table`
--

INSERT INTO `cms_table` (`cms_id`, `cms_content`, `cms_update_date`, `cms_for`) VALUES
(1, '<p><span style=\"font-size: 24px;\">This Is Terms and Condition</span></p><p><span style=\"font-size: 24px;\"><br></span><span style=\"color: rgb(33, 37, 41); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 18px;\"=\"\">Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app.</span></p><p style=\"margin-top: 25px; margin-bottom: 25px; width: 777px; color: rgb(33, 37, 41); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 18px;\"=\"\">Having a Terms and Conditions agreement is completely optional. No laws require you to have one. Not even the super-strict and wide-reaching General Data Protection Regulation (<a href=\"https://termsfeed.com/blog/gdpr/\" style=\"color: rgb(0, 81, 170); outline: none;\">GDPR</a>).</p><p style=\"margin-top: 25px; margin-bottom: 25px; width: 777px; color: rgb(33, 37, 41); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 18px;\"=\"\">It\'s up to you to set the rules and guidelines that the user must agree to. You can think of your Terms and Conditions agreement as the legal agreement where you&nbsp;<span style=\"font-weight: bolder;\">maintain your rights</span>&nbsp;to exclude users from your app in the event that they abuse your app, where you maintain your legal rights against potential app abusers, and so on.</p><p style=\"margin-top: 25px; margin-bottom: 25px; width: 777px; color: rgb(33, 37, 41); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 18px;\"=\"\">Terms and Conditions are also known as Terms of Service or Terms of Use.</p><p style=\"margin-top: 25px; margin-bottom: 25px; width: 777px; color: rgb(33, 37, 41); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 18px;\"=\"\">Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app.</p><p style=\"margin-top: 25px; margin-bottom: 25px; width: 777px; color: rgb(33, 37, 41); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 18px;\"=\"\">Having a Terms and Conditions agreement is completely optional. No laws require you to have one. Not even the super-strict and wide-reaching General Data Protection Regulation (<a href=\"https://termsfeed.com/blog/gdpr/\" style=\"color: rgb(0, 81, 170); outline: none;\">GDPR</a>).</p><p style=\"margin-top: 25px; margin-bottom: 25px; width: 777px; color: rgb(33, 37, 41); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 18px;\"=\"\">It\'s up to you to set the rules and guidelines that the user must agree to. You can think of your Terms and Conditions agreement as the legal agreement where you&nbsp;<span style=\"font-weight: bolder;\">maintain your rights</span>&nbsp;to exclude users from your app in the event that they abuse your app, where you maintain your legal rights against potential app abusers, and so on.</p><p style=\"margin-top: 25px; margin-bottom: 25px; width: 777px; color: rgb(33, 37, 41); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 18px;\"=\"\">Terms and Conditions are also known as Terms of Service or Terms of Use.</p><p style=\"margin-top: 25px; margin-bottom: 25px; width: 777px; color: rgb(33, 37, 41); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 18px;\"=\"\">Check out our&nbsp;<a href=\"https://www.termsfeed.com/blog/terms-conditions-faq/\" style=\"color: rgb(0, 81, 170); outline: none;\">Terms and Conditions FAQ</a>&nbsp;for more helpful insight into these important agreements.</p>', '2021-02-12 06:39:19', 'termsAndCondition'),
(2, 'This Is About Us', '2021-01-29 04:42:30', 'AboutUs');

-- --------------------------------------------------------

--
-- Table structure for table `config_table`
--

CREATE TABLE `config_table` (
  `config_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_table`
--

INSERT INTO `config_table` (`config_id`, `package_id`, `days`, `location_id`) VALUES
(4, 8, 2, 9),
(5, 8, 3, 7),
(6, 8, 4, 5),
(7, 13, 5, 10),
(8, 13, 5, 11);

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
(6, 'Hotel', 1),
(7, 'Dinners', 1);

-- --------------------------------------------------------

--
-- Table structure for table `iterinary_table`
--

CREATE TABLE `iterinary_table` (
  `it_id` int(11) NOT NULL,
  `config_id` int(11) NOT NULL,
  `iterinary_time` time NOT NULL,
  `iterinary_type` int(11) NOT NULL,
  `iterinary_day` varchar(255) NOT NULL,
  `iterinary_activity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iterinary_table`
--

INSERT INTO `iterinary_table` (`it_id`, `config_id`, `iterinary_time`, `iterinary_type`, `iterinary_day`, `iterinary_activity`) VALUES
(2, 6, '17:13:00', 2, '1', 'Activity 2'),
(3, 6, '05:24:00', 0, '2', 'Wake Up'),
(4, 6, '00:11:00', 1, '3', 'Sample Flight'),
(5, 6, '00:13:00', 2, '1', 'Sample New Activity'),
(6, 6, '00:14:00', 1, '3', 'Another Flight'),
(9, 4, '07:13:00', 1, '8', 'Flight to Boracay'),
(10, 5, '08:46:00', 2, '5', 'Test'),
(11, 7, '14:50:00', 1, '1', 'Flight 1'),
(12, 7, '14:30:00', 1, '1', 'Flight 2'),
(13, 7, '13:30:00', 2, '2', 'Activity 4');

-- --------------------------------------------------------

--
-- Table structure for table `iterinary_type`
--

CREATE TABLE `iterinary_type` (
  `type_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iterinary_type`
--

INSERT INTO `iterinary_type` (`type_id`, `type`, `status`) VALUES
(0, 'None', 1),
(1, 'FLIGHT', 1),
(2, 'ACTIVITY', 1);

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
(9, 121.92889300665995, 11.95862755894368, 'Boracay', 500, 'Flight|Hotel|', '<p><span style=\"font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in</span><br></p>', '2021-01-27 07:00:38', 0, 'boracay.jpg|'),
(10, 120.58242783051999, 16.40925542622414, 'Baguio', 500, 'Lunch|Hotel|Dinners|', '<p>This Is Baguio&nbsp;</p>', '2021-02-02 09:44:28', 0, 'baguio.jpg|'),
(11, 121.07571352264219, 13.73979577711401, 'Batangas', 500, 'Tour Guide|Hotel|Dinners|', '<p>This Is Batangas</p>', '2021-02-02 09:45:59', 0, 'batangas.jpg|');

-- --------------------------------------------------------

--
-- Table structure for table `message_table`
--

CREATE TABLE `message_table` (
  `message_id` int(11) NOT NULL,
  `message_title` text NOT NULL,
  `message_content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `seen_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_table`
--

INSERT INTO `message_table` (`message_id`, `message_title`, `message_content`, `user_id`, `category`, `status`, `date_created`, `seen_date`) VALUES
(2, 'asdasdasd', 'asdasdasdasdasd', 30, 2, 2, '2021-02-23 10:57:13', NULL);

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
(8, 'Package 1', 10002, 'Lunch|Hotel|', '5|7|9|', '<p><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc bibendum risus nec ligula sagittis bibendum. Etiam vel ullamcorper velit. Maecenas cursus enim in sapien cursus vehicula. Nulla porta mollis viverra. Mauris eu eleifend nibh. In id suscipit urna. Etiam ultricies enim non mattis consectetur. Updated</span><br></p>', '20210204072227-boracay.jpg|', '2021-01-28 02:05:55', 1),
(12, 'Road To boracay Updated', 5000, 'Flights|Tour Guide|Hotel|', '9|', '<p>This Is Second Sample Package Updated</p>', 'boracay.jpg|', '2021-02-02 08:41:58', 1),
(13, 'Package 2', 2000, 'Flights|Tour Guide|Lunch|Hotel|Dinners|', '10|11|', '<p>This Is New Package</p>', 'baguio.jpg|batangas.jpg|', '2021-02-02 09:47:12', 1),
(17, 'Package 1 Update', 2000, 'Flights|Lunch|Hotel|', '10|11|', '<ul><li>Bullet</li><li>Bullet</li><li>Bullet</li><li>This Is A RIchTextField</li></ul>', 'baguio.jpg|', '2021-02-19 00:20:38', 2);

-- --------------------------------------------------------

--
-- Table structure for table `request_package`
--

CREATE TABLE `request_package` (
  `request_id` int(11) NOT NULL,
  `package_name` text NOT NULL,
  `package_photo` text NOT NULL,
  `Tours` text NOT NULL,
  `Inclusion` text NOT NULL,
  `request_price` double NOT NULL DEFAULT 0,
  `package_description` longtext NOT NULL,
  `package_status` int(11) NOT NULL DEFAULT 5,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_package`
--

INSERT INTO `request_package` (`request_id`, `package_name`, `package_photo`, `Tours`, `Inclusion`, `request_price`, `package_description`, `package_status`, `request_date`, `created_by`) VALUES
(3, 'Road To boracay', 'boracay.jpg|', '9|', 'Flights|Lunch|Hotel|', 0, '<p>This Is A Sample Tour</p>', 5, '2021-01-30 11:50:51', 30),
(4, 'Road to Manila zoo', 'manilaZoo.jpg|', '7|', 'Tour Guide|', 0, '<p>This is Sample FOr manila zoo</p>', 5, '2021-01-30 12:28:15', 30),
(5, '', '', '', '', 0, '', 5, '2021-02-18 18:08:09', 30),
(6, '', '', '', '', 0, '', 5, '2021-02-18 18:09:05', 30),
(7, '', '', '', '', 0, '', 5, '2021-02-18 18:09:10', 30),
(8, '', '', '', '', 0, '', 5, '2021-02-18 18:09:10', 30),
(9, '', '', '', '', 0, '', 5, '2021-02-18 18:09:10', 30),
(10, '', '', '', '', 0, '', 5, '2021-02-18 18:09:12', 30),
(11, '', '', '', '', 0, '', 5, '2021-02-18 18:09:12', 30),
(12, '', '', '', '', 0, '', 5, '2021-02-18 18:09:12', 30),
(13, '', '', '', '', 0, '', 5, '2021-02-18 18:09:12', 30),
(14, '', '', '', '', 0, '', 5, '2021-02-18 18:09:13', 30),
(15, '', '', '', '', 0, '', 5, '2021-02-18 18:09:14', 30),
(16, '', '', '', '', 0, '', 5, '2021-02-18 18:09:33', 30),
(17, '', '', '', '', 0, '', 5, '2021-02-18 18:10:12', 30),
(18, '', '', '', '', 0, '', 5, '2021-02-18 18:12:33', 30);

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
-- Table structure for table `user_info_table`
--

CREATE TABLE `user_info_table` (
  `user_info_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_address` text NOT NULL,
  `user_contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info_table`
--

INSERT INTO `user_info_table` (`user_info_id`, `user_id`, `user_address`, `user_contact`) VALUES
(4, 30, '123', '123'),
(6, 31, '1665 Int 40 Zamora St. Paco Manila', '09123456789');

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
(30, 'Sample Member', 'sample2@sample.com', '$2y$10$ol25P3InlAGiT.JiX5awt.Rkq.pma57av7XxZ5cC6j9yR4N4CKnz.', 0, '2021-01-28 04:08:43', 0),
(31, 'Juan Dela Cruz', 'dela.cruz@gmail.com', '$2y$10$FE8swq..CPhW6x2SUbDOfe/MA2aKhxc5C7UtQX.q/yFfwKmD.dP3i', 0, '2021-02-23 01:02:20', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_table`
--
ALTER TABLE `cms_table`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `config_table`
--
ALTER TABLE `config_table`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `inclusion_table`
--
ALTER TABLE `inclusion_table`
  ADD PRIMARY KEY (`inclusion_id`);

--
-- Indexes for table `iterinary_table`
--
ALTER TABLE `iterinary_table`
  ADD PRIMARY KEY (`it_id`);

--
-- Indexes for table `iterinary_type`
--
ALTER TABLE `iterinary_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `location_table`
--
ALTER TABLE `location_table`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `message_table`
--
ALTER TABLE `message_table`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `package_table`
--
ALTER TABLE `package_table`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `request_package`
--
ALTER TABLE `request_package`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `temp_table`
--
ALTER TABLE `temp_table`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `user_info_table`
--
ALTER TABLE `user_info_table`
  ADD PRIMARY KEY (`user_info_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_table`
--
ALTER TABLE `cms_table`
  MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `config_table`
--
ALTER TABLE `config_table`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inclusion_table`
--
ALTER TABLE `inclusion_table`
  MODIFY `inclusion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `iterinary_table`
--
ALTER TABLE `iterinary_table`
  MODIFY `it_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `iterinary_type`
--
ALTER TABLE `iterinary_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location_table`
--
ALTER TABLE `location_table`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `message_table`
--
ALTER TABLE `message_table`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_table`
--
ALTER TABLE `package_table`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request_package`
--
ALTER TABLE `request_package`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `temp_table`
--
ALTER TABLE `temp_table`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_info_table`
--
ALTER TABLE `user_info_table`
  MODIFY `user_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
