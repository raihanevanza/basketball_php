-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2019 at 05:49 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `bb_fmale`
--

CREATE TABLE `bb_fmale` (
  `no_bbf` int(11) NOT NULL,
  `id_bbf` varchar(11) NOT NULL,
  `ket_bbf` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_fmale`
--

INSERT INTO `bb_fmale` (`no_bbf`, `id_bbf`, `ket_bbf`) VALUES
(1, '< 47', 'Fin'),
(2, '48 - 51', 'Fly'),
(3, '52 - 55', 'Bantam'),
(4, '56 - 59', 'Feather'),
(5, '60 - 63', 'Light'),
(6, '64 - 67', 'Walter'),
(7, '68 - 72', 'Middle'),
(8, '> 72', 'Heavy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bb_fmale`
--
ALTER TABLE `bb_fmale`
  ADD PRIMARY KEY (`no_bbf`),
  ADD UNIQUE KEY `id_bbf` (`id_bbf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
