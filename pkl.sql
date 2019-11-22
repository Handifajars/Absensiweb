-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Nov 2019 pada 16.19
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` varchar(15) NOT NULL,
  `nip` char(5) NOT NULL,
  `tgl` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `status_masuk` varchar(20) NOT NULL,
  `count` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO admin (username, password) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_gaji`
--

CREATE TABLE `data_gaji` (
  `id_gaji` varchar(15) NOT NULL,
  `nip` char(5) NOT NULL,
  `tgl` date NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `golongan` varchar(2) NOT NULL,
  `nominal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`golongan`, `nominal`) VALUES
('1', '50000'),
('2', '55000'),
('3', '60000'),
('4', '65000'),
('5', '70000'),
('6', '75000'),
('7', '80000'),
('8', '85000'),
('9', '90000'),
('10', '95000'),
('11', '100000'),
('12', '105000'),
('13', '110000'),
('14', '115000'),
('15', '120000'),
('16', '125000'),
('17', '130000'),
('18', '135000'),
('19', '140000'),
('20', '145000'),
('21', '150000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_pegawai`
--

CREATE TABLE `gaji_pegawai` (
  `nip` char(5) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `bulan` decimal(10,0) NOT NULL,
  `tahun` decimal(10,0) NOT NULL,
  `banyak_pertemuan` int(11) NOT NULL,
  `gaji` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` char(5) NOT NULL,
  `nip` char(5) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` time NOT NULL,
  `golongan` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nip`, `nama_sekolah`, `hari`, `jam`, `golongan`) VALUES
('J0001', 'P0001', 'SMP MUH 13', 'Kamis', '15:30:00', '9'),
('J0002', 'P0001', 'SD ALFALAH ASSALAM', 'Jumat', '15:30:00', '7'),
('J0003', 'P0002', 'SMA SANTA AGNES', 'Senin', '14:15:00', '9'),
('J0004', 'P0002', 'SD ALWAHYU', 'Selasa', '09:30:00', '11'),
('J0005', 'P0002', 'SD MUH 27', 'Rabu', '13:00:00', '13'),
('J0006', 'P0002', 'SD AL AZHAR 35', 'Kamis', '13:00:00', '9'),
('J0007', 'P0002', 'SD SANMAR SBY', 'Jumat', '08:30:00', '9'),
('J0008', 'P0002', 'SMP SANMAR SBY', 'Jumat', '13:30:00', '9'),
('J0009', 'P0002', 'SMP/SMA LITTLE SUN', 'Jumat', '15:00:00', '6'),
('J0010', 'P0002', 'SMP ALFALAH ASSALAM', 'Sabtu', '09:00:00', '7'),
('J0011', 'P0003', ' SD LUKMAN HAKIM ', 'Jumat', '08:00:00', '9'),
('J0012', 'P0003', 'SD AL AZHAR 35', 'Kamis', '14:00:00', '11'),
('J0013', 'P0003', 'SD ALMUSLIM', 'Sabtu', '07:30:00', '11'),
('J0014', 'P0004', ' SD GLORIA 3 ', 'Jumat', '13:10:00', '6'),
('J0015', 'P0004', 'SD AL AZHAR 11', 'Kamis', '14:00:00', '9'),
('J0016', 'P0004', 'SD LITTLE SUN', 'Selasa', '14:30:00', '6'),
('J0017', 'P0005', ' SD MUH 2 WARU ', 'Senin', '14:30:00', '9'),
('J0018', 'P0005', 'SD MUH 26', 'Jumat', '15:30:00', '9'),
('J0019', 'P0006', ' SD LUKMAN HAKIM ', 'Sabtu', '08:00:00', '9'),
('J0020', 'P0006', 'SD MUH 26', 'Jumat', '14:30:00', '9'),
('J0021', 'P0006', 'SD LITTE SUN', 'Selasa', '14:30:00', '9'),
('J0022', 'P0007', ' SD SETELLA MARIS ', 'Sabtu', '08:00:00', '7'),
('J0023', 'P0007', 'SD GLORIA 3', 'Kamis', '12:50:00', '6'),
('J0024', 'P0007', 'SD KREATIF ANNUR', 'Selasa', '14:00:00', '9'),
('J0025', 'P0008', ' SD GLORIA 3', 'Kamis', '12:50:00', '3'),
('J0026', 'P0008', ' SD GLORIA 3', 'Jumat', '13:10:00', '3'),
('J0027', 'P0008', 'SD MUH 12', 'Sabtu', '11:00:00', '9'),
('J0028', 'P0008', 'SD MUH 13', 'Sabtu', '08:00:00', '7'),
('J0029', 'P0009', ' SMP SANMAR 2  ', 'Senin', '14:30:00', '9'),
('J0030', 'P0009', 'SD ALFALAH ASSALAM', 'Jumat', '15:30:00', '9'),
('J0031', 'P0010', ' SD MUH 1 WARU ', 'Sabtu', '09:00:00', '9'),
('J0032', 'P0011', 'SD MUH 9', 'Rabu', '14:00:00', '7'),
('J0033', 'P0011', 'SD UNTUNG SUROPATI 1', 'Jumat', '12:30:00', '7'),
('J0034', 'P0011', 'SD MUH 10', 'Sabtu', '08:00:00', '9'),
('J0035', 'P0012', 'SD A EDUCATION', 'Jumat', '10:30:00', '9'),
('J0036', 'P0012', 'SMP ALAM AL IZZA', 'Selasa', '15:00:00', '7'),
('J0037', 'P0013', 'SD ALMUTAQIN', 'Sabtu', '08:00:00', '9'),
('J0038', 'P0013', 'SD AL AZHAR 11', 'Kamis', '13:00:00', '7'),
('J0039', 'P0013', 'SD CITRA BERKAT', 'Senin', '14:30:00', '7'),
('J0040', 'P0014', 'SD SANMAR 2', 'Selasa', '13:00:00', '9'),
('J0041', 'P0014', 'SD AL AZKA', 'Kamis', '13:00:00', '7'),
('J0042', 'P0014', 'SD KARTIKA NASIONAL', 'Jumat', '10:00:00', '6'),
('J0043', 'P0014', 'SD LUKMAN HAKIM', 'Jumat', '08:00:00', '9'),
('J0044', 'P0014', 'SD KRISTUS RAJA', 'Sabtu', '08:00:00', '6'),
('J0045', 'P0015', 'SD AL AZHAR 35', 'Kamis', '14:00:00', '6'),
('J0046', 'P0015', 'SD KARTIKA NASIONAL', 'Jumat', '10:00:00', '9'),
('J0047', 'P0015', 'SD MUH 8', 'Sabtu', '08:00:00', '9'),
('J0048', 'P0016', 'SD TA\'MIRIAH', 'Sabtu', '08:00:00', '9'),
('J0049', 'P0016', 'SD A EDUCATION', 'Jumat', '10:30:00', '6'),
('J0050', 'P0017', ' SD MUH 16  ', 'Sabtu', '09:00:00', '9'),
('J0051', 'P0018', 'SMP MUH 10', 'Senin', '15:30:00', '6'),
('J0052', 'P0018', 'SMP AL AZKA', 'Kamis', '13:30:00', '7'),
('J0053', 'P0018', 'SD ALFALAH ASSALAM', 'Jumat', '15:30:00', '7'),
('J0054', 'P0019', 'SDMP ALMUSLIM', 'Sabtu', '08:00:00', '7'),
('J0055', 'P0019', 'SMP SANMAR SBY', 'Jumat', '13:00:00', '9'),
('J0056', 'P0020', 'SD AL AZHAR 35', 'Kamis', '14:00:00', '6'),
('J0057', 'P0007', 'SD LUKMAN HAKIM', 'Jumat', '08:00:00', '6'),
('J0058', 'P0010', 'SD IT ALMUTAQIN', 'Minggu', '08:00:00', '9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status_pegawai` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `jenis_kelamin`, `no_hp`, `status_pegawai`, `password`) VALUES
('P0001', 'A. Alif Fauzan', 'L', '-', 'Aktif', 'f553aa35c5fac63fc6e1c81f3b45b58c'),
('P0002', 'Arsep Ladisar Wayang', 'L', '-', 'Aktif', '61304d0f139a93870397fc221d1ba74e'),
('P0003', 'Dinar Adinda Safitri', 'P', '-', 'Aktif', '7499ab1fa766f5e695b6eb74cfa3b11b'),
('P0004', 'Dwiki Aulia Andi Rachman', 'L', '-', 'Aktif', 'e91f39dd30ee8d28c0bf895810db1ad3'),
('P0005', 'Nur Nofitasari', 'P', '-', 'Aktif', '323bf4c0369e6aaf1aa0b271c6410fbe'),
('P0006', 'Rivaldy Banestio Sambiran', 'L', '-', 'Aktif', '7215107a7e62033bf9f991a7a404ebe4'),
('P0007', 'Shintia Dwi Saputri', 'P', '-', 'Aktif', 'a2dd25f98c29f0f15c2bf60fa0dc5b79'),
('P0008', 'Tri Hangga Umhar Wijaya', 'L', '-', 'Aktif', '9872a038577e3a1f07f295407aa67b26'),
('P0009', 'Vita Yulianti', 'P', '-', 'Aktif', '72446060a8ac34628d77aa1aad90d776'),
('P0010', 'Cemara Eka Nissa Anjani', 'P', '-', 'Aktif', '11fb6000753a4146e6b57558286164e2'),
('P0011', 'Indah Wardani Putri', 'P', '-', 'Aktif', 'fcc460c203d840d04d91f9bb55b7520f'),
('P0012', 'Dinda Kasyifah Kusumiati', 'P', '-', 'Aktif', 'a1b7b1ddfd296af4899e8ba338657e9d'),
('P0013', 'Abdul Rokhim', 'L', '-', 'Tidak Aktif', 'eb7a96af7edb08e8b96b803698d85544'),
('P0014', 'M. Riski Yulianto', 'L', '-', 'Aktif', '2e2a3744e841a70c1a02730450651fcb'),
('P0015', 'Fajar Ary Wijaya', 'L', '-', 'Aktif', '7bedc9fd30769590c992b8f7f23738f7'),
('P0016', 'Febry Reviansyah Dewandra', 'L', '-', 'Aktif', '031ea013bbea1c07e06f8a6b9a4f2ec6'),
('P0017', 'Akbar Nur Muhammad H.Y', 'L', '081392837389', 'Aktif', 'f039e5f60e85d10bf7b742e65ad931ca'),
('P0018', 'Ayu Lestari Hermawanti', 'P', '-', 'Aktif', 'fe4d9b1ce81828ed510ac8363c953e21'),
('P0019', 'Ali Azyumardi Azra', 'L', '-', 'Aktif', '984d8144fa08bfc637d2825463e184fa'),
('P0020', 'Tasya', 'P', '-', 'Aktif', 'a98d6c3f06afa3746bd02e4ba7b2807d'),
('P0021', 'Amalia Dwi Setiana', 'P', '087851162560', 'Aktif', '286c46c18c98b050cfaebe6e632c9714'),
('P0022', 'David Dharsono', 'P', '085755261060', 'Aktif', '55fc5b709962876903785fd64a6961e5'),
('P0023', 'Ika Nurma Damayanti', 'P', '085784783414', 'Aktif', '07ea08e5fd54439d710a061c19da2a84'),
('P0024', 'Tio', 'L', '085826663946', 'Aktif', '04b98d516a3bbe3171294b136c3da58a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `data_gaji`
--
ALTER TABLE `data_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
