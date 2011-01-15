<?php
function getTop($top)
{
    global $bdd; $top = (int) $top;
    if($top > 0){
        $req = $bdd->query('SELECT * FROM produits ORDER BY achat DESC LIMIT 0,'.$top) or die(print_r($bdd->errorInfo()));
        $produitsArray = $req->fetchAll();
        $req->closeCursor();
        return $produitsArray;
    }
    else{return array(); }
}
