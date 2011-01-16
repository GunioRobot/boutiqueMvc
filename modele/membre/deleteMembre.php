<?php
function deleteMembre($id){
    global $bdd;

    $req = $bdd->prepare('DELETE FROM membres WHERE ID = ?');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    return '';
}