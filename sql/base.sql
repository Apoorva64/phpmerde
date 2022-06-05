--
-- Structure de la table `oeuvres`
--

DROP DATABASE musee;
CREATE DATABASE musee;


CREATE TABLE `oeuvres`
(
    `id`     int(11)     NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Identifiant unique de l\'oeuvre',
    `modele` varchar(50) NOT NULL,
    `marque` varchar(50) NOT NULL,
    `annee`  varchar(50) NOT NULL,
    `photo`  varchar(50) NOT NULL,
    `prix`   varchar(50) NOT NULL,
    `likes`  int(11)     DEFAULT 0
) ENGINE = InnoDB;
--
-- Déchargement des données de la table `oeuvres`
--

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('Mustang', 'Ford', '1967', 'car1.jpg', 100000);

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('Shelby Cobra', 'Ford', '1962', 'car2.jpg',300000);

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('F40', 'Ferrari', '1987', 'car3.jpg',2500000);

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('F50', 'Ferrari', '1997', 'car3.1.jpg',2500000);

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('California GT', 'Ferrari', '1950', 'car4.jpg',3000000);

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('911', 'Porsche', '1963', 'car5.jpg',500000);

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('356', 'Porsche', '1954', 'car6.jpg',600000);

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('SL300', 'Mercedes', '1954', 'car7.jpg',3000000);

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('Dolorean', 'DMC', '1976', 'car8.jpg',9999999);

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('Type 57', 'Bugatti', '1933', 'car9.jpg',10000000);

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('DB5', 'Astom Martin', '1963', 'car10.jpg',7500000);

INSERT INTO `oeuvres` (`modele`, `marque`, `annee`, `photo`, `prix`)
VALUES ('Miura', 'Lamborghini', '1966', 'car11.jpg',900000);
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


CREATE TABLE `admin`
(
    `login`     varchar(50) NOT NULL,
    `password`  varchar(50) NOT NULL,
    `pseudo`    varchar(50),
    `nom`       varchar(50),
    `telephone` varchar(50),
    `email`     varchar(50)
);

INSERT INTO `admin` (`login`, `password`, `pseudo`, `nom`, `telephone`, `email`)
VALUES ('admin', 'admin', 'admin', 'admin', 'admin', 'admin');


--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`pseudo`, `nom`, `telephone`, `email`, `password`)
VALUES ('kikou', 'kiki', '95436700', 'kikou@gmail.com', '123');
INSERT INTO `visiteurs` (`pseudo`, `nom`, `telephone`, `email`, `password`)
VALUES ('kik88', 'kiki', '88888', 'kiko@gmail.com', '123');

