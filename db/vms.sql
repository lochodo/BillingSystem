-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 07:46 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `VisitorName` varchar(30) NOT NULL,
  `MobileNo` int(11) NOT NULL,
  `EmailAddress` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Office` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'waiting',
  `user` varchar(50) NOT NULL,
  `approval` int(11) NOT NULL DEFAULT '0',
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `VisitorName`, `MobileNo`, `EmailAddress`, `Date`, `Office`, `status`, `user`, `approval`, `Image`) VALUES
(4, 'Brighton Kimani', 70987543, 'brighton@gmail.com', '2023-02-14', 'Finance', 'passed', '', 0, ''),
(5, 'Cheru Bett', 702502952, 'cheru@gmail.com', '2023-02-23', 'Finance', 'waiting', '', 1, ''),
(2, 'VINCENT KIPKURUI', 702502952, 'victor@gmail.com', '2023-02-14', 'admission', 'confirmed', '', 1, ''),
(6, 'VINCENT KIPKURUI', 702502952, 'vincent@gmail.com', '2023-02-22', 'Finance', 'waiting', 'vincentbettoh@kabarak.ac.ke', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `IDNO` int(8) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Firstname`, `Lastname`, `IDNO`, `Phone`, `id`, `username`, `password`, `role`) VALUES
('VINCENT', 'KIPKURUI', 37482712, '0702502952', 1, 'admin', '654321', 'admin'),
('VINCENT', 'KIPKURUI', 98765432, '0702502952', 2, 'vincentbettoh@kabarak.ac.ke', '123456', 'visitor'),
('Victor', 'Kiprono', 33398765, '0702502952', 3, 'receptionist', '654321', 'receptionist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`EmailAddress`),
  ADD UNIQUE KEY `unique` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
