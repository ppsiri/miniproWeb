-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 10:45 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentgrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `username` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  `stuid` char(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `groups` char(30) NOT NULL,
  `bdate` date NOT NULL,
  `mobile` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`username`, `password`, `stuid`, `fname`, `lname`, `groups`, `bdate`, `mobile`) VALUES
('jirasak', '81dc9bdb52d04dc20036dbd8313ed055', '6017121100522', 'jirasak', 'romsai', 'cpe.60241', '2019-12-25', '0616378303'),
('jirapan', '81dc9bdb52d04dc20036dbd8313ed055', '601712110054', 'jirapan', 'pirojwittayaporn', 'cpe.60241', '2019-12-20', '0988976654'),
('totototo', '81dc9bdb52d04dc20036dbd8313ed055', 'dkdi', 'rr', 'didid', 'aaaaaa', '2019-12-28', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `stuid` char(20) NOT NULL,
  `subid` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`stuid`, `subid`) VALUES
('6017121100522', 3),
('6017121100522', 4),
('6017121100522', 5),
('6017121100522', 6),
('6017121100522', 7),
('6017121100522', 8),
('601712110054', 9),
('601712110054', 10),
('601712110054', 11);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(1) NOT NULL,
  `subid` char(20) NOT NULL,
  `subname` varchar(50) NOT NULL,
  `credit` char(5) NOT NULL,
  `grade` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subid`, `subname`, `credit`, `grade`) VALUES
(3, '00-023-001', 'กีฬาและนันทนาการ', '3', 'A'),
(4, '04-036-201', 'กลศาสตร์', '3', 'A'),
(5, '04-063-407', 'เหมืองข้อมูล', '3', 'A'),
(6, '04-100-101', 'วัสดุวิศวกรรม', '3', 'A'),
(7, '04-061-202', 'คณิตศาสตร์ดิสครีต', '3', 'A'),
(8, '02-011-109', 'แคลคูลัส 1', '3', 'B'),
(9, '04-063-401', 'การพัฒนาโปรแกรมบนเว็บ', '1', 'F'),
(10, '04-061-309', 'ระบบปฏิบัติการ', '3', 'F'),
(11, '04-063-403', 'คอมพิวเตอร์กราฟฟิก', '3', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teachid` int(3) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachid`, `fname`, `lname`) VALUES
(1, 'สายธาร', 'เทนอิสสระ'),
(2, 'นวลละออง ', 'สระแก้ว'),
(3, 'อดุลย์', ' เปลื้องสันเทียะ'),
(4, 'ธวัชชัย', ' จารุวงศ์วิทยา'),
(5, 'กีระชาติ', 'สุขสุทธิ์'),
(6, 'พรภัสสร ', 'อ่อนเกิด'),
(7, 'เกตุกาญจน์ ', 'ไชยขันธุ์'),
(8, 'ทิพา', 'กองศรีมา');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `subid` int(1) NOT NULL,
  `teachid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`subid`, `teachid`) VALUES
(1, 3),
(3, 3),
(4, 4),
(5, 5),
(6, 2),
(7, 6),
(8, 1),
(9, 5),
(10, 8),
(11, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stuid`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`stuid`,`subid`),
  ADD KEY `FK_idsubject` (`subid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teachid`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`subid`,`teachid`),
  ADD KEY `FK_teachid` (`teachid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teachid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
