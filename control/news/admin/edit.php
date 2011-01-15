<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/news/getNews.php');

$id = $_GET['id']; // id du get, pour la sélection de la news
$newsArray = getNew($id);
foreach ($newsArray as $news){$titre = $news['titre'];} //on récup le titre --> affichage titre
if(!isset($titre)){
    $js = false; $admin= false; $page = 'accueil'; $titreErreur = 'administration : news - erreur';
    $erreur = 'Cette news n\'existe pas !';
    include_once('vue/erreur.php');
}
else {
    include_once('vue/news/admin/edit.php');
}