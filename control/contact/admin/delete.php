<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/contact/deleteMessage.php');

$id = $_GET['id']; // id du get, pour la sélection de la news
deleteMessage($id);
include_once('vue/contact/admin/delete.php');