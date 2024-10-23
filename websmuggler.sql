-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2024 at 07:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websmuggler`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciircletext`
--

CREATE TABLE `ciircletext` (
  `id` int(11) NOT NULL,
  `heading_one` varchar(1000) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `cir1` varchar(1000) NOT NULL,
  `cir2` varchar(1000) NOT NULL,
  `cir3` varchar(1000) NOT NULL,
  `cir4` varchar(1000) NOT NULL,
  `cir5` varchar(1000) NOT NULL,
  `cir6` varchar(1000) NOT NULL,
  `cir7` varchar(1000) NOT NULL,
  `cir8` varchar(1000) NOT NULL,
  `cir9` varchar(1000) NOT NULL,
  `cir10` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ciircletext`
--

INSERT INTO `ciircletext` (`id`, `heading_one`, `text`, `cir1`, `cir2`, `cir3`, `cir4`, `cir5`, `cir6`, `cir7`, `cir8`, `cir9`, `cir10`, `created_at`, `updated_at`) VALUES
(1, 'Welcome!', 'Choose a Metric To Explore', 'Inventory Margins  6%', 'Customer Retention  27%', 'Time savings  15 brs/wk', 'Marketing Campaigns  +31%', 'Regulatory Compliance  99%', 'Product Shrinkage  -41%', 'Customer satisfaction  +17%', 'Adoption Rate  95%', 'Inventory Turnover +13%', 'Sales Revenue +4%', '2024-07-28 22:20:28', '2024-07-28 17:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `homeimages`
--

CREATE TABLE `homeimages` (
  `id` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `homeimages`
--

INSERT INTO `homeimages` (`id`, `image`, `created_at`, `updated_at`) VALUES
(5, 'images/img1.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(6, 'images/img2.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(8, 'images/img4.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(9, 'images/img5.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(12, 'images/img8.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(13, 'images/img9.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(17, 'images/img1.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(18, 'images/img2.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(19, 'images/img4.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(20, 'images/img5.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(21, 'images/img8.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(22, 'images/img9.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(23, 'images/img1.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(24, 'images/img2.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(25, 'images/img4.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(26, 'images/img5.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(27, 'images/img8.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(28, 'images/img9.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(29, 'images/img1.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(30, 'images/img2.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(31, 'images/img4.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(32, 'images/img5.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(33, 'images/img8.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41'),
(34, 'images/img9.png', '2024-07-28 18:23:41', '2024-07-28 18:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `homesteps`
--

CREATE TABLE `homesteps` (
  `id` int(11) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `heading` varchar(1000) NOT NULL,
  `text` text NOT NULL,
  `buttons` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `homesteps`
--

INSERT INTO `homesteps` (`id`, `file`, `heading`, `text`, `buttons`, `created_at`, `updated_at`) VALUES
(1, 'images/Home_page_3D_animation.webm', 'Enroll', '<p>Join the Smugglers family by entering your basic information to create an account. This first step opens the door to a suite of powerful tools designed to elevate your business.</p>\n\n<p>Click on the &ldquo;Sign Up&rdquo; button to Enroll and begin the sign-up process.</p>', '[{\"text\":\"Sign up for free\",\"link\":\"http:\\/\\/localhost\\/smugglerish_la\\/register\",\"color\":\"#193cbe\"}]', '2024-07-29 17:25:19', '2024-07-29 17:25:19'),
(2, 'images/img9.png', 'Setup', '<p>Connect your POS system to our cutting-edge OMS and input your preferences. Whether you do it yourself or with our friendly support team, you&rsquo;ll be set up in no time. This seamless process ensures you&rsquo;re ready to start transforming your business operations.</p>\n\n<p>Choose between setting up independently, requesting assistance, or scheduling a live demo.</p>', '[{\"text\":\"Get started\",\"link\":\"http:\\/\\/localhost\\/smugglerish_la\\/register\",\"color\":\"#157ccb\"},{\"text\":\"Request a Demo\",\"link\":\"http:\\/\\/localhost\\/smugglerish_la\\/register\",\"color\":\"#cabd07\"}]', '2024-07-29 17:37:34', '2024-07-29 17:37:34'),
(3, 'images/img9.png', 'Customize', '<p>Now, let&rsquo;s get personal! We&rsquo;ll work closely with you to tailor our system to your unique business needs. With a dedicated customer representative, you&rsquo;ll explore features like inventory management, distributor orders, and customer relationship tools. This phase can last as long as you need, allowing you to refine your preferences and feel confident in using our system to its fullest potential.</p>\n\n<p>Schedule a walkthrough call with us to customize your account.</p>', '[{\"text\":\"Schedule Call\",\"link\":\"http:\\/\\/localhost\\/smugglerish_la\\/register\",\"color\":\"#1c41ca\"},{\"text\":\"Customize Now\",\"link\":\"http:\\/\\/localhost\\/smugglerish_la\\/register\",\"color\":\"#debc17\"}]', '2024-07-29 17:40:05', '2024-07-29 17:40:05'),
(4, 'images/img9.png', 'Advance', '<p>Time to level up! With a deep understanding of your operations, we start offering tailored recommendations that can revolutionize your business. Expect insights on new product launches, operational strategies, and more. Advanced features like strategic pricing, customer engagement enhancements, and comprehensive analytics come into play, guiding you towards peak performance.</p>\n\n<p>Explore recommendations and set up campaigns.</p>', '[{\"text\":\"Explore Recommendations\",\"link\":\"http:\\/\\/localhost\\/smugglerish_la\\/register\",\"color\":\"#163cc5\"},{\"text\":\"Set Up Campaigns\",\"link\":\"http:\\/\\/localhost\\/smugglerish_la\\/register\",\"color\":\"#e3d402\"}]', '2024-07-29 17:41:41', '2024-07-29 17:41:41'),
(5, 'images/img9.png', 'Master', '<p>Welcome to the pinnacle of optimization! This final stage unleashes the full power of our system with advanced integrations and automations. Seamlessly manage orders, social media, e-commerce channels, and more, while our system handles the details. Continuous, data-driven recommendations ensure your business thrives effortlessly, giving you the freedom to focus on what you love.</p>\n\n<p>Upgrade to master solutions for expanded capabilities.</p>', '[{\"text\":\"Upgrade to Master\",\"link\":\"http:\\/\\/localhost\\/smugglerish_la\\/register\",\"color\":\"#1d8cc3\"}]', '2024-07-29 17:42:50', '2024-07-29 17:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `hometext`
--

CREATE TABLE `hometext` (
  `id` int(11) NOT NULL,
  `heading_one` varchar(1000) NOT NULL,
  `heading_two` varchar(1000) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hometext`
--

INSERT INTO `hometext` (`id`, `heading_one`, `heading_two`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Get ready...', 'this is going to be easy', 'Lose the stress, find your focus, and achieve better.', '2024-07-28 22:02:13', '2024-07-28 17:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `hometext2`
--

CREATE TABLE `hometext2` (
  `id` int(11) NOT NULL,
  `heading_one` varchar(1000) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hometext2`
--

INSERT INTO `hometext2` (`id`, `heading_one`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Connect over 300 integrations', 'Our software connects with the enterprise tools your organization already uses, right out of the box.', '2024-07-28 22:02:13', '2024-07-28 17:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `homevideos`
--

CREATE TABLE `homevideos` (
  `id` int(11) NOT NULL,
  `video_one` varchar(1000) NOT NULL,
  `video_two` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `homevideos`
--

INSERT INTO `homevideos` (`id`, `video_one`, `video_two`, `created_at`, `updated_at`) VALUES
(1, 'videos/Home_page_3D_animation.webm', 'videos/Smartsheet-Integrations-Q2-2022.mp4', '2024-07-28 17:57:25', '2024-07-28 17:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `stripe_plan` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `slug`, `stripe_plan`, `price`, `description`, `duration`, `plan`, `created_at`, `updated_at`) VALUES
(1, 'Start', 'Start', 'price_1PfUbcJLwTfQk1qt83cIcPcJ', 49, 'Start', 'monthly', 'Start', '2024-07-21 22:44:18', '2024-07-21 22:44:18'),
(2, 'Manage', 'Manage', 'price_1PfUdYJLwTfQk1qt4BbB04YL', 79, 'Manage', 'monthly', 'Manage', '2024-07-21 22:44:18', '2024-07-21 22:44:18'),
(3, 'Own', 'Own', 'price_1Pf8KEJLwTfQk1qtWUCeH61C', 149, 'Own', 'monthly', 'Own', '2024-07-21 22:44:18', '2024-07-21 22:44:18'),
(4, 'Grow', 'Grow', 'price_1Pf8KXJLwTfQk1qtqzNE1lOt', 299, 'Grow', 'monthly', 'Grow', '2024-07-21 22:44:18', '2024-07-21 22:44:18'),
(5, 'Start', 'Start', 'price_1Pf8LZJLwTfQk1qtPXIzJxIU', 349, 'Start', 'yearly', 'Start', '2024-07-21 22:44:18', '2024-07-21 22:44:18'),
(6, 'Manage', 'Manage', 'price_1Pf8M9JLwTfQk1qty5EZoR75', 588, 'Manage', 'yearly', 'Manage', '2024-07-21 22:44:18', '2024-07-21 22:44:18'),
(7, 'Own', 'Own', 'price_1Pf8MiJLwTfQk1qtTBqWhvGK', 1188, 'Own', 'yearly', 'Own', '2024-07-21 22:44:18', '2024-07-21 22:44:18'),
(8, 'Grow', 'Grow', 'price_1Pf8NBJLwTfQk1qtcIWh2LUw', 2388, 'Grow', 'yearly', 'Grow', '2024-07-21 22:44:18', '2024-07-21 22:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-03-20 20:40:13', '2024-03-20 20:40:13'),
(2, 'user', '2024-03-20 20:40:13', '2024-03-20 20:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 12, 1, '2024-03-20 20:40:13', '2024-03-20 20:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `stripe_id` varchar(500) NOT NULL,
  `stripe_status` varchar(200) NOT NULL,
  `stripe_price` varchar(500) NOT NULL,
  `quantity` int(10) NOT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` int(11) NOT NULL,
  `subscription_id` int(10) NOT NULL,
  `stripe_id` varchar(500) NOT NULL,
  `stripe_product` varchar(500) NOT NULL,
  `stripe_price` varchar(500) NOT NULL,
  `quantity` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(1000) DEFAULT NULL,
  `status` int(10) DEFAULT 0,
  `stripe_id` varchar(250) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `plan_id` int(10) NOT NULL,
  `password_apo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `phone`, `status`, `stripe_id`, `trial_ends_at`, `plan_id`, `password_apo`) VALUES
(12, 'Smuggler', 'admin', 'admin@gmail.com', NULL, '$2y$10$gnvae13zJhpR4Ys3mZv3aeyTylFibV1rFUOKkZdwRq8cCfW3hf1Ki', NULL, '2024-03-20 20:40:13', '2024-07-27 17:07:15', '', '', 0, NULL, NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `lic_no` varchar(1000) NOT NULL,
  `store_name` varchar(1000) NOT NULL,
  `entity_name` varchar(1000) NOT NULL,
  `store_address` varchar(1000) NOT NULL,
  `store_city` varchar(1000) NOT NULL,
  `store_county` varchar(1000) NOT NULL,
  `store_state` varchar(1000) NOT NULL,
  `plan_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ciircletext`
--
ALTER TABLE `ciircletext`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeimages`
--
ALTER TABLE `homeimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homesteps`
--
ALTER TABLE `homesteps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hometext`
--
ALTER TABLE `hometext`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hometext2`
--
ALTER TABLE `hometext2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homevideos`
--
ALTER TABLE `homevideos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
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
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ciircletext`
--
ALTER TABLE `ciircletext`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homeimages`
--
ALTER TABLE `homeimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `homesteps`
--
ALTER TABLE `homesteps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hometext`
--
ALTER TABLE `hometext`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hometext2`
--
ALTER TABLE `hometext2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homevideos`
--
ALTER TABLE `homevideos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
