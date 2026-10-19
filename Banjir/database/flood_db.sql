-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2025 at 01:16 PM
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
-- Database: `flood_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama_lengkap`, `email`, `created_at`) VALUES
(1, 'admin', '1ad2min3.', 'Administrator Sistem', 'admin@floodsystem.local', '2025-11-12 07:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `peta`
--

CREATE TABLE `peta` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peta`
--

INSERT INTO `peta` (`id`, `name`, `latitude`, `longitude`, `level`) VALUES
(1, 'Jakarta Utara', -6.118, 106.915, 'Tinggi'),
(2, 'Bandung Selatan', -6.973, 107.642, 'Sedang'),
(3, 'Semarang', -6.966, 110.416, 'Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `nama`, `lokasi`, `latitude`, `longitude`, `tanggal`, `waktu`, `deskripsi`, `gambar`, `created_at`, `status`) VALUES
(17, 'Dewi Lestari', 'Jakarta Timur', -6.22510000, 106.90040000, '2025-12-01', '07:12:22', 'Banjir setinggi 70 cm, warga mulai mengungsi.', 'banjir1.jpg', '2025-12-03 08:04:49', NULL),
(18, 'Agus Pratama', 'Bekasi Utara', -6.24120000, 107.00020000, '2025-12-01', '08:15:40', 'Air masuk rumah setinggi lutut, arus cukup deras.', 'banjir2.jpg', '2025-12-03 08:04:49', NULL),
(19, 'Siti Rahma', 'Bogor Selatan', -6.60010000, 106.81440000, '2025-12-01', '09:33:12', 'Hujan deras semalam menyebabkan banjir 1 meter.', 'banjir3.jpg', '2025-12-03 08:04:49', NULL),
(20, 'Rizky Maulana', 'Depok Margonda', -6.39030000, 106.82670000, '2025-12-02', '10:01:55', 'Genangan 50 cm, kendaraan sulit lewat.', 'banjir4.jpg', '2025-12-03 08:04:49', NULL),
(21, 'Nina Marlina', 'Bandung Timur', -6.92140000, 107.65550000, '2025-12-02', '11:15:20', 'Sungai meluap, banjir cepat naik.', 'banjir5.jpg', '2025-12-03 08:04:49', NULL),
(22, 'Yusuf Adi', 'Semarang Tlogosari', -6.98340000, 110.45010000, '2025-12-03', '13:22:14', 'Air rob bercampur hujan, banjir 60 cm.', 'banjir6.jpg', '2025-12-03 08:04:49', NULL),
(23, 'Amelia Putri', 'Surabaya Rungkut', -7.32530000, 112.79540000, '2025-12-03', '14:10:30', 'Drainase tersumbat, jalan tergenang.', 'banjir7.jpg', '2025-12-03 08:04:49', NULL),
(24, 'Rama Dwi', 'Sidoarjo Kota', -7.44800000, 112.71830000, '2025-12-03', '14:55:10', 'Banjir akibat hujan sepanjang hari.', 'banjir8.jpg', '2025-12-03 08:04:49', NULL),
(25, 'Putri Andini', 'Tangerang Karawaci', -6.17800000, 106.62500000, '2025-12-04', '06:45:50', 'Air mencapai 80 cm, akses jalan ditutup.', 'banjir9.jpg', '2025-12-03 08:04:49', NULL),
(26, 'Joko Santoso', 'Solo Jebres', -7.55100000, 110.80980000, '2025-12-04', '07:22:15', 'Sungai Bengawan Solo meluap.', 'banjir10.jpg', '2025-12-03 08:04:49', NULL),
(27, 'Rahmat Hidayat', 'Banjarmasin', -3.31860000, 114.59440000, '2025-12-02', '09:50:00', 'Banjir kiriman dari hulu, ketinggian air 70cm.', '', '2025-12-03 08:07:16', NULL),
(28, 'Fadhillah Putra', 'Padang Kota', -0.94710000, 100.41720000, '2025-12-03', '17:20:00', 'Hujan deras menyebabkan luapan di beberapa titik.', '', '2025-12-03 08:07:16', NULL),
(29, 'Zulfa', 'Semarang', -7.77498681, 110.38845062, '2025-12-03', '09:18:15', 'ketinggian air', '', '2025-12-03 08:18:15', 'Sudah Ditangani');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `peta`
--
ALTER TABLE `peta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peta`
--
ALTER TABLE `peta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
