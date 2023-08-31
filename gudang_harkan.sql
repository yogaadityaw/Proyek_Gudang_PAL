-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 03:08 PM
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
  `kategoribarang` varchar(512) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `rusak` int(11) NOT NULL,
  `lokasi` varchar(512) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat_produksi`
--

INSERT INTO `alat_produksi` (`idbarang`, `namabarang`, `kodebarang`, `kategoribarang`, `jumlah`, `baik`, `rusak`, `lokasi`, `kategori_id`) VALUES
(10, 'Bor Magnet', 'DRL01', '0', 169, 168, 1, '-', 1),
(12, 'Hand Bor (Makita)', 'HDRL02', '0', 5, 5, 0, '-', 1),
(13, 'Vacum Test', 'VT01', '0', 1, 1, 0, '-', 1),
(14, 'Load Cell 5 Ton', 'LC5T', '0', 1, 0, 1, '-', 1),
(15, 'Load Cell 10 Ton', 'LC10T', '0', 1, 0, 1, '-', 1),
(16, 'Sabuk 1 Ton', 'BLT1T', '0', 2, 2, 0, '-', 1),
(17, 'Sabuk 2 Ton', 'BLT2T', '0', 2, 2, 0, '-', 1),
(18, 'Sabuk 3 Ton', 'BLT3T', '0', 6, 6, 0, '-', 1),
(19, 'Sabuk 5 Ton', 'BLT5T', '0', 11, 10, 1, '-', 1),
(20, 'Sabuk 10 Ton', 'BLT10T', '0', 4, 4, 0, '-', 1),
(21, 'Gerinda 4 inch (Makita)', 'GRD4', '0', 9, 9, 0, '-', 1),
(22, 'Gerinda 4 inch (Nitori)', 'GRD4', '0', 1, 1, 0, '-', 1),
(23, 'Gerinda 4 inch (Boss)', 'GRD4', '0', 1, 1, 0, '-', 1),
(24, 'Blower 10 inch', 'BLW10', '0', 5, 5, 0, '-', 1),
(25, 'Blower 12 inch', 'BLW12', '0', 3, 3, 0, '-', 1),
(26, 'Jack Hydraulic 20 Ton', 'JHD20T', '0', 2, 2, 0, '-', 1),
(27, 'Jack Hydraulic 30 Ton', 'JHD30T', '0', 2, 0, 2, '-', 1),
(28, 'Jack Hydraulic 50 Ton', 'JHD50T', '0', 2, 1, 1, '-', 1),
(29, 'Jack Hydraulic 100 Ton', 'JHD100', '0', 5, 1, 4, '-', 1),
(30, 'Jack Manual 100 Ton', 'JMT100', '0', 6, 0, 6, '-', 1),
(31, 'Jack Hollow 100 Ton', 'JHL100', '0', 1, 1, 0, '-', 1),
(32, 'Jack Enerpac Manual ', 'JEPMT', '0', 2, 2, 0, '-', 1),
(33, 'Pompa Enerpac P39 700 bar', 'PEP397', '0', 6, 1, 5, '-', 1),
(34, 'Pompa Enerpac P80 1500 bar', 'PEP8015', '0', 2, 2, 4, '-', 1),
(35, 'Pompa Enerparc HPT 1500', 'HPT15', '0', 2, 0, 2, '-', 1),
(36, 'Pompa SKF', 'PSKF', '0', 2, 1, 1, '-', 1),
(37, 'Pompa SKF 1500 bar', 'PSKF15', '0', 1, 1, 0, '-', 1),
(38, 'Pompa Pneumatic', 'PPM', '0', 2, 2, 0, '-', 1),
(39, 'Welding Touch Merk Huatong', 'WDGT', '0', 10, 10, 0, '-', 1),
(40, 'Box Panel Kosongan', 'BXP', '0', 3, 3, 0, '-', 1),
(41, 'Stang Block 3/4 inch', 'HBB34', '0', 10, 10, 0, '-', 1),
(42, 'Tackal 1 Ton (Chain Block)', 'TCK1T', 'Lifting Tools', 3, 3, 0, '-', 1),
(43, 'Tackal 3 Ton (Chain Block)', 'TCK3T', '0', 19, 19, 0, '-', 1),
(44, 'Tackal 5 Ton (Chain Block)', 'TCK5T', '0', 22, 22, 0, '-', 1),
(45, 'Tackal 10 Ton (Chain Block)', 'TCK10T', '0', 7, 7, 0, '-', 1),
(51, 'Bor Magnet', 'DRL09', '0', 1, 1, 0, '-', 1),
(54, 'coba', 'tes', '0', 1, 0, 1, 'rusak', 1);

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
  `lokasi` varchar(512) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_angkut_apung`
--

INSERT INTO `barang_angkut_apung` (`idbarang`, `namabarang`, `kodebarang`, `jumlah`, `baik`, `rusak`, `lokasi`, `kategori_id`) VALUES
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
-- Table structure for table `barang_asset`
--

CREATE TABLE `barang_asset` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(512) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `rusak` int(11) NOT NULL,
  `lokasi` varchar(512) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_asset`
--

INSERT INTO `barang_asset` (`idbarang`, `namabarang`, `jumlah`, `baik`, `rusak`, `lokasi`, `keterangan`) VALUES
(1, 'Laptop,Ruang Biro Analisa, Evaluasi, SDM dan Transformasi Teknologi', 1, 1, 0, 'Kabiro. Ana, Eva, SDM', 'Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `barang_konsumable`
--

CREATE TABLE `barang_konsumable` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(512) NOT NULL,
  `kodebarang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lokasi` varchar(512) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_konsumable`
--

INSERT INTO `barang_konsumable` (`idbarang`, `namabarang`, `kodebarang`, `jumlah`, `lokasi`, `kategori_id`) VALUES
(48, 'MCCB 630A MERK SCHNEIDER', 'MCCB630A', 2, '-', 3),
(50, 'cek', 'cekk', 1, '-', 3),
(51, 'coba', 'test', 1, '-', 3);

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
(1, 'Div Harkan'),
(2, 'Dep. Perencanaan & Pengendalian (5RB003)'),
(3, 'Biro Perencana (5RB083)'),
(4, 'Biro Rekayasa (5RB023)'),
(5, 'Biro Analisa, Evaluasi, SDM & Transformasi Teknologi (5RB093)'),
(6, 'Departemen Produksi (5RH000)'),
(7, 'Biro Koord Pekerjaan (5RH023)'),
(8, 'Bengkel Konstruksi (5RH072)'),
(9, 'Bengkel Sistem Poros & Kemudi (5RH022)'),
(10, 'Bengkel Sistem Bantu & Katup (5RH032)'),
(11, 'Bengkel Mesin Perkakas (5RH042)'),
(12, 'Bengkel Permesinan (5RH052)'),
(13, 'Bengkel Listrik & Kontrol (5RH082)'),
(14, 'Bengkel Blasting, Pengecatan, Scaffolding, & Interior (5RH092)'),
(15, 'Departemen Dukungan Produksi (5RC003)'),
(16, 'Biro Perencanaan & Persiapan Fasilitas Produksi (5RC053)'),
(17, 'Bengkel Maintenance Fasilitas Produksi (5RC0A3)'),
(18, 'Bengkel Dok Gali (5RC0B3)'),
(19, 'Bengkel Dok Apung (5RC0C3)'),
(20, 'Bengkel Dok Apung (5RC0C3)'),
(21, 'Departemen Dok Apung (5RL000)');

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
  `nip` varchar(512) NOT NULL,
  `namabarang` varchar(200) NOT NULL,
  `kodebarang` varchar(200) NOT NULL,
  `jumlahpinjam` int(11) NOT NULL,
  `jumlahkembali` int(11) NOT NULL,
  `jumlahrusak` int(11) NOT NULL,
  `lokasi` varchar(500) NOT NULL,
  `lokasi_kembali` varchar(256) NOT NULL,
  `isApproved` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluar_masuk_barang`
--

INSERT INTO `keluar_masuk_barang` (`idtransaksi`, `kodetransaksi`, `tanggal`, `tanggalkembali`, `nip`, `namabarang`, `kodebarang`, `jumlahpinjam`, `jumlahkembali`, `jumlahrusak`, `lokasi`, `lokasi_kembali`, `isApproved`, `status`) VALUES
(106, 'PJ1', '2023-08-07 14:52:53', '0000-00-00 00:00:00', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, 'RH01', '', 1, 'Belum kembali'),
(107, 'PJ2', '2023-08-07 14:59:53', '0000-00-00 00:00:00', '22106757', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 1, 'Belum kembali'),
(108, 'PJ3', '2023-08-07 15:00:05', '0000-00-00 00:00:00', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 1, 'Belum kembali'),
(109, 'PJ4', '2023-08-07 15:16:46', '2023-08-07 16:33:00', '14200138', 'Bor Magnet', 'DRL01', 1, 1, 0, '', '', 1, 'Sudah kembali'),
(110, 'PJ5', '2023-08-07 15:36:25', '0000-00-00 00:00:00', '14200139', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 1, 'Belum kembali'),
(111, 'PJ6', '2023-08-07 15:37:22', '2023-08-07 15:40:00', '14200141', 'Hand Bor (Makita)', 'HDRL02', 1, 1, 0, '', '', 1, 'Sudah kembali'),
(112, 'PJ7', '2023-08-08 01:06:14', '0000-00-00 00:00:00', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 2, 'Belum kembali'),
(113, 'PJ8', '2023-08-17 08:46:59', '0000-00-00 00:00:00', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 2, 'Belum kembali'),
(114, 'PJ9', '2023-08-17 08:48:29', '0000-00-00 00:00:00', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 1, 'Belum kembali'),
(115, 'PJ10', '2023-08-17 08:50:50', '0000-00-00 00:00:00', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 1, 'Belum kembali'),
(116, 'PJ11', '2023-08-17 08:51:36', '2023-08-17 08:53:00', '14200137', 'Bor Magnet', 'DRL01', 1, 1, 0, '', '', 0, 'Sudah kembali'),
(117, 'PJ12', '2023-08-17 08:54:32', '2023-08-17 08:55:00', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Sudah kembali'),
(118, 'PJ13', '2023-08-22 14:10:03', '0000-00-00 00:00:00', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum kembali'),
(119, 'PJ13', '2023-08-22 14:11:08', '0000-00-00 00:00:00', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum kembali'),
(120, 'PJ14', '2023-08-22 14:11:19', '0000-00-00 00:00:00', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum kembali'),
(121, 'PJ14', '2023-08-22 14:12:57', '0000-00-00 00:00:00', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum kembali'),
(122, 'PJ15', '2023-08-22 14:13:10', '0000-00-00 00:00:00', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum kembali'),
(123, 'PJ16', '2023-08-22 14:13:33', '0000-00-00 00:00:00', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum kembali'),
(127, 'PJ17', '2023-08-24 15:52:34', '0000-00-00 00:00:00', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 2, 'Belum kembali'),
(128, 'PJ18', '2023-08-24 15:53:20', '0000-00-00 00:00:00', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum kembali'),
(129, 'PJ19', '2023-08-28 01:16:18', '0000-00-00 00:00:00', '22106757', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum kembali'),
(130, 'PJ20', '2023-08-28 01:46:20', '2023-08-28 02:20:00', '22106757', 'Bor Magnet', 'DRL01', 1, 1, 0, 'RH04', 'RH01', 1, 'Sudah kembali'),
(131, 'PJ21', '2023-08-28 07:23:04', '0000-00-00 00:00:00', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, 'Dock Surabaya', '', 1, 'Belum kembali');

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
  `lokasi` varchar(512) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komunikasi`
--

INSERT INTO `komunikasi` (`idbarang`, `namabarang`, `noseri`, `jumlah`, `baik`, `rusak`, `lokasi`, `kategori_id`) VALUES
(8, 'HT I COM V80', '602733378-1', 3, 3, 0, 'harkan', 2),
(9, 'HT I COM V80', '602733347-1', 2, 1, 1, '-', 2),
(12, 'ceki', 'cekcek', 1, 1, 0, '-', 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Superadmin'),
(2, 'User'),
(3, 'Atasan'),
(4, 'Peminjam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nip_user` varchar(512) NOT NULL,
  `nama_user` varchar(512) NOT NULL,
  `password_user` varchar(512) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nip_user`, `nama_user`, `password_user`, `divisi_id`, `role_id`) VALUES
(7, '22106757', 'Iffan Dedhy Christianto', '$2y$10$TwpvC6BOsOT48.3AYZk3TuEpZ6dsZnm2QXwNjv7tV1HJhjjhjUyOm', 1, 2),
(12, '12345', 'admin', '$2y$10$xfcW8Ql9iWbjM4pT2SU7QOnwiVjFfjDwij3mOBGktf.2MyIOC7TSm', 1, 1),
(22, '017095870', 'atasan', '$2y$10$NtksZj5ioWjCYoiMfHRJY.EXpfEBEE1s6m8NqBrPzd6.UI5nNcMhq', 2, 3),
(23, '14200139', 'Muhammad Royhan', '$2y$10$Qv5zIZKhiZWAx99XnuAMjO8VRYhOHIPUnqTARaZfQytQ7KD22SPfK', 1, 2),
(24, '14200140', 'Muhammad Fathur', '$2y$10$9G.QjE7yCHf5fRjPWJo5fOyeJ0Mr/cAFJpsZ3BJqI6wP30coPOq4O', 2, 3),
(25, '3120500028', 'Ifku Syoba', '$2y$10$EIkYbZ1lUgE9kpwJNtC78.aR5bHCO1PEYNQwhHOdISPBlk866xtrK', 1, 4),
(26, '14200141', 'Farah', '$2y$10$OemArRVnvnjziK52INyk8OnuhUZz31r/FLNPW0A.aNbLhYU68ahru', 2, 4),
(27, '14200137', 'Yoga', '$2y$10$xfcW8Ql9iWbjM4pT2SU7QOnwiVjFfjDwij3mOBGktf.2MyIOC7TSm', 1, 1),
(29, '14200138', 'Burhan', '$2y$10$SAOmW7P1RnSj6KI6xdZun.cST27PUqyILDhFPfvAA2E5YerSBwn4y', 1, 4),
(30, '14200142', 'Agus', '$2y$10$gYuiFE8iA2t8mS8EBC0zVug1OV9MrGaSOEb8PK305bFEn/SOEGtGW', 1, 2);

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
-- Indexes for table `barang_asset`
--
ALTER TABLE `barang_asset`
  ADD PRIMARY KEY (`idbarang`);

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
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nip_user` (`nip_user`),
  ADD KEY `divisi_id` (`divisi_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_produksi`
--
ALTER TABLE `alat_produksi`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `barang_angkut_apung`
--
ALTER TABLE `barang_angkut_apung`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `barang_asset`
--
ALTER TABLE `barang_asset`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang_konsumable`
--
ALTER TABLE `barang_konsumable`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `iddivisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keluar_masuk_barang`
--
ALTER TABLE `keluar_masuk_barang`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `komunikasi`
--
ALTER TABLE `komunikasi`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  ADD CONSTRAINT `nip_foreign` FOREIGN KEY (`nip`) REFERENCES `users` (`nip_user`);

--
-- Constraints for table `komunikasi`
--
ALTER TABLE `komunikasi`
  ADD CONSTRAINT `komunikasi_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`iddivisi`),
  ADD CONSTRAINT `users_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
