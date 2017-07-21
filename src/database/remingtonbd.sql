-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: remington
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.24-MariaDB

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
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `idbanner` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idbanner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoriaproducto`
--

DROP TABLE IF EXISTS `categoriaproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriaproducto` (
  `idcategoriaproducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idcategoriaproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriaproducto`
--

LOCK TABLES `categoriaproducto` WRITE;
/*!40000 ALTER TABLE `categoriaproducto` DISABLE KEYS */;
INSERT INTO `categoriaproducto` VALUES (1,'Camisa',1),(2,'Pantalón',1),(3,'Cobarta',1),(4,'Saco',1),(5,'Chaleco',1);
/*!40000 ALTER TABLE `categoriaproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidopaterno` varchar(50) DEFAULT NULL,
  `apellidomaterno` varchar(50) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `idtipousuario` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `fk_idtipousuario_idx` (`idtipousuario`),
  CONSTRAINT `fk_idtipousuario` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Petter','Rios','Abarca','47859612',NULL,'Urb. Libertad MZ V lote 7','984512367',NULL,1,1),(2,'Jose','Kano','Uriol','48561230',NULL,'Av. America Sur #123','978546213',NULL,1,1);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprobantepago`
--

DROP TABLE IF EXISTS `comprobantepago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprobantepago` (
  `idcomprobantepago` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `idpedido` int(11) DEFAULT NULL,
  `idtipopago` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idcomprobantepago`),
  KEY `fk_idpedido_idx` (`idpedido`),
  KEY `fk_idtipopago_idx` (`idtipopago`),
  CONSTRAINT `fk_idpedidocomprobante` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idtipopago` FOREIGN KEY (`idtipopago`) REFERENCES `tipopago` (`idtipopago`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprobantepago`
--

LOCK TABLES `comprobantepago` WRITE;
/*!40000 ALTER TABLE `comprobantepago` DISABLE KEYS */;
/*!40000 ALTER TABLE `comprobantepago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `confeccion`
--

DROP TABLE IF EXISTS `confeccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `confeccion` (
  `idconfeccion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idconfeccion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `confeccion`
--

LOCK TABLES `confeccion` WRITE;
/*!40000 ALTER TABLE `confeccion` DISABLE KEYS */;
INSERT INTO `confeccion` VALUES (1,'traje completo','15/07/2017',1,1);
/*!40000 ALTER TABLE `confeccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleconfeccion`
--

DROP TABLE IF EXISTS `detalleconfeccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleconfeccion` (
  `iddetalleconfeccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `medida` varchar(5) DEFAULT NULL,
  `idconfeccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddetalleconfeccion`),
  KEY `fk_idconfeccion_idx` (`idconfeccion`),
  CONSTRAINT `fk_idconfeccion` FOREIGN KEY (`idconfeccion`) REFERENCES `confeccion` (`idconfeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleconfeccion`
--

LOCK TABLES `detalleconfeccion` WRITE;
/*!40000 ALTER TABLE `detalleconfeccion` DISABLE KEYS */;
INSERT INTO `detalleconfeccion` VALUES (4,'brazos','15 cm',1),(5,'hombros','20 cm',1);
/*!40000 ALTER TABLE `detalleconfeccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallepedido`
--

DROP TABLE IF EXISTS `detallepedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallepedido` (
  `iddetallepedido` int(11) NOT NULL AUTO_INCREMENT,
  `idpedido` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` mediumint(3) DEFAULT NULL,
  `importe` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`iddetallepedido`),
  KEY `fk_idproducto_idx` (`idproducto`),
  KEY `fk_idpedido_idx` (`idpedido`),
  CONSTRAINT `fk_idpedido` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idproducto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallepedido`
--

LOCK TABLES `detallepedido` WRITE;
/*!40000 ALTER TABLE `detallepedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallepedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidopaterno` varchar(50) DEFAULT NULL,
  `apellidomaterno` varchar(50) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fechanacimiento` varchar(10) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `idtipousuario` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idempleado`),
  KEY `fk_idtipousuario_idx` (`idtipousuario`),
  CONSTRAINT `fk_idtipousuarioempleado` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'kevin','yarasca','ponce','76525712','av. ferrocarril s/n','18/08/1995','920096053',1,1);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo` (
  `idmodelo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idmodelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina`
--

DROP TABLE IF EXISTS `pagina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina` (
  `idpagina` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(50) DEFAULT NULL,
  `paginas` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idpagina`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina`
--

LOCK TABLES `pagina` WRITE;
/*!40000 ALTER TABLE `pagina` DISABLE KEYS */;
INSERT INTO `pagina` VALUES (1,'cliente','cliente/registrar.php',3),(2,'cliente','cliente/listar.php',3);
/*!40000 ALTER TABLE `pagina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(10) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `total` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `fk_idcliente_idx` (`idcliente`),
  CONSTRAINT `fk_idcliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL AUTO_INCREMENT,
  `idtipousuario` int(11) DEFAULT NULL,
  `idpagina` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpermiso`),
  KEY `fk_idtipousuariopermiso_idx` (`idtipousuario`),
  KEY `fk_idpagina_idx` (`idpagina`),
  CONSTRAINT `fk_idpagina` FOREIGN KEY (`idpagina`) REFERENCES `pagina` (`idpagina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idtipousuariopermiso` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` VALUES (1,2,1),(2,3,1),(3,3,2);
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` decimal(18,2) DEFAULT NULL,
  `precioventa` decimal(18,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `stockactual` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `idmodelo` int(11) DEFAULT NULL,
  `idtalla` int(11) DEFAULT NULL,
  `idtela` int(11) DEFAULT NULL,
  `idcategoriaproducto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `fk_idtalla_idx` (`idtalla`),
  KEY `fk_idmodelo_idx` (`idmodelo`),
  KEY `fk_idtela_idx` (`idtela`),
  KEY `fk_idcategoriaproducto_idx` (`idcategoriaproducto`),
  CONSTRAINT `fk_idcategoriaproducto` FOREIGN KEY (`idcategoriaproducto`) REFERENCES `categoriaproducto` (`idcategoriaproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idmodelo` FOREIGN KEY (`idmodelo`) REFERENCES `modelo` (`idmodelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idtalla` FOREIGN KEY (`idtalla`) REFERENCES `talla` (`idtalla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idtela` FOREIGN KEY (`idtela`) REFERENCES `tela` (`idtela`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `talla`
--

DROP TABLE IF EXISTS `talla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `talla` (
  `idtalla` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `acronimo` varchar(5) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idtalla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talla`
--

LOCK TABLES `talla` WRITE;
/*!40000 ALTER TABLE `talla` DISABLE KEYS */;
/*!40000 ALTER TABLE `talla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tela`
--

DROP TABLE IF EXISTS `tela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tela` (
  `idtela` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(70) DEFAULT NULL,
  `color` varchar(40) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idtela`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tela`
--

LOCK TABLES `tela` WRITE;
/*!40000 ALTER TABLE `tela` DISABLE KEYS */;
INSERT INTO `tela` VALUES (1,'tela francessa','turquesa',1),(2,'tela romana','plomo',1),(3,'tela comic','rosado',1);
/*!40000 ALTER TABLE `tela` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipopago`
--

DROP TABLE IF EXISTS `tipopago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipopago` (
  `idtipopago` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idtipopago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopago`
--

LOCK TABLES `tipopago` WRITE;
/*!40000 ALTER TABLE `tipopago` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipopago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'cliente ',1),(2,'empleado',2),(3,'administrador',3);
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-20 20:29:50
