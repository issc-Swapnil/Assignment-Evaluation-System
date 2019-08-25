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
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `user_id` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`user_id`, `user_email`, `password`, `user_role`, `status`) VALUES
('1701', 'abc@gmail.com', 'wgfuewu', 'student', 'activated'),
('admin1', 'asd3@gmail.com', 'ndnw', 'admin', 'activated'),
('fac9', 'asdb6@gmail.com', 'wgfuewu', 'instructor', 'activated'),
('fac5', 'asdf@gmail.com', 'wgfuewu', 'instructor', 'activated'),
('fac10', 'bhib8@gmail.com', 'wgfuewu', 'instructor', 'activated'),
('1711', 'bjbb@gmail.com', 'wgfuewu', 'student', 'activated'),
('fac12', 'cghb0@gmail.com', 'wgfuewu', 'sub instructor', 'activated'),
('fac11', 'ctyvh6@gmail.com', 'wgfuewu', 'sub instructor', 'activated'),
('fac6', 'erty@gmail.com', 'wgfuewu', 'sub instructor', 'activated'),
('1705', 'fyug@gmail.com', 'wgfuewu', 'student', 'activated'),
('1703', 'grw@gmail.com', 'wgfuewu', 'student', 'activated'),
('1712', 'gyg@gmail.com', 'wgfuewu', 'student', 'activated'),
('fac2', 'jbibui@gmail.com', 'wgfuewu', 'HOD', 'activated'),
('admin2', 'mju@gmail.com', 'fugowh', 'admin', 'activated'),
('1713', 'mnb@gmail.com', 'wgfuewu', 'student', 'activated'),
('1702', 'mrg@gmail.com', 'wgfuewu', 'student', 'activated'),
('1704', 'njx@gmail.com', 'wgfuewu', 'student', 'activated'),
('1707', 'nmion@gmail.com', 'wgfuewu', 'student', 'activated'),
('fac7', 'tyu@gmail.com', 'wgfuewu', 'sub instructor', 'activated'),
('fac1', 'vtv@gmail.com', 'wgfuewu', 'director', 'activated'),
('1715', 'vuvy@gmail.com', 'wgfuewu', 'student', 'activated'),
('1708', 'w4a3@gmail.com', 'wgfuewu', 'student', 'activated'),
('fac8', 'xcvb@gmail.com', 'wgfuewu', 'sub instructor', 'activated'),
('1710', 'xex4@gmail.com', 'wgfuewu', 'student', 'activated'),
('1706', 'xxrx@gmail.com', 'wgfuewu', 'student', 'activated'),
('fac4', 'yubj@gmail.com', 'wgfuewu', 'instructor', 'activated'),
('1709', 'yug5@gmail.com', 'wgfuewu', 'student', 'activated'),
('1714', 'zexfg@gmail.com', 'wgfuewu', 'student', 'activated'),
('fac3', 'zez5@gmail.com', 'wgfuewu', 'instructor', 'activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`user_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
