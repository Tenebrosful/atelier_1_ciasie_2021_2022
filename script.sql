-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 06 nov. 2021 à 15:36
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lehangar`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Produit Laitier', 'Produits issue du lait'),
(2, 'Légume', 'Légumes'),
(3, 'Fruit', 'Fruit'),
(4, 'Viande', 'Viande'),
(5, 'Poisson', 'Poisson'),
(6, 'Sucrerie', 'Sucrerie');

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` double NOT NULL,
  `delivered` tinyint(1) NOT NULL,
  `paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `client_name`, `client_adress`, `client_email`, `client_phone`, `total_price`, `delivered`, `paid`) VALUES
(1, 'BLOT', '8 rue des Rouliers', 'tristan.blot@7.com', '0674954544', 25, 1, 1),
(2, 'DUPONT', '26 boulevard des Colombes', 'dupoint@orange.com', '0774951544', 12, 0, 1),
(3, 'TULIPE', '12 AVENUE DES TRUITES', 'bellefleur@hotmail.fr', '0774951544', 19, 0, 0),
(4, 'Porayko Geoffrey', '5 rue bellevue', 'random@gmail.com', '0506658974', 59.1, 1, 0),
(5, 'Holher Bastien', '9 rue des pâquerettes ', 'random@gmail.com', '0689742534', 9.77, 1, 0),
(6, 'Dupont Pierre', '20 rue des saucissons 54000 Nancy France', 'random@gmail.com', '0548796525', 60.7, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `producer`
--

CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `producer`
--

INSERT INTO `producer` (`id`, `name`, `description`, `url_img`, `adress`, `email`, `phone`) VALUES
(1, 'Ferme du Bocage', 'Petite ferme sympa', 'https://hlbedition.com/wp-content/uploads/2019/03/logo-LFCC-01.png', '2 rue des rouliers', 'afnu49s069@temporary-mail.net', '0745616542'),
(2, 'EARL Vauti', 'Une boîte qui produit en balle', 'https://thumbs.dreamstime.com/z/conception-de-logo-ferme-cru-avec-le-symbole-grange-140759530.jpg', '14 rue de leglise', '7u5fzlejetv@temporary-mail.net', '0715264857'),
(3, 'M.petit', 'Un producteur cool', 'https://cocktail-graphic.com/wp-content/uploads/2017/11/Logo-FERME-AULNAYS.jpg', '2 rue du chateau', 'e9txjt64s8b@temporary-mail.net', '0698764356');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `producer_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `amount_unit` double NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `producer_id`, `name`, `description`, `url_img`, `price`, `amount_unit`, `unit`) VALUES
(1, 1, 1, 'Lait BIO', 'Lait BIO produit dans une ferme par des chèvre unijambiste', 'https://catalog-media.lafourche.fr/naturavenir-lait-de-vache-entier-sterilise-france-bio-075litre-582b89986c4a51bcce48d0e231168537d59b67c4.png?width=1080&quality=75', 0.8, 1, 'l'),
(2, 1, 2, 'Crème fraiche BIO', 'Crème fraiche mais trop', 'https://panieronaturel.com/wp-content/uploads/2020/01/cr%C3%A8me-fraiche.jpg', 7.2, 20, 'cl'),
(3, 2, 3, 'Navet BIO', 'Navet', 'https://www.meillandrichardier.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/4/4/4461-4462-navet_de_nancy-ho-tg171102.jpg', 2, 1, 'kg'),
(5, 1, 2, 'Comté', 'C\'est un fromage de lait cru de vache, à pâte pressée cuite.', 'https://fromagerie-janin.com/wp-content/uploads/2017/11/fromagerie_janin_338A_comt%C3%A9_extra_16mois.jpg', 11, 1, 'kg'),
(6, 1, 3, 'Yaourt à la fraise', 'Yaourt à la fraise maison fait avec les fraises de ma plantation.', 'https://cache.marieclaire.fr/data/photo/w700_c17/mci/44/yaourt-mondrian.jpg', 2.49, 4, 'pot'),
(7, 2, 1, 'Brocoli', 'Le brocoli appartient à la vaste famille des crucifères, comme tous les autres choux (choux verts, choux rouges, choux-fleurs, choux de Bruxelles...) ainsi que les navets, le cresson et les radis. ', 'https://img.cuisineaz.com/660x660/2018/11/09/i144056-brocolis-au-cookeo.jpeg', 4.5, 1, 'kg'),
(8, 2, 3, 'Courgette', 'La courgette appartient à la famille des cucurbitacées. C\'est une plante potagère qui pousse au sol. Elle saura accompagner vos plat en gratin, poêlée ou encore spaghettis!', 'https://resize.prod.docfr.doc-media.fr/s/1200/img/var/doctissimo/storage/images/fr/www/nutrition/famille-d-aliments/guide-aliments/courgette/7853314-1-fre-FR/courgette.jpg', 1.38, 1, 'courgette'),
(9, 2, 2, 'Aubergine', 'L\'aubergine est un légume-fruit qui sent bon l\'été et le sud. Il en existe diverses variétés, des blanches, des jaunes, des vertes, mais la plus consommée reste celle dont la peau est d\'un violet profond.', 'https://drive.adorprimeur.com/wp-content/uploads/aubergine2-7.jpg', 1.2, 2, 'aubergines'),
(10, 2, 1, 'Poivron', 'Le poivron est un terme souvent utilisé pour caractériser des variétés de piments doux de l\'espèce Capsicum annuum à très gros fruits.', 'https://upload.wikimedia.org/wikipedia/commons/d/de/Capsicum_annuum_fruits_IMGP0049.jpg', 2, 1, 'kg'),
(11, 5, 3, 'Pavés de saumon', 'Saumon pêché à la main dans la Meurthe et Moselle. ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOaTozAc90A7bs438VwwcBVpSskh4ptKzvdQ&usqp=CAU', 31.6, 1, 'kg'),
(12, 5, 3, 'Dos de cabillaud', 'Accompagnez ces dos de cabillaud d\'une poêlée d\'épinards frais, d\'un peu de riz basmati pour absorber le jus de cuisson et vous allez voir comme la simplicité a du bon.', 'https://www.davigel.fr/res/davigel/styles/product/public/media/681888_720x720.jpg?itok=kqmMsQ1p', 12.1, 1, 'filet'),
(13, 3, 2, 'Pomme', 'Pomme', 'https://cdn.futura-sciences.com/buildsv6/images/largeoriginal/f/f/9/ff915bd5e6_50165784_pomme-hot84a1tg-global.jpg', 1.68, 1, 'kg'),
(14, 3, 1, 'Banane', 'Banane', 'https://mycfia.com/webroot/uploads/products/main_photo/K0mdukoCNx1551705518.jpg', 1.67, 1, 'kg'),
(15, 6, 3, 'Nougats', 'Le nougat est une confiserie à base de blanc d\'œuf, de miel et d\'amande.', 'https://www.academiedugout.fr/images/16009/1200-auto/fotolia_53065929_subscription_xxl-copy.jpg?poix=50&poiy=50', 4, 75, 'gr'),
(16, 6, 3, 'Pralines', 'Une praline est une forme de confiserie contenant, au minimum, des arachides - généralement des amandes et des noisettes - et du sucre.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6252D6KUXgYz6rJ5blUydCVs7bcBsvIRtHg&usqp=CAU', 8.95, 200, 'gr'),
(17, 4, 1, 'Rumsteck', 'Enfournez et faites cuire votre rumsteck au four à 220°C (th.7/8) pendant 12 min environ (pour une viande saignante)', 'https://producteur-viande-rey.fr/wp-content/uploads/2019/10/pav%C3%A9-de-rumsteak.jpg', 29.6, 1, 'kg'),
(18, 4, 3, 'Côte de boeuf', 'La côte de bœuf est un morceau de découpe du bœuf. Elle inclut en une seule portion la partie supérieure d\'une côte de l\'animal ainsi que la viande qui la couvre.', 'https://www.papillesetpupilles.fr/wp-content/uploads/2020/06/Co%CC%82te-de-boeuf-crue.jpg', 28.5, 1, 'pièce');

-- --------------------------------------------------------

--
-- Structure de la table `productorder`
--

CREATE TABLE `productorder` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `productorder`
--

INSERT INTO `productorder` (`product_id`, `order_id`, `quantity`) VALUES
(1, 1, 4),
(1, 2, 4),
(1, 4, 2),
(2, 1, 3),
(2, 6, 1),
(3, 6, 3),
(7, 4, 3),
(8, 5, 2),
(10, 5, 1),
(11, 4, 1),
(13, 4, 5),
(14, 5, 3),
(15, 4, 1),
(16, 6, 2),
(17, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `usermanager`
--

CREATE TABLE `usermanager` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `usermanager`
--

INSERT INTO `usermanager` (`id`, `username`, `password`) VALUES
(1, 'employe1', '$2y$10$H4HFT1dmca3.9wi3W73Ko.stLLElXVQPOejMMsGCabLDURXpGx6aO'),
(2, 'employe2', '$2y$10$HJO7yz091RkS2T4fGTfASOnxGrFQ7T3sWXogxUMm1JU8t.Ube/n3S');

-- --------------------------------------------------------

--
-- Structure de la table `userproducer`
--

CREATE TABLE `userproducer` (
  `id` int(11) NOT NULL,
  `producer_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `userproducer`
--

INSERT INTO `userproducer` (`id`, `producer_id`, `username`, `password`) VALUES
(1, 1, 'bocage1u', '$2y$10$H4HFT1dmca3.9wi3W73Ko.stLLElXVQPOejMMsGCabLDURXpGx6aO'),
(2, 2, 'earl1u', '$2y$10$HJO7yz091RkS2T4fGTfASOnxGrFQ7T3sWXogxUMm1JU8t.Ube/n3S'),
(3, 3, 'mpetit1u', '$2y$10$zt99W.2al/GPmbVX.1MpveibLfG89zeSVZCLWzBf1ntlvKxmsIwCi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`),
  ADD KEY `IDX_D34A04AD89B658FE` (`producer_id`);

--
-- Index pour la table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `IDX_25E4C1224584665A` (`product_id`),
  ADD KEY `IDX_25E4C1228D9F6D38` (`order_id`);

--
-- Index pour la table `usermanager`
--
ALTER TABLE `usermanager`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `userproducer`
--
ALTER TABLE `userproducer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD12469DA3` (`producer_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `usermanager`
--
ALTER TABLE `usermanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `userproducer`
--
ALTER TABLE `userproducer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_D34A04AD89B658FE` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`);

--
-- Contraintes pour la table `productorder`
--
ALTER TABLE `productorder`
  ADD CONSTRAINT `FK_25E4C1224584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_25E4C1228D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

--
-- Contraintes pour la table `userproducer`
--
ALTER TABLE `userproducer`
  ADD CONSTRAINT `FK_D34A04AD12469DA3` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
