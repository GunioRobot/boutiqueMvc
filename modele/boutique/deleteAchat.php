<?php
function deleteAchat($id){
    global $bdd;

    $req = $bdd->prepare('DELETE FROM achat WHERE ID=?');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
}