-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 02:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `username`, `password`, `admin_name`) VALUES
(1, 'admin', 'admin', 'JL Gardiola');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`id`, `first_name`, `last_name`, `contact_number`, `email`, `address`, `photo`, `creation_date`) VALUES
(1, 'JL', 'Gardiola', 9501880189, 'admin@yahoo.com', 'Rodriguez, Rizal', 'upload/lawliet.jpg', '2022-06-30 14:30:48'),
(2, 'sample', 'sample', 1234567890, 'sample@email.com', 'QC', '', '2022-06-30 11:52:36'),
(3, 'Dye', 'EL', 9501880189, 'admin@yahoo.com', 'Rodriguez, Rizal', '', '2022-06-30 11:51:04'),
(6, 'user', 'user', 1234567890, 'user@email.com', 'QC', '', '2022-07-01 11:33:54'),
(7, 'user', 'user', 1234567890, 'user@email.com', 'QC', '', '2022-07-01 11:34:04'),
(8, 'user', 'user', 1234567890, 'user@email.com', 'QC', '', '2022-07-01 11:34:15'),
(9, 'user', 'user', 1234567890, 'user@email.com', 'QC', '', '2022-07-01 11:34:23'),
(10, 'user1', 'user1', 1234567890, 'user@email.com', 'QC', '', '2022-07-01 11:34:31'),
(11, 'user', 'user', 1234567890, 'user@email.com', 'QC', '', '2022-07-01 11:34:38'),
(12, 'user2', 'user2', 1234567890, 'user@email.com', 'QC', '', '2022-07-01 11:34:46'),
(13, 'user', 'user', 1234567890, 'user@email.com', 'QC', '', '2022-07-01 11:34:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
