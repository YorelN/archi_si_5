-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 19 Mai 2017 à 04:13
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `yay`
--

-- --------------------------------------------------------

--
-- Structure de la table `magasine`
--

CREATE TABLE `magasine` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(255) NOT NULL,
  `alt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `magasine`
--

INSERT INTO `magasine` (`id`, `titre`, `img`, `zones`, `prix`, `alt`, `part_id`) VALUES
(14, 'n°280', '', 'Martinique', 19, 'image de la martinique', 14),
(15, 'n°279', '', 'Île de france', 22, 'image de l''île de france', 15),
(16, 'n°278', '', 'Bretagne , Normandie', 42, 'image de la bretagne , normandie', 16),
(17, 'n°277', '', 'Guadeloupe', 17, 'image de la guadeloupe', 17),
(18, 'n°276', '', 'Belgique', 20, 'image de la belgique', 18),
(19, 'n°275', '', 'Suisse', 33, 'image de la suisse', 19);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `magasine`
--
ALTER TABLE `magasine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `magasine`
--
ALTER TABLE `magasine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;