-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 06 avr. 2022 à 14:50
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
-- Base de données : `iia`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `identifier` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `promotion_identifier` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`identifier`),
  UNIQUE KEY `idetudiant_UNIQUE` (`identifier`),
  KEY `fk_etudiant_promotion_idx` (`promotion_identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`identifier`, `name`, `firstName`, `promotion_identifier`) VALUES
(148, 'Astier', 'Simon', 3),
(149, 'Schwarzenegger', 'Arnold', 3),
(150, 'Séchan', 'Renaud', 3),
(151, 'Hallyday', 'Johnny', 4),
(152, 'Sylvester', 'Stallone', 4),
(153, 'Reynold', 'Ryan', 4),
(154, 'Johansson', 'Scarlett', 4),
(155, 'Watson', 'Emma', 5),
(156, 'Stone', 'Emma', 5),
(157, 'Cuoco', 'Kaley', 5),
(158, 'Elis', 'Tom', 5),
(159, 'German', 'Lauren', 5),
(160, 'Reeves', 'Keanu', 6),
(161, 'Parsons', 'Jim', 6),
(162, 'De Niro', 'Robert', 6),
(163, 'Dujardin', 'Jean', 6),
(164, 'Lamy', 'Alexandra', 6),
(165, 'Statham', 'Jason', 6),
(166, 'Berléand', 'François', 6),
(167, 'Robbie', 'Margot', 7),
(168, 'Lawrence', 'Martin', 7),
(169, 'Holly', 'Marie Combs', 7),
(170, 'Milano', 'Alyssa', 7),
(171, 'Courtenet', 'Cox', 7),
(172, 'Aniston', 'Jennifer', 7),
(173, 'Kudrow', 'Lisa', 7),
(174, 'Leblanc', 'Matt', 7),
(175, 'Perry', 'Matthew', 7),
(176, 'Schwimmer', 'David', 7),
(177, 'Gadot', 'Gal', 7),
(178, 'Clooney', 'George', 7),
(179, 'Roberts', 'Julia', 7),
(199, 'Louis', 'Michel', 3),
(200, 'DUPOND', 'Jean-Charle', 4),
(202, 'Vandam', 'Jean-Claude', 2),
(203, 'Tran', 'Henry', 8);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `identifier` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  PRIMARY KEY (`identifier`),
  UNIQUE KEY `identifier_UNIQUE` (`identifier`),
  UNIQUE KEY `label_UNIQUE` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`identifier`, `label`) VALUES
(8, 'Anciens Elèves'),
(3, 'BTS A1'),
(4, 'BTS A2'),
(1, 'BTS E1'),
(2, 'BTS E2'),
(18, 'Gens'),
(5, 'L3'),
(6, 'M1'),
(7, 'M2');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk_etudiant_promotion` FOREIGN KEY (`promotion_identifier`) REFERENCES `promotion` (`identifier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
