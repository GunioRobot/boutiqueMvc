<?php include("functions.php"); checkLogin();

include_once('modele/boutique/getTop.php'); include_once('modele/boutique/getListCategories.php');
$top4Array = getTop('4');
$categoriesArray = getListCategories();

include_once('vue/boutique/index.php');
