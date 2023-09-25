-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Sep 2023 pada 03.07
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bps`
--

CREATE TABLE `bps` (
  `kodeBPS` int(4) NOT NULL,
  `namaBPS` varchar(32) DEFAULT NULL,
  `administratif` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bps`
--

INSERT INTO `bps` (`kodeBPS`, `namaBPS`, `administratif`) VALUES
(3400, 'BPS Provinsi DI Yogyakarta', 'Provinsi'),
(3401, 'BPS Kabupaten Kulon Progo', 'Kabupaten/Kota'),
(3402, 'BPS Kabupaten Bantul', 'Kabupaten/Kota'),
(3403, 'BPS Kabupaten Gunungkidul', 'Kabupaten/Kota'),
(3404, 'BPS Kabupaten Sleman', 'Kabupaten/Kota'),
(3471, 'BPS Kota Yogyakarta', 'Kabupaten/Kota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(4) NOT NULL,
  `judul_kegiatan` text,
  `tgl_start` datetime DEFAULT NULL,
  `tgl_end` datetime DEFAULT NULL,
  `progres_kegiatan` int(11) DEFAULT NULL,
  `id_tim_kerja` int(11) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `id_parent` int(3) NOT NULL COMMENT 'jika kegiatan utama = 0',
  `KodeBPS` int(4) NOT NULL,
  `time_update` datetime DEFAULT NULL,
  `last_user_update` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `judul_kegiatan`, `tgl_start`, `tgl_end`, `progres_kegiatan`, `id_tim_kerja`, `deskripsi_kegiatan`, `id_parent`, `KodeBPS`, `time_update`, `last_user_update`) VALUES
(27, 'SAKIP CERIA', '2023-09-30 00:00:00', '2024-10-07 00:00:00', 0, 13, ' ', 0, 3400, NULL, NULL),
(28, 'ceria1', '2023-09-13 00:00:00', '2023-09-13 00:00:00', 82, 13, '                                                                                                                                                                                                                                                                                                                                                                                                                         ', 27, 3400, '2023-09-20 15:45:00', 'Isdiyanto SST, M.T.'),
(31, 'ceria3', '2023-09-13 00:00:00', '2023-09-13 00:00:00', 53, 13, '<ol><li>&nbsp;Hampir Ceria</li><li>dikit lagi</li></ol>', 27, 3400, NULL, NULL),
(33, 'SOSIAL YES', '2022-09-14 00:00:00', '2022-09-16 00:00:00', 0, 3, ' ', 0, 3400, NULL, NULL),
(34, 'PERKANTORAN SUKSES', '2023-09-16 00:00:00', '2023-09-16 00:00:00', 0, 12, ' ', 0, 3400, NULL, NULL),
(35, 'rapat', '2023-09-14 00:00:00', '2023-09-16 00:00:00', 10, 3, ' ', 33, 3400, NULL, NULL),
(37, 'Rpat 15', '2023-09-15 00:00:00', '2023-09-15 00:00:00', 20, 3, ' ', 33, 3400, NULL, NULL),
(38, 'Jaya', '2023-09-14 00:00:00', '2023-09-14 00:00:00', 0, 1, ' ', 0, 3400, NULL, NULL),
(39, 'rapat', '2023-09-16 00:00:00', '2023-09-16 00:00:00', 0, 12, ' ', 34, 3400, NULL, NULL),
(40, 'rapat1', '2023-09-14 00:00:00', '2023-09-21 00:00:00', 0, 1, ' ', 0, 3400, NULL, NULL),
(41, 'HSN', '2023-10-01 00:00:00', '2023-10-31 00:00:00', 10, 1, ' ', 0, 3400, NULL, NULL),
(42, 'Rapat Pleno', '2023-10-01 00:00:00', '2023-10-03 00:00:00', 20, 1, '-Mulai Rapat', 41, 3400, NULL, NULL),
(43, 'Webinar ', '2023-10-11 00:00:00', '2023-10-14 00:00:00', 0, 1, ' ', 41, 3400, NULL, NULL),
(45, 'PERLOMBAAN HSN', '2023-09-23 00:00:00', '2023-09-25 00:00:00', 0, 7, ' ', 0, 3400, NULL, NULL),
(47, 'Rapat Pleno', '2023-09-23 00:00:00', '2023-09-23 00:00:00', 100, 7, '                                                                     ', 45, 3400, NULL, NULL),
(48, 'Lomba Donor Darah', '2023-09-23 00:00:00', '2023-09-23 00:00:00', 0, 7, ' ', 45, 3400, NULL, NULL),
(49, 'Lomba Balap Karung', '2023-09-24 00:00:00', '2023-09-24 00:00:00', 0, 7, ' ', 45, 3400, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `manajemenfile`
--

CREATE TABLE `manajemenfile` (
  `id_file` int(11) NOT NULL,
  `id_zperiode` int(3) NOT NULL,
  `id_team` int(3) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `kegiatan` char(200) NOT NULL,
  `nama_file` char(200) NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_parent` int(11) NOT NULL COMMENT '0 = kegiatan utama'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meetingreq`
--

CREATE TABLE `meetingreq` (
  `idm` int(11) NOT NULL,
  `perihal` text,
  `tgl_start` datetime DEFAULT NULL,
  `tgl_end` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=masih pesan, 1=approved, 2 =del/cancel',
  `tgl_pengajuan` date DEFAULT NULL,
  `oleh` int(11) DEFAULT NULL,
  `reply` text,
  `notulen` text,
  `namapengusul` varchar(50) DEFAULT NULL,
  `tgl_approve` date DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `nip_approve` int(11) DEFAULT NULL,
  `nama_approve` varchar(50) DEFAULT NULL,
  `keterangan` int(1) DEFAULT NULL COMMENT '0=online, 1=offline',
  `ruangan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meetingreq`
--

INSERT INTO `meetingreq` (`idm`, `perihal`, `tgl_start`, `tgl_end`, `status`, `tgl_pengajuan`, `oleh`, `reply`, `notulen`, `namapengusul`, `tgl_approve`, `jumlah_peserta`, `nip_approve`, `nama_approve`, `keterangan`, `ruangan`) VALUES
(1, 'Rapat Pegawai 1', '2023-08-31 07:30:00', '2023-08-31 08:00:00', 1, '2023-08-29', 340054255, 'gass', NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 2, 340054255, 'Isdiyanto SST, M.T.', 1, 'bima'),
(2, 'Rapat Pegawai 2', '2023-09-01 07:30:00', '2023-09-01 08:00:00', 1, '2023-08-29', 340054255, 'gass', NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 20, 340054255, 'Isdiyanto SST, M.T.', 1, 'pst'),
(3, 'Rapat Pegawai 10', '2023-08-31 07:30:00', '2023-08-31 16:00:00', 1, '2023-08-29', 340054255, 'gass', NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 20, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(4, 'Rapat Pegawai 11', '2023-08-29 18:30:00', '2023-08-29 20:00:00', 1, '2023-08-28', 340054255, 'gass ruang bima', NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 20, 340054255, 'Isdiyanto SST, M.T.', 1, 'bima'),
(5, 'Coba 1', '2023-08-30 07:30:00', '2023-08-30 16:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 12, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(6, 'Coba bima 1', '2023-08-30 07:30:00', '2023-08-30 16:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 15, 340054255, 'Isdiyanto SST, M.T.', 1, 'bima'),
(7, 'coba pst 1', '2023-08-31 10:30:00', '2023-08-31 16:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 12, 340054255, 'Isdiyanto SST, M.T.', 1, 'pst'),
(8, 'Contoh setelah topnav', '2023-09-01 07:30:00', '2023-09-01 16:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-30', 12, 340054255, 'Isdiyanto SST, M.T.', 1, 'pst'),
(9, 'Coba notulen', '2023-08-29 11:06:00', '2023-08-29 11:07:00', 1, '2023-08-29', 340054255, 'gas', '9_1693282232', 'Isdiyanto SST, M.T.', '2023-08-29', 2, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(10, 'Coba 2', '2023-08-30 17:30:00', '2023-08-30 18:00:00', 1, '2023-08-30', 340054255, 'asdas', NULL, 'Isdiyanto SST, M.T.', '2023-09-20', 23, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(11, 'Magang Mahasiswa Politeknik Statistika STIS', '2023-09-14 07:30:00', '2023-09-14 16:00:00', 2, '2023-08-30', 340054255, 'tes', NULL, 'Isdiyanto SST, M.T.', '2023-08-31', 10, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(12, 'Rapat1', '2023-09-15 07:30:00', '2023-09-15 16:00:00', 1, '2023-09-14', 1111, 'boleh', NULL, 'Muhammad Afnan Falieh, Otw. Str.Stat', '2023-09-14', 20, 1111, 'Muhammad Afnan Falieh, Otw. Str.Stat', 1, 'bima'),
(13, 'Coba', '2023-09-21 07:30:00', '2023-09-21 16:00:00', 0, '2023-09-20', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', NULL, 3, NULL, NULL, 1, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jabatan`
--

CREATE TABLE `m_jabatan` (
  `id_m_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(45) NOT NULL,
  `id_eselon_jabatan` int(1) NOT NULL,
  `id_satker_jabatan` int(3) NOT NULL,
  `id_jabatan_atasan` int(11) NOT NULL,
  `fungsional_jabatan` int(1) NOT NULL,
  `nama_fungsional` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jabatan`
--

INSERT INTO `m_jabatan` (`id_m_jabatan`, `nama_jabatan`, `id_eselon_jabatan`, `id_satker_jabatan`, `id_jabatan_atasan`, `fungsional_jabatan`, `nama_fungsional`) VALUES
(1, 'Kepala', 2, 1, 0, 2, NULL),
(2, 'Kepala', 3, 2, 1, 2, NULL),
(3, 'Ketua', 3, 3, 1, 1, 'Statistisi Ahli Madya  '),
(4, 'Ketua', 3, 4, 1, 1, 'Statistisi Ahli Madya'),
(5, 'Ketua', 3, 5, 1, 1, 'Statistisi Ahli Madya'),
(6, 'Ketua', 3, 6, 1, 1, 'Statistisi Ahli Madya'),
(7, 'Ketua', 3, 7, 1, 1, 'Pranata Komputer Ahli Madya'),
(8, 'Ketua', 4, 21, 2, 2, 'Analis Anggaran Ahli Muda'),
(9, 'Anggota', 5, 21, 8, 2, 'Pranata Kearsipan'),
(10, 'Anggota', 5, 21, 8, 2, 'Peny. Bahan Perencanaan Anggaran'),
(11, 'Ketua', 4, 22, 2, 2, 'Analis Sumber Daya Manusia Aparatur Ahli Muda'),
(12, 'Anggota', 5, 22, 11, 2, 'Penyuluh Hukum Pertama'),
(13, 'Anggota', 5, 22, 11, 2, 'Pengolah Data'),
(14, 'Anggota', 5, 22, 11, 2, 'Peny. Bahan Perencanaan Anggaran'),
(15, 'Anggota', 5, 22, 11, 2, 'Pranata Sumber Daya Manusia Aparatur Mahir'),
(16, 'Ketua', 4, 23, 2, 2, 'Analis Pengelolaan Keuangan APBN Ahli Muda'),
(17, 'Anggota', 5, 23, 16, 2, 'Bendahara Penerimaan'),
(18, 'Anggota', 5, 23, 16, 2, 'Pranata Keuangan APBN Mahir'),
(19, 'Anggota', 5, 23, 16, 2, 'Penatausaha Keuangan'),
(20, 'Anggota', 5, 23, 16, 2, 'Analis Pengelolaan Keuangan APBN Ahli Muda'),
(21, 'Anggota', 5, 23, 16, 2, 'Verifikator Keuangan'),
(22, 'Anggota', 5, 23, 16, 2, 'Pengadministrasian Umum'),
(23, 'Ketua', 4, 24, 2, 2, ' Arsiparis Ahli Muda'),
(24, 'Anggota', 5, 24, 23, 2, 'Pangadministrasian Umum'),
(25, 'Anggota', 5, 24, 23, 2, 'Pengadministrasian Umum'),
(26, 'Anggota', 5, 24, 23, 2, 'Pangadministrasian Umum'),
(27, 'Anggota', 5, 24, 23, 2, 'Arsiparis Pelaksana'),
(28, 'Anggota', 5, 24, 23, 2, 'Pangadministrasian Umum'),
(29, 'Anggota', 5, 24, 23, 2, 'Penatausaha Penyimpanan Barang'),
(30, 'Anggota', 5, 24, 2, 2, 'Pengelola Pengadaan Barang dan Jasa Ahli Muda '),
(31, 'Anggota', 5, 25, 30, 2, 'Peny. Bahan Perencanaan Anggaran'),
(32, 'Anggota', 5, 3, 3, 1, 'Statistisi Muda'),
(33, 'Anggota', 5, 31, 32, 1, 'Statistisi Pertama'),
(34, 'Anggota', 5, 3, 3, 1, 'Statistisi Muda'),
(35, 'Anggota', 5, 3, 3, 1, 'Statistisi Muda'),
(36, 'Anggota', 5, 32, 34, 1, 'Statistisi Muda'),
(37, 'Anggota', 5, 3, 3, 1, 'Statistisi Muda'),
(38, 'Ketua', 3, 74, 1, 1, 'Statistisi Madya'),
(39, 'Anggota', 5, 33, 37, 1, 'Statistisi Muda'),
(40, 'Anggota', 5, 33, 37, 1, 'Statistisi Muda'),
(41, 'Ketua', 3, 41, 1, 1, 'Statistisi Madya'),
(42, 'Anggota', 5, 41, 41, 1, 'Statistisi Muda'),
(43, 'Anggota', 5, 41, 41, 1, 'Statistisi Muda'),
(44, 'Anggota', 5, 41, 41, 1, 'Statistisi Muda'),
(45, 'Anggota', 5, 41, 41, 1, 'Statistisi Muda'),
(46, 'Anggota', 5, 41, 41, 1, 'Statistisi Muda'),
(47, 'Anggota', 5, 41, 41, 1, 'Statistisi Muda'),
(48, 'Anggota', 5, 5, 5, 1, 'Statistisi Muda'),
(49, 'Anggota', 5, 5, 5, 1, 'Statistisi Muda'),
(50, 'Anggota', 5, 5, 5, 1, 'Statistisi Muda'),
(51, 'Ketua', 5, 5, 5, 1, 'Statistisi Muda'),
(52, 'Anggota', 5, 52, 51, 1, 'Statistisi Madya'),
(53, 'Anggota', 5, 52, 51, 1, 'Statistisi Muda'),
(54, 'Anggota', 5, 5, 5, 1, 'Statistisi Muda'),
(55, 'Anggota', 5, 53, 54, 1, 'Statistisi Penyelia '),
(56, 'Anggota', 5, 5, 5, 1, 'Statistisi Muda'),
(57, 'Anggota', 5, 6, 6, 1, 'Statistisi Muda'),
(58, 'Anggota', 5, 6, 6, 1, 'Statistisi Muda'),
(59, 'Anggota', 5, 6, 6, 1, 'Statistisi Pelaksana Lanjutan'),
(60, 'Anggota', 5, 6, 6, 1, 'Statistisi Muda'),
(61, 'Anggota', 5, 6, 6, 1, 'Pengolah Data'),
(62, 'Ketua', 3, 63, 1, 1, NULL),
(63, 'Anggota', 5, 6, 6, 1, 'Statistisi Madya'),
(64, 'Anggota', 5, 63, 62, 1, 'Statistisi Muda'),
(65, 'Ketua', 5, 71, 7, 1, 'Pranata Komputer Muda'),
(66, 'Anggota', 5, 71, 100, 1, 'Statistisi Pertama'),
(67, 'Anggota', 5, 71, 100, 1, 'Statistisi Muda'),
(68, 'Anggota', 5, 71, 100, 1, 'Pranata Komputer Muda'),
(69, 'Anggota', 5, 71, 100, 1, 'Statistisi Muda'),
(70, 'Anggota', 5, 71, 100, 1, 'Pranata Komputer Muda'),
(71, 'Ketua', 4, 73, 7, 1, 'Statistisi Muda '),
(72, 'Anggota', 5, 73, 71, 1, 'Statistisi Muda'),
(73, 'Anggota', 5, 73, 71, 1, 'Pranata Komputer Pertama'),
(74, 'Anggota', 5, 73, 71, 1, 'Statistisi Madya'),
(75, 'Anggota', 5, 73, 71, 1, 'Pranata Komputer Muda'),
(76, 'Anggota', 5, 6, 6, 1, 'Statistisi Muda'),
(77, 'Anggota', 5, 42, 44, 1, 'Statistisi Madya'),
(78, 'Anggota', 5, 3, 3, 1, 'Statistisi Muda'),
(79, 'Anggota', 5, 24, 23, 2, 'Pengelola Surat'),
(80, 'Anggota', 5, 24, 23, 2, 'Teknisi Pemeliharaan Sarana dan Prasarana'),
(81, 'Anggota', 5, 23, 16, 2, 'Penata Laporan Keuangan'),
(82, 'Anggota', 5, 24, 23, 2, 'Penata Laksana Barang Mahir'),
(83, 'Anggota', 5, 24, 23, 2, 'Pranata Kearsipan'),
(84, 'Anggota', 5, 73, 71, 1, 'Statistisi Pertama'),
(85, 'Anggota', 5, 24, 23, 2, 'Pengelola Barang Milik Negara'),
(86, 'Anggota', 5, 21, 8, 2, 'Pengolah Data'),
(87, 'Anggota', 5, 6, 6, 1, 'Statistisi Pertama'),
(88, 'Anggota', 5, 22, 11, 2, 'Analis Kepegawaian Muda'),
(89, 'Anggota', 5, 21, 8, 2, 'Pengolah Data'),
(90, 'Ketua', 3, 8, 1, 1, 'Statistisi Utama'),
(91, 'Anggota', 5, 6, 6, 1, 'Statistisi Pertama'),
(92, 'Anggota', 5, 5, 5, 1, 'Statistisi Pertama'),
(93, 'Anggota', 5, 3, 3, 1, 'Pengolah Data'),
(94, 'Anggota', 5, 24, 23, 2, 'Pengelola Pengadaan Barang dan Jasa Ahli Pertama'),
(95, 'Anggota', 5, 23, 16, 2, 'Pranata Keuangan APBN Terampil'),
(96, 'Staf Neraca Wilayah & Analisis', 5, 6, 6, 1, 'Pengolah Data'),
(97, 'Anggota', 5, 75, 112, 2, 'Statistisi Pertama'),
(98, 'Anggota', 5, 41, 41, 1, 'Statistisi Pertama'),
(99, 'Anggota', 5, 6, 6, 1, 'Statistisi Pertama'),
(100, 'Ketua', 3, 71, 1, 1, 'Pranata Komputer Ahli Madya'),
(101, 'Anggota', 5, 71, 100, 1, 'Pengolah Data'),
(102, 'Anggota', 5, 24, 23, 2, 'Pengelola Pengadaan Barang dan Jasa Ahli Pertama'),
(103, 'Anggota', 5, 24, 23, 2, 'Arsiparis Pelaksana Lanjutan'),
(104, 'Anggota', 5, 24, 23, 2, 'Pranata Kearsipan'),
(105, 'Anggota', 5, 23, 16, 2, 'Pengolah Data'),
(106, 'Anggota', 5, 23, 16, 2, 'Pranata Keuangan APBN Terampil'),
(107, 'Anggota', 5, 23, 16, 2, 'Pranata Kearsipan'),
(108, 'Anggota', 5, 22, 11, 2, 'Asessor Sumber Daya Manusia Aparatur Ahli Muda'),
(109, 'Anggota', 5, 21, 8, 2, 'Analis Anggaran Ahli Pertama'),
(110, 'Anggota', 5, 2, 11, 2, 'Tugas Belajar'),
(112, 'Ketua', 3, 75, 1, 1, ''),
(113, 'Anggota', 5, 23, 16, 2, 'APK APBN  Pertama'),
(114, 'Anggota', 5, 71, 100, 1, 'Pranata Komputer Muda'),
(115, 'Anggota', 5, 75, 112, 2, 'Pranata Humas Pertama'),
(116, 'Anggota', 5, 21, 8, 2, 'Analis Anggaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(10) UNSIGNED NOT NULL,
  `nama_peg` varchar(100) NOT NULL DEFAULT '',
  `nip` varchar(25) NOT NULL DEFAULT '',
  `nip_lama` varchar(10) DEFAULT NULL,
  `pangkat` varchar(50) NOT NULL,
  `gol` varchar(45) NOT NULL DEFAULT '',
  `level_user` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `usenama` varchar(45) NOT NULL DEFAULT '',
  `paswod` varchar(100) NOT NULL DEFAULT '',
  `status_peg` int(1) NOT NULL,
  `id_m_jabatan` int(11) DEFAULT NULL,
  `id_m_jab_satu` int(11) DEFAULT NULL,
  `id_m_jab_dua` int(11) DEFAULT NULL,
  `id_m_jab_tiga` int(11) DEFAULT NULL,
  `linkkuesioner` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_peg`, `nip`, `nip_lama`, `pangkat`, `gol`, `level_user`, `usenama`, `paswod`, `status_peg`, `id_m_jabatan`, `id_m_jab_satu`, `id_m_jab_dua`, `id_m_jab_tiga`, `linkkuesioner`) VALUES
(1, 'Johanes De Britto Priyono, M.Sc', '19590916 198501 1 001', NULL, 'Pembina Utama Madya', 'IV/d', 0, '195909161985011001', 'ccd38db51c7fe0e015a40453c3a54704', 0, 1, NULL, NULL, NULL, NULL),
(2, 'Rahmawati, SE, MA', '19671231 199202 2 001', '340013059', 'Pembina Tk.I', 'IV/b', 0, '196712311992022001', '5d1b1df10e63abafd05ae4bae7dc3690', 1, 41, 2, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1nA__BAXniauTMeZvVKfCnpa9mxpLX5tThA3ud5o0GmA/edit?usp=share_link'),
(3, 'Soman Wisnu Darma, S.Si, MT', '19721207 199412 1 001', '340015030', 'Pembina', 'IV/a', 0, '197212071994121001', '3a2128aeb1af841250f1aadd321e1693', 1, 3, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1brnGeToHqcG3uy0DnNcBdE_DvdPWv7lo1ZHJ9Txo0as/edit?usp=share_link'),
(4, 'Muhammad Lausepa, SE, MM', '19650422 199203 1 004', '340013160', 'Pembina Tk.I', 'IV/b', 0, '196504221992031004', 'bee645071a89725b55e9c5c28294e481', 0, 2, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/15CnxSDRTsNzmaI01WPs1vqhF9DxrPwamo1LN8_Cc4a0/edit?usp=share_link'),
(5, 'Arjuliwondo, S.Si', '19650722 198802 1 001', NULL, 'Pembina', 'IV/a', 0, '196507221988021001', 'd79070886c5f8cff9ac8db0814d46662', 0, 5, NULL, NULL, NULL, NULL),
(6, 'Mainil Asni, SE, ME', '19670524 199202 2 001', '340013077', 'Pembina Tk.I', 'IV/b', 0, '196705241992022001', 'b201c74803cbfabbf5d9b824fd64e1b4', 0, 6, NULL, NULL, NULL, NULL),
(7, 'Sugeng Waluyo, S.Si, MM', '19620426 198601 1 001', '340011243', 'Pembina Tk.I', 'IV/b', 0, '196204261986011001', '1d024807f4abf90b38c23ba58b82feee', 0, 7, NULL, NULL, NULL, NULL),
(8, 'Drs. A.Lilik Sulistyanto', '19671206 199212 1 001', '340013416', 'Pembina', 'IV/a', 0, '196712061992121001', 'f97a1ef6639d1919472c0272a373c11a', 1, 30, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1rQ1MHYA3aME5DwpDwJW50vCibmL9ITgSnBxwQtYIABM/edit?usp=share_link'),
(9, 'Galuh Widyastuti, SST', '19841106 200801 2 004', '340020202', 'Penata', 'III/c', 0, '198411062008012004', 'cc06894378c40c925a2949bd08fdc51e', 1, 72, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1-4ieFB94hoU81yg0rzc1CSNKnHDS3h5UYdFb0TWI-To/edit?usp=share_link'),
(10, 'Istato Hudayana, S.ST', '19841014 200701 1 001', '340019107', 'Penata Tk.I', 'III/d', 0, '198410142007011001', '011311475a4c6e6aba81e28b3b593310', 1, 61, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1WKjdRLQI1HwMc--w2ClUbhrR-8vUBp4PYaaq59xbC3I/edit?usp=share_link'),
(11, 'Sri Mulyani, SE, MM', '19691220 198903 2 001', '340012182', 'Penata Tk.I', 'III/d', 0, '196912201989032001', '0dd7a76503521da414a0d6d67ed10ffe', 1, 16, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1-CDlJ9YkIKqEOYAdFNADkJUthXYL4viRHEP_lelLTqM/edit?usp=share_link'),
(12, 'Bayu Sulistomo, SH., M.Hum', '19820111 201101 1 012', '340055086', 'Penata Muda Tk.I', 'III/b', 0, '198201112011011012', '6af833bde68cfba793233c3587b82fa2', 1, 23, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1-cDWW18M8c4RHmrWR1qS9NhG8boyaWSG7cE8CJKcme8/edit?usp=share_link'),
(13, 'Ismiyati', '19741215 199402 2 001', '340014482', 'Penata Muda Tk.I', 'III/b', 2, '197412151994022001', '708b5eab4563775725cd03582c0c8dc1', 1, 13, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1n9Cy20XhwJj914_N3yaiK3pRfvS2sU4gzo8JG4Q_OqI/edit?usp=share_link'),
(14, 'Nining Purwani, S.TP', '19721030 200003 2 002', '080128419 ', 'Penata Tk.I', 'III/d', 0, '197210302000032002', '8051bb4103926979b5ab86290386260a', 1, 9, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1UkdX709uFxgyDUXWbPHhowr1gXwvxzQ3HAbiiteHM0w/edit?usp=share_link'),
(15, 'Nur Shaleh Fathoni, S.Psi', '19880812 201101 1 013', '340055089', 'Penata Muda Tk.I', 'III/b', 2, '198808122011011013', 'a4389cb34e7120a5ffe42caf7412eaf7', 1, 108, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1BJSVxs3Hacm_bJWC3GYQToEQtS1VO6wAIXtLybKufyQ/edit?usp=share_link'),
(16, 'Petronela Sinlae', '19600119 197912 2 001', NULL, 'Penata Tk.I', 'III/d', 0, '196001191979122001', '04e2224124e94bb1b42566a1aa61422f', 0, 16, NULL, NULL, NULL, NULL),
(17, 'Trisia Agustiana, SE', '19710808 199401 2 001', NULL, 'Penata Tk.I', 'III/d', 0, '197108081994012001', '56207023d2bf380eddc323d6020bb690', 0, 17, NULL, NULL, NULL, NULL),
(18, 'Maisaroh Yeni Rahmatika, SE', '19850601 200902 2 016', '340051215', 'Penata Muda', 'III/a', 0, '198506012009022016', '3d27a66c5b4562a5ce2dfbf030b0bc05', 1, 18, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1Alblk0tuLj14vcClvuJWNXtjlYSMlkIteSebMOxBx8c/edit?usp=share_link'),
(19, 'Cucu Yunaningsih, S.Akt', '19840626 200902 2 012', '340051071', 'Penata Muda', 'III/a', 0, '198406262009022012', 'a113ee0300e94c2b64e670d92f0e371a', 1, 106, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1pVbQ8ZGPXP_O3_AgLFkt3E44niRjeWNy5gXL9cMUXFQ/edit?usp=share_link'),
(20, 'Ika Yuniati, SE', '19870518 200604 2 005', '340017939', 'Penata Muda Tk.I', 'III/b', 0, '198705182006042005', 'a8b8ba4dd005b0264f84061f77877ab1', 1, 20, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/14EKeFVQPiA-DymxdP9Eh2LNCXZkv7CLnV0Q38pbq2Wk/edit?usp=share_link'),
(21, 'Siswi Novia Damayanti, A.Md', '19791105 200502 2 002', '340017644', 'Penata Muda Tk.I', 'III/b', 0, '197911052005022002', '3c6241f4407df7a0c66bc6cf58d6fcb1', 1, 21, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/17yMdCyVIPaNK6-VsMvtuvQYHW5YTt_rFSr-RN68mhl0/edit?usp=share_link'),
(22, 'Surana', '19601221 198703 1 005', NULL, 'Penata Muda', 'III/a', 0, '196012211987031005', '0c26e5a8b954c36d91118c8cd6650839', 0, 22, NULL, NULL, NULL, NULL),
(23, 'Dra. Eli Sundari', '19670512 199401 2 001', '340014141', 'Penata Tk.I', 'III/d', 0, '196705121994012001', '3a01d0b0b0dcc45c924bb8092a22034f', 1, 8, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1Hiwd1iBGORSx_I9tjoMb8-RQi1_oLqYZlQU2vKBQs_Y/edit?usp=share_link'),
(24, 'Agung Haryanto', '19751214 200710 1 001', '340020530', 'Pengatur Muda Tk.I', 'II/b', 0, '197512142007101001', 'aaeac31f40e506b4c492421915d05ede', 1, 80, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1IBazruFowtkHDCofQcZ5ZgIfLYywExda0gQYecR68e4/edit?usp=sharing'),
(25, 'Dwi Rahayu', '19690313 199003 2 004', '340012404', 'Penata Muda Tk.I', 'III/b', 0, '196903131990032004', '3c6cf618f9dcc02987f261f1b2f058f9', 1, 79, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1Q7ONbhDu6cQk-0JYq6migP3dOnW2NC3xmWNpSoT1qY8/edit?usp=share_link'),
(26, 'Heru Anjar Sutopo', '19640917 200701 1 002', '340019790', 'Pengatur Muda Tk.I', 'II/b', 0, '196409172007011002', '563046ba58635a700892b3d2f01e4f8b', 0, 22, NULL, NULL, NULL, NULL),
(27, 'Ranny Widiasti, A.Md', '19850204 201101 2 011', '340055090', 'Pengatur Tk.I', 'II/d', 0, '198502042011012011', '2a1ff347a86ef7b193ea3c5a2b42f6fb', 1, 27, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1MAdVPbKlYrJ5U_rTK7kh6tqcry7k4-nLV_IythfZz-8/edit?usp=share_link'),
(28, 'Veronica Sri Sumaryani', '19631031 198503 2 004', '340010931', 'Penata Muda Tk.I', 'III/b', 0, '196310311985032004', 'daac58ec0134150d2b256221d087b8ad', 0, 28, NULL, NULL, NULL, NULL),
(29, 'Ismei Fatman, S.M', '19820510 201101 1 008', '340055087', 'Pengatur Tk.I', 'II/d', 0, '198205102011011008', '767fc8a206add775c98d4859753aa81c', 1, 82, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/18GXinqnjPWJ9YrbS08IyGnOTA_VlkxTugr3x1HCYMJg/edit?usp=share_link'),
(30, 'Heriyanta, SH, MM', '19610818 198203 1 003', NULL, 'Pembina', 'IV/a', 0, '196108181982031003', '506b9f6b47b5348a610b90c3599112a4', 0, 30, NULL, NULL, NULL, NULL),
(31, 'Cicilia Widyasari, SE', '19840331 200604 2 003', '340018359', 'Penata Muda Tk.I', 'III/b', 0, '198403312006042003', 'c163ed0efe4cfecec7ad2b3549621280', 1, 83, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1ZqvG58b0coxs1yueLR_1KHdQxONXVrCS3TnLdtgt6rM/edit?usp=share_link'),
(32, 'Jafar Nawawi A, S.Si, M.Si', '19670502 199003 1 003', '340012568', 'Pembina', 'IV/a', 0, '196705021990031003', 'b3efb690555572e510da25e0a6e10477', 1, 37, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1LKdIwW_TaeUSCkMha7uX1g7f6-fW9K6UD2b0T6jwffQ/edit?usp=share_link'),
(33, 'Fredy Tjekden, SST, M.Si', '19790713 200012 1 001', NULL, 'Penata Tk.I', 'III/d', 0, '197907132000121001', '287e53eef58298b087587da6ad674eae', 0, 33, NULL, NULL, NULL, NULL),
(34, 'Alwan Fauzani', '19700815 199412 1 001', '340015029', 'Penata Tk.I', 'III/d', 0, '197008151994121001', '98ad30a389963daae188e8db4efc0f28', 1, 34, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1NgAD1PROGG0Z37iXrE7Cz6AjdmqCB4P6hTuexwEY-DA/edit?usp=share_link'),
(35, 'Hardana, SH', '19630301 198503 1 011', '340010929', 'Penata Tk.I', 'III/d', 0, '196303011985031011', '2584646858d43d75ebf57ca81091d543', 0, 35, NULL, NULL, NULL, NULL),
(36, 'Istanti, S.Si, M.Ec.Dev', '19770522 200212 2 002', '340016828', 'Penata Tk.I', 'III/d', 0, '197705222002122002', '53c6d8b5e498e30490d44e44742be9ff', 0, 36, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1U9dhFN80JlDt6T8kR_skuufXplz_8ZdIR1XcoKWpnuo/edit?usp=share_link'),
(37, 'Ir. Suparna, M.Si', '19690329 199401 1 001', '340014134', 'Pembina', 'IV/a', 0, '196903291994011001', '80c5aeadc431e13e8526e1f9bbc9bda1', 1, 4, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1PC3PxNqNXXleKy8Wqg4NqYwdgSpzsL_-IZkneMiTNKU/edit?usp=share_link'),
(38, 'Agung Wibowo, SST, M.IDEC', '19770507 200012 1 002', '340016133', 'Pembina', 'IV/a', 0, '197705072000121002', 'f5debb556b8ceb7d752be7ad394135aa', 1, 38, 3, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1lfRUr_EZ-qjypG0sUXkRoWmKVwR1e24EVw8M-X3etxc/edit?usp=share_link'),
(39, 'Nur Latifah hanum, SST', '19840311 200701 2 001', '340019188', 'Penata', 'III/c', 3, '198403112007012001', '26e1098929462848cd0e4ecc5a262e5a', 1, 78, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/10QxpSJiYH4BG0rmbbAh65lymDKbfEZcxR1K5kZSciWc/edit?usp=share_link'),
(40, 'Ir. Tutik Endari', '19631107 199402 2 001', '340014492', 'Penata Tk.I', 'III/d', 0, '196311071994022001', '6209a6a1e3dac818f50ab1e5c9ee57ee', 0, 78, NULL, NULL, NULL, NULL),
(41, 'Joko Prayitno, S.Si, MSE', '19740807 199512 1 001', '340015164', 'Pembina', 'IV/a', 0, '197408071995121001', '033eab357f95b1be6725272bf409fd9c', 0, 41, NULL, NULL, NULL, NULL),
(42, 'Ciptaning Yodya Dian Pratiwi, SST', '19810414 200312 2 002', '340017080', 'Penata Tk.I', 'III/d', 0, '198104142003122002', '767b3ac61908dec2b1647efbfd749272', 1, 42, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1X2r1VTfh5fK41h8ZJQEfGi0k40R_eIMgz4D93ZcZXcY/edit?usp=sharing'),
(43, 'Harin Ihtian, S.Si, M.M', '19770927 199901 2 001', '340015729', 'Penata Tk.I', 'III/d', 0, '197709271999012001', '0ee82c5a49cff64f353287690bfa0021', 1, 42, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1_VUTeZzqwY5P50dSVlJmBr_f5xZOjoFpfQ49upo_5fw/edit?usp=share_link'),
(44, 'Winarti, SE, MM', '19730406 199402 2 005', '340014484', 'Penata', 'III/c', 4, '197304061994022005', 'ec64335f5da401e5a5240641f9691676', 1, 43, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1KfWTuqDO-VScGtDs80imjruVe5SY-vDHLBivLRtUgXQ/edit?usp=share_link'),
(45, 'Kairol Amin, S.ST, M.Si', '19720717 199512 1 001', '340015167', 'Penata Tk.I', 'III/d', 0, '197207171995121001', '8d264c62b62e924af308edabef193e4f', 1, 44, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1eIhoBgtTrop-xcbw2VuvmvG4GLBbOYnx-hoz1uIKvHs/edit?usp=share_link'),
(46, 'Sri Kuncoro Damayanti, S.ST, M.Ec.Dev', '19790606 199912 2 001', '340015976', 'Penata Tk.I', 'III/d', 0, '197906061999122001', '4daaa2b61c8526c31b6714e7326d7bb7', 0, 45, NULL, NULL, NULL, NULL),
(47, 'Agus Paryadi Sumaryoko, SE', '19600816 198202 1 001', NULL, 'Penata Tk.I', 'III/d', 0, '196008161982021001', '3d85b85ceb94b469b9e469a51842a18b', 0, 46, NULL, NULL, NULL, NULL),
(48, 'Widiatmoko, SST, SE, MA', '19810906 200312 1 002', '340016974', 'Penata Tk.I', 'III/d', 0, '198109062003121002', '67a9d5107266eea6b08c3881938b2875', 1, 47, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1Wo1Yg1GrvPTq3f2sO4nX6m8MFe7rQulHxseGTDgiG80/edit?usp=share_link'),
(49, 'Agus Priyanto, S.Si, MM', '19660819 199003 1 003', '340012566', 'Pembina', 'IV/a', 0, '196608191990031003', 'b10aa0f8275249fa07ce4584c2b36c58', 1, 48, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1wD2CefPiIeKSNYuBwXlVBxHhda_PeC6-zIzaMwYlvBs/edit?usp=share_link'),
(50, 'Sugiarti, S.Si', '19720626 200212 2 001', NULL, 'Penata Tk.I', 'III/d', 0, '197206262002122001', '209cfcb053e6ee5b2a76f4f9f7be6753', 0, 49, NULL, NULL, NULL, NULL),
(51, 'Jenny Marwaty, SST', '19770312 199912 2 001', '340016059', 'Penata Tk.I', 'III/d', 0, '197703121999122001', 'da365b19ab231d33c59e8ed97b1f4baf', 1, 50, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1EjiMwQO5_DrpQWdxDGxgX4PK3k1LgESYq2NigD3eMmo/edit?usp=share_link'),
(52, 'Chatarina Budi Anggarini, SST', '19690429 198902 2 001', '340012122', 'Pembina', 'IV/a', 0, '196904291989022001', 'd4be8f8a70dae859211cb76b3261c631', 1, 51, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1CerYWC-fPMS2S-MtSWd4HBDwv2CTeso8Nv8pnIYzAEU/edit?usp=sharing'),
(53, 'Sudiyana, SE, MM', '19710420 199403 1 005', '340014675', 'Pembina', 'IV/a', 0, '197104201994031005', 'bf2983fa9b763caa48bd284cdec556e3', 1, 5, 112, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1o72tevTn1jeqrkf7XYszbJz_nyAHZ14xfIa4tSUBWQ0/edit?usp=share_link'),
(54, 'Dita Andian, SE', '19801116 200212 2 002', '340016587', 'Penata ', 'III/c', 0, '198011162002122002', '5277bc8328c61768994ff3c0825ccc1a', 0, 53, NULL, NULL, NULL, NULL),
(55, 'Santi Wijayanti, S.Si', '19730111 199412 2 001', '340015014', 'Penata Tk.I', 'III/d', 0, '197301111994122001', '3a244a7a5a6eb0a4d9241c23a32917c1', 1, 54, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1ERUwlfoA3_D_Tl9UST7MKUlI2i9LDmVMLlC_fGQPiSc/edit?usp=share_link'),
(56, 'Triana Setyaningsih, SE', '19750526 199402 2 001', NULL, 'Penata Tk.I', 'III/d', 0, '197505261994022001', '47a6122e92416ad8f3c6618b0a3eecb9', 0, 55, NULL, NULL, NULL, NULL),
(57, 'Nur Mujib, SST', '19770405 199912 1 002', '340015977', 'Penata Tk.I', 'III/d', 5, '197704051999121002', '91c2f2536f075f766fc50d1fd919de79', 1, 56, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1vfJHgTZXCOyxP7p4JSoSvDXzMj7HQWITzbFJK6T9Cmo/edit?usp=share_link'),
(58, 'Dr. Ir. Kusriatmi, MP', '19681109 199401 2 001', '340014133', 'Pembina Tk.I', 'IV/b', 0, '196811091994012001', '904df925a04a717a37d552a1d1afce35', 1, 6, 62, NULL, NULL, 'https://docs.google.com/spreadsheets/d/15GxkOCKGEinfRlv5Tml9mesGpFtG5L7VGlr8A9Ctri0/edit?usp=share_link'),
(59, 'Meitri Pafrida, S.Si, M.Ec.Dev', '19780512 199912 2 001', '340015960', 'Penata ', 'III/c', 0, '197805121999122001', 'af2fd166ddb0be2760bb80c3d9e58022', 1, 58, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1dvMqJAGYGJxuqNHWl4nODpEjXSizN219kVJADPA2dOI/edit?usp=share_link'),
(60, 'Nurita', '19620915 198503 2 005', '131459568', 'Penata Muda Tk.I', 'III/b', 0, '196209151985032005', '0ca4a244325e469515bee70f73e63040', 0, 59, NULL, NULL, NULL, NULL),
(61, 'Anda Triyanto, S.Si, M.Si', '19701027 199211 1 001', '340013381', 'Pembina', 'IV/a', 0, '197010271992111001', 'f8d0965e5f6da024c98b21e8c119b7f3', 1, 60, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1XbPo5K1aNLtx2Vr1QWy_uIr-fYfzR5dcnVwwV02scOU/edit?usp=share_link'),
(62, 'Fitri Puji Astuti, SST, MM', '19790828 200012 2 002', '340016192', 'Penata Tk.I', 'III/d', 6, '197908282000122002', 'da32cc61a4867b6f94f113aee323bf12', 1, 99, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1a4G2c4mD77qE-dYJRBTH1wU5yXvM1tUe9RF7nd0_vNY/edit?usp=share_link'),
(63, 'Mutijo, S.Si, M.Si', '19700324 199211 1 001', '340013348', 'Pembina', 'IV/a', 0, '197003241992111001', 'a6b3779bee88dc09a10ddb28b5fe0acb', 0, 62, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1nx95qIGvxiZU4AV9I_b8wlR8bHGBtA7o9xv9hxOxpAs/edit?usp=share_link'),
(64, 'Gita Oktavia, S.Si', '19631028 198601 2 001', NULL, 'Pembina', 'IV/a', 0, '196310281986012001', '8a7394559d698ac75ee4b29999d2bae8', 0, 63, NULL, NULL, NULL, NULL),
(65, 'Waluyo, SST, SE, M.Si', '19771004 199912 1 001', '340015974', 'Penata Tk.I', 'III/d', 0, '197710041999121001', '8c8df22505e45e6faa9c46fe46757ac6', 0, 64, NULL, NULL, NULL, NULL),
(66, 'Mohamad Ardi Kintono, SST, M.Si', '19761112 199912 1 001', '340015973', 'Penata Tk.I', 'III/d', 0, 'kinton', 'b12c3f4b14e5182b387a8eea9f2838b2', 1, 100, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1Jz-9ZbjnZMa-3coh46gNc-eGmbea68r-dBLCqx_cV8U/edit?usp=share_link'),
(67, 'Helida Nurcahayani, SST, M.Si', '19840511 200701 2 004', '340019189', 'Penata', 'III/c', 0, '198405112007012004', '5a820618d21714749e53043b7fda967c', 1, 114, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1Px8Px1TXwn570po2sU4BDZmojdlCU0WGqSbLq1-S7IU/edit?usp=share_link'),
(68, 'Ristiningsih, SST', '19811226 200412 2 001', '340017362', 'Penata Tk.I', 'III/d', 0, '198112262004122001', '9dbf71a5c958ddec739242a26514e56d', 1, 67, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1cLIS8l_6bfBSrWX9SgZrQqZBV9GniffNh5cz8h86rb8/edit?usp=share_link'),
(69, 'Sudarmadi, SST, MM', '19651213 198603 1 003', '340011269', 'Pembina', 'IV/a', 0, 'sudarmadi', 'e514e5465f1aa44de7e031bd51465454', 1, 68, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1JD7nUtB-WjcVTSCt6DlVVlZwn2FWvAkkN-hFWNYoUiY/edit?usp=share_link'),
(70, 'Andriana Nurmahmud, SST, S.Si, MPA', '19761118 199712 1 001', NULL, 'Penata Tk.I', 'III/d', 0, '197611181997121001', 'bdc8a77f55c2582ef1f339d3ba492308', 0, 69, NULL, NULL, NULL, NULL),
(71, 'Sularmi, S.Si', '19840421 201101 2 019', '340054406', 'Penata Muda Tk.I', 'III/b', 0, '198404212011012019', 'c3c4f24f2ce93ac0d3bb50feca86ed3d', 1, 70, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/15QU2uTgR_iG9y6BE0Gt0poJIdzGnr6OuORIJLhjKkl8/edit?usp=share_link'),
(72, 'Dra. Riniarti, MM', '19660811 199212 2 001', '340013427', 'Pembina', 'IV/a', 10, '196608111992122001', '51ba1aa9c6eaa9db511a69dae323f8ef', 1, 11, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1MHoLokeyGW04wxeWnYZY1ThpDvkN71Tf8ALtn90IOa0/edit?usp=share_link'),
(73, 'Istiari Yuniati, SE', '19610605 198302 2 003', NULL, 'Penata Tk.I', 'III/d', 0, '196106051983022003', '7ae24e63c6454b63be96ca8217e43a69', 0, 72, NULL, NULL, NULL, NULL),
(74, 'Mohammad Heru Widodo, S.Mn, MM', '19740425 199402 1 001', '340014483', 'Penata Muda Tk.I', 'III/b', 0, 'widodo', 'aab2cb014452e2cf1491600a9490bf26', 1, 75, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1cBwFwBYGApnxHh-RGVB1lsI3BmbmLjoqszkBkVyQrno/edit?usp=share_link'),
(75, 'Buhari Muslim, SST', '198004162003121004', '340017085', 'Penata Tk.I', 'III/d', 0, '198004162003121004', 'ba16579282a16b08f8ee03a4d4dcd4b2', 0, 71, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1NhMjtQ4h69KBqemivfKaFhey5TsnoFQfQgwi5K3JbzU/edit?usp=share_link'),
(76, 'Isdiyanto, SST, MT', '19880213 201012 1 005', '340054255', 'Penata Muda Tk.I', 'III/b', 10, 'isdi', '56259398d1b9c39eb87bfa5f1d689d0c', 1, 66, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/172_4slVrvyA6P_mGIu_NzsAg_joU8eY0ae4a3YcnCF4/edit?usp=share_link'),
(77, 'Eep Saripudin, SST. M.Ec.Dev', '19720704 199512 1 001', NULL, 'Pembina', 'IV/a', 0, '197207041995121001', '35062c585a6c9705e1ee9fe444154bb6', 0, 42, NULL, NULL, NULL, NULL),
(78, 'Vidya Hayuningtyas SST', '19880908 201012 2 007', '340054276', 'Penata Tingkat I', 'III/d', 0, '198809082010122007', '983efe93dff661300b0e053916e5f09e', 1, 98, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1m-nUYkpqLc1JRcs1qBb9k_JiZTwK4UfcM2rWSaRNnAc/edit?usp=share_link'),
(79, 'Amirudin S.Si, MMSI', '19630416 198702 1 001', '340011679', 'Pembina', 'IV/a', 0, '196304161987021001', '3e40161b360c26a0f6f2c81421286611', 0, 5, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1VYjXyIAC1B-ye-k_JSY7bPB6zwrdkf9BX8ZYFHkdX3g/edit?usp=share_link'),
(80, 'Hentiek Puspitawati SST, M.Si', '19801127 200312 2 002', '340017073 ', 'Pembina', 'IV/a', 0, '198011272003122002', '2f4c740c77192af1bf1c8b4179116769', 0, 74, NULL, NULL, NULL, NULL),
(81, 'Dwijo Suwanto SST', '19810115 200312 1 002', '340017045', 'Penata Tk.I', 'III/d', 0, '198101152003121002', 'f76b82e7c48c74057600e418f7076891', 1, 69, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1ckg4sGcbBC6gPfMd9ClIUs-IN_dXfy27xuP7Epln36A/edit?usp=share_link'),
(82, 'Siti Maysaroh SST, M.Si.', '19830311 200701 2 005', '340019273', 'Penata Tk.I', 'III/d', 0, '198303112007012005', '18aa06f34c24b6ee8431cac53174063f', 1, 76, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1tlCBJo6ABaGC3jRK5zSgx_q6oXzKr8bWemHOa_voLIU/edit?usp=share_link'),
(83, 'Rachmawati SST.,MM', '19750319 199612 2 001', '340015378', 'Pembina', 'IV/a', 0, '197503191996122001', '42e9dd36b78bfe69529ac24c68c90124', 1, 46, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1N60LIYUj-U97Q03gI192x0X_FTdov0n9-9ej1tDm3hs/edit?usp=share_link'),
(84, 'Purwaningtiyas Kurnia Sari S.Si., M.Ec.Dev.', '19851212 200902 2 010', '340051266', 'Penata Tk.I', 'III/d', 0, '198512122009022010', '345f72052f4ef79c0f1f9af57f649589', 1, 56, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1hPD8Oh4rtg8humofBiaIMaUKWJb2rZfZc1pxGcVAB2E/edit?usp=share_link'),
(85, 'Handani Murda, S.Si. M.S.E.', '19751220 199901 1 001', '340015746', 'Pembina', 'IV/a', 0, '197512201999011001', '5392c89b73d98adc0f1cbb3ac8f6b964', 1, 32, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/15BYhirYLSBIwRDZT57uM1PuE51LPZR1gXOURRzLPX8g/edit?usp=share_link'),
(86, 'Novi Fitriani SE', '19871109 200902 2 005', '340051247', 'Penata', 'III/c', 0, '198711092009022005', 'd7efb650763efed9d9a0f3ee81e69d6a', 0, 110, NULL, NULL, NULL, NULL),
(87, 'Muhamad Fuad Hasan SST', '19850927 200801 1 005', '340020243', 'Penata Tk.I', 'III/d', 0, '198509272008011005', '0b97448389f3d6dfb734854a89465c7d', 1, 49, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1d7cOqET5hOrcz3Wvjt32XeE_nMbxxymm1zElcoZUucU/edit?usp=share_link'),
(88, 'Diah Trijayanti SE.,M.Sc', '19851003 201101 2009', '340054372', 'Penata', 'III/c', 0, '198510032011012009', 'e6e43cea96c9ca1ec213ac62eabbfb57', 1, 109, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1M0dPaUO6XvaZ0nB7ul6pqtb4FJCq8v12kF0HkQdKi1c/edit?usp=share_link'),
(89, 'Dr. Heru Margono M.Sc', '19610214 198312 1 001', '340010731', 'Pembina Utama Madya', 'IV/d', 0, '196102141983121001', '7c650289b0a8c714e776b39c5f5697fa', 0, 1, NULL, NULL, NULL, NULL),
(90, 'Eni Nuraeni SST', '19890315 201211 2 001', '340055778', 'Penata Muda Tk.I', 'III/b', 0, 'eni', '3a0ff15003337925c119dadf6c388ad1', 1, 84, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1xY6Im-_ftz7Cha5NtBkkRCHeQIPnOFajrwig9DDBHtg/edit?usp=share_link'),
(91, 'Wiwit Cahyani A.P.Kb.N.', '20000701 201912 2 002', '340059943', 'Pengatur Muda', 'II/a', 0, '200007012019122002', 'c21bba2e456ec77d65eabf9befaa0fb9', 1, 105, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1JnDwIvgn4HV2sZpJmQmoRMreLJFS2uaVOO8sikK1N7Y/edit?usp=share_link'),
(92, 'Lastiyono S.Si., MM', '19740503 199512 1 001', '340015168', 'Pembina', 'IV/a', 0, '197405031995121001', 'e4987369e42429f6d0b8fa3d379df5e5', 1, 43, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1fsIeXVTujt3gzZJDEZVh8-0v2OX1vwv7cPxC9E9z4ag/edit?usp=share_link'),
(93, 'Sujiartono S.Akt., M.Acc', '19860820 200902 1 006', '340051333', 'Penata Muda Tk.I', 'III/b', 0, '198608202009021006', 'f8a6490d367c056d2a302ba7bd3c1a6e', 1, 104, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/12q5yLYSDLTCrQAFhwi7qLjrDZaUOV6Kvka4jvmQapVY/edit?usp=share_link'),
(94, 'Fathonah Tri Hastuti SST., MT.', '19860804 200902 2 006', '340050089 ', 'Penata', 'III/c', 0, '198608042009022006', '2f7d3a23a0e6e2aa3a41f88d57a1e3a4', 1, 45, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1zjf-90cFNJg7gxhoLLQdEQh2YD8Aw75xFqg4zfkoCJQ/edit?usp=share_link'),
(95, 'Nuri Fitri Purnama Sari SST', '19930303 201602 2 001', '340057528 ', 'Penata Muda', 'III/a', 0, '199303032016022001', '7138dad65836382121e04f9a51c59e8d', 0, 110, NULL, NULL, NULL, NULL),
(96, 'Agung Gumilar Triyanto SST, M.Si.', '197711071999121001', '340015993', 'Pembina', 'IV/a', 0, '197711071999121001', '3a98946f86f31a27c2b19c9e41888d29', 1, 7, 71, NULL, NULL, 'https://docs.google.com/spreadsheets/d/14BsQbKxASPSQnYQoyltyAD_uKksc1wV3x49FFkaGtVY/edit?usp=sharing'),
(97, 'Sugeng Arianto M.Si.', '19680531 199003 1 003', '340012565', 'Pembina Utama Madya', 'IV/d', 0, '196805311990031003', '17323a2fbb277047771cc648582cbceb', 0, 1, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/10YtO5CiWgc0o145bgaqr4Si4emlSBrwb1MaT6pMV1Tw/edit?usp=share_link'),
(98, 'Sudaryono SST', '19781007 200012 1 002', '340016149', 'Penata Tk.I', 'III/d', 0, '197810072000121002', '6161c26ca7f505e1546d7515fd3e4102', 0, 86, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1H1hcBACsIzMbZDFbzXv__JlKbPph6ntPmgCtkSDJBEk/edit?usp=share_link'),
(99, 'Anwar Prihadi, S.Psi', '19770804 201101 1 005', '340054672', 'penata', 'III/c', 0, '197708042011011005', '12f0b7d8f2840643424a79295a9c574f', 1, 15, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/15jBlFu-Ens4jdSnkcs-XhngFqpDgqDHs7Cn9FeIv0FE/edit?usp=share_link'),
(100, 'Arif Widyadarma SST., M.Eng.', '19831114 200602 1 002', '340017889', '-', '-', 0, '198311142006021002', '2ec66b1cc83fac96d87f97aae37e894c', 1, 35, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/12BWPnRw32J88gOvf53KOmVwq5UNVvqa64X0tWHZM3I4/edit?usp=share_link'),
(101, 'Nur Hidayati SST, M.Sc', '19880305 201012 2 005', '340054347', 'Penata Muda Tk.I', 'III/b', 0, '198803052010122005', '22f48ec23dd281a9e7a7169a1e04ffa3', 1, 87, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1ov8-WpXBPBDDo1r-LV29xH8uXxON8eao14QT8DtjTUQ/edit?usp=share_link'),
(102, 'Asih Setyowati, S.Si.,MM.', '19710523 199412 2 001', '340015072', 'Pembina', 'IV/a', 0, '197105231994122001', '7df72eee34b5c07f629feb370a9c9f60', 1, 57, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1J3U7tB3Fg2W9H0xOrOjUFtjWh4dYVQu9He1-rin7XxE/edit?usp=share_link'),
(103, 'Rifka Rahman Hakim, S.Psi, M.Si', '19831106 201003 1 002', '340053449', 'Penata Tk. I', 'III/d', 0, '198311062010031002', 'ab71dca149cfba1c2a87b35803debde4', 1, 88, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/17-295fxbeuDXT6AEli3hAVGW43T8_gbZvZ9q0wBKYwk/edit?usp=share_link'),
(104, 'Achmad Basuki Adibrata, SE, M.Acc', '19841113 200902 1 001', '340051005', 'Penata', 'III/c', 0, '198411132009021001', 'f94758c2f0618c7d9b16fd28b2d2a4e8', 0, 89, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/14TiQH-3pIarGATq7F6qma-ajzUZID06Ro6wdLb_NaiQ/edit?usp=sharing'),
(105, 'Cahyawati Mandala Sari SST', '19920404 201412 2 001', '340057014', 'Penata Muda Tk.I', 'III/b', 0, '199204042014122001', 'aaaa2f7e5684d8e51d810110afb58222', 1, 91, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1jnnVN1fYg9MWi9KxqAZy-WOKMcvPVBEP-HCOkCc4wVo/edit?usp=share_link'),
(106, 'Sentot Bangun Widoyono M.A.', '19610904 198302 1 001', '340010093', 'Pembina Utama Madya', 'IV/d', 0, '196109041983021001', '879156ae511c2f93e02ca0c837ffb79b', 1, 90, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1EUc928fVJsSWc_ojV65vFwSrlnynVbtdyYaFzYcs-cQ/edit?usp=share_link'),
(107, 'Evi Wahyu Pratiwi SST, M.Stat', '19891106 201012 2 001', '340054085', 'penata', 'III/c', 0, '198911062010122001', '63fa56821b25dbcc4278b7b43e0078ba', 1, 93, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1K_06NBSvXqwQ4CgMMIkwDtuk3n2ZBWgeGJepwimyKr4/edit?usp=share_link'),
(108, 'Ahmad Nur Fajri SST', '19891213 201211 1 001', '340055716', 'Penata', 'III/c', 0, '198912132012111001', 'fd9280bc68d29f9becaaa62fc86bcbe8', 1, 92, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1GW4SMGGic7bLcTbHrZW1nAfUqztV5FuRKifKUuKCyGA/edit?usp=share_link'),
(109, 'Tri Mulyani Widia Ningsih A.Md.', '19861228 201212 2 002', '340056055', 'Penata Muda', 'III/a', 0, '198612282012122002', 'a2124e224163c150d85879d47adb2383', 0, 95, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1ds3i_4zquhBgXhW_-Bqn6Z5zCwtWDvglWxYyTnj4HAY/edit?usp=share_link'),
(110, 'Anisa Eka Puridewi S.Stat.', '19960413  201903 2 001', '340059222', 'Penata Muda', 'III/a', 0, '199604132019032001', 'b6cde9dbba04e6a7afca4f77f62f8a0d', 1, 103, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1rzcoPAK3BvW1hnyrgDTELMwhOykOi1oOkR1-u5HNIxY/edit?usp=share_link'),
(111, 'Arsyad Dyan Prasetyo S.E.', '19931230 202203 1 012', '340061197', '-', '-', 0, '199312302022031012', '2958b6f3aa6927356e0e2c2f6dc4af2f', 1, 94, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1rAcbTKj4gpigEkQaXKbXhRKB96oGoiDwxTjURduK_zo/edit?usp=share_link'),
(112, 'Irwan Sutisna SST, M.Sc, M.Econ.', '198612222010121006', '340054317', 'Penata', 'III/c', 0, '198612222010121006', '43710398679e678a97c993a6e172bf81', 1, 96, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1iAaJw3dcQiqIRfR960YHPKakUuR-fJkmZJrNsfZJdX0/edit?usp=share_link'),
(113, 'Andi Ismoro SE, M.M', '197903032006041004', '340018500', 'Penata Muda', 'III/b', 0, '197903032006041004', 'ffc863f87ab75cfbab2bb07ac4e7ab53', 1, 97, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1Wh-WcC6aRN6oNYEDn5r7J15MMaRnTH8Bu1mHYe9Rt2M/edit?usp=share_link'),
(114, 'Iangrea Mustikane Bumi SST', '199305152016022001', '340057420', 'Penata Muda Tk.I', 'III/b', 0, '199305152016022001', 'dd7d5e356f70e6e5540a4ed7fe38eb3e', 1, 73, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/1XuWmWP3kUBr7Vyin_2VLJjp1D0fgnqsG8S73V9dtlM4/edit?usp=share_link'),
(115, 'Restianingsih Trisnawati', '19851105 200902 2 007', '340051284', 'penata muda tingkat 1', 'III/b', 0, '198511052009022007', 'a57dc4b81c905b998c4155c639e3c2ab', 1, 102, NULL, NULL, NULL, NULL),
(116, 'Jujuk Rudati', '19820601 201101 2 006', '340054383', 'Penata Muda Tingkat 1', 'III/b', 0, '198206012011012006', 'f31de923ea972e5ee7c2af34944d1c9c', 1, 107, NULL, NULL, NULL, NULL),
(117, 'Hasri Nurul Latifah A.Md.Ak.', '200105192023022001', '340062267', 'Pengatur', 'II/c', 0, '200105192023022001', 'f35134d4f1c6f633a88cc347f046baeb', 1, 106, NULL, NULL, NULL, NULL),
(118, 'Ir. Herum Fajarwati M.M', '196506111991032001', '340012847', 'Pembina Utama Madya', 'IV/d', 0, '196506111991032001', '34424d6b635d59bb09cdab681bb98e29', 1, 1, NULL, NULL, NULL, NULL),
(119, 'Suriadi S.Hut', '197810042003121003', '340017189', '-', '-', 0, '197810042003121003', '1e3e7574fbf95603a14bb0c6e67e0114', 1, 98, NULL, NULL, NULL, NULL),
(120, 'Djuwita Permatasari S.Stat, M.Ak.', '198708272009022007', '340051095', '-', '-', 0, '198708272009022007', '0148a0283109f31ba9c39469ce84c7eb', 1, 113, NULL, NULL, NULL, NULL),
(121, 'Hernowo Prasojo S.I. Kom', '199508012023211005', '340062280', 'PPK', 'IX', 0, '199508012023211005', '819b875dd4bf02c2f228c1484f5b1476', 1, 115, NULL, NULL, NULL, NULL),
(122, 'Achmad Johan Affandi S.Si, M.E', '19800622 200902 1 004', '340051007', 'Penata Tk.I', 'III/d', 0, '198006222009021004', '39306d46227c93bb535942fcfb4fc5ef', 1, 116, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai_kabkota`
--

CREATE TABLE `pegawai_kabkota` (
  `id_pegawai_kabkota` int(11) NOT NULL,
  `nama_pegawai_kabkota` varchar(100) NOT NULL,
  `nip_lama_pegawai_kabkota` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai_kabkota`
--

INSERT INTO `pegawai_kabkota` (`id_pegawai_kabkota`, `nama_pegawai_kabkota`, `nip_lama_pegawai_kabkota`) VALUES
(6, 'Muhammad Afnan Falieh, Otw. Str.Stat', '340024494'),
(8, 'USER BIASA', '1234567');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapatteam`
--

CREATE TABLE `rapatteam` (
  `idr` int(20) NOT NULL,
  `id_zteam` int(50) DEFAULT NULL,
  `nip_pengusul` int(50) DEFAULT NULL,
  `nama_pengusul` varchar(200) DEFAULT NULL,
  `mulai_rapat` datetime(6) DEFAULT NULL,
  `akhir_rapat` datetime(6) DEFAULT NULL,
  `jml_peserta` int(200) DEFAULT NULL,
  `topik` char(255) DEFAULT NULL,
  `notulen` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rapatteam`
--

INSERT INTO `rapatteam` (`idr`, `id_zteam`, `nip_pengusul`, `nama_pengusul`, `mulai_rapat`, `akhir_rapat`, `jml_peserta`, `topik`, `notulen`) VALUES
(1, 11, 340014482, 'Ismiyati', '2023-06-30 08:00:00.000000', '2023-06-30 09:00:00.000000', 10, 'Rapat perkembangan ST', '1_1688956439'),
(2, 11, 340015729, 'Harin Ihtian, S.Si, M.M', '2023-06-30 09:00:00.000000', '0000-00-00 00:00:00.000000', 7, 'Progress Produk peternakan', NULL),
(3, 7, 340012182, 'Sri Mulyani', '2023-06-30 10:00:00.000000', '2023-06-30 11:00:00.000000', 32, 'Pengadaan fasilitas pengolahan', '3_1687832380'),
(4, 7, 340017365, 'Ristiningsih, SST.', '2023-06-30 14:00:00.000000', '2023-06-30 15:00:00.000000', 11, 'Penjadwalan olah data sensus', '4_1687832948'),
(5, 10, 340015977, 'Nur Mujib, SST.', '2023-07-01 09:00:00.000000', '2023-07-01 10:00:00.000000', 8, 'Regulasi Anggar ST', '5_1688956565'),
(6, 11, 340012568, 'Jafar Nawawi A, S.Si, M.Si', '2023-07-01 10:00:00.000000', '2023-07-01 11:00:00.000000', 7, 'Pembahasan regulasi Kebijakan mitra                      kehutanan', NULL),
(7, 14, 340015960, 'Meitri Pafrida, S.Si, M.Ec.Dev.', '2023-07-01 13:30:00.000000', '2023-07-01 14:30:00.000000', 20, 'Sosialisasi mitra ST', '7_1687832290'),
(8, 10, 340013427, 'Dra. Riniarti', '2023-07-04 09:00:00.000000', '2023-07-04 11:00:00.000000', 12, 'Pembahasan kegiatan 17 Agustus', '8_1692929896'),
(9, 7, 340019189, 'Helida Nurcahayani, SST, M.Si.', '2023-07-05 09:00:00.000000', '2023-07-05 12:00:00.000000', 11, 'Pengadaan fasilitas olah data', '9_1687834379');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'RUANG BIMA'),
(2, 'RUANG PST'),
(3, 'RUANG ARJUNA'),
(4, 'RUANG KABID IPDS'),
(5, 'RUANG KABID NWAS'),
(6, 'RUANG KABID SOSIAL'),
(7, 'RUANG KABID PRODUKSI'),
(8, 'RUANG KABID DISTRIBUSI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_kerja`
--

CREATE TABLE `tim_kerja` (
  `id_team` int(3) NOT NULL,
  `nama_tim_kerja` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tim_kerja`
--

INSERT INTO `tim_kerja` (`id_team`, `nama_tim_kerja`) VALUES
(1, 'Analisis Statistik dan Penjaminan Kualitas'),
(2, 'Neraca Regional'),
(3, 'Statistik Sosial'),
(4, 'Statistik Distribusi'),
(5, 'Statistik Produksi'),
(6, 'Sensus Pertanian & Statistik Perikanan, Pertanian dan Kehutanan (SP2K)'),
(7, 'Pengolahan dan TIK'),
(8, 'Diseminasi Statistik'),
(9, 'Pembinaan dan Pelaksanaan Statistik Sektoral'),
(10, 'Perencanaan dan Administrasi Keuangan'),
(11, 'Manajemen SDM dan Hukum'),
(12, 'Fasilitasi Operasional Perkantoran'),
(13, 'SAKIP'),
(14, 'Humas & Unit Kerja Pimpinan'),
(15, 'Zona Integritas dan Reformasi Birokrasi'),
(16, 'Kolaborasi Mengawal Perubahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userapp`
--

CREATE TABLE `userapp` (
  `ida` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `namaU` text,
  `super_admin` int(1) NOT NULL,
  `admin_zoom` int(1) NOT NULL DEFAULT '0',
  `admin_pst` int(1) NOT NULL DEFAULT '0',
  `admin_tim_kerja_prov` int(1) NOT NULL,
  `admin_tim_kerja_kabkota` int(1) NOT NULL,
  `kepala_prov` int(1) NOT NULL,
  `kepala_kabkota` int(1) NOT NULL,
  `ketua_tim_kerja_prov` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `userapp`
--

INSERT INTO `userapp` (`ida`, `nip`, `namaU`, `super_admin`, `admin_zoom`, `admin_pst`, `admin_tim_kerja_prov`, `admin_tim_kerja_kabkota`, `kepala_prov`, `kepala_kabkota`, `ketua_tim_kerja_prov`) VALUES
(11, '340013059', 'Rahmawati, SE, MA', 0, 0, 1, 0, 1, 0, 0, 0),
(12, '340015030', 'Soman Wisnu Darma, S.Si, MT', 0, 1, 0, 1, 0, 0, 0, 0),
(13, '340013416', 'Drs. A.Lilik Sulistyanto', 0, 0, 1, 0, 0, 0, 1, 0),
(14, '340020202', 'Galuh Widyastuti, SST', 0, 0, 0, 0, 0, 0, 1, 0),
(15, '340019107', 'Istato Hudayana, S.ST', 0, 0, 0, 0, 0, 0, 0, 0),
(16, '340012182', 'Sri Mulyani, SE, MM', 0, 0, 0, 0, 0, 1, 0, 0),
(17, '340055086', 'Bayu Sulistomo, SH., M.Hum', 0, 0, 0, 0, 0, 0, 1, 0),
(18, '340014482', 'Ismiyati', 0, 0, 0, 0, 1, 0, 0, 0),
(19, '80128419', 'Nining Purwani, S.TP', 0, 0, 0, 0, 0, 0, 0, 0),
(20, '340055089', 'Nur Shaleh Fathoni, S.Psi', 0, 0, 0, 0, 0, 0, 0, 0),
(21, '340051215', 'Maisaroh Yeni Rahmatika, SE', 0, 0, 0, 0, 0, 0, 0, 0),
(22, '340051071', 'Cucu Yunaningsih, S.Akt', 0, 0, 0, 0, 0, 0, 0, 0),
(23, '340017939', 'Ika Yuniati, SE', 0, 0, 0, 0, 0, 0, 0, 0),
(24, '340017644', 'Siswi Novia Damayanti, A.Md', 0, 0, 0, 0, 0, 0, 0, 0),
(25, '340014141', 'Dra. Eli Sundari', 0, 0, 0, 0, 0, 0, 0, 0),
(26, '340020530', 'Agung Haryanto', 0, 0, 0, 0, 0, 0, 0, 0),
(27, '340012404', 'Dwi Rahayu', 0, 0, 0, 0, 0, 0, 0, 0),
(28, '340055090', 'Ranny Widiasti, A.Md', 0, 0, 0, 0, 0, 0, 0, 0),
(29, '340055087', 'Ismei Fatman, S.M', 0, 0, 0, 0, 0, 0, 0, 0),
(30, '340018359', 'Cicilia Widyasari, SE', 0, 0, 0, 0, 0, 0, 0, 0),
(31, '340012568', 'Jafar Nawawi A, S.Si, M.Si', 0, 0, 0, 0, 0, 0, 0, 0),
(32, '340015029', 'Alwan Fauzani', 0, 0, 0, 0, 0, 0, 0, 0),
(33, '340014134', 'Ir. Suparna, M.Si', 0, 0, 0, 0, 0, 0, 0, 0),
(34, '340016133', 'Agung Wibowo, SST, M.IDEC', 0, 0, 0, 0, 0, 0, 0, 0),
(35, '340019188', 'Nur Latifah hanum, SST', 0, 0, 0, 0, 0, 0, 0, 0),
(36, '340017080', 'Ciptaning Yodya Dian Pratiwi, SST', 0, 0, 0, 0, 0, 0, 0, 0),
(37, '340015729', 'Harin Ihtian, S.Si, M.M', 0, 0, 0, 0, 0, 0, 0, 0),
(38, '340014484', 'Winarti, SE, MM', 0, 0, 0, 0, 0, 0, 0, 0),
(39, '340015167', 'Kairol Amin, S.ST, M.Si', 0, 0, 0, 0, 0, 0, 0, 0),
(40, '340016974', 'Widiatmoko, SST, SE, MA', 0, 0, 0, 0, 0, 0, 0, 0),
(41, '340012566', 'Agus Priyanto, S.Si, MM', 0, 0, 0, 0, 0, 0, 0, 0),
(42, '340016059', 'Jenny Marwaty, SST', 0, 0, 0, 0, 0, 0, 0, 0),
(43, '340012122', 'Chatarina Budi Anggarini, SST', 0, 0, 0, 0, 0, 0, 0, 0),
(44, '340014675', 'Sudiyana, SE, MM', 0, 0, 0, 0, 0, 0, 0, 0),
(45, '340015014', 'Santi Wijayanti, S.Si', 0, 0, 0, 0, 0, 0, 0, 0),
(46, '340015977', 'Nur Mujib, SST', 0, 0, 0, 0, 0, 0, 0, 0),
(47, '340014133', 'Dr. Ir. Kusriatmi, MP', 0, 0, 0, 0, 0, 0, 0, 0),
(48, '340015960', 'Meitri Pafrida, S.Si, M.Ec.Dev', 0, 0, 0, 0, 0, 0, 0, 0),
(49, '340013381', 'Anda Triyanto, S.Si, M.Si', 0, 0, 0, 0, 0, 0, 0, 0),
(50, '340016192', 'Fitri Puji Astuti, SST, MM', 0, 0, 0, 0, 0, 0, 0, 0),
(51, '340015973', 'Mohamad Ardi Kintono, SST, M.Si', 0, 0, 0, 0, 0, 0, 0, 0),
(52, '340019189', 'Helida Nurcahayani, SST, M.Si', 0, 0, 0, 0, 0, 0, 0, 0),
(53, '340017362', 'Ristiningsih, SST', 0, 0, 0, 0, 0, 0, 0, 0),
(54, '340011269', 'Sudarmadi, SST, MM', 0, 1, 0, 0, 0, 0, 0, 0),
(55, '340054406', 'Sularmi, S.Si', 0, 1, 0, 0, 0, 0, 0, 0),
(56, '340013427', 'Dra. Riniarti, MM', 0, 0, 0, 0, 0, 0, 0, 0),
(57, '340014483', 'Mohammad Heru Widodo, S.Mn, MM', 0, 0, 0, 0, 0, 0, 0, 0),
(58, '340054255', 'Isdiyanto, SST, MT', 0, 1, 0, 0, 0, 0, 0, 0),
(59, '340054276', 'Vidya Hayuningtyas SST', 0, 0, 0, 0, 0, 0, 0, 0),
(60, '340017045', 'Dwijo Suwanto SST', 0, 1, 0, 0, 0, 0, 0, 0),
(61, '340019273', 'Siti Maysaroh SST, M.Si.', 0, 0, 0, 0, 0, 0, 0, 0),
(62, '340015378', 'Rachmawati SST.,MM', 0, 0, 0, 0, 0, 0, 0, 0),
(63, '340051266', 'Purwaningtiyas Kurnia Sari S.Si., M.Ec.Dev.', 0, 0, 0, 0, 0, 0, 0, 0),
(64, '340015746', 'Handani Murda, S.Si. M.S.E.', 0, 0, 0, 0, 0, 0, 0, 0),
(65, '340020243', 'Muhamad Fuad Hasan SST', 0, 0, 0, 0, 0, 0, 0, 0),
(66, '340054372', 'Diah Trijayanti SE.,M.Sc', 0, 0, 0, 0, 0, 0, 0, 0),
(67, '340055778', 'Eni Nuraeni SST', 0, 0, 0, 0, 0, 0, 0, 0),
(68, '340059943', 'Wiwit Cahyani A.P.Kb.N.', 0, 0, 0, 0, 0, 0, 0, 0),
(69, '340015168', 'Lastiyono S.Si., MM', 0, 0, 0, 0, 0, 0, 0, 0),
(70, '340051333', 'Sujiartono S.Akt., M.Acc', 0, 0, 0, 0, 0, 0, 0, 0),
(71, '340050089', 'Fathonah Tri Hastuti SST., MT.', 0, 0, 0, 0, 0, 0, 0, 0),
(72, '340015993', 'Agung Gumilar Triyanto SST, M.Si.', 0, 0, 0, 0, 0, 0, 0, 0),
(73, '340016149', 'Sudaryono SST', 0, 0, 0, 0, 0, 0, 0, 0),
(74, '340054672', 'Anwar Prihadi, S.Psi', 0, 0, 0, 0, 0, 0, 0, 0),
(75, '340017889', 'Arif Widyadarma SST., M.Eng.', 0, 0, 0, 0, 0, 0, 0, 0),
(76, '340054347', 'Nur Hidayati SST, M.Sc', 0, 0, 0, 0, 0, 0, 0, 0),
(77, '340015072', 'Asih Setyowati, S.Si.,MM.', 0, 0, 0, 0, 0, 0, 0, 0),
(78, '340053449', 'Rifka Rahman Hakim, S.Psi, M.Si', 0, 0, 0, 0, 0, 0, 0, 0),
(79, '340051005', 'Achmad Basuki Adibrata, SE, M.Acc', 0, 0, 0, 0, 0, 0, 0, 0),
(80, '340057014', 'Cahyawati Mandala Sari SST', 0, 0, 0, 0, 0, 0, 0, 0),
(81, '340010093', 'Sentot Bangun Widoyono M.A.', 0, 0, 0, 0, 0, 0, 0, 0),
(82, '340054085', 'Evi Wahyu Pratiwi SST, M.Stat', 0, 0, 0, 0, 0, 0, 0, 0),
(83, '340055716', 'Ahmad Nur Fajri SST', 0, 0, 0, 0, 0, 0, 0, 0),
(84, '340056055', 'Tri Mulyani Widia Ningsih A.Md.', 0, 0, 0, 0, 0, 0, 0, 0),
(85, '340059222', 'Anisa Eka Puridewi S.Stat.', 0, 0, 0, 0, 0, 0, 0, 0),
(86, '340061197', 'Arsyad Dyan Prasetyo S.E.', 0, 0, 0, 0, 0, 0, 0, 0),
(87, '340054317', 'Irwan Sutisna SST, M.Sc, M.Econ.', 0, 0, 0, 0, 0, 0, 0, 0),
(88, '340018500', 'Andi Ismoro SE, M.M', 0, 0, 0, 0, 0, 0, 0, 0),
(89, '340057420', 'Iangrea Mustikane Bumi SST', 0, 0, 0, 0, 0, 0, 0, 0),
(90, '340051284', 'Restianingsih Trisnawati', 0, 0, 0, 0, 0, 0, 0, 0),
(91, '340054383', 'Jujuk Rudati', 0, 0, 0, 0, 0, 0, 0, 0),
(92, '340062267', 'Hasri Nurul Latifah A.Md.Ak.', 0, 0, 0, 0, 0, 0, 0, 0),
(93, '340012847', 'Ir. Herum Fajarwati M.M', 0, 0, 0, 0, 0, 1, 0, 0),
(94, '123455', 'Rahmawati Budi, SE, MA', 0, 0, 0, 0, 0, 0, 0, 0),
(95, '222011494', 'Muhammad Afnan Falieh, Otw. Str.Stat', 1, 0, 0, 1, 0, 1, 1, 1),
(96, '6666', 'Muhammad Afnan Falieh, Otw. Str.Stat', 0, 0, 0, 0, 0, 0, 0, 0),
(97, '1111', 'Muhammad Afnan Falieh, Otw. Str.Stat', 1, 1, 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `nip_pegawai` int(15) NOT NULL,
  `id_role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access`
--

INSERT INTO `user_access` (`id`, `nip_pegawai`, `id_role`) VALUES
(1, 340054255, 1),
(2, 340054255, 2),
(3, 340054255, 3),
(4, 340054255, 4),
(35, 340024494, 2),
(36, 340024494, 3),
(39, 340013059, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `nama_role`) VALUES
(1, 'SuperAdmin'),
(2, 'Admin Monitoring'),
(3, 'Admin Rapat Zoom'),
(4, 'Admin Rapat Offline'),
(5, 'Viewer Kepala Kab/Kot (1)'),
(6, 'Admin Pegawai Kab/Kot (2)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `z_anggotateam`
--

CREATE TABLE `z_anggotateam` (
  `id_zanggt` int(11) NOT NULL,
  `id_team` int(3) DEFAULT NULL,
  `id_user` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `z_anggotateam`
--

INSERT INTO `z_anggotateam` (`id_zanggt`, `id_team`, `id_user`) VALUES
(4, 3, 23),
(5, 3, 24),
(6, 3, 25),
(11, 11, 11),
(12, 11, 12),
(13, 11, 13),
(14, 11, 14),
(15, 5, 19),
(16, 5, 20),
(17, 5, 21),
(19, 2, 13),
(20, 2, 12),
(21, 2, 11),
(22, 3, 13),
(23, 3, 11),
(24, 3, 12),
(36, 7, 31),
(37, 7, 12),
(38, 7, 17),
(43, 17, 51),
(44, 17, 58),
(45, 17, 52),
(46, 17, 60),
(47, 18, 51),
(48, 18, 56),
(49, 18, 93);

-- --------------------------------------------------------

--
-- Struktur dari tabel `z_periode`
--

CREATE TABLE `z_periode` (
  `id_zperiode` int(11) NOT NULL,
  `Tahun` varchar(4) NOT NULL,
  `aktif` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `z_periode`
--

INSERT INTO `z_periode` (`id_zperiode`, `Tahun`, `aktif`) VALUES
(1, '2021', 0),
(2, '2022', 0),
(3, '2023', 1),
(4, '2024', 0),
(5, '2025', 0),
(6, '2026', 0),
(7, '2027', 0),
(8, '2028', 0),
(9, '2028', 0),
(10, '2029', 0),
(11, '2030', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `z_team`
--

CREATE TABLE `z_team` (
  `id_zteam` int(11) NOT NULL,
  `nama_team` text,
  `id_zperiode` int(11) DEFAULT NULL,
  `id_ketuatim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `z_team`
--

INSERT INTO `z_team` (`id_zteam`, `nama_team`, `id_zperiode`, `id_ketuatim`) VALUES
(1, 'Analisis & Penjaminan Kualitas', 3, NULL),
(2, 'Neraca Regional', 3, NULL),
(3, 'Statistik Sosial', 3, NULL),
(4, 'Statistik Distribusi', 3, NULL),
(5, 'Statistik Produksi', 3, NULL),
(6, 'Sensus Pertanian', 3, NULL),
(7, 'Pengolahan & TIK', 3, NULL),
(8, 'Diseminasi Statistik', 3, NULL),
(9, 'Pembinaan & Pelaksanaan Statistik Sektoral', 3, NULL),
(10, 'Perencanaan & Administrasi Keuangan', 3, NULL),
(11, 'Manajemen SDM dan Hukum', 3, NULL),
(12, 'Pengelolaan BMN, Rumah Tangga Perkantoran dan PBJ', 3, NULL),
(13, 'SAKIP', 3, NULL),
(14, 'Humas & UKP', 3, NULL),
(15, 'Zona Integritas & Reformasi Birokrasi', 3, NULL),
(16, 'Kolaborasi Mengawal Perubahan', 3, NULL),
(17, 'Analisis & Penjaminan Kualitas', 4, 51),
(18, 'Neraca Regional', 4, 51);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bps`
--
ALTER TABLE `bps`
  ADD PRIMARY KEY (`kodeBPS`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `manajemenfile`
--
ALTER TABLE `manajemenfile`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `meetingreq`
--
ALTER TABLE `meetingreq`
  ADD PRIMARY KEY (`idm`);

--
-- Indeks untuk tabel `m_jabatan`
--
ALTER TABLE `m_jabatan`
  ADD PRIMARY KEY (`id_m_jabatan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pegawai_kabkota`
--
ALTER TABLE `pegawai_kabkota`
  ADD PRIMARY KEY (`id_pegawai_kabkota`);

--
-- Indeks untuk tabel `rapatteam`
--
ALTER TABLE `rapatteam`
  ADD PRIMARY KEY (`idr`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tim_kerja`
--
ALTER TABLE `tim_kerja`
  ADD PRIMARY KEY (`id_team`);

--
-- Indeks untuk tabel `userapp`
--
ALTER TABLE `userapp`
  ADD PRIMARY KEY (`ida`);

--
-- Indeks untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `z_anggotateam`
--
ALTER TABLE `z_anggotateam`
  ADD PRIMARY KEY (`id_zanggt`);

--
-- Indeks untuk tabel `z_periode`
--
ALTER TABLE `z_periode`
  ADD PRIMARY KEY (`id_zperiode`);

--
-- Indeks untuk tabel `z_team`
--
ALTER TABLE `z_team`
  ADD PRIMARY KEY (`id_zteam`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `manajemenfile`
--
ALTER TABLE `manajemenfile`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `meetingreq`
--
ALTER TABLE `meetingreq`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `m_jabatan`
--
ALTER TABLE `m_jabatan`
  MODIFY `id_m_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `pegawai_kabkota`
--
ALTER TABLE `pegawai_kabkota`
  MODIFY `id_pegawai_kabkota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `rapatteam`
--
ALTER TABLE `rapatteam`
  MODIFY `idr` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `userapp`
--
ALTER TABLE `userapp`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `z_anggotateam`
--
ALTER TABLE `z_anggotateam`
  MODIFY `id_zanggt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `z_periode`
--
ALTER TABLE `z_periode`
  MODIFY `id_zperiode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `z_team`
--
ALTER TABLE `z_team`
  MODIFY `id_zteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
