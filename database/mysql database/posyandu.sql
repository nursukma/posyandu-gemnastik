-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2022 pada 21.58
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
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` char(4) NOT NULL,
  `admin_nama` varchar(45) DEFAULT NULL,
  `admin_telp` int(11) DEFAULT NULL,
  `admin_tempat_lahir` varchar(45) DEFAULT NULL,
  `admin_tanggal_lahir` varchar(45) DEFAULT NULL,
  `admin_email` varchar(45) DEFAULT NULL,
  `admin_tempat_posyandu` varchar(45) DEFAULT NULL,
  `posyandu_id` char(4) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anak`
--

CREATE TABLE `anak` (
  `id` int(11) NOT NULL,
  `no_aktaLahir` varchar(25) NOT NULL,
  `anak_lingkar_kepala` int(11) DEFAULT NULL,
  `anak_berat_lahir` int(11) DEFAULT NULL,
  `anak_tgl_lahir` date DEFAULT NULL,
  `anak_tinggi_lahir` int(11) DEFAULT NULL,
  `anak_nama` varchar(45) DEFAULT NULL,
  `visitor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `anak`
--

INSERT INTO `anak` (`id`, `no_aktaLahir`, `anak_lingkar_kepala`, `anak_berat_lahir`, `anak_tgl_lahir`, `anak_tinggi_lahir`, `anak_nama`, `visitor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '08sdada', 12, 23, '2022-10-01', 40, 'nur sukma', 1, '2022-10-22 09:22:38', '2022-10-22 09:51:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `anak_posyandu`
--

CREATE TABLE `anak_posyandu` (
  `id` int(11) NOT NULL,
  `berat_kini` float DEFAULT NULL,
  `lingkar_kepala_kini` int(11) DEFAULT NULL,
  `tgl_posyandu` date DEFAULT NULL,
  `riwayat_vitamin` varchar(45) DEFAULT NULL,
  `riwayat_imunisasi` varchar(45) DEFAULT NULL,
  `tinggi_kini` int(11) DEFAULT NULL,
  `anak_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `anak_posyandu`
--

INSERT INTO `anak_posyandu` (`id`, `berat_kini`, `lingkar_kepala_kini`, `tgl_posyandu`, `riwayat_vitamin`, `riwayat_imunisasi`, `tinggi_kini`, `anak_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2022-10-22', 'a', 'a', 1, 1, '2022-10-22 10:50:03', '2022-10-22 10:50:03', NULL),
(2, 2, 2, '2022-10-22', 'q', 'q', 2, 1, '2022-10-22 11:18:37', '2022-10-22 11:35:43', '2022-10-22 18:35:43'),
(3, 3, 3, '2022-10-22', 'f', 'd', 3, 1, '2022-10-22 11:21:55', '2022-10-22 11:35:41', '2022-10-22 18:35:41'),
(4, 5, 5, '2022-10-22', 'f', 'f', 5, 1, '2022-10-22 11:22:56', '2022-10-22 11:35:39', '2022-10-22 18:35:39'),
(5, 622, 621, '2022-10-22', 'ssss', 'sss', 62222, 1, '2022-10-22 11:23:24', '2022-10-22 11:35:36', '2022-10-22 18:35:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posyandu`
--

CREATE TABLE `posyandu` (
  `posyandu_id` char(4) NOT NULL,
  `posyandu_nama` varchar(45) DEFAULT NULL,
  `posyandu_kelurahan` varchar(45) DEFAULT NULL,
  `posyandu_kecamatan` varchar(45) DEFAULT NULL,
  `jumlah_pengurus` int(11) DEFAULT NULL,
  `penanggung_jawab` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(5) NOT NULL,
  `deskripsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama`, `deskripsi`) VALUES
(1, 'SADM', 'Super Admin'),
(2, 'ADM', 'Admin'),
(3, 'VST', 'Visitor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi`
--

CREATE TABLE `sesi` (
  `user_id` int(11) NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `jam` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_nama` varchar(45) DEFAULT NULL,
  `user_telp` varchar(13) DEFAULT NULL,
  `user_keterangan` varchar(45) DEFAULT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `user_nama`, `user_telp`, `user_keterangan`, `user_email`, `password`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'nia', '0812', 'Visitor', 'n@gmail.com', '$2y$10$HAatXi4WT/mqUy/kT391lu/7cSiNSOYgEJDuwNQpccuGWgtq7nBJ2', 3, NULL, NULL, NULL),
(5, 'ayu', '112', 'Visitor', 'a@gmail.com', '$2y$10$jU8k0DK576DQUV9POgPTWeiP4DHUVAWkEBSu85WZ9lXMQ7EFcEqay', 3, '2022-10-22 12:32:52', '2022-10-22 12:32:59', '2022-10-22 19:32:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `visitor_nama` varchar(45) DEFAULT NULL,
  `visitor_alamat` varchar(50) NOT NULL,
  `visitor_telp` varchar(13) NOT NULL,
  `visitor_email` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`id`, `visitor_nama`, `visitor_alamat`, `visitor_telp`, `visitor_email`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nia Restiana Sari', 'Nganjuk', '0812', 'n@gmail.com', 1, '2022-10-22 16:21:33', '2022-10-22 16:21:33', NULL),
(3, 'Ayu Maharani', 'JL. Malang', '1124', 'a@gmail.com', 5, '2022-10-22 12:32:52', '2022-10-22 12:32:59', '2022-10-22 19:32:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`,`posyandu_id`),
  ADD KEY `fk_Admin_Posyandu_idx` (`posyandu_id`),
  ADD KEY `fk_admin_user` (`user_id`);

--
-- Indeks untuk tabel `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anak_visitor` (`visitor_id`);

--
-- Indeks untuk tabel `anak_posyandu`
--
ALTER TABLE `anak_posyandu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posyandu_anak` (`anak_id`);

--
-- Indeks untuk tabel `posyandu`
--
ALTER TABLE `posyandu`
  ADD PRIMARY KEY (`posyandu_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- Indeks untuk tabel `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anak`
--
ALTER TABLE `anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `anak_posyandu`
--
ALTER TABLE `anak_posyandu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_Admin_Posyandu` FOREIGN KEY (`posyandu_id`) REFERENCES `posyandu` (`posyandu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_admin_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `anak`
--
ALTER TABLE `anak`
  ADD CONSTRAINT `fk_anak_visitor` FOREIGN KEY (`visitor_id`) REFERENCES `visitor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `anak_posyandu`
--
ALTER TABLE `anak_posyandu`
  ADD CONSTRAINT `fk_posyandu_anak` FOREIGN KEY (`anak_id`) REFERENCES `anak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
