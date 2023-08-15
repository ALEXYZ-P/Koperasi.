-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 05:31 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikoperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(64) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nia` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `nohp` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `username`, `password`, `nia`, `nama`, `jenis_kelamin`, `alamat`, `tanggal`, `nohp`) VALUES
('5cd49a6f19f59', 'Dewa', 'dewa26', '142410101032', 'Dewa Gunawan', 'Laki-Laki', 'Kediri', '0000-00-00', 8883179774),
('5cd49a7c6e6a3', '', '0', '142410101099', 'Alfiani Khasanul', 'Perempuan', 'Banyuwangi', '0000-00-00', 0),
('5cd55b8045856', '', '0', '142410101055', 'Angga Dwi', 'Laki-Laki', 'Jember Lor', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` varchar(64) NOT NULL,
  `id_pinjaman` varchar(64) NOT NULL,
  `no_angsuran` varchar(225) NOT NULL,
  `jumlah_angsuran` double NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_pinjaman`, `no_angsuran`, `jumlah_angsuran`, `tanggal`) VALUES
('5cdd6be12d627', '5cd955331550d', 'AGS002', 500000, '2019-05-20'),
('5cdd6c5d9e162', '5cd955331550d', 'AGS003', 300000, '2019-05-16'),
('5cdd6ecfb57c4', '5cdd6ac7c2c36', 'AGS004', 200000, '2019-05-16'),
('5cdd729dd8049', '5cd9479f88ebe', 'AGS001', 1300000, '2023-07-03'),
('5ce27eeb53dc6', '5cd9479f88ebe', 'AGSIno001', 1300000, '2019-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tabungan`
--

CREATE TABLE `jenis_tabungan` (
  `id_jenis_tabungan` int(4) NOT NULL,
  `nama_jenis_tabungan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_tabungan`
--

INSERT INTO `jenis_tabungan` (`id_jenis_tabungan`, `nama_jenis_tabungan`) VALUES
(1, 'simpanan_pokok'),
(2, 'simpanan_haji'),
(3, 'simpanan_umrah'),
(4, 'simpanan_qurban');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(64) NOT NULL,
  `nik` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` bigint(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nik`, `nama`, `alamat`, `nohp`) VALUES
('5ce5259b11686', '142410101039', 'Ino Galwargan', 'Jl Made Dadi No 13 Lamongan', 81253708899),
('5ce525c33a6df', '142410101037', 'Rozha aulya Nurvianti', 'Jl Salak 2 No 15, Patrang, Kab. Jember', 81278909865),
('5ce52601bf6eb', '142410101038', 'Khasanul Alfiani', 'Jl Blimbing Gg IV no 16, Kec. Genteng, Kab. Banyuwangi', 87990187298),
('5ce55366393e1', '1424001', 'Gunawan Asmeda ', 'Jl Durian Runtuh No 16, Lamongan', 81253709129),
('5ce55366393e8', '1424002', 'Andika Nanda', 'Lamongan Jawa Timur', 81456789098),
('5ce55366393e9', '1424003', 'Anriko Chiesa', 'Lamongan Jawa Timur', 81456789098),
('61d6c03d93f0f', '21720205000001', 'Bayu Tutor', 'Bandung', 89676788796),
('64a3c82f87f67', '123456', 'Gunawan', 'Kedeiri', 888888888888);

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` varchar(64) NOT NULL,
  `id_anggota` varchar(64) NOT NULL,
  `no_pinjaman` varchar(225) NOT NULL,
  `jumlah_pinjaman` double NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `lama` int(11) NOT NULL,
  `bunga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_anggota`, `no_pinjaman`, `jumlah_pinjaman`, `tanggal_peminjaman`, `lama`, `bunga`) VALUES
('5cd9479f88ebe', '5cd49a6f19f59', 'PJ0001', 3000000, '2019-05-16', 3, 10),
('5cd955331550d', '5cd49a7c6e6a3', 'PJ0002', 2000000, '2019-05-13', 3, 10),
('5cdd6ac7c2c36', '5cd55b8045856', 'PJ0003', 6000000, '2019-05-16', 5, 10),
('64a3d4779da88', '5cd49a6f19f59', '1', 1000000000, '2023-07-04', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_tabungan` bigint(13) NOT NULL,
  `tanggal_tabung` date NOT NULL,
  `id_jenis_tabungan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`id_tabungan`, `id_user`, `jumlah_tabungan`, `tanggal_tabung`, `id_jenis_tabungan`) VALUES
(1, 3, 10000000, '2023-07-27', 1),
(7, 3, 10000000, '2023-07-27', 4),
(8, 6, 100000000, '2023-08-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nia` varchar(255) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` bigint(15) NOT NULL,
  `tanggal` date NOT NULL,
  `birthday` date NOT NULL,
  `level` enum('admin','staff','member','') NOT NULL,
  `img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nia`, `nama`, `jenis_kelamin`, `alamat`, `email`, `nohp`, `tanggal`, `birthday`, `level`, `img`) VALUES
(1, 'Dapaag', '4e732ced3463d06de0ca9a15b6153677', '449503620', 'Daffa Gunawan', 'Laki-laki', 'Keidiri', 'Dapaag@gmail.com', 8883179774, '2023-07-06', '2005-12-26', 'admin', ''),
(2, 'supri', '12345678', '', 'suprianto jono', '', '', '', 0, '0000-00-00', '0000-00-00', 'admin', ''),
(3, 'Dewa', 'c20ad4d76fe97759aa27a0c99bff6710', '20398102938', 'Dewa Gunawan', 'Laki-laki', 'Kediri', 'Dewaa@gmail.com', 87761381335, '2023-07-13', '2005-12-26', 'member', ''),
(6, 'Yuan', '751d31dd6b56b26b29dac2c0e1839e34', '232441231231', 'Yuan GUnawan', 'Laki-laki', 'Kediri', '', 8883928392, '2005-12-26', '0000-00-00', 'member', ''),
(7, 'Mochammad', '4e732ced3463d06de0ca9a15b6153677', '12312312432', 'Mochammad Daffa', 'Laki-laki', 'Kediri', '', 8394823948, '2005-12-26', '0000-00-00', 'member', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`),
  ADD KEY `id_pinjaman` (`id_pinjaman`);

--
-- Indexes for table `jenis_tabungan`
--
ALTER TABLE `jenis_tabungan`
  ADD PRIMARY KEY (`id_jenis_tabungan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`),
  ADD KEY `id_jenis_tabungan` (`id_jenis_tabungan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_tabungan`
--
ALTER TABLE `jenis_tabungan`
  MODIFY `id_jenis_tabungan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`) ON DELETE CASCADE;

--
-- Constraints for table `jenis_tabungan`
--
ALTER TABLE `jenis_tabungan`
  ADD CONSTRAINT `jenis_tabungan_ibfk_1` FOREIGN KEY (`id_jenis_tabungan`) REFERENCES `tabungan` (`id_jenis_tabungan`);

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD CONSTRAINT `tabungan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tabungan_ibfk_2` FOREIGN KEY (`id_jenis_tabungan`) REFERENCES `jenis_tabungan` (`id_jenis_tabungan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
