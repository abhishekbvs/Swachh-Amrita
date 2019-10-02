-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: swachh_amrita
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('admin','1',1568743495),('event-manager','1',1569762201),('event-manager','2',1569779351),('event-manager','4',1568892748),('participant','1',1569773957),('participant','12',1569776793),('participant','14',1569776823),('participant','15',1569776836),('participant','17',1569776867),('participant','18',1569776890),('participant','19',1569776927),('participant','21',1569776944),('participant','22',1569776965),('participant','23',1569776984),('participant','24',1569777050),('participant','26',1568893422),('participant','27',1569217010),('participant','28',1569779184),('participant','29',1569779269),('participant','6',1569776735),('participant','7',1569776746),('participant','8',1569776781),('volunteer','1',1569773959),('volunteer','13',1569777228),('volunteer','16',1569777348),('volunteer','2',1569777902),('volunteer','20',1569777531),('volunteer','3',1569777872),('volunteer','5',1569777094);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('admin',1,'Adminstrator',NULL,NULL,1568736775,1568736775),('event-manager',1,NULL,NULL,NULL,1568737799,1568737799),('participant',1,NULL,NULL,NULL,1568736815,1568736815),('volunteer',1,NULL,NULL,NULL,1568737819,1568737819);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `resolved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (2,'asdsad','bvsabhishek@gmail.com','asdsadx sdcd','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem nulla pharetra diam sit amet nisl. Eget magna fermentum iaculis eu non. Eu tincidunt tortor aliquam nulla facilisi cras. Sit amet luctus venenatis lectus. Blandit aliquam etiam erat velit scelerisque ',0),(3,'Prahladkumar','prahladkumar2222@gmail.com','wrong syntax','fewfwefw',0);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `from_datetime` varchar(100) NOT NULL,
  `to_datetime` varchar(100) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `close_reg` tinyint(1) NOT NULL DEFAULT '0',
  `end_event` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk-event-created-by` (`user_id`),
  CONSTRAINT `fk-event-created-by` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (10,1,'Amalabharatham Clean Up Drive','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','02-Oct-2019 09:00','02-Oct-2019 18:00',1,0,0),(11,2,'Swachhta Hi Seva','The host sheds light on the Swachh Bharat Mission, an undertaking of the Indian government, wherein the prime minister of India urges the masses to take part in the mission to keep India clean.','23-Oct-2019 06:25','30-Oct-2019 14:50',1,1,0);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1568213944),('m190911_132444_create_user_table',1568234395),('m190912_045745_create_rbac_tables',1568264383),('m190912_052620_create_event_table',1568273643),('m190912_162502_create_team_table',1568306332),('m190915_102310_create_volunteer_table',1568543836),('m190915_155451_create_registration_table',1568563563),('m190921_145415_create_contact_table',1569134479);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `check_in` datetime DEFAULT NULL,
  `check_out` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-reg-user` (`user_id`),
  KEY `fk-reg-event` (`event_id`),
  KEY `fk-reg-team` (`team_id`),
  CONSTRAINT `fk-reg-event` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-reg-team` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-reg-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (6,6,10,10,'2019-09-29 22:56:02',NULL,NULL),(7,7,10,10,'2019-09-29 22:57:06',NULL,NULL),(8,8,10,10,'2019-09-29 22:57:55',NULL,NULL),(10,14,10,11,'2019-09-29 23:01:35',NULL,NULL),(11,15,10,11,'2019-09-29 23:03:04',NULL,NULL),(13,17,10,12,'2019-09-29 23:05:20',NULL,NULL),(15,12,10,11,'2019-09-29 23:06:39',NULL,NULL),(16,18,10,12,'2019-09-29 23:09:25',NULL,NULL),(17,19,10,12,'2019-09-29 23:10:24',NULL,NULL),(18,21,10,13,'2019-09-29 23:11:20',NULL,NULL),(19,22,10,13,'2019-09-29 23:12:12',NULL,NULL),(20,23,10,13,'2019-09-29 23:13:13',NULL,NULL),(21,28,10,10,'2019-09-29 23:16:43',NULL,NULL),(22,29,10,10,'2019-09-29 23:18:12',NULL,NULL),(23,1,10,11,'2019-09-30 19:04:02',NULL,NULL);
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `team_size` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk-event-team` (`event_id`),
  CONSTRAINT `fk-event-team` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (10,10,'Marvel','Wakanda','Wakanda is a fictional country located in Sub-Saharan Africa, created by Marvel Comics. It is home to the superhero Black Panther.',5),(11,10,'DC','Atlantis','Atlantis is a fictional island mentioned within an allegory on the hubris of nations in Plato\'s works Timaeus and Critias, ',12),(12,10,'Alchemist','Central City','Central City is the official capital and also the seat of government in Amestris. The National Central Library, Central Command, the 5 National Laboratories, and Amestris\' Parliament are all located in Central. ',15),(13,10,'GOT','King\'s Landing','King\'s Landing is the capital, and largest city, of the Seven Kingdoms. Located on the east coast of Westeros in the Crownlands, just north of where the Blackwater Rush flows into Blackwater Bay',10),(14,11,'team 1','Kochi','Kochi About this soundlisten also known as Cochin is a major port city on the south-west coast of India bordering the Laccadive Sea. It is part of the district of Ernakulam in the state of Kerala and is often referred to as Ernakulam',5);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `roll_no` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email_id` (`email_id`),
  UNIQUE KEY `phone_no` (`phone_no`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  UNIQUE KEY `roll_no` (`roll_no`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'abhishekbvs','bvsabhishek@gmail.com','V9Yg4LQQuuLWTOsIkla56jTztdiYaA5l','$2y$13$3XuSNjvSVClIVkDNBc18zuA/eFHjJQLTDENIviEiq/RGbQ9tIZ1J2',NULL,'Abhishek Bvs','AM.EN.U4CSE17213','8125307464',1568235582,1568235582),(2,'rahulpodugu','rahul2251999@gmail.com','HwGJqWlGlE7Umo_VxlaRFCQRBR5Een9D','$2y$13$Yma2tpLQWGPmv6CF52R68eAfhDbecChUs2fylMq0Wg7uH5ilndZjW',NULL,'Rahul Podugu','AM.EN.U4CSE17252','9440193023',1568822975,1568822975),(3,'balajivamsi','balaji@gmail.com','ELx3003C1oSh3uG0K-SptGJD_qXiN_ru','$2y$13$NuFGypGh1xGSmyH4JmFWeemABf6UcxYiBqIff9vDk/FBH51rCzNCy',NULL,'Balaji vamshi','AM.EN.U4CSE17251','9440757698',1568823222,1568823222),(4,'premasai','prema@yahoo.com','waqXmyfY0ub8omSmx1Fw8Qey1hmuQBAz','$2y$13$DNDUnvSIPPS1xaafKa1y5OybJmtrtFIYWZ0Dx8N0NDM6P3VFFbkc2',NULL,'Prema Sai','AM.EN.U4CSE17214','5668567887',1568823326,1568892636),(5,'godoftunder','thor@gmail.com','oRt2rhSUBsO3ydaPmPqLiEecr2RKYFxy','$2y$13$S62En3XvC.jtwPBN3SnQ1urSbvDf9G2sMCd3LpLqjCAnLOgTItkTm',NULL,'Thor','AM.EN.MARVEL17252','5668567896',1568823479,1568823479),(6,'hulk','hulk@hotmail.com','hl6WR7XxuOFF2OMkVRopzNO7XmCY9RNx','$2y$13$n1lDu4vBmxTRgPI/PuP0guF4Qhc1g6OrgifSDdc3T1.aLYO3Yyceu',NULL,'Bruce banner','AM.EN.U4MAR17214','9738567887',1568823594,1569134342),(7,'ironman','stark@gmail.com','jp21A8q2j8NJ2CkvoiP6xV0n4SZYjU3A','$2y$13$LgrDdi0CxD9QEDPKHi4h9uGXzvY7HEyFrwrvougXO6PkQeRjjnyRu',NULL,'Tony stark','AM.EN.MARVEL17251','9443453454',1568823702,1568823702),(8,'captainamerica','steve@gmail.com','P6XGaEGO9OAynjXP6-S_bx1vVc43kOor','$2y$13$16ZoZTPBL2B6ggNVsmqQ2..VMn5ZnxiilwPYmO3eN08LYW53RG2qC',NULL,'Steve rogers','AM.EN.MARVEL17433','9440757643',1568823787,1568825977),(12,'Batbat','Batman@gmail.com','4BuaMQ6yLLmoJKhBunDOieSHxvG3AP5a','$2y$13$pAx75RAABmtNNicSbq4X0O187p8Df8qmp7lVyZ1cQSX2V1KsN/nQa',NULL,'Batman','AM.EN.DC17223','9440734345',1568824128,1568824128),(13,'Aquaman','aqua@gmail.com','nX9QXWByMAvQ8sx-zzgLa0KQYVIB1F5y','$2y$13$SPjWrxl/QUh3tkK15oXQ6uQIiW89ZTsTUdgMtSEr3TLIrLOWCMLRW',NULL,'Athur','AM.EN.DC17332','9442323244',1568824219,1568824219),(14,'wonderwomen','diana@gmail.com','hfkwUn0pUOFU_J1Fhf131Vm2m_lHqJjq','$2y$13$CoJgWo4c9VjtlGjJtF0ltO493MnVc02ge7bvua0mYzGvp.EvjTsYu',NULL,'Diana','AM.EN.DC17255','5668563434',1568824418,1569778193),(15,'cyborg98','cyborg@gmail.com','0IR_gd1uo5uqNOQvxWqXFyOkrH-meTxg','$2y$13$PEtwsa.gpguFeLNY1yi/R./yJiesbFFyUSdBmoelmhAOcYaQodkVi',NULL,'Cyborg','AM.EN.DC6357','4343543534',1568824567,1568824567),(16,'EdwardElric','edward@gmail.com','KLKSq07DKnCpkBvo0I5ss85XYmG3IHFT','$2y$13$ICSM.yR58KUk5fdbbIGBs.5cA664qtBqLyfb8c/zBcfRxcD8ye.iC',NULL,'Edward Elric','AM.EN.ALCHEMI17875','5668567890',1568824849,1568824849),(17,'AlphonseElric','alphonse@gmail.com','fxy7qzLxqDdIdGtrknKKGBRXhOGKUCLm','$2y$13$vOMqJuLCG0oSUv0p2wCRIOCFXKzpgFeI71C1or025RBWdX./lSZ0O',NULL,'Alphonse Elric','AM.EN.ALCHEMI17234','5668567234',1568824963,1568824963),(18,'RoyMustang','mustang@gmail.com','J7kttTQUIsbri0TAM6s_cnS0taVKuPjo','$2y$13$cPkf4YmBpyYNQShu5F8Lo.XXtwqI4p8j2cStrNf7PICFuUVy5uiL6',NULL,'Roy Mustang','AM.EN.ALCHEMI17252','9738567823',1568825054,1569778731),(19,'VanHohenheim','Hohenheim@gmail.com','-uzlY4FTkKPumDkwwlc3i8HRQOGl7GpG','$2y$13$gnL1P0giwcuwA1Flv9wwjOrcGdd0127G2Y87HNil2ZS.AfQKiRCH.',NULL,'Van Hohenheim','AM.EN.ALCHEMI17214','5668562343',1568825179,1569778813),(20,'DaenerysTargaryen','Targaryen@gmail.com','1n9W_s3Yj4JY2ByVDrljmC1Sh91J31sg','$2y$13$Oc3ZvBjtWoSJ1zd1furU8.dHZakDm3z/X1JAQggHiIh5ielNJ3pVW',NULL,'Emilia Clarke','AM.EN.GOT17756','9440757897',1568825362,1568825362),(21,'BranStark','BranStark@gmail.com','TuFVQm8RPTRvC4Nb2dGcA61MYv1x4hTe','$2y$13$SPYhRudp.ccUHYSn1/FyG.JuX3rE9/.YAxMdtycCNee3pWU2MnYW6',NULL,'Isaac Hempstead Wright','AM.EN.GOT17767','9440757645',1568825719,1568825719),(22,'TyrionLannister','TyrionLannister@gmail.com','9Q7tsdtRn-hMmDwOqGoZ25J7DBFQoBpv','$2y$13$eKNvfjIPfvDfr54qJuOI1.eXMzFpLdl.G74j.0jn3sGpkUyp9BaM.',NULL,'Peter Dinklage','AM.EN.GOT17343','9440757211',1568825923,1568825923),(23,'KhalDrogo','Jasonmomoa@gmail.com','6cARPVhYK0I9SHeNNgWKxAI2Ag6U_D4F','$2y$13$Cg0qSYCJCnI5eYMr33zCXeY7Ol5l73JH2Wn7BdpdjNgQz9AqbCfgK',NULL,'Jason Momoa','AM.EN.GOT17252','9440757690',1568826198,1568826198),(24,'confusedsoul','nithil999@gmail.com','QNRYCjf6i1UqNyFTlaxr18uK4I7PUDAV','$2y$13$aDQKtqtHAXXr7oCUoUeYLOqVyC28sS0eMEyXGOt.EwFiR5VzGPoTS',NULL,'Nithin Kothapalli','AM.EN.U4CSE17239','9440757697',1568828191,1568828191),(26,'test_participant','participant@yahoo.com','z3F6Co1O9SD4_3WeBWkJnrnoENp32Ry_','$2y$13$1AW4uKbo.OMLW5.v0tITXeTjwxMDPDHNljyuhMqebsVO63EKVBfzq',NULL,'Participant Test','AM.EN.U4CSE17290','8125307409',1568893422,1568893422),(27,'prahlad125','prahladkumar2222@gmail.com','oEKw16IGKgkSn0DF3c75nEYLCJt5DeMK','$2y$13$xcw4ujpGjbEnbjuXxyxyAu5VfTYtk/N/bK4/Hi7ZqBULruSxwPStC',NULL,'Prahlad Kumar Popuri','AM.EN.U4CSE17253','9494223181',1569217010,1569217010),(28,'thanos','thanos@gmail.com','1uMOHMWCvy6ygIayJ1beFl8Q9dJ-D5vg','$2y$13$l3VdUrH5IYedcI0cQHoJx.HiBijN80oYVu8JnsLit0mUWGsdfJtsq',NULL,'Thanos','AM.EN.MARVEL17275','9440757695',1569779184,1569779184),(29,'gamora','gamora@gmail.com','fooEDUjt48ZsWxjKjdVRD6Ol5gYNywH3','$2y$13$fKgesvMbl5r2I1W8PL1QVenqhMSYYYuKb1XHalq6QFXJAr9BH8JCe',NULL,'gamora','AM.EN.MARVEL17298','5668567891',1569779269,1569779269);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volunteer`
--

DROP TABLE IF EXISTS `volunteer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `volunteer_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-team-volunteer` (`team_id`),
  CONSTRAINT `fk-team-volunteer` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volunteer`
--

LOCK TABLES `volunteer` WRITE;
/*!40000 ALTER TABLE `volunteer` DISABLE KEYS */;
INSERT INTO `volunteer` VALUES (9,10,1,1),(10,10,5,2),(11,10,2,4),(12,10,4,3),(13,11,1,1),(14,11,13,2),(15,11,4,4),(16,11,3,3),(17,12,1,1),(18,12,16,2),(19,12,2,4),(20,12,24,3),(21,13,1,1),(22,13,20,2),(23,13,24,4),(24,13,3,3),(25,14,1,1),(26,14,2,2);
/*!40000 ALTER TABLE `volunteer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-02 22:29:09
