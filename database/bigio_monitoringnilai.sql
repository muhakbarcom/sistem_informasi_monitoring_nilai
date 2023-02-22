-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 08:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigio_monitoringnilai`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses_murid`
--

CREATE TABLE `akses_murid` (
  `id_akses` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_murid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses_murid`
--

INSERT INTO `akses_murid` (`id_akses`, `id_user`, `id_murid`) VALUES
(4, 1, 1),
(5, 1, 2),
(6, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `alamat_guru` varchar(255) NOT NULL,
  `telepon_guru` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `alamat_guru`, `telepon_guru`, `id_user`) VALUES
(1, 'Guru Pertamas2n', 'Jalan Guru Pertama no. 1s', '08123456789', 2),
(2, 'Guru Kedua', 'Jalan Guru Kedua no. 2', '08123456789', 3);

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id_murid` int(11) NOT NULL,
  `nama_murid` varchar(255) NOT NULL,
  `alamat_murid` varchar(255) NOT NULL,
  `telepon_murid` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id_murid`, `nama_murid`, `alamat_murid`, `telepon_murid`, `id_user`) VALUES
(1, 'Murid Pertama', 'Jalan Murid Pertama no. 1', '08123456789', 4),
(2, 'Murid Kedua', 'Jalan Murid Kedua no. 2', '08123456789', 5),
(3, 'Murid Ketiga', 'Jalan Murid Ketiga no. 3', '08123456789', 6),
(4, 'cobas', 'akjsndkajsnd', '999', 11),
(5, 'cobacoba', 'coba', '12341231231', 12);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_murid` int(11) NOT NULL,
  `tgl_nilai` date NOT NULL,
  `jenis_nilai` enum('UTS','UAS','Tugas','Praktikum') NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_guru`, `id_murid`, `tgl_nilai`, `jenis_nilai`, `nilai`) VALUES
(10, 2, 1, '2023-01-01', 'UTS', 80),
(11, 2, 1, '2023-01-15', 'Tugas', 90),
(12, 2, 1, '2023-02-01', 'UAS', 85),
(13, 1, 2, '2023-01-01', 'UTS', 75),
(14, 1, 2, '2023-01-15', 'Tugas', 85),
(15, 1, 2, '2023-02-01', 'UAS', 80),
(16, 2, 3, '2023-01-01', 'UTS', 70),
(17, 2, 3, '2023-01-15', 'Tugas', 75),
(18, 2, 3, '2023-02-01', 'UAS', 65);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','murid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$/7Ho4YgwccsStJpb/me37eml7Md8t32w2wlbNTovDKdBMhlVMvtqG', 'admin'),
(2, 'guru222', '$2y$10$/7Ho4YgwccsStJpb/me37eml7Md8t32w2wlbNTovDKdBMhlVMvtqG', 'guru'),
(3, 'guru2', '$2y$10$/7Ho4YgwccsStJpb/me37eml7Md8t32w2wlbNTovDKdBMhlVMvtqG', 'guru'),
(4, 'murid1', '$2y$10$/7Ho4YgwccsStJpb/me37eml7Md8t32w2wlbNTovDKdBMhlVMvtqG', 'murid'),
(5, 'murid2', '$2y$10$/7Ho4YgwccsStJpb/me37eml7Md8t32w2wlbNTovDKdBMhlVMvtqG', 'murid'),
(6, 'murid3', '$2y$10$/7Ho4YgwccsStJpb/me37eml7Md8t32w2wlbNTovDKdBMhlVMvtqG', 'murid'),
(11, 'coba221s', '$2y$10$/7Ho4YgwccsStJpb/me37eml7Md8t32w2wlbNTovDKdBMhlVMvtqG', 'murid'),
(12, 'abx', '$2y$10$/7Ho4YgwccsStJpb/me37eml7Md8t32w2wlbNTovDKdBMhlVMvtqG', 'murid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_murid`
--
ALTER TABLE `akses_murid`
  ADD PRIMARY KEY (`id_akses`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_murid` (`id_murid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `guru_ibfk_1` (`id_user`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id_murid`),
  ADD KEY `murid_ibfk_1` (`id_user`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_murid` (`id_murid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses_murid`
--
ALTER TABLE `akses_murid`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id_murid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akses_murid`
--
ALTER TABLE `akses_murid`
  ADD CONSTRAINT `akses_murid_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `akses_murid_ibfk_2` FOREIGN KEY (`id_murid`) REFERENCES `murid` (`id_murid`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_murid`) REFERENCES `murid` (`id_murid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
