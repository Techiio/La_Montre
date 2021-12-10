-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 10 déc. 2021 à 11:29
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
(0, 'jeangerard', 'jean');

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
(0, '2010-12-21', '11:30:00', 0, 0, 15, 0);

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
(0, 0, 'green', NULL, 'jeangerard');

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
  ADD PRIMARY KEY (`Date`),
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
