-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 avr. 2022 à 12:10
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `autocompletion`
--

-- --------------------------------------------------------

--
-- Structure de la table `pokemons`
--

CREATE TABLE `pokemons` (
  `id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `type0` varchar(8) NOT NULL,
  `type1` varchar(8) DEFAULT NULL,
  `baseHP` int(11) NOT NULL,
  `baseAttack` int(11) NOT NULL,
  `baseDefense` int(11) NOT NULL,
  `baseSp_Attack` int(11) NOT NULL,
  `baseSp_Defense` int(11) NOT NULL,
  `baseSpeed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pokemons`
--

INSERT INTO `pokemons` (`id`, `nom`, `type0`, `type1`, `baseHP`, `baseAttack`, `baseDefense`, `baseSp_Attack`, `baseSp_Defense`, `baseSpeed`) VALUES
(1, 'Bulbizarre', 'Grass', 'Poison', 45, 49, 49, 65, 65, 45),
(2, 'Herbizarre', 'Grass', 'Poison', 60, 62, 63, 80, 80, 60),
(3, 'Florizarre', 'Grass', 'Poison', 80, 82, 83, 100, 100, 80),
(4, 'Salamèche', 'Fire', NULL, 39, 52, 43, 60, 50, 65),
(5, 'Reptincel', 'Fire', NULL, 58, 64, 58, 80, 65, 80),
(6, 'Dracaufeu', 'Fire', 'Flying', 78, 84, 78, 109, 85, 100),
(7, 'Carapuce', 'Water', NULL, 44, 48, 65, 50, 64, 43),
(8, 'Carabaffe', 'Water', NULL, 59, 63, 80, 65, 80, 58),
(9, 'Tortank', 'Water', NULL, 79, 83, 100, 85, 105, 78),
(10, 'Chenipan', 'Bug', NULL, 45, 30, 35, 20, 20, 45),
(11, 'Chrysacier', 'Bug', NULL, 50, 20, 55, 25, 25, 30),
(12, 'Papilusion', 'Bug', 'Flying', 60, 45, 50, 90, 80, 70),
(13, 'Aspicot', 'Bug', 'Poison', 40, 35, 30, 20, 20, 50),
(14, 'Coconfort', 'Bug', 'Poison', 45, 25, 50, 25, 25, 35),
(15, 'Dardargnan', 'Bug', 'Poison', 65, 90, 40, 45, 80, 75),
(16, 'Roucool', 'Normal', 'Flying', 40, 45, 40, 35, 35, 56),
(17, 'Roucoups', 'Normal', 'Flying', 63, 60, 55, 50, 50, 71),
(18, 'Roucarnage', 'Normal', 'Flying', 83, 80, 75, 70, 70, 101),
(19, 'Rattata', 'Normal', NULL, 30, 56, 35, 25, 35, 72),
(20, 'Rattatac', 'Normal', NULL, 55, 81, 60, 50, 70, 97),
(21, 'Piafabec', 'Normal', 'Flying', 40, 60, 30, 31, 31, 70),
(22, 'Rapasdepic', 'Normal', 'Flying', 65, 90, 65, 61, 61, 100),
(23, 'Abo', 'Poison', NULL, 35, 60, 44, 40, 54, 55),
(24, 'Arbok', 'Poison', NULL, 60, 95, 69, 65, 79, 80),
(25, 'Pikachu', 'Electric', NULL, 35, 55, 40, 50, 50, 90),
(26, 'Raichu', 'Electric', NULL, 60, 90, 55, 90, 80, 110),
(27, 'Sabelette', 'Ground', NULL, 50, 75, 85, 20, 30, 40),
(28, 'Sablaireau', 'Ground', NULL, 75, 100, 110, 45, 55, 65),
(29, 'Nidoran♀', 'Poison', NULL, 55, 47, 52, 40, 40, 41),
(30, 'Nidorina', 'Poison', NULL, 70, 62, 67, 55, 55, 56),
(31, 'Nidoqueen', 'Poison', 'Ground', 90, 92, 87, 75, 85, 76),
(32, 'Nidoran♂', 'Poison', NULL, 46, 57, 40, 40, 40, 50),
(33, 'Nidorino', 'Poison', NULL, 61, 72, 57, 55, 55, 65),
(34, 'Nidoking', 'Poison', 'Ground', 81, 102, 77, 85, 75, 85),
(35, 'Mélofée', 'Fairy', NULL, 70, 45, 48, 60, 65, 35),
(36, 'Mélodelfe', 'Fairy', NULL, 95, 70, 73, 95, 90, 60),
(37, 'Goupix', 'Fire', NULL, 38, 41, 40, 50, 65, 65),
(38, 'Feunard', 'Fire', NULL, 73, 76, 75, 81, 100, 100),
(39, 'Rondoudou', 'Normal', 'Fairy', 115, 45, 20, 45, 25, 20),
(40, 'Grodoudou', 'Normal', 'Fairy', 140, 70, 45, 85, 50, 45),
(41, 'Nosferapti', 'Poison', 'Flying', 40, 45, 35, 30, 40, 55),
(42, 'Nosferalto', 'Poison', 'Flying', 75, 80, 70, 65, 75, 90),
(43, 'Mystherbe', 'Grass', 'Poison', 45, 50, 55, 75, 65, 30),
(44, 'Ortide', 'Grass', 'Poison', 60, 65, 70, 85, 75, 40),
(45, 'Rafflesia', 'Grass', 'Poison', 75, 80, 85, 110, 90, 50),
(46, 'Paras', 'Bug', 'Grass', 35, 70, 55, 45, 55, 25),
(47, 'Parasect', 'Bug', 'Grass', 60, 95, 80, 60, 80, 30),
(48, 'Mimitoss', 'Bug', 'Poison', 60, 55, 50, 40, 55, 45),
(49, 'Aéromite', 'Bug', 'Poison', 70, 65, 60, 90, 75, 90),
(50, 'Taupiqueur', 'Ground', NULL, 10, 55, 25, 35, 45, 95),
(51, 'Triopikeur', 'Ground', NULL, 35, 100, 50, 50, 70, 120),
(52, 'Miaouss', 'Normal', NULL, 40, 45, 35, 40, 40, 90),
(53, 'Persian', 'Normal', NULL, 65, 70, 60, 65, 65, 115),
(54, 'Psykokwak', 'Water', NULL, 50, 52, 48, 65, 50, 55),
(55, 'Akwakwak', 'Water', NULL, 80, 82, 78, 95, 80, 85),
(56, 'Férosinge', 'Fighting', NULL, 40, 80, 35, 35, 45, 70),
(57, 'Colossinge', 'Fighting', NULL, 65, 105, 60, 60, 70, 95),
(58, 'Caninos', 'Fire', NULL, 55, 70, 45, 70, 50, 60),
(59, 'Arcanin', 'Fire', NULL, 90, 110, 80, 100, 80, 95),
(60, 'Ptitard', 'Water', NULL, 40, 50, 40, 40, 40, 90),
(61, 'Têtarte', 'Water', NULL, 65, 65, 65, 50, 50, 90),
(62, 'Tartard', 'Water', 'Fighting', 90, 95, 95, 70, 90, 70),
(63, 'Abra', 'Psychic', NULL, 25, 20, 15, 105, 55, 90),
(64, 'Kadabra', 'Psychic', NULL, 40, 35, 30, 120, 70, 105),
(65, 'Alakazam', 'Psychic', NULL, 55, 50, 45, 135, 95, 120),
(66, 'Machoc', 'Fighting', NULL, 70, 80, 50, 35, 35, 35),
(67, 'Machopeur', 'Fighting', NULL, 80, 100, 70, 50, 60, 45),
(68, 'Mackogneur', 'Fighting', NULL, 90, 130, 80, 65, 85, 55),
(69, 'Chétiflor', 'Grass', 'Poison', 50, 75, 35, 70, 30, 40),
(70, 'Boustiflor', 'Grass', 'Poison', 65, 90, 50, 85, 45, 55),
(71, 'Empiflor', 'Grass', 'Poison', 80, 105, 65, 100, 70, 70),
(72, 'Tentacool', 'Water', 'Poison', 40, 40, 35, 50, 100, 70),
(73, 'Tentacruel', 'Water', 'Poison', 80, 70, 65, 80, 120, 100),
(74, 'Racaillou', 'Rock', 'Ground', 40, 80, 100, 30, 30, 20),
(75, 'Gravalanch', 'Rock', 'Ground', 55, 95, 115, 45, 45, 35),
(76, 'Grolem', 'Rock', 'Ground', 80, 120, 130, 55, 65, 45),
(77, 'Ponyta', 'Fire', NULL, 50, 85, 55, 65, 65, 90),
(78, 'Galopa', 'Fire', NULL, 65, 100, 70, 80, 80, 105),
(79, 'Ramoloss', 'Water', 'Psychic', 90, 65, 65, 40, 40, 15),
(80, 'Flagadoss', 'Water', 'Psychic', 95, 75, 110, 100, 80, 30),
(81, 'Magnéti', 'Electric', 'Steel', 25, 35, 70, 95, 55, 45),
(82, 'Magnéton', 'Electric', 'Steel', 50, 60, 95, 120, 70, 70),
(83, 'Canarticho', 'Normal', 'Flying', 52, 90, 55, 58, 62, 60),
(84, 'Doduo', 'Normal', 'Flying', 35, 85, 45, 35, 35, 75),
(85, 'Dodrio', 'Normal', 'Flying', 60, 110, 70, 60, 60, 110),
(86, 'Otaria', 'Water', NULL, 65, 45, 55, 45, 70, 45),
(87, 'Lamantine', 'Water', 'Ice', 90, 70, 80, 70, 95, 70),
(88, 'Tadmorv', 'Poison', NULL, 80, 80, 50, 40, 50, 25),
(89, 'Grotadmorv', 'Poison', NULL, 105, 105, 75, 65, 100, 50),
(90, 'Kokiyas', 'Water', NULL, 30, 65, 100, 45, 25, 40),
(91, 'Crustabri', 'Water', 'Ice', 50, 95, 180, 85, 45, 70),
(92, 'Fantominus', 'Ghost', 'Poison', 30, 35, 30, 100, 35, 80),
(93, 'Spectrum', 'Ghost', 'Poison', 45, 50, 45, 115, 55, 95),
(94, 'Ectoplasma', 'Ghost', 'Poison', 60, 65, 60, 130, 75, 110),
(95, 'Onix', 'Rock', 'Ground', 35, 45, 160, 30, 45, 70),
(96, 'Soporifik', 'Psychic', NULL, 60, 48, 45, 43, 90, 42),
(97, 'Hypnomade', 'Psychic', NULL, 85, 73, 70, 73, 115, 67),
(98, 'Krabby', 'Water', NULL, 30, 105, 90, 25, 25, 50),
(99, 'Krabboss', 'Water', NULL, 55, 130, 115, 50, 50, 75),
(100, 'Voltorbe', 'Electric', NULL, 40, 30, 50, 55, 55, 100),
(101, 'Électrode', 'Electric', NULL, 60, 50, 70, 80, 80, 150),
(102, 'Noeunoeuf', 'Grass', 'Psychic', 60, 40, 80, 60, 45, 40),
(103, 'Noadkoko', 'Grass', 'Psychic', 95, 95, 85, 125, 75, 55),
(104, 'Osselait', 'Ground', NULL, 50, 50, 95, 40, 50, 35),
(105, 'Ossatueur', 'Ground', NULL, 60, 80, 110, 50, 80, 45),
(106, 'Kicklee', 'Fighting', NULL, 50, 120, 53, 35, 110, 87),
(107, 'Tygnon', 'Fighting', NULL, 50, 105, 79, 35, 110, 76),
(108, 'Excelangue', 'Normal', NULL, 90, 55, 75, 60, 75, 30),
(109, 'Smogo', 'Poison', NULL, 40, 65, 95, 60, 45, 35),
(110, 'Smogogo', 'Poison', NULL, 65, 90, 120, 85, 70, 60),
(111, 'Rhinocorne', 'Ground', 'Rock', 80, 85, 95, 30, 30, 25),
(112, 'Rhinoféros', 'Ground', 'Rock', 105, 130, 120, 45, 45, 40),
(113, 'Leveinard', 'Normal', NULL, 250, 5, 5, 35, 105, 50),
(114, 'Saquedeneu', 'Grass', NULL, 65, 55, 115, 100, 40, 60),
(115, 'Kangourex', 'Normal', NULL, 105, 95, 80, 40, 80, 90),
(116, 'Hypotrempe', 'Water', NULL, 30, 40, 70, 70, 25, 60),
(117, 'Hypocéan', 'Water', NULL, 55, 65, 95, 95, 45, 85),
(118, 'Poissirène', 'Water', NULL, 45, 67, 60, 35, 50, 63),
(119, 'Poissoroy', 'Water', NULL, 80, 92, 65, 65, 80, 68),
(120, 'Stari', 'Water', NULL, 30, 45, 55, 70, 55, 85),
(121, 'Staross', 'Water', 'Psychic', 60, 75, 85, 100, 85, 115),
(122, 'M. Mime', 'Psychic', 'Fairy', 40, 45, 65, 100, 120, 90),
(123, 'Insécateur', 'Bug', 'Flying', 70, 110, 80, 55, 80, 105),
(124, 'Lippoutou', 'Ice', 'Psychic', 65, 50, 35, 115, 95, 95),
(125, 'Élektek', 'Electric', NULL, 65, 83, 57, 95, 85, 105),
(126, 'Magmar', 'Fire', NULL, 65, 95, 57, 100, 85, 93),
(127, 'Scarabrute', 'Bug', NULL, 65, 125, 100, 55, 70, 85),
(128, 'Tauros', 'Normal', NULL, 75, 100, 95, 40, 70, 110),
(129, 'Magicarpe', 'Water', NULL, 20, 10, 55, 15, 20, 80),
(130, 'Léviator', 'Water', 'Flying', 95, 125, 79, 60, 100, 81),
(131, 'Lokhlass', 'Water', 'Ice', 130, 85, 80, 85, 95, 60),
(132, 'Métamorph', 'Normal', NULL, 48, 48, 48, 48, 48, 48),
(133, 'Évoli', 'Normal', NULL, 55, 55, 50, 45, 65, 55),
(134, 'Aquali', 'Water', NULL, 130, 65, 60, 110, 95, 65),
(135, 'Voltali', 'Electric', NULL, 65, 65, 60, 110, 95, 130),
(136, 'Pyroli', 'Fire', NULL, 65, 130, 60, 95, 110, 65),
(137, 'Porygon', 'Normal', NULL, 65, 60, 70, 85, 75, 40),
(138, 'Amonita', 'Rock', 'Water', 35, 40, 100, 90, 55, 35),
(139, 'Amonistar', 'Rock', 'Water', 70, 60, 125, 115, 70, 55),
(140, 'Kabuto', 'Rock', 'Water', 30, 80, 90, 55, 45, 55),
(141, 'Kabutops', 'Rock', 'Water', 60, 115, 105, 65, 70, 80),
(142, 'Ptéra', 'Rock', 'Flying', 80, 105, 65, 60, 75, 130),
(143, 'Ronflex', 'Normal', NULL, 160, 110, 65, 65, 110, 30),
(144, 'Artikodin', 'Ice', 'Flying', 90, 85, 100, 95, 125, 85),
(145, 'Électhor', 'Electric', 'Flying', 90, 90, 85, 125, 90, 100),
(146, 'Sulfura', 'Fire', 'Flying', 90, 100, 90, 125, 85, 90),
(147, 'Minidraco', 'Dragon', NULL, 41, 64, 45, 50, 50, 50),
(148, 'Draco', 'Dragon', NULL, 61, 84, 65, 70, 70, 70),
(149, 'Dracolosse', 'Dragon', 'Flying', 91, 134, 95, 100, 100, 80),
(150, 'Mewtwo', 'Psychic', NULL, 106, 110, 90, 154, 90, 130),
(151, 'Mew', 'Psychic', NULL, 100, 100, 100, 100, 100, 100);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pokemons`
--
ALTER TABLE `pokemons`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
