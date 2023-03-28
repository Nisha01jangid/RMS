-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 02:44 PM
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
(1, '2022-12', 3, 'Bilaunji', 1, 3, 9, 9, 3300, 123, 138, 0, 0, '2022-12-10', 0, '2023-03-23'),
(2, '2023-01', 3, 'Bilaunji', 1, 3, 9, 9, 3300, 138, 148, 0, 0, '2023-03-10', 0, '2023-03-23'),
(3, '2023-02', 3, 'Bilaunji', 1, 3, 5, 5, 3300, 148, 158, 0, 0, '2023-02-28', 0, '2023-03-23'),
(4, '2023-03', 3, 'Bilaunji', 1, 3, 10, 10, 3300, 158, 168, 0, 0, '2023-03-23', 0, '2023-03-23'),
(5, '2023-04', 3, 'Bilaunji', 1, 3, 5, 5, 3300, 168, 178, 0, 0, '2023-04-13', 0, '2023-03-23'),
(6, '2023-05', 3, 'Bilaunji', 1, 3, 4, 4, 3300, 178, 188, 0, 0, '2023-05-10', 0, '2023-03-23'),
(7, '2022-12', 3, 'Bilaunji', 2, 3, 5, 5, 4000, 100, 110, 0, 0, '2023-03-23', 1, '2023-03-23'),
(8, '2023-01', 3, 'Bilaunji', 2, 3, 6, 6, 4000, 110, 120, 0, 0, '2023-01-09', 1, '2023-03-23'),
(9, '2023-02', 3, 'Bilaunji', 2, 3, 7, 7, 4000, 120, 130, 0, 0, '2023-02-14', 1, '2023-03-23'),
(10, '2023-03', 3, 'Bilaunji', 2, 3, 8, 8, 4000, 130, 140, 0, 0, '2023-03-23', 1, '2023-03-23'),
(11, '2023-03', 4, '87%20', 1, 3, 6, 6, 5700, 0, 100, 0, 0, '2023-03-24', 1, '2023-03-24'),
(12, '2023-04', 4, '87%20', 1, 3, 6, 6, 5700, 100, 200, 0, 0, '0000-00-00', 1, '2023-03-24'),
(13, '2023-04', 3, 'Bilaunji', 2, 3, 5555, 1000, 4000, 140, 150, 5555, 5555, '2023-03-25', 1, '2023-03-24'),
(14, '2022-11', 5, 'test', 1, 6, 9, 3, 3300, 107, 127, 0, 0, '2022-11-25', 1, '2023-03-24'),
(15, '2022-10', 6, 'test', 1, 6, 5, 5, 4203, 100, 107, 0, 0, '2022-10-25', 0, '2023-03-25'),
(16, '2022-10', 6, 'test', 2, 6, 1, 0, 4202, 106, 107, 0, 0, '2022-10-25', 1, '2023-03-24'),
(17, '2022-11', 6, 'test', 2, 6, 9, 3, 3300, 107, 127, 0, 0, '2022-11-25', 1, '2023-03-24'),
(18, '2022-12', 6, 'test', 2, 6, 8.9, 3, 3300, 127, 138, 0, 0, '2022-12-25', 1, '2023-03-24'),
(19, '2023-01', 6, 'test', 2, 6, 9, 3, 3300, 138, 148, 0, 0, '2023-01-20', 1, '2023-03-24'),
(20, '2023-02', 6, 'test', 2, 6, 9.5, 3, 3300, 148, 158, 0, 0, '2023-02-20', 1, '2023-03-24'),
(22, '2022-10', 6, 'test', 1, 6, 1, 0, 4202, 106, 107, 0, 0, '2022-10-25', 0, '2023-03-25'),
(23, '2022-11', 6, 'test', 1, 6, 1, 1, 18883, 595, 596, 0, 0, '2022-11-25', 0, '2023-03-25'),
(24, '2022-12', 6, 'test', 1, 6, 8.9, 3, 3300, 127, 138, 0, 0, '2022-12-25', 0, '2023-03-25'),
(25, '2023-01', 6, 'test', 1, 6, 9, 3, 3300, 138, 148, 0, 0, '2023-01-20', 0, '2023-03-25'),
(26, '2023-02', 6, 'test', 1, 6, 9.5, 3, 3300, 148, 158, 0, 0, '2023-02-20', 0, '2023-03-25'),
(27, '2022-10', 6, 'test', 3, 6, 5, 5, 4203, 100, 107, 0, 0, '2022-10-25', 0, '2023-03-25'),
(28, '2022-10', 6, 'test', 3, 6, 1, 0, 4202, 106, 107, 0, 0, '2022-10-25', 0, '2023-03-25'),
(29, '2022-11', 6, 'test', 3, 6, 9, 3, 3300, 107, 127, 0, 0, '2022-11-25', 0, '2023-03-25'),
(30, '2022-12', 6, 'test', 3, 6, 1, 1, 3332, 303, 304, 0, 0, '2022-12-15', 0, '2023-03-25'),
(31, '2023-01', 6, 'test', 3, 6, 9, 3, 3300, 138, 148, 0, 0, '2023-01-20', 0, '2023-03-25'),
(32, '2023-02', 6, 'test', 3, 6, 9.5, 3, 3300, 148, 158, 0, 0, '2023-02-20', 0, '2023-03-25'),
(33, '2023-02', 6, 'test', 4, 5, 6, 6, 5700, 100, 200, 0, 0, '2023-02-14', 1, '2023-03-25'),
(34, '2023-03', 6, 'test', 4, 5, 6, 6, 5700, 200, 300, 0, 0, '2023-03-14', 1, '2023-03-25'),
(35, '2022-11', 6, 'test', 5, 4, 1, 1, 18882, 595, 596, 0, 0, '2022-11-25', 1, '2023-03-25'),
(36, '2022-12', 6, 'test', 5, 4, 8.9, 6, 3200, 596, 639, 0, 0, '2022-12-15', 1, '2023-03-25'),
(37, '2023-01', 6, 'test', 5, 4, 9, 6, 3200, 639, 690, 0, 0, '2023-01-20', 1, '2023-03-25'),
(38, '2023-02', 6, 'test', 5, 4, 9.5, 6, 3200, 690, 737, 0, 0, '2023-02-20', 1, '2023-03-25'),
(39, '2022-12', 8, 'manoj', 1, 1, 1, 1, 3332, 303, 304, 0, 0, '2022-12-15', 1, '2023-03-25'),
(40, '2023-01', 8, 'manoj', 1, 1, 9, 6, 3200, 304, 312, 0, 0, '2023-01-25', 1, '2023-03-25'),
(41, '2022-12', 8, 'manoj', 2, 4, 1, 1, 23607, 758, 759, 0, 0, '2022-12-15', 0, '2023-03-25'),
(42, '2022-12', 8, 'manoj', 3, 4, 1, 1, 23604, 758, 759, 0, 0, '2022-12-15', 1, '2023-03-25'),
(43, '2023-01', 8, 'manoj', 3, 4, 9, 6, 3300, 759, 810, 0, 0, '2023-01-25', 1, '2023-03-25'),
(44, '2023-02', 8, 'manoj', 3, 4, 9.5, 6, 3300, 810, 850, 0, 0, '2023-02-23', 1, '2023-03-25'),
(45, '2023-03', 8, 'manoj', 3, 4, 8.9, 6, 3300, 850, 900, 34, 56, '2023-03-28', 1, '2023-03-27'),
(46, '2023-03', 10, 'Bilaunji%20Final', 4, 6, 1, 1, 26186, 533, 534, 0, 0, '2022-11-25', 0, '2023-03-28'),
(47, '2022-10', 10, 'Bilaunji%20Final', 1, 6, 1, 1, 26345, 354, 345, 0, 0, '2023-03-29', 0, '2023-03-28'),
(48, '2023-02', 10, 'Bilaunji%20Final', 1, 6, 1, 1, 26184, 533, 534, 0, 0, '2023-02-22', 1, '2023-03-28'),
(49, '2022-12', 10, 'Bilaunji%20Final', 2, 6, 1, 1, 19175, 558, 558, 0, 0, '2022-12-15', 1, '2023-03-28'),
(50, '2023-01', 10, 'Bilaunji%20Final', 2, 6, 9, 3, 3200, 559, 587, 0, 0, '2023-01-20', 1, '2023-03-28'),
(51, '2022-11', 10, 'Bilaunji%20Final', 3, 6, 1, 1, 7838, 126, 127, 0, 0, '2022-11-25', 1, '2023-03-28'),
(52, '2022-12', 10, 'Bilaunji%20Final', 3, 6, 8.9, 3, 3300, 127, 138, 0, 0, '2022-12-15', 1, '2023-03-28'),
(53, '2022-10', 11, 'Nisha', 2, 6, 1, 1, 26186, 417, 418, 0, 0, '2022-10-30', 1, '2023-03-28'),
(54, '2022-11', 11, 'Nisha', 2, 6, 9, 3, 3200, 418, 534, 0, 0, '2022-11-25', 0, '2023-03-28');

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

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`id`, `date`, `receiver`, `head`, `amount`, `time_stamp`) VALUES
(0, '', 'Dr. Indra Kumar Shah', 'Other', 0, '2023-03-24 02:40:53');

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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`sno`, `invoice`, `property_id`, `flat_no`, `month`, `tenant_name`, `electricity_units`, `timestamp`) VALUES
(1, '2022-12/1', 3, 1, '2022-12', '0', 15, '2023-03-23 16:59:01'),
(2, '2023-01/1', 3, 1, '2023-01', '0', 10, '2023-03-23 17:06:34'),
(3, '2023-02/1', 3, 1, '2023-02', '0', 10, '2023-03-23 17:06:39'),
(4, '2023-03/1', 3, 1, '2023-03', '0', 10, '2023-03-23 17:06:51'),
(5, '2022-12/2', 3, 2, '2022-12', 'JFsfjksjk', 10, '2023-03-23 17:34:39'),
(6, '2023-03/2', 3, 2, '2023-03', '0', 10, '2023-03-23 17:40:46'),
(7, '2023-02/2', 3, 2, '2023-02', 'JFsfjksjk', 10, '2023-03-23 18:08:55'),
(8, '2023-03/1', 4, 1, '2023-03', 'IK SHAH', 100, '2023-03-24 02:13:29'),
(9, '2023-01/2', 3, 2, '2023-01', 'JFsfjksjk', 10, '2023-03-24 05:00:37'),
(14, '2023-04/2', 3, 2, '2023-04', 'Indra Kumar Shah', 10, '2023-03-24 05:51:34'),
(15, '2022-11/1', 5, 1, '2022-11', 'K Singh', 20, '2023-03-24 07:28:03'),
(16, '2022-10/2', 6, 2, '2022-10', 'Indra Kumar Shah', 1, '2023-03-24 07:37:14'),
(17, '2022-11/2', 6, 2, '2022-11', 'Indra Kumar Shah', 20, '2023-03-24 07:38:37'),
(18, '2022-12/2', 6, 2, '2022-12', 'Indra Kumar Shah', 11, '2023-03-24 09:11:35'),
(19, '2023-01/2', 6, 2, '2023-01', 'Indra Kumar Shah', 10, '2023-03-24 09:22:49'),
(20, '2023-02/2', 6, 2, '2023-02', 'Indra Kumar Shah', 10, '2023-03-24 09:23:28'),
(21, '2022-10/1', 6, 1, '2022-10', 'IK Shah', 7, '2023-03-25 06:43:23'),
(22, '2022-11/1', 6, 1, '2022-11', 'IK Shah', 20, '2023-03-25 06:43:27'),
(23, '2022-12/1', 6, 1, '2022-12', 'IK Shah', 11, '2023-03-25 06:43:32'),
(24, '2023-01/1', 6, 1, '2023-01', 'IK Shah', 10, '2023-03-25 06:43:34'),
(25, '2023-02/1', 6, 1, '2023-02', 'IK Shah', 10, '2023-03-25 06:43:36'),
(26, '2022-10/3', 6, 3, '2022-10', 'sdaSD', 7, '2023-03-25 06:45:33'),
(27, '2022-11/3', 6, 3, '2022-11', 'sdaSD', 20, '2023-03-25 06:45:39'),
(28, '2022-12/3', 6, 3, '2022-12', 'sdaSD', 11, '2023-03-25 06:45:41'),
(29, '2023-01/3', 6, 3, '2023-01', 'sdaSD', 10, '2023-03-25 06:45:43'),
(30, '2023-02/3', 6, 3, '2023-02', 'sdaSD', 10, '2023-03-25 06:45:44'),
(31, '2023-02/4', 6, 4, '2023-02', 'Mahendra gaud', 100, '2023-03-25 15:07:39'),
(32, '2023-03/4', 6, 4, '2023-03', 'Mahendra gaud', 100, '2023-03-25 15:11:03'),
(33, '2022-11/5', 6, 5, '2022-11', 'ABC Rajput ', 1, '2023-03-25 17:08:02'),
(34, '2022-12/5', 6, 5, '2022-12', 'ABC Rajput ', 43, '2023-03-25 17:10:46'),
(35, '2023-01/5', 6, 5, '2023-01', 'ABC Rajput ', 51, '2023-03-25 17:16:04'),
(36, '2023-02/5', 6, 5, '2023-02', 'ABC Rajput ', 47, '2023-03-25 17:21:32'),
(37, '2022-12/1', 8, 1, '2022-12', 'amc MArcoV7', 1, '2023-03-25 17:34:22'),
(38, '2023-01/1', 8, 1, '2023-01', 'amc yash', 8, '2023-03-25 17:36:31'),
(39, '2022-12/2', 8, 2, '2022-12', 'lala SHRIVASTAV', 1, '2023-03-25 17:41:54'),
(40, '2022-12/3', 8, 3, '2022-12', 'lala SHRIVASTAV', 1, '2022-12-15 17:43:59'),
(41, '2023-01/3', 8, 3, '2023-01', 'lala SHRIVASTAV', 51, '2023-01-25 17:47:50'),
(42, '2023-02/3', 8, 3, '2023-02', 'lala SHRIVASTAV', 40, '2023-02-25 17:56:08'),
(49, '2022-11/3', 10, 3, '2022-11', 'K.SINGH(V-1)', 1, '2023-03-28 08:54:08'),
(51, '2022-12/3', 10, 3, '2022-12', 'K.SINGH(V-1)', 11, '2023-03-28 08:59:30'),
(52, '2023-01/2', 10, 2, '2023-01', 'J SINGH(V4)', 28, '2023-03-28 10:52:19'),
(53, '2022-12/2', 10, 2, '2022-12', 'J SINGH(V4)', 0, '2023-03-28 10:53:26'),
(54, '2022-10/2', 11, 2, '2022-10', 'RAMASHANKAR SHAH', 1, '2022-10-15 10:02:02'),
(55, '2022-11/2', 11, 2, '2022-11', 'RAMASHANKAR SHAH', 116, '2022-11-20 12:07:56');

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
(1, 3, '2022-12', '2023-03-23', '2023-03-23 16:59:01'),
(2, 3, '2023-03', '2023-03-23', '2023-03-23 16:59:18'),
(3, 3, '2023-01', '2023-03-24', '2023-03-23 17:06:34'),
(4, 3, '2023-02', '2023-03-23', '2023-03-23 17:06:39'),
(5, 4, '2023-03', '2023-03-24', '2023-03-24 02:13:29'),
(6, 3, '2023-04', '2023-03-24', '2023-03-24 05:11:19'),
(7, 5, '2022-11', '2023-03-24', '2023-03-24 07:28:03'),
(8, 6, '2022-10', '2023-03-25', '2023-03-24 07:37:14'),
(9, 6, '2022-11', '2023-03-25', '2023-03-24 07:38:37'),
(10, 6, '2022-12', '2023-03-25', '2023-03-24 09:11:35'),
(11, 6, '2023-01', '2023-03-25', '2023-03-24 09:22:49'),
(12, 6, '2023-02', '2023-03-25', '2023-03-24 09:23:28'),
(13, 6, '2023-03', '2023-03-25', '2023-03-25 15:11:03'),
(14, 8, '2022-12', '2023-03-25', '2023-03-25 17:34:22'),
(15, 8, '2023-01', '2023-03-25', '2023-03-25 17:36:31'),
(16, 8, '2023-02', '2023-03-25', '2023-03-25 17:56:08'),
(17, 8, '2023-03', '2023-03-28', '2023-03-26 03:12:30'),
(18, 10, '2023-03', '2023-03-28', '2023-03-28 08:01:38'),
(19, 10, '2022-12', '2023-03-28', '2023-03-28 08:46:25'),
(20, 10, '2023-01', '2023-03-28', '2023-03-28 08:48:58'),
(21, 10, '2022-11', '2023-03-28', '2023-03-28 08:54:08'),
(22, 11, '2022-10', '2023-03-28', '2023-03-28 12:02:02'),
(23, 11, '2022-11', '2023-03-28', '2023-03-28 12:07:56');

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
(1, 3, 1, '2022-12', 3462, 0, 3462, 0, '2023-03-23 17:21:28'),
(2, 3, 1, '2023-01', 6879, 0, 6879, 0, '2023-03-23 17:21:28'),
(3, 3, 1, '2023-02', 10296, 0, 10296, 0, '2023-03-23 17:21:28'),
(4, 3, 1, '2023-03', 13726, 0, 13726, 0, '2023-03-23 17:21:28'),
(5, 3, 1, '2023-04', 17091, 0, 17091, 0, '2023-03-23 17:21:28'),
(6, 3, 2, '2022-12', 4065, 0, 4065, 1, '2023-03-23 17:34:54'),
(7, 3, 2, '2023-01', 8143, 5000, 3143, 1, '2023-03-23 17:36:59'),
(8, 3, 2, '2023-02', 7234, 2000, 5234, 1, '2023-03-23 17:57:50'),
(9, 3, 2, '2023-03', 9338, 0, 9338, 1, '2023-03-23 17:57:50'),
(10, 4, 1, '2023-03', 6318, 0, 6318, 1, '2023-03-24 02:13:10'),
(15, 3, 2, '2023-04', 82998, 0, 82998, 1, '2023-03-24 09:02:55'),
(16, 5, 1, '2022-11', 3498, 0, 3498, 1, '2023-03-24 07:28:03'),
(17, 6, 1, '2022-10', 4203, 0, 4203, 0, '2023-03-25 10:07:29'),
(18, 6, 2, '2022-10', 4203, 0, 4203, 1, '2023-03-24 07:36:40'),
(19, 6, 2, '2022-11', 7845, 0, 7845, 1, '2023-03-24 11:44:21'),
(20, 6, 2, '2022-12', 11403, 5000, 6403, 1, '2023-03-24 11:56:27'),
(21, 6, 2, '2023-01', 9955, 5000, 4955, 1, '2023-03-24 11:56:27'),
(22, 6, 2, '2023-02', 8521, 5000, 3521, 1, '2023-03-27 10:09:41'),
(23, 6, 1, '2022-11', 7845, 0, 7845, 0, '2023-03-25 10:07:29'),
(24, 6, 1, '2022-12', 11403, 0, 11403, 0, '2023-03-25 10:07:29'),
(25, 6, 1, '2023-01', 14955, 0, 14955, 0, '2023-03-25 10:07:29'),
(26, 6, 1, '2023-02', 18521, 0, 18521, 0, '2023-03-25 10:07:29'),
(27, 6, 3, '2022-10', 4203, 0, 4203, 0, '2023-03-25 15:55:13'),
(28, 6, 3, '2022-11', 7845, 0, 7845, 0, '2023-03-25 15:55:13'),
(29, 6, 3, '2022-12', 11403, 0, 11403, 0, '2023-03-25 15:55:13'),
(30, 6, 3, '2023-01', 14955, 0, 14955, 0, '2023-03-25 15:55:13'),
(31, 6, 3, '2023-02', 18521, 0, 18521, 0, '2023-03-25 15:55:13'),
(32, 6, 4, '2023-02', 6480, 2980, 3500, 1, '2023-03-25 15:10:42'),
(33, 6, 4, '2023-03', 9980, 0, 9980, 1, '2023-03-25 15:10:42'),
(34, 6, 5, '2022-11', 18887, 0, 18887, 1, '2023-03-25 17:07:55'),
(35, 6, 5, '2022-12', 22683, 15000, 7683, 1, '2023-03-25 17:15:46'),
(36, 6, 5, '2023-01', 11558, 0, 11558, 1, '2023-03-25 17:15:46'),
(37, 6, 5, '2023-02', 15433, 0, 15433, 1, '2023-03-25 17:21:13'),
(38, 8, 1, '2022-12', 3334, 3334, 0, 1, '2023-03-28 06:33:19'),
(39, 8, 1, '2023-01', 3326, 3326, 0, 1, '2023-03-28 07:07:58'),
(40, 8, 2, '2022-12', 23612, 0, 23612, 0, '2023-03-25 17:42:23'),
(41, 8, 3, '2022-12', 23609, 0, 23609, 1, '2023-03-28 06:41:53'),
(42, 8, 3, '2023-01', 27584, 35000, -7416, 1, '2023-03-28 06:55:26'),
(43, 8, 3, '2023-02', -3508, 0, -3508, 1, '2023-03-28 07:10:06'),
(44, 8, 3, '2023-03', 541, 35992, -35451, 1, '2023-03-28 07:10:06'),
(45, 10, 4, '2023-03', 26193, 0, 26193, 0, '2023-03-28 08:02:06'),
(46, 10, 1, '2022-10', 26194, 0, 26194, 0, '2023-03-28 08:04:23'),
(47, 10, 1, '2023-02', 26191, 0, 26191, 1, '2023-03-28 08:42:54'),
(48, 10, 2, '2022-12', 19181, 5000, 14181, 1, '2023-03-28 10:52:12'),
(49, 10, 2, '2023-01', 17795, 0, 17795, 1, '2023-03-28 10:53:26'),
(50, 10, 3, '2022-11', 7845, 5000, 2845, 1, '2023-03-28 08:59:22'),
(51, 10, 3, '2022-12', 6403, 0, 6403, 1, '2023-03-28 08:59:22'),
(52, 11, 2, '2022-10', 26193, 15000, 11193, 1, '2023-03-28 12:27:45'),
(53, 11, 2, '2022-11', 15599, 0, 15599, 1, '2023-03-28 12:27:45');

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
(1, 3, 1, 'paytm', '2023-04-27', '2023-04', 14000, 'fdFD', 'FfSF', 'Mr. Ram Kripal Shah', 0, '2023-03-23 17:21:28'),
(2, 3, 2, 'offline', '2023-03-02', '2023-01', 5000, NULL, 'sad', 'Mr. Ram Kripal Shah', 1, '2023-03-23 17:36:40'),
(3, 3, 2, 'paytm', '2023-03-23', '2023-02', 2000, 'ads', 'sdf', 'Mr. Ram Kripal Shah', 1, '2023-03-23 17:57:46'),
(4, 4, 1, 'offline', '2023-03-24', '2023-04', 10000, NULL, '', 'Mr. Manoj Kumar Shah', 1, '2023-03-24 02:24:30'),
(6, 6, 2, 'paytm', '2022-12-06', '2022-12', 5000, 'test', '', 'Mr. Ram Kripal Shah', 1, '2023-03-24 11:55:52'),
(7, 6, 2, 'paytm', '2023-01-03', '2023-01', 5000, 'test', '', 'Mr. Ram Kripal Shah', 1, '2023-03-24 11:56:25'),
(8, 6, 4, 'offline', '2023-03-17', '2023-02', 480, NULL, 'RENT', 'Dr. Indra Kumar Shah', 1, '2023-03-25 15:08:57'),
(9, 6, 4, 'paytm', '2023-03-24', '2023-02', 500, 'GHFSH', 'sad', 'Mr. Manoj Kumar Shah', 1, '2023-03-25 15:09:58'),
(10, 6, 4, 'offline', '2023-03-25', '2023-02', 2000, NULL, 'DGFHG', 'Mr. Ram Kripal Shah', 1, '2023-03-25 15:10:32'),
(11, 6, 5, 'offline', '2022-12-28', '2022-12', 15000, NULL, 'xyz', 'Mr. Ram Kripal Shah', 1, '2023-03-25 17:15:42'),
(12, 8, 1, 'paytm', '2022-12-30', '2022-12', 3334, '12221', 'full paid', 'Mr. Ram Kripal Shah', 1, '2023-03-25 17:34:10'),
(13, 8, 1, 'paytm', '2023-02-04', '2023-01', 3326, 'fF', 'dSA', 'Mr. Ram Kripal Shah', 1, '2023-03-25 17:37:30'),
(14, 8, 3, 'offline', '2023-03-26', '2023-02', 492, NULL, 'SFZSAZX', 'Mr. Ram Kripal Shah', 1, '2023-03-25 18:47:52'),
(15, 8, 3, 'offline', '2023-03-09', '2023-02', 35000, NULL, 'H', 'Mr. Ram Kripal Shah', 1, '2023-03-26 03:12:14'),
(16, 8, 3, 'offline', '2023-03-26', '2023-03', 500, NULL, '', 'Mr. Ram Kripal Shah', 1, '2023-03-26 03:15:00'),
(17, 6, 2, 'offline', '2023-03-23', '2023-02', 5000, NULL, 'srghfjgkjhgrfedaw', 'Dr. Indra Kumar Shah', 1, '2023-03-27 10:09:37'),
(18, 8, 3, 'offline', '2022-12-25', '2023-01', 35000, NULL, 'H', 'Mr. Ram Kripal Shah', 1, '2023-03-28 06:53:28'),
(19, 10, 3, 'paytm', '2022-12-06', '2022-11', 0, 'ss', 'sdf', 'Mr. Ram Kripal Shah', 1, '2023-03-28 08:58:11'),
(20, 10, 3, 'paytm', '2022-12-06', '2022-11', 5000, 'dx', 'DGFHG', 'Mr. Ram Kripal Shah', 1, '2023-03-28 08:59:15'),
(21, 10, 2, 'offline', '2023-01-19', '2022-12', 5000, NULL, 'DGFHG', 'Mr. Ram Kripal Shah', 1, '2023-03-28 10:51:55'),
(22, 11, 2, 'gpay', '2022-10-30', '2022-10', 15000, 'abcd', 'dddd', 'Dr. Indra Kumar Shah', 1, '2023-03-28 12:02:35');

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
(1, 'Bilaunji', 'Bypass Road Bilaunji Waidhan', 32, 0),
(2, 'Bilaunji', 'Bypass Road Bilaunji Waidhan', 32, 0),
(3, 'Bilaunji', 'Bypass Road Bilaunji Waidhan', 32, 0),
(4, '87 ', 'ANNAPURNA ROAD INDORE', 7, 0),
(5, 'test', 'ipsa', 5, 0),
(6, 'test', 'ipsa', 5, 1),
(7, 'ABHILASHA', 'AFSGFD', 40, 0),
(8, 'manoj', 'kachni', 4, 1),
(9, 'DYTFYT', 'XFFYG', 3, 0),
(10, 'Bilaunji Final', 'Bypass Road Bilaunji Waidhan', 32, 1),
(11, 'Nisha', 'Sneha', 5, 1);

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
(1, '', '', '', '', 0, '', 0, 0, 0, 0, 0, '0000-00-00', 0, 2, 1, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(2, 'K Singh', '', '', '', 0, '9893838092', 3, 1, 1, 1, 0, '0000-00-00', 0, 3, 1, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(3, 'INDRA', '', '', '', 0, '', 3, 1, 1, 1, 0, '0000-00-00', 0, 3, 1, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(4, 'IK', '', '', '', 0, '', 3, 1, 1, 0, 0, '0000-00-00', 0, 3, 1, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(5, 'INDRA', '', 'male', '', 0, '', 3, 1, 1, 1, 0, '0000-00-00', 36, 3, 1, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(6, 'JFsfjksjk', 'kdfnkslnfklsj', 'male', '', 0, '', 3, 1, 1, 0, 0, '2002-01-03', 0, 3, 2, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(7, 'IK SHAH', '', '', '', 0, '', 3, 1, 1, 1, 0, '0000-00-00', 0, 4, 1, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(8, '', '', '', '', 0, '', 0, 0, 0, 0, 0, '0000-00-00', 0, 4, 2, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(9, 'K Singh', '', 'male', 'indrashah08@gmail.com', 0, '9407137191', 6, 2, 1, 3, 0, '1986-03-07', 38, 5, 1, 'college road bilaunji', 'Singrauli', 'Madhya Pradesh', 'Waidhan', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(10, 'IK Shah', 'MR. RK Shah', 'male', 'indrashah08@gmail.com', 0, '9407137191', 6, 2, 2, 1, 0, '1986-03-07', 38, 6, 1, 'college road bilaunji', '', 'Madhya Pradesh', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(11, 'Indra Kumar Shah', 'MR. RK Shah', '', 'indrashah08@gmail.com', 2147483647, '09407137191', 6, 1, 1, 4, 3300, '1986-03-07', 38, 6, 2, '87 Revenue Nagar Annapurna Road Indore', 'Singrauli', 'Madhya Pradesh', 'Waidhan', 'MP09CT7671', 'MP09CT7671', 'teacing', 'college road bilaunji', '9407137191', 'Sharad Jain', '9407137191', '87 Revenue Nagar Annapurna Road Indore', 'indore', 'Madhya Pradesh', 'Annapurna Road', 'indrashah08@gmail.com', 'RAMASHANKAR SHAH', '9407137191', 'college road bilaunji Waidhan Byppass Road MP', 'singrauli', 'Madhya Pradesh', 'Waidhan', 'indrashah08@gmail.com', 1, '2022-10-01'),
(12, 'Om ', '', '', '', 0, '', 3, 1, 1, 1, 0, '0000-00-00', 0, 3, 3, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(13, 'sdaSD', '', '', '', 0, '', 0, 0, 0, 0, 0, '0000-00-00', 0, 6, 3, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(14, 'Mahendra gaud', 'shri lakshman g gaud ', '', 'mahendragaudslr@gmail.com', 2147483647, '9999999999', 5, 2, 3, 0, 5700, '1969-07-18', 53, 6, 4, '18 REVENUE NAGAR, ANNAPURNA ROAD', 'indroe', 'Madhya Pradesh', 'annapurna indroe', '2', '2', 'GOV SERCIVICE', 'COLLCTORATE DHAR ', '999999999999', 'HEMRAJ GAUD', '99999999999', '32, BHOI MOHLLA INDORE NEAR CIVIL HOSPITAL GOVT SCHOOOL KE PAS INDORE CHUNNILAL G KE MAKAN ME MANIKLAL G KE MAKAN KE PAS ', 'INDORE', 'Madhya Pradesh', 'SADARBAXAR INDORE', 'ADJDLKDLKDJGDDGJD@GMAIL.COM', 'NILESH ', '99999999999', '32, BHOI MOHLLA INDORE NEAR CIVIL HOSPITAL GOVT SCHOOOL KE PAS INDORE CHUNNILAL G KE MAKAN ME MANIKLAL G KE MAKAN KE PAS ', 'INDORE', 'Madhya Pradesh', 'M G RODA GAUD', 'NILESH@GMAIL.COM', 1, '2023-03-25'),
(15, 'xyz Rajput Ji', 'xyz', 'male', '', 0, '', 4, 2, 2, 1, 0, '0000-00-00', 0, 6, 1, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(16, 'ABC Rajput ', '', '', '', 0, '', 4, 2, 2, 0, 0, '0000-00-00', 0, 6, 5, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(17, 'indra MarcoV7', '', '', '', 0, '', 1, 0, 0, 0, 0, '0000-00-00', 0, 6, 3, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(18, 'amc MArcoV7', '', 'male', '', 0, '', 1, 0, 0, 0, 0, '0000-00-00', 0, 8, 1, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(19, 'lala SHRIVASTAV', '', '', '', 0, '', 4, 2, 2, 0, 0, '0000-00-00', 0, 8, 2, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(20, 'lala SHRIVASTAV-(V8)', '', '', '', 0, '1234567', 4, 1, 1, 2, 0, '0000-00-00', 0, 8, 3, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(21, 'ABHINAV', 'CG', '', '', 0, '', 0, 0, 0, 0, 0, '0000-00-00', 0, 9, 1, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(22, 'J. Singh-(V-4)', 'MR. RK Shah', '', 'indrashah08@gmail.com', 2147483647, '9407137191', 6, 2, 2, 2, 3200, '1986-03-07', 38, 10, 4, 'Bypass road Bilaunji MP', 'Singrauli', 'Madhya Pradesh', 'Waidhan', '0', '0', 'MP09CT7671', 'college road bilaunji', '9407137191', 'NEHA SINGH RATHAUR', '9713046369', '87 first floor, revenue nagar , annapurna road', 'INDORE', 'madhya pradesh', 'Annapurna Road', 'nehasinghrathaur@gmail.com', 'NEHA SINGH RATHAUR', '9713046369', '87 first floor, revenue nagar , annapurna road', 'singrauli', 'madhya pradesh', 'Waidhan', 'nehasinghrathaur@gmail.com', 0, '2022-11-01'),
(23, 'J SINGH', '', '', '', 0, '', 6, 2, 2, 2, 0, '0000-00-00', 0, 10, 1, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(24, 'J SINGH', '', '', '', 0, '', 6, 2, 2, 2, 0, '0000-00-00', 0, 10, 1, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(25, 'J SINGH(V4)', '', '', '', 0, '', 6, 2, 2, 2, 0, '0000-00-00', 0, 10, 2, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(26, 'K.SINGH(V-1)', '', '', '', 0, '', 6, 2, 2, 2, 0, '0000-00-00', 0, 10, 3, '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(27, 'RAMASHANKAR SHAH', '', '', 'indrashah08@gmail.com', 0, '9407137191', 6, 0, 0, 0, 0, '0000-00-00', 0, 11, 2, 'college road bilaunji', '', 'Madhya Pradesh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00');

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
(1, 1, '', '', 0, '', '', 0, 0, 0),
(2, 2, 'xyz', 'abc', 7, 'male', 'child', 1111, 111, 0),
(3, 3, '', '', 0, '', '', 0, 0, 0),
(4, 4, '', '', 0, '', '', 0, 0, 0),
(5, 5, 'DFSFF', 'DFDSDAS', 10, 'male', 'mother', 34214, 43244, 1),
(6, 6, 'XZCC', 'xvds', 10, 'male', 'father', 3241, 0, 1),
(7, 7, '', '', 0, '', '', 0, 0, 1),
(8, 8, '', '', 0, '', '', 0, 0, 0),
(9, 9, '', '', 0, '', '', 0, 0, 1),
(10, 10, '', '', 0, '', '', 0, 0, 0),
(11, 11, 'Neha Shah', 'Indra Kumar Shah', 37, '', '', 1234567899, 2147483647, 1),
(12, 12, '', '', 0, '', '', 0, 0, 1),
(13, 13, '', '', 0, '', '', 0, 0, 0),
(14, 14, 'annapurna gaud ', 'lakshaman gaud', 77, '', '', 2147483647, 2147483647, 1),
(15, 14, 'aartee ', 'MAHENDRA', 50, '', '', 0, 2147483647, 1),
(16, 14, 'AMAN', 'MAHENDRA', 27, '', '', 2147483647, 2147483647, 1),
(17, 14, 'ABHILASHA GAUD', 'MAHENDRA', 15, '', '', 2147483647, 2147483647, 1),
(18, 15, '', '', 0, '', '', 0, 0, 1),
(19, 16, '', '', 0, '', '', 0, 0, 1),
(20, 17, '', '', 0, '', '', 0, 0, 1),
(21, 18, '', '', 0, '', '', 0, 0, 1),
(22, 19, '', '', 0, '', '', 0, 0, 0),
(23, 20, '', '', 0, '', '', 0, 0, 1),
(24, 21, '', '', 0, '', '', 0, 0, 1),
(25, 22, 'RAMASHANKAR SHAH', 'lakshaman gaud', 26, 'female', 'wife', 2147483647, 2147483647, 0),
(26, 22, 'NEHA SINGH RATHAUR', 'DFDSDAS', 36, 'male', 'others', 2147483647, 2147483647, 0),
(27, 22, 'RAMASHANKAR SHAH', 'xvds', 55, '', '', 2147483647, 2147483647, 0),
(28, 23, '', '', 0, '', '', 0, 0, 0),
(29, 24, '', '', 0, '', '', 0, 0, 1),
(30, 25, '', '', 0, '', '', 0, 0, 1),
(31, 26, '', '', 0, '', '', 0, 0, 1),
(32, 27, '', '', 0, '', '', 0, 0, 1);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `invoice_status`
--
ALTER TABLE `invoice_status`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `outstanding_amount`
--
ALTER TABLE `outstanding_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tenant_relatives`
--
ALTER TABLE `tenant_relatives`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
