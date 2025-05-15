-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 mai 2025 à 23:49
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `covoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `idlocation` int(11) NOT NULL,
  `nbplace` int(11) NOT NULL,
  `prix` int(3) NOT NULL,
  `datedepare` datetime NOT NULL,
  `villedepare` varchar(20) NOT NULL,
  `villefin` varchar(20) NOT NULL,
  `Cin` int(11) NOT NULL,
  `mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`idlocation`, `nbplace`, `prix`, `datedepare`, `villedepare`, `villefin`, `Cin`, `mat`) VALUES
(6, 2, 50, '2025-05-01 11:25:00', 'nabeul', 'tunisia', 14418249, 12345679),
(7, 0, 40, '2025-04-25 12:57:00', 'nabeul', 'tunisia', 14418244, 7123),
(8, 3, 25, '2025-05-10 09:00:00', 'Tunis', 'Sousse', 14418303, 20010001),
(10, 3, 20, '2025-05-12 08:15:00', 'Gabes', 'Sousse', 14418305, 20010003);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `pw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`username`, `pw`) VALUES
('client1', 'pass123'),
('client2', 'pass123'),
('client3', 'pass123'),
('dissojak', '123'),
('dissojak0', '123'),
('dissojak1', '123'),
('maha', '123'),
('newuser', 'securepass'),
('owner1', 'pass123'),
('owner2', 'pass123'),
('owner3', 'pass123');

-- --------------------------------------------------------

--
-- Structure de la table `owner_history`
--

CREATE TABLE `owner_history` (
  `idHistory` int(11) NOT NULL,
  `CinOwner` int(11) NOT NULL,
  `idLocation` int(11) NOT NULL,
  `totalEarnings` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `owner_history`
--

INSERT INTO `owner_history` (`idHistory`, `CinOwner`, `idLocation`, `totalEarnings`) VALUES
(1, 14418303, 8, 200.00),
(6, 14418249, 6, 50.00),
(7, 14418244, 7, 40.00);

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

CREATE TABLE `payment` (
  `card` varchar(16) NOT NULL,
  `dateCard` varchar(5) NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `nameOwner` varchar(100) NOT NULL,
  `money` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `payment`
--

INSERT INTO `payment` (`card`, `dateCard`, `cvv`, `nameOwner`, `money`) VALUES
('1234567891234567', '04/13', '123', 'Adem Ben Amor', 2620.00);

-- --------------------------------------------------------

--
-- Structure de la table `trip_history`
--

CREATE TABLE `trip_history` (
  `idHistory` int(11) NOT NULL,
  `CinClient` int(11) NOT NULL,
  `idLocation` int(11) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `dateOfTrip` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `trip_history`
--

INSERT INTO `trip_history` (`idHistory`, `CinClient`, `idLocation`, `totalPrice`, `dateOfTrip`) VALUES
(1, 14418302, 8, 50.00, '2025-04-20 10:00:00'),
(6, 14418249, 6, 50.00, '2025-05-01 11:25:00'),
(7, 14418244, 7, 40.00, '2025-04-25 12:57:00'),
(8, 14418266, 6, 50.00, '2025-05-01 11:25:00'),
(9, 14418304, 6, 50.00, '2025-05-01 11:25:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `nom` varchar(20) NOT NULL,
  `pr` varchar(20) NOT NULL,
  `cin` int(8) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` int(8) NOT NULL,
  `role` varchar(20) NOT NULL,
  `placeRes` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`nom`, `pr`, `cin`, `adresse`, `tel`, `role`, `placeRes`, `username`) VALUES
('maha', 'maha', 14418244, 'tunis,ariana ', 23039323, 'owner', NULL, 'maha'),
('ben amor', 'adem', 14418248, 'Maamoura , nahej chahid mouhamed zgued', 23039320, 'owner', NULL, 'dissojak1'),
('ben amor', 'adem', 14418249, 'Maamoura , nahej chahid mouhamed zgued', 23039320, 'owner', 1325669656, 'dissojak'),
('ben amor', 'adem', 14418266, 'Maamoura , nahej chahid mouhamed zgued', 23039320, 'user', 12345679, 'dissojak0'),
('Doe', 'John', 14418299, 'Tunis Centre', 22994411, 'user', NULL, 'newuser'),
('Ali', 'Mohamed', 14418300, 'Tunis, Lafayette', 22233444, 'user', 20010003, 'client1'),
('Hatem', 'Zribi', 14418302, 'Sousse Corniche', 22445566, 'user', NULL, 'client3'),
('Yassine', 'Bouazizi', 14418303, 'Tunis, Menzah 6', 22556677, 'owner', NULL, 'owner1'),
('Mariem', 'Gharbi', 14418304, 'Ariana, Ennasr', 22667788, 'owner', NULL, 'owner2'),
('Ibrahim', 'Kefi', 14418305, 'Monastir, Marina', 22778899, 'owner', NULL, 'owner3');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `mat` int(11) NOT NULL,
  `cin` int(8) NOT NULL,
  `model` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`mat`, `cin`, `model`) VALUES
(7123, 14418244, 'xs'),
(12345679, 14418249, 'BMW I8'),
(12365478, 14418248, 'xxx'),
(14785236, 14418266, 'bmw'),
(20010001, 14418303, 'Peugeot 208'),
(20010002, 14418304, 'Renault Clio'),
(20010003, 14418305, 'Hyundai i20'),
(1325669656, 14418248, 'golf 6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`idlocation`),
  ADD KEY `FK4` (`mat`),
  ADD KEY `FK3` (`Cin`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `owner_history`
--
ALTER TABLE `owner_history`
  ADD PRIMARY KEY (`idHistory`),
  ADD KEY `FK_owner_user` (`CinOwner`),
  ADD KEY `FK_owner_location` (`idLocation`);

--
-- Index pour la table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`card`);

--
-- Index pour la table `trip_history`
--
ALTER TABLE `trip_history`
  ADD PRIMARY KEY (`idHistory`),
  ADD KEY `FK_trip_client` (`CinClient`),
  ADD KEY `FK_trip_location` (`idLocation`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cin`),
  ADD KEY `FK5` (`username`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`mat`),
  ADD KEY `FK1` (`cin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `idlocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `owner_history`
--
ALTER TABLE `owner_history`
  MODIFY `idHistory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `trip_history`
--
ALTER TABLE `trip_history`
  MODIFY `idHistory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`Cin`) REFERENCES `user` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK4` FOREIGN KEY (`mat`) REFERENCES `voiture` (`mat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `owner_history`
--
ALTER TABLE `owner_history`
  ADD CONSTRAINT `FK_owner_location` FOREIGN KEY (`idLocation`) REFERENCES `location` (`idlocation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_owner_user` FOREIGN KEY (`CinOwner`) REFERENCES `user` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `trip_history`
--
ALTER TABLE `trip_history`
  ADD CONSTRAINT `FK_trip_client` FOREIGN KEY (`CinClient`) REFERENCES `user` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_trip_location` FOREIGN KEY (`idLocation`) REFERENCES `location` (`idlocation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`username`) REFERENCES `login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`cin`) REFERENCES `user` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
