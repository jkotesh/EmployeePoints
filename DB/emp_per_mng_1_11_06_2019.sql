-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table emp_per_mng.admin_users
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `mobileno` varchar(50) DEFAULT NULL,
  `reset_hash` varchar(100) DEFAULT NULL,
  `profile_image` varchar(200) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `Index 3` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table emp_per_mng.admin_users: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `mobileno`, `reset_hash`, `profile_image`, `role_id`, `status`, `created_by`, `created_on`, `modified_on`, `modified_by`) VALUES
	(1, 'Admin', 'admin@gmail.com', '$2y$10$nTF88GGn.E24knOZsqwJnODsusjh2dhR1A7rngEBAXN/lcUZicGWG', '8008615717', '19fb225df9fa196104497eadcb7d9269e32b148c6fe127b44aafd5f6334fb3b3', NULL, 1, 1, 1, '0000-00-00 00:00:00', '2019-05-10 15:15:24', 1);
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

-- Dumping structure for table emp_per_mng.defaults
CREATE TABLE IF NOT EXISTS `defaults` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `allow_create_logs` int(11) DEFAULT NULL,
  `allow_edit_logs` int(11) DEFAULT NULL,
  `allow_delete_logs` int(11) DEFAULT NULL,
  `log_max_days` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table emp_per_mng.defaults: ~0 rows (approximately)
/*!40000 ALTER TABLE `defaults` DISABLE KEYS */;
/*!40000 ALTER TABLE `defaults` ENABLE KEYS */;

-- Dumping structure for table emp_per_mng.log
CREATE TABLE IF NOT EXISTS `log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `action` varchar(25) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `description` varchar(4000) DEFAULT NULL,
  `log_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table emp_per_mng.log: ~0 rows (approximately)
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;

-- Dumping structure for table emp_per_mng.module
CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table emp_per_mng.module: ~0 rows (approximately)
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
/*!40000 ALTER TABLE `module` ENABLE KEYS */;

-- Dumping structure for table emp_per_mng.privileges
CREATE TABLE IF NOT EXISTS `privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table emp_per_mng.privileges: ~4 rows (approximately)
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` (`id`, `privilege`) VALUES
	(1, 'View'),
	(2, 'Add'),
	(3, 'Edit'),
	(4, 'Delete');
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;

-- Dumping structure for table emp_per_mng.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `role_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table emp_per_mng.role: ~4 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `name`, `role_type`) VALUES
	(1, 'Admin', 1),
	(2, 'Technical', 2),
	(3, 'Content', 2),
	(4, 'HR', 2);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table emp_per_mng.rolemoduleprivileges
CREATE TABLE IF NOT EXISTS `rolemoduleprivileges` (
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`module_id`,`privilege_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table emp_per_mng.rolemoduleprivileges: ~0 rows (approximately)
/*!40000 ALTER TABLE `rolemoduleprivileges` DISABLE KEYS */;
/*!40000 ALTER TABLE `rolemoduleprivileges` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
