<?php
function selectIDmembre($pseudo, $password){
    global $bdd;
    
    $req = $bdd->prepare('SELECT ID, pseudo FROM membres WHERE pseudo = :pseudo AND password = :password LIMIT 0,1');
    $req->execute(array('pseudo' => $pseudo, 'password' => $password)) or die(print_r($req->errorInfo()));
    $resultat = $req->fetchAll();
    return $resultat;

}