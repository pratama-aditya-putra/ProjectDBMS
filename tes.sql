-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 04:21 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `alamat` varchar(33) NOT NULL,
  `namaAdmin` varchar(33) NOT NULL,
  `NIK` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `alamat`, `namaAdmin`, `NIK`) VALUES
(101, 'admin', 'admin', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gate`
--

CREATE TABLE `gate` (
  `IDGate` varchar(2) NOT NULL,
  `status` enum('Beroperasi','Tutup') NOT NULL,
  `IDOperator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gate`
--

INSERT INTO `gate` (`IDGate`, `status`, `IDOperator`) VALUES
('1', 'Beroperasi', 101),
('2', 'Beroperasi', 200),
('3', 'Beroperasi', NULL),
('4', 'Beroperasi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `IDPetugas` int(11) NOT NULL,
  `username` varchar(22) NOT NULL,
  `password` varchar(22) NOT NULL,
  `namaPetugas` varchar(33) NOT NULL,
  `alamat` varchar(33) NOT NULL,
  `NIK` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`IDPetugas`, `username`, `password`, `namaPetugas`, `alamat`, `NIK`) VALUES
(101, 'admin', 'admin123', '', '', ''),
(200, '69pratama69', '122333', 'Pratama Aditya', 'Medan, Medan Baru', '1204151805910001'),
(201, '4D1TYA', '0808', 'Putra Aditya', 'Medan, Medan Baru', '1204151805910021');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung_biasa`
--

CREATE TABLE `pengunjung_biasa` (
  `noPlat` varchar(10) NOT NULL,
  `jenisKendaraan` enum('Roda2','Roda4') NOT NULL,
  `noKarcis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung_biasa`
--

INSERT INTO `pengunjung_biasa` (`noPlat`, `jenisKendaraan`, `noKarcis`) VALUES
('AP 1900 EK', 'Roda4', 30002),
('BK 2000 OP', 'Roda4', 30015),
('BK 1312 Az', 'Roda2', 30016),
('AP 1231 EK', 'Roda2', 30017),
('BK 2000 OP', 'Roda2', 30018),
('AP 1911 EK', 'Roda2', 30019),
('BK 2000 OP', 'Roda2', 30020),
('BK 2000 OP', 'Roda2', 30021),
('AP 1990 EK', 'Roda2', 30022),
('AP 1990 EK', 'Roda2', 30023),
('BK 1944 OP', 'Roda2', 30024),
('AP 1909 EK', 'Roda2', 30025),
('AP 1901 EK', 'Roda2', 30026),
('AP 1922 EK', 'Roda2', 30027),
('BK 2011 OP', 'Roda2', 30028),
('AP 1918 EK', 'Roda2', 30029),
('AP 1900 QQ', 'Roda2', 30030),
('BK 1945 OP', 'Roda2', 30031),
('BK 1122 OP', 'Roda2', 30032);

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung_member`
--

CREATE TABLE `pengunjung_member` (
  `noMember` int(11) NOT NULL,
  `namaMember` varchar(33) NOT NULL,
  `memberExpire` date NOT NULL,
  `noPlat` varchar(10) NOT NULL,
  `jenisKendaraan` enum('Roda2','Roda4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung_member`
--

INSERT INTO `pengunjung_member` (`noMember`, `namaMember`, `memberExpire`, `noPlat`, `jenisKendaraan`) VALUES
(5001, 'Ria', '2021-02-13', 'BK 2010 OP', 'Roda2'),
(5003, 'alvadi', '2021-02-17', 'AP 1999 CU', 'Roda2');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_biasa`
--

CREATE TABLE `transaksi_biasa` (
  `IDTransaksi` int(11) NOT NULL,
  `waktuMasuk` datetime NOT NULL,
  `waktuKeluar` datetime DEFAULT NULL,
  `tarif` enum('500','1000') NOT NULL,
  `biayaParkir` int(11) DEFAULT NULL,
  `noKarcis` int(11) NOT NULL,
  `IDOperator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_biasa`
--

INSERT INTO `transaksi_biasa` (`IDTransaksi`, `waktuMasuk`, `waktuKeluar`, `tarif`, `biayaParkir`, `noKarcis`, `IDOperator`) VALUES
(4001, '2021-01-15 00:00:00', '2021-01-14 02:58:00', '500', 22500, 30002, 201),
(4003, '2021-01-15 10:04:23', NULL, '500', NULL, 30019, 200),
(4005, '2021-01-15 10:12:37', NULL, '500', NULL, 30021, 101),
(4006, '2021-01-15 10:17:27', NULL, '500', NULL, 30022, 101),
(4007, '2021-01-15 10:20:17', NULL, '500', NULL, 30023, 101),
(4009, '2021-01-15 10:24:53', NULL, '500', NULL, 30025, 101),
(4010, '2021-01-15 10:27:51', NULL, '500', NULL, 30026, 101),
(4011, '2021-01-18 02:00:00', '2021-01-18 03:58:00', '500', 1500, 30027, 101),
(4012, '2021-01-18 02:05:02', '2021-01-18 08:00:00', '500', 5500, 30028, 201),
(4013, '2021-01-21 11:14:25', '2021-01-21 12:00:00', '500', 0, 30029, 200),
(4014, '2021-01-21 11:15:25', '2021-01-21 04:00:00', '500', 7000, 30030, 200),
(4015, '2021-04-27 12:24:48', '2021-04-27 03:00:00', '500', 9500, 30031, 200),
(4016, '2021-05-21 10:16:28', '2021-05-21 12:00:00', '500', 1000, 30032, 200);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_member`
--

CREATE TABLE `transaksi_member` (
  `IDTransaksi` int(11) NOT NULL,
  `waktuMasuk` datetime NOT NULL,
  `waktuKeluar` datetime DEFAULT NULL,
  `noMember` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_member`
--

INSERT INTO `transaksi_member` (`IDTransaksi`, `waktuMasuk`, `waktuKeluar`, `noMember`) VALUES
(6001, '2021-01-14 00:00:00', '2021-02-13 00:00:00', 5001),
(6002, '2021-01-18 01:58:56', '2021-01-18 02:58:00', 5003),
(6003, '2021-01-21 11:16:43', '2021-01-21 09:00:00', 5001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `gate`
--
ALTER TABLE `gate`
  ADD PRIMARY KEY (`IDGate`),
  ADD KEY `IDOperator` (`IDOperator`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`IDPetugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pengunjung_biasa`
--
ALTER TABLE `pengunjung_biasa`
  ADD PRIMARY KEY (`noKarcis`);

--
-- Indexes for table `pengunjung_member`
--
ALTER TABLE `pengunjung_member`
  ADD PRIMARY KEY (`noMember`);

--
-- Indexes for table `transaksi_biasa`
--
ALTER TABLE `transaksi_biasa`
  ADD PRIMARY KEY (`IDTransaksi`),
  ADD KEY `noKarcis` (`noKarcis`,`IDOperator`),
  ADD KEY `transaksi_biasa_ibfk_2` (`IDOperator`);

--
-- Indexes for table `transaksi_member`
--
ALTER TABLE `transaksi_member`
  ADD PRIMARY KEY (`IDTransaksi`),
  ADD KEY `noMember` (`noMember`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `IDPetugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `pengunjung_biasa`
--
ALTER TABLE `pengunjung_biasa`
  MODIFY `noKarcis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30033;

--
-- AUTO_INCREMENT for table `pengunjung_member`
--
ALTER TABLE `pengunjung_member`
  MODIFY `noMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5004;

--
-- AUTO_INCREMENT for table `transaksi_biasa`
--
ALTER TABLE `transaksi_biasa`
  MODIFY `IDTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4017;

--
-- AUTO_INCREMENT for table `transaksi_member`
--
ALTER TABLE `transaksi_member`
  MODIFY `IDTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6004;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gate`
--
ALTER TABLE `gate`
  ADD CONSTRAINT `gate_ibfk_1` FOREIGN KEY (`IDOperator`) REFERENCES `operator` (`IDPetugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_biasa`
--
ALTER TABLE `transaksi_biasa`
  ADD CONSTRAINT `transaksi_biasa_ibfk_1` FOREIGN KEY (`noKarcis`) REFERENCES `pengunjung_biasa` (`noKarcis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_biasa_ibfk_2` FOREIGN KEY (`IDOperator`) REFERENCES `operator` (`IDPetugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_member`
--
ALTER TABLE `transaksi_member`
  ADD CONSTRAINT `transaksi_member_ibfk_1` FOREIGN KEY (`noMember`) REFERENCES `pengunjung_member` (`noMember`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
