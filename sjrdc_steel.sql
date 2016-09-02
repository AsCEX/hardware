/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : sjrdc_steel

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-09-02 17:18:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `coils`
-- ----------------------------
DROP TABLE IF EXISTS `coils`;
CREATE TABLE `coils` (
  `coil_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `coil_price` decimal(11,2) DEFAULT NULL,
  `coil_qty` decimal(11,2) DEFAULT NULL,
  `coil_code` varchar(100) DEFAULT NULL,
  `coil_length` decimal(11,2) DEFAULT NULL,
  `coil_height` decimal(11,2) DEFAULT NULL,
  `coil_width` decimal(11,2) DEFAULT NULL,
  `coil_dr_id` bigint(20) NOT NULL DEFAULT '0',
  `coil_clr_id` bigint(20) DEFAULT NULL,
  `coil_created_by` bigint(20) DEFAULT NULL,
  `coil_created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`coil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of coils
-- ----------------------------
INSERT INTO `coils` VALUES ('1', '67.00', '3.00', 'AsCEX', '8.00', '8.00', '5.00', '1', '1', '1', '2016-08-30 21:43:59');
INSERT INTO `coils` VALUES ('4', '25.00', '1.00', 'AsCEasdfa', '1.00', '1.00', '1.00', '1', '1', '1', null);
INSERT INTO `coils` VALUES ('6', '123.00', '1.00', 'fdsaa', '1.00', '1.00', '1.00', '4', '1', '1', null);
INSERT INTO `coils` VALUES ('7', '133.00', '12.00', 'kj', '1.00', '1.00', '1.00', '5', '1', '1', null);
INSERT INTO `coils` VALUES ('8', '111.00', '1.00', 'jkhskaf', '1.00', '1.00', '1.00', '5', '1', '1', null);
INSERT INTO `coils` VALUES ('9', '1222.00', '12.00', 'asdf', '1.00', '1.00', '1.00', '5', '1', '1', null);
INSERT INTO `coils` VALUES ('10', '200.00', '2.00', 'sss', '12.00', '2.00', '2.00', '6', '1', '1', null);
INSERT INTO `coils` VALUES ('11', '1212.00', '1.00', 'asdf', '1.00', '1.00', '1.00', '3', '1', '1', '2016-09-02 15:43:20');

-- ----------------------------
-- Table structure for `colors`
-- ----------------------------
DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors` (
  `clr_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `clr_name` varchar(100) DEFAULT NULL,
  `clr_hex` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`clr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of colors
-- ----------------------------
INSERT INTO `colors` VALUES ('1', 'green', '#27c547');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'AsCElskjaf', '4', '1', '2016-09-01 02:30:13', '1', null, null);

-- ----------------------------
-- Table structure for `deliveries`
-- ----------------------------
DROP TABLE IF EXISTS `deliveries`;
CREATE TABLE `deliveries` (
  `dr_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dr_delivery_date` date DEFAULT NULL,
  `dr_supp_id` bigint(20) DEFAULT NULL,
  `dr_created_date` date DEFAULT NULL,
  `dr_created_by` bigint(20) DEFAULT NULL,
  `dr_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`dr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of deliveries
-- ----------------------------
INSERT INTO `deliveries` VALUES ('1', '2016-09-08', '1', '2016-08-29', '1', '0');
INSERT INTO `deliveries` VALUES ('3', '2016-09-01', '2', '2016-09-01', '1', '0');
INSERT INTO `deliveries` VALUES ('4', '2016-09-07', '2', '2016-09-01', '1', '0');
INSERT INTO `deliveries` VALUES ('5', '2016-09-08', '1', '2016-09-02', '1', '0');
INSERT INTO `deliveries` VALUES ('6', '2016-09-22', '2', '2016-09-02', '1', '0');

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
  `po_created_date` date DEFAULT NULL,
  `po_terms` varchar(100) DEFAULT NULL,
  `po_cust_id` bigint(20) DEFAULT NULL,
  `po_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`po_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase_orders
-- ----------------------------
INSERT INTO `purchase_orders` VALUES ('1', '2016-09-14', '2016-09-02', null, '1', '0');

-- ----------------------------
-- Table structure for `sheets`
-- ----------------------------
DROP TABLE IF EXISTS `sheets`;
CREATE TABLE `sheets` (
  `sht_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sht_coil_id` bigint(20) DEFAULT NULL,
  `sht_qty` decimal(11,2) DEFAULT NULL,
  `sht_price` double(11,2) DEFAULT NULL,
  `sht_code` varchar(100) DEFAULT NULL,
  `sht_length` decimal(11,2) DEFAULT NULL,
  `sht_height` decimal(11,2) DEFAULT NULL,
  `sht_width` decimal(11,2) DEFAULT NULL,
  `sht_clr_id` bigint(20) DEFAULT NULL,
  `sht_po_id` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sht_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sheets
-- ----------------------------
INSERT INTO `sheets` VALUES ('1', '9', '1.00', '111.00', '001', '1.00', '1.00', '1.00', null, '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
INSERT INTO `suppliers` VALUES ('1', '2', 'YIU', '1');
INSERT INTO `suppliers` VALUES ('2', '3', 'Mocks', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_informations
-- ----------------------------
INSERT INTO `user_informations` VALUES ('1', 'Desidido', 'Kho', 'Manigbas', null, 'Pogi St', null, '8000', '09999911991');
INSERT INTO `user_informations` VALUES ('2', 'test', 'tes', 'tes', '', 'asdfaf', '', '800', '1231231311');
INSERT INTO `user_informations` VALUES ('3', 'allan', 's', 'cabusora', '', 'Pogi Street, S.I.R. Matina\r\nLot 20, Block 61 1st Flr,', '', '8000', '9285487265');
INSERT INTO `user_informations` VALUES ('4', 'AsCEX', 'A', 'Alalsdlj', '', 'alsdjflas jd', '', '8000', '123412314');
