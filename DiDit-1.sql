-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2013 at 10:18 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DiDit`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `address1` varchar(15) NOT NULL,
  `address2` varchar(15) NOT NULL,
  `state` char(2) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(10) NOT NULL,
  `locationId` int(100) NOT NULL,
  `description` text NOT NULL,
  `createDate` datetime NOT NULL,
  `dueDate` datetime NOT NULL,
  `priority` int(10) NOT NULL,
  `status` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `userId`, `locationId`, `description`, `createDate`, `dueDate`, `priority`, `status`) VALUES
(4, 1, 32, 'RedBox', '2013-12-05 15:50:00', '2013-12-06 19:00:00', 9, ''),
(5, 12, 50, 'FedEx', '2013-12-05 15:49:00', '2013-12-06 18:59:00', 9, 'pending'),
(6, 12, 40, 'Grocery Store', '2013-12-05 15:50:00', '2013-12-06 19:00:00', 9, ''),
(7, 1, 0, 'hfdkjssf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, ''),
(8, 1, 0, 'jkdfkjsdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, ''),
(9, 1, 0, 'djkafsd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, ''),
(10, 1, 0, 'dsjkfsdakd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, ''),
(11, 1, 0, 'djkafsd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, ''),
(12, 1, 0, 'dsjkfsdakd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, ''),
(13, 1, 0, 'Pester Steve', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, ''),
(14, 1, 0, 'rm /*', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `testTable`
--

CREATE TABLE `testTable` (
  `testfield` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testTable`
--

INSERT INTO `testTable` (`testfield`) VALUES
('PotterPott'),
('Pots'),
('MattPot'),
('tester'),
('testGield'),
(''),
('secondtola'),
('mama');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` char(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `userName`, `firstName`, `lastName`, `password`, `email`) VALUES
(1, 'carson', 'carson', 'herrington', '??????????', 'carson@herrington.com'),
(12, 'smartalec', 'alec', 'lopez', '??????????', 'smartalec@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
