-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2020 pada 00.46
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banksampah_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sampah`
--

CREATE TABLE `jenis_sampah` (
  `id_jenis_sampah` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_sampah`
--

INSERT INTO `jenis_sampah` (`id_jenis_sampah`, `nama_jenis`, `harga`) VALUES
(1, 'plastik', 1000),
(2, 'kertas', 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'CODEX@123', 0, 0, 0, NULL, '2018-10-11 13:34:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_transaksi`
--

CREATE TABLE `list_transaksi` (
  `id_list_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `total_list` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `list_transaksi`
--

INSERT INTO `list_transaksi` (`id_list_transaksi`, `kode_transaksi`, `total_list`) VALUES
(1, '5fc22a147b413', 2000),
(2, '5fc22a147b413', 12000),
(3, '5fc243182cb8b', 9000),
(4, '5fc243182cb8b', 4000),
(5, '5fc243b3d507b', 9000),
(6, '5fc243b3d507b', 6000),
(7, '5fc2716820b8d', 0),
(8, '5fc2719ac11a6', 0),
(9, '5fc2719ac11a6', 0),
(10, '5fc2731b8cbc5', 0),
(11, '5fc2731b8cbc5', 0),
(13, '5fc2716820b8d', 0),
(14, '5fc64e57e9df4', 0),
(15, '5fc652c44cee4', 0),
(16, '5fc658b9184a9', 0),
(17, '5fc661baa866e', 0),
(18, '5fc66220f2d30', 0),
(19, '5fc66220f2d30', 0),
(20, '5fc66248edfeb', 0),
(21, '5fc667b58640f', 0),
(22, '5fc667e704170', 0),
(23, '5fc6682b178d9', 0),
(24, '5fc6689c2b78e', 0),
(25, '5fc669a4a9323', 0),
(26, '5fc669bf8a8c8', 0),
(27, '5fc66a0ae3bb0', 0),
(28, '5fc66bbf28792', 0),
(29, '5fc66bbf28792', 0),
(30, '5fc66bd6ea6b5', 0),
(31, '5fc66bd6ea6b5', 0),
(32, '5fc66cc49a7ec', 0),
(33, '5fc66cc49a7ec', 0),
(34, '5fc66d260fd98', 0),
(35, '5fc66d39bfe2a', 0),
(36, '5fc66d4e54993', 0),
(37, '5fc66d6ceabab', 0),
(38, '5fc66fbe6a18a', 0),
(39, '5fc67001e8269', 0),
(40, '5fc67001e8269', 0),
(41, '5fc67001e8269', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `nama_nasabah` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `id_wilayah` int(3) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `password` varchar(255) NOT NULL,
  `total_tabungan` int(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `data_delete` enum('N','Y') NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `nama_nasabah`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `id_wilayah`, `no_hp`, `password`, `total_tabungan`, `create_at`, `update_at`, `data_delete`, `status`) VALUES
(1, 'iluth', 'rt02/rw04, dusun sidomulyo', '2020-10-04', 'Purworejo', 9, '087785555977', '416ca07f688fc6cf77efae6a071af9b2', 20000, '2020-10-22 20:21:16', NULL, 'N', 0),
(2, 'taqwim', 'rt02/rw05, dusun sidoasri', '2018-01-01', 'Purworejo', 11, '08712345678', '416ca07f688fc6cf77efae6a071af9b2', 100000, '2020-10-23 06:49:53', '2020-10-23 07:13:26', 'N', 0),
(3, 'zulfakar', 'rt01/rw01, Sido Truko bedono Kluwung', '1997-06-24', 'Aikmel', 1, '0812341234123', '81dc9bdb52d04dc20036dbd8313ed055', 50000, '2020-10-23 07:34:54', NULL, 'N', 0),
(4, 'Riza', 'rt01/rw05, Sido asri bedono Kluwung', '1991-06-20', 'Banjarnega', 10, '08132443555422', '81dc9bdb52d04dc20036dbd8313ed055', 5000, '2020-10-23 07:36:39', NULL, 'N', 0),
(6, 'asdar', 'rt02/rw05, dusun sidoasri', '2020-10-14', 'Purworejo', 11, '08198769876', '81dc9bdb52d04dc20036dbd8313ed055', 25000, '2020-10-23 07:44:24', '2020-10-23 10:36:37', 'N', 0),
(7, 'Alfina', 'rt01/rw02, Sido Koyo bedono Kluwung', '2020-09-30', 'Purworejo', 4, '0823343546565', '81dc9bdb52d04dc20036dbd8313ed055', 12000, '2020-10-23 10:33:57', NULL, 'N', 0),
(8, 'Fulan', 'rt02/rw03, dusun sidoluhur', '2017-06-15', 'Purworejo', 7, '08753674554324', '81dc9bdb52d04dc20036dbd8313ed055', 2000, '2020-10-23 10:34:49', NULL, 'N', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `alamat`, `no_hp`, `gender`, `tanggal_lahir`, `jabatan`, `create_at`) VALUES
(1, 'Anwar', 'Kluwung', '0878786', 'L', '2020-10-04', 'Sekretaris 1', '2020-11-10 09:10:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_jenis_sampah` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `berat_sampah` int(4) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `data_delete` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_nasabah`, `id_petugas`, `id_jenis_sampah`, `tanggal_transaksi`, `berat_sampah`, `total_harga`, `create_at`, `update_at`, `data_delete`) VALUES
(1, '5fc206f164f6d', 1, 1, 1, '0000-00-00', 2, 5000, '2020-11-28 10:00:27', NULL, 'N'),
(2, '5fc22a147b413', 6, 1, 1, '0000-00-00', 2, 1000, '2020-11-28 10:44:41', NULL, 'N'),
(3, '5fc22a147b413', 6, 1, 2, '0000-00-00', 4, 3000, '2020-11-28 10:45:21', NULL, 'N'),
(4, '5fc243182cb8b', 6, 1, 2, '0000-00-00', 3, 3000, '2020-11-28 12:31:26', NULL, 'N'),
(5, '5fc243182cb8b', 6, 1, 1, '0000-00-00', 4, 1000, '2020-11-28 12:31:36', NULL, 'N'),
(6, '5fc243b3d507b', 2, 1, 2, '0000-00-00', 3, 3000, '2020-11-28 12:34:07', NULL, 'N'),
(7, '5fc243b3d507b', 2, 1, 2, '0000-00-00', 2, 3000, '2020-11-28 12:34:17', NULL, 'N'),
(8, '5fc243b3d507b', 8, 1, 1, '0000-00-00', 6, 1000, '2020-11-28 14:50:12', NULL, 'N'),
(9, '5fc243b3d507b', 8, 1, 1, '0000-00-00', 8, 1000, '2020-11-28 14:53:07', NULL, 'N'),
(10, '5fc2648101f59', 4, 1, 1, '0000-00-00', 4, 1000, '2020-11-28 14:54:00', NULL, 'N'),
(11, '5fc2648101f59', 4, 1, 1, '0000-00-00', 5, 1000, '2020-11-28 14:54:06', NULL, 'N'),
(12, '5fc2648101f59', 4, 1, 2, '0000-00-00', 6, 3000, '2020-11-28 14:54:16', NULL, 'N'),
(13, '5fc265c0db00b', 4, 1, 2, '0000-00-00', 4, 3000, '2020-11-28 14:59:19', NULL, 'N'),
(14, '5fc265c0db00b', 4, 1, 2, '0000-00-00', 3, 3000, '2020-11-28 14:59:25', NULL, 'N'),
(15, '5fc265c0db00b', 4, 1, 1, '0000-00-00', 6, 1000, '2020-11-28 14:59:36', NULL, 'N'),
(16, '5fc26bf0ee023', 3, 1, 2, '0000-00-00', 3, 3000, '2020-11-28 15:26:09', NULL, 'N'),
(17, '5fc26c6138f8f', 7, 1, 2, '0000-00-00', 4, 3000, '2020-11-28 15:27:36', NULL, 'N'),
(18, '5fc26caebc597', 6, 1, 1, '0000-00-00', 3, 1000, '2020-11-28 15:28:51', NULL, 'N'),
(19, '5fc26ce6ade1f', 4, 1, 1, '0000-00-00', 3, 1000, '2020-11-28 15:29:46', NULL, 'N'),
(20, '5fc26ce6ade1f', 4, 1, 2, '0000-00-00', 7, 3000, '2020-11-28 15:29:56', NULL, 'N'),
(21, '5fc26d139815f', 7, 1, 1, '0000-00-00', 3, 1000, '2020-11-28 15:30:32', NULL, 'N'),
(22, '5fc26d3c14d8b', 4, 1, 2, '0000-00-00', 5, 3000, '2020-11-28 15:31:13', NULL, 'N'),
(23, '5fc26d59eeee0', 6, 1, 1, '0000-00-00', 5, 1000, '2020-11-28 15:31:42', NULL, 'N'),
(24, '5fc26d59eeee0', 6, 1, 1, '0000-00-00', 7, 1000, '2020-11-28 15:31:47', NULL, 'N'),
(25, '5fc26d59eeee0', 6, 1, 2, '0000-00-00', 7, 3000, '2020-11-28 15:31:57', NULL, 'N'),
(26, '5fc2716820b8d', 4, 1, 1, '0000-00-00', 3, 1000, '2020-11-28 15:49:01', NULL, 'N'),
(27, '5fc2719ac11a6', 4, 1, 1, '0000-00-00', 4, 1000, '2020-11-28 15:49:52', NULL, 'N'),
(28, '5fc2719ac11a6', 4, 1, 2, '0000-00-00', 5, 3000, '2020-11-28 15:51:20', NULL, 'N'),
(29, '5fc2731b8cbc5', 7, 1, 2, '0000-00-00', 45, 3000, '2020-11-28 15:56:16', NULL, 'N'),
(30, '5fc2731b8cbc5', 7, 1, 2, '0000-00-00', 4, 3000, '2020-11-28 15:56:41', NULL, 'N'),
(31, '5fc64e57e9df4', 3, 1, 1, '0000-00-00', 5, 1000, '2020-12-01 14:08:31', NULL, 'N'),
(32, '5fc650e1441e5', 3, 1, 1, '0000-00-00', 4, 1000, '2020-12-01 14:19:19', NULL, 'N'),
(33, '5fc650e1441e5', 3, 1, 2, '0000-00-00', 4, 3000, '2020-12-01 14:19:38', NULL, 'N'),
(34, '5fc65157421e9', 6, 1, 2, '0000-00-00', 4, 3000, '2020-12-01 14:21:16', NULL, 'N'),
(35, '5fc6519574954', 4, 1, 2, '0000-00-00', 4, 3000, '2020-12-01 14:22:18', NULL, 'N'),
(36, '5fc651c8a61da', 6, 1, 1, '0000-00-00', 0, 1000, '2020-12-01 14:23:08', NULL, 'N'),
(37, '5fc651e65c8da', 6, 1, 1, '0000-00-00', 0, 1000, '2020-12-01 14:23:37', NULL, 'N'),
(38, '5fc65222c6b95', 4, 1, 2, '0000-00-00', 0, 3000, '2020-12-01 14:24:38', NULL, 'N'),
(39, '5fc652531cd6e', 4, 1, 1, '0000-00-00', 1, 1000, '2020-12-01 14:25:28', NULL, 'N'),
(40, '5fc652706c11a', 7, 1, 1, '0000-00-00', 0, 1000, '2020-12-01 14:25:56', NULL, 'N'),
(41, '5fc652c44cee4', 4, 1, 2, '0000-00-00', 2, 3000, '2020-12-01 14:27:21', NULL, 'N'),
(42, '5fc658b9184a9', 6, 1, 1, '0000-00-00', 2, 1000, '2020-12-01 14:52:46', NULL, 'N'),
(43, '5fc661baa866e', 7, 1, 1, '0000-00-00', 1, 1000, '2020-12-01 15:31:11', NULL, 'N'),
(44, '5fc66220f2d30', 2, 1, 2, '0000-00-00', 4, 12000, '2020-12-01 15:32:54', NULL, 'N'),
(45, '5fc66220f2d30', 2, 1, 2, '0000-00-00', 6, 18000, '2020-12-01 15:33:25', NULL, 'N'),
(46, '5fc66248edfeb', 1, 1, 1, '0000-00-00', 7, 7000, '2020-12-01 15:33:34', NULL, 'N'),
(47, '5fc667b58640f', 7, 1, 2, '0000-00-00', 4, 12000, '2020-12-01 15:56:42', NULL, 'N'),
(48, '5fc667e704170', 8, 1, 2, '0000-00-00', 5, 15000, '2020-12-01 15:57:32', NULL, 'N'),
(49, '5fc6682b178d9', 8, 1, 2, '0000-00-00', 7, 21000, '2020-12-01 15:58:39', NULL, 'N'),
(50, '5fc6689c2b78e', 1, 1, 2, '0000-00-00', 6, 18000, '2020-12-01 16:00:33', NULL, 'N'),
(51, '5fc669a4a9323', 4, 1, 2, '0000-00-00', 6, 18000, '2020-12-01 16:04:57', NULL, 'N'),
(52, '5fc669bf8a8c8', 6, 1, 2, '0000-00-00', 6, 18000, '2020-12-01 16:05:24', NULL, 'N'),
(53, '5fc66a0ae3bb0', 7, 1, 1, '0000-00-00', 6, 6000, '2020-12-01 16:06:40', NULL, 'N'),
(54, '5fc66bbf28792', 8, 1, 1, '0000-00-00', 4, 4000, '2020-12-01 16:13:56', NULL, 'N'),
(55, '5fc66bd6ea6b5', 8, 1, 1, '0000-00-00', 4, 4000, '2020-12-01 16:14:19', NULL, 'N'),
(56, '5fc66bd6ea6b5', 8, 1, 2, '0000-00-00', 8, 24000, '2020-12-01 16:16:06', NULL, 'N'),
(58, '5fc66cc49a7ec', 4, 1, 2, '0000-00-00', 8, 24000, '2020-12-01 16:18:47', NULL, 'N'),
(59, '5fc66d260fd98', 6, 1, 2, '0000-00-00', 7, 21000, '2020-12-01 16:19:55', NULL, 'N'),
(60, '5fc66d39bfe2a', 6, 1, 1, '0000-00-00', 7, 7000, '2020-12-01 16:20:16', NULL, 'N'),
(61, '5fc66d4e54993', 3, 1, 2, '0000-00-00', 7, 21000, '2020-12-01 16:20:36', NULL, 'N'),
(62, '5fc66d6ceabab', 8, 1, 1, '0000-00-00', 0, 0, '2020-12-01 16:21:04', NULL, 'N'),
(63, '5fc66d6ceabab', 8, 1, 1, '0000-00-00', 6, 6000, '2020-12-01 16:21:09', NULL, 'N'),
(69, '5fc66fbe6a18a', 6, 1, 1, '0000-00-00', 5, 5000, '2020-12-01 16:31:22', NULL, 'N'),
(70, '5fc66fbe6a18a', 6, 1, 0, '0000-00-00', 0, 0, '2020-12-01 16:31:27', NULL, 'N'),
(71, '5fc66fbe6a18a', 6, 1, 0, '0000-00-00', 0, 0, '2020-12-01 16:31:30', NULL, 'N'),
(73, '5fc67001e8269', 4, 1, 2, '0000-00-00', 5, 15000, '2020-12-01 16:32:12', NULL, 'N'),
(74, '5fc67001e8269', 4, 1, 0, '0000-00-00', 0, 0, '2020-12-01 16:32:14', NULL, 'N'),
(75, '5fc67001e8269', 4, 1, 0, '0000-00-00', 0, 0, '2020-12-01 16:32:22', NULL, 'N'),
(76, '5fc67001e8269', 4, 1, 2, '0000-00-00', 5, 15000, '2020-12-01 16:32:31', NULL, 'N'),
(77, '5fc67001e8269', 4, 1, 1, '0000-00-00', 1, 1000, '2020-12-01 16:32:36', NULL, 'N'),
(78, '5fc67001e8269', 4, 1, 0, '0000-00-00', 0, 0, '2020-12-01 16:32:43', NULL, 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(2) NOT NULL,
  `nama_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_nasabah`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_nasabah` (
`id_nasabah` int(11)
,`nama_nasabah` varchar(30)
,`alamat` varchar(50)
,`tanggal_lahir` date
,`tempat_lahir` varchar(10)
,`id_wilayah` int(3)
,`no_hp` varchar(14)
,`password` varchar(255)
,`total_tabungan` int(10)
,`create_at` timestamp
,`update_at` timestamp
,`data_delete` enum('N','Y')
,`nama_wilayah` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_transaksi` (
`id_transaksi` int(11)
,`kode_transaksi` varchar(20)
,`berat_sampah` int(4)
,`tanggal_transaksi` date
,`total_harga` int(10)
,`jenis_sampah` varchar(20)
,`harga` int(10)
,`nama_nasabah` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(20) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`, `rt`, `rw`) VALUES
(1, 'Sidotrukan', '01', '01'),
(2, 'Sidotrukan', '02', '01'),
(3, 'Sidotrukan', '03', '01'),
(4, 'Sidokoyo', '01', '02'),
(5, 'Sidokoyo', '02', '02'),
(6, 'Sidoluhur', '01', '03'),
(7, 'Sidoluhur', '02', '03'),
(8, 'Sidomulyo', '01', '04'),
(9, 'Sidomulyo', '02', '04'),
(10, 'Sidoasri', '01', '05'),
(11, 'Sidoasri', '02', '05');

-- --------------------------------------------------------

--
-- Struktur untuk view `view_nasabah`
--
DROP TABLE IF EXISTS `view_nasabah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nasabah`  AS  select `nasabah`.`id_nasabah` AS `id_nasabah`,`nasabah`.`nama_nasabah` AS `nama_nasabah`,`nasabah`.`alamat` AS `alamat`,`nasabah`.`tanggal_lahir` AS `tanggal_lahir`,`nasabah`.`tempat_lahir` AS `tempat_lahir`,`nasabah`.`id_wilayah` AS `id_wilayah`,`nasabah`.`no_hp` AS `no_hp`,`nasabah`.`password` AS `password`,`nasabah`.`total_tabungan` AS `total_tabungan`,`nasabah`.`create_at` AS `create_at`,`nasabah`.`update_at` AS `update_at`,`nasabah`.`data_delete` AS `data_delete`,`wilayah`.`nama_wilayah` AS `nama_wilayah` from (`nasabah` join `wilayah` on(`nasabah`.`id_wilayah` = `wilayah`.`id_wilayah`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root```@```localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS  select `transaksi`.`id_transaksi` AS `id_transaksi`,`transaksi`.`kode_transaksi` AS `kode_transaksi`,`transaksi`.`berat_sampah` AS `berat_sampah`,`transaksi`.`tanggal_transaksi` AS `tanggal_transaksi`,`transaksi`.`total_harga` AS `total_harga`,`jenis_sampah`.`nama_jenis` AS `jenis_sampah`,`jenis_sampah`.`harga` AS `harga`,`nasabah`.`nama_nasabah` AS `nama_nasabah` from ((`transaksi` join `jenis_sampah` on(`jenis_sampah`.`id_jenis_sampah` = `transaksi`.`id_jenis_sampah`)) join `nasabah` on(`nasabah`.`id_nasabah` = `transaksi`.`id_nasabah`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  ADD PRIMARY KEY (`id_jenis_sampah`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_transaksi`
--
ALTER TABLE `list_transaksi`
  ADD PRIMARY KEY (`id_list_transaksi`);

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`),
  ADD KEY `wilayah` (`id_wilayah`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nasabah` (`id_nasabah`),
  ADD KEY `petugas` (`id_petugas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  MODIFY `id_jenis_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `list_transaksi`
--
ALTER TABLE `list_transaksi`
  MODIFY `id_list_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD CONSTRAINT `wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `nasabah` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`),
  ADD CONSTRAINT `petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
