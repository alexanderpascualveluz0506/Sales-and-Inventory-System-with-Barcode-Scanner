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
INSERT INTO `accounts` VALUES (1,'Nikki','Lubuit','09231088799','xanderpascual2018@gmail.com','nikkiStore','admin_pass123','Admin','1046 Bayan Luma 8 Imus City, Cavite','00:00:00','00:00:00','::1','LAPTOP-T0MO93OA',''),(2,'Candace','Angeles','09231088799','candace.zoe@gmail.com','zoe','cashier_pass123','Staff','','00:00:00','00:00:00','::1','LAPTOP-T0MO93OA','');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attempts`
--

DROP TABLE IF EXISTS `attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attempts` (
  `address` varchar(50) NOT NULL,
  `timerecord` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `access_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attempts`
--

LOCK TABLES `attempts` WRITE;
/*!40000 ALTER TABLE `attempts` DISABLE KEYS */;
INSERT INTO `attempts` VALUES ('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:33:34','667282'),('::1','2022-01-24 02:54:55',''),('::1','2022-01-26 23:06:43','');
/*!40000 ALTER TABLE `attempts` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch`
--

LOCK TABLES `batch` WRITE;
/*!40000 ALTER TABLE `batch` DISABLE KEYS */;
INSERT INTO `batch` VALUES (75,'2022-01-10','stockIn-101',50,'Cdo Meat Loaf  150g','2022-01-09','4800249909333','1','1-A',35,15,35,2,22,35,1000,700,'Canned Goods',22,20,0,'',3),(76,'2022-01-07','stockIn-102',10000,'Bawang 1g','2022-01-15','733802651589','102','',19799,20201,19799,1,1,19799,1580,1547.84,'Fresh Vegetables',0.19,0.16,0,'uploads/barcode/733802651589.png',0),(77,'2022-01-07','stockIn-103',50,'Argentina Beef Loaf  170g','0000-00-00','798229398874','1','1-B',34,16,34,0,0,34,1000,680,'Canned Goods',23,20,40,'uploads/barcode/798229398874.png',0),(78,'2022-01-07','stockIn-104',50,'Cdo Meat Loaf  150g','2023-01-07','4800249909333','1','1-A',18,33,18,0,0,8,1200,432,'Canned Goods',25,24,0,'',0),(89,'2022-01-23','stockIn-105',40,'Star Corned Beef Chunky Cheese 175g','2023-10-30','4808887012026','1','1-B',38,2,38,0,0,38,1240,1178,'Canned Goods',34,31,0,'',0),(90,'2022-01-23','stockIn-106',40,'Mega Fried Sardines Hot and Spicy 155g','0000-00-00','4806504710829','1','1-B',38,0,38,2,64,38,1280,1280,'Canned Goods',35,32,0,'',0),(91,'2022-01-23','stockIn-107',60,'Century Tuna Hot and Spicy 155g','2024-07-30','748485100418','1','1-C',59,1,59,0,0,39,1800,1770,'Canned Goods',33,30,0,'',0),(92,'2022-01-23','stockIn-108',50,'Rose Bowl Sardine in Tomato Sauce 155g','2024-05-05','683922101682','1','1-C',47,3,47,0,0,47,900,846,'Canned Goods',19,18,0,'',0),(93,'2022-01-23','stockIn-109',100,'Pantene Shampoo Damaged Care 12ml','0000-00-00','4902430698146','3','3-B',92,8,92,0,0,92,600,552,'Personal Care',8,6,0,'',0),(94,'2022-01-23','stockIn-110',100,'Sunsilk Co-Creation 15ml','0000-00-00','4800888169716','3','3-B',81,19,81,0,0,81,500,405,'Personal Care',6,5,0,'',0),(95,'2022-01-23','stockIn-111',30,'Pepsodent Twin Pack 190g','2024-02-01','8999999028039','3','3-A',28,2,28,0,0,28,3090,2884,'Personal Care',110,103,0,'',0),(96,'2022-01-23','stockIn-112',30,'Safeguard Lemon Freshx3 175gg','2024-12-04','4902430858540','3','3-A',29,1,29,0,0,29,5100,4930,'Personal Care',180,170,0,'',0),(97,'2022-01-23','stockIn-113',20000,'Porchop 1g','2022-01-30','81988526775','101','',18950,1000,18950,50,8,18950,3200,3040,'Pork/Meat/Poultry',0.18,0.16,0,'',0),(98,'2022-01-23','stockIn-114',22000,'Adobo Cuts 1g','2022-01-30','84284524987','101','',20900,1000,20900,100,16,20900,3520,3360,'Pork/Meat/Poultry',0.18,0.16,0,'',0),(99,'2022-01-23','stockIn-115',10000,'Sibuyas 1g','2022-02-05','7108125771301','102','',9930,0,9930,70,8.75,9930,1250,1250,'Fresh Vegetables',0.12,0.13,0,'uploads/barcode/7108125771301.png',0),(100,'2022-01-23','stockIn-116',40,'Mang Tomas Siga 325g','2024-01-10','4801668100288','1','1-D',40,0,40,0,0,20,1360,1360,'Condiments',36,34,0,'',0),(101,'2022-01-23','stockIn-117',50,'Del Monte Sweet Blend Ketchup 320g','2023-04-02','4800024577139','1','1-D',47,3,47,0,0,47,1300,1222,'Condiments',28,26,0,'',0),(102,'2022-01-23','stockIn-118',60,'Silver Swan Patis 750ml','2023-05-25','4800344009716','1','1-D',56,4,56,0,0,16,3540,3304,'Condiments',62,59,10,'',0),(103,'2022-01-23','stockIn-119',60,'Lorins Patis 1000ml','2023-04-23','50830710712','1','1-D',58,2,58,0,0,28,4650,4495,'Condiments',79,77.5,0,'',0),(104,'2022-01-23','stockIn-120',40,'Lucky Me Pancit Canton Sweet&Spicy (6 packs) 480g','2024-09-07','4807770273766','2','2-A',38,2,38,0,0,28,3320,3154,'Instant Noodles',86,83,5,'',0),(105,'2022-01-23','stockIn-121',100,'Lucky Me Pancit Canto Kalamansi Kasalo 120g','2022-06-18','4807770274275','2','2-A',95,5,95,0,0,45,1500,1425,'Instant Noodles',17,15,0,'',0),(106,'2022-01-23','stockIn-122',100,'Downy Antibac Safeguard 36ml','0000-00-00','4902430346184','5','5-B',93,7,93,0,0,43,1000,930,'Cleaning/Laundry Supplies',12,10,0,'',0),(107,'2022-01-23','stockIn-123',60,'UFC Banana Ketchup 1kg','2022-05-07','014285003045','1','1-D',57,3,57,0,0,27,3600,3420,'Condiments',62,60,0,'',0),(108,'2022-01-24','stockIn-124',9,'Knorr Liquid seasoning org 130ml','2024-07-05','4808680230764','2','2-A',9,0,9,0,0,9,360,360,'Condiments',42,40,0,'',0);
/*!40000 ALTER TABLE `batch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (7,'Argentina','Century Pacific Food Inc'),(8,'CDO','CDO Foodsphere Inc'),(9,'Rose Bowl','Ocean Crown Product Inc'),(10,'Safeguard','P&G'),(11,'Downey','P&G'),(12,'Pantene','P&G'),(13,'Lucky Me','Monde Nissin Corporation'),(14,'Skyflakes','Monde Nissin Corporation'),(15,'Voice','Monde Nissin Corporation'),(16,'Bingo','Monde Nissin Corporation'),(17,'Monde','Monde Nissin Corporation'),(18,'Star','San Miguel Corporation (SMC)'),(19,'Century Tuna','Century Pacific Food Inc'),(20,'Domex','Unilever'),(21,'Sunsilk','Unilever'),(22,'Knorr','Unilever'),(23,'Vaseline','Unilever'),(24,'Domex','Unilever'),(25,'Rexona','Unilever'),(32,'UFC','Nutri-Asia'),(33,'Mang Tomas','Nutri-Asia'),(34,'Lorins','Nutri-Asia'),(36,'Purefoods','San Miguel Corporation (SMC)'),(37,'Bawang','Ren Frando Estonanto Online Palengke'),(38,'Sibuyas','Ren Frando Estonanto Online Palengke'),(39,'Kamatis','Ren Frando Estonanto Online Palengke'),(40,'Mega','Ayala Seafood Corp'),(41,'Pepsodent','Unilever'),(42,'Pork','JDC Meats'),(43,'Beef','JDC Meats'),(44,'Chicken','JDC Meats'),(45,'Egg','JDC Meats'),(46,'Pork','JDC Meats'),(47,'Beef','JDC Meats'),(48,'Chicken','JDC Meats'),(49,'Egg','JDC Meats'),(50,'Pork','Jaro Development Corporation'),(51,'Beef','Jaro Development Corporation'),(52,'Chicken','Jaro Development Corporation'),(53,'Egg','Jaro Development Corporation'),(54,'Del Monte Ketchup','Del Monte Philippines Inc'),(55,'Silver Swan','Nutri-Asia'),(56,'Lorins','Lorenza Food Corporation'),(57,'Lorins','Lorenza Food Corporation');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deleted_item`
--

LOCK TABLES `deleted_item` WRITE;
/*!40000 ALTER TABLE `deleted_item` DISABLE KEYS */;
INSERT INTO `deleted_item` VALUES (1,'','','',0,0,0,'16:55:00','2021-12-31'),(2,'','','',0,0,0,'16:56:00','2021-12-31'),(3,'','','',0,0,0,'16:58:00','2021-12-31'),(4,'','','',0,0,0,'16:59:00','2021-12-31'),(5,'','','',0,0,0,'17:00:00','2021-12-31'),(6,'','','',0,0,0,'17:01:00','2021-12-31'),(7,'','','',0,0,0,'17:06:00','2021-12-31'),(8,'','','',0,0,0,'17:07:00','2021-12-31'),(9,'stockIn-101','748485100418','San Marino Corned Tuna  150g',1,26,26,'17:08:00','2022-01-18'),(10,'stockIn-103','779703935255','Argentina Beef Loaf  170g',1,23,0,'13:10:00','2022-01-18'),(11,'stockIn-103','779703935255','Argentina Beef Loaf  170g',1,23,0,'13:23:00','2022-01-18'),(14,'stockIn-123','014285003045','UFC Banana Ketchup 1kg',2,62,124,'04:28:00','2022-01-24'),(15,'stockIn-123','014285003045','UFC Banana Ketchup 1kg',1,62,62,'04:30:00','2022-01-24'),(16,'stockIn-110','4800888169716','Sunsilk Co-Creation 15ml',1,6,6,'04:39:00','2022-01-24'),(17,'stockIn-122','4902430346184','Downy Antibac Safeguard 36ml',1,12,12,'04:40:00','2022-01-24'),(29,'stockIn-104','4800249909333','Cdo Meat Loaf  150g',1,25,25,'05:01:00','2022-01-24'),(30,'stockIn-102','733802651589','Bawang 1g',1,0.19,0.19,'05:17:00','2022-01-24'),(32,'stockIn-102','733802651589','Bawang 1g',1,0.19,0.19,'05:18:00','2022-01-24'),(33,'stockIn-104','4800249909333','Cdo Meat Loaf  150g',1,25,25,'05:19:00','2022-01-24'),(34,'stockIn-104','4800249909333','Cdo Meat Loaf  150g',1,25,25,'06:10:00','2022-01-24'),(35,'stockIn-114','84284524987','Adobo Cuts 1g',100,0.18,18,'09:04:00','2022-01-24'),(36,'stockIn-102','733802651589','Bawang 1g',1,0.19,0.19,'09:47:00','2022-01-26');
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filesofsupplier`
--

LOCK TABLES `filesofsupplier` WRITE;
/*!40000 ALTER TABLE `filesofsupplier` DISABLE KEYS */;
INSERT INTO `filesofsupplier` VALUES (1,'uploads/supplier_files/244651410_393034588963039_8222204067322915767_n.jpg',0),(2,'uploads/supplier_files/ddd.jpg',20),(3,'uploads/supplier_files/COLOR.docx',28),(7,'uploads/supplier_files/STAT 2 - Chapter 1.pdf',1),(8,'uploads/supplier_files/docu.docx',1),(9,'uploads/supplier_files/docu.docx',0),(14,'uploads/supplier_files/docu.docx',35),(15,'uploads/supplier_files/docu.docx',35),(16,'uploads/supplier_files/docu.docx',35),(17,'uploads/supplier_files/docu.docx',35),(18,'uploads/supplier_files/docu.docx',35),(19,'uploads/supplier_files/docu.docx',0),(20,'uploads/supplier_files/chap 1.docx',0),(21,'uploads/supplier_files/Lec_Assign#02_VeluzAlexandra.docx',0),(22,'uploads/supplier_files/What is Ethics.docx',31),(23,'uploads/supplier_files/LAB_ACT1_VeluzAlexandra.docx',0),(24,'uploads/supplier_files/ACT1_Veluz_Alexandra.docx',40),(25,'uploads/supplier_files/docu.docx',34),(28,'uploads/supplier_files/CHAPTER1_FINAL.docx',39),(29,'uploads/supplier_files/docu.docx',39),(30,'uploads/supplier_files/246717265_362119688933342_3421425581016540727_n.jpg',41);
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
  `status` varchar(50) DEFAULT 'none',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES ('Cdo Meat Loaf  150g','4800249909333',82,'',3,53,101,4200,1,22,'2024-06-07','','1',53,0,3,'2022-01-23',50,'Canned Goods',20,'2022-01-06',48,'',42,0,'Reorder Level'),('Bawang 1g','67677761929',83,'',1,19899,20000,1580,1,0.19,'2022-01-14','YES','102',2000,0,1799,'2022-01-11',10000,'Fresh Vegetables',0.16,'2022-01-07',201,'',19899,0,''),('Argentina Beef Loaf  170g','748485800097',84,'',1,34,50,1000,0,0,'2023-01-07','','1',20,0,-16,'2022-01-23',60,'Canned Goods',20,'2022-01-07',16,'',34,34,'Replenish'),('Star Corned Beef Chunky Cheese 175g','4808887012026',94,'',1,38,40,1240,0,0,'2023-10-30','','1',40,0,-2,'2022-01-23',40,'Canned Goods',31,'2022-01-23',2,'',38,15,''),('Mega Fried Sardines Hot and Spicy 155g','4806504710829',95,'',1,38,40,1280,2,64,'2023-08-06','','1',30,0,0,'2022-01-23',50,'Canned Goods',32,'2022-01-23',0,'',38,15,''),('Century Tuna Hot and Spicy 155g','748485100418',96,'',1,59,60,1800,0,0,'2024-07-30','','1',30,0,-1,'2022-01-23',60,'Canned Goods',30,'2022-01-23',1,'',39,15,''),('Rose Bowl Sardine in Tomato Sauce 155g','683922101682',97,'',1,47,50,900,0,0,'2024-05-05','','1',20,0,-3,'2022-01-23',60,'Canned Goods',18,'2022-01-23',3,'',47,15,''),('Pantene Shampoo Damaged Care 12ml','4902430698146',98,'',1,92,100,600,0,0,'0000-00-00','','3',37,0,-8,'2022-01-23',200,'Personal Care',6,'2022-01-23',8,'',92,30,''),('Sunsilk Co-Creation 15ml','4800888169716',99,'',1,81,100,500,0,0,'0000-00-00','','3',50,0,-19,'2022-01-23',200,'Personal Care',5,'2022-01-23',19,'',81,30,''),('Pepsodent Twin Pack 190g','8999999028039',100,'',1,28,30,3090,0,0,'2024-02-01','','3',15,0,-2,'2022-01-23',25,'Personal Care',103,'2022-01-23',2,'',28,10,''),('Safeguard Lemon Freshx3 175gg','4902430858540',101,'',1,29,30,5100,0,0,'2024-12-04','','3',9,0,-1,'2022-01-23',40,'Personal Care',170,'2022-01-23',1,'',29,10,''),('Porchop 1g','81988526775',102,'',1,18950,20000,3200,50,8,'2022-01-30','YES','101',5000,0,-1000,'2022-01-23',21000,'Pork/Meat/Poultry',0.16,'2022-01-23',1000,'',18950,0,''),('Adobo Cuts 1g','84284524987',103,'',1,20900,22000,3520,100,16,'2022-01-30','YES','101',4000,0,-1000,'2022-01-23',21000,'Pork/Meat/Poultry',0.16,'2022-01-23',1000,'',20900,0,''),('Sibuyas 1g','90945495490',104,'',1,9930,10000,1250,70,8.75,'2022-02-05','YES','102',2000,0,0,'2022-01-23',8000,'Fresh Vegetables',0.13,'2022-01-23',0,'',9930,0,''),('Mang Tomas Siga 325g','4801668100288',105,'',1,40,40,1360,0,0,'2024-01-10','','1',20,0,0,'2022-01-23',30,'Condiments',34,'2022-01-23',0,'',20,10,''),('Del Monte Sweet Blend Ketchup 320g','4800024577139',106,'',1,47,50,1300,0,0,'2023-04-02','','1',30,0,-3,'2022-01-23',60,'Condiments',26,'2022-01-23',3,'',47,15,''),('Silver Swan Patis 750ml','4800344009716',107,'',1,56,60,3540,0,0,'2023-05-25','','1',30,0,-4,'2022-01-23',60,'Condiments',59,'2022-01-23',4,'',16,10,''),('Lorins Patis 1000ml','50830710712',108,'',1,58,60,4650,0,0,'2023-04-23','','1',40,0,-2,'2022-01-23',60,'Condiments',77.5,'2022-01-23',2,'',28,0,''),('Lucky Me Pancit Canton Sweet&Spicy (6 packs) 480g','4807770273766',109,'',1,38,40,3320,0,0,'2024-09-07','','2',25,0,-2,'2022-01-23',50,'Instant Noodles',83,'2022-01-23',2,'',28,5,''),('Lucky Me Pancit Canto Kalamansi Kasalo 120g','4807770274275',110,'',1,95,100,1500,0,0,'2022-06-18','','2',50,0,-5,'2022-01-23',100,'Instant Noodles',15,'2022-01-23',5,'',45,20,''),('Downy Antibac Safeguard 36ml','4902430346184',111,'',1,93,100,1000,0,0,'0000-00-00','','5',40,0,-7,'2022-01-23',70,'Cleaning/Laundry Supplies',10,'2022-01-23',7,'',43,20,''),('UFC Banana Ketchup 1kg','014285003045',112,'',1,57,60,3600,0,0,'2022-05-07','','1',30,0,-3,'2022-01-23',70,'Condiments',60,'2022-01-23',3,'',27,10,''),('Knorr Liquid seasoning org 130ml','4808680230764',113,'',1,9,9,360,0,0,'2024-07-05','','2',0,0,0,'2022-01-24',0,'Condiments',40,'2022-01-24',0,'',9,0,'Lower Stock');
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
  `manufacturer` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (109,'Cdo Meat Loaf  150g','150g','4800249909333','Canned Goods','Morante Albert','','','',22,20,'2022-01-06','','','','','CDO Foodsphere Inc','CDO'),(110,'Bawang 1g','1g','67677761929','Fresh Vegetables','Carren Estonanto','','YES','YES',0.19,0.16,'2022-01-07','','','','','Ren Frando Estonanto Online Palengke','Bawang'),(111,'Argentina Beef Loaf  170g','170g','748485800097','Canned Goods','Joycel  Empanto','','','',23,20,'2022-01-07','','','','','Century Pacific Food Inc','Argentina'),(112,'Kamatis 170g','170g','67677761929','Canned Goods','Carren Estonanto','','','',32,30,'2022-01-11','','','','','Ren Frando Estonanto Online Palengke','Kamatis'),(120,'Star Corned Beef Chunky Cheese 175g','175g','4808887012026','Canned Goods','Joycel  Empanto','','','',34,31,'2022-01-23','','','','','San Miguel Corporation (SMC)','Star'),(121,'Mega Fried Sardines Hot and Spicy 155g','155g','4806504710829','Canned Goods','Joycel  Empanto','','','',35,32,'2022-01-23','','','','','Ayala Seafood Corp','Mega'),(122,'Century Tuna Hot and Spicy 155g','155g','748485100418','Canned Goods','Joycel  Empanto','','','',33,30,'2022-01-23','','','','','Century Pacific Food Inc','Century Tuna'),(123,'Rose Bowl Sardine in Tomato Sauce 155g','155g','683922101682','Canned Goods','Joycel  Empanto','','','',19,18,'2022-01-23','','','','','Ocean Crown Product Inc','Rose Bowl'),(124,'Pantene Shampoo Damaged Care 12ml','12ml','4902430698146','Personal Care','Joycel  Empanto','','','',8,6,'2022-01-23','','','','','P&G','Pantene'),(125,'Sunsilk Co-Creation 15ml','15ml','4800888169716','Personal Care','Joycel  Empanto','','','',6,5,'2022-01-23','','','','','Unilever','Sunsilk'),(126,'Pepsodent Twin Pack 190g','190g','8999999028039','Personal Care','Joycel  Empanto','','','',110,103,'2022-01-23','','','','','Unilever','Pepsodent'),(127,'Safeguard Lemon Freshx3 175gg','175gg','4902430858540','Personal Care','Joycel  Empanto','','','',180,170,'2024-01-23','','','','','P&G','Safeguard'),(128,'Porchop 1g','1g','81988526775','Pork/Meat/Poultry','Joan Herrera','','YES','YES',0.18,0.16,'2022-01-23','uploads/barcode81988526775.png','','','','Jaro Development Corporation','Pork'),(129,'Adobo Cuts 1g','1g','84284524987','Pork/Meat/Poultry','Joan Herrera','','YES','YES',0.18,0.16,'2022-01-23','uploads/barcode84284524987.png','','','','Jaro Development Corporation','Pork'),(130,'Sibuyas 1g','1g','90945495490','Fresh Vegetables','Carren Estonanto','','YES','YES',0.14,0.13,'2022-01-23','uploads/barcode90945495490.png','','','','Ren Frando Estonanto Online Palengke','Sibuyas'),(131,'Mang Tomas Siga 325g','325g','4801668100288','Condiments','Joycel  Empanto','','','',36,34,'2022-01-23','','','','','Nutri-Asia','Mang Tomas'),(132,'Del Monte Sweet Blend Ketchup 320g','320g','4800024577139','Condiments','Christian Delacruz','','','',28,26,'2022-01-23','','','','','Del Monte Philippines Inc','Del Monte Ketchup'),(133,'Silver Swan Patis 750ml','750ml','4800344009716','Condiments','Christian Delacruz','','','',62,59,'2022-01-23','','','','','Nutri-Asia','Silver Swan'),(134,'Lorins Patis 1000ml','1000ml','50830710712','Condiments','Christian Delacruz','','','',79,77.5,'2022-01-23','uploads/barcode50830710712.png','','','','Lorenza Food Corporation','Lorins'),(135,'Lucky Me Pancit Canton Sweet&Spicy (6 packs) 480g','480g','4807770273766','Instant Noodles','Christian Delacruz','','','',86,83,'2022-01-23','','','','','Monde Nissin Corporation','Lucky Me'),(136,'Lucky Me Pancit Canto Kalamansi Kasalo 120g','120g','4807770274275','Instant Noodles','Morante Albert','','','',17,15,'2022-01-23','','','','','Monde Nissin Corporation','Lucky Me'),(137,'Downy Antibac Safeguard 36ml','36ml','4902430346184','Cleaning/Laundry Supplies','Joycel  Empanto','','','',12,10,'2022-01-23','','','','','P&G','Downey'),(138,'UFC Banana Ketchup 1kg','1kg','014285003045','Condiments','Christian Delacruz','','','',62,60,'2022-01-23','','','','','Nutri-Asia','UFC'),(139,'Knorr Liquid seasoning org 130ml','130ml','4808680230764','Condiments','Morante Albert','','','',42,40,'2022-01-24','','','','','Unilever','Knorr');
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
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,1,'Login','0000-00-00 00:00:00'),(2,1,'Login','2021-10-19 06:52:13'),(3,2,'Login','2021-10-19 07:00:02'),(4,1,'Login','2021-10-19 19:23:22'),(5,2,'Login','2021-10-19 20:34:36'),(6,1,'Login','2021-10-19 20:52:02'),(7,1,'Login','2021-10-19 20:52:38'),(8,1,'Login','2021-10-19 20:58:40'),(9,1,'Login','2021-10-19 21:00:18'),(10,1,'Login','2021-10-19 21:01:26'),(11,1,'Login','2021-10-19 21:05:19'),(12,1,'Login','2021-10-19 21:11:33'),(13,1,'Login','2021-10-19 21:12:20'),(14,1,'Login','2021-10-19 21:12:27'),(15,1,'Login','2021-10-19 21:20:01'),(16,1,'Login','2021-10-19 21:20:26'),(17,1,'Login','2021-10-19 21:28:27'),(18,1,'Login','2021-10-20 01:45:22'),(19,1,'Login','2021-10-20 01:48:23'),(20,1,'Login','2021-10-20 01:58:22'),(21,1,'Login','2021-10-20 15:24:39'),(22,1,'Login','2021-12-22 10:05:52'),(23,1,'Login','2021-12-22 10:06:39'),(24,2,'Login','2021-12-22 10:07:06'),(25,2,'Login','2021-12-29 16:00:00'),(26,2,'Login','2021-12-29 16:00:00'),(27,2,'Login','2021-12-30 16:00:00'),(28,2,'Login','2021-12-30 16:00:00'),(29,2,'Login','2021-12-31 16:00:00'),(30,2,'Login','2021-12-31 16:00:00'),(31,1,'Login','2021-12-31 16:00:00'),(32,1,'Login','2021-12-31 16:00:00'),(33,1,'Login','2021-12-31 16:00:00'),(34,2,'Login','2022-01-02 05:51:07'),(35,2,'Logout','0000-00-00 00:00:00'),(36,2,'Login','2022-01-02 05:59:25'),(37,2,'Logout','2022-01-02 05:59:27'),(38,1,'Login','2022-01-02 06:09:12'),(39,2,'Login','2022-01-03 05:42:41'),(40,2,'Logout','2022-01-03 05:43:26'),(41,1,'Login','2022-01-03 05:45:01'),(42,2,'Login','2022-01-03 06:00:02'),(43,2,'Logout','2022-01-03 06:09:12'),(44,1,'Login','2022-01-03 06:14:10'),(45,2,'Login','2022-01-06 00:09:51'),(46,2,'Logout','2022-01-06 00:20:48'),(47,1,'Login','2022-01-06 03:31:14'),(48,1,'Login','2022-01-06 16:00:59'),(49,2,'Login','2022-01-06 20:03:59'),(50,2,'Logout','2022-01-06 20:28:16'),(51,2,'Login','2022-01-06 20:31:20'),(52,2,'Logout','2022-01-06 20:31:22'),(53,2,'Login','2022-01-06 20:37:03'),(54,2,'Logout','2022-01-06 20:37:05'),(55,1,'Login','2022-01-07 02:42:36'),(56,1,'Login','2022-01-07 03:52:18'),(57,2,'Login','2022-01-07 04:07:42'),(58,2,'Logout','2022-01-07 04:17:57'),(59,1,'Login','2022-01-07 04:47:04'),(60,1,'Login','2022-01-07 05:48:00'),(61,1,'Login','2022-01-07 05:57:12'),(62,2,'Login','2022-01-07 08:41:14'),(63,2,'Logout','2022-01-07 08:42:18'),(64,1,'Login','2022-01-07 08:42:48'),(65,2,'Login','2022-01-07 08:55:57'),(66,1,'Login','2022-01-08 15:37:36'),(67,2,'Login','2022-01-10 15:37:31'),(68,2,'Login','2022-01-11 01:10:02'),(69,2,'Login','2022-01-11 02:30:09'),(70,2,'Login','2022-01-12 05:42:47'),(71,1,'Login','2022-01-14 06:28:13'),(72,1,'Login','2022-01-14 06:34:33'),(73,2,'Login','2022-01-14 06:35:09'),(74,2,'Login','2022-01-14 06:35:58'),(75,2,'Login','2022-01-14 06:37:31'),(76,2,'Logout','2022-01-14 06:38:12'),(77,1,'Login','2022-01-14 06:38:35'),(78,2,'Login','2022-01-14 06:51:44'),(79,2,'Logout','2022-01-14 06:52:50'),(80,1,'Login','2022-01-14 06:53:03'),(81,2,'Login','2022-01-15 09:07:35'),(82,2,'Login','2022-01-15 09:11:21'),(83,2,'Logout','2022-01-15 09:14:31'),(84,1,'Login','2022-01-15 09:15:34'),(85,2,'Login','2022-01-16 06:32:06'),(86,2,'Login','2022-01-16 06:32:23'),(87,2,'Login','2022-01-16 06:35:42'),(88,2,'Login','2022-01-16 06:36:29'),(89,2,'Login','2022-01-17 02:33:10'),(90,2,'Logout','2022-01-17 04:34:58'),(91,2,'Logout','2022-01-17 04:47:06'),(92,2,'Login','2022-01-17 07:57:45'),(93,2,'Logout','2022-01-17 08:05:58'),(94,2,'Login','2022-01-17 14:02:31'),(95,2,'Login','2022-01-17 19:12:49'),(96,2,'Login','2022-01-17 23:24:29'),(97,2,'Logout','2022-01-18 05:13:54'),(98,2,'Logout','2022-01-18 05:16:06'),(99,2,'Logout','2022-01-18 05:16:27'),(100,2,'Logout','2022-01-18 05:17:37'),(101,2,'Login','2022-01-19 02:31:53'),(102,2,'Login','2022-01-22 05:57:20'),(103,2,'Logout','2022-01-22 06:32:34'),(104,2,'Login','2022-01-22 06:57:16'),(105,2,'Login','2022-01-22 23:15:55'),(106,2,'Logout','2022-01-22 23:48:24'),(107,2,'Login','2022-01-22 23:50:14'),(108,1,'Login','2022-01-23 14:40:57'),(109,1,'Login','2022-01-23 14:43:18'),(110,2,'Login','2022-01-23 14:44:49'),(111,2,'Logout','2022-01-23 14:48:40'),(112,2,'Login','2022-01-23 18:37:56'),(113,2,'Login','2022-01-23 21:06:05'),(114,2,'Login','2022-01-23 21:09:36'),(115,2,'Login','2022-01-23 21:11:50'),(116,2,'Logout','2022-01-23 21:20:20'),(117,2,'Login','2022-01-23 21:24:24'),(118,2,'Logout','2022-01-23 21:24:26'),(119,2,'Login','2022-01-23 21:25:13'),(120,2,'Logout','2022-01-23 21:25:15'),(121,1,'Login','2022-01-23 21:59:41'),(122,2,'Login','2022-01-23 22:06:20'),(123,2,'Logout','2022-01-23 22:11:58'),(124,2,'Login','2022-01-24 00:18:45'),(125,1,'Login','2022-01-24 00:29:11'),(126,2,'Login','2022-01-24 00:46:29'),(127,1,'Login','2022-01-24 02:33:30'),(128,2,'Login','2022-01-24 02:55:17'),(129,2,'Logout','2022-01-24 02:57:41'),(130,2,'Login','2022-01-26 00:29:34'),(131,2,'Login','2022-01-26 23:07:01');
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
INSERT INTO `maincategory` VALUES (33,'Canned Goods',0,0,0,19,928),(34,'Instant Noodles',0,0,0,2,140),(35,'Fresh Vegetables',0,0,0,5,49930),(36,'Pork/Meat/Poultry',0,0,0,2,41850),(37,'Fruits',0,0,0,0,0),(38,'Condiments',0,0,0,6,279),(39,'Personal Care',0,0,0,4,260),(40,'Snacks',0,0,0,0,0),(41,'Cleaning/Laundry Supplies',0,0,0,1,100),(43,'Beverages',0,0,0,0,0);
/*!40000 ALTER TABLE `maincategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturer`
--

LOCK TABLES `manufacturer` WRITE;
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
INSERT INTO `manufacturer` VALUES (1,'San Miguel Corporation (SMC)'),(4,'Unilever'),(5,'Nutri-Asia'),(6,'P&G'),(7,'Century Pacific Food Inc'),(8,'CDO Foodsphere Inc'),(9,'Ocean Crown Product Inc'),(11,'Monde Nissin Corporation'),(13,'Ren Frando Estonanto Online Palengke'),(14,'Ayala Seafood Corp'),(15,'Jaro Development Corporation'),(16,'Del Monte Philippines Inc'),(17,'Lorenza Food Corporation');
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price_rule`
--

LOCK TABLES `price_rule` WRITE;
/*!40000 ALTER TABLE `price_rule` DISABLE KEYS */;
INSERT INTO `price_rule` VALUES (1,'B-102','San Marino Corned Tuna  150 grams',33,31,'Discount (Near to Expire)'),(2,'B-101','San Marino Corned Tuna 140g',26,25,'Price Markup'),(3,'B-115','Sibuyas 1g',0.14,0.12,'Discount (Near to Expire)');
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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchaseorder`
--

LOCK TABLES `purchaseorder` WRITE;
/*!40000 ALTER TABLE `purchaseorder` DISABLE KEYS */;
INSERT INTO `purchaseorder` VALUES (45,'P101','0000-00-00','Joycel  Empanto','2022-01-14','Request Accepted','Not Paid','Cash','Alexandra Veluz','Star Corned Beef Chunky Cheese 150g',40,0,0,'',1300),(46,'P102','2021-12-30','Alexandra Veluz','2021-12-27','Waiting for Approval','Not Paid','Cash','Alexandra Veluz','Star Corned Beef Chunky Cheese 150g',50,10,0,'',1200),(51,'P103','2022-01-07','Alexandra Veluz','2022-01-14','Waiting for Approval','Not Paid','Cash','Alexandra Veluz','Cdo Meat Loaf  150g',50,10,0,'',1000),(79,'P104','2022-01-24','Chester Cruz','2022-01-31','Waiting for Approval','Not Paid','Cash','Alexandra Veluz','Rose Bowl Sardine in Tomato Sauce 155g',60,0,0,'Please reply',2000),(80,'P104','2022-01-24','Chester Cruz','2022-01-31','Waiting for Approval','Not Paid','Cash','Alexandra Veluz','Century Tuna Hot and Spicy 155g',60,0,0,'Please reply',2500),(81,'P106','2022-01-24','Joycel  Empanto','2022-01-31','Waiting for Approval','Not Paid','Cash','','Century Tuna Hot and Spicy 155g',50,0,0,'',2000);
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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `return_orders`
--

LOCK TABLES `return_orders` WRITE;
/*!40000 ALTER TABLE `return_orders` DISABLE KEYS */;
INSERT INTO `return_orders` VALUES (40,'PDI-1014',' Alexandra Veluz','San Marino Corned Tuna  150 grams','stockIn-101',30,1,30,'Request Accepted','2021-12-08','2021-12-22','expireds'),(47,'PDI-101',' Alexandra Veluz','San Marino Corned Tuna  150 grams','stockIn-101',1,1,30,'Waiting for Approval','2021-12-01','2021-12-22','expired'),(66,'PDI-103','Morante Albert','Cdo Meat Loaf  150g','stockIn-101',20,1,20,'Draft','2022-01-10','2022-01-23','Damaged Packaging');
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
  `custNo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (6,'202112307',1,0,-0,0,31,'Cash',100,69,'00:18:00','2021-12-30',1,1),(7,'202112311',1,0,-0,0,26,'Cash',50,24,'15:51:00','2021-12-31',2,1),(8,'202112318',1,0,-0,0,26,'Cash',50,24,'15:54:00','2021-12-31',1,2),(9,'202112313',1,0,-0,0,26,'Cash',50,24,'15:57:00','2021-12-31',2,3),(10,'202112314',1,0,-0,0,26,'Cash',50,24,'15:58:00','2021-12-31',2,4),(11,'202112314',1,0,-0,0,26,'Cash',50,24,'15:59:00','2021-12-31',2,5),(12,'202112316',1,0,-0,0,26,'Cash',50,24,'16:00:00','2021-12-31',2,6),(13,'202112317',1,0,-0,0,26,'Cash',100,74,'16:06:00','2021-12-31',2,7),(14,'202112318',1,0,-0,0,26,'Cash',100,74,'16:07:00','2021-12-31',2,8),(15,'202112319',1,0,-0,0,26,'Cash',50,24,'16:09:00','2021-12-31',2,9),(16,'202201011',1,0,-0,0,26,'Cash',100,74,'10:30:00','2022-01-01',2,1),(18,'202201061',1,0,-0,0,26,'Cash',50,24,'08:13:00','2022-01-06',2,1),(19,'202201071',3,0,-7,0,65.34,'Cash',100,34.66,'04:06:00','2022-01-07',2,2),(20,'202201072',1,0,-0,0,22,'Cash',50,28,'04:11:00','2022-01-07',2,3),(21,'202201073',1,0,-0,0,190,'Cash',200,10,'12:12:00','2022-01-07',2,1),(22,'202201074',100,0,-0,0,19,'Cash',50,31,'12:13:00','2022-01-07',2,4),(23,'202201075',10,0,-0,0,1.9,'Cash',10,8.1,'12:17:00','2022-01-07',2,5),(24,'202201076',3,0,-0,0,66,'Cash',100,34,'16:41:00','2022-01-07',2,6),(25,'2022011125',101,0,-0,0,41,'Cash',100,59,'10:31:00','2022-01-11',1,1),(26,'2022011828',5,0,-0,125.19,125.19,'Cash',130,4.1,'13:53:00','2022-01-18',1,1),(32,'2022011833',4,0,-0,0,25,'Cash',100,75,'08:52:00','2022-01-18',2,2),(34,'2022011829',2,0,-5,50,45,'Cash',50,5,'05:02:41','2022-01-18',2,3),(36,'2022011831',1,2,-2.5,25,24.75,'Cash',30,5.25,'05:12:13','2022-01-18',2,4),(37,'2022011832',1,2,-2.5,25,24.75,'Cash',100,75.25,'05:13:07','2022-01-18',2,5),(38,'2022011833',1,3,-2.75,25,24.75,'Cash',100,75.25,'05:14:32','2022-01-18',2,6),(39,'2022011834',1,2,-2.475,25,22.27,'Cash',100,77.73,'05:16:23','2022-01-18',2,7),(40,'2022011835',1,0,-0.5,25,24.99,'Cash',50,0,'05:18:24','2022-01-18',2,8),(42,'2022011837',1,0,-0,25,25,'Cash',100,75,'05:34:40','2022-01-18',2,10),(43,'2022011838',1,0,-0,25,25,'Cash',50,0,'05:37:49','2022-01-18',2,9),(44,'2022012239',1,0,-0,23,23,'Cash',100,77,'06:58:22','2022-01-22',2,1),(45,'2022012240',2,0,-0,48,48,'Cash',50,2,'07:02:18','2022-01-22',2,2),(46,'2022012241',1,0,-0,23,23,'Cash',50,27,'07:03:46','2022-01-22',2,3),(47,'2022012242',1,0,-0,23,23,'Cash',50,27,'07:07:56','2022-01-22',2,4),(48,'2022012243',2,0,-0,46,46,'Cash',100,54,'07:09:47','2022-01-22',2,5),(78,'OFF20220123100',100,0,10,19,19,'Cash',0,0,'04:42:57','2022-01-23',2,1),(79,'2022012342',1,0,-0,23,23,'Cash',100,77,'00:25:21','2022-01-23',2,2),(80,'OFF20220123100',200,0,20,38,38,'Cash',0,0,'07:34:25','2022-01-23',2,3),(81,'2022012344',1,0,-0,23,23,'Cash',100,77,'00:50:29','2022-01-23',2,4),(82,'2022012345',11,0,-0,180,180,'Cash',200,20,'15:47:43','2022-01-23',2,5),(83,'2022012346',1,0,-0,0,180,'Cash',200,20,'23:10:00','2022-01-23',1,6),(84,'2022012347',1,0,-0,0,8,'Cash',10,2,'23:17:00','2022-01-23',1,7),(85,'2022012348',2,0,-0,0,16,'Cash',20,4,'23:51:00','2022-01-23',1,8),(86,'2022012349',2,0,-0,0,12,'Cash',15,3,'23:53:00','2022-01-23',1,9),(87,'2022012450',11,0,-0,173,173,'Cash',200,0,'21:01:44','2022-01-24',2,1),(88,'2022012451',4,0,-0,118,118,'Cash',250,132,'21:03:31','2022-01-24',2,2),(89,'2022012452',8,0,-11.6,116,104.4,'Cash',110,5.6,'21:10:30','2022-01-24',2,3),(90,'2022012453',6,0,-0,36,36,'Cash',50,14,'04:14:45','2022-01-24',2,4),(91,'2022012454',1,0,-0,110,110,'Cash',200,90,'04:20:36','2022-01-24',2,5),(92,'2022012455',1000,0,-0,180,180,'Cash',200,0,'04:26:09','2022-01-24',2,6),(93,'2022012456',1000,0,-18,180,162,'Cash',200,0,'04:27:23','2022-01-24',2,7),(94,'2022012457',1,0,-2.5,25,22.5,'Cash',30,7.5,'06:08:49','2022-01-24',2,8),(95,'OFF202201241',1,0,10,22,22,'Cash',22,0,'06:45:47','2022-01-24',2,9),(96,'2022012459',2,0,-0,50,50,'',100,50,'08:20:34','2022-01-24',2,10),(97,'OFF202201241',2,0,10,44,44,'Cash',44,0,'10:49:36','2022-01-24',2,11),(98,'2022012461',3,0,-8.1,81,72.9,'Cash',100,27.1,'10:57:17','2022-01-25',2,1),(99,'2022012662',1,0,-0,62,62,'Cash',100,38,'08:57:55','2022-01-26',2,2),(100,'2022012663',2,0,-0,39,39,'Cash',50,11,'09:25:07','2022-01-26',2,2),(101,'2022012662',1,0,-0,25,25,'Cash',30,5,'09:58:36','2022-01-26',2,3),(102,'2022012663',1,0,-0,25,25,'Cash',100,75,'09:59:07','2022-01-26',2,4),(103,'2022012664',1,0,-0,25,25,'Cash',30,5,'10:01:04','2022-01-26',2,5),(104,'2022012665',1,0,-0,79,79,'Cash',80,1,'10:03:40','2022-01-26',2,6),(105,'2022011836',4,0,0,100,100,'Cash',100,0,'17:19:46','2022-01-24',2,12),(106,'202201077',1,0,0,110,110,'Cash',150,40,'07:30:56','2022-01-07',2,7),(107,'2022011226',1,0,0,25,25,'Cash',50,25,'13:36:41','2022-01-12',2,1),(108,'2022011839	',1,0,0,0.19,0.19,'Cash',1,0.81,'13:40:10','2022-01-18',2,3),(109,'2022012244',2,0,0,46,46,'Cash',50,4,'10:47:24','2022-01-22',2,6),(110,'2022010117',12,0,0,360,360,'Cash',500,140,'14:56:36','2022-01-06',2,1),(111,'2022012768',6,0,-26,260,234,'Cash',500,266,'07:08:16','2022-01-27',2,1),(112,'2022012769',5,0,-35.8,358,322.2,'Cash',400,77.8,'07:31:05','2022-01-27',2,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_return`
--

LOCK TABLES `sales_return` WRITE;
/*!40000 ALTER TABLE `sales_return` DISABLE KEYS */;
INSERT INTO `sales_return` VALUES (5,'2021-12-26','2021-12-23','202112236','San Marino Corned Tuna  150 grams',1,'stockIn-101',30,31,31,''),(6,'2021-12-26','2021-11-23','202112236','San Marino Corned Tuna  150 grams',1,'stockIn-101',30,31,31,'sd'),(7,'2022-01-03','2022-01-12','OFF20220123100','Bawang 1g',1,'stockIn-102',0.16,0.19,0.19,''),(8,'2022-01-24','2022-01-24','OFF202201241','Cdo Meat Loaf  150g',1,'stockIn-101',20,22,22,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shelves`
--

LOCK TABLES `shelves` WRITE;
/*!40000 ALTER TABLE `shelves` DISABLE KEYS */;
INSERT INTO `shelves` VALUES (20,'1-A',1,'Level 1 (Upper Beam)',120,40,43.84,220800,2512.6831466666636,2,0,44),(21,'1-B',1,'Level 2',120,40,46,220800,0,0,0,86),(22,'1-C',1,'Level 3',120,40,46,220800,3693.644225599999,2,0,110),(23,'1-D',1,'Level 4',120,40,46,220800,0,0,0,133),(24,'1-E',1,'Level 5 (Lower Beam)',120,40,60,220800,0,0,0,0),(43,'2-A',2,'Level 1',120,40,46,220800,0,0,0,52),(44,'2-B',2,'Level 2',120,40,46,220800,0,0,0,0),(50,'3-A',3,'Level 1 (Upper Beam)',0,0,0,0,0,0,0,57),(51,'3-B',3,'Level 2',0,0,0,0,0,0,0,202),(52,'3-C',3,'Level 3',0,0,0,0,0,0,0,0),(53,'4-A',4,'Level 1 (Upper Beam)',0,0,0,0,0,0,0,0),(54,'4-B',4,'Level 2',0,0,0,0,0,0,0,0),(55,'4-C',4,'Level 3',0,0,0,0,0,0,0,0),(56,'4-D',4,'Level 4',0,0,0,0,0,0,0,0),(57,'4-E',4,'Level 5',0,0,0,0,0,0,0,0),(58,'5-A',5,'Level 1 (Upper Beam)',0,0,0,0,0,0,0,0),(59,'5-B',5,'Level 2',0,0,0,0,0,0,0,40),(60,'5-C',5,'Level 3',0,0,0,0,0,0,0,0),(61,'5-D',5,'Level 4',0,0,0,0,0,0,0,0),(62,'5-E',5,'Level 5 (Lower Beam)',0,0,0,0,0,0,0,0),(63,'6-A',6,'Level 1 (Upper Beam)',0,0,0,0,0,0,0,0),(64,'6-B',6,'Level 2',0,0,0,0,0,0,0,0),(65,'6-C',6,'Level 3',0,0,0,0,0,0,0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage`
--

LOCK TABLES `storage` WRITE;
/*!40000 ALTER TABLE `storage` DISABLE KEYS */;
INSERT INTO `storage` VALUES (47,1,125,200,40,5,0,86,0,1000000,0,'Storage 1',46242210.97459966),(48,101,264,100,136,0,0,39850,0,0,0,'Meat/Poultry Section',0),(49,102,180,82,60,0,0,29829,0,0,0,'Vegetable Section',0),(50,103,128,48,96,0,0,0,0,0,0,'Fruit Section',0),(51,104,53,152,52,0,0,0,0,418912,0,'Refrigerator',0),(52,105,74,79,63.5,0,0,0,0,371221,0,'Chest Freezer',0),(58,2,125,200,40,3,0,-7,0,0,0,'Storage 2',0),(68,3,125,200,40,3,0,-30,0,1600000,0,'Storage 3',0),(69,4,180,200,40,5,0,0,0,1440000,0,'Storage 4',0),(70,5,120,200,40,5,0,-7,0,960000,0,'Storage 5',0),(71,6,200,200,40,3,0,0,0,1600000,0,'Storage 6',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (17,'Mega','Joycel ','Empanto','1032 Bayan Luma 8','joycel@gmail.com','09231088799'),(31,'JT International (Philippines) Inc','Morante','Albert','Aguilnaldo Hi-way, Panapaan IV, Bacoor City, Cavit','','09950239197'),(32,'Coca Cola Bottlers Philippines','Chester','Cruz','Imus Bottling Plant 122 Nia Road, Buhay Na Tubig 4','','09487718704'),(33,'Jaro Development Corporation','Joan','Herrera','17 Aguinaldo Hi-way Cor. Holiday Village','jaro_corp@gmail.com','09208905057'),(34,'All Mighty Homecare Products','Christian','Delacruz','2nd Building Imus Public Market Imus Cavite','christianigtbn@yahoo.com','09171432379'),(35,'Liwayway Marketing Corporation','Mel','Nolasco','Gen. E. Aguinaldo Highway, Anabu 1 4103 Imus Cavit','','09464714987'),(36,'Cavite Frozen Food Trading','Cellina','Santiago','Anabu II-F Imus City, Cavite','CellinaSantiagoSabale@yahoo.com','09297276071'),(39,'Ren Frando Estonanto','Carren','Estonanto','Bahayang Pag-Asa imus ','','09453312442'),(41,'hrhr','rhrhrh','rhrh','rhrhrh','alex@gmail.com','09171432379');
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
  `discount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (52,'202112307','4800249006612','stockIn-101','San Marino Tuna 150g',1,26,26,'2021-12-30','Canned Goods',1,0),(53,'202112307','4800249006612','stockIn-101','San Marino Tuna 150g',1,26,26,'2021-12-30','Canned Goods',1,0),(56,'202112311','748485100418','stockIn-101','San Marino Tuna 150g',1,26,26,'2021-12-31','Canned Goods',2,0),(57,'202112311','748485100418','stockIn-101','San Marino Tuna 150g',1,26,26,'2021-12-31','Canned Goods',2,0),(58,'202112318','748485100418','stockIn-101','San Marino Tuna 150g',1,26,26,'2021-12-31','Canned Goods',1,0),(59,'202112313','748485100418','stockIn-101','San Marino Tuna 150g',1,26,26,'2021-12-31','Canned Goods',2,0),(60,'202112314','748485100418','stockIn-101','San Marino Tuna 150g',1,26,26,'2021-12-31','Canned Goods',2,0),(61,'202112316','748485100418','stockIn-101','San Marino Tuna 150g',1,26,26,'2021-12-31','Canned Goods',2,0),(62,'202112317','748485100418','stockIn-101','San Marino Tuna 150g',1,26,26,'2021-12-31','Canned Goods',2,0),(63,'202112318','748485100418','stockIn-101','San Marino Tuna 150g',1,26,26,'2021-12-31','Canned Goods',2,0),(64,'202112319','748485100418','stockIn-101','San Marino Tuna 150g',1,26,26,'2021-12-31','Canned Goods',2,0),(76,'202201011','748485100418','stockIn-101','San Marino Tuna 150g',1,26,26,'2022-01-01','Canned Goods',2,0),(77,'2022010117','748485100418','stockIn-101','San Marino Tuna 150g',4,26,104,'2022-01-06','Canned Goods',1,0),(78,'2022010117','748485100418','stockIn-102','San Marino Corned Tuna 150g\n',7,32,224,'2022-01-06','Canned Goods',1,0),(79,'2022010117','748485100418','stockIn-102','San Marino Tuna 150g',1,32,32,'2022-01-06','Canned Goods',1,0),(81,'202201061','4800249006612','stockIn-103','Star Corned Beef Chunky Cheese 150g',1,26,26,'2022-01-06','Canned Goods',2,0),(83,'202201071','4800249909333','stockIn-101','Cdo Meat Loaf  150g',3,22,66,'2022-01-07','Canned Goods',2,0),(84,'202201072','4800249909333','stockIn-101','Cdo Meat Loaf  150g',1,22,22,'2022-01-07','Canned Goods',2,0),(85,'202201073','67677761929','stockIn-102','Bawang 1g',1000,0.19,190,'2022-01-07','Fresh Vegetables',2,0),(86,'202201074','67677761929','stockIn-102','Bawang 1g',100,0.19,19,'2022-01-07','Fresh Vegetables',2,0),(87,'202201075','67677761929','stockIn-102','Bawang 1g',10,0.19,1.9,'2022-01-07','Fresh Vegetables',2,0),(88,'202201076','4800249909333','stockIn-101','Cdo Meat Loaf  150g',3,22,66,'2022-01-07','Canned Goods',2,0),(89,'202201077','4800249909333','stockIn-101','Cdo Meat Loaf  150g',5,22,110,'2022-01-07','Canned Goods',2,0),(90,'2022011125','4800249909333','stockIn-101','Cdo Meat Loaf  150g',1,22,22,'2022-01-11','Canned Goods',1,0),(91,'2022011125','67677761929','stockIn-102','Bawang 1g',100,0.19,19,'2022-01-11','Fresh Vegetables',1,0),(92,'2022011226','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-12','Canned Goods',1,0),(95,'2022011828','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(96,'2022011828','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(97,'2022011828','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(98,'2022011828','67677761929','stockIn-102','Bawang 1g',1,0.19,0.19,'2022-01-18','Fresh Vegetables',2,0),(99,'2022011828','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(100,'2022011828','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(101,'2022011828','67677761929','stockIn-102','Bawang 1g',1,0.19,0.19,'2022-01-18','Fresh Vegetables',2,0),(102,'2022011829','4800249909333','stockIn-104','Cdo Meat Loaf  150g',2,25,50,'2022-01-18','Canned Goods',2,0),(103,'2022011831','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(104,'2022011832','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(105,'2022011833','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(106,'2022011834','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(107,'2022011835','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(108,'2022011835','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(109,'2022011836','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(111,'2022011836','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(112,'2022011836','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(113,'2022011836','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(114,'2022011837','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(115,'2022011838','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-18','Canned Goods',2,0),(126,'2022012239','798229398874','stockIn-103','Argentina Beef Loaf  170g',1,23,0,'2022-01-22','Canned Goods',2,0),(127,'2022012240','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-22','Canned Goods',2,0),(128,'2022012240','798229398874','stockIn-103','Argentina Beef Loaf  170g',1,23,23,'2022-01-22','Canned Goods',2,0),(129,'2022012241','798229398874','stockIn-103','Argentina Beef Loaf  170g',1,23,23,'2022-01-22','Canned Goods',2,0),(130,'2022012242','798229398874','stockIn-103','Argentina Beef Loaf  170g',1,23,23,'2022-01-22','Canned Goods',2,0),(131,'2022012243','798229398874','stockIn-103','Argentina Beef Loaf  170g',1,23,23,'2022-01-22','Canned Goods',2,0),(132,'2022012243','798229398874','stockIn-103','Argentina Beef Loaf  170g',1,23,23,'2022-01-22','Canned Goods',2,0),(133,'2022012244','798229398874','stockIn-103','Argentina Beef Loaf  170g',2,23,46,'2022-01-22','Canned Goods',2,0),(161,'OFF20220123100','733802651589','stockIn-102','Bawang 1g',100,0.19,19,'2022-01-23','Fresh Vegetables',1,10),(162,'2022012342','798229398874','stockIn-103','Argentina Beef Loaf  170g',1,23,23,'2022-01-23','Canned Goods',2,0),(163,'OFF20220123100','733802651589','stockIn-102','Bawang 1g',100,0.19,19,'2022-01-23','Fresh Vegetables',1,10),(164,'2022012344','798229398874','stockIn-103','Argentina Beef Loaf  170g',1,23,23,'2022-01-23','Canned Goods',2,0),(165,'2022012345','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-23','Canned Goods',1,0),(166,'2022012345','4800888169716','stockIn-110','Sunsilk Co-Creation 15ml',5,6,30,'2022-01-23','Personal Care',2,0),(167,'2022012345','4902430698146','stockIn-109','Pantene Shampoo Damaged Care 12ml',5,8,40,'2022-01-23','Personal Care',2,0),(168,'2022012345','8999999028039','stockIn-111','Pepsodent Twin Pack 190g',1,110,110,'2022-01-23','Personal Care',2,0),(169,'2022012346','4902430858540','stockIn-112','Safeguard Lemon Freshx3 175gg',1,180,180,'2022-01-23','Personal Care',1,0),(170,'2022012347','4902430698146','stockIn-109','Pantene Shampoo Damaged Care 12ml',1,8,8,'2022-01-23','Personal Care',1,0),(171,'2022012348','4902430698146','stockIn-109','Pantene Shampoo Damaged Care 12ml',2,8,16,'2022-01-23','Personal Care',1,0),(172,'2022012349','4800888169716','stockIn-110','Sunsilk Co-Creation 15ml',2,6,12,'2022-01-23','Personal Care',1,0),(173,'2022012450','4902430346184','stockIn-122','Downy Antibac Safeguard 36ml',5,12,60,'2022-01-24','Cleaning/Laundry Supplies',2,0),(174,'2022012450','4800024577139','stockIn-117','Del Monte Sweet Blend Ketchup 320g',1,28,28,'2022-01-24','Condiments',2,0),(175,'2022012450','4807770274275','stockIn-121','Lucky Me Pancit Canto Kalamansi Kasalo 120g',5,17,85,'2022-01-24','Instant Noodles',2,0),(176,'2022012451','4808887012026','stockIn-105','Star Corned Beef Chunky Cheese 175g',2,34,68,'2022-01-24','Canned Goods',2,0),(177,'2022012451','4800249909333','stockIn-104','Cdo Meat Loaf  150g',2,25,50,'2022-01-24','Canned Goods',2,0),(178,'2022012452','014285003045','stockIn-123','UFC Banana Ketchup 1kg',1,62,62,'2022-01-24','Condiments',2,0),(179,'2022012452','4902430346184','stockIn-122','Downy Antibac Safeguard 36ml',2,12,24,'2022-01-24','Cleaning/Laundry Supplies',2,0),(180,'2022012452','4800888169716','stockIn-110','Sunsilk Co-Creation 15ml',5,6,30,'2022-01-24','Personal Care',2,0),(181,'2022012453','4800888169716','stockIn-110','Sunsilk Co-Creation 15ml',6,6,36,'2022-01-24','Personal Care',2,0),(182,'2022012454','8999999028039','stockIn-111','Pepsodent Twin Pack 190g',1,110,110,'2022-01-24','Personal Care',2,0),(183,'2022012455','81988526775','stockIn-113','Porchop 1g',1000,0.18,180,'2022-01-24','Pork/Meat/Poultry',2,0),(184,'2022012456','84284524987','stockIn-114','Adobo Cuts 1g',1000,0.18,180,'2022-01-24','Pork/Meat/Poultry',2,0),(204,'2022012457','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-24','Canned Goods',2,0),(206,'OFF202201241','4800249909333','stockIn-101','Cdo Meat Loaf  150g',1,22,22,'2022-01-24','Canned Goods',1,10),(207,'2022012459','4800249909333','stockIn-104','Cdo Meat Loaf  150g',2,25,50,'2022-01-24','Canned Goods',2,0),(209,'OFF202201241','4800249909333','stockIn-101','Cdo Meat Loaf  150g',1,22,22,'2022-01-24','Canned Goods',1,0),(210,'2022012461','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-24','Canned Goods',2,0),(211,'2022012461','4800024577139','stockIn-117','Del Monte Sweet Blend Ketchup 320g',2,28,56,'2022-01-24','Condiments',2,0),(212,'2022012662','4800344009716','stockIn-118','Silver Swan Patis 750ml',1,62,62,'2022-01-26','Condiments',2,0),(213,'2022012663','748485100418','stockIn-107','Century Tuna Hot and Spicy 155g',1,33,33,'2022-01-26','Canned Goods',2,0),(214,'2022012663','4800888169716','stockIn-110','Sunsilk Co-Creation 15ml',1,6,6,'2022-01-26','Personal Care',2,0),(216,'2022012662','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-26','Canned Goods',2,0),(217,'2022012663','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-26','Canned Goods',2,0),(218,'2022012664','4800249909333','stockIn-104','Cdo Meat Loaf  150g',1,25,25,'2022-01-26','Canned Goods',2,0),(219,'2022012665','50830710712','stockIn-119','Lorins Patis 1000ml',1,79,79,'2022-01-26','Condiments',2,0),(220,'2022012768','50830710712','stockIn-119','Lorins Patis 1000ml',1,79,79,'2022-01-27','Condiments',2,0),(221,'2022012768','014285003045','stockIn-123','UFC Banana Ketchup 1kg',2,62,124,'2022-01-27','Condiments',2,0),(222,'2022012768','683922101682','stockIn-108','Rose Bowl Sardine in Tomato Sauce 155g',3,19,57,'2022-01-27','Canned Goods',2,0),(223,'2022012769','4807770273766','stockIn-120','Lucky Me Pancit Canton Sweet&Spicy (6 packs) 480g',2,86,172,'2022-01-27','Instant Noodles',2,0),(224,'2022012769','4800344009716','stockIn-118','Silver Swan Patis 750ml',3,62,186,'2022-01-27','Condiments',2,0);
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

-- Dump completed on 2022-01-27 12:47:44
