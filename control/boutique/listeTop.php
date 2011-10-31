<?php include("functions.php"); checkLogin();

include_once('modele/boutique/getTop.php');
$top = (int) $_GET['top'];
$produitsArray = getTop($top);


$titre = 'top '.$top.' des meilleurs ventes';
$top = 1;
$page = 0; $nbPages = 0; $url = 0; //pagination
include_once('vue/boutique/listeProduits.php');