/*
MySQL Data Transfer
Source Host: localhost
Source Database: ciptajujur
Target Host: localhost
Target Database: ciptajujur
Date: 1/25/2018 1:33:52 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for bahan
-- ----------------------------
CREATE TABLE `bahan` (
  `id` char(12) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `panjang` double DEFAULT NULL,
  `lebar` double DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
CREATE TABLE `barang` (
  `idBarang` char(12) NOT NULL,
  `namaBarang` varchar(45) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `satuan` varchar(45) DEFAULT NULL,
  `minimum` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idBarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
CREATE TABLE `customer` (
  `idCustomer` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `alamat` longtext,
  PRIMARY KEY (`idCustomer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
CREATE TABLE `karyawan` (
  `idKaryawan` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idKaryawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
CREATE TABLE `pembelian` (
  `id` char(12) NOT NULL,
  `Supplier_idSupplier` int(11) DEFAULT NULL,
  `Karyawan_idKaryawan` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `invoice_asli` char(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Pembelian_Karyawan1_idx` (`Karyawan_idKaryawan`),
  KEY `fk_Pembelian_Supplier1_idx` (`Supplier_idSupplier`),
  CONSTRAINT `fk_Pembelian_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pembelian_Supplier1` FOREIGN KEY (`Supplier_idSupplier`) REFERENCES `supplier` (`idSupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pembelian_has_bahan
-- ----------------------------
CREATE TABLE `pembelian_has_bahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Pembelian_id` char(12) NOT NULL,
  `bahan_id` char(12) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Pembelian_has_bahan_bahan1_idx` (`bahan_id`),
  KEY `fk_Pembelian_has_bahan_Pembelian1_idx` (`Pembelian_id`),
  CONSTRAINT `fk_Pembelian_has_bahan_Pembelian1` FOREIGN KEY (`Pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pembelian_has_bahan_bahan1` FOREIGN KEY (`bahan_id`) REFERENCES `bahan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pembelian_has_barang
-- ----------------------------
CREATE TABLE `pembelian_has_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Pembelian_id` char(12) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Pembelian_has_Barang_Barang1_idx` (`Barang_idBarang`),
  KEY `fk_Pembelian_has_Barang_Pembelian1_idx` (`Pembelian_id`),
  CONSTRAINT `fk_Pembelian_has_Barang_Barang1` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pembelian_has_Barang_Pembelian1` FOREIGN KEY (`Pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pembelian_pembayaran
-- ----------------------------
CREATE TABLE `pembelian_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Pembelian_id` char(12) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Pembelian_Pembayaran_Pembelian1` (`Pembelian_id`),
  CONSTRAINT `fk_Pembelian_Pembayaran_Pembelian1` FOREIGN KEY (`Pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pembelianpo
-- ----------------------------
CREATE TABLE `pembelianpo` (
  `id` char(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `Supplier_idSupplier` int(11) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  `keterangan` longtext,
  PRIMARY KEY (`id`),
  KEY `fk_pembelianPO_Supplier1_idx` (`Supplier_idSupplier`),
  KEY `fk_pembelianPO_Karyawan1_idx` (`Karyawan_idKaryawan`),
  CONSTRAINT `fk_pembelianPO_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pembelianPO_Supplier1` FOREIGN KEY (`Supplier_idSupplier`) REFERENCES `supplier` (`idSupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pembelianpo_has_bahan
-- ----------------------------
CREATE TABLE `pembelianpo_has_bahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembelianPO_id` char(20) NOT NULL,
  `bahan_id` char(12) NOT NULL,
  `panjang` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pembelianPO_has_bahan_bahan1_idx` (`bahan_id`),
  KEY `fk_pembelianPO_has_bahan_pembelianPO1_idx` (`pembelianPO_id`),
  CONSTRAINT `fk_pembelianPO_has_bahan_bahan1` FOREIGN KEY (`bahan_id`) REFERENCES `bahan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pembelianPO_has_bahan_pembelianPO1` FOREIGN KEY (`pembelianPO_id`) REFERENCES `pembelianpo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pembelianpo_has_barang
-- ----------------------------
CREATE TABLE `pembelianpo_has_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembelianPO_id` char(20) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pembelianPO_has_Barang_Barang1_idx` (`Barang_idBarang`),
  KEY `fk_pembelianPO_has_Barang_pembelianPO1_idx` (`pembelianPO_id`),
  CONSTRAINT `fk_pembelianPO_has_Barang_Barang1` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pembelianPO_has_Barang_pembelianPO1` FOREIGN KEY (`pembelianPO_id`) REFERENCES `pembelianpo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
CREATE TABLE `penjualan` (
  `idNota` char(12) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  `Customer_idCustomer` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `status_kirim` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idNota`),
  KEY `fk_Nota_Karyawan1_idx` (`Karyawan_idKaryawan`),
  KEY `fk_Penjualan_Customer1_idx` (`Customer_idCustomer`),
  CONSTRAINT `fk_Nota_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Penjualan_Customer1` FOREIGN KEY (`Customer_idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for penjualan_has_barang
-- ----------------------------
CREATE TABLE `penjualan_has_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Penjualan_idNota` char(12) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Penjualan_has_Barang_Barang1_idx` (`Barang_idBarang`),
  KEY `fk_Penjualan_has_Barang_Penjualan1_idx` (`Penjualan_idNota`),
  CONSTRAINT `fk_Penjualan_has_Barang_Barang1` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Penjualan_has_Barang_Penjualan1` FOREIGN KEY (`Penjualan_idNota`) REFERENCES `penjualan` (`idNota`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for penjualan_pembayaran
-- ----------------------------
CREATE TABLE `penjualan_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Penjualan_idNota` char(12) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_penjualan_pembayaran_Penjualan1_idx` (`Penjualan_idNota`),
  CONSTRAINT `fk_penjualan_pembayaran_Penjualan1` FOREIGN KEY (`Penjualan_idNota`) REFERENCES `penjualan` (`idNota`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for penjualanpo
-- ----------------------------
CREATE TABLE `penjualanpo` (
  `idpenjualanPO` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `Customer_idCustomer` int(11) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  PRIMARY KEY (`idpenjualanPO`),
  KEY `fk_penjualanPO_Customer1_idx` (`Customer_idCustomer`),
  KEY `fk_penjualanPO_Karyawan1_idx` (`Karyawan_idKaryawan`),
  CONSTRAINT `fk_penjualanPO_Customer1` FOREIGN KEY (`Customer_idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_penjualanPO_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for penjualanpo_has_barang
-- ----------------------------
CREATE TABLE `penjualanpo_has_barang` (
  `penjualanPO_idpenjualanPO` int(11) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  KEY `fk_penjualanPO_has_Barang_Barang1_idx` (`Barang_idBarang`),
  KEY `fk_penjualanPO_has_Barang_penjualanPO1_idx` (`penjualanPO_idpenjualanPO`),
  CONSTRAINT `fk_penjualanPO_has_Barang_Barang1` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_penjualanPO_has_Barang_penjualanPO1` FOREIGN KEY (`penjualanPO_idpenjualanPO`) REFERENCES `penjualanpo` (`idpenjualanPO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for produksi
-- ----------------------------
CREATE TABLE `produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(45) DEFAULT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Produksi_Karyawan1_idx` (`Karyawan_idKaryawan`),
  CONSTRAINT `fk_Produksi_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for produksi_has_barang
-- ----------------------------
CREATE TABLE `produksi_has_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kuantitas` int(11) DEFAULT NULL,
  `Produksi_id` int(11) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`Produksi_id`,`Barang_idBarang`),
  KEY `fk_Produksi_has_Barang_Produksi1_idx` (`Produksi_id`),
  KEY `fk_Produksi_has_Barang_Barang1_idx` (`Barang_idBarang`),
  CONSTRAINT `fk_Produksi_has_Barang_Barang1` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Produksi_has_Barang_Produksi1` FOREIGN KEY (`Produksi_id`) REFERENCES `produksi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for prosesbahan
-- ----------------------------
CREATE TABLE `prosesbahan` (
  `idprosesbahan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`idprosesbahan`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for prosesbahan_has_bahan
-- ----------------------------
CREATE TABLE `prosesbahan_has_bahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Prosesbahan_id` int(11) NOT NULL,
  `Bahan_id` char(12) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for prosesbahan_has_barang
-- ----------------------------
CREATE TABLE `prosesbahan_has_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Prosesbahan_id` int(11) NOT NULL,
  `Barang_idBarang` char(12) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
CREATE TABLE `supplier` (
  `idSupplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSupplier`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Karyawan_idKaryawan` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `isDelete` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_User_Karyawan1_idx` (`Karyawan_idKaryawan`),
  CONSTRAINT `fk_User_Karyawan1` FOREIGN KEY (`Karyawan_idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `bahan` VALUES ('RBH100', 'Roll Bludru Hijau 100 x 50 cm', '3000', '1', 'sss');
INSERT INTO `bahan` VALUES ('RBH101', 'ROLL Beludru Hijau extended', '2300', '150', 'tidak ada keterangan');
INSERT INTO `bahan` VALUES ('RBM100', 'Roll Bludru Merah', '1850', '200', 'j');
INSERT INTO `barang` VALUES ('', '', '0', '', null, ' ');
INSERT INTO `barang` VALUES ('BHB200100', 'Bludru Halus Biru 200 x 100 cm', '99', 'lembar', '100', ' ');
INSERT INTO `barang` VALUES ('BKH10050', 'Bludru Kasar Hijau 100 x 50 cm', '12849', 'Lembar', '2000', null);
INSERT INTO `barang` VALUES ('BKHT10050', 'Bludru Kasar Hitam 100 x 50 cm', '-1', 'lembar', null, ' ');
INSERT INTO `barang` VALUES ('BKJ10050', 'Bludru Kasar Jingga 100 x 50 cm', '4999', 'lembar', null, ' ');
INSERT INTO `barang` VALUES ('BKK10050', 'Bludru Kuning Kasar 100 x 50 cm', '3900', 'lembar', null, ' ');
INSERT INTO `barang` VALUES ('BKM10050', 'Bludru Kasar Merah 100 x 50 cm', '8014', 'lembar', '2000', null);
INSERT INTO `barang` VALUES ('BKM200100', 'Bludru Kasar Merah 200 x 100', '10500', 'lembar', '2000', null);
INSERT INTO `barang` VALUES ('BKO10050', 'Bludru Kasar Oranye 100 x 50 cm', '3650', 'lembar', '500', ' lol');
INSERT INTO `barang` VALUES ('BKP10050', 'Bludru Kasar Pink 100 x 50 cm', '300', 'lembar', null, ' ');
INSERT INTO `barang` VALUES ('KHM10050', 'Karpet Halus Merah 100 x 50', '5083', 'lembar', '2000', null);
INSERT INTO `barang` VALUES ('KHM200100', 'Karpet Halus Merah 200 x 100 cm', '2685', 'pcs', '1500', null);
INSERT INTO `barang` VALUES ('KHU10050', 'Karpet Halus Ungu 100 x 50 cm', '252', 'pcs', null, ' ');
INSERT INTO `barang` VALUES ('KKB10050', 'Karpet Kasar Biru 100 x 50 cm', '5000', 'pcs', '2000', null);
INSERT INTO `barang` VALUES ('KKH10050', 'Karpet Kasar Hijau 100 x 50 cm', '4000', 'lembar', '2000', null);
INSERT INTO `barang` VALUES ('SBH10050', 'Selimut Bulu Hijau 100 x 50 cm', '4988', 'pcs', '2000', null);
INSERT INTO `barang` VALUES ('SHB200100', 'Selimut Halus Biru 200 x 100 cm', '5300', 'pcs', '1500', 'coba');
INSERT INTO `customer` VALUES ('1', 'FSK BERSAUDARA', '554565', 'Kalimantan TImurA');
INSERT INTO `karyawan` VALUES ('1', 'Sonny Haryadi', 'Kusuma Bangsa', '08224388364', '0', 'Penjualan');
INSERT INTO `karyawan` VALUES ('2', 'Lucas Leonard', 'RMS UBAYA', '123456789', '0', 'Penjualan');
INSERT INTO `karyawan` VALUES ('3', 'Evin Cintiawan', 'RMS AJ13', '123456789', '0', 'Pembelian');
INSERT INTO `karyawan` VALUES ('4', 'Admin Tajuk', 'Kantor Tajuk', '646', '0', 'Pemilik');
INSERT INTO `karyawan` VALUES ('5', 'Sonia Fernandez', 'Kantor Tajuk', '556', '0', 'Pemilik');
INSERT INTO `pembelian` VALUES ('180124001', '2', '1', '2018-01-24', '2018-02-23', '89000', null);
INSERT INTO `pembelian` VALUES ('180124002', '3', '1', '2018-01-24', '2018-02-23', '990000', null);
INSERT INTO `pembelian` VALUES ('180124003', '3', '1', '2018-01-24', '2018-02-23', '500000', null);
INSERT INTO `pembelian` VALUES ('180124004', '2', '1', '2018-01-24', '2018-02-23', '3749850', null);
INSERT INTO `pembelian` VALUES ('180124005', '4', '1', '2018-01-24', '2018-02-23', '6000000', null);
INSERT INTO `pembelian` VALUES ('180124006', '5', '1', '2018-01-24', '2018-02-23', '6000000', null);
INSERT INTO `pembelian` VALUES ('180124007', '5', '1', '2018-01-24', '2018-02-23', '1000000', null);
INSERT INTO `pembelian` VALUES ('180124008', '6', '1', '2018-01-24', '2018-02-23', '7000000', null);
INSERT INTO `pembelian` VALUES ('180124009', '3', '1', '2018-01-24', '2018-02-23', '15000000', null);
INSERT INTO `pembelian` VALUES ('180124010', '5', '1', '2018-01-24', '2018-02-23', '3750000', null);
INSERT INTO `pembelian` VALUES ('180124011', '5', '1', '2018-01-24', '2018-02-23', '2999800', null);
INSERT INTO `pembelian` VALUES ('180124012', '5', '1', '2018-01-24', '2018-02-23', '1000000', null);
INSERT INTO `pembelian` VALUES ('180125001', '5', '1', '2018-01-25', '2018-02-24', '15150000', null);
INSERT INTO `pembelian` VALUES ('180125002', '1', '1', '2018-01-25', '2018-02-24', '8939804', null);
INSERT INTO `pembelian` VALUES ('180125003', '1', '1', '2018-01-25', '2018-02-24', '0', null);
INSERT INTO `pembelian` VALUES ('180125004', '1', '1', '2018-01-25', '2018-02-24', '0', null);
INSERT INTO `pembelian_has_bahan` VALUES ('1', '180124002', 'RBH101', '0', '5000');
INSERT INTO `pembelian_has_bahan` VALUES ('2', '180124003', 'RBH101', '100', '5000');
INSERT INTO `pembelian_has_bahan` VALUES ('3', '180124004', 'RBH101', '150', '24999');
INSERT INTO `pembelian_has_bahan` VALUES ('4', '180124006', 'RBM100', '0', '15000');
INSERT INTO `pembelian_has_bahan` VALUES ('5', '180124007', 'RBM100', '50', '10000');
INSERT INTO `pembelian_has_bahan` VALUES ('6', '180124008', 'RBH101', '200', '10000');
INSERT INTO `pembelian_has_bahan` VALUES ('7', '180124010', 'RBM100', '250', '15000');
INSERT INTO `pembelian_has_bahan` VALUES ('8', '180124011', 'RBM100', '200', '10000');
INSERT INTO `pembelian_has_bahan` VALUES ('9', '180124012', 'RBM100', '50', '10000');
INSERT INTO `pembelian_has_bahan` VALUES ('10', '180125001', 'RBH101', '1500', '10000');
INSERT INTO `pembelian_has_bahan` VALUES ('11', '180125002', 'RBH101', '196', '14999');
INSERT INTO `pembelian_has_bahan` VALUES ('12', '180125003', 'RBH101', '4', '14999');
INSERT INTO `pembelian_has_bahan` VALUES ('13', '180125004', 'RBH100', '2000', '9996');
INSERT INTO `pembelian_has_barang` VALUES ('35', '180124001', 'KHM10050', '89', '1000');
INSERT INTO `pembelian_has_barang` VALUES ('36', '180124002', 'BHB200100', '99', '10000');
INSERT INTO `pembelian_has_barang` VALUES ('37', '180124003', 'BHB200100', '0', '10000');
INSERT INTO `pembelian_has_barang` VALUES ('38', '180124005', 'BKP10050', '300', '20000');
INSERT INTO `pembelian_has_barang` VALUES ('39', '180124005', '', '0', '0');
INSERT INTO `pembelian_has_barang` VALUES ('40', '180124006', 'BKM200100', '300', '20000');
INSERT INTO `pembelian_has_barang` VALUES ('41', '180124007', 'KHM200100', '50', '10000');
INSERT INTO `pembelian_has_barang` VALUES ('42', '180124008', 'BKO10050', '500', '10000');
INSERT INTO `pembelian_has_barang` VALUES ('43', '180124009', 'KHM200100', '600', '25000');
INSERT INTO `pembelian_has_barang` VALUES ('44', '180124010', 'BKM200100', '0', '20000');
INSERT INTO `pembelian_has_barang` VALUES ('45', '180124011', 'BKM200100', '100', '9998');
INSERT INTO `pembelian_has_barang` VALUES ('46', '180124012', 'KHM200100', '50', '10000');
INSERT INTO `pembelian_has_barang` VALUES ('47', '180125001', 'BKM10050', '15', '10000');
INSERT INTO `pembelian_has_barang` VALUES ('48', '180125002', 'SHB200100', '300', '20000');
INSERT INTO `pembelian_has_barang` VALUES ('49', '180125003', 'SHB200100', '0', '20000');
INSERT INTO `pembelian_has_barang` VALUES ('50', '180125004', 'BKO10050', '150', '20000');
INSERT INTO `pembelian_pembayaran` VALUES ('8', '180124001', '100000', 'sdsds', '2018-01-24');
INSERT INTO `pembelian_pembayaran` VALUES ('9', '180124001', '-1000', 'q', '2018-01-24');
INSERT INTO `pembelian_pembayaran` VALUES ('10', '180124001', '-10000', 'sd', '2018-01-24');
INSERT INTO `pembelian_pembayaran` VALUES ('11', '180124002', '500000', 'bca', '2018-01-24');
INSERT INTO `pembelian_pembayaran` VALUES ('12', '180124002', '500000', 'l', '2018-01-24');
INSERT INTO `pembelian_pembayaran` VALUES ('13', '180124003', '500000', 'gojek', '2018-01-24');
INSERT INTO `pembelian_pembayaran` VALUES ('14', '180124004', '3749850', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('15', '180124005', '6000000', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('16', '180124006', '6000000', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('17', '180124007', '1000000', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('18', '180124008', '7000000', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('19', '180124009', '15000000', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('20', '180124010', '3750000', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('21', '180124002', '-10000', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('22', '180125002', '5000000', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('23', '180125002', '3939804', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('24', '180125001', '10000000', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('25', '180125001', '5150000', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('26', '180124011', '299800', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('27', '180124011', '2700000', 'gojek', '2018-01-25');
INSERT INTO `pembelian_pembayaran` VALUES ('28', '180124012', '1000000', 'gojek', '2018-01-25');
INSERT INTO `pembelianpo` VALUES ('180124001', '2018-01-24', '2', '4', 'undefined');
INSERT INTO `pembelianpo` VALUES ('180124002', '2018-01-24', '3', '4', 'undefined');
INSERT INTO `pembelianpo` VALUES ('180124003', '2018-01-24', '2', '4', 'undefined');
INSERT INTO `pembelianpo` VALUES ('180124004', '2018-01-24', '3', '4', 'undefined');
INSERT INTO `pembelianpo` VALUES ('180124005', '2018-01-24', '4', '4', 'undefined');
INSERT INTO `pembelianpo` VALUES ('180124006', '2018-01-24', '5', '4', 'undefined');
INSERT INTO `pembelianpo` VALUES ('180124007', '2018-01-24', '5', '4', 'undefined');
INSERT INTO `pembelianpo` VALUES ('180124008', '2018-01-24', '5', '4', 'undefined');
INSERT INTO `pembelianpo` VALUES ('180124009', '2018-01-24', '6', '4', 'undefined');
INSERT INTO `pembelianpo` VALUES ('180125001', '2018-01-25', '5', '4', 'undefined');
INSERT INTO `pembelianpo` VALUES ('180125002', '2018-01-25', '1', '4', 'undefined');
INSERT INTO `pembelianpo` VALUES ('180125003', '2018-01-25', '1', '4', 'undefined');
INSERT INTO `pembelianpo_has_bahan` VALUES ('1', '180124002', 'RBH101', '100', '5000', '100');
INSERT INTO `pembelianpo_has_bahan` VALUES ('2', '180124003', 'RBH101', '150', '24999', '150');
INSERT INTO `pembelianpo_has_bahan` VALUES ('3', '180124006', 'RBM100', '250', '15000', '250');
INSERT INTO `pembelianpo_has_bahan` VALUES ('4', '180124007', 'RBM100', '200', '10000', '200');
INSERT INTO `pembelianpo_has_bahan` VALUES ('5', '180124008', 'RBM100', '100', '10000', '100');
INSERT INTO `pembelianpo_has_bahan` VALUES ('6', '180124009', 'RBH101', '200', '10000', '200');
INSERT INTO `pembelianpo_has_bahan` VALUES ('7', '180125001', 'RBH101', '1500', '10000', '1500');
INSERT INTO `pembelianpo_has_bahan` VALUES ('8', '180125002', 'RBH101', '200', '14999', '200');
INSERT INTO `pembelianpo_has_bahan` VALUES ('9', '180125003', 'RBH100', '2000', '9996', '2000');
INSERT INTO `pembelianpo_has_barang` VALUES ('57', '180124001', 'KHM10050', '100', '1000', '100');
INSERT INTO `pembelianpo_has_barang` VALUES ('58', '180124002', 'BHB200100', '100', '10000', '100');
INSERT INTO `pembelianpo_has_barang` VALUES ('59', '180124004', 'KHM200100', '600', '25000', '600');
INSERT INTO `pembelianpo_has_barang` VALUES ('60', '180124005', 'BKP10050', '300', '20000', '300');
INSERT INTO `pembelianpo_has_barang` VALUES ('61', '180124005', '', '0', '0', '0');
INSERT INTO `pembelianpo_has_barang` VALUES ('62', '180124006', 'BKM200100', '300', '20000', '300');
INSERT INTO `pembelianpo_has_barang` VALUES ('63', '180124007', 'BKM200100', '100', '9998', '100');
INSERT INTO `pembelianpo_has_barang` VALUES ('64', '180124008', 'KHM200100', '100', '10000', '100');
INSERT INTO `pembelianpo_has_barang` VALUES ('65', '180124009', 'BKO10050', '500', '10000', '500');
INSERT INTO `pembelianpo_has_barang` VALUES ('66', '180125001', 'BKM10050', '15', '10000', '15');
INSERT INTO `pembelianpo_has_barang` VALUES ('67', '180125002', 'SHB200100', '300', '20000', '300');
INSERT INTO `pembelianpo_has_barang` VALUES ('68', '180125003', 'BKO10050', '150', '20000', '150');
INSERT INTO `penjualan` VALUES ('180124001', '4', '1', '2018-01-24', '2018-01-24', '1000000', 'Proses');
INSERT INTO `penjualan` VALUES ('180124002', '4', '1', '2018-01-24', '2018-01-24', '0', 'Proses');
INSERT INTO `penjualan_has_barang` VALUES ('31', '180124001', 'BKH10050', '100', '10000');
INSERT INTO `penjualan_has_barang` VALUES ('32', '180124002', 'BKH10050', '1000', '10000');
INSERT INTO `penjualan_pembayaran` VALUES ('1', '180122001', '50000', 'lol', '2018-01-22');
INSERT INTO `penjualan_pembayaran` VALUES ('2', '180122001', '950000', 'as', '2018-01-23');
INSERT INTO `penjualan_pembayaran` VALUES ('3', '180123001', '1500000', '12', '2018-01-23');
INSERT INTO `penjualan_pembayaran` VALUES ('4', '180123001', '1500000', '43', '2018-01-23');
INSERT INTO `penjualan_pembayaran` VALUES ('5', '180122002', '3000000', 'asd', '2018-01-23');
INSERT INTO `penjualan_pembayaran` VALUES ('6', '180124001', '1000000', '1000000', '2018-01-24');
INSERT INTO `produksi` VALUES ('6', '2018-01-22', '1');
INSERT INTO `produksi` VALUES ('7', '2018-01-23', '1');
INSERT INTO `produksi_has_barang` VALUES ('3', '200', '6', 'BHB200100', 'bahan');
INSERT INTO `produksi_has_barang` VALUES ('4', '200', '6', 'BKM10050', 'bahan');
INSERT INTO `produksi_has_barang` VALUES ('5', '300', '6', 'KHU10050', 'barang');
INSERT INTO `produksi_has_barang` VALUES ('13', '5', '6', 'BHB200100', 'barang');
INSERT INTO `produksi_has_barang` VALUES ('14', '100', '7', 'BHB200100', 'bahan');
INSERT INTO `produksi_has_barang` VALUES ('15', '100', '7', 'BHB200100', 'barang');
INSERT INTO `prosesbahan` VALUES ('27', '2018-01-23 00:00:00');
INSERT INTO `prosesbahan` VALUES ('28', '2018-01-23 00:00:00');
INSERT INTO `prosesbahan` VALUES ('29', '2018-01-24 00:00:00');
INSERT INTO `prosesbahan_has_bahan` VALUES ('3', '6', 'RBH100', '1');
INSERT INTO `prosesbahan_has_bahan` VALUES ('4', '28', 'RBH100', '1');
INSERT INTO `prosesbahan_has_bahan` VALUES ('5', '29', 'RBH100', '100');
INSERT INTO `prosesbahan_has_barang` VALUES ('1', '6', 'BHB200100', '1');
INSERT INTO `prosesbahan_has_barang` VALUES ('2', '28', 'BHB200100', '1');
INSERT INTO `prosesbahan_has_barang` VALUES ('3', '29', 'BHB200100', '50');
INSERT INTO `supplier` VALUES ('1', 'CV Tajuk', '123445', 'Rumah Om Joni');
INSERT INTO `supplier` VALUES ('2', 'CV Fitrah Jaya Murni', '081234567890', 'Jl. Sudirman No 100 Jakarta');
INSERT INTO `supplier` VALUES ('3', 'CV Indonesia Cerah Jaya', '08786756452', 'Jl. Ahmad Yani 34 FlyOver Surabaya');
INSERT INTO `supplier` VALUES ('4', 'CV Matahari Cerah', '087667467837', 'Jl. Patimura Uhut Ruko Sambalado Aster 20');
INSERT INTO `supplier` VALUES ('5', 'CV Harapan Bintang', '111233', 'Jauh di hati dekat di mata');
INSERT INTO `supplier` VALUES ('6', 'PT KERJA TERUS', '555555', 'TERUS KERJA');
INSERT INTO `user` VALUES ('1', '1', 'sonny', '827ccb0eea8a706c4c34a16891f84e7b', '0');
INSERT INTO `user` VALUES ('2', '2', 'lucas', '827ccb0eea8a706c4c34a16891f84e7b', '0');
INSERT INTO `user` VALUES ('3', '3', 'evin', '827ccb0eea8a706c4c34a16891f84e7b', '0');
INSERT INTO `user` VALUES ('4', '4', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '0');
