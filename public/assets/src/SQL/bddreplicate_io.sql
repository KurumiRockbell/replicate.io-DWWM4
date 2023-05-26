-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 26 mai 2023 à 14:58
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddreplicate.io`
--

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `price` float NOT NULL,
  `asset` varchar(1024) NOT NULL,
  `date` bigint(20) NOT NULL,
  `uid_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cards`
--

INSERT INTO `cards` (`id`, `name`, `price`, `asset`, `date`, `uid_user`) VALUES
(1, 'Aku Pearl', 15, '/assets/img/Akupearl.png', 12032021, 2),
(2, 'Silencer Night', 32, '/assets/img/nuitdusilence.png', 5052022, 3),
(3, 'Pulp Garage', 20, '/assets/img/pulpgarage.png', 10012023, 3);

-- --------------------------------------------------------

--
-- Structure de la table `card_news_mm`
--

CREATE TABLE `card_news_mm` (
  `id` int(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `id_news` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `card_news_mm`
--

INSERT INTO `card_news_mm` (`id`, `id_card`, `id_news`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `card_user_mm`
--

CREATE TABLE `card_user_mm` (
  `id` int(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `uid_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `card_user_mm`
--

INSERT INTO `card_user_mm` (`id`, `id_card`, `uid_user`) VALUES
(1, 3, 1),
(2, 2, 3),
(3, 1, 2),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(240) NOT NULL,
  `content` text NOT NULL,
  `date` bigint(20) NOT NULL,
  `uid_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `name`, `description`, `content`, `date`, `uid_user`) VALUES
(1, 'RPLC Drop 1 Comming soon!', 'The news waves of RPLC Cards comming for you in Fall 2023... Discover new asset now!', '“L’an 131aR marque le point haut de cette sinistre période: un grand conflit civil éclate après\r\nla mort de six individus lors d’une poursuite policière. Ces six individus étaient (de leur\r\nvivant) modérateurs dans les salons VR de Downsizer, de quoi alimenter la théorie selon\r\nlaquelle ils auraient en fait été assassinés, et la méfiance des populations. Assez, en tout\r\ncas, pour mettre le feu aux poudres. Certaines régions ozéniennes deviennent des zones de\r\nnon-droit et les attaques visant la police et les gouvernements se multiplient. C’est le début\r\nde la Purge.”\r\nSuite à ceci de grandes manifestations virtuelles et physiques auront lieu aux 4 coins\r\nd’Ozen 2. Les Downsizers prennent ainsi le statut de martyrs, ce qui leur donne le rôle\r\nparfait pour incarner la révolte populaire. Dénonçant aussi le “faux vote” concernant les\r\nlimites de la colonisation de la planète : en effet il a été voté que la colonisation puisse être\r\nouverte à tous, mais TheLabs et la Forks Coalition sont ceux à qui cette colonisation profite\r\nle plus, car ils détiennent des moyens économiques, matériels et humains, ils peuvent donc\r\nbeaucoup plus profiter de cette “liberté” de coloniser. Et c’est bien là le cœur de la cause des\r\ndownsizers : il n’y a pas de réel “fresh restart” si les géants économiques d’hier sont les\r\nmêmes qu\'aujourd\'hui. Conflit d’opinion entre progressistes et rétrogrades, le projet Ozen II\r\ns\'essouffle et ses fervents défenseurs accusent ceux qui l’ont porté un temps de reproduire\r\nles erreurs commises sur Ozen.\r\n', 10042023, 1),
(2, 'Koona et Anibuki', 'Koona and Anibuki Town was destroy during the purge, only the millician of SixPharma Cohalition can save this new territory. ', 'De nombreuses affaires seront ainsi rendues publiques durant cette période de pré-chaos,\r\ncomme la découverte des penchants macabres Xed par l’intermédiaire de Kaï’Sû, ou encore\r\nle génocide MAC-BRN. Mais aussi des affaires qui touchent les civils comme les attaques à\r\nla seringue sur Anibuki qui sont à la source de l’existence des Zeretz.\r\nLa confiance des différentes population en prendra aussi un coup lorsque les gens\r\napprendront que la communication est rompue entre la station orbitale Levem et Ozen II,\r\nexpliquant la méfiance naissante des Levem à l’égard des populations ozéniennes.\r\nAux alentours de -130 aR les infrastructures seront touchées par ce désordre social, comme\r\nles hopitaux, les centres de sécurité, les routes, mais aussi le traffic maritime, ce qui forcera\r\nWaterLINE à réduire le nombre d’embarcations.', 23032022, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(350) NOT NULL,
  `email` varchar(80) NOT NULL,
  `civilite` enum('homme','femme') NOT NULL,
  `datebirth` bigint(20) NOT NULL,
  `country` varchar(32) NOT NULL,
  `roles` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `email`, `civilite`, `datebirth`, `country`, `roles`) VALUES
(1, 'Althis', 'Amigoamiga13@', 'althiscontact@gmail.com', 'homme', 4041997, 'France', 'admin'),
(2, 'Farbla', 'Ozen2Rplc1313', 'Farbla@rplc.com', 'homme', 16051993, 'France', 'admin'),
(3, 'Rynn', 'Lionmars1313', 'Rynn@outlook.fr', 'homme', 6061997, 'France', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cards_user` (`uid_user`);

--
-- Index pour la table `card_news_mm`
--
ALTER TABLE `card_news_mm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_card_news_mm_news` (`id_news`),
  ADD KEY `fk_news_card_mm` (`id_card`);

--
-- Index pour la table `card_user_mm`
--
ALTER TABLE `card_user_mm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_card_user_mm` (`id_card`),
  ADD KEY `fk_user_cards_mm` (`uid_user`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_news` (`uid_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `card_news_mm`
--
ALTER TABLE `card_news_mm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `card_user_mm`
--
ALTER TABLE `card_user_mm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `fk_cards_user` FOREIGN KEY (`uid_user`) REFERENCES `user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `card_news_mm`
--
ALTER TABLE `card_news_mm`
  ADD CONSTRAINT `fk_card_news_mm_news` FOREIGN KEY (`id_news`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_news_card_mm` FOREIGN KEY (`id_card`) REFERENCES `cards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `card_user_mm`
--
ALTER TABLE `card_user_mm`
  ADD CONSTRAINT `fk_card_user_mm` FOREIGN KEY (`id_card`) REFERENCES `cards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_cards_mm` FOREIGN KEY (`uid_user`) REFERENCES `user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_user_news` FOREIGN KEY (`uid_user`) REFERENCES `user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
