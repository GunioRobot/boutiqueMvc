<?php include("functions.php"); checkLogin();

// Suppression des variables de session et de la session
$_SESSION = array();
$_SESSION['login'] = false;
session_destroy();
// Suppression des cookies de connexion automatique
setcookie('pseudo', '');
setcookie('sha1', '');

include_once('vue/membre/logout.php');
