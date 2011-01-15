<?php
function inscrireMembre($pseudo, $password, $mail){
    global $bdd;

    $req = $bdd->prepare('INSERT INTO membres(pseudo, password, mail, date_inscription) VALUES(:pseudo, :password, :mail, CURRENT_DATE())');
    $req->execute(array('pseudo' => $pseudo, 'password' => $password, 'mail' => $mail)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
}