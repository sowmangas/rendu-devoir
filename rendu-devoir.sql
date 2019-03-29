-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  sam. 16 mars 2019 à 14:54
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
  `Code_devoir` char(100) NOT NULL,
  `Code_formation` char(25) NOT NULL,
  `Identifiant` varchar(255) NOT NULL,
  `Intitule` varchar(255) NOT NULL,
  `Evaluer` tinyint(1) NOT NULL,
  `Coefficient` int(11) NOT NULL,
  `Type_correction` varchar(255) NOT NULL,
  `Date_limit_depot` date NOT NULL,
  `Enonce` varchar(255) NOT NULL,
  `Corrige_type` varchar(255) NOT NULL,
  `Periode` int(11) NOT NULL,
  `Nom_Matiere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `Code_formation` char(25) NOT NULL,
  `Nom_formation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `Identifiant` varchar(256) NOT NULL,
  `Nom` varchar(256) NOT NULL,
  `Prenom` varchar(256) NOT NULL,
  `Adresse_mel` varchar(256) NOT NULL,
  `Role` varchar(256) NOT NULL,
  `Titre` varchar(256) NOT NULL,
  `Code_formation` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rendu`
--

CREATE TABLE `rendu` (
  `Identifiant` varchar(255) NOT NULL,
  `code_devoir` varchar(255) NOT NULL,
  `Rendu` varchar(255) NOT NULL,
  `Date_depot` date NOT NULL,
  `Note` decimal(10,0) NOT NULL,
  `Commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `indentifiant` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD PRIMARY KEY (`Code_devoir`),
  ADD KEY `Code_formation` (`Code_formation`),
  ADD KEY `Identifiant` (`Identifiant`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`Code_formation`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`Identifiant`),
  ADD KEY `fk1` (`Code_formation`);

--
-- Index pour la table `rendu`
--
ALTER TABLE `rendu`
  ADD KEY `Identifiant` (`Identifiant`),
  ADD KEY `code_devoir` (`code_devoir`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD KEY `indentifiant` (`indentifiant`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD CONSTRAINT `fk1_pers_devoir` FOREIGN KEY (`Identifiant`) REFERENCES `personne` (`Identifiant`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_formation_devoir` FOREIGN KEY (`Code_formation`) REFERENCES `formation` (`Code_formation`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`Code_formation`) REFERENCES `formation` (`Code_formation`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `rendu`
--
ALTER TABLE `rendu`
  ADD CONSTRAINT `fk1_personne_rendu` FOREIGN KEY (`Identifiant`) REFERENCES `personne` (`Identifiant`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_devoir_rendu` FOREIGN KEY (`code_devoir`) REFERENCES `devoir` (`Code_devoir`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk1_personne_user` FOREIGN KEY (`indentifiant`) REFERENCES `personne` (`Identifiant`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
