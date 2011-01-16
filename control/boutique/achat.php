<?php include("functions.php"); checkLogin();

$id = (int) $_GET['produit'];
if($_GET['produit'] <= '0'){
    $js = false; $redirect[0] = 'boutique.php'; $redirect[1] = '3';
    $page = 'boutique'; $titreErreur = 'boutique - achat : erreur'; $erreur = 'Ce produit n\'existe pas !';
    include_once('vue/erreur.php');
    die;
}

include_once('modele/boutique/getFiche.php');
include_once('modele/boutique/selectInfosMembre.php');
$produitArray = getFiche($id);
//si le produit n'existe pas dans la base de données, affichage d'un message d'erreur JS, puis redirection vers la boutique
if(!$produitArray){
    $js = false; $redirect[0] = 'boutique.php'; $redirect[1] = '3'; $page = 'boutique'; $titreErreur = 'boutique - erreur';
    $erreur = 'Ce produit n\'existe pas !';
    include_once('vue/erreur.php');
    die;
}

$membreArray = selectInfosMembre();

if(!$_SESSION['login']){
require_once('recaptchalib.php');
$publickey = "6LeY-7kSAAAAAP6I1bSIh9elEmQv3XbCTEMOYkVo"; // you got this from the signup page
}

include_once('vue/boutique/achat.php');