-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 18 fév. 2023 à 13:24
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `account`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `accountnum` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`accountnum`)
) ENGINE=MyISAM AUTO_INCREMENT=86433 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`login`, `password`, `accountnum`) VALUES
('anthony', '$2y$10$1Mb4uehDtuYA7kwRKAtyBe6oGBrJmaGJfrTkaphJa6sl494S16eky', 86430),
('anthony&', '$2y$10$7Trv1JQw8g4BvjPolkXJ4Oq2ruc.AHi3hlC48X06.QIruJGwmE0H6', 86432),
('antoine', '$2y$10$2IsBAlB41fXo5ke3HaICV.8MoQ1z6U5VBR2uFk5JGqArJ9jwq0YGW', 86422),
('corentin', '$2y$10$gkav5/2ZT9oDkBbQ2v8at.XvVkYFCs2u28hhOVCWTtq/gWHdD/122', 86423);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
