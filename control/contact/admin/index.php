<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/contact/listContact.php'); include_once ('modele/contact/getMessage.php');

    $contactParPage = 20;
//pour la pagination, on va compter le nombre de produits correspondant à notre requète
        $nbMessage = getNombreContact();
        //on souhaite 5 news par page, le nombre de page est égal au nombre de news total divisé par 5.
        //dans la plupart des cas, on aura un réel. pas de possibilité d'avoir 2.6 pages, on rajoute une page au cas où ca ne tombe pas juste
        $nbPages=(int)($nbMessage/$contactParPage)+1;
        //on vérifie qu'au cas où le résultat tombe juste, on affiche pas une page en plus qui serait vide
        if(($nbMessage%$contactParPage) == 0) {$nbPages = ($nbPages-1);}
        if(!isset($_GET['page'])) { $_GET['page'] = '1'; } // pas de pages --> page 1
        //on transforme le numero de page en entier, si la variable page n'est pas un nombre, page sera égal à 0
        if(isset($_GET['page'])) { $page = (int)($_GET['page']); }
        //on vérifie maintenant que le numero de page existe bien
        if(isset($page) AND $page <= $nbPages AND $page > 0)
        {
            $contactArray = getMessages((($page-1)*$contactParPage), $contactParPage);
            include_once('vue/contact/admin/index.php');
        }
        else //erreur dans le choix de la page (0 -1 etc...)
        {
            $js = false; $admin= false; $page = 'admin'; $titreErreur = 'administration ~ contact - erreur'; $erreur = 'Aucun message ne se trouve sur cette page!';
            include_once('vue/erreur.php');
        }



