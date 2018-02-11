-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 03:02 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipsrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `no_seri` varchar(20) NOT NULL,
  `nm_alat` varchar(100) DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  `w_pemeliharaan` varchar(20) DEFAULT NULL,
  `tipe` varchar(15) DEFAULT NULL,
  `merek` varchar(50) DEFAULT NULL,
  `kd_lokalat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`no_seri`, `nm_alat`, `tgl_beli`, `w_pemeliharaan`, `tipe`, `merek`, `kd_lokalat`) VALUES
('kokobop27', 'Mouse', '2017-12-01', '3 bulan', 'xyz', 'xyz', 'Radiologi-203'),
('RBX0043213', 'Medical Cable', '2017-11-02', '6 bulan', 'MC043C', 'Panasonic', 'ICU-103'),
('RR8J40HZEAX', 'Patient Monitor', '2017-11-01', '4 bulan', 'PM G70EY', 'Samsung', 'MAWAR-108'),
('SGH99321F', 'Printer Ronsen', '2017-11-03', '1 bulan', 'PR2189', 'Toshiba', 'OKA-203'),
('XYV8489A', 'medical mechine', '2017-11-04', '1 bulan', 'PB2922', 'QOOO', 'UGD-101');

-- --------------------------------------------------------

--
-- Table structure for table `hsl_pemeliharaan`
--

CREATE TABLE `hsl_pemeliharaan` (
  `kd_hasil` varchar(20) NOT NULL,
  `j_pemeliharaan` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `kd_jadwal` varchar(20) NOT NULL,
  `no_seri` varchar(20) NOT NULL,
  `kd_lokalat` varchar(20) NOT NULL,
  `kd_pemeliharaan` varchar(20) NOT NULL,
  `nip` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hsl_pemeliharaan`
--

INSERT INTO `hsl_pemeliharaan` (`kd_hasil`, `j_pemeliharaan`, `keterangan`, `kd_jadwal`, `no_seri`, `kd_lokalat`, `kd_pemeliharaan`, `nip`) VALUES
('20171213-H001', 'Lubricating', NULL, '20171213-J001', 'SGH99321F', 'OKA-203', '20171213-P001', '198202182009090301'),
('20171213-H002', 'Fungsional Check', NULL, '20171213-J002', 'RR8J40HZEAX', 'MAWAR-108', '20171213-P002', '197107172001112401');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kd_jadwal` varchar(20) NOT NULL,
  `tgl_pemeliharaan` date DEFAULT NULL,
  `no_seri` varchar(20) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `kd_lokalat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kd_jadwal`, `tgl_pemeliharaan`, `no_seri`, `status`, `kd_lokalat`) VALUES
('20171213-J001', '2017-12-13', 'SGH99321F', 'Tervalidasi', 'OKA-203'),
('20171213-J002', '2017-12-13', 'RR8J40HZEAX', 'Tervalidasi', 'MAWAR-108');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_alat`
--

CREATE TABLE `lokasi_alat` (
  `kd_lokalat` varchar(20) NOT NULL,
  `nm_lokasi` varchar(20) DEFAULT NULL,
  `lantai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_alat`
--

INSERT INTO `lokasi_alat` (`kd_lokalat`, `nm_lokasi`, `lantai`) VALUES
('HCU-103', 'HCU', '4'),
('ICU-103', 'ICU', '3'),
('MAWAR-108', 'Mawar', '7'),
('MELATI-206', 'Melati', '6'),
('OKA-203', 'OKA', '3'),
('Radiologi-203', 'Radiologi', '3'),
('UGD-101', 'UGD', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `kd_pemeliharaan` varchar(20) NOT NULL,
  `pelaksana` varchar(18) DEFAULT NULL,
  `kd_jadwal` varchar(20) NOT NULL,
  `no_seri` varchar(20) NOT NULL,
  `kd_lokalat` varchar(20) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `nip` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`kd_pemeliharaan`, `pelaksana`, `kd_jadwal`, `no_seri`, `kd_lokalat`, `status`, `nip`) VALUES
('20171213-P001', NULL, '20171213-J001', 'SGH99321F', 'OKA-203', 'Maintenance', '198202182009090301'),
('20171213-P002', NULL, '20171213-J002', 'RR8J40HZEAX', 'MAWAR-108', 'Maintenance', '197107172001112401');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` char(18) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `bagian` varchar(25) DEFAULT NULL,
  `alamat` text,
  `agama` varchar(10) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmp_lahir` varchar(50) DEFAULT NULL,
  `no_tlp` char(13) DEFAULT NULL,
  `j_kel` enum('L','P') DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `nama`, `level`, `bagian`, `alamat`, `agama`, `tgl_lahir`, `tmp_lahir`, `no_tlp`, `j_kel`, `password`, `foto`) VALUES
('195104161986031002', 'Slamet Iman Santoso', 'Teknisi', 'IPSRS', 'Jakarta', 'Islam', '1951-04-16', 'Jakarta', '12345', 'L', '12345', 'teknisi-service-ac.jpg'),
('195108151979051001', 'Nugroho Prayogo', 'Teknisi', 'IPSRS', 'Jakarta', 'Islam', '1951-08-15', 'Jakarta', '12345', 'L', '12345', 'teknisi-service-ac.jpg'),
('195109261981101001', 'Tato Heryanto', 'Teknisi', 'IPSRS', 'Jakarta', 'Islam', '1951-09-26', 'Jakarta', '12345', 'L', '12345', 'teknisi-service-ac.jpg'),
('195111041980022001', 'Fielda Djuita', 'Supervisor', 'Melati', 'Jakarta', 'Islam', '1951-11-04', 'Padang', '12345', 'P', '12345', 'supervisor.png'),
('195207011984031002', 'Samuel Johny Hartono', 'Supervisor', 'ICU', 'Jakarta', 'Protestan', '1952-07-01', 'Jakarta', '12345', 'L', '12345', 'supervisor.png'),
('195210011980032002', 'Aida Sofiati Dahlan', 'Supervisor', 'HCU', 'Jakarta', 'Islam', '1952-10-01', 'Jakarta', '12345', 'P', '12345', 'supervisor.png'),
('195302261980032001', 'Sri Erni Istiawati', 'Supervisor', 'UGD', 'Jakarta', 'Islam', '1953-02-02', 'Semarang', '12345', 'P', '12345', 'supervisor.png'),
('195303021979121001', 'M. Soemanadi', 'Supervisor', 'OKA', 'Jakarta', 'Islam', '1953-03-02', 'Jakarta', '12345', 'L', '12345', 'supervisor.png'),
('195408051985031004', 'Agoes Ferryoko', 'Supervisor', 'Mawar', 'Jakarta', 'Katolik', '1954-08-05', 'Jakarta', '12345', 'L', '12345', 'supervisor.png'),
('195409291981032001', 'Noorwati S', 'Supervisor', 'Anggrek', 'Jakarta', 'Islam', '1954-09-29', 'Jakarta', '12345', 'P', '12345', 'supervisor.png'),
('195411291985031001', 'Demak L.Tobing', 'Supervisor', 'Radiologi', 'Jakarta', 'Protestan', '1954-11-29', 'Jakarta', '12345', 'L', '12345', 'supervisor.png'),
('195512081981031003', 'Nasdaldy', 'Supervisor', 'Radiodiagnostik', 'Jakarta', 'Islam', '1955-12-08', 'Jakarta', '12345', 'L', '12345', 'supervisor.png'),
('195602111981102001', 'S Widiarti Soemarno', 'Supervisor', 'Poli Onkologi', 'Jakarta', 'Islam', '1956-02-11', 'Jakarta', '12345', 'P', '12345', 'supervisor.png'),
('195606181982022001', 'Kumara Bakti Hera', 'Supervisor', 'Poli Cendana', 'Jakarta', 'Islam', '1956-06-18', 'Jakarta', '12345', 'P', '12345', 'supervisor.png'),
('195607201981031003', 'Ronald Alexander', 'Supervisor', 'Poli Anak', 'Jakarta', 'Protestan', '1956-07-20', 'Jakarta', '12345', 'L', '12345', 'supervisor.png'),
('195609231984121001', 'Achmad Mulawarman', 'Supervisor', 'Poli Gigi', 'Jakarta', 'Islam', '1956-09-05', 'Jakarta', '12345', 'L', '12345', 'supervisor.png'),
('195612211983021001', 'Defrizal', 'Supervisor', 'Poli Paliatif', 'Jakarta', 'Islam', '1956-12-21', 'Padang', '12345', 'L', '12345', 'supervisor.png'),
('195704181987112001', 'Sariasih Arumdati', 'Supervisor', 'Bank Darah', 'Jakarta', 'Islam', '1957-04-18', 'Jakarta', '12345', 'L', '12345', 'supervisor.png'),
('195811271997031001', 'Misdam', 'Administrasi', 'IPSRS', 'Jakarta Barat', 'Islam', '1958-11-27', 'Jakarta', '12345', 'L', '12345', '12bebbdb27907b6d438271c323aa1179.jpg'),
('195905271997032001', 'Pastina R.Sitohang', 'Administrasi', 'IPSRS', 'Jakarta', 'Katolik', '1959-05-27', 'Jakarta', '12345', 'P', '12345', '12bebbdb27907b6d438271c323aa1179.jpg'),
('195906181982021001', 'Dirwan', 'Administrasi', 'IPSRS', 'Jakarta', 'Protestan', '1959-06-18', 'Jakarta', '12345', 'L', '12345', '12bebbdb27907b6d438271c323aa1179.jpg'),
('195906291984931003', 'Bambang Dwi Poyono', 'Kepala Unit', 'IPSRS', 'Jakarta', 'Islam', '1959-06-29', 'Jakarta', '12345', 'L', '12345', 'pimpinan.png'),
('195908101988031001', 'Wisnu Utomo', 'Kepala Instalasi', 'IPSRS', 'Jakarta Selatan', 'Islam', '1959-08-10', 'Jakarta', '12345', 'L', '12345', 'pimpinan.png'),
('197107172001112401', 'Sarni', 'Teknisi', 'IPSRS', 'Jakarta', 'Islam', '1971-07-17', 'Jogjakarta', '12345', 'L', '12345', 'teknisi-service-ac.jpg'),
('198202182009090301', 'Akmaludin', 'Teknisi', 'IPSRS', 'Jakarta Barat', 'Islam', '1982-02-18', 'Tegal', '12345', 'L', '12345', 'a_3c83f95a.jpg'),
('admin', 'KISMAWATI', 'Administrasi', 'IPSRS', 'Mercubuana', 'Islam', '2017-12-17', 'Jakarta', '12345', 'P', '12345', 'Disney_Aurora_princess.jpg'),
('ALIEF', 'ALIEF ', 'Administrasi', 'IPSRS', 'MERCU', 'Islam', '2018-02-21', 'Jepang', '12345', 'L', '12345', '8fa15d538c9170_full.jpg'),
('kisma', 'KISMAWATI', 'Administrasi', 'IPSRS', 'Mercubuana', 'Islam', '2017-12-17', 'Karanganyar', '12345', 'P', '12345', '250px-Snow_White_Disney.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`no_seri`),
  ADD KEY `kd_lokalat` (`kd_lokalat`);

--
-- Indexes for table `hsl_pemeliharaan`
--
ALTER TABLE `hsl_pemeliharaan`
  ADD PRIMARY KEY (`kd_hasil`),
  ADD KEY `kd_jadwal` (`kd_jadwal`),
  ADD KEY `no_seri` (`no_seri`),
  ADD KEY `kd_lokalat` (`kd_lokalat`),
  ADD KEY `kd_pemeliharaan` (`kd_pemeliharaan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `no_seri` (`no_seri`),
  ADD KEY `kd_lokalat` (`kd_lokalat`);

--
-- Indexes for table `lokasi_alat`
--
ALTER TABLE `lokasi_alat`
  ADD PRIMARY KEY (`kd_lokalat`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`kd_pemeliharaan`),
  ADD KEY `kd_jadwal` (`kd_jadwal`),
  ADD KEY `no_seri` (`no_seri`),
  ADD KEY `kd_lokalat` (`kd_lokalat`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alat`
--
ALTER TABLE `alat`
  ADD CONSTRAINT `alat_ibfk_1` FOREIGN KEY (`kd_lokalat`) REFERENCES `lokasi_alat` (`kd_lokalat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hsl_pemeliharaan`
--
ALTER TABLE `hsl_pemeliharaan`
  ADD CONSTRAINT `hsl_pemeliharaan_ibfk_1` FOREIGN KEY (`kd_jadwal`) REFERENCES `jadwal` (`kd_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hsl_pemeliharaan_ibfk_2` FOREIGN KEY (`no_seri`) REFERENCES `alat` (`no_seri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hsl_pemeliharaan_ibfk_3` FOREIGN KEY (`kd_lokalat`) REFERENCES `lokasi_alat` (`kd_lokalat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hsl_pemeliharaan_ibfk_4` FOREIGN KEY (`kd_pemeliharaan`) REFERENCES `pemeliharaan` (`kd_pemeliharaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hsl_pemeliharaan_ibfk_5` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`no_seri`) REFERENCES `alat` (`no_seri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kd_lokalat`) REFERENCES `lokasi_alat` (`kd_lokalat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD CONSTRAINT `pemeliharaan_ibfk_1` FOREIGN KEY (`kd_jadwal`) REFERENCES `jadwal` (`kd_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeliharaan_ibfk_2` FOREIGN KEY (`no_seri`) REFERENCES `alat` (`no_seri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeliharaan_ibfk_3` FOREIGN KEY (`kd_lokalat`) REFERENCES `lokasi_alat` (`kd_lokalat`),
  ADD CONSTRAINT `pemeliharaan_ibfk_4` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
