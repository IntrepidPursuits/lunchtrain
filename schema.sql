-- MySQL dump 10.13  Distrib 5.6.25-73.1, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: lunchbot_prod
-- ------------------------------------------------------
-- Server version	5.6.25-73.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `app_installs`
--

DROP TABLE IF EXISTS `app_installs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_installs` (
  `team_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `installer_dm_channel_id` varchar(20) DEFAULT NULL,
  `install_message_ts` varchar(255) DEFAULT NULL,
  `team_name` varchar(1000) NOT NULL,
  `token` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`team_id`),
  KEY `app_installs_team` (`team_id`,`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lunch_trains`
--

DROP TABLE IF EXISTS `lunch_trains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lunch_trains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` varchar(255) DEFAULT NULL,
  `creator_id` varchar(255) DEFAULT NULL,
  `creator_name` varchar(255) DEFAULT NULL,
  `channel_id` varchar(255) DEFAULT NULL,
  `channel_name` varchar(255) DEFAULT NULL,
  `team_domain` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `date_leaving` int(11) DEFAULT NULL,
  `date_cancelled` int(11) DEFAULT NULL,
  `payload` text,
  `creator_message_ts` varchar(20) DEFAULT NULL,
  `channel_message_ts` varchar(20) DEFAULT NULL,
  `creator_dm_channel_id` varchar(255) DEFAULT NULL,
  `train_type` varchar(20) DEFAULT NULL,
  `warning_sent` tinyint(3) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `date_leaving` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=453992 DEFAULT CHARSET=utf8
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
