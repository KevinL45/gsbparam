-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 17 oct. 2019 à 16:40
-- Version du serveur :  5.7.19
-- Version de PHP :  7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsbpara`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` char(3) COLLATE latin1_bin NOT NULL,
  `nom` char(32) COLLATE latin1_bin NOT NULL,
  `mdp` char(32) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `mdp`) VALUES
('1', 'LeBoss', 'TheBest!'),
('2', 'LeChefProjet', 'NearlyTheBest!');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` char(32) COLLATE latin1_bin NOT NULL,
  `libelle` char(32) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
('CH', 'Cheveux'),
('FO', 'Forme'),
('PS', 'Protection Solaire');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numcli` int(11) NOT NULL AUTO_INCREMENT,
  `mdp` char(255) COLLATE latin1_bin NOT NULL,
  `prenom` char(50) COLLATE latin1_bin DEFAULT NULL,
  `nom` char(50) COLLATE latin1_bin DEFAULT NULL,
  `mail` char(60) COLLATE latin1_bin NOT NULL,
  `rue` varchar(60) COLLATE latin1_bin DEFAULT NULL,
  `ville` char(50) COLLATE latin1_bin DEFAULT NULL,
  `cp` char(5) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`numcli`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numcli`, `mdp`, `prenom`, `nom`, `mail`, `rue`, `ville`, `cp`) VALUES
(10, '$2y$10$2v5gCE7jawQMGYQ2O78FjO/lOJ3FnBCbJ4QaLMGUYJLW4A7Z8ME/S', 'lokoka', 'kevin', 'kevin@hotmail.fr', '6 rue de la verniche', 'Boigny', '45760');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` char(32) COLLATE latin1_bin NOT NULL,
  `dateCommande` date DEFAULT NULL,
  `numcli` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_num` (`numcli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `dateCommande`, `numcli`) VALUES
('1101461660', '2011-07-12', 10),
('1101461665', '2011-07-20', 10),
('1101461666', '2019-09-16', 10),
('1101461667', '2019-10-07', 10),
('1101461668', '2019-10-07', 10),
('1101461669', '2019-10-07', 10),
('1101461670', '2019-10-07', 10),
('1101461671', '2019-10-07', 10),
('1101461672', '2019-10-07', 10),
('1101461673', '2019-10-07', 10),
('1101461674', '2019-10-07', 10),
('1101461675', '2019-10-07', 10),
('1101461676', '2019-10-07', 10),
('1101461677', '2019-10-07', 10),
('1101461678', '2019-10-07', 10),
('1101461679', '2019-10-07', 10),
('1101461680', '2019-10-07', 10),
('1101461681', '2019-10-07', 10),
('1101461682', '2019-10-07', 10),
('1101461683', '2019-10-16', 10);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `idCommande` char(32) COLLATE latin1_bin NOT NULL,
  `idProduit` char(32) COLLATE latin1_bin NOT NULL,
  `qte` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCommande`,`idProduit`),
  KEY `I_FK_CONTENIR_COMMANDE` (`idCommande`),
  KEY `I_FK_CONTENIR_Produit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`idCommande`, `idProduit`, `qte`) VALUES
('1101461660', 'p01', 1),
('1101461665', 'f05', 1),
('1101461665', 'p06', 1),
('1101461666', 'c03', 1),
('1101461666', 'c04', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` char(32) COLLATE latin1_bin NOT NULL,
  `description` char(50) COLLATE latin1_bin DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `image` char(100) COLLATE latin1_bin DEFAULT NULL,
  `idCategorie` char(32) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `I_FK_Produit_CATEGORIE` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `description`, `prix`, `image`, `idCategorie`) VALUES
('c02', 'Klorane fibres de lin baume après shampooing', '10.80', 'images/klorane-fibres-de-lin-baume-apres-shampooing-150-ml.jpg', 'CH'),
('c03', 'Weleda Kids 2in1 Shower & Shampoo Orange fruitée', '4.00', 'images/weleda-kids-2in1-shower-shampoo-orange-fruitee-150-ml.jpg', 'CH'),
('c04', 'Weleda Kids 2in1 Shower & Shampoo vanille douce', '4.00', 'images/weleda-kids-2in1-shower-shampoo-vanille-douce-150-ml.jpg', 'CH'),
('c05', 'Klorane Shampooing sec à l\'extrait d\'ortie', '6.10', 'images/klorane-shampooing-sec-a-l-extrait-d-ortie-spray-150ml.png', 'CH'),
('c06', 'Phytopulp mousse volume intense', '18.00', 'images/phytopulp-mousse-volume-intense-200ml.jpg', 'CH'),
('c07', 'Bio Beaute by Nuxe Shampooing nutritif', '8.00', 'images/bio-beaute-by-nuxe-shampooing-nutritif-200ml.png', 'CH'),
('c10', 'Shampoing adidas', '41.11', 'images/adidas', 'CH'),
('f01', 'Nuxe Men Contour des Yeux Multi-Fonctions', '12.05', 'images/nuxe-men-contour-des-yeux-multi-fonctions-15ml.png', 'FO'),
('f02', 'Tisane romon nature sommirel bio sachet 20', '5.50', 'images/tisane-romon-nature-sommirel-bio-sachet-20.jpg', 'FO'),
('f04', 'Futuro sport stabilisateur pour cheville', '26.50', 'images/futuro-sport-stabilisateur-pour-cheville-deluxe-attelle-cheville.png', 'FO'),
('f05', 'Microlife pèse-personne électronique weegschaal', '63.00', 'images/microlife-pese-personne-electronique-weegschaal-ws80.jpg', 'FO'),
('f06', 'Melapi Miel Thym Liquide 500g', '6.50', 'images/melapi-miel-thym-liquide-500g.jpg', 'FO'),
('f07', 'Meli Meliflor Pollen 200g', '8.60', 'images/melapi-pollen-250g.jpg', 'FO'),
('p01', 'Avène solaire Spray très haute protection', '22.00', 'images/avene-solaire-spray-tres-haute-protection-spf50200ml.png', 'PS'),
('p02', 'Mustela Solaire Lait très haute Protection', '17.50', 'images/mustela-solaire-lait-tres-haute-protection-spf50-100ml.jpg', 'PS'),
('p03', 'Isdin Eryfotona aAK fluid', '29.00', 'images/isdin-eryfotona-aak-fluid-100-50ml.jpg', 'PS'),
('p04', 'La Roche Posay Anthélios 50+ Brume Visage', '8.75', 'images/la-roche-posay-anthelios-50-brume-visage-toucher-sec-75ml.png', 'PS'),
('p05', 'Nuxe Sun Huile Lactée Capillaire Protectrice', '15.00', 'images/nuxe-sun-huile-lactee-capillaire-protectrice-100ml.png', 'PS'),
('p06', 'Uriage Bariésun stick lèvres SPF30 4g', '5.65', 'images/uriage-bariesun-stick-levres-spf30-4g.jpg', 'PS'),
('p07', 'Bioderma Cicabio creme SPF50+ 30ml', '13.70', 'images/bioderma-cicabio-creme-spf50-30ml.png', 'PS'),
('ps08', 'Nivea, crème solaire', '4.00', 'images/nivea', 'PS');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `client_num` FOREIGN KEY (`numcli`) REFERENCES `client` (`numcli`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
