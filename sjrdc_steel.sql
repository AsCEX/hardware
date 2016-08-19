/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : sjrdc_steel

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-08-19 21:41:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `coils`
-- ----------------------------
DROP TABLE IF EXISTS `coils`;
CREATE TABLE `coils` (
  `coil_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `coil_code` varchar(100) DEFAULT NULL,
  `coil_length` decimal(11,2) DEFAULT NULL,
  `coil_height` decimal(11,2) DEFAULT NULL,
  `coil_width` decimal(11,2) DEFAULT NULL,
  `coil_clr_id` bigint(20) DEFAULT NULL,
  `coil_created_by` bigint(20) DEFAULT NULL,
  `coil_created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`coil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of coils
-- ----------------------------

-- ----------------------------
-- Table structure for `colors`
-- ----------------------------
DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors` (
  `clr_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `clr_name` varchar(100) DEFAULT NULL,
  `clr_hex` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`clr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of colors
-- ----------------------------

-- ----------------------------
-- Table structure for `customers`
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `cust_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cust_company` varchar(100) DEFAULT NULL,
  `cust_ui_id` bigint(20) DEFAULT NULL,
  `cust_status` tinyint(1) DEFAULT NULL,
  `cust_created_date` datetime DEFAULT NULL,
  `cust_created_by` bigint(20) DEFAULT NULL,
  `cust_modified_date` datetime DEFAULT NULL,
  `cust_modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customers
-- ----------------------------

-- ----------------------------
-- Table structure for `employees`
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `emp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `emp_ui_id` bigint(20) DEFAULT NULL,
  `emp_username` varchar(100) DEFAULT NULL,
  `emp_password` varchar(100) DEFAULT NULL,
  `emp_status` tinyint(1) DEFAULT NULL,
  `emp_rate` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('1', '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '10000.00');

-- ----------------------------
-- Table structure for `purchase_orders`
-- ----------------------------
DROP TABLE IF EXISTS `purchase_orders`;
CREATE TABLE `purchase_orders` (
  `po_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `po_date` date DEFAULT NULL,
  `po_delivery_date` date DEFAULT NULL,
  `po_terms` varchar(100) DEFAULT NULL,
  `po_cust_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`po_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase_orders
-- ----------------------------

-- ----------------------------
-- Table structure for `purchase_order_details`
-- ----------------------------
DROP TABLE IF EXISTS `purchase_order_details`;
CREATE TABLE `purchase_order_details` (
  `pod_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pod_qty` decimal(11,2) DEFAULT NULL,
  `pod_price` decimal(11,2) DEFAULT NULL,
  `pod_sht_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase_order_details
-- ----------------------------

-- ----------------------------
-- Table structure for `sheets`
-- ----------------------------
DROP TABLE IF EXISTS `sheets`;
CREATE TABLE `sheets` (
  `sht_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sht_coil_Id` bigint(20) DEFAULT NULL,
  `sht_code` varchar(100) DEFAULT NULL,
  `sht_length` decimal(11,2) DEFAULT NULL,
  `sht_height` decimal(11,2) DEFAULT NULL,
  `sht_width` decimal(11,2) DEFAULT NULL,
  `sht_clr_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`sht_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sheets
-- ----------------------------

-- ----------------------------
-- Table structure for `suppliers`
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `supp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `supp_ui_id` bigint(20) DEFAULT NULL,
  `supp_company` varchar(100) DEFAULT NULL,
  `supp_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`supp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of suppliers
-- ----------------------------

-- ----------------------------
-- Table structure for `user_informations`
-- ----------------------------
DROP TABLE IF EXISTS `user_informations`;
CREATE TABLE `user_informations` (
  `ui_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ui_firstname` varchar(50) DEFAULT NULL,
  `ui_middlename` varchar(50) DEFAULT NULL,
  `ui_lastname` varchar(50) DEFAULT NULL,
  `ui_extname` varchar(10) DEFAULT NULL,
  `ui_address` varchar(100) DEFAULT NULL,
  `ui_address2` varchar(100) DEFAULT NULL,
  `ui_zip` varchar(10) DEFAULT NULL,
  `ui_contact_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ui_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_informations
-- ----------------------------
INSERT INTO `user_informations` VALUES ('1', 'Desidido', 'Kho', 'Manigbas', null, 'Pogi St', null, '8000', '09999911991');
