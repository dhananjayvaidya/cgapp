-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2019 at 06:20 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CGApp`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_desc` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `start_date` int(11) NOT NULL DEFAULT '0',
  `end_date` int(11) NOT NULL DEFAULT '0',
  `timestamp` int(11) NOT NULL DEFAULT '0',
  `mod_timestamp` int(11) NOT NULL DEFAULT '0',
  `etms` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_desc`, `status`, `start_date`, `end_date`, `timestamp`, `mod_timestamp`, `etms`) VALUES
(6, 'abc', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 1559328722, 1559328722, 1559328722, 1559328722, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_selected`
--

CREATE TABLE `course_selected` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `timestamp` int(11) NOT NULL DEFAULT '0',
  `mod_timestamp` int(11) NOT NULL DEFAULT '0',
  `etms` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `role` varchar(10) NOT NULL,
  `timestamp` int(11) NOT NULL DEFAULT '0',
  `mod_timestamp` int(11) NOT NULL DEFAULT '0',
  `etms` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `parent_id`, `role`, `timestamp`, `mod_timestamp`, `etms`) VALUES
(1, 'abc', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', 1559328722, 1559328722, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_selected`
--
ALTER TABLE `course_selected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_selected`
--
ALTER TABLE `course_selected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
