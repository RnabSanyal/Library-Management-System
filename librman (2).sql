-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 04:34 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librman`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `passwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `passwd`) VALUES
('decilus', 'greenlantern'),
('sharanya', 'aaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `title` varchar(200) NOT NULL,
  `id` bigint(20) NOT NULL,
  `author` varchar(200) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `orders` varchar(50) DEFAULT NULL,
  `borrows` varchar(50) DEFAULT NULL,
  `stud_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`title`, `id`, `author`, `genre`, `orders`, `borrows`, `stud_id`) VALUES
('Harry Potter', 1, 'J.K. Rowling', 'Fiction', NULL, NULL, NULL),
('Potter Guide', 3, 'XYZ', 'Learn', NULL, NULL, NULL),
('Operating System Concepts', 5, 'Avi Silberschatz, Peter Galvin, Greg Gagne', 'Reference, Compter Science', NULL, NULL, NULL),
('Operating System Concepts', 6, 'Avi Silberschatz, Peter Galvin, Greg Gagne', 'Reference, Compter Science', NULL, NULL, NULL),
('Operating Systems: Internals and Design Principles', 7, 'William Stallings', 'Refernce, Computer Science', NULL, '1493842351', '314arnab3836'),
('Operating Systems: A Concept-Based Approach', 8, 'D. M. Dhamdhere', 'Reference, Computer Science', '1493820562', NULL, '314arnab3836'),
('Operating Systems: A Concept-Based Approach', 9, 'D. M. Dhamdhere', 'Reference, Computer Science', NULL, NULL, NULL),
('DISTRIBUTED OPERATING SYSTEMS:CONCEPTS AND DESIGN', 10, 'Pradip K. Sinha', 'Reference, Computer Science', NULL, NULL, NULL),
('DISTRIBUTED OPERATING SYSTEMS:CONCEPTS AND DESIGN', 11, 'Pradip K. Sinha', 'Reference, Computer Science', NULL, NULL, NULL),
('Distributed System', 12, 'XYZ', 'Reference, Computer Science', NULL, NULL, NULL),
('Distributed System', 13, 'XYZ', 'Reference, Computer Science', NULL, NULL, NULL),
('Data Structures ', 14, 'someone', 'Reference, Computer Science', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` text NOT NULL,
  `id` varchar(50) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `passwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `id`, `phone_no`, `passwd`) VALUES
('Arnab Sanyal', '314arnab3836', 8855974247, 'aaaaa'),
('Sharanya Hegde', 'sharanya', 9967079223, 'aaaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
