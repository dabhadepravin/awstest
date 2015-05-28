CREATE DATABASE  IF NOT EXISTS `dfp` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dfp`;
-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: dfp
-- ------------------------------------------------------
-- Server version	5.5.36

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
-- Table structure for table `ad_types`
--

DROP TABLE IF EXISTS `ad_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) DEFAULT NULL,
  `ad_type` varchar(45) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  `estimated_impressions` varchar(45) DEFAULT NULL,
  `ad_units` int(11) DEFAULT NULL,
  `datecreated` timestamp NULL DEFAULT NULL,
  `costperk` float(10,2) DEFAULT NULL COMMENT 'per 1k impressions',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_types`
--

LOCK TABLES `ad_types` WRITE;
/*!40000 ALTER TABLE `ad_types` DISABLE KEYS */;
INSERT INTO `ad_types` VALUES (1,1,'MPU',300,300,'Bottom','1','200000',4,'2014-12-30 20:00:00',2.00),(2,1,'LB',718,40,'Top header','1','300000',1,'2014-12-30 20:00:00',3.00),(3,1,'HP',300,500,'SideBar','1','200000',2,'2014-12-30 20:00:00',1.50),(4,2,'MPU',300,300,'Bottom','1','200000',4,'2014-12-30 20:00:00',4.00),(5,2,'LB',718,40,'Top header','1','300000',1,'2014-12-30 20:00:00',2.00),(6,2,'HP',300,500,'SideBar','1','200000',2,'2014-12-30 20:00:00',3.00),(7,3,'MPU',300,300,'Bottom','1','200000',4,'2014-12-30 20:00:00',3.50),(8,3,'LB',718,40,'Top header','1','300000',1,'2014-12-30 20:00:00',2.50),(9,3,'HP',300,500,'SideBar','1','200000',2,'2014-12-30 20:00:00',2.00);
/*!40000 ALTER TABLE `ad_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adunits`
--

DROP TABLE IF EXISTS `adunits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adunits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  `costperk` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adunits`
--

LOCK TABLES `adunits` WRITE;
/*!40000 ALTER TABLE `adunits` DISABLE KEYS */;
INSERT INTO `adunits` VALUES (1,'mpu','MPU',300,250,'1',10.00),(2,'lb','Leader Board',728,90,'1',20.00),(3,'hp','Half Page',300,600,'1',25.00);
/*!40000 ALTER TABLE `adunits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advertiser`
--

DROP TABLE IF EXISTS `advertiser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `address` text,
  `dateadded` varchar(45) DEFAULT NULL,
  `dfpid` varchar(45) DEFAULT NULL,
  `companyname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertiser`
--

LOCK TABLES `advertiser` WRITE;
/*!40000 ALTER TABLE `advertiser` DISABLE KEYS */;
INSERT INTO `advertiser` VALUES (1,12,'john carter','johndfp@gmail.com','083838282','','','2015-03-23 17:45:43','\n			','johninc');
/*!40000 ALTER TABLE `advertiser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_url` varchar(255) DEFAULT NULL,
  `brand_logo_url` text,
  `brandscol` varchar(45) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `monthly_impression` varchar(45) DEFAULT NULL,
  `followers` varchar(45) DEFAULT NULL,
  `fblike` varchar(45) DEFAULT NULL,
  `brand_description` text,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Anazahra','http://www.anazahra.com','http://azcdn.anazahra.com/wp-content/themes/anazahra/images/new-logo-2014.png',NULL,'2012-10-10 00:00:00','130000','10000','10000','Women website',1),(2,'Super','http://www.super.ae','http://www.super.ae/wp-content/themes/admc/images/logo.jpg',NULL,'2012-10-10 00:00:00','140000','20000','1000','Sport website',3),(3,'Bolgs Anazahra','http://blogs.anazahra.com','http://azcdn.anazahra.com/wp-content/themes/anazahra/images/new-logo-2014.png',NULL,'2012-10-10 00:00:00','10000','10000','10000','blogs',2);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(45) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  `catcode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Women Related Products','1','women'),(2,'Blogs','1','blog'),(3,'Sports','1','sport'),(4,'Kids','1','kids'),(5,'Others','1',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creatives`
--

DROP TABLE IF EXISTS `creatives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creatives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) DEFAULT NULL,
  `ad_type_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `width` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `url` text,
  `dateadded` timestamp NULL DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  `advertiser_id` int(11) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `orderid` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creatives`
--

LOCK TABLES `creatives` WRITE;
/*!40000 ALTER TABLE `creatives` DISABLE KEYS */;
INSERT INTO `creatives` VALUES (1,NULL,1,'/var/www/selfdfp/public/creatives/azmpu.jpg','300','250','http://www.anazahra.com','2015-03-23 13:45:44','1',NULL,NULL,NULL);
/*!40000 ALTER TABLE `creatives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(100) NOT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  `advertiser_id` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `dfpid` varchar(45) DEFAULT NULL,
  `customername` varchar(100) DEFAULT NULL,
  `customeremail` varchar(100) DEFAULT NULL,
  `customerphone` varchar(45) DEFAULT NULL,
  `ordertype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,'20150323174543','1000','2015-03-23 13:45:43',NULL,'0',NULL,'john carter','johndfp@gmail.com','083838282','');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) DEFAULT NULL,
  `creative_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `ad_type_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `item_value` float(10,2) DEFAULT NULL,
  `item_cost` float(10,2) DEFAULT NULL,
  `datecreated` timestamp NULL DEFAULT NULL,
  `advertiser_id` varchar(45) DEFAULT NULL,
  `status` char(1) DEFAULT '0',
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,'20150323174543',1,NULL,1,100000,10.00,1000.00,'2015-03-23 13:45:44',NULL,'1','2015-03-23 17:00:00','2015-04-14 17:00:00');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(255) DEFAULT NULL,
  `setting_value` varchar(255) DEFAULT NULL,
  `setting_lbl` varchar(100) DEFAULT NULL,
  `setting_datatype` varchar(45) DEFAULT NULL,
  `setting_required` tinyint(4) DEFAULT NULL,
  `datecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'network_id','23232','Network ID','number',1,'2015-03-23 10:02:01'),(2,'pub_id','1123213','Publisher ID','number',1,'2015-03-23 10:02:01'),(3,'pub_email','da@gmail.com','Publisher Email','email',1,'2015-03-23 10:12:41'),(4,'salesperson_id','12321313','Salesperson ID','number',0,'2015-03-23 10:12:41'),(5,'trafficker_id','1231321','TraffickerId ID','number',0,'2015-03-23 10:12:41'),(6,'default_advtid','343432424','Default Advertiser ID','number',0,'2015-03-23 10:12:41');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `dateadded` timestamp NULL DEFAULT NULL,
  `usertype` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pravindabhade','mhjlEGMy',NULL,'2'),(12,'john_carter931','34r2WkPf','2015-03-23 13:45:43','1');
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

-- Dump completed on 2015-03-23 23:19:54
