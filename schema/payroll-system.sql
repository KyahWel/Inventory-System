-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2022 at 05:58 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin-accounts`
--

DROP TABLE IF EXISTS `admin-accounts`;
CREATE TABLE IF NOT EXISTS `admin-accounts` (
  `adminID` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employeeID` int(255) NOT NULL,
  `dateAdded` date NOT NULL,
  `timeAdded` time NOT NULL,
  PRIMARY KEY (`adminID`),
  KEY `employeeData` (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin-accounts`
--

INSERT INTO `admin-accounts` (`adminID`, `username`, `password`, `employeeID`, `dateAdded`, `timeAdded`) VALUES
(1, 'admin', '$2y$10$Lxj113ZKQqe4VUFvDC40KOnNjZuMk5Iuz2JPQplpF4yPrVKmVK4A6', 1, '2022-01-18', '02:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `employee-accounts`
--

DROP TABLE IF EXISTS `employee-accounts`;
CREATE TABLE IF NOT EXISTS `employee-accounts` (
  `employeeID` int(255) NOT NULL AUTO_INCREMENT,
  `employeeNumber` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `sss_number` varchar(255) NOT NULL,
  `pagibig_number` varchar(255) NOT NULL,
  `philhealth_number` varchar(255) NOT NULL,
  `tin_number` varchar(255) NOT NULL,
  `employmentDate` date NOT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee-accounts`
--

INSERT INTO `employee-accounts` (`employeeID`, `employeeNumber`, `firstname`, `lastname`, `age`, `address`, `position`, `sss_number`, `pagibig_number`, `philhealth_number`, `tin_number`, `employmentDate`) VALUES
(1, 'EMPLOYER-0000', ' William Cris', ' Hod', '20', '149 Narra Alley Balingasa Q.C', 'Employer', '123456789', '123456789', '123456789', '123456789', '2022-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `employee-payout`
--

DROP TABLE IF EXISTS `employee-payout`;
CREATE TABLE IF NOT EXISTS `employee-payout` (
  `payoutID` int(255) NOT NULL AUTO_INCREMENT,
  `employeeID` int(255) NOT NULL,
  `minutesLate` int(255) NOT NULL,
  `amountLate` float NOT NULL,
  `minutesOvertime` int(255) NOT NULL,
  `rate` float NOT NULL,
  `fromDay` date NOT NULL,
  `toDay` date DEFAULT NULL,
  `GrossIncome` float NOT NULL,
  `NetIncome` int(255) NOT NULL,
  `amountOvertime` float NOT NULL,
  PRIMARY KEY (`payoutID`),
  KEY `employee-payout` (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeeattendance`
--

DROP TABLE IF EXISTS `employeeattendance`;
CREATE TABLE IF NOT EXISTS `employeeattendance` (
  `employeeAttendanceID` int(255) NOT NULL AUTO_INCREMENT,
  `employeeID` int(255) NOT NULL,
  `timeIn` time DEFAULT NULL,
  `timeOut` time DEFAULT NULL,
  `dateLogged` date NOT NULL,
  `day` varchar(255) NOT NULL,
  PRIMARY KEY (`employeeAttendanceID`),
  KEY `employee` (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event-log`
--

DROP TABLE IF EXISTS `event-log`;
CREATE TABLE IF NOT EXISTS `event-log` (
  `eventID` int(255) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `time-happened` time NOT NULL,
  `date` date NOT NULL,
  `day` varchar(255) NOT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin-accounts`
--
ALTER TABLE `admin-accounts`
  ADD CONSTRAINT `employeeData` FOREIGN KEY (`employeeID`) REFERENCES `employee-accounts` (`employeeID`);

--
-- Constraints for table `employee-payout`
--
ALTER TABLE `employee-payout`
  ADD CONSTRAINT `employee-payout` FOREIGN KEY (`employeeID`) REFERENCES `employee-accounts` (`employeeID`);

--
-- Constraints for table `employeeattendance`
--
ALTER TABLE `employeeattendance`
  ADD CONSTRAINT `employee` FOREIGN KEY (`employeeID`) REFERENCES `employee-accounts` (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
