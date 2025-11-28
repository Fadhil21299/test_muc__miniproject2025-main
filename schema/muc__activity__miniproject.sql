-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2025 at 05:56 AM
-- Server version: 9.4.0
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muc__activity__miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE `timesheet` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `timestart` time NOT NULL,
  `timefinish` time NOT NULL,
  `employees_id` int NOT NULL,
  `serviceused_id` int NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`id`, `date`, `timestart`, `timefinish`, `employees_id`, `serviceused_id`, `description`) VALUES
(1, '2025-01-03', '09:00:00', '12:00:00', 1, 2, 'Konsultasi pajak bulanan untuk klien A'),
(2, '2025-01-03', '13:00:00', '16:30:00', 2, 3, 'Review kepatuhan pajak dokumen klien B'),
(3, '2025-01-04', '08:30:00', '11:45:00', 3, 5, 'Pendampingan pemeriksaan pajak di kantor KPP'),
(4, '2025-01-04', '12:45:00', '15:30:00', 4, 6, 'Analisis awal perencanaan pajak tahunan'),
(5, '2025-01-05', '09:00:00', '11:00:00', 5, 8, 'Pengurusan restitusi PPN klien C'),
(6, '2025-01-05', '11:15:00', '14:30:00', 1, 9, 'Penyusunan SPT Tahunan Badan klien D'),
(7, '2025-01-06', '08:00:00', '12:00:00', 2, 2, 'Konsultasi pajak lanjutan bulan berjalan'),
(8, '2025-01-06', '13:00:00', '17:00:00', 3, 3, 'Review dokumen transaksi untuk kepatuhan PPh'),
(9, '2025-01-07', '09:30:00', '12:30:00', 4, 5, 'Pendampingan pemeriksaan pajak lanjutan'),
(10, '2025-01-07', '13:00:00', '16:00:00', 5, 6, 'Tax planning untuk optimalisasi beban pajak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timesheet`
--
ALTER TABLE `timesheet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
