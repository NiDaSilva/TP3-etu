-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 05 Octobre 2015 à 10:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `dasilvatp3`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
  `IDcomp` int(1) NOT NULL,
  `NomComp` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`IDcomp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `IdFormation` int(11) NOT NULL AUTO_INCREMENT,
  `Intitule` text COLLATE utf8_bin NOT NULL,
  `NbAnnee` int(11) NOT NULL,
  PRIMARY KEY (`IdFormation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`IdFormation`, `Intitule`, `NbAnnee`) VALUES
(1, 'Baccalauréat', 0),
(2, 'BTS', 2),
(3, 'DUT', 2),
(4, 'Licence', 3),
(5, 'MASTER', 5),
(6, 'Autre formation', 0);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE IF NOT EXISTS `specialite` (
  `IDspecialite` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` text COLLATE utf8_bin NOT NULL,
  `IDFormation` int(11) NOT NULL,
  PRIMARY KEY (`IDspecialite`),
  KEY `IDFormation` (`IDFormation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`IDspecialite`, `Libelle`, `IDFormation`) VALUES
(1, 'Bac S', 1),
(2, 'Bac STMG SIG', 1),
(3, 'Bac Pro SEN SIN', 1),
(4, 'Bac STI 2D', 1),
(5, 'BTS SIO SLAM', 2),
(6, 'BTS SIO SISR', 2),
(7, 'BTS IRIS', 2),
(8, 'DUT Informatique', 3),
(9, 'DUT GEA', 3),
(10, 'DUT Statistiques', 3),
(11, 'BTS CGO', 2),
(12, 'Licence Informatique', 4),
(13, 'Licence Pro SLAM', 4),
(14, 'Licence Pro SISR', 4),
(15, 'MASTER MIAGE', 5),
(16, 'MASTER Informatique décisionnelle', 5),
(17, 'MASTER Reseau et Telecoms', 5),
(18, 'pas de specialite', 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IDutili` int(11) NOT NULL,
  `NomUtili` varchar(20) COLLATE utf8_bin NOT NULL,
  `PrenomUtili` varchar(20) COLLATE utf8_bin NOT NULL,
  `DepUtili` int(3) NOT NULL,
  `PaysUtili` varchar(11) COLLATE utf8_bin NOT NULL,
  `dateNaiss` date NOT NULL,
  `telUtili` int(10) NOT NULL,
  `IDcomp` int(1) NOT NULL,
  KEY `IDcomp` (`IDcomp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD CONSTRAINT `specialite_ibfk_1` FOREIGN KEY (`IDFormation`) REFERENCES `formation` (`IdFormation`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
