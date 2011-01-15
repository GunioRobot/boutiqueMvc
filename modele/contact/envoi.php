<?php
function envoiMessage($nom, $mail, $site, $message, $note)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO contact (nom, mail, website, message)VALUES (:nom, :mail, :website, :message)');
    $req->execute(array('nom' => $nom, 'mail' => $mail, 'website' => $site, 'message' => $message)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
    $req = $bdd->prepare('INSERT INTO note VALUES (?)');
    $req->execute(array($note)) or die(print_r($req->errorInfo()));
    $req->closeCursor();
    return 1;
}