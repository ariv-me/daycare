-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dbspf_daycare
CREATE DATABASE IF NOT EXISTS `dbspf_daycare` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbspf_daycare`;

-- Dumping structure for table dbspf_daycare.ctrg_ta_kategori
CREATE TABLE IF NOT EXISTS `ctrg_ta_kategori` (
  `kat_id` int(11) NOT NULL AUTO_INCREMENT,
  `kat_nama` varchar(50) DEFAULT '',
  `kat_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` varchar(50) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.ctrg_ta_kategori: ~3 rows (approximately)
/*!40000 ALTER TABLE `ctrg_ta_kategori` DISABLE KEYS */;
INSERT IGNORE INTO `ctrg_ta_kategori` (`kat_id`, `kat_nama`, `kat_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'MB - Biasa', 'Y', '2023-09-08 11:13:59', NULL, NULL, NULL, '2024-01-02 15:50:40', NULL, NULL, NULL),
	(2, 'MS - Mpasi', 'Y', '2023-09-08 11:13:59', NULL, NULL, NULL, '2024-01-02 15:24:30', NULL, NULL, NULL),
	(3, 'ML - Lunak', 'Y', '2023-09-08 11:13:59', NULL, NULL, NULL, '2024-01-02 15:24:52', NULL, NULL, NULL);
/*!40000 ALTER TABLE `ctrg_ta_kategori` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.ctrg_tb_menu
CREATE TABLE IF NOT EXISTS `ctrg_tb_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_kode` varchar(50) DEFAULT NULL,
  `kat_id` varchar(50) DEFAULT '',
  `menu_nama` varchar(50) DEFAULT '',
  `menu_deskripsi` text,
  `menu_harga` double(14,0) DEFAULT '0',
  `menu_aktif` enum('Y','T') DEFAULT 'Y',
  `created_nip` varchar(50) DEFAULT NULL,
  `created_nama` varchar(50) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(50) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.ctrg_tb_menu: ~2 rows (approximately)
/*!40000 ALTER TABLE `ctrg_tb_menu` DISABLE KEYS */;
INSERT IGNORE INTO `ctrg_tb_menu` (`menu_id`, `menu_kode`, `kat_id`, `menu_nama`, `menu_deskripsi`, `menu_harga`, `menu_aktif`, `created_nip`, `created_nama`, `created_ip`, `created_at`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'MB', '1', 'Makan Biasa', 'Ayam, Sayur wortel', 20000, 'Y', '1080', 'ARIF', '::1', '2024-01-02 15:48:58', '2024-01-03 09:29:24', '1080', 'ARIF', '::1'),
	(2, 'MS', '2', 'Mpasi', '', 10000, 'Y', '1080', 'ARIF', '::1', '2024-01-02 16:04:45', '2024-01-02 16:04:45', NULL, NULL, NULL);
/*!40000 ALTER TABLE `ctrg_tb_menu` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.ctrg_tc_order
CREATE TABLE IF NOT EXISTS `ctrg_tc_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_kode` varchar(50) NOT NULL DEFAULT 'AUTO_INCREMENT',
  `order_tgl` date DEFAULT NULL,
  `anak_kode` varchar(50) DEFAULT NULL,
  `order_jam` time DEFAULT NULL,
  `order_status` enum('U','L') DEFAULT NULL,
  `order_close` enum('Y','T') DEFAULT 'T',
  `order_total` double(14,0) DEFAULT NULL,
  `order_grand_total` double(14,0) DEFAULT '0',
  `order_bayar` double(14,0) DEFAULT '0',
  `order_kembali` double(14,0) DEFAULT '0',
  `is_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(50) DEFAULT NULL,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_ip` varchar(50) DEFAULT NULL,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.ctrg_tc_order: ~1 rows (approximately)
/*!40000 ALTER TABLE `ctrg_tc_order` DISABLE KEYS */;
INSERT IGNORE INTO `ctrg_tc_order` (`order_id`, `order_kode`, `order_tgl`, `anak_kode`, `order_jam`, `order_status`, `order_close`, `order_total`, `order_grand_total`, `order_bayar`, `order_kembali`, `is_aktif`, `created_at`, `created_ip`, `created_nip`, `created_nama`, `updated_at`, `updated_ip`, `updated_nip`, `updated_nama`) VALUES
	(1, 'ORDR0001', '2024-01-12', 'NIS20230014', '15:47:26', 'U', 'T', 50000, 0, 0, 0, 'Y', '2024-01-12 15:47:26', '::1', 10000427, 'ARIF', '2024-01-16 16:14:17', '::1', '10000427', 'ARIF'),
	(2, 'ORDR0002', '2024-01-16', 'NIS20230014', '08:33:38', 'U', 'Y', 0, 0, 0, 0, 'Y', '2024-01-16 08:33:38', '::1', 10000427, 'ARIF', '2024-01-16 16:16:24', '::1', '10000427', 'ARIF'),
	(3, 'ORDR0003', '2024-01-22', 'NIS20230014', '08:03:37', 'U', 'Y', 0, 0, 0, 0, 'Y', '2024-01-22 08:03:37', '::1', 10000427, 'ARIF', '2024-01-22 08:03:53', '::1', NULL, NULL);
/*!40000 ALTER TABLE `ctrg_tc_order` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.ctrg_tc_order_detail
CREATE TABLE IF NOT EXISTS `ctrg_tc_order_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_kode` varchar(50) DEFAULT NULL,
  `anak_kode` varchar(50) DEFAULT NULL,
  `menu_kode` varchar(50) DEFAULT NULL,
  `detail_catt` varchar(50) DEFAULT '',
  `detail_jam` time DEFAULT NULL,
  `detail_tgl` date DEFAULT NULL,
  `detail_qty` double(14,0) NOT NULL,
  `detail_harga` double(14,0) NOT NULL DEFAULT '0',
  `detail_total` double(14,0) NOT NULL DEFAULT '0',
  `detail_status` enum('O','C') DEFAULT 'O',
  `detail_aktif` enum('Y','T') DEFAULT 'T',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(50) DEFAULT NULL,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_ip` varchar(50) DEFAULT NULL,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`detail_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.ctrg_tc_order_detail: ~6 rows (approximately)
/*!40000 ALTER TABLE `ctrg_tc_order_detail` DISABLE KEYS */;
INSERT IGNORE INTO `ctrg_tc_order_detail` (`detail_id`, `order_kode`, `anak_kode`, `menu_kode`, `detail_catt`, `detail_jam`, `detail_tgl`, `detail_qty`, `detail_harga`, `detail_total`, `detail_status`, `detail_aktif`, `created_at`, `created_ip`, `created_nip`, `created_nama`, `updated_at`, `updated_ip`, `updated_nip`, `updated_nama`) VALUES
	(1, 'ORDR0001', 'NIS20230014', 'MB', '', '15:47:19', '2024-01-12', 2, 20000, 40000, 'O', 'Y', '2024-01-12 15:47:19', '::1', 10000427, 'ARIF', '2024-01-16 16:15:41', NULL, NULL, NULL),
	(2, 'ORDR0001', 'NIS20230014', 'MS', '', '15:47:22', '2024-01-12', 1, 10000, 10000, 'O', 'Y', '2024-01-12 15:47:22', '::1', 10000427, 'ARIF', '2024-01-16 16:15:43', NULL, NULL, NULL),
	(3, 'ORDR0002', 'NIS20230014', 'MB', '', '08:33:32', '2024-01-16', 5, 20000, 100000, 'C', 'Y', '2024-01-16 08:33:32', '::1', 10000427, 'ARIF', '2024-01-16 16:16:24', NULL, NULL, NULL),
	(4, 'ORDR0002', 'NIS20230014', 'MS', '', '08:33:36', '2024-01-16', 2, 10000, 20000, 'C', 'Y', '2024-01-16 08:33:36', '::1', 10000427, 'ARIF', '2024-01-16 16:16:24', NULL, NULL, NULL),
	(5, 'ORDR0003', 'NIS20230014', 'MB', '', '08:03:32', '2024-01-22', 2, 20000, 40000, 'C', 'Y', '2024-01-22 08:03:32', '::1', 10000427, 'ARIF', '2024-01-22 08:03:53', NULL, NULL, NULL),
	(6, 'ORDR0003', 'NIS20230014', 'MS', '', '08:03:36', '2024-01-22', 6, 10000, 60000, 'C', 'Y', '2024-01-22 08:03:36', '::1', 10000427, 'ARIF', '2024-01-22 08:03:53', NULL, NULL, NULL);
/*!40000 ALTER TABLE `ctrg_tc_order_detail` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
