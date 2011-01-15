<?php include("functions.php"); checkLogin();

    if($_SESSION['login'])
    {
        $js = false; $admin= false; $page = 'membre-login'; $titreErreur = 'connexion - erreur'; $erreur = 'Vous êtes déjà connecté, impossible de vous re-connecter !';
        include_once('vue/erreur.php'); die;
    }
    else
    {
        include_once('vue/membre/login.php');
    }