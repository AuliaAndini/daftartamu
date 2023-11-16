-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2023 pada 04.59
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
-- Database: `bukutamu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftartamu`
--

CREATE TABLE `daftartamu` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `perihal_kunjungan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `surat_permohonan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `alasan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftartamu`
--

INSERT INTO `daftartamu` (`id`, `nama_instansi`, `nama_tamu`, `jumlah`, `no_telepon`, `perihal_kunjungan`, `tanggal`, `jam`, `surat_permohonan`, `status`, `alasan`) VALUES
(2, 'BNN', 'Zeline', '3', '085345456767', 'Rapat', '2023-11-16', '17:20:00', '65558939ab18a.pdf', 'Tolak', ' Sudah Full'),
(3, 'Universitas Islam Kalimantan', 'Maria Ulfa', '3', '089560607070', 'kunjungan', '2023-11-16', '14:20:00', '655589c281e20.pdf', 'Terima', '-'),
(4, 'DPMPTSP TABALONG', 'Agha Winata', '3', '08999000908080', 'Rapat Dinas', '2023-11-17', '14:00:00', '65559082621b0.pdf', 'Tolak', 'Lengkapi data anda'),
(5, 'Kelurahan Kelayan Timur', 'Dikri Raisi', '1', '089512123434', 'Bertemu Kadis', '2023-11-16', '14:00:00', '65559380b693a.pdf', 'Terima', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwaltamu`
--

CREATE TABLE `jadwaltamu` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwaltamu`
--

INSERT INTO `jadwaltamu` (`id`, `nama_instansi`, `tanggal`, `jam`) VALUES
(2, 'BNN', '2023-10-26', '05:05:00'),
(3, 'Universitas Islam Kalimantan', '2023-10-24', '21:04:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumsi`
--

CREATE TABLE `konsumsi` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `konsumsi` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konsumsi`
--

INSERT INTO `konsumsi` (`id`, `tanggal`, `nama_instansi`, `nama_tamu`, `jumlah`, `konsumsi`, `harga`, `total`) VALUES
(2, '2023-10-23', 'DPMPTSP TABALONG', 'Ziya Carissa Safitri', '2', 'Nasi Kotak ', '15000', '30000'),
(3, '2023-10-30', 'DPMPTSP TABALONG', 'Novan Arri', '2', 'Snack', '30000', '60000'),
(4, '2023-11-16', 'BNN', 'Maria Ulfa', '2', 'Snack', '10000', '20000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `peran` enum('ADMIN','USER') DEFAULT NULL,
  `login_terakhir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `peran`, `login_terakhir`) VALUES
(1, 'admin', '$2y$10$baqQ4zTS37tzcjXzcU9GjO5.a.IIvc1OX1.kwHleKXxjVo9dZXDK2', 'ADMIN', '2023-11-16 03:59:14'),
(2, 'user', '$2y$10$gBV9hnlsGw6jzOrnmaTKROgwyEdVIdzEOMk3hpXFY2G9QwBoo2yEa', 'USER', '2023-10-30 07:34:38'),
(9, 'novan', '$2y$10$fJDbdzZkImB/Uu.56q389.utBa7xKZJclb/R7fQoXzxl4GbB2g8FG', 'USER', '2023-11-16 02:57:51'),
(10, 'dikri', '$2y$10$lK5soXIJSjS4CojSKbsLhejXhRQAm7k6JDVwinwjWz594o.ebRwHK', 'USER', '2023-11-16 02:58:02'),
(11, 'andini', '$2y$10$a5O8gQh3sWBFRh4KQtxOqeyZwfjlncU7hnhauyPbRoLZuQXWwrKPm', 'USER', '2023-11-16 03:55:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftartamu`
--
ALTER TABLE `daftartamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwaltamu`
--
ALTER TABLE `jadwaltamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsumsi`
--
ALTER TABLE `konsumsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftartamu`
--
ALTER TABLE `daftartamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jadwaltamu`
--
ALTER TABLE `jadwaltamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `konsumsi`
--
ALTER TABLE `konsumsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
