<?php
function ajoutNews($titre, $auteur, $texte){
    global $bdd;

    $req = $bdd->prepare('INSERT INTO news (titre, auteur, date, texte) VALUES (:titre, :auteur, NOW(), :texte)');
    $req->execute(array('titre' => $titre, 'auteur' => $auteur, 'texte' => $texte)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
    return '';
}

function updateNews($id, $titre, $auteur, $date, $texte){
    global $bdd;
    
    $req = $bdd->prepare('UPDATE news SET titre = :titre, auteur = :auteur, date = :date, texte = :texte WHERE ID = :id');
    $req->execute(array('titre' => $titre, 'auteur' => $auteur, 'date' => $date, 'texte' => $texte,
        'id' => $id)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
    return '';
}