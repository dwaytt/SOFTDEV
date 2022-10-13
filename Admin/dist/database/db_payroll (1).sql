-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 02:08 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `id` int(50) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_date` date NOT NULL,
  `announcement_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`id`, `announcement_title`, `announcement_date`, `announcement_time`) VALUES
(15, 'hello world', '2022-03-17', '00:23:22'),
(16, 'hello', '2022-03-17', '08:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance_log`
--

CREATE TABLE `tbl_attendance_log` (
  `id` int(50) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `date_in` date DEFAULT NULL,
  `site_location` varchar(255) DEFAULT NULL,
  `time_in_morning` time DEFAULT NULL,
  `time_out_morning` time DEFAULT NULL,
  `time_in_afternoon` time DEFAULT NULL,
  `time_out_afternoon` time DEFAULT NULL,
  `number_hr_morning` int(50) DEFAULT NULL,
  `number_hr_afternoon` int(50) DEFAULT NULL,
  `logstatus_morning` varchar(255) DEFAULT NULL,
  `logstatus_afternoon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendance_log`
--

INSERT INTO `tbl_attendance_log` (`id`, `user_id`, `date_in`, `site_location`, `time_in_morning`, `time_out_morning`, `time_in_afternoon`, `time_out_afternoon`, `number_hr_morning`, `number_hr_afternoon`, `logstatus_morning`, `logstatus_afternoon`) VALUES
(322, 41, '2022-03-16', 'Taguig', '07:30:00', '11:08:00', '13:08:00', '17:09:00', 4, 4, '0', '0'),
(323, 39, '2022-03-17', 'Albay', '08:15:00', '08:16:00', NULL, NULL, 0, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `leave_remaining` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(50) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `id` int(50) NOT NULL,
  `time_in_morning` varchar(255) NOT NULL,
  `time_out_morning` varchar(255) NOT NULL,
  `Sched` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`id`, `time_in_morning`, `time_out_morning`, `Sched`) VALUES
(11, '07:30', '11:30', 'M-W-F'),
(12, '08:00', '3:00', 'T-TH-S'),
(13, '07:00', '5:00', 'Weekdays');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(50) NOT NULL,
  `users_id` varchar(255) NOT NULL,
  `schedule_id` int(50) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `date_of_brith` date NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `position_id` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(50) NOT NULL,
  `date_registered` datetime NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `users_id`, `schedule_id`, `profile_pic`, `date_of_brith`, `fname`, `mname`, `lname`, `position_id`, `branch`, `contact_no`, `gender`, `address`, `password`, `role_id`, `date_registered`, `email`) VALUES
(14, '11111', 2, '', '0000-00-00', 'John Cymon', 'C.', 'Taladtad', '1', 'CDO branch', '09656604531', 'Male', 'asdsaddsad', '$2y$10$JqmArWyBoeX1TGitdnHPreCMmCz75p6cyXfPsnPHe0ZZnMN.ZFwgW', 1, '2021-12-15 19:21:28', ''),
(39, '123123', 2, '', '1990-06-12', 'kkk', 'kkk', 'kkk', '1', 'CDO branch', '09656604532', 'Male', 'Zone1 Luyong Bonbon Opol Mis. Or.', '$2y$10$Z3X/JB.b65tZLRTMAoJKUeCBFoMQXB0NRs9XMQMdsElY8CyE4/yv6', 2, '2022-03-06 18:22:06', 'kkk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_position`
--

CREATE TABLE `tbl_work_position` (
  `id` int(50) NOT NULL,
  `position` varchar(255) NOT NULL,
  `rate` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_work_position`
--

INSERT INTO `tbl_work_position` (`id`, `position`, `rate`) VALUES
(1, 'Engineer', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance_log`
--
ALTER TABLE `tbl_attendance_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_work_position`
--
ALTER TABLE `tbl_work_position`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_attendance_log`
--
ALTER TABLE `tbl_attendance_log`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_work_position`
--
ALTER TABLE `tbl_work_position`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
