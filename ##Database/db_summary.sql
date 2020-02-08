/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - db_summary
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_summary` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_summary`;

/*Table structure for table `tb_summary` */

DROP TABLE IF EXISTS `tb_summary`;

CREATE TABLE `tb_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namafile` varchar(50) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_summary` */

insert  into `tb_summary`(`id`,`namafile`,`title`,`content`) values 
(1,'file.txt','judul file','Sekitar 213 peneliti IPB hadir dalam acara seminar hasil hasil penelitian yang digelar oleh Lembaga Penelitian dan Pengabdian Kepada Masyarakat IPB (LPPM- IPB). Acara digelar di IPB International Convention Center, (10/12).\r\n\r\nDikatakan oleh Wakil Kepala LPPM bidang Pengabdian pada Masyarakat, Dr Ir Prastowo, selaku ketua panitia penyelenggara, \" Hasil-hasil penelitian yang diseminarkan masih didominasi oleh hasil penelitian di bidang pangan, yaitu sekitar 63 judul penelitian bidang pangan, 10 penelitian bidang energi dan sisanya berasal dari bidang sumberdaya alam dan lingkungan, bidang kesehatan, bidang sosial ekonomi dan budaya dan teknologi rekayasa.\r\n\r\nSelain itu ditambahkan oleh Kepala LPPM IPB, Prof Bambang Pramudya, bahwa hasil-hasil penelitian yang disampaikan pada seminar ini didanai dari berbagai sumber dana, antara lain dari dana Kementerian Pendidikan dan Kebudayaan, Kementerian Pertanian, dana masyarakat IPB dan dana hasil dari kerjasama dengan BUMN. \r\n\r\nProf Bambang berharap melalui seminar ini, para peserta dapat saling berbagi informasi sehingga manfaat dari hasil riset tersebut dapat dirasakan untuk masyarakat luas.');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
