-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 02:39 PM
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
-- Database: `real_state`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `active_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `status` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instalment_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nid` varchar(20) NOT NULL,
  `tin` varchar(20) NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `active_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `status` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `father_name`, `mother_name`, `phone`, `email`, `email_verified_at`, `nid`, `tin`, `role_id`, `active_status`, `status`, `password`, `image`, `created_by`, `updated_by`, `deleted_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Asraf ali', 'Rohim Mia', 'aklima', '01745812365', 'asrafali@gmail.com', NULL, '4568656864', '4568656864', NULL, 'inactive', '0', '$2y$12$jIFF8Uf2NPITf5/WfPY/jO7pP60nPpsWlbGMSw52u5/MPsRofPUMe', 'Client_1714801700_2304422530.jpg', 1, NULL, NULL, NULL, '2024-05-03 23:48:20', '2024-05-03 23:48:20', NULL),
(2, 'Rahat Ali', 'gofur', 'akhi Aktar', '01745123115', 'rahatali@gmail.com', NULL, '1567789457', '1567789457', NULL, 'inactive', '0', '$2y$12$e6pNNfuvuVLNG.AZR9W9nOOsfqeji.aoH/epVI.doLTEek1B/hUmu', 'Client_1714801947_8945055605.jpg', 1, NULL, NULL, NULL, '2024-05-03 23:52:27', '2024-05-03 23:52:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_addresses`
--

CREATE TABLE `client_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `pre_address` varchar(255) NOT NULL,
  `pre_city` varchar(255) NOT NULL,
  `pre_district` varchar(255) NOT NULL,
  `pre_zipCode` int(11) NOT NULL,
  `per_address` varchar(255) NOT NULL,
  `per_city` varchar(255) NOT NULL,
  `per_district` varchar(255) NOT NULL,
  `per_zipCode` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_addresses`
--

INSERT INTO `client_addresses` (`id`, `client_id`, `pre_address`, `pre_city`, `pre_district`, `pre_zipCode`, `per_address`, `per_city`, `per_district`, `per_zipCode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Scaton', 'dhaka', 'Khulna', 1205, 'Scaton', 'dhaka', 'Khulna', 1205, '2024-05-03 23:48:20', '2024-05-03 23:48:20'),
(2, 2, 'Lalbag, Dhaka', 'dhaka', 'Bogura', 1205, 'Lalbag, Dhaka', 'dhaka', 'Naogaon', 1205, '2024-05-03 23:52:27', '2024-05-03 23:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `compony_infos`
--

CREATE TABLE `compony_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compony_infos`
--

INSERT INTO `compony_infos` (`id`, `name`, `email`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Parents Engineering Ltd', 'parentsengineeringltd@gmail.com', 'Tasnim Upo_Shohor, Kagmari, Tangail.', 'Company_logo_1714903753-828746627.jpg', '2024-05-05 01:39:10', '2024-05-05 04:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nid` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `active_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `status` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd'),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', '22.65561018', '92.17541121', 'www.rangamati.gov.bd'),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd'),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', '21.44315751', '91.97381741', 'www.coxsbazar.gov.bd'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd'),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd'),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd'),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd'),
(15, 2, 'Rajshahi', 'রাজশাহী', '24.37230298', '88.56307623', 'www.rajshahi.gov.bd'),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', '25.09636876', '89.04004280', 'www.joypurhat.gov.bd'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd'),
(19, 2, 'Naogaon', 'নওগাঁ', '24.83256191', '88.92485205', 'www.naogaon.gov.bd'),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', '22.7180905', '89.0687033', 'www.satkhira.gov.bd'),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd'),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd'),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd'),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', '22.6422689', '90.2003932', 'www.jhalakathi.gov.bd'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd'),
(32, 4, 'Pirojpur', 'পিরোজপুর', '22.5781398', '89.9983909', 'www.pirojpur.gov.bd'),
(33, 4, 'Barisal', 'বরিশাল', '22.7004179', '90.3731568', 'www.barisal.gov.bd'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd'),
(35, 4, 'Barguna', 'বরগুনা', '22.159182', '90.125581', 'www.barguna.gov.bd'),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd'),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd'),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', '23.2060195', '90.3477725', 'www.shariatpur.gov.bd'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd'),
(44, 6, 'Tangail', 'টাঙ্গাইল', '24.264145', '89.918029', 'www.tangail.gov.bd'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', '23.8602262', '90.0018293', 'www.manikganj.gov.bd'),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', '23.5435742', '90.5354327', 'www.munshiganj.gov.bd'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd'),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd'),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', '25.9165451', '89.4532409', 'www.lalmonirhat.gov.bd'),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd'),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd'),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '24.7465670', '90.4072093', 'www.mymensingh.gov.bd'),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `join_date` date NOT NULL,
  `regain_date` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `active_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `gender`, `father_name`, `mother_name`, `birth_date`, `nationality`, `phone`, `nid`, `email`, `email_verified_at`, `join_date`, `regain_date`, `password`, `image`, `role_id`, `designation`, `active_status`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Asraf ali', 'Male', 'Rohim Mia', 'aklima', '2024-05-06', 'Bangla', '01745812365', '46587468', 'asraf@gmail.com', NULL, '2024-05-22', NULL, NULL, 'Employee_1714802297_1797467818.jpg', NULL, 'projectManager', 'inactive', '0', 1, NULL, NULL, '2024-05-03 23:58:17', '2024-05-03 23:58:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_addresses`
--

CREATE TABLE `employee_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `pre_address` varchar(255) NOT NULL,
  `pre_city` varchar(255) NOT NULL,
  `pre_district` varchar(255) NOT NULL,
  `pre_zipCode` int(11) NOT NULL,
  `per_address` varchar(255) NOT NULL,
  `per_city` varchar(255) NOT NULL,
  `per_district` varchar(255) NOT NULL,
  `per_zipCode` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_addresses`
--

INSERT INTO `employee_addresses` (`id`, `employee_id`, `pre_address`, `pre_city`, `pre_district`, `pre_zipCode`, `per_address`, `per_city`, `per_district`, `per_zipCode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Scaton', 'dhaka', 'Bogura', 1205, 'Scaton', 'dhaka', 'Bogura', 1205, '2024-05-03 23:58:17', '2024-05-03 23:58:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `project_id`, `date`, `name`, `price`, `quantity`, `total_price`, `total`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2024-05-04', '\"[\\\"Phone2\\\",\\\"Food2\\\"]\"', '\"[\\\"500000\\\",\\\"5000\\\"]\"', '\"[\\\"6\\\",\\\"2\\\"]\"', '\"[\\\"3000000\\\",\\\"10000\\\"]\"', 3010000.00, 1, NULL, NULL, '2024-05-04 05:17:41', '2024-05-04 06:19:19', NULL),
(2, 1, '2024-05-07', '\"[\\\"RC\\\",\\\"cake\\\"]\"', '\"[\\\"25\\\",\\\"30\\\"]\"', '\"[\\\"5\\\",\\\"5\\\"]\"', '\"[\\\"125\\\",\\\"150\\\"]\"', 275.00, 1, NULL, NULL, '2024-05-07 05:13:35', '2024-05-07 05:13:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `flat_area` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `room` int(11) NOT NULL,
  `dining_space` int(11) DEFAULT NULL,
  `bath_room` int(11) NOT NULL,
  `parking` varchar(255) DEFAULT NULL,
  `outdoor` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 0,
  `sale_status` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`id`, `user_id`, `project_id`, `client_id`, `name`, `floor`, `flat_area`, `price`, `room`, `dining_space`, `bath_room`, `parking`, `outdoor`, `images`, `description`, `active_status`, `sale_status`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 2, '101', 'Ground Floor', 6000, 3000.00, 4, 500, 3, NULL, NULL, '\"[[\\\"Flat_1714801024-59880798.jpg\\\"]]\"', 'fy yur6tu gf68u5ers jkop8yig jlugigf', 0, 2, 0, 1, NULL, NULL, '2024-05-03 23:37:04', '2024-05-13 04:33:11'),
(2, NULL, 1, 1, '102', 'Ground Floor', 6000, 3000.00, 5, 500, 3, NULL, NULL, '\"[[\\\"Flat_1714813489-36334494.jpg\\\"]]\"', 'bhfj ghiuv tfu', 0, 2, 0, 1, NULL, NULL, '2024-05-04 03:04:49', '2024-05-13 06:16:07'),
(3, NULL, 1, NULL, '103', 'Ground Floor', 6000, 3000.00, 5, 500, 3, NULL, NULL, '\"[[\\\"Flat_1714905866-89583799.jpg\\\"]]\"', 'Price Per squer Fit, Price Per squer Fit Price Per squer Fit Price Per squer Fit Price Per squer Fit Price Per squer Fit', 0, 0, 0, 1, NULL, NULL, '2024-05-05 04:44:26', '2024-05-13 04:09:25'),
(4, NULL, 1, NULL, '104', 'Ground Floor', 6000, 3000.00, 5, 500, 3, NULL, NULL, '\"[[\\\"Flat_1714905922-4565722.jpg\\\"]]\"', 'Price Per squer Fit Price Per squer Fit Price Per squer Fit Price Per squer Fit Price Per squer Fit Price Per squer Fit Price Per squer Fit Price Per squer Fit', 0, 0, 0, 1, NULL, NULL, '2024-05-05 04:45:22', '2024-05-13 03:39:16'),
(5, NULL, 1, 2, 'B-105', '2nd Floor', 6000, 3000.00, 5, 500, 3, NULL, NULL, '\"[[\\\"Flat_1715598311-47490338.jpg\\\"]]\"', 'ftyr5y guhr6tu6 uh457 ujh65r', 0, 2, 0, 1, NULL, NULL, '2024-05-13 05:05:11', '2024-05-13 05:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `flat_return_infos`
--

CREATE TABLE `flat_return_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flat_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `buying_price` decimal(15,2) NOT NULL,
  `payable_amount` decimal(15,2) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `return_amount` decimal(15,2) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `check_number` varchar(20) DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `sold_by` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_by` bigint(20) UNSIGNED DEFAULT NULL,
  `return_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flat_sale_infos`
--

CREATE TABLE `flat_sale_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flat_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `sold_by` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flat_sale_infos`
--

INSERT INTO `flat_sale_infos` (`id`, `flat_id`, `price`, `status`, `sold_by`, `created_by`, `created_at`, `updated_at`) VALUES
(25, 1, 10050000.00, 0, 1, NULL, '2024-05-13 04:33:11', '2024-05-13 04:33:11'),
(26, 5, 900000.00, 0, 1, NULL, '2024-05-13 05:06:08', '2024-05-13 05:06:08'),
(27, 5, 900000.00, 0, 1, NULL, '2024-05-13 05:10:07', '2024-05-13 05:10:07'),
(28, 2, 950000.00, 0, 1, NULL, '2024-05-13 06:16:07', '2024-05-13 06:16:07'),
(29, 2, 950000.00, 0, 1, NULL, '2024-05-13 06:20:12', '2024-05-13 06:20:12'),
(30, 2, 950000.00, 0, 1, NULL, '2024-05-13 06:21:04', '2024-05-13 06:21:04'),
(31, 2, 950000.00, 0, 1, NULL, '2024-05-13 06:21:50', '2024-05-13 06:21:50'),
(32, 2, 950000.00, 0, 1, NULL, '2024-05-13 06:23:18', '2024-05-13 06:23:18'),
(33, 2, 950000.00, 0, 1, NULL, '2024-05-13 06:30:58', '2024-05-13 06:30:58'),
(34, 2, 950000.00, 0, 1, NULL, '2024-05-13 06:31:41', '2024-05-13 06:31:41'),
(35, 2, 950000.00, 0, 1, NULL, '2024-05-13 06:34:35', '2024-05-13 06:34:35'),
(36, 2, 950000.00, 0, 1, NULL, '2024-05-13 06:35:51', '2024-05-13 06:35:51'),
(37, 2, 950000.00, 0, 1, NULL, '2024-05-13 06:36:54', '2024-05-13 06:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `total_Investment` decimal(15,2) NOT NULL,
  `installment_type` varchar(255) NOT NULL,
  `profit_type` varchar(255) NOT NULL,
  `profit` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `client_id`, `project_id`, `total_Investment`, `installment_type`, `profit_type`, `profit`, `created_by`, `updated_by`, `deleted_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 8000000.00, 'fullPaid', 'fixed', '800000', 1, NULL, NULL, NULL, '2024-05-04 00:52:47', '2024-05-04 00:52:47', NULL),
(2, 2, 1, 8000000.00, 'fullPaid', 'fixed', '800000', 1, NULL, NULL, NULL, '2024-05-04 02:48:02', '2024-05-04 02:48:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

CREATE TABLE `investors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `tin` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `pre_address` varchar(255) NOT NULL,
  `pre_city` varchar(255) NOT NULL,
  `pre_district` varchar(255) NOT NULL,
  `pre_zipCode` int(11) NOT NULL,
  `per_address` varchar(255) NOT NULL,
  `per_city` varchar(255) NOT NULL,
  `per_district` varchar(255) NOT NULL,
  `per_zipCode` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `active_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invest_installments`
--

CREATE TABLE `invest_installments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `investment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `installment_amount` decimal(15,2) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `account_number` bigint(20) DEFAULT NULL,
  `check_number` bigint(20) DEFAULT NULL,
  `received_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invest_installments`
--

INSERT INTO `invest_installments` (`id`, `investment_id`, `payment_type`, `installment_amount`, `bank_name`, `branch`, `account_number`, `check_number`, `received_by`, `updated_by`, `deleted_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'cash', 8000000.00, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-05-04 00:52:47', '2024-05-04 00:52:47'),
(2, 2, 'check', 8000000.00, 'CMC', NULL, 48979654687, 56865487, 1, NULL, NULL, NULL, '2024-05-04 02:48:02', '2024-05-04 02:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_11_104146_create_investments_table', 1),
(6, '2024_03_11_104207_create_investors_table', 1),
(7, '2024_03_11_104347_create_invest_installments_table', 1),
(8, '2024_03_14_091251_create_admins_table', 1),
(9, '2024_03_14_092831_create_customers_table', 1),
(10, '2024_03_19_042621_create_districts_table', 1),
(11, '2024_03_19_093558_create_projects_table', 1),
(13, '2024_03_30_094533_create_permission_tables', 1),
(14, '2024_03_31_004149_create_employee_addresses_table', 1),
(15, '2024_03_31_004228_create_bank_details_table', 1),
(16, '2024_03_31_004444_create_designations_table', 1),
(17, '2024_03_31_012423_create_employees_table', 1),
(18, '2024_03_31_103643_create_transactions_table', 1),
(19, '2024_04_05_093912_create_clients_table', 1),
(20, '2024_04_05_094056_create_client_addresses_table', 1),
(21, '2024_04_21_104643_create_vendors_table', 1),
(22, '2024_04_23_064939_create_flats_table', 1),
(23, '2024_04_25_083952_create_banks_table', 1),
(26, '2024_04_29_063045_create_payments_table', 1),
(27, '2024_04_29_035152_create_flat_sale_infos_table', 2),
(28, '2024_04_29_050404_create_flat_return_infos_table', 3),
(29, '2024_05_04_093812_create_purchases_table', 4),
(31, '2024_03_25_083531_create_expenses_table', 5),
(32, '2024_05_04_102018_create_expense_categories_table', 5),
(33, '2024_05_05_044014_create_compony_infos_table', 6),
(34, '2024_05_08_090356_create_return_purchases_table', 7),
(35, '2024_05_09_093028_create_return_purchase_balances_table', 8),
(36, '2024_05_12_090517_create_purchase_due_pays_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flat_id` bigint(20) UNSIGNED NOT NULL,
  `flatSale_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `check_number` varchar(20) DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `received_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `flat_id`, `flatSale_id`, `payment_type`, `amount`, `bank_name`, `branch`, `account_number`, `check_number`, `status`, `received_by`, `created_at`, `updated_at`) VALUES
(30, 1, 25, 'cash', 5000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 04:33:11', '2024-05-13 04:33:11'),
(31, 1, 25, 'cash', 5000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 04:56:48', '2024-05-13 04:56:48'),
(32, 1, 25, 'cash', 5000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 04:58:48', '2024-05-13 04:58:48'),
(33, 1, 25, 'cash', 5000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 05:01:25', '2024-05-13 05:01:25'),
(34, 5, 26, 'bank', 10000.00, 'CMCnmk', 'dhaka', '45968686', NULL, 0, 1, '2024-05-13 05:06:08', '2024-05-13 05:06:08'),
(35, 5, 27, 'bank', 10000.00, 'CMCnmk', 'dhaka', '45968686', NULL, 0, 1, '2024-05-13 05:10:07', '2024-05-13 05:10:07'),
(36, 5, 26, 'check', 10000.00, 'CMC', 'dhaka', '4565446', '456746545', 0, 1, '2024-05-13 05:14:44', '2024-05-13 05:14:44'),
(37, 1, 25, 'cash', 5000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 06:15:18', '2024-05-13 06:15:18'),
(38, 2, 28, 'cash', 50000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 06:16:07', '2024-05-13 06:16:07'),
(39, 2, 29, 'cash', 50000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 06:20:12', '2024-05-13 06:20:12'),
(40, 2, 30, 'cash', 50000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 06:21:04', '2024-05-13 06:21:04'),
(41, 2, 31, 'cash', 50000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 06:21:50', '2024-05-13 06:21:50'),
(42, 2, 32, 'cash', 50000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 06:23:18', '2024-05-13 06:23:18'),
(43, 2, 33, 'cash', 50000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 06:30:58', '2024-05-13 06:30:58'),
(44, 2, 34, 'cash', 50000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 06:31:41', '2024-05-13 06:31:41'),
(45, 2, 35, 'cash', 50000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 06:34:35', '2024-05-13 06:34:35'),
(46, 2, 36, 'cash', 50000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 06:35:51', '2024-05-13 06:35:51'),
(47, 2, 37, 'cash', 50000.00, NULL, NULL, NULL, NULL, 0, 1, '2024-05-13 06:36:54', '2024-05-13 06:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `budget` decimal(15,2) NOT NULL,
  `land_area` int(11) NOT NULL,
  `front_road` varchar(100) DEFAULT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `floor` varchar(200) NOT NULL,
  `comm_space_size` varchar(255) DEFAULT NULL,
  `num_of_basement` varchar(255) DEFAULT NULL,
  `flat` int(11) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `zipCode` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `active_status` int(11) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectName`, `budget`, `land_area`, `front_road`, `property_type`, `floor`, `comm_space_size`, `num_of_basement`, `flat`, `duration`, `start_date`, `end_date`, `address`, `city`, `district_id`, `zipCode`, `image`, `status`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Coder De Dhaka', 150000000.00, 30000, '200 feet', NULL, '10', '200-400', '05', 40, '25000', '2024-05-05', '2024-08-01', 'Scaton', 'dhaka', 18, 1205, 'Project_1714800939-2922552038.jpg', 0, 0, NULL, NULL, NULL, NULL, '2024-05-03 23:35:39', '2024-05-04 06:38:16', NULL),
(2, 'Rupa City Dhaka', 150000000.00, 30000, '200 feet', NULL, 'Ground Floor', '200-400', '05', 40, '24', '2024-05-04', '2024-05-05', 'Scaton, dhaka', 'dhaka', 13, 1205, 'Project_1714826542-4992575771.jpg', 0, 0, NULL, NULL, NULL, NULL, '2024-05-04 06:42:22', '2024-05-04 06:42:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `memo_no` varchar(255) NOT NULL,
  `invoice_no` int(20) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `service_charge` decimal(15,2) NOT NULL,
  `shipping_charge` decimal(15,2) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `payable_amount` decimal(15,2) NOT NULL,
  `paid` decimal(15,2) NOT NULL,
  `due` decimal(15,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `project_id`, `vendor_id`, `memo_no`, `invoice_no`, `date`, `name`, `price`, `quantity`, `unit`, `total_price`, `total`, `service_charge`, `shipping_charge`, `total_amount`, `discount`, `payable_amount`, `paid`, `due`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '652', 5001, '2024-05-16', '\"[\\\"Phone\\\",\\\"TV\\\"]\"', '\"[\\\"156000\\\",\\\"100000\\\"]\"', '\"[\\\"5\\\",\\\"1\\\"]\"', '\"[\\\"pc\\\",\\\"pc\\\"]\"', '\"[\\\"780000\\\",\\\"100000\\\"]\"', 880000.00, 200.00, 400.00, 880600.00, 500.00, 880100.00, 880000.00, 100.00, 1, NULL, NULL, '2024-05-04 04:00:28', '2024-05-13 01:54:36', NULL),
(2, 1, 1, '652', 5002, '2024-05-08', '\"[\\\"Phone\\\"]\"', '\"[\\\"50\\\"]\"', '\"[\\\"10\\\"]\"', '\"[\\\"pc\\\"]\"', '\"[\\\"500\\\"]\"', 500.00, 10.00, 10.00, 520.00, 10.00, 510.00, 510.00, 0.00, 1, NULL, NULL, '2024-05-07 23:16:53', '2024-05-12 23:51:43', NULL),
(5, 1, 1, '652', 1005003, '2024-05-08', '\"[\\\"Phone\\\",\\\"RC\\\"]\"', '\"[\\\"145897\\\",\\\"125\\\"]\"', '\"[\\\"5\\\",\\\"10\\\"]\"', '\"[\\\"pc\\\",\\\"pc\\\"]\"', '\"[\\\"729485\\\",\\\"1250\\\"]\"', 730735.00, 0.00, 0.00, 730735.00, 0.00, 730735.00, 730735.00, 0.00, 1, NULL, NULL, '2024-05-08 04:24:57', '2024-05-12 23:20:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_due_pays`
--

CREATE TABLE `purchase_due_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` bigint(20) NOT NULL,
  `Return_invoice_no` bigint(20) DEFAULT NULL,
  `due` decimal(15,2) DEFAULT NULL,
  `pay` decimal(15,2) DEFAULT NULL,
  `created_by` bigint(15) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_due_pays`
--

INSERT INTO `purchase_due_pays` (`id`, `date`, `purchase_id`, `invoice_no`, `Return_invoice_no`, `due`, `pay`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2024-05-13', 5, 1005003, NULL, 627659.00, 51254.00, 1, '2024-05-12 05:16:47', '2024-05-12 05:16:47'),
(2, '2024-05-13', 5, 1005003, NULL, 627659.00, 51254.00, 1, '2024-05-12 05:38:46', '2024-05-12 05:38:46'),
(3, '2024-05-13', 5, 1005003, NULL, 627659.00, 51254.00, 1, '2024-05-12 05:39:35', '2024-05-12 05:39:35'),
(4, '2024-05-13', 5, 1005003, NULL, 627659.00, 51254.00, 1, '2024-05-12 05:39:49', '2024-05-12 05:39:49'),
(13, '2024-05-13', 5, 1005003, NULL, 735.00, 730000.00, 1, '2024-05-12 06:47:30', '2024-05-12 06:47:30'),
(14, '2024-05-13', 5, 1005003, NULL, 35.00, 700.00, 1, '2024-05-12 07:23:41', '2024-05-12 07:23:41'),
(15, '2024-05-13', 5, 1005003, NULL, 0.00, 35.00, 1, '2024-05-12 23:20:59', '2024-05-12 23:20:59'),
(16, '2024-05-14', 2, 5002, NULL, 0.00, 10.00, 1, '2024-05-12 23:51:43', '2024-05-12 23:51:43'),
(17, '2024-05-13', 1, 5001, NULL, 100.00, 100000.00, 1, '2024-05-13 01:54:36', '2024-05-13 01:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `return_purchases`
--

CREATE TABLE `return_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `memo_no` varchar(255) NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `paid` decimal(15,2) NOT NULL,
  `due` decimal(15,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_purchases`
--

INSERT INTO `return_purchases` (`id`, `project_id`, `vendor_id`, `memo_no`, `purchase_id`, `invoice_no`, `date`, `name`, `price`, `quantity`, `unit`, `total_price`, `total`, `paid`, `due`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '652', 5, 1, '2024-05-08', '\"[\\\"Phone\\\"]\"', '\"[\\\"45687\\\"]\"', '\"[\\\"5\\\"]\"', '\"[\\\"pc\\\"]\"', '\"[\\\"228435\\\"]\"', 228435.00, 0.00, 228435.00, 0, 1, NULL, NULL, '2024-05-08 06:30:10', '2024-05-08 06:30:10'),
(2, 1, 1, '652', 2, 10002, '2024-05-08', '\"[\\\"Phone\\\"]\"', '\"[\\\"4422\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"pc\\\"]\"', '\"[\\\"4422\\\"]\"', 4422.00, 0.00, 4422.00, 0, 1, NULL, NULL, '2024-05-08 06:47:53', '2024-05-08 06:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `return_purchase_balances`
--

CREATE TABLE `return_purchase_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `balance` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_no` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  `income_expense_head_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_cash_id` bigint(20) UNSIGNED DEFAULT NULL,
  `voucher_type` varchar(255) NOT NULL,
  `voucher_date` date NOT NULL,
  `dr` bigint(20) DEFAULT NULL,
  `cr` bigint(20) DEFAULT NULL,
  `particulars` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `image`, `role_id`, `designation`, `active_status`, `status`, `created_by`, `updated_by`, `deleted_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test User', '01774581265', 'test@example.com', '2024-05-03 23:27:42', '$2y$12$KgpYztb6/rCjwFn72QP2YuBsWm0FckMu3zYWQ.MYUw8Ow28BIQ2E.', NULL, NULL, 'Manager', 0, 0, NULL, NULL, NULL, 'dWm9VKIRRzP9pzbTBlxeIrXgWkl0wFYtmz27HckW9yFeStpnADCM7a2gUyQ5', '2024-05-03 23:27:42', '2024-05-03 23:27:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `active_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `phone`, `address`, `active_status`, `status`, `created_by`, `updated_by`, `deleted_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rakib', '01745812365', 'Scaton', 'inactive', '0', NULL, NULL, NULL, NULL, '2024-05-03 23:55:39', '2024-05-03 23:55:39'),
(2, 'Rahat', '01745123115', 'Scaton, dhaka', 'inactive', '0', NULL, NULL, NULL, NULL, '2024-05-03 23:55:58', '2024-05-03 23:55:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_nid_unique` (`nid`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_nid_unique` (`nid`),
  ADD UNIQUE KEY `clients_tin_unique` (`tin`);

--
-- Indexes for table `client_addresses`
--
ALTER TABLE `client_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compony_infos`
--
ALTER TABLE `compony_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_nid_unique` (`nid`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_phone_unique` (`phone`),
  ADD UNIQUE KEY `employees_nid_unique` (`nid`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `employee_addresses`
--
ALTER TABLE `employee_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expense_categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flat_return_infos`
--
ALTER TABLE `flat_return_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flat_sale_infos`
--
ALTER TABLE `flat_sale_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investors`
--
ALTER TABLE `investors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `investors_phone_unique` (`phone`),
  ADD UNIQUE KEY `investors_email_unique` (`email`);

--
-- Indexes for table `invest_installments`
--
ALTER TABLE `invest_installments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_due_pays`
--
ALTER TABLE `purchase_due_pays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_due_pays_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `return_purchases`
--
ALTER TABLE `return_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_purchase_balances`
--
ALTER TABLE `return_purchase_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_addresses`
--
ALTER TABLE `client_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `compony_infos`
--
ALTER TABLE `compony_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_addresses`
--
ALTER TABLE `employee_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flats`
--
ALTER TABLE `flats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `flat_return_infos`
--
ALTER TABLE `flat_return_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flat_sale_infos`
--
ALTER TABLE `flat_sale_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `investors`
--
ALTER TABLE `investors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invest_installments`
--
ALTER TABLE `invest_installments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_due_pays`
--
ALTER TABLE `purchase_due_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `return_purchases`
--
ALTER TABLE `return_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `return_purchase_balances`
--
ALTER TABLE `return_purchase_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_due_pays`
--
ALTER TABLE `purchase_due_pays`
  ADD CONSTRAINT `purchase_due_pays_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;