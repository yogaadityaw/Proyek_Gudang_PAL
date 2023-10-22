-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2023 at 03:25 PM
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
(10, 'Bor Magnet', 'DRL01', 'Rotating Tools', 159, 155, 4, 'dukprod', 1),
(12, 'Hand Bor (Makita)', 'HDRL02', '0', 0, 0, 0, '-', 1),
(13, 'Vacum Test', 'VT01', 'alat produksi', 0, 0, 0, '-', 1),
(14, 'Load Cell 5 Ton', 'LC5T', '0', 0, 0, 0, '-', 1),
(15, 'Load Cell 10 Ton', 'LC10T', '0', 1, 0, 1, '-', 1),
(16, 'Sabuk 1 Ton', 'BLT1T', '0', 6, 5, 1, '-', 1),
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
(51, 'Bor Magnet', 'DRL01', '', 159, 155, 4, '-', 1),
(54, 'coba', 'tes', '0', 1, 0, 1, 'rendal', 1),
(56, 'user testing', 'testing', 'lifting tools', 1, 1, 0, 'dukprod', 1),
(57, 'coba from user', 'cobain', 'coba coba', 1, 1, 0, 'RH01', 1),
(59, 'aaa', 'aaa', 'aaa', 1, 0, 1, 'aaa', 1),
(62, 'Data ada', 'Data ada', 'Data ada', 2, 1, 1, 'Data tidak ada', 1),
(63, 'Percobaan', '001', 'nyoba', 1, 1, 0, 'oke', 1);

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
(13, 'Forklift 3 ton', 'FK3T', 0, 0, 0, '-', 4),
(14, 'Forklift 5 Ton', 'FK5T', 1, 1, 0, 'Gudang', 4),
(15, 'Lifttruck', 'LFT', 1, 0, 1, '-', 4),
(16, 'Telescopic', 'TLSC', 1, 0, 1, '-', 4),
(17, 'TD Muria', 'TDMURIA', 1, 0, 1, '-', 4),
(18, 'RB Jepang 50 Ton', 'RBJ50T', 1, 0, 1, '-', 4),
(19, 'RB Rusia 50 Ton', 'RBR50T', 1, 0, 1, '-', 4),
(20, 'Tongkang 04', 'TKG04', 2, 1, 3, '-', 4),
(21, 'Tongkang 205', 'TKG205', 1, 0, 1, '-', 4),
(22, 'Kapal LCM V', 'KLCM5', 1, 0, 1, '-', 4),
(23, 'cek', 'cekk1', 1, 1, 0, 'dockapung', 4),
(24, 'testing from user', 'mencoba', 1, 1, 0, 'produksi', 4),
(25, 'percobaan', 'mencoba', 1, 1, 0, 'Gudang', 4);

-- --------------------------------------------------------

--
-- Table structure for table `barang_asset`
--

CREATE TABLE `barang_asset` (
  `idbarang` int NOT NULL,
  `namabarang` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategoribarang` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `spesifikasi` varchar(512) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `baik` int NOT NULL,
  `rusak` int NOT NULL,
  `lokasi` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_asset`
--

INSERT INTO `barang_asset` (`idbarang`, `namabarang`, `kategoribarang`, `spesifikasi`, `jumlah`, `baik`, `rusak`, `lokasi`, `keterangan`) VALUES
(1, 'laptop', 'laptop bos', 'bagus', 2, 2, 0, 'Kabiro. Ana, Eva, SDM', 'Petra'),
(2, 'cek', 'coba', '', 1, 1, 0, 'rendal', 'masuk'),
(3, 'percobaan', 'mencoba', '07', 1, 1, 0, 'rendal sdm', '');

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
(48, 'MCCB 630A MERK SCHNEIDER', 'aaa', 0, '-', 3),
(50, 'cek', 'cekk', 1, '-', 3),
(51, 'coba from user', 'test', 1, 'dock surabaya', 3),
(52, 'usertesing', 'testing', 1, 'Produksi', 3),
(53, 'percobaan ', 'mencoba', 1, 'dukprod', 3);

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
(3, 'PT PAL Indonesia (Persero): Pemimpin Global dalam Industri Galangan Kapal', 'Surabaya, 25 September 2023 - PT PAL Indonesia (Persero), sebuah perusahaan yang berbasis di Surabaya, telah lama menjadi pemimpin global dalam industri galangan kapal. Sebagai perusahaan negara yang didirikan pada tahun 1980, PT PAL Indonesia telah berkomitmen untuk mengembangkan kemampuan dalam pembuatan kapal dan perbaikan kapal, serta memproduksi berbagai produk pertahanan dan peralatan maritim berkualitas tinggi.', '2023-09-12 04:30:37'),
(4, 'PT PAL Indonesia: Pusat Kemahiran dalam Industri Maritim', 'PT PAL Indonesia (Persero) adalah sebuah perusahaan konstruksi kapal yang beroperasi di Indonesia. Dikenal sebagai salah satu perusahaan terkemuka dalam industri maritim di Asia Tenggara, PT PAL telah membangun sejarah yang cemerlang selama lebih dari setengah abad.\n\nSejarah yang Dimulai dari Pertanian Hingga Maritim\n\nBerawal sebagai usaha pertanian di tahun 1939, PT PAL Indonesia berubah haluan menjadi perusahaan perkapalan pada tahun 1971. Sejak saat itu, perusahaan ini telah mengalami pertumbuhan yang luar biasa dalam menghadirkan berbagai jenis kapal, mulai dari kapal penumpang hingga kapal perang yang canggih.', '2023-09-12 05:48:36'),
(5, 'PT PAL Indonesia: Leader in Maritime Excellence', 'PT PAL Indonesia: Leader in Maritime Excellence\n\nPT PAL Indonesia, also known as Persero PT PAL, stands as a beacon of maritime excellence in Southeast Asia. Founded in 1980, this state-owned enterprise has become synonymous with shipbuilding and engineering prowess, playing a pivotal role in Indonesia\'s naval and maritime development.\n\nA Rich Legacy of Shipbuilding\n\nWith a history that spans over four decades, PT PAL has earned a reputation for its world-class shipbuilding capabilities. The company has consistently delivered vessels that meet the highest international standards, from naval ships and commercial vessels to offshore platforms.', '2023-09-12 08:58:47'),
(6, 'Kebakaran Melanda Desa Lebak Rejo, Kerugian Besar Terjadi', 'Pada tanggal 12 September 2023, sebuah bencana kebakaran hebat melanda Desa Lebak Rejo, mengakibatkan kerugian besar bagi warga dan lingkungan sekitar. Kebakaran ini pertama kali terdeteksi pada pukul 02.00 pagi dan dengan cepat meluas karena angin kencang yang memengaruhi perambatan api.\n\nSejumlah pemadam kebakaran dan relawan segera merespons kejadian tersebut, tetapi mereka menghadapi kesulitan dalam memadamkan api karena kondisi cuaca yang ekstrem. Banyak rumah dan bangunan penting, termasuk sekolah dan fasilitas kesehatan, hancur dalam bencana ini.\n\nTidak ada laporan tentang korban jiwa saat ini, tetapi sejumlah warga dilaporkan kehilangan tempat tinggal dan harta benda mereka. Otoritas setempat dan pihak berwenang terus bekerja keras untuk mengatasi kebakaran ini dan memberikan bantuan kepada mereka yang terkena dampak.\n\nKita semua berdoa agar situasi ini segera teratasi dan para korban dapat mendapatkan bantuan yang mereka perlukan. Lebak Rejo dan warganya membutuhkan dukungan dan solidaritas dari seluruh komunitas di sekitarnya.', '2023-09-14 15:12:52'),
(7, 'PT PAL Indonesia: Sebuah Kilas Balik dan Masa Depan yang Cerah', 'PT PAL Indonesia (Persero) adalah perusahaan pembangunan kapal terkemuka di Indonesia yang telah berdiri selama lebih dari setengah abad. Sejak didirikan pada tahun 1971, perusahaan ini telah menjadi salah satu tonggak penting dalam industri maritim nasional. Mari kita lihat lebih dekat sejarah, pencapaian, serta masa depan cerah PT PAL Indonesia.\n\nSejarah yang Gemilang\n\nPT PAL Indonesia didirikan sebagai produsen kapal pertama di Indonesia pada tahun 1971. Pada awalnya, perusahaan ini memiliki fasilitas yang terbatas, tetapi dengan tekad kuat dan visi yang jelas, mereka berhasil tumbuh dan berkembang pesat.\n\nSelama beberapa dekade, PT PAL Indonesia telah berhasil membangun berbagai jenis kapal, termasuk kapal perang, kapal komersial, kapal penumpang, dan kapal penjelajah antariksa. Pencapaian besar pertama mereka adalah pembangunan kapal selam pertama Indonesia, KRI Cakra, yang diluncurkan pada tahun 1981.', '2023-09-15 01:02:41'),
(8, 'Testing website', 'Berita hari ini dicoba untuk melakukan testing dan mencari bug dalam website sehingga dapat berjalan dengan normal dan dapat digunakan dan dikomersilkan', '2023-10-04 03:23:20'),
(9, 'hshshsh', 'hshshshshhs', '2023-10-22 11:48:31');

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
  `jumlahbaik` int DEFAULT NULL,
  `jumlahrusak` int DEFAULT '0',
  `lokasi` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi_kembali` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isApproved` int DEFAULT '0',
  `status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluar_masuk_barang`
--

INSERT INTO `keluar_masuk_barang` (`idtransaksi`, `kodetransaksi`, `tanggal`, `tanggal_pengajuan`, `tanggalkembali`, `jenisbarang`, `nip`, `namabarang`, `kodebarang`, `jumlahpinjam`, `jumlahkembali`, `jumlahbaik`, `jumlahrusak`, `lokasi`, `lokasi_kembali`, `keterangan`, `isApproved`, `status`) VALUES
(106, 'PJ1', '2023-09-17 02:41:12', NULL, '2023-09-11 00:01:00', '', '14200137', 'Bor Magnet', 'DRL01', 1, 1, 0, 0, 'RH01', 'PRODPROD', '', 1, 'Sudah kembali'),
(107, 'PJ2', '2023-09-11 08:16:21', NULL, NULL, '', '22106757', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 1, 'Belum Kembali'),
(108, 'PJ3', '2023-10-08 08:56:00', NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 1, 'Belum Kembali'),
(109, 'PJ4', NULL, NULL, NULL, '', '14200138', 'Bor Magnet', 'DRL01', 1, 1, 0, 0, '', '', '', 0, 'Belum Kembali'),
(110, 'PJ5', NULL, NULL, NULL, '', '14200139', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(111, 'PJ6', NULL, NULL, NULL, '', '14200141', 'Hand Bor (Makita)', 'HDRL02', 1, 1, 0, 0, '', '', '', 0, 'Belum Kembali'),
(112, 'PJ7', NULL, NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(113, 'PJ8', NULL, NULL, NULL, '', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(114, 'PJ9', NULL, NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(115, 'PJ10', NULL, NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 1, 0, 0, '', '0', '', 0, 'Belum Kembali'),
(116, 'PJ11', NULL, NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 1, 0, 0, '', '1', '', 0, 'Belum Kembali'),
(117, 'PJ12', NULL, NULL, NULL, '', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(118, 'PJ13', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(119, 'PJ13', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(120, 'PJ14', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(121, 'PJ14', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(122, 'PJ15', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(123, 'PJ16', NULL, NULL, NULL, '', '14200141', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(127, 'PJ17', NULL, NULL, NULL, '', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(128, 'PJ18', NULL, NULL, NULL, '', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(129, 'PJ19', NULL, NULL, NULL, '', '22106757', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, '', '', '', 0, 'Belum Kembali'),
(130, 'PJ20', NULL, NULL, NULL, '', '22106757', 'Bor Magnet', 'DRL01', 1, 1, 0, 0, 'RH04', 'RH01', '', 0, 'Belum Kembali'),
(131, 'PJ21', NULL, NULL, '2023-09-15 01:15:00', '', '14200138', 'Bor Magnet', 'DRL01', 1, 1, 0, 0, 'Dock Surabaya', 'dukprod', '', 3, 'Sudah kembali'),
(132, 'PJ22', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '12345', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, 'dukprod', NULL, '', 0, 'Belum Kembali'),
(133, 'PJ23', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, 'ddudududududuk', NULL, '', 0, 'Belum Kembali'),
(134, 'PJ24', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, 'dukduk', NULL, '', 0, 'Belum Kembali'),
(135, 'PJ25', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '14200137', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, 'dukduk', NULL, '', 0, 'Belum Kembali'),
(136, 'PJ26', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '12345', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, 'dukprod', NULL, '', 0, 'Belum Kembali'),
(137, 'PJ27', '2023-09-14 18:12:38', NULL, '2023-09-15 01:16:00', 'Peralatan Pendukung Produksi', '3120500028', 'Bor Magnet', 'DRL01', 1, 1, 0, 0, 'dukprod', '0', '', 3, 'Sudah kembali'),
(138, 'PJ28', '2023-09-14 19:01:06', NULL, '2023-09-21 16:59:00', 'Peralatan Pendukung Produksi', '3120500028', 'Bor Magnet', 'DRL01', 1, 0, 0, 1, 'Dock Surabaya', 'dukprod', 'bon', 3, 'Sudah kembali'),
(139, 'PJ29', NULL, NULL, NULL, 'Peralatan Pendukung Produksi', '14200138', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, 'akkaka', NULL, '', 0, 'Belum kembali'),
(140, 'PJ30', '2023-09-21 09:00:39', '2023-09-18 14:38:16', '2023-09-21 16:04:00', 'Peralatan Pendukung Produksi', '14200138', 'Bor Magnet', 'DRL01', 1, 1, 0, 0, '0', 'Rumah Farah', '', 3, 'Sudah kembali'),
(141, 'PJ31', NULL, '2023-09-21 15:47:49', NULL, 'Barang Konsumable', '12345', 'MCCB 630A MERK SCHNEIDER', 'MCCB630A', 1, 0, 0, 0, 'Dock Surabaya', NULL, '', 0, 'Belum kembali'),
(142, 'PJ32', '2023-10-09 20:23:39', '2023-09-21 15:49:32', NULL, 'Peralatan Pendukung Produksi', '3120500028', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, 'PAL', NULL, '', 1, 'Belum kembali'),
(143, 'PJ33', '2023-10-02 02:39:57', '2023-09-28 13:30:45', '2023-10-02 07:44:00', 'Peralatan Pendukung Produksi', '14200138', 'Bor Magnet', 'DRL01', 1, 1, 0, 0, 'ipan dedi', 'dukprod', 'baik', 3, 'Sudah kembali'),
(144, 'PJ34', '2023-09-28 08:33:18', '2023-09-28 13:31:15', '2023-09-28 13:33:00', 'Alat Komunikasi', '14200138', 'nyoba', 'testing', 1, 1, 0, 0, 'ipan', 'ipan', 'echo', 3, 'Sudah kembali'),
(145, 'PJ35', '2023-10-02 02:46:43', '2023-10-02 07:46:26', '2023-10-02 07:48:00', 'Peralatan Pendukung Produksi', '14200137', 'Hand Bor (Makita)', 'HDRL02', 1, 1, 0, 0, 'RH02', 'gudang , cek test', 'baik', 3, 'Sudah kembali'),
(146, 'PJ36', '2023-10-02 03:07:31', '2023-10-02 08:07:26', NULL, 'Peralatan Pendukung Produksi', '3120500028', 'Vacum Test', 'VT01', 1, 0, 0, 0, 'surabaya', NULL, NULL, 1, 'Belum kembali'),
(147, 'PJ37', '2023-10-02 03:08:09', '2023-10-02 08:07:59', NULL, 'Peralatan Pendukung Produksi', '3120500028', 'Vacum Test', 'VT01', 1, 0, 0, 0, 'malang', NULL, NULL, 1, 'Belum kembali'),
(148, 'PJ38', '2023-10-22 06:43:15', '2023-10-02 13:57:36', NULL, 'Peralatan Pendukung Produksi', '14200138', 'Hand Bor (Makita)', 'HDRL02', 1, 0, 0, 0, 'dukprod', NULL, NULL, 1, 'Belum kembali'),
(149, 'PJ39', '2023-10-09 20:22:52', '2023-10-02 14:00:59', NULL, 'Peralatan Pendukung Produksi', '14200138', 'Bor Magnet', 'DRL01', 4, 0, 0, 0, 'prod', NULL, NULL, 1, 'Belum kembali'),
(150, 'PJ40', '2023-10-02 09:02:26', '2023-10-02 14:02:09', NULL, 'Peralatan Pendukung Produksi', '14200138', 'Bor Magnet', 'DRL01', 4, 0, 0, 0, 'prod', NULL, NULL, 1, 'Belum kembali'),
(151, 'PJ41', '2023-10-17 03:28:46', '2023-10-02 16:21:39', NULL, 'Peralatan Pendukung Produksi', '14200138', 'Hand Bor (Makita)', 'HDRL02', 2, 0, 0, 0, '2', NULL, NULL, 1, 'Belum kembali'),
(152, 'PJ42', '2023-10-11 10:27:44', '2023-10-02 16:22:02', '2023-10-11 15:28:00', 'Peralatan Pendukung Produksi', '14200138', 'Hand Bor (Makita)', 'HDRL02', 2, 2, 0, 2, '123', 'test', 'rusak', 3, 'Sudah kembali'),
(153, 'PJ43', '2023-10-03 22:23:44', '2023-10-02 16:22:38', NULL, 'Peralatan Pendukung Produksi', '14200138', 'Hand Bor (Makita)', 'HDRL02', 2, 0, 0, 0, 'lqkwd', NULL, NULL, 1, 'Belum kembali'),
(154, 'PJ44', NULL, '2023-10-04 03:24:39', NULL, 'Peralatan Pendukung Produksi', '3120500028', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, 'surabaya', NULL, NULL, 2, 'Belum kembali'),
(155, 'PJ45', NULL, '2023-10-04 03:28:56', NULL, 'Alat Komunikasi', '14200138', 'ceki', 'cekcek', 1, 0, 0, 0, 'dukprod', NULL, NULL, 2, 'Belum kembali'),
(156, 'PJ46', '2023-10-11 10:29:17', '2023-10-04 03:38:18', '2023-10-11 15:30:00', 'Barang Konsumable', '14200138', 'cek', 'cekk', 1, 1, 0, 1, 'dukprod', 'TEST', 'RUSAK', 3, 'Sudah kembali'),
(157, 'PJ47', '2023-10-03 22:39:15', '2023-10-04 03:39:10', '2023-10-04 03:51:00', 'Angkat, Angkut, Alat Apung', '14200138', 'Forklift 5 Ton', 'FK5T', 1, 1, 0, 0, 'semarang', 'Gudang', 'baik', 3, 'Sudah kembali'),
(158, 'PJ48', '2023-10-04 00:36:19', '2023-10-04 05:35:03', '2023-10-04 05:37:00', 'Peralatan Pendukung Produksi', '3120500028', 'Bor Magnet', 'DRL01', 1, 1, 0, 0, 'mencoba', 'dukprod', 'baik', 3, 'Sudah kembali'),
(159, 'PJ49', '2023-10-04 00:46:44', '2023-10-04 05:41:14', NULL, 'Peralatan Pendukung Produksi', '3120500028', 'Bor Magnet', 'DRL01', 1, 0, 0, 0, 'Dock Surabaya', NULL, NULL, 1, 'Belum kembali'),
(160, 'PJ50', NULL, '2023-10-08 13:21:15', NULL, 'Peralatan Pendukung Produksi', '14200138', 'Bor Magnet', 'DRL01', 2, 0, 0, 0, 'aw', NULL, NULL, 2, 'Belum kembali'),
(161, 'PJ51', '2023-10-09 20:27:18', '2023-10-10 01:27:10', '2023-10-10 01:36:00', 'Peralatan Pendukung Produksi', '3120500028', 'Bor Magnet', 'DRL01', 1, 0, 0, 1, 'dukprod', 'Gudang', 'Mata bor patah', 3, 'Sudah kembali'),
(162, 'PJ52', NULL, '2023-10-22 13:50:37', NULL, 'Barang Konsumable', '3120500028', 'cek', 'cekk', 1, 0, NULL, 0, 'dukprod', NULL, NULL, 0, 'Belum kembali');

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
(8, 'HT I COM V80', '602733378-1', 0, 0, 0, 'harkan', 2),
(9, 'HT I COM V80', '602733347-1', 2, 1, 1, '-', 2),
(12, 'ceki', 'cekcek', 1, 1, 0, '-', 2),
(13, 'coba from user ', 'testing1', 3, 1, 2, 'K3LH', 2),
(14, 'nyoba', 'testing', 2, 2, 0, 'rendal', 2),
(16, 'coba', 'testing1', 0, 0, 0, 'surabaya', 2);

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
(30, '14200142', 'Agus', '$2y$10$gYuiFE8iA2t8mS8EBC0zVug1OV9MrGaSOEb8PK305bFEn/SOEGtGW', 1, 2),
(35, '123123', 'John Doe', '$2y$10$MIaJZn/dgZMjsQQZmQk5TO3ytbBtcKgB2rW2cMmF4ZraVfhGMRoDO', 3, 2),
(36, '021056593', 'Hamed', '$2y$10$vjbqpXD3gN7yRujqgdOoCe/stcHemrCoxKQzjzXutSDkDGTLutKwK', 15, 2);

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
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `barang_angkut_apung`
--
ALTER TABLE `barang_angkut_apung`
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `barang_asset`
--
ALTER TABLE `barang_asset`
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_konsumable`
--
ALTER TABLE `barang_konsumable`
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `idtransaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `komunikasi`
--
ALTER TABLE `komunikasi`
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
