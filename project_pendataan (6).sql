-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2021 at 05:16 AM
-- Server version: 10.5.8-MariaDB-log
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_pendataan`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pengajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_matapelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_absen` time NOT NULL,
  `tanggal_absen` date NOT NULL,
  `status_absen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengajar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `siswa_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `nama_lengkap`, `nip_nisn`, `jenis_kelamin`, `alamat`, `telepon`, `foto`, `role_status`, `kelas_id`, `siswa_status`, `created_at`, `updated_at`) VALUES
(2, 'guru_test', '10101010', 'Laki-laki', 'Jln. Test, Kec. Test, Kel. Test No. 99', '0892929291', 'image/image-hmDRkX.png', 'guru', NULL, 'Aktif', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(3, 'kepsek_test', '10101010', 'Laki-laki', 'Jln. Test, Kec. Test, Kel. Test No. 99', '0892929291', 'image/image-hmDRkX.png', 'kepsek', NULL, 'Aktif', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(4, 'La Dadi, S.Pd', '19661231199103 1 094', 'Laki-laki', 'alamat belum di masukkan', 'nomor telepon belum ada.', 'image/image-hmDRkX.png', 'kepsek', NULL, 'Kepala Sekolah / GT', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(5, 'Rukiani Habo, S.Pd ', '19740116201101 2 002', 'Laki-laki', 'alamat belum di masukkan.', 'nomor telepon belum ada.', 'image/image-hmDRkX.png', 'kepsek', NULL, 'Wakil Kepala Sekolah / GT', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(6, 'Hardiani Hamaa, S.Pd', '19830331200904 2 008', 'Perempuan', 'null', 'null', 'image/image-ohOdaV.png', 'guru', NULL, NULL, '2021-02-24 19:21:28', '2021-02-24 19:21:28'),
(7, 'Fatimah Rahma, S.Pd', '19870501 201104 2 001', 'Perempuan', 'null', 'null', 'image/image-sOgMu0.png', 'guru', NULL, NULL, '2021-02-24 19:22:10', '2021-02-24 19:22:10'),
(8, 'Syafiin, S.Pd', '19870126 201903 1 007', 'Laki-laki', 'null', 'null', 'image/image-UjDp5L.png', 'guru', NULL, NULL, '2021-02-24 19:22:54', '2021-02-24 19:22:54'),
(9, 'Yawal Tube, S.Pd', '19930217 201903 1 019', 'Laki-laki', 'null', 'null', 'image/image-XF1yow.png', 'guru', NULL, NULL, '2021-02-24 19:23:47', '2021-02-24 19:23:47'),
(10, 'Indrawati Tjinau, S.Pd', '19940620 201903 2 014', 'null', 'null', 'null', 'image/image-FetrRZ.png', 'guru', NULL, NULL, '2021-02-24 19:25:15', '2021-02-24 19:25:15'),
(11, 'Saliani Djalili, S.Pd', '19940803 201903 2 017', 'Belum di input', 'null', 'null', 'image/image-gFcXxI.png', 'guru', NULL, NULL, '2021-02-24 19:27:01', '2021-02-24 19:27:01'),
(12, 'Andriyani, S.Pd', '19880414 201903 2 007', 'Belum di input', 'null', 'null', 'image/image-0ofgfl.png', 'guru', NULL, NULL, '2021-02-24 19:28:08', '2021-02-24 19:28:08'),
(13, 'La Kalimudin, S.Pd', '19650527201407 1 001', 'Belum di input', 'null', 'null', 'image/image-0tejNz.png', 'guru', NULL, NULL, '2021-02-24 19:28:32', '2021-02-24 19:28:32'),
(14, 'Rumiati, S.Pd', '-', 'Belum di input', 'null', 'null', 'image/image-PXuXAM.png', 'guru', NULL, NULL, '2021-02-24 19:28:56', '2021-02-24 19:28:56'),
(15, 'Nilawati, S.Pd', '-', 'Belum di input', 'null', 'null', 'image/image-cSiXlT.png', 'guru', NULL, NULL, '2021-02-24 19:29:18', '2021-02-24 19:29:18'),
(16, 'Jurwin, S.Pd', '-', 'Belum di input', 'null', 'null', 'image/image-kAlJjd.png', 'guru', NULL, NULL, '2021-02-24 19:29:43', '2021-02-24 19:29:43'),
(17, 'Lisnawati, S.Pd', '-', 'Belum di input', 'null', 'null', 'image/image-ON8s9e.png', 'guru', NULL, NULL, '2021-02-24 19:30:12', '2021-02-24 19:30:12'),
(18, 'ABDUL RAHMAT', '0077768933', 'L', 'DESA WASAMPELA', '081344071142', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:12:34'),
(19, 'Ahmad Fauzan', '0078342758', 'L', 'Wasampela', '085256553113', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:18:26'),
(20, 'AL IKHSAN ABDUL RAHMAN', '0076956762', 'L', 'POROS WASUEMBA', '081355607757', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:13:11'),
(21, 'ARFIANSYAH', '0083625737', 'L', 'DESA WASAMPELA', '082191190803', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:13:23'),
(22, 'Aril', '0067293268', 'L', 'Wasampela', '082353213277', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:18:58'),
(23, 'Aswad', '0056491016', 'L', 'Desa Wasampela', '082353221168', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:24:52'),
(24, 'Avdal', '0078299941', 'L', 'Wasampela', '082350335508', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:13:34'),
(25, 'Citra', '0066864939', 'P', 'Desa Wasampela', 'Tidak ada nomor Telepon', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:25:10'),
(26, 'Dafrin', '0053722584', 'L', 'Desa Wasampela', '082344080481', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:13:47'),
(27, 'Darwin', '0068308637', 'L', 'Wasampela', '082241401863', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:19:11'),
(28, 'Dasman', '0063017881', 'L', 'Desa Wasampela', '081324265124', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:25:53'),
(29, 'Delfi', '0053045883', 'L', 'Desa Wasampela', 'Tidak ada nomor Telepon', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:26:07'),
(30, 'Devin', '0073331986', 'L', 'Wasampela', '085298457047', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:19:17'),
(31, 'DIAN INDRIANI', '0082499829', 'P', 'DESA WASAMPELA', '081240012338', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:14:31'),
(32, 'Edwin', '0051401380', 'L', 'Desa Wasampela', '082296436724', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:26:24'),
(33, 'Fadli', '0067362507', 'L', 'Wasampela', '082237192624', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:19:28'),
(34, 'Faril', '0057710680', 'L', 'Wasampela', '081342319175', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:19:34'),
(35, 'Farlan', '0059535843', 'L', 'Desa Wasampela', ' ', 'image/image-hmDRkX.png', 'siswa', NULL, 'Aktif', '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(36, 'Fikran', '0042653948', 'L', 'Desa Wasampela', ' ', 'image/image-hmDRkX.png', 'siswa', NULL, 'Aktif', '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(37, 'Ikmal Saputra', '0042653947', 'L', 'Desa Wasampela', ' ', 'image/image-hmDRkX.png', 'siswa', NULL, 'Aktif', '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(38, 'Indriyani', '0069285792', 'P', 'Desa Wasampela', '085299615500', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:26:32'),
(39, 'Istiani', '0056693575', 'P', 'Desa Wasampela', '081387847110', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:27:17'),
(40, 'Jamal', '0041389350', 'L', 'Desa Wasampela', 'Tidak ada nomor Telepon', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:27:32'),
(41, 'JUMARDI YANSA', '0089313618', 'L', 'DESA WASAMPELA', '081214811917', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:14:52'),
(42, 'Kasman', '0052013228', 'L', 'Desa Wasampela', '081220472482', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:27:45'),
(43, 'Kasmin', '0048979722', 'P', 'Desa Wasampela', '082353250496', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:28:01'),
(44, 'La Arga', '0079831046', 'L', 'Wasampela', '085258382859', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:15:13'),
(45, 'LaIrman', '0048059550', 'L', 'Desa Wasampela', 'Tidak ada nomor Telepon', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:30:23'),
(46, 'LaRomi', '0041329529', 'L', 'Desa Wasampela', '082233510227', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:28:12'),
(47, 'Leni Elvian', '0069672143', 'P', 'Desa Wasampela', '082291252723', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:19:45'),
(48, 'Marlisa', '0065793022', 'P', 'Wasampela', '082296262350', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:15:36'),
(49, 'Mawar', '0061053156', 'P', 'Desa Wasampela', '082290310921', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:28:20'),
(50, 'Muh. Akbar', '0079704173', 'L', 'Wasampela', '082290308903', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:19:52'),
(51, 'Muhamad Fajar', '0073204003', 'L', 'Wasampela', 'Tidak ada nomor Telepon', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:20:30'),
(52, 'Nesti', '0077642701', 'P', 'Wasampela', '082353250539', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:15:54'),
(53, 'Nova Marisa', '0066891200', 'P', 'Desa Wasampela', '082324989851', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:28:32'),
(54, 'Nurhalima', '0069026698', 'P', 'Wasampela', '081389037066', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:20:46'),
(55, 'Nurmila', '0059763603', 'P', 'Desa Wasampela', '085240981099', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:28:43'),
(56, 'Rahmat', '0043284200', 'L', 'Desa Wasampela', ' ', 'image/image-hmDRkX.png', 'siswa', NULL, 'Aktif', '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(57, 'Ranti', '0047297816', 'P', 'Jalan Poros Pasarwajo-Wabula', '081313040720', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:20:59'),
(58, 'Rasti', '0064746988', 'P', 'Wasampela', '085333705026', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:16:03'),
(59, 'RENDI ARIFIN', '0079393297', 'L', 'WASAMPELA', '082293049392', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:16:16'),
(60, 'Restiyanti', '0053472417', 'P', 'Desa Wasampela', '082190819430', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:28:52'),
(61, 'Revi Mariska', '0069108488', 'P', 'Jalan Poros Pasarwajo-Wabula', '085246444152', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:21:09'),
(62, 'Ridwan', '0036473682', 'L', 'Desa Wasampela', ' ', 'image/image-hmDRkX.png', 'siswa', NULL, 'Aktif', '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(63, 'Rinda', '0049314287', 'P', 'Desa Wasampela', '082344080481', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:29:09'),
(64, 'Rislan', '0052994661', 'L', 'JALAN POROS PASARWAJO-WABULA', '085242446887', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:21:25'),
(65, 'Sadiman', '0054268385', 'L', 'Desa Wasampela', '081347003147', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:29:18'),
(66, 'SALIM SUKMA', '0058077820', 'L', 'LABALA', '081344374513', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:22:50'),
(67, 'Sandra', '0054570781', 'P', 'Desa Wasampela', '082230504204', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:21:32'),
(68, 'Selni Sutriani', '0053339061', 'P', 'Desa Wasampela', '085244478131', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:21:46'),
(69, 'Selvi', '0068774183', 'P', 'Desa Wasampela', '082290444877', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:29:30'),
(70, 'SIGITALFARAD', '0042755136', 'L', 'Jalan Poros Wabula-Burangasi', '082259678631', 'image/image-hmDRkX.png', 'siswa', NULL, 'Aktif', '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(71, 'Sista', '0066501674', 'P', 'Desa Wasampela', '085342824237', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:16:24'),
(72, 'SITI SHALEHA', '0071739569', 'P', 'DESA WASAMPELA', '085340224227', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:16:38'),
(73, 'Sry Alfianti', '0071555196', 'P', 'Wasampela', '082350395857', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:21:58'),
(74, 'Wa Misna', '9993549568', 'P', 'Desa Wasampela', '082296262350', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:29:45'),
(75, 'Wulan Mutmainna', '0063845691', 'P', 'Desa Wasampela', '082353084151', NULL, 'siswa', 11, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:30:04'),
(76, 'Yasrin', '0056565522', 'L', 'Desa Wasampela', 'Tidak ada nomor Telepon', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:22:17'),
(77, 'YUSLIATI', '0076333615', 'P', 'DESA WASAMPELA', '082352403865', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:16:49'),
(78, 'Yuswita', '0064937134', 'P', 'Wasampela', 'Tidak ada nomor Telepon', NULL, 'siswa', 6, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:22:35'),
(79, 'ZIKRAN', '0073735029', 'L', 'DESA WASAMPELA', '082393265923', NULL, 'siswa', 1, 'Aktif', '2021-02-26 23:29:00', '2021-02-27 16:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 'KLS-XK7WM', 'VII', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(6, 'KLS-MYS7T', 'VIII', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(11, 'KLS-H7OVD', 'IX', '2021-02-24 19:18:16', '2021-02-24 19:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `username`, `password`, `level`, `token`, `detail_id`, `created_at`, `updated_at`) VALUES
(1, 'admin@smp39.com', 'admin', '$2y$12$TO.R5ZfU1bsZYCwva7eUnuXFsIeQ4xPq8/BN6MGmReSDGkoYdiC7a', 'admin', 'EHSah1I8GPTAvPbz', NULL, '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(3, 'guru@localhost.com', 'guru', 'guru', 'guru', '1hSG1TUwdJW446yX', 2, '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(4, 'kepsek@localhost.com', 'kepsek', 'kepsek', 'kepsek', 'IsWQBH3viXAxfH1F', 3, '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(5, 'la_dadi@smp39.com', 'la_dadi', 'la_dadi', 'kepsek', 'XOY5rzntww4LaA4x', 4, '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(6, 'rukiano_habo@smp39.com', 'rukiano_habo', 'rukiani_habo', 'kepsek', 'ltT53aSg7z5iw4WW', 5, '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(7, '19830331200904 2 008@aplikasi.com', '19830331200904 2 008', 'TAXLJ', 'guru', 'xHonbmE9i1mHU75z', 6, '2021-02-24 19:21:29', '2021-02-24 19:21:29'),
(8, '19870501 201104 2 001@aplikasi.com', '19870501 201104 2 001', 'JXRYL', 'guru', 'f7W4CLFHEN4n2NpC', 7, '2021-02-24 19:22:10', '2021-02-24 19:22:10'),
(9, '19870126 201903 1 007@aplikasi.com', '19870126 201903 1 007', 'KVCLQ', 'guru', 'hBbrmL2LdYzxUSHU', 8, '2021-02-24 19:22:54', '2021-02-24 19:22:54'),
(10, '19930217 201903 1 019@aplikasi.com', '19930217 201903 1 019', 'SLOMT', 'guru', 'cHyPA0CbKN85fM4D', 9, '2021-02-24 19:23:47', '2021-02-24 19:23:47'),
(11, '19940620 201903 2 014@aplikasi.com', '19940620 201903 2 014', 'AKHL0', 'guru', 'PAMWHWXe86dOCjvi', 10, '2021-02-24 19:25:15', '2021-02-24 19:25:15'),
(12, '19940803 201903 2 017@aplikasi.com', '19940803 201903 2 017', 'UOUEI', 'guru', 'TwqufyDLpf9syd33', 11, '2021-02-24 19:27:01', '2021-02-24 19:27:01'),
(13, '19880414 201903 2 007@aplikasi.com', '19880414 201903 2 007', 'YJODQ', 'guru', 'RzG9bVogOTOHtWhe', 12, '2021-02-24 19:28:08', '2021-02-24 19:28:08'),
(14, '19650527201407 1 001@aplikasi.com', '19650527201407 1 001', 'RHJ8H', 'guru', '8MWZVTyCQgWBHvhw', 13, '2021-02-24 19:28:32', '2021-02-24 19:28:32'),
(15, '-@aplikasi.com', 'IYJE1', 'IYJE1', 'guru', 'JE4c1oaEoDgvxUFA', 14, '2021-02-24 19:28:56', '2021-02-24 19:28:56'),
(16, '-@aplikasi.com', 'R1R33', 'R1R33', 'guru', 'bdURm4dSvi0FtMKB', 15, '2021-02-24 19:29:18', '2021-02-24 19:29:18'),
(17, '-@aplikasi.com', 'ANHZA', 'ANHZA', 'guru', '5fkmS1OOfU8vurtH', 16, '2021-02-24 19:29:43', '2021-02-24 19:29:43'),
(18, '-@aplikasi.com', 'CDKC7', 'CDKC7', 'guru', 'zXhmuI9U04FfUD1R', 17, '2021-02-24 19:30:12', '2021-02-24 19:30:12'),
(19, '0077768933@localhost.com', '0077768933', '0077768933', 'siswa', 'b63zzJcAzuex3NRW', 18, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(20, '0078342758@localhost.com', '0078342758', '0078342758', 'siswa', 'X1gmYkjjNzWcfIqs', 19, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(21, '0076956762@localhost.com', '0076956762', '0076956762', 'siswa', 'k0MQWtHJluaEyC1d', 20, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(22, '0083625737@localhost.com', '0083625737', '0083625737', 'siswa', '69n1OAzlpo9N17M6', 21, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(23, '0067293268@localhost.com', '0067293268', '0067293268', 'siswa', 'K1E5DSTVXrQw3cT2', 22, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(24, '0056491016@localhost.com', '0056491016', '0056491016', 'siswa', '6ahkTBm2BTivtE6l', 23, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(25, '0078299941@localhost.com', '0078299941', '0078299941', 'siswa', 'TmgOqCmUIwYHVfTs', 24, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(26, '0066864939@localhost.com', '0066864939', '0066864939', 'siswa', 'G8fcuyqAOgOJ8Yma', 25, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(27, '0053722584@localhost.com', '0053722584', '0053722584', 'siswa', 'bfFcjLOPXz89BEk5', 26, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(28, '0068308637@localhost.com', '0068308637', '0068308637', 'siswa', 'tpVtgQsM82f5MxDh', 27, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(29, '0063017881@localhost.com', '0063017881', '0063017881', 'siswa', 'Zy4IbifGFdz0GoDo', 28, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(30, '0053045883@localhost.com', '0053045883', '0053045883', 'siswa', '8gRbCQOkxtT03pJa', 29, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(31, '0073331986@localhost.com', '0073331986', '0073331986', 'siswa', '6iyA3IaXUknSTOSj', 30, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(32, '0082499829@localhost.com', '0082499829', '0082499829', 'siswa', 'd7cFg6j5HubrxUAV', 31, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(33, '0051401380@localhost.com', '0051401380', '0051401380', 'siswa', 'vKsPjw25N35p3fTm', 32, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(34, '0067362507@localhost.com', '0067362507', '0067362507', 'siswa', 'E7GcWMW1xqyCwbWF', 33, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(35, '0057710680@localhost.com', '0057710680', '0057710680', 'siswa', 'z3OtJIBwipF440if', 34, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(36, '0059535843@localhost.com', '0059535843', '0059535843', 'siswa', '53iIlDPL2sOtbwlU', 35, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(37, '0042653948@localhost.com', '0042653948', '0042653948', 'siswa', '8t2aEEz3o5H5uRVZ', 36, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(38, '0042653947@localhost.com', '0042653947', '0042653947', 'siswa', 'UwYVFuUVxXN8bfRY', 37, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(39, '0069285792@localhost.com', '0069285792', '0069285792', 'siswa', 'OaG1QEurJPX1RTFn', 38, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(40, '0056693575@localhost.com', '0056693575', '0056693575', 'siswa', 'EKxDpyGPQL4ffvC8', 39, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(41, '0041389350@localhost.com', '0041389350', '0041389350', 'siswa', 'S0RxEn7qq7I8nzDb', 40, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(42, '0089313618@localhost.com', '0089313618', '0089313618', 'siswa', 'GuiCFYa1duNyQtqP', 41, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(43, '0052013228@localhost.com', '0052013228', '0052013228', 'siswa', 'UN6Wui78gZYiS7K6', 42, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(44, '0048979722@localhost.com', '0048979722', '0048979722', 'siswa', 'CAgTjiAfKBVVjWYi', 43, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(45, '0079831046@localhost.com', '0079831046', '0079831046', 'siswa', 'Wdu548IktkbnpWll', 44, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(46, '0048059550@localhost.com', '0048059550', '0048059550', 'siswa', '6vuArSOPyetRYCiA', 45, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(47, '0041329529@localhost.com', '0041329529', '0041329529', 'siswa', 'FM7YdV6D0x7m19HN', 46, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(48, '0069672143@localhost.com', '0069672143', '0069672143', 'siswa', 'zqYd1uh2bZbYucfP', 47, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(49, '0065793022@localhost.com', '0065793022', '0065793022', 'siswa', 'E6NwU6kagSYnQ3Da', 48, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(50, '0061053156@localhost.com', '0061053156', '0061053156', 'siswa', 'psqH7iDNgA4gBA2u', 49, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(51, '0079704173@localhost.com', '0079704173', '0079704173', 'siswa', 'tjJ3s9m4DdwmvJ0n', 50, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(52, '0073204003@localhost.com', '0073204003', '0073204003', 'siswa', 'ogmEs1if5bSuXtBM', 51, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(53, '0077642701@localhost.com', '0077642701', '0077642701', 'siswa', 'MvAE7Xbl9I6lXI48', 52, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(54, '0066891200@localhost.com', '0066891200', '0066891200', 'siswa', 'Q00sgNMZJMWxSGh6', 53, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(55, '0069026698@localhost.com', '0069026698', '0069026698', 'siswa', 'duIId7DWiyMLdKwB', 54, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(56, '0059763603@localhost.com', '0059763603', '0059763603', 'siswa', 'gdQbxTQ3doar8d9Q', 55, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(57, '0043284200@localhost.com', '0043284200', '0043284200', 'siswa', 'InShlh6dgQkG4fPE', 56, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(58, '0047297816@localhost.com', '0047297816', '0047297816', 'siswa', 'sNg5lJaraht6AGAF', 57, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(59, '0064746988@localhost.com', '0064746988', '0064746988', 'siswa', 'dyBznAMaKxr9K4M1', 58, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(60, '0079393297@localhost.com', '0079393297', '0079393297', 'siswa', 'NpFhzplA8x78KnJ3', 59, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(61, '0053472417@localhost.com', '0053472417', '0053472417', 'siswa', 'MiW0nq4NnWrMNisb', 60, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(62, '0069108488@localhost.com', '0069108488', '0069108488', 'siswa', 'HuHSTBA4tLRV460R', 61, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(63, '0036473682@localhost.com', '0036473682', '0036473682', 'siswa', 'AiI4chBhkBNHTg2R', 62, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(64, '0049314287@localhost.com', '0049314287', '0049314287', 'siswa', 'LVJNKRamxTwHdES2', 63, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(65, '0052994661@localhost.com', '0052994661', '0052994661', 'siswa', '42Aw7G8eqvWAGX7y', 64, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(66, '0054268385@localhost.com', '0054268385', '0054268385', 'siswa', 'PffyRdIsWchZfCAm', 65, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(67, '0058077820@localhost.com', '0058077820', '0058077820', 'siswa', 'JIyU2bTbXBrpgUWo', 66, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(68, '0054570781@localhost.com', '0054570781', '0054570781', 'siswa', 'vbeMayqB0U7vrJc0', 67, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(69, '0053339061@localhost.com', '0053339061', '0053339061', 'siswa', 'aLPq0R0D4csoScML', 68, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(70, '0068774183@localhost.com', '0068774183', '0068774183', 'siswa', '4NRRA7kF4ejHCIi1', 69, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(71, '0042755136@localhost.com', '0042755136', '0042755136', 'siswa', 'ztZqucENMjGFFuEV', 70, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(72, '0066501674@localhost.com', '0066501674', '0066501674', 'siswa', 'ESeH5NBOEe0F27m3', 71, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(73, '0071739569@localhost.com', '0071739569', '0071739569', 'siswa', 'D6OJW1RWfq6TNBpr', 72, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(74, '0071555196@localhost.com', '0071555196', '0071555196', 'siswa', '7VHwJ9CUZfy5O1IE', 73, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(75, '9993549568@localhost.com', '9993549568', '9993549568', 'siswa', 'cEXiv006hwXza7WB', 74, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(76, '0063845691@localhost.com', '0063845691', '0063845691', 'siswa', 'bnDvLmWiL4BZf9cl', 75, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(77, '0056565522@localhost.com', '0056565522', '0056565522', 'siswa', 'ZJO2fDuI8PACAhxB', 76, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(78, '0076333615@localhost.com', '0076333615', '0076333615', 'siswa', '9ZXwweZI3UyBBdtz', 77, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(79, '0064937134@localhost.com', '0064937134', '0064937134', 'siswa', 'VqI9gs0IfAXbmUvx', 78, '2021-02-26 23:29:00', '2021-02-26 23:29:00'),
(80, '0073735029@localhost.com', '0073735029', '0073735029', 'siswa', '277k1A3AbIlfqNKr', 79, '2021-02-26 23:29:00', '2021-02-26 23:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_matapelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_matapelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `nama_matapelajaran`, `kode_matapelajaran`, `created_at`, `updated_at`) VALUES
(1, 'MATEMATIKA', 'MAPEL-5CZAP', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(2, 'BAHASA INDONESIA', 'MAPEL-1JHQU', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(3, 'BAHASA INGGRIS', 'MAPEL-CKUUB', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(4, 'SBK', 'MAPEL-ORKOY', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(5, 'IPS', 'MAPEL-DJCI7', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(6, 'IPA', 'MAPEL-81EPI', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(7, 'PRAKARYA', 'MAPEL-VFRLP', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(8, 'PENDIDIKAN AGAMA ISLAM', 'MAPEL-EVXD8', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(9, 'PENDIDIKAN KEWARGANEGARAAN', 'MAPEL-FAPE9', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(10, 'BK', 'MAPEL-E6HNQ', '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(11, 'PENJASKES', 'MAPEL-FIAFZ', '2021-02-24 19:18:16', '2021-02-24 19:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_14_054401_create_kelas_table', 1),
(5, '2021_02_14_054406_create_details_table', 1),
(6, '2021_02_14_054410_create_logins_table', 1),
(7, '2021_02_14_054939_create_matapelajarans_table', 1),
(8, '2021_02_14_055050_create_semesters_table', 1),
(9, '2021_02_14_055312_create_pengajars_table', 1),
(10, '2021_02_14_055622_create_absensis_table', 1),
(11, '2021_02_14_055820_create_nilais_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pengajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_matapelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_siswa_tugas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_siswa_absensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_siswa_uts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_siswa_uas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_ratarata` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_nilai` time NOT NULL,
  `tanggal_nilai` date NOT NULL,
  `status_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matapelajaran_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pengajar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `kode_pengajar`, `kode_kelas`, `kode_matapelajaran`, `kode_semester`, `nilai_siswa_tugas`, `nilai_siswa_absensi`, `nilai_siswa_uts`, `nilai_siswa_uas`, `nilai_ratarata`, `waktu_nilai`, `tanggal_nilai`, `status_nilai`, `matapelajaran_id`, `pengajar_id`, `detail_id`, `created_at`, `updated_at`) VALUES
(1, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 23, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(2, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 25, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(3, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 28, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(4, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 29, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(5, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 32, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(6, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 38, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(7, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 39, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(8, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 40, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(9, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 42, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(10, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 43, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(11, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 45, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(12, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 46, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(13, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 49, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(14, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 53, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(15, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 55, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(16, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 60, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(17, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 63, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(18, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 65, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(19, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 69, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(20, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 74, '2021-03-06 12:02:44', '2021-03-06 12:02:44'),
(21, 'PENGAJAR-NWWDS', 'KLS-H7OVD', 'MAPEL-VFRLP', 'SEMESTER-UUNAX', '100', '100', '100', '100', '400', '04:02:44', '2021-03-06', 'Aman', 7, 6, 75, '2021-03-06 12:02:44', '2021-03-06 12:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pengajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_matapelajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `matapelajaran_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id`, `kode_pengajar`, `kode_semester`, `kode_kelas`, `kode_matapelajaran`, `nip_guru`, `semester_id`, `kelas_id`, `matapelajaran_id`, `detail_id`, `created_at`, `updated_at`) VALUES
(1, 'PENGAJAR-N3O9Z', 'SEMESTER-UUNAX', 'KLS-XK7WM', 'MAPEL-5CZAP', '19740116201101 2 002', 1, 1, 1, 5, '2021-02-24 19:42:32', '2021-02-24 19:42:32'),
(2, 'PENGAJAR-EPPD9', 'SEMESTER-UUNAX', 'KLS-MYS7T', 'MAPEL-81EPI', '19870501 201104 2 001', 1, 6, 6, 7, '2021-02-24 19:42:57', '2021-02-24 19:42:57'),
(3, 'PENGAJAR-XWFMZ', 'SEMESTER-UUNAX', 'KLS-H7OVD', 'MAPEL-1JHQU', '19940620 201903 2 014', 1, 11, 2, 10, '2021-02-24 19:43:24', '2021-02-24 19:43:24'),
(4, 'PENGAJAR-IVFTT', 'SEMESTER-UUNAX', 'KLS-XK7WM', 'MAPEL-1JHQU', '-', 1, 1, 2, 14, '2021-02-24 19:43:57', '2021-02-24 19:43:57'),
(5, 'PENGAJAR-I1SJ3', 'SEMESTER-UUNAX', 'KLS-MYS7T', 'MAPEL-CKUUB', '19830331200904 2 008', 1, 6, 3, 6, '2021-02-24 19:44:32', '2021-02-24 19:44:32'),
(6, 'PENGAJAR-NWWDS', 'SEMESTER-UUNAX', 'KLS-H7OVD', 'MAPEL-VFRLP', '-', 1, 11, 7, 17, '2021-02-24 19:44:59', '2021-02-24 19:44:59'),
(7, 'PENGAJAR-DJFDX', 'SEMESTER-UUNAX', 'KLS-XK7WM', 'MAPEL-ORKOY', '19650527201407 1 001', 1, 1, 4, 13, '2021-02-24 19:45:44', '2021-02-24 19:45:44'),
(8, 'PENGAJAR-49GVR', 'SEMESTER-UUNAX', 'KLS-MYS7T', 'MAPEL-E6HNQ', '19880414 201903 2 007', 1, 6, 10, 12, '2021-02-24 19:46:09', '2021-02-24 19:46:09'),
(9, 'PENGAJAR-UDWIV', 'SEMESTER-UUNAX', 'KLS-H7OVD', 'MAPEL-81EPI', '19930217 201903 1 019', 1, 11, 6, 9, '2021-02-24 19:46:31', '2021-02-24 19:46:31'),
(10, 'PENGAJAR-9US5D', 'SEMESTER-UUNAX', 'KLS-XK7WM', 'MAPEL-DJCI7', '-', 1, 1, 5, 17, '2021-02-24 19:47:01', '2021-02-24 19:47:01'),
(11, 'PENGAJAR-PULIY', 'SEMESTER-UUNAX', 'KLS-MYS7T', 'MAPEL-1JHQU', '19940620 201903 2 014', 1, 6, 2, 10, '2021-02-24 19:47:22', '2021-02-24 19:47:22'),
(12, 'PENGAJAR-4UGHG', 'SEMESTER-UUNAX', 'KLS-H7OVD', 'MAPEL-EVXD8', '19940803 201903 2 017', 1, 11, 8, 11, '2021-02-24 19:47:51', '2021-02-24 19:47:51'),
(13, 'PENGAJAR-NTIZ8', 'SEMESTER-UUNAX', 'KLS-XK7WM', 'MAPEL-FAPE9', '-', 1, 1, 9, 15, '2021-02-24 19:48:37', '2021-02-24 19:48:37'),
(15, 'PENGAJAR-LKHYK', 'SEMESTER-UUNAX', 'KLS-XK7WM', 'MAPEL-CKUUB', '19830331200904 2 008', 1, 1, 3, 6, '2021-02-24 19:51:25', '2021-02-24 19:51:25'),
(16, 'PENGAJAR-0JF3K', 'SEMESTER-UUNAX', 'KLS-MYS7T', 'MAPEL-EVXD8', '19650527201407 1 001', 1, 6, 8, 13, '2021-02-24 19:52:14', '2021-02-24 19:52:14'),
(17, 'PENGAJAR-KQYEI', 'SEMESTER-UUNAX', 'KLS-H7OVD', 'MAPEL-E6HNQ', '19880414 201903 2 007', 1, 11, 10, 12, '2021-02-24 19:54:10', '2021-02-24 19:54:10'),
(18, 'PENGAJAR-T4FAJ', 'SEMESTER-UUNAX', 'KLS-XK7WM', 'MAPEL-81EPI', '19870501 201104 2 001', 1, 1, 6, 7, '2021-02-24 19:54:30', '2021-02-24 19:54:30'),
(19, 'PENGAJAR-QAEWZ', 'SEMESTER-UUNAX', 'KLS-MYS7T', 'MAPEL-FIAFZ', '19930217 201903 1 019', 1, 6, 11, 9, '2021-02-24 19:55:15', '2021-02-24 19:55:15'),
(20, 'PENGAJAR-6HRR8', 'SEMESTER-UUNAX', 'KLS-H7OVD', 'MAPEL-5CZAP', '19740116201101 2 002', 1, 11, 1, 5, '2021-02-24 19:55:38', '2021-02-24 19:55:38'),
(21, 'PENGAJAR-RK08M', 'SEMESTER-UUNAX', 'KLS-XK7WM', 'MAPEL-EVXD8', '19940803 201903 2 017', 1, 1, 8, 11, '2021-02-24 19:57:23', '2021-02-24 19:57:23'),
(22, 'PENGAJAR-S8YKC', 'SEMESTER-UUNAX', 'KLS-H7OVD', 'MAPEL-DJCI7', '19870126 201903 1 007', 1, 11, 5, 8, '2021-02-24 19:58:01', '2021-02-24 19:58:01'),
(23, 'PENGAJAR-NLDKB', 'SEMESTER-UUNAX', 'KLS-XK7WM', 'MAPEL-VFRLP', '-', 1, 1, 7, 17, '2021-02-24 19:58:22', '2021-02-24 19:58:22'),
(24, 'PENGAJAR-JUBQ5', 'SEMESTER-UUNAX', 'KLS-MYS7T', 'MAPEL-5CZAP', '19740116201101 2 002', 1, 6, 1, 5, '2021-02-24 19:58:40', '2021-02-24 19:58:40'),
(25, 'PENGAJAR-ZFK08', 'SEMESTER-UUNAX', 'KLS-XK7WM', 'MAPEL-FIAFZ', '19930217 201903 1 019', 1, 1, 11, 9, '2021-02-24 19:59:14', '2021-02-24 19:59:14'),
(26, 'PENGAJAR-KBBVV', 'SEMESTER-UUNAX', 'KLS-H7OVD', 'MAPEL-FAPE9', '-', 1, 11, 9, 15, '2021-02-24 20:00:14', '2021-02-24 20:00:14'),
(27, 'PENGAJAR-ITI2K', 'SEMESTER-UUNAX', 'KLS-MYS7T', 'MAPEL-DJCI7', '19870126 201903 1 007', 1, 6, 5, 8, '2021-02-24 20:00:50', '2021-02-24 20:00:50'),
(28, 'PENGAJAR-OFIBR', 'SEMESTER-UUNAX', 'KLS-H7OVD', 'MAPEL-FIAFZ', '-', 1, 11, 11, 16, '2021-02-24 20:01:23', '2021-02-24 20:01:23'),
(29, 'PENGAJAR-JJD88', 'SEMESTER-UUNAX', 'KLS-MYS7T', 'MAPEL-ORKOY', '19940803 201903 2 017', 1, 6, 4, 11, '2021-02-24 20:02:24', '2021-02-24 20:02:24'),
(30, 'PENGAJAR-QQ0DF', 'SEMESTER-UUNAX', 'KLS-H7OVD', 'MAPEL-CKUUB', '19830331200904 2 008', 1, 11, 3, 6, '2021-02-24 20:02:47', '2021-02-24 20:02:47'),
(31, 'PENGAJAR-MVT1G', 'SEMESTER-UUNAX', 'KLS-MYS7T', 'MAPEL-FAPE9', '-', 1, 6, 9, 15, '2021-02-24 20:03:16', '2021-02-24 20:03:16'),
(32, 'PENGAJAR-3JJUZ', 'SEMESTER-UUNAX', 'KLS-H7OVD', 'MAPEL-ORKOY', '19650527201407 1 001', 1, 11, 4, 13, '2021-02-24 20:04:46', '2021-02-24 20:04:46'),
(33, 'PENGAJAR-8ZNPB', 'SEMESTER-UUNAX', 'KLS-XK7WM', 'MAPEL-E6HNQ', '19880414 201903 2 007', 1, 1, 10, 12, '2021-02-24 20:05:15', '2021-02-24 20:05:15'),
(34, 'PENGAJAR-QJ12I', 'SEMESTER-UUNAX', 'KLS-MYS7T', 'MAPEL-VFRLP', '-', 1, 6, 7, 14, '2021-02-24 20:05:37', '2021-02-24 20:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_kepsek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `kode_semester`, `status_semester`, `tahun_ajaran`, `nip_kepsek`, `detail_id`, `created_at`, `updated_at`) VALUES
(1, 'SEMESTER-UUNAX', 'Aktif', '2020/2021', '19661231199103 1 094', 4, '2021-02-24 19:18:16', '2021-02-24 19:18:16'),
(2, 'SEMESTER-36S5R', 'Aktif', '2021/2022', '19661231199103 1 094', 4, '2021-02-24 19:18:16', '2021-02-24 19:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `test_table`
--

CREATE TABLE `test_table` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(555) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(555) NOT NULL,
  `telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_table`
--

INSERT INTO `test_table` (`id`, `nama_siswa`, `nisn`, `jenis_kelamin`, `alamat`, `telepon`) VALUES
(497, 'ABDUL RAHMAT', '0077768933', 'L', 'DESA WASAMPELA', '081344071142'),
(498, 'Ahmad Fauzan', '0078342758', 'L', 'Wasampela', '085256553113'),
(499, 'AL IKHSAN ABDUL RAHMAN', '0076956762', 'L', 'POROS WASUEMBA', '081355607757'),
(500, 'ARFIANSYAH', '0083625737', 'L', 'DESA WASAMPELA', '082191190803'),
(501, 'Aril', '0067293268', 'L', 'Wasampela', '082353213277'),
(502, 'Aswad', '0056491016', 'L', 'Desa Wasampela', '082353221168'),
(503, 'Avdal', '0078299941', 'L', 'Wasampela', '082350335508'),
(504, 'Citra', '0066864939', 'P', 'Desa Wasampela', ' '),
(505, 'Dafrin', '0053722584', 'L', 'Desa Wasampela', '082344080481'),
(506, 'Darwin', '0068308637', 'L', 'Wasampela', '082241401863'),
(507, 'Dasman', '0063017881', 'L', 'Desa Wasampela', '081324265124'),
(508, 'Delfi', '0053045883', 'L', 'Desa Wasampela', ' '),
(509, 'Devin', '0073331986', 'L', 'Wasampela', '085298457047'),
(510, 'DIAN INDRIANI', '0082499829', 'P', 'DESA WASAMPELA', '081240012338'),
(511, 'Edwin', '0051401380', 'L', 'Desa Wasampela', '082296436724'),
(512, 'Fadli', '0067362507', 'L', 'Wasampela', '082237192624'),
(513, 'Faril', '0057710680', 'L', 'Wasampela', '081342319175'),
(514, 'Farlan', '0059535843', 'L', 'Desa Wasampela', ' '),
(515, 'Fikran', '0042653948', 'L', 'Desa Wasampela', ' '),
(516, 'Ikmal Saputra', '0042653947', 'L', 'Desa Wasampela', ' '),
(517, 'Indriyani', '0069285792', 'P', 'Desa Wasampela', '085299615500'),
(518, 'Istiani', '0056693575', 'P', 'Desa Wasampela', '081387847110'),
(519, 'Jamal', '0041389350', 'L', 'Desa Wasampela', ' '),
(520, 'JUMARDI YANSA', '0089313618', 'L', 'DESA WASAMPELA', '081214811917'),
(521, 'Kasman', '0052013228', 'L', 'Desa Wasampela', '081220472482'),
(522, 'Kasmin', '0048979722', 'P', 'Desa Wasampela', '082353250496'),
(523, 'LaArga', '0079831046', 'L', 'Wasampela', '085258382859'),
(524, 'LaIrman', '0048059550', 'L', 'Desa Wasampela', ' '),
(525, 'LaRomi', '0041329529', 'L', 'Desa Wasampela', '082233510227'),
(526, 'Leni Elvian', '0069672143', 'P', 'Desa Wasampela', '082291252723'),
(527, 'Marlisa', '0065793022', 'P', 'Wasampela', '082296262350'),
(528, 'Mawar', '0061053156', 'P', 'Desa Wasampela', '082290310921'),
(529, 'Muh. Akbar', '0079704173', 'L', 'Wasampela', '082290308903'),
(530, 'Muhamad Fajar', '0073204003', 'L', 'Wasampela', ' '),
(531, 'Nesti', '0077642701', 'P', 'Wasampela', '082353250539'),
(532, 'Nova Marisa', '0066891200', 'P', 'Desa Wasampela', '082324989851'),
(533, 'Nurhalima', '0069026698', 'P', 'Wasampela', '081389037066'),
(534, 'Nurmila', '0059763603', 'P', 'Desa Wasampela', '085240981099'),
(535, 'Rahmat', '0043284200', 'L', 'Desa Wasampela', ' '),
(536, 'Ranti', '0047297816', 'P', 'Jalan Poros Pasarwajo-Wabula', '081313040720'),
(537, 'Rasti', '0064746988', 'P', 'Wasampela', '085333705026'),
(538, 'RENDI ARIFIN', '0079393297', 'L', 'WASAMPELA', '082293049392'),
(539, 'Restiyanti', '0053472417', 'P', 'Desa Wasampela', '082190819430'),
(540, 'Revi Mariska', '0069108488', 'P', 'Jalan Poros Pasarwajo-Wabula', '085246444152'),
(541, 'Ridwan', '0036473682', 'L', 'Desa Wasampela', ' '),
(542, 'Rinda', '0049314287', 'P', 'Desa Wasampela', '082344080481'),
(543, 'Rislan', '0052994661', 'L', 'JALAN POROS PASARWAJO-WABULA', '085242446887'),
(544, 'Sadiman', '0054268385', 'L', 'Desa Wasampela', '081347003147'),
(545, 'SALIM SUKMA', '0058077820', 'L', 'LABALA', '081344374513'),
(546, 'Sandra', '0054570781', 'P', 'Desa Wasampela', '082230504204'),
(547, 'Selni Sutriani', '0053339061', 'P', 'Desa Wasampela', '085244478131'),
(548, 'Selvi', '0068774183', 'P', 'Desa Wasampela', '082290444877'),
(549, 'SIGITALFARAD', '0042755136', 'L', 'Jalan Poros Wabula-Burangasi', '082259678631'),
(550, 'Sista', '0066501674', 'P', 'Desa Wasampela', '085342824237'),
(551, 'SITI SHALEHA', '0071739569', 'P', 'DESA WASAMPELA', '085340224227'),
(552, 'Sry Alfianti', '0071555196', 'P', 'Wasampela', '082350395857'),
(553, 'Wa Misna', '9993549568', 'P', 'Desa Wasampela', '082296262350'),
(554, 'Wulan Mutmainna', '0063845691', 'P', 'Desa Wasampela', '082353084151'),
(555, 'Yasrin', '0056565522', 'L', 'Desa Wasampela', ' '),
(556, 'YUSLIATI', '0076333615', 'P', 'DESA WASAMPELA', '082352403865'),
(557, 'Yuswita', '0064937134', 'P', 'Wasampela', ' '),
(558, 'ZIKRAN', '0073735029', 'L', 'DESA WASAMPELA', '082393265923');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_pengajar_id_foreign` (`pengajar_id`),
  ADD KEY `absensi_detail_id_foreign` (`detail_id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_detail_id_foreign` (`detail_id`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_matapelajaran_id_foreign` (`matapelajaran_id`),
  ADD KEY `nilai_pengajar_id_foreign` (`pengajar_id`),
  ADD KEY `nilai_detail_id_foreign` (`detail_id`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajar_semester_id_foreign` (`semester_id`),
  ADD KEY `pengajar_kelas_id_foreign` (`kelas_id`),
  ADD KEY `pengajar_matapelajaran_id_foreign` (`matapelajaran_id`),
  ADD KEY `pengajar_detail_id_foreign` (`detail_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semester_detail_id_foreign` (`detail_id`);

--
-- Indexes for table `test_table`
--
ALTER TABLE `test_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test_table`
--
ALTER TABLE `test_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=559;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_detail_id_foreign` FOREIGN KEY (`detail_id`) REFERENCES `detail` (`id`),
  ADD CONSTRAINT `absensi_pengajar_id_foreign` FOREIGN KEY (`pengajar_id`) REFERENCES `pengajar` (`id`);

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_detail_id_foreign` FOREIGN KEY (`detail_id`) REFERENCES `detail` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_detail_id_foreign` FOREIGN KEY (`detail_id`) REFERENCES `detail` (`id`),
  ADD CONSTRAINT `nilai_matapelajaran_id_foreign` FOREIGN KEY (`matapelajaran_id`) REFERENCES `matapelajaran` (`id`),
  ADD CONSTRAINT `nilai_pengajar_id_foreign` FOREIGN KEY (`pengajar_id`) REFERENCES `pengajar` (`id`);

--
-- Constraints for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD CONSTRAINT `pengajar_detail_id_foreign` FOREIGN KEY (`detail_id`) REFERENCES `detail` (`id`),
  ADD CONSTRAINT `pengajar_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `pengajar_matapelajaran_id_foreign` FOREIGN KEY (`matapelajaran_id`) REFERENCES `matapelajaran` (`id`),
  ADD CONSTRAINT `pengajar_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_detail_id_foreign` FOREIGN KEY (`detail_id`) REFERENCES `detail` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
