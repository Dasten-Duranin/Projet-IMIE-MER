-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 12 Janvier 2015 à 00:25
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdd_mer`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `TypeVoie` varchar(25) DEFAULT NULL,
  `NomVoie` varchar(25) DEFAULT NULL,
  `NumVoie` varchar(25) DEFAULT NULL,
  `CP` char(6) DEFAULT NULL,
  `Ville` varchar(25) DEFAULT NULL,
  `Pays` varchar(25) DEFAULT NULL,
`idAdresse` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`TypeVoie`, `NomVoie`, `NumVoie`, `CP`, `Ville`, `Pays`, `idAdresse`) VALUES
('Rue', 'De Cholet', '48', '49370', 'Bécon les granits', 'France', 1),
('Rue', 'Pré Pigeon', '67', '49100', 'Angers', 'France', 2),
('Rue', 'Gustave Richard', '2', '49500', 'Segré', 'France', 3),
('Rue', 'Saint-Maurille', '7', '49100', 'Angers', 'France', 4),
('Rue', 'Chepa', '4', '49150', 'Saint-Barthélemy-d''Anjou', 'France', 5),
('Rue', '/', '/', '49100', 'Angers', 'France', 6);

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `Classe` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`Classe`) VALUES
('CDPN'),
('CPCSI'),
('DL'),
('IT Start'),
('SISR'),
('T2SI'),
('WMD');

-- --------------------------------------------------------

--
-- Structure de la table `comeleve`
--

CREATE TABLE IF NOT EXISTS `comeleve` (
  `ComEleve` longtext,
`idComEl` int(11) NOT NULL,
  `idEleve` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comentreprise`
--

CREATE TABLE IF NOT EXISTS `comentreprise` (
  `ComEntreprise` longtext,
`idComEn` int(11) NOT NULL,
  `idEntreprise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
  `idDomaine` int(11) NOT NULL,
  `idOffre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`idDomaine`, `idOffre`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
`idDomaine` int(11) NOT NULL,
  `Domaine` varchar(25) DEFAULT NULL,
  `logoDomaine` varchar(100) DEFAULT NULL,
  `TypeDomaine` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`idDomaine`, `Domaine`, `logoDomaine`, `TypeDomaine`) VALUES
(1, 'PHP', 'Public\\img\\LogosDomaines\\LOGO_PHP.png', 'Developpement'),
(2, 'JavaScript', 'Public\\img\\LogosDomaines\\LOGO_JavaScript.png', 'Developpement'),
(3, 'Infrastructure', 'Public\\img\\LogosDomaines\\LOGO_Infrastructure.png', 'Reseau'),
(4, 'HelpDesk', 'Public\\img\\LogosDomaines\\LOGO_HelpDesk.png', 'Reseau'),
(5, 'Html', 'Public\\img\\LogosDomaines\\LOGO_HTML.png', 'Developpement'),
(6, 'css', 'Public\\img\\LogosDomaines\\LOGO_CSS.png', 'Developpement');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE IF NOT EXISTS `eleve` (
`idEleve` int(11) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL,
  `Prenom` varchar(25) DEFAULT NULL,
  `Sexe` varchar(25) DEFAULT NULL,
  `DateNaiss` date DEFAULT NULL,
  `LieuNaiss` varchar(25) DEFAULT NULL,
  `TelEleve` char(14) DEFAULT NULL,
  `EmailEleve` varchar(50) DEFAULT NULL,
  `PhotoProfil` mediumblob,
  `GitHub` varchar(200) DEFAULT NULL,
  `DoYouBuzz` varchar(200) DEFAULT NULL,
  `Linkedin` varchar(200) DEFAULT NULL,
  `Twitter` varchar(200) DEFAULT NULL,
  `Accroche` longtext,
  `Descriptif` longtext,
  `Alternance` tinyint(1) DEFAULT NULL,
  `Stage` tinyint(1) DEFAULT NULL,
  `idAdresse` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `Classe` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`idEleve`, `Nom`, `Prenom`, `Sexe`, `DateNaiss`, `LieuNaiss`, `TelEleve`, `EmailEleve`, `PhotoProfil`, `GitHub`, `DoYouBuzz`, `Linkedin`, `Twitter`, `Accroche`, `Descriptif`, `Alternance`, `Stage`, `idAdresse`, `idUtilisateur`, `Classe`) VALUES
(1, 'LE ROUX', 'Tanguy', 'Homme', '1995-06-26', 'Reims', '06 42 51 13 07', 'leroux.tanguy.51@gmail.com', NULL, '', 'http://www.doyoubuzz.com/tanguy-le-roux', 'https://www.linkedin.com/pub/tanguy-le-roux/aa/982/902', 'https://twitter.com/LE_ROUX_Tanguy', 'hahahahahahahahahahahaha!!!!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 0, 1, 2, 'IT Start'),
(2, 'DUCHEN', 'Guillaume', 'Homme', '1988-04-23', 'Aurillac', '06 51 46 85 95', 'guillaume.duchen@gmail.com', NULL, NULL, NULL, '        fr.linkedin.com/pub/guillaume-duchen/a5/b69/a09', 'https://twitter.com/g__duchen', 'men sana in corpore sano', 'Exercitation velit est est magna ipsum fugiat voluptate duis. Sint cupidatat excepteur elit ea officia nulla occaecat reprehenderit deserunt irure labore quis Lorem. Cillum consectetur esse sit excepteur cupidatat est esse ullamco nisi reprehenderit labore exercitation proident. Et labore cupidatat reprehenderit dolor fugiat nulla ad elit fugiat aliquip id eiusmod exercitation.\r\n', 1, 1, 2, 3, 'IT Start'),
(3, 'DESMARES', 'Sebastien', 'Autre', '1993-11-15', 'Paris', '04 56 46 56 52', 'Seb.desmares@gmail.com', NULL, NULL, NULL, NULL, 'https://twitter.com/93Desmares', 'hahahaha !!', 'Lorem ut eiusmod commodo ad aute et exercitation in laborum proident fugiat incididunt eiusmod et. Occaecat cupidatat irure magna amet ex irure eiusmod excepteur. Consequat deserunt reprehenderit reprehenderit pariatur ea eu ullamco quis duis nulla commodo magna veniam. Ex ullamco minim pariatur duis dolore cupidatat aliqua dolor elit pariatur. Enim nulla eiusmod mollit sint enim consequat laboris ad cupidatat do. Qui eu do tempor culpa Lorem. Ex esse ut minim in deserunt adipisicing occaecat nisi non pariatur fugiat magna.', 1, 1, 3, 4, 'IT Start'),
(4, 'LEPAGE', 'Kévin', 'Femme', '1996-05-15', 'Moncul', '/', 'kekedu49@hotmail.fr', NULL, 'GitHub.com', NULL, NULL, 'https://twitter.com/LepageKe', 'Noob', 'Tapez votre message kikoolol', 1, 1, 5, 6, 'IT Start'),
(5, 'THOUMELIN', 'Floran', 'Homme', '1992-03-18', 'Paris', '05 54 54 56 52', 'floran.thoumelin@gmail.com', NULL, NULL, NULL, 'fr.linkedin.com/pub/floran-thoumelin/5a/33b/87', 'https://twitter.com/Floran_t', 'Floppy est là', 'Bac L...', 0, 0, 6, 7, 'IT Start');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
`idEntreprise` int(11) NOT NULL,
  `LogoEntreprise` varchar(1000) DEFAULT NULL,
  `NomEntreprise` varchar(25) DEFAULT NULL,
  `TelEntreprise` char(14) DEFAULT NULL,
  `FaxEntreprise` char(14) DEFAULT NULL,
  `EmailEntreprise` varchar(50) DEFAULT NULL,
  `DescriptifEntreprise` longtext,
  `Stagiaire` tinyint(1) DEFAULT NULL,
  `Alternant` tinyint(1) DEFAULT NULL,
  `Employe` tinyint(1) DEFAULT NULL,
  `idAdresse` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `LogoEntreprise`, `NomEntreprise`, `TelEntreprise`, `FaxEntreprise`, `EmailEntreprise`, `DescriptifEntreprise`, `Stagiaire`, `Alternant`, `Employe`, `idAdresse`, `idUtilisateur`) VALUES
(1, NULL, 'Web2C', '06 32 84 29 93', '/', 'agence.web2c@gmail.com', 'Tapez votre message', 1, 0, 0, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `fait`
--

CREATE TABLE IF NOT EXISTS `fait` (
  `idDomaine` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fait`
--

INSERT INTO `fait` (`idDomaine`, `idEntreprise`) VALUES
(1, 1),
(2, 1),
(5, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE IF NOT EXISTS `offres` (
`idOffre` int(11) NOT NULL,
  `DateOffre` date NOT NULL,
  `TitreOffre` varchar(150) DEFAULT NULL,
  `DescriptifOffre` longtext,
  `StageOffre` tinyint(1) DEFAULT NULL,
  `AlternanceOffre` tinyint(1) DEFAULT NULL,
  `EmploiOffre` tinyint(1) DEFAULT NULL,
  `idEntreprise` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `offres`
--

INSERT INTO `offres` (`idOffre`, `DateOffre`, `TitreOffre`, `DescriptifOffre`, `StageOffre`, `AlternanceOffre`, `EmploiOffre`, `idEntreprise`) VALUES
(1, '2014-12-18', 'Offre de Stage et d''alternance fictive en développement.', 'Ce poste est tout ce qu''il y a de plus fictif possible, il sert juste à tester et à développer ce site internet qui sert à mettre en relation les entreprises et les élèves de l''IMIE.\r\nCompétences requises :\r\n-CSS\r\n-HTML\r\n-Php\r\n\r\nUne compétence optionnelle mais appréciable serait le JavaScript.\r\n', 1, 1, NULL, 1),
(2, '2015-01-10', 'fake Offer number two', 'Toujours pour tester ce site internet, il me fallait une deuxième offre dans la même entreprise.\r\nPour cette offre nous mettrons plus de compétences en réseau et donc du helpdesk et de l''infrastructure même si ça n''a rien a voir .. :D', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `souhaite`
--

CREATE TABLE IF NOT EXISTS `souhaite` (
  `idDomaine` int(11) NOT NULL,
  `idEleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `souhaite`
--

INSERT INTO `souhaite` (`idDomaine`, `idEleve`) VALUES
(1, 1),
(2, 1),
(5, 1),
(1, 2),
(2, 2),
(6, 2),
(3, 3),
(4, 3),
(4, 4),
(5, 4),
(6, 4),
(1, 5),
(5, 5),
(6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`idUtilisateur` int(11) NOT NULL,
  `Login` varchar(25) DEFAULT NULL,
  `Mdp` varchar(25) DEFAULT NULL,
  `idEleve` int(11) DEFAULT NULL,
  `idEntreprise` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `Login`, `Mdp`, `idEleve`, `idEntreprise`) VALUES
(1, 'Admin', 'Admin', NULL, NULL),
(2, 'TanguyLE_ROUX', 'rest', 1, NULL),
(3, 'GuillaumeDUCHEN', 'imie', 2, NULL),
(4, 'SebastienDESMARES', 'imie', 3, NULL),
(5, 'Web2CJeremy', 'imie', NULL, 1),
(6, 'KévinLEPAGE', 'imie', 4, NULL),
(7, 'FloranTHOUMELIN', 'imie', 5, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
 ADD PRIMARY KEY (`idAdresse`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
 ADD PRIMARY KEY (`Classe`);

--
-- Index pour la table `comeleve`
--
ALTER TABLE `comeleve`
 ADD PRIMARY KEY (`idComEl`), ADD KEY `FK_ComEleve_idEleve` (`idEleve`);

--
-- Index pour la table `comentreprise`
--
ALTER TABLE `comentreprise`
 ADD PRIMARY KEY (`idComEn`), ADD KEY `FK_ComEntreprise_idEntreprise` (`idEntreprise`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
 ADD PRIMARY KEY (`idOffre`,`idDomaine`), ADD KEY `FK_Demande_idDomaine` (`idDomaine`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
 ADD PRIMARY KEY (`idDomaine`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
 ADD PRIMARY KEY (`idEleve`), ADD KEY `FK_Eleve_idAdresse` (`idAdresse`), ADD KEY `FK_Eleve_idUtilisateur` (`idUtilisateur`), ADD KEY `FK_Eleve_Classe` (`Classe`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
 ADD PRIMARY KEY (`idEntreprise`), ADD KEY `FK_Entreprise_idAdresse` (`idAdresse`), ADD KEY `FK_Entreprise_idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `fait`
--
ALTER TABLE `fait`
 ADD PRIMARY KEY (`idDomaine`,`idEntreprise`), ADD KEY `FK_fait_idEntreprise` (`idEntreprise`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
 ADD PRIMARY KEY (`idOffre`), ADD KEY `FK_Offres_idEntreprise` (`idEntreprise`);

--
-- Index pour la table `souhaite`
--
ALTER TABLE `souhaite`
 ADD PRIMARY KEY (`idDomaine`,`idEleve`), ADD KEY `FK_souhaite_idEleve` (`idEleve`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`idUtilisateur`), ADD UNIQUE KEY `idUtilisateur` (`idUtilisateur`), ADD UNIQUE KEY `Login` (`Login`), ADD KEY `FK_Utilisateur_idEleve` (`idEleve`), ADD KEY `FK_Utilisateur_idEntreprise` (`idEntreprise`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
MODIFY `idAdresse` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `comeleve`
--
ALTER TABLE `comeleve`
MODIFY `idComEl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `comentreprise`
--
ALTER TABLE `comentreprise`
MODIFY `idComEn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
MODIFY `idDomaine` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
MODIFY `idOffre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comeleve`
--
ALTER TABLE `comeleve`
ADD CONSTRAINT `FK_ComEleve_idEleve` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`);

--
-- Contraintes pour la table `comentreprise`
--
ALTER TABLE `comentreprise`
ADD CONSTRAINT `FK_ComEntreprise_idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
ADD CONSTRAINT `FK_Demande_idDomaine` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`),
ADD CONSTRAINT `FK_Demande_idOffre` FOREIGN KEY (`idOffre`) REFERENCES `offres` (`idOffre`);

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
ADD CONSTRAINT `FK_Eleve_Classe` FOREIGN KEY (`Classe`) REFERENCES `classes` (`Classe`),
ADD CONSTRAINT `FK_Eleve_idAdresse` FOREIGN KEY (`idAdresse`) REFERENCES `adresse` (`idAdresse`),
ADD CONSTRAINT `FK_Eleve_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
ADD CONSTRAINT `FK_Entreprise_idAdresse` FOREIGN KEY (`idAdresse`) REFERENCES `adresse` (`idAdresse`),
ADD CONSTRAINT `FK_Entreprise_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `fait`
--
ALTER TABLE `fait`
ADD CONSTRAINT `FK_fait_idDomaine` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`),
ADD CONSTRAINT `FK_fait_idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`);

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
ADD CONSTRAINT `FK_Offres_idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`);

--
-- Contraintes pour la table `souhaite`
--
ALTER TABLE `souhaite`
ADD CONSTRAINT `FK_souhaite_idDomaine` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`),
ADD CONSTRAINT `FK_souhaite_idEleve` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
ADD CONSTRAINT `FK_Utilisateur_idEleve` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
ADD CONSTRAINT `FK_Utilisateur_idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
