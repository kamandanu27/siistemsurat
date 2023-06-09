-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2023 at 09:01 AM
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
-- Database: `db_lsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `email_admin`, `password_admin`) VALUES
(1, 'alvin', 'abc@gmail.com', '12345'),
(4, 'ijot', 'abc@gmail.com', '765'),
(5, 'toma', 'fgh@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asesi`
--

CREATE TABLE `tbl_asesi` (
  `id_asesi` int NOT NULL,
  `nim_asesi` varchar(50) NOT NULL,
  `nik_asesi` varchar(50) NOT NULL,
  `nama_asesi` varchar(50) NOT NULL,
  `alamat_asesi` varchar(50) NOT NULL,
  `notlp_asesi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jeniskelamin_asesi` varchar(50) NOT NULL,
  `agama_asesi` varchar(50) NOT NULL,
  `tempatlahir_asesi` varchar(50) NOT NULL,
  `tanggallahir_asesi` varchar(50) NOT NULL,
  `provinsi_asesi` varchar(50) NOT NULL,
  `kotakab_asesi` varchar(50) NOT NULL,
  `tahunmasuk_asesi` varchar(50) NOT NULL,
  `tahunlulus_asesi` varchar(50) NOT NULL,
  `jurusan_asesi` varchar(50) NOT NULL,
  `foto_asesi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_asesi`
--

INSERT INTO `tbl_asesi` (`id_asesi`, `nim_asesi`, `nik_asesi`, `nama_asesi`, `alamat_asesi`, `notlp_asesi`, `jeniskelamin_asesi`, `agama_asesi`, `tempatlahir_asesi`, `tanggallahir_asesi`, `provinsi_asesi`, `kotakab_asesi`, `tahunmasuk_asesi`, `tahunlulus_asesi`, `jurusan_asesi`, `foto_asesi`) VALUES
(1, '', '', '', '', '', 'laki', '', '', '', '', '', '', '', 'ee', '1686298825-3409.jpg'),
(3, '11', '22', 'sgdws', 'wwvg', '131414', 'Laki-Laki', '', '', '', '', '', '', '', 'dd', '1686300498-download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id_event` int NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `tanggal_event` date NOT NULL,
  `jam_event` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id_event`, `nama_event`, `tanggal_event`, `jam_event`) VALUES
(1, 'mjnuwq', '2023-06-09', '15:20:00'),
(2, 'asdas', '2023-06-09', '17:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaturan`
--

CREATE TABLE `tbl_pengaturan` (
  `id_pengaturan` int NOT NULL,
  `visi` varchar(250) NOT NULL,
  `misi` varchar(250) NOT NULL,
  `struktur_organisasi` varchar(50) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pengaturan`
--

INSERT INTO `tbl_pengaturan` (`id_pengaturan`, `visi`, `misi`, `struktur_organisasi`, `kontak`, `id_admin`) VALUES
(1, 'okee', 'yyyta', 'adda', '0889', 5),
(2, 'yadfd', 'efefef', 'ttfcrdxwec', '6664543', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skema`
--

CREATE TABLE `tbl_skema` (
  `id_skema` int NOT NULL,
  `kode_skema` varchar(30) NOT NULL,
  `nama_skema` varchar(50) NOT NULL,
  `apl01` varchar(30) NOT NULL,
  `apl02` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_skema`
--

INSERT INTO `tbl_skema` (`id_skema`, `kode_skema`, `nama_skema`, `apl01`, `apl02`) VALUES
(1, '22', 'de', '77736ghdv', 'ubysgb'),
(3, '11', '22', '33', '44'),
(4, 'mks762b', '22dd', 'wsers', 'fefw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_asesi`
--
ALTER TABLE `tbl_asesi`
  ADD PRIMARY KEY (`id_asesi`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `tbl_skema`
--
ALTER TABLE `tbl_skema`
  ADD PRIMARY KEY (`id_skema`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_asesi`
--
ALTER TABLE `tbl_asesi`
  MODIFY `id_asesi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id_event` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  MODIFY `id_pengaturan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_skema`
--
ALTER TABLE `tbl_skema`
  MODIFY `id_skema` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
