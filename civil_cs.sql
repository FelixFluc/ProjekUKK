-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 02:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `civil_cs`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(2, 'Kependudukan'),
(3, 'Kesehatan'),
(4, 'Perpajakan'),
(5, 'Lalu lintas'),
(6, 'Kriminal'),
(7, 'Legalisasi');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telepon` varchar(35) NOT NULL,
  `user_status` enum('active','dormant') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `username`, `password`, `telepon`, `user_status`) VALUES
(4, '12345', 'Azis', 'A5', '$2y$10$CyvF/mShPGQ.Ya3x/XgEe.TvZyygrwdp4ZodJXf5ZKWHkpQvU3l.W', '085711223344', 'active'),
(8, '512534145', 'Erik', 'U1', '$2y$10$iLsGMDmzVw.evdXXHD0hSORpTRhVdFKd/AwcAyjFSglNgdQWt6YLG', '0856447799', 'active'),
(9, '665345', 'Viero', 'X2', '$2y$10$5TYM4PubTjUWIiYjhe1.Cu3lBLPl4rPn1h38Al2umDh46uKkErreq', '0875644124', 'active'),
(14, '4445234', 'S', 'Q5', '$2y$10$2i0wlI1ZC03hAye1PIrXY.PxNF/qarRDoXmrmiOu1sPKzuRg84NoG', '08774148952', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `sub_kategori` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tanggal`, `waktu`, `nik`, `isi_laporan`, `kategori`, `sub_kategori`, `foto`, `status`) VALUES
(7, '2023-02-20', '12:02:00', '12345', 'Info daftar KTP', '2', '14', 'ss_2.PNG', 'selesai'),
(8, '2023-02-20', '13:03:00', '12345', 'Macet Jl. Sudirman', '5', '18', 'maxwell.jpg', 'selesai'),
(9, '2023-02-08', '13:18:00', '512534145', 'Klaim BPJS gimana ya?', '3', '17', 'design.JPG', 'selesai'),
(11, '2023-02-21', '08:19:00', '12345', 'kerja bakti', '3', '17', '101.jpg', 'proses'),
(14, '2023-02-24', '18:43:00', '12345', 'dgsg', '3', '17', '5-Cara-Menghemat-Air-Bersih-saat-Musim-Kemarau-696x7654.jpg', 'proses'),
(15, '2023-02-27', '11:45:00', '12345', 'ngepet', '2', '14', 'OIP.jpg', 'selesai'),
(16, '2023-02-28', '18:47:00', '512534145', 'help', '6', '20', 'OIP1.jpg', '0'),
(17, '2023-03-16', '11:47:00', '12345', 'Proses turunnya akta kelahiran anak saya lama sekali.', '2', '16', 'OIP2.jpg', 'selesai'),
(18, '2023-03-16', '10:50:00', '12345', 'info', '3', '17', 'red_cross.jpg', 'selesai'),
(19, '2023-03-16', '11:52:00', '12345', 'info', '3', '17', 'red_cross1.jpg', '0'),
(20, '2023-03-16', '08:56:00', '512534145', 'tes', '4', '22', 'OIP3.jpg', '0'),
(21, '2023-03-16', '16:12:00', '12345', 'info', '2', '16', 'red_cross2.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telepon` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telepon`, `level`) VALUES
(4, 'Alang', 'A3', '$2y$10$SkIRsVimtJ09.PwKrzOWWeu4uDEaAr7OGyd.WC9F0F1vknBdXbMSO', '085711223344', 'admin'),
(21, 'Rewr', 'R4', '$2y$10$AMlZW.N8diSHpTyWeCDKlu3WwRTw7eDIzvGWXwaxWkfbWyU1Llm1W', '0893846', 'petugas'),
(22, 'VB', 'X6', '$2y$10$mMmfrqLXaYKu5sjoalC6y.s9GA.ulbPA3HPUWtPTejQjGnC8i0sFC', '0789578', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `id_subkategori` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_subkategori`, `id_kategori`, `sub_kategori`) VALUES
(14, 2, 'Migrasi'),
(15, 6, 'Klitih'),
(16, 2, 'Akta Kelahiran'),
(17, 3, 'BPJS'),
(18, 5, 'Macet Parah'),
(19, 4, 'Pengemplanagan'),
(20, 6, 'Maling'),
(21, 7, 'Bangunan Cagar Budaya'),
(22, 4, 'Amnesti pajak'),
(23, 6, 'Begal');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(20, 7, '2023-02-27', 'ok', 4),
(21, 9, '2023-02-27', 'siap', 4),
(25, 11, '2023-02-27', 'y\r\n', 4),
(26, 15, '2023-02-28', 'selesai', 4),
(27, 14, '2023-03-14', 'oke', 21),
(28, 17, '2023-03-16', 'sedang otw', 4),
(29, 8, '2023-03-16', 'ya', 4),
(30, 18, '2023-03-16', 'ok', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id_subkategori`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id_subkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
