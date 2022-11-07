-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2022 at 07:15 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `txns`
--

CREATE TABLE `txns` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `txn_type` varchar(255) NOT NULL,
  `txn_date` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `ml_possibility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `txns`
--

INSERT INTO `txns` (`id`, `username`, `txn_type`, `txn_date`, `amount`, `balance`, `ml_possibility`) VALUES
(2, '263772795975', 'deposit', '2022-05-09', '20', '20', ''),
(3, '263775338951', 'withdraw', '2022-05-09', '', '5', ''),
(4, '263772795975', 'withdraw', '2022-05-09', '10', '10', ''),
(5, '263772795975', 'deposit', '2022-05-09', '50', '60', ''),
(6, '263772795975', 'send', '2022-05-09', '20', '40', ''),
(7, '263772795975', 'receipt', '2022-05-09', '20', '25', ''),
(8, '263775338951', 'deposit', '2022-05-13', '1000', '1025', 'yes'),
(9, '263772795975', 'deposit', '2022-05-13', '10', '50', 'yes'),
(10, '263775338951', 'deposit', '2022-05-30', '50', '1075', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`, `user_type`, `balance`, `grade`, `status`) VALUES
(3, 'Admin', 'System', 'Admin', 'Pass', 'admin', '0', 'NA', 'NA'),
(5, '263775338951', 'Jay', 'Zert', 'pass', 'member', '1075', 'C', 'active'),
(11, '263772795975', 'Taya', 'Zert', 'pass', 'member', '50', 'B', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `txns`
--
ALTER TABLE `txns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `txns`
--
ALTER TABLE `txns`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
