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

-- Export de données de la table blog-mvc.articles : ~4 rows (environ)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `title`, `content`, `thumbnail`, `created_at`, `updated_at`, `user_id`) VALUES
	(1, 'Le Lorem Ipsum est simplement du faux texte', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'default.png', '2019-05-08 16:56:07', '2019-05-23 21:09:58', 33),
	(2, 'Le Lorem Ipsum est simplement du faux texte', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'default.png', '2019-05-08 16:56:07', '2019-05-23 21:10:09', 33),
	(3, 'dfgwdfg', 'wdfgfg', '34-liste-freelance.PNG', '2019-05-23 20:59:40', '2019-05-23 20:59:40', 34),
	(4, 'sfdgwsdf', 'dwfgwdfg', '34-liste-freelance.PNG', '2019-05-23 20:59:49', '2019-05-23 20:59:49', 34),
	(5, 'un titre', 'wdfgdgwdfg', '34-45-liste-freelance.PNG', '2019-05-23 21:06:45', '2019-05-23 21:06:45', 34);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

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

-- Export de données de la table blog-mvc.comments : ~7 rows (environ)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `content`, `created_at`, `id_user`, `id_post`) VALUES
	(2, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2019-05-19 16:30:29', 33, 2),
	(3, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2019-05-19 16:30:29', 33, 2),
	(4, 'srffgdfgdfgdfg', '2019-05-23 19:11:33', 33, 2),
	(5, 'srffgdfgdfgdfg', '2019-05-23 19:11:40', 33, 2),
	(6, 'srffgdfgdfgdfg', '2019-05-23 19:12:16', 33, 2),
	(7, 'te de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise ', '2019-05-23 19:18:24', 33, 1),
	(8, 'hello world', '2019-05-23 19:51:48', 34, 2);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

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

-- Export de données de la table blog-mvc.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(33, 'mikayilsrt', 'sert.mikayil@gmail.com', 'dfc13a839cee137559aa880a32649035', '2019-05-06 19:38:17', '2019-05-06 19:38:17'),
	(34, 'demo', 'demo@domaine.com', 'dfc13a839cee137559aa880a32649035', '2019-05-23 19:49:03', '2019-05-23 19:49:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

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

-- Export de données de la table blog-mvc.votes : ~3 rows (environ)
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` (`id`, `id_post`, `id_user`) VALUES
	(1, 1, 33),
	(2, 1, 34),
	(3, 2, 34);
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
