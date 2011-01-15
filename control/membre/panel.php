<?php include("functions.php"); checkLogin();
//si l'utilisateur n'est pas connecté, il n'a pas le droit d'accès à l'interface membre
    if(!$_SESSION['login']){
        $js = false; $admin= false; $page = 'membre-panel'; $titreErreur = 'espace membre - erreur';
        $erreur = 'Vous n\'êtes pas connecté, impossible d\'accéder à l\'espace membre !';
        include_once('vue/erreur.php'); die;
    }
        include_once('modele/membre/selectInfosMembre.php');

        //on va chercher les anciennes valeurs utilisateur pour pas que l'utilisateur ait à retaper des données qu'il ne veut pas modifier
        $infosArray = selectInfosMembre($_SESSION['ID']);
        include_once('vue/membre/panel.php');