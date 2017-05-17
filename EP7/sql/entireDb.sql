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

-- Dumping structure for table browsergame.buildings
CREATE TABLE IF NOT EXISTS `buildings` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0',
  `incomeGold` int(5) DEFAULT '0',
  `incomeStone` int(5) DEFAULT '0',
  `incomeWood` int(5) DEFAULT '0',
  `incomeIron` int(5) DEFAULT '0',
  `defense` int(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table browsergame.buildings: 1 rows
DELETE FROM `buildings`;
/*!40000 ALTER TABLE `buildings` DISABLE KEYS */;
INSERT INTO `buildings` (`id`, `name`, `incomeGold`, `incomeStone`, `incomeWood`, `incomeIron`, `defense`) VALUES
	(1, 'Town hall', 50, 50, 50, 50, 25),
	(2, 'Guardtower', 0, 0, 0, 0, 50);
/*!40000 ALTER TABLE `buildings` ENABLE KEYS */;

-- Dumping structure for table browsergame.resources
CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(255) NOT NULL,
  `stone` int(255) DEFAULT NULL,
  `wood` int(255) DEFAULT NULL,
  `iron` int(255) DEFAULT NULL,
  `gold` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table browsergame.resources: 1 rows
DELETE FROM `resources`;
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
INSERT INTO `resources` (`id`, `stone`, `wood`, `iron`, `gold`) VALUES
	(13, 100, 123, 145, 111);
/*!40000 ALTER TABLE `resources` ENABLE KEYS */;

-- Dumping structure for table browsergame.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table browsergame.users: 1 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `creationDate`) VALUES
	(13, 'Rikka', '$2y$12$dYOmJZYENRZPD1UFJ9J6mOeP9MUPEcPe1qJ52lu45o9OqfXcrx2.W', '123@as', '2017-05-14 16:48:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table browsergame.world
CREATE TABLE IF NOT EXISTS `world` (
  `id` int(255) NOT NULL,
  `buildings` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table browsergame.world: 1 rows
DELETE FROM `world`;
/*!40000 ALTER TABLE `world` DISABLE KEYS */;
INSERT INTO `world` (`id`, `buildings`) VALUES
	(13, '0,2,2,0,1,0,2,1,0');
/*!40000 ALTER TABLE `world` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
