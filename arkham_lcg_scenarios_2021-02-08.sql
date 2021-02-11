# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.33)
# Database: arkham_lcg_scenarios
# Generation Time: 2021-02-11 12:53:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table scenarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `scenarios`;

CREATE TABLE `scenarios` (
                             `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                             `name` varchar(50) DEFAULT NULL,
                             `cycle` varchar(50) DEFAULT NULL,
                             `position` tinyint(2) DEFAULT NULL,
                             `standalone` tinyint(1) DEFAULT NULL,
                             `owned` tinyint(1) DEFAULT NULL,
                             `completed` tinyint(1) DEFAULT NULL,
                             `product` varchar(50) DEFAULT NULL,
                             PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `scenarios` WRITE;
/*!40000 ALTER TABLE `scenarios` DISABLE KEYS */;

INSERT INTO `scenarios` (`id`, `name`, `cycle`, `position`, `standalone`, `owned`, `completed`, `product`)
VALUES
	(1,'The Gathering','Night of the Zealot',1,NULL,0,1,'Base Game'),
	(2,'The Midnight Masks','Night of the Zealot',2,NULL,1,1,'Base Game'),
	(3,'The Devourer Below','Night of the Zealot',3,NULL,1,1,'Base Game'),
	(5,'The Miskatonic Museum','The Dunwich Legacy',3,NULL,0,1,'Scenario Pack'),
	(6,'The Essex County Express','The Dunwich Legacy',4,NULL,1,1,'Scenario Pack'),
	(7,'Extracurricular Activity','The Dunwich Legacy',1,NULL,1,1,'Deluxe Expansion'),
	(8,'The House Always Wins','The Dunwich Legacy',2,NULL,1,1,'Deluxe Expansion'),
	(9,'Blood on the Altar','The Dunwich Legacy',5,NULL,1,1,'Scenario Pack'),
	(10,'Undimensioned and Unseen','The Dunwich Legacy',6,NULL,1,1,'Scenario Pack'),
	(12,'Lost in Time and Space','The Dunwich Legacy',8,NULL,1,1,'Scenario Pack'),
	(17,'Curtain Call','The Path to Carcosa',1,NULL,0,NULL,'Deluxe Expansion'),
	(18,'The Last King','The Path to Carcosa',2,NULL,1,NULL,'Deluxe Expansion'),
	(19,'Echoes of the Past','The Path to Carcosa',3,NULL,1,NULL,'Scenario Pack'),
	(20,'The Unspeakable Oath','The Path to Carcosa',4,NULL,1,NULL,'Scenario Pack'),
	(21,'A Phantom of Truth','The Path to Carcosa',5,NULL,1,NULL,'Scenario Pack'),
	(22,'The Pallid Mask','The Path to Carcosa',6,NULL,1,NULL,'Scenario Pack'),
	(23,'Black Stars Rise','The Path to Carcosa',7,NULL,1,NULL,'Scenario Pack'),
	(24,'Dim Carcosa','The Path to Carcosa',8,NULL,1,NULL,'Scenario Pack'),
	(25,'Curse of the Rougarou','Sidestories',NULL,1,1,1,'Scenario Pack'),
	(26,'Carnevale of Horros','Sidestories',NULL,1,1,NULL,'Scenario Pack'),
	(27,'The Labyrinths of Lunacy','Sidestories',NULL,1,NULL,NULL,'Scenario Pack');

/*!40000 ALTER TABLE `scenarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
