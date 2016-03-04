-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Février 2016 à 10:00
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tp2-fredlamirande-francoissavard`
--
CREATE DATABASE IF NOT EXISTS `tp2-fredlamirande-francoissavard` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tp2-fredlamirande-francoissavard`;

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouter_client`(IN `nom` varchar(50),IN `prenom` varchar(50),IN `adresse` varchar(50),IN `ville` varchar(50),IN `province` varchar(40),IN `codePostal` varchar(7),IN `login` varchar(20),IN `motPasse` varchar(40),IN `email` varchar(50))
BEGIN
	INSERT INTO clients (nom,prenom,adresse,ville,province,codePostal,login,motPasse,email) VALUES (nom,prenom,adresse,ville,province,codePostal,login,motPasse,email);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouter_commande`(IN `vdate` datetime,IN `vstatut` varchar(50),IN `vtypePaiement` varchar(50),IN `vnoClient` int)
BEGIN
	INSERT INTO commandes (date,statut,typePaiement,noClient) VALUES (vdate,vstatut,vtypePaiement,vnoClient);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouter_item_commande`(IN `vnoCommande` int,IN `vnoProduit` int,IN `vqte` int)
BEGIN
	INSERT INTO items_commande (noCommande,noProduit,qte) VALUES (vnoCommande,vnoProduit,vqte);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_client_par_login`(IN `vlogin` varchar(20))
BEGIN
	SELECT * FROM clients WHERE login=vlogin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_client_par_login_passe`(IN `vlogin` varchar(20),IN `vmotPasse` varchar(40))
BEGIN
	SELECT * FROM clients WHERE login=vlogin AND motPasse=vmotPasse;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_client_par_no`(IN `vno` int(11))
BEGIN
	SELECT * FROM clients WHERE no=vno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_commandes`(IN `vnoClient` int)
BEGIN
	SELECT * FROM commandes WHERE noClient=vnoClient ORDER BY no DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_items_commande`(IN `vnoCommande` int)
BEGIN
	SELECT * FROM items_commande WHERE noCommande=vnoCommande;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_produit`(IN `vno` int)
BEGIN
	SELECT * FROM produits WHERE no=vno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_produits_par_nom`(IN `vnom` varchar(50))
BEGIN
    SET @champ := CONCAT('%',LOWER(TRIM(vnom)),'%');
	SELECT * FROM produits WHERE nom LIKE @champ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lister_clients`()
BEGIN
SELECT * FROM clients;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lister_commandes`()
BEGIN
SELECT * FROM commandes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lister_items_commande`(IN `vno` int)
BEGIN
SELECT * FROM items_commande WHERE noCommande=vno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lister_panier`()
BEGIN
SELECT * FROM panier;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lister_produits`()
BEGIN
SELECT * FROM produits;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifier_client`(IN `vnom` varchar(50),IN `vprenom` varchar(50),IN `vadresse` varchar(50),IN `vville` varchar(50),IN `vprovince` varchar(40),IN `vcodePostal` varchar(7),IN `vlogin` varchar(20),IN `vmotPasse` varchar(40),IN `vemail` varchar(50))
BEGIN
	UPDATE clients SET nom = vnom,prenom = vprenom,adresse=vadresse,ville=vville,province=vprovince,codePostal=vcodePostal,motPasse=vmotPasse,email=vemail WHERE login = vlogin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifier_commande`(IN `vno` int,IN `vdate` datetime,IN `vstatut` varchar(50),IN `vtypePaiement` varchar(50),IN `vnoClient` int)
BEGIN
	UPDATE commandes SET date = vdate,statut = vstatut,typePaiement=vtypePaiement,noClient=vnoClient WHERE no = vno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifier_item_commande`(IN `vnoCommande` int,IN `vnoProduit` int,IN `vqte` int)
BEGIN
	UPDATE items_commandes SET qte=vqte WHERE noCommande = vnoCommande AND noProduit = vnoProduit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifier_qte_produit`(IN `vno` int,IN `vqte` int)
BEGIN
	UPDATE produits SET qte = vqte WHERE no = vno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supprimer_item_commande`(IN `vnoCommande` int,IN `vnoProduit` int)
BEGIN
	DELETE FROM items_commande WHERE noCommande=vnoCommande AND noProduit=vnoProduit;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `province` varchar(40) NOT NULL,
  `codePostal` char(7) NOT NULL,
  `login` varchar(20) NOT NULL,
  `motPasse` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`no`, `nom`, `prenom`, `adresse`, `ville`, `province`, `codePostal`, `login`, `motPasse`, `email`) VALUES
(1, 'Savoie', 'Nicolas', '1051 calédonie', 'Québec', 'Québec', 'G3K2J9', 'savoien', 'f5bfef141093e4d6e5f9aedbd1edd4068e3fb1ed', 'savoien@gmail.com'),
(2, 'Michaud', 'Pierre', '123 rue du Cachalot', 'Québec', 'Québec', 'G4K2J9', 'michaudp', '82010cc0c97c04329c5d53aa69cf82f2df157c1a', 'michaudp@gmail.com'),
(3, 'Paré', 'Luc', '342 rue des chats', 'Québec', 'Québec', 'G4S3F3', 'parel', '5c17d449e65b506233f7f89fd3b060252f93a0ff', 'parel@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `statut` varchar(50) NOT NULL,
  `typePaiement` varchar(50) NOT NULL,
  `noClient` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `items_commande`
--

CREATE TABLE IF NOT EXISTS `items_commande` (
  `noCommande` int(11) NOT NULL,
  `noProduit` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`noCommande`,`noProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `noProduit` int(11) NOT NULL,
  `noSession` varchar(50) NOT NULL,
  `qte` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prix` decimal(7,2) NOT NULL,
  `qte` int(11) NOT NULL,
  `dateParution` date NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`no`, `nom`, `description`, `prix`, `qte`, `dateParution`, `image`) VALUES
(1, 'Tapis de Souris Gamer Joe', 'Magnifique tapis de souris de compétition au couleur de votre site web préféré', '19.99', 999, '2016-02-24', '/images/tapissouris.jpg'),
(2, 'Tee-shirt Gamer Joe', 'Montrer votre appartenance au meilleur site sur les jeux vidéo au Québec', '29.99', 999, '2016-02-24', '/images/tshirt.jpg'),
(3, 'Tasse Gamer Joe', 'Soyez allumer en jouant à votre jeux préféré avec un superbe contenant Gamer Joe', '14.99', 999, '2016-02-24', '/images/mug.jpg'),
(4, 'Moniteur 21 pouces Gamer Joe', 'Voyez les plus petits détails grâce au moniteur Gamer Joe et assurez-vous d''être le meilleur sur le serveur', '299.99', 999, '2016-02-24', '/images/moniteur.jpg'),
(5, 'Clavier de compétition Gamer JOe', 'Le plus précis et le plus rapide des clavier mécanique', '149.99', 999, '2016-02-24', '/images/clavier.jpg'),
(6, 'Souris optique avec fil Gamer Joe', 'Pour le plus grand nombre de "click" à la seconde, cette souris va vous permettre d''être au sommet des classements', '174.99', 999, '2016-02-24', '/images/souris.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
