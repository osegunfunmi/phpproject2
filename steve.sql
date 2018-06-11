-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2016 at 04:56 PM
-- Server version: 5.6.27-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `steve`
--

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE IF NOT EXISTS `network` (
`id` int(11) NOT NULL,
  `firstgen` varchar(20) NOT NULL,
  `secgen` varchar(20) NOT NULL,
  `thirdgen` varchar(20) NOT NULL,
  `fourthgen` varchar(20) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `bankno` varchar(250) NOT NULL,
  `telephone` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `network`
--

INSERT INTO `network` (`id`, `firstgen`, `secgen`, `thirdgen`, `fourthgen`, `firstname`, `lastname`, `bank`, `bankno`, `telephone`) VALUES
(1, 'A', 'B', 'C', 'D', 'DASER', 'DAVID', 'GUARANTEE TRUST BANK', '0108647853', '07031285559'),
(3, '1', 'A', 'B', 'C', 'TIMBYEN', 'SANDRA', 'ACCESS BANK', '00948847758', '7031285559'),
(4, '1', 'A', 'B', 'C', 'kabiru', 'sokoto', 'FCMB', '49938837783', '877466477'),
(5, '3', '1', 'A', 'B', 'RETNAN', 'SOLOMON', 'SKYE BANK', '4885994884', '4887749948'),
(6, '1', 'A', 'B', 'C', 'kaze', 'john', 'ACCESS BANK', '634345345345234', '877664'),
(9, '6', '1', 'A', 'B', 'AYUBA', 'DAKADYENG', 'ECOBANK', '897654668866', '9876577789'),
(10, '6', '1', 'A', 'B', 'AYUBA', 'DAKADYENG', 'ECOBANK', '897654668866', '9876577789'),
(11, '6', '1', 'A', 'B', 'AYO', 'IFE', 'ACCESS BANK', '00112233445', '08036060653');

-- --------------------------------------------------------

--
-- Table structure for table `networking`
--

CREATE TABLE IF NOT EXISTS `networking` (
`id` int(11) NOT NULL,
  `firstgen` varchar(20) NOT NULL,
  `secgen` varchar(20) NOT NULL,
  `thirdgen` varchar(20) NOT NULL,
  `fourthgen` varchar(20) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `bankno` varchar(250) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `flipflag` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `networking`
--

INSERT INTO `networking` (`id`, `firstgen`, `secgen`, `thirdgen`, `fourthgen`, `firstname`, `lastname`, `bank`, `bankno`, `telephone`, `flipflag`, `level`) VALUES
(1, 'A', 'B', 'C', 'D', 'DASER', 'DAVID', 'FCMB', '958847788', '0948847744', 3, 4),
(2, '1', 'A', 'B', 'C', 'TIMBYEN', 'DAVID', 'ACCESS BANK', '00948847758', '7031285559', 3, 4),
(3, '1', 'A', 'B', 'C', 'DABO', 'DEVINE', 'FCMB', '00948847758', '+2347031285559', 3, 4),
(4, '1', 'A', 'B', 'C', 'JOY', 'SOLOMON', 'FCMB', '97987987', '+2347036701716', 0, 4),
(5, '2', '1', 'A', 'B', 'kabiru', 'sokoto', 'ECOBANK', '75645454545', '7031285559', 0, 4),
(6, '2', '1', 'A', 'B', 'kabiru', 'SANDRA', 'FCMB', '634345345345234', '7031285559', 0, 4),
(7, '2', '1', 'A', 'B', 'DANBOYI', 'NANSEL', 'GTB', '8477488374734', '88957748847', 0, 4),
(8, '3', '1', 'A', 'B', 'CHINDA', 'JOSEFIN', 'SKYE BANK', '34345345345', '477499377389', 0, 4),
(9, '3', '1', 'A', 'B', 'Garbai', 'Joseph', 'Union Bank', '577884774664', '9857748847847', 0, 4),
(10, '3', '1', 'A', 'B', 'sdf', 'Dfd', 'asfasdf', '34534534', '3434345', 0, 4),
(11, '4', '1', 'A', 'B', 'hdfgd', 'rtyg', 'dfghsdfg', '5456456456', '07031285559', 0, 4),
(12, '4', '1', 'A', 'B', 'jfgh', 'sdfwe', 'lkashhdsd', '34536345', '45456456', 0, 4),
(13, '4', '1', 'A', 'B', 'dfgr', 'ertert', 'asdasdf', '4564564', '7031285559', 0, 3),
(14, '4', '1', 'A', 'B', 'fdgjdfgj', 'djdfh', 'dfghdfgh', '4545345345', '45456456', 0, 2),
(15, '4', '1', 'A', 'B', 'asdfasdf', 'asdfasdf', 'sdfgs', '4545645645', '6767', 0, 1),
(16, '4', '1', 'A', 'B', 'kjhsdj', 'kjhsdj', 'GTBank', '85996877886767', '85775885757', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
`id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id`, `fullname`) VALUES
('daser', 'daser', 1, 'Daser David');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `network`
--
ALTER TABLE `network`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `networking`
--
ALTER TABLE `networking`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `network`
--
ALTER TABLE `network`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `networking`
--
ALTER TABLE `networking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
