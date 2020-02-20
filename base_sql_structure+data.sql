-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : db5000295668.hosting-data.io
-- Généré le : mer. 19 fév. 2020 à 22:08
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
-- Base de données : `bdd_portfolio`
--

CREATE DATABASE IF NOT EXISTS bdd_portfolio;

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

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `associated_image_url` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'created'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `url`, `associated_image_url`, `status`) VALUES
(1, 'Portfolio en HTML - CSS', 'Un projet consistant à réaliser son portfolio professionnel à l\'aide des cours suivis en HTML - CSS. Le site que vous consulté actuellement est la suite logique, son évolution et vous pouvez alors constater l\'évolution !', 'https://eliottclavier.github.io/Portfolio/', 'assets/images/projects_images/project_porfolio_html_css', 'completed'),
(2, 'Portfolio avec CodeIgniter', 'Un projet alliant front et back, avec comme support le framweork PHP CodeIgniter, mais aussi jQuery et Boostrap. Ce projet s\'inscrit dans la lignée du projet Portfolio, donc la première phase ne proposait qu\'un prototype HTML - CSS. Le projet est encore en cours car en permanence évolution et de nouvelles fonctionnalités pourraient voir le jour.', '', 'assets/images/projects_images/project_portfolio_v2_code_igniter', 'progress'),
(3, 'Projet PokéAcademy', 'Reliant apprentissage du PHP, de la POO et l\'utilisation des frameworks CodeIgniter, jQuery et Bootstrap, PokéAcademy est un projet de groupe ou chacun apprenant du groupe suivant la formation à pu ajouter sa touche personelle. J\'y ai participé en travaillant sur une des parties du panel administratif gérer de nombreuses entités.', 'https://gitlab.com/Para-FR/ci_para_base/-/tree/master', 'assets/images/projects_images/project_pokeacademy', 'completed'),
(5, 'test', 'test', 'test', 'test', 'offline');

-- --------------------------------------------------------

--
-- Structure de la table `recommend`
--

CREATE TABLE `recommend` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(75) NOT NULL,
  `first_name` varchar(75) NOT NULL,
  `company_name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `date_created` datetime NOT NULL,
  `message_text` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `advancement` tinyint(3) UNSIGNED NOT NULL,
  `associated_color` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id`, `name`, `advancement`, `associated_color`, `category`) VALUES
(1, 'HTML5', 70, '#E44D26', 'language'),
(2, 'CSS3', 70, '#0170BA', 'language'),
(3, 'JS / jQuery', 40, '#E5A228', 'language'),
(4, 'SQL (MariaDB)', 65, '#4479A1', 'language'),
(5, 'Python', 35, '#FFD140', 'language'),
(6, 'PHP', 45, '#777BB3', 'language'),
(7, 'CodeIgniter', 40, '#DD4814', 'language'),
(8, 'XAMPP / WAMP', 80, '#FF0099', 'tool'),
(9, 'phpMyAdmin', 75, '#6C78AF', 'tool'),
(10, 'Visual Studio Code', 70, '#0078D7', 'tool'),
(11, 'PhpStorm', 65, '#FB3191', 'tool'),
(12, 'Git / GitHub', 40, '#171515', 'tool');

-- --------------------------------------------------------

--
-- Structure de la table `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) UNSIGNED NOT NULL,
  `label` varchar(200) NOT NULL,
  `period` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `timeline`
--

INSERT INTO `timeline` (`id`, `label`, `period`, `description`, `category`) VALUES
(1, 'Étudiant en filière informatique (première année) à l\'école Campus Academy Nantes ', 'Depuis septembre 2019', 'Préférence pour le developpement back-end ou applicatif <br>\r\nObjectif du cursus: Obtention d\'un titre RNCP de niveau 2 ', 'formation'),
(2, 'Lycéen en filière générale scientifique au lycée Notre Dame d\'Espérance (Saint-Nazaire) ', '2016 - 2019', 'Baccalauréat mention très bien spécialité Physique-Chimie option Section Européenne <br>', 'formation'),
(3, 'Stage d\'une semaine en informatique (maintenance et réseau), Hôpital intercommunal du pays de Retz, Pornic ', 'Avril 2018', 'Observation des différentes tâches réalisés par un technicien informatique (réseau et développement), des logiciels utilisés et d\'une salle serveur <br>\r\nApport de connaissance sur les thèmes du réseau, du développement, de la protection des données et du monde professionnel <br>\r\nDémontage d\'un ordinateur, installation d’un deuxième écran, installation d’un système d’exploitation et réalisation de mises à jour système sur plusieurs ordinateurs, mise en place temporaire d\'ordinateurs et liaison au réseau de l\'hôpital <br>', 'experience'),
(4, 'Stage d\'une semaine en architecture, Macoretz, Saint-Père-En-Retz ', 'Février 2016', 'Réalisation d\'un modèle 3D d\'une maison à partir de plans d\'architectes <br/>\r\nAppropriation et utilisation de logiciels liés à l\'architecture <br/>\r\nCommunication avec différentes équipes de l\'entreprise <br/>', 'experience');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `recommend`
--
ALTER TABLE `recommend`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
