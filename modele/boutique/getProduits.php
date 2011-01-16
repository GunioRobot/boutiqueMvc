<?php
function getProduits($start, $nbProduitsPage){
    global $bdd;

    $req = $bdd->query('SELECT * FROM produits ORDER BY titre LIMIT '.$start.','.$nbProduitsPage) or die(print_r($bdd->errorInfo()));
    $resultcat = $req->fetchAll();
    $req->closeCursor();

    if(!$resultcat)
    {
        return '';
    }
    else {return $resultcat;}
}

function getProduitsByID($start, $nbProduitsPage){
    global $bdd;

    $req = $bdd->query('SELECT * FROM produits ORDER BY ID DESC LIMIT '.$start.','.$nbProduitsPage) or die(print_r($bdd->errorInfo()));
    $resultcat = $req->fetchAll();
    $req->closeCursor();

    if(!$resultcat)
    {
        return '';
    }
    else {return $resultcat;}
}