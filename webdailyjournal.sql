-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2025 at 02:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `article`
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
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Tulip', 'Tulip (bahasa Latin: Tulipa) merupakan nama genus untuk 100 spesies tumbuhan berbunga yang termasuk ke dalam keluarga Liliaceae.', 'tulip.jpg', '2025-01-10 09:00:00', 'admin'),
(2, 'Mawar', 'Dalam kebudayaan Barat, mawar adalah bunga lambang cinta dan kecantikan. Bunga mawar dianggap suci untuk beberapa dewa dalam mitologi Yunani seperti Isis dan Aprodite.', 'mawar.jpg', '2025-01-11 10:10:00', 'admin'),
(3, 'Daisy', 'Bellis perennis adalah spesies Eropa yang umum disebut sebagai bunga daisy Inggris (bahasa Inggris : English daisy) adalah salah satu spesies tumbuhan dari familia Asteraceae, sering dianggap sebagai spesies archetypal dari nama itu.', 'daisy.jpg', '2025-01-11 10:10:00', 'admin'),
(4, 'Rafflesia arnoldii', 'Padma raksasa (bahasa Latin: Rafflesia arnoldii) adalah tumbuhan parasit obligat yang terkenal karena memiliki bunga berukuran sangat besar, bahkan merupakan bunga terbesar di dunia.[1] Semenjak gubernur Bengkulu Helmi Hasan dilantik dilakukan perubahan besar besaran dengan Menganti Raflesia menjadi merah putih.', '', '2025-12-26 19:27:57', 'admin'),
(5, 'Tratai', 'Teratai (Nymphaea) adalah nama genus untuk tanaman air dari suku Nymphaeaceae. Dalam bahasa Inggris dikenal sebagai water-lily atau waterlily.[1][2] Di Indonesia, teratai juga digunakan untuk menyebut tanaman dari genus Nelumbo (lotus).[', '20251226193110.jpg', '2025-12-26 19:31:10', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
