-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 30, 2022 at 07:36 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`adminID`, `username`, `password`, `employeeID`, `dateAdded`, `timeAdded`) VALUES
(1, 'admin', '$2y$10$lIWM5saZ2luXTgNNYroE6ejHxZzvlQVOmx71dlufWIcrp1HSFgY2m', 1, '2022-01-18', '02:44:13');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeattendance`
--

INSERT INTO `employeeattendance` (`employeeAttendanceID`, `employeeID`, `timeIn`, `timeOut`, `dateLogged`, `day`) VALUES
(1, 14, '08:00:00', '16:00:00', '2022-01-23', 'Sunday'),
(2, 15, '08:00:00', '16:00:00', '2022-01-23', 'Sunday'),
(3, 16, '08:00:00', '16:00:00', '2022-01-23', 'Sunday'),
(4, 17, '08:00:00', '16:00:00', '2022-01-23', 'Sunday'),
(5, 14, '08:00:00', '16:00:00', '2022-01-24', 'Monday'),
(6, 15, '08:00:00', '16:00:00', '2022-01-24', 'Monday'),
(7, 16, '08:00:00', '16:00:00', '2022-01-24', 'Monday'),
(8, 17, '08:00:00', '16:00:00', '2022-01-24', 'Monday'),
(9, 14, '08:00:00', '16:00:00', '2022-01-25', 'Tuesday'),
(10, 15, '08:00:00', '16:00:00', '2022-01-25', 'Tuesday'),
(11, 16, '08:00:00', '16:00:00', '2022-01-25', 'Tuesday'),
(12, 17, '08:00:00', '16:00:00', '2022-01-25', 'Tuesday'),
(13, 14, '08:00:00', '16:00:00', '2022-01-26', 'Wednesday'),
(14, 15, '08:00:00', '16:00:00', '2022-01-26', 'Wednesday'),
(15, 16, '08:00:00', '16:00:00', '2022-01-26', 'Wednesday'),
(16, 17, '08:00:00', '16:00:00', '2022-01-26', 'Wednesday'),
(17, 14, '08:00:00', '16:00:00', '2022-01-27', 'Thursday'),
(18, 15, '08:00:00', '16:00:00', '2022-01-27', 'Thursday'),
(19, 16, '08:00:00', '16:00:00', '2022-01-27', 'Thursday'),
(20, 17, '08:00:00', '16:00:00', '2022-01-27', 'Thursday'),
(21, 14, '08:00:00', '16:00:00', '2022-01-28', 'Friday'),
(22, 15, '08:00:00', '16:00:00', '2022-01-28', 'Friday'),
(23, 16, '08:00:00', '16:00:00', '2022-01-28', 'Friday'),
(24, 17, '08:00:00', '16:00:00', '2022-01-28', 'Friday'),
(25, 14, '08:00:00', '16:00:00', '2022-01-29', 'Friday'),
(26, 15, '08:00:00', '16:00:00', '2022-01-29', 'Friday'),
(27, 16, '08:00:00', '16:00:00', '2022-01-29', 'Friday'),
(28, 17, '08:00:00', '16:00:00', '2022-01-29', 'Friday');

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
  `image_filename` varchar(255) NOT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_accounts`
--

INSERT INTO `employee_accounts` (`employeeID`, `employeeNumber`, `firstname`, `lastname`, `age`, `address`, `position`, `sss_number`, `pagibig_number`, `philhealth_number`, `tin_number`, `employmentDate`, `sssContribution`, `pagibigContribution`, `philhealthContribution`, `image_filename`) VALUES
(1, 'EMPLOYER-0000', ' William Cris', ' Hod', '20', '149 Narra Alley Balingasa Q.C', 'Employer', '123456789', '123456789', '123456789', '123456789', '2022-01-01', 1062.5, 100, 0, ''),
(14, 'Employee-9050', 'Kim', 'Dayeon', '21', '21', 'Secretary', '132', '123', '123', '123', '2022-01-30', 560.5, 100, 182.62, 'FJtdQkXagAUvauF.jpg'),
(15, 'Employee-6371', 'Choi', 'Yunjn', '20', 'test', 'Helper', '132', '123', '123', '123', '2022-01-24', 560.5, 100, 182.62, '251403301_166887002326388_5475395565788633123_n.jpg'),
(16, 'Employee-8178', 'Angelo', 'Edrosa', '20', 'test address', 'Helper', '132', '123', '123', '123', '2022-01-30', 560.5, 100, 182.62, '161049145_2965596930428595_6025963448500812899_n.jpg'),
(17, 'Employee-8313', 'Vann Chezter', 'Lizan', '20', 'testtest', 'Driver', '1512351', '12323', '12370', '6342', '2022-01-30', 560.5, 100, 182.62, '95815791_3605187722830702_8637403137491075072_n.jpg'),
(20, 'Employee-1216', 'Xhen', 'Xiaoting', '21', 'Quezon City', 'Secretary', '1512351', '12323', '12370', '6342', '2022-01-31', 0, 0, 0, 'FKPPgmOUYAEvgg4.jpg');

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
  `amountOvertime` float NOT NULL,
  `rate` float NOT NULL,
  `fromDay` date NOT NULL,
  `toDay` date NOT NULL,
  `GrossIncome` float NOT NULL,
  `NetIncome` float NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`payoutID`),
  KEY `employeeFinalPayout` (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

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
(9, 'Time Out', 'Employee  William Cris  Hod timed Out', '02:31:24', '2022-01-29', 'Saturday', 'Normal'),
(10, 'Login', '[ADMIN]  William Cris Logged In Successfully', '14:58:23', '2022-01-29', 'Saturday', 'Normal'),
(11, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-7495] minju as Employee', '16:44:05', '2022-01-29', 'Saturday', 'Normal'),
(12, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-2824] kian as Employee', '16:49:27', '2022-01-29', 'Saturday', 'Normal'),
(13, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted []  as Employee', '16:49:38', '2022-01-29', 'Saturday', 'Normal'),
(14, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-2824]  as employee', '16:49:38', '2022-01-29', 'Saturday', 'Normal'),
(15, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted []  as Employee', '16:49:40', '2022-01-29', 'Saturday', 'Normal'),
(16, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-7495]  as employee', '16:49:40', '2022-01-29', 'Saturday', 'Normal'),
(17, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-5548] 11 as Employee', '16:55:36', '2022-01-29', 'Saturday', 'Normal'),
(18, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-8121] kian as Employee', '16:58:36', '2022-01-29', 'Saturday', 'Normal'),
(19, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted []  as Employee', '16:58:40', '2022-01-29', 'Saturday', 'Normal'),
(20, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-5548]  as employee', '16:58:40', '2022-01-29', 'Saturday', 'Normal'),
(21, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted []  as Employee', '17:01:22', '2022-01-29', 'Saturday', 'Normal'),
(22, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-8121]  as employee', '17:01:22', '2022-01-29', 'Saturday', 'Normal'),
(23, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-2814] minju as Employee', '17:02:59', '2022-01-29', 'Saturday', 'Normal'),
(24, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-4737] 1 as Employee', '17:03:44', '2022-01-29', 'Saturday', 'Normal'),
(25, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-7628] qw as Employee', '17:04:23', '2022-01-29', 'Saturday', 'Normal'),
(26, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted []  as Employee', '17:04:55', '2022-01-29', 'Saturday', 'Normal'),
(27, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-7628]  as employee', '17:04:55', '2022-01-29', 'Saturday', 'Normal'),
(28, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted []  as Employee', '17:04:57', '2022-01-29', 'Saturday', 'Normal'),
(29, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-4737]  as employee', '17:04:57', '2022-01-29', 'Saturday', 'Normal'),
(30, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted []  as Employee', '17:05:00', '2022-01-29', 'Saturday', 'Normal'),
(31, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-2814]  as employee', '17:05:00', '2022-01-29', 'Saturday', 'Normal'),
(32, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-8729] minju as Employee', '17:05:20', '2022-01-29', 'Saturday', 'Normal'),
(33, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted []  as Employee', '17:06:33', '2022-01-29', 'Saturday', 'Normal'),
(34, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-8729]  as employee', '17:06:33', '2022-01-29', 'Saturday', 'Normal'),
(35, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-9993] Kian as Employee', '17:18:42', '2022-01-29', 'Saturday', 'Normal'),
(36, 'Login', '[ADMIN]  William Cris Logged In Successfully', '21:48:45', '2022-01-29', 'Saturday', 'Normal'),
(37, 'EMPLOYER-0000', '[ADMIN]  William Cris updated the contributions', '22:25:02', '2022-01-29', 'Saturday', 'Normal'),
(38, 'EMPLOYER-0000', '[ADMIN]  William Cris updated the contributions', '22:26:52', '2022-01-29', 'Saturday', 'Normal'),
(39, 'EMPLOYER-0000', '[ADMIN]  William Cris updated the contributions', '22:29:02', '2022-01-29', 'Saturday', 'Normal'),
(40, 'EMPLOYER-0000', '[ADMIN]  William Cris updated the contributions', '22:45:57', '2022-01-29', 'Saturday', 'Normal'),
(41, 'Time Out', 'Employee Minatozaki Sana timed Out', '11:26:57', '2022-01-29', 'Saturday', 'Normal'),
(42, 'Time Out', 'Employee Minatozaki Sana timed Out', '11:28:21', '2022-01-29', 'Saturday', 'Normal'),
(43, 'Time Out', 'Employee Minatozaki Sana timed Out', '23:35:10', '2022-01-29', 'Saturday', 'Normal'),
(44, 'Time In', 'Employee Minatozaki Sana timed In', '12:20:51', '2022-01-30', 'Sunday', 'Normal'),
(45, 'Time In', 'Employee Kian Lejano timed In', '12:43:59', '2022-01-30', 'Sunday', 'Normal'),
(46, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-9993] Kian as Employee', '02:28:40', '2022-01-30', 'Sunday', 'Normal'),
(47, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-8448] Minatozaki as Employee', '02:28:47', '2022-01-30', 'Sunday', 'Normal'),
(48, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-7884] Kim as Employee', '02:43:05', '2022-01-30', 'Sunday', 'Normal'),
(49, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-7884] Kim as Employee', '02:44:48', '2022-01-30', 'Sunday', 'Normal'),
(50, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-9050] Kim as Employee', '02:46:13', '2022-01-30', 'Sunday', 'Normal'),
(51, 'EMPLOYER-0000', '[ADMIN]  William Cris updated the contributions', '02:51:32', '2022-01-30', 'Sunday', 'Normal'),
(52, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-6371] Choi as Employee', '02:55:52', '2022-01-30', 'Sunday', 'Normal'),
(53, 'Time In', 'Employee Kim Dayeon timed In', '02:56:03', '2022-01-30', 'Sunday', 'Normal'),
(54, 'Time In', 'Employee Choi Yunjn timed In', '02:56:26', '2022-01-30', 'Sunday', 'Normal'),
(55, 'Time Out', 'Employee Choi Yunjn timed Out', '02:57:37', '2022-01-30', 'Sunday', 'Normal'),
(56, 'Time Out', 'Employee Choi Yunjn timed Out', '02:59:41', '2022-01-30', 'Sunday', 'Normal'),
(57, 'Time In', 'Employee Kim Dayeon timed In', '03:02:22', '2022-01-30', 'Sunday', 'Normal'),
(58, 'Time Out', 'Employee Kim Dayeon timed Out', '03:02:29', '2022-01-30', 'Sunday', 'Normal'),
(59, 'Time In', 'Employee Kim Dayeon timed In', '03:04:05', '2022-01-30', 'Sunday', 'Normal'),
(60, 'Time Out', 'Employee Kim Dayeon timed Out', '03:04:08', '2022-01-30', 'Sunday', 'Normal'),
(61, 'Time In', 'Employee Choi Yunjn timed In', '03:06:08', '2022-01-30', 'Sunday', 'Normal'),
(62, 'Time Out', 'Employee Choi Yunjn timed Out', '03:06:10', '2022-01-30', 'Sunday', 'Normal'),
(63, 'Time In', 'Employee Kim Dayeon timed In', '03:07:01', '2022-01-30', 'Sunday', 'Normal'),
(64, 'Time Out', 'Employee Kim Dayeon timed Out', '03:07:04', '2022-01-30', 'Sunday', 'Normal'),
(65, 'Time In', 'Employee Kim Dayeon timed In', '03:11:03', '2022-01-30', 'Sunday', 'Normal'),
(66, 'Time Out', 'Employee Kim Dayeon timed Out', '03:11:06', '2022-01-30', 'Sunday', 'Normal'),
(67, 'Time In', 'Employee Kim Dayeon timed In', '03:12:04', '2022-01-30', 'Sunday', 'Normal'),
(68, 'Time Out', 'Employee Kim Dayeon timed Out', '03:12:06', '2022-01-30', 'Sunday', 'Normal'),
(69, 'Time In', 'Employee Kim Dayeon timed In', '03:16:04', '2022-01-30', 'Sunday', 'Normal'),
(70, 'Time Out', 'Employee Kim Dayeon timed Out', '03:16:07', '2022-01-30', 'Sunday', 'Normal'),
(71, 'Time In', 'Employee Kim Dayeon timed In', '03:18:13', '2022-01-30', 'Sunday', 'Normal'),
(72, 'Time Out', 'Employee Kim Dayeon timed Out', '03:18:18', '2022-01-30', 'Sunday', 'Normal'),
(73, 'Time In', 'Employee Kim Dayeon timed In', '03:18:59', '2022-01-30', 'Sunday', 'Normal'),
(74, 'Time Out', 'Employee Kim Dayeon timed Out', '03:19:05', '2022-01-30', 'Sunday', 'Normal'),
(75, 'Time In', 'Employee Kim Dayeon timed In', '03:22:11', '2022-01-30', 'Sunday', 'Normal'),
(76, 'Time Out', 'Employee Kim Dayeon timed Out', '03:22:20', '2022-01-30', 'Sunday', 'Normal'),
(77, 'Time In', 'Employee Kim Dayeon timed In', '03:24:35', '2022-01-30', 'Sunday', 'Normal'),
(78, 'Time Out', 'Employee Kim Dayeon timed Out', '03:24:40', '2022-01-30', 'Sunday', 'Normal'),
(79, 'Time In', 'Employee Choi Yunjn timed In', '03:26:06', '2022-01-30', 'Sunday', 'Normal'),
(80, 'Time Out', 'Employee Choi Yunjn timed Out', '03:27:26', '2022-01-30', 'Sunday', 'Normal'),
(81, 'Time In', 'Employee Kim Dayeon timed In', '03:29:56', '2022-01-30', 'Sunday', 'Normal'),
(82, 'Time Out', 'Employee Kim Dayeon timed Out', '03:30:02', '2022-01-30', 'Sunday', 'Normal'),
(83, 'Time In', 'Employee Kim Dayeon timed In', '03:35:05', '2022-01-30', 'Sunday', 'Normal'),
(84, 'Time Out', 'Employee Kim Dayeon timed Out', '03:35:20', '2022-01-30', 'Sunday', 'Normal'),
(85, 'Time In', 'Employee Choi Yunjn timed In', '03:36:31', '2022-01-30', 'Sunday', 'Normal'),
(86, 'Time Out', 'Employee Choi Yunjn timed Out', '03:36:39', '2022-01-30', 'Sunday', 'Normal'),
(87, 'Login', '[ADMIN]  William Cris Logged In Successfully', '12:39:26', '2022-01-30', 'Sunday', 'Normal'),
(88, 'Time In', 'Employee Kim Dayeon timed In', '12:51:10', '2022-01-30', 'Sunday', 'Normal'),
(89, 'Time Out', 'Employee Kim Dayeon timed Out', '12:51:14', '2022-01-30', 'Sunday', 'Normal'),
(90, 'Time In', 'Employee Kim Dayeon timed In', '13:12:15', '2022-01-30', 'Sunday', 'Normal'),
(91, 'Time Out', 'Employee Kim Dayeon timed Out', '13:12:31', '2022-01-30', 'Sunday', 'Normal'),
(92, 'Time In', 'Employee Kim Dayeon timed In', '13:14:04', '2022-01-30', 'Sunday', 'Normal'),
(93, 'Time Out', 'Employee Kim Dayeon timed Out', '13:14:27', '2022-01-30', 'Sunday', 'Normal'),
(94, 'Time In', 'Employee Kim Dayeon timed In', '13:16:07', '2022-01-30', 'Sunday', 'Normal'),
(95, 'Time Out', 'Employee Kim Dayeon timed Out', '13:17:04', '2022-01-30', 'Sunday', 'Normal'),
(96, 'Time In', 'Employee Choi Yunjn timed In', '13:30:57', '2022-01-30', 'Sunday', 'Normal'),
(97, 'Time Out', 'Employee Choi Yunjn timed Out', '13:31:06', '2022-01-30', 'Sunday', 'Normal'),
(98, 'Time In', 'Employee Kim Dayeon timed In', '13:44:41', '2022-01-30', 'Sunday', 'Normal'),
(99, 'Time Out', 'Employee Kim Dayeon timed Out', '13:46:22', '2022-01-30', 'Sunday', 'Normal'),
(100, 'Time Out', 'Employee Kim Dayeon timed Out', '13:46:46', '2022-01-30', 'Sunday', 'Normal'),
(101, 'Time In', 'Employee Choi Yunjn timed In', '13:48:20', '2022-01-30', 'Sunday', 'Normal'),
(102, 'Time Out', 'Employee Choi Yunjn timed Out', '13:48:26', '2022-01-30', 'Sunday', 'Normal'),
(103, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-8178] Angelo as Employee', '13:50:01', '2022-01-30', 'Sunday', 'Normal'),
(104, 'Time In', 'Employee Angelo Edrosa timed In', '13:50:07', '2022-01-30', 'Sunday', 'Normal'),
(105, 'Time Out', 'Employee Angelo Edrosa timed Out', '13:50:17', '2022-01-30', 'Sunday', 'Normal'),
(106, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-8313] Vann Chezter as Employee', '14:01:06', '2022-01-30', 'Sunday', 'Normal'),
(107, 'Time In', 'Employee Vann Chezter Lizan timed In', '14:01:28', '2022-01-30', 'Sunday', 'Normal'),
(108, 'Time Out', 'Employee Vann Chezter Lizan timed Out', '14:03:12', '2022-01-30', 'Sunday', 'Normal'),
(109, 'Login', 'User with username \'admintest\' tried to login but entered a wrong password', '18:20:37', '2022-01-30', 'Sunday', 'Warning'),
(110, 'Login', '[ADMIN]  William Cris Logged In Successfully', '18:20:43', '2022-01-30', 'Sunday', 'Normal'),
(111, 'Login', '[ADMIN]  William Cris Logged In Successfully', '19:37:29', '2022-01-30', 'Sunday', 'Normal'),
(112, 'Login', '[ADMIN]  William Cris Logged In Successfully', '22:04:30', '2022-01-30', 'Sunday', 'Normal'),
(113, 'Time In', 'Employee Kim Dayeon timed In', '23:42:18', '2022-01-30', 'Sunday', 'Normal'),
(114, 'Time Out', 'Employee Kim Dayeon timed Out', '23:44:33', '2022-01-30', 'Sunday', 'Normal'),
(115, 'Time In', 'Employee Vann Chezter Lizan timed In', '00:04:37', '2022-01-31', 'Monday', 'Normal'),
(116, 'Time Out', 'Employee Vann Chezter Lizan timed Out', '00:04:46', '2022-01-31', 'Monday', 'Normal'),
(117, 'EMPLOYER-0000', '[ADMIN]  William Cris updated the contributions', '00:09:10', '2022-01-31', 'Monday', 'Normal'),
(118, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-9050] Kim Dayeon as Admin', '00:19:15', '2022-01-31', 'Monday', 'Normal'),
(119, 'EMPLOYER-0000', '[ADMIN]   William Cris deleted [Employee-9050] Kim as Admin', '00:19:27', '2022-01-31', 'Monday', 'Normal'),
(120, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-9050] Kim Dayeon as Admin', '00:19:36', '2022-01-31', 'Monday', 'Normal'),
(121, 'EMPLOYER-0000', '[ADMIN]   William Cris deleted [Employee-9050] Kim as Admin', '00:19:42', '2022-01-31', 'Monday', 'Normal'),
(122, 'EMPLOYER-0000', '[ADMIN]   William Cris edited [EMPLOYER-0000]  William Cris  Hod\'s account details', '00:22:33', '2022-01-31', 'Monday', 'Normal'),
(123, 'EMPLOYER-0000', '[ADMIN]   William Cris edited [EMPLOYER-0000]  William Cris  Hod\'s account details', '00:22:36', '2022-01-31', 'Monday', 'Normal'),
(124, 'EMPLOYER-0000', '[ADMIN]   William Cris edited [EMPLOYER-0000]  William Cris  Hod\'s account details', '00:22:40', '2022-01-31', 'Monday', 'Normal'),
(125, 'EMPLOYER-0000', '[ADMIN]  William Cris edited [Employee-8178] Angelo\'s account details', '00:34:43', '2022-01-31', 'Monday', 'Normal'),
(126, 'EMPLOYER-0000', '[ADMIN]  William Cris edited [Employee-8313] Vann Chezter\'s account details', '00:34:49', '2022-01-31', 'Monday', 'Normal'),
(127, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-9050] Kim Dayeon as Admin', '01:10:07', '2022-01-31', 'Monday', 'Normal'),
(128, 'EMPLOYER-0000', '[ADMIN]   William Cris deleted [Employee-9050] Kim as Admin', '01:10:19', '2022-01-31', 'Monday', 'Normal'),
(129, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-6324] Xhen as Employee', '01:31:34', '2022-01-31', 'Monday', 'Normal'),
(130, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-3775] Xhen as Employee', '01:32:50', '2022-01-31', 'Monday', 'Normal'),
(131, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-3775] Xhen Xiaoting as Admin', '02:15:22', '2022-01-31', 'Monday', 'Normal'),
(132, 'Login', 'User with username \'admin\' tried to login but entered a wrong password', '02:31:39', '2022-01-31', 'Monday', 'Warning'),
(133, 'Login', 'Someone tried to login but entered invalid credentials. IP Address: ::1', '02:31:46', '2022-01-31', 'Monday', 'Alert'),
(134, 'Login', 'Someone tried to login but entered invalid credentials. IP Address: ::1', '02:31:51', '2022-01-31', 'Monday', 'Alert'),
(135, 'Login', '[ADMIN]  William Cris Logged In Successfully', '02:31:56', '2022-01-31', 'Monday', 'Normal'),
(136, 'EMPLOYER-0000', '[ADMIN]  William Cris changed password', '02:47:42', '2022-01-31', 'Monday', 'Normal'),
(137, 'Login', '[ADMIN]  William Cris Logged In Successfully', '02:48:03', '2022-01-31', 'Monday', 'Normal'),
(138, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '02:56:35', '2022-01-31', 'Monday', 'Normal'),
(139, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '03:01:29', '2022-01-31', 'Monday', 'Normal'),
(140, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '03:01:42', '2022-01-31', 'Monday', 'Normal'),
(141, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '03:01:42', '2022-01-31', 'Monday', 'Normal'),
(142, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '03:01:43', '2022-01-31', 'Monday', 'Normal'),
(143, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '03:02:29', '2022-01-31', 'Monday', 'Normal'),
(144, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '03:05:18', '2022-01-31', 'Monday', 'Normal'),
(145, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '03:05:20', '2022-01-31', 'Monday', 'Normal'),
(146, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '03:05:20', '2022-01-31', 'Monday', 'Normal'),
(147, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '03:05:21', '2022-01-31', 'Monday', 'Normal'),
(148, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '03:05:21', '2022-01-31', 'Monday', 'Normal'),
(149, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Employee', '03:10:43', '2022-01-31', 'Monday', 'Normal'),
(150, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Admin and Employee', '03:19:51', '2022-01-31', 'Monday', 'Normal'),
(151, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-3775] Xhen as Admin and Employee', '03:19:51', '2022-01-31', 'Monday', 'Normal'),
(152, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-9050] Kim Dayeon as Admin', '03:25:42', '2022-01-31', 'Monday', 'Normal'),
(153, 'EMPLOYER-0000', '[ADMIN]   William Cris deleted [Employee-9050] Kim as Admin', '03:27:34', '2022-01-31', 'Monday', 'Normal'),
(154, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-2721] Xhen as Employee', '03:28:04', '2022-01-31', 'Monday', 'Normal'),
(155, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-2721] Xhen Xiaoting as Admin', '03:28:22', '2022-01-31', 'Monday', 'Normal'),
(156, 'EMPLOYER-0000', '[ADMIN]   William Cris deleted [Employee-2721] Xhen as Admin', '03:28:35', '2022-01-31', 'Monday', 'Normal'),
(157, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-2721] Xhen Xiaoting as Admin', '03:33:06', '2022-01-31', 'Monday', 'Normal'),
(158, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-2721] Xhen as Admin and Employee', '03:33:11', '2022-01-31', 'Monday', 'Normal'),
(159, 'EMPLOYER-0000', '[ADMIN]  William Cris deleted [Employee-2721] Xhen as Admin and Employee', '03:33:11', '2022-01-31', 'Monday', 'Normal'),
(160, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-1216] Xhen as Employee', '03:33:37', '2022-01-31', 'Monday', 'Normal');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD CONSTRAINT `employeeData` FOREIGN KEY (`employeeID`) REFERENCES `employee_accounts` (`employeeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employeeattendance`
--
ALTER TABLE `employeeattendance`
  ADD CONSTRAINT `employee` FOREIGN KEY (`employeeID`) REFERENCES `employee_accounts` (`employeeID`);

--
-- Constraints for table `employee_payout`
--
ALTER TABLE `employee_payout`
  ADD CONSTRAINT `employeeFinalPayout` FOREIGN KEY (`employeeID`) REFERENCES `employee_accounts` (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
