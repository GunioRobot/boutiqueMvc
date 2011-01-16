<?php
function deleteProduit($id){
    global $bdd;

    $req = $bdd->prepare('DELETE FROM produits WHERE ID=?');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
    $req = $bdd->prepare('DELETE FROM achat WHERE ID_produit=?');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
}