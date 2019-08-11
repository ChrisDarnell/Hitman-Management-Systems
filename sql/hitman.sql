-- phpMyAdmin SQL Data
-- https://www.phpmyadmin.net/
--
-- Host: http://192.168.64.2/
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


-- Drop for testing/display

DROP TABLE IF EXISTS `admin`;
DROP TABLE IF EXISTS `jobInfo`;
DROP TABLE IF EXISTS `targetInfo`;
DROP TABLE IF EXISTS `hitmanInfo`;
DROP TABLE IF EXISTS `transaction`;
DROP TABLE IF EXISTS `buyerInfo`;

--
-- Database: `hitman`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'timolyphant@gmail.com', 'password'),
(2, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `jobInfo`
--

CREATE TABLE `jobInfo` (
  `id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `jobNumber` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for 'jobInfo'
--

INSERT INTO `jobInfo` (`id`, `bid`, `jobNumber`, `description`) VALUES
(11, 800000, 'B546', 'Evil Person #1'),
(12, 75000, 'CS34', 'Evil Person #2'),
(13, 1000, 'D567', 'Evil Person #3'),
(14, 10000, 'M542', 'Evil Person #4'),
(15, 115000, '3R56', 'Evil Person #5');

-- --------------------------------------------------------

--
-- Table structure for table `targetInfo`
--

CREATE TABLE `targetInfo` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `location` varchar(500) NOT NULL,
  `danger` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `targetInfo`
--

INSERT INTO `targetInfo` (`id`, `name`, `location`, `danger`) VALUES
(4, 'John Smith', 'Morocco', 'High'),
(5, 'Edgar Roberts', 'Los Angeles, CA', 'Low'),
(7, 'Cindy Cone', 'Sydney, Austrailia', 'Mid');

-- --------------------------------------------------------

--
-- Table structure for table `buyerInfo`
--

CREATE TABLE `buyerInfo` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `owned` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `buyerInfo`
--

INSERT INTO `buyerInfo` (`id`, `name`, `email`, `password`, `phone`, `owned`) VALUES
(3, 'Jackal', 'a@gmail.com', '1234', '5553456789', '13'),
(2, 'Domino', 'b@gmail.com', '1234', '3106636532', '14'),
(4, 'West', 'c@gmail.com', '1234', '3235456464', '15'),
(5, 'Bond', 'd@gmail.com', '1234', '2345352333', '17'),
(7, 'Brando', 'e@gmail.com', '1234', '6579807557', '19');

-- --------------------------------------------------------

--
-- Table structure for table `hitmanInfo`
--




CREATE TABLE `hitmanInfo` (
  `id` int(11) NOT NULL,
  `truename` varchar(50) NOT NULL,
  `codename` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `location` varchar(50) NOT NULL,
  `hitNumber` varchar(10) NOT NULL,
  `retainer` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `oid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `hitmanInfo`
--

INSERT INTO `hitmanInfo` (`id`, `truename`, `codename`, `email`, `password`, `phone`, `location`, `hitNumber`, `retainer`, `date`, `oid`) VALUES
(9, 'David Webster', 'Shark', 'killershark@gmail.com', '1234', '3432542345', 'New York, NY', '16', '$5000', '2000-11-21', '3'),
(10, 'Ana Lucia Gomez', 'Vertigo', 'killervertigo@gmail.com', '1234', '3456787890', 'Paris, France', '14', '$2000', '2018-09-23', '8'),
(11, 'Eddie Jones', 'Hammerhead', 'hammerhead@gmail.com', '1234', '5532564547', 'San Diego, CA', '19', '$5000', '2019-08-01', '9');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `tid` int(4) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `transaction`
--

INSERT INTO `transaction` (`id`, `tid`, `date`, `amount`) VALUES
(9, 6, '2019-07-23', '$500'),
(10, 6, '2019-03-05', '$5000'),
(11, 7, '2017-01-06', '$2000'),
(12, 10, '2016-10-17', '$4500'),
(13, 11, '2019-12-23', '$5000');





-- Indexes
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobInfo`
--
ALTER TABLE `jobInfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `targetInfo`
--
ALTER TABLE `targetInfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyerInfo`
--
ALTER TABLE `buyerInfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hitmanInfo`
--
ALTER TABLE `hitmanInfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);




--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobInfo`
--
ALTER TABLE `jobInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `targetInfo`
--
ALTER TABLE `targetInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `buyerInfo`
--
ALTER TABLE `buyerInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hitmanInfo`
--
ALTER TABLE `hitmanInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
