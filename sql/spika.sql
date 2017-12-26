-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2017 at 03:32 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spika`
--

-- --------------------------------------------------------

--
-- Table structure for table `lnk_student_to_applied_colleges`
--

CREATE TABLE `lnk_student_to_applied_colleges` (
  `stac_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `intake_year` year(4) NOT NULL,
  `round_id` int(11) NOT NULL,
  `app_status_id` int(11) NOT NULL,
  `intv_status_id` int(11) NOT NULL,
  `applied_program_id` int(11) NOT NULL,
  `admit_status_id` int(11) NOT NULL,
  `is_scholarship_awarded` enum('1','0') NOT NULL DEFAULT '0',
  `scholarship_amount` float NOT NULL,
  `is_joined` enum('1','0') NOT NULL DEFAULT '0',
  `joining_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lnk_student_to_packages`
--

CREATE TABLE `lnk_student_to_packages` (
  `stp_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `signup_date` datetime NOT NULL,
  `consultant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lnk_user_to_permission`
--

CREATE TABLE `lnk_user_to_permission` (
  `utp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `edit` enum('true','false') NOT NULL DEFAULT 'false',
  `view` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnk_user_to_permission`
--

INSERT INTO `lnk_user_to_permission` (`utp_id`, `user_id`, `permission_id`, `edit`, `view`) VALUES
(29, 5, 1, 'false', 'true'),
(30, 5, 2, 'false', 'true'),
(31, 5, 3, 'true', 'false'),
(32, 5, 4, 'true', 'false'),
(33, 5, 6, 'false', 'true'),
(34, 5, 8, 'true', 'false'),
(35, 5, 9, 'true', 'false'),
(36, 5, 10, 'true', 'false'),
(37, 5, 15, 'true', 'false'),
(38, 5, 16, 'true', 'false'),
(39, 5, 17, 'true', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `ref_admit_status`
--

CREATE TABLE `ref_admit_status` (
  `admit_status_id` int(11) NOT NULL,
  `admit_status` varchar(128) NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_application_rounds`
--

CREATE TABLE `ref_application_rounds` (
  `round_id` int(11) NOT NULL,
  `round_name` varchar(128) NOT NULL,
  `added_by` int(11) NOT NULL,
  `last_updated` datetime NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_application_rounds`
--

INSERT INTO `ref_application_rounds` (`round_id`, `round_name`, `added_by`, `last_updated`, `is_active`) VALUES
(1, 'round1', 1, '2017-11-13 01:28:36', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ref_application_status_id`
--

CREATE TABLE `ref_application_status_id` (
  `app_status_id` int(11) NOT NULL,
  `app_status` varchar(128) NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_cities`
--

CREATE TABLE `ref_cities` (
  `city_id` int(11) NOT NULL,
  `city` varchar(128) NOT NULL,
  `country_id` int(11) NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_colleges`
--

CREATE TABLE `ref_colleges` (
  `college_id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `university_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `last_updated` datetime NOT NULL,
  `college_type_id` int(11) NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_colleges`
--

INSERT INTO `ref_colleges` (`college_id`, `college_name`, `university_id`, `added_by`, `last_updated`, `college_type_id`, `is_active`) VALUES
(1, 'first college', 4, 1, '2017-11-13 11:33:25', 2, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ref_college_types`
--

CREATE TABLE `ref_college_types` (
  `college_type_id` int(11) NOT NULL,
  `short_desc` varchar(50) NOT NULL,
  `college_type_name` varchar(128) NOT NULL,
  `is_active` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_college_types`
--

INSERT INTO `ref_college_types` (`college_type_id`, `short_desc`, `college_type_name`, `is_active`) VALUES
(1, 'UG', 'Under Graduate', 'true'),
(2, 'PG', 'Post Graduate', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ref_countries`
--

CREATE TABLE `ref_countries` (
  `country_id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `is_active` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_countries`
--

INSERT INTO `ref_countries` (`country_id`, `country_code`, `country_name`, `is_active`) VALUES
(1, 'AF', 'Afghanistan', 'true'),
(2, 'AL', 'Albania', 'true'),
(3, 'DZ', 'Algeria', 'true'),
(4, 'DS', 'American Samoa', 'true'),
(5, 'AD', 'Andorra', 'true'),
(6, 'AO', 'Angola', 'true'),
(7, 'AI', 'Anguilla', 'true'),
(8, 'AQ', 'Antarctica', 'true'),
(9, 'AG', 'Antigua and Barbuda', 'true'),
(10, 'AR', 'Argentina', 'true'),
(11, 'AM', 'Armenia', 'true'),
(12, 'AW', 'Aruba', 'true'),
(13, 'AU', 'Australia', 'true'),
(14, 'AT', 'Austria', 'true'),
(15, 'AZ', 'Azerbaijan', 'true'),
(16, 'BS', 'Bahamas', 'true'),
(17, 'BH', 'Bahrain', 'true'),
(18, 'BD', 'Bangladesh', 'true'),
(19, 'BB', 'Barbados', 'true'),
(20, 'BY', 'Belarus', 'true'),
(21, 'BE', 'Belgium', 'true'),
(22, 'BZ', 'Belize', 'true'),
(23, 'BJ', 'Benin', 'true'),
(24, 'BM', 'Bermuda', 'true'),
(25, 'BT', 'Bhutan', 'true'),
(26, 'BO', 'Bolivia', 'true'),
(27, 'BA', 'Bosnia and Herzegovina', 'true'),
(28, 'BW', 'Botswana', 'true'),
(29, 'BV', 'Bouvet Island', 'true'),
(30, 'BR', 'Brazil', 'true'),
(31, 'IO', 'British Indian Ocean Territory', 'true'),
(32, 'BN', 'Brunei Darussalam', 'true'),
(33, 'BG', 'Bulgaria', 'true'),
(34, 'BF', 'Burkina Faso', 'true'),
(35, 'BI', 'Burundi', 'true'),
(36, 'KH', 'Cambodia', 'true'),
(37, 'CM', 'Cameroon', 'true'),
(38, 'CA', 'Canada', 'true'),
(39, 'CV', 'Cape Verde', 'true'),
(40, 'KY', 'Cayman Islands', 'true'),
(41, 'CF', 'Central African Republic', 'true'),
(42, 'TD', 'Chad', 'true'),
(43, 'CL', 'Chile', 'true'),
(44, 'CN', 'China', 'true'),
(45, 'CX', 'Christmas Island', 'true'),
(46, 'CC', 'Cocos (Keeling) Islands', 'true'),
(47, 'CO', 'Colombia', 'true'),
(48, 'KM', 'Comoros', 'true'),
(49, 'CG', 'Congo', 'true'),
(50, 'CK', 'Cook Islands', 'true'),
(51, 'CR', 'Costa Rica', 'true'),
(52, 'HR', 'Croatia (Hrvatska)', 'true'),
(53, 'CU', 'Cuba', 'true'),
(54, 'CY', 'Cyprus', 'true'),
(55, 'CZ', 'Czech Republic', 'true'),
(56, 'DK', 'Denmark', 'true'),
(57, 'DJ', 'Djibouti', 'true'),
(58, 'DM', 'Dominica', 'true'),
(59, 'DO', 'Dominican Republic', 'true'),
(60, 'TP', 'East Timor', 'true'),
(61, 'EC', 'Ecuador', 'true'),
(62, 'EG', 'Egypt', 'true'),
(63, 'SV', 'El Salvador', 'true'),
(64, 'GQ', 'Equatorial Guinea', 'true'),
(65, 'ER', 'Eritrea', 'true'),
(66, 'EE', 'Estonia', 'true'),
(67, 'ET', 'Ethiopia', 'true'),
(68, 'FK', 'Falkland Islands (Malvinas)', 'true'),
(69, 'FO', 'Faroe Islands', 'true'),
(70, 'FJ', 'Fiji', 'true'),
(71, 'FI', 'Finland', 'true'),
(72, 'FR', 'France', 'true'),
(73, 'FX', 'France, Metropolitan', 'true'),
(74, 'GF', 'French Guiana', 'true'),
(75, 'PF', 'French Polynesia', 'true'),
(76, 'TF', 'French Southern Territories', 'true'),
(77, 'GA', 'Gabon', 'true'),
(78, 'GM', 'Gambia', 'true'),
(79, 'GE', 'Georgia', 'true'),
(80, 'DE', 'Germany', 'true'),
(81, 'GH', 'Ghana', 'true'),
(82, 'GI', 'Gibraltar', 'true'),
(83, 'GK', 'Guernsey', 'true'),
(84, 'GR', 'Greece', 'true'),
(85, 'GL', 'Greenland', 'true'),
(86, 'GD', 'Grenada', 'true'),
(87, 'GP', 'Guadeloupe', 'true'),
(88, 'GU', 'Guam', 'true'),
(89, 'GT', 'Guatemala', 'true'),
(90, 'GN', 'Guinea', 'true'),
(91, 'GW', 'Guinea-Bissau', 'true'),
(92, 'GY', 'Guyana', 'true'),
(93, 'HT', 'Haiti', 'true'),
(94, 'HM', 'Heard and Mc Donald Islands', 'true'),
(95, 'HN', 'Honduras', 'true'),
(96, 'HK', 'Hong Kong', 'true'),
(97, 'HU', 'Hungary', 'true'),
(98, 'IS', 'Iceland', 'true'),
(99, 'IN', 'India', 'true'),
(100, 'IM', 'Isle of Man', 'true'),
(101, 'ID', 'Indonesia', 'true'),
(102, 'IR', 'Iran (Islamic Republic of)', 'true'),
(103, 'IQ', 'Iraq', 'true'),
(104, 'IE', 'Ireland', 'true'),
(105, 'IL', 'Israel', 'true'),
(106, 'IT', 'Italy', 'true'),
(107, 'CI', 'Ivory Coast', 'true'),
(108, 'JE', 'Jersey', 'true'),
(109, 'JM', 'Jamaica', 'true'),
(110, 'JP', 'Japan', 'true'),
(111, 'JO', 'Jordan', 'true'),
(112, 'KZ', 'Kazakhstan', 'true'),
(113, 'KE', 'Kenya', 'true'),
(114, 'KI', 'Kiribati', 'true'),
(115, 'KP', 'Korea, Democratic People\'s Republic of', 'true'),
(116, 'KR', 'Korea, Republic of', 'true'),
(117, 'XK', 'Kosovo', 'true'),
(118, 'KW', 'Kuwait', 'true'),
(119, 'KG', 'Kyrgyzstan', 'true'),
(120, 'LA', 'Lao People\'s Democratic Republic', 'true'),
(121, 'LV', 'Latvia', 'true'),
(122, 'LB', 'Lebanon', 'true'),
(123, 'LS', 'Lesotho', 'true'),
(124, 'LR', 'Liberia', 'true'),
(125, 'LY', 'Libyan Arab Jamahiriya', 'true'),
(126, 'LI', 'Liechtenstein', 'true'),
(127, 'LT', 'Lithuania', 'true'),
(128, 'LU', 'Luxembourg', 'true'),
(129, 'MO', 'Macau', 'true'),
(130, 'MK', 'Macedonia', 'true'),
(131, 'MG', 'Madagascar', 'true'),
(132, 'MW', 'Malawi', 'true'),
(133, 'MY', 'Malaysia', 'true'),
(134, 'MV', 'Maldives', 'true'),
(135, 'ML', 'Mali', 'true'),
(136, 'MT', 'Malta', 'true'),
(137, 'MH', 'Marshall Islands', 'true'),
(138, 'MQ', 'Martinique', 'true'),
(139, 'MR', 'Mauritania', 'true'),
(140, 'MU', 'Mauritius', 'true'),
(141, 'TY', 'Mayotte', 'true'),
(142, 'MX', 'Mexico', 'true'),
(143, 'FM', 'Micronesia, Federated States of', 'true'),
(144, 'MD', 'Moldova, Republic of', 'true'),
(145, 'MC', 'Monaco', 'true'),
(146, 'MN', 'Mongolia', 'true'),
(147, 'ME', 'Montenegro', 'true'),
(148, 'MS', 'Montserrat', 'true'),
(149, 'MA', 'Morocco', 'true'),
(150, 'MZ', 'Mozambique', 'true'),
(151, 'MM', 'Myanmar', 'true'),
(152, 'NA', 'Namibia', 'true'),
(153, 'NR', 'Nauru', 'true'),
(154, 'NP', 'Nepal', 'true'),
(155, 'NL', 'Netherlands', 'true'),
(156, 'AN', 'Netherlands Antilles', 'true'),
(157, 'NC', 'New Caledonia', 'true'),
(158, 'NZ', 'New Zealand', 'true'),
(159, 'NI', 'Nicaragua', 'true'),
(160, 'NE', 'Niger', 'true'),
(161, 'NG', 'Nigeria', 'true'),
(162, 'NU', 'Niue', 'true'),
(163, 'NF', 'Norfolk Island', 'true'),
(164, 'MP', 'Northern Mariana Islands', 'true'),
(165, 'NO', 'Norway', 'true'),
(166, 'OM', 'Oman', 'true'),
(167, 'PK', 'Pakistan', 'true'),
(168, 'PW', 'Palau', 'true'),
(169, 'PS', 'Palestine', 'true'),
(170, 'PA', 'Panama', 'true'),
(171, 'PG', 'Papua New Guinea', 'true'),
(172, 'PY', 'Paraguay', 'true'),
(173, 'PE', 'Peru', 'true'),
(174, 'PH', 'Philippines', 'true'),
(175, 'PN', 'Pitcairn', 'true'),
(176, 'PL', 'Poland', 'true'),
(177, 'PT', 'Portugal', 'true'),
(178, 'PR', 'Puerto Rico', 'true'),
(179, 'QA', 'Qatar', 'true'),
(180, 'RE', 'Reunion', 'true'),
(181, 'RO', 'Romania', 'true'),
(182, 'RU', 'Russian Federation', 'true'),
(183, 'RW', 'Rwanda', 'true'),
(184, 'KN', 'Saint Kitts and Nevis', 'true'),
(185, 'LC', 'Saint Lucia', 'true'),
(186, 'VC', 'Saint Vincent and the Grenadines', 'true'),
(187, 'WS', 'Samoa', 'true'),
(188, 'SM', 'San Marino', 'true'),
(189, 'ST', 'Sao Tome and Principe', 'true'),
(190, 'SA', 'Saudi Arabia', 'true'),
(191, 'SN', 'Senegal', 'true'),
(192, 'RS', 'Serbia', 'true'),
(193, 'SC', 'Seychelles', 'true'),
(194, 'SL', 'Sierra Leone', 'true'),
(195, 'SG', 'Singapore', 'true'),
(196, 'SK', 'Slovakia', 'true'),
(197, 'SI', 'Slovenia', 'true'),
(198, 'SB', 'Solomon Islands', 'true'),
(199, 'SO', 'Somalia', 'true'),
(200, 'ZA', 'South Africa', 'true'),
(201, 'GS', 'South Georgia South Sandwich Islands', 'true'),
(202, 'ES', 'Spain', 'true'),
(203, 'LK', 'Sri Lanka', 'true'),
(204, 'SH', 'St. Helena', 'true'),
(205, 'PM', 'St. Pierre and Miquelon', 'true'),
(206, 'SD', 'Sudan', 'true'),
(207, 'SR', 'Suriname', 'true'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands', 'true'),
(209, 'SZ', 'Swaziland', 'true'),
(210, 'SE', 'Sweden', 'true'),
(211, 'CH', 'Switzerland', 'true'),
(212, 'SY', 'Syrian Arab Republic', 'true'),
(213, 'TW', 'Taiwan', 'true'),
(214, 'TJ', 'Tajikistan', 'true'),
(215, 'TZ', 'Tanzania, United Republic of', 'true'),
(216, 'TH', 'Thailand', 'true'),
(217, 'TG', 'Togo', 'true'),
(218, 'TK', 'Tokelau', 'true'),
(219, 'TO', 'Tonga', 'true'),
(220, 'TT', 'Trinidad and Tobago', 'true'),
(221, 'TN', 'Tunisia', 'true'),
(222, 'TR', 'Turkey', 'true'),
(223, 'TM', 'Turkmenistan', 'true'),
(224, 'TC', 'Turks and Caicos Islands', 'true'),
(225, 'TV', 'Tuvalu', 'true'),
(226, 'UG', 'Uganda', 'true'),
(227, 'UA', 'Ukraine', 'true'),
(228, 'AE', 'United Arab Emirates', 'true'),
(229, 'GB', 'United Kingdom', 'true'),
(230, 'US', 'United States', 'true'),
(231, 'UM', 'United States minor outlying islands', 'true'),
(232, 'UY', 'Uruguay', 'true'),
(233, 'UZ', 'Uzbekistan', 'true'),
(234, 'VU', 'Vanuatu', 'true'),
(235, 'VA', 'Vatican City State', 'true'),
(236, 'VE', 'Venezuela', 'true'),
(237, 'VN', 'Vietnam', 'true'),
(238, 'VG', 'Virgin Islands (British)', 'true'),
(239, 'VI', 'Virgin Islands (U.S.)', 'true'),
(240, 'WF', 'Wallis and Futuna Islands', 'true'),
(241, 'EH', 'Western Sahara', 'true'),
(242, 'YE', 'Yemen', 'true'),
(243, 'ZR', 'Zaire', 'true'),
(244, 'ZM', 'Zambia', 'true'),
(245, 'ZW', 'Zimbabwe', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ref_degrees`
--

CREATE TABLE `ref_degrees` (
  `degree_id` int(11) NOT NULL,
  `degree_name` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `last_updated` datetime NOT NULL,
  `degree_type_id` int(11) NOT NULL,
  `is_active` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_degree_types`
--

CREATE TABLE `ref_degree_types` (
  `degree_type_id` int(11) NOT NULL,
  `degree_type_name` varchar(128) NOT NULL,
  `is_active` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_employer`
--

CREATE TABLE `ref_employer` (
  `employer_id` int(11) NOT NULL,
  `employer_name` varchar(128) NOT NULL,
  `added_by` int(11) NOT NULL,
  `last_updated` datetime NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_enquiry_status`
--

CREATE TABLE `ref_enquiry_status` (
  `enq_status_id` int(11) NOT NULL,
  `enq_status` varchar(128) NOT NULL,
  `is_active` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_exam_types`
--

CREATE TABLE `ref_exam_types` (
  `exam_type_id` int(11) NOT NULL,
  `exam_name` varchar(128) NOT NULL,
  `is_active` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_followup_status`
--

CREATE TABLE `ref_followup_status` (
  `followup_status_id` int(11) NOT NULL,
  `followup_status` varchar(128) NOT NULL,
  `is_active` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_genders`
--

CREATE TABLE `ref_genders` (
  `gender_id` int(11) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_genders`
--

INSERT INTO `ref_genders` (`gender_id`, `gender`, `is_active`) VALUES
(1, 'Male', '1'),
(2, 'Female', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ref_interview_status`
--

CREATE TABLE `ref_interview_status` (
  `intv_status_id` int(11) NOT NULL,
  `intv_status` varchar(128) NOT NULL,
  `is_active` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_lead_types`
--

CREATE TABLE `ref_lead_types` (
  `lead_type_id` int(11) NOT NULL,
  `lead_type` varchar(128) NOT NULL,
  `is_active` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_packages`
--

CREATE TABLE `ref_packages` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(128) NOT NULL,
  `added_by` int(11) NOT NULL,
  `last_updated` datetime NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_permissions`
--

CREATE TABLE `ref_permissions` (
  `permission_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `permission` varchar(128) NOT NULL,
  `is_active` enum('true','false') DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_permissions`
--

INSERT INTO `ref_permissions` (`permission_id`, `section_id`, `permission`, `is_active`) VALUES
(1, 1, 'Student_profile', 'true'),
(2, 1, 'Student details', 'true'),
(3, 1, 'Follow up updates', 'true'),
(4, 2, 'UG Colleges', 'true'),
(5, 2, 'UG degree', 'true'),
(6, 2, 'PG college', 'true'),
(7, 2, 'PG degree', 'true'),
(8, 2, 'Sources', 'true'),
(9, 2, 'Packages', 'true'),
(10, 2, 'Consultants', 'true'),
(11, 2, 'Programs', 'true'),
(12, 2, 'Universities', 'true'),
(13, 2, 'Applied Programs', 'true'),
(14, 2, 'Applied rounds', 'true'),
(15, 3, 'Lead report', 'true'),
(16, 3, 'Student report', 'true'),
(17, 3, 'Success report', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ref_programs`
--

CREATE TABLE `ref_programs` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `last_updated` datetime NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_programs`
--

INSERT INTO `ref_programs` (`program_id`, `program_name`, `added_by`, `last_updated`, `is_active`) VALUES
(3, 'program1', 1, '2017-11-13 02:24:35', 'true'),
(4, 'program2', 1, '2017-11-13 12:25:11', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ref_sources`
--

CREATE TABLE `ref_sources` (
  `source_id` int(11) NOT NULL,
  `source_name` varchar(64) NOT NULL,
  `added_by` int(11) NOT NULL,
  `last_updated` datetime NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_sources`
--

INSERT INTO `ref_sources` (`source_id`, `source_name`, `added_by`, `last_updated`, `is_active`) VALUES
(2, 'ms', 1, '2017-11-13 02:35:52', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ref_universities`
--

CREATE TABLE `ref_universities` (
  `university_id` int(11) NOT NULL,
  `university_name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `last_updated` datetime NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_universities`
--

INSERT INTO `ref_universities` (`university_id`, `university_name`, `country_id`, `added_by`, `last_updated`, `is_active`) VALUES
(4, 'dawdasd', 6, 1, '2017-11-13 01:51:29', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ref_userlevels`
--

CREATE TABLE `ref_userlevels` (
  `userlevel_id` int(11) NOT NULL,
  `userlevel` varchar(128) NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_userlevels`
--

INSERT INTO `ref_userlevels` (`userlevel_id`, `userlevel`, `is_active`) VALUES
(1, 'Admin', '1'),
(2, 'consultant', '1'),
(3, 'student', '1'),
(4, 'Agents', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiries`
--

CREATE TABLE `tbl_enquiries` (
  `enq_id` int(11) NOT NULL,
  `enq_date` datetime NOT NULL,
  `student_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `interested_program_id` int(11) NOT NULL,
  `lead_type_id` int(11) NOT NULL,
  `followup_status_id` int(11) NOT NULL,
  `enq_status_id` int(11) NOT NULL,
  `is_converted` enum('1','0') NOT NULL DEFAULT '0',
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_followups`
--

CREATE TABLE `tbl_student_followups` (
  `followup_id` int(11) NOT NULL,
  `enq_id` int(11) NOT NULL,
  `followup_date` datetime NOT NULL,
  `agent_id` int(11) NOT NULL,
  `followup_comment` text NOT NULL,
  `is_completed` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_professional_history`
--

CREATE TABLE `tbl_student_professional_history` (
  `history_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_profiles`
--

CREATE TABLE `tbl_student_profiles` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `resident_state_id` int(11) NOT NULL,
  `resident_city_id` int(11) NOT NULL,
  `intro` text NOT NULL,
  `total_experience` int(11) NOT NULL,
  `professional_qualification` varchar(64) NOT NULL,
  `current_employer_id` int(11) DEFAULT NULL,
  `remarks` text NOT NULL,
  `added_by` int(11) NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_to_degrees`
--

CREATE TABLE `tbl_student_to_degrees` (
  `sd_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `degree_type_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `passing_year` year(4) NOT NULL,
  `gpa_marks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_to_taken_exams`
--

CREATE TABLE `tbl_student_to_taken_exams` (
  `et_id` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `score` float NOT NULL,
  `tentative_date` datetime NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `email_id` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` datetime NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `userlevel_id` int(11) NOT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_updated` datetime NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `email_id`, `password`, `signup_date`, `added_by`, `phonenumber`, `userlevel_id`, `gender_id`, `last_login`, `last_updated`, `is_active`) VALUES
(1, 'admin1', 'admin@gmail.com', 'admin', '2017-10-09 09:18:23', NULL, '123123123', 1, 2, '2017-12-26 12:02:33', '2017-10-08 06:22:24', 'true'),
(2, 'shyam1', 'shyam@gmail.com', 'asdasd', '2017-10-08 08:19:10', 1, '123534123', 2, 1, '2017-10-09 07:12:11', '2017-10-06 06:18:23', 'true'),
(4, 'asdasd', 'asdasd@gmail.com', 'asdasd', '2017-11-10 12:18:20', 1, NULL, 2, NULL, NULL, '2017-11-10 12:18:20', 'false'),
(5, 'mahesh1', 'abc@abc.com', 'asdasd', '2017-11-13 12:29:15', 1, NULL, 4, NULL, NULL, '2017-11-13 12:29:15', 'false'),
(6, 'saurabh', 'saurabh@gmail.com', 'asdasd', '2017-12-26 20:00:48', 1, '1231231231231', 4, 1, NULL, '2017-12-26 20:00:48', 'false'),
(7, 'abcedfe', 'abajksbd@asdak.com', 'asdasd', '2017-12-26 20:01:59', 1, '123123123123', 4, 1, NULL, '2017-12-26 20:01:59', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lnk_student_to_applied_colleges`
--
ALTER TABLE `lnk_student_to_applied_colleges`
  ADD PRIMARY KEY (`stac_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `college_id` (`college_id`),
  ADD KEY `round_id` (`round_id`),
  ADD KEY `app_status_id` (`app_status_id`),
  ADD KEY `intv_status_id` (`intv_status_id`),
  ADD KEY `applied_program_id` (`applied_program_id`),
  ADD KEY `admit_status_id` (`admit_status_id`);

--
-- Indexes for table `lnk_student_to_packages`
--
ALTER TABLE `lnk_student_to_packages`
  ADD PRIMARY KEY (`stp_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `consultant_id` (`consultant_id`);

--
-- Indexes for table `lnk_user_to_permission`
--
ALTER TABLE `lnk_user_to_permission`
  ADD PRIMARY KEY (`utp_id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ref_admit_status`
--
ALTER TABLE `ref_admit_status`
  ADD PRIMARY KEY (`admit_status_id`);

--
-- Indexes for table `ref_application_rounds`
--
ALTER TABLE `ref_application_rounds`
  ADD PRIMARY KEY (`round_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `ref_application_status_id`
--
ALTER TABLE `ref_application_status_id`
  ADD PRIMARY KEY (`app_status_id`);

--
-- Indexes for table `ref_cities`
--
ALTER TABLE `ref_cities`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `ref_colleges`
--
ALTER TABLE `ref_colleges`
  ADD PRIMARY KEY (`college_id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `college_type_id` (`college_type_id`);

--
-- Indexes for table `ref_college_types`
--
ALTER TABLE `ref_college_types`
  ADD PRIMARY KEY (`college_type_id`);

--
-- Indexes for table `ref_countries`
--
ALTER TABLE `ref_countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `ref_degrees`
--
ALTER TABLE `ref_degrees`
  ADD PRIMARY KEY (`degree_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `degree_type_id` (`degree_type_id`);

--
-- Indexes for table `ref_degree_types`
--
ALTER TABLE `ref_degree_types`
  ADD PRIMARY KEY (`degree_type_id`);

--
-- Indexes for table `ref_employer`
--
ALTER TABLE `ref_employer`
  ADD PRIMARY KEY (`employer_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `ref_enquiry_status`
--
ALTER TABLE `ref_enquiry_status`
  ADD PRIMARY KEY (`enq_status_id`);

--
-- Indexes for table `ref_exam_types`
--
ALTER TABLE `ref_exam_types`
  ADD PRIMARY KEY (`exam_type_id`);

--
-- Indexes for table `ref_followup_status`
--
ALTER TABLE `ref_followup_status`
  ADD PRIMARY KEY (`followup_status_id`);

--
-- Indexes for table `ref_genders`
--
ALTER TABLE `ref_genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `ref_interview_status`
--
ALTER TABLE `ref_interview_status`
  ADD PRIMARY KEY (`intv_status_id`);

--
-- Indexes for table `ref_lead_types`
--
ALTER TABLE `ref_lead_types`
  ADD PRIMARY KEY (`lead_type_id`);

--
-- Indexes for table `ref_packages`
--
ALTER TABLE `ref_packages`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `ref_permissions`
--
ALTER TABLE `ref_permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `ref_programs`
--
ALTER TABLE `ref_programs`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `ref_sources`
--
ALTER TABLE `ref_sources`
  ADD PRIMARY KEY (`source_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `ref_universities`
--
ALTER TABLE `ref_universities`
  ADD PRIMARY KEY (`university_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `ref_userlevels`
--
ALTER TABLE `ref_userlevels`
  ADD PRIMARY KEY (`userlevel_id`);

--
-- Indexes for table `tbl_enquiries`
--
ALTER TABLE `tbl_enquiries`
  ADD PRIMARY KEY (`enq_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `source_id` (`source_id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `interested_program_id` (`interested_program_id`),
  ADD KEY `lead_type_id` (`lead_type_id`),
  ADD KEY `enq_status` (`enq_status_id`),
  ADD KEY `followup_status` (`followup_status_id`);

--
-- Indexes for table `tbl_student_followups`
--
ALTER TABLE `tbl_student_followups`
  ADD PRIMARY KEY (`followup_id`),
  ADD KEY `enq_id` (`enq_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `tbl_student_professional_history`
--
ALTER TABLE `tbl_student_professional_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `employer_id` (`employer_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_student_profiles`
--
ALTER TABLE `tbl_student_profiles`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `resident_state_id` (`resident_state_id`),
  ADD KEY `resident_city_id` (`resident_city_id`),
  ADD KEY `current_employer_id` (`current_employer_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_student_to_degrees`
--
ALTER TABLE `tbl_student_to_degrees`
  ADD PRIMARY KEY (`sd_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `degree_type_id` (`degree_type_id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `tbl_student_to_taken_exams`
--
ALTER TABLE `tbl_student_to_taken_exams`
  ADD PRIMARY KEY (`et_id`),
  ADD KEY `exam_type_id` (`exam_type_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `userlevel_id` (`userlevel_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `added_by` (`added_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lnk_student_to_applied_colleges`
--
ALTER TABLE `lnk_student_to_applied_colleges`
  MODIFY `stac_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lnk_student_to_packages`
--
ALTER TABLE `lnk_student_to_packages`
  MODIFY `stp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lnk_user_to_permission`
--
ALTER TABLE `lnk_user_to_permission`
  MODIFY `utp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `ref_admit_status`
--
ALTER TABLE `ref_admit_status`
  MODIFY `admit_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_application_rounds`
--
ALTER TABLE `ref_application_rounds`
  MODIFY `round_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ref_application_status_id`
--
ALTER TABLE `ref_application_status_id`
  MODIFY `app_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_cities`
--
ALTER TABLE `ref_cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_colleges`
--
ALTER TABLE `ref_colleges`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ref_college_types`
--
ALTER TABLE `ref_college_types`
  MODIFY `college_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_countries`
--
ALTER TABLE `ref_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `ref_degrees`
--
ALTER TABLE `ref_degrees`
  MODIFY `degree_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_degree_types`
--
ALTER TABLE `ref_degree_types`
  MODIFY `degree_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_employer`
--
ALTER TABLE `ref_employer`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_enquiry_status`
--
ALTER TABLE `ref_enquiry_status`
  MODIFY `enq_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_exam_types`
--
ALTER TABLE `ref_exam_types`
  MODIFY `exam_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_followup_status`
--
ALTER TABLE `ref_followup_status`
  MODIFY `followup_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_genders`
--
ALTER TABLE `ref_genders`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_interview_status`
--
ALTER TABLE `ref_interview_status`
  MODIFY `intv_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_lead_types`
--
ALTER TABLE `ref_lead_types`
  MODIFY `lead_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_packages`
--
ALTER TABLE `ref_packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_permissions`
--
ALTER TABLE `ref_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ref_programs`
--
ALTER TABLE `ref_programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ref_sources`
--
ALTER TABLE `ref_sources`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_universities`
--
ALTER TABLE `ref_universities`
  MODIFY `university_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ref_userlevels`
--
ALTER TABLE `ref_userlevels`
  MODIFY `userlevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_enquiries`
--
ALTER TABLE `tbl_enquiries`
  MODIFY `enq_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_student_followups`
--
ALTER TABLE `tbl_student_followups`
  MODIFY `followup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_student_professional_history`
--
ALTER TABLE `tbl_student_professional_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_student_profiles`
--
ALTER TABLE `tbl_student_profiles`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_student_to_degrees`
--
ALTER TABLE `tbl_student_to_degrees`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_student_to_taken_exams`
--
ALTER TABLE `tbl_student_to_taken_exams`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lnk_student_to_applied_colleges`
--
ALTER TABLE `lnk_student_to_applied_colleges`
  ADD CONSTRAINT `lnk_student_to_applied_colleges_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student_profiles` (`student_id`),
  ADD CONSTRAINT `lnk_student_to_applied_colleges_ibfk_2` FOREIGN KEY (`college_id`) REFERENCES `ref_colleges` (`college_id`),
  ADD CONSTRAINT `lnk_student_to_applied_colleges_ibfk_3` FOREIGN KEY (`round_id`) REFERENCES `ref_application_rounds` (`round_id`),
  ADD CONSTRAINT `lnk_student_to_applied_colleges_ibfk_4` FOREIGN KEY (`app_status_id`) REFERENCES `ref_application_status_id` (`app_status_id`),
  ADD CONSTRAINT `lnk_student_to_applied_colleges_ibfk_5` FOREIGN KEY (`intv_status_id`) REFERENCES `ref_interview_status` (`intv_status_id`),
  ADD CONSTRAINT `lnk_student_to_applied_colleges_ibfk_6` FOREIGN KEY (`applied_program_id`) REFERENCES `ref_programs` (`program_id`),
  ADD CONSTRAINT `lnk_student_to_applied_colleges_ibfk_7` FOREIGN KEY (`admit_status_id`) REFERENCES `ref_admit_status` (`admit_status_id`);

--
-- Constraints for table `lnk_student_to_packages`
--
ALTER TABLE `lnk_student_to_packages`
  ADD CONSTRAINT `lnk_student_to_packages_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `ref_packages` (`package_id`),
  ADD CONSTRAINT `lnk_student_to_packages_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `tbl_student_profiles` (`student_id`),
  ADD CONSTRAINT `lnk_student_to_packages_ibfk_3` FOREIGN KEY (`consultant_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `lnk_user_to_permission`
--
ALTER TABLE `lnk_user_to_permission`
  ADD CONSTRAINT `lnk_user_to_permission_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `lnk_user_to_permission_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `ref_permissions` (`permission_id`);

--
-- Constraints for table `ref_application_rounds`
--
ALTER TABLE `ref_application_rounds`
  ADD CONSTRAINT `ref_application_rounds_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `ref_colleges`
--
ALTER TABLE `ref_colleges`
  ADD CONSTRAINT `ref_colleges_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `ref_universities` (`university_id`),
  ADD CONSTRAINT `ref_colleges_ibfk_2` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `ref_colleges_ibfk_3` FOREIGN KEY (`college_type_id`) REFERENCES `ref_college_types` (`college_type_id`);

--
-- Constraints for table `ref_degrees`
--
ALTER TABLE `ref_degrees`
  ADD CONSTRAINT `ref_degrees_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `ref_degrees_ibfk_2` FOREIGN KEY (`degree_type_id`) REFERENCES `ref_degree_types` (`degree_type_id`);

--
-- Constraints for table `ref_employer`
--
ALTER TABLE `ref_employer`
  ADD CONSTRAINT `ref_employer_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `ref_packages`
--
ALTER TABLE `ref_packages`
  ADD CONSTRAINT `ref_packages_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `ref_programs`
--
ALTER TABLE `ref_programs`
  ADD CONSTRAINT `ref_programs_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `ref_sources`
--
ALTER TABLE `ref_sources`
  ADD CONSTRAINT `ref_sources_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `ref_universities`
--
ALTER TABLE `ref_universities`
  ADD CONSTRAINT `ref_universities_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `ref_universities_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `ref_countries` (`country_id`);

--
-- Constraints for table `tbl_enquiries`
--
ALTER TABLE `tbl_enquiries`
  ADD CONSTRAINT `tbl_enquiries_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student_profiles` (`student_id`),
  ADD CONSTRAINT `tbl_enquiries_ibfk_2` FOREIGN KEY (`source_id`) REFERENCES `ref_sources` (`source_id`),
  ADD CONSTRAINT `tbl_enquiries_ibfk_3` FOREIGN KEY (`agent_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_enquiries_ibfk_4` FOREIGN KEY (`interested_program_id`) REFERENCES `ref_programs` (`program_id`),
  ADD CONSTRAINT `tbl_enquiries_ibfk_5` FOREIGN KEY (`lead_type_id`) REFERENCES `ref_lead_types` (`lead_type_id`),
  ADD CONSTRAINT `tbl_enquiries_ibfk_6` FOREIGN KEY (`followup_status_id`) REFERENCES `ref_followup_status` (`followup_status_id`),
  ADD CONSTRAINT `tbl_enquiries_ibfk_7` FOREIGN KEY (`enq_status_id`) REFERENCES `ref_enquiry_status` (`enq_status_id`);

--
-- Constraints for table `tbl_student_followups`
--
ALTER TABLE `tbl_student_followups`
  ADD CONSTRAINT `tbl_student_followups_ibfk_1` FOREIGN KEY (`enq_id`) REFERENCES `tbl_enquiries` (`enq_id`),
  ADD CONSTRAINT `tbl_student_followups_ibfk_2` FOREIGN KEY (`agent_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_student_professional_history`
--
ALTER TABLE `tbl_student_professional_history`
  ADD CONSTRAINT `tbl_student_professional_history_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `ref_employer` (`employer_id`),
  ADD CONSTRAINT `tbl_student_professional_history_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `tbl_student_profiles` (`student_id`);

--
-- Constraints for table `tbl_student_profiles`
--
ALTER TABLE `tbl_student_profiles`
  ADD CONSTRAINT `tbl_student_profiles_ibfk_1` FOREIGN KEY (`resident_state_id`) REFERENCES `ref_countries` (`country_id`),
  ADD CONSTRAINT `tbl_student_profiles_ibfk_2` FOREIGN KEY (`resident_city_id`) REFERENCES `ref_cities` (`city_id`),
  ADD CONSTRAINT `tbl_student_profiles_ibfk_3` FOREIGN KEY (`current_employer_id`) REFERENCES `ref_employer` (`employer_id`),
  ADD CONSTRAINT `tbl_student_profiles_ibfk_4` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_student_to_degrees`
--
ALTER TABLE `tbl_student_to_degrees`
  ADD CONSTRAINT `tbl_student_to_degrees_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student_profiles` (`student_id`),
  ADD CONSTRAINT `tbl_student_to_degrees_ibfk_2` FOREIGN KEY (`degree_type_id`) REFERENCES `ref_degree_types` (`degree_type_id`),
  ADD CONSTRAINT `tbl_student_to_degrees_ibfk_3` FOREIGN KEY (`college_id`) REFERENCES `ref_colleges` (`college_id`);

--
-- Constraints for table `tbl_student_to_taken_exams`
--
ALTER TABLE `tbl_student_to_taken_exams`
  ADD CONSTRAINT `tbl_student_to_taken_exams_ibfk_1` FOREIGN KEY (`exam_type_id`) REFERENCES `ref_exam_types` (`exam_type_id`),
  ADD CONSTRAINT `tbl_student_to_taken_exams_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `tbl_student_profiles` (`student_id`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`userlevel_id`) REFERENCES `ref_userlevels` (`userlevel_id`),
  ADD CONSTRAINT `tbl_users_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `ref_genders` (`gender_id`),
  ADD CONSTRAINT `tbl_users_ibfk_3` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
