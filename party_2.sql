-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 10:33 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `party_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `a_name` varchar(55) NOT NULL,
  `a_pass` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `a_name`, `a_pass`) VALUES
(1, 'kanchonkumar', '1234Abc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apply`
--

CREATE TABLE `tbl_apply` (
  `id` int(11) NOT NULL,
  `job_id` int(25) NOT NULL,
  `apply_by` varchar(55) NOT NULL,
  `a_description` text NOT NULL,
  `a_status` varchar(55) NOT NULL,
  `post_by` varchar(55) NOT NULL,
  `apply_id` int(55) NOT NULL,
  `a_date` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_apply`
--

INSERT INTO `tbl_apply` (`id`, `job_id`, `apply_by`, `a_description`, `a_status`, `post_by`, `apply_id`, `a_date`) VALUES
(1, 169377871, 'user2', 'Hi i am interest to work with u Hi i am interest to work with u Hi i am interest to work with u Hi i am interest to work with u Hi i am interest to work with u Hi i am interest to work with u Hi i am interest to work with u Hi i am interest to work with u Hi i am interest to work with u Hi i am interest to work with u Hi i am interest to work with u Hi i am interest to work with u Hi i am interest', 'Reject', 'user1', 822524294, '13-09-2021'),
(2, 2048922869, 'user2', 'Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hell', 'Submitted', 'user3', 1742810978, '13-09-2021'),
(3, 1662150977, 'user2', 'Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hello i am Hell', 'Submitted', 'user3', 1135332773, '13-09-2021'),
(4, 2120291120, 'user2', 'Hi i am interest to work with you. Hi i am interest to work with you. Hi i am interest to work with you. Hi i am interest to work with you. Hi i am interest to work with you. Hi i am interest to work with you. Hi i am interest to work with you. Hi i am interest to work with you. Hi i am interest to work with you. Hi i am interest to work with you. Hi i am interest to work with you. Hi i am interes', 'Hired', 'user1', 1114875417, '13-09-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id` int(11) NOT NULL,
  `c_message` text NOT NULL,
  `sent_by` varchar(55) NOT NULL,
  `received_by` varchar(55) NOT NULL,
  `c_date_time` varchar(55) NOT NULL,
  `c_id` int(11) NOT NULL,
  `c_seen_status` varchar(55) NOT NULL DEFAULT 'unseen',
  `g_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `c_message`, `sent_by`, `received_by`, `c_date_time`, `c_id`, `c_seen_status`, `g_name`) VALUES
(1, 'Hi Thomas', 'user1', 'user8', '12-09-2021 05:47:15 AM', 975749289, 'unseen', 'user1_user8'),
(2, 'Hi Sarah', 'user1', 'user2', '12-09-2021 05:47:50 AM', 1841934456, 'unseen', 'user1_user2'),
(3, 'Hi Jerry', 'user1', 'user4', '12-09-2021 05:48:27 AM', 1422857143, 'unseen', 'user1_user4'),
(4, 'Hi Sonia', 'user1', 'user6', '12-09-2021 05:48:46 AM', 658771364, 'unseen', 'user1_user6'),
(5, 'Hi Jorad', 'user1', 'user10', '12-09-2021 05:49:07 AM', 1207637338, 'unseen', 'user1_user10'),
(6, 'Hi Alex', 'user2', 'user1', '12-09-2021 06:01:06 AM', 1390250256, 'unseen', 'user1_user2'),
(7, 'How are you', 'user1', 'user2', '12-09-2021 06:01:29 AM', 771518787, 'unseen', 'user1_user2'),
(8, 'Im fine you', 'user2', 'user1', '12-09-2021 06:01:38 AM', 557752274, 'unseen', 'user1_user2'),
(9, 'hi', 'user1', 'user10', '13-09-2021 01:30:01 PM', 2042738946, 'unseen', 'user1_user10'),
(10, 'hi', 'user2', 'user1', '13-09-2021 01:36:32 PM', 141454718, 'unseen', 'user1_user2'),
(11, 'How are you', 'user2', 'user1', '13-09-2021 02:05:47 PM', 1471819766, 'unseen', 'user1_user2'),
(12, 'im', 'user1', 'user2', '13-09-2021 02:06:52 PM', 1025698497, 'unseen', 'user1_user2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collect_email`
--

CREATE TABLE `tbl_collect_email` (
  `id` int(11) NOT NULL,
  `c_email` varchar(55) NOT NULL,
  `c_date_time` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copy_rights`
--

CREATE TABLE `tbl_copy_rights` (
  `id` int(11) NOT NULL,
  `copy_text_name` varchar(55) NOT NULL,
  `copy_date_time` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employe`
--

CREATE TABLE `tbl_employe` (
  `id` int(11) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `u_name` varchar(15) NOT NULL,
  `u_location` varchar(55) NOT NULL,
  `u_img` varchar(55) NOT NULL,
  `u_album_one` varchar(55) NOT NULL,
  `u_album_two` varchar(55) NOT NULL,
  `u_album_three` varchar(55) NOT NULL,
  `u_nationality` varchar(55) NOT NULL,
  `u_age` varchar(55) NOT NULL,
  `u_gender` varchar(55) NOT NULL,
  `u_description` text NOT NULL,
  `join_date` varchar(25) NOT NULL,
  `last_activity` varchar(55) NOT NULL,
  `u_id` int(55) NOT NULL,
  `u_type` varchar(11) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employe`
--

INSERT INTO `tbl_employe` (`id`, `f_name`, `l_name`, `u_name`, `u_location`, `u_img`, `u_album_one`, `u_album_two`, `u_album_three`, `u_nationality`, `u_age`, `u_gender`, `u_description`, `join_date`, `last_activity`, `u_id`, `u_type`) VALUES
(1, 'Mr Alex', 'John', 'user1', 'Toldedo', '1629432961_1811958745_thump.webp', '1629432961_1299883628_thump.webp', '1629432961_57564027_thump.webp', '1629432962_1092616538_thump.webp', 'Irish', '22', 'male', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit', '11-08-2021', '21-08-19 06:51:39 AM', 644156549, 'Old'),
(2, 'John', 'Wick', 'user3', 'Danao', '1629350720_86605970_thump.webp', '1629350748_1161477225_thump.webp', '1629350749_1332726012_thump.webp', '1629350749_1796040017_thump.webp', 'American', '22', 'male', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', '11-08-2021', '21-08-19 07:23:24 AM', 1609586459, 'Old'),
(3, 'Leonel', 'Martin', 'user5', 'Naga', '1629350996_2038812722_thump.webp', '1629351021_2127475467_thump.webp', '1629351021_1471180650_thump.webp', '1629351021_1143839552_thump.webp', 'Argentian', '22', 'male', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', '11-08-2021', '21-08-19 07:28:42 AM', 1051362060, 'new'),
(4, 'Anie', 'Martin', 'user7', 'San Fernando', '1629351247_1203076936_thump.webp', '1629351264_153064502_thump.webp', '1629351264_2089620371_thump.webp', '1629351264_1861931731_thump.webp', 'Irish', '22', 'female', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', '11-08-2021', '21-08-19 07:33:09 AM', 1052721397, 'new'),
(5, 'Carry', 'William', 'user9', 'Carmen', '1629351486_572102325_thump.webp', '1629351560_1197230419_thump.webp', '1629351560_604519946_thump.webp', '1629351560_1124351832_thump.webp', 'Canadian', '22', 'female', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', '11-08-2021', '21-08-19 07:36:28 AM', 1179836211, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_post`
--

CREATE TABLE `tbl_job_post` (
  `id` int(11) NOT NULL,
  `j_title` varchar(65) NOT NULL,
  `j_location` varchar(25) NOT NULL,
  `j_type` varchar(55) NOT NULL,
  `j_booking_date` varchar(55) NOT NULL,
  `j_booking_time` varchar(55) NOT NULL,
  `j_payment` varchar(55) NOT NULL,
  `j_work_hour` varchar(55) NOT NULL,
  `j_description` text NOT NULL,
  `u_name` varchar(55) NOT NULL,
  `j_id` int(55) NOT NULL,
  `j_post_date` varchar(55) NOT NULL,
  `j_status` varchar(55) NOT NULL DEFAULT 'Unapproved',
  `j_post_status` varchar(55) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_job_post`
--

INSERT INTO `tbl_job_post` (`id`, `j_title`, `j_location`, `j_type`, `j_booking_date`, `j_booking_time`, `j_payment`, `j_work_hour`, `j_description`, `u_name`, `j_id`, `j_post_date`, `j_status`, `j_post_status`) VALUES
(1, 'Looking entertainer for wedding party', 'San Fernando', 'Male Entertainer', '27-08-2021', '10-10-AM', 'â‚±-1500', '2', 'Looking entertainer for wedding partyLooking entertainer for wedding partyLooking entertainer for wedding partyLooking entertainer for wedding partyLooking entertainer for wedding partyLooking entertainer for wedding partyLooking entertainer for wedding partyLooking entertainer for wedding partyLooking entertainer for wedding partyLooking entertainer for wedding partyLooking entertainer for weddin', 'user1', 169377871, '21-08-2021 07:15:25 PM', 'Unapproved', 'Old'),
(2, 'Looking waiter for wedding party', 'Minglanilla', 'Male Promotions', '23-08-2021', '08-30-PM', 'â‚±-2000', '3', 'Looking waiter for wedding partyLooking waiter for wedding partyLooking waiter for wedding partyLooking waiter for wedding partyLooking waiter for wedding partyLooking waiter for wedding partyLooking waiter for wedding partyLooking waiter for wedding partyLooking waiter for wedding partyLooking waiter for wedding partyLooking waiter for wedding partyLooking waiter for wedding partyLooking waiter f', 'user1', 116166073, '21-08-2021 07:18:49 PM', 'Unapproved', 'Old'),
(3, 'Looking waiter for wedding party', 'Minglanilla', 'Female Entertainer', '28-08-2021', '12-30-AM', 'â‚±-2000', '2', 'Hello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i am', 'user3', 2048922869, '24-08-2021 01:53:45 PM', 'Unapproved', 'Old'),
(4, 'Looking entertainer for wedding party', 'Minglanilla', 'Female Entertainer', '28-08-2021', '12-30-AM', 'â‚±-2000', '2', 'Hello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i amHello i am', 'user3', 1662150977, '24-08-2021 01:54:02 PM', 'Unapproved', 'Old'),
(5, 'hitdhdhdhdff dhdhfd', 'Toldedo', 'Male Entertainer', '20-09-2021', '12-30-AM', 'â‚±-5000', '4', 'lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem lotrem ', 'user1', 2120291120, '11-09-2021 05:46:43 PM', 'Unapproved', 'Old');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_seeker`
--

CREATE TABLE `tbl_job_seeker` (
  `id` int(55) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `u_name` varchar(25) NOT NULL,
  `u_location` varchar(25) NOT NULL,
  `u_nationality` varchar(25) NOT NULL,
  `u_img` varchar(100) NOT NULL,
  `u_album_one` varchar(55) NOT NULL,
  `u_album_two` varchar(55) NOT NULL,
  `u_album_three` varchar(55) NOT NULL,
  `u_skill` varchar(95) NOT NULL,
  `u_age` varchar(55) NOT NULL,
  `u_gender` varchar(55) NOT NULL,
  `u_description` text NOT NULL,
  `u_id` varchar(55) NOT NULL,
  `join_date` varchar(55) NOT NULL,
  `last_activity` varchar(55) NOT NULL,
  `u_type` varchar(11) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_job_seeker`
--

INSERT INTO `tbl_job_seeker` (`id`, `f_name`, `l_name`, `u_name`, `u_location`, `u_nationality`, `u_img`, `u_album_one`, `u_album_two`, `u_album_three`, `u_skill`, `u_age`, `u_gender`, `u_description`, `u_id`, `join_date`, `last_activity`, `u_type`) VALUES
(1, 'Sarah', 'William', 'user2', 'Mandaue City', 'Canadian', '1629350193_1335171624_thump.webp', '1629350543_1166185894_thump.webp', '1629350543_725345425_thump.webp', '1629350543_266860667_thump.webp', 'Promotions - Level 4_Bartender - Level 3_Entertainer/Co Host - Level 4_', '23', 'female', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', '839409314', '11-08-2021', '21-08-19 07:07:03 AM', 'Old'),
(2, 'Jerry ', 'Jeo', 'user4', 'Liloan', 'German', '1629350836_854277772_thump.webp', '1629350890_309335093_thump.webp', '1629350890_32706404_thump.webp', '1629350890_806334685_thump.webp', 'Entertainer/Co-Host - Level 3_', '22', 'female', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', '192620494', '11-08-2021', '21-08-19 07:26:05 AM', 'Old'),
(3, 'Sonia', 'Fernandez', 'user6', 'Cordova', 'American', '1629351143_1958407018_thump.webp', '1629351167_382811836_thump.webp', '1629351167_946517491_thump.webp', '1629351167_743287706_thump.webp', 'Promotions - Level 4_Bartender - Level 2_', '22', 'female', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', '648457451', '11-08-2021', '21-08-19 07:30:40 AM', 'Old'),
(4, 'Thomas', 'Alvin', 'user8', 'Talisay', 'American', '1629351343_137526368_thump.webp', '1629351364_685279979_thump.webp', '1629351364_1088155034_thump.webp', '1629351365_831654534_thump.webp', 'Waitstaff - Level 3_Entertainer/Co-Host - Level 4_', '22', 'male', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', '2120633137', '11-08-2021', '21-08-19 07:34:43 AM', 'new'),
(5, 'Jorad', 'Thompson', 'user10', 'CarCar', 'German', '1629351644_1341149721_thump.webp', '1629351660_1776549616_thump.webp', '1629351660_1834999223_thump.webp', '1629351661_1496554973_thump.webp', 'Bartender - Level 1_Entertainer/Co-Host - Level 1_', '22', 'male', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', '805619751', '11-08-2021', '21-08-19 07:40:13 AM', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer`
--

CREATE TABLE `tbl_offer` (
  `id` int(11) NOT NULL,
  `j_location` varchar(65) NOT NULL,
  `d_code` varchar(25) NOT NULL,
  `j_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `post_by` varchar(25) NOT NULL,
  `apply_by` varchar(25) NOT NULL,
  `a_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_offer`
--

INSERT INTO `tbl_offer` (`id`, `j_location`, `d_code`, `j_id`, `a_id`, `post_by`, `apply_by`, `a_status`) VALUES
(1, 'Crimson Hotel', 'NightLife', 2120291120, 1114875417, 'user1', 'user2', 'Hired');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `r_rating_text` text NOT NULL,
  `sent_by` varchar(55) NOT NULL,
  `received_by` varchar(55) NOT NULL,
  `r_rating` int(11) NOT NULL,
  `r_id` int(55) NOT NULL,
  `r_date` varchar(55) NOT NULL,
  `j_id` int(55) NOT NULL,
  `r_publish_date` varchar(55) NOT NULL,
  `a_id` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `r_rating_text`, `sent_by`, `received_by`, `r_rating`, `r_id`, `r_date`, `j_id`, `r_publish_date`, `a_id`) VALUES
(1, 'Very good i like its', 'user1', 'user2', 5, 1788139966, '13-09-2021', 2120291120, '2021-09-30', 1114875417),
(2, 'Very Good i like its', 'user2', 'user1', 5, 630083573, '13-09-2021', 2120291120, '2021-09-30', 1114875417);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sign`
--

CREATE TABLE `tbl_sign` (
  `id` int(11) NOT NULL,
  `u_email` varchar(55) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `u_pass` varchar(20) NOT NULL,
  `b_date` varchar(55) NOT NULL,
  `u_gender` varchar(11) NOT NULL,
  `u_type` varchar(15) NOT NULL,
  `block_status` varchar(10) NOT NULL DEFAULT 'unblock',
  `active_status` varchar(55) NOT NULL DEFAULT 'active',
  `last_activity` varchar(55) NOT NULL,
  `join_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sign`
--

INSERT INTO `tbl_sign` (`id`, `u_email`, `u_name`, `u_pass`, `b_date`, `u_gender`, `u_type`, `block_status`, `active_status`, `last_activity`, `join_date`) VALUES
(1, 'user1@gmail.com', 'user1', '12345a', '10-06-1999', 'male', 'employer', 'unblock', 'active', '22-01-25 10:31:36 AM', '11-08-2021'),
(2, 'user2@gmail.com', 'user2', '12345a', '10-02-1998', 'female', 'jobseeker', 'unblock', 'Deactive', '21-09-13 01:32:30 PM', '11-08-2021'),
(3, 'user3@gmail.com', 'user3', '12345a', '10-06-1999', 'male', 'employer', 'unblock', 'Deactive', '21-09-03 07:24:44 AM', '11-08-2021'),
(4, 'user4@gmail.com', 'user4', '12345a', '10-06-1999', 'female', 'jobseeker', 'unblock', 'Deactive', '21-08-25 01:38:11 PM', '11-08-2021'),
(5, 'user5@gmail.com', 'user5', '12345a', '10-06-1999', 'male', 'employer', 'unblock', 'Deactive', '2021-08-19 07:30:24 AM', '11-08-2021'),
(6, 'user6@gmail.com', 'user6', '12345a', '10-06-1999', 'female', 'jobseeker', 'unblock', 'Deactive', '2021-08-26 05:29:27 PM', '11-08-2021'),
(7, 'user7@gmail.com', 'user7', '12345a', '10-06-1999', 'female', 'employer', 'unblock', 'Deactive', '2021-08-19 07:34:27 AM', '11-08-2021'),
(8, 'user8@gmail.com', 'user8', '12345a', '10-06-1999', 'male', 'jobseeker', 'unblock', 'Deactive', '2021-08-19 07:36:12 AM', '11-08-2021'),
(9, 'user9@gmail.com', 'user9', '12345a', '10-06-1999', 'female', 'employer', 'unblock', 'Deactive', '2021-08-19 07:39:23 AM', '11-08-2021'),
(10, 'user10@gmail.com', 'user10', '12345a', '10-06-1999', 'male', 'jobseeker', 'unblock', 'Deactive', '21-08-19 07:40:13 AM', '11-08-2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_apply`
--
ALTER TABLE `tbl_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_collect_email`
--
ALTER TABLE `tbl_collect_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_copy_rights`
--
ALTER TABLE `tbl_copy_rights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employe`
--
ALTER TABLE `tbl_employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_post`
--
ALTER TABLE `tbl_job_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_seeker`
--
ALTER TABLE `tbl_job_seeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sign`
--
ALTER TABLE `tbl_sign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_apply`
--
ALTER TABLE `tbl_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_collect_email`
--
ALTER TABLE `tbl_collect_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_copy_rights`
--
ALTER TABLE `tbl_copy_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employe`
--
ALTER TABLE `tbl_employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_job_post`
--
ALTER TABLE `tbl_job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_job_seeker`
--
ALTER TABLE `tbl_job_seeker`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sign`
--
ALTER TABLE `tbl_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
