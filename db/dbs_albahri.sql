-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 10:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_albahri`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE `tbl_document` (
  `id` int(11) NOT NULL,
  `akte_kelahiran` varchar(100) NOT NULL,
  `kartu_keluarga` varchar(100) NOT NULL,
  `ktp_wali` varchar(100) NOT NULL,
  `pas_photo` varchar(100) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`id`, `akte_kelahiran`, `kartu_keluarga`, `ktp_wali`, `pas_photo`, `id_pendaftaran`, `created_at`, `updated_at`) VALUES
(3, 'upload/document/AL23063000002_akte_kelahiran.png', 'upload/document/AL23063000002_kartu_keluarga.png', 'upload/document/AL23063000002_ktp_wali.png', 'upload/document/AL23063000002_pas_photo.png', 3, '2023-06-29 23:50:09', '2023-06-29 23:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interview`
--

CREATE TABLE `tbl_interview` (
  `id_interview` int(11) NOT NULL,
  `tgl_interview` date NOT NULL,
  `jam_interview` text NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_interview`
--

INSERT INTO `tbl_interview` (`id_interview`, `tgl_interview`, `jam_interview`, `id_pendaftaran`, `note`, `created_at`, `updated_at`) VALUES
(1, '2023-07-04', '09:30', 3, 'Membawa ktp dan kartu kartu', '2023-07-01 19:09:42', '2023-07-01 19:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `nominal` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`id_konfirmasi`, `no_rekening`, `nominal`, `id_pendaftaran`, `bukti_bayar`, `created_at`, `updated_at`) VALUES
(1, '12345678', 1085000, 3, 'upload/pembayaran/AL23063000002-buktiBayar.jpg', '2023-07-03 02:54:57', '2023-07-03 03:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_param`
--

CREATE TABLE `tbl_master_param` (
  `id_master_param` int(11) NOT NULL,
  `param_code` varchar(10) NOT NULL,
  `param_value` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_master_param`
--

INSERT INTO `tbl_master_param` (`id_master_param`, `param_code`, `param_value`, `created_at`, `updated_at`) VALUES
(1, 'BAYAR', '1085000', '2023-07-02 03:26:33', NULL),
(2, 'NOREK', 'BCA 0954331187 a/n siti rizky', '2023-07-03 08:37:43', NULL),
(3, 'MULAI', '2023-07-19', '2023-07-05 06:23:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orangtua`
--

CREATE TABLE `tbl_orangtua` (
  `id_orangtua` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `tempat_lahir_ayah` varchar(25) NOT NULL,
  `tgl_lahir_ayah` date NOT NULL,
  `pekerjaan_ayah` varchar(25) NOT NULL,
  `nama_ibu` varchar(25) NOT NULL,
  `tempat_lahir_ibu` varchar(25) NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `pekerjaan_ibu` varchar(25) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orangtua`
--

INSERT INTO `tbl_orangtua` (`id_orangtua`, `id_users`, `nama_ayah`, `tempat_lahir_ayah`, `tgl_lahir_ayah`, `pekerjaan_ayah`, `nama_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `pekerjaan_ibu`, `no_telp`, `email`, `created_at`, `updated_at`) VALUES
(13, 14, 'ayah', 'Bogor', '1994-04-24', 'karyawan swasta', 'ibu', 'Bogor', '1999-04-24', 'IRT', '085817558374', 'ndra2404@gmail.com', '2023-06-28 07:36:09', '2023-06-28 07:36:09'),
(15, 15, 'Ayah', 'tempat', '2023-06-30', 'Kerja', 'Ibu', 'Tempat', '2023-06-30', 'IRT', '62895617680356', 'ndra2404.info@gmail.com', '2023-06-29 17:51:10', '2023-06-29 17:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `no_pendaftaran` varchar(13) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `kelas` varchar(1) NOT NULL,
  `status` int(1) NOT NULL,
  `alamat` text NOT NULL,
  `id_orangtua` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_pendaftaran`, `no_pendaftaran`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `agama`, `jenis_kelamin`, `kelas`, `status`, `alamat`, `id_orangtua`, `created_at`, `updated_at`) VALUES
(1, 'AL23062800001', 'Anak lengkap', 'Bogor', '2019-04-24', 'Islam', 'Laki-Laki', 'B', 1, 'Jl. golf gunung geulis', 13, '2023-06-28 07:36:09', '2023-06-28 07:36:09'),
(3, 'AL23063000002', 'Indra', 'Bogor', '2020-04-24', 'Islam', 'Laki-laki', 'A', 7, 'Jl.golf Gunung Geulis Rt001/002', 15, '2023-06-29 17:51:10', '2023-07-04 23:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `level` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `level`, `status`, `created_at`, `updated_at`) VALUES
(13, 'admin@kitaberkarya.com', '$2y$10$Lb0F4IC6pS2ZZVAhgpF56.Kn5ZWPU.aX0d1BHeTSjDB/u7yNWb6r6', 1, 1, '2023-06-28 07:36:09', '2023-07-05 00:42:35'),
(14, 'ndra2404@gmail.com', '$2y$10$oUlmq/w1kNN0q2LUx7RlCexaTpY4cH0gpV6sefcmv6RJ9ReZcJgX2', 2, 1, '2023-06-28 07:36:09', '2023-06-28 07:36:09'),
(15, 'ndra2404.info@gmail.com', '$2y$10$oUlmq/w1kNN0q2LUx7RlCexaTpY4cH0gpV6sefcmv6RJ9ReZcJgX2', 2, 1, '2023-06-29 17:51:10', '2023-06-29 17:51:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_interview`
--
ALTER TABLE `tbl_interview`
  ADD PRIMARY KEY (`id_interview`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `tbl_master_param`
--
ALTER TABLE `tbl_master_param`
  ADD PRIMARY KEY (`id_master_param`);

--
-- Indexes for table `tbl_orangtua`
--
ALTER TABLE `tbl_orangtua`
  ADD PRIMARY KEY (`id_orangtua`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_interview`
--
ALTER TABLE `tbl_interview`
  MODIFY `id_interview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_master_param`
--
ALTER TABLE `tbl_master_param`
  MODIFY `id_master_param` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_orangtua`
--
ALTER TABLE `tbl_orangtua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
