-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for browsergame
CREATE DATABASE IF NOT EXISTS `browsergame` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `browsergame`;

-- Dumping structure for table browsergame.armyunits
CREATE TABLE IF NOT EXISTS `armyunits` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0',
  `armyStrength` int(255) DEFAULT '0',
  `cost` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table browsergame.armyunits: 2 rows
DELETE FROM `armyunits`;
/*!40000 ALTER TABLE `armyunits` DISABLE KEYS */;
INSERT INTO `armyunits` (`id`, `name`, `armyStrength`, `cost`) VALUES
	(1, 'Militia', 2, 5),
	(2, 'Bowman', 3, 14);
/*!40000 ALTER TABLE `armyunits` ENABLE KEYS */;

-- Dumping structure for table browsergame.buildings
CREATE TABLE IF NOT EXISTS `buildings` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0',
  `incomegold` int(5) DEFAULT '0',
  `incomestone` int(5) DEFAULT '0',
  `incomewood` int(5) DEFAULT '0',
  `incomeiron` int(5) DEFAULT '0',
  `costgold` int(5) DEFAULT '0',
  `coststone` int(5) DEFAULT '0',
  `costiron` int(5) DEFAULT '0',
  `costwood` int(5) DEFAULT '0',
  `defense` int(255) DEFAULT '0',
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table browsergame.buildings: 4 rows
DELETE FROM `buildings`;
/*!40000 ALTER TABLE `buildings` DISABLE KEYS */;
INSERT INTO `buildings` (`id`, `name`, `incomegold`, `incomestone`, `incomewood`, `incomeiron`, `costgold`, `coststone`, `costiron`, `costwood`, `defense`, `image`) VALUES
	(1, 'Town hall', 0, 0, 0, 0, 100, 100, 100, 100, 25, 'townhall.png'),
	(2, 'Guardtower', 0, 0, 0, 0, 30, 30, 30, 30, 50, 'tower.png'),
	(4, 'Quarry', 0, 20, 0, 0, 0, 0, 0, 200, 0, NULL),
	(5, 'Lumber Yard', 0, 0, 50, 0, 0, 0, 0, 300, 0, NULL);
/*!40000 ALTER TABLE `buildings` ENABLE KEYS */;

-- Dumping structure for table browsergame.resources
CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(255) NOT NULL,
  `stone` int(255) DEFAULT '125',
  `wood` int(255) DEFAULT '125',
  `iron` int(255) DEFAULT '125',
  `gold` int(255) DEFAULT '125',
  `army` varchar(50) DEFAULT NULL,
  `armyStrength` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table browsergame.resources: 0 rows
DELETE FROM `resources`;
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
INSERT INTO `resources` (`id`, `stone`, `wood`, `iron`, `gold`, `army`, `armyStrength`) VALUES
	(1, 125, 125, 125, 125, '1:4', 8),
	(2, 125, 125, 555, 120, '1:1', 2);
/*!40000 ALTER TABLE `resources` ENABLE KEYS */;

-- Dumping structure for table browsergame.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table browsergame.users: 0 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `creationDate`) VALUES
	(1, 'Rikka', '$2y$12$hzlZM1bVptaW0iB.1d8l3.lfmRrS1Ma0ubvym3Wn7JyiMH3L6QAr.', '123@123.123', '2017-12-08 18:34:21'),
	(2, 'Rikkatest', '$2y$12$ZryFkY3AH95SUlC4DcpjOews3b0Dqx5uq05Ue3/RrNQoXhbI0KGHW', '123@123.123', '2017-12-08 18:34:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table browsergame.world
CREATE TABLE IF NOT EXISTS `world` (
  `id` int(255) NOT NULL,
  `buildings` varchar(255) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0',
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table browsergame.world: 0 rows
DELETE FROM `world`;
/*!40000 ALTER TABLE `world` DISABLE KEYS */;
INSERT INTO `world` (`id`, `buildings`, `name`) VALUES
	(1, '0,0,0,0,0,0,0,0,0', 'Rikka\'s world'),
	(2, '0,0,0,0,0,0,0,0,0', 'Rikkatest\'s world');
/*!40000 ALTER TABLE `world` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
