-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for miisindb
CREATE DATABASE IF NOT EXISTS `miisindb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `miisindb`;

-- Dumping structure for table miisindb.tbchats
CREATE TABLE IF NOT EXISTS `tbchats` (
  `ChatID` smallint(6) NOT NULL,
  `ChatLog` longtext,
  `Admin` varchar(16) NOT NULL,
  `Password` varchar(16) DEFAULT NULL COMMENT 'If a admin wants to put a password on the chat',
  `Name` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`ChatID`),
  KEY `FK_tbchats_tbuserinfo` (`Admin`),
  CONSTRAINT `FK_tbchats_tbuserinfo` FOREIGN KEY (`Admin`) REFERENCES `tbuserinfo` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This holds all the information on chats';

-- Dumping data for table miisindb.tbchats: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbchats` DISABLE KEYS */;
INSERT INTO `tbchats` (`ChatID`, `ChatLog`, `Admin`, `Password`, `Name`) VALUES
	(0, 'Weather man', 'MSN4Lyfe', '', NULL),
	(1, NULL, 'Sloth', NULL, 'Squash'),
	(2, NULL, 'Sloth', NULL, 'Water');
/*!40000 ALTER TABLE `tbchats` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbemailinfo
CREATE TABLE IF NOT EXISTS `tbemailinfo` (
  `EmailID` smallint(6) NOT NULL AUTO_INCREMENT,
  `Email` tinytext NOT NULL,
  PRIMARY KEY (`EmailID`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1 COMMENT='This holds the user''s email';

-- Dumping data for table miisindb.tbemailinfo: ~127 rows (approximately)
/*!40000 ALTER TABLE `tbemailinfo` DISABLE KEYS */;
INSERT INTO `tbemailinfo` (`EmailID`, `Email`) VALUES
	(1, 'nathanskof@gmail.com'),
	(2, 'pitm7280@mylaurier.ca'),
	(3, 'skof4880@mylaurier.ca'),
	(13, 'sloth@gigs.com'),
	(14, 'mskof@gmail.com'),
	(18, 'Someoftheseare@real.com'),
	(19, 'Weatherman@forecast.com'),
	(20, 'Keeks@email.com'),
	(21, 'JennaSkof@gmail.com'),
	(22, 'MichaelSkof@gmail.com'),
	(23, 'KimSkof@gmail.com'),
	(24, 'JordanBrown@gmail.com'),
	(25, 'KimDunn@gmail.com'),
	(26, 'ScoobyDoo@gmail.com'),
	(27, 'Velma@gmail.com'),
	(28, 'Daphine@gmail.com'),
	(29, 'Shaggy@gmail.com'),
	(30, 'Fred@gmail.com'),
	(31, 'Donald@gmail.com'),
	(32, 'Glover@gmail.com'),
	(33, 'Retro@gmail.com'),
	(34, 'WestSide@gmail.com'),
	(35, 'PostMalone@gmail.com'),
	(36, 'DanSu@gmail.com'),
	(37, 'Internet@gmail.com'),
	(38, 'Computing@gmail.com'),
	(39, 'Armani@gmail.com'),
	(40, 'Expression@gmail.com'),
	(41, 'Forecast@rain.com'),
	(42, 'JSmith@email.com'),
	(43, 'TimHortons@email.com'),
	(44, 'farm@heynow.com'),
	(45, 'w@mail.com'),
	(46, 'slooter@gmail.co'),
	(47, 'fewii@udfssudsf.com'),
	(48, 'das@faasd.com'),
	(49, 'JonnyCash@music.com'),
	(50, 'becauseoftheinternet@email.com'),
	(51, 'thisisboring@fake.com'),
	(52, '13@fake.com'),
	(53, '14@fake.com'),
	(54, '15@fake.com'),
	(55, '16@fake.com'),
	(56, '17@fake.com'),
	(57, '18@fake.com'),
	(58, '19@fake.com'),
	(59, '20@fake.com'),
	(60, '21@fake.com'),
	(61, '22@fake.com'),
	(62, '23@fake.com'),
	(63, '24@fake.com'),
	(64, '25@fake.com'),
	(65, '26@fake.com'),
	(66, '27@fake.com'),
	(67, '28@fake.com'),
	(68, '29@fake.com'),
	(69, '30@fake.com'),
	(70, '31@fake.com'),
	(71, '32@fake.com'),
	(72, '33@fake.com'),
	(73, '34@fake.com'),
	(74, '35@fake.com'),
	(75, '36@fake.com'),
	(76, '37@fake.com'),
	(77, '38@fake.com'),
	(78, '39@fake.com'),
	(79, '40@fake.com'),
	(80, '41@fake.com'),
	(81, '42@fake.com'),
	(82, '43@fake.com'),
	(83, '44@fake.com'),
	(84, '45@fake.com'),
	(85, '46@fake.com'),
	(86, '47@fake.com'),
	(87, '48@fake.com'),
	(88, '49@fake.com'),
	(89, '50@fake.com'),
	(90, '51@fake.com'),
	(91, '52@fake.com'),
	(92, '53@fake.com'),
	(93, '54@fake.com'),
	(94, '55@fake.com'),
	(95, '56@fake.com'),
	(96, '57@fake.com'),
	(97, '58@fake.com'),
	(98, '59@fake.com'),
	(99, '60@fake.com'),
	(100, '61@fake.com'),
	(101, '62@fake.com'),
	(102, '63@fake.com'),
	(103, '64@fake.com'),
	(104, '65@fake.com'),
	(105, '66@fake.com'),
	(106, '67@fake.com'),
	(107, '68@fake.com'),
	(108, '69@fake.com'),
	(109, '70@fake.com'),
	(110, '71@fake.com'),
	(111, '72@fake.com'),
	(112, '73@fake.com'),
	(113, '74@fake.com'),
	(114, '75@fake.com'),
	(115, '76@fake.com'),
	(116, '77@fake.com'),
	(117, '78@fake.com'),
	(118, '79@fake.com'),
	(119, '80@fake.com'),
	(120, '81@fake.com'),
	(121, '82@fake.com'),
	(122, '83@fake.com'),
	(123, '84@fake.com'),
	(124, '85@fake.com'),
	(125, '86@fake.com'),
	(126, '87@fake.com'),
	(127, '88@fake.com'),
	(128, '89@fake.com'),
	(129, '90@fake.com'),
	(130, '91@fake.com'),
	(131, '92@fake.com'),
	(132, '93@fake.com'),
	(133, '94@fake.com'),
	(134, '95@fake.com'),
	(135, '96@fake.com'),
	(136, '97@fake.com'),
	(137, '98@fake.com'),
	(138, '99@fake.com'),
	(139, '100@fake.com');
/*!40000 ALTER TABLE `tbemailinfo` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbhaircolor
CREATE TABLE IF NOT EXISTS `tbhaircolor` (
  `HairColorID` tinyint(4) NOT NULL,
  `Desc` tinytext NOT NULL,
  `HairColor` tinytext NOT NULL,
  PRIMARY KEY (`HairColorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Holds all of the hair colors a mii can have';

-- Dumping data for table miisindb.tbhaircolor: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbhaircolor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbhaircolor` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbhairstyles
CREATE TABLE IF NOT EXISTS `tbhairstyles` (
  `HairID` tinyint(4) NOT NULL,
  `HairStyle` tinytext NOT NULL,
  PRIMARY KEY (`HairID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table alls of the hairstyles a Mii can have';

-- Dumping data for table miisindb.tbhairstyles: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbhairstyles` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbhairstyles` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbhead
CREATE TABLE IF NOT EXISTS `tbhead` (
  `HeadID` tinyint(4) NOT NULL,
  `HeadSVG` tinytext NOT NULL,
  PRIMARY KEY (`HeadID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table holds all of the information about the Mii''s head';

-- Dumping data for table miisindb.tbhead: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbhead` DISABLE KEYS */;
INSERT INTO `tbhead` (`HeadID`, `HeadSVG`) VALUES
	(0, 'circle'),
	(1, 'square'),
	(2, 'triangle');
/*!40000 ALTER TABLE `tbhead` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbmemberchatids
CREATE TABLE IF NOT EXISTS `tbmemberchatids` (
  `ChatID` smallint(6) DEFAULT NULL,
  `Username` varchar(16) DEFAULT NULL,
  KEY `FK_tbMemberChatIDs_tbchats` (`ChatID`),
  KEY `FK_tbMemberChatIDs_tbuserinfo` (`Username`),
  CONSTRAINT `FK_tbMemberChatIDs_tbchats` FOREIGN KEY (`ChatID`) REFERENCES `tbchats` (`ChatID`),
  CONSTRAINT `FK_tbMemberChatIDs_tbuserinfo` FOREIGN KEY (`Username`) REFERENCES `tbuserinfo` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table will connect member''s to the chats they are in';

-- Dumping data for table miisindb.tbmemberchatids: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbmemberchatids` DISABLE KEYS */;
INSERT INTO `tbmemberchatids` (`ChatID`, `Username`) VALUES
	(0, 'MSN4Lyfe'),
	(1, 'Sloth'),
	(2, 'Sloth');
/*!40000 ALTER TABLE `tbmemberchatids` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbmii
CREATE TABLE IF NOT EXISTS `tbmii` (
  `MiiID` int(11) NOT NULL AUTO_INCREMENT,
  `HeadID` tinyint(4) NOT NULL DEFAULT '0',
  `ShirtID` tinyint(4) NOT NULL DEFAULT '0',
  `PantsID` tinyint(4) NOT NULL DEFAULT '0',
  `SkinID` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MiiID`),
  KEY `FK_tbmii_tbshirt` (`ShirtID`),
  KEY `FK_tbmii_tbskin` (`SkinID`),
  KEY `FK_tbmii_tbpants` (`PantsID`),
  KEY `FK_tbmii_tbhead` (`HeadID`),
  CONSTRAINT `FK_tbmii_tbhead` FOREIGN KEY (`HeadID`) REFERENCES `tbhead` (`HeadID`),
  CONSTRAINT `FK_tbmii_tbpants` FOREIGN KEY (`PantsID`) REFERENCES `tbpants` (`PantsID`),
  CONSTRAINT `FK_tbmii_tbshirt` FOREIGN KEY (`ShirtID`) REFERENCES `tbshirt` (`ShirtID`),
  CONSTRAINT `FK_tbmii_tbskin` FOREIGN KEY (`SkinID`) REFERENCES `tbskin` (`SkinID`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1 COMMENT='This table holds all of the information of a user''s Mii';

-- Dumping data for table miisindb.tbmii: ~132 rows (approximately)
/*!40000 ALTER TABLE `tbmii` DISABLE KEYS */;
INSERT INTO `tbmii` (`MiiID`, `HeadID`, `ShirtID`, `PantsID`, `SkinID`) VALUES
	(1, 0, 0, 0, 0),
	(2, 0, 1, 1, 1),
	(3, 0, 0, 0, 0),
	(4, 0, 0, 1, 0),
	(5, 0, 0, 0, 0),
	(6, 0, 0, 0, 0),
	(7, 0, 0, 0, 0),
	(8, 0, 0, 0, 0),
	(9, 0, 0, 0, 0),
	(10, 0, 0, 0, 0),
	(11, 0, 0, 0, 0),
	(12, 0, 0, 0, 0),
	(13, 0, 0, 0, 0),
	(14, 0, 0, 0, 0),
	(15, 0, 0, 0, 0),
	(16, 0, 0, 0, 0),
	(17, 0, 0, 0, 0),
	(18, 0, 0, 0, 0),
	(19, 0, 0, 0, 0),
	(20, 0, 0, 0, 0),
	(21, 0, 0, 0, 0),
	(22, 0, 0, 0, 0),
	(23, 0, 0, 0, 0),
	(24, 0, 0, 0, 0),
	(25, 0, 0, 0, 0),
	(26, 0, 0, 0, 0),
	(27, 0, 0, 0, 0),
	(28, 0, 0, 0, 0),
	(29, 0, 0, 0, 0),
	(30, 0, 0, 0, 0),
	(31, 0, 0, 0, 0),
	(32, 0, 0, 0, 0),
	(33, 0, 0, 0, 0),
	(34, 0, 0, 0, 0),
	(35, 0, 0, 0, 0),
	(36, 0, 0, 0, 0),
	(37, 0, 0, 0, 0),
	(38, 0, 0, 0, 0),
	(39, 0, 0, 0, 0),
	(40, 0, 0, 0, 0),
	(41, 0, 0, 0, 0),
	(42, 0, 0, 0, 0),
	(43, 0, 0, 0, 0),
	(44, 0, 0, 0, 0),
	(45, 0, 0, 0, 0),
	(46, 0, 0, 0, 0),
	(47, 0, 0, 0, 0),
	(48, 0, 0, 0, 0),
	(49, 0, 0, 0, 0),
	(50, 0, 0, 0, 0),
	(51, 0, 0, 0, 0),
	(52, 0, 0, 0, 0),
	(53, 0, 0, 0, 0),
	(54, 0, 0, 0, 0),
	(55, 0, 0, 0, 0),
	(56, 0, 0, 0, 0),
	(57, 0, 0, 0, 0),
	(58, 0, 0, 0, 0),
	(59, 0, 0, 0, 0),
	(60, 0, 0, 0, 0),
	(61, 0, 0, 0, 0),
	(62, 0, 0, 0, 0),
	(63, 0, 0, 0, 0),
	(64, 0, 0, 0, 0),
	(65, 0, 0, 0, 0),
	(66, 0, 0, 0, 0),
	(67, 0, 0, 0, 0),
	(68, 0, 0, 0, 0),
	(69, 0, 0, 0, 0),
	(70, 0, 0, 0, 0),
	(71, 0, 0, 0, 0),
	(72, 0, 0, 0, 0),
	(73, 0, 0, 0, 0),
	(74, 0, 0, 0, 0),
	(75, 0, 0, 0, 0),
	(76, 0, 0, 0, 0),
	(77, 0, 0, 0, 0),
	(78, 0, 0, 0, 0),
	(79, 0, 0, 0, 0),
	(80, 0, 0, 0, 0),
	(81, 0, 0, 0, 0),
	(82, 0, 0, 0, 0),
	(83, 0, 0, 0, 0),
	(84, 0, 0, 0, 0),
	(85, 0, 0, 0, 0),
	(86, 0, 0, 0, 0),
	(87, 0, 0, 0, 0),
	(88, 0, 0, 0, 0),
	(89, 0, 0, 0, 0),
	(90, 0, 0, 0, 0),
	(91, 0, 0, 0, 0),
	(92, 0, 0, 0, 0),
	(93, 0, 0, 0, 0),
	(94, 0, 0, 0, 0),
	(95, 0, 0, 0, 0),
	(96, 0, 0, 0, 0),
	(97, 0, 0, 0, 0),
	(98, 0, 0, 0, 0),
	(99, 0, 0, 0, 0),
	(100, 0, 0, 0, 0),
	(101, 0, 0, 0, 0),
	(102, 0, 0, 0, 0),
	(103, 0, 0, 0, 0),
	(104, 0, 0, 0, 0),
	(105, 0, 0, 0, 0),
	(106, 0, 0, 0, 0),
	(107, 0, 0, 0, 0),
	(108, 0, 0, 0, 0),
	(109, 0, 0, 0, 0),
	(110, 0, 0, 0, 0),
	(111, 0, 0, 0, 0),
	(112, 0, 0, 0, 0),
	(113, 0, 0, 0, 0),
	(114, 0, 0, 0, 0),
	(115, 0, 0, 0, 0),
	(116, 0, 0, 0, 0),
	(117, 0, 0, 0, 0),
	(118, 0, 0, 0, 0),
	(119, 0, 0, 0, 0),
	(120, 0, 0, 0, 0),
	(121, 0, 0, 0, 0),
	(122, 0, 0, 0, 0),
	(123, 0, 0, 0, 0),
	(124, 0, 0, 0, 0),
	(125, 0, 0, 0, 0),
	(126, 0, 0, 0, 0),
	(127, 0, 0, 0, 0),
	(128, 0, 0, 0, 0),
	(129, 0, 0, 0, 0),
	(130, 0, 0, 0, 0),
	(131, 0, 0, 0, 0),
	(132, 0, 0, 0, 0),
	(133, 0, 0, 0, 0),
	(134, 0, 0, 0, 0),
	(135, 0, 0, 0, 0),
	(136, 0, 0, 0, 0),
	(137, 0, 0, 0, 0),
	(138, 0, 0, 0, 0),
	(139, 0, 0, 0, 0);
/*!40000 ALTER TABLE `tbmii` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbpants
CREATE TABLE IF NOT EXISTS `tbpants` (
  `PantsID` tinyint(4) NOT NULL,
  `PantsColor` tinytext NOT NULL COMMENT 'Holds pants color in RBG',
  `PantsSVG` varchar(50) NOT NULL,
  PRIMARY KEY (`PantsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Holds all the options a Mii can have for pants';

-- Dumping data for table miisindb.tbpants: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbpants` DISABLE KEYS */;
INSERT INTO `tbpants` (`PantsID`, `PantsColor`, `PantsSVG`) VALUES
	(0, '242424', 'black'),
	(1, '0404b8', 'blue'),
	(2, 'd5d50b', 'yellow');
/*!40000 ALTER TABLE `tbpants` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbshirt
CREATE TABLE IF NOT EXISTS `tbshirt` (
  `ShirtID` tinyint(4) NOT NULL,
  `ShirtColor` varchar(8) NOT NULL,
  `ShirtSVG` varchar(255) NOT NULL,
  PRIMARY KEY (`ShirtID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This holds all of the information on a MII''s shirt';

-- Dumping data for table miisindb.tbshirt: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbshirt` DISABLE KEYS */;
INSERT INTO `tbshirt` (`ShirtID`, `ShirtColor`, `ShirtSVG`) VALUES
	(0, '04b804', 'green'),
	(1, '990098', 'purple'),
	(2, 'eb1a1a', 'red\r\n');
/*!40000 ALTER TABLE `tbshirt` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbskin
CREATE TABLE IF NOT EXISTS `tbskin` (
  `SkinID` tinyint(4) NOT NULL,
  `SkinColor` tinytext NOT NULL COMMENT 'The color of a MIi''s skin in RGB',
  `SkinSVG` tinytext NOT NULL,
  PRIMARY KEY (`SkinID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Holds the different tones a Mii''s skin can be';

-- Dumping data for table miisindb.tbskin: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbskin` DISABLE KEYS */;
INSERT INTO `tbskin` (`SkinID`, `SkinColor`, `SkinSVG`) VALUES
	(0, '7c7465', 'dark'),
	(1, 'FFFF99', 'light'),
	(2, 'c4b8a2', 'medium');
/*!40000 ALTER TABLE `tbskin` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbuserinfo
CREATE TABLE IF NOT EXISTS `tbuserinfo` (
  `Username` varchar(16) NOT NULL COMMENT 'This is the user name and must be unique, therefor is the primary key.\r\n',
  `Password` varchar(255) NOT NULL COMMENT 'This is the user''s password',
  `EmailID` smallint(6) NOT NULL,
  `MiiID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Salt` varchar(12) NOT NULL,
  PRIMARY KEY (`Username`),
  KEY `FK_tbuserinfo_tbmii` (`MiiID`),
  KEY `FK_tbuserinfo_tbemailinfo` (`EmailID`),
  CONSTRAINT `FK_tbuserinfo_tbemailinfo` FOREIGN KEY (`EmailID`) REFERENCES `tbemailinfo` (`EmailID`),
  CONSTRAINT `FK_tbuserinfo_tbmii` FOREIGN KEY (`MiiID`) REFERENCES `tbmii` (`MiiID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table holds all of the informatin for the user';

-- Dumping data for table miisindb.tbuserinfo: ~99 rows (approximately)
/*!40000 ALTER TABLE `tbuserinfo` DISABLE KEYS */;
INSERT INTO `tbuserinfo` (`Username`, `Password`, `EmailID`, `MiiID`, `Firstname`, `Lastname`, `Salt`) VALUES
	('100', '$2y$12$nI0Wtx8zimrTJSZR9qITA.x3U7ngt6FHyZojrRufeFANlzVQN3KFK', 139, 139, 'John', 'Smith', '???3?j?%&Q'),
	('46', '$2y$12$CZrgzGVMf3rj8QfR4PAEGOTe6fppXhZun19AmrdSXoxBI4EYb5TiS', 85, 85, 'John', 'Smith', '	???eLz???'),
	('47', '$2y$12$VO3jlOTOhbxwmcdo.vXy4.qVazGw61kDM8iryvvcaltkZNSaahEI.', 86, 86, 'John', 'Smith', 'T??????p??h?'),
	('48', '$2y$12$jXPNLdsblqXQQopmyaviKemInxtxAVUY.wLYHXKfvav982vryixKq', 87, 87, 'John', 'Smith', '?s?-????B?f'),
	('49', '$2y$12$3CSKL77ImmCiJLNKRWI51.Tt38N4wPoLmKOtdQg/pFyy/WDGneDUu', 88, 88, 'John', 'Smith', '?$?/??`?$?JE'),
	('50', '$2y$12$8.dJJYWA4kJkP.HwV6PyA.WjNjMyM2HMHzU.TulNFEYT5oLK/WF0W', 89, 89, 'John', 'Smith', '??I%???Bd???'),
	('51', '$2y$12$vmbILH9xvV8EXgChXIbiM.Enh1uGyoot9RLqaTMQ8CibhZpSrP2Vq', 90, 90, 'John', 'Smith', '?f?,q?_^\0?'),
	('52', '$2y$12$RWbOiO/lgrH6IigXmCuGeeqJrsTjFo8bOeHR3WPluoukSp1aSn3ji', 91, 91, 'John', 'Smith', 'Ef????"(?+?'),
	('53', '$2y$12$/P6gp/vt6yUqKBCVBRQzJenzg0BCyFDQZe9sso2eVFHJtqg5zCscy', 92, 92, 'John', 'Smith', '???????%*(?'),
	('54', '$2y$12$4vLYD8cgQnncJGOGoAzqV.ar71qhbJ3Fhw8sSojdYdszd84WBYIh.', 93, 93, 'John', 'Smith', '???? By?$c?'),
	('55', '$2y$12$TtmzGsBZsSoX0xSftvovn.8SvU/2yyVeVtjMj61ycsnR69xyXrZN6', 94, 94, 'John', 'Smith', 'N??Y?*???'),
	('57', '$2y$12$lKtHtND9Iqlt4GLQ2.ppcuVH0IhtVca.cDjKkxqOxCc0SvcOe82hK', 96, 96, 'John', 'Smith', '??G???"?m?b?'),
	('58', '$2y$12$9zSaFtcxtC76RhciKkfozeIOsL9LldyTEoBp7QhFDsGjCOh/Ja6oC', 97, 97, 'John', 'Smith', '?4??1?.?F"'),
	('59', '$2y$12$hrlRATWojwk/wBMBg6y9gOkLhK75DvuZRw4XM7UYF.m3ftnIQ.zdK', 98, 98, 'John', 'Smith', '??Q5??	??'),
	('61', '$2y$12$PmjHSx6yKRMYyk3F/3MEH.TAC4SV4oDRRxS.v5.Q0SRzI83cByPwq', 100, 100, 'John', 'Smith', '>h?K?)?M?'),
	('62', '$2y$12$k14VNybpJvX2A0I6.DUfDOnrPvQygOKYKgVEkzDIPkoYdsEALinJG', 101, 101, 'John', 'Smith', '?^7&?&??B:'),
	('63', '$2y$12$t6OILgyjoX/iubCSJTgoK.uizZX13wO8wfOJQEF81g5qJYGxmvgJ.', 102, 102, 'John', 'Smith', '???.????%8'),
	('64', '$2y$12$cfqYWMNOjW3PDdO0TzA94O13b2pqwv0SrBfkOV9H08I2PpZawbOSW', 103, 103, 'John', 'Smith', 'q??X?N?m?\r?O'),
	('65', '$2y$12$9pbUOnxfkaJFZRoc1fa5yuZErng3seuAuSDxo0bZrX0LrinYpCCOK', 104, 104, 'John', 'Smith', '???:|_??Ee'),
	('66', '$2y$12$edU7W.ZnriCmuokgka3pSueY6vsYy8ehCE7QwJK7zGFSrPn.lPtWa', 105, 105, 'John', 'Smith', 'y?;[?g? ??? '),
	('67', '$2y$12$kaRihfQ2D18.q09lTBHoG.aVbovfXNiCnY1f39R.3Hn4NQQbGl0W2', 106, 106, 'John', 'Smith', '??b??6_>?Oe'),
	('68', '$2y$12$LrkxMQFKwlwT9qt8x0lXfu6Ixvh7OJRuybSkCSHtA4.NdGmFVKqfW', 107, 107, 'John', 'Smith', '.?11J???|?'),
	('69', '$2y$12$RuNqmndHedQjByn94KZP9uj.pcWvglKkHBjr5CThdFQSl38CPHAZ2', 108, 108, 'John', 'Smith', 'F?j?wGy?#)?'),
	('70', '$2y$12$AiLo3xG6Q1dCu2yrrQMAwe2axRMHdBEbTUdCHpwKI5YyMV87Gqqu6', 109, 109, 'John', 'Smith', '"???CWB?l?'),
	('71', '$2y$12$P/HWuibtSEFpqdUjhT3jW.rLDj5Wx9gZge0JvXPSUXYfZJSDFr/A.', 110, 110, 'John', 'Smith', '???&?HAi??#?'),
	('72', '$2y$12$qY9U3mSK/c2RtqItlMr6N.lKs8Lf2k7U/pHlmDJ5Oi6rfSlte8MwC', 111, 111, 'John', 'Smith', '??T?d?????-?'),
	('73', '$2y$12$B352b3Ab6Hhs0Lakffcl7e.hmhirr/nbwKk4TbjtVgnHMEDIe3VLe', 112, 112, 'John', 'Smith', '~vop?xl??}'),
	('74', '$2y$12$xKGrdpTdjd5WPK8gSX3jCulxG2G./xEerU5P8CHLt1VD90OPR9ReG', 113, 113, 'John', 'Smith', '??v???V<? I}'),
	('75', '$2y$12$xh46qE516qxG6rI93uP/SeypAt0KMti4p2mDpJ7JKZIXrup.1s0XW', 114, 114, 'John', 'Smith', '?:?Nu??F??='),
	('76', '$2y$12$cuYHEnr9ZhrQ0ETDMAlQZO5h0TNWeAbVW8h552hza9oZ.dqjYObnm', 115, 115, 'John', 'Smith', 'r?z?f??D?'),
	('77', '$2y$12$HyLhnO.68v5zMW4ohpr0Su5ZOkWxIQx9Zn0bCk9r0EgUFGRqmlIZy', 116, 116, 'John', 'Smith', '"??????s1n('),
	('78', '$2y$12$DMVqyfYE3h06sKMvFuWqbeZdQ6z9hCo1etZRSKBb54YexqukZJrt6', 117, 117, 'John', 'Smith', '?j???:??/'),
	('79', '$2y$12$KysLUMsURbWQfR08bZGwje3kRFUkakq/IcoZHlW.z8zLqIAhJYD3m', 118, 118, 'John', 'Smith', '++P?E??}<'),
	('80', '$2y$12$dX.u48.LF3JzR2yvGwj41.9izUrY/byATZ.28nIqUKcGj2DdSO1My', 119, 119, 'John', 'Smith', 'u???rsGl?'),
	('81', '$2y$12$uKAy/ud3Mi0drPl9nSo/s.tpqEQ9tBQWCbClsGVpLCEhPNPpi8x4q', 120, 120, 'John', 'Smith', '??2??w2-??}'),
	('82', '$2y$12$mnYsumSy.UA9.kVf5kzwpe6glJDRWv0vjfQBTgKI3j1BSfyvDpKay', 121, 121, 'John', 'Smith', '?v,?d??@=?E_'),
	('83', '$2y$12$WgDpthZLKAgXdUUDeX1amO64YhR7qWb6P9lJsACP0bVS6YSW8.ueK', 122, 122, 'John', 'Smith', 'Z\0??K(uE'),
	('84', '$2y$12$EMYUIdshtUvl.GlWgc9WmeVQ2s..jA/fifPr02RMA69.8V8Ww34TO', 123, 123, 'John', 'Smith', '?!?!?K??iV'),
	('85', '$2y$12$RlGOGSUm0wpPQ2NaaCRQAOeJUd9RN7Rk/3BUMERsHK9bDnl3H.ysK', 124, 124, 'John', 'Smith', 'FQ?%&?\nOCcZ'),
	('86', '$2y$12$bNKI4dEu1A78zIw5F1bG..ONIgfBQPlFge/BoujFsFX2ejTxAoVwm', 125, 125, 'John', 'Smith', 'l???.???9V'),
	('87', '$2y$12$b4FUB6SKqja7O31rRN2R.OLYluZ/GmkXsMP8gtTtYJI7hIwnpD11K', 126, 126, 'John', 'Smith', 'o?T???6?;}k'),
	('88', '$2y$12$vVMxxWahSAqi2nL7GogDXOjlrWA9tPL.dS5CcurNJpVaswfCDCm2e', 127, 127, 'John', 'Smith', '?S1?f?H\n??r?'),
	('89', '$2y$12$YF.6GwtbUM7ft2vTfsGB7O.UajRdQivxQ0IOPK1KQMQBN/In3fpe2', 128, 128, 'John', 'Smith', '`_?[P??k?~'),
	('90', '$2y$12$W7txc/5lPq3CwaDSefqamuGJQNgbPNxq2v8GfNh0mz2qcvSkbJDbe', 129, 129, 'John', 'Smith', '[?qs?e>?????'),
	('91', '$2y$12$99gOT0yKI3sXeTNNVxOjKORcxq7LlUsq/ShkY1LGadB7KWY58Rkvu', 130, 130, 'John', 'Smith', '??OL?#{y3M'),
	('92', '$2y$12$/eXwGuvSwki95yXKKrOxgeS3fnIM0dGXymMtg.4FJci1YGz9NVR.u', 131, 131, 'John', 'Smith', '??????H??%?'),
	('93', '$2y$12$uHsJrIlESILm2oKX90WBaeOsNupWEgAx4JApDlxv71rXssZu1tuO2', 132, 132, 'John', 'Smith', '?{	??DH?????'),
	('94', '$2y$12$G6LwwmdodCnzByRv5DQoq.e2kG1wVg1nFYeAyqvKOMRM9f0xjbtzy', 133, 133, 'John', 'Smith', '???ght)?$o'),
	('95', '$2y$12$KvrDirib6G0d60L2clctiecGqGsjxkIWAqdH7J9vHMWGC3YrAn3q2', 134, 134, 'John', 'Smith', '*?Ê???m?B?r'),
	('96', '$2y$12$ccOZ4LLDFv301iGe0frlNe.GD8kUKS2mLmQPeUzodJT4nD2hjv0Vy', 135, 135, 'John', 'Smith', 'qÙ??????!??'),
	('97', '$2y$12$84pfXY.2RN4ic0BW75yLL.55e0Nw5ivWM4C.uQyZbgRBKwTKYGDZC', 136, 136, 'John', 'Smith', '??_]??D?"s@V'),
	('98', '$2y$12$20ZCyivEHOk0ZUqV41jQa.yqiFXGIaCRx9UjVQ0ikUwCcSsiMZQ3G', 137, 137, 'John', 'Smith', '?FB?+??4eJ?'),
	('99', '$2y$12$4R2u0BNcGJdcu0pz0zqh/eh0EYS4gfiehnHRp4cmyWz2IJJ96yCeS', 138, 138, 'John', 'Smith', '?????Js?:'),
	('Batman', '$2y$12$8BCKvexCmm.9bK6M/XC6K.H4NPOASdoBbrVch.Kvm9V5l90GuqHbS', 83, 83, 'John', 'Smith', '????B?o?l??'),
	('caramel', '$2y$12$jfe.jb0.QUVOhb2PQP.d/eojWUp0zlZQ7y1WPELh7QeWoCHm6icGO', 45, 69, 'John', 'Smith', '?????>AEN???'),
	('Crane', '$2y$12$vrJxcfzehHIB92COpoFBVOhULKtgNzyB7Kc92XpdKfLIb3zLx26Pm', 30, 54, 'John', 'Smith', '??qq??r?`??'),
	('Danny', '$2y$12$1xDgOLnLol3gQPxgqhK4GO2ZGoyxfW5wmyo2.FepUkS9xSeCvoUge', 49, 73, 'John', 'Smith', '??8??]?@?`?'),
	('Fighter', '$2y$12$C9s4jYqkN2Zstw81t6uYEerR58SousufCTnqtKgKLxPdGSdpGNOp2', 79, 79, 'John', 'Smith', '?8???7fl?5'),
	('Freeman', '$2y$12$x8DQ4GYA2ZI9qYpO5VIk6.m5E0BJwbtYTTSDtU7ijzIGdfZWKr5AG', 48, 72, 'John', 'Smith', '????f\0?=??N?'),
	('Gambino', '$2y$12$n8ac2AnmULCAXgqEC5BW5.8cG/lPG7CWrhVLrWD.p0KJEtb.//Ggq', 20, 43, 'John', 'Smith', '???	?P??^\n?'),
	('Glover', '$2y$12$slaPKEHYLEAg2qVeMARK8eN93oB27EcdLn/QPn.qnmC0dELgH7Ipa', 50, 74, 'John', 'Smith', '?V?(A?,@ ?^0'),
	('Google', '$2y$12$gi5emWi8kyXeWNJC3Wb9neQq9XnknwQGOXhqVrIZxGKDDkzAQUEOK', 39, 63, 'John', 'Smith', '?.^?h??%?X?B'),
	('Interesting', '$2y$12$gTgw9Q3RyvUkqfQM9dRVXuq0PCW2qHm64Bp5W730eh6v2.2cVonSy', 32, 56, 'John', 'Smith', '?80?\r???$??'),
	('Jam', '$2y$12$CsY8DN3DQ0WBe/eEs70BNedM3SIE9oR.jsXZqHPaj2LfNQevO/eny', 51, 75, 'John', 'Smith', '\n?<??CE?{??'),
	('Leather', '$2y$12$JUJkPuS9h.wJDesIdFgwFuMHJPSgytAjoIyDH/0nS9CYpIOi77jim', 23, 46, 'John', 'Smith', '%Bd>??	\r?tX'),
	('Lion', '$2y$12$2FBzusLcmKGipRC7Y1pvW.xnjAUav6FRrNfQbDFOweHGpets2EEFu', 53, 77, 'John', 'Smith', '?Ps???????c'),
	('Mii', '$2y$12$0tmOYJ1tB1hDnHYKnt3RQ.7CxyzKb7XuqIIHp8sSj3WOLDtoAdJbq', 41, 65, 'John', 'Smith', '??`?mXC?v\n?'),
	('Morgan', '$2y$12$OfNSXJLKfFUCvVKP.t0hMuEjGVeQiA..0F4JeLLtOi3YcCswstAFG', 47, 71, 'John', 'Smith', '9?R??|U?R??'),
	('Mskof', '$2y$12$1BEV.YeOHkKoB/gjneGyP..QuDcvJx3ipVn6h795YzsNl6KxDlqe2', 14, 14, 'Michael', 'Skof', '????B??#'),
	('MSN', '$2y$12$7O5OmmcHMeo/s3z0IBQNVONEZT/FPqgw4kLftZFOEBZs1Fb3AjBaW', 40, 64, 'John', 'Smith', '??N?g1???|?'),
	('MSN4Lyfe', 'password', 1, 2, '', '', ''),
	('Parents', '$2y$12$ZxsMjr7Sn48VtXMiA0ut6eAwURfLGoQoGSyvwNVYZ2r.7xLR6xaky', 37, 61, 'John', 'Smith', 'g?????s"'),
	('Peanut', '$2y$12$wZxez93A9V3tGUag/3Oap.cbACZvr/eOB2ENS9n5fQJJeLw15Nu7m', 22, 45, 'John', 'Smith', '??^????]?F?'),
	('People', '$2y$12$Lyrqsy1D1na8LBy9mBggC.S6r2RwAvel2f.eV80XaDyzsc.36DvSm', 34, 58, 'John', 'Smith', '/*??-C?v?,?'),
	('Pine', '$2y$12$S1J3aNDpiZyUGHD3y0NtYOyhV87dvYvSH.5UrCs8jwozeAl35DoD.', 24, 48, 'John', 'Smith', 'KRwh???p??C'),
	('Plane', '$2y$12$.3sAQZBKXv/i/OU6meQ.temRCGD3uAVszcz1Sw9Z2qChGP74PA6MO', 28, 52, 'John', 'Smith', '?{\0A?J^????:'),
	('Pluto', '$2y$12$m4ojziTKY4DzonWwY1thD.GMpKfHUhCeyBL5w7dFMXb79Iaa1fFyK', 31, 55, 'John', 'Smith', '??#?$?c???u?'),
	('Scoopz', '$2y$12$h6la.9h6RKjU5lcS9cPbn.Q0Wd22KQHMz3uLsg19jz.LT3pSAJEZ2', 26, 50, 'John', 'Smith', '??Z??zD???W'),
	('Scrapz', '$2y$12$TivBslDrg.oUu9EmeyzwlOYEQPV2WyVlFOFmA8vzLCPK5urnvSi9m', 27, 51, 'John', 'Smith', 'N+??P?????&'),
	('Sloth', '$2y$12$HMq7AtdEzvP7JWusVkw9hezOi7O9SCZAdrL/p2vbDYiP37WRxD.MO', 13, 13, 'Hathan', 'Sloth', '??D???%k?V'),
	('Spam', '$2y$12$nR0SnouQtd3VVkcfBAqfJOFeKpnkMCrLMdZ6sJtD6TNrTl//3hLmO', 52, 76, 'John', 'Smith', '???????VG'),
	('SpellingBee', '$2y$12$t915Keya.63Z6u6EOWAp2el3ehKBbVbbKPRFZBVDcQ.jdtFtb4Umu', 80, 80, 'John', 'Smith', '??y)????????'),
	('Spiddy', '$2y$12$Pa1WHWpBVhK4R3.OXZUsHu2OacS1uQn5BQkHYIlEAVAG6iADdi95S', 19, 42, 'John', 'Smith', '=?VjAV?G?'),
	('SpiderMan', '$2y$12$TiWQxZAqkf38rH/ciH2DJOM5GKb84k3Rznq5g5HKODDxm9AulpwWm', 82, 82, 'John', 'Smith', 'N%??*?????}'),
	('StepParents', '$2y$12$KqyX63zgdr5XwZtz8qH2c.wBOdDswtL/Kp9yMfV7ELaV8G6UpbyY2', 38, 62, 'John', 'Smith', '*???|?v?W??s'),
	('Taker', '$2y$12$keNE5EpANWlHturew643Z.noOLGqrGDbkPk.VE53Aed5c8hkI3ZB2', 44, 68, 'John', 'Smith', '??D?J@5iG???'),
	('Tiger', '$2y$12$8d1WcW9x.V5tQbPUt6Z14.r55ZfoElKwPzQur2fpukZ686JnS.Mky', 78, 78, 'John', 'Smith', '??Vqoq?^mA??'),
	('Trame', '$2y$12$aOEcw8LHHtDAw3VKHTfR6.Vl258twzcDA51RU2mY68YjxOkqwBnvm', 29, 53, 'John', 'Smith', 'h???????uJ'),
	('Under', '$2y$12$HhuuuImLUvUg7ADk45mlxOqxaO1Id5I6QNh.z4gFGHUUt0Lp117da', 43, 67, 'John', 'Smith', '????R? ?\0?'),
	('Venus', '$2y$12$ZTxpiXJ67gA.wgq4TSHonOjphoxWlVb8PTci.VtUp.69RUSO5NJ3.', 46, 70, 'John', 'Smith', 'e<i?rz?\0>?\n?'),
	('Waltz', '$2y$12$4hm4Ps7Ro256qfAzCqnSce9un1BfmTrcx/Qe3tvNBblNHZggGI1Li', 21, 44, 'John', 'Smith', '??>??nz??3\n'),
	('Washer', '$2y$12$Te2QHFMo/fltPbPZepttiOsi1reV4XmqEBCXATl4mduky3IEEvHDy', 25, 49, 'John', 'Smith', 'M??S(??m=??'),
	('Watermelon', '$2y$12$uqtIDXTwazmb6hmGMwcjm.DQuCOxQcvgNiLZ4hLbcTjh3NBWpgo5S', 33, 57, 'John', 'Smith', '??H\rt?k9???'),
	('Weather', '$2y$12$VaTBRPIahrOZUNwEsUir3.QlySoiQ1cIZHE3vqPo40vsTOJ727BFG', 81, 81, 'John', 'Smith', 'U??D????P?'),
	('WeatherMan', '$2y$12$XKLnITq/JpT.1PXwq5bCQOIwi/GZe2LGYjb7lKS1ozyEsH2o664w.', 18, 41, 'John', 'Smith', '??!:?&??????'),
	('WiiFriends', '$2y$12$HXqf.qeOt9MqgXO/A2pWc.sacI7awj15O9pWaE1UoZx4TTayhGltK', 42, 66, 'John', 'Smith', 'z??????*?s?'),
	('Wild', '$2y$12$3OyGl/GRMDQRnuiClMEGmO91bpYXfWAbvu5MPD9biX9/pBytO87/S', 35, 59, 'John', 'Smith', '????04????'),
	('Winter', '$2y$12$qewz4UbBob8IXqJtqsHmDu15pP76V5Qzw9wZrsPB7mG814j6ROHEW', 36, 60, 'John', 'Smith', '??3?F???^?m'),
	('WonderWomen', '$2y$12$pbL.wY6R6JGnv8ZofoeNKe82iVreNZBZjp/JBsjnjREgguBYn0VIC', 84, 84, 'John', 'Smith', '?????????h~?');
/*!40000 ALTER TABLE `tbuserinfo` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbusershirts
CREATE TABLE IF NOT EXISTS `tbusershirts` (
  `ShirtID` tinyint(4) NOT NULL,
  `Username` varchar(16) NOT NULL,
  KEY `FK_tbusershirts_tbshirt` (`ShirtID`),
  KEY `FK_tbusershirts_tbuserinfo` (`Username`),
  CONSTRAINT `FK_tbusershirts_tbshirt` FOREIGN KEY (`ShirtID`) REFERENCES `tbshirt` (`ShirtID`),
  CONSTRAINT `FK_tbusershirts_tbuserinfo` FOREIGN KEY (`Username`) REFERENCES `tbuserinfo` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table holds all of the shirts a user holds\r\n';

-- Dumping data for table miisindb.tbusershirts: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbusershirts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbusershirts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
