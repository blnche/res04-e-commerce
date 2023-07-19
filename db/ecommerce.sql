-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db.3wa.io
-- Généré le : mer. 19 juil. 2023 à 11:28
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1-log
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kevinqeraca_ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'science-fiction'),
(2, 'horreur');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders-products`
--

CREATE TABLE `orders-products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `url_media` varchar(2047) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `category_id`, `url_media`) VALUES
(156, 'The Fellowship of the Ring', '11.99', 'Histoire débordante', 1, 'https://i.goopics.net/5i6n9v.jpg'),
(157, 'Le-Maitre-du-Haut-Chateau', '12.99', 'lorem ipsum', 2, 'https://i.goopics.net/j3efro.jpg'),
(158, 'Misery', '20.99', 'Lorem ipsum', 1, 'https://i.goopics.net/39vdfx.jpg'),
(159, 'Pars-vite', '10.99', 'Reviens tard, oublie les enfants à vie', 1, 'https://i.goopics.net/nvtsds.jpg'),
(160, 'La guerre des mondes', '10.99', 'Les mondes sont en guerre appelez Superman', 2, 'https://i.goopics.net/o6fhvu.jpg'),
(161, 'La divine vérité', '20.99', 'Qu\'est\'ce que la vérité ? Pas Macron', 2, 'https://i.goopics.net/xm5j8k.jpg'),
(162, 'Chroniques martiennes', '30.99', 'Les martiens sur la tête de Magomed', 1, 'https://i.goopics.net/mxy29m.jpg'),
(163, 'La huitième couleur', '30.99', 'Les dents de Gargamel, la neuvième couleur en inédit', 1, 'https://i.goopics.net/sjwlu7.jpg'),
(164, 'Le nuage de l\'Atlas', '100.99', 'Je comprends rien au titre', 2, 'https://i.goopics.net/yfvqnu.jpg'),
(165, 'Da-Vinci code', '20.99', 'Da-Vinci ou Javascript code', 1, 'https://i.goopics.net/p8187d.jpg'),
(166, 'Ensemble c\'est tout', '15.99', 'Brisé, c\'est tout', 1, 'https://i.goopics.net/dx27k3.jpg'),
(167, 'La horde de contrevent', '20', 'Contrevent et tempête', 2, 'https://i.goopics.net/clq62p.jpg'),
(168, 'Harry Potter & la pierre philosophale', '300,00', 'Le prix est hardcore', 1, 'https://i.goopics.net/rxdp3m.jpg'),
(169, 'Hunger Games', '30.00', 'Hunger Games & Hungry James', 2, 'https://i.goopics.net/cvqwhh.jpg'),
(170, 'PHP 5 cours & exercices', '24.99', 'PHP pour les nazes de fou', 2, 'https://i.goopics.net/o5laik.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(4, 'a', 'a', 'toutestpret@hotmail.com', 'popo'),
(5, 'lolo', 'lolo', 'lolo@hotmail.fr', 'lolo12'),
(6, 'lolo', 'lolo', 'lolo@test.fr', 'lolo'),
(7, 'Kevin', 'Corvaisier', 'kevin.corvaisier@3wa.io', 'oil');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-id` (`user_id`);

--
-- Index pour la table `orders-products`
--
ALTER TABLE `orders-products`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `orders-products`
--
ALTER TABLE `orders-products`
  ADD CONSTRAINT `orders-products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
