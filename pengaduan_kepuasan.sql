-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 03:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_kepuasan`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(4) UNSIGNED NOT NULL,
  `user_id` bigint(4) UNSIGNED NOT NULL,
  `parent_id` bigint(4) UNSIGNED DEFAULT NULL,
  `body` text NOT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `parent_id`, `body`, `commentable_type`, `commentable_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 1, NULL, 'Ad', 'App\\Models\\Post', 2, '2024-07-15 22:47:50', '2024-07-15 22:47:40', '2024-07-15 22:47:50'),
(7, 1, NULL, 'add', 'App\\Models\\Post', 2, '2024-07-15 22:48:53', '2024-07-15 22:48:28', '2024-07-15 22:48:53'),
(8, 1, NULL, 'ada', 'App\\Models\\Post', 2, '2024-07-15 22:49:19', '2024-07-15 22:49:12', '2024-07-15 22:49:19'),
(9, 2, NULL, 'Ok admin', 'App\\Models\\Post', 2, NULL, '2024-07-16 03:02:30', '2024-07-16 03:02:30'),
(10, 1, NULL, 'Ok kak reza', 'App\\Models\\Post', 2, '2024-07-16 05:05:28', '2024-07-16 04:54:41', '2024-07-16 05:05:28'),
(11, 1, 9, 'Ok', 'App\\Models\\Post', 2, '2024-07-16 05:05:54', '2024-07-16 04:55:42', '2024-07-16 05:05:54'),
(12, 1, NULL, 'Ok kak reza', 'App\\Models\\Post', 2, '2024-07-16 05:12:00', '2024-07-16 05:11:43', '2024-07-16 05:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` bigint(4) UNSIGNED NOT NULL,
  `user_id` bigint(4) UNSIGNED DEFAULT NULL,
  `comment_id` bigint(4) UNSIGNED NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_likes`
--

INSERT INTO `comment_likes` (`id`, `user_id`, `comment_id`, `ip`, `user_agent`, `created_at`, `updated_at`) VALUES
(2, 1, 9, NULL, NULL, '2024-07-16 04:54:08', '2024-07-16 04:54:08');

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
(1, '2014_10_12_000000_create_users_test_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_17_183203_create_user_table', 1),
(7, '2023_11_17_183253_create_pengaduan_table', 1),
(8, '2023_11_17_183322_create_tanggapan_table', 1),
(9, '2024_07_11_030213_create_posts_comments_table', 1),
(10, '2024_07_11_102322_create_comments_table', 1),
(11, '2024_07_11_102322_create_reactions_table', 1),
(12, '2024_07_11_113145_create_posts_table', 2),
(13, '2023_02_24_000000_create_comments_table', 3),
(14, '2023_03_24_000000_create_comment_likes_table', 3);

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
-- Table structure for table `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint(4) UNSIGNED NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `id_siswa` bigint(4) UNSIGNED NOT NULL,
  `kategori` text NOT NULL,
  `sub_kategori` text NOT NULL,
  `isi_laporan` text NOT NULL,
  `status` enum('Proses','Selesai') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `tgl_pengaduan`, `id_siswa`, `kategori`, `sub_kategori`, `isi_laporan`, `status`, `created_at`, `updated_at`) VALUES
(6, '2024-07-16', 2, '1', '0', 'Ruang baca kotor dan tidak rapi', 'Proses', '2024-07-16 03:39:30', '2024-07-16 03:39:30'),
(7, '2024-07-16', 2, '2', '0', 'Buku kotor dan sulit dicari', 'Proses', '2024-07-16 03:39:48', '2024-07-16 03:39:48'),
(8, '2024-07-16', 2, '3', '0', 'Perpustakaan sering tidak ada penjaga', 'Selesai', '2024-07-16 03:40:13', '2024-07-16 04:50:58'),
(9, '2024-07-16', 2, '4', '1', 'Lampu di dalam perpustakaan rusak', 'Proses', '2024-07-16 03:40:33', '2024-07-16 03:40:33');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'tittle', 'description', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tanggapans`
--

CREATE TABLE `tanggapans` (
  `id` bigint(4) UNSIGNED NOT NULL,
  `id_admin` bigint(4) UNSIGNED NOT NULL,
  `id_pengaduan` bigint(4) UNSIGNED NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanggapans`
--

INSERT INTO `tanggapans` (`id`, `id_admin`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `foto`, `created_at`, `updated_at`) VALUES
(5, 1, 8, '2024-07-16', 'ada', '20190110-153748-5fbfb8679510517f57633692.jpg', '2024-07-16 04:50:58', '2024-07-16 04:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(4) UNSIGNED NOT NULL,
  `nis` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` text DEFAULT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas','siswa') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nis`, `nama`, `kelas`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '1', 'admin', '$2y$10$VKVCWHBarQY0eeY9xSpqIe8UubDTsXGdsMwJxKnGKT2BVCIyYHhba', 'admin', NULL, NULL, '2024-07-16 03:14:21'),
(2, 192903, 'reza', '2', 'reza', '$2y$10$2Pa/TkExK00P660PG7GenuzAItsv7sJeQyJVpOlDKtAXgEW9WOpnK', 'siswa', NULL, '2024-07-11 05:09:11', '2024-07-11 05:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `users_test`
--

CREATE TABLE `users_test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduans_id_siswa_index` (`id_siswa`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanggapans`
--
ALTER TABLE `tanggapans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanggapans_id_admin_index` (`id_admin`),
  ADD KEY `tanggapans_id_pengaduan_index` (`id_pengaduan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nis_unique` (`nis`);

--
-- Indexes for table `users_test`
--
ALTER TABLE `users_test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_test_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` bigint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanggapans`
--
ALTER TABLE `tanggapans`
  MODIFY `id` bigint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_test`
--
ALTER TABLE `users_test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD CONSTRAINT `pengaduans_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tanggapans`
--
ALTER TABLE `tanggapans`
  ADD CONSTRAINT `tanggapans_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tanggapans_id_pengaduan_foreign` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
