-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 23, 2019 at 10:27 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espace_membre`
--

-- --------------------------------------------------------

--
-- Table structure for table `controlvalues`
--

CREATE TABLE `controlvalues` (
  `temp` int(11) NOT NULL,
  `lum` int(11) NOT NULL,
  `screen` int(11) NOT NULL,
  `nomsalle_id` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `controlvalues`
--

INSERT INTO `controlvalues` (`temp`, `lum`, `screen`, `nomsalle_id`, `id`) VALUES
(20, 50, 0, 'salle1', 184),
(20, 50, 0, '', 185),
(20, 50, 0, '', 186),
(20, 50, 0, '', 187),
(20, 50, 0, '', 189),
(20, 50, 0, '', 190),
(20, 50, 0, '', 191),
(20, 50, 0, '', 192),
(20, 50, 0, 'salle_1', 193),
(20, 50, 0, 'salle_2', 194),
(20, 50, 0, 'salle_3', 195),
(20, 50, 0, 'salle_4', 196),
(20, 50, 0, '', 198),
(20, 50, 0, '', 199);

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `adminreq` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`, `isadmin`, `adminreq`) VALUES
(1, 'thomasj', 'thomas@jallon.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, 1),
(19, 'test1', 'test1@test1.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, 1),
(23, 'admindomisep', 'admin@domisep.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `texte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `mail`, `texte`) VALUES
(1, 't@t.fr', 'arbre'),
(2, 't@t.fr', 'arbre'),
(3, 'thomas@valentin.fr', 'j\'aime les pizzas'),
(4, 'thomas@valentin.fr', 'zEVzevverveaarv'),
(5, 'matthieu.jacquand@isep.fr', 'azeertyyyyyy'),
(6, 'purge@gmail.com', 'jet nique fdp'),
(7, 'test1@test1.fr', 'abcdef'),
(8, 'aze@aze.fr', 'th'),
(9, 'aze@aze.fr', 'thaï'),
(11, 'aze@aze.fr', 'thaïlandaaaa'),
(12, 'aze@aze.fr', 'banane'),
(13, 'aze@aze.fr', 'banane 13'),
(14, 'aze@aze.fr', 'banane 14'),
(15, 'thomas@jallon.fr', 'test message reception'),
(16, 'thomas@jallon.fr', 'test message reception 2');

-- --------------------------------------------------------

--
-- Table structure for table `newcapt`
--

CREATE TABLE `newcapt` (
  `id` int(11) NOT NULL,
  `grandeur` int(11) NOT NULL,
  `scale` int(11) NOT NULL,
  `defaultvalue` int(11) NOT NULL,
  `nomsalle_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salles`
--

CREATE TABLE `salles` (
  `id` int(11) NOT NULL,
  `nomsalle` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `pseudo_id` varchar(255) NOT NULL,
  `nbplaces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salles`
--

INSERT INTO `salles` (`id`, `nomsalle`, `etat`, `pseudo_id`, `nbplaces`) VALUES
(123, 'salle_1', 0, '', 10),
(124, 'salle_2', 0, '', 10),
(125, 'salle_3', 0, '', 20),
(126, 'salle_4', 0, '', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `controlvalues`
--
ALTER TABLE `controlvalues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newcapt`
--
ALTER TABLE `newcapt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salles`
--
ALTER TABLE `salles`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `controlvalues`
--
ALTER TABLE `controlvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `newcapt`
--
ALTER TABLE `newcapt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
