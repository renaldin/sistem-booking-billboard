-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2023 pada 09.04
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
  `status` enum('Admin') NOT NULL DEFAULT 'Admin',
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `nomor_telepon`, `status`, `foto`) VALUES
(1, 'Admin Sistem', 'admin122@gmail.com', '$2y$10$FOLMcTQ.ZQmG4XkXHemNkuvTur77scCIzvFMyQyRV9SdbHXGYN0iy', '08989786444', 'Admin', '02162023154704Admin Sistem.jpg'),
(2, 'Admin Sistem Booking', 'admin@gmail.com', '$2y$10$CfofXEParDaLa28vB2/i9uxG0Z8ywPKJycZ9pBYn/vSYeZ6fd4e9a', '089677565', 'Admin', '02162023160429Admin Sistem Booking.jpg'),
(5, 'Renaldi Noviandi', 'renaldinoviandi0@gmail.com', '$2y$10$l.yCxYQ8dLkdbmSmjJLl7.VqG3WSJdY2OTAWyZ0HLL9P2Tofhto4a', '08989786444', 'Admin', '03022023122336Renaldi Noviandi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata_web`
--

CREATE TABLE `biodata_web` (
  `id_biodata_web` int(11) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `logo` text NOT NULL,
  `power_harga` enum('On','Off') DEFAULT 'Off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biodata_web`
--

INSERT INTO `biodata_web` (`id_biodata_web`, `nama_website`, `email`, `nomor_telepon`, `alamat`, `logo`, `power_harga`) VALUES
(1, 'Sistem Booking Billboard', 'sistembookingbillboard@gmail.com', '(123) 123-456', 'Jalan Srigunting Raya Nomor 1 Bandung', '03022023141537.png', 'Off');

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
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `tampil` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id_faq`, `nama`, `email`, `pertanyaan`, `jawaban`, `tampil`) VALUES
(2, 'Admin', 'admin@gmail.com', 'Pertanyaan 1 ?', 'Jawaban 1', 'Ya'),
(3, 'Admin', 'admin@gmail.com', 'Pertanyaan 2 ?', 'Jawaban 2', 'Ya'),
(4, 'Admin', 'admin@gmail.com', 'Pertanyaan 3 ?', 'Jawaban 3', 'Ya'),
(5, 'Admin', 'admin@gmail.com', 'Pertanyaan 4 ?', 'Jawaban 4', 'Ya'),
(6, 'Admin', 'admin@gmail.com', 'Pertanyaan 5 ?', 'Jawaban 5', 'Ya'),
(7, 'Admin', 'admin@gmail.com', 'Pertanyaan 6 ?', 'Jawaban 6', 'Ya'),
(8, 'Admin', 'admin@gmail.com', 'Pertanyaan 7 ?', 'Jawaban 7', 'Ya'),
(10, 'Renaldi', 'renaldi@gmail.com', 'Harganya murah ga min?', 'Murah murah kak', 'Ya'),
(11, 'Renaldi 1', 'renaldi@gmail.com', 'Proses Bookingnya Mudah Ga min?', NULL, 'Tidak'),
(12, 'Admin', 'admin@gmail.com', 'Pertanyaan 10?', 'Jawaban 10', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_reklame`
--

CREATE TABLE `gambar_reklame` (
  `id_gambar_reklame` int(11) NOT NULL,
  `id_reklame` int(11) NOT NULL,
  `gambar_reklame` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_reklame`
--

INSERT INTO `gambar_reklame` (`id_gambar_reklame`, `id_reklame`, `gambar_reklame`) VALUES
(4, 15, '03182023080644Lokasi 180.jpg'),
(5, 15, '03182023080644Lokasi 181.jpg'),
(6, 15, '03182023080644Lokasi 182.jpg'),
(7, 15, '03182023080644Lokasi 183.jpg'),
(8, 14, '03182023082202Lokasi 160.jpg'),
(9, 14, '03182023082202Lokasi 161.jpg'),
(10, 14, '03182023082202Lokasi 162.jpg'),
(11, 13, '03182023082312Lokasi 150.jpg'),
(12, 13, '03182023082312Lokasi 151.jpg'),
(13, 13, '03182023082312Lokasi 152.jpg'),
(14, 12, '03182023082343Lokasi 110.jpg'),
(15, 12, '03182023082343Lokasi 111.jpg'),
(16, 12, '03182023082343Lokasi 112.jpg'),
(17, 11, '03182023082501Lokasi 100.jpg'),
(18, 11, '03182023082501Lokasi 101.jpg'),
(19, 9, '03182023082526Lokasi 80.jpg'),
(20, 9, '03182023082526Lokasi 81.jpg'),
(21, 9, '03182023082526Lokasi 82.jpg'),
(22, 8, '03182023082552Lokasi 70.jpg'),
(23, 8, '03182023082552Lokasi 71.jpg'),
(24, 7, '03182023082612Lokasi 60.jpg'),
(25, 7, '03182023082612Lokasi 61.jpg'),
(26, 6, '03182023082636Lokasi 50.jpg'),
(27, 6, '03182023082636Lokasi 51.jpg'),
(28, 5, '03182023082857Lokasi 40.jpg'),
(29, 5, '03182023082857Lokasi 41.jpg'),
(30, 4, '03182023082921Lokasi 30.jpg'),
(31, 4, '03182023082921Lokasi 31.jpg'),
(32, 3, '03182023082944Lokasi 20.jpg'),
(33, 3, '03182023082944Lokasi 21.jpg'),
(34, 1, '03182023083008Lokasi 10.jpg'),
(35, 1, '03182023083008Lokasi 11.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `no_invoice` varchar(30) NOT NULL,
  `id_pesanan` varchar(20) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `tanggal_tempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`no_invoice`, `id_pesanan`, `tanggal_dibuat`, `tanggal_tempo`) VALUES
('IN-202302110323', 'PO-202302110902', '2023-02-11', '2023-02-18'),
('IN-202302120704', 'PO-202302111003', '2023-02-12', '2023-02-19'),
('IN-202303121018', 'PO-202301270624', '2023-03-12', '2023-03-19'),
('IN-202303200331', 'PO-202303200335', '2023-03-20', '2023-03-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_konfirmasi_pembayaran` int(11) NOT NULL,
  `id_pesanan` varchar(30) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_reklame` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `upload_BT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id_konfirmasi_pembayaran`, `id_pesanan`, `id_member`, `id_reklame`, `tanggal_bayar`, `upload_BT`) VALUES
(2, 'PO-202301270655', 1, 10, '2023-01-29', '01292023090531PO-202301270655.png'),
(3, 'PO-202301270624', 1, 1, '2023-01-29', '01292023090615PO-202301270624.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_pesanan` varchar(20) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_reklame` int(11) NOT NULL,
  `cekin_pasang` date NOT NULL,
  `cekout_pasang` date NOT NULL,
  `tambah_cetak` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `jam_harga` time NOT NULL,
  `star` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `status_order` enum('Dibooking','Batal','Dibayar','Approve/Tayang','Selesai') NOT NULL,
  `status_invoice` enum('Sudah','Tidak') DEFAULT 'Tidak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_pesanan`, `id_member`, `id_reklame`, `cekin_pasang`, `cekout_pasang`, `tambah_cetak`, `tanggal`, `harga`, `jam_harga`, `star`, `review`, `status_order`, `status_invoice`) VALUES
('PO-202301270624', 1, 1, '0000-00-00', '0000-00-00', 'Ya', '2023-01-27', 5000000, '04:50:52', 4, 'Excepteur sint occaecat cupidatat non proident sunt in culpa officia deserunt mollit anim laborum sint occaecat cupidatat non proident. Occaecat cupidatat non proident des.', 'Approve/Tayang', 'Sudah'),
('PO-202301270646', 3, 3, '0000-00-00', '0000-00-00', 'Tidak', '2023-01-27', 15000000, '04:50:52', 5, 'Excepteur sint occaecat cupidatat non proident sunt in culpa officia deserunt mollit anim laborum sint occaecat cupidatat non proident. Occaecat cupidatat non proident des.', 'Dibooking', 'Tidak'),
('PO-202301270655', 1, 10, '0000-00-00', '0000-00-00', 'Ya', '2023-01-27', 5000000, '04:50:52', 5, 'Excepteur sint occaecat cupidatat non proident sunt in culpa officia deserunt mollit anim laborum sint occaecat cupidatat non proident. Occaecat cupidatat non proident des.', 'Dibayar', 'Tidak'),
('PO-202301270852', 1, 11, '0000-00-00', '0000-00-00', 'Ya', '2023-01-28', 10000000, '04:50:52', 5, 'Excepteur sint occaecat cupidatat non proident sunt in culpa officia deserunt mollit anim laborum sint occaecat cupidatat non proident. Occaecat cupidatat non proident des.', 'Batal', 'Tidak'),
('PO-202301290745', 4, 11, '0000-00-00', '0000-00-00', 'Ya', '2023-01-29', 10000000, '03:42:45', 4, 'Excepteur sint occaecat cupidatat non proident sunt in culpa officia deserunt mollit anim laborum sint occaecat cupidatat non proident. Occaecat cupidatat non proident des.', 'Dibooking', 'Tidak'),
('PO-202302110902', 1, 8, '2023-02-11', '2023-04-11', 'Ya', '2023-02-11', 10000000, '17:48:02', 4, 'Sangat menarik. Websitenya kerenn euy', 'Batal', 'Sudah'),
('PO-202302110937', 1, 8, '2023-02-11', '2023-06-15', 'Tidak', '2023-02-11', 5000000, '05:32:37', NULL, NULL, 'Batal', 'Tidak'),
('PO-202302111003', 1, 12, '2023-02-11', '2023-04-11', 'Ya', '2023-02-11', 5000000, '18:27:03', NULL, NULL, 'Batal', 'Sudah'),
('PO-202303060144', 1, 7, '0000-00-00', '0000-00-00', 'Ya', '2023-03-06', NULL, '22:22:44', NULL, NULL, 'Batal', 'Tidak'),
('PO-202303060148', 1, 7, '0000-00-00', '0000-00-00', 'Ya', '2023-03-06', NULL, '22:33:48', NULL, NULL, 'Batal', 'Tidak'),
('PO-202303060204', 1, 7, '0000-00-00', '0000-00-00', 'Ya', '2023-03-06', NULL, '23:19:04', NULL, NULL, 'Batal', 'Tidak'),
('PO-202303060211', 1, 7, '0000-00-00', '0000-00-00', 'Ya', '2023-03-06', NULL, '23:05:11', NULL, NULL, 'Batal', 'Tidak'),
('PO-202303060235', 1, 7, '0000-00-00', '0000-00-00', 'Ya', '2023-03-06', NULL, '23:19:35', NULL, NULL, 'Batal', 'Tidak'),
('PO-202303060242', 1, 7, '0000-00-00', '0000-00-00', 'Ya', '2023-03-06', NULL, '23:29:42', NULL, NULL, 'Batal', 'Tidak'),
('PO-202303060249', 1, 7, '0000-00-00', '0000-00-00', 'Ya', '2023-03-06', NULL, '23:07:49', NULL, NULL, 'Batal', 'Tidak'),
('PO-202303060741', 1, 7, '2023-03-06', '2023-04-06', 'Ya', '2023-03-06', NULL, '16:59:41', NULL, NULL, 'Batal', 'Tidak'),
('PO-202303060859', 1, 7, '2023-03-06', '2023-05-06', 'Ya', '2023-03-06', NULL, '17:14:59', NULL, NULL, 'Batal', 'Tidak'),
('PO-202303130538', 1, 7, '2023-03-13', '2023-04-13', 'Ya', '2023-03-13', NULL, '14:34:38', NULL, NULL, 'Batal', 'Tidak'),
('PO-202303200335', 1, 4, '2023-03-20', '2023-06-20', 'Ya', '2023-03-20', NULL, '12:27:35', NULL, NULL, 'Batal', 'Sudah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partner`
--

CREATE TABLE `partner` (
  `id_partner` int(11) NOT NULL,
  `nama_partner` varchar(100) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `partner`
--

INSERT INTO `partner` (`id_partner`, `nama_partner`, `gambar`) VALUES
(2, 'Partner 1', '01242023091744Partner 1.png'),
(3, 'Partner 2', '01242023091805Partner 2.png'),
(4, 'Partner 3', '01242023091826Partner 3.png'),
(5, 'Partner 4', '01242023091847Partner 4.png'),
(6, 'Partner 5', '01242023091909Partner 5.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklame`
--

CREATE TABLE `reklame` (
  `id_reklame` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `mulai_harga` int(11) DEFAULT NULL,
  `sampai_harga` int(11) DEFAULT NULL,
  `orientation_page` varchar(100) NOT NULL,
  `penerangan` varchar(100) NOT NULL,
  `jarak_pandang` varchar(100) NOT NULL,
  `jumlah_sisi` varchar(100) NOT NULL,
  `situasi_lalulintas` varchar(100) NOT NULL,
  `situasi_sekitar` varchar(100) NOT NULL,
  `target_audiens` varchar(100) NOT NULL,
  `google_maps` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('Sudah Dipesan','Belum Dipesan','Sudah Dibooking') NOT NULL DEFAULT 'Belum Dipesan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklame`
--

INSERT INTO `reklame` (`id_reklame`, `lokasi`, `ukuran`, `alamat`, `mulai_harga`, `sampai_harga`, `orientation_page`, `penerangan`, `jarak_pandang`, `jumlah_sisi`, `situasi_lalulintas`, `situasi_sekitar`, `target_audiens`, `google_maps`, `gambar`, `status`) VALUES
(1, 'Lokasi 1', 'Ukuran 1', 'Jalan Contoh 1 No. 01, RT 01 RW 01, Kelurahan 01, Kecamatan 01, Kab. Bandung, Jawa Barat, 60256', 5000000, 10000000, 'A4', 'Penerangan 1', 'Jarak Pandang 1', 'Jumlah Sisi 1', 'Lalu Lintas 1', 'Sekitar 1', 'Audiens 1', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '01232023102801Lokasi 1.jpg', 'Sudah Dipesan'),
(3, 'Lokasi 2', 'Ukuran 2', 'Jalan Contoh 2 No. 2, RT 2 RW 2, Kelurahan 2, Kecamatan 2, Kab. Bandung, Jawa Barat, 60256', 5000000, 10000000, 'A4', 'Penerangan 2', 'Jarak Pandang 2', 'Jumlah Sisi 2', 'Lalu Lintas 2', 'Sekitar 2', 'Audiens 2', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '01232023122849Lokasi 2.jpg', 'Sudah Dibooking'),
(4, 'Lokasi 3', 'Ukuran 3', 'Jalan Contoh 3 No. 3, RT 3 RW 3, Kelurahan 3, Kecamatan 3, Kab. Bandung, Jawa Barat, 60256', 5000000, 10000000, 'Potrait', 'Penerangan 3', 'Jarak Pandang 3', 'Jumlah Sisi 3', 'Lalu Lintas 3', 'Sekitar 3', 'Audiens 3', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '02042023131335Lokasi 3.jpg', 'Belum Dipesan'),
(5, 'Lokasi 4', 'Ukuran 4', 'Jalan Contoh 4 No. 4, RT 4 RW 4, Kelurahan 4, Kecamatan 4, Kab. Bandung, Jawa Barat, 60256', 5000000, 10000000, 'Lanscape', 'Penerangan 4', 'Jarak Pandang 4', 'Jumlah Sisi 4', 'Lalu Lintas 4', 'Sekitar 4', 'Audiens 4', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '01242023081925Lokasi 4.jpg', 'Belum Dipesan'),
(6, 'Lokasi 5', 'Ukuran 5', 'Jalan Contoh 5 No. 5, RT 5 RW 5, Kelurahan 5, Kecamatan 5, Kab. Bandung, Jawa Barat, 60256', 5000000, 10000000, 'Potrait', 'Penerangan 5', 'Jarak Pandang 5', 'Jumlah Sisi 5', 'Lalu Lintas 5', 'Sekitar 5', 'Audiens 5', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '01242023082030Lokasi 5.jpg', 'Sudah Dibooking'),
(7, 'Lokasi 6', 'Ukuran 6', 'Jalan Contoh 6 No. 6, RT 6 RW 6, Kelurahan 6, Kecamatan 6, Kab. Bandung, Jawa Barat, 60256', 5000000, 10000000, 'Potrait', 'Penerangan 6', 'Jarak Pandang 6', 'Jumlah Sisi 6', 'Lalu Lintas 6', 'Sekitar 6', 'Audiens 6', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '01242023082125Lokasi 6.jpg', 'Belum Dipesan'),
(8, 'Lokasi 7', 'Ukuran 7', 'Jalan Contoh 7 No. 7, RT 7 RW 7, Kelurahan 7, Kecamatan 7, Kab. Bandung, Jawa Barat, 60256', 5000000, 10000000, 'Potrait', 'Penerangan 7', 'Jarak Pandang 7', 'Jumlah Sisi 7', 'Lalu Lintas 7', 'Sekitar 7', 'Audiens 7', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '01242023082213Lokasi 7.jpg', 'Belum Dipesan'),
(9, 'Lokasi 8', 'Ukuran 8', 'Jalan Contoh 8 No. 8, RT 8 RW 8, Kelurahan 8, Kecamatan 8, Kab. Bandung, Jawa Barat, 60256', 5000000, 10000000, 'Potrait', 'Penerangan 8', 'Jarak Pandang 8', 'Jumlah Sisi 8', 'Lalu Lintas 8', 'Sekitar 8', 'Audiens 8', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '01242023082301Lokasi 8.jpg', 'Sudah Dibooking'),
(10, 'Lokasi 9', 'Ukuran 9', 'Jalan Contoh 9 No. 9, RT 9 RW 9, Kelurahan 9, Kecamatan 9, Kab. Bandung, Jawa Barat, 60256', 5000000, 10000000, 'Potrait', 'Penerangan 9', 'Jarak Pandang 9', 'Jumlah Sisi 9', 'Lalu Lintas 9', 'Sekitar 9', 'Audiens 9', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '01242023082347Lokasi 9.jpg', 'Sudah Dipesan'),
(11, 'Lokasi 10', 'Ukuran 10', 'Jalan Contoh 10 No. 10, RT 10 RW 10, Kelurahan 10, Kecamatan 10, Kab. Bandung, Jawa Barat, 60256', 5000000, 10000000, 'Potrait', 'Penerangan 10', 'Jarak Pandang 10', 'Jumlah Sisi 10', 'Lalu Lintas 10', 'Sekitar 10', 'Audiens 10', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '01242023082434Lokasi 10.jpg', 'Belum Dipesan'),
(12, 'Lokasi 11', 'Ukuran 11', 'Jalan Contoh 11 No. 11, RT 11 RW 11, Kelurahan 11, Kecamatan 10, Kab. Bandung, Jawa Barat, 60256', 5000000, 10000000, 'Lanscape', 'Penerangan 11', 'Jarak Pandang 11', 'Jumlah Sisi 11', 'Lalu Lintas 11', 'Sekitar 11', 'Audiens 11', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '02042023015842Lokasi 11.jpg', 'Belum Dipesan'),
(13, 'Lokasi 15', 'Ukuran 15', 'Bandung', 5000000, 10000000, 'Lanscape', 'Penerangan 15', 'Jarak Pandang 15', 'Jumlah Sisi 15', 'Lalu Lintas 15', 'Sekitar 15', 'Audiens 15', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '03122023100303Lokasi 15.jpg', 'Belum Dipesan'),
(14, 'Lokasi 16', 'Ukuran 16', 'Bandung', 10000000, 15000000, 'Lanscape', 'Penerangan 16', 'Jarak Pandang 16', 'Jumlah Sisi 16', 'Lalu Lintas 16', 'Sekitar 16', 'Audiens 16', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '03122023101100Lokasi 16.jpg', 'Belum Dipesan'),
(15, 'Lokasi 18', 'Ukuran 18', 'Subang', 5000000, 10000000, 'Lanscape', 'Penerangan 18', 'Jarak Pandang 18', 'Jumlah Sisi 18', 'Lalu Lintas 18', 'Sekitar 18', 'Audiens 18', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7383352199904!2d107.60482541427588!3d-6.921851769671816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbe0ec231%3A0x177412aac90cd065!2sAlun-Alun%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1674467889069!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '03182023080450Lokasi 18.jpg', 'Belum Dipesan');

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
  `status` enum('User') NOT NULL DEFAULT 'User',
  `tanggal_daftar` date NOT NULL DEFAULT current_timestamp(),
  `foto_user` text DEFAULT NULL,
  `foto_perusahaan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_member`, `nama`, `email`, `password`, `alamat`, `nomor_telepon`, `nama_perusahaan`, `alamat_perusahaan`, `status`, `tanggal_daftar`, `foto_user`, `foto_perusahaan`) VALUES
(1, 'Renaldi', 'renaldi@gmail.com', '$2y$10$6BJ0mhGr3yIKsdmBFbemruUFMCJJm56DkxSD0.B4sa9gvV3V6nNI2', 'Bandung', '0898867631', 'Perusahaan 1', 'Alamat Perusahaan 1', 'User', '2023-01-27', NULL, NULL),
(3, 'Renaldi 2', 'renaldi2@gmail.com', '$2y$10$M5xJPKfF7.gKz5WOkOQEs.3EaU1PUU03vLHt5OFjioT/4XxDAvP3K', 'Bandung', '08989786444', 'Perusahaan 2', 'Alamat Perusahaan 2', 'User', '2023-01-27', NULL, NULL),
(4, 'Renaldi 3', 'renaldi3@gmail.com', '$2y$10$H60vdJc3uoKIZlDMHQgtwey1pMSsdz.2zTfpj8JVzW/GIJE/GuZju', 'Bandung', '08989786444', 'Perusahaan 3', 'Alamat Perusahaan 3', 'User', '2023-01-29', NULL, NULL),
(5, 'Renaldi 5', 'renaldi5@gmail.com', '$2y$10$ik1T4nUEDe.gHo2zXSUDqeHqFq701aRrKm6lHObkaDiQFOFkEOH2q', 'Bandung', '08989786444', 'Perusahaan 5', 'Alamat Perusahaan 5', 'User', '2023-02-16', '02162023135448Perusahaan 5.jpg', '02162023135408Perusahaan 5.png'),
(7, 'Renaldi Noviandi', 'renaldinoviandi0@gmail.com', '$2y$10$IkKLIYPgHpFYxU8Kf1Gnsu/alC3Tv0EVwheu.U5aNAJXsR61Q6SUi', 'Bandung', '08989786444', 'Perusahaan 0', 'Alamat Perusahaan 0', 'User', '2023-03-02', NULL, '03022023094537Perusahaan 0.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `biodata_web`
--
ALTER TABLE `biodata_web`
  ADD PRIMARY KEY (`id_biodata_web`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indeks untuk tabel `gambar_reklame`
--
ALTER TABLE `gambar_reklame`
  ADD PRIMARY KEY (`id_gambar_reklame`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`no_invoice`);

--
-- Indeks untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_konfirmasi_pembayaran`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id_partner`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `biodata_web`
--
ALTER TABLE `biodata_web`
  MODIFY `id_biodata_web` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `gambar_reklame`
--
ALTER TABLE `gambar_reklame`
  MODIFY `id_gambar_reklame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `partner`
--
ALTER TABLE `partner`
  MODIFY `id_partner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reklame`
--
ALTER TABLE `reklame`
  MODIFY `id_reklame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
