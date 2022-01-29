-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 10:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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

CREATE TABLE `admin_accounts` (
  `adminID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employeeID` int(255) NOT NULL,
  `dateAdded` date NOT NULL,
  `timeAdded` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`adminID`, `username`, `password`, `employeeID`, `dateAdded`, `timeAdded`) VALUES
(1, 'admintest', '$2y$10$Lxj113ZKQqe4VUFvDC40KOnNjZuMk5Iuz2JPQplpF4yPrVKmVK4A6', 1, '2022-01-18', '02:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `employeeattendance`
--

CREATE TABLE `employeeattendance` (
  `employeeAttendanceID` int(255) NOT NULL,
  `employeeID` int(255) NOT NULL,
  `timeIn` time DEFAULT NULL,
  `timeOut` time DEFAULT NULL,
  `dateLogged` date NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `employee_accounts` (
  `employeeID` int(255) NOT NULL,
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
  `image_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_accounts`
--

INSERT INTO `employee_accounts` (`employeeID`, `employeeNumber`, `firstname`, `lastname`, `age`, `address`, `position`, `sss_number`, `pagibig_number`, `philhealth_number`, `tin_number`, `employmentDate`, `sssContribution`, `pagibigContribution`, `philhealthContribution`, `image_filename`) VALUES
(1, 'EMPLOYER-0000', ' William Cris', ' Hod', '20', '149 Narra Alley Balingasa Q.C', 'Employer', '123456789', '123456789', '123456789', '123456789', '2022-01-01', 0, 0, 0, ''),
(3, 'Employee-8448', 'Minatozaki', 'Sana', '20', 'test address', 'Secretary', '132', '123', '123', '123', '2022-01-28', 0, 0, 0, ''),
(12, 'Employee-9993', 'Kian', 'Lejano', '20', 'tanza', 'Driver', '111', '222', '333', '444', '2022-01-28', 0, 0, 0, '89467842_564826347722352_3992701314617311232_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payout`
--

CREATE TABLE `employee_payout` (
  `payoutID` int(255) NOT NULL,
  `employeeID` int(255) NOT NULL,
  `minutesLate` int(255) NOT NULL,
  `amountLate` float NOT NULL,
  `minutesOvertime` int(255) NOT NULL,
  `rate` float NOT NULL,
  `fromDay` date NOT NULL,
  `toDay` date DEFAULT NULL,
  `GrossIncome` float NOT NULL,
  `NetIncome` int(255) NOT NULL,
  `amountOvertime` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `eventID` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `time_happened` time NOT NULL,
  `date` date NOT NULL,
  `day` varchar(255) NOT NULL,
  `threatlevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(35, 'EMPLOYER-0000', '[ADMIN]  William Cris added [Employee-9993] Kian as Employee', '17:18:42', '2022-01-29', 'Saturday', 'Normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `employeeData` (`employeeID`);

--
-- Indexes for table `employeeattendance`
--
ALTER TABLE `employeeattendance`
  ADD PRIMARY KEY (`employeeAttendanceID`),
  ADD KEY `employee` (`employeeID`);

--
-- Indexes for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `employee_payout`
--
ALTER TABLE `employee_payout`
  ADD PRIMARY KEY (`payoutID`),
  ADD KEY `employee-payout` (`employeeID`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`eventID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `adminID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employeeattendance`
--
ALTER TABLE `employeeattendance`
  MODIFY `employeeAttendanceID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  MODIFY `employeeID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_payout`
--
ALTER TABLE `employee_payout`
  MODIFY `payoutID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `eventID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
