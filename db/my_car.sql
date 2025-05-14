-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2020 at 09:16 PM
-- Server version: 8.0.22-0ubuntu0.20.04.2
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
-- Database: `myCar`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `membership` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addon_services`
--

CREATE TABLE `addon_services` (
  `id` int NOT NULL,
  `addon_icon` varchar(255) NOT NULL,
  `addon_name` varchar(255) NOT NULL,
  `addon_description` varchar(255) NOT NULL,
  `addon_price` int NOT NULL,
  `category` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addon_services`
--

INSERT INTO `addon_services` (`id`, `addon_icon`, `addon_name`, `addon_description`, `addon_price`, `category`, `created_at`, `updated_at`) VALUES
(1, 'aaron-huber.png', 'break maintainance', 'lorem ipsum', 2500, 1, '2020-11-24 18:30:17', '2020-11-24 18:30:17'),
(2, 'aaron-huber.png', 'oiling', 'lorem ipsum', 200, 1, '2020-11-24 18:30:17', '2020-11-24 18:30:17'),
(3, 'aaron-huber.png', 'tyre maintainance', 'lorem ipsum', 2500, 1, '2020-11-24 18:30:17', '2020-11-24 18:30:17'),
(4, 'aaron-huber.png', 'light maintainance', 'lorem ipsum', 200, 1, '2020-11-24 18:30:17', '2020-11-24 18:30:17'),
(5, 'aaron-huber.png', 'break maintainance-2', 'lorem ipsum', 2500, 2, '2020-11-24 18:30:17', '2020-11-24 18:30:17'),
(6, 'aaron-huber.png', 'oiling-2', 'lorem ipsum', 200, 2, '2020-11-24 18:30:17', '2020-11-24 18:30:17'),
(7, 'aaron-huber.png', 'tyre maintainance-2', 'lorem ipsum', 2500, 2, '2020-11-24 18:30:17', '2020-11-24 18:30:17'),
(8, 'aaron-huber.png', 'light maintainance-2', 'lorem ipsum', 200, 2, '2020-11-24 18:30:17', '2020-11-24 18:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_services`
--

CREATE TABLE `checkout_services` (
  `id` int NOT NULL,
  `service_name` int NOT NULL,
  `checkout_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`) VALUES
(1, 'PUNE'),
(2, 'MUMBAI'),
(3, 'THANE'),
(4, 'SATARA');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_accidental_booking`
--

CREATE TABLE `confirm_accidental_booking` (
  `id` int NOT NULL,
  `service_request_type` varchar(255) NOT NULL,
  `vehical_no` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `select_finance_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `id` int NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `fuel_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`id`, `fuel_type`, `fuel_image`, `created_at`, `updated_at`) VALUES
(1, 'Petrol', 'PETROL.svg', '2020-11-24 09:18:21', '2020-11-24 09:18:21'),
(2, 'Diesel', 'DIESEL.svg', '2020-11-24 09:18:21', '2020-11-24 09:18:21'),
(3, 'CNG', 'CNG.svg', '2020-11-24 09:19:22', '2020-11-24 09:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `garage_request`
--

CREATE TABLE `garage_request` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `garage_request`
--

INSERT INTO `garage_request` (`id`, `name`, `mobile`, `email`, `created_at`, `updated_at`) VALUES
(1, 'DINESH DILIP RAUT', '9405172004', 'dinesh.raut@aasa.tech', '2020-11-25 00:45:37', '2020-11-25 00:45:37'),
(2, 'DINESH DILIP RAUT12212', '7777777777', 'pranit.malwe@khscience.in', '2020-11-25 02:01:35', '2020-11-25 02:01:35'),
(3, 'DINESH DILIP RAUT11111', '9111111111', 'dineshraut170@gmail.com', '2020-11-25 02:02:23', '2020-11-25 02:02:23'),
(4, 'DINESH DILIP RAUT', '9405172004', 'aasatech123@gmail.com', '2020-11-25 02:02:46', '2020-11-25 02:02:46'),
(5, 'DINESH DILIP RAUT', '7890123456', 'rautd2066@gmail.com', '2020-11-25 02:03:01', '2020-11-25 02:03:01'),
(6, 'qqqq', '8956987458', 'rautd2066@gmail.com', '2020-11-25 02:05:48', '2020-11-25 02:05:48'),
(7, 'DINESH DILIP RAUT', '9405172004', 'aasatech123@gmail.com', '2020-11-25 02:07:48', '2020-11-25 02:07:48'),
(8, 'DINESH DILIP RAUT', '9405172004', 'aasatech123@gmail.com', '2020-11-25 02:10:53', '2020-11-25 02:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE `make` (
  `id` int NOT NULL,
  `make_name` varchar(255) NOT NULL,
  `make_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`id`, `make_name`, `make_image`, `created_at`, `updated_at`) VALUES
(1, 'TOYOTA', 'brand-5.jpeg', '2020-11-24 06:08:07', '2020-11-24 06:08:07'),
(2, 'FORD', 'brand-6.jpeg', '2020-11-24 06:08:07', '2020-11-24 06:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int NOT NULL,
  `membership_name` varchar(255) NOT NULL,
  `membership_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `membership_name`, `membership_description`) VALUES
(1, 'Silver', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lor Lorem Ipsu'),
(2, 'Gold', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lor Lorem Ipsu');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2020_10_22_150901_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `model_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `make_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `model_name`, `model_image`, `make_id`, `created_at`, `updated_at`) VALUES
(1, 'FORTUNER', 'brand-6-model-107.jpeg', 1, '2020-11-24 06:12:34', '2020-11-24 06:12:34'),
(2, 'ETIOS', 'brand-6-model-112.jpeg', 1, '2020-11-11 11:01:19', '2020-11-12 11:01:19'),
(3, 'SWIFT', 'brand-9-model-240.jpeg', 1, '2020-11-17 12:44:54', '2020-11-25 11:01:19'),
(4, 'WAGNOR', 'brand-9-model-251.jpeg', 2, '2020-11-11 11:01:19', '2020-11-12 11:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `model_fuel`
--

CREATE TABLE `model_fuel` (
  `id` int NOT NULL,
  `model_id` int NOT NULL,
  `fuel_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `model_fuel`
--

INSERT INTO `model_fuel` (`id`, `model_id`, `fuel_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-11-17 12:44:54', '2020-11-25 11:01:19'),
(2, 2, 2, '2020-11-11 11:01:19', '2020-11-12 11:01:19'),
(3, 1, 3, '2020-11-24 14:46:08', '2020-11-24 14:46:08'),
(4, 2, 3, '2020-11-24 14:46:08', '2020-11-24 14:46:08'),
(5, 2, 1, '2020-11-24 14:49:34', '2020-11-24 14:49:34'),
(6, 3, 2, '2020-11-24 14:49:34', '2020-11-24 14:49:34'),
(7, 4, 2, '2020-11-24 14:52:40', '2020-11-24 14:52:40'),
(8, 2, 2, '2020-11-24 14:52:40', '2020-11-24 14:52:40'),
(9, 1, 2, '2020-11-28 12:52:21', '2020-11-28 12:52:21'),
(10, 4, 1, '2020-11-30 07:24:18', '2020-11-30 07:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `myCart`
--

CREATE TABLE `myCart` (
  `id` int NOT NULL,
  `pack_id` int NOT NULL,
  `u_id` int NOT NULL,
  `pack_price` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `myCart`
--

INSERT INTO `myCart` (`id`, `pack_id`, `u_id`, `pack_price`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 4500, '2020-12-03 09:37:42', '2020-12-03 09:37:42'),
(4, 1, 2, 4500, '2020-12-03 10:12:47', '2020-12-03 10:12:47'),
(5, 1, 2, 4500, '2020-12-03 10:14:38', '2020-12-03 10:14:38'),
(6, 1, 2, 4500, '2020-12-03 10:31:54', '2020-12-03 10:31:54'),
(7, 1, 2, 3500, '2020-12-03 10:38:48', '2020-12-03 10:38:48'),
(8, 4, 2, 4000, '2020-12-03 10:40:46', '2020-12-03 10:40:46'),
(9, 1, 2, 3500, '2020-12-03 10:45:19', '2020-12-03 10:45:19'),
(10, 4, 1, 3500, '2020-12-03 10:46:07', '2020-12-03 10:46:07'),
(11, 1, 1, 3500, '2020-12-03 10:47:58', '2020-12-03 10:47:58'),
(17, 1, 1, 3500, '2020-12-07 05:00:33', '2020-12-07 05:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_information`
--

CREATE TABLE `order_information` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `final_cost` int NOT NULL,
  `total_cost` int NOT NULL,
  `discount_cost` float NOT NULL,
  `discount_perc` int NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `promo_id` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_information`
--

INSERT INTO `order_information` (`id`, `user_id`, `final_cost`, `total_cost`, `discount_cost`, `discount_perc`, `promo_code`, `promo_id`, `created_at`, `updated_at`) VALUES
(1, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(2, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(3, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(4, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(5, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(6, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(7, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(8, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(9, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(10, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(11, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(12, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(13, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(14, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(15, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(16, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(17, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(18, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(19, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(20, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(21, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(22, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(23, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(24, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(25, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(26, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(27, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(28, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(29, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(30, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(31, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(32, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(33, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(34, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(35, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(36, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(37, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(38, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(39, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(40, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(41, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(42, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(43, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(44, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(45, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(46, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(47, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(48, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(49, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(50, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(51, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(52, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(53, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(54, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(55, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(56, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(57, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(58, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(59, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(60, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(61, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(62, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(63, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(64, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(65, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08'),
(66, 1, 500, 480, 20, 2, 'garage10', 1234, '2020-12-08', '2020-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `order_package_information`
--

CREATE TABLE `order_package_information` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `pickup_date` date NOT NULL,
  `time_of_pickup` time NOT NULL,
  `special_remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `payment_option` varchar(255) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_description` varchar(255) NOT NULL,
  `total_price` int NOT NULL,
  `service_time` int NOT NULL,
  `package_type` int NOT NULL,
  `make_id` int NOT NULL,
  `model_id` int NOT NULL,
  `fuel_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_package_information`
--

INSERT INTO `order_package_information` (`id`, `order_id`, `mobile`, `pickup_date`, `time_of_pickup`, `special_remark`, `address`, `payment_option`, `package_name`, `package_description`, `total_price`, `service_time`, `package_type`, `make_id`, `model_id`, `fuel_id`, `created_at`, `updated_at`) VALUES
(1, 19, '9405172004', '2020-12-09', '17:57:00', NULL, '', 'At Garage', 'package4', 'this is fourth package', 4000, 3, 1, 1, 1, 1, '2020-12-08 06:55:57', '2020-12-08 06:55:57'),
(2, 19, '9405172004', '2020-12-09', '17:57:00', NULL, '', 'At Garage', 'package1', 'thisis first package', 3500, 2, 1, 1, 1, 1, '2020-12-08 06:55:57', '2020-12-08 06:55:57'),
(3, 19, '9405172004', '2020-12-09', '17:57:00', NULL, '', 'At Garage', 'package1', 'thisis first package', 3500, 2, 1, 1, 1, 1, '2020-12-08 06:55:57', '2020-12-08 06:55:57'),
(4, 20, '9405172004', '2020-12-09', '17:02:00', NULL, '', 'At Garage', 'package4', 'this is fourth package', 4000, 3, 1, 1, 1, 1, '2020-12-08 06:59:12', '2020-12-08 06:59:12'),
(5, 20, '9405172004', '2020-12-09', '17:02:00', NULL, '', 'At Garage', 'package1', 'thisis first package', 3500, 2, 1, 1, 1, 1, '2020-12-08 06:59:12', '2020-12-08 06:59:12'),
(6, 20, '9405172004', '2020-12-09', '17:02:00', NULL, '', 'At Garage', 'package1', 'thisis first package', 3500, 2, 1, 1, 1, 1, '2020-12-08 06:59:12', '2020-12-08 06:59:12'),
(7, 21, '9405172004', '2020-12-10', '18:04:00', NULL, '', 'At Garage', 'package4', 'this is fourth package', 4000, 3, 1, 1, 1, 1, '2020-12-08 07:03:01', '2020-12-08 07:03:01'),
(8, 22, '9405172004', '2020-12-10', '18:04:00', NULL, '', 'At Garage', 'package4', 'this is fourth package', 4000, 3, 1, 1, 1, 1, '2020-12-08 07:03:10', '2020-12-08 07:03:10'),
(9, 23, '9405172004', '2020-12-07', '18:07:00', NULL, '', 'At Garage', 'package4', 'this is fourth package', 4000, 3, 1, 1, 1, 1, '2020-12-08 07:03:49', '2020-12-08 07:03:49'),
(10, 24, '9405172004', '2020-12-11', '20:10:00', NULL, '', 'At Garage', 'package4', 'this is fourth package', 4000, 3, 1, 1, 1, 1, '2020-12-08 07:10:42', '2020-12-08 07:10:42'),
(11, 24, '9405172004', '2020-12-11', '20:10:00', NULL, '', 'At Garage', 'package1', 'thisis first package', 3500, 2, 1, 1, 1, 1, '2020-12-08 07:10:42', '2020-12-08 07:10:42'),
(12, 24, '9405172004', '2020-12-11', '20:10:00', NULL, '', 'At Garage', 'package1', 'thisis first package', 3500, 2, 1, 1, 1, 1, '2020-12-08 07:10:42', '2020-12-08 07:10:42'),
(13, 66, '9405172004', '2020-12-11', '21:05:00', NULL, NULL, 'At Garage', 'package4', 'this is fourth package', 4000, 3, 1, 1, 1, 1, '2020-12-08 10:01:35', '2020-12-08 10:01:35'),
(14, 66, '9405172004', '2020-12-11', '21:05:00', NULL, NULL, 'At Garage', 'package1', 'thisis first package', 3500, 2, 1, 1, 1, 1, '2020-12-08 10:01:35', '2020-12-08 10:01:35'),
(15, 66, '9405172004', '2020-12-11', '21:05:00', NULL, NULL, 'At Garage', 'package1', 'thisis first package', 3500, 2, 1, 1, 1, 1, '2020-12-08 10:01:35', '2020-12-08 10:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_package_services`
--

CREATE TABLE `order_package_services` (
  `id` int NOT NULL,
  `order_service_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `order_package_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_package_services`
--

INSERT INTO `order_package_services` (`id`, `order_service_name`, `order_package_id`, `created_at`, `updated_at`) VALUES
(1, 'washing', 1, '2020-12-08 07:46:14', '2020-12-08 07:46:14'),
(2, 'oiling', 1, '2020-12-08 07:46:14', '2020-12-08 07:46:14'),
(3, 'mirror', 1, '2020-12-08 07:46:14', '2020-12-08 07:46:14'),
(4, 'serv', 1, '2020-12-08 07:46:14', '2020-12-08 07:46:14'),
(5, 'serv1', 1, '2020-12-08 07:46:14', '2020-12-08 07:46:14'),
(6, 'washing', 1, '2020-12-08 07:46:14', '2020-12-08 07:46:14'),
(7, 'oiling', 1, '2020-12-08 07:46:14', '2020-12-08 07:46:14'),
(8, 'mirror', 1, '2020-12-08 07:46:14', '2020-12-08 07:46:14'),
(9, 'serv', 1, '2020-12-08 07:46:14', '2020-12-08 07:46:14'),
(10, 'serv1', 1, '2020-12-08 07:46:15', '2020-12-08 07:46:15'),
(11, 'washing', 1, '2020-12-08 07:46:15', '2020-12-08 07:46:15'),
(12, 'oiling', 1, '2020-12-08 07:46:15', '2020-12-08 07:46:15'),
(13, 'mirror', 1, '2020-12-08 07:46:15', '2020-12-08 07:46:15'),
(14, 'serv', 1, '2020-12-08 07:46:15', '2020-12-08 07:46:15'),
(15, 'serv1', 1, '2020-12-08 07:46:15', '2020-12-08 07:46:15'),
(16, 'washing', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(17, 'oiling', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(18, 'mirror', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(19, 'serv', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(20, 'serv1', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(21, 'washing', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(22, 'oiling', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(23, 'mirror', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(24, 'serv', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(25, 'serv1', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(26, 'washing', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(27, 'oiling', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(28, 'mirror', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(29, 'serv', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47'),
(30, 'serv1', 1, '2020-12-08 07:48:47', '2020-12-08 07:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_details` varchar(255) NOT NULL,
  `package_description` varchar(255) NOT NULL,
  `package_price` int NOT NULL,
  `special_remark/suggention` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_callback`
--

CREATE TABLE `request_callback` (
  `id` int NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `request_callback`
--

INSERT INTO `request_callback` (`id`, `mobile`, `name`, `created_at`, `updated_at`) VALUES
(1, '8956987458', 'rahul', '2020-11-25 00:43:35', '2020-11-25 00:43:35'),
(2, '9879879879', 'DINESH DILIP RAUT', '2020-11-25 00:44:21', '2020-11-25 00:44:21'),
(3, '8888888888', 'List products_r', '2020-11-25 01:52:29', '2020-11-25 01:52:29'),
(4, '9405172004', 'fdfdfd', '2020-11-28 00:40:10', '2020-11-28 00:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_package`
--

CREATE TABLE `schedule_package` (
  `id` int NOT NULL,
  `package_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `package_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total_price` int NOT NULL,
  `discounted_price` int NOT NULL,
  `service_time` int NOT NULL,
  `package_type` int NOT NULL,
  `make_id` int NOT NULL,
  `model_id` int NOT NULL,
  `fuel_id` int NOT NULL,
  `created_id` timestamp NOT NULL,
  `updated_id` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schedule_package`
--

INSERT INTO `schedule_package` (`id`, `package_name`, `package_description`, `total_price`, `discounted_price`, `service_time`, `package_type`, `make_id`, `model_id`, `fuel_id`, `created_id`, `updated_id`) VALUES
(1, 'package1', 'thisis first package', 4500, 3500, 2, 1, 1, 1, 1, '2020-11-30 10:48:55', '2020-11-30 10:48:55'),
(2, 'package2', 'this is second package', 4600, 3600, 3, 1, 1, 2, 2, '2020-11-30 10:48:55', '2020-11-30 10:48:55'),
(3, 'package3', 'this is third package', 4000, 3000, 1, 1, 1, 3, 2, '2020-11-30 10:51:02', '2020-11-30 10:51:02'),
(4, 'package4', 'this is fourth package', 5000, 4000, 3, 1, 1, 1, 1, '2020-11-30 10:51:02', '2020-11-30 10:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `service_icon` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_icon`, `service_name`, `created_at`, `updated_at`) VALUES
(1, 'Group 959.png', 'Periodic Maintainance', '2020-11-24 16:08:16', '2020-11-24 16:08:16'),
(2, 'Group 1000.png', 'AC Servicing', '2020-11-24 16:08:16', '2020-11-24 16:08:16'),
(3, 'Group 969.png', 'Accidental Repair', '2020-11-24 16:09:51', '2020-11-24 16:09:51'),
(4, 'Group 5789.png', 'Battery and Tyres', '2020-11-24 16:09:51', '2020-11-24 16:09:51'),
(5, 'Group 977.png', 'Mechanical Repair', '2020-11-24 16:11:26', '2020-11-24 16:11:26'),
(6, 'Group 1013.png', 'Unpeak Services', '2020-11-24 16:11:26', '2020-11-24 16:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `service_schedule_pack`
--

CREATE TABLE `service_schedule_pack` (
  `id` int NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `package_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_schedule_pack`
--

INSERT INTO `service_schedule_pack` (`id`, `service_name`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 'washing', 1, '2020-11-30 11:07:24', '2020-11-30 11:07:24'),
(2, 'oiling', 1, '2020-11-24 14:52:40', '2020-11-24 14:52:40'),
(3, 'mirror', 1, '2020-11-17 12:44:54', '2020-11-25 11:01:19'),
(4, 'serv', 1, '2020-11-24 14:49:34', '2020-11-24 14:49:34'),
(5, 'serv1', 1, '2020-11-24 14:49:34', '2020-11-24 14:49:34'),
(6, 'washing', 2, '2020-11-30 11:07:24', '2020-11-30 11:07:24'),
(7, 'oiling', 2, '2020-11-24 14:52:40', '2020-11-24 14:52:40'),
(8, 'mirror', 2, '2020-11-17 12:44:54', '2020-11-25 11:01:19'),
(9, 'service4', 2, '2020-11-24 14:49:34', '2020-11-24 14:49:34'),
(10, 'service5', 2, '2020-11-24 14:49:34', '2020-11-24 14:49:34'),
(11, 'washing', 3, '2020-11-30 11:07:24', '2020-11-30 11:07:24'),
(12, 'oiling', 3, '2020-11-24 14:52:40', '2020-11-24 14:52:40'),
(13, 'mirror', 3, '2020-11-17 12:44:54', '2020-11-25 11:01:19'),
(14, 'service4', 3, '2020-11-24 14:49:34', '2020-11-24 14:49:34'),
(15, 'service5', 3, '2020-11-24 14:49:34', '2020-11-24 14:49:34'),
(16, 'washing1', 4, '2020-11-30 11:07:24', '2020-11-30 11:07:24'),
(17, 'oiling4', 4, '2020-11-24 14:52:40', '2020-11-24 14:52:40'),
(18, 'mirror4', 4, '2020-11-17 12:44:54', '2020-11-25 11:01:19'),
(19, 'service4', 4, '2020-11-24 14:49:34', '2020-11-24 14:49:34'),
(20, 'service5', 4, '2020-11-24 14:49:34', '2020-11-24 14:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2R7i22NseqaGkF3MxdReXaaB4yMnbfRsyFQjDxw0', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieEJWSUs1clViUERKM0ZSeE8zak5jbUF4dlBncXBxQVNtT1JRNlhBayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9vZmZsaW5lQ2hlY2siO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkdUNuMExQWlU0ZTdOMi5ldWhiNUl4LmZTTjJCS2N2cE5nTk9UdEpaZ0JNNVF5TGVyUU1vMFciO30=', 1607433527),
('kWU30k2W6r2NyvK6TdGmXQT0E6YFPU29b2qeLG0g', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiREpKYmRCRGtlTVhFVHF2YkNCNmFRVzVpNzZlVjZwREpzS1VjR1hwYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9QZXJpb2RpY1NlcnZpY2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHVDbjBMUFpVNGU3TjIuZXVoYjVJeC5mU04yQktjdnBOZ05PVHRKWmdCTTVReUxlclFNbzBXIjt9', 1607441495);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int NOT NULL,
  `client_photo` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_location` varchar(255) NOT NULL,
  `client_testimonial` varchar(255) NOT NULL,
  `client_rating` int NOT NULL,
  `category` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `client_photo`, `client_name`, `client_location`, `client_testimonial`, `client_rating`, `category`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'user.jpeg', 'Prathmesh', 'Pune', 'mycarmake provides best service to us', 4, 1, 1, '2020-11-24 16:35:53', '2020-11-24 16:35:53'),
(2, 'user.jpeg', 'Nilkamal', 'Dhanori', 'This is second testimonial', 3, 2, 1, '2020-11-24 16:35:53', '2020-11-24 16:35:53'),
(3, 'user.jpeg', 'Dinesh', 'Ahmednagar', 'lorem ipsum', 3, 3, 1, '2020-11-24 16:38:54', '2020-11-24 16:38:54'),
(4, 'user.jpeg', 'person name', 'unknown', 'Lorem Ipsum Lorem Ipsum Lorem Ips Lorem Ipsum Lorem Ipsum Lorem Ips Lorem Ipsum Lorem Ipsu', 3, 4, 1, '2020-11-24 16:38:54', '2020-11-24 16:38:54'),
(5, 'user.jpeg', 'Prathmesh', 'Pune', 'mycarmake provides best service to us', 4, 5, 1, '2020-11-24 16:35:53', '2020-11-24 16:35:53'),
(6, 'user.jpeg', 'Nilkamal', 'Dhanori', 'This is second testimonial', 3, 3, 1, '2020-11-24 16:35:53', '2020-11-24 16:35:53'),
(7, 'user.jpeg', 'Dinesh', 'Ahmednagar', 'lorem ipsum', 3, 1, 1, '2020-11-24 16:38:54', '2020-11-24 16:38:54'),
(8, 'user.jpeg', 'person name', 'unknown', 'Lorem Ipsum Lorem Ipsum Lorem Ips Lorem Ipsum Lorem Ipsum Lorem Ips Lorem Ipsum Lorem Ipsu', 3, 2, 1, '2020-11-24 16:38:54', '2020-11-24 16:38:54'),
(9, 'user.jpeg', 'Prathmesh', 'Pune', 'mycarmake provides best service to us', 4, 3, 1, '2020-11-24 16:35:53', '2020-11-24 16:35:53'),
(10, 'user.jpeg', 'Nilkamal', 'Dhanori', 'This is second testimonial', 3, 4, 1, '2020-11-24 16:35:53', '2020-11-24 16:35:53'),
(11, 'user.jpeg', 'Dinesh', 'Ahmednagar', 'lorem ipsum', 3, 5, 1, '2020-11-24 16:38:54', '2020-11-24 16:38:54'),
(12, 'user.jpeg', 'person name', 'unknown', 'Lorem Ipsum Lorem Ipsum Lorem Ips Lorem Ipsum Lorem Ipsum Lorem Ips Lorem Ipsum Lorem Ipsu', 3, 1, 1, '2020-11-24 16:38:54', '2020-11-24 16:38:54'),
(13, 'user.jpeg', 'Prathmesh', 'Pune', 'mycarmake provides best service to us', 4, 2, 1, '2020-11-24 16:35:53', '2020-11-24 16:35:53'),
(14, 'user.jpeg', 'Nilkamal', 'Dhanori', 'This is second testimonial', 3, 3, 1, '2020-11-24 16:35:53', '2020-11-24 16:35:53'),
(15, 'user.jpeg', 'Dinesh', 'Ahmednagar', 'lorem ipsum', 3, 1, 1, '2020-11-24 16:38:54', '2020-11-24 16:38:54'),
(16, 'user.jpeg', 'person name', 'unknown', 'Lorem Ipsum Lorem Ipsum Lorem Ips Lorem Ipsum Lorem Ipsum Lorem Ips Lorem Ipsum Lorem Ipsu', 3, 2, 1, '2020-11-24 16:38:54', '2020-11-24 16:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` int DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mobile`, `email`, `password`, `otp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '9405172004', 'dinesh.raut@aasa.tech', '$2y$10$uCn0LPZU4e7N2.euhb5Ix.fSN2BKcvpNgNOTtJZgBM5QyLerQMo0W', NULL, '9tibUFm5SgK4HHZU16vdpPn7v03t0FMON4iIhMn8RoaCm2uRbj6zdOHfvoJZ', '2020-11-23 10:51:57', '2020-11-23 10:53:41'),
(2, '9604922454', 'aasatech@gmail.com', '$2y$10$vRdy47m7nCTs7mJkToE1xOZvn83U58H3pci5r0ixlJoM7KKbysLwa', NULL, NULL, '2020-12-03 05:51:16', '2020-12-03 05:51:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `addon_services`
--
ALTER TABLE `addon_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_services`
--
ALTER TABLE `checkout_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkout_id` (`checkout_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_accidental_booking`
--
ALTER TABLE `confirm_accidental_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garage_request`
--
ALTER TABLE `garage_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `make_id` (`make_id`);

--
-- Indexes for table `model_fuel`
--
ALTER TABLE `model_fuel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_id` (`model_id`),
  ADD KEY `fuel_id` (`fuel_id`);

--
-- Indexes for table `myCart`
--
ALTER TABLE `myCart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_information`
--
ALTER TABLE `order_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_package_information`
--
ALTER TABLE `order_package_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_package_services`
--
ALTER TABLE `order_package_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `request_callback`
--
ALTER TABLE `request_callback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_package`
--
ALTER TABLE `schedule_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `make_id` (`make_id`),
  ADD KEY `model_id` (`model_id`),
  ADD KEY `fuel_id` (`fuel_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_schedule_pack`
--
ALTER TABLE `service_schedule_pack`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addon_services`
--
ALTER TABLE `addon_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `checkout_services`
--
ALTER TABLE `checkout_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `confirm_accidental_booking`
--
ALTER TABLE `confirm_accidental_booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `garage_request`
--
ALTER TABLE `garage_request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `make`
--
ALTER TABLE `make`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `model_fuel`
--
ALTER TABLE `model_fuel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `myCart`
--
ALTER TABLE `myCart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_information`
--
ALTER TABLE `order_information`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `order_package_information`
--
ALTER TABLE `order_package_information`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_package_services`
--
ALTER TABLE `order_package_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_callback`
--
ALTER TABLE `request_callback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule_package`
--
ALTER TABLE `schedule_package`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_schedule_pack`
--
ALTER TABLE `service_schedule_pack`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`make_id`) REFERENCES `make` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `model_fuel`
--
ALTER TABLE `model_fuel`
  ADD CONSTRAINT `model_fuel_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `model_fuel_ibfk_2` FOREIGN KEY (`fuel_id`) REFERENCES `fuel` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `schedule_package`
--
ALTER TABLE `schedule_package`
  ADD CONSTRAINT `schedule_package_ibfk_1` FOREIGN KEY (`make_id`) REFERENCES `make` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `schedule_package_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `schedule_package_ibfk_3` FOREIGN KEY (`fuel_id`) REFERENCES `fuel` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `service_schedule_pack`
--
ALTER TABLE `service_schedule_pack`
  ADD CONSTRAINT `service_schedule_pack_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `schedule_package` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD CONSTRAINT `testimonial_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
