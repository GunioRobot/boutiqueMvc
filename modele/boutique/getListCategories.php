<?php
function getListCategories(){
    global $bdd;
    $req = $bdd->query('SELECT * FROM categorie ORDER BY nom') or die(print_r($bdd->errorInfo()));
    $categoriesArray = $req->fetchAll();
    $req->closeCursor();
    return $categoriesArray;
}
function getListCategoriesLimit($start, $nombre){
    global $bdd;
    $req = $bdd->query('SELECT * FROM categorie ORDER BY nom LIMIT '.$start.','.$nombre) or die(print_r($bdd->errorInfo()));
    $categoriesArray = $req->fetchAll();
    $req->closeCursor();
    return $categoriesArray;
}


function getNombreCategories(){
    global $bdd;

    $req = $bdd->query('SELECT COUNT(*) AS nbCategories FROM `categorie`') or die(print_r($bdd->errorInfo()));
    $result = $req->fetch();
    $return = $result['nbCategories'];
    $req->closeCursor();
    return $return;
}