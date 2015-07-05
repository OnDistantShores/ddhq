# Sequel Pro dump
# Version 2492
# http://code.google.com/p/sequel-pro
#
# Host: 127.0.0.1 (MySQL 5.6.24)
# Database: simple-quiz
# Generation Time: 2015-07-04 10:05:24 +0000
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table geelong_population_projections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `geelong_population_projections`;

CREATE TABLE `geelong_population_projections` (
  `lga11_name` varchar(19) NOT NULL,
  `id_areas` varchar(36) DEFAULT NULL,
  `settlement` varchar(14) NOT NULL,
  `2011` int(5) NOT NULL,
  `2016` int(5) NOT NULL,
  `2021` int(5) NOT NULL,
  `2026` int(5) NOT NULL,
  `2031` int(5) NOT NULL,
  `2036` int(5) NOT NULL,
  `2041` int(6) NOT NULL,
  `2046` int(6) NOT NULL,
  `2051` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `geelong_population_projections` WRITE;
/*!40000 ALTER TABLE `geelong_population_projections` DISABLE KEYS */;
INSERT INTO `geelong_population_projections` (`lga11_name`,`id_areas`,`settlement`,`2011`,`2016`,`2021`,`2026`,`2031`,`2036`,`2041`,`2046`,`2051`)
VALUES
	('Greater Geelong (C)','Armstrong Creek Growth Area','0',312,286,295,296,328,370,406,463,582),
	('Greater Geelong (C)','Armstrong Creek Growth Area','Geelong',460,3132,9424,18378,27038,38413,48955,57433,61267),
	('Greater Geelong (C)','Barwon Heads - Connewarre - Breamlea','0',555,573,563,556,550,552,548,554,591),
	('Greater Geelong (C)','Barwon Heads - Connewarre - Breamlea','Barwon Heads',3594,4250,4216,4251,4269,4275,4265,4226,4276),
	('Greater Geelong (C)','Bell Park','Geelong',4686,4794,4983,5108,5210,5534,5820,6099,6401),
	('Greater Geelong (C)','Bell Post Hill','0',210,206,205,203,205,214,222,228,230),
	('Greater Geelong (C)','Bell Post Hill','Geelong',4990,4963,4929,4902,4984,5269,5517,5719,5801),
	('Greater Geelong (C)','Belmont','Geelong',14437,15125,15907,16781,17272,18701,20212,22162,25246),
	('Greater Geelong (C)','Clifton Springs','Drysdale',6991,7003,6999,7140,7094,7294,7425,7469,7382),
	('Greater Geelong (C)','Corio','0',70,68,68,68,68,69,71,72,71),
	('Greater Geelong (C)','Corio','Geelong',14964,14820,15301,15804,16269,17144,18014,18665,18751),
	('Greater Geelong (C)','Drysdale','0',703,699,686,685,690,709,730,747,764),
	('Greater Geelong (C)','Drysdale','Drysdale',3820,4127,4934,5503,6382,6750,7134,7505,7882),
	('Greater Geelong (C)','East Geelong','Geelong',3228,3255,3448,3729,3882,4150,4415,4706,5048),
	('Greater Geelong (C)','Geelong - South Geelong - Drumcondra','Geelong',6743,7974,8302,8620,8865,9291,9657,9986,10091),
	('Greater Geelong (C)','Geelong West','Geelong',6567,6496,6609,6567,6522,6447,6343,6380,6801),
	('Greater Geelong (C)','Grovedale - Marshall','Geelong',15872,16733,18498,18994,19420,20381,21179,21874,22318),
	('Greater Geelong (C)','Hamlyn Heights','Geelong',6315,6379,6521,6430,6331,6350,6214,6200,6525),
	('Greater Geelong (C)','Herne Hill - Fyansford','0',154,155,163,170,175,190,210,232,263),
	('Greater Geelong (C)','Herne Hill - Fyansford','Geelong',3547,3986,4494,5568,6514,7668,9057,10512,12470),
	('Greater Geelong (C)','Highton - Ceres','0',320,322,321,318,318,329,335,335,325),
	('Greater Geelong (C)','Highton - Ceres','Geelong',16269,18156,19863,19958,19876,20377,20552,20455,19817),
	('Greater Geelong (C)','Lara','0',639,623,683,789,854,860,870,869,907),
	('Greater Geelong (C)','Lara','Lara',12826,15794,17712,19418,21767,26418,27156,27476,26482),
	('Greater Geelong (C)','Leopold','0',738,765,786,790,797,844,897,912,940),
	('Greater Geelong (C)','Leopold','Leopold',9489,10853,12479,13985,15155,16312,17047,17513,18207),
	('Greater Geelong (C)','Lovely Banks - Batesford - Moorabool','0',1645,1659,1736,1880,1934,2056,2180,2322,2525),
	('Greater Geelong (C)','Lovely Banks - Batesford - Moorabool','Geelong',1423,1821,2026,2166,2186,2299,2410,2538,2734),
	('Greater Geelong (C)','Manifold Heights','Geelong',2677,2623,2687,2673,2647,2617,2581,2595,2768),
	('Greater Geelong (C)','Newcomb - Moolap','0',696,691,708,731,747,785,813,831,830),
	('Greater Geelong (C)','Newcomb - Moolap','Geelong',4888,4871,5000,5171,5300,5586,5801,5947,5940),
	('Greater Geelong (C)','Newtown','Geelong',9947,10093,10110,10148,10203,10528,10806,11079,11325),
	('Greater Geelong (C)','Norlane - North Shore','Geelong',9094,9273,9460,9732,9936,10464,10915,11255,11390),
	('Greater Geelong (C)','North Geelong - Rippleside','Geelong',3600,3713,4080,4394,4429,4492,4485,4346,3908),
	('Greater Geelong (C)','Ocean Grove','Ocean Grove',12941,14254,15592,16720,17510,19039,20381,21925,24485),
	('Greater Geelong (C)','Portarlington','0',153,170,178,185,179,192,205,218,227),
	('Greater Geelong (C)','Portarlington','Portarlington',3364,3518,3830,4177,4479,4714,4912,5233,5718),
	('Greater Geelong (C)','Rural Bellarine Peninsula','0',1714,1811,1888,2253,2308,2417,2466,2530,2572),
	('Greater Geelong (C)','Rural Bellarine Peninsula','Drysdale',33,1367,2751,4137,5655,6211,6616,7042,7392),
	('Greater Geelong (C)','Rural Bellarine Peninsula','Ocean Grove',152,156,156,184,478,1020,1532,1985,2240),
	('Greater Geelong (C)','Rural Bellarine Peninsula','Point Lonsdale',1015,1162,1342,1522,1718,1959,2146,2334,2491),
	('Greater Geelong (C)','Rural North','0',1581,1595,1635,1664,1681,1742,1839,1968,2281),
	('Greater Geelong (C)','Rural North','Lara',149,149,228,384,485,494,513,545,746),
	('Greater Geelong (C)','St Albans Park','0',30,31,32,34,35,38,40,42,43),
	('Greater Geelong (C)','St Albans Park','Geelong',5088,5183,5295,5358,5387,5627,5771,5899,5965),
	('Greater Geelong (C)','St Leonards - Indented Head','Indented Head',818,853,907,926,999,1137,1158,1090,1035),
	('Greater Geelong (C)','St Leonards - Indented Head','St Leonards',2170,2676,2869,3329,3452,3630,3785,3785,3658),
	('Greater Geelong (C)','Thomson - Breakwater','0',0,0,0,0,0,0,0,0,0),
	('Greater Geelong (C)','Thomson - Breakwater','Geelong',3170,3155,3231,3369,3490,3684,3862,4020,4109),
	('Greater Geelong (C)','Wandana Heights','Geelong',1925,2187,2282,2464,2614,2744,2865,2884,2674),
	('Greater Geelong (C)','Waurn Ponds - Mount Duneed (West)','0',643,642,632,627,631,638,624,585,462),
	('Greater Geelong (C)','Waurn Ponds - Mount Duneed (West)','Geelong',3454,3583,3833,4041,4011,3944,3750,3382,2592),
	('Greater Geelong (C)','Whittington','Geelong',4282,4277,4335,4484,4619,4837,5002,5121,5061),
	('Queenscliffe (B)','','0',5,6,6,7,7,8,8,9,10),
	('Queenscliffe (B)','','Point Lonsdale',2320,2363,2450,2520,2583,2646,2714,2787,2867),
	('Queenscliffe (B)','','Queenscliffe',736,736,747,757,769,784,801,821,844),
	('Surf Coast (S)','','0',1314,1768,1727,1745,3535,5863,8370,11061,13868),
	('Surf Coast (S)','','Jan Juc',4751,4747,4799,5082,5217,5335,5390,5402,5426),
	('Surf Coast (S)','','Torquay',9456,11681,14789,17690,18385,18472,18500,18518,18570);

/*!40000 ALTER TABLE `geelong_population_projections` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
