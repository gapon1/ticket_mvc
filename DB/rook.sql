/*
 Navicat Premium Data Transfer

 Source Server         : Sonoma
 Source Server Type    : MySQL
 Source Server Version : 50744
 Source Host           : localhost:3306
 Source Schema         : rook

 Target Server Type    : MySQL
 Target Server Version : 50744
 File Encoding         : 65001

 Date: 02/07/2024 12:58:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of customers
-- ----------------------------
BEGIN;
INSERT INTO `customers` VALUES (1, 'Acme Corporation', 'John Doe', 'john.doe@example.com');
INSERT INTO `customers` VALUES (2, 'Beta Limited', 'Jane Smith', 'jane.smith@example.com');
INSERT INTO `customers` VALUES (3, 'Gamma LLC', 'Jim Beam', 'jim.beam@example.com');
INSERT INTO `customers` VALUES (4, 'Delta Inc', 'Janet Mason', 'janet.mason@example.com');
INSERT INTO `customers` VALUES (5, 'Epsilon Corp', 'Jake Long', 'jake.long@example.com');
COMMIT;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------
BEGIN;
INSERT INTO `jobs` VALUES (1, 1, 'Website Development');
INSERT INTO `jobs` VALUES (2, 2, 'Network Setup');
INSERT INTO `jobs` VALUES (3, 3, 'Security Audit');
INSERT INTO `jobs` VALUES (4, 1, 'Database Migration');
INSERT INTO `jobs` VALUES (5, 5, 'Cloud Deployment');
INSERT INTO `jobs` VALUES (6, 4, 'Carpenter');
COMMIT;

-- ----------------------------
-- Table structure for labour
-- ----------------------------
DROP TABLE IF EXISTS `labour`;
CREATE TABLE `labour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `reg_hours` decimal(10,2) DEFAULT NULL,
  `overtime` decimal(10,2) DEFAULT NULL,
  `uom` enum('Fixed','Hourly') COLLATE utf8mb4_unicode_ci DEFAULT 'Hourly',
  `regular_rate` int(11) DEFAULT NULL,
  `overtime_rate` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_id` (`ticket_id`),
  KEY `staff_id` (`staff_id`),
  KEY `position_id` (`position_id`),
  CONSTRAINT `labour_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  CONSTRAINT `labour_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`),
  CONSTRAINT `labour_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of labour
-- ----------------------------
BEGIN;
INSERT INTO `labour` VALUES (9, 1, 3, 4, 65.00, 22.00, 'Hourly', 22, 33, 2156.00);
INSERT INTO `labour` VALUES (10, 1, 3, 3, 2.00, 9.00, 'Fixed', 22, 33, 341.00);
INSERT INTO `labour` VALUES (14, 1, 5, 4, 93.00, 29.00, 'Hourly', 22, 33, 3003.00);
INSERT INTO `labour` VALUES (17, 1, 3, 2, 33.00, 33.00, 'Hourly', 22, 33, 1815.00);
COMMIT;

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `location_lsd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`),
  CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of locations
-- ----------------------------
BEGIN;
INSERT INTO `locations` VALUES (1, 1, '12-34-56 W5M');
INSERT INTO `locations` VALUES (2, 2, '78-90-12 W5M');
INSERT INTO `locations` VALUES (3, 3, '34-56-78 W4M');
INSERT INTO `locations` VALUES (4, 4, '90-12-34 W3M');
INSERT INTO `locations` VALUES (5, 5, '56-78-90 W5M');
INSERT INTO `locations` VALUES (6, 2, '777-ave');
INSERT INTO `locations` VALUES (7, 6, '99-str');
COMMIT;

-- ----------------------------
-- Table structure for miscellaneous
-- ----------------------------
DROP TABLE IF EXISTS `miscellaneous`;
CREATE TABLE `miscellaneous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cost` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_id` (`ticket_id`),
  CONSTRAINT `miscellaneous_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of miscellaneous
-- ----------------------------
BEGIN;
INSERT INTO `miscellaneous` VALUES (213, 1, 'test777 44', 1.00, 7.00, 1.00, 7.00);
INSERT INTO `miscellaneous` VALUES (216, 1, 'Testoo', 33.00, 22.00, 1.00, 22.00);
INSERT INTO `miscellaneous` VALUES (217, 1, 'Loto', 4.00, 55.00, 6.00, 330.00);
COMMIT;

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of positions
-- ----------------------------
BEGIN;
INSERT INTO `positions` VALUES (1, 'Software Developer');
INSERT INTO `positions` VALUES (2, 'Project Manager');
INSERT INTO `positions` VALUES (3, 'Graphic Designer');
INSERT INTO `positions` VALUES (4, 'Systems Analyst');
INSERT INTO `positions` VALUES (5, 'Technical Writer');
COMMIT;

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of staff
-- ----------------------------
BEGIN;
INSERT INTO `staff` VALUES (1, 'John Doe');
INSERT INTO `staff` VALUES (2, 'Jane Smith');
INSERT INTO `staff` VALUES (3, 'Alex Johnson');
INSERT INTO `staff` VALUES (4, 'Chris Lee');
INSERT INTO `staff` VALUES (5, 'Patricia Williams');
COMMIT;

-- ----------------------------
-- Table structure for ticket_trucks
-- ----------------------------
DROP TABLE IF EXISTS `ticket_trucks`;
CREATE TABLE `ticket_trucks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `truck_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_id` (`ticket_id`),
  KEY `truck_id` (`truck_id`),
  CONSTRAINT `ticket_trucks_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  CONSTRAINT `ticket_trucks_ibfk_2` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ticket_trucks
-- ----------------------------
BEGIN;
INSERT INTO `ticket_trucks` VALUES (1, 1, 19);
INSERT INTO `ticket_trucks` VALUES (17, 1, 45);
INSERT INTO `ticket_trucks` VALUES (19, 1, 49);
COMMIT;

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('Active','Pending','Closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `description` text COLLATE utf8mb4_unicode_ci,
  `ordered_by` int(11) DEFAULT NULL,
  `area_field` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `job_id` (`job_id`),
  KEY `location_id` (`location_id`),
  KEY `staff_id` (`staff_id`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tickets
-- ----------------------------
BEGIN;
INSERT INTO `tickets` VALUES (1, 5, 5, 5, 3, '2022-03-11', 'Pending', '<p>WEb admin uuu mm</p>', 54777, 'popo 99444');
COMMIT;

-- ----------------------------
-- Table structure for trucks
-- ----------------------------
DROP TABLE IF EXISTS `trucks`;
CREATE TABLE `trucks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` enum('Hourly','Fixed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of trucks
-- ----------------------------
BEGIN;
INSERT INTO `trucks` VALUES (19, 'MAN', 'Fixed', 300.00, 7, 300.00);
INSERT INTO `trucks` VALUES (45, 'Iveco', 'Hourly', 99.00, 4, 396.00);
INSERT INTO `trucks` VALUES (49, 'DAF', 'Fixed', 54.00, 3, 54.00);
INSERT INTO `trucks` VALUES (50, 'MAN', 'Hourly', 99.00, 44, 4356.00);
INSERT INTO `trucks` VALUES (56, 'Reno', 'Fixed', 99.00, 1, 99.00);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
