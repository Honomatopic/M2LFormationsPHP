-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 juin 2020 à 17:27
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `m2lformations`
--

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) DEFAULT NULL,
  `prenom` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `motpasse` varchar(250) DEFAULT NULL,
  `statut` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `email`, `motpasse`, `statut`) VALUES
(1, 'Rasamoelina', 'Honoré', 'honore.rasamoelina@gmail.com', '$2y$10$9XuyDFh/a..oVB/ehtM2c.aXm44iHWNRJ5M.ZCLs0pdIqakTpZkP6', 1),
(2, 'Poupard', 'Diane', 'diane.poupard@gmail.com', '$2y$10$Y72434LxyggJ6B23SGBKIeDzzI4viyubto3YQnwrNqKnuMbsWvsFC', 0),
(3, 'De Giovanni Debord', 'Ségolène', 'segolene.degiovanni@gmail.com', '$2y$10$sldYChoUEyKe5R4qfTJFtemp8Nxd/yCb4mL1OcRO6Z4a27Bohcr7a', 0);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(250) DEFAULT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  `lieu` varchar(250) DEFAULT NULL,
  `prestataire` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `intitule`, `datedebut`, `datefin`, `lieu`, `prestataire`) VALUES
(1, 'Formation de football', '2015-01-05', '2015-02-02', 'Saint-Germain-En-Laye', 'GRETA'),
(2, 'Formation de rugby', '2015-02-03', '2015-04-04', 'Clamart', 'Privé'),
(3, 'Formation au badminton', '2015-04-08', '2015-05-08', 'Gentilly', 'CNAM');

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

DROP TABLE IF EXISTS `inscrire`;
CREATE TABLE IF NOT EXISTS `inscrire` (
  `Employe_id` int(11) NOT NULL,
  `Formation_id` int(11) NOT NULL,
  PRIMARY KEY (`Employe_id`,`Formation_id`),
  KEY `fk_Employe_has_Formation_Formation1_idx` (`Formation_id`),
  KEY `fk_Employe_has_Formation_Employe_idx` (`Employe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscrire`
--

INSERT INTO `inscrire` (`Employe_id`, `Formation_id`) VALUES
(1, 1),
(1, 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscrire`
--
ALTER TABLE `inscrire`
  ADD CONSTRAINT `fk_Employe_has_Formation_Employe` FOREIGN KEY (`Employe_id`) REFERENCES `employe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Employe_has_Formation_Formation1` FOREIGN KEY (`Formation_id`) REFERENCES `formation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
