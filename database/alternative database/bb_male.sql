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
-- Table structure for table `bb_male`
--

CREATE TABLE `bb_male` (
  `no_bbm` int(11) NOT NULL,
  `id_bbm` varchar(11) NOT NULL,
  `ket_bbm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_male`
--

INSERT INTO `bb_male` (`no_bbm`, `id_bbm`, `ket_bbm`) VALUES
(1, '< 54', 'Fin'),
(2, '54 - 58', 'Fly'),
(3, '59 - 62', 'Bantam'),
(4, '63 - 67', 'Feather'),
(5, '68 - 72', 'Light'),
(6, '73 - 78', 'Walter'),
(7, '79 - 84', 'Middle'),
(8, '> 85', 'Heavy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bb_male`
--
ALTER TABLE `bb_male`
  ADD PRIMARY KEY (`no_bbm`),
  ADD UNIQUE KEY `id_bbm` (`id_bbm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
