<?php
function getNombreProduitCat($categorie){
    global $bdd;

    $req = $bdd->prepare('SELECT COUNT(*) AS nbProduits FROM `produits` WHERE categorie = ?');
    $req->execute(array($categorie)) or die(print_r($req->errorInfo()));
    $result = $req->fetch();
    $return = $result['nbProduits'];
    $req->closeCursor();
    return $return;
}