-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 09:08 AM
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
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` varchar(64) NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `no_angsuran` varchar(225) NOT NULL,
  `jumlah_angsuran` double NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_pinjaman` varchar(225) NOT NULL,
  `jumlah_pinjaman` double NOT NULL,
  `tanggal_pinjaman` date NOT NULL,
  `lama` int(11) NOT NULL,
  `bunga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

CREATE TABLE `trash` (
  `id_trash` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` char(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nia` int(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `tanggal` date NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trash`
--

INSERT INTO `trash` (`id_trash`, `id_user`, `email`, `nohp`, `username`, `password`, `nia`, `nama`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `birthday`, `tanggal`, `level`) VALUES
(1, 10, 'D@gmail.com', '08973628176', 'Dewzz', '751d31dd6b56b26b29da', 2147483647, 'Dewwaa', 'Perempuan', 'Kedeiri', 'kediri', '2005-12-26', '2023-08-30', 'staff'),
(2, 11, 'D@gmail.com', '0987654567654', 'Dapp', '202cb962ac59075b964b', 2147483647, 'Dappa', 'Laki-laki', 'kediri', 'kediri', '2005-12-26', '2023-08-31', 'staff'),
(3, 12, 'DP@gmail.com', '0877', 'ddd', '024d7f84fff11dd7e8d9', 2147483647, 'Dewa Yuan Mochammad Daffa Gunawan', 'Perempuan', 'Kedeiri', 'kediri', '2023-09-01', '2023-08-31', 'staff'),
(4, 12, 'DP@gmail.com', '0877', 'ddd', '024d7f84fff11dd7e8d9', 2147483647, 'Dewa Yuan Mochammad Daffa Gunawan', 'Perempuan', 'Kedeiri', 'kediri', '2023-09-01', '2023-08-31', 'staff'),
(5, 13, 'DP@gmail.com', '0888888888888', 'Dd', 'b6d767d2f8ed5d21a44b', 2147483647, 'DaDe', 'Perempuan', 'Kedeiri', 'kediri', '2023-08-01', '2023-08-31', 'staff'),
(6, 13, 'DP@gmail.com', '0888888888888', 'Dd', 'b6d767d2f8ed5d21a44b', 2147483647, 'DaDe', 'Perempuan', 'Kedeiri', 'kediri', '2023-08-01', '2023-08-31', 'staff'),
(7, 14, 'DP@gmail.com', '0888777777777', 'iik', '2b44928ae11fb9384c4c', 2147483647, 'ikk', 'Perempuan', 'Kedeiri', 'kediri', '2023-07-31', '2023-08-31', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` char(14) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nia` varchar(255) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `level` enum('admin','staff','member','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nohp`, `username`, `password`, `nia`, `nama`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `birthday`, `tanggal`, `level`) VALUES
(1, 'Dapaag@gmail.com', '8883179774', 'Dapaag', '4e732ced3463d06de0ca9a15b6153677', '449503620', 'Daffa Gunawan', 'Laki-laki', 'Keidiri', '', '2005-12-26', '2023-08-30 04:27:23', 'admin'),
(3, 'Dewaa@gmail.com', '87761381335', 'Dewa', 'c20ad4d76fe97759aa27', '20398102938', 'Dewa Gunawan', 'Laki-laki', 'Kediri', 'Kediri', '2005-12-26', '2023-07-12 17:00:00', 'member'),
(6, 'Yuanx@gmail.com', '8883928392', 'Yuan', '751d31dd6b56b26b29da', '232441231231', 'Yuan GUnawan', 'Laki-laki', 'Kediri', 'Kediri', '2005-12-26', '2023-08-26 03:05:00', 'staff'),
(7, '', '8394823948', 'Mochammad', '3210ddbeaa16948a702b', '12312312432', 'Mochammad Daffa', 'Laki-laki', 'Kediri', '', '0000-00-00', '2023-08-22 04:47:30', 'member');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `after_delete_user` AFTER DELETE ON `user` FOR EACH ROW BEGIN
    INSERT INTO trash (id_user, email, nohp, username, password, nia, nama, jenis_kelamin, alamat, tempat_lahir, birthday, tanggal, level)
    VALUES (OLD.id_user, OLD.email, OLD.nohp, OLD.username, OLD.password, OLD.nia, OLD.nama, OLD.jenis_kelamin, OLD.alamat, OLD.tempat_lahir, OLD.birthday, OLD.tanggal, OLD.level);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pinjaman` (`id_pinjaman`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`),
  ADD KEY `id_jenis_tabungan` (`id_jenis_tabungan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`id_trash`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`,`nohp`,`nia`),
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
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `id_trash` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `angsuran_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`),
  ADD CONSTRAINT `angsuran_ibfk_2` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`) ON DELETE CASCADE;

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pinjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD CONSTRAINT `tabungan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tabungan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tabungan_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `tabungan_ibfk_5` FOREIGN KEY (`id_jenis_tabungan`) REFERENCES `jenis_tabungan` (`id_jenis_tabungan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
