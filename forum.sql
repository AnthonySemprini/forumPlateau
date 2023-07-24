-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 24 juil. 2023 à 20:35
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
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `title`) VALUES
(1, 'Actu'),
(2, 'Film');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `text` text NOT NULL,
  `dateCrea` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `text`, `dateCrea`, `user_id`, `topic_id`) VALUES
(1, '&lt;p&gt;test&lt;/p&gt;', '2023-07-24 21:39:23', 1, 1),
(2, '&lt;ul&gt;&lt;li&gt;t&lt;span style=&quot;background-color: #e03e2d;&quot;&gt;est2&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', '2023-07-24 21:39:50', 1, 1),
(3, '&lt;ol&gt;&lt;li&gt;&lt;span style=&quot;background-color: #e03e2d;&quot;&gt;&lt;strong&gt;velo&lt;/strong&gt; &lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;background-color: #e03e2d;&quot;&gt;&lt;strong&gt;bonjour&lt;/strong&gt;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;background-color: #e03e2d;&quot;&gt;&lt;strong&gt; ordinateur&lt;/strong&gt;&lt;/span&gt;&lt;/li&gt;&lt;/ol&gt;', '2023-07-24 22:34:04', 1, 3),
(4, '&lt;p&gt;youyou&lt;/p&gt;', '2023-07-24 22:34:17', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id_topic` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `dateCrea` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `locked` tinyint(4) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id_topic`, `title`, `text`, `dateCrea`, `locked`, `user_id`, `category_id`) VALUES
(1, 'meteo', '', '2023-07-24 19:09:24', 1, 1, 1),
(2, 'Batman', 'tutututututututu', '2023-07-24 21:46:26', 1, 1, 2),
(3, 'Info du jour', 'mimimimimi', '2023-07-24 22:32:29', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateRegistration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(120) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `password`, `dateRegistration`, `email`, `role`) VALUES
(1, 'Anthony', '$2y$10$O1DqHhkdAQ3PEkife.UaiOOOXwSZlGZIbbm/TFyrwp6z37TDjC4jm', '2023-07-24 18:54:34', 'semprini.anthony@gmail.com', NULL),
(2, 'benjamin', '$2y$10$OEBC/ZLESW5o.irI9cAg.ehzQgvBiYa/evzJUoG1hZGbPWhMu9Kku', '2023-07-24 21:47:00', 'ben@mail.com', NULL),
(3, 'benjamin', '$2y$10$5JtHWshkTY1NFJY2Y3YYPOYLO1scenfCeQcJkWhqUEy6yNZzYhIca', '2023-07-24 21:55:15', 'ben@mail.com', NULL),
(4, 'benjamin', '$2y$10$H/ZYqE8tJSszqpTnziedEOfwGeFYlgDWUedar0jpaZmRr9FcTaSvW', '2023-07-24 21:55:30', 'ben@mail.com', NULL),
(5, 'nadege', '$2y$10$bTrWRamVLvLRDk7acQK8mOVEzSlZPfV/ABIZ.lP44uhiQp3fKPiQa', '2023-07-24 22:02:51', 'nanou@mail.com', NULL),
(6, 'ratus12', '$2y$10$y0gOSzt5Z6GKfS8O4p0Z5ePvbLuU/e6nKN06Drjq2Xi6mnkYjDsAa', '2023-07-24 22:13:33', 'ratus12@mail.com', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `fk_topic` (`topic_id`),
  ADD KEY `fk_userPost` (`user_id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`),
  ADD KEY `fk_topic_category` (`category_id`),
  ADD KEY `kk_topic_user` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_topic` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_userPost` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `fk_topic_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`) ON DELETE CASCADE,
  ADD CONSTRAINT `kk_topic_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
