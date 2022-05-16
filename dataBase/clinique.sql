-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 fév. 2021 à 01:55
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clinique`
--

-- --------------------------------------------------------

--
-- Structure de la table `consulte`
--

CREATE TABLE `consulte` (
  `id_malade` int(11) NOT NULL,
  `id_medecins` int(11) NOT NULL,
  `obsevation_consult` text DEFAULT NULL,
  `frais_consultation` int(11) DEFAULT NULL,
  `date_consultation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `laboratoire`
--

CREATE TABLE `laboratoire` (
  `id_labo` int(11) NOT NULL,
  `type_examen` varchar(50) DEFAULT NULL,
  `observation_labo` text DEFAULT NULL,
  `date_examen` date DEFAULT NULL,
  `frais_examen` int(11) DEFAULT NULL,
  `malade_id_malade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `malade`
--

CREATE TABLE `malade` (
  `id_malade` int(11) NOT NULL,
  `nom_malade` varchar(50) DEFAULT NULL,
  `prenom_malade` varchar(50) DEFAULT NULL,
  `sexe_malade` varchar(2) DEFAULT NULL,
  `adr_malade` varchar(50) DEFAULT NULL,
  `temperature` varchar(15) DEFAULT NULL,
  `poids` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `medecins`
--

CREATE TABLE `medecins` (
  `id_medecins` int(11) NOT NULL,
  `nom_medecins` varchar(50) DEFAULT NULL,
  `prenom_medecins` varchar(50) DEFAULT NULL,
  `sexe_medecins` varchar(2) DEFAULT NULL,
  `adr_medecins` varchar(50) DEFAULT NULL,
  `tel_medecins` varchar(12) DEFAULT NULL,
  `fonction_medecins` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `traitement`
--

CREATE TABLE `traitement` (
  `id_trai` int(11) NOT NULL,
  `nom_maladie` text DEFAULT NULL,
  `date_debut_trait` date DEFAULT NULL,
  `date_fin_trait` date DEFAULT NULL,
  `frais_trait` int(11) DEFAULT NULL,
  `etat_patient` varchar(50) DEFAULT NULL,
  `malade_id_malade` int(11) DEFAULT NULL,
  `medicament_prescrit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `consulte`
--
ALTER TABLE `consulte`
  ADD PRIMARY KEY (`id_malade`,`id_medecins`),
  ADD KEY `FK_consulte_id_medecins` (`id_medecins`);

--
-- Index pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  ADD PRIMARY KEY (`id_labo`),
  ADD KEY `FK_LABORATOIRE_malade_id_malade` (`malade_id_malade`);

--
-- Index pour la table `malade`
--
ALTER TABLE `malade`
  ADD PRIMARY KEY (`id_malade`);

--
-- Index pour la table `medecins`
--
ALTER TABLE `medecins`
  ADD PRIMARY KEY (`id_medecins`);

--
-- Index pour la table `traitement`
--
ALTER TABLE `traitement`
  ADD PRIMARY KEY (`id_trai`),
  ADD KEY `FK_TRAITEMENT_malade_id_malade` (`malade_id_malade`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `consulte`
--
ALTER TABLE `consulte`
  MODIFY `id_malade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  MODIFY `id_labo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `malade`
--
ALTER TABLE `malade`
  MODIFY `id_malade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `medecins`
--
ALTER TABLE `medecins`
  MODIFY `id_medecins` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `traitement`
--
ALTER TABLE `traitement`
  MODIFY `id_trai` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `consulte`
--
ALTER TABLE `consulte`
  ADD CONSTRAINT `FK_consulte_id_malade` FOREIGN KEY (`id_malade`) REFERENCES `malade` (`id_malade`),
  ADD CONSTRAINT `FK_consulte_id_medecins` FOREIGN KEY (`id_medecins`) REFERENCES `medecins` (`id_medecins`);

--
-- Contraintes pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  ADD CONSTRAINT `FK_LABORATOIRE_malade_id_malade` FOREIGN KEY (`malade_id_malade`) REFERENCES `malade` (`id_malade`);

--
-- Contraintes pour la table `traitement`
--
ALTER TABLE `traitement`
  ADD CONSTRAINT `FK_TRAITEMENT_malade_id_malade` FOREIGN KEY (`malade_id_malade`) REFERENCES `malade` (`id_malade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
