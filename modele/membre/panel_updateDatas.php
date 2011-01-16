<?php
function updateInfosPerso($id, $nom, $prenom, $mail, $adresse, $codepostal, $ville, $pays){
    global $bdd;

    $req = $bdd->prepare('UPDATE membres SET nom = :nom, prenom = :prenom, mail = :mail, adresse = :adresse, codepostal = :codepostal, ville = :ville, pays = :pays WHERE ID = :id');
    $req->execute(array('nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'adresse' => $adresse, 'codepostal' => $codepostal,
        'ville' => $ville, 'pays' => $pays, 'id' => $id)) or die(print_r($req->errorInfo()));
    $req->closeCursor(); return '';
}
function updateMembre($id, $nom, $prenom, $mail, $adresse, $codepostal, $ville, $pays, $admin){
    global $bdd;

    $req = $bdd->prepare('UPDATE membres SET nom = :nom, prenom = :prenom, mail = :mail, adresse = :adresse, codepostal = :codepostal, ville = :ville, pays = :pays, admin = :admin WHERE ID = :id');
    $req->execute(array('nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'adresse' => $adresse, 'codepostal' => $codepostal,
        'ville' => $ville, 'pays' => $pays, 'id' => $id, 'admin' => $admin)) or die(print_r($req->errorInfo()));
    $req->closeCursor(); return '';
}