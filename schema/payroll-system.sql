-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 07:26 PM
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
-- Table structure for table `admin-accounts`
--

CREATE TABLE `admin-accounts` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dateAdded` date NOT NULL,
  `timeAdded` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin-accounts`
--

INSERT INTO `admin-accounts` (`id`, `username`, `password`, `firstname`, `lastname`, `dateAdded`, `timeAdded`) VALUES
(1, 'admin', 'admin', 'William Cris', 'Hod', '2022-01-15', '14:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `employee-accounts`
--

CREATE TABLE `employee-accounts` (
  `employeeID` int(255) NOT NULL,
  `employeeNumber` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `sss_number` varchar(255) NOT NULL,
  `pagibig_number` varchar(255) NOT NULL,
  `philhealth_number` varchar(255) NOT NULL,
  `tin_number` varchar(255) NOT NULL,
  `employmentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee-accounts`
--

INSERT INTO `employee-accounts` (`employeeID`, `employeeNumber`, `firstname`, `lastname`, `age`, `position`, `sss_number`, `pagibig_number`, `philhealth_number`, `tin_number`, `employmentDate`) VALUES
(3, 'Employee-1271', 'omar', 'onse', '11', 'secretary', '111', '222', '333', '444', '2022-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `employee-payout`
--

CREATE TABLE `employee-payout` (
  `payoutID` int(255) NOT NULL,
  `employeeID` int(255) NOT NULL,
  `date-received` date NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event-log`
--

CREATE TABLE `event-log` (
  `eventID` int(255) NOT NULL,
  `employeeID` int(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `time-happened` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin-accounts`
--
ALTER TABLE `admin-accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee-accounts`
--
ALTER TABLE `employee-accounts`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `employee-payout`
--
ALTER TABLE `employee-payout`
  ADD PRIMARY KEY (`payoutID`),
  ADD KEY `employee-payout` (`employeeID`);

--
-- Indexes for table `event-log`
--
ALTER TABLE `event-log`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `employee-log` (`employeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin-accounts`
--
ALTER TABLE `admin-accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee-accounts`
--
ALTER TABLE `employee-accounts`
  MODIFY `employeeID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee-payout`
--
ALTER TABLE `employee-payout`
  MODIFY `payoutID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event-log`
--
ALTER TABLE `event-log`
  MODIFY `eventID` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee-payout`
--
ALTER TABLE `employee-payout`
  ADD CONSTRAINT `employee-payout` FOREIGN KEY (`employeeID`) REFERENCES `employee-accounts` (`employeeID`);

--
-- Constraints for table `event-log`
--
ALTER TABLE `event-log`
  ADD CONSTRAINT `employee-log` FOREIGN KEY (`employeeID`) REFERENCES `employee-accounts` (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
