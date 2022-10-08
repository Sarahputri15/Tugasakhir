-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2022 pada 06.21
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpbj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'Koordinasi Rukun Perencanaan', NULL, NULL),
(2, 'Pejabat Pembuat Komitmen', NULL, NULL),
(3, 'Koordinasi Rukun Keuangan', NULL, NULL),
(4, 'Pejabat Pengadaan', NULL, NULL),
(5, 'Master admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumens`
--

CREATE TABLE `dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumens`
--

INSERT INTO `dokumens` (`id`, `dokumen`, `created_at`, `updated_at`) VALUES
(1, 'DIPA', NULL, NULL),
(2, 'RKKS', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_20_213933_create_perencanaans_table', 1),
(6, '2022_05_20_214049_create_dokumens_table', 1),
(7, '2022_05_20_214302_create_pengadaans_table', 1),
(8, '2022_05_20_214455_create_admins_table', 1),
(9, '2022_06_26_120244_create_pbj_table', 1),
(10, '2022_08_05_135820_create_notifs_table', 1),
(11, '2022_08_18_163944_create_tahuns_table', 1),
(12, '2022_08_31_143433_create_pesanans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifs`
--

CREATE TABLE `notifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `IdUser` bigint(20) NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifs`
--

INSERT INTO `notifs` (`id`, `IdUser`, `deskripsi`, `created_at`, `updated_at`) VALUES
(68, 1, 'Menambahkan data DIPA', '2022-09-30 01:58:52', '2022-09-30 01:58:52'),
(69, 1, 'Menambahkan data DIPA', '2022-09-30 05:29:15', '2022-09-30 05:29:15'),
(70, 1, 'Menambahkan data DIPA', '2022-09-30 05:30:02', '2022-09-30 05:30:02'),
(71, 1, 'Menambahkan data DIPA', '2022-09-30 05:30:32', '2022-09-30 05:30:32'),
(72, 1, 'Mengubah data DIPA', '2022-09-30 05:31:03', '2022-09-30 05:31:03'),
(73, 1, 'Menambahkan data RKKS', '2022-09-30 05:32:17', '2022-09-30 05:32:17'),
(74, 1, 'Menambahkan data RKKS', '2022-09-30 05:32:53', '2022-09-30 05:32:53'),
(75, 1, 'Menambahkan data RKKS', '2022-09-30 05:33:30', '2022-09-30 05:33:30'),
(76, 7, 'Menambahkan data PBJ', '2022-09-30 05:37:34', '2022-09-30 05:37:34'),
(77, 7, 'Menambahkan data PBJ', '2022-09-30 05:38:30', '2022-09-30 05:38:30'),
(78, 7, 'Menambahkan data PBJ', '2022-09-30 05:40:13', '2022-09-30 05:40:13'),
(79, 7, 'Menambahkan data PBJ', '2022-09-30 05:41:39', '2022-09-30 05:41:39'),
(80, 7, 'Menambahkan data persiapan kontrak', '2022-09-30 06:01:31', '2022-09-30 06:01:31'),
(81, 7, 'Menambahkan data persiapan kontrak', '2022-09-30 06:11:05', '2022-09-30 06:11:05'),
(82, 7, 'Menambahkan data persiapan kontrak', '2022-09-30 06:20:28', '2022-09-30 06:20:28'),
(83, 7, 'Menambahkan data persiapan kontrak', '2022-09-30 06:22:28', '2022-09-30 06:22:28'),
(84, 7, 'Menambahkan data persiapan kontrak', '2022-09-30 06:23:54', '2022-09-30 06:23:54'),
(85, 7, 'Menambahkan data persiapan kontrak', '2022-09-30 06:23:58', '2022-09-30 06:23:58'),
(86, 1, 'Mengubah data PBJ', '2022-09-30 07:45:49', '2022-09-30 07:45:49'),
(87, 7, 'Menambahkan data persiapan kontrak', '2022-10-02 15:10:38', '2022-10-02 15:10:38'),
(88, 7, 'Menambahkan data persiapan kontrak', '2022-10-02 15:13:37', '2022-10-02 15:13:37'),
(89, 7, 'Mengubah data persiapan kontrak', '2022-10-02 15:20:04', '2022-10-02 15:20:04'),
(90, 4, 'Menambah data surat pesanan', '2022-10-04 03:18:16', '2022-10-04 03:18:16'),
(91, 4, 'Mengubah data surat pesanan', '2022-10-04 03:18:52', '2022-10-04 03:18:52'),
(92, 4, 'Menambah data surat pesanan', '2022-10-04 03:31:32', '2022-10-04 03:31:32'),
(93, 4, 'Mengubah data surat pesanan', '2022-10-04 03:32:28', '2022-10-04 03:32:28'),
(94, 4, 'Menambah data surat pesanan', '2022-10-04 03:35:07', '2022-10-04 03:35:07'),
(95, 4, 'Menambah data surat pesanan', '2022-10-04 03:37:03', '2022-10-04 03:37:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbj`
--

CREATE TABLE `pbj` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagu` int(11) NOT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pbj`
--

INSERT INTO `pbj` (`id`, `tahun_id`, `paket`, `rup`, `mak`, `pagu`, `metode`, `rab`, `hps`, `kak`, `created_at`, `updated_at`) VALUES
(1, 5, 'Jasa konsultan', NULL, '678lkjh', 234456, '....', '', '', '', '2022-08-31 14:18:55', '2022-08-31 14:21:35'),
(3, 3, 'Judul 2', NULL, '678lkjh', 890123456, '-------', 'RAB1663168826.pdf', 'HPS1663168826.pdf', 'KAK1663168826.pdf', '2022-09-14 15:20:25', '2022-09-14 15:50:29'),
(4, 3, 'Judul 1', NULL, '12345qwer', 901234, 'Metode 1', 'RAB1664516254.pdf', 'HPS1664516254.pdf', '', '2022-09-30 05:37:34', '2022-09-30 05:37:34'),
(5, 3, 'Judul 3', NULL, '3456asdfg', 345678, 'Metode 3', '', '', 'KAK1664516310.pdf', '2022-09-30 05:38:29', '2022-09-30 05:38:29'),
(6, 3, 'Judul 4', NULL, '67890uiop', 4567890, 'Metode 4', '', '', '', '2022-09-30 05:40:13', '2022-09-30 05:40:13'),
(7, 3, 'Judul 5', '3456fghj', '89123jklm', 67890123, 'Metode 5', 'RAB1664516498.pdf', 'HPS1664516498.pdf', 'KAK1664516499.pdf', '2022-09-30 05:41:39', '2022-09-30 07:45:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaans`
--

CREATE TABLE `pengadaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_kontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal` date NOT NULL,
  `akhir` date NOT NULL,
  `penyedia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_kontrak` bigint(255) NOT NULL,
  `akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Belum terdaftar',
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_NPWP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `realisasi_pekerjaan` int(255) DEFAULT NULL,
  `realisasi_pembayaran` int(255) DEFAULT NULL,
  `sp2d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_sp2d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_perpajakan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Dokumen_Judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Resume_kontrak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Adendum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NPWP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Dokumen_Rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Berita_Acara_Pemeriksaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Berita_Acara_Administrasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Berita_Acara_Pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dok_pemeliharaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jaminan_pelaksanaan_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jaminan_uang_muka` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dok_akhir_tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengadaans`
--

INSERT INTO `pengadaans` (`id`, `tahun_id`, `nomor_kontrak`, `judul`, `awal`, `akhir`, `penyedia`, `nilai_kontrak`, `akun`, `status`, `alamat`, `bank`, `no_NPWP`, `no_rekening`, `realisasi_pekerjaan`, `realisasi_pembayaran`, `sp2d`, `nilai_sp2d`, `dokumen_perpajakan`, `Dokumen_Judul`, `Resume_kontrak`, `Adendum`, `NPWP`, `Dokumen_Rekening`, `Berita_Acara_Pemeriksaan`, `Berita_Acara_Administrasi`, `Berita_Acara_Pembayaran`, `dok_pemeliharaan`, `jaminan_pelaksanaan_pekerjaan`, `jaminan_uang_muka`, `dok_akhir_tahun`, `created_at`, `updated_at`) VALUES
(10, 3, 'nomor kontrak 1', 'Judul 1', '2022-09-30', '2022-10-01', 'Penyedia 1', 234008794, 'lakl1wne3', 'Belum terdaftar', 'dfghjklmnbvcx', 'BNI', '234567890', '1234556677', 40, NULL, NULL, NULL, NULL, 'Dokumen Judul 1664517691.pdf', NULL, 'Adendum 1664517691.pdf', 'NPWP1664517691.pdf', 'rekening1664517691.pdf', '', '', '', '', '', '', '', '2022-09-30 06:01:31', '2022-09-30 06:01:31'),
(11, 3, 'nomor kontrak 2', 'Judul 2', '2022-09-30', '2022-10-02', 'Penyedia 2', 1000000000, 'lakl1wne3', 'Belum terdaftar', 'snkaljkdjalwodioaskda', 'Mandiri', 'dsa646a8fjs345', 'fgshh1234', 50, NULL, NULL, NULL, NULL, 'Dokumen Judul 1664518265.pdf', NULL, 'Adendum 1664518265.pdf', 'NPWP1664518265.pdf', 'rekening1664518265.pdf', '', '', '', '', '', '', '', '2022-09-30 06:11:05', '2022-09-30 06:11:05'),
(12, 3, 'nomor kontrak 3', 'Judul 3', '2022-09-30', '2022-10-04', 'Penyedia 3', 3400595858, 'lakl1wne3', 'Belum terdaftar', 'snkaljkdjalwodioaskda', 'BNI', '234567', '345678', 67, NULL, NULL, NULL, NULL, 'Dokumen Judul 1664518828.pdf', NULL, 'Adendum 1664518828.pdf', 'NPWP1664518828.pdf', 'rekening1664518828.pdf', '', '', '', '', '', '', '', '2022-09-30 06:20:28', '2022-09-30 06:20:28'),
(13, 3, 'nomor kontrak 4', 'Judul 4', '2022-09-30', '2022-10-04', 'Penyedia 4', 3400595858, 'lakl1wne3', 'Belum terdaftar', 'snkaljkdjalwodioaskda', 'BNI', '7890qsc', '890123', 87, NULL, NULL, NULL, NULL, 'Dokumen Judul 1664518949.pdf', NULL, 'Adendum 1664518949.pdf', 'NPWP1664518949.pdf', 'rekening1664518949.pdf', '', '', '', '', '', '', '', '2022-09-30 06:22:28', '2022-09-30 06:22:28'),
(14, 3, 'nomor kontrak 5', 'Judul 5', '2022-10-06', '2022-10-08', 'Penyedia 5', 234008794, 'lakl1wne3', 'Belum terdaftar', 'snkaljkdjalwodioaskda', 'BNI', NULL, NULL, 68, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', '2022-09-30 06:23:54', '2022-09-30 06:23:54'),
(16, 3, 'nomor kontrak 6', 'Judul 6', '2022-10-03', '2022-10-05', 'Penyedia 6', 1000000000, 'lakl1wne3', 'Belum terdaftar', 'snkaljkdjalwodioaskda', 'BNI', NULL, NULL, 68, NULL, NULL, NULL, NULL, '', 'Resume_Kontrak 1664724005.pdf', '', '', '', '', '', '', '', '', '', '', '2022-10-02 15:10:38', '2022-10-02 15:20:04'),
(17, 3, 'nomor kontrak 7', 'Kontrak 7', '2022-10-03', '2022-10-06', 'Penyedia 7', 234008794, 'lakl1wne3', 'Belum terdaftar', 'snkaljkdjalwodioaskda', 'BNI', NULL, NULL, 67, NULL, NULL, NULL, NULL, '', 'Resume_Kontrak1664723617.pdf', '', '', '', '', '', '', '', '', '', '', '2022-10-02 15:13:37', '2022-10-02 15:13:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perencanaans`
--

CREATE TABLE `perencanaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `Dokumen_id` bigint(20) UNSIGNED NOT NULL,
  `edisi` int(11) NOT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `tanggal_pengesahan` date NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perencanaans`
--

INSERT INTO `perencanaans` (`id`, `tahun_id`, `Dokumen_id`, `edisi`, `tanggal_upload`, `tanggal_pengesahan`, `dokumen`, `created_at`, `updated_at`) VALUES
(23, 3, 1, 1, NULL, '2022-10-01', '1664515755.pdf', '2022-09-30 05:29:15', '2022-09-30 05:29:15'),
(24, 3, 1, 2, NULL, '2022-10-03', '1664515802.pdf', '2022-09-30 05:30:02', '2022-09-30 05:30:02'),
(25, 3, 1, 4, NULL, '2022-10-03', '1664515832.pdf', '2022-09-30 05:30:32', '2022-09-30 05:31:03'),
(26, 3, 2, 1, NULL, '2022-09-30', '1664515937.pdf', '2022-09-30 05:32:17', '2022-09-30 05:32:17'),
(27, 3, 2, 2, NULL, '2022-09-30', '1664515972.pdf', '2022-09-30 05:32:51', '2022-09-30 05:32:51'),
(28, 3, 2, 3, NULL, '2022-09-30', '1664516010.pdf', '2022-09-30 05:33:30', '2022-09-30 05:33:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Belum disetujui',
  `catatan` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dok_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dok_penawaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `tahun_id`, `judul`, `status`, `catatan`, `dok_pesanan`, `dok_penawaran`, `created_at`, `updated_at`) VALUES
(32, 3, 'Pengadaan Mesin molen 2', 'Belum disetujui', NULL, 'Surat Pesanan1664854292.pdf', 'Dokumen Penawaran1664854292.pdf', '2022-10-04 03:31:31', '2022-10-04 03:32:28'),
(33, 3, 'Pengadaan AC ruang upt', 'Belum disetujui', NULL, 'Surat Pesanan1664854506.pdf', '', '2022-10-04 03:35:06', '2022-10-04 03:35:06'),
(34, 3, 'pengadaan komputer lab', 'Belum disetujui', NULL, 'Surat Pesanan1664854623.pdf', 'Dokumen Penawaran1664854623.pdf', '2022-10-04 03:37:03', '2022-10-04 03:37:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahuns`
--

CREATE TABLE `tahuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `years` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahuns`
--

INSERT INTO `tahuns` (`id`, `years`, `created_at`, `updated_at`) VALUES
(1, 2015, NULL, NULL),
(2, 2016, NULL, NULL),
(3, 2017, NULL, NULL),
(4, 2018, NULL, NULL),
(5, 2019, NULL, NULL),
(6, 2020, NULL, NULL),
(7, 2021, NULL, NULL),
(8, 2022, NULL, NULL),
(9, 2023, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Admin_id` bigint(20) UNSIGNED NOT NULL,
  `login_as` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `Admin_id`, `login_as`, `name`, `nip`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '3', 'perencanaan', 1234567890, 'nikitasarah99@yahoo.com', NULL, '$2y$10$vkKWKscTklofw2W5EYpC8.moxiasguAivhqAO4Kaq75uUXoEQblhu', NULL, '2022-08-31 10:53:26', '2022-09-30 07:43:38'),
(3, 3, '3', 'fulan bin fulan', 1234567890, 'nikitasarahputri15@gmail.com', NULL, '$2y$10$F7mf4RZ8QAceC6/pXkMVHe0jUSXC4qxfOXw6T.54Fg/PeaOizAYSu', NULL, '2022-08-31 10:55:04', '2022-09-30 07:20:39'),
(4, 4, '3', 'fulan bin fulan', 1234567890, 'respati31@gmail.com', NULL, '$2y$10$Ayqj9sCDW.ZFdMZqYRiEIeFIsG/291XkgI34MUjwJs1k6QIG/gYpC', NULL, '2022-08-31 10:55:27', '2022-10-04 03:28:33'),
(6, 5, '1', 'Master Admin', 1234567890, 'hartati.bella@gmail.com', NULL, '$2y$10$EuulvdX1aDIGm3SBa35Mrek411xbi3p/EQpjV3CMD2x9vNfg9yPxa', NULL, '2022-09-13 04:40:22', '2022-09-30 05:22:32'),
(7, 2, '3', 'Pejabat Pembuat Komitmen', 123456790, 'nikitasarahputri99@gmail.com', NULL, '$2y$10$9VfveonBNyBBbQXui/PJfO8uz/ZpW8og5eyV818t6vjZFRSEXsL4m', NULL, '2022-09-13 12:08:20', '2022-10-04 03:23:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifs`
--
ALTER TABLE `notifs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pbj`
--
ALTER TABLE `pbj`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pbj_paket_unique` (`paket`);

--
-- Indeks untuk tabel `pengadaans`
--
ALTER TABLE `pengadaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perencanaans`
--
ALTER TABLE `perencanaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahuns`
--
ALTER TABLE `tahuns`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `notifs`
--
ALTER TABLE `notifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `pbj`
--
ALTER TABLE `pbj`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengadaans`
--
ALTER TABLE `pengadaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `perencanaans`
--
ALTER TABLE `perencanaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tahuns`
--
ALTER TABLE `tahuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
