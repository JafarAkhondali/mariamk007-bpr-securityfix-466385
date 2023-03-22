-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Mar 2023 pada 20.04
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_groups`
--

CREATE TABLE `aauth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_groups`
--

INSERT INTO `aauth_groups` (`id`, `name`, `definition`) VALUES
(1, 'Admin', 'Superadmin Group'),
(2, 'Public', 'Public Group'),
(3, 'Default', 'Default Access Group'),
(4, 'Member', 'Member Access Group');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_group_to_group`
--

CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `subgroup_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_login_attempts`
--

CREATE TABLE `aauth_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(39) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_login_attempts`
--

INSERT INTO `aauth_login_attempts` (`id`, `ip_address`, `timestamp`, `login_attempts`) VALUES
(14, '::1', '2023-03-03 19:21:02', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perms`
--

CREATE TABLE `aauth_perms` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_perms`
--

INSERT INTO `aauth_perms` (`id`, `name`, `definition`) VALUES
(1, 'menu_dashboard', NULL),
(2, 'menu_crud_builder', NULL),
(3, 'menu_api_builder', NULL),
(4, 'menu_page_builder', NULL),
(5, 'menu_form_builder', NULL),
(6, 'menu_menu', NULL),
(7, 'menu_auth', NULL),
(8, 'menu_user', NULL),
(9, 'menu_group', NULL),
(10, 'menu_access', NULL),
(11, 'menu_permission', NULL),
(12, 'menu_api_documentation', NULL),
(13, 'menu_web_documentation', NULL),
(14, 'menu_settings', NULL),
(15, 'user_list', NULL),
(16, 'user_update_status', NULL),
(17, 'user_export', NULL),
(18, 'user_add', NULL),
(19, 'user_update', NULL),
(20, 'user_update_profile', NULL),
(21, 'user_update_password', NULL),
(22, 'user_profile', NULL),
(23, 'user_view', NULL),
(24, 'user_delete', NULL),
(25, 'blog_list', NULL),
(26, 'blog_export', NULL),
(27, 'blog_add', NULL),
(28, 'blog_update', NULL),
(29, 'blog_view', NULL),
(30, 'blog_delete', NULL),
(31, 'form_list', NULL),
(32, 'form_export', NULL),
(33, 'form_add', NULL),
(34, 'form_update', NULL),
(35, 'form_view', NULL),
(36, 'form_manage', NULL),
(37, 'form_delete', NULL),
(38, 'crud_list', NULL),
(39, 'crud_export', NULL),
(40, 'crud_add', NULL),
(41, 'crud_update', NULL),
(42, 'crud_view', NULL),
(43, 'crud_delete', NULL),
(44, 'rest_list', NULL),
(45, 'rest_export', NULL),
(46, 'rest_add', NULL),
(47, 'rest_update', NULL),
(48, 'rest_view', NULL),
(49, 'rest_delete', NULL),
(50, 'group_list', NULL),
(51, 'group_export', NULL),
(52, 'group_add', NULL),
(53, 'group_update', NULL),
(54, 'group_view', NULL),
(55, 'group_delete', NULL),
(56, 'permission_list', NULL),
(57, 'permission_export', NULL),
(58, 'permission_add', NULL),
(59, 'permission_update', NULL),
(60, 'permission_view', NULL),
(61, 'permission_delete', NULL),
(62, 'access_list', NULL),
(63, 'access_add', NULL),
(64, 'access_update', NULL),
(65, 'menu_list', NULL),
(66, 'menu_add', NULL),
(67, 'menu_update', NULL),
(68, 'menu_delete', NULL),
(69, 'menu_save_ordering', NULL),
(70, 'menu_type_add', NULL),
(71, 'page_list', NULL),
(72, 'page_export', NULL),
(73, 'page_add', NULL),
(74, 'page_update', NULL),
(75, 'page_view', NULL),
(76, 'page_delete', NULL),
(77, 'blog_list', NULL),
(78, 'blog_export', NULL),
(79, 'blog_add', NULL),
(80, 'blog_update', NULL),
(81, 'blog_view', NULL),
(82, 'blog_delete', NULL),
(83, 'setting', NULL),
(84, 'setting_update', NULL),
(85, 'dashboard', NULL),
(86, 'extension_list', NULL),
(87, 'extension_activate', NULL),
(88, 'extension_deactivate', NULL),
(89, 'database_list', ''),
(90, 'menu_beranda', ''),
(91, 'menu_profil', ''),
(92, 'menu_produk', ''),
(93, 'menu_dokumentasi', ''),
(94, 'menu_artikel', ''),
(95, 'menu_blog_artikel', ''),
(96, 'menu_faq', ''),
(97, 'menu_kritik_dan_saran', ''),
(98, 'menu_kontak_pelayanan', ''),
(99, 'menu_kontak_pelayanana', ''),
(100, 'menu_sasas', ''),
(101, 'menu_bloooog_artikel', ''),
(102, 'menu_sasasartikel', ''),
(103, 'menu_kontak', ''),
(104, 'menu_blog', ''),
(105, 'menu_kritik', ''),
(111, 'produk_add', ''),
(112, 'produk_update', ''),
(113, 'produk_view', ''),
(114, 'produk_delete', ''),
(115, 'produk_list', ''),
(116, 'kategori_produk_add', ''),
(117, 'kategori_produk_update', ''),
(118, 'kategori_produk_view', ''),
(119, 'kategori_produk_delete', ''),
(120, 'kategori_produk_list', ''),
(126, 'job_deskripsi_pekerjaan_add', ''),
(127, 'job_deskripsi_pekerjaan_update', ''),
(128, 'job_deskripsi_pekerjaan_view', ''),
(129, 'job_deskripsi_pekerjaan_delete', ''),
(130, 'job_deskripsi_pekerjaan_list', ''),
(131, 'sejarah_perusahaan_add', ''),
(132, 'sejarah_perusahaan_update', ''),
(133, 'sejarah_perusahaan_view', ''),
(134, 'sejarah_perusahaan_delete', ''),
(135, 'sejarah_perusahaan_list', ''),
(136, 'dokumentasi_add', ''),
(137, 'dokumentasi_update', ''),
(138, 'dokumentasi_view', ''),
(139, 'dokumentasi_delete', ''),
(140, 'dokumentasi_list', ''),
(141, 'artikel_add', ''),
(142, 'artikel_update', ''),
(143, 'artikel_view', ''),
(144, 'artikel_delete', ''),
(145, 'artikel_list', ''),
(146, 'menu_data_pengajuan_kredit', ''),
(147, 'menu_survei_lapangan', ''),
(148, 'menu_status_pengajuan_kredit', ''),
(149, 'menu_laporan_pengajuan_kredit', ''),
(150, 'menu_data_pegawai', ''),
(151, 'menu_data_artikel', ''),
(152, 'menu_komentar', ''),
(153, 'menu_kategori_produk', ''),
(154, 'menu_main_menu', ''),
(155, 'menu_job_deskripsi_pekerjaan', ''),
(156, 'menu_sejarah_perusahaan', ''),
(157, 'menu_artikel_blog', ''),
(158, 'faq_add', ''),
(159, 'faq_update', ''),
(160, 'faq_view', ''),
(161, 'faq_delete', ''),
(162, 'faq_list', ''),
(163, 'survei_lapangan_add', ''),
(164, 'survei_lapangan_update', ''),
(165, 'survei_lapangan_view', ''),
(166, 'survei_lapangan_delete', ''),
(167, 'survei_lapangan_list', ''),
(168, 'pegawai_add', ''),
(169, 'pegawai_update', ''),
(170, 'pegawai_view', ''),
(171, 'pegawai_delete', ''),
(172, 'pegawai_list', ''),
(173, 'kritik_add', ''),
(174, 'kritik_update', ''),
(175, 'kritik_view', ''),
(176, 'kritik_delete', ''),
(177, 'kritik_list', ''),
(178, 'menu_kredit', ''),
(179, 'kredit_add', ''),
(180, 'kredit_update', ''),
(181, 'kredit_view', ''),
(182, 'kredit_delete', ''),
(183, 'kredit_list', ''),
(184, 'pengajuan_kredit_add', ''),
(185, 'pengajuan_kredit_update', ''),
(186, 'pengajuan_kredit_view', ''),
(187, 'pengajuan_kredit_delete', ''),
(188, 'pengajuan_kredit_list', ''),
(189, 'pengajuan_kredit_export', ''),
(190, 'database_view', ''),
(191, 'chat_list', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perm_to_group`
--

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_perm_to_group`
--

INSERT INTO `aauth_perm_to_group` (`perm_id`, `group_id`) VALUES
(90, 2),
(96, 2),
(97, 2),
(95, 2),
(95, 2),
(95, 2),
(98, 2),
(95, 2),
(95, 2),
(95, 2),
(95, 2),
(95, 2),
(95, 2),
(95, 2),
(95, 1),
(95, 2),
(95, 1),
(95, 2),
(95, 1),
(95, 2),
(95, 1),
(95, 2),
(95, 3),
(95, 1),
(95, 2),
(95, 3),
(99, 2),
(95, 2),
(101, 2),
(103, 2),
(97, 2),
(105, 2),
(91, 2),
(92, 2),
(93, 2),
(104, 2),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(92, 1),
(153, 1),
(155, 1),
(148, 1),
(149, 1),
(150, 1),
(156, 1),
(93, 1),
(1, 4),
(92, 4),
(93, 4),
(95, 4),
(146, 4),
(147, 4),
(148, 4),
(149, 4),
(150, 4),
(151, 4),
(153, 4),
(155, 4),
(156, 4),
(111, 4),
(112, 4),
(113, 4),
(114, 4),
(115, 4),
(116, 4),
(117, 4),
(118, 4),
(119, 4),
(120, 4),
(126, 4),
(127, 4),
(128, 4),
(129, 4),
(130, 4),
(131, 4),
(132, 4),
(133, 4),
(134, 4),
(135, 4),
(136, 4),
(137, 4),
(138, 4),
(139, 4),
(140, 4),
(141, 4),
(142, 4),
(143, 4),
(144, 4),
(145, 4),
(96, 1),
(96, 4),
(157, 1),
(157, 4),
(147, 1),
(147, 4),
(150, 1),
(150, 4),
(152, 1),
(152, 4),
(178, 1),
(178, 4),
(146, 1),
(146, 4),
(149, 1),
(149, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perm_to_user`
--

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_pms`
--

CREATE TABLE `aauth_pms` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `message` text DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user`
--

CREATE TABLE `aauth_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_users`
--

CREATE TABLE `aauth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `oauth_uid` text DEFAULT NULL,
  `oauth_provider` varchar(100) DEFAULT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `avatar` text NOT NULL,
  `banned` tinyint(1) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text DEFAULT NULL,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text DEFAULT NULL,
  `verification_code` text DEFAULT NULL,
  `top_secret` varchar(16) DEFAULT NULL,
  `ip_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `pass`, `username`, `full_name`, `avatar`, `banned`, `last_login`, `last_activity`, `date_created`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `top_secret`, `ip_address`) VALUES
(1, 'admin@bpr.com', NULL, NULL, 'ec225039f1cb0c48ad528709e8e0184991e637d96db175f094b6b2037ec1a3c2', 'admin', 'admin', '', 0, '2023-03-04 23:01:24', '2023-03-04 23:01:24', '2023-02-26 03:00:46', NULL, NULL, NULL, NULL, NULL, '::1'),
(2, 'management@bpr.com', NULL, NULL, '4f5195877dc112578769fcd2bc0966e6a6a150d54c4d027481d19a1b4992cbe2', 'management', 'Management', 'default.png', 0, '2023-03-03 23:07:41', '2023-03-03 23:07:41', '2023-03-03 19:20:17', NULL, NULL, NULL, NULL, NULL, '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user_to_group`
--

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 3),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user_variables`
--

CREATE TABLE `aauth_user_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `deskripsi_artikel` varchar(100) NOT NULL,
  `isi_artikel` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul_artikel`, `deskripsi_artikel`, `isi_artikel`, `photo`) VALUES
(1, 'Artikel 1', 'Deskripsi Singkat Artikel 1', 'Isi artikel 1', '20230301204230-2023-03-01artikel202318.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `tags` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `author` varchar(100) NOT NULL,
  `viewers` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_category`
--

CREATE TABLE `blog_category` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `blog_category`
--

INSERT INTO `blog_category` (`category_id`, `category_name`, `category_desc`) VALUES
(1, 'Keuangan', ''),
(2, 'Kredit', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` int(11) UNSIGNED NOT NULL,
  `captcha_time` int(10) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(1, 1677383110, '::1', 'H6RJ'),
(2, 1677383172, '::1', 'RNFC'),
(3, 1677383203, '::1', 'TZ6Q'),
(4, 1677383275, '::1', 'L0MV'),
(5, 1677383318, '::1', '2LPK'),
(6, 1677383319, '::1', '7YHR'),
(7, 1677383320, '::1', 'JE9W'),
(8, 1677383668, '::1', '61LI'),
(9, 1677383668, '::1', '8RXC'),
(10, 1677383727, '::1', '4AGX'),
(11, 1677383746, '::1', 'BVOZ'),
(12, 1677383753, '::1', '7Z26'),
(13, 1677383790, '::1', 'FT8T'),
(14, 1677383799, '::1', 'KA4O'),
(15, 1677383817, '::1', 'HLOJ'),
(16, 1677383858, '::1', '15WQ'),
(17, 1677383872, '::1', '9OIX'),
(18, 1677383928, '::1', 'UAZO'),
(19, 1677383936, '::1', '4NRA'),
(20, 1677383946, '::1', 'M3YH'),
(21, 1677383973, '::1', '6ZLC'),
(22, 1677383994, '::1', 'JOHX'),
(23, 1677383998, '::1', '96T6'),
(24, 1677384011, '::1', 'Q378'),
(25, 1677384015, '::1', 'FJK8'),
(26, 1677384027, '::1', '6ANX'),
(27, 1677384045, '::1', '2E5W'),
(28, 1677384099, '::1', 'N86Q'),
(29, 1677384106, '::1', 'LGOB'),
(30, 1677384110, '::1', '1TRX'),
(31, 1677384133, '::1', 'TW6S'),
(32, 1677387186, '::1', 'BAVY'),
(33, 1677387232, '::1', 'GTWT'),
(34, 1677387235, '::1', '4EA9'),
(35, 1677387236, '::1', '88KR'),
(36, 1677387267, '::1', 'YQMQ'),
(37, 1677387272, '::1', 'HZLE'),
(38, 1677387276, '::1', '3CNJ'),
(39, 1677387341, '::1', 'YW61');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cc_options`
--

CREATE TABLE `cc_options` (
  `id` int(11) UNSIGNED NOT NULL,
  `option_name` varchar(200) NOT NULL,
  `option_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cc_options`
--

INSERT INTO `cc_options` (`id`, `option_name`, `option_value`) VALUES
(1, 'enable_disqus', NULL),
(2, 'disqus_id', 'cicool'),
(3, 'enable_api_builder', NULL),
(4, 'enable_crud_builder', NULL),
(5, 'enable_form_builder', NULL),
(6, 'enable_page_builder', NULL),
(7, 'site_name', 'BPR Arsham Sejahtera'),
(8, 'email', 'admin@bpr.com'),
(9, 'author', ''),
(10, 'site_description', 'BPR Arsham Sejahtera adalah perbankan yang sangat maju. Kami siap melyani anda.'),
(11, 'keywords', ''),
(12, 'landing_page_id', 'default'),
(13, 'timezone', 'Asia/Jakarta'),
(14, 'active_theme', 'cicool'),
(15, 'limit_pagination', '10'),
(16, 'google_id', ''),
(17, 'google_secret', ''),
(18, 'chat_fb_url', ''),
(19, 'logo', '20230226125551-2023-02-26setting125549.jpg'),
(23, 'call_center_1', '021'),
(24, 'call_center_2', '081'),
(25, 'call_center_1', '021'),
(26, 'chat_fb_key', 'ebed12c1f9d1dfbcccb192bc5cc7d065');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cc_session`
--

CREATE TABLE `cc_session` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id` int(11) UNSIGNED NOT NULL,
  `chat_uid` varchar(100) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_contact`
--

CREATE TABLE `chat_contact` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_message`
--

CREATE TABLE `chat_message` (
  `id` int(11) UNSIGNED NOT NULL,
  `message_user_id` int(11) NOT NULL,
  `chat_id` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud`
--

CREATE TABLE `crud` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `sort_by` varchar(50) DEFAULT NULL,
  `sort_field` varchar(255) DEFAULT NULL,
  `javascript` text DEFAULT NULL,
  `style` text DEFAULT NULL,
  `javascript_setting_detail` text DEFAULT NULL,
  `javascript_setting_update` text DEFAULT NULL,
  `javascript_setting_create` text DEFAULT NULL,
  `javascript_setting_list` text DEFAULT NULL,
  `primary_key` varchar(200) NOT NULL,
  `page_read` varchar(20) DEFAULT NULL,
  `page_create` varchar(20) DEFAULT NULL,
  `page_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud`
--

INSERT INTO `crud` (`id`, `title`, `subject`, `table_name`, `sort_by`, `sort_field`, `javascript`, `style`, `javascript_setting_detail`, `javascript_setting_update`, `javascript_setting_create`, `javascript_setting_list`, `primary_key`, `page_read`, `page_create`, `page_update`) VALUES
(2, 'Produk', 'Produk', 'produk', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(3, 'Kategori Produk', 'Kategori Produk', 'kategori_produk', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(5, 'Job Deskripsi Pekerjaan', 'Job Deskripsi Pekerjaan', 'job_deskripsi_pekerjaan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(6, 'Sejarah Perusahaan', 'Sejarah Perusahaan', 'sejarah_perusahaan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(7, 'Dokumentasi', 'Dokumentasi', 'dokumentasi', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(8, 'Artikel', 'Artikel', 'artikel', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(9, 'Faq', 'Faq', 'faq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(10, 'Survei Lapangan', 'Survei Lapangan', 'survei_lapangan', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(11, 'Data Pegawai', 'Pegawai', 'pegawai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(12, 'Kritik', 'Kritik', 'kritik', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(13, 'Kredit', 'Kredit', 'kredit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(14, 'Pengajuan Kredit', 'Pengajuan Kredit', 'pengajuan_kredit', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_action`
--

CREATE TABLE `crud_action` (
  `id` int(11) UNSIGNED NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `action` varchar(200) NOT NULL,
  `meta` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_custom_option`
--

CREATE TABLE `crud_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_custom_option`
--

INSERT INTO `crud_custom_option` (`id`, `crud_field_id`, `crud_id`, `option_value`, `option_label`) VALUES
(3, 125, 14, 'ditolak', 'Ditolak'),
(4, 125, 14, 'diterima', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field`
--

CREATE TABLE `crud_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `help_block` text DEFAULT NULL,
  `placeholder` text DEFAULT NULL,
  `auto_generate_help_block` varchar(40) DEFAULT NULL,
  `wrapper_class` text DEFAULT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_form` varchar(10) DEFAULT NULL,
  `show_update_form` varchar(10) DEFAULT NULL,
  `show_detail_page` varchar(10) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_field`
--

INSERT INTO `crud_field` (`id`, `crud_id`, `field_name`, `field_label`, `input_type`, `help_block`, `placeholder`, `auto_generate_help_block`, `wrapper_class`, `show_column`, `show_add_form`, `show_update_form`, `show_detail_page`, `sort`, `relation_table`, `relation_value`, `relation_label`) VALUES
(9, 1, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(10, 1, 'nama_produk', 'nama_produk', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(11, 1, 'deskripsi_produk', 'deskripsi_produk', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(12, 1, 'photo', 'photo', 'file', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(21, 2, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(22, 2, 'nama_produk', 'nama_produk', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(23, 2, 'deskripsi_produk', 'deskripsi_produk', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(24, 2, 'photo', 'photo', 'file', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(25, 2, 'id_kategori', 'id_kategori', 'select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 5, 'kategori_produk', 'id', 'nama_kategori'),
(43, 3, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(44, 3, 'nama_kategori', 'nama_kategori', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(45, 3, 'photo', 'photo', 'file', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(49, 4, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(50, 4, 'nama_department', 'nama_department', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(51, 4, 'deskirpsi_pekerjaan', 'deskirpsi_pekerjaan', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(52, 4, 'deskripsi_pekerjaan', 'deskripsi_pekerjaan', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(53, 5, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(54, 5, 'nama_department', 'nama_department', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(55, 5, 'deskripsi_pekerjaan', 'deskripsi_pekerjaan', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(56, 6, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(57, 6, 'date', 'date', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(58, 6, 'judul_sejarah', 'judul_sejarah', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(59, 6, 'deskripsi_sejarah', 'deskripsi_sejarah', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(63, 7, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(64, 7, 'nama_kegiatan', 'nama_kegiatan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(65, 7, 'photo', 'photo', 'file', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(71, 8, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(72, 8, 'judul_artikel', 'judul_artikel', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(73, 8, 'deskripsi_artikel', 'deskripsi_artikel', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(74, 8, 'isi_artikel', 'isi_artikel', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(75, 8, 'photo', 'photo', 'file', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(76, 9, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(77, 9, 'pertanyaan', 'pertanyaan', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(78, 9, 'jawaban', 'jawaban', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(83, 11, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(84, 11, 'nama', 'nama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(85, 11, 'jabatan', 'jabatan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(89, 12, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(90, 12, 'nama', 'nama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(91, 12, 'kritik', 'kritik/saran', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(92, 13, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(93, 13, 'nama_kredit', 'nama_kredit', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(94, 13, 'photo', 'photo', 'file', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(95, 13, 'deskripsi_kredit', 'deskripsi_kredit', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(114, 14, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(115, 14, 'nama_lengkap', 'nama_lengkap', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(116, 14, 'file_ktp', 'file_ktp', 'file', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(117, 14, 'no_hp', 'no_hp', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(118, 14, 'jumlah_pinjaman', 'jumlah_pinjaman', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(119, 14, 'jangka_waktu', 'jangka_waktu', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(120, 14, 'jenis_pinjaman', 'jenis_pinjaman', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(121, 14, 'jaminan', 'jaminan', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(122, 14, 'created_at', 'created_at', 'datetime', '', '', '', NULL, 'yes', 'yes', '', 'yes', 9, '', '', ''),
(123, 14, 'updated_at', 'updated_at', 'datetime', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(124, 14, 'updated_by', 'updated_by', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(125, 14, 'status', 'status', 'custom_select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(126, 10, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(127, 10, 'jaminan_kredit', 'jaminan_kredit', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(128, 10, 'lokasi_jaminan', 'lokasi_jaminan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(129, 10, 'situasi_jaminan', 'situasi_jaminan', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(130, 10, 'updated_by', 'updated_by', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(131, 10, 'created_at', 'created_at', 'timestamp', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field_condition`
--

CREATE TABLE `crud_field_condition` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `reff` text DEFAULT NULL,
  `crud_id` int(11) NOT NULL,
  `cond_field` text DEFAULT NULL,
  `cond_operator` text DEFAULT NULL,
  `cond_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field_configuration`
--

CREATE TABLE `crud_field_configuration` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `group_config` varchar(200) NOT NULL,
  `config_name` text NOT NULL,
  `config_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field_validation`
--

CREATE TABLE `crud_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_field_validation`
--

INSERT INTO `crud_field_validation` (`id`, `crud_field_id`, `crud_id`, `validation_name`, `validation_value`) VALUES
(9, 10, 1, 'required', ''),
(10, 10, 1, 'max_length', '50'),
(11, 11, 1, 'required', ''),
(12, 12, 1, 'required', ''),
(21, 22, 2, 'required', ''),
(22, 22, 2, 'max_length', '50'),
(23, 23, 2, 'required', ''),
(24, 24, 2, 'required', ''),
(37, 44, 3, 'required', ''),
(38, 44, 3, 'max_length', '50'),
(42, 50, 4, 'required', ''),
(43, 50, 4, 'max_length', '50'),
(44, 51, 4, 'required', ''),
(45, 54, 5, 'required', ''),
(46, 54, 5, 'max_length', '50'),
(47, 55, 5, 'required', ''),
(48, 57, 6, 'required', ''),
(49, 58, 6, 'required', ''),
(50, 58, 6, 'max_length', '100'),
(51, 59, 6, 'required', ''),
(55, 64, 7, 'required', ''),
(56, 64, 7, 'max_length', '50'),
(57, 65, 7, 'required', ''),
(64, 72, 8, 'required', ''),
(65, 72, 8, 'max_length', '100'),
(66, 73, 8, 'required', ''),
(67, 73, 8, 'max_length', '100'),
(68, 74, 8, 'required', ''),
(69, 75, 8, 'required', ''),
(70, 77, 9, 'required', ''),
(71, 78, 9, 'required', ''),
(77, 84, 11, 'required', ''),
(78, 84, 11, 'max_length', '255'),
(79, 85, 11, 'required', ''),
(80, 85, 11, 'max_length', '255'),
(84, 90, 12, 'required', ''),
(85, 90, 12, 'max_length', '255'),
(86, 91, 12, 'required', ''),
(87, 93, 13, 'required', ''),
(88, 93, 13, 'max_length', '50'),
(89, 94, 13, 'required', ''),
(90, 95, 13, 'required', ''),
(113, 115, 14, 'required', ''),
(114, 115, 14, 'max_length', '250'),
(115, 116, 14, 'required', ''),
(116, 117, 14, 'required', ''),
(117, 117, 14, 'max_length', '12'),
(118, 118, 14, 'required', ''),
(119, 118, 14, 'max_length', '15'),
(120, 119, 14, 'required', ''),
(121, 119, 14, 'max_length', '50'),
(122, 120, 14, 'required', ''),
(123, 120, 14, 'max_length', '50'),
(124, 127, 10, 'required', ''),
(125, 127, 10, 'max_length', '255'),
(126, 128, 10, 'required', ''),
(127, 128, 10, 'max_length', '255'),
(128, 129, 10, 'required', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_function`
--

CREATE TABLE `crud_function` (
  `id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_chained`
--

CREATE TABLE `crud_input_chained` (
  `id` int(11) UNSIGNED NOT NULL,
  `chain_field` varchar(250) DEFAULT NULL,
  `chain_field_eq` varchar(250) DEFAULT NULL,
  `crud_field_id` int(11) DEFAULT NULL,
  `crud_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_type`
--

CREATE TABLE `crud_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `custom_value` int(11) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_input_type`
--

INSERT INTO `crud_input_type` (`id`, `type`, `relation`, `custom_value`, `validation_group`) VALUES
(1, 'input', '0', 0, 'input'),
(2, 'textarea', '0', 0, 'text'),
(3, 'select', '1', 0, 'select'),
(4, 'editor_wysiwyg', '0', 0, 'editor'),
(5, 'password', '0', 0, 'password'),
(6, 'email', '0', 0, 'email'),
(7, 'address_map', '0', 0, 'address_map'),
(8, 'file', '0', 0, 'file'),
(9, 'file_multiple', '0', 0, 'file_multiple'),
(10, 'datetime', '0', 0, 'datetime'),
(11, 'date', '0', 0, 'date'),
(12, 'timestamp', '0', 0, 'timestamp'),
(13, 'number', '0', 0, 'number'),
(14, 'yes_no', '0', 0, 'yes_no'),
(15, 'time', '0', 0, 'time'),
(16, 'year', '0', 0, 'year'),
(17, 'select_multiple', '1', 0, 'select_multiple'),
(18, 'checkboxes', '1', 0, 'checkboxes'),
(19, 'options', '1', 0, 'options'),
(20, 'true_false', '0', 0, 'true_false'),
(21, 'current_user_username', '0', 0, 'user_username'),
(22, 'current_user_id', '0', 0, 'current_user_id'),
(23, 'custom_option', '0', 1, 'custom_option'),
(24, 'custom_checkbox', '0', 1, 'custom_checkbox'),
(25, 'custom_select_multiple', '0', 1, 'custom_select_multiple'),
(26, 'custom_select', '0', 1, 'custom_select'),
(27, 'chained', '1', 0, 'chained');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_validation`
--

CREATE TABLE `crud_input_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `validation` varchar(200) NOT NULL,
  `input_able` varchar(20) NOT NULL,
  `group_input` text NOT NULL,
  `input_placeholder` text NOT NULL,
  `call_back` varchar(10) NOT NULL,
  `input_validation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_input_validation`
--

INSERT INTO `crud_input_validation` (`id`, `validation`, `input_able`, `group_input`, `input_placeholder`, `call_back`, `input_validation`) VALUES
(1, 'required', 'no', 'input, file, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes, true_false, address_map, custom_option, custom_checkbox, custom_select_multiple, custom_select, file_multiple, chained', '', '', ''),
(2, 'max_length', 'yes', 'input, number, text, select, password, email, editor, yes_no, time, year, select_multiple, options, checkboxes, address_map', '', '', 'numeric'),
(3, 'min_length', 'yes', 'input, number, text, select, password, email, editor, time, year, select_multiple, address_map', '', '', 'numeric'),
(4, 'valid_email', 'no', 'input, email', '', '', ''),
(5, 'valid_emails', 'no', 'input, email', '', '', ''),
(6, 'regex', 'yes', 'input, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes', '', 'yes', 'callback_valid_regex'),
(7, 'decimal', 'no', 'input, number, text, select', '', '', ''),
(8, 'allowed_extension', 'yes', 'file, file_multiple', 'ex : jpg,png,..', '', 'callback_valid_extension_list'),
(9, 'max_width', 'yes', 'file, file_multiple', '', '', 'numeric'),
(10, 'max_height', 'yes', 'file, file_multiple', '', '', 'numeric'),
(11, 'max_size', 'yes', 'file, file_multiple', '... kb', '', 'numeric'),
(12, 'max_item', 'yes', 'file_multiple', '', '', 'numeric'),
(13, 'valid_url', 'no', 'input, text', '', '', ''),
(14, 'alpha', 'no', 'input, text, select, password, editor, yes_no', '', '', ''),
(15, 'alpha_numeric', 'no', 'input, number, text, select, password, editor', '', '', ''),
(16, 'alpha_numeric_spaces', 'no', 'input, number, text,select, password, editor', '', '', ''),
(17, 'valid_number', 'no', 'input, number, text, password, editor, true_false', '', 'yes', ''),
(18, 'valid_datetime', 'no', 'input, datetime, text', '', 'yes', ''),
(19, 'valid_date', 'no', 'input, datetime, date, text', '', 'yes', ''),
(20, 'valid_max_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(21, 'valid_min_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(22, 'valid_alpha_numeric_spaces_underscores', 'no', 'input, text,select, password, editor', '', 'yes', ''),
(23, 'matches', 'yes', 'input, number, text, password, email', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(24, 'valid_json', 'no', 'input, text, editor', '', 'yes', ' '),
(25, 'valid_url', 'no', 'input, text, editor', '', 'no', ' '),
(26, 'exact_length', 'yes', 'input, text, number', '0 - 99999*', 'no', 'numeric'),
(27, 'alpha_dash', 'no', 'input, text', '', 'no', ''),
(28, 'integer', 'no', 'input, text, number', '', 'no', ''),
(29, 'differs', 'yes', 'input, text, number, email, password, editor, options, select', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(30, 'is_natural', 'no', 'input, text, number', '', 'no', ''),
(31, 'is_natural_no_zero', 'no', 'input, text, number', '', 'no', ''),
(32, 'less_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(33, 'less_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(34, 'greater_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(35, 'greater_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(36, 'in_list', 'yes', 'input, text, number, select, options', '', 'no', 'callback_valid_multiple_value'),
(37, 'valid_ip', 'no', 'input, text', '', 'no', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` text NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumentasi`
--

INSERT INTO `dokumentasi` (`id`, `nama_kegiatan`, `photo`) VALUES
(1, 'kegiatan 1', '20230301195502-2023-03-01dokumentasi195501.png'),
(2, 'kegiatan 2', '20230301195512-2023-03-01dokumentasi195510.png'),
(3, 'kegiatan 3', '20230301195520-2023-03-01dokumentasi195519.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id`, `pertanyaan`, `jawaban`) VALUES
(1, 'pertanyaan 1', 'jawaban 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_custom_attribute`
--

CREATE TABLE `form_custom_attribute` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `attribute_value` text NOT NULL,
  `attribute_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_custom_option`
--

CREATE TABLE `form_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_field`
--

CREATE TABLE `form_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `input_type` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `placeholder` text DEFAULT NULL,
  `show_detail_page` varchar(20) DEFAULT NULL,
  `show_update_form` varchar(20) DEFAULT NULL,
  `show_add_form` varchar(20) DEFAULT NULL,
  `show_column` varchar(20) DEFAULT NULL,
  `auto_generate_help_block` varchar(10) DEFAULT NULL,
  `help_block` text DEFAULT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_field_validation`
--

CREATE TABLE `form_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_deskripsi_pekerjaan`
--

CREATE TABLE `job_deskripsi_pekerjaan` (
  `id` int(11) NOT NULL,
  `nama_department` varchar(50) NOT NULL,
  `deskripsi_pekerjaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `job_deskripsi_pekerjaan`
--

INSERT INTO `job_deskripsi_pekerjaan` (`id`, `nama_department`, `deskripsi_pekerjaan`) VALUES
(1, 'Devisi 1', '......'),
(2, 'Devisi 2', '...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama_kategori`, `photo`) VALUES
(1, 'Kategori 1', '20230227233929-2023-02-27kategori_produk233928.png'),
(2, 'Kategori 2', '20230227233939-2023-02-27kategori_produk233938.png'),
(3, 'Kategori 3', '20230227233949-2023-02-27kategori_produk233948.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL,
  `is_private_key` tinyint(1) NOT NULL,
  `ip_addresses` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, '85E6DDF3D43D3169785B4AC10F334F7A', 0, 0, 0, NULL, '2023-02-25 19:59:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kredit`
--

CREATE TABLE `kredit` (
  `id` int(11) NOT NULL,
  `nama_kredit` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `deskripsi_kredit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kredit`
--

INSERT INTO `kredit` (`id`, `nama_kredit`, `photo`, `deskripsi_kredit`) VALUES
(1, 'Kredit 1', '20230304014825-2023-03-04kredit014807.png', 'Manfaat :<br />\r\nPersyaratan :'),
(2, 'Kredit 2', '20230304014840-2023-03-04kredit014836.png', '-'),
(3, 'Kredit 3', '20230304014852-2023-03-04kredit014849.png', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik`
--

CREATE TABLE `kritik` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kritik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kritik`
--

INSERT INTO `kritik` (`id`, `nama`, `kritik`) VALUES
(9, 'user', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `label` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `icon_color` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `menu_type_id` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `label`, `type`, `icon_color`, `link`, `sort`, `parent`, `icon`, `menu_type_id`, `active`) VALUES
(1, 'MAIN NAVIGATION', 'label', '', '{admin_url}/dashboard', 16, 0, '', 1, 1),
(2, 'Dashboard', 'menu', '', '{admin_url}/dashboard', 2, 0, 'fa-dashboard', 1, 1),
(3, 'CRUD Builder', 'menu', '', '{admin_url}/crud', 17, 0, 'fa-table', 1, 1),
(4, 'API Builder', 'menu', '', '{admin_url}/rest', 18, 0, 'fa-code', 1, 1),
(5, 'Page Builder', 'menu', '', '{admin_url}/page', 19, 0, 'fa-file-o', 1, 1),
(6, 'Form Builder', 'menu', '', '{admin_url}/form', 20, 0, 'fa-newspaper-o', 1, 1),
(7, 'Blog', 'menu', 'default', '{admin_url}/blog', 21, 0, 'fa-file-text-o', 1, 1),
(8, 'Menu', 'menu', '', '{admin_url}/menu', 22, 0, 'fa-bars', 1, 1),
(9, 'Auth', 'menu', '', '', 23, 0, 'fa-shield', 1, 1),
(10, 'User', 'menu', '', '{admin_url}/user', 24, 9, '', 1, 1),
(11, 'Groups', 'menu', '', '{admin_url}/group', 25, 9, '', 1, 1),
(12, 'Access', 'menu', '', '{admin_url}/access', 26, 9, '', 1, 1),
(13, 'Permission', 'menu', '', '{admin_url}/permission', 27, 9, '', 1, 1),
(14, 'API Keys', 'menu', '', '{admin_url}/keys', 28, 9, '', 1, 1),
(15, 'Extension', 'menu', '', '{admin_url}/extension', 29, 0, 'fa-puzzle-piece', 1, 1),
(16, 'Database', 'menu', '', '{admin_url}/database', 30, 0, 'fa-database', 1, 1),
(17, 'OTHER', 'label', '', '', 31, 0, '', 1, 1),
(18, 'Settings', 'menu', 'text-red', '{admin_url}/setting', 32, 0, 'fa-circle-o', 1, 1),
(19, 'Web Documentation', 'menu', 'text-blue', '{admin_url}/doc/web', 33, 0, 'fa-circle-o', 1, 1),
(20, 'API Documentation', 'menu', 'text-yellow', '{admin_url}/doc/api', 34, 0, 'fa-circle-o', 1, 1),
(24, 'Beranda', 'menu', 'default', '/', 1, 0, '', 2, 1),
(25, 'Profil', 'menu', 'default', '/web/profil', 2, 0, '', 2, 1),
(26, 'Produk', 'menu', 'default', '/web/produk', 3, 0, '', 2, 1),
(27, 'Dokumentasi', 'menu', 'default', '/web/dokumentasi', 4, 0, '', 2, 1),
(29, 'FAQ', 'menu', 'default', '/', 6, 0, '', 2, 1),
(30, 'Kritik', 'menu', 'default', '/', 8, 0, '', 2, 1),
(31, 'Kontak', 'menu', 'default', '/', 7, 0, '', 2, 1),
(33, 'Blog', 'menu', 'default', '/blog', 5, 0, '', 2, 1),
(34, 'Data Pengajuan Kredit', 'menu', 'default', '{admin_url}/pengajuan_kredit', 3, 0, 'fa-clone', 1, 1),
(35, 'Survei Lapangan', 'menu', 'default', '{admin_url}/survei_lapangan', 4, 0, 'fa-question-circle', 1, 1),
(37, 'Laporan Pengajuan Kredit', 'menu', 'default', '{admin_url}/pengajuan_kredit/laporan', 5, 0, 'fa-file', 1, 1),
(38, 'Data Pegawai', 'menu', 'default', '{admin_url}/pegawai', 6, 0, 'fa-users', 1, 1),
(39, 'Artikel Blog', 'menu', 'default', '{admin_url}/artikel', 7, 0, 'fa-newspaper-o', 1, 1),
(40, 'Komentar', 'menu', 'default', '{admin_url}/kritik', 8, 0, 'fa-commenting-o', 1, 1),
(41, 'Produk', 'menu', 'default', '{admin_url}/produk', 9, 0, 'fa-archive', 1, 1),
(42, 'Kategori Produk', 'menu', 'default', '{admin_url}/kategori_produk', 11, 0, 'fa-bookmark', 1, 1),
(43, 'MAIN MENU', 'label', 'default', '#', 1, 0, '', 1, 1),
(44, 'Job Deskripsi Pekerjaan', 'menu', 'default', '{admin_url}/job_deskripsi_pekerjaan', 12, 0, 'fa-briefcase', 1, 1),
(45, 'Sejarah Perusahaan', 'menu', 'default', '{admin_url}/sejarah_perusahaan', 13, 0, 'fa-building-o', 1, 1),
(46, 'Dokumentasi', 'menu', 'default', '{admin_url}/dokumentasi', 14, 0, 'fa-image', 1, 1),
(47, 'FAQ', 'menu', 'default', '{admin_url}/faq', 15, 0, 'fa-bars', 1, 1),
(48, 'Kredit', 'menu', 'default', '{admin_url}/kredit', 10, 0, 'fa-diamond', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_type`
--

CREATE TABLE `menu_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu_type`
--

INSERT INTO `menu_type` (`id`, `name`, `definition`) VALUES
(1, 'side menu', NULL),
(2, 'top menu', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `read` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE `page` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `fresh_content` text NOT NULL,
  `keyword` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `template` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `page_block_element`
--

CREATE TABLE `page_block_element` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image_preview` varchar(200) NOT NULL,
  `block_name` varchar(200) NOT NULL,
  `content_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `jabatan`) VALUES
(1, 'pegawai 1', 'jabatan 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_kredit`
--

CREATE TABLE `pengajuan_kredit` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `file_ktp` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jumlah_pinjaman` int(15) NOT NULL,
  `jangka_waktu` varchar(50) NOT NULL,
  `jaminan` text NOT NULL,
  `jenis_pinjaman` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan_kredit`
--

INSERT INTO `pengajuan_kredit` (`id`, `nama_lengkap`, `file_ktp`, `no_hp`, `jumlah_pinjaman`, `jangka_waktu`, `jaminan`, `jenis_pinjaman`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(4, 'user 1', '20230305020054-2023-03-05pengajuan_kredit020028.png', '021', 1000000, '1', 'motor', 'kredit modal usaha', '2023-03-04 19:03:27', '2023-03-03 17:00:00', 'admin', 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `photo` text NOT NULL,
  `id_kategori` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi_produk`, `photo`, `id_kategori`) VALUES
(1, 'Produk 1', 'Manfaat :<br />\r\n<br />\r\nPersyaratan :', '20230227224054-2023-02-27produk224052.png', 1),
(2, 'Produk 2', '-', '20230227224111-2023-02-27produk224104.png', 2),
(3, 'Produk 3', '-', '20230227224124-2023-02-27produk224123.png', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) UNSIGNED NOT NULL,
  `receipent_custom_query` text DEFAULT NULL,
  `receipent_department` varchar(200) DEFAULT NULL,
  `primary_field` varchar(200) DEFAULT NULL,
  `table` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `repeat_frequency` varchar(200) DEFAULT NULL,
  `receipent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reminder_condition`
--

CREATE TABLE `reminder_condition` (
  `id` int(11) UNSIGNED NOT NULL,
  `cond_type` varchar(200) DEFAULT NULL,
  `cond_table` varchar(200) DEFAULT NULL,
  `cond_field` varchar(200) NOT NULL,
  `cond_operator` varchar(200) NOT NULL,
  `cond_value` varchar(255) DEFAULT NULL,
  `cond_logic` varchar(20) NOT NULL DEFAULT 'AND',
  `reminder_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reminder_cron`
--

CREATE TABLE `reminder_cron` (
  `id` int(11) UNSIGNED NOT NULL,
  `reminder_id` int(11) NOT NULL,
  `reff_id` int(11) NOT NULL,
  `reff_table` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `sent_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest`
--

CREATE TABLE `rest` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `x_api_key` varchar(20) DEFAULT NULL,
  `x_token` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_field`
--

CREATE TABLE `rest_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `rest_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_api` varchar(10) DEFAULT NULL,
  `show_update_api` varchar(10) DEFAULT NULL,
  `show_detail_api` varchar(10) DEFAULT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_field_validation`
--

CREATE TABLE `rest_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `rest_field_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_input_type`
--

CREATE TABLE `rest_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rest_input_type`
--

INSERT INTO `rest_input_type` (`id`, `type`, `relation`, `validation_group`) VALUES
(1, 'input', '0', 'input'),
(2, 'timestamp', '0', 'timestamp'),
(3, 'file', '0', 'file'),
(4, 'select', '1', 'select');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sejarah_perusahaan`
--

CREATE TABLE `sejarah_perusahaan` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `judul_sejarah` varchar(100) NOT NULL,
  `deskripsi_sejarah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sejarah_perusahaan`
--

INSERT INTO `sejarah_perusahaan` (`id`, `date`, `judul_sejarah`, `deskripsi_sejarah`) VALUES
(1, '2023-01-01', 'Judul 1', 'Deskripsi 1'),
(2, '2023-03-01', 'Judul 2', 'Sejarah 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survei_lapangan`
--

CREATE TABLE `survei_lapangan` (
  `id` int(11) NOT NULL,
  `jaminan_kredit` varchar(255) NOT NULL,
  `lokasi_jaminan` varchar(255) NOT NULL,
  `situasi_jaminan` text NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `survei_lapangan`
--

INSERT INTO `survei_lapangan` (`id`, `jaminan_kredit`, `lokasi_jaminan`, `situasi_jaminan`, `updated_by`, `created_at`) VALUES
(1, 'jaminan 1', 'lokasi 1', 'lorem ipsum 1', 'john doe', '2023-03-04 16:38:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `widgeds`
--

CREATE TABLE `widgeds` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `dashboard_id` int(11) NOT NULL,
  `widged_uuid` varchar(255) NOT NULL,
  `widged_type` varchar(255) NOT NULL,
  `sort_number` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `widged_chart`
--

CREATE TABLE `widged_chart` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `widged_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `widged_chart_series`
--

CREATE TABLE `widged_chart_series` (
  `id` int(11) UNSIGNED NOT NULL,
  `label` varchar(200) NOT NULL,
  `value_unit` varchar(200) NOT NULL,
  `data_table` varchar(255) NOT NULL,
  `data_field` varchar(255) NOT NULL,
  `formula` varchar(255) DEFAULT NULL,
  `formula_field` varchar(255) DEFAULT NULL,
  `x_axis_field` varchar(255) NOT NULL,
  `x_axis_field_type` varchar(255) NOT NULL,
  `x_axis_grouping` varchar(20) NOT NULL DEFAULT 'yes',
  `color` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `widged_chart_id` int(11) NOT NULL,
  `widged_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `widged_chart_series_condition`
--

CREATE TABLE `widged_chart_series_condition` (
  `id` int(11) UNSIGNED NOT NULL,
  `cond_field` varchar(200) NOT NULL,
  `cond_operator` varchar(200) NOT NULL,
  `cond_value` varchar(255) NOT NULL,
  `cond_logic` varchar(20) NOT NULL DEFAULT 'AND',
  `widged_series_id` int(11) NOT NULL,
  `widged_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aauth_groups`
--
ALTER TABLE `aauth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_group_to_group`
--
ALTER TABLE `aauth_group_to_group`
  ADD PRIMARY KEY (`group_id`,`subgroup_id`);

--
-- Indeks untuk tabel `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_perms`
--
ALTER TABLE `aauth_perms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_perm_to_user`
--
ALTER TABLE `aauth_perm_to_user`
  ADD PRIMARY KEY (`user_id`,`perm_id`);

--
-- Indeks untuk tabel `aauth_pms`
--
ALTER TABLE `aauth_pms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_user`
--
ALTER TABLE `aauth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_users`
--
ALTER TABLE `aauth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_user_to_group`
--
ALTER TABLE `aauth_user_to_group`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indeks untuk tabel `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`);

--
-- Indeks untuk tabel `cc_options`
--
ALTER TABLE `cc_options`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chat_contact`
--
ALTER TABLE `chat_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_action`
--
ALTER TABLE `crud_action`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field`
--
ALTER TABLE `crud_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field_condition`
--
ALTER TABLE `crud_field_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field_configuration`
--
ALTER TABLE `crud_field_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_function`
--
ALTER TABLE `crud_function`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_chained`
--
ALTER TABLE `crud_input_chained`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_type`
--
ALTER TABLE `crud_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_custom_option`
--
ALTER TABLE `form_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_field`
--
ALTER TABLE `form_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_field_validation`
--
ALTER TABLE `form_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `job_deskripsi_pekerjaan`
--
ALTER TABLE `job_deskripsi_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kredit`
--
ALTER TABLE `kredit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kritik`
--
ALTER TABLE `kritik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `page_block_element`
--
ALTER TABLE `page_block_element`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_kredit`
--
ALTER TABLE `pengajuan_kredit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reminder_condition`
--
ALTER TABLE `reminder_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reminder_cron`
--
ALTER TABLE `reminder_cron`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest`
--
ALTER TABLE `rest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_field`
--
ALTER TABLE `rest_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_input_type`
--
ALTER TABLE `rest_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sejarah_perusahaan`
--
ALTER TABLE `sejarah_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `survei_lapangan`
--
ALTER TABLE `survei_lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `widgeds`
--
ALTER TABLE `widgeds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `widged_chart`
--
ALTER TABLE `widged_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `widged_chart_series`
--
ALTER TABLE `widged_chart_series`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `widged_chart_series_condition`
--
ALTER TABLE `widged_chart_series_condition`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aauth_groups`
--
ALTER TABLE `aauth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `aauth_perms`
--
ALTER TABLE `aauth_perms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT untuk tabel `aauth_pms`
--
ALTER TABLE `aauth_pms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aauth_user`
--
ALTER TABLE `aauth_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `cc_options`
--
ALTER TABLE `cc_options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `chat_contact`
--
ALTER TABLE `chat_contact`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `crud_action`
--
ALTER TABLE `crud_action`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `crud_field`
--
ALTER TABLE `crud_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT untuk tabel `crud_field_condition`
--
ALTER TABLE `crud_field_condition`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_field_configuration`
--
ALTER TABLE `crud_field_configuration`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `crud_function`
--
ALTER TABLE `crud_function`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_input_chained`
--
ALTER TABLE `crud_input_chained`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_input_type`
--
ALTER TABLE `crud_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_custom_option`
--
ALTER TABLE `form_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_field_validation`
--
ALTER TABLE `form_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `job_deskripsi_pekerjaan`
--
ALTER TABLE `job_deskripsi_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kredit`
--
ALTER TABLE `kredit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kritik`
--
ALTER TABLE `kritik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `page_block_element`
--
ALTER TABLE `page_block_element`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_kredit`
--
ALTER TABLE `pengajuan_kredit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reminder_condition`
--
ALTER TABLE `reminder_condition`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reminder_cron`
--
ALTER TABLE `reminder_cron`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rest`
--
ALTER TABLE `rest`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rest_field`
--
ALTER TABLE `rest_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rest_input_type`
--
ALTER TABLE `rest_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sejarah_perusahaan`
--
ALTER TABLE `sejarah_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `survei_lapangan`
--
ALTER TABLE `survei_lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `widgeds`
--
ALTER TABLE `widgeds`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `widged_chart`
--
ALTER TABLE `widged_chart`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `widged_chart_series`
--
ALTER TABLE `widged_chart_series`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `widged_chart_series_condition`
--
ALTER TABLE `widged_chart_series_condition`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
