-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2022 at 05:55 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel8commercedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `members` text COLLATE utf8_unicode_ci,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_client_id_foreign` (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_cat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `image_cat`) VALUES
(1, 'Closure Hair', 'closure-hair', '2022-11-11 06:58:45', '2022-11-12 20:50:18', '1668311418.jpg'),
(2, 'Wefted Hair', 'wefted-hair', '2022-11-11 06:59:09', '2022-11-12 20:50:29', '1668311429.jpg'),
(3, 'Wig Hair', 'wig-hair', '2022-11-11 06:59:24', '2022-11-12 20:50:46', '1668311446.jpg'),
(4, 'Frontal Hair', 'frontal-hair', '2022-11-11 06:59:58', '2022-11-12 20:51:04', '1668311464.jpg'),
(5, 'Blend Hair', 'blend-hair', '2022-11-12 20:26:09', '2022-11-12 20:51:16', '1668311476.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `color_rang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_rang`, `created_at`, `updated_at`) VALUES
(1, 'Natural Brown\r\n', '2022-10-19 04:10:48', '2022-10-19 04:10:48'),
(2, 'Natural Black', '2022-10-19 04:11:06', '2022-10-19 04:11:06'),
(3, 'Jet Black', '2022-10-19 04:11:36', '2022-10-19 04:11:36'),
(4, 'Natural grey', '2022-10-19 04:11:51', '2022-10-19 04:11:51'),
(5, 'Brown', '2022-10-19 04:12:04', '2022-10-19 04:12:04'),
(6, 'Ombre	', '2022-10-19 04:09:17', '2022-10-19 04:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `product_slug`, `comment`, `created_at`, `updated_at`) VALUES
(7, 'Admin', 'closure23', 'wow rreally nice', '2022-10-28 07:44:03', '2022-10-28 07:44:03'),
(6, 'Admin', '121', 'lol', '2022-10-28 02:16:28', '2022-10-28 02:16:28'),
(12, 'Admin', 'closuer-12', 'jgkk', '2022-11-14 20:13:44', '2022-11-14 20:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'kimhong', 'admin@gmail.com', 's.kfnla', '2022-10-23 07:23:50', '2022-10-23 07:23:50'),
(2, 'Admin', 'kimhong@gmail.com', 'sfafe', '2022-10-23 07:26:55', '2022-10-23 07:26:55'),
(3, 'kimhong', 'saovty@gmail.com', 'sfa;fj', '2022-10-23 07:42:47', '2022-10-23 07:42:47'),
(4, 'kimhong', 'admin@gmail.com', 'kakakakaeh', '2022-10-23 08:25:30', '2022-10-23 08:25:30'),
(5, 'kimhong', 'kimhong@gmail.com', 'lnlwnld', '2022-10-23 08:26:14', '2022-10-23 08:26:14'),
(6, 'kim', 'admin@gmail.com', 'sfafkns;lfa', '2022-10-23 08:28:00', '2022-10-23 08:28:00'),
(7, 'kimhong', 'admin@gmail.com', 'we are love ur hair', '2022-10-23 08:35:48', '2022-10-23 08:35:48'),
(8, 'kim', 'kimhong@gmail.com', 'we are love ur hari', '2022-10-23 08:36:22', '2022-10-23 08:36:22'),
(9, 'Admin', 'kimhong@gmail.com', 'we are love allm ur hair', '2022-10-23 08:36:45', '2022-10-23 08:36:45'),
(10, 'Closure', 'kimhong@gmail.com', 'ksnflanlf', '2022-10-23 09:19:43', '2022-10-23 09:19:43'),
(11, 'frontal 123', 'kim@gmail.com', 'smfnlas;fm;a', '2022-10-23 09:23:50', '2022-10-23 09:23:50'),
(12, 'Closure', 'kimhong@gmail.com', '.i love u', '2022-10-23 09:28:01', '2022-10-23 09:28:01'),
(13, 'Closure hair', 'kim@gmail.com', 's;lfmna;', '2022-10-23 09:29:12', '2022-10-23 09:29:12'),
(14, 'Closure', 'kimhong@gmail.com', 'sfagae3q', '2022-10-23 09:33:18', '2022-10-23 09:33:18'),
(15, 'dh', 'admin@gmail.com', 'shnnhm', '2022-10-31 01:17:58', '2022-10-31 01:17:58'),
(16, 'kim', 'admin@gmail.com', ',kfndalfa', '2022-11-14 20:34:21', '2022-11-14 20:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
CREATE TABLE IF NOT EXISTS `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conversations_sender_id_foreign` (`sender_id`),
  KEY `conversations_receiver_id_foreign` (`receiver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `sender_id`, `receiver_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2022-10-20 21:11:05', '2022-10-20 21:11:05'),
(2, 1, 6, '2022-10-20 21:11:09', '2022-10-20 21:11:09'),
(3, 1, 3, '2022-10-20 21:11:13', '2022-10-20 21:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_slides`
--

DROP TABLE IF EXISTS `feedback_slides`;
CREATE TABLE IF NOT EXISTS `feedback_slides` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback_slides`
--

INSERT INTO `feedback_slides` (`id`, `title`, `slider_image`, `created_at`, `updated_at`) VALUES
(1, 'Closure hair', '1666923387.jpg', '2022-10-27 19:16:27', '2022-10-27 19:16:27'),
(2, 'new tiltle', '1666927919.jpg', '2022-10-27 19:55:57', '2022-10-27 20:31:59'),
(3, 'new tile 2', '1666928001.jpg', '2022-10-27 20:01:28', '2022-10-27 20:33:21'),
(4, '', '1666928025.jpg', '2022-10-27 20:33:45', '2022-10-27 20:33:45'),
(5, 'f1', '1666928495.jpg', '2022-10-27 20:41:35', '2022-10-27 20:41:35'),
(6, 'f3', '1666928559.jpg', '2022-10-27 20:42:39', '2022-10-27 20:42:39'),
(8, 'kim', '1668480931.jpg', '2022-11-14 19:55:31', '2022-11-14 19:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

DROP TABLE IF EXISTS `home_sliders`;
CREATE TABLE IF NOT EXISTS `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `subtitle`, `price`, `link`, `slider_image`, `created_at`, `updated_at`) VALUES
(1, 'Curl is full bloom', 'Our C pattern the lush in spring', '30%', '/shop', '1666083737.png', '2022-10-18 02:02:17', '2022-10-18 02:02:17'),
(2, 'How do you like it ?', 'Our A pattern gives it to you  straight . No Chaser.', '30%', 'shop/category/closure', '1666084082.png', '2022-10-18 02:08:02', '2022-10-18 02:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `lenghts`
--

DROP TABLE IF EXISTS `lenghts`;
CREATE TABLE IF NOT EXISTS `lenghts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `values` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lenghts`
--

INSERT INTO `lenghts` (`id`, `values`, `created_at`, `updated_at`) VALUES
(9, 12, '2022-11-01 01:31:35', '2022-11-01 01:31:35'),
(1, 13, '2022-11-01 01:12:11', '2022-11-01 01:12:11'),
(2, 15, '2022-11-01 01:12:15', '2022-11-01 01:12:15'),
(3, 11, '2022-11-01 01:12:37', '2022-11-01 01:12:37'),
(4, 14, '2022-11-01 01:12:47', '2022-11-01 01:12:47'),
(10, 10, '2022-11-01 01:31:49', '2022-11-01 01:31:49'),
(13, 16, '2022-11-10 23:41:43', '2022-11-10 23:41:43'),
(14, 17, '2022-11-10 23:41:49', '2022-11-10 23:41:49'),
(15, 18, '2022-11-10 23:41:53', '2022-11-10 23:41:53'),
(16, 19, '2022-11-10 23:41:59', '2022-11-10 23:41:59'),
(17, 20, '2022-11-10 23:42:04', '2022-11-10 23:42:04'),
(18, 21, '2022-11-10 23:42:08', '2022-11-10 23:42:08'),
(19, 22, '2022-11-10 23:42:15', '2022-11-10 23:42:15'),
(20, 23, '2022-11-10 23:42:19', '2022-11-10 23:42:19'),
(21, 24, '2022-11-10 23:42:23', '2022-11-10 23:42:23'),
(22, 25, '2022-11-10 23:42:28', '2022-11-10 23:42:28'),
(23, 26, '2022-11-10 23:42:32', '2022-11-10 23:42:32'),
(24, 27, '2022-11-10 23:42:38', '2022-11-10 23:42:38'),
(25, 28, '2022-11-10 23:42:55', '2022-11-10 23:42:55'),
(26, 29, '2022-11-10 23:42:59', '2022-11-10 23:42:59'),
(27, 30, '2022-11-10 23:43:04', '2022-11-10 23:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_conversation_id_foreign` (`conversation_id`),
  KEY `messages_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'hello', '2022-10-20 21:11:36', '2022-10-20 21:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_000000_create_users_table', 3),
(42, '2014_10_12_100000_create_password_resets_table', 3),
(43, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
(44, '2019_08_19_000000_create_failed_jobs_table', 3),
(45, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(46, '2021_02_12_234230_create_clients_table', 3),
(47, '2021_02_12_234309_create_appointments_table', 3),
(48, '2021_03_28_143557_create_sessions_table', 3),
(49, '2021_03_29_100308_create_categories_table', 3),
(50, '2021_03_29_100458_create_products_table', 3),
(51, '2021_04_18_032704_add_avatar_field_to_users_table', 3),
(52, '2021_05_21_193445_add_role_field_to_users_table', 3),
(20, '2022_10_11_044953_create_producings_table', 2),
(21, '2022_10_11_045200_create_blend_hair_table', 2),
(22, '2022_10_11_045244_create_attributes_table', 2),
(23, '2022_10_11_050345_create_wefted_hair_table', 2),
(53, '2021_05_25_132044_create_home_sliders_table', 3),
(25, '2022_10_11_053730_create_frontal_hair_table', 2),
(26, '2022_10_11_065550_create_closure_hair_table', 2),
(27, '2022_10_11_070939_create_frontal_wig_table', 2),
(28, '2022_10_11_071226_create_wig_hair_table', 2),
(29, '2022_10_11_071842_create_closure_wig_table', 2),
(30, '2022_10_11_072033_create_fulllace_wig_table', 2),
(54, '2021_05_30_144459_create_orders_table', 3),
(55, '2021_05_30_144537_create_order_items_table', 3),
(56, '2021_05_30_144619_create_shippings_table', 3),
(57, '2021_05_30_144636_create_transactions_table', 3),
(58, '2021_06_02_031102_create_comments_table', 3),
(59, '2021_06_15_193656_add_members_field_to_appointments_table', 3),
(60, '2021_06_21_204523_add_color_field_to_appointments_table', 3),
(61, '2021_08_15_180854_add_order_position_to_appointments_table', 3),
(62, '2021_11_16_210207_create_conversations_table', 3),
(63, '2021_11_16_210218_create_messages_table', 3),
(64, '2022_10_11_044736_create_wigcaps_table', 3),
(65, '2022_10_11_052522_create_colors_table', 3),
(66, '2022_10_12_065650_create_settings_table', 3),
(72, '2022_10_18_140003_create_frontals_table', 4),
(73, '2022_10_18_140959_create_closures_table', 4),
(74, '2022_10_18_185052_create_patterns_table', 5),
(75, '2022_10_18_185132_reate_lenght_table', 5),
(76, '2022_10_18_191049_add_attributes_to_products_table', 6),
(77, '2022_10_19_040240_create_lenghts_table', 7),
(78, '2022_10_19_041935_create_patterns_table', 8),
(79, '2022_10_19_074137_create_frontals_table', 9),
(80, '2022_10_23_135606_create_contacts_table', 10),
(81, '2022_10_24_051225_add_category_id_to_frontals_table', 11),
(82, '2022_10_24_072312_add_sizes_to_products_table', 12),
(83, '2022_10_24_074817_create_products_table', 13),
(84, '2022_10_24_075115_create_products_table', 14),
(85, '2022_10_24_075645_add_stock_status_to_products_table', 15),
(86, '2022_10_28_012801_create_feedback_slides_table', 16),
(87, '2022_11_01_070257_create_size_table', 17),
(88, '2022_11_01_070441_create_sizevalue_table', 17),
(89, '2022_11_01_070752_create_lenghts_table', 17),
(90, '2022_11_01_071119_create_products_table', 18),
(91, '2022_11_01_141306_create_products_table', 19),
(92, '2022_11_01_141852_create_images_table', 19),
(93, '2022_11_01_173959_create_sizevalue_table', 20),
(94, '2022_11_02_041152_add_product_thumbnail_to_products_table', 21),
(95, '2022_11_02_050534_add_product_thumbnail_unigue_id_to_products_table', 22),
(96, '2022_11_02_065107_create_images_table', 23),
(97, '2022_11_02_091616_create_productimage_table', 24),
(98, '2022_11_10_052620_create_patterns_table', 25),
(99, '2022_11_10_073411_add_image_cat_to_categories_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `tax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('ordered','delivered','canceled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `firstname`, `lastname`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `zipcode`, `status`, `is_shipping_different`, `created_at`, `updated_at`) VALUES
(1, 1, '62.00', '0.00', '0.00', '62.00', 'admin', 'kimhonh', 'slkdfna', 'sfa@gmail', '1', NULL, 'phum penh', 'klsdnfla', 'sfkna', '1231', 'delivered', 0, '2022-11-13 19:27:53', '2022-11-13 20:03:57'),
(2, 3, '12.00', '0.00', '0.00', '12.00', 'Kimhong', 'Set', '010358509', 'kimhong@gmail.com', '1', NULL, 'phum pneh', 'Cambodia', 'Australia', '2123', 'delivered', 0, '2022-11-13 19:30:59', '2022-11-13 20:00:38'),
(3, 1, '800.00', '0.00', '0.00', '800.00', 'ojosdf', 'sdfklha', '9723230', 'kimh@gmail.com', '1', NULL, 'cambodian', 'dklfal', 'lkdhfs', '1213', 'ordered', 0, '2022-11-14 19:45:57', '2022-11-14 19:45:57'),
(4, 1, '12.00', '0.00', '0.00', '12.00', 'kimhong', 'kjbsfd', '817291', 'kimh@gmail.com', '1', NULL, 'kimho', 'jhfds', 'jbfd', '1213', 'ordered', 0, '2022-11-14 20:15:28', '2022-11-14 20:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_order_id_foreign` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '12.00', 1, '2022-11-13 19:27:53', '2022-11-13 19:27:53'),
(2, 9, 1, '50.00', 1, '2022-11-13 19:27:53', '2022-11-13 19:27:53'),
(3, 3, 2, '12.00', 1, '2022-11-13 19:30:59', '2022-11-13 19:30:59'),
(4, 5, 3, '800.00', 1, '2022-11-14 19:45:57', '2022-11-14 19:45:57'),
(5, 4, 4, '12.00', 1, '2022-11-14 20:15:28', '2022-11-14 20:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kimhong@gmail.com', '$2y$10$MWm4drBbfbByM80rmUtr9ewWjxnwEbQK1LvbQXaPsXgQFse0tB4Jm', '2022-11-09 22:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `patterns`
--

DROP TABLE IF EXISTS `patterns`;
CREATE TABLE IF NOT EXISTS `patterns` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_pattern` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patterns`
--

INSERT INTO `patterns` (`id`, `name`, `image_pattern`, `created_at`, `updated_at`) VALUES
(1, 'Straight ', '1668311528.jpg', '2022-11-12 20:52:08', '2022-11-12 20:52:08'),
(2, 'Wavy-A', '1668311543.jpg', '2022-11-12 20:52:23', '2022-11-12 20:52:23'),
(3, 'Wavy-B', '1668311555.jpg', '2022-11-12 20:52:35', '2022-11-12 20:52:35'),
(4, 'Culy-C', '1668311607.jpg', '2022-11-12 20:53:27', '2022-11-12 20:53:27'),
(5, 'Culy-D', '1668311622.jpg', '2022-11-12 20:53:42', '2022-11-12 20:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

DROP TABLE IF EXISTS `productimage`;
CREATE TABLE IF NOT EXISTS `productimage` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productimage_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`id`, `product_id`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 1, '16683117630.jpg', '2022-11-12 20:56:03', '2022-11-12 20:56:03'),
(2, 1, '16683117631.jpg', '2022-11-12 20:56:03', '2022-11-12 20:56:03'),
(3, 2, '16683122390.jpg', '2022-11-12 21:03:59', '2022-11-12 21:03:59'),
(4, 2, '16683122391.jpg', '2022-11-12 21:03:59', '2022-11-12 21:03:59'),
(5, 3, '16683125890.jpg', '2022-11-12 21:09:49', '2022-11-12 21:09:49'),
(6, 3, '16683125891.jpg', '2022-11-12 21:09:49', '2022-11-12 21:09:49'),
(7, 4, '16683126920.jpg', '2022-11-12 21:11:32', '2022-11-12 21:11:32'),
(8, 4, '16683126921.jpg', '2022-11-12 21:11:32', '2022-11-12 21:11:32'),
(9, 5, '16683127490.jpg', '2022-11-12 21:12:29', '2022-11-12 21:12:29'),
(10, 5, '16683127491.jpg', '2022-11-12 21:12:29', '2022-11-12 21:12:29'),
(11, 6, '16683129960.jpg', '2022-11-12 21:16:36', '2022-11-12 21:16:36'),
(12, 6, '16683129961.jpg', '2022-11-12 21:16:36', '2022-11-12 21:16:36'),
(13, 7, '16683561480.jpg', '2022-11-13 09:15:48', '2022-11-13 09:15:48'),
(14, 7, '16683561481.jpg', '2022-11-13 09:15:48', '2022-11-13 09:15:48'),
(15, 8, '16683562100.jpg', '2022-11-13 09:16:50', '2022-11-13 09:16:50'),
(16, 8, '16683562101.jpg', '2022-11-13 09:16:50', '2022-11-13 09:16:50'),
(17, 8, '16683562102.jpg', '2022-11-13 09:16:50', '2022-11-13 09:16:50'),
(18, 9, '16683904140.jpg', '2022-11-13 18:46:54', '2022-11-13 18:46:54'),
(19, 9, '16683904141.jpg', '2022-11-13 18:46:54', '2022-11-13 18:46:54'),
(20, 10, '16684808010.jpg', '2022-11-14 19:53:21', '2022-11-14 19:53:21'),
(21, 10, '16684808011.jpg', '2022-11-14 19:53:21', '2022-11-14 19:53:21'),
(22, 11, '16684825470.jpg', '2022-11-14 20:22:27', '2022-11-14 20:22:27'),
(23, 11, '16684825471.jpg', '2022-11-14 20:22:27', '2022-11-14 20:22:27'),
(24, 11, '16684825472.jpg', '2022-11-14 20:22:27', '2022-11-14 20:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reguler_price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '10',
  `sizevalue_id` bigint(20) UNSIGNED DEFAULT NULL,
  `wigcaps_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lenghts_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `pattern_id` bigint(20) UNSIGNED NOT NULL,
  `stock_status` enum('instock','outstock') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'instock',
  `Luster` enum('Low','Medium','High') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_lenghts_id_foreign` (`lenghts_id`),
  KEY `products_wigcaps_id_foreign` (`wigcaps_id`),
  KEY `products_sizevalue_id_foreign` (`sizevalue_id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_pattern_id_foreign` (`pattern_id`),
  KEY `products_color_id_foreign` (`color_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `reguler_price`, `discount`, `sale_price`, `SKU`, `quantity`, `sizevalue_id`, `wigcaps_id`, `lenghts_id`, `category_id`, `color_id`, `pattern_id`, `stock_status`, `Luster`, `created_at`, `updated_at`, `product_thumbnail`) VALUES
(1, 'weft 12', 'weft-12', NULL, 'lkbsdlf', '12.00', '61.00', '90.00', 'utkj', 1, NULL, NULL, 18, 2, 2, 1, 'instock', 'Medium', '2022-11-12 20:56:03', '2022-11-12 20:56:03', '1668311763.jpg'),
(2, 'weftd 23', 'weftd-23', NULL, 'lsdfns', '321.00', '12.00', '90.00', '12lksf', 1, NULL, NULL, 17, 2, 4, 4, 'instock', 'Low', '2022-11-12 21:03:59', '2022-11-12 21:03:59', '1668312239.jpg'),
(3, 'closure 12', 'closure-12', NULL, 'lkbdsfl', '129.00', '90.00', '12.00', 'kldbf', 1, 2, 2, 23, 1, 3, 2, 'instock', 'Low', '2022-11-12 21:09:49', '2022-11-12 21:09:49', '1668312589.jpg'),
(4, 'Closuer 12', 'closuer-12', NULL, 'lksdfns', '12.00', '0.00', '12.00', 'kdsnf', 1, 3, 2, 18, 1, 4, 2, 'instock', 'Medium', '2022-11-12 21:11:32', '2022-11-13 09:42:18', '1668312692.jpg'),
(5, 'wig 16712', 'wig-16712', NULL, 'kds', '90.00', '12.00', '800.00', 'lskdnf', 1, 7, 3, 17, 3, 4, 3, 'instock', 'Low', '2022-11-12 21:12:29', '2022-11-12 21:12:29', '1668312749.jpg'),
(6, 'wig 1290', 'wig-1290', NULL, 'kdsnfs', '12.00', '90.00', '12.00', 'ksndf', 1, 9, 4, 20, 3, 4, 2, 'instock', 'Low', '2022-11-12 21:16:36', '2022-11-12 21:16:36', '1668312996.jpg'),
(7, 'frontal 345', 'frontal-345', NULL, 'kdnfla', '234.00', '90.00', '123.00', 'sdklfn', 1, 5, 2, 22, 4, 5, 3, 'instock', 'Medium', '2022-11-13 09:15:48', '2022-11-13 09:15:48', '1668356148.jpg'),
(8, 'Frontal 56', 'frontal-56', NULL, 'kldhfls', '23.00', '89.00', '12.00', '12iaf', 1, 5, 2, 16, 4, 5, 4, 'instock', 'Medium', '2022-11-13 09:16:50', '2022-11-13 09:16:50', '1668356210.jpg'),
(9, 'wefted', 'wefted', NULL, 'sdfn', '120.00', '0.00', '50.00', '12oi', 1, NULL, NULL, 9, 2, 1, 1, 'instock', 'Medium', '2022-11-13 18:46:54', '2022-11-13 18:48:04', '1668390414.jpg'),
(10, 'wefted hair 323434', 'wefted-hair-323434', 'klsdjfoi', 'vknlsdnlo', '123.00', '0.00', '4000.00', '1219s', 1, NULL, NULL, 19, 2, 4, 3, 'instock', 'Medium', '2022-11-14 19:53:21', '2022-11-14 19:53:21', '1668480801.jpg'),
(11, 'cllosf', 'cllosf', 'jnkj', 'kdfnlssf,', '12.00', '0.00', '90.00', '12id', 1, 2, 2, 17, 1, 3, 3, 'instock', 'Low', '2022-11-14 20:22:27', '2022-11-14 20:22:27', '1668482546.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KCweRTh76OceBzUzAdlcr2DMkOehrGM5PjxpPKoI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmZER0dnblNmQkJjcElHQ3NQNkE1eVcxdlJKaFA5dzhhd1FON3ZGTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1668497402),
('zfCP7yDMj8frOZbh5lUAEK0EUCQ7vXQ8Am58tb4g', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVWxlYmlITGxMODdYWDNtVmVSeW9nMGpjU3dsTURISWIySm9sZ1k0YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRrWTJvdHpZUmdCUzllLlY3TWFzOHFlQ0V2eWFMcnhZSGt1Z3NZR1huRnNnRmI4UUlwQVVRVyI7fQ==', 1668663964),
('SjO2qJz0Pqep7DyB9280kLuqX9ICbzN5FcCvm2jT', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOWh6RWFRYmdmNU43WHRZN3RRVkM4SGJXUFQ2Zmx5M2h2bFJBZ2x0SCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRrWTJvdHpZUmdCUzllLlY3TWFzOHFlQ0V2eWFMcnhZSGt1Z3NZR1huRnNnRmI4UUlwQVVRVyI7fQ==', 1668750687);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_collapse` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
CREATE TABLE IF NOT EXISTS `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shippings_order_id_foreign` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizevalue`
--

DROP TABLE IF EXISTS `sizevalue`;
CREATE TABLE IF NOT EXISTS `sizevalue` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value_sizes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sizevalue_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizevalue`
--

INSERT INTO `sizevalue` (`id`, `category_id`, `value_sizes`, `created_at`, `updated_at`) VALUES
(1, 1, '4x5', '2022-11-11 07:04:57', '2022-11-11 07:04:57'),
(2, 1, '4x4', '2022-11-11 07:05:04', '2022-11-11 07:05:04'),
(3, 1, '4x6', '2022-11-11 07:05:11', '2022-11-11 07:05:11'),
(4, 1, '4x7', '2022-11-11 07:05:18', '2022-11-11 07:05:18'),
(5, 4, '4x11', '2022-11-11 07:05:33', '2022-11-11 07:05:33'),
(6, 4, '4x12', '2022-11-11 07:05:42', '2022-11-11 07:05:42'),
(7, 3, 'S (small)', '2022-11-11 07:08:18', '2022-11-11 07:08:18'),
(8, 3, ' M (medium)', '2022-11-11 07:08:31', '2022-11-11 07:08:31'),
(9, 3, 'L (large)', '2022-11-11 07:13:27', '2022-11-11 07:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('pending','apporved','decline','refund') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_foreign` (`user_id`),
  KEY `transactions_order_id_foreign` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'cod', 'pending', '2022-10-21 02:25:40', '2022-10-21 02:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8_unicode_ci,
  `utype` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM for admin and USR for user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`, `avatar`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$LesjxkpkyECQyWGYceaLyOmpE1cOtmgybM.b.BWdIDLZjtH4wO1BC', NULL, NULL, NULL, NULL, NULL, 'ADM', '2022-10-18 01:59:28', '2022-10-18 01:59:28', NULL, 'user'),
(2, 'skfnla', 'sknfa@Gmail.com', NULL, '$2y$10$DrsL/Rz6u6xfWFvOaynRLOoGd6OmFPbmkX0Lz8IPnQ5kSpAU20jzG', NULL, NULL, NULL, NULL, NULL, 'USR', '2022-10-20 08:15:01', '2022-10-20 08:15:01', NULL, 'user'),
(3, 'kimhong ', 'kimhong@gmail.com', NULL, '$2y$10$kY2otzYRgBS9e.V7Mas8qeCEvyaLrxYHkugsYGXnFsgFb8QIpAUQW', NULL, NULL, NULL, NULL, NULL, 'USR', '2022-10-20 08:15:44', '2022-10-20 08:15:44', NULL, 'user'),
(4, 'kkhsifa', 'shf@gmial.com', NULL, '$2y$10$P0UMNsgp75Mx/1A/D77EY.iq.w9LAo6zTSbW4Gw.oq8yOfJlNA8uC', NULL, NULL, NULL, NULL, NULL, 'USR', '2022-10-20 08:16:00', '2022-10-20 08:16:00', NULL, 'user'),
(5, 'klsfa', 'ksnf@gamil.com', NULL, '$2y$10$UFvEnxUaOLAgm6NONTUdaeimfJ1Pvxatzv8m53lHOiDJQO1ovpY4m', NULL, NULL, NULL, NULL, NULL, 'USR', '2022-10-20 08:16:35', '2022-10-20 08:16:35', NULL, 'user'),
(6, 'lksnfla', 'kjsf@gmail.com', NULL, '$2y$10$.hXFN3oig1UV2c4aD6nG8uv7l/d8MWrOQg2BU19GIZrVEB/4flfYS', NULL, NULL, NULL, NULL, NULL, 'USR', '2022-10-20 08:16:51', '2022-10-20 08:16:51', NULL, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wigcaps`
--

DROP TABLE IF EXISTS `wigcaps`;
CREATE TABLE IF NOT EXISTS `wigcaps` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wigcaps_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wigcaps`
--

INSERT INTO `wigcaps` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'HD', '2022-11-01 07:25:00', '2022-11-01 07:25:00'),
(2, 'Transparent', '2022-11-01 07:25:00', '2022-11-01 07:25:00'),
(3, 'Hd-Silk base', '2022-11-01 07:28:24', '2022-11-01 07:28:24'),
(4, 'Transparent silk base', '2022-11-01 07:28:24', '2022-11-01 07:28:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
