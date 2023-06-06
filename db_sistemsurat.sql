-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2023 at 06:48 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistemsurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_pengguna` int NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('lurah','sekretaris','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_pengguna`, `nama_pengguna`, `alamat`, `telp`, `email`, `username`, `password`, `level`) VALUES
(1, 'Nengah Ari', 'gadungan', '081532764372', 'nengah@gmail.com', 'admin', '12345', 'admin'),
(2, 'saya', 'disini', '0889', 'ada', 'admin', '12345', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` char(8) NOT NULL,
  `id_sm` char(8) NOT NULL,
  `isi_disposisi` varchar(100) NOT NULL,
  `sifat` enum('Biasa','Segera','Penting','Rahasia') NOT NULL,
  `tgldisposisi` date NOT NULL,
  `bataswaktu` date NOT NULL,
  `status` enum('sudah didisposisi','belum didisosisi') NOT NULL,
  `id_bagian` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `kode_klasifikasi` int NOT NULL,
  `klasifikasi` varchar(50) NOT NULL,
  `uraian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`kode_klasifikasi`, `klasifikasi`, `uraian`) VALUES
(3, '03', 'iya'),
(4, '01', 'oke');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat`
--

CREATE TABLE `perangkat` (
  `id_bagian` int NOT NULL,
  `nama_bagian` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `perangkat`
--

INSERT INTO `perangkat` (`id_bagian`, `nama_bagian`, `nama`) VALUES
(1, 'staff', 'alvin'),
(2, 'Kasi Pemerintahan', 'Rony tri efendi'),
(3, 'teknisi', 'toma');

-- --------------------------------------------------------

--
-- Table structure for table `sk`
--

CREATE TABLE `sk` (
  `id_sk` int NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `kode_klasifikasi` int NOT NULL,
  `isi_ringkasan` varchar(100) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `tglsurat` date NOT NULL,
  `tglcatat` date NOT NULL,
  `sifat` enum('Biasa','Segera','Penting','Rahasia') NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file` varchar(30) NOT NULL,
  `id_pengguna` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sk`
--

INSERT INTO `sk` (`id_sk`, `no_surat`, `kode_klasifikasi`, `isi_ringkasan`, `penerima`, `tglsurat`, `tglcatat`, `sifat`, `keterangan`, `file`, `id_pengguna`) VALUES
(1, '23', 3, 'ddd', 'saya', '2023-06-06', '2023-06-07', 'Segera', 'aga', 'file', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sm`
--

CREATE TABLE `sm` (
  `id_sm` int NOT NULL,
  `nosurat` varchar(20) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `isi` varchar(100) NOT NULL,
  `sifat` enum('Biasa','Segera','Penting','Rahasia') NOT NULL,
  `tglsurat` date NOT NULL,
  `tglterima` date NOT NULL,
  `status` enum('sudah didisposisi','belum didisposisi') NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file` varchar(30) NOT NULL,
  `id_pengguna` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sm`
--

INSERT INTO `sm` (`id_sm`, `nosurat`, `pengirim`, `isi`, `sifat`, `tglsurat`, `tglterima`, `status`, `keterangan`, `file`, `id_pengguna`) VALUES
(13, '231', 'alvin', 'isi', 'Biasa', '2023-06-16', '2023-06-13', 'belum didisposisi', 'ket', 'file', 1),
(16, '231', 'toma', 'iya', '', '2023-06-17', '2023-06-01', '', 'ket', 'file', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`kode_klasifikasi`);

--
-- Indexes for table `perangkat`
--
ALTER TABLE `perangkat`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `sk`
--
ALTER TABLE `sk`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `sm`
--
ALTER TABLE `sm`
  ADD PRIMARY KEY (`id_sm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `kode_klasifikasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perangkat`
--
ALTER TABLE `perangkat`
  MODIFY `id_bagian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sk`
--
ALTER TABLE `sk`
  MODIFY `id_sk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sm`
--
ALTER TABLE `sm`
  MODIFY `id_sm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
