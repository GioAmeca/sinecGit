-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: produccion
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acciones`
--

DROP TABLE IF EXISTS `acciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `acciones` (
  `idAcciones` int(11) NOT NULL AUTO_INCREMENT,
  `Action` varchar(45) DEFAULT NULL,
  `Open` date DEFAULT NULL,
  `Owner` varchar(45) DEFAULT NULL,
  `DueDate` date DEFAULT NULL,
  `Closed` date DEFAULT NULL,
  `Estatus` varchar(45) DEFAULT NULL,
  `Comments` varchar(45) DEFAULT NULL,
  `WhoClosedIt` varchar(45) DEFAULT NULL,
  `WhoOpenIt` varchar(45) DEFAULT NULL,
  `FechaModificado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAcciones`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acciones`
--

LOCK TABLES `acciones` WRITE;
/*!40000 ALTER TABLE `acciones` DISABLE KEYS */;
INSERT INTO `acciones` VALUES (1,'crear bases de datos','2019-01-14','IT001','2019-01-15',NULL,'2','respaldar','IT001','IT001','2019-01-14');
/*!40000 ALTER TABLE `acciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lotes`
--

DROP TABLE IF EXISTS `lotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `lotes` (
  `idLote` varchar(45) NOT NULL,
  `NivelMSD` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Abieto` datetime DEFAULT NULL,
  `Cerrado` datetime DEFAULT NULL,
  `Tiempo` varchar(45) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Parte` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idLote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lotes`
--

LOCK TABLES `lotes` WRITE;
/*!40000 ALTER TABLE `lotes` DISABLE KEYS */;
INSERT INTO `lotes` VALUES ('7506129430801','3','componente prueba1','2019-01-19 00:00:00',NULL,'0',2,'7501071901461');
/*!40000 ALTER TABLE `lotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parte`
--

DROP TABLE IF EXISTS `parte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `parte` (
  `idParte` varchar(45) NOT NULL,
  `NivelMSD` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idParte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parte`
--

LOCK TABLES `parte` WRITE;
/*!40000 ALTER TABLE `parte` DISABLE KEYS */;
INSERT INTO `parte` VALUES ('7501000112166','3','componente prueba2'),('7501031311682','6','componente prueba3'),('7501071901461','5','componente prueba1');
/*!40000 ALTER TABLE `parte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peticion`
--

DROP TABLE IF EXISTS `peticion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `peticion` (
  `idPeticion` int(11) NOT NULL AUTO_INCREMENT,
  `Pieza` varchar(45) DEFAULT NULL,
  `Quien` varchar(45) DEFAULT NULL,
  `Fechayhora` datetime DEFAULT NULL,
  `Linea` varchar(45) DEFAULT NULL,
  `Proyecto` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Loteviejo` varchar(45) DEFAULT NULL,
  `Cantidad` varchar(45) DEFAULT NULL,
  `QuienSurte` varchar(45) DEFAULT NULL,
  `LoteNuevo` varchar(45) DEFAULT NULL,
  `FechayhoraS` datetime DEFAULT NULL,
  PRIMARY KEY (`idPeticion`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peticion`
--

LOCK TABLES `peticion` WRITE;
/*!40000 ALTER TABLE `peticion` DISABLE KEYS */;
INSERT INTO `peticion` VALUES (28,'7501071901461','SinPedir',NULL,'1','htc','2','Sin Pedir','100','IT001','7506129430801','2019-01-22 03:31:00');
/*!40000 ALTER TABLE `peticion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiempomuertos`
--

DROP TABLE IF EXISTS `tiempomuertos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tiempomuertos` (
  `idTiempoMuertos` int(11) NOT NULL AUTO_INCREMENT,
  `Proyecto` varchar(45) DEFAULT NULL,
  `Linea` varchar(45) DEFAULT NULL,
  `Equipo` varchar(45) DEFAULT NULL,
  `Area` varchar(45) DEFAULT NULL,
  `Turno` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Reportado` time DEFAULT NULL,
  `Iniciado` time DEFAULT NULL,
  `Fin` time DEFAULT NULL,
  `Minutos` time DEFAULT NULL,
  `Intermitente` varchar(45) DEFAULT NULL,
  `Problema` varchar(45) DEFAULT NULL,
  `Causa` varchar(45) DEFAULT NULL,
  `AccionCorectiva` varchar(45) DEFAULT NULL,
  `Comentario` varchar(45) DEFAULT NULL,
  `Partes` varchar(45) DEFAULT NULL,
  `NumeroParte` varchar(45) DEFAULT NULL,
  `Reportante` varchar(45) DEFAULT NULL,
  `Regitrado` varchar(45) DEFAULT NULL,
  `Responsable` varchar(45) DEFAULT NULL,
  `Aceptado` varchar(45) DEFAULT NULL,
  `FechaAceptado` datetime DEFAULT NULL,
  `FechaModificado` datetime DEFAULT NULL,
  PRIMARY KEY (`idTiempoMuertos`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiempomuertos`
--

LOCK TABLES `tiempomuertos` WRITE;
/*!40000 ALTER TABLE `tiempomuertos` DISABLE KEYS */;
INSERT INTO `tiempomuertos` VALUES (2,'ausu','1','plk,p,l','lmpl,,l','1','2019-01-14','12:07:24','11:55:00','11:55:00','00:00:00','0','op,p,','lm,mlplm,','momlpl,','plmmpo,pl,','lp,pl,pl,','0','IT001','2019-01-14','IT001','1','2019-01-14 12:35:25','2019-01-14 12:20:05'),(3,'seff','1','ds','sds','2','2019-01-14','12:35:12','12:33:00','12:39:00','00:10:00','0','fdssdfs','fsfs','dsfsfs','sdfss','sdfs','0','IT001','2019-01-14','IT001','1','2019-01-14 12:35:54',NULL),(4,'seff','1','ds','sds','2','2019-01-13','12:35:12','12:33:00','12:39:00','00:09:00','0','fdssdfs','fsfs','dsfsfs','sdfss','sdfs','0','IT001','2019-01-14','IT001','1','2019-01-14 12:35:54',NULL),(5,'seff','1','ds','sds','2','2019-01-12','12:35:12','12:33:00','12:39:00','00:08:00','0','fdssdfs','fsfs','dsfsfs','sdfss','sdfs','0','IT001','2019-01-14','IT001','1','2019-01-14 12:35:54',NULL),(6,'seff','1','ds','sds','2','2019-01-11','12:35:12','12:33:00','12:39:00','00:07:00','0','fdssdfs','fsfs','dsfsfs','sdfss','sdfs','0','IT001','2019-01-14','IT001','1','2019-01-14 12:35:54',NULL),(7,'seff','1','ds','sds','2','2019-01-10','12:35:12','12:33:00','12:39:00','00:06:00','0','fdssdfs','fsfs','dsfsfs','sdfss','sdfs','0','IT001','2019-01-14','IT001','1','2019-01-14 12:35:54',NULL),(8,'seff','1','ds','sds','2','2019-01-14','12:35:12','12:33:00','12:39:00','00:06:00','0','fdssdfs','fsfs','dsfsfs','sdfss','sdfs','0','IT001','2019-01-14','IT001','1','2019-01-14 12:35:54',NULL),(9,'seff','1','ds','sds','2','2019-01-09','12:35:12','12:33:00','12:39:00','00:05:00','0','fdssdfs','fsfs','dsfsfs','sdfss','sdfs','0','IT001','2019-01-14','IT001','1','2019-01-14 12:35:54',NULL),(10,'seff','1','ds','sds','2','2019-01-08','12:35:12','12:33:00','12:39:00','00:04:00','0','fdssdfs','fsfs','dsfsfs','sdfss','sdfs','0','IT001','2019-01-14','IT001','1','2019-01-14 12:35:54',NULL);
/*!40000 ALTER TABLE `tiempomuertos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroNomina` varchar(10) NOT NULL,
  `Contrasena` varchar(45) DEFAULT NULL,
  `Departamento` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `permiso` varchar(45) DEFAULT NULL,
  `credencial` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`NumeroNomina`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,'IT001','hola','16','Geovanny','Salazar','gio.crj@gmail.com','Admin','7702111822825');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-22  0:50:10
