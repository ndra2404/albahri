-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 07:57 AM
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
-- Table structure for table `tbl_notif`
--

CREATE TABLE `tbl_notif` (
  `id` int(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_notif`
--

INSERT INTO `tbl_notif` (`id`, `code`, `content`) VALUES
(1, 'DTOL', 'Kepada Yth. Bapak/Ibu<br>\nKami dari sekolah islam terpadu Al-Bahri ingin memberitahukan bahwa hasil pendaftaran anda dengan nomor pendaftaran [nodaftar] ditolak, karena tidak sesuai dengan persyaratan pendaftaran'),
(2, 'VIEW', 'Kepada Yth. Bapak/Ibu <br>\nKami dari sekolah islam terpadu Al-Bahri ingin memberitahukan bahwa pendaftaran anda dengan nomor [nodaftar] telah diterima, serta mendapatkan jadwal wawancara untuk orang tua siswa dan test tertulis untuk calon siswa pada [tgl] pukul [jam]\ncatatan\n[catatan]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_notif`
--
ALTER TABLE `tbl_notif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_notif`
--
ALTER TABLE `tbl_notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
