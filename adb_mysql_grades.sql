# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.41-0ubuntu0.14.04.1)
# Database: adb
# Generation Time: 2015-03-10 19:40:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table grades
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grades`;

CREATE TABLE `grades` (
  `gradeId` varchar(11) NOT NULL DEFAULT '',
  `classAbbr` varchar(50) DEFAULT NULL,
  `studentId` int(11) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  PRIMARY KEY (`gradeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;

INSERT INTO `grades` (`gradeId`, `classAbbr`, `studentId`, `semester`, `grade`)
VALUES
	('999999','ADB',99999999,'1503',100);

/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
