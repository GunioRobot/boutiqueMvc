<?php include("functions.php"); checkLogin();
include_once('modele/news/getNews.php');

$id = $_GET['id']; // id du get, pour la sélection de la news
$newsArray = getNew($id);

$admin = areYouAdmin();

foreach ($newsArray as $news){$titre = $news['titre'];} //on récup le titre --> affichage titre
if(!isset($titre)){
    $js = false; $redirect[0] = 'news.php?op=index'; $redirect[1] = '1';
    $page = 'accueil'; $titreErreur = 'news - erreur'; $erreur = 'Cette news n\'existe pas !';
    include_once('vue/erreur.php');
}
else {
    include_once('vue/news/view.php');
}