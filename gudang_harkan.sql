-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2023 at 04:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
  `idbarang` int NOT NULL,
  `namabarang` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kodebarang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategoribarang` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `baik` int NOT NULL,
  `rusak` int NOT NULL,
  `lokasi` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategori_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat_produksi`
--

INSERT INTO `alat_produksi` (`idbarang`, `namabarang`, `kodebarang`, `kategoribarang`, `jumlah`, `baik`, `rusak`, `lokasi`, `kategori_id`) VALUES
(10, 'Bor Magnet', 'DRL01', '0', 167, 166, 1, '-', 1),
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
(51, 'Bor Magnet', 'DRL01', '', 1, 1, 0, '-', 1),
(54, 'coba', 'tes', '0', 1, 0, 1, 'rendal', 1),
(56, 'user testing', 'testing', 'lifting tools', 1, 1, 0, 'dukprod', 1),
(57, 'coba from user', 'cobain', 'coba coba', 1, 1, 0, 'RH01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_angkut_apung`
--

CREATE TABLE `barang_angkut_apung` (
  `idbarang` int NOT NULL,
  `namabarang` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kodebarang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `baik` int NOT NULL,
  `rusak` int NOT NULL,
  `lokasi` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategori_id` int NOT NULL
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
(23, 'cek', 'cekk1', 1, 1, 0, 'dockapung', 4),
(24, 'testing from user', 'mencoba', 1, 1, 0, 'produksi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `barang_asset`
--

CREATE TABLE `barang_asset` (
  `idbarang` int NOT NULL,
  `namabarang` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategoribarang` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `baik` int NOT NULL,
  `rusak` int NOT NULL,
  `lokasi` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_asset`
--

INSERT INTO `barang_asset` (`idbarang`, `namabarang`, `kategoribarang`, `jumlah`, `baik`, `rusak`, `lokasi`, `keterangan`) VALUES
(1, 'Laptop,Ruang Biro Analisa, Evaluasi, SDM dan Transformasi Teknologi', 'laptop', 1, 1, 0, 'Kabiro. Ana, Eva, SDM', 'Keluar'),
(2, 'cek', 'coba', 1, 1, 0, 'rendal', 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `barang_konsumable`
--

CREATE TABLE `barang_konsumable` (
  `idbarang` int NOT NULL,
  `namabarang` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kodebarang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `lokasi` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategori_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_konsumable`
--

INSERT INTO `barang_konsumable` (`idbarang`, `namabarang`, `kodebarang`, `jumlah`, `lokasi`, `kategori_id`) VALUES
(48, 'MCCB 630A MERK SCHNEIDER', 'MCCB630A', 2, '-', 3),
(50, 'cek', 'cekk', 1, '-', 3),
(51, 'coba from user', 'test', 1, 'dock surabaya', 3),
(52, 'usertesing', 'testing', 1, 'Produksi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int NOT NULL,
  `judul_berita` varchar(512) NOT NULL,
  `deskripsi_berita` varchar(2056) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `deskripsi_berita`, `created_at`) VALUES
(1, 'PT PAL (Persero) Tbk Membuka Pabrik Baru untuk Memperluas Produksi Kapal Perang', 'PT PAL (Persero) Tbk, perusahaan galangan kapal terkemuka di Indonesia, telah membuka pabrik produksi baru yang akan membantu meningkatkan kapasitas produksi kapal perang. Langkah ini bertujuan untuk mendukung pertahanan nasional dan industri maritim Indonesia yang berkembang pesat.\r\n\r\nPerusahaan ini juga baru-baru ini meraih penghargaan bergengsi dalam industri maritim berkat inovasi dan kualitas produknya. PT PAL (Persero) Tbk dikenal karena kapal selam canggih buatannya, yang telah diakui secara internasional.\r\n\r\nDengan dukungan dari PT PAL (Persero) Tbk, Indonesia semakin mengukuhkan dirinya sebagai pemain utama dalam industri maritim global. Perusahaan ini berperan penting dalam mendukung pembangunan infrastruktur maritim yang sangat dibutuhkan untuk pertumbuhan ekonomi dan keamanan nasional.\r\n\r\nSilakan gunakan informasi ini sebagai panduan untuk membuat berita lebih rinci tentang PT PAL (Persero) Tbk sesuai dengan kebutuhan Anda.', '2023-09-10 23:13:33'),
(2, 'PT PAL Resmi Mengumumkan Kesepakatan Kerjasama Baru dalam Industri Maritim', 'JAKARTA - PT PAL (Persero), perusahaan pembangunan kapal terkemuka di Indonesia, mengumumkan kemitraan strategis baru dengan perusahaan maritim internasional terkemuka, sebuah langkah besar dalam mendorong pertumbuhan sektor maritim nasional.\r\n\r\nPada hari Rabu, PT PAL mengadakan konferensi pers di Jakarta untuk mengumumkan kesepakatan kolaborasi terbaru mereka. Menurut pernyataan resmi, perusahaan ini akan bekerja sama dengan perusahaan maritim internasional yang memiliki reputasi baik dalam pembangunan kapal komersial dan militer.\r\n\r\n\"Dalam upaya untuk menghadirkan teknologi dan inovasi terbaru ke Indonesia, kami sangat antusias mengumumkan kemitraan ini,\" kata CEO PT PAL dalam konferensi pers tersebut. \"Ini adalah langkah besar dalam memperkuat posisi PT PAL sebagai pemimpin dalam industri maritim.\"\r\n\r\nKemitraan ini diharapkan akan membawa manfaat besar bagi sektor maritim nasional. Ini akan menciptakan lapangan kerja baru, mendorong pertumbuhan ekonomi di daerah terdekat fasilitas PT PAL, dan memberikan akses ke teknologi terbaru dalam pembangunan kapal.\r\n\r\nSebelumnya, PT PAL telah berhasil menyelesaikan proyek-proyek besar seperti kapal perang, kapal komersial, dan kapal penumpang. Kemitraan ini akan membuka pintu bagi proyek-proyek yang lebih besar dan canggih di masa depan.\r\n\r\nIni adalah langkah yang sangat positif bagi PT PAL dan industri maritim Indonesia secara keseluruhan. Pemerintah Indonesia juga telah memberikan dukungan penuh untuk kemitraan ini, mengakui pentingnya industri maritim dalam mendukung pertumbuhan ekonomi negara tersebut.\r\n\r\nSemoga informasi ini bermanfaat dalam memberikan gambaran umum tentang berita terbaru mengenai PT PAL dan kemitraan strategis yang mereka bangun.', '2023-09-10 23:14:04'),
(3, 'coba', 'coba 1', '2023-09-12 04:30:37'),
(4, 'coba', 'coba1', '2023-09-12 05:48:36'),
(5, 'coba 3', 'coba 3', '2023-09-12 08:58:47'),
(6, 'Kebakaran Melanda Desa Lebak Rejo, Kerugian Besar Terjadi', 'Pada tanggal 12 September 2023, sebuah bencana kebakaran hebat melanda Desa Lebak Rejo, mengakibatkan kerugian besar bagi warga dan lingkungan sekitar. Kebakaran ini pertama kali terdeteksi pada pukul 02.00 pagi dan dengan cepat meluas karena angin kencang yang memengaruhi perambatan api.\n\nSejumlah pemadam kebakaran dan relawan segera merespons kejadian tersebut, tetapi mereka menghadapi kesulitan dalam memadamkan api karena kondisi cuaca yang ekstrem. Banyak rumah dan bangunan penting, termasuk sekolah dan fasilitas kesehatan, hancur dalam bencana ini.\n\nTidak ada laporan tentang korban jiwa saat ini, tetapi sejumlah warga dilaporkan kehilangan tempat tinggal dan harta benda mereka. Otoritas setempat dan pihak berwenang terus bekerja keras untuk mengatasi kebakaran ini dan memberikan bantuan kepada mereka yang terkena dampak.\n\nKita semua berdoa agar situasi ini segera teratasi dan para korban dapat mendapatkan bantuan yang mereka perlukan. Lebak Rejo dan warganya membutuhkan dukungan dan solidaritas dari seluruh komunitas di sekitarnya.', '2023-09-14 15:12:52'),
(7, 'Berita Acara', 'acara hut pal colab hut kemerdekaan', '2023-09-15 01:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `iddivisi` int NOT NULL,
  `namadivisi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
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
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
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
  `idtransaksi` int NOT NULL,
  `kodetransaksi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `tanggal_pengajuan` timestamp NULL DEFAULT NULL,
  `tanggalkembali` timestamp NULL DEFAULT NULL,
  `jenisbarang` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nip` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namabarang` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kodebarang` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlahpinjam` int NOT NULL,
  `jumlahkembali` int DEFAULT '0',
  `jumlahrusak` int DEFAULT '0',
  `lokasi` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi_kembali` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isApproved` int DEFAULT '0',
  `status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluar_masuk_barang`
--

INSERT INTO `keluar_masuk_barang` (`idtransaksi`, `kodetransaksi`, `tanggal`, `tanggal_pengajuan`, `tanggalkembali`, `jenisbarang`, `nip`, `namabarang`, `kodebarang`, `jumlahpinjam`, `jumlahkembali`, `jumlahrusak`, `lokasi`, `lokasi_kembali`, `isApproved`, `status`) VALUES
(106, 'PJ1', '2023-09-17 02:41:12', NULL, '2023-09-11 00:01:00', '', '14200137', 'Bor Magnet', 'DRL01', 1, 1, 0, 'RH01', 'PRODPROD', 1, 'Sudah kembali'),
(107, 'PJ2', '2023-09-11 08:16:21', NULL, NULL, '', '22106757', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 1, 'Belum Kembali'),
(108, 'PJ3', NULL, NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(109, 'PJ4', NULL, NULL, NULL, '', '14200138', 'Bor Magnet', 'DRL01', 1, 1, 0, '', '', 0, 'Belum Kembali'),
(110, 'PJ5', NULL, NULL, NULL, '', '14200139', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(111, 'PJ6', NULL, NULL, NULL, '', '14200141', 'Hand Bor (Makita)', 'HDRL02', 1, 1, 0, '', '', 0, 'Belum Kembali'),
(112, 'PJ7', NULL, NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(113, 'PJ8', NULL, NULL, NULL, '', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(114, 'PJ9', NULL, NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(115, 'PJ10', NULL, NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 1, 0, '', '0', 0, 'Belum Kembali'),
(116, 'PJ11', NULL, NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 1, 0, '', '1', 0, 'Belum Kembali'),
(117, 'PJ12', NULL, NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(118, 'PJ13', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(119, 'PJ13', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(120, 'PJ14', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(121, 'PJ14', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(122, 'PJ15', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(123, 'PJ16', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(127, 'PJ17', NULL, NULL, NULL, '', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(128, 'PJ18', NULL, NULL, NULL, '', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(129, 'PJ19', NULL, NULL, NULL, '', '22106757', 'Bor Magnet', 'DRL01', 1, 0, 0, '', '', 0, 'Belum Kembali'),
(130, 'PJ20', NULL, NULL, NULL, '', '22106757', 'Bor Magnet', 'DRL01', 1, 1, 0, 'RH04', 'RH01', 0, 'Belum Kembali'),
(131, 'PJ21', NULL, NULL, '2023-09-15 01:15:00', '', '14200138', 'Bor Magnet', 'DRL01', 1, 1, 0, 'Dock Surabaya', 'dukprod', 3, 'Sudah kembali'),
(132, 'PJ22', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '12345', 'Bor Magnet', 'DRL01', 1, 0, 0, 'dukprod', NULL, 0, 'Belum Kembali'),
(133, 'PJ23', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, 'ddudududududuk', NULL, 0, 'Belum Kembali'),
(134, 'PJ24', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, 'dukduk', NULL, 0, 'Belum Kembali'),
(135, 'PJ25', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, 'dukduk', NULL, 0, 'Belum Kembali'),
(136, 'PJ26', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '12345', 'Bor Magnet', 'DRL01', 1, 0, 0, 'dukprod', NULL, 0, 'Belum Kembali'),
(137, 'PJ27', '2023-09-14 18:12:38', NULL, '2023-09-15 01:16:00', 'Peralatan Pendukung Produksi', '3120500028', 'Bor Magnet', 'DRL01', 1, 1, 0, 'dukprod', '0', 3, 'Sudah kembali'),
(138, 'PJ28', '2023-09-14 19:01:06', NULL, NULL, 'Peralatan Pendukung Produksi', '3120500028', 'Bor Magnet', 'DRL01', 1, 0, 0, 'Dock Surabaya', NULL, 1, 'Belum kembali'),
(139, 'PJ29', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, 'akkaka', NULL, 0, 'Belum kembali'),
(140, 'PJ30', NULL, '2023-09-18 14:38:16', NULL, 'Peralatan Pendukung Produksi', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, '0', NULL, 0, 'Belum kembali');

-- --------------------------------------------------------

--
-- Table structure for table `komunikasi`
--

CREATE TABLE `komunikasi` (
  `idbarang` int NOT NULL,
  `namabarang` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `noseri` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `baik` int NOT NULL,
  `rusak` int NOT NULL,
  `lokasi` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategori_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komunikasi`
--

INSERT INTO `komunikasi` (`idbarang`, `namabarang`, `noseri`, `jumlah`, `baik`, `rusak`, `lokasi`, `kategori_id`) VALUES
(8, 'HT I COM V80', '602733378-1', 3, 3, 0, 'harkan', 2),
(9, 'HT I COM V80', '602733347-1', 2, 1, 1, '-', 2),
(12, 'ceki', 'cekcek', 1, 1, 0, '-', 2),
(13, 'coba from user ', 'testing1', 1, 1, 0, 'K3LH', 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `nama_role` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
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
  `id_user` int NOT NULL,
  `nip_user` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_user` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_user` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `divisi_id` int NOT NULL,
  `role_id` int NOT NULL
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
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

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
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `barang_angkut_apung`
--
ALTER TABLE `barang_angkut_apung`
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `barang_asset`
--
ALTER TABLE `barang_asset`
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_konsumable`
--
ALTER TABLE `barang_konsumable`
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `iddivisi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keluar_masuk_barang`
--
ALTER TABLE `keluar_masuk_barang`
  MODIFY `idtransaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `komunikasi`
--
ALTER TABLE `komunikasi`
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- Constraints for table `keluar_masuk_barang`
--
ALTER TABLE `keluar_masuk_barang`
  ADD CONSTRAINT `nip_foreign` FOREIGN KEY (`nip`) REFERENCES `users` (`nip_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
