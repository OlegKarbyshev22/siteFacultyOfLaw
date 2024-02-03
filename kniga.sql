-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 11 2024 г., 16:56
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lawDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attachmentable`
--

CREATE TABLE `attachmentable` (
  `id` int UNSIGNED NOT NULL,
  `attachmentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachmentable_id` int UNSIGNED NOT NULL,
  `attachment_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `attachments`
--

CREATE TABLE `attachments` (
  `id` int UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint NOT NULL DEFAULT '0',
  `sort` int NOT NULL DEFAULT '0',
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `alt` text COLLATE utf8mb4_unicode_ci,
  `hash` text COLLATE utf8mb4_unicode_ci,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attachments`
--

INSERT INTO `attachments` (`id`, `name`, `original_name`, `mime`, `extension`, `size`, `sort`, `path`, `description`, `alt`, `hash`, `disk`, `user_id`, `group`, `created_at`, `updated_at`) VALUES
(1, '1998d769a691288b240237a1d6a7848126b85612', 'dd70a8d61b95b3468f1f31c0ab81be02fe70941c_s2_n2_y2.jpg', 'image/jpeg', 'jpg', 865584, 0, '2024/01/06/', NULL, NULL, '4499fee4bcc864bcb8b33a9bfd0ddbb0b53bbfb7', 'public', 1, NULL, '2024-01-06 14:51:04', '2024-01-06 14:51:04'),
(2, 'c626198b3ce8f6391462e22d1458b1b9e016e424', 'icon_4606.png', 'image/png', 'png', 29490, 0, '2024/01/06/', NULL, NULL, 'ffa65d2f35fa01d6bf2f795632d4f11b29d9cb3a', 'public', 1, NULL, '2024-01-06 14:51:32', '2024-01-06 14:51:32'),
(3, '1998d769a691288b240237a1d6a7848126b85612', 'dd70a8d61b95b3468f1f31c0ab81be02fe70941c_s2_n2_y2.jpg', 'image/jpeg', 'jpg', 865584, 0, '2024/01/06/', NULL, NULL, '4499fee4bcc864bcb8b33a9bfd0ddbb0b53bbfb7', 'public', 1, NULL, '2024-01-06 14:58:50', '2024-01-06 14:58:50'),
(4, '8ae5472a7c3ae6c03fb0ccd2e62960435606cfe7', 'Госы Жданов Ф.В. - в центре, слева Боголов, справа Караулов В.Ф. 1979 год.jpg', 'image/jpeg', 'jpg', 399520, 0, '2024/01/06/', NULL, NULL, 'b362b9981533e1f85a3e89832df9c2593a876cce', 'public', 1, NULL, '2024-01-06 15:03:43', '2024-01-06 15:03:43'),
(5, '1998d769a691288b240237a1d6a7848126b85612', 'dd70a8d61b95b3468f1f31c0ab81be02fe70941c_s2_n2_y2.jpg', 'image/jpeg', 'jpg', 865584, 0, '2024/01/06/', NULL, NULL, '4499fee4bcc864bcb8b33a9bfd0ddbb0b53bbfb7', 'public', 1, NULL, '2024-01-06 15:15:16', '2024-01-06 15:15:16'),
(6, '090103d774a1a957c16be175205d5dbe6df34cdf', 'white-blue-gradient-linear-1920x1080-c2-87cefa-ffffff-a-345-f-14.jpg', 'image/jpeg', 'jpg', 1360987, 0, '2024/01/06/', NULL, NULL, '976a4fa03c83d4e433b34e377559f8d8b06abe12', 'public', 1, NULL, '2024-01-06 15:19:28', '2024-01-06 15:19:28'),
(7, '0a43f353db072be656502a068a0d3d2d6cc8d331', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'image/jpeg', 'jpg', 142905, 0, '2024/01/06/', NULL, NULL, '6deffa35c4ceb51590c263123ea387ae13ea23d6', 'public', 1, NULL, '2024-01-06 15:24:02', '2024-01-06 15:24:02'),
(8, '090103d774a1a957c16be175205d5dbe6df34cdf', 'white-blue-gradient-linear-1920x1080-c2-87cefa-ffffff-a-345-f-14.jpg', 'image/jpeg', 'jpg', 1360987, 0, '2024/01/06/', NULL, NULL, '976a4fa03c83d4e433b34e377559f8d8b06abe12', 'public', 1, NULL, '2024-01-06 15:25:03', '2024-01-06 15:25:03'),
(9, '1998d769a691288b240237a1d6a7848126b85612', 'dd70a8d61b95b3468f1f31c0ab81be02fe70941c_s2_n2_y2.jpg', 'image/jpeg', 'jpg', 865584, 0, '2024/01/06/', NULL, NULL, '4499fee4bcc864bcb8b33a9bfd0ddbb0b53bbfb7', 'public', 1, NULL, '2024-01-06 15:30:07', '2024-01-06 15:30:07'),
(10, '8ae5472a7c3ae6c03fb0ccd2e62960435606cfe7', 'Госы Жданов Ф.В. - в центре, слева Боголов, справа Караулов В.Ф. 1979 год.jpg', 'image/jpeg', 'jpg', 399520, 0, '2024/01/06/', NULL, NULL, 'b362b9981533e1f85a3e89832df9c2593a876cce', 'public', 1, NULL, '2024-01-06 15:58:47', '2024-01-06 15:58:47'),
(11, '0a43f353db072be656502a068a0d3d2d6cc8d331', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'image/jpeg', 'jpg', 142905, 0, '2024/01/06/', NULL, NULL, '6deffa35c4ceb51590c263123ea387ae13ea23d6', 'public', 1, NULL, '2024-01-06 16:12:24', '2024-01-06 16:12:24'),
(12, '0a43f353db072be656502a068a0d3d2d6cc8d331', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'image/jpeg', 'jpg', 142905, 0, '2024/01/06/', NULL, NULL, '6deffa35c4ceb51590c263123ea387ae13ea23d6', 'public', 1, NULL, '2024-01-06 16:15:42', '2024-01-06 16:15:42'),
(13, '0a43f353db072be656502a068a0d3d2d6cc8d331', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'image/jpeg', 'jpg', 142905, 0, '2024/01/06/', NULL, NULL, '6deffa35c4ceb51590c263123ea387ae13ea23d6', 'public', 1, NULL, '2024-01-07 13:09:43', '2024-01-07 13:09:43'),
(14, '090103d774a1a957c16be175205d5dbe6df34cdf', 'white-blue-gradient-linear-1920x1080-c2-87cefa-ffffff-a-345-f-14.jpg', 'image/jpeg', 'jpg', 1360987, 0, '2024/01/06/', NULL, NULL, '976a4fa03c83d4e433b34e377559f8d8b06abe12', 'public', 1, NULL, '2024-01-07 13:09:52', '2024-01-07 13:09:52'),
(15, '61c598a77edbb9398d2d1a793473adccfcf83553', 'Вручение почет грамоты первой выпускнице ВЮЗИ Овсянниковой_jHfa0bz.jpg', 'image/jpeg', 'jpg', 481070, 0, '2024/01/07/', NULL, NULL, '6f1834dc89e63a42eb72462cf59189f6c9d3db20', 'public', 1, NULL, '2024-01-07 13:10:22', '2024-01-07 13:10:22'),
(16, '61c598a77edbb9398d2d1a793473adccfcf83553', 'Вручение почет грамоты первой выпускнице ВЮЗИ Овсянниковой_jHfa0bz.jpg', 'image/jpeg', 'jpg', 481070, 0, '2024/01/07/', NULL, NULL, '6f1834dc89e63a42eb72462cf59189f6c9d3db20', 'public', 1, NULL, '2024-01-07 13:10:32', '2024-01-07 13:10:32');

-- --------------------------------------------------------

--
-- Структура таблицы `contents`
--

CREATE TABLE `contents` (
  `id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contents`
--

INSERT INTO `contents` (`id`, `section_id`, `description`, `path_image`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>За три десятилетия существования юридический факультет превратился в базовый научно-образовательный центр региона. При этом факультет старается сохранять традиции академического образования, заложенные в первые годы становления, когда университет был филиалом МГУ им. Ломоносова.&nbsp;Выпускники факультета осуществляют профессиональную деятельность в области юриспруденции.&nbsp;За период деятельности факультета по дневной и заочной форме обучения подготовлено свыше 6 тысяч дипломированных специалистов.</p>', NULL, '2024-01-05 08:13:05', '2024-01-05 08:13:05'),
(2, 2, '<p>В состав факультета входят следующие <strong>кафедры</strong>:</p><ul><li>кафедра теории и истории государства и права</li><li>кафедра гражданского и предпринимательского права</li><li>кафедра уголовного права</li><li>кафедра уголовного процесса</li><li>кафедра государственного и административного права </li><li>кафедра конституционного, административного и граждаснкого процесса</li></ul>', NULL, '2024-01-05 08:13:59', '2024-01-05 08:13:59'),
(3, 3, '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur totam beatae impedit deleniti temporibus vero aliquam dolorem, voluptatum repudiandae incidunt, esse alias similique maiores unde vitae ipsa animi! Quisquam, voluptate.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi quod ducimus, reprehenderit illo consequatur minima eveniet, accusamus suscipit ea animi, odit minus modi. Architecto neque quisquam earum odit vitae eligendi?</p><p><strong>Об основных направлениях научной деятельности:</strong></p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, corrupti eum debitis beatae, facilis fuga facere, voluptates molestiae quaerat doloremque asperiores veritatis possimus hic iusto tempore ullam expedita id rerum?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In ut provident cupiditate vel ipsa. Dolor ab odit fuga sit nesciunt enim vero nemo minus laborum, neque sunt dolorem quam incidunt?</p><p><strong>Студенческая наука:</strong></p><p><span class=\"ql-cursor\">﻿</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, corrupti eum debitis beatae, facilis fuga facere, voluptates molestiae quaerat doloremque asperiores veritatis possimus hic iusto tempore ullam expedita id rerum?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In ut provident cupiditate vel ipsa. Dolor ab odit fuga sit nesciunt enim vero nemo minus laborum, neque sunt dolorem quam incidunt?</p>', 'lovepik-business-men-in-suits-picture_501462426.jpg', '2024-01-05 08:15:44', '2024-01-05 08:15:44'),
(4, 4, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet quae, odio asperiores nemo doloremque numquam repellendus earum? Possimus quidem sint accusantium placeat eum distinctio voluptatem voluptas atque animi dolore.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, numquam itaque laboriosam natus non vero ex, voluptates accusantium dicta reprehenderit debitis modi nisi perspiciatis quibusdam ducimus ullam error unde odit.</p>', NULL, '2024-01-05 08:16:18', '2024-01-05 08:16:18'),
(5, 5, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet quae, odio asperiores nemo doloremque numquam repellendus earum? Possimus quidem sint accusantium placeat eum distinctio voluptatem voluptas atque animi dolore.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, numquam itaque laboriosam natus non vero ex, voluptates accusantium dicta reprehenderit debitis modi nisi perspiciatis quibusdam ducimus ullam error unde odit.</p>', NULL, '2024-01-05 08:16:24', '2024-01-05 08:16:24'),
(6, 6, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet quae, odio asperiores nemo doloremque numquam repellendus earum? Possimus quidem sint accusantium placeat eum distinctio voluptatem voluptas atque animi dolore.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, numquam itaque laboriosam natus non vero ex, voluptates accusantium dicta reprehenderit debitis modi nisi perspiciatis quibusdam ducimus ullam error unde odit.</p>', NULL, '2024-01-05 08:16:30', '2024-01-05 08:16:30'),
(7, 7, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet quae, odio asperiores nemo doloremque numquam repellendus earum? Possimus quidem sint accusantium placeat eum distinctio voluptatem voluptas atque animi dolore.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, numquam itaque laboriosam natus non vero ex, voluptates accusantium dicta reprehenderit debitis modi nisi perspiciatis quibusdam ducimus ullam error unde odit.</p>', NULL, '2024-01-05 08:16:41', '2024-01-05 08:16:41'),
(8, 8, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet quae, odio asperiores nemo doloremque numquam repellendus earum? Possimus quidem sint accusantium placeat eum distinctio voluptatem voluptas atque animi dolore.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, numquam itaque laboriosam natus non vero ex, voluptates accusantium dicta reprehenderit debitis modi nisi perspiciatis quibusdam ducimus ullam error unde odit.</p>', NULL, '2024-01-05 08:16:56', '2024-01-05 08:16:56'),
(9, 9, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet quae, odio asperiores nemo doloremque numquam repellendus earum? Possimus quidem sint accusantium placeat eum distinctio voluptatem voluptas atque animi dolore.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, numquam itaque laboriosam natus non vero ex, voluptates accusantium dicta reprehenderit debitis modi nisi perspiciatis quibusdam ducimus ullam error unde odit.</p>', NULL, '2024-01-05 08:17:02', '2024-01-05 08:17:02'),
(10, 10, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet quae, odio asperiores nemo doloremque numquam repellendus earum? Possimus quidem sint accusantium placeat eum distinctio voluptatem voluptas atque animi dolore.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, numquam itaque laboriosam natus non vero ex, voluptates accusantium dicta reprehenderit debitis modi nisi perspiciatis quibusdam ducimus ullam error unde odit.</p>', NULL, '2024-01-05 08:17:44', '2024-01-05 08:17:44');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `law_in_time`
--

CREATE TABLE `law_in_time` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `law_in_time`
--

INSERT INTO `law_in_time` (`id`, `title`, `path_image`, `created_at`, `updated_at`) VALUES
(1, '1974-1999 годы: УКП ВЮЗИ', 'Вручение почет грамоты первой выпускнице ВЮЗИ Овсянниковой_jHfa0bz.jpg', '2024-01-05 08:04:22', '2024-01-05 08:04:22'),
(2, '1999-1999 годы: филиал МГЮА', 'Госы Жданов Ф.В. - в центре, слева Боголов, справа Караулов В.Ф. 1979 год.jpg', '2024-01-05 08:04:36', '2024-01-05 08:04:36'),
(3, '1999-2009 годы: Институт права и государственной службы УлГУ', 'Госы Жданов Ф.В. - в центре, слева Боголов, справа Караулов В.Ф. 1979 год.jpg', '2024-01-05 08:04:47', '2024-01-05 08:04:47'),
(4, '2009-2023 годы: Юридический факультет УлГУ', 'Вручение студ билета и зач кн первым студентам - 1974 г. Михаилу Юртанову.jpg', '2024-01-05 08:05:22', '2024-01-05 08:05:22');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2015_04_12_000000_create_orchid_users_table', 1),
(4, '2015_10_19_214424_create_orchid_roles_table', 1),
(5, '2015_10_19_214425_create_orchid_role_users_table', 1),
(6, '2016_08_07_125128_create_orchid_attachmentstable_table', 1),
(7, '2017_09_17_125801_create_notifications_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_12_22_223035_create_news_table', 1),
(11, '2023_12_27_173137_create_law_in_time_table', 1),
(12, '2023_12_29_182245_create_outstanding_people_table', 1),
(13, '2024_01_03_074812_create_sections_table', 1),
(14, '2024_01_03_075139_create_contents_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `author` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('rejected','consideration','approved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `author`, `email`, `phone`, `title`, `description`, `path_image`, `status`, `created_at`, `updated_at`) VALUES
(3, NULL, NULL, NULL, 'аываы', '<p><br></p><p>&lt;p&gt;&lt;img src=\"http://localhost:8000/storage/2024/01/06/1998d769a691288b240237a1d6a7848126b85612.jpg\"&gt;&lt;/p&gt;</p>', 'white-blue-gradient-linear-1920x1080-c2-87cefa-ffffff-a-345-f-14.jpg', 'approved', '2024-01-06 15:15:24', '2024-01-06 15:56:39'),
(4, NULL, NULL, NULL, 'авыаыАВЫАЫВАВЫ', '<p>http://127.0.0.1:8000/storage/2024/01/06/090103d774a1a957c16be175205d5dbe6df34cdf.jpg</p>', 'white-blue-gradient-linear-1920x1080-c2-87cefa-ffffff-a-345-f-14.jpg', 'approved', '2024-01-06 15:19:30', '2024-01-06 15:52:05'),
(5, NULL, NULL, NULL, 'dadawdad', '<p><span style=\"color: rgb(33, 37, 41);\">&lt;p&gt;dawdawdad &lt;img src=\"/storage/2024/01/06/1998d769a691288b240237a1d6a7848126b85612.jpg\"&gt;&lt;/p&gt;</span></p>', 'Вручение почет грамоты первой выпускнице ВЮЗИ Овсянниковой_jHfa0bz.jpg', 'approved', '2024-01-06 15:30:09', '2024-01-06 15:41:02'),
(6, NULL, NULL, NULL, 'вфцвфц', '<p><img src=\"http://localhost/storage/2024/01/06/8ae5472a7c3ae6c03fb0ccd2e62960435606cfe7.jpg\"></p>', 'back_fon.jpg', 'approved', '2024-01-06 15:58:48', '2024-01-06 15:58:48'),
(7, NULL, NULL, NULL, 'авы', '<p><img src=\"http://localhost:8000/storage/2024/01/07/61c598a77edbb9398d2d1a793473adccfcf83553.jpg\"></p><p>dawdadwdaawdaddaw</p><p><img src=\"http://localhost:8000/storage/2024/01/07/61c598a77edbb9398d2d1a793473adccfcf83553.jpg\"></p>', 'VK Logo.png', 'approved', '2024-01-06 16:12:34', '2024-01-07 13:10:34');

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `outstanding_people`
--

CREATE TABLE `outstanding_people` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('facesVictory','gloriousName','leaderships','soldiers','memorialBooks') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `outstanding_people`
--

INSERT INTO `outstanding_people` (`id`, `first_name`, `last_name`, `patronymic`, `description`, `path_image`, `category`, `created_at`, `updated_at`) VALUES
(1, '-', '-', '-', NULL, 'lovepik-business-men-in-suits-picture_501462426.jpg', 'soldiers', '2024-01-05 07:33:35', '2024-01-05 07:33:35'),
(2, '-', '-', '-', NULL, 'lovepik-business-men-in-suits-picture_501462426.jpg', 'soldiers', '2024-01-05 07:33:42', '2024-01-05 07:33:42'),
(3, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'soldiers', '2024-01-05 07:33:49', '2024-01-05 07:33:49'),
(4, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'soldiers', '2024-01-05 07:33:55', '2024-01-05 07:33:55'),
(5, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'soldiers', '2024-01-05 07:34:01', '2024-01-05 07:34:01'),
(6, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'soldiers', '2024-01-05 07:34:10', '2024-01-05 07:34:10'),
(7, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'soldiers', '2024-01-05 07:34:24', '2024-01-05 07:34:24'),
(8, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'soldiers', '2024-01-05 07:34:32', '2024-01-05 07:34:32'),
(9, '-', '-', '-', NULL, 'lovepik-business-men-in-suits-picture_501462426.jpg', 'soldiers', '2024-01-05 07:34:39', '2024-01-05 07:34:39'),
(10, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'soldiers', '2024-01-05 07:34:47', '2024-01-05 07:34:47'),
(11, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'soldiers', '2024-01-05 07:34:54', '2024-01-05 07:34:54'),
(12, '-', '-', '-', NULL, 'lovepik-business-men-in-suits-picture_501462426.jpg', 'gloriousName', '2024-01-05 07:59:53', '2024-01-05 07:59:53'),
(13, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'gloriousName', '2024-01-05 08:00:00', '2024-01-05 08:00:00'),
(14, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'gloriousName', '2024-01-05 08:00:06', '2024-01-05 08:00:06'),
(15, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'gloriousName', '2024-01-05 08:00:14', '2024-01-05 08:00:14'),
(16, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'gloriousName', '2024-01-05 08:00:21', '2024-01-05 08:00:21'),
(17, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'gloriousName', '2024-01-05 08:00:27', '2024-01-05 08:00:27'),
(18, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'gloriousName', '2024-01-05 08:00:37', '2024-01-05 08:00:37'),
(19, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'gloriousName', '2024-01-05 08:00:45', '2024-01-05 08:00:45'),
(20, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'gloriousName', '2024-01-05 08:00:50', '2024-01-05 08:00:50'),
(21, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'facesVictory', '2024-01-05 08:01:01', '2024-01-05 08:01:01'),
(22, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'facesVictory', '2024-01-05 08:01:07', '2024-01-05 08:01:07'),
(23, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'facesVictory', '2024-01-05 08:01:13', '2024-01-05 08:01:13'),
(24, '-', '-', '--', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'facesVictory', '2024-01-05 08:01:22', '2024-01-05 08:01:22'),
(25, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'facesVictory', '2024-01-05 08:01:29', '2024-01-05 08:01:29'),
(26, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'facesVictory', '2024-01-05 08:01:36', '2024-01-05 08:01:36'),
(27, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'facesVictory', '2024-01-05 08:01:47', '2024-01-05 08:01:47'),
(28, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'facesVictory', '2024-01-05 08:01:52', '2024-01-05 08:01:52'),
(29, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'leaderships', '2024-01-05 08:02:27', '2024-01-05 08:02:27'),
(30, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'leaderships', '2024-01-05 08:02:32', '2024-01-05 08:02:32'),
(31, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'leaderships', '2024-01-05 08:02:38', '2024-01-05 08:02:38'),
(32, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'memorialBooks', '2024-01-05 08:02:44', '2024-01-05 08:02:44'),
(33, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'memorialBooks', '2024-01-05 08:02:49', '2024-01-05 08:02:49'),
(34, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'memorialBooks', '2024-01-05 08:02:55', '2024-01-05 08:02:55'),
(35, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'memorialBooks', '2024-01-05 08:03:02', '2024-01-05 08:03:02'),
(36, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'memorialBooks', '2024-01-05 08:03:07', '2024-01-05 08:03:07'),
(37, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'memorialBooks', '2024-01-05 08:03:14', '2024-01-05 08:03:14'),
(38, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'memorialBooks', '2024-01-05 08:03:23', '2024-01-05 08:03:23'),
(39, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'memorialBooks', '2024-01-05 08:03:29', '2024-01-05 08:03:29'),
(40, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'memorialBooks', '2024-01-05 08:03:34', '2024-01-05 08:03:34'),
(41, '-', '-', '-', '-', 'lovepik-business-men-in-suits-picture_501462426.jpg', 'memorialBooks', '2024-01-05 08:03:41', '2024-01-05 08:03:41');

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `role_users`
--

CREATE TABLE `role_users` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'О факультете сегодня', '2024-01-05 08:06:01', '2024-01-05 08:06:01'),
(2, 'Кафедры - основа научно-образовательной деятельности факультета', '2024-01-05 08:06:07', '2024-01-05 08:06:07'),
(3, 'Научная деятельность', '2024-01-05 08:06:15', '2024-01-05 08:06:15'),
(4, 'Диссертационный совет', '2024-01-05 08:06:27', '2024-01-05 08:06:27'),
(5, 'Научно-образовательный центр правовых исследований', '2024-01-05 08:06:34', '2024-01-05 08:06:34'),
(6, 'Воспитательная деятельность и студенческое самоуправление', '2024-01-05 08:06:41', '2024-01-05 08:06:41'),
(7, 'ЮРИДИЧЕСКИЙ ФАКУЛЬТЕТ В ПРОСТРАНСТВЕ', '2024-01-05 08:06:50', '2024-01-05 08:06:50'),
(8, 'Профессионально-общественная аккредитация', '2024-01-05 08:06:56', '2024-01-05 08:06:56'),
(9, 'Взаимодействие с АЮР', '2024-01-05 08:07:04', '2024-01-05 08:07:04'),
(10, 'Экспертные советы', '2024-01-05 08:07:10', '2024-01-05 08:07:10');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissions` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `permissions`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$12$XIaxzjRP6Pn7zQqzQRdaH.hOUUv1XofUE1g4DYj5A6kgoas73Q3mC', 'ZAsPRAUYKtWkREFThT5IbzVIJberAM4jV2viwhp1qYm4VnYEEiIXsf4wQ56J', '2024-01-05 07:29:29', '2024-01-05 07:29:29', '{\"platform.index\": true, \"platform.systems.roles\": true, \"platform.systems.users\": true, \"platform.systems.attachment\": true}');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attachmentable`
--
ALTER TABLE `attachmentable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachmentable_attachmentable_type_attachmentable_id_index` (`attachmentable_type`,`attachmentable_id`),
  ADD KEY `attachmentable_attachment_id_foreign` (`attachment_id`);

--
-- Индексы таблицы `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_section_id_foreign` (`section_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `law_in_time`
--
ALTER TABLE `law_in_time`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Индексы таблицы `outstanding_people`
--
ALTER TABLE `outstanding_people`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Индексы таблицы `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attachmentable`
--
ALTER TABLE `attachmentable`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `law_in_time`
--
ALTER TABLE `law_in_time`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `outstanding_people`
--
ALTER TABLE `outstanding_people`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attachmentable`
--
ALTER TABLE `attachmentable`
  ADD CONSTRAINT `attachmentable_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
