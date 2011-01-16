<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/boutique/getFiche.php');

include_once('modele/boutique/getListCategories.php');
$categoriesArray = getListCategories();

$id = $_GET['id']; // id du get, pour la sélection de la news
$produitArray = getFiche($id);
foreach ($produitArray as $produit){$titre = $produit['titre'];} //on récup le titre --> affichage titre
if(!isset($titre)){
    $js = false; $admin= false; $page = 'accueil'; $titreErreur = 'administration : boutique - erreur';
    $erreur = 'Ce produit n\'existe pas !';
    include_once('vue/erreur.php');
}
else {
    include_once('vue/boutique/admin/produit-edit.php');
}