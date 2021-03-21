-- MySQL dump 10.13  Distrib 5.7.29, for osx10.14 (x86_64)
--
-- Host: localhost    Database: db_production
-- ------------------------------------------------------
-- Server version	5.7.29

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
-- Table structure for table `m_achivement`
--

DROP TABLE IF EXISTS `m_achivement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_achivement` (
  `kode_achivement` varchar(4) NOT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  PRIMARY KEY (`kode_achivement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_achivement`
--

LOCK TABLES `m_achivement` WRITE;
/*!40000 ALTER TABLE `m_achivement` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_achivement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_item`
--

DROP TABLE IF EXISTS `m_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_item` (
  `kode_item` varchar(4) NOT NULL,
  `name_item` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_item`
--

LOCK TABLES `m_item` WRITE;
/*!40000 ALTER TABLE `m_item` DISABLE KEYS */;
INSERT INTO `m_item` VALUES ('M001','Bolpen'),('M002','Pensil'),('M003','Penghapus'),('M004','Spidol');
/*!40000 ALTER TABLE `m_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_karyawan`
--

DROP TABLE IF EXISTS `m_karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_karyawan` (
  `npk` varchar(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`npk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_karyawan`
--

LOCK TABLES `m_karyawan` WRITE;
/*!40000 ALTER TABLE `m_karyawan` DISABLE KEYS */;
INSERT INTO `m_karyawan` VALUES ('10001','Agus','Jakarta'),('10002','Asep','Purbalingga'),('10003','Jajang','Subang');
/*!40000 ALTER TABLE `m_karyawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_login`
--

DROP TABLE IF EXISTS `m_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_login` (
  `username` varchar(5) NOT NULL,
  `password` varchar(64) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_login`
--

LOCK TABLES `m_login` WRITE;
/*!40000 ALTER TABLE `m_login` DISABLE KEYS */;
INSERT INTO `m_login` VALUES ('10001','cc03e747a6afbbcbf8be7668acfebee5','2021-01-01 08:00:00','System'),('10002','cc03e747a6afbbcbf8be7668acfebee5','2021-01-01 08:00:00','System');
/*!40000 ALTER TABLE `m_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_lokasi`
--

DROP TABLE IF EXISTS `m_lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_lokasi` (
  `kode_lokasi` varchar(4) NOT NULL,
  `name_lokasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_lokasi`
--

LOCK TABLES `m_lokasi` WRITE;
/*!40000 ALTER TABLE `m_lokasi` DISABLE KEYS */;
INSERT INTO `m_lokasi` VALUES ('L1','Lokasi 1'),('L2','Lokasi 2'),('L3','Lokasi 3'),('L4','Lokasi 4');
/*!40000 ALTER TABLE `m_lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_planning`
--

DROP TABLE IF EXISTS `m_planning`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_planning` (
  `kode_planning` varchar(4) NOT NULL,
  `kode_item` varchar(4) DEFAULT NULL,
  `qty_target` int(11) DEFAULT NULL,
  `waktu_target` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`kode_planning`),
  KEY `kode_item` (`kode_item`),
  CONSTRAINT `m_planning_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `m_item` (`kode_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_planning`
--

LOCK TABLES `m_planning` WRITE;
/*!40000 ALTER TABLE `m_planning` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_planning` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_produksi`
--

DROP TABLE IF EXISTS `t_produksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_produksi` (
  `npk` varchar(5) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `kode_lokasi` varchar(4) DEFAULT NULL,
  `kode_item` varchar(4) DEFAULT NULL,
  `qty_actual` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `npk` (`npk`),
  KEY `kode_lokasi` (`kode_lokasi`),
  KEY `kode_planning` (`kode_item`),
  CONSTRAINT `t_produksi_FK` FOREIGN KEY (`kode_item`) REFERENCES `m_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_produksi_ibfk_1` FOREIGN KEY (`npk`) REFERENCES `m_karyawan` (`npk`),
  CONSTRAINT `t_produksi_ibfk_2` FOREIGN KEY (`kode_lokasi`) REFERENCES `m_lokasi` (`kode_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_produksi`
--

LOCK TABLES `t_produksi` WRITE;
/*!40000 ALTER TABLE `t_produksi` DISABLE KEYS */;
INSERT INTO `t_produksi` VALUES ('10001','2021-03-21','L1','M001',20,3),('10001','2021-03-21','L1','M001',20,4),('10001','2021-03-21','L1','M001',10,5);
/*!40000 ALTER TABLE `t_produksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_production'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-21  7:50:31
