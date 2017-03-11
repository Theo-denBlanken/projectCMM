# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.38)
# Database: berichten
# Generation Time: 2017-03-04 20:37:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table gebruikers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gebruikers`;

CREATE TABLE `gebruikers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vnaam` varchar(255) DEFAULT NULL COMMENT 'voornaam',
  `tsv` varchar(25) NOT NULL COMMENT 'tussenvoegsel',
  `anaam` varchar(255) DEFAULT NULL COMMENT 'achternaam',
  `email` varchar(255) DEFAULT NULL COMMENT 'uniek, email',
  `ww` varchar(255) DEFAULT NULL COMMENT 'wachtwoord',
  `level` int(2) DEFAULT '0' COMMENT 'rechten',
  `avatar` varchar(255) NOT NULL COMMENT 'link naar avatar',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `gebruikers` WRITE;
/*!40000 ALTER TABLE `gebruikers` DISABLE KEYS */;

INSERT INTO `gebruikers` (`id`, `vnaam`, `tsv`, `anaam`, `email`, `ww`, `level`, `avatar`)
VALUES
	(1,'Bart','','Dekker','b.dekker@hotmail.com','bart',0,''),
	(2,'Gerda','','Vriend','gvriend@xs4all.nl','1234',0,''),
	(3,'Mark','van','Dalen','m.v.dalen@ziggo.nl','1234',0,'');

/*!40000 ALTER TABLE `gebruikers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
