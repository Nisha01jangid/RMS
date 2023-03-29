-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 01:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `entry_form_details`
--

CREATE TABLE `entry_form_details` (
  `id` int(20) NOT NULL,
  `month` varchar(50) NOT NULL,
  `property_id` int(20) NOT NULL,
  `property_name` varchar(20) NOT NULL,
  `flat_no` int(20) NOT NULL,
  `no_of_members` int(20) NOT NULL,
  `electricity_rate` double NOT NULL,
  `water_rate` double NOT NULL,
  `rent` double NOT NULL,
  `previous_meter_reading` int(100) NOT NULL,
  `current_meter_reading` int(100) NOT NULL,
  `waste` double NOT NULL,
  `miscellaneous` double NOT NULL,
  `duedate` date NOT NULL,
  `status` int(20) NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry_form_details`
--

INSERT INTO `entry_form_details` (`id`, `month`, `property_id`, `property_name`, `flat_no`, `no_of_members`, `electricity_rate`, `water_rate`, `rent`, `previous_meter_reading`, `current_meter_reading`, `waste`, `miscellaneous`, `duedate`, `status`, `timestamp`) VALUES
(1, '2022-10', 1, 'Ganpati%20Bhawan', 5, 6, 1, 1, 4196, 126, 127, 0, 0, '2022-10-25', 1, '2023-03-29'),
(2, '2022-11', 1, 'Ganpati%20Bhawan', 5, 6, 9, 3, 3300, 107, 127, 0, 0, '2022-11-25', 1, '2023-03-29'),
(3, '2022-12', 1, 'Ganpati%20Bhawan', 5, 6, 8.9, 3, 3300, 127, 138, 0, 0, '2022-12-15', 1, '2023-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `id` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `head` varchar(200) NOT NULL,
  `amount` double NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `electricity_units` tinyint(1) NOT NULL,
  `timestamp` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`sno`, `invoice`, `property_id`, `flat_no`, `month`, `tenant_name`, `electricity_units`, `timestamp`) VALUES
(1, '2022-10/5', 1, 5, '2022-10', 'K.SINGH(V-1)', 1, '2022-10-25'),
(2, '2022-11/5', 1, 5, '2022-11', 'K.SINGH(V-1)', 20, '2022-11-20'),
(3, '2022-12/5', 1, 5, '2022-12', 'K.SINGH(V-1)', 11, '2022-12-06');

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

--
-- Dumping data for table `invoice_status`
--

INSERT INTO `invoice_status` (`sno`, `property_id`, `month`, `date`, `timestamp`) VALUES
(1, 1, '2022-10', '2023-03-29', '2023-03-29 10:10:18'),
(2, 1, '2022-11', '2023-03-29', '2023-03-29 10:11:44'),
(3, 1, '2022-12', '2023-03-29', '2023-03-29 10:14:34'),
(4, 1, '2023-01', '2023-03-29', '2023-03-29 10:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `outstanding_amount`
--

CREATE TABLE `outstanding_amount` (
  `id` int(11) NOT NULL,
  `property_id` int(200) NOT NULL,
  `flat_no` int(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `amount_received` int(11) NOT NULL,
  `outstanding_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outstanding_amount`
--

INSERT INTO `outstanding_amount` (`id`, `property_id`, `flat_no`, `month`, `total`, `amount_received`, `outstanding_amount`, `status`, `time_stamp`) VALUES
(1, 1, 5, '2022-10', 4203, 0, 4203, 1, '2023-03-29 10:09:58'),
(2, 1, 5, '2022-11', 7845, 0, 7845, 1, '2023-03-29 11:06:08'),
(3, 1, 5, '2022-12', 11403, 5000, 6403, 1, '2023-03-29 11:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `property_id` int(200) NOT NULL,
  `flat_no` int(200) NOT NULL,
  `pay_mode` varchar(100) NOT NULL,
  `payment_date` varchar(100) CHARACTER SET latin1 NOT NULL,
  `month` varchar(11) NOT NULL,
  `amount` double NOT NULL,
  `reference_id` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET latin1 NOT NULL,
  `payment_receiver` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `property_id`, `flat_no`, `pay_mode`, `payment_date`, `month`, `amount`, `reference_id`, `description`, `payment_receiver`, `status`, `time_stamp`) VALUES
(1, 1, 5, 'paytm', '2022-12-06', '2022-11', 5000, 'TEST1', 'HELLO', 'Dr. Indra Kumar Shah', 1, '2023-03-29 10:14:20');

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
(1, 'Ganpati Bhawan', 'Bypass Road Bilaunji Waidhan', 32, 1);

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
  `no_of_male` int(50) NOT NULL,
  `no_of_female` int(50) NOT NULL,
  `no_of_children_below_5` int(50) NOT NULL,
  `rent` int(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `age` int(20) NOT NULL,
  `property_id` int(30) NOT NULL,
  `flat_no` int(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `district` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `polic_station` varchar(200) NOT NULL,
  `two_wheeler` varchar(500) NOT NULL,
  `four_wheeler` varchar(500) NOT NULL,
  `tenant_occupation` varchar(500) NOT NULL,
  `tenant_occupation_address` varchar(2000) NOT NULL,
  `occupation_contact` varchar(50) NOT NULL,
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

INSERT INTO `tenants` (`id`, `tenant_name`, `father_name`, `gender`, `email`, `aadhaar_no`, `contact`, `members`, `no_of_male`, `no_of_female`, `no_of_children_below_5`, `rent`, `dob`, `age`, `property_id`, `flat_no`, `address`, `district`, `state`, `polic_station`, `two_wheeler`, `four_wheeler`, `tenant_occupation`, `tenant_occupation_address`, `occupation_contact`, `granter1_name`, `granter1_contact`, `granter1_address`, `granter1_district`, `granter1_state`, `granter1_police_station`, `granter1_email`, `granter2_name`, `granter2_contact`, `granter2_address`, `granter2_district`, `granter2_state`, `granter2_police_station`, `granter2_email`, `status`, `joining_date`) VALUES
(1, 'K.SINGH(V-1)', 'MR. RK Shah', 'male', 'indrashah08@gmail.com', 2147483647, '1234567890', 6, 2, 2, 2, 3300, '1986-03-07', 38, 1, 5, 'college road bilaunji GFGHJ BFGJGJKJDSDASFGHJHGF XFGJFTGARAWSDGFHJGHAGFBVC', 'indroe', 'Madhya Pradesh', 'annapurna indroe', 'MP09CT7671', 'mp53mc3847', 'GOV SERCIVICE', '87 Revenue Nagar Annapurna Road Indore', '09713046369', 'Indra Kumar Shah', '09407137191', '87 Revenue Nagar Annapurna Road Indore', 'INDORE', 'Madhya Pradesh', 'SADARBAXAR INDORE', 'indrashah08@gmail.com', 'RAMASHANKAR SHAH', '9407137191', 'college road bilaunji', 'singrauli', 'Madhya Pradesh', 'M G RODA GAUD', 'indrashah08@gmail.com', 1, '2022-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_relatives`
--

CREATE TABLE `tenant_relatives` (
  `sno` int(11) NOT NULL,
  `tenant_id` int(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `father_name` varchar(300) NOT NULL,
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

INSERT INTO `tenant_relatives` (`sno`, `tenant_id`, `name`, `father_name`, `age`, `gender`, `relation`, `mobile_no`, `aadhar`, `active`) VALUES
(1, 1, 'Indra Kumar Shah', 'lakshaman gaud', 5, 'male', 'father', 2147483647, 2147483647, 1),
(2, 1, 'NEHA SINGH RATHAUR', 'lakshaman gaud', 65, 'female', 'mother', 2147483647, 2147483647, 1),
(3, 1, 'Indra Kumar Shah', 'DFDSDAS', 49, 'male', 'husband', 2147483647, 2147483647, 1),
(4, 1, 'TGFSEFSDFD', 'DFSDASFGHMHNGF', 32, 'female', 'wife', 2147483647, 2147483647, 1),
(5, 1, 'RAMASHANKAR SHAH', 'lakshaman gaud', 4, 'female', 'child', 2147483647, 2147483647, 1),
(6, 1, 'VDSFDS', 'DFFGWGFHGF', 5, 'female', 'others', 2147483647, 2147483647, 1);

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
(5, 'Dr. Indra Kumar Shah', 'Indra', '827ccb0eea8a706c4c34a16891f84e7b', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entry_form_details`
--
ALTER TABLE `entry_form_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `invoice_status`
--
ALTER TABLE `invoice_status`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `outstanding_amount`
--
ALTER TABLE `outstanding_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoice_status`
--
ALTER TABLE `invoice_status`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `outstanding_amount`
--
ALTER TABLE `outstanding_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenant_relatives`
--
ALTER TABLE `tenant_relatives`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
