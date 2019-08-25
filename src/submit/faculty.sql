-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 04:00 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ass_ev_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` varchar(100) NOT NULL,
  `fac_name` varchar(100) NOT NULL,
  `fac_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `fac_name`, `fac_role`) VALUES
('fac1', 'Dr. Gadre', 'Director'),
('fac10', 'Seema Mahajan', 'Instructor'),
('fac11', 'Ravi Rane', 'Sub Instructor'),
('fac12', 'Puja Patil', 'Sub Instructor'),
('fac2', 'Dr. Smita Bedekar', 'HOD'),
('fac3', 'Dr. Smita Bedekar', 'Instructor'),
('fac4', 'Abhijit Limaye', 'Instructor'),
('fac5', 'Ganesh Kedari', 'Instructor'),
('fac6', 'Aditi Limaye', 'Sub Instructor'),
('fac7', 'Abdulla Ansari', 'Sub Instructor'),
('fac8', 'Namrata Mali', 'Sub Instructor'),
('fac9', 'Sunil Patil', 'Instructor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
