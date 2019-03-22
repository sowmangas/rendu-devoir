-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  ven. 22 mars 2019 à 18:55
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rendu-devoir`
--

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

CREATE TABLE `devoir` (
  `code_devoir` int(11) NOT NULL,
  `code_formation` char(25) NOT NULL,
  `identifiant` int(11) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `evaluer` tinyint(1) NOT NULL,
  `coefficient` int(11) NOT NULL,
  `type_correction` varchar(255) NOT NULL,
  `date_limit_depot` date NOT NULL,
  `enonce` varchar(255) NOT NULL,
  `corrige_type` varchar(255) DEFAULT NULL,
  `periode` int(11) NOT NULL,
  `nom_matiere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `code_formation` char(25) NOT NULL,
  `nom_formation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `identifiant` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `adresse_mel` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` varchar(256) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `code_formation` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rendu`
--

CREATE TABLE `rendu` (
  `identifiant` int(11) NOT NULL,
  `code_devoir` int(11) NOT NULL,
  `rendu` varchar(255) NOT NULL,
  `date_depot` date NOT NULL,
  `note` decimal(10,0) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD PRIMARY KEY (`code_devoir`),
  ADD KEY `Code_formation` (`code_formation`),
  ADD KEY `Identifiant` (`identifiant`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`code_formation`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`identifiant`),
  ADD KEY `Adresse_mel` (`adresse_mel`),
  ADD KEY `fk1` (`code_formation`);

--
-- Index pour la table `rendu`
--
ALTER TABLE `rendu`
  ADD KEY `Identifiant` (`identifiant`),
  ADD KEY `code_devoir` (`code_devoir`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `devoir`
--
ALTER TABLE `devoir`
  MODIFY `code_devoir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `identifiant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD CONSTRAINT `fk1_personne_devoir` FOREIGN KEY (`identifiant`) REFERENCES `personne` (`identifiant`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_formation_devoir` FOREIGN KEY (`code_formation`) REFERENCES `formation` (`code_formation`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`code_formation`) REFERENCES `formation` (`code_formation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rendu`
--
ALTER TABLE `rendu`
  ADD CONSTRAINT `fk1_devoir_rendu` FOREIGN KEY (`code_devoir`) REFERENCES `devoir` (`code_devoir`),
  ADD CONSTRAINT `fk2_personne_rendu` FOREIGN KEY (`identifiant`) REFERENCES `personne` (`identifiant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
