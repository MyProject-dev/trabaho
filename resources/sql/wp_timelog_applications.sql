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
-- Table structure for table `wp_timelog_applications`
--

CREATE TABLE IF NOT EXISTS `wp_timelog_applications` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `resume` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_timelog_applications`
--

INSERT INTO `wp_timelog_applications` (`id`, `user_id`, `project_id`, `subject`, `message`, `resume`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', 'Hi, I am sinior php developer and I would like to apply this job oppurtunity, please contact me at skype id at: jesus.erwin.suarez143\r\n\r\nregards,\r\nJesus', '', 1, '2016-06-30 13:43:11', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_timelog_applications`
--
ALTER TABLE `wp_timelog_applications`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_timelog_applications`
--
ALTER TABLE `wp_timelog_applications`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
