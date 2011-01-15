<?php include("functions.php"); checkLogin();

if(isset($_GET['produit'])){$id = (int) $_GET['produit'];}
// Si le paramètre id n'est pas défini ou inférieur ou égal à 0, on redirige l'utilisateur vers la boutique
if(!isset($_GET['produit']) OR ($_GET['produit'] <= '0')){
    $js = false; $admin= false; $page = 'boutique'; $titreErreur = 'boutique - achat : erreur'; $erreur = 'Ce produit n\'existe pas !';
    include_once('vue/erreur.php');
    die;
}

include_once('modele/boutique/getFiche.php');
include_once('modele/boutique/selectInfosMembre.php');
$produitArray = getFiche($id);
//si le produit n'existe pas dans la base de données, affichage d'un message d'erreur JS, puis redirection vers la boutique
if(!$produitArray){
    $js = false; $admin= false; $page = 'boutique'; $titreErreur = 'boutique - erreur'; $erreur = 'Ce produit n\'existe pas !';
    include_once('vue/erreur.php');
    die;
}

$membreArray = selectInfosMembre();

include_once('vue/boutique/achat.php');