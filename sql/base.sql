--
-- Structure de la table `oeuvres`
--

CREATE TABLE `oeuvres`
(
    `id`     int(11)     NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Identifiant unique de l\'oeuvre',
    `modele` varchar(50) NOT NULL,
    `marque` varchar(50) NOT NULL,
    `année`  varchar(50) NOT NULL,
    `photo`  varchar(50) NOT NULL,
    `prix`   varchar(50) NOT NULL
) ENGINE = InnoDB;
--
-- Déchargement des données de la table `oeuvres`
--

INSERT INTO `oeuvres` (`id`, `modele`, `marque`, `année`, `photo`, `prix`)
VALUES ('1', 'mustang', 'ford', '1967', 'car1.jpg', 40000);
INSERT INTO `oeuvres` (`id`, `modele`, `marque`, `année`, `photo`, `prix`)
VALUES ('2', 'F40', 'Ferrari', '1950', 'car3.jpg',5000);

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
) ENGINE = InnoDB;


--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`pseudo`, `nom`, `telephone`, `email`, `password`)
VALUES ('kikou', 'kiki', '95436700', 'kikou@gmail.com', '123');
INSERT INTO `visiteurs` (`pseudo`, `nom`, `telephone`, `email`, `password`)
VALUES  ('kik88', 'kiki', '88888', 'kiko@gmail.com', '123');

