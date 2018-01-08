CREATE DATABASE  IF NOT EXISTS `amazon` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `amazon`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: amazon
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.26-MariaDB

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
-- Table structure for table `settlementsfr`
--

DROP TABLE IF EXISTS `settlementsfr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settlementsfr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `settlement_id` bigint(10) DEFAULT NULL,
  `settlement_start_date` date DEFAULT NULL,
  `settlement_end_date` date DEFAULT NULL,
  `deposit_date` date DEFAULT NULL,
  `total_amount` decimal(13,2) DEFAULT NULL,
  `currency` varchar(3) DEFAULT NULL,
  `transaction_type` varchar(50) DEFAULT NULL,
  `order_id` varchar(19) DEFAULT NULL,
  `merchant_order_id` varchar(21) DEFAULT NULL,
  `adjustment_id` varchar(33) DEFAULT NULL,
  `shipment_id` varchar(9) DEFAULT NULL,
  `marketplace_name` varchar(22) DEFAULT NULL,
  `amount_type` varchar(27) DEFAULT NULL,
  `amount_description` varchar(24) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `fulfillment_id` varchar(3) DEFAULT NULL,
  `posted_date` varchar(25) DEFAULT NULL,
  `posted_date_time` varchar(23) DEFAULT NULL,
  `order_item_code` varchar(14) DEFAULT NULL,
  `merchant_order_item_id` varchar(23) DEFAULT NULL,
  `merchant_adjustment_item_id` varchar(11) DEFAULT NULL,
  `sku` varchar(27) DEFAULT NULL,
  `quantity_purchased` varchar(1) DEFAULT NULL,
  `promotion_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12637 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-08  9:53:49
