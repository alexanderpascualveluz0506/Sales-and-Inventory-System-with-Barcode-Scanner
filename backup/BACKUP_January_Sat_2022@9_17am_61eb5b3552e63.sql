-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: store
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `Account_No` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Contact_No` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `start` time NOT NULL,
  `end_time` time NOT NULL,
  `IP_address` varchar(50) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`Account_No`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'Alexandra','Veluz','09231088799','xanderpascual2018@gmail.com','alexveluz','123456789','Admin','1041 Bayan Luma 8 Imus City, Cavite','00:00:00','00:00:00','::1','LAPTOP-T0MO93OA',''),(2,'Candace','Angeles','09231088799','xanderpascual2018@gmail.com','zoe','zoe123','Staff','','00:00:00','00:00:00','::1','LAPTOP-T0MO93OA','');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` date DEFAULT NULL,
  `batch_no` varchar(50) NOT NULL,
  `total_batch_arrive` double NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `expiration` date NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `shelves_name` varchar(50) NOT NULL,
  `qty` double NOT NULL,
  `qty_sold` double NOT NULL,
  `remaining` double NOT NULL,
  `damage` double NOT NULL,
  `damage_cost` double NOT NULL,
  `qty_on_shelf` double NOT NULL,
  `cost` double NOT NULL,
  `remaining_cost` double NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `costPerUnit` double NOT NULL,
  `replenishment_level` int(11) NOT NULL,
  `new_barcode` mediumtext NOT NULL,
  `stackable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch`
--

LOCK TABLES `batch` WRITE;
/*!40000 ALTER TABLE `batch` DISABLE KEYS */;
INSERT INTO `batch` VALUES (75,'2022-01-10','B-101',50,'Cdo Meat Loaf  150g','2022-01-09','4800249909333','1','1-A',37,13,37,0,0,37,1000,740,'Canned Goods',22,20,0,'',3),(76,'2022-01-07','B-102',10000,'Bawang 1g','2022-01-15','67677761929','102','',8685,1315,8685,0,0,8685,1580,1369.6,'Fresh Vegetables',0.19,0.16,0,'',0),(77,'2022-01-07','B-103',50,'Argentina Beef Loaf  170g','2023-01-07','798229398874','1','1-C',44,6,44,0,0,34,1000,880,'Canned Goods',23,20,0,'uploads/barcode/798229398874.png',3),(78,'2022-01-07','B-104',50,'Cdo Meat Loaf  150g','2023-01-07','4800249909333','103','',29,22,29,0,0,19,1200,696,'Canned Goods',25,24,0,'',0);
/*!40000 ALTER TABLE `batch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacity`
--

DROP TABLE IF EXISTS `capacity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacity` (
  `StoreLenght` double NOT NULL,
  `StoreWidth` double NOT NULL,
  `StoreHeight` double NOT NULL,
  `unStorageLenght` double NOT NULL,
  `unStorageWidth` double NOT NULL,
  `unStorageHeight` double NOT NULL,
  `StorageLength` double NOT NULL,
  `StorageWidth` double NOT NULL,
  `StorageHeight` double NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacity`
--

LOCK TABLES `capacity` WRITE;
/*!40000 ALTER TABLE `capacity` DISABLE KEYS */;
INSERT INTO `capacity` VALUES (33.3,15.6,8.9,3.7,3.6,8.9,0,0,0,1);
/*!40000 ALTER TABLE `capacity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorysubinfo`
--

DROP TABLE IF EXISTS `categorysubinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorysubinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorysubinfo`
--

LOCK TABLES `categorysubinfo` WRITE;
/*!40000 ALTER TABLE `categorysubinfo` DISABLE KEYS */;
INSERT INTO `categorysubinfo` VALUES (15,'Canned Goods','Brand',' Argentina'),(16,'Canned Goods','Manufacturer',' Century Pacific Food INC'),(17,'Canned Goods','Manufacturer',' Chattrade Enterprises'),(18,'Canned Goods','Brand',' Rose Bowl'),(19,'Canned Goods','Brand',' Jolly Pure Goodness'),(20,'Canned Goods','Secondary Category','Milks and Sauces'),(21,'Canned Goods','Secondary Category','Meat and Fish'),(22,'Canned Goods','Secondary Category','Soups'),(23,'Canned Goods','Secondary Category','Others');
/*!40000 ALTER TABLE `categorysubinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deleted_item`
--

DROP TABLE IF EXISTS `deleted_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deleted_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_no` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deleted_item`
--

LOCK TABLES `deleted_item` WRITE;
/*!40000 ALTER TABLE `deleted_item` DISABLE KEYS */;
INSERT INTO `deleted_item` VALUES (1,'','','',0,0,0,'16:55:00','2021-12-31'),(2,'','','',0,0,0,'16:56:00','2021-12-31'),(3,'','','',0,0,0,'16:58:00','2021-12-31'),(4,'','','',0,0,0,'16:59:00','2021-12-31'),(5,'','','',0,0,0,'17:00:00','2021-12-31'),(6,'','','',0,0,0,'17:01:00','2021-12-31'),(7,'','','',0,0,0,'17:06:00','2021-12-31'),(8,'','','',0,0,0,'17:07:00','2021-12-31'),(9,'B-101','748485100418','San Marino Corned Tuna  150g',1,26,26,'17:08:00','2022-01-18'),(10,'B-103','779703935255','Argentina Beef Loaf  170g',1,23,0,'13:10:00','2022-01-18'),(11,'B-103','779703935255','Argentina Beef Loaf  170g',1,23,0,'13:23:00','2022-01-18');
/*!40000 ALTER TABLE `deleted_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_type`
--

DROP TABLE IF EXISTS `expense_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_type`
--

LOCK TABLES `expense_type` WRITE;
/*!40000 ALTER TABLE `expense_type` DISABLE KEYS */;
INSERT INTO `expense_type` VALUES (1,'Salary'),(2,'Rent'),(3,'Tax'),(4,'Electricity');
/*!40000 ALTER TABLE `expense_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `amount` double NOT NULL,
  `tax` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (1,'Rent ','2021-12-31',50,50),(2,'Tax','2021-12-30',50,0);
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filesofexpenses`
--

DROP TABLE IF EXISTS `filesofexpenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filesofexpenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `files` mediumtext NOT NULL,
  `expense_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filesofexpenses`
--

LOCK TABLES `filesofexpenses` WRITE;
/*!40000 ALTER TABLE `filesofexpenses` DISABLE KEYS */;
INSERT INTO `filesofexpenses` VALUES (6,'uploads/expenses_files/COLOR.docx',2);
/*!40000 ALTER TABLE `filesofexpenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filesofsupplier`
--

DROP TABLE IF EXISTS `filesofsupplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filesofsupplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `files` mediumtext NOT NULL,
  `supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filesofsupplier`
--

LOCK TABLES `filesofsupplier` WRITE;
/*!40000 ALTER TABLE `filesofsupplier` DISABLE KEYS */;
INSERT INTO `filesofsupplier` VALUES (1,'uploads/supplier_files/244651410_393034588963039_8222204067322915767_n.jpg',0),(2,'uploads/supplier_files/ddd.jpg',20),(3,'uploads/supplier_files/COLOR.docx',28),(7,'uploads/supplier_files/STAT 2 - Chapter 1.pdf',1),(8,'uploads/supplier_files/docu.docx',1);
/*!40000 ALTER TABLE `filesofsupplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `item_name` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` varchar(50) NOT NULL,
  `batch_count` int(11) NOT NULL,
  `total_supply` double NOT NULL,
  `total_batch_arrive` double NOT NULL,
  `inventory_value` double NOT NULL,
  `damage_quantity` double NOT NULL,
  `damaged_cost` double NOT NULL,
  `expiration` date NOT NULL,
  `perishable` varchar(50) NOT NULL,
  `stock_location` varchar(50) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `remaining` double NOT NULL,
  `last_date_adjustment` date NOT NULL,
  `reorder_quantity` double NOT NULL,
  `category` varchar(50) NOT NULL,
  `cost_price` double NOT NULL,
  `date_created` date NOT NULL,
  `qty_sold` double NOT NULL,
  `monitor_storage` varchar(50) NOT NULL,
  `qty_on_shelf` double NOT NULL,
  `replenishment_level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES ('Cdo Meat Loaf  150g','4800249909333',82,'',3,66,101,4200,0,0,'2024-06-07','','103',89,0,16,'2022-01-11',0,'Canned Goods',20,'2022-01-06',35,'',55,0),('Bawang 1g','67677761929',83,'',1,8685,10000,1580,0,0,'2022-01-14','YES','102',0,0,-1315,'2022-01-11',0,'Fresh Vegetables',0.16,'2022-01-07',1315,'',8685,0),('Argentina Beef Loaf  170g','748485800097',84,'',1,44,50,1000,0,0,'2023-01-07','','1',0,0,-6,'2022-01-07',0,'Canned Goods',20,'2022-01-07',6,'YES',34,40);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `returnable` varchar(50) NOT NULL,
  `perisable` varchar(50) NOT NULL,
  `selling_price` double NOT NULL,
  `cost_price` double NOT NULL,
  `date` date NOT NULL,
  `barcode_image` mediumtext NOT NULL,
  `length` varchar(50) NOT NULL,
  `width` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (109,'Cdo Meat Loaf  150g','150g','4800249909333','Canned Goods','Joycel  Empanto','','','',22,20,'2022-01-06','','5.842 ','5.08 ','8.89 '),(110,'Bawang 1g','1g','67677761929','Fresh Vegetables','Joycel  Empanto','','YES','YES',0.19,0.16,'2022-01-07','','','',''),(111,'Argentina Beef Loaf  170g','170g','748485800097','Canned Goods','Joycel  Empanto','','','',23,20,'2022-01-07','','5.842 ','5.08 ','8.89 '),(112,'Kamatis 170g','170g','67677761929','Canned Goods','Alexandra Veluz','','','',32,30,'2022-01-11','','','','');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_no` int(10) NOT NULL,
  `log_activity` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,1,'Login','0000-00-00 00:00:00'),(2,1,'Login','2021-10-19 06:52:13'),(3,2,'Login','2021-10-19 07:00:02'),(4,1,'Login','2021-10-19 19:23:22'),(5,2,'Login','2021-10-19 20:34:36'),(6,1,'Login','2021-10-19 20:52:02'),(7,1,'Login','2021-10-19 20:52:38'),(8,1,'Login','2021-10-19 20:58:40'),(9,1,'Login','2021-10-19 21:00:18'),(10,1,'Login','2021-10-19 21:01:26'),(11,1,'Login','2021-10-19 21:05:19'),(12,1,'Login','2021-10-19 21:11:33'),(13,1,'Login','2021-10-19 21:12:20'),(14,1,'Login','2021-10-19 21:12:27'),(15,1,'Login','2021-10-19 21:20:01'),(16,1,'Login','2021-10-19 21:20:26'),(17,1,'Login','2021-10-19 21:28:27'),(18,1,'Login','2021-10-20 01:45:22'),(19,1,'Login','2021-10-20 01:48:23'),(20,1,'Login','2021-10-20 01:58:22'),(21,1,'Login','2021-10-20 15:24:39'),(22,1,'Login','2021-12-22 10:05:52'),(23,1,'Login','2021-12-22 10:06:39'),(24,2,'Login','2021-12-22 10:07:06'),(25,2,'Login','2021-12-29 16:00:00'),(26,2,'Login','2021-12-29 16:00:00'),(27,2,'Login','2021-12-30 16:00:00'),(28,2,'Login','2021-12-30 16:00:00'),(29,2,'Login','2021-12-31 16:00:00'),(30,2,'Login','2021-12-31 16:00:00'),(31,1,'Login','2021-12-31 16:00:00'),(32,1,'Login','2021-12-31 16:00:00'),(33,1,'Login','2021-12-31 16:00:00'),(34,2,'Login','2022-01-02 05:51:07'),(35,2,'Logout','0000-00-00 00:00:00'),(36,2,'Login','2022-01-02 05:59:25'),(37,2,'Logout','2022-01-02 05:59:27'),(38,1,'Login','2022-01-02 06:09:12'),(39,2,'Login','2022-01-03 05:42:41'),(40,2,'Logout','2022-01-03 05:43:26'),(41,1,'Login','2022-01-03 05:45:01'),(42,2,'Login','2022-01-03 06:00:02'),(43,2,'Logout','2022-01-03 06:09:12'),(44,1,'Login','2022-01-03 06:14:10'),(45,2,'Login','2022-01-06 00:09:51'),(46,2,'Logout','2022-01-06 00:20:48'),(47,1,'Login','2022-01-06 03:31:14'),(48,1,'Login','2022-01-06 16:00:59'),(49,2,'Login','2022-01-06 20:03:59'),(50,2,'Logout','2022-01-06 20:28:16'),(51,2,'Login','2022-01-06 20:31:20'),(52,2,'Logout','2022-01-06 20:31:22'),(53,2,'Login','2022-01-06 20:37:03'),(54,2,'Logout','2022-01-06 20:37:05'),(55,1,'Login','2022-01-07 02:42:36'),(56,1,'Login','2022-01-07 03:52:18'),(57,2,'Login','2022-01-07 04:07:42'),(58,2,'Logout','2022-01-07 04:17:57'),(59,1,'Login','2022-01-07 04:47:04'),(60,1,'Login','2022-01-07 05:48:00'),(61,1,'Login','2022-01-07 05:57:12'),(62,2,'Login','2022-01-07 08:41:14'),(63,2,'Logout','2022-01-07 08:42:18'),(64,1,'Login','2022-01-07 08:42:48'),(65,2,'Login','2022-01-07 08:55:57'),(66,1,'Login','2022-01-08 15:37:36'),(67,2,'Login','2022-01-10 15:37:31'),(68,2,'Login','2022-01-11 01:10:02'),(69,2,'Login','2022-01-11 02:30:09'),(70,2,'Login','2022-01-12 05:42:47'),(71,1,'Login','2022-01-14 06:28:13'),(72,1,'Login','2022-01-14 06:34:33'),(73,2,'Login','2022-01-14 06:35:09'),(74,2,'Login','2022-01-14 06:35:58'),(75,2,'Login','2022-01-14 06:37:31'),(76,2,'Logout','2022-01-14 06:38:12'),(77,1,'Login','2022-01-14 06:38:35'),(78,2,'Login','2022-01-14 06:51:44'),(79,2,'Logout','2022-01-14 06:52:50'),(80,1,'Login','2022-01-14 06:53:03'),(81,2,'Login','2022-01-15 09:07:35'),(82,2,'Login','2022-01-15 09:11:21'),(83,2,'Logout','2022-01-15 09:14:31'),(84,1,'Login','2022-01-15 09:15:34'),(85,2,'Login','2022-01-16 06:32:06'),(86,2,'Login','2022-01-16 06:32:23'),(87,2,'Login','2022-01-16 06:35:42'),(88,2,'Login','2022-01-16 06:36:29'),(89,2,'Login','2022-01-17 02:33:10'),(90,2,'Logout','2022-01-17 04:34:58'),(91,2,'Logout','2022-01-17 04:47:06'),(92,2,'Login','2022-01-17 07:57:45'),(93,2,'Logout','2022-01-17 08:05:58'),(94,2,'Login','2022-01-17 14:02:31'),(95,2,'Login','2022-01-17 19:12:49'),(96,2,'Login','2022-01-17 23:24:29'),(97,2,'Logout','2022-01-18 05:13:54'),(98,2,'Logout','2022-01-18 05:16:06'),(99,2,'Logout','2022-01-18 05:16:27'),(100,2,'Logout','2022-01-18 05:17:37'),(101,2,'Login','2022-01-19 02:31:53');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maincategory`
--

DROP TABLE IF EXISTS `maincategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maincategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `brand_count` int(11) NOT NULL,
  `manufacturer_count` int(11) NOT NULL,
  `secondary_count` int(11) NOT NULL,
  `item_under` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maincategory`
--

LOCK TABLES `maincategory` WRITE;
/*!40000 ALTER TABLE `maincategory` DISABLE KEYS */;
INSERT INTO `maincategory` VALUES (33,'Canned Goods',0,0,0,15,740),(34,'Instant Noodles',0,0,0,0,0),(35,'Fresh Vegetables',0,0,0,4,40000),(36,'Meat/Poultry',0,0,0,0,0),(37,'Fruits',0,0,0,0,0),(38,'Condiments',0,0,0,0,0),(39,'Personal Care',0,0,0,0,0),(40,'Snacks',0,0,0,0,0),(41,'Cleaning/Laundry Supplies',0,0,0,0,0),(43,'Beverages',0,0,0,0,0);
/*!40000 ALTER TABLE `maincategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price_rule`
--

DROP TABLE IF EXISTS `price_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_no` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `old_price` double NOT NULL,
  `new_price` double NOT NULL,
  `rule_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price_rule`
--

LOCK TABLES `price_rule` WRITE;
/*!40000 ALTER TABLE `price_rule` DISABLE KEYS */;
INSERT INTO `price_rule` VALUES (1,'B-102','San Marino Corned Tuna  150 grams',33,31,'Discount (Near to Expire)'),(2,'B-101','San Marino Corned Tuna 140g',26,25,'Price Markup');
/*!40000 ALTER TABLE `price_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchaseorder`
--

DROP TABLE IF EXISTS `purchaseorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchaseorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchaseOrderNo` varchar(50) NOT NULL,
  `dateCreated` date NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `deliveryDate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_terms` varchar(50) NOT NULL,
  `requested_by` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` double NOT NULL,
  `tax` double NOT NULL,
  `customer_note` longtext NOT NULL,
  `total_amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchaseorder`
--

LOCK TABLES `purchaseorder` WRITE;
/*!40000 ALTER TABLE `purchaseorder` DISABLE KEYS */;
INSERT INTO `purchaseorder` VALUES (45,'P101','0000-00-00','Joycel  Empanto','2022-01-14','Request Accepted','Not Paid','Cash','Alexandra Veluz','Star Corned Beef Chunky Cheese 150g',40,0,0,'',1000),(46,'P102','2021-12-30','Alexandra Veluz','2021-12-27','Waiting for Approval','Not Paid','Cash','Alexandra Veluz','Star Corned Beef Chunky Cheese 150g',50,10,0,'',1200),(51,'P103','2022-01-07','Alexandra Veluz','2022-01-14','Waiting for Approval','Not Paid','Cash','Alexandra Veluz','Cdo Meat Loaf  150g',50,10,0,'',0),(52,'P104','2022-01-07','Joycel  Empanto','2022-01-26','Completed','Not Paid','Cash','','Cdo Meat Loaf  150g',20,800,0,'',0),(53,'P105','2022-01-07','Joycel  Empanto','2022-01-19','Draft','Not Paid','Cash','','Cdo Meat Loaf  150g',30,0,0,'',300),(54,'P105','2022-01-07','Joycel  Empanto','2022-01-19','Draft','Not Paid','Cash','','Bawang 1g',1000,0,0,'',2000);
/*!40000 ALTER TABLE `purchaseorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `return_orders`
--

DROP TABLE IF EXISTS `return_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `return_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PDI_NO` varchar(50) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `batch_no` varchar(50) NOT NULL,
  `costPerUnit` double NOT NULL,
  `qty` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `expected_response` date NOT NULL,
  `reason` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `return_orders`
--

LOCK TABLES `return_orders` WRITE;
/*!40000 ALTER TABLE `return_orders` DISABLE KEYS */;
INSERT INTO `return_orders` VALUES (40,'PDI-1014',' Alexandra Veluz','San Marino Corned Tuna  150 grams','B-101',30,1,30,'Request Accepted','2021-12-08','2021-12-22','expireds'),(47,'PDI-101',' Alexandra Veluz','San Marino Corned Tuna  150 grams','B-101',1,1,30,'Waiting for Approval','2021-12-01','2021-12-22','expired');
/*!40000 ALTER TABLE `return_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_no` varchar(50) NOT NULL,
  `total_items` int(11) NOT NULL,
  `vat_added` double NOT NULL,
  `discount_added` double NOT NULL,
  `sub_total` float NOT NULL,
  `total` double NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_change` double NOT NULL,
  `time` time NOT NULL,
  `payment_date` date NOT NULL,
  `account_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,'2021-12-11-1',1,0,-0,0,34.5,'Cash',50,15.5,'21:13:00','2021-11-03',0),(2,'2021-17-12-2',1,0,-0,0,34.5,'Cash',50,15.5,'01:56:00','2021-12-17',0),(3,'202112163',4,0,-0,0,168,'',200,32,'03:10:00','2021-12-17',0),(4,'202112204',2,0,-7,0,65.34,'Cash',100,34.66,'13:11:00','2021-12-27',0),(5,'202112205',2,0,-0,0,66,'Cash',100,0,'14:34:00','2021-12-29',0),(6,'202112307',1,0,-0,0,31,'Cash',100,69,'00:18:00','2021-12-30',1),(7,'202112311',1,0,-0,0,26,'Cash',50,0,'15:51:00','2021-12-31',2),(8,'202112318',1,0,-0,0,26,'Cash',50,0,'15:54:00','2021-12-31',1),(9,'202112313',1,0,-0,0,26,'Cash',50,0,'15:57:00','2021-12-31',2),(10,'202112314',1,0,-0,0,26,'Cash',50,0,'15:58:00','2021-12-31',2),(11,'202112314',1,0,-0,0,26,'Cash',50,0,'15:59:00','2021-12-31',2),(12,'202112316',1,0,-0,0,26,'Cash',50,24,'16:00:00','2021-12-31',2),(13,'202112317',1,0,-0,0,26,'Cash',100,74,'16:06:00','2021-12-31',2),(14,'202112318',1,0,-0,0,26,'Cash',100,74,'16:07:00','2021-12-31',2),(15,'202112319',1,0,-0,0,26,'Cash',50,24,'16:09:00','2021-12-31',2),(16,'202201011',1,0,-0,0,26,'Cash',100,74,'10:30:00','2022-01-01',2),(17,'202201031',1,0,-0,0,26,'Cash',50,24,'14:05:00','2022-01-05',2),(18,'202201061',1,0,-0,0,26,'Cash',50,0,'08:13:00','2022-01-06',2),(19,'202201071',3,0,-7,0,65.34,'Cash',100,34.66,'04:06:00','2022-01-07',2),(20,'202201072',1,0,-0,0,22,'Cash',50,0,'04:11:00','2022-01-07',2),(21,'202201073',1,0,-0,0,190,'Cash',200,10,'12:12:00','2022-01-07',2),(22,'202201074',100,0,-0,0,19,'Cash',50,31,'12:13:00','2022-01-07',2),(23,'202201075',10,0,-0,0,1.9,'Cash',10,8.1,'12:17:00','2022-01-07',2),(24,'202201076',3,0,-0,0,66,'Cash',100,34,'16:41:00','2022-01-07',2),(25,'2022011125',101,0,-0,0,41,'Cash',100,59,'10:31:00','2022-01-11',1),(26,'2022011828',1,0,-0,0,25,'Cash',100,75,'13:53:00','2022-01-18',1),(32,'2022011833',4,0,-0,0,25,'Cash',100,75,'08:52:00','2022-01-18',2),(33,'2022011828',0,0,-0,0,0,'',0,0,'05:01:20','2022-01-18',2),(34,'2022011829',2,0,-5,50,45,'Cash',50,5,'05:02:41','2022-01-18',2),(35,'2022011830',0,0,-0,0,0,'',0,0,'05:11:32','2022-01-18',2),(36,'2022011831',1,2,-2.5,25,24.75,'Cash',30,5.25,'05:12:13','2022-01-18',2),(37,'2022011832',1,2,-2.5,25,24.75,'Cash',100,75.25,'05:13:07','2022-01-18',2),(38,'2022011833',1,3,-2.75,25,24.75,'Cash',100,75.25,'05:14:32','2022-01-18',2),(39,'2022011834',1,2,-2.475,25,22.27,'Cash',100,77.73,'05:16:23','2022-01-18',2),(40,'2022011835',1,0,-0.5,25,24.99,'Cash',50,0,'05:18:24','2022-01-18',2),(41,'2022011836',0,0,-0,0,0,'',0,0,'05:31:10','2022-01-18',2),(42,'2022011837',1,0,-0,25,25,'Cash',100,75,'05:34:40','2022-01-18',2),(43,'2022011838',1,0,-0,25,25,'Cash',50,0,'05:37:49','2022-01-18',2);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_return`
--

DROP TABLE IF EXISTS `sales_return`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_returned` date NOT NULL,
  `date_ordered` date NOT NULL,
  `receipt_no` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `qty_returned` int(11) NOT NULL,
  `batch_no` varchar(50) NOT NULL,
  `costPerUnit` double NOT NULL,
  `price` double NOT NULL,
  `return_total_amount` double NOT NULL,
  `reason` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_return`
--

LOCK TABLES `sales_return` WRITE;
/*!40000 ALTER TABLE `sales_return` DISABLE KEYS */;
INSERT INTO `sales_return` VALUES (5,'2021-12-26','2021-12-23','202112236','San Marino Corned Tuna  150 grams',1,'B-101',30,31,31,''),(6,'2021-12-26','2021-11-23','202112236','San Marino Corned Tuna  150 grams',1,'B-101',30,31,31,'sd');
/*!40000 ALTER TABLE `sales_return` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shelves`
--

DROP TABLE IF EXISTS `shelves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shelves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shelves_name` varchar(50) NOT NULL,
  `storage_no` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `length` double NOT NULL,
  `width` double NOT NULL,
  `height` double NOT NULL,
  `storage_capacity` double NOT NULL,
  `space_utilized` double NOT NULL,
  `utilization` double NOT NULL,
  `batches` int(11) NOT NULL,
  `total_items` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shelves`
--

LOCK TABLES `shelves` WRITE;
/*!40000 ALTER TABLE `shelves` DISABLE KEYS */;
INSERT INTO `shelves` VALUES (20,'1-A',1,'Level 1 (Upper Beam)',120,40,43.84,220800,2512.6831466666636,2,0,57),(21,'1-B',1,'Level 2',120,40,46,220800,0,0,0,0),(22,'1-C',1,'Level 3',120,40,46,220800,3693.644225599999,2,0,34),(23,'1-D',1,'Level 4',120,40,46,220800,0,0,0,0),(24,'1-E',1,'Level 5 (Lower Beam)',120,40,60,220800,0,0,0,0),(43,'2-A',2,'Level 1',120,40,46,220800,0,0,0,0),(44,'2-B',2,'Level 2',120,40,46,220800,0,0,0,0);
/*!40000 ALTER TABLE `shelves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storage`
--

DROP TABLE IF EXISTS `storage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storage_no` int(11) NOT NULL,
  `length` double NOT NULL,
  `height` double NOT NULL,
  `width` double NOT NULL,
  `no_shelves` int(11) NOT NULL,
  `no_occupied_shelves` int(11) NOT NULL,
  `total_items` int(11) NOT NULL,
  `total_variety` int(11) NOT NULL,
  `capacity` double NOT NULL,
  `utilization` double NOT NULL,
  `name` varchar(50) NOT NULL,
  `space_utilized` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage`
--

LOCK TABLES `storage` WRITE;
/*!40000 ALTER TABLE `storage` DISABLE KEYS */;
INSERT INTO `storage` VALUES (47,1,125,200,40,5,0,131,0,1000000,0,'Storage 1',46242210.97459966),(48,101,264,100,136,0,0,-10,0,0,0,'Meat/Poultry Section',0),(49,102,180,82,60,0,0,17475,0,0,0,'Vegetable Section',0),(50,103,128,48,96,0,0,67,0,0,0,'Fruit Section',0),(51,104,53,152,52,0,0,0,0,418912,0,'Refrigerator',0),(52,105,74,79,63.5,0,0,0,0,371221,0,'Chest Freezer',0),(58,2,125,200,40,3,0,0,0,0,0,'Storage 2',0);
/*!40000 ALTER TABLE `storage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'PureFoods','Alexandra','Veluz','1032 Bayan Luma 8 Imus City, Cavite','xanderpascual2018@gmail.com','09231088799'),(17,'Mega','Joycel ','Empanto','1032 Bayan Luma 8','joycel@gmail.com','09231088799');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_order` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `batch_no` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `total_amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `account_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (4,'20211211','','B-101','Mega Fried Sardines Hot and Spicy 155 grams',2,34.5,69,'2021-12-12','Canned Goods',0),(5,'20211712','','B-101','Mega Fried Sardines Hot and Spicy 155 grams',10,34.5,345,'2021-12-17','Canned Goods',0),(15,'202112163','4806504710829','B-102','Mega Fried Sardines Hot and Spicy 155 grams',2,42,84,'2021-12-16','Canned Goods',0),(16,'202112163','4806504710829','B-102','Mega Fried Sardines Hot and Spicy 155 grams',4,42,168,'2021-12-16','Canned Goods',0),(17,'202112174','4806504710829','B-101','Mega Fried Sardines Hot and Spicy 155 grams',1,42,42,'2021-12-17','Canned Goods',0),(18,'202112204','4800249006636','B-102','San Marino Corned Tuna  150 grams',2,33,66,'2021-12-20','Canned Goods',0),(19,'202112205','4800249006636','B-102','San Marino Corned Tuna  150 grams',2,33,66,'2021-12-20','Canned Goods',0),(20,'','719526499771','B-102','San Marino Corned Tuna  150 grams',1,31,0,'2021-12-22','Canned Goods',2),(21,'','719526499771','B-102','San Marino Corned Tuna  150 grams',2,31,62,'2021-12-22','Canned Goods',2),(22,'202112236','719526499771','B-101','San Marino Corned Tuna  150 grams',1,31,31,'2021-12-23','Canned Goods',1),(32,'202112287','777833535925','B-101','San Marino Corned Tuna  150 grams',1,32,32,'2021-12-28','Canned Goods',1),(33,'202112287','777833535925','B-101','San Marino Corned Tuna  150 grams',20,32,32,'2021-12-28','Canned Goods',1),(34,'202112287','777833535925','B-101','San Marino Corned Tuna  150 grams',50,32,32,'2021-12-28','Canned Goods',1),(38,'202112287','777833535925','B-101','San Marino Corned Tuna  150 grams',1,32,32,'2021-12-28','Canned Goods',1),(39,'202112287','777833535925','B-101','San Marino Corned Tuna  150 grams',1,32,32,'2021-12-28','Canned Goods',1),(47,'202112287','777833535925','B-101','San Marino Corned Tuna  150 grams',1,32,32,'2021-12-28','Canned Goods',1),(52,'202112307','4800249006612','B-101','San Marino Corned Tuna  150g',100,26,26,'2021-12-30','Canned Goods',1),(53,'202112307','4800249006612','B-101','San Marino Corned Tuna  150g',100,26,26,'2021-12-30','Canned Goods',1),(54,'','4800249006612','B-101','San Marino Corned Tuna  150g',1,26,26,'2021-12-30','Canned Goods',2),(55,'202112301','748485100418','B-101','San Marino Corned Tuna  150g',1,26,26,'2021-12-30','Canned Goods',2),(56,'202112311','748485100418','B-101','San Marino Corned Tuna  150g',1,26,26,'2021-12-31','Canned Goods',2),(57,'202112311','748485100418','B-101','San Marino Corned Tuna  150g',1,26,26,'2021-12-31','Canned Goods',2),(58,'202112318','748485100418','B-101','San Marino Corned Tuna  150g',1,26,26,'2021-12-31','Canned Goods',1),(59,'202112313','748485100418','B-101','San Marino Corned Tuna  150g',1,26,26,'2021-12-31','Canned Goods',2),(60,'202112314','748485100418','B-101','San Marino Corned Tuna  150g',1,26,26,'2021-12-31','Canned Goods',2),(61,'202112316','748485100418','B-101','San Marino Corned Tuna  150g',1,26,26,'2021-12-31','Canned Goods',2),(62,'202112317','748485100418','B-101','San Marino Corned Tuna  150g',1,26,26,'2021-12-31','Canned Goods',2),(63,'202112318','748485100418','B-101','San Marino Corned Tuna  150g',1,26,26,'2021-12-31','Canned Goods',2),(64,'202112319','748485100418','B-101','San Marino Corned Tuna  150g',1,26,26,'2021-12-31','Canned Goods',2),(75,'2021123110','748485100418','B-101','San Marino Corned Tuna  150g',2,26,52,'2021-12-31','Canned Goods',2),(76,'202201011','748485100418','B-101','San Marino Corned Tuna  150g',1,26,26,'2022-01-01','Canned Goods',2),(77,'2022010117','748485100418','B-101','San Marino Corned Tuna  150g',4,26,104,'2022-01-01','Canned Goods',1),(78,'2022010117','748485100418','B-102','San Marino Corned Tuna 140g\n',7,32,224,'2022-01-06','Canned Goods',1),(79,'2022010117','748485100418','B-102','San Marino Corned Tuna 140g',1,32,32,'2022-01-06','Canned Goods',1),(80,'202201031','4800249006612','B-103','Star Corned Beef Chunky Cheese 150g',100,26,26,'2022-01-06','Canned Goods',2),(81,'202201061','4800249006612','B-103','Star Corned Beef Chunky Cheese 150g',1,26,26,'2022-01-06','Canned Goods',2),(82,'202201062','748485100418','B-102','San Marino Corned Tuna 140g',1,32,32,'2022-01-06','Canned Goods',2),(83,'202201071','4800249909333','B-101','Cdo Meat Loaf  150g',3,22,66,'2022-01-07','Canned Goods',2),(84,'202201072','4800249909333','B-101','Cdo Meat Loaf  150g',1,22,22,'2022-01-07','Canned Goods',2),(85,'202201073','67677761929','B-102','Bawang 1g',1000,0.19,190,'2022-01-07','Fresh Vegetables',2),(86,'202201074','67677761929','B-102','Bawang 1g',100,0.19,19,'2022-01-07','Fresh Vegetables',2),(87,'202201075','67677761929','B-102','Bawang 1g',10,0.19,1.9,'2022-01-07','Fresh Vegetables',2),(88,'202201076','4800249909333','B-101','Cdo Meat Loaf  150g',3,22,66,'2022-01-07','Canned Goods',2),(89,'202201077','4800249909333','B-101','Cdo Meat Loaf  150g',5,22,110,'2022-01-07','Canned Goods',2),(90,'2022011125','4800249909333','B-101','Cdo Meat Loaf  150g',1,22,22,'2022-01-11','Canned Goods',1),(91,'2022011125','67677761929','B-102','Bawang 1g',100,0.19,19,'2022-01-11','Fresh Vegetables',1),(92,'2022011226','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-12','Canned Goods',1),(93,'','67677761929','B-102','Bawang 1g',2,0.19,0.38,'2022-01-15','Fresh Vegetables',2),(94,'','67677761929','B-102','Bawang 1g',100,0.19,19,'2022-01-15','Fresh Vegetables',2),(95,'','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(96,'2022011828','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(97,'2022011828','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(98,'2022011828','67677761929','B-102','Bawang 1g',1,0.19,0.19,'2022-01-18','Fresh Vegetables',2),(99,'2022011828','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(100,'2022011828','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(101,'2022011828','67677761929','B-102','Bawang 1g',1,0.19,0.19,'2022-01-18','Fresh Vegetables',2),(102,'2022011829','4800249909333','B-104','Cdo Meat Loaf  150g',2,25,50,'2022-01-18','Canned Goods',2),(103,'2022011831','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(104,'2022011832','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(105,'2022011833','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(106,'2022011834','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(107,'2022011835','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(108,'2022011835','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(109,'2022011836','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(110,'','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(111,'2022011836','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(112,'2022011836','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(113,'2022011836','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(114,'2022011837','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(115,'2022011838','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2),(116,'2022011839','67677761929','B-102','Bawang 1g',1,0.19,0.19,'2022-01-18','Fresh Vegetables',2),(117,'2022011839','4800249909333','B-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2);
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-22  9:17:42
