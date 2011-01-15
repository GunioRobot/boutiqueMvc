<?php
function getNews($debut, $limit, $tri)
{
    global $bdd;
    $req = $bdd->query('SELECT ID, titre, texte, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%i\') AS date, date AS dateOrder,
        auteur FROM news ORDER BY '.$tri.' LIMIT '.($debut).','.$limit) or die(print_r($bdd->errorInfo()));
    $news = $req->fetchAll();
    $req->closeCursor();
    return $news;
}
function getNew($id)
{
    global $bdd;
    $req = $bdd->prepare('SELECT ID, titre, texte, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%i\') AS date, date AS dateOrder,
        auteur FROM news WHERE ID = ?');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    $news = $req->fetchAll();
    $req->closeCursor();
    return $news;
}