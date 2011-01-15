<?php
function deleteNews($id){
    global $bdd;

    $req = $bdd->prepare('DELETE FROM news WHERE ID=?');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
}