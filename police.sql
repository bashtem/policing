-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 07:38 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `police`
--

-- --------------------------------------------------------

--
-- Table structure for table `caution_form`
--

CREATE TABLE IF NOT EXISTS `caution_form` (
  `station` varchar(255) NOT NULL,
  `command` varchar(255) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `sex` varchar(25) NOT NULL,
  `age` varchar(25) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `nation` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `force_id` varchar(25) NOT NULL,
  `interpreter` varchar(255) NOT NULL,
  `recorder` varchar(255) NOT NULL,
  `date` varchar(25) NOT NULL,
  `time` varchar(256) NOT NULL,
  `comments` text NOT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `offence` varchar(25) NOT NULL,
  `remark` varchar(25) NOT NULL DEFAULT 'pending',
  `national_id` varchar(25) DEFAULT NULL,
  `driver_lincense` varchar(25) DEFAULT NULL,
  `int_passport` varchar(25) DEFAULT NULL,
  `lasra_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cell_board`
--

CREATE TABLE IF NOT EXISTS `cell_board` (
  `date_detained` varchar(255) DEFAULT NULL,
  `date_released` varchar(255) DEFAULT NULL,
  `time_detained` varchar(255) DEFAULT NULL,
  `time_released` varchar(255) DEFAULT NULL,
  `detention` varchar(25) NOT NULL,
  `offence` varchar(128) DEFAULT NULL,
  `caution_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipo`
--

CREATE TABLE IF NOT EXISTS `ipo` (
  `force_id` varchar(255) NOT NULL,
  `password` varchar(512) DEFAULT NULL,
  `level` varchar(25) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `rank` varchar(25) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_in`
--

CREATE TABLE IF NOT EXISTS `log_in` (
  `id` int(255) NOT NULL,
  `login_date` varchar(255) DEFAULT NULL,
  `login_time` varchar(255) DEFAULT NULL,
  `force_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_out`
--

CREATE TABLE IF NOT EXISTS `log_out` (
  `id` int(255) NOT NULL,
  `force_id` varchar(25) DEFAULT NULL,
  `logout_date` varchar(25) NOT NULL,
  `logout_time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `information` varchar(255) NOT NULL,
  `force_id` varchar(255) NOT NULL,
  `date` varchar(25) NOT NULL,
  `time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plain_form`
--

CREATE TABLE IF NOT EXISTS `plain_form` (
  `station` varchar(255) NOT NULL,
  `command` varchar(255) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `sex` varchar(25) NOT NULL,
  `age` varchar(25) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `nation` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `force_id` varchar(25) NOT NULL,
  `interpreter` varchar(255) NOT NULL,
  `recorder` varchar(255) NOT NULL,
  `date` varchar(25) NOT NULL,
  `time` varchar(256) NOT NULL,
  `comments` text NOT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `national_id` varchar(25) DEFAULT NULL,
  `driver_lincense` varchar(25) DEFAULT NULL,
  `int_passport` varchar(25) DEFAULT NULL,
  `lasra_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
  `time` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `sender_id` varchar(25) NOT NULL,
  `receiver_id` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `checked` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ipo`
--
ALTER TABLE `ipo`
  ADD PRIMARY KEY (`force_id`);

--
-- Indexes for table `log_in`
--
ALTER TABLE `log_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_out`
--
ALTER TABLE `log_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plain_form`
--
ALTER TABLE `plain_form`
  ADD PRIMARY KEY (`telephone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_in`
--
ALTER TABLE `log_in`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_out`
--
ALTER TABLE `log_out`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
