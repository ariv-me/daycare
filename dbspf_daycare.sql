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

-- Dumping structure for table dbspf_daycare.ctrg_ta_menu_kategori
CREATE TABLE IF NOT EXISTS `ctrg_ta_menu_kategori` (
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

-- Dumping data for table dbspf_daycare.ctrg_ta_menu_kategori: ~3 rows (approximately)
/*!40000 ALTER TABLE `ctrg_ta_menu_kategori` DISABLE KEYS */;
INSERT INTO `ctrg_ta_menu_kategori` (`kat_id`, `kat_nama`, `kat_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'ML - BIASA', 'T', '2023-09-08 11:13:59', NULL, NULL, NULL, '2023-09-08 11:13:59', NULL, NULL, NULL),
	(2, 'ML - KHUSUS', 'Y', '2023-09-08 11:13:59', NULL, NULL, NULL, '2023-09-08 11:13:59', NULL, NULL, NULL),
	(3, 'ML - LUNAK', 'Y', '2023-09-08 11:13:59', NULL, NULL, NULL, '2023-09-08 11:13:59', NULL, NULL, NULL);
/*!40000 ALTER TABLE `ctrg_ta_menu_kategori` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.ctrg_tb_menu
CREATE TABLE IF NOT EXISTS `ctrg_tb_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_kode` varchar(50) DEFAULT NULL,
  `kat_id` varchar(50) DEFAULT '',
  `menu_nama` varchar(50) DEFAULT '',
  `menu_harga` double(14,0) DEFAULT '0',
  `menu_harga_jual` double(14,0) DEFAULT '0',
  `is_aktif` enum('Y','T') DEFAULT 'Y',
  `created_nip` varchar(50) DEFAULT NULL,
  `created_nama` varchar(50) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(50) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.ctrg_tb_menu: ~3 rows (approximately)
/*!40000 ALTER TABLE `ctrg_tb_menu` DISABLE KEYS */;
INSERT INTO `ctrg_tb_menu` (`menu_id`, `menu_kode`, `kat_id`, `menu_nama`, `menu_harga`, `menu_harga_jual`, `is_aktif`, `created_nip`, `created_nama`, `created_ip`, `created_at`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'SRP 1', '2', 'Sarapan Pagi', 10000, 20000, 'Y', '1080', 'ARIF', '::1', '2022-07-29 11:34:46', '2022-07-29 14:11:59', '1080', 'ARIF', '::1'),
	(2, 'SIANG', '1', 'Paket Makan Siang', 15000, 20000, 'Y', '1080', 'ARIF', '::1', '2022-07-29 14:17:48', '2022-07-29 14:17:48', NULL, NULL, NULL),
	(3, 'MALAM', '1', 'Paket Makan Malam', 15000, 20000, 'Y', '1080', 'ARIF', '::1', '2022-07-29 14:19:26', '2022-07-29 14:19:26', NULL, NULL, NULL),
	(4, 'DAYCARE', '1', 'Nasi TIM Daging Ayam', 5000, 10000, 'Y', '1080', 'ARIF', '::1', '2022-07-29 14:21:37', '2022-07-30 00:31:18', '1080', 'ARIF', '::1'),
	(5, 'DAYCARE 1', '3', 'Nasi Lengkap', 15000, 20000, 'Y', '1080', 'ARIF', '::1', '2022-08-01 11:28:04', '2022-09-14 12:41:32', NULL, NULL, NULL);
/*!40000 ALTER TABLE `ctrg_tb_menu` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.ctrg_tc_order
CREATE TABLE IF NOT EXISTS `ctrg_tc_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_kode` varchar(50) NOT NULL DEFAULT 'AUTO_INCREMENT',
  `order_tgl` date DEFAULT NULL,
  `order_jam` time DEFAULT NULL,
  `order_closed` enum('Y','T') DEFAULT 'T',
  `kar_id` int(11) DEFAULT NULL,
  `kar_nama` varchar(50) DEFAULT NULL,
  `usaha_id` int(11) DEFAULT NULL,
  `usaha_nama` varchar(50) DEFAULT NULL,
  `order_status` enum('U','L') DEFAULT NULL,
  `order_total` double(14,0) DEFAULT NULL,
  `order_tax` int(11) DEFAULT '0',
  `order_tax_rupiah` double(14,0) DEFAULT '0',
  `order_grand_total` double(14,0) DEFAULT '0',
  `order_bayar` double(14,0) DEFAULT '0',
  `order_kembali` double(14,0) DEFAULT '0',
  `is_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_ip` varchar(50) DEFAULT NULL,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.ctrg_tc_order: ~8 rows (approximately)
/*!40000 ALTER TABLE `ctrg_tc_order` DISABLE KEYS */;
INSERT INTO `ctrg_tc_order` (`order_id`, `order_kode`, `order_tgl`, `order_jam`, `order_closed`, `kar_id`, `kar_nama`, `usaha_id`, `usaha_nama`, `order_status`, `order_total`, `order_tax`, `order_tax_rupiah`, `order_grand_total`, `order_bayar`, `order_kembali`, `is_aktif`, `created_at`, `created_ip`, `updated_at`, `updated_ip`, `updated_nip`, `updated_nama`) VALUES
	(1, 'ORDR202208010002', '2022-08-01', '20:54:04', 'T', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'L', 30000, 0, 0, 0, 0, 0, 'Y', '2022-08-01 20:54:04', '::1', '2022-08-01 21:03:01', NULL, NULL, NULL),
	(2, 'ORDR202208010001', '2022-08-01', '20:39:00', 'T', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'L', 40000, 0, 0, 0, 40000, 0, 'Y', '2022-08-01 20:39:00', '::1', '2022-08-02 11:36:40', '::1', '1080', 'ARIF'),
	(3, 'ORDR202208010003', '2022-08-01', '20:56:13', 'T', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'L', 10000, 0, 0, 0, 10000, 0, 'Y', '2022-08-01 20:56:13', '::1', '2022-08-02 11:27:38', '::1', '1080', 'ARIF'),
	(4, 'ORDR202208020004', '2022-08-02', '00:04:24', 'T', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'L', 30000, 0, 0, 0, 30000, 0, 'Y', '2022-08-02 00:04:24', '::1', '2022-08-02 11:06:09', '::1', '1080', 'ARIF'),
	(5, 'ORDR202208020005', '2022-08-02', '00:57:29', 'T', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'L', 50000, 0, 0, 0, 50000, 0, 'Y', '2022-08-02 00:57:29', '::1', '2022-08-02 10:57:32', '::1', '1080', 'ARIF'),
	(6, 'ORDR202208020006', '2022-08-02', '13:23:44', 'T', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'L', 10000, 0, 0, 0, 10000, 0, 'Y', '2022-08-02 13:23:44', '::1', '2022-08-02 13:29:37', '::1', '1080', 'ARIF'),
	(7, 'ORDR202208030007', '2022-08-03', '19:45:19', 'T', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'U', 20000, 0, 0, 0, 0, 0, 'Y', '2022-08-03 19:45:19', '::1', '2022-08-03 19:45:19', NULL, NULL, NULL),
	(8, 'ORDR202208030008', '2022-08-03', '20:20:55', 'T', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'L', 20000, 0, 0, 0, 20000, 0, 'Y', '2022-08-03 20:20:55', '::1', '2022-08-03 20:25:33', '::1', '1080', 'ARIF'),
	(9, 'ORDR202208090009', '2022-08-09', '12:52:53', 'T', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'U', 20000, 0, 0, 0, 0, 0, 'Y', '2022-08-09 12:52:53', '::1', '2022-08-09 12:52:53', NULL, NULL, NULL),
	(10, 'ORDR202208090010', '2022-08-09', '12:53:21', 'T', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'U', 20000, 0, 0, 0, 0, 0, 'Y', '2022-08-09 12:53:21', '::1', '2022-08-09 12:53:21', NULL, NULL, NULL),
	(11, 'ORDR202209130011', '2022-09-13', '16:05:18', 'T', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'U', 20000, 0, 0, 0, 0, 0, 'Y', '2022-09-13 16:05:18', '::1', '2022-09-13 16:05:18', NULL, NULL, NULL),
	(12, 'ORDR202302170012', '2023-02-17', '11:24:59', 'T', 652, 'HAQQUL', 3, 'Semen Padang Hospital', 'U', 20000, 0, 0, 0, 0, 0, 'Y', '2023-02-17 11:24:59', '::1', '2023-02-17 11:24:59', NULL, NULL, NULL);
/*!40000 ALTER TABLE `ctrg_tc_order` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.ctrg_tc_order_detail
CREATE TABLE IF NOT EXISTS `ctrg_tc_order_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_kode` varchar(50) DEFAULT NULL,
  `anak_nis` varchar(50) DEFAULT NULL,
  `menu_kode` varchar(50) DEFAULT NULL,
  `detail_catt` varchar(50) DEFAULT '',
  `detail_jadwal` varchar(50) DEFAULT '',
  `detail_tgl` date DEFAULT NULL,
  `detail_jam` time DEFAULT NULL,
  `detail_qty` double(14,0) NOT NULL,
  `detail_harga` double(14,0) NOT NULL DEFAULT '0',
  `detail_harga_jual` double(14,0) NOT NULL DEFAULT '0',
  `detail_diskon` double(14,2) NOT NULL DEFAULT '0.00',
  `detail_diskon_jenis` enum('D','P') NOT NULL DEFAULT 'D',
  `detail_diskon_rupiah` double(14,2) NOT NULL DEFAULT '0.00',
  `detail_subtotal` double(14,0) NOT NULL DEFAULT '0',
  `detail_subtotal_diskon` double(14,0) NOT NULL DEFAULT '0',
  `detail_status` enum('O','P','S') DEFAULT 'O',
  `kar_id` int(11) DEFAULT NULL,
  `kar_nama` varchar(50) DEFAULT NULL,
  `usaha_id` int(11) DEFAULT NULL,
  `usaha_nama` varchar(50) DEFAULT NULL,
  `is_aktif` enum('Y','T') DEFAULT 'T',
  `created_ip` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_jam` time DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  `petugas_nip` varchar(50) DEFAULT NULL,
  `petugas_nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`detail_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.ctrg_tc_order_detail: ~16 rows (approximately)
/*!40000 ALTER TABLE `ctrg_tc_order_detail` DISABLE KEYS */;
INSERT INTO `ctrg_tc_order_detail` (`detail_id`, `order_kode`, `anak_nis`, `menu_kode`, `detail_catt`, `detail_jadwal`, `detail_tgl`, `detail_jam`, `detail_qty`, `detail_harga`, `detail_harga_jual`, `detail_diskon`, `detail_diskon_jenis`, `detail_diskon_rupiah`, `detail_subtotal`, `detail_subtotal_diskon`, `detail_status`, `kar_id`, `kar_nama`, `usaha_id`, `usaha_nama`, `is_aktif`, `created_ip`, `created_at`, `updated_at`, `updated_jam`, `updated_ip`, `petugas_nip`, `petugas_nama`) VALUES
	(1, 'ORDR202208010001', '202207240002', 'DAYCARE 1', '', 'Pagi', '2022-08-01', '20:38:47', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-01 20:38:47', '2022-08-01 20:39:00', NULL, NULL, NULL, NULL),
	(2, 'ORDR202208010001', '202207240002', 'SRP 1', '', 'Siang', '2022-08-01', '20:38:56', 1, 10000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-01 20:38:56', '2022-08-01 20:39:00', NULL, NULL, NULL, NULL),
	(3, 'ORDR202208010002', '202207240001', 'DAYCARE 1', '', 'Siang', '2022-08-01', '20:53:50', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-01 20:53:50', '2022-08-01 20:54:04', NULL, NULL, NULL, NULL),
	(4, 'ORDR202208010002', '202207240002', 'DAYCARE', '', 'Malam', '2022-08-01', '20:54:00', 1, 5000, 10000, 0.00, 'D', 0.00, 10000, 10000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-01 20:54:00', '2022-08-01 20:54:04', NULL, NULL, NULL, NULL),
	(6, 'ORDR202208010003', '202207240002', 'DAYCARE', '', 'Siang', '2022-08-01', '20:56:09', 1, 5000, 10000, 0.00, 'D', 0.00, 10000, 10000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-01 20:56:09', '2022-08-01 20:56:13', NULL, NULL, NULL, NULL),
	(7, 'ORDR202208020004', '202207240002', 'DAYCARE 1', '', 'Siang', '2022-08-02', '00:04:12', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-02 00:04:12', '2022-08-02 00:04:24', NULL, NULL, NULL, NULL),
	(8, 'ORDR202208020004', '202207240002', 'DAYCARE', '', 'Siang', '2022-08-02', '00:04:20', 1, 5000, 10000, 0.00, 'D', 0.00, 10000, 10000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-02 00:04:20', '2022-08-02 00:04:24', NULL, NULL, NULL, NULL),
	(9, 'ORDR202208020005', '202207240002', 'SIANG', '', 'Malam', '2022-08-02', '00:56:59', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'P', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-02 00:56:59', '2022-08-02 12:11:53', '12:11:53', '::1', '10000427', 'ARIF'),
	(10, 'ORDR202208020005', '202207240002', 'DAYCARE', '', 'Malam', '2022-08-02', '00:57:09', 1, 5000, 10000, 0.00, 'D', 0.00, 10000, 10000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-02 00:57:09', '2022-08-02 00:57:30', NULL, NULL, NULL, NULL),
	(11, 'ORDR202208020005', '202207240002', 'SIANG', '', 'Siang', '2022-08-02', '00:57:25', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-02 00:57:25', '2022-08-02 00:57:30', NULL, NULL, NULL, NULL),
	(13, 'ORDR202208020006', '202207240002', 'DAYCARE', '', 'Malam', '2022-08-02', '13:23:40', 1, 5000, 10000, 0.00, 'D', 0.00, 10000, 10000, 'S', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-02 13:23:40', '2022-08-02 13:28:17', '13:28:17', '::1', '10000427', 'ARIF'),
	(15, 'ORDR202208030007', '202208030001', 'DAYCARE 1', '', 'Malam', '2022-08-03', '19:45:11', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-03 19:45:11', '2022-08-03 19:45:19', NULL, NULL, NULL, NULL),
	(16, 'ORDR202208030008', '202208030001', 'MALAM', '', 'Malam', '2022-08-03', '20:08:19', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-03 20:08:19', '2022-08-03 20:20:55', NULL, NULL, NULL, NULL),
	(19, 'ORDR202208090009', '202208040001', 'MALAM', '', 'Pagi', '2022-08-09', '12:52:51', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-09 12:52:51', '2022-08-09 12:52:53', NULL, NULL, NULL, NULL),
	(20, 'ORDR202208090010', '202208050008', 'SIANG', '', 'Siang', '2022-08-09', '12:53:07', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-08-09 12:53:07', '2022-08-09 12:53:21', NULL, NULL, NULL, NULL),
	(22, 'ORDR202209130011', '202208040001', 'DAYCARE 1', '', 'Pagi', '2022-09-13', '16:05:08', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 1080, 'ARIF', 4, 'Yayasan Semen Padang', 'Y', '::1', '2022-09-13 16:05:08', '2022-09-13 16:05:18', NULL, NULL, NULL, NULL),
	(23, 'ORDR202302170012', '202208040001', 'DAYCARE 1', '', 'Pagi', '2023-02-17', '11:24:49', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 652, 'HAQQUL', 3, 'Semen Padang Hospital', 'Y', '::1', '2023-02-17 11:24:49', '2023-02-17 11:24:59', NULL, NULL, NULL, NULL),
	(24, NULL, '20230003', 'DAYCARE 1', '', 'Siang', '2023-06-05', '14:57:05', 1, 15000, 20000, 0.00, 'D', 0.00, 20000, 20000, 'O', 652, 'HAQQUL', 3, 'Semen Padang Hospital', 'T', '::1', '2023-06-05 14:57:05', '2023-06-05 14:57:05', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `ctrg_tc_order_detail` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.daftar_tc_bayar
CREATE TABLE IF NOT EXISTS `daftar_tc_bayar` (
  `bayar_id` int(11) NOT NULL AUTO_INCREMENT,
  `bayar_kode` varchar(50) DEFAULT NULL,
  `trs_kode` varchar(50) DEFAULT NULL,
  `bayar_tgl` date DEFAULT NULL,
  `bayar_sub_total` double(14,0) DEFAULT '0',
  `bayar_diskon` double(14,0) DEFAULT '0',
  `bayar_grand_total` double(14,0) DEFAULT '0',
  `bayar_ket` text,
  `bayar_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bayar_id`) USING BTREE,
  UNIQUE KEY `bayar_kode` (`bayar_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbspf_daycare.daftar_tc_bayar: ~0 rows (approximately)
/*!40000 ALTER TABLE `daftar_tc_bayar` DISABLE KEYS */;
/*!40000 ALTER TABLE `daftar_tc_bayar` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.daftar_tc_member
CREATE TABLE IF NOT EXISTS `daftar_tc_member` (
  `trs_id` int(11) NOT NULL AUTO_INCREMENT,
  `trs_kode` varchar(50) DEFAULT NULL,
  `trs_tgl` date NOT NULL,
  `anak_kode` varchar(50) NOT NULL DEFAULT '',
  `tarif_kode` varchar(50) NOT NULL DEFAULT '',
  `grup_kode` varchar(50) NOT NULL DEFAULT '',
  `kat_kode` varchar(50) NOT NULL DEFAULT '',
  `trs_diskon` double(14,0) DEFAULT '0',
  `trs_sub_total` double(14,0) DEFAULT '0',
  `trs_total` double(14,0) DEFAULT '0',
  `trs_aktif` enum('Y','T') NOT NULL DEFAULT 'Y',
  `trs_status` enum('L','U') NOT NULL DEFAULT 'U',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`trs_id`) USING BTREE,
  UNIQUE KEY `trs_kode` (`trs_kode`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.daftar_tc_member: ~0 rows (approximately)
/*!40000 ALTER TABLE `daftar_tc_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `daftar_tc_member` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.daftar_tc_member_detail
CREATE TABLE IF NOT EXISTS `daftar_tc_member_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_kode` varchar(50) DEFAULT NULL,
  `detail_tgl` date DEFAULT NULL,
  `trs_kode` varchar(50) DEFAULT NULL,
  `anak_kode` varchar(50) DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL,
  `grup_kode` varchar(50) DEFAULT NULL,
  `kat_kode` varchar(50) DEFAULT NULL,
  `tarif_kode` varchar(50) DEFAULT NULL,
  `detail_total` double(14,0) DEFAULT '0',
  `detail_aktif` enum('Y','T') NOT NULL DEFAULT 'Y',
  `daftar_ket` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`detail_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.daftar_tc_member_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `daftar_tc_member_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `daftar_tc_member_detail` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.daftar_tc_transaksi
CREATE TABLE IF NOT EXISTS `daftar_tc_transaksi` (
  `trs_id` int(11) NOT NULL AUTO_INCREMENT,
  `trs_kode` varchar(50) DEFAULT NULL,
  `trs_tgl` date DEFAULT NULL,
  `trs_untuk_bulan` date DEFAULT NULL,
  `anak_kode` varchar(50) NOT NULL DEFAULT '',
  `tarif_kode` varchar(50) NOT NULL DEFAULT '',
  `grup_kode` varchar(50) NOT NULL DEFAULT '',
  `kat_kode` varchar(50) NOT NULL DEFAULT '',
  `trs_diskon` double(14,0) DEFAULT '0',
  `trs_sub_total` double(14,0) DEFAULT '0',
  `trs_total` double(14,0) DEFAULT '0',
  `trs_aktif` enum('Y','T') NOT NULL DEFAULT 'Y',
  `trs_status` enum('L','U') NOT NULL DEFAULT 'U',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`trs_id`) USING BTREE,
  UNIQUE KEY `trs_kode` (`trs_kode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.daftar_tc_transaksi: ~2 rows (approximately)
/*!40000 ALTER TABLE `daftar_tc_transaksi` DISABLE KEYS */;
INSERT INTO `daftar_tc_transaksi` (`trs_id`, `trs_kode`, `trs_tgl`, `trs_untuk_bulan`, `anak_kode`, `tarif_kode`, `grup_kode`, `kat_kode`, `trs_diskon`, `trs_sub_total`, `trs_total`, `trs_aktif`, `trs_status`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'DFTR0001', '2023-09-13', '2023-09-13', 'NIS20230001', 'PKT0003', 'SPH', 'KT0001', 0, 0, 4250000, 'Y', 'L', '2023-09-13 13:59:03', 10000427, 'ARIF', '::1', '2023-09-15 15:38:52', NULL, NULL, NULL),
	(2, 'TAG20230002', '2023-09-14', '2023-09-13', 'NIS20230002', 'PKT0004', 'UMU', 'KT0001', 0, 0, 4250000, 'Y', 'U', '2023-09-14 16:34:00', 10000427, 'ARIF', '::1', '2023-09-15 15:38:53', NULL, NULL, NULL);
/*!40000 ALTER TABLE `daftar_tc_transaksi` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.daftar_tc_transaksi_detail
CREATE TABLE IF NOT EXISTS `daftar_tc_transaksi_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_kode` varchar(50) DEFAULT NULL,
  `detail_tgl` date DEFAULT NULL,
  `trs_kode` varchar(50) DEFAULT NULL,
  `anak_kode` varchar(50) DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL,
  `grup_kode` varchar(50) DEFAULT NULL,
  `kat_kode` varchar(50) DEFAULT NULL,
  `tarif_kode` varchar(50) DEFAULT NULL,
  `detail_total` double(14,0) DEFAULT '0',
  `detail_aktif` enum('Y','T') NOT NULL DEFAULT 'Y',
  `daftar_ket` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`detail_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dbspf_daycare.daftar_tc_transaksi_detail: ~2 rows (approximately)
/*!40000 ALTER TABLE `daftar_tc_transaksi_detail` DISABLE KEYS */;
INSERT INTO `daftar_tc_transaksi_detail` (`detail_id`, `detail_kode`, `detail_tgl`, `trs_kode`, `anak_kode`, `periode_id`, `grup_kode`, `kat_kode`, `tarif_kode`, `detail_total`, `detail_aktif`, `daftar_ket`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'DTL0001', '2023-09-13', 'DFTR0001', 'NIS20230001', 2, 'SPH', 'KT0001', 'PKT0003', 4250000, 'Y', NULL, '2023-09-13 13:49:02', 10000427, 'ARIF', '::1', '2023-09-13 13:59:03', NULL, NULL, NULL),
	(2, 'DTL0002', '2023-09-14', 'TAG20230002', 'NIS20230002', 2, 'UMU', 'KT0001', 'PKT0004', 4250000, 'Y', NULL, '2023-09-14 16:29:16', 10000427, 'ARIF', '::1', '2023-09-14 16:34:00', NULL, NULL, NULL);
/*!40000 ALTER TABLE `daftar_tc_transaksi_detail` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.dapok_tb_anak
CREATE TABLE IF NOT EXISTS `dapok_tb_anak` (
  `anak_id` int(11) NOT NULL AUTO_INCREMENT,
  `ortu_kode` varchar(50) DEFAULT NULL,
  `pnj_kode` varchar(50) DEFAULT NULL,
  `anak_kode` varchar(50) DEFAULT NULL,
  `anak_nama` varchar(100) DEFAULT NULL,
  `anak_jekel` enum('L','P') DEFAULT NULL,
  `anak_tmp_lahir` varchar(50) DEFAULT NULL,
  `anak_tgl_lahir` date DEFAULT NULL,
  `anak_ke` int(11) DEFAULT '0',
  `anak_jml_saudara` int(11) DEFAULT '0',
  `anak_berat` int(11) DEFAULT NULL,
  `anak_tinggi` varchar(50) DEFAULT NULL,
  `anak_alamat` text,
  `anak_status` enum('A','B') DEFAULT 'A',
  `agama_id` varchar(50) DEFAULT NULL,
  `anak_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`anak_id`),
  UNIQUE KEY `anak_nis` (`anak_kode`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dbspf_daycare.dapok_tb_anak: ~0 rows (approximately)
/*!40000 ALTER TABLE `dapok_tb_anak` DISABLE KEYS */;
INSERT INTO `dapok_tb_anak` (`anak_id`, `ortu_kode`, `pnj_kode`, `anak_kode`, `anak_nama`, `anak_jekel`, `anak_tmp_lahir`, `anak_tgl_lahir`, `anak_ke`, `anak_jml_saudara`, `anak_berat`, `anak_tinggi`, `anak_alamat`, `anak_status`, `agama_id`, `anak_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'ORTU20230001', 'PNJ20230003', 'NIS20230001', 'Json Ajax', 'L', 'Padang', '2023-09-30', 1, 0, 19, '30', NULL, 'A', 'undefined', 'Y', '2023-09-13 13:59:03', 10000427, 'ARIF', '::1', '2023-09-13 13:59:03', NULL, NULL, NULL),
	(2, 'ORTU20230002', 'PNJ20230004', 'NIS20230002', 'Cipung', 'L', 'Padang', '2020-05-29', 2, 0, 19, '30', NULL, 'A', 'undefined', 'Y', '2023-09-14 16:34:00', 10000427, 'ARIF', '::1', '2023-09-14 16:34:00', NULL, NULL, NULL);
/*!40000 ALTER TABLE `dapok_tb_anak` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.dapok_tb_kontak
CREATE TABLE IF NOT EXISTS `dapok_tb_kontak` (
  `kontak_id` int(11) NOT NULL AUTO_INCREMENT,
  `kontak_nama` varchar(100) DEFAULT NULL,
  `kontak_hp` varchar(15) DEFAULT NULL,
  `kontak_nik` varchar(50) DEFAULT NULL,
  `kontak_jekel` enum('L','P') DEFAULT NULL,
  `kontak_aktif` enum('Y','T') DEFAULT 'Y',
  `provinsi_id` int(11) DEFAULT NULL,
  `kota_kode` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `kontak_alamat` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` varchar(50) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kontak_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.dapok_tb_kontak: ~0 rows (approximately)
/*!40000 ALTER TABLE `dapok_tb_kontak` DISABLE KEYS */;
/*!40000 ALTER TABLE `dapok_tb_kontak` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.dapok_tb_ortu
CREATE TABLE IF NOT EXISTS `dapok_tb_ortu` (
  `ortu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ortu_kode` varchar(100) DEFAULT NULL,
  `ortu_ayah` varchar(100) DEFAULT NULL,
  `ortu_ayah_nik` int(11) DEFAULT NULL,
  `ortu_ayah_kerja` varchar(255) DEFAULT NULL,
  `ortu_ayah_hp` varchar(15) DEFAULT NULL,
  `ortu_ayah_pdk_id` int(11) DEFAULT NULL,
  `ortu_ayah_wa` varchar(15) DEFAULT NULL,
  `ortu_ayah_tgl_lahir` date DEFAULT NULL,
  `ortu_ayah_tmp_lahir` varchar(50) DEFAULT NULL,
  `ortu_ayah_agama_id` int(11) DEFAULT NULL,
  `ortu_ibu` varchar(50) DEFAULT NULL,
  `ortu_ibu_nik` int(11) DEFAULT NULL,
  `ortu_ibu_pdk_id` int(11) DEFAULT NULL,
  `ortu_ibu_tmp_lahir` varchar(50) DEFAULT NULL,
  `ortu_ibu_tgl_lahir` date DEFAULT NULL,
  `ortu_ibu_kerja` varchar(255) DEFAULT NULL,
  `ortu_ibu_agama_id` int(11) DEFAULT NULL,
  `ortu_ibu_hp` varchar(15) DEFAULT NULL,
  `ortu_ibu_wa` varchar(15) DEFAULT NULL,
  `ortu_provinsi_id` int(11) DEFAULT NULL,
  `ortu_kota_kode` int(11) DEFAULT NULL,
  `ortu_kecamatan_id` int(11) DEFAULT NULL,
  `ortu_alamat` text,
  `ortu_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` varchar(50) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ortu_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.dapok_tb_ortu: ~0 rows (approximately)
/*!40000 ALTER TABLE `dapok_tb_ortu` DISABLE KEYS */;
INSERT INTO `dapok_tb_ortu` (`ortu_id`, `ortu_kode`, `ortu_ayah`, `ortu_ayah_nik`, `ortu_ayah_kerja`, `ortu_ayah_hp`, `ortu_ayah_pdk_id`, `ortu_ayah_wa`, `ortu_ayah_tgl_lahir`, `ortu_ayah_tmp_lahir`, `ortu_ayah_agama_id`, `ortu_ibu`, `ortu_ibu_nik`, `ortu_ibu_pdk_id`, `ortu_ibu_tmp_lahir`, `ortu_ibu_tgl_lahir`, `ortu_ibu_kerja`, `ortu_ibu_agama_id`, `ortu_ibu_hp`, `ortu_ibu_wa`, `ortu_provinsi_id`, `ortu_kota_kode`, `ortu_kecamatan_id`, `ortu_alamat`, `ortu_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'ORTU20230001', 'Java Script', 12321323, 'Pengusaha', '08192321312', 3, '08192321312', '1990-09-30', 'Padang', 1, 'Json', 123213, 3, 'Solok Selatan', '1994-05-12', 'IRT', 1, '08192321312', '08192321312', 13, 1302, 1302100, 'BALAH HILIR UTARA, LUBUK ALUNG', 'Y', '2023-09-13 13:59:03', '10000427', 'ARIF', '::1', '2023-09-13 13:59:03', NULL, NULL, NULL),
	(2, 'ORTU20230002', 'Rapi Amad', 12321323, 'Pengusaha', '08192321312', 3, '08192321312', '1995-11-07', 'Solok Sleatan', 1, 'Rika', 123213, 3, 'Solok Selatan', '1994-05-12', 'Pengusaha', 1, '08192321312', '08192321312', 36, 3604, 3604261, 'LUBANG BATU', 'Y', '2023-09-14 16:34:00', '10000427', 'ARIF', '::1', '2023-09-14 16:34:00', NULL, NULL, NULL);
/*!40000 ALTER TABLE `dapok_tb_ortu` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.dapok_tb_penjemput
CREATE TABLE IF NOT EXISTS `dapok_tb_penjemput` (
  `pnj_id` int(11) NOT NULL AUTO_INCREMENT,
  `pnj_kode` varchar(100) DEFAULT NULL,
  `pnj_nama` varchar(100) DEFAULT NULL,
  `pnj_hp` varchar(15) DEFAULT NULL,
  `pnj_nik` varchar(50) DEFAULT NULL,
  `pnj_jekel` enum('L','P') DEFAULT NULL,
  `pnj_wa` varchar(15) DEFAULT NULL,
  `pnj_pdk_id` int(11) DEFAULT NULL,
  `pnj_hub_id` int(11) DEFAULT NULL,
  `pnj_tgl_lahir` date DEFAULT NULL,
  `pnj_tmp_lahir` varchar(50) DEFAULT NULL,
  `pnj_kerja` varchar(50) DEFAULT NULL,
  `pnj_peru` varchar(50) DEFAULT NULL,
  `pnj_agama_id` int(11) DEFAULT NULL,
  `pnj_provinsi_id` int(11) DEFAULT NULL,
  `pnj_kota_kode` int(11) DEFAULT NULL,
  `pnj_kecamatan_id` int(11) DEFAULT NULL,
  `pnj_alamat` text,
  `pnj_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` varchar(50) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pnj_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.dapok_tb_penjemput: ~3 rows (approximately)
/*!40000 ALTER TABLE `dapok_tb_penjemput` DISABLE KEYS */;
INSERT INTO `dapok_tb_penjemput` (`pnj_id`, `pnj_kode`, `pnj_nama`, `pnj_hp`, `pnj_nik`, `pnj_jekel`, `pnj_wa`, `pnj_pdk_id`, `pnj_hub_id`, `pnj_tgl_lahir`, `pnj_tmp_lahir`, `pnj_kerja`, `pnj_peru`, `pnj_agama_id`, `pnj_provinsi_id`, `pnj_kota_kode`, `pnj_kecamatan_id`, `pnj_alamat`, `pnj_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'PNJ20230001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2023-09-12 12:53:44', '10000427', 'ARIF', '::1', '2023-09-12 12:53:44', NULL, NULL, NULL),
	(2, 'PNJ20230002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2023-09-13 11:21:54', '10000427', 'ARIF', '::1', '2023-09-13 11:21:54', NULL, NULL, NULL),
	(3, 'PNJ20230003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2023-09-13 13:59:03', '10000427', 'ARIF', '::1', '2023-09-13 13:59:03', NULL, NULL, NULL),
	(4, 'PNJ20230004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '2023-09-14 16:34:00', '10000427', 'ARIF', '::1', '2023-09-14 16:34:00', NULL, NULL, NULL);
/*!40000 ALTER TABLE `dapok_tb_penjemput` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.dc_ta_periode
CREATE TABLE IF NOT EXISTS `dc_ta_periode` (
  `periode_id` int(11) NOT NULL AUTO_INCREMENT,
  `periode_nama` varchar(50) NOT NULL,
  `periode_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`periode_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.dc_ta_periode: ~3 rows (approximately)
/*!40000 ALTER TABLE `dc_ta_periode` DISABLE KEYS */;
INSERT INTO `dc_ta_periode` (`periode_id`, `periode_nama`, `periode_aktif`, `created_at`, `updated_at`) VALUES
	(1, '2022', 'Y', '2022-07-16 20:32:51', '2023-06-16 11:19:30'),
	(2, '2023', 'Y', '2022-07-16 20:33:10', '2023-06-16 11:19:35');
/*!40000 ALTER TABLE `dc_ta_periode` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.sistem_ta_agama
CREATE TABLE IF NOT EXISTS `sistem_ta_agama` (
  `agama_id` int(11) NOT NULL AUTO_INCREMENT,
  `agama_nama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` enum('Y','T') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`agama_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dbspf_daycare.sistem_ta_agama: ~2 rows (approximately)
/*!40000 ALTER TABLE `sistem_ta_agama` DISABLE KEYS */;
INSERT INTO `sistem_ta_agama` (`agama_id`, `agama_nama`, `created_at`, `updated_at`, `is_aktif`) VALUES
	(1, 'Islam', '2022-07-21 15:26:13', '2022-07-21 15:26:13', 'Y'),
	(2, 'Kristen', '2022-07-21 15:26:18', '2022-07-21 15:26:18', 'Y');
/*!40000 ALTER TABLE `sistem_ta_agama` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.sistem_ta_jenis_pekerjaan
CREATE TABLE IF NOT EXISTS `sistem_ta_jenis_pekerjaan` (
  `kerja_id` int(11) NOT NULL AUTO_INCREMENT,
  `kerja_nama` varchar(50) DEFAULT '',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` enum('Y','T') DEFAULT 'Y',
  PRIMARY KEY (`kerja_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.sistem_ta_jenis_pekerjaan: ~5 rows (approximately)
/*!40000 ALTER TABLE `sistem_ta_jenis_pekerjaan` DISABLE KEYS */;
INSERT INTO `sistem_ta_jenis_pekerjaan` (`kerja_id`, `kerja_nama`, `created_at`, `updated_at`, `aktif`) VALUES
	(1, 'PNS', '2022-07-18 10:21:14', '2022-09-14 13:06:10', 'Y'),
	(2, 'Karyawan Swasta', '2022-07-18 10:21:22', '2022-09-14 13:11:39', 'Y'),
	(3, 'Wirausaha', '2022-07-18 10:21:31', '2022-07-18 10:21:31', 'Y'),
	(4, 'BUMN', '2022-07-18 10:22:15', '2022-09-14 10:35:02', 'Y'),
	(8, 'Wiraswasta', '2022-09-14 10:10:56', '2022-09-14 10:10:56', 'Y');
/*!40000 ALTER TABLE `sistem_ta_jenis_pekerjaan` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.sistem_tb_grup
CREATE TABLE IF NOT EXISTS `sistem_tb_grup` (
  `grup_id` int(11) NOT NULL AUTO_INCREMENT,
  `grup_kode` varchar(50) DEFAULT '',
  `grup_nama` varchar(50) DEFAULT '',
  `grup_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`grup_id`) USING BTREE,
  UNIQUE KEY `grup_kode` (`grup_kode`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.sistem_tb_grup: ~6 rows (approximately)
/*!40000 ALTER TABLE `sistem_tb_grup` DISABLE KEYS */;
INSERT INTO `sistem_tb_grup` (`grup_id`, `grup_kode`, `grup_nama`, `grup_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'SP', 'Semen Padang', 'Y', '2022-07-16 20:29:24', NULL, NULL, NULL, '2023-09-07 09:26:15', NULL, NULL, NULL),
	(2, 'YSP', 'Yayasan Semen Padang', 'Y', '2023-09-07 09:25:15', NULL, NULL, NULL, '2023-09-07 09:25:39', NULL, NULL, NULL),
	(3, 'SPH', 'Semen Padang Hospital', 'Y', '2023-09-07 09:24:43', NULL, NULL, NULL, '2023-09-07 09:25:51', NULL, NULL, NULL),
	(4, 'KLISEPA', 'Klinik Semen Padang', 'Y', '2023-09-07 09:25:03', NULL, NULL, NULL, '2023-09-07 09:25:55', NULL, NULL, NULL),
	(5, 'APLP', 'APLP', 'T', '2022-07-16 20:30:19', NULL, NULL, NULL, '2023-09-07 09:25:58', NULL, NULL, NULL),
	(6, 'UMU', 'Umum', 'Y', '2022-07-16 20:30:05', NULL, NULL, NULL, '2023-09-07 09:26:00', NULL, NULL, NULL);
/*!40000 ALTER TABLE `sistem_tb_grup` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.tarif_ta_diskon
CREATE TABLE IF NOT EXISTS `tarif_ta_diskon` (
  `diskon_id` int(11) NOT NULL AUTO_INCREMENT,
  `diskon_nama` varchar(50) NOT NULL,
  `diskon_persen` double(14,0) NOT NULL DEFAULT '0',
  `diskon_nominal` double(14,0) NOT NULL DEFAULT '0',
  `diskon_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` varchar(50) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`diskon_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.tarif_ta_diskon: ~4 rows (approximately)
/*!40000 ALTER TABLE `tarif_ta_diskon` DISABLE KEYS */;
INSERT INTO `tarif_ta_diskon` (`diskon_id`, `diskon_nama`, `diskon_persen`, `diskon_nominal`, `diskon_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'Registrasi', 0, 0, 'Y', '2023-09-08 10:32:03', NULL, NULL, NULL, '2023-09-08 10:32:03', NULL, NULL, NULL),
	(2, 'Gizi', 0, 0, 'Y', '2023-09-08 10:32:03', NULL, NULL, NULL, '2023-09-08 10:32:03', NULL, NULL, NULL),
	(3, 'SPP', 0, 0, 'Y', '2023-09-08 10:32:03', NULL, NULL, NULL, '2023-09-08 10:32:03', NULL, NULL, NULL),
	(4, 'Pembangunan', 0, 0, 'Y', '2023-09-08 10:32:03', NULL, NULL, NULL, '2023-09-08 10:32:03', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tarif_ta_diskon` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.tarif_ta_jenis
CREATE TABLE IF NOT EXISTS `tarif_ta_jenis` (
  `jenis_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kode` varchar(50) NOT NULL,
  `jenis_nama` varchar(50) NOT NULL,
  `jenis_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` varchar(50) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`jenis_id`) USING BTREE,
  UNIQUE KEY `jenis_kode` (`jenis_kode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.tarif_ta_jenis: ~2 rows (approximately)
/*!40000 ALTER TABLE `tarif_ta_jenis` DISABLE KEYS */;
INSERT INTO `tarif_ta_jenis` (`jenis_id`, `jenis_kode`, `jenis_nama`, `jenis_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'JN0001', 'Tarif', 'Y', '2023-09-08 10:31:50', NULL, NULL, NULL, '2023-09-12 16:08:48', NULL, NULL, NULL),
	(2, 'JN0002', 'Biaya Tambahan', 'Y', '2023-09-08 10:31:50', NULL, NULL, NULL, '2023-09-12 16:08:54', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tarif_ta_jenis` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.tarif_ta_kategori
CREATE TABLE IF NOT EXISTS `tarif_ta_kategori` (
  `kat_id` int(11) NOT NULL AUTO_INCREMENT,
  `kat_kode` varchar(50) NOT NULL,
  `kat_nama` varchar(50) NOT NULL,
  `kat_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` varchar(50) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kat_id`) USING BTREE,
  UNIQUE KEY `kat_kode` (`kat_kode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dbspf_daycare.tarif_ta_kategori: ~2 rows (approximately)
/*!40000 ALTER TABLE `tarif_ta_kategori` DISABLE KEYS */;
INSERT INTO `tarif_ta_kategori` (`kat_id`, `kat_kode`, `kat_nama`, `kat_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'KT0001', 'Member', 'Y', '2023-09-08 10:31:42', NULL, NULL, NULL, '2023-09-12 16:31:42', NULL, NULL, NULL),
	(2, 'KT0002', 'Harian', 'Y', '2023-09-08 10:31:42', NULL, NULL, NULL, '2023-09-12 16:31:46', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tarif_ta_kategori` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.tarif_tb_item
CREATE TABLE IF NOT EXISTS `tarif_tb_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_kode` varchar(50) NOT NULL,
  `jenis_id` int(11) DEFAULT '0',
  `item_nama` varchar(255) DEFAULT NULL,
  `item_nominal` double(14,0) DEFAULT '0',
  `item_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` varchar(50) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` varchar(50) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`item_id`) USING BTREE,
  UNIQUE KEY `tarif_kode` (`item_kode`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.tarif_tb_item: ~4 rows (approximately)
/*!40000 ALTER TABLE `tarif_tb_item` DISABLE KEYS */;
INSERT INTO `tarif_tb_item` (`item_id`, `item_kode`, `jenis_id`, `item_nama`, `item_nominal`, `item_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'ITM0001', 2, 'Registrasi', 250000, 'Y', '2023-05-29 15:25:05', '10000427', 'ARIF', '::1', '2023-09-08 09:58:11', '10000427', 'ARIF', '::1'),
	(2, 'ITM0002', 2, 'Gizi', 300000, 'Y', '2023-05-30 15:19:24', '10000427', 'ARIF', '::1', '2023-09-08 09:58:20', '10000427', 'ARIF', '::1'),
	(3, 'ITM0003', 2, 'SPP', 1000000, 'Y', '2023-06-05 10:36:47', '2087075', 'HAQQUL', '::1', '2023-09-08 09:58:24', '10000427', 'ARIF', '::1'),
	(8, 'ITM0004', 2, 'Pembangunan', 2700000, 'Y', '2023-09-08 09:57:37', NULL, NULL, NULL, '2023-09-08 09:58:32', NULL, NULL, NULL),
	(9, 'ITM0005', 1, 'Biaya Harian', 100000, 'Y', '2023-09-11 08:21:30', NULL, NULL, NULL, '2023-09-11 08:21:30', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tarif_tb_item` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.tarif_tc_tarif
CREATE TABLE IF NOT EXISTS `tarif_tc_tarif` (
  `tarif_id` int(11) NOT NULL AUTO_INCREMENT,
  `tarif_kode` varchar(50) NOT NULL,
  `jenis_kode` varchar(50) DEFAULT NULL,
  `kat_kode` varchar(50) DEFAULT NULL,
  `tarif_nama` varchar(255) DEFAULT NULL,
  `tarif_total` double(14,0) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tarif_id`) USING BTREE,
  UNIQUE KEY `tarif_kode` (`tarif_kode`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dbspf_daycare.tarif_tc_tarif: ~2 rows (approximately)
/*!40000 ALTER TABLE `tarif_tc_tarif` DISABLE KEYS */;
INSERT INTO `tarif_tc_tarif` (`tarif_id`, `tarif_kode`, `jenis_kode`, `kat_kode`, `tarif_nama`, `tarif_total`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'PKT0001', 'JN0002', 'KT0001', 'Biaya Gizi', 300000, '2023-09-12 16:39:51', 10000427, 'ARIF', '::1', '2023-09-12 16:39:51', NULL, NULL, NULL),
	(2, 'PKT0002', 'JN0001', 'KT0002', 'Tarif Harian', 100000, '2023-09-12 16:41:44', 10000427, 'ARIF', '::1', '2023-09-12 16:41:44', NULL, NULL, NULL),
	(3, 'PKT0003', 'JN0001', 'KT0001', 'Full Day', 4250000, '2023-09-12 16:42:35', 10000427, 'ARIF', '::1', '2023-09-12 16:42:35', NULL, NULL, NULL),
	(4, 'PKT0004', 'JN0001', 'KT0001', 'Half Day', 4250000, '2023-09-13 08:42:53', 10000427, 'ARIF', '::1', '2023-09-13 08:42:53', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tarif_tc_tarif` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.tarif_tc_tarif_detail
CREATE TABLE IF NOT EXISTS `tarif_tc_tarif_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `tarif_kode` varchar(50) DEFAULT NULL,
  `item_kode` varchar(50) DEFAULT NULL,
  `detail_nama` varchar(255) DEFAULT NULL,
  `detail_total` double(14,0) DEFAULT '0',
  `detail_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`detail_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.tarif_tc_tarif_detail: ~8 rows (approximately)
/*!40000 ALTER TABLE `tarif_tc_tarif_detail` DISABLE KEYS */;
INSERT INTO `tarif_tc_tarif_detail` (`detail_id`, `tarif_kode`, `item_kode`, `detail_nama`, `detail_total`, `detail_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'PKT0001', 'ITM0002', 'Gizi', 300000, 'Y', '2023-09-12 16:39:49', 10000427, 'ARIF', '::1', '2023-09-12 16:39:51', NULL, NULL, NULL),
	(2, 'PKT0002', 'ITM0005', 'Biaya Harian', 100000, 'Y', '2023-09-12 16:41:42', 10000427, 'ARIF', '::1', '2023-09-12 16:41:44', NULL, NULL, NULL),
	(3, 'PKT0003', 'ITM0003', 'SPP', 1000000, 'Y', '2023-09-12 16:42:01', 10000427, 'ARIF', '::1', '2023-09-12 16:42:35', NULL, NULL, NULL),
	(4, 'PKT0003', 'ITM0001', 'Registrasi', 250000, 'Y', '2023-09-12 16:42:04', 10000427, 'ARIF', '::1', '2023-09-12 16:42:35', NULL, NULL, NULL),
	(5, 'PKT0003', 'ITM0002', 'Gizi', 300000, 'Y', '2023-09-12 16:42:09', 10000427, 'ARIF', '::1', '2023-09-12 16:42:35', NULL, NULL, NULL),
	(6, 'PKT0003', 'ITM0004', 'Pembangunan', 2700000, 'Y', '2023-09-12 16:42:21', 10000427, 'ARIF', '::1', '2023-09-12 16:42:35', NULL, NULL, NULL),
	(7, 'PKT0004', 'ITM0001', 'Registrasi', 250000, 'Y', '2023-09-13 08:42:42', 10000427, 'ARIF', '::1', '2023-09-13 08:42:53', NULL, NULL, NULL),
	(8, 'PKT0004', 'ITM0003', 'SPP', 1000000, 'Y', '2023-09-13 08:42:46', 10000427, 'ARIF', '::1', '2023-09-13 08:42:53', NULL, NULL, NULL),
	(9, 'PKT0004', 'ITM0002', 'Gizi', 300000, 'Y', '2023-09-13 08:42:48', 10000427, 'ARIF', '::1', '2023-09-13 08:42:53', NULL, NULL, NULL),
	(10, 'PKT0004', 'ITM0004', 'Pembangunan', 2700000, 'Y', '2023-09-13 08:42:51', 10000427, 'ARIF', '::1', '2023-09-13 08:42:53', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tarif_tc_tarif_detail` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbspf_daycare.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'arif', 'arif@gmail.com', NULL, '$2y$10$mAdlo9POiD/9/MEv6bWAFOfSNFCuuiRjjErtAYu/YouXHgoRK44XW', 'l4AFudzsle5GQOIRqU9J5Kp4bbbGS6qh0gAqmo0YjTyDo4O9PqRkSg3kLWTP', '2022-07-14 08:25:38', '2022-07-14 08:25:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
