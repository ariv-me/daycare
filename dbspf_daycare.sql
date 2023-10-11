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

-- Dumping structure for table dbspf_daycare.bayar_tc
CREATE TABLE IF NOT EXISTS `bayar_tc` (
  `bayar_id` int(11) NOT NULL AUTO_INCREMENT,
  `bayar_kode` varchar(50) DEFAULT NULL,
  `trs_kode` varchar(50) DEFAULT NULL,
  `anak_kode` varchar(50) DEFAULT NULL,
  `bayar_tgl` date DEFAULT NULL,
  `bayar_diskon` double(14,0) DEFAULT '0',
  `bayar_total` double(14,0) DEFAULT '0',
  `bayar_sub_total` double(14,0) DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dbspf_daycare.bayar_tc: ~0 rows (approximately)
/*!40000 ALTER TABLE `bayar_tc` DISABLE KEYS */;
INSERT IGNORE INTO `bayar_tc` (`bayar_id`, `bayar_kode`, `trs_kode`, `anak_kode`, `bayar_tgl`, `bayar_diskon`, `bayar_total`, `bayar_sub_total`, `bayar_ket`, `bayar_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`) VALUES
	(1, 'BYR0001', 'TAG20230001', 'NIS20230001', '2023-10-06', 0, 50000, 3050000, NULL, 'Y', '2023-10-06 16:08:43', 10000427, 'ARIF', '::1', '2023-10-06 16:08:43', NULL, NULL),
	(2, 'BYR0002', 'TAG20230003', 'NIS20230003', '2023-10-09', 0, 2000000, 4050000, NULL, 'Y', '2023-10-09 10:56:44', 10000427, 'ARIF', '::1', '2023-10-09 10:56:44', NULL, NULL),
	(3, 'BYR0003', 'TAG20230004', 'NIS20230003', '2023-10-09', 0, 20000, 20000, NULL, 'Y', '2023-10-09 11:02:36', 10000427, 'ARIF', '::1', '2023-10-09 11:02:36', NULL, NULL),
	(4, 'BYR0004', 'TAG20230003', 'NIS20230003', '2023-10-09', 0, 2050000, 2050000, NULL, 'Y', '2023-10-09 11:02:48', 10000427, 'ARIF', '::1', '2023-10-09 11:02:48', NULL, NULL);
/*!40000 ALTER TABLE `bayar_tc` ENABLE KEYS */;

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
INSERT IGNORE INTO `ctrg_ta_menu_kategori` (`kat_id`, `kat_nama`, `kat_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
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

-- Dumping data for table dbspf_daycare.ctrg_tb_menu: ~5 rows (approximately)
/*!40000 ALTER TABLE `ctrg_tb_menu` DISABLE KEYS */;
INSERT IGNORE INTO `ctrg_tb_menu` (`menu_id`, `menu_kode`, `kat_id`, `menu_nama`, `menu_harga`, `menu_harga_jual`, `is_aktif`, `created_nip`, `created_nama`, `created_ip`, `created_at`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
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

-- Dumping data for table dbspf_daycare.ctrg_tc_order: ~12 rows (approximately)
/*!40000 ALTER TABLE `ctrg_tc_order` DISABLE KEYS */;
INSERT IGNORE INTO `ctrg_tc_order` (`order_id`, `order_kode`, `order_tgl`, `order_jam`, `order_closed`, `kar_id`, `kar_nama`, `usaha_id`, `usaha_nama`, `order_status`, `order_total`, `order_tax`, `order_tax_rupiah`, `order_grand_total`, `order_bayar`, `order_kembali`, `is_aktif`, `created_at`, `created_ip`, `updated_at`, `updated_ip`, `updated_nip`, `updated_nama`) VALUES
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.ctrg_tc_order_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `ctrg_tc_order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `ctrg_tc_order_detail` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.daftar_tc_member
CREATE TABLE IF NOT EXISTS `daftar_tc_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_kode` varchar(50) DEFAULT NULL,
  `anak_kode` varchar(50) NOT NULL DEFAULT '',
  `periode_id` varchar(50) DEFAULT '',
  `tarif_kode` varchar(50) NOT NULL DEFAULT '',
  `grup_kode` varchar(50) NOT NULL DEFAULT '',
  `kat_kode` varchar(50) NOT NULL DEFAULT '',
  `member_diskon` double(14,0) DEFAULT '0',
  `member_sub_total` double(14,0) DEFAULT '0',
  `member_total` double(14,0) DEFAULT '0',
  `member_aktif` enum('Y','T') NOT NULL DEFAULT 'Y',
  `member_status` enum('L','U') NOT NULL DEFAULT 'U',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`member_id`) USING BTREE,
  UNIQUE KEY `trs_kode` (`member_kode`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.daftar_tc_member: ~1 rows (approximately)
/*!40000 ALTER TABLE `daftar_tc_member` DISABLE KEYS */;
INSERT IGNORE INTO `daftar_tc_member` (`member_id`, `member_kode`, `anak_kode`, `periode_id`, `tarif_kode`, `grup_kode`, `kat_kode`, `member_diskon`, `member_sub_total`, `member_total`, `member_aktif`, `member_status`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'MBR20230001', 'NIS20230001', '1', 'PKT0005', 'SPG', 'KT0001', 0, 0, 0, 'Y', 'U', '2023-10-06 15:49:13', 10000427, 'ARIF', '::1', '2023-10-09 10:31:00', 10000427, 'ARIF', '::1'),
	(4, 'MBR20230002', 'NIS20230002', '2', 'PKT0004', 'UMUM', 'KT0001', 0, 0, 0, 'Y', 'U', '2023-10-09 09:17:58', 10000427, 'ARIF', '::1', '2023-10-09 09:17:58', NULL, NULL, NULL),
	(5, 'MBR20230003', 'NIS20230003', '2', 'PKT0004', 'UMUM', 'KT0001', 0, 0, 0, 'Y', 'U', '2023-10-09 09:24:51', 10000427, 'ARIF', '::1', '2023-10-09 10:31:27', 10000427, 'ARIF', '::1');
/*!40000 ALTER TABLE `daftar_tc_member` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.daftar_tc_transaksi
CREATE TABLE IF NOT EXISTS `daftar_tc_transaksi` (
  `trs_id` int(11) NOT NULL AUTO_INCREMENT,
  `trs_kode` varchar(50) DEFAULT NULL,
  `trs_tgl` date DEFAULT NULL,
  `trs_jatuh_tempo` date DEFAULT NULL,
  `periode_id` int(11) DEFAULT '0',
  `anak_kode` varchar(50) NOT NULL DEFAULT '',
  `tarif_kode` varchar(50) NOT NULL DEFAULT '',
  `grup_kode` varchar(50) NOT NULL DEFAULT '',
  `kat_kode` varchar(50) NOT NULL DEFAULT '',
  `trs_diskon` double(14,0) DEFAULT '0',
  `trs_sub_total` double(14,0) DEFAULT '0',
  `trs_total` double(14,0) DEFAULT '0',
  `trs_sisa` double(14,0) DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.daftar_tc_transaksi: ~1 rows (approximately)
/*!40000 ALTER TABLE `daftar_tc_transaksi` DISABLE KEYS */;
INSERT IGNORE INTO `daftar_tc_transaksi` (`trs_id`, `trs_kode`, `trs_tgl`, `trs_jatuh_tempo`, `periode_id`, `anak_kode`, `tarif_kode`, `grup_kode`, `kat_kode`, `trs_diskon`, `trs_sub_total`, `trs_total`, `trs_sisa`, `trs_aktif`, `trs_status`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'TAG20230001', '2023-10-06', '2023-11-06', 1, 'NIS20230001', 'PKT0005', 'SPG', 'KT0001', 0, 3050000, 3050000, 3000000, 'Y', 'U', '2023-10-06 15:49:13', 10000427, 'ARIF', '::1', '2023-10-09 10:31:00', 10000427, 'ARIF', '::1'),
	(4, 'TAG20230002', '2023-10-09', '2023-11-09', 2, 'NIS20230002', 'PKT0004', 'UMUM', 'KT0001', 0, 0, 4050000, 4050000, 'Y', 'U', '2023-10-09 09:17:58', 10000427, 'ARIF', '::1', '2023-10-09 09:17:58', NULL, NULL, NULL),
	(5, 'TAG20230003', '2023-10-09', '2023-11-09', 2, 'NIS20230003', 'PKT0004', 'UMUM', 'KT0001', 0, 4050000, 4050000, 0, 'Y', 'L', '2023-10-09 09:24:51', 10000427, 'ARIF', '::1', '2023-10-09 11:02:48', 10000427, 'ARIF', '::1'),
	(6, 'TAG20230004', '2023-10-09', '2023-11-09', 2, 'NIS20230003', 'PKT0009', 'UMUM', 'KT0001', 0, 20000, 20000, 0, 'Y', 'L', '2023-10-09 11:01:34', 10000427, 'ARIF', '::1', '2023-10-09 11:02:36', NULL, NULL, NULL),
	(7, 'TAG20230005', '2023-10-10', '2023-10-31', 2, 'NIS20230003', 'PKT0009', 'UMUM', 'KT0001', 0, 40000, 40000, 40000, 'Y', 'U', '2023-10-10 09:49:16', 10000427, 'ARIF', '::1', '2023-10-10 09:49:16', NULL, NULL, NULL);
/*!40000 ALTER TABLE `daftar_tc_transaksi` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.daftar_tc_transaksi_detail
CREATE TABLE IF NOT EXISTS `daftar_tc_transaksi_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_kode` varchar(50) DEFAULT NULL,
  `trs_kode` varchar(50) DEFAULT NULL,
  `anak_kode` varchar(50) DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL,
  `grup_kode` varchar(50) DEFAULT NULL,
  `kat_kode` varchar(50) DEFAULT NULL,
  `tarif_kode` varchar(50) DEFAULT NULL,
  `detail_total` double(14,0) DEFAULT '0',
  `detail_qty` double(14,0) DEFAULT '1',
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table dbspf_daycare.daftar_tc_transaksi_detail: ~1 rows (approximately)
/*!40000 ALTER TABLE `daftar_tc_transaksi_detail` DISABLE KEYS */;
INSERT IGNORE INTO `daftar_tc_transaksi_detail` (`detail_id`, `detail_kode`, `trs_kode`, `anak_kode`, `periode_id`, `grup_kode`, `kat_kode`, `tarif_kode`, `detail_total`, `detail_qty`, `detail_aktif`, `daftar_ket`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(3, 'DTL0001', 'TAG20230001', 'NIS20230001', 1, 'UMUM', 'KT0001', 'PKT0005', 3050000, 1, 'Y', NULL, '2023-10-06 15:48:41', 10000427, 'ARIF', '::1', '2023-10-06 15:49:13', NULL, NULL, NULL),
	(4, 'DTL0002', 'TAG20230002', 'NIS20230002', 1, 'SPG', 'KT0001', 'PKT0004', 4050000, 1, 'Y', NULL, '2023-10-09 09:08:19', 10000427, 'ARIF', '::1', '2023-10-09 09:17:58', NULL, NULL, NULL),
	(5, 'DTL0003', 'TAG20230003', 'NIS20230003', 2, 'UMUM', 'KT0003', 'PKT0004', 4050000, 1, 'T', NULL, '2023-10-09 09:24:45', 10000427, 'ARIF', '::1', '2023-10-09 11:02:48', NULL, NULL, NULL),
	(6, 'DTL0004', 'TAG20230004', 'NIS20230003', 2, 'UMUM', 'KT0001', 'PKT0009', 20000, 1, 'T', NULL, '2023-10-09 11:01:28', 10000427, 'ARIF', '::1', '2023-10-09 11:02:36', NULL, NULL, NULL),
	(8, 'DTL0005', 'TAG20230005', 'NIS20230003', NULL, NULL, NULL, 'PKT0009', 40000, 2, 'Y', NULL, '2023-10-10 09:40:17', 10000427, 'ARIF', '::1', '2023-10-10 09:49:16', NULL, NULL, NULL);
/*!40000 ALTER TABLE `daftar_tc_transaksi_detail` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.dapok_tb_anak
CREATE TABLE IF NOT EXISTS `dapok_tb_anak` (
  `anak_id` int(11) NOT NULL AUTO_INCREMENT,
  `anak_kode` varchar(50) DEFAULT NULL,
  `ortu_kode` varchar(50) DEFAULT NULL,
  `pnj_kode` varchar(50) DEFAULT NULL,
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
  `anak_foto` varchar(50) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table dbspf_daycare.dapok_tb_anak: ~1 rows (approximately)
/*!40000 ALTER TABLE `dapok_tb_anak` DISABLE KEYS */;
INSERT IGNORE INTO `dapok_tb_anak` (`anak_id`, `anak_kode`, `ortu_kode`, `pnj_kode`, `anak_nama`, `anak_jekel`, `anak_tmp_lahir`, `anak_tgl_lahir`, `anak_ke`, `anak_jml_saudara`, `anak_berat`, `anak_tinggi`, `anak_alamat`, `anak_status`, `agama_id`, `anak_aktif`, `anak_foto`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'NIS20230001', 'ORTU20230001', NULL, 'Hiro', 'P', 'Padang', '2019-09-29', 1, 0, 19, '30', NULL, 'A', 'undefined', 'Y', NULL, '2023-10-06 15:49:13', 10000427, 'ARIF', '::1', '2023-10-09 10:31:00', 10000427, 'ARIF', '::1'),
	(4, 'NIS20230002', 'ORTU20230001', NULL, 'Kiro', 'L', 'Padang', '2020-10-02', 1, 0, 19, '30', NULL, 'A', 'undefined', 'Y', NULL, '2023-10-09 09:17:58', 10000427, 'ARIF', '::1', '2023-10-09 09:17:58', NULL, NULL, NULL),
	(5, 'NIS20230003', 'ORTU20230002', NULL, 'Jasmin', 'P', 'Padang', '2023-01-29', 1, 0, 19, '30', NULL, 'A', 'undefined', 'Y', NULL, '2023-10-09 09:24:51', 10000427, 'ARIF', '::1', '2023-10-09 10:31:27', 10000427, 'ARIF', '::1');
/*!40000 ALTER TABLE `dapok_tb_anak` ENABLE KEYS */;

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
  `prov_kode` int(11) DEFAULT NULL,
  `kota_kode` int(11) DEFAULT NULL,
  `kec_kode` int(11) DEFAULT NULL,
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
INSERT IGNORE INTO `dapok_tb_ortu` (`ortu_id`, `ortu_kode`, `ortu_ayah`, `ortu_ayah_nik`, `ortu_ayah_kerja`, `ortu_ayah_hp`, `ortu_ayah_pdk_id`, `ortu_ayah_wa`, `ortu_ayah_tgl_lahir`, `ortu_ayah_tmp_lahir`, `ortu_ayah_agama_id`, `ortu_ibu`, `ortu_ibu_nik`, `ortu_ibu_pdk_id`, `ortu_ibu_tmp_lahir`, `ortu_ibu_tgl_lahir`, `ortu_ibu_kerja`, `ortu_ibu_agama_id`, `ortu_ibu_hp`, `ortu_ibu_wa`, `prov_kode`, `kota_kode`, `kec_kode`, `ortu_alamat`, `ortu_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'ORTU20230001', 'Anonymus', 12321323, 'Pengusaha', '08192321312', 3, '08192321312', '1990-05-15', 'Padang', 1, 'Wanda', 34324, 3, 'Solok Selatan', '1990-09-29', 'IRT', 1, '08192321312', '08192321312', 13, 1371, 1371080, 'LUBANG BATU', 'Y', '2023-10-06 15:49:13', '10000427', 'ARIF', '::1', '2023-10-09 10:31:00', '10000427', 'ARIF', '::1'),
	(2, 'ORTU20230002', 'Agus', 12321323, 'Pengusaha', '08192321312', 6, '08192321312', '2023-10-20', 'Padang', 1, 'Yanti', 34324, 6, 'Solok Selatan', '1990-10-31', 'IRT', 1, '08192321312', '08192321312', 13, 1371, 1371110, 'Padang', 'Y', '2023-10-09 09:24:51', '10000427', 'ARIF', '::1', '2023-10-09 10:31:27', '10000427', 'ARIF', '::1');
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
  `pnj_prov_kode` int(11) DEFAULT NULL,
  `pnj_kota_kode` int(11) DEFAULT NULL,
  `pnj_kec_kode` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.dapok_tb_penjemput: ~0 rows (approximately)
/*!40000 ALTER TABLE `dapok_tb_penjemput` DISABLE KEYS */;
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

-- Dumping data for table dbspf_daycare.dc_ta_periode: ~2 rows (approximately)
/*!40000 ALTER TABLE `dc_ta_periode` DISABLE KEYS */;
INSERT IGNORE INTO `dc_ta_periode` (`periode_id`, `periode_nama`, `periode_aktif`, `created_at`, `updated_at`) VALUES
	(1, '2022', 'Y', '2023-09-21 14:19:44', '2023-09-21 14:19:44'),
	(2, '2023', 'Y', '2023-09-21 14:19:53', '2023-09-21 14:19:53');
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
INSERT IGNORE INTO `sistem_ta_agama` (`agama_id`, `agama_nama`, `created_at`, `updated_at`, `is_aktif`) VALUES
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
INSERT IGNORE INTO `sistem_ta_jenis_pekerjaan` (`kerja_id`, `kerja_nama`, `created_at`, `updated_at`, `aktif`) VALUES
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

-- Dumping data for table dbspf_daycare.sistem_tb_grup: ~2 rows (approximately)
/*!40000 ALTER TABLE `sistem_tb_grup` DISABLE KEYS */;
INSERT IGNORE INTO `sistem_tb_grup` (`grup_id`, `grup_kode`, `grup_nama`, `grup_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'SPG', 'Semen Padang Grup', 'Y', '2022-07-16 20:29:24', NULL, NULL, NULL, '2023-10-03 15:11:30', NULL, NULL, NULL),
	(6, 'UMUM', 'Umum', 'Y', '2022-07-16 20:30:05', NULL, NULL, NULL, '2023-10-03 15:11:36', NULL, NULL, NULL);
/*!40000 ALTER TABLE `sistem_tb_grup` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.sistem_tb_grup_detail
CREATE TABLE IF NOT EXISTS `sistem_tb_grup_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `grup_kode` varchar(50) DEFAULT '',
  `detail_kode` varchar(50) DEFAULT '',
  `detail_nama` varchar(50) DEFAULT '',
  `detail_aktif` enum('Y','T') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_nip` int(11) DEFAULT NULL,
  `created_nama` varchar(100) DEFAULT NULL,
  `created_ip` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_nip` int(11) DEFAULT NULL,
  `updated_nama` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`detail_id`) USING BTREE,
  UNIQUE KEY `grup_kode` (`detail_kode`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.sistem_tb_grup_detail: ~5 rows (approximately)
/*!40000 ALTER TABLE `sistem_tb_grup_detail` DISABLE KEYS */;
INSERT IGNORE INTO `sistem_tb_grup_detail` (`detail_id`, `grup_kode`, `detail_kode`, `detail_nama`, `detail_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'SPG', 'SP', 'Semen Padang', 'Y', '2022-07-16 20:29:24', NULL, NULL, NULL, '2023-10-03 15:11:50', NULL, NULL, NULL),
	(2, 'SPG', 'YSP', 'Yayasan Semen Padang', 'Y', '2023-09-07 09:25:15', NULL, NULL, NULL, '2023-10-03 15:11:51', NULL, NULL, NULL),
	(3, 'SPG', 'SPH', 'Semen Padang Hospital', 'Y', '2023-09-07 09:24:43', NULL, NULL, NULL, '2023-10-03 15:11:53', NULL, NULL, NULL),
	(4, 'SPG', 'KLISEPA', 'Klinik Semen Padang', 'Y', '2023-09-07 09:25:03', NULL, NULL, NULL, '2023-10-03 15:12:02', NULL, NULL, NULL),
	(6, 'UMUM', 'UMU', 'Umum', 'Y', '2022-07-16 20:30:05', NULL, NULL, NULL, '2023-10-03 15:12:05', NULL, NULL, NULL);
/*!40000 ALTER TABLE `sistem_tb_grup_detail` ENABLE KEYS */;

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
INSERT IGNORE INTO `tarif_ta_diskon` (`diskon_id`, `diskon_nama`, `diskon_persen`, `diskon_nominal`, `diskon_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.tarif_ta_jenis: ~2 rows (approximately)
/*!40000 ALTER TABLE `tarif_ta_jenis` DISABLE KEYS */;
INSERT IGNORE INTO `tarif_ta_jenis` (`jenis_id`, `jenis_kode`, `jenis_nama`, `jenis_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'JN0001', 'Paket ', 'Y', '2023-09-08 10:31:50', NULL, NULL, NULL, '2023-10-02 07:50:03', NULL, NULL, NULL),
	(2, 'JN0002', 'Biaya ', 'Y', '2023-09-08 10:31:50', NULL, NULL, NULL, '2023-10-02 07:50:05', NULL, NULL, NULL),
	(3, 'JN0003', 'Tambahan', 'Y', '2023-10-02 07:39:28', NULL, NULL, NULL, '2023-10-02 07:50:08', NULL, NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dbspf_daycare.tarif_ta_kategori: ~2 rows (approximately)
/*!40000 ALTER TABLE `tarif_ta_kategori` DISABLE KEYS */;
INSERT IGNORE INTO `tarif_ta_kategori` (`kat_id`, `kat_kode`, `kat_nama`, `kat_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'KT0001', 'Member', 'Y', '2023-09-08 10:31:42', NULL, NULL, NULL, '2023-09-12 16:31:42', NULL, NULL, NULL),
	(2, 'KT0002', 'Harian', 'Y', '2023-09-08 10:31:42', NULL, NULL, NULL, '2023-09-12 16:31:46', NULL, NULL, NULL),
	(4, 'KT0003', 'Semua', 'Y', '2023-10-03 14:38:26', NULL, NULL, NULL, '2023-10-03 14:38:26', NULL, NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.tarif_tb_item: ~7 rows (approximately)
/*!40000 ALTER TABLE `tarif_tb_item` DISABLE KEYS */;
INSERT IGNORE INTO `tarif_tb_item` (`item_id`, `item_kode`, `jenis_id`, `item_nama`, `item_nominal`, `item_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'ITM0001', 2, 'Registrasi', 250000, 'Y', '2023-05-29 15:25:05', '10000427', 'ARIF', '::1', '2023-09-08 09:58:11', '10000427', 'ARIF', '::1'),
	(3, 'ITM0003', 2, 'Bulanan Half Day', 800000, 'Y', '2023-06-05 10:36:47', '2087075', 'HAQQUL', '::1', '2023-10-03 11:09:44', '10000427', 'ARIF', '::1'),
	(8, 'ITM0005', 2, 'Membership Umum 6 Bulan', 1750000, 'Y', '2023-09-08 09:57:37', NULL, NULL, NULL, '2023-10-03 11:10:54', NULL, NULL, NULL),
	(11, 'ITM0006', 2, 'Membership Umum 1 Tahun', 3000000, 'Y', '2023-10-03 10:59:01', NULL, NULL, NULL, '2023-10-03 11:10:59', NULL, NULL, NULL),
	(12, 'ITM0004', 2, 'Bulanan Full Day', 1300000, 'Y', '2023-10-03 11:04:15', NULL, NULL, NULL, '2023-10-03 11:09:48', NULL, NULL, NULL),
	(14, 'ITM0007', 2, 'Membership SP Group 6 Bulan', 1750000, 'Y', '2023-10-03 11:11:52', NULL, NULL, NULL, '2023-10-03 11:12:08', NULL, NULL, NULL),
	(15, 'ITM0008', 2, 'Membership SP Group 1 Tahun', 2700000, 'Y', '2023-10-03 11:14:25', NULL, NULL, NULL, '2023-10-03 11:14:29', NULL, NULL, NULL),
	(16, 'ITM0009', 3, 'Kelebihan Jam', 20000, 'Y', '2023-10-03 11:17:02', NULL, NULL, NULL, '2023-10-03 11:17:09', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tarif_tb_item` ENABLE KEYS */;

-- Dumping structure for table dbspf_daycare.tarif_tc_tarif
CREATE TABLE IF NOT EXISTS `tarif_tc_tarif` (
  `tarif_id` int(11) NOT NULL AUTO_INCREMENT,
  `tarif_kode` varchar(50) NOT NULL,
  `jenis_kode` varchar(50) DEFAULT NULL,
  `kat_kode` varchar(50) DEFAULT NULL,
  `grup_kode` varchar(50) DEFAULT NULL,
  `tarif_nama` varchar(255) DEFAULT NULL,
  `tarif_aktif` enum('Y','T') DEFAULT 'Y',
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table dbspf_daycare.tarif_tc_tarif: ~8 rows (approximately)
/*!40000 ALTER TABLE `tarif_tc_tarif` DISABLE KEYS */;
INSERT IGNORE INTO `tarif_tc_tarif` (`tarif_id`, `tarif_kode`, `jenis_kode`, `kat_kode`, `grup_kode`, `tarif_nama`, `tarif_aktif`, `tarif_total`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(1, 'PKT0001', 'JN0001', 'KT0001', 'UMUM', 'Membership Plus Umum 1 Tahun - Full Day', 'Y', 4550000, '2023-10-03 11:32:45', 10000427, 'ARIF', '::1', '2023-10-06 15:45:49', NULL, NULL, NULL),
	(3, 'PKT0002', 'JN0001', 'KT0001', 'UMUM', 'Membership Plus Umum 6 Bulan - Full Day', 'Y', 2800000, '2023-10-03 14:00:50', 10000427, 'ARIF', '::1', '2023-10-06 15:45:45', NULL, NULL, NULL),
	(4, 'PKT0003', 'JN0001', 'KT0001', 'UMUM', 'Membership Plus Umum 6 Bulan - Half Day', 'Y', 2800000, '2023-10-03 14:05:15', 10000427, 'ARIF', '::1', '2023-10-06 15:45:41', NULL, NULL, NULL),
	(5, 'PKT0004', 'JN0001', 'KT0001', 'UMUM', 'Membership Plus Umum 1 Tahun - Half Day', 'Y', 4050000, '2023-10-03 14:25:42', 10000427, 'ARIF', '::1', '2023-10-06 15:45:33', NULL, NULL, NULL),
	(6, 'PKT0005', 'JN0001', 'KT0001', 'SPG', 'Membership SP Group 6 Bulan - Full Day', 'Y', 3050000, '2023-10-03 14:27:16', 10000427, 'ARIF', '::1', '2023-10-06 15:46:37', NULL, NULL, NULL),
	(7, 'PKT0006', 'JN0001', 'KT0001', 'SPG', 'Membership SP Group 1 Tahun - Full Day', 'Y', 4000000, '2023-10-03 14:29:32', 10000427, 'ARIF', '::1', '2023-10-06 15:45:25', NULL, NULL, NULL),
	(8, 'PKT0007', 'JN0001', 'KT0001', 'SPG', 'Membership SP Group 6 Bulan - Half Day', 'Y', 2550000, '2023-10-03 14:31:15', 10000427, 'ARIF', '::1', '2023-10-06 15:45:21', NULL, NULL, NULL),
	(9, 'PKT0008', 'JN0001', 'KT0001', 'SPG', 'Membership SP Group 1 Tahun - Half Day', 'Y', 3500000, '2023-10-03 14:33:46', 10000427, 'ARIF', '::1', '2023-10-06 15:45:11', NULL, NULL, NULL),
	(10, 'PKT0009', 'JN0002', 'KT0003', 'UMUM', 'Kelibhan Jam Anak', 'Y', 20000, '2023-10-09 10:59:42', 10000427, 'ARIF', '::1', '2023-10-09 10:59:42', NULL, NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbspf_daycare.tarif_tc_tarif_detail: ~19 rows (approximately)
/*!40000 ALTER TABLE `tarif_tc_tarif_detail` DISABLE KEYS */;
INSERT IGNORE INTO `tarif_tc_tarif_detail` (`detail_id`, `tarif_kode`, `item_kode`, `detail_nama`, `detail_total`, `detail_aktif`, `created_at`, `created_nip`, `created_nama`, `created_ip`, `updated_at`, `updated_nip`, `updated_nama`, `updated_ip`) VALUES
	(10, 'PKT0001', 'ITM0004', 'Bulanan Full Day', 1300000, 'Y', '2023-10-03 13:38:47', 10000427, 'ARIF', '::1', '2023-10-03 13:38:47', NULL, NULL, NULL),
	(15, 'PKT0001', 'ITM0001', 'Registrasi', 250000, 'Y', '2023-10-03 13:56:24', 10000427, 'ARIF', '::1', '2023-10-03 13:56:24', NULL, NULL, NULL),
	(16, 'PKT0001', 'ITM0006', 'Membership Umum 1 Tahun', 3000000, 'Y', '2023-10-03 13:56:53', 10000427, 'ARIF', '::1', '2023-10-03 13:56:53', NULL, NULL, NULL),
	(22, 'PKT0002', 'ITM0005', 'Membership Umum 6 Bulan', 1750000, 'Y', '2023-10-03 14:00:03', 10000427, 'ARIF', '::1', '2023-10-03 14:00:50', NULL, NULL, NULL),
	(23, 'PKT0002', 'ITM0001', 'Registrasi', 250000, 'Y', '2023-10-03 14:00:09', 10000427, 'ARIF', '::1', '2023-10-03 14:00:50', NULL, NULL, NULL),
	(24, 'PKT0002', 'ITM0003', 'Bulanan Half Day', 800000, 'Y', '2023-10-03 14:00:24', 10000427, 'ARIF', '::1', '2023-10-03 14:00:50', NULL, NULL, NULL),
	(27, 'PKT0003', 'ITM0003', 'Bulanan Half Day', 800000, 'Y', '2023-10-03 14:21:01', 10000427, 'ARIF', '::1', '2023-10-03 14:21:01', NULL, NULL, NULL),
	(28, 'PKT0003', 'ITM0001', 'Registrasi', 250000, 'Y', '2023-10-03 14:21:19', 10000427, 'ARIF', '::1', '2023-10-03 14:21:19', NULL, NULL, NULL),
	(29, 'PKT0003', 'ITM0005', 'Membership Umum 6 Bulan', 1750000, 'Y', '2023-10-03 14:21:34', 10000427, 'ARIF', '::1', '2023-10-03 14:21:34', NULL, NULL, NULL),
	(30, 'PKT0004', 'ITM0006', 'Membership Umum 1 Tahun', 3000000, 'Y', '2023-10-03 14:25:10', 10000427, 'ARIF', '::1', '2023-10-03 14:25:42', NULL, NULL, NULL),
	(31, 'PKT0004', 'ITM0001', 'Registrasi', 250000, 'Y', '2023-10-03 14:25:14', 10000427, 'ARIF', '::1', '2023-10-03 14:25:42', NULL, NULL, NULL),
	(32, 'PKT0004', 'ITM0003', 'Bulanan Half Day', 800000, 'Y', '2023-10-03 14:25:26', 10000427, 'ARIF', '::1', '2023-10-03 14:25:42', NULL, NULL, NULL),
	(33, 'PKT0005', 'ITM0007', 'Membership SP Group 6 Bulan', 1750000, 'Y', '2023-10-03 14:27:07', 10000427, 'ARIF', '::1', '2023-10-03 14:27:16', NULL, NULL, NULL),
	(35, 'PKT0005', 'ITM0004', 'Bulanan Full Day', 1300000, 'Y', '2023-10-03 14:27:42', 10000427, 'ARIF', '::1', '2023-10-03 14:27:42', NULL, NULL, NULL),
	(36, 'PKT0006', 'ITM0008', 'Membership SP Group 1 Tahun', 2700000, 'Y', '2023-10-03 14:28:41', 10000427, 'ARIF', '::1', '2023-10-03 14:29:32', NULL, NULL, NULL),
	(37, 'PKT0006', 'ITM0004', 'Bulanan Full Day', 1300000, 'Y', '2023-10-03 14:29:22', 10000427, 'ARIF', '::1', '2023-10-03 14:29:32', NULL, NULL, NULL),
	(38, 'PKT0007', 'ITM0003', 'Bulanan Half Day', 800000, 'Y', '2023-10-03 14:31:04', 10000427, 'ARIF', '::1', '2023-10-03 14:31:15', NULL, NULL, NULL),
	(39, 'PKT0007', 'ITM0007', 'Membership SP Group 6 Bulan', 1750000, 'Y', '2023-10-03 14:31:10', 10000427, 'ARIF', '::1', '2023-10-03 14:31:15', NULL, NULL, NULL),
	(40, 'PKT0008', 'ITM0008', 'Membership SP Group 1 Tahun', 2700000, 'Y', '2023-10-03 14:33:10', 10000427, 'ARIF', '::1', '2023-10-03 14:33:46', NULL, NULL, NULL),
	(41, 'PKT0008', 'ITM0003', 'Bulanan Half Day', 800000, 'Y', '2023-10-03 14:33:39', 10000427, 'ARIF', '::1', '2023-10-03 14:33:46', NULL, NULL, NULL),
	(42, 'PKT0009', 'ITM0009', 'Kelebihan Jam', 20000, 'Y', '2023-10-09 10:59:40', 10000427, 'ARIF', '::1', '2023-10-09 10:59:42', NULL, NULL, NULL);
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
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'arif', 'arif@gmail.com', NULL, '$2y$10$mAdlo9POiD/9/MEv6bWAFOfSNFCuuiRjjErtAYu/YouXHgoRK44XW', 'l4AFudzsle5GQOIRqU9J5Kp4bbbGS6qh0gAqmo0YjTyDo4O9PqRkSg3kLWTP', '2022-07-14 08:25:38', '2022-07-14 08:25:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
