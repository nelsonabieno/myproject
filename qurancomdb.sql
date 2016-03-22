-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2016 at 10:52 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qurancomdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(150) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `video_id` int(10) NOT NULL,
  `rate` int(10) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`sn`, `user_id`, `video_id`, `rate`) VALUES
(8, 73, 1617, 0),
(9, 73, 1300, 0),
(10, 73, 1330, 0),
(11, 73, 1169, 0),
(12, 46, 1507, 0),
(13, 82, 1868, 0),
(14, 55, 1815, 0),
(15, 73, 1150, 0),
(16, 47, 1900, 5),
(17, 73, 1900, 0),
(18, 73, 1900, 4),
(19, 47, 1900, 1),
(20, 46, 1900, 2),
(21, 46, 1900, 5),
(22, 46, 1900, 1),
(23, 46, 1900, 3),
(24, 46, 1900, 2),
(25, 46, 1900, 1),
(26, 46, 1900, 5),
(27, 46, 1900, 5),
(28, 46, 1859, 0),
(29, 46, 1859, 4),
(30, 73, 1859, 1),
(31, 73, 1289, 0),
(32, 73, 1289, 5),
(33, 73, 1289, 3),
(34, 37, 1289, 5),
(35, 37, 1289, 2),
(36, 37, 1289, 2),
(37, 37, 1289, 2),
(38, 37, 1289, 1),
(39, 98, 1289, 3),
(40, 98, 1289, 2),
(41, 98, 1868, 2),
(42, 98, 1169, 2),
(43, 98, 1169, 2),
(44, 98, 1169, 2),
(45, 98, 1507, 2),
(46, 98, 1868, 2),
(47, 98, 1507, 2);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(50) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `phone_number` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date_added` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fullname`, `phone_number`, `email`, `date_added`, `username`, `password`, `status`) VALUES
(8, 'bala', '090948373222', 'mymy@gmail.com', '12:21:49', 'mymy', '79048d45ea12b3a6906306d39fecccfd', 0),
(32, 'jkoaoaoasa', '0908762222', 'boboasdadadasd', '09-01-2016', 'sadadasdsa', 'e6aefa73930ec292fec0ee72c5489047', 0),
(46, 'klose', 'podoski', 'podoski@yahoo.com', '09-01-2016', 'podoski', 'd7a646ee768a10d54542332847b3b487', 0),
(47, 'qurancom milestone', '090873738222', 'qurancom@gmail.com', '20-01-2016', 'qurancom', '2a89e340432114ccc94eeac9736c28a2', 0),
(49, 'jesse', '0801236738', 'jesseking@ridemail.com', '16-01-09', 'jesseking', 'c73f8edcb1f21419ac87bf56925f3614', 0),
(55, 'sdasdas', 'asdasdas', 'asdf@gmail.com', '09-01-2016', 'asdsdas', '912ec803b2ce49e4a541068d495ab570', 0),
(73, 'james onatere', '08063282919', 'police@gmail.com', '00-01-90', 'police', '814989b983fd853fb374e1676a06ade4', 0),
(82, 'crayony', '090237364833', 'nelson@gmail.com', 'SatSat-JanJan-20162016', 'nelson', 'a4e360681676c770121e891f8c407572', 0),
(94, 'asdasda', '090888822222', 'lucaspodoski@gmail.com', '11-01-2016', 'barley', 'd7a646ee768a10d54542332847b3b487', 0),
(96, 'pleasant', '080723388899', 'pleasant@ymail.com', '08-01-16', 'customer', 'dc3cf3c2450ddc28f0386e50433e852a', 0),
(98, 'Ahmed Saliu', '07037819170', 'saliu.lito@gmail.com', '22-01-2016', 'asaliu', '67f78137a7c6f9cd55a4c74ebc01b4ff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `status` int(10) NOT NULL,
  `date_uploaded` varchar(50) NOT NULL,
  `rate` int(5) NOT NULL,
  `video_id` int(10) NOT NULL,
  `raterstotal` int(11) NOT NULL,
  PRIMARY KEY (`sn`),
  UNIQUE KEY `id` (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`sn`, `id`, `video_url`, `status`, `date_uploaded`, `rate`, `video_id`, `raterstotal`) VALUES
(16, 73, '1_-_Intro_to_the_Course2.mp4', 0, '19-01-2016', 0, 1617, 0),
(17, 73, '12_-_Transferring_data_to_views1.mp4', 0, '19-01-2016', 0, 1300, 0),
(18, 73, '4_-_Installing_CodeIgniter1.mp4', 0, '19-01-2016', 0, 1330, 0),
(19, 73, '13_-_Intro_to_the_CRUD.mp4', 0, '19-01-2016', 1, 1169, 4),
(20, 46, '2_what-is-hybrid.mp4', 0, '19-01-2016', 1, 1507, 3),
(21, 82, '5_ionic-playground.mp4', 0, '19-01-2016', 1, 1868, 3),
(22, 55, '3_why-ionic.mp4', 0, '19-01-2016', 0, 1815, 0),
(23, 73, '4_getting-the-best.mp4', 0, '19-01-2016', 0, 1150, 0),
(24, 47, '3_Exercises_that_Nurture_the_Creative_Spark.mp4', 0, '20-01-2016', 2, 1900, 0),
(25, 46, 'clip_124.mp4', 0, '21-01-2016', 1, 1859, 3),
(26, 73, '9_-_Creating_the_users_controller_and_creating_a_user_model_method.mp4', 0, '21-01-2016', 2, 1289, 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
