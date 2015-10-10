-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2015 at 11:47 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `walk_me`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf32_bin NOT NULL,
  `password` varchar(255) COLLATE utf32_bin NOT NULL,
  `admin` int(4) unsigned NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `admin`, `created`, `modified`) VALUES
(1, 'aidenm@gmail.com', '$2y$10$tDOd4EwEdNxXG98E0EMlf.O6B8piioNo9yoU309D7I4e2VKNC1ntK', 1, '2015-10-10 10:15:56', '2015-10-10 10:15:56'),
(2, 'herp@derp.net', '$2y$10$5zgX8Zgfr/rYcNFfN7toYOT.OU3pDEtVxmddWFMREjgc.bVmiRxNe', 0, '2015-10-10 17:59:52', '2015-10-10 17:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `walkers`
--

CREATE TABLE IF NOT EXISTS `walkers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf32_bin NOT NULL,
  `password` varchar(255) COLLATE utf32_bin NOT NULL,
  `bio` text COLLATE utf32_bin NOT NULL,
  `active` tinyint(1) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `name` varchar(255) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `walkers`
--

INSERT INTO `walkers` (`id`, `email`, `password`, `bio`, `active`, `lat`, `lng`, `name`) VALUES
(1, 'test@test.me', '$2y$10$AHXFFW7QsAKd7LkrFDKHBugi3xpt89WAJ.xJ8zOaJlC6sNXJuMLru', '11th degree black belt in Muay Thai.', 1, 37.871208, -122.250282, 'Joe Schmoe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walkers`
--
ALTER TABLE `walkers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `walkers`
--
ALTER TABLE `walkers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
