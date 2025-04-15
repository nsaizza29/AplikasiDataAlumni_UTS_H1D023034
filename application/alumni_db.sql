-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 07:37 AM
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
-- Database: `alumni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `nama`, `nim`, `email`, `tahun_lulus`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(1, 'Izza', 'H1D023034', 'nisa.ummah@mhs.unsoed.ac.id', '2024', 1, '2025-04-15 02:27:42', '2025-04-15 05:23:26'),
(3, 'Nida', 'H1D023070', 'nida@mhs.unsoed.ac.id', '2025', 1, '2025-04-15 02:43:02', '2025-04-15 02:43:02'),
(4, 'Nanas', 'H1D0230120', 'nanas@gmail.com', '2025', 2, '2025-04-15 02:43:29', '2025-04-15 02:43:29'),
(5, 'Dedep', 'H1D023051', 'dedep@gmail.com', '2027', 1, '2025-04-15 02:44:08', '2025-04-15 02:46:01'),
(6, 'Ilham', 'H1D019088', 'ilham@gmail.com', '2020', 1, '2025-04-15 02:44:51', '2025-04-15 02:44:51'),
(7, 'Diki', 'H1D010051', 'diki@gmail.com', '2015', 1, '2025-04-15 02:45:33', '2025-04-15 02:46:10'),
(8, 'Ariza', 'H1D018018', 'Ariza@gmail.com', '2022', 2, '2025-04-15 04:58:02', '2025-04-15 04:58:02'),
(10, 'Agung', 'H1D023036', 'agung@gmail.com', '2025', 2, '2025-04-15 05:17:05', '2025-04-15 05:17:28'),
(11, 'Yudit', 'H1D021044', 'yudit@gmail.com', '2025', 1, '2025-04-15 05:24:18', '2025-04-15 05:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `kode_jurusan`) VALUES
(1, 'Teknik Informatika', 'IF'),
(2, 'Teknik Komputer', 'TK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
