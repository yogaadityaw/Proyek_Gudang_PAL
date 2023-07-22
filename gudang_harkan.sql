-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2023 at 03:17 PM
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
-- Database: `gudang_harkan`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_produksi`
--

CREATE TABLE `alat_produksi` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(512) NOT NULL,
  `kodebarang` varchar(100) NOT NULL,
  `namapengebon` varchar(512) NOT NULL,
  `bengkel` varchar(512) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `rusak` int(11) NOT NULL,
  `keterangan` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat_produksi`
--

INSERT INTO `alat_produksi` (`idbarang`, `namabarang`, `kodebarang`, `namapengebon`, `bengkel`, `jumlah`, `baik`, `rusak`, `keterangan`) VALUES
(1, 'tes', '', 'tes', 'tes', 2, 0, 0, 'test'),
(2, 'test', '', 'coba', 'harkan', 2, 1, 0, 'test2'),
(3, 'test test', '', 'ari', 'rendal', 2, 1, 0, 'baru'),
(4, 'cek', '', 'cek', 'cek', 3, 2, 1, 'baik'),
(5, 'tes', '', 'tes', 'tes', 2, 1, 1, 'coba'),
(6, 'cek ', '', 'dua', 'tiga', 2, 2, 0, 'coba'),
(8, 'testing', '', 'coba', 'rh01', 3, 3, 0, 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `barang_angkut_apung`
--

CREATE TABLE `barang_angkut_apung` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(512) NOT NULL,
  `kodebarang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `rusak` int(11) NOT NULL,
  `keterangan` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_angkut_apung`
--

INSERT INTO `barang_angkut_apung` (`idbarang`, `namabarang`, `kodebarang`, `jumlah`, `baik`, `rusak`, `keterangan`) VALUES
(6, 'TD Muria', '', 2, 1, 1, 'test'),
(9, 'TD Muria', '', 3, 2, 1, 'baru'),
(11, 'coba', '', 2, 1, 1, 'test'),
(12, 'kapal', '', 2, 1, 1, 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `barang_konsumable`
--

CREATE TABLE `barang_konsumable` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(512) NOT NULL,
  `kodebarang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_konsumable`
--

INSERT INTO `barang_konsumable` (`idbarang`, `namabarang`, `kodebarang`, `jumlah`, `keterangan`) VALUES
(40, 'oli samping', '', 2, 'baru'),
(42, 'oli diesel', '', 3, 'stok lama'),
(43, 'cek', '', 2, 'cek'),
(44, 'satu', '', 2, 'tiga'),
(46, 'oli kapal', '', 2, 'baru'),
(47, 'plat baja ', '', 2, 'berkarat');

-- --------------------------------------------------------

--
-- Table structure for table `komunikasi`
--

CREATE TABLE `komunikasi` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(512) NOT NULL,
  `noseri` varchar(512) NOT NULL,
  `namapengebon` varchar(512) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `rusak` int(11) NOT NULL,
  `keterangan` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komunikasi`
--

INSERT INTO `komunikasi` (`idbarang`, `namabarang`, `noseri`, `namapengebon`, `jumlah`, `baik`, `rusak`, `keterangan`) VALUES
(2, 'HT I COM V80', '602733378', 'Keluar ( Danu D ) Dock SBY', 2, 1, 1, 'keluar'),
(3, 'BAOPENG', 'SN:17UV212856', 'Mayor Laut Zunaidi', 2, 1, 1, 'keluar'),
(4, 'HT I COM V80', '602733347-1', 'Keluar ( Muliono ) Dock SBY', 2, 1, 1, 'keluar'),
(7, 'ht', '10', 'cek', 5, 5, 0, 'coba');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID_User` int(11) NOT NULL,
  `NIP` int(11) NOT NULL,
  `divisi` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID_User`, `NIP`, `divisi`, `Password`, `role`) VALUES
(1, 12345, '', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_produksi`
--
ALTER TABLE `alat_produksi`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `barang_angkut_apung`
--
ALTER TABLE `barang_angkut_apung`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `barang_konsumable`
--
ALTER TABLE `barang_konsumable`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `komunikasi`
--
ALTER TABLE `komunikasi`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_produksi`
--
ALTER TABLE `alat_produksi`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `barang_angkut_apung`
--
ALTER TABLE `barang_angkut_apung`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `barang_konsumable`
--
ALTER TABLE `barang_konsumable`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `komunikasi`
--
ALTER TABLE `komunikasi`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
