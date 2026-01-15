/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.0.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: sipetak
-- ------------------------------------------------------
-- Server version	12.0.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id_admin` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$12$ruRGrvR0ZMP0mBt0f4GG3effr95A0B4tnGgzaX5q4mkc039Az79h.',
  `photo` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `cache` VALUES
('sipetak-cache-ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4','i:1;',1760660664),
('sipetak-cache-ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4:timer','i:1760660664;',1760660664);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `desa`
--

DROP TABLE IF EXISTS `desa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `desa` (
  `id_desa` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `id_kecamatan` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_desa`),
  KEY `desa_id_kecamatan_foreign` (`id_kecamatan`),
  CONSTRAINT `desa_id_kecamatan_foreign` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desa`
--

LOCK TABLES `desa` WRITE;
/*!40000 ALTER TABLE `desa` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `desa` VALUES
(1,'Baula',1,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(2,'Longori',1,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(3,'Pewutaa',1,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(4,'Puubenua',1,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(5,'Puubunga',1,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(6,'Puulemo',1,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(7,'Puundoho',1,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(8,'Puuroda',1,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(9,'Ulu Baula',1,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(10,'Watalara',1,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(11,'Iwoimendaa',2,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(12,'Ladahai',2,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(13,'Lambopini',2,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(14,'Landoula',2,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(15,'Lasiroku',2,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(16,'Lawolia',2,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(17,'Tamborasi',2,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(18,'Ulu Kalo',2,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(19,'Watumelewe',2,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(20,'Wonualaku',2,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(21,'Balandete',3,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(22,'Laloeha',3,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(23,'Lalombaa',3,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(24,'Lamokato',3,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(25,'Sabilambo',3,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(26,'Tahoa',3,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(27,'Watuliandu',3,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(28,'Induha',4,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(29,'Kolakaasi',4,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(30,'Latambaga',4,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(31,'Mangolo',4,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(32,'Sakuli',4,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(33,'Sea',4,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(34,'Ulunggolaka',4,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(35,'Lamondape',5,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(36,'Plasma Jaya',5,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(37,'Polinggona',5,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(38,'Pondowae',5,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(39,'Puudongi',5,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(40,'Tanggeau',5,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(41,'Wulonggere',5,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(42,'Dawi-Dawi',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(43,'Hakatutobu',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(44,'Huko-Huko',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(45,'Kumoro',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(46,'Oko-Oko',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(47,'Pelambua',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(48,'Pesouha',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(49,'Pomalaa',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(50,'Sopura',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(51,'Tambea',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(52,'Tonggoni',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(53,'Totobo',6,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(54,'Amamutu',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(55,'Awa',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(56,'Kaloloa',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(57,'Konaweha',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(58,'Lambolemo',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(59,'Latuo',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(60,'Lawulo',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(61,'Liku',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(62,'Malaha',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(63,'Meura',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(64,'Puu Lawulo',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(65,'Puu Tamboli',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(66,'Sani-sani',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(67,'Tamboli',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(68,'Tonganapo',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(69,'Tosiba',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(70,'Ulaweng',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(71,'Ulu Konaweha',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(72,'Wawo Tambali',7,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(73,'Anaiwoi',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(74,'Lalonggolosua',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(75,'Lamedai',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(76,'Lamoiko',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(77,'Oneeha',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(78,'Palewai',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(79,'Petudua',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(80,'Pewisoa Jaya',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(81,'Popalia',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(82,'Puundaipa',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(83,'Rahanggada',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(84,'Tanggetada',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(85,'Tinggo',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(86,'Tondowolio',8,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(87,'Anawua',9,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(88,'Horongkuli',9,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(89,'Lakito',9,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(90,'Rahabite',9,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(91,'Rano Jaya',9,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(92,'Rano Sangia',9,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(93,'Ranomentaa',9,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(94,'Toari',9,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(95,'Wonua Raya',9,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(96,'Wowoli',9,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(97,'Gunung Sari',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(98,'Kastura',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(99,'Kukutio',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(100,'Lamundre',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(101,'Langgosipi',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(102,'Mataosu',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(103,'Mataosu Ujung',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(104,'Peoho',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(105,'Polenga',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(106,'Ranoteta',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(107,'Sumber Rejeki',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(108,'Tandebura',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(109,'Watubangga',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(110,'Wolulu',10,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(111,'Donggala',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(112,'Iwoimopuro',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(113,'Lalonaha',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(114,'Lalonggopi',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(115,'Lana',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(116,'Langgomali',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(117,'Lapao-Pao',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(118,'Muara Lapao-Pao',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(119,'Samaenre',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(120,'Tolowe Ponrewaru',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(121,'Ulu Rina',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(122,'Ulu Wolo',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(123,'Ululapao-pao',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(124,'Wolo',11,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(125,'19 Nopember',12,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(126,'Bende',12,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(127,'Kowioha',12,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(128,'Lamekongga',12,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(129,'Ngapa',12,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(130,'Sabiano',12,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(131,'Silea',12,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(132,'Tikonu',12,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(133,'Towua',12,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(134,'Unamendaa',12,'2025-10-13 07:07:43','2025-10-13 07:07:43'),
(135,'Wundulako',12,'2025-10-13 07:07:43','2025-10-13 07:07:43');
/*!40000 ALTER TABLE `desa` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `detail_laporan_serangan`
--

DROP TABLE IF EXISTS `detail_laporan_serangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_laporan_serangan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_laporan_serangan` bigint(20) unsigned NOT NULL,
  `id_penyebab_serangan` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_laporan_serangan_id_laporan_serangan_foreign` (`id_laporan_serangan`),
  KEY `detail_laporan_serangan_id_penyebab_serangan_foreign` (`id_penyebab_serangan`),
  CONSTRAINT `detail_laporan_serangan_id_laporan_serangan_foreign` FOREIGN KEY (`id_laporan_serangan`) REFERENCES `laporan_serangan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detail_laporan_serangan_id_penyebab_serangan_foreign` FOREIGN KEY (`id_penyebab_serangan`) REFERENCES `penyebab_serangan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_laporan_serangan`
--

LOCK TABLES `detail_laporan_serangan` WRITE;
/*!40000 ALTER TABLE `detail_laporan_serangan` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `detail_laporan_serangan` VALUES
(1,1,4,NULL,NULL),
(2,1,3,NULL,NULL),
(3,1,2,NULL,NULL);
/*!40000 ALTER TABLE `detail_laporan_serangan` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `kecamatan` (
  `id_kecamatan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatan`
--

LOCK TABLES `kecamatan` WRITE;
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `kecamatan` VALUES
(1,'Baula','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(2,'Iwoimendaa','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(3,'Kolaka','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(4,'Latambaga','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(5,'Polinggona','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(6,'Pomalaa','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(7,'Samaturu','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(8,'Tanggetada','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(9,'Toari','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(10,'Watubangga','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(11,'Wolo','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(12,'Wundulako','2025-10-13 07:07:43','2025-10-13 07:07:43');
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `kepala_dinas`
--

DROP TABLE IF EXISTS `kepala_dinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `kepala_dinas` (
  `id_kepala_dinas` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kepala_dinas` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$12$38TaQW2.mKJtODx3egX2cOtNSeNlzfJ34zcAF3QTw2vAD9RqfoUNa',
  `telepon` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kepala_dinas`),
  UNIQUE KEY `kepala_dinas_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kepala_dinas`
--

LOCK TABLES `kepala_dinas` WRITE;
/*!40000 ALTER TABLE `kepala_dinas` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `kepala_dinas` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `laporan_serangan`
--

DROP TABLE IF EXISTS `laporan_serangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporan_serangan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_tanaman` bigint(20) unsigned NOT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('Menunggu','Sedang Diproses','Selesai','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laporan_serangan_id_tanaman_foreign` (`id_tanaman`),
  KEY `laporan_serangan_id_user_foreign` (`id_user`),
  CONSTRAINT `laporan_serangan_id_tanaman_foreign` FOREIGN KEY (`id_tanaman`) REFERENCES `tanaman` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laporan_serangan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_serangan`
--

LOCK TABLES `laporan_serangan` WRITE;
/*!40000 ALTER TABLE `laporan_serangan` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `laporan_serangan` VALUES
(1,1,5,'2025-10-17','fda','Menunggu','2025-10-16 16:11:44','2025-10-16 16:11:44');
/*!40000 ALTER TABLE `laporan_serangan` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `migrations` VALUES
(1,'0000_08_04_072911_create_kecamatan_table',1),
(2,'0000_08_04_072912_create_desa_table',1),
(3,'0001_01_01_000000_create_users_table',1),
(4,'0001_01_01_000001_create_cache_table',1),
(5,'0001_01_01_000002_create_jobs_table',1),
(6,'0001_02_22_015547_create_admin_table',1),
(7,'0001_02_22_015639_create_kepala_dinas_table',1),
(8,'2025_08_27_012621_create_tanaman_table',1),
(9,'2025_10_08_009999_create_laporan_serangans_table',1),
(10,'2025_10_08_100000_create_penanganans_table',1),
(11,'2025_10_08_129998_create_penyebab_serangans_table',1),
(12,'2025_10_08_130000_create_detail_laporan_serangans_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `penanganan`
--

DROP TABLE IF EXISTS `penanganan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `penanganan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `id_laporan_serangan` bigint(20) unsigned NOT NULL,
  `isi_penanganan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penanganan_id_user_foreign` (`id_user`),
  KEY `penanganan_id_laporan_serangan_foreign` (`id_laporan_serangan`),
  CONSTRAINT `penanganan_id_laporan_serangan_foreign` FOREIGN KEY (`id_laporan_serangan`) REFERENCES `laporan_serangan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `penanganan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penanganan`
--

LOCK TABLES `penanganan` WRITE;
/*!40000 ALTER TABLE `penanganan` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `penanganan` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `penyebab_serangan`
--

DROP TABLE IF EXISTS `penyebab_serangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `penyebab_serangan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penyebab_serangan`
--

LOCK TABLES `penyebab_serangan` WRITE;
/*!40000 ALTER TABLE `penyebab_serangan` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `penyebab_serangan` VALUES
(1,'Madilyn Conroy','Suscipit assumenda quod fuga nam est nihil. Maxime rerum et tempora ut. Ut quibusdam vitae nihil et est pariatur alias.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(2,'Dr. Harley Predovic','Et nobis animi quas deserunt ut sunt excepturi nihil. Culpa qui cumque repellendus sint nam laborum. Et officia rem commodi ullam dolorem laborum. Nihil quos est harum voluptatem aut nihil sint non.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(3,'Dr. Madison Mohr PhD','Molestias eum et eum enim. Quasi quod eum labore molestias blanditiis et. Ducimus quibusdam consectetur dolorem nemo alias possimus optio. Et labore aut vel omnis. Quam debitis esse accusamus eos.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(4,'Jerel Weissnat','Quidem corporis quod occaecati voluptas. Quas vel et neque voluptates. Qui incidunt nemo recusandae dicta qui. Eaque numquam consectetur quos.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(5,'Leann Erdman IV','Maiores voluptas et asperiores voluptas. Qui voluptates tenetur vitae enim. Vitae quis voluptatum odit dolores necessitatibus id beatae quidem.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(6,'Pietro Bartell DDS','Repudiandae eos dolor ipsum autem repellat porro. Non accusantium dolores beatae consequatur et qui iure. Veniam sit nihil sed ut.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(7,'Hardy Runolfsson','Eaque eligendi tenetur aut dolorum autem illo suscipit. Autem qui quae sed qui quisquam facere enim. Ad ut minima ea quos. Earum tempore voluptatibus et quis eveniet quam.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(8,'Shayna Ernser DDS','Provident omnis unde debitis. Optio autem veritatis aspernatur quidem ut sit aut sed. Ea et beatae magnam rem dolorem ut beatae.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(9,'Miss Laurence Bradtke','Maxime occaecati minima aliquid. Nulla similique molestias dolore aliquam. Quia sed omnis dolor neque est voluptatem fuga.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(10,'Peggie Hyatt','Ad officia et debitis non. Doloremque ipsum molestiae aperiam sit vitae qui. Illo eos ut tempore quibusdam earum dignissimos excepturi.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(11,'Dr. Avis Weber IV','Accusamus praesentium eum voluptas ratione officia nisi. Libero vel qui et fuga dignissimos. Et quo sunt a dolor possimus assumenda.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(12,'Prof. Gustave Flatley Sr.','Ex assumenda quidem culpa voluptas rerum aut molestiae. Nesciunt quod omnis magni architecto suscipit amet.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(13,'Claudia Bauch','Exercitationem alias quibusdam vel et repellat autem. In praesentium consequuntur aut ipsam aut dolorem. Incidunt inventore praesentium delectus odio ipsa praesentium.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(14,'Marianna Nader','Sed nemo eos iusto ducimus distinctio maiores distinctio. Numquam quis quidem nemo est voluptatem unde sit. Perferendis non doloribus ex et expedita. Cumque quos porro quam nobis ex odit est.','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(15,'Ms. Ressie Cartwright','Et sapiente quis exercitationem dolorem eum. Explicabo natus et dolore minima vel est libero. Quo odio consectetur ea enim omnis dolorem.','2025-10-13 07:07:44','2025-10-13 07:07:44');
/*!40000 ALTER TABLE `penyebab_serangan` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `sessions` VALUES
('gBsUujUOAHWtADWl9nIVYM4guca8gL5epTlC022k',4,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:143.0) Gecko/20100101 Firefox/143.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV2NrUnQ1VEhOTWhIaGRlckRydHg0VzdVdXIxalJudnRZMlNSb3ZmYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=',1760660428),
('jYn3oQkVzhqtkXVx8itKTLKo71n3l3JvS0tGYOiM',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:143.0) Gecko/20100101 Firefox/143.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoidkp3ZDJkWmYwY1JMM1pTYWcyNzFDNnM4c1pJckl3MzBiV1o2YmgwYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=',1760660610),
('vAW6A6vQikFrFuWEDyX6w3jadFytaYXUfHT9owIO',2,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:143.0) Gecko/20100101 Firefox/143.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSXRjTmM1aG1ZZXpzNFJSQW1rd0w4cldpVFA2VFM5cTFJWjlQUjlnYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jZXRhay1sYXBvcmFuL2xhcG9yYW4tc2VyYW5nYW4vMSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==',1760661201),
('wpgJQNztCc4Tq7woTPxmUYMHYL2E75ylPpNjCS6P',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:143.0) Gecko/20100101 Firefox/143.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaW5PVFVJcEFKeXZweHpVYmN5ckNsRFFGV1Nld1Q4bU85aGNOUGFYZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC93aWxheWFoIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1761447165);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tanaman`
--

DROP TABLE IF EXISTS `tanaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tanaman` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_tanaman` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tanaman`
--

LOCK TABLES `tanaman` WRITE;
/*!40000 ALTER TABLE `tanaman` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tanaman` VALUES
(1,'Padi','Dolorem ad accusamus dolores omnis optio dolore sapiente.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(2,'Jagung','Est error atque facilis nam exercitationem.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(3,'Kedelai','Molestias rerum ullam magni qui debitis veritatis.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(4,'Kacang Tanah','Reprehenderit voluptates quasi ex commodi consectetur.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(5,'Kacang Hijau','Numquam molestiae dolore magni iste.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(6,'Ubi Kayu (Singkong)','Et non vitae eum et qui a.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(7,'Ubi Jalar','Minus voluptas sunt omnis facere molestias.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(8,'Kentang','A perspiciatis aut natus repellendus.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(9,'Talas','Sed qui ad accusantium voluptatem voluptas.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(10,'Gandum','Fuga ea consequatur ex inventore.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(11,'Kapas','Minima excepturi animi quis.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(12,'Tembakau','Sint quidem reprehenderit distinctio velit modi nulla dignissimos.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(13,'Kakao','Corrupti exercitationem eum vero sed rem exercitationem.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(14,'Kopi','Qui rerum consequatur fuga perferendis ipsa.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(15,'Teh','Blanditiis unde ut minus quod libero earum consequatur.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(16,'Kelapa','Consequatur et suscipit saepe velit accusamus et.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(17,'Sawit (Kelapa Sawit)','Blanditiis et ipsam harum ex.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(18,'Karet (Getah)','Molestias nobis quibusdam et necessitatibus.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(19,'Cengkeh','Dolorum est ut nisi voluptatem.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(20,'Pala','Nihil ipsam ut nisi aut.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(21,'Vanili','Quis dicta quod quos sit.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(22,'Lada (Merica)','Optio qui et sunt asperiores pariatur nihil delectus.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(23,'Jahe','Atque ut qui iusto asperiores et autem delectus.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(24,'Kunyit','Perspiciatis voluptatum aut velit magni.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44'),
(25,'Cabe (Cabai)','Consequatur vel voluptates dolorem est.',NULL,'2025-10-13 07:07:44','2025-10-13 07:07:44');
/*!40000 ALTER TABLE `tanaman` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `role` enum('Admin','Petani','Penyuluh','Kepala Dinas') NOT NULL DEFAULT 'Petani',
  `id_desa` bigint(20) unsigned NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_desa_foreign` (`id_desa`),
  CONSTRAINT `users_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(1,'Admin','admin@gmail.com','$2y$12$G6dDcAnJXUPUAyZ3SnOWI.7GdCZkHVt/BA45R20bVrcsM9BGgXEvW','081234567890','Admin',1,NULL,'qJiDl8d3Gh7bn4SfgcveJCrJF3juhpQSN4WiyaqgTt4e0OlaA41ybqzqLBZi','2025-10-13 07:07:43','2025-10-13 07:07:43'),
(2,'Kepala Dinas','kepaladinas@gmail.com','$2y$12$ZSOiE/osqaxJnfE/jrwOV.wvctxs2ylIx9xtaSZN/r2F.NDGr.1kS','10010101','Kepala Dinas',1,NULL,'ufuAFthJLYEykC9NkME4VumgxUQ5WHwpJ94MqiFsFwFWvg3zqi3jk3yOBhys','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(3,'Kepala Dinas','penyuluh@gmail.com','$2y$12$tywk6PWyhHkTerfIp0txhu17wirzeGNanmaoqeK70QgZjh/8LhCo6','10010101001','Penyuluh',1,NULL,'Z7AwZoLcSTuBd1unDjciT5SoiQNCW7eoSvREAz1xtHpxLSp2AIRLibBppkUp','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(4,'Petani 1','petani1@gmail.com','$2y$12$7YBc5U6pCq6iru7VrfvRseS1VH0UsvlUo4/q6mFKJ7DfJh1qgJYli','10010101001','Petani',1,NULL,'yGkEjcMpjzNwZsjW6kNrxEjl3ubdE3xdiy3fpOPerYc8tk7tKT3uAZCO8byS','2025-10-13 07:07:44','2025-10-13 07:07:44'),
(5,'Petani 2','petani2@gmail.com','$2y$12$56RB2r35fEvNNJ/nXLqF0eWYa2MvxjTC/AXFpSN6DooKZG09BfSuu','08100101001','Petani',1,'photos/FLx59vLOW85Edfq76BvXPtODxDZvkkTi1iDlJP1h.png','zLrsVgnANLLsnhlh0GAoGO5tEM6Hb9Ru3VlEyRCA3YRkaCxenZj9IaOdhtPP','2025-10-13 07:07:44','2025-10-16 16:23:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-10-31 19:44:39
