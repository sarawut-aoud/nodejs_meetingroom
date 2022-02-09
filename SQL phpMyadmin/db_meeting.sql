-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 07:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

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
  `id` int(10) NOT NULL COMMENT 'id_user',
  `ro_id` int(5) NOT NULL COMMENT 'id_rooms'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(4, 'หัวหน้าตึก/หัวหน้าแผนก'),
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
  `ro_detail` text NOT NULL COMMENT 'รายละเอียด'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลห้อง';

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`ro_id`, `ro_name`, `ro_people`, `ro_color`, `ro_detail`) VALUES
(1, 'ห้องประชุมแสงจันทร์', 500, '#5ccbf0', 'ตึกผู้ป่วยนอก ชั้น 4'),
(2, 'ห้องประชุมแสงตะวัน', 50, '#68da49', 'ห้องประชุม0'),
(3, 'ห้องประชุมแสงดาว', 200, '#d84dff', 'ห้องประชุม1'),
(4, 'ห้องประชุม 2', 20, '#ece869', 'ห้องประชุม2'),
(5, 'ห้องประชุมดอกปีบ', 150, '#ff6b6b', 'ห้องประชุม3'),
(6, 'ห้องรับรอง', 15, '#fe9fe5', 'ห้องประชุม4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setdevice`
--

CREATE TABLE `tbl_setdevice` (
  `dv_id` int(10) NOT NULL,
  `id` int(10) NOT NULL COMMENT 'id_user',
  `to_id` int(11) NOT NULL COMMENT 'id_tools',
  `dv_status` int(1) NOT NULL COMMENT 'สถานะอุปกรณ์'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลแจ้งเตือนสถานะอุปกรณ์';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seting`
--

CREATE TABLE `tbl_seting` (
  `set_id` int(10) NOT NULL,
  `id` int(10) NOT NULL COMMENT 'id_member',
  `to_id` int(11) NOT NULL COMMENT 'id_tools',
  `set_status` int(1) NOT NULL COMMENT 'สถานะการจอง'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลแจ้งเตือนสถานะการจอง';

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
  `de_id` int(10) NOT NULL COMMENT 'แผนกที่รับผิดชอบ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลอุปกรณ์';

--
-- Dumping data for table `tbl_tools`
--

INSERT INTO `tbl_tools` (`to_id`, `to_name`, `de_id`) VALUES
(1, 'เครื่องขยายเสียงพร้อมไมค์', 8),
(2, 'Projector', 8),
(3, 'Computer', 8),
(4, 'น้ำดื่ม/อาหารว่าง', 2),
(5, 'วีดีทัศน์ TV/VCD', 8),
(6, 'เครื่องฉายภาพ 3 มิติ', 7),
(7, 'ทีมลงทะเบียน', 8),
(8, 'ป้ายเวที/ป้ายชื่อวิทยากร', 7),
(16, 'ทีมต้อนรับ', 4),
(10, 'ติดบอร์ดหน้าลิฟท์', 9),
(11, 'ประกาศเสียงตามสาย', 9),
(12, 'แจ้งนักข่าวภายนอก', 9),
(13, 'แจ้งทางวิทยุ', 9),
(14, 'แจ้งทางหนังสือพิมพ์', 9),
(15, 'แจ้งทางโทรทัศน์', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'username',
  `password` varchar(20) NOT NULL COMMENT 'password',
  `person_id` varchar(20) NOT NULL COMMENT 'National_ID',
  `perfix` varchar(10) NOT NULL COMMENT 'คำนำหน้า',
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

INSERT INTO `tbl_user` (`id`, `username`, `password`, `perfix`, `firstname`, `lastname`, `position`, `phone`, `de_id`, `lv_id`) VALUES
(1, 'sarawut', '123456', '1160400251822','นาย', 'ศราวุธ', 'อวดกล้า', 'Developer', '0979284920', 1, 1),
(2, 'mrfapman', '123456', '1160400251822','นาย', 'สหัสวรรษ', 'แซ่เตีย', 'Developer', '', 2, 1),
(3, 'basejako', '123456', '1160400251822','นาย', 'เอกสิทธิ์', 'ต๊ะสิงห์', 'depveloper', '', 4, 1),
(4, 'tanakorn', '123456', '1160400251822','นาย', 'ธนกร', 'เจริญรุกข์', 'Developer', '', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`de_id`);

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
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `lv_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `ro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_style`
--
ALTER TABLE `tbl_style`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tools`
--
ALTER TABLE `tbl_tools`
  MODIFY `to_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
