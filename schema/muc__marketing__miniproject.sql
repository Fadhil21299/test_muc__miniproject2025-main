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
-- Database: `muc__marketing__miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int NOT NULL,
  `number` text NOT NULL,
  `description` text NOT NULL,
  `year` int NOT NULL,
  `status` enum('pending','agreed','rejected') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `number`, `description`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PR-2025-001', 'Penyusunan laporan keuangan tahunan PT Arwana Jaya', 2025, 'pending', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(2, 'PR-2025-002', 'Pengembangan sistem manajemen dokumen internal', 2025, 'agreed', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(3, 'PR-2025-003', 'Audit operasional cabang Jakarta Selatan', 2025, 'pending', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(4, 'PR-2025-004', 'Penilaian risiko dan compliance untuk divisi finance', 2025, 'pending', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(5, 'PR-2025-005', 'Implementasi aplikasi absensi berbasis web', 2025, 'rejected', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(6, 'PR-2024-006', 'Revisi kontrak layanan dan kebutuhan legal support', 2024, 'agreed', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(7, 'PR-2024-007', 'Maintenance dan peningkatan server internal', 2024, 'agreed', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(8, 'PR-2023-008', 'Pengadaan perangkat IT untuk kantor pusat', 2023, 'rejected', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(9, 'PR-2023-009', 'Pendampingan persiapan ISO 9001:2015', 2023, 'agreed', '2025-11-19 11:16:27', '2025-11-19 11:16:27'),
(10, 'PR-2022-010', 'Layanan pelatihan akuntansi berbasis SAK EMKM', 2022, 'pending', '2025-11-19 11:16:27', '2025-11-19 11:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `serviceused`
--

CREATE TABLE `serviceused` (
  `id` int NOT NULL,
  `proposal_id` int NOT NULL,
  `service_name` text NOT NULL,
  `status` enum('pending','ongoing','done') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `serviceused`
--

INSERT INTO `serviceused` (`id`, `proposal_id`, `service_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Penyusunan SPT Tahunan Badan', 'pending', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(2, 1, 'Konsultasi Pajak Bulanan', 'ongoing', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(3, 2, 'Pemeriksaan & Review Kepatuhan Pajak', 'done', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(4, 3, 'Penyusunan SPT Masa PPN', 'pending', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(5, 3, 'Pendampingan Pemeriksaan Pajak (Tax Audit Assistance)', 'ongoing', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(6, 4, 'Perencanaan Pajak (Tax Planning)', 'done', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(7, 5, 'Pembuatan Bukti Potong & Laporan PPh', 'pending', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(8, 6, 'Pengurusan Restitusi PPN / PPh', 'ongoing', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(9, 7, 'Penyusunan SPT Tahunan Badan', 'done', '2025-11-19 11:19:04', '2025-11-19 11:19:04'),
(10, 8, 'Pendampingan Sengketa Pajak (Tax Dispute Assistance)', 'pending', '2025-11-19 11:19:04', '2025-11-19 11:19:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceused`
--
ALTER TABLE `serviceused`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `serviceused`
--
ALTER TABLE `serviceused`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
