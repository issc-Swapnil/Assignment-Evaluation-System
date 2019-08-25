-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 04:04 AM
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
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `stud_roll_no` int(11) NOT NULL,
  `course_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`stud_roll_no`, `course_id`) VALUES
(1701, 'sc101'),
(1701, 'sc102'),
(1701, 'sc103'),
(1701, 'sc104'),
(1702, 'sc101'),
(1702, 'sc102'),
(1702, 'sc103'),
(1702, 'sc104'),
(1703, 'sc101'),
(1703, 'sc102'),
(1703, 'sc103'),
(1703, 'sc104'),
(1704, 'sc101'),
(1704, 'sc102'),
(1704, 'sc103'),
(1704, 'sc104'),
(1705, 'sc101'),
(1705, 'sc102'),
(1705, 'sc103'),
(1705, 'sc104'),
(1706, 'sc101'),
(1706, 'sc102'),
(1706, 'sc103'),
(1706, 'sc104'),
(1707, 'sc101'),
(1707, 'sc102'),
(1707, 'sc103'),
(1707, 'sc104'),
(1708, 'sc101'),
(1708, 'sc102'),
(1708, 'sc103'),
(1708, 'sc104'),
(1709, 'sc101'),
(1709, 'sc102'),
(1709, 'sc103'),
(1709, 'sc104'),
(1710, 'sc101'),
(1710, 'sc102'),
(1710, 'sc103'),
(1710, 'sc104'),
(1711, 'sc101'),
(1711, 'sc102'),
(1711, 'sc103'),
(1711, 'sc104'),
(1712, 'sc101'),
(1712, 'sc102'),
(1712, 'sc103'),
(1712, 'sc104'),
(1713, 'sc101'),
(1713, 'sc102'),
(1713, 'sc103'),
(1713, 'sc104'),
(1714, 'sc101'),
(1714, 'sc102'),
(1714, 'sc103'),
(1714, 'sc104'),
(1715, 'sc101'),
(1715, 'sc102'),
(1715, 'sc103'),
(1715, 'sc104'),
(1716, 'sc101'),
(1716, 'sc102'),
(1716, 'sc103'),
(1716, 'sc104'),
(1717, 'sc101'),
(1717, 'sc102'),
(1717, 'sc103'),
(1717, 'sc104'),
(1718, 'sc101'),
(1718, 'sc102'),
(1718, 'sc103'),
(1718, 'sc104'),
(1719, 'sc101'),
(1719, 'sc102'),
(1719, 'sc103'),
(1719, 'sc104'),
(1720, 'sc101'),
(1720, 'sc102'),
(1720, 'sc103'),
(1720, 'sc104'),
(1721, 'sc101'),
(1721, 'sc102'),
(1721, 'sc103'),
(1721, 'sc104'),
(1722, 'sc101'),
(1722, 'sc102'),
(1722, 'sc103'),
(1722, 'sc104'),
(1723, 'sc101'),
(1723, 'sc102'),
(1723, 'sc103'),
(1723, 'sc104'),
(1724, 'sc101'),
(1724, 'sc102'),
(1724, 'sc103'),
(1724, 'sc104'),
(1725, 'sc101'),
(1725, 'sc102'),
(1725, 'sc103'),
(1725, 'sc104'),
(1727, 'sc101'),
(1727, 'sc102'),
(1727, 'sc103'),
(1727, 'sc104'),
(1729, 'sc101'),
(1729, 'sc102'),
(1729, 'sc103'),
(1729, 'sc104'),
(1731, 'sc101'),
(1731, 'sc102'),
(1731, 'sc103'),
(1731, 'sc104'),
(1732, 'sc101'),
(1732, 'sc102'),
(1732, 'sc103'),
(1732, 'sc104'),
(1733, 'sc101'),
(1733, 'sc102'),
(1733, 'sc103'),
(1733, 'sc104'),
(1734, 'sc101'),
(1734, 'sc102'),
(1734, 'sc103'),
(1734, 'sc104'),
(1735, 'sc101'),
(1735, 'sc102'),
(1735, 'sc103'),
(1735, 'sc104'),
(1736, 'sc101'),
(1736, 'sc102'),
(1736, 'sc103'),
(1736, 'sc104'),
(1737, 'sc101'),
(1737, 'sc102'),
(1737, 'sc103'),
(1737, 'sc104');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`stud_roll_no`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`stud_roll_no`) REFERENCES `student` (`stud_roll_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
