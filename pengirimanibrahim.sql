-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 12:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtransaksipengiriman043`
--

-- --------------------------------------------------------

--
-- Table structure for table `datadiripenerima`
--

CREATE TABLE `datadiripenerima` (
  `Kd_Penerima` int(11) NOT NULL,
  `Kd_Kelurahan` int(11) NOT NULL,
  `Nama_Penerima` varchar(30) DEFAULT NULL,
  `Alamat_Penerima` varchar(100) DEFAULT NULL,
  `No_Telp_Penerima` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datadiripenerima`
--

INSERT INTO `datadiripenerima` (`Kd_Penerima`, `Kd_Kelurahan`, `Nama_Penerima`, `Alamat_Penerima`, `No_Telp_Penerima`) VALUES
(112, 2230, 'Haykal', 'JL. PENGADEGAN BARAT RAYA NO. 15, PANCORAN, JAKARTA SELATAN', '081876543212'),
(157, 2300, 'RAISA', 'Jl. JAYA TUNGGAL NO. 17 A BATUTULIS Kec. BOGOR SELATAN, KOTA BOGOR', '087654321987'),
(772, 1355, 'H.LULU ADEN CELL', 'JL. PALKA PASAR PADARINCINGAN RT.03 RW. 04 PADARINCINGAN KADUBEREUM SERANG', '081287787699');

-- --------------------------------------------------------

--
-- Table structure for table `datadiripengirim`
--

CREATE TABLE `datadiripengirim` (
  `Kd_Pengirim` int(11) NOT NULL,
  `Kd_Kelurahan` int(11) NOT NULL,
  `Nama_Pengirim` varchar(30) DEFAULT NULL,
  `Alamat_Pengirim` varchar(100) DEFAULT NULL,
  `No_Telp_Pengirim` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datadiripengirim`
--

INSERT INTO `datadiripengirim` (`Kd_Pengirim`, `Kd_Kelurahan`, `Nama_Pengirim`, `Alamat_Pengirim`, `No_Telp_Pengirim`) VALUES
(82, 1299, 'MAHANANI', 'JL. RAYA JIWAN BARAT NO 5 KANL JIWAN MADIUN', '085259945995'),
(124, 2234, 'HANUM', 'Jalan Asya Boulevard Jalan / Jakarta Garden City Boulevard, Cakung Timur, Cakung, Jakarta Timur', '081234567890'),
(572, 5475, 'IRWANSYAH', 'Jl. A. Yani No.148, Purwodadi, Kec. Blimbing, Kota Malang', '081237469179');

-- --------------------------------------------------------

--
-- Table structure for table `detailpengiriman`
--

CREATE TABLE `detailpengiriman` (
  `No_Pengiriman` varchar(20) DEFAULT NULL,
  `ID_JenisPengiriman` int(11) DEFAULT NULL,
  `Berat` varchar(15) DEFAULT NULL,
  `Banyaknya` varchar(30) DEFAULT NULL,
  `Jumlah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailpengiriman`
--

INSERT INTO `detailpengiriman` (`No_Pengiriman`, `ID_JenisPengiriman`, `Berat`, `Banyaknya`, `Jumlah`) VALUES
('BGR/0/No.09229', 1245, '10', '1', '3000000'),
('JKTS/0/No.09228', 1245, '1', '1', '300000'),
('MDN/0/No.09227', 1242, '1', '1', '90000');

-- --------------------------------------------------------

--
-- Table structure for table `jeniskiriman`
--

CREATE TABLE `jeniskiriman` (
  `ID_JenisPengiriman` int(11) NOT NULL,
  `KeteranganIsiPengiriman` varchar(30) DEFAULT NULL,
  `Harga_Kg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeniskiriman`
--

INSERT INTO `jeniskiriman` (`ID_JenisPengiriman`, `KeteranganIsiPengiriman`, `Harga_Kg`) VALUES
(1242, 'Alat Elektronik', 90000),
(1243, 'Peralatan Musik', 20000),
(1245, 'Sepeda Listrik', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `kabupatenkota`
--

CREATE TABLE `kabupatenkota` (
  `Kd_Kabupaten` int(11) NOT NULL,
  `Nama_Kabupaten` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupatenkota`
--

INSERT INTO `kabupatenkota` (`Kd_Kabupaten`, `Nama_Kabupaten`) VALUES
(501, 'SERANG'),
(698, 'MALANG'),
(802, 'MADIUN'),
(873, 'JAKARTA SELATAN'),
(875, 'JAKARTA TIMUR'),
(902, 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `Kd_Kecamatan` int(11) NOT NULL,
  `Nama_Kecamatan` varchar(30) DEFAULT NULL,
  `Kd_Kabupaten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`Kd_Kecamatan`, `Nama_Kecamatan`, `Kd_Kabupaten`) VALUES
(1002, 'JIWAN', 802),
(1032, 'BLIMBING', 698),
(1100, 'PADARINCINGAN', 501),
(1230, 'PANCORAN', 873),
(1234, 'CAKUNG', 875),
(1300, 'BOGOR SELATAN', 873);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `Kd_Kelurahan` int(11) NOT NULL,
  `Nama_Kelurahan` varchar(30) DEFAULT NULL,
  `Kd_Kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`Kd_Kelurahan`, `Nama_Kelurahan`, `Kd_Kecamatan`) VALUES
(1299, 'TEGUHAN', 1002),
(1355, 'KADUBEREUM', 1100),
(2230, 'PENGADEGAN', 1230),
(2234, 'CAKUNG TIMUR', 1234),
(2300, 'BATU TULIS', 1300),
(5475, 'PURWODADI', 1032);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `No_Pengiriman` varchar(20) NOT NULL,
  `Kemasan` varchar(20) DEFAULT NULL,
  `Diskon` varchar(20) DEFAULT NULL,
  `Sub_Total` varchar(30) DEFAULT NULL,
  `Ongkos_Kirim` varchar(40) DEFAULT NULL,
  `Keterangan` varchar(30) DEFAULT NULL,
  `Lain_lain` varchar(40) DEFAULT NULL,
  `Penjemputan` varchar(40) DEFAULT NULL,
  `Terbilang` varchar(40) DEFAULT NULL,
  `Operan` varchar(40) DEFAULT NULL,
  `Tgl_Berangkat` date DEFAULT NULL,
  `Penerusan` varchar(25) DEFAULT NULL,
  `Tgl_Diterima` date DEFAULT NULL,
  `Kd_Pengirim` int(11) NOT NULL,
  `Kd_Penerima` int(11) NOT NULL,
  `Service` varchar(10) DEFAULT NULL,
  `Isi_Diperiksa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`No_Pengiriman`, `Kemasan`, `Diskon`, `Sub_Total`, `Ongkos_Kirim`, `Keterangan`, `Lain_lain`, `Penjemputan`, `Terbilang`, `Operan`, `Tgl_Berangkat`, `Penerusan`, `Tgl_Diterima`, `Kd_Pengirim`, `Kd_Penerima`, `Service`, `Isi_Diperiksa`) VALUES
('BGR/0/No.09229', 'DUS', '0%', '3000000', '3000000', 'Diambil di Stasiun Malang', 'TIDAK ADA', 'Dijemput dari Batu Tulis', 'Tiga Juta  Rupiah', 'Barang dioper ke Bogor Selatan', '2020-02-17', 'Diteruskan ke Kota Bogor', '2020-02-22', 572, 157, 'STS', 'TIDAK'),
('JKTS/0/No.09228', 'DUS', '0%', '300000', '300000', 'Diambil di Pengadegan', 'TIDAK ADA', 'Dijemput dari Jakarta Timur', 'Tiga Ratus  Ribu  Rupiah', 'Barang dioper Jakarta Selatan', '2020-01-15', 'Diteruskan ke Cakung', '2020-01-16', 124, 112, 'STS', 'TIDAK'),
('MDN/0/No.09227', 'DUS', '0', '90000', '90000', 'Diambil di Serang Stasiun', 'TIDAK ADA', 'Dijemput dari kota Serang', 'Sembilan Puluh  Ribu  Rupiah', 'Barang Dioper Ke Stasiun', '2020-01-20', 'Diteruskan ke Madiun', '2020-01-30', 82, 772, 'STS', 'YA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datadiripenerima`
--
ALTER TABLE `datadiripenerima`
  ADD PRIMARY KEY (`Kd_Penerima`),
  ADD KEY `Kd_Kelurahan` (`Kd_Kelurahan`);

--
-- Indexes for table `datadiripengirim`
--
ALTER TABLE `datadiripengirim`
  ADD PRIMARY KEY (`Kd_Pengirim`),
  ADD KEY `Kd_Kelurahan` (`Kd_Kelurahan`);

--
-- Indexes for table `detailpengiriman`
--
ALTER TABLE `detailpengiriman`
  ADD KEY `detailpengiriman_ibfk_1` (`No_Pengiriman`),
  ADD KEY `detailpengiriman_ibfk_2` (`ID_JenisPengiriman`);

--
-- Indexes for table `jeniskiriman`
--
ALTER TABLE `jeniskiriman`
  ADD PRIMARY KEY (`ID_JenisPengiriman`);

--
-- Indexes for table `kabupatenkota`
--
ALTER TABLE `kabupatenkota`
  ADD PRIMARY KEY (`Kd_Kabupaten`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`Kd_Kecamatan`),
  ADD KEY `Fk_Kd_Kabupaten` (`Kd_Kabupaten`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`Kd_Kelurahan`),
  ADD KEY `Kd_Kecamatan` (`Kd_Kecamatan`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`No_Pengiriman`),
  ADD KEY `Kd_Pengirim` (`Kd_Pengirim`),
  ADD KEY `Kd_Penerima` (`Kd_Penerima`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datadiripenerima`
--
ALTER TABLE `datadiripenerima`
  ADD CONSTRAINT `datadiripenerima_ibfk_1` FOREIGN KEY (`Kd_Kelurahan`) REFERENCES `kelurahan` (`Kd_Kelurahan`);

--
-- Constraints for table `datadiripengirim`
--
ALTER TABLE `datadiripengirim`
  ADD CONSTRAINT `datadiripengirim_ibfk_1` FOREIGN KEY (`Kd_Kelurahan`) REFERENCES `kelurahan` (`Kd_Kelurahan`);

--
-- Constraints for table `detailpengiriman`
--
ALTER TABLE `detailpengiriman`
  ADD CONSTRAINT `detailpengiriman_ibfk_1` FOREIGN KEY (`No_Pengiriman`) REFERENCES `pengiriman` (`No_Pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailpengiriman_ibfk_2` FOREIGN KEY (`ID_JenisPengiriman`) REFERENCES `jeniskiriman` (`ID_JenisPengiriman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `Fk_Kd_Kabupaten` FOREIGN KEY (`Kd_Kabupaten`) REFERENCES `kabupatenkota` (`Kd_Kabupaten`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`Kd_Kecamatan`) REFERENCES `kecamatan` (`Kd_Kecamatan`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`Kd_Pengirim`) REFERENCES `datadiripengirim` (`Kd_Pengirim`),
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`Kd_Penerima`) REFERENCES `datadiripenerima` (`Kd_Penerima`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
