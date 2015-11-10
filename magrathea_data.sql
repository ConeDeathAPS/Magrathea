-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: magrathea
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `billing_address_1` varchar(255) DEFAULT NULL,
  `billing_address_2` varchar(45) DEFAULT NULL,
  `billing_city` varchar(45) DEFAULT NULL,
  `billing_state` varchar(45) DEFAULT NULL,
  `billing_zip` int(11) DEFAULT NULL,
  `shipping_first_name` varchar(255) DEFAULT NULL,
  `shipping_last_name` varchar(255) DEFAULT NULL,
  `shipping_email` varchar(255) DEFAULT NULL,
  `shipping_address_1` varchar(255) DEFAULT NULL,
  `shipping_address_2` varchar(45) DEFAULT NULL,
  `shipping_city` varchar(45) DEFAULT NULL,
  `shipping_state` varchar(45) DEFAULT NULL,
  `shipping_zip` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (19,'Cosmo','Kramer','cosmo@moocher.com','asdf','asdf','sdf','asdgf',0,'Cosmo','Kramer',NULL,'asdf','asdf','sdf','asdgf',0,'2015-09-04 13:51:24','2015-09-04 13:52:19','pending payment');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_has_products`
--

DROP TABLE IF EXISTS `orders_has_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_has_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_has_orders_orders1_idx` (`order_id`),
  KEY `fk_products_has_orders_products1_idx` (`product_id`),
  CONSTRAINT `fk_products_has_orders_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_orders_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_has_products`
--

LOCK TABLES `orders_has_products` WRITE;
/*!40000 ALTER TABLE `orders_has_products` DISABLE KEYS */;
INSERT INTO `orders_has_products` VALUES (26,1,19,1),(27,7,19,1);
/*!40000 ALTER TABLE `orders_has_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `inventory` int(11) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_types_idx` (`type_id`),
  CONSTRAINT `fk_products_types` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Alderaan','A wonderful planet teeming with oceans and forests. Perfect for your next colony or for development of biological weapons.',499000000000,5,7,'2015-09-01 16:34:50','2015-09-01 16:34:50'),(2,'Tatooine','A hot and unforgiving planet that is suitable for living. The entire planet is a giant desert, so bring your sunscreen to help protect you from the two suns.',399000000000,8,7,'2015-09-01 16:37:30','2015-09-01 16:37:30'),(3,'Pluto','Recently demoted from planet to dwarf, what Pluto lacks in habitability it more than makes up for in resources. With a tremendous amount of ice held beneath its surface, this could provide sustenance for an eternity.',10000000000,7,1,'2015-09-01 16:40:27','2015-09-01 16:40:27'),(4,'Jupiter','Jupiter is an extremely large planet with very little int he way of a solid core. While its atmosphere is insanely toxic, it does contain a large amount of ammonia.',749000000000,1,3,'2015-09-01 16:42:05','2015-09-01 16:42:05'),(5,'Mars','With a bit of terraforming, Mars could be a supremely habitable planet. With evidence of water, the basic elements of amino acids, and reasonable temperatures, Mars is a great destination for a future colony.',299000000000,24,2,'2015-09-01 16:43:23','2015-09-01 16:43:23'),(6,'Neptune','This is a fantastic planet for those seeking helium, hydrogen, or silicate-bearing rock. With a thick atmosphere of He, H, and Methane, Neptune conceals its rocky core made of silicates and nickel-iron deep within.',550000000000,6,3,'2015-09-01 16:49:55','2015-09-01 16:49:55'),(7,'Mercury','Not sure why you would want this planet. Its ridiculous variations in temperature combined with it\'s lack of any meaningful resources make it a stupid purchase.',4599000000,12,4,'2015-09-01 16:55:36','2015-09-01 16:55:36'),(8,'Tau Ceti','This star has the advantages of being only 12 light years away and having significantly less mass than the sun. IT also has a potentially habitable planet orbiting it.',3000000000000,3,6,'2015-09-01 16:59:03','2015-09-01 16:59:03'),(9,'Gliese 229B','This planet could be a star, or it could be a normal planet. It may actually not even exist at all. If you are the betting type, then place your bets here!',349000000000,4,5,'2015-09-01 17:03:26','2015-09-01 17:03:26'),(10,'HD 40307g','This planet is only 42 light years away and would require minimal terraforming! Move your colony here today and get half off your interstellar transportation costs!',649000000000,9,2,'2015-09-01 17:05:43','2015-09-01 17:05:43'),(11,'Saturn','Saturn is a gorgeous planet with a fantastic set of rings. As a gas giant, you\'ll probably only be using it for its great stores of Hydrogen and Helium.',550000000000,8,3,'2015-09-02 11:55:24','2015-09-02 11:55:24'),(12,'Venus','Venus is a harsh planet that could be habitable with lots of terraforming. With an atmosphere of mostly Carbon Dioxide and a surface temperature of 800 degrees, this planet is more suitable for scientific exploration.',149000000000,11,4,'2015-09-02 11:58:56','2015-09-02 11:58:56'),(13,'Uranus','The butt of many jokes, Uranus is a gas giant consisting mainly of the ices of ammonia, methane, and water. Great for getting the resources you need for cleaning and farting.',229000000000,3,3,'2015-09-02 12:01:09','2015-09-02 12:01:09'),(14,'Death Star','The Death Star is a massive space-station/superweapon constructed by the Empire. What it lacks in mobility it more than makes up for it firepower. It is capable of destroying an entire planet with a few moments notice.',469000000000,1,7,'2015-09-02 12:02:52','2015-09-02 12:02:52'),(15,'Gallifrey','Gallifrey is seen as a yellow-orange planet and was close enough to central space lanes for spacecraft to require clearance from Gallifreyan Space Traffic Control as they pass through its system.',299000000000,4,4,'2015-09-02 12:07:36','2015-09-02 12:07:36'),(16,'Hoth','Hoth is a desolate world covered in ice and snow. It is rarely visited, making it a great place for hiding from the Empire, until they find you.',159000000000,6,7,'2015-09-02 12:09:58','2015-09-02 12:09:58'),(17,'Endor','Endor is a lush, forested planet that supplies the death star with its force-field. If you buy Endor along with the Death Star you get 25% both!',499000000000,1,2,'2015-09-02 12:12:04','2015-09-02 12:12:04'),(18,'Coruscant','Coruscant is a vibrant world made of silicate crust with a molten core. It is currently one big city with around 1 trillion inhabitants.',899000000000,2,7,'2015-09-02 12:22:09','2015-09-02 12:22:09'),(19,'Kepler 438b','This planet is very similar to earth in temperature and size. While not confirmed, liquid water could exist on the surface of the planet. It orbits a red dwarf star that is cooler than the sun.',529000000000,4,2,'2015-09-02 12:24:58','2015-09-02 12:24:58'),(20,'PSR J','PSR J is a neutron star that is totally badass. Its mass is 2 times that of the sun, while its radius is only .06 of the sun. It completes one rotation every 40 milliseconds. It\'s surface gravity is so high that you would very quickly reach the speed of light while free-falling towards it. ',49000000000,2,6,'2015-09-02 12:32:37','2015-09-02 12:32:37'),(21,'Ceres','Composed of primarily rock and ice, this planet is too small for colonization and has no real use.',29000000000,8,1,'2015-09-04 13:57:31','2015-09-04 13:57:31'),(22,'Vulcan','This planet was originally used to explain irregularities in Mercury\'s orbit. No other evidence of this planet has ever been found.',15000000,3,5,'2015-09-04 14:01:00','2015-09-04 14:01:00'),(23,'Haumea','Haumea is a very small dwarf-planet orbiting just beyond Neptune. it rotates so rapidly that it actually has an ellipsoidal shape.',2000000000,7,1,'2015-09-04 14:04:18','2015-09-04 14:04:18'),(24,'Polaris','Everyone has seen this star before. It is more commonly known as the North Star. Great for advertising, as the entire northern hemisphere of Earth can see it.',550000000000,2,6,'2015-09-04 14:05:43','2015-09-04 14:05:43'),(25,'Sirius','One of the brightest stars in the sky, Sirius is actually moving closer to the solar system right now.',46000000000,3,6,'2015-09-04 14:07:18','2015-09-04 14:07:18');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Dwarf','2015-09-01 16:32:28','2015-09-01 16:32:28'),(2,'Habitable','2015-09-01 16:32:42','2015-09-01 16:32:42'),(3,'Gas Giant','2015-09-01 16:32:54','2015-09-01 16:32:54'),(4,'Rocky','2015-09-01 16:33:09','2015-09-01 16:33:09'),(5,'Doubtful Existence','2015-09-01 16:33:16','2015-09-01 16:33:16'),(6,'Star','2015-09-01 16:33:27','2015-09-01 16:33:27'),(7,'Far far away','2015-09-01 16:33:33','2015-09-01 16:33:33');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@incharge.com','password','2015-09-04 11:25:12','2015-09-04 11:25:12');
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

-- Dump completed on 2015-09-04 14:42:22
