<?php include("functions.php"); checkLogin();
include_once('modele/news/getNews.php');
include_once('modele/news/getComments.php');

$id = (int)$_GET['id']; // id du get, pour la sélection de la news
$newsArray = getNew($id);

$admin = areYouAdmin();

if(!$_SESSION['login']){
require_once('recaptchalib.php');
$publickey = "6LeY-7kSAAAAAP6I1bSIh9elEmQv3XbCTEMOYkVo"; // you got this from the signup page
}

foreach ($newsArray as $news){$titre = $news['titre'];} //on récup le titre --> affichage titre
if(!isset($titre)){
    $js = false; $redirect[0] = 'news.php?op=index'; $redirect[1] = '1';
    $page = 'accueil'; $titreErreur = 'news - erreur'; $erreur = 'Cette news n\'existe pas !';
    include_once('vue/erreur.php');
}
else {
    $url='news.php?id='.$id;
    $nbComments = nbComments($id);
    $nbPages=(int)($nbComments/$commentsParPage)+1;
    if(($nbComments%$commentsParPage) == 0) {$nbPages = ($nbPages-1);}
    if(!isset($_GET['page'])) { $_GET['page'] = '1'; } // pas de pages --> page 1
    if(isset($_GET['page'])) { $page = (int)($_GET['page']); }
    if((isset($page) AND $page <= $nbPages AND $page > 0) OR $nbComments == 0)
    {
        $commentsArray = getComments($id, (($page-1)*$commentsParPage), $commentsParPage);
        include_once('vue/news/view.php');
    }
    else //erreur dans le choix de la page (0 -1 etc...)
    {
        $js = false; $redirect[0] = $url; $redirect[1] = '1';
        $page = 'accueil'; $titreErreur = 'news : erreur'; $erreur = 'Aucun commentaire ne se trouve sur cette page!';
        include_once('vue/erreur.php');
    }
}