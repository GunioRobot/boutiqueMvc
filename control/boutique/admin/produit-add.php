<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once('modele/boutique/getListCategories.php');
$categoriesArray = getListCategories();

include_once('vue/boutique/admin/produit-add.php');