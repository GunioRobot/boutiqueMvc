<?php
function getNombreProduit(){
    global $bdd;

    $req = $bdd->query('SELECT COUNT(*) AS nbProduits FROM `produits`') or die(print_r($bdd->errorInfo()));
    $result = $req->fetch();
    $return = $result['nbProduits'];
    $req->closeCursor();
    return $return;
}