-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2024 pada 12.58
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_mahasiswa`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`, `username`, `password`, `telp`, `foto_profile`, `email`) VALUES
(10203040, 'Wawan', 'Sistem Informasi', 'Agus200880', '$2y$10$HIXKEPeV5W18KOdP.edc8uRC7/QxXr4KDvIaWIwe2VTkpAo.XB/cu', '081222244980', 'user.png', 'Agus.setyawan@hotmail.com'),
(11119037, 'Mohammad hagi ihsan kelana', 'Sistem Informasi', 'hagiik33', '$2y$10$TFAaS4bqzYqPym4uCSuNO.tDRPfrJsoSiYAAU6hnTP64BATmaMrWS', '085156566436', 'user.png', 'Hagiihsank@gmail.com'),
(12121212, 'Agus Setyawan', 'Sistem Informasi', 'Wawan200880', '$2y$10$sXVABunHZzcUq9stgGaInOFIqMRw0ps8e8D7IoDbTkL68NQkrLoUy', '081222244980', 'user.png', 'Agus.setyawan@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
