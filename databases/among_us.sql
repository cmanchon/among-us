-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 31 mai 2022 à 15:45
-- Version du serveur : 8.0.27
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `among_us`
--
CREATE DATABASE IF NOT EXISTS `among_us` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `among_us`;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `userid` int DEFAULT NULL,
  `note` int DEFAULT NULL,
  `texte` varchar(1000) DEFAULT NULL,
  `IDDET` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`userid`, `note`, `texte`, `IDDET`) VALUES
(4, 5, 'PRODUIT DE FOU VRAIMENT UNE DINGUERIE OMG', 4),
(4, 4, 'je suis choquer aussi de la qualité de ce produit', 15),
(5, 5, 'produit de fou omg je suis choquer', 15),
(4, 5, 'j\'aimerais trop avoir ce magnifique t shirt', 22),
(4, 5, 't shirt de fou je le veux', 22),
(4, 5, 'Belle couleur.', 5);

-- --------------------------------------------------------

--
-- Structure de la table `carts`
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
-- Déchargement des données de la table `carts`
--

INSERT INTO `carts` (`product_id`, `user_id`, `quant`, `total_price`) VALUES
(12, 4, 9, 85491),
(13, 4, 10, 95010),
(34, 4, 10, 14990),
(16, 4, 10, 359990),
(15, 4, 27, 269973);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `num_commande` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quant` int DEFAULT NULL,
  `validation` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`num_commande`, `user_id`, `product_id`, `quant`, `validation`) VALUES
(1, 4, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `descriptions`
--

DROP TABLE IF EXISTS `descriptions`;
CREATE TABLE IF NOT EXISTS `descriptions` (
  `IDDET` int DEFAULT NULL,
  `texte` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `descriptions`
--

INSERT INTO `descriptions` (`IDDET`, `texte`) VALUES
(1, 'Ce grand paquet de mini CREWMATE Among Us spéciale édition CHAPEAU saura <br>égayer votre esprit de déduction ainsi que votre imagination. Pour tout âge, ce <br>pack complet de peluches de poches offre un large choix de couleur et de <br>magnifiques couvre-chefs inspirés du célèbre jeu-vidéo Among Us.<br>\n(Attention à ne pas faire porter le chapeau à n?importe qui !).\n'),
(2, 'Ce grand paquet de mini CREWMATE Among Us  saura égayer votre esprit de <br>déduction ainsi que votre imagination. Pour tout âge, ce pack complet de peluches <br>de poches offre un large choix de couleur inspirée de celle du célèbre jeu-vidéo <br>Among Us.<br>\n(Attention à ne pas faire porter le chapeau à n\'importe qui !).'),
(4, 'Ce grand paquet de mini CREWMATE LÉGENDAIRES édition LIMITÉE Among Us <br> saura égayer votre esprit de déduction et votre style. Conçus pour les experts du <br> célèbre jeu-vidéo multijoueur de trahison Among Us, celle édition comprend<br> 7 mini peluches ayant des tenues ainsi que des couvre-chefs personnalisés.<br>\n(Attention à ne pas faire des jaloux dans l\'équipage !).\n'),
(3, 'Ce grand paquet de mini CREWMATE LÉGENDAIRES édition LIMITÉE Among Us<br> saura égayer votre esprit de déduction et vous permettra de mettre en avant votre<br> collection unique. Conçus pour les experts du célèbre jeu-vidéo multijoueur<br> de trahison Among Us, celle édition unique est vendu à un nombre limité d?exemplaire.<br>\n(Attention à ne pas faire des jaloux dans l\'équipage !).'),
(5, 'Cette douce peluche, à la combinaison soyeuse, vous accompagnera des tréfonds de <br>l\'espace, jusqu\'au coeur d\'un volcan. Soyez accompagné en tout temps d\'un <br>CREWMATE de votre couleur préférée vous rappelant le célèbre jeu vidéo de <br>déduction et de trahison multijoueur et multiplateforme Among Us.<br>\n(Attention, nous ne pouvons pas garantir qu\'il ne s\'agisse pas de l\'imposteur !)'),
(6, 'Cette douce peluche, à la combinaison soyeuse, vous accompagnera des tréfonds de <br>l\'espace, jusqu\'au coeur d\'un volcan. Soyez accompagné en tout temps d\'un <br>CREWMATE de votre couleur préférée vous rappelant le célèbre jeu vidéo de <br>déduction et de trahison multijoueur et multiplateforme Among Us.<br>\n(Attention, nous ne pouvons pas garantir qu\'il ne s\'agisse pas de l\'imposteur !)'),
(7, 'Cette douce peluche, à la combinaison soyeuse, vous accompagnera des tréfonds de <br>l\'espace, jusqu\'au coeur d\'un volcan. Soyez accompagné en tout temps d\'un <br>CREWMATE de votre couleur préférée vous rappelant le célèbre jeu vidéo de <br>déduction et de trahison multijoueur et multiplateforme Among Us.<br>\n(Attention, nous ne pouvons pas garantir qu\'il ne s\'agisse pas de l\'imposteur !)'),
(8, 'Cette douce peluche, à la combinaison soyeuse, vous accompagnera des tréfonds de <br>l\'espace, jusqu\'au coeur d\'un volcan. Soyez accompagné en tout temps d\'un <br>CREWMATE de votre couleur préférée vous rappelant le célèbre jeu vidéo de <br>déduction et de trahison multijoueur et multiplateforme Among Us.<br>\n(Attention, nous ne pouvons pas garantir qu\'il ne s\'agisse pas de l\'imposteur !)'),
(9, 'Cette douce peluche, à la combinaison soyeuse, vous accompagnera des tréfonds de <br>l\'espace, jusqu\'au coeur d\'un volcan. Soyez accompagné en tout temps d\'un <br>CREWMATE de votre couleur préférée vous rappelant le célèbre jeu vidéo de <br>déduction et de trahison multijoueur et multiplateforme Among Us.<br>\n(Attention, nous ne pouvons pas garantir qu\'il ne s\'agisse pas de l\'imposteur !)'),
(10, 'Cette douce peluche, à la combinaison soyeuse, vous accompagnera des tréfonds de <br>l\'espace, jusqu\'au coeur d\'un volcan. Soyez accompagné en tout temps d\'un <br>CREWMATE de votre couleur préférée vous rappelant le célèbre jeu vidéo de <br>déduction et de trahison multijoueur et multiplateforme Among Us.<br>\n(Attention, nous ne pouvons pas garantir qu\'il ne s\'agisse pas de l\'imposteur !)'),
(11, 'Grâce à ce CREWMATE cosplay GONFLABLE, incarnez en grandeur nature les <br>personages du célèbre jeu de déduction et de trahison multijoueur et <br>multuplateforme Among Us. Il ne tiendra qu\'à vous de ne pas être suspicieux !<br>\n(attention, ne pas gonfler avec de l\'hélium)\n'),
(12, 'Grâce à ce CREWMATE cosplay GONFLABLE, incarnez en grandeur nature les <br>personages du célèbre jeu de déduction et de trahison multijoueur et <br>multuplateforme Among Us. Il ne tiendra qu\'à vous de ne pas être suspicieux !<br>\n(attention, ne pas gonfler avec de l\'hélium)\n'),
(13, 'Grâce à ce CREWMATE cosplay GONFLABLE, incarnez en grandeur nature les <br>personages du célèbre jeu de déduction et de trahison multijoueur et <br>multuplateforme Among Us. Il ne tiendra qu\'à vous de ne pas être suspicieux !<br>\n(attention, ne pas gonfler avec de l\'hélium)\n'),
(14, 'Grâce à ce CREWMATE cosplay GONFLABLE, incarnez en grandeur nature les <br>personages du célèbre jeu de déduction et de trahison multijoueur et <br>multuplateforme Among Us. Il ne tiendra qu\'à vous de ne pas être suspicieux !<br>\n(attention, ne pas gonfler avec de l\'hélium)\n'),
(15, 'Grâce à ce CREWMATE cosplay GONFLABLE, incarnez en grandeur nature les <br>personages du célèbre jeu de déduction et de trahison multijoueur et <br>multuplateforme Among Us. Il ne tiendra qu\'à vous de ne pas être suspicieux !<br>\n(attention, ne pas gonfler avec de l\'hélium)\n'),
(16, 'Grâce à ce pack CREWMATE cosplay GONFLABLE, incarnez en amis et en famille les <br>personages du célèbre jeu de déduction et de trahison multijoueur et <br>multuplateforme Among Us. Soyez vigilent si vous croisez l\'imposteur !<br>\n(Attention, ne pas gonfler avec de l\'hélium)\n'),
(21, 'Avec ce pack de Hoodie & Jogging IMPOSTORS AMONG US pour garçon, portez dans<br> la cours de récréation les couleurs du célèbre jeu vidéo de trahison <br>spatiale Among Us.\n'),
(22, 'Avec ce T-shirt ANGELIC CREWMATE pour fille, portez dans la cours de récréation les <br>couleurs du célèbre jeu vidéo de trahison spatiale Among Us.\n'),
(23, 'Cette casquette AMONG US AMONG US pour enfant à taille unique vous permettra<br> de rester à l\'abri du soleil tout en arborant votre passion pour le jeu <br>vidéo de trahison spatiale Among Us.\n'),
(31, 'Ce Mug CREWMATE rouge sculpté vous permettra de boire dans un récipient à la<br> forme d\'un CREWMATE inspiré du célèbre jeu vidéo de trahison spatiale<br> multijoueur Among Us.<br>\n(Attention que l\'imposteur n\'ait rien mis dans votre boisson !)\n'),
(32, 'Ce Mug BEZOS ETAIT L\'IMPOSTEUR blanc vous permettra de boir dans un récipient <br>sobre et classieux arborant la véritable identité du CREEWMATE BEZOS inspiré <br>du célèbre jeu vidéo de trahison multijoueur multuplateforme spatiale Among Us.\n'),
(33, 'Décorez votre chambre, ou toute autre pièce de votre vaisseau spatiale, grâce à ce <br>magnifique poster de jeu AMONG US IMPOSTOR. Levez-vous tous les matins en <br>ayant la possibilité d\'admirer les CREWMATES et les IMPOSTEURS voguer à leurs <br>activités quotidiennes dans l\'espace.\n'),
(34, 'Augmentez votre DPI et votre AIM lors de chacune de vos tâches de CREWMATE <br>grâce à ce tapis de souris AMONG US et à sa couverture en caoutchouc <br>ultralégere pour une précision et un confort maximaux.\n');

-- --------------------------------------------------------

--
-- Structure de la table `description_type`
--

DROP TABLE IF EXISTS `description_type`;
CREATE TABLE IF NOT EXISTS `description_type` (
  `type` varchar(50) DEFAULT NULL,
  `texte` varchar(400) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `description_type`
--

INSERT INTO `description_type` (`type`, `texte`) VALUES
('plush', 'Profitez ici de nos peluches douces et soyeuses. Soyez accompagné en tout temps d\'un <br>CREWMATE de votre couleur préférée vous rappelant le célèbre jeu vidéo de <br>déduction et de trahison multijoueur et multiplateforme Among Us.<br>'),
('cosplay', 'Seul ou en famille, incarnez en grandeur nature les personages du célèbre jeu de <br>déduction et de trahison multijoueur et multiplateforme Among Us. Il ne <br>tiendra qu\'à vous de ne pas être suspicieux !<br>\n(attention, ne pas gonfler avec de l\'hélium)\n'),
('clothing', 'Habillez vous de nos vêtements Among Us pour montrer les couleurs du célèbre <br> jeu vidéo de trahison dans la cour de récréation, tout en étant dans un confort <br> maximal.\n'),
('other', 'Profitez de nos meilleurs accessoires aux couleurs du jeu vidéo de trahison multiplatforme <br> Among Us. Équipez votre bureau d\'affiches et de tapis de souris <br>Among Us pour jouer dans les meilleures conditions.\n');

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `favorites`
--

INSERT INTO `favorites` (`product_id`, `user_id`) VALUES
(23, 4),
(22, 4),
(21, 4);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `userid` int DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `num_carte` int DEFAULT NULL,
  `expiration` varchar(50) DEFAULT NULL,
  `cvc` int DEFAULT NULL,
  `num_commande` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`userid`, `name`, `email`, `adresse`, `pays`, `ville`, `num_carte`, `expiration`, `cvc`, `num_commande`) VALUES
(4, '', 'manchon.clara@gmail.com', '26 AVENUE ALFRED SAUVY', 'France', 'PERPIGNAN', 0, '09/23', 569, 0),
(4, 'Manchon Clara', 'manchon.clara@gmail.com', 'Chez moi', 'France', 'Perpignan', 2147483647, '01/23', 123, 0),
(4, 'Manchon Clara', 'manchon.clara@gmail.com', 'Chez moi', 'France', 'Perpignan', 2147483647, '10/25', 159, 1);

-- --------------------------------------------------------

--
-- Structure de la table `products`
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
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`NAME`, `QUANT`, `PRICE`, `COLOR`, `TYPE`, `IDDET`) VALUES
('CREWMATE rouge cosplay GONFLABLE', 200, 9499, 'rouge', 'cosplay', 11),
('CREWMATE rose cosplay GONFLABLE', 199, 9499, 'rose', 'cosplay', 12),
('CREWMATE bleu cosplay GONFLABLE', 200, 9501, 'bleu', 'cosplay', 13),
('CREWMATE orange cosplay GONFLABLE', 200, 9499, 'orange', 'cosplay', 14),
('CREWMATE cyan cosplay GONFLABLE', 197, 9999, 'cyan', 'cosplay', 15),
('Pack familial CREWMATE cosplay GONFLABLES', 198, 35999, 'Pack multiple', 'cosplay', 16),
('Hoodie & Jogging IMPOSTORS AMONG US pour garçon', 199, 3999, 'rouge', 'clothing', 21),
('T-shirt ANGELIC CREWMATE pour fille', 198, 1599, 'blanc', 'clothing', 22),
('Casquette AMONG US AMONG US pour enfant à taille unique', 199, 1724, 'noir', 'clothing', 23),
('Pack 6 mini CREWMATE édition spéciale CHAPEAU', 148, 4999, 'Pack multiple', 'plush', 1),
('Pack 6 mini CREWMATE édition standard', 850, 2500, 'Pack multiple', 'plush', 2),
('Pack 6 mini CREWMATE LÉGENDAIRES édition LIMITÉE', 5, 24590, 'Pack multiple', 'plush', 3),
('Pack 6 mini CREWMATE LÉGENDAIRES édition SPÉCIALE', 50, 19999, 'Pack multiple', 'plush', 4),
('CREWMATE cyan peluche', 1500, 2015, 'cyan', 'plush', 5),
('CREWMATE rouge peluche', 1500, 1995, 'rouge', 'plush', 6),
('CREWMATE noir peluche', 1500, 1998, 'noir', 'plush', 7),
('CREWMATE rose peluche', 1500, 1999, 'rose', 'plush', 8),
('CREWMATE blanc peluche', 1499, 1993, 'blanc', 'plush', 9),
('CREWMATE jaune peluche', 1500, 1999, 'jaune', 'plush', 10),
('Mug CREWMATE rouge sculpté', 200, 2499, 'rouge', 'other', 31),
('Mug BEZOS ETAIT L’IMPOSTEUR blanc', 200, 999, 'blanc', 'other', 32),
('Poster de jeu AMONG US IMPOSTOR', 200, 999, 'noir', 'other', 33),
('Tapis de souris AMONG US', 200, 1499, 'noir', 'other', 34);

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `identifiant`) VALUES
(4, 'Manchon Clara', 'manchon.clara@gmail.com', 'motdepasse', 'cmanchon'),
(1, '  admin', 'admin@gmail.com', 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
