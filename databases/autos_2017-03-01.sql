# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.38)
# Database: autos
# Generation Time: 2017-03-01 20:52:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table landen
# ------------------------------------------------------------

DROP TABLE IF EXISTS `landen`;

CREATE TABLE `landen` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `landen` WRITE;
/*!40000 ALTER TABLE `landen` DISABLE KEYS */;

INSERT INTO `landen` (`id`, `naam`)
VALUES
	(1,'Nederland'),
	(2,'Duitsland'),
	(3,'Zweden'),
	(4,'Rusland'),
	(5,'Itali&euml;');

/*!40000 ALTER TABLE `landen` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table merken
# ------------------------------------------------------------

DROP TABLE IF EXISTS `merken`;

CREATE TABLE `merken` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(125) DEFAULT NULL,
  `land_id` int(11) unsigned DEFAULT NULL,
  `kleur` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `land_id` (`land_id`),
  CONSTRAINT `merken_ibfk_1` FOREIGN KEY (`land_id`) REFERENCES `landen` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `merken` WRITE;
/*!40000 ALTER TABLE `merken` DISABLE KEYS */;

INSERT INTO `merken` (`id`, `naam`, `land_id`, `kleur`)
VALUES
	(1,'BMW',2,'#f69'),
	(2,'Volkswagen',2,'#f9f'),
	(3,'Opel',2,'#69f'),
	(4,'Lada',4,'#f96'),
	(5,'Volvo',3,'#9f9'),
	(6,'Fiat',5,'#ff6');

/*!40000 ALTER TABLE `merken` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `merk_id` int(11) unsigned NOT NULL,
  `naam` varchar(125) DEFAULT NULL,
  `kleur` varchar(25) DEFAULT '',
  `prijs` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type-model-id` (`merk_id`),
  CONSTRAINT `types_ibfk_1` FOREIGN KEY (`merk_id`) REFERENCES `merken` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;

INSERT INTO `types` (`id`, `merk_id`, `naam`, `kleur`, `prijs`)
VALUES
	(1,2,'Polo','rood',12000),
	(2,2,'Golf','geel',21000),
	(3,1,'Z3','rood',21005),
	(4,3,'Corsa','paars',9000),
	(5,2,'M3','rood',32000),
	(6,3,'Golf Plus','zwart',28000),
	(10,5,'V40','zwart',65000),
	(11,5,'XC90','wit',95000);

/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
