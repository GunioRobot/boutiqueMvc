<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once('modele/boutique/getAchats.php'); $url = 'boutique.php?admin=achat';

$nbAchats = getNombreAchats();
$nbPages=(int)($nbAchats/$produitsParPage)+1;
    if(($nbAchats%$produitsParPage) == 0) {$nbPages = ($nbPages-1);}
    if(!isset($_GET['page'])) // si pas de ?page= --> on en conclut que c'est la page 1 qu'on veut
    {
        $_GET['page'] = '1';
    }
    if(isset($_GET['page'])) { $page = (int)($_GET['page']); }
    if(isset($page) && $page <= $nbPages && $page > 0){
        $start = ($page-1)*$produitsParPage;
        $achatsArray = getAchats($start, $produitsParPage);
        include_once('vue/boutique/admin/achat.php');
    }
    else {
        $js = false; $redirect[0] = 'boutique.php?admin=achat'; $redirect[1] = '3';
        $page = 'admin'; $titreErreur = 'administration ~ boutique - erreur'; $erreur = 'Aucun achat sur cette page!';
        include_once('vue/erreur.php');
    }