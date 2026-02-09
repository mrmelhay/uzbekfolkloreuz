/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `folklore` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `folklore`;

CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `title_uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_uz` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_slug_unique` (`slug`),
  KEY `articles_category_id_foreign` (`category_id`),
  CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `articles` (`id`, `category_id`, `title_uz`, `title_en`, `content_uz`, `content_en`, `slug`, `status`, `created_at`, `updated_at`) VALUES
	(1, 6, 'Maqola 1 - Afsona va miflar', 'Article 1 - Legends and Myths', '<p>Bu <strong>Afsona va miflar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Legends and Myths</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-afsona-va-miflar', 'published', '2026-02-08 11:52:25', '2026-02-08 12:12:42'),
	(2, 5, 'Maqola 2 - Afsona va miflar', 'Article 2 - Legends and Myths', '<p>Bu <strong>Afsona va miflar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Legends and Myths</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-afsona-va-miflar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(3, 6, 'Maqola 1 - O\'zbek baxshichilik san\'ati', 'Article 1 - Uzbek Bakhshi Art', '<p>Bu <strong>O\'zbek baxshichilik san\'ati</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Uzbek Bakhshi Art</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-ozbek-baxshichilik-sanati', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(4, 6, 'Maqola 2 - O\'zbek baxshichilik san\'ati', 'Article 2 - Uzbek Bakhshi Art', '<p>Bu <strong>O\'zbek baxshichilik san\'ati</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Uzbek Bakhshi Art</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-ozbek-baxshichilik-sanati', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(5, 7, 'Maqola 1 - Dostonlar', 'Article 1 - Epics', '<p>Bu <strong>Dostonlar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Epics</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-dostonlar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(6, 7, 'Maqola 2 - Dostonlar', 'Article 2 - Epics', '<p>Bu <strong>Dostonlar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Epics</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-dostonlar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(7, 8, 'Maqola 1 - Ertaklar', 'Article 1 - Fairy Tales', '<p>Bu <strong>Ertaklar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Fairy Tales</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-ertaklar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(8, 8, 'Maqola 2 - Ertaklar', 'Article 2 - Fairy Tales', '<p>Bu <strong>Ertaklar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Fairy Tales</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-ertaklar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(9, 9, 'Maqola 1 - Rivoyatlar', 'Article 1 - Narratives', '<p>Bu <strong>Rivoyatlar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Narratives</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-rivoyatlar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(10, 9, 'Maqola 2 - Rivoyatlar', 'Article 2 - Narratives', '<p>Bu <strong>Rivoyatlar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Narratives</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-rivoyatlar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(11, 10, 'Maqola 1 - Qahramonlik dostonlari', 'Article 1 - Heroic Epics', '<p>Bu <strong>Qahramonlik dostonlari</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Heroic Epics</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-qahramonlik-dostonlari', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(12, 10, 'Maqola 2 - Qahramonlik dostonlari', 'Article 2 - Heroic Epics', '<p>Bu <strong>Qahramonlik dostonlari</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Heroic Epics</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-qahramonlik-dostonlari', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(13, 11, 'Maqola 1 - Topishmoqlar', 'Article 1 - Riddles', '<p>Bu <strong>Topishmoqlar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Riddles</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-topishmoqlar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(14, 11, 'Maqola 2 - Topishmoqlar', 'Article 2 - Riddles', '<p>Bu <strong>Topishmoqlar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Riddles</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-topishmoqlar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(15, 12, 'Maqola 1 - Marosim folklori', 'Article 1 - Ceremonial Folklore', '<p>Bu <strong>Marosim folklori</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Ceremonial Folklore</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-marosim-folklori', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(16, 12, 'Maqola 2 - Marosim folklori', 'Article 2 - Ceremonial Folklore', '<p>Bu <strong>Marosim folklori</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Ceremonial Folklore</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-marosim-folklori', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(17, 13, 'Maqola 1 - Maqollar', 'Article 1 - Proverbs', '<p>Bu <strong>Maqollar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Proverbs</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-maqollar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(18, 13, 'Maqola 2 - Maqollar', 'Article 2 - Proverbs', '<p>Bu <strong>Maqollar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Proverbs</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-maqollar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(19, 14, 'Maqola 1 - Askiya', 'Article 1 - Askiya', '<p>Bu <strong>Askiya</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Askiya</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-askiya', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(20, 14, 'Maqola 2 - Askiya', 'Article 2 - Askiya', '<p>Bu <strong>Askiya</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Askiya</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-askiya', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(21, 15, 'Maqola 1 - Latifa va loflar', 'Article 1 - Anecdotes', '<p>Bu <strong>Latifa va loflar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Anecdotes</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-latifa-va-loflar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(22, 15, 'Maqola 2 - Latifa va loflar', 'Article 2 - Anecdotes', '<p>Bu <strong>Latifa va loflar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Anecdotes</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-latifa-va-loflar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(23, 16, 'Maqola 1 - Xalq qo\'shiqlari', 'Article 1 - Folk Songs', '<p>Bu <strong>Xalq qo\'shiqlari</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Folk Songs</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-xalq-qoshiqlari', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(24, 16, 'Maqola 2 - Xalq qo\'shiqlari', 'Article 2 - Folk Songs', '<p>Bu <strong>Xalq qo\'shiqlari</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Folk Songs</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-xalq-qoshiqlari', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(25, 17, 'Maqola 1 - Termalar', 'Article 1 - Termas', '<p>Bu <strong>Termalar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Termas</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-1-termalar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(26, 17, 'Maqola 2 - Termalar', 'Article 2 - Termas', '<p>Bu <strong>Termalar</strong> bo\'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>', '<p>This is a sample article text in the <strong>Termas</strong> category. Lorem ipsum dolor sit amet.</p>', 'maqola-2-termalar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(27, 2, 'Test UZ', 'Test EN', '<p>ZXZ</p>', '<p>ZXZX</p>', 'test-uz', 'published', '2026-02-08 12:13:47', '2026-02-08 12:19:08'),
	(28, 1, 'Debug Article', 'Debug Article EN', 'Content', 'Content EN', 'debug-article-1770570906', 'draft', '2026-02-08 12:15:06', '2026-02-08 12:15:06');

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `title_uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `parent_id`, `title_uz`, `title_en`, `slug`, `status`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'O\'zbek folklori', 'Uzbek Folklore', 'ozbek-folklori', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(2, NULL, 'Folklorshunos olimlar', 'Folklore Scholars', 'folklorshunos-olimlar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(3, NULL, 'Folklor ansambllari', 'Folklore Ensembles', 'folklor-ansambllari', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(4, NULL, 'Folklor janrlari', 'Folklore Genres', 'folklor-janrlari', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(5, 4, 'Afsona va miflar', 'Legends and Myths', 'afsona-va-miflar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(6, 4, 'O\'zbek baxshichilik san\'ati', 'Uzbek Bakhshi Art', 'ozbek-baxshichilik-sanati', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(7, 4, 'Dostonlar', 'Epics', 'dostonlar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(8, 4, 'Ertaklar', 'Fairy Tales', 'ertaklar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(9, 4, 'Rivoyatlar', 'Narratives', 'rivoyatlar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(10, 4, 'Qahramonlik dostonlari', 'Heroic Epics', 'qahramonlik-dostonlari', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(11, 4, 'Topishmoqlar', 'Riddles', 'topishmoqlar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(12, 4, 'Marosim folklori', 'Ceremonial Folklore', 'marosim-folklori', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(13, 4, 'Maqollar', 'Proverbs', 'maqollar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(14, 4, 'Askiya', 'Askiya', 'askiya', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(15, 4, 'Latifa va loflar', 'Anecdotes', 'latifa-va-loflar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(16, 4, 'Xalq qo\'shiqlari', 'Folk Songs', 'xalq-qoshiqlari', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(17, 4, 'Termalar', 'Termas', 'termalar', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25');

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `home_sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle_uz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_uz` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_mobile` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text_uz` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `home_sliders` (`id`, `title_uz`, `title_en`, `subtitle_uz`, `subtitle_en`, `description_uz`, `description_en`, `image`, `image_mobile`, `button_text_uz`, `button_text_en`, `button_url`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'O\'zbek Xalq Og\'zaki Ijodi', 'Uzbek Folklore', 'Milliy merosimizni asrab avaylaylik', 'Preserving our national heritage', 'O\'zbek xalqining boy madaniy merosi, dostonlar, ertaklar va maqollar.', 'Rich cultural heritage of Uzbek people, epics, fairy tales and proverbs.', '/photos/backgound_1.png', NULL, 'Ko\'proq o\'qish', 'Read More', '/uz/folklor-janrlari', 1, 1, '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(2, 'Baxshichilik San\'ati', 'Art of Bakhshi', 'Jonli tarix sadosi', 'Voice of living history', 'Buyuk baxshilarimiz va ularning o\'lmas asarlari.', 'Our great bakhshis and their immortal works.', '/photos/backgound_1.png', NULL, 'Batafsil', 'Details', '/uz/folklor-janrlari/ozbek-baxshichilik-sanati', 2, 1, '2026-02-08 11:52:25', '2026-02-08 11:52:25'),
	(3, 'Test UZ', 'Test EN', NULL, NULL, NULL, NULL, '/storage/sliders/Zwxh8B4mIXbjqg9e4OEzNvFGsfY1tOuD1UubOIK5.jpg', NULL, NULL, NULL, NULL, 0, 1, '2026-02-08 13:26:18', '2026-02-08 13:26:18');

CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `alt_text_uz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_text_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_02_08_160010_create_categories_table', 1),
	(5, '2026_02_08_160018_create_articles_table', 1),
	(6, '2026_02_08_160023_create_pages_table', 1),
	(7, '2026_02_08_160028_create_media_table', 1),
	(8, '2026_02_08_160033_create_home_sliders_table', 1),
	(9, '2026_02_09_000000_create_home_sections_table', 2);

CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `title_uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_uz` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`),
  KEY `pages_category_id_foreign` (`category_id`),
  CONSTRAINT `pages_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pages` (`id`, `category_id`, `title_uz`, `title_en`, `content_uz`, `content_en`, `slug`, `status`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Loyiha haqida', 'About Project', '<h1>Loyiha haqida</h1><p>Bu yerda loyiha haqida ma\'lumot bo\'ladi.</p>', '<h1>About Project</h1><p>Information about the project will be here.</p>', 'loyiha', 'published', '2026-02-08 11:52:25', '2026-02-08 11:52:25');

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('iskO0FePFKHjtDraJmVFYyR1leDBcS59HzOojY0J', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicExhWVlZb2VKN1Y3Q3BTTkRmQkV6ZkdqSkxMVE9RWmJkbXZHMDVWSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly91emJla2ZvbGtsb3JldXoudGVzdC9hZG1pbi9ob21lX3NlY3Rpb25zIjtzOjU6InJvdXRlIjtzOjE5OiJob21lX3NlY3Rpb25zLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1770637209);

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'mrmelhay@gmail.com', '2026-02-08 11:52:25', '$2y$12$X6CE0PKsvsZacgBn5gnuQO9avjxBn9JGgCjhDYOs9wZDJ4fthvlcO', 1, NULL, '2026-02-08 11:52:25', '2026-02-08 11:52:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
