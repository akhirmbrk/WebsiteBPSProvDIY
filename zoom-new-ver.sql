-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2023 pada 04.39
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
  `KodeBPS` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `judul_kegiatan`, `tgl_start`, `tgl_end`, `progres_kegiatan`, `id_tim_kerja`, `deskripsi_kegiatan`, `id_parent`, `KodeBPS`) VALUES
(5, 'Magang', '2023-08-31 00:00:00', '2023-09-01 00:00:00', 18, 2, '                                    <ul><li>Kelar perencanaan</li><li>Plus mulai uji coba penerapan</li></ul>                                ', 0, 0),
(6, 'Coba INput Baru', '2023-09-06 00:00:00', '2023-09-07 00:00:00', 0, 1, '                                                                                                                                                                                    <ul><li>Kelar perencanaan</li><li>Plus mulai uji coba penerapan</li></ul>                                                                                                                                                                ', 5, 0),
(7, 'Coba 4 September', '2023-09-06 00:00:00', '2023-09-07 00:00:00', 36, 13, '                                    <ul><li>Kelar perencanaan</li><li>Plus mulai uji coba penerapan</li></ul>                                ', 5, 0),
(9, 'Coba 5 September', '2023-09-09 00:00:00', '2023-09-10 00:00:00', 23, 7, '                                    <ul><li>Kelar perencanaan</li><li>Plus mulai uji coba penerapan</li></ul>                                ', 0, 0),
(10, 'coba 8september', '2023-09-16 00:00:00', '2023-09-17 00:00:00', 16, 2, '                                    <ul><li>Kelar perencanaan</li><li>Plus mulai uji coba penerapan</li></ul>                                ', 9, 0);

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
(10, 'Coba 2', '2023-08-30 17:30:00', '2023-08-30 18:00:00', 0, '2023-08-30', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', NULL, 23, NULL, NULL, 0, 'Zoom'),
(11, 'Magang Mahasiswa Politeknik Statistika STIS', '2023-09-14 07:30:00', '2023-09-14 16:00:00', 2, '2023-08-30', 340054255, 'tes', NULL, 'Isdiyanto SST, M.T.', '2023-08-31', 10, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom');

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
(11, '340013059', 'Rahmawati, SE, MA', 1, 0, 1, 0, 0, 0, 0, 0),
(12, '340015030', 'Soman Wisnu Darma, S.Si, MT', 0, 1, 0, 0, 0, 0, 0, 1),
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
(94, '123455', 'Rahmawati Budi, SE, MA', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `z_anggotateam`
--

CREATE TABLE `z_anggotateam` (
  `id_zanggt` int(11) NOT NULL,
  `id_team` int(3) DEFAULT NULL,
  `id_user` int(4) DEFAULT NULL,
  `kodeBPS` int(4) DEFAULT NULL,
  `Id_Periode` int(2) DEFAULT NULL,
  `ketua_tim` int(1) NOT NULL COMMENT '1 = ketua tim, 0 = anggota'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `z_anggotateam`
--

INSERT INTO `z_anggotateam` (`id_zanggt`, `id_team`, `id_user`, `kodeBPS`, `Id_Periode`, `ketua_tim`) VALUES
(4, 3, 23, 3401, 5, 1),
(5, 3, 24, 3401, 5, 0),
(6, 3, 25, 3401, 5, 0),
(11, 11, 11, 3401, 3, 1),
(12, 11, 12, 3401, 3, 0),
(13, 11, 13, 3401, 3, 0),
(14, 11, 14, 3401, 3, 0),
(15, 5, 19, 3471, 3, 1),
(16, 5, 20, 3471, 3, 0),
(17, 5, 21, 3471, 3, 0),
(19, 2, 13, 3400, 3, 1),
(20, 2, 12, 3400, 3, 0),
(21, 2, 11, 3400, 3, 0),
(22, 3, 13, 3402, 1, 1),
(23, 3, 11, 3402, 1, 0),
(24, 3, 12, 3402, 1, 0),
(36, 7, 31, 3404, 3, 1),
(37, 7, 12, 3404, 3, 0),
(38, 7, 17, 3404, 3, 0);

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
(16, 'Kolaborasi Mengawal Perubahan', 3, NULL);

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
-- Indeks untuk tabel `meetingreq`
--
ALTER TABLE `meetingreq`
  ADD PRIMARY KEY (`idm`);

--
-- Indeks untuk tabel `rapatteam`
--
ALTER TABLE `rapatteam`
  ADD PRIMARY KEY (`idr`);

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
-- Indeks untuk tabel `z_anggotateam`
--
ALTER TABLE `z_anggotateam`
  ADD PRIMARY KEY (`id_zanggt`),
  ADD KEY `FK_periode` (`Id_Periode`),
  ADD KEY `FK_userap` (`id_user`),
  ADD KEY `FK_team` (`id_team`),
  ADD KEY `FK_BPS` (`kodeBPS`);

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
  MODIFY `id_kegiatan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `meetingreq`
--
ALTER TABLE `meetingreq`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `rapatteam`
--
ALTER TABLE `rapatteam`
  MODIFY `idr` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `userapp`
--
ALTER TABLE `userapp`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `z_anggotateam`
--
ALTER TABLE `z_anggotateam`
  MODIFY `id_zanggt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `z_periode`
--
ALTER TABLE `z_periode`
  MODIFY `id_zperiode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `z_team`
--
ALTER TABLE `z_team`
  MODIFY `id_zteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `z_anggotateam`
--
ALTER TABLE `z_anggotateam`
  ADD CONSTRAINT `FK_BPS` FOREIGN KEY (`kodeBPS`) REFERENCES `bps` (`kodeBPS`),
  ADD CONSTRAINT `FK_periode` FOREIGN KEY (`Id_Periode`) REFERENCES `z_periode` (`id_zperiode`),
  ADD CONSTRAINT `FK_team` FOREIGN KEY (`id_team`) REFERENCES `tim_kerja` (`id_team`),
  ADD CONSTRAINT `FK_userap` FOREIGN KEY (`id_user`) REFERENCES `userapp` (`ida`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
