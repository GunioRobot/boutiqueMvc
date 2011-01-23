<?php
function deleteNews($id){
    global $bdd;

    $req = $bdd->prepare('DELETE FROM news WHERE ID=?');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
}

function deleteCommentForNews($id_news){
    global $bdd;

    $req = $bdd->prepare("DELETE FROM news_comments WHERE ID_news = ?");
    $req->execute(array($id_news)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
    return '';
}