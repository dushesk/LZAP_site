-- MySQL dump 10.13  Distrib 8.3.0, for Win64 (x86_64)
--
-- Host: localhost    Database: manufacture
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendance` (
  `attendance_id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `clock_in_time` time DEFAULT NULL,
  `clock_out_time` time DEFAULT NULL,
  PRIMARY KEY (`attendance_id`),
  KEY `fk_employee_id_attendance` (`employee_id`),
  CONSTRAINT `fk_employee_id_attendance` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (1,2,'2024-02-02','08:00:00','17:00:00'),(2,3,'2024-05-04','09:00:00','16:00:00'),(3,5,'2023-06-05','08:00:00','14:00:00'),(4,2,'2023-09-03','10:00:00','19:00:00'),(5,2,'2024-03-05','11:00:00','21:30:00'),(6,2,'2024-03-06','10:00:00','13:00:00');
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `name_category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Тарелка'),(2,'Кастрюля'),(3,'Чайник'),(4,'Кружка'),(5,'Ведро'),(6,'Ковш'),(7,'Кофеварка'),(8,'Мантоварка');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `department_id` int NOT NULL AUTO_INCREMENT,
  `department_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `manager_id` int DEFAULT NULL,
  PRIMARY KEY (`department_id`),
  KEY `fk_departments_id_salary` (`manager_id`),
  CONSTRAINT `fk_departments_id_salary` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Отдел продаж',NULL),(2,'Упаковочное отделение',NULL),(3,'Инженерный отдел',NULL),(4,'Художественный отдел',NULL),(5,'Отдел погрузки',NULL),(6,'ИТ-отдел',9);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `employee_personal_info`
--

DROP TABLE IF EXISTS `employee_personal_info`;
/*!50001 DROP VIEW IF EXISTS `employee_personal_info`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `employee_personal_info` AS SELECT 
 1 AS `employee_id`,
 1 AS `user_name`,
 1 AS `last_name`,
 1 AS `first_name`,
 1 AS `middle_name`,
 1 AS `date_of_birth`,
 1 AS `gender`,
 1 AS `position_title`,
 1 AS `department_title`,
 1 AS `hire_date`,
 1 AS `salary`,
 1 AS `contact_number`,
 1 AS `address`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `employee_id` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `position_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `fk_position_id` (`position_id`),
  KEY `fk_department_id` (`department_id`),
  CONSTRAINT `fk_department_id` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
  CONSTRAINT `fk_position_id` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`),
  CONSTRAINT `fk_user_id_employee` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Администратор',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(2,'Ильин','Иван','Гаврилович','1999-05-15','Male',3,5,'2024-03-15',30000.00,NULL,NULL,2),(3,'Попов','Игорь','Михаилович','1998-03-04','Male',2,2,NULL,25000.00,NULL,NULL,3),(4,'Айрапетов','Андрей','Александрович','1996-08-13','Male',8,4,'2019-02-02',35000.00,NULL,NULL,4),(5,'Александров','Олег','Даниилович','1995-09-06','Male',6,3,'2010-09-09',70000.00,'+79080004656',NULL,5),(6,'Даниева','Лалина','Георгиевна','1999-06-09','Female',1,NULL,'2020-09-02',40000.00,NULL,NULL,6),(7,'Лазаньев','Богдан','Григорьевич','2000-03-09','Male',5,NULL,NULL,NULL,NULL,NULL,7),(8,'Клинова','Жаклин','Рустемовна','2001-04-04','Female',8,4,'2023-09-10',35000.00,NULL,NULL,8),(9,'Нежданов','Виталий','Дмитриевич','1999-03-04','Male',9,6,'2022-08-23',60000.00,NULL,NULL,9),(235,'Гузеева','Лариса','Вадимовна',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,29);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `order_info`
--

DROP TABLE IF EXISTS `order_info`;
/*!50001 DROP VIEW IF EXISTS `order_info`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `order_info` AS SELECT 
 1 AS `user_name`,
 1 AS `order_date`,
 1 AS `delivery_date`,
 1 AS `name_product`,
 1 AS `description`,
 1 AS `name_category`,
 1 AS `quantity_ordered`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_products` (
  `order_product_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity_ordered` int DEFAULT NULL,
  PRIMARY KEY (`order_product_id`),
  KEY `fk_product_id_order_products` (`product_id`),
  KEY `fk_order_id_order_products` (`order_id`),
  CONSTRAINT `fk_order_id_order_products` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  CONSTRAINT `fk_product_id_order_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_products`
--

LOCK TABLES `order_products` WRITE;
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;
INSERT INTO `order_products` VALUES (1,1,1,50),(2,2,3,50),(3,3,4,45),(4,4,3,80),(5,5,2,34),(6,6,1,20),(7,6,2,55),(8,1,2,55);
/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `supplier_id` int DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_supplier_id_order` (`supplier_id`),
  CONSTRAINT `fk_supplier_id_order` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'2024-05-09','2024-05-29'),(2,1,'2024-03-02','2024-03-21'),(3,2,'2024-03-02','2024-03-21'),(4,2,'2024-02-12','2024-02-21'),(5,2,'2024-01-12','2024-02-01'),(6,3,'2024-01-12','2024-02-01');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `positions` (
  `position_id` int NOT NULL AUTO_INCREMENT,
  `position_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,'Эмалировщик',NULL),(2,'Слесарь-сантехник',NULL),(3,'Грузчик',NULL),(4,'Резчик холодного металла',NULL),(5,'Завальцовщик',NULL),(6,'Ведущий инженер','электроник'),(7,'Оператор станков с ЧПУ',NULL),(8,'Художник росписи по эмали',NULL),(9,'Программист',NULL);
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `production`
--

DROP TABLE IF EXISTS `production`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `production` (
  `production_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `employee_id` int DEFAULT NULL,
  `quantity_produced` int DEFAULT NULL,
  `date_produced` date DEFAULT NULL,
  PRIMARY KEY (`production_id`),
  KEY `fk_product_id_production` (`product_id`),
  KEY `fk_employee_id_production` (`employee_id`),
  CONSTRAINT `fk_employee_id_production` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`),
  CONSTRAINT `fk_product_id_production` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `production`
--

LOCK TABLES `production` WRITE;
/*!40000 ALTER TABLE `production` DISABLE KEYS */;
INSERT INTO `production` VALUES (1,2,6,100,'2024-03-05'),(2,4,4,40,'2024-02-03'),(3,6,8,50,'2024-04-23');
/*!40000 ALTER TABLE `production` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name_product` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_category_id_product` (`category_id`),
  CONSTRAINT `fk_category_id_product` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Заварочный чайник','С-2707АП',3),(2,'Чайник','С-2711АП',3),(3,'Кофеварка','С-4103АП',7),(4,'Блюдо','С-0810',1),(5,'Кружка','С-0102',4),(6,'Кружка со сливным носиком','С-0105БСЛ',4),(7,'Миска','С-0306',1),(8,'Мантоварка','С-2220',8),(9,'Ковш','С-2008',6);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(40) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'employee'),(3,'supplier'),(4,'manager'),(5,'director');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `supplier_id` int NOT NULL AUTO_INCREMENT,
  `name_supplier` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `fk_user_id_suppliers` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'OZON','+79085554433','г. Пермь, ул. Карпинского, д. 49, к. 2, ст. а',10),(2,'DNS','+79502223344','г. Пермь, ул. Мира, д. 8',11),(3,'Wildberries','+79129998877','г. Пермь, ул. Формовщиков, д. 1',12);
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `role_id` int NOT NULL DEFAULT '2',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`user_name`),
  KEY `users_roles_FK` (`role_id`),
  CONSTRAINT `users_roles_FK` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin',1),(2,'iv_ilin','kapone_sad000',2),(3,'ig_pop','tr_ashsong111',2),(4,'an_airapetov','romb_abba1234',2),(5,'ol_alexander','d!zzy_fromXXX44',2),(6,'la_daniva','ja_kothebest374',2),(7,'ba_lasagna','pls_meowback385',2),(8,'jo_klein','friensenjung31',2),(9,'wi_ndows95man','nor_ules358',2),(10,'ozon','ruki_zagrebuki00',3),(11,'dns','alien_dns11',3),(12,'wildberries','vlad_boris33',3),(26,'lkl','klkl',3),(29,'lady_gaga','coolStar',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `employee_personal_info`
--

/*!50001 DROP VIEW IF EXISTS `employee_personal_info`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `employee_personal_info` AS select `employees`.`employee_id` AS `employee_id`,`users`.`user_name` AS `user_name`,`employees`.`last_name` AS `last_name`,`employees`.`first_name` AS `first_name`,`employees`.`middle_name` AS `middle_name`,`employees`.`date_of_birth` AS `date_of_birth`,`employees`.`gender` AS `gender`,`positions`.`position_title` AS `position_title`,`departments`.`department_title` AS `department_title`,`employees`.`hire_date` AS `hire_date`,`employees`.`salary` AS `salary`,`employees`.`contact_number` AS `contact_number`,`employees`.`address` AS `address` from (((`employees` left join `positions` on((`employees`.`position_id` = `positions`.`position_id`))) left join `departments` on((`employees`.`department_id` = `departments`.`department_id`))) left join `users` on((`employees`.`user_id` = `users`.`user_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `order_info`
--

/*!50001 DROP VIEW IF EXISTS `order_info`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `order_info` AS select `users`.`user_name` AS `user_name`,`orders`.`order_date` AS `order_date`,`orders`.`delivery_date` AS `delivery_date`,`products`.`name_product` AS `name_product`,`products`.`description` AS `description`,`categories`.`name_category` AS `name_category`,`order_products`.`quantity_ordered` AS `quantity_ordered` from (((((`users` join `suppliers` on((`users`.`user_id` = `suppliers`.`user_id`))) join `orders` on((`suppliers`.`supplier_id` = `orders`.`supplier_id`))) join `order_products` on((`orders`.`order_id` = `order_products`.`order_id`))) join `products` on((`order_products`.`product_id` = `products`.`product_id`))) left join `categories` on((`products`.`category_id` = `categories`.`category_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-24 14:14:41
