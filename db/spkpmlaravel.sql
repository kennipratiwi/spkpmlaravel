-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2025 pada 15.24
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkpmlaravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_name` varchar(255) NOT NULL,
  `criteria_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `criterias`
--

INSERT INTO `criterias` (`id`, `criteria_name`, `criteria_code`, `created_at`, `updated_at`) VALUES
(1, 'Proporsional', 'K1', '2024-08-19 05:50:28', '2025-02-04 01:27:55'),
(2, 'Disiplin', 'K2', '2024-08-19 05:50:28', '2025-02-04 01:28:06'),
(3, 'Pemahaman', 'K3', '2025-02-04 01:27:36', '2025-02-04 01:27:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `factors`
--

CREATE TABLE `factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `core_factor_value` double(8,2) DEFAULT NULL,
  `secondary_factor_value` double(8,2) DEFAULT NULL,
  `total_value` double(8,2) DEFAULT NULL,
  `total_weight` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `factors`
--

INSERT INTO `factors` (`id`, `criteria_id`, `user_id`, `core_factor_value`, `secondary_factor_value`, `total_value`, `total_weight`, `created_at`, `updated_at`) VALUES
(17, 2, 2, 4.00, 5.00, 4.40, 40, '2025-02-04 05:41:08', '2025-02-04 05:41:08'),
(18, 3, 2, 4.00, 5.00, 4.40, 20, '2025-02-04 05:41:08', '2025-02-04 05:41:08'),
(19, 1, 2, 4.00, 4.00, 4.00, 40, '2025-02-04 05:41:08', '2025-02-04 05:41:08'),
(20, 2, 3, 3.00, 3.00, 3.00, 40, '2025-02-04 05:41:29', '2025-02-04 05:41:29'),
(21, 3, 3, 4.00, 5.00, 4.40, 20, '2025-02-04 05:41:29', '2025-02-04 05:41:29'),
(22, 1, 3, 4.00, 3.00, 3.60, 40, '2025-02-04 05:41:29', '2025-02-04 05:41:29'),
(23, 2, 4, 5.00, 5.00, 5.00, 40, '2025-02-04 05:41:46', '2025-02-04 05:41:46'),
(24, 3, 4, 5.00, 5.00, 5.00, 20, '2025-02-04 05:41:46', '2025-02-04 05:41:46'),
(25, 1, 4, 5.00, 5.00, 5.00, 40, '2025-02-04 05:41:47', '2025-02-04 05:41:47'),
(26, 2, 5, 4.00, 4.00, 4.00, 40, '2025-02-04 05:42:05', '2025-02-04 05:42:05'),
(27, 3, 5, 5.00, 5.00, 5.00, 20, '2025-02-04 05:42:05', '2025-02-04 05:42:05'),
(28, 1, 5, 3.00, 3.00, 3.00, 40, '2025-02-04 05:42:05', '2025-02-04 05:42:05'),
(29, 2, 6, 4.00, 5.00, 4.40, 40, '2025-02-04 05:42:23', '2025-02-04 05:42:23'),
(30, 3, 6, 5.00, 4.00, 4.60, 20, '2025-02-04 05:42:23', '2025-02-04 05:42:23'),
(31, 1, 6, 3.00, 5.00, 3.80, 40, '2025-02-04 05:42:23', '2025-02-04 05:42:23'),
(32, 2, 7, 5.00, 5.00, 5.00, 40, '2025-02-04 05:42:40', '2025-02-04 05:42:40'),
(33, 3, 7, 3.50, 5.00, 4.10, 20, '2025-02-04 05:42:40', '2025-02-04 05:42:40'),
(34, 1, 7, 3.00, 5.00, 3.80, 40, '2025-02-04 05:42:40', '2025-02-04 05:42:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_grade_value` double(8,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `grades`
--

INSERT INTO `grades` (`id`, `user_id`, `total_grade_value`, `created_at`, `updated_at`) VALUES
(1, 2, 4.24, '2024-08-19 07:35:59', '2025-02-04 05:41:08'),
(2, 3, 3.52, '2025-02-04 02:00:15', '2025-02-04 05:41:30'),
(3, 4, 5.00, '2025-02-04 02:17:35', '2025-02-04 05:41:47'),
(4, 5, 3.80, '2025-02-04 05:42:05', '2025-02-04 05:42:05'),
(5, 6, 4.20, '2025-02-04 05:42:23', '2025-02-04 05:42:23'),
(6, 7, 4.34, '2025-02-04 05:42:41', '2025-02-04 05:42:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `integrities`
--

CREATE TABLE `integrities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `difference_value` int(11) NOT NULL,
  `integrity` double(8,2) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `integrities`
--

INSERT INTO `integrities` (`id`, `difference_value`, `integrity`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 5.00, 'Tidak ada selisih (Kompetensi sesuai yang dibutuhkan)', '2024-08-19 05:50:28', '2024-08-19 05:50:28'),
(2, 1, 4.50, 'Kompetensi individu kelebihan 1 tingkat/level', '2024-08-19 05:50:28', '2024-08-19 05:50:28'),
(3, -1, 4.00, 'Kompetensi individu kekurangan 1 tingkat/level', '2024-08-19 05:50:28', '2024-08-19 05:50:28'),
(4, 2, 3.50, 'Kompetensi individu kelebihan 2 tingkat/level', '2024-08-19 05:50:28', '2024-08-19 05:50:28'),
(5, -2, 3.00, 'Kompetensi individu kekurangan 2 tingkat/level', '2024-08-19 05:50:28', '2024-08-19 05:50:28'),
(6, 3, 2.50, 'Kompetensi individu kelebihan 3 tingkat/level', '2024-08-19 05:50:28', '2024-08-19 05:50:28'),
(7, -3, 2.00, 'Kompetensi individu kekurangan 3 tingkat/level', '2024-08-19 05:50:28', '2024-08-19 05:50:28'),
(8, 4, 1.50, 'Kompetensi individu kelebihan 4 tingkat/level', '2024-08-19 05:50:28', '2024-08-19 05:50:28'),
(9, -4, 1.00, 'Kompetensi individu kekurangan 4 tingkat/level', '2024-08-19 05:50:28', '2024-08-19 05:50:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_01_135000_create_modules_table', 1),
(5, '2020_05_01_135056_create_permissions_table', 1),
(6, '2020_05_01_135107_create_roles_table', 1),
(7, '2020_05_01_135124_create_permission_role_table', 1),
(8, '2020_05_01_135249_create_settings_table', 1),
(9, '2020_05_02_103131_create_media_table', 1),
(10, '2021_09_27_064658_create_criterias_table', 1),
(11, '2021_10_11_085637_create_sub_criterias_table', 1),
(12, '2021_10_16_055542_create_performance_assessments_table', 1),
(13, '2021_10_18_124415_create_integrities_table', 1),
(14, '2021_10_29_152442_create_factors_table', 1),
(15, '2021_11_03_160417_create_grades_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `modules`
--

INSERT INTO `modules` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', '2024-08-19 05:50:12', '2024-08-19 05:50:12'),
(2, 'Pengaturan', '2024-08-19 05:50:13', '2024-08-19 05:50:13'),
(3, 'Kriteria', '2024-08-19 05:50:13', '2024-08-19 05:50:13'),
(4, 'Sub Kriteria', '2024-08-19 05:50:14', '2024-08-19 05:50:14'),
(5, 'Pembobotan Nilai', '2024-08-19 05:50:15', '2024-08-19 05:50:15'),
(6, 'Penilaian', '2024-08-19 05:50:16', '2024-08-19 05:50:16'),
(7, 'Profil', '2024-08-19 05:50:17', '2024-08-19 05:50:17'),
(8, 'Backup', '2024-08-19 05:50:17', '2024-08-19 05:50:17'),
(9, 'Roles', '2024-08-19 05:50:18', '2024-08-19 05:50:18'),
(10, 'Pegawai', '2024-08-19 05:50:19', '2024-08-19 05:50:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `performance_assessments`
--

CREATE TABLE `performance_assessments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `subcriteria_code` varchar(255) NOT NULL,
  `integrity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcriteria_standard_value` int(11) NOT NULL,
  `attribute_value` int(11) NOT NULL,
  `gap` int(11) NOT NULL,
  `convertion_value` double(8,2) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `performance_assessments`
--

INSERT INTO `performance_assessments` (`id`, `criteria_id`, `subcriteria_code`, `integrity_id`, `subcriteria_standard_value`, `attribute_value`, `gap`, `convertion_value`, `user_id`, `created_at`, `updated_at`) VALUES
(65, 1, 'SK1', 3, 5, 4, -1, 4.00, 2, '2025-02-04 05:41:07', '2025-02-04 05:41:07'),
(66, 1, 'SK2', 3, 5, 4, -1, 4.00, 2, '2025-02-04 05:41:07', '2025-02-04 05:41:08'),
(67, 2, 'SK3', 1, 5, 5, 0, 5.00, 2, '2025-02-04 05:41:08', '2025-02-04 05:41:08'),
(68, 2, 'SK4', 3, 5, 4, -1, 4.00, 2, '2025-02-04 05:41:08', '2025-02-04 05:41:08'),
(69, 3, 'SK5', 3, 5, 4, -1, 4.00, 2, '2025-02-04 05:41:08', '2025-02-04 05:41:08'),
(70, 3, 'SK6', 3, 5, 4, -1, 4.00, 2, '2025-02-04 05:41:08', '2025-02-04 05:41:08'),
(71, 3, 'SK7', 1, 5, 5, 0, 5.00, 2, '2025-02-04 05:41:08', '2025-02-04 05:41:08'),
(72, 1, 'SK1', 5, 5, 3, -2, 3.00, 3, '2025-02-04 05:41:29', '2025-02-04 05:41:29'),
(73, 1, 'SK2', 3, 5, 4, -1, 4.00, 3, '2025-02-04 05:41:29', '2025-02-04 05:41:29'),
(74, 2, 'SK3', 5, 5, 3, -2, 3.00, 3, '2025-02-04 05:41:29', '2025-02-04 05:41:29'),
(75, 2, 'SK4', 5, 5, 3, -2, 3.00, 3, '2025-02-04 05:41:29', '2025-02-04 05:41:29'),
(76, 3, 'SK5', 3, 5, 4, -1, 4.00, 3, '2025-02-04 05:41:29', '2025-02-04 05:41:29'),
(77, 3, 'SK6', 3, 5, 4, -1, 4.00, 3, '2025-02-04 05:41:29', '2025-02-04 05:41:29'),
(78, 3, 'SK7', 1, 5, 5, 0, 5.00, 3, '2025-02-04 05:41:29', '2025-02-04 05:41:29'),
(79, 1, 'SK1', 1, 5, 5, 0, 5.00, 4, '2025-02-04 05:41:46', '2025-02-04 05:41:46'),
(80, 1, 'SK2', 1, 5, 5, 0, 5.00, 4, '2025-02-04 05:41:46', '2025-02-04 05:41:46'),
(81, 2, 'SK3', 1, 5, 5, 0, 5.00, 4, '2025-02-04 05:41:46', '2025-02-04 05:41:46'),
(82, 2, 'SK4', 1, 5, 5, 0, 5.00, 4, '2025-02-04 05:41:46', '2025-02-04 05:41:46'),
(83, 3, 'SK5', 1, 5, 5, 0, 5.00, 4, '2025-02-04 05:41:46', '2025-02-04 05:41:46'),
(84, 3, 'SK6', 1, 5, 5, 0, 5.00, 4, '2025-02-04 05:41:46', '2025-02-04 05:41:46'),
(85, 3, 'SK7', 1, 5, 5, 0, 5.00, 4, '2025-02-04 05:41:46', '2025-02-04 05:41:46'),
(86, 1, 'SK1', 5, 5, 3, -2, 3.00, 5, '2025-02-04 05:42:05', '2025-02-04 05:42:05'),
(87, 1, 'SK2', 5, 5, 3, -2, 3.00, 5, '2025-02-04 05:42:05', '2025-02-04 05:42:05'),
(88, 2, 'SK3', 3, 5, 4, -1, 4.00, 5, '2025-02-04 05:42:05', '2025-02-04 05:42:05'),
(89, 2, 'SK4', 3, 5, 4, -1, 4.00, 5, '2025-02-04 05:42:05', '2025-02-04 05:42:05'),
(90, 3, 'SK5', 1, 5, 5, 0, 5.00, 5, '2025-02-04 05:42:05', '2025-02-04 05:42:05'),
(91, 3, 'SK6', 1, 5, 5, 0, 5.00, 5, '2025-02-04 05:42:05', '2025-02-04 05:42:05'),
(92, 3, 'SK7', 1, 5, 5, 0, 5.00, 5, '2025-02-04 05:42:05', '2025-02-04 05:42:05'),
(93, 1, 'SK1', 1, 5, 5, 0, 5.00, 6, '2025-02-04 05:42:22', '2025-02-04 05:42:22'),
(94, 1, 'SK2', 5, 5, 3, -2, 3.00, 6, '2025-02-04 05:42:22', '2025-02-04 05:42:22'),
(95, 2, 'SK3', 1, 5, 5, 0, 5.00, 6, '2025-02-04 05:42:22', '2025-02-04 05:42:22'),
(96, 2, 'SK4', 3, 5, 4, -1, 4.00, 6, '2025-02-04 05:42:23', '2025-02-04 05:42:23'),
(97, 3, 'SK5', 1, 5, 5, 0, 5.00, 6, '2025-02-04 05:42:23', '2025-02-04 05:42:23'),
(98, 3, 'SK6', 1, 5, 5, 0, 5.00, 6, '2025-02-04 05:42:23', '2025-02-04 05:42:23'),
(99, 3, 'SK7', 3, 5, 4, -1, 4.00, 6, '2025-02-04 05:42:23', '2025-02-04 05:42:23'),
(100, 1, 'SK1', 1, 5, 5, 0, 5.00, 7, '2025-02-04 05:42:40', '2025-02-04 05:42:40'),
(101, 1, 'SK2', 5, 5, 3, -2, 3.00, 7, '2025-02-04 05:42:40', '2025-02-04 05:42:40'),
(102, 2, 'SK3', 1, 5, 5, 0, 5.00, 7, '2025-02-04 05:42:40', '2025-02-04 05:42:40'),
(103, 2, 'SK4', 1, 5, 5, 0, 5.00, 7, '2025-02-04 05:42:40', '2025-02-04 05:42:40'),
(104, 3, 'SK5', 3, 5, 4, -1, 4.00, 7, '2025-02-04 05:42:40', '2025-02-04 05:42:40'),
(105, 3, 'SK6', 5, 5, 3, -2, 3.00, 7, '2025-02-04 05:42:40', '2025-02-04 05:42:40'),
(106, 3, 'SK7', 1, 5, 5, 0, 5.00, 7, '2025-02-04 05:42:40', '2025-02-04 05:42:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lihat', 'dashboard', '2024-08-19 05:50:13', '2024-08-19 05:50:13'),
(2, 2, 'Lihat', 'settings.index', '2024-08-19 05:50:13', '2024-08-19 05:50:13'),
(3, 2, 'Edit', 'settings.update', '2024-08-19 05:50:13', '2024-08-19 05:50:13'),
(4, 3, 'Lihat', 'criteria.index', '2024-08-19 05:50:13', '2024-08-19 05:50:13'),
(5, 3, 'Buat', 'criteria.create', '2024-08-19 05:50:14', '2024-08-19 05:50:14'),
(6, 3, 'Edit', 'criteria.edit', '2024-08-19 05:50:14', '2024-08-19 05:50:14'),
(7, 3, 'Hapus', 'criteria.destroy', '2024-08-19 05:50:14', '2024-08-19 05:50:14'),
(8, 4, 'Lihat', 'sub-criteria.index', '2024-08-19 05:50:14', '2024-08-19 05:50:14'),
(9, 4, 'Tambah', 'sub-criteria.create', '2024-08-19 05:50:15', '2024-08-19 05:50:15'),
(10, 4, 'Edit', 'sub-criteria.edit', '2024-08-19 05:50:15', '2024-08-19 05:50:15'),
(11, 4, 'Hapus', 'sub-criteria.destroy', '2024-08-19 05:50:15', '2024-08-19 05:50:15'),
(12, 5, 'Lihat', 'integrity.index', '2024-08-19 05:50:15', '2024-08-19 05:50:15'),
(13, 5, 'Buat', 'integrity.create', '2024-08-19 05:50:15', '2024-08-19 05:50:15'),
(14, 5, 'Edit', 'integrity.edit', '2024-08-19 05:50:16', '2024-08-19 05:50:16'),
(15, 5, 'Hapus', 'integrity.destroy', '2024-08-19 05:50:16', '2024-08-19 05:50:16'),
(16, 6, 'Lihat', 'evaluation.index', '2024-08-19 05:50:16', '2024-08-19 05:50:16'),
(17, 6, 'Buat', 'evaluation.create', '2024-08-19 05:50:16', '2024-08-19 05:50:16'),
(18, 6, 'Edit', 'evaluation.edit', '2024-08-19 05:50:16', '2024-08-19 05:50:16'),
(19, 6, 'Hapus', 'evaluation.destroy', '2024-08-19 05:50:17', '2024-08-19 05:50:17'),
(20, 7, 'Edit', 'profile.update', '2024-08-19 05:50:17', '2024-08-19 05:50:17'),
(21, 7, 'Ganti password', 'profile.password', '2024-08-19 05:50:17', '2024-08-19 05:50:17'),
(22, 8, 'Lihat', 'backups.index', '2024-08-19 05:50:17', '2024-08-19 05:50:17'),
(23, 8, 'Buat', 'backups.create', '2024-08-19 05:50:17', '2024-08-19 05:50:17'),
(24, 8, 'Unduh', 'backups.download', '2024-08-19 05:50:18', '2024-08-19 05:50:18'),
(25, 8, 'Hapus', 'backups.destroy', '2024-08-19 05:50:18', '2024-08-19 05:50:18'),
(26, 9, 'Lihat', 'roles.index', '2024-08-19 05:50:18', '2024-08-19 05:50:18'),
(27, 9, 'Buat', 'roles.create', '2024-08-19 05:50:18', '2024-08-19 05:50:18'),
(28, 9, 'Edit', 'roles.edit', '2024-08-19 05:50:19', '2024-08-19 05:50:19'),
(29, 9, 'Hapus', 'roles.destroy', '2024-08-19 05:50:19', '2024-08-19 05:50:19'),
(30, 10, 'Lihat', 'users.index', '2024-08-19 05:50:19', '2024-08-19 05:50:19'),
(31, 10, 'Buat', 'users.create', '2024-08-19 05:50:19', '2024-08-19 05:50:19'),
(32, 10, 'Edit', 'users.edit', '2024-08-19 05:50:19', '2024-08-19 05:50:19'),
(33, 10, 'Hapus', 'users.destroy', '2024-08-19 05:50:19', '2024-08-19 05:50:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 8, 1, NULL, NULL),
(9, 9, 1, NULL, NULL),
(10, 10, 1, NULL, NULL),
(11, 11, 1, NULL, NULL),
(12, 12, 1, NULL, NULL),
(13, 13, 1, NULL, NULL),
(14, 14, 1, NULL, NULL),
(15, 15, 1, NULL, NULL),
(16, 16, 1, NULL, NULL),
(17, 17, 1, NULL, NULL),
(18, 18, 1, NULL, NULL),
(19, 19, 1, NULL, NULL),
(20, 20, 1, NULL, NULL),
(21, 21, 1, NULL, NULL),
(22, 22, 1, NULL, NULL),
(23, 23, 1, NULL, NULL),
(24, 24, 1, NULL, NULL),
(25, 25, 1, NULL, NULL),
(26, 26, 1, NULL, NULL),
(27, 27, 1, NULL, NULL),
(28, 28, 1, NULL, NULL),
(29, 29, 1, NULL, NULL),
(30, 30, 1, NULL, NULL),
(31, 31, 1, NULL, NULL),
(32, 32, 1, NULL, NULL),
(33, 33, 1, NULL, NULL),
(34, 1, 2, NULL, NULL),
(35, 16, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `deletable`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'director', NULL, 0, '2024-08-19 05:50:20', '2024-08-19 05:50:20'),
(2, 'Karyawan', 'employee', NULL, 0, '2024-08-19 05:50:26', '2024-08-19 05:50:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'PT PKSS', '2024-08-19 05:50:08', '2024-08-19 05:50:08'),
(2, 'site_description', 'Sistem pendukung keputusan dengan metode profile matching', '2024-08-19 05:50:09', '2024-08-19 05:50:09'),
(3, 'site_address', 'Serang, Indonesia', '2024-08-19 05:50:09', '2024-08-19 05:50:09'),
(4, 'site_logo', NULL, '2024-08-19 05:50:09', '2024-08-19 05:50:09'),
(5, 'site_favicon', NULL, '2024-08-19 05:50:09', '2024-08-19 05:50:09'),
(6, 'mail_mailer', 'smtp', '2024-08-19 05:50:09', '2024-08-19 05:50:09'),
(7, 'mail_host', 'smtp.googlemail.com', '2024-08-19 05:50:09', '2024-08-19 05:50:09'),
(8, 'mail_port', '587', '2024-08-19 05:50:10', '2024-08-19 05:50:10'),
(9, 'mail_username', '', '2024-08-19 05:50:10', '2024-08-19 05:50:10'),
(10, 'mail_password', NULL, '2024-08-19 05:50:10', '2024-08-19 05:50:10'),
(11, 'mail_encryption', 'TLS', '2024-08-19 05:50:11', '2024-08-19 05:50:11'),
(12, 'mail_from_address', 'spkprofilemathcing@gmail.com', '2024-08-19 05:50:11', '2024-08-19 05:50:11'),
(13, 'mail_from_name', 'SPK Profile Matching', '2024-08-19 05:50:11', '2024-08-19 05:50:11'),
(14, 'facebook_client_id', NULL, '2024-08-19 05:50:11', '2024-08-19 05:50:11'),
(15, 'facebook_client_secret', NULL, '2024-08-19 05:50:11', '2024-08-19 05:50:11'),
(16, 'google_client_id', NULL, '2024-08-19 05:50:11', '2024-08-19 05:50:11'),
(17, 'google_client_secret', NULL, '2024-08-19 05:50:12', '2024-08-19 05:50:12'),
(18, 'github_client_id', NULL, '2024-08-19 05:50:12', '2024-08-19 05:50:12'),
(19, 'github_client_secret', NULL, '2024-08-19 05:50:12', '2024-08-19 05:50:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_criterias`
--

CREATE TABLE `sub_criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `subcriteria_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `standard_value` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `factor` enum('core','secondary') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_criterias`
--

INSERT INTO `sub_criterias` (`id`, `criteria_id`, `subcriteria_code`, `name`, `standard_value`, `weight`, `factor`, `created_at`, `updated_at`) VALUES
(1, 1, 'SK1', 'Tinggi Badan', 5, 20, 'secondary', '2024-08-19 05:50:28', '2025-02-04 01:40:14'),
(2, 1, 'SK2', 'Berat Badan', 5, 20, 'core', '2024-08-19 05:50:28', '2025-02-04 01:30:31'),
(3, 2, 'SK3', 'QA', 5, 20, 'secondary', '2024-08-19 05:50:28', '2025-02-04 01:38:54'),
(4, 2, 'SK4', 'SP', 5, 20, 'core', '2024-08-19 05:50:28', '2025-02-04 01:31:59'),
(9, 3, 'SK5', 'Elearning 1', 5, 5, 'core', '2025-02-04 01:33:40', '2025-02-04 05:36:27'),
(10, 3, 'SK6', 'Elearning 2', 5, 10, 'core', '2025-02-04 01:34:08', '2025-02-04 01:39:45'),
(11, 3, 'SK7', 'Elearning 3', 5, 5, 'secondary', '2025-02-04 05:37:50', '2025-02-04 05:37:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `registration_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `username_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `registration_code`, `name`, `address`, `date_of_birth`, `phone`, `gender`, `username`, `username_verified_at`, `password`, `status`, `remember_token`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 1, '485786', 'Kenni Pratiwi', 'Pak Direktur', '2020-08-27', '0936 0557 6210', 'Male', 'admin', '2024-08-19 05:50:27', '$2y$10$HyS2V1jFaiwyVGq8L2Mu5ee9O7KFdpQrgluqs0KhdDMz5f4x6u3TG', 1, NULL, '2025-02-04 05:34:59', '2024-08-19 05:50:27', '2025-02-04 05:35:00'),
(2, 2, '196809222008011009', 'Dono', NULL, NULL, NULL, 'Male', 'dono', '2024-08-19 05:50:27', '$2y$10$xL1dQ4fm9xdaJNQmpT7cuO6ogcb3nXNRJXs.ceRAHMQAJmWpw31Qe', 1, NULL, NULL, '2024-08-19 05:50:27', '2025-02-04 05:38:35'),
(3, 2, '197407302010011004', 'Kasino', NULL, NULL, NULL, 'Male', 'kasino', '2024-08-19 05:50:27', '$2y$10$io2tc8ImI3zqJ89grVg4k.PEXhEr3UZ/qwfSBaGvB3s0dEOt/J1my', 1, NULL, '2024-08-19 08:23:40', '2024-08-19 05:50:27', '2025-02-04 05:38:47'),
(4, 2, '196306271986031012', 'Jeri', NULL, NULL, NULL, 'Male', 'jeri', '2024-08-19 05:50:27', '$2y$10$xL1dQ4fm9xdaJNQmpT7cuO6ogcb3nXNRJXs.ceRAHMQAJmWpw31Qe', 1, NULL, NULL, '2024-08-19 05:50:27', '2025-02-04 05:38:57'),
(5, 2, '196707131988031011', 'Udin', NULL, NULL, NULL, 'Male', 'hari', '2024-08-19 05:50:27', '$2y$10$xL1dQ4fm9xdaJNQmpT7cuO6ogcb3nXNRJXs.ceRAHMQAJmWpw31Qe', 1, NULL, NULL, '2024-08-19 05:50:27', '2025-02-04 05:39:04'),
(6, 2, '196404121989032012', 'Sri Wahyuningsih', NULL, NULL, NULL, 'Female', 'sri', '2024-08-19 05:50:27', '$2y$10$xL1dQ4fm9xdaJNQmpT7cuO6ogcb3nXNRJXs.ceRAHMQAJmWpw31Qe', 1, NULL, NULL, '2024-08-19 05:50:27', '2025-02-04 05:39:26'),
(7, 2, '19710804206041016', 'Supomo', NULL, NULL, NULL, 'Female', 'supomo', '2024-08-19 05:50:27', '$2y$10$xL1dQ4fm9xdaJNQmpT7cuO6ogcb3nXNRJXs.ceRAHMQAJmWpw31Qe', 1, NULL, NULL, '2024-08-19 05:50:27', '2025-02-04 05:39:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `criterias_criteria_name_unique` (`criteria_name`),
  ADD UNIQUE KEY `criterias_criteria_code_unique` (`criteria_code`);

--
-- Indeks untuk tabel `factors`
--
ALTER TABLE `factors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factors_criteria_id_foreign` (`criteria_id`),
  ADD KEY `factors_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `integrities`
--
ALTER TABLE `integrities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_name_unique` (`name`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `performance_assessments`
--
ALTER TABLE `performance_assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `performance_assessments_criteria_id_foreign` (`criteria_id`),
  ADD KEY `performance_assessments_subcriteria_code_foreign` (`subcriteria_code`),
  ADD KEY `performance_assessments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`),
  ADD KEY `permissions_module_id_foreign` (`module_id`);

--
-- Indeks untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_criterias`
--
ALTER TABLE `sub_criterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_criterias_subcriteria_code_unique` (`subcriteria_code`),
  ADD KEY `sub_criterias_criteria_id_foreign` (`criteria_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `factors`
--
ALTER TABLE `factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `integrities`
--
ALTER TABLE `integrities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `performance_assessments`
--
ALTER TABLE `performance_assessments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `sub_criterias`
--
ALTER TABLE `sub_criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `factors`
--
ALTER TABLE `factors`
  ADD CONSTRAINT `factors_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `factors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `performance_assessments`
--
ALTER TABLE `performance_assessments`
  ADD CONSTRAINT `performance_assessments_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `performance_assessments_subcriteria_code_foreign` FOREIGN KEY (`subcriteria_code`) REFERENCES `sub_criterias` (`subcriteria_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `performance_assessments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_criterias`
--
ALTER TABLE `sub_criterias`
  ADD CONSTRAINT `sub_criterias_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
