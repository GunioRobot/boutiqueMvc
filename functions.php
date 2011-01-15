<?php
/* Définition des ingformations de connexions qui seront inclus dans toutes les pages
 * Comme ces variables ne peuvent être utilisés par les fonctions çi-dessous sans les rédefinir
 *  à l'intérieur de la fonction, on le transmettera en paramètres
 */


$titreWebSite = 'Shoten\'Legend';
$sloganWebSite = 'Vous n\'allez plus pouvoir dormir!';
$rgxNom = array("#^[a-zA-Z_é' èàêëâç-]{2,45}$#", '2', '45');
$rgxPseudo = array("#^[a-z0-9A-Z_'\^@.`\-]{3,45}$#", '3', '45');
$rgxTitre = array("#^[a-zA-Z_'\-.`0-9_é èâ\"àê!:;,/.?)(ëç@&]{1,100}$#", '1', '100');
$rgxAdresse = array("#^[a-zA-Z_é' èà0-9ê,ëâç-]{10,100}$#", '10', '100');
$rgxPassword = array('#^.{4,45}$#', '4', '45');
$rgxPostal = array('#^[0-9]{5}$#', '5', '5');
$rgxPrix = array('#^[0-9]{1,8}.[0-9]{0,2}$#', '0', '2');
$rgxMail = array('#^[a-zA-Z0-9._-]+@[a-z0-9._-]{1,}\.[a-z]{2,4}$#', '2', '4');
$rgxNombre = array('#^[0-9]+$#', '1', '');
$rgxDate = array('#^[\d]{4}-[\d]{2}-[\d]{2} [\d]{2}:[\d]{2}:[\d]{2}$#', '19', '19');

/*function connectBDD()
{
// Fonction de connexion à la base de données, qui retourne l'objet $bdd
//Les informations de connexions sont définis dans un fichier à part, plus pratique lorsqu'on change de plateforme d'hébergements lors du développement
    global $dbServ, $dbBase, $dbUser, $dbPass;
    try
    {
        $bdd = new PDO('mysql:host='.$dbServ.';dbname='.$dbBase.'', $dbUser, $dbPass);
    }
    catch(Exception $e)
    {
        die('<br /><br /><br /><div style="text-align:center;">Erreur : '.$e->getMessage().'</div>');
    }
    return $bdd;
}*/

function insertFlood($ip){
    global $bdd;

    $date = time();
    $req = $bdd->prepare('INSERT INTO flood VALUES (?, '.$date.')');
    $req->execute(array($ip)) or die(print_r($req->errorInfo()));
    $req->closeCursor();

    $date -= 10;
    $req = $bdd->prepare("DELETE FROM `polytech`.`flood` WHERE `flood`.`time` < ?");
    $req->execute(array($date)) or die(print_r($req->errorInfo()));
    return 1;
}

function selectFlood($ip){
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM `flood` WHERE IP = ? ORDER BY `flood`.`time` DESC LIMIT 0,1');
    $req->execute(array($ip)) or die(print_r($req->errorInfo()));
    $result = $req->fetch();
    if($result){
    return $result['time'];}
    else{return 1;}
}


function menu_top($page)
{
    global $bdd;
//affichage du menu de haut de page
//les pages administrateur se trouvant dans un dossier séparé, le paramètre $isAdmin indique si la page se trouve dans le dossier isAdmin, pour permettre le passage au dossier parent lorsque nécessaire
//la variable $page permet de colorer l'élément du menu sur lequel on se trouve actuellement, en rajoutant la classe 'active'
    echo '<a href="index.php"'; if($page == 'accueil'){ echo ' class="active" '; } echo '>Accueil</a>';
    echo ' ~ <a href="boutique.php"'; if($page == 'boutique'){ echo ' class="active" '; } echo '>Boutique</a>';
    echo ' ~ <a href="liste-produits.php"'; if($page == 'liste-produits'){ echo ' class="active" '; } echo '>Liste de tous nos produits</a>';
    echo ' ~ <a href="contact.php"'; if($page == 'contact'){ echo ' class="active" '; } echo '>Contact</a>';
    echo ' ~ <a href="equipe.php"'; if($page == 'equipe'){ echo ' class="active" '; } echo '>Equipe</a>';
//pour l'affichage des éléments Inscription / Connexion, il faut que le membre ne soit pas déjà connecté
    if ($_SESSION['login'] == false) {
        echo ' | | <a href="membre.php?op=register"'; if($page == 'membre-register'){ echo ' class="active" '; } echo '>Inscription</a>';
        echo ' ~ <a href="membre.php?op=login"'; if($page == 'membre-login'){ echo ' class="active" '; } echo '>Connexion</a>';
    }
//pour l'affichage des éléments déconnexion et espace membre, il faut que le membre soit déjà connecté
    if ($_SESSION['login']) {
        echo ' | | <a href="membre.php?op=panel"'; if($page == 'membre-panel'){ echo ' class="active" '; } echo '>Espace Membre</a>';
        echo ' ~ <a href="membre.php?op=logout"'; if($page == 'membre-logout'){ echo ' class="active" '; } echo '>Déconnexion</a>';
    }
//pour l'affichage de l'élément 'administration', il faut que le membre soit administrateur
    if ($_SESSION['login']) {
        //on séléection le profil du membre connecté actuellement
        $req = $bdd->prepare('SELECT admin FROM membres WHERE ID = ? ');
        $req->execute(array($_SESSION['ID'])) or die(print_r($req->errorInfo()));
        $donnees = $req->fetch();
        //si la colonne admin n'est pas à 1, alors le membre n'est pas admin, alors on lui attribue une variable $admin égale à 0
        if ($donnees['admin'] != '1'){
                $admin = 0;
        }
        //sinon, il est administrateur, variable $admin égale à 1
        else {$admin = 1;}
        $req->closeCursor();}
//si le membre est toujours connecté, et que la variable $admin est égale à 1, dans ce cas, on affiche l'élement administration
    if($_SESSION['login'] AND $admin == 1) {
        echo ' ~ <a href="admin.php"'; if($page == 'admin'){ echo ' class="active" '; } echo '>Admin</a>';
    }
}

function areYouAdmin(){
    global $bdd;
    if ($_SESSION['login']) {
        //on séléection le profil du membre connecté actuellement
        $req = $bdd->prepare('SELECT admin FROM membres WHERE ID = ? LIMIT 0,1');
        $req->execute(array($_SESSION['ID'])) or die(print_r($req->errorInfo()));
        $donnees = $req->fetch();
        //si la colonne admin n'est pas à 1, alors le membre n'est pas admin, alors on lui attribue une variable $admin égale à 0
        if ($donnees['admin'] != '1'){
                $admin = 0;
        }
        //sinon, il est administrateur, variable $admin égale à 1
        else {$admin = 1;}
        $req->closeCursor();
        return $admin;
        }
        else{return 0;}
}

function menu_left($page){
//MENU DE GAUCHE : affichage d'infos en fonction du statut de connexion de l'utilisateur
    //si l'utilisateur est connecté
    global $bdd;
    if($_SESSION['login']){
        $req = $bdd->prepare('SELECT * FROM membres WHERE ID = ? ');
        $req->execute(array($_SESSION['ID'])) or die(print_r($req->errorInfo()));
        $donnees = $req->fetch();
        ?>
        <div style="text-align:center;">
            Bienvenue <strong><?php echo $_SESSION['pseudo'] ?></strong><br /><br />
            <?php
            //Si les données personnelles nom/prénom/adresse ne sont pas remplis dans son profil, on lui propose de les remplir
            if(empty($donnees['nom']) OR empty($donnees['prenom']) OR empty($donnees['adresse'])){ ?>
                N'hésitez pas à remplir votre profil afin de faciliter vos futurs achats !<br />
                <a href="membre.php?op=panel">Rendez vous ici !</a>
            <?php }
            //sinon, si les données sont remplis, on lui accorde une réduction
            else { ?>
                Avec un profil membre complètement rempli, vous gagnez du temps et de l'argent! Une réduction de 10% sur nos produits vous est accordé automatiquement lors d'un achat PayPal.
            <?php } ?>
            <br /><br /><hr /><br />
            n° client : <strong><?php echo $_SESSION['ID'] ?></strong>
        </div>
    <?php }
    //sinon, l'utilisateur n'est pas connecté, on lui propose de se connecter ou de s'inscrire
    else { ?>
        <div style="text-align:center;">
            Toujours pas inscris ? <br />
            <a href="membre.php?op=register">Inscrivez vous !</a>
            <br /><br />Déjà inscris ?<br />
            <a href="membre.php?op=login">Connectez-vous !!</a>
        </div>
    <?php }
}


function blockTop1(){
    global $bdd;
//fonction d'affichage du block TOP 1 des ventes dans le menu gauche
    echo'<div id="top1" class="block-gauche" style="text-align:center;" >
                <div class="head-block">top 1</div>';
    $req = $bdd->query('SELECT * FROM produits ORDER BY achat DESC LIMIT 0,1 ') or die(print_r($bdd->errorInfo()));
    $temp = $req->fetch();
    echo '<a href="fiche.php?id='. $temp['ID'] .'" class="a-img"><img src="'. $temp['image'] .'" alt="'. $temp['titre'] .'" style="max-width:175px; max-height:250px;" /></a><br />
    <a href="fiche.php?id='. $temp['ID'] .'" >'. $temp['titre'] .' (acheté '. $temp['achat'] .' fois)</a>';
    $req->closeCursor();
    echo'
            </div>';
}
function checkLogin(){
//Fonction checkLogin : vérification des cookies pour une reconnexion automatique de l'utilisation
    //si aucune information de session n'existe, on crée une session 'login' à false pour dire l'user n'est pas connecté
    if(!isset($_SESSION['login'])){ $_SESSION['login'] = false; }
    //si l'utilisateur n'est pas connecté, et qu'il possède les cookies de connexion, on va essayer de le connecter
    if(($_SESSION['login'] == false) AND (isset($_COOKIE['pseudo'])) AND (isset($_COOKIE['sha1']))){
        global $bdd;
        //on vérifie qu'un utilisateur avec le même pseudo et mot de passe existe dans la base de donnée
        $req = $bdd->prepare('SELECT ID, pseudo FROM membres WHERE pseudo = :pseudo AND password = :password');
        $req->execute(array('pseudo' => $_COOKIE['pseudo'], 'password' => $_COOKIE['sha1'])) or die(print_r($req->errorInfo()));
        $resultat = $req->fetch();
        //si cet utilisateur existe, on crée les informations de sessions pour lui, et on passe la session 'login' à true : utilisateur connecté
        if ($resultat)
        {
            $_SESSION['ID'] = $resultat['ID'];
            $_SESSION['pseudo'] = $resultat['pseudo'];
            $_SESSION['login'] = true;
            return true;
        }
        //sinon, l'utilisateur n'est pas reconnu, on ne crée pas de sessions, et on laisse la session 'login' à false
        $req->closeCursor();
    }
    return false;
}

function verifUserIsAdmin(){
//fonction verifUserIsAdmin : fonction qui vérifie dans la base de donnée si l'utilisateur est administrateur et est autorisé à accéder à des pages protégés
    //si l'utilisateur est connecté, on va vérifier ses accréditations
    if($_SESSION['login'] == true){
        global $bdd;
        $req = $bdd->prepare('SELECT admin FROM membres WHERE ID = ? ');
        $req->execute(array($_SESSION['ID'])) or die(print_r($req->errorInfo()));
        $donnees = $req->fetch();
        //on a récupérer l'information admin sur le membre en cours. vérification de ses accréditations
        if ($donnees['admin'] != '1'){
            //l'utilisateur a une infos 'admin' différente de 1 : il n'est pas admin
            $go = 'notAdmin';
        }
        //sinon, il est admin
        else {$go = 'isAdmin';}
        $req->closeCursor();
    }
    //si l'utilisateur n'est pas connecté, il pourrait être admin, mais on ne peut le vérifier, on lui demande de se connecter
    else {$go = 'notLogged';}
    switch ($go)
    {
        //cas où l'utilisateur est Administrateur : on ne fait rien, il aura accès à la page
        case 'isAdmin':
        break;

        //cas où l'utilisateur n'est pas Administrateur : affichage d'une erreur javascript puis redirection vers l'espace membre
        case 'notAdmin': printHeader('erreur-admin', true, 'Boutique - Erreur - Administration', true);
        echo '<script language="javascript">alert("Vous n\'êtes pas administrateur! \nVous ne pouvez donc pas accéder à cette page")</script>';
        echo '<script language="javascript">window.location = "../membre.php?op=panel"</script>';
        //si l'utilisateur a désactivé le javascript, il ne faut pas qu'il puisse accéder à l'admin en outrepassant le script
        echo '<div id="administration-menu" class="block-middle" style="text-align:center;">
                <div class="head-block">administration</div><br />
                <strong>Erreur : </strong>Vous n\'êtes pas administrateur! <br />
                Vous ne pouvez donc pas accéder à cette page <br /><br />
                <a href="../index.php">Retour à la page d\'accueil</a>
            </div>';
        printFooter();
        die; break;

        //cas où l'utilisateur n'est pas connecté : affichage d'une erreur javascript puis redirection vers la page de connexion
        case 'notLogged': printHeader('erreur-admin', true, 'Boutique - Erreur - Administration', true);
        echo '<script language="javascript">alert("Vous n\'êtes pas connecté! \nVous ne pouvez donc pas accéder à cette page")</script>';
        echo '<script language="javascript">window.location = "../membre.php?op=login"</script>';
        //si l'utilisateur a désactivé le javascript, il ne faut pas qu'il puisse accéder à l'admin en outrepassant le script
        echo '<div id="administration-menu" class="block-middle" style="text-align:center;">
                <div class="head-block">administration</div><br />
                <strong>Erreur : </strong>Vous n\'êtes pas connecté! <br />
                Vous ne pouvez donc pas accéder à cette page <br /><br />
                <a href="../membre.php?op=login">Connexion</a>
            </div>';
        printFooter();
        die; break;
    }
}

function bloquageUser($haveToBeLogin, $message){
switch ($haveToBeLogin) {
    case true:
//si l'utilisateur n'est pas connecté, il n'a pas le droit d'accès à l'interface membre
if(!$_SESSION['login']){
    postHeader('membre-panel', false, 'Boutique - Erreur - Espace Membre', false);
    echo '<script language="javascript">alert("Vous n\'êtes pas connecté! \nImpossible d\'accéder à l\'interfaçe membre")</script>';
    echo '<script language="javascript">window.location = "membre.php?op=login"</script>';
    //dans le cas où l'utilisateur a désactivé le javascript, on affiche un message simple qui ne fait pas de redirection automatique ?>
    <div id="erreur-panel" class="block-middle" style="text-align:center;">
        <div class="head-block">espace membre - erreur</div><br />
        <strong>Erreur : </strong>Vous n'êtes pas connecté! <br />
        Impossible d'accéder à l'interface membre. <br /><br />
        <a href="membre.php?op=login">Connexion</a>
    </div>
    <?php postFooter(); die;
}

    break;


    case false:
    break;
}



}



function verificationFormulaire($variableAVerifier, $pregmatch, $messageErreur, $texteDefaut){
    if(empty($variableAVerifier))
    {
        $message = $messageErreur.' (champs vide)';
        return $message;
    }
    elseif($texteDefaut AND $variableAVerifier == $texteDefaut)
    {
        $message = $messageErreur.' (texte par défaut)';
        return $message;
    }
    elseif($pregmatch AND !preg_match($pregmatch[0],$variableAVerifier))
    {
        if(strlen($variableAVerifier)< $pregmatch[1] OR strlen($variableAVerifier)> $pregmatch[2]){
            $message = $messageErreur.' (longueur incorrecte - de '.$pregmatch[1].' à '.$pregmatch[2].' caractères)';
        }
        else{
            $message = $messageErreur.' (format incorrect)';
        }
        return $message;
    }
    else {return ''; }
}

function printErreur($tableau)
{
    $ok = 1;
    foreach($tableau as $element)
    {
        if($element != '')
        {
            echo '<div style="text-align:center; color:red;" ><br />/!\ '.$element.' /!\</div>'; $ok = 0;
        }
    }
    if($ok) {?><div style="text-align:center;">Informations correctement envoyés !</div><?php  }
    return $ok;
}


function estVide($tableauDonneesEnvoyes){
    foreach($tableauDonneesEnvoyes as $valeur)
    {
        if(empty($valeur)){return 0;}
    }
    return 1;
}

function printHeader($page, $redirect, $titre, $js){
//Fonction postHeader : pour éviter de ré-ecrire la structure du site sur chaque page, j'appelle cette fonction au début des pages pour afficher la structure
//Paramètres : nom raccourcis de la page, page présente dans le dossier admin, titre de la page, nécessite le fichier javascript
global $titreWebSite, $sloganWebSite;
    echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
<head>
  <title><?php echo $titreWebSite.' - '.$sloganWebSite.' || '.$titre; ?></title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <?php if($redirect){ ?><meta http-equiv="refresh" content="2; url=<?php echo $redirect; ?>" /><?php } ?>
  <?php if($js){?><script type="text/javascript" src="script.js"></script><?php }?>
</head>

<body>
    <div id="main" class="main">
        <div id="header" class="header">
            <img src="header.png" alt="header"/>
        </div>
        <div id="navigation" class="navigation">
            <?php menu_top($page); ?>
        </div>
        <br/>
        <div id="colonne-gauche" class="gauche">
            <div id="menu" class="block-gauche" style="margin-bottom: 5px;">
                <div class="head-block">menu</div>
                <?php menu_left($page); ?>
            </div>
            <?php blockTop1(); ?>
        </div>
        <div id="colonne-centre" class="middle">
<?php }

function printFooter($pageIsAdmin){
//Fonction postFooter : fermeture de la structure ouverte par le postHeader, affichage du copyright
    ?>
        </div>

        <div id="clear-colonnes" class="clear_float"></div>
        <div id="footer" style="text-align:center;"><br />Copyright <a href="http://www.romainbeuque.fr/">Romain Beuque</a> - <a href="<?php if(isset($pageIsAdmin) AND $pageIsAdmin == true){echo '../';} ?>equipe.php">Renan Lossouarn</a></div>
    </div>

</body>
</html><?php
}

function paginationListPages($nbPages, $pageActuelle, $url){
    //affichage de la pagination : numéros de pages en bas de la fenètre
    if ($nbPages > 1){
        echo '<div style="text-align:center;">Pages : ';
        //on utilise un boucle for, qui va de la page 1 au nombre exact de page, de 1 en 1
        for ($compteur = 1; $compteur <= $nbPages ; $compteur++) {
            //on teste si la page en cours est le numéro de page que l'on veut afficher, si oui, on le colore avec la classe active
            echo '<a href="'.$url; if(preg_match('#\?#', $url)){ echo '&amp;';} else {echo '?';} echo 'page='. $compteur .'"'; if($pageActuelle == $compteur) {echo ' class="active" ';} echo'>'.$compteur.'</a>&nbsp;';
        }
        echo '</div>';
    }
}


//FIN DU CODE SOURCE - TEST FONCTION DE VERIFICATION DE REFERER POUR EVITER L'INTRUSION PAR DES FORMULAIRES EXTERNES
//Pas encore en service
//  Vérifier que le referer n'appartient pas à un annuaire auquel on a soumis, sinon, on affiche le lien
function bad_referer($referer, $ip){
  $buffer = '';
  $value = null;

  //  Isolation du domaine
  $uri = parse_url($referer, PHP_URL_HOST);

  //  Récupération du TLD
  if (preg_match('#www\.#U', $uri)){
    preg_match('#www\.(.*?)\.?(.[a-z]{2,3})#Usi', $uri, $match);
    $value = $match[1].$match[2];
  }
  else{
    preg_match('#.*\.(.*?)(.[a-z]{2,3})#U', $uri, $match);
    $value = $match[1].$match[2];
  }

  //  Affichage de tous les codes des partenaires pour ce domaine
 /* $q = mysql_query("SELECT * FROM partenaire WHERE partenaire_domaine='".$value."' OR partenaire_ip='".$ip."'");
  if(@mysql_num_rows($q) != false && @mysql_num_rows($q) > 0){
    while(@$r = mysql_fetch_object($q)){
      $buffer.= ' '.stripslashes($r->partenaire_code);
    }
  }*/

  //echo $buffer;
  echo $value;

  return;
}
?>
