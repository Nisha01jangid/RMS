-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 04:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Bedsitter'),
(2, 'One bedroom'),
(3, 'Two bedroom'),
(4, 'self-contained');

-- --------------------------------------------------------

--
-- Table structure for table `entry_form_details`
--

CREATE TABLE `entry_form_details` (
  `id` int(20) NOT NULL,
  `month` varchar(50) NOT NULL,
  `property_id` int(20) NOT NULL,
  `property_name` varchar(20) NOT NULL,
  `flat_no` int(20) NOT NULL,
  `no_of_members` int(20) NOT NULL,
  `electricity_rate` int(50) NOT NULL,
  `water_rate` int(50) NOT NULL,
  `rent` int(50) NOT NULL,
  `current_meter_reading` int(50) NOT NULL,
  `waste` int(50) NOT NULL,
  `miscellaneous` int(50) NOT NULL,
  `duedate` date NOT NULL,
  `status` int(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry_form_details`
--

INSERT INTO `entry_form_details` (`id`, `month`, `property_id`, `property_name`, `flat_no`, `no_of_members`, `electricity_rate`, `water_rate`, `rent`, `current_meter_reading`, `waste`, `miscellaneous`, `duedate`, `status`, `timestamp`) VALUES
(1, '2023-03', 1, 'P1', 2, 4, 100, 150, 5000, 10, 2000, 100, '2023-03-31', 1, '2023-03-17 09:05:39'),
(2, '2023-04', 1, 'P1', 2, 4, 200, 250, 5000, 20, 100, 500, '2023-04-29', 1, '2023-03-17 09:05:39'),
(3, '2023-02', 1, 'P1', 2, 4, 100, 150, 5000, 5, 2000, 100, '2023-03-31', 0, '2023-03-17 09:05:39'),
(4, '2023-05', 1, 'P1', 2, 4, 100, 50, 5000, 30, 1000, 100, '2023-03-24', 1, '2023-03-17 09:05:39'),
(5, '2023-04', 1, 'P1', 3, 2, 5, 10, 999, 100, 100, 888, '7777-07-07', 1, '2023-03-17 09:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `extra_charges`
--

CREATE TABLE `extra_charges` (
  `sno` int(50) NOT NULL,
  `property_id` int(100) NOT NULL,
  `month` varchar(10) NOT NULL,
  `water_bill` double DEFAULT NULL,
  `electricity_charges` double DEFAULT NULL,
  `waste_misc_bill` double NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extra_charges`
--

INSERT INTO `extra_charges` (`sno`, `property_id`, `month`, `water_bill`, `electricity_charges`, `waste_misc_bill`, `time_stamp`) VALUES
(1, 1, '2023-01', 1500, 15000, 0, '2023-03-04 08:44:18'),
(2, 1, '2023-01', 1500, 10000, 0, '2023-03-04 08:44:18'),
(3, 1, '2022-12', 1000, 15000, 0, '2023-03-04 08:06:23'),
(4, 1, '2022-12', 2000, 10000, 0, '2023-03-04 08:06:23'),
(5, 1, '2022-11', 1000, 15000, 0, '2023-03-04 08:06:23'),
(6, 1, '2022-11', 2000, 10000, 0, '2023-03-04 08:06:23'),
(7, 1, '2022-10', 1000, 15000, 0, '2023-03-04 08:06:23'),
(8, 1, '2022-10', 2000, 10000, 0, '2023-03-04 08:06:23'),
(9, 1, '2022-09', 2000, 10000, 0, '2023-03-04 08:06:23'),
(10, 1, '2022-09', 1520.59, NULL, 0, '2023-03-04 08:06:23'),
(14, 1, '2022-08', 3000, NULL, 0, '2023-03-04 08:06:23'),
(17, 1, '2023-02', 250, NULL, 0, '2023-03-04 09:17:20'),
(18, 1, '2023-03', NULL, 15000, 0, '2023-03-08 16:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `flats_electricity_reading`
--

CREATE TABLE `flats_electricity_reading` (
  `sno` int(11) NOT NULL,
  `property_id` int(10) NOT NULL,
  `flat_no` int(10) NOT NULL,
  `month` varchar(100) DEFAULT NULL,
  `reading` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flats_electricity_reading`
--

INSERT INTO `flats_electricity_reading` (`sno`, `property_id`, `flat_no`, `month`, `reading`, `timestamp`) VALUES
(1, 1, 1, '2023-03', 452007, '2023-03-08 12:51:30'),
(2, 1, 2, '2023-03', 100, '2023-03-08 12:53:35'),
(3, 1, 1, '2023-02', 451900, '2023-03-08 17:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(30) NOT NULL,
  `house_no` varchar(50) NOT NULL,
  `flat_no` varchar(100) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `house_no`, `flat_no`, `price`) VALUES
(1, 'P1', 'A2', 20000),
(2, 'P1', 'A3', 3000),
(3, 'P2', 'B1', 4500),
(4, 'P2', 'B2', 7000),
(5, 'P2', 'B3', 3000),
(6, 'P2', 'B4', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `house_address`
--

CREATE TABLE `house_address` (
  `sno` int(11) NOT NULL,
  `house_no` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house_address`
--

INSERT INTO `house_address` (`sno`, `house_no`, `address`, `active`) VALUES
(1, 'P1', 'Dwarkapuri, Indore', 1),
(2, 'P2', 'Vijay Nagar, Indore', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `sno` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `property_id` int(10) NOT NULL,
  `flat_no` int(10) NOT NULL,
  `month` varchar(100) NOT NULL,
  `tenant_name` varchar(500) NOT NULL,
  `no_of_members` int(100) NOT NULL,
  `rent` double NOT NULL,
  `electricity_rate` double NOT NULL,
  `electricity_units` tinyint(1) NOT NULL,
  `water_rate` double NOT NULL,
  `amount_paid` double NOT NULL,
  `payment_date` varchar(15) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_status`
--

CREATE TABLE `invoice_status` (
  `sno` int(11) NOT NULL,
  `property_id` int(10) NOT NULL,
  `month` varchar(15) NOT NULL,
  `date` varchar(25) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `flat_no` int(20) NOT NULL,
  `amount` double NOT NULL,
  `reference_id` varchar(200) NOT NULL,
  `pay_mode` varchar(100) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  `status` int(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `month` varchar(100) NOT NULL,
  `payment_receiver` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `property_id`, `flat_no`, `amount`, `reference_id`, `pay_mode`, `payment_date`, `status`, `description`, `month`, `payment_receiver`) VALUES
(1, 1, 2, 1000, 'hdiqehf1283019', 'gpay', '2023-03-17', 1, 'kjlefhpiehf', '3', ''),
(2, 1, 2, 1050, '', 'offline', '2023-03-18', 1, 'me;ktm', '03', ''),
(3, 1, 2, 2000, '', 'offline', '2023-03-17', 1, 'dsfdhd', '03', '2');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `sno` int(30) NOT NULL,
  `tenant_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`sno`, `tenant_id`, `amount`, `invoice`, `date_created`) VALUES
(2, 1, 60000, '22C11', '2023-10-19 11:21:07'),
(3, 2, 7000, '22C12', '2023-10-19 11:21:34'),
(4, 3, 25000, '22C14', '2022-10-19 11:22:06'),
(5, 1, 4500, 'GH45', '2022-10-23 14:13:00'),
(9, 6, 500, '22C11', '2023-10-19 11:21:07'),
(10, 1, 7000, '22C12', '2023-10-19 11:21:34'),
(11, 4, 9000, '22C14', '2022-10-19 11:22:06'),
(17, 4, 5000, 'test50', '2023-03-08 15:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `property_name` varchar(200) NOT NULL,
  `property_address` varchar(1000) NOT NULL,
  `flats` int(100) NOT NULL,
  `active` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `property_address`, `flats`, `active`) VALUES
(1, 'P1', 'Vijay Nagar, Indore', 8, 1),
(2, 'P2', 'Dwarkapuri, Indore', 10, 1),
(3, 'P3', 'Sudama Nagar, Indore', 5, 1),
(4, 'ejprjhypie', 'nioerjt', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(30) NOT NULL,
  `tenant_name` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aadhaar_no` int(20) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `members` int(10) NOT NULL,
  `rent` int(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `property_id` int(30) NOT NULL,
  `flat_no` int(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `district` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `polic_station` varchar(200) NOT NULL,
  `two_wheeler` int(50) NOT NULL,
  `four_wheeler` int(50) NOT NULL,
  `tenant_occupation` varchar(500) NOT NULL,
  `tenant_occupation_address` varchar(2000) NOT NULL,
  `granter1_name` varchar(250) NOT NULL,
  `granter1_contact` varchar(50) NOT NULL,
  `granter1_address` varchar(2000) NOT NULL,
  `granter1_district` varchar(100) NOT NULL,
  `granter1_state` varchar(100) NOT NULL,
  `granter1_police_station` varchar(100) NOT NULL,
  `granter1_email` varchar(100) NOT NULL,
  `granter2_name` varchar(100) NOT NULL,
  `granter2_contact` varchar(100) NOT NULL,
  `granter2_address` varchar(1000) NOT NULL,
  `granter2_district` varchar(100) NOT NULL,
  `granter2_state` varchar(100) NOT NULL,
  `granter2_police_station` varchar(100) NOT NULL,
  `granter2_email` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active, 0= inactive',
  `joining_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `tenant_name`, `father_name`, `gender`, `email`, `aadhaar_no`, `contact`, `members`, `rent`, `dob`, `property_id`, `flat_no`, `address`, `district`, `state`, `polic_station`, `two_wheeler`, `four_wheeler`, `tenant_occupation`, `tenant_occupation_address`, `granter1_name`, `granter1_contact`, `granter1_address`, `granter1_district`, `granter1_state`, `granter1_police_station`, `granter1_email`, `granter2_name`, `granter2_contact`, `granter2_address`, `granter2_district`, `granter2_state`, `granter2_police_station`, `granter2_email`, `status`, `joining_date`) VALUES
(1, 'Douglas', 'William', '', 'Mogusu@gmail.com', 12345, '85421658', 3, 10000, '2023-03-08', 1, 1, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2022-07-01'),
(2, 'Rachael', 'Pata nahi', '', 'wangeci@gmail.com', 54321, '4851256', 4, 15000, '2023-03-08', 1, 2, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-08-01'),
(3, 'zeph', 'NoBody', '', 'wanyama@gmail.com', 99999, '8956214', 2, 20000, '2023-03-08', 1, 3, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-09-01'),
(4, 'maureen', 'AnyBody', '', 'cherotich@gmail.com', 88888, '8456215', 1, 5000, '2023-03-08', 2, 1, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-10-01'),
(5, 'james', 'SomeBody', '', 'james@gmail.com', 78523, '8512469', 2, 25000, '2023-03-08', 2, 2, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2022-09-01'),
(6, 'DANIEL', 'RehneDo', '', 'daniel@gmail.com', 32587, '85745264', 3, 30000, '2023-03-08', 2, 3, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-07-07'),
(19, 'Sneha', 'Sanu Mathew', 'female', '0808io201048.ies@ipsacademy.org', 2147483647, '7489625561', 0, 0, '2001-05-16', 1, 1, 'A 34/303 Treasure Fantasy', 'Indore', 'Madhya Pradesh', 'Rajendra Nagar', 1, 1, 'Student ', 'IES IPS Academy Indore Madhya Pradesh', 'Lydia Thomas ', '8767887654', 'A 99/209 Vasant Vihar', 'Indore', 'Madhya Pradesh', 'Rangwasa', 'etgothno@gmail.com', 'Rachel Johnson', '9877876545', 'A 99/209 Hiranandani Estate ', 'Indore', 'Madhya Pradesh', 'Not sure', 'edf@gmail.com', 1, '2023-03-17'),
(24, 'Om Aditya Jain', 'Mr. Dinesh Jain', 'male', 'omadityajain@gmail.com', 2147483647, '9754854756', 4, 1000000, '2002-10-21', 1, 4, 'Dwarkapuri', 'Indore', 'Madhya Pradesh', 'Dwarkapuri', 0, 0, 'Student', 'IES IPS ACADEMY INDORE', 'Mr. Yash Parmar', '123456789', 'Rajendra Nagar', 'Indore', 'MP', 'Rajendra Nagar', 'yash@gmail.com', 'Mr. Sharansh Nayak', '987654321', 'Rajendra Nagar', 'Indore', 'MP', 'Rajendra Nagar', 'sharansh@gmail.com', 1, '2023-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_relatives`
--

CREATE TABLE `tenant_relatives` (
  `sno` int(11) NOT NULL,
  `tenant_id` int(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `aadhar` int(20) NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_relatives`
--

INSERT INTO `tenant_relatives` (`sno`, `tenant_id`, `name`, `age`, `gender`, `relation`, `mobile_no`, `aadhar`, `active`) VALUES
(1, 24, 'Mr. Dinesh Jain', 40, 'male', 'father', 2147483647, 2147483647, 1),
(2, 24, 'Mrs. Deepti Jain', 40, 'female', 'mother', 2147483647, 2147483647, 1),
(3, 24, 'Ms. Palak Jain', 18, 'female', 'others', 2147483647, 2147483647, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1),
(2, 'Om', 'Om', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(4, 'Nisha', 'Nisha', '827ccb0eea8a706c4c34a16891f84e7b', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entry_form_details`
--
ALTER TABLE `entry_form_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_charges`
--
ALTER TABLE `extra_charges`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `flats_electricity_reading`
--
ALTER TABLE `flats_electricity_reading`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_address`
--
ALTER TABLE `house_address`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_relatives`
--
ALTER TABLE `tenant_relatives`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entry_form_details`
--
ALTER TABLE `entry_form_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `extra_charges`
--
ALTER TABLE `extra_charges`
  MODIFY `sno` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `flats_electricity_reading`
--
ALTER TABLE `flats_electricity_reading`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `house_address`
--
ALTER TABLE `house_address`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `sno` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tenant_relatives`
--
ALTER TABLE `tenant_relatives`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
