-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2018 at 04:23 PM
-- Server version: 10.3.6-MariaDB-1:10.3.6+maria~xenial-log
-- PHP Version: 7.2.4-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notify`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `created_at`, `updated_at`) VALUES
(1, 'view-students', NULL, NULL, NULL, 0, '2018-04-23 08:55:28', '2018-04-23 08:55:28'),
(2, 'view-payments', NULL, NULL, NULL, 0, '2018-04-23 08:55:51', '2018-04-23 08:55:51'),
(3, 'view-orders', NULL, NULL, NULL, 0, '2018-04-23 08:55:59', '2018-04-23 08:55:59'),
(4, 'view-reports', NULL, NULL, NULL, 0, '2018-04-23 08:56:14', '2018-04-23 08:56:14'),
(5, 'manage-users', NULL, NULL, NULL, 0, '2018-04-23 08:56:37', '2018-04-23 08:56:37'),
(6, 'create-meals', NULL, NULL, NULL, 0, '2018-04-23 08:58:10', '2018-04-23 08:58:10'),
(7, 'create-payments', NULL, NULL, NULL, 0, '2018-04-23 08:59:56', '2018-04-23 08:59:56'),
(8, 'update-meals', NULL, NULL, NULL, 0, '2018-04-23 09:01:27', '2018-04-23 09:01:27'),
(9, 'dispense-orders', NULL, NULL, NULL, 0, '2018-04-23 09:02:18', '2018-04-23 09:02:18'),
(10, 'manage-students', NULL, NULL, NULL, 0, '2018-04-23 10:47:53', '2018-04-23 10:47:53'),
(11, 'order-meals', NULL, NULL, NULL, 0, '2018-04-23 11:00:51', '2018-04-23 11:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`role_id`, `entity_id`, `entity_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `meal_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `price`, `category`, `details`, `image`, `created_at`, `updated_at`, `available`) VALUES
(1, 'Grilled Chicken and Rice', '450', 'Soups', 'Cras semper sollicitudin leo, ac interdum justo congue ut.', '09b10c05e59874b56dd28ecf84797d3e.jpeg', '2018-04-23 10:37:13', '2018-04-23 10:38:38', 1),
(2, 'Salmon Dish Meal', '570', 'Main Course', 'Quisque vitae enim eget elit pretium varius. Nullam ornare justo ac maximus eleifend', '2d77bfd394cf835657fdc387293b54c9.jpeg', '2018-04-23 10:40:19', '2018-04-23 10:40:19', 1),
(3, 'Burger', '300', 'Snacks', 'Cinterdum justo congue ut. Quisque vitae enim eget elit pretium varius.', '511612b4f6440f47f40a0b71b42fd329.jpeg', '2018-04-23 10:41:34', '2018-04-23 10:41:34', 1),
(4, 'Black Forest Cake', '800', 'Cakes', 'Quisque vitae enim eget elit pretium varius. Nullam ornare justo ac maximu', '375991ac03f6687dab473ea1b340de07.jpeg', '2018-04-23 10:42:54', '2018-04-23 10:42:54', 1),
(5, 'Fruit Collection', '330', 'Main Course', 'Quisque vitae enim eget elit pretium varius. Nullam ornare justo ac maximus eleifend', '8db89775e629fc674e1deed4588e846b.jpeg', '2018-04-23 10:44:04', '2018-04-23 10:44:04', 1),
(6, 'Deep Fried Crisps', '400', 'Snacks', 'Cras semper sollicitudin leo, ac interdum justo congue ut. Quisque', '7d07ff43d33e33abfe0a66af3bd6cb5a.jpeg', '2018-04-23 10:45:15', '2018-04-23 10:45:15', 1);

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
(3, '2017_05_18_171102_create_students_table', 1),
(4, '2017_05_18_171250_create_meals_table', 1),
(5, '2017_05_18_171454_create_sales_table', 1),
(6, '2017_07_04_065115_create_notifications_table', 1),
(7, '2017_07_04_071427_create_student_account', 1),
(8, '2017_07_04_071520_create_payments_table', 1),
(9, '2017_07_17_083348_add_moore_order_fields', 1),
(10, '2017_07_18_071111_create_bouncer_tables', 1),
(11, '2017_07_18_202657_add_meal_availability', 1),
(12, '2017_07_18_235401_add_meal_active_flag', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `student_id`, `amount`, `order_number`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 0, 'TLNTVBI', '2018-04-23 11:02:36', '2018-04-23 11:02:36', 'Pending'),
(2, 1, 0, '1HBB5AT', '2018-04-23 11:12:35', '2018-04-23 11:12:35', 'Pending'),
(3, 1, 0, 'NCGC8TN', '2018-04-23 11:13:00', '2018-04-23 11:13:00', 'Pending'),
(4, 1, 850, 'LK8CFMH', '2018-04-23 11:15:01', '2018-04-23 11:15:01', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `meal_id` int(10) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `meal_id`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 400, 1, '2018-04-23 11:02:37', '2018-04-23 11:02:37'),
(2, 1, 1, 450, 1, '2018-04-23 11:02:37', '2018-04-23 11:02:37'),
(3, 2, 6, 400, 1, '2018-04-23 11:12:35', '2018-04-23 11:12:35'),
(4, 2, 1, 450, 1, '2018-04-23 11:12:35', '2018-04-23 11:12:35'),
(5, 3, 6, 400, 1, '2018-04-23 11:13:00', '2018-04-23 11:13:00'),
(6, 3, 1, 450, 1, '2018-04-23 11:13:01', '2018-04-23 11:13:01'),
(7, 4, 6, 400, 1, '2018-04-23 11:15:01', '2018-04-23 11:15:01'),
(8, 4, 1, 450, 1, '2018-04-23 11:15:01', '2018-04-23 11:15:01');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double(9,4) NOT NULL DEFAULT 0.0000,
  `trn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_via` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `trn`, `paid_via`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 10000.0000, 'SDJN24325', '', 1, '2018-04-23 10:45:45', '2018-04-23 10:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `ability_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`ability_id`, `entity_id`, `entity_type`, `forbidden`) VALUES
(1, 1, 'roles', 0),
(2, 1, 'roles', 0),
(3, 1, 'roles', 0),
(4, 1, 'roles', 0),
(5, 1, 'roles', 0),
(6, 1, 'roles', 0),
(7, 1, 'roles', 0),
(8, 1, 'roles', 0),
(9, 1, 'roles', 0),
(10, 1, 'roles', 0),
(3, 2, 'roles', 0),
(2, 2, 'roles', 0),
(11, 2, 'roles', 0),
(3, 3, 'roles', 0),
(7, 3, 'roles', 0),
(6, 3, 'roles', 0),
(4, 3, 'roles', 0),
(2, 3, 'roles', 0),
(9, 3, 'roles', 0),
(8, 3, 'roles', 0),
(1, 3, 'roles', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, '2018-04-23 08:50:44', '2018-04-23 08:50:44'),
(2, 'student', NULL, NULL, '2018-04-23 09:23:52', '2018-04-23 09:23:52'),
(3, 'clerk', NULL, NULL, '2018-04-23 11:00:51', '2018-04-23 11:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone_number`, `course`, `reg_no`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', '0729422001', '', 'CS/M/001/01/13', 'student@example.com', 2, '2018-04-23 09:23:52', '2018-04-23 09:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `student_accounts`
--

CREATE TABLE `student_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `current_amount` double(9,4) NOT NULL DEFAULT 0.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_accounts`
--

INSERT INTO `student_accounts` (`id`, `student_id`, `current_amount`, `created_at`, `updated_at`, `active`) VALUES
(1, 1, 9150.0000, '2018-04-23 10:45:46', '2018-04-23 11:15:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `verified`, `active`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'The Admin', 'admin@example.com', 1, 1, '$2y$10$4MemGa3kwl..p2rii4MVQOOExSbmztnyQjQ46OA8Qqbu3lQ4Fsitq', 'admin', 's4XSSz5o1FS6ZKAhRPa6Faa0h9E10WEN18D9GGnhBv1gB6nwPL42go4eW3m0', '2018-04-23 08:47:52', '2018-04-23 09:00:35'),
(2, 'John Doe', 'student@example.com', 1, 1, '$2y$10$ef6.iv8vJYL765XB0nrk4Ok2AntkrdY123E0GQsYeGs.G9NkYrNLC', 'Student', 'KGXSGbAhu3AWAj3Wc4V450bnrR1rJVkdiICXRi1e6qw9zfNRl6rj4WfuoiD3', '2018-04-23 09:23:52', '2018-04-23 09:23:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `abilities_unique_index` (`name`,`entity_id`,`entity_type`,`only_owned`);

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD KEY `assigned_roles_entity_id_entity_type_index` (`entity_id`,`entity_type`),
  ADD KEY `assigned_roles_role_id_index` (`role_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_student_id_foreign` (`student_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_student_id_foreign` (`student_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD KEY `permissions_entity_id_entity_type_index` (`entity_id`,`entity_type`),
  ADD KEY `permissions_ability_id_index` (`ability_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_accounts`
--
ALTER TABLE `student_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_accounts_student_id_foreign` (`student_id`);

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
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_accounts`
--
ALTER TABLE `student_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ability_id_foreign` FOREIGN KEY (`ability_id`) REFERENCES `abilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_accounts`
--
ALTER TABLE `student_accounts`
  ADD CONSTRAINT `student_accounts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
