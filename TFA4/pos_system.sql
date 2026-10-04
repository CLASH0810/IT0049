-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2026 at 10:28 AM
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
-- Database: `pos_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Juan Dela Cross', 'juan@example.com', '09171234567', '2026-10-02 20:47:11'),
(2, 'Maria Santos', 'maria@example.com', '09181234567', '2026-10-02 20:47:11'),
(3, 'Pedro Reyes', 'pedro@example.com', '09191234567', '2026-10-02 20:47:11'),
(4, 'Ana Garcia', 'ana@example.com', '09201234567', '2026-10-02 20:47:11'),
(5, 'Mark Wilson', 'mark@example.com', '09211234567', '2026-10-02 20:47:11'),
(6, 'Kram Nosliw Oa', 'Kram@Example.com', '12345678', '2026-10-02 13:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `avatar`, `created_at`) VALUES
(1, 'admin', '$2y$10$c8jRnTO4U7V/sMMl/EKDwuWxZlb9/7v9RRy/L5rjYOjFmkuX.P54u', 'System Administrator', '1790947903_8c4a30323530bd4bf87d.jpg', '2026-10-02 20:47:11'),
(2, 'cashier1', '$2y$10$c8jRnTO4U7V/sMMl/EKDwuWxZlb9/7v9RRy/L5rjYOjFmkuX.P54u', 'John Cashier', NULL, '2026-10-02 20:47:11'),
(3, 'cashier2', '$2y$10$c8jRnTO4U7V/sMMl/EKDwuWxZlb9/7v9RRy/L5rjYOjFmkuX.P54u', 'Sarah Cashier', NULL, '2026-10-02 20:47:11'),
(4, 'manager1', '$2y$10$c8jRnTO4U7V/sMMl/EKDwuWxZlb9/7v9RRy/L5rjYOjFmkuX.P54u', 'David Manager', NULL, '2026-10-02 20:47:11'),
(5, 'staff1', '$2y$10$c8jRnTO4U7V/sMMl/EKDwuWxZlb9/7v9RRy/L5rjYOjFmkuX.P54u', 'Lisa Staff', NULL, '2026-10-02 20:47:11'),
(6, 'Clash', '$2y$10$c8jRnTO4U7V/sMMl/EKDwuWxZlb9/7v9RRy/L5rjYOjFmkuX.P54u', 'Karm Nosliw', NULL, '2026-10-02 13:10:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
