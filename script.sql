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
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `product` (`id`, `name`, `price`, `amount_unit`, `unit`, `description`) VALUES
(1, 'Lait BIO', '0.80', '0.80', '1L', 'Lait BIO produit dans une ferme par des chèvre unijambiste'),
(2, 'Crème fraiche BIO', '7.20', '1.80', '20cl', 'Crème fraiche mais trop'),
(3, 'Navet BIO', '2', '2', '1kg', 'Navet');
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F06D39705E237E06` (`name`);
  
