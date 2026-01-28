/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.1.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: sipetak
-- ------------------------------------------------------
-- Server version	12.1.2-MariaDB

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
  `password` varchar(255) NOT NULL DEFAULT '$2y$12$5/MdXf/Qa7Ag.ZYRBOUhp.jGrfjl4QpQQEqtiphL7gv0U2filCxmC',
  `photo` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `admin` VALUES
(1,'Admin','admin@gmail.com','$2y$12$QJlCip9re/mGFiHEfcgTmefvW8IOisT4vxX90j2LBBZ0JUHZXi1Ru',NULL,NULL,'aWn5ZOuG0l9ksujmsoJY7iMYw0yRflrskaW189TjWrAO2JUUxgkMLT2h37pC','2026-01-21 06:01:29','2026-01-21 06:01:29');
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
('sipanen-cache-5c785c036466adea360111aa28563bfd556b5fba','i:2;',1769177028),
('sipanen-cache-5c785c036466adea360111aa28563bfd556b5fba:timer','i:1769177028;',1769177028);
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
(1,'Baula',1,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(2,'Longori',1,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(3,'Pewutaa',1,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(4,'Puubenua',1,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(5,'Puubunga',1,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(6,'Puulemo',1,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(7,'Puundoho',1,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(8,'Puuroda',1,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(9,'Ulu Baula',1,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(10,'Watalara',1,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(11,'Iwoimendaa',2,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(12,'Ladahai',2,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(13,'Lambopini',2,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(14,'Landoula',2,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(15,'Lasiroku',2,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(16,'Lawolia',2,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(17,'Tamborasi',2,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(18,'Ulu Kalo',2,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(19,'Watumelewe',2,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(20,'Wonualaku',2,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(21,'Balandete',3,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(22,'Laloeha',3,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(23,'Lalombaa',3,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(24,'Lamokato',3,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(25,'Sabilambo',3,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(26,'Tahoa',3,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(27,'Watuliandu',3,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(28,'Induha',4,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(29,'Kolakaasi',4,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(30,'Latambaga',4,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(31,'Mangolo',4,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(32,'Sakuli',4,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(33,'Sea',4,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(34,'Ulunggolaka',4,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(35,'Lamondape',5,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(36,'Plasma Jaya',5,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(37,'Polinggona',5,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(38,'Pondowae',5,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(39,'Puudongi',5,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(40,'Tanggeau',5,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(41,'Wulonggere',5,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(42,'Dawi-Dawi',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(43,'Hakatutobu',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(44,'Huko-Huko',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(45,'Kumoro',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(46,'Oko-Oko',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(47,'Pelambua',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(48,'Pesouha',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(49,'Pomalaa',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(50,'Sopura',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(51,'Tambea',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(52,'Tonggoni',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(53,'Totobo',6,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(54,'Amamutu',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(55,'Awa',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(56,'Kaloloa',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(57,'Konaweha',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(58,'Lambolemo',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(59,'Latuo',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(60,'Lawulo',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(61,'Liku',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(62,'Malaha',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(63,'Meura',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(64,'Puu Lawulo',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(65,'Puu Tamboli',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(66,'Sani-sani',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(67,'Tamboli',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(68,'Tonganapo',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(69,'Tosiba',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(70,'Ulaweng',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(71,'Ulu Konaweha',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(72,'Wawo Tambali',7,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(73,'Anaiwoi',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(74,'Lalonggolosua',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(75,'Lamedai',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(76,'Lamoiko',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(77,'Oneeha',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(78,'Palewai',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(79,'Petudua',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(80,'Pewisoa Jaya',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(81,'Popalia',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(82,'Puundaipa',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(83,'Rahanggada',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(84,'Tanggetada',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(85,'Tinggo',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(86,'Tondowolio',8,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(87,'Anawua',9,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(88,'Horongkuli',9,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(89,'Lakito',9,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(90,'Rahabite',9,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(91,'Rano Jaya',9,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(92,'Rano Sangia',9,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(93,'Ranomentaa',9,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(94,'Toari',9,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(95,'Wonua Raya',9,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(96,'Wowoli',9,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(97,'Gunung Sari',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(98,'Kastura',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(99,'Kukutio',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(100,'Lamundre',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(101,'Langgosipi',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(102,'Mataosu',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(103,'Mataosu Ujung',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(104,'Peoho',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(105,'Polenga',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(106,'Ranoteta',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(107,'Sumber Rejeki',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(108,'Tandebura',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(109,'Watubangga',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(110,'Wolulu',10,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(111,'Donggala',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(112,'Iwoimopuro',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(113,'Lalonaha',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(114,'Lalonggopi',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(115,'Lana',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(116,'Langgomali',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(117,'Lapao-Pao',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(118,'Muara Lapao-Pao',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(119,'Samaenre',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(120,'Tolowe Ponrewaru',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(121,'Ulu Rina',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(122,'Ulu Wolo',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(123,'Ululapao-pao',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(124,'Wolo',11,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(125,'19 Nopember',12,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(126,'Bende',12,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(127,'Kowioha',12,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(128,'Lamekongga',12,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(129,'Ngapa',12,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(130,'Sabiano',12,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(131,'Silea',12,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(132,'Tikonu',12,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(133,'Towua',12,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(134,'Unamendaa',12,'2026-01-21 06:01:28','2026-01-21 06:01:28'),
(135,'Wundulako',12,'2026-01-21 06:01:28','2026-01-21 06:01:28');
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
  UNIQUE KEY `detail_laporan_unique` (`id_laporan_serangan`,`id_penyebab_serangan`),
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
(1,5,17,'2026-01-28 00:38:55','2026-01-28 00:38:55'),
(2,5,22,'2026-01-28 00:38:55','2026-01-28 00:38:55'),
(3,5,16,'2026-01-28 00:38:55','2026-01-28 00:38:55');
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
(1,'Baula','2026-01-21 06:01:28','2026-01-21 06:01:28'),
(2,'Iwoimendaa','2026-01-21 06:01:28','2026-01-21 06:01:28'),
(3,'Kolaka','2026-01-21 06:01:28','2026-01-21 06:01:28'),
(4,'Latambaga','2026-01-21 06:01:28','2026-01-21 06:01:28'),
(5,'Polinggona','2026-01-21 06:01:28','2026-01-21 06:01:28'),
(6,'Pomalaa','2026-01-21 06:01:28','2026-01-21 06:01:28'),
(7,'Samaturu','2026-01-21 06:01:28','2026-01-21 06:01:28'),
(8,'Tanggetada','2026-01-21 06:01:28','2026-01-21 06:01:28'),
(9,'Toari','2026-01-21 06:01:28','2026-01-21 06:01:28'),
(10,'Watubangga','2026-01-21 06:01:28','2026-01-21 06:01:28'),
(11,'Wolo','2026-01-21 06:01:28','2026-01-21 06:01:28'),
(12,'Wundulako','2026-01-21 06:01:28','2026-01-21 06:01:28');
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
  `password` varchar(255) NOT NULL DEFAULT '$2y$12$QrDUUB19LN6kz6XsyGcYJe.9jy0rcWux50s0sw9e6KHFprto3ijku',
  `telepon` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kepala_dinas`),
  UNIQUE KEY `kepala_dinas_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kepala_dinas`
--

LOCK TABLES `kepala_dinas` WRITE;
/*!40000 ALTER TABLE `kepala_dinas` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `kepala_dinas` VALUES
(1,'Kepala Dinas','kepaladinas@gmail.com','$2y$12$tHL/X1p8UNcp4uxCja/rKenckRimmH2N01XPA9Y6LY1F1lIWNuvNW','10010101','1980-01-01',NULL,NULL,'onCqnuGXj9gSS2Ap7ERc4UvbztFEcvfx7dW3RL71rEE3CzGQCMl40o0epliV','2026-01-21 06:01:29','2026-01-21 06:01:29');
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
  `id_petani` bigint(20) unsigned NOT NULL,
  `id_kepala_dinas` bigint(20) unsigned DEFAULT NULL,
  `tanggal_laporan` date NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('Menunggu','Sedang Diproses','Selesai','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laporan_serangan_id_tanaman_foreign` (`id_tanaman`),
  KEY `laporan_serangan_id_petani_foreign` (`id_petani`),
  KEY `laporan_serangan_id_kepala_dinas_foreign` (`id_kepala_dinas`),
  CONSTRAINT `laporan_serangan_id_kepala_dinas_foreign` FOREIGN KEY (`id_kepala_dinas`) REFERENCES `kepala_dinas` (`id_kepala_dinas`) ON DELETE SET NULL,
  CONSTRAINT `laporan_serangan_id_petani_foreign` FOREIGN KEY (`id_petani`) REFERENCES `petani` (`id_petani`) ON DELETE CASCADE,
  CONSTRAINT `laporan_serangan_id_tanaman_foreign` FOREIGN KEY (`id_tanaman`) REFERENCES `tanaman` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_serangan`
--

LOCK TABLES `laporan_serangan` WRITE;
/*!40000 ALTER TABLE `laporan_serangan` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `laporan_serangan` VALUES
(1,30,1,NULL,'2026-01-23','rusak daun','Menunggu','2026-01-23 06:13:24','2026-01-23 06:13:24'),
(2,31,1,NULL,'2026-01-23','bercak daun','Menunggu','2026-01-23 06:14:12','2026-01-23 06:14:12'),
(3,29,1,NULL,'2026-01-23','busuk buah','Menunggu','2026-01-23 06:17:32','2026-01-23 06:17:32'),
(4,30,1,NULL,'2026-01-27','ubat daun','Selesai','2026-01-27 04:37:25','2026-01-27 04:44:36'),
(5,30,1,NULL,'2026-01-28','fdafda','Menunggu','2026-01-28 00:38:55','2026-01-28 00:38:55');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
(3,'0001_01_01_000000_create_petani_table',1),
(4,'0001_01_01_000001_create_cache_table',1),
(5,'0001_01_01_000001_create_penyuluh_table',1),
(6,'0001_01_01_000002_create_jobs_table',1),
(7,'0001_02_22_015547_create_admin_table',1),
(8,'0001_02_22_015639_create_kepala_dinas_table',1),
(9,'2025_08_27_012621_create_tanaman_table',1),
(10,'2025_10_08_009999_create_laporan_serangans_table',1),
(11,'2025_10_08_100000_create_penanganans_table',1),
(12,'2025_10_08_129998_create_penyebab_serangans_table',1),
(13,'2025_10_08_130001_add_kepala_dinas_to_laporan_serangan_table',1),
(14,'2025_10_08_130002_add_admin_to_penanganan_table',1),
(15,'2026_01_17_210000_add_tipe_to_penyebab_serangan_table',1),
(16,'2026_01_21_210000_add_admin_to_penyebab_serangan_and_tanaman',1),
(17,'2026_01_28_094800_create_detail_laporan_serangan_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
  `id_admin` bigint(20) unsigned DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe` enum('hama','penyakit') NOT NULL DEFAULT 'hama',
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penyebab_serangan_id_admin_foreign` (`id_admin`),
  CONSTRAINT `penyebab_serangan_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penyebab_serangan`
--

LOCK TABLES `penyebab_serangan` WRITE;
/*!40000 ALTER TABLE `penyebab_serangan` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `penyebab_serangan` VALUES
(16,NULL,'Keong Mas','hama','1. Hama : Keong Mas\nGejala:\nGejala kerusakan yang ditimbulkan yaitu tanaman muda dimakan hingga habis sehingga banyak rumpun hilang. Satu batang padi dapat habis dimakan seekor keong dalam waktu 3–5 menit.\nSolusi:\n1. Pada saat awal pertanaman, yaitu umur padi 0–25 hari, lahan sawah perlu dikeringkan dalam keadaan macak-macak agar keong tidak dapat merayap menuju rumpun padi yang akan diserang. \nKalaupun terjadi serangan, persentasenya masih berada di bawah ambang kerusakan.\n2. Pembuatan parit di sekeliling lahan pertanaman agar keong dapat berkumpul, kemudian dimusnahkan.\n3. Pengendalian secara kimiawi.','2026-01-23 05:03:04','2026-01-23 05:03:04'),
(17,NULL,'Penggerek Batang','hama','\nGejala:\nGejala kerusakan yang ditimbulkan mengakibatkan anakan mati atau sering disebut sundep pada tanaman stadia vegetatif, dan beluk (malai hampa) pada tanaman stadia generatif.\nGejala sundep ditandai dengan daun menguning, mengering, dan mati serta anakan menjadi kerdil.\nSedangkan gejala beluk ditandai dengan malai padi berwarna coklat dan kering, gabah hampa, serta batang mudah dicabut karena mudah terlepas.\nSolusi:\n1. Tanam serempak.\n2. Pengumpulan kelompok telur.\n3. Aplikasi pestisida secara tepat.\n4. Spot treatment pada tanaman yang bergejala.\n5. Aplikasi agen hayati parasitoid telur (Trichogramma sp.).','2026-01-23 05:04:24','2026-01-23 05:04:24'),
(18,NULL,'Walang Sangit','hama','Gejala:\nKerusakan yang ditimbulkan menyebabkan beras berubah warna dan mengapung, serta menjadi hampa. Ambang ekonomi hama walang sangit adalah lebih dari satu ekor walang sangit per dua rumpun pada masa keluar malai sampai fase pembungaan.\nSolusi:\n1. Kendalikan gulma di sawah dan di sekitar pertanaman.\n2. Pemupukan lahan secara merata agar pertumbuhan tanaman seragam.\n3. Menangkap walang sangit menggunakan jaring sebelum stadia pembungaan.\n4. Pemberian umpan walang sangit menggunakan ikan busuk, daging yang sudah rusak, atau kotoran ayam.\n5. Apabila serangan mencapai ambang ekonomi, lakukan penyemprotan insektisida.\n6. Penyemprotan dilakukan pada pagi hari atau sore hari saat walang sangit berada di kanopi tanaman.','2026-01-23 05:06:23','2026-01-23 05:06:23'),
(19,NULL,'Penyakit HBD (Hawar Bakteri Daun) atau Kresek','penyakit','\nGejala:\nGejala kresek dimulai dari tepi daun yang berwarna keabu-abuan dan lama-kelamaan daun menjadi kering. Bagian yang kering akan semakin meluas ke arah tulang daun hingga seluruh daun tampak mengering.\nSolusi:\n1. Menggunakan benih dan bibit sehat.\n2. Menggunakan agen hayati Corynebacterium atau 3. Paenibacillus polymyxa pada benih umur 14, 28, dan 42 HST dengan dosis 5 cc per liter.\n3. Melakukan pemupukan berimbang, menghindari pemupukan nitrogen (N) berlebihan, serta mencukupi unsur fosfor (P) dan kalium (K).\n4. Menghindari pemupukan saat tanaman memasuki fase bunting.\n5. Melakukan sanitasi lingkungan dan pengendalian gulma inang.\n6. Melakukan pengairan berselang (satu hari digenangi dan tiga hari dikeringkan).','2026-01-23 05:07:01','2026-01-23 05:08:17'),
(20,NULL,'Penyakit Blast','penyakit','\nGejala:\nGejala khas pada daun berupa bercak berbentuk belah ketupat, lebar di bagian tengah dan meruncing di kedua ujungnya. Ukuran bercak sekitar 1–1,5 × 0,3–0,5 cm dan berkembang menjadi berwarna abu-abu pada bagian tengahnya.\nApabila infeksi terjadi pada ruas batang dan leher malai (neck blast), leher malai yang terinfeksi akan berubah menjadi kehitam-hitaman dan mudah patah, mirip dengan gejala beluk akibat serangan penggerek batang.\nsolusi:\n1. Gunakan varietas tahan blast secara bergantian.\n2. Gunakan pupuk nitrogen sesuai anjuran.\n3. Upayakan waktu tanam yang tepat agar pada awal pembungaan tidak terjadi banyak embun dan hujan terus-menerus.\n4. Gunakan fungisida berbahan aktif metil tiofanat atau fosdif en dan kasugamisin.','2026-01-23 05:09:34','2026-01-23 05:09:34'),
(21,NULL,'Thrips','hama','\nGejala:\nGejala serangan berupa adanya bercak keperak-perakan pada permukaan bawah daun. Pada serangan berat dapat menyebabkan daun, tunas, atau pucuk menggulung ke dalam sehingga pertumbuhan tanaman terhambat dan menjadi kerdil.\nSolusi:\nPengendalian hama thrips dapat dilakukan dengan menggunakan tanaman perangkap (kenikir kuning), mulsa perak, sanitasi lingkungan dengan memotong bagian tanaman yang terserang, serta penggunaan perangkap kuning dan pemanfaatan musuh alami.\nPenggunaan insektisida dapat dilakukan apabila serangan berlanjut, yaitu dengan penyemprotan abamectin (Agrimec 18 EC) dengan dosis 0,5 ml/liter.','2026-01-23 05:10:34','2026-01-23 05:10:34'),
(22,NULL,'Kutu Kebul','hama','\nGejala:\nGejala serangan berupa bercak nekrotik pada permukaan bawah daun. Embun madu yang dikeluarkan oleh kutu kebul dapat menimbulkan serangan jamur jelaga yang berwarna hitam.\nSolusi:\nPengendalian dapat dilakukan dengan pemanfaatan musuh alami, yaitu predator Menochilus sexmaculatus, parasitoid Encarsia adrianae, dan patogen Bacillus thuringiensis.\nSelain itu dapat digunakan perangkap kuning, tanaman perangkap (jagung), sistem tumpang sari dengan tagetes, serta pestisida nabati seperti piretrin (dari chrysanthemum), nimba, dan tembakau.\nInsektisida yang dapat digunakan antara lain berbahan aktif teflubenzuron 50 EC, permetrin 25 EC, imidakloprid 200 SL, dan metidation 25 WP.','2026-01-23 05:11:06','2026-01-23 05:11:06'),
(23,NULL,'Lalat Buah','hama','\nGejala:\nGejala serangan berupa adanya titik hitam bekas tusukan pada permukaan buah, warna buah menjadi kuning pucat, dan buah menjadi layu. Buah yang terserang akan membusuk dan akhirnya jatuh ke tanah.\nSolusi:\nPengendalian lalat buah dilakukan dengan sanitasi lingkungan, yaitu membuang buah yang terserang.\nMenggunakan perangkap atraktan metil eugenol atau pertogenol dengan dosis 1 ml per perangkap sebanyak 40 buah per hektar.\nSelain itu dilakukan rotasi tanaman bukan inang, pemanfaatan musuh alami berupa parasitoid larva dan pupa (Biosteres sp., Opius sp.), predator semut, Arachnidae (laba-laba), Staphylinidae (kumbang), dan Dermaptera (cecopet).\nPengendalian secara kimia dapat dilakukan apabila diperlukan.','2026-01-23 05:11:37','2026-01-23 05:11:37'),
(24,NULL,'Penyakit Antraknosa','penyakit','\nGejala:\nGejala penyakit ini berupa titik gelap pada permukaan kulit buah, bercak bulat memanjang sedikit cekung dan bergaris tengah/lingkaran konsentris ±1 mm, berwarna merah kecoklatan. Penyakit ini menyerang tanaman mulai dari persemaian sampai fase berbuah.\nSolusi:\nPengendalian penyakit antraknosa dilakukan dengan penggunaan mulsa hitam perak, sanitasi lahan dengan membuang buah yang terserang, penggunaan benih sehat, serta perendaman atau perlakuan benih.\nSelain itu dapat menggunakan pestisida nabati seperti ekstrak daun mimba, cengkeh, kencur, dan kunyit, serta menggunakan varietas tahan.\nApabila kerusakan tanaman cukup berat, dilakukan penyemprotan fungisida yang dianjurkan, misalnya difenokonazol (Score 250 EC, dosis 2 ml/liter) atau klorotalonil (Daconil 500 F, dosis 2 g/liter).','2026-01-23 05:12:37','2026-01-23 05:12:37'),
(25,NULL,'Penyakit Virus Kuning','penyakit','\nGejala:\nGejala serangan berupa daun menggulung, mengecil, dan berwarna kuning. Produksi buah menurun bahkan tanaman tidak berbuah apabila serangan terjadi sejak tanaman belum berbunga. Pada serangan berat, hamparan tanaman cabai dapat berubah menjadi kuning.\nSolusi:\nPengendalian dilakukan dengan mengendalikan vektor penyebab penyakit yaitu kutu kebul, menggunakan varietas tahan, melakukan sanitasi dengan membersihkan tanaman di sekitar lahan dari tanaman atau gulma inang, menggunakan bibit tanaman sehat, serta melakukan eradikasi dengan mencabut dan memusnahkan tanaman yang terserang.','2026-01-23 05:13:09','2026-01-23 05:13:09'),
(26,NULL,'Penyakit Layu Fusarium','penyakit','\nGejala:\nDaun yang terserang penyakit ini mengalami kelayuan yang dimulai dari bagian bawah tanaman, kemudian menguning dan menjalar ke atas hingga ranting muda. Apabila infeksi berkembang, tanaman menjadi layu. Warna jaringan akar dan batang berubah menjadi cokelat. Pada tempat luka infeksi terdapat hifa putih menyerupai kapas.\nSolusi:\nPengendalian dilakukan dengan menggunakan agen antagonis Trichoderma spp. dan Gliocladium spp. yang diaplikasikan bersamaan dengan pemupukan dasar.\nSelain itu dilakukan sanitasi dan eradikasi dengan mencabut dan memusnahkan tanaman yang terserang agar penyakit tidak meluas. Pestisida nabati seperti cengkeh dan mimba juga dapat digunakan.','2026-01-23 05:13:53','2026-01-23 05:13:53'),
(27,NULL,'Penyakit Layu Bakteri','penyakit','\nGejala:\nSerangan penyakit ini menimbulkan gejala layu pada daun bagian atas tanaman. Setelah beberapa hari, seluruh daun tanaman menjadi layu permanen, sedangkan warna daun tetap hijau, meskipun terkadang tampak sedikit kekuningan.\nSolusi:\nBeberapa cara pengendalian penyakit ini yaitu melalui kultur teknis dengan pergiliran tanaman, penggunaan benih sehat, serta sanitasi dengan mencabut dan memusnahkan tanaman yang sakit.\nPengendalian secara hayati dapat dilakukan dengan menggunakan agen antagonis Trichoderma spp. dan Gliocladium spp. yang diaplikasikan bersamaan dengan pemupukan dasar. Pestisida nabati yang dapat digunakan antara lain nimba.','2026-01-23 05:15:06','2026-01-23 05:15:06'),
(28,NULL,'Ulat Tanah (Agrotis ipsilon)','hama','\nGejala:\nSerangan ditandai dengan batang tanaman muda yang terpotong, sehingga tanaman mati sebelum sempat tumbuh lebih besar.\nSolusi:\nPetani dapat melakukan pengolahan tanah secara intensif sebelum penanaman untuk mengurangi populasi larva yang bersembunyi di dalam tanah.\nSelain itu, pemasangan perangkap cahaya pada malam hari dapat membantu menangkap ngengat dewasa yang menjadi induk ulat tanah.\nApabila serangan sudah cukup parah, penggunaan insektisida berbahan aktif karbofuran dapat diterapkan sesuai dosis yang dianjurkan.','2026-01-23 05:15:38','2026-01-23 05:15:38'),
(29,NULL,'Trips (Thrips sp.)','hama','\nGejala:\nGejala serangan trips terlihat dari perubahan warna daun menjadi keperakan, mengeriting, dan akhirnya mengering. Jika tidak segera dikendalikan, trips dapat menyebabkan pertumbuhan tanaman terganggu dan hasil panen menurun.\nSolusi:\nPengendalian trips dilakukan dengan menanam varietas tomat yang lebih tahan terhadap serangan trips.\nPenggunaan perangkap kuning berperekat juga efektif untuk menarik dan menangkap trips dewasa.\nJika populasi trips sudah terlalu tinggi, penggunaan insektisida berbahan aktif abamektin atau spinosad dapat diterapkan untuk mengendalikan hama ini secara lebih efektif.','2026-01-23 05:16:05','2026-01-23 05:16:05'),
(30,NULL,'Ulat Buah (Helicoverpa armigera dan Helicoverpa zea)','hama','\nGejala:\nHama ini membuat lubang pada buah dan memakan daging buah dari bagian dalam, sehingga menyebabkan buah membusuk dan tidak dapat dikonsumsi.\nSolusi:\nUntuk mengendalikan ulat buah, petani dapat menutup buah dengan jaring pelindung agar ulat tidak dapat masuk ke dalam buah.\nSelain itu, pemanfaatan musuh alami seperti Trichogramma sp. dapat membantu mengurangi populasi ulat.\nJika serangan sudah meluas, aplikasi insektisida berbahan aktif Bacillus thuringiensis (Bt) yang ramah lingkungan dapat menjadi solusi yang efektif.','2026-01-23 05:16:34','2026-01-23 05:16:34'),
(31,NULL,' Lalat Buah (Liriomyza huidobrensis)','hama','\nGejala:\nHama ini menyerang daun tanaman tomat. Larva lalat menggerek jaringan daun sehingga menimbulkan garis-garis putih yang khas pada permukaan daun. Apabila serangan parah, daun dapat mengering dan gugur.\nSolusi. \nUntuk mengendalikan lalat daun, petani dapat menanam tanaman pendamping seperti marigold yang dikenal dapat mengusir lalat daun.\nSelain itu, penggunaan perangkap feromon juga dapat membantu menangkap lalat dewasa sebelum mereka bertelur pada tanaman tomat.\nPengendalian secara kimia dapat dilakukan apabila diperlukan.','2026-01-23 05:17:37','2026-01-23 05:17:37'),
(32,NULL,'Bercak Daun','penyakit','\nGejala:\nDaun yang terserang penyakit ini akan muncul bercak bulat berwarna hitam kecoklatan. Serangan penyakit ini menyebabkan daun menjadi layu dan menguning. Secara perlahan daun akan mengalami kerontokan.\nSolusi:\nPenggunaan mulsa dapat dilakukan terutama saat musim hujan untuk mencegah terjadinya penyakit akibat tanah yang terkontaminasi bakteri atau jamur.\nPengendalian kimia dapat dilakukan dengan menyemprotkan fungisida yang mengandung bahan aktif mankozeb, propineb, difenokonazol, atau metalaksil.','2026-01-23 05:18:24','2026-01-23 05:18:24'),
(33,NULL,'Busuk Buah','penyakit','\nGejala:\nGejala busuk buah disebabkan oleh jamur Thanatephorus cucumeris yang ditandai dengan munculnya bercak kecil berwarna cokelat pada bagian buah tomat. Secara perlahan bercak tersebut akan menyebar dan membesar sehingga menyebabkan buah tomat menjadi busuk.\nSolusi:\nPengendalian dapat dilakukan dengan melakukan pergantian varietas tanaman menggunakan bibit unggul.\nSelain itu, perlu menjaga kebersihan tanaman dan kebun dengan melakukan sanitasi yang baik, seperti membersihkan peralatan tanam serta mencabut atau menghilangkan tanaman yang terinfeksi.\nApabila penyebaran penyakit tomat dinilai terlalu luas, pengendalian dapat dilakukan dengan menyemprotkan fungisida yang mengandung bahan aktif mankozeb atau kaptafol.','2026-01-23 05:19:33','2026-01-23 05:19:33'),
(34,NULL,'Belalang (Oxya chinensis dan Locusta sp.)','hama','Belalang (Oxya chinensis dan Locusta sp.)\nGejala:\nBelalang menyerang tanaman jagung dengan cara memakan tanaman yang masih muda. Serangan belalang dapat menghabiskan seluruh bagian daun, bahkan hingga tulang daun.\nSolusi:\nPengendalian dapat dilakukan dengan aplikasi biopestisida berbahan aktif Metarhizium anisopliae yang mampu mengendalikan 70–90% populasi hama belalang.\nPengendalian secara kimia dapat dilakukan dengan menggunakan pestisida Regent, Curacron, Prevathon, atau Lannate.','2026-01-23 05:20:40','2026-01-23 05:20:40'),
(35,NULL,' Lalat Bibit (Atherigona sp.)','hama','\nGejala:\nLalat bibit menyerang tunas muda jagung yang baru tumbuh. Kerusakan akibat serangan hama ini dapat mencapai 80%. Tanaman yang terserang akan berubah menjadi kuning, kerdil, bahkan mati.\nSolusi:\nPengendalian dilakukan dengan pergiliran tanaman, menjaga kebersihan lahan, serta pemilihan waktu tanam yang tepat.\nPengendalian secara kimia dapat dilakukan dengan mencampur benih menggunakan nematisida seperti Furadan, Curater, Petrofuran, atau Pentakur.\nSetelah tanaman berumur 5–7 hari, dapat dilakukan penyemprotan menggunakan Curacron, Regent, atau Prevathon.','2026-01-23 05:21:32','2026-01-23 05:21:32'),
(36,NULL,'Ulat Grayak (Spodoptera sp.)','hama','\nGejala:\nSerangan ulat grayak biasanya terjadi pada daun tanaman jagung. Hama ini menyebabkan daun menjadi transparan, berlubang, bahkan hanya tersisa tulang daun saja.\nSolusi:\nPengendalian dapat dilakukan dengan penyemprotan insektisida seperti Lannate, Sontata, Regent, Prevathon, atau Curacron.','2026-01-23 05:22:08','2026-01-23 05:22:08'),
(37,NULL,'Penggerek Batang (Ostrinia furnacalis)','hama','\nGejala:\nHama ini biasanya menyerang pada seluruh fase pertumbuhan tanaman jagung. Penggerek batang merupakan larva dari telur ngengat yang menetas. Telur-telur tersebut biasanya diletakkan di permukaan daun bagian bawah. Setelah menetas, larva menyerang seluruh bagian tanaman, mulai dari alur bunga jantan, daun, batang, pangkal tongkol, hingga tassel.\nSerangan menyebabkan kerusakan pada bunga jantan, daun berlubang, batang berlubang, serta merusak tassel dan mengakibatkan tassel mudah patah.\nSolusi:\nPengendalian dapat dilakukan dengan pemanfaatan musuh alami seperti Trichoderma sp., predator Euborellia annulata, dan Bacillus thuringiensis.\nPengendalian secara kimia dapat dilakukan dengan penyemprotan insektisida berbahan aktif karbofuran, monokrotofos, triazofos, atau diklorfos.','2026-01-23 05:22:50','2026-01-23 05:22:50'),
(38,NULL,'Hawar Daun (Helminthosporium turcicum)','penyakit','\nGejala:\nGejala yang timbul berupa bercak kecil berbentuk oval. Selanjutnya bercak semakin memanjang berbentuk elips dan berkembang menjadi nekrotik yang disebut hawar, dengan warna hijau keabu-abuan atau cokelat.\nSolusi:\nPengendalian penyakit ini dapat dilakukan dengan cara memusnahkan seluruh bagian tanaman yang terserang hingga ke akarnya.\nPengendalian secara kimia menggunakan fungisida berbahan aktif mankozeb dan dithiocarbamate dengan dosis atau konsentrasi sesuai anjuran.','2026-01-23 05:24:04','2026-01-23 05:24:04'),
(39,NULL,'Busuk Pelepah (Rhizoctonia solani)','penyakit','\nGejala:\nGejala serangan ditandai dengan munculnya bercak berwarna agak kemerahan yang kemudian berubah menjadi abu-abu.\nSolusi:\nPengendalian dilakukan dengan pergiliran tanaman menggunakan tanaman yang bukan sefamili.\nPengendalian kimia dilakukan dengan fungisida berbahan aktif mankozeb dan karbendazim, dengan dosis atau konsentrasi sesuai petunjuk pada kemasan.','2026-01-23 05:24:44','2026-01-23 05:24:44'),
(40,NULL,'Penyakit Bulai (Peronosclerospora maydis)','penyakit','\nGejala:\nGejala khas penyakit bulai adalah adanya warna klorotik memanjang sejajar tulang daun dengan batas yang jelas antara daun sehat dan daun yang terserang.\nSolusi:\nPengendalian dapat dilakukan dengan pergiliran tanaman, penanaman jagung secara serempak, serta pemusnahan seluruh bagian tanaman yang terserang hingga ke akarnya.\nPengendalian secara kimia dapat dilakukan melalui perlakuan benih menggunakan fungisida berbahan aktif metalaksil dengan dosis 2 gram (0,7 gram bahan aktif) per kg benih.','2026-01-23 05:25:24','2026-01-23 05:25:24'),
(41,NULL,'Busuk Batang','penyakit','\nGejala:\nUmumnya gejala tersebut terjadi pada stadia generatif. Pangkal batang yang terinfeksi berubah warna dari hijau menjadi kecoklatan. Bagian dalam batang mengalami pembusukan sehingga batang mudah rebah, dan bagian kulit luarnya menjadi tipis.\nSolusi:\nPengendalian penyakit busuk batang (Fusarium) secara hayati dapat dilakukan dengan memanfaatkan cendawan antagonis Trichoderma sp.\nPengendalian secara kimia dapat dilakukan dengan menggunakan fungisida berbahan aktif benomil, metalaksil, atau propamokarb hidroklorida dengan dosis atau konsentrasi sesuai petunjuk pada kemasan.','2026-01-23 05:25:50','2026-01-23 05:26:05'),
(42,NULL,'Ulat Daun','hama','\nGejala:\nGejala serangan ulat daun berupa lubang-lubang bekas gigitan pada bagian tengah dan tepi daun.\nSolusi:\nMemperhatikan kebersihan area tanaman.\nMelakukan penyiangan agar ulat tidak memiliki banyak lokasi persembunyian.\nMelakukan penyemprotan insektisida sistemik berbahan aktif imidakloprid setiap satu minggu sekali.\nJika serangan masih berlanjut, gunakan insektisida kontak berbahan aktif metomil yang bekerja secara translaminar dengan dicampur bahan perekat, penembus, dan pembasah.\nPenyemprotan dilakukan pada sore hari karena ulat lebih aktif pada malam hari','2026-01-23 05:27:08','2026-01-23 05:27:08'),
(43,NULL,'Belalang (Sexava spp.)','hama','\nGejala:\nGejala serangan pada daun yang masih muda terlihat bekas gigitan di bagian tepi daun. Serangannya hampir menyerupai serangan oleh ulat daun.\nSolusi:\nPengendalian dapat dilakukan dengan cara menggoyangkan daun bayam ke kiri dan ke kanan menggunakan ujung sapu lidi agar belalang beterbangan.\nPengendalian juga dapat dilakukan secara kimia.','2026-01-23 05:28:07','2026-01-23 05:28:07'),
(44,NULL,'Bekicot / Siput','hama','\nGejala:\nHama ini menyerang dengan memakan benih di persemaian sehingga tanaman tidak tumbuh. Pada daun, batang, dan akar bayam terlihat bekas gigitan berupa lubang-lubang.\nSolusi:\n1. Melakukan penyiangan agar bekicot tidak memiliki banyak lokasi persembunyian.\n2. Melakukan aplikasi moluskisida tabur yang ditaburkan di sekeliling tanaman.\n3. Menggunakan cara konvensional yaitu berburu hama pada malam hari dan mencarinya di lokasi persembunyian pada siang hari.\n4. Menggunakan perangkap dari tempurung kelapa yang diberi pintu.','2026-01-23 05:28:48','2026-01-23 05:29:33'),
(45,NULL,'Kutu Daun (Myzus persicae)','hama','\nGejala:\nGejala pertama yang disebabkan oleh hama ini adalah mengisap cairan daun sehingga menyebabkan daun bayam melengkung dan berpilin.\nSolusi:\nCara pengendalian dilakukan dengan mencabut dan membakar tanaman yang terserang kutu daun. Apabila serangan cukup hebat, dapat dilakukan penyemprotan pestisida sesuai dengan dosis anjuran.','2026-01-23 05:30:06','2026-01-23 05:30:06'),
(46,NULL,'karat Putih','penyakit','\nGejala:\nTerbentuknya bercak-bercak putih yang agak melepuh pada daun, terutama pada sisi bawah daun tanaman bayam.\nSolusi:\nCara mengatasi penyakit karat putih cukup dilakukan dengan membongkar tanaman yang terserang dan melakukan peremajaan tanaman kembali apabila serangan sudah parah.','2026-01-23 05:30:43','2026-01-23 05:30:50'),
(47,NULL,'Virus Keriting (Spinach blight)','penyakit','\nGejala:\nSerangan virus menyebabkan daun menyempit, mengerut, menggulung, dan mengecil. Pada permukaan daun timbul bercak-bercak.\nSolusi:\nPengendalian dilakukan dengan mencabut dan membakar tanaman yang sakit agar penyakit tidak menyebar, kemudian melakukan peremajaan tanaman kembali.','2026-01-23 05:31:18','2026-01-23 05:31:18'),
(48,NULL,'Kekurangan Mangan (Mn)','penyakit','\nGejala:\nGejala penyakit ini ditandai dengan munculnya bintik-bintik kuning pada daun, tepi daun menjadi keriting, serta pertumbuhan daun menjadi lambat.\nSolusi:\nCara mengatasinya yaitu dengan pemberian pupuk Multonik yang mengandung unsur Mn pada tanah saat gejala awal muncul.\nPencegahan dilakukan dengan pemberian kapur pada saat pengolahan tanah, terutama pada lahan yang diduga mengalami kekurangan unsur Mn.','2026-01-23 05:31:50','2026-01-23 05:31:50'),
(49,NULL,'Ulat Keket atau Jedung','hama','\nGejala:\nHama ini dapat menyerang tanaman kangkung dan mengakibatkan daun menjadi rusak serta berlubang.\nSolusi:\nPengendalian dilakukan dengan menjaga jarak tanam dan menerapkan teknik budidaya yang benar. Apabila serangan sudah masif, pengendalian dapat dilakukan dengan menyemprotkan pestisida sesuai dosis yang dianjurkan.','2026-01-24 00:05:09','2026-01-24 00:05:09'),
(50,NULL,'Ulat Penggerek Polong','hama','\nGejala:\nUlat penggerek polong menyebabkan polong menjadi berlubang. Bahkan, terkadang hama ini ditemukan berada di dalam polong tersebut.\nSolusi:\nPengendalian dapat dilakukan dengan memasang lampu perangkap. Selain itu, penyemprotan insektisida dapat dilakukan setiap satu minggu sekali sejak tanaman mulai berbunga','2026-01-24 00:05:39','2026-01-24 00:05:39'),
(51,NULL,'Busuk Buah (Kacang Panjang)','penyakit','\nGejala:\nGejala penyakit ini disebabkan oleh jamur Thanatephorus cucumeris yang ditandai dengan munculnya bercak kecil berwarna cokelat pada buah kacang panjang. Secara perlahan, bercak tersebut akan menyebar dan membesar sehingga menyebabkan buah kacang panjang menjadi busuk.\nSolusi:\nPengendalian dapat dilakukan dengan mengganti varietas tanaman menggunakan bibit unggul. Selain itu, kebersihan tanaman dan kebun harus selalu dijaga. Lakukan sanitasi yang baik dengan membersihkan peralatan tanam serta mencabut atau menghilangkan tanaman yang terinfeksi. Apabila penyebaran penyakit sudah terlalu luas, pengendalian dapat dilakukan dengan menyemprotkan fungisida yang mengandung bahan aktif mankozeb atau kaptafol.','2026-01-24 00:06:36','2026-01-24 00:06:36'),
(52,NULL,'Kumbang Ubi Jalar','hama','\nGejala:\nKumbang merusak daun bendera, daun, batang, dan umbi dengan cara membuat lubang gerekan.\nSolusi:\nPengendalian dilakukan melalui rotasi tanaman dengan tanaman bukan inang untuk memutus siklus kumbang. Sanitasi lahan dengan membersihkan sisa-sisa umbi dan batang yang terserang sangat dianjurkan. Penggunaan stek pucuk lebih diutamakan karena telur hama biasanya diletakkan pada umbi atau batang yang dekat permukaan tanah.\nPengairan lahan dilakukan secara rutin agar tanah tidak retak sehingga sulit dimasuki kumbang. Menaikkan guludan dapat membantu memperoleh hasil yang lebih baik. Panen awal dapat menurunkan tingkat serangan kumbang, khususnya di daerah endemis dengan memajukan jadwal panen 1–2 minggu lebih awal.\nPengendalian hayati dapat dilakukan dengan agen hayati Beauveria bassiana. Apabila populasi hama melebihi ambang kendali, dapat dilakukan penyemprotan insektisida seperti permetrin, karbofuran, atau karbosulfan.','2026-01-24 00:07:16','2026-01-24 00:07:16'),
(53,NULL,'puru','hama','\nGejala:\nSerangan puru terjadi pada daun, tangkai daun, dan batang. Tingkat berat ringannya serangan dapat dilihat dari kepadatannya. Pada serangan yang parah, puru dapat saling tumpang tindih sehingga membentuk benjolan.\nSolusi:\nKultur teknis\nMenanam stek yang terbebas dari puru melalui seleksi stek dari pertanaman yang ketat.\nSanitasi lahan dengan membersihkan lahan dari gulma yang juga merupakan inang dari tungau puru.\nPengendalian mekanis\nMemotong bagian tanaman yang terserang puru kemudian membakarnya.','2026-01-24 00:08:06','2026-01-24 00:08:06'),
(54,NULL,'Bercak Daun Coklat','penyakit','\nGejala:\nPada daun terdapat bercak-bercak bulat atau tidak teratur berukuran 6–10 mm yang mula-mula berwarna coklat kekuningan dengan batas yang kurang jelas. Selanjutnya, bagian tengah bercak berubah menjadi berwarna keabu-abuan.\nSolusi:\nTeknologi pengendalian secara khusus belum tersedia karena pada umumnya penyakit ini tidak mengakibatkan kerugian hasil yang signifikan. Penggunaan bibit yang sehat merupakan salah satu cara untuk mengendalikan penyakit ini.','2026-01-24 00:08:39','2026-01-24 00:08:39'),
(55,NULL,'Busuk Hitam','penyakit','\nGejala:\nBusuk hitam dapat terjadi baik di lapangan maupun pada tempat penyimpanan. Pada kondisi tertentu, penetrasi patogen di lapangan sudah cukup banyak, namun karena gejalanya masih sangat kecil, penyakit ini belum terlihat oleh mata telanjang.\nenyakit ini biasanya ditemukan saat cuaca tidak menentu. Salah satu cara untuk mengatasi penyakit ini yaitu dengan menyemprotkan fungisida.','2026-01-24 00:09:27','2026-01-24 00:09:27'),
(56,NULL,'Akar Gada','penyakit','\nGejala:\nTanaman yang terinfeksi penyakit akar gada menunjukkan gejala daun berwarna hijau pucat sampai kekuningan. Daun layu pada siang hari dan kembali segar pada malam hari.\nSolusi:\nPetani dapat melakukan pengendalian penyakit akar gada dengan cara melakukan pengapuran untuk menaikkan pH tanah agar tidak asam, melakukan sanitasi lahan, rotasi tanaman dengan tanaman bukan inang untuk memutus siklus hidup Plasmodiophora brassicae di dalam tanah, serta menggunakan fungisida sesuai dengan dosis anjuran.','2026-01-24 00:10:08','2026-01-24 00:10:08'),
(57,NULL,'Kutu Daun','hama','\nGejala:\nSerangga kecil berbadan lunak yang terdapat di bagian bawah daun dan/atau batang tanaman. Biasanya berwarna hijau atau kuning, namun dapat juga berwarna merah muda, coklat, merah, atau hitam tergantung spesies dan tanaman inangnya. Jika serangan kutu daun berat, dapat menyebabkan daun menguning dan/atau muncul bercak nekrotik yang rusak pada daun dan/atau tunas menjadi kerdil. Kutu daun mengeluarkan zat lengket dan manis yang disebut embun madu yang dapat mendorong pertumbuhan jamur jelaga pada tanaman.\nSolusi:\nJika populasi kutu daun masih terbatas pada beberapa daun atau tunas saja, serangan dapat dikendalikan dengan pemangkasan. Periksa bibit tanaman untuk mengetahui keberadaan kutu daun sebelum penanaman. Gunakan varietas toleran jika tersedia. Penggunaan mulsa yang memantulkan cahaya seperti plastik berwarna perak dapat menghalangi kutu daun menyerang tanaman. Tanaman yang kuat dapat disemprot dengan semburan air yang kuat untuk menjatuhkan kutu daun dari daun. Insektisida umumnya hanya diperlukan jika serangan kutu daun sangat tinggi.','2026-01-24 00:10:40','2026-01-24 00:10:40'),
(58,NULL,'Kumbang Mentimun','hama','\nGejala:\nBibit menjadi kerdil. Daun, batang, dan/atau tangkai daun mengalami kerusakan. Tegakan tanaman berkurang. Tanaman dapat menunjukkan gejala layu bakteri. Pada buah terdapat bekas luka akibat kerusakan yang disebabkan oleh kumbang. Kumbang dewasa umumnya berwarna cerah dengan latar belakang hijau-kuning dan terdapat bintik-bintik hitam atau garis-garis hitam dan kuning yang berselang-seling.','2026-01-24 00:11:17','2026-01-24 00:11:17');
/*!40000 ALTER TABLE `penyebab_serangan` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `penyuluh`
--

DROP TABLE IF EXISTS `penyuluh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `penyuluh` (
  `id_penyuluh` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `id_desa` bigint(20) unsigned NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penyuluh`),
  UNIQUE KEY `penyuluh_email_unique` (`email`),
  KEY `penyuluh_id_desa_foreign` (`id_desa`),
  CONSTRAINT `penyuluh_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penyuluh`
--

LOCK TABLES `penyuluh` WRITE;
/*!40000 ALTER TABLE `penyuluh` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `penyuluh` VALUES
(1,'YAHYA SANDE, SP','penyuluh3@gmail.com','$2y$12$GhepEq8DDO9YYxHANtdHeOvL9jOXGf0cFkEcyQLp22A5JkJQJOaB6','08654234761',6,NULL,NULL,'2026-01-21 06:01:30','2026-01-23 23:30:23'),
(2,'YUNELLY, SP','penyuluh1@gmail.com','$2y$12$xIe1Ae/Sd/aYBhMCymcRq.AcSgY3WAmJIEObQjIRYIAU6KddfzZrS','0865436764',2,NULL,'nQ1sUCugz9QcM4rtvCkW3vxbaDjffsXkmOZh5PtjMIQRMJidLzjBprcq38rK','2026-01-23 23:27:01','2026-01-23 23:27:01'),
(3,'DADANG DERMAWAN, SP','Penyuluh2@gmail.com','$2y$12$V9UfjzuJApzIPPltr/EFM.2v6R/8hDeGdI74LEQuDLG9M6ie5.gLu','08654134576',8,NULL,NULL,'2026-01-23 23:29:12','2026-01-23 23:29:12'),
(4,'EDY ALLO DATU, SP','Penyuluh4@gmail.com','$2y$12$fOeJmVSGWshf5eoXSyUbpONGdas0ewQIGoeNNU0ASJC93bfmtBUxa','08654782345',3,NULL,NULL,'2026-01-23 23:31:36','2026-01-23 23:31:36'),
(5,'HJ. HERAWATI, S.ST','penyuluh5@gmail.com','$2y$12$rrJbe.wH5FPGh48PJFdvXuDumAydglEYD8ST8/lBW4ev9RU8UOPAS','08543245678',5,NULL,NULL,'2026-01-23 23:32:45','2026-01-23 23:32:45'),
(6,'MARFIANTI BAKRI','Penyuluh6@gmail.com','$2y$12$ZH0fICkKhMmexwK6jRwQWeYbxb52289bjl/47TJgkAPbXQiENbyIW','08654324856',9,NULL,NULL,'2026-01-23 23:33:45','2026-01-23 23:33:45'),
(7,'DESI TANDIGAU, SP','Penyuluh7@gmail.com','$2y$12$IjaEeTuBJtfh5RAx/1s6/OJ57CYVmkDnImtWt86.0HtxNC06N8CMC','08765432123',7,NULL,NULL,'2026-01-23 23:36:12','2026-01-23 23:36:12'),
(8,'HAYAT, S.PT','Penyuluh8@gmail.com','$2y$12$8ZN0NAmQAguI9l4V8Kkjwuw8UM13lq9lzaTZipbiepF/UwyoI1ViK','087654321234',4,NULL,NULL,'2026-01-23 23:37:41','2026-01-23 23:37:41'),
(9,'MAYA, SP','Penyuluh9@gmail.com','$2y$12$5/ZmzcL.8ngnME1bffG3H.k8YZxenyZfClhpxCh3Muh.ywtGIbEi.','08765432123',10,NULL,NULL,'2026-01-23 23:38:29','2026-01-23 23:38:29');
/*!40000 ALTER TABLE `penyuluh` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `petani`
--

DROP TABLE IF EXISTS `petani`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `petani` (
  `id_petani` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `id_desa` bigint(20) unsigned NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_petani`),
  UNIQUE KEY `petani_email_unique` (`email`),
  KEY `petani_id_desa_foreign` (`id_desa`),
  CONSTRAINT `petani_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petani`
--

LOCK TABLES `petani` WRITE;
/*!40000 ALTER TABLE `petani` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `petani` VALUES
(1,'Petani 1','petani1@gmail.com','$2y$12$aqbKExN1FYc2FPsA37NISOuoPv1AMVWg83OS8kBiQMWUOzFj7uAXq','10010101001',1,NULL,'Uba13abuV2ZDXlvtNErCd370sex58GLTtmVtvvK6sFJB2mOE8NMqa2Xs7YDB','2026-01-21 06:01:30','2026-01-21 06:01:30'),
(2,'Petani 2','petani2@gmail.com','$2y$12$XHgEhGPZ9/viq/stuUGr3e2QdxYKD3ZDL.OQLux3k5pMCa8mtubE.','08100101001',1,NULL,NULL,'2026-01-21 06:01:31','2026-01-21 06:01:31'),
(12,'watno','watno@gmail.com','$2y$12$3hsmiUrxMswbHD46sIuNNOYtRem5/oV41mGpikqZUysUceHlHWeh2','0864123456',5,NULL,NULL,'2026-01-23 23:41:44','2026-01-23 23:41:44'),
(13,'watasro','watasro@gmail.com','$2y$12$kr7bIPmtewpRvLEbcYvWHuj1Lj4hDuQrjmPBNLJfX4kJZXGnWBYxy','08512346567',5,NULL,NULL,'2026-01-23 23:42:46','2026-01-23 23:42:46'),
(14,'tasripin','tasripin@gmail.com','$2y$12$59f51.StNZmmZauV5KG6fuggwnlae1rabfp/xi6cGiTP2jMXuDzq2','08512346543',5,NULL,NULL,'2026-01-23 23:43:27','2026-01-23 23:43:27'),
(15,'Kasnadi ','kasnadi@gmail.com','$2y$12$4ywQpkSxTqa2VI/uFIiUCejbCY1XIFXblV23vP09RouiVJ3qeNIuO','087654321234',5,NULL,NULL,'2026-01-23 23:44:09','2026-01-23 23:44:09'),
(16,'darsono','darsono@gmail.com','$2y$12$V3t/7nJtiRCdvknE6qh8deqyCAuksfCSuL5bj7UMkIAj4oYrOpps2','08765412345',5,NULL,NULL,'2026-01-23 23:45:00','2026-01-23 23:45:00'),
(17,'asmoro','asmoro@gmail.com','$2y$12$7sW3szPlXTBywMEgPSMPS.KgdypK3Foq3Ozz87H10HPy49NiemNni','087654256775',5,NULL,NULL,'2026-01-23 23:45:46','2026-01-23 23:45:46'),
(18,'sartono','sartono@gmail.com','$2y$12$rY2IWmMNTO0Vtz8elQQWOe6xsdFyXlKMRpLEhCqAVW/rdET3DUXR6','086543123456',5,NULL,NULL,'2026-01-23 23:46:37','2026-01-23 23:46:37'),
(19,'aseppudin','aseppudin@gmail.com','$2y$12$t3hvFOFV2JXuT8dZ93L3bepCCahmSAbhlHW8WPPL5wOVGoB0BFTB.','086431234567',5,NULL,NULL,'2026-01-23 23:47:28','2026-01-23 23:47:28'),
(20,'adimpraidna','adim@gmail.com','$2y$12$3Quar4myIFF2FWN1LHsaV.O0Sz1py42VuXIjTBWbE7IV75YQrObpC','086523678765',5,NULL,NULL,'2026-01-23 23:48:06','2026-01-23 23:48:06'),
(21,'kodaruddin','kodar@gmail.com','$2y$12$AfAk1YmoVBJwlobB3d8REePSTMitDBQYIskFmPYSedUP/NJs.sdZ6','0864321234567',5,NULL,NULL,'2026-01-23 23:48:46','2026-01-23 23:48:46'),
(22,'rohim','rohim@gmail.com','$2y$12$IBLoqwkNTZQytksW52evxuspGUTNOGNeMjP2hM0C6hXyh3iep5VJa','087654321234',5,NULL,NULL,'2026-01-23 23:49:21','2026-01-23 23:49:21'),
(23,'jainal','jainal@gmail.com','$2y$12$Zq7dhISR4AxBWsTZGeiOgOtTMYLTGYbM.EPP1lVK3cJ67bVjcm8.6','0854321234567',5,NULL,NULL,'2026-01-23 23:49:50','2026-01-23 23:49:50'),
(24,'samsuddin','samsuddin@gmail.com','$2y$12$TR1uLKu25vxsBaeldzLZsO4RNVtB3bqxM9Z5rk1kycIrnKh6j1ga6','086543223456',5,NULL,NULL,'2026-01-23 23:50:37','2026-01-23 23:50:37'),
(25,'warnasi','warnasi@gmail.com','$2y$12$z9CncSrPgs1/XLzlFNwNyOhmcghhD4mZj1p4nT62fA2VH/Jrgv8Zu','08654234567',4,NULL,NULL,'2026-01-23 23:52:24','2026-01-23 23:52:24'),
(26,'darmawan','darmawan@gmail.com','$2y$12$06SmIic8kej1aI4sZ5Xi4OMvA1litiENFtvn5WG/P5oQUgPm0rny2','087654323456',4,NULL,NULL,'2026-01-23 23:53:08','2026-01-23 23:53:08'),
(27,'firman','firman@gmail.com','$2y$12$AYOkiOCK1wcFS8PjSwYmXeXDdAbOgJIo6HJd745.fCezP35K7NAxC','086543212345',8,NULL,NULL,'2026-01-23 23:54:37','2026-01-23 23:54:37'),
(28,'muhammad ilham','ilham@gmail.com','$2y$12$6.K54ILjgvG9EX5.fovp2O4Cn4PEj1bk0A1eNDKZVNzUvzD59/mx6','08654323456',7,NULL,NULL,'2026-01-23 23:55:38','2026-01-23 23:55:38'),
(29,'fauzan','fauzan@gmail.com','$2y$12$nWuViMZHAZ9r9GcjE7lGw.cRZ9Lvxw7I7sI5pBqkl8/mVsEIbtLTO','08715462764',3,NULL,NULL,'2026-01-23 23:56:53','2026-01-23 23:56:53'),
(30,'muhfid','muhfid@gmail.com','$2y$12$G0cXIYng9Wes96vne1LSEuwEVv/xAhL3e5K8bhEZYrNH7y6Uodiqu','083456787632',9,NULL,NULL,'2026-01-23 23:57:47','2026-01-23 23:57:47'),
(31,'faturahman','faturrahman@gmail.com','$2y$12$6.CkqHtzXPAO5bY4ZKp1rOLsUuQ6.VUgzF5EGIih/nDLeojPCGGEe','08652345676',7,NULL,NULL,'2026-01-23 23:58:41','2026-01-23 23:58:41'),
(32,'muhammad yunus','yunus@gmail.com','$2y$12$ngroiASAr4OkiwQc.iT1YufbysbIuwa7T37jX5hU9lKLLRERnJ22W','0876445678765',3,NULL,NULL,'2026-01-23 23:59:35','2026-01-23 23:59:35'),
(33,'narno','narno@gmail.com','$2y$12$UJtG37x9XUepqTID76ewYOJmljei3Bk7ytXoAXx8Adx4.6LYtfXOm','081234567765',3,NULL,NULL,'2026-01-24 00:00:18','2026-01-24 00:00:18'),
(34,'marten bokko','marten@gmail.com','$2y$12$zmSc/.tXZXNgtzVDWY47fujZfk4r820xde2/vd0Vp5cZ/v8CxX97C','085412345678',10,NULL,NULL,'2026-01-24 00:01:47','2026-01-24 00:01:47'),
(35,'taryoto','taryoto@gmail.com','$2y$12$Mr4i5qe9hTVbLwx4HxDCh.4wYjGwk.M8wLWJZkzz8yoO/JO0JxWiO','08652345542',9,NULL,NULL,'2026-01-24 00:03:18','2026-01-24 00:03:18');
/*!40000 ALTER TABLE `petani` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `rekomendasi_penanganan`
--

DROP TABLE IF EXISTS `rekomendasi_penanganan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `rekomendasi_penanganan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_penyuluh` bigint(20) unsigned NOT NULL,
  `id_admin` bigint(20) unsigned DEFAULT NULL,
  `id_laporan_serangan` bigint(20) unsigned NOT NULL,
  `isi_penanganan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rekomendasi_penanganan_id_penyuluh_foreign` (`id_penyuluh`),
  KEY `rekomendasi_penanganan_id_laporan_serangan_foreign` (`id_laporan_serangan`),
  KEY `rekomendasi_penanganan_id_admin_foreign` (`id_admin`),
  CONSTRAINT `rekomendasi_penanganan_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE SET NULL,
  CONSTRAINT `rekomendasi_penanganan_id_laporan_serangan_foreign` FOREIGN KEY (`id_laporan_serangan`) REFERENCES `laporan_serangan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rekomendasi_penanganan_id_penyuluh_foreign` FOREIGN KEY (`id_penyuluh`) REFERENCES `penyuluh` (`id_penyuluh`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekomendasi_penanganan`
--

LOCK TABLES `rekomendasi_penanganan` WRITE;
/*!40000 ALTER TABLE `rekomendasi_penanganan` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `rekomendasi_penanganan` VALUES
(1,2,NULL,4,'ulat daun termasuk hama yang menyerang semua tanaman yang mengakibatkan kerugian dari hasil panen tersebut maka dari itu ada solusi yang harus dilakukan agar menyelamatkan tanaman dari  serangan hama dengan memberikan pupuk atau obat fungsida ','2026-01-27 04:44:20','2026-01-27 04:44:20');
/*!40000 ALTER TABLE `rekomendasi_penanganan` ENABLE KEYS */;
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
('8OTCGYefhxtm4l1Ltp0ICxeIpDesB4WttWoLpbWG',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMW80Z2JETXlWM1dXQjN3OFdnSE03bjR4SWpFNklGS2xpdDlTSnJpViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sYXBvcmFuLXNlcmFuZ2FuIjt9czo1MzoibG9naW5fcGV0YW5pXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1769589650),
('oqKwVoUzFsA7CncEr16OMnaLnQWwNHDleaI2m2CA',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSDNTUzdyYTVTRDJ5VjkwbkFZT29XRjc5UmpsMmlVQkR2MEVJRkpYaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sYXBvcmFuLXNlcmFuZ2FuIjt9czo1MzoibG9naW5fcGV0YW5pXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1769520342);
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
  `id_admin` bigint(20) unsigned DEFAULT NULL,
  `nama_tanaman` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tanaman_id_admin_foreign` (`id_admin`),
  CONSTRAINT `tanaman_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tanaman`
--

LOCK TABLES `tanaman` WRITE;
/*!40000 ALTER TABLE `tanaman` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tanaman` VALUES
(1,NULL,'Padi','Tanaman Jangka Pendek','tanaman/rFHsrm7SMoO5hQlg1zMLxA08AozH0ypKr1Vtyj0h.jpg','2026-01-21 06:01:33','2026-01-23 06:01:51'),
(2,NULL,'Jagung','Tanaman Jangka Pendek','tanaman/wuValHe8stupGIwKrsXpgRBceuq4VIbOzRrApHiR.jpg','2026-01-21 06:01:33','2026-01-23 06:02:34'),
(7,NULL,'Ubi Jalar','Tanaman Jangka Pendek','tanaman/ncmV63VvP4zkTDlcryU3orW5tYg1gSt4FEzl7k5m.jpg','2026-01-21 06:01:33','2026-01-23 06:02:50'),
(25,NULL,'Cabe (Cabai)','Tanaman Jangka Pendek','tanaman/Ra4uaLtaVGaz8HgeSZZIxVTyz9u1ZLVA8F3Webye.jpg','2026-01-21 06:01:33','2026-01-23 06:03:04'),
(26,NULL,'Tomat','Tanaman Jangka Pendek','tanaman/g9JR9kSPT1nfTIwldgV3XSrLSg6eaYPGOHTIKPAQ.jpg','2026-01-23 05:44:52','2026-01-23 06:01:37'),
(27,NULL,'Sayur Bayam','Tanaman Jangka Pendek','tanaman/XVmVHByBi8ZrNyjwl1orXUm3AEwIfJLYgk2QWmks.jpg','2026-01-23 05:45:13','2026-01-23 06:01:22'),
(28,NULL,'Kangkung','Tanaman Jangka Pendek','tanaman/RCze6Ro8SVjhjEEfCHxSRLSffyyz7G2uwThSAAJ1.jpg','2026-01-23 05:45:26','2026-01-23 06:01:07'),
(29,NULL,'Kacang Panjang','Tanaman Jangka pendek','tanaman/cikAKvCM24XNENWObXNhh5XcbIocf83XgEh83qhB.jpg','2026-01-23 05:45:39','2026-01-23 06:00:53'),
(30,NULL,'Sawi','Tanaman Jangka pendek','tanaman/GUiMCM7Yq5j6MYV0Z3MHYakf5cd8S4AMRrE3Nyd0.jpg','2026-01-23 05:45:59','2026-01-23 06:00:38'),
(31,NULL,'Mentimun','Tanaman Jangka pendek','tanaman/08RmyZe8MlOTcRWABimHeqHqFwBSJ4wuqHEirh1H.jpg','2026-01-23 05:46:10','2026-01-23 06:00:25');
/*!40000 ALTER TABLE `tanaman` ENABLE KEYS */;
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

-- Dump completed on 2026-01-28 16:41:26
