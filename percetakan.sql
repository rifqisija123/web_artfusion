-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Agu 2024 pada 11.32
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `percetakan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `content`) VALUES
(1, 'Sample Data 1'),
(2, 'Sample Data 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakaryawan`
--

CREATE TABLE `datakaryawan` (
  `idkaryawan` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `namakaryawan` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datakaryawan`
--

INSERT INTO `datakaryawan` (`idkaryawan`, `avatar`, `namakaryawan`, `username`, `password`, `jabatan`, `status`) VALUES
(87, '154ef487c3c75be51fe900177a6174ab.jpg', 'Rifqi', 'administrator', 'rifqi123', 'Guru Produktif SIJA', 'Admin'),
(88, '4e5ea486556827528c331c9b677e5c7d.jpg', 'Syukri', 'administrator', 'apaaja', 'Guru Produktif SIJA', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hargabahan`
--

CREATE TABLE `hargabahan` (
  `idhargabahan` int(11) NOT NULL,
  `namabahan` varchar(255) NOT NULL,
  `harga` int(50) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hargabahan`
--

INSERT INTO `hargabahan` (`idhargabahan`, `namabahan`, `harga`, `supplier`, `keterangan`) VALUES
(7, 'Tinta', 5000, 'Rifqi', 'buat print'),
(18, 'Kipas angin', 1200, 'SMKN 9', 'buat adem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_user`, `email`, `password`) VALUES
(1, 'metatech9@gmail.com', 'adminsija123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idpemesanan` int(11) NOT NULL,
  `namacustomer` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `noinvoice` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` varchar(50) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`idpemesanan`, `namacustomer`, `tanggal`, `noinvoice`, `status`, `namabarang`, `stok`) VALUES
(111, 'ArtFusion', '2024-08-13 00:07:33', 'INV00001', 'Proses Produksi', 'Stiker', 1000),
(112, 'Mas hafis', '2024-08-13 00:07:51', 'INV00002', 'Menunggu', 'Banner', 40),
(114, 'Mas sukri', '2024-08-13 07:23:34', 'INV00003', 'Proses Design', 'LCD 16x2', 25),
(118, 'Rifqi', '2024-08-13 17:27:19', 'INV00004', 'Siap Cetak', 'Jam', 70),
(119, 'Mas Agus', '2024-08-13 22:12:23', 'INV00005', 'Selesai', 'vas bunga', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokbahan`
--

CREATE TABLE `stokbahan` (
  `idstokbahan` int(11) NOT NULL,
  `namabahan` varchar(255) NOT NULL,
  `jumlahstok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stokbahan`
--

INSERT INTO `stokbahan` (`idstokbahan`, `namabahan`, `jumlahstok`) VALUES
(1, 'Kertas Artpaper 150', 200),
(2, 'Kertas BC 210gsm', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin123@gmail.com', 'adminpass', 'admin'),
(2, 'user123@gmail.com', 'userpass', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datakaryawan`
--
ALTER TABLE `datakaryawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indeks untuk tabel `hargabahan`
--
ALTER TABLE `hargabahan`
  ADD PRIMARY KEY (`idhargabahan`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpemesanan`);

--
-- Indeks untuk tabel `stokbahan`
--
ALTER TABLE `stokbahan`
  ADD PRIMARY KEY (`idstokbahan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `datakaryawan`
--
ALTER TABLE `datakaryawan`
  MODIFY `idkaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `hargabahan`
--
ALTER TABLE `hargabahan`
  MODIFY `idhargabahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `stokbahan`
--
ALTER TABLE `stokbahan`
  MODIFY `idstokbahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
