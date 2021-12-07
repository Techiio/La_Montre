-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 déc. 2021 à 15:33
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
  `Mdp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `conseil`
--

CREATE TABLE `conseil` (
  `CONSEIL` varchar(300) NOT NULL,
  `Score` int(11) NOT NULL,
  `CodeProduit` varchar(50) DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `prenom` varchar(30) NOT NULL,
  `codeP` varchar(26) NOT NULL,
  `codeF` text NOT NULL,
  `mdp1` text NOT NULL,
  `mdp2` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`prenom`, `codeP`, `codeF`, `mdp1`, `mdp2`) VALUES
('caca', 'acac', '89', 'caca', 'caca'),
('Baptiste', 'oui', '30', 'bbbb', 'bbbb');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conseil`
--
ALTER TABLE `conseil`
  ADD PRIMARY KEY (`Score`);

--
-- Index pour la table `donneesmontre`
--
ALTER TABLE `donneesmontre`
  ADD PRIMARY KEY (`Date`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`CodeProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
