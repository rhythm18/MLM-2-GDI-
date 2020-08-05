-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 09:04 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) DEFAULT NULL,
  `admin_type` tinyint(4) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `login_ip` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `number`, `admin_type`, `email`, `password`, `last_activity`, `login_ip`, `status`) VALUES
(1, 'rhythm', 1234567890, 1, 'rhythm@admin.com', '1234', '2020-06-13 15:51:19', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank_detail`
--

CREATE TABLE `bank_detail` (
  `b_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_holdername` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_no` int(11) DEFAULT NULL,
  `ifsc_code` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_addr` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cheque_img` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `paytm` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bank_detail`
--

INSERT INTO `bank_detail` (`b_id`, `user_id`, `bank_name`, `acc_holdername`, `acc_no`, `ifsc_code`, `branch_addr`, `cheque_img`, `paytm`, `update_date`, `status`) VALUES
(31, 65, 'Kotak', 'Rhythm Arya', 998899, '1234', 'Paschim vihar', '65-LOGO.png', '4594040', '2020-06-14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `daily_income`
--

CREATE TABLE `daily_income` (
  `inc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inc_lvl` int(11) NOT NULL COMMENT '0-cashback income',
  `inc_amt` double NOT NULL,
  `inc_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daily_income`
--

INSERT INTO `daily_income` (`inc_id`, `user_id`, `inc_lvl`, `inc_amt`, `inc_date`, `status`) VALUES
(120, 65, 0, 20, '2020-06-13', 2),
(121, 78, 0, 20, '2020-06-13', 2),
(122, 65, 1, 10, '2020-06-13', 2),
(123, 79, 0, 20, '2020-06-13', 2),
(124, 65, 2, 5, '2020-06-13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gen_income`
--

CREATE TABLE `gen_income` (
  `inc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inc_for` int(11) NOT NULL,
  `inc_lvl` int(11) NOT NULL,
  `inc_amt` double NOT NULL,
  `inc_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gen_income`
--

INSERT INTO `gen_income` (`inc_id`, `user_id`, `inc_for`, `inc_lvl`, `inc_amt`, `inc_date`, `status`) VALUES
(73, 64, 65, 1, 100, '2020-06-13', 2),
(75, 65, 66, 1, 100, '2020-06-13', 2),
(76, 64, 66, 2, 10, '2020-06-13', 2),
(77, 65, 67, 1, 100, '2020-06-13', 2),
(78, 64, 67, 2, 10, '2020-06-13', 2),
(79, 65, 73, 1, 50, '2020-06-13', 2),
(80, 64, 73, 2, 10, '2020-06-13', 2),
(81, 65, 74, 1, 50, '2020-06-13', 2),
(82, 64, 74, 2, 10, '2020-06-13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gen_income_setting`
--

CREATE TABLE `gen_income_setting` (
  `gen_id` int(11) NOT NULL,
  `lvl_number` int(11) NOT NULL,
  `lvl_income` int(11) NOT NULL,
  `update_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gen_income_setting`
--

INSERT INTO `gen_income_setting` (`gen_id`, `lvl_number`, `lvl_income`, `update_date`, `status`) VALUES
(1, 1, 50, '2020-05-31', 1),
(2, 2, 10, '2020-05-31', 1),
(3, 3, 10, '2020-05-31', 1),
(4, 4, 10, '2020-05-31', 1),
(5, 5, 10, '2020-05-31', 1),
(6, 6, 10, '2020-05-31', 1),
(7, 7, 10, '2020-05-31', 1),
(8, 8, 10, '2020-05-31', 1),
(9, 9, 10, '2020-05-31', 1),
(10, 10, 10, '2020-05-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kyc_detail`
--

CREATE TABLE `kyc_detail` (
  `kyc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idpf_doc_id` int(11) DEFAULT NULL,
  `idpf_doc_no` int(11) DEFAULT NULL,
  `idpf_doc_img` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_doc_id` int(11) DEFAULT NULL,
  `addr_doc_no` int(11) DEFAULT NULL,
  `addr_doc_img` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pan_no` int(11) DEFAULT NULL,
  `pan_img` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `kyc_status` tinyint(4) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kyc_detail`
--

INSERT INTO `kyc_detail` (`kyc_id`, `user_id`, `idpf_doc_id`, `idpf_doc_no`, `idpf_doc_img`, `addr_doc_id`, `addr_doc_no`, `addr_doc_img`, `pan_no`, `pan_img`, `update_date`, `kyc_status`) VALUES
(26, 65, 3, 2233344, '65-ID-images.png', 5, 111111, '65-ADDR-3927-200.png', 444, '65-PAN-Screenshot 2019-12-26 at 1.15.53 PM.png', '2020-06-08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `list_doc`
--

CREATE TABLE `list_doc` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `list_doc`
--

INSERT INTO `list_doc` (`doc_id`, `doc_name`, `status`) VALUES
(1, 'aadhar card', 1),
(2, 'voter-id', 1),
(3, 'ration card', 1),
(4, 'license', 1),
(5, 'passport', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payout`
--

CREATE TABLE `payout` (
  `pid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `closing_date` date DEFAULT NULL,
  `tds` double DEFAULT NULL,
  `admin_charge` double DEFAULT NULL,
  `net_amt` double NOT NULL,
  `pay_method` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_detail` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `payout_date` date DEFAULT NULL,
  `prev_bal` double NOT NULL DEFAULT '0',
  `cur_bal` double NOT NULL DEFAULT '0',
  `pay_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-credit 2-debit',
  `pay_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0- pending, 1- Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payout`
--

INSERT INTO `payout` (`pid`, `user_id`, `amount`, `closing_date`, `tds`, `admin_charge`, `net_amt`, `pay_method`, `pay_detail`, `payout_date`, `prev_bal`, `cur_bal`, `pay_type`, `pay_status`) VALUES
(53, 65, 335, '2020-06-13', 16.75, 33.5, 284.75, NULL, NULL, NULL, 29.75, 284.75, 1, 0),
(54, 78, 20, '2020-06-13', 1, 2, 17, NULL, NULL, NULL, 0, 17, 1, 0),
(55, 79, 20, '2020-06-13', 1, 2, 17, NULL, NULL, NULL, 0, 17, 1, 0),
(56, 64, 140, '2020-06-13', 7, 14, 119, NULL, NULL, NULL, 0, 119, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pins`
--

CREATE TABLE `pins` (
  `pin_id` int(11) NOT NULL,
  `pin_number` double NOT NULL,
  `gen_date` date NOT NULL,
  `pin_amt` double NOT NULL DEFAULT '1000',
  `assign_to` int(11) NOT NULL,
  `used_by` int(11) DEFAULT NULL,
  `used_date` date DEFAULT NULL,
  `pin_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pins`
--

INSERT INTO `pins` (`pin_id`, `pin_number`, `gen_date`, `pin_amt`, `assign_to`, `used_by`, `used_date`, `pin_status`) VALUES
(18, 241326814282, '2020-06-11', 1000, 65, 1069, '2020-06-11', 1),
(19, 861959773976, '2020-06-11', 1000, 65, 67, '2020-06-12', 1),
(20, 313678524234, '2020-06-11', 1000, 65, NULL, NULL, 0),
(21, 446939276241, '2020-06-11', 1000, 65, NULL, NULL, 0),
(22, 488557592770, '2020-06-11', 1000, 65, NULL, NULL, 0),
(23, 842055803118, '2020-06-11', 1000, 65, NULL, NULL, 0),
(24, 122335200599, '2020-06-11', 1000, 65, NULL, NULL, 0),
(25, 268475227410, '2020-06-11', 1000, 65, NULL, NULL, 0),
(26, 778513261812, '2020-06-11', 1000, 65, NULL, NULL, 0),
(27, 628207438183, '2020-06-11', 1000, 65, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `joining_fee` double NOT NULL DEFAULT '1000',
  `min_payout` int(11) NOT NULL DEFAULT '500',
  `tds` double NOT NULL DEFAULT '5',
  `tds_no_pan` double NOT NULL DEFAULT '20',
  `admin_charge` double NOT NULL DEFAULT '10',
  `booster_days` int(4) NOT NULL DEFAULT '50',
  `booster_income` double NOT NULL DEFAULT '100',
  `dir_req_b` int(11) NOT NULL,
  `super_booster_income` double NOT NULL,
  `super_booster_days` int(11) NOT NULL,
  `dir_req_sb` int(11) NOT NULL,
  `booster_max_days` int(11) NOT NULL,
  `dir_req_cb` int(11) NOT NULL DEFAULT '4',
  `cash_back_inc` double NOT NULL DEFAULT '2',
  `cash_back_days` int(11) NOT NULL DEFAULT '100',
  `rank_income` tinyint(4) NOT NULL DEFAULT '1',
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `joining_fee`, `min_payout`, `tds`, `tds_no_pan`, `admin_charge`, `booster_days`, `booster_income`, `dir_req_b`, `super_booster_income`, `super_booster_days`, `dir_req_sb`, `booster_max_days`, `dir_req_cb`, `cash_back_inc`, `cash_back_days`, `rank_income`, `update_date`) VALUES
(1, 1000, 500, 5, 20, 10, 50, 100, 0, 0, 0, 0, 0, 4, 2, 100, 1, '2020-06-02 05:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `singleleg_income_setting`
--

CREATE TABLE `singleleg_income_setting` (
  `lvl_id` int(11) NOT NULL,
  `lvl_number` tinyint(4) NOT NULL,
  `member_count` int(11) NOT NULL DEFAULT '0',
  `lvl_income` int(11) NOT NULL DEFAULT '0',
  `dir_req` int(11) NOT NULL DEFAULT '0',
  `sponsor_team` int(11) NOT NULL DEFAULT '0',
  `days` int(11) NOT NULL DEFAULT '100',
  `update_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `singleleg_income_setting`
--

INSERT INTO `singleleg_income_setting` (`lvl_id`, `lvl_number`, `member_count`, `lvl_income`, `dir_req`, `sponsor_team`, `days`, `update_date`, `status`) VALUES
(2, 1, 1, 50, 4, 0, 100, '2020-05-29', 1),
(3, 2, 5, 25, 8, 0, 100, '2020-05-29', 1),
(4, 3, 10, 20, 12, 5, 100, '2020-06-09', 1),
(5, 4, 15, 15, 16, 150, 100, '2020-06-09', 1),
(6, 5, 20, 10, 20, 350, 100, '2020-06-09', 1),
(7, 6, 20, 5, 24, 1000, 100, '2020-06-09', 1),
(8, 7, 30, 4, 28, 3000, 100, '2020-06-09', 1),
(9, 8, 35, 3, 32, 6000, 100, '2020-06-09', 1),
(10, 9, 40, 2, 36, 10000, 100, '2020-06-09', 1),
(11, 10, 50, 1, 40, 15000, 100, '2020-06-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sponsor_id` int(11) DEFAULT NULL,
  `spill_id` int(11) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` double NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `join_date` date NOT NULL,
  `activation_date` date DEFAULT NULL,
  `booster` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0- no booster, 1- booster, 2-super booster',
  `pay_status` tinyint(4) NOT NULL DEFAULT '0',
  `prd_status` tinyint(4) NOT NULL DEFAULT '0',
  `last_activity` datetime DEFAULT NULL,
  `login_ip` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `member_id`, `name`, `sponsor_id`, `spill_id`, `email`, `mobile`, `password`, `join_date`, `activation_date`, `booster`, `pay_status`, `prd_status`, `last_activity`, `login_ip`, `status`) VALUES
(64, 100, 'company', 0, 0, 'company@company.in', 123456789, '1234', '2020-06-08', NULL, 0, 1, 0, '2020-06-08 13:06:20', '::1', 1),
(65, 322933, 'Rhythm', 64, 64, 'rhythm.8@live.com', 8178591191, '1234', '2020-06-08', '2020-06-08', 0, 1, 0, '2020-06-14 13:44:00', '::1', 1),
(66, 1066, 'rhythm1', 65, 65, 'a@', 66655544, '1234', '2020-06-09', '2020-06-11', 0, 1, 0, '2020-06-11 15:35:06', '::1', 1),
(67, 1067, 'rhythm2', 65, 66, 'b@', 66655544455, '1234', '2020-06-09', '2020-06-12', 0, 1, 0, '2020-06-11 15:27:42', '::1', 1),
(68, 1068, 'rhythm3', 66, 67, 'c@', 66655547, '1234', '2020-06-09', NULL, 0, 1, 0, NULL, NULL, 1),
(69, 1069, 'rhythm4', 66, 68, 'd@', 3202, '1234', '2020-06-09', NULL, 0, 1, 0, NULL, NULL, 1),
(70, 1070, 'rhythm5', 67, 69, 'e@', 454320, '1234', '2020-06-09', NULL, 0, 1, 0, NULL, NULL, 1),
(71, 1071, 'rhythm6', 67, 70, 'f@', 5430, '1234', '2020-06-09', NULL, 0, 1, 0, NULL, NULL, 1),
(72, 1081, 'rhythm7', 71, 71, 'iuytrew', 987654321, '1234', '2020-06-09', NULL, 0, 1, 0, NULL, NULL, 1),
(73, 1072, 'rhythm9', 65, 72, 'g@', 2321, '1234', '2020-06-09', '2020-06-12', 0, 1, 0, NULL, NULL, 1),
(74, 1072, 'rhythm10', 65, 73, 'h@', 2322, '1234', '2020-06-09', '2020-06-12', 0, 1, 0, '2020-06-11 15:28:27', '::1', 1),
(75, 1090, 'rhythm9', 65, 74, 'i@', 2323, '1234', '2020-06-09', NULL, 0, 1, 0, '2020-06-11 15:28:07', '::1', 1),
(76, 1091, 'rhythm9', 65, 75, 'j@', 2324, '1234', '2020-06-09', NULL, 0, 1, 0, NULL, NULL, 1),
(77, 10742, 'rhythm9', 65, 76, 'k@', 2325, '1234', '2020-06-09', NULL, 0, 1, 0, NULL, NULL, 1),
(78, 3333, 'manan', 65, 74, 'jhgfdsa', 98765432, '1246', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(79, NULL, 'manan1', 78, 74, 'jhgfdsa', 98765432, '1246', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(80, NULL, 'manan2', 78, 74, 'jhgfdsa', 98765432, '1246', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(81, NULL, 'manan3', 78, 74, 'jhgfdsa', 98765432, '1246', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(82, NULL, 'manan4', 78, 74, 'jhgfdsa', 98765432, '1246', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(83, 7654, 'mannat', 65, 7654, '87654uytre', 5432, '76543', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(84, 7654, 'mannat', 65, 7654, '87654uytre', 5432, '76543', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(85, 7654, 'mannat1', 65, 7654, '87654uytre', 5432, '76543', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(86, 7654, 'mannat2', 65, 7654, '87654uytre', 5432, '76543', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(87, 7654, 'mannat3', 65, 7654, '87654uytre', 5432, '76543', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(88, 7654, 'mannat44', 79, 7654, '87654uytre', 5432, '76543', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(89, 7654, 'mannat424', 79, 7654, '87654uytre', 5432, '76543', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(90, 7654, 'mannat4234', 79, 7654, '87654uytre', 5432, '76543', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1),
(91, 7654, 'mannat44532', 79, 7654, '87654uytre', 5432, '76543', '2020-06-12', NULL, 0, 1, 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `acc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `income_type` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `income_for` int(11) NOT NULL,
  `income_amt` double NOT NULL DEFAULT '0',
  `income_date` date NOT NULL,
  `prev_bal` double NOT NULL,
  `cur_bal` double NOT NULL DEFAULT '0',
  `update_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `pay_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_amt` double NOT NULL,
  `pay_method` tinyint(4) NOT NULL,
  `pay_detail` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pay_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`pay_id`, `user_id`, `pay_amt`, `pay_method`, `pay_detail`, `pay_date`, `status`) VALUES
(73, 65, 1000, 2, '1232123', '2020-06-08', 1),
(75, 66, 1000, 1, 'joining fee', '2020-06-11', 1),
(76, 1069, 1000, 4, 'pin', '2020-06-11', 1),
(77, 67, 1000, 4, 'pin', '2020-06-12', 1),
(78, 73, 1000, 2, 'cheque', '2020-06-12', 1),
(79, 74, 1000, 3, 'card', '2020-06-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `prof_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` double DEFAULT NULL,
  `company_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_addr` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`prof_id`, `user_id`, `dob`, `city`, `state`, `address`, `pincode`, `company_name`, `office_addr`, `job_type`, `update_date`, `status`) VALUES
(48, 65, '1999-10-13', 'Delhi', 'New Delhi', 'Paschim Vihar', 110063, 'Be Technical', 'Punjabi Bagh', 'Private', '2020-06-08', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bank_detail`
--
ALTER TABLE `bank_detail`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `daily_income`
--
ALTER TABLE `daily_income`
  ADD PRIMARY KEY (`inc_id`);

--
-- Indexes for table `gen_income`
--
ALTER TABLE `gen_income`
  ADD PRIMARY KEY (`inc_id`);

--
-- Indexes for table `gen_income_setting`
--
ALTER TABLE `gen_income_setting`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indexes for table `kyc_detail`
--
ALTER TABLE `kyc_detail`
  ADD PRIMARY KEY (`kyc_id`);

--
-- Indexes for table `list_doc`
--
ALTER TABLE `list_doc`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `payout`
--
ALTER TABLE `payout`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `pins`
--
ALTER TABLE `pins`
  ADD PRIMARY KEY (`pin_id`),
  ADD UNIQUE KEY `pin_number` (`pin_number`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singleleg_income_setting`
--
ALTER TABLE `singleleg_income_setting`
  ADD PRIMARY KEY (`lvl_id`),
  ADD UNIQUE KEY `lvl_number` (`lvl_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`prof_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_detail`
--
ALTER TABLE `bank_detail`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `daily_income`
--
ALTER TABLE `daily_income`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `gen_income`
--
ALTER TABLE `gen_income`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `gen_income_setting`
--
ALTER TABLE `gen_income_setting`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kyc_detail`
--
ALTER TABLE `kyc_detail`
  MODIFY `kyc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `list_doc`
--
ALTER TABLE `list_doc`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payout`
--
ALTER TABLE `payout`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `pins`
--
ALTER TABLE `pins`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `singleleg_income_setting`
--
ALTER TABLE `singleleg_income_setting`
  MODIFY `lvl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `prof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
