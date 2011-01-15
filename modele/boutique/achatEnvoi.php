<?php
function envoiAchat($logged, $nom, $prenom, $mail, $adresse, $codepostal, $ville, $pays, $ID_produit, $note){
    global $bdd;

    if($logged){
        $req = $bdd->prepare("INSERT INTO achat(ID_produit, nom, prenom, mail, adresse, codepostal, ville, pays, ID_membre) VALUES(:ID_produit, :nom, :prenom, :mail, :adresse, :codepostal, :ville, :pays, :ID_membre)");
        $req->execute(array('nom' => $nom, 'ID_produit' => $ID_produit, 'prenom' => $prenom, 'mail' => $mail,
            'adresse' => $adresse, 'codepostal' => $codepostal, 'ville' => $ville, 'pays' => $pays,
            'ID_membre' => $_SESSION['ID'])) or die(print_r($req->errorInfo()));
        $req->closeCursor();
        $req = $bdd->prepare('INSERT INTO note VALUES (?)');
        $req->execute(array($note)) or die(print_r($req->errorInfo()));
        $req->closeCursor();
    }
    else {
        $req = $bdd->prepare("INSERT INTO achat(ID_produit, nom, prenom, mail, adresse, codepostal, ville, pays) VALUES(:ID_produit, :nom, :prenom, :mail, :adresse, :codepostal, :ville, :pays)");
        $req->execute(array('nom' => $nom, 'ID_produit' => $ID_produit, 'prenom' => $prenom, 'mail' => $mail,
            'adresse' => $adresse, 'codepostal' => $codepostal, 'ville' => $ville, 'pays' => $pays)) or die(print_r($req->errorInfo()));
        $req->closeCursor();
        $req = $bdd->prepare('INSERT INTO note VALUES (?)');
        $req->execute(array($note)) or die(print_r($req->errorInfo()));
        $req->closeCursor();
    }
}

function modifyNbAchat($id){
    global $bdd;

    $req = $bdd->prepare('SELECT achat FROM produits WHERE ID = ? LIMIT 1');
    $req->execute(array($id))  or die(print_r($req->errorInfo()));
    while ($donnees = $req->fetch())
    {
        $newAchat = $donnees['achat']+1;
        $req2 = $bdd->prepare('UPDATE produits SET achat = :newAchat WHERE ID = :ID');
        $req2->execute(array('newAchat' => $newAchat, 'ID' => $id))  or die(print_r($req2->errorInfo()));
        $req2->closeCursor();
    }
    $req->closeCursor();
}