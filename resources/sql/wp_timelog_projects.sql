-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2016 at 05:24 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csharp_timelog`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_timelog_projects`
--

CREATE TABLE IF NOT EXISTS `wp_timelog_projects` (
`id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `vacancy` int(11) NOT NULL,
  `work_require` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_timelog_projects`
--

INSERT INTO `wp_timelog_projects` (`id`, `title`, `description`, `type`, `rate`, `duration`, `vacancy`, `work_require`, `status`, `created_at`, `update_at`) VALUES
(1, 'PHP - DEVELOPER ( SINIOR )', 'We sinior php developer in our company urgently, please apply now to get started!', 'monthly', '$500', 'more than 1 year', 1, '', 0, '2016-06-30 13:41:28', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_timelog_projects`
--
ALTER TABLE `wp_timelog_projects`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_timelog_projects`
--
ALTER TABLE `wp_timelog_projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
