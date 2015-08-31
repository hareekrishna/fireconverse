-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2015 at 09:46 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fireconverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `corner`
--

CREATE TABLE IF NOT EXISTS `corner` (
  `CORNER_ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ADMIN_ID` smallint(5) unsigned NOT NULL,
  `ROOM_ID` int(2) NOT NULL DEFAULT '1',
  `corner_name` char(20) NOT NULL,
  `description` char(50) NOT NULL,
  `data` char(50) NOT NULL,
  `topic_id` text NOT NULL,
  `followers` text NOT NULL,
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`CORNER_ID`),
  UNIQUE KEY `corner_name` (`corner_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `corner`
--

INSERT INTO `corner` (`CORNER_ID`, `ADMIN_ID`, `ROOM_ID`, `corner_name`, `description`, `data`, `topic_id`, `followers`, `time`) VALUES
(1, 150, 1, 'iu', '.', '../../data/corner/11_150.jpg', '', '', 0),
(6, 150, 1, 'oi', 'kk', '../../data/corner/66_150.jpg', '', '', 0),
(10, 150, 1, 'po', 'ou', '../../data/corners/1010_150.jpg', '', '', 0),
(11, 150, 1, 'ii', 'o', '../../data/corners/11/11_150.jpg', '', '', 0),
(13, 150, 1, 'oh', 'oiu', '../../data/corners/13/13_150.jpg', '', '', 1417805792),
(14, 150, 1, 'ipl', 'gves he information', '../../data/corners/14/14_150.jpg', '', '', 1417833537),
(18, 150, 1, 'lk', 'k', '../../data/corners/18/18_150.jpg', '', '', 1417837348),
(19, 150, 1, 'illan', 'lok', '../../data/corners/19/19_150.jpg', '', '', 1417837428),
(20, 150, 1, 'cricket', 'live status about cricket', '../../data/corners/20/20_150.jpg', '', '', 1417837469),
(21, 150, 1, 'honey', 'nike', '../../data/corners/21/21_150.jpg', '', '', 1417837557),
(22, 150, 1, 'il', 'i', '../../data/corners/22/22_150.jpg', '', '', 1417837620),
(24, 150, 1, 'i', 'k', '../../data/corners/24/24_150.jpg', '', '', 1417837679),
(32, 150, 1, 'football', 'nik', '../../data/corners/32/32_150.jpg', '', '', 1417924739);

-- --------------------------------------------------------

--
-- Table structure for table `counterresponse`
--

CREATE TABLE IF NOT EXISTS `counterresponse` (
  `CRES_ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `RES_ID` mediumint(8) unsigned NOT NULL,
  `cresponse` tinytext NOT NULL,
  `name` varchar(20) NOT NULL,
  `ID` smallint(5) unsigned NOT NULL,
  `date_of_cresponse` varchar(50) NOT NULL,
  PRIMARY KEY (`CRES_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `counterresponse`
--

INSERT INTO `counterresponse` (`CRES_ID`, `RES_ID`, `cresponse`, `name`, `ID`, `date_of_cresponse`) VALUES
(3, 49, 'i like it!!', 'bharatreddy', 52, '2011-07-13 00:00:00'),
(4, 48, 'hey!!\r\n', 'bharatreddy', 53, '2011-07-13 00:00:00'),
(5, 48, 'hi!!!!', 'bharatreddy', 50, '2011-07-13 00:00:00'),
(6, 49, 'me 2!!', 'bharatreddy', 51, '2011-07-13 00:00:00'),
(7, 50, 'is it!\r\n', 'bharatreddy', 52, '2011-07-13 00:00:00'),
(8, 48, 'endi ra!!', 'lakshman', 52, '2011-07-13 00:00:00'),
(9, 48, 'nee bonda ra!\r\n', 'bharatreddy', 53, '2012-07-13 00:00:00'),
(10, 209, 'ooh!! u  mean hi..im mental! kk!!', 'bharatreddy', 54, '2012-07-13 00:00:00'),
(11, 212, 'really dude!', 'bharatreddy', 52, '2012-07-13 00:00:00'),
(12, 217, 'in my home..', 'lakshman', 55, '0000-00-00 00:00:00'),
(13, 217, 'ooh!', 'lakshman', 53, '0000-00-00 00:00:00'),
(14, 223, 'ya..  mee too know dat..', 'lakshman', 53, '0000-00-00 00:00:00'),
(15, 223, 'hahaha..', 'lakshman', 53, '0000-00-00 00:00:00'),
(16, 162, 're kuthe!', 'lakshman', 53, '2012-07-13 19:42:00'),
(17, 232, 'ha', 'fazilkhan', 53, '2013-07-13 02:05:00'),
(18, 163, 'hi macha...', 'fazilkhan', 53, '2013-07-13 02:21:00'),
(19, 233, 'same 2 u!!', 'fazilkhan', 57, '2013-07-13 02:36:00'),
(20, 244, 'endi ra!!!', 'bharatreddy', 54, '2014-07-13 09:52:00'),
(21, 244, 'avna macha??', 'himasagar', 56, '2015-07-13 16:32:00'),
(22, 247, 'em ra...', 'deekshit', 56, '2016-07-13 07:31:00'),
(23, 248, 'kuthe', 'charanreddy', 53, '2016-07-13 09:37:00'),
(24, 255, 'y??', 'bharatreddy', 53, '2027-07-13 12:36:00'),
(25, 1, 'heyy der!!!\r\n', 'fazilkhan', 53, '2003-08-13 02:09:00'),
(26, 1, 'yep..\r\n', 'fazilkhan', 53, '2003-08-13 02:28:00'),
(27, 7, 'lie', 'fazilkhan', 53, '2003-08-13 05:42:00'),
(28, 1, 'endira,,,', 'fazilkhan', 53, '2007-08-13 03:52:00'),
(29, 1, 'hiiii', 'fazilkhan', 53, '2007-08-13 06:06:00'),
(30, 248, 'pandi', 'fazilkhan', 53, '2007-08-13 06:23:00'),
(31, 288, 'hi', 'fazilkhan', 0, '07-08-13 11:55'),
(32, 319, 'hi doodh...', 'vamsiyadav', 0, '14-08-13 17:59'),
(33, 316, 'uuuu', 'vamsiyadav', 0, '14-08-13 18:0'),
(34, 321, 'lak', 'bharatreddy', 0, '22-08-13 12:21');

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

CREATE TABLE IF NOT EXISTS `followings` (
  `ID` smallint(6) NOT NULL,
  `followings_ID` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followings`
--

INSERT INTO `followings` (`ID`, `followings_ID`) VALUES
(150, 'a:5:{i:0;i:152;i:1;i:153;i:2;i:154;i:3;i:155;i:4;i:156;}'),
(152, 'a:1:{i:0;s:3:"150";}'),
(153, 'a:1:{i:0;s:3:"150";}'),
(154, 'a:1:{i:0;s:3:"150";}');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE IF NOT EXISTS `follows` (
  `ID` smallint(6) NOT NULL,
  `follows_ID` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`ID`, `follows_ID`) VALUES
(150, 'a:3:{i:0;s:3:"152";i:1;s:3:"154";i:2;s:3:"153";}');

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

CREATE TABLE IF NOT EXISTS `fonts` (
  `fontid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fontname` varchar(50) NOT NULL,
  `fonts` varchar(500) NOT NULL,
  PRIMARY KEY (`fontid`),
  UNIQUE KEY `fonts` (`fonts`),
  UNIQUE KEY `fontid` (`fontid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`fontid`, `fontname`, `fonts`) VALUES
(1, 'Roboto', '<link href=''http://fonts.googleapis.com/css?family=Roboto'' rel=''stylesheet'' type=''text/css''>'),
(2, 'Alegreya SC', '<link href=''http://fonts.googleapis.com/css?family=Alegreya+SC'' rel=''stylesheet'' type=''text/css''>'),
(3, 'Antic Slab', '<link href=''http://fonts.googleapis.com/css?family=Antic+Slab'' rel=''stylesheet'' type=''text/css''>'),
(4, 'Armata', '<link href=''http://fonts.googleapis.com/css?family=Armata'' rel=''stylesheet'' type=''text/css''>'),
(5, 'Audiowide', '<link href=''http://fonts.googleapis.com/css?family=Audiowide'' rel=''stylesheet'' type=''text/css''>'),
(6, 'Bad Script', '<link href=''http://fonts.googleapis.com/css?family=Bad+Script'' rel=''stylesheet'' type=''text/css''>'),
(7, 'Bigelow Rules', '<link href=''http://fonts.googleapis.com/css?family=Bigelow+Rules'' rel=''stylesheet'' type=''text/css''>'),
(8, 'Bubbler One', '<link href=''http://fonts.googleapis.com/css?family=Bubbler+One'' rel=''stylesheet'' type=''text/css''>'),
(9, 'Cabin Condensed', '<link href=''http://fonts.googleapis.com/css?family=Cabin+Condensed'' rel=''stylesheet'' type=''text/css''>'),
(10, 'Chela One', '<link href=''http://fonts.googleapis.com/css?family=Chela+One'' rel=''stylesheet'' type=''text/css''>'),
(11, 'Cinzel', '<link href=''http://fonts.googleapis.com/css?family=Cinzel'' rel=''stylesheet'' type=''text/css''>'),
(12, 'Crafty Girls', '<link href=''http://fonts.googleapis.com/css?family=Crafty+Girls'' rel=''stylesheet'' type=''text/css''>'),
(13, 'Croissant One', '<link href=''http://fonts.googleapis.com/css?family=Croissant+One'' rel=''stylesheet'' type=''text/css''>'),
(14, 'Denk One', '<link href=''http://fonts.googleapis.com/css?family=Denk+One'' rel=''stylesheet'' type=''text/css''>'),
(15, 'Diplomata', '<link href=''http://fonts.googleapis.com/css?family=Diplomata'' rel=''stylesheet'' type=''text/css''>'),
(16, 'Eagle Lake', '<link href=''http://fonts.googleapis.com/css?family=Eagle+Lake'' rel=''stylesheet'' type=''text/css''>'),
(17, 'Economica', '<link href=''http://fonts.googleapis.com/css?family=Economica'' rel=''stylesheet'' type=''text/css''>'),
(18, 'Engagement', '<link href=''http://fonts.googleapis.com/css?family=Engagement'' rel=''stylesheet'' type=''text/css''>'),
(19, 'Euphoria Script', '<link href=''http://fonts.googleapis.com/css?family=Euphoria+Script'' rel=''stylesheet'' type=''text/css''>'),
(20, 'Ewert', '<link href=''http://fonts.googleapis.com/css?family=Ewert'' rel=''stylesheet'' type=''text/css''>'),
(21, 'Expletus Sans', '<link href=''http://fonts.googleapis.com/css?family=Expletus+Sans'' rel=''stylesheet'' type=''text/css''>'),
(22, 'Fuana One', '<link href=''http://fonts.googleapis.com/css?family=Fauna+One'' rel=''stylesheet'' type=''text/css''>'),
(23, 'Finger Paint', '<link href=''http://fonts.googleapis.com/css?family=Finger+Paint'' rel=''stylesheet'' type=''text/css''>'),
(24, 'Flavors', '<link href=''http://fonts.googleapis.com/css?family=Flavors'' rel=''stylesheet'' type=''text/css''>'),
(25, 'Fresca', '<link href=''http://fonts.googleapis.com/css?family=Fresca'' rel=''stylesheet'' type=''text/css''>'),
(26, 'Frijole', '<link href=''http://fonts.googleapis.com/css?family=Frijole'' rel=''stylesheet'' type=''text/css''>'),
(27, 'Glass Antiqua', '<link href=''http://fonts.googleapis.com/css?family=Glass+Antiqua'' rel=''stylesheet'' type=''text/css''>'),
(28, 'Grand Hotel', '<link href=''http://fonts.googleapis.com/css?family=Grand+Hotel'' rel=''stylesheet'' type=''text/css''>'),
(29, 'Griffy', '<link href=''http://fonts.googleapis.com/css?family=Griffy'' rel=''stylesheet'' type=''text/css''>'),
(30, 'Hanalei Fill', '<link href=''http://fonts.googleapis.com/css?family=Hanalei+Fill'' rel=''stylesheet'' type=''text/css''>'),
(31, 'Happy Monkey', '<link href=''http://fonts.googleapis.com/css?family=Happy+Monkey'' rel=''stylesheet'' type=''text/css''>'),
(32, 'Headland One', '<link href=''http://fonts.googleapis.com/css?family=Headland+One'' rel=''stylesheet'' type=''text/css''>'),
(33, 'Henny Penny', '<link href=''http://fonts.googleapis.com/css?family=Henny+Penny'' rel=''stylesheet'' type=''text/css''>'),
(34, 'Im Fell Double Pice', '<link href=''http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica'' rel=''stylesheet'' type=''text/css''>'),
(35, 'Indie Flower', '<link href=''http://fonts.googleapis.com/css?family=Indie+Flower'' rel=''stylesheet'' type=''text/css''>'),
(36, 'Joti One', '<link href=''http://fonts.googleapis.com/css?family=Joti+One'' rel=''stylesheet'' type=''text/css''>'),
(37, 'Just Me Again Down Here', '<link href=''http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here'' rel=''stylesheet'' type=''text/css''>'),
(38, 'Kavoon', '<link href=''http://fonts.googleapis.com/css?family=Kavoon'' rel=''stylesheet'' type=''text/css''>'),
(39, 'Kranky', '<link href=''http://fonts.googleapis.com/css?family=Kranky'' rel=''stylesheet'' type=''text/css''>'),
(40, 'Ledger', '<link href=''http://fonts.googleapis.com/css?family=Ledger'' rel=''stylesheet'' type=''text/css''>'),
(41, 'Londrina Shadow', '<link href=''http://fonts.googleapis.com/css?family=Londrina+Shadow'' rel=''stylesheet'' type=''text/css''>'),
(42, 'Love Ya Like A  Sister', '<link href=''http://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister'' rel=''stylesheet'' type=''text/css''>'),
(43, 'Macondo', '<link href=''http://fonts.googleapis.com/css?family=Macondo'' rel=''stylesheet'' type=''text/css''>'),
(44, 'Maven Pro', '<link href=''http://fonts.googleapis.com/css?family=Maven+Pro'' rel=''stylesheet'' type=''text/css''>'),
(45, 'Merriweather', '<link href=''http://fonts.googleapis.com/css?family=Merriweather'' rel=''stylesheet'' type=''text/css''>'),
(46, 'Michroma', '<link href=''http://fonts.googleapis.com/css?family=Michroma'' rel=''stylesheet'' type=''text/css''>'),
(47, 'Mouse Memoris', '<link href=''http://fonts.googleapis.com/css?family=Mouse+Memoirs'' rel=''stylesheet'' type=''text/css''>'),
(48, 'Mrs sheppards', '<link href=''http://fonts.googleapis.com/css?family=Mrs+Sheppards'' rel=''stylesheet'' type=''text/css''>'),
(49, 'Norican', '<link href=''http://fonts.googleapis.com/css?family=Norican'' rel=''stylesheet'' type=''text/css''>'),
(50, 'Nosifer', '<link href=''http://fonts.googleapis.com/css?family=Nosifer'' rel=''stylesheet'' type=''text/css''>'),
(51, 'Parisienne', '<link href=''http://fonts.googleapis.com/css?family=Parisienne'' rel=''stylesheet'' type=''text/css''>'),
(52, 'Pathway Gothic One', '<link href=''http://fonts.googleapis.com/css?family=Pathway+Gothic+One'' rel=''stylesheet'' type=''text/css''>'),
(53, 'Playball', '<link href=''http://fonts.googleapis.com/css?family=Playball'' rel=''stylesheet'' type=''text/css''>'),
(54, 'Poller One', '<link href=''http://fonts.googleapis.com/css?family=Poller+One'' rel=''stylesheet'' type=''text/css''>'),
(55, 'Port Lligat Slab', '<link href=''http://fonts.googleapis.com/css?family=Port+Lligat+Slab'' rel=''stylesheet'' type=''text/css''>'),
(56, 'Quiteessential', '<link href=''http://fonts.googleapis.com/css?family=Quintessential'' rel=''stylesheet'' type=''text/css''>'),
(57, 'Rosario', '<link href=''http://fonts.googleapis.com/css?family=Rosario'' rel=''stylesheet'' type=''text/css''>'),
(58, 'Alex Brush', '<link href=''http://fonts.googleapis.com/css?family=Alex+Brush'' rel=''stylesheet'' type=''text/css''>'),
(59, 'Simonetta', '<link href=''http://fonts.googleapis.com/css?family=Simonetta'' rel=''stylesheet'' type=''text/css''>'),
(60, 'Sonsie One', '<link href=''http://fonts.googleapis.com/css?family=Sonsie+One'' rel=''stylesheet'' type=''text/css''>'),
(61, 'Spirax', '<link href=''http://fonts.googleapis.com/css?family=Spirax'' rel=''stylesheet'' type=''text/css''>'),
(62, 'Squada One', '<link href=''http://fonts.googleapis.com/css?family=Squada+One'' rel=''stylesheet'' type=''text/css''>'),
(63, 'Sunshiney', '<link href=''http://fonts.googleapis.com/css?family=Sunshiney'' rel=''stylesheet'' type=''text/css''>'),
(64, 'The Girl Next Door', '<link href=''http://fonts.googleapis.com/css?family=The+Girl+Next+Door'' rel=''stylesheet'' type=''text/css''>'),
(65, 'Voces', '<link href=''http://fonts.googleapis.com/css?family=Voces'' rel=''stylesheet'' type=''text/css''>'),
(66, 'Yesteryear', '<link href=''http://fonts.googleapis.com/css?family=Yesteryear'' rel=''stylesheet'' type=''text/css''>');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `memid` int(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`memid`),
  UNIQUE KEY `id` (`memid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `ID` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`ID`, `time`) VALUES
(100, '1380994863'),
(106, '1381160464'),
(106, '1381160498'),
(106, '1381160503'),
(106, '1381160518'),
(106, '1381160529'),
(106, '1381160532'),
(100, '1381160594'),
(100, '1381160823'),
(100, '1381168244'),
(107, '1381767816'),
(56, '1385909345'),
(0, '1387361359'),
(0, '1388344674'),
(0, '1388926049'),
(149, '1388926070'),
(149, '1388926077'),
(149, '1389014221'),
(150, '1389456370'),
(150, '1389801126'),
(150, '1389843890'),
(150, '1391097690'),
(150, '1392109371'),
(150, '1392109390'),
(150, '1392109426'),
(150, '1392109430'),
(150, '1392109434'),
(150, '1392109640'),
(150, '1399173884'),
(150, '1399173900'),
(150, '1400391812'),
(150, '1400391817'),
(150, '1400664931'),
(150, '1400696384'),
(150, '1401249035'),
(150, '1401356389'),
(150, '1401509798'),
(150, '1402028289'),
(150, '1402330687'),
(150, '1402330696'),
(150, '1402330703'),
(150, '1402330708'),
(150, '1402478700'),
(150, '1402547082'),
(150, '1403244489'),
(150, '1403510315'),
(150, '1403846328'),
(150, '1404319788'),
(150, '1404359132'),
(150, '1404359135'),
(150, '1404359145'),
(151, '1404359867'),
(150, '1404359997'),
(150, '1404369873'),
(150, '1404369876'),
(150, '1404369884'),
(162, '1404468425'),
(163, '1404468710'),
(164, '1404477070'),
(165, '1404479294'),
(166, '1404480025'),
(168, '1404480149'),
(169, '1404480242'),
(170, '1404480324'),
(171, '1404480510'),
(172, '1404480601'),
(173, '1404480740'),
(174, '1404480834'),
(175, '1404480934'),
(181, '1404482125'),
(183, '1404488359'),
(161, '1405280304'),
(150, '1406486840'),
(150, '1407434080'),
(150, '1409385829'),
(150, '1409385834'),
(150, '1409843168'),
(150, '1409843172'),
(150, '1409989377'),
(161, '1410047761'),
(150, '1412354158'),
(146, '1416539215'),
(150, '1417708597'),
(150, '1417708602'),
(150, '1418922772'),
(150, '1418964234'),
(150, '1418991616'),
(150, '1418991642'),
(150, '1418991651'),
(150, '1418991663'),
(150, '1419049026'),
(150, '1419347834'),
(150, '1419661078'),
(150, '1420198564'),
(150, '1420284910'),
(150, '1420568478'),
(150, '1422948735'),
(150, '1423021220'),
(150, '1423128762'),
(150, '1423200277'),
(146, '1428221065'),
(146, '1428221078'),
(146, '1428221095'),
(146, '1432656420'),
(146, '1432656429'),
(146, '1432656437'),
(146, '1436860527'),
(149, '1436860680'),
(149, '1436860689'),
(147, '1436860717'),
(147, '1436860723'),
(160, '1436861039'),
(161, '1436861044'),
(160, '1436861065'),
(149, '1436861080'),
(161, '1436861089'),
(150, '1438077461'),
(149, '1438077637'),
(149, '1438077646'),
(149, '1438077656');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `L2` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `date_of_benow` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mobileno` bigint(15) DEFAULT NULL,
  `privacy` varchar(3) NOT NULL DEFAULT '0_0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=205 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `name`, `L2`, `salt`, `date_of_benow`, `email`, `gender`, `mobileno`, `privacy`) VALUES
(50, 'bharatreddy', 'f302e9f435f7d1ae3c16264f8f1a91fa', '', 'Thursday 4th July 2013 09:28:10 am', 'bharatreddy@gmial.com', 'female', 89615252, '0_0'),
(51, 'fazilkhan', 'fc178ddce8cdf167be366ce0a97ce7ba', '', 'Saturday 6th July 2013 11:55:27 am', 'fazilkhan@gmail.com', 'female', 684512, '0_0'),
(52, 'lakshman', '601d30a958e6604df910330239ce7fcf', '', 'Thursday 11th July 2013 03:55:53 pm', 'lampsoo@gmial.com', 'male', 123456, '0_0'),
(53, 'vamsiyadav', '4e3914008c2a9437797278e016dd4eb0', '', 'Saturday 13th July 2013 04:21:21 am', 'vamsiyadav@gmail.com', 'male', 9494073073, '0_0'),
(54, 'himasagar', '25d55ad283aa400af464c76d713c07ad', '', 'Monday 15th July 2013 04:30:09 pm', 'himasagar.lampsoo@gmail.com', 'male', 9677262296, '0_0'),
(55, 'saideekshit', '627e1ccc37e8d0386be720026e90afe5', '', 'Tuesday 16th July 2013 03:36:31 am', 'saideekshit@94gmail.com', 'male', 8056195020, '0_0'),
(56, 'charanreddy', '33df8b58fa03f5c9c10911cdadd08262', '', 'Tuesday 16th July 2013 09:35:54 am', 'charanreddy@gmail.com', 'male', 7299122867, '0_0'),
(57, '''ganeshreddy''', '1cfa084198d2c7eecd3d4a5bbf448182', '', 'Saturday 3rd August 2013 08:19:53 pm', 'ganeshreddy@gmail.com', 'male', 87946512, '0_0'),
(58, 'krishnakanth', 'e4b9e1bba06ad7bbcf7affb493984aa0', '', 'Saturday 3rd August 2013 08:23:46 pm', 'krishnakanth@gmial.com', 'male', 8465484848, '0_0'),
(59, 'hemanth', '4d6777ed513dda4d99c3656847740aef', '', 'Monday 16th September 2013 06:55:48 pm', 'himasagar.lampsoo@gmail.com', 'male', 9440133703, '0_0'),
(60, 'hemanthmanan', '4d6777ed513dda4d99c3656847740aef', '', 'Monday 16th September 2013 06:57:50 pm', 'himasagar.lampsoo@gmail.com', 'male', 9440133703, '0_0'),
(65, 'satheeshs', 'ad5e9eda5793665edfe615f4826b5ca4', '', 'Tuesday 17th September 2013 01:42:33 pm', 'satheesh@gmail.com', 'male', 9440133703, '0_0'),
(66, 'satheesh', '446ad8918b282bfc087dbca6fff90323', '', 'Tuesday 17th September 2013 01:42:51 pm', 'satheesh@gmail.com', 'male', 9440133703, '0_0'),
(86, 'tataratanwadf', 'cf27c49ce7bfee59ec846d82fc72b35c', '', 'Tuesday 17th September 2013 03:29:08 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(87, 'tataratanwadf', 'cf27c49ce7bfee59ec846d82fc72b35c', '', 'Tuesday 17th September 2013 03:30:09 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(88, 'tataratanwadfg', '0d9a9c35bc54e6e4f412ca97ac8f433e', '', 'Tuesday 17th September 2013 03:31:50 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(89, 'tataratanwadfgh', 'bcdceb4374f5ec2314af4b52b7fc6bea', '', 'Tuesday 17th September 2013 03:32:21 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(90, 'tataratanwadfghh', '65ef959b29fdc0b985bf9f5081307753', '', 'Tuesday 17th September 2013 03:33:12 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(91, 'tataratanwadfghhyd', '25f9e794323b453885f5181f1b624d0b', '', 'Tuesday 17th September 2013 03:34:50 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(92, 'utfuyy', '', '', '', '', '', 0, '0_0'),
(93, 'ecrvtbynum', '0bdd1785a73fccb942c0ec24be636872d1a4f6f7a6bc00f9a2e1d3db14f2fcf95650d021b112b89960d9d5be85f515fac5bab321b5f07cb38fa28ec583c4074e', '9e5fd2b672b757bd1ecc1321ed144da2af9a3823e96de6be67ab90c789ccf3aca69b73fab2d190dda9338d3ac218f5206f61d6f85c811e9fcbcbab5929b32d22', 'Saturday 5th October 2013 12:49:43 pm', '', 'male', 8946561, '0_0'),
(94, 'ecrvtbynum', '27d1cea1c413b87ffe4c1cae6718ecdc4006a2a10bcff9eca3e46a4f72e013653a1413d5b1a67ea186cab912ffe81c2ca9561c4ee2d80f545235d059e0327d38', 'e0dff6cc67193ef8073a74c839ab3b13aac92b8cdd9147c9198b8c3a82c727c737a304e62cbcc6eed31f077cc20ab0d95c9dcb3a5fd2b4300a34c2b20352dca8', 'Saturday 5th October 2013 12:49:52 pm', '', 'male', 8946561, '0_0'),
(95, 'rdtfgyhuji', '042df02676851425bffbd6d74e907f71670b5ee80af2d45be4fd914c118f5aa75efb946f8e5b4baca735c7435aa39a9e3dea0b52afbd55e12e2bb6622f68b55e', 'e197af21be580ecddb54416432551f9e189663c8e8917bfe5c530f0520ce5a7e4321cae74ed6737a47fdf0c9565d24f4a32bbf12fb9200dacb74364251d76b17', 'Saturday 5th October 2013 01:42:02 pm', '', 'male', 8946561, '0_0'),
(96, 'rdtfgyhujir', 'db6d590952e18b3a422b72164be7ef127f044de7b80f51c75093928ee221742841312adbe0b6fc081b994b27d67d27c12bb670597c4b1ac6a47ed8b80ed664da', 'f94b9e5e6135d168450586fb135fdd9d5b580f37efa9e604617346d139abd60c7eb7df05649c54a61a4ec7085bcdf23ae2884ea7e8a4bb40f5d01b795ce82f3f', 'Saturday 5th October 2013 01:44:20 pm', '', 'male', 8946561, '0_0'),
(97, 'xcyvubunimo', '54318e544d5c6098711d94916bb7eb487709fb2d27c42e5fb42d78bb68bf6c3241089cd55ae334d81f5203b290be46045accd8ccc17cdf0b4a77fea63addc925', 'd045610954841627051ded16a391dd541a787808f2254e0af7bb08edefe50d291e2ee9dcd9914bec95a2a09f38505f7d3940fc36b386e83d238ceae75ebea32c', 'Saturday 5th October 2013 01:52:32 pm', '', 'male', 8946561, '0_0'),
(98, 'etfcygubhuj', 'e7e3564b8c6a6631c1487aa7e70be1c0882b3e9529330327fe4128fe4048bfd0a02a65e1f89a4d306862539ffb4c224e2f1a77d039a42fe151803a30c28d91b6', '224cab51e59ed462385a90240514d817b305dc46cde966ff37299109822b8f352a2ad30b3b1457381787bc4ac14ab7524d13666f63445bdfee8338ef62e3416d', 'Saturday 5th October 2013 01:53:34 pm', '', 'male', 8946561, '0_0'),
(99, 'crytvbyunio', '45d957a0717861e65a66e7bfe85fcef613296255d610d1dab9e36cf7161078362fbd9a73c5654e059bf0ea2a1059f625ef6acb1925d7536b71060e888829d4c3', 'fb41e511b68a1504a99c25e160466a7cdbf17b1e3a9fdc3deee8f100ae51bb88d96e363fb6c43af12dafd3acbbb8fd8d70e86dc60e91196d5ddb0a785444604c', 'Saturday 5th October 2013 01:55:37 pm', '', 'male', 8946561, '0_0'),
(100, 'jithanbabu', '4b021e2bc9acd7623b298f569daa4dd8637a733b3b36ad8cc45b7ae52e6dfa7ffde8e2698a45322416eefac5f88e007dfc0eaac1dae555bc613338fb1248456d', '8db890298db7c5fa1d22266dfa513d5bb6d3abb5c98856ced6dcbc79fe8c561deb4a48262655ff918025b19164da9035406c3de47a362137bb3d05591d35baae', 'Saturday 5th October 2013 04:58:22 pm', '', 'male', 8946561, '0_0'),
(101, 'shahjahanbasha', '3ac725f2867c4e58a46db40f24f4401477532af6392aa00bf5c676f8bb9c9d3bf0ecc6af8f6fe2844fa9d46953e7440eb31f86b03727028d35c662524d05427f', 'cb53c5ee2abbbbaff7711cb8459cc942c8d65e7c2775b0a2e5d592b5a38ad8e7459c8024287668276f1500e2df8ac8cedd06aa8a70ef4248240a809c5c278424', 'Sunday 6th October 2013 05:56:47 am', '', 'male', 68184546853, '0_0'),
(102, 'muthamil', '1fae1e5d11d165d23c5cb59b83c487a6059e594a60105ff7c53c02519fc46516f6396c8b1acce31103f4e6a725a0bf9d359e65ac7cbea310f5a51cd7236381a1', '02577c0f8a959f24afdea2f79549da98a7ed537430b9d3b480bf5d8cb94ef24507160f0f8952ef8a598c2f156a18359a763413142c65e71cce7ed5772dcf5039', 'Sunday 6th October 2013 06:01:46 am', '', 'male', 68184546853, '0_0'),
(103, 'thanseer', 'ae63931af90f739637ea62b4ebf5008f6be75507eecab6d9c04906d5ebf667c2053d11f97e9a07f55103367b2536d686f68530c8151662f8cbc2b0ff190318c1', '7236c97965d1889fd915617239235458d455513666e2c5dd4db90ae31ab269d33776d086f72effc2241ade69f9ade2e9a1e14718d1c093adb4b4eae2af902653', 'Sunday 6th October 2013 06:03:01 am', '', 'male', 68184546853, '0_0'),
(104, 'adtyashinde', 'bf56bf9c2e84d8ab061da6fe84ae8241be842b33e6ed386326d56e12ee97b9757a65a76202964c9fea574f247939ce71609219da3dc408fdd25f493540f592e3', '95bb57727b6752712d46aaf5ac50e60cec8a4a5b27f0e106feb6278f37f5d5dab55b892de9082e354b3ed443b9bd12c2ad2236edfeea313b57d80c7935bea39c', 'Sunday 6th October 2013 06:04:03 am', '', 'male', 68184546853, '0_0'),
(105, 'saxobeat', '3450cae484d9c019903cabeb759efa0638a920e4a9f480ee82e4a849c5856baab2e1671976443e51fcba45959046d63861cdcd64ca8ba12b7bacdcb8bd7519d2', 'a3886f4696ba6241944ec922939e7165fe36f9447c00f4da7ac681becdbcd048f03431623b23faf26d261e28d7ab20407b8958dcaf6fc550a3429b255cebb842', 'Sunday 6th October 2013 10:41:10 pm', '', 'male', 8946561, '0_0'),
(106, 'sagarbenjamin', '7323022401d4efaff66b5c6892376ff61f4d3590a8b3e197066915dc9ab2b2f7ce5592203a27d10c59cfef1108aea1592d4ff9ea55c4c4a8b7b80a7284ceb340', '16cd1e45205144521a88e1fd78c53d536d2ea8e40d56c9f86e509953dfe52bebb20e4dd69bf9d9b558b4e5acb0329891155f62021261fdfc9fd470e4f9eb73e5', 'Monday 7th October 2013 12:20:23 pm', '', 'male', 68184546853, '0_0'),
(107, 'hemanthkumar', '15c0f2b24e1e5f641eebd016ae693e1a', '', 'Monday 7th October 2013 01:55:03 pm', '', 'male', 963585586, '0_0'),
(108, 'krishnasree', '42283ac45f0de30a4fec5cf0358cd5ca7c6755bc6a27e3e2fb552a266865fdc346b06e5c9e6d41d180b5f4cd7c9ab9256b26957987b5634ba59c855116811994', '24fa4f86e3406f3162053d88fc8359e158d5390d9a9579df343e8ae8cd7468261ccd191e5475b4ef0f5191ad5d34fd79cf6ce0fbeb02df5b00b12513bcaa860d', 'Saturday 12th October 2013 04:20:06 am', '', 'male', 8465894684, '0_0'),
(109, 'krishnasree123', '76ac2dc1de9111d971a36a916351b3aa365b5fdbde18ecc38b27bed1f1e1438489d7cbcddf349e87b65b799b2015b193028cef6702dd5eedb9bbe7553acb35d4', '28821293d9f83279a39ff66ed097e5d7b2c151e539046d4c903bcf433b0756c326ce1a645058a57b5d680704331516ce49a03bba64c5cecd0f2b3ee9159af270', 'Saturday 12th October 2013 04:59:08 am', '', 'male', 78465148, '0_0'),
(110, 'abdulkalam', 'bb4e7c87384ea2de2851a7df183628bf2ce57cdde40753c16ce7cfe26668b00e3a8ec0ba4a72ea01e5136a681103268a031103dd24c2cfdf40e208c3fbe36cf6', '9d7b62277d0edbeb9ecf9ba9b877c2b7c8572bcc5ae6cd66d09384519405afdf2605dfc49f3ad8854698a67d3c4c1086a6620d8c6f1e012e36762de853d5c094', 'Saturday 12th October 2013 05:01:33 am', '', 'male', 4654894, '0_0'),
(111, 'krishnakanth1', '9e8a2d3a84b57b0d30492a217ca2de297a3d26c2a4f1d33d01d5fd4bb9b2856531a73fdb1210ccdce3539722fca227481c30afc292c4524c41e0d51d74411050', '4c3193e70114cce8b90d09218c30677cf5be7aa628d9ee9a95565991e042c57c6c69a1be0084e33048533f9bf2c10b9fbceeabbb5eb3f6b4cc303f70142304fa', 'Sunday 8th December 2013 05:09:20 am', '', 'male', 68184546853, '0_0'),
(112, 'krishnakanth2', 'b13525f0a1e1734c02e26239e24d3459b26eb396b6754b5a0a4092c4cb9b510be34aff7537b9bae7bfd1edfd72c00c1d40ebd87790b02daa3da19ec9532540c9', 'e76f484522f2a1a154663b085c4670e30ff8ba756c6595d94ab1a13426496a78bc9f1c59da5285bede893d90695e5e807d4432d619552d490c024a97dc2d1a2b', 'Sunday 8th December 2013 05:10:35 am', '', 'male', 68184546853, '0_0'),
(113, 'eminem', '6261e233f19ae2738c09a8cffc4cb3323cadd47836f449ace9597c912d009004df19674723dfb5fc9f5e6c05d610c2904c4c18430da8cee249001c169f33d135', 'c2002490f66d27ef9500ef70b645cac6e6b67093a11d843e256fc28466867d62a501dffeda0e040d4d41d7a411bd83b9637b1c269a0d92a05d0175f119ecad0f', 'Sunday 8th December 2013 05:11:44 am', '', 'male', 68184546853, '0_0'),
(114, 'chrisbrown', '910517001f415d929dc288c2d2a7159c004ce6815d0aa43dddbff931b8bc27671a6ba9e0cd62864f9e05f2d7ae55c5c6b2fd57139aaccb102679b3473f3f6342', '138642729f5fb0c04e896de2ed0c3c5f43aa08a0181deb4ecbaf42e7eceae750b2b2cd0c867b4b0f1cebcd8825ca997af83381d1641f3674825d960581287286', 'Sunday 8th December 2013 05:12:23 am', '', 'male', 68184546853, '0_0'),
(115, 'justin', '55111d889a9091fe9e8636c933bfcdd38efaee70ae536affd95271c41b2273e17fbd061623dbd15104d07e272d6f37d13c64df77e6610dfdbeeaebe8f08bf5ff', '518f2eafc716551424d1c7b09b034872c8e50b6f37d072ee2d4228a2c0fd7a247e14fae91a7ffdb1275fe2b6a6491908f1803aa71ad60b594f0f27693f163b11', 'Sunday 8th December 2013 05:13:23 am', '', 'male', 68184546853, '0_0'),
(116, 'justintimber', 'a6140ac5d836e57683ad9e56d47a7d7c763029b107fa25b698069b716cb3a69afd9adec208bce99a26f7f70f32aeb8e18ebb14784acc10560e655cb48bb3b731', '5343e3aad4c11d27463e9c93b3f0f17c6cc33ecb700bc769ed8fca4a83f7668cab440f7521413e8e9d26016ec2c6b0b12ae8395a1572d4ed829e38e74a3544fd', 'Sunday 8th December 2013 05:16:00 am', '', 'male', 68184546853, '0_0'),
(117, 'justintimbers', 'cefbbfc413a196dc0cc3a31db1fb51895fbb160bcbe92dbf2d5ae4440ea0cce7a1d641a1b0e8b2b2e24fef6e30b452fb8b97e2bae71243ee9e9d921b651cca5b', '56ad3f9acb62af4183910698874fd4cac466384f0175219e865f4ba84cec6f4dd8ab1067fa8fd05a88954bac1c1fe7525bcadf275f8b0ddef38558c28f19d5c6', 'Sunday 8th December 2013 05:17:04 am', '', 'male', 68184546853, '0_0'),
(118, 'justintimbersd', '450594a54e6ae8614c6c8a84b0a789f4dee41cbff0f83fb8e491d557e4313bb23a52a5fd43e6e8a1aa1f337f5050eba656abc886135f8b74062e22a1c455b2e3', '839e608ec751959a8dc708ac0795433e75196a35586b27cdee6ab057365085144671e56925e7ff60dc97af0154c8d5e998deb6568918e91065c077e088bd9510', 'Sunday 8th December 2013 05:18:35 am', '', 'male', 68184546853, '0_0'),
(119, 'justintimbersda', '3f5d88c3e2a14a5de34274d36a77af1b99f020f0e7e9865af8d217275890838ca5d21d6d13a4af6c1863bfd400931469af41adb812f03bd8270d98353708a869', '1a45bfb4dc3952851b02cd93e9f593c49209a4acf8be4dda0e992ffad2545af3acd16d33844056ec279228d7bc9f25d5660824741e72803c54bbd60fd940b843', 'Sunday 8th December 2013 05:19:17 am', '', 'male', 68184546853, '0_0'),
(120, 'justintimbersdaa', '150779887ae0c6451de8717daa6da4f16e7a2e9e90e748fe3725e566e9783134b337ff36d36a737010fd50f93d47d004af3213e192f9f87fa2dacc90f92916ff', '359d80d84f4ffa243ccf4acdc81ba90b49faa25240f007784e0d9a70055eb4bbc3b3b4bf8225805fe4ddf04ae4ece446c459f062d0a2f139420158f8f2b0fa37', 'Sunday 8th December 2013 05:19:32 am', '', 'male', 68184546853, '0_0'),
(121, 'justintimbersdaaa', 'f2c4e613726fa35694f1843154ef353f6590c3d9e08e215d51156d7d3d6ba530ccede27620eecf48f90715c4dbdb36e10911f0fb08d90a33da2e8ac5a4c42d9a', '5d11f0e2981d5dfa4a8bcfd14203d813917ef42612b2c0c1f0f8c822441950abcd30f7d89cb84a65fc22fbbab0890473232df5c97eb5cb945fccfe0aef46f46f', 'Sunday 8th December 2013 05:19:54 am', '', 'male', 68184546853, '0_0'),
(122, 'justintimbersdaaaa', 'b0ea1eac94d9a71cbcfe2aa437de088b5a6c4652f4e5cc7234488577720e5be59ff38631b6959d2648fb1e49503e544490aa84e32bc1ebda23cd681b92dc9995', '11ed40a4c816f9fa3d8efb33e189bc91832a7b2f8b28d1cd32c91ad64a10af3c549a3d748512542e01aa885a96a2681e1f400bdb53eef15f93dbe06613d8dac3', 'Sunday 8th December 2013 05:20:13 am', '', 'male', 68184546853, '0_0'),
(123, 'justintimbersdaaaaa', '7f1385add861ab3dd2773b049bab032e0841cd34d1dcbdff9d1cc3caa7c68c464442065288ce91e2667f06d18c62f61ce4514e462622939fa37091f883958e28', '3af47a1ab63cb7dfcfa65f7759be7fbaaa501b2b006c0b14c21f6c6c4ce7d00e40893bc0db8a5e3f3a81e3b45055ac0c3b4e94d900883748b47916c92c4aa7ed', 'Sunday 8th December 2013 05:22:06 am', '', 'male', 68184546853, '0_0'),
(124, 'justintimbersdaaaaaa', '6a2193ff2669dced596a25948143c1f7dc99a90e5064fbb5031bcfce035e54db7109fb3c00fb1d1f2f10b7ca80df11b4f7ecb16289e1ad7ca4929eb436ed1182', 'aa483d3e50dc83a0e0905db8d1fa63c6bd8ed3551dc66c43d19f29f70a649417bca027aef63647c3fea3419a43ab584e25c9bf4f244bcce9949a56a9d19efc5c', 'Sunday 8th December 2013 05:22:29 am', '', 'male', 68184546853, '0_0'),
(125, 'justintimberdaaaaaa', '7f5865214b4296d36af6acc68405e4d095e981a9437b9dea61e0f83c2aae7d2384293e11bf4ed4f3b2815dd2877ac4e66acce66d2767f5a6b7d663e499352b62', '36b40e3b4e9a77256045a71466197b913613b18451c199674ada46bfa941c4fe2d8a8de4179fa0e916631ef2670a99ed7becb0a8f5a29c0fe8665a4aafd3de2e', 'Sunday 8th December 2013 05:23:12 am', '', 'male', 68184546853, '0_0'),
(126, 'justintberdaaaaaa', '4da48d442202503c6869c21363ff5f2ccd6326492e226639f95f72ae45a90ad6827d6b4268dfa236e8ef964c0a489ac55ba57b0d7b044675483d2d72561b1cb2', '08b441c78e21ef92ed1918c51ecfe1e155fbb9ecd19ce2de16dc6c2e911bfa14928695052791abc93784b316d76df4333cc9b8376620080d7813e2f9ced47340', 'Sunday 8th December 2013 05:24:28 am', '', 'male', 68184546853, '0_0'),
(127, 'justintberaaaaaa', '4a662d79e22f2cbf1960734b60ef317430875f157eed53728fa28cbd20f71ed4fc8959def2fb37e83df0c4ac3a078208b8abe4343d9dbf43e61d53ac3c75d874', '55c55788c5a5284ac6a0980e67945f7b7b652d457ba6b103506ff7b0b99bfe7cce39c6fac3a4a4dbec255e1af2368726e45803ba85ae090046c83f772d0ce57e', 'Sunday 8th December 2013 05:24:52 am', '', 'male', 68184546853, '0_0'),
(128, 'justintbweraaaaaa', 'e59eb2d56565556abe53c8c473fb19078853ce3ae5c1d3ef59134a43102c25a9dae9f579eeae3315b249e77161b5393e6c96f99b8156477c264eebeaccb523e1', '2abbd1094e3b35501145844d9e3b8d99a3916c383b9845755c1818dd172e9fb05a324451a0d3a0b870dbc52e6f3fb25efee3209eee3c0022ec5d9b93a5a5bfab', 'Sunday 8th December 2013 05:25:54 am', '', 'male', 68184546853, '0_0'),
(129, 'justintbwweraaaaaa', 'ffad070b7c7348c3280522446280ff0c6de1dd3f3e34fb11857c6d28a9ec247299d470e22327da6274e87a6353aaa56c880bcc82b57f50bb443cd21a7a7b7c54', '36f158d75395d87a28353bf295abb2d37439f09e469307022b7ea3669caa4b65705492e3ac8e10fbe3b100caf86529371d3e802c4f4969291c9ea40123261ac4', 'Sunday 8th December 2013 05:29:18 am', '', 'male', 68184546853, '0_0'),
(130, 'vvvinayak', '45a8f3c9b36f5ab7eb4c7d9469adf5f4d207416e5a60b31afed6c1fc08a6524780cc5b9abdca1983819ff813f79ca3663bcf4e2017f6f254aa24e4820636b127', '090fe2006500ee3000c6ecea6d5882c2679166004ea4455b09e981e4c0c1618e90ba594f1a2f2939af7f5162a2be4000fc9120b72fcff5a20b45c9615441f34d', 'Sunday 8th December 2013 06:21:04 am', '', 'male', 68184546853, '0_0'),
(131, 'renuka', '6a57a1ecdb14a101a1de47da6b2b0b83bfd8d907a825fbebb3c83627a53aa74849e0ed6579ffa72904bb8e6ee8e7ecd97417510c913717c50af5e48d9a9d8ad8', '5e9161cf5a589fe7b37bb4c54326b77397f99ef624ab6aa3b16bb79ecdad9e41678e9e45ddd5cd2362ef8e2a21abc53e2ae854b17dd661673ae4458536f56e70', 'Thursday 12th December 2013 06:49:10 pm', '', 'female', 68184546853, '0_0'),
(132, 'farooqali', 'e007de63e1406fdb22e1760833c7ffe41b4b2e358c8a5d0473d0f04fbd3026b796e273d011abf64882c9ed9e0e786e1f3ca9ac6d87b31843b5d807b9fa782f00', '7b1c1a408d446e5bc0b7f8fa335958fd098321b9b0e192402a081a7c9a46c0c305dbf555bf7b2b99522507e76c022f76667435964cfca29255e4b3fe77d30409', 'Sunday 29th December 2013 06:50:18 am', '', 'male', 6454165416, '0_0'),
(133, 'imrankhan', '624c4c498f2695f7f33f2b1130748a7401c54c48330a12aa97d63b71a51ea76e9edb95d61c269e7e9d99f9dc7fad53eb1bc7f6082829ba241e8376534ca476b8', '23a7100cebfa3365d520af666eb9dba5e6123f83b7772e6a0208aa9bd9e1299cf959f513e7701ebed4326f397e60b9add6bc87f1dcb457e714322f81fc14c99c', 'Sunday 29th December 2013 12:43:56 pm', '', 'male', 6454165416, '0_0'),
(134, 'imrankhans', 'cdc3763f548975826f6de4215aafa60d1fe93cf5fbdf0752b943aa45c531be913bbce67e659ba60156df94ec02661af65c4b423145522c963da7b509f5fd6c6d', 'f63ca8cd8b9ea34ed1d718dc449875ee3cf8f8c573ddcab830eaca4011d7a2e37eca8b41db82022bff7f9c56839a2c19f48849ad977b3ba9c235d02affac7d98', 'Sunday 29th December 2013 12:44:31 pm', '', 'male', 6454165416, '0_0'),
(135, 'imrankhanss', '9cc04cc839e304681291d819f88a75a2d93c968c326d9658a6db9a7d76dbedd8b804d6e57aea714daba7a8e2f727229b4bd6a19f574a13fb8db94bf22eb9f950', '5090aaf75aadfe044664ad5fcdb5a009d0db66c30970f40ba091d8842f59717cbaad63f103e7f454040ffc1cffdb6bd2a9bd1767708775e6f9ae61209221c5cc', 'Sunday 29th December 2013 12:45:15 pm', '', 'male', 6454165416, '0_0'),
(136, 'anirudh', '75bc2ed9a30fecb2be3589f2b9798f674485c487c7d5653e42985b05c8fcda129150a50b654551ba1a3bdb204050ac7e777f53280c1965aa5e8ae4a701eee444', '9058789dc12b89c7c84fa7c1db710c0ca554a111bfaf310995928c0a6f01dadf20e855bae391534ac186239a69dbb049cad159304d6c1a463fba037ca40a735e', 'Sunday 29th December 2013 12:48:55 pm', '', 'male', 6454165416, '0_0'),
(137, 'anirudha', '4a5f3b97217d1f4579704972f1eabdec3273d27f6809c22df5be531524a48a3b2a3b59ed3663655351671874be13652ab89e4272fc699b6606102fea1eb762ab', 'e36f02a0fe480755f04b21fd82d5114d91140c8b76886162d5ffbee8c6266a0f6248800903eaaa736e133b76c17508eb7eb7fe0f67a395522275c58159bd5c85', 'Sunday 29th December 2013 12:49:45 pm', '', 'male', 6454165416, '0_0'),
(138, 'anirudham', '06c3d9fa209f2360c836867031321c3250403092d7fcefd2132500f51cbabab8f29454af878fab7dc774a1292a597f3af4d4f2d23bf11c1df343705bcf9ba032', 'b6194617db2d1eb2d013c3e46b6aa877cc13ec2cb96e71543200de7540a88898a9e341b63c4569139a1e09ee8bd85436fe767f5170ed710605216459f16d1dc7', 'Sunday 29th December 2013 12:51:23 pm', '', 'male', 6454165416, '0_0'),
(139, 'anirudhamk', '2c82ff28c742b705a40141cd25cb7805664929bbac9cc962f3b0607b5daa77b9564c238f6e06b0822a282b6456b74b251c9f4fc011429cebd457a4050c6b0a9e', '3c747c1b646dc015fd83119eb7a5914595fc3b7069339e4d4ca848677beb6d6d3623a16d691f72e7e5009375c1a4bf7a288a2e77779f1bf8c95560fe38f9d821', 'Sunday 29th December 2013 12:52:44 pm', '', 'male', 6454165416, '0_0'),
(140, 'anirudhamks', '324d9bc8635dec87165884741507439eb87e655d0f2650b19b66eb6e752beabafaff8ed9ecdc115b23a6d38dca30062e8aea7af5e7bec7f168853b1691d3a063', 'ca53d4145edd83a9e5c4e34911010bc00a5936d744acbdac4cbe9f28a5ade550f79d2f6db1e6dfa6f8e3a49c1df6698eb9b2d3345ccda336587899bed049a946', 'Sunday 29th December 2013 12:53:55 pm', '', 'male', 6454165416, '0_0'),
(141, 'anirudhamkss', '54f063c935cf7f631d66d7f8fa5dc132efdce11059f251f78715c6284f2b4e03ee98537f65f9d3453c71270938578b4f5e2f83ef89fef163541be3dd97ff8e51', '1796da527c826893c46e2b139720ec2eaa2cedc133edc6f9a485674cf3b8bf0dffe7b2740d4095d36a8e540d28875ee6cf45aa8fb2ae67b264019d0396ebd206', 'Sunday 29th December 2013 12:54:25 pm', '', 'male', 6454165416, '0_0'),
(142, 'vamsiyadavb', '3569eb3b048e0ecde21f12e773bd4cc5c20134e06b3188d72fe0d9ad415d0d7b20480677e1369ce465ec647889d226ccaf734e359e5f50668d2852d80a7d2317', 'faf0de81014d1d9eefb05901d3ab33b27240c0be5666f6f392fc40bac6ddc238e2c6e8f7578c8b3bcde35203d13c05290e72fe6af0c8b44af84159948ab54692', 'Sunday 29th December 2013 07:37:59 pm', '', 'male', 3213424, '0_0'),
(143, 'vamsiyadavba', 'dbe6b9fe50798ce2b2e14909dd883547d8b499b0adbcf82870c1dcb920c6f6e744ce5f1348d6157e3e6bbc89dc3beae48349ed487531c5f689b7c6c6beea58cb', '0da13bd4b55ca2e2ce184f8cc3ca7f043fe3256603ab030896dfc4bd2cfb6a44d140341ab1cc9036e9e06163a2ae96808689dd69d29d275f364cc438bd3d8a91', 'Sunday 29th December 2013 07:39:25 pm', '', 'male', 3213424, '0_0'),
(144, 'mananhemanth', '5ee32b89890a72b208426eea56e5b41f8e550bc998231b336eccb0ac5f4c032bc8b26e79639ce520a48a89fa0e1cb0f7664f0f0330d86ab709d388a7fd89791f', 'f7745d5b10c22256356250704be80dcb560c05184301155da439211bfe44b0e64a79137aa5670433922faa849b5cdb788f7661dd91b3f5697cbb8b326e38261e', 'Sunday 5th January 2014 09:33:57 am', '', 'male', 6546465465, '0_0'),
(145, 'mananhema', 'eedbc26611cf20fefa8114a2eea0feaaa13301d9bf5d17bd218d616cde1847ccecd35041e8d93a7ae934a8ba57f758c9c273db44604ca563d1db38249b363121', '7a2fc68b215e65277a1294533d61e3801c02dda8f2529c3211fadc5ee907c40440cd71db7159761e05f102ef010e619e8d55e34f64261cca66478a86092fbe33', 'Sunday 5th January 2014 09:36:05 am', 'mananhemanth@gmail.com', 'male', 6546465465, '0_0'),
(146, 'haree', '2d1fcdfea994f2911f2cfcb55bf478097b2da9db46a2da47dde62b1a116086f1e769109fa9d6314453265ebdfa2527a4c2d6398dd3d4c52ea22845fa3d104063', 'b5fce3e618e291165ea98346b23f7e1a60dcabb9eefc13e00f3e82efe60df448ff2d4e5553bb124576b32b673c8a0591e52da5905c10ed9d1f580c8d5f427833', 'Sunday 5th January 2014 09:49:25 am', 'haareeeee@gmail.com', 'male', 54548548, '0_0'),
(147, 'haree', '40631128196d0e15881a5ff2fb8a679324eedb87ad025ca54f1a85ff7779776d646356c75f7d52498edb58cbb5ca217c5250731a6a74c0cc2e1c91fb9533d885', '41c58727f2fe811a1a93217a8f8c3c7ac2e5896b98b56d5b2b7ace1576a542b7e248b4a07c2e19c76af925111f38a6ccf2a6ce82bcc187b21fb3d9f4eaf39962', 'Sunday 5th January 2014 09:50:20 am', 'haareeeecce@gmail.com', 'male', 54548548, '0_0'),
(148, 'haree', '4e710e25a0f8335e2d6c2da3283762d6225c36a4f179e6f4fe9d9755ddfdeb28bab949594622b0554316b500999378a883c843ca2c3aef4fbd25aab8ac8544e8', '72dd552eef35f2916b797093563a0e5f461bbe046b53066d770e3552d3f9e800c0816b2c3ff32a534a59cb9478701b4f0c9b6a98175b42ce37f8664c1fb05251', 'Sunday 5th January 2014 09:52:30 am', 'haareeecce@gmail.com', 'male', 54548548, '0_0'),
(149, 'haree krishna', '56208d7a4ac25e5e2544131af9664273b8cfe126f42d7a6a2a46e750655603eacbebc0ef09b1fe1b29ee3af323717fee5a87aeb984e13d76639f7782855a07ea', 'da45deec6cbf18bc0ec7311d0c1690e977ffe09d1b3a174dc6c906a2f6940425058963b8583994de24b9ede6ea26df8449d24bfe6d1d69821a030833a62d8549', 'Sunday 5th January 2014 09:53:00 am', 'haaeeecce@gmail.com', 'male', 54548548, '0_0'),
(150, 'haree krishna', '5a9d74fdaaf34f9ecea9d0a2611c9b49e82ed57535561fffc7e14e4b70e7d63eea6e030229d4fe25ec1695d8b3bff9d97cfb4a1de1a694c339ac6aeffecdc86b', 'b1963023bfd52bcad4081b8ba64e11fdcc7bf39da985d388b5475417482714230c013b4c6cb28eed40687c258afc9eded1aa9b5432b877f12b4a58e9d3efe75e', 'Sunday 5th January 2014 11:05:47 am', 'shake@gmail.com', 'male', 9492552218, '0_1'),
(151, 'baby', '56284e594bb94462c875afa87bdc506d8d7448fac171afecaa8ef48994f7e95688f3c6f01151adc73ad3f27e369e0ea9bdf77c076d4197bf908f7a0b738c971b', '99f31c9caf5636484b97a158c72575f539c85ef86c3bd7b62f865858e1b03f69f54d8d7d3a0146b52b9133ef2503509f1a762f9827929dfae84e614ec9d0380d', 'Thursday 19th June 2014 06:51:46 am', 'sunny@gmail.com', 'male', 68184546853, '0_0'),
(152, 'james bond', '83d97594a0352d72a75afc5d55bd8805b57c6673e12cfa16c08b0bc08f0ab8ddaa6f6ccd4b6e2ed459a68b460ea6f09ca74f4ff0cb90b4950c39672fd213a149', 'd952e081e74f3c02c7fbbf0992e1e34ac18986db787c65b646780773b3f71e238225d7bebf1c80ca12cbf623f9e0573f155ced07ce3111fd3b789679a9af2530', 'Thursday 3rd July 2014 04:28:42 pm', 'hari@gmial.com', 'male', 0, '0_0'),
(153, 'james bond', '91aadeea27fda9b740a03a580ba0ec09e5cb5146f6d6e2f9b0452d90d12aadbc3cb02329cc8597d4ca468a07057ffc36977079d61c9c8752a923f0b6a32ce975', '4cfa6fdb9d9e5e9ac872f2fe41be39ea1721936bf9e32081e4e87e17d3d5f22f83f501bff6522cff58e86e6f3d757694fca8fbf1f8e4dae809d0a16ec5c4e622', 'Thursday 3rd July 2014 04:30:45 pm', '', 'male', 0, '0_0'),
(154, 'james bond', 'b150c6775aa431ef59357b18eae9248d343d71e96f5697de1a35e0ac7d7adc41bb8dca1ad7766d808b988199a840bf925f37689b9a89420cfe5fdef8ffe74e18', '1942cd45f0c1e1d4add98c56198f73257704400e2a82fdd0950698e498dbd7bdf4fa5c63eb3e4079c01a957bc39848b55898b56fe975aade8f4cd40f473434c0', 'Thursday 3rd July 2014 04:46:45 pm', '', 'male', 0, '0_0'),
(155, 'james bond', '5de0c0b66d96bfd979e8c70e5df7c022f0409c49d32e1e121216e303261ba4a3d431238d8664bf806adc8a73ea2a2da7f15de7c42fa526fbd9ecf357dbecb338', 'f545cbdc065b03c5d35bc731416d0c553ab1147cf34827e79cb025362ccade14a22d65485f2efb367f541f3c719612da9e8e8db706dc186e5873c65e8ef3a6ae', 'Thursday 3rd July 2014 04:46:49 pm', '', 'male', 0, '0_0'),
(156, 'james bond', 'd4cbd2c2aedd55a907393a200157b579aaba08870a81c59ad5e9b32dc84445b083501691b599039abbb3c3c1c2e56f3f8aea219a05d894b4a2c48cfe49ebf6c6', '6ed10e1d0f7dac23246054cd9e8595c79792fe5e65d31b2c2e9ae3c235bd259aeb672fb3175f7bd87a3cb06a3cb9f8500f7f4679fd5889d111f5c2d263897ae2', 'Thursday 3rd July 2014 04:47:37 pm', '', 'male', 0, '0_0'),
(157, 'shake mom', '7cc7d312b1622c7855dc7f3bbf3c540e34f1f4a06924411bfd3e97ba8f42bd12e65b2e4bfb2bd148fc2c4f447d0180e1bedf9003302b276263b923e6de6ead91', 'a3a2df3886220a10c3e7f2ad02fb1e4131e3aa0077fcec28df60f23969292e2bff46eed8dfab54dd8680ab2099891569451829fca434d1aabd5a856a39be4b6f', 'Friday 4th July 2014 04:47:01 am', 'haareee@auhs', 'male', 0, '0_0'),
(158, 'fa zil', '5baaa3f2f69fdced79f610a75312f9bde7a035553bc6ba4c498edf470008eb4334d50fbab95560b9d8a18691fcc72ae848a3797cbe75538ad43d01a0313ad08d', '8c5a09db0a14457eb0f335be991c4442c3654b88daa7e9e4e8edaf1f0382fcdfefb03b419ec13fb639291d37feb6a73be9c147f8a0b0c6aed5cb8d171d434ad5', 'Friday 4th July 2014 05:05:49 am', 'hari@gmial.com', 'male', 0, '0_0'),
(159, 'f zil', '188a794f0a26ed849fa010920cf10f18f1fa58eb48277fc656c1658917cd2c96a2650d8c8e95dff1e3974418546dfff51570dd8ae30d342b493ceaa8139cdb8b', '9dcaac7eab5be41b7e17d025ac758273d48a40293b239732ef83f8bc8a32e9e09c360dce7338c3ab536b5394431147b35cd3b201ea45b25d4625e4217fd2b6be', 'Friday 4th July 2014 05:06:36 am', 'abgskbakjb@jas.com', 'male', 0, '0_0'),
(160, 'asasasa asasasass', 'c63ffb2375eb3790ec7dc5973bb9af2d4b483cb90337c64f4d579d38dd42cd07ed7d6a7a01dd90edd68d54cfb9c3dfdec293c749d99f21a604d6b623102e7612', 'f51e1cf5ad577ad0a8fb477cddc2d7dc1c210f0b7185fe70d0b7f55f16c8f097580169b0f20f8da897da4e4a36dedb6143ccaa148152076f0642986ef2234145', 'Friday 4th July 2014 07:13:57 am', 'hareee@gmail.com', 'male', 0, '0_0'),
(161, 'shakemom ', 'aae21dfe9875cf1a148f0389f8b7394633ade7e3b811a7e223d67d25f5e31a5af132e403e2ebf181cc71a8ea9b409e8da701305ffe40340874aaaebcd3afc595', '9e6dbacfe155220cf735bfada29db1b14673261de057ea564245627bab8bea2f891a46cd513d9356ab2491ceb6a6134dbd50b2473a36a3ed7566bec96725f877', 'Friday 4th July 2014 10:02:43 am', 'shakemom@gmail.com', 'male', 0, '0_0'),
(162, 'momshake ', '5176cdc61b8bab2c321ca6ffd0e4fbc07ba941d6494c267d83f29a94abf88ae4fe19a1f9d788024a9020a50443835ab28c3d7e880d2c9d2117b49d255f1a5ba8', '40ffeb59e4f132bcd3968aebbe6ed7fa7c7f32418f3aa5a81c08331e26f6ed5945ac862dad2ebac1ad0d39710ef60827be200dd2167507ecbe6be9dd6edf3d6f', 'Friday 4th July 2014 10:07:05 am', 'momshake@gmail.com', 'male', 0, '0_0'),
(163, 'james bond', 'd839e12939b67de075a23b50d129612b70ec48a129165a4832b18d52be28b025f19b945c6ec42c55f9b9251bfadc88954be625e486a10359f80de0b00d98d0a7', 'e3bcf2b6be9be77584ea622ace141ee227c558bca77dc5010344d7e22ca39698d2f38444b2e3265029d38cee3d1558fcd0a0d896dedd15d7a1837f1ccd5aae39', 'Friday 4th July 2014 10:11:50 am', 'jamesbond@gmail.com', 'male', 0, '0_0'),
(164, 'james camaroon', '534b8d65d24d94cddccded4a830631779df452f0d6a1f2d41a7ca68949fe7b09d10f62edf43131dc9532d6633c525c9eebf2ebe59968bde21480cec23b7b8f72', '54ab6be687c33f9de1ab90304480d4fe7a7692f8575cd510f2c0067374bb95992c0eb602f9b1c7f059256e9f98a8fc3ebd9fd45b7c89b0655c634a59e66719b9', 'Friday 4th July 2014 12:31:10 pm', 'sachin@gmail.com', 'female', 0, '0_0'),
(165, 'sehwag ', '9c09ead76c6fb2e491463b34530c4032ba55cbb0d1b29287bf895afece30e639b9e2d74836a43947394d7022ee3bec071aa224bc510c67bc9290b9a28c1c41ca', '65719b863e8a27d70bc1e35b504d7bd317d41ebaeaca4e1a652d43aab6e76c9694cd44db3cee73f553c975e533cd2b7444b087e1c31e45434a8495e710afbb64', 'Friday 4th July 2014 01:08:14 pm', 'sehwag@gmail.com', 'male', 0, '0_0'),
(166, 'yuvraj ', '1abdab4502c82fc1d82cd678a00806baa8365a071db9a1d840d51474976507e64e6f686d2bea119ea153d4a7a49e0959f73be3ca77c93c2f68bd5de58fe40ae1', '5404cd54a4492a3a320151600da9fc8bdd408f626d5e9acf6b4a59a3efd669787fa951631f222b601f3df126c2891224074983560a6a9ffb2fece02ea138f3f8', 'Friday 4th July 2014 01:20:25 pm', 'yuvraj@gmail.com', 'male', 0, '0_0'),
(167, 'yuvraj a', '6d7be7dda6b772c5de7a7bf5f785a494de09f0f70334089a60cad3e861af47fa3b173a8585d6029acab9f13f86869d6417ca774c19f15c22283279f50d6741e7', '1a00c576c0ec0658c92b11936cd3ab19d58ae79122a74a10bb58f04559b34e1f45f5ba1f92f92f4a073f865c1adc98c4aae373d8229f393a065418d6694eea68', 'Friday 4th July 2014 01:21:35 pm', 'yuvraj@gmail.com', 'male', 0, '0_0'),
(168, 'yuvraj aa', '35ad679e3f5c9135783f0fe302fe77bf5ce008817548f34018aefa0640bfe5bc9b5295ebcbc37aa4ae0d50c5041a64f081896f7790ab9cfcb38f4615a1bca76f', 'c42ab478f72979ddf1ff1a9c201350a20923a291134ff75a823b5164ed48a6c83383e63eba6961444ff3eceb333c8e0f6d22f716d0c94565471ef8130608e566', 'Friday 4th July 2014 01:22:29 pm', 'yuvraja@gmail.com', 'male', 0, '0_0'),
(169, 'yuvraj aaa', '400143d56df762985a173a11e5fd5d9f5d7085707f3678868acf0e86241a9849fb794f74128a1d94aeb01cf5566e2c994d6345cfd68498c03aed252c4c9ca296', 'f1ac97ed27f5260a59a19fc24275450ba490c401f6f6414ac969914d4339e04a7aff4c1a42a145c1e848b3b6b5ab9d72b0c947622468c26cd709e3dab5eede5e', 'Friday 4th July 2014 01:24:02 pm', 'yuvraj@yahoo.com', 'male', 0, '0_0'),
(170, 'gayle ', '394cb7d4b1dd5152b7d326b6687f40f286d5c5bbfbca44b5dd37f1abd961431ecc63f50586a2ed8129513f332928f21d50f8b66c764514f5d7f24a9e99e166fe', '253a3c2b860c59f8d2d73d8e0138f09483580495ffa8891ae39348a074b3cd36f6a98c69010de72aeefae1a095613559e4a35e34c643ef4951a91aa01a5b0489', 'Friday 4th July 2014 01:25:24 pm', 'gayle@gmail.com', 'male', 0, '0_0'),
(171, 'divillers ', '5405df23e2c32da775c5f790d3ae9d89be8000872996c3ba78b033ac2ff62d5c9d7a95812e3d7ffc6b5f2622ec56ec9c89911b7c303f27f4dbfe8f4e85f998e9', 'd890e57d59f98b08cb0617321f5f5e4aad4e3ab7760cb229e915d202d213e55c5faa84e46908cd11c502b0b0459054ab13f4904ac5f0b2a5d4188b5fd63ba05a', 'Friday 4th July 2014 01:28:30 pm', 'divillers@gmail.com', 'male', 0, '0_0'),
(172, 'divillersa ', '1e0724ed816327b3e4b9dcca7d17a0529f2a0bf7999a87708ec1787d74169ad99a1c30cab8ba9bff1cfe9da1a34b8170a842289dfc562a2ce4be820f4019f334', 'cbf0149101590e8d51de3464d8ffec23d6fba461da6d91b4599a7e269ea1d28ead5ca858ca54fc6315714c12763ea5bd062ca5540eaa71750b5db847b1ee3a78', 'Friday 4th July 2014 01:30:01 pm', 'divillersa@gmail.com', 'male', 0, '0_0'),
(173, 'balaji ', 'fc2c2f5be3bdad2f7c131b984991a00f59049ee76b42b679383cd1381b21d39bc3fa545559330188eea5bd83b391e1144d1e88a3eea3fd7706d0e8e9d75a5051', '658118d5b64b28bb394dbf61d337bdc9fd078e83d9bb917c42a2d19a067be7a55d2fd87847e9ba0ad5ef4b2c6e79e5b62b194df00341125d7626644471871b02', 'Friday 4th July 2014 01:32:20 pm', 'balaji@gmail.com', 'male', 0, '0_0'),
(174, 'stephen ', 'b761888154f0a1048ba4cf887e694a8cc909d5635f74b05b17fcb49746a79e4ed04856629ee125da01b9510403acd99a422509b2b5c110025a5e1328657fb708', '081f59df1e8d4f6df186988606479dbafbd9a61c7fcbb83102115e141e91a5e0fd30deed4a559efc6cadffeb89ccb7aa1bf85648e8ccae2a01f93f2f652d1393', 'Friday 4th July 2014 01:33:54 pm', 'stephen@gmail.com', 'male', 0, '0_0'),
(175, 'female ', '762778d6e348937481c1a0f11c0cf10f114368d5a192b815b0d3dfccef5ba037ea36f5fc4514a669183fedf96d12a7e1ebf8d3ab64f6a45ede2a988aea5fe3bb', 'fdb77474bd981fc75fe890f7aca0a7dd541a9c9458438ce0311c33cabc1fa2d554d3494cf5030686416aabbad6000224e1b6c971f8345b6954559f7d680a6dd8', 'Friday 4th July 2014 01:35:34 pm', 'female@gmail.com', 'male', 0, '0_0'),
(176, 'femalea ', '135bf0aaf0abeae57ba5899e3bd1bd4a12a589fc1f923608b879ab22a60fe9e301ee64c2760ee2bb8a6bfb4365353c04ca589c0503eea7348cf1543eaa8c390b', '634d543e44d417ea5e7573294916becd9a2105563669bf302db7e9ec9b9937cde47726523e9eb18b74c8b8d81f5d806dee40be5bda351579dfe43cdcb664b47f', 'Friday 4th July 2014 01:36:29 pm', 'female@gmail.com', 'male', 0, '0_0'),
(177, 'femaleaa ', 'd5b6ca2b7a40331b5c8216a902d2f5d2ae9d058d0fad08d6c10bc1d768150131816be66f82fb12d5aa995c83adfc0132abff629ec07f212d3027d667fc1d404c', '2d16cc501e0654f9a9c6cd92cf59a115ad15a49ff80da9b5ed055a08df7beffa5b5a8a2494d632bf19b26197d787c4a25dcbbbde84134af3257ca39f172cd87b', 'Friday 4th July 2014 01:37:41 pm', 'female@gmail.com', 'male', 0, '0_0'),
(178, 'femaleaas ', 'ca8d673b44cb1559ac4a8a1b59301a2b765f19876808fa4ba1527eafbab4552fa491964380288af2ea92eedd2614f1a2d0404b19790e1a27f5f2c207d202e25a', '048beef9ce0e2fa84498c5cdde825c8239875e19df8c0abbc07ce12a709460e5bed0d394a6f38cb3a1aa490744c65def513d8677618758bc864f910d3fa34dd3', 'Friday 4th July 2014 01:38:31 pm', 'female@gmail.com', 'male', 0, '0_0'),
(179, 'femaleaasa ', 'e3ab4b77c9163faece89f948ca90371d597fce83c1bb769bfcfd21933b5f8ff9cfa4aaf58941a9f638ec6444b6eaee75c4875816fa00353a9f0f85329f92b259', '4c3b059ae6f01fe0dfa0c0f9e87b9d8ccf666263add411f85db501d91e60d9a0714630f582c907211793dbbe35729c70a208f6f03ef249eb933ed819536dd34e', 'Friday 4th July 2014 01:45:51 pm', 'female@gmail.com', 'male', 0, '0_0'),
(180, 'femaleaasaq ', '7d9d1465dafdecdc67ddb4df00b6f03a5ac6e79bc5623e7cc589643694e8d97e0f3edab5d84e73dc49e07e95a6a38a5ba21206c692c3c3ac5015a0c62c03ebcb', '690d4ecff16b53e8437c4fea4566b2c0ec0c7e4447f76e37b6187408f5eb5aff77df2e3b076dc3c1f1aa717b3e3a362e851fb2b8617f82a98d7769f4bd642ee5', 'Friday 4th July 2014 01:48:38 pm', 'female@gmail.com', 'male', 0, '0_0'),
(181, 'beyonce ', '4adaa1d6455d561d082144d47cc651a79290f2235325aeb744d2369b6b71e5f2d46f823c95b8fbee3e080ab76e526645cd3d5a7beff737e2ec51231755db38ff', '6af7e6a80bb84740d2941d58cd56f75990547d21764aa5c381cea625994b418fce0213b13f7579ee25450fc92593ca23f94df191d53cb4b8c1cc5d4a67e71a25', 'Friday 4th July 2014 01:55:25 pm', 'beyonce@gmial.com', 'male', 0, '0_0'),
(182, 'beyoncea ', '5d65ce89c8ca9d64b798666eb5b847b95b41073c0d4e7cf012a3c6f036408940b110a44e96619ac1d32807328626da0e4ba03d1da0cc1fe7bdf1c7e46cbfd5c8', '70311528ef0cd60f9f5f5509222809e4aed13903f7f3e73900e7dd0d95e8141ab942c700cb34b8079031c7b7e973e6070f8313bea8b525faad88ad53ce002b7e', 'Friday 4th July 2014 03:29:29 pm', 'beyonce@gmial.com', 'male', 0, '0_0'),
(183, 'mental ', '1722481afc8be7d0dca443b0277e41e0a1ab75f553d670521b937a6d72604417bd6b71fa99707cd3b2f9a465a327b925e33ba099465838e96eb5619a5f4d9d14', '8632f1120c02e1c82accdfdd2f4c08f99ccac38a1188b9020275e8e041ff569d5a789677f2a76a3af55fe43d57d02f87c2079c17cc020283e6c3e9f3f1e5fe07', 'Friday 4th July 2014 03:39:19 pm', 'mental@gmail.com', 'male', 0, '0_0'),
(184, 'mentalx ', '7a93fb7b393c674f0afbee8a081708ba37beb80c1be07f370bf086cc966123c83075fea2f90bf5403c5767408d855ee35d86df0c0d8c46048b89feac0a3ecd1f', 'e773d86d4262c3994064ad30febe9df5bba1949035ce9f5e59d0c5eae3444974b01129def3f609e7c86e04772f3320dc295e979fb1253f91f72edfb18f1bee82', 'Friday 4th July 2014 03:44:11 pm', 'mental@gmail.com', 'female', 0, '0_0'),
(185, 'mentalxa ', 'b2c6d254460d6c9e29578fdff2eb29a803c703db8be2b0f77632279a1151020dd15d551306234e521759dd4d5a24473f9ce93322b31b7aac12013580b8678f1a', '8ad296b10fc45d521e708a552f1040665901aacb83b2792f5413179f451997b0819415120b2aedc3f3df60b956f0c1c1d2ece98bdaabdfed288881faf4b4e015', 'Friday 4th July 2014 03:45:06 pm', 'mental@gmail.coma', 'female', 0, '0_0'),
(186, 'mentalxasa ', '11b54b89ce68163607b1f6f47e0211053e53c2547f7a539d6cbe8865985a6d3937e584a42b1d81dc7a31f582b6ce5bd55970dd93379f5ce36bb4a46b1ab31d89', '43c4d16355af74d51b1bdbafbe30b026e71cf225ef1d9d742f0a6aecf2c1571e8827fc39a92447243f8869c93dc59b2287cc1110db02baaf391c150438f12439', 'Friday 4th July 2014 03:47:17 pm', 'ahsva@as.com', 'female', 0, '0_0'),
(187, 'msnarayana ', 'cbb5b936b1c638debfbbe845e0952bca5f20395d3ec432f91294b9024a0400990c321a4632bc450a1276f09ce470e2e0732196ab78a798f2629afda316355695', 'e5fc7e14763282d80dc9462b02bf813b0d02c3e9d0f61950dbb77a4ddedc85ab6700e2b9dbb8eacb2d3b9c2f1217773e9a3a47f6b478d97296977fd3484ced95', 'Friday 4th July 2014 03:52:42 pm', 'hari@gmial.com', 'male', 0, '0_0'),
(188, 'shakem ', 'ebac2ff5fdda6de566faece1104dccbacbf63a845f68216cba72dc412c3923cb8a78c3c7c3c53e145dc41e7f9bd82028ae41a675af7cca36a4d14eac5996dafc', '71887f70824b26f71ac3d948e78cbd9a5054ea2046ab482285218a13a3fababa2415f3c354036e5da59e4ea0ad28579e6fcf039023508875af19b25d32f19ed9', 'Friday 4th July 2014 03:53:20 pm', 'abgskbakjb@jas.com', 'male', 0, '0_0'),
(189, 'asasasas s', 'adbf1d7034bfad84ff7637763f5290e73c41a254dbdb9a8bdcaacdae0abc7d90be8f910a1c17efea781ae349ffb3a9a40fb6fc6f07eea3035d7f071e8dfe3700', 'f0ff5eed1cff7e591dfd21d6c7113e15ce05329a149e32769eda5ee5285699e942cbfb837a29637ce721bfded6edf668c6c3bf3fe040df41fc9f487aebbb5a7c', 'Friday 4th July 2014 04:05:56 pm', 'zen@gmail.com', 'male', 0, '0_0'),
(190, 'asasas ', '4ded054e785545dfed774d309642d453ad545ee12da03653b72e0c5be32e5c83fec1f635339461041fe6e21b49e639b9b269ab769a041dd723c617416abb696c', 'e711e2784363e97159423e40284a8dc6486deb1aa807ff1995389ed3859a8dc198301414781fb2a785388a003c3b8428e62195120ff76726682a85f07034eeaa', 'Friday 4th July 2014 04:11:11 pm', 'zen@gmail.com', 'male', 0, '0_0'),
(191, 'asasass ', 'b8e9436585ff27fe1914133c49fa785c36ebb930e9540e5adb7cd60d94cbb57797831239955f9212b8132099fece9bc3bb25e1a343e13aeeae00afd709dcd497', 'ae833c5229e821944d03768974fddf09020010123bd89a7a490b1ee70e188bc36bac9e4e00fb88e355e8e49e5997c2abde88095e71a16aa2fbdf65d413367159', 'Friday 4th July 2014 04:12:50 pm', 'as@asa.com', 'male', 0, '0_0'),
(192, 'asasas s', '056eb9f6a8c75c99b5f0bed58059e629e91bc4e0e125bdcf54157328f530cfd1e0769a7f9459476dff9e155c8fb13f6bd7fdb8cd6864688a9c8b8aa782c325e1', 'af898db1b642ed0ab3aae4964af61f9e9b0cd379f8ecc78d3d925e9b4f2a5a6a36e0d124ffa9d4a0cdffeb669c92d49025d2bcb086ae64ef67bf2ef399701d18', 'Friday 4th July 2014 04:15:03 pm', 'sasa@as.com', 'male', 0, '0_0'),
(193, 'da vinci', '31695569eb646d0ad76c197bfc563fd1ad24cde397d0e7441355c2df2e1896c3ada523d6a7284a3abeaf7aad740f9cf52cca5722cb0432505963812f7935318b', '445ed9ddd1fefc4b9cc653f27529b1bdf5af393f93b17f84eb822b215fa3c0bec707adab5b3e72de4f3d5bb73858723c7e048b91779cb70e2d37bc7ed076f701', 'Friday 4th July 2014 04:16:04 pm', 'davinci@gmail.com', 'male', 0, '0_0'),
(195, 'hari', 'as', 'a', '', '', '', 25932, '0_0'),
(196, 'as', 'as', 'as', 'as', '', 'male', 12121, '0_0'),
(197, 'as', 'as', 'as', 'as', 'as', 'as', 1212, '0_0'),
(198, '$name', '', '', '', '', '', 0, '0_0'),
(199, 'bharath', '', '', '', 'bittu@gmail.com', '', 0, '0_0'),
(200, 'sd', '', '', '', '0', '', 0, '0_0'),
(201, 'yu', '', '', '', '', '', NULL, '0_0'),
(202, 'e', '', '', '', '', '', NULL, '0_0'),
(203, 'd', '', '', '', '', '', NULL, '0_0'),
(204, 'anjali', '', '', '', '', '', NULL, '0_0');

-- --------------------------------------------------------

--
-- Table structure for table `meminfo`
--

CREATE TABLE IF NOT EXISTS `meminfo` (
  `ID` smallint(11) unsigned NOT NULL,
  `bday` date NOT NULL,
  `status` varchar(150) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `wrappers` varchar(1000) NOT NULL,
  `avatars` varchar(5000) NOT NULL,
  `tumb_realavatar` text NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `signno` int(255) DEFAULT NULL,
  `sign` varchar(10) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meminfo`
--

INSERT INTO `meminfo` (`ID`, `bday`, `status`, `city`, `wrappers`, `avatars`, `tumb_realavatar`, `country`, `signno`, `sign`) VALUES
(0, '0000-00-00', NULL, NULL, '', '', '', NULL, NULL, NULL),
(56, '0000-00-00', NULL, NULL, '', '', '0', NULL, NULL, NULL),
(91, '0000-00-00', NULL, NULL, '', '', '0', NULL, NULL, NULL),
(92, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(133, '0000-00-00', '', '', '', '', '0', NULL, NULL, NULL),
(134, '0000-00-00', '', '', '', '', '0', NULL, NULL, NULL),
(135, '0000-00-00', '', '', '', '', '0', NULL, NULL, NULL),
(136, '0000-00-00', '', '', '', '', '0', NULL, NULL, NULL),
(137, '0000-00-00', '', '', '', '', '0', NULL, NULL, NULL),
(138, '0000-00-00', '', '', '', '', '0', NULL, NULL, NULL),
(139, '0000-00-00', '', '', '', '', '0', NULL, NULL, NULL),
(140, '0000-00-00', '', '', '', '', '0', NULL, NULL, NULL),
(141, '0000-00-00', '', '', '', '', '0', NULL, NULL, NULL),
(142, '0000-00-00', '', '', '', 'YToxOntpOjA7czoyOiIwMCI7fQ==', '0', NULL, NULL, NULL),
(143, '0000-00-00', '', '', '', 'a:3:{i:0;s:2:"00";i:1;s:18:"143_1388346159.jpg";i:2;s:18:"143_1388346174.jpg";}', '0', NULL, NULL, NULL),
(144, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0', NULL, NULL, NULL),
(145, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0', NULL, NULL, NULL),
(146, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0', NULL, NULL, NULL),
(147, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0', NULL, NULL, NULL),
(148, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0', NULL, NULL, NULL),
(149, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0', NULL, NULL, NULL),
(150, '0000-00-00', 'hiiii', '', '../../data/userprofile/avatar/150/wrap_150.jpg', 'a:8:{i:0;s:18:"150_1418493497.jpg";i:1;s:18:"150_1418493551.jpg";i:2;s:18:"150_1418493597.jpg";i:3;s:18:"150_1418493695.jpg";i:4;s:18:"150_1418493730.jpg";i:5;s:18:"150_1418493752.jpg";i:6;s:18:"150_1418493916.jpg";i:7;s:18:"150_1420571519.jpg";}', '../../data/userprofile/avatar/150/tumb150_1420571519.jpg', NULL, NULL, NULL),
(151, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(152, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(157, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(159, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(160, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(161, '0000-00-00', '', '', '../../data/userprofile/avatar/161shakemom /wrap_161.jpg', 'a:4:{i:0;s:2:"00";i:1;s:18:"161_1405280341.jpg";i:2;s:18:"161_1405280364.jpg";i:3;s:18:"161_1418983093.jpg";}', '', NULL, NULL, NULL),
(162, '0000-00-00', '', '', '../../data/userprofile/avatar/162momshake /wrap_162.jpg', 'a:3:{i:0;s:18:"162_1419000110.jpg";i:1;s:18:"162_1419000120.jpg";i:2;s:18:"162_1419001655.jpg";}', '0', NULL, NULL, NULL),
(163, '0000-00-00', '', '', '', 'a:2:{i:0;s:2:"00";i:1;s:18:"163_1419001814.jpg";}', '0', NULL, NULL, NULL),
(164, '0000-00-00', 'body the back', '', '../../data/userprofile/avatar/164sachin a/wrap_164.jpg', 'a:3:{i:0;s:2:"00";i:1;s:18:"164_1404477147.jpg";i:2;s:18:"164_1404477163.jpg";}', '../../data/userprofile/avatar/164sachin a/tumb164_1404477163.jpg', NULL, NULL, NULL),
(165, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(166, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(168, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(169, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(170, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(171, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(172, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(173, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(174, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(175, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(181, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(183, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(185, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(186, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(189, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(191, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(192, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '', NULL, NULL, NULL),
(193, '0000-00-00', '', '', '', 'a:2:{i:0;s:2:"00";i:1;s:18:"193_1404490573.jpg";}', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `ID` mediumint(8) unsigned NOT NULL,
  `topic_points` smallint(5) unsigned NOT NULL,
  `res_points` smallint(5) unsigned NOT NULL,
  `cres_points` smallint(5) unsigned NOT NULL,
  `total_points` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `u_ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`ID`, `topic_points`, `res_points`, `cres_points`, `total_points`) VALUES
(1, 2, 0, 0, 0),
(2, 2, 0, 0, 0),
(92, 0, 0, 0, 0),
(129, 2, 0, 0, 0),
(130, 2, 0, 0, 0),
(131, 0, 0, 0, 0),
(132, 0, 0, 0, 0),
(138, 0, 0, 0, 0),
(139, 0, 0, 0, 0),
(140, 0, 0, 0, 0),
(141, 0, 0, 0, 0),
(142, 0, 0, 0, 0),
(143, 0, 0, 0, 0),
(144, 0, 0, 0, 0),
(145, 0, 0, 0, 0),
(146, 0, 0, 0, 0),
(147, 0, 0, 0, 0),
(148, 0, 0, 0, 0),
(149, 0, 0, 0, 0),
(150, 0, 0, 0, 0),
(151, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE IF NOT EXISTS `responses` (
  `RES_ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ID` mediumint(8) unsigned NOT NULL,
  `TOPIC_ID` mediumint(5) unsigned NOT NULL,
  `response` text NOT NULL,
  `date_of_response` int(10) unsigned NOT NULL,
  `datares` tinytext,
  PRIMARY KEY (`RES_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`RES_ID`, `ID`, `TOPIC_ID`, `response`, `date_of_response`, `datares`) VALUES
(59, 150, 79, 'YES YES YES !!', 1420089688, NULL),
(60, 150, 80, 'seriously im waiting for this movie . i am a big fan of bin laden the way he damald the twin towers!', 1420093524, NULL),
(61, 164, 148, 'he can ge beaten', 1420123370, NULL),
(62, 150, 156, 'Well thats from Enigma2.', 1420194324, NULL),
(63, 164, 157, 'ONthe chair please', 1420195149, NULL),
(64, 164, 156, 'ican get ', 1420196158, NULL),
(65, 150, 157, 'through', 1420196249, NULL),
(66, 150, 82, 'bunty', 1420204791, NULL),
(67, 150, 156, 'if the logic of good inductive arguments is to be of any real value, the measure of support it articulates should meet the following condition', 1420568982, NULL),
(68, 150, 166, 'ttfu', 1420726983, NULL),
(79, 150, 165, 'lol', 1422952151, NULL),
(80, 150, 156, 'get', 1422952162, NULL),
(81, 150, 164, 'flop', 1422952323, NULL),
(82, 150, 156, 'meet', 1422952333, NULL),
(83, 150, 156, 'turn up', 1422952378, NULL),
(84, 150, 164, 'kill', 1422952393, NULL),
(85, 150, 165, 'bornn', 1422952419, NULL),
(86, 150, 164, 'hello', 1438092327, NULL),
(87, 150, 165, 'lol', 1438092687, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `TOPIC_ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ID` smallint(5) unsigned NOT NULL,
  `ROOM_ID` int(1) NOT NULL DEFAULT '1',
  `CORNER_ID` int(11) NOT NULL,
  `topictitle` tinytext NOT NULL,
  `topic` mediumtext,
  `date_of_topic` int(15) NOT NULL,
  `data` varchar(100) DEFAULT NULL,
  `likers` text,
  `dislikers` text,
  PRIMARY KEY (`TOPIC_ID`),
  UNIQUE KEY `TOPIC_ID` (`TOPIC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`TOPIC_ID`, `ID`, `ROOM_ID`, `CORNER_ID`, `topictitle`, `topic`, `date_of_topic`, `data`, `likers`, `dislikers`) VALUES
(2, 150, 0, 0, 'illan', 'hari', 1417511425, '../../data/topics/1/2/1_2_150_1417511425.jpg', NULL, NULL),
(3, 150, 0, 0, 'haree', 'krishna', 1417511506, '../../data/topics/1/3/1_3_150_1417511506.jpg', NULL, NULL),
(4, 150, 0, 0, '', '', 1417511531, '', NULL, NULL),
(5, 150, 0, 0, '', '', 1417511531, '', NULL, NULL),
(6, 150, 0, 0, '', '', 1417511894, '', NULL, NULL),
(7, 150, 0, 0, '', '', 1417512036, '', NULL, NULL),
(8, 150, 0, 0, '', '', 1417512159, '', NULL, NULL),
(9, 150, 0, 0, '', '', 1417512199, '', NULL, NULL),
(10, 150, 0, 0, '', '', 1417512350, '', NULL, NULL),
(11, 150, 0, 0, '', '', 1417512389, '', NULL, NULL),
(12, 150, 0, 0, '', '', 1417512403, '', NULL, NULL),
(13, 150, 0, 0, 'maji', 'fa', 1417512771, '../../data/topics/1/13/1_13_150_1417512771.jpg', NULL, NULL),
(14, 150, 0, 0, '', '', 1417512783, '', NULL, NULL),
(15, 150, 0, 0, 'illan', 'surya', 1417512963, '../../data/topics/1/15/1_15_150_1417512963.jpg', NULL, NULL),
(16, 150, 0, 0, 'asi', 'aoish', 1417512981, '', NULL, NULL),
(17, 150, 0, 0, 'asi', 'aoish', 1417512985, '../../data/topics/1/17/1_17_150_1417512985.jpg', NULL, NULL),
(18, 150, 0, 0, 'asi', 'aoish', 1417512985, '../../data/topics/1/18/1_18_150_1417512985.jpg', NULL, NULL),
(19, 150, 0, 0, 'illan', 'oih', 1417513008, '../../data/topics/1/19/1_19_150_1417513008.jpg', NULL, NULL),
(20, 150, 0, 0, '', '', 1417513046, '', NULL, NULL),
(21, 150, 0, 0, 'ua', 'i', 1417513261, '', NULL, NULL),
(22, 150, 0, 0, 'ua', 'i', 1417513270, '', NULL, NULL),
(23, 150, 0, 0, 'ua', 'i', 1417513275, '../../data/topics/1/23/1_23_150_1417513275.jpg', NULL, NULL),
(24, 150, 0, 0, 'j', 'in', 1417513288, '', NULL, NULL),
(25, 150, 0, 0, 'lias', 'lihas', 1417513356, '../../data/topics/1/25/1_25_150_1417513356.jpg', NULL, NULL),
(26, 150, 0, 0, '', '', 1417513363, '', NULL, NULL),
(27, 150, 0, 0, '', '', 1417513377, '', NULL, NULL),
(28, 150, 0, 0, 'aisn', 'ias', 1417513401, '', NULL, NULL),
(29, 150, 0, 0, 'aisn', 'ias', 1417513410, '', NULL, NULL),
(30, 150, 0, 0, 'aisn', 'ias', 1417513416, '../../data/topics/1/30/1_30_150_1417513416.jpg', NULL, NULL),
(31, 150, 0, 0, 'aisn', 'ias', 1417513416, '../../data/topics/1/31/1_31_150_1417513416.jpg', NULL, NULL),
(32, 150, 0, 0, '', '', 1417513424, '', NULL, NULL),
(33, 150, 0, 0, '', '', 1417513424, '', NULL, NULL),
(34, 150, 0, 0, '', '', 1417513437, '', NULL, NULL),
(35, 150, 0, 0, '', '', 1417513437, '', NULL, NULL),
(36, 150, 0, 0, 'iaoas', '', 1417513858, '', NULL, NULL),
(37, 150, 0, 0, 'iaoas', 'oias', 1417513869, '', NULL, NULL),
(38, 150, 0, 0, 'iaoas', 'oias', 1417513869, '', NULL, NULL),
(39, 150, 0, 0, 'iaoas', 'oias', 1417513876, '', NULL, NULL),
(40, 150, 0, 0, 'iaoas', 'oias', 1417513876, '', NULL, NULL),
(41, 150, 0, 0, 'iaoas', 'oias', 1417513882, '../../data/topics/1/41/1_41_150_1417513882.jpg', NULL, NULL),
(42, 150, 0, 0, 'iaoas', 'oias', 1417513882, '../../data/topics/1/42/1_42_150_1417513882.jpg', NULL, NULL),
(43, 150, 0, 0, 'iaoas', 'oias', 1417513882, '../../data/topics/1/43/1_43_150_1417513882.jpg', NULL, NULL),
(44, 150, 0, 0, 'a', '', 1417513946, '', NULL, NULL),
(45, 150, 0, 0, 'as', '', 1417513968, '', NULL, NULL),
(46, 150, 0, 0, 'as', 'ois', 1417514018, '', NULL, NULL),
(47, 150, 0, 0, 'as', '', 1417514024, '', NULL, NULL),
(48, 150, 0, 0, 'as', '', 1417514025, '', NULL, NULL),
(49, 150, 0, 0, 'as', '', 1417514031, '../../data/topics/1/49/1_49_150_1417514031.jpg', NULL, NULL),
(50, 150, 0, 0, '', '', 1417514123, '', NULL, NULL),
(51, 150, 0, 0, 'kj', '', 1417514127, '', NULL, NULL),
(52, 150, 0, 0, 'kj', '', 1417514129, '', NULL, NULL),
(53, 150, 0, 0, 'kj', '', 1417514135, '../../data/topics/1/53/1_53_150_1417514135.jpg', NULL, NULL),
(54, 150, 0, 0, 'as', 'askjb', 1417515074, '', NULL, NULL),
(55, 150, 0, 0, 'k', 'kj', 1417515260, '../../data/topics/1/55/1_55_150_1417515260.jpg', NULL, NULL),
(56, 150, 0, 0, '', '', 1417515271, '', NULL, NULL),
(57, 150, 0, 0, 'ais', 'lails', 1417518532, '../../data/topics/1/57/1_57_150_1417518532.jpg', NULL, NULL),
(58, 150, 0, 0, '', '', 1417518540, '', NULL, NULL),
(59, 150, 0, 0, '', '', 1417518586, '', NULL, NULL),
(60, 150, 0, 0, 'ila', 'KBA', 1417518630, '../../data/topics/1/60/1_60_150_1417518630.jpg', NULL, NULL),
(61, 150, 0, 0, '', '', 1417518633, '', NULL, NULL),
(62, 150, 0, 0, 'lika', 'lo', 1417518703, '../../data/topics/1/62/1_62_150_1417518703.jpg', NULL, NULL),
(63, 150, 0, 0, '', '', 1417518711, '', NULL, NULL),
(64, 150, 0, 0, '', '', 1417518822, NULL, NULL, NULL),
(65, 150, 0, 0, 'asiok', 'lkA', 1417518976, '../../data/topics/1/65/1_65_150_1417518976.jpg', NULL, NULL),
(66, 150, 0, 0, '', '', 1417518985, NULL, NULL, NULL),
(67, 150, 0, 0, 'oiw', 'ij', 1417519054, NULL, NULL, NULL),
(68, 150, 0, 0, 'oiw', 'ij', 1417519056, NULL, NULL, NULL),
(69, 150, 0, 0, 'oiw', 'ij', 1417519056, NULL, NULL, NULL),
(70, 150, 0, 0, 'oiw', 'ij', 1417520157, NULL, NULL, NULL),
(71, 150, 0, 0, 'oiw', 'ij', 1417520157, NULL, NULL, NULL),
(72, 150, 0, 0, 'oiw', 'ij', 1417520157, NULL, NULL, NULL),
(73, 150, 0, 0, 'as', 'asoi', 1417520182, NULL, NULL, NULL),
(74, 150, 0, 0, 'as', 'asoi', 1417520184, NULL, NULL, NULL),
(75, 150, 0, 0, 'as', 'asoi', 1417520184, NULL, NULL, NULL),
(76, 150, 0, 0, 'is', 'o', 1417520199, NULL, NULL, NULL),
(77, 150, 0, 0, 'ails', 'oi', 1417520226, NULL, NULL, NULL),
(78, 150, 0, 0, 'o', 'k', 1417520304, NULL, NULL, NULL),
(148, 164, 5, 0, 'photoshohp tfz', 'aero effect. put ars and slap . but i know onr thing may be i love u one day one day wont ithink i kick you they call me superman', 1420123006, '../../data/topics/5/148/5_148_164_1420123006.jpg', 'a:1:{i:0;s:3:"164";}', ''),
(156, 150, 1, 100, 'principles of lust  in tree', 'The inductive logic is a system of evidential support that extends deductive logic to less-than-certain inferences. For valid deductive arguments the premises logically entail the conclusion, where the entailment means that the truth of the premises provides a guarantee of the truth of the conclusion. Similarly, in a good inductive argument the premises should provide some degree of support for the conclusion, where such support means that the truth of the premises indicates with some degree of strength that the conclusion is true. Presumably, if the logic of good inductive arguments is to be of any real value, the measure of support it articulates should meet the following condition:', 1420187959, '../../data/topics/1/156/1_156_150_1420187959.jpg', 'a:0:{}', 'a:1:{i:0;s:3:"150";}'),
(158, 164, 1, 0, 'pray the lord', 'kish', 1420194930, '../../data/topics/1/158/1_158_164_1420194930.jpg', NULL, NULL),
(159, 164, 1, 100, 'Inductive logic', 'Unable to connect to the Internet<br /> <br /> Google Chrome canâ€™t display the webpage because your computer isnâ€™t connected to the Internet.<br /> <br /> Details', 1420196325, NULL, NULL, NULL),
(164, 150, 1, 0, 'tickle', 'clock', 1420281254, '../../data/topics/1/164/1_164_150_1420281254.jpg', NULL, NULL),
(165, 150, 1, 0, 'illan', 'copyright@ epicLOL.com', 1420281345, '../../data/topics/1/165/1_165_150_1420281345.png', NULL, NULL);
--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `corner`
--

CREATE TABLE IF NOT EXISTS `corner` (
  `CORNER_ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ADMIN_ID` smallint(5) unsigned NOT NULL,
  `ROOM_ID` int(2) NOT NULL DEFAULT '1',
  `corner_name` char(20) NOT NULL,
  `description` char(50) NOT NULL,
  `data` char(50) NOT NULL,
  `topic_id` text NOT NULL,
  `followers` text NOT NULL,
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`CORNER_ID`),
  UNIQUE KEY `corner_name` (`corner_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `corner`
--

INSERT INTO `corner` (`CORNER_ID`, `ADMIN_ID`, `ROOM_ID`, `corner_name`, `description`, `data`, `topic_id`, `followers`, `time`) VALUES
(1, 150, 1, 'iu', '.', '../../data/corner/11_150.jpg', '', '', 0),
(6, 150, 1, 'oi', 'kk', '../../data/corner/66_150.jpg', '', '', 0),
(10, 150, 1, 'po', 'ou', '../../data/corners/1010_150.jpg', '', '', 0),
(11, 150, 1, 'ii', 'o', '../../data/corners/11/11_150.jpg', '', '', 0),
(13, 150, 1, 'oh', 'oiu', '../../data/corners/13/13_150.jpg', '', '', 1417805792),
(14, 150, 1, 'ipl', 'gves he information', '../../data/corners/14/14_150.jpg', '', '', 1417833537),
(18, 150, 1, 'lk', 'k', '../../data/corners/18/18_150.jpg', '', '', 1417837348),
(19, 150, 1, 'illan', 'lok', '../../data/corners/19/19_150.jpg', '', '', 1417837428),
(20, 150, 1, 'cricket', 'live status about cricket', '../../data/corners/20/20_150.jpg', '', '', 1417837469),
(21, 150, 1, 'honey', 'nike', '../../data/corners/21/21_150.jpg', '', '', 1417837557),
(22, 150, 1, 'il', 'i', '../../data/corners/22/22_150.jpg', '', '', 1417837620),
(24, 150, 1, 'i', 'k', '../../data/corners/24/24_150.jpg', '', '', 1417837679),
(32, 150, 1, 'football', 'nik', '../../data/corners/32/32_150.jpg', '', '', 1417924739);

-- --------------------------------------------------------

--
-- Table structure for table `counterresponse`
--

CREATE TABLE IF NOT EXISTS `counterresponse` (
  `CRES_ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `RES_ID` mediumint(8) unsigned NOT NULL,
  `cresponse` tinytext NOT NULL,
  `name` varchar(20) NOT NULL,
  `ID` smallint(5) unsigned NOT NULL,
  `date_of_cresponse` varchar(50) NOT NULL,
  PRIMARY KEY (`CRES_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `counterresponse`
--

INSERT INTO `counterresponse` (`CRES_ID`, `RES_ID`, `cresponse`, `name`, `ID`, `date_of_cresponse`) VALUES
(3, 49, 'i like it!!', 'bharatreddy', 52, '2011-07-13 00:00:00'),
(4, 48, 'hey!!\r\n', 'bharatreddy', 53, '2011-07-13 00:00:00'),
(5, 48, 'hi!!!!', 'bharatreddy', 50, '2011-07-13 00:00:00'),
(6, 49, 'me 2!!', 'bharatreddy', 51, '2011-07-13 00:00:00'),
(7, 50, 'is it!\r\n', 'bharatreddy', 52, '2011-07-13 00:00:00'),
(8, 48, 'endi ra!!', 'lakshman', 52, '2011-07-13 00:00:00'),
(9, 48, 'nee bonda ra!\r\n', 'bharatreddy', 53, '2012-07-13 00:00:00'),
(10, 209, 'ooh!! u  mean hi..im mental! kk!!', 'bharatreddy', 54, '2012-07-13 00:00:00'),
(11, 212, 'really dude!', 'bharatreddy', 52, '2012-07-13 00:00:00'),
(12, 217, 'in my home..', 'lakshman', 55, '0000-00-00 00:00:00'),
(13, 217, 'ooh!', 'lakshman', 53, '0000-00-00 00:00:00'),
(14, 223, 'ya..  mee too know dat..', 'lakshman', 53, '0000-00-00 00:00:00'),
(15, 223, 'hahaha..', 'lakshman', 53, '0000-00-00 00:00:00'),
(16, 162, 're kuthe!', 'lakshman', 53, '2012-07-13 19:42:00'),
(17, 232, 'ha', 'fazilkhan', 53, '2013-07-13 02:05:00'),
(18, 163, 'hi macha...', 'fazilkhan', 53, '2013-07-13 02:21:00'),
(19, 233, 'same 2 u!!', 'fazilkhan', 57, '2013-07-13 02:36:00'),
(20, 244, 'endi ra!!!', 'bharatreddy', 54, '2014-07-13 09:52:00'),
(21, 244, 'avna macha??', 'himasagar', 56, '2015-07-13 16:32:00'),
(22, 247, 'em ra...', 'deekshit', 56, '2016-07-13 07:31:00'),
(23, 248, 'kuthe', 'charanreddy', 53, '2016-07-13 09:37:00'),
(24, 255, 'y??', 'bharatreddy', 53, '2027-07-13 12:36:00'),
(25, 1, 'heyy der!!!\r\n', 'fazilkhan', 53, '2003-08-13 02:09:00'),
(26, 1, 'yep..\r\n', 'fazilkhan', 53, '2003-08-13 02:28:00'),
(27, 7, 'lie', 'fazilkhan', 53, '2003-08-13 05:42:00'),
(28, 1, 'endira,,,', 'fazilkhan', 53, '2007-08-13 03:52:00'),
(29, 1, 'hiiii', 'fazilkhan', 53, '2007-08-13 06:06:00'),
(30, 248, 'pandi', 'fazilkhan', 53, '2007-08-13 06:23:00'),
(31, 288, 'hi', 'fazilkhan', 0, '07-08-13 11:55'),
(32, 319, 'hi doodh...', 'vamsiyadav', 0, '14-08-13 17:59'),
(33, 316, 'uuuu', 'vamsiyadav', 0, '14-08-13 18:0'),
(34, 321, 'lak', 'bharatreddy', 0, '22-08-13 12:21');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE IF NOT EXISTS `responses` (
  `RES_ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ID` mediumint(8) unsigned NOT NULL,
  `TOPIC_ID` mediumint(5) unsigned NOT NULL,
  `response` text NOT NULL,
  `date_of_response` int(10) unsigned NOT NULL,
  `datares` tinytext,
  PRIMARY KEY (`RES_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`RES_ID`, `ID`, `TOPIC_ID`, `response`, `date_of_response`, `datares`) VALUES
(59, 150, 79, 'YES YES YES !!', 1420089688, NULL),
(60, 150, 80, 'seriously im waiting for this movie . i am a big fan of bin laden the way he damald the twin towers!', 1420093524, NULL),
(61, 164, 148, 'he can ge beaten', 1420123370, NULL),
(62, 150, 156, 'Well thats from Enigma2.', 1420194324, NULL),
(63, 164, 157, 'ONthe chair please', 1420195149, NULL),
(64, 164, 156, 'ican get ', 1420196158, NULL),
(65, 150, 157, 'through', 1420196249, NULL),
(66, 150, 82, 'bunty', 1420204791, NULL),
(67, 150, 156, 'if the logic of good inductive arguments is to be of any real value, the measure of support it articulates should meet the following condition', 1420568982, NULL),
(68, 150, 166, 'ttfu', 1420726983, NULL),
(79, 150, 165, 'lol', 1422952151, NULL),
(80, 150, 156, 'get', 1422952162, NULL),
(81, 150, 164, 'flop', 1422952323, NULL),
(82, 150, 156, 'meet', 1422952333, NULL),
(83, 150, 156, 'turn up', 1422952378, NULL),
(84, 150, 164, 'kill', 1422952393, NULL),
(85, 150, 165, 'bornn', 1422952419, NULL),
(86, 150, 164, 'hello', 1438092327, NULL),
(87, 150, 165, 'lol', 1438092687, NULL),
(88, 150, 156, 'pagal<br /> ', 1438524164, NULL),
(89, 150, 165, 'anjali', 1438530423, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `TOPIC_ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ID` smallint(5) unsigned NOT NULL,
  `ROOM_ID` int(1) NOT NULL DEFAULT '1',
  `CORNER_ID` int(11) NOT NULL,
  `topictitle` tinytext NOT NULL,
  `topic` mediumtext,
  `date_of_topic` int(15) NOT NULL,
  `data` varchar(100) DEFAULT NULL,
  `likers` text,
  `dislikers` text,
  PRIMARY KEY (`TOPIC_ID`),
  UNIQUE KEY `TOPIC_ID` (`TOPIC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`TOPIC_ID`, `ID`, `ROOM_ID`, `CORNER_ID`, `topictitle`, `topic`, `date_of_topic`, `data`, `likers`, `dislikers`) VALUES
(2, 150, 0, 0, 'illan', 'hari', 1417511425, '../../data/topics/1/2/1_2_150_1417511425.jpg', NULL, NULL),
(3, 150, 0, 0, 'haree', 'krishna', 1417511506, '../../data/topics/1/3/1_3_150_1417511506.jpg', NULL, NULL),
(4, 150, 0, 0, '', '', 1417511531, '', NULL, NULL),
(5, 150, 0, 0, '', '', 1417511531, '', NULL, NULL),
(6, 150, 0, 0, '', '', 1417511894, '', NULL, NULL),
(7, 150, 0, 0, '', '', 1417512036, '', NULL, NULL),
(8, 150, 0, 0, '', '', 1417512159, '', NULL, NULL),
(9, 150, 0, 0, '', '', 1417512199, '', NULL, NULL),
(10, 150, 0, 0, '', '', 1417512350, '', NULL, NULL),
(11, 150, 0, 0, '', '', 1417512389, '', NULL, NULL),
(12, 150, 0, 0, '', '', 1417512403, '', NULL, NULL),
(13, 150, 0, 0, 'maji', 'fa', 1417512771, '../../data/topics/1/13/1_13_150_1417512771.jpg', NULL, NULL),
(14, 150, 0, 0, '', '', 1417512783, '', NULL, NULL),
(15, 150, 0, 0, 'illan', 'surya', 1417512963, '../../data/topics/1/15/1_15_150_1417512963.jpg', NULL, NULL),
(16, 150, 0, 0, 'asi', 'aoish', 1417512981, '', NULL, NULL),
(17, 150, 0, 0, 'asi', 'aoish', 1417512985, '../../data/topics/1/17/1_17_150_1417512985.jpg', NULL, NULL),
(18, 150, 0, 0, 'asi', 'aoish', 1417512985, '../../data/topics/1/18/1_18_150_1417512985.jpg', NULL, NULL),
(19, 150, 0, 0, 'illan', 'oih', 1417513008, '../../data/topics/1/19/1_19_150_1417513008.jpg', NULL, NULL),
(20, 150, 0, 0, '', '', 1417513046, '', NULL, NULL),
(21, 150, 0, 0, 'ua', 'i', 1417513261, '', NULL, NULL),
(22, 150, 0, 0, 'ua', 'i', 1417513270, '', NULL, NULL),
(23, 150, 0, 0, 'ua', 'i', 1417513275, '../../data/topics/1/23/1_23_150_1417513275.jpg', NULL, NULL),
(24, 150, 0, 0, 'j', 'in', 1417513288, '', NULL, NULL),
(25, 150, 0, 0, 'lias', 'lihas', 1417513356, '../../data/topics/1/25/1_25_150_1417513356.jpg', NULL, NULL),
(26, 150, 0, 0, '', '', 1417513363, '', NULL, NULL),
(27, 150, 0, 0, '', '', 1417513377, '', NULL, NULL),
(28, 150, 0, 0, 'aisn', 'ias', 1417513401, '', NULL, NULL),
(29, 150, 0, 0, 'aisn', 'ias', 1417513410, '', NULL, NULL),
(30, 150, 0, 0, 'aisn', 'ias', 1417513416, '../../data/topics/1/30/1_30_150_1417513416.jpg', NULL, NULL),
(31, 150, 0, 0, 'aisn', 'ias', 1417513416, '../../data/topics/1/31/1_31_150_1417513416.jpg', NULL, NULL),
(32, 150, 0, 0, '', '', 1417513424, '', NULL, NULL),
(33, 150, 0, 0, '', '', 1417513424, '', NULL, NULL),
(34, 150, 0, 0, '', '', 1417513437, '', NULL, NULL),
(35, 150, 0, 0, '', '', 1417513437, '', NULL, NULL),
(36, 150, 0, 0, 'iaoas', '', 1417513858, '', NULL, NULL),
(37, 150, 0, 0, 'iaoas', 'oias', 1417513869, '', NULL, NULL),
(38, 150, 0, 0, 'iaoas', 'oias', 1417513869, '', NULL, NULL),
(39, 150, 0, 0, 'iaoas', 'oias', 1417513876, '', NULL, NULL),
(40, 150, 0, 0, 'iaoas', 'oias', 1417513876, '', NULL, NULL),
(41, 150, 0, 0, 'iaoas', 'oias', 1417513882, '../../data/topics/1/41/1_41_150_1417513882.jpg', NULL, NULL),
(42, 150, 0, 0, 'iaoas', 'oias', 1417513882, '../../data/topics/1/42/1_42_150_1417513882.jpg', NULL, NULL),
(43, 150, 0, 0, 'iaoas', 'oias', 1417513882, '../../data/topics/1/43/1_43_150_1417513882.jpg', NULL, NULL),
(44, 150, 0, 0, 'a', '', 1417513946, '', NULL, NULL),
(45, 150, 0, 0, 'as', '', 1417513968, '', NULL, NULL),
(46, 150, 0, 0, 'as', 'ois', 1417514018, '', NULL, NULL),
(47, 150, 0, 0, 'as', '', 1417514024, '', NULL, NULL),
(48, 150, 0, 0, 'as', '', 1417514025, '', NULL, NULL),
(49, 150, 0, 0, 'as', '', 1417514031, '../../data/topics/1/49/1_49_150_1417514031.jpg', NULL, NULL),
(50, 150, 0, 0, '', '', 1417514123, '', NULL, NULL),
(51, 150, 0, 0, 'kj', '', 1417514127, '', NULL, NULL),
(52, 150, 0, 0, 'kj', '', 1417514129, '', NULL, NULL),
(53, 150, 0, 0, 'kj', '', 1417514135, '../../data/topics/1/53/1_53_150_1417514135.jpg', NULL, NULL),
(54, 150, 0, 0, 'as', 'askjb', 1417515074, '', NULL, NULL),
(55, 150, 0, 0, 'k', 'kj', 1417515260, '../../data/topics/1/55/1_55_150_1417515260.jpg', NULL, NULL),
(56, 150, 0, 0, '', '', 1417515271, '', NULL, NULL),
(57, 150, 0, 0, 'ais', 'lails', 1417518532, '../../data/topics/1/57/1_57_150_1417518532.jpg', NULL, NULL),
(58, 150, 0, 0, '', '', 1417518540, '', NULL, NULL),
(59, 150, 0, 0, '', '', 1417518586, '', NULL, NULL),
(60, 150, 0, 0, 'ila', 'KBA', 1417518630, '../../data/topics/1/60/1_60_150_1417518630.jpg', NULL, NULL),
(61, 150, 0, 0, '', '', 1417518633, '', NULL, NULL),
(62, 150, 0, 0, 'lika', 'lo', 1417518703, '../../data/topics/1/62/1_62_150_1417518703.jpg', NULL, NULL),
(63, 150, 0, 0, '', '', 1417518711, '', NULL, NULL),
(64, 150, 0, 0, '', '', 1417518822, NULL, NULL, NULL),
(65, 150, 0, 0, 'asiok', 'lkA', 1417518976, '../../data/topics/1/65/1_65_150_1417518976.jpg', NULL, NULL),
(66, 150, 0, 0, '', '', 1417518985, NULL, NULL, NULL),
(67, 150, 0, 0, 'oiw', 'ij', 1417519054, NULL, NULL, NULL),
(68, 150, 0, 0, 'oiw', 'ij', 1417519056, NULL, NULL, NULL),
(69, 150, 0, 0, 'oiw', 'ij', 1417519056, NULL, NULL, NULL),
(70, 150, 0, 0, 'oiw', 'ij', 1417520157, NULL, NULL, NULL),
(71, 150, 0, 0, 'oiw', 'ij', 1417520157, NULL, NULL, NULL),
(72, 150, 0, 0, 'oiw', 'ij', 1417520157, NULL, NULL, NULL),
(73, 150, 0, 0, 'as', 'asoi', 1417520182, NULL, NULL, NULL),
(74, 150, 0, 0, 'as', 'asoi', 1417520184, NULL, NULL, NULL),
(75, 150, 0, 0, 'as', 'asoi', 1417520184, NULL, NULL, NULL),
(76, 150, 0, 0, 'is', 'o', 1417520199, NULL, NULL, NULL),
(77, 150, 0, 0, 'ails', 'oi', 1417520226, NULL, NULL, NULL),
(78, 150, 0, 0, 'o', 'k', 1417520304, NULL, NULL, NULL),
(148, 164, 5, 0, 'photoshohp tfz', 'aero effect. put ars and slap . but i know onr thing may be i love u one day one day wont ithink i kick you they call me superman', 1420123006, '../../data/topics/5/148/5_148_164_1420123006.jpg', 'a:1:{i:0;s:3:"164";}', ''),
(156, 150, 1, 100, 'principles of lust  in tree', 'The inductive logic is a system of evidential support that extends deductive logic to less-than-certain inferences. For valid deductive arguments the premises logically entail the conclusion, where the entailment means that the truth of the premises provides a guarantee of the truth of the conclusion. Similarly, in a good inductive argument the premises should provide some degree of support for the conclusion, where such support means that the truth of the premises indicates with some degree of strength that the conclusion is true. Presumably, if the logic of good inductive arguments is to be of any real value, the measure of support it articulates should meet the following condition:', 1420187959, '../../data/topics/1/156/1_156_150_1420187959.jpg', 'a:0:{}', 'a:1:{i:0;s:3:"150";}'),
(158, 164, 1, 0, 'pray the lord', 'kish', 1420194930, '../../data/topics/1/158/1_158_164_1420194930.jpg', NULL, NULL),
(159, 164, 1, 100, 'Inductive logic', 'Unable to connect to the Internet<br /> <br /> Google Chrome canâ€™t display the webpage because your computer isnâ€™t connected to the Internet.<br /> <br /> Details', 1420196325, NULL, NULL, NULL),
(164, 150, 1, 0, 'tickle', 'clock', 1420281254, '../../data/topics/1/164/1_164_150_1420281254.jpg', NULL, NULL),
(165, 150, 1, 0, 'illan', 'copyright@ epicLOL.com', 1420281345, '../../data/topics/1/165/1_165_150_1420281345.png', NULL, NULL);
--
-- Database: `groups`
--

-- --------------------------------------------------------

--
-- Table structure for table `hareeegroup`
--

CREATE TABLE IF NOT EXISTS `hareeegroup` (
  `memid` int(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`memid`),
  UNIQUE KEY `id` (`memid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
--
-- Database: `memdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `meminfo`
--

CREATE TABLE IF NOT EXISTS `meminfo` (
  `ID` smallint(11) unsigned NOT NULL,
  `bday` date NOT NULL,
  `status` varchar(150) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `wrappers` varchar(1000) NOT NULL,
  `avatars` varchar(5000) NOT NULL,
  `tumb_realavatar` text NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meminfo`
--

INSERT INTO `meminfo` (`ID`, `bday`, `status`, `city`, `wrappers`, `avatars`, `tumb_realavatar`) VALUES
(56, '0000-00-00', NULL, NULL, '', '', '0'),
(91, '0000-00-00', NULL, NULL, '', '', '0'),
(92, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(133, '0000-00-00', '', '', '', '', '0'),
(134, '0000-00-00', '', '', '', '', '0'),
(135, '0000-00-00', '', '', '', '', '0'),
(136, '0000-00-00', '', '', '', '', '0'),
(137, '0000-00-00', '', '', '', '', '0'),
(138, '0000-00-00', '', '', '', '', '0'),
(139, '0000-00-00', '', '', '', '', '0'),
(140, '0000-00-00', '', '', '', '', '0'),
(141, '0000-00-00', '', '', '', '', '0'),
(142, '0000-00-00', '', '', '', 'YToxOntpOjA7czoyOiIwMCI7fQ==', '0'),
(143, '0000-00-00', '', '', '', 'a:3:{i:0;s:2:"00";i:1;s:18:"143_1388346159.jpg";i:2;s:18:"143_1388346174.jpg";}', '0'),
(144, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0'),
(145, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0'),
(146, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0'),
(147, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0'),
(148, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0'),
(149, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', '0'),
(150, '0000-00-00', 'hiiii', '', '../../data/userprofile/avatar/150/wrap_150.jpg', 'a:8:{i:0;s:18:"150_1418493497.jpg";i:1;s:18:"150_1418493551.jpg";i:2;s:18:"150_1418493597.jpg";i:3;s:18:"150_1418493695.jpg";i:4;s:18:"150_1418493730.jpg";i:5;s:18:"150_1418493752.jpg";i:6;s:18:"150_1418493916.jpg";i:7;s:18:"150_1420571519.jpg";}', '../../data/userprofile/avatar/150/tumb150_1420571519.jpg'),
(151, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(152, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(157, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(159, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(160, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(161, '0000-00-00', '', '', '../../data/userprofile/avatar/161shakemom /wrap_161.jpg', 'a:4:{i:0;s:2:"00";i:1;s:18:"161_1405280341.jpg";i:2;s:18:"161_1405280364.jpg";i:3;s:18:"161_1418983093.jpg";}', ''),
(162, '0000-00-00', '', '', '../../data/userprofile/avatar/162momshake /wrap_162.jpg', 'a:3:{i:0;s:18:"162_1419000110.jpg";i:1;s:18:"162_1419000120.jpg";i:2;s:18:"162_1419001655.jpg";}', '0'),
(163, '0000-00-00', '', '', '', 'a:2:{i:0;s:2:"00";i:1;s:18:"163_1419001814.jpg";}', '0'),
(164, '0000-00-00', 'body the back', '', '../../data/userprofile/avatar/164sachin a/wrap_164.jpg', 'a:3:{i:0;s:2:"00";i:1;s:18:"164_1404477147.jpg";i:2;s:18:"164_1404477163.jpg";}', '../../data/userprofile/avatar/164sachin a/tumb164_1404477163.jpg'),
(165, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(166, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(168, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(169, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(170, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(171, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(172, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(173, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(174, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(175, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(181, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(183, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(185, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(186, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(189, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(191, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(192, '0000-00-00', '', '', '', 'a:1:{i:0;s:2:"00";}', ''),
(193, '0000-00-00', '', '', '', 'a:2:{i:0;s:2:"00";i:1;s:18:"193_1404490573.jpg";}', '');
--
-- Database: `mysqli_connect`
--
--
-- Database: `points`
--

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `ID` mediumint(8) unsigned NOT NULL,
  `topic_points` smallint(5) unsigned NOT NULL,
  `res_points` smallint(5) unsigned NOT NULL,
  `cres_points` smallint(5) unsigned NOT NULL,
  `total_points` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `u_ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`ID`, `topic_points`, `res_points`, `cres_points`, `total_points`) VALUES
(1, 2, 0, 0, 0),
(2, 2, 0, 0, 0),
(92, 0, 0, 0, 0),
(129, 2, 0, 0, 0),
(130, 2, 0, 0, 0),
(131, 0, 0, 0, 0),
(132, 0, 0, 0, 0),
(138, 0, 0, 0, 0),
(139, 0, 0, 0, 0),
(140, 0, 0, 0, 0),
(141, 0, 0, 0, 0),
(142, 0, 0, 0, 0),
(143, 0, 0, 0, 0),
(144, 0, 0, 0, 0),
(145, 0, 0, 0, 0),
(146, 0, 0, 0, 0),
(147, 0, 0, 0, 0),
(148, 0, 0, 0, 0),
(149, 0, 0, 0, 0),
(150, 0, 0, 0, 0),
(151, 0, 0, 0, 0);
--
-- Database: `signs`
--

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

CREATE TABLE IF NOT EXISTS `fonts` (
  `fontid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fontname` varchar(50) NOT NULL,
  `fonts` varchar(500) NOT NULL,
  PRIMARY KEY (`fontid`),
  UNIQUE KEY `fonts` (`fonts`),
  UNIQUE KEY `fontid` (`fontid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`fontid`, `fontname`, `fonts`) VALUES
(1, 'Roboto', '<link href=''http://fonts.googleapis.com/css?family=Roboto'' rel=''stylesheet'' type=''text/css''>'),
(2, 'Alegreya SC', '<link href=''http://fonts.googleapis.com/css?family=Alegreya+SC'' rel=''stylesheet'' type=''text/css''>'),
(3, 'Antic Slab', '<link href=''http://fonts.googleapis.com/css?family=Antic+Slab'' rel=''stylesheet'' type=''text/css''>'),
(4, 'Armata', '<link href=''http://fonts.googleapis.com/css?family=Armata'' rel=''stylesheet'' type=''text/css''>'),
(5, 'Audiowide', '<link href=''http://fonts.googleapis.com/css?family=Audiowide'' rel=''stylesheet'' type=''text/css''>'),
(6, 'Bad Script', '<link href=''http://fonts.googleapis.com/css?family=Bad+Script'' rel=''stylesheet'' type=''text/css''>'),
(7, 'Bigelow Rules', '<link href=''http://fonts.googleapis.com/css?family=Bigelow+Rules'' rel=''stylesheet'' type=''text/css''>'),
(8, 'Bubbler One', '<link href=''http://fonts.googleapis.com/css?family=Bubbler+One'' rel=''stylesheet'' type=''text/css''>'),
(9, 'Cabin Condensed', '<link href=''http://fonts.googleapis.com/css?family=Cabin+Condensed'' rel=''stylesheet'' type=''text/css''>'),
(10, 'Chela One', '<link href=''http://fonts.googleapis.com/css?family=Chela+One'' rel=''stylesheet'' type=''text/css''>'),
(11, 'Cinzel', '<link href=''http://fonts.googleapis.com/css?family=Cinzel'' rel=''stylesheet'' type=''text/css''>'),
(12, 'Crafty Girls', '<link href=''http://fonts.googleapis.com/css?family=Crafty+Girls'' rel=''stylesheet'' type=''text/css''>'),
(13, 'Croissant One', '<link href=''http://fonts.googleapis.com/css?family=Croissant+One'' rel=''stylesheet'' type=''text/css''>'),
(14, 'Denk One', '<link href=''http://fonts.googleapis.com/css?family=Denk+One'' rel=''stylesheet'' type=''text/css''>'),
(15, 'Diplomata', '<link href=''http://fonts.googleapis.com/css?family=Diplomata'' rel=''stylesheet'' type=''text/css''>'),
(16, 'Eagle Lake', '<link href=''http://fonts.googleapis.com/css?family=Eagle+Lake'' rel=''stylesheet'' type=''text/css''>'),
(17, 'Economica', '<link href=''http://fonts.googleapis.com/css?family=Economica'' rel=''stylesheet'' type=''text/css''>'),
(18, 'Engagement', '<link href=''http://fonts.googleapis.com/css?family=Engagement'' rel=''stylesheet'' type=''text/css''>'),
(19, 'Euphoria Script', '<link href=''http://fonts.googleapis.com/css?family=Euphoria+Script'' rel=''stylesheet'' type=''text/css''>'),
(20, 'Ewert', '<link href=''http://fonts.googleapis.com/css?family=Ewert'' rel=''stylesheet'' type=''text/css''>'),
(21, 'Expletus Sans', '<link href=''http://fonts.googleapis.com/css?family=Expletus+Sans'' rel=''stylesheet'' type=''text/css''>'),
(22, 'Fuana One', '<link href=''http://fonts.googleapis.com/css?family=Fauna+One'' rel=''stylesheet'' type=''text/css''>'),
(23, 'Finger Paint', '<link href=''http://fonts.googleapis.com/css?family=Finger+Paint'' rel=''stylesheet'' type=''text/css''>'),
(24, 'Flavors', '<link href=''http://fonts.googleapis.com/css?family=Flavors'' rel=''stylesheet'' type=''text/css''>'),
(25, 'Fresca', '<link href=''http://fonts.googleapis.com/css?family=Fresca'' rel=''stylesheet'' type=''text/css''>'),
(26, 'Frijole', '<link href=''http://fonts.googleapis.com/css?family=Frijole'' rel=''stylesheet'' type=''text/css''>'),
(27, 'Glass Antiqua', '<link href=''http://fonts.googleapis.com/css?family=Glass+Antiqua'' rel=''stylesheet'' type=''text/css''>'),
(28, 'Grand Hotel', '<link href=''http://fonts.googleapis.com/css?family=Grand+Hotel'' rel=''stylesheet'' type=''text/css''>'),
(29, 'Griffy', '<link href=''http://fonts.googleapis.com/css?family=Griffy'' rel=''stylesheet'' type=''text/css''>'),
(30, 'Hanalei Fill', '<link href=''http://fonts.googleapis.com/css?family=Hanalei+Fill'' rel=''stylesheet'' type=''text/css''>'),
(31, 'Happy Monkey', '<link href=''http://fonts.googleapis.com/css?family=Happy+Monkey'' rel=''stylesheet'' type=''text/css''>'),
(32, 'Headland One', '<link href=''http://fonts.googleapis.com/css?family=Headland+One'' rel=''stylesheet'' type=''text/css''>'),
(33, 'Henny Penny', '<link href=''http://fonts.googleapis.com/css?family=Henny+Penny'' rel=''stylesheet'' type=''text/css''>'),
(34, 'Im Fell Double Pice', '<link href=''http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica'' rel=''stylesheet'' type=''text/css''>'),
(35, 'Indie Flower', '<link href=''http://fonts.googleapis.com/css?family=Indie+Flower'' rel=''stylesheet'' type=''text/css''>'),
(36, 'Joti One', '<link href=''http://fonts.googleapis.com/css?family=Joti+One'' rel=''stylesheet'' type=''text/css''>'),
(37, 'Just Me Again Down Here', '<link href=''http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here'' rel=''stylesheet'' type=''text/css''>'),
(38, 'Kavoon', '<link href=''http://fonts.googleapis.com/css?family=Kavoon'' rel=''stylesheet'' type=''text/css''>'),
(39, 'Kranky', '<link href=''http://fonts.googleapis.com/css?family=Kranky'' rel=''stylesheet'' type=''text/css''>'),
(40, 'Ledger', '<link href=''http://fonts.googleapis.com/css?family=Ledger'' rel=''stylesheet'' type=''text/css''>'),
(41, 'Londrina Shadow', '<link href=''http://fonts.googleapis.com/css?family=Londrina+Shadow'' rel=''stylesheet'' type=''text/css''>'),
(42, 'Love Ya Like A  Sister', '<link href=''http://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister'' rel=''stylesheet'' type=''text/css''>'),
(43, 'Macondo', '<link href=''http://fonts.googleapis.com/css?family=Macondo'' rel=''stylesheet'' type=''text/css''>'),
(44, 'Maven Pro', '<link href=''http://fonts.googleapis.com/css?family=Maven+Pro'' rel=''stylesheet'' type=''text/css''>'),
(45, 'Merriweather', '<link href=''http://fonts.googleapis.com/css?family=Merriweather'' rel=''stylesheet'' type=''text/css''>'),
(46, 'Michroma', '<link href=''http://fonts.googleapis.com/css?family=Michroma'' rel=''stylesheet'' type=''text/css''>'),
(47, 'Mouse Memoris', '<link href=''http://fonts.googleapis.com/css?family=Mouse+Memoirs'' rel=''stylesheet'' type=''text/css''>'),
(48, 'Mrs sheppards', '<link href=''http://fonts.googleapis.com/css?family=Mrs+Sheppards'' rel=''stylesheet'' type=''text/css''>'),
(49, 'Norican', '<link href=''http://fonts.googleapis.com/css?family=Norican'' rel=''stylesheet'' type=''text/css''>'),
(50, 'Nosifer', '<link href=''http://fonts.googleapis.com/css?family=Nosifer'' rel=''stylesheet'' type=''text/css''>'),
(51, 'Parisienne', '<link href=''http://fonts.googleapis.com/css?family=Parisienne'' rel=''stylesheet'' type=''text/css''>'),
(52, 'Pathway Gothic One', '<link href=''http://fonts.googleapis.com/css?family=Pathway+Gothic+One'' rel=''stylesheet'' type=''text/css''>'),
(53, 'Playball', '<link href=''http://fonts.googleapis.com/css?family=Playball'' rel=''stylesheet'' type=''text/css''>'),
(54, 'Poller One', '<link href=''http://fonts.googleapis.com/css?family=Poller+One'' rel=''stylesheet'' type=''text/css''>'),
(55, 'Port Lligat Slab', '<link href=''http://fonts.googleapis.com/css?family=Port+Lligat+Slab'' rel=''stylesheet'' type=''text/css''>'),
(56, 'Quiteessential', '<link href=''http://fonts.googleapis.com/css?family=Quintessential'' rel=''stylesheet'' type=''text/css''>'),
(57, 'Rosario', '<link href=''http://fonts.googleapis.com/css?family=Rosario'' rel=''stylesheet'' type=''text/css''>'),
(58, 'Alex Brush', '<link href=''http://fonts.googleapis.com/css?family=Alex+Brush'' rel=''stylesheet'' type=''text/css''>'),
(59, 'Simonetta', '<link href=''http://fonts.googleapis.com/css?family=Simonetta'' rel=''stylesheet'' type=''text/css''>'),
(60, 'Sonsie One', '<link href=''http://fonts.googleapis.com/css?family=Sonsie+One'' rel=''stylesheet'' type=''text/css''>'),
(61, 'Spirax', '<link href=''http://fonts.googleapis.com/css?family=Spirax'' rel=''stylesheet'' type=''text/css''>'),
(62, 'Squada One', '<link href=''http://fonts.googleapis.com/css?family=Squada+One'' rel=''stylesheet'' type=''text/css''>'),
(63, 'Sunshiney', '<link href=''http://fonts.googleapis.com/css?family=Sunshiney'' rel=''stylesheet'' type=''text/css''>'),
(64, 'The Girl Next Door', '<link href=''http://fonts.googleapis.com/css?family=The+Girl+Next+Door'' rel=''stylesheet'' type=''text/css''>'),
(65, 'Voces', '<link href=''http://fonts.googleapis.com/css?family=Voces'' rel=''stylesheet'' type=''text/css''>'),
(66, 'Yesteryear', '<link href=''http://fonts.googleapis.com/css?family=Yesteryear'' rel=''stylesheet'' type=''text/css''>');
--
-- Database: `signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

CREATE TABLE IF NOT EXISTS `followings` (
  `ID` smallint(6) NOT NULL,
  `followings_ID` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followings`
--

INSERT INTO `followings` (`ID`, `followings_ID`) VALUES
(150, 'a:5:{i:0;i:152;i:1;i:153;i:2;i:154;i:3;i:155;i:4;i:156;}'),
(152, 'a:1:{i:0;s:3:"150";}'),
(153, 'a:1:{i:0;s:3:"150";}'),
(154, 'a:1:{i:0;s:3:"150";}');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE IF NOT EXISTS `follows` (
  `ID` smallint(6) NOT NULL,
  `follows_ID` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`ID`, `follows_ID`) VALUES
(150, 'a:3:{i:0;s:3:"152";i:1;s:3:"154";i:2;s:3:"153";}');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `ID` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`ID`, `time`) VALUES
(100, '1380994863'),
(106, '1381160464'),
(106, '1381160498'),
(106, '1381160503'),
(106, '1381160518'),
(106, '1381160529'),
(106, '1381160532'),
(100, '1381160594'),
(100, '1381160823'),
(100, '1381168244'),
(107, '1381767816'),
(56, '1385909345'),
(0, '1387361359'),
(0, '1388344674'),
(0, '1388926049'),
(149, '1388926070'),
(149, '1388926077'),
(149, '1389014221'),
(150, '1389456370'),
(150, '1389801126'),
(150, '1389843890'),
(150, '1391097690'),
(150, '1392109371'),
(150, '1392109390'),
(150, '1392109426'),
(150, '1392109430'),
(150, '1392109434'),
(150, '1392109640'),
(150, '1399173884'),
(150, '1399173900'),
(150, '1400391812'),
(150, '1400391817'),
(150, '1400664931'),
(150, '1400696384'),
(150, '1401249035'),
(150, '1401356389'),
(150, '1401509798'),
(150, '1402028289'),
(150, '1402330687'),
(150, '1402330696'),
(150, '1402330703'),
(150, '1402330708'),
(150, '1402478700'),
(150, '1402547082'),
(150, '1403244489'),
(150, '1403510315'),
(150, '1403846328'),
(150, '1404319788'),
(150, '1404359132'),
(150, '1404359135'),
(150, '1404359145'),
(151, '1404359867'),
(150, '1404359997'),
(150, '1404369873'),
(150, '1404369876'),
(150, '1404369884'),
(162, '1404468425'),
(163, '1404468710'),
(164, '1404477070'),
(165, '1404479294'),
(166, '1404480025'),
(168, '1404480149'),
(169, '1404480242'),
(170, '1404480324'),
(171, '1404480510'),
(172, '1404480601'),
(173, '1404480740'),
(174, '1404480834'),
(175, '1404480934'),
(181, '1404482125'),
(183, '1404488359'),
(161, '1405280304'),
(150, '1406486840'),
(150, '1407434080'),
(150, '1409385829'),
(150, '1409385834'),
(150, '1409843168'),
(150, '1409843172'),
(150, '1409989377'),
(161, '1410047761'),
(150, '1412354158'),
(146, '1416539215'),
(150, '1417708597'),
(150, '1417708602'),
(150, '1418922772'),
(150, '1418964234'),
(150, '1418991616'),
(150, '1418991642'),
(150, '1418991651'),
(150, '1418991663'),
(150, '1419049026'),
(150, '1419347834'),
(150, '1419661078'),
(150, '1420198564'),
(150, '1420284910'),
(150, '1420568478'),
(150, '1422948735'),
(150, '1423021220'),
(150, '1423128762'),
(150, '1423200277'),
(146, '1428221065'),
(146, '1428221078'),
(146, '1428221095'),
(146, '1432656420'),
(146, '1432656429'),
(146, '1432656437'),
(146, '1436860527'),
(149, '1436860680'),
(149, '1436860689'),
(147, '1436860717'),
(147, '1436860723'),
(160, '1436861039'),
(161, '1436861044'),
(160, '1436861065'),
(149, '1436861080'),
(161, '1436861089'),
(150, '1438077461'),
(149, '1438077637'),
(149, '1438077646'),
(149, '1438077656');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `L2` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `signno` smallint(5) unsigned NOT NULL,
  `sign` varchar(25) NOT NULL,
  `date_of_benow` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mobileno` bigint(15) NOT NULL,
  `privacy` varchar(3) NOT NULL DEFAULT '0_0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `name`, `L2`, `salt`, `country`, `signno`, `sign`, `date_of_benow`, `email`, `gender`, `mobileno`, `privacy`) VALUES
(50, 'bharatreddy', 'f302e9f435f7d1ae3c16264f8f1a91fa', '', '', 42, 'Bharat ..', 'Thursday 4th July 2013 09:28:10 am', 'bharatreddy@gmial.com', 'female', 89615252, '0_0'),
(51, 'fazilkhan', 'fc178ddce8cdf167be366ce0a97ce7ba', '', '', 9, 'Fazil khan.', 'Saturday 6th July 2013 11:55:27 am', 'fazilkhan@gmail.com', 'female', 684512, '0_0'),
(52, 'lakshman', '601d30a958e6604df910330239ce7fcf', '', '', 6, 'lakshman', 'Thursday 11th July 2013 03:55:53 pm', 'lampsoo@gmial.com', 'male', 123456, '0_0'),
(53, 'vamsiyadav', '4e3914008c2a9437797278e016dd4eb0', '', '', 20, 'VAMZZ yadav', 'Saturday 13th July 2013 04:21:21 am', 'vamsiyadav@gmail.com', 'male', 9494073073, '0_0'),
(54, 'himasagar', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', 'Monday 15th July 2013 04:30:09 pm', 'himasagar.lampsoo@gmail.com', 'male', 9677262296, '0_0'),
(55, 'saideekshit', '627e1ccc37e8d0386be720026e90afe5', '', '', 0, '', 'Tuesday 16th July 2013 03:36:31 am', 'saideekshit@94gmail.com', 'male', 8056195020, '0_0'),
(56, 'charanreddy', '33df8b58fa03f5c9c10911cdadd08262', '', '', 11, 'Charan tata..', 'Tuesday 16th July 2013 09:35:54 am', 'charanreddy@gmail.com', 'male', 7299122867, '0_0'),
(57, '''ganeshreddy''', '1cfa084198d2c7eecd3d4a5bbf448182', '', '', 0, '', 'Saturday 3rd August 2013 08:19:53 pm', 'ganeshreddy@gmail.com', 'male', 87946512, '0_0'),
(58, 'krishnakanth', 'e4b9e1bba06ad7bbcf7affb493984aa0', '', '', 13, '', 'Saturday 3rd August 2013 08:23:46 pm', 'krishnakanth@gmial.com', 'male', 8465484848, '0_0'),
(59, 'hemanth', '4d6777ed513dda4d99c3656847740aef', '', '', 0, '', 'Monday 16th September 2013 06:55:48 pm', 'himasagar.lampsoo@gmail.com', 'male', 9440133703, '0_0'),
(60, 'hemanthmanan', '4d6777ed513dda4d99c3656847740aef', '', '', 0, '', 'Monday 16th September 2013 06:57:50 pm', 'himasagar.lampsoo@gmail.com', 'male', 9440133703, '0_0'),
(65, 'satheeshs', 'ad5e9eda5793665edfe615f4826b5ca4', '', '', 0, '', 'Tuesday 17th September 2013 01:42:33 pm', 'satheesh@gmail.com', 'male', 9440133703, '0_0'),
(66, 'satheesh', '446ad8918b282bfc087dbca6fff90323', '', '', 0, '', 'Tuesday 17th September 2013 01:42:51 pm', 'satheesh@gmail.com', 'male', 9440133703, '0_0'),
(86, 'tataratanwadf', 'cf27c49ce7bfee59ec846d82fc72b35c', '', '', 0, '', 'Tuesday 17th September 2013 03:29:08 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(87, 'tataratanwadf', 'cf27c49ce7bfee59ec846d82fc72b35c', '', '', 0, '', 'Tuesday 17th September 2013 03:30:09 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(88, 'tataratanwadfg', '0d9a9c35bc54e6e4f412ca97ac8f433e', '', '', 0, '', 'Tuesday 17th September 2013 03:31:50 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(89, 'tataratanwadfgh', 'bcdceb4374f5ec2314af4b52b7fc6bea', '', '', 0, '', 'Tuesday 17th September 2013 03:32:21 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(90, 'tataratanwadfghh', '65ef959b29fdc0b985bf9f5081307753', '', '', 0, '', 'Tuesday 17th September 2013 03:33:12 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(91, 'tataratanwadfghhyd', '25f9e794323b453885f5181f1b624d0b', '', '', 0, '', 'Tuesday 17th September 2013 03:34:50 pm', 'tataratan@gmail.com', 'male', 84651652, '0_0'),
(92, 'utfuyy', '', '', '', 0, '', '', '', '', 0, '0_0'),
(93, 'ecrvtbynum', '0bdd1785a73fccb942c0ec24be636872d1a4f6f7a6bc00f9a2e1d3db14f2fcf95650d021b112b89960d9d5be85f515fac5bab321b5f07cb38fa28ec583c4074e', '9e5fd2b672b757bd1ecc1321ed144da2af9a3823e96de6be67ab90c789ccf3aca69b73fab2d190dda9338d3ac218f5206f61d6f85c811e9fcbcbab5929b32d22', '', 0, '', 'Saturday 5th October 2013 12:49:43 pm', '', 'male', 8946561, '0_0'),
(94, 'ecrvtbynum', '27d1cea1c413b87ffe4c1cae6718ecdc4006a2a10bcff9eca3e46a4f72e013653a1413d5b1a67ea186cab912ffe81c2ca9561c4ee2d80f545235d059e0327d38', 'e0dff6cc67193ef8073a74c839ab3b13aac92b8cdd9147c9198b8c3a82c727c737a304e62cbcc6eed31f077cc20ab0d95c9dcb3a5fd2b4300a34c2b20352dca8', '', 0, '', 'Saturday 5th October 2013 12:49:52 pm', '', 'male', 8946561, '0_0'),
(95, 'rdtfgyhuji', '042df02676851425bffbd6d74e907f71670b5ee80af2d45be4fd914c118f5aa75efb946f8e5b4baca735c7435aa39a9e3dea0b52afbd55e12e2bb6622f68b55e', 'e197af21be580ecddb54416432551f9e189663c8e8917bfe5c530f0520ce5a7e4321cae74ed6737a47fdf0c9565d24f4a32bbf12fb9200dacb74364251d76b17', '', 0, '', 'Saturday 5th October 2013 01:42:02 pm', '', 'male', 8946561, '0_0'),
(96, 'rdtfgyhujir', 'db6d590952e18b3a422b72164be7ef127f044de7b80f51c75093928ee221742841312adbe0b6fc081b994b27d67d27c12bb670597c4b1ac6a47ed8b80ed664da', 'f94b9e5e6135d168450586fb135fdd9d5b580f37efa9e604617346d139abd60c7eb7df05649c54a61a4ec7085bcdf23ae2884ea7e8a4bb40f5d01b795ce82f3f', '', 0, '', 'Saturday 5th October 2013 01:44:20 pm', '', 'male', 8946561, '0_0'),
(97, 'xcyvubunimo', '54318e544d5c6098711d94916bb7eb487709fb2d27c42e5fb42d78bb68bf6c3241089cd55ae334d81f5203b290be46045accd8ccc17cdf0b4a77fea63addc925', 'd045610954841627051ded16a391dd541a787808f2254e0af7bb08edefe50d291e2ee9dcd9914bec95a2a09f38505f7d3940fc36b386e83d238ceae75ebea32c', '', 0, '', 'Saturday 5th October 2013 01:52:32 pm', '', 'male', 8946561, '0_0'),
(98, 'etfcygubhuj', 'e7e3564b8c6a6631c1487aa7e70be1c0882b3e9529330327fe4128fe4048bfd0a02a65e1f89a4d306862539ffb4c224e2f1a77d039a42fe151803a30c28d91b6', '224cab51e59ed462385a90240514d817b305dc46cde966ff37299109822b8f352a2ad30b3b1457381787bc4ac14ab7524d13666f63445bdfee8338ef62e3416d', '', 0, '', 'Saturday 5th October 2013 01:53:34 pm', '', 'male', 8946561, '0_0'),
(99, 'crytvbyunio', '45d957a0717861e65a66e7bfe85fcef613296255d610d1dab9e36cf7161078362fbd9a73c5654e059bf0ea2a1059f625ef6acb1925d7536b71060e888829d4c3', 'fb41e511b68a1504a99c25e160466a7cdbf17b1e3a9fdc3deee8f100ae51bb88d96e363fb6c43af12dafd3acbbb8fd8d70e86dc60e91196d5ddb0a785444604c', '', 0, '', 'Saturday 5th October 2013 01:55:37 pm', '', 'male', 8946561, '0_0'),
(100, 'jithanbabu', '4b021e2bc9acd7623b298f569daa4dd8637a733b3b36ad8cc45b7ae52e6dfa7ffde8e2698a45322416eefac5f88e007dfc0eaac1dae555bc613338fb1248456d', '8db890298db7c5fa1d22266dfa513d5bb6d3abb5c98856ced6dcbc79fe8c561deb4a48262655ff918025b19164da9035406c3de47a362137bb3d05591d35baae', '', 0, '', 'Saturday 5th October 2013 04:58:22 pm', '', 'male', 8946561, '0_0'),
(101, 'shahjahanbasha', '3ac725f2867c4e58a46db40f24f4401477532af6392aa00bf5c676f8bb9c9d3bf0ecc6af8f6fe2844fa9d46953e7440eb31f86b03727028d35c662524d05427f', 'cb53c5ee2abbbbaff7711cb8459cc942c8d65e7c2775b0a2e5d592b5a38ad8e7459c8024287668276f1500e2df8ac8cedd06aa8a70ef4248240a809c5c278424', '', 0, '', 'Sunday 6th October 2013 05:56:47 am', '', 'male', 68184546853, '0_0'),
(102, 'muthamil', '1fae1e5d11d165d23c5cb59b83c487a6059e594a60105ff7c53c02519fc46516f6396c8b1acce31103f4e6a725a0bf9d359e65ac7cbea310f5a51cd7236381a1', '02577c0f8a959f24afdea2f79549da98a7ed537430b9d3b480bf5d8cb94ef24507160f0f8952ef8a598c2f156a18359a763413142c65e71cce7ed5772dcf5039', '', 0, '', 'Sunday 6th October 2013 06:01:46 am', '', 'male', 68184546853, '0_0'),
(103, 'thanseer', 'ae63931af90f739637ea62b4ebf5008f6be75507eecab6d9c04906d5ebf667c2053d11f97e9a07f55103367b2536d686f68530c8151662f8cbc2b0ff190318c1', '7236c97965d1889fd915617239235458d455513666e2c5dd4db90ae31ab269d33776d086f72effc2241ade69f9ade2e9a1e14718d1c093adb4b4eae2af902653', '', 0, '', 'Sunday 6th October 2013 06:03:01 am', '', 'male', 68184546853, '0_0'),
(104, 'adtyashinde', 'bf56bf9c2e84d8ab061da6fe84ae8241be842b33e6ed386326d56e12ee97b9757a65a76202964c9fea574f247939ce71609219da3dc408fdd25f493540f592e3', '95bb57727b6752712d46aaf5ac50e60cec8a4a5b27f0e106feb6278f37f5d5dab55b892de9082e354b3ed443b9bd12c2ad2236edfeea313b57d80c7935bea39c', '', 0, '', 'Sunday 6th October 2013 06:04:03 am', '', 'male', 68184546853, '0_0'),
(105, 'saxobeat', '3450cae484d9c019903cabeb759efa0638a920e4a9f480ee82e4a849c5856baab2e1671976443e51fcba45959046d63861cdcd64ca8ba12b7bacdcb8bd7519d2', 'a3886f4696ba6241944ec922939e7165fe36f9447c00f4da7ac681becdbcd048f03431623b23faf26d261e28d7ab20407b8958dcaf6fc550a3429b255cebb842', '', 0, '', 'Sunday 6th October 2013 10:41:10 pm', '', 'male', 8946561, '0_0'),
(106, 'sagarbenjamin', '7323022401d4efaff66b5c6892376ff61f4d3590a8b3e197066915dc9ab2b2f7ce5592203a27d10c59cfef1108aea1592d4ff9ea55c4c4a8b7b80a7284ceb340', '16cd1e45205144521a88e1fd78c53d536d2ea8e40d56c9f86e509953dfe52bebb20e4dd69bf9d9b558b4e5acb0329891155f62021261fdfc9fd470e4f9eb73e5', '', 0, '', 'Monday 7th October 2013 12:20:23 pm', '', 'male', 68184546853, '0_0'),
(107, 'hemanthkumar', '15c0f2b24e1e5f641eebd016ae693e1a', '', '', 0, '', 'Monday 7th October 2013 01:55:03 pm', '', 'male', 963585586, '0_0'),
(108, 'krishnasree', '42283ac45f0de30a4fec5cf0358cd5ca7c6755bc6a27e3e2fb552a266865fdc346b06e5c9e6d41d180b5f4cd7c9ab9256b26957987b5634ba59c855116811994', '24fa4f86e3406f3162053d88fc8359e158d5390d9a9579df343e8ae8cd7468261ccd191e5475b4ef0f5191ad5d34fd79cf6ce0fbeb02df5b00b12513bcaa860d', '', 0, '', 'Saturday 12th October 2013 04:20:06 am', '', 'male', 8465894684, '0_0'),
(109, 'krishnasree123', '76ac2dc1de9111d971a36a916351b3aa365b5fdbde18ecc38b27bed1f1e1438489d7cbcddf349e87b65b799b2015b193028cef6702dd5eedb9bbe7553acb35d4', '28821293d9f83279a39ff66ed097e5d7b2c151e539046d4c903bcf433b0756c326ce1a645058a57b5d680704331516ce49a03bba64c5cecd0f2b3ee9159af270', '', 0, '', 'Saturday 12th October 2013 04:59:08 am', '', 'male', 78465148, '0_0'),
(110, 'abdulkalam', 'bb4e7c87384ea2de2851a7df183628bf2ce57cdde40753c16ce7cfe26668b00e3a8ec0ba4a72ea01e5136a681103268a031103dd24c2cfdf40e208c3fbe36cf6', '9d7b62277d0edbeb9ecf9ba9b877c2b7c8572bcc5ae6cd66d09384519405afdf2605dfc49f3ad8854698a67d3c4c1086a6620d8c6f1e012e36762de853d5c094', '', 0, '', 'Saturday 12th October 2013 05:01:33 am', '', 'male', 4654894, '0_0'),
(111, 'krishnakanth1', '9e8a2d3a84b57b0d30492a217ca2de297a3d26c2a4f1d33d01d5fd4bb9b2856531a73fdb1210ccdce3539722fca227481c30afc292c4524c41e0d51d74411050', '4c3193e70114cce8b90d09218c30677cf5be7aa628d9ee9a95565991e042c57c6c69a1be0084e33048533f9bf2c10b9fbceeabbb5eb3f6b4cc303f70142304fa', '', 0, '', 'Sunday 8th December 2013 05:09:20 am', '', 'male', 68184546853, '0_0'),
(112, 'krishnakanth2', 'b13525f0a1e1734c02e26239e24d3459b26eb396b6754b5a0a4092c4cb9b510be34aff7537b9bae7bfd1edfd72c00c1d40ebd87790b02daa3da19ec9532540c9', 'e76f484522f2a1a154663b085c4670e30ff8ba756c6595d94ab1a13426496a78bc9f1c59da5285bede893d90695e5e807d4432d619552d490c024a97dc2d1a2b', '', 0, '', 'Sunday 8th December 2013 05:10:35 am', '', 'male', 68184546853, '0_0'),
(113, 'eminem', '6261e233f19ae2738c09a8cffc4cb3323cadd47836f449ace9597c912d009004df19674723dfb5fc9f5e6c05d610c2904c4c18430da8cee249001c169f33d135', 'c2002490f66d27ef9500ef70b645cac6e6b67093a11d843e256fc28466867d62a501dffeda0e040d4d41d7a411bd83b9637b1c269a0d92a05d0175f119ecad0f', '', 0, '', 'Sunday 8th December 2013 05:11:44 am', '', 'male', 68184546853, '0_0'),
(114, 'chrisbrown', '910517001f415d929dc288c2d2a7159c004ce6815d0aa43dddbff931b8bc27671a6ba9e0cd62864f9e05f2d7ae55c5c6b2fd57139aaccb102679b3473f3f6342', '138642729f5fb0c04e896de2ed0c3c5f43aa08a0181deb4ecbaf42e7eceae750b2b2cd0c867b4b0f1cebcd8825ca997af83381d1641f3674825d960581287286', '', 0, '', 'Sunday 8th December 2013 05:12:23 am', '', 'male', 68184546853, '0_0'),
(115, 'justin', '55111d889a9091fe9e8636c933bfcdd38efaee70ae536affd95271c41b2273e17fbd061623dbd15104d07e272d6f37d13c64df77e6610dfdbeeaebe8f08bf5ff', '518f2eafc716551424d1c7b09b034872c8e50b6f37d072ee2d4228a2c0fd7a247e14fae91a7ffdb1275fe2b6a6491908f1803aa71ad60b594f0f27693f163b11', '', 0, '', 'Sunday 8th December 2013 05:13:23 am', '', 'male', 68184546853, '0_0'),
(116, 'justintimber', 'a6140ac5d836e57683ad9e56d47a7d7c763029b107fa25b698069b716cb3a69afd9adec208bce99a26f7f70f32aeb8e18ebb14784acc10560e655cb48bb3b731', '5343e3aad4c11d27463e9c93b3f0f17c6cc33ecb700bc769ed8fca4a83f7668cab440f7521413e8e9d26016ec2c6b0b12ae8395a1572d4ed829e38e74a3544fd', '', 0, '', 'Sunday 8th December 2013 05:16:00 am', '', 'male', 68184546853, '0_0'),
(117, 'justintimbers', 'cefbbfc413a196dc0cc3a31db1fb51895fbb160bcbe92dbf2d5ae4440ea0cce7a1d641a1b0e8b2b2e24fef6e30b452fb8b97e2bae71243ee9e9d921b651cca5b', '56ad3f9acb62af4183910698874fd4cac466384f0175219e865f4ba84cec6f4dd8ab1067fa8fd05a88954bac1c1fe7525bcadf275f8b0ddef38558c28f19d5c6', '', 0, '', 'Sunday 8th December 2013 05:17:04 am', '', 'male', 68184546853, '0_0'),
(118, 'justintimbersd', '450594a54e6ae8614c6c8a84b0a789f4dee41cbff0f83fb8e491d557e4313bb23a52a5fd43e6e8a1aa1f337f5050eba656abc886135f8b74062e22a1c455b2e3', '839e608ec751959a8dc708ac0795433e75196a35586b27cdee6ab057365085144671e56925e7ff60dc97af0154c8d5e998deb6568918e91065c077e088bd9510', '', 0, '', 'Sunday 8th December 2013 05:18:35 am', '', 'male', 68184546853, '0_0'),
(119, 'justintimbersda', '3f5d88c3e2a14a5de34274d36a77af1b99f020f0e7e9865af8d217275890838ca5d21d6d13a4af6c1863bfd400931469af41adb812f03bd8270d98353708a869', '1a45bfb4dc3952851b02cd93e9f593c49209a4acf8be4dda0e992ffad2545af3acd16d33844056ec279228d7bc9f25d5660824741e72803c54bbd60fd940b843', '', 0, '', 'Sunday 8th December 2013 05:19:17 am', '', 'male', 68184546853, '0_0'),
(120, 'justintimbersdaa', '150779887ae0c6451de8717daa6da4f16e7a2e9e90e748fe3725e566e9783134b337ff36d36a737010fd50f93d47d004af3213e192f9f87fa2dacc90f92916ff', '359d80d84f4ffa243ccf4acdc81ba90b49faa25240f007784e0d9a70055eb4bbc3b3b4bf8225805fe4ddf04ae4ece446c459f062d0a2f139420158f8f2b0fa37', '', 0, '', 'Sunday 8th December 2013 05:19:32 am', '', 'male', 68184546853, '0_0'),
(121, 'justintimbersdaaa', 'f2c4e613726fa35694f1843154ef353f6590c3d9e08e215d51156d7d3d6ba530ccede27620eecf48f90715c4dbdb36e10911f0fb08d90a33da2e8ac5a4c42d9a', '5d11f0e2981d5dfa4a8bcfd14203d813917ef42612b2c0c1f0f8c822441950abcd30f7d89cb84a65fc22fbbab0890473232df5c97eb5cb945fccfe0aef46f46f', '', 0, '', 'Sunday 8th December 2013 05:19:54 am', '', 'male', 68184546853, '0_0'),
(122, 'justintimbersdaaaa', 'b0ea1eac94d9a71cbcfe2aa437de088b5a6c4652f4e5cc7234488577720e5be59ff38631b6959d2648fb1e49503e544490aa84e32bc1ebda23cd681b92dc9995', '11ed40a4c816f9fa3d8efb33e189bc91832a7b2f8b28d1cd32c91ad64a10af3c549a3d748512542e01aa885a96a2681e1f400bdb53eef15f93dbe06613d8dac3', '', 0, '', 'Sunday 8th December 2013 05:20:13 am', '', 'male', 68184546853, '0_0'),
(123, 'justintimbersdaaaaa', '7f1385add861ab3dd2773b049bab032e0841cd34d1dcbdff9d1cc3caa7c68c464442065288ce91e2667f06d18c62f61ce4514e462622939fa37091f883958e28', '3af47a1ab63cb7dfcfa65f7759be7fbaaa501b2b006c0b14c21f6c6c4ce7d00e40893bc0db8a5e3f3a81e3b45055ac0c3b4e94d900883748b47916c92c4aa7ed', '', 0, '', 'Sunday 8th December 2013 05:22:06 am', '', 'male', 68184546853, '0_0'),
(124, 'justintimbersdaaaaaa', '6a2193ff2669dced596a25948143c1f7dc99a90e5064fbb5031bcfce035e54db7109fb3c00fb1d1f2f10b7ca80df11b4f7ecb16289e1ad7ca4929eb436ed1182', 'aa483d3e50dc83a0e0905db8d1fa63c6bd8ed3551dc66c43d19f29f70a649417bca027aef63647c3fea3419a43ab584e25c9bf4f244bcce9949a56a9d19efc5c', '', 0, '', 'Sunday 8th December 2013 05:22:29 am', '', 'male', 68184546853, '0_0'),
(125, 'justintimberdaaaaaa', '7f5865214b4296d36af6acc68405e4d095e981a9437b9dea61e0f83c2aae7d2384293e11bf4ed4f3b2815dd2877ac4e66acce66d2767f5a6b7d663e499352b62', '36b40e3b4e9a77256045a71466197b913613b18451c199674ada46bfa941c4fe2d8a8de4179fa0e916631ef2670a99ed7becb0a8f5a29c0fe8665a4aafd3de2e', '', 0, '', 'Sunday 8th December 2013 05:23:12 am', '', 'male', 68184546853, '0_0'),
(126, 'justintberdaaaaaa', '4da48d442202503c6869c21363ff5f2ccd6326492e226639f95f72ae45a90ad6827d6b4268dfa236e8ef964c0a489ac55ba57b0d7b044675483d2d72561b1cb2', '08b441c78e21ef92ed1918c51ecfe1e155fbb9ecd19ce2de16dc6c2e911bfa14928695052791abc93784b316d76df4333cc9b8376620080d7813e2f9ced47340', '', 0, '', 'Sunday 8th December 2013 05:24:28 am', '', 'male', 68184546853, '0_0'),
(127, 'justintberaaaaaa', '4a662d79e22f2cbf1960734b60ef317430875f157eed53728fa28cbd20f71ed4fc8959def2fb37e83df0c4ac3a078208b8abe4343d9dbf43e61d53ac3c75d874', '55c55788c5a5284ac6a0980e67945f7b7b652d457ba6b103506ff7b0b99bfe7cce39c6fac3a4a4dbec255e1af2368726e45803ba85ae090046c83f772d0ce57e', '', 0, '', 'Sunday 8th December 2013 05:24:52 am', '', 'male', 68184546853, '0_0'),
(128, 'justintbweraaaaaa', 'e59eb2d56565556abe53c8c473fb19078853ce3ae5c1d3ef59134a43102c25a9dae9f579eeae3315b249e77161b5393e6c96f99b8156477c264eebeaccb523e1', '2abbd1094e3b35501145844d9e3b8d99a3916c383b9845755c1818dd172e9fb05a324451a0d3a0b870dbc52e6f3fb25efee3209eee3c0022ec5d9b93a5a5bfab', '', 0, '', 'Sunday 8th December 2013 05:25:54 am', '', 'male', 68184546853, '0_0'),
(129, 'justintbwweraaaaaa', 'ffad070b7c7348c3280522446280ff0c6de1dd3f3e34fb11857c6d28a9ec247299d470e22327da6274e87a6353aaa56c880bcc82b57f50bb443cd21a7a7b7c54', '36f158d75395d87a28353bf295abb2d37439f09e469307022b7ea3669caa4b65705492e3ac8e10fbe3b100caf86529371d3e802c4f4969291c9ea40123261ac4', '', 0, '', 'Sunday 8th December 2013 05:29:18 am', '', 'male', 68184546853, '0_0'),
(130, 'vvvinayak', '45a8f3c9b36f5ab7eb4c7d9469adf5f4d207416e5a60b31afed6c1fc08a6524780cc5b9abdca1983819ff813f79ca3663bcf4e2017f6f254aa24e4820636b127', '090fe2006500ee3000c6ecea6d5882c2679166004ea4455b09e981e4c0c1618e90ba594f1a2f2939af7f5162a2be4000fc9120b72fcff5a20b45c9615441f34d', '', 0, '', 'Sunday 8th December 2013 06:21:04 am', '', 'male', 68184546853, '0_0'),
(131, 'renuka', '6a57a1ecdb14a101a1de47da6b2b0b83bfd8d907a825fbebb3c83627a53aa74849e0ed6579ffa72904bb8e6ee8e7ecd97417510c913717c50af5e48d9a9d8ad8', '5e9161cf5a589fe7b37bb4c54326b77397f99ef624ab6aa3b16bb79ecdad9e41678e9e45ddd5cd2362ef8e2a21abc53e2ae854b17dd661673ae4458536f56e70', '', 0, '', 'Thursday 12th December 2013 06:49:10 pm', '', 'female', 68184546853, '0_0'),
(132, 'farooqali', 'e007de63e1406fdb22e1760833c7ffe41b4b2e358c8a5d0473d0f04fbd3026b796e273d011abf64882c9ed9e0e786e1f3ca9ac6d87b31843b5d807b9fa782f00', '7b1c1a408d446e5bc0b7f8fa335958fd098321b9b0e192402a081a7c9a46c0c305dbf555bf7b2b99522507e76c022f76667435964cfca29255e4b3fe77d30409', '', 0, '', 'Sunday 29th December 2013 06:50:18 am', '', 'male', 6454165416, '0_0'),
(133, 'imrankhan', '624c4c498f2695f7f33f2b1130748a7401c54c48330a12aa97d63b71a51ea76e9edb95d61c269e7e9d99f9dc7fad53eb1bc7f6082829ba241e8376534ca476b8', '23a7100cebfa3365d520af666eb9dba5e6123f83b7772e6a0208aa9bd9e1299cf959f513e7701ebed4326f397e60b9add6bc87f1dcb457e714322f81fc14c99c', '', 0, '', 'Sunday 29th December 2013 12:43:56 pm', '', 'male', 6454165416, '0_0'),
(134, 'imrankhans', 'cdc3763f548975826f6de4215aafa60d1fe93cf5fbdf0752b943aa45c531be913bbce67e659ba60156df94ec02661af65c4b423145522c963da7b509f5fd6c6d', 'f63ca8cd8b9ea34ed1d718dc449875ee3cf8f8c573ddcab830eaca4011d7a2e37eca8b41db82022bff7f9c56839a2c19f48849ad977b3ba9c235d02affac7d98', '', 0, '', 'Sunday 29th December 2013 12:44:31 pm', '', 'male', 6454165416, '0_0'),
(135, 'imrankhanss', '9cc04cc839e304681291d819f88a75a2d93c968c326d9658a6db9a7d76dbedd8b804d6e57aea714daba7a8e2f727229b4bd6a19f574a13fb8db94bf22eb9f950', '5090aaf75aadfe044664ad5fcdb5a009d0db66c30970f40ba091d8842f59717cbaad63f103e7f454040ffc1cffdb6bd2a9bd1767708775e6f9ae61209221c5cc', '', 0, '', 'Sunday 29th December 2013 12:45:15 pm', '', 'male', 6454165416, '0_0'),
(136, 'anirudh', '75bc2ed9a30fecb2be3589f2b9798f674485c487c7d5653e42985b05c8fcda129150a50b654551ba1a3bdb204050ac7e777f53280c1965aa5e8ae4a701eee444', '9058789dc12b89c7c84fa7c1db710c0ca554a111bfaf310995928c0a6f01dadf20e855bae391534ac186239a69dbb049cad159304d6c1a463fba037ca40a735e', '', 0, '', 'Sunday 29th December 2013 12:48:55 pm', '', 'male', 6454165416, '0_0'),
(137, 'anirudha', '4a5f3b97217d1f4579704972f1eabdec3273d27f6809c22df5be531524a48a3b2a3b59ed3663655351671874be13652ab89e4272fc699b6606102fea1eb762ab', 'e36f02a0fe480755f04b21fd82d5114d91140c8b76886162d5ffbee8c6266a0f6248800903eaaa736e133b76c17508eb7eb7fe0f67a395522275c58159bd5c85', '', 0, '', 'Sunday 29th December 2013 12:49:45 pm', '', 'male', 6454165416, '0_0'),
(138, 'anirudham', '06c3d9fa209f2360c836867031321c3250403092d7fcefd2132500f51cbabab8f29454af878fab7dc774a1292a597f3af4d4f2d23bf11c1df343705bcf9ba032', 'b6194617db2d1eb2d013c3e46b6aa877cc13ec2cb96e71543200de7540a88898a9e341b63c4569139a1e09ee8bd85436fe767f5170ed710605216459f16d1dc7', '', 0, '', 'Sunday 29th December 2013 12:51:23 pm', '', 'male', 6454165416, '0_0'),
(139, 'anirudhamk', '2c82ff28c742b705a40141cd25cb7805664929bbac9cc962f3b0607b5daa77b9564c238f6e06b0822a282b6456b74b251c9f4fc011429cebd457a4050c6b0a9e', '3c747c1b646dc015fd83119eb7a5914595fc3b7069339e4d4ca848677beb6d6d3623a16d691f72e7e5009375c1a4bf7a288a2e77779f1bf8c95560fe38f9d821', '', 0, '', 'Sunday 29th December 2013 12:52:44 pm', '', 'male', 6454165416, '0_0'),
(140, 'anirudhamks', '324d9bc8635dec87165884741507439eb87e655d0f2650b19b66eb6e752beabafaff8ed9ecdc115b23a6d38dca30062e8aea7af5e7bec7f168853b1691d3a063', 'ca53d4145edd83a9e5c4e34911010bc00a5936d744acbdac4cbe9f28a5ade550f79d2f6db1e6dfa6f8e3a49c1df6698eb9b2d3345ccda336587899bed049a946', '', 0, '', 'Sunday 29th December 2013 12:53:55 pm', '', 'male', 6454165416, '0_0'),
(141, 'anirudhamkss', '54f063c935cf7f631d66d7f8fa5dc132efdce11059f251f78715c6284f2b4e03ee98537f65f9d3453c71270938578b4f5e2f83ef89fef163541be3dd97ff8e51', '1796da527c826893c46e2b139720ec2eaa2cedc133edc6f9a485674cf3b8bf0dffe7b2740d4095d36a8e540d28875ee6cf45aa8fb2ae67b264019d0396ebd206', '', 0, '', 'Sunday 29th December 2013 12:54:25 pm', '', 'male', 6454165416, '0_0'),
(142, 'vamsiyadavb', '3569eb3b048e0ecde21f12e773bd4cc5c20134e06b3188d72fe0d9ad415d0d7b20480677e1369ce465ec647889d226ccaf734e359e5f50668d2852d80a7d2317', 'faf0de81014d1d9eefb05901d3ab33b27240c0be5666f6f392fc40bac6ddc238e2c6e8f7578c8b3bcde35203d13c05290e72fe6af0c8b44af84159948ab54692', '', 0, '', 'Sunday 29th December 2013 07:37:59 pm', '', 'male', 3213424, '0_0'),
(143, 'vamsiyadavba', 'dbe6b9fe50798ce2b2e14909dd883547d8b499b0adbcf82870c1dcb920c6f6e744ce5f1348d6157e3e6bbc89dc3beae48349ed487531c5f689b7c6c6beea58cb', '0da13bd4b55ca2e2ce184f8cc3ca7f043fe3256603ab030896dfc4bd2cfb6a44d140341ab1cc9036e9e06163a2ae96808689dd69d29d275f364cc438bd3d8a91', '', 0, '', 'Sunday 29th December 2013 07:39:25 pm', '', 'male', 3213424, '0_0'),
(144, 'mananhemanth', '5ee32b89890a72b208426eea56e5b41f8e550bc998231b336eccb0ac5f4c032bc8b26e79639ce520a48a89fa0e1cb0f7664f0f0330d86ab709d388a7fd89791f', 'f7745d5b10c22256356250704be80dcb560c05184301155da439211bfe44b0e64a79137aa5670433922faa849b5cdb788f7661dd91b3f5697cbb8b326e38261e', '', 0, '', 'Sunday 5th January 2014 09:33:57 am', '', 'male', 6546465465, '0_0'),
(145, 'mananhema', 'eedbc26611cf20fefa8114a2eea0feaaa13301d9bf5d17bd218d616cde1847ccecd35041e8d93a7ae934a8ba57f758c9c273db44604ca563d1db38249b363121', '7a2fc68b215e65277a1294533d61e3801c02dda8f2529c3211fadc5ee907c40440cd71db7159761e05f102ef010e619e8d55e34f64261cca66478a86092fbe33', '', 0, '', 'Sunday 5th January 2014 09:36:05 am', 'mananhemanth@gmail.com', 'male', 6546465465, '0_0'),
(146, 'haree', '2d1fcdfea994f2911f2cfcb55bf478097b2da9db46a2da47dde62b1a116086f1e769109fa9d6314453265ebdfa2527a4c2d6398dd3d4c52ea22845fa3d104063', 'b5fce3e618e291165ea98346b23f7e1a60dcabb9eefc13e00f3e82efe60df448ff2d4e5553bb124576b32b673c8a0591e52da5905c10ed9d1f580c8d5f427833', '', 0, '', 'Sunday 5th January 2014 09:49:25 am', 'haareeeee@gmail.com', 'male', 54548548, '0_0'),
(147, 'haree', '40631128196d0e15881a5ff2fb8a679324eedb87ad025ca54f1a85ff7779776d646356c75f7d52498edb58cbb5ca217c5250731a6a74c0cc2e1c91fb9533d885', '41c58727f2fe811a1a93217a8f8c3c7ac2e5896b98b56d5b2b7ace1576a542b7e248b4a07c2e19c76af925111f38a6ccf2a6ce82bcc187b21fb3d9f4eaf39962', '', 0, '', 'Sunday 5th January 2014 09:50:20 am', 'haareeeecce@gmail.com', 'male', 54548548, '0_0'),
(148, 'haree', '4e710e25a0f8335e2d6c2da3283762d6225c36a4f179e6f4fe9d9755ddfdeb28bab949594622b0554316b500999378a883c843ca2c3aef4fbd25aab8ac8544e8', '72dd552eef35f2916b797093563a0e5f461bbe046b53066d770e3552d3f9e800c0816b2c3ff32a534a59cb9478701b4f0c9b6a98175b42ce37f8664c1fb05251', '', 0, '', 'Sunday 5th January 2014 09:52:30 am', 'haareeecce@gmail.com', 'male', 54548548, '0_0'),
(149, 'haree krishna', '56208d7a4ac25e5e2544131af9664273b8cfe126f42d7a6a2a46e750655603eacbebc0ef09b1fe1b29ee3af323717fee5a87aeb984e13d76639f7782855a07ea', 'da45deec6cbf18bc0ec7311d0c1690e977ffe09d1b3a174dc6c906a2f6940425058963b8583994de24b9ede6ea26df8449d24bfe6d1d69821a030833a62d8549', '', 0, '', 'Sunday 5th January 2014 09:53:00 am', 'haaeeecce@gmail.com', 'male', 54548548, '0_0'),
(150, 'haree krishna', '5a9d74fdaaf34f9ecea9d0a2611c9b49e82ed57535561fffc7e14e4b70e7d63eea6e030229d4fe25ec1695d8b3bff9d97cfb4a1de1a694c339ac6aeffecdc86b', 'b1963023bfd52bcad4081b8ba64e11fdcc7bf39da985d388b5475417482714230c013b4c6cb28eed40687c258afc9eded1aa9b5432b877f12b4a58e9d3efe75e', 'Anguilla', 18, 'ytghj', 'Sunday 5th January 2014 11:05:47 am', 'shake@gmail.com', 'male', 9492552218, '0_1'),
(151, 'baby', '56284e594bb94462c875afa87bdc506d8d7448fac171afecaa8ef48994f7e95688f3c6f01151adc73ad3f27e369e0ea9bdf77c076d4197bf908f7a0b738c971b', '99f31c9caf5636484b97a158c72575f539c85ef86c3bd7b62f865858e1b03f69f54d8d7d3a0146b52b9133ef2503509f1a762f9827929dfae84e614ec9d0380d', 'mumy', 0, '', 'Thursday 19th June 2014 06:51:46 am', 'sunny@gmail.com', 'male', 68184546853, '0_0'),
(152, 'james bond', '83d97594a0352d72a75afc5d55bd8805b57c6673e12cfa16c08b0bc08f0ab8ddaa6f6ccd4b6e2ed459a68b460ea6f09ca74f4ff0cb90b4950c39672fd213a149', 'd952e081e74f3c02c7fbbf0992e1e34ac18986db787c65b646780773b3f71e238225d7bebf1c80ca12cbf623f9e0573f155ced07ce3111fd3b789679a9af2530', '', 0, '', 'Thursday 3rd July 2014 04:28:42 pm', 'hari@gmial.com', 'male', 0, '0_0'),
(153, 'james bond', '91aadeea27fda9b740a03a580ba0ec09e5cb5146f6d6e2f9b0452d90d12aadbc3cb02329cc8597d4ca468a07057ffc36977079d61c9c8752a923f0b6a32ce975', '4cfa6fdb9d9e5e9ac872f2fe41be39ea1721936bf9e32081e4e87e17d3d5f22f83f501bff6522cff58e86e6f3d757694fca8fbf1f8e4dae809d0a16ec5c4e622', '', 0, '', 'Thursday 3rd July 2014 04:30:45 pm', '', 'male', 0, '0_0'),
(154, 'james bond', 'b150c6775aa431ef59357b18eae9248d343d71e96f5697de1a35e0ac7d7adc41bb8dca1ad7766d808b988199a840bf925f37689b9a89420cfe5fdef8ffe74e18', '1942cd45f0c1e1d4add98c56198f73257704400e2a82fdd0950698e498dbd7bdf4fa5c63eb3e4079c01a957bc39848b55898b56fe975aade8f4cd40f473434c0', '', 0, '', 'Thursday 3rd July 2014 04:46:45 pm', '', 'male', 0, '0_0'),
(155, 'james bond', '5de0c0b66d96bfd979e8c70e5df7c022f0409c49d32e1e121216e303261ba4a3d431238d8664bf806adc8a73ea2a2da7f15de7c42fa526fbd9ecf357dbecb338', 'f545cbdc065b03c5d35bc731416d0c553ab1147cf34827e79cb025362ccade14a22d65485f2efb367f541f3c719612da9e8e8db706dc186e5873c65e8ef3a6ae', '', 0, '', 'Thursday 3rd July 2014 04:46:49 pm', '', 'male', 0, '0_0'),
(156, 'james bond', 'd4cbd2c2aedd55a907393a200157b579aaba08870a81c59ad5e9b32dc84445b083501691b599039abbb3c3c1c2e56f3f8aea219a05d894b4a2c48cfe49ebf6c6', '6ed10e1d0f7dac23246054cd9e8595c79792fe5e65d31b2c2e9ae3c235bd259aeb672fb3175f7bd87a3cb06a3cb9f8500f7f4679fd5889d111f5c2d263897ae2', '', 0, '', 'Thursday 3rd July 2014 04:47:37 pm', '', 'male', 0, '0_0'),
(157, 'shake mom', '7cc7d312b1622c7855dc7f3bbf3c540e34f1f4a06924411bfd3e97ba8f42bd12e65b2e4bfb2bd148fc2c4f447d0180e1bedf9003302b276263b923e6de6ead91', 'a3a2df3886220a10c3e7f2ad02fb1e4131e3aa0077fcec28df60f23969292e2bff46eed8dfab54dd8680ab2099891569451829fca434d1aabd5a856a39be4b6f', '', 0, '', 'Friday 4th July 2014 04:47:01 am', 'haareee@auhs', 'male', 0, '0_0'),
(158, 'fa zil', '5baaa3f2f69fdced79f610a75312f9bde7a035553bc6ba4c498edf470008eb4334d50fbab95560b9d8a18691fcc72ae848a3797cbe75538ad43d01a0313ad08d', '8c5a09db0a14457eb0f335be991c4442c3654b88daa7e9e4e8edaf1f0382fcdfefb03b419ec13fb639291d37feb6a73be9c147f8a0b0c6aed5cb8d171d434ad5', '', 0, '', 'Friday 4th July 2014 05:05:49 am', 'hari@gmial.com', 'male', 0, '0_0'),
(159, 'f zil', '188a794f0a26ed849fa010920cf10f18f1fa58eb48277fc656c1658917cd2c96a2650d8c8e95dff1e3974418546dfff51570dd8ae30d342b493ceaa8139cdb8b', '9dcaac7eab5be41b7e17d025ac758273d48a40293b239732ef83f8bc8a32e9e09c360dce7338c3ab536b5394431147b35cd3b201ea45b25d4625e4217fd2b6be', '', 0, '', 'Friday 4th July 2014 05:06:36 am', 'abgskbakjb@jas.com', 'male', 0, '0_0'),
(160, 'asasasa asasasass', 'c63ffb2375eb3790ec7dc5973bb9af2d4b483cb90337c64f4d579d38dd42cd07ed7d6a7a01dd90edd68d54cfb9c3dfdec293c749d99f21a604d6b623102e7612', 'f51e1cf5ad577ad0a8fb477cddc2d7dc1c210f0b7185fe70d0b7f55f16c8f097580169b0f20f8da897da4e4a36dedb6143ccaa148152076f0642986ef2234145', '', 0, '', 'Friday 4th July 2014 07:13:57 am', 'hareee@gmail.com', 'male', 0, '0_0'),
(161, 'shakemom ', 'aae21dfe9875cf1a148f0389f8b7394633ade7e3b811a7e223d67d25f5e31a5af132e403e2ebf181cc71a8ea9b409e8da701305ffe40340874aaaebcd3afc595', '9e6dbacfe155220cf735bfada29db1b14673261de057ea564245627bab8bea2f891a46cd513d9356ab2491ceb6a6134dbd50b2473a36a3ed7566bec96725f877', '', 0, '', 'Friday 4th July 2014 10:02:43 am', 'shakemom@gmail.com', 'male', 0, '0_0'),
(162, 'momshake ', '5176cdc61b8bab2c321ca6ffd0e4fbc07ba941d6494c267d83f29a94abf88ae4fe19a1f9d788024a9020a50443835ab28c3d7e880d2c9d2117b49d255f1a5ba8', '40ffeb59e4f132bcd3968aebbe6ed7fa7c7f32418f3aa5a81c08331e26f6ed5945ac862dad2ebac1ad0d39710ef60827be200dd2167507ecbe6be9dd6edf3d6f', '', 0, '', 'Friday 4th July 2014 10:07:05 am', 'momshake@gmail.com', 'male', 0, '0_0'),
(163, 'james bond', 'd839e12939b67de075a23b50d129612b70ec48a129165a4832b18d52be28b025f19b945c6ec42c55f9b9251bfadc88954be625e486a10359f80de0b00d98d0a7', 'e3bcf2b6be9be77584ea622ace141ee227c558bca77dc5010344d7e22ca39698d2f38444b2e3265029d38cee3d1558fcd0a0d896dedd15d7a1837f1ccd5aae39', '', 0, '', 'Friday 4th July 2014 10:11:50 am', 'jamesbond@gmail.com', 'male', 0, '0_0'),
(164, 'james camaroon', '534b8d65d24d94cddccded4a830631779df452f0d6a1f2d41a7ca68949fe7b09d10f62edf43131dc9532d6633c525c9eebf2ebe59968bde21480cec23b7b8f72', '54ab6be687c33f9de1ab90304480d4fe7a7692f8575cd510f2c0067374bb95992c0eb602f9b1c7f059256e9f98a8fc3ebd9fd45b7c89b0655c634a59e66719b9', '', 0, '', 'Friday 4th July 2014 12:31:10 pm', 'sachin@gmail.com', 'female', 0, '0_0'),
(165, 'sehwag ', '9c09ead76c6fb2e491463b34530c4032ba55cbb0d1b29287bf895afece30e639b9e2d74836a43947394d7022ee3bec071aa224bc510c67bc9290b9a28c1c41ca', '65719b863e8a27d70bc1e35b504d7bd317d41ebaeaca4e1a652d43aab6e76c9694cd44db3cee73f553c975e533cd2b7444b087e1c31e45434a8495e710afbb64', '', 0, '', 'Friday 4th July 2014 01:08:14 pm', 'sehwag@gmail.com', 'male', 0, '0_0'),
(166, 'yuvraj ', '1abdab4502c82fc1d82cd678a00806baa8365a071db9a1d840d51474976507e64e6f686d2bea119ea153d4a7a49e0959f73be3ca77c93c2f68bd5de58fe40ae1', '5404cd54a4492a3a320151600da9fc8bdd408f626d5e9acf6b4a59a3efd669787fa951631f222b601f3df126c2891224074983560a6a9ffb2fece02ea138f3f8', '', 0, '', 'Friday 4th July 2014 01:20:25 pm', 'yuvraj@gmail.com', 'male', 0, '0_0'),
(167, 'yuvraj a', '6d7be7dda6b772c5de7a7bf5f785a494de09f0f70334089a60cad3e861af47fa3b173a8585d6029acab9f13f86869d6417ca774c19f15c22283279f50d6741e7', '1a00c576c0ec0658c92b11936cd3ab19d58ae79122a74a10bb58f04559b34e1f45f5ba1f92f92f4a073f865c1adc98c4aae373d8229f393a065418d6694eea68', '', 0, '', 'Friday 4th July 2014 01:21:35 pm', 'yuvraj@gmail.com', 'male', 0, '0_0'),
(168, 'yuvraj aa', '35ad679e3f5c9135783f0fe302fe77bf5ce008817548f34018aefa0640bfe5bc9b5295ebcbc37aa4ae0d50c5041a64f081896f7790ab9cfcb38f4615a1bca76f', 'c42ab478f72979ddf1ff1a9c201350a20923a291134ff75a823b5164ed48a6c83383e63eba6961444ff3eceb333c8e0f6d22f716d0c94565471ef8130608e566', '', 0, '', 'Friday 4th July 2014 01:22:29 pm', 'yuvraja@gmail.com', 'male', 0, '0_0'),
(169, 'yuvraj aaa', '400143d56df762985a173a11e5fd5d9f5d7085707f3678868acf0e86241a9849fb794f74128a1d94aeb01cf5566e2c994d6345cfd68498c03aed252c4c9ca296', 'f1ac97ed27f5260a59a19fc24275450ba490c401f6f6414ac969914d4339e04a7aff4c1a42a145c1e848b3b6b5ab9d72b0c947622468c26cd709e3dab5eede5e', '', 0, '', 'Friday 4th July 2014 01:24:02 pm', 'yuvraj@yahoo.com', 'male', 0, '0_0'),
(170, 'gayle ', '394cb7d4b1dd5152b7d326b6687f40f286d5c5bbfbca44b5dd37f1abd961431ecc63f50586a2ed8129513f332928f21d50f8b66c764514f5d7f24a9e99e166fe', '253a3c2b860c59f8d2d73d8e0138f09483580495ffa8891ae39348a074b3cd36f6a98c69010de72aeefae1a095613559e4a35e34c643ef4951a91aa01a5b0489', '', 0, '', 'Friday 4th July 2014 01:25:24 pm', 'gayle@gmail.com', 'male', 0, '0_0'),
(171, 'divillers ', '5405df23e2c32da775c5f790d3ae9d89be8000872996c3ba78b033ac2ff62d5c9d7a95812e3d7ffc6b5f2622ec56ec9c89911b7c303f27f4dbfe8f4e85f998e9', 'd890e57d59f98b08cb0617321f5f5e4aad4e3ab7760cb229e915d202d213e55c5faa84e46908cd11c502b0b0459054ab13f4904ac5f0b2a5d4188b5fd63ba05a', '', 0, '', 'Friday 4th July 2014 01:28:30 pm', 'divillers@gmail.com', 'male', 0, '0_0'),
(172, 'divillersa ', '1e0724ed816327b3e4b9dcca7d17a0529f2a0bf7999a87708ec1787d74169ad99a1c30cab8ba9bff1cfe9da1a34b8170a842289dfc562a2ce4be820f4019f334', 'cbf0149101590e8d51de3464d8ffec23d6fba461da6d91b4599a7e269ea1d28ead5ca858ca54fc6315714c12763ea5bd062ca5540eaa71750b5db847b1ee3a78', '', 0, '', 'Friday 4th July 2014 01:30:01 pm', 'divillersa@gmail.com', 'male', 0, '0_0'),
(173, 'balaji ', 'fc2c2f5be3bdad2f7c131b984991a00f59049ee76b42b679383cd1381b21d39bc3fa545559330188eea5bd83b391e1144d1e88a3eea3fd7706d0e8e9d75a5051', '658118d5b64b28bb394dbf61d337bdc9fd078e83d9bb917c42a2d19a067be7a55d2fd87847e9ba0ad5ef4b2c6e79e5b62b194df00341125d7626644471871b02', '', 0, '', 'Friday 4th July 2014 01:32:20 pm', 'balaji@gmail.com', 'male', 0, '0_0'),
(174, 'stephen ', 'b761888154f0a1048ba4cf887e694a8cc909d5635f74b05b17fcb49746a79e4ed04856629ee125da01b9510403acd99a422509b2b5c110025a5e1328657fb708', '081f59df1e8d4f6df186988606479dbafbd9a61c7fcbb83102115e141e91a5e0fd30deed4a559efc6cadffeb89ccb7aa1bf85648e8ccae2a01f93f2f652d1393', '', 0, '', 'Friday 4th July 2014 01:33:54 pm', 'stephen@gmail.com', 'male', 0, '0_0'),
(175, 'female ', '762778d6e348937481c1a0f11c0cf10f114368d5a192b815b0d3dfccef5ba037ea36f5fc4514a669183fedf96d12a7e1ebf8d3ab64f6a45ede2a988aea5fe3bb', 'fdb77474bd981fc75fe890f7aca0a7dd541a9c9458438ce0311c33cabc1fa2d554d3494cf5030686416aabbad6000224e1b6c971f8345b6954559f7d680a6dd8', '', 0, '', 'Friday 4th July 2014 01:35:34 pm', 'female@gmail.com', 'male', 0, '0_0'),
(176, 'femalea ', '135bf0aaf0abeae57ba5899e3bd1bd4a12a589fc1f923608b879ab22a60fe9e301ee64c2760ee2bb8a6bfb4365353c04ca589c0503eea7348cf1543eaa8c390b', '634d543e44d417ea5e7573294916becd9a2105563669bf302db7e9ec9b9937cde47726523e9eb18b74c8b8d81f5d806dee40be5bda351579dfe43cdcb664b47f', '', 0, '', 'Friday 4th July 2014 01:36:29 pm', 'female@gmail.com', 'male', 0, '0_0'),
(177, 'femaleaa ', 'd5b6ca2b7a40331b5c8216a902d2f5d2ae9d058d0fad08d6c10bc1d768150131816be66f82fb12d5aa995c83adfc0132abff629ec07f212d3027d667fc1d404c', '2d16cc501e0654f9a9c6cd92cf59a115ad15a49ff80da9b5ed055a08df7beffa5b5a8a2494d632bf19b26197d787c4a25dcbbbde84134af3257ca39f172cd87b', '', 0, '', 'Friday 4th July 2014 01:37:41 pm', 'female@gmail.com', 'male', 0, '0_0'),
(178, 'femaleaas ', 'ca8d673b44cb1559ac4a8a1b59301a2b765f19876808fa4ba1527eafbab4552fa491964380288af2ea92eedd2614f1a2d0404b19790e1a27f5f2c207d202e25a', '048beef9ce0e2fa84498c5cdde825c8239875e19df8c0abbc07ce12a709460e5bed0d394a6f38cb3a1aa490744c65def513d8677618758bc864f910d3fa34dd3', '', 0, '', 'Friday 4th July 2014 01:38:31 pm', 'female@gmail.com', 'male', 0, '0_0'),
(179, 'femaleaasa ', 'e3ab4b77c9163faece89f948ca90371d597fce83c1bb769bfcfd21933b5f8ff9cfa4aaf58941a9f638ec6444b6eaee75c4875816fa00353a9f0f85329f92b259', '4c3b059ae6f01fe0dfa0c0f9e87b9d8ccf666263add411f85db501d91e60d9a0714630f582c907211793dbbe35729c70a208f6f03ef249eb933ed819536dd34e', '', 0, '', 'Friday 4th July 2014 01:45:51 pm', 'female@gmail.com', 'male', 0, '0_0'),
(180, 'femaleaasaq ', '7d9d1465dafdecdc67ddb4df00b6f03a5ac6e79bc5623e7cc589643694e8d97e0f3edab5d84e73dc49e07e95a6a38a5ba21206c692c3c3ac5015a0c62c03ebcb', '690d4ecff16b53e8437c4fea4566b2c0ec0c7e4447f76e37b6187408f5eb5aff77df2e3b076dc3c1f1aa717b3e3a362e851fb2b8617f82a98d7769f4bd642ee5', '', 0, '', 'Friday 4th July 2014 01:48:38 pm', 'female@gmail.com', 'male', 0, '0_0'),
(181, 'beyonce ', '4adaa1d6455d561d082144d47cc651a79290f2235325aeb744d2369b6b71e5f2d46f823c95b8fbee3e080ab76e526645cd3d5a7beff737e2ec51231755db38ff', '6af7e6a80bb84740d2941d58cd56f75990547d21764aa5c381cea625994b418fce0213b13f7579ee25450fc92593ca23f94df191d53cb4b8c1cc5d4a67e71a25', '', 0, '', 'Friday 4th July 2014 01:55:25 pm', 'beyonce@gmial.com', 'male', 0, '0_0'),
(182, 'beyoncea ', '5d65ce89c8ca9d64b798666eb5b847b95b41073c0d4e7cf012a3c6f036408940b110a44e96619ac1d32807328626da0e4ba03d1da0cc1fe7bdf1c7e46cbfd5c8', '70311528ef0cd60f9f5f5509222809e4aed13903f7f3e73900e7dd0d95e8141ab942c700cb34b8079031c7b7e973e6070f8313bea8b525faad88ad53ce002b7e', '', 0, '', 'Friday 4th July 2014 03:29:29 pm', 'beyonce@gmial.com', 'male', 0, '0_0'),
(183, 'mental ', '1722481afc8be7d0dca443b0277e41e0a1ab75f553d670521b937a6d72604417bd6b71fa99707cd3b2f9a465a327b925e33ba099465838e96eb5619a5f4d9d14', '8632f1120c02e1c82accdfdd2f4c08f99ccac38a1188b9020275e8e041ff569d5a789677f2a76a3af55fe43d57d02f87c2079c17cc020283e6c3e9f3f1e5fe07', '', 0, '', 'Friday 4th July 2014 03:39:19 pm', 'mental@gmail.com', 'male', 0, '0_0'),
(184, 'mentalx ', '7a93fb7b393c674f0afbee8a081708ba37beb80c1be07f370bf086cc966123c83075fea2f90bf5403c5767408d855ee35d86df0c0d8c46048b89feac0a3ecd1f', 'e773d86d4262c3994064ad30febe9df5bba1949035ce9f5e59d0c5eae3444974b01129def3f609e7c86e04772f3320dc295e979fb1253f91f72edfb18f1bee82', '', 0, '', 'Friday 4th July 2014 03:44:11 pm', 'mental@gmail.com', 'female', 0, '0_0'),
(185, 'mentalxa ', 'b2c6d254460d6c9e29578fdff2eb29a803c703db8be2b0f77632279a1151020dd15d551306234e521759dd4d5a24473f9ce93322b31b7aac12013580b8678f1a', '8ad296b10fc45d521e708a552f1040665901aacb83b2792f5413179f451997b0819415120b2aedc3f3df60b956f0c1c1d2ece98bdaabdfed288881faf4b4e015', '', 0, '', 'Friday 4th July 2014 03:45:06 pm', 'mental@gmail.coma', 'female', 0, '0_0'),
(186, 'mentalxasa ', '11b54b89ce68163607b1f6f47e0211053e53c2547f7a539d6cbe8865985a6d3937e584a42b1d81dc7a31f582b6ce5bd55970dd93379f5ce36bb4a46b1ab31d89', '43c4d16355af74d51b1bdbafbe30b026e71cf225ef1d9d742f0a6aecf2c1571e8827fc39a92447243f8869c93dc59b2287cc1110db02baaf391c150438f12439', '', 0, '', 'Friday 4th July 2014 03:47:17 pm', 'ahsva@as.com', 'female', 0, '0_0'),
(187, 'msnarayana ', 'cbb5b936b1c638debfbbe845e0952bca5f20395d3ec432f91294b9024a0400990c321a4632bc450a1276f09ce470e2e0732196ab78a798f2629afda316355695', 'e5fc7e14763282d80dc9462b02bf813b0d02c3e9d0f61950dbb77a4ddedc85ab6700e2b9dbb8eacb2d3b9c2f1217773e9a3a47f6b478d97296977fd3484ced95', '', 0, '', 'Friday 4th July 2014 03:52:42 pm', 'hari@gmial.com', 'male', 0, '0_0'),
(188, 'shakem ', 'ebac2ff5fdda6de566faece1104dccbacbf63a845f68216cba72dc412c3923cb8a78c3c7c3c53e145dc41e7f9bd82028ae41a675af7cca36a4d14eac5996dafc', '71887f70824b26f71ac3d948e78cbd9a5054ea2046ab482285218a13a3fababa2415f3c354036e5da59e4ea0ad28579e6fcf039023508875af19b25d32f19ed9', '', 0, '', 'Friday 4th July 2014 03:53:20 pm', 'abgskbakjb@jas.com', 'male', 0, '0_0'),
(189, 'asasasas s', 'adbf1d7034bfad84ff7637763f5290e73c41a254dbdb9a8bdcaacdae0abc7d90be8f910a1c17efea781ae349ffb3a9a40fb6fc6f07eea3035d7f071e8dfe3700', 'f0ff5eed1cff7e591dfd21d6c7113e15ce05329a149e32769eda5ee5285699e942cbfb837a29637ce721bfded6edf668c6c3bf3fe040df41fc9f487aebbb5a7c', '', 0, '', 'Friday 4th July 2014 04:05:56 pm', 'zen@gmail.com', 'male', 0, '0_0'),
(190, 'asasas ', '4ded054e785545dfed774d309642d453ad545ee12da03653b72e0c5be32e5c83fec1f635339461041fe6e21b49e639b9b269ab769a041dd723c617416abb696c', 'e711e2784363e97159423e40284a8dc6486deb1aa807ff1995389ed3859a8dc198301414781fb2a785388a003c3b8428e62195120ff76726682a85f07034eeaa', '', 0, '', 'Friday 4th July 2014 04:11:11 pm', 'zen@gmail.com', 'male', 0, '0_0'),
(191, 'asasass ', 'b8e9436585ff27fe1914133c49fa785c36ebb930e9540e5adb7cd60d94cbb57797831239955f9212b8132099fece9bc3bb25e1a343e13aeeae00afd709dcd497', 'ae833c5229e821944d03768974fddf09020010123bd89a7a490b1ee70e188bc36bac9e4e00fb88e355e8e49e5997c2abde88095e71a16aa2fbdf65d413367159', '', 0, '', 'Friday 4th July 2014 04:12:50 pm', 'as@asa.com', 'male', 0, '0_0'),
(192, 'asasas s', '056eb9f6a8c75c99b5f0bed58059e629e91bc4e0e125bdcf54157328f530cfd1e0769a7f9459476dff9e155c8fb13f6bd7fdb8cd6864688a9c8b8aa782c325e1', 'af898db1b642ed0ab3aae4964af61f9e9b0cd379f8ecc78d3d925e9b4f2a5a6a36e0d124ffa9d4a0cdffeb669c92d49025d2bcb086ae64ef67bf2ef399701d18', '', 0, '', 'Friday 4th July 2014 04:15:03 pm', 'sasa@as.com', 'male', 0, '0_0'),
(193, 'da vinci', '31695569eb646d0ad76c197bfc563fd1ad24cde397d0e7441355c2df2e1896c3ada523d6a7284a3abeaf7aad740f9cf52cca5722cb0432505963812f7935318b', '445ed9ddd1fefc4b9cc653f27529b1bdf5af393f93b17f84eb822b215fa3c0bec707adab5b3e72de4f3d5bb73858723c7e048b91779cb70e2d37bc7ed076f701', '', 0, '', 'Friday 4th July 2014 04:16:04 pm', 'davinci@gmail.com', 'male', 0, '0_0'),
(195, 'hari', 'as', 'a', NULL, 0, '', '', '', '', 25932, '0_0'),
(196, 'as', 'as', 'as', NULL, 0, '', 'as', '', 'male', 12121, '0_0'),
(197, 'as', 'as', 'as', NULL, 0, '', 'as', 'as', 'as', 1212, '0_0'),
(198, '$name', '', '', NULL, 0, '', '', '', '', 0, '0_0'),
(199, 'bharath', '', '', 'bittu', 0, '', '', 'bittu@gmail.com', '', 0, '0_0'),
(200, 'sd', '', '', 'sd', 0, '', '', '0', '', 0, '0_0');
--
-- Database: `studytable`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `name`, `category`, `location`) VALUES
(3, 'c', 'programming', 'haree.pdf'),
(4, 'c++', 'programming', 'TRY.pdf'),
(5, 'os', 'operating_system', 'haree.pdf'),
(6, 'mysql', 'database', 'TRY.pdf'),
(7, 'db', 'database', 'haree.pdf'),
(8, 'testing', 'software engineering', 'TRY.pdf'),
(9, 'CSS', 'web design', 'TRY.pdf\r\n'),
(10, 'html', 'web design', 'haree.pdf\r\n'),
(11, 'php', 'web design', 'haree.pdf'),
(12, 'ha', 'books/science/20150503_004936.pdf', 'programming'),
(13, 'anjali', 'books/programming/20150503_004936.pdf', 'programming'),
(14, 'fortan', 'programming', 'books/programming/20150503_004936.pdf'),
(15, 'os1', 'operating system', 'TRY.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `standard` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  `studytable` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `password`, `DOB`, `standard`, `email_id`, `phone_no`, `city`, `address`, `doj`, `studytable`) VALUES
(13, 'Anjali', 'hello', '1995-11-09', 'btech', 'chandrawalanjali@gmail.com', '8015928660', 'chennai', 'kk nagar', '0000-00-00', 'a:2:{i:0;a:3:{s:6:"bookid";s:1:"9";s:8:"weekdays";a:2:{i:0;s:6:"monday";i:1;s:7:"tuesday";}s:4:"time";s:2:"30";}i:1;a:3:{s:6:"bookid";s:1:"9";s:8:"weekdays";a:3:{i:0;s:6:"monday";i:1;s:7:"tuesday";i:2;s:9:"wednesday";}s:4:"time";s:2:"30";}}'),
(14, 'harsh', 'deva', '1994-08-08', 'btech', 'harsh8894@gmail.com', '9940341734', 'chennai', 'plot no. 1,gs nagar', '0000-00-00', 'a:1:{i:0;a:3:{s:6:"bookid";s:1:"9";s:8:"weekdays";a:3:{i:0;s:7:"tuesday";i:1;s:9:"wednesday";i:2;s:8:"thursday";}s:4:"time";s:2:"30";}}'),
(15, '7times', 'kartik', '1995-10-19', 'btech', 'chandrawalanjali@gmail.com', '9087684954', 'chennai', 'plot no. 1,gs nagar', '0000-00-00', 'a:1:{i:0;a:3:{s:6:"bookid";s:2:"15";s:8:"weekdays";a:3:{i:0;s:6:"monday";i:1;s:7:"tuesday";i:2;s:9:"wednesday";}s:4:"time";s:2:"30";}}');
--
-- Database: `test1`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
