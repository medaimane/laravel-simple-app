-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 02:42 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel5.6-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int(11) NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Morocco', '2018-09-05 04:13:12', '2018-09-05 04:13:12'),
(2, 'US', '2018-09-05 03:12:08', '2018-09-05 03:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_04_152854_create_posts_table', 1),
(4, '2018_09_04_154254_create_roles_table', 1),
(5, '2018_09_04_154326_create_commets_table', 1),
(6, '2018_09_04_163715_create_countries_table', 1),
(7, '2018_09_05_084025_create_role_users_table', 1),
(8, '2018_09_05_154945_add_description_to_posts', 2);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `cover_image`, `created_at`, `updated_at`, `description`) VALUES
(1, 1, 'Post One', 'This is the content for post one', 'default.jpg', '2018-09-05 08:32:16', '2018-09-05 08:32:16', 'This is post one'),
(2, 1, 'Post Two', 'This is the content for post two', 'default.jpg', '2018-09-05 08:33:10', '2018-09-05 08:33:10', 'This is post two'),
(3, 1, 'Post Three', 'This is the content for post three', 'default.jpg', '2018-09-05 08:33:54', '2018-09-05 08:33:54', 'This is post three'),
(4, 2, 'Admin Post', 'This the content for post from admin', 'default.jpg', '2018-09-05 08:35:25', '2018-09-05 08:35:25', 'This post from admin'),
(5, 1, 'Create new post', '<p>This post created using the app features, after the form setup.</p>', 'default.jpg', '2018-09-06 09:41:26', '2018-09-06 09:41:26', 'This post created using the app features'),
(6, 1, 'Another Post', '<p>Put the post content here! This is some sample content.</p>', 'default.jpg', '2018-09-06 11:07:35', '2018-09-06 11:07:35', 'Make post'),
(7, 1, 'Cover Image', '<p>The cover image fixed</p>', 'logoImage_4_1536236846.jpg', '2018-09-06 11:27:26', '2018-09-06 11:27:26', 'Post with Cover Image'),
(8, 1, 'Cover Image @', '<p>Some content</p>', 'hiking-fb-cover_1536237568.jpg', '2018-09-06 11:39:28', '2018-09-06 11:39:28', 'This is a second Cover'),
(9, 1, 'The Post', '<p>Put the post content here! This is some sample content.</p>', 'plantes_1536237604.jfif', '2018-09-06 11:40:04', '2018-09-06 11:40:04', 'another post');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user', 'This is a normal user', '2018-09-05 04:13:12', '2018-09-05 04:13:12'),
(2, 'admin', 'This a admin user', '2018-09-05 04:11:04', '2018-09-05 04:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-09-04 23:00:00', '2018-09-04 23:00:00'),
(2, 2, 2, '2018-09-04 23:00:00', '2018-09-04 23:00:00'),
(3, 2, 1, '2018-09-04 23:00:00', '2018-09-04 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `country_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'user', 'user@fds.com', NULL, '$2y$10$qWUdzeCHs1F3bMIpcrBaIOCFp/SaMYY/J/KNjCp5En/.5Ac6MVOMy', 'bkdb8rNCxQlJbnD5zinJvubiZ39df5TUpJCyM4Pm0zLhJeJrlGQexkOmcYGu', '2018-09-05 08:25:06', '2018-09-05 08:25:06'),
(2, 2, 'admin', 'admin@fds.com', NULL, '$2y$10$RhC3unsHmzyklaTF.A.C0eKCDVuyCTG2sRjCt1vyZjMVtg3p1m0zq', NULL, '2018-09-05 08:26:18', '2018-09-05 08:26:18'),
(4, 1, 'super', 'super@fds.com', NULL, '$2y$10$md0Y7zgnBCbjQOgeFdfxouTQtLy3NZjwxorokZk2ZKp0./btofwyC', 'ZnxY4kLBx49GDhvVMTYTCD4eIWAgIw7JvrY73wOvXW5jC9i2E7c9PWizlH7K', '2018-09-05 09:59:33', '2018-09-05 09:59:33'),
(5, 1, 'user2', 'user2@fds.com', NULL, '$2y$10$BMc6H0Gl6kk2c.IjAgh/FubZsJISqJppKKl3h0M/w0gVf.d3XNNkG', 'TelrAj46yqJLuq086guJJuu5xXoc5rMYEhjZS6OV63PBPBAXP4LgywoKDVTk', '2018-09-05 10:18:59', '2018-09-05 10:18:59'),
(6, 1, 'admin2', 'admin2@fds.com', NULL, '$2y$10$PzrwdTtnTKCCyf/0EH.BqOBbjnMvIb7V4RPaC/pVTKwUiGl0gBD.m', '0vB7YgTKNDes8QD37Yd9IOfzwcO5axuZEwOIf0a4QNSsBR8ZysI3UHMlUGlP', '2018-09-05 11:02:35', '2018-09-05 11:02:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
