-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 19 mai 2021 à 10:33
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pokemondoctrine_dev`
--
CREATE DATABASE IF NOT EXISTS `pokemondoctrine_dev` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pokemondoctrine_dev`;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210405180733', '2021-04-05 20:09:57', 38),
('DoctrineMigrations\\Version20210405182649', '2021-04-05 20:38:19', 51),
('DoctrineMigrations\\Version20210405185113', '2021-04-05 20:51:21', 109),
('DoctrineMigrations\\Version20210410141857', '2021-04-10 16:19:14', 292);

-- --------------------------------------------------------

--
-- Structure de la table `pokemons`
--

DROP TABLE IF EXISTS `pokemons`;
CREATE TABLE `pokemons` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evolve` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `down_evolve` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_evolve` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_down_evolve` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_pokedex` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pokemons`
--

INSERT INTO `pokemons` (`id`, `name`, `type`, `evolve`, `down_evolve`, `level_evolve`, `level_down_evolve`, `numero_pokedex`) VALUES
(1, 'Bulbizarre', 'Herbe', 'Herbizarre', NULL, NULL, NULL, '001'),
(4, 'Pikachu', 'Electrique', NULL, NULL, NULL, NULL, '025'),
(5, 'Salamèche', 'Feu', NULL, NULL, NULL, NULL, '004'),
(7, 'Mewtwo', 'Psy', NULL, NULL, NULL, NULL, '150'),
(8, 'Mew', 'Psy', NULL, NULL, NULL, NULL, '151'),
(9, 'Pikachu', 'Electrique', NULL, NULL, NULL, NULL, '025'),
(10, 'Raichu', 'Electrique', NULL, NULL, NULL, NULL, '026'),
(11, 'Draco', 'Normal Dragon', NULL, NULL, NULL, NULL, '148'),
(12, 'Reptincel', 'Feu', NULL, NULL, NULL, NULL, '005');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `pokemons`
--
ALTER TABLE `pokemons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pokemons`
--
ALTER TABLE `pokemons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
