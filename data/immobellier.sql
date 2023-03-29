-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 mars 2023 à 16:08
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immobellier`
--
CREATE DATABASE IF NOT EXISTS `immobellier` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `immobellier`;

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--
-- Création : mer. 29 mars 2023 à 12:09
-- Dernière modification : mer. 29 mars 2023 à 14:07
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE `annonce` (
  `id_annonce` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `price` mediumint(11) DEFAULT NULL,
  `surface` int(11) DEFAULT NULL,
  `room` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `title`, `description`, `image`, `type`, `price`, `surface`, `room`, `user_id`, `created_at`, `modified_at`) VALUES
(5, 'Achat maison 7 pièces 249 m²', 'TREMBLAY-EN-FRANCE, secteur Bois-Saint-Denis. Proche du lycée professionnel Hélène Boucher, du collège René Descartes, des commerces mais surtout à 1km de la gare RER B du Vert-Galant. Au cœur d\'un quartier calme, venez découvrir cette belle et grande maison de type F7 composée en rez-de-jardin, d\'une entrée marbrée donnant accès', './uploads/600x370-fit-cover-orientation-0deg.jpeg', 'vente', 549000, 126, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Achat maison 6 pièces 145 m²', 'A VENDRE MAISON 4 CHAMBRES - AUTEUIL LE ROI. Et si vous posiez vos valises à Auteuil le Roi ? Charmant village situé à 5mn de THOIRY, vous rejoindrez la N12 et la GARE de Montfort l\'Amaury en 7mn.\r\nVenez découvrir cette belle maison d\'environ145m2 en excellent état, LUMINEUSE et pensée pour une vie douce et pratique au quotidien.', './uploads/raw.jpeg', 'location', 654000, 249, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Achat appartement 3 pièces 54 m²', 'Achat appartement 3 pièces 54m2 - Le Chesnay. À vendre bel appartement 3 pièces 54m2, au troisième et dernier étage d\'un immeuble en pierre meulière situé proche toutes commodités à deux pas de la place de la loi à Versailles.\r\nIl se compose d\'une entrée, une cuisine indépendante, un séjour avec une belle cheminée décorative , 2 chambres et une salle d\' eau.', './uploads/600x3eg.jpeg', 'location', 750, 75, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--
-- Création : mer. 29 mars 2023 à 09:38
-- Dernière modification : mer. 29 mars 2023 à 11:05
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `email`, `password`, `town`, `adress`, `postal_code`, `phone`, `role`, `created_at`) VALUES
(1, 'Stelian-Constantin', 'Stanciu', 'stanciu.stelian86@yahoo.fr', '$2y$10$Mco2lPq6ouCwFc9knOdl7OlsXJt/8qzxi0jWhW4FdwzMhF7R33o3C', '', 'Pavilly', 0, 606060606, 'admin', '0000-00-00 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
