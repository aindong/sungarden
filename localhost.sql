-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2014 at 08:23 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sungarden`
--
CREATE DATABASE IF NOT EXISTS `sungarden` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sungarden`;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `messageDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `messageName` varchar(50) NOT NULL,
  `messageEmail` varchar(65) NOT NULL,
  `messageContent` mediumtext NOT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `messageDate`, `messageName`, `messageEmail`, `messageContent`) VALUES
(1, '2014-01-23 02:07:19', 'test', 'test@yahoo.com', 'you''ve got great service in there');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `reservationID` int(11) NOT NULL AUTO_INCREMENT,
  `checkIn` varchar(20) NOT NULL,
  `checkOut` varchar(20) NOT NULL,
  `roomID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `totalPrice` double NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`reservationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationID`, `checkIn`, `checkOut`, `roomID`, `firstName`, `lastName`, `contactNo`, `address`, `email`, `totalPrice`, `status`) VALUES
(3, '01/21/2014', '01/22/2014', 8, 'testName', 'testLast', '0999999', 'testAddress', 'test@yahoo.com', 1800, 'Checked-Out'),
(4, '01/22/2014', '01/24/2014', 9, 'hello', 'hello', '55055555', '5568 fairway, forest drive', 'asdasd@yahoo.com', 3600, 'Checked-In'),
(6, '01/21/2014', '01/22/2014', 8, 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 1800, 'Checked-Out'),
(7, '01/21/2014', '01/22/2014', 9, 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 1800, 'Checked-Out'),
(8, '01/21/2014', '01/22/2014', 9, 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 1800, 'Checked-Out'),
(9, '01/21/2014', '01/22/2014', 8, 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 1800, 'Checked-Out'),
(10, '01/21/2014', '01/22/2014', 9, 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 1800, 'Checked-Out'),
(11, '01/21/2014', '01/22/2014', 9, 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 'Walk-In', 1800, 'Checked-Out');

-- --------------------------------------------------------

--
-- Table structure for table `room_inventory`
--

CREATE TABLE IF NOT EXISTS `room_inventory` (
  `roomID` int(5) NOT NULL AUTO_INCREMENT,
  `roomType` varchar(30) NOT NULL,
  `maxPerson` int(5) NOT NULL,
  `roomPrice` double NOT NULL,
  `roomStock` int(5) NOT NULL,
  `roomImage` varchar(120) NOT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `room_inventory`
--

INSERT INTO `room_inventory` (`roomID`, `roomType`, `maxPerson`, `roomPrice`, `roomStock`, `roomImage`) VALUES
(8, 'test5', 2, 1800, 1, '2-2.png'),
(9, 'testRoom', 5, 1800, 18, 'chibi_sura_by_ikr-d36ezuc.png');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE IF NOT EXISTS `useraccount` (
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`username`, `password`, `firstName`, `lastName`, `middleName`, `role`) VALUES
('admin', 'admin', 'myname', 'mylast', 'mymiddle', 'Admin'),
('test', 'test', 'test1', 'test3', 'test2', 'Receptionist');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
