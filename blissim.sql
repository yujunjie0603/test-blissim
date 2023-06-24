-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : sam. 24 juin 2023 à 20:28
-- Version du serveur : 8.0.33
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blissim`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `email`, `password`, `name`, `create_at`, `update_at`, `delete_at`) VALUES
(1, 'test@blissim.com', '$2y$10$zgrPV.5/jr1FNdoKw1OpEuOqRGXCOMwvTfFXDp8d0.39AqndXQpoO', 'Long YU', '2023-06-22 09:45:42', NULL, NULL),
(2, 'yulong@gmail.com', '$2y$10$rrvWlBDhI2wdpaBYbcZc1O8Vo8frSmM1.Doz1KzoA8Aouk3din.yO', 'yu long', '2023-06-23 16:05:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `clients_comments`
--

CREATE TABLE `clients_comments` (
  `id` int NOT NULL,
  `id_client` int NOT NULL,
  `id_product` int NOT NULL,
  `comment` text NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients_comments`
--

INSERT INTO `clients_comments` (`id`, `id_client`, `id_product`, `comment`, `create_at`, `update_at`) VALUES
(1, 1, 1, 'sdf?test=\'\'', '2023-06-24 17:25:39', '2023-06-24 17:55:14');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text,
  `price` float NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `comment`, `price`, `active`) VALUES
(1, 'product 3', 'comment product 1', 0, 1),
(2, 'product 2', 'comment product 2', 0, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `clients_comments`
--
ALTER TABLE `clients_comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_client` (`id_client`,`id_product`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `clients_comments`
--
ALTER TABLE `clients_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
