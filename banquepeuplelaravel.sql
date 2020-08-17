-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 17 août 2020 à 03:48
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `banquepeuplelaravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `clientmorals`
--

CREATE TABLE `clientmorals` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_client` int(10) UNSIGNED NOT NULL,
  `nom_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifiant_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raison_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clientnonsalaries`
--

CREATE TABLE `clientnonsalaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_client` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carte_identite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_inscription` datetime NOT NULL,
  `type_client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clientsalaries`
--

CREATE TABLE `clientsalaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_client` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carte_identite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_employeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raison_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifiant_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comptebloques`
--

CREATE TABLE `comptebloques` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_compte` int(10) UNSIGNED NOT NULL,
  `frais_ouverture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant_remuneration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree_blocage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comptecourants`
--

CREATE TABLE `comptecourants` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_compte` int(10) UNSIGNED NOT NULL,
  `agios` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compteepargnes`
--

CREATE TABLE `compteepargnes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_compte` int(10) UNSIGNED NOT NULL,
  `frais_ouverture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant_remuneration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_client` int(10) UNSIGNED NOT NULL,
  `numero_compte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cle_rib` int(11) NOT NULL,
  `solde` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ouverture` datetime NOT NULL,
  `numero_agence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etatcomptes`
--

CREATE TABLE `etatcomptes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_compte` int(10) UNSIGNED NOT NULL,
  `etat_compte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_changement_etat` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_08_16_203240_create_clients_table', 1),
(4, '2020_08_16_203517_create_clientnonsalaries_table', 1),
(5, '2020_08_16_203557_create_clientsalaries_table', 1),
(6, '2020_08_16_203611_create_clientmorals_table', 1),
(7, '2020_08_16_203654_create_comptes_table', 1),
(8, '2020_08_16_203710_create_comptebloques_table', 1),
(9, '2020_08_16_203725_create_compteepargnes_table', 1),
(10, '2020_08_16_203737_create_comptecourants_table', 1),
(11, '2020_08_16_203934_create_etatcomptes_table', 1);

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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mor DIOP', 'mortaiba@gmail.com', NULL, '$2y$10$o2KhwQyibnHk8iMCoDQQyu4rCNway58/b.LZwsGeT.ZTVCbC5thgu', 'VX2LduRquLzJCuFSufu5Arsr5QMyc7pTHGmTPDdPPayTktufy2Ah5FcgUxvx', '2020-08-17 01:22:48', '2020-08-17 01:22:48');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clientmorals`
--
ALTER TABLE `clientmorals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientmorals_id_client_foreign` (`id_client`);

--
-- Index pour la table `clientnonsalaries`
--
ALTER TABLE `clientnonsalaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientnonsalaries_id_client_foreign` (`id_client`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- Index pour la table `clientsalaries`
--
ALTER TABLE `clientsalaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientsalaries_id_client_foreign` (`id_client`);

--
-- Index pour la table `comptebloques`
--
ALTER TABLE `comptebloques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comptebloques_id_compte_foreign` (`id_compte`);

--
-- Index pour la table `comptecourants`
--
ALTER TABLE `comptecourants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comptecourants_id_compte_foreign` (`id_compte`);

--
-- Index pour la table `compteepargnes`
--
ALTER TABLE `compteepargnes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compteepargnes_id_compte_foreign` (`id_compte`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comptes_id_client_foreign` (`id_client`);

--
-- Index pour la table `etatcomptes`
--
ALTER TABLE `etatcomptes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etatcomptes_id_compte_foreign` (`id_compte`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clientmorals`
--
ALTER TABLE `clientmorals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clientnonsalaries`
--
ALTER TABLE `clientnonsalaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clientsalaries`
--
ALTER TABLE `clientsalaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comptebloques`
--
ALTER TABLE `comptebloques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comptecourants`
--
ALTER TABLE `comptecourants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compteepargnes`
--
ALTER TABLE `compteepargnes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etatcomptes`
--
ALTER TABLE `etatcomptes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clientmorals`
--
ALTER TABLE `clientmorals`
  ADD CONSTRAINT `clientmorals_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `clientnonsalaries`
--
ALTER TABLE `clientnonsalaries`
  ADD CONSTRAINT `clientnonsalaries_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `clientsalaries`
--
ALTER TABLE `clientsalaries`
  ADD CONSTRAINT `clientsalaries_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `comptebloques`
--
ALTER TABLE `comptebloques`
  ADD CONSTRAINT `comptebloques_id_compte_foreign` FOREIGN KEY (`id_compte`) REFERENCES `comptes` (`id`);

--
-- Contraintes pour la table `comptecourants`
--
ALTER TABLE `comptecourants`
  ADD CONSTRAINT `comptecourants_id_compte_foreign` FOREIGN KEY (`id_compte`) REFERENCES `comptes` (`id`);

--
-- Contraintes pour la table `compteepargnes`
--
ALTER TABLE `compteepargnes`
  ADD CONSTRAINT `compteepargnes_id_compte_foreign` FOREIGN KEY (`id_compte`) REFERENCES `comptes` (`id`);

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `comptes_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `etatcomptes`
--
ALTER TABLE `etatcomptes`
  ADD CONSTRAINT `etatcomptes_id_compte_foreign` FOREIGN KEY (`id_compte`) REFERENCES `comptes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
