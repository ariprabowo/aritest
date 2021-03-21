-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 10:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_production`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_achivement`
--

CREATE TABLE `m_achivement` (
  `kode_achivement` varchar(4) NOT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `m_item`
--

CREATE TABLE `m_item` (
  `kode_item` varchar(4) NOT NULL,
  `name_item` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `m_karyawan`
--

CREATE TABLE `m_karyawan` (
  `npk` varchar(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `m_lokasi`
--

CREATE TABLE `m_lokasi` (
  `kode_lokasi` varchar(4) NOT NULL,
  `name_lokasi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `m_planning`
--

CREATE TABLE `m_planning` (
  `kode_planning` varchar(4) NOT NULL,
  `kode_item` varchar(4) DEFAULT NULL,
  `qty_target` int(11) DEFAULT NULL,
  `waktu_target` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_produksi`
--

CREATE TABLE `t_produksi` (
  `kode_produksi` varchar(5) NOT NULL,
  `npk` varchar(5) DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `kode_lokasi` varchar(4) DEFAULT NULL,
  `kode_planning` varchar(4) DEFAULT NULL,
  `qty_actual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_achivement`
--
ALTER TABLE `m_achivement`
  ADD PRIMARY KEY (`kode_achivement`);

--
-- Indexes for table `m_item`
--
ALTER TABLE `m_item`
  ADD PRIMARY KEY (`kode_item`);

--
-- Indexes for table `m_karyawan`
--
ALTER TABLE `m_karyawan`
  ADD PRIMARY KEY (`npk`);

--
-- Indexes for table `m_lokasi`
--
ALTER TABLE `m_lokasi`
  ADD PRIMARY KEY (`kode_lokasi`);

--
-- Indexes for table `m_planning`
--
ALTER TABLE `m_planning`
  ADD PRIMARY KEY (`kode_planning`),
  ADD KEY `kode_item` (`kode_item`);

--
-- Indexes for table `t_produksi`
--
ALTER TABLE `t_produksi`
  ADD PRIMARY KEY (`kode_produksi`),
  ADD KEY `npk` (`npk`),
  ADD KEY `kode_lokasi` (`kode_lokasi`),
  ADD KEY `kode_planning` (`kode_planning`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_planning`
--
ALTER TABLE `m_planning`
  ADD CONSTRAINT `m_planning_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `m_item` (`kode_item`);

--
-- Constraints for table `t_produksi`
--
ALTER TABLE `t_produksi`
  ADD CONSTRAINT `t_produksi_ibfk_1` FOREIGN KEY (`npk`) REFERENCES `m_karyawan` (`npk`),
  ADD CONSTRAINT `t_produksi_ibfk_2` FOREIGN KEY (`kode_lokasi`) REFERENCES `m_lokasi` (`kode_lokasi`),
  ADD CONSTRAINT `t_produksi_ibfk_3` FOREIGN KEY (`kode_planning`) REFERENCES `m_planning` (`kode_planning`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
