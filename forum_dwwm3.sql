-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 11 juil. 2023 à 14:10
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum_dwwm3`
--

-- 
-- Listage de la structure de la base pour forum_dwwm3
CREATE DATABASE IF NOT EXISTS `forum_dwwm3` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum_dwwm3`;

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `id_category` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`id_category`, `Title`) VALUES
(1, 'Cinema'),
(2, 'Manga'),
(3, 'Actu'),
(4, 'BD'),
(5, 'Livre'),
(6, 'Football');

-- --------------------------------------------------------

--
-- Structure de la table `Post`
--

CREATE TABLE `Post` (
  `id_post` int(11) NOT NULL,
  `Text` text NOT NULL,
  `DateCrea` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_topic` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Topics`
--

CREATE TABLE `Topics` (
  `id_topic` int(11) NOT NULL,
  `TitleTopic` varchar(50) NOT NULL,
  `DateCrea` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Locked` tinyint(1) NOT NULL,
  `Id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Topics`
--

INSERT INTO `Topics` (`id_topic`, `TitleTopic`, `DateCrea`, `Locked`, `Id_category`, `id_user`) VALUES
(1, 'Batman ', '2023-07-11 14:47:32', 1, 1, 1),
(2, 'Racing club de strasbourg', '2023-07-11 14:48:52', 1, 6, 2),
(3, 'La meteo de demain', '2023-07-11 14:48:52', 1, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id_user` int(11) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `Pasword` varchar(255) NOT NULL,
  `DateRegistration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Email` varchar(255) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id_user`, `Pseudo`, `Pasword`, `DateRegistration`, `Email`, `Role`) VALUES
(1, 'lulu24', 'azerty', '2023-07-11 14:44:48', 'azerty@mail.fr', 'membre'),
(2, 'antho67', 'azerty', '2023-07-11 14:46:12', 'azerty@mail.fr', 'admin'),
(3, 'nico177', 'azerty', '2023-07-11 14:46:12', 'azerty@mail.com', 'membre');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `fk_topic` (`id_topic`),
  ADD KEY `fk_userPost` (`id_user`);

--
-- Index pour la table `Topics`
--
ALTER TABLE `Topics`
  ADD PRIMARY KEY (`id_topic`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_category` (`Id_category`) USING BTREE;

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Post`
--
ALTER TABLE `Post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Topics`
--
ALTER TABLE `Topics`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `fk_topic` FOREIGN KEY (`id_topic`) REFERENCES `Topics` (`id_topic`),
  ADD CONSTRAINT `fk_userPost` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `Topics`
--
ALTER TABLE `Topics`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`Id_category`) REFERENCES `Categorie` (`id_category`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
