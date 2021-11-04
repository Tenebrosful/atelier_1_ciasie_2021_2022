-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8100
-- Généré le : lun. 01 nov. 2021 à 18:20
-- Version du serveur :  5.7.24
-- Version de PHP : 8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetcovid`
--

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(11) NOT NULL,
  `amount_unit` decimal(11) NOT NULL,
  `unit` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_phone` int(10) NOT NULL,
  `total_price` decimal(11) NOT NULL,
  `delivred` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE productorder 
(product_id INT NOT NULL, 
order_id INT NOT NULL, 
quantity INT NOT NULL, 
INDEX IDX_25E4C1224584665A (product_id), 
INDEX IDX_25E4C1228D9F6D38 (order_id), 
PRIMARY KEY(product_id, order_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;


CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `url_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;


INSERT INTO `product` (`id`, `name`, `price`, `amount_unit`, `unit`, `description`, `url_img`) VALUES
(1, 'Lait BIO', '0.80', '0.80', '1L', 'Lait BIO produit dans une ferme par des chèvre unijambiste', 'https://catalog-media.lafourche.fr/naturavenir-lait-de-vache-entier-sterilise-france-bio-075litre-582b89986c4a51bcce48d0e231168537d59b67c4.png?width=1080&quality=75'),
(2, 'Crème fraiche BIO', '7.20', '1.80', '20cl', 'Crème fraiche mais trop', 'https://panieronaturel.com/wp-content/uploads/2020/01/cr%C3%A8me-fraiche.jpg'),
(3, 'Navet BIO', '2', '2', '1kg', 'Navet', 'https://www.meillandrichardier.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/4/4/4461-4462-navet_de_nancy-ho-tg171102.jpg');
-


INSERT INTO `order` (`id`, `client_name`, `client_adress`, `client_email`, `client_phone`, `total_price`,`delivred` ) VALUES
(1, 'BLOT', '8 rue des Rouliers', 'tristan.blot@7.com', '0674954544', '25', 1),
(1, 'DUPONT', '26 boulevard des Colombes', 'dupoint@orange.com', '0774951544', '12', 0),
(1, 'TULIPE', '12 AVENUE DES TRUITES', 'bellefleur@hotmail.fr', '0774951544', '19', 0);


INSERT INTO `producer` (`id`, `name`, `adress`, `email`, `phone`, `url_img`) VALUES
(1, 'Ferme du Bocage', '2 rue des rouliers', 'afnu49s069@temporary-mail.net', '0745616542', 'https://hlbedition.com/wp-content/uploads/2019/03/logo-LFCC-01.png'),
(2, 'EARL Vauti', '14 rue de leglise', '7u5fzlejetv@temporary-mail.net', '0715264857', 'https://thumbs.dreamstime.com/z/conception-de-logo-ferme-cru-avec-le-symbole-grange-140759530.jpg'),
(3, 'M.petit', '2 rue du chateau', 'e9txjt64s8b@temporary-mail.net', '0698764356', 'https://cocktail-graphic.com/wp-content/uploads/2017/11/Logo-FERME-AULNAYS.jpg');


INSERT INTO productorder (order_id, product_id, quantity) VALUES
(1, 1, 4),
(2, 1, 4),
(1, 2, 3);
