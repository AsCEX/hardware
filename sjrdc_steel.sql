/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : sjrdc_steel

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-10-28 11:31:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bended_panel_prices`
-- ----------------------------
DROP TABLE IF EXISTS `bended_panel_prices`;
CREATE TABLE `bended_panel_prices` (
  `b_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `b_thickness` decimal(11,4) DEFAULT NULL,
  `b_width` decimal(11,4) DEFAULT NULL,
  `b_length` decimal(11,4) DEFAULT NULL,
  `b_unit_price` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bended_panel_prices
-- ----------------------------
INSERT INTO `bended_panel_prices` VALUES ('1', '0.4000', '0.1010', '2.4400', '99.18');
INSERT INTO `bended_panel_prices` VALUES ('2', '0.4000', '0.1525', '2.4400', '149.75');
INSERT INTO `bended_panel_prices` VALUES ('3', '0.4000', '0.2030', '2.4400', '199.34');
INSERT INTO `bended_panel_prices` VALUES ('4', '0.4000', '0.3050', '2.4400', '299.50');
INSERT INTO `bended_panel_prices` VALUES ('5', '0.4000', '0.4070', '2.4400', '399.66');
INSERT INTO `bended_panel_prices` VALUES ('6', '0.4000', '0.4570', '2.4400', '448.76');
INSERT INTO `bended_panel_prices` VALUES ('7', '0.4000', '0.6100', '2.4400', '599.00');
INSERT INTO `bended_panel_prices` VALUES ('8', '0.4000', '0.7630', '2.4400', '749.24');
INSERT INTO `bended_panel_prices` VALUES ('9', '0.4000', '0.8130', '2.4400', '798.34');
INSERT INTO `bended_panel_prices` VALUES ('10', '0.4000', '0.9150', '2.4400', '898.50');
INSERT INTO `bended_panel_prices` VALUES ('11', '0.4000', '1.2200', '2.4400', '1198.00');
INSERT INTO `bended_panel_prices` VALUES ('13', '0.5000', '0.1010', '2.4400', '127.33');
INSERT INTO `bended_panel_prices` VALUES ('14', '0.5000', '0.1525', '2.4400', '192.25');
INSERT INTO `bended_panel_prices` VALUES ('15', '0.5000', '0.2030', '2.4400', '255.91');
INSERT INTO `bended_panel_prices` VALUES ('16', '0.5000', '0.3050', '2.4400', '384.50');
INSERT INTO `bended_panel_prices` VALUES ('17', '0.5000', '0.4070', '2.4400', '513.09');
INSERT INTO `bended_panel_prices` VALUES ('18', '0.5000', '0.4570', '2.4400', '576.12');
INSERT INTO `bended_panel_prices` VALUES ('19', '0.5000', '0.6100', '2.4400', '769.00');
INSERT INTO `bended_panel_prices` VALUES ('20', '0.5000', '0.7630', '2.4400', '961.88');
INSERT INTO `bended_panel_prices` VALUES ('21', '0.5000', '0.8130', '2.4400', '1024.91');
INSERT INTO `bended_panel_prices` VALUES ('22', '0.5000', '0.9150', '2.4400', '1153.50');
INSERT INTO `bended_panel_prices` VALUES ('23', '0.5000', '1.2200', '2.4400', '1538.00');
INSERT INTO `bended_panel_prices` VALUES ('24', '0.6000', '0.1010', '2.4400', '148.02');
INSERT INTO `bended_panel_prices` VALUES ('25', '0.6000', '0.1525', '2.4400', '223.50');
INSERT INTO `bended_panel_prices` VALUES ('26', '0.6000', '0.2030', '2.4400', '297.51');
INSERT INTO `bended_panel_prices` VALUES ('27', '0.6000', '0.3050', '2.4400', '447.00');
INSERT INTO `bended_panel_prices` VALUES ('28', '0.6000', '0.4070', '2.4400', '596.49');
INSERT INTO `bended_panel_prices` VALUES ('29', '0.6000', '0.4570', '2.4400', '669.77');
INSERT INTO `bended_panel_prices` VALUES ('30', '0.6000', '0.6100', '2.4400', '894.00');
INSERT INTO `bended_panel_prices` VALUES ('31', '0.6000', '0.7630', '2.4400', '1118.23');
INSERT INTO `bended_panel_prices` VALUES ('32', '0.6000', '0.8130', '2.4400', '1191.51');
INSERT INTO `bended_panel_prices` VALUES ('33', '0.6000', '0.9150', '2.4400', '1341.00');
INSERT INTO `bended_panel_prices` VALUES ('34', '0.6000', '1.2200', '2.4400', '1788.00');

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cat_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Roofing');
INSERT INTO `categories` VALUES ('2', 'Bended Panels');
INSERT INTO `categories` VALUES ('3', 'Hardware Accessories');

-- ----------------------------
-- Table structure for `charges`
-- ----------------------------
DROP TABLE IF EXISTS `charges`;
CREATE TABLE `charges` (
  `chrg_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `chrg_name` varchar(100) DEFAULT NULL,
  `chrg_type` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`chrg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of charges
-- ----------------------------
INSERT INTO `charges` VALUES ('1', 'Delivery Charge', '1');
INSERT INTO `charges` VALUES ('2', 'Installation Cost', '1');
INSERT INTO `charges` VALUES ('3', 'Bending Charge', '1');
INSERT INTO `charges` VALUES ('4', 'ASC Amount', '2');

-- ----------------------------
-- Table structure for `charge_types`
-- ----------------------------
DROP TABLE IF EXISTS `charge_types`;
CREATE TABLE `charge_types` (
  `chrg_type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `chrg_type_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`chrg_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of charge_types
-- ----------------------------
INSERT INTO `charge_types` VALUES ('1', 'Add');
INSERT INTO `charge_types` VALUES ('2', 'Less');

-- ----------------------------
-- Table structure for `colors`
-- ----------------------------
DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors` (
  `clr_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `clr_name` varchar(100) DEFAULT NULL,
  `clr_hex` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`clr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of colors
-- ----------------------------
INSERT INTO `colors` VALUES ('1', 'Red', '#ff0000');
INSERT INTO `colors` VALUES ('2', 'Brown', '#A52A2A');
INSERT INTO `colors` VALUES ('3', 'White', '#ffffff');
INSERT INTO `colors` VALUES ('4', 'Dark Gray', '#A9A9A9');
INSERT INTO `colors` VALUES ('5', 'Green', '#00ff00');
INSERT INTO `colors` VALUES ('6', 'Beige', '#f5f5dc');
INSERT INTO `colors` VALUES ('7', 'Blue', '#0000ff');
INSERT INTO `colors` VALUES ('8', 'C-Purlins', null);
INSERT INTO `colors` VALUES ('9', 'Galvanize Iron', null);

-- ----------------------------
-- Table structure for `contracts`
-- ----------------------------
DROP TABLE IF EXISTS `contracts`;
CREATE TABLE `contracts` (
  `c_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `c_cust_id` bigint(20) DEFAULT NULL,
  `c_date` date DEFAULT NULL,
  `c_project` varchar(100) DEFAULT NULL,
  `c_location` varchar(100) DEFAULT NULL,
  `c_sales_rep` varchar(100) DEFAULT NULL,
  `c_reference` varchar(100) DEFAULT NULL,
  `c_status` tinyint(1) DEFAULT NULL,
  `c_terms_of_payment` varchar(100) DEFAULT NULL,
  `c_delivery_instruction` varchar(100) DEFAULT NULL,
  `c_clr_id` bigint(20) DEFAULT NULL,
  `o_created_date` date DEFAULT NULL,
  `o_created_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contracts
-- ----------------------------
INSERT INTO `contracts` VALUES ('1', '1', '2016-10-10', 'Proposed LFC Admin Bldg.', 'Maryknoll Drive, Sasa, Davao City', 'NEG', 'P. Plan', '0', '50% D/P upon signing of contract, 50% FP upon delivery', 'Deliver To Site', '1', null, null);
INSERT INTO `contracts` VALUES ('2', '2', '2016-10-18', 'Proposed Residential Bldg', 'Tandag, Surigao Del Sur', 'AGE', 'Q. GIVEN', '1', '50% D/P upon signing of contract, \r\n50% FP upon delivery', 'Picu up @ Davao Plant', '7', null, null);

-- ----------------------------
-- Table structure for `contract_charges`
-- ----------------------------
DROP TABLE IF EXISTS `contract_charges`;
CREATE TABLE `contract_charges` (
  `cc_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cc_c_id` bigint(20) DEFAULT NULL,
  `cc_chrg_id` bigint(20) DEFAULT NULL,
  `cc_amount` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`cc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contract_charges
-- ----------------------------
INSERT INTO `contract_charges` VALUES ('1', '1', '1', '30000.00');
INSERT INTO `contract_charges` VALUES ('2', '1', '2', '110000.00');
INSERT INTO `contract_charges` VALUES ('3', '2', '3', '540.00');
INSERT INTO `contract_charges` VALUES ('4', '2', '4', '75.00');

-- ----------------------------
-- Table structure for `contract_details`
-- ----------------------------
DROP TABLE IF EXISTS `contract_details`;
CREATE TABLE `contract_details` (
  `cd_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cd_c_id` bigint(20) DEFAULT NULL,
  `cd_p_id` bigint(20) DEFAULT NULL,
  `cd_pv_id` bigint(20) DEFAULT NULL,
  `cd_thickness` decimal(11,4) DEFAULT NULL,
  `cd_width` decimal(11,4) DEFAULT NULL,
  `cd_length` decimal(11,4) DEFAULT NULL,
  `cd_qty` decimal(11,2) DEFAULT NULL,
  `cd_unit` varchar(20) DEFAULT NULL,
  `cd_unit_price` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`cd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contract_details
-- ----------------------------
INSERT INTO `contract_details` VALUES ('1', '1', '1', null, null, null, null, '1847.79', 'Lm', '29.50');
INSERT INTO `contract_details` VALUES ('2', '1', '8', null, null, null, null, '3.00', 'pcs', '32.00');
INSERT INTO `contract_details` VALUES ('3', '1', '10', null, null, null, null, '63.00', 'pcs', '32.00');
INSERT INTO `contract_details` VALUES ('4', '2', '1', '1', '0.4000', '1.1400', '0.0000', '173.60', 'lm', '185.00');
INSERT INTO `contract_details` VALUES ('5', '2', '8', null, '0.4000', '0.4070', '2.4400', '12.00', 'pcs', '156.67');
INSERT INTO `contract_details` VALUES ('6', '2', '9', null, '0.4000', '0.3050', '2.4400', '6.00', 'pcs', '117.50');
INSERT INTO `contract_details` VALUES ('7', '2', '12', null, '0.4000', '0.6100', '2.4400', '2.00', 'pcs', '235.00');
INSERT INTO `contract_details` VALUES ('8', '2', '14', null, '0.4000', '0.6100', '2.4400', '12.00', 'pcs', '235.00');
INSERT INTO `contract_details` VALUES ('9', '2', '15', null, '0.4000', '0.4570', '2.4400', '4.00', 'pcs', '176.25');

-- ----------------------------
-- Table structure for `customers`
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `cust_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cust_company` varchar(100) DEFAULT NULL,
  `cust_address` varchar(100) DEFAULT NULL,
  `cust_owner` varchar(100) DEFAULT NULL,
  `cust_status` tinyint(1) DEFAULT NULL,
  `cust_created_date` datetime DEFAULT NULL,
  `cust_created_by` bigint(20) DEFAULT NULL,
  `cust_modified_date` datetime DEFAULT NULL,
  `cust_modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'Deocura Builders', 'Dacudao Ave., Davao City', '', '1', '2016-09-01 02:30:13', '1', '2016-09-19 05:38:17', '1');
INSERT INTO `customers` VALUES ('2', 'RZTC Steel Marketing', '70-1 Ponce St., Davao City', null, '1', '2016-10-18 00:43:22', '1', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('1', '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '10000.00');
INSERT INTO `employees` VALUES ('2', '5', 'test', '25d55ad283aa400af464c76d713c07ad', '1', '100000.00');

-- ----------------------------
-- Table structure for `job_orders`
-- ----------------------------
DROP TABLE IF EXISTS `job_orders`;
CREATE TABLE `job_orders` (
  `jo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jo_c_id` bigint(20) DEFAULT NULL,
  `jo_created_date` datetime DEFAULT NULL,
  `jo_created_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`jo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of job_orders
-- ----------------------------
INSERT INTO `job_orders` VALUES ('1', '2', '2016-10-20 20:37:51', '1');

-- ----------------------------
-- Table structure for `materials`
-- ----------------------------
DROP TABLE IF EXISTS `materials`;
CREATE TABLE `materials` (
  `mat_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mat_clr_id` bigint(20) DEFAULT NULL,
  `mat_thickness` decimal(11,3) DEFAULT NULL,
  `mat_width` decimal(11,3) DEFAULT NULL,
  `mat_code` varchar(100) DEFAULT NULL,
  `mat_net_weight` decimal(11,3) DEFAULT NULL,
  `mat_gross_weight` decimal(11,3) DEFAULT NULL,
  `mat_actual_weight` decimal(11,3) DEFAULT NULL,
  `mat_created_date` datetime DEFAULT NULL,
  `mat_created_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`mat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of materials
-- ----------------------------
INSERT INTO `materials` VALUES ('1', '1', '0.400', '1.220', '160629LGZ6831', '5.320', '5.360', '5.356', null, null);
INSERT INTO `materials` VALUES ('2', '1', '0.400', '1.220', '160629LGZ6832', '5.296', '5.340', '5.336', null, null);
INSERT INTO `materials` VALUES ('3', '1', '0.400', '1.220', '160629LGZ6822', '5.414', '5.460', '5.455', null, null);
INSERT INTO `materials` VALUES ('4', '1', '0.400', '1.220', '160629LGZ6821', '5.368', '5.414', '5.407', null, null);
INSERT INTO `materials` VALUES ('5', '1', '0.400', '0.915', '160629LGZ6842', '4.666', '4.704', '4.690', null, null);

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `p_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(100) DEFAULT NULL,
  `p_cat_id` bigint(20) DEFAULT NULL,
  `p_unit_price` decimal(11,2) DEFAULT NULL,
  `p_color_id` bigint(20) DEFAULT NULL,
  `p_in_stock` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Rib-Type', '1', null, null, null);
INSERT INTO `products` VALUES ('2', 'Corrugated', '1', null, null, null);
INSERT INTO `products` VALUES ('3', 'Glazed Tile', '1', null, null, null);
INSERT INTO `products` VALUES ('4', 'Bamboo Tile', '1', null, null, null);
INSERT INTO `products` VALUES ('5', 'Seam Lock', '1', null, null, null);
INSERT INTO `products` VALUES ('6', 'Steeldek Web', '1', null, null, null);
INSERT INTO `products` VALUES ('7', 'Ridge Cap', '2', null, null, null);
INSERT INTO `products` VALUES ('8', 'Ridge Roll', '2', null, null, null);
INSERT INTO `products` VALUES ('9', 'Wall Flashing', '2', null, null, null);
INSERT INTO `products` VALUES ('10', 'End Wall Flashing', '2', null, null, null);
INSERT INTO `products` VALUES ('11', 'Counter Flashing', '2', null, null, null);
INSERT INTO `products` VALUES ('12', 'Spanish End Flashing', '2', null, null, null);
INSERT INTO `products` VALUES ('13', 'Ord. Gutter', '2', null, null, null);
INSERT INTO `products` VALUES ('14', 'Spanish Gutter', '2', null, null, null);
INSERT INTO `products` VALUES ('15', 'Valley Gutter', '2', null, null, null);
INSERT INTO `products` VALUES ('16', 'Valley Cover', '2', null, null, null);
INSERT INTO `products` VALUES ('17', 'Moulding', '2', null, null, null);
INSERT INTO `products` VALUES ('18', 'Plainsheets', '2', null, null, null);
INSERT INTO `products` VALUES ('19', 'Teks # 12-24 x 45mm Hex w/ Neo', '3', '1.30', null, null);
INSERT INTO `products` VALUES ('20', 'Teks # 12-24 x 50mm Hex w/ Neo', '3', '0.00', null, null);
INSERT INTO `products` VALUES ('21', 'Teks # 12-24 x 55mm Hex w/ Neo', '3', '1.40', null, null);
INSERT INTO `products` VALUES ('22', 'Teks # 12-24 x 65mm Hex w/ Neo', '3', '1.55', null, null);
INSERT INTO `products` VALUES ('23', 'Teks # 12-11 x 50mm HWF w/ Neo', '3', '1.50', null, null);
INSERT INTO `products` VALUES ('24', 'Teks # 12-11 x 65mm HWF w/ Neo', '3', '1.75', null, null);
INSERT INTO `products` VALUES ('25', 'Blind Rivets 5/32 x 1\"', '3', '0.55', null, null);
INSERT INTO `products` VALUES ('26', 'Blind Rivets 5/32 x 1/2', '3', '1.10', null, null);
INSERT INTO `products` VALUES ('27', 'Silicone Rubber Sealant', '3', '160.00', null, null);
INSERT INTO `products` VALUES ('28', 'Touch-up Acrylic Paint (250mL)', '3', '240.00', null, null);

-- ----------------------------
-- Table structure for `product_variants`
-- ----------------------------
DROP TABLE IF EXISTS `product_variants`;
CREATE TABLE `product_variants` (
  `pv_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pv_p_id` bigint(20) DEFAULT NULL,
  `pv_description` varchar(100) DEFAULT NULL,
  `pv_thickness` decimal(11,3) DEFAULT NULL,
  `pv_nominal_width` decimal(11,3) DEFAULT NULL,
  `pv_effective_width` decimal(11,3) DEFAULT NULL,
  `pv_length` decimal(11,3) DEFAULT NULL,
  `pv_unit_price` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`pv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_variants
-- ----------------------------
INSERT INTO `product_variants` VALUES ('1', '1', null, '0.400', '1.140', '1.050', null, '452.00');
INSERT INTO `product_variants` VALUES ('2', '1', null, '0.500', '1.140', '1.050', null, '592.00');
INSERT INTO `product_variants` VALUES ('3', '2', null, '0.600', '1.085', '0.950', null, '692.00');
INSERT INTO `product_variants` VALUES ('4', '3', null, '0.400', '1.140', '1.050', null, '512.00');
INSERT INTO `product_variants` VALUES ('5', '3', null, '0.500', '1.140', '1.050', null, '672.00');
INSERT INTO `product_variants` VALUES ('6', '3', null, '0.600', '1.140', '1.050', null, '782.00');
INSERT INTO `product_variants` VALUES ('7', '4', null, '0.400', null, null, null, '542.00');
INSERT INTO `product_variants` VALUES ('8', '4', null, '0.500', null, null, null, '712.00');
INSERT INTO `product_variants` VALUES ('9', '4', null, '0.600', null, null, null, '822.00');
INSERT INTO `product_variants` VALUES ('10', '7', '( T x 0.457 x L.S. )', '0.400', '0.457', null, null, '232.00');
INSERT INTO `product_variants` VALUES ('11', '7', '( T x 0.457 x L.S. )', '0.500', '0.457', null, null, '302.00');
INSERT INTO `product_variants` VALUES ('12', '7', '( T x 0.457 x L.S. )', '0.600', '0.457', null, null, '352.00');
INSERT INTO `product_variants` VALUES ('13', '5', null, '0.400', '0.480', '0.460', null, '265.00');
INSERT INTO `product_variants` VALUES ('14', '5', null, '0.500', '0.480', '0.460', null, '342.00');
INSERT INTO `product_variants` VALUES ('15', '5', null, '0.600', '0.480', '0.460', null, '382.00');
INSERT INTO `product_variants` VALUES ('16', '6', null, '0.800', '1.030', null, null, '802.00');
INSERT INTO `product_variants` VALUES ('17', '20', null, '0.800', '0.480', '0.460', null, '422.00');
INSERT INTO `product_variants` VALUES ('26', '7', null, '0.400', '0.101', null, '2.440', '99.18');
INSERT INTO `product_variants` VALUES ('27', '7', null, '0.400', '0.153', null, '2.440', '149.75');
INSERT INTO `product_variants` VALUES ('28', '7', null, '0.400', '0.203', null, '2.440', '199.34');
INSERT INTO `product_variants` VALUES ('29', '7', null, '0.400', '0.305', null, '2.440', '299.50');
INSERT INTO `product_variants` VALUES ('30', '7', null, '0.400', '0.407', null, '2.440', '399.66');
INSERT INTO `product_variants` VALUES ('31', '7', null, '0.400', '0.457', null, '2.440', '448.76');
INSERT INTO `product_variants` VALUES ('32', '7', null, '0.400', '0.610', null, '2.440', '599.00');
INSERT INTO `product_variants` VALUES ('33', '7', null, '0.400', '0.763', null, '2.440', '749.24');
INSERT INTO `product_variants` VALUES ('34', '7', null, '0.400', '0.813', null, '2.440', '798.34');
INSERT INTO `product_variants` VALUES ('35', '7', null, '0.400', '0.915', null, '2.440', '898.50');
INSERT INTO `product_variants` VALUES ('36', '7', null, '0.400', '1.220', null, '2.440', '1198.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_informations
-- ----------------------------
INSERT INTO `user_informations` VALUES ('1', 'Desidido', 'Kho', 'Manigbas', null, 'Pogi St', null, '8000', '09999911991');
INSERT INTO `user_informations` VALUES ('2', 'test', 'tes', 'tes', '', 'asdfaf', '', '800', '1231231311');
INSERT INTO `user_informations` VALUES ('3', 'allan', 's', 'cabusora', '', 'Pogi Street, S.I.R. Matina\r\nLot 20, Block 61 1st Flr,', '', '8000', '9285487265');
INSERT INTO `user_informations` VALUES ('4', 'Desidido', 'Q', 'Manigbas', '', 'Pogi Street', '', '8000', '123412314');
INSERT INTO `user_informations` VALUES ('5', 'pesting', 'tes', 'test', '', 'alsdjflkj', 'lkjl', '800', '123131');
INSERT INTO `user_informations` VALUES ('6', 'Allan', 'S', 'Cabusora', '', 'Lanang', '', '1231', '1231231');
