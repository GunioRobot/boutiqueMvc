<?php
function getMessage($id){
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM contact WHERE ID = ? LIMIT 0,1');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    $result = $req->fetchAll();
    return $result;
}
function getMessages($debut, $limit)
{
    global $bdd;
    $req = $bdd->query('SELECT * FROM contact ORDER BY ID LIMIT '.($debut).','.$limit) or die(print_r($bdd->errorInfo()));
    $message = $req->fetchAll();
    $req->closeCursor();
    return $message;
}