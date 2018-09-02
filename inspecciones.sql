-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: inspecciones
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `botiquines`
--

DROP TABLE IF EXISTS `botiquines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `botiquines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_botiquin_id` int(10) unsigned DEFAULT NULL,
  `ubicacion_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `botiquines_tipo_botiquin_id_foreign` (`tipo_botiquin_id`),
  KEY `botiquines_ubicacion_id_foreign` (`ubicacion_id`),
  KEY `botiquines_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `botiquines_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `botiquines_tipo_botiquin_id_foreign` FOREIGN KEY (`tipo_botiquin_id`) REFERENCES `tipos_botiquines` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `botiquines_ubicacion_id_foreign` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicaciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `botiquines_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `botiquines_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `botiquines`
--

LOCK TABLES `botiquines` WRITE;
/*!40000 ALTER TABLE `botiquines` DISABLE KEYS */;
INSERT INTO `botiquines` VALUES (1,'COD-0001',2,7,'Activo',2,2,'2018-07-16 01:36:29','2018-07-16 02:37:02'),(2,'COD-0002',2,11,'Activo',2,NULL,'2018-08-24 22:34:24','2018-08-24 22:34:24');
/*!40000 ALTER TABLE `botiquines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias_preguntas_formatos`
--

DROP TABLE IF EXISTS `categorias_preguntas_formatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias_preguntas_formatos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorias_preguntas_formatos_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `categorias_preguntas_formatos_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `categorias_preguntas_formatos_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `categorias_preguntas_formatos_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias_preguntas_formatos`
--

LOCK TABLES `categorias_preguntas_formatos` WRITE;
/*!40000 ALTER TABLE `categorias_preguntas_formatos` DISABLE KEYS */;
INSERT INTO `categorias_preguntas_formatos` VALUES (1,'Extintores',1,'Activo',1,NULL,NULL,NULL),(2,'Botiquines',1,'Activo',1,NULL,NULL,NULL),(3,'Ubicaciones e instalaciones',1,'Activo',1,NULL,NULL,NULL),(4,'Iluminación',2,'Activo',1,NULL,NULL,NULL),(5,'Servicios',3,'Activo',1,NULL,NULL,NULL),(6,'Equipos y Utencilios',4,'Activo',1,NULL,NULL,NULL),(7,'Recepción y almacenamiento de los alimentos',5,'Activo',1,NULL,NULL,NULL),(8,'Cocina y Comedor',6,'Activo',1,NULL,NULL,NULL),(9,'Preparación de los alimentos',7,'Activo',1,NULL,NULL,NULL),(10,'Servicio de comidas',8,'Activo',1,NULL,NULL,NULL),(11,'Bebidas alcohólicas y no alcohólicas',9,'Activo',1,NULL,NULL,NULL),(12,'Salud, higiene y capacitación del personal',10,'Activo',1,NULL,NULL,NULL),(13,'Medidas de sanamiento',11,'Activo',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `categorias_preguntas_formatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clasificaciones_extintores`
--

DROP TABLE IF EXISTS `clasificaciones_extintores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clasificaciones_extintores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clasificaciones_extintores_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `clasificaciones_extintores_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `clasificaciones_extintores_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `clasificaciones_extintores_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificaciones_extintores`
--

LOCK TABLES `clasificaciones_extintores` WRITE;
/*!40000 ALTER TABLE `clasificaciones_extintores` DISABLE KEYS */;
INSERT INTO `clasificaciones_extintores` VALUES (1,'ABC Multiproposito','Para fuegos Tipo A: solidos, maderas, telas, papel. Tipo B: liquidos inflamables y combustibles, grasas, pinturas. Tipo C: equipos electrónicos.','Activo',1,NULL,NULL,NULL),(2,'CO2','Para fuegos Tipo C: equipos electrónicos.','Activo',1,NULL,NULL,NULL),(3,'Agua a presión','Para fuegos Tipo A: solidos, maderas, telas, papel.','Activo',1,NULL,NULL,NULL),(4,'Solkaflam','Para apagar incendios de cualquier tipo de equipo eléctrico (especialmente computadoras)','Activo',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `clasificaciones_extintores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edificios`
--

DROP TABLE IF EXISTS `edificios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edificios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa_id` int(10) unsigned DEFAULT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `edificios_empresa_id_foreign` (`empresa_id`),
  KEY `edificios_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `edificios_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `edificios_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `edificios_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `edificios_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edificios`
--

LOCK TABLES `edificios` WRITE;
/*!40000 ALTER TABLE `edificios` DISABLE KEYS */;
INSERT INTO `edificios` VALUES (1,'Torre del Saber','Activo',1,1,NULL,NULL,NULL),(2,'Edificio Central','Activo',1,1,NULL,NULL,NULL),(3,'Bloque 2','Activo',1,1,NULL,NULL,NULL),(4,'IPS','Activo',1,1,NULL,NULL,NULL),(5,'Bloque 3','Activo',1,1,NULL,NULL,NULL),(6,'Vagones','Activo',1,1,NULL,NULL,NULL),(7,'Parqueadero','Activo',1,1,NULL,NULL,NULL),(8,'Economia','Activo',1,1,NULL,NULL,NULL),(9,'Biblioteca','Activo',1,1,NULL,NULL,NULL),(10,'Vagones','Activo',1,1,NULL,NULL,NULL),(11,'Bloque 12','Activo',1,1,NULL,NULL,NULL),(12,'Bloque 13','Activo',1,1,NULL,NULL,NULL),(13,'Bloque F - Edificio Fundadores','Activo',1,1,NULL,NULL,NULL),(14,'Bloque 16','Activo',1,1,NULL,NULL,NULL),(15,'Babaria','Activo',1,1,NULL,NULL,NULL),(16,'Gastronomía','Activo',1,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `edificios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empresas_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `empresas_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `empresas_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `empresas_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'Universidad Autónoma de Manizales','Activo',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `establecimientos`
--

DROP TABLE IF EXISTS `establecimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `establecimientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `establecimientos_ubicacion_id_foreign` (`ubicacion_id`),
  KEY `establecimientos_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `establecimientos_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `establecimientos_ubicacion_id_foreign` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicaciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `establecimientos_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `establecimientos_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `establecimientos`
--

LOCK TABLES `establecimientos` WRITE;
/*!40000 ALTER TABLE `establecimientos` DISABLE KEYS */;
INSERT INTO `establecimientos` VALUES (1,'Cafetería Castello',8,'Activo',2,2,'2018-07-22 21:03:31','2018-07-22 21:11:45'),(2,'Pan Extra',9,'Activo',2,2,'2018-07-22 21:13:52','2018-07-22 21:14:23');
/*!40000 ALTER TABLE `establecimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extintores`
--

DROP TABLE IF EXISTS `extintores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extintores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clasificacion_extintor_id` int(10) unsigned DEFAULT NULL,
  `capacidad` int(11) NOT NULL,
  `altura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `extintores_clasificacion_extintor_id_foreign` (`clasificacion_extintor_id`),
  KEY `extintores_ubicacion_id_foreign` (`ubicacion_id`),
  KEY `extintores_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `extintores_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `extintores_clasificacion_extintor_id_foreign` FOREIGN KEY (`clasificacion_extintor_id`) REFERENCES `clasificaciones_extintores` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `extintores_ubicacion_id_foreign` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicaciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `extintores_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `extintores_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extintores`
--

LOCK TABLES `extintores` WRITE;
/*!40000 ALTER TABLE `extintores` DISABLE KEYS */;
INSERT INTO `extintores` VALUES (1,'1',1,20,'Piso',1,'Activo',1,NULL,NULL,NULL),(2,'2',1,10,'Piso',2,'Activo',1,NULL,NULL,NULL),(3,'3',3,10,'140',3,'Activo',1,2,NULL,'2018-07-16 01:45:33'),(4,'COD-001',1,100,'Piso',10,'Activo',1,NULL,'2018-08-24 03:02:50','2018-08-24 03:02:50');
/*!40000 ALTER TABLE `extintores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formatos_inspecciones`
--

DROP TABLE IF EXISTS `formatos_inspecciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formatos_inspecciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formatos_inspecciones_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `formatos_inspecciones_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `formatos_inspecciones_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `formatos_inspecciones_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formatos_inspecciones`
--

LOCK TABLES `formatos_inspecciones` WRITE;
/*!40000 ALTER TABLE `formatos_inspecciones` DISABLE KEYS */;
INSERT INTO `formatos_inspecciones` VALUES (1,'Inspección mensual de extintores','Activo',1,NULL,NULL,NULL),(2,'Inspección mensual de insumos de botiquines','Activo',2,NULL,'2018-07-23 00:59:14','2018-07-23 00:59:14'),(3,'Lista de verificación BPM Cafeterias UAM','Activo',2,NULL,'2018-07-23 01:00:35','2018-07-23 01:00:35');
/*!40000 ALTER TABLE `formatos_inspecciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspecciones`
--

DROP TABLE IF EXISTS `inspecciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inspecciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `inspeccion_clasificacion_id` int(10) unsigned DEFAULT NULL,
  `formato_inspeccion_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado_inspeccion` enum('Pendiente','Realizada','Cancelada') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inspecciones_inspeccion_clasificacion_id_foreign` (`inspeccion_clasificacion_id`),
  KEY `inspecciones_formato_inspeccion_id_foreign` (`formato_inspeccion_id`),
  KEY `inspecciones_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `inspecciones_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `inspecciones_formato_inspeccion_id_foreign` FOREIGN KEY (`formato_inspeccion_id`) REFERENCES `formatos_inspecciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `inspecciones_inspeccion_clasificacion_id_foreign` FOREIGN KEY (`inspeccion_clasificacion_id`) REFERENCES `inspecciones_clasificaciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `inspecciones_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `inspecciones_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspecciones`
--

LOCK TABLES `inspecciones` WRITE;
/*!40000 ALTER TABLE `inspecciones` DISABLE KEYS */;
INSERT INTO `inspecciones` VALUES (1,'2018-07-24','15:00:00',1,1,'Activo',2,2,'2018-07-23 01:05:32','2018-07-31 00:23:40','Realizada'),(2,'2018-07-24','15:00:00',1,1,'Activo',2,2,'2018-07-23 01:05:33','2018-07-31 00:38:18','Realizada'),(3,'2018-07-24','15:00:00',1,1,'Activo',2,2,'2018-07-23 01:05:33','2018-07-31 01:36:44','Realizada'),(4,'2018-07-31','19:30:00',2,2,'Activo',2,2,'2018-07-31 00:52:54','2018-07-31 00:53:22','Realizada'),(5,'2018-07-31','19:30:00',2,2,'Activo',2,2,'2018-07-31 00:52:54','2018-07-31 00:53:42','Realizada'),(6,'2018-08-03','12:00:00',2,2,'Activo',2,NULL,'2018-07-31 01:46:43','2018-07-31 01:46:43','Pendiente'),(7,'2018-08-03','12:00:00',2,2,'Activo',2,2,'2018-07-31 01:46:43','2018-07-31 05:03:56','Realizada'),(8,'2018-08-03','15:00:00',3,3,'Activo',2,2,'2018-07-31 04:33:14','2018-08-12 20:17:05','Realizada'),(9,'2018-08-03','15:00:00',3,3,'Activo',2,2,'2018-07-31 04:33:14','2018-08-25 19:37:30','Realizada'),(10,'2018-08-16','12:00:00',1,1,'Activo',2,2,'2018-07-31 05:04:37','2018-07-31 05:04:58','Realizada'),(11,'2018-08-16','12:00:00',1,1,'Activo',2,2,'2018-07-31 05:04:37','2018-08-17 02:41:07','Realizada'),(12,'2018-08-16','12:00:00',1,1,'Activo',2,NULL,'2018-07-31 05:04:37','2018-07-31 05:04:37','Pendiente');
/*!40000 ALTER TABLE `inspecciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspecciones_clasificaciones`
--

DROP TABLE IF EXISTS `inspecciones_clasificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inspecciones_clasificaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inspecciones_clasificaciones_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `inspecciones_clasificaciones_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `inspecciones_clasificaciones_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `inspecciones_clasificaciones_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspecciones_clasificaciones`
--

LOCK TABLES `inspecciones_clasificaciones` WRITE;
/*!40000 ALTER TABLE `inspecciones_clasificaciones` DISABLE KEYS */;
INSERT INTO `inspecciones_clasificaciones` VALUES (1,'Extintores','Activo',1,NULL,NULL,NULL),(2,'Botiquines','Activo',1,NULL,NULL,NULL),(3,'BPM','Activo',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `inspecciones_clasificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspecciones_establecimientos`
--

DROP TABLE IF EXISTS `inspecciones_establecimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inspecciones_establecimientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inspeccion_id` int(10) unsigned DEFAULT NULL,
  `establecimiento_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inspecciones_establecimientos_inspeccion_id_foreign` (`inspeccion_id`),
  KEY `inspecciones_establecimientos_establecimiento_id_foreign` (`establecimiento_id`),
  CONSTRAINT `inspecciones_establecimientos_establecimiento_id_foreign` FOREIGN KEY (`establecimiento_id`) REFERENCES `establecimientos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `inspecciones_establecimientos_inspeccion_id_foreign` FOREIGN KEY (`inspeccion_id`) REFERENCES `inspecciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspecciones_establecimientos`
--

LOCK TABLES `inspecciones_establecimientos` WRITE;
/*!40000 ALTER TABLE `inspecciones_establecimientos` DISABLE KEYS */;
INSERT INTO `inspecciones_establecimientos` VALUES (1,8,1,'Activo','2018-07-31 04:33:14','2018-08-12 20:17:05'),(2,9,2,'Activo','2018-07-31 04:33:14','2018-08-12 20:17:10');
/*!40000 ALTER TABLE `inspecciones_establecimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspecciones_extintores`
--

DROP TABLE IF EXISTS `inspecciones_extintores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inspecciones_extintores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inspeccion_id` int(10) unsigned DEFAULT NULL,
  `extintor_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inspecciones_extintores_inspeccion_id_foreign` (`inspeccion_id`),
  KEY `inspecciones_extintores_extintor_id_foreign` (`extintor_id`),
  CONSTRAINT `inspecciones_extintores_extintor_id_foreign` FOREIGN KEY (`extintor_id`) REFERENCES `extintores` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `inspecciones_extintores_inspeccion_id_foreign` FOREIGN KEY (`inspeccion_id`) REFERENCES `inspecciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspecciones_extintores`
--

LOCK TABLES `inspecciones_extintores` WRITE;
/*!40000 ALTER TABLE `inspecciones_extintores` DISABLE KEYS */;
INSERT INTO `inspecciones_extintores` VALUES (1,1,1,'Activo','2018-07-23 01:05:33','2018-07-23 01:05:33'),(2,2,2,'Activo','2018-07-23 01:05:33','2018-07-23 01:05:33'),(3,3,3,'Activo','2018-07-23 01:05:33','2018-07-23 01:05:33'),(4,10,1,'Activo','2018-07-31 05:04:37','2018-07-31 05:04:37'),(5,11,2,'Activo','2018-07-31 05:04:37','2018-07-31 05:04:37'),(6,12,3,'Activo','2018-07-31 05:04:37','2018-07-31 05:04:37');
/*!40000 ALTER TABLE `inspecciones_extintores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspecciones_insumos_botiquines`
--

DROP TABLE IF EXISTS `inspecciones_insumos_botiquines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inspecciones_insumos_botiquines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inspeccion_id` int(10) unsigned DEFAULT NULL,
  `insumo_botiquin_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inspecciones_insumos_botiquines_inspeccion_id_foreign` (`inspeccion_id`),
  KEY `inspecciones_insumos_botiquines_insumo_botiquin_id_foreign` (`insumo_botiquin_id`),
  CONSTRAINT `inspecciones_insumos_botiquines_inspeccion_id_foreign` FOREIGN KEY (`inspeccion_id`) REFERENCES `inspecciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `inspecciones_insumos_botiquines_insumo_botiquin_id_foreign` FOREIGN KEY (`insumo_botiquin_id`) REFERENCES `insumos_botiquin` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspecciones_insumos_botiquines`
--

LOCK TABLES `inspecciones_insumos_botiquines` WRITE;
/*!40000 ALTER TABLE `inspecciones_insumos_botiquines` DISABLE KEYS */;
INSERT INTO `inspecciones_insumos_botiquines` VALUES (1,4,1,'Activo','2018-07-31 00:52:54','2018-07-31 00:52:54'),(2,5,2,'Activo','2018-07-31 00:52:54','2018-07-31 00:52:54'),(3,6,1,'Activo','2018-07-31 01:46:43','2018-07-31 01:46:43'),(4,7,2,'Activo','2018-07-31 01:46:43','2018-07-31 01:46:43');
/*!40000 ALTER TABLE `inspecciones_insumos_botiquines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insumos_botiquin`
--

DROP TABLE IF EXISTS `insumos_botiquin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insumos_botiquin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('Fármaco','Utencilio') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `botiquin_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `insumos_botiquin_botiquin_id_foreign` (`botiquin_id`),
  KEY `insumos_botiquin_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `insumos_botiquin_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `insumos_botiquin_botiquin_id_foreign` FOREIGN KEY (`botiquin_id`) REFERENCES `botiquines` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `insumos_botiquin_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `insumos_botiquin_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insumos_botiquin`
--

LOCK TABLES `insumos_botiquin` WRITE;
/*!40000 ALTER TABLE `insumos_botiquin` DISABLE KEYS */;
INSERT INTO `insumos_botiquin` VALUES (1,'Algodón Turundas','Utencilio','2019-07-22',10,1,'Activo',2,NULL,'2018-07-22 20:34:21','2018-07-22 20:34:21'),(2,'Tijeras corta todo','Utencilio',NULL,1,1,'Activo',2,2,'2018-07-22 20:45:41','2018-07-22 20:47:22'),(3,'Algodón','Utencilio',NULL,1,2,'Activo',2,NULL,'2018-08-24 22:34:41','2018-08-24 22:34:41'),(4,'Acetaminofén','Fármaco','2020-02-20',10,2,'Activo',2,NULL,'2018-08-24 22:35:03','2018-08-24 22:35:03');
/*!40000 ALTER TABLE `insumos_botiquin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_04_03_235634_empresas',1),(4,'2018_04_04_004214_edificios',1),(5,'2018_04_04_011508_ubicaciones',1),(6,'2018_04_04_014053_clasificaciones_extintores',1),(7,'2018_04_04_234721_extintores',1),(8,'2018_04_04_234818_recargas_extintores',1),(9,'2018_04_04_235449_tipos_botiquines',1),(10,'2018_04_05_000038_botiquines',1),(11,'2018_04_05_000858_insumos_botiquin',1),(12,'2018_04_06_005049_establecimientos',1),(13,'2018_04_06_011100_inspecciones_clasificaciones',1),(14,'2018_04_06_013931_formatos_inspecciones',1),(15,'2018_04_06_014143_tipos_preguntas',1),(16,'2018_04_06_014654_opciones_respuestas',1),(17,'2018_04_06_023836_preguntas_formatos',1),(18,'2018_04_06_025356_inspecciones',1),(19,'2018_04_06_025908_respuestas_inspecciones',1),(20,'2018_04_06_032401_inspecciones_extintores',1),(21,'2018_04_06_032739_inspecciones_insumos_botiquines',1),(22,'2018_04_06_032912_inspecciones_establecimientos',1),(23,'2018_05_20_221815_add_estado_inspeccion_to_inspecciones_table',1),(24,'2018_07_05_030913_add_descripcion_to_clasificacion_extintor_table',1),(25,'2018_07_15_225044_categorias_preguntas_formatos',1),(26,'2018_07_15_225645_add_observaciones_to_respuestas_inspecciones_table',1),(27,'2018_07_15_230151_add_categoria_to_preguntas_formatos_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opciones_respuestas`
--

DROP TABLE IF EXISTS `opciones_respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opciones_respuestas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_pregunta_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opciones_respuestas_tipo_pregunta_id_foreign` (`tipo_pregunta_id`),
  KEY `opciones_respuestas_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `opciones_respuestas_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `opciones_respuestas_tipo_pregunta_id_foreign` FOREIGN KEY (`tipo_pregunta_id`) REFERENCES `tipos_preguntas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `opciones_respuestas_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `opciones_respuestas_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opciones_respuestas`
--

LOCK TABLES `opciones_respuestas` WRITE;
/*!40000 ALTER TABLE `opciones_respuestas` DISABLE KEYS */;
INSERT INTO `opciones_respuestas` VALUES (1,'Cumple',1,'Activo',1,NULL,NULL,NULL),(2,'No Cumple',1,'Activo',1,NULL,NULL,NULL),(3,'Bueno',2,'Activo',1,NULL,NULL,NULL),(4,'Regular',2,'Activo',1,NULL,NULL,NULL),(5,'Malo',2,'Activo',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `opciones_respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas_formatos`
--

DROP TABLE IF EXISTS `preguntas_formatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas_formatos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_pregunta_formato_id` int(10) unsigned DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_pregunta_id` int(10) unsigned DEFAULT NULL,
  `formato_inspeccion_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preguntas_formatos_tipo_pregunta_id_foreign` (`tipo_pregunta_id`),
  KEY `preguntas_formatos_formato_inspeccion_id_foreign` (`formato_inspeccion_id`),
  KEY `preguntas_formatos_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `preguntas_formatos_user_id_modificacion_foreign` (`user_id_modificacion`),
  KEY `preguntas_formatos_categoria_pregunta_formato_id_foreign` (`categoria_pregunta_formato_id`),
  CONSTRAINT `preguntas_formatos_categoria_pregunta_formato_id_foreign` FOREIGN KEY (`categoria_pregunta_formato_id`) REFERENCES `categorias_preguntas_formatos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `preguntas_formatos_formato_inspeccion_id_foreign` FOREIGN KEY (`formato_inspeccion_id`) REFERENCES `formatos_inspecciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `preguntas_formatos_tipo_pregunta_id_foreign` FOREIGN KEY (`tipo_pregunta_id`) REFERENCES `tipos_preguntas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `preguntas_formatos_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `preguntas_formatos_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas_formatos`
--

LOCK TABLES `preguntas_formatos` WRITE;
/*!40000 ALTER TABLE `preguntas_formatos` DISABLE KEYS */;
INSERT INTO `preguntas_formatos` VALUES (1,1,'Estado de la boquilla',2,1,'Activo',2,2,'2018-07-22 22:34:17','2018-07-22 22:52:00'),(2,1,'Estado del cilindro',2,1,'Activo',2,2,'2018-07-22 22:39:29','2018-07-22 22:57:45'),(3,2,'Fecha de vencimiento',3,2,'Activo',2,NULL,'2018-07-23 00:59:35','2018-07-23 00:59:35'),(4,2,'Cantidad',4,2,'Activo',2,NULL,'2018-07-23 00:59:53','2018-07-23 00:59:53'),(5,3,'El establecimiento destinado al funcionamiento de restaurantes y servicios a fines esta ubicado en un lugar libre de plagas, humos, polvo, malos olores, inundaciones y de cualquier otra fuente de contaminación',1,3,'Activo',2,NULL,'2018-07-23 01:02:08','2018-07-23 01:02:08'),(6,3,'Los pisos son construidos con materiales impermeables, inabsorventes, lavables y antideslizantes, no tienen grietas y son fáciles de limpiar y desinfectar',1,3,'Activo',2,NULL,'2018-07-23 01:04:43','2018-07-23 01:04:43'),(7,3,'Las paredes son de materiales impermeables, inabsorbentes y lavables y de color claro. Son lisas, sin grietas y fáciles de limpiar y desinfectar. Se mantiene en buen estado de conservación e higiene',1,3,'Activo',2,2,'2018-08-12 19:58:10','2018-08-12 19:58:34'),(8,3,'Los techos son construidos y acabados de manera que se limpia la acumulación de suciedad y ser fáciles de limpiar.',1,3,'Activo',2,NULL,'2018-08-12 19:58:26','2018-08-12 19:58:26'),(9,3,'Las ventanas y otras aberturas están construidas de manera que se evita la acumulación de suciedad y están provistas de protección contra insectos u otros animales y facilita su limpieza y buena conservación',1,3,'Activo',2,NULL,'2018-08-12 19:58:54','2018-08-12 19:58:54'),(10,3,'Las puestas son de superficie lisa e inabsorbentes, además tienen cierre hermético en los ambientes donde se preparan alimentos',1,3,'Activo',2,NULL,'2018-08-12 19:59:17','2018-08-12 19:59:17'),(11,4,'En el caso de bombillas y lámparas suspendidas, estas deben aislarse con protectores que eviten la contaminación de los alimentos en caso de rotura',1,3,'Activo',2,NULL,'2018-08-12 19:59:44','2018-08-12 19:59:44'),(12,4,'Debe proveerse una ventilación suficiente para evitar el calor acumulado excesivo, la condensación del vapor, el polvo y, para eliminar el aire contaminado',1,3,'Activo',2,NULL,'2018-08-12 20:00:00','2018-08-12 20:00:00'),(13,4,'Se debe instalar una campana extractora sobre los aparatos de cocción de tamaño suficiente para eliminar eficazmente los vapores de la cocción',1,3,'Activo',2,NULL,'2018-08-12 20:00:16','2018-08-12 20:00:16'),(14,5,'El establecimiento dispone de agua potable de la red pública, cuenta con suministro permanente y en cantidad suficiente para atender las actividades del establecimiento',1,3,'Activo',2,NULL,'2018-08-12 20:00:35','2018-08-12 20:00:35'),(15,5,'El sistema de evacuación de aguas residuales esta en buen estado de funcionamiento y esta protegido para evitar el ingreso de roedores e insectos al establecimiento',1,3,'Activo',2,2,'2018-08-12 20:00:48','2018-08-12 20:01:00'),(16,5,'Los conductos de evacuación de aguas residuales están diseñados para soportar cargas máximas, contar con trampa de grasas y evitar la contaminación del sistema de agua potable',1,3,'Activo',2,NULL,'2018-08-12 20:01:17','2018-08-12 20:01:17'),(17,5,'El piso del área de cocina cuenta con un sistema de evacuación para las aguas residuales que facilite las actividades de higiene',1,3,'Activo',2,NULL,'2018-08-12 20:01:33','2018-08-12 20:01:33'),(18,5,'Los residuos sólidos se disponen en recipientes de plástico, en buen estado de conservación e higiene, con tapa oscilante o similar que evite el contacto con las manos y deben tener una bolsa de plástico en el interior para facilitar la evacuación de los residuos',1,3,'Activo',2,NULL,'2018-08-12 20:04:29','2018-08-12 20:04:29'),(19,6,'Los equipos y utensilios que se emplean, son de material de fácil limpieza y desinfección, resistente a la corrosión, que no transmitan sustancias tóxicas, olores, ni sabores a los alimentos. Son capaces de resistir repetidas operaciones de limpieza y desinfección.',1,3,'Activo',2,2,'2018-08-12 20:06:30','2018-08-12 20:06:51'),(20,7,'El responsable de la recepción de las materias primas, ingredientes y productos procesados tiene capacitación en Higiene de los Alimentos',1,3,'Activo',2,NULL,'2018-08-12 20:07:30','2018-08-12 20:07:30'),(21,8,'El diseño debe permitir que todas las operaciones se realicen en condiciones higiénicas, sin generar riesgos de contaminación cruzada y con la fluidez necesaria para el proceso de elaboración, desde la preparación previa hasta el servido',1,3,'Activo',2,2,'2018-08-12 20:09:30','2018-08-17 02:57:40'),(22,9,'Las carnes, pescados, mariscos y viseras se lavarán con agua potable corriente antes de someterlas al proceso de cocción',1,3,'Activo',2,NULL,'2018-08-12 20:09:53','2018-08-12 20:09:53'),(23,10,'La vajilla, cubiertos y vasos están limpios, desinfectados y en buen estado de conservación e higiene',1,3,'Activo',2,NULL,'2018-08-12 20:10:18','2018-08-12 20:10:18'),(24,11,'Las bebidas envasadas (jugos, refrescos, gaseosas o similares) se sirven en sus envases originales',1,3,'Activo',2,NULL,'2018-08-12 20:10:37','2018-08-12 20:10:37'),(25,12,'La administración del restaurante o servicios afines es responsable del control médico periódico de los manipuladores de alimentos que trabajan en dichos establecimientos',1,3,'Activo',2,NULL,'2018-08-12 20:11:13','2018-08-12 20:11:13'),(26,13,'El establecimiento cuenta con un programa de higiene y saneamiento en el cual se incluyan los procedimientos de limpieza y desinfección',1,3,'Activo',2,NULL,'2018-08-12 20:11:41','2018-08-12 20:11:41');
/*!40000 ALTER TABLE `preguntas_formatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recargas_extintores`
--

DROP TABLE IF EXISTS `recargas_extintores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recargas_extintores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_recarga` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `extintor_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recargas_extintores_extintor_id_foreign` (`extintor_id`),
  KEY `recargas_extintores_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `recargas_extintores_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `recargas_extintores_extintor_id_foreign` FOREIGN KEY (`extintor_id`) REFERENCES `extintores` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `recargas_extintores_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `recargas_extintores_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recargas_extintores`
--

LOCK TABLES `recargas_extintores` WRITE;
/*!40000 ALTER TABLE `recargas_extintores` DISABLE KEYS */;
INSERT INTO `recargas_extintores` VALUES (1,'2017-06-29','2018-07-30',1,'Activo',1,NULL,NULL,NULL),(2,'2017-06-29','2018-07-30',2,'Activo',1,NULL,NULL,NULL),(3,'2017-06-29','2018-07-30',3,'Activo',1,2,NULL,'2018-07-16 01:45:33'),(4,'2018-08-23','2019-08-23',4,'Activo',1,NULL,'2018-08-24 03:02:50','2018-08-24 03:02:50');
/*!40000 ALTER TABLE `recargas_extintores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas_inspecciones`
--

DROP TABLE IF EXISTS `respuestas_inspecciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas_inspecciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pregunta_formato_id` int(10) unsigned DEFAULT NULL,
  `inspeccion_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `respuestas_inspecciones_pregunta_formato_id_foreign` (`pregunta_formato_id`),
  KEY `respuestas_inspecciones_inspeccion_id_foreign` (`inspeccion_id`),
  KEY `respuestas_inspecciones_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `respuestas_inspecciones_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `respuestas_inspecciones_inspeccion_id_foreign` FOREIGN KEY (`inspeccion_id`) REFERENCES `inspecciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `respuestas_inspecciones_pregunta_formato_id_foreign` FOREIGN KEY (`pregunta_formato_id`) REFERENCES `preguntas_formatos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `respuestas_inspecciones_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `respuestas_inspecciones_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas_inspecciones`
--

LOCK TABLES `respuestas_inspecciones` WRITE;
/*!40000 ALTER TABLE `respuestas_inspecciones` DISABLE KEYS */;
INSERT INTO `respuestas_inspecciones` VALUES (1,'Bueno',NULL,1,1,'Activo',2,NULL,'2018-07-31 00:23:40','2018-07-31 00:23:40'),(2,'Regular',NULL,2,1,'Activo',2,NULL,'2018-07-31 00:23:40','2018-07-31 00:23:40'),(3,'Regular','Agrietado',1,2,'Activo',2,NULL,'2018-07-31 00:38:18','2018-07-31 00:38:18'),(4,'Regular','Muy oxidado',2,2,'Activo',2,NULL,'2018-07-31 00:38:18','2018-07-31 00:38:18'),(5,'0000-00-00',NULL,3,4,'Activo',2,NULL,'2018-07-31 00:53:22','2018-07-31 00:53:22'),(6,'10',NULL,4,4,'Activo',2,NULL,'2018-07-31 00:53:22','2018-07-31 00:53:22'),(7,'0000-00-00',NULL,3,5,'Activo',2,NULL,'2018-07-31 00:53:42','2018-07-31 00:53:42'),(8,'1',NULL,4,5,'Activo',2,NULL,'2018-07-31 00:53:42','2018-07-31 00:53:42'),(9,'Bueno',NULL,1,3,'Activo',2,NULL,'2018-07-31 01:36:44','2018-07-31 01:36:44'),(10,'Bueno',NULL,2,3,'Activo',2,NULL,'2018-07-31 01:36:44','2018-07-31 01:36:44'),(11,'Ejemplo',NULL,NULL,3,'Activo',2,NULL,'2018-07-31 01:36:44','2018-07-31 01:36:44'),(12,'Cumple',NULL,1,1,'Activo',2,NULL,'2018-07-31 04:58:32','2018-07-31 04:58:32'),(13,'No Cumple',NULL,2,1,'Activo',2,NULL,'2018-07-31 04:58:32','2018-07-31 04:58:32'),(14,'0000-00-00',NULL,3,7,'Activo',2,NULL,'2018-07-31 05:03:56','2018-07-31 05:03:56'),(15,'1',NULL,4,7,'Activo',2,NULL,'2018-07-31 05:03:56','2018-07-31 05:03:56'),(16,'Bueno',NULL,1,10,'Activo',2,NULL,'2018-07-31 05:04:58','2018-07-31 05:04:58'),(17,'Bueno',NULL,2,10,'Activo',2,NULL,'2018-07-31 05:04:58','2018-07-31 05:04:58'),(18,'hola',NULL,NULL,10,'Activo',2,NULL,'2018-07-31 05:04:58','2018-07-31 05:04:58'),(19,'Cumple',NULL,1,1,'Activo',2,NULL,'2018-07-31 05:05:27','2018-07-31 05:05:27'),(20,'Cumple',NULL,2,1,'Activo',2,NULL,'2018-07-31 05:05:27','2018-07-31 05:05:27'),(21,'Cumple',NULL,1,1,'Activo',2,NULL,'2018-07-31 05:07:13','2018-07-31 05:07:13'),(22,'Cumple',NULL,2,1,'Activo',2,NULL,'2018-07-31 05:07:14','2018-07-31 05:07:14'),(23,'Cumple',NULL,5,8,'Activo',2,NULL,'2018-07-31 05:09:38','2018-07-31 05:09:38'),(24,'No Cumple',NULL,6,8,'Activo',2,NULL,'2018-07-31 05:09:38','2018-07-31 05:09:38'),(25,'Bueno',NULL,1,11,'Activo',2,NULL,'2018-08-17 02:41:07','2018-08-17 02:41:07'),(26,'Bueno',NULL,2,11,'Activo',2,NULL,'2018-08-17 02:41:07','2018-08-17 02:41:07'),(27,'Cumple',NULL,5,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(28,'Cumple',NULL,6,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(29,'Cumple',NULL,7,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(30,'Cumple',NULL,8,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(31,'Cumple',NULL,9,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(32,'Cumple',NULL,10,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(33,'No Cumple','No aplica',11,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(34,'Cumple',NULL,12,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(35,'Cumple',NULL,13,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(36,'Cumple',NULL,14,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(37,'Cumple',NULL,15,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(38,'Cumple',NULL,16,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(39,'Cumple',NULL,17,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(40,'Cumple',NULL,18,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(41,'Cumple',NULL,19,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(42,'Cumple',NULL,20,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(43,'Cumple',NULL,21,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(44,'Cumple',NULL,22,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(45,'Cumple',NULL,23,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(46,'Cumple',NULL,24,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(47,'Cumple',NULL,25,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30'),(48,'Cumple',NULL,26,9,'Activo',2,NULL,'2018-08-25 19:37:30','2018-08-25 19:37:30');
/*!40000 ALTER TABLE `respuestas_inspecciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_botiquines`
--

DROP TABLE IF EXISTS `tipos_botiquines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_botiquines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipos_botiquines_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `tipos_botiquines_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `tipos_botiquines_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tipos_botiquines_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_botiquines`
--

LOCK TABLES `tipos_botiquines` WRITE;
/*!40000 ALTER TABLE `tipos_botiquines` DISABLE KEYS */;
INSERT INTO `tipos_botiquines` VALUES (1,'Básico','Activo',1,NULL,NULL,NULL),(2,'Avanzado','Activo',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tipos_botiquines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_preguntas`
--

DROP TABLE IF EXISTS `tipos_preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_preguntas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipos_preguntas_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `tipos_preguntas_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `tipos_preguntas_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tipos_preguntas_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_preguntas`
--

LOCK TABLES `tipos_preguntas` WRITE;
/*!40000 ALTER TABLE `tipos_preguntas` DISABLE KEYS */;
INSERT INTO `tipos_preguntas` VALUES (1,'Cumple/NoCumple','Activo',1,NULL,NULL,NULL),(2,'Estado','Activo',1,NULL,NULL,NULL),(3,'Fecha','Activo',1,NULL,NULL,NULL),(4,'Abierta','Activo',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tipos_preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicaciones`
--

DROP TABLE IF EXISTS `ubicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `piso` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `edificio_id` int(10) unsigned DEFAULT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ubicaciones_edificio_id_foreign` (`edificio_id`),
  KEY `ubicaciones_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `ubicaciones_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `ubicaciones_edificio_id_foreign` FOREIGN KEY (`edificio_id`) REFERENCES `edificios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `ubicaciones_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `ubicaciones_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicaciones`
--

LOCK TABLES `ubicaciones` WRITE;
/*!40000 ALTER TABLE `ubicaciones` DISABLE KEYS */;
INSERT INTO `ubicaciones` VALUES (1,'1','Frente a la oficina del rector','Activo',1,1,NULL,NULL,NULL),(2,'4','Al lado de las sombrillas','Activo',2,1,NULL,NULL,NULL),(3,'5','Al costado del salón 503','Activo',3,1,2,NULL,'2018-07-16 01:45:33'),(4,'1','Salón de Música','Activo',1,1,NULL,NULL,NULL),(5,'1','Mercadeo (Antiguo)','Activo',2,1,NULL,NULL,NULL),(6,'1','Almacen','Activo',2,1,NULL,NULL,NULL),(7,'1','Mercadeo (Antiguo)','Activo',14,2,2,'2018-07-16 01:36:29','2018-07-16 02:37:02'),(8,'1','Enseguida de la portería de Sacatín','Activo',14,2,2,'2018-07-22 21:03:31','2018-07-22 21:11:59'),(9,'1','Parque de los estudiantes','Activo',12,2,NULL,'2018-07-22 21:13:52','2018-07-22 21:13:52'),(10,'1','Frente a sala de juntas','Activo',1,1,NULL,'2018-08-24 03:02:49','2018-08-24 03:02:49'),(11,'2','Oficinas','Activo',5,2,NULL,'2018-08-24 22:34:24','2018-08-24 22:34:24');
/*!40000 ALTER TABLE `ubicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` enum('Administrador','APH') COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','Super','admin@gmail.com','$2y$10$O2obw4U32ov9/ew4G3rpZOg.jYWKawLweBbOoDKZDjrMQ5PMsKE4y','Administrador','Activo',NULL,NULL,NULL),(2,'Elizabeth','Betancurth','elizabetancurth@gmail.com','$2y$10$sb364VC0WiytR4tc0E8k4O0RXw279ugb2UmgxTY5CfcfcR3ackvMu','Administrador','Activo',NULL,NULL,NULL),(3,'Daniel','Arboleda','daniel@gmail.com','$2y$10$3TjFMCEa1Wbjce769mir7.N9sQRBH0lF2W2u5tHGCq9hc1320dnJa','APH','Activo',NULL,NULL,NULL);
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

-- Dump completed on 2018-09-02 21:03:20
