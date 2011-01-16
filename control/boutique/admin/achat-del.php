<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/boutique/deleteAchat.php');

$id = $_GET['id']; // id du get, pour la sélection de la news
deleteAchat($id);
include_once('vue/boutique/admin/achat-del.php');