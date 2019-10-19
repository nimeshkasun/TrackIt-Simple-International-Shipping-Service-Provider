-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2019 at 05:52 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courierdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcountry`
--

CREATE TABLE `tbcountry` (
  `cid` int(11) NOT NULL,
  `ccode` varchar(2) NOT NULL DEFAULT '',
  `cname` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbcountry`
--

INSERT INTO `tbcountry` (`cid`, `ccode`, `cname`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `tblocation`
--

CREATE TABLE `tblocation` (
  `lid` int(11) NOT NULL,
  `lname` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblocation`
--

INSERT INTO `tblocation` (`lid`, `lname`) VALUES
(1, 'TrackIt HQ - Colombo'),
(2, 'TrackIt Parcel Centre, Colombo-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbshipment`
--

CREATE TABLE `tbshipment` (
  `trackingnumber` varchar(10) NOT NULL,
  `sname` varchar(500) NOT NULL,
  `sadd` varchar(1000) NOT NULL,
  `sphone` int(30) NOT NULL,
  `semail` varchar(200) NOT NULL,
  `bname` varchar(500) NOT NULL,
  `badd` varchar(1000) NOT NULL,
  `bphone` int(30) NOT NULL,
  `bemail` varchar(200) NOT NULL,
  `itemname` varchar(1000) NOT NULL,
  `iprice` int(50) NOT NULL,
  `shipmentcost` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbshipment`
--

INSERT INTO `tbshipment` (`trackingnumber`, `sname`, `sadd`, `sphone`, `semail`, `bname`, `badd`, `bphone`, `bemail`, `itemname`, `iprice`, `shipmentcost`) VALUES
('LK00000001', 'Nimesh Kasun', 'Borupana, Ratmalana', 718810575, 'nimesh.ekanayaka7@gmail.com', 'Dimuthu Chamod', 'Track 05, Anuradhapura', 776777668, 'kdusouthern34@gmail.com', 'Atlas CR Book', 12, 27),
('LK00000002', 'Nimesh Kasun', 'Borupana, Ratmalana', 718810575, 'nimesh.ekanayaka7@gmail.com', 'Dimuthu Chamod', 'Track 05, Anuradhapura', 776777668, 'kdusouthern34@gmail.com', 'Atlas CR Book', 12, 27),
('LK00000010', 'Nimesh Kasun', 'Borupana, Ratmalana', 718810575, 'nimesh.ekanayaka7@gmail.com', 'Dimuthu Chamod', 'Track 05, Anuradhapura', 776777668, 'kdusouthern34@gmail.com', 'Atlas CR Book', 12, 27),
('LK00000011', 'Nimesh Kasun', 'Borupana, Ratmalana', 718810575, 'nimesh.ekanayaka7@gmail.com', 'Dimuthu Chamod', 'Track 05, Anuradhapura', 776777668, 'kdusouthern34@gmail.com', 'Atlas CR Book', 12, 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbtrackingrecords`
--

CREATE TABLE `tbtrackingrecords` (
  `RID` int(11) NOT NULL,
  `trackingnumber` varchar(10) NOT NULL,
  `tracking_record` varchar(500) NOT NULL,
  `tracking_comment` varchar(1000) NOT NULL,
  `datentime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtrackingrecords`
--

INSERT INTO `tbtrackingrecords` (`RID`, `trackingnumber`, `tracking_record`, `tracking_comment`, `datentime`) VALUES
(1, 'LK00000001', 'Tracking Generated', 'Successful payment. Waitng to receive the package.', '2019-10-16'),
(16, 'LK00000002', 'Tracking Generated', 'Successful payment. Waitng to receive the package.', '2019-10-16 22:00:42 1571256042'),
(17, 'LK00000002', 'ITEM RECEIVED AT TrackIt Parcel Centre, Colombo-03, Sri Lanka', '', '2019-10-16 22:01:31 1571256091'),
(18, 'LK00000010', 'Tracking Generated', 'Successful payment. Waitng to receive the package.', '2019-10-16 22:01:45 1571256105'),
(19, 'LK00000010', 'ITEM RECEIVED AT TrackIt Parcel Centre, Colombo-03, Sri Lanka', '', '2019-10-16 22:03:42 1571256222'),
(20, 'LK00000010', 'ITEM SENT OUT FROM TrackIt Parcel Centre, Colombo-03, Sri Lanka', '', '2019-10-16 22:03:58 1571256238'),
(21, 'LK00000002', 'ITEM HOLDED AT TrackIt HQ - Colombo, Sri Lanka', '', '2019-10-17 05:17:50 1571282270'),
(22, 'LK00000011', 'Tracking Generated', 'Successful payment. Waitng to receive the package.', '2019-10-17 05:19:08 1571282348');

-- --------------------------------------------------------

--
-- Table structure for table `tbtrackingstatus`
--

CREATE TABLE `tbtrackingstatus` (
  `RID` int(11) NOT NULL,
  `TrackingNumber` varchar(10) NOT NULL,
  `TrackingStatus` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtrackingstatus`
--

INSERT INTO `tbtrackingstatus` (`RID`, `TrackingNumber`, `TrackingStatus`) VALUES
(1, 'LK00000001', 'DS'),
(9, 'LK00000002', 'OD'),
(10, 'LK00000010', 'IT'),
(11, 'LK00000011', 'DS');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `acc_type` varchar(50) NOT NULL,
  `acc_status` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`uid`, `username`, `first_name`, `last_name`, `email`, `password`, `acc_type`, `acc_status`, `country`, `location`) VALUES
(1, 'admin', 'Nimesh', 'Ekanayake', 'nimesh.ekanayaka7@gmail.com', 'admin123', 'admin', 'Active', 'Sri Lanka', 'TrackIt HQ - Colombo'),
(2, 'user', 'Nimesh', 'Ekanayake', 'nimesh.ekanayaka7@gmail.com', 'user123', 'agent', 'Active', 'Sri Lanka', 'TrackIt Parcel Centre, Colombo-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcountry`
--
ALTER TABLE `tbcountry`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblocation`
--
ALTER TABLE `tblocation`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `tbshipment`
--
ALTER TABLE `tbshipment`
  ADD PRIMARY KEY (`trackingnumber`);

--
-- Indexes for table `tbtrackingrecords`
--
ALTER TABLE `tbtrackingrecords`
  ADD PRIMARY KEY (`RID`);

--
-- Indexes for table `tbtrackingstatus`
--
ALTER TABLE `tbtrackingstatus`
  ADD PRIMARY KEY (`TrackingNumber`),
  ADD UNIQUE KEY `RID` (`RID`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcountry`
--
ALTER TABLE `tbcountry`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `tblocation`
--
ALTER TABLE `tblocation`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbtrackingrecords`
--
ALTER TABLE `tbtrackingrecords`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbtrackingstatus`
--
ALTER TABLE `tbtrackingstatus`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
