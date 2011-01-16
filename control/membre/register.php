<?php include("functions.php"); checkLogin();
//si l'utilisateur est déjà connecté, on ne va pas lui permettre de se ré-inscrire
    if($_SESSION['login']){
        $js = false; $redirect[0] = 'membre.php?op=panel'; $redirect[1] = '1';
        $page = 'membre-register'; $titreErreur = 'inscription - erreur'; $erreur = 'Vous êtes déjà connecté, impossible de vous re-inscrire !';
        include_once('vue/erreur.php'); die;
    }
    else {
        require_once('recaptchalib.php');
        $publickey = "6LeY-7kSAAAAAP6I1bSIh9elEmQv3XbCTEMOYkVo"; // you got this from the signup page
        include_once('vue/membre/register.php');
    }