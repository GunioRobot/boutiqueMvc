<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/contact/getMessage.php');

$id = $_GET['id']; // id du get, pour la sélection de la news
$messageArray = getMessage($id);
foreach ($messageArray as $message){$nom = $message['nom'];} //on récup le titre --> affichage titre
if(!isset($nom)){
    $js = false; $redirect[0] = 'contact.php?admin=index'; $redirect[1] = '3';
    $page = 'admin'; $titreErreur = 'administration : contact - erreur';
    $erreur = 'Ce message n\'existe pas !';
    include_once('vue/erreur.php');
}
else {
    include_once('vue/contact/admin/show.php');
}