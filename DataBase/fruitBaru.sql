-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jan 2017 pada 11.20
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

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
-- Struktur dari tabel `departement`
--

CREATE TABLE `departement` (
  `iddepartement` int(11) NOT NULL,
  `departementname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departement`
--

INSERT INTO `departement` (`iddepartement`, `departementname`) VALUES
(121, 'Gudang'),
(122, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
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
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`idkaryawan`, `idstatus`, `idposisi`, `namapanjang`, `email`, `password`, `alamat`, `kontak`, `gender`) VALUES
(1, 11110, 3, 'daniel febryanto', 'dann@gmail.com', 'dann@gmail.com', NULL, '08561212866', 'M'),
(2, 11110, 2, 'daniel febrx', 'dan@gg.cxx', 'dan@gg.cxx', '', '08561212866', 'M'),
(3, 11110, 1, 'ddaniel febryanto', 'dann@gmail.com', 'dann@gmail.com', 'jl. cip bali no 14', '08561212866', 'M'),
(4, 11110, 2, 'daniel febryanto', 'dann@gmail.com', 'dann@gmail.com', 'jl. cip bali no 14', '08561212866', 'M'),
(5, 11110, 3, 'daniel febryanto', 'dann@gmail.com', 'dann@gmail.com', 'jl. cip bali no 14', '08561212866', 'M'),
(6, 11110, 3, 'daniel febryanto', 'dann@gmail.com', 'dann@gmail.com', 'jl. cip bali no 14', '08561212866', 'M'),
(7, 11110, 2, 'daniel febryanto', 'dann@gmail.com', 'dann@gmail.com', 'jl. cip bali no 14', '08561212866', 'M');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `idposisi` int(11) NOT NULL,
  `iddepartement` int(11) NOT NULL,
  `posisiname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`idposisi`, `iddepartement`, `posisiname`) VALUES
(1, 121, 'Deliveri'),
(2, 121, 'Kepala Bagian Gudang'),
(3, 122, 'Admin'),
(4, 122, 'Kepala Bagian Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `idprodukkat`, `idstatus`, `namaproduk`, `stok`, `harga`) VALUES
(2, 1001, 11118, 'Anggur', 20, 700000),
(3, 1001, 11111, 'Anggur B', 20, 700000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produkkat`
--

CREATE TABLE `produkkat` (
  `idprodukkat` int(11) NOT NULL,
  `produkkatname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produkkat`
--

INSERT INTO `produkkat` (`idprodukkat`, `produkkatname`) VALUES
(1000, 'Super'),
(1001, 'Super High');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `statusname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`idstatus`, `statusname`) VALUES
(11110, 'AKTIF'),
(11111, 'NONAKTIF'),
(11112, 'SUKSES'),
(11113, 'BATAL'),
(11114, 'TUNDA'),
(11115, 'ETC'),
(11116, 'YA'),
(11117, 'TIDAK'),
(11118, 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
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
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `idsuppliertype`, `idstatus`, `namaPT`, `email`, `kontak`, `alamat`, `tglgabung`) VALUES
(1, 111, 11110, 'PT. Naufal Sejahterad', 'Naufal.said@gmail.coms', '08782567894s', 'aHR0cDovL2xvY2FsaG9zdC9zdXBwbGllci9lZGl0LzE=', '2017-01-09'),
(2, 112, 11111, 'PT. PAGPUG', 'service@pagpug.com', '0856789456', 'JL. Rasuna said kav 56-59', '2017-01-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliertype`
--

CREATE TABLE `suppliertype` (
  `idsuppliertype` int(11) NOT NULL,
  `suppliertypename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suppliertype`
--

INSERT INTO `suppliertype` (`idsuppliertype`, `suppliertypename`) VALUES
(111, 'Pemasok'),
(112, 'Pembeli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trxdetail`
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
-- Struktur dari tabel `trxheader`
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
-- Struktur dari tabel `trxretur`
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
-- Struktur dari tabel `trxtype`
--

CREATE TABLE `trxtype` (
  `idtrxtype` int(11) NOT NULL,
  `trxtypename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trxtype`
--

INSERT INTO `trxtype` (`idtrxtype`, `trxtypename`) VALUES
(771, 'Request Order'),
(777, 'Purchase Order');

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
  MODIFY `iddepartement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idkaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `idposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produkkat`
--
ALTER TABLE `produkkat`
  MODIFY `idprodukkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11119;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `idtrxtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=778;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_karyawan_posisi1` FOREIGN KEY (`idposisi`) REFERENCES `posisi` (`idposisi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_karyawan_status1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD CONSTRAINT `fk_posisi_departement1` FOREIGN KEY (`iddepartement`) REFERENCES `departement` (`iddepartement`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_produkkat1` FOREIGN KEY (`idprodukkat`) REFERENCES `produkkat` (`idprodukkat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_status1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `fk_supplier_status1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_supplier_suppliertype1` FOREIGN KEY (`idsuppliertype`) REFERENCES `suppliertype` (`idsuppliertype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `trxdetail`
--
ALTER TABLE `trxdetail`
  ADD CONSTRAINT `fk_trxdetail_produk1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trxdetail_trxheader1` FOREIGN KEY (`idtrxheader`) REFERENCES `trxheader` (`idtrxheader`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `trxheader`
--
ALTER TABLE `trxheader`
  ADD CONSTRAINT `fk_trxheader_status1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trxheader_supplier1` FOREIGN KEY (`idsupplier`) REFERENCES `supplier` (`idsupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trxheader_trxtype1` FOREIGN KEY (`idtrxtype`) REFERENCES `trxtype` (`idtrxtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `trxretur`
--
ALTER TABLE `trxretur`
  ADD CONSTRAINT `fk_trxretur_produk1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trxretur_status1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trxretur_trxheader1` FOREIGN KEY (`idtrxheader`) REFERENCES `trxheader` (`idtrxheader`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
