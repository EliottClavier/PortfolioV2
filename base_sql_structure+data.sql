-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : db5000295668.hosting-data.io
-- Généré le : mer. 19 fév. 2020 à 20:24
-- Version du serveur :  5.7.28-log
-- Version de PHP : 7.0.33-0+deb9u7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs288834`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_mail` varchar(100) NOT NULL,
  `lastConnection` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `admin_name`, `admin_password`, `admin_mail`, `lastConnection`) VALUES
(1, 'Eliott', 'c621ae084d531df2a87556224c194060ffc24a089a0a7343090786abb6c87f1eb555c8ec37c5e4c2d9a3b8fe89a891d7110510695f1aa3828a5a1ffb223eb583zDL92hgFv7gcuEEcLFdzbdvAKshr12iStr4VhzDt', 'eliott.clavier@students.campus.academy', '2020-02-19 17:16:36'),
(2, 'campusacademy', '58d2b3134f368844c8526a6392ef2f9f2e51e9879e0b48c5757740a783df9c7a8333398683fb4cc3e6e63c79c5b229701815589d1977b8ba24dbbabf0f02268bSQgiRyOA+GVC8WfCmET/S+pcQk3fVKQiVt1uif8FthOxg7mJ2kb9G14eyA==', 'test@test.fr', '2020-02-17 21:49:45');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
