<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/membre/selectInfosMembre.php');

$id = $_GET['id']; // id du get, pour la sélection de la news
$membreArray = selectInfosMembre($id);
foreach ($membreArray as $membre){$pseudo = $membre['pseudo'];} //on récup le titre --> affichage titre
if(!isset($pseudo)){
    $js = false; $redirect = false; $page = 'admin'; $titreErreur = 'administration : membre - erreur';
    $erreur = 'Ce membre n\'existe pas !';
    include_once('vue/erreur.php');
}
else {
    include_once('vue/membre/admin/edit.php');
}