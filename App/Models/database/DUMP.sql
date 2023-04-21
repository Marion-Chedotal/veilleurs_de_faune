-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 avr. 2023 à 10:30
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `veilleursdefaune`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `idAccount` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`idAccount`, `pseudo`, `email`, `password`, `role`) VALUES
(1, 'mache2023', 'mache@kercode.fr', '$2y$10$rseeJ2sJVMYyFJSrrqlZ5u6fgXlczdonsnhm84.1JcyRKoMmWUmuG', 1),
(2, 'unveilleurdu29', 'unveilleurdu29@gmail.com', '$2y$10$eaak8jQSGZUwLa7YzMStUuf8ru3nGFIrmAu6P9ndvtX/2SpiTcZgG', 0),
(3, 'Louvissadu35', 'louvissa@gmail.com', '$2y$10$h60KPjLiTfMh2m97dLYjIeP3/3y1x81p/NK6tswbawRdRU81p0Luq', 0),
(4, 'Romydu22', 'romy@kercode.com', '$2y$10$jLEZY56b9CK2bPTWMmvN6OhaHgKuJ/jbCI3TFA4k1F1P4qfOF6Z26', 0),
(9, 'azerty123', 'azerty123@gmail.com', '$2y$10$KwoD6z7cmkXMy594MLn9ZOeI0rvvAtaTjqkYsRQrtdgD3LPDJNFh.', 0);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `pictureCredit` varchar(255) DEFAULT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idCategory`, `name`, `picture`, `pictureCredit`, `content`) VALUES
(1, 'Amphibiens', 'categorie_amphibiens.jpg', 'Zeteny Lisztes via Unsplash ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'Crustacés', 'categorie_crustaces.jpg', 'David Clode via Unsplash', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 'Insectes', 'categorie_insectes.jpg', 'Yuichi Kageyama via Unsplash', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'Mammifères', 'categorie_mammiferes.jpg', 'Radoslaw Prekurat via Unsplash', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 'Oiseaux', 'categorie_oiseaux.jpg', 'Bryan Hanson via Unsplash', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(6, 'Poissons', 'categorie_poissons.jpg', 'Aaron Burden via Unsplash', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(7, 'Reptiles', 'categorie_reptiles.jpg', 'Aaron Fernando via Unsplash', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idContact`, `lastName`, `firstName`, `email`, `topic`, `message`) VALUES
(1, 'Allain', 'Albert', 'allainalbert@gmail.com', 'Demande information', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'Hello', 'Evelyne', 'evelyn56@gmail.com', 'Aperçu Triton crêté!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 'Petit', 'Romy', 'romy@kercode.com', 'Volontariat?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'Bernard', 'Albanc', 'albanc@gmail.com', 'Doute espèce', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Structure de la table `observation`
--

CREATE TABLE `observation` (
  `idObservation` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `department` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `counting` int(11) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `pictureCredit` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `idSpecies` int(11) NOT NULL,
  `idAccount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `observation`
--

INSERT INTO `observation` (`idObservation`, `date`, `department`, `location`, `counting`, `picture`, `pictureCredit`, `comments`, `idSpecies`, `idAccount`) VALUES
(1, '2023-03-16 01:30:00', 'Morbihan (56)', 'Vannes', 3, 'l_arthur_grandrhinolophe.jpg', 'Laurent Arthur Association Chauve qui peut', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 6, 1),
(2, '2023-04-25 14:30:00', 'Finistère (29)', 'Ile-Molène', 10, 'Halichoerus grypus2.jpg', 'Pedro Lastra via Unsplash', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 5, 2),
(3, '2023-04-17 08:35:00', 'Ille-et-Vilaine (35)', 'Redon', 2, 'boloria_selene.jpg', 'Dylan Hunter via Unsplash', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 3, 3),
(4, '2023-04-11 10:05:00', 'Côtes d&#039;Armor (22)', 'Dinan', 1, 'phragmite_aquatique_oiseaux.jpg', 'bryan hanson via unsplash', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 9, 3),
(5, '2023-03-27 07:30:00', 'Côtes d&#039;Armor (22)', 'Erquy', 1, 'tritoncrete.jpg', 'Alexandre Roux01 via VisualHunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `species`
--

CREATE TABLE `species` (
  `idSpecies` int(11) NOT NULL,
  `scientificName` varchar(50) NOT NULL,
  `commonName` varchar(50) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `pictureCredit` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `bretagneStatus` varchar(250) NOT NULL,
  `franceStatus` varchar(50) DEFAULT NULL,
  `worldStatus` varchar(250) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `diet` text NOT NULL,
  `threats` text NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `species`
--

INSERT INTO `species` (`idSpecies`, `scientificName`, `commonName`, `picture`, `pictureCredit`, `content`, `bretagneStatus`, `franceStatus`, `worldStatus`, `height`, `weight`, `diet`, `threats`, `idCategory`) VALUES
(1, 'Triturus cristatus', 'Triton crêté', 'triton_crete_amphibiens.jpg', 'Alexandre Roux01 via VisualHunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'VU: Vulnérable', 'NT: Quasi-menacée', 'LC: Préocuppation mineure', 14, 15, 'Petits mollusques, vers, larves diverses, têtards', 'Traitements phytosanitaires, Eutrophisation de l&#039;eau\r\nDestruction de l&#039;habitat: Curage de fossés ou mares sans précaution \r\nIntroduction de poissons carnivores dans les mares où vivent les tritons', 1),
(2, 'Austropotamobius pallipes', 'Écrevisse à pattes blanches', 'ecrevisse_crustaces.jpg', 'Fédération de pêche 33 via INPN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'EN: En danger', 'VU: Vulnérable', 'EN: En danger', 12, 90, 'Petits vertébrés (vers, mollusques) \r\nTêtards de grenouilles, petit poisson. \r\nVégétaux terrestres et aquatiques', 'Dégradation de l&#039;habitat: incision, colmatage, travaux\r\nPollution de l&#039;eau \r\nIntroduction d’espèces compétitrices de l’écrevisse infestées de la peste de l’écrevisse (Aphanomycose).', 2),
(3, 'Coenagrion pulchellum', 'Agrion exclamatif', 'agrion_exclamatif_insectes.jpg', 'Gailhampshire via Visualhunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'EN: En danger', 'VU: Vulnérable', 'LC: Préocuppation mineure', 36, 15, 'petits invertébrés et proies volantes (diptères)', 'Pisciculture intensive détruisant les herbiers aquatiques \r\nPollution des eaux', 3),
(4, 'Plebejus idas', 'Azuré du Genêt', 'azure_genet_insectes.jpg', 'Volesandfriends via Visualhunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'EN: En danger', 'LC: Préocuppation mineure', 'NA: Non-applicable', 30, 15, 'nectar des fleurs, les chenilles dévorent les plantes hôtes.', 'Destructions de leur habitat: fertilisation, drainage\r\nAtteintes à leur capacité de dispersion, \r\nPesticides', 3),
(5, 'Phoca vitulina', 'Phoque veau-marin', 'phoque_mammiferes.jpg', 'J. Maughn via VisualHunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'EN: En danger', 'NT: Quasi-menacée', 'LC: Préocuppation mineure', 150, 85, 'Poissons, crustacés et de céphalopodes (calmars). \r\nLes jeunes se nourrissent de crabes et de crevettes', 'Pollution (hydrocarbures, PCB, ML)\r\nDérangements humains pendant la période de lactation et reproduction qui survient l&#039;été.\r\nVictime de capture accidentelle par la pêche\r\nMaladies virales', 4),
(6, 'Rhinolophus ferrumequinum', 'Grand Rhinolophe', 'rhinolophe_mammiferes.jpg', 'Thomas Cuypers via VisualHunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'EN: En danger', 'LC: Préocuppation mineure', 'LC: Préocuppation mineure', 6, 22, 'lépidoptères, coléoptères, hyménoptères, diptères, trichoptères', 'Dérangement par l&#039;homme (éclairage), \r\nPesticides, \r\nModification des paysages et de son habitat du à l&#039;agriculture intensive', 4),
(8, 'Fratercula arctica', 'Macareux moine', 'macareux_moine_oiseaux.jpg', 'Jessica Pamp via Unsplash', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'CR: En danger critique', 'CR: En danger critique', 'VU: Vulnérable', 27, 425, 'Le macareux moine se nourrit quasi exclusivement de petits poissons (hareng, sprat, capelan, lançon). Il se nourrit aussi de petits crustacés (crevettes), de mollusques et de vers polychètes.', 'Pollution lumineuse, qui perturbe les poussins et les conduise à une mort certaine.\r\nProlifération et introduction de prédateurs (goéland, rat).\r\nMenace directe: chasse et braconnage \r\nChangements climatiques : tempêtes, chaleurs extrêmes.', 5),
(9, 'Acrocephalus paludicola', 'Phragmite aquatique', 'phragmite_aquatique_oiseaux.jpg', 'Nik Borrow via VisualHunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'EN: En danger', 'CR: En danger critique', 'LC: Préocuppation mineure', 13, 12, 'insectivore : puceron, odonate, araignée, sauterelles', 'assèchement zones humides, insecticides, inondation marais, urbanisation, dégradation généralisée de l’habitat', 5),
(10, 'Anguilla anguilla', 'Anguille européenne', 'anguille_poissons.jpg', 'Piqsels', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'CR: En danger critique', 'CR: En danger critique', 'CR: En danger critique', 60, 2, 'crustacés, les mollusques, les polychètes, les échinodermes et les herbiers marins', 'Surpêche et le braconnage \r\nPollution des cours d’eau (plomb de chasse contenant de l’arsenic et de l’antimoine)\r\nObstacles aux migrations (barrages, écluses,…) : freinant sa migration; essentielle à sa reproduction.\r\nDisparition des zones humides et donc de son habitat', 6),
(11, 'Alosa alosa', 'Grande Alose', 'grande_alose_poissons.jpg', 'Piqsels', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'EN: En danger', 'CR: En danger critique', 'LC: Préocuppation mineure', 60, 1500, 'larves d’insectes aquatiques, crustacés du zooplancton', 'Pollution, centrales électriques qui aspirent les alevins, altération de l’habitat, construction de barrages', 6),
(12, 'Vipera berus', 'Vipère péliade', 'vipere_reptiles.jpg', 'Piqsels', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'EN: En danger', 'VU: Vulnérable', 'LC: Préocuppation mineure', 60, 150, 'Petits rongeurs (souris, mulots, etc) et autres petits mammifères comme les musaraignes, régime \r\nalimentaire qu&#039;elle agrémentera à l&#039;occasion d&#039;autres reptiles, d&#039;amphibiens et de petits oiseaux.', 'Destruction de son habitat: zones humides, landes.', 7),
(13, 'Natrix maura', 'Couleuvre vipérine', 'couleuvre_reptiles .jpg', 'Wildlife and Nature Photos via VisualHunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'VU: Vulnérable', 'LC: Préocuppation mineure', 'NT: Quasi-menacée', 80, 220, 'proies aquatiques, essentiellement des poissons, mais aussi des amphibiens (grenouilles et rainettes). Sur terre, elle chasse des vers de terre et des petits mammifères.', 'Perte des proies : introduction d’espèces invasives et pollution de l’eau réduisant le nombre de proies aquatiques.\r\nChasse et braconnage,', 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`idAccount`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `pseudo` (`pseudo`) USING BTREE;

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`);

--
-- Index pour la table `observation`
--
ALTER TABLE `observation`
  ADD PRIMARY KEY (`idObservation`),
  ADD KEY `observation_ibfk_2` (`idAccount`),
  ADD KEY `observation_ibfk_1` (`idSpecies`);

--
-- Index pour la table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`idSpecies`),
  ADD UNIQUE KEY `scientificName` (`scientificName`),
  ADD KEY `idCategory` (`idCategory`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `idAccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `observation`
--
ALTER TABLE `observation`
  MODIFY `idObservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `species`
--
ALTER TABLE `species`
  MODIFY `idSpecies` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `observation`
--
ALTER TABLE `observation`
  ADD CONSTRAINT `observation_ibfk_1` FOREIGN KEY (`idSpecies`) REFERENCES `species` (`idSpecies`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `observation_ibfk_2` FOREIGN KEY (`idAccount`) REFERENCES `account` (`idAccount`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `species`
--
ALTER TABLE `species`
  ADD CONSTRAINT `species_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
