-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 08:08 AM
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
-- Table structure for table `extra_charges`
--

CREATE TABLE `extra_charges` (
  `sno` int(50) NOT NULL,
  `property_id` int(100) NOT NULL,
  `month` varchar(10) NOT NULL,
  `water_bill` double DEFAULT NULL,
  `electricity_bill` double DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extra_charges`
--

INSERT INTO `extra_charges` (`sno`, `property_id`, `month`, `water_bill`, `electricity_bill`, `time_stamp`) VALUES
(1, 1, '2023-01', 1500, 15000, '2023-03-04 08:44:18'),
(2, 1, '2023-01', 1500, 10000, '2023-03-04 08:44:18'),
(3, 1, '2022-12', 1000, 15000, '2023-03-04 08:06:23'),
(4, 1, '2022-12', 2000, 10000, '2023-03-04 08:06:23'),
(5, 1, '2022-11', 1000, 15000, '2023-03-04 08:06:23'),
(6, 1, '2022-11', 2000, 10000, '2023-03-04 08:06:23'),
(7, 1, '2022-10', 1000, 15000, '2023-03-04 08:06:23'),
(8, 1, '2022-10', 2000, 10000, '2023-03-04 08:06:23'),
(9, 1, '2022-09', 2000, 10000, '2023-03-04 08:06:23'),
(10, 1, '2022-09', 1520.59, NULL, '2023-03-04 08:06:23'),
(14, 1, '2022-08', 3000, NULL, '2023-03-04 08:06:23'),
(17, 1, '2023-02', 250, NULL, '2023-03-04 09:17:20');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `tenant_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `tenant_id`, `amount`, `invoice`, `date_created`) VALUES
(1, 4, 0, '22C10', '2022-10-19 16:50:37'),
(2, 1, 60000, '22C11', '2022-10-19 16:51:07'),
(3, 2, 7000, '22C12', '2022-10-19 16:51:34'),
(4, 3, 9000, '22C14', '2022-10-19 16:52:06'),
(5, 5, 4000, 'GH45', '2022-10-23 19:43:00'),
(6, 6, 10500, 'gh345', '2022-12-23 19:56:51'),
(7, 1, 20000, 'cms1', '2023-03-05 10:20:38'),
(8, 4, 0, '22C10', '2022-10-19 16:50:37'),
(9, 1, 60000, '22C11', '2022-10-19 16:51:07'),
(10, 2, 7000, '22C12', '2022-10-19 16:51:34'),
(11, 3, 9000, '22C14', '2022-10-19 16:52:06'),
(12, 5, 4000, 'GH45', '2022-10-23 19:43:00'),
(13, 6, 10500, 'gh345', '2022-12-23 19:56:51'),
(14, 1, 20000, 'cms1', '2023-03-05 10:20:38');

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
(2, 'P2', 'Dwarkapuri, Indore', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(30) NOT NULL,
  `tenant_name` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aadhar_no` int(20) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `members` int(10) NOT NULL,
  `rent` int(10) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `property_id` int(30) NOT NULL,
  `flat_no` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active, 0= inactive',
  `joining_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `tenant_name`, `father_name`, `email`, `aadhar_no`, `contact`, `members`, `rent`, `birth_date`, `property_id`, `flat_no`, `status`, `joining_date`) VALUES
(1, 'Douglas', 'William', 'Mogusu@gmail.com', 12345, '85421658', 3, 10000, '2023-03-08', 1, 1, 1, '2022-07-01'),
(2, 'Rachael', 'Pata nahi', 'wangeci@gmail.com', 54321, '4851256', 4, 15000, '2023-03-08', 1, 2, 1, '2022-08-01'),
(3, 'zeph', 'NoBody', 'wanyama@gmail.com', 99999, '8956214', 2, 20000, '2023-03-08', 1, 3, 1, '2022-09-01'),
(4, 'maureen', 'AnyBody', 'cherotich@gmail.com', 88888, '8456215', 1, 5000, '2023-03-08', 2, 1, 1, '2022-10-01'),
(5, 'james', 'SomeBody', 'james@gmail.com', 78523, '8512469', 2, 25000, '2023-03-08', 2, 2, 1, '2022-09-01'),
(6, 'DANIEL', 'RehneDo', 'daniel@gmail.com', 32587, '85745264', 3, 30000, '2023-03-08', 2, 3, 1, '2022-07-07');

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
-- Indexes for table `extra_charges`
--
ALTER TABLE `extra_charges`
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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `extra_charges`
--
ALTER TABLE `extra_charges`
  MODIFY `sno` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `house_address`
--
ALTER TABLE `house_address`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
