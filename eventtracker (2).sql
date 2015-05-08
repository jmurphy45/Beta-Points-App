-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2015 at 08:14 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eventtracker`
--
CREATE DATABASE IF NOT EXISTS `eventtracker` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eventtracker`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_ID` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_contact` varchar(255) NOT NULL,
  `event_points` int(11) NOT NULL,
  `event_start` date NOT NULL,
  `event_end` date NOT NULL,
  `event_expiration` date NOT NULL,
  `event_level` int(11) NOT NULL,
  `event_brothersOnly` int(11) NOT NULL DEFAULT '1',
  `event_hidden` int(11) NOT NULL,
  `events_multiple` int(11) NOT NULL,
  `event_deletion` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_ID`, `event_name`, `event_location`, `event_contact`, `event_points`, `event_start`, `event_end`, `event_expiration`, `event_level`, `event_brothersOnly`, `event_hidden`, `events_multiple`, `event_deletion`) VALUES
(1, 'no name', '', '', 30, '2015-04-17', '2015-04-16', '2015-04-30', 1, 0, 1, 0, 0),
(2, 'event1125', '', '', 30, '2015-04-16', '2015-04-16', '2015-04-30', 1, 0, 1, 0, 1),
(3, 'test2', '', '', 44, '2015-04-15', '2015-04-15', '2015-04-15', 3, 0, 0, 1, 1),
(4, 'test2', '', '', 44, '2015-04-15', '2015-04-15', '2015-04-15', 3, 0, 0, 1, 1),
(5, 'test11', '', '', 20, '2015-04-16', '2015-04-16', '2015-04-16', 3, 0, 1, 0, 1),
(6, '', '', '', 0, '0000-00-00', '0000-00-00', '0000-00-00', 0, 1, 0, 0, 1),
(7, 'event_name', 'event_location', 'event_contact', 0, '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 1),
(10, 'foo', 'foo', 'event_contact', 40, '2015-04-16', '2015-04-30', '2015-05-07', 3, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `eventsandusers`
--

CREATE TABLE IF NOT EXISTS `eventsandusers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `zeta_num` varchar(255) NOT NULL,
  `event_ID` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `time_stamp` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `eventsandusers`
--

INSERT INTO `eventsandusers` (`ID`, `username`, `zeta_num`, `event_ID`, `event_name`, `time_stamp`) VALUES
(11, 'root', '23', 2, 'event1125', '2015-04-29 03:08:00'),
(12, 'root', '23', 2, 'event1125', '2015-04-29 03:09:00'),
(13, 'root', '23', 2, 'event1125', '2015-04-29 03:11:00'),
(14, 'root', '23', 2, 'event1125', '2015-04-29 03:40:00'),
(16, 'root', '23', 7, 'event_name', '2015-04-29 03:20:00'),
(17, 'root', '23', 5, 'test11', '2015-04-29 03:37:00'),
(26, 'root', '23', 2, 'event1125', '2015-04-29 06:24:00'),
(27, 'root', '23', 2, 'event1125', '2015-04-29 06:10:00'),
(29, 'root', '23', 2, 'event1125', '2015-04-29 06:17:00'),
(30, 'root', '23', 5, 'test11', '2015-04-29 06:08:00'),
(32, 'root', '23', 10, 'foo', '2015-04-29 06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gateway`
--

CREATE TABLE IF NOT EXISTS `gateway` (
  `gid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `carrier` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`gid`),
  KEY `carrier` (`carrier`,`address`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=344 ;

--
-- Dumping data for table `gateway`
--

INSERT INTO `gateway` (`gid`, `carrier`, `address`) VALUES
(1, '3 River Wireless', 'sms.3rivers.net'),
(2, '7-11 Speakout (USA GSM)', 'number@cingularme.com'),
(3, 'ACS Wireless', 'paging.acswireless.com'),
(4, 'Advantage Communications', 'advantagepaging.com'),
(5, 'Airtel (Karnataka, India)', 'number@airtelkk.com'),
(6, 'Airtel Wireless (Montana, USA)', 'number@sms.airtelmontana.com'),
(7, 'Airtouch Pagers', 'airtouch.net'),
(8, 'Airtouch Pagers', 'airtouchpaging.com'),
(9, 'Airtouch Pagers', 'alphapage.airtouch.com'),
(10, 'Airtouch Pagers', 'myairmail.com'),
(11, 'Alaska Communications Systems', 'number@msg.acsalaska.com'),
(12, 'Alltel', 'message.alltel.com'),
(13, 'Alltel PCS', 'message.alltel.com'),
(14, 'AlphaNow', 'alphanow.net'),
(15, 'AlphNow', 'pin@alphanow.net'),
(16, 'American Messaging', 'page.americanmessaging.net'),
(17, 'American Messaging (SBC/Ameritech)', 'page.americanmessaging.net'),
(18, 'Ameritech Clearpath', 'clearpath.acswireless.com'),
(19, 'Ameritech Paging', 'paging.acswireless.com'),
(20, 'Ameritech Paging (see also American Messaging)', 'pageapi.com'),
(21, 'Ameritech Paging (see also American Messaging)', 'paging.acswireless.com'),
(22, 'Andhra Pradesh Airtel', 'airtelap.com'),
(23, 'Aql', 'number@text.aql.com'),
(24, 'Arch Pagers (PageNet)', 'archwireless.net'),
(25, 'Arch Pagers (PageNet)', 'epage.arch.com'),
(26, 'AT&T', 'mobile.att.net'),
(27, 'AT&T', 'txt.att.net'),
(28, 'AT&T Enterprise Paging', 'number@page.att.net'),
(29, 'AT&T Free2Go', 'mmode.com'),
(30, 'AT&T PCS', 'mobile.att.net'),
(31, 'AT&T Pocketnet PCS', 'dpcs.mobile.att.net'),
(32, 'BeeLine GSM', 'sms.beemail.ru'),
(33, 'Beepwear', 'beepwear.net'),
(34, 'Bell Atlantic', 'message.bam.com'),
(35, 'Bell Canada', 'bellmobility.ca'),
(36, 'Bell Canada', 'txt.bellmobility.ca'),
(37, 'Bell Mobility', 'txt.bellmobility.ca'),
(38, 'Bell Mobility & Solo Mobile (Canada)', 'number@txt.bell.ca'),
(39, 'Bell Mobility (Canada)', 'txt.bell.ca'),
(40, 'Bell South', 'bellsouth.cl'),
(41, 'Bell South', 'blsdcs.net'),
(42, 'Bell South', 'sms.bellsouth.com'),
(43, 'Bell South', 'wireless.bellsouth.com'),
(44, 'Bell South (Blackberry)', 'bellsouthtips.com'),
(45, 'Bell South Mobility', 'blsdcs.net'),
(46, 'BigRedGiant Mobile Solutions', 'number@tachyonsms.co.uk'),
(47, 'Blue Sky Frog', 'blueskyfrog.com'),
(48, 'Bluegrass Cellular', 'sms.bluecell.com'),
(49, 'Boost', 'myboostmobile.com'),
(50, 'Boost Mobile', 'myboostmobile.com'),
(51, 'BPL Mobile', 'bplmobile.com'),
(52, 'BPL Mobile (Mumbai, India)', 'number@bplmobile.com'),
(53, 'Carolina Mobile Communications', 'cmcpaging.com'),
(54, 'Carolina West Wireless', 'cwwsms.com'),
(55, 'Cellular One', 'cell1.textmsg.com'),
(56, 'Cellular One', 'cellularone.textmsg.com'),
(57, 'Cellular One', 'cellularone.txtmsg.com'),
(58, 'Cellular One', 'message.cellone-sf.com'),
(59, 'Cellular One', 'mobile.celloneusa.com'),
(60, 'Cellular One', 'sbcemail.com'),
(61, 'Cellular One (Dobson)', 'number@mobile.celloneusa.com'),
(62, 'Cellular One (East Coast)', 'phone.cellone.net'),
(63, 'Cellular One (South West)', 'swmsg.com'),
(64, 'Cellular One (West)', 'mycellone.com'),
(65, 'Cellular One East Coast', 'phone.cellone.net'),
(66, 'Cellular One PCS', 'paging.cellone-sf.com'),
(67, 'Cellular One South West', 'swmsg.com'),
(68, 'Cellular One West', 'mycellone.com'),
(69, 'Cellular South', 'csouth1.com'),
(70, 'Centennial Wireless', 'cwemail.com'),
(71, 'Centennial Wireless', 'number@cwemail.com'),
(72, 'Central Vermont Communications', 'cvcpaging.com'),
(73, 'CenturyTel', 'messaging.centurytel.net'),
(74, 'CenturyTel', 'messaging.centurytel.net'),
(75, 'Chennai RPG Cellular', 'rpgmail.net'),
(76, 'Chennai Skycell / Airtel', 'airtelchennai.com'),
(77, 'Cincinnati Bell', 'gocbw.com'),
(78, 'Cincinnati Bell Wireless', 'gocbw.com'),
(79, 'Cingular', 'cingularme.com'),
(80, 'Cingular', 'mms.cingularme.com'),
(81, 'Cingular', 'mycingular.com'),
(82, 'Cingular', 'mycingular.net'),
(83, 'Cingular', 'page.cingular.com'),
(84, 'Cingular (GoPhone prepaid)', 'number@cingularme.com (SMS)'),
(85, 'Cingular (Now AT&T)', 'txt.att.net'),
(86, 'Cingular (Postpaid)', 'number@cingularme.com'),
(87, 'Cingular Wireless', 'mobile.mycingular.com'),
(88, 'Cingular Wireless', 'mobile.mycingular.net'),
(89, 'Cingular Wireless', 'mycingular.textmsg.com'),
(90, 'Claro (Brasil)', 'number@clarotorpedo.com.br'),
(91, 'Claro (Nicaragua)', 'number@ideasclaro-ca.com'),
(92, 'Clearnet', 'msg.clearnet.com'),
(93, 'Comcast', 'comcastpcs.textmsg.com'),
(94, 'Comcel', 'number@comcel.com.co'),
(95, 'Communication Specialist Companies', 'pin@pager.comspeco.com'),
(96, 'Communication Specialists', '7digitpin@pageme.comspeco.net'),
(97, 'Communication Specialists', 'pageme.comspeco.net'),
(98, 'Comviq', 'sms.comviq.se'),
(99, 'Cook Paging', 'cookmail.com'),
(100, 'Corr Wireless Communications', 'corrwireless.net'),
(101, 'Cricket', 'number@sms.mycricket.com (SMS)'),
(102, 'Cricket Wireless', 'sms.mycricket.com'),
(103, 'CTI', 'number@sms.ctimovil.com.ar'),
(104, 'Delhi Aritel', 'airtelmail.com'),
(105, 'Delhi Hutch', 'delhi.hutch.co.in'),
(106, 'Digi-Page / Page Kansas', 'page.hit.net'),
(107, 'Dobson', 'mobile.dobson.net'),
(108, 'Dobson Cellular Systems', 'mobile.dobson.net'),
(109, 'Dobson-Alex Wireless / Dobson-Cellular One', 'mobile.cellularone.com'),
(110, 'DT T-Mobile', 't-mobile-sms.de'),
(111, 'Dutchtone / Orange-NL', 'sms.orange.nl'),
(112, 'Edge Wireless', 'sms.edgewireless.com'),
(113, 'EMT', 'sms.emt.ee'),
(114, 'Emtel (Mauritius)', 'number@emtelworld.net'),
(115, 'Escotel', 'escotelmobile.com'),
(116, 'Fido', 'fido.ca'),
(117, 'Fido (Canada)', 'number@fido.ca'),
(118, 'Gabriel Wireless', 'epage.gabrielwireless.com'),
(119, 'Galaxy Corporation', 'sendabeep.net'),
(120, 'GCS Paging', 'webpager.us'),
(121, 'General Communications Inc.', 'number@msg.gci.net'),
(122, 'German T-Mobile', 't-mobile-sms.de'),
(123, 'Globalstar (satellite)', 'number@msg.globalstarusa.com'),
(124, 'Goa BPLMobil', 'bplmobile.com'),
(125, 'Golden Telecom', 'sms.goldentele.com'),
(126, 'GrayLink / Porta-Phone', 'epage.porta-phone.com'),
(127, 'GTE', 'airmessage.net'),
(128, 'GTE', 'gte.pagegate.net'),
(129, 'GTE', 'messagealert.com'),
(130, 'Gujarat Celforce', 'celforce.com'),
(131, 'Helio', 'messaging.sprintpcs.com'),
(132, 'Helio', 'number@messaging.sprintpcs.com'),
(133, 'Houston Cellular', 'text.houstoncellular.net'),
(134, 'i wireless', 'number.iws@iwspcs.net'),
(135, 'Idea Cellular', 'ideacellular.net'),
(136, 'Illinois Valley Cellular', 'ivctext.com'),
(137, 'Illinois Valley Cellular', 'number@ivctext.com'),
(138, 'Indiana Paging Co', 'inlandlink.com'),
(139, 'Infopage Systems', 'page.infopagesystems.com'),
(140, 'Infopage Systems', 'pinnumber@page.infopagesystems.com'),
(141, 'Inland Cellular Telephone', 'inlandlink.com'),
(142, 'Iridium (satellite)', 'number@msg.iridium.com'),
(143, 'Iusacell', 'number@rek2.com.mx'),
(144, 'JSM Tele-Page', 'jsmtel.com'),
(145, 'JSM Tele-Page', 'pinnumber@jsmtel.com'),
(146, 'Kerala Escotel', 'escotelmobile.com'),
(147, 'Kolkata Airtel', 'airtelkol.com'),
(148, 'Koodo Mobile (Canada)', 'number@msg.koodomobile.com'),
(149, 'Kyivstar', 'smsmail.lmt.lv'),
(150, 'Lauttamus Communication', 'e-page.net'),
(151, 'Life (Ukraine)', '380*********@life.com.ua'),
(152, 'LMT', 'smsmail.lmt.lv'),
(153, 'LMT (Latvia)', 'number@sms.lmt.lv'),
(154, 'Maharashtra BPL Mobile', 'bplmobile.com'),
(155, 'Maharashtra Idea Cellular', 'ideacellular.net'),
(156, 'Manitoba Telecom Systems', 'text.mtsmobility.com'),
(157, 'MCI', 'pagemci.com'),
(158, 'MCI Phone', 'mci.com'),
(159, 'Mero Mobile (Nepal)', '977number@sms.spicenepal.com'),
(160, 'Meteor', 'mymeteor.ie'),
(161, 'Meteor', 'sms.mymeteor.ie'),
(162, 'Meteor (Ireland)', 'number@sms.mymeteor.ie'),
(163, 'Metro PCS', 'metropcs.sms.us'),
(164, 'Metro PCS', 'mymetropcs.com'),
(165, 'Metro PCS', 'mymetropcs.com, metropcs.sms.us'),
(166, 'Metrocall', 'page.metrocall.com'),
(167, 'Metrocall 2-way', 'my2way.com'),
(168, 'MetroPCS', 'number@mymetropcs.com'),
(169, 'Microcell', 'fido.ca'),
(170, 'Midwest Wireless', 'clearlydigital.com'),
(171, 'MiWorld', 'm1.com.sg'),
(172, 'Mobilcomm', 'mobilecomm.net'),
(173, 'Mobilecom PA', 'page.mobilcom.net'),
(174, 'Mobilecomm', 'mobilecomm.net'),
(175, 'Mobileone', 'm1.com.sg'),
(176, 'Mobilfone', 'page.mobilfone.com'),
(177, 'Mobility Bermuda', 'ml.bm'),
(178, 'MobiPCS (Hawaii only)', 'number@mobipcs.net'),
(179, 'Mobistar Belgium', 'mobistar.be'),
(180, 'Mobitel (Sri Lanka)', 'number@sms.mobitel.lk'),
(181, 'Mobitel Tanzania', 'sms.co.tz'),
(182, 'Mobtel Srbija', 'mobtel.co.yu'),
(183, 'Morris Wireless', 'beepone.net'),
(184, 'Motient', 'isp.com'),
(185, 'Movicom (Argentina)', 'number@sms.movistar.net.ar'),
(186, 'Movistar', 'correo.movistar.net'),
(187, 'Movistar (Colombia)', 'number@movistar.com.co'),
(188, 'MTN (South Africa)', 'number@sms.co.za'),
(189, 'MTS', 'text.mtsmobility.com'),
(190, 'MTS (Canada)', 'number@text.mtsmobility.com'),
(191, 'Mumbai BPL Mobile', 'bplmobile.com'),
(192, 'Mumbai Orange', 'orangemail.co.in'),
(193, 'NBTel', 'wirefree.informe.ca'),
(194, 'Netcom', 'sms.netcom.no'),
(195, 'Nextel', 'messaging.nextel.com'),
(196, 'Nextel', 'nextel.com.br'),
(197, 'Nextel', 'page.nextel.com'),
(198, 'Nextel (Argentina)', 'TwoWay.11number@nextel.net.ar'),
(199, 'Nextel (United States)', 'number@messaging.nextel.com'),
(200, 'Northeast Paging', 'pager.ucom.com'),
(201, 'NPI Wireless', 'npiwireless.com'),
(202, 'Ntelos', 'pcs.ntelos.com'),
(203, 'O2', 'o2.co.uk'),
(204, 'O2', 'o2imail.co.uk'),
(205, 'O2 (M-mail)', 'mmail.co.uk'),
(206, 'Omnipoint', 'omnipoint.com'),
(207, 'Omnipoint', 'omnipointpcs.com'),
(208, 'One Connect Austria', 'onemail.at'),
(209, 'OnlineBeep', 'onlinebeep.net'),
(210, 'Optus Mobile', 'optusmobile.com.au'),
(211, 'Orange', 'orange.net'),
(212, 'Orange - NL / Dutchtone', 'sms.orange.nl'),
(213, 'Orange Mumbai', 'orangemail.co.in'),
(214, 'Orange NL / Dutchtone', 'sms.orange.nl'),
(215, 'Orange Polska (Poland)', '9digit@orange.pl'),
(216, 'Oskar', 'mujoskar.cz'),
(217, 'P&T Luxembourg', 'sms.luxgsm.lu'),
(218, 'Pacific Bell', 'pacbellpcs.net'),
(219, 'PageMart', '7digitpinnumber@pagemart.net'),
(220, 'PageMart Advanced /2way', 'airmessage.net'),
(221, 'PageMart Canada', 'pmcl.net'),
(222, 'PageNet Canada', 'e.pagenet.ca'),
(223, 'PageNet Canada', 'pagegate.pagenet.ca'),
(224, 'PageOne NorthWest', 'page1nw.com'),
(225, 'PCS One', 'pcsone.net'),
(226, 'Personal (Argentina)', 'number@alertas.personal.com.ar'),
(227, 'Personal Communication', 'sms@pcom.ru (number in subject line)'),
(228, 'Personal Communication', 'sms@pcom.ru (put the number in the subject line)'),
(229, 'Pioneer / Enid Cellular', 'msg.pioneerenidcellular.com'),
(230, 'Plus GSM (Poland)', '+48number@text.plusgsm.pl'),
(231, 'PlusGSM', 'text.plusgsm.pl'),
(232, 'Pondicherry BPL Mobile', 'bplmobile.com'),
(233, 'Powertel', 'voicestream.net'),
(234, 'President?s Choice (Canada)', 'number@txt.bell.ca'),
(235, 'President''s Choice', 'txt.bell.ca'),
(236, 'Price Communications', 'mobilecell1se.com'),
(237, 'Primeco', 'email.uscc.net'),
(238, 'Primtel', 'sms.primtel.ru'),
(239, 'ProPage', '7digitpagernumber@page.propage.net'),
(240, 'Public Service Cellular', 'sms.pscel.com'),
(241, 'Qualcomm', 'name@pager.qualcomm.com'),
(242, 'Qwest', 'number@qwestmp.com'),
(243, 'Qwest', 'qwestmp.com'),
(244, 'RAM Page', 'ram-page.com'),
(245, 'Rogers', 'pcs.rogers.com'),
(246, 'Rogers (Canada)', 'number@pcs.rogers.com'),
(247, 'Rogers AT&T Wireless', 'pcs.rogers.com'),
(248, 'Rogers Canada', 'pcs.rogers.com'),
(249, 'Safaricom', 'safaricomsms.com'),
(250, 'Sasktel (Canada)', 'number@sms.sasktel.com'),
(251, 'Satelindo GSM', 'satelindogsm.com'),
(252, 'Satellink', '.pageme@satellink.net'),
(253, 'Satellink', 'satellink.net'),
(254, 'SBC Ameritech Paging', 'paging.acswireless.com'),
(255, 'SBC Ameritech Paging (see also American Messaging)', 'paging.acswireless.com'),
(256, 'SCS-900', 'phonenumber@scs-900.ru'),
(257, 'SCS-900', 'scs-900.ru'),
(258, 'Setar Mobile email (Aruba)', '297+number@mas.aw'),
(259, 'SFR France', 'sfr.fr'),
(260, 'Simple Freedom', 'text.simplefreedom.net'),
(261, 'Skytel Pagers', '7digitpinnumber@skytel.com'),
(262, 'Skytel Pagers', 'email.skytel.com'),
(263, 'SL Interactive (Australia)', 'number@slinteractive.com.au'),
(264, 'Smart Telecom', 'mysmart.mymobile.ph'),
(265, 'Solo Mobile', 'txt.bell.ca'),
(266, 'Southern LINC', 'page.southernlinc.com'),
(267, 'Southwestern Bell', 'email.swbw.com'),
(268, 'Sprint', 'cingularme.com, messaging.sprintpcs.com'),
(269, 'Sprint', 'messaging.sprintpcs.com'),
(270, 'Sprint', 'sprintpaging.com'),
(271, 'Sprint PCS', 'messaging.sprintpcs.com'),
(272, 'ST Paging', 'pin@page.stpaging.com'),
(273, 'Sumcom', 'tms.suncom.com'),
(274, 'Suncom', 'number@tms.suncom.com'),
(275, 'SunCom', 'suncom1.com'),
(276, 'Suncom', 'tms.suncom.com'),
(277, 'Sunrise Mobile', 'freesurf.ch'),
(278, 'Sunrise Mobile', 'mysunrise.ch'),
(279, 'Sunrise Mobile', 'swmsg.com'),
(280, 'Surewest Communicaitons', 'mobile.surewest.com'),
(281, 'Surewest Communications', 'freesurf.ch'),
(282, 'Swisscom', 'bluewin.ch'),
(283, 'Tamil Nadu BPL Mobile', 'bplmobile.com'),
(284, 'Tele2 Latvia', 'sms.tele2.lv'),
(285, 'Telefonica Movistar', 'movistar.net'),
(286, 'Telenor', 'mobilpost.no'),
(287, 'Teletouch', 'pageme.teletouch.com'),
(288, 'Telia Denmark', 'gsm1800.telia.dk'),
(289, 'Telus', 'msg.telus.com'),
(290, 'Telus Mobility (Canada)', 'number@msg.telus.com'),
(291, 'The Indiana Paging Co', 'last4digits@pager.tdspager.com'),
(292, 'Thumb Cellular', 'number@sms.thumbcellular.com'),
(293, 'Tigo (Formerly Ola)', 'number@sms.tigo.com.co'),
(294, 'TIM', 'timnet.com'),
(295, 'T-Mobile', 'tmomail.net'),
(296, 'T-Mobile', 'voicestream.net'),
(297, 'T-Mobile (Austria)', 'number@sms.t-mobile.at'),
(298, 'T-Mobile (UK)', 'number@t-mobile.uk.net'),
(299, 'T-Mobile Austria', 'sms.t-mobile.at'),
(300, 'T-Mobile Germany', 't-d1-sms.de'),
(301, 'T-Mobile UK', 't-mobile.uk.net'),
(302, 'Tracfone', 'txt.att.net'),
(303, 'Tracfone (prepaid)', 'number@mmst5.tracfone.com'),
(304, 'Triton', 'tms.suncom.com'),
(305, 'TSR Wireless', 'alphame.com'),
(306, 'TSR Wireless', 'beep.com'),
(307, 'U.S. Cellular', 'email.uscc.net'),
(308, 'UCOM', 'pager.ucom.com'),
(309, 'UMC', 'sms.umc.com.ua'),
(310, 'Unicel', 'number@utext.com'),
(311, 'Unicel', 'utext.com'),
(312, 'Uraltel', 'sms.uraltel.ru'),
(313, 'US Cellular', 'email.uscc.net'),
(314, 'US Cellular', 'smtp.uscc.net'),
(315, 'US Cellular', 'uscc.textmsg.com'),
(316, 'US West', 'uswestdatamail.com'),
(317, 'Uttar Pradesh Escotel', 'escotelmobile.com'),
(318, 'Verizon', 'vtext.com'),
(319, 'Verizon Pagers', 'myairmail.com'),
(320, 'Verizon PCS', 'myvzw.com'),
(321, 'Verizon PCS', 'vtext.com'),
(322, 'Vessotel', 'pager.irkutsk.ru'),
(323, 'Virgin Mobile', 'vmobl.com '),
(324, 'Virgin Mobile', 'vxtras.com'),
(325, 'Virgin Mobile (Canada)', 'number@vmobile.ca'),
(326, 'Virgin Mobile Canada', 'vmobile.ca'),
(327, 'Vodacom (South Africa)', 'number@voda.co.za'),
(328, 'Vodafone (Italy)', 'number@sms.vodafone.it'),
(329, 'Vodafone Italy', 'sms.vodafone.it'),
(330, 'Vodafone Japan', 'c.vodafone.ne.jp'),
(331, 'Vodafone Japan', 'h.vodafone.ne.jp'),
(332, 'Vodafone Japan', 't.vodafone.ne.jp'),
(333, 'Vodafone UK', 'vodafone.net'),
(334, 'VoiceStream', 'voicestream.net'),
(335, 'VoiceStream / T-Mobile', 'voicestream.net'),
(336, 'WebLink Wiereless', 'airmessage.net'),
(337, 'WebLink Wiereless', 'pagemart.net'),
(338, 'WebLink Wireless', 'airmessage.net'),
(339, 'WebLink Wireless', 'pagemart.net'),
(340, 'West Central Wireless', 'sms.wcc.net'),
(341, 'Western Wireless', 'cellularonewest.com'),
(342, 'Wyndtell', 'wyndtell.com'),
(343, 'YCC', 'number@sms.ycc.ru');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_zeta` int(11) DEFAULT NULL,
  `user_firstName` varchar(255) NOT NULL,
  `user_lastName` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phoneNumber` varchar(10) NOT NULL,
  `gateway_ID` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_level` int(1) NOT NULL,
  `user_update` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_zeta`, `user_firstName`, `user_lastName`, `user_email`, `user_phoneNumber`, `gateway_ID`, `user_username`, `user_password`, `user_level`, `user_update`) VALUES
(1, NULL, 'Joseph', 'Murphy', 'test@test.com', '901123321', 0, 'jmurphy', '123', 4, 1),
(132, 23, 'Joe', 'Murphy', 'jmrphyii@aol.com', '9018755562', 1, 'jriley', 'sa1027jr', 3, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;