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
-- Table structure for table `apartados_account`
--

DROP TABLE IF EXISTS `apartados_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartados_account` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `servicio_id` int(11) DEFAULT NULL,
  `monto_pagado` int(11) DEFAULT NULL,
  `monto_total` int(11) DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartados_account`
--

LOCK TABLES `apartados_account` WRITE;
/*!40000 ALTER TABLE `apartados_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `apartados_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_account`
--

DROP TABLE IF EXISTS `bk_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `balance` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
-- Table structure for table `bk_coffin`
--

DROP TABLE IF EXISTS `bk_coffin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_coffin` (
  `coffin_id` int(11) NOT NULL DEFAULT '0',
  `name` longtext NOT NULL,
  PRIMARY KEY (`coffin_id`)
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
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone2` longtext COLLATE utf8_unicode_ci,
  `phone3` longtext COLLATE utf8_unicode_ci,
  `mobile` longtext COLLATE utf8_unicode_ci,
  `website` longtext COLLATE utf8_unicode_ci,
  `skype_id` longtext COLLATE utf8_unicode_ci,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `country` longtext COLLATE utf8_unicode_ci NOT NULL,
  `city` longtext COLLATE utf8_unicode_ci NOT NULL,
  `state` longtext COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bank_account` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_card` longtext COLLATE utf8_unicode_ci NOT NULL,
  `route` longtext COLLATE utf8_unicode_ci,
  `localization1` longtext COLLATE utf8_unicode_ci NOT NULL,
  `localization2` longtext COLLATE utf8_unicode_ci,
  `localization3` longtext COLLATE utf8_unicode_ci,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `balance` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fee` longtext COLLATE utf8_unicode_ci NOT NULL,
  `month_payment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `year_payment` longtext COLLATE utf8_unicode_ci,
  `incorporation_date` date NOT NULL,
  `advance_payment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `province` longtext COLLATE utf8_unicode_ci NOT NULL,
  `canton` longtext COLLATE utf8_unicode_ci NOT NULL,
  `district` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `bk_contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bk_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_contact`
--

LOCK TABLES `bk_contact` WRITE;
/*!40000 ALTER TABLE `bk_contact` DISABLE KEYS */;
INSERT INTO `bk_contact` VALUES (2,'','water','fasdf','test','','test@tes.com','3232','','','','','','asdfas s','','','','','',2,'32323',NULL,'12','132','32','3434','43433.56','3434','Agosto','2012','2017-05-13','3434',4,'Guanacaste','Hojancha','Huacas'),(3,NULL,'Alex','Morgan','Rodriguez',NULL,'amorgan115@gmail.com','71765072','','',NULL,NULL,NULL,'','','','','','',2,'113710497','1','','','','','','','Enero','','2017-05-30','',5,'Alajuela','Atenas','Escobal');
/*!40000 ALTER TABLE `bk_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_currency`
--

DROP TABLE IF EXISTS `bk_currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `currency_symbol` longtext COLLATE utf8_unicode_ci NOT NULL,
  `currency_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `email_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `task` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email_template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `income_expense_category_id` int(11) NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
-- Table structure for table `bk_income`
--

DROP TABLE IF EXISTS `bk_income`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_income` (
  `income_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `income_expense_category_id` int(11) NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`income_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `income_expense_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`income_expense_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `phrase_id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `en` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bn` longtext COLLATE utf8_unicode_ci NOT NULL,
  `es` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ar` longtext COLLATE utf8_unicode_ci NOT NULL,
  `de` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fr` longtext COLLATE utf8_unicode_ci NOT NULL,
  `it` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ru` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tr` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`phrase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=264 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `name` longtext NOT NULL,
  PRIMARY KEY (`method_payment_id`)
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
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `product_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `bk_productcol` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `vat_id` int(11) NOT NULL,
  `discount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`purchase_id`)
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
  `purchase_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` longtext COLLATE utf8_unicode_ci NOT NULL,
  `purchase_price` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`purchase_item_id`)
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
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `vat_id` int(11) NOT NULL,
  `discount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `sale_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sale_price` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sale_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `death_date` date NOT NULL,
  `death_document` longtext NOT NULL,
  `deceased_name` longtext NOT NULL,
  `deceased_id_card` longtext NOT NULL,
  `deceased_age` longtext NOT NULL,
  `contact_id` int(11) NOT NULL,
  `relationship` longtext NOT NULL,
  `payment_method` longtext NOT NULL,
  `contract_id` longtext NOT NULL,
  `amount` double NOT NULL,
  `balance` double NOT NULL,
  `coffin` longtext NOT NULL,
  `bill` longtext NOT NULL,
  `veiling_room` tinyint(1) DEFAULT '0',
  `transfers` tinyint(1) DEFAULT '0',
  `forgetfulness` longtext NOT NULL,
  `pathology` tinyint(1) DEFAULT '0',
  `technician` longtext NOT NULL,
  `flowers` longtext NOT NULL,
  `cremation` tinyint(1) DEFAULT '0',
  `morgue` longtext NOT NULL,
  `transfer_address` longtext NOT NULL,
  `driver` tinyint(1) DEFAULT '0',
  `float` tinyint(1) DEFAULT '0',
  `transfer_hour` longtext NOT NULL,
  `vault_coffin` longtext NOT NULL,
  `candlestick` longtext NOT NULL,
  `pushcart` longtext NOT NULL,
  `curtain` tinyint(1) DEFAULT '0',
  `transfer_observations` longtext NOT NULL,
  `arrangements` longtext NOT NULL,
  `pedestal` longtext NOT NULL,
  `lectern` tinyint(1) DEFAULT '0',
  `carpet` tinyint(1) DEFAULT '0',
  `service_date` date NOT NULL,
  `service_hour` longtext NOT NULL,
  `church` longtext NOT NULL,
  `cemetery` longtext NOT NULL,
  `service_float` longtext NOT NULL,
  `service_driver` longtext NOT NULL,
  `decoration_float` longtext NOT NULL,
  `decoration_driver` longtext NOT NULL,
  `service_observations` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `veiling_site` longtext NOT NULL,
  `print_date` date DEFAULT NULL,
  PRIMARY KEY (`service_id`),
  KEY `user_id` (`user_id`),
  KEY `contact_id` (`contact_id`),
  CONSTRAINT `bk_service_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `bk_contact` (`contact_id`),
  CONSTRAINT `bk_service_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `bk_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_service`
--

LOCK TABLES `bk_service` WRITE;
/*!40000 ALTER TABLE `bk_service` DISABLE KEYS */;
INSERT INTO `bk_service` VALUES (2,'funerarios','2017-05-04','te','tesadf','sadf','sadfas',2,'','Contrato - Funecrédito','vcxzcv',10000,1212,'Europeo','1212',NULL,1,'1',1,'3223','2',1,'Casa de habitación','xzcvxzcv',1,1,'xzcvz','Merced','2','Nacional',1,'xzcvzvczd','1','2',1,1,'2017-05-27','asdfa','Tibás','Tibás','Nissan','safdasf','Porche','asdfasf','asdfasdf',4,'test','2017-05-26'),(3,'funerarios','2017-05-30','1234','Miguel Morgan','113710498','89',3,'Hijo','Contrato','ERM-1234',700000,0,'Diplomático','0',1,1,'1',1,'Roberto ','2',NULL,'Hogar de ancianos','San Sebastian',1,1,'09:00','Shalom','No','Europea',1,'Todo bien','1','2',NULL,NULL,'0000-00-00','','Tibás','Tibás','Toyota','','Toyota','','',4,'Casa de habitación',NULL);
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
INSERT INTO `bk_sessions` VALUES ('2e6f4b87c63fc73aa8292c0e674596390b200e41','127.0.0.1',1496480488,'__ci_last_regenerate|i:1496480247;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('4c8ac870eb719a6c8f671b342cc91f9a9e4e0ba9','127.0.0.1',1496479292,'__ci_last_regenerate|i:1496479021;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('4e65573cd86bb65271daf971ceacfa6fad3d8df4','127.0.0.1',1496163093,'__ci_last_regenerate|i:1496162896;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";flash_message|s:24:\"Data Created Successfuly\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('86cdb5a58a81ed88d1d3eb9a30e288b9cc6f67c5','127.0.0.1',1496480854,'__ci_last_regenerate|i:1496480554;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('8ed2248edaec64e034e90fd84b84c9913e40daa5','127.0.0.1',1496479930,'__ci_last_regenerate|i:1496479635;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('af10845aeea65f874254650e579b9c68d5a99fa2','127.0.0.1',1496476582,'__ci_last_regenerate|i:1496476550;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('b4e78dff47cb4cbdeb8cf6e546a981edab055f78','127.0.0.1',1496469651,'__ci_last_regenerate|i:1496469624;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('c6a4bd4e13db455cd403635d222f33bcc530c9a1','127.0.0.1',1496478584,'__ci_last_regenerate|i:1496478366;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('ef2b96b23dbd76d6449bee7b2b0a0c5886e2361c','127.0.0.1',1496478919,'__ci_last_regenerate|i:1496478716;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f194ac3150b759c86fa9c8d3b5639d8741ae5c2f','127.0.0.1',1496481554,'__ci_last_regenerate|i:1496481528;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";'),('f68ac18e1ead6cfd627a0a6c7cfabbc0ad942d10','127.0.0.1',1496476927,'__ci_last_regenerate|i:1496476910;req_url|s:25:\"http://fn.local/index.php\";user_id|s:1:\"2\";user_email|s:5:\"admin\";user_first_name|s:5:\"Admin\";user_last_name|s:5:\"admin\";role|s:5:\"admin\";system_currency|s:3:\"CRC\";currency_placing|s:15:\"before_with_gap\";');
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
-- Table structure for table `contratos_account`
--

DROP TABLE IF EXISTS `contratos_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `monto_abonado` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `monto_cuota` double DEFAULT NULL,
  `tiempo_contrato` int(11) DEFAULT NULL,
  `cuotas_pagadas` int(11) DEFAULT NULL,
  `cuotas_pendientes` int(11) DEFAULT NULL,
  `contract_owner` varchar(45) DEFAULT NULL,
  `interes` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `fecha_aplicacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos_account`
--

LOCK TABLES `contratos_account` WRITE;
/*!40000 ALTER TABLE `contratos_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratos_account` ENABLE KEYS */;
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

--
-- Table structure for table `funecredito_account`
--

DROP TABLE IF EXISTS `funecredito_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funecredito_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `prima` double DEFAULT NULL,
  `monto_contratos_aplicados` double DEFAULT NULL,
  `contracts_applied` varchar(45) DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `monto_cuota` double DEFAULT NULL,
  `tiempo_servicio` int(11) DEFAULT NULL,
  `cuotas_pagadas` int(11) DEFAULT NULL,
  `cuotas_pendientes` int(11) DEFAULT NULL,
  `interes` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `fecha_aplicacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funecredito_account`
--

LOCK TABLES `funecredito_account` WRITE;
/*!40000 ALTER TABLE `funecredito_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `funecredito_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacciones`
--

DROP TABLE IF EXISTS `transacciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transacciones` (
  `id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `servicio_tipo` char(2) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `metodo_pago` varchar(45) DEFAULT NULL,
  `realizado_por` int(11) DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacciones`
--

LOCK TABLES `transacciones` WRITE;
/*!40000 ALTER TABLE `transacciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `transacciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_log`
--

DROP TABLE IF EXISTS `transaction_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaccion` int(11) DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `monto_pagado` double DEFAULT NULL,
  `monto_anterior` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_log`
--

LOCK TABLES `transaction_log` WRITE;
/*!40000 ALTER TABLE `transaction_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-08 11:54:03
