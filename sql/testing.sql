-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 10:00 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(255) NOT NULL,
  `PostalCode` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`CustomerID`, `CustomerName`, `Address`, `City`, `PostalCode`, `Country`) VALUES
(1, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(2, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(3, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(4, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(5, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(6, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(7, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(8, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(9, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(10, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(11, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(12, '', 'ggwp', '', 'ggwp', 'ggwp'),
(13, 'ggwp', '', 'ggwp', 'ggwp', 'ggwp'),
(14, 'ggwp', 'ggwp', 'ggwp', 'ggwp', 'ggwp'),
(15, 'ggwp', 'ggwp', 'ggwp', 'ggwp', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
