-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2020 pada 20.57
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id_jenis_sampah` int(11) NOT NULL,
  `berat` int(4) NOT NULL,
  `total_list` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `kode_transaksi` varchar(10) NOT NULL,
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
  MODIFY `id_list_transaksi` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

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
