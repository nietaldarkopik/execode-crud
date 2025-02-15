-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2024 at 01:14 AM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_taebo`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_title` char(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_keywords` char(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` char(20) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'not active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `slug`, `title`, `description`, `meta_title`, `meta_keywords`, `meta_description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'artikel', 'Contoh Artikel', 'Dalam taekwondo, ada sabuk putih, kuning, hijau, biru, merah, dan hitam. Sabuk hitam dibagi menjadi beberapa tingkat lagi dengan banyaknya strip putih yang ada pada sabuk hitam. Setiap orang yang berlatih taekwondo diwajibkan untuk bisa menguasai jurus-jurus untuk menyerang dan bertahan. Teknik ini akan diajarkan secara bertahap pada setiap jenjangnya. Untuk melewati tahapan sabuk taekwondo, kamu harus melewati ujian penguasaan jurus di setiap tingkatan yang sebelumnya telah diajarkan. Masing-masing ujian tingkat taekwondo memiliki jurus yang berbeda-beda. Mari kita simak urutan tingkat di taekwondo satu per satu!\r\n\r\nAlamat Penyelenggara: Pereng Wetan ARGOREJO, SEDAYU, KABUPATEN BANTUL, DI YOGYAKARTA', 'Artikel', 'Artikel', 'Artikel', 'uploads/article/image/X8CsAOuGTmIbqZfdjeTzXQchYSFNeGhpqBouRlOG.jpg', 'active', '2024-11-28 04:23:27', '2024-12-01 02:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `championships`
--

CREATE TABLE `championships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `reg_open` date DEFAULT NULL,
  `reg_close` date DEFAULT NULL,
  `description` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `organizer` char(250) COLLATE utf8mb3_unicode_ci NOT NULL,
  `place` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `event_start` date NOT NULL,
  `event_end` date NOT NULL,
  `grade` char(1) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'C',
  `price` int(11) NOT NULL DEFAULT 0,
  `meta_title` char(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_keywords` char(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` char(20) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'not active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `championships`
--

INSERT INTO `championships` (`id`, `slug`, `title`, `reg_open`, `reg_close`, `description`, `organizer`, `place`, `event_start`, `event_end`, `grade`, `price`, `meta_title`, `meta_keywords`, `meta_description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bhayangkara-presisi-ii-piala-kapolda-diy', 'BHAYANGKARA PRESISI II Piala Kapolda DIY', '2024-11-28', '2024-11-28', 'Penyelenggara: Gelora Energi Indonesia ( GRIND)\r\n\r\nType Kejuaraan: Grade B\r\n\r\n\r\nPendaftaran:  \r\nMulai 25/03/2024\r\nTutup 30/05/2024\r\n\r\nPenyelenggara: Gelora Energi Indonesia ( GRIND)\r\n\r\nTanggal Pelaksanaan:  \r\nDari         21/06/2024\r\nSampai  23/06/2024', 'Gelora Energi Indonesia ( GRIND)', 'GOR UNIVERSITAS NEGERI YOGYAKARTA', '2024-11-28', '2024-11-28', 'B', 234234, 'BHAYANGKARA PRESISI II Piala Kapolda DIY', 'BHAYANGKARA PRESISI II Piala Kapolda DIY', 'BHAYANGKARA PRESISI II Piala Kapolda DIY', 'uploads/championship/image/FbZ1q18PowsnVTKZZcW9jtVoco6XWtMqeLi0rnU1.jpg', 'active', '2024-11-28 09:48:57', '2024-12-01 02:56:41'),
(2, 'indonesia-super-fight-taekwondo-championship2-tahun2024', 'Indonesia Super Fight Taekwondo Championship 2 Tahun 2024', '2024-12-01', '2024-12-01', 'dsfa asdf as fsd', 'Stanley Sport', 'YOGYAKARTA TAEKWONDO MASTER POOMSAE IV', '2024-12-01', '2024-12-01', 'C', 200000, 'Indonesia Super Fight Taekwondo Championship 2 Tahun 2024', 'Indonesia Super Fight Taekwondo Championship 2 Tahun 2024', 'Indonesia Super Fight Taekwondo Championship 2 Tahun 2024', 'uploads/championship/image/ldNPtZf4Jd19f7nHzFBGcNDEh1Heq1LdBKLudMOH.jpg', 'active', '2024-12-01 02:55:12', '2024-12-01 02:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_content_type` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_types`
--

CREATE TABLE `content_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `geups`
--

CREATE TABLE `geups` (
  `id` int(11) NOT NULL,
  `title` char(50) NOT NULL,
  `sort_order` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geups`
--

INSERT INTO `geups` (`id`, `title`, `sort_order`) VALUES
(1, '10 Geup - Sabuk Putih', 1),
(2, '9 Geup - Sabuk Kuning', 2),
(3, '8 Geup - Sabuk Kuning Strip', 3),
(4, '7 Geup - Sabuk Hijau', 4),
(5, '6 Geup - Sabuk Hijau Strip', 5),
(6, '5 Geup - Sabuk Biru', 6),
(7, '4 Geup - Sabuk Biru Strip', 7),
(8, '3 Geup - Sabuk Merah', 8),
(9, '2 Geup - Sabuk Merah Strip', 9),
(10, '1 Geup - Sabuk Merah Strip Hitam', 10),
(11, '1 Dan', 11),
(12, '2 Dan', 12),
(13, '3 Dan', 13),
(14, '4 Dan', 14),
(15, '5 Dan', 15),
(16, '6 Dan', 16),
(17, '7 Dan', 17),
(18, '8 Dan', 18),
(19, '9 Dan (Grandmaster)', 19);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nama` char(250) NOT NULL,
  `id_member_type` int(2) NOT NULL DEFAULT 3,
  `tempat_lahir` char(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text DEFAULT NULL,
  `id_geup` int(11) NOT NULL,
  `no_reg` bigint(20) DEFAULT NULL,
  `photo` char(250) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nama`, `id_member_type`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `id_geup`, `no_reg`, `photo`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'GHINA JAMILAH WIRANATA', 3, 'BANDUNG', '2014-02-28', 'RT 002 RW 017 KAMPUNG PASANTREN DESA CIMEKAR KECAMATAN CILEUNYI KABUPATEN BANDUNG', 6, 2306090036600, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(3, 'GHITA ARSY AZKADINA', 3, 'BANDUNG', '2017-09-03', 'RT002 RW017 KAMPUNG PASANTREN DESA CIMEKAR KECAMATAN CILEUNYI KABUPATEN BANDUNG', 6, 2303090032042, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(4, 'ABID ZIKRI RAMADHAN', 3, 'BANDUNG', '2016-06-12', 'KOMPLEK BUMI ORANGE BLOK E4 NO.3A KEL. CINUNUK KEC. CILEUNYI KAB.BANDUNG', 6, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(5, 'MUHAMMAD AIDAN AL BARRA', 3, 'CIMAHI', '2013-08-23', 'JL. CIBIRU INDAH 1', 6, 2403090250462, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(6, 'Azza Delisha Ghassani 158', 3, 'Bandung', '2012-06-24', 'Jl. Kampus III no. 16', 6, 2403090250069, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(7, 'ALMAQHVIRA RAMADHANI', 3, 'BANDUNG', '2008-09-13', 'JL VILLA BANDUNG INDAH NO.75 CILEUNYI KULON', 6, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(8, 'ALYA ADRIANA', 3, 'BANDUNG', '2010-05-11', 'JL VILLA BANDUNG INDAH NO.75 CILEUNYI KULON', 6, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(9, 'Radyatama Narendra Satrio', 3, 'Bandung', '2015-07-29', 'Komplek Bumi Orange Blok A14 No 7 ', 6, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(10, 'LILYANA PASLY SIAHAAN', 3, 'BANDUNG', '2016-11-10', 'JlL. KIWI II BLOK F 12 NO 15 RT 02/31 BUMI ORANGE DESA CIMEKAR KEC. CILEUNYI KAB. BANDUNG', 6, 2403090250203, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(11, 'Ralinesyah Bianca Purnomo', 3, 'Bandung', '2013-05-01', 'Puri Mutiara Cibiru No.7 Cibiru Hilir Cileunyi ', 6, 2403090250324, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(12, 'NAZLA ALMAQVIRA PUTERI RAMADHANI', 3, 'Bandung', '2009-02-02', 'BUMI ORANGE BLOK H2-NO 19 JL.JAMBU AIR III,KAB.BANDUNG\nKEC.CILEUNYI DESA CIMEKAR', 6, 2403090250288, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(13, 'VIRA PUTRI MEINANDA', 3, 'SURABAYA', '2015-05-29', 'KOMPLEK PILAR BIRU JLN PILAR BIRU RAYA RT 03 RW 12 BLOK B NO 8', 7, 2306090036865, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(14, 'MUHAMMAD HAFY AR RAIHAN', 3, 'LAHAT', '2009-05-20', 'JL. PANDAN WANGI 1 NO. 8, RT. 02, RW. 16, CIBIRU WETAN, CILEUNYI, BANDUNG', 7, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(15, 'Dzakira aisha rafifa', 3, 'Bandung', '2012-09-12', 'Cibiru asri 1 blok.N no.18', 7, 2212090022945, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(16, 'MUHAMMAD ALFAZ ATHAYA HASMORO', 3, 'BANDUNG', '2016-10-28', 'JL BABAKAN TAROGONG RT05 RW 07\nNo 11/21\nKEL BABAKAN TAROGONG \nKEC BOJONG LOA KALER\n\n\nJL MEKAR INDAH 1 BLK B 93 RT 03 RW 13\nDESA CIBIRU WETAN\nKEC CILEUNYI ', 7, 2212090023118, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(17, 'MUHAMMAD DAFA RAMDHANI', 3, 'CIAMIS', '2008-09-15', 'KAVLING P&K BLOK D1 NO 10', 11, 9831954, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(18, 'NABILA NURMALA HASAN', 3, 'BANDUNG', '2004-05-24', 'KOMP. PERMATA BIRU, BLOK AS 120, DESA CINUNUK, KECAMATAN CILEUNYI, KABUPATEN BANDUNG', 11, 5720066, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(19, 'Sutan Alfarizi Elfaizal Putra', 3, 'Bandung', '2005-09-24', 'Komp. Permata biru blok W2 No.32 Rt 01/Rw 029, Kel. Cimekar, Kec. Cileunyi, Kab. Bandung', 11, 9694253, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(20, 'M TARIEKH ALFARIZI', 3, 'BANDUNG', '2008-04-04', 'Aspol jln nias blok a2 no 14', 12, 9630343, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(21, 'RAISHA ARSYIFA', 3, 'SUBANG', '2010-07-03', 'KOMP PERMATA BIRU BLOK AB 132 RT 07 RW 023 KEC CILEUNYI KAB BANDUNG', 4, 2403090248764, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(22, 'HADRA SITI RAHMAH', 3, 'BANDUNG', '2009-12-12', 'KOMPLEK GRIYA MITRA BLOK H1/14, CINUNUK, CILEUNYI, BANDUNG', 4, 2403090249334, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(23, 'LENTERA ZAHRA FEBIANCA', 3, 'BANDUNG', '2013-02-01', 'KAV MEKAR BIRU BLOK D 149 CIBIRU HILIR ', 4, 2212090022987, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(24, 'Husna Qadri aeni', 3, 'Bandung', '2018-12-18', 'Jl mekar sari ', 4, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(25, 'RAMON HAFUZA DALRISYAMSA', 3, 'BANDUNG', '2015-02-20', 'KOMPLEK DISTRICT ORANGE BLOK A9 NO.9', 4, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(26, 'ROMESA ALMEERA ADIFA KHIRANI', 3, 'BANDUNG', '2017-04-30', 'KOMP.PERMATA BIRU BLOK I2 NO.22 RT.04 RW.27 CINUNUK,CILEUNYI,BANDUNG', 4, 2312090241347, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(27, 'Husna Qadri aeni taebo 158', 3, 'Bandung', '2018-12-18', 'Jl mekar sari', 4, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(28, 'Bunga Aluna Putri Sandi 158', 3, 'Bandung', '2013-04-04', 'Jl Sindang Sari I Gg Rawasari No 1 Antapani Bandung', 4, 2403090248255, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(29, 'Raihan Putra Gunawan 158', 3, 'Bandung', '2012-08-09', 'Gg. Samsi 2 RT 08/01 no. 307', 4, 2403090248755, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(30, 'RASENDRYA AKLEEMA KRISDIAWANTORO', 3, 'BANDUNG', '2016-11-21', 'KOMPLEK PERMATA BIRU BLOK O 75 J CINUNUK CILEUNYI ', 5, 2403090249776, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(31, 'M. ARRIZA ABYAN SETIADI', 3, 'BANDUNG', '2016-03-25', 'PERUM BUMI ORANGE', 5, 240309249474, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(32, 'HAURA HANIFAH ELFAIZAL PUTRI', 3, 'BANDUNG', '2016-05-31', 'PERMATA BIRU BLOK W2 NO 32 RT 01 RW 29', 5, 2212090022971, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(33, 'FAUZIZAH FADIYAH PUTRI SUPARDI', 3, 'BANDUNG', '2015-10-09', 'GRIYA MITRA POSINDO BLOK D4 NO 8', 5, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(34, 'SAUL ANDREAN TAMPUBOLON', 3, 'BANDUNG', '2015-03-22', 'JL. PARAKANSAAT RT. 03 RW. 11', 5, 240309020249858, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(35, 'Hanin qaisara mumtaza', 3, 'Bandung', '2014-11-04', 'Jl kampus 2 no 21 C kelurahan Babakansari Kiaracondong Bandung ', 5, 2312090240378, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(36, 'Alzena Adelia sakhi 158', 3, 'Bandung', '2015-07-27', 'Jl.Arum sari VII RT 03 /RW 12 Babakan sari, Bandung ', 5, 2403090248975, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(37, 'Juna Habibi Irawan 158', 3, 'Tasikmalaya', '2012-06-30', 'jl.jajaway barat no 4f ', 5, 2312090240379, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(38, 'Mazda Ka\'arzani Hoirunnisa', 3, 'Bandung', '2015-07-10', 'jl. jajaway barat no 4f ', 5, 2312090240381, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(39, 'YOSEA Apriando Simarmata', 3, 'Bandung', '2015-04-06', 'BBK sentral Utara RT 08/03', 5, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(40, 'Al Ziggy Saverio', 3, 'Bandung', '2015-05-15', 'Jl. Kampus III no. 16', 5, 2403090248976, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(41, 'DIVYANISHA PUTRI NURVAN', 3, 'JAKARTA', '2016-12-17', 'KOMPLEK PERMATA BIRU 2 , BLOK P2 NO.94, RT07/RW27, CINUNUK', 2, 2403090248304, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(42, 'GEOFARREL CAELIEF ATHARIZ', 3, 'Indramayu', '2016-04-29', 'Komplek Bumi Oren blok C - 7 no. 31 kec. Cileunyi kab. Bandung', 2, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(43, 'MARCHNEVAN ABSHALOM PARDAMEAN SITORUS', 3, 'Bandung', '2017-03-17', 'Bumi Orange blok F15 nomor 15', 2, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(44, 'habibi arsyil asyuro', 3, 'bandung', '2014-11-03', 'komplek pos dan giro blok c 15', 2, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(45, 'AMRAN AFRILIAN NEWTON', 3, 'BANDUNG', '2014-04-02', 'KOMP PERMATA BIRU BLOK T 90', 2, 2403090248135, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(46, 'Alif revan', 3, 'Bandung', '2018-01-21', 'Permata biru blok y2 no 146 RT 08 RW 29', 2, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(47, 'DAVA PRATAMA', 3, 'CIAMIS', '2015-02-13', 'Mekar biru blok C no 157 Cibiru hilir', 2, 2403090248284, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(48, 'NOAH ALFARIZI 158', 3, 'BANDUNG', '2014-03-12', 'JLN DESA GG 7 RT 08 RW 03 NO 20 ', 2, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(49, 'AERILYN FELISIA SASIKIRANA FANRICHMAN 158', 3, 'BANDUNG', '2016-03-05', 'GANG SAMSI 3 NO.85/125A', 2, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(50, 'SHERYL ESFANDIANY RAHARDJA', 3, 'BANDUNG', '2010-06-05', 'KOMP PERMATA BIRU BLOK.R NO.12 RT.011 RW.15', 2, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(51, 'NAJWA ASSALAM', 3, 'Bandung', '2013-02-06', 'Jl. tongkeng dalam no.48', 2, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(52, 'Abidal Gisaka Ramananda', 3, 'Bandung', '2017-10-21', 'Komplek Bumi Orange Jalan Markisa Raya Blok D 5 No. 6', 2, 2403090248051, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(53, 'RASYA MUHAMMAD ATHAYA', 3, 'BANDUNG', '2017-03-03', 'KOMPLEK GRIYA MITRA BLOK H1/14, CINUNUK, CILEUNYI, BANDUNG', 3, 2312090240386, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(54, 'MUHAMMAD ZAHRAN ATHALLAH', 3, 'Bandung', '2015-12-20', 'Komo. Bumi Orange Jl. Anggur III B.5/12a', 3, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(55, 'MUHAMMAD AL ZAHRAN NADHIF 158', 3, 'BANDUNG', '2016-01-26', 'JL. DESA NO 21A RT.07 RW.03 KIARACONDONG BANDUNG 40283', 3, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(56, 'MUHAMMAD DEVARA GERRARDY', 3, 'BANDUNG', '2011-04-02', 'JL. DESA NO 21A RT.07 RW.03 KIARACONDONG BANDUNG 40283', 3, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(57, 'MUHAMMAD DEVARA GERRARDY 158', 3, 'BANDUNG', '2011-04-02', 'JL. DESA NO 21A RT.07 RW.03 KIARACONDONG BANDUNG 40283', 3, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(58, 'Rafandra Ridwan Al Hakim', 3, 'Bandung', '2015-08-16', 'Jl. H. Sumarni dalam II no. 15', 3, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(59, 'ATHAYA ALGHIFARI PRANANDYA', 3, 'BANDUNG', '2015-05-13', 'KOMPLEK BUMI ORANGE BLOK B7 NO 23', 3, 2403090249106, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(60, 'ARIQIN GHAISAN HALIM', 3, 'BANDUNG', '2015-04-29', 'KOMPLEK PERUMAHAN BUMI ORANGE BLOK H1 NO 36 RT 06 RW 30 DESA CIMEKAR KECAMATAN CILEUNYI ', 8, 2303090031747, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(61, 'REYVANDI WILDAN GUNAWAN', 3, 'BANDUNG', '2013-06-13', 'ASPOL CIBIRU BLOK A NO.6', 8, 2403090250594, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(62, 'REVALINA KEISYA GUNAWAN', 3, 'BANDUNG', '2017-04-04', 'ASPOL CIBIRU BLOK A NO. 6', 8, 2403090250593, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(63, 'SATRYA ALFARIDZI SUKANDAR', 3, 'BANDUNG', '2012-03-30', 'JL. RANCAMAUNG NO. 3 CIBiRU HILIR', 8, 2212090023075, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(64, 'FARIZKA QURATU AINI SUPARDI', 3, 'BANDUNG', '2010-10-24', 'Griya mitra posindo Blok D4 no 8', 8, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(65, 'FATHIH NUSANTARA PUTRA', 3, 'BANDUNG', '2014-10-31', 'JL VILLA BANDUNG INDAH NO.75 CILEUNYI KULON', 8, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(66, 'REYVALDI ALFARIZKI', 3, 'BANDUNG', '2015-01-29', 'PANGARITAN UTARA RT 03/RW07', 8, 2209090001267, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(67, 'HANINDYA ASLA RAMADHANI', 3, 'BANDUNG', '2016-06-17', 'PERMATA BIRU BLOK N2 71', 8, 2212090022967, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(68, 'KHALIFA SAKHI GHAISANI', 3, 'BANDUNG', '2015-11-11', 'KOMPLEK BUMI ORANGE BLOK D3 NO 18', 9, 2212090022981, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(69, 'Fauzan Rahman', 3, 'Bandung', '2010-10-21', 'Cikajang 15 No. 19 Antapani kota Bandung ', 9, 2209090001808, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(70, 'Akram Farzana Rahman', 3, 'Bandung', '2014-08-06', 'Cikajang 15 No 19 Antapani kota Bandung ', 9, 2209090001777, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(71, 'MUHAMMAD BUKHARI SA\'AD RASYID', 3, 'BANDUNG', '2012-06-20', 'MEKAR BIRU BLOK D 148 RT 06 RW 07 DESA CIBIRU HILIR KECAMATAN CILEUNYI KABUPATEN BANDUNG 40626', 9, 2209090001451, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(72, 'NABHAN ZULFADLI MUHAMMAD ADNAN', 3, 'BANDUNG', '2013-12-23', 'JLN, MITRA SETIA V NO 11/E 8 NO 6 RT 06 RW 026', 9, 2209090001465, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(73, 'Fairuz Muhammad Supriadi', 3, 'Bandung', '2014-09-22', 'Komp. Permata Biru tahap 2 Blok P2 no 55', 9, 2209090003545, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(74, 'NATHA NIELA SAKHI ARTANTI', 3, 'BANDUNG', '2010-06-14', 'KOMPLEK BUMI ORANGE, JALAN KAKAO III BLOK C1 NO 09 ', 9, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(75, 'Rizkia khalilah putri', 3, 'Sumedang', '2008-02-15', 'Pertama biru blok F2 no 3 RT 05/RW 27', 9, 22122090023066, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(76, 'ELVIRA RAMADHANI NURUL AGUSTINE', 3, 'BANDUNG', '2010-08-11', 'KOMP. BUMI ORANGE BLOK C7 NO. 41 RT 02 RW 032 KEL. CIMEKAR KEC. CILEUNYI KAB. BANDUNG', 9, 2212090022948, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(77, 'Khalisa almeria', 3, 'Bandung', '2010-01-31', 'Jl Kalipah apo GG pamarset no 141/22B', 10, 2209090001426, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(78, 'HANIF PERWIRA BAYANAKA', 3, 'BANDUNG', '2010-07-19', 'KOMP. BUMI ATLET, BLOK KARATE NO. 8\nCIBIRU HILIR - CILEUNYI \nKAB. BANDUNG', 10, 2209090001908, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(79, 'HAFIZH PUTRA ARADHANA', 3, 'BANDUNG', '2010-07-19', 'KOMP. BUMI ATLET, BLOK KARATE NO. 8\nCIBIRU HILIR - CILEUNYI\nKAB. BANDUNG', 10, 2209090001907, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(80, 'FAIRUZ FIRZA RAHMANI', 3, 'BANDUNG', '2010-04-28', 'jl. senam indah III no 11.A', 10, 2212090023151, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(81, 'IFTINA ASSYABIYA RAMADHANI', 3, 'TASIKMALAYA', '2013-07-12', 'GRIYA MITRA POSINDO JL MITRA ABADI V BLOK A8 NO 9 RT 11 RW 26 KEC CINUNUK CILEUNYI BANDUNG', 10, 2209090001138, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(82, 'SYAREEFA MUSTIKA PUTRI', 3, 'BANDUNG', '2016-02-18', 'Komp.Bumi Orange blok C4 no 28 Bandung', 10, 2200990004006, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(83, 'DAFFA AL FAIRUZABAADI', 3, 'BANDUNG', '2010-03-17', 'KOMP PERMATA BIRU BLOK AM NO.91 JL.ARJUNA III RT.07 RW.24 KEL.CINUNUK KEC.CILEUNYI KAB.BANDUNG', 10, 2209090001795, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(84, 'DENNIS ARKHA ABRAAR', 3, 'BANDUNG', '2015-09-19', 'KOMP PERMATA BIRU BLOM AM NO.91 JL.ARJUNA III RT.07 RW.24 KEL CINUNUK KEC CILEUNYI KAB BANDUNG', 10, 2209090001796, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(85, 'LIYANA TRIIZATI KURNIA', 3, 'BOGOR', '2013-02-01', 'jL RAYA CINUNUK KP PANDANWANGI NO12 RT09/14', 10, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(86, 'Zayn Maliq Zavier Athallah', 3, 'Bandung', '2016-09-27', 'Kavling Sapada No 10 jl Sadang-cipadati ', 10, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(87, 'Monic Lestari Ribenti', 3, 'Bandung', '2012-01-14', 'Komp Griya Mitra Posindo G3 no 2', 10, 2212090023163, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(88, 'SYASHA KAMILIA RAFAYANTI', 3, 'MAJALENGKA', '2012-03-14', 'PERUM BUMIORANGE BLOK C1 NO 25 CIMEKAR CILEUNYI', 10, 2209090001654, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(89, 'Rayna Mustika Fitri', 3, 'Bandung', '2012-10-26', 'Komplek Permata Biru Blok T2 no. 225A', 10, 2209090001500, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(90, 'KHALISA NUR AZIZAH ELFAIZAL PUTRI', 3, 'BANDUNG', '2013-04-19', 'PERMATA BIRU BLOK W2 NO 32 RT 01 RW 29', 10, 2212090023141, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(91, 'Bagastama Narendra Satrio', 3, 'Klaten', '2009-04-12', 'Komplek Bumi Orange Blok A14 No 7', 10, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(92, 'SEVILLA ABNISA YULIANTI PUTRI', 3, 'BANDUNG', '2007-04-22', 'KOMP.BUMI ORANGE BLOK E1 NO38', 10, 2209090001521, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(93, 'ALESHA NAURA ALFATHUNISA', 3, 'BANDUNG', '2013-06-21', 'KOMP. GRIYA MITRA BLOK D4 NO. 3 RT 05 RW 26 DESA CINUNUK KEC. CILEUNYI KAB. BANDUNG', 10, 2209090001340, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(94, 'RAMADHAN AFNAN AT TAUFIQ', 3, 'BANDUNG', '2014-06-24', 'JL.MITRA SEJATI VIII NO 6 CINUNUK CILEUNYI BANDUNG', 10, 2209090003911, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(95, 'JODHA SYAKIRA PUTRI AKBAR', 3, 'BANDUNG', '2015-04-10', 'KOMPLEK CIBIRU ASRI 1 BLOK A NO 24 BANDUNG 40625', 10, 2209090003632, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(96, 'AISHA FAIRUZ HAWA', 3, 'BANDUNG', '2012-06-05', 'KOMP.PERMATA BIRU BLOK S2 NO 26B', 10, 2209090003343, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(97, 'KEYSHA ALMIRA HASAN', 3, 'BANDUNG', '2010-07-19', 'KOMP.PERMATA BIRU BLOK AS NO 120\nRT 08/RW 23,\nDESA CINUNUK\nKEC CILEUNYI', 10, 2209090001819, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(98, 'Muhammad rafa fawwaz athalla', 3, 'Bandung', '2013-01-12', 'Kavling P&K Blok D1 No.10 Cimekar Cileunyi', 10, 190909190347, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(99, 'TISYA DIVIA RIANTYCOVVA', 3, 'SUMEDANG', '2011-10-04', 'KOMPLEK PERMATA BIRU BLOK AD NO 52 B RT/RW 04/24 CINUNUK - CILEUNYi', 10, 2209090001533, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(100, 'DENAYA LATISYA ERNAWAN', 3, 'BANDUNG', '2012-12-28', 'PERUM BUMI ORANGE BLOK D2 NO 80', 10, 2209090003503, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(101, 'DERISYA ARINI RAHMADIA', 3, 'BANDUNG', '2008-09-05', 'KOMP. BUMI ATLET, BLOK TAEKWONDO NO2', 10, 170309140832, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(102, 'BILAL RAYA SULAEMAN AL FATIH', 3, 'Bogor', '2014-04-08', 'Komp. Permata Biru blok X no. 200', 10, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(103, 'Muh. Khalil Ibrahim', 3, 'Palembang', '2013-10-27', 'Jln. Pandan wangi no.16 Kompleks LDIIP Rt.04 Rw.12 ds.cibiru wetan Kec.cileunyi Kab. Bandung', 10, 2209090003742, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(104, 'FERDINAN SAFUTRA', 3, 'BANDUNG', '2014-02-14', 'PERUM KOMPLEK DISTRIC BUMI ORANGE BLOK C 4 NO 7', 10, 2209090003575, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(105, 'MUHAMMAD IBRAHIM AL HAFIDZIN', 3, 'BANDUNG', '2014-03-31', 'KOMP. BUMI ORANGE BLOK C7 NO.41 RT 02 RW 032 KEL.CIMEKAR KEC.CILEUNYI KAB.BANDUNG', 10, 2209090001203, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(106, 'FAHMI ARWITA ADI PRAJA', 3, 'BANDUNG', '2012-08-16', 'Komp.Bumi orange blok c4 no 28', 11, 201209209273, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(107, 'AQHMAL IRHAB FAUDZAN', 3, 'BANDUNG', '2009-11-14', 'Kp. Sukahaji Rt.06/07 Ds. Cimekar Kec. Cileunyi Kab. Bandung.', 11, 9831982, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(108, 'NAURA ADELIA SILMI', 3, 'BANDUNG', '2009-09-18', 'GRIYA MITRA POSINDO BLOK B1 NO.17 CINUNUK CILEUNYI', 11, 60101615, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(109, 'FARRELINA TIARA FERISYA ERNADI', 3, 'BANDUNG', '2009-09-25', 'JALAN CIBIRU INDAH VI NO. 5 RT 02 RW 14\nPANDANWANGI CIBIRU WETAN\nCILEUNYI KABUPATEN BANDUNG ', 11, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(110, 'MAHIRA HASNA KAMILA', 3, 'BANDUNG', '2013-10-06', 'KOMPLEK PERMATA BIRU BLOK U23 RT 02 RW 23 CINUNUK CILEUNYI KABUPATEN BANDUNG', 11, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(111, 'MARYAM AZZAHRA PRIYANTO PUTRI', 3, 'BANDUNG', '2013-03-28', 'KOMP.BUMI ORANGE BLOK E1NO.38', 11, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(112, 'MUHAMMAD RAFFA AZKA HERMAWAN', 3, 'Bandung', '2014-10-12', 'Jl. Raya al jawami kp. Nyalindung perumahan muslim al ma arij regency jl. Shofa no.3 RT.01 RW.09 ', 11, 201209209728, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(113, 'Ali Tsaqib Khirata', 3, 'Bandung', '2016-11-18', 'Permata Biru Blok T2 no 137', 1, 0, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(114, 'AKMAL FARIS HASAN', 3, 'BANDUNG', '2016-03-10', 'KOMPLEK PERMATA BIRU BLOK Y2 NO.291', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(115, 'Muhammad Gibran Khairul Amri', 3, 'Bandung', '2016-11-02', 'Komp Permata Biru blok H2 No. 21', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(116, 'NABILA HASNA AMIRA', 3, 'BANDUNG', '2017-02-14', 'PERMATA BIRU BLOK Z2 NO. 92', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(117, 'FAKHRIE KHAIRUL NIZZAR', 3, 'BANDUNG', '2013-03-20', 'KOMP. PERMATA BIRU BLOK R. 72 CINUNUK CILEUNYI BANDUNG', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(118, 'MUHAMMAD ZAFRAN ALZAIDAN', 3, 'BANDUNG', '2019-10-02', 'KOMP. BUMI ORANGE BLOK B3 NO. 30 RT. 02/30, KEL. CIMEKAR, KEC. CILEUNYI, KAB. BANDUNG', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(119, 'FAEYZA RAQILLA ABDULLAH', 3, 'BANDUNG', '2017-05-16', 'KOMP. PERMATA BIRU BLOK AS NO. 147 CINUNUK', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(120, 'SAMUDRA ALFATIH EMRAN RAMDHANI', 3, 'BANDUNG', '2019-10-17', 'BUMI CILEUNYI ASRI BLOK E NO 4', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(121, 'HILAL ANGKASADIPURA', 3, 'BANDUNG', '2011-11-11', 'BUMI ORANGE BLOK G4 NO 21 ', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(122, 'FAHIRA ZAHWA MAHARANI', 3, 'BANDUNG', '2014-05-12', 'BUMI ORANGE BLOK G4 NO 21 ', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(123, 'NURHALIMAH', 3, 'BANDUNG', '2009-04-05', 'jl.ARUM SARI X', 1, 0, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(124, 'QUISYA DHIFAIRA SYAHNACOVHA', 3, 'BANDUNG', '2020-04-10', 'KOMPLEK PERMATA BIRU BLOK AD NO 52 B RT/RW 04/24 CINUNUK - CILEUNYI', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(125, 'Khaliqa Azalea Zahin Nuragni', 3, 'Bandung', '2015-06-15', 'Kampus 5 no 59 Babakansari Kiaracondong bandung', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(126, 'Raisa Haura Nadzifa', 3, 'Kuningan', '2013-10-13', 'Bumi orange', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(127, 'Reyfa Nadhira Thafana', 3, 'Kuningan', '2014-11-24', 'Bumi orange ', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(128, 'ELVINA OCTAVIA DEWI', 3, 'BANDUNG', '2017-10-12', 'Jl.PANDANWNGI GG.MEKARWANGI 4 NO.7', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL),
(129, 'Davonta Fadh Al Bashiit', 3, 'Bandung', '2012-04-19', 'Griya mitra posindo G2 no 32 Cinunuk cileunyi', 1, NULL, NULL, 0, '2024-12-01 05:18:10', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_types`
--

CREATE TABLE `member_types` (
  `id` int(11) NOT NULL,
  `title` char(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_types`
--

INSERT INTO `member_types` (`id`, `title`) VALUES
(1, 'Admin'),
(2, 'Pelatih'),
(3, 'Anggota'),
(5, 'test22');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_link` char(30) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'page',
  `sort_order` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `icon` char(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `target` char(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_group_id`, `parent_id`, `type_link`, `sort_order`, `code`, `title`, `icon`, `target`) VALUES
(18, 1, NULL, 'external', 1, '#', 'Konten Manajemen', 'nav-icon fas fa-copy', '_self'),
(17, 1, NULL, 'route', 0, 'home', 'Beranda', 'fas fa-tachometer-alt', '_self'),
(49, 3, NULL, 'route', 4, 'front.championship.index', 'Kejuaraan', NULL, '_self'),
(13, 3, NULL, 'route', 3, 'front.article.index', 'Artikel', NULL, '_self'),
(12, 3, NULL, 'route', 1, 'front.member.index', 'Anggota', NULL, '_self'),
(11, 3, NULL, 'route', 2, 'front.news.index', 'Berita', NULL, '_self'),
(50, 3, 0, 'route', 5, 'front.ujiankt.index', 'Info UKT', NULL, '_self'),
(9, 3, NULL, 'page', 0, 'beranda', 'Beranda', NULL, '_self'),
(19, 1, NULL, 'external', 5, NULL, 'Data Utama', 'nav-icon fas fa-edit', '_self'),
(48, 1, 18, 'page', 32, 'admin.ujiankt.index', 'Info UKT', 'far fa-circle nav-icon', '_self'),
(23, 1, NULL, 'external', 18, NULL, 'Pengguna', 'nav-icon fas fa-edit', '_self'),
(24, 1, 18, 'route', 2, 'admin.halaman.index', 'Halaman', 'far fa-circle nav-icon', '_self'),
(25, 1, 18, 'route', 3, 'admin.menu.index', 'Menu', 'far fa-circle nav-icon', '_self'),
(41, 1, 18, 'external', 29, 'admin.championship.index', 'Kejuaraan', 'far fa-circle nav-icon', '_self'),
(47, 1, 19, 'page', 6, 'admin.geup.index', 'Geup', 'far fa-circle nav-icon', '_self'),
(46, 1, 19, 'page', 31, 'admin.member_type.index', 'Jenis Member', 'far fa-circle nav-icon', '_self'),
(36, 1, 23, 'route', 19, 'admin.roles.index', 'Hak Akses', 'far fa-circle nav-icon', '_self'),
(37, 1, 23, 'route', 20, 'admin.users.index', 'Pengguna', 'far fa-circle nav-icon', '_self'),
(38, 1, 23, 'route', 21, 'admin.ubah-password.index', 'Ubah Password', 'far fa-circle nav-icon', '_self'),
(42, 1, 18, 'external', 28, 'admin.article.index', 'Artikel', 'far fa-circle nav-icon', '_self'),
(43, 1, 18, 'external', 27, 'admin.news.index', 'Berita', 'far fa-circle nav-icon', '_self'),
(44, 1, 18, 'external', 26, 'admin.slider.index', 'Image Slider', 'far fa-circle nav-icon', '_self'),
(45, 1, 19, 'page', 30, 'admin.member.index', 'Member', 'far fa-circle nav-icon', '_self');

-- --------------------------------------------------------

--
-- Table structure for table `menu_groups`
--

CREATE TABLE `menu_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `menu_groups`
--

INSERT INTO `menu_groups` (`id`, `code`, `title`) VALUES
(1, 'backoffice', 'Menu Backoffice'),
(3, 'mainmenu', 'Menu Utama');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(30, '2019_08_19_000000_create_failed_jobs_table', 1),
(31, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(32, '2023_10_19_170758_create_settings_table', 1),
(33, '2024_05_06_095357_create_tbl_content_types', 1),
(34, '2024_05_06_095358_create_tbl_contents', 1),
(35, '2024_05_06_095359_create_tbl_menu_groups', 1),
(36, '2024_05_06_095359_create_tbl_menus', 1),
(37, '2024_05_06_095400_create_tbl_pages', 1),
(38, '2024_11_24_133011_create_permission_tables', 1),
(39, '2024_11_24_134438_sliders', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_title` char(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_keywords` char(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` char(20) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'not active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `slug`, `title`, `description`, `meta_title`, `meta_keywords`, `meta_description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dasf-sad-f', 'dsfsadfasdf', 'das fasd fsda', 'as dfasd fasd', 'fasd f', 'asd fasdf ds f', 'uploads/news/image/rmn9EUj7NWu4jjGy5CkfZUwZRg52mao3L7Fa1XGt.jpg', 'active', '2024-11-28 04:53:29', '2024-11-28 04:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `template` char(30) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'page',
  `meta_title` char(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_keywords` char(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `description`, `template`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'beranda', 'Tentang Taebo', '<h1 class=\"monserrat-bold\">TAEKWONDO BUMI ORANGE</h1>\r\n						<p class=\"lato-regular  text-justify\">Taekwondo Bumi Orange adalah sebuah klub seni bela diri yang berfokus pada disiplin Taekwondo,\r\n							seni bela diri asal Korea Selatan. Klub ini berdiri pada tahun 2019 dan sudah memiliki 3 cabang\r\n							di Kota dan Kabupaten Magelang.</p>\r\n						<p class=\"lato-regular  text-justify\">Taekwondo Bumi Orange menawarkan pelatihan bagi berbagai tingkatan, mulai dari pemula hingga\r\n							tingkat lanjut. Taekwondo Bumi Orange mengajarkan teknik-teknik dasar hingga lanjutan dalam\r\n							Taekwondo, termasuk tendangan, pukulan, dan pola gerakan (poomsae), serta aspek-aspek fisik\r\n							seperti kekuatan, kelenturan, dan ketahanan.</p>\r\n						<p class=\"lato-regular  text-justify\">Selain itu, klub ini juga menanamkan nilai-nilai penting seperti disiplin, rasa hormat, dan etika\r\n							dalam berlatih. Taekwondo Bumi Orange sering mengadakan latihan rutin, ujian kenaikan tingkat,\r\n							serta partisipasi dalam kompetisi baik di tingkat lokal, nasional maupun Internasional.</p>', 'beranda', 'Beranda', 'Beranda', 'Beranda', '2024-11-24 08:15:05', '2024-12-01 01:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2546, 'admin.ujiankt.checkSlug', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2545, 'admin.ujiankt.destroy', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2544, 'admin.ujiankt.update', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2543, 'admin.ujiankt.edit', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2542, 'admin.ujiankt.show', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2541, 'admin.ujiankt.store', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2540, 'admin.ujiankt.create', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2539, 'admin.ujiankt.index', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2538, 'front.ujiankt.detail', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2537, 'front.ujiankt.index', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2536, 'api.ujiankt', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2535, 'admin.slider.checkSlug', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2534, 'admin.slider.destroy', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2533, 'admin.slider.update', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2532, 'admin.slider.edit', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2531, 'admin.slider.show', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2530, 'admin.slider.store', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2529, 'admin.slider.create', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2528, 'admin.slider.index', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2527, 'front.slider.detail', 'web', '2024-11-30 07:14:16', '2024-11-30 07:14:16'),
(2526, 'front.slider.index', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2525, 'api.slider', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2524, 'admin.setting.checkSlug', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2523, 'admin.setting.destroy', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2522, 'admin.setting.update', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2521, 'admin.setting.edit', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2520, 'admin.setting.show', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2519, 'admin.setting.store', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2518, 'admin.setting.create', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2517, 'admin.setting.index', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2516, 'front.setting.detail', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2515, 'front.setting.index', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2514, 'api.setting', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2513, 'admin.news.checkSlug', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2512, 'admin.news.destroy', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2511, 'admin.news.update', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2510, 'admin.news.edit', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2509, 'admin.news.show', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2508, 'admin.news.store', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2507, 'admin.news.create', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2506, 'admin.news.index', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2505, 'front.news.detail', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2502, 'admin.member_type.checkSlug', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2503, 'api.news', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2504, 'front.news.index', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2501, 'admin.member_type.destroy', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2500, 'admin.member_type.update', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2498, 'admin.member_type.show', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2499, 'admin.member_type.edit', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2497, 'admin.member_type.store', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2496, 'admin.member_type.create', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2495, 'admin.member_type.index', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2494, 'front.member_type.detail', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2493, 'front.member_type.index', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2492, 'api.member_type', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2491, 'admin.member.checkSlug', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2490, 'admin.member.destroy', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2489, 'admin.member.update', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2488, 'admin.member.edit', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2487, 'admin.member.show', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2486, 'admin.member.store', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2485, 'admin.member.create', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2484, 'admin.member.index', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2483, 'front.member.detail', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2481, 'api.member', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2482, 'front.member.index', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2480, 'admin.geup.checkSlug', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2479, 'admin.geup.destroy', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2478, 'admin.geup.update', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2477, 'admin.geup.edit', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2476, 'admin.geup.show', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2475, 'admin.geup.store', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2474, 'admin.geup.create', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2473, 'admin.geup.index', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2472, 'front.geup.detail', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2471, 'front.geup.index', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2470, 'api.geup', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2468, 'admin.championship.destroy', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2469, 'admin.championship.checkSlug', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2467, 'admin.championship.update', 'web', '2024-11-30 07:14:15', '2024-11-30 07:14:15'),
(2466, 'admin.championship.edit', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2465, 'admin.championship.show', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2464, 'admin.championship.store', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2463, 'admin.championship.create', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2462, 'admin.championship.index', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2461, 'front.championship.detail', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2460, 'front.championship.index', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2459, 'api.championship', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2458, 'admin.article.checkSlug', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2457, 'admin.article.destroy', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2456, 'admin.article.update', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2455, 'admin.article.edit', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2454, 'admin.article.show', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2453, 'admin.article.store', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2452, 'admin.article.create', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2449, 'front.article.index', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2450, 'front.article.detail', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2451, 'admin.article.index', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2448, 'api.article', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2447, 'admin.menu.setGroup', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2446, 'admin.menu.updateSort', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2445, 'admin.halaman.checkSlug', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2443, 'admin.log-crud.update', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2444, 'admin.log-crud.destroy', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2442, 'admin.log-crud.edit', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2440, 'admin.log-crud.store', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2441, 'admin.log-crud.show', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2439, 'admin.log-crud.create', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2436, 'admin.log-crud-notif.update', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2438, 'admin.log-crud.index', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2437, 'admin.log-crud-notif.destroy', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2435, 'admin.log-crud-notif.edit', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2434, 'admin.log-crud-notif.show', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2433, 'admin.log-crud-notif.store', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2432, 'admin.log-crud-notif.create', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2431, 'admin.log-crud-notif.index', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2430, 'admin.ubah-password.destroy', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2429, 'admin.ubah-password.update', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2428, 'admin.ubah-password.edit', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2425, 'admin.ubah-password.create', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2427, 'admin.ubah-password.show', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2426, 'admin.ubah-password.store', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2423, 'admin.users.destroy', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2424, 'admin.ubah-password.index', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2422, 'admin.users.update', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2421, 'admin.users.edit', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2420, 'admin.users.show', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2419, 'admin.users.store', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2418, 'admin.users.create', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2417, 'admin.users.index', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2416, 'admin.roles.destroy', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2415, 'admin.roles.update', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2414, 'admin.roles.edit', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2413, 'admin.roles.show', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2412, 'admin.roles.store', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2411, 'admin.roles.create', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2410, 'admin.roles.index', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2409, 'admin.monitoring.destroy', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2408, 'admin.monitoring.update', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2407, 'admin.monitoring.edit', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2406, 'admin.monitoring.show', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2405, 'admin.monitoring.store', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2404, 'admin.monitoring.create', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2403, 'admin.monitoring.index', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2402, 'admin.menu.destroy', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2400, 'admin.menu.edit', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2401, 'admin.menu.update', 'web', '2024-11-30 07:14:14', '2024-11-30 07:14:14'),
(2399, 'admin.menu.show', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2398, 'admin.menu.store', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2397, 'admin.menu.create', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2395, 'admin.halaman.destroy', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2396, 'admin.menu.index', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2394, 'admin.halaman.update', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2393, 'admin.halaman.edit', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2392, 'admin.halaman.show', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2391, 'admin.halaman.store', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2390, 'admin.halaman.create', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2389, 'admin.halaman.index', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2388, 'admin.dashboard', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2386, 'front.services.getLayer', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2387, 'front.services.getGeometry', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2385, 'front.page.detail', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2384, 'password.confirm', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2383, 'password.update', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2382, 'password.reset', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2381, 'password.email', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2380, 'password.request', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2379, 'register', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2378, 'logout', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2377, 'login', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2376, 'home', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2375, 'ignition.updateConfig', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2373, 'ignition.healthCheck', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2374, 'ignition.executeSolution', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2372, 'livewire.preview-file', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2371, 'livewire.upload-file', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2370, 'livewire.update', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2369, 'sanctum.csrf-cookie', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13'),
(2368, 'adminlte.darkmode.toggle', 'web', '2024-11-30 07:14:13', '2024-11-30 07:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-11-24 06:41:56', '2024-11-24 06:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2368, 1),
(2369, 1),
(2370, 1),
(2371, 1),
(2372, 1),
(2373, 1),
(2374, 1),
(2375, 1),
(2376, 1),
(2377, 1),
(2378, 1),
(2379, 1),
(2380, 1),
(2381, 1),
(2382, 1),
(2383, 1),
(2384, 1),
(2385, 1),
(2386, 1),
(2387, 1),
(2388, 1),
(2389, 1),
(2390, 1),
(2391, 1),
(2392, 1),
(2393, 1),
(2394, 1),
(2395, 1),
(2396, 1),
(2397, 1),
(2398, 1),
(2399, 1),
(2400, 1),
(2401, 1),
(2402, 1),
(2403, 1),
(2404, 1),
(2405, 1),
(2406, 1),
(2407, 1),
(2408, 1),
(2409, 1),
(2410, 1),
(2411, 1),
(2412, 1),
(2413, 1),
(2414, 1),
(2415, 1),
(2416, 1),
(2417, 1),
(2418, 1),
(2419, 1),
(2420, 1),
(2421, 1),
(2422, 1),
(2423, 1),
(2424, 1),
(2425, 1),
(2426, 1),
(2427, 1),
(2428, 1),
(2429, 1),
(2430, 1),
(2431, 1),
(2432, 1),
(2433, 1),
(2434, 1),
(2435, 1),
(2436, 1),
(2437, 1),
(2438, 1),
(2439, 1),
(2440, 1),
(2441, 1),
(2442, 1),
(2443, 1),
(2444, 1),
(2445, 1),
(2446, 1),
(2447, 1),
(2448, 1),
(2449, 1),
(2450, 1),
(2451, 1),
(2452, 1),
(2453, 1),
(2454, 1),
(2455, 1),
(2456, 1),
(2457, 1),
(2458, 1),
(2459, 1),
(2460, 1),
(2461, 1),
(2462, 1),
(2463, 1),
(2464, 1),
(2465, 1),
(2466, 1),
(2467, 1),
(2468, 1),
(2469, 1),
(2470, 1),
(2471, 1),
(2472, 1),
(2473, 1),
(2474, 1),
(2475, 1),
(2476, 1),
(2477, 1),
(2478, 1),
(2479, 1),
(2480, 1),
(2481, 1),
(2482, 1),
(2483, 1),
(2484, 1),
(2485, 1),
(2486, 1),
(2487, 1),
(2488, 1),
(2489, 1),
(2490, 1),
(2491, 1),
(2492, 1),
(2493, 1),
(2494, 1),
(2495, 1),
(2496, 1),
(2497, 1),
(2498, 1),
(2499, 1),
(2500, 1),
(2501, 1),
(2502, 1),
(2503, 1),
(2504, 1),
(2505, 1),
(2506, 1),
(2507, 1),
(2508, 1),
(2509, 1),
(2510, 1),
(2511, 1),
(2512, 1),
(2513, 1),
(2514, 1),
(2515, 1),
(2516, 1),
(2517, 1),
(2518, 1),
(2519, 1),
(2520, 1),
(2521, 1),
(2522, 1),
(2523, 1),
(2524, 1),
(2525, 1),
(2526, 1),
(2527, 1),
(2528, 1),
(2529, 1),
(2530, 1),
(2531, 1),
(2532, 1),
(2533, 1),
(2534, 1),
(2535, 1),
(2536, 1),
(2537, 1),
(2538, 1),
(2539, 1),
(2540, 1),
(2541, 1),
(2542, 1),
(2543, 1),
(2544, 1),
(2545, 1),
(2546, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` char(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` char(150) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` enum('text','longtext','file') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'text',
  `value` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` enum('fixed','dynamic') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'dynamic',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `code`, `title`, `description`, `type`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'global.web_title', 'Global Web Title', 'Setting nama website global (frontend dan backend)', 'text', 'Taekwondo Bumi Orange', 'fixed', NULL, NULL),
(2, 'global.web_logo', 'Global Web Logo', 'Settingan Global Logo website (frontend dan backend)', 'file', 'uploads/setting/value/QNRX4pjfPtLTC3IaTwG17LKoSYNIDBhPDdyYhdbt.jpg', 'fixed', NULL, NULL),
(4, 'front.home_slug', 'Frontend Home Page slug url', 'Settingan Frontend Home Page website ', 'text', 'beranda', 'fixed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `judul`, `keterangan`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Selamat Datang', '<h3>Sistem Informasi PSU Kalimantan Selatan</h3> <h3>Peta <a href=\"perumahan\" tabindex=\"0\">Sebaran Perumahan</a> </h3>', 'uploads/slider/image/3qfBjEZTRuzHM9c45VCXA51OlwKQ9OdaRvgGqGpl.jpg', 'active', NULL, '2024-11-28 05:26:52'),
(2, 'Nikmati kemudahan presentasikan', '<h3><a href=\"https://animashit.com/sipsu/public/page/statistik-perumahan\" tabindex=\"0\">Statistik</a> data perumahan</h3>', 'uploads/slider/image/7SD2INAlYQSOZrje3nAK6ELd4UjSJBDdJgjptB1d.png', 'active', NULL, '2024-11-28 05:26:43'),
(3, 'Monitoring data tak terbatas', '<h3>Buka rekap data <a href=\"https://animashit.com/sipsu/public/perumahan\" tabindex=\"0\">dimana pun</a></h3>', 'uploads/slider/image/GqEXIoOkSYd0cY8E74xzf0IiPdutUlFpcmYlRVAk.jpg', 'active', NULL, '2024-11-28 05:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `ujiankts`
--

CREATE TABLE `ujiankts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `reg_open` date DEFAULT NULL,
  `reg_close` date DEFAULT NULL,
  `description` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `organizer` char(250) COLLATE utf8mb3_unicode_ci NOT NULL,
  `place` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `event_start` date NOT NULL,
  `event_end` date NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `meta_title` char(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_keywords` char(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` char(20) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'not active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin istrator', 'nietaldarkopik@gmail.com', NULL, '$2y$12$OMYR4dMVTjuXLVT.nM0Y8.kLNlb0DXPljsyKq/Ll6F1w4AEXuOPF.', NULL, '2024-11-24 06:41:56', '2024-11-24 06:41:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `championships`
--
ALTER TABLE `championships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_id_content_type_foreign` (`id_content_type`);

--
-- Indexes for table `content_types`
--
ALTER TABLE `content_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `content_types_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `geups`
--
ALTER TABLE `geups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_types`
--
ALTER TABLE `member_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_code_unique` (`code`),
  ADD KEY `menus_menu_group_id_foreign` (`menu_group_id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `menu_groups`
--
ALTER TABLE `menu_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_groups_code_unique` (`code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`) USING HASH;

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`) USING HASH;

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_code` (`code`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_judul_unique` (`judul`);

--
-- Indexes for table `ujiankts`
--
ALTER TABLE `ujiankts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `championships`
--
ALTER TABLE `championships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_types`
--
ALTER TABLE `content_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geups`
--
ALTER TABLE `geups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `member_types`
--
ALTER TABLE `member_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `menu_groups`
--
ALTER TABLE `menu_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2547;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ujiankts`
--
ALTER TABLE `ujiankts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
