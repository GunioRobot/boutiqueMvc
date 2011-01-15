<?php
function getListCategories(){
    global $bdd;
    $req = $bdd->query('SELECT * FROM categorie ORDER BY nom') or die(print_r($bdd->errorInfo()));
    $categoriesArray = $req->fetchAll();
    $req->closeCursor();
    return $categoriesArray;
}