-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: funerariadb
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `bk_account`
--

DROP TABLE IF EXISTS `bk_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_account` (
  `account_id` int(11) NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `balance` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_account`
--

LOCK TABLES `bk_account` WRITE;
/*!40000 ALTER TABLE `bk_account` DISABLE KEYS */;
INSERT INTO `bk_account` VALUES (1,'bank','Bac Dolares','909090','100000'),(2,'cash','Caja Chica','000001','0');
/*!40000 ALTER TABLE `bk_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_apartados`
--

DROP TABLE IF EXISTS `bk_apartados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_apartados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) DEFAULT NULL,
  `cremacion` int(11) DEFAULT NULL,
  `autopsia` int(11) DEFAULT NULL,
  `tecnico` varchar(45) DEFAULT NULL,
  `costo_total` double DEFAULT NULL,
  `urna` varchar(45) DEFAULT NULL,
  `preservacion` varchar(45) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `saldo_anterior` double DEFAULT NULL,
  `abono` double DEFAULT NULL,
  `saldo_actual` double DEFAULT NULL,
  `observaciones` blob,
  `id_apartados_account` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_apartados`
--

LOCK TABLES `bk_apartados` WRITE;
/*!40000 ALTER TABLE `bk_apartados` DISABLE KEYS */;
INSERT INTO `bk_apartados` VALUES (1,1,1,NULL,'',2000000,'',NULL,0,NULL,100000,NULL,'',NULL,'2018-01-24 01:39:14',2,0,NULL);
/*!40000 ALTER TABLE `bk_apartados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_apartados_account`
--

DROP TABLE IF EXISTS `bk_apartados_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_apartados_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_number` longtext,
  `contact_id` int(11) DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `monto_abonado` double DEFAULT '0',
  `saldo` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(2) DEFAULT NULL,
  `fecha_aplicacion` datetime DEFAULT NULL,
  `mes_cobro` varchar(45) DEFAULT NULL,
  `saldo_anterior` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_apartados_account`
--

LOCK TABLES `bk_apartados_account` WRITE;
/*!40000 ALTER TABLE `bk_apartados_account` DISABLE KEYS */;
INSERT INTO `bk_apartados_account` VALUES (1,'1',1,2000000,250000,1750000,2,'2018-01-24 01:39:14','A',NULL,NULL,1750000);
/*!40000 ALTER TABLE `bk_apartados_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_coffin`
--

DROP TABLE IF EXISTS `bk_coffin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_coffin` (
  `coffin_id` int(11) NOT NULL DEFAULT '0',
  `name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_coffin`
--

LOCK TABLES `bk_coffin` WRITE;
/*!40000 ALTER TABLE `bk_coffin` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_coffin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_contact`
--

DROP TABLE IF EXISTS `bk_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext COLLATE utf8_unicode_ci,
  `first_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_name2` longtext COLLATE utf8_unicode_ci,
  `company_name` longtext COLLATE utf8_unicode_ci,
  `email` longtext COLLATE utf8_unicode_ci,
  `phone` longtext COLLATE utf8_unicode_ci,
  `phone2` longtext COLLATE utf8_unicode_ci,
  `phone3` longtext COLLATE utf8_unicode_ci,
  `mobile` longtext COLLATE utf8_unicode_ci,
  `website` longtext COLLATE utf8_unicode_ci,
  `skype_id` longtext COLLATE utf8_unicode_ci,
  `address` longtext COLLATE utf8_unicode_ci,
  `country` longtext COLLATE utf8_unicode_ci,
  `city` longtext COLLATE utf8_unicode_ci,
  `state` longtext COLLATE utf8_unicode_ci,
  `zip_code` longtext COLLATE utf8_unicode_ci,
  `bank_account` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `id_card` longtext COLLATE utf8_unicode_ci,
  `route` longtext COLLATE utf8_unicode_ci,
  `localization1` longtext COLLATE utf8_unicode_ci,
  `localization2` longtext COLLATE utf8_unicode_ci,
  `localization3` longtext COLLATE utf8_unicode_ci,
  `amount` longtext COLLATE utf8_unicode_ci,
  `balance` longtext COLLATE utf8_unicode_ci,
  `fee` longtext COLLATE utf8_unicode_ci,
  `month_payment` longtext COLLATE utf8_unicode_ci,
  `year_payment` longtext COLLATE utf8_unicode_ci,
  `incorporation_date` date DEFAULT NULL,
  `advance_payment` longtext COLLATE utf8_unicode_ci,
  `category` int(11) DEFAULT NULL,
  `province` longtext COLLATE utf8_unicode_ci,
  `canton` longtext COLLATE utf8_unicode_ci,
  `district` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`contact_id`),
  UNIQUE KEY `contact_id_UNIQUE` (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_contact`
--

LOCK TABLES `bk_contact` WRITE;
/*!40000 ALTER TABLE `bk_contact` DISABLE KEYS */;
INSERT INTO `bk_contact` VALUES (1,NULL,'alexander','morgan','rodriguez',NULL,'amorgan115@gmail.com','71765072','22278365','88888888',NULL,NULL,NULL,'Bello Horizonte, de la antigua Giacomin 100 metros norte.',NULL,NULL,NULL,NULL,NULL,7,'113710497',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'San José','Escazú','San Rafael'),(2,NULL,'Pedro','Perez','Pesado',NULL,'pedro@perez.com','89995566','87774411','66553322',NULL,NULL,NULL,'Blanco de servantes derecha e izquierda',NULL,NULL,NULL,NULL,NULL,NULL,'113710498',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,'Cartago','Alvarado','Cervantes');
/*!40000 ALTER TABLE `bk_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_contratos`
--

DROP TABLE IF EXISTS `bk_contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_contratos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `fecha_inclusion` timestamp NULL DEFAULT NULL,
  `ruta` varchar(45) DEFAULT NULL,
  `vendedor` varchar(45) DEFAULT NULL,
  `forma_pago` varchar(45) DEFAULT NULL,
  `no_contrato` varchar(45) DEFAULT NULL,
  `mes_cobro` varchar(45) DEFAULT NULL,
  `saldo_anterior` varchar(45) DEFAULT NULL,
  `saldo_actual` varchar(45) DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `monto_cuota` double DEFAULT NULL,
  `prima` double DEFAULT NULL,
  `loc_1` varchar(45) DEFAULT NULL,
  `loc_2` varchar(45) DEFAULT NULL,
  `loc_3` varchar(45) DEFAULT NULL,
  `no_recibo` varchar(45) DEFAULT NULL,
  `observaciones` blob,
  `bk_contratos_acc_id` int(11) DEFAULT NULL,
  `anno_cobro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_contratos`
--

LOCK TABLES `bk_contratos` WRITE;
/*!40000 ALTER TABLE `bk_contratos` DISABLE KEYS */;
INSERT INTO `bk_contratos` VALUES (1,1,2,'2018-02-06 20:39:00','','1','','0','Enero','','',1500000,25000,0,'aa','bb','cc','0','',NULL,NULL);
/*!40000 ALTER TABLE `bk_contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_contratos_account`
--

DROP TABLE IF EXISTS `bk_contratos_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_contratos_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_number` longtext,
  `contact_id` int(11) DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `monto_abonado` double DEFAULT '0',
  `saldo` double DEFAULT NULL,
  `monto_cuota` double DEFAULT NULL,
  `tiempo_contrato` int(11) DEFAULT NULL,
  `cuotas_pagadas` int(11) DEFAULT '0',
  `cuotas_pendientes` int(11) DEFAULT NULL,
  `interes` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(2) DEFAULT NULL,
  `fecha_aplicacion` datetime DEFAULT NULL,
  `prima` double DEFAULT NULL,
  `mes_cobro` varchar(45) DEFAULT NULL,
  `saldo_anterior` double DEFAULT NULL,
  `anno_cobro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_contratos_account`
--

LOCK TABLES `bk_contratos_account` WRITE;
/*!40000 ALTER TABLE `bk_contratos_account` DISABLE KEYS */;
INSERT INTO `bk_contratos_account` VALUES (1,'1',1,1500000,0,1500000,25000,NULL,0,NULL,NULL,2,'2018-02-06 20:39:37','A',NULL,0,'Enero',1500000,NULL);
/*!40000 ALTER TABLE `bk_contratos_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_cuentas`
--

DROP TABLE IF EXISTS `bk_cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_cuentas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `currentBalance` double DEFAULT '0',
  `interest` double DEFAULT NULL,
  `late_charge` double DEFAULT NULL,
  `typoCuenta` char(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_cuentas`
--

LOCK TABLES `bk_cuentas` WRITE;
/*!40000 ALTER TABLE `bk_cuentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_currency`
--

DROP TABLE IF EXISTS `bk_currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_currency` (
  `currency_id` int(11) NOT NULL,
  `currency_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `currency_symbol` longtext COLLATE utf8_unicode_ci NOT NULL,
  `currency_name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_currency`
--

LOCK TABLES `bk_currency` WRITE;
/*!40000 ALTER TABLE `bk_currency` DISABLE KEYS */;
INSERT INTO `bk_currency` VALUES (1,'USD','$','US dollar'),(2,'GBP','£','Pound'),(3,'EUR','€','Euro'),(4,'AUD','$','Australian Dollar'),(5,'CAD','$','Canadian Dollar'),(6,'JPY','¥','Japanese Yen'),(7,'NZD','$','N.Z. Dollar'),(8,'CHF','Fr','Swiss Franc'),(9,'HKD','$','Hong Kong Dollar'),(10,'SGD','$','Singapore Dollar'),(11,'SEK','kr','Swedish Krona'),(12,'DKK','kr','Danish Krone'),(13,'PLN','zł','Polish Zloty'),(14,'HUF','Ft','Hungarian Forint'),(15,'CZK','Kč','Czech Koruna'),(16,'MXN','$','Mexican Peso'),(17,'CZK','Kč','Czech Koruna'),(18,'MYR','RM','Malaysian Ringgit');
/*!40000 ALTER TABLE `bk_currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_email_template`
--

DROP TABLE IF EXISTS `bk_email_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_email_template` (
  `email_template_id` int(11) NOT NULL,
  `task` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_email_template`
--

LOCK TABLES `bk_email_template` WRITE;
/*!40000 ALTER TABLE `bk_email_template` DISABLE KEYS */;
INSERT INTO `bk_email_template` VALUES (1,'new_admin_account_opening','Admin account creation','<span>\r\n<div>Hi [ADMIN_NAME],</div>\r\n</span>Your admin account is created !\r\nPlease login to your admin&nbsp;<span>account panel here :&nbsp;<br></span>[SYSTEM_URL]<br>Login credential :<br>email : [ADMIN_EMAIL]<br>password : [ADMIN_PASSWORD]'),(2,'password_reset_confirmation','Password reset notification','Hi [NAME],<br>Your password is reset. New password : [NEW_PASSWORD]<br>Login here with your new password :<br>[SYSTEM_URL]<br><br>You can change your password after logging in to your account.');
/*!40000 ALTER TABLE `bk_email_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_expense`
--

DROP TABLE IF EXISTS `bk_expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_expense` (
  `expense_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `income_expense_category_id` int(11) NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_expense`
--

LOCK TABLES `bk_expense` WRITE;
/*!40000 ALTER TABLE `bk_expense` DISABLE KEYS */;
INSERT INTO `bk_expense` VALUES (1,'Compra Computadoras','Compra de computadoras',2,'2000',1,'0'),(2,'Compra de cafe','Compre 10kg de cafe',4,'50000',2,'1455688800');
/*!40000 ALTER TABLE `bk_expense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_funecredito_account`
--

DROP TABLE IF EXISTS `bk_funecredito_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_funecredito_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funeral_id` int(11) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `monto_principal` double DEFAULT NULL,
  `monto_abonado` double DEFAULT '0',
  `saldo` double DEFAULT NULL,
  `interes_mensual` double DEFAULT NULL,
  `plazo_inicial` double DEFAULT NULL,
  `plazo_restante` double DEFAULT NULL,
  `couta_sin_interes` double DEFAULT NULL,
  `couta_con_interes` double DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `fecha_aplicacion` datetime DEFAULT NULL,
  `mes_cobro` varchar(45) DEFAULT NULL,
  `saldo_anterior` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_funecredito_account`
--

LOCK TABLES `bk_funecredito_account` WRITE;
/*!40000 ALTER TABLE `bk_funecredito_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_funecredito_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_funeral`
--

DROP TABLE IF EXISTS `bk_funeral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_funeral` (
  `id_funeral` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `fallecido_ced` varchar(45) DEFAULT NULL,
  `fallecido_nombre` varchar(45) DEFAULT NULL,
  `fallecido_apellido` varchar(45) DEFAULT NULL,
  `fallecido_apellido2` varchar(45) DEFAULT NULL,
  `fallecido_edad` int(11) DEFAULT NULL,
  `acta_defuncion` varchar(45) DEFAULT NULL,
  `parentesco` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cofre` varchar(45) DEFAULT NULL,
  `factura` varchar(45) DEFAULT NULL,
  `serv_traslado` int(11) DEFAULT NULL,
  `serv_esquelas` int(11) DEFAULT NULL,
  `serv_flores` int(11) DEFAULT NULL,
  `serv_tributos` int(11) DEFAULT NULL,
  `serv_patologia` int(11) DEFAULT NULL,
  `serv_patologia_tecnico` varchar(45) DEFAULT NULL,
  `serv_patologia_costo` int(11) DEFAULT NULL,
  `serv_cremacion` int(11) DEFAULT NULL,
  `serv_autopsia` int(11) DEFAULT NULL,
  `serv_autopsia_tecnico` varchar(45) DEFAULT NULL,
  `serv_autopsia_costo` varchar(45) DEFAULT NULL,
  `serv_urna` varchar(45) DEFAULT NULL,
  `tras_morgue` varchar(45) DEFAULT NULL,
  `tras_direccion` varchar(255) DEFAULT NULL,
  `tras_velacion` varchar(45) DEFAULT NULL,
  `tras_velacion_direccion` varchar(45) DEFAULT NULL,
  `tras_hora` varchar(45) DEFAULT NULL,
  `tras_hora_det` varchar(45) DEFAULT NULL,
  `tras_bodega_cofre` varchar(45) DEFAULT NULL,
  `tras_arreglos` int(11) DEFAULT NULL,
  `tras_pedestal` int(11) DEFAULT NULL,
  `tras_candelero` int(11) DEFAULT NULL,
  `tras_alfombra_int` int(11) DEFAULT NULL,
  `tras_carretilla` varchar(45) DEFAULT NULL,
  `tras_atril` int(11) DEFAULT NULL,
  `tras_cortinero` int(11) DEFAULT NULL,
  `tras_carroza` varchar(45) DEFAULT NULL,
  `tras_chofer` varchar(45) DEFAULT NULL,
  `tras_observaciones` varchar(255) DEFAULT NULL,
  `info_fecha` varchar(45) DEFAULT NULL,
  `info_hora` varchar(45) DEFAULT NULL,
  `info_hora_det` varchar(45) DEFAULT NULL,
  `info_iglesia` varchar(45) DEFAULT NULL,
  `info_cementerio` varchar(45) DEFAULT NULL,
  `info_carroza` varchar(45) DEFAULT NULL,
  `info_chofer` varchar(45) DEFAULT NULL,
  `info_decora` varchar(45) DEFAULT NULL,
  `info_decora_chofer` varchar(45) DEFAULT NULL,
  `info_observaciones` varchar(45) DEFAULT NULL,
  `funeral_tipo` varchar(45) DEFAULT NULL,
  `monto_total` int(11) DEFAULT NULL,
  `saldo_total` int(11) DEFAULT NULL COMMENT '		',
  `prima` int(11) DEFAULT NULL,
  `contrato_1_numero` varchar(45) DEFAULT NULL,
  `contrato_1_valor` varchar(45) DEFAULT NULL,
  `contrato_2_numero` varchar(45) DEFAULT NULL,
  `contrato_2_valor` varchar(45) DEFAULT NULL,
  `contrato_3_numero` varchar(45) DEFAULT NULL,
  `contrato_3_valor` varchar(45) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_funeral`),
  UNIQUE KEY `id_funeral_UNIQUE` (`id_funeral`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_funeral`
--

LOCK TABLES `bk_funeral` WRITE;
/*!40000 ALTER TABLE `bk_funeral` DISABLE KEYS */;
INSERT INTO `bk_funeral` VALUES (1,1,'1111111','Benito','floro','flores',50,'123456','Tío','2018-01-22','Europeo','321321',1,3,8,0,1,NULL,100000,1,NULL,'autopsia tecnico','10000','Ecológica','Casa de habitación','casa de habitacion','escazu',NULL,'10','am','Shalom',10,0,2,1,'2',1,NULL,'Toyota','charlie chofer','nohay','2018-01-22','4','am','San Luis','Tibás','Toyota','charlie chof servicio      ','Buick','chofer decora','sin obs','funeral',100000,500000,500000,'111','305000','1234','95000','333','100000',2,'2018-01-22 19:24:09');
/*!40000 ALTER TABLE `bk_funeral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_funeral_account`
--

DROP TABLE IF EXISTS `bk_funeral_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_funeral_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funeral_id` int(11) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `monto_abonado` double DEFAULT '0',
  `saldo` double DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_funeral_account`
--

LOCK TABLES `bk_funeral_account` WRITE;
/*!40000 ALTER TABLE `bk_funeral_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_funeral_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_income`
--

DROP TABLE IF EXISTS `bk_income`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_income` (
  `income_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `income_expense_category_id` int(11) NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_income`
--

LOCK TABLES `bk_income` WRITE;
/*!40000 ALTER TABLE `bk_income` DISABLE KEYS */;
INSERT INTO `bk_income` VALUES (1,'plata ','mas plata',1,'100',1,'0'),(2,'Dinero','ingreso dinero',3,'3500',1,'1455688800'),(3,'venta carros','Vendimos un CRV',1,'10000',1,'1455688800');
/*!40000 ALTER TABLE `bk_income` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_income_expense_category`
--

DROP TABLE IF EXISTS `bk_income_expense_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_income_expense_category` (
  `income_expense_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_income_expense_category`
--

LOCK TABLES `bk_income_expense_category` WRITE;
/*!40000 ALTER TABLE `bk_income_expense_category` DISABLE KEYS */;
INSERT INTO `bk_income_expense_category` VALUES (1,'Caja chica'),(2,'Compra de Equipo'),(3,'Desarrollo de ERP'),(4,'Insumos');
/*!40000 ALTER TABLE `bk_income_expense_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_language`
--

DROP TABLE IF EXISTS `bk_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `en` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bn` longtext COLLATE utf8_unicode_ci NOT NULL,
  `es` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ar` longtext COLLATE utf8_unicode_ci NOT NULL,
  `de` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fr` longtext COLLATE utf8_unicode_ci NOT NULL,
  `it` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ru` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tr` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_language`
--

LOCK TABLES `bk_language` WRITE;
/*!40000 ALTER TABLE `bk_language` DISABLE KEYS */;
INSERT INTO `bk_language` VALUES (1,'login','Login','লগইন','Iniciar sesión','تسجيل الدخول','Anmeldung','S\'identifier','Accesso','Авторизоваться','Oturum aç'),(2,'email','Email','ইমেইল','Email','البريد الإلكتروني','Email','Email','E-mail','Эл. адрес','E-posta'),(3,'password','Password','পাসওয়ার্ড','Clave','الرمز السري','Passwort','Mot de passe','Parola d\'ordine','пароль','Parola'),(4,'forgot_your_password','Forgot Your Password','আপনি কি পাসওয়ার্ড ভুলে গেছেন','Olvidaste tu contraseña','نسيت رقمك السري','Haben Sie Ihr Passwort vergessen','Mot de passe oublié','Hai dimenticato la password','Забыли пароль','Şifrenizi mi unuttunuz'),(5,'reset_password','Reset Password','পাসওয়ার্ড রিসেট করুন','Restablecer la contraseña','اعادة تعيين كلمة السر','Passwort zurücksetzen','Nouveau mot de passe','Resettare la password','Сброс пароля','Şifre sıfırlamak'),(6,'return_to_login_page','Return To Login Page','পাতা লগইন আসতে','Volver a inicio página','العودة إلى صفحة تسجيل الدخول','Zurück zur Anmeldeseite Seite','Return to Login page','Ritorna al login pagina','Вернуться на страницу входа','Sayfayı Girişi Dönüş'),(7,'admin_dashboard','Admin Dashboard','অ্যাডমিন ড্যাশবোর্ড','Dashboard administración','المشرف لوحة','Admin-Dashboard','Administrateur Dashboard','Admin Dashboard','Админ Панель','Yönetici Paneli'),(8,'dashboard','Dashboard','ড্যাশবোর্ড','Tablero de instrumentos','لوحة أجهزة القياس','Armaturenbrett','Tableau de bord','Cruscotto','Панель приборов','Dashboard'),(9,'contacts','Contacts','যোগাযোগ','Contactos','جهات الاتصال','Impressum','Contacts','Contatti','Контакты','İletişim'),(10,'customers','Customers','গ্রাহকরা','Clientes','الزبائن','Kunden,','Les clients','Clienti','Клиенты','Müşteriler'),(11,'suppliers','Suppliers','সরবরাহকারী','Proveedores','الموردين','Lieferanten','Fournisseurs','Fornitori','Поставщики','Tedarikçiler'),(12,'financial_accounts','Financial Accounts','আর্থিক হিসাব','Módulo Financiero','الحسابات المالية','Finanzierungsrechnung','Comptes financiers','Conti finanziari','Финансовая отчетность','Finansal Hesaplar'),(13,'create_new_account','Create New Account','নতুন অ্যাকাউন্ট তৈরি করুন','Crear una nueva cuenta','إنشاء حساب جديد','Neuen Account erstellen','Créer un nouveau compte','Crea un nuovo account','Создать новый аккаунт','Yeni hesap oluştur'),(14,'account_list','Account List','অ্যাকাউন্টের তালিকা','Lista de cuentas','قائمة الحساب','Kontoliste','Liste des comptes','Account List','Список аккаунт','Hesap Listesi'),(15,'inventory','Inventory','জায়','Inventario','المخزون','Inventar','Inventaire','Inventario','Инвентаризация','Envanter'),(16,'products','Products','পণ্য','Productos','المنتجات','Produkte','Produits','Prodotti','Продукты','Ürünler'),(17,'services','Services','সেবা','Servicios','الخدمات','Dienstleistungen','Services','Servizi','Сервисы','Hizmetler'),(18,'product_/_service_categories','Product / Service Categories','পণ্য / সেবা বিভাগ','Producto / Servicio Categorías','المنتج / الخدمة الفئات','Produkte / Service Kategorien','Produit / Service de Catégories','Prodotto / Servizio Categorie','Товар / услуга Категории','Ürün / Hizmet Kategorileri'),(19,'purchases','Purchases','কেনাকাটা','Las compras','مشتريات','Einkäufe','Achats','Acquisti','Покупки','Alımlar'),(20,'new_purchase','New Purchase','নতুন ক্রয়','Nueva compra','شراء الجديد','Neuanschaffung','Nouvel achat','Nuovo Acquisto','Новый Покупка','Yeni Alım'),(21,'purchase_history','Purchase History','ক্রয় ইতিহাস','Historial de compras','تاريخ شراء','Kaufhistorie','Historique d\'achat','Cronologia degli acquisti','История покупки','Satın alma geçmişi'),(22,'sales','Sales','সেলস','Ventas','مبيعات','Der Umsatz','Ventes','I saldi','Продажи','Satış'),(23,'new_sale','New Sale','নতুন বিক্রয়','Nueva venta','بيع جديدة','Neuheiten Aktionen','Nouveautés','Nuova vendita','Новое Распродажа','Yeni Satış'),(24,'sales_history','Sales History','সেলস ইতিহাস','Historia Ventas','مبيعات التاريخ','Vertrieb Geschichte','Histoire des ventes','Storia Vendite','История продаж','Satış Tarihi'),(25,'incomes_/_expenses','Incomes / Expenses','আয়ের / খরচ','Ingresos / Gastos','الدخل / المصروفات','Einkommen / Ausgaben','Revenus / dépenses','Redditi / Spese','Доходы / расходы','Gelirleri / Giderleri'),(26,'incomes','Incomes','আয়','Ingresos','دخل','Einkommen','Revenus','Redditi','Доходов','Gelirler'),(27,'expenses','Expenses','খরচ','Gastos','مصاريف','Kosten','Dépenses','Spese','Затраты','Giderler'),(28,'income_/_expense_categories','Income / Expense Categories','আয় / ব্যয় বিভাগ','Ingresos / gastos Categorías','الدخل / المصاريف الفئات','Erträge / Aufwendungen Kategorien','Revenus / Dépenses Catégories','Proventi / oneri categorie','Доходы / расходы Категории','Gelir / Gider Kategorileri'),(29,'reporting','Reporting','রিপোর্টিং','Informes','التقارير','Berichterstattung','Compte-rendu','Segnalazione','Составление отчетов','Raporlama'),(30,'account_statements','Account Statements','অ্যাকাউন্ট বিবৃতি','Estados de Cuenta','كشوف الحساب','Kontoauszüge','Relevés de compte','Estratti conto','Выписки','Hesap Raporları'),(31,'income_report','Income Report','রিপোর্ট আয়','Informe de Ingresos','تقرير الدخل','Einkommensbericht','Rapport sur le revenu','Reddito Relazione','Доходы Сообщить','Gelir Raporu'),(32,'expense_report','Expense Report','ব্যয় রিপোর্ট','Reporte de Gastos','تقرير حساب','Spesenabrechnung','Rapport de dépenses','Expense Report','Отчет о затратах','Gider raporu'),(33,'income_expense_comparison','Income Expense Comparison','আয় ব্যয় তুলনা','Comparación de Gastos Ingresos','نفقات الدخل مقارنة','Income Kostenvergleich','Comparaison des Charges Produits','Proventi Oneri Confronto','Сравнение на прибыль','Gelir Gider Karşılaştırma'),(34,'notes','Notes','নোট','Notas','ملاحظات','Hinweise','Remarques','Gli appunti','Заметки','Notlar'),(35,'admins','Admins','প্রশাসকদের','Administradores','مدراء','Admins','Admins','Amministratori','Администраторы','Yöneticiler'),(36,'settings','Settings','সেটিংস','Ajustes','إعدادات','Einstellungen','Paramètres','Impostazioni','Настройки','Ayarlar'),(37,'system_settings','System Settings','পদ্ধতি নির্ধারণ','Ajustes del sistema','اعدادات النظام','Systemeinstellungen','Les paramètres du système','Impostazioni di sistema','Настройки системы','Sistem ayarları'),(38,'email_settings','Email Settings','ইমেইল সেটিংস','Ajustes del correo electrónico','إعدادات البريد الإلكتروني','E-Mail-Einstellungen','Paramètres de messagerie','Impostazioni e-mail','Настройки электронной почты','E-posta Ayarları'),(39,'language_settings','Language Settings','ভাষা ব্যাবস্থা','Ajustes de idioma','اعدادات اللغة','Spracheinstellungen','Paramètres de langue','Impostazioni della lingua','Языковые настройки','Dil ayarları'),(40,'vat_settings','Vat Settings','ভ্যাট সেটিংস','Ajustes IVA','إعدادات ضريبة القيمة المضافة','MwSt-Einstellungen','Paramètres de cuve','Impostazioni Iva','Настройки Vat','Vat Ayarları'),(41,'account','Account','হিসাব','Cuenta','حساب','Konto','Compte','Conto','Счет','Hesap'),(42,'Bookkeeping','Bookkeeping','হিসাবরক্ষণ','Teneduría de libros','مسك دفاتر','Buchhaltung','Comptabilité','Contabilità','Бухгалтерия','Defter tutma'),(43,'log_out','Log Out','ত্যাগ করুন','Cerrar sesión','تسجيل خروج','Abmelden','Se déconnecter','Disconnettersi','Выйти','Çıkış Yap'),(44,'sale_code','Sale Code','বিক্রয় কোড','Venta Código','بيع مدونة','Sale-Code','Vente code','Vendita Codice','Продажа Код','Satış Kodu'),(45,'purchase_code','Purchase Code','ক্রয় কোড','Código de Compra','كود شراء','Kauf-Code','Code d\'Achat','Codice di acquisto','Покупка код','Satınalma Kodu'),(46,'income','Income','আয়','Ingresos','دخل','Einkommen','Revenu','Reddito','Доход','Gelir'),(47,'last_30_days','Last 30 Days','সর্বশেষ 30 দিন','Últimos 30 Días','اخر 30 يوم','Letzte 30 Tage','30 derniers jours','Ultimi 30 giorni','Последние 30 дней','Son 30 Gün'),(48,'expense','Expense','ব্যয়','Gastos','مصروف','Kostenaufwand','Frais','Spese','Расходы','Gider'),(49,'income_expense_calendar','Income Expense Calendar','আয় ব্যয় ক্যালেন্ডার','Gastos Ingresos Calendario','نفقات دخل التقويم','Income Expense Calendar','Charges Produits Calendrier','Proventi Oneri Calendario','Прибыль Календарь','Gelir Gider Takvim'),(50,'sale','Sale','বিক্রয়','Venta','تخفيض السعر','Verkauf','vendre','Vendita','Продажа','Satış'),(51,'purchase','Purchase','ক্রয়','Compra','شراء','Kauf','Achat','Acquisto','Покупка','Satınalma'),(52,'manage_customers','Manage Customers','গ্রাহকদের পরিচালনা','Administrar Clientes','إدارة العملاء','Kunden verwalten','Gérer clients','Gestire i clienti','Управление клиентами','Müşteriler yönetin'),(53,'add_new_contact','Add New Contact','নতুন যোগ করুন','Añadir nuevo contacto','إضافة جهة اتصال جديدة','Neuen Kontakt hinzufügen','Ajouter un nouveau contact','Aggiungi nuovo contatto','Добавить новый контакт','Yeni Kişi Ekle'),(54,'name','Name','নাম','Nombre','اسم','Name','prénom','Nome','имя','Isim'),(55,'company_name','Company Name','কোমপানির নাম','nombre de empresa','اسم الشركة','Name der Firma','Nom de la compagnie','Nome della ditta','название компании','Şirket Adı'),(56,'phone','Phone','ফোন','Teléfono','الهاتف','Telefon','Téléphone','Telefono','Телефон','Telefon'),(57,'type','Type','শ্রেণী','Escribe','اكتب','Art','Type','Tipo','Тип','Tip'),(58,'options','Options','বিকল্প','Opciones','خيارات','Optionen','Options','Opzioni','Опции','Seçenekler'),(59,'customer','Customer','ক্রেতা','Cliente','زبون','Kunde','Client','Cliente','Клиент','Müşteri'),(60,'actions','Actions','পদক্ষেপ','Comportamiento','تطبيقات','Aktionen','actes','Azioni','Меры','Eylemler'),(61,'edit','Edit','সম্পাদন করা','Editar','تحرير','Bearbeiten','modifier','Modifica','редактировать','Düzenleme'),(62,'view_details','View Details','বিস্তারিত দেখা','Ver detalles','عرض تفاصيل','Details anzeigen','Voir les détails','Guarda i dettagli','Посмотреть детали','Ayrıntıları görüntüle'),(63,'delete','Delete','মুছে','Borrar','حذف','Löschen','Effacer','Cancellare','Удалить','Silmek'),(64,'manage_suppliers','Manage Suppliers','সরবরাহকারী পরিচালনা','Manejo de Proveedores','إدارة الموردين','Lieferanten verwalten','Gérer Fournisseurs','Gestire Fornitori','Управление Поставщики','Tedarikçi yönetin'),(65,'supplier','Supplier','সরবরাহকারী','Proveedor','المورد','Lieferant','Fournisseur','Fornitore','Поставщик','Tedarikçi'),(66,'add_contact','Add Contact','পরিচিতি যোগ করুন','Agregar contacto','إضافة جهة اتصال','Kontakt hinzufügen','Ajouter contact','Aggiungi contatto','Добавить контакт','Kişi ekle'),(67,'contact_type','Contact Type','যোগাযোগ ধরন','Tipo de Contacto','نوع الاتصال','Kontakttyp','type de contact','Tipo di contatto','Тип контакта','İletişim Tipi'),(68,'first_name','First Name','প্রথম নাম','Nombre','الاسم الأول','Vorname','Prénom','Nome','Имя','İsim'),(69,'last_name','Last Name','শেষ নাম','Apellido','الاسم الاخير','Familienname, Nachname','Nom de famille','Cognome','Фамилия','Soyadı'),(70,'mobile','Mobile','মোবাইল','Móvil','التليفون المحمول','Mobile','Mobile','Mobile','Мобильный','Seyyar'),(71,'website','Website','ওয়েবসাইট','Sitio web','موقع الكتروني','Webseite','Site Internet','Sito web','Веб-сайт','Web Sitesi'),(72,'skype_id','Skype Id','স্কাইপ আইডি','Identificación del skype','هوية السكايب','Skype Kennzeichnung','Skype','Identificativo di Skype','Skype ID','Skype kullanıcı adı'),(73,'address','Address','ঠিকানা','Dirección','العنوان','Adresse','Adresse','Indirizzo','Адрес','Adres'),(74,'country','Country','দেশ','País','بلد','Land','Pays','Nazione','Страна','Ülke'),(75,'city','City','শহর','Ciudad','المدينة','Stadt','Ville','Città','город','Şehir'),(76,'state','State','রাষ্ট্র','Estado','حالة','Bundesland','Etat','Stato','состояние','Eyalet'),(77,'zip_code','Zip Code','ZIP কোড','Código postal','الرمز البريدي','PLZ','Code postal','Cap','Почтовый Индекс','Posta kodu'),(78,'bank_account','Bank Account','ব্যাংক হিসাব','Cuenta bancaria','حساب البنك','Bank Konto','Compte bancaire','Conto bancario','Банковский счет','Banka hesabı'),(79,'submit','Submit','জমা দিন','Enviar','عرض','einreichen','Proposer','Presentare','Отправить','Gönder'),(80,'edit_contact','Edit Contact','সম্পাদনা করুন','Editar contacto','تحرير الاتصال','Kontakt bearbeiten','Modifier le contact','Modifica il contatto','Изменить контакт','Düzenleme İletişim'),(81,'update','Update','আপডেট','Actualizar','تحديث','Aktualisieren','Mettre à jour','Aggiornare','Обновить','Güncelleştirme'),(82,'customer_details','Customer Details','কাস্টমার বিস্তারিত','Detalles del cliente','تفاصيل العميل','Kundendetails','Détails du client','Dettagli cliente','Реквизиты клиента','Müşteri detayları'),(83,'home','Home','বাড়ি','Casa','الصفحة الرئيسية','Zuhause','Accueil','Casa','Главная','Ev'),(84,'details','Details','বিবরণ','Detalles','تفاصيل','Einzelheiten','Détails','Dettagli','Детали','Detaylar'),(85,'summary','Summary','সংক্ষিপ্ত','Resumen','ملخص','Zusammenfassung','Récapitulatif','Sommario','Резюме','Özet'),(86,'code','Code','কোড','Código','رمز','Code','Code','Codice','Код','Kod'),(87,'creation_date','Creation Date','তৈরির তারিখ','Fecha de creación','تاريخ الإنشاء','Erstellungsdatum','Date de création','Data di creazione','Дата создания','Oluşturma tarihi'),(88,'amount','Amount','পরিমাণ','Cantidad','كمية','Menge','Montant','Importo','Количество','Miktar'),(89,'view_sale_invoice','View Sale Invoice','দেখুন বিক্রয় চালান','Ver Venta Factura','مشاهدة فاتورة بيع','Ansicht Verkauf Rechnung','Voir Vente facture','Vendita fattura','Посмотреть продажа Счет','Görünüm Satış Faturası'),(90,'to','To','থেকে','A','إلى','Zu','À','A','Для','Karşı'),(91,'subject','Subject','বিষয়','Sujeto','الموضوع','Gegenstand','Assujettir','Soggetto','Предмет','Tabi'),(92,'message','Message','বার্তা','Mensaje','الرسالة','Nachricht','Message','Messaggio','Сообщение','Mesaj'),(93,'send_email','Send Email','বার্তা পাঠাও','Enviar correo electrónico','إرسال البريد الإلكتروني','E-Mail senden','Envoyer un email','Invia una email','Отправить на e-mail','Eposta yolla'),(94,'supplier_details','Supplier Details','সরবরাহকারী','Detalles del proveedor','تفاصيل المورد','Supplier Details','Fournisseur Détails','Fornitore Dettagli','Поставщик Подробности','Tedarikçi Detayları'),(95,'view_purchase_invoice','View Purchase Invoice','দেখুন ক্রয় চালান','Ver Compra Factura','عرض شراء فاتورة','Ankaufsrechnung','Voir la facture d\'achat','Visualizza Acquisto Fattura','Посмотреть накладная','Görünüm Satınalma Faturası'),(96,'add_account','Add Account','হিসাব যোগ করা','Añadir cuenta','إضافة حساب','Konto hinzufügen','Ajouter un compte','Aggiungi account','Добавить аккаунт','Hesap eklemek'),(97,'account_type','Account Type','হিসাবের ধরণ','Tipo de cuenta','نوع الحساب','Account','Type de compte','Tipo di account','тип аккаунта','hesap tipi'),(98,'bank','Bank','ব্যাংক','Banco','بنك','Bank','Banque','Banca','Банка','Banka'),(99,'cash','Cash','নগদ','Efectivo','السيولة النقدية','Kasse','Argent comptant','Contanti','Денежные средства','Nakit'),(100,'other','Other','অন্যান্য','Otro','الآخر','Andere','Autre','Altro','Другие','Diğer'),(101,'account_title','Account Title','অ্যাকাউন্ট শিরোনাম','Titulo de cuenta','عنوان حساب','Konto Titel','Compte Titre','Conto Titolo','Счет Название','Hesap Adı'),(102,'account_number','Account Number','হিসাব নাম্বার','Número de cuenta','رقم الحساب','Accountnummer','Numéro de compte','Numero di conto','Номер аккаунта','Hesap numarası'),(103,'starting_balance','Starting Balance','শুরু ভারসাম্য','Balance inicial','الرصيد الافتتاحي','Startguthaben','Solde de départ','Saldo iniziale','Начиная Баланс','Başlangıç ​​Bakiyesi'),(104,'manage_accounts','Manage Accounts','অ্যাকাউন্ট পরিচালনা','Administrar cuentas','إدارة الحسابات','Konten verwalten','Gérer les comptes','Gestisci account','Управление учетными записями','Hesapları Yönet'),(105,'current_balance','Current Balance','বর্তমান জমাখরচ','Saldo actual','الرصيد الحالي','Aktueller Kontostand','Solde actuel','Bilancio corrente','Текущий баланс','Cari Denge'),(106,'view_ledger','View Ledger','দেখুন লেজার','Ver Ledger','عرض ليدجر','Ansicht Ledger','Voir Ledger','Vista Ledger','Посмотреть Леджер','Görünüm Ledger'),(107,'edit_account','Edit Account','সম্পাদনা অ্যাকাউন্ট','Editar cuenta','تحرير الحساب','Account bearbeiten','Modifier le compte','Modifica account','Редактировать аккаунт','Hesabı Düzenle'),(108,'ledger','Ledger','খতিয়ান','Libro mayor','ليدجر','Hauptbuch','Grand livre','Libro mastro','Бухгалтерская книга','Defteri kebir'),(109,'date','Date','তারিখ','Fecha','التاريخ','Datum','date','Data','Дата','Tarih'),(110,'title','Title','খেতাব','Título','العنوان','Titel','Titre','Titolo','заглавие','Başlık'),(111,'credit','Credit','জমা','Crédito','ائتمان','Kredit','Crédit','Credito','Кредит','Kredi'),(112,'debit','Debit','ডেবিট','Débito','مدين','Debit','Débit','Addebito','Дебет','Zimmet'),(113,'total_credit','Total Credit','মোট ক্রেডিট','Crédito total','إجمالي الائتمان','Gesamt-Credit','Crédit total','Crediti','Всего Кредитная','Toplam Kredi'),(114,'total_debit','Total Debit','খরচের অঙ্ক','Débito total','إجمالي الخصم','Gesamtbank','Débit total','Debito totale','Всего Дебет','Toplam Borç'),(115,'balance','Balance','ভারসাম্য','Equilibrar','الرصيد','Balance','Équilibre','Bilancio','Баланс','Denge'),(116,'print','Print','ছাপা','Impresión','طباعة','Drucken','Imprimer','Stampare','Распечатать','Yazdır'),(117,'manage_products','Manage Products','পণ্য পরিচালনা','Manejo de Productos','إدارة المنتجات','Produkte verwalten','Gérer Produits','Gestione Prodotti','Управление продуктами','Ürünler yönetin'),(118,'add_new_product','Add New Product','নতুন পণ্য যোগ করুন','Añadir Nuevo Producto','إضافة منتج جديد','Neues Produkt hinzufügen','Ajouter un nouveau produit','Aggiungi nuovo prodotto','Добавить новый продукт','Yeni Ürün Ekle'),(119,'category','Category','শ্রেণী','Categoría','فئة','Kategorie','Catégorie','Categoria','Категория','Kategori'),(120,'price','Price','মূল্য','Precio','السعر','Preis','Prix','Prezzo','Цена','Fiyat'),(121,'add_product','Add Product','পণ্য যোগ করুন','Añadir Producto','إضافة منتج','Produkt hinzufügen','Ajouter un produit','Aggiungi prodotto','Добавить продукт','Ürün Ekle'),(122,'product_name','Product Name','পণ্যের নাম','nombre de producto','اسم المنتج','Produktname','Nom du produit','nome del prodotto','наименование товара','Ürün adı'),(123,'product_category','Product Category','পণ্য তালিকা','Categoria del Producto','فئة المنتج','Produktkategorie','catégorie de produit','Categoria del prodotto','категория продукта','ürün kategorisi'),(124,'unit_price','Unit Price','একক মূল্য','Precio unitario','سعر الوحدة','Einzelpreis','Prix ​​unitaire','Prezzo unitario','Цена за единицу','Birim fiyat'),(125,'edit_product','Edit Product','সম্পাদনা','Editar Producto','تحرير المنتج','Produkt bearbeiten','Modifier produit','Modifica del prodotto','Редактировать товаров','Düzenleme Ürün'),(126,'manage_services','Manage Services','সার্ভিস পরিচালনা','Administrar servicios','إدارة الخدمات','Dienstleistungen verwalten','Gérer les services','Gestione servizi','Управление службами','Hizmetler yönet'),(127,'add_new_service','Add New Service','নতুন পরিষেবা যোগ','Agregar nuevo servicio','إضافة خدمة جديدة','Neuen Service hinzufügen','Ajouter un nouveau service','Aggiungi nuovo servizio','Добавить новый сервис','Yeni Hizmet Ekle'),(128,'add_service','Add Service','পরিষেবা করো','Añadir Servicio','إضافة خدمة','Dienst hinzufügen','Ajouter un service','Aggiungi servizio','Добавить службу','Hizmet Ekle'),(129,'service_name','Service Name','কাজের নাম','Nombre del Servicio','اسم الخدمة','Dienstname','Nom du service','Nome del servizio','наименование услуги','hizmet adı'),(130,'service_category','Service Category','সার্ভিস ক্যাটাগরি','Categoría de Servicio','خدمة الفئة','Service-Kategorie','Catégorie de service','Servizio Categoria','Категория сервиса','Servis Kategorisi'),(131,'edit_service','Edit Service','সম্পাদনা পরিষেবা','Editar Servicio','تحرير الخدمات','Dienst bearbeiten','Modifier un service','Modifica servizio','Редактировать служба','Düzenleme Hizmeti'),(132,'manage_product_/_service_categories','Manage Product / Service Categories','প্রোডাক্ট / সার্ভিস বিভাগ গালাগাল','Manejo de producto / servicio Categorías','إدارة المنتج / الخدمة الفئات','Verwalten Produkte / Service Kategorien','Gérer / Catégories de services produit','Gestire prodotto / servizio Categorie','Управление продукт / услуга Категории','Ürün / Hizmet Kategorileri yönet'),(133,'add_new_category','Add New Category','নতুন বিভাগ যোগ','Añadir nueva categoria','إضافة فئة جديدة','Neue Kategorie hinzufügen','Ajouter une nouvelle catégorie','Aggiungi Nuova Categoria','Добавить новую категорию','Yeni Kategori Ekle'),(134,'category_name','Category Name','নামের তালিকা','Nombre de la categoría','اسم التصنيف','Name der Kategorie','Nom de catégorie','Nome della categoria','Категория Имя','Kategori adı'),(135,'add_category','Add Category','বিষয়শ্রেণী যোগ','Guardar Categoría','إضافة فئة','Kategorie hinzufügen','Ajouter Catégorie','Aggiungi categoria','Добавить категорию','Kategori Ekle'),(136,'edit_category','Edit Category','সম্পাদনা বিভাগ','Editar categoría','تحرير الفئة','Kategorie bearbeiten','Modifier une catégorie','Modifica categoria','Редактировать Категория','Kategori Düzenle'),(137,'add_new_purchase','Add New Purchase','নতুন ক্রয় করো','Añadir Nueva Compra','إضافة شراء الجديد','In New Kauf','Ajouter une nouvelle Achat','Aggiungi nuovo acquisto','Добавить новое приобретение','Yeni Satınalma ekle'),(138,'basic_information','Basic Information','মৌলিক তথ্য','Información básica','معلومات اساسية','Grundinformation','Informations de base','Informazioni di base','Основная информация','Temel Bilgiler'),(139,'due_date','Due Date','নির্দিষ্ট তারিখ','Fecha de vencimiento','التاريخ المقرر','Geburtstermin','Date d\'échéance','Scadenza','Срок','Bitiş tarihi'),(140,'add_product_/_service','Add Product / Service','প্রোডাক্ট / সার্ভিস যোগ','Añadir Producto / Servicio','إضافة منتج / خدمة','Fügen Sie Produkte / Service','Ajouter Produit / Service','Aggiungi Prodotto / Servizio','Добавить товар / услуга','Ürün / Hizmet Ekle'),(141,'add_a_product_/_service','Add A Product / Service','একটি প্রোডাক্ট / সার্ভিস যোগ','Añadir un producto / servicio','إضافة منتج / خدمة','Fügen Sie Produkt / Dienstleistung','Ajouter un produit / service','Aggiungere un prodotto / servizio','Добавить товар / услугу','A Ürün / Hizmet Ekle'),(142,'product_code','Product Code','প্রোডাক্ট কোড','Código de producto','رمز المنتج','Produktcode','Code produit','Codice di produzione','Код продукта','Ürün Kodu'),(143,'quantity','Quantity','পরিমাণ','Cantidad','كمية','Menge','Quantité','Quantità','Количество','Nicelik'),(144,'total','Total','মোট','Total','الإجمالي الكلي','Gesamt','Le total','Totale','Всего','Toplam'),(145,'payment_information','Payment Information','পেমেন্ট তথ্য','Información del pago','معلومات الدفع','Zahlungsinformationen','Information de Paiement','Informazioni sul pagamento','Платежная информация','ödeme bilgileri'),(146,'sub_total','Sub Total','উপ মোট','Total parcial','جنوب إجمالي','Zwischensumme','Total','Sub totale','Промежуточный итог','Alt Toplam'),(147,'VAT','VAT','ভ্যাট','IVI','ضريبة','Mehrwertsteuer','T.V.A.','I.V.A.','НДС','DKV'),(148,'select_VAT','Select VAT','নির্বাচন ভ্যাট','Seleccione el IVA','اختر VAT','Wählen MwSt','Sélectionnez la TVA','Seleziona IVA','Выберите НДС','Seçin KDV'),(149,'no_VAT','No VAT','কোন ভ্যাট','Sin IVA','لا ضريبة القيمة المضافة','Keine MwSt','Pas de TVA','No IVA','Нет НДС','KDV'),(150,'discount_amount','Discount Amount','হ্রাসকৃত মুল্য','Importe de descuento','مقدار الخصم','Rabattbetrag','Montant de la remise','Totale sconto','Сумма скидки','İndirim tutarı'),(151,'grand_total','Grand Total','সর্বমোট','Gran total','المجموع الإجمالي','Endsumme','somme finale','Somma totale','Общая сумма','Genel Toplam'),(152,'financial_account','Financial Account','আর্থিক বিবরণ','Cuenta financiera','حساب مالي','Bankkonto','Compte financier','Conto finanziario','Финансовый счет','Finans Hesabı'),(153,'select_an_account','Select An Account','একটি একাউন্ট নির্বাচন করুন','Seleccione una cuenta','حدد حسابا','Wählen Sie ein Konto','Sélectionnez un compte','Selezionare un account','Выберите учетную запись','Hesap seçin'),(154,'bank_accounts','Bank Accounts','ব্যাংক হিসাব','Cuentas bancarias','حسابات بنكية','Bankkonten','Comptes bancaires','Conto in banca','Банковские счета','Banka hesabı'),(155,'cash_accounts','Cash Accounts','নগদ হিসাব','Cuentas de efectivo','الحسابات النقدية','Geldkonten','Comptes de trésorerie','Conti di cassa','Денежные счета','Nakit Hesapları'),(156,'other_accounts','Other Accounts','অন্যান্য অ্যাকাউন্ট','Otras Cuentas','حسابات أخرى','Weitere Konten','Autres comptes','Altri account','Другие счета','Diğer Hesaplar'),(157,'create_new_purchase','Create New Purchase','নতুন ক্রয় তৈরি','Crear nueva Compra','إنشاء شراء الجديد','Neu erstellen Kauf','Créer un nouveau Achat','Crea nuovo acquisto','Создать новое приобретение','Yeni Satınalma Oluştur'),(158,'manage_purchases','Manage Purchases','ক্রয় সেকেন্ড','Manejo de Compras','إدارة المشتريات','Käufe verwalten','Gérer achats','Gestire Acquisti','Управление Закупки','Satın yönetin'),(159,'edit_purchase','Edit Purchase','সম্পাদনা ক্রয়','Editar Compra','تحرير شراء','Kauf bearbeiten','Modifier Achat','Modifica Acquisto','Редактировать Покупка','Düzenleme Satınalma'),(160,'update_purchase','Update Purchase','আপডেটের জন্য ক্রয়','Actualización de compra','تحديث الشراء','Update Kauf','Mise à jour Achat','Aggiornamento Acquisto','Обновление Покупка','Güncelleme Satınalma'),(161,'purchase_invoice_details','Purchase Invoice Details','চালান বিবরণ ক্রয়','Compra Factura Detalles','شراء تفاصيل الفاتورة','Erwerben Rechnungsdetails','Achetez Détails de la facture','Acquista Dettagli fattura','Покупка счете-фактуре','Fatura Bilgileri Satınalma'),(162,'purchase_invoice','Purchase Invoice','ক্রয় চালান','Compra Factura','شراء فاتورة','Kaufrechnung','Facture d\'achat','Acquisto Fattura','Счет заказа','Satınalma faturası'),(163,'from','From','থেকে','De','من عند','Von','De','Da parte di','Из','Gönderen'),(164,'purchase_items','Purchase Items','ক্রয় আইটেম','Comprar artículos','شراء الأصناف','Kaufgegenstände','Achat Articles','Acquisto di oggetti','Покупка товары','Satınalma Kalemleri'),(165,'vat','Vat','ভাঁটি','I.V.I.','ضريبة القيمة المضافة','Bütte','T.V.A','I.V.A','НДС','Fıçı'),(166,'discount','Discount','ডিসকাউন্ট','Descuento','تخفيض السعر','Rabatt','Remise','Sconto','Скидка','İndirim'),(167,'email_invoice','Email Invoice','ইমেইল চালান','Email Factura','البريد الإلكتروني الفاتورة','E-Mail-Rechnung','Email facture','Email Fattura','E-mail счет-фактура','E-posta Fatura'),(168,'vat','Vat','ভাঁটি','I.V.I.','ضريبة القيمة المضافة','Bütte','T.V.A','I.V.A','НДС','Fıçı'),(169,'invoice','Invoice','চালান','Factura','فاتورة','Rechnung','Facture d\'achat','Fattura','Выставленный счет','Fatura'),(170,'invoice_emailed_successfuly','Invoice Emailed Successfuly','চালান ইমেল Successfuly','Factura enviadas por correo electrónico exitosamente','فاتورة بالبريد الالكتروني بنجاح','Rechnungs Emailed Erfolgreicher','Facture Envoyé avec succès','Fattura Inviato con successo','Счета по электронной почте успешно','Fatura Emailed başarıyla'),(171,'vat','Vat','ভাঁটি','I.V.I.','ضريبة القيمة المضافة','Bütte','T.V.A','I.V.A','НДС','Fıçı'),(172,'add_new_sale','Add New Sale','নতুন বিক্রয় যোগ','Añadir nueva venta','إضافة بيع الجديد','In New Sale','Ajouter un nouveau Vente','Aggiungi nuovo Vendita','Добавить Продажа','Yeni Sale ekle'),(173,'create_new_sale','Create New Sale','নতুন বিক্রয় তৈরি','Crear nueva venta','إنشاء بيع الجديد','Neues Sale','Créer un nouveau Vente','Crea nuovo Vendita','Создать Продажа','Yeni Sale Oluştur'),(174,'manage_sales','Manage Sales','সেলস পরিচালনা','Manejo de Ventas','إدارة المبيعات','Verkäufe verwalten','Gérer ventes','Gestire le vendite','Управление продаж','Satış yönetin'),(175,'edit_sale','Edit Sale','সম্পাদনা বিক্রয়','Editar Venta','تحرير بيع','Verkauf Bearbeiten','Modifier Vente','Modifica Vendita','Редактировать Продажа','Düzenleme Satış'),(176,'update_sale','Update Sale','আপডেট বিক্রয়','Actualización de Venta','تحديث بيع','Update Verkauf','Mise à jour de Vente','Aggiornamento Vendita','Обновление Продажа','Güncelleme Satış'),(177,'sale_invoice_details','Sale Invoice Details','চালান বিবরণ বিক্রয়','Venta Factura Detalles','بيع تفاصيل الفاتورة','Verkauf Rechnungsdetails','Vente Détails de la facture','Vendita Dettagli fattura','Продажа счете-фактуре','Fatura Bilgileri Sale'),(178,'sale_invoice','Sale Invoice','বিক্রয় চালান','Venta Factura','بيع الفاتورة','Verkauf Rechnung','Vente facture','Vendita Fattura','Продажа Счет','Satış Faturası'),(179,'sale_items','Sale Items','বিক্রয় আইটেম','Artículos a la venta','بيع الأدوات','Sale Items','Vendre des articles','Articoli in saldo','Продажа предметов','Satış Öğeler'),(180,'vat','Vat','ভাঁটি','I.V.I.','ضريبة القيمة المضافة','Bütte','T.V.A','I.V.A','НДС','Fıçı'),(181,'manage_incomes','Manage Incomes','আয় গালাগাল প্রতিবেদন','Manejo de Ingresos','إدارة الدخل','Die Einkommen verwalten','Gérer revenus','Gestire redditi','Управление Доходы','Gelirleri yönetin'),(182,'add_new_income','Add New Income','গেম আয় যুক্ত করুন','Añadir Nuevo Ingreso','إضافة الدخل الجديد','In New Income','Ajouter un nouveau revenu','Aggiungi nuovo reddito','Добавить Новые поступления','Yeni Gelir ekle'),(183,'description','Description','বিবরণ','Descripción','الوصف','Beschreibung','Description','Descrizione','Описание','Açıklama'),(184,'income_/_expense_category','Income / Expense Category','আয় / ব্যয় বিভাগ','Ingreso / Gasto Categoría','الدخل / المصاريف الفئة','Erträge / Aufwendungen Kategorie','Produits / charges Catégorie','Proventi / Oneri Categoria','Доходы / расходы Категория','Gelir / Gider Kategori'),(185,'add_income','Add Income','আয় করো','Añadir Ingresos','إضافة الدخل','In Income','Ajouter revenu','Aggiungere reddito','Добавить положение','Gelir ekle'),(186,'edit_income','Edit Income','সম্পাদনা আয়','Editar Ingresos','تحرير الدخل','Bearbeiten Income','Modifier le revenu','Modifica reddito','Редактировать прибыль','Düzenleme Gelir'),(187,'manage_expenses','Manage Expenses','খরচ পরিচালনা','Gestionar los gastos','إدارة النفقات','Ausgaben verwalten','Gérer les dépenses','Gestire le spese','Управление расходы','Giderleri yönetin'),(188,'add_new_expense','Add New Expense','নতুন ব্যয় করো','Agregar nuevo Gasto','إضافة حساب جديد','In New Expense','Ajouter nouvelle dépense','Aggiungi nuovo Expense','Добавить Расход','Yeni Gider ekle'),(189,'add_expense','Add Expense','ব্যয় করো','Añadir Gasto','إضافة حساب','Expense hinzufügen','Ajouter Expense','Aggiungere Expense','Добавить Расход','Gider ekle'),(190,'edit_expense','Edit Expense','সম্পাদনা ব্যয়','Editar Gasto','تحرير المصاريف','Expense bearbeiten','Modifier Expense','Modifica Expense','Редактировать расходов','Düzenleme Gider'),(191,'manage_income_/_expense_categories','Manage Income / Expense Categories','আয় / ব্যয় বিভাগ পরিচালনা','Administrar ingresos / gastos Categorías','إدارة الدخل / المصاريف الفئات','Verwalten Erträge / Aufwendungen Kategorien','Gérer Produits / charges Catégories','Gestire proventi / oneri categorie','Управление доходы / расходы Категории','Gelir / Gider Kategoriler yönetin'),(192,'manage_account_statements','Manage Account Statements','অ্যাকাউন্ট বিবৃতি পরিচালনা','Manejo de Estados de Cuenta','إدارة كشوف الحساب','Verwalten Kontoauszüge','Gérer relevés de compte','Gestire Estratti conto','Управление выписки со счета','Hesap İfadeleri yönetin'),(193,'all_accounts','All Accounts','সমস্ত অ্যাকাউন্ট','Todas las Cuentas','جميع الحسابات','Alle Accounts','Tous les comptes','Tutti gli account','Все счета','Tüm Hesaplar'),(194,'transaction','Transaction','লেনদেন','Transacción','صفقة','Transaktion','Transaction','Transazione','Сделка','Işlem'),(195,'all_transactions','All Transactions','সকল লেনদেন','Todas las transacciones','كل الحركات المالية','Alle Transaktionen','toutes transactions','Tutte le transazioni','Все транзакции','Tüm İşlemler'),(196,'from_date','From Date','তারিখ থেকে','Desde la fecha','من التاريخ','Ab Datum','Partir de la date','Dalla Data','С даты','İtibaren'),(197,'to_date','To Date','এখন পর্যন্ত','Hasta la fecha','حتى تاريخه','Miteinander ausgehen','À ce jour','Ad oggi','Встретиться','Bugüne kadar'),(198,'filter','Filter','ফিল্টার','Filtrar','فلتر','Filter','Filtre','Filtro','Фильтр','Filtre'),(199,'total_income','Total Income','মোট আয়','Ingresos totales','إجمالي الدخل','Gesamteinkommen','Revenu total','Reddito totale','Общая прибыль','Toplam gelir'),(200,'income_bar','Income Bar','আয় বার','Bar Ingresos','بار الدخل','Income Bar','Bar de revenu','Reddito Bar','Доходы Бар','Gelir Bar'),(201,'current_financial_year_starts_from','Current Financial Year Starts From','চলতি অর্থবছরে থেকে শুরু','Ejercicio en curso se inicia desde','التيار السنة المالية تبدأ من','Laufende Geschäftsjahr geht von','EXERCICE EN COURS commence à partir de','Attuale Esercizio Prezzi da','Текущий финансовый год начинается с','Cari Mali Yıl Gönderen Başlıyor'),(202,'january','January','জানুয়ারী','enero','كانون الثاني','Januar','janvier','gennaio','Января','Ocak'),(203,'edit_financial_year_settings','Edit Financial Year Settings','সম্পাদনা অর্থবছরে সেটিংস','Editar configuración de ejercicio','تعديل الإعدادات السنة المالية','Bearbeiten Geschäftsjahr Einstellungen','Modifier les paramètres Exercice','Modifica impostazioni Esercizio','Изменить настройки финансового года','Düzenleme Mali Yılı Ayarlarını'),(204,'income_percentage','Income Percentage','আয় শতকরা','Porcentaje de Ingresos','نسبة الدخل','Gewinn- und Verlustprozent','Pourcentage du revenu','Reddito Percentuale','Доход в процентах','Gelir Yüzde'),(205,'total_expense','Total Expense','মোট ব্যয়','Gasto total','مجموع النفقات','Gesamtausgaben','Total Expense','Total Expense','Всего расходов','Toplam Gider'),(206,'expense_bar','Expense Bar','ব্যয় বার','Gasto Bar','حساب بار','Expense Bar','Dépenses Bar','Expense Bar','Расходы Бар','Gider Bar'),(207,'expense_percentage','Expense Percentage','ব্যয় শতকরা','Gasto Porcentaje','حساب النسبة المئوية','Expense Prozent','Dépenses Pourcentage','Percentuale spese','Расходы в процентах','Gider Yüzde'),(208,'income_expense_comparison_report','Income Expense Comparison Report','আয় ব্যয় তুলনা প্রতিবেদন','Gastos Ingresos Comparación Reportar','نفقات الدخل مقارنة تقرير','Income Expense Vergleichsbericht','Dépenses de revenu Rapport de comparaison','Proventi Oneri report di confronto','Прибыль Сравнение Сообщить','Gelir Gider Raporu Karşılaştırma'),(209,'income_expense_percentage','Income Expense Percentage','আয় ব্যয় শতকরা','Gastos Ingresos Porcentaje','نفقات دخل النسبة المئوية','Income Expense Prozent','Dépenses de revenu Pourcentage','Proventi Oneri Percentuale','Расходы в процентах доходов','Gelir Gider Yüzde'),(210,'manage_notes','Manage Notes','নোট পরিচালনা','Administrar Notas','إدارة الملاحظات','Notizen verwalten','Gérer des notes','Gestisci note','Управление Примечания','Notlar yönetin'),(211,'create_note','Create Note','নোট তৈরি','Crear Nota','إنشاء ملاحظة','Erstellen Hinweis','Créer Remarque','Crea nota','Создать Примечание','Not oluştur'),(212,'untitled','Untitled','শিরোনামহীন','Intitulado','بدون عنوان','Ohne Titel','Sans titre','Senza titolo','Без названия','Başlıksız'),(213,'save_note','Save Note','নোট সংরক্ষণ করুন','Guardar Nota','حفظ ملاحظة','Notiz speichern','Enregistrer la note','Salva Nota','Сохранить Примечание','Kaydet Not'),(214,'delete_note','Delete Note','নোট মুছে','Eliminar Nota','حذف ملاحظة','Hinweis Löschen','Supprimer Note','Elimina Nota','Удалить Примечание','Not sil'),(215,'admin_list','Admin List','অ্যাডমিন তালিকা','Lista de administración','قائمة المشرف','Admin Liste','Liste Admin','Lista Admin','Список Админ','Yönetici Listesi'),(216,'add_new_admin','Add New Admin','নতুন অ্যাডমিন যোগ','Añadir nuevo administrador','إضافة جديد الادارية','In New Admin','Ajouter nouvel admin','Aggiungi nuovo amministratore','Добавить Администратор','Yeni Yönetici Ekle'),(217,'add_admin','Add Admin','অ্যাডমিন যোগ','Añadir administración','إضافة الادارية','In Admin','Ajouter admin','Aggiungere Admin','Добавить Администратор','Yönetici ekle'),(218,'system_title','System Title','সিস্টেম শিরোনাম','Sistema Título','نظام العنوان','System Titel','Système titre','Titolo di sistema','Система Название','Sistem Başlığı'),(219,'system_email','System Email','সিস্টেম ইমেইল','Sistema de Correo','نظام البريد الإلكتروني','E-Mail-System','Système Email','Email sistema','Система E-mail','Sistem E-posta'),(220,'text_align','Text Align','টেক্সট সারিবদ্ধ','Texto Alinear','محاذاة النص','Text Align','Text Align','Allinea il testo','Text Align','Metin Hizala'),(221,'language','Language','ভাষা','idioma','لغة','Sprache','Langue','Lingua','Язык','Dil'),(222,'system_currency','System Currency','সিস্টেম মুদ্রা','Moneda del sistema','نظام العملات','Systemwährung','Système devise','Sistema di valuta','Система валют','Sistem Para'),(223,'show_price_as','Show Price As','দেখান মূল্য হিসাবে','Mostrar Precio Como','عرض الأسعار و','Fragen Sie den Preis als','Voir les prix que','Chiedi il prezzo Come','Показать цену как','Icin arayabilirsiniz As'),(224,'financial_year_start','Financial Year Start','আর্থিক বছরের শুরু','Ejercicio de inicio','بداية السنة المالية','Geschäftsjahr starten','Année financière Démarrer','Esercizio Inizio','Финансовый год Начало','Mali Yıl Başlangıç'),(225,'from_january','From January','জানুয়ারি থেকে','A partir de enero','خلال الفترة من يناير','Von Januar','De Janvier','Da gennaio','С января','Ocak'),(226,'from_july','From July','জুলাই থেকে','A partir de julio','من يوليو','Von Juli','De Juillet','Dal luglio','С июля','Temmuz-'),(227,'save','Save','সংরক্ষণ','Ahorrar','حفظ','sparen','Conserver','Salvare','Сохранить','Kaydet'),(228,'upload_logo','Upload Logo','আপলোড লোগো','Subir Logo','تحميل الشعار','Logo hochladen','Upload Logo','Upload Logo','Загрузить логотип','Yükleme Logosu'),(229,'upload','Upload','আপলোড','Subir','الرفع','Hochladen','Télécharger','Caricare','Загрузить','Yükleme'),(230,'email_template_settings','Email Template Settings','ইমেইল টেমপ্লেট সেটিংস','Configuración de plantilla de correo electrónico','إعدادات قالب البريد الإلكتروني','E-Mail-Template-Einstellungen','Paramètres Email Template','Impostazioni e-mail dei modelli','Настройки электронной почты шаблона','E-posta Şablon Ayarları'),(231,'new_admin_account_opening','New Admin Account Opening','নতুন অ্যাডমিন অ্যাকাউন্ট খোলা','Nueva Apertura Administración de cuentas','جديد الادارة فتح الحساب','New Admin Kontoeröffnung','Nouvelle ouverture de compte Administrateur','Nuova apertura Amministratore account','Новый Админ Открытие счета','Yeni Yönetici Hesabı Açılışı'),(232,'password_reset_confirmation','Password Reset Confirmation','পাসওয়ার্ড রিসেট নিশ্চিতকরণ','Restablecer contraseña Confirmación','إعادة تعيين كلمة المرور تأكيد','Password Reset Confirmation','Password Reset Confirmation','Password Reset Conferma','Сброс пароля Подтверждение','Parola Sıfırlama Onayı'),(233,'email_subject','Email Subject','ইমেইল বিষয়','Asunto del correo','موضوع البريد الإلكتروني','E-Mail Betreff','Sujet du courriel','Oggetto dell\'email','Тема письма','E-posta konu'),(234,'email_body','Email Body','ইমেলের','Cuerpo del correo electronico','البريد الإلكتروني الجسم','Email Körper','Email du corps','Email Corpo','E-mail тела','E-posta Vücut'),(235,'save_template','Save Template','Save Template এ','Guardar plantilla','حفظ القالب','Vorlage speichern','Enregistrer le modèle','Salva modello','Сохранить шаблон','Şablonu Kaydet'),(236,'manage_language','Manage Language','ভাষা পরিচালনা','Administrar Idioma','إدارة اللغة','Sprache verwalten','Gérer Langue','Gestire Lingua','Управление Язык','Dil yönetin'),(237,'language_list','Language List','নতুন ভাষাটি তালিকায় আগে','Lista Idioma','قائمة لغة','Sprachenliste','Liste de Langue','Elenco lingue','Список языков','Dil Listesi'),(238,'add_phrase','Add Phrase','শব্দবন্ধ যোগ','Añadir Frase','إضافة العبارة','Phrase hinzufügen','Ajouter Phrase','Aggiungere Frase','Добавить фразу','Cümle ekle'),(239,'add_language','Add Language','নতুন ভাষা যোগ করা','Agregar idioma','إضافة اللغة','Sprache hinzufügen','Ajouter une langue','Aggiungi lingua','Добавить язык','Dil ekle'),(240,'option','Option','পছন্দ','Opción','خيار','Option','Option','Opzione','Вариант','Seçenek'),(241,'edit_phrase','Edit Phrase','সম্পাদনা শব্দবন্ধ','Editar Frase','تحرير العبارة','Phrase bearbeiten','Modifier Phrase','Modifica Frase','Редактировать Фраза','Düzenleme Cümle'),(242,'write_language_file','Write Language File','ভাষা ফাইল লিখুন','Escribe Archivo Idioma','إرسال ملف اللغة','Schreiben Sprache Datei','Ecrire fichier Langue','Scrivi file Lingua','Написать языковой файл','Dil Dosyası yaz'),(243,'delete_language','Delete Language','ভাষা মুছে','Eliminar Idioma','حذف اللغة','Sprache löschen','Supprimer Langue','Eliminare Lingua','Удалить Язык','Dil Sil'),(244,'phrase','Phrase','শব্দবন্ধ','Frase','العبارة','Phrase','Phrase','Frase','Фраза','İfade'),(245,'value_required','Value Required','মূল্য প্রয়োজন','Valor Obligatorio','القيمة المطلوبة','Wert Erforderlich','Valeur Obligatoire','Valore Obbligatorio','Значение Обязательно','Değer Gerekli'),(246,'update_phrase','Update Phrase','আপডেট শব্দবন্ধ','Actualización Frase','تحديث العبارة','Update-Satz','Mise à jour Phrase','Aggiornamento Frase','Обновление Фраза','Güncelleme Cümle'),(247,'manage_vat_settings','Manage Vat Settings','ভ্যাট সেটিংস পরিচালনা করুন','Administrar configuración IVA','إدارة إعدادات ضريبة القيمة المضافة','MwSt-Einstellungen verwalten','Gérer les paramètres Vat','Gestisci impostazioni Iva','Управление настройками Vat','Vat Ayarlarını Yönet'),(248,'add_new_vat','Add New Vat','নতুন ভ্যাট যোগ','Agregar nuevo IVA','إضافة ضريبة القيمة المضافة الجديدة','In New Vat','Ajouter un nouveau Vat','Aggiungi nuovo Iva','Добавить Vat','Yeni Vat ekle'),(249,'vat_name','Vat Name','ভ্যাট নাম','Vat Nombre','اسم ضريبة القيمة المضافة','Vat Namen','Vat Nom','Iva Nome','НДС Имя','Vat Adı'),(250,'percentage','Percentage','শতকরা হার','Porcentaje','نسبة مئوية','Prozentsatz','Pourcentage','Percentuale','Процент','Yüzde'),(251,'add_vat','Add Vat','ভ্যাট যোগ','Añadir Vat','إضافة ضريبة القيمة المضافة','Vat hinzufügen','Ajouter Vat','Aggiungere Iva','Добавить Vat','Vat ekle'),(252,'edit_vat','Edit Vat','সম্পাদনা জালা','Editar Vat','تحرير ضريبة القيمة المضافة','Vat bearbeiten','Modifier Vat','Modifica Iva','Редактировать НДС','Düzenleme Vat'),(253,'manage_profile','Manage Profile','অমিমাংসীত সংস্করণ লগ','Administrar perfil','إدارة الملف','Profil verwalten','Gérer le profil','Gestisci profilo','Управление профиля','Profilinizi Yönetin'),(254,'edit_profile','Edit Profile','জীবন বৃত্তান্ত সম্পাদনা','Editar perfil','تعديل الملف الشخصي','Profil bearbeiten','Modifier le profil','Modifica Profilo','Редактировать профиль','Profili Düzenle'),(255,'update_profile','Update Profile','প্রফাইল হালনাগাদ','Actualización del perfil','تحديث الملف','Profil aktualisieren','Mettre à jour le profil','Aggiorna il profilo','Обновить профиль','Profili güncelle'),(256,'change_password','Change Password','পাসওয়ার্ড পরিবর্তন করুন','Cambiar la contraseña','تغيير كلمة السر','Kennwort ändern','Changer le mot de passe','Cambiare la password','Изменить пароль','Şifre değiştir'),(257,'current_password','Current Password','বর্তমান পাসওয়ার্ড','contraseña actual','كلمة السر الحالية','Aktuelles Passwort','Mot de passe actuel','Password attuale','текущий пароль','Şimdiki Şifre'),(258,'new_password','New Password','নতুন পাসওয়ার্ড','nueva contraseña','كلمة سر جديدة','Neues Kennwort','nouveau mot de passe','nuova password','новый пароль','Yeni Şifre'),(259,'confirm_new_password','Confirm New Password','নিশ্চিত কর নতুন গোপননম্বর','Confirmar nueva contraseña','تأكيد كلمة السر الجديدة','Bestätige neues Passwort','Confirmer le nouveau mot de passe','Conferma la nuova password','Подтвердите новый пароль','Yeni şifreyi onayla'),(260,'update_password','Update Password','আপডেট পাসওয়ার্ড','Actualiza contraseña','تحديث كلمة المرور','Passwort aktualisieren','Mise à jour Mot de passe','Aggiorna password','Обновление Пароль','Güncelleme Şifre'),(261,'Cuentas por Pagar','','','','','','','','',''),(262,'pay_account','','','Cuentas por pagar','','','','','',''),(263,'bill_account','','','Cuentas por cobrar','','','','','','');
/*!40000 ALTER TABLE `bk_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_method_payment`
--

DROP TABLE IF EXISTS `bk_method_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_method_payment` (
  `method_payment_id` int(11) NOT NULL DEFAULT '0',
  `name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_method_payment`
--

LOCK TABLES `bk_method_payment` WRITE;
/*!40000 ALTER TABLE `bk_method_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_method_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_note`
--

DROP TABLE IF EXISTS `bk_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_note` (
  `note_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_note`
--

LOCK TABLES `bk_note` WRITE;
/*!40000 ALTER TABLE `bk_note` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_product`
--

DROP TABLE IF EXISTS `bk_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_product` (
  `product_id` int(11) NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `product_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `bk_productcol` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_product`
--

LOCK TABLES `bk_product` WRITE;
/*!40000 ALTER TABLE `bk_product` DISABLE KEYS */;
INSERT INTO `bk_product` VALUES (4,'product','90599b9f9d','Gatorade',6,'1000','',10,NULL);
/*!40000 ALTER TABLE `bk_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_product_category`
--

DROP TABLE IF EXISTS `bk_product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_product_category` (
  `product_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_product_category`
--

LOCK TABLES `bk_product_category` WRITE;
/*!40000 ALTER TABLE `bk_product_category` DISABLE KEYS */;
INSERT INTO `bk_product_category` VALUES (5,'Clases de Futbol'),(6,'Tienda');
/*!40000 ALTER TABLE `bk_product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_purchase`
--

DROP TABLE IF EXISTS `bk_purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `vat_id` int(11) NOT NULL,
  `discount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due_date` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_purchase`
--

LOCK TABLES `bk_purchase` WRITE;
/*!40000 ALTER TABLE `bk_purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_purchase_item`
--

DROP TABLE IF EXISTS `bk_purchase_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_purchase_item` (
  `purchase_item_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` longtext COLLATE utf8_unicode_ci NOT NULL,
  `purchase_price` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_purchase_item`
--

LOCK TABLES `bk_purchase_item` WRITE;
/*!40000 ALTER TABLE `bk_purchase_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_purchase_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_sale`
--

DROP TABLE IF EXISTS `bk_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_sale` (
  `sale_id` int(11) NOT NULL,
  `sale_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `vat_id` int(11) NOT NULL,
  `discount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due_date` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_sale`
--

LOCK TABLES `bk_sale` WRITE;
/*!40000 ALTER TABLE `bk_sale` DISABLE KEYS */;
INSERT INTO `bk_sale` VALUES (1,'6eb4027965',1,0,'3500',0,'0','1458536400','1457503200'),(2,'0266d98b51',1,0,'10500',0,'0','1458536400','1458536400');
/*!40000 ALTER TABLE `bk_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_sale_item`
--

DROP TABLE IF EXISTS `bk_sale_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_sale_item` (
  `sale_item_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sale_price` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_sale_item`
--

LOCK TABLES `bk_sale_item` WRITE;
/*!40000 ALTER TABLE `bk_sale_item` DISABLE KEYS */;
INSERT INTO `bk_sale_item` VALUES (1,1,1,'1','3500'),(2,2,1,'1','3500'),(3,2,3,'1','4500'),(4,2,2,'1','2500');
/*!40000 ALTER TABLE `bk_sale_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_service`
--

DROP TABLE IF EXISTS `bk_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext NOT NULL,
  `death_date` date DEFAULT NULL,
  `death_document` longtext,
  `deceased_first_name` longtext,
  `deceased_last_name1` longtext,
  `deceased_last_name2` longtext,
  `deceased_id_card` longtext,
  `deceased_age` longtext,
  `contact_id` int(11) DEFAULT NULL,
  `relationship` longtext,
  `payment_method` longtext,
  `contract_id` longtext,
  `amount` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `coffin` longtext,
  `bill` longtext,
  `veiling_room` tinyint(1) DEFAULT '0',
  `transfers` tinyint(1) DEFAULT '0',
  `forgetfulness` longtext,
  `pathology` tinyint(1) DEFAULT '0',
  `pathology_technician` longtext,
  `flowers` longtext,
  `cremation` tinyint(1) DEFAULT '0',
  `morgue` longtext,
  `transfer_address` longtext,
  `driver` tinyint(1) DEFAULT '0',
  `float` tinyint(1) DEFAULT '0',
  `transfer_time` longtext,
  `vault_coffin` longtext,
  `candlestick` longtext,
  `pushcart` longtext,
  `curtain` tinyint(1) DEFAULT '0',
  `transfer_observations` longtext,
  `arrangements` longtext,
  `pedestal` longtext,
  `lectern` tinyint(1) DEFAULT '0',
  `carpet` tinyint(1) DEFAULT '0',
  `service_date` date DEFAULT NULL,
  `service_hour` longtext,
  `church` longtext,
  `cemetery` longtext,
  `service_float` longtext NOT NULL,
  `service_driver` longtext,
  `decoration_float` longtext,
  `decoration_driver` longtext,
  `service_observations` longtext,
  `user_id` int(11) DEFAULT NULL,
  `client_first_name` longtext NOT NULL,
  `client_last_name1` longtext NOT NULL,
  `client_last_name2` longtext,
  `client_id_card` longtext NOT NULL,
  `client_email` longtext,
  `client_phone` longtext NOT NULL,
  `client_phone2` longtext,
  `client_phone3` longtext,
  `veiling_site` longtext,
  `print_date` date DEFAULT NULL,
  `contrato_account_id1` int(11) DEFAULT NULL,
  `contrato_account_id2` int(11) DEFAULT NULL,
  `contrato_account_id3` int(11) DEFAULT NULL,
  `abono` double DEFAULT NULL,
  `tributes` int(11) DEFAULT NULL,
  `pathology_cost` double DEFAULT NULL,
  `autopsy` tinyint(1) DEFAULT NULL,
  `autopsy_technician` longtext,
  `autopsy_cost` double DEFAULT NULL,
  `morgue_address` longtext,
  `veiling_site_address` longtext,
  `veiling_site_arrangements` int(11) DEFAULT NULL,
  `funeral_date` date DEFAULT NULL,
  `funeral_time` date DEFAULT NULL,
  `urn` longtext,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_service`
--

LOCK TABLES `bk_service` WRITE;
/*!40000 ALTER TABLE `bk_service` DISABLE KEYS */;
INSERT INTO `bk_service` VALUES (4,'contrato','0000-00-00','','','','','','',3,'',NULL,'12345',600000,NULL,'Diplomático','',NULL,NULL,'1',NULL,'','2',NULL,'Casa de habitación','',NULL,NULL,'','Shalom','No','Europea',NULL,'','1','2',NULL,NULL,'0000-00-00','','Tibás','Tibás','Toyota','','Toyota','','',7,'Alex','Morgan','Rodriguez','113710497','amorgan115@gmail.com','71765072','','','Funeraria Shalom',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'funecredito','0000-00-00','','','','','','',3,'',NULL,'test',1300000,750000,'Diplomático','',NULL,NULL,'1',NULL,'','2',NULL,'Casa de habitación','',NULL,NULL,'','Shalom','No','Europea',NULL,'','1','2',NULL,NULL,'0000-00-00','','Tibás','Tibás','Toyota','','Toyota','','',7,'Alex','Morgan','Rodriguez','113710497','amorgan115@gmail.com','71765072','','','Funeraria Shalom',NULL,5,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'apartado','0000-00-00','','','','','','',2,'',NULL,'red',30000,20000,'Diplomático','',NULL,NULL,'1',NULL,'','2',NULL,'Casa de habitación','',NULL,NULL,'','Shalom','No','Europea',NULL,'','1','2',NULL,NULL,'0000-00-00','','Tibás','Tibás','Toyota','','Toyota','','',7,'qw','qw','q','','','3323','','','Funeraria Shalom',NULL,0,0,0,10000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'funeral',NULL,'','','','','','',3,'',NULL,NULL,1234,NULL,'Diplomático','',NULL,NULL,'1',NULL,'','2',NULL,'Casa de habitación',NULL,NULL,NULL,'','Shalom','No','Europea',NULL,'',NULL,'2',NULL,NULL,NULL,NULL,'Tibás','Tibás','Toyota','','Toyota','','',0,'test','','test3','123456',NULL,'1233342323',NULL,NULL,'Ecológica',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,'',0,'','',NULL,'0000-00-00','0000-00-00',NULL),(17,'funeral',NULL,'','','','','','',3,'',NULL,NULL,120000,NULL,'Diplomático','',NULL,NULL,'1',NULL,'','2',NULL,'Casa de habitación',NULL,NULL,NULL,'','Shalom','No','Europea',NULL,'',NULL,'2',NULL,NULL,NULL,NULL,'Tibás','Tibás','Toyota','','Toyota','','',2,'water','','test','32323','test@tes.com','3232','','','Ecológica',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,'',0,'','',NULL,'0000-00-00','0000-00-00',NULL);
/*!40000 ALTER TABLE `bk_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_sessions`
--

DROP TABLE IF EXISTS `bk_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_sessions`
--

LOCK TABLES `bk_sessions` WRITE;
/*!40000 ALTER TABLE `bk_sessions` DISABLE KEYS */;
INSERT INTO `bk_sessions` VALUES ('009d198802884a3631d501857028e522cd72f14b','127.0.0.1',1504808087,'__ci_last_regenerate|i:1504807884;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('02203fa60f97b66062fe06ad1b255757bad383f7','127.0.0.1',1516756890,'__ci_last_regenerate|i:1516755954;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('024e722ae649150c63b2689c90fa7ded3e52bede','127.0.0.1',1516688115,'__ci_last_regenerate|i:1516687900;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('02f5b00f0d7077bb2d4800e92a2f7032118bb27d','127.0.0.1',1517881713,'__ci_last_regenerate|i:1517881635;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('04f588523bb44a4ca63c834f4afb57604e6fb6fb','127.0.0.1',1516684613,'__ci_last_regenerate|i:1516682969;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('05ba55f5f15cf0804f6189e834ac9bc17d3335a7','127.0.0.1',1517950242,'__ci_last_regenerate|i:1517950012;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('0d374060a853ff2003ea2dd107d04b27989880f7','127.0.0.1',1516668752,'__ci_last_regenerate|i:1516668505;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('0e49220886e0e6296def0b379511337d4c948f51','127.0.0.1',1512449806,'__ci_last_regenerate|i:1512449525;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('0e74dc689a68713303e63fd90ef66c339754d147','127.0.0.1',1516661465,'__ci_last_regenerate|i:1516661143;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('0f60d92ed79bc969624fb9373168772c5c1a3992','127.0.0.1',1504037721,'__ci_last_regenerate|i:1504036866;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('0f795f5917ccc5a19e5474b0994e2e113ce41df0','127.0.0.1',1504808497,'__ci_last_regenerate|i:1504808236;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('0f97b3038427ca9c98e7e95d020462e575e7589c','127.0.0.1',1512448898,'__ci_last_regenerate|i:1512447638;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('111a2fc691ffe28c15297248bfadd701b2a61201','127.0.0.1',1504028464,'__ci_last_regenerate|i:1504028382;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('1137daa9ec0540af3f4636c1d2c71d3c0e8d10e0','127.0.0.1',1517854845,'__ci_last_regenerate|i:1517853723;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('119a3d494185cb730ae2cb970dced092c4f641df','127.0.0.1',1504654359,'__ci_last_regenerate|i:1504653458;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('130a963d733796b4b297f14a6caa757f2c0fa2c9','127.0.0.1',1503787844,'__ci_last_regenerate|i:1503787844;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('14568d57dbf10d2cc8041ef8fad3eae40d9ad682','127.0.0.1',1505144293,'__ci_last_regenerate|i:1505143893;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('1475fe143ff052fa01e51e91ef6f10741df5267f','127.0.0.1',1517937610,'__ci_last_regenerate|i:1517937197;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('14ce1083c9ade58b3c16192ba84bd46871c8bc82','127.0.0.1',1504037979,'__ci_last_regenerate|i:1504037765;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('14f32c487615a3f2efa815147e862ca7be59bf8d','127.0.0.1',1503959529,'__ci_last_regenerate|i:1503959314;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('16b072608c934843bd96177ba44ee4d95ec33cb9','127.0.0.1',1516755525,'__ci_last_regenerate|i:1516755315;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('173319ddac8f71ff294cda5521c0a0d293a11900','127.0.0.1',1516687627,'__ci_last_regenerate|i:1516687420;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('17c8bd26e6755ef3ecf3f51052998d259e1153e0','127.0.0.1',1504827503,'__ci_last_regenerate|i:1504827464;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('191e14f707cf913151e12a519a65f708a51300ec','127.0.0.1',1516689898,'__ci_last_regenerate|i:1516689664;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('1dc92d69206a5b75bd305d107021e5cfeb65bb17','127.0.0.1',1504812544,'__ci_last_regenerate|i:1504812324;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('1e0abb437c431532f46a4de4f5e11e5806ce1f37','127.0.0.1',1516671784,'__ci_last_regenerate|i:1516671556;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('1ea217e23930b4955a7b0ca227e52d5ad06f01a0','127.0.0.1',1504756268,'__ci_last_regenerate|i:1504746698;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('24490a6479737d49b5c78e97786bbc9ff78ea54c','127.0.0.1',1512449342,'__ci_last_regenerate|i:1512449150;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('252556094293b576e4b478d040a468bc452bb2d2','127.0.0.1',1504031718,'__ci_last_regenerate|i:1504029455;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('2536c7c810425e6e794764f517b3fd1953e1e52b','127.0.0.1',1516686760,'__ci_last_regenerate|i:1516685046;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('27ad05d2cd909d693d3bba59f4b8347f34cf7805','127.0.0.1',1516753349,'__ci_last_regenerate|i:1516753040;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('299e8521400dc98116e92201d6b308af240e31eb','127.0.0.1',1505144603,'__ci_last_regenerate|i:1505144498;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('2ad601562d1754c5b32f05e4933732551f5c25a0','127.0.0.1',1504828789,'__ci_last_regenerate|i:1504828185;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('2cb5c6ec8090baae06c7a4ed58789145440e4b9c','127.0.0.1',1503786004,'__ci_last_regenerate|i:1503786004;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('2dc9b94584658be8930de00838bd0db6d1ca113f','127.0.0.1',1517847269,'__ci_last_regenerate|i:1517847221;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('32656c5a0bdb1e274138f0d73dbe133bc660ce14','127.0.0.1',1517936767,'__ci_last_regenerate|i:1517936652;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('328f4567c6e966daa6e754645bc2a5f7ee402f52','127.0.0.1',1516690149,'__ci_last_regenerate|i:1516690020;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('39694e0cc8c0f69a46bff58045d343c71f1c8c8f','127.0.0.1',1516754112,'__ci_last_regenerate|i:1516753846;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('3b82a7e88e434745938067a8b888b59fcfb1dd07','127.0.0.1',1516688443,'__ci_last_regenerate|i:1516688228;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('3c1e8670d04f1bf5bafdad824e21b92ac06cc15c','127.0.0.1',1517950532,'__ci_last_regenerate|i:1517950470;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('3c451804d44bb985f4e3374b8938b861a4b161be','127.0.0.1',1517849898,'__ci_last_regenerate|i:1517849670;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('3cfb1cd7a2e2a21f1e7c0d04371725057104fb14','127.0.0.1',1504825998,'__ci_last_regenerate|i:1504822711;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('3e70cdd7b89b3c5ed4fedb6d76911f82b0d76859','127.0.0.1',1516661039,'__ci_last_regenerate|i:1516660842;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('3fc8cf811db1445e3d1532e6d06f604bdcefaf60','127.0.0.1',1518830176,'__ci_last_regenerate|i:1518830094;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('400f332294370a342ed7e2b3f4b422f7495530eb','127.0.0.1',1504740259,'__ci_last_regenerate|i:1504740216;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('406d52a406525a43a91c9aa878343eb1f552610b','127.0.0.1',1512446063,'__ci_last_regenerate|i:1512445830;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('4149f28d31b6f9a6f3bfcce474381a8df03ff113','127.0.0.1',1516684861,'__ci_last_regenerate|i:1516684664;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('454c56f89b91642ff615cca47d1e54a4b78eac10','127.0.0.1',1503798585,'__ci_last_regenerate|i:1503798585;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('45780dcdb0e0005e33a7412cecf62a460804efb4','127.0.0.1',1503965480,'__ci_last_regenerate|i:1503965467;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('45aba74e9167feaf4a1823a4a10ba6a7fe864c9b','127.0.0.1',1504568535,'__ci_last_regenerate|i:1504568309;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('47a8f988d6666e3f67b2ae32ae6f7dd9c122eed6','127.0.0.1',1517936650,'__ci_last_regenerate|i:1517936300;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('47de315716e2a9247ca99026eeca14e7de7c770f','127.0.0.1',1516659308,'__ci_last_regenerate|i:1516659154;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('4a5d2792cdcce86aab0713bb8c704b40a5188459','127.0.0.1',1517854947,'__ci_last_regenerate|i:1517854947;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('4bb9f5facd2e3d4553adb2974adf20d8e0bf68ac','127.0.0.1',1517847884,'__ci_last_regenerate|i:1517847593;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('4c33b726593761dceb4de184aaef32ecf58ac458','127.0.0.1',1516682546,'__ci_last_regenerate|i:1516673645;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('4d3a24c953adbb3d4fbd8c0e37240e3998ec7e93','127.0.0.1',1518828935,'__ci_last_regenerate|i:1518828934;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('4ede8b8b36f45a1b2b20394ef9fd7a7f9220d576','127.0.0.1',1516687094,'__ci_last_regenerate|i:1516686946;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('501b4e5dea222ddc3ae9c5081532508744d4f587','127.0.0.1',1516669083,'__ci_last_regenerate|i:1516669003;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('526a2219368ded7371bf1b40c601a9f958ed05a8','127.0.0.1',1516753708,'__ci_last_regenerate|i:1516753422;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('543891eed538f5c16b41d505e00502f4155f436b','127.0.0.1',1504033314,'__ci_last_regenerate|i:1504033313;'),('55e26ab38a78eabd21622adf711930b7910ef736','127.0.0.1',1504828915,'__ci_last_regenerate|i:1504828797;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('55fe5e4e7c5239b2b650ca873ee1ea0f423e9c36','127.0.0.1',1516682679,'__ci_last_regenerate|i:1516682571;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('560878acb30f582886e886b32a3d9c95ada6ef07','127.0.0.1',1503787390,'__ci_last_regenerate|i:1503787390;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('57a1364683bdec6186f523bea8d65ee286f3f858','127.0.0.1',1516662104,'__ci_last_regenerate|i:1516661609;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('57c7e54a6facd49343ab42f6980c3320d2a33572','127.0.0.1',1504043404,'__ci_last_regenerate|i:1504042155;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('5ade26a1da2b669083b71e063f83bf85151cc612','127.0.0.1',1517845972,'__ci_last_regenerate|i:1517845893;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('5aee250c4d0c7d49082937cbfb1054f5cc9aaad7','127.0.0.1',1504745694,'__ci_last_regenerate|i:1504745694;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('5e8aa00baf3d3fd0a557b026374b4cc66cb68322','127.0.0.1',1516660636,'__ci_last_regenerate|i:1516660377;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('5ec63eb6cb342a07ec6a27c6a5a1b6a3adcaf6f0','127.0.0.1',1516670731,'__ci_last_regenerate|i:1516670458;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('5f5b12e220f86892691813ba9b1b90bdfc0cb8ee','127.0.0.1',1504808584,'__ci_last_regenerate|i:1504808543;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('607a642c96ce26f087b8610ad8c4150e0ec990d5','127.0.0.1',1504563671,'__ci_last_regenerate|i:1504563513;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('6149195e44289b02130c2f9e7157879262ad635c','127.0.0.1',1504031756,'__ci_last_regenerate|i:1504031755;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('61bb4847401e3ba15c0f4f023b6189bd4bfeb30b','127.0.0.1',1504029357,'__ci_last_regenerate|i:1504029088;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('62893abc46ce59c056da700cfcc32680cb82585a','127.0.0.1',1517848250,'__ci_last_regenerate|i:1517847952;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('63f03c2d3ea464183d54a5b4a410dba7417059ce','127.0.0.1',1504821937,'__ci_last_regenerate|i:1504821668;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('64a706e13700a63caf5114742b42b19ca87ae94e','127.0.0.1',1503786567,'__ci_last_regenerate|i:1503786567;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('66a00b48839af6e282461a0a2c8d775cac831dbd','127.0.0.1',1504806790,'__ci_last_regenerate|i:1504757289;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('677d9e0483ee19d56f34e46156157060c8d5d6fd','127.0.0.1',1517848726,'__ci_last_regenerate|i:1517848500;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('67b018e48f98e847e035bcbf99e6d68aeea590db','127.0.0.1',1517850478,'__ci_last_regenerate|i:1517850475;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('6813fb218547d949f597a88a8b11c7b52b787c21','127.0.0.1',1512401421,'__ci_last_regenerate|i:1512401148;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('6a469f83353e0043eb68dd5745c9fac9be9be480','127.0.0.1',1504653448,'__ci_last_regenerate|i:1504646952;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('6bb2f5bffb9f075d10044bc809ca160baf98df4e','127.0.0.1',1517532600,'__ci_last_regenerate|i:1517532287;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('6d10c6469eb3a3657acfd74d7a7fe01da1545d3a','127.0.0.1',1503788160,'__ci_last_regenerate|i:1503788160;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('6e3a3e2cabfffd5651e886f9f30313a31d846e9f','127.0.0.1',1503801296,'__ci_last_regenerate|i:1503801296;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('703a446d7ca95d3efbd4adb2df0b3c64208934f1','127.0.0.1',1503784669,'__ci_last_regenerate|i:1503784669;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('729f5f8865293eae38acb962c9f3b3fe453c8fc7','127.0.0.1',1505143646,'__ci_last_regenerate|i:1505143328;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('74766bd1704a9b26f1ca225818c23a5a9df8780f','127.0.0.1',1516672467,'__ci_last_regenerate|i:1516672260;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('76622106dbfbc945df03cc7d71350c840f28794f','127.0.0.1',1516757210,'__ci_last_regenerate|i:1516757103;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('78b006bfda60645ce2256d408b53d7eacb64dd63','127.0.0.1',1504821254,'__ci_last_regenerate|i:1504821008;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('796b447ada0a3f0ceff4cebf632a0b550e34e4d0','127.0.0.1',1503801300,''),('7a85937dbb0c18fe69d02b5b7334694c81762840','127.0.0.1',1517953689,'__ci_last_regenerate|i:1517953482;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('7ccab529c163d0d3b59cbc18ce8047e8d30d56aa','127.0.0.1',1516662146,'__ci_last_regenerate|i:1516662143;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('7d329332a3d6ed3f4e6f279a80a98644df9f661f','127.0.0.1',1516668161,'__ci_last_regenerate|i:1516668150;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('7e48b1e851020a36da08b3781fc9d142aa90867e','127.0.0.1',1516755908,'__ci_last_regenerate|i:1516755646;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('805ae927f39b8fa8c17620fe691dd9de977f0a00','127.0.0.1',1516689578,'__ci_last_regenerate|i:1516689277;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('80ac03f77612a56655dc008f8ae0d85a353a2f74','127.0.0.1',1504826464,'__ci_last_regenerate|i:1504826413;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('84dcb9e2cce3d2bf6865dbc455b602997c861fc5','127.0.0.1',1516690504,'__ci_last_regenerate|i:1516690501;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('87200e3edd4fec5e4cb46bad8a80e7e8fb11a8e3','127.0.0.1',1517951374,'__ci_last_regenerate|i:1517951353;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('878944970dd4111fedb4240e0e7e791d6c24c483','127.0.0.1',1504043927,'__ci_last_regenerate|i:1504043927;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('883d74dbdd34f1f00927164892762f0f7b4d65ab','127.0.0.1',1504567681,'__ci_last_regenerate|i:1504564374;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('89a07a46d35dcd257aed19fa2ea78a12ae3cec30','127.0.0.1',1512401529,'__ci_last_regenerate|i:1512401503;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('8ad20f1f3eb69e0a0e940063fe93e756d19a3ec1','127.0.0.1',1518828957,'__ci_last_regenerate|i:1518828936;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('8b0846fffe73202cc838694fa7d12c272d4fb091','127.0.0.1',1516669983,'__ci_last_regenerate|i:1516669983;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('8b5114032f2e5c4bd4a1ab516a8e7b8d92c81297','127.0.0.1',1516777993,'__ci_last_regenerate|i:1516757762;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('8d6347d93505d3e28eef36873212c128e2880bf5','127.0.0.1',1504038876,'__ci_last_regenerate|i:1504038785;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('8ec397056e9055ef019c3660514f1d785b405c52','127.0.0.1',1517880394,'__ci_last_regenerate|i:1517880391;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('8f6ce569edf91082e1aa65d955b8594d57a5f5c8','127.0.0.1',1504745597,'__ci_last_regenerate|i:1504745365;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('8ff40df331063901dbe663b13feba7ec43366918','127.0.0.1',1504811410,'__ci_last_regenerate|i:1504810958;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('9284b31a61e8ff4e29ea578770df52c239885bd3','127.0.0.1',1504564362,'__ci_last_regenerate|i:1504564017;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('93348e3f41efca2b8408444c4f657c38c9fa9daf','127.0.0.1',1504742209,'__ci_last_regenerate|i:1504742204;user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('943227c94bf513d649026709f6c03682e6b2b611','127.0.0.1',1504828159,'__ci_last_regenerate|i:1504827829;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('9464f8e5df06a5e37d0f82f59edd8c1ffe47199e','127.0.0.1',1504028757,'__ci_last_regenerate|i:1504028757;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('9635f88f1113a161e2795365ad097f34894d8c0d','127.0.0.1',1511899649,'__ci_last_regenerate|i:1511899539;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('96b1a97840f5f2027d4061a1936d1d8439ef09be','127.0.0.1',1517532287,'__ci_last_regenerate|i:1517532287;req_url|s:32:\"http://funeraria.local/index.php\";'),('9925e59f2ca78a96c31d2201b8aa103915f83e12','127.0.0.1',1517949993,'__ci_last_regenerate|i:1517949488;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('9ddf0d8f41e1dc940cd62ca485ad9545d2f51b40','127.0.0.1',1515860811,'__ci_last_regenerate|i:1515860811;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('9e81ce1fe5ac7bf2fe4664d82fa08dc950abbf36','127.0.0.1',1516669956,'__ci_last_regenerate|i:1516669650;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('9eb6ae8469a677edcc1e3d2259e126fa27be6288','127.0.0.1',1516689075,'__ci_last_regenerate|i:1516688891;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('9f9049224d5fcb24c25ad796b5d44260956ffd2d','127.0.0.1',1516757613,'__ci_last_regenerate|i:1516757436;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a0f52d418558b04394131669316de092f21dcb8e','127.0.0.1',1516672171,'__ci_last_regenerate|i:1516671946;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a15792451732577d76c37e89d1f56bad047f4ebe','127.0.0.1',1504815631,'__ci_last_regenerate|i:1504814666;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a206f8d62a92fe4d0efdb87ad0b0dc01d0a1f0f9','127.0.0.1',1504900631,'__ci_last_regenerate|i:1504900630;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a6296e9dae79e442ae1cdc72fa74be4b8c4ba249','127.0.0.1',1512446185,'__ci_last_regenerate|i:1512446181;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a6806bac84da26bbaf6522e1f725580d4f08cd1c','127.0.0.1',1503790644,'__ci_last_regenerate|i:1503790644;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a6f593d886f52e7f5b68eac330dcd76d19811689','127.0.0.1',1504043899,'__ci_last_regenerate|i:1504043432;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a72448d7d0d4721ffbd84b63df7e71c40d96635c','127.0.0.1',1504742264,'__ci_last_regenerate|i:1504742257;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a770eb42697ee3bc22f7c8cc0b03fc52e7a9b398','127.0.0.1',1504563466,'__ci_last_regenerate|i:1504563196;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('aa7cc38ef91d8d895fc7074db84809f4c86e7208','127.0.0.1',1504654474,'__ci_last_regenerate|i:1504654368;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('ac0b95961ec405437b0fae5b808672d754738b7a','127.0.0.1',1516663572,'__ci_last_regenerate|i:1516663462;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('ad6dedb75aadf504d156c97fdac045e9d4251e3b','127.0.0.1',1516688828,'__ci_last_regenerate|i:1516688544;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('b1b2000483cac6591f38ffbd28a41e9df7c4f122','127.0.0.1',1517845836,'__ci_last_regenerate|i:1517845536;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('b4417b2e0123d4121e34b25450ad99b9c29f2f49','127.0.0.1',1516673562,'__ci_last_regenerate|i:1516673264;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('b4586879dfe1c2b165ca9e1af447ff2f4965b133','127.0.0.1',1517850332,'__ci_last_regenerate|i:1517850012;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('ba25b7512929f6f793973175f5ff301f3fc97c57','127.0.0.1',1503787036,'__ci_last_regenerate|i:1503787036;user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('bb17cec029c07b30c110885d88110e6a50b7f598','127.0.0.1',1517947826,'__ci_last_regenerate|i:1517947695;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('bd064d0c0ec78c3953e2d7d5f0a5a07a9a3bcadc','127.0.0.1',1517847086,'__ci_last_regenerate|i:1517846871;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('bf962fe0e7dc17c6a6914d763ececdcc76def687','127.0.0.1',1504831168,'__ci_last_regenerate|i:1504830824;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('c019d90eb1fd97754a94d13246da37ff9d0a22d7','127.0.0.1',1517858167,'__ci_last_regenerate|i:1517857251;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('c21041714fe6323617a9b2abc81c83a1713979b1','127.0.0.1',1504822028,'__ci_last_regenerate|i:1504821986;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('c3baf71bc583e488a7dcc4ec8df76d1b643936b4','127.0.0.1',1517861568,'__ci_last_regenerate|i:1517861365;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('c5b270c4da34457b93de83bdc6dd96123bfc0f31','127.0.0.1',1517845537,'__ci_last_regenerate|i:1517845536;req_url|s:32:\"http://funeraria.local/index.php\";'),('c7c36852eb180649b239d28c2bda8900df45eeb3','127.0.0.1',1504571984,'__ci_last_regenerate|i:1504571840;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('ca2ac6bc6b035a8b82bd4ede4b1edf7f89080031','127.0.0.1',1504743772,'__ci_last_regenerate|i:1504743535;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('cb9b1f6925561f13c44e6ad8dccf615ddf83a6fa','127.0.0.1',1516754507,'__ci_last_regenerate|i:1516754250;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('cf1e451e4498fec82fc9f6cd1a81c607e3019da0','127.0.0.1',1517532980,'__ci_last_regenerate|i:1517532880;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d3b4cc972f1924de4e6959831a2a761c48ee0556','127.0.0.1',1516659047,'__ci_last_regenerate|i:1516658781;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d3c1a432e76bb66739581ce4a81d6b2e74e723ac','127.0.0.1',1504036055,'__ci_last_regenerate|i:1504034662;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d3e7c3b04717e468705b200eebbaf2d136ceb2c5','127.0.0.1',1517856883,'__ci_last_regenerate|i:1517856880;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d49bd57a4a310b72b00a756a06fcb933ef80a04e','127.0.0.1',1504038246,'__ci_last_regenerate|i:1504038246;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d6b139d91850cb44ecb36a2648ad6da3a886384d','127.0.0.1',1511845986,'__ci_last_regenerate|i:1511845963;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d6d161953bcdc5e2f3d939d10093e90212492f92','127.0.0.1',1504817082,'__ci_last_regenerate|i:1504817069;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d7019f6f5c875dae231d5b53fa26dfbc04f08011','127.0.0.1',1503960489,'__ci_last_regenerate|i:1503960442;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d91fadfc0c09caa8aee0d2b947f2551a6c3f9470','127.0.0.1',1504817066,'__ci_last_regenerate|i:1504816144;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('da27ead9cbc51ec5c769f8690bbc46b0c2d5fae1','127.0.0.1',1511899472,'__ci_last_regenerate|i:1511899215;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('dab67727afabdbf97279e9589532e5b38949d15c','127.0.0.1',1504757275,'__ci_last_regenerate|i:1504756276;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('dbbc71b57536a7e6e8bbf9091de2ed1e7423fa54','127.0.0.1',1511898716,'__ci_last_regenerate|i:1511898631;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('dc11ecc9ff0a746339807e86c80a3d5700931e9f','127.0.0.1',1504036807,'__ci_last_regenerate|i:1504036130;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('de6b8ae8da5ae5b41de00f667f211445cff980ea','127.0.0.1',1504831370,'__ci_last_regenerate|i:1504831200;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('e01b17b3c1338c6efbc5f2348fdb443aaeea40f7','127.0.0.1',1518536522,'__ci_last_regenerate|i:1518536509;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('e2accb89eb68267b6945a91e15a9b66c311fe2b4','127.0.0.1',1515687833,'__ci_last_regenerate|i:1515687786;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('e3056ac4999819ae2bdf51517cf5776c99e6ce4c','127.0.0.1',1512089329,'__ci_last_regenerate|i:1512089096;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('e352a770463a33d0f85953071b233222f178ae85','127.0.0.1',1504830450,'__ci_last_regenerate|i:1504829453;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('e7f25ec8a2b51b33073a67d0d816e4638b2b4464','127.0.0.1',1504816019,'__ci_last_regenerate|i:1504815662;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('eb6f12f01af98f119b2f20bab8a9be3034e2c566','127.0.0.1',1503955648,'__ci_last_regenerate|i:1503955569;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('ed549f1d11d9c628acf1f9c2330ff49832e26c31','127.0.0.1',1504033221,'__ci_last_regenerate|i:1504033216;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('ed66400a8b9699c53f777e437050e27ac415a628','127.0.0.1',1504814659,'__ci_last_regenerate|i:1504813347;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f2d8356911ad68b51204131ff2969d9ff9bb02d4','127.0.0.1',1504745353,'__ci_last_regenerate|i:1504744278;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f2f2b61f5ed4b41e3455103e85860b0fc9b03b85','127.0.0.1',1504811413,'__ci_last_regenerate|i:1504811413;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f363769d89351d41a5fdc091e1dd1688c8ecce4f','127.0.0.1',1504046617,'__ci_last_regenerate|i:1504046508;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f494d8d849b68a6aae12d99d142a8e74971e8b43','127.0.0.1',1504812322,'__ci_last_regenerate|i:1504811793;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f7be8694c01f523445a7f617e8ac3a93789c0e8d','127.0.0.1',1504826924,'__ci_last_regenerate|i:1504826853;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Deleted Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('f9977bbf0f4a620c9546091566b2f26a2a3892d0','127.0.0.1',1504746380,'__ci_last_regenerate|i:1504746272;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('fa7f6604ab81689207e54632620c0e08f3bcda86','127.0.0.1',1504041769,'__ci_last_regenerate|i:1504039228;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('faddf0f875333901beeb03cbe4c4c311cbfdcb4b','127.0.0.1',1504571772,'__ci_last_regenerate|i:1504568640;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('fb2109dff2733df2bf1ef823efe07553725d34e5','127.0.0.1',1504831709,'__ci_last_regenerate|i:1504831587;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('fbdbd29fb5025bbf8ad8f2297357190608d610ee','127.0.0.1',1516673262,'__ci_last_regenerate|i:1516672593;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('fc514927f79b2231ae1e20a0303fe7628f7b672a','127.0.0.1',1512447601,'__ci_last_regenerate|i:1512446624;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('fcab1fc052bb3c9c447881c542028837bada2b8e','127.0.0.1',1512088554,'__ci_last_regenerate|i:1512088477;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('fcfdcaeea995d00bd70edd95d478259a177ffeaa','127.0.0.1',1504744157,'__ci_last_regenerate|i:1504743867;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('fe010d2a2c03c74ac3c09488cd6148e9e0efcdee','127.0.0.1',1517949472,'__ci_last_regenerate|i:1517948148;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('fe30863605e744483d2a269d712a209f19a0ed92','127.0.0.1',1518536509,'__ci_last_regenerate|i:1518536508;req_url|s:32:\"http://funeraria.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";');
/*!40000 ALTER TABLE `bk_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_settings`
--

DROP TABLE IF EXISTS `bk_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_settings`
--

LOCK TABLES `bk_settings` WRITE;
/*!40000 ALTER TABLE `bk_settings` DISABLE KEYS */;
INSERT INTO `bk_settings` VALUES (1,'skin_colour','blue'),(2,'system_title','Funeraria Shalom'),(3,'system_currency_id','CRC'),(4,'text_align','left-to-right'),(5,'language','es'),(6,'system_email','bookkeeping@example.com'),(7,'currency_placing','before_with_gap'),(8,'financial_year_start','january');
/*!40000 ALTER TABLE `bk_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_transaccion`
--

DROP TABLE IF EXISTS `bk_transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_transaccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio_id` int(11) NOT NULL,
  `servicio_tipo` varchar(45) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `metodo_pago` varchar(45) DEFAULT NULL,
  `realizado_por` int(11) DEFAULT NULL,
  `fecha_pago` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `detalles` varchar(45) DEFAULT NULL,
  `saldo_anterior` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_transaccion`
--

LOCK TABLES `bk_transaccion` WRITE;
/*!40000 ALTER TABLE `bk_transaccion` DISABLE KEYS */;
INSERT INTO `bk_transaccion` VALUES (1,1,'apartado',100000,'A','Prima','efectivo',2,'2018-01-24 01:39:14','',0),(2,1,'contrato',0,'A','Prima','',2,'2018-02-06 20:39:37','',0),(3,1,'apartado',100000,'A','Abono sobre Apartado ','efectivo',2,'2018-02-06 20:42:18',NULL,1900000),(4,1,'apartado',50000,'A','Abono sobre Apartado ','efectivo',2,'2018-02-06 20:48:14',NULL,1800000);
/*!40000 ALTER TABLE `bk_transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_transaccion_log`
--

DROP TABLE IF EXISTS `bk_transaccion_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_transaccion_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaccion` int(11) DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `monto_pagado` double DEFAULT NULL,
  `monto_anterior` double DEFAULT NULL,
  `cuota_anterior` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_transaccion_log`
--

LOCK TABLES `bk_transaccion_log` WRITE;
/*!40000 ALTER TABLE `bk_transaccion_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_transaccion_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_user`
--

DROP TABLE IF EXISTS `bk_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` char(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `role` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_user`
--

LOCK TABLES `bk_user` WRITE;
/*!40000 ALTER TABLE `bk_user` DISABLE KEYS */;
INSERT INTO `bk_user` VALUES (2,'Admin','admin','admin','d033e22ae348aeb5660fc2140aec35850c4da997',1,'admin'),(4,'ventas','ventas','ventas','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,'sales'),(5,'Agente de ventas','1','ventas1','efd3caec4164d2f623709125339228b926ef1d3c',1,'admin'),(6,'Agente de ventas','2','ventas2','efd3caec4164d2f623709125339228b926ef1d3c',1,'admin'),(7,'agente de ventas','3','ventas3','efd3caec4164d2f623709125339228b926ef1d3c',1,'admin');
/*!40000 ALTER TABLE `bk_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_vat`
--

DROP TABLE IF EXISTS `bk_vat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_vat` (
  `vat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `percentage` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`vat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_vat`
--

LOCK TABLES `bk_vat` WRITE;
/*!40000 ALTER TABLE `bk_vat` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_vat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_vendedores`
--

DROP TABLE IF EXISTS `bk_vendedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_vendedores` (
  `id_vendedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) DEFAULT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vendedor`),
  UNIQUE KEY `id_vendedor_UNIQUE` (`id_vendedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_vendedores`
--

LOCK TABLES `bk_vendedores` WRITE;
/*!40000 ALTER TABLE `bk_vendedores` DISABLE KEYS */;
INSERT INTO `bk_vendedores` VALUES (1,'alex','morgan','rodriguez','2017-11-30','2017-11-28 19:51:42',2);
/*!40000 ALTER TABLE `bk_vendedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `control_mensualidad`
--

DROP TABLE IF EXISTS `control_mensualidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `control_mensualidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaccion` int(11) DEFAULT NULL,
  `total_mensualidades` int(11) DEFAULT NULL,
  `mensualidad_actual` int(11) DEFAULT NULL,
  `mensualidades_pendientes` int(11) DEFAULT NULL,
  `monto_pagado` double DEFAULT NULL,
  `fechaPago` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `control_mensualidad`
--

LOCK TABLES `control_mensualidad` WRITE;
/*!40000 ALTER TABLE `control_mensualidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `control_mensualidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `currentBalance` double DEFAULT NULL,
  `interest` double DEFAULT NULL,
  `late_charge` double DEFAULT NULL,
  `typoCuenta` char(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-19 15:09:23
