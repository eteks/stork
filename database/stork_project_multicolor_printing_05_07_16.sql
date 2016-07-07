-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2016 at 06:57 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stork`
--

-- --------------------------------------------------------

--
-- Table structure for table `stork_admin_users`
--

CREATE TABLE IF NOT EXISTS `stork_admin_users` (
  `adminuser_id` int(10) NOT NULL AUTO_INCREMENT,
  `adminuser_username` varchar(50) NOT NULL,
  `adminuser_password` varchar(255) NOT NULL,
  `adminuser_email` varchar(50) NOT NULL,
  `adminuser_mobile` bigint(15) NOT NULL,
  `adminuser_type` int(5) NOT NULL,
  `adminuser_status` tinyint(1) NOT NULL,
  `adminuser_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adminuser_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stork_admin_users`
--

INSERT INTO `stork_admin_users` (`adminuser_id`, `adminuser_username`, `adminuser_password`, `adminuser_email`, `adminuser_mobile`, `adminuser_type`, `adminuser_status`, `adminuser_create_date`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 9876543210, 1, 1, '2016-07-01 12:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `stork_area`
--

CREATE TABLE IF NOT EXISTS `stork_area` (
  `area_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Area unique identification number',
  `area_name` varchar(150) NOT NULL COMMENT 'Area name',
  `area_state_id` int(11) NOT NULL,
  `area_city_id` int(10) DEFAULT NULL COMMENT 'City detail from city table',
  `area_delivery_charge` decimal(10,2) NOT NULL DEFAULT '0.00',
  `area_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`area_id`),
  KEY `area_city_id` (`area_city_id`),
  KEY `area_state_id` (`area_state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='To store area information in particulate state' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stork_area`
--

INSERT INTO `stork_area` (`area_id`, `area_name`, `area_state_id`, `area_city_id`, `area_delivery_charge`, `area_status`, `create_date`) VALUES
(1, 'dfasdf', 16, 2, 0.00, 1, '2016-06-30 06:51:42'),
(2, 'area11111', 16, 1, 0.00, 1, '2016-07-01 07:25:13'),
(3, 'area1', 16, 1, 21.00, 1, '2016-07-04 06:52:32'),
(4, 'sdfasdf23232', 16, 2, 26.00, 1, '2016-07-04 06:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `stork_ccavenue_transaction`
--

CREATE TABLE IF NOT EXISTS `stork_ccavenue_transaction` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `merchant_id` varchar(20) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `tracking_id` varchar(150) NOT NULL,
  `bank_referrence_number` varchar(150) NOT NULL,
  `payment_mode` varchar(150) NOT NULL,
  `card_name` varchar(150) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `txntype` varchar(5) NOT NULL,
  `action_id` varchar(3) NOT NULL,
  `user_id` int(10) NOT NULL,
  `delivery_name` varchar(150) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `delivery_city` varchar(150) NOT NULL,
  `delivery_state` varchar(150) NOT NULL,
  `delivery_area` varchar(150) NOT NULL,
  `delivery_zip` varchar(150) NOT NULL,
  `delivery_country` varchar(150) NOT NULL,
  `delivery_email` varchar(150) NOT NULL,
  `delivery_mobile` bigint(15) NOT NULL,
  `billing_cust_notes` varchar(200) NOT NULL,
  `merchant_param` varchar(100) NOT NULL,
  `offer_type` varchar(150) NOT NULL,
  `offer_code` varchar(150) NOT NULL,
  `discount_value` decimal(9,2) NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `status_code` tinyint(1) NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `transaction_status` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `stork_city`
--

CREATE TABLE IF NOT EXISTS `stork_city` (
  `city_id` int(10) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(150) NOT NULL,
  `city_state_id` int(11) NOT NULL,
  `city_status` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`city_id`),
  KEY `city_id` (`city_id`),
  KEY `city_state_id` (`city_state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `stork_city`
--

INSERT INTO `stork_city` (`city_id`, `city_name`, `city_state_id`, `city_status`, `create_date`) VALUES
(1, 'Karaikal', 16, 1, '2016-06-30 05:25:02'),
(2, 'Puducherry', 16, 1, '2016-06-30 05:25:51'),
(3, 'Mahe', 16, 1, '2016-06-30 05:26:02'),
(4, 'Yanam', 16, 1, '2016-06-30 05:26:11'),
(5, 'Karaikal', 17, 0, '2016-06-30 05:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `stork_college`
--

CREATE TABLE IF NOT EXISTS `stork_college` (
  `college_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'College unique identification number',
  `college_name` varchar(200) NOT NULL COMMENT 'College full name',
  `college_area_id` int(10) DEFAULT NULL COMMENT 'College area and state information from area and state tables',
  `college_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'For developer reference',
  PRIMARY KEY (`college_id`),
  KEY `college_area_id` (`college_area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='To store the college information students' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stork_college`
--

INSERT INTO `stork_college` (`college_id`, `college_name`, `college_area_id`, `college_status`, `create_date`) VALUES
(1, 'SGC', 1, 1, '2016-06-30 06:54:15'),
(2, 'asdfasd', 1, 0, '2016-06-30 12:33:50'),
(3, 'college2', 1, 1, '2016-07-01 06:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `stork_cost_estimation`
--

CREATE TABLE IF NOT EXISTS `stork_cost_estimation` (
  `cost_estimation_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Printing Cost estimation unique identification number',
  `cost_estimation_paper_print_type_id` int(10) NOT NULL COMMENT 'Paper print type information from paper print type table',
  `cost_estimation_paper_side_id` int(10) NOT NULL COMMENT 'information about printing page side from paper side tabel',
  `cost_estimation_paper_size_id` int(10) NOT NULL COMMENT 'Information about printing paper size',
  `cost_estimation_paper_type_id` int(10) NOT NULL COMMENT 'information about paper type',
  `cost_estimation_amount` decimal(5,2) NOT NULL COMMENT 'cost_estimation of print type, paper side, paper size, paper type',
  `cost_estimation_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cost_estimation_id`),
  KEY `cost_estimation_paper_side_id` (`cost_estimation_paper_side_id`),
  KEY `cost_estimation_paper_size_id` (`cost_estimation_paper_size_id`),
  KEY `cost_estimation_paper_print_type_id` (`cost_estimation_paper_print_type_id`),
  KEY `cost_estimation_paper_type_id` (`cost_estimation_paper_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='cost_estimation of multiple combination' AUTO_INCREMENT=19 ;

--
-- Dumping data for table `stork_cost_estimation`
--

INSERT INTO `stork_cost_estimation` (`cost_estimation_id`, `cost_estimation_paper_print_type_id`, `cost_estimation_paper_side_id`, `cost_estimation_paper_size_id`, `cost_estimation_paper_type_id`, `cost_estimation_amount`, `cost_estimation_status`, `created_date`) VALUES
(4, 4, 2, 4, 2, 100.00, 1, '2016-06-20 11:11:27'),
(5, 4, 2, 4, 3, 90.00, 1, '2016-06-20 11:11:45'),
(6, 4, 2, 5, 2, 90.00, 1, '2016-06-20 11:12:27'),
(7, 4, 2, 5, 3, 80.00, 1, '2016-06-20 11:12:42'),
(8, 4, 2, 6, 2, 80.00, 1, '2016-06-20 11:12:57'),
(9, 4, 2, 6, 3, 70.00, 1, '2016-06-20 11:13:20'),
(10, 4, 2, 7, 2, 1.50, 1, '2016-06-20 11:13:56'),
(11, 5, 2, 5, 2, 47.00, 1, '2016-06-20 11:14:13'),
(13, 4, 3, 7, 3, 0.50, 1, '2016-06-27 11:12:42'),
(17, 22, 2, 5, 2, 12.00, 1, '2016-07-04 13:48:50'),
(18, 4, 3, 6, 2, 2.00, 1, '2016-07-05 05:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `stork_cost_estimation_binding`
--

CREATE TABLE IF NOT EXISTS `stork_cost_estimation_binding` (
  `cost_estimation_binding_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost_estimation_binding_type` varchar(100) NOT NULL,
  `cost_estimation_binding_amount` decimal(5,2) NOT NULL,
  `cost_estimation_binding_status` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cost_estimation_binding_id`),
  KEY `cost_estimation_binding_id` (`cost_estimation_binding_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stork_cost_estimation_binding`
--

INSERT INTO `stork_cost_estimation_binding` (`cost_estimation_binding_id`, `cost_estimation_binding_type`, `cost_estimation_binding_amount`, `cost_estimation_binding_status`, `create_date`) VALUES
(7, 'soft_binding', 3.00, 1, '2016-07-01 07:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `stork_cost_estimation_multicolor`
--

CREATE TABLE IF NOT EXISTS `stork_cost_estimation_multicolor` (
  `cost_estimation_multicolor_id` int(10) NOT NULL AUTO_INCREMENT,
  `cost_estimation_multicolor_paper_print_type_id` int(10) NOT NULL,
  `cost_estimation_multicolor_paper_side_id` int(10) NOT NULL,
  `cost_estimation_multicolor_paper_size_id` int(10) NOT NULL,
  `cost_estimation_multicolor_paper_type_id` int(10) NOT NULL,
  `cost_estimation_multicolor_amount` decimal(10,2) NOT NULL,
  `cost_estimation_multicolor_status` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cost_estimation_multicolor_id`),
  KEY `cost_estimation_multicolor_paper_print_type_id` (`cost_estimation_multicolor_paper_print_type_id`),
  KEY `cost_estimation_multicolor_paper_side_id` (`cost_estimation_multicolor_paper_side_id`),
  KEY `cost_estimation_multicolor_paper_size_id` (`cost_estimation_multicolor_paper_size_id`),
  KEY `cost_estimation_multicolor_paper_type_id` (`cost_estimation_multicolor_paper_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stork_cost_estimation_project_printing`
--

CREATE TABLE IF NOT EXISTS `stork_cost_estimation_project_printing` (
  `cost_estimation_project_printing_id` int(10) NOT NULL AUTO_INCREMENT,
  `cost_estimation_project_printing_paper_print_type_id` int(10) NOT NULL,
  `cost_estimation_project_printing_paper_side_id` int(10) NOT NULL,
  `cost_estimation_project_printing_paper_size_id` int(10) NOT NULL,
  `cost_estimation_project_printing_paper_type_id` int(10) NOT NULL,
  `cost_estimation_project_printing_amount` decimal(10,2) NOT NULL,
  `cost_estimation_project_printing_status` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cost_estimation_project_printing_id`),
  KEY `cost_estimation_project_printing_paper_size_id` (`cost_estimation_project_printing_paper_size_id`),
  KEY `cost_estimation_project_printing_paper_type_id` (`cost_estimation_project_printing_paper_type_id`),
  KEY `cost_estimation_project_printing_paper_print_type_id` (`cost_estimation_project_printing_paper_print_type_id`),
  KEY `cost_estimation_project_printing_paper_side_id` (`cost_estimation_project_printing_paper_side_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stork_offer_zone`
--

CREATE TABLE IF NOT EXISTS `stork_offer_zone` (
  `offer_zone_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'offer zone unique identification number',
  `offer_zone_title` varchar(100) NOT NULL COMMENT 'title of offer zone',
  `offer_zone_image` varchar(255) NOT NULL COMMENT 'offer zone image path',
  `offer_zone_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`offer_zone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='To store information about offer detiles' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stork_offer_zone`
--

INSERT INTO `stork_offer_zone` (`offer_zone_id`, `offer_zone_title`, `offer_zone_image`, `offer_zone_status`, `create_date`) VALUES
(1, 'zone1', 'style/img/zone/banner-wishlist.jpg', 0, '2016-07-01 07:40:45'),
(2, 'zone2', 'style/img/zone/bg-bottom.jpg', 1, '2016-07-01 07:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `stork_order`
--

CREATE TABLE IF NOT EXISTS `stork_order` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_user_id` int(10) DEFAULT NULL,
  `order_total_items` int(10) NOT NULL,
  `order_user_type` int(10) NOT NULL,
  `order_customer_name` varchar(250) NOT NULL,
  `order_student_id` int(10) DEFAULT NULL,
  `order_student_year` int(5) DEFAULT NULL,
  `order_shipping_department` varchar(250) DEFAULT NULL COMMENT 'if student booked',
  `order_shipping_college_id` int(10) DEFAULT NULL,
  `order_shipping_line1` varchar(100) NOT NULL,
  `order_shipping_line2` varchar(100) NOT NULL,
  `order_shipping_area_id` int(10) DEFAULT NULL,
  `order_shipping_state_id` int(10) DEFAULT NULL,
  `order_shipping_city_id` int(11) DEFAULT NULL,
  `order_shipping_email` varchar(50) NOT NULL,
  `order_shipping_mobile` bigint(15) NOT NULL,
  `order_delivery_status` varchar(20) NOT NULL,
  `order_delivery_date` date NOT NULL,
  `order_delivery_time` time NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `order_user_id` (`order_user_id`),
  KEY `order_shipping_area_id` (`order_shipping_area_id`),
  KEY `order_shipping_state_id` (`order_shipping_state_id`),
  KEY `order_shipping_city_id` (`order_shipping_city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stork_order`
--

INSERT INTO `stork_order` (`order_id`, `order_user_id`, `order_total_items`, `order_user_type`, `order_customer_name`, `order_student_id`, `order_student_year`, `order_shipping_department`, `order_shipping_college_id`, `order_shipping_line1`, `order_shipping_line2`, `order_shipping_area_id`, `order_shipping_state_id`, `order_shipping_city_id`, `order_shipping_email`, `order_shipping_mobile`, `order_delivery_status`, `order_delivery_date`, `order_delivery_time`, `order_status`, `created_date`) VALUES
(1, 56, 2, 1, 'fdsfasdf', 11111, 2, 'MCA', 1, 'line1', 'line2', 1, 17, 1, 'kalai@gmail.com', 9876543210, 'processing', '2016-07-19', '00:00:00', 1, '2016-07-05 05:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `stork_order_details`
--

CREATE TABLE IF NOT EXISTS `stork_order_details` (
  `order_details_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) DEFAULT NULL,
  `order_print_booking_type` varchar(150) NOT NULL,
  `order_details_paper_print_type_id` int(10) NOT NULL,
  `order_details_paper_size_id` int(10) NOT NULL,
  `order_details_paper_side_id` int(10) NOT NULL,
  `order_details_paper_type_id` int(10) NOT NULL,
  `order_details_is_binding` tinyint(1) NOT NULL,
  `order_details_binding_type` varchar(100) NOT NULL,
  `order_details_total_no_of_pages` int(10) NOT NULL COMMENT 'Total no of pages will print',
  `order_details_total_amount` decimal(8,2) NOT NULL COMMENT 'cart total amount',
  `order_details_comments` varchar(200) NOT NULL,
  `order_details_session_id` varchar(255) NOT NULL COMMENT 'unique session id based on php unique id field',
  `order_details_status` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_details_id`),
  KEY `order_id` (`order_id`),
  KEY `order_details_paper_print_type_id` (`order_details_paper_print_type_id`),
  KEY `order_details_paper_size_id` (`order_details_paper_size_id`),
  KEY `order_details_paper_type_id` (`order_details_paper_type_id`),
  KEY `order_details_paper_side_id` (`order_details_paper_side_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stork_order_details`
--

INSERT INTO `stork_order_details` (`order_details_id`, `order_id`, `order_print_booking_type`, `order_details_paper_print_type_id`, `order_details_paper_size_id`, `order_details_paper_side_id`, `order_details_paper_type_id`, `order_details_is_binding`, `order_details_binding_type`, `order_details_total_no_of_pages`, `order_details_total_amount`, `order_details_comments`, `order_details_session_id`, `order_details_status`, `created_date`) VALUES
(6, 1, '', 4, 6, 2, 3, 1, 'soft_binding', 100, 2.00, 'dfasdfads', '123232', 1, '2016-07-05 06:00:21'),
(7, 1, '', 5, 6, 3, 2, 1, 'wireo_binding', 100, 234.00, 'asdfas', '', 1, '2016-07-05 06:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `stork_paper_print_type`
--

CREATE TABLE IF NOT EXISTS `stork_paper_print_type` (
  `paper_print_type_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'paper print type unique idenfication number',
  `paper_print_type` varchar(100) NOT NULL COMMENT 'paper printe type like black, white,color,etc',
  `paper_print_type_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'for developer referance',
  PRIMARY KEY (`paper_print_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='To store paper printing type information' AUTO_INCREMENT=23 ;

--
-- Dumping data for table `stork_paper_print_type`
--

INSERT INTO `stork_paper_print_type` (`paper_print_type_id`, `paper_print_type`, `paper_print_type_status`, `created_date`) VALUES
(4, 'Black & White', 1, '2016-06-20 10:47:25'),
(5, 'Color', 1, '2016-06-20 10:47:40'),
(22, 'Color with Black & White', 1, '2016-07-04 09:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `stork_paper_side`
--

CREATE TABLE IF NOT EXISTS `stork_paper_side` (
  `paper_side_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Paper side unique identification number',
  `paper_side` varchar(150) NOT NULL COMMENT 'Paper side like single side and double side',
  `paper_side_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'for developer purpose',
  PRIMARY KEY (`paper_side_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='To store papar description' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stork_paper_side`
--

INSERT INTO `stork_paper_side` (`paper_side_id`, `paper_side`, `paper_side_status`, `created_date`) VALUES
(2, 'Single Side', 1, '2016-06-13 11:14:23'),
(3, 'Double Side', 1, '2016-06-13 11:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `stork_paper_size`
--

CREATE TABLE IF NOT EXISTS `stork_paper_size` (
  `paper_size_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Paper size unique identification number',
  `paper_size` varchar(5) NOT NULL COMMENT 'Paper size like A1-A10,B1-B10,C1-C10',
  `paper_size_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`paper_size_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `stork_paper_size`
--

INSERT INTO `stork_paper_size` (`paper_size_id`, `paper_size`, `paper_size_status`, `created_date`) VALUES
(4, 'A1', 1, '2016-06-20 10:43:24'),
(5, 'A2', 1, '2016-06-20 10:43:31'),
(6, 'A3', 1, '2016-06-20 10:43:38'),
(7, 'A4', 1, '2016-06-20 10:43:47'),
(8, 'A5', 1, '2016-06-20 10:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `stork_paper_type`
--

CREATE TABLE IF NOT EXISTS `stork_paper_type` (
  `paper_type_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Paper type unique identification number',
  `paper_type` varchar(150) NOT NULL COMMENT 'Paper type like normal sheet,royal bond,etc',
  `paper_type_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'for developer purpose',
  PRIMARY KEY (`paper_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stork_paper_type`
--

INSERT INTO `stork_paper_type` (`paper_type_id`, `paper_type`, `paper_type_status`, `created_date`) VALUES
(2, 'Bond sheet', 1, '2016-06-13 11:14:41'),
(3, 'Normal sheet', 1, '2016-06-13 11:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `stork_state`
--

CREATE TABLE IF NOT EXISTS `stork_state` (
  `state_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'State unique identification number',
  `state_name` varchar(150) NOT NULL COMMENT 'Full state name',
  `state_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='To store the all state in india' AUTO_INCREMENT=24 ;

--
-- Dumping data for table `stork_state`
--

INSERT INTO `stork_state` (`state_id`, `state_name`, `state_status`, `created_date`) VALUES
(16, 'Puducherry', 1, '2016-06-29 12:46:45'),
(17, 'Andhra Pradhesh', 0, '2016-06-29 13:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `stork_upload_files`
--

CREATE TABLE IF NOT EXISTS `stork_upload_files` (
  `upload_files_id` int(10) NOT NULL AUTO_INCREMENT,
  `upload_files_order_details_id` int(10) NOT NULL,
  `upload_files_is_binding` tinyint(1) NOT NULL,
  `upload_files_type` varchar(100) NOT NULL COMMENT 'Cover or Content',
  `upload_files` varchar(200) NOT NULL,
  `upload_files_color_print_pages` varchar(255) DEFAULT NULL,
  `upload_files_status` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`upload_files_id`),
  KEY `upload_files_order_details_id` (`upload_files_order_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `stork_upload_files`
--

INSERT INTO `stork_upload_files` (`upload_files_id`, `upload_files_order_details_id`, `upload_files_is_binding`, `upload_files_type`, `upload_files`, `upload_files_color_print_pages`, `upload_files_status`, `create_date`) VALUES
(8, 6, 1, 'cover', 'upload_files/MOM-Printstork-02-07-2016-10.45am-01.30pm.docx', '11,12,13', 1, '2016-07-05 06:07:10'),
(9, 6, 1, 'content', 'upload_files/Print_stork_Bug_Sheet_Madhivanan_15.06.2016.xlsx', '20,30,40', 1, '2016-07-05 06:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `stork_users`
--

CREATE TABLE IF NOT EXISTS `stork_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'User_Idendification_Number',
  `social_id` bigint(25) DEFAULT NULL COMMENT 'Social id from google and face book',
  `username` varchar(50) NOT NULL COMMENT 'For login purpose',
  `password` varchar(255) NOT NULL COMMENT 'Password field with md5 encryption',
  `first_name` varchar(50) NOT NULL COMMENT 'User first name',
  `last_name` varchar(50) NOT NULL COMMENT 'User last name',
  `user_type` int(5) NOT NULL COMMENT '1-student.2-professional',
  `user_email` varchar(50) NOT NULL COMMENT 'User email id',
  `user_dob` date NOT NULL COMMENT 'User Date of Birth',
  `line1` varchar(150) NOT NULL COMMENT 'User plat no,door number,etc....',
  `line2` varchar(150) NOT NULL COMMENT 'User street name',
  `user_area_id` int(10) DEFAULT NULL COMMENT 'User area from Area table',
  `user_state_id` int(10) DEFAULT NULL COMMENT 'User state from state table',
  `user_mobile` bigint(15) NOT NULL COMMENT 'User mobile number (india only)',
  `user_access_type` int(5) NOT NULL COMMENT '1-normal login,2-facebook,3-google',
  `user_student_id` int(11) DEFAULT NULL,
  `user_student_name` varchar(50) DEFAULT NULL,
  `student_pass_year` int(5) DEFAULT NULL,
  `student_college_id` int(11) DEFAULT NULL,
  `student_area_id` int(11) DEFAULT NULL,
  `student_mob_num` bigint(15) DEFAULT NULL,
  `student_dept` varchar(50) DEFAULT NULL,
  `user_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'for developer referance',
  PRIMARY KEY (`user_id`),
  KEY `user_area_id` (`user_area_id`),
  KEY `user_state_id` (`user_state_id`),
  KEY `student_area_id` (`student_area_id`),
  KEY `user_area_id_2` (`user_area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Store all the user information(admin,student,professional)' AUTO_INCREMENT=59 ;

--
-- Dumping data for table `stork_users`
--

INSERT INTO `stork_users` (`user_id`, `social_id`, `username`, `password`, `first_name`, `last_name`, `user_type`, `user_email`, `user_dob`, `line1`, `line2`, `user_area_id`, `user_state_id`, `user_mobile`, `user_access_type`, `user_student_id`, `user_student_name`, `student_pass_year`, `student_college_id`, `student_area_id`, `student_mob_num`, `student_dept`, `user_status`, `create_date`) VALUES
(56, NULL, 'spmuthu21', 'Muthu@1991', 'Muthukaruppan', 'Palpandi', 0, 'spmuthu21@gmail.com', '1991-03-25', '', '', NULL, NULL, 7845729671, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-06-28 09:46:40'),
(57, 1062506010483873, 'spmuthu21@gmail.com', 'Muthu', 'Muthu', 'Karuppan', 0, 'spmuthu21@gmail.com', '0000-00-00', 'fb', 'fb', NULL, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-06-28 09:49:06'),
(58, 9223372036854775807, 'spmuthu21@gmail.com', 'muthu', 'muthu', 'karuppan', 0, 'spmuthu21@gmail.com', '0000-00-00', 'gp', 'gp', NULL, NULL, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-06-28 10:04:07');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stork_area`
--
ALTER TABLE `stork_area`
  ADD CONSTRAINT `stork_area_ibfk_1` FOREIGN KEY (`area_city_id`) REFERENCES `stork_city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_area_ibfk_2` FOREIGN KEY (`area_state_id`) REFERENCES `stork_state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_city`
--
ALTER TABLE `stork_city`
  ADD CONSTRAINT `stork_city_ibfk_1` FOREIGN KEY (`city_state_id`) REFERENCES `stork_state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_college`
--
ALTER TABLE `stork_college`
  ADD CONSTRAINT `stork_college_ibfk_1` FOREIGN KEY (`college_area_id`) REFERENCES `stork_area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_cost_estimation`
--
ALTER TABLE `stork_cost_estimation`
  ADD CONSTRAINT `stork_cost_estimation_ibfk_1` FOREIGN KEY (`cost_estimation_paper_print_type_id`) REFERENCES `stork_paper_print_type` (`paper_print_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_ibfk_2` FOREIGN KEY (`cost_estimation_paper_side_id`) REFERENCES `stork_paper_side` (`paper_side_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_ibfk_3` FOREIGN KEY (`cost_estimation_paper_size_id`) REFERENCES `stork_paper_size` (`paper_size_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_ibfk_4` FOREIGN KEY (`cost_estimation_paper_type_id`) REFERENCES `stork_paper_type` (`paper_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_cost_estimation_multicolor`
--
ALTER TABLE `stork_cost_estimation_multicolor`
  ADD CONSTRAINT `stork_cost_estimation_multicolor_ibfk_4` FOREIGN KEY (`cost_estimation_multicolor_paper_type_id`) REFERENCES `stork_cost_estimation` (`cost_estimation_paper_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_multicolor_ibfk_1` FOREIGN KEY (`cost_estimation_multicolor_paper_print_type_id`) REFERENCES `stork_cost_estimation` (`cost_estimation_paper_print_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_multicolor_ibfk_2` FOREIGN KEY (`cost_estimation_multicolor_paper_side_id`) REFERENCES `stork_cost_estimation` (`cost_estimation_paper_side_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_multicolor_ibfk_3` FOREIGN KEY (`cost_estimation_multicolor_paper_size_id`) REFERENCES `stork_cost_estimation` (`cost_estimation_paper_size_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_cost_estimation_project_printing`
--
ALTER TABLE `stork_cost_estimation_project_printing`
  ADD CONSTRAINT `stork_cost_estimation_project_printing_ibfk_1` FOREIGN KEY (`cost_estimation_project_printing_paper_size_id`) REFERENCES `stork_cost_estimation` (`cost_estimation_paper_size_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_project_printing_ibfk_2` FOREIGN KEY (`cost_estimation_project_printing_paper_type_id`) REFERENCES `stork_cost_estimation` (`cost_estimation_paper_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_project_printing_ibfk_3` FOREIGN KEY (`cost_estimation_project_printing_paper_side_id`) REFERENCES `stork_cost_estimation` (`cost_estimation_paper_side_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_project_printing_ibfk_4` FOREIGN KEY (`cost_estimation_project_printing_paper_print_type_id`) REFERENCES `stork_cost_estimation` (`cost_estimation_paper_print_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_order`
--
ALTER TABLE `stork_order`
  ADD CONSTRAINT `stork_order_ibfk_2` FOREIGN KEY (`order_shipping_area_id`) REFERENCES `stork_area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_order_ibfk_3` FOREIGN KEY (`order_shipping_state_id`) REFERENCES `stork_state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_order_ibfk_4` FOREIGN KEY (`order_user_id`) REFERENCES `stork_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_order_ibfk_5` FOREIGN KEY (`order_shipping_city_id`) REFERENCES `stork_city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_order_details`
--
ALTER TABLE `stork_order_details`
  ADD CONSTRAINT `stork_order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `stork_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_order_details_ibfk_2` FOREIGN KEY (`order_details_paper_size_id`) REFERENCES `stork_paper_size` (`paper_size_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_order_details_ibfk_3` FOREIGN KEY (`order_details_paper_side_id`) REFERENCES `stork_paper_side` (`paper_side_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_order_details_ibfk_4` FOREIGN KEY (`order_details_paper_type_id`) REFERENCES `stork_paper_type` (`paper_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_order_details_ibfk_5` FOREIGN KEY (`order_details_paper_print_type_id`) REFERENCES `stork_paper_print_type` (`paper_print_type_id`);

--
-- Constraints for table `stork_upload_files`
--
ALTER TABLE `stork_upload_files`
  ADD CONSTRAINT `stork_upload_files_ibfk_1` FOREIGN KEY (`upload_files_order_details_id`) REFERENCES `stork_order_details` (`order_details_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_users`
--
ALTER TABLE `stork_users`
  ADD CONSTRAINT `stork_users_ibfk_1` FOREIGN KEY (`user_area_id`) REFERENCES `stork_area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_users_ibfk_2` FOREIGN KEY (`user_state_id`) REFERENCES `stork_state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_users_ibfk_3` FOREIGN KEY (`student_area_id`) REFERENCES `stork_area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
