-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2023 pada 03.34
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-sistem-booking-billboard`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nomor_telepon` varchar(30) NOT NULL,
  `status` enum('Admin') NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `nomor_telepon`, `status`) VALUES
(1, 'Admin Sistem', 'admin122@gmail.com', '$2y$10$FOLMcTQ.ZQmG4XkXHemNkuvTur77scCIzvFMyQyRV9SdbHXGYN0iy', '08989786444', 'Admin'),
(2, 'Admin Sistem Booking', 'admin@gmail.com', '$2y$10$CfofXEParDaLa28vB2/i9uxG0Z8ywPKJycZ9pBYn/vSYeZ6fd4e9a', '089677565', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_order`
--

CREATE TABLE `data_order` (
  `id_member` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_reklame` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_konfirmasi_pembayaran` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_reklame` int(11) NOT NULL,
  `upload_BT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_pesanan` varchar(10) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_reklame` int(11) NOT NULL,
  `cekin_pasang` int(11) NOT NULL,
  `cekout_pasang` int(11) NOT NULL,
  `tambah_cetak` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklame`
--

CREATE TABLE `reklame` (
  `id_reklame` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `orientation_page` varchar(100) NOT NULL,
  `penerangan` varchar(100) NOT NULL,
  `jarak_pandang` varchar(100) NOT NULL,
  `jumlah_sisi` varchar(100) NOT NULL,
  `situasi_lalulintas` varchar(100) NOT NULL,
  `situasi_sekitar` varchar(100) NOT NULL,
  `target_audiens` varchar(100) NOT NULL,
  `google_maps` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklame`
--

INSERT INTO `reklame` (`id_reklame`, `lokasi`, `ukuran`, `orientation_page`, `penerangan`, `jarak_pandang`, `jumlah_sisi`, `situasi_lalulintas`, `situasi_sekitar`, `target_audiens`, `google_maps`, `gambar`) VALUES
(1, 'Lokasi 1', 'Ukuran 1', 'A4', 'Penerangan 1', 'Jarak Pandang 1', 'Jumlah Sisi 1', 'Lalu Lintas 1', 'Sekitar 1', 'Audiens 1', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '01232023102801Lokasi 1.jpg'),
(3, 'Lokasi 2', 'Ukuran 2', 'A4', 'Penerangan 2', 'Jarak Pandang 2', 'Jumlah Sisi 2', 'Lalu Lintas 2', 'Sekitar 2', 'Audiens 2', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '01232023122849Lokasi 2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_telepon` varchar(30) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat_perusahaan` varchar(100) NOT NULL,
  `status` enum('User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_member`, `nama`, `email`, `password`, `alamat`, `nomor_telepon`, `nama_perusahaan`, `alamat_perusahaan`, `status`) VALUES
(1, 'Renaldi', 'renaldi@gmail.com', '$2y$10$K.CZi5pAZwaUGoEmgNFGWOi9g.OnSReKiWqMCG2Z14zNvRKmPeotK', 'Bandung', '089886763', 'Perusahaan 1', 'Alamat Perusahaan 1', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_konfirmasi_pembayaran`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `reklame`
--
ALTER TABLE `reklame`
  ADD PRIMARY KEY (`id_reklame`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_member`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reklame`
--
ALTER TABLE `reklame`
  MODIFY `id_reklame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
