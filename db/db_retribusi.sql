-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2021 pada 10.08
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_retribusi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_masy` int(9) UNSIGNED NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text CHARACTER SET utf8 DEFAULT NULL,
  `rt` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rw` varchar(255) CHARACTER SET utf8 NOT NULL,
  `kelurahan` varchar(255) CHARACTER SET utf8 NOT NULL,
  `kecamatan` varchar(255) CHARACTER SET utf8 NOT NULL,
  `seri` varchar(3) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_masy`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `seri`) VALUES
(1, '3321234567890123', 'Contoh Aja', 'Tegal', '2021-06-30', 'Kemana?', '2', '1', 'Ga tau', 'Ga Boleh', 'A'),
(2, '1234567890123456', 'Heni Nurohmissss', 'Coba', '2021-06-02', 'Ayuklahh', '2', '1', 'Ga tau', 'Ga', 'F'),
(10, '12311331231232131231', 'asdsad', 'saddas', '1999-12-12', 'dsa', '2', '12', 'sd', 'sd', 'E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_seri`
--

CREATE TABLE `tb_seri` (
  `id` int(11) NOT NULL,
  `seri` varchar(3) NOT NULL,
  `jenis_retribusi` text NOT NULL,
  `tagihan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_seri`
--

INSERT INTO `tb_seri` (`id`, `seri`, `jenis_retribusi`, `tagihan`) VALUES
(1, 'A', '<p>- Angkutan travel,&nbsp; Biro klas 4</p><p>- Bengkel, SPBU klas 4</p><p>- Praktek dokter, notaris klas 4</p><p>- Ps. Modern, Toko, Kios diluar pasar klas 4</p><p>- Pertunjukan di luar lapangan klas 4</p>', '25000'),
(2, 'B', '<p>- Rumah makan, Restoran klas 3</p><p>- Tempat Hiburan Bilyard klas 3</p><p>- Asuransi perbank klas 3</p><p>- Angkutan travel, Biro klas 1</p><p>- Gedung Olahraga klas 1</p><p>- Bengkel, SPBU klas 1</p><p>- Usaha praktek dokter, notaris&nbsp; klas 2</p><p>- Rumah sakit, Apotik, Laboratorium klas 3,&nbsp;</p><p>- Rumah Pondokan kursus asrama klas 1</p>', '50000'),
(3, 'C', '<p>- Industri Pabrik klas 3</p><p>- Gudang Pertemuan, GOR klas 2</p><p>- Angkutan, Travel biro&nbsp;</p><p>- Bengkel, SPBU( cuci ) mobil klas 2</p><p>- Usaha Praktek Dokter Notaris klas 2</p>', '75000'),
(6, 'D', '<p>- Rumah Makan, Restoran klas 3</p><p>- Tempat Hiburan Bilyard klas 3</p><p>- Asuransi perbank klas 3</p><p>- Angkutan travel, Biro klas 1</p><p>- Gedung olahraga klas 1</p><p>- Bengkel, SPBU klas 1</p><p>- Usaha prakter dokter, notaris klas 2</p><p>- Rumah sakit, apotik, laboratorium klas 3</p><p>- Rumah Pondokan kursus asrama klas 1</p>', '100000'),
(7, 'E', '<p>- Rumah Makan, Restoran klas 3</p><p>- Tempat Hiburan Bilyard klas 3</p><p>- Asuransi perbank klas 3</p><p>- Angkutan travel, Biro klas 1</p><p>- Gedung olahraga klas 1</p><p>- Bengkel, SPBU klas 1</p><p>- Usaha prakter dokter, notaris klas 2</p><p>- Rumah sakit, apotik, laboratorium klas 3</p><p>- Rumah Pondokan kursus asrama klas 1</p>', '150000'),
(8, 'F', '<p>- Rumah makan, Restoran klas 3</p><p>- Tempat Hiburan Bilyard klas 3</p><p>- Asuransi Perbank klas 3</p><p>- Angkutan Travel, Biro klas 1</p><p>- Gedung Olahraga klas 1</p><p>- Bengkel SPBU klas 1</p><p>- Usaha Prakter Dokter, Notaris klas 2</p><p>- Rumah sakit, Apotik, Laboratorium klas 3</p><p>- Rumah Pondokan Kursus Asrama klas 1</p>', '200000'),
(9, 'G', '<p>- Industri Pabrik klas 1</p><p>- Hotel, Wisma, Penginapan klas 3</p><p>- Asuransi, Perbankan klas 1</p><p>- Pasar Modern, Toko klas 2</p>', '300000'),
(13, 'P', '<p>asn</p>', '1200');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `email`, `photo`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Heni Nurohmi', 'hnurohmi6@gmail.com', 'WhatsApp_Image_2021-06-08_at_19_47_09.jpeg', '$2y$10$dhwsKZpJ0oBizz8VTWyKPeI5YK6a04x/iAiS4yS/WdS.dPgMVfREu', 1, 1, 1623051952),
(2, 'Andi Purwanto', 'andinp0907@gmail.com', 'jsa.jpg', '$2y$10$47P.PLiMs7.cFvxYaHyJh.xyNFZNZukRE1j9rYSrtzDzzDFe/3uYe', 2, 1, 1623227901);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(14, 1, 4),
(15, 1, 3),
(17, 2, 4),
(18, 1, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(8, 'Data');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `url` varchar(120) NOT NULL,
  `icon` varchar(120) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-fire', 1),
(2, 2, 'Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/editProfile', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fas fa-bars', 1),
(5, 3, 'Submenu Management', 'menu/subMenu', 'fas fa-fw fa-ellipsis-v', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changePassword', 'fas fa-fw fa-key', 1),
(10, 8, 'Masyarakat', 'masyarakat', 'fas fa-id-card', 1),
(11, 8, 'Seri', 'seri', 'fab fa-stripe-s', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'andinp0907@gmail.com', 'dX/Zwy4ys+4kY9erCV7JDQJqvE16tsa+I9VICY4jyZE=', 1623230059),
(4, 'andinp0907@gmail.com', 'EFJ0Le6dZRBkc+ltjgSyR4Ys36IhvY11/yeYp6I49Ww=', 1623230206);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_masy`);

--
-- Indeks untuk tabel `tb_seri`
--
ALTER TABLE `tb_seri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_masy` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_seri`
--
ALTER TABLE `tb_seri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
