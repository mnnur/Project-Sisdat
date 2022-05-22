-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 04:57 AM
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
-- Database: `webtracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` varchar(12) NOT NULL,
  `nama_kurir` varchar(64) DEFAULT NULL,
  `jk_kurir` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `jk_kurir`) VALUES
('1111111', 'dsdsdsa', 'P'),
('1224', 'fdf', 'p'),
('122432', 'ass', 'L'),
('12343', 'assss', 'L'),
('23232323', 'as', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `memiliki`
--

CREATE TABLE `memiliki` (
  `id_pengirim` varchar(12) DEFAULT NULL,
  `id_produk` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memiliki`
--

INSERT INTO `memiliki` (`id_pengirim`, `id_produk`) VALUES
('2221', '123');

-- --------------------------------------------------------

--
-- Table structure for table `menerima`
--

CREATE TABLE `menerima` (
  `id_penerima` varchar(12) DEFAULT NULL,
  `id_produk` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menerima`
--

INSERT INTO `menerima` (`id_penerima`, `id_produk`) VALUES
('972574', '2233'),
('4554', '123');

-- --------------------------------------------------------

--
-- Table structure for table `menginfokan`
--

CREATE TABLE `menginfokan` (
  `id_kurir` varchar(12) DEFAULT NULL,
  `id_pengirim` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menginfokan`
--

INSERT INTO `menginfokan` (`id_kurir`, `id_pengirim`) VALUES
('1111111', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `mengirim`
--

CREATE TABLE `mengirim` (
  `id_kurir` varchar(12) DEFAULT NULL,
  `id_produk` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mengirim`
--

INSERT INTO `mengirim` (`id_kurir`, `id_produk`) VALUES
('1111111', '123'),
('1111111', '2233');

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` varchar(12) NOT NULL,
  `nama_penerima` varchar(64) DEFAULT NULL,
  `alamat_penerima` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`id_penerima`, `nama_penerima`, `alamat_penerima`) VALUES
('4554', 'kenapa di ganti', '24 jalan 24'),
('972574', 'namanya ga ada katanya', 'yaudah ga usah');

-- --------------------------------------------------------

--
-- Table structure for table `pengirim`
--

CREATE TABLE `pengirim` (
  `id_pengirim` varchar(12) NOT NULL,
  `nama_pengirim` varchar(64) DEFAULT NULL,
  `alamat_pengirim` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengirim`
--

INSERT INTO `pengirim` (`id_pengirim`, `nama_pengirim`, `alamat_pengirim`) VALUES
('1111', 'tadi salah', 'tapi udh di edit'),
('2221', 'kastanye merah', 'jalan mencari cinta');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(12) NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `berat`) VALUES
('123', 'ass', 2),
('2233', '12', 4),
('333', 'abc', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `memiliki`
--
ALTER TABLE `memiliki`
  ADD KEY `id_pengirim` (`id_pengirim`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `menerima`
--
ALTER TABLE `menerima`
  ADD KEY `id_penerima` (`id_penerima`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `menginfokan`
--
ALTER TABLE `menginfokan`
  ADD KEY `id_kurir` (`id_kurir`),
  ADD KEY `id_pengirim` (`id_pengirim`);

--
-- Indexes for table `mengirim`
--
ALTER TABLE `mengirim`
  ADD KEY `id_kurir` (`id_kurir`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `pengirim`
--
ALTER TABLE `pengirim`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `memiliki`
--
ALTER TABLE `memiliki`
  ADD CONSTRAINT `memiliki_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirim` (`id_pengirim`),
  ADD CONSTRAINT `memiliki_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `menerima`
--
ALTER TABLE `menerima`
  ADD CONSTRAINT `menerima_ibfk_1` FOREIGN KEY (`id_penerima`) REFERENCES `penerima` (`id_penerima`),
  ADD CONSTRAINT `menerima_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `menginfokan`
--
ALTER TABLE `menginfokan`
  ADD CONSTRAINT `menginfokan_ibfk_1` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`),
  ADD CONSTRAINT `menginfokan_ibfk_2` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirim` (`id_pengirim`);

--
-- Constraints for table `mengirim`
--
ALTER TABLE `mengirim`
  ADD CONSTRAINT `mengirim_ibfk_1` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`),
  ADD CONSTRAINT `mengirim_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
