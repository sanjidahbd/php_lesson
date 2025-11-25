-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2025 at 07:56 AM
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
-- Database: `pwad68`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `employeeID` int(11) NOT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text NOT NULL,
  `birthdate` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`employeeID`, `first_name`, `last_name`, `birthdate`, `notes`, `photo`) VALUES
(17, 'Sazzadul', 'Islam', '2004-12-03', 'sdsdxx     ', ''),
(18, 'Alam', 'Islam', '0203-12-03', 'sdsdxx', ''),
(19, 'Sumaiya', 'Jahan', '0203-12-03', 'sdsdxx', ''),
(20, 'Jahanara', 'Akhter', '12-06-2002', 'sdsdxx', ''),
(21, 'sassdd', 'aass', '0203-12-03', 'sdsdxx', ''),
(22, 'sassdd', 'aass', '0203-12-03', 'sdsdxx', ''),
(23, 'sanjida', 'isalm', '2022-02-06', 'ssdxdx', ''),
(25, 'Korim', 'Hasan', '11-05-2001', NULL, ''),
(26, 'Korim', 'Hasan', '11-05-2001', NULL, ''),
(27, 'Korim', 'Hasan', '11-05-2001', NULL, ''),
(28, 'Korim', 'Hasan', '11-05-2001', NULL, ''),
(29, 'Korim', 'Hasan', '11-05-2001', NULL, ''),
(30, 'Korim', 'Hasan', '11-05-2001', NULL, ''),
(31, 'Korim', 'Hasan', '11-05-2001', NULL, ''),
(32, 'Korim', 'Hasan', '11-05-2001', NULL, ''),
(33, 'Korim', 'Hasan', '11-05-2001', NULL, ''),
(34, 'Korim', 'Hasan', '11-05-2001', NULL, ''),
(35, 'Korim', 'Hasan', '11-05-2001', NULL, ''),
(36, 'sanjida', 'Islam', '2002-02-06', 'asddffgf', ''),
(37, 'sanjida', 'islam', '2002-02-06', 'adghj', ''),
(39, 'saba', 'anika', '2003-02-03', 'asdfggh', 'students/uploads/download.jpg'),
(40, 'Ali', 'Isalm', '2003-05-06', 'asdvvb', 'students/uploads/user2-160x160.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`employeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
