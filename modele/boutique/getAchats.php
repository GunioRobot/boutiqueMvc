<?php
function getNombreAchats(){
    global $bdd;

    $req = $bdd->query('SELECT COUNT(*) AS nbAchats FROM `achat`') or die(print_r($bdd->errorInfo()));
    $result = $req->fetch();
    $return = $result['nbAchats'];
    $req->closeCursor();
    return $return;
}

function getAchats($start, $nbProduitsPage){
    global $bdd;

    $req = $bdd->query('SELECT achat.ID, achat.ID_produit, achat.nom, achat.prenom, achat.ID_membre,
        produits.titre FROM achat INNER JOIN produits ON achat.ID_produit = produits.ID
        ORDER BY achat.ID LIMIT '.$start.','.$nbProduitsPage) or die(print_r($bdd->errorInfo()));
    $resultcat = $req->fetchAll();
    $req->closeCursor();

    if(!$resultcat)
    {
        return '';
    }
    else {return $resultcat;}
}