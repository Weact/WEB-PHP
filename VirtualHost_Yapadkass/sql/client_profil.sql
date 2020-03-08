-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 08 mars 2020 à 23:12
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
-- Base de données :  `yapadkass`
--

-- --------------------------------------------------------

--
-- Structure de la table `client_profil`
--

DROP TABLE IF EXISTS `client_profil`;
CREATE TABLE IF NOT EXISTS `client_profil` (
  `id_client` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) COLLATE latin1_general_cs NOT NULL,
  `password` varchar(16) COLLATE latin1_general_cs DEFAULT NULL,
  PRIMARY KEY (`id_client`,`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `client_profil`
--

INSERT INTO `client_profil` (`id_client`, `username`, `password`) VALUES
(1, 'Akazor', 'b9a4sq6*'),
(2, 'Weact', 'dxa19*4vc9v'),
(3, 'Zerost', 'Vd49*wa49'),
(4, 'Timazor', 'Eegff43fd**-z'),
(5, 'CookieChicken', 'f72gd4s9*S'),
(6, 'Zoji', 'ffd49qd46*S'),
(7, 'NZ', 'E*-9dd4qxx');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
