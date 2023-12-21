-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 06:39 PM
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
-- Database: `adminfm`
--

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_09_191351_create_modules_table', 1),
(6, '2023_12_09_192100_create_roles_table', 1),
(7, '2023_12_09_192101_create_users_table', 1),
(8, '2023_12_09_193144_create_permissions_table', 1),
(9, '2023_12_09_194023_create_permission_role_table', 1),
(10, '2023_12_09_194503_create_pages_table', 1),
(11, '2023_12_16_100253_add_user_image_to_users', 2),
(12, '2023_12_17_164108_add_page_image_to_pages', 3),
(13, '2023_12_18_204811_create_settings_table', 4),
(14, '2023_12_21_160634_create_user_login_histories_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `module_slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin Dashboard', 'admin-dashboard', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(2, 'Role Management', 'role-management', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(3, 'User Management', 'user-management', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(4, 'Permission Management', 'permission-management', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(13, 'Module Management', 'module-management', '2023-12-12 05:48:02', '2023-12-12 05:48:02', NULL),
(15, 'Profile Management', 'profile-management', '2023-12-16 03:59:46', '2023-12-16 03:59:46', NULL),
(16, 'Page Builder', 'page-builder', '2023-12-17 09:16:34', '2023-12-17 09:16:34', NULL),
(17, 'Backup Management', 'backup-management', '2023-12-18 04:19:11', '2023-12-18 04:19:11', NULL),
(18, 'System Setting Management', 'system-setting-management', '2023-12-20 03:29:36', '2023-12-20 03:29:36', NULL),
(19, 'Menu Management', 'menu-management', '2023-12-21 08:34:36', '2023-12-21 08:34:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_short` text DEFAULT NULL COMMENT 'short description',
  `page_long` longtext DEFAULT NULL COMMENT 'long description',
  `page_image` varchar(255) DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_slug`, `page_short`, `page_long`, `page_image`, `meta_title`, `meta_keywords`, `meta_description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Cumque ducimus adip 12', 'Eu cillum modi dolor', '<p><strong>Short</strong></p>', '<h4>long</h4>', '4.jpg', 'Eos expedita proiden', 'Qui ea illum minim', '<h2>Meta</h2>', 1, '2023-12-17 14:01:51', '2023-12-17 14:31:21', NULL),
(5, 'About Us', 'about-us', '<p>About Us</p>', '<p>About Us</p>', '5.jpg', 'About Us', 'About Us', '<p>About Us</p>', 1, '2023-12-17 14:50:49', '2023-12-17 14:50:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(255) NOT NULL,
  `permission_slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `permission_name`, `permission_slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Access Dashboard', 'access-dashboard', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(2, 2, 'Index Role', 'index-role', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(3, 2, 'Create Role', 'create-role', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(4, 2, 'Edit Role', 'edit-role', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(5, 2, 'Delete Role', 'delete-role', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(6, 3, 'Index User', 'index-user', '2023-12-09 15:55:01', '2023-12-16 03:40:32', NULL),
(7, 3, 'Create User', 'create-user', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(8, 3, 'Edit User', 'edit-user', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(9, 3, 'Delete User', 'delete-user', '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(15, 13, 'Create Module', 'create-module', '2023-12-12 05:48:41', '2023-12-12 05:48:41', NULL),
(16, 13, 'Edit Module', 'edit-module', '2023-12-12 05:48:57', '2023-12-12 05:48:57', NULL),
(17, 13, 'Delete Module', 'delete-module', '2023-12-12 05:49:07', '2023-12-12 05:49:07', NULL),
(18, 13, 'Index Module', 'index-module', '2023-12-12 05:49:18', '2023-12-12 05:49:18', NULL),
(19, 4, 'Index Permission', 'index-permission', '2023-12-12 05:53:04', '2023-12-12 05:53:04', NULL),
(20, 4, 'Edit Permission', 'edit-permission', '2023-12-12 05:53:19', '2023-12-12 05:53:19', NULL),
(21, 4, 'Delete Permission', 'delete-permission', '2023-12-12 05:53:28', '2023-12-12 05:53:28', NULL),
(22, 4, 'Create Permission', 'create-permission', '2023-12-12 06:02:52', '2023-12-12 06:02:52', NULL),
(23, 15, 'Profile Update', 'profile-update', '2023-12-16 13:50:15', '2023-12-16 13:50:15', NULL),
(24, 15, 'Password Update', 'password-update', '2023-12-16 13:50:35', '2023-12-16 13:50:35', NULL),
(25, 16, 'Index Page', 'index-page', '2023-12-17 09:34:00', '2023-12-17 09:34:00', NULL),
(26, 16, 'Create Page', 'create-page', '2023-12-17 09:34:26', '2023-12-17 09:34:26', NULL),
(27, 16, 'Edit Page', 'edit-page', '2023-12-17 09:35:52', '2023-12-17 09:35:52', NULL),
(28, 16, 'Delete Page', 'delete-page', '2023-12-17 09:37:24', '2023-12-17 09:37:24', NULL),
(29, 17, 'Index Backup', 'index-backup', '2023-12-18 04:26:02', '2023-12-18 04:26:02', NULL),
(30, 17, 'Create Backup', 'create-backup', '2023-12-18 04:26:23', '2023-12-18 04:26:23', NULL),
(31, 17, 'Download Backup', 'download-backup', '2023-12-18 04:26:45', '2023-12-18 10:48:52', NULL),
(32, 17, 'Delete Backup', 'delete-backup', '2023-12-18 04:26:58', '2023-12-18 04:26:58', NULL),
(33, 18, 'Mail Setting View', 'mail-setting-view', '2023-12-20 03:30:10', '2023-12-20 03:31:57', NULL),
(34, 18, 'Mail Setting Update', 'mail-setting-update', '2023-12-20 03:30:31', '2023-12-20 03:30:31', NULL),
(35, 18, 'Appearance Setting View', 'appearance-setting-view', '2023-12-20 03:31:06', '2023-12-20 03:31:06', NULL),
(36, 18, 'Appearance Setting Update', 'appearance-setting-update', '2023-12-20 03:31:19', '2023-12-20 03:31:19', NULL),
(37, 18, 'General Setting View', 'general-setting-view', '2023-12-20 03:32:25', '2023-12-20 03:32:25', NULL),
(38, 18, 'General Setting Update', 'general-setting-update', '2023-12-20 03:32:41', '2023-12-20 03:32:41', NULL),
(39, 18, 'Socialite Setting View', 'socialite-setting-view', '2023-12-20 21:27:34', '2023-12-20 21:27:34', NULL),
(40, 18, 'Socialite Setting Update', 'socialite-setting-update', '2023-12-20 21:27:50', '2023-12-20 21:27:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(61, 2, 6, NULL, NULL),
(63, 2, 18, NULL, NULL),
(66, 2, 1, NULL, NULL),
(67, 2, 2, NULL, NULL),
(68, 2, 3, NULL, NULL),
(69, 2, 4, NULL, NULL),
(71, 1, 2, NULL, NULL),
(72, 1, 3, NULL, NULL),
(73, 1, 4, NULL, NULL),
(74, 1, 5, NULL, NULL),
(75, 1, 6, NULL, NULL),
(76, 1, 7, NULL, NULL),
(77, 1, 8, NULL, NULL),
(78, 1, 9, NULL, NULL),
(79, 1, 19, NULL, NULL),
(81, 1, 21, NULL, NULL),
(82, 1, 22, NULL, NULL),
(83, 1, 15, NULL, NULL),
(84, 1, 16, NULL, NULL),
(85, 1, 17, NULL, NULL),
(86, 1, 18, NULL, NULL),
(87, 9, 1, NULL, NULL),
(88, 9, 2, NULL, NULL),
(89, 9, 3, NULL, NULL),
(91, 9, 6, NULL, NULL),
(92, 9, 7, NULL, NULL),
(94, 9, 19, NULL, NULL),
(96, 9, 22, NULL, NULL),
(97, 9, 15, NULL, NULL),
(99, 9, 18, NULL, NULL),
(117, 1, 20, NULL, NULL),
(118, 1, 23, NULL, NULL),
(119, 1, 24, NULL, NULL),
(120, 2, 7, NULL, NULL),
(121, 2, 8, NULL, NULL),
(122, 2, 19, NULL, NULL),
(123, 2, 20, NULL, NULL),
(124, 2, 22, NULL, NULL),
(125, 2, 15, NULL, NULL),
(126, 2, 16, NULL, NULL),
(127, 2, 23, NULL, NULL),
(128, 2, 24, NULL, NULL),
(129, 1, 25, NULL, NULL),
(130, 1, 26, NULL, NULL),
(131, 1, 27, NULL, NULL),
(132, 1, 28, NULL, NULL),
(133, 1, 29, NULL, NULL),
(134, 1, 30, NULL, NULL),
(135, 1, 31, NULL, NULL),
(136, 1, 32, NULL, NULL),
(137, 1, 33, NULL, NULL),
(138, 1, 34, NULL, NULL),
(139, 1, 35, NULL, NULL),
(140, 1, 36, NULL, NULL),
(141, 1, 37, NULL, NULL),
(142, 1, 38, NULL, NULL),
(143, 1, 39, NULL, NULL),
(144, 1, 40, NULL, NULL);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_slug` varchar(255) NOT NULL,
  `role_note` text DEFAULT NULL COMMENT 'describes the role',
  `is_deleteable` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_slug`, `role_note`, `is_deleteable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin', 'admin has all permissions', 0, '2023-12-09 15:55:01', '2023-12-09 15:55:01', NULL),
(2, 'Customer', 'customer', 'customer has limited permissions', 1, '2023-12-09 15:55:02', '2023-12-13 13:39:47', NULL),
(9, 'Manager', 'manager', 'manager can have limited access', 1, '2023-12-12 07:49:07', '2023-12-12 07:49:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'site_title', 'Title', '2023-12-19 09:11:52', '2023-12-20 03:36:00', NULL),
(2, 'site_address', 'Dolore unde magnam m', '2023-12-19 09:11:52', '2023-12-19 12:07:59', NULL),
(3, 'site_phone', '+1 (461) 891-3157', '2023-12-19 09:11:52', '2023-12-19 12:07:59', NULL),
(4, 'site_facebook_link', 'Libero officia obcae', '2023-12-19 09:11:52', '2023-12-19 12:07:59', NULL),
(5, 'site_twitter_link', 'Ea laboriosam sed i', '2023-12-19 09:11:52', '2023-12-19 12:07:59', NULL),
(6, 'site_instagram_link', 'Nulla quisquam do cu', '2023-12-19 09:11:52', '2023-12-19 12:07:59', NULL),
(7, 'site_description', 'Maxime nulla quisqua', '2023-12-19 09:11:52', '2023-12-19 12:08:00', NULL),
(8, 'bg_color', 'uu', '2023-12-19 13:27:36', '2023-12-20 04:37:09', NULL),
(9, 'logo_image', 'public/logo_image.jpg', '2023-12-19 13:27:37', '2023-12-19 13:27:37', NULL),
(10, 'favicon_image', 'public/favicon_image.jpg', '2023-12-19 13:27:37', '2023-12-19 13:27:37', NULL),
(11, 'mail_mailer', 'smtp', '2023-12-19 16:07:48', '2023-12-19 16:07:48', NULL),
(12, 'mail_host', 'sandbox.smtp.mailtrap.io', '2023-12-19 16:07:48', '2023-12-19 16:07:48', NULL),
(13, 'mail_port', '2525', '2023-12-19 16:07:48', '2023-12-19 16:07:48', NULL),
(14, 'mail_username', 'cc03680e340450', '2023-12-19 16:07:48', '2023-12-19 16:07:48', NULL),
(15, 'mail_password', '3d92ec38d9a251', '2023-12-19 16:07:48', '2023-12-19 16:07:48', NULL),
(16, 'mail_encryption', 'null', '2023-12-19 16:07:48', '2023-12-20 03:38:11', NULL),
(17, 'mail_from_address', 'farhad@example.com', '2023-12-19 16:07:48', '2023-12-20 03:38:25', NULL),
(18, 'git_client_id', 'Beatae', '2023-12-20 21:31:31', '2023-12-20 21:33:30', NULL),
(19, 'git_client_secret', 'farhad', '2023-12-20 21:31:31', '2023-12-20 21:34:13', NULL),
(20, 'git_client_redirect', 'uu', '2023-12-20 21:31:31', '2023-12-20 21:34:03', NULL),
(21, 'google_client_id', 'Aut', '2023-12-20 21:31:31', '2023-12-20 21:33:30', NULL),
(22, 'google_client_secret', 'Omnis', '2023-12-20 21:31:31', '2023-12-20 21:33:30', NULL),
(23, 'google_client_redirect', 'Eaque', '2023-12-20 21:31:31', '2023-12-20 21:33:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_image`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Admin1', 'admin1@gmail.com', '2023-12-12 07:57:08', '$2y$12$8nJ1AKNHGRlAED6.gNZj6uqa751zZj8cRfhtDMG0F1Rf69kwgMaOW', 'ldEpQlxxmFEbYOtdI6TauAaSPzCkNhorRqYgIvvFX71gVW5j1vQGxAfjI9O5', '1.jpg', 1, '2023-12-12 07:57:08', '2023-12-16 12:50:03', NULL),
(2, 1, 'Admin2', 'admin2@gmail.com', '2023-12-12 07:57:08', '$2y$12$QsD0LtUhzfcJgFERLBvvUOnHAiGmYbAT17e0EzihjeF1GVlEtwyIG', 'aWk2v3hn3mQHUE9Urah0r8tOh2EFi2CLhpWUuDyTD8egmDOIWs2y6ydMIt2A', NULL, 1, '2023-12-12 07:57:09', '2023-12-12 07:57:09', NULL),
(3, 2, 'User1', 'user1@gmail.com', '2023-12-12 07:57:09', '$2y$12$CUm5q/VWkZqFg2HKfKmo1OXCF.lasUntRgfO.NXWZiy2GYkq/FWb.', 'Is8bCNlPJdlA6XvRUftUA5KMMQ90HyjNmihzPokRi8I3lSMx67pmT2apDB7v', NULL, 1, '2023-12-12 07:57:09', '2023-12-16 03:24:11', NULL),
(5, 9, 'Manager1', 'manager1@gmail.com', '2023-12-12 07:57:09', '$2y$12$1Ue23DKTRYN2LFIhUHijx.bx2OjoQFqU09tVBwnOx4z2n/rcGON7e', 'ddwDEdZqPuvt0D9ATfeKOOmunBRRTIzyEcfKBCofxiiLTGQ1kz2B4LFjspUD', NULL, 1, '2023-12-12 07:57:10', '2023-12-12 07:57:10', NULL),
(10, 2, 'farhadcu', 'fmfarhad231@gmail.com', NULL, '$2y$12$wtmFQbbUxIREMyfXBgft7.h8I4EHRDIauHsyM7v57Pvb0fpIzYNcy', NULL, NULL, 1, '2023-12-20 08:54:02', '2023-12-20 08:54:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_histories`
--

CREATE TABLE `user_login_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_login_histories`
--

INSERT INTO `user_login_histories` (`id`, `user_id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin1', 'admin1@gmail.com', '2023-12-21 11:20:01', '2023-12-21 11:20:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_module_id_foreign` (`module_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_login_histories`
--
ALTER TABLE `user_login_histories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_login_histories`
--
ALTER TABLE `user_login_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
