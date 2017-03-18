-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2016 at 06:48 PM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anra`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phoneNumber` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `numberOfPeople` varchar(45) DEFAULT NULL,
  `dateOfArrival` varchar(45) DEFAULT NULL,
  `dateOfDeparture` varchar(45) DEFAULT NULL,
  `roomNumberAllotted` varchar(45) DEFAULT NULL,
  `isCheckout` varchar(45) DEFAULT NULL,
  `amountPaid` varchar(45) DEFAULT NULL,
  `createdBy` int(11) NOT NULL,
  `createdTime` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `phoneNumber`, `city`, `numberOfPeople`, `dateOfArrival`, `dateOfDeparture`, `roomNumberAllotted`, `isCheckout`, `amountPaid`, `createdBy`, `createdTime`) VALUES
(1, 'guest1', '9999999999', 'Jaipur', '5', '10/1/2016', '10/2/2016', '101', '0', '500', 2, '10/1/2016 12:00:00'),
(2, 'guest2', '8888888888', 'Delhi', '10', '10/5/2016', '10/6/2016', '102', '0', '1000', 2, '10/5/2016 13:00:00'),
(3, 'guest3', '7777777777', 'Jaipur', '2', '10/2/2016', '10/3/2016', '103', '1', '200', 2, '10/2/2016 14:00:00'),
(4, 'guest4', '9999999999', 'Mumbai', '6', '10/10/2016', '10/12/2016', '103', '0', '600', 2, '10/10/2016 14:00:00'),
(5, 'guest5', '8888888888', 'Kanpur', '10', '10/5/2016', '10/6/2016', '102', '1', '1000', 2, '10/5/2016 14:00:00'),
(6, 'guest6', '7777777777', 'Bangalore', '2', '10/2/2016', '10/3/2016', '103', '1', '200', 2, '10/2/2016 14:00:00'),
(7, 'asa', '545454', 'asa', '3', '2016-10-01', '2016-10-06', NULL, NULL, '150', 0, ''),
(8, 'aman', '9680303337', 'delhi', '3', '2016-10-01', '2016-10-07', NULL, NULL, '150', 0, ''),
(9, 'aman', '9680303337', 'delhi', '3', '2016-10-01', '2016-10-07', NULL, NULL, '150', 0, ''),
(10, 'aman', '9475475854', 'jaipur', '4', '2016-10-01', '2016-10-13', NULL, NULL, '200', 0, '2016-10-01 19:51:05'),
(11, 'aas', '6565656565', 'asa', '3', '2016-10-01', '2016-10-23', NULL, NULL, '150', 0, '2016-10-01 19:54:08'),
(12, 'sasa', '4545453434', 'assa', '4', '2016-10-01', '2016-10-21', NULL, NULL, '200', 1, '2016-10-01 20:06:17'),
(13, 'sanajy', '9485748574', 'kjhau', '3', '2016-10-09', '2016-10-18', NULL, NULL, '150', 2, '2016-10-09 15:44:43'),
(14, 'sanjit', '9485459479', 'ajhjsa', '5', '2016-10-09', '2016-10-22', NULL, NULL, '250', 2, '2016-10-09 17:41:49'),
(15, 'amy', '9758748578', 'delhi', '4', '2016-10-09', '2016-10-22', NULL, NULL, '200', 2, '2016-10-09 18:54:56'),
(16, 'amy', '9787485784', 'new Delhi', '5', '2016-10-09', '2016-10-14', NULL, NULL, '250', 2, '2016-10-09 18:55:51'),
(17, 'asasa', '2584758748', 'sdnj', '4', '2016-10-09', '2016-10-22', NULL, NULL, '200', 2, '2016-10-09 19:00:05'),
(18, 'asasa', '2584758748', 'sdnj', '4', '2016-10-09', '2016-10-22', NULL, NULL, '200', 2, '2016-10-09 19:06:11'),
(19, 'asasa', '2584758748', 'sdnj', '4', '2016-10-09', '2016-10-22', NULL, NULL, '200', 2, '2016-10-09 19:06:17'),
(20, 'asasa', '2584758748', 'sdnj', '4', '2016-10-09', '2016-10-22', NULL, NULL, '200', 2, '2016-10-09 19:06:30'),
(21, 'asasa', '2584758748', 'sdnj', '4', '2016-10-09', '2016-10-22', NULL, NULL, '200', 2, '2016-10-09 19:13:40'),
(22, 'asasa', '2584758748', 'sdnj', '4', '2016-10-09', '2016-10-22', NULL, NULL, '200', 2, '2016-10-09 19:14:33'),
(23, 'asasa', '2584758748', 'sdnj', '4', '2016-10-09', '2016-10-22', NULL, NULL, '200', 2, '2016-10-09 19:15:32'),
(24, 'asasa', '2584758748', 'sdnj', '4', '2016-10-09', '2016-10-22', NULL, NULL, '200', 2, '2016-10-09 19:17:02'),
(25, 'asasa', '2584758748', 'sdnj', '4', '2016-10-09', '2016-10-22', NULL, NULL, '200', 2, '2016-10-09 19:17:45'),
(26, 'asasa', '2584758748', 'sdnj', '4', '2016-10-09', '2016-10-22', NULL, NULL, '200', 2, '2016-10-09 19:18:12'),
(27, 'sanju', '8758475847', 'pune', '3', '2016-10-09', '2016-10-14', NULL, NULL, '150', 2, '2016-10-09 19:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `guestUserId` int(11) DEFAULT NULL,
  `mattress` int(11) DEFAULT NULL,
  `pillow` int(11) DEFAULT NULL,
  `bedsheet` int(11) DEFAULT NULL,
  `quilt` int(11) DEFAULT NULL,
  `lockNkey` int(11) DEFAULT NULL,
  `totalAmount` int(11) DEFAULT NULL,
  `isReturned` int(11) NOT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `createdTime` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `guestUserId`, `mattress`, `pillow`, `bedsheet`, `quilt`, `lockNkey`, `totalAmount`, `isReturned`, `createdBy`, `createdTime`) VALUES
(1, 1, 1, 1, 1, 1, 1, 500, 0, 3, '10/01/2016 12:00:00'),
(2, 2, 2, 2, 2, 2, 1, 900, 0, 3, '10/01/2016 12:00:00'),
(3, 4, 1, 1, 1, 1, 1, 500, 0, 3, '2016-10-09 21:00:38'),
(4, 5, 10, 1, 1, 1, 1, 1400, 0, 3, '2016-10-09 21:04:05'),
(5, 4, 3, 3, 3, 3, 3, 1500, 0, 3, '2016-10-09 21:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `roomNumber` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `occupied` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomNumber`, `capacity`, `occupied`, `city`) VALUES
(1, 100, 10, 5, 'Jaipur,Delhi'),
(2, 101, 20, 10, 'Mumbai,Balngalore');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin#123', 'ADMIN'),
(2, 'sanjay', 'sanjay', 'sanjay#123', 'RECEPTION'),
(3, 'aman', 'aman', 'aman#123', 'INVENTORY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
