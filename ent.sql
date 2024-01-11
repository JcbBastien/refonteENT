-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 11 jan. 2024 à 17:10
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ent`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `absence_id` int NOT NULL AUTO_INCREMENT,
  `time` int NOT NULL,
  `date` date NOT NULL,
  `teacher_id` int NOT NULL,
  `student_id` int NOT NULL,
  `justified` tinyint(1) NOT NULL,
  PRIMARY KEY (`absence_id`)
);

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`absence_id`, `time`, `date`, `teacher_id`, `student_id`, `justified`) VALUES
(5, 5, '2024-01-11', 1, 1, 1),
(6, 3, '2024-01-11', 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `isTeacher` tinyint(1) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`account_id`)
);

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`account_id`, `login`, `password`, `displayName`, `isAdmin`, `isTeacher`, `description`) VALUES
(1, 'admin', '$2y$10$15PKUIZNVUV4Am59pbndAOSEcjEkPy9BTBzn0iRahmGVROMxxpdHi', 'Administrateur', 1, 0, 'Administrateur de la plateforme.'),
(3, 'test', '$2y$10$anu.txrgxtT.MbeKXORza.YpX0PBGAPh86CmM8Mb1RrAQhVet9Rum', 'test', 0, 0, 'test'),
(4, 'prof', '$2y$10$.JvIadyU9hjsOH6Q65WXqOG1hqFeGHPj0JLXtlWXLkuvh5ZbhHHrm', 'prof', 0, 1, 'prof');

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `grade_id` int NOT NULL AUTO_INCREMENT,
  `value` int NOT NULL,
  `subject_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `student_id` int NOT NULL,
  PRIMARY KEY (`grade_id`)
);

--
-- Déchargement des données de la table `grade`
--

INSERT INTO `grade` (`grade_id`, `value`, `subject_id`, `teacher_id`, `student_id`) VALUES
(3, 10, 1, 4, 3),
(7, 10, 1, 1, 1),
(6, 20, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
CREATE TABLE IF NOT EXISTS `recipe` (
  `recipe_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prepare_time` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `image_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`recipe_id`)
);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL,
  `room_number` int NOT NULL,
  PRIMARY KEY (`room_id`)
);

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`room_id`, `status`, `room_number`) VALUES
(1, 0, 120),
(2, 0, 121),
(3, 0, 122),
(4, 0, 123),
(5, 1, 124),
(6, 1, 125),
(7, 1, 126),
(8, 2, 155),
(9, 1, 156),
(10, 2, 157),
(12, 0, 20),
(13, 0, 21),
(14, 0, 22),
(15, 0, 23),
(16, 0, 24);

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`subject_id`)
);

--
-- Déchargement des données de la table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `abreviation`) VALUES
(1, 'la matiere de con', 'sae 69'),
(2, 'bebe', '2'),
(3, 'desfihjgdsfihjgds f', '2453');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
