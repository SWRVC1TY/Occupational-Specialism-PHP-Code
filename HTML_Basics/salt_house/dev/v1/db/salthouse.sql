-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2026 at 07:00 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salthouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingid` int NOT NULL,
  `userid` int NOT NULL,
  `roomid` int NOT NULL,
  `dateofbooking` bigint NOT NULL,
  `datebooked` bigint NOT NULL,
  `guests` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingid`, `userid`, `roomid`, `dateofbooking`, `datebooked`, `guests`) VALUES
(2, 1, 3, 1771697503, 1770315120, 123);

-- --------------------------------------------------------

--
-- Table structure for table `bookingservices`
--

CREATE TABLE `bookingservices` (
  `bookingid` int NOT NULL,
  `serviceid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookingservices`
--

INSERT INTO `bookingservices` (`bookingid`, `serviceid`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomid` int NOT NULL,
  `roomname` text NOT NULL,
  `baseprice` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomid`, `roomname`, `baseprice`) VALUES
(1, 'Smith', 300),
(2, 'Taylor', 300),
(3, 'Wilson', 300),
(4, 'Robinson', 300),
(5, 'Walker', 300),
(6, 'Wood', 300),
(7, 'Brown', 300),
(8, 'Jackson', 300),
(9, 'Thompson', 300),
(10, 'Harrison', 300),
(11, 'Green', 300),
(12, 'Sutcliffe', 300);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceid` int NOT NULL,
  `servicename` text NOT NULL,
  `sprice` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceid`, `servicename`, `sprice`) VALUES
(1, 'Post booking clean up', 200),
(2, 'Event Catering', 400),
(3, 'Refreshments', 300),
(4, 'AV equipment', 200),
(5, 'DJ', 400),
(6, 'Bar staff', 200);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `sname` text NOT NULL,
  `dob` bigint NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `fname`, `sname`, `dob`, `email`) VALUES
(1, 'john12', '$2y$10$UGjKb1LiBNwIf9zcxTl2ouamLGqKZGufh6bsE.HQiDnXaR3juVxp2', 'john', 'smith', 1769554800, 'john@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `fk_bookings_user` (`userid`),
  ADD KEY `fk_bookings_room` (`roomid`);

--
-- Indexes for table `bookingservices`
--
ALTER TABLE `bookingservices`
  ADD KEY `fk_bookingservices_booking` (`bookingid`),
  ADD KEY `fk_bookingservices_service` (`serviceid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_bookings_room` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`roomid`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bookings_user` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookingservices`
--
ALTER TABLE `bookingservices`
  ADD CONSTRAINT `fk_bookingservices_booking` FOREIGN KEY (`bookingid`) REFERENCES `bookings` (`bookingid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bookingservices_service` FOREIGN KEY (`serviceid`) REFERENCES `services` (`serviceid`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
