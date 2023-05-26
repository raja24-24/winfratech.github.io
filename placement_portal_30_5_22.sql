-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 01:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `status`) VALUES
(1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `resume_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `birthdate` varchar(50) DEFAULT NULL,
  `mother_tongue` varchar(255) DEFAULT NULL,
  `languages_known` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `marital_status` enum('Single','Married','Divorced') DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `address_1` text DEFAULT NULL,
  `address_2` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `academic_details` text DEFAULT NULL,
  `project_details` text DEFAULT NULL,
  `project_title` varchar(255) DEFAULT NULL,
  `role_play` varchar(255) DEFAULT NULL,
  `team_size` int(20) DEFAULT NULL,
  `project_description` text DEFAULT NULL,
  `technical_skills` text DEFAULT NULL,
  `key_skills` text DEFAULT NULL,
  `personality_traits` text DEFAULT NULL,
  `achivements` text DEFAULT NULL,
  `group_department` varchar(255) DEFAULT NULL,
  `percentage` varchar(50) DEFAULT NULL,
  `workshops_seminars` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`resume_id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `gender`, `birthdate`, `mother_tongue`, `languages_known`, `nationality`, `marital_status`, `profile_photo`, `address_1`, `address_2`, `state`, `postcode`, `city`, `country`, `academic_details`, `project_details`, `project_title`, `role_play`, `team_size`, `project_description`, `technical_skills`, `key_skills`, `personality_traits`, `achivements`, `group_department`, `percentage`, `workshops_seminars`, `created_by`, `created_at`) VALUES

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `applied_company` text DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `applied_company`, `role`) VALUES

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`resume_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `resume_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
