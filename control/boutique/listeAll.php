<?php include("functions.php"); checkLogin();

include_once('modele/boutique/getProduits.php'); include_once('modele/boutique/getNbProduit.php');
$titre = 'tous les produits de la boutique'; $url = 'boutique.php?op=listAll';

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
        $produitsArray = getProduits($start, $produitsParPage);
        include_once('vue/boutique/listeProduits.php');
    }
    else {
        $js = false; $admin= false; $page = 'boutique'; $titreErreur = 'boutique - erreur'; $erreur = 'Aucun produit dans cette boutique!';
        include_once('vue/erreur.php');
    }