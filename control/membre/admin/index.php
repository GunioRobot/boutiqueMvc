<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/membre/getMembres.php');

    $membreParPage = 20;
//pour la pagination, on va compter le nombre de produits correspondant à notre requète
        $nbMembre = getNbMembres();
        //on souhaite 5 news par page, le nombre de page est égal au nombre de news total divisé par 5.
        //dans la plupart des cas, on aura un réel. pas de possibilité d'avoir 2.6 pages, on rajoute une page au cas où ca ne tombe pas juste
        $nbPages=(int)($nbMembre/$membreParPage)+1;
        //on vérifie qu'au cas où le résultat tombe juste, on affiche pas une page en plus qui serait vide
        if(($nbMembre%$membreParPage) == 0) {$nbPages = ($nbPages-1);}
        if(!isset($_GET['page'])) { $_GET['page'] = '1'; } // pas de pages --> page 1
        //on transforme le numero de page en entier, si la variable page n'est pas un nombre, page sera égal à 0
        if(isset($_GET['page'])) { $page = (int)($_GET['page']); }
        //on vérifie maintenant que le numero de page existe bien
        if(isset($page) AND $page <= $nbPages AND $page > 0)
        {
            $membresArray = getMembres((($page-1)*$membreParPage), $membreParPage);
            include_once('vue/membre/admin/index.php');
        }
        else //erreur dans le choix de la page (0 -1 etc...)
        {
            $js = false; $redirect[0] = 'membre.php?admin=index'; $redirect[1] = '1';
            $page = 'admin'; $titreErreur = 'administration ~ membre - erreur';
            $erreur = 'Aucun membre ne se trouve sur cette page!';
            include_once('vue/erreur.php');
        }



