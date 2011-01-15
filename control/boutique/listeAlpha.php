<?php include("functions.php"); checkLogin();

include_once('modele/boutique/getProduitsAlpha.php'); include_once('modele/boutique/getNbProduitAlpha.php');
$lettre = htmlspecialchars(substr($_GET['alpha'], 0, 1));
$titre = 'produits commencant par la lettre '.$lettre; $url = 'boutique.php?alpha='.$lettre;

$nbProduits = getNombreProduitAlpha($lettre);
$nbPages=(int)($nbProduits/$produitsParPage)+1;
    if(($nbProduits%$produitsParPage) == 0) {$nbPages = ($nbPages-1);}
    if(!isset($_GET['page'])) // si pas de ?page= --> on en conclut que c'est la page 1 qu'on veut
    {
        $_GET['page'] = '1';
    }
    if(isset($_GET['page'])) { $page = (int)($_GET['page']); }
    if(isset($page) && $page <= $nbPages && $page > 0){
        $start = ($page-1)*$produitsParPage;
        $produitsArray = getProduitsAlpha($lettre, $start, $produitsParPage);
        include_once('vue/boutique/listeProduits.php');
    }
    else {
        $js = false; $admin= false; $page = 'boutique'; $titreErreur = 'boutique - erreur'; $erreur = 'Aucun produit ne se trouve sur cette page!';
        include_once('vue/erreur.php');
    }