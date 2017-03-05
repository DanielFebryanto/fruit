-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2017 at 04:19 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `iddepartement` int(11) NOT NULL,
  `departementname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`iddepartement`, `departementname`) VALUES
(121, 'Gudang'),
(122, 'Admin'),
(123, 'Tes Nambah');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idkaryawan` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `idposisi` int(11) NOT NULL,
  `namapanjang` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idkaryawan`, `idstatus`, `idposisi`, `namapanjang`, `email`, `password`, `alamat`, `kontak`, `gender`) VALUES
(1, 11110, 3, 'Sigit Pramono', 'sigit@gmail.com', '121212', NULL, '0858454545455', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idtrx` varchar(50) NOT NULL,
  `tglbayar` date NOT NULL,
  `totalbayar` double NOT NULL,
  `confirmby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `idposisi` int(11) NOT NULL,
  `iddepartement` int(11) NOT NULL,
  `posisiname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`idposisi`, `iddepartement`, `posisiname`) VALUES
(1, 121, 'Deliveri'),
(2, 121, 'Kepala Bagian'),
(3, 122, 'Administrator'),
(4, 122, 'Kepala Bagian');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idprodukkat` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `namaproduk` varchar(45) DEFAULT NULL,
  `stok` int(6) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `idprodukkat`, `idstatus`, `namaproduk`, `stok`, `harga`) VALUES
(4, 1002, 11118, 'Anggur', 30, 1000000),
(5, 1003, 11118, 'Anggur Merah', 12, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `produkkat`
--

CREATE TABLE `produkkat` (
  `idprodukkat` int(11) NOT NULL,
  `produkkatname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produkkat`
--

INSERT INTO `produkkat` (`idprodukkat`, `produkkatname`) VALUES
(1002, 'Super'),
(1003, 'Super Premium');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `statusname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`idstatus`, `statusname`) VALUES
(11110, 'Aktif'),
(11111, 'Non Aktif'),
(11112, 'Sukses'),
(11113, 'Batal'),
(11114, 'Tunda'),
(11115, 'Belum Dibayar'),
(11117, 'Stok Kurang'),
(11118, 'Tersedia'),
(11119, 'Sudah Dibayar'),
(11121, 'Terkirim'),
(11122, 'Belum Terkirim');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idsupplier` int(11) NOT NULL,
  `idsuppliertype` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `namaPT` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `tglgabung` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `idsuppliertype`, `idstatus`, `namaPT`, `email`, `kontak`, `alamat`, `tglgabung`) VALUES
(4, 112, 11110, 'Bhotak', 'botak@gmail.com', '085763536465', 'jl.kalimalang ', '2017-02-26'),
(5, 111, 11110, 'Ucing', 'ucing@gmail.com', '085764756678', 'jl.puloppiun', '2017-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `suppliertype`
--

CREATE TABLE `suppliertype` (
  `idsuppliertype` int(11) NOT NULL,
  `suppliertypename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliertype`
--

INSERT INTO `suppliertype` (`idsuppliertype`, `suppliertypename`) VALUES
(111, 'pemasok'),
(112, 'Pembeli');

-- --------------------------------------------------------

--
-- Table structure for table `trxdetail`
--

CREATE TABLE `trxdetail` (
  `idtrxdetail` int(11) NOT NULL,
  `idtrxheader` varchar(50) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `qty` int(6) NOT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trxheader`
--

CREATE TABLE `trxheader` (
  `idtrxheader` varchar(50) NOT NULL,
  `idtrxtype` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `idsupplier` int(11) NOT NULL,
  `tgltrx` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trxretur`
--

CREATE TABLE `trxretur` (
  `idtrxretur` int(11) NOT NULL,
  `idtrxheader` varchar(50) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trxtype`
--

CREATE TABLE `trxtype` (
  `idtrxtype` int(11) NOT NULL,
  `trxtypename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`iddepartement`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idkaryawan`),
  ADD KEY `fk_karyawan_status1_idx` (`idstatus`),
  ADD KEY `fk_karyawan_posisi1_idx` (`idposisi`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `fk_pembayaran_trxheader1_idx` (`idtrx`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`idposisi`),
  ADD KEY `fk_posisi_departement1_idx` (`iddepartement`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `fk_produk_produkkat1_idx` (`idprodukkat`),
  ADD KEY `fk_produk_status1_idx` (`idstatus`);

--
-- Indexes for table `produkkat`
--
ALTER TABLE `produkkat`
  ADD PRIMARY KEY (`idprodukkat`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idstatus`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idsupplier`),
  ADD KEY `fk_supplier_suppliertype1_idx` (`idsuppliertype`),
  ADD KEY `fk_supplier_status1_idx` (`idstatus`);

--
-- Indexes for table `suppliertype`
--
ALTER TABLE `suppliertype`
  ADD PRIMARY KEY (`idsuppliertype`);

--
-- Indexes for table `trxdetail`
--
ALTER TABLE `trxdetail`
  ADD PRIMARY KEY (`idtrxdetail`),
  ADD KEY `fk_trxdetail_trxheader1_idx` (`idtrxheader`),
  ADD KEY `fk_trxdetail_produk1_idx` (`idproduk`);

--
-- Indexes for table `trxheader`
--
ALTER TABLE `trxheader`
  ADD PRIMARY KEY (`idtrxheader`),
  ADD KEY `fk_trxheader_trxtype1_idx` (`idtrxtype`),
  ADD KEY `fk_trxheader_status1_idx` (`idstatus`),
  ADD KEY `fk_trxheader_supplier1_idx` (`idsupplier`);

--
-- Indexes for table `trxretur`
--
ALTER TABLE `trxretur`
  ADD PRIMARY KEY (`idtrxretur`),
  ADD KEY `fk_trxretur_trxheader1_idx` (`idtrxheader`),
  ADD KEY `fk_trxretur_status1_idx` (`idstatus`),
  ADD KEY `fk_trxretur_produk1_idx` (`idproduk`);

--
-- Indexes for table `trxtype`
--
ALTER TABLE `trxtype`
  ADD PRIMARY KEY (`idtrxtype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `iddepartement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idkaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `idposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produkkat`
--
ALTER TABLE `produkkat`
  MODIFY `idprodukkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11123;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `suppliertype`
--
ALTER TABLE `suppliertype`
  MODIFY `idsuppliertype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `trxdetail`
--
ALTER TABLE `trxdetail`
  MODIFY `idtrxdetail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trxretur`
--
ALTER TABLE `trxretur`
  MODIFY `idtrxretur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trxtype`
--
ALTER TABLE `trxtype`
  MODIFY `idtrxtype` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_karyawan_posisi1` FOREIGN KEY (`idposisi`) REFERENCES `posisi` (`idposisi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_karyawan_status1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_trxheader1` FOREIGN KEY (`idtrx`) REFERENCES `trxheader` (`idtrxheader`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posisi`
--
ALTER TABLE `posisi`
  ADD CONSTRAINT `fk_posisi_departement1` FOREIGN KEY (`iddepartement`) REFERENCES `departement` (`iddepartement`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_produkkat1` FOREIGN KEY (`idprodukkat`) REFERENCES `produkkat` (`idprodukkat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_status1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `fk_supplier_status1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_supplier_suppliertype1` FOREIGN KEY (`idsuppliertype`) REFERENCES `suppliertype` (`idsuppliertype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trxdetail`
--
ALTER TABLE `trxdetail`
  ADD CONSTRAINT `fk_trxdetail_produk1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trxdetail_trxheader1` FOREIGN KEY (`idtrxheader`) REFERENCES `trxheader` (`idtrxheader`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trxheader`
--
ALTER TABLE `trxheader`
  ADD CONSTRAINT `fk_trxheader_status1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trxheader_supplier1` FOREIGN KEY (`idsupplier`) REFERENCES `supplier` (`idsupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trxheader_trxtype1` FOREIGN KEY (`idtrxtype`) REFERENCES `trxtype` (`idtrxtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trxretur`
--
ALTER TABLE `trxretur`
  ADD CONSTRAINT `fk_trxretur_produk1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trxretur_status1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trxretur_trxheader1` FOREIGN KEY (`idtrxheader`) REFERENCES `trxheader` (`idtrxheader`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
