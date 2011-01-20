<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/news/getNews.php'); include_once ('modele/news/deleteNews.php');

$id = $_GET['id']; // id du get, pour la sélection de la news
deleteNews($id);
deleteCommentForNews($id);
include_once('vue/news/admin/delete.php');