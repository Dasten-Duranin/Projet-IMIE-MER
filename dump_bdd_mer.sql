-- MySQL dump 10.13  Distrib 5.6.21, for Win32 (x86)
--
-- Host: localhost    Database: bdd_mer
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adresse` (
  `TypeVoie` varchar(25) DEFAULT NULL,
  `NomVoie` varchar(25) DEFAULT NULL,
  `NumVoie` varchar(25) DEFAULT NULL,
  `CP` char(6) DEFAULT NULL,
  `Ville` varchar(25) DEFAULT NULL,
  `Pays` varchar(25) DEFAULT NULL,
  `idAdresse` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idAdresse`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adresse`
--

LOCK TABLES `adresse` WRITE;
/*!40000 ALTER TABLE `adresse` DISABLE KEYS */;
INSERT INTO `adresse` VALUES ('Rue','De Cholet','48','49370','Bécon les granits','France',1),('Rue','Pré Pigeon','67','49100','Angers','France',2),('Rue','Gustave Richard','2','49500','Segré','France',3),('Rue','Saint-Maurille','7','49100','Angers','France',4),('Boulevard','Ténor','20','202020','Angers','France',8),('Rue','','','','','France',9),('Impasse','lieu dit pas de \'x\'','42','49042','la vie','France',10),('Boulevard','Albert Mallard','49','49070','Angers','France',11),('Rue','','','49000','Angers','France',12),('Place','Soprano','23','49000','Angers','France',13),('Rue','rue des ponts de ce','77 ter','49000','Angers','France',14),('Rue','JAMES WATT','9','49100','Angers','France',15),('Rue','Louis Gain','23','49100','ANGERS','FRANCE',16);
/*!40000 ALTER TABLE `adresse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `Classe` varchar(25) NOT NULL,
  PRIMARY KEY (`Classe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES ('CDPN'),('CPCSI'),('DL'),('IT Start'),('SISR'),('T2SI'),('WMD');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comeleve`
--

DROP TABLE IF EXISTS `comeleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comeleve` (
  `ComEleve` longtext,
  `idComEl` int(11) NOT NULL AUTO_INCREMENT,
  `idEleve` int(11) DEFAULT NULL,
  PRIMARY KEY (`idComEl`),
  KEY `FK_ComEleve_idEleve` (`idEleve`),
  CONSTRAINT `FK_ComEleve_idEleve` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comeleve`
--

LOCK TABLES `comeleve` WRITE;
/*!40000 ALTER TABLE `comeleve` DISABLE KEYS */;
/*!40000 ALTER TABLE `comeleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentreprise`
--

DROP TABLE IF EXISTS `comentreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentreprise` (
  `ComEntreprise` longtext,
  `idComEn` int(11) NOT NULL AUTO_INCREMENT,
  `idEntreprise` int(11) DEFAULT NULL,
  PRIMARY KEY (`idComEn`),
  KEY `FK_ComEntreprise_idEntreprise` (`idEntreprise`),
  CONSTRAINT `FK_ComEntreprise_idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentreprise`
--

LOCK TABLES `comentreprise` WRITE;
/*!40000 ALTER TABLE `comentreprise` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demande`
--

DROP TABLE IF EXISTS `demande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demande` (
  `idDomaine` int(11) NOT NULL,
  `idOffre` int(11) NOT NULL,
  PRIMARY KEY (`idOffre`,`idDomaine`),
  KEY `FK_Demande_idDomaine` (`idDomaine`),
  CONSTRAINT `FK_Demande_idDomaine` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`),
  CONSTRAINT `FK_Demande_idOffre` FOREIGN KEY (`idOffre`) REFERENCES `offres` (`idOffre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demande`
--

LOCK TABLES `demande` WRITE;
/*!40000 ALTER TABLE `demande` DISABLE KEYS */;
INSERT INTO `demande` VALUES (1,1),(1,3),(1,5),(2,1),(2,3),(2,5),(3,2),(4,2),(5,1),(5,3),(5,4),(5,5),(6,1),(6,3),(6,4),(6,5);
/*!40000 ALTER TABLE `demande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domaine` (
  `idDomaine` int(11) NOT NULL AUTO_INCREMENT,
  `Domaine` varchar(25) DEFAULT NULL,
  `logoDomaine` varchar(100) DEFAULT NULL,
  `TypeDomaine` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domaine`
--

LOCK TABLES `domaine` WRITE;
/*!40000 ALTER TABLE `domaine` DISABLE KEYS */;
INSERT INTO `domaine` VALUES (1,'PHP','Public/img/LogosDomaines/LOGO_PHP.png','Developpement'),(2,'JavaScript','Public/img/LogosDomaines/LOGO_JavaScript.png','Developpement'),(3,'Infrastructure','Public/img/LogosDomaines/LOGO_Infrastructure.png','Reseau'),(4,'HelpDesk','Public/img/LogosDomaines/LOGO_HelpDesk.png','Reseau'),(5,'Html','Public/img/LogosDomaines/LOGO_HTML.png','Developpement'),(6,'css','Public/img/LogosDomaines/LOGO_CSS.png','Developpement');
/*!40000 ALTER TABLE `domaine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eleve` (
  `idEleve` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) DEFAULT NULL,
  `Prenom` varchar(25) DEFAULT NULL,
  `Sexe` varchar(25) DEFAULT NULL,
  `DateNaiss` date DEFAULT NULL,
  `LieuNaiss` varchar(25) DEFAULT NULL,
  `TelEleve` char(14) DEFAULT NULL,
  `EmailEleve` varchar(50) DEFAULT NULL,
  `PhotoProfil` varchar(150) DEFAULT NULL,
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
  `Classe` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idEleve`),
  KEY `FK_Eleve_idAdresse` (`idAdresse`),
  KEY `FK_Eleve_idUtilisateur` (`idUtilisateur`),
  KEY `FK_Eleve_Classe` (`Classe`),
  CONSTRAINT `FK_Eleve_Classe` FOREIGN KEY (`Classe`) REFERENCES `classes` (`Classe`),
  CONSTRAINT `FK_Eleve_idAdresse` FOREIGN KEY (`idAdresse`) REFERENCES `adresse` (`idAdresse`),
  CONSTRAINT `FK_Eleve_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eleve`
--

LOCK TABLES `eleve` WRITE;
/*!40000 ALTER TABLE `eleve` DISABLE KEYS */;
INSERT INTO `eleve` VALUES (1,'LE ROUX','Tanguy','Homme','1995-06-26','Reims','06 42 51 13 07','leroux.tanguy.51@gmail.com','Public/img/PhotosEleves/PhotoProfilEleve1.jpg','https://github.com/Dasten-Duranin','','https://www.linkedin.com/pub/tanguy-le-roux/aa/982/902','','hahahahahahahahahahahaha!!!!','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,0,1,2,'IT Start'),(2,'DUCHEN','Guillaume','Homme','1988-04-23','Aurillac','06 51 46 85 95','guillaume.duchen@gmail.com',NULL,'','','        fr.linkedin.com/pub/guillaume-duchen/a5/b69/a09','https://twitter.com/g__duchen','men sana in corpore sano','- Agrandir le champ de saisie du nom d\'entreprise dans la BDD\r\n',1,1,2,3,'IT Start'),(3,'DESMARES','Sebastien','Autre','1993-11-15','Paris','04 56 46 56 52','Seb.desmares@gmail.com',NULL,'','','','https://twitter.com/93Desmares','hahahaha !!','Lorem ut eiusmod commodo ad aute et exercitation in laborum proident fugiat incididunt eiusmod et. Occaecat cupidatat irure magna amet ex irure eiusmod excepteur. Consequat deserunt reprehenderit reprehenderit pariatur ea eu ullamco quis duis nulla commodo magna veniam. Ex ullamco minim pariatur duis dolore cupidatat aliqua dolor elit pariatur. Enim nulla eiusmod mollit sint enim consequat laboris ad cupidatat do. Qui eu do tempor culpa Lorem. Ex esse ut minim in deserunt adipisicing occaecat nisi non pariatur fugiat magna.',1,1,3,4,'IT Start'),(7,'Lepage','Kévin','Autre','0000-00-00','','','lepagekevin@wanadoo.fr',NULL,'','','','','Personne motivée prête à apprendre','Il faudra que vous pensiez aux mentions légales',1,1,9,10,'IT Start'),(8,'grimouille','benJ','Autre','2015-01-09','Angers','0241424242','grimouille42@chomail.con',NULL,'','','','','coucou, tu veux voir ma ****','c moi, je suis de retour ...\r\n\r\ncompétences en doublons = database error\r\nlieu dit pas de \'x\"\r\n\"vous êtes connecté\' sans \'s\" à `connecté`\r\nquand on clique sur [modifier) dans la modification du profil, rediriger vers le profil',1,0,10,11,'IT Start'),(9,'Piednoir','Maxime','Autre','1996-10-30','Angers','0241730576','pmaxime3@gmail.com',NULL,'ma bite','mon cul','8====()','(=)','fesse','J\'aime les fesses !! :3',1,1,11,12,'IT Start'),(10,'Souchu','Laura','Femme','1996-11-28','Le Mans','0670662933','souchu.laura@gmail.com',NULL,'','','','','coucou','Tapez votre message',1,1,12,13,'IT Start'),(11,'GILLAUX','Vincent','Homme','1994-07-23','Héhé','06 31 18 50 45','gillaux.vincent@gmail.com',NULL,'','','','','L\'informatique, c\'est pratique !','Quand tu racontes ta vie à un mexicain, il samba les couilles !',1,1,13,14,'IT Start'),(12,'COHUAU','Camille','Homme','1994-11-20','Montpellier','0665144595','camillecohuau@free.fr',NULL,'','','','','hehehe','photo de profil non affichée, pour la date de naissance mets un type date ;)',1,1,14,15,'IT Start');
/*!40000 ALTER TABLE `eleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entreprise` (
  `idEntreprise` int(11) NOT NULL AUTO_INCREMENT,
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
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEntreprise`),
  KEY `FK_Entreprise_idAdresse` (`idAdresse`),
  KEY `FK_Entreprise_idUtilisateur` (`idUtilisateur`),
  CONSTRAINT `FK_Entreprise_idAdresse` FOREIGN KEY (`idAdresse`) REFERENCES `adresse` (`idAdresse`),
  CONSTRAINT `FK_Entreprise_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entreprise`
--

LOCK TABLES `entreprise` WRITE;
/*!40000 ALTER TABLE `entreprise` DISABLE KEYS */;
INSERT INTO `entreprise` VALUES (1,'Public/img/LogosEntreprises/LogoEntreprise1.png','Web2C','06 32 84 29 93','/','agence.web2c@gmail.com','Agence de création de site web et de serious game.',1,0,0,4,5),(2,NULL,'Progétek','02 41 53 65 89','02 41 53 56 85','contact@progetek.com','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,1,1,8,9),(3,NULL,'Viaduc','02 14 45 65 21','02 14 45 65 20','administration@viaduc.fr','Entreprise de création de site web pour particuliers et professionnels. Nous utilisons et développons des application qui facilitent la création de ces sites internets.',1,0,0,15,16),(4,NULL,'Caisse des dépôts','06 07 08 09 10','01 02 03 04 05','contact@CdC.fr','Le groupe Caisse des Dépôts est un groupe public, investisseur de long terme au service de l’intérêt général et du développement économique du pays.\r\n\r\n \r\n\r\nCréateur de solutions durables, il invente en permanence de nouvelles manières d’appuyer les politiques publiques nationales et locales.',1,1,0,16,17);
/*!40000 ALTER TABLE `entreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fait`
--

DROP TABLE IF EXISTS `fait`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fait` (
  `idDomaine` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  PRIMARY KEY (`idDomaine`,`idEntreprise`),
  KEY `FK_fait_idEntreprise` (`idEntreprise`),
  CONSTRAINT `FK_fait_idDomaine` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`),
  CONSTRAINT `FK_fait_idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fait`
--

LOCK TABLES `fait` WRITE;
/*!40000 ALTER TABLE `fait` DISABLE KEYS */;
INSERT INTO `fait` VALUES (1,1),(2,1),(5,1),(6,1),(1,2),(3,2),(1,3),(2,3),(5,3),(6,3),(1,4),(2,4),(5,4),(6,4);
/*!40000 ALTER TABLE `fait` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offres`
--

DROP TABLE IF EXISTS `offres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offres` (
  `idOffre` int(11) NOT NULL AUTO_INCREMENT,
  `DateOffre` date NOT NULL,
  `TitreOffre` varchar(150) DEFAULT NULL,
  `DescriptifOffre` longtext,
  `StageOffre` tinyint(1) DEFAULT NULL,
  `AlternanceOffre` tinyint(1) DEFAULT NULL,
  `EmploiOffre` tinyint(1) DEFAULT NULL,
  `idEntreprise` int(11) DEFAULT NULL,
  PRIMARY KEY (`idOffre`),
  KEY `FK_Offres_idEntreprise` (`idEntreprise`),
  CONSTRAINT `FK_Offres_idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offres`
--

LOCK TABLES `offres` WRITE;
/*!40000 ALTER TABLE `offres` DISABLE KEYS */;
INSERT INTO `offres` VALUES (1,'2014-12-18','Offre de Stage et d\'alternance fictive en développement.','Ce poste est tout ce qu\'il y a de plus fictif possible, il sert juste à tester et à développer ce site internet qui sert à mettre en relation les entreprises et les élèves de l\'IMIE.\r\nCompétences requises :\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n-CSS\r\n-HTML\r\n-Php\r\n\r\nUne compétence optionnelle mais appréciable serait le JavaScript\r\n',1,1,0,1),(2,'2015-01-10','fake Offer number two','Toujours pour tester ce site internet, il me fallait une deuxième offre dans la même entreprise.\r\nPour cette offre nous mettrons plus de compétences en réseau et donc du helpdesk et de l\'infrastructure même si ça n\'a rien a voir .. :D',0,1,0,1),(3,'2015-01-19','Stage | Développement','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Développement !',1,0,0,2),(4,'2015-01-19','Intégrateur web','Nous cherchons un intégrateur HTML/CSS afin de développé notre quantité de templates à proposer à nos clients.\r\n\r\nSi vous avez des compétences en PHP et javascript ce serait un bon plus pour aider nos équipes de développement web lorsqu\'ils ont beaucoup de travail.',1,0,0,3),(5,'2015-01-19','Gestion de Connaissances','Vous serez en charge de la gestion de bases de données regroupant toutes les connaissances informatiques en possession de la caisse des dépôts.\r\n\r\nDe ce fait vous serez à même d\'aider les gens en apprentissage via la plateforme \"StackOverflow\".',1,1,0,4);
/*!40000 ALTER TABLE `offres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `souhaite`
--

DROP TABLE IF EXISTS `souhaite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `souhaite` (
  `idDomaine` int(11) NOT NULL,
  `idEleve` int(11) NOT NULL,
  PRIMARY KEY (`idDomaine`,`idEleve`),
  KEY `FK_souhaite_idEleve` (`idEleve`),
  CONSTRAINT `FK_souhaite_idDomaine` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`),
  CONSTRAINT `FK_souhaite_idEleve` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `souhaite`
--

LOCK TABLES `souhaite` WRITE;
/*!40000 ALTER TABLE `souhaite` DISABLE KEYS */;
INSERT INTO `souhaite` VALUES (1,1),(2,1),(5,1),(6,1),(1,2),(2,2),(6,2),(3,3),(4,3),(1,7),(2,7),(3,7),(4,7),(5,7),(6,7),(6,8),(1,9),(2,9),(3,9),(4,9),(5,9),(6,9),(1,10),(5,10),(6,10),(1,11),(3,11),(5,11),(6,11),(3,12),(4,12),(5,12),(6,12);
/*!40000 ALTER TABLE `souhaite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(25) DEFAULT NULL,
  `Mdp` varchar(25) DEFAULT NULL,
  `idEleve` int(11) DEFAULT NULL,
  `idEntreprise` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `idUtilisateur` (`idUtilisateur`),
  UNIQUE KEY `Login` (`Login`),
  KEY `FK_Utilisateur_idEleve` (`idEleve`),
  KEY `FK_Utilisateur_idEntreprise` (`idEntreprise`),
  CONSTRAINT `FK_Utilisateur_idEleve` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  CONSTRAINT `FK_Utilisateur_idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'Admin','Admin',NULL,NULL),(2,'TanguyLE_ROUX','rest',1,NULL),(3,'GuillaumeDUCHEN','imie',2,NULL),(4,'SebastienDESMARES','imie',3,NULL),(5,'Web2CJeremy','imie',NULL,1),(7,'FloranTHOUMELIN','imie',NULL,NULL),(9,'progetek','imie',NULL,2),(10,'kevin.LEPAGE','imie',7,NULL),(11,'b.grimouille','babebibobu',8,NULL),(12,'maxime','imie',9,NULL),(13,'Sousou','imie',10,NULL),(14,'vincentG','imie',11,NULL),(15,'camillecohuau','imie',12,NULL),(16,'Viaduc','imie',NULL,3),(17,'CdC','imie',NULL,4);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-29  9:11:44
