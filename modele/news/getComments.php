<?php
function getComments($id_news, $debut, $nombre)
{
    global $bdd;
    $req = $bdd->prepare('SELECT *, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%i\') AS dateFormated FROM news_comments WHERE ID_news = ? ORDER BY ID ASC LIMIT '.$debut.','.$nombre);
    $req->execute(array($id_news)) or die(print_r($req->errorInfo()));
    $comments = $req->fetchAll();
    $req->closeCursor();
    return $comments;
}

function nbComments($id_news){
    global $bdd;
    $req = $bdd->prepare('SELECT COUNT(*) AS nbComments FROM `news_comments` WHERE ID_news = ?');
    $req->execute(array($id_news)) or die(print_r($req->errorInfo()));
    $result = $req->fetch();
    $nbComments = $result['nbComments'];
    $req->closeCursor();
    return $nbComments;
}