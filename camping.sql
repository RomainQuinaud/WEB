-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 04 Mai 2015 à 18:25
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `camping`
--

-- --------------------------------------------------------

--
-- Structure de la table `camping`
--

CREATE TABLE IF NOT EXISTS `camping` (
  `idcamping` int(11) NOT NULL,
  `nomcamping` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `villecamping` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `adressecamping` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `departementcamping` int(2) unsigned zerofill DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table `camping`
--

INSERT INTO `camping` (`idcamping`, `nomcamping`, `villecamping`, `adressecamping`, `departementcamping`) VALUES
(1, 'Les Flots Bleus', 'taratata les bains', '10 rue de la plage', 10);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idcategorie` int(11) NOT NULL,
  `libellecategorie` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `prixcategorie` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `libellecategorie`, `prixcategorie`) VALUES
(1, 'Bungallow', 75),
(2, 'Tente', 40),
(3, 'Caravane', 120);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE IF NOT EXISTS `logement` (
  `idlogement` int(11) NOT NULL,
  `idcategorie` int(5) DEFAULT NULL,
  `nomlogement` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `idcamping` int(11) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`idlogement`, `idcategorie`, `nomlogement`, `idcamping`, `image`) VALUES
(1, 1, 'Requin', 1, '../img/logement/logement_requin.jpg'),
(2, 1, 'Dauphin', 1, '../img/logement/logement_dauphin.jpg'),
(3, 1, 'Baleine', 1, '../img/logement/logement_baleine.jpg'),
(4, 1, 'Manchot', 1, '../img/logement/logement_manchot.jpg'),
(5, 1, 'Calamar', 1, '../img/logement/logement_calamar.jpg'),
(6, 1, 'Phoque', 1, '../img/logement/logement_phoque.jpg'),
(7, 1, 'Méduse', 1, '../img/logement/logement_meduse.jpg'),
(8, 1, 'Corail', 1, '../img/logement/logement_corail.jpg'),
(9, 1, 'Epaulard', 1, '../img/logement/logement_epaulard.jpg'),
(10, 1, 'Marsouin', 1, '../img/logement/logement_marsouin.jpg'),
(11, 2, 'Lion de mer', 1, '../img/logement/logement_lion_de_mer.jpg'),
(12, 2, 'Pieuvre', 1, '../img/logement/logement_pieuvre.jpg'),
(13, 2, 'Étoile de mer', 1, '../img/logement/logement_etoile_de_mer.jpg'),
(14, 2, 'Orque', 1, '../img/logement/logement_orque.jpg'),
(15, 2, 'Mérou céleste', 1, '../img/logement/logement_merou_celeste.jpg'),
(16, 2, 'Baliste strié', 1, '../img/logement/logement_balliste_strie.jpg'),
(17, 2, 'Thon à dents de chien', 1, '../img/logement/logement_thon.jpg'),
(18, 2, 'Poisson Papillon', 1, '../img/logement/logement_poisson_papillon.jpg'),
(19, 2, 'Labre-cigare', 1, '../img/logement/logement_larbre_cigare.jpg'),
(20, 2, 'Grégoire noir', 1, '../img/logement/logement_gregoire_noir.jpg'),
(21, 2, 'Gobie à six tâches', 1, '../img/logement/logement_gobie.jpg'),
(22, 3, 'Balibot rayé', 1, '../img/logement/logement_balibot.jpg'),
(23, 3, 'Murène ondulée', 1, '../img/logement/logement_murene.jpg'),
(24, 3, 'Poisson raton-laveur', 1, '../img/logement/logement_poisson_papillon_raton_laveur.jpg'),
(25, 3, 'Vivaneau à tâche noire', 1, '../img/logement/logement_vivano.jpg'),
(26, 3, 'Poisson-lime gribouillé ', 1, '../img/logement/logement_poisson_lime.jpg'),
(27, 3, 'Poisson faucon de Forster', 1, '../img/logement/logement_poisson_faucon.jpg'),
(28, 3, 'Baliste à joue barrée', 1, '../img/logement/logement_balliste_a_joue.jpg'),
(29, 3, 'Mérou', 1, '../img/logement/logement_merou.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `pourcent_reduc`
--

CREATE TABLE IF NOT EXISTS `pourcent_reduc` (
  `avance` varchar(5) COLLATE utf8_unicode_520_ci NOT NULL DEFAULT '',
  `pourcent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table `pourcent_reduc`
--

INSERT INTO `pourcent_reduc` (`avance`, `pourcent`) VALUES
('0-1', 4),
('10-11', 9),
('12', 10),
('2-3', 5),
('4-5', 6),
('6-7', 7),
('8-9', 8);

-- --------------------------------------------------------

--
-- Structure de la table `prix_periode`
--

CREATE TABLE IF NOT EXISTS `prix_periode` (
  `mois` varchar(30) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `ajout` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table `prix_periode`
--

INSERT INTO `prix_periode` (`mois`, `ajout`) VALUES
('January', 10),
('February', 25),
('February', 25),
('April', 25),
('May', 35),
('June', 35),
('July', 50),
('August', 50),
('August', 35),
('October', 25),
('November', 25),
('December', 15);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `numreservation` int(11) NOT NULL,
  `idUTILISATEUR` int(11) DEFAULT NULL,
  `idlogement` int(11) DEFAULT NULL,
  `datereservation` datetime DEFAULT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`numreservation`, `idUTILISATEUR`, `idlogement`, `datereservation`, `datedebut`, `datefin`) VALUES
(1, 1, 1, '2015-04-25 11:15:05', '2015-07-01', '2015-07-08'),
(9, 1, 1, '2015-05-03 17:40:45', '2015-07-08', '2015-07-15'),
(12, 1, 1, '2015-05-03 22:17:23', '2015-04-25', '2015-05-02'),
(13, 1, 1, '2015-05-04 07:48:00', '2015-04-04', '2015-04-11'),
(14, 2, 2, '2015-05-04 07:50:55', '2015-05-02', '2015-05-09'),
(15, 2, 1, '2015-05-04 07:51:22', '2015-05-02', '2015-05-09');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUTILISATEUR` int(11) NOT NULL,
  `loginUTILISATEUR` varchar(40) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `nomUTILISATEUR` varchar(60) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `prenomUTILISATEUR` varchar(60) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `telephoneUTILISATEUR` int(10) unsigned zerofill DEFAULT NULL,
  `mailUTILISATEUR` varchar(40) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `departementUTILISATEUR` int(3) unsigned zerofill DEFAULT NULL,
  `mdpUTILISATEUR` varchar(100) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUTILISATEUR`, `loginUTILISATEUR`, `nomUTILISATEUR`, `prenomUTILISATEUR`, `telephoneUTILISATEUR`, `mailUTILISATEUR`, `departementUTILISATEUR`, `mdpUTILISATEUR`, `admin`) VALUES
(1, 'ADMIN', 'ADMIN', 'ADMIN', 0000000000, 'admin@admin.com', 000, '$2y$10$W8FT9xv1/.sXchxzsJ3uleAltP6WUSB9Kl6hFH4ArRHkmvWZm8Bkq', 1),
(2, 'Raphaël', 'Hammonais', 'Raphaël', 0102030405, 'raphael@toto.com', 048, '$2y$10$RjlMN7meHW3Soryr/bWO9eYF0wjdvOZ.5fjJPJtDjcfJpERH1FIJe', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `camping`
--
ALTER TABLE `camping`
  ADD PRIMARY KEY (`idcamping`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcategorie`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`idlogement`), ADD UNIQUE KEY `nomlogement` (`nomlogement`), ADD KEY `FK_logement_camping` (`idcamping`), ADD KEY `FK_logement_categorie` (`idcategorie`);

--
-- Index pour la table `pourcent_reduc`
--
ALTER TABLE `pourcent_reduc`
  ADD PRIMARY KEY (`avance`), ADD UNIQUE KEY `unique_avance` (`avance`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`numreservation`), ADD KEY `FK_reservation_utilisateur` (`idUTILISATEUR`), ADD KEY `FK_reservation_logement` (`idlogement`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUTILISATEUR`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `camping`
--
ALTER TABLE `camping`
  MODIFY `idcamping` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `idlogement` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `numreservation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUTILISATEUR` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `logement`
--
ALTER TABLE `logement`
ADD CONSTRAINT `FK_logement_camping` FOREIGN KEY (`idcamping`) REFERENCES `camping` (`idcamping`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_logement_categorie` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
ADD CONSTRAINT `FK_reservation_logement` FOREIGN KEY (`idlogement`) REFERENCES `logement` (`idlogement`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_reservation_utilisateur` FOREIGN KEY (`idUTILISATEUR`) REFERENCES `utilisateur` (`idUTILISATEUR`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
