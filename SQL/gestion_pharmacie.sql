-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 18 fév. 2024 à 20:57
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_pharmacie`
--

-- --------------------------------------------------------

--
-- Structure de la table `achats`
--

CREATE TABLE `achats` (
  `id` int(11) NOT NULL,
  `nom_prod` varchar(50) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_unit` int(11) NOT NULL,
  `fournisseur` varchar(50) NOT NULL,
  `date_exp` date NOT NULL,
  `date_achat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `achats`
--

INSERT INTO `achats` (`id`, `nom_prod`, `quantite`, `prix_unit`, `fournisseur`, `date_exp`, `date_achat`) VALUES
(1, 'azer', 25, 2024, '', '0000-00-00', '0000-00-00'),
(2, '', 0, 0, '', '2024-02-16', '0000-00-00'),
(3, '', 0, 0, '', '2024-02-16', '0000-00-00'),
(4, '', 0, 0, '', '2024-02-16', '0000-00-00'),
(5, 'Amoxline', 33, 2500, 'Oummi', '2028-12-16', '2024-02-16'),
(6, 'Panadol', 100, 2000, 'Oummi', '2026-02-16', '2024-02-16'),
(7, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(8, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(9, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(10, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(11, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(12, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(13, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(14, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(15, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(16, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(17, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(18, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(19, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(20, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(21, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(22, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(23, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(24, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(25, '', 0, 0, '', '0000-00-00', '2024-02-17'),
(26, '', 0, 0, '', '0000-00-00', '2024-02-17');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(11) NOT NULL,
  `nom_fournisseur` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom_fournisseur`, `telephone`, `email`, `adresse`) VALUES
(1, 'Mahamat Saleh Matar', '68554455', 'matar@gmail.com', 'N\'Djamena'),
(2, 'Kaltouma Djimi Dadi', '65554856', 'klt@gmail.com', 'Kigali'),
(3, '', '', '', ''),
(4, '', '', '', ''),
(5, 'Yougouda', '66998545', 'youg@gmail.com', 'N\'Djamena'),
(6, 'aaa', 'aaa', 'aaa', 'aaa'),
(7, '', '', '', ''),
(8, '', '', '', ''),
(9, '', '', '', ''),
(10, '', '', '', ''),
(11, '', '', '', ''),
(12, '', '', '', ''),
(13, '', '', '', ''),
(14, '', '', '', ''),
(15, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom_prod` varchar(50) NOT NULL,
  `type_prod` varchar(50) NOT NULL,
  `quantite_dispo` int(11) NOT NULL,
  `prix_unit` int(11) NOT NULL,
  `nom_fabriquant` varchar(50) NOT NULL,
  `date_exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom_prod`, `type_prod`, `quantite_dispo`, `prix_unit`, `nom_fabriquant`, `date_exp`) VALUES
(1, 'Paracetamol', 'type1', 100, 500, 'je sais pas', '2025-07-31'),
(2, 'Doloprane', 'type1', 0, 1000, '', '2024-02-14'),
(3, 'Doloprane', 'type1', 0, 1000, 'je sais pas', '2026-02-01'),
(4, 'Amoxline', 'Type2', 0, 2500, 'Pfizer', '0000-00-00'),
(5, 'Amoxline', 'Type2', 0, 2500, 'Pfizer', '0000-00-00'),
(6, 'Panadol', 'Type2', 0, 1500, 'Pfizer', '2026-10-14'),
(7, 'Panadol', 'Type2', 0, 1500, 'Pfizer', '2026-10-14'),
(8, 'Panadol', 'Type2', 0, 1500, 'Parmacom', '2027-11-14'),
(9, '', '', 0, 0, '', '0000-00-00'),
(10, '', '', 0, 0, '', '0000-00-00'),
(11, 'Panadol Extra', 'Type2', 0, 3500, 'Pfizer', '2028-12-14'),
(12, 'Panadol Extra', 'Type2', 0, 3500, 'Pfizer', '2028-12-14'),
(13, '', '', 0, 0, '', '0000-00-00'),
(14, '', '', 0, 0, '', '0000-00-00'),
(15, '', '', 0, 0, '', '0000-00-00'),
(16, '', '', 0, 0, '', '0000-00-00'),
(17, 'aaaa', 'bbbb', 0, 1000, 'je sais pas', '0000-00-00'),
(18, '', '', 0, 0, '', '0000-00-00'),
(19, 'aaa', 'zzz', 0, 1500, 'Pfizer', '2024-03-10'),
(20, 'aaa', 'zzz', 0, 1500, 'Pfizer', '2024-03-10'),
(21, '', '', 0, 0, '', '0000-00-00'),
(22, '', '', 0, 0, '', '0000-00-00'),
(23, '', 'zzzzzzzz', 0, 0, '', '0000-00-00'),
(24, '', 'zzzzzzzz', 0, 0, '', '0000-00-00'),
(25, '', '', 0, 0, 'mmmm', '0000-00-00'),
(26, '', '', 0, 0, 'mmmm', '0000-00-00'),
(27, '', '', 0, 0, 'mmmm', '0000-00-00'),
(28, '', '', 0, 0, 'mmmm', '0000-00-00'),
(29, 'bgfbljk', 'hfjtt', 0, 11000, 'mmmm', '2025-01-01'),
(30, 'bgfbljk', 'hfjtt', 0, 11000, 'mmmm', '2025-01-01'),
(32, 'vvvvvvvvv', '', 0, 0, '', '0000-00-00'),
(33, '', 'ssss', 0, 8000, 'Pfizer', '2026-09-24'),
(38, '', '', 0, 0, '', '0000-00-00'),
(39, '', '', 0, 0, '', '0000-00-00'),
(40, '', '', 0, 0, '', '0000-00-00'),
(41, 'a', '', 0, 100, '', '0000-00-00'),
(42, '', '', 0, 0, '', '0000-00-00'),
(43, '', '', 0, 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `password`) VALUES
(1, 'Mahamat Saleh', 'Matar', 'matar@gmail.com', '0000'),
(2, 'Kaltouma', 'Djimi Dadi', 'ktma@gmail.com', 'kkkk'),
(3, 'Ali', 'Adam', 'ali@gmail.com', 'zzzzz'),
(4, 'Adam', 'Malick', 'adam@gmail.com', '1111'),
(5, 'Youssouf', 'Ziber', 'ziber@gmail.com', 'zzzz'),
(8, 'Oumar', 'Kichiné', 'oumar@gmail.com', 'oooo'),
(9, 'Pierre', 'Rabe', 'pierre@gmail.com', ''),
(10, 'Mahamat', 'Alhabib', 'mht@gmail.com', 'mmmm'),
(11, 'Abdal-wahhab', 'Abakar', 'abdel@gmail.com', 'aaaa'),
(12, 'Chema', 'Ali', 'chema@gmail.com', 'cccc'),
(13, 'Erlinda', 'Erlinda', 'erlinda@gmail.com', '5555'),
(14, 'Matar', 'Mht Saleh', 'matar@gmail.com', '0000'),
(15, 'aliii', 'Adam', 'ali@gmail.com', 'aaaa'),
(17, 'Khadidja', 'Youssouf', 'kadi@gmail.com', 'kkkk'),
(18, 'Hadjé Fané', 'Brahim', 'hadje@gmail.com', 'hhhh'),
(19, 'Alhadi', 'Hamdane', 'alhadi@gmail.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE `ventes` (
  `id` int(11) NOT NULL,
  `nom_prod` varchar(50) NOT NULL,
  `prix_unit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `date_vente` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`id`, `nom_prod`, `prix_unit`, `quantite`, `date_vente`) VALUES
(1, 'AH oui', 8000, 20, '2024-02-16'),
(2, 'zzz', 1000, 25, '0000-00-00'),
(3, 'Amoxline', 500, 25, '0000-00-00'),
(4, 'azerty', 100, 10, '0000-00-00'),
(5, '', 0, 0, '0000-00-00'),
(6, '', 0, 0, '0000-00-00'),
(7, '', 0, 0, '0000-00-00'),
(8, '', 0, 0, '0000-00-00'),
(9, '', 0, 0, '0000-00-00'),
(10, '', 0, 0, '0000-00-00'),
(11, '', 0, 0, '0000-00-00'),
(12, '', 0, 0, '0000-00-00'),
(13, '', 0, 0, '0000-00-00'),
(14, '', 0, 0, '0000-00-00'),
(15, '', 0, 0, '0000-00-00'),
(16, '', 0, 0, '0000-00-00'),
(17, '', 0, 0, '0000-00-00'),
(18, '', 0, 0, '0000-00-00'),
(19, '', 0, 0, '0000-00-00'),
(20, '', 0, 0, '0000-00-00'),
(21, '', 0, 0, '0000-00-00'),
(22, '', 0, 0, '0000-00-00'),
(23, '', 0, 0, '0000-00-00'),
(24, '', 0, 0, '0000-00-00'),
(25, '', 0, 0, '0000-00-00'),
(27, '', 0, 0, '2024-02-16'),
(28, '', 0, 0, '0000-00-00'),
(29, '', 0, 0, '2024-02-16'),
(30, '', 0, 0, '2024-02-16'),
(31, '', 0, 0, '2024-02-16'),
(32, 'Amoxline', 1000, 20, '2024-02-17'),
(33, 'Panadol', 500, 10, '2024-02-17'),
(34, 'Amoxline', 5000, 2, '2024-02-18');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achats`
--
ALTER TABLE `achats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pour la table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
