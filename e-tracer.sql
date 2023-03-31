-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2023 at 07:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-tracer`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` enum('L','P') NOT NULL DEFAULT 'L',
  `id_poli` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `jk`, `id_poli`, `created_at`, `updated_at`) VALUES
('135671', 'dr. Muhammad Adi Saputro. S,TrI ', 'L', 1, '2023-03-07 14:44:00', '0000-00-00 00:00:00'),
('0976LOU', 'dr. Ayunda', 'P', 1, '2023-03-07 07:44:03', '2023-03-07 07:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` varchar(20) NOT NULL,
  `id_rm` varchar(30) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `terlambat` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'false',
  `status_id` int DEFAULT '1',
  `waktu_peminjaman` timestamp NULL DEFAULT NULL,
  `waktu_pengembalian` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_rm`, `keterangan`, `terlambat`, `status_id`, `waktu_peminjaman`, `waktu_pengembalian`, `created_at`, `updated_at`) VALUES
('0976LOU', '12345678', 'hgh', 'false', 1, '2023-03-18 16:50:55', NULL, '2023-03-18 16:50:55', '2023-03-18 16:50:55'),
('0976LOUOO', '12345678', 'sdada', 'false', 1, '2023-03-22 05:18:31', NULL, '2023-03-22 05:18:31', '2023-03-22 05:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int NOT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Poli Gigi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medik`
--

CREATE TABLE `rekam_medik` (
  `id` varchar(30) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL DEFAULT 'L',
  `no_bpjs` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int NOT NULL,
  `poli_id` int NOT NULL,
  `tanggal_berobat` date NOT NULL,
  `tipe_perawatan_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rekam_medik`
--

INSERT INTO `rekam_medik` (`id`, `nik`, `nama_pasien`, `jk`, `no_bpjs`, `alamat`, `no_hp`, `tanggal_lahir`, `umur`, `poli_id`, `tanggal_berobat`, `tipe_perawatan_id`, `created_at`, `updated_at`) VALUES
('12345678', '321029841', 'Muhammad Adi Saputro', 'L', NULL, 'Tanggul', '085748314069', '2003-05-21', 19, 1, '2023-03-01', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `keterangan`) VALUES
(1, 'Kepala Puskesmas'),
(2, 'Petugas Poli'),
(3, 'Petugas Rekam Medik');

-- --------------------------------------------------------

--
-- Table structure for table `status_peminjaman`
--

CREATE TABLE `status_peminjaman` (
  `id` int NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `status_peminjaman`
--

INSERT INTO `status_peminjaman` (`id`, `keterangan`) VALUES
(1, 'Dipinjam'),
(2, 'Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_perawatan`
--

CREATE TABLE `tipe_perawatan` (
  `id` int NOT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tipe_perawatan`
--

INSERT INTO `tipe_perawatan` (`id`, `keterangan`) VALUES
(1, 'Rawat Inap'),
(2, 'Rawat Jalan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL DEFAULT 'L',
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `foto`, `nama`, `jk`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Muhammad Adi Saputro', 'L', 'muhammadxxz7@gmail.com', '$2y$10$e1yHOxvgIKTtFKCvKfW7gOVKI2fZrxrdTsaW.YFTa0qV.7cENDjiG', 3, '2023-03-13 07:05:59', '2023-03-13 07:05:59'),
(3, NULL, 'dr. Ayunda', 'P', 'ayunda@gmail.com', '$2y$10$0TBFu0l6Dv8fQNPN7J0T0.zSoFwCgay6hT.whuHmGuCRpdX652XBe', 1, '2023-03-25 06:36:15', '2023-03-25 06:36:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `FKpeminjaman133945` (`status_id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poli_tujuan` (`poli_id`),
  ADD KEY `tipe_perawatan` (`tipe_perawatan_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_peminjaman`
--
ALTER TABLE `status_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_perawatan`
--
ALTER TABLE `tipe_perawatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_peminjaman`
--
ALTER TABLE `status_peminjaman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipe_perawatan`
--
ALTER TABLE `tipe_perawatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `FKdokter913697` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FKpeminjaman133945` FOREIGN KEY (`status_id`) REFERENCES `status_peminjaman` (`id`),
  ADD CONSTRAINT `FKpeminjaman520876` FOREIGN KEY (`id_rm`) REFERENCES `rekam_medik` (`id`);

--
-- Constraints for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  ADD CONSTRAINT `FKrekam_medi94936` FOREIGN KEY (`tipe_perawatan_id`) REFERENCES `tipe_perawatan` (`id`),
  ADD CONSTRAINT `FKrekam_medi99954` FOREIGN KEY (`poli_id`) REFERENCES `poli` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FKuser994439` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
