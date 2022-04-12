-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 12 avr. 2022 à 08:18
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
