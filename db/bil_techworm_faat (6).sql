-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2019 at 08:11 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bil_techworm_faat`
--

-- --------------------------------------------------------

--
-- Table structure for table `bil_client_mw_generate_qrcode`
--

CREATE TABLE `bil_client_mw_generate_qrcode` (
  `id` int(15) NOT NULL,
  `username_bil` varchar(50) NOT NULL,
  `username_pcb` varchar(255) DEFAULT NULL,
  `qr_color` varchar(50) DEFAULT NULL,
  `color_qr_count` varchar(50) DEFAULT NULL,
  `generate_date` date DEFAULT NULL,
  `generate_time` varchar(50) DEFAULT NULL,
  `sequence_no` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_client_mw_generate_qrcode`
--

INSERT INTO `bil_client_mw_generate_qrcode` (`id`, `username_bil`, `username_pcb`, `qr_color`, `color_qr_count`, `generate_date`, `generate_time`, `sequence_no`, `created_at`, `update_at`) VALUES
(1, '12345', '', 'YELLOW', 'null', '2019-01-21', '09:01:13 PM', 'BIL123450000001', '2019-01-21 15:44:13', '0000-00-00 00:00:00'),
(2, '12345', '', 'YELLOW', 'null', '2019-01-21', '09:01:14 PM', 'BIL123450000002', '2019-01-21 15:44:14', '0000-00-00 00:00:00'),
(3, '12345', '', 'YELLOW', 'null', '2019-01-21', '10:01:10 PM', 'BIL123450000003', '2019-01-21 16:42:10', '0000-00-00 00:00:00'),
(4, '12345', '', 'YELLOW', 'null', '2019-01-21', '10:01:10 PM', 'BIL123450000004', '2019-01-21 16:42:10', '0000-00-00 00:00:00'),
(5, '12345', '', 'YELLOW', 'null', '2019-01-21', '10:01:42 PM', 'BIL123450000005', '2019-01-21 16:47:42', '0000-00-00 00:00:00'),
(6, '12345', '', 'YELLOW', 'null', '2019-01-21', '10:01:42 PM', 'BIL123450000006', '2019-01-21 16:47:42', '0000-00-00 00:00:00'),
(7, '12345', '', 'YELLOW', 'null', '2019-01-24', '07:01:06 PM', 'BIL123450000007', '2019-01-24 14:06:06', '0000-00-00 00:00:00'),
(8, '12345', '', 'YELLOW', 'null', '2019-01-24', '07:01:33 PM', 'BIL123450000008', '2019-01-24 14:06:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bil_client_mw_info`
--

CREATE TABLE `bil_client_mw_info` (
  `sno` int(11) NOT NULL,
  `hcf_number` varchar(255) NOT NULL,
  `organization_name` varchar(150) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `ownership` varchar(50) DEFAULT NULL,
  `ownership_other` varchar(50) DEFAULT NULL,
  `dse` varchar(50) DEFAULT NULL,
  `dse_date` varchar(10) DEFAULT NULL,
  `authorized_person` varchar(50) DEFAULT NULL,
  `ap_designation` varchar(50) DEFAULT NULL,
  `ap_contact` varchar(15) DEFAULT NULL,
  `beds_icp` int(15) DEFAULT NULL,
  `beds_ot` int(15) DEFAULT NULL,
  `beds_other` int(15) DEFAULT NULL,
  `total_beds` int(15) DEFAULT NULL,
  `flat_no` varchar(10) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `pincode` int(10) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `collection_supervisor_a` varchar(50) DEFAULT NULL,
  `collection_supervisor_b` varchar(50) DEFAULT NULL,
  `cs_a_contact` varchar(15) DEFAULT NULL,
  `cs_b_contact` varchar(15) DEFAULT NULL,
  `collection_incharge_a` varchar(50) DEFAULT NULL,
  `ci_a_designation` varchar(50) DEFAULT NULL,
  `ci_a_contact` varchar(15) DEFAULT NULL,
  `collection_incharge_b` varchar(50) DEFAULT NULL,
  `ci_b_designation` varchar(50) DEFAULT NULL,
  `ci_b_contact` varchar(15) DEFAULT NULL,
  `declartion_status` varchar(15) DEFAULT NULL,
  `username_bil` varchar(50) NOT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `registration_date` varchar(30) DEFAULT NULL,
  `profile_update_date` varchar(50) DEFAULT NULL,
  `username_pcb` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_client_mw_info`
--

INSERT INTO `bil_client_mw_info` (`sno`, `hcf_number`, `organization_name`, `category`, `ownership`, `ownership_other`, `dse`, `dse_date`, `authorized_person`, `ap_designation`, `ap_contact`, `beds_icp`, `beds_ot`, `beds_other`, `total_beds`, `flat_no`, `street`, `area`, `pincode`, `city`, `district`, `state`, `country`, `collection_supervisor_a`, `collection_supervisor_b`, `cs_a_contact`, `cs_b_contact`, `collection_incharge_a`, `ci_a_designation`, `ci_a_contact`, `collection_incharge_b`, `ci_b_designation`, `ci_b_contact`, `declartion_status`, `username_bil`, `email_id`, `password`, `registration_date`, `profile_update_date`, `username_pcb`) VALUES
(1, 'ALLIN110029DLBH00578', 'Hamidia Hospital', 'Blood Bank', 'State Government', '', 'Already in Existence', '15/01/1984', 'Ashutosh Dubey ', 'HEAD', '9999999999', 50, 15, 15, 100, '101', 'Kohifiza', 'tajul Maszid', 462001, 'Bhopal', 'Bhopal', 'Madhya Pradesh', 'India', 'Person ONE', 'Person TWO', '1111111111', '2222222222', 'Incharge person a', 'Supervisor one', '2222255555', 'Incharge person b', 'supervisor two', '6666633333', '1', '12345', 'abc@info.com', '1234', '', '23, 1, 2019', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bil_client_mw_notify`
--

CREATE TABLE `bil_client_mw_notify` (
  `s.no` int(15) NOT NULL,
  `username_bil` varchar(50) NOT NULL,
  `username_pcb` varchar(50) DEFAULT NULL,
  `notification_date` varchar(30) DEFAULT NULL,
  `issued_by` varchar(50) DEFAULT NULL,
  `display_on` varchar(50) DEFAULT NULL,
  `notification_category` varchar(50) DEFAULT NULL,
  `description` longtext NOT NULL,
  `notice_title` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_client_mw_notify`
--

INSERT INTO `bil_client_mw_notify` (`s.no`, `username_bil`, `username_pcb`, `notification_date`, `issued_by`, `display_on`, `notification_category`, `description`, `notice_title`, `status`, `create_at`, `modified_at`) VALUES
(1, '12345', '12345', '18/01/2019', 'Bhopal Incinerators Ltd.', 'dashboard', '2', 'OOPS! danger error.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'title one', 0, '2019-01-19 09:07:00', '2019-01-21 14:42:24'),
(2, '12345', '00002', '19/01/2019', 'Bhopal Incinerators Ltd.', 'dashboard', '1', 'Well done! You successfully read this important Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Notice second', 0, '2019-01-18 07:00:00', '2019-01-19 22:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `bil_client_mw_payment`
--

CREATE TABLE `bil_client_mw_payment` (
  `s.no` int(15) NOT NULL,
  `username_bil` varchar(50) NOT NULL,
  `username_pcb` varchar(50) NOT NULL,
  `cheques_num` varchar(255) NOT NULL,
  `record_up_date` varchar(30) DEFAULT NULL,
  `starting_date` varchar(30) DEFAULT NULL,
  `ending_date` varchar(30) DEFAULT NULL,
  `vehicle_status` varchar(30) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_client_mw_payment`
--

INSERT INTO `bil_client_mw_payment` (`s.no`, `username_bil`, `username_pcb`, `cheques_num`, `record_up_date`, `starting_date`, `ending_date`, `vehicle_status`, `payment_status`) VALUES
(1, '12345', '12345', '2345522', '10/08/2019', '10/08/2019', '15/08/2019', 'Running', 'Completed'),
(2, '12346', '12346', '1233333', '10/08/2019', '11/08/2019', '15/08/2019', 'Running', 'Completed'),
(3, '12347', '12347', '1222222', '15/08/2019', '15/08/2019', '15/08/2019', 'Running', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `bil_client_mw_report_bil`
--

CREATE TABLE `bil_client_mw_report_bil` (
  `id` int(15) NOT NULL,
  `username_bil` varchar(255) NOT NULL,
  `username_pcb` varchar(50) NOT NULL,
  `hcf_name` varchar(50) NOT NULL,
  `hcf_number` varchar(50) NOT NULL,
  `hcf_number_number` varchar(50) NOT NULL,
  `hcf_type` varchar(50) NOT NULL,
  `hcf_address` varchar(100) NOT NULL,
  `qr_generate_date` varchar(30) NOT NULL,
  `qr_sequence_number` varchar(100) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `entry_time` varchar(30) NOT NULL,
  `bag_weight` varchar(50) NOT NULL,
  `bag_color` varchar(255) NOT NULL,
  `gps_coordinate` varchar(50) NOT NULL,
  `pickup_fleet_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_client_mw_report_bil`
--

INSERT INTO `bil_client_mw_report_bil` (`id`, `username_bil`, `username_pcb`, `hcf_name`, `hcf_number`, `hcf_number_number`, `hcf_type`, `hcf_address`, `qr_generate_date`, `qr_sequence_number`, `entry_date`, `entry_time`, `bag_weight`, `bag_color`, `gps_coordinate`, `pickup_fleet_id`) VALUES
(1, '12345', '12345', 'HCF NAME', 'ALLIN110029DLBH00578', '00578', 'Veterinary Hospital', 'Bhopal', '20/01/2019', 'BIL123450000001', '2019-01-21', '12:01', '10', 'RED', '12345', '12345'),
(2, '12345', '123452', 'HCF NAME', 'ALLIN110029DLBH00578', '00579', 'Veterinary Hospital', 'BHOPAL', '20/01/2019', 'BIL123450000002', '2019-01-21', '01:01', '20', 'YELLOW', '222', '12345'),
(3, '12345', '123', 'HCF NAME', 'ALLIN110029DLBH00578', '00580', 'Veterinary Hospital', 'BHOPAL', '21/01/2019', 'BIL123450000002', '2019-01-21', '12:01', '20', 'BLUE', '222', '12345'),
(4, '12345', '1234', 'HCF NAME', 'ALLIN110029DLBH00578', '00581', 'Veterinary Hospital', 'BHOPAL', '21/01/2019', 'BIL123450000002', '2019-01-21', '12:01', '20', 'WHITE', '222', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bil_client_mw_report_fleet`
--

CREATE TABLE `bil_client_mw_report_fleet` (
  `s.no` int(15) NOT NULL,
  `username_bil` varchar(50) NOT NULL,
  `username_pcb` varchar(50) NOT NULL,
  `hcf_name` varchar(50) NOT NULL,
  `hcf_number` varchar(50) NOT NULL,
  `hcf_number_number` varchar(50) NOT NULL,
  `hcf_type` varchar(50) NOT NULL,
  `hcf_address` varchar(100) NOT NULL,
  `qr_generate_date` varchar(30) NOT NULL,
  `qr_sequence_number` varchar(100) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `entry_time` varchar(30) NOT NULL,
  `bag_weight` varchar(50) NOT NULL,
  `gps_coordinate` varchar(50) NOT NULL,
  `pickup_fleet_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bil_client_mw_report_fleet_temp`
--

CREATE TABLE `bil_client_mw_report_fleet_temp` (
  `s.no` int(15) NOT NULL,
  `username_bil` varchar(50) NOT NULL,
  `username_pcb` varchar(50) NOT NULL,
  `hcf_name` varchar(50) NOT NULL,
  `hcf_number` varchar(50) NOT NULL,
  `hcf_number_number` varchar(50) NOT NULL,
  `hcf_type` varchar(50) NOT NULL,
  `hcf_address` varchar(100) NOT NULL,
  `qr_generate_date` varchar(30) NOT NULL,
  `qr_sequence_number` varchar(100) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `entry_time` varchar(30) NOT NULL,
  `bag_weight` varchar(50) NOT NULL,
  `gps_coordinate` varchar(50) NOT NULL,
  `pickup_fleet_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bil_client_mw_report_hcf`
--

CREATE TABLE `bil_client_mw_report_hcf` (
  `id` int(15) NOT NULL,
  `username_bil` varchar(255) NOT NULL,
  `username_pcb` varchar(50) NOT NULL,
  `hcf_name` varchar(50) NOT NULL,
  `hcf_number` varchar(50) NOT NULL,
  `hcf_number_number` varchar(50) NOT NULL,
  `hcf_type` varchar(50) NOT NULL,
  `hcf_address` varchar(100) NOT NULL,
  `qr_generate_date` varchar(30) NOT NULL,
  `qr_sequence_number` varchar(100) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `entry_time` varchar(30) NOT NULL,
  `bag_weight` varchar(50) NOT NULL,
  `bag_color` varchar(255) NOT NULL,
  `gps_coordinate` varchar(50) NOT NULL,
  `pickup_fleet_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_client_mw_report_hcf`
--

INSERT INTO `bil_client_mw_report_hcf` (`id`, `username_bil`, `username_pcb`, `hcf_name`, `hcf_number`, `hcf_number_number`, `hcf_type`, `hcf_address`, `qr_generate_date`, `qr_sequence_number`, `entry_date`, `entry_time`, `bag_weight`, `bag_color`, `gps_coordinate`, `pickup_fleet_id`) VALUES
(1, '12345', '12345', 'HCF NAME', 'ALLIN110029DLBH00578', '00578', 'Veterinary Hospital', 'Bhopal', '20/01/2019', 'BIL123450000001', '2019-01-21', '12:01', '10', 'RED', '12345', '12345'),
(2, '12345', '123452', 'HCF NAME', 'ALLIN110029DLBH00578', '00579', 'Veterinary Hospital', 'BHOPAL', '20/01/2019', 'BIL123450000002', '2019-01-21', '01:01', '20', 'YELLOW', '222', '12345'),
(3, '12345', '123', 'HCF NAME', 'ALLIN110029DLBH00578', '00580', 'Veterinary Hospital', 'BHOPAL', '21/01/2019', 'BIL123450000002', '2019-01-21', '12:01', '20', 'BLUE', '222', '12345'),
(4, '12345', '1234', 'HCF NAME', 'ALLIN110029DLBH00578', '00581', 'Veterinary Hospital', 'BHOPAL', '21/01/2019', 'BIL123450000002', '2019-02-21', '12:01', '20', 'WHITE', '222', '12345'),
(5, '12345', '', 'HCF NAME', 'ALLIN110029DLBH00578', '00580', 'Veterinary Hospital', 'BHOPAL', '21/01/2019', 'BIL123450000002', '2019-03-21', '12:01', '20', 'BLUE', '222', '12345'),
(6, '12345', '1', 'HCF NAME', 'ALLIN110029DLBH00578', '00580', 'Veterinary Hospital', 'BHOPAL', '21/01/2019', 'BIL123450000002', '2019-01-21', '12:01', '20', 'BLUE', '222', '12345'),
(7, '12345', '2222', 'HCF NAME', 'ALLIN110029DLBH00578', '00580', 'Veterinary Hospital', 'BHOPAL', '21/01/2019', 'BIL123450000002', '2019-01-21', '12:01', '20', 'BLUE', '222', '12345'),
(8, '12345', '5', 'HCF NAME', 'ALLIN110029DLBH00578', '00578', 'Veterinary Hospital', 'Bhopal', '20/01/2019', 'BIL123450000001', '2019-01-21', '12:01', '10', 'RED', '12345', '12345'),
(9, '12345', '6', 'HCF NAME', 'ALLIN110029DLBH00578', '00581', 'Veterinary Hospital', 'BHOPAL', '21/01/2019', 'BIL123450000002', '2019-02-21', '12:01', '20', 'YELLOW', '222', '12345'),
(10, '12345', '3', 'HCF NAME', 'ALLIN110029DLBH00578', '00579', 'Veterinary Hospital', 'BHOPAL', '20/01/2019', 'BIL123450000002', '2019-01-21', '01:01', '20', 'YELLOW', '222', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bil_client_mw_report_hcf_temp`
--

CREATE TABLE `bil_client_mw_report_hcf_temp` (
  `s.no` int(11) NOT NULL,
  `username_bil` varchar(50) NOT NULL,
  `username_pcb` varchar(50) NOT NULL,
  `hcf_name` varchar(50) NOT NULL,
  `hcf_number` varchar(50) NOT NULL,
  `hcf_number_number` varchar(50) NOT NULL,
  `hcf_type` varchar(50) NOT NULL,
  `hcf_address` varchar(100) NOT NULL,
  `qr_generate_date` varchar(30) NOT NULL,
  `qr_sequence_number` varchar(100) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `entry_time` varchar(30) NOT NULL,
  `bag_weight` varchar(50) NOT NULL,
  `gps_coordinate` varchar(50) NOT NULL,
  `pickup_fleet_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_client_mw_report_hcf_temp`
--

INSERT INTO `bil_client_mw_report_hcf_temp` (`s.no`, `username_bil`, `username_pcb`, `hcf_name`, `hcf_number`, `hcf_number_number`, `hcf_type`, `hcf_address`, `qr_generate_date`, `qr_sequence_number`, `entry_date`, `entry_time`, `bag_weight`, `gps_coordinate`, `pickup_fleet_id`) VALUES
(1, '12345', '123', 'Hamidia', 'ALLIN110029DLBH00578', '', 'Veterinary Hospital', '1234 Street 11 Area MINAL City Bhopal District Bhopal Pincode 462023 \nMadhya Pradesh - India', '20-01-2019 12:01:21 PM', 'BIL123450000050', '19-01-2019', '11:03:33 PM', '0.89', '23.29903878,77.43279119', ''),
(2, '12345', '123', 'NEW HCF NAME', 'ALLIN110029DLBH00578', '', 'Veterinary Hospital', '1234 Street 11 Area MINAL City Bhopal District Bhopal Pincode 462023 \nMadhya Pradesh - India', '20-01-2019 12:01:21 PM', 'BIL123450000050', '21-01-2019', '12:24:27 AM', '6', '23.29903878,77.43279119', ''),
(3, '12345', '123', 'NEW HCF NAME', 'ALLIN110029DLBH00578', '', 'Veterinary Hospital', '1234 Street 11 Area MINAL City Bhopal District Bhopal Pincode 462023 \nMadhya Pradesh - India', '20-01-2019 12:01:21 PM', 'BIL123450000050', '21-01-2019', '12:26:52 AM', '5', '23.29903878,77.43279119', ''),
(4, '12345', '123', 'NEW HCF NAME', 'ALLIN110029DLBH00578', '', 'Veterinary Hospital', '1234 Street 11 Area MINAL City Bhopal District Bhopal Pincode 462023 \nMadhya Pradesh - India', '20-01-2019 12:01:21 PM', 'BIL123450000050', '21-01-2019', '12:28:44 AM', '2', '23.29903878,77.43279119', ''),
(5, '12345', '123', 'NEW HCF NAME', 'ALLIN110029DLBH00578', '', 'Veterinary Hospital', '1234 Street 11 Area MINAL City Bhopal District Bhopal Pincode 462023 \nMadhya Pradesh - India', '20-01-2019 12:01:21 PM', 'BIL123450000050', '21-01-2019', '02:11:07 AM', '5', '23.29903878,77.43279119', '');

-- --------------------------------------------------------

--
-- Table structure for table `bil_contactus`
--

CREATE TABLE `bil_contactus` (
  `id` int(11) NOT NULL,
  `name` int(50) NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` int(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bil_details`
--

CREATE TABLE `bil_details` (
  `s.no` int(15) NOT NULL,
  `id` varchar(50) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `authorized_person` varchar(50) DEFAULT NULL,
  `registered_date` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_details`
--

INSERT INTO `bil_details` (`s.no`, `id`, `user_name`, `password`, `authorized_person`, `registered_date`) VALUES
(1, '1', '12345', '12345', 'abc', '01/02/2019');

-- --------------------------------------------------------

--
-- Table structure for table `fleet_details`
--

CREATE TABLE `fleet_details` (
  `id` int(10) NOT NULL DEFAULT '0',
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `authorized_person` varchar(50) DEFAULT NULL,
  `registered_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fleet_details`
--

INSERT INTO `fleet_details` (`id`, `user_name`, `password`, `authorized_person`, `registered_date`) VALUES
(1, 'fleet@gmail.com', '123456789', 'Rishabh Awasthi', '16-01-2019');

-- --------------------------------------------------------

--
-- Table structure for table `hcf_clients`
--

CREATE TABLE `hcf_clients` (
  `id` int(11) NOT NULL,
  `Organization_Name` varchar(150) NOT NULL,
  `hcf_number` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Ownership` varchar(50) NOT NULL,
  `ownership_others` varchar(50) NOT NULL,
  `DSE` varchar(10) NOT NULL,
  `DSE_date` varchar(50) NOT NULL,
  `Authorized_Person` varchar(50) NOT NULL,
  `AP_Designation` varchar(50) NOT NULL,
  `AP_Contact` varchar(10) NOT NULL,
  `Beds_ICP` int(5) NOT NULL,
  `Beds_OT` int(5) NOT NULL,
  `Beds_other` int(5) NOT NULL,
  `Total_Beds` int(5) NOT NULL,
  `Flat_No` varchar(10) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Pincode` varchar(10) NOT NULL,
  `City` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Collection_Supervisor_A` varchar(50) NOT NULL,
  `Collection_Supervisor_B` varchar(50) NOT NULL,
  `CS_A_Contact` varchar(10) NOT NULL,
  `CS_B_Contact` varchar(10) NOT NULL,
  `Collection_Incharge_A` varchar(50) NOT NULL,
  `CS_A_designation` varchar(50) NOT NULL,
  `Declaration_status` varchar(10) NOT NULL,
  `username_bpl` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `registration_date` varchar(30) NOT NULL,
  `profile_update_date` varchar(30) NOT NULL,
  `username_pcb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hcf_clients`
--

INSERT INTO `hcf_clients` (`id`, `Organization_Name`, `hcf_number`, `Category`, `Ownership`, `ownership_others`, `DSE`, `DSE_date`, `Authorized_Person`, `AP_Designation`, `AP_Contact`, `Beds_ICP`, `Beds_OT`, `Beds_other`, `Total_Beds`, `Flat_No`, `Street`, `Area`, `Pincode`, `City`, `District`, `State`, `Country`, `Collection_Supervisor_A`, `Collection_Supervisor_B`, `CS_A_Contact`, `CS_B_Contact`, `Collection_Incharge_A`, `CS_A_designation`, `Declaration_status`, `username_bpl`, `email_id`, `password`, `registration_date`, `profile_update_date`, `username_pcb`) VALUES
(1, 'Hamidia', 'ALLIN110029DLBH00578', 'Hospital', 'Private', '', '123', '22-12-18', 'Rishabh Awasthi', 'Admin', '8602476656', 5, 1, 4, 10, '1234', '11', 'MINAL', '462023', 'Bhopal', 'Bhopal', 'Madhya Pradesh', 'India', 'Rajesh', 'Ramesh', '777888877', '445484545', 'Ajay', 'Chief ', 'public', 'ABCD', 'admin@gmail.com', '123456789', '22-12-18', '22-12-18', 'Test Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pcb_details`
--

CREATE TABLE `pcb_details` (
  `s.no` int(15) NOT NULL,
  `id` varchar(50) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `authorized_person` varchar(50) DEFAULT NULL,
  `registered_date` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcb_details`
--

INSERT INTO `pcb_details` (`s.no`, `id`, `user_name`, `password`, `authorized_person`, `registered_date`) VALUES
(1, '1', '12345', '12345', 'abc', '01/02/2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bil_client_mw_generate_qrcode`
--
ALTER TABLE `bil_client_mw_generate_qrcode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s.no` (`id`);

--
-- Indexes for table `bil_client_mw_info`
--
ALTER TABLE `bil_client_mw_info`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username_pcb` (`username_pcb`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `bil_client_mw_notify`
--
ALTER TABLE `bil_client_mw_notify`
  ADD PRIMARY KEY (`s.no`),
  ADD UNIQUE KEY `s.no` (`s.no`),
  ADD UNIQUE KEY `username_pcb` (`username_pcb`);

--
-- Indexes for table `bil_client_mw_payment`
--
ALTER TABLE `bil_client_mw_payment`
  ADD PRIMARY KEY (`username_bil`),
  ADD UNIQUE KEY `s.no` (`s.no`),
  ADD UNIQUE KEY `username_pcb` (`username_pcb`);

--
-- Indexes for table `bil_client_mw_report_bil`
--
ALTER TABLE `bil_client_mw_report_bil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s.no` (`id`),
  ADD UNIQUE KEY `username_pcb` (`username_pcb`),
  ADD UNIQUE KEY `s.no_2` (`id`);

--
-- Indexes for table `bil_client_mw_report_fleet`
--
ALTER TABLE `bil_client_mw_report_fleet`
  ADD PRIMARY KEY (`username_bil`),
  ADD UNIQUE KEY `s.no` (`s.no`),
  ADD UNIQUE KEY `username_pcb` (`username_pcb`);

--
-- Indexes for table `bil_client_mw_report_hcf`
--
ALTER TABLE `bil_client_mw_report_hcf`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s.no` (`id`),
  ADD UNIQUE KEY `username_pcb` (`username_pcb`),
  ADD UNIQUE KEY `s.no_2` (`id`);

--
-- Indexes for table `bil_details`
--
ALTER TABLE `bil_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s.no` (`s.no`);

--
-- Indexes for table `pcb_details`
--
ALTER TABLE `pcb_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s.no` (`s.no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bil_client_mw_generate_qrcode`
--
ALTER TABLE `bil_client_mw_generate_qrcode`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bil_client_mw_report_bil`
--
ALTER TABLE `bil_client_mw_report_bil`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bil_client_mw_report_hcf`
--
ALTER TABLE `bil_client_mw_report_hcf`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
