-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 déc. 2023 à 17:57
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `insti_794`
--

-- --------------------------------------------------------

--
-- Structure de la table `distinctions`
--

DROP TABLE IF EXISTS `distinctions`;
CREATE TABLE IF NOT EXISTS `distinctions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `annee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_distinction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE IF NOT EXISTS `grades` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_12_11_013610_create_user_roles_table', 1),
(5, '2023_12_11_013908_create_roles_table', 1),
(6, '2023_12_11_014600_create_reseau_users_table', 1),
(7, '2023_12_11_014728_create_reseaus_table', 1),
(8, '2023_12_11_014846_create_user_labos_table', 1),
(10, '2023_12_11_015152_create_theme_de_recherches_table', 2),
(11, '2023_12_11_015321_create_grades_table', 2),
(12, '2023_12_11_015403_create_user_grades_table', 2),
(13, '2023_12_11_015458_create_distinctions_table', 2),
(14, '2023_12_11_015612_create_ues_table', 2),
(15, '2023_12_11_015731_create_user_ues_table', 2),
(16, '2023_12_11_015839_create_projets_recherches_table', 2),
(17, '2023_12_11_020111_create_publications_table', 2),
(19, '2023_12_11_142112_create_table_globals_table', 3),
(24, '2014_10_12_000000_create_users_table', 4),
(25, '2023_12_11_015008_create_profils_table', 4),
(26, '2023_12_11_165855_user_data_type', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

DROP TABLE IF EXISTS `profils`;
CREATE TABLE IF NOT EXISTS `profils` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `titre` varchar(191) NOT NULL,
  `nom` varchar(191) NOT NULL,
  `prenom` varchar(191) NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `specialite` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `projets_recherches`
--

DROP TABLE IF EXISTS `projets_recherches`;
CREATE TABLE IF NOT EXISTS `projets_recherches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `designations` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `implication` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau_avancement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectifs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `noms` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` int NOT NULL,
  `titre_revue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_de_parution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `reseaus`
--

DROP TABLE IF EXISTS `reseaus`;
CREATE TABLE IF NOT EXISTS `reseaus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `reseau_users`
--

DROP TABLE IF EXISTS `reseau_users`;
CREATE TABLE IF NOT EXISTS `reseau_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reseau_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liens` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `table_globals`
--

DROP TABLE IF EXISTS `table_globals`;
CREATE TABLE IF NOT EXISTS `table_globals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_cat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `table_globals`
--

INSERT INTO `table_globals` (`id`, `data_type`, `data_cat`, `cat_name`, `cat_desc`, `created_at`, `updated_at`) VALUES
(1, 'labo', 'recherche', 'Labo_de_recherche', NULL, NULL, NULL),
(2, 'labo', 'Pédagogique', 'Labo pédagogique', NULL, NULL, NULL),
(3, 'offre', 'licence', 'offre_de_licence', 'Une offre de formation aboutissant à l’obtention d’un diplôme de licence', NULL, NULL),
(4, 'offre', 'master', 'offre_de_master', 'Une offre de formation aboutissant à l’obtention d’un diplôme de master', NULL, NULL),
(5, 'offre', 'doctorat', 'offre_de_doctorat', 'Une offre de formation aboutissant à l’obtention d’un diplôme de doctorat', NULL, NULL),
(6, 'user', 'enseignant', 'User_enseignant', 'Représente un enseignant utilisateur de la plateforme', NULL, NULL),
(7, 'user', 'etudiant', 'User_etudiant', 'Représente un étudiant utilisateur de la plateforme', NULL, NULL),
(8, 'user', 'Directeur', 'User_directeur', 'Représente un directeur utilisateur de la plateforme', NULL, NULL),
(9, 'User', 'Editeur', 'User_editeur', 'Représente un enseignant editeur de la plateforme', NULL, NULL),
(10, 'User', 'Chef service', 'User_chef_service', 'Représente un chef service utilisateur de la plateforme', NULL, NULL),
(11, 'User', 'partenaire', 'User_partenaire', 'Représente un partenaire utilisateur de la plateforme', NULL, NULL),
(12, 'user', 'admin', 'User_admin', 'Représente un administrateur utilisateur de la plateforme', NULL, NULL),
(13, 'evenement', 'examen', 'Evénement examen', 'Devoir, reprise, rattrapages', NULL, NULL),
(14, 'evenement', 'Activite_pedagogique', 'Evenement pédagogique', 'Conseil pédagogique, CODI,…', NULL, NULL),
(15, 'evenement', 'Processus_academique', 'Evenement processus académique', 'Réclamations des apprenants, Soutenances, semaines de l’entrepreneuriat', NULL, NULL),
(16, 'evenement', 'Periode_repos', 'Période de repos', 'Congés, jours fériés', NULL, NULL),
(17, 'news', 'Academique', 'News académique', 'Représente une actualité à propos d’une activité académique', NULL, NULL),
(18, 'News', 'Extra_academique', 'News extra academique', 'Représente une actualité à propos d’une activité extra académique', NULL, NULL),
(19, 'News', 'Scientifique', 'News scientifique', 'Représente une actualité à propos d’une activité scientifique', NULL, NULL),
(20, 'galerie', 'Academique', 'Galerie academique', 'Photo à propos d’une activité académique', NULL, NULL),
(21, 'galerie', 'Extra_academique', 'Galerie extracademique', 'Photo à propos d’une activité extra académique', NULL, NULL),
(22, 'galerie', 'scientifique', 'Galerie Scientifique', 'Photo à propos d’une activité scientifique', NULL, NULL),
(23, 'Demande', 'attestation', 'Demande de attestation', 'Représente une demande de retrait d’une attestation par les enseignants, étudiants, administration, etc', NULL, NULL),
(24, 'demande', 'conges', 'Demande de congés', 'Représente une demande de congés (congé de maternité, de maladies, etc) par les enseignants, étudiants, administrations,etc', NULL, NULL),
(25, 'demande', 'bulletin', 'Demande de retrait de bulletin', 'Représente une demande de retrait de bulletin par les étudiants', NULL, NULL),
(26, 'demande', 'reclamation', 'Demande de réclamation', 'Représente une demande de réclamation par les étudiants pour un mauvais calcul des moyennes ou pour une mauvaise correction des copies de compositions', NULL, NULL),
(27, 'demande', 'absence', 'Demande d’absence', 'Demande d’absence par les étudiants , enseignants, administrations', NULL, NULL),
(28, 'demande', 'transfert', 'Demande de transfert', 'Demande de transfert d’une filière vers une autre par les étudiants', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `theme_de_recherches`
--

DROP TABLE IF EXISTS `theme_de_recherches`;
CREATE TABLE IF NOT EXISTS `theme_de_recherches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `ues`
--

DROP TABLE IF EXISTS `ues`;
CREATE TABLE IF NOT EXISTS `ues` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_ue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau_etude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kaitlin Richard', 'dysahyfig@mailinator.com', '$2y$12$vsWWV8uHKQJ/EGn79gzZnew5liMDuBPU2gyOzTRiDc4v6zvgpPyIi', NULL, '2023-12-13 16:20:24', '2023-12-13 16:20:24'),
(2, 'Melvin Sanders', 'tanym@mailinator.com', '$2y$12$yuKvA0jl/xp1czAydWMDIuy85MGkWZeEGGmxicSV7OJTzZ07GIwFq', NULL, '2023-12-13 16:23:31', '2023-12-13 16:23:31'),
(3, 'Lillith Macdonald', 'vasuc@mailinator.com', '$2y$12$EsF16kEQpS/HjJ2B/pYd4.iFfPhqKgllg8xBw2YOsvm6mLgoR0uWW', NULL, '2023-12-13 16:24:36', '2023-12-13 16:24:36'),
(4, 'Tashya Jacobson', 'refe@mailinator.com', '$2y$12$JoS6kZ6GB8/4mvAYhYov/uEX3SpWnQ1tVARs3gcjaKsip9Kbnt1QW', NULL, '2023-12-13 16:27:03', '2023-12-13 16:27:03'),
(5, 'Pascale Gilbert', 'roxyv@mailinator.com', '$2y$12$Hj95bJaX6T8u7HrN1NckzuauNv5rg5MhP/yhhbXI6YJqtJzeNs/rm', NULL, '2023-12-13 16:27:46', '2023-12-13 16:27:46'),
(6, 'Quinn Buckley', 'zykonenah@mailinator.com', '$2y$12$RLfqrNgB.Uiv7SXzTE6kFutpb1888zoJRCFvpS6uE4FkNQYDiM09C', NULL, '2023-12-13 16:29:52', '2023-12-13 16:29:52'),
(7, 'Joseph Robinson', 'dubyl@mailinator.com', '$2y$12$n9ZdXL/mHIJVEPCr7G7xz.BJRHM/paQglTrBpDQe57G6995PQDrnC', NULL, '2023-12-13 16:31:43', '2023-12-13 16:31:43'),
(8, 'Basia Cooper', 'dyle@mailinator.com', '$2y$12$tG9U10arAnuEZ5TZCUc1d.x4imLqCuCO4mbppD90gtDffCodDfBEC', NULL, '2023-12-13 16:42:10', '2023-12-13 16:42:10'),
(9, 'Scott Franklin', 'tapituxu@mailinator.com', '$2y$12$mrxL1pxZY3JDWCd4LKOaiOx2kcRUhDJQS/.41Nxif9WsjOe00bLQS', NULL, '2023-12-13 16:42:15', '2023-12-13 16:42:15'),
(10, 'Maite Weeks', 'tenyxopy@mailinator.com', '$2y$12$K3iRVrZSHQcG.7pvmE.EuurQulCEYVvZIJKfCA/sm6Ek92DLvHjGK', NULL, '2023-12-13 16:42:20', '2023-12-13 16:42:20'),
(39, 'haadouuu', 'letraitre@gmail.com', '$2y$12$fgeAdytBpdUzzjuB6Wnl5eJ7Zb5TVRrCFhoOLyR3SkXE4nRR.p38K', NULL, '2023-12-15 16:24:19', '2023-12-15 16:24:19');

-- --------------------------------------------------------

--
-- Structure de la table `user_data_type`
--

DROP TABLE IF EXISTS `user_data_type`;
CREATE TABLE IF NOT EXISTS `user_data_type` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `data_type_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_data_type_user_id_foreign` (`user_id`),
  KEY `user_data_type_data_type_id_foreign` (`data_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `user_data_type`
--

INSERT INTO `user_data_type` (`id`, `user_id`, `data_type_id`, `created_at`, `updated_at`) VALUES
(1, 4, 7, NULL, NULL),
(2, 5, 7, NULL, NULL),
(3, 6, 7, NULL, NULL),
(4, 7, 6, NULL, NULL),
(5, 8, 6, NULL, NULL),
(6, 9, 6, NULL, NULL),
(7, 10, 6, NULL, NULL),
(32, 39, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_grades`
--

DROP TABLE IF EXISTS `user_grades`;
CREATE TABLE IF NOT EXISTS `user_grades` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `grade_id` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `user_labos`
--

DROP TABLE IF EXISTS `user_labos`;
CREATE TABLE IF NOT EXISTS `user_labos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `labo_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `role_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `user_ues`
--

DROP TABLE IF EXISTS `user_ues`;
CREATE TABLE IF NOT EXISTS `user_ues` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ue_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user_data_type`
--
ALTER TABLE `user_data_type`
  ADD CONSTRAINT `user_data_type_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `table_globals` (`id`),
  ADD CONSTRAINT `user_data_type_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
