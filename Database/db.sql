/*
SQLyog Ultimate v8.55 
MySQL - 5.1.49-community : Database - dbsemtim
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbsemtim` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbsemtim`;

/*Table structure for table `banjir` */

DROP TABLE IF EXISTS `banjir`;

CREATE TABLE `banjir` (
  `nolaporan` varchar(9) NOT NULL,
  `tgl` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `kondisi` varchar(10) DEFAULT NULL,
  `ket` text,
  `username` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`nolaporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `banjir` */

insert  into `banjir`(`nolaporan`,`tgl`,`jam`,`kondisi`,`ket`,`username`) values ('2007-0001','2020-07-17','10:00:00','WASPADA','Kondisi sampai saat ini, banjir masih belum surut jd tetap wasapada','budi');

/*Table structure for table `kelurahan` */

DROP TABLE IF EXISTS `kelurahan`;

CREATE TABLE `kelurahan` (
  `kdkelurahan` varchar(3) NOT NULL,
  `nmkelurahan` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`kdkelurahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelurahan` */

insert  into `kelurahan`(`kdkelurahan`,`nmkelurahan`,`alamat`,`latitude`,`longitude`) values ('K01','Bugangan','Jalan Citandui Selatan No. 30 Semarang',-6.9730753,110.4360099),('K02','Karang Tempel','Jalan Labuan Karang Tempel Semarang',-6.9878244,110.4348051),('K03','Karangturi','Jalan Kampung Baris Semarang',-6.9876693,110.4301497);

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `username` varchar(30) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `bagian` varchar(20) DEFAULT NULL,
  `kdkelurahan` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`username`,`nama`,`pass`,`bagian`,`kdkelurahan`) values ('budi','Diana Budi Puspitasari','123','OPERATOR','K01'),('admin','Alan','123','ADMIN','K00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
