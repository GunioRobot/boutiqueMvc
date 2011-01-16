<?php
function getAchat($id){
    global $bdd;
    $req = $bdd->prepare('SELECT * FROM achat INNER JOIN produits ON achat.ID_produit = produits.ID WHERE achat.ID=?');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    $result = $req->fetchAll();
    return $result;
}