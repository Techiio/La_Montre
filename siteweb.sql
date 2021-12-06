-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 déc. 2021 à 10:26
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
-- Base de données : `siteweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `CodeStatut` int(11) NOT NULL,
  `Identifiant` varchar(60) NOT NULL,
  `Mdp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `conseil`
--

DROP TABLE IF EXISTS `conseil`;
CREATE TABLE IF NOT EXISTS `conseil` (
  `CONSEIL` varchar(300) NOT NULL,
  `Score` int(11) NOT NULL,
  `CodeProduit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Score`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `donnésmontre`
--

DROP TABLE IF EXISTS `donnésmontre`;
CREATE TABLE IF NOT EXISTS `donnésmontre` (
  `Bpm` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `dB` int(11) NOT NULL,
  `No2` int(11) NOT NULL,
  `DegréCelsius` int(11) NOT NULL,
  `CodeProduit` int(11) DEFAULT NULL,
  PRIMARY KEY (`Date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `CodePersonne` int(11) NOT NULL,
  `CodeProduit` int(11) NOT NULL,
  `Couleur` varchar(7) NOT NULL,
  `CodeFamille` varchar(10) DEFAULT NULL,
  `Identifiant` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`CodeProduit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
