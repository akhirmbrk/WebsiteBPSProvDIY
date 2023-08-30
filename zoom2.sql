-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 04:52 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

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
-- Table structure for table `meetingreq`
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
-- Dumping data for table `meetingreq`
--

INSERT INTO `meetingreq` (`idm`, `perihal`, `tgl_start`, `tgl_end`, `status`, `tgl_pengajuan`, `oleh`, `reply`, `notulen`, `namapengusul`, `tgl_approve`, `jumlah_peserta`, `nip_approve`, `nama_approve`, `keterangan`, `ruangan`) VALUES
(1, 'Magang Mahasiswa Politeknik Statistika STIS', '2023-08-30 00:30:00', '2023-08-31 01:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 10, 340054255, 'Isdiyanto SST, M.T.', 1, 'bima'),
(2, 'Rapat Pencacahan Regsosek', '2023-08-30 07:30:00', '2023-08-30 16:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 1, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(3, 'a', '2023-08-30 07:30:00', '2023-08-30 16:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 2, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(4, '321', '2023-08-30 07:30:00', '2023-08-30 16:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 1, 340054255, 'Isdiyanto SST, M.T.', 1, 'bima'),
(5, 'a', '2023-08-30 07:30:00', '2023-08-30 16:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 1, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(6, 'sss', '2023-08-30 07:30:00', '2023-08-30 16:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 1, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(7, 'magang', '2023-08-30 07:30:00', '2023-08-30 16:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 2, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(8, 'mkn', '2023-08-30 07:30:00', '2023-08-30 16:00:00', 2, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 8, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(9, 'w', '2023-08-30 07:30:00', '2023-08-30 16:00:00', 0, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', NULL, 5, NULL, NULL, 1, 'pst'),
(10, 'd', '2023-09-08 07:30:00', '2023-09-12 16:00:00', 0, '2023-08-29', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', NULL, 20, NULL, NULL, 1, 'bima'),
(11, 'guiwjolwbwd', '2023-09-07 07:30:00', '2023-09-08 16:00:00', 1, '2023-08-29', 340054255, 'p', NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 2, 340054255, 'Isdiyanto SST, M.T.', 0, 'Zoom'),
(12, 'www', '2023-10-05 07:30:00', '2023-10-06 16:00:00', 1, '2023-08-29', 340054255, 'p', NULL, 'Isdiyanto SST, M.T.', '2023-08-29', 2, 340054255, 'Isdiyanto SST, M.T.', 1, 'bima');

-- --------------------------------------------------------

--
-- Table structure for table `userapp`
--

CREATE TABLE `userapp` (
  `ida` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `namaU` text,
  `admin_zoom` int(1) NOT NULL DEFAULT '0',
  `admin_pst` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userapp`
--

INSERT INTO `userapp` (`ida`, `nip`, `namaU`, `admin_zoom`, `admin_pst`) VALUES
(11, '340013059', 'Rahmawati, SE, MA', 0, 0),
(12, '340015030', 'Soman Wisnu Darma, S.Si, MT', 0, 0),
(13, '340013416', 'Drs. A.Lilik Sulistyanto', 0, 0),
(14, '340020202', 'Galuh Widyastuti, SST', 0, 0),
(15, '340019107', 'Istato Hudayana, S.ST', 0, 0),
(16, '340012182', 'Sri Mulyani, SE, MM', 0, 0),
(17, '340055086', 'Bayu Sulistomo, SH., M.Hum', 0, 0),
(18, '340014482', 'Ismiyati', 0, 0),
(19, '80128419', 'Nining Purwani, S.TP', 0, 0),
(20, '340055089', 'Nur Shaleh Fathoni, S.Psi', 0, 0),
(21, '340051215', 'Maisaroh Yeni Rahmatika, SE', 0, 0),
(22, '340051071', 'Cucu Yunaningsih, S.Akt', 0, 0),
(23, '340017939', 'Ika Yuniati, SE', 0, 0),
(24, '340017644', 'Siswi Novia Damayanti, A.Md', 0, 0),
(25, '340014141', 'Dra. Eli Sundari', 0, 0),
(26, '340020530', 'Agung Haryanto', 0, 0),
(27, '340012404', 'Dwi Rahayu', 0, 0),
(28, '340055090', 'Ranny Widiasti, A.Md', 0, 0),
(29, '340055087', 'Ismei Fatman, S.M', 0, 0),
(30, '340018359', 'Cicilia Widyasari, SE', 0, 0),
(31, '340012568', 'Jafar Nawawi A, S.Si, M.Si', 0, 0),
(32, '340015029', 'Alwan Fauzani', 0, 0),
(33, '340014134', 'Ir. Suparna, M.Si', 0, 0),
(34, '340016133', 'Agung Wibowo, SST, M.IDEC', 0, 0),
(35, '340019188', 'Nur Latifah hanum, SST', 0, 0),
(36, '340017080', 'Ciptaning Yodya Dian Pratiwi, SST', 0, 0),
(37, '340015729', 'Harin Ihtian, S.Si, M.M', 0, 0),
(38, '340014484', 'Winarti, SE, MM', 0, 0),
(39, '340015167', 'Kairol Amin, S.ST, M.Si', 0, 0),
(40, '340016974', 'Widiatmoko, SST, SE, MA', 0, 0),
(41, '340012566', 'Agus Priyanto, S.Si, MM', 0, 0),
(42, '340016059', 'Jenny Marwaty, SST', 0, 0),
(43, '340012122', 'Chatarina Budi Anggarini, SST', 0, 0),
(44, '340014675', 'Sudiyana, SE, MM', 0, 0),
(45, '340015014', 'Santi Wijayanti, S.Si', 0, 0),
(46, '340015977', 'Nur Mujib, SST', 0, 0),
(47, '340014133', 'Dr. Ir. Kusriatmi, MP', 0, 0),
(48, '340015960', 'Meitri Pafrida, S.Si, M.Ec.Dev', 0, 0),
(49, '340013381', 'Anda Triyanto, S.Si, M.Si', 0, 0),
(50, '340016192', 'Fitri Puji Astuti, SST, MM', 0, 0),
(51, '340015973', 'Mohamad Ardi Kintono, SST, M.Si', 0, 0),
(52, '340019189', 'Helida Nurcahayani, SST, M.Si', 0, 0),
(53, '340017362', 'Ristiningsih, SST', 0, 0),
(54, '340011269', 'Sudarmadi, SST, MM', 1, 0),
(55, '340054406', 'Sularmi, S.Si', 1, 0),
(56, '340013427', 'Dra. Riniarti, MM', 0, 0),
(57, '340014483', 'Mohammad Heru Widodo, S.Mn, MM', 0, 0),
(58, '340054255', 'Isdiyanto, SST, MT', 1, 0),
(59, '340054276', 'Vidya Hayuningtyas SST', 0, 0),
(60, '340017045', 'Dwijo Suwanto SST', 1, 0),
(61, '340019273', 'Siti Maysaroh SST, M.Si.', 0, 0),
(62, '340015378', 'Rachmawati SST.,MM', 0, 0),
(63, '340051266', 'Purwaningtiyas Kurnia Sari S.Si., M.Ec.Dev.', 0, 0),
(64, '340015746', 'Handani Murda, S.Si. M.S.E.', 0, 0),
(65, '340020243', 'Muhamad Fuad Hasan SST', 0, 0),
(66, '340054372', 'Diah Trijayanti SE.,M.Sc', 0, 0),
(67, '340055778', 'Eni Nuraeni SST', 0, 0),
(68, '340059943', 'Wiwit Cahyani A.P.Kb.N.', 0, 0),
(69, '340015168', 'Lastiyono S.Si., MM', 0, 0),
(70, '340051333', 'Sujiartono S.Akt., M.Acc', 0, 0),
(71, '340050089', 'Fathonah Tri Hastuti SST., MT.', 0, 0),
(72, '340015993', 'Agung Gumilar Triyanto SST, M.Si.', 0, 0),
(73, '340016149', 'Sudaryono SST', 0, 0),
(74, '340054672', 'Anwar Prihadi, S.Psi', 0, 0),
(75, '340017889', 'Arif Widyadarma SST., M.Eng.', 0, 0),
(76, '340054347', 'Nur Hidayati SST, M.Sc', 0, 0),
(77, '340015072', 'Asih Setyowati, S.Si.,MM.', 0, 0),
(78, '340053449', 'Rifka Rahman Hakim, S.Psi, M.Si', 0, 0),
(79, '340051005', 'Achmad Basuki Adibrata, SE, M.Acc', 0, 0),
(80, '340057014', 'Cahyawati Mandala Sari SST', 0, 0),
(81, '340010093', 'Sentot Bangun Widoyono M.A.', 0, 0),
(82, '340054085', 'Evi Wahyu Pratiwi SST, M.Stat', 0, 0),
(83, '340055716', 'Ahmad Nur Fajri SST', 0, 0),
(84, '340056055', 'Tri Mulyani Widia Ningsih A.Md.', 0, 0),
(85, '340059222', 'Anisa Eka Puridewi S.Stat.', 0, 0),
(86, '340061197', 'Arsyad Dyan Prasetyo S.E.', 0, 0),
(87, '340054317', 'Irwan Sutisna SST, M.Sc, M.Econ.', 0, 0),
(88, '340018500', 'Andi Ismoro SE, M.M', 0, 0),
(89, '340057420', 'Iangrea Mustikane Bumi SST', 0, 0),
(90, '340051284', 'Restianingsih Trisnawati', 0, 0),
(91, '340054383', 'Jujuk Rudati', 0, 0),
(92, '340062267', 'Hasri Nurul Latifah A.Md.Ak.', 0, 0),
(93, '340012847', 'Ir. Herum Fajarwati M.M', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `z_anggotateam`
--

CREATE TABLE `z_anggotateam` (
  `id_zanggt` int(11) NOT NULL,
  `id_team` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_anggotateam`
--

INSERT INTO `z_anggotateam` (`id_zanggt`, `id_team`, `id_user`) VALUES
(1, 14, 58),
(2, 7, 58),
(3, 10, 58),
(4, 11, 58);

-- --------------------------------------------------------

--
-- Table structure for table `z_periode`
--

CREATE TABLE `z_periode` (
  `id_zperiode` int(11) NOT NULL,
  `Tahun` varchar(4) NOT NULL,
  `aktif` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_periode`
--

INSERT INTO `z_periode` (`id_zperiode`, `Tahun`, `aktif`) VALUES
(1, '2021', 0),
(2, '2022', 0),
(3, '2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `z_team`
--

CREATE TABLE `z_team` (
  `id_zteam` int(11) NOT NULL,
  `nama_team` text,
  `id_zperiode` int(11) DEFAULT NULL,
  `id_ketuatim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_team`
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
-- Indexes for table `meetingreq`
--
ALTER TABLE `meetingreq`
  ADD PRIMARY KEY (`idm`);

--
-- Indexes for table `userapp`
--
ALTER TABLE `userapp`
  ADD PRIMARY KEY (`ida`);

--
-- Indexes for table `z_anggotateam`
--
ALTER TABLE `z_anggotateam`
  ADD PRIMARY KEY (`id_zanggt`);

--
-- Indexes for table `z_periode`
--
ALTER TABLE `z_periode`
  ADD PRIMARY KEY (`id_zperiode`);

--
-- Indexes for table `z_team`
--
ALTER TABLE `z_team`
  ADD PRIMARY KEY (`id_zteam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meetingreq`
--
ALTER TABLE `meetingreq`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userapp`
--
ALTER TABLE `userapp`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `z_anggotateam`
--
ALTER TABLE `z_anggotateam`
  MODIFY `id_zanggt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `z_periode`
--
ALTER TABLE `z_periode`
  MODIFY `id_zperiode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `z_team`
--
ALTER TABLE `z_team`
  MODIFY `id_zteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
