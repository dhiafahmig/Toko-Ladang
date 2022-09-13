-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 03:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_ladang`
--

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `month_num` int(11) NOT NULL,
  `month_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`month_num`, `month_name`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `nama_brand` varchar(128) NOT NULL,
  `nama_kat` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL,
  `h_jual` int(11) NOT NULL,
  `h_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `nama_brand`, `nama_kat`, `stok`, `h_jual`, `h_beli`) VALUES
(5, 'Samsung Galaxy S22', 'Samsung', 'Elektronik', 100, 11250000, 10000000),
(6, 'Lenovo IdeaPad 3i 14ITL6-82H701FQID Arctic Grey', 'Lenovo', 'Elektronik', 99, 11250000, 10000000),
(7, 'ASUS VivoBook 14 K413EA-VIPS353 Transparent Silver', 'Asus', 'Elektronik', 100, 13500000, 12000000),
(8, 'Logitech G502 X LIGHTSPEED Wireless Gaming Mouse (Black)', 'Logitech', 'Accessories Computer', 100, 112500, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kat` int(11) NOT NULL,
  `nama_kat` varchar(128) NOT NULL,
  `desk_kat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kat`, `nama_kat`, `desk_kat`) VALUES
(50, 'Alat Tulis', 'Peralatan berbagai alat tulis untuk murid ataupun guru'),
(51, 'Elektronik', 'Alat Elektronik'),
(52, 'Accessories Computer', 'Peralatan khusus komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_jual` int(11) NOT NULL,
  `ref` varchar(128) NOT NULL,
  `nama_sales` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `nama_sekolah` varchar(128) NOT NULL,
  `wilayah` varchar(128) NOT NULL,
  `h_jual` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pembeli` varchar(128) NOT NULL,
  `tgl_beli` date NOT NULL,
  `diskon` int(11) NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_jual`, `ref`, `nama_sales`, `nama_barang`, `nama_sekolah`, `wilayah`, `h_jual`, `banyak`, `subtotal`, `nama_pembeli`, `tgl_beli`, `diskon`, `grandtotal`) VALUES
(21, 'oIsaTe43qF', 'Aldi Setiawan', 'Lenovo IdeaPad 3i 14ITL6-82H701FQID Arctic Grey', 'SMAN 2 Bandar Lampung', 'Bandar Lampung', 11250000, 1, 11250000, 'Fahmi', '2022-09-13', 0, 11250000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sales`
--

CREATE TABLE `tb_sales` (
  `id_sales` int(11) NOT NULL,
  `nama_sales` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_telepon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sales`
--

INSERT INTO `tb_sales` (`id_sales`, `nama_sales`, `alamat`, `no_telepon`) VALUES
(2, 'Aldi Setiawan', 'Kedamaian', '21324412'),
(3, 'Candra', 'Kandis', '1231231');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `wilayah` varchar(128) NOT NULL,
  `npsn` int(16) NOT NULL,
  `no_telepon` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_sekolah`, `nama_sekolah`, `alamat`, `wilayah`, `npsn`, `no_telepon`) VALUES
(2, 'SMAN 9 Bandar Lampung', 'Jl. Panglima Polim No.18, Segala Mider, Kec. Tj. Karang Bar., Kota Bandar Lampung, Lampung 35152', 'Bandar Lampung', 10807070, 721772924),
(3, 'SMAN 2 Bandar Lampung', 'Jl. Amir Hamzah No.01, Gotong Royong, Kec. Tj. Karang Pusat, Kota Bandar Lampung, Lampung 35119', 'Bandar Lampung', 10807063, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Candra Wahyu F', 'candra@gmail.com', 'default.png', '$2y$10$3uGOaFUpOQO4UWpt9f24.OO2UUP1Ab/FZIVvnP5A9ltG/FBaERwqG', 1, 1, 1649111986),
(4, 'admin', 'admin@gmail.com', 'default.png', '$2y$10$Roy4l/1.yx7GgGZcCL76lefSC2VtJ5T3tu2SaRRc7F56FPTrxg5FG', 1, 1, 1649148911),
(5, 'Dhia Fahmi Ghufron', 'dhiafahmighufron@gmail.com', 'default.png', '$2y$10$DiiiMMJEaLJc2whNin7K5.IcH.pTAZBkboe7tP.I40n7DpBZ6WpSm', 1, 1, 1661529705);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`month_num`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kat`),
  ADD UNIQUE KEY `nama_kat` (`nama_kat`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `nama_obat` (`nama_barang`);

--
-- Indexes for table `tb_sales`
--
ALTER TABLE `tb_sales`
  ADD PRIMARY KEY (`id_sales`),
  ADD UNIQUE KEY `no_telepon` (`no_telepon`);

--
-- Indexes for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`),
  ADD UNIQUE KEY `npsn` (`npsn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_sales`
--
ALTER TABLE `tb_sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
