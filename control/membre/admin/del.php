<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/membre/deleteMembre.php');

$id = (int)$_GET['id']; // id du get, pour la sélection de la news
deleteMembre($id);
include_once('vue/membre/admin/del.php');