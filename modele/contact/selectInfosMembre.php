<?php
// Si le membre est connecté, on va récupérer ses infos pour remplir automatiquement les champs du formulaire
function selectInfosMembre(){
    global $bdd;
    if (isset($_SESSION['ID'])) {
        $req = $bdd->prepare('SELECT * FROM membres WHERE ID = ? ');
        $req->execute(array($_SESSION['ID'])) or die(print_r($req->errorInfo()));
        $membre = $req->fetchAll();
        $req->closeCursor();
        return $membre;
    }
    return array('');
}