<?php echo '<?xml version="1.0" encoding="UTF-8"?>';
if((isset($_GET['op'])) && ($_GET['op'] == 'envoi')){
$dbServ = $_POST['host'];
$dbBase = $_POST['database'];
$dbUser = $_POST['user'];
$dbPass = $_POST['password'];
try
{
        $bdd = new PDO('mysql:host='.$dbServ.';dbname='.$dbBase.'', $dbUser, $dbPass);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$filename = 'modele/connexion_sql.php';
$somecontent = '<?php
// Connexion à la base de données
try
{
    $bdd = new PDO(\'mysql:host='.$dbServ.';dbname='.$dbBase.'\', \''.$dbUser.'\', \''.$dbPass.'\');
}
catch(Exception $e)
{
    die(\'Erreur\'.$e->getMessage());
}
';

// Assurons nous que le fichier est accessible en écriture
if (is_writable($filename)) {

    // Dans notre exemple, nous ouvrons le fichier $filename en mode d'ajout
    // Le pointeur de fichier est placé à la fin du fichier
    // c'est là que $somecontent sera placé
    if (!$handle = fopen($filename, 'w')) {
         echo "Impossible d'ouvrir le fichier ($filename)";
         exit;
    }

    // Ecrivons quelque chose dans notre fichier.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Impossible d'écrire dans le fichier ($filename)";
        exit;
    }

    //echo "L'écriture de ($somecontent) dans le fichier ($filename) a réussi";

    fclose($handle);

} else {
    echo "Le fichier $filename n'est pas accessible en écriture.";
}
$req = $bdd->query('
-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 03 Janvier 2011 à 11:10
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `polytech`
--
DROP DATABASE `polytech`;
CREATE DATABASE `polytech` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `polytech`;

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `ID_produit` int(3) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codepostal` int(5) NOT NULL,
  `ville` varchar(150) NOT NULL,
  `pays` varchar(150) NOT NULL,
  `note` int(2) NOT NULL,
  `ID_membre` int(3) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `achat`
--

INSERT INTO `achat` (`ID`, `ID_produit`, `nom`, `prenom`, `mail`, `adresse`, `codepostal`, `ville`, `pays`, `note`, `ID_membre`) VALUES
(1, 5, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'fkdjfjsdkjfjds fdjskfjsdlkfsd\', 91400, \'Orsay\', \'France\', 0, 1),
(2, 8, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'Bat 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(3, 8, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'Bat 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(4, 8, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'Bat 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(7, 8, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'Bat 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(8, 8, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'Bat 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(9, 8, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'Bat 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(10, 8, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'Bat 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(11, 8, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'Bat 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(12, 8, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'BÃ¢t 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(13, 8, \'cÃ©dric\', \'boulet\', \'a_cedric_1@hotmail.com\', \'9rue andrÃ© leroi gourhan\', 78280, \'guyancourt\', \'france\', 0, 6),
(14, 8, \'cÃ©dric\', \'boulet\', \'a_cedric_1@hotmail.com\', \'9rue andrÃ© leroi gourhan\', 78280, \'guyancourt\', \'france\', 0, 6),
(15, 5, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'BÃ¢t 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(16, 8, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'BÃ¢t 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(17, 10, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'BÃ¢t 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1),
(18, 5, \'Beuque\', \'Romain\', \'admin@romainbeuque.fr\', \'BÃ¢t 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`nom`) VALUES
(\'Action\'),
(\'Aventure\'),
(\'Comique\'),
(\'Autres\'),
(\'Policier\'),
(\'Shonen\'),
(\'Seinen\'),
(\'One Shot\'),
(\'Science-fiction\'),
(\'Thriller\'),
(\'Drame\'),
(\'Fantasy\');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `note` int(2) NOT NULL,
  `lus` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`ID`, `nom`, `mail`, `website`, `message`, `note`, `lus`) VALUES
(2, \'Romain Beuque\', \'admin@romainbeuque.fr\', \'http://\', \'Bravo pour votre site!\', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `admin` int(2) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `codepostal` int(5) DEFAULT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`ID`, `pseudo`, `password`, `mail`, `date_inscription`, `admin`, `nom`, `prenom`, `adresse`, `codepostal`, `ville`, `pays`) VALUES
(1, \'Romain\', \'da68663e03dc49dfd247a41a390ca34cbc7f5c98\', \'admin@romainbeuque.fr\', \'2010-12-05\', 1, \'Beuque\', \'Romain\', \'BÃ¢t 620 - UniversitÃ© Paris Sud\', 91400, \'Orsay\', \'France\'),
(2, \'user\', \'7110eda4d09e062aa5e4a390b0a572ac0d2c0220\', \'user@membre.fr\', \'2010-12-05\', 0, \'\', \'\', \'\', NULL, \'\', \'\'),
(3, \'evilgamer\', \'6367c48dd193d56ea7b0baad25b19455e529f5ee\', \'bkzohrevand@gmail.com\', \'2010-12-05\', 1, \'\', \'\', \'\', NULL, \'\', \'\'),
(6, \'cedrox\', \'8de935be7554339537118ce6f5b640f022d95305\', \'a_cedric_1@hotmail.com\', \'2010-12-18\', 0, \'cÃ©dric\', \'boulet\', \'9rue andrÃ© leroi gourhan\', 78280, \'guyancourt\', \'france\'),
(7, \'Renan\', \'208bb3389c977565e00f8d52c3fe2ab0985077ac\', \'rerenl@hotmail.fr\', \'2011-01-02\', 1, \'Lossouarn\', \'Renan\', \'26 rue AndrÃ© ChÃ©nier\', 91300, \'MASSY\', \'France\'),
(8, \'admin\', \'7110eda4d09e062aa5e4a390b0a572ac0d2c0220\', \'admin@localhost.fr\', \'2011-01-03\', 1, \'\', \'\', \'\', NULL, \'\', \'\');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`ID`, `titre`, `texte`, `auteur`, `date`) VALUES
(10, \'Jules Vernes come back !!\', \'Bonjour Ã  tous !\r\n\r\nQui dit lecture dit culture, et la culture passe avant tout par les incontournables !! C\'\'est pourquoi Shoten\'\'Legend Ã  dÃ©cider de vous proposez les plus grands livres de Jules Verne. (Sympa non?)\r\n\r\nLa sÃ©rie Jules Verne commencera avec:\r\n-20 000 Lieues sous les mers.\r\n-Le tour du monde en 80 jours.\r\n\r\nPlein d\'\'autres seront bientÃ´t disponible !!\r\n\r\nDÃ©cidÃ©ment, vous n\'\'allez plus pouvoir dormir !\r\n\r\n\', \'Renan\', \'2010-12-18 09:35:15\'),
(2, \'Lancement du projet\', \'Bienvenue Ã  tous sur Shoten\'\'Legend !\r\nAujourd\'\'hui, c\'\'est le jour du lancement, et c\'\'est avec grand plaisir que nous vous accueillons dans notre boutique.\r\n\r\nÃ‰videmment, ce site n\'\'est pour l\'\'instant pas trop avancÃ©, mais en Ã©volution constante, n\'\'hÃ©sitez pas Ã  nous retourner les bugs que vous auriez pu constater !\r\n\r\nComme ce site est un projet universitaire, tous les achats fictifs ne seront pas expÃ©diÃ©s, alors Ã©vitez de sortir vos cartes bleus, sauf si vous voulez nous soutenir dans notre projet ! Merci Ã  tous!\', \'Romain\', \'2010-10-09 11:14:20\'),
(3, \'Avancement du dÃ©veloppement de la plateforme\', \'Bonsoir Ã  tous,\r\njuste un petit mot pour vous tenir informÃ© du dÃ©veloppement du site.\r\n\r\nComme vous le voyez, on avance Ã  grand pas, et tout est quasiment fini, Ã©tant donnÃ© que les fonctionnalitÃ©s de bases sont toutes terminÃ©s.\r\n\r\nBon surf Ã  tous\', \'Romain\', \'2010-12-21 21:25:00\'),
(8, \'SamuraÃ¯ Deeper Kyo dÃ©barque sur Shotenâ€™Legend !!!\', \'Comme promis, SDK arrive avec un premier volume qui promet une histoire Ã  la fois palpitante et originale.\r\n\r\nAmateur dâ€™art martiaux, de combat au sabre et de personnages dÃ©lirants, ce manga est pour vous !\r\n\r\nPS : Le 2eme volume sera trÃ¨s prochainement disponible sur notre site\r\n\r\nLa team Shotenâ€™\r\n\', \'Renan\', \'2011-01-02 18:47:03\'),
(9, \'SDK bientÃ´t sur Shoten\'\'Legend\', \'Salut Ã  tous !!\r\n\r\nSuite Ã  de nombreuses demandes, nous avons dÃ©cider de rajouter Ã  notre catalogue le manga SamuraÃ¯ Deeper Kyo, qui arrivera sous peu dans la boutique.\r\n\r\nEncore une fois... Vous nâ€™allez plus pouvoir dormir !\r\n\r\nLa team Shoten\'\'\', \'Renan\', \'2010-12-26 11:46:00\'),
(11, \'Jules Vernes come back !! (part 2)\', \'Bonjour chers lecteurs, c\'\'est Jules Verne qui vous parle.\r\n\r\nJe reviens aujourd\'\'hui avec un de mes plus grands roman, "L\'\'Ã®le mystÃ©rieuse".\r\nN\'\'attendez plus !!\r\n\r\nEt le J.V. Come Back continue !\r\n\r\nLa team Shoten\'\'\', \'Renan\', \'2010-12-26 16:03:42\');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `note` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`note`) VALUES
(10),
(8),
(6),
(7),
(7),
(9),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10),
(10);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `ID` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(70) NOT NULL,
  `auteur` varchar(70) NOT NULL,
  `image` varchar(150) NOT NULL,
  `website` varchar(150) NOT NULL,
  `ajout` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `achat` int(11) NOT NULL DEFAULT \'0\',
  `infos` text NOT NULL,
  `categorie` varchar(75) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`ID`, `titre`, `auteur`, `image`, `website`, `ajout`, `achat`, `infos`, `categorie`, `prix`) VALUES
(1, \'Wanted\', \'Eiichiro Oda\', \'http://manga-ar.com/admin/hstoryimg/1250175284_S.jpg\', \'http://\', \'2010-12-06 11:59:43\', 126, \'5 Oneshoot de Oda periode PrÃ© One Piece Le chap 5 "romance Dawn" introduit Luffy et est le Prototype de One Piece. D\'\'apres Oda il a dessinÃ© un Romance Dawn avant celui ci disponible dans le red grand characters. C\'\'est donc en fait "Romance Dawn 2" que l\'\'on y lit.\', \'One Shot\', 5.9),
(2, \'Battle Royale\', \' Masayuki Taguchi et Koushun Takami\', \'http://img140.imageshack.us/img140/7417/62759469kc9.jpg\', \'http://fr.wikipedia.org/wiki/Battle_Royale_(manga)\', \'2010-12-06 12:01:53\', 73, \'Une jeune classe de quarante deux Ã©lÃ¨ves est envoyÃ© dans une Ã®le dÃ©serte.\r\n Pensant faire un voyage scolaire,\r\n ces derniers sont surpris d\'\'apprendre qu\'\'ils sont en fait les protagonistes d\'\'un jeu organisÃ© par le gouvernement\r\n totalitaire, le Battle Royale.\r\n Tous les coups sont permis et il ne pourra en rester qu\'\'un Ã  la fin... !!! \', \'Seinen\', 0),
(3, \'Gantz - Tome 1\', \'Hiroya Oku\', \'http://www.adtrwiki.com/images/4/4e/Gantz.jpg\', \'http://gantzotaku.com/\', \'2010-12-06 12:20:46\', 75, \'Kei Kurono est un lycÃ©en de Tokyo relativement cynique et Ã©goÃ¯ste. Un jour, alors qu\'\'il attend son mÃ©tro, avec un ami d\'\'enfance (Masaru KatÃ´) qu\'\'il avait perdu de vue et qui se trouvait par hasard Ã  la gare, il est poussÃ© contre toute attente Ã  faire un geste hÃ©roÃ¯que : sauver un SDF ivre tombÃ© sur les voies. Mais ce sauvetage ne se dÃ©roule pas parfaitement, et Kurono et KatÃ´ meurent Ã©crasÃ©s.\r\nIls se retrouvent alors mystÃ©rieusement dans une piÃ¨ce d\'\'appartement au centre de laquelle se trouve une Ã©trange sphÃ¨re noire rÃ©pondant au nom de Gantz. Ils ne sont pas seuls dans cette salle et se poseront de nombreuses questions : Sont-ils morts ? Participent-ils Ã  un de ces jeux tÃ©lÃ©visÃ©s Ã  la mode plus communÃ©ment appelÃ© TÃ©lÃ© rÃ©alitÃ© ? Ou bien mÃªme Ã  une expÃ©rience top secret menÃ©e par l\'\'armÃ©e ?\r\nLes protagonistes ne cesseront de s\'\'interroger sur ce lieu, sur leur situation, et le sens de ce qui leur arrive, puisqu\'\'ils devront mener d\'\'Ã©tranges Â« missions Â» toutes plus dangereuses les unes que les autres.\r\nLe manga se distingue notamment de par une ambiance intimiste et sa grande violence, aussi bien physique que psychologique. En effet, il se trouve jalonnÃ© de combats sanglants, de scÃ¨nes Ã©rotiques ou encore de paroles parfois plus ou moins crues (avec cynisme, humour noir...), ainsi que de rÃ©flexions ou de mÃ©canismes sombres et difficiles. L\'\'intrigue pose par ailleurs un nombre non nÃ©gligeable de questions laissÃ©es en suspens renforÃ§ant une impression de flou. S\'\'ajoute Ã  cela une atmosphÃ¨re indicible des plus mystÃ©rieuses, plutÃ´t glauque, et un certain huis-clos venant accentuer cette idÃ©e de noirceur ou d\'\'oppression. La musique est dans la continuitÃ©... Cela gÃ©nÃ¨re toutefois une sensation d\'\'intimitÃ© entre le rÃ©cit et le lecteur, entre les personnages du manga, et donc paradoxalement une relative chaleur s\'\'opposant Ã  la froideur ambiante. Enfin, une bonne partie de la narration est dÃ©veloppÃ©e Ã  travers les pensÃ©es et les analyses du hÃ©ros.\r\n\', \'Seinen\', 9.9),
(4, \'One Piece - Tome 1\', \'Eiichiro Oda\', \'http://www.decitre.fr/gi/58/9782723433358FS.gif\', \'http://fr.wikipedia.org/wiki/One_Piece\', \'2010-12-06 12:29:33\', 78, \'One Piece met en scÃ¨ne les aventures de Luffy un apprenti pirate Ã  la recherche d\'\'un trÃ©sor fabuleux appelÃ© le One Piece. Ce trÃ©sor appartenait Ã  Gold Roger, le dernier seigneur des pirates, jusqu\'\'Ã  sa mise Ã  mort par la marine. Luffy dÃ©cide de prendre la mer aprÃ¨s sa rencontre avec Shanks Le Roux, le capitaine d\'\'un navire de pirates qui a passÃ© quelques jours dans son village et l\'\'a sauvÃ© d\'\'un monstre marin en sacrifiant son bras. Depuis, Luffy lui voue une admiration sans limites et porte en permanence le chapeau de paille qu\'\'il lui a offert, et le conserve comme Â« un trÃ©sor Â» afin de pouvoir lui rendre Ã  leur prochaine rencontre. C\'\'est Ã  cette Ã©poque qu\'\'il mange un fruit du dÃ©mon que dÃ©tenait Shanks, ce qui le rendit Ã©lastique. Cette capacitÃ©, pratique lors de combats, a le dÃ©faut de rendre son possesseur incapable de nager (il coule comme une enclume comme toutes les personnes soumises Ã  la malÃ©diction des fruits du dÃ©mon, ce qui rend toute action dans lÂ´eau impossible). Lors de sa traversÃ©e des mers, notre hÃ©ros rencontrera de nombreuses personnes qui deviendront rapidement ses amis et formera un Ã©quipage avec certains d\'\'entre eux. Ils vivront alors toutes sortes d\'\'aventures drÃ´les et parfois moins drÃ´les, et devront se confronter Ã  de nombreux Ã©quipages pirates.\', \'Shonen\', 5.9),
(5, \'La roue du temps - Tome 1\', \'Robert Jordan\', \'http://jeunesse.lille3.free.fr/IMG/La_roue_du_temps.jpg\', \'http://fr.wikipedia.org/wiki/La_Roue_du_temps\', \'2010-12-13 12:08:10\', 246, \'Trois jeunes villageois, Rand, Mat et Perrin, se trouvent un jour arrachÃ©s Ã  la vie paisible de leur village, dans la rÃ©gion reculÃ©e des Deux-RiviÃ¨res et oubliÃ©e de l\'\'Andor. Tout commence lorsque Moiraine, une Aes Sedai arrive au village avec son lige, Lan. C\'\'est un Ã©vÃ¨nement extraordinaire pour la petite communautÃ©. Malheureusement, la nuit suivante, le village se fait attaquer par une armÃ©e de Trollocs (monstres issus des expÃ©riences du RÃ©prouvÃ© Aginor) qui semblent viser trois habitations en particulier : celles de Mat, Perrin et de Rand. GuidÃ©s par Moiraine et son lige et accompagnÃ©s par Thom Merrilin, le mÃ©nestrel, ils fuient les Deux RiviÃ¨res, tentant d\'\'Ã©chapper aux crÃ©atures du TÃ©nÃ©breux. Dans leur fuite, Egwene, "l\'\'apprentie sagesse" les accompagne, car elle a vu le comportement suspect de Mat et de Perrin. Moiraine accepte Egwene sans problÃ¨me, car elle a dÃ©celÃ© une trÃ¨s grande capacitÃ© Ã  Å“uvrer avec le Pouvoir Unique en elle. Nynaeve, la Sagesse du village qui croit Ã  une manipulation des Aes Sedai et qui a la ferme intention de ramener les jeunes hÃ©ros chez eux ; finalement elle accepte la vÃ©ritÃ© - que Moiraine tentait de lui expliquer - lorsqu\'\'un Myrddraal s\'\'introduit dans l\'\'auberge de Baerlon. Elle est contrainte de les suivre contre son grÃ© pour les protÃ©ger, mais aussi parce qu\'\'elle dispose du mÃªme don qu\'\'Ewgene.\r\n\r\nEn partant de Baerlon, la poursuite les force Ã  passer par Shadar Logoth, une ville qui fut corrompue par la mÃ©fiance pendant les guerres trolloques et dont un mal s\'\'est emparÃ©, un mal qui dÃ©teste les crÃ©atures du TÃ©nÃ©breux et dont une pierre touchÃ©e peut corrompre une Ã¢me Ã  jamais. Mat, qui Ã©tait Ã  la recherche de gloire et de richesses, y dÃ©robe un poignard en or incrustÃ© d\'\'un rubis, que Mordeth (le seul survivant de Shadar Logoth, ancien conseiller du roi, qui a emmenÃ© la souillure) lui a proposÃ©. Ce poignard corrompt Mat, qui tombe malade alors que le groupe a Ã©tÃ© sÃ©parÃ© en trois Ã©quipes devant se retrouver Ã  Pont-Blanc ou Caemlyn et que Mat est seul avec Rand, qui ne se doute pas du mal qui s\'\'attaque Ã  Mat.\r\n\r\nAu cours de la fuite, chacun des jeunes gens se dÃ©couvre un pouvoir spÃ©cial, et dÃ©couvre qu\'\'ils sont tous les trois des Ta\'\'veren, ce qui veut dire que les fils du destin se tissent autour d\'\'eux. Rand est le Ta\'\'veren le plus puissant, celui qui le rencontre voit sa vie changer sans qu\'\'il ne puisse rien faire. Se trouver Ã  proximitÃ© de Rand ou d\'\'un autre Ta\'\'veren, c\'\'est ne plus Ãªtre maÃ®tre de son destin, les fils du sien s\'\'enroulent autour de celui du Ta\'\'veren, et le Dessin est considÃ©rablement modifiÃ©.\', \'Fantasy\', 12.9),
(6, \'20 000 lieues sous les mers\', \'Jules Vernes\', \'http://multimedia.fnac.com/multimedia/images_produits/ZoomPE/3/0/3/9782700014303.jpg\', \'http://fr.wikipedia.org/wiki/Vingt_Mille_Lieues_sous_les_mers\', \'2010-12-13 12:19:07\', 53, \'Dans ce roman, le scientifique franÃ§ais Pierre Aronnax, son fidÃ¨le domestique Conseil et le harponneur canadien Ned Land sont capturÃ©s par le capitaine Nemo qui navigue dans les ocÃ©ans du globe Ã  bord du sous-marin Nautilus. L\'\'aventure donne l\'\'occasion de descriptions Ã©piques (dont un enterrement sous-marin, un combat contre des calmars gÃ©ants, etc.).\r\n\r\nL\'\'Å“uvre d\'\'anticipation, Vingt mille lieues sous les mers comporte plusieurs Ã©pisodes qui tÃ©moignent de l\'\'imagination de son auteur : le Nautilus passe sous le canal de Suez avant sa percÃ©e officielle, et sous l\'\'Antarctique, dont on ignorait Ã  l\'\'Ã©poque qu\'\'il s\'\'agissait d\'\'un continent et non de glace flottante, comme l\'\'Arctique.\r\n\r\nOn notera avec curiositÃ© que L\'\'Ã®le mystÃ©rieuse (autre roman de Jules Verne) constitue une suite Ã  Vingt mille lieues sous les mers\', \'Aventure\', 10),
(7, \'L\'\'ile mystÃ©rieuse\', \'Jules Vernes\', \'http://www.devoir-de-philosophie.com/images_fiches_de_lecture/6991.jpg\', \'http://fr.wikipedia.org/wiki/L%27%C3%8Ele_myst%C3%A9rieuse_%28roman%29\', \'2010-12-13 12:21:19\', 58, \'L\'\'Ã®le mystÃ©rieuse raconte l\'\'histoire de cinq personnages : l\'\'ingÃ©nieur Cyrus Smith, son domestique Nab, le journaliste GÃ©dÃ©on Spilett, le marin Pencroff et l\'\'adolescent Harbert. Pour Ã©chapper au siÃ¨ge de Richmond pendant la guerre de SÃ©cession, ils dÃ©cident de fuir Ã  l\'\'aide d\'\'un ballon en plein ouragan, mais Ã©chouent sur une Ã®le dÃ©serte qu\'\'ils baptiseront l\'\'Ã®le Lincoln. AprÃ¨s avoir menÃ© une exploration de l\'\'Ã®le, ils s\'\'y installent en colons mais quelque chose semble veiller sur eux : qui ? quoi ? comment ? et pourquoi ? Comment vont-ils survivre entre la vie sauvage et les personnes qui les entourent.\', \'Aventure\', 20),
(9, \'Le tour du monde en 80 jours\', \'Jules Vernes\', \'http://christianbodier.typepad.com/entreprendre_dans_le_etou/images/le_tour_du_monde_en_80_jours.jpg\', \'http://fr.wikipedia.org/wiki/Le_Tour_du_monde_en_quatre-vingts_jours\', \'2011-01-02 16:05:10\', 0, \'Le Tour du monde en quatre-vingts jours est un roman d\'\'aventures, Ã©crit en 1872 par Jules Verne et publiÃ© en 1873 par Pierre-Jules Hetzel Ã  Paris. Il parut en feuilleton dans Le Temps du 6 novembre au 22 dÃ©cembre 1872.\r\n\r\nLe roman raconte la course autour du monde d\'\'un gentleman anglais, Phileas Fogg, qui a fait le pari d\'\'y parvenir en 80 jours. Il est accompagnÃ© par Jean Passepartout, son serviteur franÃ§ais. L\'\'ensemble du roman est un habile mÃ©lange entre rÃ©cit de voyage (traditionnel pour Jules Verne) et donnÃ©es scientifiques comme celle utilisÃ©e pour le rebondissement de la chute du roman.\r\n\r\nCe voyage extraordinaire est rendu possible grÃ¢ce Ã  la rÃ©volution des transports qui marque le XIXe siÃ¨cle et les dÃ©buts de la rÃ©volution industrielle. L\'\'apparition de nouveaux modes de transport (chemin de fer, marine Ã  vapeur) et l\'\'ouverture du canal de Suez en 1869 raccourcissent les distances, ou du moins le temps nÃ©cessaire pour les parcourir.\', \'Aventure\', 7.9),
(10, \'Berserk - Tome 1\', \'Kentaro Miura\', \'http://www.mangas-x-mangas.net/wp-content/uploads/2010/09/berserk.jpg\', \'http://www.apresleclipse.net/accueil.php\', \'2011-01-02 16:09:34\', 23, \'Dans un univers mÃ©diÃ©val impitoyable survit un jeune guerrier orphelin nommÃ© Guts. N\'\'ayant appris de son tuteur que la seule loi des armes, il cherche dans son Ã©pÃ©e sa raison de vivre, jusqu\'\'Ã  sa rencontre avec la bande du faucon, une jeune armÃ©e de mercenaires issue de milieu paysan, invaincue sur un champ de bataille. Perdant un combat contre leur chef, le jeune et charismatique Griffith, Guts se voit dans l\'\'obligation de les rejoindre. TrÃ¨s vite, une Ã©trange amitiÃ© naÃ®t entre les deux jeunes hommes, et Guts, suite Ã  des victoires Ã©crasantes, devient commandant des troupes d\'\'assaut de la bande des faucons. Mais que cherche vraiment l\'\'Ã©nigmatique Griffith, qu\'\'est-il prÃªt Ã  sacrifier pour rÃ©aliser son rÃªve ? Guts va-t-il trouver une autre raison de vivre que le maniement de son impressionnante Ã©pÃ©e ? Et jusqu\'\'oÃ¹ ces deux hommes vont-ils emmener la bande du faucon ? \', \'Seinen\', 9.9),
(11, \'Gunnm Last Order - Tome 1\', \'Yukito Kishiro\', \'http://www.manga-news.com/public/images/series/gunnm_lo_01.jpg\', \'http://fr.wikipedia.org/wiki/Gunnm_Last_Order\', \'2011-01-02 16:12:59\', 18, \'Cette nouvelle sÃ©rie de manga constitue une sorte de Â« continuitÃ© Â» alternative Ã  Gunnm, qui avait dÃ» Ãªtre arrÃªtÃ© brutalement par l\'\'auteur. Il offre ainsi Ã  Gally, hÃ©roÃ¯ne du manga originelle, la suite qu\'\'il lui avait rÃ©servÃ©. L\'\'intrigue prend dans ce manga une autre tournure. Gally quitte la dualitÃ© de Kuzutetsu et Zalem pour un nouveau dÃ©cor : L\'\'espace. Ainsi Gunnm Last Order prend des allures de space opera. Mais son but premier est avant tout de revenir sur le passÃ© de Gally, et de mieux comprendre l\'\'univers dÃ©peint dans Gunnm.\', \'Seinen\', 9.9),
(12, \'Gunnm - Tome 6\', \'Yukito Kishiro\', \'http://media.zoom-cinema.fr/photos/news/3025/gunnm5.jpg\', \'http://fr.wikipedia.org/wiki/Gunnm\', \'2011-01-02 16:15:28\', 32, \'Gunnm (éŠƒå¤¢, ganmu?, litt. Â« rÃªve d\'\'une arme Â») est une bande dessinÃ©e japonaise de Yukito Kishiro prÃ©-publiÃ©e entre 1990 et 1995 dans le magazine Business Jump publiÃ© par Shueisha et publiÃ© en neuf volumes. En France, la sÃ©rie est Ã©ditÃ©e en neuf volumes par GlÃ©nat entre 1995 et 1998.\r\n\r\nL\'\'histoire de Gunnm est une uchronie dystopique basÃ©e sur une catastrophe Ã©cologique due Ã  la collision d\'\'une mÃ©tÃ©orite avec la Terre, amenant l\'\'humanitÃ© au bord de l\'\'extinction. Zalem est une ville suspendue qui dÃ©verse ses ordures sur Kuzutetsu â€“ la dÃ©charge â€“ oÃ¹ la lie de l\'\'humanitÃ© survit dans la violence. Cette histoire raconte la renaissance d\'\'une cyborg amnÃ©sique qui va chercher un sens Ã  sa vie.\', \'Seinen\', 9.9),
(15, \'Everworld - A la recherche de Senna\', \'K.A. Applegate\', \'http://static.letsbuyit.com/filer/images/fr/products/original/86/22/everworld-tome-1-a-la-recherche-de-senna-8622530.jpeg\', \'http://fr.wikipedia.org/wiki/Everworld\', \'2011-01-02 16:33:33\', 14, \'David Levin, Christopher Hitchcock, April O\'\'Brien et Jalil Sherman vivent Ã  Chicago. Tous ont un lien avec une Ã©trange fille, Senna Wales. Un jour, alors qu\'\'ils se retrouvent tous sans raison prÃ¨s du lac Michigan, Senna est enlevÃ©e par un loup gigantesque venu de nulle part, qui entraÃ®ne les cinq adolescents dans un monde parallÃ¨le, Everworld. Celui a Ã©tÃ© crÃ©Ã© par les anciens dieux des mythologies antiques, pour les dieux. Mais ce havre est devenu aujourd\'\'hui un enfer, et tous sont menacÃ©s par un nouveau venu, un dieu extraterrestre qui dÃ©vore ses semblables. Senna, la sorciÃ¨re, le passage entre les mondes, pourrait Ãªtre une chance de lui Ã©chapper... mais celle-ci a d\'\'autres projets.\', \'Fantasy\', 6.9),
(14, \'Naruto - Tome 1\', \'Masashi Kishimoto\', \'http://www.narutotrad.com/uploads/tx_mangas/naruto-tome1.jpg\', \'http://fr.wikipedia.org/wiki/Naruto\', \'2011-01-02 16:20:09\', 102, \'Naruto ( ãƒŠãƒ«ãƒˆ, Naruto?) est un shÅnen manga nekketsu Ã©crit et dessinÃ© par Masashi Kishimoto. Naruto est prÃ©publiÃ© dans l\'\'hebdomadaire Weekly ShÅnen Jump de l\'\'Ã©diteur ShÅ«eisha depuis novembre 1999, et a Ã©tÃ© compilÃ© en 53 tome fin 2010.\r\n\r\nSuite au succÃ¨s du manga, une adaptation en anime par le Studio Pierrot et Aniplex a Ã©tÃ© rÃ©alisÃ© et est diffusÃ© sur TV TÅkyÅ depuis le 3 octobre 2002. Une seconde partie du rÃ©cit a vu le jour et a Ã©tÃ© renommÃ©e Naruto ShippÅ«den lors de son adaptation.\', \'Shonen\', 5.9),
(16, \'Samurai Deeper Kyo - Tome 1\', \'Akimine Kamijyo\', \'http://www.decitre.fr/gi/83/3600121034983FS.gif\', \'http://fr.wikipedia.org/wiki/Samurai_deeper_Kyo\', \'2011-01-02 18:54:59\', 53, \'Un jeune pharmacien, Kyoshiro Mibu, rencontre une jeune femme qui se dit asthmatique et souhaite la soigner. Mais cette femme se rÃ©vÃ¨le Ãªtre en fait Yuya Shiina, une cÃ©lÃ¨bre chasseuse de prime, Â« celle qui se trouve partout sur la route de Tokai Â». Elle croit avoir reconnu en Kyoshiro le portrait du grand meurtrier Kyo aux yeux de dÃ©mon, l\'\'homme aux 1 000 victimes...\', \'Shonen\', 5.9);
') or die(print_r($req->errorInfo()));

$req->closeCursor();
echo'<br /><br />Correctement envoyé. Vous disposez d\'un compte administrateur (admin / 1234) et d\'un compteur utilisateur normal de test (user/1234)<br /><strong>Attention ! Le fichier _datas_connexions_sql.php doit être modifié avec les données rentrés précédement !</strong><br />';
            } else {

?>


<form action="install.php?op=envoi" method="post" enctype="multipart/form-data" id="formulaire-install">
    <fieldset style="text-align:center; margin-left:5px; margin-right:5px;">
        <legend>Installation</legend>
        <label for="user">Utilisateur :</label> <input type="text" name="user" id="user" value="root" size="55" /><br />
        <label for="password">password :</label> <input type="text" name="password" id="password" value="" size="51" /><br />
        <label for="host">Serveur :</label> <input type="text" name="host" id="host" value="localhost" size="54" /><br /><br />
        <label for="database">base de données :</label> <input type="text" name="database" id="database" value="polytech" size="75" /><br /><br />
        <input type="reset" value="Réinitialiser" />
        <input type="submit" value="Envoyer!" />
    </fieldset>
</form> <?php } ?>