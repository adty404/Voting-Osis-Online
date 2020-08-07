-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 06:47 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting_osis_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `npk` int(11) NOT NULL,
  `roles` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `validation_code` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `npk`, `roles`, `nama`, `status`, `validation_code`, `created_at`, `updated_at`) VALUES
(2, 20080005, 'guru', 'INE YULIANTI, S.Pd', 'Belum Voting', 'jDbZdn', '2019-11-13 09:08:33', '2019-11-21 00:53:40'),
(3, 20080002, 'guru', 'GURUH WIJANARKO.ST', 'Belum Voting', 'Rbuon4', '2019-11-13 09:08:59', '2019-12-05 17:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `foto` varchar(25) DEFAULT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id`, `siswa_id`, `foto`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(52, 18, 'aditya.jpg', '<p>tes tes tes</p>', '<p>tes tes tes</p>', '2019-12-05 17:05:07', '2019-12-05 17:05:07'),
(57, 7, 'PEMBUKAAN.png', '<p>tes tes</p>', '<p>tes tes tes</p>', '2019-12-06 09:16:48', '2019-12-06 09:16:48'),
(58, 13, 'NAMA KELOMPOK.png', '<p>tes</p>', '<p>tes tes</p>', '2019-12-06 09:17:17', '2019-12-06 09:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `kandidat_id` int(11) DEFAULT NULL,
  `nis` int(11) NOT NULL,
  `roles` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kelas` int(11) NOT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `jurusan` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `validation_code` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `kandidat_id`, `nis`, `roles`, `nama`, `kelas`, `jenis_kelamin`, `jurusan`, `status`, `validation_code`, `created_at`, `updated_at`) VALUES
(2, 0, 161710177, 'siswa', 'ADELLA WINDY BERLIANA', 10, 'P', 'Multimedia', 'Belum Voting', 'fvqMJU', '2019-11-13 02:44:00', '2019-12-05 15:32:35'),
(3, 0, 161710176, 'siswa', 'ACHMAD HIDAYAT JASIR', 10, 'L', 'Multimedia', 'Belum Voting', '7rBi2k', '2019-11-13 02:50:33', '2019-11-20 23:26:39'),
(4, 0, 161710212, 'siswa', 'ABELLIA RAIHAN THAHIRRA', 12, 'P', 'Multimedia', 'Belum Voting', 'JMsUHO', '2019-11-13 03:06:26', '2019-12-05 16:43:56'),
(5, 0, 151610310, 'siswa', 'ALDA DEA HIDAYAT', 12, 'P', 'Rekayasa Perangkat Lunak', 'Belum Voting', 'DK50xn', '2019-11-13 03:07:00', '2019-12-06 09:01:35'),
(7, 57, 151610219, 'siswa', 'MILLENIA SAHARANI', 12, 'P', 'Rekayasa Perangkat Lunak', 'Belum Voting', '9TiTGA', '2019-11-13 03:12:52', '2019-12-06 09:16:48'),
(10, 0, 161710016, 'siswa', 'ANDIKA BACHRAIN PURNAWAN', 11, 'L', 'Teknik Komputer Jaringan', 'Belum Voting', 'BUHT2G', '2019-11-13 03:39:20', '2019-12-06 09:15:33'),
(11, 0, 141510068, 'siswa', 'AJENG PUSPITA SARI', 12, 'P', 'Teknik Komputer Jaringan', 'Belum Voting', 'AkFsg0', '2019-11-13 03:40:05', '2019-12-06 09:16:06'),
(13, 58, 161710140, 'siswa', 'ACHMAD DHARMA YUDHA', 10, 'L', 'Multimedia', 'Belum Voting', '90UdM6', '2019-11-13 03:57:56', '2019-12-06 09:17:17'),
(15, 0, 151610274, 'siswa', 'ACHMAD SADDAM RAMALLA', 10, 'L', 'Teknik Komputer Jaringan', 'Belum Voting', 'BXGl1Y', '2019-11-13 04:03:29', '2019-12-06 09:16:06'),
(16, 0, 151610275, 'siswa', 'ADI PRAYITNO', 10, 'L', 'Multimedia', 'Belum Voting', 'W1Fi8r', '2019-11-13 04:04:13', '2019-12-06 09:05:49'),
(18, 52, 151610204, 'siswa', 'ADITYA PRASETYO', 12, 'L', 'Rekayasa Perangkat Lunak', 'Sudah Voting', 'wrpEQU', '2019-11-13 08:40:42', '2019-12-26 15:28:24'),
(19, 0, 141510281, 'siswa', 'ALIVIA NUR MEIIANI', 12, 'P', 'Teknik Komputer Jaringan', 'Sudah Voting', 'OOaU0d', '2019-12-05 16:59:03', '2019-12-06 09:15:33'),
(20, NULL, 151610216, 'siswa', 'IRVAN YURI ANGGARA', 11, 'L', 'Rekayasa Perangkat Lunak', 'Sudah Voting', 'S5nQ2K', '2019-12-05 16:59:25', '2019-12-05 17:36:18'),
(21, NULL, 151610231, 'siswa', 'SAHARA ALMA JUWITA', 12, 'P', 'Rekayasa Perangkat Lunak', 'Sudah Voting', '8k4eSv', '2019-12-05 16:59:42', '2019-12-05 17:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `npk` int(11) NOT NULL,
  `roles` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `validation_code` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `npk`, `roles`, `nama`, `status`, `validation_code`, `created_at`, `updated_at`) VALUES
(2, 20100078, 'staff', 'SUTRISNA', 'Sudah Voting', 'EoZRso', '2019-11-13 09:19:49', '2019-11-21 02:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Aditya', 'adty404@gmail.com', NULL, '$2y$10$SpCuUGvijzEwQYHPHF96beHBhh5NcdhdNIvRaAc1Q5RZlPxZ8BkqO', 't7n2v7kjX8HocMcjgBQI9P9dhWWtkgPU5M3UKChZEpA7WSbdRh66x69noFVr', '2019-11-08 02:18:40', '2019-11-08 02:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `nis_npk` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_kandidat` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `nis_npk`, `status`, `nama`, `nama_kandidat`, `created_at`, `updated_at`) VALUES
(42, 141510281, 'SISWA', 'ALIVIA NUR MEIIANI', 'ADITYA PRASETYO', '2019-12-05 17:35:51', '2019-12-05 17:35:51'),
(43, 151610216, 'SISWA', 'IRVAN YURI ANGGARA', 'ADITYA PRASETYO', '2019-12-05 17:36:18', '2019-12-05 17:36:18'),
(44, 151610231, 'SISWA', 'SAHARA ALMA JUWITA', 'ADITYA PRASETYO', '2019-12-05 17:36:38', '2019-12-05 17:36:38'),
(45, 151610204, 'SISWA', 'ADITYA PRASETYO', 'MILLENIA SAHARANI', '2019-12-26 15:28:23', '2019-12-26 15:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_mulai`
--

CREATE TABLE `waktu_mulai` (
  `id` int(11) NOT NULL,
  `m_d_y` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu_mulai`
--

INSERT INTO `waktu_mulai` (`id`, `m_d_y`, `jam`, `created_at`, `updated_at`) VALUES
(1, '01/26/2020', '20:00', '2020-01-26 05:37:30', '2020-01-26 05:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_tampil`
--

CREATE TABLE `waktu_tampil` (
  `id` int(11) NOT NULL,
  `m_d_y` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu_tampil`
--

INSERT INTO `waktu_tampil` (`id`, `m_d_y`, `jam`, `created_at`, `updated_at`) VALUES
(1, '01/28/2020', '18:00', '2020-01-26 05:37:53', '2020-01-26 05:37:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`,`npk`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`,`siswa_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`,`nis`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`,`npk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waktu_mulai`
--
ALTER TABLE `waktu_mulai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waktu_tampil`
--
ALTER TABLE `waktu_tampil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `waktu_mulai`
--
ALTER TABLE `waktu_mulai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waktu_tampil`
--
ALTER TABLE `waktu_tampil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
