-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: sicaris
-- ------------------------------------------------------
-- Server version	5.5.31-0ubuntu0.12.04.1

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
-- Table structure for table `almacen`
--

DROP TABLE IF EXISTS `almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `almacen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número unico del almacén',
  `DESCRIPCION` varchar(80) NOT NULL COMMENT 'Nombre del almacen',
  `TITULAR` varchar(80) NOT NULL COMMENT 'Nombre del titular del almacén, este datos sirve para generar reportes',
  `FOLIONEA` int(6) NOT NULL COMMENT 'Número inicial, folio con el que se inicia el número de entradas al almacén',
  `FOLIOREQUISICIONCOMPRAS` int(6) NOT NULL COMMENT 'El folio de la requisición',
  `REGISTRAPRODUCTO` varchar(1) DEFAULT NULL COMMENT 'Valor S o N para indicar si se le asignan productos o no al almacén',
  `CONSECUTIVOREQUISICION` int(10) NOT NULL COMMENT 'numero consecutivo, asignado por el usuario como valor inicial',
  `VISTOBUENO` varchar(100) NOT NULL COMMENT 'Nombre de la persona que da el visto bueno, este valor se usa para los reportes',
  `RESPONSABLE1` varchar(100) NOT NULL COMMENT 'Nombre de la persona responsable del almacén',
  `RESPONSABLE2` varchar(100) DEFAULT NULL COMMENT 'Nombre de la persona responsable del almacén',
  `RESPONSABLE3` varchar(100) DEFAULT NULL COMMENT 'Nombre de la persona responsable del almacén',
  `RESPONSABLE4` varchar(100) DEFAULT NULL COMMENT 'Nombre de la persona responsable del almacén',
  `FECHAREGISTRO` date NOT NULL COMMENT 'Fecha en que se esta dando de alta el registro en la base de datos',
  `IDUSUARIO` int(4) DEFAULT NULL COMMENT 'Nombre del usuario que registra el almacén',
  `IDSITUACION` int(11) DEFAULT NULL COMMENT 'id de la situación en que se encuentra el registro',
  `IDTIPOALMACEN` int(11) DEFAULT NULL COMMENT 'id del tipo de almacén que puede ser desechables, medicamentos o ambos ',
  `IDCENTROCOSTO` varchar(4) DEFAULT NULL COMMENT 'id del Centro de Costo',
  PRIMARY KEY (`ID`),
  KEY `fk_Almacen_Usuario1_idx` (`IDUSUARIO`),
  KEY `fk_Almacen_Situacion1_idx` (`IDSITUACION`),
  KEY `fk_Almacen_CentroCosto1_idx` (`IDCENTROCOSTO`),
  KEY `fk_Almacen_TipoAlmacen1_idx` (`IDTIPOALMACEN`),
  CONSTRAINT `fk_Almacen_CentroCosto1` FOREIGN KEY (`IDCENTROCOSTO`) REFERENCES `centrocosto` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Almacen_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Almacen_TipoAlmacen1` FOREIGN KEY (`IDTIPOALMACEN`) REFERENCES `tipoalmacen` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Almacen_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='Registra los datos del catálogo de almacén ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articuloalmacen`
--

DROP TABLE IF EXISTS `articuloalmacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articuloalmacen` (
  `IDALMACEN` int(11) NOT NULL DEFAULT '0' COMMENT 'numero de identificador del almacén',
  `IDARTICULOMEDICAMENTO` int(11) NOT NULL DEFAULT '0' COMMENT 'número de identificador del articulo',
  `ANAQUEL` varchar(15) DEFAULT NULL COMMENT 'Anaquel en donde se coloca el medcamento',
  `SALDOINICIALANIO` double NOT NULL COMMENT 'Existencias al inicio del año, si es un medicamento nuevo inicia en cero de lo contrario arrastra la existencia del cierre del año pasado',
  `ENTRADAANIO` bigint(20) NOT NULL COMMENT 'Cantidad acumulada de medicamento que ha entrado en el año en curso',
  `SALIDAANIO` bigint(20) NOT NULL COMMENT 'Cantidad de medicamento que ha salido en el año en curso',
  `EXISTENCIAS` bigint(20) NOT NULL COMMENT 'Cantidad acumulada de medicamento que tienen en el almacén desde su origen',
  `SUBROGADOANIO` bigint(20) NOT NULL COMMENT 'Cantidad de medicamento subrogado en el el año en curso',
  `STOCKMIN` bigint(20) NOT NULL COMMENT 'Cantidad minima de existencia',
  `STOCKMAX` bigint(20) NOT NULL COMMENT 'Cantidad máxima de existencia',
  `CONSUMOPROMEDIO` bigint(20) NOT NULL COMMENT 'Este campo no se va a utilizar por el momento',
  `AJUSTESANIO` bigint(20) NOT NULL COMMENT 'Cantidad de ajustes de medicamento',
  `COSTOSENTRADAS` double DEFAULT NULL COMMENT 'Costo monetario de medicamento que ha entrado',
  `COSTOSSALIDAS` double DEFAULT NULL COMMENT 'Costo monetario de medicamento que ha salido',
  `COSTOSAJUSTES` double DEFAULT NULL COMMENT 'Costo monetario de medicamento que se han realizado ajustes',
  PRIMARY KEY (`IDALMACEN`,`IDARTICULOMEDICAMENTO`),
  KEY `fk_Almacen_has_ArticuloMedicamento_ArticuloMedicamento1_idx` (`IDARTICULOMEDICAMENTO`),
  KEY `fk_ArticuloAlmacen_Almacen1_idx` (`IDALMACEN`),
  CONSTRAINT `fk_Almacen_has_ArticuloMedicamento_ArticuloMedicamento1` FOREIGN KEY (`IDARTICULOMEDICAMENTO`) REFERENCES `articulomedicamento` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_ArticuloAlmacen_Almacen1` FOREIGN KEY (`IDALMACEN`) REFERENCES `almacen` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articulocambiofisico`
--

DROP TABLE IF EXISTS `articulocambiofisico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulocambiofisico` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del articulo',
  `Fecha_Caducidad` date NOT NULL COMMENT 'Fecha caducidad del medicamento',
  `Lote` int(11) NOT NULL COMMENT 'lote',
  `Precio_Unitario` varchar(45) NOT NULL COMMENT 'precio unitario del articulo',
  `precio_neto` varchar(45) NOT NULL,
  `cantidad` double NOT NULL COMMENT 'Cantidad del articulo',
  `Tasa_IVA` decimal(10,0) NOT NULL COMMENT 'tasa iva aplicada al articulo',
  `Porcentaje_Descuento` varchar(45) NOT NULL COMMENT 'Porcentaje de descuentoque se aplica al artiulo',
  `Cumple_Caducidad` varchar(1) NOT NULL COMMENT 'Este campo toma los valores Si o No dependiendo si el medicamento cumple con la caducidad o no',
  `EntradaCambioFisico_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ArticuloCambioFisico_EntradaCambioFisico1_idx` (`EntradaCambioFisico_id`),
  CONSTRAINT `fk_ArticuloCambioFisico_EntradaCambioFisico1` FOREIGN KEY (`EntradaCambioFisico_id`) REFERENCES `entradacambiofisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena los artículos asociados a un entrada por cambio fís /* comment truncated */ /*ico*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articulocambiofisico_has_historialsituaciones`
--

DROP TABLE IF EXISTS `articulocambiofisico_has_historialsituaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulocambiofisico_has_historialsituaciones` (
  `ArticuloCambioFisico_id` int(11) NOT NULL,
  `HistorialSituaciones_idHistorialSituaciones` int(11) NOT NULL,
  PRIMARY KEY (`ArticuloCambioFisico_id`,`HistorialSituaciones_idHistorialSituaciones`),
  KEY `fk_ArticuloCambioFisico_has_HistorialSituaciones_HistorialS_idx` (`HistorialSituaciones_idHistorialSituaciones`),
  KEY `fk_ArticuloCambioFisico_has_HistorialSituaciones_ArticuloCa_idx` (`ArticuloCambioFisico_id`),
  CONSTRAINT `fk_ArticuloCambioFisico_has_HistorialSituaciones_ArticuloCamb1` FOREIGN KEY (`ArticuloCambioFisico_id`) REFERENCES `articulocambiofisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ArticuloCambioFisico_has_HistorialSituaciones_HistorialSit1` FOREIGN KEY (`HistorialSituaciones_idHistorialSituaciones`) REFERENCES `historialsituaciones` (`idHistorialSituaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lleva el registro de las situaciones por las que pasa un mov /* comment truncated */ /*imiento, así como los usuarios que realizan los cambios de situación*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articulocambiomaterial`
--

DROP TABLE IF EXISTS `articulocambiomaterial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulocambiomaterial` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del articulo',
  `Fecha_Caducidad` date NOT NULL COMMENT 'Fecha caducidad del medicamento',
  `Lote` int(11) NOT NULL COMMENT 'lote',
  `Precio_Unitario` varchar(45) NOT NULL COMMENT 'precio unitario del articulo',
  `precio_neto` varchar(45) NOT NULL,
  `cantidad` double NOT NULL COMMENT 'Cantidad del articulo',
  `Tasa_IVA` decimal(10,0) NOT NULL COMMENT 'tasa iva aplicada al articulo',
  `Porcentaje_Descuento` varchar(45) NOT NULL COMMENT 'Porcentaje de descuentoque se aplica al artiulo',
  `Cumple_Caducidad` varchar(1) NOT NULL COMMENT 'Este campo toma los valores Si o No dependiendo si el medicamento cumple con la caducidad o no',
  `EntradaCambioFisico_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ArticuloCambioFisico_EntradaCambioFisico1_idx` (`EntradaCambioFisico_id`),
  CONSTRAINT `fk_ArticuloCambioFisico_EntradaCambioFisico100` FOREIGN KEY (`EntradaCambioFisico_id`) REFERENCES `entradacambiomaterial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena los artículos asociados a un entrada por cambio de  /* comment truncated */ /*material*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articulocambiomaterial_has_historialsituaciones`
--

DROP TABLE IF EXISTS `articulocambiomaterial_has_historialsituaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulocambiomaterial_has_historialsituaciones` (
  `ArticuloCambioMaterial_id` int(11) NOT NULL,
  `HistorialSituaciones_idHistorialSituaciones` int(11) NOT NULL,
  PRIMARY KEY (`ArticuloCambioMaterial_id`,`HistorialSituaciones_idHistorialSituaciones`),
  KEY `fk_ArticuloCambioMaterial_has_HistorialSituaciones_Historia_idx` (`HistorialSituaciones_idHistorialSituaciones`),
  KEY `fk_ArticuloCambioMaterial_has_HistorialSituaciones_Articulo_idx` (`ArticuloCambioMaterial_id`),
  CONSTRAINT `fk_ArticuloCambioMaterial_has_HistorialSituaciones_ArticuloCa1` FOREIGN KEY (`ArticuloCambioMaterial_id`) REFERENCES `articulocambiomaterial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ArticuloCambioMaterial_has_HistorialSituaciones_HistorialS1` FOREIGN KEY (`HistorialSituaciones_idHistorialSituaciones`) REFERENCES `historialsituaciones` (`idHistorialSituaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articulocambiomedicamento`
--

DROP TABLE IF EXISTS `articulocambiomedicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulocambiomedicamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del articulo',
  `Fecha_Caducidad` date NOT NULL COMMENT 'Fecha caducidad del medicamento',
  `Lote` int(11) NOT NULL COMMENT 'lote',
  `Precio_Unitario` varchar(45) NOT NULL COMMENT 'precio unitario del articulo',
  `precio_neto` varchar(45) NOT NULL,
  `cantidad` double NOT NULL COMMENT 'Cantidad del articulo',
  `Tasa_IVA` decimal(10,0) NOT NULL COMMENT 'tasa iva aplicada al articulo',
  `Porcentaje_Descuento` varchar(45) NOT NULL COMMENT 'Porcentaje de descuentoque se aplica al artiulo',
  `Cumple_Caducidad` varchar(1) NOT NULL COMMENT 'Este campo toma los valores Si o No dependiendo si el medicamento cumple con la caducidad o no',
  `EntradaCambioFisico_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ArticuloCambioFisico_EntradaCambioFisico1_idx` (`EntradaCambioFisico_id`),
  CONSTRAINT `fk_ArticuloCambioFisico_EntradaCambioFisico10` FOREIGN KEY (`EntradaCambioFisico_id`) REFERENCES `entradacambiomedicamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena los artículos asociados a un entrada por cambiode m /* comment truncated */ /*edicamento*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articulomedicamento`
--

DROP TABLE IF EXISTS `articulomedicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulomedicamento` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del articulo',
  `CLAVEMEDICAMENTO` int(8) NOT NULL COMMENT 'clave del medicamento',
  `DESCRIPCION` varchar(100) NOT NULL COMMENT 'descripción del medicamento',
  `FORMAFARMACEUTICA` varchar(50) NOT NULL COMMENT 'forma farmaceutica del medicamento',
  `PRESENTACION` varchar(60) NOT NULL COMMENT 'presentación del medicamento',
  `PRECIOPROMEDIOINICIOANIO` double NOT NULL COMMENT 'precio al inicio del año del medicamento',
  `PRECIOPROMEDIOACTUAL` double NOT NULL COMMENT 'precio promedio actual del medicamento',
  `PRECIOPROMEDIOANTERIOR` double NOT NULL COMMENT 'precio promedio anterior del medicamento',
  `PRECIOULTIMAFACTURA` double NOT NULL COMMENT 'Precio del medicamento de la factura más reciente',
  `PRESENTACION1` varchar(50) DEFAULT NULL COMMENT 'Presentación del medicamento',
  `PRESENTACION2` varchar(50) DEFAULT NULL COMMENT 'Presentación del medicamento',
  `PRESENTACION3` varchar(50) DEFAULT NULL COMMENT 'Presentación del medicamento',
  `TIPOALMACEN` int(11) DEFAULT NULL COMMENT 'Tipo de',
  `FECHAREGISTRO` date NOT NULL COMMENT 'fecha en que se dio de alta el medicamento en la base de datos',
  `IDGRUPO` varchar(2) DEFAULT NULL COMMENT 'identificador del grupo al que pertenece el medicamento',
  `IDFAMILIA` varchar(4) DEFAULT NULL COMMENT 'identificador de la familia a la que pertenece el medicamento',
  `IDUNIDADMEDIDA` int(11) DEFAULT NULL COMMENT 'identificador de la unidad medica a la que pertenece el medicamento',
  `IDSITUACION` int(11) DEFAULT NULL COMMENT 'identificador de la situación actual del registro',
  `IDUSUARIO` int(4) DEFAULT NULL,
  `CONCENTRACION` varchar(50) NOT NULL COMMENT 'concentración del medicamento',
  PRIMARY KEY (`ID`),
  KEY `fk_ArticuloMedicamento_Grupos1_idx` (`IDGRUPO`),
  KEY `fk_ArticuloMedicamento_Familia1_idx` (`IDFAMILIA`),
  KEY `fk_ArticuloMedicamento_UnidadMedida1_idx` (`IDUNIDADMEDIDA`),
  KEY `fk_ArticuloMedicamento_Situacion1_idx` (`IDSITUACION`),
  KEY `fk_ArticuloMedicamento_Usuario1_idx` (`IDUSUARIO`),
  CONSTRAINT `fk_ArticuloMedicamento_Familia1` FOREIGN KEY (`IDFAMILIA`) REFERENCES `familia` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_ArticuloMedicamento_Grupos1` FOREIGN KEY (`IDGRUPO`) REFERENCES `grupos` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_ArticuloMedicamento_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_ArticuloMedicamento_UnidadMedida1` FOREIGN KEY (`IDUNIDADMEDIDA`) REFERENCES `unidadmedida` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_ArticuloMedicamento_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articulomedicamentoespecialidad`
--

DROP TABLE IF EXISTS `articulomedicamentoespecialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulomedicamentoespecialidad` (
  `IDARTICULOMEDICAMENTO` int(11) DEFAULT NULL COMMENT 'identificador del articulo relacionado a una o varias especialidades',
  `IDESPECIALIDAD` int(11) DEFAULT NULL COMMENT 'identificador de la especialidad',
  KEY `fk_ArticuloMedicamento_has_Especialidad_Especialidad1_idx` (`IDESPECIALIDAD`),
  KEY `fk_ArticuloMedicamento_has_Especialidad_ArticuloMedicamento_idx` (`IDARTICULOMEDICAMENTO`),
  CONSTRAINT `fk_ArticuloMedicamento_has_Especialidad_ArticuloMedicamento1` FOREIGN KEY (`IDARTICULOMEDICAMENTO`) REFERENCES `articulomedicamento` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_ArticuloMedicamento_has_Especialidad_Especialidad1` FOREIGN KEY (`IDESPECIALIDAD`) REFERENCES `especialidad` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articulomedicamentorequisicion`
--

DROP TABLE IF EXISTS `articulomedicamentorequisicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulomedicamentorequisicion` (
  `IDARTICULOMEDICAMENTO` int(11) DEFAULT NULL COMMENT 'Identificador del articulo asociado a la requisición',
  `IDREQUISICION` int(11) DEFAULT NULL COMMENT 'identificador de la requisición',
  `CANTIDADSOLICITADA` int(11) DEFAULT NULL COMMENT 'Cantidad del medicamento solicitado en la requisición',
  KEY `fk_ArticuloMedicamento_has_Requisicion_Requisicion1_idx` (`IDREQUISICION`),
  KEY `fk_ArticuloMedicamento_has_Requisicion_ArticuloMedicamento1_idx` (`IDARTICULOMEDICAMENTO`),
  CONSTRAINT `fk_ArticuloMedicamento_has_Requisicion_ArticuloMedicamento1` FOREIGN KEY (`IDARTICULOMEDICAMENTO`) REFERENCES `articulomedicamento` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ArticuloMedicamento_has_Requisicion_Requisicion1` FOREIGN KEY (`IDREQUISICION`) REFERENCES `requisicion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articulosdonacion`
--

DROP TABLE IF EXISTS `articulosdonacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulosdonacion` (
  `idArticulo_Donacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del articulo',
  `Fecha_Caducidad` date NOT NULL COMMENT 'Fecha caducidad del medicamento',
  `Lote` int(11) NOT NULL COMMENT 'lote',
  `Precio_Unitario` varchar(45) NOT NULL COMMENT 'precio unitario del articulo',
  `precio_neto` varchar(45) NOT NULL,
  `cantidad` double NOT NULL COMMENT 'Cantidad del articulo',
  `Tasa_IVA` decimal(10,0) NOT NULL COMMENT 'tasa iva aplicada al articulo',
  `Porcentaje_Descuento` varchar(45) NOT NULL COMMENT 'Porcentaje de descuentoque se aplica al artiulo',
  `Cumple_Caducidad` varchar(1) NOT NULL COMMENT 'Este campo toma los valores Si o No dependiendo si el medicamento cumple con la caducidad o no',
  `EntradaDonacion_idEntradaDonacion` int(11) NOT NULL COMMENT 'Identificador de la Entrada por donación',
  PRIMARY KEY (`idArticulo_Donacion`),
  KEY `fk_ArticulosDonacion_EntradaDonacion1_idx` (`EntradaDonacion_idEntradaDonacion`),
  CONSTRAINT `fk_ArticulosDonacion_EntradaDonacion1` FOREIGN KEY (`EntradaDonacion_idEntradaDonacion`) REFERENCES `entradadonacion` (`idEntradaDonacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran los articulos asociados a una entrada por donac /* comment truncated */ /*ión*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articulosfactura`
--

DROP TABLE IF EXISTS `articulosfactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulosfactura` (
  `idArticuloFactura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del articulo',
  `FechaCaducidad` date NOT NULL COMMENT 'Fecha caducidad del medicamento',
  `Lote` int(11) NOT NULL COMMENT 'lote',
  `PrecioUnitario` varchar(45) NOT NULL COMMENT 'precio unitario del articulo',
  `precioneto` varchar(45) NOT NULL,
  `cantidad` double NOT NULL COMMENT 'Cantidad del articulo',
  `TasaIVA` decimal(10,0) NOT NULL COMMENT 'tasa iva aplicada al articulo',
  `PorcentajeDescuento` varchar(45) NOT NULL COMMENT 'Porcentaje de descuentoque se aplica al artiulo',
  `CumpleCaducidad` varchar(1) NOT NULL COMMENT 'Este campo toma los valores Si o No dependiendo si el medicamento cumple con la caducidad o no',
  `FacturasProveedor_idFacturasProveedor` int(11) NOT NULL,
  PRIMARY KEY (`idArticuloFactura`),
  KEY `fk_ArticulosFactura_FacturasProveedor1_idx` (`FacturasProveedor_idFacturasProveedor`),
  CONSTRAINT `fk_ArticulosFactura_FacturasProveedor1` FOREIGN KEY (`FacturasProveedor_idFacturasProveedor`) REFERENCES `facturasproveedor` (`idFacturasProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran los artículos asociados a la factura';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `centrocosto`
--

DROP TABLE IF EXISTS `centrocosto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centrocosto` (
  `ID` varchar(4) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `TITULAR` varchar(60) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  `IDUNIDADRESPONSABLE` int(4) DEFAULT NULL,
  `IDRUTAREPARTO` int(11) DEFAULT NULL,
  `IDUNIDADMEDICA` varchar(5) DEFAULT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_CentroCosto_Usuario1_idx` (`IDUSUARIO`),
  KEY `fk_CentroCosto_UnidadResponsable1_idx` (`IDUNIDADRESPONSABLE`),
  KEY `fk_CentroCosto_RutaReparto1_idx` (`IDRUTAREPARTO`),
  KEY `fk_CentroCosto_UnidadMedica1_idx` (`IDUNIDADMEDICA`),
  KEY `fk_CentroCosto_Situacion1_idx` (`IDSITUACION`),
  CONSTRAINT `fk_CentroCosto_RutaReparto1` FOREIGN KEY (`IDRUTAREPARTO`) REFERENCES `rutareparto` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_CentroCosto_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CentroCosto_UnidadMedica1` FOREIGN KEY (`IDUNIDADMEDICA`) REFERENCES `unidadmedica` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_CentroCosto_UnidadResponsable1` FOREIGN KEY (`IDUNIDADRESPONSABLE`) REFERENCES `unidadresponsable` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_CentroCosto_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `componente`
--

DROP TABLE IF EXISTS `componente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `componente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL,
  `Modulo_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`Modulo_ID`),
  KEY `fk_Componente_Modulo1_idx` (`Modulo_ID`),
  CONSTRAINT `fk_Componente_Modulo1` FOREIGN KEY (`Modulo_ID`) REFERENCES `modulo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena las opciones del sistema';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dependencia`
--

DROP TABLE IF EXISTS `dependencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependencia` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(80) NOT NULL,
  `TITULAR` varchar(60) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Dependencia_Usuario1_idx` (`IDUSUARIO`),
  KEY `fk_Dependencia_Situacion1_idx` (`IDSITUACION`),
  CONSTRAINT `fk_Dependencia_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dependencia_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entradacambiofisico`
--

DROP TABLE IF EXISTS `entradacambiofisico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradacambiofisico` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de tabla',
  `Numero_entrada` bigint(20) NOT NULL COMMENT 'numero de la entrada',
  `Folio_Oficio` varchar(45) NOT NULL COMMENT 'Folio del oficio',
  `Fecha_oficio` varchar(45) NOT NULL COMMENT 'Fecha de expedición del oficio',
  `Concepto` varchar(500) NOT NULL COMMENT 'Descripción del motivo de la entrada',
  `fecha_recepcion` date NOT NULL COMMENT 'Fecha de recepción del oficio',
  `FechaRegistro` date NOT NULL COMMENT 'Fecha de registro de la información',
  `Proveedor_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_EntradaDonacion_Proveedor1_idx` (`Proveedor_ID`),
  CONSTRAINT `fk_EntradaDonacion_Proveedor10` FOREIGN KEY (`Proveedor_ID`) REFERENCES `proveedor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran los datos asociados a un tipo de entrada "Entra /* comment truncated */ /*da por Cambio fisico"*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entradacambiofisico_has_movimientos`
--

DROP TABLE IF EXISTS `entradacambiofisico_has_movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradacambiofisico_has_movimientos` (
  `EntradaCambioFisico_id` int(11) NOT NULL,
  `Movimientos_idMovimientos` int(11) NOT NULL,
  PRIMARY KEY (`EntradaCambioFisico_id`,`Movimientos_idMovimientos`),
  KEY `fk_EntradaCambioFisico_has_Movimientos_Movimientos1_idx` (`Movimientos_idMovimientos`),
  KEY `fk_EntradaCambioFisico_has_Movimientos_EntradaCambioFisico1_idx` (`EntradaCambioFisico_id`),
  CONSTRAINT `fk_EntradaCambioFisico_has_Movimientos_EntradaCambioFisico1` FOREIGN KEY (`EntradaCambioFisico_id`) REFERENCES `entradacambiofisico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EntradaCambioFisico_has_Movimientos_Movimientos1` FOREIGN KEY (`Movimientos_idMovimientos`) REFERENCES `movimientos` (`idMovimientos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entradacambiomaterial`
--

DROP TABLE IF EXISTS `entradacambiomaterial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradacambiomaterial` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de tabla',
  `Numero_entrada` bigint(20) NOT NULL COMMENT 'numero de la entrada',
  `Folio_Oficio` varchar(45) NOT NULL COMMENT 'Folio del oficio',
  `Fecha_oficio` varchar(45) NOT NULL COMMENT 'Fecha de expedición del oficio',
  `Concepto` varchar(500) NOT NULL COMMENT 'Descripción del motivo de la entrada',
  `fecha_recepcion` date NOT NULL COMMENT 'Fecha de recepción del oficio',
  `FechaRegistro` date NOT NULL COMMENT 'Fecha de registro de la información',
  `Proveedor_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_EntradaDonacion_Proveedor1_idx` (`Proveedor_ID`),
  CONSTRAINT `fk_EntradaDonacion_Proveedor1000` FOREIGN KEY (`Proveedor_ID`) REFERENCES `proveedor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran los datos asociados a un tipo de entrada "Entra /* comment truncated */ /*da por Cambio de Material"*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entradacambiomaterial_has_movimientos`
--

DROP TABLE IF EXISTS `entradacambiomaterial_has_movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradacambiomaterial_has_movimientos` (
  `EntradaCambioMaterial_id` int(11) NOT NULL,
  `Movimientos_idMovimientos` int(11) NOT NULL,
  PRIMARY KEY (`EntradaCambioMaterial_id`,`Movimientos_idMovimientos`),
  KEY `fk_EntradaCambioMaterial_has_Movimientos_Movimientos1_idx` (`Movimientos_idMovimientos`),
  KEY `fk_EntradaCambioMaterial_has_Movimientos_EntradaCambioMater_idx` (`EntradaCambioMaterial_id`),
  CONSTRAINT `fk_EntradaCambioMaterial_has_Movimientos_EntradaCambioMaterial1` FOREIGN KEY (`EntradaCambioMaterial_id`) REFERENCES `entradacambiomaterial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EntradaCambioMaterial_has_Movimientos_Movimientos1` FOREIGN KEY (`Movimientos_idMovimientos`) REFERENCES `movimientos` (`idMovimientos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entradacambiomedicamento`
--

DROP TABLE IF EXISTS `entradacambiomedicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradacambiomedicamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de tabla',
  `Numero_entrada` bigint(20) NOT NULL COMMENT 'numero de la entrada',
  `Folio_Oficio` varchar(45) NOT NULL COMMENT 'Folio del oficio',
  `Fecha_oficio` varchar(45) NOT NULL COMMENT 'Fecha de expedición del oficio',
  `Concepto` varchar(500) NOT NULL COMMENT 'Descripción del motivo de la entrada',
  `fecha_recepcion` date NOT NULL COMMENT 'Fecha de recepción del oficio',
  `Fecha_Registro` date NOT NULL COMMENT 'Fecha de registro de la información',
  `Proveedor_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_EntradaDonacion_Proveedor1_idx` (`Proveedor_ID`),
  CONSTRAINT `fk_EntradaDonacion_Proveedor100` FOREIGN KEY (`Proveedor_ID`) REFERENCES `proveedor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran los datos asociados a un tipo de entrada "Entra /* comment truncated */ /*da por Cambio de Medicamento"*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entradadonacion`
--

DROP TABLE IF EXISTS `entradadonacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradadonacion` (
  `idEntradaDonacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de tabla',
  `Numero_entrada` bigint(20) NOT NULL COMMENT 'numero de la entrada',
  `Folio_Oficio` varchar(45) NOT NULL COMMENT 'Folio del oficio',
  `Fecha_oficio` varchar(45) NOT NULL COMMENT 'Fecha de expedición del oficio',
  `Concepto` varchar(500) NOT NULL COMMENT 'Descripción del motivo de la entrada',
  `fecha_recepcion` date NOT NULL COMMENT 'Fecha de recepción del oficio',
  `FechaRegistro` date NOT NULL COMMENT 'Fecha de registro de la información',
  `Proveedor_ID` int(11) NOT NULL,
  PRIMARY KEY (`idEntradaDonacion`),
  KEY `fk_EntradaDonacion_Proveedor1_idx` (`Proveedor_ID`),
  CONSTRAINT `fk_EntradaDonacion_Proveedor1` FOREIGN KEY (`Proveedor_ID`) REFERENCES `proveedor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran los datos del tipo entrada donación.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entradadonacion_has_historialsituaciones`
--

DROP TABLE IF EXISTS `entradadonacion_has_historialsituaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradadonacion_has_historialsituaciones` (
  `EntradaDonacion_idEntradaDonacion` int(11) NOT NULL,
  `HistorialSituaciones_idHistorialSituaciones` int(11) NOT NULL,
  PRIMARY KEY (`EntradaDonacion_idEntradaDonacion`,`HistorialSituaciones_idHistorialSituaciones`),
  KEY `fk_EntradaDonacion_has_HistorialSituaciones_HistorialSituac_idx` (`HistorialSituaciones_idHistorialSituaciones`),
  KEY `fk_EntradaDonacion_has_HistorialSituaciones_EntradaDonacion_idx` (`EntradaDonacion_idEntradaDonacion`),
  CONSTRAINT `fk_EntradaDonacion_has_HistorialSituaciones_EntradaDonacion1` FOREIGN KEY (`EntradaDonacion_idEntradaDonacion`) REFERENCES `entradadonacion` (`idEntradaDonacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EntradaDonacion_has_HistorialSituaciones_HistorialSituacio1` FOREIGN KEY (`HistorialSituaciones_idHistorialSituaciones`) REFERENCES `historialsituaciones` (`idHistorialSituaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entradadonacion_has_movimientos`
--

DROP TABLE IF EXISTS `entradadonacion_has_movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradadonacion_has_movimientos` (
  `EntradaDonacion_idEntradaDonacion` int(11) NOT NULL,
  `Movimientos_idMovimientos` int(11) NOT NULL,
  PRIMARY KEY (`EntradaDonacion_idEntradaDonacion`,`Movimientos_idMovimientos`),
  KEY `fk_EntradaDonacion_has_Movimientos_Movimientos1_idx` (`Movimientos_idMovimientos`),
  KEY `fk_EntradaDonacion_has_Movimientos_EntradaDonacion1_idx` (`EntradaDonacion_idEntradaDonacion`),
  CONSTRAINT `fk_EntradaDonacion_has_Movimientos_EntradaDonacion1` FOREIGN KEY (`EntradaDonacion_idEntradaDonacion`) REFERENCES `entradadonacion` (`idEntradaDonacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EntradaDonacion_has_Movimientos_Movimientos1` FOREIGN KEY (`Movimientos_idMovimientos`) REFERENCES `movimientos` (`idMovimientos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Esta tabla se registran los movimientos asociados a una entr /* comment truncated */ /*ada de medicamento por donación*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entradaporfactura`
--

DROP TABLE IF EXISTS `entradaporfactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradaporfactura` (
  `Folio` varchar(20) NOT NULL COMMENT 'Folio de la factura',
  `NEA` varchar(45) NOT NULL COMMENT 'Número de Entrada al almacén, cada almacén tien su conjunto de números y se reinician cada año',
  `FechaRegistro` date NOT NULL COMMENT 'Fecha en que se guardan los datos en la base de datos',
  `numero_entrada` bigint(20) NOT NULL COMMENT 'Numero de entrada',
  `FacturasProveedor_idFacturasProveedor` int(11) NOT NULL,
  PRIMARY KEY (`numero_entrada`,`FacturasProveedor_idFacturasProveedor`),
  KEY `fk_EntradaPorFactura_FacturasProveedor1_idx` (`FacturasProveedor_idFacturasProveedor`),
  CONSTRAINT `fk_EntradaPorFactura_FacturasProveedor1` FOREIGN KEY (`FacturasProveedor_idFacturasProveedor`) REFERENCES `facturasproveedor` (`idFacturasProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran los datos generales de una factura';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entradaporfactura_has_historialsituaciones`
--

DROP TABLE IF EXISTS `entradaporfactura_has_historialsituaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradaporfactura_has_historialsituaciones` (
  `EntradaPorFactura_numero_entrada` bigint(20) NOT NULL,
  `HistorialSituaciones_idHistorialSituaciones` int(11) NOT NULL,
  PRIMARY KEY (`EntradaPorFactura_numero_entrada`,`HistorialSituaciones_idHistorialSituaciones`),
  KEY `fk_EntradaPorFactura_has_HistorialSituaciones_HistorialSitu_idx` (`HistorialSituaciones_idHistorialSituaciones`),
  KEY `fk_EntradaPorFactura_has_HistorialSituaciones_EntradaPorFac_idx` (`EntradaPorFactura_numero_entrada`),
  CONSTRAINT `fk_EntradaPorFactura_has_HistorialSituaciones_EntradaPorFactu1` FOREIGN KEY (`EntradaPorFactura_numero_entrada`) REFERENCES `entradaporfactura` (`numero_entrada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EntradaPorFactura_has_HistorialSituaciones_HistorialSituac1` FOREIGN KEY (`HistorialSituaciones_idHistorialSituaciones`) REFERENCES `historialsituaciones` (`idHistorialSituaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran cada una de las situaciones por las que pasa la /* comment truncated */ /* factura, así como el usuario que cambia su situación*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entradaporfactura_has_movimientos`
--

DROP TABLE IF EXISTS `entradaporfactura_has_movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradaporfactura_has_movimientos` (
  `EntradaPorFactura_numero_entrada` bigint(20) NOT NULL,
  `Movimientos_idMovimientos` int(11) NOT NULL,
  PRIMARY KEY (`EntradaPorFactura_numero_entrada`,`Movimientos_idMovimientos`),
  KEY `fk_EntradaPorFactura_has_Movimientos_Movimientos1_idx` (`Movimientos_idMovimientos`),
  KEY `fk_EntradaPorFactura_has_Movimientos_EntradaPorFactura1_idx` (`EntradaPorFactura_numero_entrada`),
  CONSTRAINT `fk_EntradaPorFactura_has_Movimientos_EntradaPorFactura1` FOREIGN KEY (`EntradaPorFactura_numero_entrada`) REFERENCES `entradaporfactura` (`numero_entrada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EntradaPorFactura_has_Movimientos_Movimientos1` FOREIGN KEY (`Movimientos_idMovimientos`) REFERENCES `movimientos` (`idMovimientos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran los movimientos asociados a la factura';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidad` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(80) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Especialidad_Situacion1_idx` (`IDSITUACION`),
  KEY `fk_Especialidad_Usuario1_idx` (`IDUSUARIO`),
  CONSTRAINT `fk_Especialidad_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Especialidad_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `facturasproveedor`
--

DROP TABLE IF EXISTS `facturasproveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturasproveedor` (
  `idFacturasProveedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `FechaElaboracion` date NOT NULL COMMENT 'Fecha de expedición de la factura',
  `Folio` varchar(45) NOT NULL COMMENT 'Folio de la factura',
  `ImporteTotal` varchar(45) NOT NULL COMMENT 'importe total de la factura',
  `FechaRegistro` date NOT NULL COMMENT 'fecha de registro de la información en la base de datos',
  `OrdenCompra_idOrdenCompra` int(11) NOT NULL COMMENT 'identificador de la orden de compra asociada a la faactura',
  `Proveedor_ID` int(11) NOT NULL COMMENT 'identificador del proveedor',
  `subtotal` double DEFAULT NULL COMMENT 'subtotal de la factura',
  `idEntradaPorFactura` int(11) NOT NULL COMMENT 'identificador de la entrada por factura',
  PRIMARY KEY (`idFacturasProveedor`),
  KEY `fk_FacturasProveedor_OrdenCompra1_idx` (`OrdenCompra_idOrdenCompra`),
  KEY `fk_FacturasProveedor_Proveedor1_idx` (`Proveedor_ID`),
  CONSTRAINT `fk_FacturasProveedor_OrdenCompra1` FOREIGN KEY (`OrdenCompra_idOrdenCompra`) REFERENCES `ordencompra` (`idOrdenCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_FacturasProveedor_Proveedor1` FOREIGN KEY (`Proveedor_ID`) REFERENCES `proveedor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran las entradas por factura';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `familia`
--

DROP TABLE IF EXISTS `familia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `familia` (
  `ID` varchar(4) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDTIPOALMACEN` int(11) DEFAULT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Familia_TipoAlmacen1_idx` (`IDTIPOALMACEN`),
  KEY `fk_Familia_Usuario1_idx` (`IDUSUARIO`),
  KEY `fk_Familia_Situacion1_idx` (`IDSITUACION`),
  CONSTRAINT `fk_Familia_TipoAlmacen1` FOREIGN KEY (`IDTIPOALMACEN`) REFERENCES `tipoalmacen` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Familia_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `firma`
--

DROP TABLE IF EXISTS `firma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firma` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRERESPONSABLE` varchar(80) DEFAULT NULL,
  `PUESTO` varchar(80) DEFAULT NULL,
  `CONCEPTO` enum('AUTORIZO','ENTREGO','RECIBIO','SUPERVISO','Vo. Bo.') DEFAULT NULL,
  `CEDULA` varchar(15) DEFAULT NULL,
  `FECHAREGISTRO` date DEFAULT NULL,
  `IDUSUARIO` int(11) DEFAULT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `funcion`
--

DROP TABLE IF EXISTS `funcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(80) NOT NULL,
  `PRIORIDAD` int(3) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_kfuncion_kusuario1_idx` (`IDUSUARIO`),
  KEY `fk_kfuncion_ksituacion1_idx` (`IDSITUACION`),
  CONSTRAINT `fk_kfuncion_ksituacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_kfuncion_kusuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `ID` varchar(2) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `DENTROCUADRO` varchar(1) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Grupos_Usuario1_idx` (`IDUSUARIO`),
  KEY `fk_Grupos_Situacion1_idx` (`IDSITUACION`),
  CONSTRAINT `fk_Grupos_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Grupos_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `halmacen`
--

DROP TABLE IF EXISTS `halmacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `halmacen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDALMACEN` int(11) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `TITULAR` varchar(80) NOT NULL,
  `FOLIONEA` int(6) NOT NULL,
  `FOLIOREQUISICIONCOMPRAS` int(6) NOT NULL,
  `REGISTRAPRODUCTO` varchar(1) NOT NULL,
  `CONSECUTIVOREQUISICION` int(10) NOT NULL,
  `VISTOBUENO` varchar(100) NOT NULL,
  `RESPONSABLE1` varchar(100) NOT NULL,
  `RESPONSABLE2` varchar(100) DEFAULT NULL,
  `RESPONSABLE3` varchar(100) DEFAULT NULL,
  `RESPONSABLE4` varchar(100) DEFAULT NULL,
  `IDTIPOALMACEN` int(11) NOT NULL,
  `IDCENTROCOSTO` varchar(4) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `harticulomedicamento`
--

DROP TABLE IF EXISTS `harticulomedicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `harticulomedicamento` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDARTICULOMEDICAMENTO` int(11) NOT NULL,
  `CLAVEMEDICAMENTO` int(8) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `FORMAFARMACEUTICA` varchar(50) NOT NULL,
  `PRESENTACION` varchar(60) NOT NULL,
  `PRECIOPROMEDIOINICIOANIO` double NOT NULL,
  `PRECIOPROMEDIOACTUAL` double NOT NULL,
  `PRECIOPROMEDIOANTERIOR` double NOT NULL,
  `PRECIOULTIMAFACTURA` double NOT NULL,
  `PRESENTACION1` varchar(50) DEFAULT NULL,
  `PRESENTACION2` varchar(50) DEFAULT NULL,
  `PRESENTACION3` varchar(50) DEFAULT NULL,
  `TIPOALMACEN` int(11) NOT NULL,
  `IDGRUPO` varchar(2) NOT NULL,
  `IDFAMILIA` varchar(4) NOT NULL,
  `IDUNIDADMEDIDA` int(11) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `CONCENTRACION` varchar(50) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('ACTIVAR','CANCELAR','MODIFICAR') NOT NULL,
  `MOTIVO` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `harticulomedicamentoespecialidad`
--

DROP TABLE IF EXISTS `harticulomedicamentoespecialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `harticulomedicamentoespecialidad` (
  `FOLIORECETA` varchar(20) NOT NULL,
  `IDPACIENTE` varchar(20) NOT NULL,
  `IDUSUARIO` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('ELIMINAR','MODIFICAR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hcentrocosto`
--

DROP TABLE IF EXISTS `hcentrocosto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hcentrocosto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDCENTROCOSTO` varchar(4) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `TITULAR` varchar(60) NOT NULL,
  `IDUNIDADRESPONSABLE` int(4) NOT NULL,
  `IDRUTAREPARTO` int(11) NOT NULL,
  `IDUNIDADMEDICA` varchar(5) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hdependencia`
--

DROP TABLE IF EXISTS `hdependencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hdependencia` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDDEPENDENCIA` int(11) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `TITULAR` varchar(60) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hespecialidad`
--

DROP TABLE IF EXISTS `hespecialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hespecialidad` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDESPECIALIDAD` int(11) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hfamilia`
--

DROP TABLE IF EXISTS `hfamilia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hfamilia` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDFAMILIA` varchar(4) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `IDTIPOALMACEN` int(11) NOT NULL,
  `IDSITUACION` int(4) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hfuncion`
--

DROP TABLE IF EXISTS `hfuncion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hfuncion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDFUNCION` int(11) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `PRIORIDAD` int(3) NOT NULL,
  `IDSITUACION` int(4) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hgrupos`
--

DROP TABLE IF EXISTS `hgrupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hgrupos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDGRUPOS` varchar(2) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `DENTROCUADRO` varchar(1) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historialsituaciones`
--

DROP TABLE IF EXISTS `historialsituaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historialsituaciones` (
  `idHistorialSituaciones` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla que lleva el registro de las situaciones por la cual ha pasado una entrada, así como el usuario que esta cambiando de situación al registro',
  `Fecha` date NOT NULL COMMENT 'Fecha en que se dio de alta el registro en la base de datos',
  `NumeroEntradaSalida` int(11) DEFAULT NULL COMMENT 'Numero de entrada o de salida del movimiento',
  `TipoEntrada` int(11) NOT NULL COMMENT 'Especifica si el movimiento fue de entrada o salida',
  `Usuario_ID` int(4) NOT NULL COMMENT 'Identificador del usuario',
  `Situacion_ID` int(11) NOT NULL COMMENT 'Identificador de la situación del registro',
  PRIMARY KEY (`idHistorialSituaciones`),
  KEY `fk_HistorialSituaciones_Usuario1_idx` (`Usuario_ID`),
  KEY `fk_HistorialSituaciones_Situacion1_idx` (`Situacion_ID`),
  CONSTRAINT `fk_HistorialSituaciones_Usuario1` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_HistorialSituaciones_Situacion1` FOREIGN KEY (`Situacion_ID`) REFERENCES `situacion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran todas las situaciones por las que cambia un mov /* comment truncated */ /*imiento de entrada o salida*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historialsituaciones_has_articulocambiomedicamento`
--

DROP TABLE IF EXISTS `historialsituaciones_has_articulocambiomedicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historialsituaciones_has_articulocambiomedicamento` (
  `HistorialSituaciones_idHistorialSituaciones` int(11) NOT NULL,
  `ArticuloCambioMedicamento_id` int(11) NOT NULL,
  PRIMARY KEY (`HistorialSituaciones_idHistorialSituaciones`,`ArticuloCambioMedicamento_id`),
  KEY `fk_HistorialSituaciones_has_ArticuloCambioMedicamento_Artic_idx` (`ArticuloCambioMedicamento_id`),
  KEY `fk_HistorialSituaciones_has_ArticuloCambioMedicamento_Histo_idx` (`HistorialSituaciones_idHistorialSituaciones`),
  CONSTRAINT `fk_HistorialSituaciones_has_ArticuloCambioMedicamento_Histori1` FOREIGN KEY (`HistorialSituaciones_idHistorialSituaciones`) REFERENCES `historialsituaciones` (`idHistorialSituaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_HistorialSituaciones_has_ArticuloCambioMedicamento_Articul1` FOREIGN KEY (`ArticuloCambioMedicamento_id`) REFERENCES `articulocambiomedicamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena las situaciones por las que pasa el registro y quie /* comment truncated */ /*n realiza el cambio de situación del mismo*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hmedico`
--

DROP TABLE IF EXISTS `hmedico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hmedico` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDMEDICO` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `APPATERNO` varchar(50) NOT NULL,
  `APMATERNO` varchar(50) NOT NULL,
  `CEDULA` varchar(30) NOT NULL,
  `IDCENTROCOSTO` varchar(4) NOT NULL,
  `IDESPECIALIDAD` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hnombrescomerciales`
--

DROP TABLE IF EXISTS `hnombrescomerciales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hnombrescomerciales` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNOMBRESCOMERCIALES` int(11) NOT NULL,
  `CODIGOBARRAS` varchar(20) NOT NULL,
  `NOMBRECOMERCIAL` varchar(100) NOT NULL,
  `LABORATORIO` varchar(100) NOT NULL,
  `PRESENTACIONCOMERCIAL` varchar(100) NOT NULL,
  `INDICADORSUBROGAR` varchar(1) NOT NULL,
  `IDARTICULOMEDICAMENTO` int(11) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hpaciente`
--

DROP TABLE IF EXISTS `hpaciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hpaciente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDPACIENTE` int(7) NOT NULL,
  `AFILIACION` varchar(30) DEFAULT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `APPATERNO` varchar(50) NOT NULL,
  `APMATERNO` varchar(50) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR','ELIMINAR','ACTIVAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hproveedor`
--

DROP TABLE IF EXISTS `hproveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hproveedor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDPROVEEDOR` int(11) NOT NULL,
  `PADRON` varchar(10) NOT NULL,
  `FECHAVIGENCIA` date DEFAULT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `RFC` varchar(16) NOT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `TIPO` enum('ISSSTEP','LICITACION','UNICA COMPRA') NOT NULL,
  `DIRECTOR` varchar(100) DEFAULT NULL,
  `REPRESENTANTE` varchar(100) DEFAULT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  `CIUDAD` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `MAIL` varchar(100) DEFAULT NULL,
  `CONDICIONPAGO` varchar(20) NOT NULL,
  `ACRONIMO` varchar(25) DEFAULT NULL,
  `GIRO` varchar(50) DEFAULT NULL,
  `TEL1` varchar(15) DEFAULT NULL,
  `TEL2` varchar(15) DEFAULT NULL,
  `FAX` varchar(15) DEFAULT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('ACTIVAR','CANCELAR','ELIMINAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hrutareparto`
--

DROP TABLE IF EXISTS `hrutareparto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hrutareparto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDRUTAREPARTO` int(11) NOT NULL,
  `DESCRIPCION` varchar(60) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hsituacion`
--

DROP TABLE IF EXISTS `hsituacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hsituacion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDSITUACION` int(11) NOT NULL,
  `DESCRIPCION` varchar(40) NOT NULL,
  `TIPOSITUACION` enum('ALTA','BAJA') NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('ELIMINAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `htipoentrada`
--

DROP TABLE IF EXISTS `htipoentrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `htipoentrada` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDTIPOENTRADA` int(11) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `ACTUALIZAPRECIO` varchar(1) NOT NULL,
  `ESFACTURA` varchar(1) NOT NULL,
  `SALDOAFECTA` varchar(1) NOT NULL,
  `LLEVACENTROCOSTO` varchar(1) NOT NULL,
  `LLEVAFECHACADUCIDAD` varchar(1) NOT NULL,
  `SIGNOENTRADA` tinyint(4) NOT NULL,
  `FOLIO` int(11) NOT NULL,
  `ALMACENSUBROGADO` varchar(1) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `htipoobservacion`
--

DROP TABLE IF EXISTS `htipoobservacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `htipoobservacion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDTIPOOBSERVACION` int(11) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `NOTACREDITO` varchar(1) NOT NULL,
  `LLEVAARTICULOS` varchar(1) NOT NULL,
  `ESSANCION` varchar(1) NOT NULL,
  `AFECTAINVENTARIO` varchar(1) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `htiporequisicion`
--

DROP TABLE IF EXISTS `htiporequisicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `htiporequisicion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDTIPOREQUISICION` int(11) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `LLEVAPACIENTE` varchar(1) NOT NULL,
  `CHECAFOLIOMEDICO` varchar(1) NOT NULL,
  `MEDICAMENTOALMACEN` varchar(1) NOT NULL,
  `FOLIOREQUISICION` int(6) NOT NULL,
  `MAXPACIENTES` int(3) NOT NULL,
  `MAXMEDPAC` int(2) NOT NULL COMMENT 'MAXMEDPAC=MAXIMO DE MEDICAMENTOS POR PACIENTE',
  `IDFUNCION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `htiposalida`
--

DROP TABLE IF EXISTS `htiposalida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `htiposalida` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDTIPOSALIDA` int(11) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `ACTUALIZAPRECIO` varchar(1) NOT NULL,
  `ESREQUISICION` varchar(1) NOT NULL,
  `FOLIOPORALMACEN` varchar(1) NOT NULL,
  `SALDOAFECTA` varchar(1) NOT NULL,
  `LLEVACENTROCOSTO` varchar(1) NOT NULL,
  `SIGNOENTRADA` tinyint(4) NOT NULL,
  `ALMACENSUBROGADO` varchar(1) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hunidadmedica`
--

DROP TABLE IF EXISTS `hunidadmedica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hunidadmedica` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUNIDADMEDICA` varchar(5) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `NIVEL` enum('1','2','3') NOT NULL,
  `CLAVEREGION` int(2) NOT NULL,
  `CLASIFICACION` varchar(12) NOT NULL,
  `IDTIPOUNIDAD` int(11) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hunidadmedida`
--

DROP TABLE IF EXISTS `hunidadmedida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hunidadmedida` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUNIDADMEDIDA` varchar(13) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hunidadresponsable`
--

DROP TABLE IF EXISTS `hunidadresponsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hunidadresponsable` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `IDUNIDADRESPONSABLE` int(4) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `TITULAR` varchar(60) NOT NULL,
  `IDDEPENDENCIA` varchar(2) NOT NULL,
  `IDSITUACION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `husuario`
--

DROP TABLE IF EXISTS `husuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `husuario` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `APPATERNO` varchar(30) NOT NULL,
  `APMATERNO` varchar(30) NOT NULL,
  `TIPOUSUARIO` enum('usuario','empleado') NOT NULL,
  `FACULTADESPECIAL` tinyint(4) NOT NULL,
  `LOGIN` varchar(45) NOT NULL,
  `CONTRASENIA` varchar(45) NOT NULL,
  `CORREO` varchar(45) DEFAULT NULL,
  `TELEFONO` varchar(18) DEFAULT NULL,
  `FACEBOOK` varchar(45) DEFAULT NULL,
  `TWITER` varchar(45) DEFAULT NULL,
  `IDALMACEN` int(11) NOT NULL,
  `IDCENTROCOSTO` varchar(4) NOT NULL,
  `IDPUESTO` int(11) NOT NULL,
  `IDTURNO` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` enum('CANCELAR','MODIFICAR') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `medicamentosporreceta`
--

DROP TABLE IF EXISTS `medicamentosporreceta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicamentosporreceta` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla',
  `cantidad` bigint(20) NOT NULL COMMENT 'Cantidad de medicamento que tiene la receta',
  `Receta_id` int(11) NOT NULL COMMENT 'Identificador de la receta asociada',
  `Receta_Medico_ID` int(11) NOT NULL COMMENT 'Identificador del medico que expide la receta',
  `Receta_Paciente_ID` int(7) NOT NULL COMMENT 'Identificador del paciente a la que pertenece la receta',
  `NombresComerciales_ID` int(11) NOT NULL COMMENT 'Identificador de los nombres comerciales de los medicamentos asociados a la receta',
  PRIMARY KEY (`id`,`Receta_id`,`Receta_Medico_ID`,`Receta_Paciente_ID`,`NombresComerciales_ID`),
  KEY `fk_MedicamentosPorReceta_Receta1_idx` (`Receta_id`,`Receta_Medico_ID`,`Receta_Paciente_ID`),
  KEY `fk_MedicamentosPorReceta_NombresComerciales1_idx` (`NombresComerciales_ID`),
  CONSTRAINT `fk_MedicamentosPorReceta_Receta1` FOREIGN KEY (`Receta_id`, `Receta_Medico_ID`, `Receta_Paciente_ID`) REFERENCES `receta` (`id`, `Medico_ID`, `Paciente_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_MedicamentosPorReceta_NombresComerciales1` FOREIGN KEY (`NombresComerciales_ID`) REFERENCES `nombrescomerciales` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registra el medicamento que tiene registrado la receta';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medico` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'número de identificación del registro',
  `NOMBRE` varchar(100) NOT NULL COMMENT 'Nombre del médico',
  `APPATERNO` varchar(50) NOT NULL COMMENT 'Apellido del médico',
  `APMATERNO` varchar(50) NOT NULL COMMENT 'Apellido materno del médico',
  `CEDULA` varchar(30) NOT NULL COMMENT 'número de cedula del médico',
  `FECHAREGISTRO` date NOT NULL COMMENT 'Fecha en que se dio de alta el registro en la base de datos',
  `IDCENTROCOSTO` varchar(4) DEFAULT NULL COMMENT 'número del identificador del centro de costo al que pertenece el médico',
  `IDESPECIALIDAD` int(11) DEFAULT NULL COMMENT 'identificador de la especialidad a la que pertenece el médico',
  `IDUSUARIO` int(4) DEFAULT NULL COMMENT 'identificador de usuario que esta registrando al médico en la base de dato',
  `IDSITUACION` int(11) DEFAULT NULL COMMENT 'identificador de la situación en la que se encuentra el registro',
  PRIMARY KEY (`ID`),
  KEY `fk_Medico_CentroCosto1_idx` (`IDCENTROCOSTO`),
  KEY `fk_Medico_Especialidad1_idx` (`IDESPECIALIDAD`),
  KEY `fk_Medico_Usuario1_idx` (`IDUSUARIO`),
  KEY `fk_Medico_Situacion1_idx` (`IDSITUACION`),
  CONSTRAINT `fk_Medico_Especialidad1` FOREIGN KEY (`IDESPECIALIDAD`) REFERENCES `especialidad` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Medico_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Medico_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `DESCRPCION` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena los módulos del sistema, por los cuales se agrupan  /* comment truncated */ /*los componentes*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `movimientos`
--

DROP TABLE IF EXISTS `movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimientos` (
  `idMovimientos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del movimiento',
  `Cantidad` int(11) NOT NULL COMMENT 'Cantidad de articulos',
  `costo` double DEFAULT NULL COMMENT 'precio del producto',
  `Almacen_Origen` int(11) NOT NULL COMMENT 'identificador del almacen donde se da el movimiento de salida',
  `Almacen_Destino` int(11) NOT NULL COMMENT 'Identificador del almacen en donse se hace el movimiento de entrada',
  `Fecha_Registro` date NOT NULL COMMENT 'Fecha de registro',
  `Fecha_Movimiento` datetime NOT NULL COMMENT 'Fecha y hora del movimiento',
  `lote` varchar(45) DEFAULT NULL COMMENT 'numero de lote del medicamento',
  `NombresComerciales_ID` int(11) NOT NULL COMMENT 'identificador del medicamento a nivel nombre comercial',
  `NumeroMovimiento` bigint(20) NOT NULL COMMENT 'Número de entradad o salida, según el tipo de movimiento',
  PRIMARY KEY (`idMovimientos`),
  KEY `fk_MovimientosEntrada_NombresComerciales1_idx` (`NombresComerciales_ID`),
  CONSTRAINT `fk_MovimientosEntrada_NombresComerciales1` FOREIGN KEY (`NombresComerciales_ID`) REFERENCES `nombrescomerciales` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='En esta tabla se registran los movimientos de entrada y sali /* comment truncated */ /*da de cada articulo, indicando la cantidad de entrada o salida así como  el origen y destino de los mismos*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `movimientos_has_entradacambiomedicamento`
--

DROP TABLE IF EXISTS `movimientos_has_entradacambiomedicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimientos_has_entradacambiomedicamento` (
  `Movimientos_idMovimientos` int(11) NOT NULL,
  `EntradaCambioMedicamento_id` int(11) NOT NULL,
  PRIMARY KEY (`Movimientos_idMovimientos`,`EntradaCambioMedicamento_id`),
  KEY `fk_Movimientos_has_EntradaCambioMedicamento_EntradaCambioMe_idx` (`EntradaCambioMedicamento_id`),
  KEY `fk_Movimientos_has_EntradaCambioMedicamento_Movimientos1_idx` (`Movimientos_idMovimientos`),
  CONSTRAINT `fk_Movimientos_has_EntradaCambioMedicamento_Movimientos1` FOREIGN KEY (`Movimientos_idMovimientos`) REFERENCES `movimientos` (`idMovimientos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Movimientos_has_EntradaCambioMedicamento_EntradaCambioMedi1` FOREIGN KEY (`EntradaCambioMedicamento_id`) REFERENCES `entradacambiomedicamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `movimientos_has_salidareceta`
--

DROP TABLE IF EXISTS `movimientos_has_salidareceta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimientos_has_salidareceta` (
  `Movimientos_idMovimientos` int(11) NOT NULL,
  `SalidaReceta_ID` int(11) NOT NULL,
  `SalidaReceta_Receta_id` int(11) NOT NULL,
  `SalidaReceta_Receta_Medico_ID` int(11) NOT NULL,
  PRIMARY KEY (`Movimientos_idMovimientos`,`SalidaReceta_ID`,`SalidaReceta_Receta_id`,`SalidaReceta_Receta_Medico_ID`),
  KEY `fk_Movimientos_has_SalidaReceta_SalidaReceta1_idx` (`SalidaReceta_ID`,`SalidaReceta_Receta_id`,`SalidaReceta_Receta_Medico_ID`),
  KEY `fk_Movimientos_has_SalidaReceta_Movimientos1_idx` (`Movimientos_idMovimientos`),
  CONSTRAINT `fk_Movimientos_has_SalidaReceta_Movimientos1` FOREIGN KEY (`Movimientos_idMovimientos`) REFERENCES `movimientos` (`idMovimientos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nombrescomerciales`
--

DROP TABLE IF EXISTS `nombrescomerciales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nombrescomerciales` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del codigo de barras',
  `CODIGOBARRAS` varchar(20) NOT NULL COMMENT 'Codigo de barras del medicamento',
  `NOMBRECOMERCIAL` varchar(100) NOT NULL COMMENT 'nombre comercial del medicamento',
  `LABORATORIO` varchar(100) NOT NULL COMMENT 'laboratorio del medicamento',
  `PRESENTACIONCOMERCIAL` varchar(100) NOT NULL COMMENT 'presentación del medicamento',
  `INDICADORSUBROGAR` varchar(1) NOT NULL COMMENT 'Si o  no se va a subrogar el medicamento',
  `FECHAREGISTRO` date NOT NULL COMMENT 'Fecha en que se esta dando de alta el registro',
  `IDARTICULOMEDICAMENTO` int(11) DEFAULT NULL COMMENT 'identificador del articulo o medicamento a la cual se le esta asociando el nombre comercial',
  `IDUSUARIO` int(4) DEFAULT NULL COMMENT 'identificador del usuario que registra el nombre comercial',
  `IDSITUACION` int(11) DEFAULT NULL COMMENT 'identificador de la situación actual del nombre comercial',
  PRIMARY KEY (`ID`),
  KEY `fk_NombresComerciales_ArticuloMedicamento1_idx` (`IDARTICULOMEDICAMENTO`),
  KEY `fk_NombresComerciales_Usuario1_idx` (`IDUSUARIO`),
  KEY `fk_NombresComerciales_Situacion1_idx` (`IDSITUACION`),
  CONSTRAINT `fk_NombresComerciales_ArticuloMedicamento1` FOREIGN KEY (`IDARTICULOMEDICAMENTO`) REFERENCES `articulomedicamento` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_NombresComerciales_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_NombresComerciales_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Se registra el medicamento a nivel nombre comercial, asocian /* comment truncated */ /*dole un medicamento a nivel sal*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nombrescomercialesotrassalidasdetalle`
--

DROP TABLE IF EXISTS `nombrescomercialesotrassalidasdetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nombrescomercialesotrassalidasdetalle` (
  `IDNOMBRESCOMERCIALES` int(11) NOT NULL COMMENT 'identificador del nombre comercial del medicamento',
  `IDOTRASSALIDAS` int(11) NOT NULL COMMENT 'identificador de la salida',
  `PRECIOPROMEDIO` int(11) DEFAULT NULL COMMENT 'Precio promedio calculado',
  `CANTIDADENTREGADA` int(11) DEFAULT NULL COMMENT 'Cantidad entregada del medicamento en la salida',
  `CANTIDADSOLICITADA` int(11) DEFAULT NULL COMMENT 'Cantidad solicitada para la salida',
  `CANTIDADSUBROGADA` int(11) DEFAULT NULL COMMENT 'Cantidad subrogada para la familia',
  PRIMARY KEY (`IDOTRASSALIDAS`),
  KEY `fk_NombresComerciales_has_OtrasSalidas_OtrasSalidas1_idx` (`IDOTRASSALIDAS`),
  KEY `fk_NombresComerciales_has_OtrasSalidas_NombresComerciales1_idx` (`IDNOMBRESCOMERCIALES`),
  CONSTRAINT `fk_NombresComerciales_has_OtrasSalidas_NombresComerciales1` FOREIGN KEY (`IDNOMBRESCOMERCIALES`) REFERENCES `nombrescomerciales` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_NombresComerciales_has_OtrasSalidas_OtrasSalidas1` FOREIGN KEY (`IDOTRASSALIDAS`) REFERENCES `otrassalidas` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nombrescomercialessalidareceta`
--

DROP TABLE IF EXISTS `nombrescomercialessalidareceta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nombrescomercialessalidareceta` (
  `IDNOMBRESCOMERCIALES` int(11) NOT NULL COMMENT 'identificador del nombre comercial',
  `IDSALIDARECETA` int(11) NOT NULL COMMENT 'identificador de la salida de la receta',
  `CANTIDADSOLICITADA` int(11) DEFAULT NULL COMMENT 'Cantidad solicitada del medicamento',
  `CANTIDADENTREGADA` int(11) DEFAULT NULL COMMENT 'Cantidad del medicamento despachada',
  `SUBROGADO` int(11) DEFAULT NULL COMMENT 'Cantidad de medicamento que se subrogo',
  `LOTE` varchar(25) DEFAULT NULL COMMENT 'lote del medicamento que se despacho',
  PRIMARY KEY (`IDNOMBRESCOMERCIALES`,`IDSALIDARECETA`),
  KEY `fk_NombresComerciales_has_SalidaReceta_SalidaReceta1_idx` (`IDSALIDARECETA`),
  KEY `fk_NombresComerciales_has_SalidaReceta_NombresComerciales1_idx` (`IDNOMBRESCOMERCIALES`),
  CONSTRAINT `fk_NombresComerciales_has_SalidaReceta_NombresComerciales1` FOREIGN KEY (`IDNOMBRESCOMERCIALES`) REFERENCES `nombrescomerciales` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_NombresComerciales_has_SalidaReceta_SalidaReceta1` FOREIGN KEY (`IDSALIDARECETA`) REFERENCES `salidareceta` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `observacionfactura`
--

DROP TABLE IF EXISTS `observacionfactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `observacionfactura` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la observación asociada a una factura',
  `IMPORTE` double NOT NULL COMMENT 'importe de la obervación',
  `CONCEPTO` varchar(200) NOT NULL COMMENT 'Descripción de la observación',
  `REFERENCIA` varchar(50) NOT NULL COMMENT 'Referencia de la observación',
  `FECHAREGISTRO` date NOT NULL COMMENT 'Fecha de registro de la observación',
  `FECHACOMPROMISO` date NOT NULL COMMENT 'Fecha compromiso de la observación',
  `IDENTRADA` int(11) DEFAULT NULL COMMENT 'identificador de la entrada',
  `IDTIPOOBSERVACION` int(11) DEFAULT NULL COMMENT 'identificador del tipo de observación del catalogo',
  PRIMARY KEY (`ID`),
  KEY `fk_ObservacionFactura_TipoObservacion1_idx` (`IDTIPOOBSERVACION`),
  CONSTRAINT `fk_ObservacionFactura_TipoObservacion1` FOREIGN KEY (`IDTIPOOBSERVACION`) REFERENCES `tipoobservacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ordencompra`
--

DROP TABLE IF EXISTS `ordencompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordencompra` (
  `idOrdenCompra` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` bigint(20) NOT NULL COMMENT 'numero de la orden de compra',
  `Fecha_orden` date NOT NULL COMMENT 'Fecha de orden de compra',
  `AlmacenEntrada` varchar(45) DEFAULT NULL COMMENT 'identificador del almacén de entrada',
  `Fecha_registro` date DEFAULT NULL COMMENT 'Fecha del registro de la tupla en la base de datos',
  PRIMARY KEY (`idOrdenCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran las orden de compra asociada a n facturas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `otrassalidas`
--

DROP TABLE IF EXISTS `otrassalidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otrassalidas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero del identificador de la salida',
  `ANIO` varchar(4) DEFAULT NULL COMMENT 'este campo ya no aplica',
  `OFICIO` varchar(45) DEFAULT NULL COMMENT 'Número de oficio asociado a la salida',
  `CONCEPTO` varchar(150) DEFAULT NULL COMMENT 'Concepto del porque se realizo la salida del medicamento',
  `IDTIPOSALIDA` int(11) DEFAULT NULL COMMENT 'identificador del tipo de salida del catalogo',
  `IDPROVEEDOR` int(11) DEFAULT NULL COMMENT 'identificador del proveedor',
  `IDUSUARIOREGISTRO` int(4) DEFAULT NULL COMMENT 'identificador del usuario que registro',
  `IDUSUARIOMODIFICO` int(4) DEFAULT NULL COMMENT 'identificador del usuario que modifico',
  `IDUSUARIOCANCELO` int(4) DEFAULT NULL COMMENT 'identificador del usuario que cancelo',
  `FECHAREGISTRO` date DEFAULT NULL COMMENT 'fecha en que se dio de alta la salidad en la base de datos',
  `FECHAMODIFICACION` date DEFAULT NULL COMMENT 'fecha en que se realizo la salida en la base de datos',
  `FECHACANDELACION` date DEFAULT NULL COMMENT 'fecha en que se realizo la cancelación del registro',
  `IDSITUACION` int(11) DEFAULT NULL COMMENT 'identificador de la situación en la que se encuentra el regsitro',
  PRIMARY KEY (`ID`),
  KEY `fk_OtrasSalidas_TipoSalida1_idx` (`IDTIPOSALIDA`),
  KEY `fk_OtrasSalidas_Proveedor1_idx` (`IDPROVEEDOR`),
  KEY `fk_OtrasSalidas_Usuario1_idx` (`IDUSUARIOREGISTRO`),
  KEY `fk_OtrasSalidas_Situacion1_idx` (`IDSITUACION`),
  CONSTRAINT `fk_OtrasSalidas_Proveedor1` FOREIGN KEY (`IDPROVEEDOR`) REFERENCES `proveedor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_OtrasSalidas_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_OtrasSalidas_TipoSalida1` FOREIGN KEY (`IDTIPOSALIDA`) REFERENCES `tiposalida` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_OtrasSalidas_Usuario1` FOREIGN KEY (`IDUSUARIOREGISTRO`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `ID` int(7) NOT NULL AUTO_INCREMENT,
  `AFILIACION` varchar(30) DEFAULT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `APPATERNO` varchar(50) NOT NULL,
  `APMATERNO` varchar(50) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Paciente_Situacion1_idx` (`IDSITUACION`),
  KEY `fk_Paciente_Usuario1_idx` (`IDUSUARIO`),
  CONSTRAINT `fk_Paciente_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Paciente_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PADRON` varchar(10) NOT NULL,
  `FECHAVIGENCIA` date DEFAULT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `RFC` varchar(16) NOT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `TIPO` enum('ISSSTEP','LICITACION','UNICA COMPRA') NOT NULL,
  `DIRECTOR` varchar(100) DEFAULT NULL,
  `REPRESENTANTE` varchar(100) DEFAULT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  `CIUDAD` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `MAIL` varchar(100) DEFAULT NULL,
  `CONDICIONPAGO` varchar(20) NOT NULL,
  `ACRONIMO` varchar(25) DEFAULT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `GIRO` varchar(50) DEFAULT NULL,
  `TEL1` varchar(15) DEFAULT NULL,
  `TEL2` varchar(15) DEFAULT NULL,
  `FAX` varchar(15) DEFAULT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Proveedor_Situacion1_idx` (`IDSITUACION`),
  KEY `fk_Proveedor_Usuario1_idx` (`IDUSUARIO`),
  CONSTRAINT `fk_Proveedor_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Proveedor_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `puesto`
--

DROP TABLE IF EXISTS `puesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puesto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(80) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `receta`
--

DROP TABLE IF EXISTS `receta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receta` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la receta',
  `numero_receta` bigint(20) NOT NULL COMMENT 'NÃºmero de salida de la receta',
  `padre` bigint(20) DEFAULT NULL COMMENT 'Campo que indica si la receta es colectiva, en el caso de que sea su valor nulo',
  `tipo` varchar(45) NOT NULL COMMENT 'Tipo de salida o requisiciÃ³n',
  `num_max_pacientes` varchar(45) CHARACTER SET utf16 NOT NULL COMMENT 'NÃºmero mÃ¡ximo de pacientes por receta',
  `num_max_med_paciente` varchar(45) CHARACTER SET utf8mb4 NOT NULL COMMENT 'NÃºmero mÃ¡ximo de medicamentos por paciente',
  `fecha_expedicion` date NOT NULL COMMENT 'Fecha de expediciÃ³n de la receta',
  `Paciente_ID` int(7) NOT NULL COMMENT 'Identificador del paciente ',
  `Medico_ID` int(11) NOT NULL COMMENT 'Identificador del mÃ©dico',
  `ValeSubrogado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Medico_ID`,`Paciente_ID`,`ValeSubrogado_id`),
  KEY `fk_Receta_Paciente1_idx` (`Paciente_ID`),
  KEY `fk_Receta_Medico1_idx` (`Medico_ID`),
  KEY `fk_Receta_ValeSubrogado1_idx` (`ValeSubrogado_id`),
  CONSTRAINT `fk_Receta_Medico1` FOREIGN KEY (`Medico_ID`) REFERENCES `medico` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Receta_Paciente1` FOREIGN KEY (`Paciente_ID`) REFERENCES `paciente` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena los datos generales de la receta';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `receta_has_historialsituaciones`
--

DROP TABLE IF EXISTS `receta_has_historialsituaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receta_has_historialsituaciones` (
  `Receta_id` int(11) NOT NULL,
  `Receta_Medico_ID` int(11) NOT NULL,
  `Receta_Paciente_ID` int(7) NOT NULL,
  `HistorialSituaciones_idHistorialSituaciones` int(11) NOT NULL,
  PRIMARY KEY (`Receta_id`,`Receta_Medico_ID`,`Receta_Paciente_ID`,`HistorialSituaciones_idHistorialSituaciones`),
  KEY `fk_Receta_has_HistorialSituaciones_HistorialSituaciones1_idx` (`HistorialSituaciones_idHistorialSituaciones`),
  KEY `fk_Receta_has_HistorialSituaciones_Receta1_idx` (`Receta_id`,`Receta_Medico_ID`,`Receta_Paciente_ID`),
  CONSTRAINT `fk_Receta_has_HistorialSituaciones_Receta1` FOREIGN KEY (`Receta_id`, `Receta_Medico_ID`, `Receta_Paciente_ID`) REFERENCES `receta` (`id`, `Medico_ID`, `Paciente_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Receta_has_HistorialSituaciones_HistorialSituaciones1` FOREIGN KEY (`HistorialSituaciones_idHistorialSituaciones`) REFERENCES `historialsituaciones` (`idHistorialSituaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requisicion`
--

DROP TABLE IF EXISTS `requisicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'llave de la requisición',
  `ID_REQUISICION` int(11) DEFAULT NULL COMMENT 'identificador de la requisición',
  `CONSECUTIVO_REQUISICION` int(11) DEFAULT NULL COMMENT 'Número consecutivo de la requisición, se reinicia cada año',
  `ID_CENTROCOSTO` varchar(4) DEFAULT NULL COMMENT 'Esta campo al parecer esta de mas',
  `ID_ALMACEN` int(11) DEFAULT NULL COMMENT 'identificador del almacen que esta despachando el medicamento',
  `CONCEPTO` varchar(150) DEFAULT NULL COMMENT 'Descripción de la requisición',
  `FECHA_EXPEDICION` date DEFAULT NULL COMMENT 'Fecha de expedición de la requisición',
  `FECHA_SURTIMIENTO` date DEFAULT NULL,
  `FECHA_CANCELACION` date DEFAULT NULL COMMENT 'Fecha de cancelación  la requisición',
  `FECHA_MODIFICACION` date DEFAULT NULL COMMENT 'Fecha en que se modifico  la requisición',
  `FECHA_TRAMITADA` date DEFAULT NULL COMMENT 'fecha en que se tramito  la requisición',
  `FECHA_ENTREGA` date DEFAULT NULL COMMENT 'Fecha de entrega de  la requisición',
  `IDSALIDA` int(11) DEFAULT NULL COMMENT 'identificador de la salida asociada a la requisición',
  `IDENTRADA` int(11) DEFAULT NULL COMMENT 'identficador de la entrda asociada a la requisición',
  `IDTIPOREQUISICION` int(11) DEFAULT NULL COMMENT 'identificador del tipo de requisición',
  `IDTIPOSALIDA` int(11) DEFAULT NULL COMMENT 'identificador del tipo de salida asociado a la requisición',
  `IDSITUACION` int(11) DEFAULT NULL COMMENT 'identificador de lasituación asociado a la requisición',
  `IDGRUPO` varchar(2) DEFAULT NULL COMMENT 'identificador del grupo del medicamento',
  `IDUNIDADRESPONSABLE` int(4) DEFAULT NULL COMMENT 'identificador de la unidad responsable',
  `IDUSUARIOGENERA` int(4) DEFAULT NULL COMMENT 'identificador del usuario que genera la requisición',
  `IDUSUARIODESPACHO` int(4) DEFAULT NULL COMMENT 'identificador del usuario que despacha el medicamento solicitado en la requisición',
  `IDUSUARIOCANCELO` int(4) DEFAULT NULL COMMENT 'identificador del usuario que cancelo la requisición',
  `IDUSUARIOMODIFICO` int(4) DEFAULT NULL COMMENT 'identificador del usuario que modifico la requisición',
  `IDUSUARIOTRAMITO` int(4) DEFAULT NULL COMMENT 'identificador del usuario quetramito la requisición',
  `IDALMACENSOLICITA` int(11) DEFAULT NULL COMMENT 'identificador del almacen que esta solicitando el medicameto',
  `IDCENTROCOSTOSOLICITA` varchar(4) DEFAULT NULL COMMENT 'identificador del centro de costo que realiza la requisición',
  PRIMARY KEY (`ID`),
  KEY `fk_Requisicion_Usuario1_idx` (`IDUSUARIOGENERA`),
  KEY `fk_Requisicion_Usuario2_idx` (`IDUSUARIODESPACHO`),
  KEY `fk_Requisicion_TipoRequisicion1_idx` (`IDTIPOREQUISICION`),
  KEY `fk_Requisicion_TipoSalida1_idx` (`IDTIPOSALIDA`),
  KEY `fk_Requisicion_Situacion1_idx` (`IDSITUACION`),
  KEY `fk_Requisicion_Grupos1_idx` (`IDGRUPO`),
  KEY `fk_Requisicion_UnidadResponsable1_idx` (`IDUNIDADRESPONSABLE`),
  KEY `fk_Requisicion_Usuario3_idx` (`IDUSUARIOCANCELO`),
  KEY `fk_Requisicion_Usuario4_idx` (`IDUSUARIOMODIFICO`),
  KEY `fk_Requisicion_Usuario5_idx` (`IDUSUARIOTRAMITO`),
  CONSTRAINT `fk_Requisicion_Usuario1` FOREIGN KEY (`IDUSUARIOGENERA`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Requisicion_Usuario2` FOREIGN KEY (`IDUSUARIODESPACHO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Requisicion_TipoRequisicion1` FOREIGN KEY (`IDTIPOREQUISICION`) REFERENCES `tiporequisicion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Requisicion_TipoSalida1` FOREIGN KEY (`IDTIPOSALIDA`) REFERENCES `tiposalida` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Requisicion_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Requisicion_Grupos1` FOREIGN KEY (`IDGRUPO`) REFERENCES `grupos` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Requisicion_UnidadResponsable1` FOREIGN KEY (`IDUNIDADRESPONSABLE`) REFERENCES `unidadresponsable` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Requisicion_Usuario3` FOREIGN KEY (`IDUSUARIOCANCELO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Requisicion_Usuario4` FOREIGN KEY (`IDUSUARIOMODIFICO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_Requisicion_Usuario5` FOREIGN KEY (`IDUSUARIOTRAMITO`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requisicionfirma`
--

DROP TABLE IF EXISTS `requisicionfirma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicionfirma` (
  `IDREQUISICION` int(11) NOT NULL COMMENT 'identificador de la requición que esta aociado a las firmas que estan en la impresión de la requisición',
  `IDFIRMA` int(11) NOT NULL COMMENT 'identificador de las firmas de los responsables de la requisición',
  PRIMARY KEY (`IDREQUISICION`,`IDFIRMA`),
  KEY `fk_Requisicion_has_Firma_Firma1_idx` (`IDFIRMA`),
  KEY `fk_Requisicion_has_Firma_Requisicion1_idx` (`IDREQUISICION`),
  CONSTRAINT `fk_Requisicion_has_Firma_Requisicion1` FOREIGN KEY (`IDREQUISICION`) REFERENCES `requisicion` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Requisicion_has_Firma_Firma1` FOREIGN KEY (`IDFIRMA`) REFERENCES `firma` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL COMMENT 'Nombre del rol, por ejemplo: administrador, usuario, gerente',
  `situacion_status` varchar(11) DEFAULT NULL COMMENT 'situación del registro',
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rutareparto`
--

DROP TABLE IF EXISTS `rutareparto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rutareparto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(60) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_krutareparto_kusuario1_idx` (`IDUSUARIO`),
  KEY `fk_RutaReparto_Situacion2_idx` (`IDSITUACION`),
  CONSTRAINT `fk_krutareparto_kusuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_RutaReparto_Situacion2` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `salidaalmacen`
--

DROP TABLE IF EXISTS `salidaalmacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salidaalmacen` (
  `IDTIPOENTRADA` int(11) NOT NULL COMMENT 'identificador del tipo de entrada asociada al almacén',
  `IDALMACEN` int(11) NOT NULL COMMENT 'número de identificador del almacén',
  PRIMARY KEY (`IDTIPOENTRADA`,`IDALMACEN`),
  KEY `fk_TipoEntrada_has_Almacen_Almacen1_idx` (`IDALMACEN`),
  KEY `fk_TipoEntrada_has_Almacen_TipoEntrada1_idx` (`IDTIPOENTRADA`),
  CONSTRAINT `fk_TipoEntrada_has_Almacen_Almacen1` FOREIGN KEY (`IDALMACEN`) REFERENCES `almacen` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TipoEntrada_has_Almacen_TipoEntrada1` FOREIGN KEY (`IDTIPOENTRADA`) REFERENCES `tipoentrada` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `salidareceta`
--

DROP TABLE IF EXISTS `salidareceta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salidareceta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número de identificación del registro',
  `numero_salida` bigint(20) NOT NULL COMMENT 'Número de la receta expedida por el medico',
  `fecha_registro` date NOT NULL COMMENT 'Fecha de registro de los datos en la base de datos',
  `Receta_id` int(11) NOT NULL,
  `Receta_Medico_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`Receta_id`,`Receta_Medico_ID`),
  KEY `fk_SalidaReceta_Receta1_idx` (`Receta_id`,`Receta_Medico_ID`),
  CONSTRAINT `fk_SalidaReceta_Receta1` FOREIGN KEY (`Receta_id`, `Receta_Medico_ID`) REFERENCES `receta` (`id`, `Medico_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='Se registrán los datos generales de una receta individual o  /* comment truncated */ /*colectiva*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `salidarecetamovimientos`
--

DROP TABLE IF EXISTS `salidarecetamovimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salidarecetamovimientos` (
  `SalidaReceta_ID` int(11) NOT NULL COMMENT 'Identificador de la receta asociada a un movimiento',
  `Movimientos_idMovimientos` int(11) NOT NULL COMMENT 'Identificador del movimiento asociado a la receta',
  PRIMARY KEY (`SalidaReceta_ID`,`Movimientos_idMovimientos`),
  KEY `fk_SalidaReceta_has_Movimientos_Movimientos1_idx` (`Movimientos_idMovimientos`),
  KEY `fk_SalidaReceta_has_Movimientos_SalidaReceta1_idx` (`SalidaReceta_ID`),
  CONSTRAINT `fk_SalidaReceta_has_Movimientos_SalidaReceta1` FOREIGN KEY (`SalidaReceta_ID`) REFERENCES `salidareceta` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SalidaReceta_has_Movimientos_Movimientos1` FOREIGN KEY (`Movimientos_idMovimientos`) REFERENCES `movimientos` (`idMovimientos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registran los movimientos asociados a una receta';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del servicio',
  `NOMBRE` varchar(45) DEFAULT NULL COMMENT 'Nombre del servicio',
  `DESCRIPCION` varchar(250) DEFAULT NULL COMMENT 'Descripción del servicio',
  `Componente_ID` int(11) NOT NULL COMMENT 'identificador del componente al que pertenece el servicio',
  `Componente_Modulo_ID` int(11) NOT NULL COMMENT 'identificador del modulo al cual pertenece el servicio',
  PRIMARY KEY (`ID`),
  KEY `fk_Servicio_Componente1_idx` (`Componente_ID`,`Componente_Modulo_ID`),
  CONSTRAINT `fk_Servicio_Componente1` FOREIGN KEY (`Componente_ID`, `Componente_Modulo_ID`) REFERENCES `componente` (`ID`, `Modulo_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena los servicios  o funcionalidas del sistema, tales c /* comment truncated */ /*omo regsitrar consultar.*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servicioporrol`
--

DROP TABLE IF EXISTS `servicioporrol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicioporrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del servicio',
  `Lectura` varchar(1) DEFAULT NULL COMMENT 'Especifica si el servicio es de lectura',
  `Escritura` varchar(1) DEFAULT NULL COMMENT 'Especifica si el servicio es de escritura',
  `Roles_idrol` int(11) NOT NULL COMMENT 'Identificador del rol asociado al servicio',
  `Servicio_ID` int(11) NOT NULL COMMENT 'Identificador del servicio asociado al rol',
  PRIMARY KEY (`id`,`Servicio_ID`),
  KEY `fk_PermisoPorServicio_Roles1_idx` (`Roles_idrol`),
  KEY `fk_PermisoPorServicio_Servicio1_idx` (`Servicio_ID`),
  CONSTRAINT `fk_PermisoPorServicio_Roles1` FOREIGN KEY (`Roles_idrol`) REFERENCES `roles` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PermisoPorServicio_Servicio1` FOREIGN KEY (`Servicio_ID`) REFERENCES `servicio` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena los servicios asociados al rol';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `situacion`
--

DROP TABLE IF EXISTS `situacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `situacion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico del registro',
  `DESCRIPCION` varchar(40) NOT NULL COMMENT 'nombre de la situación',
  `FECHAREGISTRO` date NOT NULL COMMENT 'Fecha en que se dio de alta el registro en la base de datos',
  `TIPOSITUACION` enum('ALTA','BAJA') NOT NULL COMMENT 'Tipo de situación alta o baja',
  `IDUSUARIO` int(4) DEFAULT NULL COMMENT 'identificador del usuario que registro o realizo algún movimiento en el registro',
  PRIMARY KEY (`ID`),
  KEY `fk_ksituacion_kusuario1_idx` (`IDUSUARIO`),
  CONSTRAINT `fk_ksituacion_kusuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `subalmacen`
--

DROP TABLE IF EXISTS `subalmacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subalmacen` (
  `IDALMACEN` int(11) NOT NULL,
  `IDSUBALMACEN` int(11) NOT NULL,
  PRIMARY KEY (`IDALMACEN`,`IDSUBALMACEN`),
  KEY `fk_SubAlmacen_Almacen1_idx` (`IDALMACEN`),
  KEY `fk_SubAlmacen_Almacen2_idx` (`IDSUBALMACEN`),
  CONSTRAINT `fk_SubAlmacen_Almacen1` FOREIGN KEY (`IDALMACEN`) REFERENCES `almacen` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SubAlmacen_Almacen2` FOREIGN KEY (`IDSUBALMACEN`) REFERENCES `almacen` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipoalmacen`
--

DROP TABLE IF EXISTS `tipoalmacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoalmacen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipoentrada`
--

DROP TABLE IF EXISTS `tipoentrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoentrada` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(80) NOT NULL,
  `ACTUALIZAPRECIO` varchar(1) NOT NULL,
  `ESFACTURA` varchar(1) NOT NULL,
  `SALDOAFECTA` varchar(1) NOT NULL,
  `LLEVACENTROCOSTO` varchar(1) NOT NULL,
  `LLEVAFECHACADUCIDAD` varchar(1) NOT NULL,
  `SIGNOENTRADA` tinyint(4) NOT NULL,
  `FOLIO` int(11) NOT NULL,
  `ALMACENSUBROGADO` varchar(1) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  `IDFUNCION` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_TipoEntrada_Usuario1_idx` (`IDUSUARIO`),
  KEY `fk_TipoEntrada_Situacion1_idx` (`IDSITUACION`),
  KEY `IDFUNCION` (`IDFUNCION`),
  CONSTRAINT `fk_TipoEntrada_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_TipoEntrada_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `TipoEntrada_ibfk_1` FOREIGN KEY (`IDFUNCION`) REFERENCES `funcion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipoentradaalmacen`
--

DROP TABLE IF EXISTS `tipoentradaalmacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoentradaalmacen` (
  `IDTIPOENTRADA` int(11) NOT NULL,
  `IDALMACEN` int(11) NOT NULL,
  PRIMARY KEY (`IDTIPOENTRADA`,`IDALMACEN`),
  KEY `fk_TipoEntrada_has_Almacen_Almacen2_idx` (`IDALMACEN`),
  KEY `fk_TipoEntrada_has_Almacen_TipoEntrada2_idx` (`IDTIPOENTRADA`),
  CONSTRAINT `fk_TipoEntrada_has_Almacen_Almacen2` FOREIGN KEY (`IDALMACEN`) REFERENCES `almacen` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TipoEntrada_has_Almacen_TipoEntrada2` FOREIGN KEY (`IDTIPOENTRADA`) REFERENCES `tipoentrada` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipoobservacion`
--

DROP TABLE IF EXISTS `tipoobservacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoobservacion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(80) NOT NULL,
  `NOTACREDITO` varchar(1) NOT NULL,
  `LLEVAARTICULOS` varchar(1) NOT NULL,
  `ESSANCION` varchar(1) NOT NULL,
  `AFECTAINVENTARIO` varchar(1) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_TipoObservacion_Usuario1_idx` (`IDUSUARIO`),
  KEY `IDSITUACION` (`IDSITUACION`),
  CONSTRAINT `fk_TipoObservacion_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `TipoObservacion_ibfk_1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tiporequisicion`
--

DROP TABLE IF EXISTS `tiporequisicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiporequisicion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador único del registro',
  `DESCRIPCION` varchar(80) NOT NULL COMMENT 'nombre del tipo de requisición',
  `LLEVAPACIENTE` varchar(1) NOT NULL COMMENT 'Valor de si o no',
  `CHECAFOLIOMEDICO` varchar(1) NOT NULL COMMENT 'Valor de si o no',
  `MEDICAMENTOALMACEN` varchar(1) NOT NULL COMMENT 'Valor de si o no',
  `FOLIOREQUISICION` int(6) NOT NULL COMMENT 'es el folio de la requisición',
  `MAXPACIENTES` int(3) NOT NULL COMMENT 'Npumero máximo de pacientes por requisición',
  `MAXMEDPAC` int(2) NOT NULL COMMENT 'MAXMEDPAC=MAXIMO DE MEDICAMENTOS POR PACIENTE',
  `FECHAREGISTRO` date NOT NULL COMMENT 'Fecha en que se dio de alta el registro en la base de datos',
  `IDUSUARIO` int(4) DEFAULT NULL COMMENT 'identificador del usuario que esta registrando o haciendo algún movimiento en el registro',
  `IDSITUACION` int(11) DEFAULT NULL COMMENT 'identificador de la situación en la que se encuentra el registro',
  PRIMARY KEY (`ID`),
  KEY `fk_TipoRequisicion_Usuario1_idx` (`IDUSUARIO`),
  KEY `IDSITUACION` (`IDSITUACION`),
  CONSTRAINT `fk_TipoRequisicion_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `TipoRequisicion_ibfk_1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Se registran los tipos de requisición que se manejan en el s /* comment truncated */ /*istema tanto como para receta individual como para la requisición.*/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tiposalida`
--

DROP TABLE IF EXISTS `tiposalida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposalida` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del tipo de salida',
  `DESCRIPCION` varchar(80) NOT NULL COMMENT 'nombre del tipo de salida',
  `ACTUALIZAPRECIO` varchar(1) NOT NULL COMMENT 'valor de si o no',
  `ESREQUISICION` varchar(1) NOT NULL COMMENT 'valor de si o no',
  `FOLIOPORALMACEN` varchar(1) NOT NULL COMMENT 'valor de si o no',
  `SALDOAFECTA` varchar(1) NOT NULL COMMENT 'valor de si o no',
  `LLEVACENTROCOSTO` varchar(1) NOT NULL COMMENT 'valor de si o no',
  `SIGNOENTRADA` tinyint(4) NOT NULL COMMENT 'Puede tomar los valores de 1 ó -1',
  `ALMACENSUBROGADO` varchar(1) NOT NULL COMMENT 'valor de si o no',
  `FECHAREGISTRO` date NOT NULL COMMENT 'Fecha en que se guarda el registro en la base de datos',
  `IDUSUARIO` int(4) DEFAULT NULL COMMENT 'identificador del usuario que esta registrando o realizando alguna acción sobre el registro',
  `IDSITUACION` int(11) DEFAULT NULL COMMENT 'identificador de la situación en la que se encuentra el registro',
  `IDTIPOALMACEN` int(11) DEFAULT NULL COMMENT 'identificador del tipo de almacén',
  `IDFUNCION` int(11) DEFAULT NULL COMMENT 'No se esta usando ya',
  PRIMARY KEY (`ID`),
  KEY `fk_TipoEntrada_Usuario1_idx` (`IDUSUARIO`),
  KEY `fk_TipoEntrada_Situacion1_idx` (`IDSITUACION`),
  KEY `IDTIPOALMACEN` (`IDTIPOALMACEN`),
  KEY `IDFUNCION` (`IDFUNCION`),
  CONSTRAINT `fk_TipoEntrada_Situacion10` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_TipoEntrada_Usuario10` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `TipoSalida_ibfk_1` FOREIGN KEY (`IDTIPOALMACEN`) REFERENCES `tipoalmacen` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `TipoSalida_ibfk_2` FOREIGN KEY (`IDFUNCION`) REFERENCES `funcion` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tiposalidaalmacen`
--

DROP TABLE IF EXISTS `tiposalidaalmacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposalidaalmacen` (
  `IDALMACEN` int(11) NOT NULL,
  `IDTIPOSALIDA` int(11) NOT NULL,
  PRIMARY KEY (`IDALMACEN`,`IDTIPOSALIDA`),
  KEY `fk_Almacen_has_TipoSalida_TipoSalida1_idx` (`IDTIPOSALIDA`),
  KEY `fk_Almacen_has_TipoSalida_Almacen1_idx` (`IDALMACEN`),
  CONSTRAINT `fk_Almacen_has_TipoSalida_Almacen1` FOREIGN KEY (`IDALMACEN`) REFERENCES `almacen` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Almacen_has_TipoSalida_TipoSalida1` FOREIGN KEY (`IDTIPOSALIDA`) REFERENCES `tiposalida` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tiposalidatiporequisicion`
--

DROP TABLE IF EXISTS `tiposalidatiporequisicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposalidatiporequisicion` (
  `IDTIPOSALIDA` int(11) NOT NULL COMMENT 'numero de identificador del tipo de salida',
  `IDTIPOREQUISICION` int(11) NOT NULL COMMENT 'número de salida del tipo requisición',
  PRIMARY KEY (`IDTIPOSALIDA`,`IDTIPOREQUISICION`),
  KEY `fk_TipoSalida_has_TipoRequisicion_TipoRequisicion1_idx` (`IDTIPOREQUISICION`),
  KEY `fk_TipoSalida_has_TipoRequisicion_TipoSalida1_idx` (`IDTIPOSALIDA`),
  CONSTRAINT `fk_TipoSalida_has_TipoRequisicion_TipoRequisicion1` FOREIGN KEY (`IDTIPOREQUISICION`) REFERENCES `tiporequisicion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TipoSalida_has_TipoRequisicion_TipoSalida1` FOREIGN KEY (`IDTIPOSALIDA`) REFERENCES `tiposalida` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipounidadmedica`
--

DROP TABLE IF EXISTS `tipounidadmedica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipounidadmedica` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turno` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero de identificación del registro',
  `DESCRIPCION` varchar(80) NOT NULL COMMENT 'Nombre del turno',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `unidadmedica`
--

DROP TABLE IF EXISTS `unidadmedica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidadmedica` (
  `ID` varchar(5) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `IDTIPOUNIDAD` int(11) DEFAULT NULL,
  `NIVEL` enum('1','2','3') NOT NULL,
  `CLAVEREGION` int(2) NOT NULL,
  `CLASIFICACION` varchar(12) NOT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_kunidadmedica_ktipounidadmedica1_idx` (`IDTIPOUNIDAD`),
  KEY `fk_kunidadmedica_kusuario1_idx` (`IDUSUARIO`),
  KEY `fk_UnidadMedica_Situacion1_idx` (`IDSITUACION`),
  CONSTRAINT `fk_kunidadmedica_ktipounidadmedica1` FOREIGN KEY (`IDTIPOUNIDAD`) REFERENCES `tipounidadmedica` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_kunidadmedica_kusuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_UnidadMedica_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `unidadmedida`
--

DROP TABLE IF EXISTS `unidadmedida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidadmedida` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(80) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_UnidadMedida_Situacion1_idx` (`IDSITUACION`),
  KEY `fk_UnidadMedida_Usuario1_idx` (`IDUSUARIO`),
  CONSTRAINT `fk_UnidadMedida_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_UnidadMedida_Usuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `unidadresponsable`
--

DROP TABLE IF EXISTS `unidadresponsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidadresponsable` (
  `ID` int(4) NOT NULL,
  `DESCRIPCION` varchar(80) NOT NULL,
  `TITULAR` varchar(60) NOT NULL,
  `IDSITUACION` int(11) DEFAULT NULL,
  `IDUSUARIO` int(4) DEFAULT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `IDDEPENDENCIA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_kunidadresponsable_kusuario1_idx` (`IDUSUARIO`),
  KEY `fk_UnidadResponsable_Dependencia1_idx` (`IDDEPENDENCIA`),
  KEY `fk_UnidadResponsable_Situacion1_idx` (`IDSITUACION`),
  CONSTRAINT `fk_kunidadresponsable_kusuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_UnidadResponsable_Dependencia1` FOREIGN KEY (`IDDEPENDENCIA`) REFERENCES `dependencia` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_UnidadResponsable_Situacion1` FOREIGN KEY (`IDSITUACION`) REFERENCES `situacion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `ID` int(4) NOT NULL AUTO_INCREMENT COMMENT 'número de identificador unico del registro',
  `SITUACION_ESTATUS` int(2) NOT NULL DEFAULT '1' COMMENT 'Define di el usuario esta suspendido o activo',
  `NOMBRE` varchar(50) NOT NULL COMMENT 'Nombre del usuario del sistema',
  `APPATERNO` varchar(30) NOT NULL COMMENT 'apellido paterno del usuario del sistema',
  `APMATERNO` varchar(30) NOT NULL COMMENT 'apellido materno del usuario del sistema',
  `FECNAC` date NOT NULL COMMENT 'Fecha de nacimiento del usuario del sistema',
  `TIPOUSUARIO` enum('usuario','empleado') NOT NULL COMMENT 'Tipo de usuario, si es de tipo "usuario" esta asociado a un centro de costo, en caso de ser de tipo "empleado" esta relacionado a un almacén',
  `FACULTADESPECIAL` tinyint(4) NOT NULL COMMENT 'Este campo ya no se usa',
  `FECHAREGISTRO` date NOT NULL COMMENT 'La fecha en la que se esta dando de alta el registro en la base de datos',
  `LOGIN` varchar(15) NOT NULL COMMENT 'login del usuario del sistema',
  `CONTRASENIA` varchar(45) NOT NULL COMMENT 'contraseña del usuario del sistema',
  `IDALMACEN` int(11) DEFAULT NULL COMMENT 'El identificador del almacén al cual pertenece el usuario de tipo "empleado"',
  `IDCENTROCOSTO` varchar(4) DEFAULT NULL COMMENT 'El identificador del centor de costo al cual pertenece el usuario de tipo "usuario"',
  `CORREO` varchar(45) DEFAULT NULL COMMENT 'Correo del usuario del sistema',
  `TELEFONO` varchar(18) DEFAULT NULL COMMENT 'telefono del usuario del sistema',
  `FACEBOOK` varchar(45) DEFAULT NULL COMMENT 'facebook del usuario del sistema',
  `TWITER` varchar(45) DEFAULT NULL COMMENT 'Twiter del usuario del sistema',
  `IDPUESTO` int(11) DEFAULT NULL COMMENT 'identificador del puesto al que esta asociado el usuario',
  `IDTURNO` int(11) DEFAULT NULL COMMENT 'identificador del turno al cual esta asociado el empleado',
  PRIMARY KEY (`ID`),
  KEY `fk_kusuario_kcentrocosto1_idx` (`IDCENTROCOSTO`) USING BTREE,
  KEY `fk_Usuario_Puesto1_idx` (`IDPUESTO`) USING BTREE,
  KEY `fk_Usuario_Turno1_idx` (`IDTURNO`) USING BTREE,
  CONSTRAINT `FK_usuario_almacen` FOREIGN KEY (`ID`) REFERENCES `almacen` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuariofuncion`
--

DROP TABLE IF EXISTS `usuariofuncion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariofuncion` (
  `IDFUNCION` int(11) NOT NULL,
  `IDUSUARIO` int(4) NOT NULL,
  PRIMARY KEY (`IDFUNCION`,`IDUSUARIO`),
  KEY `fk_kfuncion_has_kusuario_kusuario1_idx` (`IDUSUARIO`),
  KEY `fk_kfuncion_has_kusuario_kfuncion1_idx` (`IDFUNCION`),
  CONSTRAINT `fk_kfuncion_has_kusuario_kfuncion1` FOREIGN KEY (`IDFUNCION`) REFERENCES `funcion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_kfuncion_has_kusuario_kusuario1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuariotieneroles`
--

DROP TABLE IF EXISTS `usuariotieneroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariotieneroles` (
  `Roles_idrol` int(11) NOT NULL COMMENT 'identificador del rol asociado al usuario',
  `Usuario_ID` int(4) NOT NULL COMMENT 'Identificador del usuario asociado al rol',
  PRIMARY KEY (`Roles_idrol`,`Usuario_ID`),
  KEY `fk_Roles_has_Usuario_Usuario1_idx` (`Usuario_ID`),
  KEY `fk_Roles_has_Usuario_Roles1_idx` (`Roles_idrol`),
  CONSTRAINT `fk_Roles_has_Usuario_Roles1` FOREIGN KEY (`Roles_idrol`) REFERENCES `roles` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Roles_has_Usuario_Usuario1` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registra los roles asociados a un usuario';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `valesubrogado`
--

DROP TABLE IF EXISTS `valesubrogado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valesubrogado` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del vale de subrogación, número consecutivo del vale',
  `cantidad` varchar(45) NOT NULL COMMENT 'Cantidad de medicamento que se esta subrogando',
  `ArticuloMedicamento_ID` int(11) NOT NULL COMMENT 'Identificador del medicamento a nivel sal',
  PRIMARY KEY (`id`),
  KEY `fk_ValeSubrogado_ArticuloMedicamento2_idx` (`ArticuloMedicamento_ID`),
  CONSTRAINT `fk_ValeSubrogado_ArticuloMedicamento2` FOREIGN KEY (`ArticuloMedicamento_ID`) REFERENCES `articulomedicamento` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registra el medicamento a nivel sal de lo que se esta sub /* comment truncated */ /*rogando*/';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-23 18:41:22
