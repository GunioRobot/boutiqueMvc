<?php
function getFiche($id){
    global $bdd;
    
    $id = (int) $id;    if($id < 1){return '';}
    $req = $bdd->prepare('SELECT *, DATE_FORMAT(ajout, \'%d/%m/%Y à %Hh%i\') AS ajout_date FROM produits WHERE ID = ? LIMIT 0,1');
    $req->execute(array($id)) or die(print_r($req->errorInfo()));
    $temp = $req->fetchAll();
    return $temp;
}
