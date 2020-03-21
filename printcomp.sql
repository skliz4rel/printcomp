-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2012 at 05:09 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `printcomp`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatusers`
--

CREATE TABLE IF NOT EXISTS `chatusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chatusers`
--


-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `phone` char(40) NOT NULL,
  `homeaddress` varchar(800) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `comp_address` varchar(800) DEFAULT NULL,
  `comp_phone` char(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `referer` char(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `phone`, `homeaddress`, `company`, `comp_address`, `comp_phone`, `website`, `email`, `referer`) VALUES
(1, 'Jide', '080234234', 'sadfsdfds', 'ASDFS', 'ADSFADS', '22342342', 'asdfs', 's@yahoo.com', 'asdfds'),
(2, 'Bode decker', '0802342423', '13 ibarapa street, ebute metta', 'Jadoube system limited', '12, yaba street.', '234234234', 'yahoo.com', 'skliz4rel@yahoo.com', 'Abolaji');

-- --------------------------------------------------------

--
-- Table structure for table `jobbag`
--

CREATE TABLE IF NOT EXISTS `jobbag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(20) NOT NULL,
  `job_name` varchar(150) DEFAULT NULL,
  `job_size` varchar(80) NOT NULL,
  `job_type` char(50) NOT NULL,
  `quantity` int(30) NOT NULL,
  `duration` char(20) NOT NULL,
  `delivery_date` char(20) DEFAULT NULL,
  `details` text,
  `cost` int(20) DEFAULT NULL,
  `totalcost` int(30) NOT NULL,
  `pay_status` tinyint(1) DEFAULT NULL,
  `execution` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jobbag`
--

INSERT INTO `jobbag` (`id`, `client_id`, `job_name`, `job_size`, `job_type`, `quantity`, `duration`, `delivery_date`, `details`, `cost`, `totalcost`, `pay_status`, `execution`) VALUES
(1, 1, 'power must change hands flyers', 'w100 inches by h200 inches', 'Hand Bills', 100, '1 wk', '12/02/2001', 'The job is for mfm', 10000, 0, 0, NULL),
(2, 1, 'power must change hands flyers', '100 inches by 200 inches', 'Calendar', 2, '1 wk', '11/15/2012', 'job is owned part olu', 100, 200, 1, NULL),
(3, 1, 'Nigerian ropes', '100 inches by 200 inches', 'Book Printing', 100, '1 wk', '09/18/2012', 'SADFASDF\r\nASDFSDF\r\nSADFASDF', 20, 2000, NULL, 0),
(4, 2, 'Bode flyers', '100 inches by 200 inches', 'Trats', 100, '1 wk', '09/20/2012', '', 50, 5000, 1, 1),
(5, 2, 'Bode&#039;s print', '100 inches by 200 inches', 'Rollup Banner', 100, '1 wk', '07/20/2012', '', 20, 2000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_payment`
--

CREATE TABLE IF NOT EXISTS `job_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_id` char(20) DEFAULT NULL,
  `jobid` int(30) DEFAULT NULL,
  `payment` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `job_payment`
--

INSERT INTO `job_payment` (`id`, `trans_id`, `jobid`, `payment`) VALUES
(2, '89AB-VWXY-GHIJ-LMNO', 4, 5000),
(3, '0123-IJKL-STUV-3456', 33, 3333),
(4, 'KLMN-6789-BCDE-NOPQ', 2, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffid` int(20) NOT NULL,
  `username` char(100) NOT NULL,
  `password` text NOT NULL,
  `admintype` char(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `staffid`, `username`, `password`, `admintype`) VALUES
(1, 2, 'jaido', 'xxeYLsjfazR.k', 'Press'),
(2, 11, 'kunle', 'xxCC8r9S45DuA', 'Creative');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `staffid` int(20) NOT NULL,
  `paymentdate` char(15) NOT NULL,
  `transID` char(100) NOT NULL,
  `amount` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `staffid`, `paymentdate`, `transID`, `amount`) VALUES
(1, 2, '09/04/2012', 'asdfsdf', 0),
(2, 2, '09/04/2012', 'asdfsdf', 10000),
(3, 1, '09/05/2012', '122334543', 50000),
(4, 2, '09/20/2012', 'sdf23443234', 100000),
(5, 1, '09/12/2012', 'sfsdf', 35556);

-- --------------------------------------------------------

--
-- Table structure for table `privatechat`
--

CREATE TABLE IF NOT EXISTS `privatechat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `message` text,
  `chatter` char(6) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `privatechat`
--


-- --------------------------------------------------------

--
-- Table structure for table `publicchat`
--

CREATE TABLE IF NOT EXISTS `publicchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `publicchat`
--


-- --------------------------------------------------------

--
-- Table structure for table `registerprivatechatid`
--

CREATE TABLE IF NOT EXISTS `registerprivatechatid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `staffid` int(11) DEFAULT NULL,
  `chatter` char(100) DEFAULT NULL,
  `partner` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `registerprivatechatid`
--


-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text,
  `sex` char(10) DEFAULT NULL,
  `department` char(60) DEFAULT NULL,
  `level` char(60) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `salary` char(20) DEFAULT NULL,
  `bankname` varchar(100) DEFAULT NULL,
  `acct_type` char(70) DEFAULT NULL,
  `acct_name` varchar(100) DEFAULT NULL,
  `acct_num` varchar(100) DEFAULT NULL,
  `pic_path` varchar(800) DEFAULT NULL,
  `pic_name` char(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `phone`, `email`, `address`, `sex`, `department`, `level`, `qualification`, `salary`, `bankname`, `acct_type`, `acct_name`, `acct_num`, `pic_path`, `pic_name`) VALUES
(1, 'Jide', '08131528807', 'skliz4rel@yahoo.com', '13, Ibarapa street', 'radiobutto', 'Printing', 'Junior', 'Secondary School Certificate', '10,000', 'UBA', 'Savings', 'Jide Akindejoye', '0630923401', '../../staff_pics/20044Snapshot_20120315_4.JPG', '20044Snapshot_20120315_4.JPG'),
(2, 'Jide Akindejoye', '092342342343', 'skliz4rel@yahoo.com', '13, Ibarapa street', 'female', 'Press', 'Senior', 'OND Holder', '100,000', 'UBA', 'Savings', '', '', '../../staff_pics/28774Snapshot_20111230_15.JPG', '28774Snapshot_20111230_15.JPG'),
(3, 'svasfsdf', 'sadfsdf', 'sadfsd', 'asfddsf', 'radiobutto', 'sasdfas', 'adsfds', 'Degree Holder', 'asdfsdf', 'asdfdsf', 'asdfasdf', 'adsfsd', 'afdsdf', '../../staff_pics/274237635_1197154140177_1568193023_30498430_1226942_a.jpg', '274237635_1197154140177_1568193023_30498430_1226942_a.jpg'),
(4, 'gbemi', '08131528807', 'skliz4rel@yahoo.com', '13, Ibarapa street, ebute metta west, Lag', 'radiobutto', 'Computer science', 'Senior', 'Secondary School Certificate', '10,000', 'UBA', 'Savings', 'Jide Akindejoye', '062234234234', '../../staff_pics/31644369678_100002082400623_529570861_q.jpg', '31644369678_100002082400623_529570861_q.jpg'),
(5, 'Yemi', '08131528807', 'skliz4rel@yahoo.com', '13, Ibarapa street', 'radiobutto', 'Computer science', 'Senior', 'Secondary School Certificate', '100,000', 'Syke bank', 'Savings', 'Jide Akindejoye', '08234234234', '../../staff_pics/7608model.jpg', '7608model.jpg'),
(6, 'bode decker', '08131528807', 'bode@yahoo.com', '13, Ibarapa street, ebute metta west, Lag', 'radiobutto', 'Printing', 'Senior', 'OND Holder', '12,000', 'Syke bank', 'Current', 'james', '0603403434', '../../staff_pics/33747635_1197155660215_1568193023_30498437_135619_n.jpg', '33747635_1197155660215_1568193023_30498437_135619_n.jpg'),
(7, 'ola markurdi', '08131528807', 'ola@yahoo.com', '13, markurdi street', 'radiobutto', 'Printing', 'Senior', 'Secondary School Certificate', '10,000', 'Syke bank', 'Current', 'Bode Ola', '08204234234', '../../staff_pics/12098model.jpg', '12098model.jpg'),
(8, 'jide', '83245234', 'asfsdf', 'ASDFASD', 'radiobutto', 'ASDFASF', 'ASDFSD', 'PHD Holder', 'SDFASD', 'SADFD', 'ADSFSDF', 'ASDFSDF', 'SADFSDF', '../../staff_pics/20102215670_1013100738957_1568193023_30028819_7243_n.jpg', '20102215670_1013100738957_1568193023_30028819_7243_n.jpg'),
(9, 'toyosi', '08052008579', 'toyo@yahoo.com', 'yaba, lagos', 'radiobutto', 'department', 'Senior', 'HND Holder', '100,000', 'UBA', 'Savings', 'Jide Akindejoye', '9058735345', '../../staff_pics/105397635_1197155820219_1568193023_30498438_500728_n.jpg', '105397635_1197155820219_1568193023_30498438_500728_n.jpg'),
(10, 'Kolade Akindejoy', '3543425345345', 'skliz4rel@yahoo.com', '13, Ibarapa street, ebute metta west, Lag', 'male', 'Administration', 'Senior', 'HND Holder', '50,000', 'UBA', 'Savings', 'Kolade', '234234234234', '../../staff_pics/169777635_1201209601561_1568193023_30508566_2641690_n.jpg', '169777635_1201209601561_1568193023_30508566_2641690_n.jpg'),
(11, 'Adekunle', '08223123232', 'ade@yahoo.com', '13, Ibarapa street', 'male', 'Creative', 'Senior', 'Secondary School Certificate', '20,000', 'Skye Bank', 'Current', 'Jaido', '4646564654', '../../staff_pics/174287635_1197154140177_1568193023_30498430_1226942_a.jpg', '174287635_1197154140177_1568193023_30498430_1226942_a.jpg'),
(12, 'Yemi Adenuga', '08052008579', 'skliz4rel@yahoo.com', '13, Ibarapa street', 'male', 'Account', 'Senior', 'HND Holder', '100,000', 'UBA', 'Current', 'James Adelabu', '050342882323', '../../staff_pics/5890Snapshot_20111123.JPG', '5890Snapshot_20111123.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `uploadedjob`
--

CREATE TABLE IF NOT EXISTS `uploadedjob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobid` int(11) NOT NULL,
  `smallimagepath` longblob,
  `largeimagepath` longblob,
  `zippath` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `uploadedjob`
--

INSERT INTO `uploadedjob` (`id`, `jobid`, `smallimagepath`, `largeimagepath`, `zippath`) VALUES
(1, 0, '', 0x2e2e2f2e2e2f6c61726765706963732f3232353130312e6a7067, 0x2e2e2f2e2e2f61726368697665732f39333539312e726172),
(2, 0, '', 0x2e2e2f2e2e2f6c61726765706963732f36373739312e6a7067, 0x2e2e2f2e2e2f61726368697665732f3238383234312e726172),
(3, 0, 0x2e2e2f2e2e2f736d616c6c706963732f3235363335736d616c6c312e6a7067, 0x2e2e2f2e2e2f6c61726765706963732f3332303332312e6a7067, 0x2e2e2f2e2e2f61726368697665732f3134303431312e726172),
(4, 4, 0x2e2e2f2e2e2f736d616c6c706963732f3230373234736d616c6c312e6a7067, 0x2e2e2f2e2e2f6c61726765706963732f3239312e6a7067, 0x2e2e2f2e2e2f61726368697665732f34373534312e726172);
