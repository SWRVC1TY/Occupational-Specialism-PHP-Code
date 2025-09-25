-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2025 at 04:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gconsole`
--

-- --------------------------------------------------------

--
-- Table structure for table `console`
--

CREATE TABLE `console` (
  `console_id` int(11) NOT NULL,
  `manufacturer` text NOT NULL,
  `console_name` text NOT NULL,
  `release_date` text NOT NULL,
  `controller_no` int(11) NOT NULL,
  `bit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `console`
--

INSERT INTO `console` (`console_id`, `manufacturer`, `console_name`, `release_date`, `controller_no`, `bit`) VALUES
(1, 'Sony', 'PlayStation 4', '2013-11-15', 4, 64),
(2, 'Sony', 'PlayStation 5', '2020-11-12', 4, 64),
(3, 'Microsoft', 'Xbox One', '2013-11-22', 8, 64),
(4, 'Microsoft', 'Xbox Series X', '2020-11-10', 8, 64),
(5, 'Nintendo', 'Switch', '2017-03-03', 8, 64),
(6, 'Valve', 'Steam Deck', '2022-02-25', 8, 64);

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE `owns` (
  `owns_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `console_id` int(11) NOT NULL,
  `buy_date` text NOT NULL,
  `link_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owns`
--

INSERT INTO `owns` (`owns_id`, `user_id`, `console_id`, `buy_date`, `link_date`) VALUES
(1, 1, 2, '2021-12-01', '2021-12-05'),
(2, 2, 5, '2018-06-20', '2018-06-22'),
(3, 3, 3, '2015-03-15', '2015-03-18'),
(4, 4, 6, '2022-03-01', '2022-03-03'),
(5, 5, 1, '2014-11-25', '2014-11-27'),
(6, 6, 4, '2021-11-10', '2021-11-12'),
(7, 1, 1, '2014-01-10', '2014-01-15'),
(8, 1, 3, '2016-02-18', '2016-02-20'),
(9, 1, 4, '2021-11-11', '2021-11-12'),
(10, 1, 5, '2017-03-10', '2017-03-12'),
(11, 1, 6, '2022-03-01', '2022-03-03'),
(12, 2, 1, '2015-06-15', '2015-06-17'),
(13, 3, 2, '2021-01-20', '2021-01-22'),
(14, 4, 4, '2021-12-01', '2021-12-03'),
(15, 5, 5, '2019-07-08', '2019-07-10'),
(16, 6, 3, '2016-09-25', '2016-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `signupdate` text NOT NULL,
  `dob` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `signupdate`, `dob`, `country`) VALUES
(1, 'alice123', 'passAlice!', '2023-01-15', '1995-04-10', 'USA'),
(2, 'bob_the_builder', 'bobSecure99', '2023-02-20', '1990-07-25', 'UK'),
(3, 'charlie_k', 'charlie@123', '2023-03-10', '1988-12-02', 'Canada'),
(4, 'dianaM', 'D!ana456', '2023-04-05', '1993-05-30', 'Australia'),
(5, 'edward77', 'Ed77pass', '2023-05-18', '1998-11-11', 'Germany'),
(6, 'fionaX', 'Fiona!2023', '2023-06-25', '1992-03-22', 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`console_id`);

--
-- Indexes for table `owns`
--
ALTER TABLE `owns`
  ADD PRIMARY KEY (`owns_id`),
  ADD KEY `user_id` (`user_id`,`console_id`),
  ADD KEY `console_id` (`console_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `console`
--
ALTER TABLE `console`
  MODIFY `console_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `owns`
--
ALTER TABLE `owns`
  MODIFY `owns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `owns`
--
ALTER TABLE `owns`
  ADD CONSTRAINT `owns_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owns_ibfk_2` FOREIGN KEY (`console_id`) REFERENCES `console` (`console_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
