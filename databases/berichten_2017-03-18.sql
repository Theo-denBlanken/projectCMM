# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.38)
# Database: berichten
# Generation Time: 2017-03-18 08:22:18 +0000
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
  `vnaam` varchar(255) DEFAULT '' COMMENT 'voornaam',
  `tsv` varchar(25) NOT NULL DEFAULT '' COMMENT 'tussenvoegsel',
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
	(1,'Bart','','Dekker','b.dekker@hotmail.com','7d8594c76e55488dd4c415c4c1c99b8d',0,''),
	(2,'Gerda','','Vriend','gvriend@xs4all.nl','ba165709bf5336b89bed99eeccf925ab',0,''),
	(3,'Mark','van','Dalen','m.v.dalen@ziggo.nl','019e779b4087fb1ea7afb1f53e738c67',0,''),
	(4,'Ada','','Kok','a.kok@ziggo.nl','99c9619e709fae1a600b03e96f1bd95d',0,'');

/*!40000 ALTER TABLE `gebruikers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nieuws
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nieuws`;

CREATE TABLE `nieuws` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'bericht id',
  `gebruiker_id` int(11) NOT NULL COMMENT 'verwijst naar gebruikers',
  `datum` datetime NOT NULL COMMENT 'publicatiedatum',
  `kop` varchar(250) NOT NULL DEFAULT '' COMMENT 'titel van bericht',
  `samenvatting` varchar(500) NOT NULL DEFAULT '' COMMENT 'samenvatting',
  `inhoud` varchar(1500) DEFAULT NULL COMMENT 'inhoud',
  `afbeeldling` varchar(50) DEFAULT NULL COMMENT 'pad naar afbeelding',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `nieuws` WRITE;
/*!40000 ALTER TABLE `nieuws` DISABLE KEYS */;

INSERT INTO `nieuws` (`id`, `gebruiker_id`, `datum`, `kop`, `samenvatting`, `inhoud`, `afbeeldling`)
VALUES
	(1,1,'2017-03-17 21:29:40','Voorkeurstemmen brengen drie vrouwen en een boer in de Tweede Kamer','Twee vrouwen van GroenLinks, Isabelle Diks en Lisa Westerveld, zijn met voorkeurstemmen gekozen in de Tweede Kamer. Daardoor loopt nummer 13 op de kandidatenlijst, Paul Smeulders, zijn Kamerzetel mis. Lijsttrekker Jesse Klaver is een vriend van Smeulders en stemde woensdag niet op zichzelf, maar op hem. ','Ook demissionair minister Lilianne Ploumen (PvdA) en de Overijsselse melkveehouder Maurits von Martels (CDA) zijn met voorkeursstemmen in de Tweede Kamer gekozen. Om met voorkeurstemmen gekozen te worden, zijn 17.600 stemmen nodig. Diks kreeg er 25.000, Ploumen 20.000, Von Martels 19.000 en Westerveld 18.000.\nDe verkiezing van Diks en Westerveld volgt op een voorkeursactie voor vrouwen. Kiezers werden via sociale media aangemoedigd op vrouwen te stemmen die het volgens de peilingen net niet zoud',NULL),
	(6,2,'2017-03-18 08:48:21','Fors meer boetes voor illegale Airbnb-verhuur in Amsterdam','De gemeente Amsterdam heeft afgelopen jaar fors meer boetes gegeven voor de illegale verhuur van woningen aan toeristen via sites als Airbnb. Er werden voor woonfraude 166 boetes opgelegd voor een totaalbedrag van 1,9 miljoen euro, waarvan het overgrote deel voor illegale verhuur aan toeristen. In 2015 werden 122 boetes opgelegd met een totale omvang van 1,2 miljoen euro.','<p>Er werden 284 appartementen gesloten, veelal illegale hotels. In 2015 waren dat er 167.</p>\r\n<p>\r\nBij het meldpunt van de gemeente kwamen 1331 meldingen binnen van illegale verhuur aan toeristen; ruim 50 procent meer dan in 2015. \"Die stijging is deels het gevolg van de toegenomen bekendheid van het meldpunt, maar kan anderzijds ook het gevolg zijn van de groeiende populariteit van toeristische verhuur van woningen\", zegt de gemeente.\r\n</p>\r\n<h4>Maximaal 60 dagen</h4>\r\n<p>\r\nAmsterdammers mogen hun woning maximaal 60 dagen per jaar aan toeristen verhuren, en ze mogen maximaal vier toeristen tegelijk in hun huis toelaten. Maar veel appartementen worden het hele jaar door via Airbnb verhuurd. </p>\r\n<p>\r\nOnlangs sprak Airbnb met de gemeente af dat vanaf dit jaar een appartement op de site automatisch verdwijnt als de limiet van 60 dagen wordt overschreden.</p>\r\n<p>\r\nSinds april 2016 speurt de gemeente ook online naar illegale vakantieverhuur op sites als Airbnb en Wimdu. Vorig jaar zijn via die methode 159 adressen gevonden waar mogelijk sprake was van illegale verhuur. In 17 gevallen leidde dit tot directe sluiting van een illegaal hotel vanwege de brandveiligheid. Bij de andere adressen is het onderzoek nog gaande en wordt mogelijk later een boete opgelegd.  </p>',NULL),
	(7,2,'2017-03-18 09:07:52','Voor de koning is de ene premier de andere niet','Als boven de partijen staand staatshoofd heeft Willem-Alexander zich verre gehouden van de verkiezingsstrijd. Hij is niet eens gaan stemmen. Bij de net begonnen kabinetsformatie staat de koning - al kan er in geval van een patstelling een beroep op hem gedaan worden - aan de zijlijn. ','<p>De meeste politieke analisten gaan er intussen van uit dat Mark Rutte opnieuw minister-president zal worden. Er is dus alle kans dat de tandem Willem-Alexander en Mark Rutte in stand blijft. Dat is voor de koning, al mag hij zich daar nooit over uitlaten, niet onbelangrijk, want hij heeft met de VVD-leider, voor zover dat zichtbaar is, een soepele samenwerking weten op te bouwen.</p>\r\n\r\n<h3>Energiek en goedlachs </h3>\r\n\r\n<p>Koning en premier zijn tot elkaar veroordeeld. Ze moeten, graag of niet, samenwerken. Een andere smaak is er niet. Willem-Alexander en Mark Rutte hebben op het eerste gezicht heel wat gemeen. Ze zijn leeftijdsgenoten, studeerden allebei geschiedenis in Leiden, zijn allebei Nederlands Hervormd, lijken allebei energiek en goedlachs en tonen zich allebei gemakkelijk in de omgang. Dat is de buitenkant.</p>\r\n\r\n<p>Hoe het echt tussen de twee marcheert, hoort tot het geheim van Noordeinde. Wat we in de voorbije vier jaar zagen, was een koning die op grote afstand bleef van alles wat met (partij)politiek te maken heeft en de minister-president ook in diens rol als \'nationale leider\' niet in de weg zat. </p>\r\n<p>Op zijn beurt verdedigde de premier de koning te vuur en te zwaard als die te maken kreeg met kritiek op de kosten van de monarchie, zoals bijvoorbeeld dure paleisverbouwingen, een uit het verleden opduikende belastingdeal, de onderhoudskosten van de Groene Draeck en zo meer.</p>\r\n<h3>Ragfijne samenwerking</h3>\r\n<p>In onze constitutionele monarchie luist',NULL);

/*!40000 ALTER TABLE `nieuws` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
