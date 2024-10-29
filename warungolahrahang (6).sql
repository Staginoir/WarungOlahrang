-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 02:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warungolahrahang`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `kd_bhn` char(10) NOT NULL,
  `nm_bhn` char(30) NOT NULL,
  `satuan` char(10) NOT NULL,
  `jml_bhn` int(3) NOT NULL,
  `hrg_bhn` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`kd_bhn`, `nm_bhn`, `satuan`, `jml_bhn`, `hrg_bhn`) VALUES
('ORB-001', 'Ayam Katsu', 'kilogram', 60, 3000000),
('ORB-002', 'Daging Sapi', 'kilogram', 15, 1200000),
('ORB-003', 'Telur ayam', 'kilogram', 30, 840000),
('ORB-004', 'Kentang', 'kilogram', 40, 1000000),
('ORB-005', 'Beras', 'kilogram', 25, 362500),
('ORB-006', 'lada hitam', 'botol', 2, 44000),
('ORB-007', 'mentai', 'kilogram', 2, 240000),
('ORB-008', 'cabai', 'kilogram', 2, 106000),
('ORB-009', 'garam', 'kilogram', 2, 24000),
('ORB-010', 'teriyaki', 'botol', 2, 126000),
('ORB-011', 'cumi', 'kilogram', 1, 31000),
('ORB-012', 'sosis', 'kilogram', 5, 217500),
('ORB-013', 'bawang bombai', 'kilogram', 3, 141000),
('ORB-014', 'tepung terigu protein sedang', 'kilogram', 3, 45000),
('ORB-015', 'tepung maizena', 'kilogram', 3, 75000),
('ORB-016', 'tepung roti', 'kilogram', 3, 36000),
('ORB-017', 'teh', 'kilogram', 2, 80000),
('ORB-018', 'air galon', 'galon', 10, 15000),
('ORB-019', 'jeruk', 'kilogram', 5, 100000),
('ORB-020', 'bakso', 'kilogram', 2, 60000),
('ORB-021', 'kecap', 'botol', 2, 80000),
('ORB-022', 'air botol', 'dus', 2, 150000),
('ORB-023', 'kari', 'kilogram', 1, 100000),
('ORB-024', 'bawang putih', 'kilogram', 1, 30000),
('ORB-025', 'bawang merah', 'kilogram', 1, 25000),
('ORB-026', 'sambosa', 'biji', 10, 50000),
('ORB-027', 'canai', 'biji', 10, 25000),
('ORB-028', 'bakpao', 'dus', 1, 75000),
('ORB-029', 'es', 'kilogram', 25, 375000),
('ORB-030', 'kopi', 'kilogram', 1, 120000),
('ORB-031', 'susu', 'liter', 25, 250000),
('ORB-032', 'minyak', 'liter', 25, 500000),
('ORB-033', 'gula', 'kilogram', 20, 240000),
('ORB-034', 'Penyedap rasa', 'kilogram', 1, 54000);

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `no` int(11) NOT NULL,
  `NO_FAKTUR` varchar(50) DEFAULT NULL,
  `TANGGAL_FAKTUR` date DEFAULT NULL,
  `TOTAL_BARANG_JASA` int(11) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `HARGA` decimal(10,2) DEFAULT NULL,
  `TOTAL` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`no`, `NO_FAKTUR`, `TANGGAL_FAKTUR`, `TOTAL_BARANG_JASA`, `NAMA`, `HARGA`, `TOTAL`) VALUES
(1, 'SP/001/0624', '2024-06-02', 60, 'Ayam Potong', 50000.00, 3000000.00),
(2, 'SP/001/0624', '2024-06-02', 15, 'Daging Sapi', 80000.00, 1200000.00),
(3, 'SP/005/0624', '2024-06-04', 2, 'Lada', 22000.00, 44000.00),
(4, 'SP/006/0624', '2024-06-06', 60, 'Mentai', 120000.00, 240000.00),
(5, 'SP/007/0624', '2024-06-06', 2, 'Cabai', 53000.00, 106000.00),
(6, 'SP/008/0624', '2024-06-08', 7, 'Garam', 12000.00, 24000.00),
(7, 'SP/009/0624', '2024-06-08', 2, 'Teriyaki', 63000.00, 126000.00),
(8, 'SP/010/0624', '2024-06-10', 1, 'Cumi', 31000.00, 31000.00),
(9, 'SP/010/0624', '2024-06-10', 5, 'Sosis', 43500.00, 217500.00),
(10, 'SP/011/0624', '2024-06-11', 3, 'Bawang Bombay', 20000.00, 60000.00),
(11, 'SP/011/0624', '2024-06-11', 2, 'Telur', 28000.00, 56000.00),
(12, 'SP/012/0624', '2024-06-29', 2, 'Aqua 330ml ', 40000.00, 80000.00);

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `nm_cafe` char(20) DEFAULT NULL,
  `almt` char(50) DEFAULT NULL,
  `kota` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`nm_cafe`, `almt`, `kota`) VALUES
('Warung Olahrahang', 'Jl. Parang Garuda V No. 8', 'Kota Pekalongan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kd_kyw` char(10) NOT NULL,
  `nm_kyw` char(30) NOT NULL,
  `almt` char(30) NOT NULL,
  `telp` char(13) NOT NULL,
  `jns_kel` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kd_kyw`, `nm_kyw`, `almt`, `telp`, `jns_kel`) VALUES
('AQ', 'Ariq', 'Siwalan', '089527808365', 'L'),
('DY', 'Dicky', 'Tirto', '082322101834', 'L'),
('IN', 'Irfan', 'Sragi', '085156335975', 'L'),
('LA', 'Litarina', 'Sampangan', '081548440441', 'P'),
('RI', 'Rafi', 'Podosugih', '085878633339', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `kd_menu` char(10) NOT NULL,
  `nm_menu` char(30) NOT NULL,
  `satuan` char(10) NOT NULL,
  `hrg_jual` int(10) NOT NULL,
  `gbr` blob DEFAULT NULL,
  `kd_stok` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`kd_menu`, `nm_menu`, `satuan`, `hrg_jual`, `gbr`, `kd_stok`) VALUES
('MOR-033', 'Bakso', 'porsi', 11000, 0x62616b736f2e6a706567, 'SOR-001'),
('ORM-001', 'Ayam Mentai Katsu', 'porsi', 17000, 0x4179616d204d656e746169204b617473752e6a7067, 'ORS-001'),
('ORM-002', 'Ayam Katsu Teriyaki', 'porsi', 18000, 0x6179616d206b61747375207465726979616b692e6a7067, 'ORS-002'),
('ORM-003', 'Ayam Pop Cabe Garam', 'porsi', 17000, 0x6179616d20706f70206361626520676172616d2e6a7067, 'ORS-003'),
('ORM-004', 'Ayam Suwir Cabe Garam', 'porsi', 17000, 0x6179616d737577697263616265676172616d2e6a7067, 'ORS-004'),
('ORM-005', 'Telur Mentai Katsu', 'porsi', 14000, 0x74656c75726d656e7461696b617473752e6a7067, 'ORS-005'),
('ORM-006', 'Telur Katsu Teriyaki', 'porsi', 15000, 0x74656c75727465726979616b692e6a7067, 'ORS-006'),
('ORM-007', 'Sapi Teriyaki', 'porsi', 23000, 0x736170697465726979616b692e6a7067, 'ORS-007'),
('ORM-008', 'Sapi Lada Hitam', 'porsi', 23000, 0x736170696c616461686974616d2e6a7067, 'ORS-008'),
('ORM-009', 'Ayam Kari Katsu', 'porsi', 20000, 0x6179616d6b6172696b617473752e6a7067, 'ORS-009'),
('ORM-010', 'Telur Kari Katsu', 'porsi', 17000, 0x74656c757264616461726b6172692e6a7067, 'ORS-010'),
('ORM-011', 'Cumi Hitam', 'porsi', 17000, 0x63756d69686974616d2e6a7067, 'ORS-011'),
('ORM-012', 'Mix Platter', 'porsi', 15000, 0x6d6978706c61747465722e6a7067, 'ORS-012'),
('ORM-013', 'Shilin', 'porsi', 19000, 0x736869686c696e2e6a7067, 'ORS-013'),
('ORM-014', 'Kentang Goreng', 'porsi', 13000, 0x6b656e74616e67676f72656e672e6a7067, 'ORS-014'),
('ORM-015', 'Onion Ring', 'porsi', 13000, 0x6f6e696f6e72696e672e6a7067, 'ORS-015'),
('ORM-016', 'Nasi', 'Porsi', 5000, 0x6e736970757469682e6a7067, 'ORS-016'),
('ORM-017', 'Telur', 'porsi', 5000, 0x74656c75726365706c6f6b2e6a7067, 'ORS-017'),
('ORM-018', 'Teh', 'porsi', 4000, 0x7465682e6a7067, 'ORS-018'),
('ORM-019', 'Jeruk', 'porsi', 6000, 0x65736a6572756b2e6a7067, 'ORS-019'),
('ORM-020', 'Lemon', 'porsi', 6000, 0x6c656d6f6e2e6a7067, 'ORS-020'),
('ORM-021', 'Air Mineral', 'porsi', 4000, 0x6169726d696e6572616c2e6a7067, 'ORS-021'),
('ORM-022', 'Nasi Goreng Kota', 'porsi', 15000, 0x6e617369676f72656e672e6a7067, 'ORS-022'),
('ORM-023', 'Telur Orak-Arik Bakso', 'porsi', 13000, 0x74656c75726f72616b6172696b2e6a7067, 'ORS-023'),
('ORM-024', 'Ayam Katsu Lada Hitam', 'porsi', 18000, 0x6b617473756c616461686974616d2e6a7067, 'ORS-024'),
('ORM-025', 'Ayam Pop Sambal Matah', 'porsi', 17000, 0x706f7073616d62616c6d617461682e6a7067, 'ORS-025'),
('ORM-026', 'Ayam suwir sambal matah', 'porsi', 17000, 0x6179616d737577697273616d62616c6d617461682e6a7067, NULL),
('ORM-027', 'Telur katsu lada hitam', 'porsi', 14000, 0x74656c757264616461726c616461686974616d2e6a7067, 'ORS-027'),
('ORM-028', 'Telur dadar kari', 'porsi', 17000, 0x74656c757264616461726b6172692e6a7067, NULL),
('ORM-029', 'Sambosa', 'porsi', 13000, 0x73616d626f73612e6a7067, 'ORS-029'),
('ORM-030', 'Canai', 'porsi', 9000, 0x63616e61692e6a7067, 'ORS-030'),
('ORM-031', 'Bakpao', 'porsi', 12000, 0x42616b70616f2e6a7067, 'ORS-031'),
('ORM-032', 'Ice kopi susu', 'porsi', 13000, 0x65736b6f70692e6a7067, 'ORS-032'),
('ORM-033', 'Mie ayam', 'porsi', 12000, 0x6d69656179616d2e6a7067, 'ORS-033');

-- --------------------------------------------------------

--
-- Table structure for table `mtrs`
--

CREATE TABLE `mtrs` (
  `no_trs` char(10) NOT NULL,
  `tgl_trs` date DEFAULT NULL,
  `kd_kyw` char(10) DEFAULT NULL,
  `nm_plg` char(25) DEFAULT NULL,
  `total` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mtrs`
--

INSERT INTO `mtrs` (`no_trs`, `tgl_trs`, `kd_kyw`, `nm_plg`, `total`) VALUES
('ORT0010624', '2024-07-03', 'IN', 'ariq', 17000),
('ORT0020624', '2024-06-28', 'LA', 'irfan', 40000),
('ORT0030624', '2024-07-09', 'AQ', 'ariq', 59000),
('ORT0040624', '2024-07-04', 'RI', 'Ali', 14000),
('ORT0050624', '2024-07-02', 'IN', 'rafi', 90000),
('ORT0060624', '2024-07-03', 'DY', 'DICKY', 17000),
('ORT0070624', '2024-07-03', 'LA', 'Gunawan', 53000);

-- --------------------------------------------------------

--
-- Table structure for table `mtrs_backup`
--

CREATE TABLE `mtrs_backup` (
  `no_trs` char(10) NOT NULL,
  `tgl_trs` date DEFAULT NULL,
  `kd_kyw` char(10) DEFAULT NULL,
  `nm_plg` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `kd_stok` char(10) NOT NULL,
  `nm_stok` char(30) NOT NULL,
  `satuan` char(10) NOT NULL,
  `hrg_beli` int(10) NOT NULL,
  `jml_stok` int(3) NOT NULL,
  `gbr` blob DEFAULT NULL,
  `kd_bhn` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`kd_stok`, `nm_stok`, `satuan`, `hrg_beli`, `jml_stok`, `gbr`, `kd_bhn`) VALUES
('ORS-001', 'Ayam Mentai Katsu', 'porsi', 11900, 10, 0x4179616d204d656e746169204b617473752e6a7067, 'ORB-001'),
('ORS-002', 'Ayam Katsu Teriyaki', 'porsi', 12600, 10, 0x6179616d206b61747375207465726979616b692e6a7067, 'ORB-001'),
('ORS-003', 'Ayam Pop Cabe Garam', 'Porsi', 11900, 10, 0x6179616d20706f70206361626520676172616d2e6a7067, 'ORB-001'),
('ORS-004', 'Ayam Suwir Cabe Garam', 'Porsi', 11900, 10, 0x6179616d737577697263616265676172616d2e6a7067, 'ORB-001'),
('ORS-005', 'Telur Mentai Katsu', 'Porsi', 9800, 10, 0x74656c75726d656e7461696b617473752e6a7067, 'ORB-003'),
('ORS-006', 'Telur Katsu Teriyaki', 'Porsi', 10500, 10, 0x74656c75727465726979616b692e6a7067, 'ORB-003'),
('ORS-007', 'Sapi Teriyaki', 'Porsi', 16100, 10, 0x736170697465726979616b692e6a7067, 'ORB-002'),
('ORS-008', 'Sapi Lada Hitam', 'Porsi', 16100, 10, 0x736170696c616461686974616d2e6a7067, 'ORB-002'),
('ORS-009', 'Ayam Kari Katsu', 'Porsi', 14000, 10, 0x6179616d6b6172696b617473752e6a7067, 'ORB-001'),
('ORS-010', 'Telur Kari Katsu', 'Porsi', 11900, 10, 0x74656c757264616461726b6172692e6a7067, 'ORB-003'),
('ORS-011', 'Cumi Hitam', 'Porsi', 11900, 10, 0x63756d69686974616d2e6a7067, 'ORB-011'),
('ORS-012', 'Mix Platter', 'Porsi', 10500, 10, 0x6d6978706c61747465722e6a7067, 'ORB-004'),
('ORS-013', 'Shilin', 'Porsi', 13300, 10, 0x736869686c696e2e6a7067, 'ORB-015'),
('ORS-014', 'kentang goreng', 'porsi', 8500, 10, 0x6b656e74616e67676f72656e672e6a7067, 'ORB-004'),
('ORS-015', 'onion ring', 'porsi', 8500, 10, 0x6f6e696f6e72696e672e6a7067, 'ORB-013'),
('ORS-016', 'nasi', 'porsi', 3250, 10, 0x6e736970757469682e6a7067, 'ORB-005'),
('ORS-017', 'Telur', 'porsi', 3250, 10, 0x74656c75726365706c6f6b2e6a7067, 'ORB-003'),
('ORS-018', 'teh panas/dingin', 'porsi', 2600, 10, 0x7465682e6a7067, 'ORB-017'),
('ORS-019', 'Jeruk panas/dingin', 'porsi', 3900, 10, 0x65736a6572756b2e6a7067, 'ORB-019'),
('ORS-020', 'Lemon tea panas/ dingin', 'porsi', 3900, 10, 0x6c656d6f6e2e6a7067, 'ORB-017'),
('ORS-021', 'Air mineral', 'porsi', 2600, 10, 0x6169726d696e6572616c2e6a7067, 'ORB-022'),
('ORS-022', 'Nasi goreng kota', 'prsi', 9750, 10, 0x6e617369676f72656e672e6a7067, 'ORB-005'),
('ORS-023', 'Telur orak arik bakso', 'porsi', 8500, 10, 0x74656c75726f72616b6172696b2e6a7067, 'ORB-003'),
('ORS-024', 'ayam katsu lada hitam', 'porsi', 11700, 10, 0x6b617473756c616461686974616d2e6a7067, 'ORB-001'),
('ORS-025', 'Ayam pop sambal matah', 'porsi', 11000, 10, 0x706f7073616d62616c6d617461682e6a7067, 'ORB-001'),
('ORS-026', 'Ayam suwir sambal matah', 'porsi', 11000, 10, 0x6179616d737577697273616d62616c6d617461682e6a7067, 'ORB-001'),
('ORS-027', 'Telur katsu lada hitam', 'porsi', 9100, 10, 0x74656c757264616461726c616461686974616d2e6a7067, 'ORB-003'),
('ORS-029', 'Sambosa', 'porsi', 8500, 10, 0x73616d626f73612e6a7067, 'ORB-026'),
('ORS-030', 'Canai', 'porsi', 5900, 10, 0x63616e61692e6a7067, 'ORB-027'),
('ORS-031', 'Bakpao', 'Porsi', 11600, 10, 0x42616b70616f2e6a7067, 'ORB-028'),
('ORS-032', 'Ice Kopi susu', 'porsi', 8500, 10, 0x65736b6f70692e6a7067, 'ORB-030'),
('ORS-033', 'Mie ayam', 'porsi', 9000, 10, 0x6d69656179616d2e6a7067, 'ORB-001'),
('SOR-001', 'Bakso', 'porsi', 8000, 10, 0x62616b736f2e6a706567, 'ORB-020');

-- --------------------------------------------------------

--
-- Table structure for table `trs`
--

CREATE TABLE `trs` (
  `no_trs` char(10) DEFAULT NULL,
  `kd_menu` char(10) DEFAULT NULL,
  `jml` int(2) DEFAULT NULL,
  `hrg` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trs`
--

INSERT INTO `trs` (`no_trs`, `kd_menu`, `jml`, `hrg`, `total`) VALUES
('ORT0010624', 'ORM-001', 1, 17000, 17000),
('ORT0060624', 'ORM-001', 1, 17000, 17000),
('ORT0070624', 'ORM-002', 2, 18000, 36000),
('ORT0070624', 'ORM-003', 1, 17000, 17000),
('ORT0040624', 'ORM-005', 1, 14000, 14000),
('ORT0020624', 'ORM-007', 1, 23000, 23000),
('ORT0020624', 'ORM-010', 1, 17000, 17000),
('ORT0030624', 'ORM-001', 2, 17000, 34000),
('ORT0030624', 'ORM-016', 5, 5000, 25000),
('ORT0050624', 'ORM-033', 2, 12000, 24000),
('ORT0050624', 'ORM-013', 1, 19000, 19000),
('ORT0050624', 'ORM-018', 2, 4000, 8000),
('ORT0050624', 'ORM-015', 3, 13000, 39000);

-- --------------------------------------------------------

--
-- Table structure for table `trs_backup`
--

CREATE TABLE `trs_backup` (
  `no_trs` char(10) DEFAULT NULL,
  `kd_menu` char(10) DEFAULT NULL,
  `jml` int(2) DEFAULT NULL,
  `hrg` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_menu_harga`
-- (See below for the actual view)
--
CREATE TABLE `v_menu_harga` (
`kd_menu` char(10)
,`nm_menu` char(30)
,`hrg_jual` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penjualan_harian`
-- (See below for the actual view)
--
CREATE TABLE `v_penjualan_harian` (
`tgl_trs` date
,`total_penjualan` decimal(32,0)
,`total_item_terjual` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stok_bahan`
-- (See below for the actual view)
--
CREATE TABLE `v_stok_bahan` (
`kd_stok` char(10)
,`nm_stok` char(30)
,`satuan_stok` char(10)
,`jml_stok` int(3)
,`kd_bhn` char(10)
,`nm_bhn` char(30)
,`satuan_bhn` char(10)
,`jml_bhn` int(3)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi` (
`no_trs` char(10)
,`kd_menu` char(10)
,`nm_menu` char(30)
,`jml` int(2)
,`hrg` int(10)
,`total` int(10)
,`tgl_trs` date
,`nm_plg` char(25)
);

-- --------------------------------------------------------

--
-- Structure for view `v_menu_harga`
--
DROP TABLE IF EXISTS `v_menu_harga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_menu_harga`  AS SELECT `menu`.`kd_menu` AS `kd_menu`, `menu`.`nm_menu` AS `nm_menu`, `menu`.`hrg_jual` AS `hrg_jual` FROM `menu` ;

-- --------------------------------------------------------

--
-- Structure for view `v_penjualan_harian`
--
DROP TABLE IF EXISTS `v_penjualan_harian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penjualan_harian`  AS SELECT `mt`.`tgl_trs` AS `tgl_trs`, sum(`t`.`total`) AS `total_penjualan`, sum(`t`.`jml`) AS `total_item_terjual` FROM (`trs` `t` join `mtrs` `mt` on(`t`.`no_trs` = `mt`.`no_trs`)) GROUP BY `mt`.`tgl_trs` ;

-- --------------------------------------------------------

--
-- Structure for view `v_stok_bahan`
--
DROP TABLE IF EXISTS `v_stok_bahan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stok_bahan`  AS SELECT `s`.`kd_stok` AS `kd_stok`, `s`.`nm_stok` AS `nm_stok`, `s`.`satuan` AS `satuan_stok`, `s`.`jml_stok` AS `jml_stok`, `b`.`kd_bhn` AS `kd_bhn`, `b`.`nm_bhn` AS `nm_bhn`, `b`.`satuan` AS `satuan_bhn`, `b`.`jml_bhn` AS `jml_bhn` FROM (`stok` `s` join `bahan` `b` on(`s`.`kd_bhn` = `b`.`kd_bhn`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS SELECT `t`.`no_trs` AS `no_trs`, `t`.`kd_menu` AS `kd_menu`, `m`.`nm_menu` AS `nm_menu`, `t`.`jml` AS `jml`, `t`.`hrg` AS `hrg`, `t`.`total` AS `total`, `mt`.`tgl_trs` AS `tgl_trs`, `mt`.`nm_plg` AS `nm_plg` FROM ((`trs` `t` join `menu` `m` on(`t`.`kd_menu` = `m`.`kd_menu`)) join `mtrs` `mt` on(`t`.`no_trs` = `mt`.`no_trs`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD UNIQUE KEY `kd_bhn` (`kd_bhn`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_faktur` (`NO_FAKTUR`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD UNIQUE KEY `kd_kyw` (`kd_kyw`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD UNIQUE KEY `kd_menu` (`kd_menu`),
  ADD KEY `idx_nm_menu` (`nm_menu`),
  ADD KEY `kd_stok` (`kd_stok`);

--
-- Indexes for table `mtrs`
--
ALTER TABLE `mtrs`
  ADD UNIQUE KEY `no_trs` (`no_trs`),
  ADD KEY `kd_kyw` (`kd_kyw`),
  ADD KEY `idx_tgl_trs` (`tgl_trs`);

--
-- Indexes for table `mtrs_backup`
--
ALTER TABLE `mtrs_backup`
  ADD UNIQUE KEY `no_trs` (`no_trs`),
  ADD KEY `kd_kyw` (`kd_kyw`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD UNIQUE KEY `kd_stok` (`kd_stok`),
  ADD KEY `idx_nm_stok` (`nm_stok`),
  ADD KEY `kd_bhn` (`kd_bhn`);

--
-- Indexes for table `trs`
--
ALTER TABLE `trs`
  ADD KEY `kd_menu` (`kd_menu`),
  ADD KEY `no_trs` (`no_trs`);

--
-- Indexes for table `trs_backup`
--
ALTER TABLE `trs_backup`
  ADD KEY `kd_menu` (`kd_menu`),
  ADD KEY `no_trs` (`no_trs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`kd_stok`) REFERENCES `stok` (`kd_stok`);

--
-- Constraints for table `mtrs`
--
ALTER TABLE `mtrs`
  ADD CONSTRAINT `mtrs_ibfk_1` FOREIGN KEY (`kd_kyw`) REFERENCES `karyawan` (`kd_kyw`);

--
-- Constraints for table `mtrs_backup`
--
ALTER TABLE `mtrs_backup`
  ADD CONSTRAINT `mtrs_backup_ibfk_1` FOREIGN KEY (`kd_kyw`) REFERENCES `karyawan` (`kd_kyw`);

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`kd_bhn`) REFERENCES `bahan` (`kd_bhn`);

--
-- Constraints for table `trs`
--
ALTER TABLE `trs`
  ADD CONSTRAINT `trs_ibfk_1` FOREIGN KEY (`kd_menu`) REFERENCES `menu` (`kd_menu`),
  ADD CONSTRAINT `trs_ibfk_2` FOREIGN KEY (`no_trs`) REFERENCES `mtrs` (`no_trs`);

--
-- Constraints for table `trs_backup`
--
ALTER TABLE `trs_backup`
  ADD CONSTRAINT `trs_backup_ibfk_1` FOREIGN KEY (`kd_menu`) REFERENCES `menu` (`kd_menu`),
  ADD CONSTRAINT `trs_backup_ibfk_2` FOREIGN KEY (`no_trs`) REFERENCES `mtrs` (`no_trs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
