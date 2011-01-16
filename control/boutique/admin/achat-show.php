<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/boutique/getAchat.php');

$id = (int)$_GET['id']; // id du get, pour la sélection de la news
$achatArray = getAchat($id);
foreach ($achatArray as $achat){$nom = $achat['nom'];} //on récup le titre --> affichage titre
if(!isset($nom)){
    $js = false; $admin= false; $page = 'admin'; $titreErreur = 'administration : boutique - erreur';
    $erreur = 'Cet achat n\'existe pas !';
    include_once('vue/erreur.php');
}
else {
    include_once('vue/boutique/admin/achat-show.php');
}