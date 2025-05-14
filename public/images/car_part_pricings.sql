-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2021 at 11:26 AM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_part_pricings`
--

CREATE TABLE `car_part_pricings` (
  `id` bigint UNSIGNED NOT NULL,
  `part_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solid` int NOT NULL,
  `metallic` int NOT NULL,
  `pearl` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_part_pricings`
--

INSERT INTO `car_part_pricings` (`id`, `part_name`, `car_type`, `solid`, `metallic`, `pearl`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hood', 'Hatchback', 2000, 2400, 3000, NULL, '2021-01-27 08:24:32', '2021-01-27 08:24:32'),
(2, 'Hood', 'Hatchback', 3000, 2400, 2000, NULL, '2021-01-27 08:25:09', '2021-01-27 08:25:09'),
(3, 'Hood', 'Hatchback', 3000, 3400, 4500, NULL, '2021-01-27 08:25:09', '2021-01-27 08:25:09'),
(4, 'Fender (Each)', 'Hatchback', 2000, 3000, 2350, NULL, '2021-01-27 08:26:02', '2021-01-27 08:26:02'),
(5, 'Fender (Each)', 'Hatchback', 2300, 3300, 4000, NULL, '2021-01-27 08:26:02', '2021-01-27 08:26:02'),
(6, 'Fender (Each)', 'Hatchback', 2000, 2400, 3000, NULL, '2021-01-27 08:26:02', '2021-01-27 08:26:02'),
(7, 'Door (Front)', 'Hatchback', 3250, 3650, 4100, NULL, '2021-01-27 10:16:03', '2021-01-27 10:16:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_part_pricings`
--
ALTER TABLE `car_part_pricings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_part_pricings`
--
ALTER TABLE `car_part_pricings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
