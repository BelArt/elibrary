-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.3.22-MariaDB-log - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.0.0.5944
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных documents
CREATE DATABASE IF NOT EXISTS `documents` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `documents`;

-- Дамп структуры для таблица documents.cases
CREATE TABLE IF NOT EXISTS `cases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fund_id` bigint(20) unsigned NOT NULL,
  `inventory_id` bigint(20) unsigned NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cases_fund_id_foreign` (`fund_id`),
  KEY `cases_inventory_id_foreign` (`inventory_id`),
  CONSTRAINT `cases_fund_id_foreign` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cases_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы documents.cases: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `cases` DISABLE KEYS */;
INSERT INTO `cases` (`id`, `fund_id`, `inventory_id`, `number`, `name`, `description`, `year`) VALUES
	(98, 110, 76, '1231-asd0', '', NULL, NULL);
/*!40000 ALTER TABLE `cases` ENABLE KEYS */;

-- Дамп структуры для таблица documents.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint(20) NOT NULL,
  `type` enum('page','case') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы documents.comments: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп структуры для таблица documents.download
CREATE TABLE IF NOT EXISTS `download` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fund` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loaded` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы documents.download: ~69 rows (приблизительно)
/*!40000 ALTER TABLE `download` DISABLE KEYS */;
INSERT INTO `download` (`id`, `fund`, `inventory`, `case`, `page`, `loaded`) VALUES
	(1, '1231241', NULL, NULL, NULL, NULL),
	(2, '1231241', 'asd112', NULL, NULL, NULL),
	(3, '1231241', 'asd112', 'asda122', NULL, NULL),
	(4, '1231241', 'asd112', 'asda122', 'about-photo.jpg', NULL),
	(5, '1231241', 'asd112', 'asda122', 'baner-mobail.jpg', NULL),
	(6, '1231241', 'asd112', 'asda122', 'baner-mobail.png', NULL),
	(7, '1231241', 'asd112', 'asda122', 'baner.jpg', NULL),
	(8, '1231241', 'asd112', 'asda122', 'baner.png', NULL),
	(9, '1231241', 'asd112', 'asda122', 'baner_.jpg', NULL),
	(10, '1231241', 'asd112', 'asda122', 'big-book.jpg', NULL),
	(11, '1231241', 'asd112', 'asda122', 'board-picture.jpg', NULL),
	(12, '1231241', 'asd112', 'asda122', 'book.jpg', NULL),
	(13, '1231241', 'asd112', 'asda122', 'card-1.jpg', NULL),
	(14, '1231241', 'asd112', 'asda122', 'card-10.jpg', NULL),
	(15, '1231241', 'asd112', 'asda122', 'card-11.jpg', NULL),
	(16, '1231241', 'asd112', 'asda122', 'card-12.jpg', NULL),
	(17, '1231241', 'asd112', 'asda122', 'card-13.jpg', NULL),
	(18, '1231241', 'asd112', 'asda122', 'card-14.jpg', NULL),
	(19, '1231241', 'asd112', 'asda122', 'card-15.jpg', NULL),
	(20, '1231241', 'asd112', 'asda122', 'card-2.jpg', NULL),
	(21, '1231241', 'asd112', 'asda122', 'card-3.jpg', NULL),
	(22, '1231241', 'asd112', 'asda122', 'card.jpg', NULL),
	(23, '1231241', 'asd112', 'asda122', 'exhibition-1.jpg', NULL),
	(24, '1231241', 'asd112', 'asda122', 'exhibition-10.jpg', NULL),
	(25, '1231241', 'asd112', 'asda122', 'exhibition-11.jpg', NULL),
	(26, '1231241', 'asd112', 'asda122', 'exhibition-2.jpg', NULL),
	(27, '1231241', 'asd112', 'asda122', 'exhibition-3.jpg', NULL),
	(28, '1231241', 'asd112', 'asda122', 'exhibition-4.jpg', NULL),
	(29, '1231241', 'asd112', 'asda122', 'exhibition-5.jpg', NULL),
	(30, '1231241', 'asd112', 'asda122', 'exhibition-6.jpg', NULL),
	(31, '1231241', 'asd112', 'asda122', 'exhibition-7.jpg', NULL),
	(32, '1231241', 'asd112', 'asda122', 'exhibition-8.jpg', NULL),
	(33, '1231241', 'asd112', 'asda122', 'exhibition-9.jpg', NULL),
	(34, '1231241', 'asd112', 'asda122', 'gallery-1.jpg', NULL),
	(35, '1231241', 'asd112', 'asda122', 'gallery-img.jpg', NULL),
	(36, '1231241', 'asd112', 'asda122', 'gallery-user.jpg', NULL),
	(37, '1231241', 'asd112', 'asda122', 'logo-5.png', NULL),
	(38, '1231241', 'asd112', 'asda122', 'news.jpg', NULL),
	(39, '1231241', 'asd112', 'asda122', 'organizers-1.png', NULL),
	(40, '1231241', 'asd112', 'asda122', 'photo-1.jpg', NULL),
	(41, '1231241', 'asd112', 'asda122', 'poster-mc.png', NULL),
	(42, '1231241', 'asd112', 'asda122', 'shadow.png', NULL),
	(43, '1231241', 'asd112', 'asda122', 'stories-big.jpg', NULL),
	(44, '1231241', 'asd112', 'asda122', 'user-bg.jpg', NULL),
	(45, 'd1121', NULL, NULL, NULL, NULL),
	(46, 'd1121', '2132-das', NULL, NULL, NULL),
	(47, 'd1121', '2132-das', '12-asda', NULL, NULL),
	(48, 'd1121', '2132-das', '12-asda', 'avatar-1.png', NULL),
	(49, 'd1121', '2132-das', '12-asda', 'avatar-2.png', NULL),
	(50, 'd1121', '2132-das', '12-asda', 'avatar-3.png', NULL),
	(51, 'd1121', '2132-das', '12-asda', 'avatar-5.png', NULL),
	(52, 'd1121', '2132-das', '12-asda', 'bg-main-mobile.jpg', NULL),
	(53, 'd1121', '2132-das', '12-asda', 'bg-main.jpg', NULL),
	(54, 'd1121', '2132-das', '12-asda', 'bg-menu.png', NULL),
	(55, 'd1121', '2132-das', '12-asda', 'logo.png', NULL),
	(56, 'd1121', '2132-das', '12-asda', 'organizers-2.png', NULL),
	(57, 'd1121', '2132-das', '12-asda', 'photo-1.jpg', NULL),
	(58, 'd1121', '2132-das', '12-asda', 'photo-2.jpg', NULL),
	(59, 'd1121', '2132-das', '12-asda', 'photo-3.jpg', NULL),
	(60, 'd1121', '2132-das', '12-asda', 'photo-4.jpg', NULL),
	(61, 'd1121', '2132-das', '12-asda', 'photo-5.jpg', NULL),
	(62, 'd1121', '2132-das', '12-asda', 'photo-6.jpg', NULL),
	(63, 'd1121', '2132-das', '1231-asd0', NULL, NULL),
	(64, 'd1121', '2132-das', '1231-asd0', '1.jpg', NULL),
	(65, 'd1121', '2132-das', '1231-asd0', '2.jpg', NULL),
	(66, 'd1121', '2132-das', '1231-asd0', '3.jpg', NULL),
	(67, 'd1121', '2132-das', '1231-asd0', 'bg_new.jpg', NULL),
	(68, 'd1121', '2132-das', '1231-asd0', 'main.png', NULL),
	(69, 'd1121', '2132-das', '1231-asd0', 'video.jpg', NULL);
/*!40000 ALTER TABLE `download` ENABLE KEYS */;

-- Дамп структуры для таблица documents.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы documents.failed_jobs: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Дамп структуры для таблица documents.funds
CREATE TABLE IF NOT EXISTS `funds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы documents.funds: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `funds` DISABLE KEYS */;
INSERT INTO `funds` (`id`, `number`, `name`, `description`) VALUES
	(109, '1231241', '5545465456654', 'рпорпор одп долалал па лправл'),
	(110, 'd1121', '', NULL);
/*!40000 ALTER TABLE `funds` ENABLE KEYS */;

-- Дамп структуры для таблица documents.inventory
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fund_id` bigint(20) unsigned NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_fund_id_foreign` (`fund_id`),
  CONSTRAINT `inventory_fund_id_foreign` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы documents.inventory: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` (`id`, `fund_id`, `number`, `name`, `description`) VALUES
	(76, 110, '2132-das', '', NULL);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;

-- Дамп структуры для таблица documents.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы documents.migrations: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(24, '2021_05_08_175532_create_fund_table', 2),
	(25, '2021_05_08_180304_create_inventory_table', 2),
	(26, '2021_05_08_180412_create_case_table', 2),
	(27, '2021_05_08_180445_create_page_table', 2),
	(28, '2021_05_11_182051_create_comments_table', 2),
	(29, '2021_05_11_193431_create_download_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп структуры для таблица documents.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fund_id` bigint(20) unsigned NOT NULL,
  `inventory_id` bigint(20) unsigned NOT NULL,
  `case_id` bigint(20) unsigned NOT NULL,
  `page_number` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_fund_id_foreign` (`fund_id`),
  KEY `pages_inventory_id_foreign` (`inventory_id`),
  KEY `pages_case_id_foreign` (`case_id`),
  CONSTRAINT `pages_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `cases` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pages_fund_id_foreign` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pages_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=328 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы documents.pages: ~62 rows (приблизительно)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `fund_id`, `inventory_id`, `case_id`, `page_number`, `file`, `description`) VALUES
	(266, 109, 76, 98, 1, 'about-photo.jpg', NULL),
	(267, 109, 76, 98, 2, 'baner-mobail.jpg', NULL),
	(268, 109, 76, 98, 2, 'baner-mobail.png', NULL),
	(269, 109, 76, 98, 2, 'baner.jpg', NULL),
	(270, 109, 76, 98, 2, 'baner.png', NULL),
	(271, 109, 76, 98, 2, 'baner_.jpg', NULL),
	(272, 109, 76, 98, 2, 'big-book.jpg', NULL),
	(273, 109, 76, 98, 2, 'board-picture.jpg', NULL),
	(274, 109, 76, 98, 2, 'book.jpg', NULL),
	(275, 109, 76, 98, 2, 'card-1.jpg', NULL),
	(276, 109, 76, 98, 2, 'card-10.jpg', NULL),
	(277, 109, 76, 98, 2, 'card-11.jpg', NULL),
	(278, 109, 76, 98, 2, 'card-12.jpg', NULL),
	(279, 109, 76, 98, 2, 'card-13.jpg', NULL),
	(280, 109, 76, 98, 2, 'card-14.jpg', NULL),
	(281, 109, 76, 98, 2, 'card-15.jpg', NULL),
	(282, 109, 76, 98, 2, 'card-2.jpg', NULL),
	(283, 109, 76, 98, 2, 'card-3.jpg', NULL),
	(284, 109, 76, 98, 2, 'card.jpg', NULL),
	(285, 109, 76, 98, 2, 'exhibition-1.jpg', NULL),
	(286, 109, 76, 98, 2, 'exhibition-10.jpg', NULL),
	(287, 109, 76, 98, 2, 'exhibition-11.jpg', NULL),
	(288, 109, 76, 98, 2, 'exhibition-2.jpg', NULL),
	(289, 109, 76, 98, 2, 'exhibition-3.jpg', NULL),
	(290, 109, 76, 98, 2, 'exhibition-4.jpg', NULL),
	(291, 109, 76, 98, 2, 'exhibition-5.jpg', NULL),
	(292, 109, 76, 98, 2, 'exhibition-6.jpg', NULL),
	(293, 109, 76, 98, 2, 'exhibition-7.jpg', NULL),
	(294, 109, 76, 98, 2, 'exhibition-8.jpg', NULL),
	(295, 109, 76, 98, 2, 'exhibition-9.jpg', NULL),
	(296, 109, 76, 98, 2, 'gallery-1.jpg', NULL),
	(297, 109, 76, 98, 2, 'gallery-img.jpg', NULL),
	(298, 109, 76, 98, 2, 'gallery-user.jpg', NULL),
	(299, 109, 76, 98, 2, 'logo-5.png', NULL),
	(300, 109, 76, 98, 2, 'news.jpg', NULL),
	(301, 109, 76, 98, 2, 'organizers-1.png', NULL),
	(302, 109, 76, 98, 2, 'photo-1.jpg', NULL),
	(303, 109, 76, 98, 2, 'poster-mc.png', NULL),
	(304, 109, 76, 98, 2, 'shadow.png', NULL),
	(305, 109, 76, 98, 2, 'stories-big.jpg', NULL),
	(306, 109, 76, 98, 2, 'user-bg.jpg', NULL),
	(307, 110, 76, 98, 2, 'avatar-1.png', NULL),
	(308, 110, 76, 98, 2, 'avatar-2.png', NULL),
	(309, 110, 76, 98, 2, 'avatar-3.png', NULL),
	(310, 110, 76, 98, 2, 'avatar-5.png', NULL),
	(311, 110, 76, 98, 2, 'bg-main-mobile.jpg', NULL),
	(312, 110, 76, 98, 2, 'bg-main.jpg', NULL),
	(313, 110, 76, 98, 2, 'bg-menu.png', NULL),
	(314, 110, 76, 98, 2, 'logo.png', NULL),
	(315, 110, 76, 98, 2, 'organizers-2.png', NULL),
	(316, 110, 76, 98, 2, 'photo-1.jpg', NULL),
	(317, 110, 76, 98, 2, 'photo-2.jpg', NULL),
	(318, 110, 76, 98, 2, 'photo-3.jpg', NULL),
	(319, 110, 76, 98, 2, 'photo-4.jpg', NULL),
	(320, 110, 76, 98, 2, 'photo-5.jpg', NULL),
	(321, 110, 76, 98, 2, 'photo-6.jpg', NULL),
	(322, 110, 76, 98, 2, '1.jpg', NULL),
	(323, 110, 76, 98, 2, '2.jpg', NULL),
	(324, 110, 76, 98, 2, '3.jpg', NULL),
	(325, 110, 76, 98, 2, 'bg_new.jpg', NULL),
	(326, 110, 76, 98, 2, 'main.png', NULL),
	(327, 110, 76, 98, 2, 'video.jpg', NULL);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Дамп структуры для таблица documents.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы documents.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп структуры для таблица documents.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы documents.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
