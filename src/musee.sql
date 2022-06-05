-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 juin 2022 à 21:57
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `musee`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin`
(
    `login`    varchar(50) NOT NULL,
    `password` varchar(50) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `password`)
VALUES ('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `oeuvres`
--

CREATE TABLE `oeuvres`
(
    `code`   varchar(50) NOT NULL,
    `modele` varchar(50) NOT NULL,
    `marque` varchar(50) NOT NULL,
    `année`  varchar(50) NOT NULL,
    `photo`  varchar(50) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Déchargement des données de la table `oeuvres`
--

INSERT INTO `oeuvres` (`code`, `modele`, `marque`, `année`, `photo`)
VALUES ('1', 'mustang', 'ford', '1967', 'car1.jpg'),
       ('kikou', 'kikou', 'kikou', '22', 'car3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs`
(
    `pseudo`    varchar(50) NOT NULL,
    `nom`       varchar(50) NOT NULL,
    `telephone` varchar(50) NOT NULL,
    `email`     varchar(50) NOT NULL,
    `password`  varchar(50) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`pseudo`, `nom`, `telephone`, `email`, `password`)
VALUES ('kikou', 'kiki', '95436700', 'kikou@gmail.com', '123'),
       ('kik88', 'kiki', '88888', 'kiko@gmail.com', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
