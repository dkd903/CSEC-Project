-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2014 at 03:27 PM
-- Server version: 5.6.15
-- PHP Version: 5.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `am2`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `picurl`, `price`) VALUES
(1, 'black phone case', '4.jpg', 15),
(2, 'black android case', '5.jpg', 12),
(3, 'Jack Reacher Blu-Ray Disc', '1.jpg', 50),
(4, '007 skyfall dvd', '2.jpg', 20),
(5, 'guilt trip dvd', '3.jpg', 15),
(6, 'brother printer', '6.jpg', 130),
(7, 'canon projector', '7.jpg', 495),
(8, 'hitachi blender', '8.jpg', 60),
(9, 'computer cable', '9.jpg', 15),
(10, 'mouse & keyboard combo', '10.jpg', 29),
(11, 'keningston laptop lock', '11.jpg', 60),
(12, 'atok power adaptor', '12.jpg', 35),
(13, 'samsong smart watch', '13.jpg', 139),
(14, 'apple laptop stand', '14.jpg', 149),
(15, 'computer cabinet', '15.jpg', 265),
(16, 'plier tool set', '16.jpg', 69),
(17, 'artist record mic', '17.jpg', 159),
(18, 'learner guitar', '18.jpg', 116),
(19, 'casual watch', '19.jpg', 249),
(20, 'casio watch', '20.jpg', 160);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `prodid` int(10) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ccnumber` int(16) NOT NULL,
  `cvvnumber` int(4) NOT NULL,
  `expiry` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `level` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `passwd`, `level`) VALUES
(1, 'kk@kk.two', 'kaka', 1),
(2, 'mm@mm.two', 'mama', 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
