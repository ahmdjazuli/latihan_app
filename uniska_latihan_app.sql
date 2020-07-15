-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 08:40 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniska_latihan_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_harian`
--

CREATE TABLE `absen_harian` (
  `id_absen_harian` int(11) NOT NULL,
  `tgl_absensi` date NOT NULL,
  `nik` varchar(10) NOT NULL,
  `absensi` varchar(16) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_harian`
--

INSERT INTO `absen_harian` (`id_absen_harian`, `tgl_absensi`, `nik`, `absensi`, `keterangan`) VALUES
(8, '2019-05-01', '16710021', 'Masuk', ''),
(9, '2019-05-01', '16710082', 'Sakit', ''),
(10, '2019-05-02', '16710086', 'Izin', ''),
(11, '2019-05-01', '16710086', 'Alpa', ''),
(12, '2020-06-14', '16710082', 'Masuk', '');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `idG` int(11) NOT NULL,
  `namaG` varchar(100) NOT NULL,
  `lokasiG` varchar(100) NOT NULL,
  `luasG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`idG`, `namaG`, `lokasiG`, `luasG`) VALUES
(1, 'Gudang 1', '', 49);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` char(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` char(12) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `jabatan`, `status`) VALUES
('16710021', 'shopi', 'sadas', '2019-04-05', '   Gelap      ', '12312', 'Manager', 'Kontrak'),
('16710082', 'Ahmad Jazuli', 'Martapura', '2019-04-02', 'Kompas', '08971441279', 'Operator', 'Outsourcing'),
('16710086', 'Gaktahu', 'Kevo', '2019-04-09', 'Gelap', '12312', 'Manager', 'Tetap'),
('21313', 'sd', '21312', '2019-05-01', '2112', '3', 'Operator', 'Kontrak');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_gudang`
--

CREATE TABLE `karyawan_gudang` (
  `id` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `idG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_gudang`
--

INSERT INTO `karyawan_gudang` (`id`, `nik`, `idG`) VALUES
(1, '16710021', 1),
(3, '16710082', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` int(255) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `tanggal_lahir`, `alamat`, `kecamatan`, `photo`) VALUES
(5, 'astogeege', '1999-11-17', '111', '111', 'Luan Mu Xibao (49).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` int(255) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `stok` int(4) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `diskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama_produk`, `jenis_produk`, `type`, `warna`, `stok`, `photo`, `diskripsi`) VALUES
(7, 'Hp Cinq', 'Fashion Pria', 'Bekas', 'Hitam', 4, 'ohoo.jpg', 'hitam hp ccin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(10, 'mauk', 'mauk', '$2y$10$ujV0QaRVywZXZA/cxE5lnOdiPlv3VtbSMiV6CeguotgatgAiUH.Ea', 'admin'),
(11, 'gaje', 'gaje', '$2y$10$3ULJ.MPJilQoahzK6nw8QOGLgIg4IU7xS2Ai9d.WiLXTfmfF.gGMS', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_harian`
--
ALTER TABLE `absen_harian`
  ADD PRIMARY KEY (`id_absen_harian`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`idG`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `karyawan_gudang`
--
ALTER TABLE `karyawan_gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_harian`
--
ALTER TABLE `absen_harian`
  MODIFY `id_absen_harian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `idG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karyawan_gudang`
--
ALTER TABLE `karyawan_gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `kode_pelanggan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kode_produk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
