-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 03:57 AM
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
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assign_id` int(11) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `fac_id` varchar(100) NOT NULL,
  `assign_upload_date` date NOT NULL,
  `assign_publish_date` date NOT NULL,
  `assign_submit_date` date NOT NULL,
  `assign_file_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assign_id`, `course_id`, `fac_id`, `assign_upload_date`, `assign_publish_date`, `assign_submit_date`, `assign_file_path`) VALUES
(1, 'sc101', 'fac3', '2017-05-10', '2017-05-12', '2017-05-22', ''),
(2, 'sc102', 'fac4', '2017-06-02', '2017-06-02', '2017-06-10', ''),
(3, 'sc103', 'fac5', '2017-06-05', '2017-06-10', '2017-06-26', ''),
(4, 'sc104', 'fac6', '2017-06-17', '2017-06-20', '2017-06-30', ''),
(5, 'sc201', 'fac3', '2017-07-26', '2017-07-27', '2017-08-03', ''),
(6, 'sc202', 'fac7', '2017-07-07', '2017-07-07', '2017-07-10', ''),
(7, 'sc101', 'fac3', '2017-07-15', '2017-07-18', '2017-07-25', ''),
(8, 'sc304', 'fac3', '2017-10-23', '2017-10-24', '2017-10-26', ''),
(9, 'sc301', 'fac9', '2017-09-05', '2017-09-06', '2017-09-29', ''),
(10, 'sc204', 'fac4', '2017-08-03', '2017-08-03', '2017-08-20', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assign_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `fac_id` (`fac_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`fac_id`) REFERENCES `faculty` (`fac_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
