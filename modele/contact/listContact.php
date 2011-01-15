<?php
function listContact(){
    global $bdd;

    $req = $bdd->query('SELECT * FROM contact ORDER BY ID') or die(print_r($bdd->errorInfo()));
    $result = $req->fetchAll();
    return $result;
}

function getNombreContact(){
    global $bdd;
    $req = $bdd->query('SELECT COUNT(*) AS nb FROM `contact`') or die(print_r($bdd->errorInfo()));
    $result = $req->fetch();
    $nbContact = $result['nb'];
    $req->closeCursor();
    return $nbContact;
}