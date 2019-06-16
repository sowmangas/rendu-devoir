-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  sam. 15 juin 2019 à 15:41
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
-- Base de données :  `rendudevoir`
--

-- --------------------------------------------------------

--
-- Structure de la table `devoirs`
--

CREATE TABLE `devoirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `formation_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `intitule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_correction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_limit_depot` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enonce` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corrige_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_matiere` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `visible_corrige_type` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devoirs`
--

INSERT INTO `devoirs` (`id`, `formation_id`, `user_id`, `intitule`, `evaluer`, `type_correction`, `date_limit_depot`, `enonce`, `corrige_type`, `periode`, `nom_matiere`, `created_at`, `updated_at`, `visible_corrige_type`) VALUES
(1, 1, 1, 'Casse tête 1', '0', 'corrigé type', '2019-06-09 13:22:04', 'public/devoirs/devoir1.txt 1', NULL, 'S2', 'Spring boot 1', '2019-06-09 13:22:04', '2019-06-09 13:22:04', 0),
(2, 2, 2, 'Casse tête 2', '1', 'corrigé type', '2019-06-09 13:22:04', 'public/devoirs/devoir1.txt 2', NULL, 'S1', 'Spring boot 2', '2019-06-09 13:22:04', '2019-06-09 13:22:04', 0),
(3, 3, 3, 'Casse tête 3', '0', 'corrigé type', '2019-06-09 13:22:04', 'public/devoirs/devoir1.txt 3', NULL, 'S2', 'Spring boot 3', '2019-06-09 13:22:04', '2019-06-09 13:22:04', 0),
(4, 4, 4, 'Casse tête 4', '1', 'corrigé type', '2019-06-09 13:22:04', 'public/devoirs/devoir1.txt 4', NULL, 'S1', 'Spring boot 4', '2019-06-09 13:22:04', '2019-06-09 13:22:04', 0),
(5, 5, 5, 'Casse tête 5', '0', 'corrigé type', '2019-06-09 13:22:04', 'public/devoirs/devoir1.txt 5', NULL, 'S2', 'Spring boot 5', '2019-06-09 13:22:04', '2019-06-09 13:22:04', 0),
(6, 6, 6, 'Casse tête 6', '1', 'corrigé type', '2019-06-09 13:22:04', 'public/devoirs/devoir1.txt 6', NULL, 'S1', 'Spring boot 6', '2019-06-09 13:22:04', '2019-06-09 13:22:04', 0),
(7, 7, 7, 'Casse tête 7', '0', 'corrigé type', '2019-06-09 13:22:04', 'public/devoirs/devoir1.txt 7', NULL, 'S2', 'Spring boot 7', '2019-06-09 13:22:04', '2019-06-09 13:22:04', 0),
(8, 8, 8, 'Casse tête 8', '1', 'corrigé type', '2019-06-09 13:22:04', 'public/devoirs/devoir1.txt 8', NULL, 'S1', 'Spring boot 8', '2019-06-09 13:22:04', '2019-06-09 13:22:04', 0),
(9, 9, 9, 'Casse tête 9', '0', 'corrigé type', '2019-06-09 13:22:04', 'public/devoirs/devoir1.txt 9', NULL, 'S2', 'Spring boot 9', '2019-06-09 13:22:04', '2019-06-09 13:22:04', 0);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_formation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `nom_formation`, `created_at`, `updated_at`) VALUES
(1, 'MIAGE test', '2019-06-09 13:22:03', '2019-06-14 18:34:48'),
(2, 'MIAGE 1', '2019-06-09 13:22:03', '2019-06-09 13:22:03'),
(3, 'MIAGE 2', '2019-06-09 13:22:03', '2019-06-09 13:22:03'),
(4, 'MIAGE 3', '2019-06-09 13:22:03', '2019-06-09 13:22:03'),
(5, 'MIAGE 4', '2019-06-09 13:22:03', '2019-06-09 13:22:03'),
(6, 'MIAGE 5', '2019-06-09 13:22:03', '2019-06-09 13:22:03'),
(7, 'MIAGE 6', '2019-06-09 13:22:03', '2019-06-09 13:22:03'),
(8, 'MIAGE 7', '2019-06-09 13:22:03', '2019-06-09 13:22:03'),
(9, 'MIAGE 8', '2019-06-09 13:22:03', '2019-06-09 13:22:03'),
(10, 'MIAGE 9', '2019-06-09 13:22:03', '2019-06-09 13:22:03');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_matiere` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `nom_matiere`, `created_at`, `updated_at`) VALUES
(3, 'java2', '2019-06-09 13:54:21', '2019-06-09 13:54:21');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2014_10_12_100000_create_password_resets_table', 1),
(146, '2019_03_25_193505_create_formations_table', 2),
(147, '2019_03_25_194051_create_users_table', 2),
(148, '2019_03_25_194456_create_devoirs_table', 2),
(149, '2019_03_25_194518_create_rendus_table', 2),
(150, '2019_05_03_200625_add_visible_corrige_type', 2),
(151, '2019_05_04_163636_create_modification_notes_table', 2),
(152, '2019_05_04_175245_add_status_field_table', 2),
(153, '2019_05_07_133836_matieres', 2);

-- --------------------------------------------------------

--
-- Structure de la table `modification_notes`
--

CREATE TABLE `modification_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `justif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_commentaire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rendu_id` bigint(20) UNSIGNED NOT NULL,
  `etudiant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','ok','rejected') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modification_notes`
--

INSERT INTO `modification_notes` (`id`, `note`, `commentaire`, `justif`, `old_commentaire`, `old_note`, `user_id`, `rendu_id`, `etudiant_id`, `created_at`, `updated_at`, `status`) VALUES
(1, '10', 'jhjh', 'jhjhj', 'dfkkdfhk', '12', 6, 2, 7, '2019-06-14 18:24:26', '2019-06-14 18:31:52', 'rejected');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rendus`
--

CREATE TABLE `rendus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `devoir_id` bigint(20) UNSIGNED NOT NULL,
  `rendu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_depot` date NOT NULL,
  `note` double(8,2) DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rendus`
--

INSERT INTO `rendus` (`id`, `user_id`, `devoir_id`, `rendu`, `date_depot`, `note`, `commentaire`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'storage/images/dp6gAV4PKinNEZXUg8yaO9XDzRDQVGwZkDwopZLd.docx', '2019-06-09', NULL, NULL, '2019-06-09 16:19:15', '2019-06-09 16:19:15'),
(2, 7, 6, 'storage/images/o0uAPptB9bF4KK52Lh9gowPlHOu3BpfzqMy6qhpi.pdf', '2019-06-14', 12.00, 'dfkkdfhk', '2019-06-14 18:07:05', '2019-06-14 18:23:48');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_mel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Etudiant','Professeur','Admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('locked','unlocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unlocked',
  `first_connexion` enum('1','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `adresse_mel`, `role`, `titre`, `status`, `first_connexion`, `password`, `formation_id`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'ADMIN', 'admin@admin.com', 'Admin', 'Titre', 'unlocked', '', '$2y$10$lf4gwmqoxT69sOVEKUyIpeBZEP9aUapCugbdUFhziPYa1cVEu1C4q', NULL, '2019-06-09 13:22:03', '2019-06-10 15:28:17'),
(2, 'Diallo 1', 'Hambaliou 1', 'a11@g.com', 'Professeur', 'Titre1', 'unlocked', '1', 'w7qFtZ7qIz3PlqX', 1, '2019-06-09 13:22:03', '2019-06-14 17:56:31'),
(3, 'Diallo 2', 'Hambaliou 2', 'a2@g.com', 'Etudiant', 'Titre2', 'unlocked', '1', 'AnWThcaZ8j4aMn6', 2, '2019-06-09 13:22:03', '2019-06-12 20:07:16'),
(4, 'Diallo 3', 'Hambaliou 3', 'a3@g.com', 'Professeur', 'Titre3', 'unlocked', '1', '$2y$10$dbf21YIBwHed4DhI/A8lceX2f2iaSF6nDQ0j1UxC7WguiDqeBACwu', 3, '2019-06-09 13:22:04', '2019-06-09 13:22:04'),
(5, 'Diallo 4', 'Hambaliou 4', 'a4@g.com', 'Etudiant', 'Titre4', 'unlocked', '1', '$2y$10$54.521wxnCtTHTmJ65UBHuRP0GL.i0714q1loM.IDKGjvvo2c/rda', 4, '2019-06-09 13:22:04', '2019-06-09 13:22:04'),
(6, 'Diallo 5', 'Hambaliou 5', 'a5@g.com', 'Professeur', 'Titre5', 'unlocked', '', '$2y$10$Qnw/xi3moOvOmTdxFmBWD.ZD5vCwT4QI2FHFPMyixqKIQ2Fu6psC6', 5, '2019-06-09 13:22:04', '2019-06-14 18:20:14'),
(7, 'Diallo 6', 'Hambaliou 6', 'a6@g.com', 'Etudiant', 'Titre6', 'unlocked', '', '$2y$10$NnnR0CqG0VbfLahcUEOgf.Tsiau9G6pxhDDGM9Hw31hUPFTwPHV0.', 6, '2019-06-09 13:22:04', '2019-06-14 18:06:02'),
(8, 'Diallo 7', 'Hambaliou 7', 'a7@g.com', 'Professeur', 'Titre7', 'unlocked', '1', '$2y$10$g3ZisfDv118CgqTkfRNMHe8bZFOYfr0CtvjD95rDJ7OuBcwjB2Fh2', 7, '2019-06-09 13:22:04', '2019-06-09 13:22:04'),
(9, 'Diallo 8', 'Hambaliou 8', 'a8@g.com', 'Etudiant', 'Titre8', 'unlocked', '1', '$2y$10$7KkHaQmR3v1RX.X4KBTwc.19njCxOSNSlcVRKQAL97jLEJh15294m', 8, '2019-06-09 13:22:04', '2019-06-09 13:22:04'),
(10, 'Diallo 9', 'Hambaliou 9', 'a9@g.com', 'Professeur', 'Titre9', 'unlocked', '1', '$2y$10$YkhO0E7ThE8WYumYI6224eib..Jb3eoP2EM/Ve118VOTRIo20Ovcu', 9, '2019-06-09 13:22:04', '2019-06-09 13:22:04'),
(22, 'dfkjdf', 'sdskdsjd', 'abdsow94@gmail.com', 'Professeur', NULL, 'unlocked', '1', '$2y$10$CmRuXGSYULq5EcBR9qNSZ.T7Zo2jP4OY5HhTubt1Zl8Kxa56Is8te', NULL, '2019-06-10 23:07:40', '2019-06-10 23:07:40'),
(23, 'Sow', 'Abdoulaye', 'abdsow4@gmail.com', 'Professeur', 'dfdf', 'unlocked', '1', '$2y$10$IGSurwvhCjccZmzZGNkA9usHqEWv7SXjMfYS6LkUjYG6wlVV8vB96', NULL, '2019-06-14 20:32:18', '2019-06-14 20:32:18'),
(24, 'Bah', 'Madiou', 'mmadioubah@gmail.com', 'Etudiant', NULL, 'unlocked', '1', '$2y$10$B2W4P8cHDEOSIohfb4Eh7.ilnTqHdvsFGJoD5Xl/AipjJp4Dmt8gW', 1, '2019-06-14 20:39:07', '2019-06-14 20:39:07'),
(25, 'sds', 'sds', 'dsdsd@dsd.com', 'Professeur', 'sds', 'unlocked', '1', '$2y$10$rjN0iDrQNs2bG8My8WZIVeTHR9zaZJT2rQt56RqaQxh5kFP1GScam', NULL, '2019-06-14 20:42:14', '2019-06-14 20:42:14'),
(26, 'xcz', 'XCX', 'CXCX@XCX', 'Professeur', 'XCXXC', 'unlocked', '1', '$2y$10$d8PdtujFkdwyKZql32VIO.TCsEDrSDi1p56SjOwNizOtwPUe5ggem', NULL, '2019-06-14 20:43:26', '2019-06-14 20:43:26'),
(27, 'SD', 'SD', 'SDSDS@SDS.com', 'Etudiant', NULL, 'unlocked', '1', '$2y$10$nxBjH0zFelHReyFih8SHTOsJ9NP9/3Vs2XAhsB/P3h/HFHRWMjqIO', 4, '2019-06-14 20:44:36', '2019-06-14 20:44:36'),
(28, 'Bah', 'djshjkdg', 'a@a.com', 'Etudiant', NULL, 'unlocked', '1', '$2y$10$WzNaFemlHSK1ImSNqsofvec8ap9GzjJCsWqjB0vCcSifGtGqX6kce', 2, '2019-06-14 20:46:42', '2019-06-14 20:46:42'),
(29, 'skdjghsk', 'skjhdkgsk', 's@s.com', 'Etudiant', NULL, 'unlocked', '1', '$2y$10$E/ws2N/3GjnbXb3wC0sDG.Nvyi1Vau5/cBSAcYXyf6paWZsO/NeNa', 2, '2019-06-14 20:47:49', '2019-06-14 20:47:49'),
(30, 'Sow', 'Abdoulaye', 'abdsow@gmail.com', 'Etudiant', NULL, 'unlocked', '1', '$2y$10$gnA0k1Ka5X7wLinPk1g5cut1xSvlGMitb2BUTWCxV.eeAb42TLQsm', 1, '2019-06-14 20:49:11', '2019-06-14 20:49:11'),
(31, 'dfkj', 'kdfkn', 'ksdfsd@ljds.com', 'Etudiant', NULL, 'unlocked', '1', '$2y$10$FmybwmiqvDixwavuqiVajexfbfpj0nOwui7COeV9dVxbn4UucW1K2', NULL, '2019-06-14 20:50:43', '2019-06-14 20:50:43');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `devoirs`
--
ALTER TABLE `devoirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devoirs_formation_id_foreign` (`formation_id`),
  ADD KEY `devoirs_user_id_foreign` (`user_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matieres_nom_matiere_unique` (`nom_matiere`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modification_notes`
--
ALTER TABLE `modification_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modification_notes_user_id_foreign` (`user_id`),
  ADD KEY `modification_notes_rendu_id_foreign` (`rendu_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `rendus`
--
ALTER TABLE `rendus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rendus_user_id_foreign` (`user_id`),
  ADD KEY `rendus_devoir_id_foreign` (`devoir_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_adresse_mel_unique` (`adresse_mel`),
  ADD KEY `users_formation_id_foreign` (`formation_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `devoirs`
--
ALTER TABLE `devoirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT pour la table `modification_notes`
--
ALTER TABLE `modification_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `rendus`
--
ALTER TABLE `rendus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `devoirs`
--
ALTER TABLE `devoirs`
  ADD CONSTRAINT `devoirs_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`),
  ADD CONSTRAINT `devoirs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `modification_notes`
--
ALTER TABLE `modification_notes`
  ADD CONSTRAINT `modification_notes_rendu_id_foreign` FOREIGN KEY (`rendu_id`) REFERENCES `rendus` (`id`),
  ADD CONSTRAINT `modification_notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `rendus`
--
ALTER TABLE `rendus`
  ADD CONSTRAINT `rendus_devoir_id_foreign` FOREIGN KEY (`devoir_id`) REFERENCES `devoirs` (`id`),
  ADD CONSTRAINT `rendus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
