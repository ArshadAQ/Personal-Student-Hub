CREATE DATABASE IF NOT EXISTS `Finalproject`;# 1 row affected.

USE `Finalproject`;# MySQL returned an empty result set (i.e. zero rows).



CREATE TABLE IF NOT Exists`Arshad` (
  `Name` char(50) NOT NULL,
  `Mobileno.` bigint(10) unsigned,
  `Phoneno` bigint(13),
  `Address` varchar(255)
) ENGINE=InnoDB;# MySQL returned an empty result set (i.e. zero rows).


--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `user_id` int(10) unsigned NOT NULL,
  `transaction` tinytext NOT NULL,
  `date/time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `symbol` char(10) NOT NULL,
  `shares` int(20) NOT NULL DEFAULT '0',
  UNIQUE KEY `date/time` (`date/time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (11,'BUY','2016-12-20 13:23:16','AB',6),(11,'SELL','2016-12-20 13:50:16','FREE',5),(11,'BUY','2016-12-20 14:02:50','C',2),(14,'BUY','2016-12-21 16:19:33','C',2),(14,'BUY','2016-12-21 16:21:55','FREE',3),(14,'BUY','2016-12-21 16:22:08','AB',2),(14,'SELL','2016-12-21 16:22:22','FREE',3),(14,'BUY','2016-12-21 17:17:19','FREE',2);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `symbol` char(10) NOT NULL,
  `shares` int(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`symbol`),
  UNIQUE KEY `user_id_2` (`user_id`,`symbol`),
  UNIQUE KEY `user_id_3` (`user_id`,`symbol`),
  UNIQUE KEY `user_id_4` (`user_id`,`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (1,1,'AB',2),(2,2,'AB',1),(3,3,'BC',3),(4,4,'BC',5),(5,5,'CD',4),(6,6,'Z',1),(7,7,'Z',1),(8,8,'AB',2),(9,9,'FREE',5),(10,10,'FREE',3),(12,9,'F',2),(13,10,'AB',2),(15,8,'C',1),(26,11,'AB',6),(27,11,'C',2),(28,14,'C',2),(30,14,'AB',2),(31,14,'FREE',2);
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andi','$2y$10$m/vyBq7OB7qwH0ODkDLEpOUXKfNZ8wzTTpHSlsU9kaU469JAU98Da',10000.0000),(2,'caesar','$2y$10$m/vyBq7OB7qwH0ODkDLEpOUXKfNZ8wzTTpHSlsU9kaU469JAU98Da',10000.0000),(3,'eli','$2y$10$m/vyBq7OB7qwH0ODkDLEpOUXKfNZ8wzTTpHSlsU9kaU469JAU98Da',10000.0000),(4,'hdan','$2y$10$m/vyBq7OB7qwH0ODkDLEpOUXKfNZ8wzTTpHSlsU9kaU469JAU98Da',10000.0000),(5,'jason','$2y$10$m/vyBq7OB7qwH0ODkDLEpOUXKfNZ8wzTTpHSlsU9kaU469JAU98Da',10000.0000),(6,'john','$2y$10$m/vyBq7OB7qwH0ODkDLEpOUXKfNZ8wzTTpHSlsU9kaU469JAU98Da',10000.0000),(7,'levatich','$2y$10$m/vyBq7OB7qwH0ODkDLEpOUXKfNZ8wzTTpHSlsU9kaU469JAU98Da',10000.0000),(8,'rob','$2y$10$m/vyBq7OB7qwH0ODkDLEpOUXKfNZ8wzTTpHSlsU9kaU469JAU98Da',10000.0000),(9,'skroob','$2y$10$m/vyBq7OB7qwH0ODkDLEpOUXKfNZ8wzTTpHSlsU9kaU469JAU98Da',10000.0000),(10,'zamyla','$2y$10$m/vyBq7OB7qwH0ODkDLEpOUXKfNZ8wzTTpHSlsU9kaU469JAU98Da',10000.0000),(14,'Arshad','$2y$10$m/vyBq7OB7qwH0ODkDLEpOUXKfNZ8wzTTpHSlsU9kaU469JAU98Da',9831.5400);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-22  7:37:01
