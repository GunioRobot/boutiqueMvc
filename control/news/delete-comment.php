<?php include("functions.php"); checkLogin();

$id = (int)$_GET['id'];

include_once('modele/news/getComments.php');
$commentArray = getComment($id);

foreach ($commentArray as $com){$pseudo = $com['pseudo']; $id_user = $com['ID_membre']; $id_news = $com['ID_news'];}
if(!isset($pseudo)){
    $js = false; $redirect[0] = 'javascript:history.go(-1)'; $redirect[1] = '1';
    $page = 'accueil'; $titreErreur = 'news - erreur'; $erreur = 'Ce commentaire n\'existe pas !';
    include_once('vue/erreur.php'); die;
}

$admin = areYouAdmin();

if(!$admin AND (!$_SESSION['login'] OR $id_user != $_SESSION['ID'])){
    $js = false; $redirect[0] = 'javascript:history.go(-1)'; $redirect[1] = '1';
    $page = 'accueil'; $titreErreur = 'news - erreur'; $erreur = 'Vous n\'êtes pas autorisé à supprimer un commentaire qui ne vous appartient pas!';
    include_once('vue/erreur.php'); die;
}

include_once ('modele/news/ajoutComment.php');

deleteComment($id);
include_once('vue/news/delete-comment.php');