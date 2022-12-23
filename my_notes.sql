-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 07:17 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_notes`
--
CREATE DATABASE IF NOT EXISTS `my_notes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `my_notes`;
-- --------------------------------------------------------

--
-- Table structure for table `curr_users`
--

CREATE TABLE `curr_users` (
  `username` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curr_users`
--

INSERT INTO `curr_users` (`username`, `date`) VALUES
('pabitra_kumar', '2022-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `pabitra_kumar`
--

CREATE TABLE `pabitra_kumar` (
  `sl_no` int(8) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pabitra_kumar`
--

INSERT INTO `pabitra_kumar` (`sl_no`, `heading`, `content`, `date`) VALUES
(2, '<p>Hello Everyone,</p>', '<p>This is my First Backend website.</p>', '2022-12-20'),
(11, '<p>bye</p>', '<p>good night</p>', '2022-12-20'),
(13, '<p>bye</p>', '<p>good night</p>', '2022-12-20'),
(14, '<p>bye</p>', '<p>good night</p>', '2022-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USERNAME` varchar(20) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USERNAME`, `NAME`, `PASSWORD`, `date`) VALUES
('pabitra_kumar', 'Pabitra Kumar Bebartta', 'pabi', '2022-12-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curr_users`
--
ALTER TABLE `curr_users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pabitra_kumar`
--
ALTER TABLE `pabitra_kumar`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pabitra_kumar`
--
ALTER TABLE `pabitra_kumar`
  MODIFY `sl_no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
