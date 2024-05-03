-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.2.0

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
-- Table structure for table `domaines`
--

DROP TABLE IF EXISTS `domaines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domaines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domaines`
--

LOCK TABLES `domaines` WRITE;
/*!40000 ALTER TABLE `domaines` DISABLE KEYS */;
INSERT INTO `domaines` VALUES (1,'Informatique','2024-05-03 11:22:53','2024-05-03 11:22:53'),(2,'Marketing','2024-05-03 11:22:53','2024-05-03 11:22:53'),(3,'Management','2024-05-03 11:22:53','2024-05-03 11:22:53'),(4,'Comptabilité','2024-05-03 11:22:53','2024-05-03 11:22:53'),(5,'Ressources Humaines','2024-05-03 11:22:53','2024-05-03 11:22:53');
/*!40000 ALTER TABLE `domaines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formations`
--

DROP TABLE IF EXISTS `formations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` int NOT NULL,
  `nb_places_max` int NOT NULL,
  `cout` double(8,2) NOT NULL,
  `intervenant_id` bigint unsigned NOT NULL,
  `domaine_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formations_intervenant_id_foreign` (`intervenant_id`),
  KEY `formations_domaine_id_foreign` (`domaine_id`),
  CONSTRAINT `formations_domaine_id_foreign` FOREIGN KEY (`domaine_id`) REFERENCES `domaines` (`id`) ON DELETE CASCADE,
  CONSTRAINT `formations_intervenant_id_foreign` FOREIGN KEY (`intervenant_id`) REFERENCES `intervenants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formations`
--

LOCK TABLES `formations` WRITE;
/*!40000 ALTER TABLE `formations` DISABLE KEYS */;
INSERT INTO `formations` VALUES (1,'Développeur Web',6,10,5000.00,1,1,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(2,'Développeur Mobile',6,10,500.00,1,1,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(3,'Développeur Java',6,5,5000.00,2,1,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(4,'Développeur Python',6,5,4000.00,2,1,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(5,'Marketing Digital',6,2,100000.00,3,2,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(6,'Marketing de contenu',6,7,5000.00,3,2,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(7,'Marketing de produit',6,3,5000.00,3,2,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(8,'Management de projet',6,5,5000.00,3,3,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(9,'Management de qualité',6,5,10.00,3,3,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(10,'Management de risque',6,5,5000.00,3,3,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(11,'Comptabilité générale',6,5,5000.00,3,4,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(12,'Comptabilité analytique',6,1,600.00,3,4,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(13,'Comptabilité de gestion',6,5,700.00,3,4,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(14,'Ressources Humaines',6,5,530.00,3,5,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(15,'Ressources Humaines',6,100,5000.00,3,5,'2024-05-03 11:22:54','2024-05-03 11:22:54');
/*!40000 ALTER TABLE `formations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date_inscription` datetime NOT NULL,
  `etat` enum('en_cours','valide','rejete') COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` bigint unsigned NOT NULL,
  `utilisateur_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inscriptions_session_id_foreign` (`session_id`),
  KEY `inscriptions_utilisateur_id_foreign` (`utilisateur_id`),
  CONSTRAINT `inscriptions_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inscriptions_utilisateur_id_foreign` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscriptions`
--

LOCK TABLES `inscriptions` WRITE;
/*!40000 ALTER TABLE `inscriptions` DISABLE KEYS */;
INSERT INTO `inscriptions` VALUES (1,'2025-04-11 09:00:00','en_cours',1,5,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(2,'2025-04-11 09:00:00','en_cours',2,5,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(3,'2025-04-11 09:00:00','en_cours',3,6,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(4,'2025-04-11 09:00:00','en_cours',4,7,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(5,'2025-04-11 09:00:00','en_cours',5,8,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(6,'2025-04-11 09:00:00','en_cours',6,9,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(7,'2025-04-11 09:00:00','en_cours',7,10,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(9,'2025-04-11 09:00:00','en_cours',9,4,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(10,'2025-04-11 09:00:00','en_cours',10,3,'2024-05-03 11:22:54','2024-05-03 11:22:54');
/*!40000 ALTER TABLE `inscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervenants`
--

DROP TABLE IF EXISTS `intervenants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervenants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervenants`
--

LOCK TABLES `intervenants` WRITE;
/*!40000 ALTER TABLE `intervenants` DISABLE KEYS */;
INSERT INTO `intervenants` VALUES (1,'cris','depay','cris@depay.fr','0606060606','2024-05-03 11:22:54','2024-05-03 11:22:54'),(2,'vitinha','sg','vitinha@sg.fr','0606060606','2024-05-03 11:22:54','2024-05-03 11:22:54'),(3,'saul','goodman','saul@goodman.fr','0606060606','2024-05-03 11:22:54','2024-05-03 11:22:54');
/*!40000 ALTER TABLE `intervenants` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2023_12_14_092000_create_domaines_table',1),(2,'2023_12_14_093100_create_intervenants_table',1),(3,'2023_12_14_093214_create_utilisateurs_table',1),(4,'2023_12_14_094157_create_formations_table',1),(5,'2023_12_14_095203_create_sessions_table',1),(6,'2023_12_14_096341_create_inscriptions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_places_restantes` int NOT NULL,
  `formation_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_formation_id_foreign` (`formation_id`),
  CONSTRAINT `sessions_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES (1,'2024-04-11 09:00:00','Paris',10,1,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(2,'2024-04-11 14:00:00','Marseille',10,1,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(3,'2021-04-11 09:00:00','Marseille',10,1,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(4,'2025-04-11 09:00:00','Toulouse',5,1,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(5,'2025-04-11 09:00:00','Aurillac',0,2,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(6,'2025-04-11 09:00:00','Paris',5,2,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(7,'2025-04-11 09:00:00','Montpellier',5,3,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(9,'2025-04-11 09:00:00','Toulouse',5,5,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(10,'2025-04-11 09:00:00','Colombes',5,6,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(11,'2025-04-11 09:00:00','Paris',5,7,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(12,'2025-04-11 09:00:00','Paris',5,8,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(13,'2025-04-11 09:00:00','Paris',5,9,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(14,'2025-04-11 09:00:00','Madrid',5,10,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(15,'2025-04-11 09:00:00','Paris',5,11,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(16,'2025-04-11 09:00:00','Rabat',5,12,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(17,'2025-04-11 09:00:00','Paris',5,13,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(18,'2025-04-11 09:00:00','Rotterdam',5,14,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(19,'2025-04-11 09:00:00','Paris',5,15,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(20,'2025-04-11 09:00:00','Paris',0,3,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(21,'2025-04-11 09:00:00','Paris',0,4,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(22,'2025-04-11 09:00:00','Paris',0,5,'2024-05-03 11:22:54','2024-05-03 11:22:54'),(23,'2025-04-11 09:00:00','Paris',0,6,'2024-05-03 11:22:54','2024-05-03 11:22:54');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateurs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` enum('utilisateur','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (1,'Martin','Alice','utilisateur@gmail.com','0606060606','$2y$10$10HfOo4kqRmwrM8dIJGN5.1AgUd1NqBJwGWMuldiM4LuUhz6inMOK','utilisateur','2024-05-03 11:22:52','2024-05-03 11:22:52'),(2,'Jean','Dupont','admin@gmail.com','0606060606','$2y$10$jGoPPUTbUvdH2Ty2xUdIw.nqK2SJxyKgYPZFFx80eeqJlomGl2P6i','admin','2024-05-03 11:22:52','2024-05-03 11:22:52'),(3,'Didier','Tristan','thibault.duhamel@example.com','0105266860','$2y$10$Q63K7tuTUlK3BPw09hpHb.6N2t5Ejg1RdiLBo8zihdcTuUnw9OVVu','admin','2024-05-03 11:22:53','2024-05-03 11:22:53'),(4,'Lebon','Julie','olivier99@example.net','+33 3 41 53 00 43','$2y$10$Q63K7tuTUlK3BPw09hpHb.6N2t5Ejg1RdiLBo8zihdcTuUnw9OVVu','admin','2024-05-03 11:22:53','2024-05-03 11:22:53'),(5,'Marques','Julien','boucher.alice@example.org','02 69 12 19 48','$2y$10$Q63K7tuTUlK3BPw09hpHb.6N2t5Ejg1RdiLBo8zihdcTuUnw9OVVu','admin','2024-05-03 11:22:53','2024-05-03 11:22:53'),(6,'Bertin','Édith','tmorvan@example.net','0906951279','$2y$10$Q63K7tuTUlK3BPw09hpHb.6N2t5Ejg1RdiLBo8zihdcTuUnw9OVVu','utilisateur','2024-05-03 11:22:53','2024-05-03 11:22:53'),(7,'Denis','Aurore','marion.marcel@example.org','+33 5 58 00 76 73','$2y$10$Q63K7tuTUlK3BPw09hpHb.6N2t5Ejg1RdiLBo8zihdcTuUnw9OVVu','admin','2024-05-03 11:22:53','2024-05-03 11:22:53'),(8,'Potier','Bertrand','jacqueline.buisson@example.com','0247270440','$2y$10$Q63K7tuTUlK3BPw09hpHb.6N2t5Ejg1RdiLBo8zihdcTuUnw9OVVu','utilisateur','2024-05-03 11:22:53','2024-05-03 11:22:53'),(9,'Clerc','Éléonore','mbonnin@example.net','0563285775','$2y$10$Q63K7tuTUlK3BPw09hpHb.6N2t5Ejg1RdiLBo8zihdcTuUnw9OVVu','utilisateur','2024-05-03 11:22:53','2024-05-03 11:22:53'),(10,'Garnier','Gabrielle','jerome.perret@example.org','0688070339','$2y$10$Q63K7tuTUlK3BPw09hpHb.6N2t5Ejg1RdiLBo8zihdcTuUnw9OVVu','utilisateur','2024-05-03 11:22:53','2024-05-03 11:22:53'),(11,'Da Silva','Henri','rfischer@example.org','+33 (0)1 02 48 47 45','$2y$10$Q63K7tuTUlK3BPw09hpHb.6N2t5Ejg1RdiLBo8zihdcTuUnw9OVVu','utilisateur','2024-05-03 11:22:53','2024-05-03 11:22:53'),(12,'Toussaint','Noël','leroy.paul@example.net','+33 6 38 38 08 90','$2y$10$Q63K7tuTUlK3BPw09hpHb.6N2t5Ejg1RdiLBo8zihdcTuUnw9OVVu','admin','2024-05-03 11:22:53','2024-05-03 11:22:53');
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'laravel'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-03 15:26:36
