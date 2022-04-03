-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 06:03 PM
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
-- Database: `db_meeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acces`
--

CREATE TABLE `tbl_acces` (
  `ev_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_acces`
--

INSERT INTO `tbl_acces` (`ev_id`, `to_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 1),
(2, 3),
(2, 4),
(3, 1),
(3, 5),
(3, 7),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 10),
(6, 11),
(6, 16),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 10),
(7, 11),
(7, 16),
(8, 1),
(8, 3),
(8, 4),
(8, 5),
(9, 4),
(9, 5),
(10, 4),
(10, 5),
(17, 13),
(17, 14),
(17, 15),
(17, 16),
(18, 1),
(18, 2),
(18, 3),
(18, 16),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 10),
(19, 11),
(19, 12),
(19, 13),
(19, 14),
(19, 15),
(19, 16),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(20, 6),
(20, 7),
(20, 8),
(20, 10),
(20, 11),
(20, 12),
(20, 13),
(20, 14),
(20, 15),
(20, 16),
(21, 12),
(21, 13),
(21, 14),
(21, 15),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(23, 6),
(23, 7),
(23, 8),
(23, 10),
(23, 11),
(23, 12),
(23, 13),
(23, 14),
(23, 15),
(23, 16),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(24, 6),
(24, 7),
(24, 8),
(24, 10),
(24, 11),
(24, 12),
(24, 13),
(24, 14),
(24, 15),
(24, 16),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(25, 6),
(25, 7),
(25, 8),
(25, 10),
(25, 11),
(25, 12),
(25, 13),
(25, 14),
(25, 15),
(25, 16),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 5),
(26, 6),
(26, 7),
(26, 8),
(26, 10),
(26, 11),
(26, 12),
(26, 13),
(26, 14),
(26, 15),
(26, 16),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(27, 6),
(27, 7),
(27, 8),
(27, 10),
(27, 11),
(27, 12),
(27, 13),
(27, 14),
(27, 15),
(27, 16),
(28, 1),
(28, 2),
(28, 3),
(28, 5),
(29, 1),
(29, 2),
(29, 3),
(29, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `de_id` int(10) NOT NULL,
  `de_name` varchar(50) NOT NULL COMMENT 'ชื่อแผนก',
  `de_phone` varchar(10) NOT NULL COMMENT 'เบอร์ติดต่อแผนก'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลแผนก';

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`de_id`, `de_name`, `de_phone`) VALUES
(1, 'ศูนย์คอมพิวเตอร์', '4589'),
(2, 'งานธุรการ', '5967'),
(3, 'งานคลังพัสดุ', '1705'),
(4, 'งานวัสดุการแพทย์', '1502'),
(7, 'งานเวชระเบียน', '9658'),
(8, 'งานโสตทัศนศีกษา', '4563'),
(9, 'งานประชาสัมพันธ์', '8745');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `ev_id` int(11) NOT NULL,
  `ev_title` varchar(256) NOT NULL COMMENT 'ชื่อโครงการ/อีเว้นท์',
  `ev_startdate` date NOT NULL,
  `ev_enddate` date NOT NULL,
  `ev_starttime` time NOT NULL,
  `ev_endtime` time NOT NULL,
  `ev_color` varchar(15) NOT NULL DEFAULT '#FFFFFF',
  `ev_createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ev_people` int(5) NOT NULL COMMENT 'จำนวนคนเข้าประชุม',
  `ev_status` int(1) NOT NULL,
  `ev_url` varchar(300) NOT NULL,
  `ev_bgcolor` varchar(15) NOT NULL DEFAULT '#FFFFFF',
  `ev_repeatday` varchar(20) NOT NULL COMMENT 'การจองซ้ำ',
  `event_id` varchar(15) NOT NULL COMMENT 'Ex.64040000x',
  `st_id` int(10) NOT NULL COMMENT 'id_style',
  `id` varbinary(255) NOT NULL COMMENT 'id_user',
  `ro_id` int(5) NOT NULL COMMENT 'id_rooms',
  `ev_toolmore` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`ev_id`, `ev_title`, `ev_startdate`, `ev_enddate`, `ev_starttime`, `ev_endtime`, `ev_color`, `ev_createdate`, `ev_people`, `ev_status`, `ev_url`, `ev_bgcolor`, `ev_repeatday`, `event_id`, `st_id`, `id`, `ro_id`, `ev_toolmore`) VALUES
(1, 'พัฒนาคุณภาพงาน', '2022-02-01', '2022-02-02', '09:00:00', '12:00:00', '#FFFFFF', '2021-04-08 02:21:37', 50, 3, '', '#FFFFFF', '', '640400001', 1, 0x9105bb0b6745447b4890d6e424d4de22, 2, NULL),
(2, 'พัฒนาคุณภาพงาน', '2022-02-02', '2022-02-02', '09:00:00', '12:00:00', '#FFFFFF', '2021-04-08 02:21:37', 50, 3, '', '#FFFFFF', '', '640400001', 1, 0x9105bb0b6745447b4890d6e424d4de22, 2, NULL),
(3, 'โครงการอบรมป้องกันโควิด-19', '2022-02-05', '2022-02-05', '08:30:00', '15:30:00', '#FFFFFF', '2021-04-08 02:23:54', 200, 3, '', '#FFFFFF', '', '640400002', 3, 0x9105bb0b6745447b4890d6e424d4de22, 3, NULL),
(4, 'โครงการอบรมและพัฒนางาน', '2022-03-31', '2022-04-01', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-08 02:30:23', 20, 4, '', '#FFFFFF', '', '640400003', 3, 0x9105bb0b6745447b4890d6e424d4de22, 4, NULL),
(5, 'โครงการอบรมและพัฒนางาน', '2022-04-01', '2022-04-01', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-08 02:30:23', 20, 4, '', '#FFFFFF', '', '640400003', 3, 0x9105bb0b6745447b4890d6e424d4de22, 4, NULL),
(6, 'โครงการอบรมประจำปี พ.ศ. 2564', '2022-02-06', '2022-02-07', '10:00:00', '12:00:00', '#FFFFFF', '2021-04-08 02:36:06', 5, 3, '', '#FFFFFF', '', '640400004', 3, 0x9105bb0b6745447b4890d6e424d4de22, 6, NULL),
(7, 'โครงการอบรมประจำปี พ.ศ. 2564', '2022-02-07', '2022-02-07', '10:00:00', '12:00:00', '#FFFFFF', '2021-04-08 02:36:06', 5, 3, '', '#FFFFFF', '', '640400004', 3, 0x9105bb0b6745447b4890d6e424d4de22, 6, NULL),
(9, 'ประชุมด้านการแพทย์', '2022-02-05', '2022-02-06', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-08 02:38:12', 25, 3, '', '#FFFFFF', '', '640400006', 1, 0x9105bb0b6745447b4890d6e424d4de22, 2, NULL),
(10, 'ประชุมด้านการแพทย์', '2022-02-06', '2022-02-06', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-08 02:38:12', 25, 3, '', '#FFFFFF', '', '640400006', 1, 0x9105bb0b6745447b4890d6e424d4de22, 2, NULL),
(16, 'ทดสอบ', '2022-02-27', '2022-02-27', '13:08:00', '14:08:00', '#FFFFFF', '2022-02-26 06:08:58', 29, 3, '', '#FFFFFF', '', '650200001', 2, 0x9105bb0b6745447b4890d6e424d4de22, 2, NULL),
(15, 'ทดสอบ', '2022-02-26', '2022-02-27', '13:08:00', '14:08:00', '#FFFFFF', '2022-02-26 06:08:58', 29, 3, '', '#FFFFFF', '', '650200001', 2, 0x9105bb0b6745447b4890d6e424d4de22, 2, NULL),
(17, 'ทดสอบ10', '2022-03-27', '2022-03-28', '23:28:00', '23:28:00', '#FFFFFF', '2022-02-28 16:29:30', 22, 1, '', '#FFFFFF', '', '650200002', 4, 0x9105bb0b6745447b4890d6e424d4de22, 3, NULL),
(18, 'ทดสอบ10', '2022-03-28', '2022-03-28', '23:28:00', '23:28:00', '#FFFFFF', '2022-02-28 16:29:30', 22, 1, '', '#FFFFFF', '', '650200002', 4, 0x9105bb0b6745447b4890d6e424d4de22, 3, NULL),
(25, 'ทดสอบ เวลา', '2022-03-26', '2022-03-26', '20:53:00', '21:53:00', '#FFFFFF', '2022-03-02 13:54:00', 22, 1, '', '#FFFFFF', '', '650300002', 3, 0x9105bb0b6745447b4890d6e424d4de22, 2, NULL),
(29, 'testtar', '2022-04-02', '2022-04-02', '14:06:00', '14:06:00', '#FFFFFF', '2022-03-26 07:07:02', 22, 3, '', '#FFFFFF', '', '650300004', 2, 0x9105bb0b6745447b4890d6e424d4de22, 2, NULL),
(28, 'testtar', '2022-04-01', '2022-04-02', '14:06:00', '14:06:00', '#FFFFFF', '2022-03-26 07:07:02', 22, 3, '', '#FFFFFF', '', '650300004', 2, 0x9105bb0b6745447b4890d6e424d4de22, 2, NULL),
(27, 'test', '2022-03-30', '2022-03-30', '01:29:00', '01:29:00', '#FFFFFF', '2022-03-25 18:30:14', 12, 1, '', '#FFFFFF', '', '650300003', 2, 0x9105bb0b6745447b4890d6e424d4de22, 2, NULL),
(26, 'test', '2022-03-29', '2022-03-30', '01:29:00', '01:29:00', '#FFFFFF', '2022-03-25 18:30:14', 12, 1, '', '#FFFFFF', '', '650300003', 2, 0x9105bb0b6745447b4890d6e424d4de22, 2, NULL),
(30, 'กฟหกฟห', '2022-04-03', '2022-04-03', '00:28:00', '00:28:00', '#FFFFFF', '2022-04-02 17:28:42', 12, 0, '', '#FFFFFF', '', '650400001', 1, 0x9105bb0b6745447b4890d6e424d4de22, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `lv_id` int(5) NOT NULL,
  `level` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ระดับผู้ใช้งาน';

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`lv_id`, `level`) VALUES
(1, 'Admin'),
(2, 'ผู้ปฏิบัติงาน'),
(4, 'หัวหน้าฝ่าย/แผนก'),
(3, 'ธุรการ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `ro_id` int(5) NOT NULL,
  `ro_name` varchar(50) NOT NULL COMMENT 'ชื่อห้อง',
  `ro_people` int(4) NOT NULL COMMENT 'จำนวนคนที่รองรับ',
  `ro_color` varchar(20) NOT NULL COMMENT 'สี',
  `ro_detail` text NOT NULL COMMENT 'รายละเอียด',
  `ro_public` enum('Y','N') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลห้อง';

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`ro_id`, `ro_name`, `ro_people`, `ro_color`, `ro_detail`, `ro_public`) VALUES
(1, 'ห้องประชุมแสงจันทร์', 350, '#00ffaa', 'ตึกผู้ป่วยนอก ชั้น 4', 'Y'),
(2, 'ห้องประชุมแสงตะวัน', 50, '#3bd5e7', 'ห้องประชุม 0', 'Y'),
(3, 'ห้องประชุมแสงดาว', 200, '#d84dff', 'ห้องประชุม1', 'Y'),
(4, 'ห้องประชุม 2', 20, '#ece869', 'ห้องประชุม2', 'Y'),
(5, 'ห้องประชุมดอกปีบ', 150, '#ff6b6b', 'ห้องประชุม3', 'Y'),
(6, 'ห้องรับรอง', 15, '#c804a1', 'ห้องประชุม 4', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setdevice`
--

CREATE TABLE `tbl_setdevice` (
  `dv_id` int(10) NOT NULL,
  `id` int(10) NOT NULL COMMENT 'id_user',
  `ev_id` int(11) NOT NULL COMMENT 'id_tools',
  `dv_status` int(1) NOT NULL COMMENT 'สถานะอุปกรณ์'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลแจ้งเตือนสถานะอุปกรณ์';

--
-- Dumping data for table `tbl_setdevice`
--

INSERT INTO `tbl_setdevice` (`dv_id`, `id`, `ev_id`, `dv_status`) VALUES
(277, 1, 1, 3),
(276, 4, 16, 3),
(275, 4, 9, 3),
(274, 4, 6, 3),
(273, 4, 3, 3),
(272, 4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seting`
--

CREATE TABLE `tbl_seting` (
  `set_id` int(10) NOT NULL,
  `id` int(10) NOT NULL COMMENT 'id_member',
  `ev_id` int(11) NOT NULL COMMENT 'id_tools',
  `set_status` int(1) NOT NULL COMMENT 'สถานะการจอง'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลแจ้งเตือนสถานะการจอง';

--
-- Dumping data for table `tbl_seting`
--

INSERT INTO `tbl_seting` (`set_id`, `id`, `ev_id`, `set_status`) VALUES
(1, 2, 6, 3),
(2, 2, 6, 0),
(3, 2, 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_style`
--

CREATE TABLE `tbl_style` (
  `st_id` int(10) NOT NULL,
  `st_name` varchar(100) NOT NULL COMMENT 'รูปแบบห้อง'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_style`
--

INSERT INTO `tbl_style` (`st_id`, `st_name`) VALUES
(1, 'ประชุมทั่วไป'),
(2, 'ตัวยู เต็มห้อง'),
(3, 'ชั้นเรียน'),
(4, 'ประชุมสภา'),
(5, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tools`
--

CREATE TABLE `tbl_tools` (
  `to_id` int(3) NOT NULL,
  `to_name` varchar(250) NOT NULL COMMENT 'อุปกรณ์',
  `de_id` int(10) NOT NULL COMMENT 'แผนกที่รับผิดชอบ',
  `ward_id` int(11) DEFAULT NULL,
  `faction_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลอุปกรณ์';

--
-- Dumping data for table `tbl_tools`
--

INSERT INTO `tbl_tools` (`to_id`, `to_name`, `de_id`, `ward_id`, `faction_id`) VALUES
(1, 'เครื่องขยายเสียงพร้อมไมค์', 114, 69, 4),
(2, 'Projector', 114, 69, 4),
(3, 'Computer', 114, 69, 4),
(4, 'น้ำดื่ม/อาหารว่าง', 3, NULL, NULL),
(5, 'วีดีทัศน์ TV/VCD', 114, 69, 4),
(6, 'เครื่องฉายภาพ 3 มิติ', 114, 69, 4),
(7, 'ทีมลงทะเบียน', 9, NULL, NULL),
(8, 'ป้ายเวที/ป้ายชื่อวิทยากร', 7, NULL, NULL),
(16, 'ทีมต้อนรับ', 4, NULL, NULL),
(10, 'ติดบอร์ดหน้าลิฟท์', 9, NULL, NULL),
(11, 'ประกาศเสียงตามสาย', 9, NULL, NULL),
(12, 'แจ้งนักข่าวภายนอก', 9, NULL, NULL),
(13, 'แจ้งทางวิทยุ', 9, NULL, NULL),
(14, 'แจ้งทางหนังสือพิมพ์', 9, NULL, NULL),
(15, 'แจ้งทางโทรทัศน์', 9, NULL, NULL),
(19, 'test ward', 114, 48, 4),
(18, 'test ward 57', 114, 87, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'username',
  `password` varchar(20) NOT NULL COMMENT 'password',
  `person_id` varchar(20) NOT NULL COMMENT 'National_ID',
  `prefix` varchar(10) NOT NULL COMMENT 'คำนำหน้า',
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL COMMENT 'ตำแหน่ง',
  `phone` varchar(10) NOT NULL,
  `de_id` int(10) NOT NULL COMMENT 'แผนก',
  `lv_id` int(5) NOT NULL COMMENT 'level'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลผู้ใช้งาน';

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `person_id`, `prefix`, `firstname`, `lastname`, `position`, `phone`, `de_id`, `lv_id`) VALUES
(1, 'staff', '123456', '', 'นาย', 'ศราวุธ', 'อวดกล้า', 'Developer', '', 3, 3),
(2, 'user', '123456', '', 'นาย', 'สหัสวรรษ', 'แซ่เตีย', 'Developer', '', 2, 2),
(3, 'manager', '123456', '', 'นาย', 'เอกสิทธิ์', 'ต๊ะสิงห์', 'depveloper', '', 4, 4),
(4, 'staff2', '123456', '', 'นาย', 'ธนกร', 'เจริญรุกข์', 'Developer', '', 8, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_acces`
--
ALTER TABLE `tbl_acces`
  ADD PRIMARY KEY (`ev_id`,`to_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`ev_id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`lv_id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`ro_id`);

--
-- Indexes for table `tbl_setdevice`
--
ALTER TABLE `tbl_setdevice`
  ADD PRIMARY KEY (`dv_id`);

--
-- Indexes for table `tbl_seting`
--
ALTER TABLE `tbl_seting`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `tbl_style`
--
ALTER TABLE `tbl_style`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_tools`
--
ALTER TABLE `tbl_tools`
  ADD PRIMARY KEY (`to_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `de_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `ev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `lv_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `ro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_setdevice`
--
ALTER TABLE `tbl_setdevice`
  MODIFY `dv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `tbl_seting`
--
ALTER TABLE `tbl_seting`
  MODIFY `set_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_style`
--
ALTER TABLE `tbl_style`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tools`
--
ALTER TABLE `tbl_tools`
  MODIFY `to_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
