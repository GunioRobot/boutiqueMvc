<?php
function getProduitsAlpha($lettre, $start, $nbProduitsPage){
    global $bdd;

    $lettre = htmlspecialchars($lettre);
    $req = $bdd->query('SELECT * FROM produits WHERE `titre` REGEXP "^'.$lettre.'" ORDER BY titre DESC LIMIT '.$start.','.$nbProduitsPage) or die(print_r($bdd->errorInfo()));
    $resultcat = $req->fetchAll();
    $req->closeCursor();

    if(!$resultcat)
    {
        return '';
    }
    else {return $resultcat;}
}