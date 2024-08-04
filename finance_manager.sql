-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 12:50 PM
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
-- Database: `finance_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expense_date` date NOT NULL,
  `item` varchar(255) NOT NULL,
  `expense_cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `user_id`, `expense_date`, `item`, `expense_cost`) VALUES
(1, 1, '2024-06-03', 'shoes', 1232.00),
(2, 1, '2024-05-08', 'bag', 232.00),
(3, 1, '2024-06-04', 'Laptop', 1234323.00),
(4, 1, '2024-05-07', 'House', 232344.00),
(5, 1, '2024-05-28', 'car', 23456543.00),
(6, 1, '2024-04-24', 'mobile ', 4322.00),
(7, 6, '2024-04-10', 'car', 2345.00),
(8, 1, '2024-06-04', 'bag', 543.00),
(9, 6, '2024-05-09', 'bag', 23432.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'suman', 'root@root.com', '$2y$10$gUWdRP4XGyQt0J5TGyHZLurS/e6PCJb9QiC9Rt0JNpRD.eFPUu342'),
(2, 'suman', 'sdbkup07@gmail.com', '$2y$10$V8LRQSfl2kePiKL93Eot1.pcmSEWr32nzfxnbPMx6ycXg6B8/tmlu'),
(3, 'suman', 'admin@admin.com', '$2y$10$FbLxYlw9/8UpvhggV1SZFurrfuMd6Pv.7.z.U2XGEPD6.RSB4gQj6'),
(5, 'suman', 'test@admin.com', '$2y$10$T7KBmJ4S3DnWNJETTAuUhect.yAC/EmD4ACS8GpgZwWoQGCIfEOEi'),
(6, 'Test', 'test@test.com', '$2y$10$sKySQFFx4HYs2wqvXqzaz.E.KB2r5X2fAIcAh3JjZ0YNMVO9a4fsm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
