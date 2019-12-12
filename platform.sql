-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 12 déc. 2019 à 22:08
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `platform`
--

-- --------------------------------------------------------

--
-- Structure de la table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
CREATE TABLE IF NOT EXISTS `contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `id_card` varchar(300) DEFAULT NULL,
  `id_card_valid` varchar(255) DEFAULT NULL,
  `vital_card` varchar(300) DEFAULT NULL,
  `vital_card_valid` varchar(255) DEFAULT NULL,
  `medical_certif` varchar(300) DEFAULT NULL,
  `medical_certif_valid` varchar(255) DEFAULT NULL,
  `cv` varchar(300) DEFAULT NULL,
  `cv_valid` varchar(255) DEFAULT NULL,
  `criminal_rec` varchar(300) DEFAULT NULL,
  `criminal_rec_valid` varchar(255) DEFAULT NULL,
  `last_modif_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contracts`
--

INSERT INTO `contracts` (`id`, `id_user`, `date_start`, `date_end`, `id_card`, `id_card_valid`, `vital_card`, `vital_card_valid`, `medical_certif`, `medical_certif_valid`, `cv`, `cv_valid`, `criminal_rec`, `criminal_rec_valid`, `last_modif_date`) VALUES
(6, 10, '2019-12-13', '2019-12-20', NULL, NULL, NULL, NULL, 'volunteers_files/Imbert_Mélanie/medical_certif.png', 'waiting', 'volunteers_files/Imbert_Mélanie/cv.jpg', 'waiting', 'volunteers_files/Imbert_Mélanie/criminal_rec.jpg', 'valid', '2019-12-12'),
(8, 12, '2019-12-12', '2019-12-27', 'volunteers_files/test_test/id_card.png', 'valid', 'volunteers_files/test_test/vital_card.png', 'valid', 'volunteers_files/test_test/medical_certif.png', 'valid', 'volunteers_files/test_test/cv.png', 'valid', 'volunteers_files/test_test/criminal_rec.png', 'valid', '2019-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `validation_key` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `validation_key`, `active`) VALUES
(10, 'Imbert', 'Mélanie', 'imbert.mel@gmail.com', '$2y$10$RFr2cbezR6Tb2XEXjvcBl.43A/H1xjMW.Pe3mpwiRRBcgQ.jq0fi.', 'user', '5de7dc4c0a5a8', 'false'),
(12, 'user', 'test', 'user@gmail.com', '$2y$10$RFr2cbezR6Tb2XEXjvcBl.43A/H1xjMW.Pe3mpwiRRBcgQ.jq0fi.', 'user', 'test', '1'),
(13, 'admin', '((', 'admin@gmail.com', '$2y$10$RFr2cbezR6Tb2XEXjvcBl.43A/H1xjMW.Pe3mpwiRRBcgQ.jq0fi.', 'admin', '5df14e1464cd5', '1');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
