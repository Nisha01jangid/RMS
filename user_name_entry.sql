-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 09:06 AM
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
-- Table structure for table `user_name_entry`
--

CREATE TABLE `user_name_entry` (
  `id` int(11) NOT NULL,
  `user_name` mediumtext CHARACTER SET latin1 NOT NULL,
  `status` int(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_name_entry`
--

INSERT INTO `user_name_entry` (`id`, `user_name`, `status`) VALUES
(1, 'Mr. Ram Kripal Shah', 1),
(2, 'Mr. Manoj Kumar Shah', 1),
(3, 'Dr. Indra Kumar Shah', 1),
(4, 'Mr. Vivek Kumar Shah', 1),
(5, 'Mr. MG', 1),
(6, 'Mr. AG', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_name_entry`
--
ALTER TABLE `user_name_entry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_name_entry`
--
ALTER TABLE `user_name_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
