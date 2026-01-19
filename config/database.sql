SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `web4heroes` DEFAULT CHARACTER SET utf8mb4 ;
USE `web4heroes` ;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `pwd` VARCHAR(255) NOT NULL,
  `lastname` VARCHAR(100) NULL,
  `firstname` VARCHAR(100) NULL,
  `gender` ENUM('Male', 'Female', 'Other') NULL DEFAULT 'Other',
  `birthdate` DATE NULL,
  `phone` VARCHAR(20) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `villain_profile` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `alias` VARCHAR(55) NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `description` LONGTEXT NOT NULL,
  `photo_path` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `alias_UNIQUE` (`alias`),
  UNIQUE INDEX `photo_path_UNIQUE` (`photo_path`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `hero_profile` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `alias` VARCHAR(55) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `photo_path` VARCHAR(255) NOT NULL,
  `is_active` TINYINT NULL DEFAULT 1,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `alias_UNIQUE` (`alias`),
  UNIQUE INDEX `users_id_UNIQUE` (`users_id`),
  CONSTRAINT `fk_hero_profile_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `incidents` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `date` DATETIME NOT NULL,
  `priority` ENUM('Low', 'Mid', 'High') NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `users_id` INT NOT NULL,
  `villain_profile_id` INT NULL,
  `status` ENUM('open', 'resolved') NOT NULL DEFAULT 'open',
  PRIMARY KEY (`id`),
  INDEX `fk_incidents_users_idx` (`users_id`),
  INDEX `fk_incidents_villain_profile1_idx` (`villain_profile_id`),
  CONSTRAINT `fk_incidents_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidents_villain_profile1`
    FOREIGN KEY (`villain_profile_id`)
    REFERENCES `villain_profile` (`id`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `movies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `imdb_path` VARCHAR(255) NOT NULL,
  `poster_path` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `newsletter_subscribers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `subscribed_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `email` VARCHAR(100) NOT NULL,
  `users_id` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_newsletter_subscribers_users1_idx` (`users_id`),
  CONSTRAINT `fk_newsletter_subscribers_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `users` (`id`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `intervention` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `incidents_id` INT NOT NULL,
  `hero_profile_id` INT NULL,
  `status` ENUM('pending', 'success', 'failed') DEFAULT 'pending',
  `date_open` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `date_close` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `incidents_id_UNIQUE` (`incidents_id`),
  INDEX `fk_intervention_hero_profile1_idx` (`hero_profile_id`),
  CONSTRAINT `fk_intervention_incidents1`
    FOREIGN KEY (`incidents_id`)
    REFERENCES `incidents` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_intervention_hero_profile1`
    FOREIGN KEY (`hero_profile_id`)
    REFERENCES `hero_profile` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `speciality` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `hero_profile_has_speciality` (
  `hero_profile_id` INT NOT NULL,
  `speciality_id` INT NOT NULL,
  PRIMARY KEY (`hero_profile_id`, `speciality_id`),
  INDEX `fk_speciality` (`speciality_id`),
  CONSTRAINT `fk_hero_spec_hero`
    FOREIGN KEY (`hero_profile_id`)
    REFERENCES `hero_profile` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_hero_spec_spec`
    FOREIGN KEY (`speciality_id`)
    REFERENCES `speciality` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `speciality_has_villain_profile` (
  `speciality_id` INT NOT NULL,
  `villain_profile_id` INT NOT NULL,
  PRIMARY KEY (`speciality_id`, `villain_profile_id`),
  INDEX `fk_villain` (`villain_profile_id`),
  CONSTRAINT `fk_villain_spec_spec`
    FOREIGN KEY (`speciality_id`)
    REFERENCES `speciality` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_villain_spec_villain`
    FOREIGN KEY (`villain_profile_id`)
    REFERENCES `villain_profile` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `movies_has_hero_profile` (
  `movies_id` INT NOT NULL,
  `hero_profile_id` INT NOT NULL,
  PRIMARY KEY (`movies_id`, `hero_profile_id`),
  INDEX `fk_hero` (`hero_profile_id`),
  CONSTRAINT `fk_movies_hero_movie`
    FOREIGN KEY (`movies_id`)
    REFERENCES `movies` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_movies_hero_hero`
    FOREIGN KEY (`hero_profile_id`)
    REFERENCES `hero_profile` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `adresse` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `number` VARCHAR(10) NULL,
  `complement` VARCHAR(45) NULL,
  `street` VARCHAR(255) NULL,
  `postal_code` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `pays` VARCHAR(45) NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_adresse_users1_idx` (`users_id`),
  CONSTRAINT `fk_adresse_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
