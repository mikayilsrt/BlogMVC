-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.19 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour blog-mvc
CREATE DATABASE IF NOT EXISTS `blog-mvc` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `blog-mvc`;

-- Export de la structure de la table blog-mvc. articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '0',
  `content` text,
  `thumbnail` varchar(255) DEFAULT 'default.png',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table blog-mvc. comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_post` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_post` (`id_post`),
  CONSTRAINT `id_post` FOREIGN KEY (`id_post`) REFERENCES `articles` (`id`),
  CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table blog-mvc. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table blog-mvc. votes
CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idPost` (`id_post`),
  KEY `idUser` (`id_user`),
  CONSTRAINT `idPost` FOREIGN KEY (`id_post`) REFERENCES `articles` (`id`),
  CONSTRAINT `idUser` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
