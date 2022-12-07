-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 02:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aset`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aset`
--

CREATE TABLE `tb_aset` (
  `id_aset` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah_aset` int(11) NOT NULL,
  `tgl_peroleh` date NOT NULL,
  `masa_manfaat` int(15) NOT NULL,
  `harga_peroleh` int(11) NOT NULL,
  `status_aset` varchar(11) NOT NULL,
  `kondisi_aset` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_aset`
--

INSERT INTO `tb_aset` (`id_aset`, `id_kategori`, `id_lokasi`, `nama_aset`, `keterangan`, `jumlah_aset`, `tgl_peroleh`, `masa_manfaat`, `harga_peroleh`, `status_aset`, `kondisi_aset`) VALUES
(4, 20, 1, 'Ayam', 'ini bukan ayam biasa', 3, '2022-11-06', 4, 90000, 'Aktif', 'Baik'),
(5, 24, 4, 'Lapang Sepak Bola', 'Lapangan sepak bola sijalak harupat', 89, '2022-11-07', 5, 700000, 'Aktif', 'Baik'),
(6, 21, 1, 'Gelang', 'Gelang tenun khas sumatera', 2, '2022-11-11', 3, 1000, 'Aktif', 'Baik'),
(12, 21, 1, 'Tanah', 'Tanah Hektar', 4, '2022-11-13', 4, 500, 'Aktif', 'Butuh Perawatan'),
(13, 20, 1, 'Tali Rapia', 'Tali ini sangat hebat dalam menali sesuatu yang sifatnya sangat parah', 60, '2020-01-01', 10, 9000000, 'Aktif', 'Baik'),
(14, 25, 5, 'Emas', 'Emas ini sangat berharga banget', 60, '2022-11-16', 10, 10000000, 'Aktif', 'Baik'),
(15, 26, 6, 'Kandang Ayam', 'Kandang ayam pak Hasbi', 1, '2019-01-01', 1, 7000000, 'Tidak Aktif', 'Butuh Perawatan'),
(16, 25, 5, 'Tanah', 'Tanah 4 Hektar', 2, '2016-02-02', 3, 9000000, 'Aktif', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk_barang` varchar(30) NOT NULL,
  `tahun_perolehan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_kategori`, `nama_barang`, `merk_barang`, `tahun_perolehan`) VALUES
(8, 20, 'Uang', 'Artos', 2333),
(9, 21, 'Laptop Dell', 'ASUS', 2099);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(11) NOT NULL,
  `kategori_barang` varchar(50) NOT NULL,
  `terakhir_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kode_kategori`, `kategori_barang`, `terakhir_update`) VALUES
(25, 'EWE', 'ROAR', '2022-11-16 07:35:07'),
(26, 'DOA', 'Syukur', '2022-11-18 02:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `terakhir_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `nama_lokasi`, `terakhir_update`) VALUES
(5, 'Bandung', '2022-11-16 07:35:51'),
(6, 'Probolinggo', '2022-11-18 02:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyusutan`
--

CREATE TABLE `tb_penyusutan` (
  `id_penyusutan` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penyusutan`
--

INSERT INTO `tb_penyusutan` (`id_penyusutan`, `id_aset`) VALUES
(2, 5),
(4, 6),
(5, 12),
(6, 4),
(7, 13),
(8, 14),
(9, 15),
(10, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', '$2y$10$CSAGC.ds', 'admin'),
(2, 'user', 'user', '$2y$10$jnZt841b', ''),
(3, 'edan', 'edan', '$2y$10$e2f/SJOL', ''),
(4, 'Raafi Syarahil Azhar', 'raafi', '$2y$10$GDgg5WaO', ''),
(5, 'hh', 'hh', '$2y$10$.t3Ky.yK', ''),
(6, 'user2', 'user2', '$2y$10$aJbfPkDU', 'user'),
(7, 'remot', 'remot', '$2y$10$AmM1haFW', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_penyusutan`
--
ALTER TABLE `tb_penyusutan`
  ADD PRIMARY KEY (`id_penyusutan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_penyusutan`
--
ALTER TABLE `tb_penyusutan`
  MODIFY `id_penyusutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
