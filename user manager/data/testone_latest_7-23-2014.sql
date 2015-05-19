-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2014 at 11:42 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testone`
--
CREATE DATABASE IF NOT EXISTS `testone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testone`;

-- --------------------------------------------------------

--
-- Table structure for table `activerecordlog`
--

CREATE TABLE IF NOT EXISTS `activerecordlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `idModel` int(10) unsigned DEFAULT NULL,
  `field` varchar(45) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `activeRecordLog_FK1` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `activerecordlog`
--

INSERT INTO `activerecordlog` (`id`, `description`, `action`, `model`, `idModel`, `field`, `creationdate`, `userId`) VALUES
(1, 'User admin deleted User[4].', 'DELETE', 'User', 4, '', '2014-07-23 11:36:41', 1),
(2, 'User admin deleted User[3].', 'DELETE', 'User', 3, '', '2014-07-23 11:40:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `srs_users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) CHARACTER SET latin1 NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 NOT NULL,
  `type` tinyint(4) NOT NULL,
  `email` varchar(256) CHARACTER SET latin1 NOT NULL,
  `name` varchar(128) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `userStatus` tinyint(1) DEFAULT NULL,
  `registrationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lastLogin` datetime DEFAULT NULL,
  `expireDate` date DEFAULT NULL,
  `loginFlag` tinyint(1) DEFAULT '0',
  `sessionId` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `ipAddress` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `token` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Unique1` (`username`),
  UNIQUE KEY `Unique2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `srs_users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `email`, `name`, `phone`, `userStatus`, `registrationDate`, `lastLogin`, `expireDate`, `loginFlag`, `sessionId`, `ipAddress`, `token`) VALUES
(1, 'admin', 'c84258e9c39059a89ab77d846ddab909', 0, 'admin@ssss.com', 'saqib zafar', '', 1, '0000-00-00 00:00:00', '2014-07-23 11:13:40', '2012-06-30', 0, 'i5647fgu5435jso1dnmf20em26', '127.0.0.1', 'xj4Ss1i7XOkVUhRawWKvEednt');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
