-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 27 jan. 2023 à 10:08
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `la_caverne_des_jeux`
--

-- --------------------------------------------------------

--
-- Structure de la table `account_level`
--

CREATE TABLE `account_level` (
  `id` int(11) NOT NULL,
  `level_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `account_level`
--

INSERT INTO `account_level` (`id`, `level_name`) VALUES
(1, 'administrateur'),
(2, 'vendeur'),
(3, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `age_range`
--

CREATE TABLE `age_range` (
  `id` int(11) NOT NULL,
  `age_range` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `age_range`
--

INSERT INTO `age_range` (`id`, `age_range`) VALUES
(1, 'à partir de 4 ans'),
(2, 'à partir de 8 ans'),
(3, 'à partir de 12 ans'),
(4, 'adulte');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Solo'),
(2, 'Coopératif'),
(3, 'Famille'),
(4, 'Expert');

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

CREATE TABLE `editor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `editor`
--

INSERT INTO `editor` (`id`, `name`) VALUES
(1, 'Matagot'),
(2, 'Blam !'),
(3, 'Next Move'),
(4, 'Zman Games');

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `game_picture` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `editor_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_range_id` int(11) NOT NULL,
  `publication_date` date NOT NULL,
  `game_duration` int(11) NOT NULL,
  `player_number_id` int(11) NOT NULL,
  `sold` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `name`, `price`, `game_picture`, `category_id`, `editor_id`, `description`, `age_range_id`, `publication_date`, `game_duration`, `player_number_id`, `sold`) VALUES
(1, 'Azul', 40.5, '../Picture/Game/game_id_1.jpeg', 3, 1, 'Dans Azul, incarnez un artisan au 16ème siècle chargé de décorer le Palais Royal de Evora. Prenez votre truelle et faites ressortir vos talents d\'artisan pour constituer la plus belle mosaïque !', 4, '2015-02-02', 45, 4, 1000),
(2, 'King of Tokyo', 35, '../Picture/Game/game_id_2.jpeg', 3, 3, 'Vous connaissiez King of Tokyo ? Et bien découvrez le nouveau visage du jeu avec des illustrations signées Régis Torrès, le talentueux illustrateur de King of New York.', 2, '2019-03-23', 30, 4, 54),
(3, 'Constellations ', 15.9, '../Picture/Game/game_id_3.jpeg', 3, 4, 'Constellations est un jeu d\'observation, de repérage dans l\'espace et de rapidité.', 1, '2023-01-10', 10, 2, 36),
(4, 'Wingspan', 54.9, '../Picture/Game/game_id_4.jpeg', 4, 3, 'Wingspan est un jeu de collection dans lequel les joueurs incarnent des amoureux d\'oiseaux, chercheurs, observateurs, ornithologues ou collectionneurs, ayant pour objectif d\'aménager la plus belle des volières.', 4, '2020-04-13', 90, 4, 0),
(5, 'Terraformin Mars', 53.95, '../Picture/Game/game_id_5.jpeg', 4, 3, 'L\'ère de la domestication de Mars a commencé. Dans Terraforming Mars, de puissantes corporations travaillent pour rendre la Planète Rouge habitable. La température, l\'oxygène et les océans sont les trois axes de développement principaux. Mais pour triompher, il faudra aussi construire des infrastructures pour les générations futures.', 4, '2011-11-12', 120, 4, 0),
(6, 'Les Aventuriers du Rail Europe', 42.95, '../Picture/Game/game_id_6.jpeg', 3, 3, 'Dans Les Aventuriers du Rail Europe, partez à l\'assaut du réseau ferroviaire européen. Des remparts d\'Edimbourg aux docks de Constantinople, des ruelles poussiéreuses de Pampelune aux quais gelés de la grande gare de Saint-Pétersbourg, ce 2ème volume vous emmène à la découverte de l\'Europe des années 1900.', 2, '2023-01-09', 60, 2, 0),
(7, 'Bazar-bizarre', 19.5, '../Picture/Game/game_id_7.jpeg', 2, 2, 'Pour les pièces en bois, la bouteille est verte, le fantôme est blanc,le fauteuil est rouge, le livre est bleu et la souris est grise !', 1, '2019-03-26', 20, 2, 89),
(8, 'Catane', 23.45, '../Picture/Game/game_id_8.jpeg', 1, 2, 'Explorez l\'île de Catane et utilisez vos ressources pour construire villes et routes. Contrôlez le plus grand territoire et remportez la partie. Catan est un jeu mêlant la gestion et la négociation.', 1, '2023-01-02', 60, 1, 0),
(9, 'Chabyrinthe', 16.8, '../Picture/Game/game_id_9.jpeg', 1, 3, 'Chabyrinthe est un jeu tactique qui enchantera les petits chatons tout comme les gros matoux ! Créez un parcours sans obstacles pour permettre aux félins de trouver un toit accueillant.', 1, '2023-01-09', 10, 1, 0),
(10, 'Scythe', 45.78, '../Picture/Game/game_id_10.jpeg', 3, 4, 'Dans Scythe, prenez le contrôle de l\'Usine, un territoire encore meurtri par les combats de la Première Guerre Mondiale. Vivez une expérience de jeu complète et hautement stratégique et devenez le peuple le plus reconnu.', 3, '2023-01-02', 90, 3, 1984);

-- --------------------------------------------------------

--
-- Structure de la table `player_number`
--

CREATE TABLE `player_number` (
  `id` int(11) NOT NULL,
  `player_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `player_number`
--

INSERT INTO `player_number` (`id`, `player_number`) VALUES
(1, '1 joueur'),
(2, '2 joueurs'),
(3, '3 joueurs'),
(4, '4 joueurs');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_picture` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_level_id` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `registration_date` date NOT NULL,
  `light_dark` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `last_name`, `first_name`, `email`, `password`, `profil_picture`, `account_level_id`, `birthdate`, `registration_date`, `light_dark`) VALUES
(1, 'administrateur', 'administrateur', 'administrateur@administrateur.com', 'administrateur', '../Picture/Avatar/default_avatar.jpg', 1, '2023-01-25', '2023-01-25', 0),
(2, 'vendeur', 'vendeur', 'vendeur@vendeur.com', 'vendeur', '../Picture/Avatar/default_avatar.jpg', 2, '2023-01-02', '2023-01-25', 0),
(3, 'client', 'client', 'client@client.com', 'client', '../Picture/Avatar/default_avatar.jpg', 3, '2023-01-09', '2023-01-25', 0),
(4, 'bruno', 'bruno', 'bruno@bruno.com', 'bruno', '../Picture/Avatar/default_avatar.jpg', 3, '1991-04-13', '2023-01-27', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_cart`
--

CREATE TABLE `user_cart` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_cart`
--

INSERT INTO `user_cart` (`user_id`, `game_id`) VALUES
(4, 4),
(3, 4),
(3, 4),
(3, 4),
(3, 4),
(3, 4),
(3, 4),
(3, 1),
(4, 4),
(4, 4),
(4, 4),
(4, 4),
(4, 6),
(4, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account_level`
--
ALTER TABLE `account_level`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `age_range`
--
ALTER TABLE `age_range`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `player_number`
--
ALTER TABLE `player_number`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account_level`
--
ALTER TABLE `account_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `age_range`
--
ALTER TABLE `age_range`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `editor`
--
ALTER TABLE `editor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `player_number`
--
ALTER TABLE `player_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
