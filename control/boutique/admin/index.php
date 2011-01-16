<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once('modele/boutique/getProduits.php'); include_once('modele/boutique/getNbProduit.php');
$url = 'boutique.php?admin=index';

$nbProduits = getNombreProduit();
$nbPages=(int)($nbProduits/$produitsParPage)+1;
    if(($nbProduits%$produitsParPage) == 0) {$nbPages = ($nbPages-1);}
    if(!isset($_GET['page'])) // si pas de ?page= --> on en conclut que c'est la page 1 qu'on veut
    {
        $_GET['page'] = '1';
    }
    if(isset($_GET['page'])) { $page = (int)($_GET['page']); }
    if(isset($page) && $page <= $nbPages && $page > 0){
        $start = ($page-1)*$produitsParPage;
        $produitsArray = getProduitsByID($start, $produitsParPage);
        include_once('vue/boutique/admin/index.php');
    }
    else {
        $js = false; $redirect[0] = $url; $redirect[1] = '3';
        $page = 'admin'; $titreErreur = 'administration ~ boutique - erreur'; $erreur = 'Aucun produit sur cette page!';
        include_once('vue/erreur.php');
    }