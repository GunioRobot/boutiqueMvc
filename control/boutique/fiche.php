<?php include("functions.php"); checkLogin();

$id = (int) $_GET['produit'];
// Si le paramètre id n'est pas défini ou inférieur ou égal à 0, on redirige l'utilisateur vers la boutique
if($_GET['produit'] <= '0'){
    $js = false; $redirect[0] = 'boutique.php'; $redirect[1] = '3';
    $page = 'boutique'; $titreErreur = 'boutique - erreur'; $erreur = 'Ce produit n\'existe pas !';
    include_once('vue/erreur.php');
    die;
}


include_once('modele/boutique/getFiche.php');
$produitArray = getFiche($id);
//si le produit n'existe pas dans la base de données, affichage d'un message d'erreur JS, puis redirection vers la boutique
if(!$produitArray){
    $js = false; $redirect[0] = 'boutique.php'; $redirect[1] = '3';
    $page = 'boutique'; $titreErreur = 'boutique - erreur'; $erreur = 'Ce produit n\'existe pas !';
    include_once('vue/erreur.php');
    die;
}
$admin = areYouAdmin();


foreach($produitArray as $element){$titreProduit = $element['titre'];}

include_once('vue/boutique/fiche.php');