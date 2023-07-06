-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 01:20 PM
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
(7, 'VINCENT KIPKURUI', 702502952, 'vincentbettoh@gmail.com', '2023-03-28', 'Post graduate', 'confirmed', 'vincentbettoh@kabarak.ac.ke', 1, ''),
(10, 'VINCENT KIPKURUI', 702502952, 'vincentbettoh@gmail.com', '2023-03-07', 'Kabarak enterprises', 'confirmed', 'vincentbettoh@kabarak.ac.ke', 1, ''),
(11, 'purity', 725444604, 'puritycherono@kabarak.ac.ke', '2023-03-13', 'Finance', 'confirmed', 'puritycherono@kabarak.ac.ke', 1, '');

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
('Purity', 'Cherono', 38075877, '0725444604', 1, 'admin', '123456', 'admin'),
('purity', 'cherono', 38075877, '0725444604', 3, 'receptionist', '123456', 'receptionist'),
('purity', 'cherono', 38075877, '072544604', 7, 'puritycherono@kabarak.ac.ke', '123456', 'visitor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
