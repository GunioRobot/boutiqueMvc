<?php
function verifPseudoUsed($pseudo){
    global $bdd;

    $req = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $pseudo)) or die(print_r($req->errorInfo()));
    $result = $req->fetchAll();
    return $result;
}