-- MySQL dump 10.13  Distrib 8.0.19, for osx10.15 (x86_64)
--
-- Host: localhost    Database: ecrocs
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `shoe_colors`
--

DROP TABLE IF EXISTS `shoe_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shoe_colors` (
  `shoe_id` varchar(10) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `color_hex` varchar(7) NOT NULL,
  `file_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`shoe_id`,`color_name`,`color_hex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoe_colors`
--

LOCK TABLES `shoe_colors` WRITE;
/*!40000 ALTER TABLE `shoe_colors` DISABLE KEYS */;
INSERT INTO `shoe_colors` VALUES ('10001','Army Green','#74794E','product_2'),('10001','Blossom','#EA9EBC','product_4'),('10001','Chocolate','#755F4A','product_1'),('10001','Pool Blue','#7BD1D6','product_3'),('10001','Slate Grey','#4C4C4C','product_0'),('10001','White','#FFFFFF','product_5'),('12132','Khaki','#533E29','product_0'),('204834','Khaki / Cobblestone','#B4A987','product_1'),('204834','Khaki / Cobblestone','#BAB891','product_1'),('204834','Light Grey / Slate Grey','#4C4C4C','product_0'),('204834','Light Grey / Slate Grey','#869181','product_0'),('204834','Navy / Hazelnut','#242D36','product_2'),('204834','Navy / Hazelnut','#97865A','product_2'),('205392','Black / White','#000000','product_2'),('205392','Black / White','#FFFFFF','product_2'),('205392','Charcoal / Volt Green','#494E4A','product_0'),('205392','Charcoal / Volt Green','#7ABE43','product_0'),('205392','Ice Blue / Melon','#9BD3C8','product_1'),('205392','Ice Blue / Melon','#F7AB9B','product_1'),('205392','Navy / Pepper','#242D36','product_3'),('205392','Navy / Pepper','#B1262B','product_3'),('205453','Multi','#000000','product_0'),('205453','White / Multi','#000000','product_1'),('205453','White / Multi','#FFFFFF','product_1'),('205701','Navy / Tan','#242D36','product_1'),('205701','Navy / Tan','#CC9571','product_1'),('205701','Walnut / Expresso','#1A1815','product_0'),('205701','Walnut / Expresso','#4C4331','product_0'),('206062','Black / Slate Grey','#000000','product_0'),('206062','Black / Slate Grey','#4C4C4C','product_0'),('206062','Slate Grey / White','#4C4C4C','product_1'),('206062','Slate Grey / White','#FFFFFF','product_1'),('206074','Ice Blue / Melon','#242D36','product_1'),('206074','Ice Blue / Melon','#CBCEBB','product_1'),('206074','Tan / Tan','#CC9571','product_0'),('206121','Lemon','#E3CC1A','product_1'),('206121','White','#FFFFFF','product_0'),('206242','Black / Slate Grey','#000000','product_2'),('206242','Black / Slate Grey','#4C4C4C','product_2'),('206242','Expresso / Walnut','#1A1815','product_1'),('206242','Expresso / Walnut','#4C4331','product_1'),('206242','Navy / Slate Grey','#242D36','product_0'),('206242','Navy / Slate Grey','#4C4C4C','product_0'),('206520','Multi','#904683','product_0'),('206520','Multi','#E1E91A','product_0'),('206535','White / Multi','#0084D9','product_0'),('206535','White / Multi','#F7302D','product_0');
/*!40000 ALTER TABLE `shoe_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shoe_details`
--

DROP TABLE IF EXISTS `shoe_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shoe_details` (
  `id` int NOT NULL,
  `shoe_id` varchar(10) NOT NULL,
  `details` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`shoe_id`,`details`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoe_details`
--

LOCK TABLES `shoe_details` WRITE;
/*!40000 ALTER TABLE `shoe_details` DISABLE KEYS */;
INSERT INTO `shoe_details` VALUES (1,'10001','Incredibly light and fun to wear'),(1,'12132','Realtree Max-4 HD® camouflage print'),(1,'204834','Slip-on style loafer for easy on and off'),(1,'205392','Incredibly light and fun to wear'),(1,'205453','Incredibly light and fun to wear'),(1,'205701','Lightweight, all-purpose sandal with mesh upper'),(1,'206062','Removable Crocs Reviva™ footbeds with built-in air bubbles provide bounce and a massage effect'),(1,'206074','Woven canvas uppers offer lightweight comfort'),(1,'206121','Incredibly light and fun to wear'),(1,'206242','Incredibly comfortable and lightweight'),(1,'206520','Vibrant tie-dye graphics on the uppers'),(1,'206535','American Flag coloring with stripes on the right and stars on the left'),(2,'10001','Water-friendly and buoyant; weighs only ounces'),(2,'12132','Wide, roomy footbeds with heel-hugging straps'),(2,'204834','Canvas upper offers lightweight comfort'),(2,'205392','Easy to clean and quick to dry'),(2,'205453','Water-friendly and buoyant; weighs only ounces'),(2,'205701','Soft, flexible uppers with ports to shed water and debris'),(2,'206062','Foot-map engineered to deliver precision support and all-day comfort'),(2,'206074','Elastic goring along the sides for easy on and off'),(2,'206121','Easy to clean and quick to dry'),(2,'206242','Soft Matlite™ uppers and toe posts feel broken-in from day one'),(2,'206520','Incredibly light and fun to wear'),(2,'206535','Incredibly light and fun to wear'),(3,'10001','Ventilation ports add breathability and help shed water and debris'),(3,'12132','Ventilation ports offer enhanced breathability'),(3,'204834','Elastic goring along sides for a secure fit'),(3,'205392','Croslite™ foam construction for support and cushioning'),(3,'205453','Ventilation ports add breathability and help shed water and debris'),(3,'205701','Outsole with herringbone pattern provides great traction around water'),(3,'206062','Croslite™ foam construction makes them lightweight and supportive'),(3,'206074','Croslite™ material outsoles and insoles for a custom, form-to-foot fit'),(3,'206121','Croslite™ foam footbeds for lasting comfort'),(3,'206242','Durable, siped Croslite™ outsoles channel water away and boost traction'),(3,'206520','Easy to clean and quick to dry'),(3,'206535','Easy to clean and quick to dry'),(4,'10001','Easy to clean and quick to dry'),(4,'12132','Croslite™ material for maximum lightweight cushioning'),(4,'204834','Tiny nubs along the footbed give your feet a massage-like feel'),(4,'205392','Customizable with Jibbitz™ charms'),(4,'205453','Easy to clean and quick to dry'),(4,'205701','Croslite™ foam construction won’t absorb water'),(4,'206062','Canvas uppers provide 360-degree comfort'),(4,'206074','Dual Crocs Comfort™: Blissfully supportive. Soft. Cradling comfort.'),(4,'206121','Customizable with Jibbitz™ charms'),(4,'206242','Iconic Crocs Comfort™: Lightweight. Flexible. 360-degree comfort.'),(4,'206520','Croslite™ foam footbeds for lasting comfort'),(4,'206535','Croslite™ foam footbeds for lasting comfort'),(5,'10001','Pivoting heel straps for a more secure fit'),(5,'12132','Customizable with Jibbitz™ charms'),(5,'204834','Croslite™ material outsole'),(5,'205392','Iconic Crocs Comfort™: Lightweight. Flexible. 360-degree comfort.'),(5,'205453','Pivoting heel straps for a more secure fit'),(5,'205701','Iconic Crocs Comfort™: Lightweight. Flexible. 360-degree comfort.'),(5,'206062','Slip-on silhouette for easy on and easy off'),(5,'206121','Iconic Crocs Comfort™: Lightweight. Flexible. 360-degree comfort.'),(5,'206520','Customizable with Jibbitz™ charms'),(5,'206535','Customizable with Jibbitz™ charms'),(6,'10001','Customizable with Jibbitz™ charms'),(6,'12132','Iconic Crocs Comfort™: Lightweight. Flexible. 360-degree comfort.'),(6,'205453','Customizable with Jibbitz™ charms'),(6,'206062','Stretch neoprene collar for an accommodating fit'),(6,'206520','Iconic Crocs Comfort™: Lightweight. Flexible. 360-degree comfort.'),(6,'206535','Iconic Crocs Comfort™: Lightweight. Flexible. 360-degree comfort.'),(7,'10001','Iconic Crocs Comfort™: Lightweight. Flexible. 360-degree comfort.'),(7,'205453','Iconic Crocs Comfort™: Lightweight. Flexible. 360-degree comfort.'),(7,'206062','Crocs Reviva™: Revitalizing bounce. Soothing massage. Casual comfort.');
/*!40000 ALTER TABLE `shoe_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shoe_sizes`
--

DROP TABLE IF EXISTS `shoe_sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shoe_sizes` (
  `shoe_id` varchar(10) NOT NULL,
  `size` int NOT NULL,
  PRIMARY KEY (`shoe_id`,`size`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoe_sizes`
--

LOCK TABLES `shoe_sizes` WRITE;
/*!40000 ALTER TABLE `shoe_sizes` DISABLE KEYS */;
INSERT INTO `shoe_sizes` VALUES ('10001',4),('10001',5),('10001',6),('10001',7),('10001',8),('10001',9),('10001',10),('10001',11),('10001',12),('10001',13),('10001',14),('10001',15),('10001',16),('10001',17),('12132',4),('12132',5),('12132',6),('12132',7),('12132',8),('12132',9),('12132',10),('12132',11),('12132',12),('12132',13),('12132',14),('12132',15),('12132',16),('204834',7),('204834',8),('204834',9),('204834',10),('204834',11),('204834',12),('204834',13),('204834',14),('204834',15),('205392',4),('205392',5),('205392',6),('205392',7),('205392',8),('205392',9),('205392',10),('205392',11),('205392',12),('205392',13),('205453',4),('205453',5),('205453',6),('205453',7),('205453',8),('205453',9),('205453',10),('205453',11),('205453',12),('205453',13),('205701',4),('205701',7),('205701',9),('205701',13),('206062',7),('206062',8),('206062',9),('206062',10),('206062',11),('206062',12),('206062',13),('206074',7),('206074',8),('206074',9),('206074',10),('206074',11),('206074',13),('206074',14),('206074',15),('206121',13),('206121',14),('206121',15),('206242',7),('206242',8),('206242',9),('206242',12),('206520',4),('206520',5),('206520',6),('206520',7),('206520',8),('206520',9),('206520',10),('206520',11),('206520',12),('206520',13),('206520',14),('206520',15),('206520',16),('206535',4),('206535',5),('206535',6),('206535',7),('206535',8),('206535',9),('206535',10),('206535',11),('206535',12),('206535',13);
/*!40000 ALTER TABLE `shoe_sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shoes`
--

DROP TABLE IF EXISTS `shoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shoes` (
  `type` varchar(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `desc1` varchar(40) DEFAULT NULL,
  `desc2` varchar(500) DEFAULT NULL,
  `price` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoes`
--

LOCK TABLES `shoes` WRITE;
/*!40000 ALTER TABLE `shoes` DISABLE KEYS */;
INSERT INTO `shoes` VALUES ('Clogs','10001','Classic Clog','Original. Versatile. Comfortable.','It’s the iconic clog that started a comfort revolution around the world! The irreverent go-to comfort shoe that you’re sure to fall deeper in love with day after day. Crocs Classic Clogs offer lightweight Iconic Crocs Comfort™, a color for every personality, and an ongoing invitation to be comfortable in your own shoes.',44.99),('Clogs','12132','Classic Realtree® V2','Original. Versatile. Comfortable.','Wildly comfortable. The Classic Realtree® V2 Clog gives you the signature comfort of Croslite™ material with the rugged style of an authentic Realtree® camouflage print.',44.99),('Loafers','204834','Men’s Santa Cruz Convertible Slip-On','Keep It Casual.','There’s a definite coastal Sunday drive kind of vibe to these slip-ons. They’re even refined enough to wear to the office, though the mood you’ll be stepping into is anything but uptight. With soft and breathable canvas all around, the heels can be folded down for more of a slide experience.',59.99),('Slides','205392','Bayaband Slide','Confidently Comfortable.','What happens when you combine two of Crocs’ most iconic silhouettes, the Baya and the Crocband™, into one special pair? You get the Bayaband Slide, a style that takes the fashion-athletic spirit of the originals to another level. The result is a go-anywhere style staple that lets you slide in and stay cool while throwing off an extra pop of Crocs spirit. And of course, molded Croslite™ construction means you’ll stay comfortable all day long.',34.99),('Clogs','205453','Classic Tie-Dye Graphic Clog','Original. Versatile. Comfortable.','Timeless, fun and full of peaceful good vibes, the bright pops of tie-dye graphics on these clogs are the perfect way to make a groovy style statement. On the go or just hangin’ out. Grounded in comfort, spiked with personality for all ages. From downtime to downtown, these are ready to rock wherever you choose to roll.',44.99),('Sandals','205701','Men’s Swiftwater™ Mesh Wave','Athletic. Adventurous. Amphibious','The Swiftwater™ Wave, one of Crocs’ most active, water-friendly styles to date, is now available with stretchy mesh uppers. Siped outsoles channel water away and improve traction, and large ports offer maximum breathability and drainage. Ride the wave. The river. The waterpark. Anywhere you like to make a splash.',44.99),('Loafers','206062','Men’s Crocs Reviva™ Canvas Slip-On','Relax. Refresh. Revitalize.','Reenergize and put more bounce in your days with the versatile, never fussy, always accommodating Crocs Reviva™ Canvas Slip-On for guys. Foot-map engineered to deliver all-day comfort, the removable Crocs Reviva™ footbeds feature bliss-inducing bubbles that massage while you’re on the go. They’re the perfect choice for breezing through your daily routine and weekend escapes. Effortless and revitalizing — Crocs Reviva™ is your first step toward sensational comfort.',29.99),('Loafers','206074','Men\'s Santa Cruz Downtime Slip-On','Keep It Casual.','What do you do in your downtime? Whatever it is, you’ll need a reliable, comfortable pair of loafers to help you enjoy your time to the fullest. But this slip-on isn’t just for your time off — you’ll love it for everything from casual days in the office to your next weekend getaway. Built on a Croslite™ material sole with woven canvas uppers, the Men\'s Santa Cruz Downtime Slip-On is lightweight and offers all of the comfort you expect from Crocs.',54.99),('Sandals','206121','Classic Crocs Slide','Original. Customizable. Comfortable.','The ever-comfortable Classic II Slide gets the customization upgrade fans have been asking for in the Classic Crocs Slide: holes for Jibbitz™ charms! Each slide has room for 13 charms so you can load up your sandals with tons of personality. Original Croslite™ foam cushion will keep you comfortably supported from the beach to backyard gatherings and beyond. Choose your color and slide into a new favorite!',24.99),('Sandals','206242','Men\'s Swiftwater™ Wave Flip','Athletic. Adventurous. Amphibious','The Swiftwater™ Collection gets even sleeker with the addition of this new men’s flip: the Wave. Ultralightweight and ready for your favorite water-friendly activities, this sandal features soft straps that feel good from the moment you put them on and a contoured footbed that cradles your foot for those long days out in the sun. A siped outsole provides traction around slick surfaces, so ride the next wave in confidence.',29.99),('Slides','206520','Classic Crocs Tie-Dye Graphic Slide','Original. Customizable. Comfortable.','The ever-comfortable Classic II Slide gets the customization upgrade fans have been asking for in the Classic Crocs Slide: holes for Jibbitz™ charms! Each slide has room for 13 charms so you can load up your sandals with tons of personality. Original Croslite™ foam cushion will keep you comfortably supported from the beach to backyard gatherings and beyond. The bright pops of tie-dye graphics on these slides are the perfect way to make a groovy style statement.',29.99),('Slides','206535','Classic Crocs American Flag Slide','Original. Customizable. Comfortable.','The ever-comfortable Classic II Slide gets the customization upgrade fans have been asking for in the Classic Crocs Slide: holes for Jibbitz™ charms! The right slide of this American Flag edition sports the famous stripes, and the left shows off the traditional stars. While loving the USA is a year-round feeling, it’s a good time to consider stocking up for America’s most prideful holidays, including Independence Day, Veterans Day and Memorial Day. Makes a great gift!',29.99);
/*!40000 ALTER TABLE `shoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shoe_id` varchar(10) DEFAULT NULL,
  `color_name` varchar(50) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `shoe_size` int DEFAULT NULL,
  `base_price` double(4,2) DEFAULT NULL,
  `state_tax` double(4,2) DEFAULT NULL,
  `billing_full_name` varchar(128) DEFAULT NULL,
  `billing_phone_number` varchar(12) DEFAULT NULL,
  `billing_email` varchar(128) DEFAULT NULL,
  `billing_addr_1` varchar(128) DEFAULT NULL,
  `billing_city` varchar(128) DEFAULT NULL,
  `billing_state` varchar(128) DEFAULT NULL,
  `billing_zip` varchar(10) DEFAULT NULL,
  `shipping_method` varchar(50) DEFAULT NULL,
  `payment_name` varchar(128) DEFAULT NULL,
  `payment_card` varchar(16) DEFAULT NULL,
  `payment_exp_month` varchar(2) DEFAULT NULL,
  `payment_exp_year` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'10001','Slate Grey',1,1,44.99,0.02,'Joshua K','+16691231234','asdfghjkl@uci.edu','101 Veneto','Irvine',NULL,'92614','Overnight','Tim Apple','1111222233334444','1','2020'),(2,'10001','Slate Grey',1,1,44.99,0.02,'Joshua K','+16691231234','asdfghjkl@uci.edu','101 Veneto','Irvine','CA','92614','Overnight','Tim Apple','1111222233334444','1','2020');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-11 20:34:34
