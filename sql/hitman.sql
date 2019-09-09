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

--
-- Database: `hitman`
--

CREATE DATABASE IF NOT EXISTS hitmanDB;
USE hitmanDB;


-- Drop for testing/display

DROP TABLE IF EXISTS `admin`;
DROP TABLE IF EXISTS `contracts`;
DROP TABLE IF EXISTS `transaction`;
DROP TABLE IF EXISTS `clients`;
DROP TABLE IF EXISTS `hitman`;


-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` INT(11) NOT NULL PRIMARY KEY,
  `admin_email` VARCHAR(50) NOT NULL,
  `admin_password` VARCHAR(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) 
  VALUES
    (1, 'timolyphant@gmail.com', 'password'),
    (2, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` INT(11) NOT NULL PRIMARY KEY,
  `client_fname` VARCHAR(30) NOT NULL,
  `client_lname` VARCHAR(30) NOT NULL,
  `client_email` VARCHAR(50) NOT NULL,
  `client_password` VARCHAR(15) NOT NULL,
  `client_phone` INT(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `clients`
--
--
INSERT INTO `clients` (`client_id`, `client_fname`, `client_lname`, `client_email`, `client_password`, `client_phone`) VALUES
(3, 'James', 'West', 'a@gmail.com', '1234', '5553456789');
-- (2, 'Domino', 'b@gmail.com', '1234', '3106636532'),
-- (4, 'West', 'c@gmail.com', '1234', '3235456464'),
-- (5, 'Bond', 'd@gmail.com', '1234', '2345352333'),
-- (7, 'Brando', 'e@gmail.com', '1234', '6579807557');

-- --------------------------------------------------------

--
-- Table structure for table `hitman`
--

CREATE TABLE `hitman` (
  `hitman_id` INT(11) NOT NULL PRIMARY KEY,
  `hitman_fname` VARCHAR(30) NOT NULL,
  `hitman_lname` VARCHAR(30) NOT NULL,
  `hitman_codename` VARCHAR(30) NOT NULL,
  `hitman_email` VARCHAR(50) NOT NULL,
  `hitman_password` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `hitman`
--

INSERT INTO `hitman` (`hitman_id`, `hitman_fname`, `hitman_lname`, `hitman_codename`, `hitman_email`, `hitman_password`) 
  VALUES
  (9, 'David', 'Webster', 'Shark', 'kshark@gmail.com', '1234');
  -- (9, `David`, `Webster`, 'Shark', 'killershark@gmail.com', '1234');
-- (10, 'Ana Lucia Gomez', 'Vertigo', 'killervertigo@gmail.com', '1234', '3456787890', 'Paris, France', '$2000'),
-- (11, 'Eddie Jones', 'Hammerhead', 'hammerhead@gmail.com', '1234', '5532564547', 'San Diego, CA', '$5000');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `contract_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `contract_value` VARCHAR(11),
  `client_id` INT(11) NOT NULL REFERENCES clients,
  `hitman_id` INT(11) NOT NULL REFERENCES hitman,
  `contract_description` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for 'contracts'
--

INSERT INTO `contracts` (`contract_id`, `contract_value`, `client_id`, `hitman_id`, `contract_description`) 
  VALUES
-- (11, '$800000', 'B546', 'Evil Person #1 - Los Angeles, CA','2', '9'),
-- (12, '$75000', 'CS34', 'Evil Person #2 - Very Dangerous', '3', '10'),
-- (13, '$1000', 'D567', 'Evil Person #3','7', '11'),
-- (14, '$10000', 'M542', 'Evil Person #4', '5', '9'),
  (1, '$115000', 3, 9, 'Evil Person #5');

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `hitman_id` int(11) NOT NULL REFERENCES hitman,
  `client_id` int(11) NOT NULL REFERENCES clients,
  `transaction_date` date NOT NULL,
  `transaction_amount` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sample data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `hitman_id`, `client_id`, `transaction_date`, `transaction_amount`) 
  VALUES
-- (9,'2019-07-23', '$500'),
-- (10, '2019-03-05', '$5000'),
-- (11, '2017-01-06', '$2000'),
-- (12, '2016-10-17', '$4500'),
(1, 9, 3, '2019-12-23', '$5000');


-- COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
