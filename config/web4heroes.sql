-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 21, 2026 at 10:17 AM
-- Server version: 10.6.12-MariaDB-1:10.6.12+maria~ubu2004
-- PHP Version: 8.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web4heroes`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `number` varchar(10) DEFAULT NULL,
  `complement` varchar(45) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hero_profile`
--

CREATE TABLE `hero_profile` (
  `id` int(11) NOT NULL,
  `alias` varchar(55) NOT NULL,
  `description` longtext NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hero_profile_has_speciality`
--

CREATE TABLE `hero_profile_has_speciality` (
  `hero_profile_id` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

CREATE TABLE `incidents` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `date` datetime NOT NULL,
  `priority` enum('Low','Mid','High') NOT NULL,
  `type` varchar(45) NOT NULL,
  `users_id` int(11) NOT NULL,
  `villain_profile_id` int(11) DEFAULT NULL,
  `status` enum('open','resolved') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intervention`
--

CREATE TABLE `intervention` (
  `id` int(11) NOT NULL,
  `incidents_id` int(11) NOT NULL,
  `hero_profile_id` int(11) DEFAULT NULL,
  `status` enum('pending','success','failed') DEFAULT 'pending',
  `date_open` datetime DEFAULT current_timestamp(),
  `date_close` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `imdb_path` varchar(255) NOT NULL,
  `poster_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies_has_hero_profile`
--

CREATE TABLE `movies_has_hero_profile` (
  `movies_id` int(11) NOT NULL,
  `hero_profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL,
  `subscribed_at` datetime DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `speciality_has_villain_profile`
--

CREATE TABLE `speciality_has_villain_profile` (
  `speciality_id` int(11) NOT NULL,
  `villain_profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT 'Other',
  `birthdate` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `token` binary(32) DEFAULT NULL,
  `expiry_token` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `villain_profile`
--

CREATE TABLE `villain_profile` (
  `id` int(11) NOT NULL,
  `alias` varchar(55) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` longtext NOT NULL,
  `photo_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_adresse_users1_idx` (`users_id`);

--
-- Indexes for table `hero_profile`
--
ALTER TABLE `hero_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias_UNIQUE` (`alias`),
  ADD UNIQUE KEY `users_id_UNIQUE` (`users_id`);

--
-- Indexes for table `hero_profile_has_speciality`
--
ALTER TABLE `hero_profile_has_speciality`
  ADD PRIMARY KEY (`hero_profile_id`,`speciality_id`),
  ADD KEY `fk_speciality` (`speciality_id`);

--
-- Indexes for table `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_incidents_users_idx` (`users_id`),
  ADD KEY `fk_incidents_villain_profile1_idx` (`villain_profile_id`);

--
-- Indexes for table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `incidents_id_UNIQUE` (`incidents_id`),
  ADD KEY `fk_intervention_hero_profile1_idx` (`hero_profile_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies_has_hero_profile`
--
ALTER TABLE `movies_has_hero_profile`
  ADD PRIMARY KEY (`movies_id`,`hero_profile_id`),
  ADD KEY `fk_hero` (`hero_profile_id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_newsletter_subscribers_users1_idx` (`users_id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speciality_has_villain_profile`
--
ALTER TABLE `speciality_has_villain_profile`
  ADD PRIMARY KEY (`speciality_id`,`villain_profile_id`),
  ADD KEY `fk_villain` (`villain_profile_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `villain_profile`
--
ALTER TABLE `villain_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias_UNIQUE` (`alias`),
  ADD UNIQUE KEY `photo_path_UNIQUE` (`photo_path`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_profile`
--
ALTER TABLE `hero_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `villain_profile`
--
ALTER TABLE `villain_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_adresse_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `hero_profile`
--
ALTER TABLE `hero_profile`
  ADD CONSTRAINT `fk_hero_profile_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `hero_profile_has_speciality`
--
ALTER TABLE `hero_profile_has_speciality`
  ADD CONSTRAINT `fk_hero_spec_hero` FOREIGN KEY (`hero_profile_id`) REFERENCES `hero_profile` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_hero_spec_spec` FOREIGN KEY (`speciality_id`) REFERENCES `speciality` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `incidents`
--
ALTER TABLE `incidents`
  ADD CONSTRAINT `fk_incidents_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_incidents_villain_profile1` FOREIGN KEY (`villain_profile_id`) REFERENCES `villain_profile` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `fk_intervention_hero_profile1` FOREIGN KEY (`hero_profile_id`) REFERENCES `hero_profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_intervention_incidents1` FOREIGN KEY (`incidents_id`) REFERENCES `incidents` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `movies_has_hero_profile`
--
ALTER TABLE `movies_has_hero_profile`
  ADD CONSTRAINT `fk_movies_hero_hero` FOREIGN KEY (`hero_profile_id`) REFERENCES `hero_profile` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_movies_hero_movie` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD CONSTRAINT `fk_newsletter_subscribers_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `speciality_has_villain_profile`
--
ALTER TABLE `speciality_has_villain_profile`
  ADD CONSTRAINT `fk_villain_spec_spec` FOREIGN KEY (`speciality_id`) REFERENCES `speciality` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_villain_spec_villain` FOREIGN KEY (`villain_profile_id`) REFERENCES `villain_profile` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
