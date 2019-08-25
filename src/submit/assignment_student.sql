-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 07:55 AM
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
-- Table structure for table `assignment_student`
--

CREATE TABLE `assignment_student` (
  `stud_roll_no` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `assign_submit_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_student`
--

INSERT INTO `assignment_student` (`stud_roll_no`, `assign_id`, `assign_submit_date`, `status`, `marks`) VALUES
(1701, 1, '2017-05-22', 'submitted', 4),
(1701, 2, '2017-06-10', 'late submitted', 5),
(1702, 1, '2017-05-22', 'submitted', 9),
(1702, 2, '2017-06-10', 'submitted', 7),
(1703, 1, '2017-05-22', 'submitted', 4),
(1703, 2, '2017-06-10', 'submitted', 6),
(1704, 1, '2017-05-22', 'submitted', 7),
(1704, 2, '2017-06-10', 'submitted', 9),
(1705, 1, '2017-05-22', 'submitted', 5),
(1705, 2, '2017-06-10', 'submitted', 4),
(1706, 1, '2017-05-22', 'submitted', 8),
(1706, 2, '2017-06-10', 'submitted', 5),
(1707, 1, '2017-05-22', 'submitted', 5),
(1707, 2, '2017-06-10', 'submitted', 8),
(1708, 1, '2017-05-22', 'submitted', 7),
(1708, 2, '2017-06-10', 'submitted', 4),
(1709, 1, '2017-05-22', ' not submitted', 0),
(1709, 2, '2017-06-10', 'submitted', 6),
(1710, 1, '2017-05-22', 'submitted', 8),
(1710, 2, '2017-06-10', 'submitted', 7),
(1711, 1, '2017-05-22', 'submitted', 5),
(1711, 2, '2017-06-10', 'submitted', 8),
(1712, 1, '2017-05-22', 'submitted', 8),
(1712, 2, '2017-06-10', 'submitted', 5),
(1713, 1, '2017-05-22', 'submitted', 7),
(1713, 2, '2017-06-10', 'late submitted', 3),
(1714, 1, '2017-05-22', 'submitted', 4),
(1714, 2, '2017-06-10', 'submitted', 8),
(1715, 1, '2017-05-22', 'submitted', 5),
(1715, 2, '2017-06-10', 'submitted', 6),
(1717, 1, '2017-05-22', 'submitted', 6),
(1717, 2, '2017-06-10', 'submitted', 5),
(1718, 1, '2017-05-22', 'submitted', 9),
(1718, 2, '2017-06-10', 'submitted', 9),
(1719, 1, '2017-05-22', 'late submitted', 3),
(1719, 2, '2017-06-10', 'submitted', 7),
(1720, 1, '2017-05-22', 'submitted', 4),
(1720, 2, '2017-06-10', 'not submitted', 0),
(1721, 1, '2017-05-22', 'submitted', 5),
(1721, 2, '2017-06-10', 'submitted', 6),
(1722, 1, '2017-05-22', 'submitted', 9),
(1722, 2, '2017-06-10', 'submitted', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment_student`
--
ALTER TABLE `assignment_student`
  ADD PRIMARY KEY (`stud_roll_no`,`assign_id`),
  ADD KEY `assign_id` (`assign_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment_student`
--
ALTER TABLE `assignment_student`
  ADD CONSTRAINT `assignment_student_ibfk_1` FOREIGN KEY (`assign_id`) REFERENCES `assignment` (`assign_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_student_ibfk_2` FOREIGN KEY (`stud_roll_no`) REFERENCES `student` (`stud_roll_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
