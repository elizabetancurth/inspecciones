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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `botiquines`
--

LOCK TABLES `botiquines` WRITE;
/*!40000 ALTER TABLE `botiquines` DISABLE KEYS */;
INSERT INTO `botiquines` VALUES (1,'COD-0001',1,8,'Activo',1,NULL,NULL,'2018-05-26 17:19:59','2018-05-26 17:19:59');
/*!40000 ALTER TABLE `botiquines` ENABLE KEYS */;
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
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `clasificaciones_extintores` VALUES (1,'ABC Multiproposito','Activo',1,NULL,NULL,NULL,NULL),(2,'CO2','Activo',1,NULL,NULL,NULL,NULL),(3,'Agua a presión','Activo',1,NULL,NULL,NULL,NULL),(4,'Solkaflam','Activo',1,NULL,NULL,NULL,NULL);
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `edificios_empresa_id_foreign` (`empresa_id`),
  KEY `edificios_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `edificios_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `edificios_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `edificios_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `edificios_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edificios`
--

LOCK TABLES `edificios` WRITE;
/*!40000 ALTER TABLE `edificios` DISABLE KEYS */;
INSERT INTO `edificios` VALUES (1,'Torre del Saber','Activo',1,1,NULL,NULL,NULL,NULL),(2,'Edificio Central','Activo',1,1,NULL,NULL,NULL,NULL),(3,'Bloque 2','Activo',1,1,NULL,NULL,NULL,NULL);
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `empresas` VALUES (1,'Universidad Autónoma de Manizales','Activo',1,NULL,NULL,NULL,NULL);
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `establecimientos_ubicacion_id_foreign` (`ubicacion_id`),
  KEY `establecimientos_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `establecimientos_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `establecimientos_ubicacion_id_foreign` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicaciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `establecimientos_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `establecimientos_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `establecimientos`
--

LOCK TABLES `establecimientos` WRITE;
/*!40000 ALTER TABLE `establecimientos` DISABLE KEYS */;
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `extintores` VALUES (1,'1',1,20,'Piso',1,'Activo',1,NULL,NULL,NULL,NULL),(2,'2',1,10,'Piso',2,'Activo',1,NULL,NULL,NULL,NULL),(3,'3',1,10,'140',3,'Activo',1,NULL,NULL,NULL,NULL),(4,'4',1,10,'Gabinete',7,'Activo',1,1,NULL,'2018-05-26 17:18:45','2018-05-26 17:19:28');
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formatos_inspecciones_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `formatos_inspecciones_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `formatos_inspecciones_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `formatos_inspecciones_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formatos_inspecciones`
--

LOCK TABLES `formatos_inspecciones` WRITE;
/*!40000 ALTER TABLE `formatos_inspecciones` DISABLE KEYS */;
INSERT INTO `formatos_inspecciones` VALUES (1,'Inspección mensual de extintores','Activo',1,NULL,NULL,NULL,NULL),(2,'Inspección de insumos de botiquines','Activo',1,NULL,NULL,'2018-05-26 17:51:45','2018-05-26 17:51:45');
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspecciones`
--

LOCK TABLES `inspecciones` WRITE;
/*!40000 ALTER TABLE `inspecciones` DISABLE KEYS */;
INSERT INTO `inspecciones` VALUES (1,'2018-05-21','08:00:00',1,1,'Inactivo',1,1,NULL,'2018-05-22 04:09:06','2018-05-26 17:20:59','Realizada'),(2,'2018-05-21','08:00:00',1,1,'Activo',1,1,NULL,'2018-05-22 04:09:07','2018-05-22 05:43:17','Realizada'),(3,'2018-05-21','08:00:00',1,1,'Activo',1,1,NULL,'2018-05-22 04:09:07','2018-05-22 04:45:56','Pendiente'),(5,'2018-05-21','14:00:00',2,2,'Activo',1,NULL,NULL,'2018-05-26 18:35:26','2018-05-26 18:35:26','Pendiente'),(6,'2018-05-21','14:00:00',2,2,'Activo',1,NULL,NULL,'2018-05-26 18:35:26','2018-05-26 18:35:26','Pendiente'),(7,'2018-06-21','08:00:00',2,2,'Activo',1,NULL,NULL,'2018-05-28 08:30:35','2018-05-28 08:30:35','Pendiente'),(8,'2018-06-21','08:00:00',2,2,'Activo',1,NULL,NULL,'2018-05-28 08:30:36','2018-05-28 08:30:36','Pendiente');
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `inspecciones_clasificaciones` VALUES (1,'Extintores','Activo',1,NULL,NULL,NULL,NULL),(2,'Botiquines','Activo',1,NULL,NULL,NULL,NULL),(3,'BPM','Activo',1,NULL,NULL,NULL,NULL);
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inspecciones_establecimientos_inspeccion_id_foreign` (`inspeccion_id`),
  KEY `inspecciones_establecimientos_establecimiento_id_foreign` (`establecimiento_id`),
  CONSTRAINT `inspecciones_establecimientos_establecimiento_id_foreign` FOREIGN KEY (`establecimiento_id`) REFERENCES `establecimientos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `inspecciones_establecimientos_inspeccion_id_foreign` FOREIGN KEY (`inspeccion_id`) REFERENCES `inspecciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspecciones_establecimientos`
--

LOCK TABLES `inspecciones_establecimientos` WRITE;
/*!40000 ALTER TABLE `inspecciones_establecimientos` DISABLE KEYS */;
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inspecciones_extintores_inspeccion_id_foreign` (`inspeccion_id`),
  KEY `inspecciones_extintores_extintor_id_foreign` (`extintor_id`),
  CONSTRAINT `inspecciones_extintores_extintor_id_foreign` FOREIGN KEY (`extintor_id`) REFERENCES `extintores` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `inspecciones_extintores_inspeccion_id_foreign` FOREIGN KEY (`inspeccion_id`) REFERENCES `inspecciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspecciones_extintores`
--

LOCK TABLES `inspecciones_extintores` WRITE;
/*!40000 ALTER TABLE `inspecciones_extintores` DISABLE KEYS */;
INSERT INTO `inspecciones_extintores` VALUES (1,1,1,'Inactivo',NULL,'2018-05-22 04:09:07','2018-05-26 17:20:59'),(2,2,2,'Activo',NULL,'2018-05-22 04:09:07','2018-05-22 04:45:47'),(3,3,3,'Activo',NULL,'2018-05-22 04:09:07','2018-05-22 04:45:56');
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `inspecciones_insumos_botiquines` VALUES (1,5,1,'Activo',NULL,'2018-05-26 18:35:26','2018-05-26 18:35:26'),(2,6,2,'Activo',NULL,'2018-05-26 18:35:26','2018-05-26 18:35:26'),(3,7,1,'Activo',NULL,'2018-05-28 08:30:35','2018-05-28 08:30:35'),(4,8,2,'Activo',NULL,'2018-05-28 08:30:36','2018-05-28 08:30:36');
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `insumos_botiquin_botiquin_id_foreign` (`botiquin_id`),
  KEY `insumos_botiquin_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `insumos_botiquin_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `insumos_botiquin_botiquin_id_foreign` FOREIGN KEY (`botiquin_id`) REFERENCES `botiquines` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `insumos_botiquin_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `insumos_botiquin_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insumos_botiquin`
--

LOCK TABLES `insumos_botiquin` WRITE;
/*!40000 ALTER TABLE `insumos_botiquin` DISABLE KEYS */;
INSERT INTO `insumos_botiquin` VALUES (1,'Algodón','Utencilio',NULL,10,1,'Activo',1,NULL,NULL,'2018-05-26 17:20:18','2018-05-26 17:20:18'),(2,'Acetaminofén','Fármaco','2020-05-30',10,1,'Activo',1,NULL,NULL,'2018-05-26 17:20:41','2018-05-26 17:20:41');
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
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (70,'2014_10_12_000000_create_users_table',1),(71,'2014_10_12_100000_create_password_resets_table',1),(72,'2018_04_03_235634_empresas',1),(73,'2018_04_04_004214_edificios',1),(74,'2018_04_04_011508_ubicaciones',1),(75,'2018_04_04_014053_clasificaciones_extintores',1),(76,'2018_04_04_234721_extintores',1),(77,'2018_04_04_234818_recargas_extintores',1),(78,'2018_04_04_235449_tipos_botiquines',1),(79,'2018_04_05_000038_botiquines',1),(80,'2018_04_05_000858_insumos_botiquin',1),(81,'2018_04_06_005049_establecimientos',1),(82,'2018_04_06_011100_inspecciones_clasificaciones',1),(83,'2018_04_06_013931_formatos_inspecciones',1),(84,'2018_04_06_014143_tipos_preguntas',1),(85,'2018_04_06_014654_opciones_respuestas',1),(86,'2018_04_06_023836_preguntas_formatos',1),(87,'2018_04_06_025356_inspecciones',1),(88,'2018_04_06_025908_respuestas_inspecciones',1),(89,'2018_04_06_032401_inspecciones_extintores',1),(90,'2018_04_06_032739_inspecciones_insumos_botiquines',1),(91,'2018_04_06_032912_inspecciones_establecimientos',1),(92,'2018_05_20_221815_add_estado_inspeccion_to_inspecciones_table',1);
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
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_pregunta_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `opciones_respuestas` VALUES (1,'Cumple','1',1,'Activo',1,NULL,NULL,NULL,NULL),(2,'No Cumple','2',1,'Activo',1,NULL,NULL,NULL,NULL),(3,'Bueno','3',2,'Activo',1,NULL,NULL,NULL,NULL),(4,'Regular','4',2,'Activo',1,NULL,NULL,NULL,NULL),(5,'Malo','5',2,'Activo',1,NULL,NULL,NULL,NULL);
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
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_pregunta_id` int(10) unsigned DEFAULT NULL,
  `formato_inspeccion_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preguntas_formatos_tipo_pregunta_id_foreign` (`tipo_pregunta_id`),
  KEY `preguntas_formatos_formato_inspeccion_id_foreign` (`formato_inspeccion_id`),
  KEY `preguntas_formatos_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `preguntas_formatos_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `preguntas_formatos_formato_inspeccion_id_foreign` FOREIGN KEY (`formato_inspeccion_id`) REFERENCES `formatos_inspecciones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `preguntas_formatos_tipo_pregunta_id_foreign` FOREIGN KEY (`tipo_pregunta_id`) REFERENCES `tipos_preguntas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `preguntas_formatos_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `preguntas_formatos_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas_formatos`
--

LOCK TABLES `preguntas_formatos` WRITE;
/*!40000 ALTER TABLE `preguntas_formatos` DISABLE KEYS */;
INSERT INTO `preguntas_formatos` VALUES (1,'Estado del cilindro',2,1,'Activo',1,NULL,NULL,NULL,NULL),(2,'Estado de la boquilla',2,1,'Activo',1,NULL,NULL,NULL,NULL),(3,'Estado de la manguera',2,1,'Activo',1,NULL,NULL,NULL,NULL),(4,'Estado del manómetro',2,1,'Activo',1,NULL,NULL,NULL,NULL),(5,'Estado del PIN',2,1,'Activo',1,NULL,NULL,NULL,NULL),(6,'Señalización',2,1,'Activo',1,NULL,NULL,NULL,NULL),(7,'Fecha de recarga',3,1,'Activo',1,NULL,NULL,NULL,NULL),(8,'Observaciones',4,1,'Activo',1,NULL,NULL,NULL,NULL),(9,'Fecha de vencimiento',3,2,'Activo',1,NULL,NULL,'2018-05-26 17:52:03','2018-05-26 17:52:03'),(10,'Observaciones',4,2,'Activo',1,NULL,NULL,'2018-05-26 17:52:15','2018-05-26 17:52:15');
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `recargas_extintores` VALUES (1,'2017-06-29','2018-07-30',1,'Activo',1,NULL,NULL,NULL,NULL),(2,'2017-06-29','2018-07-30',2,'Activo',1,NULL,NULL,NULL,NULL),(3,'2017-06-29','2018-07-30',3,'Activo',1,NULL,NULL,NULL,NULL),(4,'2018-04-30','2019-05-01',4,'Activo',1,NULL,NULL,'2018-05-26 17:18:45','2018-05-26 17:18:45');
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
  `pregunta_formato_id` int(10) unsigned DEFAULT NULL,
  `inspeccion_id` int(10) unsigned DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_creacion` int(10) unsigned DEFAULT NULL,
  `user_id_modificacion` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas_inspecciones`
--

LOCK TABLES `respuestas_inspecciones` WRITE;
/*!40000 ALTER TABLE `respuestas_inspecciones` DISABLE KEYS */;
INSERT INTO `respuestas_inspecciones` VALUES (1,'3',1,1,'Activo',1,NULL,NULL,'2018-05-22 05:15:38','2018-05-22 05:15:38'),(2,'3',2,1,'Activo',1,NULL,NULL,'2018-05-22 05:15:38','2018-05-22 05:15:38'),(3,'3',3,1,'Activo',1,NULL,NULL,'2018-05-22 05:15:38','2018-05-22 05:15:38'),(4,'3',4,1,'Activo',1,NULL,NULL,'2018-05-22 05:15:38','2018-05-22 05:15:38'),(5,'3',5,1,'Activo',1,NULL,NULL,'2018-05-22 05:15:38','2018-05-22 05:15:38'),(6,'3',6,1,'Activo',1,NULL,NULL,'2018-05-22 05:15:38','2018-05-22 05:15:38'),(7,'2018-05-22',7,1,'Activo',1,NULL,NULL,'2018-05-22 05:15:38','2018-05-22 05:15:38'),(8,'Extintor en buen estado',8,1,'Activo',1,NULL,NULL,'2018-05-22 05:15:38','2018-05-22 05:15:38'),(9,'Bueno',1,2,'Activo',1,NULL,NULL,'2018-05-22 05:43:17','2018-05-22 05:43:17'),(10,'Bueno',2,2,'Activo',1,NULL,NULL,'2018-05-22 05:43:17','2018-05-22 05:43:17'),(11,'Bueno',3,2,'Activo',1,NULL,NULL,'2018-05-22 05:43:17','2018-05-22 05:43:17'),(12,'Regular',4,2,'Activo',1,NULL,NULL,'2018-05-22 05:43:17','2018-05-22 05:43:17'),(13,'Bueno',5,2,'Activo',1,NULL,NULL,'2018-05-22 05:43:17','2018-05-22 05:43:17'),(14,'Bueno',6,2,'Activo',1,NULL,NULL,'2018-05-22 05:43:17','2018-05-22 05:43:17'),(15,'2018-05-22',7,2,'Activo',1,NULL,NULL,'2018-05-22 05:43:17','2018-05-22 05:43:17'),(16,'Manómetro presenta daños',8,2,'Activo',1,NULL,NULL,'2018-05-22 05:43:17','2018-05-22 05:43:17');
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `tipos_botiquines` VALUES (1,'Básico','Activo',1,NULL,NULL,NULL,NULL),(2,'Avanzado','Activo',1,NULL,NULL,NULL,NULL);
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `tipos_preguntas` VALUES (1,'Cumple/NoCumple','Activo',1,NULL,NULL,NULL,NULL),(2,'Estado','Activo',1,NULL,NULL,NULL,NULL),(3,'Fecha','Activo',1,NULL,NULL,NULL,NULL),(4,'Abierta','Activo',1,NULL,NULL,NULL,NULL);
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ubicaciones_edificio_id_foreign` (`edificio_id`),
  KEY `ubicaciones_user_id_creacion_foreign` (`user_id_creacion`),
  KEY `ubicaciones_user_id_modificacion_foreign` (`user_id_modificacion`),
  CONSTRAINT `ubicaciones_edificio_id_foreign` FOREIGN KEY (`edificio_id`) REFERENCES `edificios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `ubicaciones_user_id_creacion_foreign` FOREIGN KEY (`user_id_creacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `ubicaciones_user_id_modificacion_foreign` FOREIGN KEY (`user_id_modificacion`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicaciones`
--

LOCK TABLES `ubicaciones` WRITE;
/*!40000 ALTER TABLE `ubicaciones` DISABLE KEYS */;
INSERT INTO `ubicaciones` VALUES (1,'1','Frente a la oficina del rector','Activo',1,1,NULL,NULL,NULL,NULL),(2,'4','Al lado de las sombrillas','Activo',2,1,NULL,NULL,NULL,NULL),(3,'5','Al costado del salón 503','Activo',3,1,NULL,NULL,NULL,NULL),(4,'1','Salón de Música','Activo',1,1,NULL,NULL,NULL,NULL),(5,'1','Mercadeo (Antiguo)','Activo',2,1,NULL,NULL,NULL,NULL),(6,'1','Almacen','Activo',2,1,NULL,NULL,NULL,NULL),(7,'3','Pasillo','Activo',2,1,NULL,NULL,'2018-05-26 17:18:44','2018-05-26 17:18:44'),(8,'1','Almacén','Activo',2,1,NULL,NULL,'2018-05-26 17:19:59','2018-05-26 17:19:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Elizabeth','Betancurth','elizabetancurth@gmail.com','$2y$10$tgIazCotgzjbrzqZXrKvg.2dDxucQtp8PkysA80IyVtCxyQZdEh2m','Administrador','Activo','Cue894x4hBKYZ0LzyQrpZ8qwz3YvJQMiHo7odKiFUbPVdzL75mO2oz7o98Su',NULL,NULL),(2,'Daniel','Arboleda','daniel@gmail.com','$2y$10$mGN3qq0PR1fbWIr7NpVGXOxJR.w6dY7KPnmGgY6ctsJdbzrTY5H.a','APH','Activo','EQ78oG2wgdtOPm9y1JsQj6qGFPrkqrlDdIUYVmK59LWTgWAiVtKhHJvyEiiw',NULL,NULL),(3,'Luisa','Cuellar','luisa@gmail.com','$2y$10$ne73bla4kJ3/J6tuV2XdOeD5zUFva5NabkDqnGfBzEGR31NCcPwOW','APH','Activo','0ad84lLd21Ts026VaRwKJ4aB70JUZKeMGiGvncebs8Hce8IxsotV1YHhN8Vf','2018-05-22 07:42:05','2018-05-22 07:42:05'),(4,'Luis','Pérez','luis@gmail.com','$2y$10$49Q0cNE9Ezj0bHs/riTYee2I9itS.Us1/QPWVj8iYg2okZD2BPUWi','APH','Activo',NULL,'2018-05-22 22:56:44','2018-05-22 22:56:44');
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

-- Dump completed on 2018-05-28  8:38:29
