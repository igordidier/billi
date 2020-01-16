-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2020 at 02:34 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billi`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last` varchar(50) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `last`, `profile_image`, `bio`) VALUES
(1, 'ididier', 'igordidier69@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'igor ', 'didier', 'avatar.png', ''),
(7, 'test', 'igordidier6@gmail.com', '98877902e81c1a83b58eee2ff38dd17b', 'igor didier', 'didier', 'avatar.png', ''),
(8, 'igor', 'igordidier@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', 'didier', 'didier', 'avatar.png', ''),
(9, 'igor didier', 'didier69@gmail.com', '511e33b4b0fe4bf75aa3bbac63311e5a', ' didier', 'didier', 'avatar.png', ''),
(11, 'test2', 'qsd@ppo.Dqd', '511e33b4b0fe4bf75aa3bbac63311e5a', 'qsd', 'qsd', '1579185097-2019-07-13 182803-326598.JPG', 'Hellow My Name is igor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
