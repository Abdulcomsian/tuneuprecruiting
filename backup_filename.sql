-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: tune_up_recruiting
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `applies`
--

DROP TABLE IF EXISTS `applies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `program_id` bigint unsigned NOT NULL,
  `trash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `star` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `talking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `read` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applies`
--

LOCK TABLES `applies` WRITE;
/*!40000 ALTER TABLE `applies` DISABLE KEYS */;
/*!40000 ALTER TABLE `applies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apply_details`
--

DROP TABLE IF EXISTS `apply_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apply_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `apply_id` bigint unsigned NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `trash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apply_details`
--

LOCK TABLES `apply_details` WRITE;
/*!40000 ALTER TABLE `apply_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `apply_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `coach_id` bigint unsigned NOT NULL,
  `student_id` bigint unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chats_student_id_foreign` (`student_id`),
  CONSTRAINT `chats_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coaches`
--

DROP TABLE IF EXISTS `coaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coaches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_or_university` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `short_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coaches`
--

LOCK TABLES `coaches` WRITE;
/*!40000 ALTER TABLE `coaches` DISABLE KEYS */;
INSERT INTO `coaches` VALUES (1,2,'Shoukat','Ullah',NULL,'Nust','Male','Golf',NULL,'default.jpg',NULL,'active','2024-01-05 05:54:26','2024-01-05 05:54:26'),(2,4,'Cholod','Cholods',NULL,'Nust','Male','Golf','asas','default.jpg',NULL,'active','2024-01-05 05:59:50','2024-01-08 06:11:03'),(3,6,'Matt','Cholod',NULL,'Northern Illinois University','Male','Golf',NULL,'default.jpg',NULL,'active','2024-01-05 23:22:51','2024-01-05 23:22:51'),(4,7,'Test','Test',NULL,'Nust','Male','Hockey',NULL,'default.jpg',NULL,'active','2024-01-08 06:59:38','2024-01-08 06:59:38');
/*!40000 ALTER TABLE `coaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Afghanistan','AF','2024-01-04 12:59:32','2024-01-04 12:59:32'),(2,'Åland Islands','AX','2024-01-04 12:59:32','2024-01-04 12:59:32'),(3,'Albania','AL','2024-01-04 12:59:32','2024-01-04 12:59:32'),(4,'Algeria','DZ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(5,'American Samoa','AS','2024-01-04 12:59:32','2024-01-04 12:59:32'),(6,'Andorra','AD','2024-01-04 12:59:32','2024-01-04 12:59:32'),(7,'Angola','AO','2024-01-04 12:59:32','2024-01-04 12:59:32'),(8,'Anguilla','AI','2024-01-04 12:59:32','2024-01-04 12:59:32'),(9,'Antarctica','AQ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(10,'Antigua and Barbuda','AG','2024-01-04 12:59:32','2024-01-04 12:59:32'),(11,'Argentina','AR','2024-01-04 12:59:32','2024-01-04 12:59:32'),(12,'Armenia','AM','2024-01-04 12:59:32','2024-01-04 12:59:32'),(13,'Aruba','AW','2024-01-04 12:59:32','2024-01-04 12:59:32'),(14,'Australia','AU','2024-01-04 12:59:32','2024-01-04 12:59:32'),(15,'Austria','AT','2024-01-04 12:59:32','2024-01-04 12:59:32'),(16,'Azerbaijan','AZ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(17,'Bahamas','BS','2024-01-04 12:59:32','2024-01-04 12:59:32'),(18,'Bahrain','BH','2024-01-04 12:59:32','2024-01-04 12:59:32'),(19,'Bangladesh','BD','2024-01-04 12:59:32','2024-01-04 12:59:32'),(20,'Barbados','BB','2024-01-04 12:59:32','2024-01-04 12:59:32'),(21,'Belarus','BY','2024-01-04 12:59:32','2024-01-04 12:59:32'),(22,'Belgium','BE','2024-01-04 12:59:32','2024-01-04 12:59:32'),(23,'Belize','BZ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(24,'Benin','BJ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(25,'Bermuda','BM','2024-01-04 12:59:32','2024-01-04 12:59:32'),(26,'Bhutan','BT','2024-01-04 12:59:32','2024-01-04 12:59:32'),(27,'Bolivia, Plurinational State of','BO','2024-01-04 12:59:32','2024-01-04 12:59:32'),(28,'Bonaire, Sint Eustatius and Saba','BQ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(29,'Bosnia and Herzegovina','BA','2024-01-04 12:59:32','2024-01-04 12:59:32'),(30,'Botswana','BW','2024-01-04 12:59:32','2024-01-04 12:59:32'),(31,'Bouvet Island','BV','2024-01-04 12:59:32','2024-01-04 12:59:32'),(32,'Brazil','BR','2024-01-04 12:59:32','2024-01-04 12:59:32'),(33,'British Indian Ocean Territory','IO','2024-01-04 12:59:32','2024-01-04 12:59:32'),(34,'Brunei Darussalam','BN','2024-01-04 12:59:32','2024-01-04 12:59:32'),(35,'Bulgaria','BG','2024-01-04 12:59:32','2024-01-04 12:59:32'),(36,'Burkina Faso','BF','2024-01-04 12:59:32','2024-01-04 12:59:32'),(37,'Burundi','BI','2024-01-04 12:59:32','2024-01-04 12:59:32'),(38,'Cambodia','KH','2024-01-04 12:59:32','2024-01-04 12:59:32'),(39,'Cameroon','CM','2024-01-04 12:59:32','2024-01-04 12:59:32'),(40,'Canada','CA','2024-01-04 12:59:32','2024-01-04 12:59:32'),(41,'Cape Verde','CV','2024-01-04 12:59:32','2024-01-04 12:59:32'),(42,'Cayman Islands','KY','2024-01-04 12:59:32','2024-01-04 12:59:32'),(43,'Central African Republic','CF','2024-01-04 12:59:32','2024-01-04 12:59:32'),(44,'Chad','TD','2024-01-04 12:59:32','2024-01-04 12:59:32'),(45,'Chile','CL','2024-01-04 12:59:32','2024-01-04 12:59:32'),(46,'China','CN','2024-01-04 12:59:32','2024-01-04 12:59:32'),(47,'Christmas Island','CX','2024-01-04 12:59:32','2024-01-04 12:59:32'),(48,'Cocos (Keeling) Islands','CC','2024-01-04 12:59:32','2024-01-04 12:59:32'),(49,'Colombia','CO','2024-01-04 12:59:32','2024-01-04 12:59:32'),(50,'Comoros','KM','2024-01-04 12:59:32','2024-01-04 12:59:32'),(51,'Congo','CG','2024-01-04 12:59:32','2024-01-04 12:59:32'),(52,'Congo, the Democratic Republic of the','CD','2024-01-04 12:59:32','2024-01-04 12:59:32'),(53,'Cook Islands','CK','2024-01-04 12:59:32','2024-01-04 12:59:32'),(54,'Costa Rica','CR','2024-01-04 12:59:32','2024-01-04 12:59:32'),(55,'Côte d\'Ivoire','CI','2024-01-04 12:59:32','2024-01-04 12:59:32'),(56,'Croatia','HR','2024-01-04 12:59:32','2024-01-04 12:59:32'),(57,'Cuba','CU','2024-01-04 12:59:32','2024-01-04 12:59:32'),(58,'Curaçao','CW','2024-01-04 12:59:32','2024-01-04 12:59:32'),(59,'Cyprus','CY','2024-01-04 12:59:32','2024-01-04 12:59:32'),(60,'Czech Republic','CZ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(61,'Denmark','DK','2024-01-04 12:59:32','2024-01-04 12:59:32'),(62,'Djibouti','DJ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(63,'Dominica','DM','2024-01-04 12:59:32','2024-01-04 12:59:32'),(64,'Dominican Republic','DO','2024-01-04 12:59:32','2024-01-04 12:59:32'),(65,'Ecuador','EC','2024-01-04 12:59:32','2024-01-04 12:59:32'),(66,'Egypt','EG','2024-01-04 12:59:32','2024-01-04 12:59:32'),(67,'El Salvador','SV','2024-01-04 12:59:32','2024-01-04 12:59:32'),(68,'Equatorial Guinea','GQ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(69,'Eritrea','ER','2024-01-04 12:59:32','2024-01-04 12:59:32'),(70,'Estonia','EE','2024-01-04 12:59:32','2024-01-04 12:59:32'),(71,'Ethiopia','ET','2024-01-04 12:59:32','2024-01-04 12:59:32'),(72,'Falkland Islands (Malvinas)','FK','2024-01-04 12:59:32','2024-01-04 12:59:32'),(73,'Faroe Islands','FO','2024-01-04 12:59:32','2024-01-04 12:59:32'),(74,'Fiji','FJ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(75,'Finland','FI','2024-01-04 12:59:32','2024-01-04 12:59:32'),(76,'France','FR','2024-01-04 12:59:32','2024-01-04 12:59:32'),(77,'French Guiana','GF','2024-01-04 12:59:32','2024-01-04 12:59:32'),(78,'French Polynesia','PF','2024-01-04 12:59:32','2024-01-04 12:59:32'),(79,'French Southern Territories','TF','2024-01-04 12:59:32','2024-01-04 12:59:32'),(80,'Gabon','GA','2024-01-04 12:59:32','2024-01-04 12:59:32'),(81,'Gambia','GM','2024-01-04 12:59:32','2024-01-04 12:59:32'),(82,'Georgia','GE','2024-01-04 12:59:32','2024-01-04 12:59:32'),(83,'Germany','DE','2024-01-04 12:59:32','2024-01-04 12:59:32'),(84,'Ghana','GH','2024-01-04 12:59:32','2024-01-04 12:59:32'),(85,'Gibraltar','GI','2024-01-04 12:59:32','2024-01-04 12:59:32'),(86,'Greece','GR','2024-01-04 12:59:32','2024-01-04 12:59:32'),(87,'Greenland','GL','2024-01-04 12:59:32','2024-01-04 12:59:32'),(88,'Grenada','GD','2024-01-04 12:59:32','2024-01-04 12:59:32'),(89,'Guadeloupe','GP','2024-01-04 12:59:32','2024-01-04 12:59:32'),(90,'Guam','GU','2024-01-04 12:59:32','2024-01-04 12:59:32'),(91,'Guatemala','GT','2024-01-04 12:59:32','2024-01-04 12:59:32'),(92,'Guernsey','GG','2024-01-04 12:59:32','2024-01-04 12:59:32'),(93,'Guinea','GN','2024-01-04 12:59:32','2024-01-04 12:59:32'),(94,'Guinea-Bissau','GW','2024-01-04 12:59:32','2024-01-04 12:59:32'),(95,'Guyana','GY','2024-01-04 12:59:32','2024-01-04 12:59:32'),(96,'Haiti','HT','2024-01-04 12:59:32','2024-01-04 12:59:32'),(97,'Heard Island and McDonald Mcdonald Islands','HM','2024-01-04 12:59:32','2024-01-04 12:59:32'),(98,'Holy See (Vatican City State)','VA','2024-01-04 12:59:32','2024-01-04 12:59:32'),(99,'Honduras','HN','2024-01-04 12:59:32','2024-01-04 12:59:32'),(100,'Hong Kong','HK','2024-01-04 12:59:32','2024-01-04 12:59:32'),(101,'Hungary','HU','2024-01-04 12:59:32','2024-01-04 12:59:32'),(102,'Iceland','IS','2024-01-04 12:59:32','2024-01-04 12:59:32'),(103,'India','IN','2024-01-04 12:59:32','2024-01-04 12:59:32'),(104,'Indonesia','ID','2024-01-04 12:59:32','2024-01-04 12:59:32'),(105,'Iran, Islamic Republic of','IR','2024-01-04 12:59:32','2024-01-04 12:59:32'),(106,'Iraq','IQ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(107,'Ireland','IE','2024-01-04 12:59:32','2024-01-04 12:59:32'),(108,'Isle of Man','IM','2024-01-04 12:59:32','2024-01-04 12:59:32'),(109,'Israel','IL','2024-01-04 12:59:32','2024-01-04 12:59:32'),(110,'Italy','IT','2024-01-04 12:59:32','2024-01-04 12:59:32'),(111,'Jamaica','JM','2024-01-04 12:59:32','2024-01-04 12:59:32'),(112,'Japan','JP','2024-01-04 12:59:32','2024-01-04 12:59:32'),(113,'Jersey','JE','2024-01-04 12:59:32','2024-01-04 12:59:32'),(114,'Jordan','JO','2024-01-04 12:59:32','2024-01-04 12:59:32'),(115,'Kazakhstan','KZ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(116,'Kenya','KE','2024-01-04 12:59:32','2024-01-04 12:59:32'),(117,'Kiribati','KI','2024-01-04 12:59:32','2024-01-04 12:59:32'),(118,'Korea, Democratic People\'s Republic of','KP','2024-01-04 12:59:32','2024-01-04 12:59:32'),(119,'Korea, Republic of','KR','2024-01-04 12:59:32','2024-01-04 12:59:32'),(120,'Kuwait','KW','2024-01-04 12:59:32','2024-01-04 12:59:32'),(121,'Kyrgyzstan','KG','2024-01-04 12:59:32','2024-01-04 12:59:32'),(122,'Lao People\'s Democratic Republic','LA','2024-01-04 12:59:32','2024-01-04 12:59:32'),(123,'Latvia','LV','2024-01-04 12:59:32','2024-01-04 12:59:32'),(124,'Lebanon','LB','2024-01-04 12:59:32','2024-01-04 12:59:32'),(125,'Lesotho','LS','2024-01-04 12:59:32','2024-01-04 12:59:32'),(126,'Liberia','LR','2024-01-04 12:59:32','2024-01-04 12:59:32'),(127,'Libya','LY','2024-01-04 12:59:32','2024-01-04 12:59:32'),(128,'Liechtenstein','LI','2024-01-04 12:59:32','2024-01-04 12:59:32'),(129,'Lithuania','LT','2024-01-04 12:59:32','2024-01-04 12:59:32'),(130,'Luxembourg','LU','2024-01-04 12:59:32','2024-01-04 12:59:32'),(131,'Macao','MO','2024-01-04 12:59:32','2024-01-04 12:59:32'),(132,'Macedonia, the Former Yugoslav Republic of','MK','2024-01-04 12:59:32','2024-01-04 12:59:32'),(133,'Madagascar','MG','2024-01-04 12:59:32','2024-01-04 12:59:32'),(134,'Malawi','MW','2024-01-04 12:59:32','2024-01-04 12:59:32'),(135,'Malaysia','MY','2024-01-04 12:59:32','2024-01-04 12:59:32'),(136,'Maldives','MV','2024-01-04 12:59:32','2024-01-04 12:59:32'),(137,'Mali','ML','2024-01-04 12:59:32','2024-01-04 12:59:32'),(138,'Malta','MT','2024-01-04 12:59:32','2024-01-04 12:59:32'),(139,'Marshall Islands','MH','2024-01-04 12:59:32','2024-01-04 12:59:32'),(140,'Martinique','MQ','2024-01-04 12:59:32','2024-01-04 12:59:32'),(141,'Mauritania','MR','2024-01-04 12:59:32','2024-01-04 12:59:32'),(142,'Mauritius','MU','2024-01-04 12:59:32','2024-01-04 12:59:32'),(143,'Mayotte','YT','2024-01-04 12:59:32','2024-01-04 12:59:32'),(144,'Mexico','MX','2024-01-04 12:59:32','2024-01-04 12:59:32'),(145,'Micronesia, Federated States of','FM','2024-01-04 12:59:33','2024-01-04 12:59:33'),(146,'Moldova, Republic of','MD','2024-01-04 12:59:33','2024-01-04 12:59:33'),(147,'Monaco','MC','2024-01-04 12:59:33','2024-01-04 12:59:33'),(148,'Mongolia','MN','2024-01-04 12:59:33','2024-01-04 12:59:33'),(149,'Montenegro','ME','2024-01-04 12:59:33','2024-01-04 12:59:33'),(150,'Montserrat','MS','2024-01-04 12:59:33','2024-01-04 12:59:33'),(151,'Morocco','MA','2024-01-04 12:59:33','2024-01-04 12:59:33'),(152,'Mozambique','MZ','2024-01-04 12:59:33','2024-01-04 12:59:33'),(153,'Myanmar','MM','2024-01-04 12:59:33','2024-01-04 12:59:33'),(154,'Namibia','NA','2024-01-04 12:59:33','2024-01-04 12:59:33'),(155,'Nauru','NR','2024-01-04 12:59:33','2024-01-04 12:59:33'),(156,'Nepal','NP','2024-01-04 12:59:33','2024-01-04 12:59:33'),(157,'Netherlands','NL','2024-01-04 12:59:33','2024-01-04 12:59:33'),(158,'New Caledonia','NC','2024-01-04 12:59:33','2024-01-04 12:59:33'),(159,'New Zealand','NZ','2024-01-04 12:59:33','2024-01-04 12:59:33'),(160,'Nicaragua','NI','2024-01-04 12:59:33','2024-01-04 12:59:33'),(161,'Niger','NE','2024-01-04 12:59:33','2024-01-04 12:59:33'),(162,'Nigeria','NG','2024-01-04 12:59:33','2024-01-04 12:59:33'),(163,'Niue','NU','2024-01-04 12:59:33','2024-01-04 12:59:33'),(164,'Norfolk Island','NF','2024-01-04 12:59:33','2024-01-04 12:59:33'),(165,'Northern Mariana Islands','MP','2024-01-04 12:59:33','2024-01-04 12:59:33'),(166,'Norway','NO','2024-01-04 12:59:33','2024-01-04 12:59:33'),(167,'Oman','OM','2024-01-04 12:59:33','2024-01-04 12:59:33'),(168,'Pakistan','PK','2024-01-04 12:59:33','2024-01-04 12:59:33'),(169,'Palau','PW','2024-01-04 12:59:33','2024-01-04 12:59:33'),(170,'Palestine, State of','PS','2024-01-04 12:59:33','2024-01-04 12:59:33'),(171,'Panama','PA','2024-01-04 12:59:33','2024-01-04 12:59:33'),(172,'Papua New Guinea','PG','2024-01-04 12:59:33','2024-01-04 12:59:33'),(173,'Paraguay','PY','2024-01-04 12:59:33','2024-01-04 12:59:33'),(174,'Peru','PE','2024-01-04 12:59:33','2024-01-04 12:59:33'),(175,'Philippines','PH','2024-01-04 12:59:33','2024-01-04 12:59:33'),(176,'Pitcairn','PN','2024-01-04 12:59:33','2024-01-04 12:59:33'),(177,'Poland','PL','2024-01-04 12:59:33','2024-01-04 12:59:33'),(178,'Portugal','PT','2024-01-04 12:59:33','2024-01-04 12:59:33'),(179,'Puerto Rico','PR','2024-01-04 12:59:33','2024-01-04 12:59:33'),(180,'Qatar','QA','2024-01-04 12:59:33','2024-01-04 12:59:33'),(181,'Réunion','RE','2024-01-04 12:59:33','2024-01-04 12:59:33'),(182,'Romania','RO','2024-01-04 12:59:33','2024-01-04 12:59:33'),(183,'Russian Federation','RU','2024-01-04 12:59:33','2024-01-04 12:59:33'),(184,'Rwanda','RW','2024-01-04 12:59:33','2024-01-04 12:59:33'),(185,'Saint Barthélemy','BL','2024-01-04 12:59:33','2024-01-04 12:59:33'),(186,'Saint Helena, Ascension and Tristan da Cunha','SH','2024-01-04 12:59:33','2024-01-04 12:59:33'),(187,'Saint Kitts and Nevis','KN','2024-01-04 12:59:33','2024-01-04 12:59:33'),(188,'Saint Lucia','LC','2024-01-04 12:59:33','2024-01-04 12:59:33'),(189,'Saint Martin (French part)','MF','2024-01-04 12:59:33','2024-01-04 12:59:33'),(190,'Saint Pierre and Miquelon','PM','2024-01-04 12:59:33','2024-01-04 12:59:33'),(191,'Saint Vincent and the Grenadines','VC','2024-01-04 12:59:33','2024-01-04 12:59:33'),(192,'Samoa','WS','2024-01-04 12:59:33','2024-01-04 12:59:33'),(193,'San Marino','SM','2024-01-04 12:59:33','2024-01-04 12:59:33'),(194,'Sao Tome and Principe','ST','2024-01-04 12:59:33','2024-01-04 12:59:33'),(195,'Saudi Arabia','SA','2024-01-04 12:59:33','2024-01-04 12:59:33'),(196,'Senegal','SN','2024-01-04 12:59:33','2024-01-04 12:59:33'),(197,'Serbia','RS','2024-01-04 12:59:33','2024-01-04 12:59:33'),(198,'Seychelles','SC','2024-01-04 12:59:33','2024-01-04 12:59:33'),(199,'Sierra Leone','SL','2024-01-04 12:59:33','2024-01-04 12:59:33'),(200,'Singapore','SG','2024-01-04 12:59:33','2024-01-04 12:59:33'),(201,'Sint Maarten (Dutch part)','SX','2024-01-04 12:59:33','2024-01-04 12:59:33'),(202,'Slovakia','SK','2024-01-04 12:59:33','2024-01-04 12:59:33'),(203,'Slovenia','SI','2024-01-04 12:59:33','2024-01-04 12:59:33'),(204,'Solomon Islands','SB','2024-01-04 12:59:33','2024-01-04 12:59:33'),(205,'Somalia','SO','2024-01-04 12:59:33','2024-01-04 12:59:33'),(206,'South Africa','ZA','2024-01-04 12:59:33','2024-01-04 12:59:33'),(207,'South Georgia and the South Sandwich Islands','GS','2024-01-04 12:59:33','2024-01-04 12:59:33'),(208,'South Sudan','SS','2024-01-04 12:59:33','2024-01-04 12:59:33'),(209,'Spain','ES','2024-01-04 12:59:33','2024-01-04 12:59:33'),(210,'Sri Lanka','LK','2024-01-04 12:59:33','2024-01-04 12:59:33'),(211,'Sudan','SD','2024-01-04 12:59:33','2024-01-04 12:59:33'),(212,'Suriname','SR','2024-01-04 12:59:33','2024-01-04 12:59:33'),(213,'Svalbard and Jan Mayen','SJ','2024-01-04 12:59:33','2024-01-04 12:59:33'),(214,'Swaziland','SZ','2024-01-04 12:59:33','2024-01-04 12:59:33'),(215,'Sweden','SE','2024-01-04 12:59:33','2024-01-04 12:59:33'),(216,'Switzerland','CH','2024-01-04 12:59:33','2024-01-04 12:59:33'),(217,'Syrian Arab Republic','SY','2024-01-04 12:59:33','2024-01-04 12:59:33'),(218,'Taiwan','TW','2024-01-04 12:59:33','2024-01-04 12:59:33'),(219,'Tajikistan','TJ','2024-01-04 12:59:33','2024-01-04 12:59:33'),(220,'Tanzania, United Republic of','TZ','2024-01-04 12:59:33','2024-01-04 12:59:33'),(221,'Thailand','TH','2024-01-04 12:59:33','2024-01-04 12:59:33'),(222,'Timor-Leste','TL','2024-01-04 12:59:33','2024-01-04 12:59:33'),(223,'Togo','TG','2024-01-04 12:59:33','2024-01-04 12:59:33'),(224,'Tokelau','TK','2024-01-04 12:59:33','2024-01-04 12:59:33'),(225,'Tonga','TO','2024-01-04 12:59:33','2024-01-04 12:59:33'),(226,'Trinidad and Tobago','TT','2024-01-04 12:59:33','2024-01-04 12:59:33'),(227,'Tunisia','TN','2024-01-04 12:59:33','2024-01-04 12:59:33'),(228,'Turkey','TR','2024-01-04 12:59:33','2024-01-04 12:59:33'),(229,'Turkmenistan','TM','2024-01-04 12:59:33','2024-01-04 12:59:33'),(230,'Turks and Caicos Islands','TC','2024-01-04 12:59:33','2024-01-04 12:59:33'),(231,'Tuvalu','TV','2024-01-04 12:59:33','2024-01-04 12:59:33'),(232,'Uganda','UG','2024-01-04 12:59:33','2024-01-04 12:59:33'),(233,'Ukraine','UA','2024-01-04 12:59:33','2024-01-04 12:59:33'),(234,'United Arab Emirates','AE','2024-01-04 12:59:33','2024-01-04 12:59:33'),(235,'United Kingdom','GB','2024-01-04 12:59:33','2024-01-04 12:59:33'),(236,'United States','US','2024-01-04 12:59:33','2024-01-04 12:59:33'),(237,'United States Minor Outlying Islands','UM','2024-01-04 12:59:33','2024-01-04 12:59:33'),(238,'Uruguay','UY','2024-01-04 12:59:33','2024-01-04 12:59:33'),(239,'Uzbekistan','UZ','2024-01-04 12:59:33','2024-01-04 12:59:33'),(240,'Vanuatu','VU','2024-01-04 12:59:33','2024-01-04 12:59:33'),(241,'Venezuela, Bolivarian Republic of','VE','2024-01-04 12:59:33','2024-01-04 12:59:33'),(242,'Viet Nam','VN','2024-01-04 12:59:33','2024-01-04 12:59:33'),(243,'Virgin Islands, British','VG','2024-01-04 12:59:33','2024-01-04 12:59:33'),(244,'Virgin Islands, U.S.','VI','2024-01-04 12:59:33','2024-01-04 12:59:33'),(245,'Wallis and Futuna','WF','2024-01-04 12:59:33','2024-01-04 12:59:33'),(246,'Western Sahara','EH','2024-01-04 12:59:33','2024-01-04 12:59:33'),(247,'Yemen','YE','2024-01-04 12:59:33','2024-01-04 12:59:33'),(248,'Zambia','ZM','2024-01-04 12:59:33','2024-01-04 12:59:33'),(249,'Zimbabwe','ZW','2024-01-04 12:59:33','2024-01-04 12:59:33');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_10_19_102530_create_students_table',1),(6,'2023_10_19_103501_create_student_attachments_table',1),(7,'2023_10_20_075348_create_applies_table',1),(8,'2023_10_23_100815_create_chats_table',1),(9,'2023_11_03_065349_create_coaches_table',1),(10,'2023_11_07_061003_create_programs_table',1),(11,'2023_11_14_073253_create_program_questions_table',1),(12,'2023_11_22_120020_create_apply_details_table',1),(13,'2023_12_20_090800_create_countries_table',1),(14,'2023_12_29_072809_create_program_types_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('matt.caddylink@gmail.com','$2y$10$2P5Mz8COy3p6dYb0puJV9ePr35NAEfqoL0sWX9AmqFJKCvGzxoJYS','2024-01-05 23:22:51'),('test@gmail.com','$2y$10$BPSP8HkFA.2TildSGfSaAOUiXnHwl7HDETDpnh4.LokOE/mEOruOu','2024-01-08 06:59:38');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_questions`
--

DROP TABLE IF EXISTS `program_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `program_questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `program_id` bigint unsigned NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_questions`
--

LOCK TABLES `program_questions` WRITE;
/*!40000 ALTER TABLE `program_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `program_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_types`
--

DROP TABLE IF EXISTS `program_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `program_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_types`
--

LOCK TABLES `program_types` WRITE;
/*!40000 ALTER TABLE `program_types` DISABLE KEYS */;
INSERT INTO `program_types` VALUES (1,'Golf','2024-01-04 13:00:02','2024-01-04 13:00:02'),(2,'Soccer','2024-01-04 13:00:02','2024-01-04 13:00:02'),(3,'Lacrosse','2024-01-04 13:00:02','2024-01-04 13:00:02'),(4,'Hockey','2024-01-04 13:00:02','2024-01-04 13:00:02');
/*!40000 ALTER TABLE `program_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `coach_id` bigint unsigned NOT NULL,
  `program_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_students` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_fields` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `program_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `trash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_attachments`
--

DROP TABLE IF EXISTS `student_attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_attachments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_attachments`
--

LOCK TABLES `student_attachments` WRITE;
/*!40000 ALTER TABLE `student_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graduation_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_town` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `short_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_honors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_rank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `core_gpa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gpa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grad_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardians_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `high_school_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transcript` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intended_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered_with_ncaa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ncaa_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sat_math` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sat_reading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sat_writing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sat_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_honor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_interest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,1,'Admin','',NULL,NULL,NULL,NULL,'default.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2024-01-04 13:01:23','2024-01-04 13:01:23'),(2,3,'studend','',NULL,NULL,NULL,NULL,'default.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2024-01-05 05:57:15','2024-01-05 05:57:15'),(3,5,'Matthew','Cholod','2026','Bowmanville','Bowmanville','Canada','default.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male',NULL,NULL,NULL,NULL,'8597577480','8597577480','3 Andelwood Crt','Darlene Cholod','Holy Trinity',NULL,'Marketing','Yes','12345','20','20','20','20','80','25','25','I like playing hockey.','active','2024-01-05 23:15:05','2024-01-05 23:18:16');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'coach',
  `is_profile_completed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not-completed',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin','not-completed','admin@admin.com',NULL,'$2y$10$OiKLElTMWKGwk4a8/Sl3FeuZWF./66E7u1Klk.uGzvRjVNGnnn5F.','active',NULL,'2024-01-04 13:01:23','2024-01-04 13:01:23'),(2,'Shoukat','coach','not-completed','shoukat.bjr@gmail.com',NULL,'$2y$10$BDouPACc/irOJitgzNld1OfmItFIELQVeU4O6mGElOdO78cFrU3Eu','active','bUrVPrAodh1XggqiJQL2XgrsXrWO512h4unuXy7a7q97LRqj6Lp9W5vlC1rI','2024-01-05 05:54:26','2024-01-05 05:55:24'),(3,'studend','student','not-completed','student@student.com',NULL,'$2y$10$Fh/Yk9Qum.3r52dYBdFBauWQSTmSwoj7Lw277At9.sq5cvFE8ynE6','active',NULL,'2024-01-05 05:57:15','2024-01-05 05:57:15'),(4,'Test','coach','not-completed','test@coach.com',NULL,'$2y$10$ExOeSnZ97jL6Hptm9hm4uekTZovDBwJReB2yWEGe8HT0frOcMTd.y','active','G0yFXitAupKn5BEyWexcmPtSVfNfuypNSRPt6a3KHrQ8uYWkVSrFDgHL1lYf','2024-01-05 05:59:50','2024-01-05 06:02:21'),(5,'Matthew','student','completed','caddylink1@gmail.com',NULL,'$2y$10$J2xWQgkzfyPvC/b/5MNT..rrp4us2.Gk.NM250UbgBrvcbYuu0EHm','active',NULL,'2024-01-05 23:15:05','2024-01-05 23:18:17'),(6,'Matt','coach','not-completed','matt.caddylink@gmail.com',NULL,'$2y$10$NgGI/l0JKNYi2L9L56k5yeyuKeJo6RoQxJOMVW4zPhPR/qZedTpka','active',NULL,'2024-01-05 23:22:51','2024-01-05 23:22:51'),(7,'Test','coach','not-completed','test@gmail.com',NULL,'$2y$10$kS4GHfDhALlrjMLO.LcCeeL2bkvTdUT4evEI2mP/bjYDa8Ysv3/Ne','active',NULL,'2024-01-08 06:59:38','2024-01-08 06:59:38');
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

-- Dump completed on 2024-01-23 10:14:57
