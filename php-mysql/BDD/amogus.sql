-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 12 avr. 2022 à 10:10
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
-- Base de données : `amogus`
--

-- --------------------------------------------------------

--
-- Structure de la table `clothing`
--

DROP TABLE IF EXISTS `clothing`;
CREATE TABLE IF NOT EXISTS `clothing` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(256) NOT NULL,
  `QUANT` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `COLOR` varchar(25) NOT NULL,
  `IDDET` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDDET` (`IDDET`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clothing`
--

INSERT INTO `clothing` (`ID`, `NAME`, `QUANT`, `PRICE`, `COLOR`, `IDDET`) VALUES
(1, 'Hoodie & Jogging IMPOSTORS AMONG US pour garçon', 200, 3999, 'rouge', 21),
(2, 'T-shirt ANGELIC CREWMATE pour fille', 200, 1599, 'blanc', 22),
(3, 'Casquette AMONG US AMONG US pour enfant à taille unique', 200, 1724, 'noir', 23);

-- --------------------------------------------------------

--
-- Structure de la table `cosplay`
--

DROP TABLE IF EXISTS `cosplay`;
CREATE TABLE IF NOT EXISTS `cosplay` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(256) NOT NULL,
  `QUANT` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `COLOR` varchar(25) NOT NULL,
  `IDDET` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDDET` (`IDDET`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cosplay`
--

INSERT INTO `cosplay` (`ID`, `NAME`, `QUANT`, `PRICE`, `COLOR`, `IDDET`) VALUES
(1, 'CREWMATE rouge cosplay GONFLABLE', 200, 9499, 'rouge', 11),
(2, 'CREWMATE rose cosplay GONFLABLE', 200, 9499, 'rose', 12),
(3, 'CREWMATE bleu cosplay GONFLABLE', 200, 9501, 'bleu', 13),
(4, 'CREWMATE orange cosplay GONFLABLE', 200, 9499, 'orange', 14),
(5, 'CREWMATE cyan cosplay GONFLABLE', 200, 9999, 'cyan', 15),
(6, 'Pack familial CREWMATE cosplay GONFLABLES', 200, 35999, 'Pack multiple', 16);

-- --------------------------------------------------------

--
-- Structure de la table `misc`
--

DROP TABLE IF EXISTS `misc`;
CREATE TABLE IF NOT EXISTS `misc` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(256) NOT NULL,
  `QUANT` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `COLOR` varchar(25) NOT NULL,
  `TYPE` varchar(256) NOT NULL,
  `IDDET` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDDET` (`IDDET`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `misc`
--

INSERT INTO `misc` (`ID`, `NAME`, `QUANT`, `PRICE`, `COLOR`, `TYPE`, `IDDET`) VALUES
(1, 'Mug CREWMATE rouge sculpté', 200, 2499, 'rouge', 'mug', 31),
(2, 'Mug BEZOS ETAIT L’IMPOSTEUR blanc', 200, 999, 'blanc', 'mug', 32),
(3, 'Poster de jeu AMONG US IMPOSTOR', 200, 999, 'noir', 'poster', 33),
(4, 'Tapis de souris AMONG US', 200, 1499, 'noir', 'tapis de souris', 34);

-- --------------------------------------------------------

--
-- Structure de la table `plush`
--

DROP TABLE IF EXISTS `plush`;
CREATE TABLE IF NOT EXISTS `plush` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(256) NOT NULL,
  `QUANT` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `COLOR` varchar(25) NOT NULL,
  `IDDET` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDDET` (`IDDET`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plush`
--

INSERT INTO `plush` (`ID`, `NAME`, `QUANT`, `PRICE`, `COLOR`, `IDDET`) VALUES
(1, 'Pack 6 mini CREWMATE édition spéciale CHAPEAU', 150, 4999, 'Pack multiple', 1),
(2, 'Pack 6 mini CREWMATE édition standard', 850, 2500, 'Pack multiple', 2),
(3, 'Pack 6 mini CREWMATE LÉGENDAIRES édition LIMITÉE', 5, 24590, 'Pack multiple', 3),
(4, 'Pack 6 mini CREWMATE LÉGENDAIRES édition SPÉCIALE', 50, 19999, 'Pack multiple', 4),
(5, 'CREWMATE cyan peluche', 1500, 2015, 'cyan', 5),
(6, 'CREWMATE rouge peluche', 1500, 1995, 'rouge', 6),
(7, 'CREWMATE noir peluche', 1500, 1998, 'noir', 7),
(8, 'CREWMATE rose peluche', 1500, 1999, 'rose', 8),
(9, 'CREWMATE blanc peluche', 1500, 1993, 'blanc', 9),
(10, 'CREWMATE jaune peluche', 1500, 1999, 'jaune', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
