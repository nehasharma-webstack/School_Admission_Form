-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 06:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_details`
--

CREATE TABLE `admission_details` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `m_qualification` varchar(50) NOT NULL,
  `f_qualification` varchar(50) NOT NULL,
  `m_res_address` varchar(100) NOT NULL,
  `f_res_address` varchar(100) NOT NULL,
  `m_email` varchar(70) NOT NULL,
  `f_email` varchar(70) NOT NULL,
  `m_occupation` varchar(50) NOT NULL,
  `f_occupation` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `m_official_address` varchar(100) NOT NULL,
  `f_official_address` varchar(100) NOT NULL,
  `m_income` float NOT NULL,
  `f_income` float NOT NULL,
  `single_girl_child` varchar(11) NOT NULL,
  `specially_abled` varchar(11) NOT NULL,
  `belong_ews` varchar(11) NOT NULL,
  `category` varchar(11) NOT NULL,
  `aadhar_number` varchar(20) DEFAULT NULL,
  `last_school` varchar(50) NOT NULL,
  `last_school_name` varchar(100) DEFAULT NULL,
  `last_school_address` varchar(100) DEFAULT NULL,
  `last_class` varchar(20) NOT NULL,
  `last_school_affiliated` varchar(100) NOT NULL,
  `other_board` varchar(100) DEFAULT NULL,
  `transfer_cert_no` varchar(50) NOT NULL,
  `issued_date` date NOT NULL,
  `sibling_name` varchar(100) DEFAULT 'NA',
  `sibling_relation` varchar(100) DEFAULT 'NA',
  `sibling_age` int(11) DEFAULT NULL,
  `sibling_school_name` varchar(100) DEFAULT 'NA',
  `subject_details` text NOT NULL,
  `session` varchar(50) NOT NULL,
  `admission_class` varchar(50) NOT NULL,
  `profile_photo_path` varchar(100) NOT NULL,
  `dob_file_path` varchar(100) NOT NULL,
  `category_file_path` varchar(100) NOT NULL,
  `aadhar_file_path` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_details`
--
ALTER TABLE `admission_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_details`
--
ALTER TABLE `admission_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
