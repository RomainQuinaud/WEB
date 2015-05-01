-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 01 Mai 2015 à 14:46
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  camping
--

-- --------------------------------------------------------

--
-- Structure de la table camping
--

CREATE TABLE IF NOT EXISTS camping (
  idcamping int(11) AUTO_INCREMENT NOT NULL,
  nomcamping varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  villecamping varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  adressecamping varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  departementcamping int(2) unsigned zerofill DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table camping
--

INSERT INTO camping (nomcamping, villecamping, adressecamping, departementcamping) VALUES
('Les Flots Bleus', 'taratata les bains', '10 rue de la plage', 10);
INSERT INTO camping (nomcamping, villecamping, adressecamping, departementcamping) VALUES
('La coquille', 'Art attack', '95 rue de l''océan', 13);
INSERT INTO camping (nomcamping, villecamping, adressecamping, departementcamping) VALUES
('Chez Yvette', 'Bures sur l''Yonne', '120 boulevard des palmies', 85);


-- --------------------------------------------------------

--
-- Structure de la table categorie
--

CREATE TABLE IF NOT EXISTS categorie (
  idcategorie int(11) AUTO_INCREMENT NOT NULL,
  libellecategorie varchar(50),
  prixcategorie int(5)
  COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table categorie
--

INSERT INTO categorie (libellecategorie,prixcategorie) VALUES
('Bungallow',50),
('Tente',25),
('Caravane',150);

-- --------------------------------------------------------

--
-- Structure de la table logement
--

CREATE TABLE IF NOT EXISTS logement (
  idlogement int(11) AUTO_INCREMENT NOT NULL,
  idcategorie int(5) DEFAULT NULL,
  nomlogement varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  idcamping int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table logement
--

INSERT INTO logement (idcategorie, nomlogement, idcamping) VALUES
(1, 'La Perruche', 1);

-- --------------------------------------------------------

--
-- Structure de la table prix_periode
--

CREATE TABLE IF NOT EXISTS prix_periode (
  mois varchar(30) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  ajout int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table prix_periode
--

INSERT INTO prix_periode (mois, ajout) VALUES
('Janvier', 10),
('Février', 25),
('Mars', 25),
('Avril', 25),
('Mai', 50),
('Juin', 50),
('Juillet', 100),
('Août', 100),
('Septembre', 50),
('Octobre', 25),
('Novembre', 25),
('Décembre', 50);

-- --------------------------------------------------------

--
-- Structure de la table reservation
--

CREATE TABLE IF NOT EXISTS reservation (
  numreservation int(11) AUTO_INCREMENT NOT NULL,
  idUTILISATEUR int(11) DEFAULT NULL,
  idlogement int(11) DEFAULT NULL,
  datereservation datetime DEFAULT NULL,
  datedebut date DEFAULT NULL,
  datefin date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table reservation
--

INSERT INTO reservation (idUTILISATEUR, idlogement, datereservation, datedebut, datefin) VALUES
(1, 1, '2015-04-25 11:15:05', '2015-07-01', '2015-07-08');

-- --------------------------------------------------------

--
-- Structure de la table utilisateur
--

CREATE TABLE IF NOT EXISTS utilisateur (
  idUTILISATEUR int(11) AUTO_INCREMENT NOT NULL,
  loginUTILISATEUR varchar(40) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  nomUTILISATEUR varchar(60) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  prenomUTILISATEUR varchar(60) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  telephoneUTILISATEUR int(10) unsigned zerofill DEFAULT NULL,
  mailUTILISATEUR varchar(40) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  departementUTILISATEUR int(3) unsigned zerofill DEFAULT NULL,
  mdpUTILISATEUR varchar(100) COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table utilisateur
--

INSERT INTO utilisateur (loginUTILISATEUR, nomUTILISATEUR, prenomUTILISATEUR, telephoneUTILISATEUR, mailUTILISATEUR, departementUTILISATEUR, mdpUTILISATEUR) VALUES
('ADMIN', 'ADMIN', 'ADMIN', 0000000000, 'admin@admin.com', 000, '$2y$10$W8FT9xv1/.sXchxzsJ3uleAltP6WUSB9Kl6hFH4ArRHkmvWZm8Bkq');

--
-- Index pour les tables exportées
--

--
-- Index pour la table camping
--
ALTER TABLE camping
  ADD PRIMARY KEY (idcamping);

--
-- Index pour la table categorie
--
ALTER TABLE categorie
  ADD PRIMARY KEY (idcategorie);

--
-- Index pour la table logement
--
ALTER TABLE logement
  ADD PRIMARY KEY (idlogement), ADD KEY FK_logement_camping (idcamping), ADD KEY FK_logement_categorie (idcategorie);

--
-- Index pour la table reservation
--
ALTER TABLE reservation
  ADD PRIMARY KEY (numreservation), ADD KEY FK_reservation_utilisateur (idUTILISATEUR), ADD KEY FK_reservation_logement (idlogement);

--
-- Index pour la table utilisateur
--
ALTER TABLE utilisateur
  ADD PRIMARY KEY (idUTILISATEUR);


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table logement
--
ALTER TABLE logement
ADD CONSTRAINT FK_logement_camping FOREIGN KEY (idcamping) REFERENCES camping (idcamping),
ADD CONSTRAINT FK_logement_categorie FOREIGN KEY (idcategorie) REFERENCES categorie (idcategorie);

--
-- Contraintes pour la table reservation
--
ALTER TABLE reservation
ADD CONSTRAINT FK_reservation_logement FOREIGN KEY (idlogement) REFERENCES logement (idlogement),
ADD CONSTRAINT FK_reservation_utilisateur FOREIGN KEY (idUTILISATEUR) REFERENCES utilisateur (idUTILISATEUR);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
