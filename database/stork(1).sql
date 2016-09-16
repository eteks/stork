-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2016 at 03:57 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
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
(1, 'admin', 'admin', 'admin@admin.com', 9876543210, 1, 1, '2016-07-13 12:39:28');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='To store area information in particulate state' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stork_area`
--

INSERT INTO `stork_area` (`area_id`, `area_name`, `area_state_id`, `area_city_id`, `area_delivery_charge`, `area_status`, `create_date`) VALUES
(1, 'Kathikamam', 16, 2, 20.00, 1, '2016-06-30 07:54:29'),
(2, 'Korimedu', 16, 2, 50.00, 1, '2016-06-30 07:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `stork_cabin_ccavenue_transaction`
--

CREATE TABLE IF NOT EXISTS `stork_cabin_ccavenue_transaction` (
  `cabin_transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `cabin_order_id` int(11) NOT NULL,
  `cabin_user_id` int(11) NOT NULL,
  `tracking_id` varchar(150) NOT NULL,
  `bank_referrence_number` varchar(150) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `payment_mode` varchar(150) NOT NULL,
  `card_name` varchar(150) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `status_code` tinyint(1) NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `merchant_amount` decimal(9,2) NOT NULL,
  `eci_value` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cabin_transaction_id`),
  KEY `cabin_order_id` (`cabin_order_id`,`cabin_user_id`),
  KEY `cabin_user_id` (`cabin_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stork_cabin_cost_estimation`
--

CREATE TABLE IF NOT EXISTS `stork_cabin_cost_estimation` (
  `cabin_cost_estimation_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of cabin cost estimation',
  `cabin_cost_estimation_timing_type` varchar(100) NOT NULL COMMENT 'Timing type stores whether fixed or flexible',
  `cabin_cost_estimation_duration` time NOT NULL COMMENT 'Cost estimation duration stores the duration in timing format like 1:00:00 or 1:30:00',
  `cabin_cost_estimation_amount` decimal(8,2) NOT NULL COMMENT 'Amount to be estimate for the specified duration',
  `cabin_cost_estimation_status` tinyint(1) NOT NULL COMMENT 'Status for the Estimated cost duration',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cabin_cost_estimation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stork_cabin_cost_estimation`
--

INSERT INTO `stork_cabin_cost_estimation` (`cabin_cost_estimation_id`, `cabin_cost_estimation_timing_type`, `cabin_cost_estimation_duration`, `cabin_cost_estimation_amount`, `cabin_cost_estimation_status`, `created_date`) VALUES
(1, 'fixed', '02:05:00', 34.00, 1, '2016-07-19 09:32:36'),
(2, 'flexible', '08:03:00', 34.00, 1, '2016-07-19 11:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `stork_cabin_holiday`
--

CREATE TABLE IF NOT EXISTS `stork_cabin_holiday` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identification of holiday',
  `holiday_day` varchar(50) NOT NULL COMMENT 'Specific Day of Holiday like sunday, monday, tuesday,etc',
  `holiday_date` date NOT NULL COMMENT 'Specific Date of Holiday like YYYY-MM--DD',
  `holiday_status` tinyint(1) NOT NULL COMMENT 'Stores the specified holiday status',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`holiday_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stork_cabin_holiday`
--

INSERT INTO `stork_cabin_holiday` (`holiday_id`, `holiday_day`, `holiday_date`, `holiday_status`, `created_date`) VALUES
(2, 'Tuesday', '2016-07-12', 1, '2016-07-19 09:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `stork_cabin_order`
--

CREATE TABLE IF NOT EXISTS `stork_cabin_order` (
  `cabin_order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of cabin booking id',
  `cabin_order_user_id` int(11) DEFAULT NULL COMMENT 'Mapped User id of cabin booked user',
  `cabin_order_user_type` varchar(100) NOT NULL COMMENT 'User type of cabin booked user',
  `cabin_order_user_name` varchar(150) NOT NULL COMMENT 'User name of cabin booked user',
  `cabin_order_email` varchar(150) NOT NULL COMMENT 'Email of cabin booked user',
  `cabin_order_mobile` bigint(15) NOT NULL COMMENT 'Mobile number of cabin booked user',
  `cabin_order_timing_type` varchar(100) NOT NULL COMMENT 'Stores the timing type whether fixed or flexible',
  `cabin_order_schedule_time_id` varchar(150) NOT NULL COMMENT 'Mapped Schedule time id that is, the timing which is selected by user',
  `cabin_order_number_of_system` bigint(15) NOT NULL COMMENT 'number of system booked by user',
  `cabin_order_required_date` date NOT NULL COMMENT 'Required Date which is cabin booked by user',
  `cabin_order_total_hours` varchar(100) NOT NULL COMMENT 'Required Total Hours booked by user',
  `cabin_order_total_amount` decimal(8,2) NOT NULL COMMENT 'Total amount calcuated based on system and hours with timing type',
  `cabin_order_status` tinyint(4) NOT NULL COMMENT 'cabin booked order status for the specified user',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cabin_order_id`),
  KEY `cabin_order_user_id` (`cabin_order_user_id`,`cabin_order_schedule_time_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stork_cabin_schedule_time`
--

CREATE TABLE IF NOT EXISTS `stork_cabin_schedule_time` (
  `schedule_time_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique identification of schedule time id for system',
  `schedule_time_timing_type` varchar(100) NOT NULL COMMENT 'Stores the timing type whether fixed or flexible',
  `schedule_time_start` varchar(100) NOT NULL COMMENT 'Start time of schedule',
  `schedule_time_end` varchar(100) NOT NULL COMMENT 'End time of schedule',
  `schedule_time_status` tinyint(1) NOT NULL COMMENT 'Status of scheduled time',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`schedule_time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stork_cabin_schedule_time`
--

INSERT INTO `stork_cabin_schedule_time` (`schedule_time_id`, `schedule_time_timing_type`, `schedule_time_start`, `schedule_time_end`, `schedule_time_status`, `created_date`) VALUES
(2, 'fixed', '12 : 00 AM', '1 : 00 AM', 1, '2016-07-19 07:28:08'),
(3, 'fixed', '11:00 AM', '12:00 AM', 1, '2016-07-22 12:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `stork_cabin_system_availability`
--

CREATE TABLE IF NOT EXISTS `stork_cabin_system_availability` (
  `system_availability_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique identification of system availability',
  `system_availability_timing_type` varchar(100) NOT NULL COMMENT 'Timing type stores whether fixed or flexible',
  `system_booked_date` date NOT NULL COMMENT 'Stores the system booked date to find availability',
  `system_schedule_time_id` int(11) NOT NULL COMMENT 'Mapped the schedule time id to find availability ',
  `number_of_system_booked` bigint(15) NOT NULL COMMENT 'Number of system booked by user',
  `number_of_system_available` bigint(15) NOT NULL COMMENT 'Number of system available for user going to book',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`system_availability_id`),
  KEY `system_schedule_time_id` (`system_schedule_time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stork_cabin_system_availability`
--

INSERT INTO `stork_cabin_system_availability` (`system_availability_id`, `system_availability_timing_type`, `system_booked_date`, `system_schedule_time_id`, `number_of_system_booked`, `number_of_system_available`, `created_date`) VALUES
(1, 'fixed', '2016-07-12', 2, 2, 10, '2016-07-19 09:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `stork_cabin_total_number_of_system`
--

CREATE TABLE IF NOT EXISTS `stork_cabin_total_number_of_system` (
  `total_number_of_system_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identification for total number of system for every timing type',
  `total_number_of_system_timing_type` varchar(100) NOT NULL COMMENT 'Timing type stores whether fixed or flexible',
  `total_number_of_system` bigint(15) NOT NULL COMMENT 'Total number of sytem for every timing type ',
  `total_number_of_system_status` tinyint(1) NOT NULL COMMENT 'Total number of status',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`total_number_of_system_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stork_cabin_total_number_of_system`
--

INSERT INTO `stork_cabin_total_number_of_system` (`total_number_of_system_id`, `total_number_of_system_timing_type`, `total_number_of_system`, `total_number_of_system_status`, `created_date`) VALUES
(2, 'flexible', 10, 1, '2016-07-19 07:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `stork_ccavenue_transaction`
--

CREATE TABLE IF NOT EXISTS `stork_ccavenue_transaction` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(30) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `tracking_id` varchar(150) NOT NULL,
  `bank_referrence_number` varchar(150) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `payment_mode` varchar(150) NOT NULL,
  `card_name` varchar(150) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `student_id` int(10) DEFAULT NULL,
  `delivery_name` varchar(150) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `delivery_city` varchar(150) NOT NULL,
  `delivery_state` varchar(150) NOT NULL,
  `delivery_zip` varchar(150) NOT NULL,
  `delivery_country` varchar(150) NOT NULL,
  `delivery_email` varchar(150) NOT NULL,
  `delivery_mobile` bigint(15) NOT NULL,
  `year_of_studying` varchar(100) DEFAULT NULL,
  `delivery_area_name` varchar(100) NOT NULL,
  `offer_type` varchar(150) NOT NULL,
  `offer_code` varchar(150) NOT NULL,
  `discount_value` decimal(9,2) NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `status_code` tinyint(1) NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `merchant_amount` decimal(9,2) NOT NULL,
  `eci_value` int(10) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `transaction_id` (`transaction_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stork_ccavenue_transaction`
--

INSERT INTO `stork_ccavenue_transaction` (`transaction_id`, `order_id`, `user_id`, `tracking_id`, `bank_referrence_number`, `order_status`, `payment_mode`, `card_name`, `currency`, `student_id`, `delivery_name`, `delivery_address`, `delivery_city`, `delivery_state`, `delivery_zip`, `delivery_country`, `delivery_email`, `delivery_mobile`, `year_of_studying`, `delivery_area_name`, `offer_type`, `offer_code`, `discount_value`, `amount`, `status_code`, `status_message`, `merchant_amount`, `eci_value`, `create_date`) VALUES
(1, '3', NULL, 'a', 'sd', '', 'sdf', 'sdf', 'fd', 4, 'asd', 'sdf', 'asdf', 'asdf', 'asd', 'asdf', 'asd', 435, 'asdf', 'aaa', 'aa', 'aaa', 444.00, 4.00, 1, 'qwe', 43.00, 4, '2016-07-06 11:07:28');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stork_city`
--

INSERT INTO `stork_city` (`city_id`, `city_name`, `city_state_id`, `city_status`, `create_date`) VALUES
(1, 'Karaikal', 16, 1, '2016-06-30 05:25:02'),
(2, 'Puducherry', 16, 1, '2016-06-30 05:25:51'),
(3, 'Mahe', 16, 1, '2016-06-30 05:26:02'),
(4, 'Yanam', 16, 1, '2016-06-30 05:26:11'),
(6, 'Chennai', 19, 1, '2016-06-30 07:53:23'),
(7, 'Madurai', 19, 1, '2016-06-30 07:53:38');

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
(1, 'St Josphe College', 1, 1, '2016-06-30 14:02:20'),
(2, 'Indira gandhi Medical college', 1, 1, '2016-06-30 14:02:43'),
(3, 'Tahore Arts college', 2, 1, '2016-06-30 14:02:58');

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
(18, 20, 5, 10, 12, 23.00, 1, '2016-07-22 10:28:21');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stork_cost_estimation_binding`
--

INSERT INTO `stork_cost_estimation_binding` (`cost_estimation_binding_id`, `cost_estimation_binding_type`, `cost_estimation_binding_amount`, `cost_estimation_binding_status`, `create_date`) VALUES
(1, 'soft_binding', 23.00, 1, '2016-06-30 07:49:57'),
(2, 'spiral_binding', 200.00, 1, '2016-06-30 18:29:31'),
(3, 'wireo_binding', 250.00, 1, '2016-06-30 18:29:39'),
(4, 'comb_binding', 300.00, 1, '2016-06-30 18:29:46');

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
  `cost_estimation_multicolor_copies_id` int(11) DEFAULT NULL COMMENT 'Map the multicolor copies id to assign cost',
  `cost_estimation_multicolor_amount` decimal(10,2) NOT NULL,
  `cost_estimation_multicolor_status` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cost_estimation_multicolor_id`),
  KEY `cost_estimation_multicolor_paper_print_type_id` (`cost_estimation_multicolor_paper_print_type_id`),
  KEY `cost_estimation_multicolor_paper_side_id` (`cost_estimation_multicolor_paper_side_id`),
  KEY `cost_estimation_multicolor_paper_size_id` (`cost_estimation_multicolor_paper_size_id`),
  KEY `cost_estimation_multicolor_paper_type_id` (`cost_estimation_multicolor_paper_type_id`),
  KEY `cost_estimation_multicolor_copies_id` (`cost_estimation_multicolor_copies_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `stork_cost_estimation_multicolor`
--

INSERT INTO `stork_cost_estimation_multicolor` (`cost_estimation_multicolor_id`, `cost_estimation_multicolor_paper_print_type_id`, `cost_estimation_multicolor_paper_side_id`, `cost_estimation_multicolor_paper_size_id`, `cost_estimation_multicolor_paper_type_id`, `cost_estimation_multicolor_copies_id`, `cost_estimation_multicolor_amount`, `cost_estimation_multicolor_status`, `created_date`) VALUES
(10, 18, 7, 16, 16, 1, 34.00, 1, '2016-07-13 10:24:27');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stork_cost_estimation_project_printing`
--

INSERT INTO `stork_cost_estimation_project_printing` (`cost_estimation_project_printing_id`, `cost_estimation_project_printing_paper_print_type_id`, `cost_estimation_project_printing_paper_side_id`, `cost_estimation_project_printing_paper_size_id`, `cost_estimation_project_printing_paper_type_id`, `cost_estimation_project_printing_amount`, `cost_estimation_project_printing_status`, `created_date`) VALUES
(2, 22, 4, 14, 14, 34.00, 1, '2016-07-22 11:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `stork_multicolor_copies`
--

CREATE TABLE IF NOT EXISTS `stork_multicolor_copies` (
  `multicolor_copies_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Muticolor copies unique identification number',
  `multicolor_copies` varchar(150) NOT NULL COMMENT 'Muticolor copies list',
  `multicolor_copies_status` tinyint(1) NOT NULL COMMENT 'Muticolor copies status',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created date of Muticolor copies',
  PRIMARY KEY (`multicolor_copies_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `stork_multicolor_copies`
--

INSERT INTO `stork_multicolor_copies` (`multicolor_copies_id`, `multicolor_copies`, `multicolor_copies_status`, `created_date`) VALUES
(1, '1000', 1, '2016-07-11 12:19:02'),
(2, '2000', 1, '2016-07-11 12:19:44'),
(3, '3000', 1, '2016-07-11 12:19:44'),
(4, '4000', 1, '2016-07-11 12:19:44'),
(5, '5000 and above', 1, '2016-07-11 12:19:44'),
(6, '10000 and above', 0, '2016-07-11 12:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `stork_offer_details`
--

CREATE TABLE IF NOT EXISTS `stork_offer_details` (
  `offer_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of offer id',
  `offer_type` varchar(150) NOT NULL COMMENT 'Purpose of offer either it may be general or customer offer or season offer',
  `offer_title` varchar(200) NOT NULL COMMENT 'Title of Offer',
  `offer_code` varchar(200) NOT NULL COMMENT 'Offer code to give for user',
  `offer_validity_start_date` datetime NOT NULL COMMENT 'Start date of Offer Validity',
  `offer_validity_end_date` datetime NOT NULL COMMENT 'End date of Offer Validity',
  `offer_amount_type` varchar(50) NOT NULL COMMENT 'Offer Amount type stores whether it is cost or percentage',
  `offer_amount` decimal(10,2) NOT NULL COMMENT 'Amount for offer going to give for user',
  `offer_eligible_amount` decimal(10,2) NOT NULL COMMENT 'Stores Amount eligible for user using this offer',
  `offer_usage_limit` bigint(15) DEFAULT NULL COMMENT 'Number of Limitation going to give to use this offer for user',
  `offer_status` tinyint(1) NOT NULL COMMENT 'Offer status stores whether it may be active or inactive',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stork_offer_details`
--

INSERT INTO `stork_offer_details` (`offer_id`, `offer_type`, `offer_title`, `offer_code`, `offer_validity_start_date`, `offer_validity_end_date`, `offer_amount_type`, `offer_amount`, `offer_eligible_amount`, `offer_usage_limit`, `offer_status`, `created_date`) VALUES
(1, 'general_offer', 'general', 'CODE123', '2016-07-30 00:00:00', '2016-09-15 00:00:00', 'cost', 100.00, 500.00, 2, 1, '2016-07-28 18:30:00'),
(2, 'customer_offer', 'dewali', 'CODE124', '2016-07-28 00:00:00', '2016-08-19 00:00:00', 'percentage', 20.00, 200.00, 4, 1, '2016-07-28 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `stork_offer_provide_all_users`
--

CREATE TABLE IF NOT EXISTS `stork_offer_provide_all_users` (
  `offer_provided_details_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of offer provided details id',
  `offer_provided_user_id` int(10) DEFAULT NULL COMMENT 'Stores the user id of offer provided, null value can be passed if user is guest',
  `offer_provided_username` varchar(150) NOT NULL COMMENT 'Stores the username of the provided user',
  `offer_provided_useremail` varchar(150) NOT NULL COMMENT 'Stores the usermail of the provided user',
  `offer_provided_usermobile` bigint(15) NOT NULL COMMENT 'Stores the user mobile of the provided user',
  `offer_provided_usertype` varchar(150) NOT NULL COMMENT 'Stores the user type of the provided user',
  `offer_provided_order_id` int(10) NOT NULL COMMENT 'Stores the order id to be selected for the offer',
  `offer_provided_maximum_amount_in_order` decimal(10,2) NOT NULL COMMENT 'Stores the maximum amount of the selected order for offer',
  `offer_id` int(10) NOT NULL COMMENT 'Stores the offer id going to give for the user',
  `offer_filter_amount` decimal(10,2) NOT NULL COMMENT 'Stores the amount to be used for filter by admin',
  `offer_filter_start_date` datetime DEFAULT NULL COMMENT 'Stores the start date to be used for filter by admin',
  `offer_filter_end_date` datetime DEFAULT NULL COMMENT 'Stores the end date to be used for filter by admin',
  `is_email_sent` tinytext NOT NULL COMMENT 'Stores the status of email whether it sent or not',
  `is_used` tinytext NOT NULL COMMENT 'Stores the status of order whether it is used by user or not',
  `limit_used` bigint(15) NOT NULL COMMENT 'Stores the number of limitation used this offer by user',
  `is_limit_status` tinyint(4) NOT NULL COMMENT 'Stores the limitation status available or not, 1- Limitation Available 0-Not Available ',
  `is_validity` tinyint(4) NOT NULL COMMENT 'Stores the validity of the offer whether it is available or expired, 1- Available, 0-Expired',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Created date of the provided offer for users',
  PRIMARY KEY (`offer_provided_details_id`),
  KEY `offer_provided_user_id` (`offer_provided_user_id`),
  KEY `offer_provided_order_id` (`offer_provided_order_id`),
  KEY `offer_id` (`offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stork_offer_provide_registered_users`
--

CREATE TABLE IF NOT EXISTS `stork_offer_provide_registered_users` (
  `offer_provided_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of offer provided id',
  `offer_id` int(10) NOT NULL COMMENT 'Stores the offer id given for user',
  `user_id` int(10) NOT NULL COMMENT 'Stores the user id for the provided offer',
  `is_email_sent` tinyint(1) NOT NULL COMMENT 'Stores the status of email whether it sent or not',
  `is_used` tinyint(1) NOT NULL COMMENT 'Stores the status of order whether it is used by user or not',
  `limit_used` bigint(15) NOT NULL COMMENT 'Stores the number of limitation used this offer by user',
  `is_limit_status` tinyint(1) NOT NULL COMMENT 'Stores the limitation status available or not, 1- Limitation Available 0-Not Available ',
  `is_validity` tinyint(1) NOT NULL COMMENT 'Stores the validity of the offer whether it is available or expired, 1- Available, 0-Expired',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created date of the provided offer for users',
  PRIMARY KEY (`offer_provided_id`),
  KEY `offer_id` (`offer_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `stork_offer_provide_registered_users`
--

INSERT INTO `stork_offer_provide_registered_users` (`offer_provided_id`, `offer_id`, `user_id`, `is_email_sent`, `is_used`, `limit_used`, `is_limit_status`, `is_validity`, `created_date`) VALUES
(13, 1, 106, 0, 0, 0, 1, 1, '2016-09-15 09:45:05'),
(14, 1, 107, 0, 0, 0, 1, 1, '2016-09-15 09:52:10');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='To store information about offer detiles' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stork_order`
--

CREATE TABLE IF NOT EXISTS `stork_order` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_user_id` int(10) DEFAULT NULL,
  `order_total_items` int(10) NOT NULL,
  `order_user_type` varchar(100) NOT NULL,
  `order_customer_name` varchar(250) NOT NULL,
  `order_student_id` int(10) DEFAULT NULL,
  `order_student_year` int(5) DEFAULT NULL,
  `order_shipping_department` varchar(250) DEFAULT NULL COMMENT 'if student booked',
  `order_shipping_college` varchar(100) DEFAULT NULL,
  `order_shipping_line1` varchar(100) NOT NULL,
  `order_shipping_line2` varchar(100) NOT NULL,
  `order_shipping_area` varchar(200) NOT NULL,
  `order_shipping_state` varchar(200) NOT NULL,
  `order_shipping_city` varchar(200) NOT NULL,
  `order_shipping_email` varchar(50) NOT NULL,
  `order_shipping_mobile` bigint(15) NOT NULL,
  `order_delivery_status` varchar(20) NOT NULL,
  `order_delivery_date` date NOT NULL,
  `order_delivery_time` time DEFAULT NULL,
  `order_status` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `order_user_id` (`order_user_id`),
  KEY `order_shipping_area_id` (`order_shipping_area`),
  KEY `order_shipping_state_id` (`order_shipping_state`),
  KEY `order_shipping_city_id` (`order_shipping_city`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stork_order`
--

INSERT INTO `stork_order` (`order_id`, `order_user_id`, `order_total_items`, `order_user_type`, `order_customer_name`, `order_student_id`, `order_student_year`, `order_shipping_department`, `order_shipping_college`, `order_shipping_line1`, `order_shipping_line2`, `order_shipping_area`, `order_shipping_state`, `order_shipping_city`, `order_shipping_email`, `order_shipping_mobile`, `order_delivery_status`, `order_delivery_date`, `order_delivery_time`, `order_status`, `created_date`) VALUES
(2, 0, 1, 'gue_stu', 'dfadfadf', 11, 2, 'dfadsf', 'St Josphe College', 'east street', 'menatchipetIndira gandhi Medical college', 'Kathikamam', 'Puducherry', 'Puducherry', 'spmuthu21@gmail.com', 7845729671, 'pending', '0000-00-00', NULL, 1, '2016-07-07 06:50:19'),
(3, 0, 1, 'gue_stu', 'muthu', 0, 0, 'east street', 'Indira gandhi Medical college', 'east street', 'menatchipetIndira gandhi Medical college', 'Kathikamam', 'Puducherry', 'Puducherry', 'spmuthu21@gmail.com', 7845729671, 'pending', '2016-07-27', NULL, 1, '2016-07-07 06:51:38'),
(4, 0, 1, 'gue_stu', 'muthu', 0, 0, '', '', 'east street', 'menatchipetIndira gandhi Medical college', 'Kathikamam', 'Puducherry', 'Puducherry', 'spmuthu21@gmail.com', 7845729671, 'delivered', '2016-07-08', NULL, 1, '2016-07-07 06:52:59');

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
  `order_details_print_page_type_required` tinyint(1) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stork_order_details`
--

INSERT INTO `stork_order_details` (`order_details_id`, `order_id`, `order_print_booking_type`, `order_details_paper_print_type_id`, `order_details_paper_size_id`, `order_details_paper_side_id`, `order_details_paper_type_id`, `order_details_is_binding`, `order_details_binding_type`, `order_details_print_page_type_required`, `order_details_total_no_of_pages`, `order_details_total_amount`, `order_details_comments`, `order_details_session_id`, `order_details_status`, `created_date`) VALUES
(1, NULL, 'plain_printing', 16, 10, 5, 12, 0, 'nil', 0, 23, 782.00, 'sdfads', 'gue_stu_57878825074a1', 1, '2016-07-14 12:40:47'),
(2, NULL, 'multicolor_printing', 18, 16, 7, 16, 0, 'nil', 0, 0, 34.00, '', 'gue_stu_57da757689c6e', 1, '2016-09-15 10:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `stork_paper_print_type`
--

CREATE TABLE IF NOT EXISTS `stork_paper_print_type` (
  `paper_print_type_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'paper print type unique idenfication number',
  `paper_print_type` varchar(100) NOT NULL COMMENT 'paper printe type like black, white,color,etc',
  `printing_type_id` int(11) DEFAULT NULL COMMENT 'Map the printing type id to find the particular paper print type if for which printing type',
  `paper_print_type_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'for developer referance',
  PRIMARY KEY (`paper_print_type_id`),
  KEY `printing_type_id` (`printing_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='To store paper printing type information' AUTO_INCREMENT=23 ;

--
-- Dumping data for table `stork_paper_print_type`
--

INSERT INTO `stork_paper_print_type` (`paper_print_type_id`, `paper_print_type`, `printing_type_id`, `paper_print_type_status`, `created_date`) VALUES
(16, 'Color with Black & White', 12, 1, '2016-07-12 06:24:06'),
(17, 'Color with Black & White', 13, 1, '2016-07-12 06:24:06'),
(18, 'Color with Black & White', 14, 1, '2016-07-12 06:24:07'),
(19, 'Color', 12, 1, '2016-07-12 07:28:46'),
(20, 'Black & White', 12, 1, '2016-07-20 12:22:01'),
(21, 'Black & White', 13, 1, '2016-07-22 09:51:12'),
(22, 'Color', 13, 1, '2016-07-22 09:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `stork_paper_side`
--

CREATE TABLE IF NOT EXISTS `stork_paper_side` (
  `paper_side_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Paper side unique identification number',
  `paper_side` varchar(150) NOT NULL COMMENT 'Paper side like single side and double side',
  `printing_type_id` int(11) DEFAULT NULL COMMENT 'Map the printing type id to find the particular paper side is for which printing type',
  `paper_side_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'for developer purpose',
  PRIMARY KEY (`paper_side_id`),
  KEY `printing_type_id` (`printing_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='To store papar description' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `stork_paper_side`
--

INSERT INTO `stork_paper_side` (`paper_side_id`, `paper_side`, `printing_type_id`, `paper_side_status`, `created_date`) VALUES
(4, 'Single Side', 13, 1, '2016-07-12 06:24:07'),
(5, 'Single side', 12, 1, '2016-07-12 07:29:30'),
(6, 'Double side', 12, 1, '2016-07-12 07:29:30'),
(7, 'Single Side', 14, 1, '2016-07-12 10:41:35'),
(8, 'Double Side', 14, 1, '2016-07-12 10:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `stork_paper_size`
--

CREATE TABLE IF NOT EXISTS `stork_paper_size` (
  `paper_size_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Paper size unique identification number',
  `paper_size` varchar(5) NOT NULL COMMENT 'Paper size like A1-A10,B1-B10,C1-C10',
  `printing_type_id` int(11) DEFAULT NULL COMMENT 'Map the printing type id to find the particular paper size is for which printing type',
  `paper_size_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`paper_size_id`),
  KEY `printing_type_id` (`printing_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `stork_paper_size`
--

INSERT INTO `stork_paper_size` (`paper_size_id`, `paper_size`, `printing_type_id`, `paper_size_status`, `created_date`) VALUES
(10, 'A3', 12, 1, '2016-07-12 07:30:47'),
(11, 'A4', 12, 1, '2016-07-12 07:30:47'),
(12, 'Legal', 12, 1, '2016-07-12 07:31:03'),
(13, 'A3', 13, 1, '2016-07-12 10:19:25'),
(14, 'A4', 13, 1, '2016-07-12 10:19:34'),
(15, 'Legal', 13, 1, '2016-07-12 10:19:41'),
(16, 'A3', 14, 1, '2016-07-12 10:43:35'),
(17, 'A4', 14, 1, '2016-07-12 10:43:35'),
(18, 'A5', 14, 1, '2016-07-12 10:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `stork_paper_type`
--

CREATE TABLE IF NOT EXISTS `stork_paper_type` (
  `paper_type_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Paper type unique identification number',
  `paper_type` varchar(150) NOT NULL COMMENT 'Paper type like normal sheet,royal bond,etc',
  `printing_type_id` int(11) DEFAULT NULL COMMENT 'Map the printing type id to find the particular paper type is for which printing type',
  `paper_type_status` tinyint(1) NOT NULL COMMENT '0-inactive,1-active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'for developer purpose',
  PRIMARY KEY (`paper_type_id`),
  KEY `printing_type_id` (`printing_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `stork_paper_type`
--

INSERT INTO `stork_paper_type` (`paper_type_id`, `paper_type`, `printing_type_id`, `paper_type_status`, `created_date`) VALUES
(12, 'Normal paper(70 GSM)', 12, 1, '2016-07-12 07:34:44'),
(13, 'Normal paper(75 GSM)', 12, 1, '2016-07-12 07:34:44'),
(14, 'Normal paper(70 GSM)', 13, 1, '2016-07-12 10:18:44'),
(15, 'Normal paper(75 GSM)', 13, 1, '2016-07-12 10:18:57'),
(16, 'Art Paper 100 GSM', 14, 1, '2016-07-12 10:42:36'),
(17, 'Art Paper 170 GSM', 14, 1, '2016-07-12 10:42:36'),
(18, 'Maplitho Paper 80 GSM', 14, 1, '2016-07-12 10:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `stork_printing_type`
--

CREATE TABLE IF NOT EXISTS `stork_printing_type` (
  `printing_type_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Printing Type unique identification number',
  `printing_type` varchar(150) NOT NULL COMMENT 'Store printing type name such as plain, project or multicolor printing',
  `printing_type_status` tinyint(1) NOT NULL COMMENT 'To store printing type status',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created date of printing type',
  PRIMARY KEY (`printing_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `stork_printing_type`
--

INSERT INTO `stork_printing_type` (`printing_type_id`, `printing_type`, `printing_type_status`, `created_date`) VALUES
(12, 'plain_printing', 1, '2016-07-12 06:24:06'),
(13, 'project_printing', 1, '2016-07-12 06:24:06'),
(14, 'multicolor_printing', 1, '2016-07-12 06:24:07');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='To store the all state in india' AUTO_INCREMENT=21 ;

--
-- Dumping data for table `stork_state`
--

INSERT INTO `stork_state` (`state_id`, `state_name`, `state_status`, `created_date`) VALUES
(16, 'Puducherry', 1, '2016-06-29 12:46:45'),
(17, 'Andhra Pradhesh', 1, '2016-06-29 13:51:40'),
(19, 'Tamilnadu', 1, '2016-06-30 07:53:00'),
(20, 'bbbbbbbbb', 0, '2016-07-13 12:39:49');

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
  `upload_files_number_of_copies` bigint(50) DEFAULT NULL,
  `upload_files_status` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`upload_files_id`),
  KEY `upload_files_order_details_id` (`upload_files_order_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `stork_upload_files`
--

INSERT INTO `stork_upload_files` (`upload_files_id`, `upload_files_order_details_id`, `upload_files_is_binding`, `upload_files_type`, `upload_files`, `upload_files_color_print_pages`, `upload_files_number_of_copies`, `upload_files_status`, `create_date`) VALUES
(1, 1, 0, 'content', 'upload_files/gue_stu_57878825074a1/MOM-Printstork-02-07-2016-10.45am-01.30pm.docx', '0-0', 0, 1, '2016-07-14 12:40:47'),
(9, 2, 0, 'content', 'upload_files/57da757689c6e_15-09-2016/eight.pdf', '', 1, 1, '2016-09-15 10:25:01');

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
  `user_city_id` int(10) DEFAULT NULL,
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
  `shipping_default_name` varchar(100) DEFAULT NULL,
  `shipping_default_addr1` varchar(200) DEFAULT NULL,
  `shipping_default_addr2` varchar(200) DEFAULT NULL,
  `shipping_default_area_id` varchar(200) DEFAULT NULL,
  `shipping_default_postalcode` int(10) DEFAULT NULL,
  `shipping_default_mobile` bigint(15) DEFAULT NULL,
  `shipping_default_email` varchar(100) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'for developer referance',
  PRIMARY KEY (`user_id`),
  KEY `user_area_id` (`user_area_id`),
  KEY `user_state_id` (`user_state_id`),
  KEY `student_area_id` (`student_area_id`),
  KEY `user_city_id` (`user_city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Store all the user information(admin,student,professional)' AUTO_INCREMENT=108 ;

--
-- Dumping data for table `stork_users`
--

INSERT INTO `stork_users` (`user_id`, `social_id`, `username`, `password`, `first_name`, `last_name`, `user_type`, `user_email`, `user_dob`, `line1`, `line2`, `user_area_id`, `user_city_id`, `user_state_id`, `user_mobile`, `user_access_type`, `user_student_id`, `user_student_name`, `student_pass_year`, `student_college_id`, `student_area_id`, `student_mob_num`, `student_dept`, `user_status`, `shipping_default_name`, `shipping_default_addr1`, `shipping_default_addr2`, `shipping_default_area_id`, `shipping_default_postalcode`, `shipping_default_mobile`, `shipping_default_email`, `create_date`) VALUES
(59, 0, 'adsf', 'dfdf', 'dfdf', 'dfdf', 1, 'dfdf', '2016-07-05', 'line1', 'line2', NULL, 2, 17, 34343, 1, 1111, 'dfdfd', 2, 2, 1, 34343, 'dfdf', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-28 10:17:29'),
(60, NULL, 'twetwe', '55', 'tert', 'wertwe', 0, 'sweetka342343nnan05@gmail.com', '1989-04-16', '', '', NULL, NULL, NULL, 2534534534, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-29 09:39:38'),
(61, NULL, 'asdasda', 'ss', 'siva', 'kannan', 0, 'swdasdsae@gmail.comd', '1998-05-05', '', '', NULL, NULL, NULL, 3422222222, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-29 10:16:43'),
(62, NULL, 'tertert', 'rr', 'terterst', 'sertert', 0, 'sweetkaewrteternna534n05@gmail.com', '1989-05-19', '', '', NULL, NULL, NULL, 5555555555, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-29 10:17:43'),
(63, NULL, 'tertertwertert', '33', 'tsetesr', 'tetrtre', 0, 'sweetkfsdfsdfsfannan05@gmail.comf', '1996-08-06', '', '', NULL, NULL, NULL, 4533333333, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-29 10:18:56'),
(64, NULL, 'tertertre', '11', 'twertsrdtre', 'terter', 0, 'sweetkaasedqw43nnan05@gmail.com', '1998-07-04', '', '', NULL, NULL, NULL, 4324242343, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-29 10:25:56'),
(65, NULL, 'gdfgdfgsdfgdsfgsdfgd', '11', 'gdfsgdsf', 'gdsgdsfgdfg', 0, 'swefdszdff@gfgzxdfzsdmail.com', '1998-04-04', '', '', NULL, NULL, NULL, 5634534534, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-29 10:58:40'),
(66, NULL, 'gsdsdfgsdf', 'gg', 'gsdfgdsfg', 'dsgdsgdsfg', 0, 'swfsadfsadfsae@gmail.com', '2004-09-19', '', '', NULL, NULL, NULL, 5653333333, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-30 04:14:40'),
(67, NULL, 'rr', 'rr', 'tgsadtew', 'rtwert', 0, 'swasfasdffasdfe@gmail.com', '1996-10-06', '', '', NULL, NULL, NULL, 6352345234, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-30 04:25:45'),
(68, NULL, 'werqwer', 'ee', 'rqwer', 'qwreq', 0, 'sweetkfasdfasddafasdnnan05@gmail.com', '1992-04-15', '', '', NULL, NULL, NULL, 4523423423, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-30 04:28:00'),
(69, NULL, 'twerte', '11', 'werter', 'tertwe', 0, 'swedasdasd@gdamail.com', '1999-07-05', '', '', NULL, NULL, NULL, 2312312312, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-30 04:30:19'),
(70, NULL, 'fsdfasdf', '11', 'fasdf', 'asdfasd', 0, 'sSDAsdAwe@gmail.comda', '1991-06-15', '', '', NULL, NULL, NULL, 2111111111, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-30 04:33:23'),
(71, NULL, 'rqwre', '33', 'rrwe', 'rqwrqw', 0, 'sweedasadssdtkannan05@gmail.com', '1996-08-04', '', '', NULL, NULL, NULL, 2344444444, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-15 04:34:52'),
(72, NULL, 'wqeqwe', '22', 'edeqwe', 'qweqwe', 0, 'ds@SDADADagmail.coma', '1972-08-18', '', '', NULL, NULL, NULL, 2341231232, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-16 04:35:32'),
(73, NULL, 'wqerqwerwe', '22', 'rqwerqw', 'rqwerqw', 0, 'sweedaAasdtkannan05@gmail.com', '1997-10-06', '', '', NULL, NULL, NULL, 3123123123, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-16 04:36:24'),
(74, NULL, 'wwererwerwerwer', 'ee', 'QQEQWE', 'QWEQWE', 0, 'sweetkaaseqweqweedqw43nnan05@gmail.com', '2004-08-14', '', '', NULL, NULL, NULL, 2343214234, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-16 04:37:33'),
(75, NULL, 'ee', 'ee', 'rfwaerqwer', 'wererqwr', 0, 'sdadasdweetkannadadasn05@gmail.com', '1989-09-15', '', '', NULL, NULL, NULL, 7465635345, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-17 04:47:35'),
(76, NULL, 'ww', 'ww', 'qweqweqw', 'eqweqwe', 0, 'sweetasdasdkdasdannan05@gmail.com', '1999-07-07', '', '', NULL, NULL, NULL, 4342342342, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-16 04:48:25'),
(77, NULL, 'ewewew', '33', 'erae', 'weqweqw', 0, 'sweetkannan05@gmail.com', '1995-10-05', '', '', NULL, NULL, NULL, 3131231231, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-16 04:49:24'),
(78, NULL, 'weqwewq', 'ee', 'eaew', 'qeqweq', 0, 'swdasdasdasdase@gmdsadail.com', '1999-09-05', '', '', NULL, NULL, NULL, 4331231231, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-16 04:50:58'),
(79, NULL, 'sweweeeeeee', 'ee', 'trsre', 'tetert', 0, 'swdasdeetkdasdasdasannan05@gmail.com', '1991-05-18', '', '', NULL, NULL, NULL, 3423423423, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-16 04:51:50'),
(80, NULL, 'twerrrrrrrrrrrrrrrrr', '44', 'tsdrtges', 'twer', 0, 'sweeterwerwerkannarerwn05@gmail.com', '1989-08-16', '', '', NULL, NULL, NULL, 4444444233, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-14 04:53:50'),
(81, NULL, 'qweqweqweqwewqe', '33', 'swewew', 'eqweqwe', 0, 'sweetkasdasdasdasdannan05@gmail.com', '1998-10-06', '', '', NULL, NULL, NULL, 4342342342, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 04:54:39'),
(82, NULL, 'werwerwerwerwer', '11', 'erer', 'rwerwe', 0, 'swetkdasdasdannan05@gmail.casmd', '1987-06-19', '', '', NULL, NULL, NULL, 4523434234, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:09:17'),
(83, NULL, 'qweqweqweqw', '11', 'ewqeqweq', 'weqweqw', 0, 'ASAS@gmail.com', '1987-09-18', '', '', NULL, NULL, NULL, 4342342342, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:13:09'),
(84, NULL, 'qwerqrqwere', 'dd', 'EQEQWEQW', 'EQWEQWE', 0, 'sweetkannadasdasdn05@gmail.com', '1989-08-18', '', '', NULL, NULL, NULL, 3243242342, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:15:02'),
(85, NULL, 'ewrwerwerwerwe', '33', 'rrrewr', 'werwerwerwe', 0, 'sweeasdasdasdadastkannan05@gmail.com', '1986-10-17', '', '', NULL, NULL, NULL, 3412312312, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:17:26'),
(86, NULL, 'ewqeqweqweqwe', 'ee', 'ewqeqwewqe', 'eqweqwe', 0, 'swasdasdeeasdasdtkadasdnnan05@gmail.com', '1996-09-06', '', '', NULL, NULL, NULL, 3214131231, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:18:43'),
(87, NULL, 'werwerwer', 'rr', 'rerwrwerw', 'rwerwer', 0, 'swdasdasasdaseetkadasdnnan05@gmail.com', '1989-07-12', '', '', NULL, NULL, NULL, 3432432423, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:20:24'),
(88, NULL, 'qweqwewqe', '22', 'rqwerqw', 'eqweqwe', 0, 'sweetkaasdasdnnadasdn05@gmail.com', '1996-08-07', '', '', NULL, NULL, NULL, 4344444444, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:23:39'),
(89, NULL, 'eqweqweqweqwe', '1234', 'ewqeqwe', 'eqwewq', 0, 'sweetdasdaskannan05@gmail.comasd', '1987-10-16', '', '', NULL, NULL, NULL, 5444444444, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:25:53'),
(90, NULL, 'eqwewqewqewqewq', 'ee', 'wseqwewqe', 'qweqweqwewq', 0, 'sweeasdasdtdasdkandanan05@gmail.com', '1990-08-15', '', '', NULL, NULL, NULL, 2343243243, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:45:22'),
(91, NULL, 'rrrrrrew', 'rr', 'rwerwerwer', 'rwerwerwe', 0, 'sweeasdastasddasdkannan05@gmail.com', '2001-05-06', '', '', NULL, NULL, NULL, 4234234234, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:46:38'),
(92, NULL, 'ewewewewew', '22', 'eqweqw', 'EQWEQWEe', 0, 'sweedasdtkanasdasnan05@gmail.comasd', '1988-08-15', '', '', NULL, NULL, NULL, 5242343242, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:50:43'),
(93, NULL, 'qweqwewq', '123', 'ewewe', 'qweqweqwe', 0, 'sweqweedwqeqwde@gmail.com', '1989-11-18', '', '', NULL, NULL, NULL, 1212121212, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 06:57:43'),
(94, NULL, 'rwerwerwerwer', '12', 'rerrweqrwqerwqerqwer', 'wqrwqerwqerwqerwqrwqerwe', 0, 'sweetasdasdkandasdasdnan05@gmail.com', '1992-07-15', '', '', NULL, NULL, NULL, 5434543534, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:02:00'),
(95, NULL, 'ererererer', '456', 'rwerwer', 'werwerwer', 0, 'swasdaseasdasdetdasdkannan05@gmail.com', '1988-08-14', '', '', NULL, NULL, NULL, 5453453253, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:10:14'),
(96, NULL, 'rwerwerwerwerwe', '33', 'rtwerwe', 'rwerwer', 0, 'sweasdasetdasdkadasdsannan05@gmail.com', '1987-07-18', '', '', NULL, NULL, NULL, 3421312312, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:11:37'),
(97, NULL, 'sdfsdfsdfsdfsdfsd', 'ff', 'gfsds', 'dfsdfsd', 0, 'sasdasdasweetksdasdannan05@gmail.comdda', '1996-09-07', '', '', NULL, NULL, NULL, 5534253453, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:12:24'),
(98, NULL, 'dfsdfsdfsdf', 'tt', 'sadffsd', 'ffs', 0, 'asdasdsadsa@gmail.com', '1998-09-04', '', '', NULL, NULL, NULL, 4324324234, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:13:19'),
(99, NULL, 'sdasdasdasdasd', '111', 'dsfadasda', 'sdasdasda', 0, 'sasdsadweedasdkannadsadn05@gmail.com', '1988-09-15', '', '', NULL, NULL, NULL, 4252343432, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:16:36'),
(100, NULL, 'ewqeqweqwe', '12', 'eqweqwe', 'qweqweqwe', 0, 'sdasdweetkdasdasadasnnan05@gmail.comasdasdasd', '1989-08-17', '', '', NULL, NULL, NULL, 4312412321, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:20:28'),
(101, NULL, 'werwerwerwere', '345', 'wererewr', 'werwerwer', 0, 'sweeasdtkasdasdannan05@gmail.comdasdasd', '1998-07-04', '', '', NULL, NULL, NULL, 3123123123, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:28:21'),
(102, NULL, 'dasdasdasw2', '11', 'rasdasdasdasd', 'asdasdasdsa', 0, 'asasdasddasd@asdasdgmail.comddas', '1990-06-17', '', '', NULL, NULL, NULL, 3423423432, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:34:13'),
(103, NULL, 'dwq12eswe', '12', 'rwerwer', 'erwerwerwerwer', 0, 'qwqsweetwwqwqwqwqwqwkannaewqeqn05@gmail.com', '1987-09-17', '', '', NULL, NULL, NULL, 3213231232, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:52:21'),
(104, NULL, 'rwerwer45234', '12', 'rerewrewr', 'werwererewr', 0, 'sweqweweeteqweqkaeweqwasedqw43nnan05@gmail.com', '1989-06-17', '', '', NULL, NULL, NULL, 6534432434, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:55:35'),
(105, NULL, 'sdfsdfs545fd', 'ff', 'trtstrsfsdfsdfds', 'sdfsdfsdf', 0, 'sasdaswsdasdeasdadasdtkannan05@gmail.com', '1988-10-17', '', '', NULL, NULL, NULL, 5233333333, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 07:57:00'),
(106, NULL, 'eqweqweqwewqewqewqe', '11', 'eqwewqe', 'eqwewqeqw', 0, 'seweewqqweqwqewqwe@gmail.com', '1997-08-05', '', '', NULL, NULL, NULL, 3123123123, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 09:45:05'),
(107, NULL, 'kannan4041', '4041', 'kannan', 'kannan', 0, 'sweetkandsdsnan05@gmail.com', '1989-08-15', '', '', NULL, NULL, NULL, 7456653534, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-15 09:52:10');

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
-- Constraints for table `stork_cabin_ccavenue_transaction`
--
ALTER TABLE `stork_cabin_ccavenue_transaction`
  ADD CONSTRAINT `stork_cabin_ccavenue_transaction_ibfk_1` FOREIGN KEY (`cabin_order_id`) REFERENCES `stork_cabin_order` (`cabin_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cabin_ccavenue_transaction_ibfk_2` FOREIGN KEY (`cabin_user_id`) REFERENCES `stork_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_cabin_order`
--
ALTER TABLE `stork_cabin_order`
  ADD CONSTRAINT `stork_cabin_order_ibfk_1` FOREIGN KEY (`cabin_order_user_id`) REFERENCES `stork_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_cabin_system_availability`
--
ALTER TABLE `stork_cabin_system_availability`
  ADD CONSTRAINT `stork_cabin_system_availability_ibfk_1` FOREIGN KEY (`system_schedule_time_id`) REFERENCES `stork_cabin_schedule_time` (`schedule_time_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_ccavenue_transaction`
--
ALTER TABLE `stork_ccavenue_transaction`
  ADD CONSTRAINT `stork_ccavenue_transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `stork_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `stork_cost_estimation_multicolor_ibfk_1` FOREIGN KEY (`cost_estimation_multicolor_paper_print_type_id`) REFERENCES `stork_paper_print_type` (`paper_print_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_multicolor_ibfk_2` FOREIGN KEY (`cost_estimation_multicolor_paper_side_id`) REFERENCES `stork_paper_side` (`paper_side_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_multicolor_ibfk_3` FOREIGN KEY (`cost_estimation_multicolor_paper_size_id`) REFERENCES `stork_paper_size` (`paper_size_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_multicolor_ibfk_4` FOREIGN KEY (`cost_estimation_multicolor_paper_type_id`) REFERENCES `stork_paper_type` (`paper_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_multicolor_ibfk_5` FOREIGN KEY (`cost_estimation_multicolor_copies_id`) REFERENCES `stork_multicolor_copies` (`multicolor_copies_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_cost_estimation_project_printing`
--
ALTER TABLE `stork_cost_estimation_project_printing`
  ADD CONSTRAINT `stork_cost_estimation_project_printing_ibfk_1` FOREIGN KEY (`cost_estimation_project_printing_paper_print_type_id`) REFERENCES `stork_paper_print_type` (`paper_print_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_project_printing_ibfk_2` FOREIGN KEY (`cost_estimation_project_printing_paper_side_id`) REFERENCES `stork_paper_side` (`paper_side_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_project_printing_ibfk_3` FOREIGN KEY (`cost_estimation_project_printing_paper_size_id`) REFERENCES `stork_paper_size` (`paper_size_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_cost_estimation_project_printing_ibfk_4` FOREIGN KEY (`cost_estimation_project_printing_paper_type_id`) REFERENCES `stork_paper_type` (`paper_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_offer_provide_all_users`
--
ALTER TABLE `stork_offer_provide_all_users`
  ADD CONSTRAINT `stork_offer_provide_all_users_ibfk_1` FOREIGN KEY (`offer_provided_user_id`) REFERENCES `stork_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_offer_provide_all_users_ibfk_2` FOREIGN KEY (`offer_provided_order_id`) REFERENCES `stork_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_offer_provide_all_users_ibfk_3` FOREIGN KEY (`offer_id`) REFERENCES `stork_offer_details` (`offer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_offer_provide_registered_users`
--
ALTER TABLE `stork_offer_provide_registered_users`
  ADD CONSTRAINT `stork_offer_provide_registered_users_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `stork_offer_details` (`offer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_offer_provide_registered_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `stork_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `stork_paper_print_type`
--
ALTER TABLE `stork_paper_print_type`
  ADD CONSTRAINT `stork_paper_print_type_ibfk_1` FOREIGN KEY (`printing_type_id`) REFERENCES `stork_printing_type` (`printing_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_paper_side`
--
ALTER TABLE `stork_paper_side`
  ADD CONSTRAINT `stork_paper_side_ibfk_1` FOREIGN KEY (`printing_type_id`) REFERENCES `stork_printing_type` (`printing_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_paper_size`
--
ALTER TABLE `stork_paper_size`
  ADD CONSTRAINT `stork_paper_size_ibfk_1` FOREIGN KEY (`printing_type_id`) REFERENCES `stork_printing_type` (`printing_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_paper_type`
--
ALTER TABLE `stork_paper_type`
  ADD CONSTRAINT `stork_paper_type_ibfk_1` FOREIGN KEY (`printing_type_id`) REFERENCES `stork_printing_type` (`printing_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_upload_files`
--
ALTER TABLE `stork_upload_files`
  ADD CONSTRAINT `stork_upload_files_ibfk_1` FOREIGN KEY (`upload_files_order_details_id`) REFERENCES `stork_order_details` (`order_details_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stork_users`
--
ALTER TABLE `stork_users`
  ADD CONSTRAINT `stork_users_ibfk_3` FOREIGN KEY (`student_area_id`) REFERENCES `stork_area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_users_ibfk_4` FOREIGN KEY (`user_area_id`) REFERENCES `stork_area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_users_ibfk_5` FOREIGN KEY (`user_city_id`) REFERENCES `stork_city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stork_users_ibfk_6` FOREIGN KEY (`user_state_id`) REFERENCES `stork_state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
