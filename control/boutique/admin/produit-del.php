<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/boutique/deleteProduit.php');

$id = $_GET['id']; // id du get, pour la sélection de la news
deleteProduit($id);
include_once('vue/boutique/admin/produit-del.php');