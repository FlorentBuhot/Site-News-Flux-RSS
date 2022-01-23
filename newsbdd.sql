-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 jan. 2022 à 14:45
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `newsbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(30) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `mdp`) VALUES
('test3', '$2y$10$G.oPP760ykTZd3EsfZlwe.3lRjFa4gz00zE700VePnaKoYX1dFZuW');

-- --------------------------------------------------------

--
-- Structure de la table `nbnewspage`
--

DROP TABLE IF EXISTS `nbnewspage`;
CREATE TABLE IF NOT EXISTS `nbnewspage` (
  `nbNewsPage` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nbnewspage`
--

INSERT INTO `nbnewspage` (`nbNewsPage`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `tnews`
--

DROP TABLE IF EXISTS `tnews`;
CREATE TABLE IF NOT EXISTS `tnews` (
  `titre` varchar(200) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `nomSite` varchar(30) NOT NULL,
  `lienImg` varchar(300) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tnews`
--

INSERT INTO `tnews` (`titre`, `url`, `id`, `date`, `nomSite`, `lienImg`) VALUES
('HEURE, PROGRAMME, LISTE : TOUTES LES INFOS SUR LA CEREMONIE DU BALLON D\'OR 2021', 'https://www-eurosport-fr.cdn.ampproject.org/v/s/www.eurosport.fr/football/ballon-d-or/2021/heure-programme-liste-toutes-les-infos-sur-la-ceremonie-du-ballon-dor-2021_sto8646289/story-amp.shtml?amp_js_v=a6&amp_gsa=1&usqp=mq331AQKKAFQArABIIACAw%3D%3D#aoh=16381019331423&referrer=https%3A%2F%2Fwww.google.com&amp_tf=Source%C2%A0%3A%20%251%24s&ampshare=https%3A%2F%2Fwww.eurosport.fr%2Ffootball%2Fballon-d-or%2F2021%2Fheure-programme-liste-toutes-les-infos-sur-la-ceremonie-du-ballon-dor-2021_sto8646289%2Fstory.shtml', 11, '2021-11-28', 'Eurosport', 'https://etapes.com/app/uploads/2015/11/logo-eurosport-conserve-sa-bonne-etoile-8.jpg'),
('\"Du jamais vu\" : tout le monde se presse a la 35e fete du disque de Clermont-Ferrand', 'https://www.lamontagne.fr/clermont-ferrand-63000/loisirs/du-jamais-vu-tout-le-monde-se-presse-a-la-35e-fete-du-disque-de-clermont-ferrand_14051796/', 5, '2021-11-28', 'La Montagne', 'https://www.lamontagne.fr/static/bloc/ripolinage/logos/FB/MT_FB.png'),
('Neige et verglas : douze departements en alerte', 'https://www.ladepeche.fr/2021/11/28/neige-et-verglas-meteo-france-maintient-sa-vigilance-orange-en-haute-garonne-en-ariege-et-dans-les-hautes-pyrenees-9956853.php', 3, '2021-11-28', 'La Depeche', 'https://seeklogo.com/images/L/la-depeche-du-midi-logo-ECDF2CE25E-seeklogo.com.gif'),
('League of Legends x Arcane : Des personnages issus de la serie bientot integres au jeu ?', 'https://www-jeuxvideo-com.cdn.ampproject.org/v/s/www.jeuxvideo.com/amp/news/1499154/league-of-legends-x-arcane-des-personnages-issus-de-la-serie-bientot-integres-au-jeu.htm?amp_js_v=a6&amp_gsa=1&usqp=mq331AQKKAFQArABIIACAw%3D%3D#aoh=16381012945026&referrer=https%3A%2F%2Fwww.google.com&amp_tf=Source%C2%A0%3A%20%251%24s&ampshare=https%3A%2F%2Fwww.jeuxvideo.com%2Fnews%2F1499154%2Fleague-of-legends-x-arcane-des-personnages-issus-de-la-serie-bientot-integres-au-jeu.htm', 8, '2021-11-27', 'JeuxVideo.com', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Jeuxvideo.com_Logo.svg/1200px-Jeuxvideo.com_Logo.svg.png'),
('The Sicilian town where the Covid vaccination rate hit 104%', 'https://www.theguardian.com/world/2021/nov/27/palazzo-adriano-sicilian-town-covid-vaccination-rate', 6, '2021-11-27', 'The Guardian', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAcUJakHYHCpLsk52BsNNPVVUqRrGjiWtzs8ek0IjbZPPTm6ROPqWlcwZEEYG4v3_qj5s&usqp=CAU'),
('Nevers a revetu ses habits de lumiere bleus et verts pour les fetes de Noel', 'https://www.lejdc.fr/nevers-58000/loisirs/nevers-a-revetu-ses-habits-de-lumiere-bleus-et-verts-pour-les-fetes-de-noel_14051856/', 4, '2021-11-27', 'Le Journal Du Centre', 'https://www.urbalab.fr/wp-content/uploads/2016/03/journal-du-centre-500x500.jpg'),
('L\'Allemagne fait le pari du cannabis en vente libre', 'https://www.lefigaro.fr/international/l-allemagne-fait-le-pari-du-cannabis-en-vente-libre-20211126', 2, '2021-11-27', 'Le Figaro', 'https://static.lefigaro.fr/f1/lefigaro/metas/og-image.png'),
('The Last of Us : Des videos du tournage pour decouvrir la serie HBO', 'https://www-jeuxvideo-com.cdn.ampproject.org/v/s/www.jeuxvideo.com/amp/news/1498408/the-last-of-us-des-videos-du-tournage-pour-decouvrir-la-serie-hbo.htm?amp_js_v=a6&amp_gsa=1&usqp=mq331AQKKAFQArABIIACAw%3D%3D#aoh=16381014271131&referrer=https%3A%2F%2Fwww.google.com&amp_tf=Source%C2%A0%3A%20%251%24s&ampshare=https%3A%2F%2Fwww.jeuxvideo.com%2Fnews%2F1498408%2Fthe-last-of-us-des-videos-du-tournage-pour-decouvrir-la-serie-hbo.htm', 9, '2021-11-26', 'JeuxVideo.com', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Jeuxvideo.com_Logo.svg/1200px-Jeuxvideo.com_Logo.svg.png'),
('\"Resident Evil\", la franchise cinema morte vivante !', 'https://www.franceinter.fr/emissions/la-chronique-de-frederick-sigrist/la-chronique-de-frederick-sigrist-du-vendredi-26-novembre-2021', 7, '2021-11-26', 'France Inter', 'https://upload.wikimedia.org/wikipedia/fr/thumb/3/39/France_Inter_logo.svg/1200px-France_Inter_logo.svg.png'),
('Marche de Noel de Clermont-Ferrand : tout ce que vous devez savoir sur les festivites', 'https://france3--regions-francetvinfo-fr.cdn.ampproject.org/v/s/france3-regions.francetvinfo.fr/auvergne-rhone-alpes/puy-de-dome/clermont-ferrand/clermont-ferrand-tout-ce-que-vous-devez-savoir-sur-le-marche-de-noel-2337295.amp?amp_js_v=a6&amp_gsa=1&usqp=mq331AQKKAFQArABIIACAw%3D%3D#aoh=16381016120415&referrer=https%3A%2F%2Fwww.google.com&amp_tf=Source%C2%A0%3A%20%251%24s&ampshare=https%3A%2F%2Ffrance3-regions.francetvinfo.fr%2Fauvergne-rhone-alpes%2Fpuy-de-dome%2Fclermont-ferrand%2Fclermont-ferrand-tout-ce-que-vous-devez-savoir-sur-le-marche-de-noel-2337295.html', 10, '2021-11-16', 'France Info', 'https://www.myeventnetwork.com/sites/default/files/styles/open_graph/public/2019-07/FranceInfo-logo.png?itok=h7OFs7yZ'),
('LOUISE DE QUENGO, UNE BRETONNE DU XVIIE SIECLE', 'https://www.inrap.fr/louise-de-quengo-une-bretonne-du-xviie-siecle-16093', 1, '2021-11-15', 'Inrap', 'https://www.scienceaction.asso.fr/sites/default/files/annuaire/inrap_0.jpg'),
('Dune 2 : on sait quand debutera le tournage pour Timothee Chalamet et Zendaya', 'https://www-allocine-fr.cdn.ampproject.org/v/s/www.allocine.fr/amp/article/fichearticle_gen_carticle=18704230.html?amp_js_v=a6&amp_gsa=1&usqp=mq331AQKKAFQArABIIACAw%3D%3D#aoh=16381022714969&referrer=https%3A%2F%2Fwww.google.com&amp_tf=Source%C2%A0%3A%20%251%24s&ampshare=https%3A%2F%2Fwww.allocine.fr%2Farticle%2Ffichearticle_gen_carticle%3D18704230.html', 13, '2021-11-09', 'Allocine', 'https://pbs.twimg.com/profile_images/1421013538374660097/uo5Z1tE4_400x400.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
