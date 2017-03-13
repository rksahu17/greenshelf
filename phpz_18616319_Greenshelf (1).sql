-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql105.phpzilla.net
-- Generation Time: Aug 04, 2016 at 03:33 AM
-- Server version: 5.6.25-73.1
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpz_18616319_Greenshelf`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE IF NOT EXISTS `buyer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `s1` int(5) DEFAULT NULL,
  `s2` int(5) DEFAULT NULL,
  `s3` int(5) DEFAULT NULL,
  `s4` int(5) DEFAULT NULL,
  `s5` int(5) DEFAULT NULL,
  `s6` int(5) DEFAULT NULL,
  `s7` int(5) DEFAULT NULL,
  `s8` int(5) DEFAULT NULL,
  `s9` int(5) DEFAULT NULL,
  `s10` int(5) DEFAULT NULL,
  `s11` int(5) DEFAULT NULL,
  `s12` int(5) DEFAULT NULL,
  `s13` int(5) DEFAULT NULL,
  `s14` int(5) DEFAULT NULL,
  `s15` int(5) DEFAULT NULL,
  `s16` int(5) DEFAULT NULL,
  `s17` int(5) DEFAULT NULL,
  `s18` int(5) DEFAULT NULL,
  `s19` int(5) DEFAULT NULL,
  `s20` int(5) DEFAULT NULL,
  `s21` int(5) DEFAULT NULL,
  `s22` int(5) DEFAULT NULL,
  `s23` int(5) DEFAULT NULL,
  `s24` int(5) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `date_comp` date DEFAULT NULL,
  `verified` int(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14011614 ;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `s7`, `s8`, `s9`, `s10`, `s11`, `s12`, `s13`, `s14`, `s15`, `s16`, `s17`, `s18`, `s19`, `s20`, `s21`, `s22`, `s23`, `s24`, `date_order`, `exp_date`, `date_comp`, `verified`) VALUES
(14011249, 1, 0, 0, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2016-08-04', '2016-08-11', '0000-00-00', 1),
(111111, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-08-04', '2016-08-11', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `dat` date NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `dat`, `comment`) VALUES
(7, '2016-08-03', 'looking nice bros');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `s1` int(5) DEFAULT NULL,
  `s2` int(5) DEFAULT NULL,
  `s3` int(5) DEFAULT NULL,
  `s4` int(5) DEFAULT NULL,
  `s5` int(5) DEFAULT NULL,
  `s6` int(5) DEFAULT NULL,
  `s7` int(5) DEFAULT NULL,
  `s8` int(5) DEFAULT NULL,
  `s9` int(5) DEFAULT NULL,
  `s10` int(5) DEFAULT NULL,
  `s11` int(5) DEFAULT NULL,
  `s12` int(5) DEFAULT NULL,
  `s13` int(5) DEFAULT NULL,
  `s14` int(5) DEFAULT NULL,
  `s15` int(5) DEFAULT NULL,
  `s16` int(5) DEFAULT NULL,
  `s17` int(5) DEFAULT NULL,
  `s18` int(5) DEFAULT NULL,
  `s19` int(5) DEFAULT NULL,
  `s20` int(5) DEFAULT NULL,
  `s21` int(5) DEFAULT NULL,
  `s22` int(5) DEFAULT NULL,
  `s23` int(5) DEFAULT NULL,
  `s24` int(5) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `date_comp` date DEFAULT NULL,
  `verified` int(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144554120 ;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `s7`, `s8`, `s9`, `s10`, `s11`, `s12`, `s13`, `s14`, `s15`, `s16`, `s17`, `s18`, `s19`, `s20`, `s21`, `s22`, `s23`, `s24`, `date_order`, `date_comp`, `verified`) VALUES
(14011613, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2016-08-04', '0000-00-00', 1),
(14011237, 1, 0, 0, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-08-04', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `s1` int(100) DEFAULT NULL,
  `s2` int(100) DEFAULT NULL,
  `s3` int(100) DEFAULT NULL,
  `s4` int(100) DEFAULT NULL,
  `s5` int(100) DEFAULT NULL,
  `s6` int(100) DEFAULT NULL,
  `s7` int(100) DEFAULT NULL,
  `s8` int(100) DEFAULT NULL,
  `s9` int(100) DEFAULT NULL,
  `s10` int(100) DEFAULT NULL,
  `s11` int(100) DEFAULT NULL,
  `s12` int(100) DEFAULT NULL,
  `s13` int(100) DEFAULT NULL,
  `s14` int(100) DEFAULT NULL,
  `s15` int(100) DEFAULT NULL,
  `s16` int(100) DEFAULT NULL,
  `s17` int(100) DEFAULT NULL,
  `s18` int(100) DEFAULT NULL,
  `s19` int(100) DEFAULT NULL,
  `s20` int(100) DEFAULT NULL,
  `s21` int(100) DEFAULT NULL,
  `s22` int(100) DEFAULT NULL,
  `s23` int(100) DEFAULT NULL,
  `s24` int(100) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `s7`, `s8`, `s9`, `s10`, `s11`, `s12`, `s13`, `s14`, `s15`, `s16`, `s17`, `s18`, `s19`, `s20`, `s21`, `s22`, `s23`, `s24`, `date_order`) VALUES
(1, 9, 10, 10, 9, 10, 9, 9, 9, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 9, '2016-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `rollno` int(10) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `hall` varchar(30) DEFAULT NULL,
  `roomno` int(4) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `hash` varchar(34) DEFAULT NULL,
  `verified` int(4) DEFAULT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollno`, `name`, `phone`, `email`, `hall`, `roomno`, `address`, `hash`, `verified`) VALUES
(111111, 'kamini', 987656789, 'imkamini66@gmail.com', 'Day Scholar', 0, '', 'd3c921a0cc66c1753a25ccfd652fa97f', 1),
(14011237, 'Rashmi', 456789876, 'senapatirashmiranjan@gmail.com', 'Day Scholar', 0, '', '901f5a6276c76c8a1a285d9a8e91dc94', 0),
(14011613, 'sanjay', 78987656, 'isanjayrockzz@gmail.com', 'Day Scholar', 0, '', '3c7d73c176a94fa44b09d1128e77ba97', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
