-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2022 at 03:54 PM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `among_us`
--
CREATE DATABASE IF NOT EXISTS `among_us` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `among_us`;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `quant` int DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`product_id`, `user_id`, `quant`, `total_price`) VALUES
(12, 4, 3, 28497),
(13, 4, 7, 66507),
(34, 4, 4, 5996),
(16, 4, 10, 359990);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `NAME` varchar(256) NOT NULL,
  `QUANT` int NOT NULL,
  `PRICE` int NOT NULL,
  `COLOR` varchar(25) NOT NULL,
  `TYPE` varchar(256) NOT NULL,
  `IDDET` int NOT NULL,
  KEY `IDDET` (`IDDET`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`NAME`, `QUANT`, `PRICE`, `COLOR`, `TYPE`, `IDDET`) VALUES
('CREWMATE rouge cosplay GONFLABLE', 200, 9499, 'rouge', 'cosplay', 11),
('CREWMATE rose cosplay GONFLABLE', 200, 9499, 'rose', 'cosplay', 12),
('CREWMATE bleu cosplay GONFLABLE', 200, 9501, 'bleu', 'cosplay', 13),
('CREWMATE orange cosplay GONFLABLE', 200, 9499, 'orange', 'cosplay', 14),
('CREWMATE cyan cosplay GONFLABLE', 200, 9999, 'cyan', 'cosplay', 15),
('Pack familial CREWMATE cosplay GONFLABLES', 200, 35999, 'Pack multiple', 'cosplay', 16),
('Hoodie & Jogging IMPOSTORS AMONG US pour garçon', 200, 3999, 'rouge', 'clothing', 21),
('T-shirt ANGELIC CREWMATE pour fille', 200, 1599, 'blanc', 'clothing', 22),
('Casquette AMONG US AMONG US pour enfant à taille unique', 200, 1724, 'noir', 'clothing', 23),
('Pack 6 mini CREWMATE édition spéciale CHAPEAU', 150, 4999, 'Pack multiple', 'plush', 1),
('Pack 6 mini CREWMATE édition standard', 850, 2500, 'Pack multiple', 'plush', 2),
('Pack 6 mini CREWMATE LÉGENDAIRES édition LIMITÉE', 5, 24590, 'Pack multiple', 'plush', 3),
('Pack 6 mini CREWMATE LÉGENDAIRES édition SPÉCIALE', 50, 19999, 'Pack multiple', 'plush', 4),
('CREWMATE cyan peluche', 1500, 2015, 'cyan', 'plush', 5),
('CREWMATE rouge peluche', 1500, 1995, 'rouge', 'plush', 6),
('CREWMATE noir peluche', 1500, 1998, 'noir', 'plush', 7),
('CREWMATE rose peluche', 1500, 1999, 'rose', 'plush', 8),
('CREWMATE blanc peluche', 1500, 1993, 'blanc', 'plush', 9),
('CREWMATE jaune peluche', 1500, 1999, 'jaune', 'plush', 10),
('Mug CREWMATE rouge sculpté', 200, 2499, 'rouge', 'mug', 31),
('Mug BEZOS ETAIT L’IMPOSTEUR blanc', 200, 999, 'blanc', 'mug', 32),
('Poster de jeu AMONG US IMPOSTOR', 200, 999, 'noir', 'poster', 33),
('Tapis de souris AMONG US', 200, 1499, 'noir', 'tapis de souris', 34);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `identifiant` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `identifiant`) VALUES
(4, 'Manchon Clara', 'manchon.clara@gmail.com', 'motdepasse', 'cmanchon'),
(2, 'Bellaïd William', 'poundwinner@gmail.com', 'warioisthebest', 'Glutonny'),
(1, '  admin', 'admin@gmail.com', 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
