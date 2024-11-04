-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2024 pada 09.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'adminlaundry', 'laundry123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_harga`
--

CREATE TABLE `tb_harga` (
  `harga_per_kg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_harga`
--

INSERT INTO `tb_harga` (`harga_per_kg`) VALUES
(7000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(10) NOT NULL,
  `no_telp_pelanggan` varchar(13) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_telp_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'Amaa', '082126028518', 'Jl Cikutra No 2B'),
(2, 'Alina', '089746532114', 'Jl Sangkuriang No 8'),
(3, 'Rizky', '088785531042', 'Jl Sukapura No 33'),
(4, 'Ipeh', '081528306515', 'Jl Bougenvile No 8A'),
(5, 'Dimas', '087865049248', 'Jl Turangga No 11'),
(9, 'Arsy', '089564327481', 'Komp. Bumi Asri Blok A No.10'),
(10, 'Tiara', '082146359000', 'Jl Dungus Cariang No 21'),
(11, 'Lina', '089763542001', 'Jl Supratman No 23'),
(12, 'Ryan', '088200095791', 'Jl Setrawangi 2 No 6'),
(13, 'Farhan', '087890023443', 'Komp. Bumi Orange Blok B No 9'),
(14, 'Rafa', '0821320579613', 'Jl Cikaso Selatan No 20'),
(17, 'Rofiq', '089745632001', 'Komp Kawaluyaan Blok A9 No 9'),
(19, 'Zara', '089765432876', 'Jl Ciwastra No 78');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan_trans` int(11) NOT NULL,
  `tgl_transaksi_masuk` date NOT NULL,
  `tgl_transaksi_selesai` date NOT NULL,
  `transaksi_berat` int(11) NOT NULL,
  `transaksi_harga` varchar(11) NOT NULL,
  `transaksi_status` varchar(10) NOT NULL,
  `biaya_total` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_pelanggan_trans`, `tgl_transaksi_masuk`, `tgl_transaksi_selesai`, `transaksi_berat`, `transaksi_harga`, `transaksi_status`, `biaya_total`) VALUES
(2, 3, '2024-10-01', '2024-10-04', 4, '5000', 'Selesai', 20000),
(3, 2, '2024-10-29', '2024-11-01', 5, '5000', 'Selesai', 25000),
(4, 4, '2024-10-29', '2024-11-01', 3, '5000', 'Selesai', 15000),
(5, 5, '2024-10-31', '2024-11-03', 7, '5000', 'Selesai', 35000),
(6, 9, '2024-11-01', '2024-11-04', 6, '5000', 'Selesai', 30000),
(7, 10, '2024-11-02', '2024-11-05', 3, '5000', 'Selesai', 15000),
(8, 11, '2024-11-02', '2024-11-05', 7, '5000', 'Proses', 35000),
(9, 12, '2024-11-03', '2024-11-06', 5, '5000', 'Proses', 25000),
(10, 13, '2024-11-03', '2024-11-06', 1, '5000', 'Proses', 5000),
(11, 14, '2024-11-04', '2024-11-07', 2, '5000', 'Proses', 10000),
(13, 1, '2024-10-01', '2024-10-04', 6, '5000', 'Proses', 30000),
(14, 3, '2024-11-04', '2024-11-07', 7, '5000', 'Antrian', 35000),
(15, 13, '2024-11-10', '2024-11-13', 4, '5000', 'Antrian', 20000),
(17, 18, '2024-11-04', '2024-11-07', 6, '5000', 'Antrian', 30000),
(18, 19, '2024-11-04', '2024-11-07', 5, '5000', 'Antrian', 25000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
