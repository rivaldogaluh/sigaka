-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2020 pada 15.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sigaka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_absen`
--

CREATE TABLE `sigaka_absen` (
  `absen_id` varchar(20) NOT NULL,
  `absen_karyawan_id` varchar(20) NOT NULL,
  `absen_hari` varchar(10) NOT NULL,
  `absen_status` enum('lembur','normal') NOT NULL DEFAULT 'normal',
  `absen_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_absen`
--

INSERT INTO `sigaka_absen` (`absen_id`, `absen_karyawan_id`, `absen_hari`, `absen_status`, `absen_date_created`) VALUES
('ABS-34698', 'PEG-80730', 'Sabtu', 'normal', '2020-07-11 09:31:38'),
('ABS-34707', 'PEG-68241', 'Sabtu', 'normal', '2020-07-11 09:31:47'),
('ABS-34740', 'PEG-54697', 'Sabtu', 'lembur', '2020-07-11 09:32:20'),
('ABS-45434', 'PEG-76226', 'Sabtu', 'lembur', '2019-08-03 22:17:14'),
('ABS-54735', 'PEG-54697', 'Sabtu', 'normal', '2020-06-13 20:25:35'),
('ABS-69249', 'PEG-68241', 'Senin', 'lembur', '2020-06-29 01:34:09'),
('ABS-69264', 'PEG-54697', 'Senin', 'lembur', '2020-06-29 01:34:24'),
('ABS-74757', 'PEG-74722', 'Senin', 'lembur', '2019-07-15 14:12:37'),
('ABS-76293', 'PEG-76226', 'Senin', 'lembur', '2019-07-15 14:38:13'),
('ABS-80773', 'PEG-80730', 'Senin', 'normal', '2020-06-29 04:46:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_gaji`
--

CREATE TABLE `sigaka_gaji` (
  `gaji_id` varchar(20) NOT NULL,
  `gaji_karyawan_id` varchar(20) NOT NULL,
  `gaji_lembur` int(20) DEFAULT 0,
  `gaji_total` int(20) NOT NULL,
  `gaji_bayar_pinjaman` int(20) NOT NULL,
  `gaji_tanggal` date DEFAULT NULL,
  `gaji_bulan_ke` int(11) DEFAULT NULL,
  `gaji_status` enum('sudah','belum') NOT NULL DEFAULT 'belum',
  `gaji_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_gaji`
--

INSERT INTO `sigaka_gaji` (`gaji_id`, `gaji_karyawan_id`, `gaji_lembur`, `gaji_total`, `gaji_bayar_pinjaman`, `gaji_tanggal`, `gaji_bulan_ke`, `gaji_status`, `gaji_date_created`) VALUES
('GJI-54735', 'PEG-54697', 5035000, 5070000, 0, '2020-07-11', 1, 'sudah', '2020-06-13 20:25:35'),
('GJI-69249', 'PEG-68241', 5000000, 10000000, 0, '2020-07-11', 1, 'sudah', '2020-06-29 01:34:09'),
('GJI-74757', 'PEG-74722', 35000, 35000, 0, '2019-07-15', 1, 'sudah', '2019-07-15 14:12:37'),
('GJI-76293', 'PEG-76226', 70000, 70000, 30000, '2019-08-03', 1, 'sudah', '2019-07-15 14:38:13'),
('GJI-80773', 'PEG-80730', 0, 10000000, 0, '2020-07-11', 1, 'belum', '2020-06-29 04:46:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_hak_akses`
--

CREATE TABLE `sigaka_hak_akses` (
  `hak_akses_id` int(10) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sigaka_hak_akses`
--

INSERT INTO `sigaka_hak_akses` (`hak_akses_id`, `hak_akses`) VALUES
(1, 'admin'),
(2, 'manajer'),
(3, 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_jabatan`
--

CREATE TABLE `sigaka_jabatan` (
  `jabatan_id` varchar(20) NOT NULL,
  `jabatan_nama` varchar(255) DEFAULT NULL,
  `jabatan_gaji` int(20) DEFAULT NULL,
  `jabatan_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_jabatan`
--

INSERT INTO `sigaka_jabatan` (`jabatan_id`, `jabatan_nama`, `jabatan_gaji`, `jabatan_date_created`) VALUES
('JAB-68176', 'Programmer', 5000000, '2020-06-29 01:16:16'),
('JAB-74569', 'Web Designer', 7000000, '2019-07-15 14:09:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_karyawan`
--

CREATE TABLE `sigaka_karyawan` (
  `karyawan_id` varchar(20) NOT NULL,
  `karyawan_jabatan_id` varchar(20) DEFAULT NULL,
  `karyawan_nama` varchar(255) DEFAULT NULL,
  `karyawan_tempat_lahir` varchar(255) DEFAULT NULL,
  `karyawan_tanggal_lahir` date DEFAULT NULL,
  `karyawan_alamat` text DEFAULT NULL,
  `karyawan_tanggal_gabung` date DEFAULT NULL,
  `karyawan_nomor_hp` varchar(20) DEFAULT NULL,
  `karyawan_no_rekening` varchar(30) DEFAULT NULL,
  `karyawan_date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_karyawan`
--

INSERT INTO `sigaka_karyawan` (`karyawan_id`, `karyawan_jabatan_id`, `karyawan_nama`, `karyawan_tempat_lahir`, `karyawan_tanggal_lahir`, `karyawan_alamat`, `karyawan_tanggal_gabung`, `karyawan_nomor_hp`, `karyawan_no_rekening`, `karyawan_date_created`) VALUES
('PEG-54697', 'JAB-68176', 'Rivaldo', 'Tangerang', '1999-04-15', 'Buaran pondok benda pamulang', '2020-06-13', '085710158090', '', '2020-06-13 20:24:57'),
('PEG-68241', 'JAB-68176', 'Farizi Bagus Prasetyo', 'Bogor', '1998-06-10', 'Bukit Dago', '2020-06-29', '088212061835', '', '2020-06-29 01:17:21'),
('PEG-80730', 'JAB-68176', 'Faizal Alfarizi', 'bogor', '1997-06-29', 'pd benda', '2020-06-29', '088323456781', '', '2020-06-29 04:45:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_pengguna`
--

CREATE TABLE `sigaka_pengguna` (
  `pengguna_id` int(20) NOT NULL,
  `pengguna_username` varchar(255) DEFAULT NULL,
  `pengguna_password` varchar(255) DEFAULT NULL,
  `pengguna_nama` varchar(255) DEFAULT NULL,
  `pengguna_foto` text DEFAULT NULL,
  `hak_akses_id` int(10) NOT NULL,
  `pengguna_date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_pengguna`
--

INSERT INTO `sigaka_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_nama`, `pengguna_foto`, `hak_akses_id`, `pengguna_date_created`) VALUES
(9, 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 'Galuh Prihandono', 'default.jpg', 1, '2020-07-12 04:25:56'),
(10, 'manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'Abdul Mustaqim', 'default.png', 2, '2020-07-12 00:35:05'),
(11, 'farizi', 'd41d8cd98f00b204e9800998ecf8427e', 'Farizi Bagus', 'default.png', 3, '2020-07-12 00:35:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_pinjam`
--

CREATE TABLE `sigaka_pinjam` (
  `pinjam_id` varchar(20) NOT NULL,
  `pinjam_karyawan_id` varchar(20) NOT NULL,
  `pinjam_jumlah` int(20) NOT NULL,
  `pinjam_bayar` int(20) NOT NULL DEFAULT 0,
  `pinjam_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_pinjam`
--

INSERT INTO `sigaka_pinjam` (`pinjam_id`, `pinjam_karyawan_id`, `pinjam_jumlah`, `pinjam_bayar`, `pinjam_date_created`) VALUES
('PJM-44503', 'PEG-76226', 30000, 30000, '2019-08-03 22:01:43'),
('PJM-74863', 'PEG-74722', 50000, 50000, '2019-07-15 14:14:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `sigaka_absen`
--
ALTER TABLE `sigaka_absen`
  ADD PRIMARY KEY (`absen_id`);

--
-- Indeks untuk tabel `sigaka_gaji`
--
ALTER TABLE `sigaka_gaji`
  ADD PRIMARY KEY (`gaji_id`);

--
-- Indeks untuk tabel `sigaka_hak_akses`
--
ALTER TABLE `sigaka_hak_akses`
  ADD PRIMARY KEY (`hak_akses_id`);

--
-- Indeks untuk tabel `sigaka_jabatan`
--
ALTER TABLE `sigaka_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indeks untuk tabel `sigaka_karyawan`
--
ALTER TABLE `sigaka_karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indeks untuk tabel `sigaka_pengguna`
--
ALTER TABLE `sigaka_pengguna`
  ADD PRIMARY KEY (`pengguna_id`),
  ADD KEY `hak_akses_id` (`hak_akses_id`);

--
-- Indeks untuk tabel `sigaka_pinjam`
--
ALTER TABLE `sigaka_pinjam`
  ADD PRIMARY KEY (`pinjam_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sigaka_hak_akses`
--
ALTER TABLE `sigaka_hak_akses`
  MODIFY `hak_akses_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sigaka_pengguna`
--
ALTER TABLE `sigaka_pengguna`
  MODIFY `pengguna_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sigaka_pengguna`
--
ALTER TABLE `sigaka_pengguna`
  ADD CONSTRAINT `sigaka_pengguna_ibfk_1` FOREIGN KEY (`hak_akses_id`) REFERENCES `sigaka_hak_akses` (`hak_akses_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
