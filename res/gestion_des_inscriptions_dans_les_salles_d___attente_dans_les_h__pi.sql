-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2014 at 07:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gestion des inscriptions dans les salles d’attente dans les hôpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerte`
--

CREATE TABLE IF NOT EXISTS `alerte` (
  `NumAlerte` int(11) NOT NULL,
  `TypeEnvoi` text NOT NULL,
  `Date` date NOT NULL,
  `MessageEnvoye` text NOT NULL,
  `numeroPatient` int(11) NOT NULL,
  PRIMARY KEY (`NumAlerte`),
  KEY `numeroClient` (`numeroPatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE IF NOT EXISTS `departements` (
  `ID` int(11) NOT NULL,
  `Nom` text NOT NULL,
  `Specialite` text NOT NULL,
  `ID_H` int(11) NOT NULL,
  `TempsAttente` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_D` (`ID`),
  KEY `ID_D_2` (`ID`),
  KEY `ID_D_3` (`ID`),
  KEY `ID_H` (`ID_H`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`ID`, `Nom`, `Specialite`, `ID_H`, `TempsAttente`) VALUES
(1, 'Anesthesie', '', 1, 0),
(2, 'Biochimie', '', 1, 0),
(3, 'Chirurgie', '', 1, 0),
(4, 'Neurologie', '', 2, 0),
(5, 'Pediatrie', '', 2, 0),
(6, 'Cardiologie', '', 2, 0),
(7, 'Gastroanterologie', 'Gastroanterologie', 3, 0),
(8, 'Genicologie', 'Genicologie', 3, 0),
(9, 'Pediatrie', 'pediatrie', 4, 0),
(10, 'Urologie', 'Urologie', 4, 0),
(11, 'Optometrie', 'Optometrie', 5, 0),
(12, 'Pediatrie', 'Pediatrie', 5, 0),
(13, 'Orthodontie', 'Orthodontie', 6, 0),
(14, 'Radiographie', 'Radiographie', 6, 0),
(15, 'Gastroenterologie', 'Gastroenterologie', 7, 0),
(16, 'Pediatrie', 'Pediatrie', 7, 0),
(17, 'Optometrie', 'Optometrie', 7, 0),
(18, 'Imagerie medicale', '', 1, 0),
(19, 'Medecine dentaire', '', 1, 0),
(20, 'Microbiologie', '', 4, 0),
(21, 'Gynecologie', '', 4, 0),
(22, 'Ophtalmologie', '', 5, 0),
(23, 'Pathologie', '', 1, 0),
(24, 'Pediatrie', '', 1, 0),
(25, 'Pharmacie', '', 1, 0),
(26, 'Psychiatrie', '', 1, 0),
(27, 'Rhumatologie', '', 3, 0),
(28, 'Sommeil', '', 3, 0),
(29, 'Dermatologie', '', 3, 0),
(30, 'Audiologie', '', 3, 0),
(31, 'Ophtalmologie', '', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `evaluer`
--

CREATE TABLE IF NOT EXISTS `evaluer` (
  `numeroPatient` int(11) NOT NULL,
  `ID_D` int(11) NOT NULL,
  `ID_S` int(11) NOT NULL,
  `ID_I` int(11) NOT NULL,
  `DateArrive` datetime NOT NULL,
  `DateService` datetime NOT NULL,
  KEY `NAS` (`numeroPatient`),
  KEY `ID_D` (`ID_D`),
  KEY `ID_S` (`ID_S`),
  KEY `ID_D_2` (`ID_D`),
  KEY `ID_S_2` (`ID_S`),
  KEY `ID_I_2` (`ID_I`),
  KEY `ID_I` (`ID_I`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evaluer`
--

INSERT INTO `evaluer` (`numeroPatient`, `ID_D`, `ID_S`, `ID_I`, `DateArrive`, `DateService`) VALUES
(6, 1, 4, 1, '2014-11-12 05:10:00', '2014-11-12 11:18:00'),
(14, 3, 5, 7, '2014-10-28 06:25:00', '2014-10-28 06:57:00'),
(3, 4, 4, 9, '2014-10-01 08:15:00', '2014-10-01 08:27:00'),
(11, 5, 2, 11, '2014-10-20 10:15:00', '2014-10-20 12:00:00'),
(2, 6, 3, 12, '2014-09-03 04:07:00', '2014-09-03 05:31:00'),
(1, 6, 2, 13, '2013-12-10 09:18:00', '2013-11-10 10:00:00'),
(7, 7, 1, 14, '2014-08-19 13:42:00', '2014-08-19 15:07:00'),
(13, 8, 3, 18, '2014-06-18 13:20:00', '2014-06-18 16:09:00'),
(12, 9, 3, 19, '2014-11-07 09:14:00', '2014-11-07 11:11:00'),
(16, 9, 3, 20, '2014-02-24 08:28:00', '2014-02-24 09:28:00'),
(9, 12, 2, 26, '2014-11-05 00:10:00', '2014-11-05 00:43:00'),
(15, 13, 4, 27, '2014-07-24 12:19:00', '2014-07-24 13:09:00'),
(17, 13, 1, 28, '2014-11-04 12:19:00', '2014-11-04 12:50:00'),
(5, 14, 5, 29, '2014-07-15 12:21:00', '2014-07-15 15:18:00'),
(4, 16, 2, 31, '2014-11-11 18:42:00', '2014-11-11 19:00:00'),
(10, 17, 4, 33, '2014-04-09 04:26:00', '2014-04-09 04:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `hopital`
--

CREATE TABLE IF NOT EXISTS `hopital` (
  `ID` int(11) NOT NULL,
  `Nom` text NOT NULL,
  `Adresse` text NOT NULL,
  `Latitude` varchar(11) NOT NULL,
  `Longitude` varchar(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hopital`
--

INSERT INTO `hopital` (`ID`, `Nom`, `Adresse`, `Latitude`, `Longitude`) VALUES
(1, 'CHU Sainte-Justine', '3175, Chemin de la Cote-Sainte-Catherine, Montreal', '45.50393', '-73.62284'),
(2, 'Hopital chinois de Montreal', '189, avenue Viger Est, Montreal', '45.50944', '-73.55749'),
(3, 'Hopital Notre-Dame du CHUM', '1560, RUE Sherbrooke Est, Montréal', '45.52541', '-73.56454'),
(4, 'Hotel-Dieu du CHUM', '3840, rue Saint-Urbain, Montreal', '45.51416', '-73.57717'),
(5, 'Centre hospitalier de St. Mary', '3830, avenue Lacombe, Montreal', '45.49454', '-73.62525'),
(6, 'Hopital general de Montreal', '1650, avenue Cedar, Montreal', '45.49990', '-73.58614'),
(7, 'Hopital de Lachine', '650, 16e avenue, Lachine', '45.43536', '-73.69320'),
(8, 'Hopital General du Lakeshore', '160, avenue Stillview, Pointe-Claire', '45.44986', '-73.83270'),
(9, 'Hopital de Verdunn', '4000, Boulevard Lasalle, Verdun', '45.46410', '-73.56442'),
(10, 'Hopital Marie Clarac', '3530, boulevard Gouin Est, Montréal-Nord', '45.59067', '-73.64870'),
(11, 'Hopital Catherine Booth de l Armee du Salut', '4375, avenue Montclair, Montreal', '45.46318', '-73.63420'),
(12, 'Hopital Douglas', '6875, boulevard Lasalle, Verdun', '45.44318', '-73.57770'),
(13, 'Hopital du Sacre-Coeur de Montreal', '5400, boulevard Gouin Ouest, Montreal', '45.53260', '-73.71402'),
(14, 'Hopital Louis-H. Lafontaine', '7401, rue Hochelaga, Montreal', '45.5889', '-73.5306'),
(15, 'Hopital Maisonneuve-Rosemont', '5415, boulevard de l Assomption, Montreal', '45.57449', '-73.55866');

-- --------------------------------------------------------

--
-- Table structure for table `infirmiere`
--

CREATE TABLE IF NOT EXISTS `infirmiere` (
  `ID` int(11) NOT NULL,
  `ID_D` int(11) NOT NULL,
  `Nom` text NOT NULL,
  `Prenom` text NOT NULL,
  `Adresse` text NOT NULL,
  `NuméroTel` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_D_2` (`ID_D`),
  KEY `ID_D_3` (`ID_D`),
  KEY `ID` (`ID`),
  KEY `ID_D` (`ID_D`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `infirmiere`
--

INSERT INTO `infirmiere` (`ID`, `ID_D`, `Nom`, `Prenom`, `Adresse`, `NuméroTel`) VALUES
(1, 1, 'Des-Champs', 'Olivier', '4795, Monkland', '5148932564'),
(2, 1, 'Viellerides', 'Claudia', '758, Decarie', '5148796324'),
(3, 1, 'Serious', 'Sam', '4587, Marcel Laurin', '4387845988'),
(4, 2, 'Edgarson', 'Andre', '785, Queen Marry', '5147896325'),
(5, 2, 'Joradotir', 'Amy', '9800, Cote St-Luc', '5148972356'),
(6, 3, 'Paulsen', 'Paul', '687, Cote St-Catherine', '4387985645'),
(7, 3, 'Sahvi', 'vendredie', '789, Chemin de la Tour', '5147896589'),
(8, 4, 'Saint', 'Claude', '7895, Lemieux', '4385678956'),
(9, 4, 'Terras', 'Rania', '968, Avenue Dupuis', '4387985432'),
(10, 5, 'Ultois', 'Richard', '6656, Avenue Bourret', '5148722365'),
(11, 5, 'Poitou', 'Charanteux', '12, Dufferin', '5141234567'),
(12, 6, 'Desharnais', 'Olive', '9781, Edouard-Monpetit', '4387985642'),
(13, 6, 'Rochepierres', 'Simon', '7854, Lemieux', '5148976523'),
(14, 7, 'Poulain', 'Yvette', '778, Vezina', '5148789999'),
(15, 7, 'Lopez', 'Andres', '7899, Mclynn', '4389951234'),
(16, 7, 'Bananeuh', 'Luc', '4512, Mcdonald', '5148981234'),
(17, 8, 'Petrolium', 'British', '4561, Finchley', '5148987521'),
(18, 8, 'Aldo', 'Walace', '5567, Harland', '5148972314'),
(19, 9, 'Pritz', 'Eric', '7856, Peel', '5147236547'),
(20, 9, 'Postal', 'Deux', '1234, Undeuxtroisquatre', '5147896325'),
(21, 10, 'Deabaches', 'Karim', '785, Rue Crossed', '4387894561'),
(22, 10, 'St-Aubin', 'Yvan', '789, Trans Island', '4387214598'),
(23, 10, 'Pirates', 'Johnny', '412, Tartare St', '43852166363'),
(24, 11, 'En-Haut', 'Monter', '111, Pleonasme street', '5147545143'),
(25, 12, 'Gyro', 'Copter', '514, Bell St', '5144385140'),
(26, 12, 'Saadik', 'Bilel', '326, Ferncroft', '4387521695'),
(27, 13, 'Octosylabes', 'Prose', '639, Coolbrook', '438121996'),
(28, 13, 'Grapefruit', 'Tech', '412, Bourret', '4387611867'),
(29, 14, 'Rache', 'Germain', '514, Harland', '4385647985'),
(30, 15, 'Bel Adj Ali', 'Houssem', '4312, Belsize', '5142784963'),
(31, 16, 'Kabba', 'Moustapha', '712, Cleve', '4387751465'),
(32, 16, 'Braun', 'Rounder', '300, Canterbury', '5146895214'),
(33, 17, 'Leblan', 'Felicie', '5217, Deom', '4381285765');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `numeroPatient` int(11) NOT NULL,
  `Nom` text NOT NULL,
  `Prénom` text NOT NULL,
  `NumeroTel` text NOT NULL,
  `Adresse` text NOT NULL,
  `AdresseMail` text NOT NULL,
  `TypeEnvoi` int(11) NOT NULL,
  `NB_MIN` int(11) NOT NULL,
  PRIMARY KEY (`numeroPatient`),
  UNIQUE KEY `NAS` (`numeroPatient`),
  KEY `TypeEnvoi` (`TypeEnvoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`numeroPatient`, `Nom`, `Prénom`, `NumeroTel`, `Adresse`, `AdresseMail`, `TypeEnvoi`, `NB_MIN`) VALUES
(1, 'Ljerka', 'Alexius ', '5147893254', '3248, Hazelwood', 'ALMod@Gobby.com', 1, 3),
(2, 'Galenos', 'Filip', '4387525654', '1278, Wilderton', 'Asap@yaheuh.fr', 2, 5),
(3, 'Pepca', 'Dominika', '4382156669', '12, Plantagenet', 'PepsiDodo@gmail.com', 3, 4),
(4, 'Irenaeus', 'Jure', '5145245143', '13, Northmount', 'jtejure@gmail.ca', 1, 6),
(5, 'Mirjam', 'Hermes', '5147896654', '159, Stirling', 'Mireh@yaheuh.ca', 1, 2),
(6, 'Tryggvi', 'Krikor', '5147986325', '74, Soisson', 'Korkri@Gmel.fr', 2, 4),
(7, 'Herman', 'Boris', '5149657821', '1500, Van Horne', 'HerBro@gmole.com', 3, 5),
(9, 'Anastazija', 'Ptolemaios', '4382659854', '7812, Kent', 'Apop@Dota.eu', 2, 5),
(10, 'Hakob ', 'Branislav', '4385217896', '1240, Darlington', 'KinHaki@Kintama.jp', 2, 8),
(11, 'Euphemia ', 'Bion', '5147833351', '98, Hudson', 'Bionborn@sky.fr', 1, 3),
(12, 'Hakon ', 'Naia', '5143288954', '1203, Chemin Bates', 'thehissilent@gmail.com', 1, 3),
(13, 'Goizeder ', 'Dimitrij', '4385212222', '4102, Mc Gill', 'Dimivitz@Qu8tz.com', 3, 2),
(14, 'Suibhne ', 'Julij', '5142000000', '1020, Mayor', 'subjul@dota.ca', 2, 9),
(15, 'Pinto', 'Horace', '4382136502', '1197, Union', 'Pioh@yahoo.ca', 2, 3),
(16, 'Fermintxo ', 'Lore', '4387219521', '1354, Mansfield', 'likethelore@msn.com', 1, 6),
(17, 'Nikostratos ', 'Ari', '4381257896', '302, Stanley', 'Ariboot@hotmail.com', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `severite`
--

CREATE TABLE IF NOT EXISTS `severite` (
  `ID` int(11) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `severite`
--

INSERT INTO `severite` (`ID`, `Description`) VALUES
(1, 'Tres urgent.'),
(2, 'Urgent.'),
(3, 'Normal.'),
(4, 'Ambulatoire.'),
(5, 'Ambulatoire externe.');

-- --------------------------------------------------------

--
-- Table structure for table `specialite`
--

CREATE TABLE IF NOT EXISTS `specialite` (
  `ID_H` int(11) NOT NULL,
  `Specialite` text NOT NULL,
  KEY `ID_H` (`ID_H`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `typeenvoi`
--

CREATE TABLE IF NOT EXISTS `typeenvoi` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(14) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typeenvoi`
--

INSERT INTO `typeenvoi` (`ID`, `Nom`) VALUES
(1, 'Message'),
(2, 'E-mail'),
(3, 'Appel');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alerte`
--
ALTER TABLE `alerte`
  ADD CONSTRAINT `alerte_ibfk_1` FOREIGN KEY (`numeroPatient`) REFERENCES `patient` (`numeroPatient`);

--
-- Constraints for table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `departements_ibfk_1` FOREIGN KEY (`ID_H`) REFERENCES `hopital` (`ID`);

--
-- Constraints for table `evaluer`
--
ALTER TABLE `evaluer`
  ADD CONSTRAINT `evaluer_ibfk_1` FOREIGN KEY (`numeroPatient`) REFERENCES `patient` (`numeroPatient`),
  ADD CONSTRAINT `evaluer_ibfk_2` FOREIGN KEY (`ID_D`) REFERENCES `departements` (`ID`),
  ADD CONSTRAINT `evaluer_ibfk_3` FOREIGN KEY (`ID_S`) REFERENCES `severite` (`ID`),
  ADD CONSTRAINT `evaluer_ibfk_4` FOREIGN KEY (`ID_I`) REFERENCES `infirmiere` (`ID`);

--
-- Constraints for table `infirmiere`
--
ALTER TABLE `infirmiere`
  ADD CONSTRAINT `infirmiere_ibfk_1` FOREIGN KEY (`ID_D`) REFERENCES `departements` (`ID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`TypeEnvoi`) REFERENCES `typeenvoi` (`ID`);

--
-- Constraints for table `specialite`
--
ALTER TABLE `specialite`
  ADD CONSTRAINT `specialite_ibfk_1` FOREIGN KEY (`ID_H`) REFERENCES `hopital` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
