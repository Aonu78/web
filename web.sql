-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 10:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `name`, `bank`, `active`, `image`, `created_at`, `updated_at`) VALUES
(1, 'HBL Platinum CreditCard', 'HBL', 'Y', 'images/card/1680258402.jpg', '2023-03-29 16:24:33', '2023-03-31 05:26:42'),
(2, 'HBL World Elite DebitCard', 'HBL', 'Y', 'images/card/1680382332.jpg', '2023-03-29 16:26:59', '2023-04-01 15:52:13'),
(3, 'HBL World DebitCard', 'HBL', 'Y', 'images/card/1680382363.png', '2023-03-29 16:31:57', '2023-04-01 15:52:43'),
(4, 'HBL Gold CreditCard', 'HBL', 'Y', 'images/card/1680382392.jpg', '2023-03-29 16:33:08', '2023-04-01 15:53:12'),
(5, 'HBL Gold DebitCard', 'HBL', 'Y', 'images/card/1680382506.jpg', '2023-03-29 16:39:20', '2023-04-01 15:55:06'),
(6, 'HBL Green CreditCard', 'HBL', 'Y', 'images/card/1680382544.jpg', '2023-03-29 16:42:10', '2023-04-01 15:55:44'),
(7, 'HBL Titanium DebitCard', 'HBL', 'Y', 'images/card/1680382580.jpg', '2023-03-29 16:46:48', '2023-04-01 15:56:20'),
(8, 'HBL DebitCard', 'HBL', 'Y', 'images/card/1680382600.jpg', '2023-03-29 16:47:24', '2023-04-01 15:56:41'),
(9, 'HBL Konnect Debit Card', 'HBL', 'Y', 'images/card/1680382624.png', '2023-03-29 16:48:59', '2023-04-01 15:57:04'),
(10, 'QR - Scan to Pay', 'HBL', 'Y', 'images/card/1680382646.jpg', '2023-03-29 16:50:05', '2023-04-01 15:57:26'),
(11, 'HBL Nisa DebitCard', 'HBL', 'Y', 'images/card/1680382672.jpg', '2023-03-29 16:51:26', '2023-04-01 15:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `active`, `created_at`, `updated_at`) VALUES
(5, 'All Categories', NULL, 'Y', '2023-03-28 21:56:07', '2023-03-28 21:56:07'),
(6, 'Women’s Day Offers', 'public/categories/BmScquNRKI6iUtsFI206t8z9IOvO0bq43VEfKa9y.png', 'Y', '2023-03-28 21:56:30', '2023-03-28 21:56:30'),
(7, 'Dining', NULL, 'Y', '2023-03-28 21:56:48', '2023-03-28 21:56:48'),
(8, 'Health & Fitness', NULL, 'Y', '2023-03-28 21:57:12', '2023-03-28 21:57:12'),
(9, 'Clothing & Footwear', NULL, 'Y', '2023-03-28 21:57:43', '2023-03-28 21:57:43'),
(10, 'Home Decor', NULL, 'Y', '2023-03-28 21:57:59', '2023-03-28 21:57:59'),
(11, 'Entertainment', NULL, 'Y', '2023-03-28 21:58:12', '2023-03-28 21:58:12'),
(12, 'Beauty & Personal Care', NULL, 'Y', '2023-03-28 21:58:26', '2023-03-28 21:58:26'),
(13, 'e-Stores', NULL, 'Y', '2023-03-28 21:58:40', '2023-03-28 21:58:40'),
(14, 'Miscellaneous', NULL, 'Y', '2023-03-28 21:58:52', '2023-03-28 21:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `position` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country`, `image_path`, `position`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Abbottabad', 'Pakistan', 'images/othercities/1680543003.jpg?v=642b0d1bae439', NULL, NULL, NULL, 'Y'),
(2, 'Ahmed Pur East', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(3, 'Arifwala', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(4, 'Attock', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(5, 'Bahawalnagar', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(6, 'Bahawalpur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(7, 'Bannu', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(8, 'Batagram', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(9, 'Bhalwal', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(10, 'Bhera', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(11, 'Burewala', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(12, 'Chakwal', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(13, 'Charsadda', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(14, 'Chichawatni', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(15, 'Chiniot', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(16, 'Chishtian', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(17, 'Dadu', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(18, 'Dadyal', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(19, 'Daska', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(20, 'Depalpur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(21, 'Dera Ghazi Khan', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(22, 'Dera Ismail Khan', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(23, 'Digri', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(24, 'Dina', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(25, 'Dinga', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(26, 'Dunyapur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(27, 'Faisalabad', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(28, 'Fatehpur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(29, 'Fort Abbas', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(30, 'Gaggoo Mandi', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(31, 'Ghotki', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(32, 'Gilgit', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(33, 'Gojra', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(34, 'Gujar Khan', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(35, 'Gujranwala', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(36, 'Gujrat', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(37, 'Gwadar', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(38, 'Hafizabad', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(39, 'Haripur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(40, 'Haroonabad', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(41, 'Hasilpur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(42, 'Hassan Abdal', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(43, 'Havelian', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(44, 'Hunza', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(45, 'Hyderabad', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(46, 'Jacobabad', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(47, 'Jalalpur Jattan', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(48, 'Jampur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(49, 'Jaranwala', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(50, 'Jhang', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(51, 'Jhelum', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(52, 'Kabirwala', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(53, 'Kahror Pakka', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(54, 'Kahuta', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(55, 'Kamalia', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(56, 'Kamoki', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(57, 'Karak', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(58, 'Kasur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(59, 'Khairpur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(60, 'Khan Bela', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(61, 'Khanewal', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(62, 'Khanpur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(63, 'Kharian', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(64, 'Khushab', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(65, 'Kohat', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(66, 'Kot Addu', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(67, 'Kot Radha Kishan', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(68, 'Kotli', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(69, 'Kunri', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(70, 'Lalamusa', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(71, 'Larkana', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(72, 'Lasbela', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(73, 'Layyah', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(74, 'Liaquatpur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(75, 'Lodhran', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(76, 'Mailsi', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(77, 'Mandi Bahauddin', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(78, 'Mansehra', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(79, 'Mardan', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(80, 'Mehar', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(82, 'Mian Channu', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(83, 'Mianwali', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(84, 'Mirpur Azad Kashmir', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(85, 'Mirpurkhas', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(86, 'Moro', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(87, 'Muridkay', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(88, 'Muridke', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(89, 'Murree', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(90, 'Muslim Bagh', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(91, 'Muzaffarabad', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(92, 'Muzaffargarh', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(93, 'Narowal', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(94, 'Nawabshah', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(95, 'Nowshera', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(96, 'Okara', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(97, 'Pabbi', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(98, 'Pakpattan', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(99, 'Pattoki', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(100, 'Phalia', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(101, 'Pir Mahal', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(102, 'Pishin', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(103, 'Qalanderabad', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(104, 'Quetta', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(105, 'Rahimyar Khan', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(106, 'Raiwind', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(107, 'Rajanpur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(108, 'Rashidabad', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(109, 'Rawalakot', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(110, 'Rawat', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(111, 'Sadiqabad', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(112, 'Sahiwal', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(113, 'Sakrand', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(114, 'Samundri', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(115, 'Sanghar', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(116, 'Sarai Alamgir', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(117, 'Sargodha', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(118, 'Shahdadpur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(119, 'Shakar Garh', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(120, 'Sheikhupura', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(121, 'Shikarpur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(122, 'Sialkot', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(123, 'Sukkur', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(124, 'Swabi', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(125, 'Swari', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(126, 'Swat', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(127, 'Tando Adam', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(128, 'Tando Allahyar', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(129, 'Tando Muhammad Khan', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(130, 'Tarlai', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(131, 'Taunsa', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(132, 'Taxila', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(133, 'Timergara', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(134, 'Toba Tek Singh', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(135, 'Umerkot', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(136, 'Vehari', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(137, 'Wah', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(138, 'Wah Cantt', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(139, 'Wazirabad', 'Pakistan', NULL, NULL, NULL, NULL, 'Y'),
(159, 'TESTING', 'world', 'images/othercities/1680551397.png', NULL, NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `country`, `image`, `position`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Abbottabad', 'Pakistan', 'cities/wjkLfIyJTW6oZ0eSzcjoUKOtRulXSQlsuHdPLmna.jpg', 1, '2023-03-28 05:06:56', '2023-04-03 12:26:17', 'Y'),
(2, 'Lahore', 'Pakistan', 'cities/Re8G6n8qXqJcDeR3GRNmoqkCJThv5al902mqK8Br.jpg', 2, '2023-03-28 05:09:19', '2023-03-28 05:09:19', 'Y'),
(3, 'Islamabad', 'Pakistan', 'cities/GlGCRp1iAXx721i4Do8BCzfHFZc0yXcb0ikEmXXn.jpg', 3, '2023-03-28 05:16:37', '2023-03-28 05:16:37', 'Y'),
(4, 'Rawalpindi', 'Pakistan', 'cities/ym89FkscnnMgmGElGErEZStLWFv1SioUvCkET8sr.jpg', 4, '2023-03-28 05:18:16', '2023-03-28 05:18:16', 'Y'),
(5, 'Peshawar', 'Pakistan', 'cities/JHpkGgNOXOcNC518sYCw3ZN1gKLVbhsKCZqXOmPf.jpg', 6, '2023-03-28 05:52:38', '2023-03-28 05:52:38', 'Y'),
(6, 'Multan', 'Pakistan', 'cities/ZAP60YECZ6CNyp3r9oPf61B6zTd04vd9RWDmK9pS.jpg', 5, '2023-03-28 06:30:09', '2023-03-28 06:30:09', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `discountcards`
--

CREATE TABLE `discountcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `hblcards`
--

CREATE TABLE `hblcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `branch` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `bg_image` varchar(255) DEFAULT NULL,
  `card_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`card_id`)),
  `category_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`category_id`)),
  `number` varchar(255) DEFAULT NULL,
  `percentage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`percentage`)),
  `active` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`active`)),
  `monday_open` time NOT NULL,
  `monday_close` time NOT NULL,
  `tuesday_open` time NOT NULL,
  `tuesday_close` time NOT NULL,
  `wednesday_open` time NOT NULL,
  `wednesday_close` time NOT NULL,
  `thursday_open` time NOT NULL,
  `thursday_close` time NOT NULL,
  `friday_open` time NOT NULL,
  `friday_close` time NOT NULL,
  `saturday_open` time NOT NULL,
  `saturday_close` time NOT NULL,
  `sunday_open` time NOT NULL,
  `sunday_close` time NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2023_03_28_075053_create_city_table', 1),
(6, '2023_03_28_083357_add_image_to_city_table', 1),
(7, '2023_03_28_115121_create_cities_table', 2),
(8, '2023_03_29_093650_create_cards_table', 3),
(9, '2023_03_29_111033_create_dicountcards_table', 4),
(10, '2023_03_29_210005_create_cards_table', 5),
(13, '2023_03_30_141411_create_places_table', 6),
(14, '2023_03_30_154412_add_phone_number_to_places_table', 7),
(15, '2023_03_30_155316_create_newplaces_table', 8),
(16, '2023_03_30_160510_create_location_table', 9),
(17, '2023_03_30_162424_create_valos_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `newplaces`
--

CREATE TABLE `newplaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `branch` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `bg_image` varchar(255) DEFAULT NULL,
  `card_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`card_id`)),
  `category_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`category_id`)),
  `number` varchar(255) DEFAULT NULL,
  `percentage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`percentage`)),
  `active` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`active`)),
  `monday_open` time NOT NULL,
  `monday_close` time NOT NULL,
  `tuesday_open` time NOT NULL,
  `tuesday_close` time NOT NULL,
  `wednesday_open` time NOT NULL,
  `wednesday_close` time NOT NULL,
  `thursday_open` time NOT NULL,
  `thursday_close` time NOT NULL,
  `friday_open` time NOT NULL,
  `friday_close` time NOT NULL,
  `saturday_open` time NOT NULL,
  `saturday_close` time NOT NULL,
  `sunday_open` time NOT NULL,
  `sunday_close` time NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `placemaster`
--

CREATE TABLE `placemaster` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `card_id` int(11) DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `terms_and_conditions` text DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  `city_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placemaster`
--

INSERT INTO `placemaster` (`id`, `name`, `branch`, `card_id`, `percentage`, `category_id`, `terms_and_conditions`, `active`, `city_id`, `created_at`, `updated_at`, `city`) VALUES
(2, 'Domino\'s Pizza Pakistan', 'Gulshan-e-Iqbal Karachi Branch', 1, '40.00', 8, 'Discount will be applicable on ala Carte/main menu.\r\nThe discounts are not valid in conjunction with other special promotions, discount programmes or vouchers defined by HBL or alliance partners\r\nThe discounts cannot be combined with group discounts, parties, special events or any other offers\r\nHBL Cardmembers are entitled to discounts in respect to payments made at the alliance partners through their HBL Cards. This is not applicable in respect to cash transactions.\r\nHBL will not be responsible for any complaint or liability whatsoever that arises with respect to items and services availed on the mentioned partners.\r\nHBL reserves the right to terminate or withdraw or change the criteria of any discount offering without providing prior notice or reason.\r\nHBL is not liable for the accuracy of the brand offers mentioned under alliances. For updated brand offers, please refer to the relevant alliance partner’s website or physical outlet.', 'N', 38, '2023-03-31 11:35:14', '2023-04-03 08:04:59', 'karachi'),
(4, 'Anas Mehmood', 'Khayaban-e-Ittehad Karachi Branch', 2, '30.00', 7, 'testing', 'Y', NULL, '2023-04-01 07:31:05', '2023-04-01 07:31:05', 'Bahawalpur'),
(5, 'Anas Mehmood', 'Khayaban-e-Ittehad Karachi Branch', 2, '30.00', 7, 'testing', 'N', NULL, '2023-04-01 09:03:08', '2023-04-03 08:48:41', 'Bahawalpur');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `branch` varchar(255) NOT NULL,
  `icon` mediumtext DEFAULT NULL,
  `bg_image` mediumtext DEFAULT NULL,
  `card_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`card_id`)),
  `category_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`category_id`)),
  `number` varchar(255) DEFAULT NULL,
  `percentage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`percentage`)),
  `active` enum('Y','N') DEFAULT 'Y',
  `monday_open` time NOT NULL,
  `monday_close` time NOT NULL,
  `tuesday_open` time NOT NULL,
  `tuesday_close` time NOT NULL,
  `wednesday_open` time NOT NULL,
  `wednesday_close` time NOT NULL,
  `thursday_open` time NOT NULL,
  `thursday_close` time NOT NULL,
  `friday_open` time NOT NULL,
  `friday_close` time NOT NULL,
  `saturday_open` time NOT NULL,
  `saturday_close` time NOT NULL,
  `sunday_open` time NOT NULL,
  `sunday_close` time NOT NULL,
  `latitude` float DEFAULT 0,
  `longitude` float DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `_token` varchar(2555) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `terms_and_conditions` mediumtext DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `place_active` enum('Y','N') DEFAULT 'Y',
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `description`, `branch`, `icon`, `bg_image`, `card_id`, `category_id`, `number`, `percentage`, `active`, `monday_open`, `monday_close`, `tuesday_open`, `tuesday_close`, `wednesday_open`, `wednesday_close`, `thursday_open`, `thursday_close`, `friday_open`, `friday_close`, `saturday_open`, `saturday_close`, `sunday_open`, `sunday_close`, `latitude`, `longitude`, `created_at`, `updated_at`, `phone_number`, `_token`, `address`, `terms_and_conditions`, `city_id`, `place_active`, `city`) VALUES
(2, 'Domino\'s Pizza Pakistan', 'Great time begins with Domino\'s.', 'Gulshan-e-Iqbal Karachi Branch', 'public/images/rJrjYh84OkWWZbtBa6YnfjE9B762xuFRFVvTF1ko.png', 'public/images/sOrFs6nmDhCO9xNjJpAdVe9o6stkcvJTUSbG52ad.jpg', '1', '8', '111366466', '40', 'N', '04:34:00', '16:34:00', '09:34:00', '16:34:00', '04:34:00', '16:34:00', '04:34:00', '16:34:00', '08:34:00', '16:34:00', '04:34:00', '16:34:00', '04:34:00', '16:34:00', 0, 0, NULL, NULL, '0345', NULL, 'Master Square, Plot No B-29, University Road, Block 13A, Gulshan-e-Iqbal, Karachi - Pakistan', 'Discount will be applicable on ala Carte/main menu.\r\nThe discounts are not valid in conjunction with other special promotions, discount programmes or vouchers defined by HBL or alliance partners\r\nThe discounts cannot be combined with group discounts, parties, special events or any other offers\r\nHBL Cardmembers are entitled to discounts in respect to payments made at the alliance partners through their HBL Cards. This is not applicable in respect to cash transactions.\r\nHBL will not be responsible for any complaint or liability whatsoever that arises with respect to items and services availed on the mentioned partners.\r\nHBL reserves the right to terminate or withdraw or change the criteria of any discount offering without providing prior notice or reason.\r\nHBL is not liable for the accuracy of the brand offers mentioned under alliances. For updated brand offers, please refer to the relevant alliance partner’s website or physical outlet.', 139, 'Y', 'karachi'),
(5, 'Anas Mehmood', 'Testing', 'Khayaban-e-Ittehad Karachi Branch', 'public/images/ge1WZ0zpzL4BhEpFQuJ0yc9jOpehpAbiayYotNTa.png', 'public/images/sX0TIOJYRWARcJ8wApienejybXK6ELogdsAjlCoh.jpg', '2', '7', '03127191469', '30', 'N', '00:30:00', '12:30:00', '00:30:00', '12:30:00', '00:30:00', '12:30:00', '00:30:00', '12:30:00', '00:30:00', '12:30:00', '00:30:00', '12:30:00', '00:30:00', '12:30:00', 0, 0, NULL, NULL, NULL, NULL, 'Bahawalpur', 'testing', 5, 'Y', 'Bahawalpur');
INSERT INTO `places` (`id`, `name`, `description`, `branch`, `icon`, `bg_image`, `card_id`, `category_id`, `number`, `percentage`, `active`, `monday_open`, `monday_close`, `tuesday_open`, `tuesday_close`, `wednesday_open`, `wednesday_close`, `thursday_open`, `thursday_close`, `friday_open`, `friday_close`, `saturday_open`, `saturday_close`, `sunday_open`, `sunday_close`, `latitude`, `longitude`, `created_at`, `updated_at`, `phone_number`, `_token`, `address`, `terms_and_conditions`, `city_id`, `place_active`, `city`) VALUES
(6, 'TESTING', 'Testing', 'testing', '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Lg+cOM6o1bUtLZnDE+zNCxsPj07RGY0nW27Z/q/Warldesm/KgBgYcYYcIMzavWBc+czhycUj8922FU8Pjs5Jqa8utZJVO1X5cdtl4pr4G8Grs3hPgszxiAzLMhsCAC8Vnro/ccf27L6qfLq2mN1dR06fZwybEnWOJVc/v7R8iadrjApUSWXHziHeKfPqNVNra3ZiQlxEkmvK1Eye4ZDs95UyMuHy1Jjh7wwZ3ZB2ujSS1VNmrY4ZZgtUt4bW3PCus/27Xl2lQTlowWAH4I48lOScbuQ4ihtbln98SfFBbPyU5J7j1VrtS99tsfWVdg6hp0ocQDA4cvVq6flF6aN7k12cPM7vamQJp1uzFslJbNnzB831pajAQCd0bj9VMUbx0+69FRtg8vqafnOm/mJB3qubJxEMjEmGgDaDXpcNMKHFMTGKMRBgfksn/BAi4PgnAfOICW4DxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwELEQcBCxEHAQsRBwHL/wEJEDtRcc/kjQAAAABJRU5ErkJggg==', '/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABGAAD/4QMvaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0MiA3OS4xNjA5MjQsIDIwMTcvMDcvMTMtMDE6MDY6MzkgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE4IChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCNjkyODIwQUEyRkExMUVEQkE5OUEwRUQ2RTg2MTdGQyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCNjkyODIwQkEyRkExMUVEQkE5OUEwRUQ2RTg2MTdGQyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkI2OTI4MjA4QTJGQTExRURCQTk5QTBFRDZFODYxN0ZDIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkI2OTI4MjA5QTJGQTExRURCQTk5QTBFRDZFODYxN0ZDIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABAMDAwMDBAMDBAYEAwQG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', '4', '11', '1234567', '50', 'N', '01:59:00', '13:59:00', '01:59:00', '13:59:00', '01:59:00', '13:59:00', '01:59:00', '13:59:00', '02:01:00', '14:01:00', '02:01:00', '14:01:00', '02:01:00', '14:02:00', 0, 0, NULL, NULL, NULL, NULL, 'Lahore', 'HELLO', 140, 'N', 'Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `Created_By` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `type`, `Created_By`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', '$2y$10$eReeq4hOuvvPVJXWLEmwAOttwKIKNs7iPWEg9YXuP24XsSNO3pcDa', 'admin', 'admin', 'admin', '2023-03-28 05:06:10', '2023-03-28 05:06:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `valos`
--

CREATE TABLE `valos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `branch` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `bg_image` varchar(255) DEFAULT NULL,
  `card_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`card_id`)),
  `category_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`category_id`)),
  `number` varchar(255) DEFAULT NULL,
  `percentage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`percentage`)),
  `active` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`active`)),
  `monday_open` time NOT NULL,
  `monday_close` time NOT NULL,
  `tuesday_open` time NOT NULL,
  `tuesday_close` time NOT NULL,
  `wednesday_open` time NOT NULL,
  `wednesday_close` time NOT NULL,
  `thursday_open` time NOT NULL,
  `thursday_close` time NOT NULL,
  `friday_open` time NOT NULL,
  `friday_close` time NOT NULL,
  `saturday_open` time NOT NULL,
  `saturday_close` time NOT NULL,
  `sunday_open` time NOT NULL,
  `sunday_close` time NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discountcards`
--
ALTER TABLE `discountcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hblcards`
--
ALTER TABLE `hblcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newplaces`
--
ALTER TABLE `newplaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `placemaster`
--
ALTER TABLE `placemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valos`
--
ALTER TABLE `valos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discountcards`
--
ALTER TABLE `discountcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hblcards`
--
ALTER TABLE `hblcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `newplaces`
--
ALTER TABLE `newplaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placemaster`
--
ALTER TABLE `placemaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `valos`
--
ALTER TABLE `valos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
