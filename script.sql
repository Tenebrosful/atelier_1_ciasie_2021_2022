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

CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, client_name VARCHAR(255) NOT NULL, client_adress VARCHAR(255) NOT NULL, client_email VARCHAR(255) NOT NULL, client_phone VARCHAR(255) NOT NULL, total_price DOUBLE PRECISION NOT NULL, delivered TINYINT(1) NOT NULL, paid TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;

CREATE TABLE productorder (product_id INT NOT NULL, order_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_25E4C1224584665A (product_id), INDEX IDX_25E4C1228D9F6D38 (order_id), PRIMARY KEY(product_id, order_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;

CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, producer_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, url_img VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, amount_unit DOUBLE PRECISION NOT NULL, unit VARCHAR(255) NOT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), INDEX IDX_D34A04AD89B658FE (producer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;

CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;

CREATE TABLE producer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, url_img VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;

ALTER TABLE productorder ADD CONSTRAINT FK_25E4C1224584665A FOREIGN KEY (product_id) REFERENCES product (id);
ALTER TABLE productorder ADD CONSTRAINT FK_25E4C1228D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id);
ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id);
ALTER TABLE product ADD CONSTRAINT FK_D34A04AD89B658FE FOREIGN KEY (producer_id) REFERENCES producer (id);

INSERT INTO `producer` (`id`, `name`, `adress`, `email`, `phone`, `url_img`, `description`) VALUES
(1, 'Ferme du Bocage', '2 rue des rouliers', 'afnu49s069@temporary-mail.net', '0745616542', 'https://hlbedition.com/wp-content/uploads/2019/03/logo-LFCC-01.png','Petite ferme sympa'),
(2, 'EARL Vauti', '14 rue de leglise', '7u5fzlejetv@temporary-mail.net', '0715264857', 'https://thumbs.dreamstime.com/z/conception-de-logo-ferme-cru-avec-le-symbole-grange-140759530.jpg','Une boîte qui produit en balle'),
(3, 'M.petit', '2 rue du chateau', 'e9txjt64s8b@temporary-mail.net', '0698764356', 'https://cocktail-graphic.com/wp-content/uploads/2017/11/Logo-FERME-AULNAYS.jpg','Un producteur cool');

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Produit Laitier', 'Produits issue du lait'),
(2, 'Légume', 'Légumes');

INSERT INTO `product` (`id`, `category_id`, `producer_id`,`name`, `price`, `amount_unit`, `unit`, `description`, `url_img`) VALUES
(1, 1, 1, 'Lait BIO', '0.80', '1', 'l', 'Lait BIO produit dans une ferme par des chèvre unijambiste', 'https://catalog-media.lafourche.fr/naturavenir-lait-de-vache-entier-sterilise-france-bio-075litre-582b89986c4a51bcce48d0e231168537d59b67c4.png?width=1080&quality=75'),
(2, 1, 2, 'Crème fraiche BIO', '7.20', '20', 'cl', 'Crème fraiche mais trop', 'https://panieronaturel.com/wp-content/uploads/2020/01/cr%C3%A8me-fraiche.jpg'),
(3, 2, 3, 'Navet BIO', '2', '1', 'kg', 'Navet', 'https://www.meillandrichardier.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/4/4/4461-4462-navet_de_nancy-ho-tg171102.jpg');

INSERT INTO `order` (`id`, `client_name`, `client_adress`, `client_email`, `client_phone`, `total_price`,`delivered`, `paid` ) VALUES
(1, 'BLOT', '8 rue des Rouliers', 'tristan.blot@7.com', '0674954544', '25', 1,1),
(2, 'DUPONT', '26 boulevard des Colombes', 'dupoint@orange.com', '0774951544', '12', 0,1),
(3, 'TULIPE', '12 AVENUE DES TRUITES', 'bellefleur@hotmail.fr', '0774951544', '19', 0,0);

INSERT INTO `productorder` (`order_id`, `product_id`, `quantity`) VALUES
(1, 1, 4),
(2, 1, 4),
(1, 2, 3);