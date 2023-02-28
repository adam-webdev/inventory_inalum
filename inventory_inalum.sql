-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 10:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_inalum`
--

-- --------------------------------------------------------

--
-- Table structure for table `rak_belakang`
--

CREATE TABLE `rak_belakang` (
  `id` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `nama_sparepart` varchar(255) NOT NULL,
  `meker` varchar(50) NOT NULL,
  `no_rak` varchar(50) NOT NULL,
  `jumlah` int(200) NOT NULL,
  `penempatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak_belakang`
--

INSERT INTO `rak_belakang` (`id`, `tanggal`, `no_resi`, `nama_sparepart`, `meker`, `no_rak`, `jumlah`, `penempatan`) VALUES
(4, '2023-02-28', '1124f', 'afe', 'HERWITCH', 'aefs', 33, 'ALCPL Casting While'),
(5, '2023-02-28', '112', 'test', 'HYCASHT', '12', 50, 'ALCPL ACD');

-- --------------------------------------------------------

--
-- Table structure for table `rak_depan`
--

CREATE TABLE `rak_depan` (
  `id` bigint(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_resi` varchar(50) DEFAULT NULL,
  `nama_sparepart` varchar(255) DEFAULT NULL,
  `meker` varchar(50) DEFAULT NULL,
  `no_rak` varchar(50) DEFAULT NULL,
  `jumlah` int(200) DEFAULT NULL,
  `penempatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak_depan`
--

INSERT INTO `rak_depan` (`id`, `tanggal`, `no_resi`, `nama_sparepart`, `meker`, `no_rak`, `jumlah`, `penempatan`) VALUES
(7, '2023-02-27', '1124', 'test3', 'HYCASHT', '1223', 60, 'ALCPL ACD'),
(8, '2023-02-27', '1124', 'test3', 'HYCASHT', '1223', 60, 'ALCPL ACD'),
(9, '2023-02-27', '1124', 'test3', 'HYCASHT', '1223', 60, 'BCPL Charging Machine'),
(10, '2023-02-27', '1124', 'test3', 'HYCASHT', '1223', 60, 'BCPL Charging Machine'),
(11, '2023-02-27', 'ada', 'ada', 'HERWITCH', 'adw', 0, 'ALCPL ACD'),
(12, '2023-02-27', 'ada', 'ada', 'HERWITCH', 'adw', 0, 'ALCPL ACD'),
(13, '2023-02-27', 'ada', 'ada', 'HERWITCH', 'adw', 0, 'ALCPL ACD'),
(14, '2023-02-27', 'adaw', 'dwadaw', 'HERWITCH', 'awdawd', 0, 'ALCPL Casting While'),
(15, '2023-02-27', 'adaw', 'dwadaw', 'HERWITCH', 'awdawd', 0, 'ALCPL Casting While'),
(16, '2023-02-27', '1124', 'test barang', 'HERWITCH', 'asd', 0, 'BCPL Charging Machine'),
(17, '2023-02-27', '1124', 'test barang', 'HERWITCH', 'asd', 0, 'BCPL Charging Machine'),
(18, '2023-02-27', '1124', 'adwad', 'HERWITCH', 'dadaw', 0, 'ALCPL Casting While'),
(19, '2023-02-27', 'awdawdawd', 'asd', 'HYCASHT', 'dawd', 0, 'ALCPL Casting While'),
(20, '2023-02-05', '1124', 'test barange23', 'HYCASHT', '44', 44, 'ALCPL TOD'),
(21, '2023-02-05', '1124', 'test barange23', 'HYCASHT', '44', 44, 'ALCPL TOD'),
(22, '2023-02-03', '22121', '313123123123', 'HERWITCH', '123312', 312312, 'ALCPL Casting While'),
(23, '2023-02-03', '22121', '313123123123', 'HERWITCH', '123312', 312312, 'ALCPL Casting While'),
(24, '2023-02-15', '112', 'test3', 'HYCASHT', '12', 50, 'ALCPL Casting While'),
(25, '2023-02-15', '112', 'test3', 'HYCASHT', '12', 50, 'ALCPL Casting While');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `created_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `foto`, `created_at`) VALUES
(1, 'adam', 'adam@gmail.com', 'adam123', '`', 'foto', '2023-02-25 12:06:25.000000'),
(2, 'root', 'ada@gmail.com', '$2y$10$2dldE6E6BCaGMy3dp3/eHeF0FDBZL8KXQecf.KEoYdjvAlmeAGHMG', NULL, NULL, '2023-02-25 00:00:00.000000'),
(3, 'admin', 'admin@gmail.com', '$2y$10$zZ8WvIsnguhZjRZ9x69Bze1daKDHpPaElx818pmw7HcSQ4IiCum/W', NULL, NULL, '2023-02-28 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rak_belakang`
--
ALTER TABLE `rak_belakang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rak_depan`
--
ALTER TABLE `rak_depan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rak_belakang`
--
ALTER TABLE `rak_belakang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rak_depan`
--
ALTER TABLE `rak_depan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
