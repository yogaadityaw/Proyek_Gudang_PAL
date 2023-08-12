-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 08:58 PM
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
  `jumlah` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `rusak` int(11) NOT NULL,
  `keterangan` varchar(512) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat_produksi`
--

INSERT INTO `alat_produksi` (`idbarang`, `namabarang`, `kodebarang`, `jumlah`, `baik`, `rusak`, `keterangan`, `kategori_id`) VALUES
(10, 'Bor Magnet', 'DRL01', 188, 188, 0, '-', 1),
(12, 'Hand Bor (Makita)', 'HDRL02', 5, 5, 0, '-', 1),
(13, 'Vacum Test', 'VT01', 1, 1, 0, '-', 1),
(14, 'Load Cell 5 Ton', 'LC5T', 1, 0, 1, '-', 1),
(15, 'Load Cell 10 Ton', 'LC10T', 1, 0, 1, '-', 1),
(16, 'Sabuk 1 Ton', 'BLT1T', 2, 2, 0, '-', 1),
(17, 'Sabuk 2 Ton', 'BLT2T', 2, 2, 0, '-', 1),
(18, 'Sabuk 3 Ton', 'BLT3T', 6, 6, 0, '-', 1),
(19, 'Sabuk 5 Ton', 'BLT5T', 11, 10, 1, '-', 1),
(20, 'Sabuk 10 Ton', 'BLT10T', 4, 4, 0, '-', 1),
(21, 'Gerinda 4 inch (Makita)', 'GRD4', 9, 9, 0, '-', 1),
(22, 'Gerinda 4 inch (Nitori)', 'GRD4', 1, 1, 0, '-', 1),
(23, 'Gerinda 4 inch (Boss)', 'GRD4', 1, 1, 0, '-', 1),
(24, 'Blower 10 inch', 'BLW10', 5, 5, 0, '-', 1),
(25, 'Blower 12 inch', 'BLW12', 3, 3, 0, '-', 1),
(26, 'Jack Hydraulic 20 Ton', 'JHD20T', 2, 2, 0, '-', 1),
(27, 'Jack Hydraulic 30 Ton', 'JHD30T', 2, 0, 2, '-', 1),
(28, 'Jack Hydraulic 50 Ton', 'JHD50T', 2, 1, 1, '-', 1),
(29, 'Jack Hydraulic 100 Ton', 'JHD100', 5, 1, 4, '-', 1),
(30, 'Jack Manual 100 Ton', 'JMT100', 6, 0, 6, '-', 1),
(31, 'Jack Hollow 100 Ton', 'JHL100', 1, 1, 0, '-', 1),
(32, 'Jack Enerpac Manual ', 'JEPMT', 2, 2, 0, '-', 1),
(33, 'Pompa Enerpac P39 700 bar', 'PEP397', 6, 1, 5, '-', 1),
(34, 'Pompa Enerpac P80 1500 bar', 'PEP8015', 2, 2, 4, '-', 1),
(35, 'Pompa Enerparc HPT 1500', 'HPT15', 2, 0, 2, '-', 1),
(36, 'Pompa SKF', 'PSKF', 2, 1, 1, '-', 1),
(37, 'Pompa SKF 1500 bar', 'PSKF15', 1, 1, 0, '-', 1),
(38, 'Pompa Pneumatic', 'PPM', 2, 2, 0, '-', 1),
(39, 'Welding Touch Merk Huatong', 'WDGT', 10, 10, 0, '-', 1),
(40, 'Box Panel Kosongan', 'BXP', 3, 3, 0, '-', 1),
(41, 'Stang Block 3/4 inch', 'HBB34', 10, 10, 0, '-', 1),
(42, 'Tackal 1 Ton (Chain Block)', 'TCK1T', 3, 3, 0, '-', 1),
(43, 'Tackal 3 Ton (Chain Block)', 'TCK3T', 19, 19, 0, '-', 1),
(44, 'Tackal 5 Ton (Chain Block)', 'TCK5T', 22, 22, 0, '-', 1),
(45, 'Tackal 10 Ton (Chain Block)', 'TCK10T', 7, 7, 0, '-', 1),
(51, 'Bor Magnet', 'DRL09', 1, 1, 0, '-', 1),
(53, 'kapal baru', 'KB', 2, 1, 1, '-', 1);

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
  `keterangan` varchar(512) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_angkut_apung`
--

INSERT INTO `barang_angkut_apung` (`idbarang`, `namabarang`, `kodebarang`, `jumlah`, `baik`, `rusak`, `keterangan`, `kategori_id`) VALUES
(13, 'Forklift 3 ton', 'FK3T', 1, 1, 0, '-', 4),
(14, 'Forklift 5 Ton', 'FK5T', 1, 1, 0, '-', 4),
(15, 'Lifttruck', 'LFT', 1, 0, 1, '-', 4),
(16, 'Telescopic', 'TLSC', 1, 0, 1, '-', 4),
(17, 'TD Muria', 'TDMURIA', 1, 0, 1, '-', 4),
(18, 'RB Jepang 50 Ton', 'RBJ50T', 1, 0, 1, '-', 4),
(19, 'RB Rusia 50 Ton', 'RBR50T', 1, 0, 1, '-', 4),
(20, 'Tongkang 04', 'TKG04', 2, 1, 3, '-', 4),
(21, 'Tongkang 205', 'TKG205', 1, 0, 1, '-', 4),
(22, 'Kapal LCM V', 'KLCM5', 1, 0, 1, '-', 4),
(23, 'cek', 'cekk1', 1, 1, 0, '-', 4);

-- --------------------------------------------------------

--
-- Table structure for table `barang_konsumable`
--

CREATE TABLE `barang_konsumable` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(512) NOT NULL,
  `kodebarang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(512) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_konsumable`
--

INSERT INTO `barang_konsumable` (`idbarang`, `namabarang`, `kodebarang`, `jumlah`, `keterangan`, `kategori_id`) VALUES
(48, 'MCCB 630A MERK SCHNEIDER', 'MCCB630A', 2, '-', 3),
(50, 'cek', 'cekk', 1, '-', 3);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `iddivisi` int(11) NOT NULL,
  `namadivisi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`iddivisi`, `namadivisi`) VALUES
(1, 'Maintenence I, Biro Analisa, Evaluasi, SDM & Transformasi Teknologi (5RB093)'),
(2, 'Human Capital Management'),
(3, 'Divisi Kapal Perang'),
(4, 'Divisi Kapal Selam');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Peralatan Pendukung Produksi'),
(2, 'Alat Komunikasi/(HT)'),
(3, 'Daftar Barang Konsumable'),
(4, 'Daftar Angkat Angkut dan Alat Apung');

-- --------------------------------------------------------

--
-- Table structure for table `keluar_masuk_barang`
--

CREATE TABLE `keluar_masuk_barang` (
  `idtransaksi` int(11) NOT NULL,
  `kodetransaksi` varchar(200) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggalkembali` timestamp NOT NULL DEFAULT current_timestamp(),
  `nip` int(11) NOT NULL,
  `namapegawai` varchar(200) NOT NULL,
  `birobengkel` varchar(256) NOT NULL,
  `namabarang` varchar(200) NOT NULL,
  `kodebarang` varchar(200) NOT NULL,
  `jumlahpinjam` int(11) NOT NULL,
  `jumlahkembali` int(11) NOT NULL,
  `jumlahrusak` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluar_masuk_barang`
--

INSERT INTO `keluar_masuk_barang` (`idtransaksi`, `kodetransaksi`, `tanggal`, `tanggalkembali`, `nip`, `namapegawai`, `birobengkel`, `namabarang`, `kodebarang`, `jumlahpinjam`, `jumlahkembali`, `jumlahrusak`, `keterangan`, `status`) VALUES
(106, 'PJ1', '2023-08-07 14:52:53', '0000-00-00 00:00:00', 14200137, '', '', 'Bor Magnet', 'DRL01', 1, 0, 0, '', 'Belum kembali'),
(107, 'PJ2', '2023-08-07 14:59:53', '0000-00-00 00:00:00', 22106757, '', '', 'Bor Magnet', 'DRL01', 1, 0, 0, '', 'Belum kembali'),
(108, 'PJ3', '2023-08-07 15:00:05', '0000-00-00 00:00:00', 14200137, '', '', 'Bor Magnet', 'DRL01', 1, 0, 0, '', 'Belum kembali'),
(109, 'PJ4', '2023-08-07 15:16:46', '2023-08-07 16:33:00', 14200138, '', '', 'Bor Magnet', 'DRL01', 1, 1, 0, '', 'Sudah kembali'),
(110, 'PJ5', '2023-08-07 15:36:25', '0000-00-00 00:00:00', 14200139, '', '', 'Bor Magnet', 'DRL01', 1, 0, 0, '', 'Belum kembali'),
(111, 'PJ6', '2023-08-07 15:37:22', '2023-08-07 15:40:00', 14200141, '', '', 'Hand Bor (Makita)', 'HDRL02', 1, 1, 0, '', 'Sudah kembali'),
(112, 'PJ7', '2023-08-08 01:06:14', '0000-00-00 00:00:00', 14200137, '', '', 'Bor Magnet', 'DRL01', 1, 0, 0, '', 'Belum kembali');

-- --------------------------------------------------------

--
-- Table structure for table `komunikasi`
--

CREATE TABLE `komunikasi` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(512) NOT NULL,
  `noseri` varchar(512) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `rusak` int(11) NOT NULL,
  `keterangan` varchar(512) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komunikasi`
--

INSERT INTO `komunikasi` (`idbarang`, `namabarang`, `noseri`, `jumlah`, `baik`, `rusak`, `keterangan`, `kategori_id`) VALUES
(8, 'HT I COM V80', '602733378-1', 3, 3, 0, '-', 2),
(9, 'HT I COM V80', '602733347-1', 2, 1, 1, '-', 2),
(12, 'ceki', 'cekcek', 1, 1, 0, '-', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID_User` int(11) NOT NULL,
  `NIP` int(11) NOT NULL,
  `divisi` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID_User`, `NIP`, `divisi`, `Password`, `role_id`) VALUES
(7, 22106757, '', '$2y$10$TwpvC6BOsOT48.3AYZk3TuEpZ6dsZnm2QXwNjv7tV1HJhjjhjUyOm', 2),
(12, 12345, '', '$2y$10$xfcW8Ql9iWbjM4pT2SU7QOnwiVjFfjDwij3mOBGktf.2MyIOC7TSm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `namapegawai` varchar(256) NOT NULL,
  `divisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `nip`, `namapegawai`, `divisi_id`) VALUES
(1, 14200137, 'yoga', 1),
(2, 22106757, 'Iffan Dedhy Christianto', 2),
(3, 14200138, 'coba', 2),
(4, 14200139, 'Muhammad Royhan', 3),
(5, 14200140, 'Muhammad Fathur', 3),
(6, 14200141, 'Farah', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_produksi`
--
ALTER TABLE `alat_produksi`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `barang_angkut_apung`
--
ALTER TABLE `barang_angkut_apung`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `barang_konsumable`
--
ALTER TABLE `barang_konsumable`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`iddivisi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keluar_masuk_barang`
--
ALTER TABLE `keluar_masuk_barang`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `nip_foreign` (`nip`);

--
-- Indexes for table `komunikasi`
--
ALTER TABLE `komunikasi`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_User`),
  ADD UNIQUE KEY `NIP` (`NIP`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `divisi_id` (`divisi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_produksi`
--
ALTER TABLE `alat_produksi`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `barang_angkut_apung`
--
ALTER TABLE `barang_angkut_apung`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `barang_konsumable`
--
ALTER TABLE `barang_konsumable`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `iddivisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keluar_masuk_barang`
--
ALTER TABLE `keluar_masuk_barang`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `komunikasi`
--
ALTER TABLE `komunikasi`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alat_produksi`
--
ALTER TABLE `alat_produksi`
  ADD CONSTRAINT `alat_produksi_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `barang_angkut_apung`
--
ALTER TABLE `barang_angkut_apung`
  ADD CONSTRAINT `barang_angkut_apung_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `barang_konsumable`
--
ALTER TABLE `barang_konsumable`
  ADD CONSTRAINT `barang_konsumable_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `divisi`
--
ALTER TABLE `divisi`
  ADD CONSTRAINT `divisi_id` FOREIGN KEY (`iddivisi`) REFERENCES `pegawai` (`divisi_id`);

--
-- Constraints for table `keluar_masuk_barang`
--
ALTER TABLE `keluar_masuk_barang`
  ADD CONSTRAINT `nip_foreign` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komunikasi`
--
ALTER TABLE `komunikasi`
  ADD CONSTRAINT `komunikasi_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
