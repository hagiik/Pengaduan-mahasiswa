-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 08:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
-- Table structure for table `mahasiswa`
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
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`, `username`, `password`, `telp`, `foto_profile`, `email`) VALUES
(112100, 'Agus Setyawan', 'Sistem Informasi', 'agus2008', '$2y$10$kA4VP77vxQXO8JpXbcTw5u3Nf73WtpG6C2LFAqmOpsDKmk/bOG.NO', '081222244980', 'user.png', NULL),
(11110000, 'Agus Setyawan', 'Sistem Informasi', 'Agus200880', '$2y$10$4lqyA9Y4mvt0zxeetN8X/OVMJO/2TW.JoRaajdOjn7sZY0adMrJTK', '081222244980', 'user.png', NULL),
(11110001, 'Agus Setyawan', 'Sistem Informasi', 'wawan0880', '$2y$10$lMdqAV3WNcPTed0Bs1JlB.ws2ubNzXLTPnElc9x6StNyLeZSAvE/2', '081222244980', 'user.png', 'agus.setyawan@unsera.ac.id'),
(11111111, 'fery', 'Teknik Informatika', 'ferry12345', '$2y$10$NNeu84kCQBRmgaKgRnfwR.yOsbBH16ezvX9k5anHvMIa9rzxU.AVy', '09876543211', 'user.png', 'hagiihsank@gmail.com'),
(11119037, 'Hagi ihsan', 'Sistem Informasi', 'kelanahagi', '$2y$10$ou5OvhF3Xio1pAl99xQE3OmGa8Y8v8K7sWqvyh2FnxV1mjsQtnSGi', '081231231', 'user.png', 'hagiihsank@gmail.com'),
(123456789, 'mia', 'Teknik Informatika', 'sumiatiunsera', '$2y$10$qQ7Sj6ppCAjEoLTvGDuOsePsJCppe8KLOMAG9M06CynvIt10y874e', '12345678901', 'user.png', 'sumiatiunsera82@gmail.com'),
(152111106, 'Test', 'Sistem Informasi', 'test1234', '$2y$10$gx85hQ7epqx8oY0vQmp7t.3kWN7glP.LcKy6TZyVKbT7jZ195g5bK', '083173654230', 'user.png', 'roughtion19@gmail.com'),
(1111903712, 'Mohammad Hagi Ihsan Kelana', 'Sistem Informasi', 'hagiihsan123', '$2y$10$FYDYqPXLgzEp/nMhPqeVWudpnsnScYrAqiOJx441.dyO9xSWfT0KC', '08123456789', 'user.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
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
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nim`, `isi_laporan`, `alasan`, `jenis_laporan`, `foto`, `status`) VALUES
(72, '2024-05-22', 11119037, 'Proyektor pada ruangan 3 rusak', 'Proyektor rusak', 'Sarana', '69ac57ec1e4a1e72ee3070a1db39264e.jpeg', 'selesai'),
(73, '2024-06-03', 11119037, 'Pengaduan masuk', 'Tes demo', 'Akademik', '1ce9fd6e737a64b69e5dd8f17468b80f.png', 'proses'),
(74, '2024-06-07', 1111903712, 'Infokus Ruangan 03 bermasalah', 'Infokus Rusak Pada ruangan 3', 'Sarana', 'fc9838b0f6bbc08a11f4e3af30fc4f7c.png', 'selesai'),
(75, '2024-06-25', 152111106, 'asd', 'Judul', 'Akademik', '90b0a45c74984d43e12042c45fe37b92.jpg', 'selesai'),
(76, '2024-06-26', 11119037, 'Kursi rusak', 'Kerusakan pada kursi ruangan 3', 'Sarana', '3cd7d80aeddd08354e8ac4403d4f420e.png', 'proses'),
(77, '2024-06-26', 11119037, 'Tes demo', 'Tes demo 2', 'Akademik', 'e35867a19fbc713d9a31cac6f1404881.jpg', 'diterima'),
(78, '2024-06-26', 11119037, 'Korek merah hilang', 'Korek hilang', 'Sarana', '9e94dc72e3134d47c02b4a5f5764f6a0.jpg', 'tolak'),
(79, '2024-06-26', 11119037, 'Tes', 'Film', 'Prodi', '79b4ff6aa3f9275c3fc317ef1a9d4ad5.jpg', 'masuk'),
(80, '2024-06-26', 11111111, 'Laptop', 'Laptop', 'Sarana', 'e5a4393d2fd1a3b7f8a448d1d37ec8e4.jpg', ''),
(81, '2024-06-26', 11111111, 'Laotpo benar', 'Laptop rusak', 'Sarana', '819e72df5321423ae65dcb29e059faa3.jpg', 'diterima'),
(82, '2024-06-27', 123456789, 'sedang dalam proses maintenance', 'UCC sedang perbaikan', 'Sarana', 'c1e647a3fef5fdbba64b36974e097256.jpg', 'diterima'),
(83, '2024-06-27', 11110001, 'Mohon bisa dilakukan cetak transkrip nilai untuk keperluan pengajuan beasiswa', 'Permintaan Transkrip Nilai Sementara', 'Akademik', '0bf294ea755018ba96cb63f4fb16a6be.jpg', 'selesai'),
(84, '2024-07-09', 152111106, 'test', 'test', 'Akademik', '0cbc45b8928bde9520ee9d9d4857d464.jpg', 'masuk'),
(85, '2024-07-09', 152111106, '2', '2', 'Akademik', '', 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
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
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `username`, `password`, `telp`, `role_id`, `foto_profile`) VALUES
(2, 'Admin', 'admin', '$2y$10$2d/JFnM00sMzGmhCk71PTOeN5vV2ndh/NGt05Nt/SP1DJozdeVteq', '081224514176', 1, 'user.png'),
(14, 'hagiik', 'hagiik', '$2y$10$m0V0yT2B6MRDoV.jRWPyRe9YIBhlXpkwFPg8g1QY4BX2b1X3Qzx9u', '085156566436', 6, 'user.png'),
(29, 'Sarana', 'sarana', '$2y$10$vtyT.F/4rpPo0u/991uBA.mlCqv2lDs.1gmI3JL2fr6ghy8jKh2Iy', '08123456789', 6, 'user.png'),
(31, 'akademik', 'akademik', '$2y$10$3ceAmCr6Xg2llg7aZfk4Lu0Xg4WfrCYQ6GV7vQeMk5XQL1fGNQd9m', '123456789', 8, 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`, `permission`) VALUES
(1, 'Admin', '[\"pengaduan\",\"petugas\",\"role\",\"mahasiswa\"]'),
(5, 'Mahasiswa', '[\"tulis pengaduan\"]'),
(6, 'Staff', '[\"pengaduan\",\"petugas\",\"role\",\"mahasiswa\"]'),
(7, 'Sarana', '[\"pengaduan\",\"petugas\",\"role\",\"mahasiswa\"]'),
(8, 'Akademik', '[\"pengaduan\",\"petugas\",\"role\",\"mahasiswa\"]'),
(9, 'Prodi', '[\"pengaduan\",\"petugas\",\"role\",\"mahasiswa\"]');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
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
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `status`, `id_petugas`) VALUES
(120, 72, '2024-05-22', '', 'diterima', 29),
(121, 72, '2024-05-22', 'Akan kami periksa terlebih dahulu', 'proses', 29),
(122, 72, '2024-05-22', 'Proyektor baru sedang di pesan', 'proses', 29),
(123, 72, '2024-05-22', 'Proyektor sedang di pasang', 'proses', 29),
(124, 72, '2024-05-22', 'Proyektor sedang tahap pemasangan', 'proses', 29),
(125, 72, '2024-05-22', 'Sudah dapat digunakan', 'selesai', 29),
(126, 73, '2024-06-03', '', 'diterima', 30),
(127, 74, '2024-06-07', '', 'diterima', 29),
(128, 74, '2024-06-07', 'infokus sedang diperbaiki', 'proses', 29),
(129, 74, '2024-06-07', 'infokus harus diganti karena rusak', 'proses', 29),
(130, 74, '2024-06-07', 'infokus selesai diperbaiki', 'selesai', 29),
(131, 75, '2024-06-25', '', 'diterima', 2),
(132, 75, '2024-06-26', '', 'diterima', 2),
(133, 75, '2024-06-26', '', 'diterima', 2),
(134, 73, '2024-06-26', 'sad', 'proses', 2),
(135, 75, '2024-06-26', 'sad', 'proses', 2),
(136, 75, '2024-06-26', 'df', 'selesai', 2),
(137, 75, '2024-06-26', 'ds', 'proses', 2),
(138, 75, '2024-06-26', 'selesai', 'selesai', 2),
(139, 76, '2024-06-26', '', 'diterima', 2),
(140, 76, '2024-06-26', 'pengaduan sedang di proses', 'proses', 2),
(141, 76, '2024-06-26', 'tes lagi\r\n', 'proses', 2),
(142, 76, '2024-06-26', 'coba g', 'proses', 2),
(143, 76, '2024-06-26', 'coba g', 'proses', 2),
(144, 76, '2024-06-26', '123', 'proses', 2),
(145, 77, '2024-06-26', '', 'diterima', 2),
(146, 78, '2024-06-26', '', 'tolak', 2),
(147, 81, '2024-06-27', '', 'diterima', 2),
(148, 82, '2024-06-27', '', 'diterima', 29),
(149, 83, '2024-06-27', '', 'diterima', 31),
(150, 83, '2024-06-27', 'sedang dalam proses', 'proses', 31),
(151, 83, '2024-06-27', 'tess 1', 'proses', 31),
(152, 83, '2024-06-27', 'sudah di cetak silahkan mengambil ke kampus', 'selesai', 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nim`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
