-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 02:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asset`
--

-- --------------------------------------------------------

--
-- Table structure for table `hr_depart`
--

CREATE TABLE `hr_depart` (
  `depart_id` int(11) NOT NULL,
  `depart_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faction_id` int(11) NOT NULL,
  `depart_pubilc` enum('Y','N') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_depart`
--

INSERT INTO `hr_depart` (`depart_id`, `depart_name`, `faction_id`, `depart_pubilc`) VALUES
(1, 'departments', 1, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `hr_duty`
--

CREATE TABLE `hr_duty` (
  `duty_id` int(11) NOT NULL,
  `duty_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `duty_lv` int(11) NOT NULL,
  `duty_pubilc` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_duty`
--

INSERT INTO `hr_duty` (`duty_id`, `duty_name`, `duty_lv`, `duty_pubilc`) VALUES
(1, 'duty ทดสอบ', 1, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `hr_faction`
--

CREATE TABLE `hr_faction` (
  `faction_id` int(11) NOT NULL,
  `faction_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faction_pubilc` enum('Y','N') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_faction`
--

INSERT INTO `hr_faction` (`faction_id`, `faction_name`, `faction_pubilc`) VALUES
(1, 'faction ทดสอบ', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `hr_level`
--

CREATE TABLE `hr_level` (
  `level_id` int(11) NOT NULL,
  `person_id` varbinary(255) NOT NULL,
  `duty_id` int(11) NOT NULL,
  `faction_id` int(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_level`
--

INSERT INTO `hr_level` (`level_id`, `person_id`, `duty_id`, `faction_id`, `depart_id`, `ward_id`) VALUES
(1, 0x01, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_office_sit`
--

CREATE TABLE `hr_office_sit` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `office_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `office_token` longtext COLLATE utf8_unicode_ci NOT NULL,
  `office_pubilc` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `faction_id` int(11) DEFAULT 0,
  `depart_id` int(11) DEFAULT 0,
  `ward_id` int(11) DEFAULT 0,
  `user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `user_update` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_office_sit`
--

INSERT INTO `hr_office_sit` (`office_id`, `office_name`, `office_tel`, `office_token`, `office_pubilc`, `faction_id`, `depart_id`, `ward_id`, `user`, `time`, `user_update`, `time_update`) VALUES
(1, 'og=ffice ทดสอบ', '6783', '', 'N', 2, 2, 2, NULL, '2022-02-07 16:30:21', NULL, '2022-02-07 16:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `hr_personal`
--

CREATE TABLE `hr_personal` (
  `person_id` varbinary(255) NOT NULL,
  `person_prefix` int(11) NOT NULL,
  `person_firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person_lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person_sex` enum('1','2') COLLATE utf8_unicode_ci NOT NULL,
  `person_cult` enum('1','2','3','4') COLLATE utf8_unicode_ci NOT NULL,
  `person_blood` int(11) NOT NULL,
  `person_status` enum('1','2','3','4','5') COLLATE utf8_unicode_ci NOT NULL,
  `person_birth` date NOT NULL,
  `person_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `person_moo` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `person_road` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person_tumbon` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `person_amphur` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `person_province` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `person_postcode` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `person_noT` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `person_mooT` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `person_roadT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person_tumbonT` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `person_amphurT` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `person_provinceT` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `person_postcodeT` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `person_tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `person_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person_da` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `person_ma` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `person_nopo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `money_id` int(11) NOT NULL,
  `typeac_id` int(11) NOT NULL,
  `ac_id` int(11) NOT NULL,
  `typeposition_id` int(11) NOT NULL,
  `wo_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `po_level_id` int(11) NOT NULL,
  `profession_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `office_po` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `person_singin` date NOT NULL,
  `person_state` int(11) NOT NULL,
  `person_univer` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `person_course` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `person_startdate` date NOT NULL,
  `person_enddate` date NOT NULL,
  `person_username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `person_password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `person_datetime` datetime NOT NULL,
  `person_op` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `person_photo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `person_right` int(11) NOT NULL DEFAULT 2,
  `person_page` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'home.php',
  `person_menu` int(11) NOT NULL DEFAULT 1,
  `person_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person_forget` int(11) DEFAULT 0,
  `person_lock` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `person_ban` datetime DEFAULT NULL,
  `user_update` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_personal`
--

INSERT INTO `hr_personal` (`person_id`, `person_prefix`, `person_firstname`, `person_lastname`, `person_sex`, `person_cult`, `person_blood`, `person_status`, `person_birth`, `person_no`, `person_moo`, `person_road`, `person_tumbon`, `person_amphur`, `person_province`, `person_postcode`, `person_noT`, `person_mooT`, `person_roadT`, `person_tumbonT`, `person_amphurT`, `person_provinceT`, `person_postcodeT`, `person_tel`, `person_email`, `person_da`, `person_ma`, `person_nopo`, `position_id`, `money_id`, `typeac_id`, `ac_id`, `typeposition_id`, `wo_id`, `po_id`, `po_level_id`, `profession_id`, `office_id`, `office_po`, `person_singin`, `person_state`, `person_univer`, `person_course`, `person_startdate`, `person_enddate`, `person_username`, `person_password`, `person_datetime`, `person_op`, `person_photo`, `person_right`, `person_page`, `person_menu`, `person_token`, `person_forget`, `person_lock`, `person_ban`, `user_update`, `time_update`) VALUES
(0x01, 1, 'sarawut', 'aoudkla', '1', '', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 0, 1, 1, 1, 1, 1, 1, 1, 1, '', '0000-00-00', 0, '', '', '0000-00-00', '0000-00-00', 'user', '123456', '2022-02-07 16:31:49', '', '', 2, 'home.php', 1, '', 0, 'N', '2022-02-07 16:31:49', NULL, '2022-02-07 16:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `hr_ward`
--

CREATE TABLE `hr_ward` (
  `ward_id` int(11) NOT NULL,
  `ward_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ward_token` longtext COLLATE utf8_unicode_ci NOT NULL,
  `faction_id` int(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `ward_pct` int(11) NOT NULL,
  `hosward_id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `ward_pubilc` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `user_update` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_ward`
--

INSERT INTO `hr_ward` (`ward_id`, `ward_name`, `ward_token`, `faction_id`, `depart_id`, `ward_pct`, `hosward_id`, `ward_pubilc`, `user`, `time`, `user_update`, `time_update`) VALUES
(1, 'ทดสอบ', '', 1, 1, 1, '1', 'N', NULL, '2022-02-07 16:30:00', NULL, '2022-02-07 16:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hr_depart`
--
ALTER TABLE `hr_depart`
  ADD PRIMARY KEY (`depart_id`);

--
-- Indexes for table `hr_duty`
--
ALTER TABLE `hr_duty`
  ADD PRIMARY KEY (`duty_id`);

--
-- Indexes for table `hr_faction`
--
ALTER TABLE `hr_faction`
  ADD PRIMARY KEY (`faction_id`);

--
-- Indexes for table `hr_level`
--
ALTER TABLE `hr_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `hr_office_sit`
--
ALTER TABLE `hr_office_sit`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `hr_personal`
--
ALTER TABLE `hr_personal`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `hr_ward`
--
ALTER TABLE `hr_ward`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hr_depart`
--
ALTER TABLE `hr_depart`
  MODIFY `depart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `hr_duty`
--
ALTER TABLE `hr_duty`
  MODIFY `duty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hr_faction`
--
ALTER TABLE `hr_faction`
  MODIFY `faction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hr_level`
--
ALTER TABLE `hr_level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2986;

--
-- AUTO_INCREMENT for table `hr_office_sit`
--
ALTER TABLE `hr_office_sit`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `hr_ward`
--
ALTER TABLE `hr_ward`
  MODIFY `ward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
