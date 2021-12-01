-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mar. 30 nov. 2021 à 19:32
-- Version du serveur : 10.6.5-MariaDB-1:10.6.5+maria~focal
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `qcm_website_thib`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` longtext NOT NULL,
  `create_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cathegory_qcm`
--

CREATE TABLE `cathegory_qcm` (
  `idcathegory_qcm` int(11) NOT NULL,
  `cathegory` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `info_qcm`
--

CREATE TABLE `info_qcm` (
  `idinfo_qcm` int(11) NOT NULL,
  `realisateur` varchar(45) DEFAULT NULL,
  `date_exit` varchar(45) DEFAULT NULL,
  `level_qcm` varchar(45) DEFAULT NULL,
  `nb_question` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `qcm_table`
--

CREATE TABLE `qcm_table` (
  `id_qcm` int(11) NOT NULL,
  `title_movie` varchar(64) DEFAULT NULL,
  `poster_movie` varchar(128) DEFAULT NULL,
  `director_movie` varchar(32) DEFAULT NULL,
  `release_date` varchar(8) DEFAULT NULL,
  `date_at` datetime DEFAULT NULL,
  `user_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `qcm_table`
--

INSERT INTO `qcm_table` (`id_qcm`, `title_movie`, `poster_movie`, `director_movie`, `release_date`, `date_at`, `user_id_user`) VALUES
(1, 'Les Aventures de Rabbi Jacob', '1638296901.jpg', 'Gérard Oury', '1973', '2021-11-30 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `question_table`
--

CREATE TABLE `question_table` (
  `id_question` int(11) NOT NULL,
  `question` varchar(128) NOT NULL,
  `reply1` varchar(128) NOT NULL,
  `reply2` varchar(128) NOT NULL,
  `reply3` varchar(128) NOT NULL,
  `reply4` varchar(128) NOT NULL,
  `good_reply` varchar(128) NOT NULL,
  `qcm_table_id_qcm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `question_table`
--

INSERT INTO `question_table` (`id_question`, `question`, `reply1`, `reply2`, `reply3`, `reply4`, `good_reply`, `qcm_table_id_qcm`) VALUES
(1, 'Quand Don Salluste est distitué par le roi, par qui est-il accompagné ?', 'Son âne fétiche', 'Personne, car c\'est un gros vilain !', 'Son neveu, qui revient des amérique, où il a vu beaucoup d\'américain !', 'Son valet', 'Son valet', 1),
(2, 'Quelle phrase Blaze répète-t-il pour réveiller Don Salluste ?', 'Il est l\'heure mon seigneur', 'Il est l\'or, mon seigneur', 'c', 'Il est l\'or, mon segnor', 'Il est l\'or, mon seigneur', 1),
(3, 'Que répond Blaze, quand Don Salluste lui demande de le flatter ?', 'Mon seigneur est le plus riche d\'Espagne', 'Mon seigneur est le plus vertueux de tous les ministres', 'Mon seigneur est beau', 'Mon seigneur n\'est pas le plus moche', 'Mon seigneur est beau', 1),
(4, 'Que devient Blaze après la destitution de Don Salluste ?', 'Il reste Don César Compt de Garofa', 'Il reste Don César Compt de Garofa et reprend le poste de Don Sallste', 'Il redevient un simple valet', 'Il quitte Madrid pour devenir berger', 'Il reste Don César Compt de Garofa et reprend le poste de Don Sallste', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` longtext NOT NULL,
  `author` binary(1) DEFAULT '0',
  `create_time` datetime DEFAULT current_timestamp(),
  `name` varchar(16) DEFAULT NULL,
  `first_name` varchar(16) DEFAULT NULL,
  `picture` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `author`, `create_time`, `name`, `first_name`, `picture`) VALUES
(1, 'thib', 't@t.fr', '$2y$10$aSAabf/0WMLW3mGN9YxBx..dNkUAv09hV72viwzTnou5XEhO.SVwO', 0x31, '2021-11-30 18:20:24', 't', 'thib', '1638296424.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user_qcm`
--

CREATE TABLE `user_qcm` (
  `id_result` int(11) NOT NULL,
  `title_movie` varchar(32) NOT NULL,
  `reply1` binary(1) NOT NULL DEFAULT '0',
  `reply2` binary(1) NOT NULL DEFAULT '0',
  `reply3` binary(1) NOT NULL DEFAULT '0',
  `reply4` binary(1) NOT NULL DEFAULT '0',
  `score_qcm` int(11) DEFAULT NULL,
  `user_id_user` int(11) NOT NULL,
  `date_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_qcm`
--

INSERT INTO `user_qcm` (`id_result`, `title_movie`, `reply1`, `reply2`, `reply3`, `reply4`, `score_qcm`, `user_id_user`, `date_at`) VALUES
(1, 'Les Aventures de Rabbi Jacob', 0x30, 0x30, 0x30, 0x30, 3, 1, '2021-11-30 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `cathegory_qcm`
--
ALTER TABLE `cathegory_qcm`
  ADD PRIMARY KEY (`idcathegory_qcm`);

--
-- Index pour la table `info_qcm`
--
ALTER TABLE `info_qcm`
  ADD PRIMARY KEY (`idinfo_qcm`);

--
-- Index pour la table `qcm_table`
--
ALTER TABLE `qcm_table`
  ADD PRIMARY KEY (`id_qcm`),
  ADD KEY `fk_qcm_table_user1_idx` (`user_id_user`);

--
-- Index pour la table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `fk_question_table_qcm_table1_idx` (`qcm_table_id_qcm`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `user_qcm`
--
ALTER TABLE `user_qcm`
  ADD PRIMARY KEY (`id_result`),
  ADD KEY `fk_user_qcm_user1_idx` (`user_id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cathegory_qcm`
--
ALTER TABLE `cathegory_qcm`
  MODIFY `idcathegory_qcm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `info_qcm`
--
ALTER TABLE `info_qcm`
  MODIFY `idinfo_qcm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `qcm_table`
--
ALTER TABLE `qcm_table`
  MODIFY `id_qcm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user_qcm`
--
ALTER TABLE `user_qcm`
  MODIFY `id_result` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `qcm_table`
--
ALTER TABLE `qcm_table`
  ADD CONSTRAINT `fk_qcm_table_user1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `question_table`
--
ALTER TABLE `question_table`
  ADD CONSTRAINT `fk_question_table_qcm_table1` FOREIGN KEY (`qcm_table_id_qcm`) REFERENCES `qcm_table` (`id_qcm`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_qcm`
--
ALTER TABLE `user_qcm`
  ADD CONSTRAINT `fk_user_qcm_user1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
