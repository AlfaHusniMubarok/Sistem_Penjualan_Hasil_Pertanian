-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2023 pada 07.01
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertanian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `no` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `no`, `username`, `password`) VALUES
(1, 'Alfa Husni Mubarok', '08985474989', 'alfahusnimubarok', '3db8b542bfbe45b36de7d8ca9702d665'),
(2, 'Dwi Nur Prasetyo', '081567808461', 'dwinur', 'ece77d639edf0d0b3b6d8e6a5a4534f7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(3) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stock` int(20) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `harga_beli` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stock`, `harga_jual`, `harga_beli`) VALUES
(1, 'Beras', 8, 10000, 9000),
(2, 'Jagung', 20, 4000, 3500),
(3, 'Bawang Merah', 10, 18000, 17000),
(4, 'Bawang Putih', 10, 19500, 18500),
(5, 'Cabai Merah', 10, 16000, 15000),
(6, 'Cabai Rawit Setan', 10, 20000, 19000),
(7, 'Cabai Rawit Hijau', 10, 19000, 18000),
(8, 'Cabai Keriting', 10, 15000, 14000),
(9, 'Singkong', 10, 5000, 4500),
(10, 'Daun Bawang', 9, 13500, 12500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(3) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `berat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nama_konsumen`, `alamat`, `nomor`, `nama_barang`, `berat`) VALUES
(1, 'Diana', 'Rowo Tengah RT 4/ RW 1', '08985474988', 'Daun Bawang', 1),
(2, 'Nikita', 'Plamongansari Rt 2/Rw 11', '08985474988', 'Beras', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(3) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `nama_petani` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `berat` int(15) NOT NULL,
  `pengeluaran` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `nama_admin`, `nama_petani`, `nama_barang`, `berat`, `pengeluaran`) VALUES
(1, 'Dwinur', 'Alfa', 'Jagung', 10, 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(3) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `berat` int(15) NOT NULL,
  `penghasilan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `nama_admin`, `nama_konsumen`, `nama_barang`, `berat`, `penghasilan`) VALUES
(1, 'Dwinur', 'Diana', 'Daun Bawang', 1, 13500),
(2, 'Dwinur', 'Nikita', 'Beras', 2, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petani`
--

CREATE TABLE `petani` (
  `id_petani` int(3) NOT NULL,
  `nama_petani` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `berat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petani`
--

INSERT INTO `petani` (`id_petani`, `nama_petani`, `alamat`, `nomor`, `nama_barang`, `berat`) VALUES
(1, 'Alfa', 'Dukuh Katonsari, RT 2/RW 2', '08985474989', 'Jagung', 10),
(2, 'Khamdan', 'Jalan Ninja RT 3/RW 4', '08985474988', 'Bawang Merah', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`id_petani`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petani`
--
ALTER TABLE `petani`
  MODIFY `id_petani` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
