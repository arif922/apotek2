/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.34-MariaDB : Database - apotek2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`apotek2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `apotek2`;

/*Table structure for table `detail_obat_keluar` */

DROP TABLE IF EXISTS `detail_obat_keluar`;

CREATE TABLE `detail_obat_keluar` (
  `kode_detail` varchar(50) NOT NULL,
  `kd_obat_keluar` varchar(50) NOT NULL,
  `kode_obat` varchar(50) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  PRIMARY KEY (`kode_detail`),
  KEY `Kd_obat_keluar` (`kd_obat_keluar`),
  KEY `detail_obat_keluar_ibfk_2` (`kode_obat`),
  CONSTRAINT `detail_obat_keluar_ibfk_1` FOREIGN KEY (`kd_obat_keluar`) REFERENCES `obat_keluar` (`kd_obat_keluar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_obat_keluar_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `is_obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_obat_keluar` */

insert  into `detail_obat_keluar`(`kode_detail`,`kd_obat_keluar`,`kode_obat`,`jumlah_keluar`) values 
('DK-231220-02-47-56','TK-231220-000003','B-211120-000005',5),
('DK-231220-10-51-48','TK-231220-000001','B-181120-000002',1);

/*Table structure for table `detail_obat_masuk` */

DROP TABLE IF EXISTS `detail_obat_masuk`;

CREATE TABLE `detail_obat_masuk` (
  `kode_detail` varchar(50) NOT NULL,
  `kd_obat_masuk` varchar(50) NOT NULL,
  `kode_obat` varchar(50) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `expired` date NOT NULL,
  PRIMARY KEY (`kode_detail`),
  KEY `kd_obat_masuk` (`kd_obat_masuk`),
  KEY `detail_obat_masuk_ibfk_2` (`kode_obat`),
  CONSTRAINT `detail_obat_masuk_ibfk_1` FOREIGN KEY (`kd_obat_masuk`) REFERENCES `obat_masuk` (`kd_obat_masuk`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_obat_masuk_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `is_obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_obat_masuk` */

insert  into `detail_obat_masuk`(`kode_detail`,`kd_obat_masuk`,`kode_obat`,`jumlah_masuk`,`expired`) values 
('DM-221120-11-55-32','TM-221120-000001','B-181120-000002',4,'2020-11-25'),
('DM-221120-11-56-10','TM-221120-000001','B-191120-000003',6,'2020-11-29'),
('DM-231120-12-25-22','TM-231120-000002','B-181120-000002',5,'2020-11-24'),
('DM-231120-12-26-05','TM-231120-000002','B-191120-000003',3,'2020-11-24'),
('DM-231220-01-51-20','TM-231220-000004','B-181120-000002',5,'2020-12-30');

/*Table structure for table `dump_obkeluar` */

DROP TABLE IF EXISTS `dump_obkeluar`;

CREATE TABLE `dump_obkeluar` (
  `kode_detail` varchar(255) DEFAULT NULL,
  `kd_obat_keluar` varchar(255) DEFAULT NULL,
  `kode_obat` varchar(255) DEFAULT NULL,
  `jumlah_keluar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dump_obkeluar` */

/*Table structure for table `dump_obmasuk` */

DROP TABLE IF EXISTS `dump_obmasuk`;

CREATE TABLE `dump_obmasuk` (
  `kode_detail` varchar(100) DEFAULT NULL,
  `kd_obat_masuk` varchar(100) DEFAULT NULL,
  `kode_obat` varchar(100) DEFAULT NULL,
  `jumlah_masuk` int(15) DEFAULT NULL,
  `expired` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dump_obmasuk` */

/*Table structure for table `is_obat` */

DROP TABLE IF EXISTS `is_obat`;

CREATE TABLE `is_obat` (
  `kode_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(50) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `komposisi` varchar(100) NOT NULL,
  `penyimpanan` varchar(100) NOT NULL,
  `deskripsi_obat` text NOT NULL,
  `stok` int(11) NOT NULL,
  `expired` date DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `is_obat` */

insert  into `is_obat`(`kode_obat`,`nama_obat`,`jenis_obat`,`satuan`,`komposisi`,`penyimpanan`,`deskripsi_obat`,`stok`,`expired`,`foto`) values 
('B-181120-000002','bb','bb','pcs','bb','bb','bb',40,'2020-12-30','default.png'),
('B-191120-000003','dd','dd','Botol','dd','dd','dd',241,'2020-12-02','default.png'),
('B-211120-000005','ss','ss','Botol','ghkgk','gh','hhg',7,'2020-12-04','default.png');

/*Table structure for table `is_users` */

DROP TABLE IF EXISTS `is_users`;

CREATE TABLE `is_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('APA','APING') NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `level` (`hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `is_users` */

insert  into `is_users`(`id_user`,`username`,`alamat`,`password`,`email`,`telepon`,`foto`,`hak_akses`) values 
(24,'arif','pacitan','202cb962ac59075b964b07152d234b70','arif@22','12345','5170311045.jpg','APA'),
(25,'indah','jogja','202cb962ac59075b964b07152d234b70','indah@22','2352','indah.jpeg','APING'),
(26,'Aping','aa','202cb962ac59075b964b07152d234b70','aping@22','123','default.png','APING');

/*Table structure for table `obat_keluar` */

DROP TABLE IF EXISTS `obat_keluar`;

CREATE TABLE `obat_keluar` (
  `kd_obat_keluar` varchar(50) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`kd_obat_keluar`),
  KEY `obat_keluar_ibfk_1` (`id_user`),
  CONSTRAINT `obat_keluar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `is_users` (`id_user`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `obat_keluar` */

insert  into `obat_keluar`(`kd_obat_keluar`,`tanggal_keluar`,`id_user`) values 
('TK-231220-000001','2020-12-23',25),
('TK-231220-000002','2020-12-24',25),
('TK-231220-000003','2020-12-23',25);

/*Table structure for table `obat_masuk` */

DROP TABLE IF EXISTS `obat_masuk`;

CREATE TABLE `obat_masuk` (
  `kd_obat_masuk` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `faktur` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_obat_masuk`),
  KEY `obat_masuk_ibfk_1` (`id_user`),
  KEY `obat_masuk_ibfk_2` (`id_supplier`),
  CONSTRAINT `obat_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `is_users` (`id_user`) ON DELETE NO ACTION,
  CONSTRAINT `obat_masuk_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `obat_masuk` */

insert  into `obat_masuk`(`kd_obat_masuk`,`tanggal_masuk`,`id_user`,`id_supplier`,`faktur`) values 
('TM-221120-000001','2020-11-19',24,8,'vf54f54d7'),
('TM-231120-000002','2020-11-23',24,9,'dg'),
('TM-231220-000004','2020-12-23',25,8,'k335b'),
('TM-241120-000003','2020-11-24',25,10,'reg');

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`id_supplier`,`nama_supplier`,`alamat`,`kota`,`telepon`) values 
(8,'ss','dd','ss','7568'),
(9,'aaaa','bb','aaaaaa','12345678'),
(10,'aa','aa','aa','12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
