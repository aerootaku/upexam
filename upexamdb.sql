# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.10-MariaDB)
# Database: fire
# Generation Time: 2021-04-19 14:36:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tbl_customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_customers`;

CREATE TABLE `tbl_customers` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `customer_no` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `middlename` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) DEFAULT '',
  `birthdate` varchar(50) NOT NULL DEFAULT '',
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `zip_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_customers` WRITE;
/*!40000 ALTER TABLE `tbl_customers` DISABLE KEYS */;

INSERT INTO `tbl_customers` (`id`, `customer_no`, `username`, `firstname`, `lastname`, `middlename`, `password`, `birthdate`, `age`, `gender`, `address`, `email`, `contact`, `zip_code`)
VALUES
	(45,'HNPMVngIDt','asd','asdddxx','asd','ssssss','$2y$10$0U8KnwewD5Bm6acyR5SbtOBJkc9VLQDczQylq0Hmm68REWWDBngZu','2021-04-20','0','Male','asd','neilgipaya@gmail.com','+639178199945',1231),
	(46,'nNw6PFW4DC','asdasd','asdasd','asdasd','asdasd','$2y$10$3mI5T8N0FWCDxwOY0FL07OPSstgpIJRIoIbX/Zi6S3UhKK5BD1H5i','2021-04-19','0','Male','asdasd','asdasd@email.com','+639178199945',123);

/*!40000 ALTER TABLE `tbl_customers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  `profile` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `age` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `status` text NOT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;

INSERT INTO `tbl_users` (`id`, `role`, `profile`, `username`, `password`, `firstname`, `middlename`, `lastname`, `age`, `gender`, `status`, `dtcreated`)
VALUES
	(1,'Admin','','admin','$2y$10$FOP6A/m3/nNDFBT.XNaJOOKaDZn5gxD5tRAUrY1Rv2KBWtpFvwL.2','Kio','','Gipaya','50','Male','Active','2021-04-19 14:06:09');

/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
