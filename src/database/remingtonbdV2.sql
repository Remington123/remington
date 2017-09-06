-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: remington
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
INSERT INTO `categoriaproducto` VALUES (1,'Camisa',1),(2,'Chaleco',1),(3,'Cobarta',1),(4,'Saco',1),(5,'Pantalón',1);
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
  `contrasena` varchar(45) DEFAULT NULL,
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
INSERT INTO `cliente` VALUES (1,'Petter','Rios','Abarca','47859612','pett@gmail.com','123','Urb. Libertad MZ V lote 7','984512367',NULL,1,1),(2,'Jose','Kano','Uriol','48561230','jose@gmail.com','123','Av. America Sur #123','978546213',NULL,1,1);
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
  `idpedido` varchar(7) DEFAULT NULL,
  `idtipopago` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idcomprobantepago`),
  KEY `fk_idtipopago_idx` (`idtipopago`),
  KEY `fk_comprobantepagoidpedido_idx` (`idpedido`),
  CONSTRAINT `fk_comprobantepagoidpedido` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  `idpedido` varchar(7) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` mediumint(3) DEFAULT NULL,
  `importe` decimal(18,2) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
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
  `email` varchar(100) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fechanacimiento` varchar(10) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `idtipousuario` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idempleado`),
  KEY `fk_idtipousuario_idx` (`idtipousuario`),
  CONSTRAINT `fk_idtipousuarioempleado` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'kevin','Yarasca','Ponce','76525712','kevin@gmail.com','123','av. ferrocarril s/n','18/08/1995','920096053',2,1),(2,'Geovanny','Rios','Abarca','47523012','geo@gmail.com','123','Urb. Libertad MZ V lote 7','28/02/1991','947856321',3,1),(3,'Yanira','Aquino','Ladera','42159875','yani@gmail.com','123','Av.Universitaria N°240','10/08/1998','947856312',3,1),(4,'Deysi','Alejandro','Bazan','44963214','deysi@gmail.com','123','Alejandro deustua N°739','23/03/1996','981237451',2,1);
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
  `idcategoriaproducto` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idmodelo`),
  KEY `fk_idcategoriaproductomodelo_idx` (`idcategoriaproducto`),
  CONSTRAINT `fk_idcategoriaproductomodelo` FOREIGN KEY (`idcategoriaproducto`) REFERENCES `categoriaproducto` (`idcategoriaproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
INSERT INTO `modelo` VALUES (1,'Camisa manga corta',1,1),(2,'Camisa manga larga',1,1),(3,'Chaleco ajustado en terciopelo',2,1),(4,'Chaleco ajustado de cuadros',2,1);
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `idmodulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` VALUES (1,'Cliente',1),(2,'Empleado',1),(3,'Producto',1),(4,'Categoria Producto',1),(5,'Modelo',1),(6,'Tela',1),(7,'Talla',1),(8,'Permiso',1),(9,'Pedido',1),(10,'Detalle Pedido',1);
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina`
--

DROP TABLE IF EXISTS `pagina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina` (
  `idpagina` int(11) NOT NULL AUTO_INCREMENT,
  `idmodulo` int(11) DEFAULT NULL,
  `pagina` varchar(100) DEFAULT NULL,
  `icono` varchar(40) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idpagina`),
  KEY `fk_idmodulo_idx` (`idmodulo`),
  CONSTRAINT `fk_idmodulo` FOREIGN KEY (`idmodulo`) REFERENCES `modulo` (`idmodulo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina`
--

LOCK TABLES `pagina` WRITE;
/*!40000 ALTER TABLE `pagina` DISABLE KEYS */;
INSERT INTO `pagina` VALUES (1,1,'cliente/registrar.php','fa fa-folder',1),(2,1,'cliente/listar.php','fa fa-folder',1),(3,2,'empleado/registrar.php','fa fa-folder',1),(4,2,'empleado/listar.php','fa fa-folder',1),(5,3,'producto/registrar.php','fa fa-folder',1),(6,3,'producto/listar.php','fa fa-folder',1),(7,4,'categoriaproducto/registrar.php','fa fa-folder',1),(8,4,'categoriaproducto/listar.php','fa fa-folder',1),(9,5,'modelo/registrar.php','fa fa-folder',1),(10,5,'modelo/listar.php','fa fa-folder',1),(11,6,'tela/registrar.php','fa fa-folder',1),(12,6,'tela/listar.php','fa fa-folder',1),(13,7,'talla/registrar.php','fa fa-folder',1),(14,7,'talla/listar.php','fa fa-folder',1),(15,8,'permiso/listar.php','fa fa-folder',1),(16,9,'pedido/listar.php','fa fa-folder',1),(17,10,'detallepedido/listar.php','fa fa-folder',1);
/*!40000 ALTER TABLE `pagina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `idpedido` varchar(7) NOT NULL,
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
  `idmodulo` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idpermiso`),
  KEY `fk_idtipousuariopermiso_idx` (`idtipousuario`),
  KEY `fk_idmodulo_idx` (`idmodulo`),
  CONSTRAINT `fk_idmodulopermiso` FOREIGN KEY (`idmodulo`) REFERENCES `modulo` (`idmodulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idtipousuariopermiso` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` VALUES (1,2,2,0),(2,2,3,0),(3,2,4,1),(4,2,5,1),(5,2,6,1),(6,2,7,1),(7,3,1,1),(8,3,2,1),(9,3,3,1),(10,3,4,1),(11,3,5,1),(12,3,6,1),(13,3,7,1),(14,3,8,1),(15,3,9,1),(16,3,10,1);
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
  `idcategoriaproducto` int(11) DEFAULT NULL,
  `idmodelo` int(11) DEFAULT NULL,
  `idtalla` int(11) DEFAULT NULL,
  `idtela` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `fk_idtela_idx` (`idtela`),
  KEY `fk_idcategoriaproducto_idx` (`idcategoriaproducto`),
  KEY `fk_idmodelo_idx` (`idmodelo`),
  KEY `fk_idtalla_idx` (`idtalla`),
  CONSTRAINT `fk_idcategoriaproducto` FOREIGN KEY (`idcategoriaproducto`) REFERENCES `categoriaproducto` (`idcategoriaproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idmodelo` FOREIGN KEY (`idmodelo`) REFERENCES `modelo` (`idmodelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idtalla` FOREIGN KEY (`idtalla`) REFERENCES `talla` (`idtalla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idtela` FOREIGN KEY (`idtela`) REFERENCES `tela` (`idtela`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Camisa super elegante ',60.00,70.00,10,10,1,1,1,3,2),(2,'Camisa a cuadros elegante',60.00,70.00,20,20,0,1,2,3,2),(3,'Chaleco de vestir',80.00,90.00,20,20,0,2,4,6,1),(4,'Chaleco formal de trabajo en oficina',50.00,60.00,30,30,0,2,4,4,2),(5,'Camisa informal',60.00,70.00,10,10,1,1,2,1,1);
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
  `descripcion` varchar(100) DEFAULT NULL,
  `idcategoriaproducto` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idtalla`),
  KEY `fk_idcategoriaproductotalla_idx` (`idcategoriaproducto`),
  CONSTRAINT `fk_idcategoriaproductotalla` FOREIGN KEY (`idcategoriaproducto`) REFERENCES `categoriaproducto` (`idcategoriaproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talla`
--

LOCK TABLES `talla` WRITE;
/*!40000 ALTER TABLE `talla` DISABLE KEYS */;
INSERT INTO `talla` VALUES (1,'S - pecho 91 - 96 cm',1,1),(2,'M - pecho 96 - 101 cm',1,1),(3,'L - pecho 101 - 106 cm',1,1),(4,'42 - W 81 cm',2,1),(5,'44 - W 84 cm',2,1),(6,'46 - W 91 cm',2,1);
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
-- Table structure for table `tipocliente`
--

DROP TABLE IF EXISTS `tipocliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocliente` (
  `idtipocliente` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idtipocliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocliente`
--

LOCK TABLES `tipocliente` WRITE;
/*!40000 ALTER TABLE `tipocliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipocliente` ENABLE KEYS */;
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

-- Dump completed on 2017-09-06  1:58:35
