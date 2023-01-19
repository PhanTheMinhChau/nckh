-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dtbase_nckh
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attend`
--

DROP TABLE IF EXISTS `attend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attend` (
  `id_attend` int(20) NOT NULL AUTO_INCREMENT,
  `id_schedule` int(20) NOT NULL,
  `checkin` datetime DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '0' COMMENT '(0: Vang)--(1: Co)--(2: Tre~)',
  `id_student` varchar(20) NOT NULL,
  PRIMARY KEY (`id_attend`),
  KEY `id_schedule` (`id_schedule`),
  KEY `id_student` (`id_student`),
  CONSTRAINT `attend_ibfk_1` FOREIGN KEY (`id_schedule`) REFERENCES `schedule` (`id_schedule`),
  CONSTRAINT `attend_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attend`
--

LOCK TABLES `attend` WRITE;
/*!40000 ALTER TABLE `attend` DISABLE KEYS */;
INSERT INTO `attend` VALUES (1,1,'2023-01-17 15:00:00',2,'20E1020067'),(2,1,'2023-01-15 17:00:00',2,'20E1020060'),(3,1,'2023-01-15 17:00:00',0,'20E1020014'),(5,1,NULL,1,'21E1010002'),(6,1,NULL,1,'21E1020020'),(7,2,NULL,0,'20E1020067');
/*!40000 ALTER TABLE `attend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class` (
  `id_class` varchar(20) NOT NULL,
  `name_class` varchar(100) NOT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES ('A','Class A'),('B','Class B');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_member`
--

DROP TABLE IF EXISTS `class_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class_member` (
  `id_class` varchar(20) NOT NULL,
  `id_student` varchar(20) NOT NULL,
  PRIMARY KEY (`id_class`,`id_student`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_member`
--

LOCK TABLES `class_member` WRITE;
/*!40000 ALTER TABLE `class_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `class_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedule` (
  `id_schedule` int(20) NOT NULL AUTO_INCREMENT COMMENT 'tự tăng dần',
  `id_class` varchar(20) NOT NULL,
  `begin` datetime NOT NULL,
  PRIMARY KEY (`id_schedule`),
  KEY `id_class` (`id_class`),
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,'A','2023-01-18 14:00:00'),(2,'A','2023-01-15 19:00:00'),(3,'B','2023-01-17 17:00:00'),(4,'A','2023-01-15 20:00:00'),(7,'A','2023-01-15 20:00:00');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `id_student` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `id_class` varchar(20) NOT NULL,
  PRIMARY KEY (`id_student`),
  KEY `id_class` (`id_class`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('20E1020014','Trần Đoàn Ngọc Duy','Male','emailcuaduy@gmail.com','01414141414','A'),('20E1020060','Trần Đăng Minh Vũ','Male','rinputin482@gmail.com','0355051718','A'),('20E1020067','Phan Thế Minh Châu','Male','phanchau66@gmail.com','06666666666','A'),('20Ebbbbb1','Học sinh 1 của lớp B','Male','studentb1@gmail.com','01111111111','B'),('20Ebbbbb2','Học sinh 2 của lớp B','Female','studentb2@gmail.com','02222222222','B'),('20Ebbbbb3','Học sinh 3 của lớp B','Male','studentb3@gmail.com','0333333333','B'),('21E1010002','Phạm Thị Lê Na','Female','lenabaothuhuet@gmail.com','098765431','A'),('21E1020020','Lê Bá Quốc Trung','Male','trungcutehotme@gmail.com','0123456789','A');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher` (
  `id_teacher` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-19 18:58:00
