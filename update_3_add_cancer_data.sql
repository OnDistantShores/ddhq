# Sequel Pro dump
# Version 2492
# http://code.google.com/p/sequel-pro
#
# Host: 127.0.0.1 (MySQL 5.6.24)
# Database: simple-quiz
# Generation Time: 2015-07-04 17:17:22 +0000
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cancer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cancer`;

CREATE TABLE `cancer` (
  `Year` int(4) DEFAULT NULL,
  `Sex` varchar(7) DEFAULT NULL,
  `Type` varchar(9) DEFAULT NULL,
  `Cancer_Type` varchar(36) DEFAULT NULL,
  `Age_0_to_4` int(3) DEFAULT NULL,
  `Age_5_to_9` int(2) DEFAULT NULL,
  `Age_10_to_14` int(2) DEFAULT NULL,
  `Age_15_to_19` int(3) DEFAULT NULL,
  `Age_20_to_24` int(3) DEFAULT NULL,
  `Age_25_to_29` int(3) DEFAULT NULL,
  `Age_30_to_34` int(3) DEFAULT NULL,
  `Age_35_to_39` int(3) DEFAULT NULL,
  `Age_40_to_44` int(3) DEFAULT NULL,
  `Age_45_to_49` int(4) DEFAULT NULL,
  `Age_50_to_54` int(4) DEFAULT NULL,
  `Age_55_to_59` int(4) DEFAULT NULL,
  `Age_60_to_64` int(4) DEFAULT NULL,
  `Age_65_to_69` int(4) DEFAULT NULL,
  `Age_70_to_74` int(4) DEFAULT NULL,
  `Age_75_to_79` int(4) DEFAULT NULL,
  `Age_80_to_84` int(4) DEFAULT NULL,
  `Age_85` int(4) DEFAULT NULL,
  `Age_Unknown` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cancer` WRITE;
/*!40000 ALTER TABLE `cancer` DISABLE KEYS */;
INSERT INTO `cancer` (`Year`,`Sex`,`Type`,`Cancer_Type`,`Age_0_to_4`,`Age_5_to_9`,`Age_10_to_14`,`Age_15_to_19`,`Age_20_to_24`,`Age_25_to_29`,`Age_30_to_34`,`Age_35_to_39`,`Age_40_to_44`,`Age_45_to_49`,`Age_50_to_54`,`Age_55_to_59`,`Age_60_to_64`,`Age_65_to_69`,`Age_70_to_74`,`Age_75_to_79`,`Age_80_to_84`,`Age_85`,`Age_Unknown`)
VALUES
	(2011,'Male','Mortality','Acute lymphoblastic leukaemia',1,3,2,7,3,1,1,2,1,2,1,0,10,7,9,5,4,1,0),
	(2011,'Female','Mortality','Acute lymphoblastic leukaemia',1,1,0,0,3,1,0,1,2,1,1,2,7,4,4,2,3,4,0),
	(2011,'Persons','Mortality','Acute lymphoblastic leukaemia',2,4,2,7,6,2,1,3,3,3,2,2,17,11,13,7,7,5,0),
	(2011,'Male','Mortality','Acute myeloid leukaemia',1,0,1,1,2,10,4,1,5,10,13,22,38,54,69,82,79,67,0),
	(2011,'Female','Mortality','Acute myeloid leukaemia',0,1,1,1,2,2,3,4,8,6,15,15,19,39,47,69,61,60,0),
	(2011,'Persons','Mortality','Acute myeloid leukaemia',1,1,2,2,4,12,7,5,13,16,28,37,57,93,116,151,140,127,0),
	(2011,'Male','Mortality','Anal cancer',0,0,0,0,0,0,0,0,0,0,1,0,1,1,0,2,1,2,0),
	(2011,'Female','Mortality','Anal cancer',0,0,0,0,0,0,0,0,0,0,1,1,1,1,3,1,3,3,0),
	(2011,'Persons','Mortality','Anal cancer',0,0,0,0,0,0,0,0,0,0,1,1,1,1,2,1,2,3,0),
	(2011,'Male','Mortality','Bladder cancer',0,0,0,0,0,0,0,0,1,3,13,26,41,65,90,138,155,220,0),
	(2011,'Female','Mortality','Bladder cancer',0,0,0,0,0,0,1,1,1,1,1,4,15,26,34,40,42,113,0),
	(2011,'Persons','Mortality','Bladder cancer',0,0,0,0,0,0,1,1,2,4,14,30,56,91,124,178,197,333,0),
	(2011,'Male','Mortality','Bowel cancer',0,0,0,1,2,10,9,15,25,39,75,111,238,307,329,383,330,345,0),
	(2011,'Female','Mortality','Bowel cancer',0,0,0,1,0,7,5,14,24,51,64,97,136,145,163,245,326,502,0),
	(2011,'Persons','Mortality','Bowel cancer',0,0,0,2,2,17,14,29,49,90,139,208,374,452,492,628,656,847,0),
	(2011,'Male','Mortality','Brain cancer',7,6,2,4,4,5,14,18,33,43,63,70,111,111,90,86,49,43,0),
	(2011,'Female','Mortality','Brain cancer',6,9,3,4,3,3,3,12,21,28,29,56,66,71,62,57,47,33,0),
	(2011,'Persons','Mortality','Brain cancer',13,15,5,8,7,8,17,30,54,71,92,126,177,182,152,143,96,76,0),
	(2011,'Male','Mortality','Breast cancer',0,0,0,0,0,0,0,0,0,0,0,2,4,3,0,4,4,6,0),
	(2011,'Female','Mortality','Breast cancer',0,0,0,0,0,6,17,45,105,176,221,267,335,307,308,269,338,520,0),
	(2011,'Persons','Mortality','Breast cancer',0,0,0,0,0,6,17,45,105,176,221,269,339,310,308,273,342,526,0),
	(2011,'Male','Mortality','Cervical cancer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Female','Mortality','Cervical cancer',0,0,0,0,2,3,5,15,18,20,14,27,29,19,20,18,11,28,0),
	(2011,'Persons','Mortality','Cervical cancer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Male','Mortality','Chronic lymphocytic leukaemia',0,0,0,0,0,0,0,0,0,2,2,5,12,13,34,24,53,57,0),
	(2011,'Female','Mortality','Chronic lymphocytic leukaemia',0,0,0,0,0,0,0,0,1,1,0,3,7,11,12,11,26,72,0),
	(2011,'Persons','Mortality','Chronic lymphocytic leukaemia',0,0,0,0,0,0,0,0,1,3,2,8,19,24,46,35,79,129,0),
	(2011,'Male','Mortality','Chronic myeloid leukaemia',0,0,0,0,0,1,1,3,0,0,1,2,5,7,7,7,7,19,0),
	(2011,'Female','Mortality','Chronic myeloid leukaemia',0,0,0,0,0,0,0,0,0,0,0,0,2,3,5,5,11,12,0),
	(2011,'Persons','Mortality','Chronic myeloid leukaemia',0,0,0,0,0,1,1,3,0,0,1,2,7,10,12,12,18,31,0),
	(2011,'Male','Mortality','Colon cancer',0,0,0,0,1,3,7,10,7,17,32,43,96,139,158,185,192,192,0),
	(2011,'Female','Mortality','Colon cancer',0,0,0,0,0,3,2,9,10,22,28,46,63,81,81,125,199,326,0),
	(2011,'Persons','Mortality','Colon cancer',0,0,0,0,1,6,9,19,17,39,60,89,159,220,239,310,391,518,0),
	(2011,'Male','Mortality','Head and neck excluding lip',0,0,0,0,1,1,4,6,13,26,44,76,100,91,93,79,71,75,0),
	(2011,'Female','Mortality','Head and neck excluding lip',0,0,0,0,0,1,1,3,2,7,5,19,31,30,23,29,38,60,0),
	(2011,'Persons','Mortality','Head and neck excluding lip',0,0,0,0,1,2,5,9,15,33,49,95,131,121,116,108,109,135,0),
	(2011,'Male','Mortality','Head and neck including lip',0,0,0,0,1,1,4,6,13,26,44,76,102,92,95,80,72,79,0),
	(2011,'Female','Mortality','Head and neck including lip',0,0,0,0,0,1,1,3,2,7,5,19,31,31,24,29,38,62,0),
	(2011,'Persons','Mortality','Head and neck including lip',0,0,0,0,1,2,5,9,15,33,49,95,133,123,119,109,110,141,0),
	(2011,'Male','Mortality','Hodgkin lymphoma',0,1,0,1,1,2,1,0,0,1,1,2,4,5,5,7,6,1,0),
	(2011,'Female','Mortality','Hodgkin lymphoma',0,0,0,1,1,1,1,0,1,1,3,0,4,5,2,2,6,6,0),
	(2011,'Persons','Mortality','Hodgkin lymphoma',0,1,0,2,2,3,2,0,1,2,4,2,8,10,7,9,12,7,0),
	(2011,'Male','Mortality','Kidney cancer',1,1,0,0,1,1,0,5,8,19,32,54,74,72,66,60,70,93,0),
	(2011,'Female','Mortality','Kidney cancer',1,0,1,1,0,0,1,3,4,4,8,26,19,33,40,45,54,80,0),
	(2011,'Persons','Mortality','Kidney cancer',2,1,1,1,1,1,1,8,12,23,40,80,93,105,106,105,124,173,0),
	(2011,'Male','Mortality','Laryngeal cancer',0,0,0,0,0,0,0,0,2,2,8,7,23,26,22,27,23,33,0),
	(2011,'Female','Mortality','Laryngeal cancer',0,0,0,0,0,0,0,0,0,1,0,0,8,4,5,5,6,5,0),
	(2011,'Persons','Mortality','Laryngeal cancer',0,0,0,0,0,0,0,0,2,3,8,7,31,30,27,32,29,38,0),
	(2011,'Male','Mortality','Liver cancer',0,2,0,0,1,0,4,10,13,45,80,112,132,114,138,136,117,76,0),
	(2011,'Female','Mortality','Liver cancer',1,1,0,0,1,0,0,4,3,8,15,27,25,45,57,78,79,99,0),
	(2011,'Persons','Mortality','Liver cancer',1,3,0,0,2,0,4,14,16,53,95,139,157,159,195,214,196,175,0),
	(2011,'Male','Mortality','Lung cancer',0,0,0,0,0,2,7,14,27,97,195,346,536,720,777,826,772,640,0),
	(2011,'Female','Mortality','Lung cancer',0,0,0,0,1,1,2,11,32,80,146,231,361,446,458,458,458,470,0),
	(2011,'Persons','Mortality','Lung cancer',0,0,0,0,1,3,9,25,59,177,341,577,897,1166,1235,1284,1230,1110,0),
	(2011,'Male','Mortality','Melanoma of the skin',0,0,0,0,1,9,10,13,32,32,53,80,119,113,138,153,151,167,0),
	(2011,'Female','Mortality','Melanoma of the skin',0,0,0,0,2,4,8,19,18,19,29,36,46,31,42,50,66,103,0),
	(2011,'Persons','Mortality','Melanoma of the skin',0,0,0,0,3,13,18,32,50,51,82,116,165,144,180,203,217,270,0),
	(2011,'Male','Mortality','Mesothelioma',0,0,0,0,0,0,0,0,2,2,14,14,54,75,84,113,87,65,0),
	(2011,'Female','Mortality','Mesothelioma',0,0,0,0,0,0,0,0,0,2,5,6,12,15,13,10,18,15,0),
	(2011,'Persons','Mortality','Mesothelioma',0,0,0,0,0,0,0,0,2,4,19,20,66,90,97,123,105,80,0),
	(2011,'Male','Mortality','Myeloma',0,0,0,0,0,0,0,1,4,9,15,31,39,60,62,74,82,81,0),
	(2011,'Female','Mortality','Myeloma',0,0,0,0,0,1,1,0,2,4,9,19,33,37,53,65,77,95,0),
	(2011,'Persons','Mortality','Myeloma',0,0,0,0,0,1,1,1,6,13,24,50,72,97,115,139,159,176,0),
	(2011,'Male','Mortality','Non-Hodgkin lymphoma',2,0,1,1,1,2,2,5,6,15,23,48,50,85,129,131,139,132,0),
	(2011,'Female','Mortality','Non-Hodgkin lymphoma',0,1,0,1,0,1,1,6,12,6,19,22,37,48,69,87,126,163,0),
	(2011,'Persons','Mortality','Non-Hodgkin lymphoma',2,1,1,2,1,3,3,11,18,21,42,70,87,133,198,218,265,295,0),
	(2011,'Male','Mortality','Non-melanoma skin cancer, all types',0,0,0,0,0,0,0,1,4,6,10,12,31,30,47,50,54,110,0),
	(2011,'Female','Mortality','Non-melanoma skin cancer, all types',0,0,0,0,0,0,0,1,1,1,2,4,5,6,12,15,27,114,0),
	(2011,'Persons','Mortality','Non-melanoma skin cancer, all types',0,0,0,0,0,0,0,2,5,7,12,16,36,36,59,65,81,224,0),
	(2011,'Male','Mortality','Non-melanoma skin cancer, rare types',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Female','Mortality','Non-melanoma skin cancer, rare types',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Persons','Mortality','Non-melanoma skin cancer, rare types',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Male','Mortality','Oesophageal cancer',0,0,0,0,0,2,1,3,9,20,50,85,122,139,122,120,110,120,0),
	(2011,'Female','Mortality','Oesophageal cancer',0,0,0,0,0,0,1,1,1,3,11,13,24,26,54,45,57,91,0),
	(2011,'Persons','Mortality','Oesophageal cancer',0,0,0,0,0,2,2,4,10,23,61,98,146,165,176,165,167,211,0),
	(2011,'Male','Mortality','Ovarian cancer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Female','Mortality','Ovarian cancer',0,1,1,0,3,6,7,7,12,19,66,86,93,114,120,114,111,143,0),
	(2011,'Persons','Mortality','Ovarian cancer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Male','Mortality','Pancreatic cancer',0,1,0,0,0,1,5,6,12,27,58,105,149,181,164,181,174,154,0),
	(2011,'Female','Mortality','Pancreatic cancer',0,0,0,0,0,1,0,4,13,20,45,57,83,135,161,182,224,273,0),
	(2011,'Persons','Mortality','Pancreatic cancer',0,1,0,0,0,2,5,10,25,47,103,162,232,316,325,363,398,427,0),
	(2011,'Male','Mortality','Prostate cancer',0,0,0,0,0,0,0,0,0,6,16,55,140,240,374,529,812,1122,0),
	(2011,'Female','Mortality','Prostate cancer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Persons','Mortality','Prostate cancer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Male','Mortality','Rectal cancer',0,0,0,1,1,7,2,5,18,22,43,68,142,168,171,198,138,153,0),
	(2011,'Female','Mortality','Rectal cancer',0,0,0,1,0,4,3,5,14,29,36,51,73,64,82,120,127,176,0),
	(2011,'Persons','Mortality','Rectal cancer',0,0,0,2,1,11,5,10,32,51,79,119,215,232,253,318,265,329,0),
	(2011,'Male','Mortality','Stomach cancer',0,0,0,0,0,1,1,6,13,18,41,58,70,89,101,121,98,98,0),
	(2011,'Female','Mortality','Stomach cancer',0,0,0,0,1,0,1,9,11,14,23,22,31,34,38,57,63,121,0),
	(2011,'Persons','Mortality','Stomach cancer',0,0,0,0,1,1,2,15,24,32,64,80,101,123,139,178,161,219,0),
	(2011,'Male','Mortality','Testicular cancer',0,0,0,0,1,1,3,3,2,0,2,2,0,0,0,1,1,0,0),
	(2011,'Female','Mortality','Testicular cancer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Persons','Mortality','Testicular cancer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Male','Mortality','Thyroid cancer',0,0,0,0,0,0,1,1,0,2,2,5,3,7,7,6,6,4,0),
	(2011,'Female','Mortality','Thyroid cancer',0,0,0,0,0,0,0,0,0,5,3,4,5,8,9,12,14,12,0),
	(2011,'Persons','Mortality','Thyroid cancer',0,0,0,0,0,0,1,1,0,7,5,9,8,15,16,18,20,16,0),
	(2011,'Male','Mortality','Tongue cancer',0,0,0,0,0,0,0,2,3,7,8,13,20,17,18,9,6,8,0),
	(2011,'Female','Mortality','Tongue cancer',0,0,0,0,0,1,1,1,0,2,0,5,3,9,3,6,7,9,0),
	(2011,'Persons','Mortality','Tongue cancer',0,0,0,0,0,1,1,3,3,9,8,18,23,26,21,15,13,17,0),
	(2011,'Male','Mortality','Unknown primary site',0,0,0,1,0,1,3,11,10,25,39,75,113,132,173,171,216,244,0),
	(2011,'Female','Mortality','Unknown primary site',1,1,0,0,0,3,1,7,13,24,33,40,60,83,105,134,215,347,0),
	(2011,'Persons','Mortality','Unknown primary site',1,1,0,1,0,4,4,18,23,49,72,115,173,215,278,305,431,591,0),
	(2011,'Male','Mortality','Uterine cancer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2011,'Female','Mortality','Uterine cancer',0,0,0,0,0,0,3,4,3,6,11,37,44,42,53,54,66,58,0),
	(2011,'Persons','Mortality','Uterine cancer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `cancer` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
