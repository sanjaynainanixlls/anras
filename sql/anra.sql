-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2016 at 11:28 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `anra`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `createdTime` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `phoneNumber`, `city`, `numberOfPeople`, `dateOfArrival`, `dateOfDeparture`, `roomNumberAllotted`, `isCheckout`, `amountPaid`, `createdBy`, `createdTime`) VALUES
(1, 'guest1', '9999999999', 'Jaipur', '5', '10/1/2016', '10/2/2016', '101', '0', '500', 2, '10/1/2016 12:00:00'),
(2, 'guest2', '8888888888', 'Delhi', '10', '10/5/2016', '10/6/2016', '102', '0', '1000', 2, '10/5/2016 13:00:00'),
(3, 'guest3', '7777777777', 'Jaipur', '2', '10/2/2016', '10/3/2016', '', '1', '200', 2, '10/2/2016 14:00:00'),
(4, 'guest4', '9999999999', 'Mumbai', '6', '10/10/2016', '10/12/2016', '103', '0', '600', 2, '10/10/2016 14:00:00'),
(5, 'guest5', '8888888888', 'Kanpur', '10', '10/5/2016', '10/6/2016', '', '1', '1000', 2, '10/5/2016 14:00:00'),
(6, 'guest6', '7777777777', 'Bangalore', '2', '10/2/2016', '10/3/2016', '103', '1', '200', 2, '10/2/2016 14:00:00'),
(7, 'sss', '9533456416', 'sas', '11', '11/11/2014', '11/11/2015', NULL, NULL, '550', 2, '2016-10-09 14:12:41'),
(8, 'SANJAY', '8787878787', 'SOMECITY', '5', '2016-10-09', '2016-10-10', NULL, NULL, '250', 0, '2016-10-09 14:39:33'),
(9, 'sanjit', '1112131411', 'gdjhgd', '11', '2016-10-09', '2018-10-10', NULL, NULL, '550', 2, '2016-10-09 14:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guestUserId` int(11) DEFAULT NULL,
  `mattress` int(11) DEFAULT NULL,
  `pillow` int(11) DEFAULT NULL,
  `bedsheet` int(11) DEFAULT NULL,
  `quilt` int(11) DEFAULT NULL,
  `key` int(11) DEFAULT NULL,
  `totalAmount` int(11) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `createdTime` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `guestUserId`, `mattress`, `pillow`, `bedsheet`, `quilt`, `key`, `totalAmount`, `createdBy`, `createdTime`) VALUES
(1, 1, 1, 1, 1, 1, 1, 500, 3, '10/01/2016 12:00:00'),
(2, 2, 2, 2, 2, 2, 1, 900, 3, '10/01/2016 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomNumber` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `occupied` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin#123', 'ADMIN'),
(2, 'sanjay', 'sanjay', 'sanjay#123', 'RECEPTION'),
(3, 'aman', 'aman', 'aman#123', 'INVENTORY');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
