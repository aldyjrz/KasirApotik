/*
SQLyog Professional v12.4.3 (64 bit)
MySQL - 10.1.19-MariaDB : Database - db_apotik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_apotik` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_apotik`;

/*Table structure for table `master_obat` */

DROP TABLE IF EXISTS `master_obat`;

CREATE TABLE `master_obat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `zat_prekursor` varchar(125) COLLATE latin1_general_ci DEFAULT NULL,
  `harga` int(100) DEFAULT NULL,
  `diskon` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `harga_beli` int(100) DEFAULT NULL,
  `satuan` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `bentuk` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `produksi` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `kategori` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  UNIQUE KEY `id_3` (`id`),
  KEY `nama_obat` (`nama_obat`),
  KEY `nama_obat_2` (`nama_obat`,`harga`),
  KEY `nama_obat_3` (`nama_obat`,`produksi`,`created_date`),
  KEY `id` (`id`,`nama_obat`,`harga`,`satuan`,`produksi`,`created_date`),
  KEY `ea` (`nama_obat`,`harga`,`satuan`,`produksi`,`created_date`,`kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=4194 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `master_obat` */

insert  into `master_obat`(`id`,`nama_obat`,`zat_prekursor`,`harga`,`diskon`,`harga_beli`,`satuan`,`bentuk`,`produksi`,`created_date`,`kategori`) values 
(8,'ABSOLUTE FEMINIME HYGIENE 150ML','TEST 123',31000,'7',0,'BOTOL','CAIR','ANTARMITRA SEMBADA, PT.','2022-05-18 09:03:54','luar'),
(10,'ACIFAR CREAM','',6662,'4',0,'TUBE','','KOKOH JAYA PERSADA, PT.','2024-04-12 09:03:19','dalam'),
(16,'ACLONAC 50MG TAB','',27000,'',0,'BOX/30','','ANTARMITRA SEMBADA, PT.','2022-04-08 09:12:57','dalam'),
(17,'ACNE AID BAR 100GR','',0,'',NULL,'BOX/1','','','2024-06-06 00:00:00',NULL),
(19,'ACNE FELDIN LOTION','',35000,'',NULL,'BOTOL','','PT. GALENIUM PHARMASIA LABORATORIES','2024-06-06 00:00:00',NULL),
(20,'ACNES CREAMY WASH 50GR','',16300,'',NULL,'TUBE','','KEBAYORAN PHARMA, PT.','2024-06-04 11:16:25','luar'),
(21,'ACNES FC SEALING JELL 9GR ','',18900,'14',NULL,'TUBE','','KEBAYORAN PHARMA, PT.','2023-09-16 23:54:49','luar'),
(22,'ACNOL LOTION 10ML','',14000,'',NULL,'BOTOL','','ENSEVAL PUTERA MEGATRADING, TBK, PT.','2023-07-15 10:41:40','luar'),
(23,'ACPULSIF TAB 5MG BOX','',190000,'',NULL,'BOX/50','','ANUGRAH ARGON MEDICA, PT.','2022-10-10 02:12:03','dalam'),
(24,'ACTIFED PLUS EXPC 60ML (HIJAU)','PSEUDEOEPHEDRINE HCL',52414,'',NULL,'BOTOL','SIRUP, 30MG/5ML','BINTANG MEDIKA BEKASI FARMA, PT.','2023-01-22 21:32:56','luar'),
(25,'ACTIFED 60ML (ORANGE)','PSEUDEOEPHEDRINE HCL',52400,'',NULL,'BOTOL','SIRUP, 30MG/5ML','KOKOH JAYA PERSADA, PT.','2023-07-09 07:06:37','luar'),
(26,'ACTIFED PLUS COUGH 60ML (MERAH)','PSEUDEOEPHEDRINE HCL',52400,'',NULL,'BOTOL','SIRUP, 30MG/5ML','BINTANG MEDIKA BEKASI FARMA, PT.','2023-03-26 09:35:44','luar'),
(27,'ACYCLOVIR 5% 5GR (IDF)','',3295,'',NULL,'TUBE','','INDOFARMA GLOBAL MEDIKA, PT.','2022-03-27 22:48:50','dalam'),
(28,'ACYCLOVIR TAB 400MG BOX (KF)','',93593,'2.5',NULL,'BOX/100','','KIMIA FARMA TRADING AND DISTRIBUTION, PT.','2022-05-06 09:46:19','dalam'),
(29,'ACYCLOVIR TAB 400MG (NOVELL)','',97410,'',0,'BOX/100','','0','2024-10-04 02:42:00','dalam'),
(30,'ADALAT 10 MG ISI 50','',0,'',NULL,'BOX/50','','','2024-06-06 00:00:00',NULL),
(31,'ADALAT OROS 20','',84500,'',NULL,'STRIP/10','','PT.BAYER INDONESIA','2024-06-06 00:00:00',NULL),
(32,'ADALAT OROS 30MG BOX','',268824,'',NULL,'BOX/30','','GUNA ABADI WICAKSONO, PT.','2022-02-09 08:49:52','dalam'),
(33,'ADALAT OROS 60MG ISI 30','',0,'',NULL,'BOX/30','','','2024-06-06 00:00:00',NULL),
(34,'ADALAT TABLET 5MG ISI 50','',0,'',NULL,'BOX/50','','','2024-06-06 00:00:00',NULL),
(35,'ADENOSINE TRIPHOSPHATE','',16500,'',NULL,'STRIP/10','','PT. DANKOS FARMA','2024-06-06 00:00:00',NULL),
(36,'ADONA (AC-17)','',28000,'',NULL,'STRIP/10','','PT.TANABE INDONESIA','2024-06-06 00:00:00','dalam'),
(37,'AERIUS','',125000,'',NULL,'STRIP/15','','PT.SCHERING-PLOUGH INDONESIA','2024-06-06 00:00:00',NULL),
(38,'AFIFLEX ','',37000,'',NULL,'TUBE','','PT. AFITSON ','2024-06-06 00:00:00',NULL),
(39,'AKILEN TETES TELINGA','',66950,'',NULL,'BOTOL TETES','','BINA SAN PRIMA, PT.','2023-12-24 07:11:43','dalam'),
(40,'AKRINOR TABLET 100','',0,'',NULL,'BOX/100','','','2024-06-06 00:00:00',NULL),
(41,'AKURAT COMPACT','',0,'',NULL,'DOS/1','','','2024-06-06 00:00:00',NULL),
(42,'AKURAT TES KEHAMILAN','',0,'',NULL,'STRIP/1','','','2024-06-06 00:00:00',NULL),
(43,'ALAT SUNTIK 1,3,5 ML','',3500,'',NULL,'SUNTIKAN','','','2024-06-06 00:00:00',NULL),
(44,'ALBHOTYL CONCENTRATE 10ML','',37000,'',NULL,'BOTOL','','PT. PHAROS','2024-06-06 00:00:00',NULL),
(45,'ALBHOTYL CONCENTRATE 5ML','',23500,'',NULL,'BOTOL','','PT. PHAROS','2024-06-06 00:00:00',NULL),
(46,'ALBOTHYL 5ML','',23000,'20',0,'BOTOL TETES','','COMBI PUTRA, PT.','2022-04-03 08:13:25','dalam'),
(47,'ALCO PLUS SYR 100ML','PSUDEOEPHEDRINE HCL',68250,'',NULL,'BOTOL','SIRUP','BINTANG MEDIKA BEKASI FARMA, PT.','2024-01-06 23:39:07','luar'),
(48,'ALCO DROPS 15ML','PSEUDEOEPHEDRINE HCL',95550,'',NULL,'BOTOL TETES','SIRUP, 0.8ML/7.5MG','BINTANG MEDIKA BEKASI FARMA, PT.','2024-01-06 23:39:17','luar'),
(49,'ALDACTONE 25MG','',22000,'',NULL,'STRIP/10','','PT.SOHO INDUSTRI PHARMASI','2024-06-06 00:00:00','dalam'),
(50,'ALEGI TAB BOX','',185000,'2.5',NULL,'BOX/100','','KALLISTA PRIMA, PT.','2024-05-31 08:41:24','dalam'),
(51,'ALEGYSAL','',110000,'',NULL,'BOTOL TETES','','PT. FERRON PAR PHARMACEUTICAL','2024-06-06 00:00:00',NULL),
(52,'ALERTEN','',51500,'',NULL,'CAPSUL/10','','PT.MEGA LIFESCIENCES','2024-06-06 00:00:00',NULL),
(53,'ALINAMIN - F','',10500,'',NULL,'BLISTER/10','','PT. TAKEDA INDONESIA','2024-06-06 00:00:00',NULL),
(54,'ALKOHOL PIM 70% 100ML','',6500,'30.06',NULL,'BOTOL','','KOKOH JAYA PERSADA, PT.','2022-03-03 12:06:59','luar'),
(56,'ALKOHOL IKA 70% 100ML','',15200,'',NULL,'BOTOL','','DISTRIVERSA BUANAMAS, PT.','2022-07-29 14:47:15','luar'),
(57,'ALLERIN EXPECTORAN 120ML','PSEUDEOEPHEDRINE HCL',19707,'',NULL,'BOTOL','SIRUP, 5ML/15MG','ANUGERAH PHARMINDO LESTARI, PT.','2024-03-16 07:06:49','luar'),
(58,'ALLERIN EXPECTORAN 60ML','PSUDEOEPHEDRINE HCL',10750,'',NULL,'BOTOL','SIRUP','ANUGERAH PHARMINDO LESTARI, PT.','2024-01-12 00:14:40','luar'),
(59,'ALLERON TAB 4MG BOX','',20720,'',NULL,'BOX/100','','KOKOH JAYA PERSADA, PT.','2022-08-08 19:56:30','dalam'),
(4179,'DIPROSTA','',22000,'',NULL,'TUBE','A','MARGA NUSANTARA JAYA, PT.','2024-05-03 08:35:41','dalam'),
(61,'ALLOPURINOL TAB 300MG (HJ)','',50000,'21',NULL,'BOX/100','','ENSEVAL PUTERA MEGATRADING, TBK, PT.','2023-01-09 08:25:51','dalam'),
(62,'ALLORIS TAB BOX','',480000,'',NULL,'BOX/100','','BINA SAN PRIMA, PT.','2022-12-19 13:30:52','dalam'),
(63,'ALOCLAIR PLUS GEL 8ML','',85000,'',NULL,'BOTOL','','ENSEVAL PUTERA MEGATRADING, TBK, PT.','2023-06-02 04:11:20','luar'),
(65,'ALOFAR TAB 300MG BOX','',78588,'12',NULL,'BOX/100','','KOKOH JAYA PERSADA, PT.','2022-10-12 00:22:31','dalam'),
(66,'ALPARA TAB BOX','PHENYLPROPANILAMINE HCL',115000,'17',NULL,'BOX/150','CAPLET, 12.5MG','KOKOH JAYA PERSADA, PT.','2024-03-16 07:09:02','luar'),
(67,'ALPARA SYRUP 60ML','PHENYLPROPANILAMINE HCL',13000,'15',NULL,'BOTOL','SIRUP','COMBI PUTRA, PT.','2022-02-27 10:44:28','luar'),
(68,'ALUPENT MDI','',0,'',NULL,'FLS/10CC','','','2024-06-06 00:00:00',NULL),
(69,'ALUPENT TABLET 20MG','',0,'',NULL,'BOX/100','','','2024-06-06 00:00:00',NULL),
(70,'AMADIAB 1','',25500,'',NULL,'STRIP/10','','PT.LAPI LABORATORIES','2024-06-06 00:00:00',NULL),
(71,'AMADIAB 2','',46000,'',NULL,'STRIP/10','','PT.LAPI LABORATORIES','2024-06-06 00:00:00',NULL),
(72,'AMADIAB 3','',60500,'',NULL,'STRIP/10','','PT.LAPI LABORATORIES','2024-06-06 00:00:00',NULL),
(73,'AMADIAB 4','',74000,'',NULL,'STRIP/10','','PT.LAPI LABORATORIES','2024-06-06 00:00:00',NULL),
(74,'AMAROPO -PLUS- KAPLET 100','',0,'',NULL,'BOX/100','','','2024-06-06 00:00:00',NULL),
(75,'AMARYL TAB 2MG BOX','',341962,'2',NULL,'BOX/50','','ANUGERAH PHARMINDO LESTARI, PT.','2023-01-25 10:01:34','dalam'),
(76,'AMARYL TAB 1MG BOX','',192976,'',NULL,'BOX/50','','ANUGERAH PHARMINDO LESTARI, PT.','2023-01-25 10:01:54','dalam'),
(78,'AMBEVEN TAB BOX','',152500,'5',0,'BOX/100','','ASIA CENTRAL MEDICA, PT.','2024-05-17 08:52:19','luar'),
(79,'AMBROXOL TAB 30MG BOX (NOVAPHARIN)','',9000,'',0,'BOX/100','','ASIA CENTRAL MEDICA, PT.','2022-08-27 08:39:45','dalam'),
(80,'AMBROXOL SYR 60ML (ERELA)','',5180,'',0,'BOTOL','','KOKOH JAYA PERSADA, PT.','2023-01-29 07:58:23','dalam'),
(81,'AMDIXAL 5MG','',52000,'',NULL,'STRIP/10','','PT. SANDOZ INDONESIA','2024-06-06 00:00:00',NULL),
(84,'AMLODIPINE TAB 10MG BOX (DEXA)','',153730,'',0,'BOX/100','','ANUGRAH ARGON MEDICA, PT.','2024-10-28 08:52:23','dalam'),
(85,'AMLODIPINE TAB 5MG BOX (DEXA)','',87272,'',0,'BOX','','ANUGRAH ARGON MEDICA, PT.','2024-10-28 08:52:38','dalam'),
(86,'AMOXICILLIN TAB 500MG BOX (KF)','',38415,'',NULL,'BOX/100','','KIMIA FARMA TRADING & DISTRIBUTION, PT.','2024-11-02 08:51:57','dalam'),
(87,'AMOXICILLIN TAB 500MG ISI 200 (HJ)','',122000,'32',0,'BOX/200','','ENSEVAL PUTERA MEGATRADING, TBK, PT.','2023-10-03 14:32:49','dalam'),
(89,'AMOXICILLIN DS 60ML (BERNO)','',6000,'',NULL,'BOTOL','','PARIT PADANG GLOBAL, PT.','2024-12-17 03:59:33','dalam'),
(90,'AMOXSAN CAPS 500MG BOX','',330000,'',NULL,'BOX/100','','BINA SAN PRIMA, PT.','2022-01-24 00:50:50','dalam'),
(91,'AMOXSAN DROPS 30ML','',23100,'',NULL,'BOTOL','','BINA SAN PRIMA, PT.','2023-07-09 07:07:40','dalam'),
(92,'AMOXSAN FORTE DRY SYRUP','',32800,'',NULL,'BOTOL','','BINA SAN PRIMA, PT.','2022-05-21 09:19:35','dalam'),
(94,'AMPICILLIN TAB 500MG BOX (NOVA)','',54595,'7',0,'BOX/100','','KOKOH JAYA PERSADA, PT.','2023-03-26 09:43:14','dalam'),
(95,'AMURAT ','',8500,'',NULL,'STRIP/4','','PT. NJONJA MENEER','2024-06-06 00:00:00',NULL),
(96,'ANABION','',7000,'',NULL,'BOTOL','','PT. BERLICO MULIA FARMA','2024-06-06 00:00:00',NULL),
(97,'ANACETINE SYRUP','',8919,'',NULL,'BOTOL','','KOKOH JAYA PERSADA, PT.','2023-11-26 07:11:54','luar'),
(98,'ANADEX TAB BOX','DEXTROMETHORPHAN HBR',250000,'',NULL,'BOX/25X4','KAPLET, 15MG','ENSEVAL PUTERA MEGATRADING, TBK, PT.','2022-04-20 11:45:34','luar'),
(99,'ANADEX SIRUP','',17000,'',NULL,'BOTOL','','PT. INTERBAT','2024-06-06 00:00:00',NULL),
(100,'ANAKONIDIN OBH 60ML','PSEUDEOEPHEDRINE HCL',11450,'',NULL,'BOTOL','SIRUP, 7.5MG/5ML','MARGA NUSANTARA JAYA, PT.','2023-10-31 15:38:54','luar'); 

/*Table structure for table `master_pbf` */

DROP TABLE IF EXISTS `master_pbf`;

CREATE TABLE `master_pbf` (
  `id_pbf` int(12) NOT NULL AUTO_INCREMENT,
  `nama_pbf` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `jatuh_tempo` int(11) NOT NULL,
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(17) COLLATE latin1_general_ci NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_pbf`)
) ENGINE=MyISAM AUTO_INCREMENT=315 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `master_pbf` */

insert  into `master_pbf`(`id_pbf`,`nama_pbf`,`jatuh_tempo`,`alamat`,`telp`,`created_date`,`created_by`) values 
(1,'PARIT PADANG GLOBAL, PT.',21,'GEDUNG CAPITAL PLACE  LT 33 JENDRAL GATOR SUBROTO, JAKARTA SELATAN','02186901955','2022-04-05 00:00:00','Administrator'),
(2,'NOVELL PHARMACEUTICAL LABORATORIES',0,'','','2024-06-22 11:37:00','admin'),
(3,'PD. GIOVAN',0,'','','2024-06-22 11:37:00','admin'),
(4,'PT .INDOFARMA',0,'','','2024-06-22 11:37:00','admin'),
(5,'PT AVENTIS PHARMA',0,'','','2024-06-22 11:37:00','admin'),
(6,'PT EAGLE INDO PHARMA',0,'','','2024-06-22 11:37:00','admin'),
(7,'PT. ABBOTT',0,'','','2024-06-22 11:37:00','admin'),
(8,'PT. ABBOTT INDONESIA',0,'','','2024-06-22 11:37:00','admin'),
(9,'PT. ACTAVIS',0,'','','2024-06-22 11:37:00','admin'),
(10,'PT. ACTAVIS INDONESIA',0,'','','2024-06-22 11:37:00','admin');

/*Table structure for table `pj_penjualan_detail` */

DROP TABLE IF EXISTS `pj_penjualan_detail`;

CREATE TABLE `pj_penjualan_detail` (
  `id_penjualan_d` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `id_penjualan_m` int(1) unsigned NOT NULL,
  `id_menu` int(1) NOT NULL,
  `jumlah_beli` smallint(1) unsigned NOT NULL,
  `harga_satuan` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_penjualan_d`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `pj_penjualan_detail` */

insert  into `pj_penjualan_detail`(`id_penjualan_d`,`id_penjualan_m`,`id_menu`,`jumlah_beli`,`harga_satuan`,`total`) values 
(60,48,8,1,40500,40500),
(59,47,3613,1,4500,4500),
(58,46,3482,1,58500,58500),
(57,45,2943,1,135500,135500),
(56,44,3618,1,235000,235000),
(55,43,3270,1,62390,62390),
(54,42,3482,1,58500,58500);

/*Table structure for table `pj_penjualan_master` */

DROP TABLE IF EXISTS `pj_penjualan_master`;

CREATE TABLE `pj_penjualan_master` (
  `id_penjualan_m` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_nota` varchar(40) NOT NULL,
  `tanggal` datetime NOT NULL,
  `grand_total` decimal(10,0) NOT NULL,
  `bayar` decimal(10,0) NOT NULL,
  `keterangan_lain` text,
  `id_user` varchar(100) NOT NULL,
  PRIMARY KEY (`id_penjualan_m`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `pj_penjualan_master` */

insert  into `pj_penjualan_master`(`id_penjualan_m`,`nomor_nota`,`tanggal`,`grand_total`,`bayar`,`keterangan_lain`,`id_user`) values 
(48,'48/1/20240706','2024-07-06 15:51:44',40500,40500,'','admin'),
(47,'47/1/20240625','2024-06-25 20:12:19',4500,100000,'','admin'),
(46,'46/1/20240625','2024-06-25 09:32:04',58500,100000,'','admin'),
(45,'45/1/20240625','2024-06-25 09:28:32',135500,150000,'','admin'),
(44,'44/1/20240625','2024-06-25 09:28:20',235000,400000,'','admin'),
(43,'43/1/20240625','2024-06-25 09:23:45',62390,70000,'','admin'),
(42,'1/1/20240625','2024-06-25 09:21:36',58500,60000,'','admin');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`nama_lengkap`,`email`,`level`,`blokir`,`last_login`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3','Administrator','','admin','N','2024-07-06 15:09:01'),
(5,'User','827ccb0eea8a706c4c34a16891f84e7b','User','admin@gmail.com','user','N','2024-11-23 16:28:45'),
(2,'Kasir','827ccb0eea8a706c4c34a16891f84e7b','Kasir','aldyjrz@gmail.com','kasir','N','2024-06-30 08:04:09');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
