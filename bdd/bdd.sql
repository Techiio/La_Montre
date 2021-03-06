-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 juin 2022 à 12:04
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
  `Mdp` char(80) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`CodeStatut`, `Identifiant`, `Mdp`) VALUES
(2, 'jesapel', '$2y$10$m/WSciWuSM8IMJgMJ/ipW.7ZykEO1BsgM/lH.0AdaE2u8GyrbbjJ2'),
(1, 'abboud', '$2y$10$6OQnTqC8h.t55Y5voh9Nj.aBGEquTNDYZkCeJ0xSyVKApzaJMfNKq'),
(0, 'sirot', '$2y$10$SIBytltZPn04TxDIKAPum.fon49qxDKc5SiF8gNLYMZO3gTwbP1fa'),
(0, 'brossolet', '$2y$10$Cs0LnANKnnF.SRYTeA3n6ub62axZ1.gpOJd1lpPfzVBeUt32IIn7S');

-- --------------------------------------------------------

--
-- Structure de la table `donneesmontre`
--

CREATE TABLE `donneesmontre` (
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `Bpm` int(11) NOT NULL,
  `dB` int(11) NOT NULL,
  `No2` int(11) NOT NULL,
  `DegréCelsius` int(11) NOT NULL,
  `CodeProduit` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `donneesmontre`
--

INSERT INTO `donneesmontre` (`Date`, `Heure`, `Bpm`, `dB`, `No2`, `DegréCelsius`, `CodeProduit`) VALUES
('2022-06-13', '09:35:28', 76, 7, 63, 0, 6742),
('2022-06-13', '09:35:39', 76, 6, 39, 26, 6742),
('2022-06-13', '09:35:50', 76, 6, 43, 26, 6742),
('2022-06-13', '09:36:02', 76, 7, 39, 26, 6742),
('2022-06-13', '09:36:13', 76, 7, 45, 26, 6742),
('2022-06-13', '09:36:24', 76, 6, 53, 26, 6742),
('2022-06-13', '09:36:35', 76, 6, 39, 26, 6742),
('2022-06-13', '09:36:47', 76, 6, 53, 26, 6742),
('2022-06-13', '09:36:58', 76, 6, 56, 26, 6742),
('2022-06-13', '09:37:09', 76, 7, 41, 26, 6742),
('2022-06-13', '09:37:21', 76, 7, 43, 26, 6742),
('2022-06-13', '09:37:32', 76, 7, 64, 26, 6742),
('2022-06-13', '09:37:43', 76, 7, 19, 26, 6742),
('2022-06-13', '09:37:55', 76, 6, 41, 26, 6742),
('2022-06-13', '09:38:06', 76, 6, 42, 26, 6742),
('2022-06-13', '09:38:17', 76, 7, 56, 26, 6742),
('2022-06-13', '09:38:28', 76, 7, 41, 26, 6742),
('2022-06-13', '09:38:40', 76, 7, 52, 26, 6742),
('2022-06-13', '09:38:51', 76, 7, 49, 26, 6742),
('2022-06-13', '09:39:02', 76, 6, 54, 26, 6742),
('2022-06-13', '09:39:14', 76, 7, 37, 26, 6742),
('2022-06-13', '09:39:25', 76, 6, 57, 26, 6742),
('2022-06-13', '09:39:36', 76, 6, 43, 26, 6742),
('2022-06-13', '09:39:47', 76, 6, 50, 26, 6742),
('2022-06-13', '09:39:59', 76, 6, 48, 26, 6742),
('2022-06-13', '09:40:10', 76, 6, 49, 26, 6742),
('2022-06-13', '09:40:21', 76, 6, 46, 26, 6742),
('2022-06-13', '09:40:33', 76, 7, 53, 26, 6742),
('2022-06-13', '09:40:44', 76, 6, 41, 26, 6742),
('2022-06-13', '09:40:55', 76, 6, 56, 26, 6742),
('2022-06-13', '09:41:06', 76, 6, 42, 26, 6742),
('2022-06-13', '09:41:18', 76, 6, 39, 26, 6742),
('2022-06-13', '09:41:29', 76, 6, 49, 26, 6742),
('2022-06-13', '09:41:40', 76, 6, 47, 26, 6742),
('2022-06-13', '09:41:52', 76, 6, 48, 26, 6742),
('2022-06-13', '09:42:03', 76, 6, 51, 26, 6742),
('2022-06-13', '09:42:14', 76, 7, 62, 26, 6742),
('2022-06-13', '09:42:25', 76, 6, 44, 26, 6742),
('2022-06-13', '09:42:37', 76, 6, 56, 26, 6742),
('2022-06-13', '09:42:48', 76, 8, 51, 26, 6742),
('2022-06-13', '09:42:59', 76, 7, 50, 26, 6742),
('2022-06-13', '09:43:11', 76, 6, 54, 26, 6742),
('2022-06-13', '09:43:22', 76, 7, 42, 26, 6742),
('2022-06-13', '09:43:33', 76, 8, 75, 26, 6742),
('2022-06-13', '09:43:44', 76, 6, 53, 26, 6742),
('2022-06-13', '09:43:56', 76, 7, 41, 26, 6742),
('2022-06-13', '09:44:07', 76, 6, 43, 26, 6742),
('2022-06-13', '09:44:18', 76, 7, 54, 26, 6742),
('2022-06-13', '09:44:30', 76, 7, 37, 26, 6742),
('2022-06-13', '09:44:41', 76, 6, 54, 26, 6742),
('2022-06-13', '09:44:52', 76, 6, 37, 26, 6742),
('2022-06-13', '09:45:03', 76, 7, 50, 26, 6742),
('2022-06-13', '09:45:15', 76, 7, 50, 26, 6742),
('2022-06-13', '09:45:26', 76, 7, 56, 26, 6742),
('2022-06-13', '09:45:37', 76, 6, 51, 26, 6742),
('2022-06-13', '09:45:49', 76, 8, 42, 26, 6742),
('2022-06-13', '09:46:00', 76, 7, 45, 26, 6742),
('2022-06-13', '09:46:11', 76, 7, 44, 26, 6742),
('2022-06-13', '09:46:22', 76, 7, 57, 26, 6742),
('2022-06-13', '09:46:34', 76, 7, 33, 26, 6742),
('2022-06-13', '09:46:45', 76, 7, 46, 26, 6742),
('2022-06-13', '09:46:56', 76, 8, 51, 26, 6742),
('2022-06-13', '09:47:08', 76, 6, 37, 26, 6742),
('2022-06-13', '09:47:19', 76, 7, 48, 26, 6742),
('2022-06-13', '09:47:30', 76, 6, 24, 26, 6742),
('2022-06-13', '09:47:41', 76, 7, 51, 26, 6742),
('2022-06-13', '09:47:53', 76, 6, 41, 26, 6742),
('2022-06-13', '09:48:04', 76, 7, 55, 26, 6742),
('2022-06-13', '09:48:15', 76, 7, 42, 26, 6742),
('2022-06-13', '09:48:27', 76, 6, 47, 26, 6742),
('2022-06-13', '09:48:38', 76, 7, 30, 26, 6742),
('2022-06-13', '09:48:49', 76, 6, 52, 26, 6742),
('2022-06-13', '09:49:01', 76, 6, 58, 26, 6742),
('2022-06-13', '09:49:12', 76, 6, 53, 26, 6742),
('2022-06-13', '09:49:23', 76, 7, 33, 26, 6742),
('2022-06-13', '09:49:34', 76, 6, 52, 26, 6742),
('2022-06-13', '09:49:46', 76, 6, 43, 26, 6742),
('2022-06-13', '09:49:57', 76, 6, 71, 26, 6742),
('2022-06-13', '09:50:08', 76, 6, 51, 26, 6742),
('2022-06-13', '09:50:20', 76, 6, 53, 26, 6742),
('2022-06-13', '09:50:31', 76, 6, 46, 26, 6742),
('2022-06-13', '09:50:42', 76, 8, 37, 26, 6742),
('2022-06-13', '09:50:53', 76, 7, 51, 26, 6742),
('2022-06-13', '09:51:05', 76, 6, 53, 26, 6742),
('2022-06-13', '09:51:16', 76, 6, 47, 26, 6742),
('2022-06-13', '09:51:27', 76, 7, 45, 26, 6742),
('2022-06-13', '09:51:39', 76, 6, 53, 26, 6742),
('2022-06-13', '09:51:50', 76, 6, 50, 26, 6742),
('2022-06-13', '09:52:01', 76, 6, 46, 26, 6742),
('2022-06-13', '09:52:12', 76, 6, 40, 26, 6742),
('2022-06-13', '09:52:24', 76, 7, 56, 26, 6742),
('2022-06-13', '09:52:35', 76, 6, 39, 26, 6742),
('2022-06-13', '09:52:46', 76, 6, 78, 26, 6742),
('2022-06-13', '09:52:58', 76, 7, 52, 26, 6742),
('2022-06-13', '09:53:09', 76, 6, 55, 26, 6742),
('2022-06-13', '09:53:20', 76, 7, 55, 26, 6742),
('2022-06-13', '09:53:31', 76, 6, 49, 26, 6742),
('2022-06-13', '09:53:43', 76, 6, 50, 26, 6742),
('2022-06-13', '09:53:54', 76, 6, 44, 26, 6742),
('2022-06-13', '09:54:05', 76, 7, 50, 26, 6742),
('2022-06-13', '09:54:17', 76, 6, 59, 26, 6742),
('2022-06-13', '09:54:28', 76, 6, 42, 26, 6742),
('2022-06-13', '09:54:39', 76, 7, 38, 26, 6742),
('2022-06-13', '09:54:50', 76, 7, 57, 26, 6742),
('2022-06-13', '09:55:02', 76, 7, 67, 26, 6742),
('2022-06-13', '09:55:13', 76, 7, 49, 26, 6742),
('2022-06-13', '09:55:24', 76, 6, 49, 26, 6742),
('2022-06-13', '09:55:36', 76, 6, 47, 26, 6742),
('2022-06-13', '09:55:47', 76, 6, 48, 26, 6742),
('2022-06-13', '09:55:58', 76, 6, 41, 26, 6742),
('2022-06-13', '09:56:09', 76, 8, 36, 26, 6742),
('2022-06-13', '09:56:21', 76, 6, 56, 26, 6742),
('2022-06-13', '09:56:44', 76, 6, 48, 26, 6742),
('2022-06-13', '09:57:42', 76, 6, 53, 26, 6742),
('2022-06-13', '09:58:01', 76, 8, 51, 26, 6742),
('2022-06-13', '09:58:20', 76, 8, 21, 26, 6742),
('2022-06-13', '09:58:40', 76, 6, 43, 26, 6742),
('2022-06-13', '09:58:59', 76, 7, 53, 26, 6742),
('2022-06-13', '09:59:18', 76, 7, 46, 27, 6742),
('2022-06-13', '09:59:38', 76, 7, 57, 27, 6742),
('2022-06-13', '09:59:57', 76, 7, 45, 27, 6742),
('2022-06-13', '10:00:16', 76, 6, 44, 27, 6742),
('2022-06-13', '10:00:35', 76, 8, 46, 27, 6742),
('2022-06-13', '10:00:55', 76, 7, 43, 27, 6742),
('2022-06-13', '10:01:14', 76, 6, 31, 27, 6742),
('2022-06-13', '10:01:33', 76, 8, 61, 27, 6742),
('2022-06-13', '10:01:47', 76, 7, 36, 27, 6742),
('2022-06-13', '10:01:59', 76, 6, 47, 27, 6742),
('2022-06-13', '10:02:10', 76, 6, 41, 26, 6742),
('2022-06-13', '10:02:21', 76, 6, 50, 26, 6742),
('2022-06-13', '10:02:32', 76, 7, 45, 26, 6742),
('2022-06-13', '10:02:44', 76, 5, 45, 26, 6742),
('2022-06-13', '10:02:55', 76, 7, 78, 26, 6742),
('2022-06-13', '10:03:06', 76, 7, 37, 26, 6742),
('2022-06-13', '10:03:18', 76, 6, 53, 26, 6742),
('2022-06-13', '10:03:29', 76, 7, 37, 26, 6742),
('2022-06-13', '10:03:40', 76, 7, 43, 26, 6742),
('2022-06-13', '10:03:51', 76, 7, 37, 26, 6742),
('2022-06-13', '10:04:03', 76, 7, 40, 26, 6742),
('2022-06-13', '10:04:14', 76, 8, 49, 26, 6742),
('2022-06-13', '10:04:25', 76, 7, 20, 26, 6742),
('2022-06-13', '10:04:37', 76, 7, 45, 26, 6742),
('2022-06-13', '10:04:48', 76, 6, 49, 26, 6742),
('2022-06-13', '10:04:59', 76, 7, 33, 26, 6742),
('2022-06-13', '10:05:10', 76, 8, 47, 26, 6742),
('2022-06-13', '10:05:22', 76, 7, 40, 26, 6742),
('2022-06-13', '10:05:33', 76, 6, 53, 26, 6742),
('2022-06-13', '10:05:44', 76, 7, 51, 26, 6742),
('2022-06-13', '10:05:56', 76, 6, 53, 26, 6742),
('2022-06-13', '10:06:07', 76, 7, 60, 26, 6742),
('2022-06-13', '10:06:18', 76, 6, 41, 26, 6742),
('2022-06-13', '10:06:29', 76, 6, 45, 26, 6742),
('2022-06-13', '10:06:41', 76, 7, 45, 26, 6742),
('2022-06-13', '10:06:52', 76, 6, 41, 26, 6742),
('2022-06-13', '10:07:03', 76, 8, 57, 26, 6742),
('2022-06-13', '10:07:15', 76, 7, 50, 26, 6742),
('2022-06-13', '10:07:26', 76, 7, 32, 26, 6742),
('2022-06-13', '10:07:37', 76, 7, 49, 26, 6742),
('2022-06-13', '10:07:49', 76, 7, 68, 26, 6742),
('2022-06-13', '10:08:00', 76, 7, 45, 26, 6742),
('2022-06-13', '10:08:11', 76, 7, 53, 26, 6742),
('2022-06-13', '10:08:22', 76, 8, 40, 26, 6742),
('2022-06-13', '10:08:34', 76, 7, 37, 26, 6742),
('2022-06-13', '10:08:45', 76, 7, 14, 26, 6742),
('2022-06-13', '10:08:56', 76, 8, 38, 26, 6742),
('2022-06-13', '10:09:08', 76, 6, 49, 27, 6742),
('2022-06-13', '10:09:19', 76, 8, 45, 27, 6742),
('2022-06-13', '10:09:30', 76, 7, 37, 27, 6742),
('2022-06-13', '10:09:41', 76, 7, 28, 27, 6742),
('2022-06-13', '10:09:53', 76, 7, 49, 27, 6742),
('2022-06-13', '10:10:04', 76, 7, 44, 27, 6742),
('2022-06-13', '10:10:15', 76, 8, 49, 27, 6742),
('2022-06-13', '10:10:27', 76, 7, 67, 27, 6742),
('2022-06-13', '10:10:38', 76, 7, 44, 27, 6742),
('2022-06-13', '10:10:49', 76, 6, 53, 27, 6742),
('2022-06-13', '10:11:00', 76, 6, 43, 27, 6742),
('2022-06-13', '10:11:12', 76, 7, 45, 27, 6742),
('2022-06-13', '10:11:23', 76, 7, 44, 27, 6742),
('2022-06-13', '10:11:34', 76, 7, 55, 27, 6742),
('2022-06-13', '10:11:46', 76, 7, 47, 27, 6742),
('2022-06-13', '10:11:57', 76, 8, 16, 27, 6742),
('2022-06-13', '10:12:08', 76, 8, 63, 28, 6742),
('2022-06-13', '10:12:19', 76, 7, 55, 28, 6742),
('2022-06-13', '10:12:31', 76, 8, 49, 28, 6742),
('2022-06-13', '10:12:42', 76, 6, 46, 28, 6742),
('2022-06-13', '10:12:53', 76, 6, 45, 28, 6742),
('2022-06-13', '10:13:05', 76, 6, 48, 28, 6742),
('2022-06-13', '10:13:16', 76, 7, 41, 28, 6742),
('2022-06-13', '10:13:27', 76, 7, 37, 28, 6742),
('2022-06-13', '10:13:38', 76, 6, 49, 28, 6742),
('2022-06-13', '10:13:50', 76, 7, 53, 28, 6742),
('2022-06-13', '10:14:01', 76, 7, 68, 28, 6742),
('2022-06-13', '10:14:12', 76, 8, 71, 28, 6742),
('2022-06-13', '10:14:24', 76, 8, 51, 28, 6742),
('2022-06-13', '10:14:35', 76, 7, 47, 28, 6742),
('2022-06-13', '10:14:46', 76, 7, 55, 28, 6742),
('2022-06-13', '10:14:57', 76, 7, 13, 28, 6742),
('2022-06-13', '10:15:09', 76, 7, 45, 28, 6742),
('2022-06-13', '10:15:20', 76, 8, 45, 28, 6742),
('2022-06-13', '10:15:31', 76, 7, 40, 28, 6742),
('2022-06-13', '10:15:43', 76, 7, 47, 27, 6742),
('2022-06-13', '10:15:54', 76, 7, 41, 27, 6742),
('2022-06-13', '10:16:05', 76, 6, 33, 27, 6742),
('2022-06-13', '10:16:17', 76, 8, 45, 27, 6742),
('2022-06-13', '10:16:28', 76, 7, 45, 27, 6742),
('2022-06-13', '10:16:39', 76, 7, 41, 27, 6742),
('2022-06-13', '10:16:50', 76, 7, 30, 27, 6742),
('2022-06-13', '10:17:02', 76, 7, 12, 27, 6742),
('2022-06-13', '10:17:13', 76, 7, 23, 27, 6742),
('2022-06-13', '10:17:24', 76, 8, 53, 27, 6742),
('2022-06-13', '10:17:36', 76, 7, 44, 27, 6742),
('2022-06-13', '10:17:47', 76, 7, 51, 27, 6742),
('2022-06-13', '10:17:58', 76, 8, 55, 27, 6742),
('2022-06-13', '10:18:09', 76, 7, 40, 27, 6742),
('2022-06-13', '10:18:21', 76, 7, 28, 27, 6742),
('2022-06-13', '10:18:32', 76, 6, 45, 27, 6742),
('2022-06-13', '10:18:43', 76, 8, 44, 27, 6742),
('2022-06-13', '10:18:55', 76, 7, 51, 27, 6742),
('2022-06-13', '10:19:06', 76, 8, 58, 27, 6742),
('2022-06-13', '10:19:17', 76, 7, 50, 27, 6742),
('2022-06-13', '10:19:28', 76, 7, 50, 27, 6742),
('2022-06-13', '10:19:40', 76, 7, 38, 27, 6742),
('2022-06-13', '10:19:51', 76, 7, 43, 27, 6742),
('2022-06-13', '10:20:02', 76, 6, 63, 27, 6742),
('0000-00-00', '00:00:00', 257, 255, 81, 3000, 3010),
('0000-00-00', '00:00:00', 298, 255, 296, 3000, 3010),
('0000-00-00', '00:00:00', 308, 255, 306, 3000, 3010),
('0000-00-00', '00:00:00', 328, 326, 306, 3000, 3010),
('0000-00-00', '00:00:00', 338, 336, 306, 3000, 3010),
('0000-00-00', '00:00:00', 369, 336, 367, 3000, 3010),
('0000-00-00', '00:00:00', 429, 336, 427, 3000, 3010),
('0000-00-00', '00:00:00', 459, 336, 458, 3000, 3010),
('0000-00-00', '00:00:00', 469, 336, 468, 3000, 3010),
('0000-00-00', '00:00:00', 489, 336, 488, 3000, 3010),
('0000-00-00', '00:00:00', 499, 336, 498, 3000, 3010),
('0000-00-00', '00:00:00', 539, 336, 538, 3000, 3010),
('0000-00-00', '00:00:00', 589, 336, 589, 3000, 3010),
('0000-00-00', '00:00:00', 599, 336, 599, 3000, 3010),
('0000-00-00', '00:00:00', 619, 336, 619, 3000, 3010);

-- --------------------------------------------------------

--
-- Structure de la table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `user_ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `online`
--

INSERT INTO `online` (`id`, `time`, `user_ip`) VALUES
(2, 1642968025, '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `CodeProduit` varchar(24) NOT NULL,
  `Couleur` varchar(7) NOT NULL,
  `CodeFamille` varchar(10) DEFAULT NULL,
  `Identifiant` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`CodeProduit`, `Couleur`, `CodeFamille`, `Identifiant`) VALUES
('6742', 'orange', '7117415777', 'brossolet'),
('4854948584', 'white', '7117415777', 'abboud'),
('68493956', 'red', '7117415777', 'sirot');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`Identifiant`);

--
-- Index pour la table `donneesmontre`
--
ALTER TABLE `donneesmontre`
  ADD KEY `CodeProduit` (`CodeProduit`);

--
-- Index pour la table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`CodeProduit`),
  ADD KEY `Identifiant` (`Identifiant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
