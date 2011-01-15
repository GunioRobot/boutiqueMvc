<?php
function selectInfosMembre($id){
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM membres WHERE ID = ? LIMIT 0,1');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    $result = $req->fetchAll();
    return $result;
}