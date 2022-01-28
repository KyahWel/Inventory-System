-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2022 at 07:20 PM
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
-- Table structure for table `admin_accounts`
--

DROP TABLE IF EXISTS `admin_accounts`;
CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `adminID` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employeeID` int(255) NOT NULL,
  `dateAdded` date NOT NULL,
  `timeAdded` time NOT NULL,
  PRIMARY KEY (`adminID`),
  KEY `employeeData` (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`adminID`, `username`, `password`, `employeeID`, `dateAdded`, `timeAdded`) VALUES
(1, 'admintest', '$2y$10$Lxj113ZKQqe4VUFvDC40KOnNjZuMk5Iuz2JPQplpF4yPrVKmVK4A6', 1, '2022-01-18', '02:44:13');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeattendance`
--

INSERT INTO `employeeattendance` (`employeeAttendanceID`, `employeeID`, `timeIn`, `timeOut`, `dateLogged`, `day`) VALUES
(1, 3, '03:16:39', NULL, '2022-01-28', 'Friday'),
(2, 3, '02:08:54', NULL, '2022-01-29', 'Saturday'),
(3, 1, '02:26:36', '18:00:00', '2022-01-29', 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `employee_accounts`
--

DROP TABLE IF EXISTS `employee_accounts`;
CREATE TABLE IF NOT EXISTS `employee_accounts` (
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
  `sssContribution` float NOT NULL,
  `pagibigContribution` float NOT NULL,
  `philhealthContribution` float NOT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_accounts`
--

INSERT INTO `employee_accounts` (`employeeID`, `employeeNumber`, `firstname`, `lastname`, `age`, `address`, `position`, `sss_number`, `pagibig_number`, `philhealth_number`, `tin_number`, `employmentDate`, `sssContribution`, `pagibigContribution`, `philhealthContribution`) VALUES
(1, 'EMPLOYER-0000', ' William Cris', ' Hod', '20', '149 Narra Alley Balingasa Q.C', 'Employer', '123456789', '123456789', '123456789', '123456789', '2022-01-01', 0, 0, 0),
(3, 'Employee-8448', 'Minatozaki', 'Sana', '20', 'test address', 'Secretary', '132', '123', '123', '123', '2022-01-28', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_payout`
--

DROP TABLE IF EXISTS `employee_payout`;
CREATE TABLE IF NOT EXISTS `employee_payout` (
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
-- Table structure for table `event_log`
--

DROP TABLE IF EXISTS `event_log`;
CREATE TABLE IF NOT EXISTS `event_log` (
  `eventID` int(255) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `time_happened` time NOT NULL,
  `date` date NOT NULL,
  `day` varchar(255) NOT NULL,
  `threatlevel` varchar(255) NOT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`eventID`, `user`, `event`, `time_happened`, `date`, `day`, `threatlevel`) VALUES
(1, 'Login', 'Someone tried to login but entered invalid credentials. IP Address: ::1', '01:39:12', '2022-01-29', 'Saturday', 'Alert'),
(2, 'EMPLOYER-0000', 'Admin  William Cris edited [Employee-8448] Minatozaki Sana\'s account details', '01:44:38', '2022-01-29', 'Saturday', 'Normal'),
(3, 'Login', 'User with username \'admintest\' tried to login but entered a wrong password', '01:45:05', '2022-01-29', 'Saturday', 'Warning'),
(4, 'Login', 'Admin  William Cris Logged In Successfully', '01:49:22', '2022-01-29', 'Saturday', 'Normal'),
(6, 'Time In', 'Employee Minatozaki Sana timed In', '02:08:54', '2022-01-29', 'Saturday', 'Normal'),
(7, 'Time Out', 'Employee Minatozaki Sana timed Out', '02:09:04', '2022-01-29', 'Saturday', 'Normal'),
(8, 'Time In', 'Employee  William Cris  Hod timed In', '02:26:36', '2022-01-29', 'Saturday', 'Normal'),
(9, 'Time Out', 'Employee  William Cris  Hod timed Out', '02:31:24', '2022-01-29', 'Saturday', 'Normal');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD CONSTRAINT `employeeData` FOREIGN KEY (`employeeID`) REFERENCES `employee_accounts` (`employeeID`);

--
-- Constraints for table `employeeattendance`
--
ALTER TABLE `employeeattendance`
  ADD CONSTRAINT `employee` FOREIGN KEY (`employeeID`) REFERENCES `employee_accounts` (`employeeID`);

--
-- Constraints for table `employee_payout`
--
ALTER TABLE `employee_payout`
  ADD CONSTRAINT `employee-payout` FOREIGN KEY (`employeeID`) REFERENCES `employee_accounts` (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
