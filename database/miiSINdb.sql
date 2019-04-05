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
  `Password` varchar(16) NOT NULL COMMENT 'If a admin wants to put a password on the chat',
  PRIMARY KEY (`ChatID`),
  KEY `FK_tbchats_tbuserinfo` (`Admin`),
  CONSTRAINT `FK_tbchats_tbuserinfo` FOREIGN KEY (`Admin`) REFERENCES `tbuserinfo` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This holds all the information on chats';

-- Dumping data for table miisindb.tbchats: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbchats` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbchats` ENABLE KEYS */;

-- Dumping structure for table miisindb.tbemailinfo
CREATE TABLE IF NOT EXISTS `tbemailinfo` (
  `EmailID` smallint(6) NOT NULL AUTO_INCREMENT,
  `Email` tinytext NOT NULL,
  PRIMARY KEY (`EmailID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='This holds the user''s email';

-- Dumping data for table miisindb.tbemailinfo: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbemailinfo` DISABLE KEYS */;
INSERT INTO `tbemailinfo` (`EmailID`, `Email`) VALUES
	(1, 'nathanskof@gmail.com'),
	(2, 'pitm7280@mylaurier.ca');
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
	(0, 'circleHead'),
	(1, 'squareHead'),
	(2, 'triangleHead');
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

-- Dumping data for table miisindb.tbmemberchatids: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbmemberchatids` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='This table holds all of the information of a user''s Mii';

-- Dumping data for table miisindb.tbmii: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbmii` DISABLE KEYS */;
INSERT INTO `tbmii` (`MiiID`, `HeadID`, `ShirtID`, `PantsID`, `SkinID`) VALUES
	(1, 0, 0, 0, 0),
	(2, 1, 1, 2, 2);
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
  `Password` varchar(16) NOT NULL COMMENT 'This is the user''s password',
  `EmailID` smallint(6) NOT NULL,
  `MiiID` int(11) NOT NULL,
  PRIMARY KEY (`Username`),
  KEY `FK_tbuserinfo_tbmii` (`MiiID`),
  KEY `FK_tbuserinfo_tbemailinfo` (`EmailID`),
  CONSTRAINT `FK_tbuserinfo_tbemailinfo` FOREIGN KEY (`EmailID`) REFERENCES `tbemailinfo` (`EmailID`),
  CONSTRAINT `FK_tbuserinfo_tbmii` FOREIGN KEY (`MiiID`) REFERENCES `tbmii` (`MiiID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table holds all of the informatin for the user';

-- Dumping data for table miisindb.tbuserinfo: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbuserinfo` DISABLE KEYS */;
INSERT INTO `tbuserinfo` (`Username`, `Password`, `EmailID`, `MiiID`) VALUES
	('MSN4Lyfe', 'password', 1, 2),
	('MSNisLife', 'password', 2, 1);
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
