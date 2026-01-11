-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2026 pada 07.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Tulip', 'Tulip (bahasa Latin: Tulipa) merupakan nama genus untuk 100 spesies tumbuhan berbunga yang termasuk ke dalam keluarga Liliaceae.', 'tulip.jpg', '2025-01-10 09:00:00', 'admin'),
(2, 'Mawar', 'Dalam kebudayaan Barat, mawar adalah bunga lambang cinta dan kecantikan. Bunga mawar dianggap suci untuk beberapa dewa dalam mitologi Yunani seperti Isis dan Aprodite.', 'mawar.jpg', '2025-01-11 10:10:00', 'admin'),
(3, 'Daisy', 'Bellis perennis adalah spesies Eropa yang umum disebut sebagai bunga daisy Inggris (bahasa Inggris : English daisy) adalah salah satu spesies tumbuhan dari familia Asteraceae, sering dianggap sebagai spesies archetypal dari nama itu.', 'daisy.jpg', '2025-01-11 10:10:00', 'admin'),
(4, 'Rafflesia arnoldii', 'Padma raksasa (bahasa Latin: Rafflesia arnoldii) adalah tumbuhan parasit obligat yang terkenal karena memiliki bunga berukuran sangat besar, bahkan merupakan bunga terbesar di dunia.[1] Semenjak gubernur Bengkulu Helmi Hasan dilantik dilakukan perubahan besar besaran dengan Menganti Raflesia menjadi merah putih.', 'rafflesia.jpg', '2025-12-28 21:30:45', 'admin'),
(5, 'Teratai', 'Teratai (Nymphaea) adalah nama genus untuk tanaman air dari suku Nymphaeaceae. Dalam bahasa Inggris dikenal sebagai water-lily atau waterlily.[1][2] Di Indonesia, teratai juga digunakan untuk menyebut tanaman dari genus Nelumbo (lotus).[', 'teratai.jpg', '2025-12-28 21:54:22', 'admin'),
(6, 'peony', 'Mudan, botan atau peoni (genus Paeonia) adalah genus tunggal untuk tanaman hias yang tergolong keluarga Paeoniaceae. Tanaman botan merupakan tanaman rempah yang tergolong tumbuhan tahunan (perenial).', 'peony.jpg', '2026-01-11 12:16:04', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `gambar`, `tanggal`) VALUES
(1, 'Bunga Lily', 'lily.jpg', '2025-12-29 00:05:04'),
(2, 'Bunga Lavender', 'lavender.jpg', '2025-12-29 00:05:04'),
(3, 'Bunga Sakura', 'sakura.jpg', '2026-01-11 11:31:53'),
(4, 'Bunga Matahari', 'matahari.jpg', '2026-01-11 11:31:53'),
(5, 'Bunga Anggrek', 'anggrek.jpg', '2026-01-11 11:31:53'),
(7, 'Bunga kamboja', 'kamboja.jpg', '2026-01-11 12:15:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin.jpg'),
(2, 'danny', '21232f297a57a5a743894a0e4a801fc3', 'danny.jpg'),
(3, 'user1', '202cb962ac59075b964b07152d234b70', 'u1.jpg'),
(4, 'user2', '202cb962ac59075b964b07152d234b70', 'u2.jpg'),
(5, 'user3', '202cb962ac59075b964b07152d234b70', 'u3.jpg'),
(6, 'user4', '202cb962ac59075b964b07152d234b70', 'u4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;