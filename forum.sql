-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum`;

-- Listage de la structure de table forum. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum.category : ~6 rows (environ)
INSERT INTO `category` (`id_category`, `title`) VALUES
	(1, 'Cinema'),
	(2, 'Manga'),
	(3, 'Actu'),
	(4, 'BD'),
	(5, 'Livre'),
	(6, 'Football'),
	(7, 'Moto');

-- Listage de la structure de table forum. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `dateCrea` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `topic_id` int NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `user_id` (`user_id`),
  KEY `topic_id` (`topic_id`),
  CONSTRAINT `FK_post_topic` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `FK_post_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum.post : ~7 rows (environ)
INSERT INTO `post` (`id_post`, `text`, `dateCrea`, `user_id`, `topic_id`) VALUES
	(1, 'Blablabblabal', '2023-07-17 09:37:37', 2, 3),
	(2, 'rererererererer', '2023-07-17 09:37:56', 1, 5),
	(3, 'mamamamamamamamama', '2023-07-17 09:38:17', 3, 4),
	(4, '&lt;p&gt;frevfr&lt;/p&gt;', '2023-07-21 14:52:21', 1, 4),
	(5, '&lt;p&gt;frevfrrfrev&lt;/p&gt;', '2023-07-21 14:52:34', 1, 4),
	(6, '&lt;p&gt;frf&#039;gtg&lt;/p&gt;', '2023-07-21 14:53:36', 1, 4),
	(7, '&lt;p&gt;&lt;span style=&quot;background-color: #e03e2d;&quot;&gt;salut&lt;/span&gt;&lt;/p&gt;', '2023-07-21 14:53:49', 1, 4);

-- Listage de la structure de table forum. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `texte` text NOT NULL,
  `dateCrea` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `FK_topic_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_topic_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum.topic : ~18 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `texte`, `dateCrea`, `locked`, `user_id`, `category_id`) VALUES
	(3, 'Batman', '', '2023-07-17 09:18:38', 1, 2, 1),
	(4, 'Superman\r\n', '', '2023-07-17 09:19:07', 1, 1, 1),
	(5, 'Spirou', '', '2023-07-17 09:19:33', 1, 3, 4),
	(6, '', '', '2023-07-21 11:29:10', 0, 1, 1),
	(7, '', '', '2023-07-21 11:35:10', 0, 1, 4),
	(8, '', '', '2023-07-21 11:35:18', 0, 1, 4),
	(9, '', '', '2023-07-21 11:35:41', 0, 1, 4),
	(10, '', '', '2023-07-21 11:35:52', 0, 1, 4),
	(11, 'sefr', '', '2023-07-21 11:40:16', 0, 1, 4),
	(12, 'Meteo', '', '2023-07-21 11:40:56', 0, 1, 3),
	(13, 'Meteo', '', '2023-07-21 11:41:22', 0, 1, 3),
	(14, 'Hello', '', '2023-07-21 11:42:01', 0, 1, 3),
	(15, 'salut', '', '2023-07-21 11:42:23', 0, 1, 3),
	(16, 'Bjr', '', '2023-07-21 11:46:18', 0, 1, 3),
	(17, 'Bjr', '', '2023-07-21 11:47:21', 0, 1, 3),
	(18, 'Titanic', 'e\'rt feggher rg\'t', '2023-07-21 13:38:54', 0, 1, 1),
	(19, 'Hello', 'Est-ce qu&#039;il va faire beau?', '2023-07-21 13:48:58', 0, 1, 1),
	(20, 'Hello', 'Est-ce qu&#039;il va faire beau?', '2023-07-21 13:49:03', 0, 1, 1),
	(21, 'Hello', 'Est-ce qu&#039;il va faire beau?', '2023-07-21 13:49:16', 0, 1, 1),
	(22, 'Info', 'Est-ce qu&#039;il va faire beau?', '2023-07-21 13:49:35', 0, 1, 1);

-- Listage de la structure de table forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `pasword` varchar(255) NOT NULL,
  `dateRegistration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum.user : ~3 rows (environ)
INSERT INTO `user` (`id_user`, `pseudo`, `pasword`, `dateRegistration`, `email`, `role`) VALUES
	(1, 'lulu24', 'azerty', '2023-07-11 14:44:48', 'azerty@mail.fr', 'membre'),
	(2, 'antho67', 'azerty', '2023-07-11 14:46:12', 'azerty@mail.fr', 'admin'),
	(3, 'nico177', 'azerty', '2023-07-11 14:46:12', 'azerty@mail.com', 'membre');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
