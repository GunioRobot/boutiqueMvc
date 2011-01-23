<?php
function ajoutComment($id_news, $pseudo, $message, $mail){
    global $bdd;

    if($_SESSION['login']){$ID_membre = $_SESSION['ID'];} else{ $ID_membre = null;}

    $req = $bdd->prepare("INSERT INTO news_comments(ID_news, pseudo, mail, message, ID_membre, ip, date) VALUES (:ID_news, :pseudo, :mail, :message, :ID_membre, :ip, NOW())");
    $req->execute(array("ID_news" => $id_news, "pseudo" => $pseudo, "mail" => $mail, "message" => $message,
        "ID_membre" => $ID_membre, "ip" => $_SERVER["REMOTE_ADDR"])) or die(print_r($req->errorInfo()));
    $req->closeCursor();
    return '';
}

function deleteComment($id_comment){
    global $bdd;

    $req= $bdd->prepare("DELETE FROM news_comments WHERE ID = ?");
    $req->execute(array($id_comment)) or die (print_r($req->errorInfo()));
    $req->closeCursor();
    return '';
}