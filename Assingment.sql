-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2018 at 04:18 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3474029_aes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userId`, `name`, `phone`) VALUES
(1, 'Varada Bhatawadekar', 7719996287);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignmentId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `courseId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `uploadDate` date NOT NULL,
  `publishDate` date NOT NULL,
  `submissionDate` date NOT NULL,
  `filePath` varchar(200) NOT NULL,
  `processed` tinyint(1) NOT NULL DEFAULT '0',
  `maxMarks` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentId`, `name`, `courseId`, `userId`, `uploadDate`, `publishDate`, `submissionDate`, `filePath`, `processed`, `maxMarks`) VALUES
(25, 'Math Mid Sem 1', 104, 5, '2017-11-21', '2017-11-21', '2017-11-21', 'upload/Math_1.pdf', 1, 20.00),
(26, 'Test Assignment 1', 104, 5, '2017-11-21', '2017-11-21', '2017-11-21', 'upload/chrome_100_percent-1.pak', 1, 50.00),
(27, 'Test 2', 104, 5, '2017-11-21', '2017-11-22', '2017-11-24', 'upload/Computer-Architechture-and-Organization-Mock-Test-Papers-TGT-PGT-Computer-Science-ExamCompetition.com_.pdf', 0, 50.00),
(28, 'test', 104, 5, '2017-11-21', '2017-11-23', '2017-11-29', 'upload/test.txt', 0, 35.00),
(29, 'testrghj', 104, 5, '2017-11-21', '2017-11-21', '2017-11-21', 'upload/testrghj.txt', 0, 65.00),
(30, 'ADBMC_mid_sem1', 103, 4, '2017-08-16', '2017-08-16', '2017-08-16', 'upload/ADBMC_mid_sem1.pdf', 1, 25.00),
(31, 'ADBMC_mid_sem2', 103, 4, '2017-10-03', '2017-10-03', '2017-10-03', 'upload/ADBMC_mid_sem2.pdf', 1, 40.00),
(32, 'PPL_mid_sem1', 101, 11, '2017-08-17', '2017-08-17', '2017-08-17', 'upload/PPL_mid_sem1.pdf', 1, 30.00),
(33, 'PPL_mid_sem2', 101, 11, '2017-10-04', '2017-10-04', '2017-10-04', 'upload/PPL_mid_sem2.pdf', 1, 30.00),
(34, 'PPL_mid_sem3', 101, 11, '2017-10-30', '2017-10-30', '2017-10-30', 'upload/PPL_mid_sem3.pdf', 0, 30.00),
(35, 'PPL_End_sem1', 101, 11, '2017-12-04', '2017-12-04', '2017-12-04', 'upload/PPL_end_sem1.pdf', 0, 0.00),
(36, 'SE_mid_sem1', 102, 51, '2017-08-16', '2017-08-16', '2017-08-16', 'upload/SE_mid_sem1.pdf', 1, 20.00),
(37, 'SE_mid_sem2', 102, 51, '2017-10-03', '2017-10-03', '2017-10-03', 'upload/SE_mid_sem2.pdf', 1, 20.00),
(39, 'ADBMC_end_sem1', 102, 50, '2017-12-08', '2017-12-08', '2017-12-08', 'upload/ADBMC_end_sem1.pdf', 0, 50.00),
(40, 'maths_mid_sem1', 104, 5, '2017-08-17', '2017-08-17', '2017-08-17', 'upload/maths_mid_sem1', 1, 30.00),
(41, 'Maths mid Sem 2', 104, 5, '2017-10-04', '2017-10-04', '2017-10-04', 'upload/math_mid_sem2.pdf', 1, 30.00),
(42, 'Maths Mid sem 3', 104, 5, '2017-10-30', '2017-10-30', '2017-10-30', 'upload/math_mid_sem3.pdf', 1, 30.00),
(43, 'Maths end Sem 1', 104, 5, '2017-12-12', '2017-12-12', '2017-12-12', 'upload/maths_end_sem1.pdf', 1, 50.00),
(44, 'Test Assignment', 204, 5, '2017-12-15', '2017-12-30', '2017-12-31', 'upload/Test_Assignment.txt', 0, 50.00),
(45, 'Test Assignment 2', 304, 5, '2017-12-15', '2017-12-18', '2017-12-21', 'upload/Test_Assignment_2.txt', 0, 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `name`, `semester`) VALUES
(101, 'Principles of Programming Languages I', 1),
(102, 'Software Engineering', 1),
(103, 'Advanced Database Management Concepts', 1),
(104, 'Mathematics For Scientific Computing', 1),
(105, 'Computational Laboratory I', 1),
(201, 'Principles of Programming Languages II', 2),
(202, 'Operating System Concepts', 2),
(203, 'Elective', 2),
(204, 'Numerical Methods for Scientific Computing I', 2),
(205, 'Computational Laboratory II', 2),
(301, 'Network Concepts', 3),
(302, 'Scientific Visualization', 3),
(303, 'Elective 1', 3),
(304, 'Numerical Methods for Scientific Computing II', 3),
(305, 'Elective 2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `userId` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `permissions` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`userId`, `email`, `password`, `role`, `permissions`, `status`) VALUES
(1, 'exampleAdmin@issc.com', 'exPass123', 'admin', NULL, 1),
(2, 'exampleStudent@issc.com', 'exPass123', 'student', NULL, 1),
(3, 'exampleSubinstructor@issc.com', 'exPass123', 'subinst', 1, 1),
(4, 'exampleInstructor@issc.com', 'exPass123', 'instr', 2, 1),
(5, 'bsmita@issc.unipune.ac.in', 'exPass123', 'hod', 4, 0),
(6, 'exampleDirector@issc.com', 'exPass123', 'director', 3, 1),
(11, 'exampleAssistant@issc.com', 'exPass123', 'subinst', 5, 1),
(12, 'exStud@issc.com', 'exPass123', 'student', NULL, 1),
(14, 'babinash@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(15, 'aagarkar@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(16, 'akomal@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(17, 'aanivase@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(18, 'bvarada@issc.unipune.ac.in', 'exPass123', 'student', NULL, 0),
(19, 'bomkar@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(20, 'csayali@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(21, 'cshweta@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(22, 'gvijay@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(23, 'grohit@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(24, 'gashwini@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(25, 'gaparna@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(26, 'ishubham@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(27, 'kneeraj@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(28, 'kmubin@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(29, 'kshubhankar@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(30, 'kakhilesh@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(31, 'mnehav@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(32, 'msuraj@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(33, 'mabhijit@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(34, 'msayali@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(35, 'mnehar@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(36, 'njivan@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(37, 'ppranav@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(38, 'pashwini@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(39, 'rashish@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(40, 'sakash@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(41, 'sram@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(42, 'sprachi@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(43, 'tpritam@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(44, 'urajesh@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1),
(50, 'kganesh@issc.unipune.ac.in', 'exPass123', 'instructor', 2, 1),
(51, 'labhijit@issc.unipune.ac.in', 'exPass123', 'instructor', 2, 1),
(52, 'kaveri@issc.unipune.ac.in', 'exPass123', 'instructor', 2, 1),
(53, 'datta@issc.unipune.ac.in', 'exPass123', 'instructor', 2, 1),
(54, 'aansari@issc.unipune.ac.in', 'exPass123', 'assistant', 5, 1),
(55, 'laditi@issc.unipune.ac.in', 'exPass123', 'subinstru', 1, 1),
(56, 'pswapnil@issc.unipune.ac.in', 'exPass123', 'student', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `userId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `doj` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`userId`, `name`, `phone`, `doj`) VALUES
(4, 'Abdullah Ansari', 9876543210, NULL),
(5, 'Smita Bedekar', 9225670415, NULL),
(11, 'Amruta Pendse', 9975546019, NULL),
(50, 'ganesh kedari', 9854761234, NULL),
(51, 'abhijit limaye', 9478562147, NULL),
(52, 'kaveri kale', 9632514789, NULL),
(53, 'datta jalkote', 9210325478, NULL),
(54, 'abdullah ansari', 9601235420, NULL),
(55, 'aditi limaye', 9952001235, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_course`
--

CREATE TABLE `faculty_course` (
  `userId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_course`
--

INSERT INTO `faculty_course` (`userId`, `courseId`) VALUES
(5, 104),
(5, 204),
(5, 304),
(50, 103),
(51, 102),
(52, 101),
(53, 101),
(53, 105),
(54, 104),
(55, 104);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `userId` int(11) NOT NULL,
  `rollNo` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`userId`, `rollNo`, `name`, `dob`, `phone`, `email`, `address`) VALUES
(14, 1701, 'Abinash Biswal', '1995-02-05', 8007748243, 'abinashbiswla@gmail.com', 'AT- SRIBANTPUR  POST-CHHANPUR  VIA- KURUDA DIST- BALASORE,ODISHA PIN- 756057'),
(15, 1702, 'Agarakar Aditya Narayanrao ', '1997-02-13', 8888891314, 'adi.feb13@gmail.com', 'C-5 , LokSangam Vihar , Near Medipoint Hospital , Aundh 411007'),
(16, 1703, 'Komal Ahiwale', '1995-12-30', 9156643366, 'komala301295@gmail.com', 'safai kamgar colony, budhwar peth , phaltan, phaltan-415523'),
(17, 1704, 'Anivase Akshay Shankar', '1995-11-23', 7391901652, 'akshayanivase710@gmail.com', '11/2 erandwane sharda center resi bldg karve road pune -04'),
(18, 1705, 'Bhatwadekar Varada', '1997-01-19', 7719996287, '19varada97@gmail.com', 'A-10, Manmohan Parshwanath CHS, Bibwewadi, Pune - 411037'),
(19, 1706, 'Bhise Omkar Rajendra', '1996-09-18', 7040502517, 'omkarbhise1@gmail.com', '502 , H - wing , Rose County , Pimple Saudagar'),
(20, 1707, 'Chavan Sayali Bajirao', '1996-06-04', 8600402906, 'sayalichavan4696@gmail.com', 'A/P Dhandri Tal:Baglan Dist:Nashik'),
(21, 1708, 'Shweta Vijay Chumbalkar', '1996-01-29', 8087929604, 'shweta29chumbalkar@gmail.com', 'sr.no.14/3/1,Behind More Petrol Pump,N.D.A Road Shivane Pune 411023'),
(22, 1709, 'Gawade Vijay Ramachandra', '1996-10-21', 9168312662, 'vijaygawade614@gmail.com', 'At post pendur,newalewadi,vengurla,sindhudurg.416529'),
(23, 1710, 'Gonnade Rohit Sharadraoji', '1990-09-22', 8657789109, 'rohit_gonnade@live.in', 'Fl. No. 105, Amarnath Complex, K.D.K. College Road, Nandanvan, Nagpur - 09'),
(24, 1711, 'Gore Ashwani Sahebrao', '1996-07-07', 8888748472, 'ashwinigore03796@gmail.com', 'Fl. No. 105, Amarnath Complex, K.D.K. College Road, Nandanvan, Nagpur - 09'),
(25, 1712, 'Gurav Aparna', '1996-08-16', 9175140181, 'aparnagurav78@gmail.com', 'A/P- Devrashtre ,Tal- Kadegaon, Dist- Sangli, Pin code-415303'),
(26, 1713, 'Indurkar Shubham', '1997-01-27', 7875698493, 'shubhamindurkar6@gmail.com', 'At-p kalokhe chal, behind sanjeevani Hospital, NDA road, warje malwadi, Pune'),
(27, 1714, 'Kashyap Neeraj Narendra', '1996-10-16', 7588398724, 'neeraj1610007@gmail.com', 'V.K.Market,Devka Apartment,Flat No:14,3rd Floor,Above Dena Bank,Near Appa Halwai, Pandariba, Aurangabad.'),
(28, 1715, 'Kazi Mubin Alam', '1995-04-11', 9527295737, 'mubin0202@gmail.com', 'sai paradise, sai colony, vishranthwadi, kalas, pune - 15'),
(29, 1716, 'Keskar Shubhankar Girish', '1995-11-23', 8806092877, 'shubhankarkeskar.sk@gmail.com', 'B-602, Ecstasy, Sr. No. 55/4/2, Behind Shelke Nagar, Old Toll Plaza, Vadgaon Bk, Pune - 41.'),
(30, 1717, 'Kshirsagar Akhilesh Sudhir', '1996-10-19', 9923361422, 'kakhilesh@issc.unipune.ac.in', '124, South Shivajinagar, behind Ram Mandir, Sangli.'),
(31, 1718, 'Neha Vasant Mahajan', '1996-12-20', 9075377447, 'nehamahajan201295@gmail.com', 'Plot no- 37, Gat no- 101,near Hirashiva colony, Khotenagar, Jalgaon 425001'),
(32, 1719, 'Malpure Suraj Arvind', '1995-05-24', 9552600330, 'surajmalpure7@gmail.com', 'plot no 55, Satana naka, Borse nagar Malegaon'),
(33, 1720, 'Mane Abhijit', '1994-01-21', 9975693063, 'ababhijitmane001@gmail.com', 'At-p Vambori , Tal - Rahuri, Dist - ahmednagar'),
(34, 1721, 'Mohite Sayali Subhash', '1996-05-05', 9922941082, 'sayalimohite55@gmail.com', '34/512 Flat No.8, 2nd Floor, Om Shivtej Heights, Trimurti Chawk , Bharti Vidhyapeeth, Dhankawadi,Pune-411043'),
(35, 1722, 'Morankar Neha Rajendra', '1994-11-19', 7843020003, 'nehamorankar9@gmail.com', 'S. No.- 142, Sutar Chawl, Bhelke Nagar, Kothrud, Pune- 411038'),
(36, 1723, 'Nalavade Jivan Prakash ', '1996-05-01', 9145605582, 'jivannalavade0105@gmail.com', 'At-POst-Kumathe(Nagache), Tal-Khatav ,Dist-Satara'),
(37, 1724, 'Padhar Pranav Sanjay', '1994-05-23', 8600954909, 'padharpranav13@gmail.com', 'Aasha baba nagar plot no 19 gat no  80/1/1 near shiv colony jalgaon'),
(38, 1725, 'Patil Ashwani', '1997-02-11', 7028460318, '11ashwinipatil97@gmail.com', 'At Veruli Bk post Veruli KH Tal-Pachora Dist-Jalgaon'),
(39, 1727, 'RASANE ASHISH VIVEK', '1996-01-25', 7770071946, 'ashish.rasane@gmail.com', 'NEAR CENTRAL BANK KASAR LANE RAHURI TAL. RAHURI DIST. AHMEDNAGAR'),
(40, 1729, 'Shewale Akash Dipak', '1994-12-13', 9762656630, 'akashshewale@gmail.com', 'Wadgaon gupta,Tal- Nagar,Dist-Ahmednagar,414111'),
(41, 1731, 'Ram Bhalchandra Suryawanshi', '1993-06-23', 9623226059, 'suryawanshiram10@gmail.com', '1 Dagade Heights, Near Datta Manadir, Mali ali, Tal-Mulshi, Dist-Pune-21'),
(42, 1750, 'Sutane Prachi', '1996-02-04', 7385882995, 'prachisutane@gmail.com', 'Chandwad, Dist-Nashik Pin-423101'),
(43, 1733, 'Pritam Vijay Tilave', '1996-08-31', 7276694915, 'pritam.tilave61@gmail.com', 'House no 52, Dattawadi near mhatre bridge pune 411030'),
(44, 1734, 'Udgiri Rajesh', '1993-04-30', 9021559706, 'ruurajesh@gmail.com', '180, Guruwar Peth, shankarling mandir near milan medical solapur 413002'),
(56, 1726, 'Patil Swapnil Dagadu', '2017-11-02', 9766238238, 'patilswapnil211@gmail.com', 'At/Post :- Erandol , Tal :- Erandol , Dist :-Jalgoan');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `userId` int(11) NOT NULL,
  `assignmentId` int(11) NOT NULL,
  `marks` float(5,2) NOT NULL,
  `remarks` text,
  `submissionDate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `filePath` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`userId`, `assignmentId`, `marks`, `remarks`, `submissionDate`, `status`, `filePath`) VALUES
(14, 25, 5.00, NULL, '2017-11-21', 1, NULL),
(14, 26, 20.00, '', '2018-02-03', 1, NULL),
(14, 30, 14.00, 'need to work on ERD', '2017-08-16', 1, NULL),
(14, 31, 22.00, NULL, '2017-10-03', 1, NULL),
(14, 32, 12.00, NULL, '2017-08-17', 1, NULL),
(14, 33, 12.00, NULL, '2017-10-04', 1, NULL),
(14, 36, 8.00, NULL, '2017-08-16', 1, NULL),
(14, 37, 7.00, NULL, '2017-10-03', 1, NULL),
(14, 40, 10.00, NULL, '2017-08-17', 1, NULL),
(14, 41, 13.00, NULL, '2017-10-04', 1, NULL),
(14, 42, 25.00, 'good', '2017-10-30', 0, NULL),
(14, 43, 23.00, NULL, '2017-12-12', 1, NULL),
(15, 25, 4.00, NULL, '2017-11-21', 1, NULL),
(15, 40, 12.00, NULL, '2017-08-17', 1, NULL),
(15, 41, 16.00, NULL, '2017-10-04', 1, NULL),
(15, 42, 5.00, 'poor', '2017-10-30', 1, NULL),
(15, 43, 33.00, NULL, '2017-12-12', 1, NULL),
(16, 25, 14.00, NULL, '2017-11-21', 1, NULL),
(16, 40, 10.00, NULL, '2017-08-17', 1, NULL),
(16, 41, 20.00, NULL, '2017-10-04', 1, NULL),
(16, 42, 12.00, NULL, '2017-10-30', 1, NULL),
(16, 43, 32.00, NULL, '2017-12-12', 1, NULL),
(17, 25, 4.00, NULL, '2017-11-21', 1, NULL),
(17, 40, 14.00, NULL, '2017-08-17', 1, NULL),
(17, 41, 15.00, NULL, '2017-10-04', 1, NULL),
(17, 42, 12.00, NULL, '2017-10-30', 1, NULL),
(17, 43, 20.00, NULL, '2017-12-12', 1, NULL),
(18, 25, 18.00, 'good graphs..', '2017-11-21', 1, NULL),
(18, 26, 12.00, '', '2018-02-02', 1, NULL),
(18, 36, 0.00, NULL, '2018-02-02', 1, 'submit/complex.hpp'),
(18, 40, 22.00, NULL, '2017-08-17', 1, NULL),
(18, 41, 15.00, NULL, '2017-10-04', 1, NULL),
(18, 42, 20.00, NULL, '2017-10-30', 1, NULL),
(18, 43, 35.00, NULL, '2017-12-12', 1, NULL),
(19, 25, 12.00, NULL, '2017-11-21', 1, NULL),
(19, 40, 21.00, NULL, '2017-08-17', 1, NULL),
(19, 41, 9.00, NULL, '2017-10-04', 1, NULL),
(19, 42, 14.00, NULL, '2017-10-30', 1, NULL),
(19, 43, 25.00, NULL, '2017-12-12', 1, NULL),
(20, 25, 8.00, NULL, '2017-11-21', 1, NULL),
(20, 40, 12.00, NULL, '2017-08-17', 1, NULL),
(20, 41, 16.00, NULL, '2017-10-04', 1, NULL),
(20, 42, 14.00, NULL, '2017-10-30', 1, NULL),
(20, 43, 31.00, NULL, '2017-12-12', 1, NULL),
(36, 26, 13.00, '', '2018-02-02', 1, NULL),
(41, 25, 11.00, NULL, '2017-11-17', 1, NULL),
(41, 40, 18.00, NULL, '2017-08-17', 1, NULL),
(41, 41, 17.00, NULL, '2017-10-04', 1, NULL),
(41, 42, 21.00, NULL, '2017-10-30', 1, NULL),
(41, 43, 31.00, NULL, '2017-12-12', 1, NULL),
(42, 25, 15.00, NULL, '2017-11-21', 1, NULL),
(42, 40, 21.00, NULL, '2017-08-17', 1, NULL),
(42, 41, 24.00, NULL, '2017-10-21', 1, NULL),
(42, 42, 24.00, NULL, '2017-10-30', 1, NULL),
(42, 43, 32.00, NULL, '2017-12-12', 1, NULL),
(43, 25, 12.00, NULL, '2017-11-17', 1, NULL),
(43, 40, 24.00, NULL, '2017-08-17', 1, NULL),
(43, 41, 21.00, NULL, '2017-10-04', 1, NULL),
(43, 42, 20.00, NULL, '2017-10-30', 1, NULL),
(43, 43, 39.00, NULL, '2017-12-12', 1, NULL),
(44, 25, 12.00, NULL, '2017-11-21', 1, NULL),
(44, 40, 22.00, NULL, '2017-08-17', 1, NULL),
(44, 41, 24.00, NULL, '2017-10-04', 1, NULL),
(44, 42, 19.00, NULL, '2017-10-30', 1, NULL),
(44, 43, 29.00, NULL, '2017-12-12', 1, NULL),
(56, 25, 15.00, NULL, '2017-11-21', 1, NULL),
(56, 40, 21.00, NULL, '2017-08-17', 1, NULL),
(56, 41, 22.00, NULL, '2017-10-17', 1, NULL),
(56, 42, 25.00, NULL, '2017-10-17', 1, NULL),
(56, 43, 35.00, NULL, '2017-12-12', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `userId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`userId`, `courseId`) VALUES
(14, 101),
(14, 102),
(14, 103),
(14, 104),
(14, 105),
(18, 101),
(18, 102),
(18, 103),
(18, 104),
(18, 105),
(36, 101),
(36, 102),
(36, 103),
(36, 104),
(36, 105);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userId_2` (`userId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentId`),
  ADD KEY `courseId` (`courseId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `faculty_course`
--
ALTER TABLE `faculty_course`
  ADD PRIMARY KEY (`userId`,`courseId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userId` (`userId`),
  ADD UNIQUE KEY `rollNo` (`rollNo`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`userId`,`assignmentId`),
  ADD KEY `userId` (`userId`,`assignmentId`),
  ADD KEY `assignmentId` (`assignmentId`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`userId`,`courseId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `courseId` (`courseId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `credentials` (`userId`);

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`),
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `faculty` (`userId`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `credentials` (`userId`);

--
-- Constraints for table `faculty_course`
--
ALTER TABLE `faculty_course`
  ADD CONSTRAINT `faculty_course_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`),
  ADD CONSTRAINT `faculty_course_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `faculty` (`userId`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `credentials` (`userId`);

--
-- Constraints for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD CONSTRAINT `student_assignment_ibfk_1` FOREIGN KEY (`assignmentId`) REFERENCES `assignment` (`assignmentId`),
  ADD CONSTRAINT `student_assignment_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `student` (`userId`);

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`),
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `student` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
