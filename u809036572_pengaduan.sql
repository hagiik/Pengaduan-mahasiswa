-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 10 Okt 2024 pada 03.22
-- Versi server: 10.11.9-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u809036572_pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` bigint(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `prodi` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `foto_profile` varchar(225) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`, `username`, `password`, `telp`, `foto_profile`, `email`) VALUES
(10203040, 'Wawan', 'Sistem Informasi', 'Agus200880', '$2y$10$HIXKEPeV5W18KOdP.edc8uRC7/QxXr4KDvIaWIwe2VTkpAo.XB/cu', '081222244980', 'user.png', 'Agus.setyawan@hotmail.com'),
(11119037, 'Mohammad hagi ihsan kelana', 'Sistem Informasi', 'hagiik33', '$2y$10$TFAaS4bqzYqPym4uCSuNO.tDRPfrJsoSiYAAU6hnTP64BATmaMrWS', '085156566436', 'user.png', 'Hagiihsank@gmail.com'),
(12121212, 'Agus Setyawan', 'Sistem Informasi', 'Wawan200880', '$2y$10$sXVABunHZzcUq9stgGaInOFIqMRw0ps8e8D7IoDbTkL68NQkrLoUy', '081222244980', 'user.png', 'Agus.setyawan@hotmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` bigint(16) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nim` bigint(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `alasan` varchar(250) NOT NULL,
  `jenis_laporan` varchar(250) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('masuk','proses','proses lagi','selesai','diterima','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nim`, `isi_laporan`, `alasan`, `jenis_laporan`, `foto`, `status`) VALUES
(92, '2024-07-24', 11119037, 'Kerusakan pada infocus di ruangan 3', 'Infocus rusak', 'Sarana', '9f06df2e838ea02a6318c06a473135a8.jpeg', 'selesai'),
(93, '2024-07-24', 12121212, 'AC ruangan 03.006 panas dan banjir', 'AC panas', 'Sarana', 'c3ed3c91de5645017b0462976311fd5d.jpg', 'diterima'),
(94, '2024-07-24', 11119037, 'Komputer pada ruangan UCC mengalami kerusakan', 'Komputer rusak', 'Sarana', '81feee37af6080e234b420b1ffe74eab.jpg', 'selesai'),
(95, '2024-07-24', 10203040, 'Projector ruangan 3.006 buram', 'Projecktor buram', 'Sarana', '33a8c6da02942ebf2f5c71605c5ca085.jpg', 'selesai'),
(96, '2024-07-24', 10203040, 'Pelayanan akademik di FTI tidak ada orang', 'Pelayanan Akademik', 'Akademik', 'ba7ca43062c2ff1313f07589393b0612.jpg', 'tolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `role_id` int(11) NOT NULL,
  `foto_profile` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `username`, `password`, `telp`, `role_id`, `foto_profile`) VALUES
(2, 'Admin', 'admin', '$2y$10$2d/JFnM00sMzGmhCk71PTOeN5vV2ndh/NGt05Nt/SP1DJozdeVteq', '081224514176', 1, 'user.png'),
(14, 'hagiik', 'hagiik', '$2y$10$m0V0yT2B6MRDoV.jRWPyRe9YIBhlXpkwFPg8g1QY4BX2b1X3Qzx9u', '085156566436', 6, 'user.png'),
(29, 'Sarana', 'sarana', '$2y$10$vtyT.F/4rpPo0u/991uBA.mlCqv2lDs.1gmI3JL2fr6ghy8jKh2Iy', '08123456789', 7, 'user.png'),
(31, 'akademik', 'akademik', '$2y$10$3ceAmCr6Xg2llg7aZfk4Lu0Xg4WfrCYQ6GV7vQeMk5XQL1fGNQd9m', '123456789', 8, 'user.png'),
(32, 'ucc', 'ucc', '$2y$10$5DShP/pq4/enGO2U53AUJeLBpvwh21I7zrbGhIGq2RIK.jqXqIFtW', '08123456789', 10, 'user.png'),
(33, 'prodi', 'prodi', '$2y$10$5060buKNGHmQ1nDGAs8w7.K5Opgd1HHSswZpkPrudJFyqocGwH5pi', '0812345678', 11, 'user.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama`, `permission`) VALUES
(1, 'Admin', '[\"pengaduan\",\"petugas\",\"role\",\"mahasiswa\"]'),
(5, 'Mahasiswa', '[\"tulis pengaduan\"]'),
(6, 'Staff', '[\"pengaduan\"]'),
(7, 'Sarana', '[\"pengaduan\"]'),
(8, 'Akademik', '[\"pengaduan\"]'),
(10, 'Ucc', '[\"pengaduan\"]'),
(11, 'prodi', '[\"pengaduan\",\"mahasiswa\"]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` bigint(16) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `status`, `id_petugas`) VALUES
(177, 92, '2024-07-24', '', 'diterima', 29),
(178, 92, '2024-07-24', 'Sedang dalam proses pengecekan oleh petugas', 'proses', 29),
(179, 92, '2024-07-24', 'Infocus harus di ganti, dan sedang diganti oleh petugas', 'proses', 29),
(180, 92, '2024-07-24', 'Infocus sedang dalam pemasangan oleh petugas', 'proses', 29),
(181, 92, '2024-07-24', 'Infocus selesai dipasang dan dapat digunakan kembali', 'selesai', 29),
(182, 93, '2024-07-24', '', 'diterima', 29),
(183, 94, '2024-07-24', '', 'diterima', 29),
(184, 94, '2024-07-24', 'sedang di cek', 'proses', 29),
(185, 94, '2024-07-24', 'sedang dalam perbaikan', 'proses', 29),
(186, 94, '2024-07-24', 'komputer sudah selesai', 'selesai', 29),
(187, 95, '2024-07-24', '', 'diterima', 29),
(188, 96, '2024-07-24', '', 'tolak', 31),
(189, 95, '2024-07-24', 'Sedang dilakukan pemeriksaan ke ruangan', 'proses', 29),
(190, 95, '2024-07-24', 'Projector sudah diganti dengan yang baru', 'selesai', 29);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nim`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
