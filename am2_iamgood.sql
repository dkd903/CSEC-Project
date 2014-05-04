-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2014 at 10:56 PM
-- Server version: 5.6.16
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `am2_iamgood`
--

-- --------------------------------------------------------

--
-- Table structure for table `cookiedata`
--

CREATE TABLE IF NOT EXISTS `cookiedata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(100) NOT NULL,
  `cookiedata` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cookiedata`
--

INSERT INTO `cookiedata` (`id`, `ref`, `cookiedata`, `date`) VALUES
(1, 'http://amazon.two/product.php?product=3', '{"cc":"1231231231234455; cvv=123; cctype=visa; expiry=04/21/2019; email=kk@kk.two"}', '2014-05-04 22:55:19'),
(2, 'http://amazon.two/product.php?product=3', '{"cc":"1231231231234455; cvv=123; cctype=visa; expiry=04/21/2019; email=kk@kk.two"}', '2014-05-04 22:55:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
