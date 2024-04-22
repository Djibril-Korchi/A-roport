-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2024 at 09:20 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dki_aeroport`
--

-- --------------------------------------------------------

--
-- Table structure for table `aeroport`
--

DROP TABLE IF EXISTS `aeroport`;
CREATE TABLE IF NOT EXISTS `aeroport` (
  `id_aeroport` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id_aeroport`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aeroport`
--

INSERT INTO `aeroport` (`id_aeroport`, `libelle`) VALUES
(1, 'Charles de Gaulle Airport'),
(2, 'Aéroport International de Paris-Charles-de-Gaulle');

-- --------------------------------------------------------

--
-- Table structure for table `avion`
--

DROP TABLE IF EXISTS `avion`;
CREATE TABLE IF NOT EXISTS `avion` (
  `id_avion` int NOT NULL AUTO_INCREMENT,
  `matricule` varchar(50) NOT NULL,
  `nb_place` int NOT NULL,
  `ref_compagnie` int NOT NULL,
  PRIMARY KEY (`id_avion`),
  KEY `fk_avion_compagnie` (`ref_compagnie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `avion`
--

INSERT INTO `avion` (`id_avion`, `matricule`, `nb_place`, `ref_compagnie`) VALUES
(1, 'ABCD123', 125, 2);

-- --------------------------------------------------------

--
-- Table structure for table `compagnie`
--

DROP TABLE IF EXISTS `compagnie`;
CREATE TABLE IF NOT EXISTS `compagnie` (
  `id_compagnie` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `ref_user` int NOT NULL,
  PRIMARY KEY (`id_compagnie`),
  KEY `fk_compagnie_user` (`ref_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `compagnie`
--

INSERT INTO `compagnie` (`id_compagnie`, `libelle`, `ref_user`) VALUES
(2, 'Air France', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lier`
--

DROP TABLE IF EXISTS `lier`;
CREATE TABLE IF NOT EXISTS `lier` (
  `ref_compagnie` int NOT NULL,
  `ref_aeroport` int NOT NULL,
  KEY `fk_lier_compagnie` (`ref_compagnie`),
  KEY `fk_lier_aeroport` (`ref_aeroport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lier`
--

INSERT INTO `lier` (`ref_compagnie`, `ref_aeroport`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pillot`
--

DROP TABLE IF EXISTS `pillot`;
CREATE TABLE IF NOT EXISTS `pillot` (
  `id_pillot` int NOT NULL AUTO_INCREMENT,
  `nb_repos` int NOT NULL,
  `ref_compagnie` int NOT NULL,
  `ref_user` int NOT NULL,
  PRIMARY KEY (`id_pillot`),
  KEY `fk_pillot_compagnie` (`ref_compagnie`),
  KEY `fk_pillot_user` (`ref_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pillot`
--

INSERT INTO `pillot` (`id_pillot`, `nb_repos`, `ref_compagnie`, `ref_user`) VALUES
(1, 20, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `repos`
--

DROP TABLE IF EXISTS `repos`;
CREATE TABLE IF NOT EXISTS `repos` (
  `id_repos` int NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nb_jours` int NOT NULL,
  `ref_pillot` int NOT NULL,
  PRIMARY KEY (`id_repos`),
  KEY `fk_repos_pillot` (`ref_pillot`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `repos`
--

INSERT INTO `repos` (`id_repos`, `date_debut`, `date_fin`, `nb_jours`, `ref_pillot`) VALUES
(1, '2024-05-01', '2024-05-30', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reseration` int NOT NULL AUTO_INCREMENT,
  `nb_place` int NOT NULL,
  `Date_annulation` datetime NOT NULL,
  `ref_user` int NOT NULL,
  `ref_vol` int NOT NULL,
  PRIMARY KEY (`id_reseration`),
  KEY `fk_reservation_user` (`ref_user`),
  KEY `fk_reservation_vol` (`ref_vol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_reseration`, `nb_place`, `Date_annulation`, `ref_user`, `ref_vol`) VALUES
(2, 145, '2024-04-21 15:55:17', 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `daten` date NOT NULL,
  `rue` text NOT NULL,
  `ville` varchar(50) NOT NULL,
  `cp` varchar(6) NOT NULL,
  `mdp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `mdp_provisoire` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `email`, `daten`, `rue`, `ville`, `cp`, `mdp`, `status`, `mdp_provisoire`) VALUES
(1, 'Doe', 'John', 'john.doe@example.com', '1990-01-01', '123 Main Street', 'Paris', '75001', 'motdepasse', 'client', 'MotDePasseNonValable'),
(6, 'Djibril', 'Korchi', 'd.korchi@lprs.fr', '2005-12-03', '21 rue sa va', 'Garge-Lès-Gonnesse', '95140', 'azerty', 'Client', 'MotDePasseNonValable'),
(18, 'test2', 'test2', 'test2@test2.fr', '2024-04-10', 'test2', 'test2', 'test2', 'azerty', 'Client', 'MotDePasseNonValable'),
(19, 'vol', 'vol', 'vol@vol.fr', '0000-00-00', '', '', '', 'vol', 'Vol', 'MotDePasseNonValable'),
(20, 'Admin', 'Admin', 'Admin@Admin.fr', '0000-00-00', '', '', '', 'Admin', 'Admin', 'MotDePasseNonValable');

-- --------------------------------------------------------

--
-- Table structure for table `vol`
--

DROP TABLE IF EXISTS `vol`;
CREATE TABLE IF NOT EXISTS `vol` (
  `id_vol` int NOT NULL AUTO_INCREMENT,
  `destination` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ville_arriver` varchar(50) NOT NULL,
  `heure_depart` datetime NOT NULL,
  `heure_arriver` datetime NOT NULL,
  `ville_depart` varchar(50) NOT NULL,
  `prix` int NOT NULL,
  `place_restant` int NOT NULL,
  `ref_avion` int NOT NULL,
  `ref_pillot` int NOT NULL,
  PRIMARY KEY (`id_vol`),
  KEY `fk_vol_avion` (`ref_avion`),
  KEY `fk_vol_pillot` (`ref_pillot`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vol`
--

INSERT INTO `vol` (`id_vol`, `destination`, `ville_arriver`, `heure_depart`, `heure_arriver`, `ville_depart`, `prix`, `place_restant`, `ref_avion`, `ref_pillot`) VALUES
(9, 'Aéroport CDG', 'Lyon', '2024-04-01 17:19:54', '2024-04-13 17:19:54', 'Paris', 150, 200, 1, 1),
(13, 'Aéroport JFK', 'New York', '2024-05-01 08:00:00', '2024-05-01 12:00:00', 'Paris', 500, 150, 1, 1),
(14, 'Aéroport NRT', 'Tokyo', '2024-05-02 10:00:00', '2024-05-02 18:00:00', 'London', 800, 200, 1, 1),
(15, 'Aéroport SYD', 'Sydney', '2024-05-03 12:00:00', '2024-05-04 06:00:00', 'New Delhi', 1000, 180, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avion`
--
ALTER TABLE `avion`
  ADD CONSTRAINT `fk_avion_compagnie` FOREIGN KEY (`ref_compagnie`) REFERENCES `compagnie` (`id_compagnie`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `compagnie`
--
ALTER TABLE `compagnie`
  ADD CONSTRAINT `fk_compagnie_user` FOREIGN KEY (`ref_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `lier`
--
ALTER TABLE `lier`
  ADD CONSTRAINT `fk_lier_aeroport` FOREIGN KEY (`ref_aeroport`) REFERENCES `aeroport` (`id_aeroport`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_lier_compagnie` FOREIGN KEY (`ref_compagnie`) REFERENCES `compagnie` (`id_compagnie`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pillot`
--
ALTER TABLE `pillot`
  ADD CONSTRAINT `fk_pillot_compagnie` FOREIGN KEY (`ref_compagnie`) REFERENCES `compagnie` (`id_compagnie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_pillot_user` FOREIGN KEY (`ref_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `repos`
--
ALTER TABLE `repos`
  ADD CONSTRAINT `fk_repos_pillot` FOREIGN KEY (`ref_pillot`) REFERENCES `pillot` (`id_pillot`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_user` FOREIGN KEY (`ref_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_reservation_vol` FOREIGN KEY (`ref_vol`) REFERENCES `vol` (`id_vol`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `fk_vol_avion` FOREIGN KEY (`ref_avion`) REFERENCES `avion` (`id_avion`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_vol_pillot` FOREIGN KEY (`ref_pillot`) REFERENCES `pillot` (`id_pillot`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
