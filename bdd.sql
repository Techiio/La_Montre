-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 11 jan. 2022 à 20:22
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `CodeStatut` int(11) NOT NULL,
  `Identifiant` varchar(60) NOT NULL,
  `Mdp` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Identifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`CodeStatut`, `Identifiant`, `Mdp`) VALUES
(0, 'jeangerard', 'jean'),
(0, 'jacque', 'jacque'),
(0, 'jean', 'jean'),
(2, 'jesapel', 'groot'),
(1, 'gest', 'gest'),
(2, 'Diego', 'kiloua'),
(2, 'Jason', 'Gap'),
(10000, 'temp', 'temp'),
(0, 'henri', 'henri'),
(0, 'chloe', 'chloe'),
(0, 'greg', 'greg');

-- --------------------------------------------------------

--
-- Structure de la table `conseil`
--

DROP TABLE IF EXISTS `conseil`;
CREATE TABLE IF NOT EXISTS `conseil` (
  `Score` int(11) NOT NULL,
  `CodeProduit` varchar(50) DEFAULT NULL,
  `pirescore` int(11) DEFAULT NULL,
  `Conseil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Score`),
  KEY `CodeProduit` (`CodeProduit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `donneesmontre`
--

DROP TABLE IF EXISTS `donneesmontre`;
CREATE TABLE IF NOT EXISTS `donneesmontre` (
  `Bpm` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `dB` int(11) NOT NULL,
  `No2` int(11) NOT NULL,
  `DegréCelsius` int(11) NOT NULL,
  `CodeProduit` int(11) DEFAULT NULL,
  KEY `CodeProduit` (`CodeProduit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `donneesmontre`
--

INSERT INTO `donneesmontre` (`Bpm`, `Date`, `Heure`, `dB`, `No2`, `DegréCelsius`, `CodeProduit`) VALUES
(60, '2010-12-21', '08:00:00', 20, 30, 20, 2),
(50, '2010-12-21', '06:00:00', 20, 40, 20, 2),
(50, '2010-12-21', '00:00:00', 20, 30, 20, 2),
(50, '2010-12-21', '01:00:00', 20, 20, 20, 2),
(50, '2010-12-21', '04:00:00', 40, 20, 20, 2),
(50, '2010-12-21', '03:00:00', 20, 30, 20, 2),
(50, '2010-12-21', '02:00:00', 20, 40, 20, 2),
(50, '2010-12-21', '05:00:00', 40, 10, 20, 2),
(50, '2010-12-21', '07:00:00', 20, 50, 20, 2),
(60, '2010-12-21', '09:00:00', 50, 20, 18, 2),
(60, '2010-12-21', '10:00:00', 50, 20, 15, 2),
(70, '2010-12-21', '11:00:00', 40, 40, 13, 2),
(60, '2010-12-21', '12:00:00', 80, 15, 10, 2),
(60, '2010-12-21', '13:00:00', 60, 30, 12, 2),
(90, '2010-12-21', '14:00:00', 20, 10, 12, 2),
(90, '2010-12-21', '15:00:00', 40, 40, 15, 2),
(50, '2010-12-21', '16:00:00', 60, 40, 20, 2),
(60, '2010-12-21', '17:00:00', 60, 50, 20, 2),
(70, '2010-12-21', '18:00:00', 60, 30, 25, 2),
(65, '2010-12-21', '19:00:00', 40, 20, 20, 2),
(70, '2010-12-21', '20:00:00', 40, 20, 18, 2),
(60, '2010-12-21', '21:00:00', 20, 20, 15, 2),
(50, '2010-12-21', '22:00:00', 20, 10, 20, 2),
(50, '2010-12-21', '23:00:00', 20, 10, 20, 2),
(50, '2010-12-22', '23:00:00', 20, 10, 20, 2),
(50, '2010-12-22', '22:00:00', 20, 10, 20, 2),
(70, '2010-12-22', '21:00:00', 20, 20, 20, 2),
(70, '2010-12-22', '20:00:00', 40, 20, 20, 2),
(70, '2010-12-22', '19:00:00', 40, 20, 20, 2),
(70, '2010-12-22', '18:00:00', 60, 30, 20, 2),
(60, '2010-12-22', '17:00:00', 60, 30, 20, 2),
(50, '2010-12-22', '16:00:00', 60, 30, 20, 2),
(90, '2010-12-22', '15:00:00', 60, 30, 20, 2),
(90, '2010-12-22', '14:00:00', 60, 10, 20, 2),
(90, '2010-12-22', '13:00:00', 60, 30, 20, 2),
(90, '2010-12-22', '12:00:00', 80, 15, 20, 2),
(70, '2010-12-22', '11:00:00', 90, 30, 20, 2),
(60, '2010-12-22', '10:00:00', 50, 20, 20, 2),
(60, '2010-12-22', '09:00:00', 50, 20, 20, 2),
(60, '2010-12-22', '08:00:00', 20, 30, 20, 2),
(60, '2010-12-22', '07:00:00', 30, 30, 20, 2),
(50, '2010-12-22', '06:00:00', 20, 30, 20, 2),
(50, '2010-12-22', '05:00:00', 40, 10, 20, 2),
(50, '2010-12-22', '04:00:00', 40, 20, 20, 2),
(50, '2010-12-22', '03:00:00', 20, 30, 20, 2),
(50, '2010-12-22', '02:00:00', 20, 30, 20, 2),
(50, '2010-12-22', '01:00:00', 20, 20, 20, 2),
(50, '2010-12-22', '00:00:00', 20, 30, 20, 2),
(60, '2010-12-23', '23:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '22:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '21:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '20:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '19:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '18:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '17:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '16:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '15:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '14:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '13:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '12:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '11:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '10:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '09:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '08:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '07:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '06:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '05:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '04:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '03:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '02:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '01:00:00', 40, 10, 20, 2),
(60, '2010-12-23', '00:00:00', 40, 10, 20, 2),
(50, '2010-12-24', '02:00:00', 20, 20, 20, 2),
(50, '2010-12-24', '02:00:00', 20, 20, 20, 2),
(50, '2010-12-24', '02:00:00', 20, 20, 20, 2),
(50, '2010-12-27', '02:00:00', 20, 20, 20, 2),
(60, '2010-12-24', '09:00:00', 50, 20, 20, 2),
(40, '2010-12-27', '03:00:00', 20, 20, 18, 2),
(60, '2010-12-25', '08:00:00', 20, 30, 20, 2),
(90, '2010-12-25', '14:00:00', 20, 10, 12, 2),
(90, '2010-12-25', '15:00:00', 40, 40, 15, 2),
(50, '2010-12-25', '16:00:00', 60, 40, 20, 2),
(60, '2010-12-25', '17:00:00', 60, 50, 20, 2),
(70, '2010-12-25', '18:00:00', 60, 30, 25, 2),
(65, '2010-12-25', '19:00:00', 40, 20, 20, 2),
(70, '2010-12-25', '20:00:00', 40, 20, 18, 2),
(60, '2010-12-25', '21:00:00', 20, 20, 15, 2),
(50, '2010-12-25', '22:00:00', 20, 10, 20, 2),
(50, '2010-12-25', '23:00:00', 20, 10, 20, 2),
(60, '2010-12-25', '13:00:00', 60, 30, 12, 2),
(60, '2010-12-25', '12:00:00', 80, 15, 10, 2),
(70, '2010-12-25', '11:00:00', 40, 40, 13, 2),
(50, '2010-12-25', '06:00:00', 20, 40, 20, 2),
(50, '2010-12-25', '00:00:00', 20, 30, 20, 2),
(50, '2010-12-25', '01:00:00', 20, 20, 20, 2),
(50, '2010-12-25', '04:00:00', 40, 20, 20, 2),
(50, '2010-12-25', '03:00:00', 20, 30, 20, 2),
(50, '2010-12-25', '02:00:00', 20, 40, 20, 2),
(50, '2010-12-25', '05:00:00', 40, 10, 20, 2),
(50, '2010-12-25', '07:00:00', 20, 50, 20, 2),
(60, '2010-12-25', '09:00:00', 50, 20, 18, 2),
(60, '2010-12-25', '10:00:00', 50, 20, 15, 2),
(60, '2010-12-26', '08:00:00', 20, 30, 20, 2),
(90, '2010-12-26', '14:00:00', 20, 10, 12, 2),
(90, '2010-12-26', '15:00:00', 40, 40, 15, 2),
(50, '2010-12-26', '16:00:00', 60, 40, 20, 2),
(60, '2010-12-26', '17:00:00', 60, 50, 20, 2),
(70, '2010-12-26', '18:00:00', 60, 30, 25, 2),
(65, '2010-12-26', '19:00:00', 40, 20, 20, 2),
(70, '2010-12-26', '20:00:00', 40, 20, 18, 2),
(60, '2010-12-26', '21:00:00', 20, 20, 15, 2),
(50, '2010-12-26', '22:00:00', 20, 10, 20, 2),
(50, '2010-12-26', '23:00:00', 20, 10, 20, 2),
(60, '2010-12-26', '13:00:00', 60, 30, 12, 2),
(60, '2010-12-26', '12:00:00', 80, 15, 10, 2),
(70, '2010-12-26', '11:00:00', 40, 40, 13, 2),
(50, '2010-12-26', '06:00:00', 20, 40, 20, 2),
(50, '2010-12-26', '00:00:00', 20, 30, 20, 2),
(50, '2010-12-26', '01:00:00', 20, 20, 20, 2),
(50, '2010-12-26', '04:00:00', 40, 20, 20, 2),
(50, '2010-12-26', '03:00:00', 20, 30, 20, 2),
(50, '2010-12-26', '02:00:00', 20, 40, 20, 2),
(50, '2010-12-26', '05:00:00', 40, 10, 20, 2),
(50, '2010-12-26', '07:00:00', 20, 50, 20, 2),
(60, '2010-12-26', '09:00:00', 50, 20, 18, 2),
(60, '2010-12-26', '10:00:00', 50, 20, 15, 2),
(60, '2010-12-21', '08:00:00', 20, 30, 20, 67),
(50, '2010-12-21', '06:00:00', 20, 40, 20, 67),
(50, '2010-12-21', '00:00:00', 20, 30, 20, 67),
(50, '2010-12-21', '01:00:00', 20, 20, 20, 67),
(50, '2010-12-21', '04:00:00', 40, 20, 20, 67),
(50, '2010-12-21', '03:00:00', 20, 30, 20, 67),
(50, '2010-12-21', '02:00:00', 20, 40, 20, 67),
(50, '2010-12-21', '05:00:00', 40, 10, 20, 67),
(50, '2010-12-21', '07:00:00', 20, 50, 20, 67),
(60, '2010-12-21', '09:00:00', 50, 20, 18, 67),
(60, '2010-12-21', '10:00:00', 50, 20, 15, 67),
(70, '2010-12-21', '11:00:00', 40, 40, 13, 67),
(60, '2010-12-21', '12:00:00', 80, 15, 10, 67),
(60, '2010-12-21', '13:00:00', 60, 30, 12, 67),
(90, '2010-12-21', '14:00:00', 20, 10, 12, 67),
(90, '2010-12-21', '15:00:00', 40, 40, 15, 67),
(50, '2010-12-21', '16:00:00', 60, 40, 20, 67),
(60, '2010-12-21', '17:00:00', 60, 50, 20, 67),
(70, '2010-12-21', '18:00:00', 60, 30, 25, 67),
(65, '2010-12-21', '19:00:00', 40, 20, 20, 67),
(70, '2010-12-21', '20:00:00', 40, 20, 18, 67),
(60, '2010-12-21', '21:00:00', 20, 20, 15, 67),
(50, '2010-12-21', '22:00:00', 20, 10, 20, 67),
(50, '2010-12-21', '23:00:00', 20, 10, 20, 67),
(50, '2010-12-22', '23:00:00', 20, 10, 20, 67),
(50, '2010-12-22', '22:00:00', 20, 10, 20, 67),
(70, '2010-12-22', '21:00:00', 20, 20, 20, 67),
(70, '2010-12-22', '20:00:00', 40, 20, 20, 67),
(70, '2010-12-22', '19:00:00', 40, 20, 20, 67),
(70, '2010-12-22', '18:00:00', 60, 30, 20, 67),
(60, '2010-12-22', '17:00:00', 60, 30, 20, 67),
(50, '2010-12-22', '16:00:00', 60, 30, 20, 67),
(90, '2010-12-22', '15:00:00', 60, 30, 20, 67),
(90, '2010-12-22', '14:00:00', 60, 10, 20, 67),
(90, '2010-12-22', '13:00:00', 60, 30, 20, 67),
(90, '2010-12-22', '12:00:00', 80, 15, 20, 67),
(70, '2010-12-22', '11:00:00', 90, 30, 20, 67),
(60, '2010-12-22', '10:00:00', 50, 20, 20, 67),
(60, '2010-12-22', '09:00:00', 50, 20, 20, 67),
(60, '2010-12-22', '08:00:00', 20, 30, 20, 67),
(60, '2010-12-22', '07:00:00', 30, 30, 20, 67),
(50, '2010-12-22', '06:00:00', 20, 30, 20, 67),
(50, '2010-12-22', '05:00:00', 40, 10, 20, 67),
(50, '2010-12-22', '04:00:00', 40, 20, 20, 67),
(50, '2010-12-22', '03:00:00', 20, 30, 20, 67),
(50, '2010-12-22', '02:00:00', 20, 30, 20, 67),
(50, '2010-12-22', '01:00:00', 20, 20, 20, 67),
(50, '2010-12-22', '00:00:00', 20, 30, 20, 67),
(60, '2010-12-23', '23:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '22:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '21:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '20:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '19:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '18:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '17:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '16:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '15:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '14:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '13:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '12:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '11:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '10:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '09:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '08:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '07:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '06:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '05:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '04:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '03:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '02:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '01:00:00', 40, 10, 20, 67),
(60, '2010-12-23', '00:00:00', 40, 10, 20, 67),
(50, '2010-12-24', '02:00:00', 20, 20, 20, 67),
(50, '2010-12-24', '02:00:00', 20, 20, 20, 67),
(50, '2010-12-24', '02:00:00', 20, 20, 20, 67),
(50, '2010-12-27', '02:00:00', 20, 20, 20, 67),
(60, '2010-12-24', '09:00:00', 50, 20, 20, 67),
(40, '2010-12-27', '03:00:00', 20, 20, 18, 67),
(60, '2010-12-25', '08:00:00', 20, 30, 20, 67),
(90, '2010-12-25', '14:00:00', 20, 10, 12, 67),
(90, '2010-12-25', '15:00:00', 40, 40, 15, 67),
(50, '2010-12-25', '16:00:00', 60, 40, 20, 67),
(60, '2010-12-25', '17:00:00', 60, 50, 20, 67),
(70, '2010-12-25', '18:00:00', 60, 30, 25, 67),
(65, '2010-12-25', '19:00:00', 40, 20, 20, 67),
(70, '2010-12-25', '20:00:00', 40, 20, 18, 67),
(60, '2010-12-25', '21:00:00', 20, 20, 15, 67),
(50, '2010-12-25', '22:00:00', 20, 10, 20, 67),
(50, '2010-12-25', '23:00:00', 20, 10, 20, 67),
(60, '2010-12-25', '13:00:00', 60, 30, 12, 67),
(60, '2010-12-25', '12:00:00', 80, 15, 10, 67),
(70, '2010-12-25', '11:00:00', 40, 40, 13, 67),
(50, '2010-12-25', '06:00:00', 20, 40, 20, 67),
(50, '2010-12-25', '00:00:00', 20, 30, 20, 67),
(50, '2010-12-25', '01:00:00', 20, 20, 20, 67),
(50, '2010-12-25', '04:00:00', 40, 20, 20, 67),
(50, '2010-12-25', '03:00:00', 20, 30, 20, 67),
(50, '2010-12-25', '02:00:00', 20, 40, 20, 67),
(50, '2010-12-25', '05:00:00', 40, 10, 20, 67),
(50, '2010-12-25', '07:00:00', 20, 50, 20, 67),
(60, '2010-12-25', '09:00:00', 50, 20, 18, 67),
(60, '2010-12-25', '10:00:00', 50, 20, 15, 67),
(60, '2010-12-26', '08:00:00', 20, 30, 20, 67),
(90, '2010-12-26', '14:00:00', 20, 10, 12, 67),
(90, '2010-12-26', '15:00:00', 40, 40, 15, 67),
(50, '2010-12-26', '16:00:00', 60, 40, 20, 67),
(60, '2010-12-26', '17:00:00', 60, 50, 20, 67),
(70, '2010-12-26', '18:00:00', 60, 30, 25, 67),
(65, '2010-12-26', '19:00:00', 40, 20, 20, 67),
(70, '2010-12-26', '20:00:00', 40, 20, 18, 67),
(60, '2010-12-26', '21:00:00', 20, 20, 15, 67),
(50, '2010-12-26', '22:00:00', 20, 10, 20, 67),
(50, '2010-12-26', '23:00:00', 20, 10, 20, 67),
(60, '2010-12-26', '13:00:00', 60, 30, 12, 67),
(60, '2010-12-26', '12:00:00', 80, 15, 10, 67),
(70, '2010-12-26', '11:00:00', 40, 40, 13, 67),
(50, '2010-12-26', '06:00:00', 20, 40, 20, 67),
(50, '2010-12-26', '00:00:00', 20, 30, 20, 67),
(50, '2010-12-26', '01:00:00', 20, 20, 20, 67),
(50, '2010-12-26', '04:00:00', 40, 20, 20, 67),
(50, '2010-12-26', '03:00:00', 20, 30, 20, 67),
(50, '2010-12-26', '02:00:00', 20, 40, 20, 67),
(50, '2010-12-26', '05:00:00', 40, 10, 20, 67),
(50, '2010-12-26', '07:00:00', 20, 50, 20, 67),
(60, '2010-12-26', '09:00:00', 50, 20, 18, 67),
(60, '2010-12-26', '10:00:00', 50, 20, 15, 67);

-- --------------------------------------------------------

--
-- Structure de la table `listeconseil`
--

DROP TABLE IF EXISTS `listeconseil`;
CREATE TABLE IF NOT EXISTS `listeconseil` (
  `Conseil` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `online`
--

DROP TABLE IF EXISTS `online`;
CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `online`
--

INSERT INTO `online` (`id`, `time`, `user_ip`) VALUES
(2, 1641892353, '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `CodeProduit` int(11) NOT NULL,
  `Couleur` varchar(7) NOT NULL,
  `CodeFamille` varchar(10) DEFAULT NULL,
  `Identifiant` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`CodeProduit`),
  KEY `Identifiant` (`Identifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`CodeProduit`, `Couleur`, `CodeFamille`, `Identifiant`) VALUES
(0, 'green', NULL, 'jeangerard'),
(1, 'blue', NULL, 'jacque'),
(2, 'cyan', NULL, 'jean'),
(3, 'red', NULL, 'Techio'),
(4753464, 'white', '3', 'jean-christophe'),
(4753463, 'white', '1176707671', 'jc'),
(67, 'white', '9410477622', 'temp'),
(4, 'red', '4', 'henri'),
(5, 'red', '4', 'chloe'),
(6, 'red', '4', 'greg'),
(7, 'red', '4', 'gest');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
