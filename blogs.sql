-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2016 at 05:51 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `cate` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `cate`) VALUES
(1, 'html'),
(2, 'css'),
(3, 'php');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `comm` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `author`, `comm`) VALUES
(50, '9', 'zihad', 'gggg'),
(51, '9', 'zihad', 'aaa'),
(52, '9', 'zihad', 'sss'),
(53, '9', 'zihad', 'sss'),
(54, '10', 'nahid', 'goood'),
(55, '10', 'nahid', 'bad'),
(56, '10', 'nahid', 'gf'),
(57, '10', 'nahid', 'sfsdf'),
(58, '10', 'nahid', 'aaaa'),
(59, '10', 'nahid', 'qqqqq'),
(60, '10', 'nahid', 'qqqqqqqqqqqq'),
(61, '10', 'nahid', 'qqqqqqqqqq'),
(62, '10', 'nahid', 'qqqqqqqqqqq'),
(63, '9', 'nahid', 'aaaaa'),
(64, '10', 'nahid', 'aaaaaaaaaaaaa'),
(65, '11', 'rafi', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `user_id` int(200) NOT NULL,
  `title` text NOT NULL,
  `dis` text NOT NULL,
  `author` text NOT NULL,
  `cat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `dis`, `author`, `cat`) VALUES
(9, 3, 'à¦ªà§à¦°à¦¿à§Ÿ à¦–à§‡à¦²à§‹à§Ÿà¦¾à§œ à¦°à¦¾à¦¨à¦†à¦‰à¦Ÿ à¦¹à¦²à§‡...', 'à¦ªà§à¦°à¦¿à§Ÿ à¦–à§‡à¦²à§‹à§Ÿà¦¾à§œ à¦°à¦¾à¦¨à¦†à¦‰à¦Ÿ à¦¹à¦²à§‡ à¦®à¦¨à¦Ÿà¦¾à¦‡ à¦–à¦¾à¦°à¦¾à¦ª à¦¹à§Ÿà§‡ à¦¯à¦¾à§Ÿà¥¤ à¦¯à§‡à¦¨ à¦®à¦¨ à¦–à¦¾à¦°à¦¾à¦ª à¦¨à¦¾ à¦¹à§Ÿ à¦¤à¦¾à¦‡ à¦à¦‡ à¦–à§‡à¦²à§‹à§Ÿà¦¾à§œà¦Ÿà¦¿à¦•à§‡ à¦¨à¦Ÿ à¦†à¦‰à¦Ÿ à¦•à¦°à§‡ à¦¸à§‡à¦‡ à¦›à¦¬à¦¿à¦Ÿà¦¿à¦° à¦¸à§à¦•à§à¦°à¦¿à¦¨à¦¶à¦Ÿ à¦•à¦®à§‡à¦¨à§à¦Ÿà§‡ à¦¶à§‡à§Ÿà¦¾à¦° à¦•à¦°à¥¤', 'zihad', 'html'),
(10, 3, 'à¦ªà§à¦£à§‡à¦¤à§‡ à¦šà¦¿à¦¨-à¦­à¦¾à¦°à¦¤ à¦¯à§Œà¦¥ à¦®à¦¹à¦¡à¦¼à¦¾ à¦šà¦²à¦›à§‡', 'à¦¤à¦¾à¦° à¦®à¦¾à¦à§‡à¦‡ à¦šà¦¿à¦¨à§‡ à¦­à¦¾à¦°à¦¤à§‡à¦° à¦¸à§‡à¦¨à¦¾à¦ªà§à¦°à¦§à¦¾à¦¨, à¦šà¦¿à¦¨à§‡à¦° à¦¶à§€à¦°à§à¦· à¦¸à§‡à¦¨à¦¾ à¦•à¦°à§à¦¤à¦¾à¦“ à¦­à¦¾à¦°à¦¤à§‡ à¦†à¦¸à¦›à§‡à¦¨, à¦…à¦¶à¦¨à¦¿ à¦¸à¦™à§à¦•à§‡à¦¤ à¦ªà¦¶à§à¦šà¦¿à¦® à¦¸à§€à¦®à¦¾à¦¨à§à¦¤à§‡à¦° à¦“ à¦ªà¦¾à¦°à§‡', 'zihad', 'html'),
(11, 6, 'Winter is here!!! Now', 'Winter is here!!! Now, It''s time to upgrade your wardrobe with trendy outfits. New stylish Full Sleeve Shirts are now available on Kiksha. Only Taka 599. Just order online', 'rafi', 'php');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE IF NOT EXISTS `reg` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `name`, `email`, `password`) VALUES
(3, 'zihad', 'zihad@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'nahid', 'nahid@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'rafi', 'rafi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
