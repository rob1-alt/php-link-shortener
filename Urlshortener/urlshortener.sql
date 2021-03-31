-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 31 mars 2021 à 21:21
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
-- Base de données : `urlshortener`
--

-- --------------------------------------------------------

--
-- Structure de la table `url_shorten`
--

DROP TABLE IF EXISTS `url_shorten`;
CREATE TABLE IF NOT EXISTS `url_shorten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` tinytext COLLATE utf8_bin NOT NULL,
  `short_code` varchar(50) COLLATE utf8_bin NOT NULL,
  `hits` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `url_shorten`
--

INSERT INTO `url_shorten` (`id`, `url`, `short_code`, `hits`, `added_date`) VALUES
(17, 'https://www.topachat.com/pages/detail2_cat_est_ordinateurs_puis_rubrique_est_wport_puis_ref_est_in20007532.html', '786b0e', 0, '2021-03-31 13:44:28'),
(16, 'https://mega.nz/folder/88U32KpY#Pg-YTgm46zhzLQoB81QXjQ', '8bc588', 0, '2021-03-31 13:12:18'),
(15, 'https://dribbble.com/shots/7102711-Chatbot-flow-design', '6fbb74', 0, '2021-03-31 13:07:35'),
(14, 'https://dribbble.com/search/chatbot', '48b959', 0, '2021-03-31 13:06:44'),
(13, 'https://twitter.com/TopAchat/status/1377229776298070021', '958c2b', 0, '2021-03-31 13:05:55'),
(12, 'https://gist.github.com/ronaldsgailis/3848442', '61455f', 0, '2021-03-31 13:04:24'),
(18, 'https://www.topachat.com/pages/detail2_cat_est_gaming_puis_rubrique_est_wg_pcsou_puis_ref_est_in10114727.html', '7be043', 0, '2021-03-31 13:47:03'),
(19, 'https://www.topachat.com/pages/detail2_cat_est_peripheriques_puis_rubrique_est_w_moni_puis_ref_est_in20008226.html', '78809d', 0, '2021-03-31 13:51:30'),
(20, 'https://twitter.com/hololeanbby/status/1377018010725146624', '8f8786', 0, '2021-03-31 13:55:45'),
(21, 'https://twitter.com/benlitzler', 'c9d328', 0, '2021-03-31 14:02:15'),
(22, 'https://twitter.com/CaminoTV/status/1377248294838153218', '85e591', 0, '2021-03-31 14:05:53'),
(23, 'https://twitter.com/datenosjki/status/1377250669208436745', 'cb801a', 0, '2021-03-31 14:18:02'),
(24, 'https://cdn.discordapp.com/attachments/775104077092618260/826901314671083540/Inscription.php', 'cd5da3', 0, '2021-03-31 19:37:03');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) COLLATE utf8_bin NOT NULL,
  `nom` varchar(25) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(25) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(16) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `pseudo`, `nom`, `prenom`, `email`, `mdp`) VALUES
(4, 'f', 't', 'fz', 'robin@gmail.com', 'test'),
(9, 'robinfefefe', 'pautigny', 'robin', 'robin.lol@gmail.com', 'toto'),
(8, 'robin1121', 'Pautigny', 'fz', 'julien.jgjvjvj@gmail.com', 'toto');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
