-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 27 juin 2022 à 00:02
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
-- Base de données : `basketball`
--

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `coach_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `nom_famille` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `Equipe_idEquipe` int(11) NOT NULL,
  PRIMARY KEY (`coach_id`),
  KEY `fk_Coach_Equipe1_idx` (`Equipe_idEquipe`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`coach_id`, `nom`, `nom_famille`, `Equipe_idEquipe`) VALUES
(1, 'Steve ', 'Kerr', 1),
(2, 'Nick ', 'Nurse', 1),
(3, 'Gregg', 'Popovich', 1),
(4, 'Tyronn ', 'Lue', 3),
(5, 'Darvin ', 'Ham', 2);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `idEquipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_Equipe` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `ville_idville` int(11) NOT NULL,
  PRIMARY KEY (`idEquipe`),
  KEY `fk_Equipe_ville1_idx` (`ville_idville`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`idEquipe`, `nom_Equipe`, `ville_idville`) VALUES
(1, 'Raptors', 1),
(2, 'Lakers', 2),
(3, 'Clippers', 2),
(4, 'Golden State Warriors', 4),
(5, 'Spurs', 3);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `numero_Joeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `nom_famille` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `2PA` int(11) DEFAULT NULL COMMENT '2-Point Field Goal Attempts',
  `2P` int(11) DEFAULT NULL COMMENT '-Point Field Goals',
  `3P` int(11) DEFAULT NULL COMMENT ' 3-Point Field Goals',
  `3PA` int(11) DEFAULT NULL,
  `AST` int(11) DEFAULT NULL COMMENT 'Assists',
  `BLK` int(11) DEFAULT NULL COMMENT 'Blocks ',
  `Equipe_idEquipe` int(11) NOT NULL,
  PRIMARY KEY (`numero_Joeur`),
  KEY `fk_Joueur_Equipe1_idx` (`Equipe_idEquipe`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`numero_Joeur`, `nom`, `nom_famille`, `2PA`, `2P`, `3P`, `3PA`, `AST`, `BLK`, `Equipe_idEquipe`) VALUES
(1, 'scottie ', 'barnes', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Stephen ', 'Curry', NULL, NULL, NULL, NULL, NULL, NULL, 4),
(3, 'Kawhi ', 'Leonard', NULL, NULL, NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `idville` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idville`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`idville`, `nom`) VALUES
(1, 'Toronto'),
(2, 'Los Angeles'),
(3, 'san diego'),
(4, 'san francisco'),
(5, 'Boston'),
(10, 'Quebec'),
(11, 'Laval');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `fk_Coach_Equipe1` FOREIGN KEY (`Equipe_idEquipe`) REFERENCES `equipe` (`idEquipe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `fk_Equipe_ville1` FOREIGN KEY (`ville_idville`) REFERENCES `ville` (`idville`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `fk_Joueur_Equipe1` FOREIGN KEY (`Equipe_idEquipe`) REFERENCES `equipe` (`idEquipe`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
