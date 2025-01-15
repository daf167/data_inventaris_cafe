-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2025 pada 17.40
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
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbarang`
--

CREATE TABLE `tbarang` (
  `id_barang` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal` varchar(25) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `tanggal_simpan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbarang`
--

INSERT INTO `tbarang` (`id_barang`, `kode`, `nama`, `asal`, `jumlah`, `satuan`, `tanggal_diterima`, `tanggal_simpan`) VALUES
(1, 'INV-2025-001', 'Susu', 'pembelian', 10, 'pcs', '2025-01-13', '2025-01-14 15:27:41'),
(2, 'INV-2025-002', 'Krimer', 'Pembelian', 5, 'pcs', '2025-01-13', '2025-01-14 15:27:54'),
(3, 'INV-2025-003', 'Gula', 'Pembelian', 2, 'Kotak', '2025-01-14', '2025-01-14 16:11:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbarang`
--
ALTER TABLE `tbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbarang`
--
ALTER TABLE `tbarang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
