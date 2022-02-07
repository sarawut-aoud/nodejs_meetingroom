/*
Navicat MySQL Data Transfer

Source Server         : 9.7
Source Server Version : 80026
Source Host           : 192.168.9.7:3306
Source Database       : db_asset

Target Server Type    : MYSQL
Target Server Version : 80026
File Encoding         : 65001

Date: 2022-02-07 15:58:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hr_depart
-- ----------------------------
DROP TABLE IF EXISTS `hr_depart`;
CREATE TABLE `hr_depart` (
  `depart_id` int NOT NULL AUTO_INCREMENT,
  `depart_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faction_id` int NOT NULL,
  `depart_pubilc` enum('Y','N') NOT NULL,
  PRIMARY KEY (`depart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Table structure for hr_duty
-- ----------------------------
DROP TABLE IF EXISTS `hr_duty`;
CREATE TABLE `hr_duty` (
  `duty_id` int NOT NULL AUTO_INCREMENT,
  `duty_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `duty_lv` int NOT NULL,
  `duty_pubilc` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`duty_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for hr_faction
-- ----------------------------
DROP TABLE IF EXISTS `hr_faction`;
CREATE TABLE `hr_faction` (
  `faction_id` int NOT NULL AUTO_INCREMENT,
  `faction_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faction_pubilc` enum('Y','N') NOT NULL,
  PRIMARY KEY (`faction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Table structure for hr_level
-- ----------------------------
DROP TABLE IF EXISTS `hr_level`;
CREATE TABLE `hr_level` (
  `level_id` int NOT NULL AUTO_INCREMENT,
  `person_id` varbinary(255) NOT NULL,
  `duty_id` int NOT NULL,
  `faction_id` int NOT NULL,
  `depart_id` int NOT NULL,
  `ward_id` int NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2986 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for hr_office_sit
-- ----------------------------
DROP TABLE IF EXISTS `hr_office_sit`;
CREATE TABLE `hr_office_sit` (
  `office_id` int NOT NULL AUTO_INCREMENT,
  `office_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `office_tel` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `office_token` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `office_pubilc` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faction_id` int DEFAULT '0',
  `depart_id` int DEFAULT '0',
  `ward_id` int DEFAULT '0',
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `user_update` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_update` datetime DEFAULT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=MyISAM AUTO_INCREMENT=254 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for hr_personal
-- ----------------------------
DROP TABLE IF EXISTS `hr_personal`;
CREATE TABLE `hr_personal` (
  `person_id` varbinary(255) NOT NULL,
  `person_prefix` int NOT NULL,
  `person_firstname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_lastname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_sex` enum('1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_cult` enum('1','2','3','4') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_blood` int NOT NULL,
  `person_status` enum('1','2','3','4','5') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_birth` date NOT NULL,
  `person_no` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_moo` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_road` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_tumbon` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_amphur` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_province` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_postcode` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_noT` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_mooT` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_roadT` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_tumbonT` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_amphurT` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_provinceT` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_postcodeT` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_tel` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_da` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_ma` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_nopo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `position_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `money_id` int NOT NULL,
  `typeac_id` int NOT NULL,
  `ac_id` int NOT NULL,
  `typeposition_id` int NOT NULL,
  `wo_id` int NOT NULL,
  `po_id` int NOT NULL,
  `po_level_id` int NOT NULL,
  `profession_id` int NOT NULL,
  `office_id` int NOT NULL,
  `office_po` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `person_singin` date NOT NULL,
  `person_state` int NOT NULL,
  `person_univer` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_course` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_startdate` date NOT NULL,
  `person_enddate` date NOT NULL,
  `person_username` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_password` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_datetime` datetime NOT NULL,
  `person_op` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_photo` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_right` int NOT NULL DEFAULT '2',
  `person_page` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'home.php',
  `person_menu` int NOT NULL DEFAULT '1',
  `person_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_forget` int DEFAULT '0',
  `person_lock` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'N',
  `person_ban` datetime DEFAULT NULL,
  `user_update` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_update` datetime DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for hr_ward
-- ----------------------------
DROP TABLE IF EXISTS `hr_ward`;
CREATE TABLE `hr_ward` (
  `ward_id` int NOT NULL AUTO_INCREMENT,
  `ward_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ward_token` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faction_id` int NOT NULL,
  `depart_id` int NOT NULL,
  `ward_pct` int NOT NULL,
  `hosward_id` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ward_pubilc` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `user_update` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_update` datetime DEFAULT NULL,
  PRIMARY KEY (`ward_id`)
) ENGINE=MyISAM AUTO_INCREMENT=293 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
