-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Ven 10 Janvier 2014 à 19:27
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

--
-- Base de données: lafleur
--

-- --------------------------------------------------------

--
-- Structure de la table administrateur
--

DROP TABLE IF EXISTS administrateur;
CREATE TABLE IF NOT EXISTS administrateur (
  id varchar(3)  NOT NULL,
  nom varchar(32)  NOT NULL,
  mdp varchar(32)  NOT NULL,
  PRIMARY KEY (id)
) ;

--
-- Contenu de la table administrateur
--

INSERT INTO administrateur (id, nom, mdp) VALUES
('1', 'toto', 'toto'),
('2', 'titi', 'titi');

-- --------------------------------------------------------

--
-- Structure de la table categorie
--

DROP TABLE IF EXISTS categorie;
CREATE TABLE IF NOT EXISTS categorie (
  id varchar(32)  NOT NULL,
  libelle varchar(32)  NOT NULL,
  PRIMARY KEY (id)
) ;

--
-- Contenu de la table categorie
--

INSERT INTO categorie (id, libelle) VALUES
('com', 'Composition'),
('fle', 'Fleurs'),
('pla', 'Plantes');

-- --------------------------------------------------------

--
-- Structure de la table commande
--

DROP TABLE IF EXISTS commande;
CREATE TABLE IF NOT EXISTS commande (
  id varchar(32)  NOT NULL,
  dateCommande date NOT NULL,
  nomPrenomClient varchar(32)  NOT NULL,
  adresseRueClient varchar(32)  NOT NULL,
  cpClient varchar(5)  NOT NULL,
  villeClient varchar(32)  NOT NULL,
  mailClient varchar(50)  NOT NULL,
  PRIMARY KEY (id)
) ;

--
-- Contenu de la table commande
--

INSERT INTO commande (id, dateCommande, nomPrenomClient, adresseRueClient, cpClient, villeClient, mailClient) VALUES
('1', '2013-12-11', 'Nom1 Prénom1', 'Adresse 1', '75013', 'Paris', 'pnom1@btssio.priv');

-- --------------------------------------------------------

--
-- Structure de la table contenir
--

DROP TABLE IF EXISTS contenir;
CREATE TABLE IF NOT EXISTS contenir (
  idCommande varchar(32) NOT NULL,
  idProduit varchar(32) NOT NULL,
  quantite decimal(10,2) NOT NULL,
  prix decimal(10,2) NOT NULL,
  PRIMARY KEY (idCommande,idProduit)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table contenir
--

INSERT INTO contenir (idCommande, idProduit, quantite, prix) VALUES
('1', 'c01', '2.00', '53.00'),
('1', 'f02', '2.00', '50.00'),
('1', 'p03', '2.00', '103.00');

-- --------------------------------------------------------

--
-- Structure de la table produit
--

DROP TABLE IF EXISTS produit;
CREATE TABLE IF NOT EXISTS produit (
  id varchar(32)  NOT NULL,
  description varchar(50)  NOT NULL,
  prix decimal(10,2) NOT NULL,
  image varchar(32)  NOT NULL,
  idCategorie varchar(32)  NOT NULL,
  PRIMARY KEY (id)
) ;

--
-- Contenu de la table produit
--

INSERT INTO produit (id, description, prix, image, idCategorie) VALUES
('c01', 'Panier de fleurs vari&eacute;es', '53.00', 'images/compo/aniwa.gif', 'com'),
('c02', 'Coup de charme jaune', '38.00', 'images/compo/kos.gif', 'com'),
('c03', 'Bel arrangement de fleurs de saison', '68.00', 'images/compo/loth.gif', 'com'),
('c04', 'Coup de charme vert', '41.00', 'images/compo/luzon.gif', 'com'),
('c05', 'Tres beau panier de fleurs pr&eacute;cieuses', '98.00', 'images/compo/makin.gif', 'com'),
('c06', 'Bel assemblage de fleurs pr&eacute;cieuses', '68.00', 'images/compo/mosso.gif', 'com'),
('c07', 'Présentation prestigieuse', '128.00', 'images/compo/rawaki.gif', 'com'),
('f01', 'Bouquet de roses multicolores', '58.00', 'images/fleurs/comores.gif', 'fle'),
('f02', 'Bouquet de roses rouges', '50.00', 'images/fleurs/grenadines.gif', 'fle'),
('f03', 'Bouquet de roses jaunes', '78.00', 'images/fleurs/mariejaune.gif', 'fle'),
('f04', 'Bouquet de petites roses jaunes', '48.00', 'images/fleurs/mayotte.gif', 'fle'),
('f05', 'Fuseau de roses multicolores', '63.00', 'images/fleurs/philippines.gif', 'fle'),
('f06', 'Petit bouquet de roses roses', '43.00', 'images/fleurs/pakopoka.gif', 'fle'),
('f07', 'Panier de roses multicolores', '78.00', 'images/fleurs/seychelles.gif', 'fle'),
('p01', 'Plante fleurie', '43.00', 'images/plantes/antharium.gif', 'pla'),
('p02', 'Pot de phalaonopsis', '58.00', 'images/plantes/galante.gif', 'pla'),
('p03', 'Assemblage paysag&eacute;', '103.00', 'images/plantes/lifou.gif', 'pla'),
('p04', 'Belle coupe de plantes blanches', '128.00', 'images/plantes/losloque.gif', 'pla'),
('p05', 'Pot de mitonia mauve', '83.00', 'images/plantes/papouasi.gif', 'pla'),
('p06', 'Pot de phalaonopsis blanc', '58.00', 'images/plantes/pionosa.gif', 'pla'),
('p07', 'Pot de phalaonopsis rose mauve', '58.00', 'images/plantes/sabana.gif', 'pla');


