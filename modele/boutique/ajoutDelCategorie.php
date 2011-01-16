<?php
function ajoutCategorie($nom){
    global $bdd;
    $req = $bdd->prepare('INSERT INTO categorie(nom) VALUE (?)');
    $req->execute(array($nom)) or die(print_r($req->errorInfo()));
    return '';
}

function deleteCategorie($nom){
    global $bdd;
    $req = $bdd->prepare('DELETE FROM categorie WHERE nom=?');
    $req->execute(array($nom)) or die(print_r($req->errorInfo()));
    return '';
}