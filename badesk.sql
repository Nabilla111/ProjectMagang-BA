-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 02:09 PM
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
-- Database: `badesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bageos`
--

CREATE TABLE `bageos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_ba` text NOT NULL,
  `instansi` text NOT NULL,
  `tanggal_bageo` date NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_ttd` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bageos`
--

INSERT INTO `bageos` (`id`, `jenis_ba`, `instansi`, `tanggal_bageo`, `tahun`, `created_at`, `updated_at`, `id_ttd`) VALUES
(129, 'Pemeriksaan Data Geospasial', 'Dinas Komunikasi dan Informatika Provinsi Jawa Tengah', '2024-01-04', '2024', '2024-09-26 22:00:02', '2024-09-26 22:00:02', 12);

-- --------------------------------------------------------

--
-- Table structure for table `bas`
--

CREATE TABLE `bas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_ba` text NOT NULL,
  `instansi` text NOT NULL,
  `tanggal_ba` date NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bas`
--

INSERT INTO `bas` (`id`, `jenis_ba`, `instansi`, `tanggal_ba`, `tahun`, `created_at`, `updated_at`) VALUES
(7, 'Kesepakatan Format Data', 'Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah', '2024-08-20', '2024', '2024-09-28 01:33:25', '2024-09-28 01:33:25'),
(8, 'Pemenuhan Data Statistik Sektoral', 'Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah', '2024-05-22', '2024', '2024-09-28 01:45:45', '2024-09-28 01:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `informasikugis`
--

CREATE TABLE `informasikugis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bageos_id` bigint(20) UNSIGNED NOT NULL,
  `kode_unsur` text NOT NULL,
  `nama_unsur` text NOT NULL,
  `nama_alias` text NOT NULL,
  `fitur` text NOT NULL,
  `format_data` text NOT NULL,
  `SRSCRS` text NOT NULL,
  `skala` text NOT NULL,
  `atribut` text NOT NULL,
  `catatan` text NOT NULL,
  `saran` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasikugis`
--

INSERT INTO `informasikugis` (`id`, `bageos_id`, `kode_unsur`, `nama_unsur`, `nama_alias`, `fitur`, `format_data`, `SRSCRS`, `skala`, `atribut`, `catatan`, `saran`, `created_at`, `updated_at`) VALUES
(7, 129, 'HC02050060', 'JARINGANTELKOM_LN', 'Jaringan Informasi Dan Sistem Telekomunikasi', 'garis', 'shp', 'EPSG:4326 - WGS 84', '1:50.000', 'sesuai', '-', '-', '2024-09-26 22:00:02', '2024-09-26 22:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `instansis`
--

CREATE TABLE `instansis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_instansi` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instansis`
--

INSERT INTO `instansis` (`id`, `nama_instansi`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Komunikasi dan Informatika Provinsi Jawa Tengah', 'Jl.Menteri Supeno I No.2, Semarang', '(024) 8319140', NULL, NULL),
(3, 'Badan Perencanaan Pembangunan Daerah Provinsi Jawa Tengah', 'Jl. Pemuda No.127-133, Sekayu, Kec. Semarang Tengah', '(024) 3515591', '2024-09-18 07:01:54', '2024-09-18 07:06:35'),
(4, 'Inspektur Provinsi Jawa Tengah', 'Jl. Pemuda No.127-133, Sekayu, Kec. Semarang Tengah', '(024) 3517283', '2024-09-18 07:02:43', '2024-09-18 07:02:43'),
(5, 'Sekretariat Dewan Perwakilan Rakyat Daerah Provinsi Jawa Tengah', 'Jl. Pahlawan No.7, Mugassari, Kec. Semarang Selatan', '(024) 8415500', '2024-09-18 07:05:12', '2024-09-18 07:06:26'),
(6, 'Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah', 'Jl. Pemuda No.1, Dadapsari, Kec. Semarang Utara', '(024) 3515514', '2024-09-18 07:06:17', '2024-09-18 07:06:17'),
(7, 'Badan Kepegawaian Daerah Provinsi Jawa Tengah', 'Jl. Stadion Selatan No.1, Karangkidul, Kec. Semarang Tengah', '(024) 8415813', '2024-09-18 07:08:29', '2024-09-18 07:08:29'),
(9, 'Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa  Tengah', 'Jl. Setiabudi No.201A, Srondol Kulon, Kec. Banyumanik', '(024) 7473066', '2024-09-18 07:10:10', '2024-09-18 07:10:10'),
(10, 'Badan Kesatuan Bangsa dan Politik Provinsi Jawa Tengah', 'Jl. Ahmad Yani No.160, Karangkidul, Kec. Semarang Tengah', '(024) 8454990', '2024-09-18 07:11:21', '2024-09-18 07:11:21'),
(11, 'Badan Penanggulangan Bencana Daerah Provinsi Jawa Tengah', 'Jl. Imam Bonjol 15, Dadapsari, Kec. Semarang Utara', '(024) 3519927', '2024-09-18 07:12:26', '2024-09-18 07:12:36'),
(12, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi Jawa Tengah', 'Jl. Mgr Sugiyopranoto No.1, Pendrikan Kidul, Kec. Semarang Tengah', '(024) 3547091', '2024-09-19 01:15:22', '2024-09-19 01:15:22'),
(13, 'Dinas Perindustrian dan Perdagangan Provinsi Jawa Tengah', 'Jl. Pahlawan No.4, Pleburan, Kec. Semarang Selatan', '(024) 8419826', '2024-09-19 01:16:22', '2024-09-19 01:16:22'),
(14, 'Badan Pengelola Keuangan dan Aset Daerah Provinsi Jawa Tengah', 'Tegalsari, Kec. Candisari, Kota Semarang, Jawa Tengah 50614', '-', '2024-09-19 01:16:47', '2024-09-19 01:16:47'),
(15, 'Badan Riset dan Inovasi Daerah Provinsi Jawa Tengah', 'Jl. Imam Bonjol No.190, Pendrikan Kidul, Kec. Semarang Tengah', '-', '2024-09-19 01:19:18', '2024-09-19 01:19:18'),
(16, 'Dinas Koperasi, Usaha Kecil, dan Menengah Provinsi Jawa Tengah', 'Jl. Sisingamangaraja No.3A, Kaliwiru, Kec. Candisari, Kota Semarang', '(024) 8310556', '2024-09-19 01:20:44', '2024-09-19 01:20:44'),
(17, 'Dinas Tenaga Kerja dan Transmigrasi Provinsi Jawa Tengah', 'Jl. Pahlawan No.16, Pleburan, Kec. Semarang Selatan', '(024) 8311713', '2024-09-19 01:21:23', '2024-09-19 01:21:23'),
(18, 'Dinas Kepemudaan, Olahraga dan Pariwisata Provinsi Jawa Tengah', 'Jl. Pemuda No.136, Sekayu, Kec. Semarang Tengah', '(024) 3546001', '2024-09-19 19:43:20', '2024-09-19 19:43:20'),
(19, 'Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah', 'Jl. Pemuda No.134, Sekayu, Kec. Semarang Tengah', '(024) 3515301', '2024-09-19 19:44:21', '2024-09-19 19:44:21'),
(20, 'Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah', 'Jl. Setia Budi No.201, Srondol Kulon, Kec. Banyumanik, Kota Semarang', '(024) 7474170', '2024-09-19 19:44:53', '2024-09-19 19:44:53'),
(21, 'Dinas Sosial Provinsi Jawa Tengah', 'Jl. Pahlawan No.12, Pleburan, Kec. Semarang Selatan', '(024) 8311729', '2024-09-19 19:52:33', '2024-09-19 19:52:33'),
(22, 'Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian  Penduduk dan Keluarga Berencana Provinsi Jawa Tengah', 'Jl. Pamularsih Raya No.28, Bongsari, Kec. Semarang Barat, Kota Semarang', '(024) 7602952', '2024-09-19 19:53:17', '2024-09-19 19:53:17'),
(23, 'Dinas Pemberdayaan Masyarakat, Desa, Kependudukan dan Pencatatan Sipil Provinsi Jawa Tengah', 'Jl. Menteri Supeno No.17, Mugassari, Kec. Semarang Selatan., Kota Semarang', '(024) 8311621', '2024-09-19 19:54:18', '2024-09-19 19:54:33'),
(24, 'Dinas Pertanian dan Perkebunan Provinsi Jawa Tengah', 'Jl. Jenderal Gatot Subroto, Bandarjo, Kec. Ungaran Barat., Kabupaten Semarang', '(024) 6921348', '2024-09-19 19:55:46', '2024-09-19 19:55:46'),
(25, 'Dinas Peternakan dan Kesehatan Hewan Provinsi Jawa Tengah', 'JL. Jenderal Gatot Soebroto, Tarubudaya, Ungaran, Central Java, Tarubudaya, Bandarjo, Ungaran Barat', '(024) 6921023', '2024-09-19 19:56:30', '2024-09-19 19:56:30'),
(26, 'Dinas Ketahanan Pangan Provinsi Jawa Tengah', 'Bptp Jateng Laboratorium, Tarubudaya, Bandarjo, Kec. Ungaran Bar., Kabupaten Semarang', '(024) 6921972', '2024-09-19 19:57:11', '2024-09-19 19:57:11'),
(27, 'Dinas Kelautan dan Perikanan Provinsi Jawa Tengah', 'Jl. Imam Bonjol No.134, Sekayu, Kec. Semarang Tengah, Kota Semarang', '(024) 3546469', '2024-09-19 19:57:40', '2024-09-19 19:57:40'),
(28, 'Dinas Lingkungan Hidup dan Kehutanan Provinsi Jawa Tengah', 'Jl. Setiabudi, Srondol Kulon, Kec. Banyumanik, Kota Semarang', '(024) 7478813', '2024-09-19 19:58:19', '2024-09-19 19:58:19'),
(29, 'Dinas Pekerjaan Umum Sumber Daya Air dan Penataan Ruang  Provinsi Jawa Tengah', 'Jl. Madukoro Blok AA-BB, Tawangmas, Semarang Barat, Tawangmas, Kec. Semarang Barat, Kota Semarang', '(024) 7608201', '2024-09-19 19:59:02', '2024-09-19 19:59:02'),
(30, 'Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Tengah', 'JL. Madukoro, Blok AA-BB No.44, Semarang, Central Java, 50144, Tawangmas, Semarang Barat', '(024) 7608203', '2024-09-19 19:59:45', '2024-09-19 19:59:45'),
(31, 'Dinas Perumahan Rakyat dan Kawasan Permukiman Provinsi Jawa  Tengah', 'Jl. Madukoro, Tawangmas, Kec. Semarang Barat, Kota Semarang', '-', '2024-09-19 20:01:25', '2024-09-19 20:01:25'),
(32, 'Dinas PU Bina Marga dan Cipta Karya Provinsi Jawa Tengah', 'Jl. Madukoro Blok AA-BB, Tawangmas, Kec. Semarang Barat, Kota Semarang', '(024) 7613185', '2024-09-19 20:03:32', '2024-09-19 20:03:32'),
(33, 'Dinas Perhubungan Provinsi Jawa Tengah', 'Jl. Siliwangi No.357, Krapyak, Kec. Semarang Barat, Kota Semarang', '(024) 7605700', '2024-09-19 20:04:06', '2024-09-19 20:04:06'),
(34, 'Satuan Polisi Pamong Praja Provinsi Jawa Tengah', 'Jl. Imam Bonjol No. 154-160, Semarang', '(024) 8447331', '2024-09-19 20:04:50', '2024-09-19 20:04:50'),
(35, 'Dinas Kesehatan Provinsi Jawa Tengah', 'Jl. Kapten Piere Tendean No.24, Sekayu, Kec. Semarang Tengah, Kota Semarang', '(024) 3511351', '2024-09-19 20:05:30', '2024-09-19 20:05:30'),
(36, 'RSUD Dr. Adhyatma, MPH Tugurejo (RSUD Jawa Tengah)', 'Jl. Walisongo KM 8,5 No.137, Tambakaji, Kec. Ngaliyan, Kota Semarang', '(024) 7605297', '2024-09-19 20:07:09', '2024-09-19 20:07:09'),
(37, 'Rumah Sakit Umum Daerah (RSUD) dr. Moewardi', 'Jl. Kolonel Sutarto No.132, Jebres, Kec. Jebres, Kota Surakarta', '(0271) 634634', '2024-09-19 20:07:45', '2024-09-19 20:07:45'),
(38, 'RSUD Prof. Dr. Margono Soekarjo', 'Jl. Dr. Gumbreg No.1, Kebontebu, Berkoh, Kec. Purwokerto Sel., Kabupaten Banyumas', '(0281) 632708', '2024-09-19 20:08:23', '2024-09-19 20:08:23'),
(39, 'RS Umum Daerah dr. Rehatta Provinsi Jawa Tengah', 'Jl. Raya Kelet-Jepara No.Km.37, Karang Anyar, Kelet, Kec. Keling, Kabupaten Jepara', '(0291) 579002', '2024-09-19 20:08:57', '2024-09-19 20:08:57'),
(40, 'RSJD Dr Amino Gondohutomo', 'Jl. Brigjen Sudiarto No.347, Gemah, Kec. Pedurungan, Kota Semarang', '(024) 6722565', '2024-09-19 20:09:38', '2024-09-19 20:09:38'),
(41, 'Rumah Sakit Jiwa Daerah (RSJD) dr. Arif Zainuddin Surakarta', 'Jl. Ki Hajar Dewantara No.80, Jebres, Kec. Jebres, Kota Surakarta', '(0271) 641442', '2024-09-19 20:10:10', '2024-09-19 20:10:10'),
(42, 'RSJD Dr. RM. Soedjarwadi Klaten', 'Jl. Ki Pandanaran No.KM. 2, Senden, Danguran, Kec. Klaten Sel., Kabupaten Klaten', '(0272) 321435', '2024-09-19 20:10:56', '2024-09-19 20:10:56');

-- --------------------------------------------------------

--
-- Table structure for table `jenisbas`
--

CREATE TABLE `jenisbas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenisba` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenisbas`
--

INSERT INTO `jenisbas` (`id`, `jenisba`, `created_at`, `updated_at`) VALUES
(1, 'Pemenuhan Data Statistik Sektoral', '2024-09-17 21:30:54', '2024-09-17 21:30:54'),
(3, 'Kesepakatan Format Data', '2024-09-17 21:31:19', '2024-09-28 00:54:36'),
(4, 'Pemeriksaan Data Geospasial', '2024-09-17 21:31:30', '2024-09-17 21:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `jenisdatas`
--

CREATE TABLE `jenisdatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenisdata` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenisdatas`
--

INSERT INTO `jenisdatas` (`id`, `jenisdata`, `created_at`, `updated_at`) VALUES
(1, 'Data Prioritas', '2024-09-17 21:51:19', '2024-09-17 21:51:19'),
(2, 'Daftar Data', '2024-09-17 21:51:32', '2024-09-17 21:51:32'),
(3, 'Data Lainnya', '2024-09-17 21:51:44', '2024-09-17 21:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `juldabelums`
--

CREATE TABLE `juldabelums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bas_id` bigint(20) UNSIGNED NOT NULL,
  `juduldata_belum` text NOT NULL,
  `julket_belum` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `juldabelums`
--

INSERT INTO `juldabelums` (`id`, `bas_id`, `juduldata_belum`, `julket_belum`, `created_at`, `updated_at`) VALUES
(2, 8, 'Beban Puncak Konsumsi Listrik di Jawa Tengah', '2024', '2024-09-28 01:49:27', '2024-09-28 01:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `juldageospasials`
--

CREATE TABLE `juldageospasials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bageos_id` bigint(20) UNSIGNED NOT NULL,
  `judul_data` text NOT NULL,
  `waktu_unggah` date NOT NULL,
  `duplikasi` text NOT NULL,
  `jenis_data` text NOT NULL,
  `periode` text NOT NULL,
  `catatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `juldas`
--

CREATE TABLE `juldas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bas_id` bigint(20) UNSIGNED NOT NULL,
  `judul_data` text NOT NULL,
  `julket` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `juldas`
--

INSERT INTO `juldas` (`id`, `bas_id`, `judul_data`, `julket`, `created_at`, `updated_at`) VALUES
(7, 7, 'Pajak Daerah', '2024', '2024-09-28 01:33:25', '2024-09-28 01:33:25'),
(9, 8, 'Bauran Energi di Provinsi Jawa Tengah', '2024', '2024-09-28 01:49:27', '2024-09-28 01:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `julda_geos`
--

CREATE TABLE `julda_geos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bageos_id` bigint(20) UNSIGNED NOT NULL,
  `judul_data` text NOT NULL,
  `waktu_unggah` date NOT NULL,
  `duplikasi` text NOT NULL,
  `jenis_data` text NOT NULL,
  `periode` text NOT NULL,
  `catatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `julda_geos`
--

INSERT INTO `julda_geos` (`id`, `bageos_id`, `judul_data`, `waktu_unggah`, `duplikasi`, `jenis_data`, `periode`, `catatan`, `created_at`, `updated_at`) VALUES
(93, 129, 'Jaringan Fiber Optik', '2024-01-03', 'tidak', 'Data Lainnya', 'pertama', '-', '2024-09-26 22:00:02', '2024-09-28 19:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `kesepakatans`
--

CREATE TABLE `kesepakatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bas_id` bigint(20) UNSIGNED NOT NULL,
  `atribut` text NOT NULL,
  `tipe_data` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kesepakatans`
--

INSERT INTO `kesepakatans` (`id`, `bas_id`, `atribut`, `tipe_data`, `created_at`, `updated_at`) VALUES
(7, 7, 'Tahun Data', 'Integer', '2024-09-28 01:33:25', '2024-09-28 01:33:25'),
(8, 7, 'Jenis Pungutan', 'String', '2024-09-28 01:33:25', '2024-09-28 01:33:25'),
(9, 7, 'Target', 'Integer', '2024-09-28 01:33:25', '2024-09-28 01:33:25'),
(10, 7, 'Realisasi', 'Integer', '2024-09-28 01:33:25', '2024-09-28 01:33:25'),
(11, 7, 'Capaian', 'Float', '2024-09-28 01:33:25', '2024-09-28 01:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `metadatageos`
--

CREATE TABLE `metadatageos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bageos_id` bigint(20) UNSIGNED NOT NULL,
  `nama` text NOT NULL,
  `format_data` text NOT NULL,
  `catatan` text NOT NULL,
  `saran` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metadatageos`
--

INSERT INTO `metadatageos` (`id`, `bageos_id`, `nama`, `format_data`, `catatan`, `saran`, `created_at`, `updated_at`) VALUES
(7, 129, '-', '-', 'Belum Ada Metadata', 'Perlu segera disusun Metadata', '2024-09-26 22:00:02', '2024-09-28 19:45:37');

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
(14, '2024_09_09_020108_create_kesepakatan_table', 2),
(32, '0001_01_01_000000_create_users_table', 3),
(33, '0001_01_01_000001_create_cache_table', 3),
(34, '0001_01_01_000002_create_jobs_table', 3),
(35, '2024_04_04_072747_create_bas_table', 3),
(36, '2024_04_04_072816_create_instansis_table', 3),
(37, '2024_04_04_072842_create_juldas_table', 3),
(38, '2024_04_04_072852_create_juldabelums_table', 3),
(39, '2024_04_04_072908_create_roles_table', 3),
(40, '2024_04_04_073623_create_signatures_table', 3),
(41, '2024_04_04_073704_create_signatureprodusens_table', 3),
(42, '2024_04_22_070237_create_jenisbas_table', 3),
(43, '2024_04_25_030119_create_rekapbageospasials_table', 3),
(44, '2024_04_25_030140_create_rekapbastatistiks_table', 3),
(45, '2024_09_09_020354_create_kesepakatans_table', 3),
(46, '2024_09_12_074255_create_jenisdatas_table', 3),
(47, '2024_09_18_025423_create_bageos_table', 4),
(48, '2024_09_18_040440_create_julda_geos_table', 5),
(49, '2024_09_18_040557_create_penjaminankualitas_table', 6),
(50, '2024_09_18_040659_create_metadatageos_table', 7),
(51, '2024_09_18_040731_create_informasikugis_table', 7),
(52, '2024_09_18_040755_create_standardatageos_table', 8),
(53, '2024_09_19_040942_create_penjaminankualitas_table', 9),
(54, '2024_09_19_044651_create_informasikugis_table', 10),
(55, '2024_09_23_035052_create_ttd_kabids_table', 11),
(56, '2024_09_25_075357_add_id_ttd_to_bageos_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `nip` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjaminankualitas`
--

CREATE TABLE `penjaminankualitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bageos_id` bigint(20) UNSIGNED NOT NULL,
  `kelengkapan_dataset` text NOT NULL,
  `konsistensi_logis` text NOT NULL,
  `akurasi_posisi` text NOT NULL,
  `akurasi_tematik` text NOT NULL,
  `akurasi_temporal` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjaminankualitas`
--

INSERT INTO `penjaminankualitas` (`id`, `bageos_id`, `kelengkapan_dataset`, `konsistensi_logis`, `akurasi_posisi`, `akurasi_tematik`, `akurasi_temporal`, `created_at`, `updated_at`) VALUES
(3, 129, 'tolak', 'terima', 'terima', 'terima', 'terima', '2024-09-26 22:00:02', '2024-09-29 20:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `rekapbageospasials`
--

CREATE TABLE `rekapbageospasials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapbastatistiks`
--

CREATE TABLE `rekapbastatistiks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Walidata Daerah', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('M0FZc6KYGjaGqs7s6IPD26pX1lLlOihiJmD6PJU4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidDdMUXVTZ2dHa0NFdUY5VTZ1ZEtkYktPSUNIRURPTFZQcnQ3UHYzNSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2JhL3Nob3cvOCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYmFnZW8vYmFnZW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1727666956),
('RLn4TBmmD7mp7fy2pN7ZrnMcTN9oJf6eVDNXdF5n', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiekhHSmk5MUpvd3hSQ3BaSTZXVWQ2c1FUVHp5N2kxUTEycE5wTmplUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWdlby9iYWdlbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1727666927);

-- --------------------------------------------------------

--
-- Table structure for table `signatureprodusens`
--

CREATE TABLE `signatureprodusens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bas_id` bigint(20) UNSIGNED NOT NULL,
  `nameprodusen` varchar(255) NOT NULL,
  `nipprodusen` varchar(255) NOT NULL,
  `hpprodusen` varchar(255) NOT NULL,
  `signatureprod` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signatureprodusens`
--

INSERT INTO `signatureprodusens` (`id`, `bas_id`, `nameprodusen`, `nipprodusen`, `hpprodusen`, `signatureprod`, `created_at`, `updated_at`) VALUES
(1, 8, 'Destiyan', '199312122025011001', '085716511748', '66fa1060ed8a0.png', '2024-09-29 19:43:44', '2024-09-29 19:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `signatures`
--

CREATE TABLE `signatures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `bas_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signatures`
--

INSERT INTO `signatures` (`id`, `users_id`, `bas_id`, `name`, `nip`, `hp`, `signature`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'Endah Tri Nugraheni, S.Si', '198007142011012005', '08111887030', '66fa102752c2e.png', '2024-09-29 19:42:47', '2024-09-29 19:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `standardatageos`
--

CREATE TABLE `standardatageos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bageos_id` bigint(20) UNSIGNED NOT NULL,
  `bentuk` text NOT NULL,
  `nomor` text NOT NULL,
  `tanggal` date NOT NULL,
  `konsep` text NOT NULL,
  `definisi` text NOT NULL,
  `klasifikasi` text NOT NULL,
  `ukuran` text NOT NULL,
  `satuan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standardatageos`
--

INSERT INTO `standardatageos` (`id`, `bageos_id`, `bentuk`, `nomor`, `tanggal`, `konsep`, `definisi`, `klasifikasi`, `ukuran`, `satuan`, `created_at`, `updated_at`) VALUES
(8, 129, 'belum_ada', '-', '2024-01-03', 'Layanan/jaringan JOL (Jateng Online)', 'OPD, Balai, UPT Provinsi Jawa Tengah yang telah dan akan tersambung dengan   layanan/jaringan JOL (Jateng Online)', '-', '-', '-', '2024-09-26 22:00:02', '2024-09-26 22:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `ttd_kabids`
--

CREATE TABLE `ttd_kabids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` text NOT NULL,
  `jabatan` text NOT NULL,
  `nip` text NOT NULL,
  `ttd` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ttd_kabids`
--

INSERT INTO `ttd_kabids` (`id`, `nama`, `jabatan`, `nip`, `ttd`, `created_at`, `updated_at`) VALUES
(12, 'HITA YOGA PRATYAKSA, SE, M.Kom', 'Kepala Bidang', '19680708 199312 1001', 'ttd_kabids/dG7xJIzC2LUkYRAYnNJblZGHmJ9uwezvltaqLJ1c.png', '2024-09-26 00:55:33', '2024-09-26 00:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `instansi` text NOT NULL,
  `role` text NOT NULL,
  `telpon` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nip`, `instansi`, `role`, `telpon`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Endah Tri Nugraheni, S.Si', '198007142011012005', 'Dinas Komunikasi dan Informatika Provinsi Jawa Tengah', 'Walidata Daerah', '08111887030', '$2y$12$Jlqskon.iKaMUqcrp87ltecGFYKPzMaqPaL9b5vgEPaQLofcRZD66', NULL, '2024-09-17 20:48:33', '2024-09-17 20:48:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bageos`
--
ALTER TABLE `bageos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bageos_id_ttd_foreign` (`id_ttd`);

--
-- Indexes for table `bas`
--
ALTER TABLE `bas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `informasikugis`
--
ALTER TABLE `informasikugis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasikugis_bageos_id_foreign` (`bageos_id`);

--
-- Indexes for table `instansis`
--
ALTER TABLE `instansis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenisbas`
--
ALTER TABLE `jenisbas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenisdatas`
--
ALTER TABLE `jenisdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juldabelums`
--
ALTER TABLE `juldabelums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `juldabelums_bas_id_foreign` (`bas_id`);

--
-- Indexes for table `juldageospasials`
--
ALTER TABLE `juldageospasials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juldas`
--
ALTER TABLE `juldas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `juldas_bas_id_foreign` (`bas_id`);

--
-- Indexes for table `julda_geos`
--
ALTER TABLE `julda_geos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `julda_geos_bageos_id_foreign` (`bageos_id`);

--
-- Indexes for table `kesepakatans`
--
ALTER TABLE `kesepakatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kesepakatans_bas_id_foreign` (`bas_id`);

--
-- Indexes for table `metadatageos`
--
ALTER TABLE `metadatageos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metadatageos_bageos_id_foreign` (`bageos_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `penjaminankualitas`
--
ALTER TABLE `penjaminankualitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjaminankualitas_bageos_id_foreign` (`bageos_id`);

--
-- Indexes for table `rekapbageospasials`
--
ALTER TABLE `rekapbageospasials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekapbastatistiks`
--
ALTER TABLE `rekapbastatistiks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `signatureprodusens`
--
ALTER TABLE `signatureprodusens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `signatureprodusens_bas_id_foreign` (`bas_id`);

--
-- Indexes for table `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `signatures_users_id_foreign` (`users_id`),
  ADD KEY `signatures_bas_id_foreign` (`bas_id`);

--
-- Indexes for table `standardatageos`
--
ALTER TABLE `standardatageos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standardatageos_bageos_id_foreign` (`bageos_id`);

--
-- Indexes for table `ttd_kabids`
--
ALTER TABLE `ttd_kabids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bageos`
--
ALTER TABLE `bageos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `bas`
--
ALTER TABLE `bas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasikugis`
--
ALTER TABLE `informasikugis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `instansis`
--
ALTER TABLE `instansis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `jenisbas`
--
ALTER TABLE `jenisbas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenisdatas`
--
ALTER TABLE `jenisdatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `juldabelums`
--
ALTER TABLE `juldabelums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `juldageospasials`
--
ALTER TABLE `juldageospasials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `juldas`
--
ALTER TABLE `juldas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `julda_geos`
--
ALTER TABLE `julda_geos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `kesepakatans`
--
ALTER TABLE `kesepakatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `metadatageos`
--
ALTER TABLE `metadatageos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `penjaminankualitas`
--
ALTER TABLE `penjaminankualitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekapbageospasials`
--
ALTER TABLE `rekapbageospasials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekapbastatistiks`
--
ALTER TABLE `rekapbastatistiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `signatureprodusens`
--
ALTER TABLE `signatureprodusens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `standardatageos`
--
ALTER TABLE `standardatageos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ttd_kabids`
--
ALTER TABLE `ttd_kabids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bageos`
--
ALTER TABLE `bageos`
  ADD CONSTRAINT `bageos_id_ttd_foreign` FOREIGN KEY (`id_ttd`) REFERENCES `ttd_kabids` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `informasikugis`
--
ALTER TABLE `informasikugis`
  ADD CONSTRAINT `informasikugis_bageos_id_foreign` FOREIGN KEY (`bageos_id`) REFERENCES `bageos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `juldabelums`
--
ALTER TABLE `juldabelums`
  ADD CONSTRAINT `juldabelums_bas_id_foreign` FOREIGN KEY (`bas_id`) REFERENCES `bas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `juldas`
--
ALTER TABLE `juldas`
  ADD CONSTRAINT `juldas_bas_id_foreign` FOREIGN KEY (`bas_id`) REFERENCES `bas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `julda_geos`
--
ALTER TABLE `julda_geos`
  ADD CONSTRAINT `julda_geos_bageos_id_foreign` FOREIGN KEY (`bageos_id`) REFERENCES `bageos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kesepakatans`
--
ALTER TABLE `kesepakatans`
  ADD CONSTRAINT `kesepakatans_bas_id_foreign` FOREIGN KEY (`bas_id`) REFERENCES `bas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `metadatageos`
--
ALTER TABLE `metadatageos`
  ADD CONSTRAINT `metadatageos_bageos_id_foreign` FOREIGN KEY (`bageos_id`) REFERENCES `bageos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penjaminankualitas`
--
ALTER TABLE `penjaminankualitas`
  ADD CONSTRAINT `penjaminankualitas_bageos_id_foreign` FOREIGN KEY (`bageos_id`) REFERENCES `bageos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `signatureprodusens`
--
ALTER TABLE `signatureprodusens`
  ADD CONSTRAINT `signatureprodusens_bas_id_foreign` FOREIGN KEY (`bas_id`) REFERENCES `bas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `signatures`
--
ALTER TABLE `signatures`
  ADD CONSTRAINT `signatures_bas_id_foreign` FOREIGN KEY (`bas_id`) REFERENCES `bas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `signatures_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `standardatageos`
--
ALTER TABLE `standardatageos`
  ADD CONSTRAINT `standardatageos_bageos_id_foreign` FOREIGN KEY (`bageos_id`) REFERENCES `bageos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
