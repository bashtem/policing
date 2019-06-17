-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2017 at 12:40 PM
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
-- Table structure for table `case_file`
--

CREATE TABLE IF NOT EXISTS `case_file` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `passport` varchar(255) NOT NULL,
  `offence` varchar(25) NOT NULL,
  `remark` varchar(25) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caution_form`
--

INSERT INTO `caution_form` (`station`, `command`, `fname`, `lname`, `sex`, `age`, `occupation`, `religion`, `nation`, `address`, `telephone`, `email`, `force_id`, `interpreter`, `recorder`, `date`, `time`, `comments`, `passport`, `offence`, `remark`) VALUES
('OJO', 'OGUN', 'SHADE', 'TEMI', 'F', '30', 'TRADER', 'christainity', 'AFG', 'No 1 olagoke akano street', '09091199324', '', '123456', 'SAYO', 'BLESSING', '30/01/17 / 10:55:01', '1485813235', '', '', 'cheating', 'u.i'),
('ABA', 'OGUN', 'PRESTO', 'KELVIN', 'M', '45', 'LAWYER', 'islam', 'AFG', 'No 1 olagoke akano street', '08034566677', '', '123456', 'ISAIH', 'LUTH', '31/01/17 / 12:05:01', '1485817399', 'YES I AM GUILTY OF THE OFFENCE PLEASE HELP MEEEEEEEE', '', 'murder', 'u.i'),
('OJO', 'LAGOS STATE', 'TOBI', 'JOHN', 'M', '23', 'ENGINEER', 'traditional', 'NGA', 'No 1 olagoke akano street', '08098898897', 'tobi@yahoo.com', '123456', 'TOBI', 'TOBI', '05/02/17 / 12:03:02', '1486292272', 'I am a native of badagry lagos state i attended st.anthony primary school at badagry lagos state, i attended st.anthony secondary school at badagry lagos state, presently i am into phone accessory in alaba international market on the 2nd of january 2017 Mr segun gave me sum of 20,000 naira to buy a phone for him which i could not able to buy the phone and return the money to him also. ', '', 'Stealing', 'released');

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

--
-- Dumping data for table `cell_board`
--

INSERT INTO `cell_board` (`date_detained`, `date_released`, `time_detained`, `time_released`, `detention`, `offence`, `caution_time`) VALUES
('12/02/17', '12/02/17', '1486937153', '1486939140', 'released', 'Stealing', '1486292272'),
('07/02/17', NULL, '1486451049', NULL, 'detained', 'cheating', '1485813235'),
('12/02/17', '12/02/17', '1486936940', '1486936921', 'detained', 'murder', '1485817399');

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

--
-- Dumping data for table `ipo`
--

INSERT INTO `ipo` (`force_id`, `password`, `level`, `fname`, `lname`, `rank`, `email`, `division`, `section`, `state`, `telephone`, `sex`, `passport`, `active`) VALUES
('123455', '4acb4bc224acbbe3c2bfdcaa39a4324e', NULL, 'Seun', 'Olabanjo', '', 'topeadebass@yahoo.com', 'ogun', 'Anti Robbery', 'Osun', '08167978222', 'M', 'profile/mpolice.jpg', 0),
('123456', '0192023a7bbd73250516f069df18b500', '1', 'Basit', 'Tope', '', 'topeadebass@yahoo.com', 'ojo', 'Respond Monitor', 'Oyo', '08167978222', 'M', 'profile/mpolice.jpg', 1),
('123457', 'bbad8d72c1fac1d081727158807a8798', NULL, 'Tunde', 'Aminu', '', 'bashtem4fun@yahoo.com', 'uyo', 'Respond Monitor', 'Jigawa', '09091199345', 'M', 'profile/mpolice.jpg', 1),
('234456', '1d59f6999193c164b4f85f4a5c037384', NULL, 'SEGUN', 'TOMI', '', 'topeadebass@yahoo.com', 'OJO', 'D.C.B', 'Lagos', '08080808089', 'M', 'profile/male.jpg', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `subject`, `information`, `force_id`, `date`, `time`) VALUES
(9, 'Rapping', '4 guys raped a girl in department of ART LASU.', 'admin', '22/12/16 11:19:34', '1482401974'),
(10, 'Robbery', ' 2 thieves robbing at idiorogbo street opposite lasu gate.', 'admin', '22/12/16 11:22:09', '1482402129'),
(12, 'BOKO HARAM', 'bomb killed 50 people, 200 injured near oyelami street caused by boko haram.', 'admin', '03/01/17 01:04:29', '1483401869');

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
  `passport` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plain_form`
--

INSERT INTO `plain_form` (`station`, `command`, `fname`, `lname`, `sex`, `age`, `occupation`, `religion`, `nation`, `address`, `telephone`, `email`, `force_id`, `interpreter`, `recorder`, `date`, `time`, `comments`, `passport`) VALUES
('ABA', 'IDI ORO', 'BOLA', 'AJIKE', 'F', '21', 'STUDENT', 'islam', 'AFG', 'IBA STREET', '08097878899', '', '123456', 'JOHN', 'JOY', '31/01/17 / 02:43:01', '1485870202', 'YES YES YES YES ..............', ''),
('OJO', 'OGUN', 'Basit', 'Tope', 'M', '24', 'STUDENT', 'islam', 'AFG', 'No 1 olagoke akano street', '08167822222', '', '123456', 'MAKIN', 'JOHN', '30/01/17 / 10:53:01', '1485813235', 'HE IS A THIEF PLS HELP', ''),
('OJO', 'LAGOS STATE', 'ADEWOLE', 'OLASEGUN', 'M', '31', 'STUDENT', 'traditional', 'NGA', 'NO 1 IDIOROGBO STREET', '09098876564', 'segun4real@yahoo.com', '123456', 'SEGUN', 'SEGUN', '05/02/17 / 11:57:02', '1486292272', 'I was at alaba so when someone Mr John was holding me a sum of 20,000 naira to buy a phone the eventually he didnt get me the phone and he is unable to pay my money back.', ''),
('ABA', 'OSUN', 'SAMSON', 'DAVID', 'M', '45', 'ENGINEER', 'christainity', 'AFG', 'OLAGOKE', '09098877665', '', '123456', 'TOM', 'SAM', '31/01/17 / 12:03:01', '1485817399', 'HE IS A THIEF PLSSSSS', '');

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
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`time`, `date`, `subject`, `sender_id`, `receiver_id`, `message`, `checked`) VALUES
('1486980463', '13/02/17 11:07:43', 'Hello ', '123456', '123455', 'hello', 0),
('1486984633', '13/02/17 12:17:13', 'sup', '123456', '123456', 'yeyyeyeye', 0),
('1486984703', '13/02/17 12:18:23', 'sup', '123456', '123456', 'yeyyeyeye', 0),
('1486985483', '13/02/17 12:31:23', 'mkn', '123456', '123455', 'knknm', 0),
('1486985521', '13/02/17 12:32:01', 'cdv', '123456', '11111111', 'fsf', 0),
('1486985542', '13/02/17 12:32:22', 'fssf', '123456', '223334', 'dcf', 0),
('1486985813', '13/02/17 12:36:53', 'knknk', '123456', '233', 'bjbnjbnj', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ipo`
--
ALTER TABLE `ipo`
  ADD PRIMARY KEY (`force_id`);

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
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
