/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.5.9-MariaDB-log : Database - db_rkk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_rkk` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_rkk`;

/*Table structure for table `detail_supervisi` */

DROP TABLE IF EXISTS `detail_supervisi`;

CREATE TABLE `detail_supervisi` (
  `id_detail_supervisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_supervisi` int(11) NOT NULL,
  `rkk` text NOT NULL,
  `kualifikasi` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_supervisi`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_supervisi` */

insert  into `detail_supervisi`(`id_detail_supervisi`,`id_supervisi`,`rkk`,`kualifikasi`,`nilai`) values 
(1,6,'Membangun',1,0),
(2,6,'Menerima pasien baru',1,0),
(3,6,'Menjalankan Fasilitas yang ada',1,0),
(4,6,'Mendengarkan Keluhan Pasien',1,0),
(5,6,'Melakukan Intervensi Pencegahan pasien jatuh',1,0),
(6,6,'Memfasilitasi pasien makan yang tidak mampu makan sendiri',1,0),
(7,6,'Memberi nutrisi pasien via NGT',1,0),
(8,6,'Mendokumentasikan jumlah makanan yang di habiskan pasien',1,0),
(9,6,'Mendokumentasikan intake dan output',1,0),
(10,6,'Menimbang BB',1,0),
(11,6,'Mengukur TB',0,0),
(12,10,'Membangun',1,1),
(13,10,'Menerima pasien baru',1,1),
(14,10,'Menjalankan Fasilitas yang ada',1,1),
(15,10,'Mendengarkan Keluhan Pasien',1,1),
(16,10,'Melakukan Intervensi Pencegahan pasien jatuh',1,1),
(17,10,'Memfasilitasi pasien makan yang tidak mampu makan sendiri',1,1),
(18,10,'Memberi nutrisi pasien via NGT',1,1),
(19,10,'Mendokumentasikan jumlah makanan yang di habiskan pasien',1,1),
(20,10,'Mendokumentasikan intake dan output',1,1),
(21,10,'Menimbang BB',1,1),
(22,10,'Mengukur TB',1,1),
(23,11,'Membangun',1,1),
(24,11,'Menerima pasien baru',1,1),
(25,11,'Menjalankan Fasilitas yang ada',1,1),
(26,11,'Mendengarkan Keluhan Pasien',1,1),
(27,11,'Melakukan Intervensi Pencegahan pasien jatuh',1,1),
(28,11,'Memfasilitasi pasien makan yang tidak mampu makan sendiri',1,1),
(29,11,'Memberi nutrisi pasien via NGT',1,1),
(30,11,'Mendokumentasikan jumlah makanan yang di habiskan pasien',1,1),
(31,11,'Mendokumentasikan intake dan output',1,1),
(32,11,'Menimbang BB',1,1),
(33,11,'Mengukur TB',1,1),
(34,12,'Membangun',1,90),
(35,12,'Menerima pasien baru',1,90),
(36,12,'Menjalankan Fasilitas yang ada',1,90),
(37,12,'Mendengarkan Keluhan Pasien',0,89),
(38,12,'Melakukan Intervensi Pencegahan pasien jatuh',0,98),
(39,12,'Memfasilitasi pasien makan yang tidak mampu makan sendiri',0,78),
(40,12,'Memberi nutrisi pasien via NGT',1,89),
(41,12,'Mendokumentasikan jumlah makanan yang di habiskan pasien',1,90),
(42,12,'Mendokumentasikan intake dan output',1,90),
(43,12,'Menimbang BB',1,89),
(44,12,'Mengukur TB',1,70),
(45,13,'Membangun',1,90),
(46,13,'Menerima pasien baru',1,90),
(47,13,'Menjalankan Fasilitas yang ada',1,90),
(48,13,'Mendengarkan Keluhan Pasien',1,80),
(49,13,'Melakukan Intervensi Pencegahan pasien jatuh',1,80),
(50,13,'Memfasilitasi pasien makan yang tidak mampu makan sendiri',1,80),
(51,13,'Memberi nutrisi pasien via NGT',1,90),
(52,13,'Mendokumentasikan jumlah makanan yang di habiskan pasien',1,80),
(53,13,'Mendokumentasikan intake dan output',1,80),
(54,13,'Menimbang BB',1,90),
(55,13,'Mengukur TB',1,90),
(56,14,'Membangun',1,89),
(57,14,'Menerima pasien baru',1,90),
(58,14,'Menjalankan Fasilitas yang ada',0,40),
(59,14,'Mendengarkan Keluhan Pasien',0,50),
(60,14,'Melakukan Intervensi Pencegahan pasien jatuh',0,30),
(61,14,'Memfasilitasi pasien makan yang tidak mampu makan sendiri',0,35),
(62,14,'Memberi nutrisi pasien via NGT',0,40),
(63,14,'Mendokumentasikan jumlah makanan yang di habiskan pasien',0,50),
(64,14,'Mendokumentasikan intake dan output',0,60),
(65,14,'Menimbang BB',0,40),
(66,14,'Mengukur TB',1,70),
(67,21,'Menerima pasien baru',1,97),
(68,21,'Menjalankan Fasilitas yang ada',1,97),
(69,21,'Mendengarkan Keluhan Pasien',1,79),
(70,21,'Melakukan Intervensi Pencegahan pasien jatuh',1,79),
(71,21,'Memfasilitasi pasien makan yang tidak mampu makan sendiri',1,79),
(72,21,'Memberi nutrisi pasien via NGT',1,97),
(73,21,'Mendokumentasikan jumlah makanan yang di habiskan pasien',1,97),
(74,21,'Mendokumentasikan intake dan output',1,97),
(75,21,'Menimbang BB',1,97),
(76,21,'Mengukur TB',1,97),
(77,22,'Menerima pasien baru',0,40),
(78,22,'Menjalankan Fasilitas yang ada',0,30),
(79,22,'Mendengarkan Keluhan Pasien',0,30),
(80,22,'Melakukan Intervensi Pencegahan pasien jatuh',0,40),
(81,22,'Memfasilitasi pasien makan yang tidak mampu makan sendiri',0,40),
(82,22,'Memberi nutrisi pasien via NGT',0,40),
(83,22,'Mendokumentasikan jumlah makanan yang di habiskan pasien',0,28),
(84,22,'Mendokumentasikan intake dan output',0,28),
(85,22,'Menimbang BB',0,39),
(86,22,'Mengukur TB',0,40),
(87,23,'Menerima pasien baru',1,80),
(88,23,'Menjalankan Fasilitas yang ada',1,80),
(89,23,'Mendengarkan Keluhan Pasien',1,80),
(90,23,'Melakukan Intervensi Pencegahan pasien jatuh',1,80),
(91,23,'Memfasilitasi pasien makan yang tidak mampu makan sendiri',1,90),
(92,23,'Memberi nutrisi pasien via NGT',1,90),
(93,23,'Mendokumentasikan jumlah makanan yang di habiskan pasien',1,90),
(94,23,'Mendokumentasikan intake dan output',1,90),
(95,23,'Menimbang BB',1,80),
(96,23,'Mengukur TB',1,80);

/*Table structure for table `jenis_dokumen` */

DROP TABLE IF EXISTS `jenis_dokumen`;

CREATE TABLE `jenis_dokumen` (
  `id_jenis_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_dokumen` varchar(100) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id_jenis_dokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_dokumen` */

insert  into `jenis_dokumen`(`id_jenis_dokumen`,`jenis_dokumen`,`create_at`,`update_at`) values 
(1,'admin','2020-01-22','2020-01-22'),
(2,'Surat Aktif Kuliah','2020-01-22','2020-01-22');

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_karyawan` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') CHARACTER SET utf8 DEFAULT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `kepala_unit` int(11) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`id_karyawan`,`nama_karyawan`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`unit`,`kepala_unit`) values 
(1,'Ronal Halomoan Nababan, A.Md.Kep','laki-laki','Belum Diketahui','2019-11-07','2',2),
(2,'Dearni Patricia Girsang, A.Md.Kep','laki-laki','Belum Diketahui','2019-11-07','2',2),
(3,'Muhammad Godapi Nasution, Skep','laki-laki','belum diketahui','2019-11-07','2',2),
(4,'Fenty Rahmadani, A.Md.Kep','perempuan','Pekanbaru','2019-11-07','2',2),
(5,'Sugeng Riyadi, S.Kep. Ners','laki-laki','Belum diketahui','2019-11-07','2',2),
(6,'Rahma Nia, A.Md.Keb','laki-laki','Belum Diketahui','2019-11-07','9',2),
(9,'adas','perempuan','sada','2019-12-01','IT',1),
(10,'radasda','laki-laki','adadadsa','2019-12-25','RAWAT INAP',4);

/*Table structure for table `level` */

DROP TABLE IF EXISTS `level`;

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `level` */

insert  into `level`(`id_level`,`level`) values 
(1,'Administrator'),
(2,'Kepala Unit');

/*Table structure for table `penilaian` */

DROP TABLE IF EXISTS `penilaian`;

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` int(11) DEFAULT NULL,
  `id_supervisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_penilaian`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

/*Data for the table `penilaian` */

insert  into `penilaian`(`id_penilaian`,`nilai`,`id_supervisi`) values 
(1,90,1),
(2,90,1),
(3,90,1),
(4,90,1),
(5,90,1),
(6,90,1),
(7,90,1),
(8,90,1),
(9,100,1),
(10,90,1),
(11,90,1),
(12,100,2),
(13,90,2),
(14,90,2),
(15,90,2),
(16,0,2),
(17,0,2),
(18,0,2),
(19,0,2),
(20,0,2),
(21,0,2),
(22,0,2),
(23,90,3),
(24,50,3),
(25,0,3),
(26,0,3),
(27,0,3),
(28,0,3),
(29,0,3),
(30,0,3),
(31,0,3),
(32,0,3),
(33,0,3),
(34,90,4),
(35,90,4),
(36,90,4),
(37,90,4),
(38,90,4),
(39,90,4),
(40,90,4),
(41,90,4),
(42,90,4),
(43,90,4),
(44,90,4),
(45,90,5),
(46,50,5),
(47,40,5),
(48,85,5),
(49,90,5),
(50,50,5),
(51,90,5),
(52,100,5),
(53,100,5),
(54,98,5),
(55,80,5),
(56,90,6),
(57,90,6),
(58,90,6),
(59,90,6),
(60,80,6),
(61,80,6),
(62,80,6),
(63,90,6),
(64,80,6),
(65,80,6),
(66,50,6);

/*Table structure for table `rkk` */

DROP TABLE IF EXISTS `rkk`;

CREATE TABLE `rkk` (
  `id_rkk` int(11) NOT NULL AUTO_INCREMENT,
  `asuhan` varchar(200) DEFAULT NULL,
  `kualifikasi` varchar(100) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id_rkk`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `rkk` */

insert  into `rkk`(`id_rkk`,`asuhan`,`kualifikasi`,`unit`,`user`) values 
(3,'Menerima pasien baru','1',2,2),
(2,'Membangun','1',9,5),
(4,'Menjalankan Fasilitas yang ada','1',2,2),
(5,'Mendengarkan Keluhan Pasien','1',2,2),
(6,'Melakukan Intervensi Pencegahan pasien jatuh','1',2,2),
(7,'Memfasilitasi pasien makan yang tidak mampu makan sendiri','1',2,2),
(8,'Memberi nutrisi pasien via NGT','1',2,2),
(9,'Mendokumentasikan jumlah makanan yang di habiskan pasien','1',2,2),
(10,'Mendokumentasikan intake dan output','1',2,2),
(11,'Menimbang BB','1',2,2),
(12,'Mengukur TB','1',2,1);

/*Table structure for table `supervisi` */

DROP TABLE IF EXISTS `supervisi`;

CREATE TABLE `supervisi` (
  `id_supervisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) DEFAULT NULL,
  `tanggal_supervisi` date DEFAULT NULL,
  `ka_unit` int(11) NOT NULL,
  PRIMARY KEY (`id_supervisi`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `supervisi` */

insert  into `supervisi`(`id_supervisi`,`id_karyawan`,`tanggal_supervisi`,`ka_unit`) values 
(15,NULL,'2019-12-27',2),
(16,NULL,'2019-12-27',2),
(17,NULL,'2019-12-27',2),
(18,NULL,'2019-12-27',2),
(22,5,'2019-12-27',2),
(23,3,'2019-12-27',2);

/*Table structure for table `unit` */

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(50) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `unit` */

insert  into `unit`(`id_unit`,`nama_unit`) values 
(1,'IT'),
(2,'IGD'),
(3,'OK'),
(4,'APOTIK'),
(5,'RADIOLOGI'),
(6,'GIZI'),
(7,'POLI'),
(8,'FARMASI'),
(9,'RAWAT INAP'),
(10,'RAWAT JALAN');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `terakhir_login` datetime NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`nama_lengkap`,`email`,`terakhir_login`,`id_level`,`id_unit`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3','Vanrezky Sadewa','vanrezkysadewa1@gmail.com','2020-06-04 21:42:52',1,1),
(2,'cali','7731363ed2ea93c7593cb363e932ae5c','Cally Pernando Simanjuntak, A.Md.Kep','CaliFernando@gmail.com','2020-03-10 21:34:43',2,2),
(4,'sartika','e8a3ddc2003d9353f7d196ed76ac36ef','Sartika Siahaan, A.Md.Kep','sartikasiahaan@gmail.com','2019-11-08 08:46:30',2,9),
(5,'nurmala','60d075b97943df3727e2150ea7a20eb5','Nurmala Purba, A.Md.Kep','nurmalapurba@gmail.com','2019-12-27 16:30:26',2,9),
(6,'brg','d0561df332bd0cb048303a7ff17774c6','Pak Bela Razad','belarazadginting@gmail.com','2019-11-08 09:07:42',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
