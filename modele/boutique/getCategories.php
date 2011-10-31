<?php
function getCategories($cat, $start, $nbProduitsPage){
    global $bdd;

    if($cat == 'new'){$req = $bdd->query('SELECT *, DATE_FORMAT(ajout, \'%d/%m/%Y\') AS date FROM produits ORDER BY ajout DESC LIMIT '.$start.','.$nbProduitsPage) or die(print_r($bdd->errorInfo()));
    $arrayProduit = $req->fetchAll();
    $req->closeCursor();
    return $arrayProduit;
    }

    $req = $bdd->prepare('SELECT * FROM produits WHERE categorie = ? ORDER BY ajout DESC LIMIT '.$start.','.$nbProduitsPage);
    $req->execute(array($cat)) or die(print_r($req->errorInfo()));
    $resultcat = $req->fetchAll();
    $req->closeCursor();

    if(!$resultcat)
    {
        return '';
    }
    else {return $resultcat;}
}