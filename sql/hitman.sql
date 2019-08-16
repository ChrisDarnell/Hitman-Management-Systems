-- phpMyAdmin SQL Data
-- https://www.phpmyadmin.net/
--
-- Host: http://192.168.64.2/


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
DROP TABLE IF EXISTS `contracts`;
DROP TABLE IF EXISTS `assassin`;
DROP TABLE IF EXISTS `transaction`;
DROP TABLE IF EXISTS `clients`;

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
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `contractValue` varchar(40) NOT NULL,
  `contractNumber` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `clientId` int(11) NOT NULL,
  `hitmanId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for 'contracts'
--

INSERT INTO `contracts` (`id`, `contractValue`, `contractNumber`, `description`, `clientId`, `hitmanId`) VALUES
(11, '$800000', 'B546', 'Evil Person #1 - Los Angeles, CA','2', '9'),
(12, '$75000', 'CS34', 'Evil Person #2 - Very Dangerous', '3', '10'),
(13, '$1000', 'D567', 'Evil Person #3','7', '11'),
(14, '$10000', 'M542', 'Evil Person #4', '5', '9'),
(15, '$115000', '3R56', 'Evil Person #5', '4', '10');



--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `clients`
--
--
INSERT INTO `clients` (`id`, `name`, `email`, `password`, `phone`) VALUES
(3, 'Jackal', 'a@gmail.com', '1234', '5553456789'),
(2, 'Domino', 'b@gmail.com', '1234', '3106636532'),
(4, 'West', 'c@gmail.com', '1234', '3235456464'),
(5, 'Bond', 'd@gmail.com', '1234', '2345352333'),
(7, 'Brando', 'e@gmail.com', '1234', '6579807557');

-- --------------------------------------------------------

--
-- Table structure for table `assassin`
--

CREATE TABLE `assassin` (
  `id` int(11) NOT NULL,
  `truename` varchar(50) NOT NULL,
  `codename` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `location` varchar(50) NOT NULL,
  `retainer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `assassin`
--

INSERT INTO `assassin` (`id`, `truename`, `codename`, `email`, `password`, `phone`, `location`, `retainer`) VALUES
(9, 'David Webster', 'Shark', 'killershark@gmail.com', '1234', '3432542345', 'New York, NY', '$5000'),
(10, 'Ana Lucia Gomez', 'Vertigo', 'killervertigo@gmail.com', '1234', '3456787890', 'Paris, France', '$2000'),
(11, 'Eddie Jones', 'Hammerhead', 'hammerhead@gmail.com', '1234', '5532564547', 'San Diego, CA', '$5000');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  -- `hitmanId` int(4) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `transaction`
--

INSERT INTO `transaction` (`id`, `date`, `amount`) VALUES
(9,'2019-07-23', '$500'),
(10, '2019-03-05', '$5000'),
(11, '2017-01-06', '$2000'),
(12, '2016-10-17', '$4500'),
(13, '2019-12-23', '$5000');





-- Indexes
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientId` (`clientId`),
  ADD KEY `hitmanId` (`hitmanId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assassin`
--
ALTER TABLE `assassin`
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
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;


--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assassin`
--
ALTER TABLE `assassin`
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
