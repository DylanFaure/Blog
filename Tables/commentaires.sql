-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 14 sep. 2020 à 12:52
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_billet` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(4, 2, 'Thibault', 'Super ! J\'adore le PHP et le MySQL !', '2020-09-14 14:15:29'),
(3, 1, 'Administrateur', 'Bienvenu a vous sur le blog !', '2020-09-14 14:14:29'),
(2, 1, 'Maxime', 'Bonjour ! Je viens d\'arriver sur ce super blog !', '2020-09-14 14:13:11'),
(1, 1, 'Jean', 'Bienvenu sur le blog, j\'ai posté un billet afin de parler de PHP et de MySQL ! N\'hésitez pas à venir commenté.', '2020-09-14 14:13:11'),
(5, 1, 'Robert', 'Super ce blog, et déjà quelques billets ouvert !', '2020-09-14 14:16:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
