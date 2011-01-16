<?php
function ajoutProduit($titre, $auteur, $infos, $website, $image, $categorie, $prix){
    global $bdd;

    $req = $bdd->prepare('INSERT INTO produits (`titre`, `auteur`, `website`, `infos`, `image`, `categorie`, `ajout`, `prix`) VALUES (:titre, :auteur, :website, :infos, :image, :categorie, NOW(), :prix)');
    $req->execute(array('titre' => $titre, 'auteur' => $auteur, 'website' => $website, 'infos' => $infos, 'image' => $image,
        'categorie' => $categorie, 'prix' => $prix)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
    return '';
}

function updateProduit($id, $titre, $auteur, $website, $infos, $categorie, $image, $achat, $prix){
    global $bdd;

    $req = $bdd->prepare('UPDATE produits SET titre = :titre, auteur = :auteur, website = :website, infos = :infos, categorie = :categorie, image = :image, achat = :achat, prix = :prix WHERE ID = :id');
    $req->execute(array('titre' => $titre, 'auteur' => $auteur, 'website' => $website, 'infos' => $infos,
        'categorie' => $categorie, 'image' => $image, 'achat' => $achat, 'id' => $id, 'prix' => $prix)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
    return '';
}