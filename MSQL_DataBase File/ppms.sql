-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2021 at 05:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admId` int(50) NOT NULL,
  `admFullName` varchar(50) NOT NULL,
  `admAddress` longtext NOT NULL,
  `admState` varchar(50) NOT NULL,
  `admCity` varchar(50) NOT NULL,
  `admStatus` varchar(50) NOT NULL,
  `admGender` varchar(50) NOT NULL,
  `admEmail` varchar(50) NOT NULL,
  `admTelNumber` varchar(50) NOT NULL,
  `admPassword` varchar(50) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admId`, `admFullName`, `admAddress`, `admState`, `admCity`, `admStatus`, `admGender`, `admEmail`, `admTelNumber`, `admPassword`, `createDate`, `updateDate`) VALUES
(3, 'General Admin', '', '', '', 'Gen. Admin', '', 'admin@gmail.com', '', 'a738eb52204cc3b938d640a725f3d56b', '2021-05-07 16:21:22', '2021-05-07 16:21:22'),
(8, 'Secondary Admin', '', '', '', 'Sec. Admin', '', 'test@admin.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '2021-05-09 16:06:59', '2021-05-09 16:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `approvedParties`
--

CREATE TABLE `approvedParties` (
  `partId` int(50) NOT NULL,
  `partCode` varchar(50) NOT NULL,
  `partName` varchar(50) NOT NULL,
  `partAddress` varchar(50) NOT NULL,
  `partState` varchar(50) NOT NULL,
  `partCity` varchar(50) NOT NULL,
  `partMembers` int(50) NOT NULL,
  `partChairman` varchar(50) NOT NULL,
  `partEmail` varchar(50) NOT NULL,
  `partTelNumber` varchar(50) NOT NULL,
  `usrId` int(50) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approvedParties`
--

INSERT INTO `approvedParties` (`partId`, `partCode`, `partName`, `partAddress`, `partState`, `partCity`, `partMembers`, `partChairman`, `partEmail`, `partTelNumber`, `usrId`, `createDate`, `updateDate`) VALUES
(1, 'AAA', 'Action Action Action', 'Part Address', '', '', 1243, 'Test Chairman', 'user@gmail.com', '+23470 123 123', 2, '2021-05-08 11:42:22', '2021-05-10 15:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `endorseParties`
--

CREATE TABLE `endorseParties` (
  `partId` int(50) NOT NULL,
  `partCode` varchar(50) NOT NULL,
  `partName` varchar(50) NOT NULL,
  `partAddress` varchar(50) NOT NULL,
  `partState` varchar(50) NOT NULL,
  `partCity` varchar(50) NOT NULL,
  `partMembers` int(50) NOT NULL,
  `partChairman` varchar(50) NOT NULL,
  `partEmail` varchar(50) NOT NULL,
  `partTelNumber` varchar(50) NOT NULL,
  `usrId` int(50) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rejectedParties`
--

CREATE TABLE `rejectedParties` (
  `partId` int(50) NOT NULL,
  `partCode` varchar(50) NOT NULL,
  `partName` varchar(50) NOT NULL,
  `partAddress` varchar(50) NOT NULL,
  `partState` varchar(50) NOT NULL,
  `partCity` varchar(50) NOT NULL,
  `partMembers` int(50) NOT NULL,
  `partChairman` varchar(50) NOT NULL,
  `partEmail` varchar(50) NOT NULL,
  `partTelNumber` varchar(50) NOT NULL,
  `usrId` int(50) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `stfId` int(50) NOT NULL,
  `stfFullName` varchar(50) NOT NULL,
  `stfAddress` longtext NOT NULL,
  `stfState` varchar(50) NOT NULL,
  `stfCity` varchar(50) NOT NULL,
  `stfGender` varchar(50) NOT NULL,
  `stfEmail` varchar(50) NOT NULL,
  `stfTelNumber` varchar(50) NOT NULL,
  `stfPassword` varchar(50) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`stfId`, `stfFullName`, `stfAddress`, `stfState`, `stfCity`, `stfGender`, `stfEmail`, `stfTelNumber`, `stfPassword`, `createDate`, `updateDate`) VALUES
(2, 'staff', '', '', '', '', 'staff@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '2021-05-09 22:30:45', '2021-05-09 22:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usrId` int(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `address` longtext NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telNumber` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usrId`, `fullName`, `address`, `state`, `city`, `status`, `gender`, `email`, `telNumber`, `password`, `createDate`, `updateDate`) VALUES
(2, 'Test Chairman', '', '', '', 'Party Chairman', 'male', 'user@gmail.com', '+23470 123 123', '81dc9bdb52d04dc20036dbd8313ed055', '2021-05-07 09:40:29', '2021-05-10 15:37:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admId`);

--
-- Indexes for table `approvedParties`
--
ALTER TABLE `approvedParties`
  ADD PRIMARY KEY (`partId`),
  ADD KEY `usrId` (`usrId`);

--
-- Indexes for table `endorseParties`
--
ALTER TABLE `endorseParties`
  ADD PRIMARY KEY (`partId`),
  ADD KEY `usrId` (`usrId`);

--
-- Indexes for table `rejectedParties`
--
ALTER TABLE `rejectedParties`
  ADD PRIMARY KEY (`partId`),
  ADD KEY `usrId` (`usrId`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`stfId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usrId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `approvedParties`
--
ALTER TABLE `approvedParties`
  MODIFY `partId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `endorseParties`
--
ALTER TABLE `endorseParties`
  MODIFY `partId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rejectedParties`
--
ALTER TABLE `rejectedParties`
  MODIFY `partId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `stfId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usrId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `endorseParties`
--
ALTER TABLE `endorseParties`
  ADD CONSTRAINT `endorseparties_ibfk_1` FOREIGN KEY (`usrId`) REFERENCES `users` (`usrId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
