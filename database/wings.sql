-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 09:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wings`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_10_03_160249_add_customer_phone_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `remember_token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `customer_phone` varchar(12) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `level`, `customer_name`, `email`, `password`, `customer_phone`, `customer_address`, `status`) VALUES
(1005, 2, 'Dandy', 'dandy@gmail.com', '$2y$10$gwduxII.aWPzguQ9P0yRCOEM0/6IVHwL3Fs3ADJsq8RA5pQ2OoQ9y', '087', 'Kota Kuningan', 1),
(1006, 2, 'zend', 'zend@gmail.com', '$2y$10$v0O4Wj5gIB.heaa/gqN5D.bIwu27Hb4AwT2WTVo.F7I4RZkb2lXeq', '08777', 'Kadugede', 1),
(1011, 2, 'Nouzen', 'Nouzen@gmail.com', '$2y$10$vimoMYy/jzVPbDNwr37C9e7hU6P8fOEuNzhc9Ag7.Me9iEA1m8XKG', '077', 'Kuningan', 1),
(1022, 2, 'Nozomu', 'nozomu@gmail.com', '$2y$10$5CKuo3eqcLlmzNrSX1vMGePoCELA8KrgsI76PN8WwyCmbZFQx5Xh2', '091', 'Cirebon', 1);

--
-- Triggers `tbl_customer`
--
DELIMITER $$
CREATE TRIGGER `Otomatis_Tambah_Tbl_eMoney` AFTER INSERT ON `tbl_customer` FOR EACH ROW IF New.customer_id THEN 
    INSERT tbl_emoney SET customer_id=NEW.customer_id,
    emoney=0;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` bigint(20) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `slug`) VALUES
(38924, 'Minuman', 'minuman'),
(258467, 'Rumah Tangga', 'rumah-tangga'),
(259847, 'Eletronik', 'eletronik'),
(269301, 'Makanan Lokal', 'makanan-lokal'),
(308147, 'Kue', 'kue'),
(530842, 'Buah Buahan', 'buah-buahan'),
(571842, 'Dapur', 'dapur'),
(671045, 'Makanan', 'makanan'),
(748016, 'Kerajinan', 'kerajinan'),
(908753, 'Mainan', 'mainan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` bigint(20) NOT NULL,
  `kode_pembayaran` bigint(20) NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `id_pesanan` bigint(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `metode_pembayaran` enum('1','4','5','6','7','0') DEFAULT NULL,
  `metode_pengiriman` enum('1','2','3') DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `alasan_batal` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `kode_pembayaran`, `id_produk`, `id_pesanan`, `nama`, `tanggal_bayar`, `metode_pembayaran`, `metode_pengiriman`, `jumlah`, `subtotal`, `status`, `alasan_batal`) VALUES
(32951, 2805163497, 875403, 642059, 'Dandy', '2022-08-13', '4', '2', 5, 20000, 2, NULL),
(65184, 8657304192, 206913, 583641, 'Dandy', '2024-02-15', '1', '1', 3, 9000, 2, NULL),
(73564, 8076253194, 12586, 193527, 'Dandy', '2024-02-16', '1', '1', 5, 115000, 2, NULL),
(132805, 123497856, 73264, 146208, 'Dandy', '2024-02-15', '1', '1', 5, 10000, 2, NULL),
(295816, 6137925840, 73264, 859164, 'Dandy', '2022-08-12', '4', '1', 5, 10000, 2, NULL),
(426513, 1426083759, 729640, 405298, 'Dandy', NULL, '4', '3', 5, 40000, 1, NULL),
(628173, 2309864157, 257103, 57914, 'Dandy', '2024-02-16', '1', '1', 5, 15000, 2, NULL),
(631275, 8657304192, 257103, 509713, 'Dandy', '2024-02-15', '1', '1', 5, 15000, 2, NULL),
(708456, 9386412057, 102358, 930274, 'Dandy', '2022-08-14', '5', '1', 10, 50000, 2, NULL),
(743609, 8503194627, 308451, 802946, 'Dandy', '2022-08-11', '1', '1', 5, 10000, 2, NULL),
(956740, 9286351740, 867124, 476152, 'Dandy', '2024-02-16', '1', '1', 5, 250000, 2, NULL);

--
-- Triggers `tbl_pembayaran`
--
DELIMITER $$
CREATE TRIGGER `Update_Kode_pembayaran_Tbl_Pesanan` AFTER INSERT ON `tbl_pembayaran` FOR EACH ROW BEGIN
UPDATE tbl_pesanan SET kode_pembayaran = NEW.kode_pembayaran WHERE id_pesanan=NEW.id_pesanan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Metode_Pembayaran_Di_Tbl_Pesanan` AFTER INSERT ON `tbl_pembayaran` FOR EACH ROW BEGIN
UPDATE tbl_pesanan SET metode_pembayaran = NEW.metode_pembayaran WHERE id_pesanan=NEW.id_pesanan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Metode_Pengiriman_Di_Tbl_Pesanan` AFTER INSERT ON `tbl_pembayaran` FOR EACH ROW BEGIN
UPDATE tbl_pesanan SET metode_pengiriman = NEW.metode_pengiriman WHERE id_pesanan=NEW.id_pesanan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Status_Sudah_Bayar` AFTER UPDATE ON `tbl_pembayaran` FOR EACH ROW BEGIN
UPDATE tbl_pesanan SET status=2 WHERE id_pesanan=NEW.id_pesanan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Stok_Setelah_Pembatalan` AFTER UPDATE ON `tbl_pembayaran` FOR EACH ROW IF NEW.status=5 THEN
UPDATE tbl_produk SET stok = stok + NEW.jumlah WHERE id_produk = NEW.id_produk;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Terjual_Setelah_Pembatalan` AFTER UPDATE ON `tbl_pembayaran` FOR EACH ROW IF NEW.status=5 THEN
UPDATE tbl_produk SET terjual = terjual - NEW.jumlah WHERE id_produk = NEW.id_produk;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Terjual_Tbl_Produk` AFTER UPDATE ON `tbl_pembayaran` FOR EACH ROW IF NEW.status=2 THEN
UPDATE tbl_produk SET terjual = terjual + NEW.jumlah WHERE id_produk = NEW.id_produk;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran_admin`
--

CREATE TABLE `tbl_pembayaran_admin` (
  `id` bigint(20) NOT NULL,
  `id_admin` bigint(20) NOT NULL,
  `id_pembayaran` bigint(20) NOT NULL,
  `kode_pembayaran` bigint(20) NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `id_pesanan` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pembayaran_admin`
--

INSERT INTO `tbl_pembayaran_admin` (`id`, `id_admin`, `id_pembayaran`, `kode_pembayaran`, `id_produk`, `id_pesanan`) VALUES
(1, 1, 956740, 9286351740, 867124, 476152),
(2, 1, 73564, 8076253194, 12586, 193527);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjual`
--

CREATE TABLE `tbl_penjual` (
  `id_penjual` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  `penjual_name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `penjual_phone` varchar(12) NOT NULL,
  `penjual_address` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_penjual`
--

INSERT INTO `tbl_penjual` (`id_penjual`, `level`, `penjual_name`, `email`, `password`, `penjual_phone`, `penjual_address`, `status`, `created_at`) VALUES
(1004, 3, 'Rahmat', 'rahmat@gmail.com', '$2y$10$y35wXhgcVzBheujOJ2f8U.nqPL4GcAn3BhtQqrWfQgUOsR1uUgJzi', '081', 'Desa Cipondok', 1, '2022-01-13 10:08:40'),
(1007, 3, 'Zain', 'zain@gmail.com', '$2y$10$cdGLgRTElQjw4qeiv2e7Ye.hJka.3vDTQAjyK6m9Wrsu2ANte8Hx2', '083', 'Windujanten', 2, '2022-01-02 10:08:47'),
(1008, 3, 'Andy', 'andy@gmail.com', '$2y$10$6Ic9Yxg0/hhX5NZOhqoNuOO4cnYc7MC5vMYAYSdgLxmfReBMrftX2', '0877', 'Kuningan', 1, '2022-01-09 10:08:50'),
(1009, 3, 'Andy', 'andy@gmail.com', '$2y$10$M7/W67Ye.USc4L1UBQjpeOvfRXpx3nTDDNL8r0PdalZt00.afSpKO', '0877', 'Kuningan', 1, '2022-01-04 10:08:53'),
(1010, 3, 'Rohmat', 'rohmat@gmail.com', '$2y$10$V2JFjGt0LcE9iM6p3IynJOJP8WdC9WNaYKqcHLTmievLbb.Gadloe', '081', 'Cipondok', 0, '2021-12-05 00:32:29'),
(1012, 3, 'Zien', 'zien@gmail.com', '$2y$10$9t867TO48LNRoEuxraH.Me6CoEOGx3uhx5YQdZiSa7MdVTCy0bpm6', '081', 'Cipondok', 1, '2022-07-25 08:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` bigint(20) NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `kode_pembayaran` bigint(20) DEFAULT NULL,
  `invoice` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phone` varchar(12) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `metode_pembayaran` enum('1','4','5','6','7','0') DEFAULT NULL,
  `metode_pengiriman` enum('1','2','3') DEFAULT NULL,
  `no_resi` bigint(20) DEFAULT NULL,
  `tanggal_pesan` date NOT NULL DEFAULT current_timestamp(),
  `status` char(200) NOT NULL,
  `alasan_batal` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_produk`, `kode_pembayaran`, `invoice`, `customer_id`, `customer_name`, `customer_phone`, `customer_address`, `subtotal`, `metode_pembayaran`, `metode_pengiriman`, `no_resi`, `tanggal_pesan`, `status`, `alasan_batal`) VALUES
(57914, 257103, 2309864157, 'CE5RQT', '1005', 'Dandy', '087', 'Kota Kuningan', 15000, '1', '1', NULL, '2024-02-16', '2', NULL),
(146208, 73264, 123497856, 'B3RICA', '1005', 'Dandy', '087', 'Kota Kuningan', 10000, '1', '1', NULL, '2024-02-15', '2', NULL),
(193527, 12586, 8076253194, 'EUD1K3', '1005', 'Dandy', '087239172', 'JL. Desa Cipondok Kota Kuningan', 115000, '1', '1', 10101010101010, '2024-02-16', '4', NULL),
(405298, 729640, 1426083759, 'U5I97N', '1005', 'Dandy', '087', 'Kota Kuningan', 40000, '4', '3', NULL, '2022-08-18', '1', NULL),
(476152, 867124, 9286351740, '6M5SPJ', '1005', 'Dandy', '087', 'Kota Kuningan', 250000, '1', '1', NULL, '2024-02-16', '2', NULL),
(509713, 257103, 8657304192, 'RCYZ2A', '1005', 'Dandy', '087', 'Kota Kuningan', 15000, '1', '1', NULL, '2024-02-15', '2', NULL),
(583641, 206913, 8657304192, 'RAPFWI', '1005', 'Dandy', '087', 'Kota Kuningan', 9000, '1', '1', NULL, '2024-02-15', '2', NULL),
(642059, 875403, 2805163497, '40UACH', '1005', 'Dandy', '087', 'Kota Kuningan', 20000, '4', '2', NULL, '2022-08-18', '2', NULL),
(802946, 308451, 8503194627, 'TM8K0V', '1005', 'Dandy', '087', 'Kota Kuningan', 10000, '1', '1', NULL, '2022-08-11', '2', NULL),
(859164, 73264, 6137925840, 'R64VQJ', '1005', 'Dandy', '087', 'Kota Kuningan', 10000, '4', '1', NULL, '2022-08-11', '2', NULL),
(930274, 102358, 9386412057, '47QMHB', '1005', 'Dandy', '087', 'Kota Kuningan', 50000, '5', '1', NULL, '2022-08-18', '2', NULL);

--
-- Triggers `tbl_pesanan`
--
DELIMITER $$
CREATE TRIGGER `Hapus_Pesanan` AFTER DELETE ON `tbl_pesanan` FOR EACH ROW BEGIN
	DELETE FROM tbl_pesanan_detail WHERE
    id_pesanan=OLD.id_pesanan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Kurangi_EMoney_Customer` AFTER INSERT ON `tbl_pesanan` FOR EACH ROW IF NEW.metode_pembayaran='0' THEN
UPDATE tbl_emoney SET emoney = emoney - NEW.subtotal WHERE customer_id = NEW.customer_id;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Kurangi_EMoney_Customer_(Update)` AFTER UPDATE ON `tbl_pesanan` FOR EACH ROW IF NEW.metode_pembayaran='0' THEN
UPDATE tbl_emoney SET emoney = emoney - NEW.subtotal WHERE customer_id = NEW.customer_id;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Tambah_Emoney_Setelah_Batal_Pesanan` AFTER UPDATE ON `tbl_pesanan` FOR EACH ROW IF NEW.status=5 THEN
UPDATE tbl_emoney SET emoney = emoney + OLD.subtotal WHERE customer_id = OLD.customer_id;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Tambah_Stok_(Batal_Pesanan_Sebelum_Bayar)` AFTER UPDATE ON `tbl_pesanan` FOR EACH ROW IF NEW.status=6 THEN
DELETE FROM tbl_pesanan_detail WHERE id_pesanan = OLD.id_pesanan;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Tambah_Stok_Step_1_(Batal_Pesanan_Sesudah_Bayar)` AFTER UPDATE ON `tbl_pesanan` FOR EACH ROW IF NEW.status=5 THEN
DELETE FROM tbl_pesanan_detail WHERE id_pesanan = OLD.id_pesanan;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Penghasilan_Tbl_Produk` AFTER UPDATE ON `tbl_pesanan` FOR EACH ROW IF NEW.status=4 THEN
UPDATE tbl_produk SET penghasilan = penghasilan + NEW.subtotal WHERE id_produk = NEW.id_produk;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan_detail`
--

CREATE TABLE `tbl_pesanan_detail` (
  `id_pesanan_detail` bigint(20) NOT NULL,
  `id_pesanan` bigint(20) NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pesanan_detail`
--

INSERT INTO `tbl_pesanan_detail` (`id_pesanan_detail`, `id_pesanan`, `id_produk`, `harga`, `jumlah`, `berat`) VALUES
(1005, 34865, 923714, 3000, 10, 1),
(859164, 859164, 73264, 2000, 5, 1),
(802946, 802946, 308451, 2000, 5, 1),
(642059, 642059, 875403, 4000, 5, 1),
(405298, 405298, 729640, 8000, 5, 1),
(930274, 930274, 102358, 5000, 10, 1),
(1005, 583641, 206913, 3000, 3, 1),
(1005, 509713, 257103, 3000, 5, 1),
(1005, 146208, 73264, 2000, 5, 1),
(1005, 57914, 257103, 3000, 5, 1),
(1005, 476152, 867124, 50000, 5, 1),
(1005, 193527, 12586, 23000, 5, 1);

--
-- Triggers `tbl_pesanan_detail`
--
DELIMITER $$
CREATE TRIGGER `Kurangi_Stok` AFTER INSERT ON `tbl_pesanan_detail` FOR EACH ROW BEGIN
UPDATE tbl_produk SET stok = stok - NEW.jumlah WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Tambah_Stok_Step_2_(Batal_Pesanan_Sesudah_Bayar)` AFTER DELETE ON `tbl_pesanan_detail` FOR EACH ROW BEGIN
	UPDATE tbl_produk SET stok = stok + OLD.jumlah WHERE id_produk = OLD.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` bigint(20) NOT NULL,
  `kode_produk` varchar(6) NOT NULL,
  `id_penjual` bigint(20) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `id_kategori` bigint(20) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `kondisi` enum('Baru','Bekas') NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `terjual` int(11) NOT NULL DEFAULT 0,
  `penghasilan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `kode_produk`, `id_penjual`, `nama_produk`, `id_kategori`, `deskripsi`, `gambar`, `kondisi`, `stok`, `harga`, `berat`, `status`, `terjual`, `penghasilan`, `created_at`, `edited_at`) VALUES
(12586, 'MMALMN', 1007, 'Wings - Mama Lemon', 571842, 'Mama Lemon Variant Jeruk Nipis Sabun Cuci Piring 1000ml', '012586.jpg', 'Baru', 295, 23000, 1, 2, 5, 115000, '2024-02-16 01:50:02', NULL),
(73264, 'YOGURT', 1007, 'Youghurt', 38924, 'Di Olah Dari Bahan Pilihan Dan Segar', '073264.jpg', 'Baru', 990, 2000, 1, 2, 10, 0, '2024-02-15 01:50:25', NULL),
(102358, 'TOYCAR', 1007, 'Mobil Mainan', 908753, 'Dekorasi / Mainan Mobil-Mobilan Dari Kayu', '102358.jpg', 'Baru', 990, 5000, 1, 2, 10, 0, '2024-02-14 01:50:32', NULL),
(143720, 'BKTPG', 1007, 'Wings - Barakat Pasta Gigi', 258467, 'Barakat Pasta Gigi Halal, Siwak & Green Tea Tube 190g', '143720.jpg', 'Baru', 500, 35000, 1, 2, 0, 0, '2024-02-13 01:50:38', NULL),
(206913, 'JJSGBR', 1007, 'Jus Jeruk Segerrr Bugerrr', 38924, 'Jus Jeruk Yang Di Olah Dari Jeruk Segar Pilihan', '206913.jpg', 'Baru', 997, 3000, 1, 2, 3, 0, '2024-02-12 01:50:44', NULL),
(257103, 'TURBON', 1004, 'Tumpi Udang Rebon', 671045, 'Kripik Udang Enak Khas Cirebon', '257103.jpg', 'Baru', 990, 3000, 1, 2, 10, 0, '2024-02-11 01:50:50', NULL),
(308451, 'BEUKRI', 1004, 'Beunteur Kripsi', 671045, 'Rasa Original,Kripik Beunteur Enak Khas Cirebon', '308451.jpg', 'Baru', 795, 2000, 1, 2, 10, 0, '2024-02-10 01:51:00', NULL),
(349620, 'TES14A', 1007, 'Wings - Tes produk', 671045, 'Lorem Ipsum Dollor Sit Amet,', '349620.jpg', 'Baru', 800, 5000, 1, 2, 0, 0, NULL, NULL),
(372658, 'TERKRI', 1004, 'Teri Kriuk', 671045, 'Deep Fried Small Fish', '372658.jpg', 'Baru', 700, 5000, 1, 2, 0, 0, '2024-02-09 01:51:06', NULL),
(457963, 'TESPRO', 1004, 'Tes Produk', 530842, 'Ini adalah deskripsi produk', '457963.jpg', 'Baru', 100, 3000, 1, 1, 0, 0, '2024-02-08 01:51:13', NULL),
(620745, 'TASCTK', 1007, 'Tas Cantik', 748016, 'Tas Yang Dibuat Dari Kayu Pilihan Aman Nyaman Dan Awet', '620745.jpg', 'Baru', 900, 15000, 1, 2, 0, 0, '2024-02-07 01:51:19', NULL),
(620918, 'MNYSUN', 1007, 'Wings - Sunco', 571842, 'Minyak Goreng Sunco, 2 Ltr, Sunco Minyak Goreng Baik Refil', '620918.jpg', 'Baru', 800, 35000, 1, 2, 0, 0, '2024-02-06 01:51:25', NULL),
(861570, 'DECKEN', 1007, 'Kendi', 748016, 'Di Buat Oleh Bahan Pilihan Awet Dan Tahan Lama', '861570.jpg', 'Baru', 700, 10000, 1, 2, 0, 0, '2024-02-04 01:51:36', NULL),
(867124, 'SKNLIQ', 1007, 'Wings - So Klin Liquid', 258467, 'So Klin Liquid Variant Sakura Strawberry Deterjen Cair 750ml Bikin Ruanganmu Tetap Harum 24 Jam', '867124.jpg', 'Baru', 995, 50000, 1, 2, 5, 0, '2024-02-03 01:51:43', NULL),
(875403, 'KEMTUR', 1004, 'Kembang Turi', 671045, 'Peyek Ikan Pepija,Rasa Istimewa Mengunggah Selera', '875403.jpg', 'Baru', 895, 4000, 1, 2, 5, 0, '2024-02-02 01:51:50', NULL),
(928061, 'AINCKE', 1004, 'Ainun Cake', 308147, 'Kue Enak Rasa Jahe', '928061.jpg', 'Baru', 500, 7000, 1, 2, 0, 0, '2024-02-01 01:51:57', NULL),
(953864, 'WGSTKA', 1007, 'Wings - Toy Kingdom', 908753, 'Toy Kingdom Alpha Group Robot Superwings Transforming Lime', '953864.jpg', 'Baru', 100, 280000, 1, 2, 0, 0, '2024-02-01 01:52:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test`) VALUES
('0'),
('0'),
('1'),
('1'),
('1'),
('0'),
('1'),
('52941'),
('96813'),
('354809'),
('367584'),
('526103'),
('610583'),
('832960'),
('897031'),
('901765'),
('1'),
('1'),
('1'),
('52941'),
('96813'),
('354809'),
('367584'),
('526103'),
('610583'),
('832960'),
('897031'),
('901765'),
('1'),
('13'),
('13'),
('22'),
('22'),
('1'),
('52941'),
('96813'),
('354809'),
('367584'),
('526103'),
('610583'),
('832960'),
('897031'),
('901765'),
('1'),
('13'),
('13'),
('22'),
('22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `customer_phone` varchar(200) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) DEFAULT 2,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `customer_phone`, `customer_address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`, `status`) VALUES
(1, 'Dandy Rahmat Zain', '', '', 'dandyrahmatzain21@gmail.com', NULL, '$2y$10$wz3yJrKcnzK8Bh4PS/DqOeTpIklS6T.hCxp4rzcX9Eczl1SGEmiJi', NULL, '2021-07-14 22:13:58', '2021-07-14 22:13:58', 1, 1),
(1004, 'Rahmat', '081', 'Desa Cipondok', 'rahmat@gmail.com', NULL, '$2y$10$wz3yJrKcnzK8Bh4PS/DqOeTpIklS6T.hCxp4rzcX9Eczl1SGEmiJi', NULL, '2021-10-14 03:15:49', '2021-10-14 03:15:49', 3, 1),
(1005, 'Dandy', '087', 'Kota Kuningan', 'dandy@gmail.com', NULL, '$2y$10$wz3yJrKcnzK8Bh4PS/DqOeTpIklS6T.hCxp4rzcX9Eczl1SGEmiJi', NULL, '2021-10-14 03:43:55', '2021-10-14 03:43:55', 2, 1),
(1006, 'zend', '08777', 'Kadugede', 'zend@gmail.com', NULL, '$2y$10$wz3yJrKcnzK8Bh4PS/DqOeTpIklS6T.hCxp4rzcX9Eczl1SGEmiJi', NULL, '2021-10-14 07:40:10', '2021-10-14 07:40:10', 2, 1),
(1007, 'Zain', '083', 'Windujanten', 'zain@gmail.com', NULL, '$2y$10$wz3yJrKcnzK8Bh4PS/DqOeTpIklS6T.hCxp4rzcX9Eczl1SGEmiJi', NULL, '2021-10-14 07:40:55', '2021-10-14 07:40:55', 3, 2),
(1009, 'Andy', '0877', 'Kuningan', 'andy@gmail.com', NULL, '$2y$10$wz3yJrKcnzK8Bh4PS/DqOeTpIklS6T.hCxp4rzcX9Eczl1SGEmiJi', NULL, '2021-11-08 07:59:44', '2021-11-08 07:59:44', 3, 1),
(1010, 'Rohmat', '081', 'Cipondok', 'rohmat@gmail.com', NULL, '$2y$10$wz3yJrKcnzK8Bh4PS/DqOeTpIklS6T.hCxp4rzcX9Eczl1SGEmiJi', NULL, '2021-12-05 00:32:29', '2021-12-05 00:32:29', 3, 0),
(1011, 'Nouzen', '077', 'Kuningan', 'Nouzen@gmail.com', NULL, '$2y$10$wz3yJrKcnzK8Bh4PS/DqOeTpIklS6T.hCxp4rzcX9Eczl1SGEmiJi', NULL, '2022-07-25 08:22:23', '2022-07-25 08:22:23', 2, 1),
(1012, 'Zien', '081', 'Cipondok', 'zien@gmail.com', NULL, '$2y$10$wz3yJrKcnzK8Bh4PS/DqOeTpIklS6T.hCxp4rzcX9Eczl1SGEmiJi', NULL, '2022-07-25 08:23:54', '2022-07-25 08:23:54', 3, 1),
(1022, 'Nozomu', '091', 'Cirebon', 'nozomu@gmail.com', NULL, '$2y$10$5CKuo3eqcLlmzNrSX1vMGePoCELA8KrgsI76PN8WwyCmbZFQx5Xh2', NULL, '2022-08-06 05:59:06', '2022-08-06 05:59:06', 2, 1);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `Otomatis_Isi_Tbl_Customer_Penjual_alfa_dan_indomart` AFTER INSERT ON `users` FOR EACH ROW IF New.level=2 THEN 
    INSERT tbl_customer SET customer_id=NEW.id,
    level=NEW.level,
    customer_name=NEW.name,
    customer_phone=NEW.customer_phone,
    customer_address=NEW.customer_address,
    email=NEW.email,
    password=NEW.password,
    status=NEW.status;
ELSEIF New.level=3 THEN
	INSERT tbl_penjual SET id_penjual=NEW.id,
    level=NEW.level,
    penjual_name=NEW.name,
    penjual_phone=NEW.customer_phone,
    penjual_address=NEW.customer_address,
    email=NEW.email,
    password=NEW.password,
    status=NEW.status,
    created_at=NEW.created_at;
ELSEIF New.level=4 THEN
	INSERT tbl_alfamart SET id_alfamart=NEW.id,
    level=NEW.level,
    alfamart_name=NEW.name,
    alfamart_phone=NEW.customer_phone,
    alfamart_address=NEW.customer_address,
    email=NEW.email,
    password=NEW.password,
    status=NEW.status,
    created_at=NEW.created_at;
ELSEIF New.level=5 THEN
	INSERT tbl_indomart SET id_indomart=NEW.id,
    level=NEW.level,
    indomart_name=NEW.name,
    indomart_phone=NEW.customer_phone,
    indomart_address=NEW.customer_address,
    email=NEW.email,
    password=NEW.password,
    status=NEW.status,
    created_at=NEW.created_at;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `test` AFTER UPDATE ON `users` FOR EACH ROW IF New.level=4 THEN
	INSERT tbl_alfamart SET id_alfamart=NEW.id,
    level=NEW.level,
    alfamart_name=NEW.name,
    alfamart_phone=NEW.customer_phone,
    alfamart_address=NEW.customer_address,
    email=NEW.email,
    password=NEW.password,
    status=NEW.status,
    created_at=NEW.created_at;
ELSEIF New.level=5 THEN
	INSERT tbl_indomart SET id_indomart=NEW.id,
    level=NEW.level,
    indomart_name=NEW.name,
    indomart_phone=NEW.customer_phone,
    indomart_address=NEW.customer_address,
    email=NEW.email,
    password=NEW.password,
    status=NEW.status,
    created_at=NEW.created_at;
END IF
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_pembayaran_admin`
--
ALTER TABLE `tbl_pembayaran_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_penjual`
--
ALTER TABLE `tbl_penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=974064;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=985608;

--
-- AUTO_INCREMENT for table `tbl_pembayaran_admin`
--
ALTER TABLE `tbl_pembayaran_admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_penjual`
--
ALTER TABLE `tbl_penjual`
  MODIFY `id_penjual` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2007;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=983463;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=953865;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
