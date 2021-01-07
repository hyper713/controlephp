-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `VEHICULE_CIRCULATION`;
CREATE DATABASE `VEHICULE_CIRCULATION` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `VEHICULE_CIRCULATION`;

DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modele` varchar(15) NOT NULL,
  `marque` varchar(15) NOT NULL,
  `puissance` varchar(15) NOT NULL,
  `carburant` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `model` (`id`, `modele`, `marque`, `puissance`, `carburant`) VALUES
(1,	'108',	'peugeot',	'4CV',	'Essence'),
(2,	'508',	'peugeot',	'7CV',	'Essence'),
(3,	'308',	'peugeot',	'4CV',	'Essence'),
(4,	'Megane Coupe',	'renault',	'5CV',	'Diesel'),
(5,	'Laguna',	'renault',	'6CV',	'Diesel'),
(6,	'Clio',	'renault',	'4CV',	'Essence'),
(7,	'Rio',	'Kia',	'5CV',	'Essence'),
(8,	'Sorento',	'Kia',	'12CV',	'Diesel');

DROP TABLE IF EXISTS `proprietaire`;
CREATE TABLE `proprietaire` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOM` varchar(15) NOT NULL,
  `PRENOM` varchar(15) NOT NULL,
  `ADRESSE` varchar(50) NOT NULL,
  `CODE_POSTAL` int NOT NULL,
  `VILLE` varchar(15) NOT NULL,
  `TEL` int NOT NULL,
  `ID_VOITURE` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_VOITURE` (`ID_VOITURE`),
  CONSTRAINT `proprietaire_ibfk_1` FOREIGN KEY (`ID_VOITURE`) REFERENCES `voiture` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `proprietaire` (`ID`, `NOM`, `PRENOM`, `ADRESSE`, `CODE_POSTAL`, `VILLE`, `TEL`, `ID_VOITURE`) VALUES
(1,	'Kamili',	'Achraf',	'33 Rue Najib Mahfoud',	20000,	'Casablanca',	4860324,	1),
(2,	'Ouaziz',	'Lamiaa',	'26 Rue Al Qods',	20070,	'Casablanca',	7568302,	2),
(3,	'Jemi',	'Omar',	'13 Rue Rayan',	20000,	'Casablanca',	3976403,	3);

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE `voiture` (
  `id` int NOT NULL AUTO_INCREMENT,
  `immatriculation` varchar(20) NOT NULL,
  `couleur` varchar(15) NOT NULL,
  `kilometrage` int NOT NULL,
  `id_modele` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_modele` (`id_modele`),
  CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`id_modele`) REFERENCES `model` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `voiture` (`id`, `immatriculation`, `couleur`, `kilometrage`, `id_modele`) VALUES
(1,	'WW71329',	'noire',	1907,	8),
(2,	'WW38002',	'rouge',	150,	2),
(3,	'WW92317',	'bleu',	1340,	4);

-- 2021-01-07 13:51:51
