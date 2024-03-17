-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dream_stones_project
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Poirier-Halley','Hélène','poirier.helene@outlook.fr','02111979Lh#','Dream Stones');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_buy`
--

DROP TABLE IF EXISTS `is_buy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `is_buy` (
  `PRODUCT_ID` int NOT NULL,
  `ORDERS_ID` int NOT NULL,
  `ORDERED_QUANTITY` int DEFAULT NULL,
  PRIMARY KEY (`PRODUCT_ID`,`ORDERS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_buy`
--

LOCK TABLES `is_buy` WRITE;
/*!40000 ALTER TABLE `is_buy` DISABLE KEYS */;
/*!40000 ALTER TABLE `is_buy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `ORDERS_ID` int NOT NULL AUTO_INCREMENT,
  `ORDERS_SHIPPING` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ORDERS_PAYEMENT_MODE` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ORDERS_DELETE_ARTICLE` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ORDERS_NEW_PRICE` decimal(9,2) DEFAULT NULL,
  `ORDER_STATUS` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ORDERS_SHIPPING_FEES` decimal(9,2) DEFAULT NULL,
  `ORDER_CANCELLATION` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ORDERS_TOTAL_PRICE` decimal(9,2) DEFAULT NULL,
  `ORDERS_TOTAL_QUANTITY` int DEFAULT NULL,
  `ORDERS_REF` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ORDERS_DATE` date NOT NULL,
  `ORDERS_QUANTITY` int DEFAULT NULL,
  `USERPROFIL_ID` int NOT NULL,
  PRIMARY KEY (`ORDERS_ID`),
  UNIQUE KEY `ORDERS_NUMBER` (`ORDERS_REF`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (17,'Standard','Carte bancaire',NULL,NULL,'validée',5.00,NULL,75.00,1,'ORD345677','2024-02-24',1,10),(20,'Standard','PayPal',NULL,NULL,'en attente de validation',5.00,NULL,75.00,1,'ORD345678','2024-03-02',1,10),(21,'Express','Carte Bancaire',NULL,NULL,'validée',10.00,NULL,150.00,2,'ORD789012','2024-03-02',2,10),(22,'Standard','Carte Bancaire',NULL,NULL,'en attente de validation',5.00,NULL,75.00,1,'ORD123456','2024-03-02',1,10),(24,'Standard','PayPal',NULL,NULL,'en attente de validation',5.00,NULL,75.00,1,'ORD345622','2024-01-26',1,11),(25,'Express','Carte bancaire',NULL,NULL,'validée',10.00,NULL,150.00,2,'ORD789023','2024-02-02',2,11),(26,'Standard','Carte bancaire',NULL,NULL,'en attente de validation',5.00,NULL,75.00,1,'ORD123424','2024-02-29',1,11),(28,'Standard','Carte bancaire',NULL,NULL,'en attente de validation',5.00,NULL,54.00,1,'ORD123426','2024-03-02',1,11);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `PRODUCT_ID` int NOT NULL AUTO_INCREMENT,
  `PRODUCT_REF` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `PRODUCT_DESC` varchar(750) COLLATE utf8mb4_general_ci NOT NULL,
  `PRODUCT_STOCK` int NOT NULL,
  `PRODUCT_UNIT_PRICE` decimal(9,2) NOT NULL,
  `PRODUCT_ORIGIN_COUNTRY` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `PRODUCT_PICTURE` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `SPL_ID` int NOT NULL,
  `TYPE_ID` int NOT NULL,
  `PRODUCT_NAME` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PRODUCT_COLOR` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`PRODUCT_ID`),
  UNIQUE KEY `PRODUCT_REF` (`PRODUCT_REF`),
  KEY `SPL_ID` (`SPL_ID`),
  KEY `TYPE_ID` (`TYPE_ID`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`SPL_ID`) REFERENCES `supplier` (`SPL_ID`),
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`TYPE_ID`) REFERENCES `type` (`TYPE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (38,'REF002','Pierre de verticalité, le lapis-lazuli aide au dialogue, au chant, à la communication en général. En apportant joie et bonne humeur, elle aide à ne pas sombrer dans un état dépressif. Le lapis-lazuli soulage les maux de têtes, aide à baisser la fièvre, calme la fatigue des yeux et améliore la vision nocturne. Efficace contre les allergies respiratoires, elle apaise l’asthme et les infections pulmonaires. Elle accélère la pousse des cheveux et des ongles, équilibre la thyroïde, fortifie la gorge et soulage les piqûres de moustiques. Spirituellement, elle met en relation avec les guides spirituels, provoque des rêves lucides aidant à leur interprétation et développe le 3ème œil, la clairvoyance.',20,3.00,'Afghanistan','lapis_lazuli.jpg',1,5,'Lapis-lazuli','bleue'),(39,'REF003','Pierre du lâcher-prise et de la connaissance de soi, elle aide à interrompre les pensées incessantes. Elle vient en soutien aux névroses, troubles mentaux et apaise les angoisses. La cyanite est utile pour lutter contre les insomnies et également pour lutter contre l’hypertension. Elle aide aux traitements pathologiques liés à l’ouïe. Spirituellement, c’est une bonne pierre de méditation et d’intuition.',15,10.00,'Madagascar','cyaniteBleue.jpg',1,2,'Cyanite bleue','bleue'),(40,'REF004','Pierre de vérité, l’angélite aide à dire ce que l’on pense. Elle aide à chasser le chagrin des enfants la nuit en les apaisant, aide à prévenir de la dépression post-natale et favorise la patience L’angélite soulage les angines, traite les maux et inflammations de la gorge et les dérèglements du système immunitaire. Spirituellement, elle favorise la conscience des anges, la perception extrasensorielle afin d’établir un contact avec nos guides et anges protecteurs.',8,1.00,'Madagascar','angelite.jpg',1,1,'Angélite','bleue'),(41,'REF005','L’apatite aide à dépasser sa timidité, à s’exprimer plus librement, à faire sortir les émotions refoulées/bloquées tout en douceur. Elle aide à soulager l’arthrose, l’ostéoporose, à la guérison des fractures et réduit l’appétit en soutien à une perte de poids. Spirituellement, l’apatite bleue favorise la clairaudience.',22,2.00,'Madagascar','apatiteBleue.jpg',1,1,'Apatite bleue','bleue'),(42,'REF010','L’aventurine verte régule le stress, évacue les émotions et apporte plus de légèreté en ouvrant le cœur et l’empathie. Elle encourage la persévérance et l’affirmation de soi. L’aventurine est bénéfique sur les maladies de peau, rafraîchissante pour les coups de soleil et les bouffées de chaleur. Elle aide à réguler le rythme cardiaque, prévient des infarctus et aide à la diminution du cholestérol. Elle apporte la chance pour les jeux de hasard.',30,3.00,'Madagascar','aventurineVerte.jpg',1,1,'Aventurine verte','verte'),(43,'REF012','La chrysoprase aide à apaiser la colère et la jalousie. Elle aide à la remise en question face à des attitudes et comportements destructeurs. Elle amène une meilleure clarté d’esprit, calme le mental et protège des cauchemars. La chrysoprase réveille notre enfant intérieur. Anti-infectieuse, détoxifiante et antifongique, elle aide également au niveau de la sphère uro-vaginale. Elle stimule le fonctionnement hépato-biliaire en cas d’abus (alimentaires ou alcool).',6,6.00,'Madagascar','chrysoprase.jpg',1,2,'Chrysoprase','verte'),(44,'REF013','Pierre douce et calmante, elle aide à stabiliser les émotions et dissipe les craintes. La howlite renforce les os, les ongles, les dents, les cheveux, et facilite le drainage des liquides du corps grâce à son effet diurétique et déshydratant. Excellente pour diminuer les œdèmes. Aide à la digestion. Attention : la howlite n’est pas recommandée aux personnes présentant des TCA.',15,2.00,'Madagascar','howlite.jpg',1,2,'Howlite','blanche'),(45,'REF014','Le jade blanc apaise les bavardages incessants du cerveau, aide à faire le vide, apporte calme et sérénité favorisant un sommeil paisible. Il préserve et stimule la vitalité des reins, prévient des cystites, calculs rénaux et aide à réduire l’incontinence. Il est le symbole de pureté et d’innocence.',9,1.00,'Shangaï','jadeBlanc.jpg',1,1,'Jade blanc','blanche'),(46,'REF015','Le cristal de roche est un amplificateur d’énergie. Il intensifie l’aura et améliore l’intuition. Il a un effet « glaçon » sur la fièvre.',3,18.00,'Madagascar','cristalDeRoche.jpg',1,6,'Cristal de roche','blanche'),(47,'REF018','Pierre maternelle, douce, elle convient aux chambres des jeunes enfants pour favoriser le bon sommeil et aide également au sommeil profond et réparateur chez les adultes. Développe les capacités respiratoires en ciblant la cage thoracique et aide à soigner les infections pulmonaires. Spirituellement, elle calme et prépare à la méditation et ouvre en douceur le 3ème œil.',5,4.00,'Madagascar','selenite.jpg',1,1,'Sélénite','blanche'),(48,'REF020','Le grenat rouge aide à sortir de la déprime, la dépression en motivant par son énergie. Elle aide à « rebouger ».Elle apporte volonté et engagement pour des projets ciblés. Utile pour le sang (circulation, immunité, chaleur), fortifie le cœur, apporte une aide précieuse pour les anémies et maladies liées au sang. Elle permet de stimuler les organes reproducteurs. Attention : le grenat rouge est contre-indiqué aux personnes cardiaques, hypertendus, colériques ou dans l’excès de jalousie.',24,5.00,'Madagascar','grenatRouge.jpg',1,2,'Grenat rouge','rouge'),(49,'REF021','La cornaline empêche de s’éparpiller, aide à se reconcentrer sur le moment présent, aide à s’engage énergiquement et à dépasser les difficultés. Elle soutient à la guérison des blessures physiques et émotionnelles liées à la sexualité. Redonne confiance, joie de vivre et éloigne les cauchemars. Purifie les liquides et calme les petites hémorragies. Augmente la libido (confiance, endurance etc.). Chez les femmes, elle agit sur les douleurs pelviennes, la fécondité et aide à l’accouchement. Spirituellement, elle accompagne les morts sur le chemin de l’au-delà et guide l’âme sur le chemin de la réincarnation.',27,3.00,'Madagascar','cornaline.jpg',1,1,'Cornaline','rouge'),(50,'REF025','L\'améthyste est associée à la sérénité, à l\'équilibre et est source de purification, d\'élévation vibratoire, de renouveau.  L\'améthyste incite à la méditation et renforce l\'intuition. Elle aide à nettoyer le mental, chasse les pensées obsessionnelles et aide à maitriser les passions irrationnelles.  Sa présence dans la chambre à coucher favorise un sommeil paisible après des activités intellectuelles intenses. L’améthyste permet de détendre les muscles de la nuque, des épaules, calme les migraines.',2,149.00,'Madagascar','amethyste.jpg',1,4,'Améthyste','violette'),(51,'REF026','La charoite apaise les cauchemars, sors le positifs par les rêves, apaise les troubles compulsifs et aide au lâcher-prise sur des situations imposées. La charoite améliore la circulation sanguine, soutient le système immunitaire, diminue la pression artérielle, libère les sinus et affine le sens olfactif. Spirituellement, elle replace sur le chemin de vie et éloigne les mauvais esprits.',19,16.00,'Madagascar','charoite.jpg',1,1,'Charoite','violette'),(52,'REF030','Celui-ci permet d’aborder les évènements avec recul et de dissoudre les automatismes pour être moins dans le contrôle. Il apporte une bulle de bien-être et de réconfort par l’amour inconditionnel qu’il dégage. Le bois fossile aide à la croissance, protège des fractures, renforce la mémoire et combat la sécheresse lacrymale. Le bois fossile est recommandé pour les personnes âgées par toutes ses vertus.',20,20.00,'Madagascar','boisFossile.jpg',1,5,'Bois fossile','marron'),(53,'REF031','Elle aide à identifier les peurs inconscientes, trouver ou retrouver leurs origines. La chiastolite aide à détendre les crispations de tous genres tels que les crampes nocturnes, cruralgies, grincements de dents etc. Stimule la lactation. Soulage les crises de goutte. Pierre dite « pierre des bénévoles » et de l’action sociale.',32,2.00,'Madagascar','chiastolite.jpg',1,2,'Chiastolite','marron'),(54,'REF033','La bronzite aide à aller de l’avant et à dissiper les pensées négatives. Elle facilite le retour à l’équilibre face aux conflits et redonne de l’énergie suite à une grande fatigue. Pierre des marathoniens, elle améliore la force des membres inférieurs et la circulation sanguine. Elle soulage les douleurs de la prostate et régule les cycles menstruels. Spirituellement, elle diffuse une lumière traversante et apaisante',27,1.00,'Madagascar','bronzite.jpg',1,2,'Bronzite','marron'),(55,'REF036','Le jaspe héliotrope ou jaspe sanguin, éloigne les cauchemars et permet de mieux mémoriser les rêves. Il aide à équilibrer les excès d’émotions. Il purifie le sang et favorise la coagulation et guérison des petites plaies. Soulage les douleurs menstruelles. En association à l’hématite, il aide à soigner les hémorroïdes. Spirituellement, il recentre les corps aurique et protège des entités.',7,10.00,'Madagascar','jaspeHeliotrope.jpg',1,3,'Jaspe héliotrope','verte'),(56,'REF038','Pierre des thérapeutes et des empathes, la labradorite protège les personnes dites « éponges émotionnelles » et hypersensibles des personnes et attaques négatives. Elle stimule les immunités, aide à diminuer l’hypertension, soulage les articulations douloureuses et lutte contre l’épuisement physique et intellectuel (fatigue chronique). Spirituellement, elle développe l’intuition et le potentiel des thérapeutes, fortifie les dons médiumniques et entoure d’un bouclier de lumière purifiant notre être.',3,18.00,'Canada','labradorite.jpg',1,3,'Labradorite','multicolore'),(57,'REF040','Pierre idéale pour retrouver son âme d’enfant, elle renforce la communication affectueuse, libère les charges émotionnelles, dissipe les énergies négatives, colère et emportement pour retrouver plus de bonheur et d’acceptation. L’amazonite dénoue les tensions musculaires et nerveuses, fortifie le cerveau, favorise la bonne irrigation des organes, elle s’avère également efficace contre les déchaussements dentaires.',17,8.00,'Madagascar','amazonite.jpg',1,3,'Amazonite','verte'),(58,'REF007','La malachite soigne la mémoire émotionnelle en faisant circuler les énergies dans tout notre être. Anti-douleurs et anti-inflammatoires, elle aide également à retrouver de la souplesse. Elle favorise la fécondité, est utile pour les cycles menstruels (douleurs, régularité) et aide à retrouver un équilibre sexuel. Spirituellement, la malachite absorbe le négatif et amplifie le positifs (pierre des magnétiseurs). Elle est la pierre protectrice des bébés et enfants.',11,12.00,'Australie','malachite7.jpg',1,1,'Malachite','verte'),(59,'REF008','La moldavite apporte une ouverture puissante du cœur, fais disparaitre les résistances en douceur et ouvre notre esprit à une plus grande perception. Soutien la mémoire et réduit les allergies pulmonaires. Elle développe l’intuition, aide à progresser spirituellement, améliore les capacités d’arts divinatoires et facilite les voyages astrales.',2,45.00,'Madagascar','moldavite.jpg',1,2,'Moldavite','verte'),(60,'REF009','Le péridot aide à sortir et éliminer les émotions négatives telles que la colère, la jalousie, la rancune, la culpabilité etc. (attention, porter la pierre seule et pour un temps bref afin de ne pas ressentir des effets contraire lié au chargement de celle-ci). Elle protège contre la mauvaise influence d’autrui et libères des conflits ancrés. C’est une grande pierre de soin émotionnelle a utiliser pendant une séance de relaxation ou de médiation par exemple. Physiquement, elle aide a traiter et apaiser les problèmes cutanés tel que l’eczéma. Elle renforce l’énergie du foie.',14,6.00,'Afghanistan','peridot.jpg',1,2,'Péridot','verte'),(61,'REF011','La unakite nous aide à nous concentrer sur les priorités du présent, nous redonne de la volonté et une plus grande emprise sur notre vie. Spirituellement, elle nous ancre dans le présent et nous libère des conditionnements du passé. La unakite renforce la structure osseuse, ralentit la décalcification des os et réduit ainsi les problèmes osseux, les fractures et les rhumatismes.',20,3.00,'Madagascar','unakite.jpg',1,1,'Unakite','verte'),(62,'REF001','La sodalite calme, éloigne des pensées de stress et peurs pour nous aider à moins les ressentir. Elle organise nos pensées dans des « tiroirs », nous permettant ainsi de classer nos émotions. La sodalite stimule nos fonctions cérébrales, renforcement du système immunitaire, soutient la santé des glandes thyroïdiennes. Spirituellement, elle active le 6ème chakra et agit sur notre aura.',31,1.00,'Canada','sodalite.jpg',1,2,'Sodalite','bleue'),(63,'REF006','La Turquoise est la pierre protectrice des voyageurs. C’est une pierre qui apporte calme et équilibre émotionnel, aidant à atténuer le stress et l\'anxiété. La turquoise est également associée à la confiance en soi et à l\'estime de soi, aidant à renforcer la conviction en ses propres capacités. Associée à des propriétés anti-inflammatoires elle aide à soulager les douleurs et les inflammations articulaires Elle facilite la méditation et l\'introspection, aidant à élever l\'esprit vers des niveaux de conscience supérieurs.',4,40.00,'États-Unis','turquoiseSleepingBeauty.jpg',1,1,'Turquoise sleeping beauty','bleue'),(64,'REF016','La Labradorite blanche est associée à un apaisement de l\'esprit et à une réduction du stress émotionnel. Elle renforcer la confiance en soi et l\'estime de soi, aidant ainsi à surmonter les doutes et les incertitudes. Elle aide à soulager les tensions physiques, les douleurs musculaires et les raideurs. En favorisant la relaxation, la labradorite blanche contribue à améliorer la qualité du sommeil. Utilisée pour équilibrer les chakras, en particulier le chakra couronne, elle favorise ainsi l\'harmonie énergétique dans le corps.',12,11.00,'Canada','labradoriteBlanche.jpg',1,5,'Labradorite blanche','blanche'),(65,'REF017','La scolécite permet de renouer avec l’amour inconditionnel. Ses douces vibrations ouvrent le chakra du cœur même lorsqu\'il est sclérosé suite à des traumatismes et des souffrances que l’on pensait insurmontables. Elle facilite le pardon en supprimant le besoin de s’accrocher à un passé chargé de rancune et de sentiments de victime ou de coupable. Elle aide à soulager les maux de tête et les migraines, favorise un sommeil réparateur, ce qui peut avoir un impact positif sur la santé physique en général',21,9.00,'Madagascar','scolecite.jpg',1,5,'Scolécite','blanche'),(66,'REF019','Symbole de renaissance et de confiance en la vie, elle favorise l’action. Pierre de convivialité, elle encourage à l’expression de soi. Utile pour une bonne circulation sanguine, elle apaise les saignements, réchauffe et vivifie les personnes frileuses. Le jaspe rouge renforce les organes sexuels, régule les hormones et le désir sexuel.',18,2.00,'Brésil','jaspeRouge.jpg',1,6,'Jaspe rouge','rouge'),(67,'REF022','L’œil de taureau protège les habitations du vol matériel et repousse la magie noire. Protège des pollutions en lien à la terre (gaz, champs magnétiques etc.). Pierre de détente, elle désinhibe et aide à aller vers les autres, aide à avoir de l’audace. Considérée comme pierre des sportifs, elle aide à l’assouplissement, réchauffe et dynamise le corps et soulage les maux du dos.',31,3.00,'Afrique du Sud','oeilDeTaureau.jpg',1,1,'Œil de taureau','rouge'),(68,'REF023','Pierre de protection qui peut éloigner les énergies négatives et offrir une certaine sécurité à son porteur. Le corail rouge est considéré comme une pierre qui aide à stimuler l`\'énergie vitale du corps, ce qui peut se traduire par une sensation de chaleur et de dynamisme. Elle favorise une meilleure circulation sanguine, aidant ainsi à réchauffer les extrémités du corps et à soulager les sensations de froid. Celui-ci permet de renforcer le système immunitaire, aidant ainsi le corps à se défendre contre les infections et les maladies.',9,5.00,'Algérie (Méditerranée)','corailRouge.jpg',1,2,'Corail','rouge'),(69,'REF024','Utilisé pour favoriser un sentiment de stabilité émotionnelle et mentale, ainsi que pour renforcer l\'ancrage spirituel, le jaspe breschia. Il renforce la confiance en soi et le courage, ce qui peut être utile lorsqu\'on est confronté à des défis ou à des situations difficiles aide à garder les pieds sur terre et à rester centré. Soutien la vitalité physique en aidant à renforcer le corps et en favorisant la circulation de l\'énergie dans tout le système.',10,3.00,'Inde','jaspeBreschia.jpg',1,5,'Jaspe breschia','rouge'),(70,'REF035','Pierre d’amour et de consolation, le quartz rose guérit les blessures et peines profondes. Convient parfaitement aux bébés et enfants par sa douceur. Elle lutte contre les insomnies, favorise un sommeil paisible et protège des cauchemars. Le quartz rose permet de soulager la toux, protège les voies respiratoires et soulage les lésions causées par le feu.',20,5.00,'Madagascar','quartzRose.jpg',1,3,'Quartz rose','rose'),(71,'REF037','L’agate cactus stimule la créativité et l\'imagination, ce qui en fait une pierre populaire parmi les artistes et les créateurs. l\'agate cactus est associée à la croissance personnelle et au développement spirituel. Elle peut être utilisée pour soutenir les efforts visant à atteindre de nouveaux objectifs et à élargir ses horizons. Utilisée pour favoriser une connexion plus profonde avec la nature et le monde qui nous entoure. Elle peut être utilisée dans des pratiques de méditation ou de visualisation pour se relier à l\'énergie terrestre. Elle apporte une sensation de fraicheur pour les personnes subissant des bouffées de chaleurs ou la ménopause.',10,6.00,'Brésil','agateKiwi.jpg',1,3,'Agate kiwi','verte'),(72,'REF039','Pierre des bâtisseurs, la pyrite apporte organisation, concentration et créativité. Elle stimule la mémoire et les capacités intellectuelles, permet de garder « la tête sur les épaules ». Pierre d’ancrage, permettant également de garder les pieds sur terre. Elle encourage à l’agrandissement de soi et au juste positionnement en imposant sa place. La pyrite contribue à lutter contre l’anémie, détoxifie le foie, confère de bonne action pour la peau et agit comme anti-inflammatoire sur les infections des voies respiratoires, poumons et orl.',16,8.00,'Espagne','pyrite.jpg',1,3,'Pyrite','jaune'),(73,'REF041','La lépidolite apporte un sommeil profond et réparateur en aidant à lutter contre les insomnies. Elle apaise l’énergie nocturne, diminue les agitations et aide à l’endormissement. Elle permet de lutter contre les changements d’humeur lié à autrui et non souhaité, stabilise la bipolarité et aide à lutter contre les dépendances affectives. Physiquement, elle aide à soulager les maux de tête.',20,3.00,'Brésil','lepidolite.jpg',1,1,'Lépidolite','violette'),(74,'REF027','Anti dépression puissant, l’auralite 23 chasse le négatif, réduit les crises d’angoisse, clarifie le mental et aide en cas d’insomnies. Elle calme les maux de tête et la fatigue des yeux et réduit les spasmes liés aux crises d’angoisse. L’auralite 23 est une pierre de protection, permettant de purifier un lieu et d’y retrouver la sérénité. Spirituellement, elle aide le gardien à délivrer les messages à autrui pour les éclairer sur leur chemin.',20,7.00,'Canada','auralite23.jpg',1,1,'Auralite 23','violette'),(75,'REF028','Lutte contre la dépression en étant un grand soutien émotionnel. Elle calme l’anxiété, les obsessions et aide à libérer du côté négatif d’une relation trop fusionnelle (jalousie, possessivité etc.). La kunzite aide à calmer les sautes d’humeur et pénètre profondément en nous pour apporter du pardon et de l’amour. Elle soulage les névralgies et stimule la fertilité.',20,6.00,'Afghanistan','kunzite.jpg',1,6,'Kunzite','violette'),(76,'REF029','La sugilite est une bonne pierre pour les adolescents, permettant de « garder le cap » en protégeant des excès et des tentations. Elle limite le bavardage stérile de l’esprit et aide à cambrer le tourbillon des pensées. Elle permet d’affiner la compréhension du monde qui nous entoure. Les thérapeutes trouvent en elle protection et visions et l’utilise pour faire passer l’énergie spirituellement dans notre corps physique.',20,4.00,'Afrique du Sud','sugilite.jpg',1,2,'Sugilite','violette'),(77,'REF042','Pierre de protection contre le mauvais œil, l’œil de tigre est un bouclier à effet miroir, il renvoie le négatif à son émetteur. De fait, elle attire la chance. Elle diffuse des énergies positives, favorise la persévérance, dynamise et redonne confiance. L’œil de tigre décontracte le diaphragme, aide à réduire la tension artérielle, diminue les verrues et lutte contre les coliques et les troubles intestinaux.',20,5.00,'Australie','oeilDeTigre.jpg',1,1,'Œil de tigre','marron'),(78,'REF032','Le Shiva Lingam harmonise les énergies du corps physique, ce qui favorise un meilleur équilibre énergétique favorisant la bonne santé et le bien-être général. Elle stimule et vivifie lors des baisses d’énergies sexuelles et aide à débloquer les soucis d’ordre sexuel. Symbole de l\'énergie divine et de la conscience universelle, il est utilisé dans la méditation pour faciliter la connexion avec le divin. Méditer avec un Shiva Lingam peut aider à élever la conscience spirituelle, à développer la spiritualité et à favoriser la croissance spirituelle.',20,4.00,'Madagascar','shivaLingam.jpg',1,1,'Shiva Lingam','marron'),(79,'REF034','La septaria permet de se libérer des mémoires du passé pour aller de l\'avant et d’amener du pardon dans notre vie.  Elle stimule l\'habileté manuelle et la créativité. Elle s’avère utile pour surmonter les blocages créatifs et inspirer de nouvelles idées. La septaria est très appréciée pour sa capacité à magnétiser les énergies du corps.',2,54.00,'Afrique','septaria.jpg',1,5,'Septaria','marron');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `REVIEW_ID` int NOT NULL AUTO_INCREMENT,
  `REVIEW_NOTE` int NOT NULL,
  `REVIEW_DESCRIPTION` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `USERPROFIL_ID` int NOT NULL,
  `PRODUCT_ID` int NOT NULL,
  PRIMARY KEY (`REVIEW_ID`),
  KEY `USERPROFIL_ID` (`USERPROFIL_ID`),
  KEY `PRODUCT_ID` (`PRODUCT_ID`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`USERPROFIL_ID`) REFERENCES `userprofil` (`USERPROFIL_ID`),
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `SPL_ID` int NOT NULL AUTO_INCREMENT,
  `SPL_NAME` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`SPL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'Minérales Do Brasil');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `TYPE_ID` int NOT NULL AUTO_INCREMENT,
  `TYPE_CATEGORY` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`TYPE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'pierres roulées'),(2,'pierres brutes'),(3,'bijoux'),(4,'géodes'),(5,'sphères'),(6,'pointes');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userprofil`
--

DROP TABLE IF EXISTS `userprofil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userprofil` (
  `USERPROFIL_ID` int NOT NULL AUTO_INCREMENT,
  `USERPROFIL_PHONE` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `USERPROFIL_STREET_NAME` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `USERPROFIL_MAIL` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `USERPROFIL_PSEUDO` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `USERPROFIL_ADITTIONAL_ADRESS` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `USERPROFIL_ZIPCODE` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `USERPROFIL_PASSWORD` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `USERPROFIL_CITY` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `USERPROFIL_FIRSTNAME` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `USERPROFIL_NAME` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`USERPROFIL_ID`),
  UNIQUE KEY `USERPROFIL_MAIL` (`USERPROFIL_MAIL`),
  UNIQUE KEY `USERPROFIL_PSEUDO` (`USERPROFIL_PSEUDO`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userprofil`
--

LOCK TABLES `userprofil` WRITE;
/*!40000 ALTER TABLE `userprofil` DISABLE KEYS */;
INSERT INTO `userprofil` VALUES (10,'0602400115','69 rue de la science','poirier.helene@outlook.fr','LNwarrior','Résidence Louis Pasteur','27100','$2y$10$FwFeRGn8e0Ss5.wi3MsbA.Okr5kcA10ulhnyoqB6hvc8q6PAUf8wa','Val-de-Reuil','Hélène','Poirier-Halley'),(11,'0783840082','Beuh Chewing Gum Palace','baguettemagique@eclair.com','QUEENMARY','rue Harry Potter','27100','$2y$10$ztbh24i5QkRzwkXhzo376.aeDqVBn1O3eDOL5Dhy8OmhUQqbGoCga','London','REINE','DENT GLEUH TERRE'),(17,'0602400115','69 rue de la science','heloceinlove@hotmail.fr','BoubouPassion','Résidence Louis Pasteur','27100','$2y$04$49OXUBFN3avuAUcaH/NeQ.y74tAEHKgaaxkJjlJbRveaKcTXS93xq','Val-de-Reuil','Hélène','Poirier-Halley'),(19,'0235859003','42 allée des ages','truc.fou@gmail.com','FoliComplète','résidence des jeunes','27100','$2y$04$D9niFHjRUMWf05VyetPk8OI9lfDLpj/MiAgAl.6wLBhraMGSyZSQC','Val de reuil','Fou','Truc');
/*!40000 ALTER TABLE `userprofil` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-12 15:54:24
