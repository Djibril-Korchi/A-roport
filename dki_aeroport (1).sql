-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 11 mars 2024 à 08:59
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dki_aeroport`
--

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

DROP TABLE IF EXISTS `avion`;
CREATE TABLE IF NOT EXISTS `avion` (
  `id_avion` int NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `compagnie` varchar(50) NOT NULL,
  `nb_place` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lier`
--

DROP TABLE IF EXISTS `lier`;
CREATE TABLE IF NOT EXISTS `lier` (
  `ref_user` int NOT NULL,
  `ref_vol` int NOT NULL,
  KEY `fk_lier_user` (`ref_user`),
  KEY `fk_lier_vol` (`ref_vol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `repos`
--

DROP TABLE IF EXISTS `repos`;
CREATE TABLE IF NOT EXISTS `repos` (
  `id_repos` int NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nb_repos` int NOT NULL,
  `ref_user` int NOT NULL,
  KEY `fk_repos_user` (`ref_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reseration` int NOT NULL,
  `heure_arriver` datetime NOT NULL,
  `heure_depart` datetime NOT NULL,
  `destination` text NOT NULL,
  `ville_depart` varchar(50) NOT NULL,
  `nb_place` int NOT NULL,
  `date` date NOT NULL,
  `classe` varchar(50) NOT NULL,
  `ref_user` int NOT NULL,
  `ref_vol` int NOT NULL,
  KEY `fk_reservation_vol` (`ref_vol`),
  KEY `fk_reservation_user` (`ref_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `daten` date NOT NULL,
  `rue` text NOT NULL,
  `ville` varchar(50) NOT NULL,
  `cp` varchar(6) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

DROP TABLE IF EXISTS `vol`;
CREATE TABLE IF NOT EXISTS `vol` (
  `id_vol` int NOT NULL,
  `destination` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `heure_depart` datetime NOT NULL,
  `heure_arriver` datetime NOT NULL,
  `ville_depart` varchar(50) NOT NULL,
  `classe` varchar(50) NOT NULL,
  `prix` int NOT NULL,
  `pilleur` int NOT NULL,
  `ref_avion` int NOT NULL,
  KEY `fk_vol_avion` (`ref_avion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
