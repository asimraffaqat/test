-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2014 at 12:32 PM
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
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 NOT NULL,
  `type` tinyint(4) NOT NULL,
  `userStatus` tinyint(1) DEFAULT NULL,
  `registrationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lastLogin` datetime DEFAULT NULL,
  `expireDate` date DEFAULT NULL,
  `loginFlag` tinyint(1) DEFAULT '0',
  `sessionId` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `ipAddress` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `token` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Unique1` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `type`, `userStatus`, `registrationDate`, `lastLogin`, `expireDate`, `loginFlag`, `sessionId`, `ipAddress`, `token`) VALUES
(1, 'admin', 'admin@admin.com', 'c84258e9c39059a89ab77d846ddab909', 0, 1, '2014-06-23 14:00:00', '2014-07-02 02:18:58', '2012-06-30', 0, 'p18ht5ekng6choil9el713odm1', '127.0.0.1', 'xj4Ss1i7XOkVUhRawWKvEednt');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
