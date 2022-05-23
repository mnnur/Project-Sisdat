-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2022 pada 05.19
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

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
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` varchar(12) NOT NULL,
  `nama_kurir` varchar(64) DEFAULT NULL,
  `jk_kurir` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `jk_kurir`) VALUES
('004001', 'Budi', 'L'),
('004002', 'Budiyono', 'L'),
('004003', 'Elizabeth', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `memiliki`
--

CREATE TABLE `memiliki` (
  `id_pengirim` varchar(12) DEFAULT NULL,
  `id_produk` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `memiliki`
--

INSERT INTO `memiliki` (`id_pengirim`, `id_produk`) VALUES
('002001', '001005'),
('002001', '001004'),
('002002', '001003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menerima`
--

CREATE TABLE `menerima` (
  `id_penerima` varchar(12) DEFAULT NULL,
  `id_produk` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menerima`
--

INSERT INTO `menerima` (`id_penerima`, `id_produk`) VALUES
('003001', '001001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menginfokan`
--

CREATE TABLE `menginfokan` (
  `id_kurir` varchar(12) DEFAULT NULL,
  `id_pengirim` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menginfokan`
--

INSERT INTO `menginfokan` (`id_kurir`, `id_pengirim`) VALUES
('004003', '002003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengirim`
--

CREATE TABLE `mengirim` (
  `id_kurir` varchar(12) DEFAULT NULL,
  `id_produk` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mengirim`
--

INSERT INTO `mengirim` (`id_kurir`, `id_produk`) VALUES
('004001', '001004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` varchar(12) NOT NULL,
  `nama_penerima` varchar(64) DEFAULT NULL,
  `alamat_penerima` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerima`
--

INSERT INTO `penerima` (`id_penerima`, `nama_penerima`, `alamat_penerima`) VALUES
('003001', 'Sukijan', 'Jl. Kemah'),
('003002', 'Hermawan Suntoso', 'Jl. Penari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengirim`
--

CREATE TABLE `pengirim` (
  `id_pengirim` varchar(12) NOT NULL,
  `nama_pengirim` varchar(64) DEFAULT NULL,
  `alamat_pengirim` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengirim`
--

INSERT INTO `pengirim` (`id_pengirim`, `nama_pengirim`, `alamat_pengirim`) VALUES
('002001', 'Toko Serbaada', 'Jl. Informatika no. 1'),
('002002', 'Toko Millenium Elektrik', 'Jl. Pasir Rumput'),
('002003', 'Sandi Store', 'Jl. Informatika no. 24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(12) NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `berat`) VALUES
('001001', 'Nastar Istimewa', 1),
('001002', 'Kunyit Merah', 1),
('001003', 'Susu Beruang', 2),
('001004', 'NULLTX Graphic Processor', 1),
('001005', 'Air Botol Kemasan Ultra HD+', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `memiliki`
--
ALTER TABLE `memiliki`
  ADD KEY `id_pengirim` (`id_pengirim`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `menerima`
--
ALTER TABLE `menerima`
  ADD KEY `id_penerima` (`id_penerima`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `menginfokan`
--
ALTER TABLE `menginfokan`
  ADD KEY `id_kurir` (`id_kurir`),
  ADD KEY `id_pengirim` (`id_pengirim`);

--
-- Indeks untuk tabel `mengirim`
--
ALTER TABLE `mengirim`
  ADD KEY `id_kurir` (`id_kurir`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indeks untuk tabel `pengirim`
--
ALTER TABLE `pengirim`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `memiliki`
--
ALTER TABLE `memiliki`
  ADD CONSTRAINT `memiliki_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirim` (`id_pengirim`),
  ADD CONSTRAINT `memiliki_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `menerima`
--
ALTER TABLE `menerima`
  ADD CONSTRAINT `menerima_ibfk_1` FOREIGN KEY (`id_penerima`) REFERENCES `penerima` (`id_penerima`),
  ADD CONSTRAINT `menerima_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `menginfokan`
--
ALTER TABLE `menginfokan`
  ADD CONSTRAINT `menginfokan_ibfk_1` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`),
  ADD CONSTRAINT `menginfokan_ibfk_2` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirim` (`id_pengirim`);

--
-- Ketidakleluasaan untuk tabel `mengirim`
--
ALTER TABLE `mengirim`
  ADD CONSTRAINT `mengirim_ibfk_1` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`),
  ADD CONSTRAINT `mengirim_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
