<?php
function updatePassword($id, $password){
    global $bdd;
    
    $req = $bdd->prepare('UPDATE membres SET password = :password WHERE ID = :id');
    $req->execute(array('password' => $password, 'id' => $password)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
    $result = $req->fetchAll();
    return $result;
}