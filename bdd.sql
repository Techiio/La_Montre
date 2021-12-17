-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 déc. 2021 à 10:18
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

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

CREATE TABLE `connexion` (
  `CodeStatut` int(11) NOT NULL,
  `Identifiant` varchar(60) NOT NULL,
  `Mdp` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`CodeStatut`, `Identifiant`, `Mdp`) VALUES
(0, 'jeangerard', 'jean'),
(0, 'jacque', 'jacque'),
(0, 'jean', 'jean');

-- --------------------------------------------------------

--
-- Structure de la table `conseil`
--

CREATE TABLE `conseil` (
  `Score` int(11) NOT NULL,
  `CodeProduit` varchar(50) DEFAULT NULL,
  `pirescore` int(11) DEFAULT NULL,
  `Conseil` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `donneesmontre`
--

CREATE TABLE `donneesmontre` (
  `Bpm` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `dB` int(11) NOT NULL,
  `No2` int(11) NOT NULL,
  `DegréCelsius` int(11) NOT NULL,
  `CodeProduit` int(11) DEFAULT NULL
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
(60, '2010-12-24', '09:00:00', 50, 20, 20, 2);

-- --------------------------------------------------------

--
-- Structure de la table `listeconseil`
--

CREATE TABLE `listeconseil` (
  `Conseil` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `CodePersonne` int(11) NOT NULL,
  `CodeProduit` int(11) NOT NULL,
  `Couleur` varchar(7) NOT NULL,
  `CodeFamille` varchar(10) DEFAULT NULL,
  `Identifiant` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`CodePersonne`, `CodeProduit`, `Couleur`, `CodeFamille`, `Identifiant`) VALUES
(0, 0, 'green', NULL, 'jeangerard'),
(1, 1, 'blue', NULL, 'jacque'),
(1, 2, 'green', NULL, 'jean');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`Identifiant`);

--
-- Index pour la table `conseil`
--
ALTER TABLE `conseil`
  ADD PRIMARY KEY (`Score`),
  ADD KEY `CodeProduit` (`CodeProduit`);

--
-- Index pour la table `donneesmontre`
--
ALTER TABLE `donneesmontre`
  ADD KEY `CodeProduit` (`CodeProduit`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`CodeProduit`),
  ADD KEY `Identifiant` (`Identifiant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
