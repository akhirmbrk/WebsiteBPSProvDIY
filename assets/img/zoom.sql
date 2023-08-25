-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2023 pada 07.10
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ida` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `admin_zoom` int(1) NOT NULL,
  `admin_pst` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ida`, `nip`, `admin_zoom`, `admin_pst`) VALUES
(1, '340054255', 1, 0);

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
  `nama_approve` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meetingreq`
--

INSERT INTO `meetingreq` (`idm`, `perihal`, `tgl_start`, `tgl_end`, `status`, `tgl_pengajuan`, `oleh`, `reply`, `notulen`, `namapengusul`, `tgl_approve`, `jumlah_peserta`, `nip_approve`, `nama_approve`) VALUES
(1, 'zoom pertam oiy1 gfdjhgfgj nmgghjkg kjjkgkjg endddddding retro', '2023-02-02 11:00:00', '2023-02-02 16:00:00', NULL, '2023-02-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'rapat st2023', '2023-02-16 05:00:00', '2023-02-18 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'okeee', '2023-02-17 07:30:00', '2023-02-18 16:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'rapat regosek', '2023-02-24 07:30:00', '2023-02-24 16:00:00', 0, '2023-02-03', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', NULL, NULL, NULL, NULL),
(5, 'rapat regsosek oyeeee', '2023-03-29 08:30:00', '2023-04-01 15:10:00', 0, '2023-02-24', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', NULL, 80, NULL, NULL),
(6, 'rapat regosek', '2023-02-22 07:30:00', '2023-02-23 16:00:00', 1, '2023-02-22', 340054255, '<div>Ysh. Bapak/Ibu,</div><div><br></div><div>Izin menyampaikan link ZM untuk apel pagi bulan Februari 2023, sebagai berikut:</div><div><br></div><div>Topic: Apel Pagi BPS Provinsi D.I. Yogyakarta</div><div>Time: Feb 6, 2023 08:00 Jakarta</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Every week on Mon, until Feb 27, 2023, 4 occurrence(s)</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 6, 2023 08:00</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 13, 2023 08:00</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 20, 2023 08:00</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 27, 2023 08:00</div><div>Please download and import the following iCalendar (.ics) files to your calendar system.</div><div>Weekly: https://us02web.zoom.us/meeting/tZMoceGtrDsoEtZzKz5ZposawDfzRtRkGxBY/ics?icsToken=98tyKuGvqz0iH9aVshGFRpwEGY_oWe_zpmJBj7dnhjT_VhpDbRD3IcZEKIBrItP3</div><div><br></div><div>Join Zoom Meeting</div><div><a href=\"https://us02web.zoom.us/j/87568520282?pwd=UUpiQjc0Rkg4UzlVQ2pLdnNtMlAyZz09\" target=\"_blank\">https://us02web.zoom.us/j/87568520282?pwd=UUpiQjc0Rkg4UzlVQ2pLdnNtMlAyZz09</a></div><div><br></div><div>Meeting ID: 875 6852 0282</div><div>Passcode: apelpagi</div>', '6_1677550113', 'Isdiyanto SST, M.T.', '2023-02-23', NULL, 340054255, 'Isdiyanto SST, M.T.'),
(8, 'block check 1', '2023-02-28 09:30:00', '2023-02-28 15:00:00', 2, '2023-02-22', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', NULL, NULL, NULL, NULL),
(9, 'bnlock cek 2', '2023-02-28 06:30:00', '2023-02-28 17:00:00', 2, '2023-02-22', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', NULL, NULL, NULL, NULL),
(10, 'dssdfsdfsdf', '2023-02-28 07:30:00', '2023-03-28 16:00:00', 2, '2023-02-22', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', NULL, NULL, NULL, NULL),
(11, 'block check 444', '2023-02-28 07:30:00', '2023-02-28 16:00:00', 2, '2023-02-22', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', NULL, NULL, NULL, NULL),
(12, 'rapat regosek c ek', '2023-02-28 07:30:00', '2023-02-28 16:00:00', 2, '2023-02-22', 340054255, NULL, NULL, 'Isdiyanto SST, M.T.', NULL, NULL, NULL, NULL),
(13, 'block cek 3333', '2023-02-28 06:30:00', '2023-02-28 18:00:00', 1, '2023-02-22', 340054255, '<div>Ysh. Bapak/Ibu,</div><div><br></div><div>Izin menyampaikan link ZM untuk apel pagi bulan Februari 2023, sebagai berikut:</div><div><br></div><div>Topic: Apel Pagi BPS Provinsi D.I. Yogyakarta</div><div>Time: Feb 6, 2023 08:00 Jakarta</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Every week on Mon, until Feb 27, 2023, 4 occurrence(s)</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 6, 2023 08:00</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 13, 2023 08:00</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 20, 2023 08:00</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 27, 2023 08:00</div><div>Please download and import the following iCalendar (.ics) files to your calendar system.</div><div>Weekly: <a href=\"https://us02web.zoom.us/meeting/tZMoceGtrDsoEtZzKz5ZposawDfzRtRkGxBY/ics?icsToken=98tyKuGvqz0iH9aVshGFRpwEGY_oWe_zpmJBj7dnhjT_VhpDbRD3IcZEKIBrItP3\" target=\"_blank\">https://us02web.zoom.us/meeting/tZMoceGtrDsoEtZzKz5ZposawDfzRtRkGxBY/ics?icsToken=98tyKuGvqz0iH9aVshGFRpwEGY_oWe_zpmJBj7dnhjT_VhpDbRD3IcZEKIBrItP3</a></div><div><br></div><div>Join Zoom Meeting</div><div><a href=\"https://us02web.zoom.us/j/87568520282?pwd=UUpiQjc0Rkg4UzlVQ2pLdnNtMlAyZz09\" target=\"_blank\">https://us02web.zoom.us/j/87568520282?pwd=UUpiQjc0Rkg4UzlVQ2pLdnNtMlAyZz09</a></div><div><br></div><div>Meeting ID: 875 6852 0282</div><div>Passcode: apelpagi</div><div><br></div><div>Terima kasih</div>', NULL, 'Isdiyanto SST, M.T.', NULL, NULL, NULL, NULL),
(14, 'tes permintaan rapat pertama', '2023-03-01 08:30:00', '2023-03-01 15:00:00', 1, '2023-02-23', 340054255, '<div>Ysh. Bapak/Ibu,</div><div><br></div><div>Izin menyampaikan link ZM untuk apel pagi bulan Februari 2023, sebagai berikut:</div><div><br></div><div>Topic: Apel Pagi BPS Provinsi D.I. Yogyakarta</div><div>Time: Feb 6, 2023 08:00 Jakarta</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Every week on Mon, until Feb 27, 2023, 4 occurrence(s)</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 6, 2023 08:00</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 13, 2023 08:00</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 20, 2023 08:00</div><div>&nbsp; &nbsp; &nbsp; &nbsp; Feb 27, 2023 08:00</div><div>Please download and import the following iCalendar (.ics) files to your calendar system.</div><div>Weekly: https://us02web.zoom.us/meeting/tZMoceGtrDsoEtZzKz5ZposawDfzRtRkGxBY/ics?icsToken=98tyKuGvqz0iH9aVshGFRpwEGY_oWe_zpmJBj7dnhjT_VhpDbRD3IcZEKIBrItP3</div><div><br></div><div>Join Zoom Meeting</div><div><a href=\"https://us02web.zoom.us/j/87568520282?pwd=UUpiQjc0Rkg4UzlVQ2pLdnNtMlAyZz09\" target=\"_blank\" style=\"\"><font color=\"#ce0000\">https://us02web.zoom.us/j/87568520282?pwd=UUpiQjc0Rkg4UzlVQ2pLdnNtMlAyZz09</font></a></div><div><br></div><div>Meeting ID: 875 6852 0282</div><div>Passcode: apelpagi</div>', NULL, 'Isdiyanto SST, M.T.', '2023-02-23', 80, 340054255, 'Isdiyanto SST, M.T.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ida`);

--
-- Indeks untuk tabel `meetingreq`
--
ALTER TABLE `meetingreq`
  ADD PRIMARY KEY (`idm`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `meetingreq`
--
ALTER TABLE `meetingreq`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
