-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: funerariadb
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
  `cremacion` varchar(45) DEFAULT NULL,
  `autopsia` varchar(45) DEFAULT NULL,
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
INSERT INTO `bk_apartados` VALUES (1,1,'si','si','si',1500000,'si','si',90000,0,425000,0,'',NULL,'2017-09-08 00:34:13',2,90000,NULL);
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
INSERT INTO `bk_apartados_account` VALUES (1,'1',1,1500000,495000,1005000,2,'2017-09-08 00:34:13','A',NULL,NULL,1005000);
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
INSERT INTO `bk_contact` VALUES (1,NULL,'alexander','morgan','rodriguez',NULL,'amorgan115@gmail.com','71765072','22278365','88888888',NULL,NULL,NULL,'Bello Horizonte, de la antigua Giacomin 100 metros norte.',NULL,NULL,NULL,NULL,NULL,7,'113710497',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'San José','Escazú','San Rafael'),(2,NULL,'Pedro','Perez','Pesado',NULL,'pedro@perez.com','89995566','87774411','66553322',NULL,NULL,NULL,'Blanco de servantes derecha e izquierda',NULL,NULL,NULL,NULL,NULL,6,'113710498',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'Cartago','Alvarado','Cervantes');
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_contratos`
--

LOCK TABLES `bk_contratos` WRITE;
/*!40000 ALTER TABLE `bk_contratos` DISABLE KEYS */;
INSERT INTO `bk_contratos` VALUES (2,2,2,'2017-09-08 00:40:00','abc','vend1','efectivo','123456','setiembre','','',2500000,50000,425000,'a1','b1','c1','321','nop',NULL),(3,1,2,'2017-09-08 00:41:00','cba','vend2','efectivo','56789','setiembre','','',9000000,125000,1500000,'c1','b1','a1','987','',NULL),(4,1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1500000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_contratos_account`
--

LOCK TABLES `bk_contratos_account` WRITE;
/*!40000 ALTER TABLE `bk_contratos_account` DISABLE KEYS */;
INSERT INTO `bk_contratos_account` VALUES (1,'1',1,1500000,550000,950000,50000,NULL,0,NULL,NULL,2,'2017-09-07 18:22:23','A',NULL,0,'setiembre',950000),(2,'2',2,2500000,425000,2075000,50000,NULL,0,NULL,NULL,2,'2017-09-08 00:40:45','A',NULL,0,'setiembre',2075000),(3,'3',1,9000000,1500000,7500000,125000,NULL,0,NULL,NULL,2,'2017-09-08 00:42:14','A',NULL,0,'setiembre',7500000),(4,'4',1,1500000,0,1500000,NULL,NULL,0,NULL,NULL,2,'2017-09-11 15:31:33','A',NULL,0,NULL,1500000);
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
  `contact_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `monto_abonado` double DEFAULT '0',
  `prima` double DEFAULT NULL,
  `monto_contratos_aplicados` double DEFAULT NULL,
  `contracts_applied` varchar(45) DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `monto_cuota` double DEFAULT NULL,
  `tiempo_servicio` int(11) DEFAULT NULL,
  `cuotas_pagadas` int(11) DEFAULT '0',
  `cuotas_pendientes` int(11) DEFAULT NULL,
  `interes` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `fecha_aplicacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_funecredito_account`
--

LOCK TABLES `bk_funecredito_account` WRITE;
/*!40000 ALTER TABLE `bk_funecredito_account` DISABLE KEYS */;
INSERT INTO `bk_funecredito_account` VALUES (5,3,9,500000,85000,200000,NULL,NULL,215000,42500,12,2,10,2,NULL,'2017-06-20 00:00:00','P',NULL);
/*!40000 ALTER TABLE `bk_funecredito_account` ENABLE KEYS */;
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
INSERT INTO `bk_sessions` VALUES ('009d198802884a3631d501857028e522cd72f14b','127.0.0.1',1504808087,'__ci_last_regenerate|i:1504807884;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('0f60d92ed79bc969624fb9373168772c5c1a3992','127.0.0.1',1504037721,'__ci_last_regenerate|i:1504036866;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('0f795f5917ccc5a19e5474b0994e2e113ce41df0','127.0.0.1',1504808497,'__ci_last_regenerate|i:1504808236;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('111a2fc691ffe28c15297248bfadd701b2a61201','127.0.0.1',1504028464,'__ci_last_regenerate|i:1504028382;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('119a3d494185cb730ae2cb970dced092c4f641df','127.0.0.1',1504654359,'__ci_last_regenerate|i:1504653458;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('130a963d733796b4b297f14a6caa757f2c0fa2c9','127.0.0.1',1503787844,'__ci_last_regenerate|i:1503787844;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('14568d57dbf10d2cc8041ef8fad3eae40d9ad682','127.0.0.1',1505144293,'__ci_last_regenerate|i:1505143893;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('14ce1083c9ade58b3c16192ba84bd46871c8bc82','127.0.0.1',1504037979,'__ci_last_regenerate|i:1504037765;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('14f32c487615a3f2efa815147e862ca7be59bf8d','127.0.0.1',1503959529,'__ci_last_regenerate|i:1503959314;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('17c8bd26e6755ef3ecf3f51052998d259e1153e0','127.0.0.1',1504827503,'__ci_last_regenerate|i:1504827464;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('1dc92d69206a5b75bd305d107021e5cfeb65bb17','127.0.0.1',1504812544,'__ci_last_regenerate|i:1504812324;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('1ea217e23930b4955a7b0ca227e52d5ad06f01a0','127.0.0.1',1504756268,'__ci_last_regenerate|i:1504746698;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('252556094293b576e4b478d040a468bc452bb2d2','127.0.0.1',1504031718,'__ci_last_regenerate|i:1504029455;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('299e8521400dc98116e92201d6b308af240e31eb','127.0.0.1',1505144603,'__ci_last_regenerate|i:1505144498;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('2ad601562d1754c5b32f05e4933732551f5c25a0','127.0.0.1',1504828789,'__ci_last_regenerate|i:1504828185;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('2cb5c6ec8090baae06c7a4ed58789145440e4b9c','127.0.0.1',1503786004,'__ci_last_regenerate|i:1503786004;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('3cfb1cd7a2e2a21f1e7c0d04371725057104fb14','127.0.0.1',1504825998,'__ci_last_regenerate|i:1504822711;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('400f332294370a342ed7e2b3f4b422f7495530eb','127.0.0.1',1504740259,'__ci_last_regenerate|i:1504740216;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('454c56f89b91642ff615cca47d1e54a4b78eac10','127.0.0.1',1503798585,'__ci_last_regenerate|i:1503798585;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('45780dcdb0e0005e33a7412cecf62a460804efb4','127.0.0.1',1503965480,'__ci_last_regenerate|i:1503965467;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('45aba74e9167feaf4a1823a4a10ba6a7fe864c9b','127.0.0.1',1504568535,'__ci_last_regenerate|i:1504568309;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('543891eed538f5c16b41d505e00502f4155f436b','127.0.0.1',1504033314,'__ci_last_regenerate|i:1504033313;'),('55e26ab38a78eabd21622adf711930b7910ef736','127.0.0.1',1504828915,'__ci_last_regenerate|i:1504828797;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('560878acb30f582886e886b32a3d9c95ada6ef07','127.0.0.1',1503787390,'__ci_last_regenerate|i:1503787390;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('57c7e54a6facd49343ab42f6980c3320d2a33572','127.0.0.1',1504043404,'__ci_last_regenerate|i:1504042155;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('5aee250c4d0c7d49082937cbfb1054f5cc9aaad7','127.0.0.1',1504745694,'__ci_last_regenerate|i:1504745694;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('5f5b12e220f86892691813ba9b1b90bdfc0cb8ee','127.0.0.1',1504808584,'__ci_last_regenerate|i:1504808543;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('607a642c96ce26f087b8610ad8c4150e0ec990d5','127.0.0.1',1504563671,'__ci_last_regenerate|i:1504563513;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('6149195e44289b02130c2f9e7157879262ad635c','127.0.0.1',1504031756,'__ci_last_regenerate|i:1504031755;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('61bb4847401e3ba15c0f4f023b6189bd4bfeb30b','127.0.0.1',1504029357,'__ci_last_regenerate|i:1504029088;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('63f03c2d3ea464183d54a5b4a410dba7417059ce','127.0.0.1',1504821937,'__ci_last_regenerate|i:1504821668;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('64a706e13700a63caf5114742b42b19ca87ae94e','127.0.0.1',1503786567,'__ci_last_regenerate|i:1503786567;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('66a00b48839af6e282461a0a2c8d775cac831dbd','127.0.0.1',1504806790,'__ci_last_regenerate|i:1504757289;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('6a469f83353e0043eb68dd5745c9fac9be9be480','127.0.0.1',1504653448,'__ci_last_regenerate|i:1504646952;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('6d10c6469eb3a3657acfd74d7a7fe01da1545d3a','127.0.0.1',1503788160,'__ci_last_regenerate|i:1503788160;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('6e3a3e2cabfffd5651e886f9f30313a31d846e9f','127.0.0.1',1503801296,'__ci_last_regenerate|i:1503801296;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('703a446d7ca95d3efbd4adb2df0b3c64208934f1','127.0.0.1',1503784669,'__ci_last_regenerate|i:1503784669;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('729f5f8865293eae38acb962c9f3b3fe453c8fc7','127.0.0.1',1505143646,'__ci_last_regenerate|i:1505143328;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('78b006bfda60645ce2256d408b53d7eacb64dd63','127.0.0.1',1504821254,'__ci_last_regenerate|i:1504821008;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('796b447ada0a3f0ceff4cebf632a0b550e34e4d0','127.0.0.1',1503801300,''),('80ac03f77612a56655dc008f8ae0d85a353a2f74','127.0.0.1',1504826464,'__ci_last_regenerate|i:1504826413;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('878944970dd4111fedb4240e0e7e791d6c24c483','127.0.0.1',1504043927,'__ci_last_regenerate|i:1504043927;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('883d74dbdd34f1f00927164892762f0f7b4d65ab','127.0.0.1',1504567681,'__ci_last_regenerate|i:1504564374;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('8d6347d93505d3e28eef36873212c128e2880bf5','127.0.0.1',1504038876,'__ci_last_regenerate|i:1504038785;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('8f6ce569edf91082e1aa65d955b8594d57a5f5c8','127.0.0.1',1504745597,'__ci_last_regenerate|i:1504745365;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('8ff40df331063901dbe663b13feba7ec43366918','127.0.0.1',1504811410,'__ci_last_regenerate|i:1504810958;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('9284b31a61e8ff4e29ea578770df52c239885bd3','127.0.0.1',1504564362,'__ci_last_regenerate|i:1504564017;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('93348e3f41efca2b8408444c4f657c38c9fa9daf','127.0.0.1',1504742209,'__ci_last_regenerate|i:1504742204;user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('943227c94bf513d649026709f6c03682e6b2b611','127.0.0.1',1504828159,'__ci_last_regenerate|i:1504827829;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('9464f8e5df06a5e37d0f82f59edd8c1ffe47199e','127.0.0.1',1504028757,'__ci_last_regenerate|i:1504028757;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a15792451732577d76c37e89d1f56bad047f4ebe','127.0.0.1',1504815631,'__ci_last_regenerate|i:1504814666;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a206f8d62a92fe4d0efdb87ad0b0dc01d0a1f0f9','127.0.0.1',1504900631,'__ci_last_regenerate|i:1504900630;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a6806bac84da26bbaf6522e1f725580d4f08cd1c','127.0.0.1',1503790644,'__ci_last_regenerate|i:1503790644;req_url|s:69:\"http://funeraria.local/funeraria/index.php/servicio/servicios/funeral\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a6f593d886f52e7f5b68eac330dcd76d19811689','127.0.0.1',1504043899,'__ci_last_regenerate|i:1504043432;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a72448d7d0d4721ffbd84b63df7e71c40d96635c','127.0.0.1',1504742264,'__ci_last_regenerate|i:1504742257;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('a770eb42697ee3bc22f7c8cc0b03fc52e7a9b398','127.0.0.1',1504563466,'__ci_last_regenerate|i:1504563196;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('aa7cc38ef91d8d895fc7074db84809f4c86e7208','127.0.0.1',1504654474,'__ci_last_regenerate|i:1504654368;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('ba25b7512929f6f793973175f5ff301f3fc97c57','127.0.0.1',1503787036,'__ci_last_regenerate|i:1503787036;user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('bf962fe0e7dc17c6a6914d763ececdcc76def687','127.0.0.1',1504831168,'__ci_last_regenerate|i:1504830824;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('c21041714fe6323617a9b2abc81c83a1713979b1','127.0.0.1',1504822028,'__ci_last_regenerate|i:1504821986;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('c7c36852eb180649b239d28c2bda8900df45eeb3','127.0.0.1',1504571984,'__ci_last_regenerate|i:1504571840;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('ca2ac6bc6b035a8b82bd4ede4b1edf7f89080031','127.0.0.1',1504743772,'__ci_last_regenerate|i:1504743535;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d3c1a432e76bb66739581ce4a81d6b2e74e723ac','127.0.0.1',1504036055,'__ci_last_regenerate|i:1504034662;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d49bd57a4a310b72b00a756a06fcb933ef80a04e','127.0.0.1',1504038246,'__ci_last_regenerate|i:1504038246;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d6d161953bcdc5e2f3d939d10093e90212492f92','127.0.0.1',1504817082,'__ci_last_regenerate|i:1504817069;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d7019f6f5c875dae231d5b53fa26dfbc04f08011','127.0.0.1',1503960489,'__ci_last_regenerate|i:1503960442;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('d91fadfc0c09caa8aee0d2b947f2551a6c3f9470','127.0.0.1',1504817066,'__ci_last_regenerate|i:1504816144;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('dab67727afabdbf97279e9589532e5b38949d15c','127.0.0.1',1504757275,'__ci_last_regenerate|i:1504756276;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('dc11ecc9ff0a746339807e86c80a3d5700931e9f','127.0.0.1',1504036807,'__ci_last_regenerate|i:1504036130;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('de6b8ae8da5ae5b41de00f667f211445cff980ea','127.0.0.1',1504831370,'__ci_last_regenerate|i:1504831200;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('e352a770463a33d0f85953071b233222f178ae85','127.0.0.1',1504830450,'__ci_last_regenerate|i:1504829453;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('e7f25ec8a2b51b33073a67d0d816e4638b2b4464','127.0.0.1',1504816019,'__ci_last_regenerate|i:1504815662;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('eb6f12f01af98f119b2f20bab8a9be3034e2c566','127.0.0.1',1503955648,'__ci_last_regenerate|i:1503955569;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('ed549f1d11d9c628acf1f9c2330ff49832e26c31','127.0.0.1',1504033221,'__ci_last_regenerate|i:1504033216;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('ed66400a8b9699c53f777e437050e27ac415a628','127.0.0.1',1504814659,'__ci_last_regenerate|i:1504813347;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f2d8356911ad68b51204131ff2969d9ff9bb02d4','127.0.0.1',1504745353,'__ci_last_regenerate|i:1504744278;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f2f2b61f5ed4b41e3455103e85860b0fc9b03b85','127.0.0.1',1504811413,'__ci_last_regenerate|i:1504811413;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f363769d89351d41a5fdc091e1dd1688c8ecce4f','127.0.0.1',1504046617,'__ci_last_regenerate|i:1504046508;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f494d8d849b68a6aae12d99d142a8e74971e8b43','127.0.0.1',1504812322,'__ci_last_regenerate|i:1504811793;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f7be8694c01f523445a7f617e8ac3a93789c0e8d','127.0.0.1',1504826924,'__ci_last_regenerate|i:1504826853;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Deleted Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('f9977bbf0f4a620c9546091566b2f26a2a3892d0','127.0.0.1',1504746380,'__ci_last_regenerate|i:1504746272;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('fa7f6604ab81689207e54632620c0e08f3bcda86','127.0.0.1',1504041769,'__ci_last_regenerate|i:1504039228;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('faddf0f875333901beeb03cbe4c4c311cbfdcb4b','127.0.0.1',1504571772,'__ci_last_regenerate|i:1504568640;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('fb2109dff2733df2bf1ef823efe07553725d34e5','127.0.0.1',1504831709,'__ci_last_regenerate|i:1504831587;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('fcfdcaeea995d00bd70edd95d478259a177ffeaa','127.0.0.1',1504744157,'__ci_last_regenerate|i:1504743867;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_transaccion`
--

LOCK TABLES `bk_transaccion` WRITE;
/*!40000 ALTER TABLE `bk_transaccion` DISABLE KEYS */;
INSERT INTO `bk_transaccion` VALUES (1,1,'apartado',425000,'A','Prima','efectivo',2,'2017-09-08 00:34:13','',0),(2,1,'apartado',70000,'A','Abono sobre Apartado ','efectivo',2,'2017-09-08 00:35:47',NULL,1075000),(3,2,'contrato',425000,'A','Prima','efectivo',2,'2017-09-08 00:40:45','',0),(4,3,'contrato',1500000,'A','Prima','efectivo',2,'2017-09-08 00:42:14','',0),(5,4,'contrato',NULL,'A','Prima',NULL,2,'2017-09-11 15:31:33','',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_transaccion_log`
--

LOCK TABLES `bk_transaccion_log` WRITE;
/*!40000 ALTER TABLE `bk_transaccion_log` DISABLE KEYS */;
INSERT INTO `bk_transaccion_log` VALUES (3,5,600000,370000,350000,NULL,'2017-07-05 00:00:00'),(4,6,600000,390000,370000,NULL,'2017-07-05 00:00:00'),(5,7,600000,432500,390000,NULL,'2017-07-05 00:00:00'),(6,8,500000,42500,0,NULL,'2017-07-05 00:00:00'),(7,9,20000,10000,0,NULL,'2017-07-05 00:00:00'),(8,10,20000,15000,10000,NULL,'2017-07-05 00:00:00'),(9,11,600000,452500,432500,NULL,'2017-07-05 00:00:00'),(10,12,500000,85000,42500,NULL,'2017-07-05 00:00:00'),(11,13,600000,472500,452500,NULL,'2017-07-11 00:00:00'),(12,14,600000,492500,472500,NULL,'2017-07-11 00:00:00'),(13,15,600000,512500,492500,NULL,'2017-07-11 00:00:00');
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

-- Dump completed on 2017-09-11  9:51:27
