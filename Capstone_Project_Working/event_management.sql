-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 05:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `username`, `password`, `admin_type`) VALUES
(25, 'Parth Shah', 'parth1', 'c20ad4d76fe97759aa27a0c99bff6710', 'Artist'),
(26, 'Farheen Pahelvan', 'farheen', '202cb962ac59075b964b07152d234b70', 'Artist'),
(28, 'kiara patel', 'kia', 'c20ad4d76fe97759aa27a0c99bff6710', 'Artist');

-- --------------------------------------------------------

--
-- Table structure for table `booked_venue`
--

CREATE TABLE `booked_venue` (
  `id_booked_venues` int(11) NOT NULL,
  `first name` varchar(50) NOT NULL,
  `last name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(20) NOT NULL,
  `eventtype` varchar(250) NOT NULL,
  `datetime` datetime(6) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `booking_description` varchar(250) NOT NULL,
  `id_venues` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `event` varchar(50) NOT NULL,
  `schedule` datetime(6) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `eve_description` varchar(100) NOT NULL,
  `banner` varchar(250) NOT NULL,
  `id_venues` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_event`, `event`, `schedule`, `venue`, `eve_description`, `banner`, `id_venues`) VALUES
(8, 'Birth Day party', '2021-11-25 09:13:00.000000', '4', 'bright place', 'images/1637865148test.png', 4),
(9, 'concert', '2021-11-26 13:39:00.000000', '4', '5000 people capacity, stage and lights facility available some long description will go here ', 'images/1637865709test.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id_venues` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `description` varchar(100) NOT NULL,
  `rate` int(20) NOT NULL,
  `capacity` int(10) NOT NULL,
  `venue_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id_venues`, `name`, `address`, `description`, `rate`, `capacity`, `venue_image`) VALUES
(4, 'venue1', '26 gerber meadows', '    vary funny place    ', 100, 80, 'images/1637871331test.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booked_venue`
--
ALTER TABLE `booked_venue`
  ADD PRIMARY KEY (`id_booked_venues`),
  ADD KEY `test` (`id_venues`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `events_ibfk_1` (`id_venues`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id_venues`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `booked_venue`
--
ALTER TABLE `booked_venue`
  MODIFY `id_booked_venues` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id_venues` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_venue`
--
ALTER TABLE `booked_venue`
  ADD CONSTRAINT `test` FOREIGN KEY (`id_venues`) REFERENCES `venues` (`id_venues`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_venues`) REFERENCES `venues` (`id_venues`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
