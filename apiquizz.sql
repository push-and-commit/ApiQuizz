-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 29 Mars 2016 à 15:30
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `apiquizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `manche`
--

CREATE TABLE `manche` (
  `id` int(11) NOT NULL,
  `id_partie` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `question` text NOT NULL,
  `reponse` varchar(50) NOT NULL,
  `points` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `id_theme`, `question`, `reponse`, `points`) VALUES
(1, 1, 'Images/Celebrite/SNOOP_DOGG.jpg', 'SNOOP DOGG', 0),
(2, 1, 'Images/Celebrite/EMMA_WATSON.jpg', 'EMMA WATSON', 0),
(3, 1, 'Images/Celebrite/STEVE_JOBS.jpg', 'STEVE JOBS', 0),
(4, 1, 'Images/Celebrite/ANGELINA_JOLIE.jpg', 'ANGELINA JOLIE', 0),
(5, 1, 'Images/Celebrite/BRAD_PITT.jpg', 'BRAD PITT', 0),
(6, 1, 'Images/Celebrite/TOM_CRUISE.jpg', 'TOM CRUISE', 0),
(7, 1, 'Images/Celebrite/MIKA.jpg', 'MIKA', 0),
(8, 1, 'Images/Celebrite/GAROU.jpg', 'GAROU', 0),
(9, 1, 'Images/Celebrite/KANYE_WEST.jpg', 'KANYE WEST', 0),
(10, 1, 'Images/Celebrite/KIM_KARDASHIAN.jpg', 'KIM KARDASHIAN', 0),
(11, 2, 'Images/Logo/BATMAN.jpg', 'BATMAN', 0),
(12, 2, 'Images/Logo/WINDOWS.jpg', 'WINDOWS', 0),
(13, 2, 'Images/Logo/HONDA.jpg', 'HONDA', 0),
(14, 2, 'Images/Logo/STARBUCKS.png', 'STARBUCKS', 0),
(15, 2, 'Images/Logo/BEATS.png', 'BEATS', 0),
(16, 2, 'Images/Logo/SNAPCHAT.jpg', 'SNAPCHAT', 0),
(17, 2, 'Images/Logo/ANONYMOUS.png', 'ANONYMOUS', 0),
(18, 2, 'Images/Logo/FACEBOOK.jpg', 'FACEBOOK', 0),
(19, 2, 'Images/Logo/PLAYSTATION.png\r\n', 'PLAYSTATION', 0),
(20, 2, 'Images/Logo/JEUX_OLYMPIQUES.png', 'JEUX OLYMPIQUES', 0),
(21, 2, 'Images/Logo/LAYS.jpg', 'LAYS', 0),
(22, 2, 'Images/Logo/MCDONALDS.jpg', 'MCDONALDS', 0),
(23, 2, 'Images/Logo/KFC.jpg', 'KFC', 0),
(24, 2, 'Images/Logo/YOUTUBE.png', 'YOUTUBE', 0),
(25, 2, 'Images/Logo/BMW.png', 'BMW', 0),
(26, 2, 'Images/Logo/PRINGLES.jpg', 'PRINGLES', 0),
(27, 2, 'Images/Logo/SEGA.jpg', 'SEGA', 0),
(28, 2, 'Images/Logo/LACOSTE.jpg', 'LACOSTE', 0),
(29, 2, 'Images/Logo/DREAMWORKS.jpg', 'DREAMWORKS', 0),
(30, 2, 'Images/Logo/DANONE.jpg', 'DANONE', 0),
(31, 2, 'Images/Logo/TOYOTA.jpg', 'TOYOTA', 0),
(32, 2, 'Images/Logo/PINTEREST.jpg', 'PINTEREST', 0),
(33, 2, 'Images/Logo/VOLKSWAGEN.jpg', 'VOLKSWAGEN', 0),
(34, 4, 'Images/Film/ANT_MAN.jpg', 'ANT MAN ', 0),
(35, 4, 'Images/Film/AVENGERS.jpeg', 'AVENGERS ', 0),
(36, 4, 'Images/Film/DAREDEVIL.jpg', 'DAREDEVIL', 0),
(37, 4, 'Images/Film/GAME_OF_THRONES.jpg', 'GAME OF THRONES', 0),
(38, 4, 'Images/Film/GRAVITY.jpeg', 'GRAVITY', 0),
(39, 4, 'Images/Film/HARRY_POTTER.jpg', 'HARRY POTTER', 0),
(40, 4, 'Images/Film/INCEPTION.jpg', 'INCEPTION', 0),
(41, 4, 'Images/Film/LA_LIGNE_VERTE.jpg', 'LA LIGNE VERTE', 0),
(42, 4, 'Images/Film/LE_SEIGNEUR_DES_ANNEAUX.jpg', 'LE SEIGNEUR DES ANNEAUX', 0),
(43, 4, 'Images/Film/LOOPER.jpeg', 'LOOPER', 0),
(44, 4, 'Images/Film/MAD_MAX.jpg', 'MAD MAX', 0),
(45, 4, 'Images/Film/MEN_IN_BLACK.jpg', 'MEN IN BLACK', 0),
(46, 4, 'Images/Film/SEUL_SUR_MARS.jpg', 'SEUL SUR MARS', 0),
(47, 4, 'Images/Film/SHERLOCK_HOLMES.jpeg', 'SHERLOCK HOLMES', 0),
(48, 4, 'Images/Film/STAR_WARS.jpg', 'STAR WARS', 0),
(49, 4, 'Images/Film/SUICIDE_SQUAD.jpg', 'SUICIDE SQUAD', 0),
(50, 4, 'Images/Film/THE_REVENANT.jpg', 'THE REVENANT', 0),
(51, 4, 'Images/Film/WALKING_DEAD.jpeg', 'WALKING DEAD', 0),
(52, 1, 'Images/Celebrite/BRUCE_WILLIS.jpg', 'BRUCE WILLIS', 0),
(53, 3, 'Images/Animaux/CANARD.jpg', 'CANARD', 0),
(54, 3, 'Images/Animaux/LEMURIEN.jpg', 'LEMURIEN', 0),
(55, 3, 'Images/Animaux/LOUP.jpg', 'LOUP', 0),
(56, 3, 'Images/Animaux/PANTHERE_NOIRE.jpg', 'PANTHERE NOIRE', 0),
(57, 3, 'Images/Animaux/HIPPOCAMPE.jpg', 'HIPPOCAMPE', 0),
(58, 3, 'Images/Animaux/OURS.jpg', 'OURS', 0),
(59, 3, 'Images/Animaux/ECUREUIL.jpg', 'ECUREUIL', 0),
(60, 3, 'Images/Animaux/HYENE.jpg', 'HYENE', 0),
(61, 3, 'Images/Animaux/LYNX.jpg', 'LYNX', 0),
(62, 3, 'Images/Animaux/LOUTRE.jpg', 'LOUTRE', 0),
(63, 3, 'Images/Animaux/RHINOCEROS.jpg', 'RHINOCEROS', 0);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `nom` enum('celebrite','logo','animaux','film') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`id`, `nom`) VALUES
(1, 'celebrite'),
(2, 'logo'),
(3, 'animaux'),
(4, 'film');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `manche`
--
ALTER TABLE `manche`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_partie` (`id_partie`),
  ADD KEY `id_theme` (`id_theme`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_theme` (`id_theme`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `manche`
--
ALTER TABLE `manche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `manche`
--
ALTER TABLE `manche`
  ADD CONSTRAINT `manche_ibfk_1` FOREIGN KEY (`id_theme`) REFERENCES `theme` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manche_ibfk_2` FOREIGN KEY (`id_partie`) REFERENCES `partie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `partie_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_theme`) REFERENCES `theme` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
