-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2019 pada 00.32
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_taekwondo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `ket_absensi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `ket_absensi`) VALUES
(1, '3 - 5 pertemuan'),
(2, '5 - 7 pertemuan'),
(3, '8 pertemuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_fmale`
--

CREATE TABLE `bb_fmale` (
  `no_bbf` varchar(11) NOT NULL,
  `id_bbf` varchar(11) NOT NULL,
  `ket_bbf` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_fmale`
--

INSERT INTO `bb_fmale` (`no_bbf`, `id_bbf`, `ket_bbf`) VALUES
('P1', '< 47', 'Fin'),
('P2', '48 - 51', 'Fly'),
('P3', '52 - 55', 'Bantam'),
('P4', '56 - 59', 'Feather'),
('P5', '60 - 63', 'Light'),
('P6', '64 - 67', 'Walter'),
('P7', '68 - 72', 'Middle'),
('P8', '> 72', 'Heavy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_male`
--

CREATE TABLE `bb_male` (
  `no_bbm` varchar(11) NOT NULL,
  `id_bbm` varchar(11) NOT NULL,
  `ket_bbm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_male`
--

INSERT INTO `bb_male` (`no_bbm`, `id_bbm`, `ket_bbm`) VALUES
('L1', '< 54', 'Fin'),
('L2', '54 - 58', 'Fly'),
('L3', '59 - 62', 'Bantam'),
('L4', '63 - 67', 'Feather'),
('L5', '68 - 72', 'Light'),
('L6', '73 - 78', 'Walter'),
('L7', '79 - 84', 'Middle'),
('L8', '> 85', 'Heavy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi_hasil`
--

CREATE TABLE `evaluasi_hasil` (
  `id_eval` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `id_absensi` int(11) NOT NULL,
  `bb` varchar(11) NOT NULL,
  `id_fisik` int(11) NOT NULL,
  `id_teknik` int(11) NOT NULL,
  `id_tc` int(11) NOT NULL,
  `jam_terbang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `evaluasi_hasil`
--

INSERT INTO `evaluasi_hasil` (`id_eval`, `nama`, `jk`, `id_absensi`, `bb`, `id_fisik`, `id_teknik`, `id_tc`, `jam_terbang`) VALUES
(7, 'Rafi Rusdi', 'L', 3, 'L2', 2, 3, 3, '3'),
(8, 'Ahmad Fayezi', 'L', 2, 'L2', 3, 2, 3, '10'),
(9, 'M. Vario Azhar', 'L', 3, 'L2', 1, 1, 2, '3'),
(10, 'Kamil Fahrezi', 'L', 1, 'L4', 2, 3, 2, '5'),
(11, 'Budi Hendrawan', 'L', 1, 'L3', 3, 3, 3, '12'),
(12, 'Nanda Pratiwi', 'P', 1, 'P3', 2, 3, 3, '6'),
(13, 'Aya Fataline', 'P', 2, 'P3', 1, 3, 2, '4'),
(14, 'Yuliana Dwi', 'P', 1, 'P3', 2, 1, 1, '2'),
(15, 'Diana Mutia', 'P', 2, 'P2', 2, 2, 2, '4'),
(16, 'Amelia Ane', 'P', 1, 'P2', 1, 3, 2, '6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fisik`
--

CREATE TABLE `fisik` (
  `id_fisik` int(11) NOT NULL,
  `ket_fisik` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fisik`
--

INSERT INTO `fisik` (`id_fisik`, `ket_fisik`) VALUES
(1, 'Meminta Izin 2 Kali Istirahat'),
(2, 'Meminta Izin 1 Kali Istirahat'),
(3, 'Tidak Pernah Izin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` tinyint(3) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` float NOT NULL,
  `attribute` set('benefit','cost') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `attribute`) VALUES
(1, 'Absensi', 25, 'benefit'),
(3, 'Fisik', 20, 'benefit'),
(4, 'Teknik', 20, 'benefit'),
(5, 'Training Club', 25, 'benefit'),
(9, 'Jam Terbang', 10, 'benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tclub`
--

CREATE TABLE `tclub` (
  `id_tc` int(11) NOT NULL,
  `ket_tc` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tclub`
--

INSERT INTO `tclub` (`id_tc`, `ket_tc`) VALUES
(1, 'Melakukan >= 7 Kesalahan'),
(2, 'Melakukan <7 Kesalahan'),
(3, 'Melakukan <3 Kesalahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknik`
--

CREATE TABLE `teknik` (
  `id_teknik` int(11) NOT NULL,
  `ket_teknik` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teknik`
--

INSERT INTO `teknik` (`id_teknik`, `ket_teknik`) VALUES
(1, '<= 49% Tepat Sasaran Target'),
(2, '50% - 75% Tepat Sasaran Target'),
(3, '76% - 100% Tepat Sasaran Target');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `bb_fmale`
--
ALTER TABLE `bb_fmale`
  ADD PRIMARY KEY (`no_bbf`),
  ADD UNIQUE KEY `id_bbf` (`id_bbf`);

--
-- Indeks untuk tabel `bb_male`
--
ALTER TABLE `bb_male`
  ADD PRIMARY KEY (`no_bbm`),
  ADD UNIQUE KEY `id_bbm` (`id_bbm`);

--
-- Indeks untuk tabel `evaluasi_hasil`
--
ALTER TABLE `evaluasi_hasil`
  ADD PRIMARY KEY (`id_eval`);

--
-- Indeks untuk tabel `fisik`
--
ALTER TABLE `fisik`
  ADD PRIMARY KEY (`id_fisik`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tclub`
--
ALTER TABLE `tclub`
  ADD PRIMARY KEY (`id_tc`);

--
-- Indeks untuk tabel `teknik`
--
ALTER TABLE `teknik`
  ADD PRIMARY KEY (`id_teknik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `evaluasi_hasil`
--
ALTER TABLE `evaluasi_hasil`
  MODIFY `id_eval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `fisik`
--
ALTER TABLE `fisik`
  MODIFY `id_fisik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tclub`
--
ALTER TABLE `tclub`
  MODIFY `id_tc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `teknik`
--
ALTER TABLE `teknik`
  MODIFY `id_teknik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
