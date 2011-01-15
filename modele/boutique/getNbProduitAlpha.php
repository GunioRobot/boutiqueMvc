<?php
function getNombreProduitAlpha($lettre){
    global $bdd;

    $lettre = htmlspecialchars($lettre);
    $req = $bdd->query('SELECT COUNT(*) AS nbProduits FROM `produits` WHERE `titre` REGEXP "^'.$lettre.'" ') or die(print_r($bdd->errorInfo()));
    $result = $req->fetch();
    $return = $result['nbProduits'];
    $req->closeCursor();
    return $return;
}