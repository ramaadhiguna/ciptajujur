-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2018 at 08:16 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tajuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` char(12) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `panjang` double DEFAULT NULL,
  `lebar` double DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `nama`, `panjang`, `lebar`, `keterangan`) VALUES
('RBH100', 'Roll Bludru Hijau', 20000, 2, NULL),
('RBM100', 'Roll Bludru Merah', 100000, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` char(12) NOT NULL,
  `namaBarang` varchar(45) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `satuan` varchar(45) DEFAULT NULL,
  `minimum` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idBarang`, `namaBarang`, `kuantitas`, `satuan`, `minimum`, `keterangan`) VALUES
('BHB200100', 'Bludru Halus Biru 200 x 100 cm', 5112, 'lembar', 2000, NULL),
('BKH10050', 'Bludru Kasar Hijau 100 x 50 cm', 12000, 'Lembar', 2000, NULL),
('BKK10050', 'Bludru Kuning Kasar 100 x 50 cm', 4000, 'lembar', NULL, ' '),
('BKM10050', 'Bludru Kasar Merah 100 x 50 cm', 8000, 'lembar', 2000, NULL),
('BKM200100', 'Bludru Kasar Merah 200 x 100', 10100, 'lembar', 2000, NULL),
('BKO10050', 'Bludru Kasar Oranye 10050 ', 3000, 'lembar', NULL, ' '),
('KHM10050', 'Karpet Halus Merah 100 x 50', 5000, 'lembar', 2000, NULL),
('KHM200100', 'Karpet Halus Merah 200 x 100 cm', 2000, 'pcs', 1500, NULL),
('KHU10050', 'Karpet Halus Ungu 100 x 50 cm', 300, 'pcs', NULL, ' '),
('KKB10050', 'Karpet Kasar Biru 100 x 50 cm', 5000, 'pcs', 2000, NULL),
('KKH10050', 'Karpet Kasar Hijau 100 x 50 cm', 4000, 'lembar', 2000, NULL),
('SBH10050', 'Selimut Bulu Hijau 100 x 50 cm', 5000, 'pcs', 2000, NULL),
('SHB200100', 'Selimut Halus Biru 200 x 100 cm', 5000, 'pcs', 1500, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `alamat` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `nama`, `kontak`, `alamat`) VALUES
(0, 'CV Toyota', '12344', 'jalan bagus sekali');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idKaryawan` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `nama`, `alamat`, `kontak`, `status`, `jabatan`) VALUES
(0, 'Vemmy Testing', 'Rumah Serpong', '0812345677', 0, 'Pemilik'),
(1, 'Sonny Haryadi', 'Kusuma Bangsa', '082243883642', 0, 'Gudang'),
(2, 'Lucas Leonard', 'RMS UBAYA', '123456789', 0, 'Penjualan'),
(3, 'Evin Cintiawan', 'RMS AJ13', '123456789', 0, 'Pembelian');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` char(12) NOT NULL,
  `Supplier_idSupplier` int(11) DEFAULT NULL,
  `Karyawan_idKaryawan` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `invoice_asli` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `Supplier_idSupplier`, `Karyawan_idKaryawan`, `tanggal`, `tanggal_jatuh_tempo`, `saldo`, `invoice_asli`) VALUES
('180122001', 2, 0, '2018-01-22', '2018-02-21', 13500000, NULL),
('180122002', 2, 0, '2018-01-22', '2018-02-21', 0, NULL),
('180122003', 2, 0, '2018-01-22', '2018-02-21', 0, NULL),
('180122004', 1, 0, '2018-01-22', '2018-02-21', 0, NULL),
('180122005', 1, 0, '2018-01-22', '2018-02-21', 0, NULL),
('180122006', 2, 0, '2018-01-22', '2018-02-21', 0, NULL),
('180122007', 2, 0, '2018-01-22', '2018-02-21', 0, NULL),
('180122008', 1, 0, '2018-01-22', '2018-02-21', 0, NULL),
('180122009', 1, 0, '2018-01-22', '2018-02-21', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelianpo`
--

CREATE TABLE `pembelianpo` (
  `id` char(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `Supplier_idSupplier` int(11) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  `keterangan` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelianpo`
--

INSERT INTO `pembelianpo` (`id`, `tanggal`, `Supplier_idSupplier`, `Karyawan_idKaryawan`, `keterangan`) VALUES
('180122001', '2018-01-22', 1, 0, 'undefined'),
('180122002', '2018-01-22', 2, 0, 'undefined'),
('180122003', '2018-01-22', 1, 0, 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `pembelianpo_has_bahan`
--

CREATE TABLE `pembelianpo_has_bahan` (
  `id` int(11) NOT NULL,
  `pembelianPO_id` char(20) NOT NULL,
  `bahan_id` char(12) NOT NULL,
  `panjang` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pembelianpo_has_barang`
--

CREATE TABLE `pembelianpo_has_barang` (
  `id` int(11) NOT NULL,
  `pembelianPO_id` char(20) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelianpo_has_barang`
--

INSERT INTO `pembelianpo_has_barang` (`id`, `pembelianPO_id`, `Barang_idBarang`, `qty`, `harga`, `saldo`) VALUES
(28, '180122001', 'BHB200100', 100, 1000, 100),
(29, '180122002', 'BKM200100', 100, 10000, 100),
(30, '180122003', 'BHB200100', 12, 50000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_has_bahan`
--

CREATE TABLE `pembelian_has_bahan` (
  `id` int(11) NOT NULL,
  `Pembelian_id` char(12) NOT NULL,
  `bahan_id` char(12) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_has_barang`
--

CREATE TABLE `pembelian_has_barang` (
  `id` int(11) NOT NULL,
  `Pembelian_id` char(12) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian_has_barang`
--

INSERT INTO `pembelian_has_barang` (`id`, `Pembelian_id`, `Barang_idBarang`, `kuantitas`, `harga`) VALUES
(1, '180122001', 'BHB200100', 500, 10000),
(2, '180122001', 'BKO10050', 1000, 8500),
(3, '180122002', 'BKM10050', 0, 7500),
(4, '180122002', 'BHB200100', 0, 10000),
(5, '180122002', 'BKO10050', 2000, 8500),
(6, '180122002', 'BKK10050', 0, 7500),
(7, '180122003', 'BHB200100', 0, 10000),
(8, '180122003', 'BKO10050', 0, 8500),
(9, '180122003', 'BKM10050', 0, 7500),
(10, '180122003', 'BKK10050', 4000, 7500),
(11, '180122004', 'BHB200100', 50, 1000),
(12, '180122005', 'BHB200100', 50, 1000),
(13, '180122006', 'BKM200100', 50, 10000),
(14, '180122007', 'BKM200100', 50, 10000),
(15, '180122008', 'BHB200100', 5, 50000),
(16, '180122009', 'BHB200100', 7, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_pembayaran`
--

CREATE TABLE `pembelian_pembayaran` (
  `id` int(11) NOT NULL,
  `Pembelian_id` char(12) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian_pembayaran`
--

INSERT INTO `pembelian_pembayaran` (`id`, `Pembelian_id`, `jumlah`, `keterangan`, `tanggal_bayar`) VALUES
(1, '180122001', 13500000, '`12', '2018-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `idNota` char(12) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  `Customer_idCustomer` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `status_kirim` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`idNota`, `Karyawan_idKaryawan`, `Customer_idCustomer`, `tanggal`, `tanggal_jatuh_tempo`, `saldo`, `status_kirim`) VALUES
('180122001', 0, 0, '2018-01-22', '0000-00-00', 1000000, 'Sampai'),
('180122002', 0, 0, '2018-01-22', '2018-01-22', 0, 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `penjualanpo`
--

CREATE TABLE `penjualanpo` (
  `idpenjualanPO` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `Customer_idCustomer` int(11) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penjualanpo_has_barang`
--

CREATE TABLE `penjualanpo_has_barang` (
  `penjualanPO_idpenjualanPO` int(11) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_has_barang`
--

CREATE TABLE `penjualan_has_barang` (
  `id` int(11) NOT NULL,
  `Penjualan_idNota` char(12) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan_has_barang`
--

INSERT INTO `penjualan_has_barang` (`id`, `Penjualan_idNota`, `Barang_idBarang`, `kuantitas`, `harga`) VALUES
(5, '180122001', 'BKM10050', 100, 10000),
(6, '180122002', 'BHB200100', 150, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_pembayaran`
--

CREATE TABLE `penjualan_pembayaran` (
  `id` int(11) NOT NULL,
  `Penjualan_idNota` char(12) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan_pembayaran`
--

INSERT INTO `penjualan_pembayaran` (`id`, `Penjualan_idNota`, `jumlah`, `keterangan`, `tanggal_bayar`) VALUES
(1, '180122001', 50000, 'lol', '2018-01-22'),
(2, '180122001', 950000, 'as', '2018-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(45) DEFAULT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id`, `tanggal`, `Karyawan_idKaryawan`) VALUES
(6, '2018-01-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produksi_has_barang`
--

CREATE TABLE `produksi_has_barang` (
  `id` int(11) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `Produksi_id` int(11) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL,
  `jenis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produksi_has_barang`
--

INSERT INTO `produksi_has_barang` (`id`, `kuantitas`, `Produksi_id`, `Barang_idBarang`, `jenis`) VALUES
(3, 200, 6, 'BHB200100', 'bahan'),
(4, 200, 6, 'BKM10050', 'bahan'),
(5, 300, 6, 'KHU10050', 'barang');

-- --------------------------------------------------------

--
-- Table structure for table `prosesbahan`
--

CREATE TABLE `prosesbahan` (
  `idprosesbahan` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prosesbahan_has_bahan`
--

CREATE TABLE `prosesbahan_has_bahan` (
  `prosesbahan_idprosesbahan` int(11) NOT NULL,
  `bahan_id` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prosesbahan_has_barang`
--

CREATE TABLE `prosesbahan_has_barang` (
  `prosesbahan_idprosesbahan` int(11) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idSupplier` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `nama`, `kontak`, `alamat`) VALUES
(1, 'CV Tajuk', '123445666', 'Rumah Om Joni'),
(2, 'CV Fitrah Jaya Murni', '081234567890', 'Jl. Sudirman No 100 Jakarta'),
(3, 'CV Indonesia Cerah Jaya', '08786756452', 'Jl. Ahmad Yani 34 FlyOver Surabaya'),
(4, 'CV Matahari Cerah', '087667467837', 'Jl. Patimura Uhut Ruko Sambalado Aster 20 Ban');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `isDelete` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Karyawan_idKaryawan`, `username`, `password`, `isDelete`) VALUES
(0, 0, 'vemmy', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(1, 1, 'sonny', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(2, 2, 'lucas', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(3, 3, 'evin', '827ccb0eea8a706c4c34a16891f84e7b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idKaryawan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Pembelian_Karyawan1_idx` (`Karyawan_idKaryawan`),
  ADD KEY `fk_Pembelian_Supplier1_idx` (`Supplier_idSupplier`);

--
-- Indexes for table `pembelianpo`
--
ALTER TABLE `pembelianpo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembelianPO_Supplier1_idx` (`Supplier_idSupplier`),
  ADD KEY `fk_pembelianPO_Karyawan1_idx` (`Karyawan_idKaryawan`);

--
-- Indexes for table `pembelianpo_has_bahan`
--
ALTER TABLE `pembelianpo_has_bahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembelianPO_has_bahan_bahan1_idx` (`bahan_id`),
  ADD KEY `fk_pembelianPO_has_bahan_pembelianPO1_idx` (`pembelianPO_id`);

--
-- Indexes for table `pembelianpo_has_barang`
--
ALTER TABLE `pembelianpo_has_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembelianPO_has_Barang_Barang1_idx` (`Barang_idBarang`),
  ADD KEY `fk_pembelianPO_has_Barang_pembelianPO1_idx` (`pembelianPO_id`);

--
-- Indexes for table `pembelian_has_bahan`
--
ALTER TABLE `pembelian_has_bahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Pembelian_has_bahan_bahan1_idx` (`bahan_id`),
  ADD KEY `fk_Pembelian_has_bahan_Pembelian1_idx` (`Pembelian_id`);

--
-- Indexes for table `pembelian_has_barang`
--
ALTER TABLE `pembelian_has_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Pembelian_has_Barang_Barang1_idx` (`Barang_idBarang`),
  ADD KEY `fk_Pembelian_has_Barang_Pembelian1_idx` (`Pembelian_id`);

--
-- Indexes for table `pembelian_pembayaran`
--
ALTER TABLE `pembelian_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Pembelian_Pembayaran_Pembelian1` (`Pembelian_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idNota`),
  ADD KEY `fk_Nota_Karyawan1_idx` (`Karyawan_idKaryawan`),
  ADD KEY `fk_Penjualan_Customer1_idx` (`Customer_idCustomer`);

--
-- Indexes for table `penjualanpo`
--
ALTER TABLE `penjualanpo`
  ADD PRIMARY KEY (`idpenjualanPO`),
  ADD KEY `fk_penjualanPO_Customer1_idx` (`Customer_idCustomer`),
  ADD KEY `fk_penjualanPO_Karyawan1_idx` (`Karyawan_idKaryawan`);

--
-- Indexes for table `penjualanpo_has_barang`
--
ALTER TABLE `penjualanpo_has_barang`
  ADD KEY `fk_penjualanPO_has_Barang_Barang1_idx` (`Barang_idBarang`),
  ADD KEY `fk_penjualanPO_has_Barang_penjualanPO1_idx` (`penjualanPO_idpenjualanPO`);

--
-- Indexes for table `penjualan_has_barang`
--
ALTER TABLE `penjualan_has_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Penjualan_has_Barang_Barang1_idx` (`Barang_idBarang`),
  ADD KEY `fk_Penjualan_has_Barang_Penjualan1_idx` (`Penjualan_idNota`);

--
-- Indexes for table `penjualan_pembayaran`
--
ALTER TABLE `penjualan_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penjualan_pembayaran_Penjualan1_idx` (`Penjualan_idNota`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Produksi_Karyawan1_idx` (`Karyawan_idKaryawan`);

--
-- Indexes for table `produksi_has_barang`
--
ALTER TABLE `produksi_has_barang`
  ADD PRIMARY KEY (`id`,`Produksi_id`,`Barang_idBarang`),
  ADD KEY `fk_Produksi_has_Barang_Produksi1_idx` (`Produksi_id`),
  ADD KEY `fk_Produksi_has_Barang_Barang1_idx` (`Barang_idBarang`);

--
-- Indexes for table `prosesbahan`
--
ALTER TABLE `prosesbahan`
  ADD PRIMARY KEY (`idprosesbahan`);

--
-- Indexes for table `prosesbahan_has_bahan`
--
ALTER TABLE `prosesbahan_has_bahan`
  ADD KEY `fk_prosesbahan_has_bahan_bahan1_idx` (`bahan_id`),
  ADD KEY `fk_prosesbahan_has_bahan_prosesbahan1_idx` (`prosesbahan_idprosesbahan`);

--
-- Indexes for table `prosesbahan_has_barang`
--
ALTER TABLE `prosesbahan_has_barang`
  ADD KEY `fk_prosesbahan_has_Barang_Barang1_idx` (`Barang_idBarang`),
  ADD KEY `fk_prosesbahan_has_Barang_prosesbahan1_idx` (`prosesbahan_idprosesbahan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idSupplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_User_Karyawan1_idx` (`Karyawan_idKaryawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelianpo_has_bahan`
--
ALTER TABLE `pembelianpo_has_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembelianpo_has_barang`
--
ALTER TABLE `pembelianpo_has_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pembelian_has_bahan`
--
ALTER TABLE `pembelian_has_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembelian_has_barang`
--
ALTER TABLE `pembelian_has_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pembelian_pembayaran`
--
ALTER TABLE `pembelian_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penjualan_has_barang`
--
ALTER TABLE `penjualan_has_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `penjualan_pembayaran`
--
ALTER TABLE `penjualan_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `produksi_has_barang`
--
ALTER TABLE `produksi_has_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_Pembelian_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pembelian_Supplier1` FOREIGN KEY (`Supplier_idSupplier`) REFERENCES `supplier` (`idSupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelianpo`
--
ALTER TABLE `pembelianpo`
  ADD CONSTRAINT `fk_pembelianPO_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembelianPO_Supplier1` FOREIGN KEY (`Supplier_idSupplier`) REFERENCES `supplier` (`idSupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelianpo_has_bahan`
--
ALTER TABLE `pembelianpo_has_bahan`
  ADD CONSTRAINT `fk_pembelianPO_has_bahan_bahan1` FOREIGN KEY (`bahan_id`) REFERENCES `bahan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembelianPO_has_bahan_pembelianPO1` FOREIGN KEY (`pembelianPO_id`) REFERENCES `pembelianpo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelianpo_has_barang`
--
ALTER TABLE `pembelianpo_has_barang`
  ADD CONSTRAINT `fk_pembelianPO_has_Barang_Barang1` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembelianPO_has_Barang_pembelianPO1` FOREIGN KEY (`pembelianPO_id`) REFERENCES `pembelianpo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian_has_bahan`
--
ALTER TABLE `pembelian_has_bahan`
  ADD CONSTRAINT `fk_Pembelian_has_bahan_Pembelian1` FOREIGN KEY (`Pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pembelian_has_bahan_bahan1` FOREIGN KEY (`bahan_id`) REFERENCES `bahan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian_has_barang`
--
ALTER TABLE `pembelian_has_barang`
  ADD CONSTRAINT `fk_Pembelian_has_Barang_Barang1` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pembelian_has_Barang_Pembelian1` FOREIGN KEY (`Pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian_pembayaran`
--
ALTER TABLE `pembelian_pembayaran`
  ADD CONSTRAINT `fk_Pembelian_Pembayaran_Pembelian1` FOREIGN KEY (`Pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_Nota_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Penjualan_Customer1` FOREIGN KEY (`Customer_idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualanpo`
--
ALTER TABLE `penjualanpo`
  ADD CONSTRAINT `fk_penjualanPO_Customer1` FOREIGN KEY (`Customer_idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualanPO_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualanpo_has_barang`
--
ALTER TABLE `penjualanpo_has_barang`
  ADD CONSTRAINT `fk_penjualanPO_has_Barang_Barang1` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualanPO_has_Barang_penjualanPO1` FOREIGN KEY (`penjualanPO_idpenjualanPO`) REFERENCES `penjualanpo` (`idpenjualanPO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan_has_barang`
--
ALTER TABLE `penjualan_has_barang`
  ADD CONSTRAINT `fk_Penjualan_has_Barang_Barang1` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Penjualan_has_Barang_Penjualan1` FOREIGN KEY (`Penjualan_idNota`) REFERENCES `penjualan` (`idNota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan_pembayaran`
--
ALTER TABLE `penjualan_pembayaran`
  ADD CONSTRAINT `fk_penjualan_pembayaran_Penjualan1` FOREIGN KEY (`Penjualan_idNota`) REFERENCES `penjualan` (`idNota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `fk_Produksi_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produksi_has_barang`
--
ALTER TABLE `produksi_has_barang`
  ADD CONSTRAINT `fk_Produksi_has_Barang_Barang1` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Produksi_has_Barang_Produksi1` FOREIGN KEY (`Produksi_id`) REFERENCES `produksi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prosesbahan_has_bahan`
--
ALTER TABLE `prosesbahan_has_bahan`
  ADD CONSTRAINT `fk_prosesbahan_has_bahan_bahan1` FOREIGN KEY (`bahan_id`) REFERENCES `bahan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prosesbahan_has_bahan_prosesbahan1` FOREIGN KEY (`prosesbahan_idprosesbahan`) REFERENCES `prosesbahan` (`idprosesbahan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prosesbahan_has_barang`
--
ALTER TABLE `prosesbahan_has_barang`
  ADD CONSTRAINT `fk_prosesbahan_has_Barang_Barang1` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prosesbahan_has_Barang_prosesbahan1` FOREIGN KEY (`prosesbahan_idprosesbahan`) REFERENCES `prosesbahan` (`idprosesbahan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
