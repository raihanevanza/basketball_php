-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 11:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_basket`
--

-- --------------------------------------------------------

--
-- Table structure for table `bb_fmale`
--

CREATE TABLE `bb_fmale` (
  `no_bbf` varchar(11) NOT NULL,
  `id_bbf` varchar(11) NOT NULL,
  `ket_bbf` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_fmale`
--

INSERT INTO `bb_fmale` (`no_bbf`, `id_bbf`, `ket_bbf`) VALUES
('P1', '< 70', 'Point Guard'),
('P2', '71 - 80', 'Shooting Guard'),
('P3', '81 - 90', 'Small Foward'),
('P4', '91 - 100', 'Power Foward'),
('P5', '> 100', 'Center');

-- --------------------------------------------------------

--
-- Table structure for table `bb_male`
--

CREATE TABLE `bb_male` (
  `no_bbm` varchar(11) NOT NULL,
  `id_bbm` varchar(11) NOT NULL,
  `ket_bbm` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_male`
--

INSERT INTO `bb_male` (`no_bbm`, `id_bbm`, `ket_bbm`) VALUES
('L1', '< 70', 'Point Guard'),
('L2', '71 - 80', 'Shooting Guard'),
('L3', '81 - 90', 'Small Foward'),
('L4', '90 - 100', 'Power Foward'),
('L5', '> 100', 'Center');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_hasil`
--

CREATE TABLE `evaluasi_hasil` (
  `id_eval` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `id_pertandingan` int(25) NOT NULL,
  `bb` varchar(11) NOT NULL,
  `id_fisik` int(11) NOT NULL,
  `id_fieldgoal` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `umur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi_hasil`
--

INSERT INTO `evaluasi_hasil` (`id_eval`, `nama`, `jk`, `id_pertandingan`, `bb`, `id_fisik`, `id_fieldgoal`, `id_to`, `id_posisi`, `umur`) VALUES
(7, 'Rafi Rusdi', 'L', 3, 'L2', 2, 3, 3, 0, '3'),
(8, 'Ahmad Fayezi', 'L', 2, 'L2', 3, 2, 3, 0, '10'),
(9, 'M. Vario Azhar', 'L', 3, 'L2', 1, 1, 2, 0, '3'),
(10, 'Kamil Fahrezi', 'L', 1, 'L4', 2, 3, 2, 0, '5'),
(11, 'Budi Hendrawan', 'L', 1, 'L3', 3, 3, 3, 0, '12'),
(12, 'Nanda Pratiwi', 'P', 1, 'P3', 2, 3, 3, 0, '6'),
(13, 'Aya Fataline', 'P', 2, 'P3', 1, 3, 2, 0, '4'),
(14, 'Yuliana Dwi', 'P', 1, 'P3', 2, 1, 1, 0, '2'),
(15, 'Diana Mutia', 'P', 2, 'P2', 2, 2, 2, 0, '4'),
(16, 'Amelia Ane', 'P', 1, 'P2', 1, 3, 2, 0, '6'),
(17, 'Ahmad Davis', 'L', 3, 'L3', 2, 3, 3, 0, '10'),
(18, 'Nate Atika', 'P', 2, 'P1', 1, 1, 1, 0, '2'),
(19, 'Romi Putiray', 'L', 2, 'L1', 1, 2, 1, 0, '20'),
(20, 'Le Fraud', 'P', 3, 'P1', 2, 3, 3, 0, '18'),
(21, 'Yunan wuysang', 'L', 2, 'L1', 2, 1, 2, 0, '18'),
(22, 'hanan kamila', 'P', 3, 'P1', 1, 2, 3, 0, '18'),
(23, 'renata sapi', 'P', 3, 'P5', 3, 3, 3, 0, '18'),
(24, 'Remi Samorangkir', 'L', 3, 'L1', 1, 2, 1, 0, '17'),
(25, 'Figho Putra', 'L', 1, 'L3', 2, 3, 1, 0, '20'),
(26, 'Rofiq Saputra', 'L', 3, 'L2', 3, 2, 2, 0, '5'),
(27, 'sheia', 'P', 2, 'P2', 1, 2, 1, 0, '20'),
(28, 'jambu guava', 'P', 3, 'P5', 1, 1, 3, 0, '20'),
(29, 'James Harden', 'L', 2, 'L2', 2, 1, 2, 2, '20'),
(31, 'Lebronwati', 'P', 3, 'P3', 3, 2, 3, 3, '18'),
(32, 'Kyrie Jenner', 'L', 3, 'L1', 2, 3, 3, 1, '19');

-- --------------------------------------------------------

--
-- Table structure for table `fieldgoal`
--

CREATE TABLE `fieldgoal` (
  `id_fieldgoal` int(11) NOT NULL,
  `ket_fieldgoal` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fieldgoal`
--

INSERT INTO `fieldgoal` (`id_fieldgoal`, `ket_fieldgoal`) VALUES
(1, '<= 49% Masuk bola'),
(2, '50% - 75% Masuk bola'),
(3, '76% - 100% Masuk bola');

-- --------------------------------------------------------

--
-- Table structure for table `fisik`
--

CREATE TABLE `fisik` (
  `id_fisik` int(11) NOT NULL,
  `ket_fisik` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fisik`
--

INSERT INTO `fisik` (`id_fisik`, `ket_fisik`) VALUES
(1, '160 cm - 180 cm'),
(2, '181 cm - 199 cm'),
(3, '200 cm - 230 cm');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` tinyint(3) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` float NOT NULL,
  `attribute` set('benefit','cost') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `attribute`) VALUES
(1, 'Pertandingan', 25, 'benefit'),
(3, 'Fisik', 15, 'benefit'),
(4, 'Teknik', 30, 'benefit'),
(5, 'Turnover', 20, 'benefit'),
(9, 'Umur', 10, 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan`
--

CREATE TABLE `pertandingan` (
  `id_pertandingan` int(25) NOT NULL,
  `ket_pertandingan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertandingan`
--

INSERT INTO `pertandingan` (`id_pertandingan`, `ket_pertandingan`) VALUES
(1, '1 - 3 match'),
(2, '4 - 7 match'),
(3, '8 - 10 match');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `ket_posisi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `ket_posisi`) VALUES
(1, 'Point Guard'),
(2, 'Shooting Guard'),
(3, 'Small Foward'),
(4, 'Power Foward'),
(5, 'Center');

-- --------------------------------------------------------

--
-- Table structure for table `turnover`
--

CREATE TABLE `turnover` (
  `id_to` int(11) NOT NULL,
  `ket_to` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turnover`
--

INSERT INTO `turnover` (`id_to`, `ket_to`) VALUES
(1, 'Melakukan >= 7 Kesalahan'),
(2, 'Melakukan <7 Kesalahan'),
(3, 'Melakukan <3 Kesalahan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bb_fmale`
--
ALTER TABLE `bb_fmale`
  ADD PRIMARY KEY (`no_bbf`),
  ADD UNIQUE KEY `id_bbf` (`id_bbf`);

--
-- Indexes for table `bb_male`
--
ALTER TABLE `bb_male`
  ADD PRIMARY KEY (`no_bbm`),
  ADD UNIQUE KEY `id_bbm` (`id_bbm`);

--
-- Indexes for table `evaluasi_hasil`
--
ALTER TABLE `evaluasi_hasil`
  ADD PRIMARY KEY (`id_eval`);

--
-- Indexes for table `fieldgoal`
--
ALTER TABLE `fieldgoal`
  ADD PRIMARY KEY (`id_fieldgoal`);

--
-- Indexes for table `fisik`
--
ALTER TABLE `fisik`
  ADD PRIMARY KEY (`id_fisik`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id_pertandingan`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indexes for table `turnover`
--
ALTER TABLE `turnover`
  ADD PRIMARY KEY (`id_to`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluasi_hasil`
--
ALTER TABLE `evaluasi_hasil`
  MODIFY `id_eval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `fieldgoal`
--
ALTER TABLE `fieldgoal`
  MODIFY `id_fieldgoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fisik`
--
ALTER TABLE `fisik`
  MODIFY `id_fisik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `id_pertandingan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `turnover`
--
ALTER TABLE `turnover`
  MODIFY `id_to` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
