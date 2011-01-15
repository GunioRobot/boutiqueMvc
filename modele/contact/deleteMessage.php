<?php
function deleteMessage($id){
    global $bdd;

    $req = $bdd->prepare('DELETE FROM contact WHERE ID=?');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
}