<?php include("functions.php"); checkLogin();

include_once('modele/boutique/getCategories.php'); include_once('modele/boutique/getNbProduitCat.php'); include_once('modele/boutique/getNbProduit.php');
$categorie = htmlspecialchars($_GET['cat']);
$titre = 'produits de la catégorie '.$categorie; $url = 'boutique.php?cat='.$categorie;

if($categorie == 'new' AND getNombreProduit() > 10){$nbProduits = 10; } elseif($categorie == 'new'){ $nbProduits = getNombreProduit(); }
else{$nbProduits = getNombreProduitCat($categorie); }
$nbPages=(int)($nbProduits/$produitsParPage)+1;
    if(($nbProduits%$produitsParPage) == 0) {$nbPages = ($nbPages-1);}
    if(!isset($_GET['page'])) // si pas de ?page= --> on en conclut que c'est la page 1 qu'on veut
    {
        $_GET['page'] = '1';
    }
    if(isset($_GET['page'])) { $page = (int)($_GET['page']); }
    if(isset($page) && $page <= $nbPages && $page > 0){
        $start = ($page-1)*$produitsParPage;
        $produitsArray = getCategories($categorie, $start, $produitsParPage);
        include_once('vue/boutique/listeProduits.php');
    }
    else {
        $js = false; $admin= false; $page = 'boutique'; $titreErreur = 'boutique - erreur'; $erreur = 'Aucun produit ne se trouve sur cette page!';
        include_once('vue/erreur.php');
    }