-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Feb 2023 pada 08.29
-- Versi server: 10.5.18-MariaDB-cll-lve
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empf2183_survey`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `f_pengguna_sak_prop`
--

CREATE TABLE `f_pengguna_sak_prop` (
  `id_pengguna` int(11) NOT NULL,
  `usenama` varchar(50) NOT NULL,
  `paswod` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'pcl,pml,edt,pcl_pml,pcl_edt,pml_edt,kasos,admin',
  `fp` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `f_pengguna_sak_prop`
--

INSERT INTO `f_pengguna_sak_prop` (`id_pengguna`, `usenama`, `paswod`, `nama_lengkap`, `status`, `fp`, `email`) VALUES
(1, 'admin00', 'admin00', 'Admin Provinsi', 'sos', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `f_pengguna_sak_prop`
--
ALTER TABLE `f_pengguna_sak_prop`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `f_pengguna_sak_prop`
--
ALTER TABLE `f_pengguna_sak_prop`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
