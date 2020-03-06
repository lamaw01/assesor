-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 04:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `reset_auto_id` ()  BEGIN
	ALTER TABLE sheet1 AUTO_INCREMENT = 1;
    ALTER TABLE sheet2 AUTO_INCREMENT = 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sheet1`
--

CREATE TABLE `sheet1` (
  `sheet1_id` int(11) NOT NULL,
  `td` varchar(255) NOT NULL,
  `old_pin` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `owner_address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `lot_description` varchar(255) NOT NULL,
  `cad_lot` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `assessment_date` varchar(255) NOT NULL,
  `area1` varchar(255) NOT NULL,
  `kind1` varchar(255) NOT NULL,
  `area2` varchar(255) NOT NULL,
  `kind2` varchar(255) NOT NULL,
  `bldg_desc` varchar(255) NOT NULL,
  `floor_area` varchar(255) NOT NULL,
  `mach_desc` varchar(255) NOT NULL,
  `actual_use` varchar(255) NOT NULL,
  `spec` varchar(255) NOT NULL,
  `taxable` varchar(255) NOT NULL,
  `av` varchar(255) NOT NULL,
  `mv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sheet2`
--

CREATE TABLE `sheet2` (
  `sheet2_id` int(11) NOT NULL,
  `old_pin` varchar(255) NOT NULL,
  `cad_no` varchar(255) NOT NULL,
  `parcel_no` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `pin_new` varchar(255) NOT NULL,
  `section_new` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sheet1`
--
ALTER TABLE `sheet1`
  ADD PRIMARY KEY (`sheet1_id`),
  ADD KEY `old_pin` (`old_pin`);

--
-- Indexes for table `sheet2`
--
ALTER TABLE `sheet2`
  ADD PRIMARY KEY (`sheet2_id`),
  ADD KEY `old_pin` (`old_pin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sheet1`
--
ALTER TABLE `sheet1`
  MODIFY `sheet1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2186;

--
-- AUTO_INCREMENT for table `sheet2`
--
ALTER TABLE `sheet2`
  MODIFY `sheet2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2957;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
