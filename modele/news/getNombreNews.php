<?php
function getNombreNews(){
    global $bdd;
    $req = $bdd->query('SELECT COUNT(*) AS nbNews FROM `news`') or die(print_r($bdd->errorInfo()));
    $result = $req->fetch();
    $nbNews = $result['nbNews'];
    $req->closeCursor();
    return $nbNews;
}