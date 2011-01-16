<?php
function getMembres($start, $nombre){
    global $bdd;

    $req = $bdd->query('SELECT ID, pseudo, mail, nom, prenom FROM membres ORDER BY ID LIMIT '.$start.','.$nombre) or die(print_r($bdd->errorInfo()));
    $result = $req->fetchAll();
    return $result;
}

function getNbMembres(){
    global $bdd;

    $req = $bdd->query('SELECT COUNT(*) AS nbMembres FROM `membres`') or die(print_r($bdd->errorInfo()));
    $result = $req->fetch();
    $return = $result['nbMembres'];
    $req->closeCursor();
    return $return;
}